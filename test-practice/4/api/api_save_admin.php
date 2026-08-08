<?php

include_once "./db.php";

$_POST["private"] = serialize($_POST["private"]);

$Admin->save($_POST);

to("../admin.php?do=main");

?>