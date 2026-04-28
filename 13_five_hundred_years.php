<!DOCTYPE html>
<html lang="zh_TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>找出五百年內的閏年</title>
</head>
<body>

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
    
</body>
</html>