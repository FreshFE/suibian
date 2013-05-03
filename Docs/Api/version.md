# Version 相关接口

## 检查是否有新更新

### Request

    url: version/check
    method: GET
    params: none

### Response

    {
        "success": 1,
        "data": {
            "adroid": {
                "newest": "1.0.0",
                "available": "1.0.0",
                "link": "http://www.baidu.com"
            }
        }
    }