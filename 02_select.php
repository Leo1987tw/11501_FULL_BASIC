<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>選擇結構</title>
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
    </style>
</head>
<body>
    <div class="container">
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

    </div>
</body>
</html>