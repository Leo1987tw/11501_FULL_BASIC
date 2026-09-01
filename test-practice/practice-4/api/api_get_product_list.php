<?php

include_once "./db.php";

?>

<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php

    $category = $_GET['category'] ?? 0;

    if($category == 0){
        $products = $Product->all();
    }else {
        $current_category = $Category->find($category);
        if($current_category['parent_id'] == 0){
            $products = $Product->all(['parent_category_id' => $category]);
        }else {
            $products = $Product->all(['sub_category_id' => $current_category]);
        }
    }

    foreach($products as $product):
    
    ?>
    <tr class="pp ct">
        <td><?= $product["number"];?></td>
        <td><?= $product["name"];?></td>
        <td><?= $product["stock"];?></td>
        <td><?= $product["status"] ? "販售中" : "已下架";?></td>
        <td>
            <button onclick="location.href = '?do=edit_product&id=<?= $product['id']?>'" style="padding: 5px;">修改</button>
            <button onclick="del('Product', <?= $product['id'];?>)" style="padding: 5px;">刪除</button>
            <button onclick="status(1, <?= $product['id'];?>)" style="padding: 5px;">上架</button>
            <button onclick="status(0, <?= $product['id'];?>)" style="padding: 5px;">下架</button>
        </td>
    </tr>
    <?php
    
    endforeach;
    
    ?>
</table>

<script>
    function status(status, id){
        $.post("./api/api_status.php", {status, id}, () => {
            // location.reload();
            getProductList();
        })
    };
</script>