<?php

include_once "../api/db.php";

$movies = ['A', 'B'];
$days = ['2026-07-01', '2026-07-02'];
$session = ['14:00~16:00', '16:00~18:00'];

for($i = 1; $i<=10; $i++){
    $data = [];
    $data['number'] = date("Ymd") . sprintf("%04d", $i);
    $data['movie'] = $movies[rand(0, 1)];
    $data['date'] = $days[rand(0, 1)];
    $data['session'] = $session[rand(0, 1)];
    $data['qt'] = rand(1, 4);
    $tmp = [];
    for($j = 1; $j <= $data['qt']; $j++){
        $tmp[] = rand(0, 19);
    }
    $data['seats'] = serialize($tmp);

    $Order->save($data);
}

?>