##Index
###获取店铺的列表
####发送
	url:restaurant/list
	method:GET
	params:null

####返回
	//操作成功
	{
		"success":1,
		"data":{
			"id":"",				//店铺ID
			"coverpath":"",			//店铺logo地址
			"title":"",				//店铺名字
			"workingline":"",		//营业时间
			"address":""			//店铺地址
		}
	}

	//操作失败，服务器错误，返回信息在general中  '服务器错误返回'