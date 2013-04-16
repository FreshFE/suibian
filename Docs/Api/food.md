#Food
##获取菜品列表，可根据店铺id查询
###发送
	url: food/index
	method: GET
	params:
		restaurant_id | false | int
		// access_token | false | string
###返回
	// 操作成功
	{
		"success": 1,
		"datas": [
			// @link 参考food数据库的字段
		]
	}


##获得店铺的菜品，按分类排列

	url: food/shop
	method: GET
	params:
		shop_id | false | int

	{
		"success": 1,
		"datas": [
			{
				"cid": 1,
				"name": "盖浇饭",
				"food": [
					// @link 参考food数据库字段
				]
			},

			{
				"cid": 2,
				"name": "面",
				"food": [
					// @link 参考food数据库字段
				]
			}
		]
	}

##获得用户吃过的菜品

	url: food/favorite
	method: GET
	params:
		access_token | true | string

	{
		"success": 1,
		"datas": [
			// @link 参考food数据库字段
		]
	}