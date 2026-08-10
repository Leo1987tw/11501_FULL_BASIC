<?php

include_once "./db.php";

$option = $Quiz->find($_POST['vote']);
$option['vote'] += 1;

$subject = $Quiz->find($option['subject']);
$subject['vote'] += 1;

$Quiz->save($option);
$Quiz->save($subject);

to("../index.php?do=result&id={$subject['id']}");

?>