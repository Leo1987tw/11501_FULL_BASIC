<h3 class="ct"></h3>
<div>
    <form action="./api/api_qdel.php" method="post">
        快速刪除:
        <input type="radio" name="type" id="date"><label for="date">依日期</label>
        <input type="text" name="type">
        <input type="radio" name="type" id="movie"><label for="movie">依電影</label>
        <select name="movie" id=""></select>
        <input type="submit" value="刪除">
    </form>
</div>

<div style="display: flex; justify-content: space-between; align-items: center;">
    <div>訂單編號</div>
    <div>電影名稱</div>
    <div>日期</div>
    <div>場次時間</div>
    <div>訂購數量</div>
    <div>訂購位置</div>
    <div>操作</div>
</div>
<?php

$rows = $Order->all(" ORDER BY `number` DESC");
foreach($rows as $key => $value):

?>
<div style="display: flex; justify-content: space-between; align-items: center;">
    <div><?= $value['number'];?></div>
    <div><?= $value['movie'];?></div>
    <div><?= $value['ondate'];?></div>
    <div><?= $value['session'];?></div>
    <div><?= $value['qt'];?></div>
    <div>
        <?php

        $seats = unserialize($value['seats']);
        foreach($seats as $seat){
            echo floor($seat / 5 + 1) . "排" . ($seat % 5 + 1) . "號<br>";
        }
        ?>
    </div>
    <div>
        <button onclick="del(<?= $value['id'];?>)">刪除</button>
    </div>
</div>
<hr>
<?php

endforeach;

?>