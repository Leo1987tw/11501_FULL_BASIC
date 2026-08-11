<?php

include_once "./db.php";

$table = $_GET['table'];
$Table = ${ucfirst($table)};

foreach($_POST['id'] as $key => $value){
    if(isset($_POST['delete']) && in_array($value, $_POST['delete'])){
        $Table->save(['id' => $value, 'deleted_at' => date("Y-m-d H:i:s")]);
    }else {
        $row = $Table->find($value);
        switch($table){
            case 'admin':
                $row['username'] = $_POST['username'][$key];
                $row['password'] = $_POST['password'][$key];
                break;
            case 'ad':
            case 'post':
                $row['content'] = $_POST['content'][$key];
            case 'banner':
            case 'image':
                $row['status'] = (isset($_POST['status']) && in_array($value, $_POST['status'])) ? '1' : '0';
                $row['sort'] = NULL;
                $row['deleted_at'] = NULL;
                break;
            case 'menu':
                $row['name'] = $_POST['name'][$key];
                $row['url'] = $_POST['url'][$key];
                $row['status'] = (isset($_POST['status']) && in_array($value, $_POST['status'])) ? '1' : '0';
                $row['sort'] = NULL;
                $row['deleted_at'] = NULL;
                break;
            case 'title':
                $row['title'] = $_POST['title'][$key];
                $row['status'] = (isset($_POST['status']) && $_POST['status'] == $value) ? '1' : '0';
                $row['deleted_at'] = NULL;
                break;
        }

        $Table->save($row);
    }
}

to("../admin.php?do=$table");

?>