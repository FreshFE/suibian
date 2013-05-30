<?php namespace App\Home\Controller;

use App\Api\Controller\AccountController as Controller;
use Think\Auths\Authentication;
use Think\Redirect;
use Think\Url;
use Think\Session;

class AccountController extends Controller
{
	public function get_login()
	{
		$this->display();
	}

	protected function setAuthentication($user)
	{
		$data = D('ShopManager')->where(array('user_id' => $user['id']))->find();

		if(!$data) {
			Redirect::error('当前账户没有权限登录', Url::make('account/login'));
		}

		$driver = new Authentication();
		$session = $driver->save($user, true);
		
		Redirect::success('登录成功', Url::make('index/index'));
	}

	protected function get_logout()
	{
		$driver = new Authentication();
		$driver->remove();

		Redirect::success('退出成功', Url::make('account/login'));
	}
}