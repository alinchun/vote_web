-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-06-16 04:08:39
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `hw_vote`
--

-- --------------------------------------------------------

--
-- 資料表結構 `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `mem_id` int(20) NOT NULL,
  `topic_id` int(20) NOT NULL,
  `vote_time` datetime NOT NULL,
  `records` text NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `logs`
--

INSERT INTO `logs` (`id`, `mem_id`, `topic_id`, `vote_time`, `records`, `created_time`) VALUES
(58, 1, 1, '2023-06-15 10:26:00', 'a:1:{i:1;s:2:\"26\";}', '2023-06-15 02:26:00'),
(59, 1, 2, '2023-06-15 13:51:28', 'a:1:{i:2;a:2:{i:0;s:1:\"3\";i:1;s:1:\"7\";}}', '2023-06-15 05:51:28'),
(60, 5, 1, '2023-06-16 08:35:47', 'a:1:{i:1;s:1:\"1\";}', '2023-06-16 00:35:47'),
(61, 6, 17, '2023-06-16 08:45:05', 'a:1:{i:17;s:2:\"54\";}', '2023-06-16 00:45:05'),
(62, 5, 17, '2023-06-16 08:45:38', 'a:1:{i:17;s:2:\"53\";}', '2023-06-16 00:45:38');

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` varchar(32) NOT NULL,
  `pw` varchar(16) NOT NULL,
  `name` varchar(32) NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pr` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`id`, `acc`, `pw`, `name`, `address`, `email`, `pr`) VALUES
(5, '0911111111', 'member', '', '', '', 'member'),
(6, '0922222222', 'admin', '', '', '', 'admin'),
(7, '0933333333', 'super', '', '', '', 'super');

-- --------------------------------------------------------

--
-- 資料表結構 `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `options`
--

INSERT INTO `options` (`id`, `description`, `subject_id`, `total`, `created_time`, `updated_time`) VALUES
(1, '韓聚時', 1, 1, '2023-06-03 15:36:08', '2023-06-03 15:36:08'),
(2, '朝鮮味', 1, 0, '2023-06-03 15:36:08', '2023-06-03 15:36:08'),
(3, '日本-九州', 2, 1, '2023-06-04 14:06:35', '2023-06-04 14:06:35'),
(4, '日本-大板', 2, 0, '2023-06-04 14:06:35', '2023-06-04 14:06:35'),
(5, '日本-北海道', 2, 0, '2023-06-04 14:06:35', '2023-06-04 14:06:35'),
(6, '韓國-釜山', 2, 0, '2023-06-04 14:06:35', '2023-06-04 14:06:35'),
(7, '韓國-濟州島', 2, 1, '2023-06-04 14:06:35', '2023-06-04 14:06:35'),
(8, '泰國-曼谷', 2, 0, '2023-06-04 14:06:35', '2023-06-04 14:06:35'),
(9, '印尼-雅加達', 2, 0, '2023-06-04 14:06:35', '2023-06-04 14:06:35'),
(10, '饗饗', 1, 0, '2023-06-07 00:42:45', '2023-06-07 00:42:45'),
(18, '饗饗', 3, 0, '2023-06-09 02:02:45', '2023-06-09 02:02:45'),
(26, '饗時', 1, 0, '2023-06-09 06:01:25', '2023-06-09 06:01:25'),
(28, '玉米', 7, 0, '2023-06-09 07:18:42', '2023-06-09 07:18:42'),
(29, '饗時', 7, 1, '2023-06-09 07:18:42', '2023-06-09 07:18:42'),
(51, '全聯禮券-NT.1000', 17, 0, '2023-06-16 00:16:43', '2023-06-16 00:16:43'),
(52, 'SOGO禮券-NT.1000', 17, 0, '2023-06-16 00:18:40', '2023-06-16 00:18:40'),
(53, '7-11商品卡-1000元', 17, 1, '2023-06-16 00:18:40', '2023-06-16 00:18:40'),
(54, '現金-NT1000', 17, 1, '2023-06-16 00:18:40', '2023-06-16 00:18:40'),
(55, '哈達瑜珈', 18, 0, '2023-06-16 00:26:34', '2023-06-16 00:26:34'),
(56, '陰瑜珈', 18, 0, '2023-06-16 00:26:34', '2023-06-16 00:26:34'),
(57, '空中瑜珈', 18, 0, '2023-06-16 00:26:34', '2023-06-16 00:26:34');

-- --------------------------------------------------------

--
-- 資料表結構 `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` text NOT NULL,
  `open_time` datetime NOT NULL,
  `close_time` datetime NOT NULL,
  `type` int(1) UNSIGNED NOT NULL,
  `img` text DEFAULT NULL,
  `login` tinyint(1) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `topics`
--

INSERT INTO `topics` (`id`, `subject`, `open_time`, `close_time`, `type`, `img`, `login`, `created_time`, `update_time`) VALUES
(1, '2023-06-19部門聚餐', '2023-06-03 23:34:00', '2023-06-17 23:34:00', 1, '', 1, '2023-06-03 15:36:08', '2023-06-03 15:36:08'),
(2, '2023 年末員工旅遊', '2023-06-15 10:16:03', '2023-06-22 10:17:02', 2, 'img', 0, '2023-06-04 14:06:35', '2023-06-04 14:06:35'),
(3, '主餐選擇', '2023-06-15 15:21:14', '2023-06-16 15:21:14', 1, 'img', 0, '2023-06-09 02:02:45', '2023-06-09 02:02:45'),
(17, '端午節禮金', '2023-06-16 08:29:17', '2023-06-19 07:43:17', 1, '6054969.jpg', 0, '2023-06-16 00:16:43', '2023-06-16 00:16:43'),
(18, '社團活動課—瑜珈', '2023-06-19 07:25:00', '2023-06-21 08:25:00', 1, '8653642.jpg', 0, '2023-06-16 00:26:34', '2023-06-16 00:26:34');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
