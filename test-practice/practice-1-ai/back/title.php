<?php
include_once './api/db.php';
if (($_SESSION['login'] ?? 0) !== 1) {
    http_response_code(403);
    exit('Forbidden');
}

$rows = $Title->all(['deleted_at' => NULL], ' ORDER BY `status` DESC, `id` ASC');
?>
<section class="p-4 p-lg-5">
    <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
        <div>
            <div class="small text-uppercase text-secondary fw-bold mb-1">Brand settings</div>
            <h2 class="h4 fw-bold mb-1">網站招牌管理</h2>
            <p class="text-secondary mb-0">管理網站最上方的長條招牌圖片與標題文字。</p>
        </div>
        <button type="button" class="btn btn-success" onclick="op('#cover','#cvr','include/title.php')">新增招牌</button>
    </div>

    <form method="post" action="./api/api_edit.php?table=title">
        <div class="row">
            <?php foreach ($rows as $row): ?>
                <article class="col-12 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="row g-0 align-items-center">
                                <div class="col-12 col-md-4 d-flex align-items-center justify-content-center p-3">
                                    <img class="img-fluid rounded-start h-100" style="object-fit: contain; max-height: 80px;" src="upload/<?= htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') ?>" onerror="this.src='https://placehold.co/1200x240/e9e2d7/315b4b?text=Banner+Image'">
                                </div>
                                <div class="col-12 col-md-8 p-3">
                                <input type="hidden" name="id[]" value="<?= (int) $row['id'] ?>">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <span class="badge rounded-pill <?= (int) $row['status'] === 1 ? 'text-bg-success' : 'text-bg-light' ?>">
                                        <?= (int) $row['status'] === 1 ? '目前使用中' : '備用招牌' ?>
                                    </span>
                                    <label class="small text-danger text-nowrap"><input type="checkbox" name="delete[]" value="<?= (int) $row['id'] ?>"> 刪除</label>
                                </div>
                                <div>
                                    <label class="form-label fw-semibold mb-1" for="title-<?= (int) $row['id'] ?>">網站標題文字</label>
                                    <div class="input-group">
                                        <input id="title-<?= (int) $row['id'] ?>" class="form-control" type="text" name="title[]" value="<?= htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') ?>" maxlength="255" required>
                                        <button type="button" class="btn btn-outline-success" onclick="op('#cover','#cvr','include/update_title.php?id=<?= (int) $row['id'] ?>')">更換圖片</button>
                                    </div>
                                </div>
                                <label class="form-check mb-0"><input class="form-check-input" type="radio" name="status" value="<?= (int) $row['id'] ?>" <?= (int) $row['status'] === 1 ? 'checked' : '' ?>><span class="form-check-label">設為目前招牌</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <?php if (!$rows): ?><div class="alert alert-light border mt-4">目前沒有網站招牌資料，請先新增一筆。</div><?php endif; ?>
        <div class="d-flex justify-content-end gap-2 mt-4 pt-4 border-top"><button type="reset" class="btn btn-light">重置</button><button type="submit" class="btn btn-dark">儲存標題設定</button></div>
    </form>
</section>
