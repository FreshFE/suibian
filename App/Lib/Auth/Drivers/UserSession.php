<?php namespace App\Auth\Drivers;

use Think\Session;

class UserSession
{
	public static function getAll()
	{
		$driver = new Authentication();
		$sessionName = $driver->sessionName;

		return Session::get($sessionName);
	}

	public static function getId()
	{
		$user = static::getAll();
		return $user['id'];
	}
}