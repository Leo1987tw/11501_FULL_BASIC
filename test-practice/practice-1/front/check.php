<?php

include_once "../api/db.php";

$admin = $Admin->count(["account" => $_POST['acc'], "password" => $_POST['ps']]);

if($admin == 1){
    $_SESSION['login'] = 1;
    $_SESSION['username'] = $_POST['username'];
    to("./admin.php");
}else {
    echo "<script>alert('帳號或密碼錯誤'); location.href='./index.php?do=admin';</script>";
}
?>