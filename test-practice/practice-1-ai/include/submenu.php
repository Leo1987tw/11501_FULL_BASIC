<?php

include_once dirname(__DIR__) . "/api/db.php";

?>

<h3 class="cent">編輯次選單</h3>

<br>

<form action="./api/api_add_submenu.php?table=menu" method="POST" enctype="multipart/form-data">
    <table class="all" id="subMenu" style="width: 70%; margin: auto;">
        <tr>
            <td class="tt">次選單名稱</td>
            <td class="tt">次選單連結網址</td>
            <td class="tt">刪除</td>
        </tr>
        <?php
        
        if($Menu->count(['parent_id' => $_GET['id']]) > 0):
            $rows = $Menu->all(['parent_id' => $_GET['id']]);
            foreach($rows as $row):
        
        ?>
        <tr>
            <td>
                <input type="text" name="name[]" value="<?= $row['name']?>">
            </td>
            <td>
                <input type="text" name="url[]" value="<?= $row['url']?>">
            </td>
            <td>
                <input type="hidden" name="id[]" value="<?= $row['id']?>">
                <input type="checkbox" name="delete[]" value="<?= $row['id']?>">
            </td>
        </tr>
        <?php

            endforeach;
        endif;

        ?>
    </table>
    <div class="cent">
        <input type="hidden" name="parent_id" value="<?= $_GET['id']?>">
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="more()">
    </div>
</form>

<script>
    function more(){
        let row=`<tr>
                    <td>
                        <input type="text" name="text_new[]" required>
                    </td>
                    <td>
                        <input type="text" name="url_new[]" value="index.php" required>
                    </td>
                    <td><button type="button" class="remove-submenu">取消</button></td>
                </tr>`;
        $("#subMenu").append(row);
        $("#subMenu .remove-submenu").last().on("click", function(){
            $(this).closest("tr").remove();
        });
    }
</script>