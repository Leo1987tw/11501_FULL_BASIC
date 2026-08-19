<?php
include_once dirname(__DIR__) . '/api/db.php';
$menus = $Menu->all(['status' => 1]);
?>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4"><div><p class="text-uppercase small text-secondary mb-1">New pet case</p><h2 class="fw-bold">新增寵物案件</h2></div><a class="btn btn-outline-success" href="admin.php?do=post">返回案件列表</a></div>
    <form action="./api/api_add.php?table=post" method="POST" enctype="multipart/form-data" class="bg-white rounded-4 shadow-sm p-4">
        <div class="row g-3">
            <div class="col-md-6"><label class="form-label">案件分類</label><select name="menu_id" class="form-select" required><option value="">請選擇分類</option><?php foreach ($menus as $menu): ?><?php if ((int) $menu['parent_id'] > 0): ?><option value="<?= (int) $menu['id'] ?>"><?= htmlspecialchars($menu['name'], ENT_QUOTES, 'UTF-8') ?></option><?php endif; ?><?php endforeach; ?></select></div>
            <div class="col-md-6"><label class="form-label">寵物名字</label><input type="text" name="pet_name" class="form-control" maxlength="50" required></div>
            <div class="col-md-6"><label class="form-label">聯絡電話</label><input type="text" name="phone" class="form-control" maxlength="20" required></div>
            <div class="col-md-6"><label class="form-label">案件狀態</label><select name="case_status" class="form-select"><option value="刊登中">刊登中</option><option value="已認養">已認養</option><option value="已尋獲">已尋獲</option></select></div>
            <div class="col-12"><label class="form-label">照片</label><input type="file" name="image" class="form-control" accept="image/*" required></div>
            <div class="col-12"><label class="form-label">特徵與毛色描述</label><textarea name="features" class="form-control" rows="5" required></textarea></div>
        </div>
        <div class="text-end mt-4"><button type="reset" class="btn btn-light me-2">重置</button><button type="submit" class="btn btn-success px-4">新增案件</button></div>
    </form>
</div>
