<!-- table.all>tr*3>td.tt.ct+td.pp>input:text -->
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><input type="text" name="" id="account"></td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="text" name="" id="password"></td>
    </tr>
    <tr>
        <td class="tt ct">驗證碼</td>
        <td class="pp">
            <span>
                <?php

                $a = rand(10, 99);
                $b = rand(10, 99);
                $_SESSION["answer"] = $a + $b;
                echo "$a + $b =";

                ?>
            </span>
            <input type="text" name="code" id="code" value="">
        </td>
    </tr>
</table>

<div class="ct">
    <button onclick="send()">確認</button>
</div>

<script>
    function send() {
        let code = $("#code").val();
        let user = {
            "account": $("#account").val(),
            "password": $("#password").val()
        }
        $.get("./api/api_check_answer.php", {
            code
        }, (response) => {
            if (parseInt(response)) {
                $.get("./api/api_check_admin.php", user, (response) => {
                    if (parseInt(response)) {
                        location.href = "./admin.php";
                    } else {
                        alert("帳號或密碼錯誤\n請重新登入");
                        location.reload()
                    }
                });
            } else {
                alert("對不起，您輸入的驗證碼有誤\n請重新登入");
                location.reload();
            };
        });
    }
</script>