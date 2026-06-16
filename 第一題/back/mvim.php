<?php include_once "./api/db.php";?>

<div class="di" style="height:540px; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->
    <?php

    include_once "./back/logout.php";
    
    ?>
    <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
        <p class="t cent botli">動畫圖片管理</p>
        <form method="post" action="./api/api_edit.php?table=<?= $do?>">
            <table width="100%">
                <tbody>
                    <tr class="yel">
                        <td width="50%">動畫圖片</td>
                        <td width="10%">顯示</td>
                        <td width="10%">刪除</td>
                        <td></td>
                    </tr>
                    <?php
                    $Table = ${ucfirst($do)};
                    $rows = $Table->all();
                    foreach($rows as $row):
                    ?>
                    <tr>
                        <td class="cent">
                            <img src="./upload/<?= $row['src'];?>" style="width: 150px; height: 150px;">
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?= $row['id'];?>" <?= ($row['sh'] == 1) ? 'checked' : '';?>>
                        </td>
                        <td>
                            <input type="checkbox" name="delete[]" value="<?= $row['id'];?>">
                        </td>
                        <td>
                            <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;include/update_<?= $do;?>.php?id=<?= $row['id'];?>&#39;)" value="更換動畫">
                            <input type="hidden" name="id[]" value="<?= $row['id'];?>">
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <table style="margin-top:40px; width:70%;">
                <tbody>
                    <tr>
                        <td width="200px">
                            <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;include/<?= $do;?>.php&#39;)" value="新增動畫圖片">
                        </td>
                        <td class="cent">
                            <input type="submit" value="修改確定">
                            <input type="reset" value="重置">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>