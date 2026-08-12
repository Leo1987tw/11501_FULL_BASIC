<?php

include_once "./db.php";

$_POST["role"] = serialize($_POST["role"]);

$Admin->save($_POST);

to("../admin.php?do=main");

?>