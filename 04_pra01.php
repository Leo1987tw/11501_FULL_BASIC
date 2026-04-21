<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>練習題</title>
</head>
<body>

<h3>分配成績等級</h3>

<ul>
    <li>給定一個成績數字，根據成績所在的區間，給定等級</li>
    <li>0~59 => E</li>
    <li>60~69 => D</li>
    <li>70~79 => C</li>
    <li>80~89 => B</li>
    <li>90~100 => A</li>
</ul>

<?php
$score=75;
$level='';

if($score>0 && $score<60){
    $level='E';
    }else if($score>=60 && $score<70){
        $level='D';
        } else if($score>=70 && $score<80){
            $level='C';
            } else if($score>=80 && $score<90){
                $level='B';
                } else if($score>=90 && $score<=100){
                    $level='A';
                    } else {
                        echo "成績輸入錯誤";
                        }
                        
                        echo "成績: $score, 等級: $level";
                        
                        ?>

<h3>簡化寫法</h3>

<?php

$score=75;

if($score<0 || $score>100){
    echo "成績輸入錯誤";
} else if($score<60){
    $level='E';
} else if($score<70){
    $level='D';
} else if($score<80){
    $level='C';
} else if($score<90){
    $level='B';
} else {
        $level='A';
}
                        
                        
echo "成績: $score, 等級: $level";
                        
?>

</body>
</html>