<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>重覆結構</title>
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
            max-width: 800px;
            width: 100%;
        }
        h3, h4 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 1.8em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        h4 {
            font-size: 1.4em;
            margin-top: 30px;
        }
        p, div {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">

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

<h4>列出費氏數列</h4>

<?php
    
for($i=1, $j=0 ,$k=1 ; $i<=10; $i=$i+1){
    
        $l=$j+$k;
        $j=$k;
        $k=$l;
        echo "$i =>";
        echo $l . "<br>";
}
    
?>

<h3>WHILE loop 練習</h3>

<?php

$score=23;

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

$score=[23, 34, 56, 61, 73];

foreach($score as $idx => $val){
    echo "第" . ($idx+1) . "位成績為：" . $val . "分 <br>";
}

?>

<br>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

    </div>
</body>
</html>
<p>&nbsp;</p>

</body>
</html>