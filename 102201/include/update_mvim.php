<h3 class="cent">更新動畫圖片</h3>

<br>

<form action="./api/api_update_mvim.php" method="POST" enctype="multipart/form-data">
    <table class="all" style="width: 70%; margin: auto;">
        <tr>
            <td class="tt">動畫圖片：</td>
            <td>
                <input type="file" name="src">
            </td>
        </tr>
    </table>
    <div class="cent">
        <input type="hidden" name="id" value="<?= $_GET['id'];?>">
        <input type="submit" value="更新">
        <input type="reset" value="重置">
    </div>
</form>