<?php namespace App\Home\Behaviors;

use Think\Behavior;
use Think\Redirect;
use Think\Url;
use Think\Session;

class CheckAccountController extends Behavior
{
	public function run(&$params)
	{
		if(in_array(GROUP_NAME, array('Admin', 'Shopmanager')) && CONTROLLER_NAME === 'Account') {
			Redirect::success('', Url::make('Home/' . CONTROLLER_NAME . '/' . ACTION_NAME));
		}
	}
}