<?php

include_once "./db.php";

if($Member->count($_GET)){
    $_SESSION["member"] = $_GET["username"];
    echo 1;
}else {
    echo 0;
};

?>