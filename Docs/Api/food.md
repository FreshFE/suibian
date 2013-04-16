##Food
###获取店铺菜品
####发送
	url: food/list
	method: GET
	params:
		restaurant_id | true | int
####返回
	//操作成功
	{
		"success": 1,
		"data": {
			"name": "",		//所属类别名字
			"food_datas": [
				{
					"id": "",		//菜品ID
					"coverpath": "",	//菜品logo地址
					"title": "",		//名字
					"price": ""		//价格
				}
			]
		}
	}

	//操作失败，以服务器出现异常为准

###获取用户喜欢的菜品
####发送
	url: food/favourite
	method: GET
	params:
		user_id | true | int

####返回
	//操作成功
	{
		"success": 1,
		"data": {
			"name": "",
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

	//操作失败，以服务器出现异常为准