<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>綜合練習七</title>
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
        <h2>利用程式來產生陣列</h2>

        <ul>
            <li>以迴圈的方式產生一個九九乘法表</li>
            <li>將九九乘法表的每個項目以字串型式存入陣列中</li>
            <li>再以迴圈方式將陣列內容印出</li>
        </ul>
    <?php

    $nineninetable = [];

    for($i=1; $i<=9; $i++){
        for($j=1; $j<=9; $j++){
            $nineninetable[] = "$i x $j = " . ($i*$j);
        }
    }

    echo "<pre>";
    print_r($nineninetable);
    echo "</pre>";

    echo "<table>";

    foreach($nineninetable as $i => $j){
        if($i%9 == 0){
            echo "<tr>";
            echo "<td>" . $j . "</td>";
        } else if($i % 9 == 8){
            echo "<td>" . $j . "</td>";
            echo "</tr>";
        } else{
            echo "<td>" . $j . "</td>";
        }
    }

    echo "</table>";

    ?>
    </div>
</body>
</html>