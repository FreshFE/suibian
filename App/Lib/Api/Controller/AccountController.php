<?php

use Think\Controller as Controller;
use Think\Request as Request;
use Think\Lang as Lang;
use \Exception;

class AccountController extends Controller
{
	public function login()
	{
		try {
			if(Request::is('post'))
			{
				$data = M('User')->select();

				$this->assign('success', true);
				$this->assign('data', $data);
				$this->json();
			}
			else {
				throw new Exception("NO_POST_SUBMIT");
			}
		}
		catch(Exception $error) {
			$this->assign('success', false);
			$this->assign('error', $error->getMessage());
			$this->assign('error_msg', Lang::get($error->getMessage()));
			$this->json();
		}
	}
}