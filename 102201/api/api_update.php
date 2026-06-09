<?php

include_once "./db.php";

$table = $_GET['table'];
$Table = ${ucfirst($table)};

if(!empty($_FILES['src']['tmp_name'])){
    move_uploaded_file($_FILES['src']['tmp_name'], "../upload/{$_FILES['src']['name']}");
    $row = $Table->find($_POST['id']);
    $row['src'] = $_FILES['src']['name'];
    $Table->save($row);
}

to("../admin.php?do=$table");

?>