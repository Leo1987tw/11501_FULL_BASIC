<?php

include_once "./db.php";

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'], "../upload/" . $_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}

$_POST['is_displayed'] = 1;
$_POST['rank'] = $Poster->q("SELECT MAX(`id`) AS 'maxid' FROM `posters`;")[0]['maxid'] + 1;
$_POST['animation_type'] = rand(1, 3);

$Poster->save($_POST);

to("../admin.php?do=poster");

?>