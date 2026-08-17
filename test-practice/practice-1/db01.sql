-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-08-17 18:49:03
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
-- 資料庫： `db01`
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
(1, '登入管理', 'index.php?do=admin', 0, 1, NULL, NULL),
(2, '網站首頁', 'index.php', 0, 1, NULL, NULL),
(3, '更多內容', 'index.php', 2, 1, NULL, NULL);

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
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '刪除時間 (NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `status`, `sort`, `deleted_at`) VALUES
(1, '', '教師研習「世界公民生命園丁國內研習會」\r\n1.主辦單位：世界展望會\r\n2.研習日期：101年11月14日（三）～15日（四）\r\n3.詳情請參考：\r\nhttp://gc.worldvision.org.tw/seed.html。\r\n請線上報名。', 1, NULL, NULL),
(2, '', '公告綜合高中一年級英數補救教學時間\r\n上課日期:10/27.11/3.11/10.11/24共計四次\r\n上課時間:早上8:00~11:50半天\r\n費用:全程免費\r\n參加同學:綜合科一年級第一次段考成績需加強者\r\n已將名單送交各班及導師\r\n參加同學請帶紙筆.課本.第一次段考考卷\r\n並將家長通知單給家長\r\n若有任何疑問\r\n請洽綜合高中學程主任', 1, NULL, NULL),
(3, '', '102年全國大專校院運動會\r\n「主題標語及吉祥物命名」\r\n網路票選活動\r\n一、活動期間：自10月25日起至11月4日止。\r\n二、相關訊息請上宜蘭大學首頁連結「102全大運在宜大」\r\n活動網址：http://102niag.niu.edu.tw/', 1, NULL, NULL),
(4, '', '台灣亞洲藝術文化教育交流學會第一屆年會國際研討會\r\n活動日期：101年3月3～4日(六、日)\r\n活動主題：創造力、文化、全人教育\r\n有意參加者請至http://www.caaetaiwan.org下載報名表', 1, NULL, NULL),
(5, '', '11月23日(星期五)將於彰化縣田尾鄉菁芳園休閒農場\r\n舉辦「高中職生涯輔導知能研習」\r\n中區學校每校至多2名\r\n以普通科、專業類科教師優先報名參加\r\n生涯規劃教師次之，參加人員公差假\r\n並核實派代課\r\n當天還有專車接送(8:35前在員林火車站集合)\r\n如此好康的機會，怎能錯過？！\r\n熱烈邀請師長們向輔導室(分機234)報名\r\n名額有限，動作要快！！\r\n報名截止日期：本周四 10月25日17:00前！', 1, NULL, NULL),
(6, '', '台視百萬大明星節目辦理海選活動\r\n時間:101年10月27日下午13時\r\n地點:彰化', 1, NULL, NULL),
(7, '', '國立故宮博物院辦理\r\n「商王武丁與后婦好 殷商盛世文化藝術特展」暨\r\n「赫赫宗周 西周文化特展」', 1, NULL, NULL),
(8, '', '財團法人漢光教育基金會\r\n辦理2012「舊愛新歡-古典詩詞譜曲創作暨歌唱表演競賽」\r\n參賽獎金豐厚!!', 1, NULL, NULL);

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
(1, '卓越科技大學校園資訊系統', '01B01.jpg', 1, NULL),
(2, '卓越科技大學校園資訊系統', '01B02.jpg', 0, NULL),
(3, '卓越科技大學校園資訊系統', '01B03.jpg', 0, NULL),
(4, '卓越科技大學校園資訊系統', '01B04.jpg', 0, NULL);

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
-- 資料表索引 `posts`
--
ALTER TABLE `posts`
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
