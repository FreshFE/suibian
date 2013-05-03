<?php

use Smartadmin\Controller\Api as Controller;
use Think\Request as Request;
use Think\Lang as Lang;
use Think\Session as Session;
use Think\Config as Config;
use Think\Exception as Exception;

class AccountController extends Controller
{
	// 登陆
	public function post_login()
	{
		try {
			// 临时的检查session和cookie的方法，不要模仿该段，后期程序会通过Auth类自动处理掉
			$user_id = Session::get(Config::get('AUTH_KEY'));

			if(!empty($user_id)) {
				throw new Exception("LOGIN_NOW");
			}

			// 临时数据和办法，将来会重构
			$model = M('User');
			$data = $model->create();
			
			// 临时方案，验证用户密码是否正确
			if($_POST['email'] == 'admin' && $_POST['password'] == '123456')
			{
				// 设置输出数据，此处的1为临时方案
				$data = $model->find(1);
				$access_token = session_id();

				// 保存用户Session，此处的1为临时方案
				Session::set(Config::get('AUTH_KEY'), 1);

				// 输出
				$this->assign('success', 1);
				$this->assign('data', $data);
				$this->assign('access_token', $access_token);
				$this->json();
			}
			else {
				throw new Exception('NO_POST');
			}
		}
		catch(Exception $error) {
			$this->errorJson($error);
		}
	}

	/**
	 * 注册功能
	 */
	public function post_register()
	{
		try
		{
			$model = D('User');
			$data = $model->create();

			if($data)
			{
				$user_id = $model->add($data);

				if($user_id)
				{
					$this->json_auth_info($user_id);
				}
				else {
					throw new Exception("ERROR_REGISTER");
				}
			}
			// 数据不正确
			else {
				throw new Exception($model->getError());
			}
		}
		catch(Exception $error) {
			$this->errorJson($error);
		}
	}

	/**
	 * 根据$user_id来检查是否存在当前用户
	 * 如果存在，则写入session，并返回相对应的user数据
	 *
	 * @param $user_id
	 * @return void
	 */
	protected function json_auth_info($user_id)
	{
		try
		{
			// 用户数据
			$data = D('User')->field('password', true)->find($user_id);

			// 是否存在该用户
			if($data)
			{
				// access token
				$access_token = session_id();

				// 保存用户Session
				Session::set(Config::get('AUTH_KEY'), $user_id);

				// 输出
				$this->assign('success', 1);
				$this->assign('data', $data);
				$this->assign('access_token', $access_token);
				$this->json();
			}
			else {
				throw new Exception("NO_EXTIS_USER");
			}
		}
		catch(Exception $error) {
			$this->errorJson($error);
		}
	}

	//退出
	public function post_logout()
	{
		// try {
		// 	Session::set(Config::get('AUTH_KEY'), null);

		// 	$this->assign('success', 1);
		// 	$this->json();
		// }
		// catch(Exception $error) {
		// 	$this->errorJson($error);
		// }
	}
}