<?php

include_once "./db.php";
if(($_SESSION['login'] ?? 0) !== 1){ http_response_code(403); exit('Forbidden'); }

foreach($_POST['id'] ?? [] as $key => $value){
    if(isset($_POST['delete']) && in_array($value, $_POST['delete'])){
        $Menu->del($value);
    }else {
        $row = $Menu->find($value);
        $row['name'] = $_POST['name'][$key];
        $row['url'] = $_POST['url'][$key];
        $Menu->save($row);
    }
}

if(isset($_POST['text_new'])){
    foreach($_POST['text_new'] as $key => $value){
        if(!empty($value)){
            $Menu->save([
                'name' => $value, 
                'url' => $_POST['url_new'][$key] ?? 'index.php', 
                'status' => 1, 
                'sort' => NULL, 
                'parent_id' => $_POST['parent_id'], 
                'deleted_at' => NULL
                ]);
        }
    }
}

to("../admin.php?do=menu");

?>