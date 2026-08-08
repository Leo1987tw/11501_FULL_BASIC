<?php

include_once "./db.php";

$Bottom->save($_POST);

to("../admin.php?do=bottom");

?>