-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-07-06 10:31:39
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
(1, '帥哥中歷險記', 1, 120, '2026-03-29', '帥哥中', '帥哥中', '03B01v.mp4', '03B01.png', '', 1, 1),
(2, '帥哥中歷險記', 1, 120, '2026-03-01', '帥哥中', '帥哥中', '03B02v.mp4', '03B02.png', '', 0, 2),
(3, '帥哥中歷險記', 1, 120, '2026-01-03', '帥哥中', '帥哥中', '03B03v.mp4', '03B03.png', '', 0, 3),
(4, '帥哥中歷險記', 1, 120, '2026-01-01', '帥哥中', '帥哥中', '03B04v.mp4', '03B04.png', '', 1, 4);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `number` text NOT NULL,
  `movie` text NOT NULL,
  `ondate` date NOT NULL,
  `session` text NOT NULL,
  `qt` int(11) NOT NULL,
  `seats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `number`, `movie`, `ondate`, `session`, `qt`, `seats`) VALUES
(1, '202607060001', 'B', '2026-07-02', '14:00~16:00', 2, 'a:10:{i:0;i:1;i:1;i:11;i:2;i:18;i:3;i:17;i:4;i:9;i:5;i:16;i:6;i:18;i:7;i:7;i:8;i:9;i:9;i:7;}'),
(2, '202607060002', 'B', '2026-07-01', '14:00~16:00', 2, 'a:10:{i:0;i:5;i:1;i:13;i:2;i:12;i:3;i:11;i:4;i:5;i:5;i:18;i:6;i:18;i:7;i:18;i:8;i:4;i:9;i:13;}'),
(3, '202607060003', 'A', '2026-07-01', '14:00~16:00', 1, 'a:10:{i:0;i:19;i:1;i:16;i:2;i:18;i:3;i:18;i:4;i:13;i:5;i:6;i:6;i:15;i:7;i:6;i:8;i:14;i:9;i:16;}'),
(4, '202607060004', 'B', '2026-07-01', '16:00~18:00', 4, 'a:10:{i:0;i:1;i:1;i:1;i:2;i:11;i:3;i:5;i:4;i:9;i:5;i:3;i:6;i:0;i:7;i:14;i:8;i:7;i:9;i:4;}'),
(5, '202607060005', 'A', '2026-07-02', '16:00~18:00', 3, 'a:10:{i:0;i:14;i:1;i:16;i:2;i:7;i:3;i:7;i:4;i:14;i:5;i:0;i:6;i:13;i:7;i:2;i:8;i:14;i:9;i:11;}'),
(6, '202607060006', 'B', '2026-07-01', '16:00~18:00', 1, 'a:10:{i:0;i:17;i:1;i:3;i:2;i:10;i:3;i:6;i:4;i:8;i:5;i:2;i:6;i:4;i:7;i:3;i:8;i:16;i:9;i:3;}'),
(7, '202607060007', 'B', '2026-07-02', '16:00~18:00', 3, 'a:10:{i:0;i:7;i:1;i:0;i:2;i:3;i:3;i:15;i:4;i:3;i:5;i:1;i:6;i:18;i:7;i:18;i:8;i:12;i:9;i:17;}'),
(8, '202607060008', 'A', '2026-07-01', '14:00~16:00', 4, 'a:10:{i:0;i:5;i:1;i:1;i:2;i:5;i:3;i:14;i:4;i:6;i:5;i:19;i:6;i:16;i:7;i:13;i:8;i:16;i:9;i:4;}'),
(9, '202607060009', 'A', '2026-07-02', '16:00~18:00', 1, 'a:10:{i:0;i:19;i:1;i:2;i:2;i:14;i:3;i:19;i:4;i:4;i:5;i:15;i:6;i:5;i:7;i:15;i:8;i:6;i:9;i:6;}'),
(10, '202607060010', 'A', '2026-07-01', '14:00~16:00', 1, 'a:10:{i:0;i:4;i:1;i:11;i:2;i:15;i:3;i:2;i:4;i:15;i:5;i:14;i:6;i:6;i:7;i:12;i:8;i:9;i:9;i:1;}');

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
(1, '03A01', 1, 1, 1, '03A01.jpg'),
(2, '03A02', 1, 2, 2, '03A02.jpg'),
(3, '03A03', 1, 3, 3, '03A03.jpg'),
(4, '03A04', 1, 4, 4, '03A04.jpg'),
(5, '03A05', 0, 5, 5, '03A05.jpg'),
(6, '03A06', 0, 6, 6, '03A06.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posters`
--
ALTER TABLE `posters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
