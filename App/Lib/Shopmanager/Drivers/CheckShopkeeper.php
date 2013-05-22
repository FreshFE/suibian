<?php namespace App\Shopmanager\Drivers;

use Think\Request;
use Think\Response;

class CheckShopkeeper
{
	public function run()
	{
		$user = Request::getStorage('user');

		$data = D('ShopManager')->where(array('user_id' => $user['id']))->find();

		if($data) {

			// 查询商店
			$shop = D('Shop')->where(array('id' => $data['shop_id']))->find();

			// 存储全局变量
			Request::setStorage('shop', $shop);

			return true;
		}
		else {
			return false;
		}
	}
}