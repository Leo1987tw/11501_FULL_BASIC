<h3 class="cent">新增動畫圖片</h3>

<br>

<form action="./api/api_add.php?table=banner" method="POST" enctype="multipart/form-data">
    <table class="all" style="width: 70%; margin: auto;">
        <tr>
            <td class="tt">動畫圖片：</td>
            <td>
                <input type="file" name="image">
            </td>
        </tr>
    </table>
    <div class="cent">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>