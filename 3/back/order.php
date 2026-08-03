<h3 class="ct"></h3>
<div>
    快速刪除:
    <input type="radio" name="type" id="date" checked><label for="date">依日期</label>
    <input type="text" name="date">
    <input type="radio" name="type" id="movie"><label for="movie">依電影</label>
    <select name="movie">
        <?php
        
        $movies = $Order->q("SELECT `movie` FROM `orders` GROUP BY `movie`");
        foreach($movies as $key => $value){
            echo "<option value='{$value['movie']}'>";
            echo $value['movie'];
            echo "</option>";
        }
        
        ?>
    </select>
    <input type="button" value="刪除" onclick="qDel();">
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
    <div><?= $value['date'];?></div>
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
<script>
    function del(index){
        let check = confirm("你確定要刪除這筆訂單資料嗎?");
        if(check){
            $.post("./api/api_delete.php", {index, "table": "Order"}, () => {
                location.reload();
            })
        }
    };

    function qDel(){
        let type = $("input[type='radio']:checked").attr('id');
        let value;
        switch(type){
            case "date":
                value = $(`input[name='${type}']`).val();
                break;
            case "movie":
                value = $(`select[name='${type}']`).val();
                break
        }
        console.log(value);
        if(!value || value.trim() === ""){
            alert("你沒有選想刪除的內容");
            return;
        }
        let check = confirm(`你確定要刪除${value}全部訂單資料嗎?`);
        if(check){
            $.post("./api/api_qdelete.php", {type, value}, () => {
                location.reload();
            })
        }
    }
</script>