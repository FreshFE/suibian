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
		// 根据表单创建数据
		$condition = D('Admin')->create();

		// 根据条件查询数据库
		$data = M('Admin')->where($condition)->find();

		// 已经登录
		if($data) {
			$this->save_session($data['id']);
			Redirect::success('Welcome to back.', Url::make('index/index'));
		}
		// 账号密码错误
		else {
			Redirect::error('账号密码错误');
		}
	}

	protected function save_session($admin_id)
	{
		Session::set('auth_admin', $admin_id);
	}

	protected function get_logout()
	{
		Session::set('auth_admin', null);
		Redirect::success('成功退出管理员系统', Url::make('account/login'));
	}
}