<?php

use Think\Controller as Controller;
use Think\Request as Request;
use Think\Lang as Lang;
use \Exception;

class ResraurantController extends Controller
{
	public function index()
	{
		try {
			if(Request::is('post'))
			{
				$condition = array();
				if(isset($_GET['id']))
				{
					$condition['id'] = $_GET['id'];
				}
				$data = M('Shop')->where($condition)->select();


			}
			else {
				throw new Exception("NO_POST_SUBMIT");
			}

		}
		catch(Exception $error) {
			$this->assgin('success', 0);
			$this->assgin('error', $error->getMessage());
			$this->assgin('error_msg', Lang::get($error->getMessage()));
		}
	}
}