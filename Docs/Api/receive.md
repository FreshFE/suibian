# 收件地址

## JSON 字段

    {
        "id": "",
        "user_id": "",
        "school": "",
        "address": "",
        "receiver": "",
        "createline": "",
        "updateline": ""
    }

## 获取地址

### Request

    url: receive/index
    method: GET
    param:
        token | true | string

### Response

    {
        "success": 1,
        "data": [
            {
                // @link 参考 JSON字段
            },
            {

            }
        ]
    }