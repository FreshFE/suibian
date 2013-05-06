<?php

use Smartadmin\Controller\Api as Controller;

class VersionController extends Controller
{
	public function check()
	{
		$data = array(
			"android" => array(
				"newest" => "1.0.2",
                "available" => "1.0.0",
                "link" => "http://42.121.118.13:81/suibian.apk"
			)
		);

		$this->successJson($data);
	}
}