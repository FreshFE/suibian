<?php

use Think\Model as Model;

class OrdersModel extends Model
{

	protected $_auto = array(
		array('str_id', 'parse_str_id', 1, 'callback');
	);

	public function parse_str_id($str_id)
	{
		// 处理$str_id的值的方法

		$foods = explode(',', $str_id);

		foreach ($foods as $key => $food) {
			
		}
	}

}