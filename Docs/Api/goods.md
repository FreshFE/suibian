# 商品相关接口

## json 字段

    {
        "id": 1,
        "goods_category_id": 1,
        "shop_id": 1,
        "title": "盖浇饭",
        "price": "18.00",
        "content": "",
        "hidden": 1,
        "createline": ,
        "updateline": ,
        "coverpath": ""
    }

## 获得商品列表

### Request

    url: /goods
    method: GET
    params:
        shop | false | int | // 映射到"shop_id"，默认为全部
        category | false | int | // 映射到"goods_category_id"，默认为全部
        page | false | int | // 默认为1

### Response

    {
        "success": 1,
        "data": [
            // @link 参考json字段
        ]
    }