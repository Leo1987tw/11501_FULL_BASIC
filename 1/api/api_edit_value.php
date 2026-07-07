<?php

include_once "./db.php";

$table = $_GET['table'];
$Table = ${ucfirst($table)};

$Table->save($_POST);

to("../admin.php?do=$table");

?>