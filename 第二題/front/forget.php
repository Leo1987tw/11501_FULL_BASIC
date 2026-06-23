<fieldset style="width: 50%; margin: auto;">
    <form action="">
        <table style="width: 80%;">
            <tr>
                <td>請輸入信箱以查詢密碼</td>
            </tr>
            <tr>
                <td>
                    <input type="text" id="email" name="email" style="width: 100%;">
                </td>
            </tr>
            <tr>
                <td id="result"></td>
            </tr>
            <tr>
                <td>
                    <button type="button" onclick="search()">尋找</button>
                </td>
            </tr>
        </table>
    </form>
</fieldset>

<script>
    function search(){
        let email = $("#email").val();
        $.get("./api/api_forget.php", {email}, (result) => {
            $("#result").text(result);
        })
    }
</script>