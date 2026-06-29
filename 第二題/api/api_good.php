<?php

include_once "db.php";

$_POST['id'];

$_SESSION['login'];

$check = $Logs->count(['user' => $_SESSION['user'], 'news' => $_POST['id']]);
$post = $News->find($_POST['id']);

if($check){
    $Logs->del(['user' => $_SESSION['login'], 'news' => $_POST['id']]);
    $post['good'] -= 1;
    
}else {
    $Logs->save(['user' => $_SESSION['login'], 'news' => $_POST['id']]);
    $post['good'] += 1;
}

$News->save($post);

?>