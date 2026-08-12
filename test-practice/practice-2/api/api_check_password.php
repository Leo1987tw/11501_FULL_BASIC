<?php

include_once "./db.php";

$check = $User->count($_POST);

if($check){
    echo 1;
    $_SESSION['login'] = $_POST['username'];
}else {
    echo 0;
}

?>