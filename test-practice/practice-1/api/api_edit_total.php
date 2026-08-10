<?php

include_once "./db.php";

$Counter->save($_POST);

to("../admin.php?do=total");

?>