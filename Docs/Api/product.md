# 商品相关接口

## JSON 字段

### 产品 JSON

    {
        "id": 1,
        "product_category_id": 1,
        "shop_id": 1,
        "title": "盖浇饭",
        "price": "18.00",
        "content": "",
        "hidden": 1,
        "createline": ,
        "updateline": ,
        "coverpath": "",
        "buy_counts": 12
    }

### 产品分类 JSON

    {
        "id": 1,
        "fid": 0,
        "name": "盖浇饭",
        "priority": 1
    }

## 获得产品列表

### Request

    url: /product
    method: GET
    params:
        shop | true | int | // 映射到"shop_id"，默认为全部
        category | false | int | // 映射到"goods_category_id"，默认为全部
        rows | false | int | // 每次请求多少数据，默认为 20
        page | false | int | // 默认为1

### Response

    {
        "success": 1,
        "data": [
            // @link 参考json字段
        ]
    }

## 获得产品分类列表

### Request

    url: /product/category
    method: GET
    params:
        shop | true | int | // 映射到shop_id，商店ID，必要

### Response

    {
        "success": 1,
        "data": [
            {
                // @link 参考产品分类 JSON
            }
        ]
    }