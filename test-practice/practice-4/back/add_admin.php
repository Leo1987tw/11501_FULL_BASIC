<h2 class="ct">新增管理帳號</h2>

<!-- form:post>table.all>tr*3>td.tt.ct+td.pp>input:text -->
<form action="./api/api_save_admin.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><input type="text" name="username" id="username"></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><input type="password" name="password" id="password"></td>
        </tr>
        <tr>
            <td class="tt ct">權限</td>
            <td class="pp">
                <div>
                    <input type="checkbox" name="role[]" value="1">商品分類與管理
                </div>
                <div>
                    <input type="checkbox" name="role[]" value="2">訂單管理
                </div>
                <div>
                    <input type="checkbox" name="role[]" value="3">會員管理
                </div>
                <div>
                    <input type="checkbox" name="role[]" value="4">頁尾版權區管理
                </div>
                <div>
                    <input type="checkbox" name="role[]" value="5">最新消息管理
                </div>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>