<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>威力彩電腦選號</title>
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
    </style>
</head>
<body>
    <div class="container">
        <a href="index.html" class="back-btn">← 返回首頁</a>

        <h2>威力彩電腦選號沒有重覆號碼(利用while迴圈)</h2>

        <ul>
            <li>使用亂數函式rand($a,$b)來產生號碼</li>
            <li>將產生的號碼順序存入陣列中</li>
            <li>每次存入陣列中時會先檢查陣列中的資料有沒有重覆</li>
            <li>完成選號後將陣列內容印出</li>
        </ul>

<?php

$lotto=[];

while(count($lotto) < 6){
    $temporary = rand(1, 38);
    echo "$temporary";
    if(!in_array($temporary, $lotto)){
        $lotto[]=$temporary;
        echo "<pre>";
        print_r($lotto);
        echo "</pre>";
    }
    echo "<br>";
}

foreach($lotto as $index => $number){
    if($index < 5){
        echo "$number, ";
    } else{
        echo "$number";
    }
}

$spacial_number = rand(1, 8);

echo "$spacial_number";

?>
    </div>
</body>
</html>