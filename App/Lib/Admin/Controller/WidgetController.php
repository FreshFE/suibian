<?php namespace App\Admin\Controller;

use Think\Controller;
use Think\Session;
use Think\Request;

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
		$this->assign('user', Request::getStorage('user'));
		return $this->fetch('Widget:systempanel');
	}
}