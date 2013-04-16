<?php

use Think\Controller as Controller;
use Think\Lang as Lang;
use \Exception;

class FoodController extends Controller
{

	public function index()
	{
		try {

			$condition = array();

			if(isset($_GET['restaurant_id']))
			{
				$condition['restaurant_id'] = $_GET['restaurant_id'];
			}

			$data = M('Goods')->where($condition)->select();

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
}