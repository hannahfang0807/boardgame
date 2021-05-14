-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2021 at 11:48 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boardgame`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservationId` int(11) NOT NULL COMMENT '預約編號',
  `memberId` int(11) NOT NULL COMMENT '會員編號',
  `date` date NOT NULL COMMENT '預約時間',
  `startTime` int(11) NOT NULL COMMENT '開始時間,24小時制',
  `duration` tinyint(1) NOT NULL DEFAULT 3 COMMENT '預約時數, 3-8hrs',
  `storeId` int(11) NOT NULL COMMENT '分店編號',
  `numberOfPeople` tinyint(1) NOT NULL COMMENT '預約人數4-8',
  `priceEstimated` int(11) NOT NULL COMMENT '金額預算',
  `notes` varchar(50) DEFAULT NULL COMMENT '客人備註',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationId`, `memberId`, `date`, `startTime`, `duration`, `storeId`, `numberOfPeople`, `priceEstimated`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-05-08', 13, 3, 2, 6, 1800, 'hahahaha', '2021-05-13 11:37:03', '2021-05-13 11:37:03'),
(2, 2, '2021-05-12', 13, 3, 2, 6, 1800, 'yeyeyeyeyeye', '2021-05-13 11:37:09', '2021-05-13 11:37:09'),
(3, 3, '2021-05-31', 13, 4, 2, 4, 1600, 'yeah', '2021-05-13 11:37:19', '2021-05-13 11:37:19'),
(4, 4, '2021-05-28', 13, 3, 1, 6, 1800, NULL, '2021-05-13 11:37:23', '2021-05-13 11:37:23'),
(5, 1, '2021-06-30', 13, 3, 1, 6, 1800, '我們有六個人', '2021-05-13 11:37:26', '2021-05-13 11:37:26'),
(6, 3, '2021-06-30', 13, 3, 2, 6, 1800, 'hahahahah', '2021-05-13 11:42:37', '2021-05-13 11:42:37'),
(7, 6, '2021-05-31', 13, 3, 2, 6, 1800, 'hahahahah', '2021-05-13 11:37:33', '2021-05-13 11:37:33'),
(8, 2, '2021-06-03', 13, 8, 1, 3, 2400, 'hey', '2021-05-13 11:38:25', '2021-05-13 11:38:25'),
(9, 2, '2021-08-26', 13, 3, 1, 3, 900, 'yeeeeee', '2021-05-13 11:38:09', '2021-05-13 11:38:09'),
(10, 3, '2021-10-27', 13, 8, 1, 3, 2400, '', '2021-05-13 11:42:23', '2021-05-13 11:42:23'),
(11, 4, '2021-10-06', 15, 3, 1, 3, 900, '', '2021-05-13 11:43:21', '2021-05-13 11:43:21'),
(12, 5, '2021-05-25', 13, 3, 1, 3, 900, '', '2021-05-13 11:44:01', '2021-05-13 11:44:01'),
(13, 5, '2021-04-04', 13, 8, 1, 8, 6400, '八人八小時八八八', '2021-05-13 11:44:28', '2021-05-13 11:44:28'),
(14, 7, '2021-05-31', 19, 3, 2, 8, 2400, '', '2021-05-13 11:45:33', '2021-05-13 11:45:33'),
(15, 7, '2021-05-16', 13, 8, 2, 8, 6400, 'qqq', '2021-05-13 11:45:53', '2021-05-13 11:45:53'),
(16, 12, '2021-05-19', 13, 3, 1, 3, 900, '', '2021-05-13 11:46:47', '2021-05-13 11:46:47'),
(17, 12, '2021-05-25', 13, 3, 1, 8, 2400, 'bahahahaha', '2021-05-13 11:47:03', '2021-05-13 11:47:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservationId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationId` int(11) NOT NULL AUTO_INCREMENT COMMENT '預約編號', AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
