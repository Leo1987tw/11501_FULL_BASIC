<?php

include_once "./db.php";

$_POST['account'] = $_SESSION['member'];
$_POST['number'] = date("Ymd") . rand(100000, 999999);
$_POST['items'] = serialize($_SESSION['cart']);

$Orders->save($_POST);

unset($_SESSION['cart']);

?>