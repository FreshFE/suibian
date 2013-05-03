<?php

use Smartadmin\Controller\Content as Controller;
use Think\Redirect as Redirect;
use Think\Url as Url;
use Think\Config as Config;

class OrderController extends Controller
{
	protected $model_name = 'Orders';

	protected $image_thumb_name = 'thumb';

	protected $cover_thumb_name = 'thumb';

	protected $list_order = 'status ASC,id DESC';

	protected function detail_query_after()
	{
		$ordersfood = M('OrdersFood')->where(array('orders_id' => $this->pk_id))->select();

		// 餐品
		foreach ($ordersfood as $key => &$value) {
			$value['foods'] = M('Food')->find($value['food_id']);
		}

		$this->assign('ordersfood', $ordersfood);

		// 商店
		$orders = M('Orders')->find($this->pk_id);
		$shop = M('Shop')->find($orders['shop_id']);
		$this->assign('shop', $shop);
	}

	public function dostatus()
	{
		$data = array(
			'status' => $_GET['status']
		);

		$order_id = M('Orders')->where(array('id' => $_GET['id']))->save($data);

		Redirect::success('状态改变成功');
	}
}