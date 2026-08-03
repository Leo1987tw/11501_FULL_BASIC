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
                $row['text'] = $_POST['text'][$key];
                $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $value) ? '1' : '0';
                break;
            case 'ad':
            case 'news':
                $row['text'] = $_POST['text'][$key];
                $row['sh'] = (isset($_POST['sh']) && in_array($value, $_POST['sh'])) ? '1' : '0';
                break;
            case 'mvim':
            case 'image':
                $row['sh'] = (isset($_POST['sh']) && in_array($value, $_POST['sh'])) ? '1' : '0';
                break;
            case 'admin':
                $row['account'] = $_POST['account'][$key];
                $row['password'] = $_POST['password'][$key];
                break;
            case 'menu':
                $row['href'] = $_POST['href'][$key];
                $row['text'] = $_POST['text'][$key];
                $row['sh'] = (isset($_POST['sh']) && in_array($value, $_POST['sh'])) ? '1' : '0';
                break;
        }

        $Table->save($row);
    }
}

to("../admin.php?do=$table");

?>