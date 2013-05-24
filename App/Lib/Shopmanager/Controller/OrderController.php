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
}