<?php namespace App\Shopmanager\Controller;

use Think\Controller as Controller;
use Think\Session as Session;

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
}