<?php namespace App\Api\Controller;

use Think\Controllers\Api as Controller;

class VersionController extends Controller
{
	public function check()
	{
		$data = array(
			"android" => array(
				"newest" => "2.0.0",
                "available" => "2.0.0",
                "link" => "http://42.121.118.13:81/suibian.apk"
			)
		);

		$this->successJson($data);
	}
}