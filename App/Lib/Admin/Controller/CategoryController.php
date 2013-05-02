<?php

use Smartadmin\Controller\Content as Controller;

class CategoryController extends Controller {

	protected $model_name = 'ArticleCategory';

	protected $category_model = 'ArticleCategory';

	protected $category_id = 0;

	protected $pk_name = 'cid';

	public function index() {

		// cid排序
		$this->category_id = $_GET['cid'] ? $_GET['cid'] : 0;

		// 输出分类数组
		$this->assign('datas', $this->category());

		// 输出
		$this->display();
	}
}