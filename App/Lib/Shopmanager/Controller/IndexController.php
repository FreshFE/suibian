<?php namespace App\Shopmanager\Controller;

use Think\Controller;
use Think\Request;

class IndexController extends Controller
{
	public function index()
	{
		$this->assign('shop', Request::getStorage('shop'));
		$this->assign('user', Request::getStorage('user'));
		$this->display();
	}
}