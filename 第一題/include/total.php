<h3 class="cent">進站總人數管理</h3>

<br>

<form action="./api/api_add.php?table=total" method="POST" enctype="multipart/form-data">
    <table class="all" style="width: 70%; margin: auto;">
        <tr>
            <td class="tt">進戰總人數：</td>
            <td>
                <input type="number" name="total">
            </td>
        </tr>
    </table>
    <div class="cent">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>