<?php namespace App\Admin\Controller;

use Smartadmin\Controller\Content as Controller;
use Think\Redirect as Redirect;
use Think\Url as Url;
use Think\Config as Config;

class FoodController extends Controller
{
	protected $model_name = 'Food';

	protected $image_thumb_name = 'thumb';

	protected $cover_thumb_name = 'thumb';

	protected $category_id = 1;

	protected $list_order = 'id DESC';

	public function index()
	{
		if(isset($_GET['shop']))
		{
			$this->condition['shop_id'] = $_GET['shop'];
		}

		parent::index();
	}

	protected function get_edit_query_after()
	{
		$datas = M('Shop')->field('id,title')->select();
		$this->assign('shops', $datas);
	}
}