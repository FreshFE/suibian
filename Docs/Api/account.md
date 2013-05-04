# 账号相关接口

## JSON 字段

	{
		"id" => 1,
		"username" => "minowu",
		"email" => "minowu@foxmail.com",
		"password" => "7c4a8d09ca3762af61e59520943dc26494f8941b",
		"createline" => 1367557908
	}

## 登录账号

### Request

	url: account/login
	method: POST
	params:
		email | true | string
		password | true | string

### Response

	//操作成功
	{
		"success": 1,
		"access_token": "",
		"data": {
			// @link 参考json字段
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

---

### 注册账号

*注册成功后，返回的信息和登录同样，并在服务器记录了Session，所以前端设置为用户注册后为用户自动登录*

### Request

	url: account/register
	method: POST
	params:
		username | true | string
		email | true | string
		password | true | string

### Response

	//操作成功
	{
		"success": 1,
		"data": {
			// @link 参考json字段
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

---

## 退出账号

### Request

	url: account/logout
	method: POST
	params:
		access_token | true | string

### Response

	//操作成功
	{
		"success": 1
	}
