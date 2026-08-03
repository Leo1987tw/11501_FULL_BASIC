<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <a href="./index.html" class="back-btn">← 返回前頁</a>
        <h3>簡易註冊系統</h3>

        <ul>
            <li>建立一個資料表來存放使用者的帳號、密碼及個人資料</li>
            <li>建立一個網頁表單可以讓使用者輸入自己的帳號、密碼及個人資料</li>
            <li>送出表單後可以將使用者的資料存入資料表</li>
        </ul>

        <h3>資料表設計-members</h3>

        <ul>
            <li>id</li>
            <li>account</li>
            <li>password</li>
            <li>tel</li>
            <li>birthday</li>
            <li>email</li>
        </ul>

        <h3>註冊表單設計</h3>

        <ul>
            <li>清新簡約風</li>
            <li>整體底色是淺綠色</li>
            <li>文字以黃色或橘色作搭配</li>
            <li>表單輸入欄位都要有圓角</li>
        </ul>

        <!-- 新增：符合 members 資料表欄位的 HTML 表單 -->
        <form class="register-form" action="api_register.php" method="POST">
            <div class="form-group">
                <label for="account">帳號 (Account)</label>
                <input type="text" id="account" name="account" class="form-control" placeholder="請輸入帳號" required>
            </div>

            <div class="form-group">
                <label for="password">密碼 (Password)</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="請輸入密碼" required>
            </div>

            <div class="form-group">
                <label for="tel">電話 (Telephone)</label>
                <input type="tel" id="tel" name="tel" class="form-control" placeholder="例如：0912345678">
            </div>

            <div class="form-group">
                <label for="birthday">生日 (Birthday)</label>
                <input type="date" id="birthday" name="birthday" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">電子郵件 (Email)</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="例如：example@mail.com">
            </div>

            <button type="submit" class="btn-submit">註冊會員</button>
        </form>

    </div>
</body>
</html>