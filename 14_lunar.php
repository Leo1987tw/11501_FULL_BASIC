<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>找出天干地支年份</title>
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
            max-width: 600px;
            width: 100%;
        }
        h2, h3 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 1.8em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        p, div, ul, li {
            color: #fff;
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
        form {
            margin-bottom: 20px;
        }
        label {
            color: #fff;
        }
        input[type="number"] {
            padding: 8px;
            border-radius: 5px;
            border: none;
        }
        input[type="submit"] {
            padding: 8px 20px;
            border-radius: 5px;
            border: none;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        input[type="submit"]:hover {
            background: rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.html" class="back-btn">← 返回首頁</a>

        <h2>已知西元1024年為甲子年，請設計一支程式，可以接受任一西元年份，輸出對應的天干地支的年別。(利用迴圈)</h2>

        <ul>
            <li>天干：甲乙丙丁戊己庚辛壬癸</li>
            <li>地支：子丑寅卯辰巳午未申酉戌亥</li>
            <li>天干地支配對：甲子、乙丑、丙寅….甲戌、乙亥、丙子….</li>
        </ul>

    <form action="" method="post">
        <label for="year">請輸入西元年份：</label>
        <input type="number" id="year" name="year" min="2026" max="2526" required>
        <input type="submit" value="判斷">
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $year = $_POST["year"];
    } else {
        echo "<div class='result'>請輸入年份。</div>";
        exit;
    }

    ?>

    <?php

    $sky_stems = ["甲","乙","丙","丁","戊","己","庚","辛","壬","癸"];
    $earth_branches = ["子","丑","寅","卯","辰","巳","午","未","申","酉","戌","亥"];

    $difference = $year -1024;
    $index = $difference % 60;

    $sky = $sky_stems[$index % 10];
    $earth = $earth_branches[$index % 12];

    echo "西元{$year}年是{$sky}{$earth}年";
    
    ?>
    </div>
</body>
</html>