<?php namespace App\Shopmanager\Controller;

use Think\Controller;
use Think\Request;
use Think\Redirect;
use Think\Url;

class IndexController extends Controller
{
	public function index()
	{
		Redirect::success('', Url::make('shop/index'));
	}
}