<?php

include_once "./db.php";

// dd($_POST);

$max_id = $Order->q("SELECT max(`id`) AS `id` FROM `orders`")[0]["id"] + 1;
$_POST["number"] = date("Ymd") . sprintf("%04d", $max_id);
sort($_POST["seats"]);
$_POST["seats"] = serialize($_POST["seats"]);

$Order->save($_POST);

?>
<style>
    #result {
        width: 500px;
        margin: auto;
        padding: 20px;
        background-color: grey;
    }

    #result tr:nth-child(odd) {
        background-color: white;
    }
</style>
<><>
<table id="result">
    <tr>
        <td colspan="2">感謝您的訂購，您的訂單編號是：<?= $_POST["number"];?></td>
        <td></td>
    </tr>
    <tr>
        <td>電影名稱：</td>
        <td><?= $_POST["movie"];?></td>
    </tr>
    <tr>
        <td>日期：</td>
        <td><?= $_POST["date"];?></td>
    </tr>
    <tr>
        <td>場次時間：</td>
        <td><?= $_POST["session"]?></td>
    </tr>
    <tr>
        <td colspan="2">
            座位：<br>
            <?php
            
            $seats = unserialize($_POST["seats"]);
            foreach($seats as $seat){
                echo floor($seat / 5) + 1;
                echo "排";
                echo $seat % 5 + 1;
                echo "號";
                echo "<br>";
            }
            echo "共" , $_POST["qt"] . "張電影票";
            
            ?>
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="2">
            <button onclick="location.href='./index.php'">確定</button>
        </td>
        <td></td>
    </tr>
</table>