<?php

include_once "./db.php";

foreach($_POST['id'] as $key => $value){
    if(isset($_POST['delete']) && in_array($value, $_POST['delete'])){
        $Mvim->del($value);
    }else {
        $row = $Mvim->find($value);
        $row['sh'] = (isset($_POST['sh']) && in_array($value, $_POST['sh'])) ? '1' : '0'; 
        $Mvim->save($row);
    }
}

to("../admin.php?do=mvim");

?>