<?php namespace App\Admin\Controller;

use Think\Controllers\Content as Controller;
use Think\Request;

class UserController extends Controller
{
	protected $model_name = 'User';

	protected $list_rows = 10;

	public function index_query_before()
	{
		if(Request::query('search')) {

			$search = Request::query('search');

			$this->condition['username'] = array('like', '%'.$search.'%');
			$this->condition['email'] = array('like', '%'.$search.'%');
			$this->condition['_logic'] = 'or';
		}
	}
}