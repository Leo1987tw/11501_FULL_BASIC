<fieldset>
    <legend>
        目前位置：首頁 > 人氣文章區
    </legend>

    <table style="width: 90%; margin: auto;">
        <tr>
            <th style="width: 25%;" class="ct">標題</th>
            <th style="width: 50%;" class="ct">內容</th>
            <th style="width: 25%;" class="ct">人氣</th>
        </tr>
        <?php

        $totalnews = $News->count(['sh' => 1]);
        $division = 3;
        $allpages = ceil($totalnews/$division);
        $nowpage = $_GET['p'] ?? 1;
        $start = ($nowpage - 1) * $division;
        $rows = $News->all(['sh' => 1], " ORDER BY `good` DESC LIMIT $start, $division");
        foreach($rows as $row):
        ?>
        <tr>
            <td class="post-title"><?= $row['title'];?></td>
            <td>
                <span><?= mb_substr($row['content'], 0, 30);?>...</span>
                <div class="alerr">
                    <h3><?= $row['title']?></h3>
                    <pre class="ssaa"><?= nl2br($row['content'])?></pre>
                </div>
            </td>
            <td></td>
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
    $(".post-title").hover(
        function(){
            $(".alerr").hide();
            $(this).next("td").children(".alerr").show();
        }, function(){
            $(".alerr").show();
        }
    );

    $("alerr").hover(
        function(){
            $(this).show();
        }, function(){
            $(".alerr").hide();
        }
    );
</script>