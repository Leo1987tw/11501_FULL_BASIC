<?php include_once "./api/db.php";?>

<div class="di" style="height:540px; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->
    <?php

    include_once "./back/logout.php";
    
    ?>
    <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
        <p class="t cent botli">管理者帳號管理</p>
        <form method="post" action="./api/api_edit.php?table=<?= $do?>">
            <table width="100%">
                <tbody>
                    <tr class="yel">
                        <td width="40%">帳號</td>
                        <td width="40%">密碼</td>
                        <td width="20%">刪除</td>
                    </tr>
                    <?php
                    $Table = ${ucfirst($do)};
                    $rows = $Table->all();
                    foreach($rows as $row):
                        if($_SESSION['login'] == 1 && $_SESSION['username'] == "admin"):
                    
                    ?>
                    <tr>
                        <td>
                            <input type="text" name="username[]" value="<?= $row['username'];?>">
                        </td>
                        <td>
                            <input type="password" name="password[]" value="<?= $row['password'];?>">
                        </td>
                        <td>
                            <input type="checkbox" name="delete[]" value="<?= $row['id'];?>">
                            <input type="hidden" name="id[]" value="<?= $row['id'];?>">
                        </td>
                    </tr>
                    <?php
                    
                        elseif ($row['username'] != "admin"):
                    
                    ?>
                    <tr>
                        <td>
                            <input type="text" name="username[]" value="<?= $row['username'];?>">
                        </td>
                        <td>
                            <input type="password" name="password[]" value="<?= $row['password'];?>">
                        </td>
                        <td>
                            <input type="checkbox" name="delete[]" value="<?= $row['id'];?>">
                            <input type="hidden" name="id[]" value="<?= $row['id'];?>">
                        </td>
                    </tr>
                    <?php

                        endif;
                    endforeach;
                    
                    ?>
                </tbody>
            </table>
            <table style="margin-top:40px; width:70%;">
                <tbody>
                    <tr>
                        <td width="200px">
                            <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;include/<?= $do;?>.php&#39;)" value="新增管理者帳號">
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