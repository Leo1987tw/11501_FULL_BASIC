<?php

include "./include/db_connect.php";

?>

<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>板橋國小</title>
</head>
<body>

    <!-- 頂部導覽列 -->
    <nav class="navbar">
        <a href="./index.html" class="nav-logo">綠意生態網</a>
        <div class="nav-links">
            <a href="../index.html" class="nav-item">回上一頁</a>
            <a href="#" class="nav-item">首頁</a>
            <a href="#" class="nav-item">最新消息</a>
            <a href="#" class="nav-item">關於我們</a>
            <a href="./login.php" class="btn-nav btn-login">登入</a>
            <a href="./register.php" class="btn-nav btn-register">註冊</a>
        </div>
    </nav>

    <!-- 主要內容區 -->
    <main class="main-content">
        <div class="container">
            <h1>歡迎來到板橋國小</h1>
            <p class="subtitle">探索清新、自然且高效的數位體驗。我們致力於提供最優質的服務，讓您的生活更輕鬆、更美好。</p>
            
            <!-- 行動呼籲按鈕組 -->
            <div class="cta-group">
                <a href="./register.php" class="btn-cta btn-cta-primary">立即免費註冊</a>
                <a href="./login.php" class="btn-cta btn-cta-secondary">會員登入入口</a>
            </div>

            <!-- 平台特色區 -->
            <div class="features">
                <div class="feature-card">
                    <h4>優雅介面</h4>
                    <p>採用舒適的綠色與溫暖橘色調，給您最放鬆的視覺享受。</p>
                </div>
                <div class="feature-card">
                    <h4>快速安全</h4>
                    <p>先進的前端毛玻璃架構，保障瀏覽時的流暢與美觀。</p>
                </div>
                <div class="feature-card">
                    <h4>響應式設計</h4>
                    <p>無論使用電腦、平板或手機，都能獲得最完美的排版呈現。</p>
                </div>
            </div>
        </div>
    </main>

</body>
</html>