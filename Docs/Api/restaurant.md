#Restaurant

*即将废弃的接口，不建议使用*

##获取店铺的列表

###发送
	url: restaurant/index
	method: GET
	params:
		id | false | int

###返回
	// 操作成功
	{
		"success": 1,
		"datas": [
			// @link 参考数据库shop字段
		]
	}