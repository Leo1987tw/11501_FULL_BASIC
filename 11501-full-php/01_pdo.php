<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pdo 連線</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <a href="./index.html" class="back-btn">← 返回前頁</a>
        <h3>pdo 連線</h3>

        <?php

        $dsn = "mysql: host=localhost; charset=utf8; dbname=school";
        $pdo = new PDO($dsn, 'root', '');

        $sql = "SELECT * FROM `dept`";
        $depts = $pdo ->query($sql) -> fetchAll(PDO::FETCH_ASSOC);

        echo "<pre>";
        print_r($depts);
        echo "<pre>";

        echo "<hr>";

        $sql_insert = "INSERT INTO `dept` (`code`,`name`) VALUES('601','中餐科')";
        $pdo -> exec($sql_insert);
        $depts = $pdo -> query($sql) -> fetchAll(PDO::FETCH_ASSOC);

        echo "<pre>";
        print_r($depts);
        echo "</pre>";

        echo "<hr>";

        $sql_update = "UPDATE `dept` SET `code`='602', `name`='西餐科' WHERE `id`='7'";
        $pdo -> exec($sql_update);
        $depts = $pdo -> query($sql) -> fetchAll(PDO::FETCH_ASSOC);

        echo "<pre>";
        print_r($depts);
        echo "</pre>";

        echo "<hr>";

        $sql_delete = "DELETE FROM `dept` WHERE `id`='7'";
        $pdo -> exec($sql_delete);
        $depts = $pdo -> query($sql) -> fetchAll(PDO::FETCH_ASSOC);

        echo "<pre>";
        print_r($depts);
        echo "</pre>";

        ?>

    </div>
</body>
</html>