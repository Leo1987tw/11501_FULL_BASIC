<?php

include_once "./db.php";

$table = $_GET['table'];
$Table = ucfirst($table);

if(!empty($_FILES['src']['tmp_name'])){
    move_uploaded_file($_FILES['src']['tmp_name'], "../upload/" . $_FILES['src']['name']);
    $_POST['src'] = $_FILES['src']['name'];
}

$_POST['text'];
$_POST['sh'] = 0;
$$Table->save($_POST);

to("../admin.php?do=$table");

?>