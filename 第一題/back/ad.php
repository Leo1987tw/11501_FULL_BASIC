<?php include_once "./api/db.php";?>

<div class="di" style="height:540px; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->
    <table width="100%">
        <tbody>
            <tr>
                <td style="width:70%;font-weight:800; border:#333 1px solid; border-radius:3px;" class="cent"><a href="?do=admin" style="color:#000; text-decoration:none;">後台管理區</a></td>
                <td><button onclick="document.cookie=&#39;user=&#39;;location.replace(&#39;?&#39;)" style="width:99%; margin-right:2px; height:50px;">管理登出</button></td>
            </tr>
        </tbody>
    </table>
    <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
        <p class="t cent botli">動態文字廣告管理</p>
        <form method="post" action="./api/api_edit.php?table=<?= $do?>">
            <table width="100%">
                <tbody>
                    <tr class="yel">
                        <td width="80%">動態文字廣告內容</td>
                        <td width="10%">顯示</td>
                        <td width="10%">刪除</td>
                        <td></td>
                    </tr>
                    <?php
                    $Table = ${ucfirst($do)};
                    $all = $Table->count();
                    $division = 3;
                    $pages = ceil($all/ $division);
                    $nowpage = $_GET['page'] ?? 1;
                    $start = ($nowpage - 1) * $division;

                    $rows = $Table->all(" LIMIT $start, $division");
                    foreach($rows as $row):
                    ?>
                    <tr>
                        <td width="23%">
                            <input type="text" name="text[]" value="<?= $row['text'];?>" style="width: 90%;">
                        </td>
                        <td>
                            <input type="checkbox" name='sh[]' value="<?= $row['id'];?>" <?= ($row['sh'] == 1) ? 'checked' : '';?>>
                        </td>
                        <td>
                            <input type="checkbox" name="delete[]" value="<?= $row['id'];?>">
                            <input type="hidden" name="id[]" value="<?= $row['id'];?>">
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

            <div class="cent">
                <?php

                if($nowpage - 1 > 0){
                    $prev = $nowpage - 1;
                    echo "<a href='?do=$do&page=$prev'> < </a>";
                }

                for($i = 1; $i<= $pages; $i++){
                    $size = ($i == $nowpage) ? '20px' : '16px';
                    echo "<a href='?do=$do&page=$i' style='font-size: $size'>$i</a>";
                }

                if($nowpage + 1 <= $pages){
                    $next = $nowpage + 1;
                    echo "<a href='?do=$do&page=$next'> > </a>";
                }

                ?>
            </div>

            <table style="margin-top:40px; width:70%;">
                <tbody>
                    <tr>
                        <td width="200px">
                            <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;include/<?= $do;?>.php&#39;)" value="新增動態文字廣告">
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