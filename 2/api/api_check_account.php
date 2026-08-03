<?php

include_once "./db.php";

echo $Members->count(['account' => $_GET['account']]);

?>