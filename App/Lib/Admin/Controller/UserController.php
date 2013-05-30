<?php namespace App\Admin\Controller;

use Think\Controllers\Content as Controller;

class UserController extends Controller
{
	protected $model_name = 'User';

	protected $list_rows = 10;
}