<?php

include_once "./db.php";

$bigs = $Types->all(["parent" => 0]);

foreach($bigs as $big){
    echo "<option value='{$big['id']}'>";
    echo $big["name"];
    echo "</option>";
}

?>