<?php

$member = $Member->find(['username' => $_SESSION['member']]);

?>

<h2 class="ct">填寫資料</h2>

<!-- table.all>tr>td.tt.ct+td.pp -->
<table class="all">
    <tr>
        <td class="tt ct">登入帳號</td>
        <td class="pp">
            <?= $_SESSION['member'];?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp">
            <input type="text" name="name" id="name" value="<?= $member['name'];?>">
        </td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp">
            <input type="text" name="email" id="email" value="<?= $member['email'];?>">
        </td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp">
            <input type="text" name="address" id="address" value="<?= $member['address'];?>">
        </td>
    </tr>
    <tr>
        <td class="tt ct">聯絡電話</td>
        <td class="pp">
            <input type="text" name="telephone" id="telephone" value="<?= $member['telephone'];?>">
        </td>
    </tr>
</table>
<!-- table.all>tr.tt.ct>td*5 -->
<table class="all">
    <tr class="tt ct">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php
    
    $summation = 0;
    foreach($_SESSION['cart'] as $key => $value):
        $product = $Product->find($key);
        $summation += $value * $product['price'];
    
    ?>
    <tr class="pp ct">
        <td><?= $product['name'];?></td>
        <td><?= $product['product_number'];?></td>
        <td><?= $value;?></td>
        <td><?= $product['price'];?></td>
        <td><?= $value * $product['price'];?></td>
    </tr>
    <?php
    
    endforeach;
    
    ?>
</table>
<div class="all tt ct">總價：<?= $summation?></div>
<div class="ct">
    <button onclick="send()">確定送出</button>
    <button onclick="location.href = '?do=buycart'">返回修改訂單</button>
</div>

<script>
    function send(){
        let user = {
            name: $("#name").val(), 
            email: $("#email").val(), 
            address: $("#address").val(), 
            telephone: $("#telephone").val(), 
            total_price: <?= $summation;?>
        }

        $.post("./api/api_checkout.php", user, (response) => {
            alert("訂購成功\n感謝您的選購");
            location.href = "./index.php";
        })
    }
</script>