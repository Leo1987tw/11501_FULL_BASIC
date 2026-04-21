<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>程式基礎概念</title>
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
            max-width: 600px;
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
        <h3>程式基礎概念 - 變數交換</h3>

        <?php

        $a=10;
        $b=50;
        echo 'a='.$a.'<br>';
        echo 'b='.$b.'<br>';

        $c=$a;
        $a=$b;
        $b=$c;

        echo "經交換後：<br>";
        echo 'a='.$a.'<br>';
        echo 'b='.$b.'<br>';

        ?>

    </div>
</body>
</html>