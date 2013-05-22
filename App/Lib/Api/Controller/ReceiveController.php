<?php namespace App\Api\Controller;

use Think\Controllers\Api as Controller;
use Think\Exception;
use Think\Request;

class ReceiveController extends Controller
{
	/**
	 * 模型属性
	 *
	 * @var object
	 */
	protected $model;

	/**
	 * 构造函数
	 * 生成model
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->model = $this->getModel('ReceiveAddress');
	}

	/**
	 * 商品获取
	 *
	 * @return void
	 */
	public function index()
	{
		try {

			$user = Request::getStorage('user');
			$condition['user_id'] = $user['id'];

			// 设置page
			$rows = Request::query('rows') ? Request::query('rows') : 5;
			$page = Request::query('page') ? Request::query('page') : 1;

			// 检索
			$datas = $this->model->where($condition)->page($page, $rows)->select();

			// 不存在datas时，为空
			if(!$datas) {
				$datas = array();
			}

			// 输出
			$this->successJson($datas);
		}
		catch(Exception $error) {
			$this->errorJson($error);
		}
	}
}