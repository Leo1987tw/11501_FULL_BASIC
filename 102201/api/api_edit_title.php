<?php

include_once "./db.php";

// if(!empty($_FILES['img']['tmp_name'])){
//     move_uploaded_file($_FILES['img']['tmp_name'], "../upload" . $_FILES['img']['name']);
//     $_POST['text'];
//     $_POST['img'] = $_FILES['img']['name'];
//     $_POST['showimg'] = 0;
//     $Title->save($_POST);
// }

foreach($_POST['id'] as $key => $value){
    if(isset($_POST['delete']) && in_array($value, $_POST['delete'])){
        $Title->del($value);
    }else {
        $row = $Title->find($value);
        $row['text'] = $_POST['text'][$key];
        $row['showimg'] = (isset($_POST['showimg']) && $_POST['showimg'] == $value) ? '1' : '0'; 
        $Title->save($row);
    }
}

to("../admin.php?do=title");

?>