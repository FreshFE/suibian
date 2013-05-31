<?php namespace App\Api\Controller;

use Think\Controllers\Api as Controller;
use Think\Request;
use Think\Exception;
use Think\Log;
use Think\Auths\UserSession;

class OrderController extends Controller
{
	protected $log_key;

	protected function create_log($info)
	{
		if(is_null($this->log_key))
		{
			$this->log_key = isset($_SERVER['HTTP_X_DEV_ID']) ? $_SERVER['HTTP_X_DEV_ID'] : $_SERVER['HTTP_USER_AGENT'];
		}

		$output = array(
			"status" => $info,
			"key" => $this->log_key,
			"datetime" => date('Y-m-d H:i:s', time())
		);

		Log::info('Orders', $output);
	}

	/**
	 * 创建订单
	 *
	 * @return void
	 */
	public function post_create()
	{
		try {
			// 订单id的数组
			$orders = array();

			// 不存在 food_id_str 捕获错误
			if(!Request::post('food_id_str'))
			{
				throw new Exception("NO_FOODS");
			}

			// 记录开始
			$this->create_log('Start');

			// 解析字符串获得数组
			$foods = json_decode(Request::post('food_id_str'), true);

			// 排序
			sort($foods);

			foreach ($foods as $key => $food) {
				$temp[] = $food['id'];
			}

			// 查询条件
			$condition['id'] = array('in', implode(',', $temp));

			// 查询商店信息
			$shops = M('Product')->group('shop_id')->field('shop_id')->where($condition)->select();
			
			$foods_temp = $this->parse_foods($foods);

			$orderJson = array();

			// 遍历商店id，确定建立的订单数量
			foreach ($shops as $key => $shop) {
				$orderJson[] = $this->add_order($shop['shop_id'], $foods_temp);
				sleep(0.5);
			}

			if(count($orderJson) > 0)
			{
				$this->setReceiveAddress();

				$this->create_log('End');

				$this->successJson($orderJson);
			}
			else {
				throw new Exception("ERROR_ORDERS_CREATE");
			}
		}
		catch(Exception $error) {
			$this->errorJson($error);
		}
	}

	protected function setReceiveAddress()
	{
		$condition = array(
			"user_id" => UserSession::getId(),
			"school" => Request::post('school'),
			"address" => Request::post('address'),
			"receiver" => Request::post('receiver'),
			"phone" => Request::post('phone')
		);

		$model = $this->getModel('ReceiveAddress');

		$data = $model->where($condition)->find();

		// 存在则更新
		if($data) {
			$model->where(array('id' => $data['id']))->save(array("updateline" => time()));
		}
		// 不存在则写入
		else {

			$condition['createline'] = time();
			$condition['updateline'] = time();

			$model->add($condition);
		}

		return true;
	}

	protected function parse_foods($foods)
	{
		// 建立 orders_food表
		foreach ($foods as $key => $value) {
			$temp[$value['id']] = $value['num'];
		}

		return $temp;
	}

	protected function add_order($shop_id, $foods)
	{
		// --------------------------------------------------
		// 建立订单表 orders表
		// --------------------------------------------------
		try {

			// 创建数据并检查
			$data = D('Orders')->create();

			if(!$data) {
				throw new Exception(D('Orders')->getError());
			}

			// 订单数据
			$orders = array(
				'user_id' => UserSession::getId(),
				'shop_id' => $shop_id,
				'price' => 0
			);

			// 合并
			$orders = array_merge($orders, $data);

			// 创建到数据表
			$orders_id = M('Orders')->add($orders);

			// $this->json(array('uu' => 1, 'hh' => $orders_id));

			// 订单创建失败
			if(!$orders_id) {
				throw new Exception("ERROR_ORDERS");
			}
		}
		catch(Exception $error)
		{
			$this->errorJson($error);
		}

		// --------------------------------------------------
		// 创建orders_food表
		// --------------------------------------------------

		try {
			// 获得foods属性的key
			$keys = array_keys($foods);

			// 在符合id和shop_id内查找相关的id值
			$condition['id'] = array('in', join($keys, ','));
			$condition['shop_id'] = $orders['shop_id'];

			// 查询并得到结果
			$datas = M('Product')->field('id,price')->where($condition)->select();

			$total_price = 0;
			
			foreach ($datas as $key => $value) {
				$arr[] = array(
					'orders_id' => $orders_id,
					'product_id' => $value['id'],
					'num' => $foods[$value['id']],
					'createline' => time(),
					'updateline' => time()
				);

				// 计算价格 单价 * 数量
				$total_price += $value['price'] * $foods[$value['id']];
			}

			// 添加orders和food表之间的关系
			M('OrdersProduct')->addAll($arr);

			// 更新价格
			M('Orders')->where(array('id' => $orders_id))->save(array('price' => $total_price));

			return $orders_id;
		}
		catch(Exception $error)
		{
			$this->errorJson($error);
		}
	}

	public function get_index()
	{
		try {

			// 用户id
			$condition['user_id'] = UserSession::getId();

			// 根据 Status 判断
			// 允许status为0
			if(Request::query('status') || Request::query('status') !== 0) {

				$status = Request::query('status');

				// 非数字时，解析字符串为数字
				if(!is_numeric($status)) {
					switch ($status) {
						case 'new':
							$status = array('between', '0,9');
							break;

						case 'refuse':
							$status = array('between', '10,19');
							break;

						case 'doing':
							$status = array('between', '20,29');
							break;

						case 'finish':
							$status = array('between', '30,39');
							break;
						
						default:
							throw new Exception("ERROR_GET_STATUS");
							break;
					}
				}
				
				// 加入查询条件
				$condition['status'] = $status;
			}
			// 不存在则返回错误
			else {
				throw new Exception("NO_GET_STATUS");
			}

			$datas = $this->getModel('Orders')->where($condition)->limit(10)->order('id DESC')->selectJoin();

			// if(!$datas) {
			// 	$datas = array();
			// }

			$this->successJson($datas);
		}
		catch(Exception $error) {
			$this->errorJson($error);
		}
	}

	public function get_detail()
	{
		try {
			if(Request::query('orders_id')) {
				$condition['orders_id'] = Request::query('orders_id');
			}
			else {
				throw new Exception("NO_POST_ORDER");
			}

			$model = $this->getModel('OrdersProduct');

			$datas = $model->where($condition)->selectWithJoin();

			$this->successJson($datas);
		}
		catch(Exception $error) {
			$this->errorJson($error);
		}
	}

	/**
	 * 在创建订单的时候预设拿到的学校列表
	 *
	 * @return void
	 */
	public function get_school()
	{
		$datas = array(
			"云南大学",
			"昆明理工大学",
			"云南师范大学",
			"云南民族大学",
			"昆明医学院",
			"云南艺术学院",
			"云南中医学院",
			"昆明学院",
			"云南广播电视大学",
			"云南医学高等专科学校",
			"云南交通职业技术学院",
			"云南财经大学"
		);

		$this->successJson($datas);
	}
}