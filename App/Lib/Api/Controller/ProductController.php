<?php namespace App\Api\Controller;

use Think\Controllers\Api as Controller;
use Think\Lang;
use Think\Exception;
use Think\Request;

class ProductController extends Controller
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

		$this->model = $this->getModel('Product');
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
			if(Request::query('shop')) {
				$condition['shop_id'] = Request::query('shop');
			}
			else {
				throw new Exception("NO_POST_SHOP");
			}

			// 分类查找
			if(Request::query('category')) {
				$condition['product_category_id'] = Request::query('category');
			}

			// 设置page
			$rows = Request::query('rows') ? Request::query('rows') : 10;
			$page = Request::query('page') ? Request::query('page') : 1;

			// 检索
			$datas = $this->model->where($condition)->page($page, $rows)->selectJoin();

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

	public function category()
	{
		try {

			// 未获得Shop的值
			if(!Request::query('shop')) {
				throw new Exception("NO_POST_SHOP");
			}

			$condition['shop_id'] = Request::query('shop');

			$model = $this->getModel('ProductCategory');
			$datas = $model->where($condition)->select();

			if(!$datas) {
				$datas = array();
			}

			$this->successJson($datas);
		}
		catch(Exception $error) {
			$this->errorJson($error);
		}
	}

	public function random()
	{
		try {

			// 获得商店相关
			$shopIds = $this->getShopIdsByType();

			// 获得产品相关
			$productIds = $this->getProductIds($shopIds);

			// 获得模型
			$model = $this->getModel('Product');

			// 初始化 $data
			$data = false;

			// 循环
			while ($data === false) {
				
				// 数组随机数
				$rand = array_rand($productIds);

				// 根据随机数获得ID
				$id = $productIds[$rand];

				// 获取
				$data = $model->where(array('id' => $id))->find();
			}

			$this->successJson($data);
		}
		catch(Exception $error) {
			$this->errorJson($error);
		}
	}

	protected function getProductIds($shopIds)
	{
		$model = $this->getModel('Product');
		$condition = array('shop_id' => array('in', join($shopIds, ',')));
		$datas = $model->where($condition)->field('id')->select();

		// 遍历
		foreach ($datas as $key => $value) {
			$temp[] = $value['id'];
		}

		return $temp;
	}

	protected function getShopIdsByType($type = 'restaurant')
	{
		// 解析类型
		if($type == 'restaurant') {
			$condition['shop_category_id'] = 1;
		}
		else if($type == 'market') {
			$condition['shop_category_id'] = 2;
		}

		// 获取
		$datas = $this->getModel('Shop')->where($condition)->field('id')->select();

		// 遍历
		foreach ($datas as $key => $value) {
			$temp[] = $value['id'];
		}

		return $temp;
	}
}