<?php

use Think\Controller as Controller;
use Think\Lang as Lang;
use \Exception;

class OrderController extends Controller
{

	public function index()
	{
		try {

			if(Request::is('post'))
			{
				$data = D('Orders')->create();
				dump($data);
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