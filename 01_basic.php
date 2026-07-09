<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>程式基礎概念</title>
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <div class="container">
        <a href="./index.html" class="back-btn">← 返回前頁</a>
        <h3>程式基礎概念 - 變數交換</h3>

        <?php

        $a = 10;
        $b = 50;
        echo 'a=' . $a . '<br>';
        echo 'b=' . $b . '<br>';

        $c = $a;
        $a = $b;
        $b = $c;

        echo "經交換後：<br>";
        echo 'a=' . $a . '<br>';
        echo 'b=' . $b . '<br>';

        ?>

    </div>
</body>

</html>