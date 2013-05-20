<?php namespace App\Auth\Behaviors;

use Think\Behavior as Behavior;
use Think\Config as Config;
use Think\Session as Session;
use Think\Cookie as Cookie;
use Think\Exception as Exception;
use Think\File as File;
use App\Auth\Drivers\Authentication;

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
		$authentication = $this->initAuthentication();

		$authorization = $this->initAuthorization($authentication);
	}

	protected function initAuthentication()
	{
		$driver = new Authentication();

		$user = $driver->setUserModelProvider('User')->check();
	}

	/**
	 * 检查授权
	 */
	protected function initAuthorization($authentication)
	{
		$driver = new Authorization();
		$driver->setAuthenticationClass($authentication);
	}
}