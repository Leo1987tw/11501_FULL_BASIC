<?php

include_once "./db.php";

foreach($_POST['id'] as $key => $value){
    if(isset($_POST['del']) && in_array($value, $_POST['del'])){
        $Poster->del($value);
    }else {
        $row = $Poster->find($value);
        $row['name'] = $_POST['name'][$key];
        $row['rank'] = $_POST['rank'][$key];
        $row['is_displayed'] = isset($_POST['is_displayed'][$key]) && in_array($value, $_POST['is_displayed']) ? "1" : "0";
        $row['animation_type'] = $_POST['animation_type'][$key];
        $Poster->save($row);
    }
}

to("../admin.php?do=poster");

?>