<?php

$product = $Product->find(['id' => $_GET['id']]);

?>
<!-- div.all>div*2>table>tr>td.pp -->
<!-- <div class="all" style="display: flex;">
    <div class="pp" style="display:flex; justify-content: center; align-items: center; width: 65%;">
        <table>
            <tr>
                <td style="text-align: center;">
                    <img src="./upload/<?= $product['image'];?>" alt="" style="width: 80%;">
                </td>
            </tr>
        </table>
    </div>
    <div style="width: 35%;">
        <table>
            <tr>
                <td class="tt ct">
                    分類:<?= $Category->find($product['parent_category_id'])['name'];?>
                </td>
            </tr>
            <tr>
                <td class="pp">
                    編號:<?= $product['number'];?>
                </td>
            </tr>
            <tr>
                <td class="pp">
                    價格:<?= $product['price'];?>
                </td>
            </tr>
            <tr>
                <td class="pp">
                    詳細說明:<?= $product['introduction'];?>
                </td>
            </tr>
            <tr>
                <td class="pp">
                    庫存量:<?= $product['stock'];?>
                </td>
            </tr>
        </table>
    </div>
</div> -->

<!-- table>tr*4>td.pp -->
<table class="all">
    <tr>
        <td rowspan="5" class="pp" style="width: 65%; text-align: center; vertical-align: center;">
            <img src="./upload/<?= $product['image'];?>" alt="" style="width: 80%;">
        </td>
        <td class="tt" style="width: 35%;">
            分類:<?= $Category->find($product['parent_category_id'])['name'];?>
        </td>
    </tr>
    <tr>
        <td class="pp">
            編號:<?= $product['product_number'];?>
        </td>
    </tr>
    <tr>
        <td class="pp">
            價格:<?= $product['price'];?>
        </td>
    </tr>
    <tr>
        <td class="pp">
            詳細說明:<?= $product['introduction'];?>
        </td>
    </tr>
    <tr>
        <td class="pp">
            庫存量:<?= $product['stock'];?>
        </td>
    </tr>
</table>


<div class="all tt ct">
    <input type="number" class="product-quantity" value="1" style="width: 60px;">
    <img src="./icon/0402.jpg" alt="" onclick="buy(<?= $product['id'];?>)">
</div>
<div class="ct">
    <button onclick="location.href = '?'">返回</button>
</div>

<script>
    function buy(id){
        let quantity = $(".product-quantity").val();
        location.href = `
            ?do=buycart&id=${id}&quantity=${quantity}
            `;
    }
</script>