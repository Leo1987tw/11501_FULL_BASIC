<?php
// 這支程式負責維護「跨分頁勾選」的 Session 紀錄。
// 檔案第一個字元必須是 <?php，前面不可以有空白或 BOM，否則 Session Cookie 會寫不進去。
session_start();

$sessionKey = 'selected_last_name_ids';

// 這個函式把各種格式（陣列、逗號字串）的 ID 統一整理成正整數陣列。
function normalizeIds($input): array
{
    $rawValues = [];
    if (is_array($input)) {
        $rawValues = $input;
    } elseif (is_string($input) && $input !== '') {
        $rawValues = preg_split('/[\s,]+/u', trim($input)) ?: [];
    } elseif (is_int($input)) {
        $rawValues = [$input];
    }

    $ids = [];
    foreach ($rawValues as $value) {
        if (is_array($value)) {
            continue;
        }
        $id = filter_var($value, FILTER_VALIDATE_INT);
        if ($id !== false && $id > 0) {
            $ids[] = $id;
        }
    }

    return array_values(array_unique($ids));
}

if (!isset($_SESSION[$sessionKey]) || !is_array($_SESSION[$sessionKey])) {
    $_SESSION[$sessionKey] = [];
}
$selectedIds = normalizeIds($_SESSION[$sessionKey]);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['success' => false, 'count' => count($selectedIds), 'message' => '只接受 POST 請求。']);
    exit;
}

// 同時支援兩種送法：JavaScript 的 JSON，以及一般表單的 POST。
$rawBody = file_get_contents('php://input');
$input = json_decode($rawBody, true);
$isJsonRequest = is_array($input);
if (!$isJsonRequest) {
    $input = $_POST;
}

$action = isset($input['action']) ? (string) $input['action'] : 'add';

// 先判斷 clear，因為清除動作不會帶任何 ID，放在後面會永遠執行不到。
if ($action === 'clear') {
    $selectedIds = [];
} else {
    // 允許一次送一筆（id）或一整頁（ids），全選本頁時只要一個請求就好。
    $ids = normalizeIds($input['ids'] ?? ($input['id'] ?? []));
    if (!empty($ids)) {
        if ($action === 'remove') {
            $selectedIds = array_values(array_diff($selectedIds, $ids));
        } else {
            $selectedIds = array_values(array_unique(array_merge($selectedIds, $ids)));
        }
    }
}

$_SESSION[$sessionKey] = $selectedIds;

// 表單送出的請求要導回原頁面，不然使用者會看到一片 JSON。
if (!$isJsonRequest) {
    $redirect = isset($_POST['redirect']) ? (string) $_POST['redirect'] : 'text-import.php';
    if (!preg_match('/^[A-Za-z0-9_.\-]+\.php(\?[^\s]*)?$/', $redirect)) { // 只允許回到本站的 php 頁面。
        $redirect = 'text-import.php';
    }
    header('Location: ' . $redirect);
    exit;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    'success' => true,
    'count' => count($selectedIds),
]);
exit;
