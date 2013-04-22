<?php

use Think\Controller as Controller;
use Think\Request as Request;
use Think\Lang as Lang;
use Think\Session as Session;
use Think\Config as Config;
use \Exception;

class AccountController extends Controller
{
	// 登陆
	public function login()
	{
		try {
			if(Request::is('post'))
			{
				// 临时的检查session和cookie的方法，不要模仿该段，后期程序会通过Auth类自动处理掉
				$user_id = Session::get(Config::get('AUTH_KEY'));

				if(!empty($user_id)) {
					throw new Exception("LOGIN_NOW");
				}

				// 临时数据和办法，将来会重构
				$model = M('User');
				$data = $model->create();
				
				// 临时方案，验证用户密码是否正确
				if($data['email'] == 'admin' && $data['password'] == '123456')
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
					throw new Exception('NO');
				}
			}
			else {
				throw new Exception("NO_POST_SUBMIT");
			}
		}
		catch(Exception $error) {
			$this->assign('success', 0);
			$this->assign('error', $error->getMessage());
			$this->assign('error_msg', Lang::get($error->getMessage()));
			$this->json();
		}
	}

	// 注册
	public function register()
	{
		try {

			if(Request::is('post'))
			{
				// TODO
			}
			else {
				throw new Exception("NO_POST_SUBMIT");
			}

		}
		catch(Exception $error) {
			$this->assign('success', 0);
			$this->assign('error', $error->getMessage());
			$this->assign('error_msg', Lang::get($error->getMessage()));
		}
	}

	//退出
	public function logout()
	{
		try {

			if(Request::is('post'))
			{
				Session::remove(Config::get('AUTH_KEY'));

				$this->assign('success', 1);
				$this->json();
			}
			else {
				throw new Exception("NO_POST_SUBMIT");
			}

		}
		catch(Exception $error) {
			$this->assign('success', 0);
			$this->assign('error', $error->getMessage());
			$this->assign('error_msg', Lang::get($error->getMessage()));
		}
	}
}