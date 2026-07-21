<?php

include_once "../api/db.php";

$movies = ['A', 'B'];
$date = [date("Y-m-d"), date("Y-m-d", strtotime("+1 day")), date("Y-m-d", strtotime("+2 day"))];
$session = ['14:00~16:00','16:00~18:00', '18:00~20:00', '20:00~22:00', '22:00~24:00'];

for($i = 1; $i<=10; $i++){
    $data = [];
    $data['number'] = date("Ymd") . sprintf("%04d", $i);
    $data['movie'] = $movies[rand(0, 1)];
    $data['date'] = $date[rand(0, 1)];
    $data['session'] = $session[rand(0, 1)];
    $remain = $Order->q("SELECT COUNT(*) FROM `orders` WHERE `movie`= '{$data['movie']}' and `date`='{$data['date']}' and `session`='{$data['session']}'");
    if($remain == 0){
        
        continue;
    }
    $data['qt'] = rand(1, $remain);
    $tmp = [];
    for($j = 1; $j <= $data['qt']; $j++){
        $tmp[] = rand(0, 19);
    }
    $data['seats'] = serialize($tmp);

    $Order->save($data);
}

?>