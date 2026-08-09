<?php

include_once "./db.php";

$row = $Movie->find($_POST['index']);
$row['is_displayed'] = ($row['is_displayed'] + 1) % 2;
$Movie->save($row);

?>