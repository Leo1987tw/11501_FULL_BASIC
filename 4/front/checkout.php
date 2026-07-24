<?php

$member = $Members->find(['account' => $_SESSION['member']]);
$items = $Items->find()

?>

<h2 class="ct">填寫資料</h2>

<!-- table.all>tr>td.tt.ct+td.pp -->
<table class="all">
    <tr>
        <td class="tt ct">會員帳號</td>
        <td class="pp"><?= $member['account'];?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><?= $member['name'];?></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><?= $member['email'];?></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp"><?= $member['address'];?></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡電話</td>
        <td class="pp"><?= $member['telephone'];?></td>
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
    
    $summary = 0;
    foreach($_SESSION['cart'] as $key => $value):
        $item = $Items->find($key);
        $summary += $value * $item['price'];
    
    ?>
    <tr class="pp ct">
        <td><?= $item['name'];?></td>
        <td><?= $item['number'];?></td>
        <td><?= $value;?></td>
        <td><?= $item['price'];?></td>
        <td><?= $value * $item['price'];?></td>
    </tr>
    <?php
    
    endforeach;
    
    ?>
</table>
<div class="all tt ct">總價：<?= $summary?></div>
<div class="ct">
    <button onclick="send()">確定送出</button>
    <button onclick="location.href = '?do=buycart'">返回修改訂單</button>
</div>

<script>
    function send(){
        let user = {
            name: $("#name").val();
            email: $("#email").val();
            address: $("#address").val();
            telephone: $("#telephone").val();
        }

        $.post("./api/api_checkout.php", user, () => {
            alert("訂購成功\n感謝您的選購");
        })
    }
</script>