<fieldset style="width: 50%; margin: auto;">
    <legend>會員註冊</legend>
    <form action="">
        <div style="color: red;">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
        <table>
            <tr>
                <td>登入帳號</td>
                <td>
                    <input type="text" id="account" name="account">
                </td>
            </tr>
            <tr>
                <td>登入密碼</td>
                <td>
                    <input type="password" id="password" name="password">
                </td>
            </tr>
            <tr>
                <td>再次登入密碼</td>
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
                    <button type="button" onclick=register()>註冊</button>
                    <button type="button" onclick="$('#account, #password, #password2, #email').val('')">清除</button>
                </td>
            </tr>
        </table>
    </form>
</fieldset>

<script>
    function register(){
        let user = {
            'account': $("#account").val(), 
            'password': $("#password").val(), 
            'password2': $("#password").val(),
            'email': $("#email").val()
        }

        if(user.account == '' || user.password == '' || user.password2 == '' || user.email == ''){
            alert("不可空白");
        }else if(user.password != user.password2){
            alert("密碼錯誤");
        }else {
            $.get("./api/api_check_account.php", user, (response) => {
                console.log(response);
                if(parseInt(response) > 0){
                    alert("帳號重複");
                }else {
                    $.post("./api/api_register.php", user, () => {
                        alert("註冊成功，歡迎加入");
                    })
                }
            })
        }
    }
</script>