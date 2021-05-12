-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-12 11:19:26
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
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `memberId` int(11) NOT NULL COMMENT '會員編號',
  `memberAccount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員帳號',
  `memberPwd` char(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員密碼',
  `memberName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員姓名',
  `memberNickname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員暱稱',
  `memberGender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員性別',
  `memberEmail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員電子郵件',
  `memberPhone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員手機號碼',
  `memberImg` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員大頭貼',
  `memberBirthday` date NOT NULL COMMENT '會員出生年月日',
  `memberAddress` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員住址',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`memberId`, `memberAccount`, `memberPwd`, `memberName`, `memberNickname`, `memberGender`, `memberEmail`, `memberPhone`, `memberImg`, `memberBirthday`, `memberAddress`, `created_at`, `updated_at`) VALUES
(1, 'hannah', '675dc611bafb0b7348dd3baf7e005b6916fb954d', '方漢娜', 'Hannah8', '女', 'hannah0807@gmail.com', '0988888888', '20210511101824.jpg', '2021-01-13', '台北市大安區和平東路二段106號9樓', '2021-05-11 16:18:24', '2021-05-11 16:18:24'),
(2, 'rinn888', 'ce2cffb7c758775c971317bfd9e7af1cb87fb51d', '蔡志珊', '阿志', '男', 'asdfg1234@gmail.com', '0958982411', '20210511050618.jpg', '0000-00-00', '台北市萬華區西寧南路49號', '2021-05-11 15:11:26', '2021-05-11 15:11:26'),
(3, 'hahaha999', '7fed65b07bf4ca955a2870efa3ecda62abe1615c', '王寶旺', '旺旺', '男', 'kioo84@gmail.com', '0958982411', '20210511050353.jpg', '1991-12-20', '台北市信義區中坡北路195號', '2021-05-11 15:11:28', '2021-05-11 15:11:28'),
(4, 'apple0918', 'c46056d49b3657abd1ba90e0d2af444ee44dc7a2', '張佩璇', '佩璇', '女', 'apple0918@gmail.com', '0928474076', '20210511101842.jpg', '1995-08-06', '新北市土城區中央路三段254號', '2021-05-11 16:18:43', '2021-05-11 16:18:43'),
(5, 'bssardino123', 'aec5064fff3a6ebe2137ee3875f7ebdc7249864f', '陳羿水', '水水', '女', 'bssardino123@gmail.com', '091564876', '20210511051016.jpg', '1999-01-03', '台中市西屯區國安一路268號', '2021-05-11 15:11:32', '2021-05-11 15:11:32'),
(6, 'karniola0910', '7cd474797f716639348c0d389702f452fe45e546', '夏佩君', '夏夏', '女', 'karniola0910@gmail.com', '0929748837', '20210511051219.jpeg', '2001-09-10', '桃園市楊梅區高上路一段254號', '2021-05-11 15:11:34', '2021-05-11 15:11:34'),
(7, 'batra0423', 'a6623fa422dfb8b976eeb08ecf61930ea93dc002', '王麗雯', 'Batra', '女', 'batra0423@gmail.com', '0956339454', '20210511051359.jpg', '2005-04-23', '新北市新店區碧潭路262號', '2021-05-11 15:11:36', '2021-05-11 15:11:36'),
(8, 'dfef488151', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '吳力丹', '丹丹', '男', 'dfef488151@gmail.com', '0972431011', '20210511063127.jpg', '1992-07-09', '桃園市龜山區文化三路90號', '2021-05-11 15:11:43', '2021-05-11 15:11:43'),
(12, 'test000', 'd214aab71e69595e42083fbe5662dd7f575d49ae', '林志財', '財哥', '男', 'test000@gmail.com', '0956701197', '20210511091339.jpg', '1997-08-25', '台北市信義區虎林街119號', '2021-05-11 15:13:39', '2021-05-11 15:13:39');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberId`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `memberId` int(11) NOT NULL AUTO_INCREMENT COMMENT '會員編號', AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
