<?php namespace App\Auth\Behaviors;

use Think\Behavior as Behavior;
use Think\Config as Config;
use Think\Session as Session;
use Think\Cookie as Cookie;
use Think\Exception as Exception;
use Think\File as File;
use App\Auth\Drivers\Authentication;
use App\Auth\Drivers\Authorization;

class CheckAuth extends Behavior
{
	public $roleRules = array(
		'ROLE_ANONYMOUS' => array(
			'Api/Account' => true
		),
		'ROLE_MEMBER' => array(
			'Api' => true,
			'Api/Account/login' => false,
			'Api/Account/register' => false
		),
		'ROLE_ADMIN' => array(),
	);

	public $modelName = 'User';

	/**
	 * 行为入口方法
	 *
	 * @param mixed &$params
	 * @return void
	 */
	public function run(&$params)
	{
		$authentication = $this->checkAuthentication($this->modelName);

		$authorization = $this->checkAuthorization($authentication->getUserRole(), $this->roleRules);
	}

	protected function checkAuthentication($modelName)
	{
		$driver = new Authentication($modelName);

		return $driver->check();
	}

	/**
	 * 检查授权
	 */
	protected function checkAuthorization($userRole, $roleRules)
	{
		// 实例化
		$driver = new Authorization($userRole, $roleRules);

		// 返回检查结果
		return $driver->check();
	}
}