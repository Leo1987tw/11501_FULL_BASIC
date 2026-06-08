<?php

include_once "./db.php";

if(!empty($_FILES['src']['tmp_name'])){
    move_uploaded_file($_FILES['src']['tmp_name'], "../upload/{$_FILES['src']['name']}");
    $row = $Mvim->find($_POST['id']);
    $row['src'] = $_FILES['src']['name'];
    $Mvim->save($row);
}

to("../admin.php?do=mvim");

?>