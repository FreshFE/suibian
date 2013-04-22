<?php

use Think\Controller as Controller;
use Think\Lang as Lang;
use \Exception;

class RestaurantController extends Controller
{
	// 获取餐厅的列表,可根据店铺id获取
	public function index()
	{
		try {

			$condition = array();

			if(isset($_GET['id']))
			{
				$condition['id'] = $_GET['id'];
			}

			$data = M('Shop')->where($condition)->select();

			//输出
			$this->assign('success', 1);
			$this->assign('datas', $data);
			$this->json();

		}
		catch(Exception $error) {
			$this->assign('success', 0);
			$this->assign('error', $error->getMessage());
			$this->assign('error_msg', Lang::get($error->getMessage()));
		}
	}
}