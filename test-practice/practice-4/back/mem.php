<h2 class="ct">會員管理</h2>
<!-- table.all>tr.tt.ct*2>td*4 -->
<table class="all">
    <tr class="tt ct">
        <td>姓名</td>
        <td>會員帳號</td>
        <td>註冊日期</td>
        <td>操作</td>
    </tr>
    <?php
    
    $members = $Member->all();
    foreach($members as $member):
    
    ?>
    <tr class="pp ct">
        <td><?= $member['name'];?></td>
        <td><?= $member['account'];?></td>
        <td><?= date("Y/m/d", strtotime($member['created_at']));?></td>
        <td>
            <button onclick="location.href = '?do=edit_member&id=<?= $member['id'];?>'">修改</button>
            <button onclick="del('Members', <?= $member['id'];?>)">刪除</button>
        </td>
    </tr>
    <?php
    
    endforeach;
    
    ?>
</table>