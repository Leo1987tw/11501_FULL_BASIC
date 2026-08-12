<?php

include_once "db.php";

// $_POST['id'];

// $_SESSION['login'];

$check = $Log->count(['user_id' => $_SESSION['login'], 'post_id' => $_POST['id']]);
$post = $Post->find($_POST['id']);

if($check){
    $Log->del(['user_id' => $_SESSION['login'], 'post_id' => $_POST['id']]);
    $post['likes'] -= 1;
    
}else {
    $Log->save(['user_id' => $_SESSION['login'], 'post_id' => $_POST['id']]);
    $post['likes'] += 1;
}

$Post->save($post);

?>