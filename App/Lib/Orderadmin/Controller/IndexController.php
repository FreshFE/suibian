<?php

use Think\Controller as Controller;
use Think\Redirect as Redirect;

class IndexController extends Controller
{
	public function index()
	{
		Redirect::success('welcome');
	}
}