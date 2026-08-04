<?php
session_start();

function generateCaptchaCode(int $length = null): string
{
    $length = $length ?? rand(4, 8);
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';

    for ($i = 0; $i < $length; $i++) {
        $code .= $chars[random_int(0, strlen($chars) - 1)];
    }

    return $code;
}

function locateFontFile(): string
{
    $fontCandidates = [
        'C:/Windows/Fonts/arial.ttf',
        'C:/Windows/Fonts/Arial.ttf',
        'C:/Windows/Fonts/msyh.ttc',
        'C:/Windows/Fonts/simsun.ttc',
    ];

    foreach ($fontCandidates as $fontFile) {
        if (file_exists($fontFile)) {
            return $fontFile;
        }
    }

    return '';
}

function renderCaptchaImage(string $code): void
{
    $width = 180;
    $height = 60;
    $image = imagecreatetruecolor($width, $height);

    $backgroundColor = imagecolorallocate($image, 245, 248, 250);
    $borderColor = imagecolorallocate($image, 220, 220, 220);
    $lineColor = imagecolorallocate($image, 180, 190, 200);
    $textColor = imagecolorallocate($image, 70, 70, 70);

    imagefill($image, 0, 0, $backgroundColor);
    imagerectangle($image, 0, 0, $width - 1, $height - 1, $borderColor);

    $fontFile = locateFontFile();
    if ($fontFile === '') {
        imagestring($image, 5, 20, 20, $code, $textColor);
    } else {
        $fontSize = 24;
        $bbox = imagettfbbox($fontSize, 0, $fontFile, $code);
        $textWidth = $bbox[2] - $bbox[0];
        $textHeight = $bbox[1] - $bbox[7];
        $x = (int) (($width - $textWidth) / 2 - $bbox[0]);
        $y = (int) (($height + $textHeight) / 2 - $bbox[1]);

        imagettftext($image, $fontSize, 0, $x, $y, $textColor, $fontFile, $code);
    }

    $lineCount = rand(4, 6);

    // 左側 10% 與右側 10% 的 x 畫素帶，確保每條線都橫跨整個字元區域
    $leftBandMax = (int) ($width * 0.1);
    $rightBandMin = (int) ($width * 0.9);
    $midY = (int) ($height * 0.5);

    imagesetthickness($image, 2);

    for ($i = 0; $i < $lineCount; $i++) {
        $x1 = rand(0, $leftBandMax);
        $x2 = rand($rightBandMin, $width - 1);

        // 一端落在上半部、另一端落在下半部，讓線一定斜跨中線
        if (rand(0, 1) === 0) {
            $y1 = rand(0, $midY - 1);
            $y2 = rand($midY + 1, $height - 1);
        } else {
            $y1 = rand($midY + 1, $height - 1);
            $y2 = rand(0, $midY - 1);
        }

        imageline($image, $x1, $y1, $x2, $y2, $lineColor);
    }

    imagesetthickness($image, 1);

    header('Content-Type: image/png');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Pragma: no-cache');

    imagepng($image);
    imagedestroy($image);
}

if (isset($_GET['captcha'])) {
    $captchaCode = $_SESSION['captcha_code'] ?? generateCaptchaCode();
    renderCaptchaImage($captchaCode);
    exit;
}

$captchaCode = generateCaptchaCode();
$_SESSION['captcha_code'] = $captchaCode;
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
    <img src="image.php?captcha=1&t=<?php echo time(); ?>" alt="圖形驗證碼" style="display:block; border:1px solid #ccc;">
    <p style="margin-top: 12px;">
        <a href="image.php">重新整理</a>
    </p>
</div>

</body>
</html>