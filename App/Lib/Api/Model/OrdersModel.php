<?php namespace App\Api\Model;

use Think\Model as Model;

class OrdersModel extends Model
{

	// protected $_auto = array(
	// 	array('str_id', 'parse_str_id', 1, 'callback');
	// );

	// public function parse_str_id($str_id)
	// {
	// 	// 处理$str_id的值的方法

	// 	$foods = explode(',', $str_id);

	// 	foreach ($foods as $key => $food) {
			
	// 	}
	// }

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

	public function findJoin()
	{
		$data = $this->find();

		if(!$data) {
			return false;
		}

		$orderProduct = D('OrdersProduct')->group('product_id')->where(array('orders_id' => $data['id']))->select();

		$productIds = array();

		foreach ($orderProduct as $key => $value) {
			$productIds[] = $value['product_id'];
		}

		$data['foods'] = D('Product')->where(array('id' => array('in', join($productIds, ','))))->select();

		return $data;
	}

}