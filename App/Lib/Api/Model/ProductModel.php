<?php namespace App\Api\Model;

use Think\Model as Model;

class ProductModel extends Model
{
	public function selectJoin()
	{
		$datas = $this->select();

		if($datas) {
			foreach ($datas as $key => &$data) {
				$data['shop'] = D('Shop')->field('id,title')->find($data['shop_id']);
			}
		}

		return $datas;
	}

	public function findJoin()
	{
		$data = $this->find();

		$data['shop'] = D('Shop')->field('id,title')->find($data['shop_id']);

		return $data;
	}
}