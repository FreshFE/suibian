<?php namespace App\Shopmanager\Controller;

use Think\Request;
use Think\Response;

class OrderController extends CommonController
{
	public function index()
	{
		$this->display();
	}

	public function newlist()
	{
		$model = $this->getModel('Orders');

		if(Request::query('timeline')) {
			$time = time(Request::query('timeline'));
			$condition['updateline'] = array('egt', $time);
		}

		$condition['shop_id'] = $this->getShopId();
		$condition['status'] = 0;

		$datas = $model->where($condition)->order('updateline ASC')->select();

		if(!$datas) {
			exit('none');
		}

		$this->assign('datas', $datas);
		$this->display();
	}

	public function detail()
	{
		$model = $this->getModel('Orders');

		// 是否存在有效ID
		if(!Request::query('id')) {
			exit('NO_GET_ORDER_ID');
		}

		// 查询，获取并赋值
		$condition['id'] = Request::query('id');
		$data = $model->where($condition)->find();
		

		// 获得菜品相关
		$data['products'] = $this->getModel('OrdersProduct')
							->join('product ON orders_product.product_id = product.id')
							->where('orders_product.orders_id = ' . $condition['id'])
							->select();

		$this->assign('data', $data);
		$this->display();
	}

	public function confirm()
	{
		$model = $this->getModel('Orders');

		// 是否存在有效ID
		if(!Request::post('id') || !Request::post('status')) {
			exit('NO_POST_ORDER');
		}

		$id = $model
			->where(array('id' => Request::post('id')))
			->save(array('status' => Request::post('status')));

		if($id) {
			Response::json(array(
				'success' => 1,
				'data' => array('id' => Request::post('id'))
			));
		}
		else {
			Response::json(array(
				'success' => 0
			));
		}
	}
}