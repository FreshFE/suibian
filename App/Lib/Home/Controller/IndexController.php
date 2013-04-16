<?php

use Think\Controller as Controller;
use Think\Request as Request;
use Think\Auth as Auth;
use Think\Session as Session;

class IndexController extends Controller
{
	public function index()
	{
		$data = D('User')->select();

		$this->assign('data', $data);
		$this->display();
	}
}