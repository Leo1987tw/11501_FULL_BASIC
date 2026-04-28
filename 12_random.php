<!DOCTYPE html>
<html lang="zh_TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>威力彩電腦選號</title>
</head>
<body>

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
    
</body>
</html>