<?php

include_once "./db.php";

foreach($_POST['id'] as $key => $value){
    if(isset($_POST['delete']) && in_array($value, $_POST['delete'])){
        $Menu->del($value);
    }else {
        $row = $Menu->find($value);
        $row['text'] = $_POST['text'][$key];
        $row['href'] = $_POST['href'][$key];
        $Menu->save($row);
    }
}

if(isset($_POST['textadd'])){
    foreach($_POST['textadd'] as $key => $value){
        if(!empty($value)){
            $Menu->save([
                'text' => $value, 
                'href' => $_POST['hrefadd'][$key], 
                'sh' => 1, 
                'parent' => $_POST['parent']
                ]);
        }
    }
}

to("../admin.php?do=menu");

?>