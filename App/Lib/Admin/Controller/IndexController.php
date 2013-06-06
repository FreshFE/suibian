<?php namespace App\Admin\Controller;

use Think\Controller;
use Think\Redirect;
use Think\Url;

class IndexController extends Controller
{
	public function index()
	{
		Redirect::success('', Url::make('user/index'));
	}
}