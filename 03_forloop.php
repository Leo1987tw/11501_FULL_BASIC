<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>重覆結構</title>
</head>
<body>

<h3>For...loop 練習</h3>

<h4>列出一到十乘以十</h4>

<?php

for($i=1; $i<=10; $i=$i+1){
    echo "$i =>";
    echo $i*10 . "<br>";
}

?>

<br>

<h4>列出奇數</h4>

<?php

for($i=1; $i<=10; $i=$i+1){
    echo "$i =>";
    echo $i*2-1 . "<br>";
}

?>

<br>

<h4>列出偶數</h4>

<?php

for($i=1; $i<=10; $i=$i+1){
    echo "$i =>";
    echo $i*2-2 . "<br>";
}

?>

<h3>WHILE loop 練習</h3>

<?php

$score=43;

echo "成績為：" . $score . "分" . "<br>";
$count=0; //計算迴圈執行次數
while($score<60){
    $score=$score+10;
    $count=$count+1;
}

echo "登錄成績為" . $score . "分 <br>";
echo "迴圈執行次數：" . $count . "次 <br>";

?>

<h3>foreach練習</h3>

<?php

$score=[80, 90, 75, 60, 55];

foreach($score as $idx => $val){
    echo "第" . ($idx+1) . "位成績為：" . $val . "分 <br>";
}

?>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

</body>
</html>