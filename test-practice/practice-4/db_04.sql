-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-08-11 04:26:30
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db_04`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `account` varchar(64) NOT NULL COMMENT '管理員登入帳號',
  `password` varchar(255) NOT NULL COMMENT '加密後的密碼雜湊值',
  `permissions` varchar(100) NOT NULL COMMENT '管理模組權限清單(如 1,2,3,4)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admins`
--

INSERT INTO `admins` (`id`, `account`, `password`, `permissions`) VALUES
(1, 'admin', '1234', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}'),
(2, 'Leo1987tw', '1234', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}');

-- --------------------------------------------------------

--
-- 資料表結構 `footers`
--

CREATE TABLE `footers` (
  `id` int(1) UNSIGNED NOT NULL,
  `copyright` varchar(255) NOT NULL COMMENT '網頁底部版權宣告文字'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `footers`
--

INSERT INTO `footers` (`id`, `copyright`) VALUES
(1, 'Copyright 2026 頁尾版權宣告.');

-- --------------------------------------------------------

--
-- 資料表結構 `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_no` varchar(32) NOT NULL COMMENT '商品編號(如040101)',
  `title` varchar(100) NOT NULL COMMENT '商品名稱/標題',
  `price` int(10) UNSIGNED NOT NULL COMMENT '商品單價',
  `specification` varchar(255) NOT NULL COMMENT '商品規格/顏色/尺寸描述',
  `stock` int(10) UNSIGNED NOT NULL COMMENT '現貨庫存數量',
  `file_name` varchar(255) NOT NULL COMMENT '商品圖片檔案名稱',
  `introduction` text NOT NULL COMMENT '商品詳細介紹說明',
  `big_type_id` int(10) UNSIGNED NOT NULL COMMENT '所屬大分類ID',
  `middle_type_id` int(10) UNSIGNED NOT NULL COMMENT '所屬中分類ID',
  `is_displayed` tinyint(1) NOT NULL DEFAULT 1 COMMENT '上架狀態：0下架/隱藏，1上架/顯示'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `items`
--

INSERT INTO `items` (`id`, `item_no`, `title`, `price`, `specification`, `stock`, `file_name`, `introduction`, `big_type_id`, `middle_type_id`, `is_displayed`) VALUES
(1, '602587', '手工訂製長夾', 1200, '全牛皮', 2, '0403.jpg', '手工製作長夾卡片層6*2 鈔票層 *2 零錢拉鍊層 *1 \r\n採用愛馬仕相同的雙針縫法,皮件堅固耐用不脫線 \r\n材質:直革鞣(馬鞍皮)牛皮製作  \r\n手工染色                                 ', 1, 5, 1),
(2, '020705', '兩用式磁扣腰包', 685, '中型', 18, '0404.jpg', '材質:進口牛皮\r\n顏色:黑色荔枝紋+黑色珠光面皮(黑色縫線)\r\n尺寸:15cm*14cm(高)*6cm(前後)\r\n產地:臺灣', 1, 5, 1),
(3, '020706', '超薄設計男士長款真皮', 800, 'L號', 61, '0405.jpg', '基本:編織皮革對摺長款零錢包\r\n特色:最潮流最時尚的單品 \r\n顏色:黑色珠光面皮(黑色縫線)\r\n形狀:黑白格編織皮革對摺', 1, 5, 1),
(4, '030103', '經典牛皮少女帆船鞋', 1000, 'S號', 6, '0406.jpg', '以傳統學院派風格聞名，創始近百年工藝製鞋精神\r\n共用獨家專利氣墊技術，兼具紐約工藝精神，與舒適跑格靈魂', 2, 7, 1),
(5, '030203', '經典優雅時尚流行涼鞋', 2650, 'LL', 8, '0407.jpg', '優雅流線方型楦頭設計，結合簡潔線條綴飾，\r\n獨特的弧度與曲線美，突顯年輕優雅品味，\r\n是年輕上班族不可或缺的鞋款！\r\n全新美國運回，現貨附鞋盒', 2, 8, 1),
(6, '040202', '寵愛天然藍寶女戒', 28000, '1克拉', 1, '0408.jpg', '商品詳細介紹:\r\n◎典雅設計品味款\r\n◎藍寶為珍貴天然寶石之一，具有保值收藏\r\n◎專人設計製造，以貴重珠寶精緻鑲工製造', 3, 10, 1),
(7, '050107', '反折式大容量手提肩背包', 888, 'L號', 15, '0409.jpg', '商品詳細介紹:\r\n特色:反折式的包口設計,釘釦的裝飾,讓簡單的包型更增添趣味性\r\n材質:棉布\r\n顏色:藍色\r\n尺寸:長50cm寬20cm高41cm\r\n產地:日本', 4, 11, 1),
(8, '060108', '男單肩包男', 650, '多功能', 7, '0410.jpg', '商品詳細介紹:\r\n特色:男單肩包/電腦包/公文包/雙肩背包多用途\r\n材質:帆不\r\n顏色:黑色\r\n尺寸:深11cm寬42cm高33cm\r\n產地:香港', 4, 11, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '會員真實姓名',
  `account` varchar(64) NOT NULL COMMENT '會員登入帳號',
  `password` varchar(255) NOT NULL COMMENT '加密後的密碼雜湊值',
  `telephone` varchar(32) NOT NULL COMMENT '會員聯絡電話',
  `address` varchar(255) NOT NULL COMMENT '會員通訊/送貨地址',
  `email` varchar(100) NOT NULL COMMENT '會員電子郵件',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '帳號註冊時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`id`, `name`, `account`, `password`, `telephone`, `address`, `email`, `created_at`) VALUES
(1, '游禮中', 'Leo1987tw', '1234', '0987654321', '新北市板橋區', 'Leo1987tw@gmail.com', '2026-07-24 05:54:54');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_number` varchar(32) NOT NULL COMMENT '唯一訂單編號',
  `total_price` int(11) UNSIGNED NOT NULL COMMENT '訂單結帳總金額',
  `quantity` int(11) UNSIGNED NOT NULL COMMENT '購買商品總數量',
  `member_id` int(11) UNSIGNED NOT NULL COMMENT '關聯 members 表的 ID',
  `item_id` int(11) UNSIGNED NOT NULL COMMENT '關聯 items 表的 ID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '下單結帳時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL COMMENT '商品分類名稱',
  `parent_id` int(10) UNSIGNED NOT NULL COMMENT '父層分類ID (0代表最上層大分類)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `types`
--

INSERT INTO `types` (`id`, `name`, `parent_id`) VALUES
(1, '流行皮件', 0),
(2, '流行鞋區', 0),
(3, '流行飾品', 0),
(4, '背包', 0),
(5, '男用皮件', 1),
(6, '女用皮件', 1),
(7, '少女鞋區', 2),
(8, '紳士流行鞋區', 2),
(9, '時尚手錶', 3),
(10, '時尚珠寶', 3),
(11, '背包', 4);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_account` (`account`);

--
-- 資料表索引 `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_big_type_displayed` (`big_type_id`,`is_displayed`),
  ADD KEY `idx_middle_type_displayed` (`middle_type_id`,`is_displayed`);

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_account` (`account`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_order_number` (`order_number`),
  ADD KEY `idx_member_id` (`member_id`),
  ADD KEY `idx_item_id` (`item_id`);

--
-- 資料表索引 `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_parent_id` (`parent_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
