<?php namespace App\Admin\Controller;

use Think\Controller;

class ReportController extends Controller
{
	public function index()
	{
		// 今日时间戳
		$today = strtotime(date('Y-m-d') . ' 00:01');
		$today_condition['createline'] = array('egt', $today);

		// Orders 模型
		$Orders = $this->getModel('Orders');

		// 今日订单数量
		$data['today_orders_count'] = $Orders->where($today_condition)->count();

		// 今日已完成订单数
		$data['today_orders_doing_count'] = $Orders
						->where(array_merge($today_condition, array('status' => 20)))
						->count();

		// 今日被拒订单数量
		$data['today_orders_refuse_count'] = $Orders
						->where(array_merge($today_condition, array('status' => 10)))
						->count();

		// 处理中订单总金额
		$data['orders_doing_price'] = $Orders->where(array('status' => array('between', '20,29')))->sum('price');

		// 已完成的订单总金额
		$data['orders_finish_price'] = $Orders->where(array('status' => array('between', '30,39')))->sum('price');

		// User 模型
		$User = $this->getModel('User');

		// 今日新增用户总数
		$data['today_user'] = $User->where($today_condition)->count();

		// 总订单数
		$data['orders'] = $Orders->count();

		// 商店总数
		$data['shop'] = $this->getModel('Shop')->count();

		// 商品数量
		$data['product'] = $this->getModel('Product')->count();

		// 用户总数
		$data['user'] = $User->count();

		$this->assign('data', $data);

		$this->display();
	}
}