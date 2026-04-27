<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>畫星星</title>
    <style>
        *{
            font-family: 'Courier New', Courier, monospace;
        }
        </style>
</head>
<body>

<h2>以 * 符號為基礎在網頁上排列出下列圖形:</h2>

<ul>
    <li>直角三角型</li>
    <li>倒直角三角型</li>
    <li>正三角型</li>
    <li>菱型</li>
    <li>矩形</li>
    <li>內含對角線的矩形</li>
</ul>

<img src="畫星星.png" alt="畫星星" width="400px">

<h3>直角三角型</h3>

<?php

for($i=0; $i < 5; $i++){
    for($j=0; $j <= $i; $j++){
        echo "*";
    }
    echo "<br>";
}

echo "<br>";

for($i=0; $i < 5; $i++){
    for($j=0; $j <= 5; $j++){
        if($i >= $j){
            echo "*";
        }
    }
    echo "<br>";
}

?>

<h3>倒直角三角型</h3>

<?php

for($i=5; $i > 0; $i--){
    for($j=0;$j < $i; $j++){
        echo "*";
    }
    echo "<br>";
}

echo "<br>";

for($i=0; $i < 5; $i++){
    for($j=0;$j < 5-$i; $j++){
        echo "*";
    }
    echo "<br>";
}

echo "<br>";

for($i=0; $i < 5; $i++){
    for($j=0; $j <= 5; $j++){
        if($i < $j){
            echo "*";
        }
    }
    echo "<br>";
}

?>

<h3>正三角型</h3>

<?php

for($i=0; $i < 4; $i++){
    for($j=0; $j < 3-$i; $j++){
        echo "&nbsp";
    }
    for($k=0; $k <= $i*2; $k++){
            echo "*";
    }
    echo "<br>";
}

echo "<br>";

for($i=0; $i < 5; $i++){
    for($j=0; $j <= 7; $j++){
        if($j < 3 + $i && $j > 3 - $i){
            echo "*";
        } else {
            echo "&nbsp";
        }
    }
    echo "<br>";
}

?>

<h3>菱型</h3>

<?php

for($i=0; $i < 5; $i++){
    for($j=0; $j <= 7; $j++){
        if($j < 3 + $i && $j > 3 - $i){
            echo "*";
        } else {
            echo "&nbsp";
        }
    }
    echo "<br>";
}

for($i=3; $i > 0; $i--){
    for($j=0; $j <= 7; $j++){
        if($j < 3 + $i && $j > 3 - $i){
            echo "*";
        } else {
            echo "&nbsp";
        }
    }
    echo "<br>";
}

?>

<h3>矩形</h3>

<?php

echo "*******<br>";

for($i=0; $i < 5; $i++){
    echo "*&nbsp&nbsp&nbsp&nbsp&nbsp*<br>";
}

echo "*******<br>";


?>
<h3>內含對角線的矩形</h3>
<?php



?>

</body>
</html>