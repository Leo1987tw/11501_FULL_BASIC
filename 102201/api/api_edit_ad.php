<?php

include_once "./db.php";

foreach($_POST['id'] as $key => $value){
    if(isset($_POST['delete']) && in_array($value, $_POST['delete'])){
        $Ad->del($value);
    }else {
        $row = $Ad->find($value);
        $row['text'] = $_POST['text'][$key];
        $row['sh'] = (isset($_POST['sh']) && in_array($value, $_POST['sh'])) ? '1' : '0'; 
        $Ad->save($row);
    }
}

to("../admin.php?do=ad");

?>