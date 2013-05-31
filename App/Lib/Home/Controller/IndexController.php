<?php namespace App\Home\Controller;

use Think\Controller;
use Think\Request;
use Think\Auths\UserSession;

class IndexController extends Controller
{
	public function index()
	{
		$this->display();
	}
}