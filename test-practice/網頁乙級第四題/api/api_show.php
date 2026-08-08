<?php

include_once "./db.php";

$item = $Items->find($_POST["id"]);

switch($_POST["type"]){
    case 0:
        $item["sh"] = 0;
        break;
    case 1:
        $item["sh"] = 1;
        break;
}

$Items->save($item);

?>