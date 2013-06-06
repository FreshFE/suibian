<?php namespace App\Home\Controller;

use Think\Controller;
use Think\Session;
use Think\Request;
use Think\Auths\UserSession;

class WidgetController extends Controller {

	public function systemTip() {

		// 如果存在session
		if(Session::check(C('JUMP_SESSION_INFO'))) {

			// 获得session内容
			$data = array(
				'info' => Session::get(C('JUMP_SESSION_INFO')),
				'status' => Session::get(C('JUMP_SESSION_STATUS'))
			);

			// 清除session
			Session::set(C('JUMP_SESSION_INFO'), null);
			Session::set(C('JUMP_SESSION_STATUS'), null);


			$this->assign('data', $data);
			return $this->fetch('Widget:systemtip');
		}

		return ;
	}

	public function systemPanel()
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

			$this->assign('user', $user);
		}

		return $this->fetch('Widget:systempanel');
	}
}