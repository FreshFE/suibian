<?php

use Think\Controller as Controller;
use Think\Request as Request;
use Think\Session as Session;
use Think\Lang as Lang;
use Think\Auth as Auth;
use Think\Config as Config;
use \Exception;

class OrderController extends Controller
{
	// 创建订单
	public function create()
	{
		try {

			if(Request::is('get'))
			{
				// 订单id的数组
				$orders = array();

				// 解析字符串获得数组
				$foods = json_decode($_GET['food_id_str'], true);

				// 排序
				sort($foods);

				foreach ($foods as $key => $food) {
					$temp[] = $food['id'];
				}

				// 查询条件
				$condition['id'] = array('in', implode(',', $temp));

				// 查询商店信息
				$shops = M('Food')->group('shop_id')->field('shop_id')->where($condition)->select();
				
				// 遍历商店id，确定建立的订单数量
				foreach ($shops as $key => $shop) {
					$this->add_order($shop['shop_id'], $foods);
				}
			}
			else {
				// 订单创建错误
				throw new Exception("ERROR_ORDER_CREATE");
			}
		}
		catch(Exception $error) {
			$this->assign('success', 0);
			$this->assign('error', $error->getMessage());
			$this->assign('error_msg', Lang::get($error->getMessage()));
			$this->json();
		}
	}

	protected function add_order($shop_id, $foods)
	{
		// 建立订单表 orders表
		$orders = array(
			'user_id' => Session::get(Config::get('AUTH_KEY')),
			'code' => time(),
			'price' => 0
		);

		dump($orders);

		// 建立 orders_food表
	}

	// 获取订单
	public function index()
	{
		try {
			// 根据access_token获取用户user_id
			$condition['user_id'] = Session::get($_GET['access_token']);
			$condition['status'] = $_GET['status'];

			$data = M('Orders')->where($condition)->select();

			if(!empty($data))
			{
				$temp = array();

				foreach ($data as $key => $value) 
				{
					// 查询此订单的food_id
					$ordersFood = M('OrdersFood')->where(array('orders_id'=>$data['id']))->field('food_id')->select();
					$data[$key]['data'] = M('Food')->where($ordersFood)->select();
					$temp = $data;
				}

				// dump($temp);
				$this->assign('success', 1);
				$this->assign('datas', $temp);
				$this->json();
			}
			else {
				$this->assign('success', 0);
				$this->assign('error', 'NO_ORDER');
				$this->assign('error_msg', '您还没有订单');
				$this->json();
			}

		}
		catch(Exception $error) {
			$this->assign('success', 0);
			$this->assign('error', $error->getMessage());
			$this->assign('error_msg', Lang::get($error->getMessage()));
			$this->json();
		}
	}
}