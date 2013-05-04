# 随便2项目文档概述

## HTTP报头规范

	// UA
	User-Agent: suibian-android-1.0.1

	// 应用版本
	X-version: android-1.0.1

	// 设备ID
	X-devid: 864449000505168

## 版本号规范

	// 版本号通过这样的方式命名，第一位为大版本，第二位为功能迭代，第三位为bug修复
	version: 1.0.0

---

## 接口全局返回问题

### 未登录无权限访问统一返回
	{
		"success":0,
		"error":"NO_LOGINED",
		"error_msg":"用户未登录"
	}

### 服务器错误返回
	{
		"success": 0，
		"error": "ERROR_SERVER"，
		"error_msg": "服务器出现了异常"
	}
