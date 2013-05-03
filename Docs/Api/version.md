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
            "last_version": "1.0.0",
            "last_version_code": 1,
            "last_update": "http://baidu.com"
        }
    }