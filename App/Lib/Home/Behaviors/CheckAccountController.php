<?php namespace App\Home\Behaviors;

use Think\Behavior;
use Think\Redirect;
use Think\Url;
use Think\Session;

class CheckAccountController extends Behavior
{
	public function run(&$params)
	{
		if(CONTROLLER_NAME === 'Account' && GROUP_NAME !== 'Home') {
			Redirect::success('', Url::make('Home/' . CONTROLLER_NAME . '/' . ACTION_NAME));
		}
	}
}