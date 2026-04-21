<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>選擇結構</title>
</head>
<body>

<h3>選擇結構練習</h3>

<?php

$score=75;

echo "成績為：" . $score . "分" . "<br>";

echo "判定：";

if($score>=60){
    echo "及格";
} else {
    echo "不及格";
}

?>

<h3>多選結構練習</h3>

<?php

$level="B";

echo "成績等級為：" . $level . "分" . "<br>";

echo "評語：";

switch($level){
    case "A":
        echo "表現優良，請繼續保持";
        break;
    case "B":
        echo "值得肯定，還有進步空間";
        break;
    case "C":
        echo "需要更多的練習";
        break;
    case "D":
        echo "需要加強基本功";
        break;
    default:
        echo "是否無心學業？";
}

?>

</body>
</html>