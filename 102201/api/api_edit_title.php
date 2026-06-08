<?php

include_once "./db.php";

foreach($_POST['id'] as $key => $value){
    if(isset($_POST['delete']) && in_array($value, $_POST['delete'])){
        $Title->del($value);
    }else {
        $row = $Title->find($value);
        $row['text'] = $_POST['text'][$key];
        $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $value) ? '1' : '0'; 
        $Title->save($row);
    }
}

to("../admin.php?do=title");

?>