<h2 class="ct">會員註冊</h2>

<!-- table.all>tr*6>td.tt.ct+td.pp>input:text -->
<table class="all">
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp">
            <input type="text" name="username" id="username">
            <input type="button" value="檢測帳號" onclick="checkUsername()">
        </td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="" id="password"></td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp"><input type="text" name="telephone" id="telephone"></td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp"><input type="text" name="address" id="address"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>

<div class="ct">
    <button onclick="register()">註冊</button>
    <button onclick="resetForm()">重置</button>
</div>

<script>
    function checkUsername(){
        let username = $("#username").val();
        $.get("./api/api_check_member.php", {username}, (response) => {
            if(parseInt(response) > 0 || username=="admin"){
                alert("帳號已存在");
            }else {
                alert("此帳號可使用");
            }
        });
    }

    function register(){
        let username = $("#username").val();
        $.get("./api/api_check_member.php", {username}, (response) => {
            if(parseInt(response) > 0 || username=="admin"){
                alert("帳號已存在");
            }else {
                let user = {
                    "name": $("#name").val(),
                    "username": $("#username").val(),
                    "password": $("#password").val(),
                    "telephone": $("#telephone").val(),
                    "address": $("#address").val(),
                    "email": $("#email").val()
                }

                $.post("./api/api_register.php", user, () => {
                    location.href = "?do=login";
                });
            }
        });
    }

    function resetForm(){
        $("#name, #username, #password, #telephone, #address, #email").val("");
    };
</script>