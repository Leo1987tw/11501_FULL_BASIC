<!DOCTYPE html>
<html lang="zh_TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>綜合練習七</title>
</head>
<body>
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

    echo "<br>";

    echo "<table>";

    foreach($nineninetable as $i => $j){
        if($i%9 == 1){
            echo "<tr>";
            echo "<td>" . $j . "</td>";
        } else if($i % 9 == 0){
            echo "<td>" . $j . "</td>";
            echo "</tr>";
        } else{
            echo "<td>" . $j . "</td>";
        }
    }

    echo "</table>";

    ?>
</body>
</html>