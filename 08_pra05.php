<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>尋找字元</title>
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
        h3 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 1.8em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        p, div {
            color: #fff;
        }
        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.html" class="back-btn">← 返回首頁</a>
        <h3>尋找字元(使用while)</h3>

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
    </div>

</body>
</html>