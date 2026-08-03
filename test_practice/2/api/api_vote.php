<?php

include_once "./db.php";

$option = $Ques->find($_POST['vote']);
$option['vote'] += 1;

$subject = $Ques->find($option['subject']);
$subject['vote'] += 1;

$Ques->save($option);
$Ques->save($subject);

to("../index.php?do=result&id={$subject['id']}");

?>