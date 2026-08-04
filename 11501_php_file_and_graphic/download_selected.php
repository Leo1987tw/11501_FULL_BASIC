<?php
// 這支程式負責把 Session 裡勾選的資料輸出成 CSV 檔。
// 檔案第一個字元必須是 <?php，前面不可以有空白或 BOM，
// 否則那些空白會先被送出，BOM 就不會落在檔案的最前面，Excel 開起來還是會亂碼。
session_start();

$dbName = 'db_csv';   // 匯入的資料放在 db_csv，不是 db.php 連的 album 資料庫。
$tableName = 'last_name';
$sessionKey = 'selected_last_name_ids';

// 這個函式用來把陣列內容格式化為 CSV 字串。
// 行尾固定用 CRLF，這是 CSV 標準（RFC 4180），Excel 讀起來也最保險。
function buildCsvLine(array $values): string
{
    $line = '';
    foreach (array_values($values) as $index => $value) {
        $escapedValue = str_replace('"', '""', (string) $value);
        if ($index > 0) {
            $line .= ',';
        }
        $line .= '"' . $escapedValue . '"';
    }
    return $line . "\r\n";
}

// 這個函式在發生錯誤時顯示純文字訊息並結束。
function failWith(string $text): void
{
    header('Content-Type: text/plain; charset=utf-8');
    echo $text;
    exit;
}

$selectedIds = [];
if (isset($_SESSION[$sessionKey]) && is_array($_SESSION[$sessionKey])) {
    foreach ($_SESSION[$sessionKey] as $value) {
        $id = filter_var($value, FILTER_VALIDATE_INT);
        if ($id !== false && $id > 0) {
            $selectedIds[] = $id;
        }
    }
    $selectedIds = array_values(array_unique($selectedIds));
}

if (empty($selectedIds)) {
    failWith('請先選擇至少一筆資料。');
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=$dbName;charset=utf8mb4", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $placeholders = implode(',', array_fill(0, count($selectedIds), '?'));
    $sql = "SELECT * FROM `$tableName` WHERE `id` IN ($placeholders) ORDER BY `id` ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($selectedIds);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    failWith('讀取資料失敗：' . $e->getMessage());
}

if (empty($rows)) {
    failWith('找不到所選的資料，請重新選擇。');
}

// 先把先前可能殘留的輸出緩衝全部丟掉，確保等一下寫出的 BOM 是檔案的第一個位元組。
while (ob_get_level() > 0) {
    ob_end_clean();
}

$fileName = 'selected_' . date('Ymd_His') . '.csv';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Pragma: no-cache');

// UTF-8 BOM：沒有它的話，Excel 會用系統預設編碼開檔，中文就會變成亂碼。
echo "\xEF\xBB\xBF";

$columns = array_keys($rows[0]);
echo buildCsvLine($columns);
foreach ($rows as $row) {
    $values = [];
    foreach ($columns as $column) {
        $values[] = $row[$column] ?? '';
    }
    echo buildCsvLine($values);
}
exit;
