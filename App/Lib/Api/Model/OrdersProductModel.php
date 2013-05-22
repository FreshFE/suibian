<?php namespace App\Api\Model;

use Think\Model as Model;

class OrdersProductModel extends Model
{
	public function selectWithJoin()
	{
		$datas = $this->select();

		foreach ($datas as $key => &$data) {
			$data['orders'] = D('Orders')->where(array('id' => $data['orders_id']))->find();
			$data['product'] = D('Product')->where(array('id' => $data['product_id']))->find();
		}

		return $datas;
	}
}