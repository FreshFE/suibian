# Order

## 订单 JSON 字段

### Order JSON

	{
		"id": 1,
		"user_id": 1,
		"shop_id": 1,
		"price": "22.00",
		"school": "",
		"address": "",
		"receiver": "",
		"phone": "",
		"status": 0,
		"createline": 0,
		"updateline": 0
	}

### OrderProduct JSON

	{
		"id": 1,
		"orders_id": 1,
		"product_id": 1,
		"num": 2,
		"createline": 0,
		"updateline": 0
	}

## 提交订单列表

### Request

	url: order/create
	method: POST
	params:
		access_token | true | int
		school | true | string
		address | true | string
		receiver | true | string
		phone | true | string
		food_id_str | true | string  // 参考如下json格式

		string:
		food_str = [
			{
				"id": 1,
				"num": 1
			}
		]

### Response

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

---

## 获取订单列表
### Request

	url: order/index
	method: GET
	params:
		access_token | true | int
		status | true | int | 订单状态值，参考数据库status字段

		// 计划废弃中，请不要使用，但优先级高于status，即不存在history的情况下才计算status
		history | true | int | 0 => 当前订单， 1 => 历史订单

### Response

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

---

## 获得收件学校

### Request

	url: order/school
	method: GET
	params: none

### Response

	// 操作成功
	{
		"success": 1,
		"data": [
			"云南大学",
			// ...
		]
	}

## 获得订单详情

### Request

	url: order/detail
	method: GET
	params:
		order_id | true | int | // 映射到order_id

### Response

	// 操作成功
	{
		"success": 1,
		"data": [
			{
				"id": 1,
				"orders_id": 1,
				"orders": {
					// @link 参考 Orders JSON
				},
				"product_id": 1,
				"product": {
					// @link 参考 Product JSON
				},
				"num": 3,
				"createline": 0,
				"updateline": 0
			}
		]
	}