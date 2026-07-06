<?php

$movie = $Movie->find($_GET['id']);

?>

<form action="./api/api_edit_movie.php" method="post" enctype="multipart/form-data">
    <table style="width: 100%;">
        <tr>
            <td style="width: 20%;">影片資料</td>
            <td style="width: 80%;">
                <table>
                    <tr>
                        <td>片名:</td>
                        <td>
                            <input type="text" name="name" id="name" value="<?= $movie['name'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>分級:</td>
                        <td>
                            <select name="grade" id="grade">
                                <option value="1" <?= $movie['grade'] == 1 ? 'selected' : ''; ?>>普遍級</option>
                                <option value="2" <?= $movie['grade'] == 2 ? 'selected' : ''; ?>>輔導級</option>
                                <option value="3" <?= $movie['grade'] == 3 ? 'selected' : ''; ?>>保護級</option>
                                <option value="4" <?= $movie['grade'] == 4 ? 'selected' : ''; ?>>限制級</option>
                            </select>
                            (請選擇分級)
                        </td>
                    </tr>
                    <tr>
                        <td>片長:</td>
                        <td>
                            <input type="text" name="length" id="length" value="<?= $movie['length'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>上映日期:</td>
                        <td>
                            <?php
                            $year = (int)explode("-", $movie['ondate'])[0];
                            $month = (int)explode("-", $movie['ondate'])[1];
                            $date = (int)explode("-", $movie['ondate'])[2];
                            ?>
                            <select name="year" id="year">
                                <option value="2026" <?= $year == 2026 ? 'selected' : ''; ?>>2026</option>
                                <option value="2027" <?= $year == 2027 ? 'selected' : ''; ?>>2027</option>
                                <option value="2028" <?= $year == 2028 ? 'selected' : ''; ?>>2028</option>
                            </select>
                            年
                            <select name="month" id="month">
                                <?php
                                for ($i = 1; $i <= 12; $i++) {
                                    $select = ($date == $i) ? 'selected' : '';
                                    echo "<option value='$i' $select>$i</option>";
                                };
                                ?>
                            </select>
                            月
                            <select name="date" id="date">
                                <?php
                                for ($i = 1; $i <= 31; $i++) {
                                    $select = ($month == $i) ? 'selected' : '';
                                    echo "<option value='$i' $select>$i</option>";
                                };
                                ?>
                            </select>
                            日
                        </td>
                    </tr>
                    <tr>
                        <td>發行商:</td>
                        <td>
                            <input type="text" name="publish" id="publish" value="<?= $movie['publish'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>導演:</td>
                        <td>
                            <input type="text" name="director" id="director" value="<?= $movie['director'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>預告影片</td>
                        <td>
                            <input type="file" name="trailer" id="trailer">
                        </td>
                    </tr>
                    <tr>
                        <td>電影海報</td>
                        <td>
                            <input type="file" name="poster" id="poster">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>劇情簡介</td>
            <td>
                <textarea name="intro" id="intro"></textarea>
            </td>
        </tr>
    </table>
    <hr>
    <div class="ct">
        <input type="hidden" name="id" value="<?= $movie['id']?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>