<?php

use Smartadmin\Controller\Restful as Controller;
use Think\Redirect as Redirect;
use Think\Session as Session;
use Think\Url as Url;

class AccountController extends Controller
{
	public function get_login()
	{
		$this->display();
	}

	public function post_login()
	{
		if($_POST['username'] == 'orders' && $_POST['password'] == '123456')
		{
			$this->save_session(1);
			Redirect::success('Welcome to back.', Url::make('index/index'));
		}
		else {
			Redirect::error('账号密码错误');
		}
	}

	protected function save_session($admin_id)
	{
		Session::set('auth_admin_order', $admin_id);
	}

	protected function get_logout()
	{
		Session::set('auth_admin_order', null);
		Redirect::success('成功退出管理员系统', Url::make('account/login'));
	}
}