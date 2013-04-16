##Account

###登录

####发送
	url: account/login
	method: POST
	params:
		email | true | string
		password | true | string
		
####返回
	//操作成功
	{
		"success": 1,
		"data": {
			"user_id": ""
		}
	}
	//操作失败
	{
		"success": 0,
		"error": "NO_EXIST_USER",
		"error_msg": "不存在该用户名"
	}

	{
		"success": 0,
		"error": "ERROR_PASSWORD",
		"error_msg": "密码不正确"
	}

	{
		"success": 0,
		"error": "ERROR_ACCOUNT",
		"error_msg": "该账号被封锁"
	}
##

###注册
####发送

	url: account/register
	method: POST
	params:
		user | true | string
		email | true | string
		password | true | string

####返回
	
	//操作成功
	{
		"success": 1,
		"data": {
			"user_id": ""
		}
	}

	//操作失败
	{
		"sucess": 0,
		"error": "EXIST_USERNAME",
		"error": "用户名已存在"
	}

	{
		"sucess": 0,
		"error": "EXIST_EMAIL",
		"error_msg": "此邮箱已经注册"
	}
##

###退出

####发送

	url: account/logout
	method: POST
	params:
		user_id | true | string

####返回

	//操作成功
	{
		"success": 1,
		"data": null
	}
