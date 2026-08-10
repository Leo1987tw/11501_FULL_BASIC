<?php

include_once "./db.php";

echo $Member->count(['account' => $_GET['account']]);

?>