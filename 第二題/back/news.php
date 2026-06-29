<form action="./api/api_edit_news.php" method="post">
    <table style="width: 80%; margin: auto;">
        <tr class="ct">
            <td style="width: 10%;">編號</td>
            <td>標題</td>
            <td style="width: 10%;">顯示</td>
            <td style="width: 10%;">刪除</td>
        </tr>
        <?php

        $allnews = $News->count();
        $division = 3;
        $allpages = ceil($allnews / $division);
        $nowpage = $_GET['p'] ?? 1;
        $start = ($nowpage - 1) * $division;
        $rows = $News->all(" LIMIT $start, $division");
        foreach($rows as $key => $value):
    
        ?>
        <tr class="ct">
            <input type="hidden" name="id[]" value="<?= $value['id']?>">
            <td><?= $start + 1 + $key;?></td>
            <td><?= $value['title'];?></td>
            <td>
                <input type="checkbox" name="show[]" value="<?= $value['id'];?>" <?= $value['sh'] == 1 ? 'checked' : '';?>>
            </td>
            <td>
                <input type="checkbox" name="delete[]" value="<?= $value['id'];?>">
            </td>
        </tr>
        <?php endforeach;?>
    </table>
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
    <div class="ct">
        <input type="submit" value="確認修改">
    </div>
</form>