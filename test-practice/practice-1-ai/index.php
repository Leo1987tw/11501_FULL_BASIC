<?php
include_once './api/db.php';

function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

$siteTitle = $Title->find(['status' => 1]) ?: [
    'title' => '溫暖家園 - 寵物認養與走失尋找平台',
    'image' => '01B01.jpg'
];
$mainMenus = $Menu->all(['status' => 1, 'parent_id' => 0], ' ORDER BY `sort`, `id`');
$Banners = $Banner;
$banners = $Banners->all(['status' => 1], ' ORDER BY `sort`, `id`');
$ads = $Ad->all(['status' => 1], ' ORDER BY `sort`, `id`');
$selectedMenuId = filter_input(INPUT_GET, 'menu_id', FILTER_VALIDATE_INT);
$postFilter = ['status' => 1];
if ($selectedMenuId) {
    $postFilter['menu_id'] = $selectedMenuId;
}
$perPage = 6;
$totalPosts = (int) $Post->count($postFilter);
$totalPages = max(1, (int) ceil($totalPosts / $perPage));
$currentPage = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT) ?: 1;
$currentPage = min(max($currentPage, 1), $totalPages);
$offset = ($currentPage - 1) * $perPage;
$posts = $Post->all($postFilter, " ORDER BY `sort`, `id` DESC LIMIT $offset, $perPage");
$selectedMenu = $selectedMenuId ? $Menu->find($selectedMenuId) : null;
?>
<!doctype html>
<html lang="zh-Hant">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($siteTitle['title']) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700;800&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --cream:#f7f3eb; --paper:#fffdf9; --ink:#27332d; --muted:#718078; --forest:#315b4b; --forest-dark:#203e34; --orange:#e78b5d; --line:#e5e0d7; --shadow:0 18px 45px rgba(39,51,45,.10); }
        html { scroll-behavior:smooth; }
        body { background:var(--cream); color:var(--ink); font-family:'Noto Sans TC',sans-serif; }
        .site-header { background:var(--forest-dark); }
        .site-header img { display:block; width:100%; height:auto; max-height:230px; object-fit:cover; }
        .site-header-fallback { min-height:150px; display:grid; place-items:center; color:#fffdf9; font-size:clamp(1.8rem,4vw,3.4rem); font-weight:800; }
        .navbar { background:rgba(255,253,249,.92); backdrop-filter:blur(14px); }
        .nav-link { color:var(--ink); font-weight:500; }
        .nav-link:hover,.nav-link.active { color:var(--orange); }
        .hero { position:relative; overflow:hidden; background:var(--forest-dark); }
        .hero .carousel-item { height:clamp(360px,52vw,570px); }
        .hero img { width:100%; height:100%; object-fit:cover; opacity:.74; }
        .hero .carousel-item::after { content:''; position:absolute; inset:0; background:linear-gradient(90deg,rgba(25,50,41,.88),rgba(25,50,41,.15) 75%); }
        .hero-copy { position:absolute; z-index:2; inset:0; display:flex; align-items:center; }
        .hero .carousel-control-prev, .hero .carousel-control-next { z-index:3; }
        .hero-copy h1 { max-width:680px; color:#fffdf9; font-size:clamp(2.2rem,5vw,4.8rem); font-weight:800; line-height:1.12; }
        .hero-copy p { max-width:510px; color:rgba(255,253,249,.86); font-size:1.1rem; }
        .eyebrow { color:#ffd2b9; font-size:.78rem; font-weight:700; letter-spacing:.14em; }
        .section-title { color:var(--forest-dark); font-weight:800; }
        .section-note { color:var(--muted); }
        .filter-panel { background:var(--paper); border:1px solid var(--line); border-radius:18px; box-shadow:var(--shadow); }
        .filter-link { border-radius:10px; color:var(--muted); font-weight:500; text-decoration:none; }
        .filter-link:hover,.filter-link.active { background:#f3e8dc; color:var(--forest-dark); }
        .pet-card { height:100%; overflow:hidden; border:1px solid var(--line); border-radius:18px; background:var(--paper); box-shadow:0 8px 24px rgba(39,51,45,.05); transition:transform .28s ease,box-shadow .28s ease; }
        .pet-card:hover { transform:translateY(-8px); box-shadow:0 20px 42px rgba(39,51,45,.16); }
        .pet-photo { aspect-ratio:4/3; width:100%; object-fit:cover; background:#e9e2d7; }
        .pet-card .card-body { padding:1.2rem; }
        .pet-name { color:var(--forest-dark); font-weight:800; }
        .status-badge { background:#e7f0e8; color:#3e7256; font-size:.75rem; }
        .status-badge.done { background:#f4e6dc; color:#a15e3b; }
        .feature-copy { color:var(--muted); display:-webkit-box; -webkit-box-orient:vertical; -webkit-line-clamp:3; line-clamp:3; overflow:hidden; min-height:4.5em; }
        .ad-strip { background:var(--forest); color:#f7f3eb; }
        .ad-strip strong { color:#ffd2b9; }
        .empty-state { border:1px dashed #cfc6b9; border-radius:18px; color:var(--muted); }
        footer { background:var(--forest-dark); color:rgba(255,253,249,.72); }
        .btn-warm { background:var(--orange); border-color:var(--orange); color:#fff; font-weight:700; }
        .btn-warm:hover { background:#cf7047; border-color:#cf7047; color:#fff; }
        @media (max-width:767.98px) { .hero-copy h1 { font-size:2.4rem; } .hero-copy p { font-size:.95rem; } }
    </style>
</head>
<body>
    <header class="site-header" aria-label="網站招牌">
        <?php if (!empty($siteTitle['image'])): ?>
            <img src="upload/<?= e($siteTitle['image']) ?>" alt="<?= e($siteTitle['title']) ?>" onerror="this.outerHTML='<div class=&quot;site-header-fallback&quot;><?= e($siteTitle['title']) ?></div>'">
        <?php else: ?>
            <div class="site-header-fallback"><?= e($siteTitle['title']) ?></div>
        <?php endif; ?>
    </header>
    <nav class="navbar navbar-expand-lg sticky-top border-bottom">
        <div class="container py-2">
            <a class="navbar-brand fw-bold text-success" href="index.php">溫暖家園</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-label="切換導覽列"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item"><a class="nav-link active" href="index.php">首頁</a></li>
                    <?php foreach ($mainMenus as $mainMenu): ?>
                        <?php $subMenus = $Menu->all(['status' => 1, 'parent_id' => $mainMenu['id']], ' ORDER BY `sort`, `id`'); ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php" role="button" data-bs-toggle="dropdown"><?= e($mainMenu['name']) ?></a>
                            <ul class="dropdown-menu border-0 shadow-sm">
                                <?php foreach ($subMenus as $subMenu): ?><li><a class="dropdown-item" href="index.php?menu_id=<?= (int) $subMenu['id'] ?>#pets"><?= e($subMenu['name']) ?></a></li><?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                    <li class="nav-item ms-lg-2"><a class="btn btn-warm btn-sm px-3" href="admin.php">管理登入</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section id="petCarousel" class="hero carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php if ($banners): ?>
                    <?php foreach ($banners as $index => $banner): ?>
                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>"><img src="upload/<?= e($banner['image']) ?>" alt="溫暖家園寵物守護照片" onerror="this.style.display='none'"></div>
                    <?php endforeach; ?>
                <?php else: ?><div class="carousel-item active"></div><?php endif; ?>
            </div>
            <div class="hero-copy"><div class="container"><div class="eyebrow mb-3">A WARM HOME FOR EVERY PET</div><h1>讓每一次相遇，<br>都走向一個家。</h1><p class="mt-3 mb-4">認養、尋找與重逢，讓溫柔的牽掛被更多人看見。</p><a class="btn btn-warm px-4 py-2" href="#pets">開始尋找毛孩</a></div></div>
            <?php if (count($banners) > 1): ?><button class="carousel-control-prev" type="button" data-bs-target="#petCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">上一張</span></button><button class="carousel-control-next" type="button" data-bs-target="#petCarousel" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">下一張</span></button><?php endif; ?>
        </section>

        <?php if ($ads): ?><div class="ad-strip py-3"><div class="container"><div class="d-flex gap-4 overflow-hidden text-nowrap"><strong>守護小提醒</strong><div><?= e(implode('　／　', array_column($ads, 'content'))) ?></div></div></div></div><?php endif; ?>

        <section id="pets" class="container py-5">
            <div class="row g-4">
                <aside class="col-lg-3"><div class="filter-panel p-3 p-lg-4 sticky-lg-top" style="top:90px"><div class="small text-uppercase fw-bold text-secondary mb-3">Browse cases</div><h2 class="h5 section-title mb-3">尋找適合的毛孩</h2><div class="d-grid gap-1"><a class="filter-link px-3 py-2 <?= !$selectedMenuId ? 'active' : '' ?>" href="index.php#pets">全部案件</a>
                    <?php foreach ($mainMenus as $mainMenu): ?><div class="small text-secondary fw-bold mt-3 mb-1 px-3"><?= e($mainMenu['name']) ?></div><?php $subMenus = $Menu->all(['status' => 1, 'parent_id' => $mainMenu['id']], ' ORDER BY `sort`, `id`'); foreach ($subMenus as $subMenu): ?><a class="filter-link px-3 py-2 <?= (int) $selectedMenuId === (int) $subMenu['id'] ? 'active' : '' ?>" href="index.php?menu_id=<?= (int) $subMenu['id'] ?>#pets"><?= e($subMenu['name']) ?></a><?php endforeach; ?><?php endforeach; ?>
                </div></div></aside>
                <div class="col-lg-9"><div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4"><div><div class="small text-uppercase fw-bold text-secondary mb-2">Meet your new friend</div><h2 class="section-title mb-1"><?= $selectedMenu ? e($selectedMenu['name']) : '最新寵物案件' ?></h2><p class="section-note mb-0">每一則刊登，都是一段值得被珍惜的故事。</p></div><span class="badge rounded-pill text-bg-light px-3 py-2"><?= count($posts) ?> 筆案件</span></div>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                        <?php foreach ($posts as $post): ?><?php $isDone = in_array($post['case_status'], ['已認養', '已尋獲'], true); ?><article class="col"><a class="text-decoration-none" href="detail.php?id=<?= (int) $post['id'] ?>"><div class="pet-card"><img class="pet-photo" src="upload/<?= e($post['image']) ?>" alt="<?= e($post['pet_name']) ?>的照片" onerror="this.src='https://placehold.co/800x600/e9e2d7/315b4b?text=Pet+Photo'"><div class="card-body"><div class="d-flex justify-content-between align-items-center mb-2"><span class="badge rounded-pill status-badge <?= $isDone ? 'done' : '' ?>"><?= e($post['case_status']) ?></span><small class="text-secondary">案件 #<?= (int) $post['id'] ?></small></div><h3 class="h4 pet-name mb-2"><?= e($post['pet_name']) ?></h3><p class="feature-copy mb-3"><?= e($post['features']) ?></p><div class="d-flex justify-content-between align-items-center border-top pt-3"><small class="text-secondary">聯絡電話</small><strong class="small"><?= e($post['phone']) ?></strong></div></div></div></a></article><?php endforeach; ?>
                    </div>
                    <?php if ($totalPages > 1): ?><nav class="mt-4" aria-label="寵物案件分頁"><ul class="pagination justify-content-center"><li class="page-item <?= $currentPage === 1 ? 'disabled' : '' ?>"><a class="page-link" href="index.php?<?= http_build_query(array_filter(['menu_id' => $selectedMenuId, 'page' => $currentPage - 1])) ?>#pets">上一頁</a></li><?php for ($page = 1; $page <= $totalPages; $page++): ?><li class="page-item <?= $page === $currentPage ? 'active' : '' ?>"><a class="page-link" href="index.php?<?= http_build_query(array_filter(['menu_id' => $selectedMenuId, 'page' => $page])) ?>#pets"><?= $page ?></a></li><?php endfor; ?><li class="page-item <?= $currentPage === $totalPages ? 'disabled' : '' ?>"><a class="page-link" href="index.php?<?= http_build_query(array_filter(['menu_id' => $selectedMenuId, 'page' => $currentPage + 1])) ?>#pets">下一頁</a></li></ul></nav><?php endif; ?>
                    <?php if (!$posts): ?><div class="empty-state text-center py-5 mt-4">目前這個分類還沒有案件，換個選項看看吧。</div><?php endif; ?>
                </div>
            </div>
        </section>
    </main>

    <footer class="py-4"><div class="container d-flex flex-wrap justify-content-between gap-2"><span><?= e($siteTitle['title']) ?></span><span><?= e(($Footer->find(1)['copyright'] ?? '用心守護每一個家')) ?></span></div></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
