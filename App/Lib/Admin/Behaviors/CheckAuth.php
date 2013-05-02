<?php namespace App\Admin\Behaviors;

use Think\Behavior as Behavior;
use Think\Session as Session;
use Think\Url as Url;
use Think\Redirect as Redirect;

class CheckAuth extends Behavior
{
	public function run(&$params)
	{
		// if(Session::get('auth_admin'))
		// {
		// 	// 已经登录，account/login返回403
		// 	if(strtolower(CONTROLLER_NAME . '/' . ACTION_NAME) === 'account/login')
		// 	{
		// 		echo '403';
		// 		exit();
		// 	}
		// }
		// // 没有登录
		// else {
		// 	// 仅能访问account/login
		// 	if(strtolower(CONTROLLER_NAME . '/' . ACTION_NAME) !== 'account/login')
		// 	{
		// 		Redirect::error('需要先登录系统', Url::make('account/login'));
		// 	}
		// }
	}
}