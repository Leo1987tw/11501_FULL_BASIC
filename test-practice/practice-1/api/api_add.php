<?php

include_once "./db.php";

$table = $_GET['table'];
$Table = ${ucfirst($table)};

if(!empty($_FILES['image']['tmp_name'])){
    move_uploaded_file($_FILES['image']['tmp_name'], "../upload/" . $_FILES['image']['name']);
    $_POST['image'] = $_FILES['image']['name'];
}

switch($table){
    case 'title':
        $_POST['status'] = 0;
        break;
    case 'admin':
        unset($_POST['passwordchecked']);
        break;
    case 'menu':
        $_POST['parent_id'] = 0;
    default:
        $_POST['status'] = 1;
}

$Table->save($_POST);

to("../admin.php?do=$table");

?>