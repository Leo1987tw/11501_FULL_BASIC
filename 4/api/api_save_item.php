<?php

include_once "./db.php";

if(!empty($_FILES["image"]["tmp_name"])){
    move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/{$_FILES["image"]["name"]}");
    $_POST["image"] = $_FILES["image"]["name"];
}

if(!isset($_POST["id"])){
    $_POST["number"] = rand(100000, 999999);
    $_POST["sh"] = 1;
}

$Items->save($_POST);

to("../admin.php?do=th");

?>