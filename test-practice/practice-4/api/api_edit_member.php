<?php

include_once "db.php";

$$Member->save($_POST);

to("../admin.php?do=mem");

?>