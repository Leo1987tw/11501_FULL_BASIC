<?php

include_once "./db.php";

$movie = $Movie->find($_GET['movie']);
$ondate = strtotime($movie["on_date"]);
$today = strtotime(date("Y-m-d"));

for($i = 0; $i < 3; $i++){
    $date = date("Y-m-d", strtotime("+$i days", $ondate));
    if(strtotime("+$i days", $ondate) >= $today){
        echo "<option value='$date'>$date</option>";
    }
}

?>