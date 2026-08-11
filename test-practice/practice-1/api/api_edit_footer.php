<?php

include_once "./db.php";

$Footer->save($_POST);

to("../admin.php?do=footer");

?>