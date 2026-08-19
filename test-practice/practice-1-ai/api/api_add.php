<?php

include_once "./db.php";
if(($_SESSION['login'] ?? 0) !== 1){ http_response_code(403); exit('Forbidden'); }

$table = $_GET['table'];
$Table = ${ucfirst($table)};

if(!empty($_FILES['image']['tmp_name'])){
    move_uploaded_file($_FILES['image']['tmp_name'], "../upload/" . $_FILES['image']['name']);
    $_POST['image'] = $_FILES['image']['name'];
}

switch($table){
    case 'admin':
        unset($_POST['passwordchecked']);
        break;
    case 'title':
        $_POST['status'] = 0;
        $_POST['deleted_at'] = NULL;
        break;
    case 'post':
        $_POST['status'] = 1;
        $_POST['sort'] = NULL;
        $_POST['deleted_at'] = NULL;
        if (empty($_POST['case_status'])) {
            $_POST['case_status'] = '刊登中';
        }
        break;
    case 'menu':
        $_POST['parent_id'] = 0;
    default:
        $_POST['status'] = 1;
        $_POST['sort'] = NULL;
        $_POST['deleted_at'] = NULL;
}

$Table->save($_POST);

to("../admin.php?do=$table");

?>