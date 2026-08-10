-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-08-11 04:26:20
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
-- 資料庫： `db_03`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movies`
--

CREATE TABLE `movies` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL COMMENT '電影片名',
  `grade` int(11) UNSIGNED NOT NULL,
  `length` int(11) UNSIGNED NOT NULL,
  `on_date` date NOT NULL,
  `publish` varchar(100) NOT NULL COMMENT '發行商/出品公司',
  `director` varchar(100) NOT NULL COMMENT '導演姓名',
  `trailer_file` varchar(100) NOT NULL COMMENT '預告片檔案名稱',
  `poster_file` varchar(100) NOT NULL COMMENT '電影海報檔案名稱',
  `introduction` text NOT NULL,
  `is_displayed` tinyint(1) NOT NULL DEFAULT 1 COMMENT '狀態：0下架，1上架',
  `sort` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '手動排序權重（數字愈大愈前面）',
  `deleted_at` datetime DEFAULT NULL COMMENT '軟刪除時間(NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movies`
--

INSERT INTO `movies` (`id`, `title`, `grade`, `length`, `on_date`, `publish`, `director`, `trailer_file`, `poster_file`, `introduction`, `is_displayed`, `sort`, `deleted_at`) VALUES
(1, '帥哥中歷險記一', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B01v.mp4', '03B01.png', '名導演帥哥中第一部作品', 1, 1, NULL),
(2, '帥哥中歷險記二', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B02v.mp4', '03B02.png', '名導演帥哥中第二部作品', 1, 2, NULL),
(3, '帥哥中歷險記三', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B03v.mp4', '03B03.png', '名導演帥哥中第三部作品', 1, 3, NULL),
(4, '帥哥中歷險記四', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B04v.mp4', '03B04.png', '名導演帥哥中第四部作品', 1, 4, NULL),
(5, '帥哥中歷險記五', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B05v.mp4', '03B05.png', '名導演帥哥中第五部作品', 1, 5, NULL),
(6, '帥哥中歷險記六', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B06v.mp4', '03B06.png', '名導演帥哥中第六部作品', 1, 6, NULL),
(7, '帥哥中歷險記七', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B07v.mp4', '03B07.png', '名導演帥哥中第七部作品', 1, 7, NULL),
(8, '帥哥中歷險記八', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B08v.mp4', '03B08.png', '名導演帥哥中第八部作品', 1, 8, NULL),
(9, '帥哥中歷險記九', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B09v.mp4', '03B09.png', '名導演帥哥中第九部作品', 1, 9, NULL),
(10, '帥哥中歷險記十', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B11v.mp4', '03B11.png', '名導演帥哥中第十部電影', 1, 10, NULL),
(11, '帥哥中歷險記十一', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B11v.mp4', '03B11.png', '名導演帥哥中第十一部電影', 1, 11, NULL),
(12, '帥哥中歷險記十二', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B12v.mp4', '03B12.png', '名導演帥哥中第十二部電影', 1, 12, NULL),
(13, '帥哥中歷險記十三', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B13v.mp4', '03B13.png', '名導演帥哥中第十三部電影', 1, 13, NULL),
(14, '帥哥中歷險記十四', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B14v.mp4', '03B14.png', '名導演帥哥中第十四部電影', 1, 14, NULL),
(15, '帥哥中歷險記十五', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B15v.mp4', '03B15.png', '名導演帥哥中第十五部電影', 1, 15, NULL),
(16, '帥哥中歷險記十六', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B16v.mp4', '03B16.png', '名導演帥哥中第十六部電影', 1, 16, NULL),
(17, '帥哥中歷險記十七', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B17v.mp4', '03B17.png', '名導演帥哥中第十七部電影', 1, 17, NULL),
(18, '帥哥中歷險記十八', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B18v.mp4', '03B18.png', '名導演帥哥中第十八部電影', 1, 18, NULL),
(19, '帥哥中歷險記十九', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B19v.mp4', '03B19.png', '名導演帥哥中第十九部電影', 1, 19, NULL),
(20, '帥哥中歷險記二十', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B20v.mp4', '03B20.png', '名導演帥哥中第二十部電影', 1, 20, NULL),
(21, '帥哥中歷險記二十一', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B21v.mp4', '03B21.png', '名導演帥哥中第二十一部電影', 1, 21, NULL),
(22, '帥哥中歷險記二十二', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B22v.mp4', '03B22.png', '名導演帥哥中第二十二部電影', 1, 22, NULL),
(23, '帥哥中歷險記二十三', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B23v.mp4', '03B23.png', '名導演帥哥中第二十三部電影', 1, 23, NULL),
(24, '帥哥中歷險記二十四', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B24v.mp4', '03B24.png', '名導演帥哥中第二十四部電影', 1, 24, NULL),
(25, '帥哥中歷險記二十五', 1, 120, '2026-08-09', '帥哥中', '帥哥中', '03B25v.mp4', '03B25.png', '名導演帥哥中第二十五部電影', 1, 25, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_number` varchar(32) NOT NULL COMMENT '唯一訂單編號',
  `movie_id` int(11) UNSIGNED NOT NULL,
  `on_date` date NOT NULL COMMENT '觀影日期',
  `session` varchar(50) NOT NULL COMMENT '電影場次時間',
  `quantity` int(11) UNSIGNED NOT NULL COMMENT '訂購張數',
  `seats` varchar(255) NOT NULL COMMENT '已選座位清單(逗號隔開)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `movie_id`, `on_date`, `session`, `quantity`, `seats`) VALUES
(1, '202607060001', 1, '2026-07-02', '14:00~16:00', 2, 'a:10:{i:0;i:1;i:1;i:11;i:2;i:18;i:3;i:17;i:4;i:9;i:5;i:16;i:6;i:18;i:7;i:7;i:8;i:9;i:9;i:7;}'),
(2, '202607060002', 2, '2026-07-01', '14:00~16:00', 2, 'a:10:{i:0;i:5;i:1;i:13;i:2;i:12;i:3;i:11;i:4;i:5;i:5;i:18;i:6;i:18;i:7;i:18;i:8;i:4;i:9;i:13;}'),
(3, '202607060003', 3, '2026-07-01', '14:00~16:00', 1, 'a:10:{i:0;i:19;i:1;i:16;i:2;i:18;i:3;i:18;i:4;i:13;i:5;i:6;i:6;i:15;i:7;i:6;i:8;i:14;i:9;i:16;}'),
(4, '202607060004', 4, '2026-07-01', '16:00~18:00', 4, 'a:10:{i:0;i:1;i:1;i:1;i:2;i:11;i:3;i:5;i:4;i:9;i:5;i:3;i:6;i:0;i:7;i:14;i:8;i:7;i:9;i:4;}'),
(5, '202607060005', 5, '2026-07-02', '16:00~18:00', 3, 'a:10:{i:0;i:14;i:1;i:16;i:2;i:7;i:3;i:7;i:4;i:14;i:5;i:0;i:6;i:13;i:7;i:2;i:8;i:14;i:9;i:11;}'),
(6, '202607060006', 6, '2026-07-01', '16:00~18:00', 1, 'a:10:{i:0;i:17;i:1;i:3;i:2;i:10;i:3;i:6;i:4;i:8;i:5;i:2;i:6;i:4;i:7;i:3;i:8;i:16;i:9;i:3;}'),
(7, '202607060007', 7, '2026-07-02', '16:00~18:00', 3, 'a:10:{i:0;i:7;i:1;i:0;i:2;i:3;i:3;i:15;i:4;i:3;i:5;i:1;i:6;i:18;i:7;i:18;i:8;i:12;i:9;i:17;}'),
(8, '202607060008', 8, '2026-07-01', '14:00~16:00', 4, 'a:10:{i:0;i:5;i:1;i:1;i:2;i:5;i:3;i:14;i:4;i:6;i:5;i:19;i:6;i:16;i:7;i:13;i:8;i:16;i:9;i:4;}'),
(9, '202607060009', 9, '2026-07-02', '16:00~18:00', 1, 'a:10:{i:0;i:19;i:1;i:2;i:2;i:14;i:3;i:19;i:4;i:4;i:5;i:15;i:6;i:5;i:7;i:15;i:8;i:6;i:9;i:6;}'),
(10, '202607060010', 10, '2026-07-01', '14:00~16:00', 1, 'a:10:{i:0;i:4;i:1;i:11;i:2;i:15;i:3;i:2;i:4;i:15;i:5;i:14;i:6;i:6;i:7;i:12;i:8;i:9;i:9;i:1;}');

-- --------------------------------------------------------

--
-- 資料表結構 `posters`
--

CREATE TABLE `posters` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '海報流水號ID',
  `title` varchar(100) NOT NULL COMMENT '預告片海報名稱',
  `is_displayed` tinyint(1) NOT NULL DEFAULT 1 COMMENT '狀態：0隱藏，1顯示',
  `sort` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '手動輪播排序權重',
  `animation_type` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '登場動畫特效分類代號(1~3)',
  `file_name` varchar(255) NOT NULL COMMENT '海報圖片檔案名稱',
  `deleted_at` datetime DEFAULT NULL COMMENT '軟刪除時間(NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posters`
--

INSERT INTO `posters` (`id`, `title`, `is_displayed`, `sort`, `animation_type`, `file_name`, `deleted_at`) VALUES
(1, '03A01', 1, 0, 1, '03A01.jpg', NULL),
(2, '03A02', 1, 0, 2, '03A02.jpg', NULL),
(3, '03A03', 1, 0, 3, '03A03.jpg', NULL),
(4, '03A04', 1, 0, 1, '03A04.jpg', NULL),
(5, '03A05', 0, 0, 1, '03A05.jpg', NULL),
(6, '03A06', 0, 0, 1, '03A06.jpg', NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_is_displayed_sort` (`is_displayed`,`sort`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_order_number` (`order_number`),
  ADD KEY `idx_movie_session_date` (`movie_id`,`on_date`,`session`);

--
-- 資料表索引 `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_is_displayed_sort` (`is_displayed`,`sort`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posters`
--
ALTER TABLE `posters`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '海報流水號ID', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
