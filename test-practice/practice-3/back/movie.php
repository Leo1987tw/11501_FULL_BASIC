<button onclick="location.href='?do=add_movie'">新增電影</button>
<br>
<style>
    .movie {
        display: flex;
        justify-content:  space-between;
        align-items: center;
        background-color: white;
        color: black;
        padding: 3px;
    }

    button {
        margin: 3px;
    }
</style>
<div class="movies" style="height: 450px; overflow: auto;">
    <?php

    $Table = ${ucfirst($_GET['do'])};
    $rows = $Table->all(" ORDER BY `sort`");
    foreach($rows as $key => $value):
    
    ?>
    <div class="movie">
        <div>
            <img src="./upload/<?= $value['poster']?>" alt="" style="width: 80px; height: 100px;">
        </div>
        <div>
            分級:<img src="./icon/03C0<?= $value['grade'];?>.png" alt="">
        </div>
        <div style="width: 70%;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>片名:<?= $value['title'];?></div>
                <div>片長:<?= $value['length'];?></div>
                <div>上映時間:<?= $value['on_date'];?></div>
            </div>
            <div style="display: flex; justify-content: end; align-items: center;">
                <button class="show" data-id="<?= $value['id'];?>">
                    <?= ($value['status'] == 1) ? "顯示" : "隱藏"?>
                </button>
                <?php
                
                $prev = ($key == 0) ? $value['id'] : $rows[$key - 1]['id'];
                $next = ($key == count($rows) - 1) ? $value['id'] : $rows[$key + 1]['id'];
                
                ?>
                <button class="switch-rank" data-switch="<?= $value['id'] . "-" . $prev;?>">往上</button>
                <button class="switch-rank" data-switch="<?= $value['id'] . "-" . $next;?>">往下</button>
                <button onclick="location.href='?do=edit_movie&id=<?= $value['id'];?>'">修改電影資料</button>
                <button class="delete" data-id="<?= $value['id'];?>">刪除電影</button>
            </div>
            <div>劇情介紹:<?= $value['introduction'];?></div>
        </div>
    </div>
    <?php
    
    endforeach;
    
    ?>
</div>

<script>
    $(".switch-rank").on("click", function(){
        let index = $(this).data('switch').split('-');
        console.log(index);
        $.post("./api/api_switch.php", {index, "table": "Movie"}, ()=>{
            location.reload();
        })
    });

    $(".show").on("click", function(){
        let index = $(this).data("id");
        $.post("./api/api_show.php", {index}, () => {
            switch($(this).text().trim()){
                case "顯示":
                    $(this).text("隱藏");
                    break;
                case "隱藏":
                    $(this).text("顯示");
                    break;
            }
            // location.reload();
        })
    })

    $(".delete").on("click", function(){
        let index = $(this).data("id");
        $.post("./api/api_delete.php", {index, "table": "Movie"}, ()=>{
            location.reload();
        })
    })
</script>