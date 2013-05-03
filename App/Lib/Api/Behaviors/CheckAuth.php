<?php namespace App\Api\Behaviors;

use Think\Behavior as Behavior;
use Think\Config as Config;
use Think\Session as Session;
use Smartadmin\Controller\Api as Controller;
use Think\Exception as Exception;
use Think\File as File;

class CheckAuth extends Behavior
{
	private $rule_login = array(
		'account/logout',
		'food/shop'
	);

	private $rule_login_foriben = array(
		'account/login',
		'account/register'
	);

	public function run(&$params)
	{
		$current = strtolower(CONTROLLER_NAME . '/' . ACTION_NAME);
		// dump(Session::get(Config::get('AUTH_KEY')));
		// 判断当前是否登录
		File::set(LOG_PATH.'checkauth', 'start');
		File::set(LOG_PATH.'test', $_SESSION[Config::get('AUTH_KEY')]);

		if($_SESSION[Config::get('AUTH_KEY')])
		{
			if(in_array($current, $this->rule_login_foriben))
			{
				$controller = new Controller;
				$controller->errorJson(new Exception("NO_LOGINED2"));
			}
		}
		// 未登录，禁止访问必须登录的项目
		else {
			if(in_array($current, $this->rule_login))
			{
				$controller = new Controller();
				$controller->errorJson(new Exception("NO_LOGINED"));
			}
		}
	}
}