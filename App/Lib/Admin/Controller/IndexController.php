<?php

use Think\Controller as Controller;
use Think\Auth as Auth;

class IndexController extends Controller
{
	public function index()
	{
		$this->display();
	}
}