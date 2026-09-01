<?php

include_once "./db.php";

$product = $Product->find($_POST["id"]);

switch($_POST["status"]){
    case 0:
        $product["status"] = 0;
        break;
    case 1:
        $product["status"] = 1;
        break;
}

$Product->save($product);

?>