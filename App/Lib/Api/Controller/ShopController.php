<?php namespace App\Api\Controller;

use Think\Controllers\Api as Controller;
use Think\Lang;
use Think\Exception;
use Think\Request;

class ShopController extends Controller
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

		$this->model = $this->getModel('Shop');
	}

	/**
	 * 获得商店相关的列表
	 *
	 * @return void
	 */
	// --------------------------------------------------
	// TODO:
	//
	// 修改数据库模型，
	// 添加shop_category_id字段和表、startline、endline字段，
	// 删除bussinesshours字段
	// --------------------------------------------------
	public function index()
	{
		try {
			// 默认显示公开信息
			$condition = array('hidden' => 1);

			// 是否存在type，便捷方法
			if(Request::query('type')) {

				$type = Request::query('type');

				if($type == 'restaurant') {
					$condition['shop_category_id'] = 1;
				}
				else if($type == 'market') {
					$condition['shop_category_id'] = 2;
				}
			}

			// 是否存在category字段，存在则覆盖type
			if(Request::query('category')) {
				$condition['shop_category_id'] = Request::query('category');
			}

			// 设置page
			$rows = Request::query('rows') ? Request::query('rows') : 10;
			$page = Request::query('page') ? Request::query('page') : 1;

			// 检索
			$datas = $this->model->where($condition)->page($page, $rows)->select();

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