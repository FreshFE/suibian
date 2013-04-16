##Food
###获取店铺菜品
####发送
	url:food/list
	method:GET
	params:
		restaurant_id | true | int
####返回
	{
		"success":1,
		"data":{
			"name":"",		//所属类别名字
			"food_data":{
				"id":"",		//菜品ID
				"logo_url":"",	//菜品logo地址
				"name":"",		//名字
				"price":""		//价格
			}
		}
	}

###获取用户喜欢的菜品
####发送
	url:food/favourite
	method:GET
	params:
		user_id | true | int

####返回
	{
		"success":1,
		"data":{
			"name":"",
			"food_data":{
				"id":"",
				"logo_url":"",
				"name":"",
				"price":""
			}	
		}
	}