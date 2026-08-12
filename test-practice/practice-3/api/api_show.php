<?php

include_once "./db.php";

$row = $Movie->find($_POST['index']);
$row['status'] = ($row['status'] + 1) % 2;
$Movie->save($row);

?>