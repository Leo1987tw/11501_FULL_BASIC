<?php
include_once './api/db.php';

function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$post = $id ? $Post->find($id) : null;
if (!$post || (int) $post['status'] !== 1 || $post['deleted_at'] !== null) {
    http_response_code(404);
    $post = null;
}
$siteTitle = $Title->find(['status' => 1]) ?: ['title' => '溫暖家園 - 寵物認養與走失尋找平台'];
?>
<!doctype html>
<html lang="zh-Hant">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($post['pet_name'] ?? '案件不存在') ?> | <?= e($siteTitle['title']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body{background:#f7f3eb;color:#27332d}.detail-card{background:#fffdf9;border:0;border-radius:22px;box-shadow:0 18px 45px rgba(39,51,45,.1)}.detail-photo{width:100%;aspect-ratio:4/3;object-fit:cover;border-radius:16px;background:#e9e2d7}.text-forest{color:#203e34}</style>
</head>
<body>
    <main class="container py-5">
        <?php if (!$post): ?>
            <div class="detail-card p-5 text-center"><h1 class="h3">找不到這筆寵物案件</h1><a class="btn btn-success mt-3" href="index.php#pets">返回案件列表</a></div>
        <?php else: ?>
            <a class="text-success text-decoration-none" href="index.php#pets">← 返回案件列表</a>
            <article class="detail-card p-4 p-lg-5 mt-3"><div class="row g-4 align-items-center"><div class="col-lg-6"><img class="detail-photo" src="upload/<?= e($post['image']) ?>" alt="<?= e($post['pet_name']) ?>的照片" onerror="this.src='https://placehold.co/800x600/e9e2d7/315b4b?text=Pet+Photo'"></div><div class="col-lg-6"><span class="badge rounded-pill bg-success-subtle text-success mb-3"><?= e($post['case_status']) ?></span><h1 class="display-5 fw-bold text-forest"><?= e($post['pet_name']) ?></h1><p class="lead text-secondary mt-3"><?= nl2br(e($post['features'])) ?></p><div class="border-top pt-3 mt-4"><div class="text-secondary small">聯絡電話</div><div class="fs-4 fw-bold"><?= e($post['phone']) ?></div></div></div></div></article>
        <?php endif; ?>
    </main>
</body>
</html>
