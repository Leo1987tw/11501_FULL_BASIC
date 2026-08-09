<?php

$type = $_GET['type'] ?? 0;

$nav_string = "全部商品";

$items = $Item->all(['sh' => 1]);

if($type != 0){
    $tmp = $Types->find($type);
    if($tmp['parent'] == 0){
        $nav_string = $tmp['name'];
        $items = $Item->all(['big' => $tmp['id'], 'sh' => 1]);
    }else {
        $big = $Types->find($tmp['parent']);
        $nav_string = $big['name'] . ">" . $tmp['name'];
        $items = $Item->all(['middle' => $tmp['id']]);
    }
}

?>

<h2><?= $nav_string;?></h2>

<?php

foreach($items as $item):

?>
<!-- div.all>div*2>table>tr>td.pp -->
<!-- <div class="all" style="display: flex;">
    <div class="pp" style="display:flex; justify-content: center; align-items: center; width: 35%;">
        <table>
            <tr>
                <td style="text-align: center;">
                    <a href="?do=detail&id=<?= $item['id'];?>">
                        <img src="./upload/<?= $item['image'];?>" alt="" style="width: 80%;">
                    </a>
                </td>
            </tr>
        </table>
    </div>
    <div style="width: 65%;">
        <table>
            <tr>
                <td class="tt ct">
                    <?= $item['name'];?>
                </td>
            </tr>
            <tr>
                <td class="pp">
                    價錢:<?= $item['price'];?>
                    <a href="?do=buycart&id=<?= $item['id'];?>&quantity=1">
                        <img src="./icon/0402.jpg" alt="">
                    </a>
                </td>
            </tr>
            <tr>
                <td class="pp">
                    規格:<?= $item['specification'];?>
                </td>
            </tr>
            <tr>
                <td class="pp">
                    簡介:<?= mb_substr($item['introduction'], 0, 25);?>...
                </td>
            </tr>
        </table>
    </div>
</div> -->

<!-- table>tr*4>td.pp -->
<table class="all">
    <tr>
        <td rowspan="4" class="pp" style="width: 35%; text-align: center; vertical-align: center;">
            <a href="?do=detail&id=<?= $item['id'];?>">
                <img src="./upload/<?= $item['image'];?>" alt="" style="width: 80%;">
            </a>
        </td>
        <td class="tt" style="width: 65%;"><?= $item['name'];?></td>
    </tr>
    <tr>
        <td class="pp">
            價錢:<?= $item['price'];?>
            <a href="?do=buycart&id=<?= $item['id'];?>&quantity=1">
                <img src="./icon/0402.jpg" alt="">
            </a>
        </td>
    </tr>
    <tr>
        <td class="pp">
            規格:<?= $item['specification'];?>
        </td>
    </tr>
    <tr>
        <td class="pp">
            簡介:<?= mb_substr($item['introduction'], 0, 25);?>...
        </td>
    </tr>
</table>
<?php

endforeach;

?>