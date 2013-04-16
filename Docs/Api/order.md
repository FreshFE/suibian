##Order

###提交订单列表
####发送
	url: order/submit
	method: GET
	params:
		user_id | true | int
		str_id | true | string  //食物Id,字符串，如：xxx,xxx,xxx(可以重复)

####返回
	//操作成功
	{
		"success": 1,
		"data": {			
			"code": ""	// 订单编号
		}
	}
	
	//操作失败
	{
		"success": 0,
		"error": "ERROR_ORDER_CREATE"，
		"error_msg": "订单提交失败"
	}
		


###获取订单列表
####发送
	
	url: order/list
	method: GET
	params:
		user_id | true | int
		status | true | int	//订单

####返回
	//操作成功
	{
		"success": 1,
		"data": {
			"id": "",			//订单编号
			"time": "",			//交易时间
			"status"： "",		//状态
			"total_price": "",	//总价
			"food_datas": [
				{
					"id": "",
					"coverpath": "",
					"title": "",
					"price": ""
				}
			]
		}
	}

	//操作失败
	{
		"success": 0,
		"error": "NO_ORDER",
		"error_msg": "您还没有订单"
	}

	//操作失败,没有登录,返回信息在general中  '未登录无权限访问统一返回'

