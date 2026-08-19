<?php

include_once "./db.php";
if(($_SESSION['login'] ?? 0) !== 1){ http_response_code(403); exit('Forbidden'); }

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