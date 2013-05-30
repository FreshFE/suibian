<?php namespace App\Home\Controller;

use Think\Controller;
use Think\Request;
use Think\Auths\UserSession;

class IndexController extends Controller
{
	public function index()
	{
		if(Request::getStorage('user')) {

			$user = UserSession::get();

			// 查询该用户是否有管理商店
			$data = $this->getModel('ShopManager')->where(array('user_id' => $user['id']))->find();

			if($data) {
				$this->assign('role_shop_manager', true);
			}

			// 查询该用户是否具有超级管理员权限
			if($user['role'] === 'ROLE_ADMIN') {
				$this->assign('role_admin', true);
			}

			$this->assign('role', true);
		}

		$this->display();
	}
}