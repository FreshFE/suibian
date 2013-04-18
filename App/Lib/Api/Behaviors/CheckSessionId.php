<?php namespace App\Api\Behaviors;

use Think\Behavior as Behavior;

class CheckSessionId extends Behavior
{
	public function run(&$params)
	{
		// 合并get和post数据
		$request = array_merge($_GET, $_POST);

		// 检查get和post中是否存在access_token
		// 存在，则将session_id设置为access_token的值
		if(isset($request['access_token']))
		{
			session_id($request['access_token']);
		}
	}
}