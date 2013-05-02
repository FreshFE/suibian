<?php

use Smartadmin\Controller\Content as Controller;
use Think\Request as Request;
use Think\Redirect as Redirect;
use Think\Url as Url;

class QuestionController extends Controller
{
	protected $model_name = 'Question';

	protected $cover_thumb_name = 'thumb';

	public function get_edit_query_after()
	{
		// 获取体质分类
		$constitutions = D('Constitution')->where(array('hidden' => 1))->select();
		$this->assign('constitutions', $constitutions);
	}

	public function index_query_after()
	{
		// 查询
		$constitutions = D('Constitution')->field('id,title')->where(array('hidden' => 1))->select();

		// 整理
		foreach ($constitutions as $key => &$value) {
			$id = $value['id'];
			$temp[$id] = $value['title'];
		}

		// 输出
		$this->assign('constitutions', $temp);
	}
}