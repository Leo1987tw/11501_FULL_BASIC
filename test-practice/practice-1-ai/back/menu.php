<?php include_once "./api/db.php"; if(($_SESSION['login'] ?? 0) !== 1){ http_response_code(403); exit('Forbidden'); } ?>

<div class="di" style="height:540px; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->
    <?php

    include_once "./back/logout.php";
    
    ?>
    <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
        <p class="t cent botli">選單管理</p>
        <form method="post" action="./api/api_edit.php?table=<?= $do?>">
            <table width="100%">
                <tbody>
                    <tr class="yel">
                        <td width="30%">主選單名稱</td>
                        <td width="30%">選單連結網址</td>
                        <td width="15%">次選單數</td>
                        <td width="5%">顯示</td>
                        <td width="5%">刪除</td>
                        <td width="15%"></td>
                    </tr>
                    <?php
                    $Table = ${ucfirst($do)};
                    $rows = $Table->all(['parent_id' => 0]);
                    foreach($rows as $row):
                    ?>
                    <tr>
                        <td>
                            <input type="text" name="name[]" value="<?= $row['name'];?>">
                        </td>
                        <td>
                            <input type="text" name="url[]" value="<?= $row['url'];?>">
                        </td>
                        <td>
                            <?= $Menu->count(['parent_id' => $row['id']]);?>
                        </td>
                        <td>
                            <input type="checkbox" name='status[]' value="<?= $row['id'];?>" <?= ($row['status'] == 1) ? 'checked' : '';?>>
                        </td>
                        <td>
                            <input type="checkbox" name="delete[]" value="<?= $row['id'];?>">
                        </td>
                        <td>
                            <input type="hidden" name="id[]" value="<?= $row['id'];?>">
                            <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;include/submenu.php?id=<?= $row['id']?>&#39;)" value="編輯次選單">
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <table style="margin-top:40px; width:70%;">
                <tbody>
                    <tr>
                        <td width="200px">
                            <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;include/<?= $do;?>.php&#39;)" value="新增主選單">
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