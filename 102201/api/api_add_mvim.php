<?php

include_once "db.php";

if(!empty($_FILES['ani']['tmp_name'])){
    move_uploaded_file($_FILES['ani']['tmp_name'], "../upload/" . $_FILES['ani']['name']);
    $_POST['ani'] = $_FILES['ani']['name'];
    $_POST['showani'] = 1;
    $Mvim->save($_POST);
}

to("../admin.php?do=mvim");

?>