#Order
##提交订单列表
###发送
	url: order/create
	method: POST
	params:
		access_token | true | int
		school | true | string
		address | true | string
		receviver | true | string
		food_id_str | true | string  // 参考如下json格式

		string:
		food_str = [
			{
				"id": 1,
				"num": 1
			}
		]

###返回
	// 操作成功
	{
		"success": 1,
		"data": [
			{
				// @link 参考order的字段
				food: [
					// @link 参考food的字段
				]
			}
		]
	}
	
	// 操作失败
	{
		"success": 0,
		"error": "ERROR_ORDER_CREATE"，
		"error_msg": "订单提交失败"
	}
		


##获取订单列表
###发送
	
	url: order/index
	method: GET
	params:
		access_token | true | int
		status | true | int | 订单状态值，参考数据库status字段

###返回
	// 操作成功
	{
		"success": 1,
		"datas": [
			// 同order/create返回
		]
	}

	// 操作失败
	{
		"success": 0,
		"error": "NO_ORDER",
		"error_msg": "您还没有订单"
	}

