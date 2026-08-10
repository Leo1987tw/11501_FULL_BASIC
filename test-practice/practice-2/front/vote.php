<fieldset>
    <legend>
        目前位置：首頁 > 問卷調查 > <?= $Quiz->find($_GET['id'])['text'];?>
    </legend>

    <h3><?= $Quiz->find($_GET['id'])['text'];?></h3>

    <form action="./api/api_vote.php" method="post">
        <?php
        $rows = $Quiz->all(['subject' => $_GET['id']]);
        foreach($rows as $key => $value):
        ?>
        <p>
            <input type="radio" name="vote" value="<?= $value['id'];?>">
            <?= $value['text'];?>
        </p>
        <?php endforeach;?>
        <div class="ct">
            <input type="submit" value="我要投票">
        </div>
    </form>
</fieldset>