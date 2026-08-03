<fieldset>
    <legend>
        目前位置：首頁 > 最新文章區
    </legend>

    <table style="width: 90%; margin: auto;">
        <tr>
            <th style="width: 25%;" class="ct">標題</th>
            <th style="width: 50%;" class="ct">內容</th>
            <th style="width: 25%;" class="ct"></th>
        </tr>
        <?php

        $totalnews = $News->count(['sh' => 1]);
        $division = 4;
        $allpages = ceil($totalnews/$division);
        $nowpage = $_GET['p'] ?? 1;
        $start = ($nowpage - 1) * $division;
        $rows = $News->all(['sh' => 1], " LIMIT $start, $division");
        foreach($rows as $row):
        ?>
        <tr>
            <td class="post-title"><?= $row['title'];?></td>
            <td>
                <span><?= mb_substr($row['content'], 0, 30);?>...</span>
                <span style="display: none;"><?= nl2br($row['content'])?></span>
            </td>
            <td>
                <?php

                if(!empty($_SESSION['login'])){
                    echo "<a href='javascript: good({$row['id']})'>";
                    $check = $Logs->count(['user' => $_SESSION['login'], 'news' => $row['id']]);
                    if($check){
                        echo "收回讚";
                    }else {
                        echo "讚";
                    }
                    echo "</a>";
                }
                ?>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
</fieldset>

<div class="ct">
    <?php

    if($nowpage > 1){
        $prepage = $nowpage - 1;
        echo "<a href='?do=news&p=$prepage'> < </a>";
    }

    for($i = 1; $i <= $allpages; $i++){
        $size = ($nowpage == $i) ? '24px' : '18px';
        echo "<a href='?do=news&p=$i' style='font-size: $size'> $i </a>";
    }

    if($nowpage < $allpages){
        $nextpage = $nowpage + 1;
        echo "<a href='?do=news&p=$nextpage'> > </a>";
    }

    ?>
</div>

<script>
    $(".post-title").on("click", function(){
        $(this).next('td').children('span').toggle();
    })

    function good(id){
        $.post("./api/api_good.php", {id}, () => {
            location.reload();
        });
    }
</script>