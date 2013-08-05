<?php namespace App\Api\Controller;

use Think\Controllers\Api as Controller;

class VersionController extends Controller
{
	public function check()
	{
		$data = array(
			"android" => array(
				"newest" => "2.2.0",
                "available" => "2.2.0",
                "link" => "http://dl.yundro.com/suibian.apk",
                "message" => "随2将从内部测试版迁移到公网测试版了，为保证使用，请及时更新"
			)
		);

		$this->successJson($data);
	}
}