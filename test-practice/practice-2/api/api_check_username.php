<?php

include_once "./db.php";

echo $User->count(['username' => $_GET['username']]);

?>