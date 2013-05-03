<?php

use Smartadmin\Controller\Api as Controller;
use Think\Request as Request;
use Think\Session as Session;
use Think\Lang as Lang;
use Think\Auth as Auth;
use Think\Config as Config;
use Think\Exception as Exception;

class OrderController extends Controller
{
	/**
	 * 创建订单
	 *
	 * @return void
	 */
	public function post_create()
	{
		try {
			// 订单id的数组
			$orders = array();

			// 不存在 food_id_str 捕获错误
			if(!isset($_POST['food_id_str']))
			{
				throw new Exception("NO_FOODS");
			}

			// 解析字符串获得数组
			$foods = json_decode($_POST['food_id_str'], true);

			// 排序
			sort($foods);

			foreach ($foods as $key => $food) {
				$temp[] = $food['id'];
			}

			// 查询条件
			$condition['id'] = array('in', implode(',', $temp));

			// 查询商店信息
			$shops = M('Food')->group('shop_id')->field('shop_id')->where($condition)->select();
			
			$foods_temp = $this->parse_foods($foods);

			$orderJson = array();

			// 遍历商店id，确定建立的订单数量
			foreach ($shops as $key => $shop) {
				$orderJson[] = $this->add_order($shop['shop_id'], $foods_temp);
				sleep(0.5);
			}

			if(count($orderJson) > 0)
			{
				$this->successJson();
			}
			else {
				throw new Exception("ERROR_ORDERS_CREATE");
			}
		}
		catch(Exception $error) {
			$this->errorJson($error);
		}
	}

	protected function parse_foods($foods)
	{
		// 建立 orders_food表
		foreach ($foods as $key => $value) {
			$temp[$value['id']] = $value['num'];
		}

		return $temp;
	}

	protected function add_order($shop_id, $foods)
	{
		// --------------------------------------------------
		// 建立订单表 orders表
		// --------------------------------------------------
		try {

			// 创建数据并检查
			$data = D('Orders')->create();
			if(!$data) {
				throw new Exception(D('Orders')->getError());
			}

			// 订单数据
			$orders = array(
				'user_id' => Session::get(Config::get('AUTH_KEY')),
				'shop_id' => $shop_id,
				'price' => 0
			);

			// 合并
			$orders = array_merge($orders, $data);

			// 创建到数据表
			$orders_id = M('Orders')->add($orders);

			// $this->json(array('uu' => 1, 'hh' => $orders_id));

			// 订单创建失败
			if(!$orders_id) {
				throw new Exception("ERROR_ORDERS");
			}
		}
		catch(Exception $error)
		{
			$this->errorJson($error);
		}

		// --------------------------------------------------
		// 创建orders_food表
		// --------------------------------------------------

		try {
			// 获得foods属性的key
			$keys = array_keys($foods);

			// 在符合id和shop_id内查找相关的id值
			$condition['id'] = array('in', join($keys, ','));
			$condition['shop_id'] = $orders['shop_id'];

			// 查询并得到结果
			$datas = M('Food')->field('id,price')->where($condition)->select();

			$total_price = 0;
			
			foreach ($datas as $key => $value) {
				$arr[] = array(
					'orders_id' => $orders_id,
					'food_id' => $value['id'],
					'num' => $foods[$value['id']],
					'createline' => time(),
					'updateline' => time()
				);

				// 计算价格
				$total_price += $value['price'];
			}

			// 添加orders和food表之间的关系
			M('OrdersFood')->addAll($arr);

			// 更新价格
			M('Orders')->where(array('id' => $orders_id))->save(array('price' => $total_price));

			return $orders_id;
		}
		catch(Exception $error)
		{
			$this->errorJson($error);
		}
	}

	public function get_index()
	{
		try {
			// 用户id
			$condition['user_id'] = $_SESSION[Config::get('AUTH_KEY')];

			// 历史订单
			if(isset($_GET['history']) && $_GET['history'] == 1)
			{
				$condition['status'] = 30;
			}
			// 当前订单
			else {
				$condition['status'] = array('neq', 30);
			}

			$datas = D('Orders')->where($condition)->limit(10)->order('id DESC')->select();

			

			foreach ($datas as $key => &$data)
			{
				$temp = D('OrdersFood')->group('food_id')->where(array('orders_id' => $data['id']))->select();

				$temp2 = array();

				foreach ($temp as $key => $value) {
					$temp2[] = $value['food_id'];
				}

				$data['foods'] = D('Food')->where(array('id' => array('in', join($temp2, ','))))->select();
			}

			$this->successJson($datas);
		}
		catch(Exception $error)
		{
			$this->errorJson($error);
		}
	}
}