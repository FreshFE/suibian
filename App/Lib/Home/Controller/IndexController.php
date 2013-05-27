<?php namespace App\Home\Controller;

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

	// public function test()
	// {
	// 	$email = 'minowu@foxmail.com';
	// 	$password = '123456';
	// 	$salt = '275ad0af833e1c7384e10a9d6ef3ab2a';

	// 	$password = sha1($password . $salt);

	// 	$save_password = md5($email . $password . $salt);

	// 	// dump([
	// 	// 	$password,
	// 	// 	$salt,
	// 	// 	$save_password
	// 	// ]);

	// 	// 密码，6 - 16位，sha1加密，修改密码时更换
	// 	// 密码盐，md5(time())，随机数，存数据库，修改密码时才更换
	// 	// 返回给登录使用的 $cookie_password，md5($email . $password . $password_salt)

	// }
}