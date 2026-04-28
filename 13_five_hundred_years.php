<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>找出五百年內的閏年</title>
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

        <h2>找出五百年內的閏年</h2>
        
        <ul>
            <li>請依照閏年公式找出五百年內的閏年</li>
            <li>使用陣列來儲存閏年</li>
            <li>使用迴圈來印出閏年</li>
        </ul>

    <form action="" method="post">
        <label for="year">請輸入西元年份：</label>
        <input type="number" id="year" name="year" min="2026" max="2526" required>
        <input type="submit" value="判斷">
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input_year = $_POST["year"];
    } else {
        echo "<div class='result'>請輸入年份。</div>";
        exit;
    }

    ?>

    <?php

    $year = 2026;

    $year_array = [];

    for($i = $year; $i < $year + 500; $i++){
        if(($i % 4 && $i % 100 != 0) || $i % 400 == 0){
            $year_array[] = $i;
        }
    }

    echo "<pre>";
    print_r($year_array);
    echo "</pre>";

    $input_year = 2400;

    if(in_array($input_year,$year_array)){
        echo "$input_year 是閏年";
    } else{
        echo "$input_year 不是閏年";
    }

    foreach($year_array as $value){
        echo "$value";
        echo "<br>";
    }

    ?>
    </div>
</body>
</html>