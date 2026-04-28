<!DOCTYPE html>
<html lang="zh_TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>反轉陣列</title>
</head>
<body>

    <h2>請設計一支程式，在不產生新陣列的狀況下，將一個陣列的元素順序反轉(利用迴圈)</h2>

    <ul>
        <li>例：$a=[2,4,6,1,8] 反轉後 $a=[8,1,6,4,2]</li>
    </ul>

    <?php

    $a=[2,4,6,1,8];
    
    $max_index = count($a)-1;

    for($i=0; $i < count($a)/2; $i++){
         $temporary = $a[$i];
         $a[$i] = $a[$max_index - $i];
         $a[$max_index - $i] = $temporary;
    }

    echo "<pre>";
    echo "print_r($a)";
    echo "</pre>";

    ?>
    
</body>
</html>