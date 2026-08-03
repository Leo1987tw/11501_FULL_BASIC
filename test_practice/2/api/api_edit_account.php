<?php

include_once "./db.php";

if(isset($_POST['delete'])){
    foreach($_POST['delete'] as $id){
        $Members->del($id);
    }
}

to("../admin.php?do=account");

?>