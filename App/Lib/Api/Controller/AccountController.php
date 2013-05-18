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
	public function post_login()
	{
		// 初始化模型
		$model = $this->getModel('User');

		// 查找email相应的值
		$data = $model
			->where(array(
				'email' => Request::post('email')
			))
			->find();

		// ERROR: 不存在该用户
		if(!$data) {
			return $this->errorJson('NO_EXIST_USER');
		}

		// ERROR: 提交密码为空
		if(!Request::post('password')) {
			return $this->errorJson('NO_POST_PASSWORD');
		}

		$password = Request::post('password');

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
}