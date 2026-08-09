<?php

$member = $Member->find($_GET['id']);

?>


<h2 class="ct">編輯會員資料</h2>
<!-- form:post>table.all>tr*6>td.tt.ct+td.pp>input:text -->
<form action="./api/api_edit_member.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp">
                <input type="text" name="account" value="<?= $member['account'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp">
                <?= str_repeat("*", strlen($member['password']));?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp">
                <input type="text" name="name" value="<?= $member['name'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp">
                <input type="text" name="email" value="<?= $member['email'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">地址</td>
            <td class="pp">
                <input type="text" name="address" value="<?= $member['address'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp">
                <input type="text" name="telephone" value="<?= $member['telephone'];?>">
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?= $member['id'];?>">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
        <input type="button" value="取消" onclick="location.href = '?do=mem'">
    </div>
</form>