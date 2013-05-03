<?php

use Smartadmin\Controller\Api as Controller;
use Think\Lang as Lang;
use Think\Session as Session;
use Think\Exception;

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
			$this->assign('success', 1);
			$this->assign('data', $data);
			$this->json();
		}
		catch(Exception $error) {
			$this->assign('success', 0);
			$this->assign('error', $error->getMessage());
			$this->assign('error_msg', Lang::get($error->getMessage()));
			$this->json();
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
			
			$this->assign('success', 1);
			$this->assign('data', $temp);
			$this->json();

		} catch(Exception $error) {
			$this->errorJson($error);
		}
	}

	// 得用户吃过的菜品
	public function favorite()
	{
		try{

			$condition = array();
			// 获取用户user_id
			$condition['user_id'] = Session::get($_GET['access_token']);

			// 根据用户id,获取订单id
			$temp = M(Orders)->where($condition)->field('id')->select();

			if(!empty($temp))
			{
				// 根据订单id，获取餐品id
				$temp = M('OrdersFood')->where($temp)->field('food_id')->select();
				if(!empty($temp)) {
					// 再根据餐品id,获取菜品信息
					$data = M('Food')->where($temp)->select();
					
					// 输出
					$this->assign('success', 1);
					$this->assign('datas', $data);
					$this->json();
				}
				else {
					// 订单为空，输出
					throw new Exception("NO_EXIST_ORDER");
				}
				
			}
			else {
				// 订单为空，输出
				throw new Exception("NO_EXIST_ORDER");
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