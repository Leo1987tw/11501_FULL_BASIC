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
    
    $items = $Items->all();

    foreach($items as $item):
    
    ?>
    <tr class="pp ct">
        <td><?= $item["number"];?></td>
        <td><?= $item["name"];?></td>
        <td><?= $item["stock"];?></td>
        <td><?= $item["sh"] ? "販售中" : "以下架";?></td>
        <td>
            <button onclick="location.href = '?do=edit_item&id=<?= $item['id']?>'" style="padding: 5px;">修改</button>
            <button onclick="del('Items', <?= $item['id'];?>)" style="padding: 5px;">刪除</button>
            <button onclick="sh(1, <?= $item['id'];?>)" style="padding: 5px;">上架</button>
            <button onclick="sh(0, <?= $item['id'];?>)" style="padding: 5px;">下架</button>
        </td>
    </tr>
    <?php
    
    endforeach;
    
    ?>
</table>

<script>
    function sh(type, id){
        $.post("./api/api_show.php", {type, id}, () => {
            // location.reload();
            getItemList();
        })
    };
</script>