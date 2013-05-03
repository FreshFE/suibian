<?php

use Smartadmin\Controller\Content as Controller;

class SitemapController extends Controller {

	protected $model_name = 'Category';

	protected $category_id = 1;

	protected $pk_name = 'cid';

	public function index() {

		// cid排序
		if($_GET['cid']) $this->category_id = $_GET['cid'];

		// 输出分类数组
		$this->assign('datas', $this->category());

		// 输出
		$this->display();
	}
}