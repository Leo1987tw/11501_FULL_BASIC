<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>產生數列</title>
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
        p, div, li {
            color: #fff;
        }
        ul {
            margin-bottom: 20px;
        }
        li {
            margin: 8px 0;
            font-size: 1.1em;
        }
        .result {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 10px;
            margin: 15px 0;
            font-family: monospace;
            font-size: 1.1em;
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
        <h3>使用for迴圈來產生以下的數列</h3>
        
        <ul>
            <li>1,3,5,7,9……n</li>
            <li>10,20,30,40,50,60……n</li>
            <li>3,5,7,11,13,17……97</li>
        </ul>

        <form action="" method="post">
            <label for="number">請輸入數字：</label>
            <input type="number" id="number" name="number" required>
            <input type="submit" value="產生數列">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $n = $_POST["number"];
        } else {
            echo "<div class='result'>請輸入數字。</div>";
            exit;
        }

        ?>

        <div class="result">
            <?php
            echo '1';
            for($i=3 ; $i < $n; $i += 2){
                echo ', ' . $i;
            }
            ?>
        </div>

        <div class="result">
            <?php
            echo '10';
            for($i=2 ; $i*10 < $n ; $i++ ){
                echo ', ' . $i*10;
            }
            ?>
        </div>

        <div class="result">
            <?php
            echo '3';
            $n = 100;
            $count = 0;
            for($i=5 ; $i< $n ; $i++){
                $count++;
                for($j=2 ; $j <= $i ; $j++){
                $count++;
                if($i % $j == 0){
                        echo ', ' . $i;
                        break;
                    }
                }
            }
    
            echo "<br>迴圈執行次數：" . $count;
                
            ?>
        </div>

        <div class="result">
            <?php
            echo '3';
            $n = 100;
            $count = 0;
            for($i=5 ; $i< $n ; $i++){
                $count++;
                for($j=2 ; $j <= sqrt($i) ; $j++){
                    $count++;
                    if($i % $j == 0){
                        echo ', ' . $i;
                        break;
                    }
                }
            }

            echo "<br>迴圈執行次數：" . $count;

            ?>

        </div>

    </div>
</body>

</html>