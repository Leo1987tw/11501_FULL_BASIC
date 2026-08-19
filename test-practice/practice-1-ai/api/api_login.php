<?php

include_once "./db.php";

$admin = $Admin->count(["username" => $_POST['username'], "password" => $_POST['password']]);

if($admin == 1){
    session_regenerate_id(true);
    $_SESSION['login'] = 1;
    $_SESSION['username'] = $_POST['username'];
    to("../admin.php");
}else {
    echo "<script>";
    echo "alert('帳號或密碼錯誤');";
    echo "location.href='../login.php'";
    echo "</script>";
}

?>