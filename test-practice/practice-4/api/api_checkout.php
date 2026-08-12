<?php

include_once "./db.php";

$_POST['member_id'] = $_SESSION['member'];
$_POST['order_number'] = date("Ymd") . rand(100000, 999999);
$_POST['order_items'] = serialize($_SESSION['cart']);
$_POST['status'] = 0;

$Order->save($_POST);

unset($_SESSION['cart']);

?>