<?php

include_once "./db.php";

switch($_GET["do"]){
    case "member":
        unset($_SESSION["member"]);
        break;
    case "admin":
        unset($_SESSION["admin"]);
        break;
}

to("../index.php");

?>