<fieldset>
    <legend>
        目前位置：首頁 > 問卷調查 > <?= $Survey->find($_GET['id'])['title'];?>
    </legend>

    <h3><?= $Survey->find($_GET['id'])['title'];?></h3>

    <form action="./api/api_vote.php" method="post">
        <?php
        $rows = $Survey->all(['parent_id' => $_GET['id']]);
        foreach($rows as $key => $value):
        ?>
        <p>
            <input type="radio" name="vote" value="<?= $value['id'];?>">
            <?= $value['title'];?>
        </p>
        <?php endforeach;?>
        <div class="ct">
            <input type="submit" value="我要投票">
        </div>
    </form>
</fieldset>