<?php
include_once './api/db.php';
if ($_SESSION['login'] ?? false) { to('./admin.php'); }
?>
<!doctype html>
<html lang="zh-Hant">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>管理登入 | 溫暖家園</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body{min-height:100vh;background:#f7f3eb;color:#27332d}.login-shell{min-height:100vh;display:grid;place-items:center}.login-card{max-width:430px;width:100%;background:#fffdf9;border:0;border-radius:24px;box-shadow:0 20px 55px rgba(39,51,45,.13)}.brand{color:#315b4b;font-weight:800}.accent{color:#e78b5d}</style>
</head>
<body><main class="container login-shell py-5"><section class="login-card p-4 p-md-5"><div class="text-center mb-4"><div class="brand fs-4">溫暖家園 <span class="accent">●</span></div><p class="text-secondary mb-0 mt-2">寵物認養與走失尋找平台</p></div><form action="api/api_login.php" method="post"><div class="mb-3"><label class="form-label" for="username">管理員帳號</label><input class="form-control form-control-lg" id="username" name="username" required></div><div class="mb-4"><label class="form-label" for="password">密碼</label><input class="form-control form-control-lg" id="password" name="password" type="password" required></div><button class="btn btn-success btn-lg w-100" type="submit">登入管理後台</button></form><a class="d-block text-center mt-4 text-decoration-none" href="index.php">返回首頁</a></section></main></body>
</html>
