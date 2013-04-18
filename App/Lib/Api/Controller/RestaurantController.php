<?php

use Think\Controller as Controller;
use Think\Lang as Lang;
use \Exception;

class ResraurantController extends Controller
{
	public function index()
	{
		try {

			$condition = array();

			if(isset($_GET['id']))
			{
				$condition['id'] = $_GET['id'];
			}

			$data = M('Shop')->where($condition)->select();

			$this->assign('success', 1);
			$this->assign('datas', $data);
			// dump($data);
			$this->json();

		}
		catch(Exception $error) {
			$this->assign('success', 0);
			$this->assign('error', $error->getMessage());
			$this->assign('error_msg', Lang::get($error->getMessage()));
		}
	}
}