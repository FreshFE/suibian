<?php namespace App\Api\Controller;

use Think\Controllers\Api as Controller;
use Think\Session;
use Think\Cookie;
use Think\Config;
use Think\Exception;
use Think\Request;
use Think\Log;
use Think\Auths\Authentication;

class AccountController extends Controller
{
	/**
	 * 登录接口
	 * 根据用户提交的email和password匹配账号
	 * 登录后写入session
	 *
	 * @return void
	 */
	public function post_login()
	{
		// Log::info('login', array($_SERVER, $_POST, $_GET));

		// 初始化模型
		$model = $this->getModel('User');

		// 查找email相应的值
		$data = $model
			->where(array(
				'email' => Request::post('email')
			))
			->find();

		// ERROR: 不存在该用户
		if(!$data) {
			return $this->errorJson('NO_EXIST_USER');
		}

		// ERROR: 提交密码为空
		if(!Request::post('password')) {
			return $this->errorJson('NO_POST_PASSWORD');
		}

		$password = Request::post('password');

		// ERROR: 密码不正确
		if(sha1($password . $data['password_salt']) !== $data['password']) {
			return $this->errorJson('ERROR_PASSWORD');
		}

		// TODO
		// ERROR: 账号被封锁

		// 通过认证
		$this->setAuthentication($data);
	}

	public function post_register()
	{
		// 初始化模型
		$model = $this->getModel('User');

		$data = $model->create();

		// 创建数据
		if(!$data) {
			return $this->errorJson($model->getError());
		}

		// 生成 盐 和 密码
		$data['password_salt'] = md5(time());
		$data['password'] = sha1($data['password'] . $data['password_salt']);

		$id = $model->add($data);

		if(!$id) {
			return $this->errorJson('ERROR_REGISTER');
		}

		// 重新获取用户
		$data = $model->find($id);

		// 通过认证
		$this->setAuthentication($data);
	}

	public function post_logout()
	{
		$driver = new Authentication();
		$driver->remove();

		$this->successJson();
	}

	protected function setAuthentication($user)
	{
		$driver = new Authentication();
		$session = $driver->save($user, true);
		
		$this->successJson($session);
	}
}