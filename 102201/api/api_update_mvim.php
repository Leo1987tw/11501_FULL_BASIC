<?php

include_once "./db.php";

if(!empty($_FILES['ani']['tmp_name'])){
    move_uploaded_file($_FILES['ani']['tmp_name'], "../upload/{$_FILES['ani']['name']}");
    $row = $Mvim->find($_POST['id']);
    $row['ani'] = $_FILES['ani']['name'];
    $Mvim->save($row);
}

to("../admin.php?do=mvim");

?>