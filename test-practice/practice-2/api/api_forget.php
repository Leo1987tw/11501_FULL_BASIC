<?php

include_once "./db.php";

$user = $Member->find(['email' => $_GET['email']]);

if($_GET['email'] == 'admin@labor.gov.tw'){
    $user = [];
}

if(!empty($user)){
    echo "您的密碼為:" . $user['password'];
}else {
    echo "查無資料";
}

?>