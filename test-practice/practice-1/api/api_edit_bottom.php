<?php

include_once "./db.php";

$Copyright->save($_POST);

to("../admin.php?do=bottom");

?>