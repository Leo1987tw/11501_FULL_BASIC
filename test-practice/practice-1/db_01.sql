-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-08-11 07:12:36
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
  `deleted_at` datetime DEFAULT NULL COMMENT '刪除時間 (NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ads`
--

INSERT INTO `ads` (`id`, `content`, `status`, `sort`, `deleted_at`) VALUES
(1, '轉知臺北教育大學與臺灣師大合辦第11屆麋研齋全國硬筆書法比賽活動', 1, NULL, NULL),
(2, '轉知:法務部辦理「第五屆法規知識王網路闖關競賽辦法', 1, NULL, NULL),
(3, '轉知2012年全國青年水墨創作大賽活動', 1, NULL, NULL),
(4, '欣榮圖書館101年悅讀達人徵文比賽，歡迎全校師生踴躍投稿參加', 1, NULL, NULL),
(5, '轉知:教育是人類升沉的樞紐-2013教師生命成長營', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `banners`
--

CREATE TABLE `banners` (
  `id` int(11) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL COMMENT '輪播圖檔案名稱',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '狀態：0隱藏，1顯示',
  `sort` int(11) UNSIGNED DEFAULT NULL COMMENT '排序',
  `deleted_at` datetime DEFAULT NULL COMMENT '刪除時間 (NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `banners`
--

INSERT INTO `banners` (`id`, `image_path`, `status`, `sort`, `deleted_at`) VALUES
(1, '01C01.gif', 1, NULL, NULL),
(2, '01C02.gif', 1, NULL, NULL),
(3, '01C03.gif', 1, NULL, NULL),
(4, '01C04.gif', 1, NULL, NULL),
(5, '01C05.gif', 1, NULL, NULL),
(6, '01C06.gif', 1, NULL, NULL);

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
(1, 'Copyright 2026 頁尾版權宣告.');

-- --------------------------------------------------------

--
-- 資料表結構 `images`
--

CREATE TABLE `images` (
  `id` int(11) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL COMMENT '圖片檔案名稱',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '狀態：0隱藏，1顯示',
  `sort` int(11) UNSIGNED DEFAULT NULL COMMENT '排序',
  `deleted_at` datetime DEFAULT NULL COMMENT '刪除時間 (NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `images`
--

INSERT INTO `images` (`id`, `image_path`, `status`, `sort`, `deleted_at`) VALUES
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
  `url` varchar(255) NOT NULL COMMENT '選單跳轉網址/連結',
  `name` varchar(100) NOT NULL COMMENT '選單顯示名稱',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '狀態：0隱藏，1顯示',
  `sort` int(11) UNSIGNED DEFAULT NULL COMMENT '排序',
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '父層選單ID (0代表最上層主選單)',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '刪除時間 (NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `menus`
--

INSERT INTO `menus` (`id`, `url`, `name`, `status`, `sort`, `parent_id`, `deleted_at`) VALUES
(1, 'index.php?do=admin', '登入管理', 1, NULL, 0, NULL),
(2, 'index.php', '網站首頁', 1, NULL, 0, NULL),
(3, 'index.php', '更多內容', 1, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL COMMENT '最新消息標題',
  `content` text NOT NULL COMMENT '最新消息內文',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '狀態：0隱藏，1顯示',
  `sort` int(11) UNSIGNED DEFAULT NULL COMMENT '排序',
  `deleted_at` datetime DEFAULT NULL COMMENT '刪除時間 (NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `view_count` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '網站總瀏覽人次'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `system_settings`
--

INSERT INTO `system_settings` (`id`, `view_count`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- 資料表結構 `titles`
--

CREATE TABLE `titles` (
  `id` int(11) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL COMMENT '標題圖片檔案名稱',
  `alt` varchar(255) NOT NULL COMMENT '圖片替代文字',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '狀態：0隱藏，1顯示',
  `deleted_at` datetime DEFAULT NULL COMMENT '刪除時間 (NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `titles`
--

INSERT INTO `titles` (`id`, `image_path`, `alt`, `status`, `deleted_at`) VALUES
(1, '01B01.jpg', '卓越科技大學校園資訊系統', 1, NULL),
(2, '01B02.jpg', '卓越科技大學校園資訊系統', 0, NULL),
(3, '01B03.jpg', '卓越科技大學校園資訊系統', 0, NULL),
(4, '01B04.jpg', '卓越科技大學校園資訊系統', 0, NULL);

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
-- 資料表索引 `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `system_settings`
--
ALTER TABLE `system_settings`
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
