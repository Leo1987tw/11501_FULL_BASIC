<div class="ct">
    <button onclick="location.href = '?do=add_admin'">新增管理員</button>
</div>

<table class="all">
    <tr class="tt ct">
        <td>帳號</td>
        <td>密碼</td>
        <td>管理</td>
    </tr>
    <?php
    
    $admins = $Admin->all();

    foreach($admins as $admin):
    
    ?>
    <tr class="pp ct">
        <td><?= $admin["username"]?></td>
        <td><?= str_repeat("*", mb_strlen($admin["password"]));?></td>
        <td>
            <?php
            
            if($admin["username"] == "admin"):
            
            ?>
            此帳號為最高權限
            <?php
            
            else:
            
            ?>
            <button onclick="location.href = '?do=edit_admin&id=<?= $admin['id'];?>'">修改</button>
            <button onclick="del('Admin', <?= $admin['id'];?>)">刪除</button>
            <?php
            
            endif;
            
            ?>
        </td>
    </tr>
    <?php
    
    endforeach;
    
    ?>
</table>

<div class="ct">
    <button onclick="location.href = './index.php'">返回</button>
</div>

<!-- <script>
    function del(model, id){
        $.post("./api/api_delete.php", {model, id}, (response) => {
            location.reload();
        })
    }
</script> -->