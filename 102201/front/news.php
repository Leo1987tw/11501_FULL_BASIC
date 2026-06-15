<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <?php
    
    include_once "./include/marquee.php";
    
    ?>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <div>
        <div style="margin: 0px 30px; font-weight: bold;">更多最新消息展示區</div>
        <hr>
    </div>
    <?php

    $Table = ${ucfirst($do)};
    $all = $Table->count();
    $division = 5;
    $pages = ceil($all / $division);
    $nowpage = $_GET['page'] ?? 1;
    $start = ($nowpage - 1) * $division;

    ?>
    <ol start="<?=  $start + 1;?>">
        <?php


        $rows = $Table->all(" LIMIT $start, $division");
        foreach ($rows as $row):

        ?>
            <li class="ssww"><?= mb_substr($row['text'], 0, 25); ?></li>
        <?php endforeach; ?>
    </ol>
    <div class="cent">
        <?php





        if ($nowpage - 1 > 0) {
            $prev = $nowpage - 1;
            echo "<a href='?do=$do&page=$prev'> < </a>";
        }

        for ($i = 1; $i <= $pages; $i++) {
            $size = ($i == $nowpage) ? '20px' : '16px';
            echo "<a href='?do=$do&page=$i' style='font-size: $size'>$i</a>";
        }

        if ($nowpage + 1 <= $pages) {
            $next = $nowpage + 1;
            echo "<a href='?do=$do&page=$next'> > </a>";
        }

        ?>
    </div>
</div>

<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>

<script>
    $(".sswww").hover(
        function() {
            $("#alt").html("" + $(this).children(".all").html() + "").css({
                "top": $(this).offset().top - 50
            })
            $("#alt").show()
        }
    )
    $(".sswww").mouseout(
        function() {
            $("#alt").hide()
        }
    )
</script>