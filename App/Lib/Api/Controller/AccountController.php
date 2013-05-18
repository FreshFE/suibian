<?php namespace App\Api\Controller;

use Think\Controllers\Api as Controller;
use Think\Session as Session;
use Think\Cookie as Cookie;
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

	public function post_register()
	{
		// 初始化模型
		$model = $this->getModel('User');

		$data = $model->create();

		// 创建数据
		if(!$data) {
			return $this->errorJson($model->getError());
		}

		// 生成 盐 和 密码
		$data['password_salt'] = md5(time());
		$data['password'] = sha1($data['password'] . $data['password_salt']);

		$id = $model->add($data);

		if(!$id) {
			return $this->errorJson('ERROR_REGISTER');
		}

		// 重新获取用户
		$data = $model->find($id);

		// 通过认证
		$this->passAuthentication($data);
	}

	protected function passAuthentication($user)
	{
		$data = array(
			'id' => $user['id'],
			'email' => $user['email'],
			'username' => $user['username'],
			'password_cookie' => md5($user['email'] . $user['password'] . $user['password_salt']),
			'createline' => $user['createline'],
			'role' => $user['role']
		);

		// 写入 Session
		Session::set('USER_SESSION', $data);

		// 写入 Cookie
		Cookie::set('SUIIBIANUSERAUTH', array('email' => $data['email'], 'password' => $data['password_cookie']));

		// TODO: 登录处理

		// 返回
		$this->successJson($data);
	}
}