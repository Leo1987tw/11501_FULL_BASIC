<h3 class="cent">更新校園映像</h3>

<br>

<form action="./api/api_update.php?table=image" method="POST" enctype="multipart/form-data">
    <table class="all" style="width: 70%; margin: auto;">
        <tr>
            <td class="tt">校園映像：</td>
            <td>
                <input type="file" name="image">
            </td>
        </tr>
    </table>
    <div class="cent">
        <input type="hidden" name="id" value="<?= $_GET['id'];?>">
        <input type="submit" value="更新">
        <input type="reset" value="重置">
    </div>
</form>