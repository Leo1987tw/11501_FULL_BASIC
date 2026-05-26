<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>產生數列</title>
    <link rel="stylesheet" href="./style.css">
    
</head>

<body>
    <div class="container">
        <a href="./index.html" class="back-btn">← 返回前頁</a>
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
