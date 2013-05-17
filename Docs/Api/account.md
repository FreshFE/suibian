# 账号相关接口

## JSON 字段

	{
		"id" => 1,
		"email" => "minowu@foxmail.com",
		"username" => "minowu",
		"createline" => 1367557908,
		"coverpath" => "",
		"role" => "USER_MEMBER",
		"buy_counts" => 20
	}

## 密码说明

	// 密码，6 - 16位，sha1加密，修改密码时更换
		$password = sha1('123456');

	// 密码盐，md5(time())，随机数，存数据库，修改密码时才更换
		$password_salt = md5(time());

	// 返回给登录使用的
		$password_cookie = md5($email . $password . $password_salt);

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
		"data": {
			// @link 参考json字段
		}
	}

	// 操作成功 COOKIE 相关的变化
	SUIIBIANUSERAUTH: 908a196790117fa01da6761cfca46cc3 // 对应 $password_cookie
	PHPSESSID: a1ce1ff644c4d26f81fa25c0dd51e4c2 // 对应 TOKEN

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
		"error": "FORBIDDEN_ACCOUNT",
		"error_msg": "该账号被封锁"
	}

	{
		"success": 0,
		"error": "ERROR_ACCOUNT",
		"error_msg": "账号错误"
	}

---

### 注册账号

*注册成功后，返回的信息和登录同样，并在服务器记录了Session，返回Cookie，所以前端设置为用户注册后为用户自动登录*

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

### auth

	logined: require		// 用户必须在登录状态下才可使用该接口
	role: USER_MEMBER

### Request

	url: account/logout
	method: POST
	params: none

### Response

	//操作成功
	{
		"success": 1,
		"data": {
			"username": "",
			"coverpath": ""
		}
	}
