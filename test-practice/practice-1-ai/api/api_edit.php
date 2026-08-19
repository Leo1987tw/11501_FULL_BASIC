<?php

include_once "./db.php";
if(($_SESSION['login'] ?? 0) !== 1){ http_response_code(403); exit('Forbidden'); }

$table = $_GET['table'];
$Table = ${ucfirst($table)};

foreach($_POST['id'] ?? [] as $key => $value){
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
                $row['content'] = $_POST['content'][$key];
                $row['status'] = (isset($_POST['status']) && in_array($value, $_POST['status'])) ? '1' : '0';
                $row['sort'] = NULL;
                $row['deleted_at'] = NULL;
                break;
            case 'post':
                $row['menu_id'] = (int) $_POST['menu_id'][$key];
                $row['pet_name'] = $_POST['pet_name'][$key];
                $row['features'] = $_POST['features'][$key];
                $row['phone'] = $_POST['phone'][$key];
                $row['case_status'] = $_POST['case_status'][$key];
                $row['status'] = (isset($_POST['status']) && in_array($value, $_POST['status'])) ? '1' : '0';
                $row['sort'] = (int) ($key + 1);
                $row['deleted_at'] = NULL;
                break;
            case 'title':
                $row['title'] = $_POST['title'][$key];
                $row['status'] = (isset($_POST['status']) && $_POST['status'] == $value) ? '1' : '0';
                $row['deleted_at'] = NULL;
                break;
            case 'menu':
                $row['name'] = $_POST['name'][$key];
                $row['url'] = $_POST['url'][$key];
                $row['status'] = (isset($_POST['status']) && in_array($value, $_POST['status'])) ? '1' : '0';
                $row['deleted_at'] = NULL;
                break;
            default:
                $row['status'] = (isset($_POST['status']) && in_array($value, $_POST['status'])) ? '1' : '0';
                $row['sort'] = NULL;
                $row['deleted_at'] = NULL;
                break;
        }

        $Table->save($row);
    }
}

to("../admin.php?do=$table");

?>