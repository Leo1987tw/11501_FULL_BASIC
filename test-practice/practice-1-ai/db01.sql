-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-08-12 08:20:43
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
-- 資料庫： `db_01`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL COMMENT '使用者名稱',
  `password` varchar(255) NOT NULL COMMENT '密碼'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- 資料表結構 `ads`
--

CREATE TABLE `ads` (
  `id` int(11) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL COMMENT '廣告文字內容',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '狀態：0隱藏，1顯示',
  `sort` int(11) UNSIGNED DEFAULT NULL COMMENT '排序',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '刪除時間 (NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ads`
--

INSERT INTO `ads` (`id`, `content`, `status`, `sort`, `deleted_at`) VALUES
(1, '認養代替購買，給浪浪一個溫暖的家。', 1, 1, NULL),
(2, '帶寵物外出請繫牽繩，並為毛孩做好晶片登記。', 1, 2, NULL),
(3, '領養前請評估時間、空間與照護責任，承諾一生不離不棄。', 1, 3, NULL),
(4, '發現走失寵物請保持距離並協助聯繫飼主，讓團圓早點發生。', 1, 4, NULL),
(5, '定期更新寵物晶片與聯絡資料，找回毛孩更有機會。', 1, 5, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `banners`
--

CREATE TABLE `banners` (
  `id` int(11) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL COMMENT '輪播圖檔案名稱',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '狀態：0隱藏，1顯示',
  `sort` int(11) UNSIGNED DEFAULT NULL COMMENT '排序',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '刪除時間 (NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `banners`
--

INSERT INTO `banners` (`id`, `image`, `status`, `sort`, `deleted_at`) VALUES
(1, '01C01.gif', 1, NULL, NULL),
(2, '01C02.gif', 1, NULL, NULL),
(3, '01C03.gif', 1, NULL, NULL),
(4, '01C04.gif', 1, NULL, NULL),
(5, '01C05.gif', 1, NULL, NULL),
(6, '01C06.gif', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `counters`
--

CREATE TABLE `counters` (
  `id` int(11) UNSIGNED NOT NULL,
  `count_value` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '網站總瀏覽人次'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `counters`
--

INSERT INTO `counters` (`id`, `count_value`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- 資料表結構 `footer_settings`
--

CREATE TABLE `footer_settings` (
  `id` int(11) NOT NULL,
  `copyright` varchar(255) NOT NULL COMMENT '頁尾版權宣告'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `footer_settings`
--

INSERT INTO `footer_settings` (`id`, `copyright`) VALUES
(1, 'Copyright 2026 頁尾版權宣告.');

-- --------------------------------------------------------

--
-- 資料表結構 `images`
--

CREATE TABLE `images` (
  `id` int(11) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL COMMENT '圖片檔案名稱',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '狀態：0隱藏，1顯示',
  `sort` int(11) UNSIGNED DEFAULT NULL COMMENT '排序',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '刪除時間 (NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `images`
--

INSERT INTO `images` (`id`, `image`, `status`, `sort`, `deleted_at`) VALUES
(1, '01D01.jpg', 1, NULL, NULL),
(2, '01D02.jpg', 1, NULL, NULL),
(3, '01D03.jpg', 1, NULL, NULL),
(4, '01D04.jpg', 1, NULL, NULL),
(5, '01D05.jpg', 1, NULL, NULL),
(6, '01D06.jpg', 1, NULL, NULL),
(7, '01D07.jpg', 1, NULL, NULL),
(8, '01D08.jpg', 1, NULL, NULL),
(9, '01D09.jpg', 1, NULL, NULL),
(10, '01D10.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `menus`
--

CREATE TABLE `menus` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL COMMENT '選單顯示名稱',
  `url` varchar(255) NOT NULL COMMENT '選單跳轉網址/連結',
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '父層選單ID (0代表最上層主選單)',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '狀態：0隱藏，1顯示',
  `sort` int(11) UNSIGNED DEFAULT NULL COMMENT '排序',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '刪除時間 (NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `menus`
--

INSERT INTO `menus` (`id`, `name`, `url`, `parent_id`, `status`, `sort`, `deleted_at`) VALUES
(1, '寵物認養', 'index.php', 0, 1, 1, NULL),
(2, '走失尋找', 'index.php', 0, 1, 2, NULL),
(3, '狗狗認養', 'index.php?menu_id=3#pets', 1, 1, 1, NULL),
(4, '貓咪認養', 'index.php?menu_id=4#pets', 1, 1, 2, NULL),
(5, '其他寵物', 'index.php?menu_id=5#pets', 1, 1, 3, NULL),
(6, '狗狗協尋', 'index.php?menu_id=6#pets', 2, 1, 1, NULL),
(7, '貓咪協尋', 'index.php?menu_id=7#pets', 2, 1, 2, NULL),
(8, '其他協尋', 'index.php?menu_id=8#pets', 2, 1, 3, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) UNSIGNED NOT NULL COMMENT '對應 menus 的次選單 ID',
  `pet_name` varchar(50) NOT NULL COMMENT '寵物名字',
  `features` text NOT NULL COMMENT '特徵與毛色描述',
  `phone` varchar(20) NOT NULL COMMENT '聯絡電話',
  `image` varchar(255) NOT NULL COMMENT '照片檔案名稱',
  `case_status` varchar(20) NOT NULL DEFAULT '刊登中' COMMENT '狀態：刊登中/已認養/已尋獲',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '狀態：0隱藏，1顯示',
  `sort` int(11) UNSIGNED DEFAULT NULL COMMENT '排序',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '刪除時間',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posts`
--

INSERT INTO `posts` (`id`, `menu_id`, `pet_name`, `features`, `phone`, `image`, `case_status`, `status`, `sort`, `deleted_at`) VALUES
(1, 3, '豆豆', '米克斯中型犬，棕白相間短毛，右耳微垂，親人活潑，約三歲。', '0912-345-678', 'pet-doudou.jpg', '刊登中', 1, 1, NULL),
(2, 4, '奶茶', '橘白相間母貓，尾巴有淡淡虎斑紋，已結紮，個性溫和，約兩歲。', '0923-456-789', 'pet-naicha.jpg', '已認養', 1, 2, NULL),
(3, 5, '小麥', '黃色小型犬，胸前有白色毛，戴藍色項圈，怕生但不具攻擊性。', '0934-567-890', 'pet-xiaomai.jpg', '刊登中', 1, 3, NULL),
(4, 6, '阿布', '黑色米克斯公犬，胸口與前腳有白毛，左後腳跛行，最後於河堤附近走失。', '0945-678-901', 'lost-abu.jpg', '已尋獲', 1, 4, NULL),
(5, 7, '花花', '三花母貓，額頭有橘色斑點，綠色眼睛，右前腳戴粉紅色識別帶。', '0956-789-012', 'lost-huahua.jpg', '刊登中', 1, 5, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `titles`
--

CREATE TABLE `titles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL COMMENT '網站標題文字',
  `image` varchar(255) NOT NULL COMMENT '標題圖片檔案名稱',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '狀態：0隱藏，1顯示',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '刪除時間 (NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `titles`
--

INSERT INTO `titles` (`id`, `title`, `image`, `status`, `deleted_at`) VALUES
(1, '溫暖家園 - 寵物認養與走失尋找平台', '01B01.jpg', 1, NULL),
(2, '溫暖家園 - 寵物認養與走失尋找平台', '01B02.jpg', 0, NULL),
(3, '溫暖家園 - 寵物認養與走失尋找平台', '01B03.jpg', 0, NULL),
(4, '溫暖家園 - 寵物認養與走失尋找平台', '01B04.jpg', 0, NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_username` (`username`);

--
-- 資料表索引 `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `footer_settings`
--
ALTER TABLE `footer_settings`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `counters`
--
ALTER TABLE `counters`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `footer_settings`
--
ALTER TABLE `footer_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
