<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>閏年判斷</title>
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <div class="container">
        <a href="./index.html" class="back-btn">← 返回前頁</a>
        <h3>閏年判斷</h3>
        <p>給定一個西元年份，判斷是否為閏年</p>

        <ul>
            <li>地球對太陽的公轉一年的真實時間大約是365天5小時48分46秒，因此以365天定為一年的狀況下，每年會多出近六小時的時間，所以每隔四年設置一個閏年來消除這多出來的一天。</li>
            <li>公元年分除以4不可整除，為平年。</li>
            <li>公元年分除以4可整除但除以100不可整除，為閏年。</li>
            <li>公元年分除以100可整除但除以400不可整除，為平年。</li>
        </ul>

        <form action="" method="post">
            <label for="year">請輸入西元年份：</label>
            <input type="number" id="year" name="year" required>
            <input type="submit" value="判斷">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $year = $_POST["year"];
        } else {
            echo "<div class='result'>請輸入年份。</div>";
            exit;
        }

        if ($year % 4 == 0 && $year % 100 != 0 || $year % 400 == 0) {
            echo "<div class='result'>$year 是閏年。</div>";
        } else {
            echo "<div class='result'>$year 是平年。</div>";
        }
        ?>

    </div>
</body>

</html>