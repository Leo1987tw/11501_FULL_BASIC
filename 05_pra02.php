<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>閏年判斷</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            max-width: 800px;
            width: 100%;
        }
        h3 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 1.8em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        p, div, li {
            color: #fff;
        }
        ul {
            margin-bottom: 20px;
        }
        li {
            margin: 8px 0;
            font-size: 1.1em;
            line-height: 1.6;
        }
        form {
            margin: 20px 0;
        }
        label {
            font-size: 1.1em;
            margin-right: 10px;
        }
        input[type="number"] {
            padding: 10px;
            border-radius: 8px;
            border: none;
            font-size: 1em;
            width: 150px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            background: rgba(255, 255, 255, 0.3);
            color: #fff;
            font-size: 1em;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-left: 10px;
        }
        input[type="submit"]:hover {
            background: rgba(255, 255, 255, 0.5);
        }
        .result {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
            font-size: 1.3em;
            font-weight: bold;
        }
        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="index.html" class="back-btn">← 返回首頁</a>
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