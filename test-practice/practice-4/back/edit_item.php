<?php

$item = $Item->find($_GET["id"]);

?>

<h2 class="ct">修改商品</h2>

<!-- form:post>table.all>tr*9>td.tt.ct+td.pp>input:text -->
<form action="./api/api_save_item.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp">
                <select name="big" id="big"></select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">所屬中分類</td>
            <td class="pp"><select name="middle" id="middle"></select>
        </td>
        </tr>
        <tr>
            <td class="tt ct">商品編號</td>
            <td class="pp">
                <?=  $item["number"];?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp">
                <input type="text" name="name" id="name" value="<?= $item["name"];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp">
                <input type="text" name="price" id="price" value="<?= $item["price"];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp">
                <input type="text" name="specification" id="specification" value="<?= $item["specification"];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp">
                <input type="text" name="stock" id="stock" value="<?= $item["stock"];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp">
                <input type="file" name="image" id="image">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp">
                <textarea name="introduction" id="introduction"><?= $item["introduction"];?></textarea>
            </td>
        </tr>
    </table>
    <!-- div.ct>input:submit+input:reset+input:button -->
    <div class="ct">
        <input type="hidden" name="id" value="<?= $item["id"];?>">
        <input type="submit" value="修改">
        <input type="reset" value="重置">
        <input type="button" value="返回" onclick="location.href = './admin.php?do=th'">
    </div>
</form>

<script>
    getBigs();

    let selectedStatus = true;

    $("#big").on("change", function(){
        getMiddles($(this).val());
    });

    function getBigs(){
        $.get("./api/api_get_bigs.php", (bigs) => {
            $("#big").html(bigs);
            $("#big option[value=<?= $item["big"];?>]").prop("selected", true);
            getMiddles($("#big").val());
        })
    };

    function getMiddles(big){
        $.get("./api/api_get_middles.php", {big}, (middles) => {
            $("#middle").html(middles);
            if(selectedStatus){
                $("#middle option[value=<?= $item["middle"];?>]").prop("selected", true);
                selectedStatus = false;
            }
        })
    };
</script>