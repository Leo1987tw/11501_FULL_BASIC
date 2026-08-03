<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <a href="./index.html" class="back-btn">← 返回前頁</a>
        <h3>簡易登入系統</h3>

        <ul>
            <li>建立一個資料表來存放使用者的帳號及密碼</li>
            <li>在網頁上輸入帳號密碼後，向資料庫比對帳密是否正確</li>
            <li>如果正確則導向另一個頁面並顯示登入成功</li>
            <li>如果錯誤則回到登入頁，並顯示”帳號或密碼錯誤”，請重新輸入”的提示</li>
        </ul>
        
        <h3>登入表單設計</h3>

        <ul>
            <li>清新簡約風</li>
            <li>整體底色是淺綠色</li>
            <li>文字以黃色或橘色作搭配</li>
            <li>表單輸入欄位都要有圓角</li>
        </ul>

        <!-- 新增：符合 members 資料表欄位的 HTML 表單 -->
        <form class="register-form" action="api_login.php" method="POST">
            <div class="form-group">
                <label for="account">帳號 (Account)</label>
                <input type="text" id="account" name="account" class="form-control" placeholder="請輸入帳號" required>
            </div>

            <div class="form-group">
                <label for="password">密碼 (Password)</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="請輸入密碼" required>
            </div>

            <button type="submit" class="btn-submit">登入</button>
        </form>

    </div>
</body>
</html>