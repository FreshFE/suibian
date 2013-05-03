<?php

use Smartadmin\Controller\Api as Controller;

class VersionController extends Controller
{
	public function check()
	{

		$data = array(
			'last_version' => '1.0.0',
			'last_version_code' => 1,
			'last_update' => 'http://baidu.com'
		);

		$this->successJson($data);
	}
}