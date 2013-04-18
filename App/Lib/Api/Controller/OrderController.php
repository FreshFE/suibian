<?php

use Think\Controller as Controller;
use Think\Request as Request;
use Think\Session as Session;
use Think\Lang as Lang;
use \Exception;

class OrderController extends Controller
{
	// 创建订单
	public function create()
	{
		try {

			if(Request::is('post'))
			{
				// ????
				$data = D('Orders')->create();

				dump($data);

				$this->assign('success', 1);
				$this->assign('data', $data);
				$this->json();

			}
			else {
				$this->assign('success', 0);
				$this->assign('error', 'ERROR_ORDER_CREATE');
				$this->assign('error_msg', '订单提交失败');
			}
		}
		catch(Exception $error) {
			$this->assign('success', 0);
			$this->assign('error', $error->getMessage());
			$this->assign('error_msg', Lang::get($error->getMessage()));
			$this->json();
		}
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