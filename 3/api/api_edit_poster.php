<?php

include_once "./db.php";

foreach($_POST['id'] as $key => $value){
    if(isset($_POST['del']) && in_array($value, $_POST['del'])){
        $Poster->del($value);
    }else {
        $row = $Poster->find($value);
        $row['name'] = $_POST['name'][$key];
        $row['rank'] = $_POST['rank'][$key];
        $row['sh'] = isset($_POST['sh'][$key]) && in_array($value, $_POST['sh']) ? "1" : "0";
        $row['ani'] = $_POST['ani'][$key];
        $Poster->save($row);
    }
}

to("../admin.php?do=poster");

?>