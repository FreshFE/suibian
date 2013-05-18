<?php namespace App\Auth\Behaviors;

use Think\Behavior as Behavior;
use Think\Config as Config;
use Think\Session as Session;
use Think\Cookie as Cookie;
use Think\Exception as Exception;
use Think\File as File;

class CheckAuth extends Behavior
{
	/**
	 * 行为入口方法
	 *
	 * @param mixed &$params
	 * @return void
	 */
	public function run(&$params)
	{
		// 认证通过
		if($this->checkSession())
		{
			$this->checkAuthorization();
		}
		// 认证未通过
	}

	/**
	 * 检查授权
	 */
	protected function checkAuthorization()
	{

	}

	/**
	 * 检查Session
	 */
	protected function checkSession()
	{
		$session = Session::get('USER_SESSION');

		if($session) return true;

		return $this->checkCookie();
	}

	/**
	 * 检查Cookie
	 */
	protected function checkCookie()
	{
		$cookie = Cookie::get('SUIIBIANUSERAUTH');

		if(!$cookie) return false;

		$data = D('User')->where(array('email' => $cookie['email']))->find();

		if(!$data) return false;

		if($cookie['password'] !== md5($data['email'] . $data['password'] . $data['password_salt'])) return false;

		return $this->passAuthentication($data);
	}

	/**
	 * 通过认证
	 */
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

		return true;
	}
}