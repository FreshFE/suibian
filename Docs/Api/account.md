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
			"access_token": "",		// 32位，用户检测用户是否登陆
			"user": {
				"id": 1,
				// ...
			}
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
		username | true | string
		email | true | string
		password | true | string

####返回
	
	//操作成功
	{
		"success": 1,
		"data": {
			// @link 直接参考account/login返回的数据，同理；
			// 实际处理，先注册，注册成功后，后台自动处理登录；
			// 所以返回的数据是和account/login是相同的。
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

	{
		"sucess": 0,
		"error": "ERROR_REGISTER",
		"error_msg": "注册异常"
	}
##

###退出

####发送

	url: account/logout
	method: POST
	params:
		access_token | true | string

####返回

	//操作成功
	{
		"success": 1
	}
