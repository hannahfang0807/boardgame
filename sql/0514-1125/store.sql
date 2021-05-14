-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-12 04:01:44
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `index`
--

-- --------------------------------------------------------

--
-- 資料表結構 `store`
--

CREATE TABLE `store` (
  `storeId` int(11) NOT NULL COMMENT '分店編號',
  `storeName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分店名稱',
  `phoneNum` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '手機號碼',
  `cityTalk` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '市話',
  `socialMedia` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '社交軟體',
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '地址',
  `storePhoto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '照片名稱',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `store`
--

INSERT INTO `store` (`storeId`, `storeName`, `phoneNum`, `cityTalk`, `socialMedia`, `address`, `storePhoto`, `created_at`, `updated_at`) VALUES
(1, '高雄楠梓店', '0986878027', '(07)366-3313', 'https://www.facebook.com/%E7%98%8B%E6%A1%8C%E9%81%', '高雄市楠梓區宏昌街2號', 'store_20210511084005.jpg', '2021-05-11 14:40:05', '2021-05-11 14:40:05'),
(3, '台北大安店', '0906666265', '(02)2703-600', 'https://www.facebook.com/PHDAAN02/?fref=ts', '台北市大安區通化街28巷2號', 'store_20210511090827.jpg', '2021-05-11 15:08:27', '2021-05-11 15:08:27'),
(4, '台北新店店', '', '(02)2218-006', 'https://www.facebook.com/phantasia04/', '新北市新店區民權路161號2樓', 'store_20210511091227.jpg', '2021-05-11 15:12:27', '2021-05-11 15:12:27'),
(5, '台中逢甲店', '', '(04)2706-520', 'https://www.facebook.com/%E7%98%8B%E6%A1%8C%E9%81%', '台中市西屯區文華路162巷32號', 'store_20210511091516.jpg', '2021-05-11 15:15:16', '2021-05-11 15:15:16'),
(6, '桃園桃園店', '', '(03)369-9600', 'https://www.facebook.com/phantasia05', '桃園市桃園區宏昌八街124號', 'store_20210511091719.jpg', '2021-05-11 15:17:19', '2021-05-11 15:17:19'),
(7, '台中忠孝店', '', '(04)2280-466', 'https://www.facebook.com/phantasia028/', '台中市東區忠孝路242號', 'store_20210511092152.jpg', '2021-05-11 15:21:52', '2021-05-11 15:21:52'),
(8, '新北三重店', '', '(02)2979-166', 'https://www.facebook.com/CBGSanchong/', '新北市三重區中央南路62-2號1樓', 'store_20210511092634.jpg', '2021-05-11 15:26:34', '2021-05-11 15:26:34');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`storeId`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `store`
--
ALTER TABLE `store`
  MODIFY `storeId` int(11) NOT NULL AUTO_INCREMENT COMMENT '分店編號', AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
