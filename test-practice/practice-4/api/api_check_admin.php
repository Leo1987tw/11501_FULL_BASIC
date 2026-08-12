<?php

include_once "./db.php";

if($Admin->count($_GET)){
    $_SESSION["admin"] = $_GET["username"];
    echo 1;
}else {
    echo 0;
};

?>