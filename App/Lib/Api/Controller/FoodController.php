<?php

use Smartadmin\Controller\Api as Controller;
use Think\Lang as Lang;
use Think\Session as Session;
use Think\Config as Config;
use Think\Exception as Exception;

class FoodController extends Controller
{
	// 获取菜品列表，可根据店铺id查询
	public function index()
	{
		try {

			$condition = array();

			if(isset($_GET['restaurant_id']))
			{
				$condition['restaurant_id'] = $_GET['restaurant_id'];
			}

			$data = M('Food')->where($condition)->select();

			// 输出
			$this->successJson($data);
		}
		catch(Exception $error) {
			$this->errorJson($error);
		}
	}

	// 获得店铺的菜品，按分类排列,可根据店铺id查询
	public function shop()
	{
		try {
			
			// Food Category
			$category = M('Category')->where(array('fid' => 1))->select();
			// $this->json($category);

			$tempcat = array();
			foreach ($category as $key => $value) {
				$cid = $value['cid'];
				$tempcat[$cid] = $value['name'];
			}

			// Food
			$temp = array();
			$condition = array();

			if(isset($_GET['shop_id'])) 
			{
				$condition['shop_id'] = $_GET['shop_id'];
			}

			$datas = M('Food')->where($condition)->order('cid ASC')->select();

			foreach ($datas as $key => $data) {
				$cid = $data['cid'];
				$temp[$cid]['cid'] = $cid ;
				$temp[$cid]['name'] = $tempcat[$cid];
				$temp[$cid]['food'][] = $data;
			}

			$temp = array_values($temp);

			$this->successJson($temp);

		} catch(Exception $error) {
			$this->errorJson($error);
		}
	}

	// 得用户吃过的菜品
	public function favorite()
	{
		try
		{
			// 获取用户user_id
			$condition['user_id'] = Session::get(Config::get('AUTH_KEY'));

			// 根据用户id,获取订单id
			$orders = M('Orders')->where($condition)->select();

			foreach ($orders as $key => $value) {
				$temp[] = $value['id'];
			}

			if($temp)
			{
				// 根据订单id，获取餐品id
				$food_id = M('OrdersFood')->group('food_id')->where(array('order_id' => array('in', join($temp, ','))))->field('food_id')->select();

				foreach ($food_id as $key => $value) {
					$food_ids[] = $value['food_id'];
				}

				if($food_ids)
				{
					// 再根据餐品id,获取菜品信息
					$data = M('Food')->where(array('id' => array('in', join($food_ids, ','))))->select();
					
					// 输出
					$this->successJson($data, true);
				}
				// 订单内没有餐品
				else {
					throw new Exception("NO_EXIST_FOOD");
				}
			}
			// 订单为空，输出
			else {
				throw new Exception("NO_EXIST_ORDER");
			}

		}
		catch(Exception $error) {
			$this->errorJson($error);
		}
	}
}