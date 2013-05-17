<?php namespace App\Api\Controller;

use Smartadmin\Controller\Api as Controller;
use Think\Lang as Lang;
use Think\Exception as Exception;

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

		$this->model = D('Shop');
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
			if(isset($_GET['type'])) {

				$type = $_GET['type'];

				if($type == 'restaurant') {
					$condition['shop_category_id'] = 1;
				}
				else if($type == 'market') {
					$condition['shop_category_id'] = 2;
				}
			}

			// 是否存在category字段，存在则覆盖type
			if(isset($_GET['category'])) {
				$condition['shop_category_id'] = $_GET['category'];
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