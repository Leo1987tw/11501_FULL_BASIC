<?php

include_once "db.php";

$Members->save($_POST);

to("../admin.php?do=mem");

?>