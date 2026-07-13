<?php

include_once "./db.php";

$movie = $Movie->find($_GET['movie']);
$today = strtotime(date("Y-m-d"));

for($i = 0; $i < 3; $i++){
    $date = date("Y-m-d", strtotime("+$i days", $movie["ondate"]));
    if(strtotime("+$i days", $movie["ondate"]) > $today){
        echo "<option value='$date'>$date</option>";
    }
}

?>