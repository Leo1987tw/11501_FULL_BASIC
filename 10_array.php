<!DOCTYPE html>
<html lang="zh_TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>陣列</title>
    <style>
        table, th, td {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
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
</body>
</html>