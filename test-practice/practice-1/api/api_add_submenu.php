<?php

include_once "./db.php";

foreach($_POST['id'] as $key => $value){
    if(isset($_POST['delete']) && in_array($value, $_POST['delete'])){
        $Menu->del($value);
    }else {
        $row = $Menu->find($value);
        $row['name'] = $_POST['name'][$key];
        $row['url'] = $_POST['url'][$key];
        $Menu->save($row);
    }
}

if(isset($_POST['nameadd'])){
    foreach($_POST['nameadd'] as $key => $value){
        if(!empty($value)){
            $Menu->save([
                'name' => $value, 
                'url' => $_POST['urladd'][$key], 
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