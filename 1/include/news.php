<h3 class="cent">新增校園映像資訊</h3>

<br>

<form action="./api/api_add.php?table=news" method="POST" enctype="multipart/form-data">
    <table class="all" style="width: 70%; margin: auto;">
        <tr>
            <td class="tt">新增最新消息資料：</td>
            <td>
                <textarea name="text" id=""></textarea>
            </td>
        </tr>
    </table>
    <div class="cent">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>