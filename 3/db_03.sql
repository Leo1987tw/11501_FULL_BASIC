-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-07-14 06:30:49
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
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `grade` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `ondate` date NOT NULL,
  `publish` text NOT NULL,
  `director` text NOT NULL,
  `trailer` text NOT NULL,
  `poster` text NOT NULL,
  `intro` text NOT NULL,
  `sh` tinyint(1) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movies`
--

INSERT INTO `movies` (`id`, `name`, `grade`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `sh`, `rank`) VALUES
(1, '帥哥中歷險記1', 1, 120, '2026-07-13', '帥哥中', '帥哥中', '03B01v.mp4', '03B01.png', '', 1, 1),
(2, '帥哥中歷險記2', 1, 120, '2026-07-13', '帥哥中', '帥哥中', '03B02v.mp4', '03B02.png', '', 1, 2),
(3, '帥哥中歷險記3', 1, 120, '2026-07-13', '帥哥中', '帥哥中', '03B03v.mp4', '03B03.png', '', 1, 3),
(4, '帥哥中歷險記4', 1, 120, '2026-07-13', '帥哥中', '帥哥中', '03B04v.mp4', '03B04.png', '', 1, 4),
(5, '帥哥中歷險記5', 2, 120, '2026-07-13', '帥哥中', '帥哥中', '03B05v.mp4', '03B05.png', '', 1, 5),
(6, '帥哥中歷險記6', 3, 120, '2026-07-13', '帥哥中', '帥哥中', '03B06v.mp4', '03B06.png', '', 1, 6);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `number` text NOT NULL,
  `movie` text NOT NULL,
  `date` date NOT NULL,
  `session` text NOT NULL,
  `qt` int(11) NOT NULL,
  `seats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `posters`
--

CREATE TABLE `posters` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `sh` tinyint(1) NOT NULL,
  `rank` int(11) NOT NULL,
  `ani` tinyint(1) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posters`
--

INSERT INTO `posters` (`id`, `name`, `sh`, `rank`, `ani`, `img`) VALUES
(1, '03A01', 1, 0, 1, '03A01.jpg'),
(2, '03A02', 1, 0, 2, '03A02.jpg'),
(3, '03A03', 1, 0, 3, '03A03.jpg'),
(4, '03A04', 1, 0, 1, '03A04.jpg'),
(5, '03A05', 1, 0, 2, '03A05.jpg'),
(6, '03A06', 1, 0, 3, '03A06.jpg'),
(7, '03A07', 1, 0, 1, '03A07.jpg'),
(8, '03A08', 1, 0, 2, '03A08.jpg'),
(9, '03A09', 1, 0, 3, '03A09.jpg');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posters`
--
ALTER TABLE `posters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
