<?php

include_once "./db.php";

if($_SESSION["answer"] == $_GET["code"]){
    echo 1;
}else {
    echo 0;
}

?>