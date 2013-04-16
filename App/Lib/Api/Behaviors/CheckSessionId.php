<?php namespace App\Api\Behaviors;

use Think\Behavior as Behavior;

class CheckSessionId extends Behavior
{
	public function run(&$params)
	{
		if(isset($_GET['access_token']))
		{
			session_id($_GET['access_token']);
			unset($_GET['access_token']);
			dump('ss');
		}
	}
}