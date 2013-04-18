<?php

use Think\Controller as Controller;
use Think\Request as Request;
use Think\Lang as Lang;
use Think\Session as Session;
use \Exception;

class AccountController extends Controller
{
	// 登陆
	public function login()
	{
		try {
			if(Request::is('post'))
			{
				$data = M('User')->select();

				// 获取一个session_id
				$access_token = session_id();

				// 储存session
				Session::set($access_token, $data['id']);

				$data['access_token'] = $access_token;
				$this->assign('success', 1);
				$this->assign('data', $data);
				$this->json();
			}
			else {
				throw new Exception("NO_POST_SUBMIT");
			}
		}
		catch(Exception $error) {
			$this->assign('success', 0);
			$this->assign('error', $error->getMessage());
			$this->assign('error_msg', Lang::get($error->getMessage()));
			$this->json();
		}
	}

	// 注册
	public function register()
	{
		try {

			if(Request::is('post'))
			{
				$User = M('User');

				$User->username   = $_POST['username'];
				$User->email      = $_POST['email'];
				$User->password   = $_POST['password'];
				$User->createline = time();

				$User->add();

				if($flag)
				{
					// $this->assign('success', 1);
					// $this->assign('data', ？？？？);
					// $this->json();
				} 
				else {
					$this->assign('success', 0);
					$this->assign('error', $error->getMessage());
					$this->assign('error_msg', Lang::get($error->getMessage()));
				}
			}
			else {
				throw new Exception("NO_POST_SUBMIT");
			}

		}
		catch(Exception $error) {
			$this->assign('success', 0);
			$this->assign('error', $error->getMessage());
			$this->assign('error_msg', Lang::get($error->getMessage()));
		}
	}

	// 退出
	public function logout() {
		try {

			if(Request::is('post'))
			{
				$condition['access_token'] = $_POST['access_token'];

				//??????处理退出

				$this->assign('success', 1);
				$this->json();

			}
			else {
				throw new Exception("NO_POST_SUBMIT");
			}

		}
		catch(Exception $error) {
			$this->assign('success', 0);
			$this->assign('error', $error->getMessage());
			$this->assign('error_msg', Lang::get($error->getMessage()));
		}
	}
}