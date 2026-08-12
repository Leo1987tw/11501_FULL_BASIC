<?php

include_once "../api/db.php";

$movies = ['1', '2'];
$date = [date("Y-m-d"), date("Y-m-d", strtotime("+1 day")), date("Y-m-d", strtotime("+2 day"))];
$session = ['14:00~16:00','16:00~18:00', '18:00~20:00', '20:00~22:00', '22:00~24:00'];

for($i = 1; $i<=10; $i++){
    $data = [];
    $data['order_number'] = date("Ymd") . sprintf("%04d", $i);
    $data['movie_id'] = $movies[rand(0, 1)];
    $data['on_date'] = $date[rand(0, 1)];
    $data['session'] = $session[rand(0, 1)];
    $remainingSeats = $Order->q("SELECT COUNT(*) FROM `orders` WHERE `movie_id`= '{$data['movie_id']}' and `on_date`='{$data['ondate']}' and `session`='{$data['session']}'");
    if($remainingSeats == 0){
        continue;
    }
    $data['quantity'] = rand(1, min(1, $remainingSeats));
    $tmp = [];
    for($j = 1; $j <= $data['qt']; $j++){
        $tmp[] = rand(0, 19);
    }
    $data['seats'] = serialize($tmp);

    $Order->save($data);
}

?>