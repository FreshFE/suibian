<?php namespace App\Shopmanager\Controller;

use Think\Controller;
use Think\Request;

class CommonController extends Controller
{
	protected $shop;

	public function __construct()
	{
		parent::__construct();

		$this->shop = Request::getStorage('shop');
	}
}