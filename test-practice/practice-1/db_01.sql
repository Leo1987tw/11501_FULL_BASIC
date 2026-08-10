-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-08-11 04:26:01
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
-- 資料表結構 `ad`
--

CREATE TABLE `ad` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL COMMENT '主要標題內容',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '狀態：0隱藏，1顯示',
  `delete_at` datetime DEFAULT NULL COMMENT '刪除時間（NULL代表未刪除）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ad`
--

INSERT INTO `ad` (`id`, `title`, `status`, `delete_at`) VALUES
(1, '轉知臺北教育大學與臺灣師大合辦第11屆麋研齋全國硬筆書法比賽活動', 1, '0000-00-00 00:00:00'),
(2, '轉知:法務部辦理「第五屆法規知識王網路闖關競賽辦法', 1, '0000-00-00 00:00:00'),
(3, '轉知2012年全國青年水墨創作大賽活動', 1, '0000-00-00 00:00:00'),
(4, '欣榮圖書館101年悅讀達人徵文比賽，歡迎全校師生踴躍投稿參加', 1, '0000-00-00 00:00:00'),
(5, '轉知:教育是人類升沉的樞紐-2013教師生命成長營', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `account` varchar(64) NOT NULL COMMENT '使用者帳號',
  `password` varchar(255) NOT NULL COMMENT '加密後的密碼'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`id`, `account`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- 資料表結構 `copyright`
--

CREATE TABLE `copyright` (
  `id` int(11) NOT NULL,
  `copyright` varchar(255) NOT NULL COMMENT '網頁底部版權宣告文字'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `copyright`
--

INSERT INTO `copyright` (`id`, `copyright`) VALUES
(1, 'Copyright 2026 頁尾版權宣告.');

-- --------------------------------------------------------

--
-- 資料表結構 `image`
--

CREATE TABLE `image` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL COMMENT '圖片檔案名稱',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '狀態：0隱藏，1顯示',
  `delete_at` datetime DEFAULT NULL COMMENT '刪除時間(NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `image`
--

INSERT INTO `image` (`id`, `file_name`, `status`, `delete_at`) VALUES
(1, '01D01.jpg', 1, NULL),
(2, '01D02.jpg', 1, NULL),
(3, '01D03.jpg', 1, NULL),
(4, '01D04.jpg', 1, NULL),
(5, '01D05.jpg', 1, NULL),
(6, '01D06.jpg', 1, NULL),
(7, '01D07.jpg', 1, NULL),
(8, '01D08.jpg', 1, NULL),
(9, '01D09.jpg', 1, NULL),
(10, '01D10.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL COMMENT '選單跳轉網址/連結',
  `title` varchar(100) NOT NULL COMMENT '選單顯示名稱',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '狀態：0隱藏，1顯示',
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '父層選單ID (0代表最上層主選單)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `menu`
--

INSERT INTO `menu` (`id`, `url`, `title`, `status`, `parent_id`) VALUES
(1, 'index.php?do=admin', '登入管理', 1, 0),
(2, 'index.php', '網站首頁', 1, 0),
(3, 'index.php', '更多內容', 1, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `mvim`
--

CREATE TABLE `mvim` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL COMMENT '輪播圖檔案名稱',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '狀態：0隱藏，1顯示',
  `delete_at` datetime DEFAULT NULL COMMENT '刪除時間(NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `mvim`
--

INSERT INTO `mvim` (`id`, `file_name`, `status`, `delete_at`) VALUES
(1, '01C01.gif', 1, NULL),
(2, '01C02.gif', 1, NULL),
(3, '01C03.gif', 1, NULL),
(4, '01C04.gif', 1, NULL),
(5, '01C05.gif', 1, NULL),
(6, '01C06.gif', 1, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `id` int(11) UNSIGNED NOT NULL,
  `content` text NOT NULL COMMENT '最新消息內文',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '狀態：0隱藏，1顯示',
  `delete_at` datetime DEFAULT NULL COMMENT '刪除時間(NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(1) UNSIGNED NOT NULL,
  `view_count` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '網站總瀏覽人次'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `system_settings`
--

INSERT INTO `system_settings` (`id`, `view_count`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- 資料表結構 `title`
--

CREATE TABLE `title` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL COMMENT '標題圖片檔案名稱',
  `title` varchar(255) NOT NULL COMMENT '廣告文字內容',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '狀態：0隱藏，1顯示',
  `delete_at` datetime DEFAULT NULL COMMENT '刪除時間(NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `title`
--

INSERT INTO `title` (`id`, `file_name`, `title`, `status`, `delete_at`) VALUES
(1, '01B01.jpg', '卓越科技大學校園資訊系統', 1, NULL),
(2, '01B02.jpg', '卓越科技大學校園資訊系統', 0, NULL),
(3, '01B03.jpg', '卓越科技大學校園資訊系統', 0, NULL),
(4, '01B04.jpg', '卓越科技大學校園資訊系統', 0, NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_account` (`account`);

--
-- 資料表索引 `copyright`
--
ALTER TABLE `copyright`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_parent_id` (`parent_id`);

--
-- 資料表索引 `mvim`
--
ALTER TABLE `mvim`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `copyright`
--
ALTER TABLE `copyright`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `mvim`
--
ALTER TABLE `mvim`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `title`
--
ALTER TABLE `title`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
