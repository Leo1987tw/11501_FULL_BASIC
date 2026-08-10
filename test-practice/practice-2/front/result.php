<?php

$quiz = $Quiz->find($_GET['id']);

?>

<fieldset>
    <legend>
        目前位置：首頁 > 問卷調查 > <?= $quiz['text'];?>
    </legend>

    <h3><?= $quiz['text'];?></h3>

    <?php
    $rows = $Quiz->all(['subject' => $_GET['id']]);
    $division = $quiz['vote'] > 0 ? $quiz['vote'] : 1;
    foreach($rows as $key => $value):
        $rate = $value['vote'] / $division;
        $percent = round($rate * 100);
    
    ?>
    <div style="display: flex; align-items: center;">
        <p style="width: 40%;">
            <?= $value['text'];?>
        </p>
        <div style="display: flex; width: 60%;">
            <div style="width: <?= $rate * 100;?>%;height: 30px; background-color: gray;"></div>
            <div style="width: 10%;">
                <?= $value['vote'];?>票(<?= $percent?>%)
            </div>
        </div>
        
    </div>
    <?php endforeach;?>
    <div class="ct">
        <button onclick="location.href='?do=que'">返回</button>
    </div>
</fieldset>