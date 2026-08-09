<?php

include_once "./db.php";

$middles = $Type->all(["parent" => $_GET["big"]]);

foreach($middles as $middle){
    echo "<option value='{$middle['id']}'>";
    echo $middle["name"];
    echo "</option>";
}

?>