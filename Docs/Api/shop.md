# 商店相关接口

## json 字段

    {
        "id": 1,
        "shop_category_id": 1,
        "title": "百碗香排骨饭",
        "content": "",
        "hidden": 1,            // 是否公开显示，1 => 公开，0 => 未公开
        "createline": ,
        "updateline": ,
        "coverpath": "",
        "startline": ,
        "endline": ,
        "address": "",
        "areaname": ""
    }

## 获得商店列表

### Request

    url: /shop
    method: GET
    params:
        type | false | string | // 默认为“全部”，"restaurant" => 餐厅，"market" => 超市
        category | false | int | // 分类筛选条件，映射到"shop_category_id"
        page | false | int | // 默认值为1

### Response

    // 操作成功
    {
        "success": 1,
        "data": [
            // @link 参考json字段
            // 默认返回的值，均为hidden为1的值
        ]
    }