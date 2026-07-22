<h2 class="ct">新增商品</h2>

<!-- form:post>table.all>tr*9>td.tt.ct+td.pp>input:text -->
<form action="./api/api_save_item.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp"><input type="select" name="big" id="big"></td>
        </tr>
        <tr>
            <td class="tt ct">所屬中分類</td>
            <td class="pp"><input type="select" name="middle" id="middle"></td>
        </tr>
        <tr>
            <td class="tt ct">商品編號</td>
            <td class="pp">
                完成分類後自動分配
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp">
                <input type="text" name="name" id="name">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp">
                <input type="text" name="price" id="price">
            </td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp">
                <input type="text" name="specification" id="specification">
            </td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp">
                <input type="text" name="stock" id="stock">
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
                <textarea name="introduction" id="introduction"></textarea>
            </td>
        </tr>
    </table>
    <!-- div.ct>input:submit+input:reset+input:button -->
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
        <input type="button" value="返回">
    </div>
</form>