<?php namespace App\Shopmanager\Controller;

use Think\Request;
use Think\Library\Category;
use Think\Redirect;
use Think\Url;

class CategoryController extends CommonController
{
	public function index()
	{
		// 得到模型
		$model = $this->getModel('ProductCategory');

		// 设置查询项
		$condition = array('shop_id' => $this->shop['id']);

		// 获取
		$datas = $model->where($condition)->select();

		// 赋值
		$this->assign('datas', $datas);

		// 输出
		$this->display();
	}

	public function get_create()
	{
		$this->display();
	}

	public function post_create()
	{
		$model = $this->getModel('ProductCategory');

		$data = $model->create();

		if(!$data) {
			Redirect::error($model->getError());
		}

		$data['shop_id'] = $this->shop['id'];

		$id = $model->add($data);

		if(!$id) {
			Redirect::error($model->getError());
		}

		Redirect::success('分类创建成功', Url::make('index'));
	}

	public function get_edit()
	{
		if(Request::query('id')) {
			$id = Request::query('id');
		}

		$model = $this->getModel('ProductCategory');
		$data = $model->find($id);
		$this->assign('data', $data);
		$this->display('create');
	}

	public function post_edit()
	{
		$model = $this->getModel('ProductCategory');

		$data = $model->create();

		if(!$data) {
			Redirect::error($model->getError());
		}

		$id = $model->save($data);

		if(!$id) {
			Redirect::error($model->getError());
		}

		Redirect::success('分类编辑成功', Url::make('index'));
	}

	public function delete()
	{
		if(!Request::query('id')) {
			Redirect::error('删除哪个？');
		}

		$model = $this->getModel('ProductCategory');

		$rows = $model->delete(Request::query('id'));

		if(!$rows) {
			Redirect::error('删除失败');
		}

		Redirect::success('分类成功删除');
	}
}