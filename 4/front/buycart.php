<?php

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

if(isset($_GET['id'])){
    $_SESSION['cart'][$_GET['id']] = $_GET['quantity'];
}

if(!isset($_SESSION['member'])){
    to("?do=login");
    exit();
}

?>

<h2><?= $_SESSION['member'];?>的購物車</h2>

<!-- table.all>tr.tt.ct>td*7 -->
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>
    <?php
    
    foreach($_SESSION['cart'] as $key => $value):
        $item = $Items->find($key);
    
    ?>
    <tr class="pp">
        <td>
            <?= $item['number'];?>
        </td>
        <td>
            <?= $item['name'];?>
        </td>
        <td>
            <?= $value;?>
        </td>
        <td>
            <?= $item['stock'];?>
        </td>
        <td>
            <?= $item['price'];?>
        </td>
        <td>
            <?= $value * $item['price'];?>
        </td>
        <td>
            <img src="./icon/0415.jpg" alt="" onclick="delItem(<?= $key;?>)">
        </td>
    </tr>
    <?php
    
    endforeach;
    
    ?>
</table>

<div class="ct">
    <img src="./icon/0411.jpg" alt="" style="width: 150px; padding: 5px;" onclick="location.href = '?'">
    <?php
    
    if($_SESSION['cart'] != []):
    
    ?>
    <img src="./icon/0412.jpg" alt="" style="width: 150px; padding: 5px;" onclick="location.href = '?do=checkout'">
    <?php
    
    else:
    
    ?>
    <img src="./icon/0412.jpg" alt="" style="width: 150px; padding: 5px;" onclick="alert('請在購物車放入商品');">
    <?php
    
    endif;
    
    ?>
</div>

<script>
    function delItem(id){
        $.post("./api/api_delete_items.php", {id}, () => {
            location.href = '?do=buycart';
        })
    }
</script>