-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-08-17 18:49:50
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
-- 資料庫： `db03`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movies`
--

CREATE TABLE `movies` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL COMMENT '電影片名',
  `length` int(11) UNSIGNED NOT NULL COMMENT '電影片長 (單位: 分鐘)',
  `grade` int(11) UNSIGNED NOT NULL COMMENT '電影分級 (1:普遍級 / 2:保護級 / 3:輔導級 / 4:限制級)',
  `director` varchar(100) NOT NULL COMMENT '導演姓名',
  `publish` varchar(100) NOT NULL COMMENT '發行商/出品公司名稱',
  `on_date` date NOT NULL COMMENT '電影上映日期 (YYYY-MM-DD)',
  `trailer` varchar(100) NOT NULL COMMENT '預告片影音檔案名稱 (副檔名: .mp4/.avi)',
  `poster` varchar(100) NOT NULL COMMENT '電影海報圖片檔案名稱 (副檔名: .jpg/.png)',
  `introduction` text NOT NULL COMMENT '電影劇情簡介文字',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '狀態：0隱藏，1顯示',
  `sort` int(11) UNSIGNED DEFAULT NULL COMMENT '排序',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '刪除時間 (NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movies`
--

INSERT INTO `movies` (`id`, `title`, `length`, `grade`, `director`, `publish`, `on_date`, `trailer`, `poster`, `introduction`, `status`, `sort`, `deleted_at`) VALUES
(1, '帥哥中歷險記一', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B01v.mp4', '03B01.png', '名導演帥哥中第一部作品', 1, 1, NULL),
(2, '帥哥中歷險記二', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B02v.mp4', '03B02.png', '名導演帥哥中第二部作品', 1, 2, NULL),
(3, '帥哥中歷險記三', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B03v.mp4', '03B03.png', '名導演帥哥中第三部作品', 1, 3, NULL),
(4, '帥哥中歷險記四', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B04v.mp4', '03B04.png', '名導演帥哥中第四部作品', 1, 4, NULL),
(5, '帥哥中歷險記五', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B05v.mp4', '03B05.png', '名導演帥哥中第五部作品', 1, 5, NULL),
(6, '帥哥中歷險記六', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B06v.mp4', '03B06.png', '名導演帥哥中第六部作品', 1, 6, NULL),
(7, '帥哥中歷險記七', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B07v.mp4', '03B07.png', '名導演帥哥中第七部作品', 1, 7, NULL),
(8, '帥哥中歷險記八', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B08v.mp4', '03B08.png', '名導演帥哥中第八部作品', 1, 8, NULL),
(9, '帥哥中歷險記九', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B09v.mp4', '03B09.png', '名導演帥哥中第九部作品', 1, 9, NULL),
(10, '帥哥中歷險記十', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B11v.mp4', '03B11.png', '名導演帥哥中第十部電影', 1, 10, NULL),
(11, '帥哥中歷險記十一', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B11v.mp4', '03B11.png', '名導演帥哥中第十一部電影', 1, 11, NULL),
(12, '帥哥中歷險記十二', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B12v.mp4', '03B12.png', '名導演帥哥中第十二部電影', 1, 12, NULL),
(13, '帥哥中歷險記十三', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B13v.mp4', '03B13.png', '名導演帥哥中第十三部電影', 1, 13, NULL),
(14, '帥哥中歷險記十四', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B14v.mp4', '03B14.png', '名導演帥哥中第十四部電影', 1, 14, NULL),
(15, '帥哥中歷險記十五', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B15v.mp4', '03B15.png', '名導演帥哥中第十五部電影', 1, 15, NULL),
(16, '帥哥中歷險記十六', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B16v.mp4', '03B16.png', '名導演帥哥中第十六部電影', 1, 16, NULL),
(17, '帥哥中歷險記十七', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B17v.mp4', '03B17.png', '名導演帥哥中第十七部電影', 1, 17, NULL),
(18, '帥哥中歷險記十八', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B18v.mp4', '03B18.png', '名導演帥哥中第十八部電影', 1, 18, NULL),
(19, '帥哥中歷險記十九', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B19v.mp4', '03B19.png', '名導演帥哥中第十九部電影', 1, 19, NULL),
(20, '帥哥中歷險記二十', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B20v.mp4', '03B20.png', '名導演帥哥中第二十部電影', 1, 20, NULL),
(21, '帥哥中歷險記二十一', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B21v.mp4', '03B21.png', '名導演帥哥中第二十一部電影', 1, 21, NULL),
(22, '帥哥中歷險記二十二', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B22v.mp4', '03B22.png', '名導演帥哥中第二十二部電影', 1, 22, NULL),
(23, '帥哥中歷險記二十三', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B23v.mp4', '03B23.png', '名導演帥哥中第二十三部電影', 1, 23, NULL),
(24, '帥哥中歷險記二十四', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B24v.mp4', '03B24.png', '名導演帥哥中第二十四部電影', 1, 24, NULL),
(25, '帥哥中歷險記二十五', 120, 1, '帥哥中', '帥哥中', '2026-08-12', '03B25v.mp4', '03B25.png', '名導演帥哥中第二十五部電影', 1, 25, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_number` varchar(32) NOT NULL COMMENT '唯一訂單編號 (格式: YYYYMMDDXXXX)',
  `movie_id` int(11) UNSIGNED NOT NULL COMMENT '電影 ID',
  `on_date` date NOT NULL COMMENT '電影上映日期 (YYYY-MM-DD)',
  `session` varchar(50) NOT NULL COMMENT '電影場次時間',
  `quantity` int(11) UNSIGNED NOT NULL COMMENT '訂票張數 (限1~4張)',
  `seats` varchar(255) NOT NULL COMMENT '已選座位號碼清單',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '訂單狀態 (0:未付款 / 1:已取消 / 2:付款成功 / 3:退票退款)',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '訂票時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `posters`
--

CREATE TABLE `posters` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL COMMENT '預告片海報名稱',
  `poster` varchar(255) NOT NULL COMMENT '海報圖片檔案名稱',
  `effect` int(11) UNSIGNED NOT NULL DEFAULT 1 COMMENT '換場動畫特效 (1: 淡入淡出 / 2: 縮放特效 / 3: 滑入滑出)'';',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '狀態：0隱藏，1顯示',
  `sort` int(11) UNSIGNED DEFAULT NULL COMMENT '排序',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '刪除時間 (NULL為未刪除)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posters`
--

INSERT INTO `posters` (`id`, `title`, `poster`, `effect`, `status`, `sort`, `deleted_at`) VALUES
(1, '03A01', '03A01.jpg', 1, 1, 1, NULL),
(2, '03A02', '03A02.jpg', 2, 1, 2, NULL),
(3, '03A03', '03A03.jpg', 3, 1, 3, NULL),
(4, '03A04', '03A04.jpg', 1, 1, 4, NULL),
(5, '03A05', '03A05.jpg', 2, 1, 5, NULL),
(6, '03A06', '03A06.jpg', 3, 1, 6, NULL),
(7, '03A07', '03A07.jpg', 1, 1, 7, NULL),
(8, '03A08', '03A08.jpg', 2, 1, 8, NULL),
(9, '03A09', '03A09.jpg', 3, 1, 9, NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_order_number` (`order_number`) USING BTREE;

--
-- 資料表索引 `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posters`
--
ALTER TABLE `posters`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
