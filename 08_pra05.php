<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>尋找字元</title>
</head>
<body>
    
<h2>尋找字元(使用while)</h2>

<ul>
    <li>給定一個字串句子</li>
    <li>給定一個單字或字母</li>
    <li>尋找相符的內容</li>
    <li>印出尋找到的單字或字母所在句子中的位置</li>
</ul>

<form action="" method="post">
    <label for="sentence">請輸入一個句子</lable>
    <input type="text" name="sentence" id="sentence" placeholder="請輸入一個句子",required>
    <label for="word">請輸入一個詞</lable>
    <input type="text" name="word" id="word" placeholder="請輸入一個詞" required>
    <input type="submit" value="尋找">
</form>

 <div>
     <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $str = $_POST["sentence"];
        $target = $_POST["word"];
     } else {
        echo "<div class='result'>請輸入</div>";
        exit;
     }
     ?>
 </div>

<div>
    
    <?php
    
    $position=0;
    $count=0;
    $flag=false;
    $length = mb_strlen($str, 'UTF-8') - mb_strlen($target, 'UTF-8') +1;
    $target_length = mb_strlen($target, 'UTF-8');
    
    while($position < $length){
        $tmp=mb_substr($str, $position, $target_length, 'UTF-8');
        if($tmp == $target){
            echo "找到 $target 在位置" . ($position+1) . "<br>";
            $flag=true;
        }
        $position++;
        $count++;
    }
    
    if($flag == false){
        echo "沒有找到<br>";
    }
    
    echo "總共尋找了" . $count . "次<br>";
    
    ?>
</div>

</body>
</html>