<?php

include_once "./db.php";

$table = $_GET['table'];
$Table = ${ucfirst($table)};

if(!empty($_FILES['src']['tmp_name'])){
    move_uploaded_file($_FILES['src']['tmp_name'], "../upload/" . $_FILES['src']['name']);
    $_POST['src'] = $_FILES['src']['name'];
}

switch($table){
    case 'title':
        $_POST['sh'] = 0;
        break;
    case 'admin':
        unset($_POST['passwordchecked']);
        break;
    case 'menu':
        $_POST['parent'] = 0;
    default:
        $_POST['sh'] = 1;
}

$Table->save($_POST);

to("../admin.php?do=$table");

?>