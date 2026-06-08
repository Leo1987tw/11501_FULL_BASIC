<?php

include_once "db.php";

$_POST['showimg'] = 1;
$Ad->save($_POST);

to("../admin.php?do=ad");

?>