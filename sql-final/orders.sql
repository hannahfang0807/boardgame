-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-14 11:51:57
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `boardgame`
--

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL COMMENT '流水號',
  `memberAccount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '使用者帳號',
  `paymentTypeId` int(11) NOT NULL COMMENT '付款方式',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='結帳資料表';

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`orderId`, `memberAccount`, `paymentTypeId`, `created_at`, `updated_at`) VALUES
(1, 'user', 0, '2021-05-12 15:28:56', '2021-05-12 15:28:56'),
(2, 'user', 2, '2021-05-12 15:49:59', '2021-05-12 15:49:59'),
(3, 'user', 1, '2021-05-12 16:50:37', '2021-05-12 16:50:37'),
(4, 'hannah', 2, '2021-05-13 09:40:49', '2021-05-13 09:40:49'),
(5, 'hannah', 2, '2021-05-13 09:45:02', '2021-05-13 09:45:02'),
(6, 'hannah', 2, '2021-05-13 09:46:36', '2021-05-13 09:46:36'),
(7, 'hannah', 2, '2021-05-13 09:47:40', '2021-05-13 09:47:40'),
(8, 'hannah', 3, '2021-05-13 09:52:00', '2021-05-13 09:52:00'),
(9, 'hannah', 3, '2021-05-13 09:52:56', '2021-05-13 09:52:56'),
(10, 'hannah', 3, '2021-05-13 10:02:28', '2021-05-13 10:02:28'),
(11, 'hannah', 1, '2021-05-13 11:35:59', '2021-05-13 11:35:59'),
(12, 'hannah', 2, '2021-05-13 13:59:20', '2021-05-13 13:59:20'),
(13, 'hannah', 2, '2021-05-13 13:59:45', '2021-05-13 13:59:45'),
(14, 'hannah', 3, '2021-05-13 14:09:24', '2021-05-13 14:09:24'),
(15, 'hannah', 3, '2021-05-13 14:10:00', '2021-05-13 14:10:00'),
(16, 'hannah', 3, '2021-05-13 14:11:23', '2021-05-13 14:11:23'),
(17, 'hannah', 3, '2021-05-13 14:11:54', '2021-05-13 14:11:54'),
(18, 'hannah', 3, '2021-05-13 14:19:02', '2021-05-13 14:19:02'),
(19, 'hannah', 3, '2021-05-13 14:49:05', '2021-05-13 14:49:05'),
(20, 'hannah', 5, '2021-05-13 15:04:55', '2021-05-13 15:04:55'),
(21, 'hannah', 5, '2021-05-13 15:16:23', '2021-05-13 15:16:23'),
(22, 'hannah', 4, '2021-05-13 15:32:21', '2021-05-13 15:32:21'),
(23, 'hannah', 3, '2021-05-14 09:53:01', '2021-05-14 09:53:01'),
(24, 'hannah', 5, '2021-05-14 10:23:31', '2021-05-14 10:23:31'),
(25, 'hannah', 3, '2021-05-14 10:52:20', '2021-05-14 10:52:20'),
(26, 'hannah', 3, '2021-05-14 11:06:29', '2021-05-14 11:06:29'),
(27, 'hannah', 3, '2021-05-14 11:11:06', '2021-05-14 11:11:06'),
(28, 'hannah', 3, '2021-05-14 11:11:39', '2021-05-14 11:11:39'),
(29, 'hannah', 3, '2021-05-14 11:12:09', '2021-05-14 11:12:09'),
(30, 'hannah', 3, '2021-05-14 11:13:12', '2021-05-14 11:13:12'),
(31, 'hannah', 3, '2021-05-14 11:13:17', '2021-05-14 11:13:17'),
(32, 'hannah', 3, '2021-05-14 11:17:07', '2021-05-14 11:17:07'),
(33, 'hahaha999', 4, '2021-05-14 11:20:05', '2021-05-14 11:20:05');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
