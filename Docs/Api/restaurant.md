##Index
###获取店铺的列表
####发送
	url:restaurant/list
	method:GET
	params:null

####返回
	{
		"success":1,
		"data":{
			"id":"",				//店铺ID
			"logo_url":"",			//店铺logo地址
			"name":"",				//店铺名字
			"business_time":"",		//营业时间
			"address":""			//店铺地址
		}
	}