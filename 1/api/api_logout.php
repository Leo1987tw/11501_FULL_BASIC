<?php

include_once "./db.php";

unset($_SESSION['login']);
unset($_SESSION['account']);

// 如果需要不同帳號算不同人數就要加
// unset($_SESSION['visit']);

to("../index.php?do=admin");

?>