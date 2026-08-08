<?php

include_once "./db.php";

if(isset($_POST['name']) && $_POST['name'] != ""){
    $Ques->save(['text' => $_POST['name'], 'subject' => 0, 'vote' => 0]);
    $subject = $Ques->find(['text' => $_POST['name']])['id'];
}

if(isset($_POST['option'])){
    foreach($_POST['option'] as $option){
        if($option != ""){
            $Ques->save(['text' => $option, 'subject' => $subject, 'vote' => 0]);
        }
    }
}

to("../admin.php?do=que");

?>