<?php namespace App\Api\Model;

use Think\Model as Model;

class ProductModel extends Model
{
	public function selectJoin()
	{
		$datas = $this->select();

		foreach ($datas as $key => &$data) {
			$data['product'] = D('Shop')->field('id,title')->find($data['id']);
		}

		return $datas;
	}
}