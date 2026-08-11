<?php

include_once "./db.php";

$table = $_GET['table'];
$Table = ${ucfirst($table)};

foreach($_POST['id'] as $key => $value){
    if(isset($_POST['delete']) && in_array($value, $_POST['delete'])){
        $Table->del($value);
    }else {
        $row = $Table->find($value);
        switch($table){
            case 'title':
                $row['title'] = $_POST['title'][$key];
                $row['status'] = (isset($_POST['status']) && $_POST['status'] == $value) ? '1' : '0';
                break;
            case 'ad':
            case 'post':
                $row['content'] = $_POST['content'][$key];
                $row['status'] = (isset($_POST['status']) && in_array($value, $_POST['status'])) ? '1' : '0';
                break;
            case 'banner':
            case 'image':
                $row['status'] = (isset($_POST['status']) && in_array($value, $_POST['status'])) ? '1' : '0';
                break;
            case 'admin':
                $row['username'] = $_POST['username'][$key];
                $row['password'] = $_POST['password'][$key];
                break;
            case 'menu':
                $row['url'] = $_POST['url'][$key];
                $row['name'] = $_POST['name'][$key];
                $row['status'] = (isset($_POST['status']) && in_array($value, $_POST['status'])) ? '1' : '0';
                break;
        }

        $Table->save($row);
    }
}

to("../admin.php?do=$table");

?>