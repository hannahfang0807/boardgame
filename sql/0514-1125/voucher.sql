-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-13 21:24:53
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
-- 資料庫： `mydatabase`
--

-- --------------------------------------------------------

--
-- 資料表結構 `voucher`
--

CREATE TABLE `voucher` (
  `voucherId` int(11) NOT NULL COMMENT '折價券編號',
  `voucherName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '折價券名稱',
  `voucherPrice` int(11) NOT NULL COMMENT '折價券面額',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `voucher`
--

INSERT INTO `voucher` (`voucherId`, `voucherName`, `voucherPrice`, `created_at`, `updated_at`) VALUES
(1, '小遊戲優惠券', 20, '2021-05-10 10:26:23', '2021-05-10 10:26:23'),
(2, '會員生日優惠券', 50, '2021-05-10 10:26:23', '2021-05-10 10:27:55'),
(3, '員工優惠券', 99, '2021-05-10 10:27:33', '2021-05-10 10:27:33'),
(4, '會員周年優惠券', 50, '2021-05-10 10:33:59', '2021-05-10 10:33:59'),
(5, '測試優惠券', 100, '2021-05-10 10:55:13', '2021-05-10 11:28:07');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucherId`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucherId` int(11) NOT NULL AUTO_INCREMENT COMMENT '折價券編號', AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
