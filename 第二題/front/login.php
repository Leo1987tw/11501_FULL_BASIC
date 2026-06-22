<fieldset style="width: 50%; margin: auto;">
    <legend>會員登入</legend>
    <form action="">
        <table>
            <tr>
                <td>帳號</td>
                <td>
                    <input type="text" id="account" name="account">
                </td>
            </tr>
            <tr>
                <td>密碼</td>
                <td>
                    <input type="password" id="password" name="password">
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" onclick="login()">登入</button>
                    <button type="button" onclick="$('#account, #password').val('')">清除</button>
                </td>
                <td>
                    <a href="?do=forget">忘記密碼</a>
                    <a href="?do=register">尚未註冊</a>
                </td>
            </tr>
        </table>
    </form>
</fieldset>

<script>
    function login(){
        let user = {
            'account': $("#account").val(), 
            'password': $("#password").val()
        }

        $.get("./api/api_check_account.php", user, (response1) => {
            if(parseInt(response1) > 0){
                $.post("./api/api_check_password.php", user, (response2) => {
                    if(parseInt(response2) > 0){
                        if(user.account == 'admin'){
                            to("admin.php");
                        }else {
                            to("index.php");
                        }
                    }else {
                        alert("密碼錯誤");
                        $('#account, #password').val('');
                    }
                })
            }else {
                alert("查無帳號");
                $('#account, #password').val('');
            }
        })
    }
</script>