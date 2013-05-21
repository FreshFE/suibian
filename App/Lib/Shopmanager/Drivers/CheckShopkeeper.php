<?php namespace App\Shopmanager\Drivers;

use App\Auth\Drivers\UserSession;

class CheckShopkeeper
{
	public function run()
	{
		$user = UserSession::getAll();

		$data = D('ShopManager')->where(array('user_id' => $user['id']))->find();

		if($data) {
			return true;
		}
		else {
			return false;
		}
	}
}