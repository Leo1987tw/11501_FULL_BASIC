<?php

$order = $Order->find($_GET['id']);

?><h2 class="ct">訂單編號<span style="color: red;"><?= $order['number'];?></span></h2>

<!-- table.all>tr>td.tt.ct+td.pp -->
<table class="all">
    <tr>
        <td class="tt ct">會員帳號</td>
        <td class="pp">
            <?= $order['account'];?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp">
            <?= $order['name'];?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp">
            <?= $order['email'];?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp">
            <?= $order['address'];?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">聯絡電話</td>
        <td class="pp">
            <?= $order['telephone'];?>
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
    
    $cart = unserialize($order['items']);
    foreach($cart as $key => $value):
        $item = $Item->find($key);
    
    ?>
    <tr class="pp ct">
        <td>
            <?= $item['name'];?>
        </td>
        <td>
            <?= $item['number'];?>
        </td>
        <td>
            <?= $value;?>
        </td>
        <td>
            <?= $item['price'];?>
        </td>
        <td>
            <?= $item['price'] * $value;?>
        </td>
    </tr>
    <?php
    
    endforeach;
    
    ?>
</table>
<div class="all tt ct">總價：</div>
<div class="ct">
    <button onclick="location.href = '?do=order'">返回</button>
</div>