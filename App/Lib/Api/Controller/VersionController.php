<?php

use Smartadmin\Controller\Api as Controller;

class VersionController extends Controller
{
	public function check()
	{
		$data = array(
			"android" => array(
				"newest" => "1.0.0",
                "available" => "1.0.0",
                "link" => "http://www.baidu.com"
			)
		);

		$this->successJson($data);
	}
}