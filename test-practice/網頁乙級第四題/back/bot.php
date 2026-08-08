<?php

if(isset($_POST["bottom"])){
    $Bottom->save($_POST);
}

?>

<h2 class="ct">頁尾版權管理</h2>

<!-- form:post>table.all>tr>td.tt.ct+td.pp>input:text -->
<form action="?do=bot" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">頁尾宣告內容</td>
            <td class="pp">
                <input type="hidden" name="id" value=<?= $Bottom->find(1)["id"];?>>
                <input type="text" name="bottom" value="<?= $Bottom->find(1)["bottom"];?>">
            </td>
        </tr>
    </table>
    <input type="submit" value="編輯">
    <input type="reset" value="重置">
</form>