<?php namespace App\Api\Model;

use Think\Model as Model;

class OrdersModel extends Model
{
	protected $_validate = array(
		array('school', 'require', 'NO_SCHOOL'),
		array('address', 'require', 'NO_ADDRESS'),
		array('receiver', 'require', 'NO_RECEIVER'),
		array('phone', 'require', 'NO_PHONE')
	);

	protected $_auto = array(
		array('createline', 'time', 1, 'function'),
		array('updateline', 'time', 3, 'function')
	);

	/**
	 * 
	 */
	public function findWithOrdersProduct()
	{
		$data = $this->find();

		if(!$data) {
			return false;
		}

		// 获得相关的orderProduct信息
		$orderProduct = D('OrdersProduct')->group('product_id')->where(array('orders_id' => $data['id']))->field('product_id')->select();

		// 遍历product_id
		foreach ($orderProduct as $key => $value) {
			$productIds[] = $value['product_id'];
		}

		// 查询Product表
		$data['products'] = D('Product')->where(array('id' => array('in', join($productIds, ','))))->select();

		return $data;
	}

	public function selectJoin()
	{
		$datas = $this->select();

		if($datas) {
			foreach ($datas as $key => &$data) {
				$data['shop'] = D('Shop')->field('title')->find($data['shop_id']);
			}
		}
		else {
			$datas = array();
		}

		return $datas;
	}
}