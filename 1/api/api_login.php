<?php

include_once "./db.php";

$admin = $Admin->count(["account" => $_POST['account'], "password" => $_POST['password']]);

if($admin == 1){
    $_SESSION['login'] = 1;
    $_SESSION['account'] = $_POST['account'];
    to("../admin.php");
}else {
    echo "<script>";
    echo "alert('帳號或密碼錯誤');";
    echo "</script>";
    to("./index?do=admin");
}

?>