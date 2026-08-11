<?php

include_once "./db.php";

$table = $_GET['table'];
$Table = ${ucfirst($table)};

if(!empty($_FILES['image']['tmp_name'])){
    move_uploaded_file($_FILES['image']['tmp_name'], "../upload/{$_FILES['image']['name']}");
    $row = $Table->find($_POST['id']);
    $row['image'] = $_FILES['image']['name'];
    $Table->save($row);
}

to("../admin.php?do=$table");

?>