# 收件地址

## JSON 字段

    {
        "id": "",
        "user_id": "",
        "school": "",
        "address": "",
        "receiver": "",
        "phone": "",
        "createline": "",
        "updateline": ""
    }

## 获取地址

### Security

    logined: require
    role: USER_MEMBER

### Request

    url: receive/index
    method: GET
    param:
        rows | false | int | 默认返回5条

### Response

    {
        "success": 1,
        "data": [
            {
                // @link 参考 JSON字段
            }
        ]
    }