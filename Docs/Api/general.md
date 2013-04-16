##Api Map

###Account
	[POST] account/login
	[POST] account/register
	[POST] account/logout

###Restaurant
	[GET] restaurant/index


###Food
	[GET] food/index
	[GET] food/shop
	[GET] food/favorite

###Order
	[POST] order/create
	[GET] order/index

##

###未登录无权限访问统一返回
	{
		"success":0,
		"error":"NO_LOGINED",
		"error_msg":"用户未登录"
	}

###服务器错误返回
	{
		"success": 0，
		"error": "ERROR_SERVER"，
		"error_msg": "服务器出现了异常"
	}
