<?php

use Smartadmin\Controller\Api as Controller;
use Think\Lang as Lang;
use Think\Exception as Exception;

class GoodsController extends Controller
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

		$this->model = D('Food');
	}

	/**
	 * 商品获取
	 *
	 * @return void
	 */
	public function index()
	{
		try {
			// 默认显示公开信息
			$condition = array('hidden' => 1);

			// 是否存在category字段，存在则覆盖type
			if(isset($_GET['shop'])) {
				$condition['shop_id'] = $_GET['shop'];
			}

			// 设置page
			$rows = isset($_GET['rows']) ? $_GET['rows'] : 10;
			$page = isset($_GET['page']) ? $_GET['page'] : 1;

			// 检索
			$datas = $this->model->where($condition)->page($page, $rows)->select();

			// 输出
			$this->successJson($datas);
		}
		catch(Exception $error) {
			$this->errorJson($error);
		}
	}
}