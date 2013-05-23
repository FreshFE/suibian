<?php namespace App\Shopmanager\Controller;

use Think\Request;
use Think\Library\Category;
use Think\Redirect;
use Think\Url;
use Think\Response;
use Think\Library\Upload\Upload;

class ProductController extends CommonController
{
	protected $model;

	protected $model_name = 'Product';

	protected $cover_thumb_name = '400x400,480x800,thumb';

	protected $pk_name = 'id';

	protected $pk_id;

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

	public function index()
	{
		$model = $this->getModel('Product');
		$condition['shop_id'] = $this->getShopId();
		$datas = $model->where($condition)->select();
		$this->assign('datas', $datas);
		$this->display();
	}

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

	public function post_edit()
	{
		$model = $this->getModel('Product');
		$data = $model->create();
		$model->save($data);
		Redirect::success('编辑成功', Url::make('index'));
	}

	// public function sidebar()
	// {
	// 	return ;
	// }

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