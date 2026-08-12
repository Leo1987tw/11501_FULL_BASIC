<h2 class="ct">新增院線片</h2>
<form action="./api/api_add_movie.php" method="post" enctype="multipart/form-data">
    <table style="width: 80%; margin: auto;">
        <tr>
            <td style="width: 20%; vertical-align: top;">影片資料</td>
            <td style="width: 80%;">
                <!-- table>tr*8>td+td:input:text -->
                <table>
                    <tr>
                        <td>片名:</td>
                        <td><input type="text" name="title" id="title"></td>
                    </tr>
                    <tr>
                        <td>分級:</td>
                        <td>
                            <select name="grade" id="grade">
                                <option value="1">普遍級</option>
                                <option value="2">輔導級</option>
                                <option value="3">保護級</option>
                                <option value="4">限制級</option>
                            </select>
                            (請選擇分級)
                        </td>
                    </tr>
                    <tr>
                        <td>片長:</td>
                        <td><input type="text" name="length" id="length"></td>
                    </tr>
                    <tr>
                        <td>上映日期:</td>
                        <td>
                            <select name="year" id="year">
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                            </select>
                            年
                            <select name="month" id="month">
                                <?php
                                
                                for($i = 1; $i <= 12; $i++){
                                    echo "<option value='$i'>$i</option>";
                                };
                                
                                ?>
                            </select>
                            月
                            <select name="date" id="date">
                                <?php
                                
                                for($i = 1; $i <= 31; $i++){
                                    echo "<option value='$i'>$i</option>";
                                };
                                
                                ?>
                            </select>
                            日
                        </td>
                    </tr>
                    <tr>
                        <td>發行商:</td>
                        <td><input type="text" name="publish" id="publish"></td>
                    </tr>
                    <tr>
                        <td>導演:</td>
                        <td><input type="text" name="director" id="director"></td>
                    </tr>
                    <tr>
                        <td>預告影片:</td>
                        <td><input type="file" name="trailer" id="trailer"></td>
                    </tr>
                    <tr>
                        <td>電影海報:</td>
                        <td><input type="file" name="poster" id="poster"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width: 20%; vertical-align: top;">劇情簡介</td>
            <td style="width: 80%;">
                <textarea name="introduction" style="width: 70%; overflow: scroll;"></textarea>
            </td>
        </tr>
    </table>
    <hr>
    <div class="ct">
        <input type="reset" value="重置">
        <input type="submit" value="送出">
    </div>
</form>