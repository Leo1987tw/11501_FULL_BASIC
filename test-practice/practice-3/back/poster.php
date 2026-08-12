<div style="height: 360px;">
    <div class="ct">預告片清單</div>
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div style="width: 20%;">預告片海報</div>
        <div style="width: 30%;">預告片片名</div>
        <div style="width: 25%;">預告片排序</div>
        <div style="width: 25%;">操作</div>
    </div>
    <form action="./api/api_edit_poster.php" method="post">
        <div style="height: 270px; overflow: auto;">
            <?php
            $Table = ${ucfirst($_GET['do'])};
            $rows = $Table->all("ORDER BY `sort`");
            foreach($rows as $key => $value):
        
            ?>
            <div style="display: flex; justify-content: space-between; align-items: center; height:100px; margin: 3px; padding: 3px; background-color: white; color: black;">
                <div style="width: 20%;">
                    <img src="./upload/<?= $value['poster']?>" alt="" style="width: 60px; height: 80px;">
                </div>
                <div style="width: 30%;">
                    <input type="text" name="title[]" value="<?= $value['title'];?>">
                </div>
                <div style="width: 25%;">
                    <!-- <input type="number" name="sort[]" value="<?= $value['sort'];?>"> -->
                    <?php

                    $prev = ($key == 0) ? $value['id'] : $rows[$key - 1]['id'];
                    $next = ($key == count($rows) - 1) ? $value['id'] : $rows[$key + 1]['id'];

                    ?>
                    <input type="button" class="switch-sort" value="往上" data-switch="<?= $value['id'] . "-" . $prev;?>">
                    <input type="button" class="switch-sort" value="往下" data-switch="<?= $value['id'] . "-" . $next;?>">
                </div>
                <div style="width: 25%;">
                    <input type="checkbox" name="status[]" value="<?= $value['id'];?>" <?= ($value['status'] == 1) ? "checked" : "";?>><label for="sh[]">顯示</label>
                    <input type="checkbox" name="del[]" value="<?= $value['id'];?>"><label for="del[]">刪除</label>
                    <select name="effect[]">
                        <option value="1" <?= ($value['effect'] == 1) ? 'selected' : '';?>>淡入淡出</option>
                        <option value="2" <?= ($value['effect'] == 2) ? 'selected' : '';?>>滑入滑出</option>
                        <option value="3" <?= ($value['effect'] == 3) ? 'selected' : '';?>>縮放</option>
                    </select>
                    <input type="hidden" name="id[]" value="<?= $value['id'];?>">
                </div>
            </div>
            <?php
            endforeach;
            ?>
            <script>
                $(".switch-sort").on("click", function(){
                    let index = $(this).data('switch').split('-');
                    console.log(index);
                    $.post("./api/api_switch.php", {index, "table": "Poster"}, () => {
                        location.reload();
                    });
                });
            </script>
        </div>
    <div class="ct">
        <input type="submit">
        <input type="reset">
    </div>
    </form>
</div>
<hr>
<div style="height: 180px;">
    <div class="ct">新增預告片海報</div>
    <form action="./api/api_add_poster.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    預告片海報：
                    <input type="file" id="poster" name="poster">
                </td>
                <td>
                    預告片片名：
                    <input type="text" id="title" name="title">
                </td>
            </tr>
        </table>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </form>

</div>