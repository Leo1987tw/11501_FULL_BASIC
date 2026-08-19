<?php
include_once './api/db.php';

if (($_SESSION['login'] ?? 0) !== 1) {
    to('login.php');
    exit;
}

$siteTitle = $Title->find(['status' => 1]) ?: [
    'title' => '溫暖家園 - 寵物認養與走失尋找平台',
    'image' => '01B01.jpg'
];
$allowedPages = ['title', 'ad', 'banner', 'image', 'counter', 'footer', 'post', 'admin', 'menu'];
$do = $_GET['do'] ?? 'post';
if (!in_array($do, $allowedPages, true)) {
    $do = 'post';
}
$pageLabels = [
    'title' => '網站招牌',
    'ad' => '守護標語',
    'banner' => '宣導輪播',
    'image' => '寵物照片',
    'counter' => '瀏覽人次',
    'footer' => '頁尾設定',
    'post' => '寵物案件',
    'admin' => '管理員帳號',
    'menu' => '選單管理'
];
?>
<!doctype html>
<html lang="zh-Hant">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($pageLabels[$do] . ' | ' . $siteTitle['title'], ENT_QUOTES, 'UTF-8') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
    <style>
        :root { --admin-ink:#27332d; --admin-muted:#718078; --admin-paper:#fffdf9; --admin-cream:#f7f3eb; --admin-forest:#315b4b; --admin-dark:#203e34; --admin-orange:#e78b5d; }
        body { min-height:100vh; background:var(--admin-cream); color:var(--admin-ink); }
        .admin-shell { min-height:100vh; }
        .admin-topbar { background:var(--admin-dark); color:#fffdf9; }
        .admin-brand { color:#fffdf9; font-weight:800; text-decoration:none; }
        .admin-brand:hover { color:#ffd2b9; }
        .admin-brand img { width:44px; height:44px; border-radius:10px; object-fit:cover; }
        .admin-layout { display:grid; grid-template-columns:250px minmax(0,1fr); gap:1.5rem; max-width:1440px; margin:0 auto; padding:1.5rem; }
        .admin-sidebar { align-self:start; position:sticky; top:1rem; padding:1rem; border:1px solid #e5e0d7; border-radius:18px; background:var(--admin-paper); box-shadow:0 14px 36px rgba(39,51,45,.08); }
        .admin-sidebar .list-group-item { border:0; border-radius:10px !important; color:var(--admin-muted); font-weight:600; margin:.15rem 0; }
        .admin-sidebar .list-group-item:hover { background:#f3e8dc; color:var(--admin-dark); }
        .admin-sidebar .list-group-item.active { background:var(--admin-forest); color:#fff; }
        .admin-content { min-width:0; border:1px solid #e5e0d7; border-radius:18px; background:var(--admin-paper); box-shadow:0 14px 36px rgba(39,51,45,.07); overflow:hidden; }
        .admin-content-header { padding:1.5rem 1.75rem; border-bottom:1px solid #e5e0d7; background:rgba(255,255,255,.55); }
        .admin-content-body { padding:0; }
        .admin-content .di { float:none !important; left:auto !important; width:auto !important; height:auto !important; min-height:0; margin:0 !important; padding:0 !important; border:0 !important; position:static !important; }
        .admin-content .di > div { width:auto !important; height:auto !important; margin:0 !important; overflow:visible !important; border:0 !important; }
        .admin-content .cent { text-align:center; }
        .admin-content .t { display:block; font-weight:700; padding:1rem; }
        .admin-content table { width:100% !important; margin:0 !important; border-collapse:separate; border-spacing:0; }
        .admin-content table td, .admin-content table th { padding:.85rem .75rem; border-bottom:1px solid #eee9e1; vertical-align:middle; }
        .admin-content input[type=text], .admin-content input[type=password], .admin-content input[type=number], .admin-content textarea, .admin-content select { max-width:100%; border:1px solid #d9d4cb; border-radius:8px; padding:.5rem .65rem; background:#fff; }
        .admin-content input[type=submit], .admin-content input[type=button], .admin-content button { border:0; border-radius:8px; padding:.55rem .9rem; background:var(--admin-forest); color:#fff; }
        .admin-content input[type=reset] { border:0; border-radius:8px; padding:.55rem .9rem; background:#ebe7df; color:var(--admin-ink); }
        .admin-footer { max-width:1440px; margin:0 auto; padding:0 1.5rem 1.5rem; color:var(--admin-muted); }
        #cover { position:fixed !important; inset:0; z-index:1050; background:rgba(32,62,52,.48); }
        #coverr { position:relative !important; top:7vh !important; width:min(760px,92vw) !important; height:auto !important; min-height:180px; max-height:86vh; margin:auto !important; padding:1rem; overflow:auto; border-radius:18px; background:var(--admin-paper); box-shadow:0 24px 60px rgba(0,0,0,.2); }
        #cvr { position:static !important; width:100% !important; height:auto !important; }
        #coverr > a { color:var(--admin-dark); font-weight:800; }
        @media (max-width:900px) { .admin-layout { grid-template-columns:1fr; padding:1rem; } .admin-sidebar { position:static; } .admin-sidebar .list-group { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:.2rem; } }
        @media (max-width:520px) { .admin-sidebar .list-group { grid-template-columns:1fr; } .admin-content-header { padding:1.25rem; } }
    </style>
</head>
<body>
    <div id="cover" style="display:none">
        <div id="coverr">
            <a class="position-absolute top-0 end-0 p-3 text-decoration-none" href="#" onclick="cl('#cover'); return false;" aria-label="關閉視窗">關閉</a>
            <div id="cvr"></div>
        </div>
    </div>

    <div class="admin-shell">
        <header class="admin-topbar">
            <div class="container-fluid px-3 px-lg-4 py-3 d-flex justify-content-between align-items-center gap-3">
                <a class="admin-brand d-flex align-items-center gap-2" href="index.php">
                    <img src="upload/<?= htmlspecialchars($siteTitle['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($siteTitle['title'], ENT_QUOTES, 'UTF-8') ?>">
                    <span><?= htmlspecialchars($siteTitle['title'], ENT_QUOTES, 'UTF-8') ?></span>
                </a>
                <a class="btn btn-sm btn-outline-light" href="./api/api_logout.php">登出</a>
            </div>
        </header>

        <div class="admin-layout">
            <aside class="admin-sidebar" aria-label="後台管理選單">
                <div class="small text-uppercase text-secondary fw-bold px-3 mb-2">Management</div>
                <div class="list-group">
                    <?php foreach ($pageLabels as $page => $label): ?>
                        <a class="list-group-item list-group-item-action <?= $page === $do ? 'active' : '' ?>" href="?do=<?= $page ?>"><?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?></a>
                    <?php endforeach; ?>
                </div>
                <div class="mt-4 pt-3 border-top small text-secondary">網站瀏覽人次：<?= (int) ($Counter->find(1)['count_value'] ?? 0) ?></div>
            </aside>

            <section class="admin-content">
                <div class="admin-content-header"><div class="small text-uppercase text-secondary fw-bold mb-1">Dashboard</div><h1 class="h3 fw-bold mb-0"><?= htmlspecialchars($pageLabels[$do], ENT_QUOTES, 'UTF-8') ?></h1></div>
                <div class="admin-content-body"><?php include "back/{$do}.php"; ?></div>
            </section>
        </div>

        <footer class="admin-footer small"><?= htmlspecialchars($Footer->find(1)['copyright'] ?? '', ENT_QUOTES, 'UTF-8') ?></footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
