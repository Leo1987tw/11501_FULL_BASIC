<?php
// ===== 檔案說明 =====
// 這個檔案現在只是「前端示範頁」，本身不再產生驗證碼。
// 產圖與驗證都拆到獨立的後端服務，由下面的 JavaScript 用 ajax 呼叫：
//   captcha_image.php  → GET，取得 base64 圖片（帶 reload=1 就是重置）
//   captcha_verify.php → POST，回傳 1 或 0
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>圖形處理</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="header">圖形處理練習</h1>

<div style="max-width: 320px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background: #fff;">
    <p>請輸入下方圖形驗證碼：</p>

    <!--
        注意：不要寫死 width / height！
        字元會隨機旋轉、驗證碼長度也是 4~8 字不固定，
        所以後端會自動計算需要多大的畫布，每次產生的圖片尺寸可能都不一樣。
        寫死尺寸會讓圖被拉扁或壓縮變形，這裡只用 max-width 限制不要超出容器。
    -->
    <img id="captchaImage" src="" alt="圖形驗證碼" style="display:block; border:1px solid #ccc; max-width:100%;">

    <p style="margin-top: 12px;">
        <button type="button" id="captchaReload">重新產生</button>
    </p>

    <p style="margin-top: 12px;">
        <input type="text" id="captchaInput" placeholder="輸入驗證碼" autocomplete="off" style="width: 140px;">
        <button type="button" id="captchaCheck">檢查</button>
    </p>

    <p id="captchaResult" style="margin-top: 12px; min-height: 1.2em;"></p>
</div>

<script>
const captchaImage = document.getElementById('captchaImage');
const captchaInput = document.getElementById('captchaInput');
const captchaResult = document.getElementById('captchaResult');

// 取得驗證碼圖片。reload = true 代表要換一組新的。
async function loadCaptcha(reload = false) {
    const url = reload ? 'captcha_image.php?reload=1' : 'captcha_image.php';
    const response = await fetch(url, { credentials: 'same-origin' });
    const data = await response.json();

    if (data.success) {
        captchaImage.src = data.image; // data:image/png;base64,....
    }
}

// 把輸入的驗證碼送去後端檢查，後端只會回 '1' 或 '0'。
async function checkCaptcha() {
    const response = await fetch('captcha_verify.php', {
        method: 'POST',
        credentials: 'same-origin',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ captcha: captchaInput.value })
    });
    const result = (await response.text()).trim();

    if (result === '1') {
        captchaResult.textContent = '驗證碼正確';
        captchaResult.style.color = 'green';
    } else {
        captchaResult.textContent = '驗證碼不符合';
        captchaResult.style.color = 'red';
    }
}

document.getElementById('captchaReload').addEventListener('click', function () {
    captchaResult.textContent = '';
    captchaInput.value = '';
    loadCaptcha(true);
});

document.getElementById('captchaCheck').addEventListener('click', checkCaptcha);

captchaInput.addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        checkCaptcha();
    }
});

// 進頁面先抓一張圖回來
loadCaptcha();
</script>

</body>
</html>
