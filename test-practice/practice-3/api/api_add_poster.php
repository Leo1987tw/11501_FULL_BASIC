<?php

include_once "./db.php";

if(!empty($_FILES['poster']['tmp_name'])){
    move_uploaded_file($_FILES['poster']['tmp_name'], "../upload/" . $_FILES['poster']['name']);
    $_POST['poster'] = $_FILES['poster']['name'];
}

$_POST['status'] = 1;
$_POST['sort'] = $Poster->q("SELECT MAX(`id`) AS 'maxid' FROM `posters`;")[0]['maxid'] + 1;
$_POST['effect'] = ($Poster->q("SELECT MAX(`id`) AS 'maxid' FROM `posters`;")[0]['maxid'] + 1) % 3;

$Poster->save($_POST);

to("../admin.php?do=poster");

?>