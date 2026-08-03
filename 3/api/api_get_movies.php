<?php

include_once "./db.php";

$today = date("Y-m-d");
$ondate = date("Y-m-d", strtotime("-2 days"));
$movies = $Movie->all(['sh' => 1], " AND `ondate` between '$ondate' AND '$today' ORDER BY `rank`");

foreach($movies as $movie){
    echo "<option value='{$movie['id']}'>{$movie['name']}</option>";
}

?>