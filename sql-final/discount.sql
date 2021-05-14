-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-14 11:49:04
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
-- 資料表結構 `discount`
--

CREATE TABLE `discount` (
  `discountId` int(11) NOT NULL COMMENT '折價券流水號',
  `memberId` int(11) NOT NULL COMMENT '會員編號',
  `voucherId` int(11) NOT NULL COMMENT '折價券編號',
  `discountUse` tinyint(1) NOT NULL COMMENT '使用情況\r\n0:已使用;1:未使用',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `discount`
--

INSERT INTO `discount` (`discountId`, `memberId`, `voucherId`, `discountUse`, `created_at`, `updated_at`) VALUES
(2, 1, 5, 0, '2021-05-10 10:58:30', '2021-05-11 15:32:46'),
(3, 2, 1, 1, '2021-05-10 11:20:58', '2021-05-11 15:35:29'),
(4, 3, 1, 1, '2021-05-10 11:22:22', '2021-05-11 15:35:38'),
(5, 5, 4, 0, '2021-05-10 11:22:41', '2021-05-11 15:35:54'),
(7, 6, 1, 1, '2021-05-10 11:24:34', '2021-05-11 15:35:42'),
(8, 4, 2, 0, '2021-05-10 11:25:31', '2021-05-11 15:35:57'),
(9, 7, 1, 1, '2021-05-10 11:26:28', '2021-05-11 15:36:01'),
(15, 6, 2, 1, '2021-05-10 11:30:40', '2021-05-11 15:35:48'),
(18, 1, 3, 1, '2021-05-11 16:20:28', '2021-05-11 16:20:28');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discountId`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `discount`
--
ALTER TABLE `discount`
  MODIFY `discountId` int(11) NOT NULL AUTO_INCREMENT COMMENT '折價券流水號', AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
