<?php namespace App\Shopmanager\Controller;

use Think\Library\Upload\Upload;
use Think\Response;
use Think\Redirect;

class ShopController extends CommonController
{
	protected $cover_thumb_name = '400x400,480x800,thumb';
	
	public function get_index()
	{
		$model = $this->getModel('Shop');
		$data = $model->find($this->getShopId());
		$this->assign('data', $data);
		$this->display();
	}

	public function post_index()
	{
		$model = $this->getModel('Shop');
		$data = $model->create();
		$id = $model->save($data);

		if($id) {
			Redirect::success('编辑成功');
		}
		else {
			Redirect::error('编辑失败');
		}
	}

	public function face()
	{
		$data = $this->getModel('Shop')->find($this->getShopId());
		$this->assign('data', $data);
		$this->display();
	}

	public function cover()
	{
		// 上传图片
		$info = Upload::image($_FILES['uploadify_file'], $this->cover_thumb_name);

		// 建立数据表
		$id = $this->getModel('Shop')->where(array('id' => $this->getShopId()))->save(array('coverpath' => $info['name']));

		if(!$id) {
			Response::json(array("success" => 0));
		}

		// 输出JSON
		Response::json($info);
	}
}