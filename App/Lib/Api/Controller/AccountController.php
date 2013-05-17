<?php namespace App\Api\Controller;

use Think\Controllers\Api as Controller;
use Think\Session as Session;
use Think\Config as Config;
use Think\Exception as Exception;
use Think\Request as Request;

class AccountController extends Controller
{
	/**
	 * 登录接口
	 * 根据用户提交的email和password匹配账号
	 * 登录后写入session
	 *
	 * @return void
	 */
	public function get_login()
	{
		// 初始化模型
		$model = $this->getModel('User');

		// 查找email相应的值
		$data = $model
			->where(array(
				'email' => Request::query('email')
			))
			->find();

		// ERROR: 不存在该用户
		if(!$data) {
			return $this->errorJson('NO_EXIST_USER');
		}

		// ERROR: 提交密码为空
		if(!Request::query('password')) {
			return $this->errorJson('NO_POST_PASSWORD');
		}

		$password = Request::query('password');

		// ERROR: 密码不正确
		if(sha1($password . $data['password_salt']) !== $data['password']) {
			return $this->errorJson('ERROR_PASSWORD');
		}

		// TODO
		// ERROR: 账号被封锁

		// 通过认证
		$this->passAuthentication($data);
	}

	protected function passAuthentication($user)
	{
		dump($user);
	}

	// /**
	//  * 注册功能
	//  * 检查账户信息，通过后，写入数据库并设置登录信息并放回
	//  *
	//  * @return void
	//  */
	// public function post_register()
	// {
	// 	try
	// 	{
	// 		$model = D('User');
	// 		$data = $model->create();

	// 		if($data)
	// 		{
	// 			$user_id = $model->add($data);

	// 			if($user_id)
	// 			{
	// 				$this->json_auth_info($user_id);
	// 			}
	// 			else {
	// 				throw new Exception("ERROR_REGISTER");
	// 			}
	// 		}
	// 		// 数据不正确
	// 		else {
	// 			throw new Exception($model->getError());
	// 		}
	// 	}
	// 	catch(Exception $error) {
	// 		$this->errorJson($error);
	// 	}
	// }

	// /**
	//  * 退出账户，清除session
	//  *
	//  * @return void
	//  */
	// public function post_logout()
	// {
	// 	try
	// 	{
	// 		if(Session::get(Config::get('AUTH_KEY')))
	// 		{
	// 			Session::set(Config::get('AUTH_KEY'), null);
	// 			$this->successJson();
	// 		}
	// 	}
	// 	catch(Exception $error)
	// 	{
	// 		$this->errorJson($error);
	// 	}
	// }

	// /**
	//  * 根据$user_id来检查是否存在当前用户
	//  * 如果存在，则写入session，并返回相对应的user数据
	//  *
	//  * @param $user_id
	//  * @return void
	//  */
	// protected function json_auth_info($user_id)
	// {
	// 	try
	// 	{
	// 		// 用户数据
	// 		$data = D('User')->find($user_id);

	// 		// 是否存在该用户
	// 		if($data)
	// 		{
	// 			// access token
	// 			$access_token = session_id();

	// 			// 保存用户Session
	// 			$_SESSION[Config::get('AUTH_KEY')] = $user_id;

	// 			// 输出
	// 			$this->assign('success', 1);
	// 			$this->assign('data', $data);
	// 			$this->assign('access_token', $access_token);
	// 			$this->json();
	// 		}
	// 		else {
	// 			throw new Exception("NO_EXTIS_USER");
	// 		}
	// 	}
	// 	catch(Exception $error) {
	// 		$this->errorJson($error);
	// 	}
	// }
}