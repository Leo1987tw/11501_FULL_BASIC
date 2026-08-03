<?php

include_once "./db.php";

$check = $Members->count($_POST);

if($check){
    echo 1;
    $_SESSION['login'] = $_POST['account'];
}else {
    echo 0;
}

?>