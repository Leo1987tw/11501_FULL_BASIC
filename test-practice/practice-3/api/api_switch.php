<?php

include_once "./db.php";

$table = ${$_POST['table']};

$row1 = $table->find($_POST['index'][0]);
$row2 = $table->find($_POST['index'][1]);

$tmp = $row1['sort'];
$row1['sort'] = $row2['sort'];
$row2['sort'] = $tmp;

$table->save($row1);
$table->save($row2);

?>