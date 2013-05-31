<?php namespace App\Admin\Controller;

use Think\Controllers\Content as Controller;
use Think\Redirect;
use Think\Url;
use Think\Request;
use Think\Exception;
use Think\Lang;

class ShopController extends Controller
{
	protected $model_name = 'Shop';

	protected $list_rows = 10;

	public function index_query_before()
	{
		if(Request::query('search')) {

			$search = Request::query('search');

			$this->condition['title'] = array('like', '%'.$search.'%');
		}
	}

	public function detail_query_after()
	{
		$model = $this->getModel('ShopManager');
		$data = $model
					->join('user ON shop_manager.user_id=user.id')
					->where('shop_manager.shop_id=' . $this->pk_id)
					->select();
		
		$this->assign('users', $data);
	}

	public function addmanager()
	{
		try {

			if(Request::post('email')) {
				$email = Request::post('email');

				$user = $this->getModel('User')->where(array('email' => $email))->find();

				if($user) {

					// 检查是否唯一
					$model = $this->getModel('ShopManager');
					$data = $model
								->where(array('user_id' => $user['id']))
								->find();
					if(!$data) {
						
						$count = $model->where(array('shop_id' => $this->pk_id))->count();

						if($count >= 3) {
							throw new Exception("OVER_MAX_MANAGER");
						}
						else {
							// 设置为管理员
							$id = $model->add(array(
								'user_id' => $user['id'],
								'shop_id' => $this->pk_id,
								'role' => 'admin',
								'createline' => time()
							));

							if($id) {
								Redirect::success('添加成功');
							}
							else {
								throw new Exception("ERROR_ADD_MANAGER");
							}
						}
					}
					else {
						// 当前用户已经是一个商店的管理员
						throw new Exception("EXTIS_USER_SHOP");
					}
				}
				else {
					// 不存在该电子邮件的账号
					throw new Exception("NO_EMAIL_ACCOUNT");
				}
			}
			else {
				// 没有 POST
				throw new Exception("NO_POST_EMAIL");
			}

		}
		catch(Exception $error) {
			Redirect::error(Lang::get($error->getMessage()));
		}
	}

	public function removemanager()
	{
		$model = $this->getModel('ShopManager');

		$data = $model
				->where(array('shop_id' => $this->pk_id, 'user_id' => Request::query('user_id')))
				->find();

		if($model->delete($data['id'])) {
			Redirect::success('成功移除');
		}
		else {
			Redirect::success('移除失败');	
		}
	}

	public function get_create()
	{
		$ShopCategory = $this->getModel('ShopCategory')->select();
		$this->assign('category', $ShopCategory);

		$this->display();
	}

	public function post_create()
	{
		$data = $this->model->create();

		if($data) {
			$id = $this->model->add($data);
			if($id) {
				Redirect::success('创建成功', Url::make('shop/index'));
			}
		}

		Redirect::error('创建失败', Url::make('shop/index'));
	}

	public function delete()
	{
		if($this->pk_id) {

			$id = $this->model->delete($this->pk_id);

			if($id) {
				Redirect::success('删除成功', Url::make('shop/index'));
			}
		}
	}
}