<?php

use Smartadmin\Controller\Api as Controller;
use Think\Session as Session;
use Think\Config as Config;
use Think\Exception as Exception;

class AccountController extends Controller
{
	/**
	 * 登录接口
	 * 根据用户提交的email和password匹配账号
	 * 登录后写入session
	 *
	 * @return void
	 */
	public function post_login()
	{
		try
		{
			$model = D('User');
			$condition = array('email' => $_POST['email'], 'password' => sha1($_POST['password']));
			$data = $model->where($condition)->find();

			if($data)
			{
				$this->json_auth_info($data['id']);
			}
			// 数据不正确
			else {
				throw new Exception("ERROR_LOGIN");
			}
		}
		catch(Exception $error)
		{
			$this->errorJson($error);
		}
	}

	/**
	 * 注册功能
	 * 检查账户信息，通过后，写入数据库并设置登录信息并放回
	 *
	 * @return void
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
	 * 退出账户，清除session
	 *
	 * @return void
	 */
	public function post_logout()
	{
		try
		{
			if(Session::get(Config::get('AUTH_KEY')))
			{
				Session::set(Config::get('AUTH_KEY'), null);
				$this->successJson();
			}
		}
		catch(Exception $error)
		{
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
			$data = D('User')->find($user_id);

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
}