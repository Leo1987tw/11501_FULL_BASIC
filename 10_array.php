<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>陣列</title>
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
        table, th, td {
            border: 1px solid rgba(255, 255, 255, 0.5);
            padding: 10px;
            background: rgba(255, 255, 255, 0.1);
        }
        th {
            background: rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.html" class="back-btn">← 返回首頁</a>
        <h2>建立一個學生成績陣列</h2>
        <h3>設計一個陣列(一維或多維)來存放學生的成績資料</h3>
        <img src="array.png" style="width: 300px;">
    <?php

    $students=[
        "judy" => ["國文" => 95, "英文" => 64, "數學" => 70, "地理" => 90, "歷史" => 84],
        "amo" => ["國文" => 88, "英文" => 78, "數學" => 54, "地理" => 81, "歷史" => 71],
        "john" => ["國文" => 45, "英文" => 60, "數學" => 68, "地理" => 70, "歷史" => 62],
        "peter" => ["國文" => 59, "英文" => 32, "數學" => 77, "地理" => 54, "歷史" => 42],
        "hebe" => ["國文" => 71, "英文" => 62, "數學" => 80, "地理" => 62, "歷史" => 64],
    ];

    echo "<table>";
    echo "<tr>";
    echo "<th></th>";
    echo "<th>國文</th>";
    echo "<th>英文</th>";
    echo "<th>數學</th>";
    echo "<th>地理</th>";
    echo "<th>歷史</th>";
    echo "</tr>";

    foreach($students as $name => $subjects){
        echo "<tr>";
        echo "<th>" . $name . "</th>";
        foreach($subjects as $subject => $score){
            echo "<td>" . $score . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";

    ?>
    </div>
</body>
</html>