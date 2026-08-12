<?php

$category = $_GET['category'] ?? 0;

$nav_string = "全部商品";

$products = $Product->all(['status' => 1]);

if($category != 0){
    $tmp = $Category->find($category);
    if($tmp['parent_id'] == 0){
        $nav_string = $tmp['name'];
        $products = $Product->all(['parent_category_id' => $tmp['id'], 'status' => 1]);
    }else {
        $big = $Category->find($tmp['parent_id']);
        $nav_string = $big['name'] . ">" . $tmp['name'];
        $products = $Product->all(['sub_category_id' => $tmp['id']]);
    }
}

?>

<h2><?= $nav_string;?></h2>

<?php

foreach($products as $product):

?>
<!-- div.all>div*2>table>tr>td.pp -->
<!-- <div class="all" style="display: flex;">
    <div class="pp" style="display:flex; justify-content: center; align-items: center; width: 35%;">
        <table>
            <tr>
                <td style="text-align: center;">
                    <a href="?do=detail&id=<?= $product['id'];?>">
                        <img src="./upload/<?= $product['image'];?>" alt="" style="width: 80%;">
                    </a>
                </td>
            </tr>
        </table>
    </div>
    <div style="width: 65%;">
        <table>
            <tr>
                <td class="tt ct">
                    <?= $product['name'];?>
                </td>
            </tr>
            <tr>
                <td class="pp">
                    價錢:<?= $product['price'];?>
                    <a href="?do=buycart&id=<?= $product['id'];?>&quantity=1">
                        <img src="./icon/0402.jpg" alt="">
                    </a>
                </td>
            </tr>
            <tr>
                <td class="pp">
                    規格:<?= $product['specification'];?>
                </td>
            </tr>
            <tr>
                <td class="pp">
                    簡介:<?= mb_substr($product['introduction'], 0, 25);?>...
                </td>
            </tr>
        </table>
    </div>
</div> -->

<!-- table>tr*4>td.pp -->
<table class="all">
    <tr>
        <td rowspan="4" class="pp" style="width: 35%; text-align: center; vertical-align: center;">
            <a href="?do=detail&id=<?= $product['id'];?>">
                <img src="./upload/<?= $product['image'];?>" alt="" style="width: 80%;">
            </a>
        </td>
        <td class="tt" style="width: 65%;"><?= $product['name'];?></td>
    </tr>
    <tr>
        <td class="pp">
            價錢:<?= $product['price'];?>
            <a href="?do=buycart&id=<?= $product['id'];?>&quantity=1">
                <img src="./icon/0402.jpg" alt="">
            </a>
        </td>
    </tr>
    <tr>
        <td class="pp">
            規格:<?= $product['specification'];?>
        </td>
    </tr>
    <tr>
        <td class="pp">
            簡介:<?= mb_substr($product['introduction'], 0, 25);?>...
        </td>
    </tr>
</table>
<?php

endforeach;

?>