<?php

include_once "./db.php";

if(isset($_POST['name']) && $_POST['name'] != ""){
    $Quiz->save(['text' => $_POST['name'], 'subject' => 0, 'vote' => 0]);
    $subject = $Quiz->find(['text' => $_POST['name']])['id'];
}

if(isset($_POST['option'])){
    foreach($_POST['option'] as $option){
        if($option != ""){
            $Quiz->save(['text' => $option, 'subject' => $subject, 'vote' => 0]);
        }
    }
}

to("../admin.php?do=que");

?>