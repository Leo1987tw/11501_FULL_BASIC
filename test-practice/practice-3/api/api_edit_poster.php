<?php

include_once "./db.php";

foreach($_POST['id'] as $key => $value){
    if(isset($_POST['del']) && in_array($value, $_POST['del'])){
        $Poster->del($value);
    }else {
        $row = $Poster->find($value);
        $row['title'] = $_POST['title'][$key];
        $row['sort'] = $_POST['sort'][$key];
        $row['status'] = isset($_POST['status'][$key]) && in_array($value, $_POST['status']) ? "1" : "0";
        $row['effect'] = $_POST['effect'][$key];
        $Poster->save($row);
    }
}

to("../admin.php?do=poster");

?>