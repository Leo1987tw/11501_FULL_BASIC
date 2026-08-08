<?php

include_once "./db.php";

$row = $Movie->find($_POST['index']);
$row['sh'] = ($row['sh'] + 1) % 2;
$Movie->save($row);

?>