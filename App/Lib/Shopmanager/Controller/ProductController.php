<?php namespace App\Shopmanager\Controller;

use Think\Request;
use Think\Library\Category;
use Think\Redirect;
use Think\Url;
use Think\Response;
use Think\Library\Upload\Upload;

/**
 * 产品控制器
 */
class ProductController extends CommonController
{
	/**
	 * 模型存放
	 *
	 * @var object
	 */
	protected $model;

	/**
	 * 模型名
	 *
	 * @var string
	 */
	protected $model_name = 'Product';

	/**
	 * 上传封面图片的尺寸
	 *
	 * @string
	 */
	protected $cover_thumb_name = '400x400,480x800,thumb';

	/**
	 * 主键名称
	 *
	 * @var string
	 */
	protected $pk_name = 'id';

	/**
	 * 主键存放
	 *
	 * @var int
	 */
	protected $pk_id;

	/**
	 * 构造函数
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		// 创建主模型
		$this->model = $this->getModel($this->model_name);

		// 保存id
		$this->pk_id = $_GET[$this->pk_name];

		// 输出缩略图名称
		if($this->cover_thumb_name)
		{
			$thumb = explode(',', $this->cover_thumb_name);
			$this->assign('coverThumbSize', $thumb[0]);
		}
	}

	/**
	 * 首页方法
	 *
	 * @return void
	 */
	public function index()
	{
		// 筛选条件
		$condition['shop_id'] = $this->getShopId();

		// 分类筛选
		if(Request::query('product_category_id')) {
			$condition['product_category_id'] = Request::query('product_category_id');
		}

		$datas = $this->model->where($condition)->select();
		$this->assign('datas', $datas);
		$this->display();
	}

	/**
	 * 添加一个新的记录
	 *
	 * @return void
	 */
	public function add()
	{
		$product_category_id = $this->getModel('ProductCategory')->where(array('shop_id' => $this->getShopId()))->getField('id');

		$default = array(
			"product_category_id" => $product_category_id,
			"shop_id" => $this->getShopId(),
			"title" => "未命名",
			"price" => 20,
			"content" => "介绍",
			"hidden" => 0,
			"createline" => time(),
			"updateline" => time(),
			"coverpath" => "",
			"buy_counts" => 0
		);

		$model = $this->getModel('Product');
		$id = $model->add($default);

		if(!$id) {
			Redirect::error('创建失败');
		}

		Redirect::success('创建成功', Url::make('edit', array('id' => $id)));
	}

	/**
	 * Update Action
	 * 编辑
	 *
	 * @return void
	 */
	public function get_edit()
	{
		$this->pk_id = $_GET['id'];
		$this->model = $this->getModel('Product');

		if($this->pk_id)
		{
			$data = $this->model->find($this->pk_id);

			$this->assign('data', $data);
			$this->assign('category', $this->category());
			$this->display();
		}
		else {
			Response::_404('不存在id值');
		}
	}

	/**
	 * 编辑
	 *
	 * @return void
	 */
	public function post_edit()
	{
		$model = $this->getModel('Product');
		$data = $model->create();
		$model->save($data);
		Redirect::success('编辑成功', Url::make('index'));
	}

	/**
	 * 获得分类数据
	 *
	 * @return void
	 */
	public function category()
	{
		return $this->getModel('ProductCategory')->where(array('shop_id' => $this->getShopId()))->select();
	}

	/**
	 * Upload cover image and update 'coverpath'
	 * 封面上传并写入主模型
	 *
	 * @return void
	 */
	public function cover()
	{
		// 上传图片
		$info = Upload::image($_FILES['uploadify_file'], $this->cover_thumb_name);

		// 建立数据表
		$id = $this->model->where(array('id' => $_POST['id']))->save(array('coverpath' => $info['name']));

		if(!$id) {
			Response::json(array("success" => 0));
		}

		// 输出JSON
		Response::json($info);
	}

	/**
	 * Update model hidden
	 * 编辑model的hidden字段
	 *
	 * @return void
	 */
	public function enable()
	{
		if($this->pk_id) {

			$data = $this->model->find($this->pk_id);
			$this->model->hidden = !$this->model->hidden;
			$this->model->save();

			Redirect::success('状态发布成功');
		}
	}

	/**
	 * Delete
	 * 删除
	 *
	 * @return void
	 */
	public function delete()
	{
		if($this->pk_id) {

			$this->model->delete($this->pk_id);
			Redirect::success('删除成功');
		}
	}

	/**
	 * Read category for sidebar widget
	 * 侧边栏调用小组件
	 *
	 * @return void
	 */
	public function sidebar()
	{
		// 侧边分栏
		$this->assign('category', $this->category());
		return $this->fetch('sidebar');
	}
}