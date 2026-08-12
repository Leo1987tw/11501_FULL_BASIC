<?php

include_once "./db.php";

$option = $Survey->find($_POST['vote']);
$option['vote'] += 1;

$subject = $Survey->find($option['parent_id']);
$subject['vote'] += 1;

$Survey->save($option);
$Survey->save($subject);

to("../index.php?do=result&id={$subject['id']}");

?>