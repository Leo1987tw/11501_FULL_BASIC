<fieldset style="width: 80%; margin: auto;">
    <legend>帳號管理</legend>
    <form action="./api/api_edit_user.php" method="post">
        <table class="ct" style="width: 80%; margin: auto;">
            <tr class="clo">
                <td style="width: 60%;">帳號</td>
                <td style="width: 20%;">密碼</td>
                <td style="width: 20%;">刪除</td>
            </tr>
            <?php

            $users = $User->all();
            foreach($users as $user):
            
            ?>
            <tr>
                <td><?= $user['username'];?></td>
                <td><?= str_repeat("*", strlen($user['password']))?></td>
                <td>
                    <input type="checkbox" name="delete[]" value="<?= $user['id'];?>">
                </td>
            </tr>
            <?php endforeach;?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
        <br>
        <h2>新增會員</h2>
        <div style="color: red;">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
        <table>
            <tr>
                <td class="clo">登入帳號</td>
                <td>
                    <input type="text" id="username" name="username">
                </td>
            </tr>
            <tr>
                <td class="clo">登入密碼</td>
                <td>
                    <input type="password" id="password" name="password">
                </td>
            </tr>
            <tr>
                <td class="clo">再次登入密碼</td>
                <td>
                    <input type="password" id="password2" name="password2">
                </td>
            </tr>
            <tr>
                <td>信箱(忘記密碼時使用)</td>
                <td>
                    <input type="text" id="email" name="email">
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" onclick=register()>新增</button>
                    <button type="button" onclick="$('#username, #password, #password2, #email').val('')">清除</button>
                </td>
            </tr>
        </table>
    </form>
</fieldset>

<script>
    function register(){
        let user = {
            'username': $("#username").val(), 
            'password': $("#password").val(), 
            'password2': $("#password").val(),
            'email': $("#email").val()
        }

        if(user.username == '' || user.password == '' || user.password2 == '' || user.email == ''){
            alert("不可空白");
        }else if(user.password != user.password2){
            alert("密碼錯誤");
        }else {
            $.get("./api/api_check_username.php", user, (response) => {
                console.log(response);
                if(parseInt(response) > 0){
                    alert("帳號重複");
                }else {
                    $.post("./api/api_register.php", user, () => {
                        location.reload();
                    })
                }
            })
        }
    }
</script>