-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2016 at 05:24 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gasbdata`
--
CREATE DATABASE IF NOT EXISTS `gasbdata` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gasbdata`;

-- --------------------------------------------------------

--
-- Table structure for table `bookingdata`
--

CREATE TABLE `bookingdata` (
  `TransactionId` int(5) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `PaymentMode` varchar(20) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `Time` varchar(30) NOT NULL,
  `Ddate` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingdata`
--

INSERT INTO `bookingdata` (`TransactionId`, `UserName`, `PaymentMode`, `Date`, `Time`, `Ddate`) VALUES
(34, 'kamlesh', 'Cash On Delivery', '23:11:16', '08:29:15', '28-11-16'),
(55, 'sandip', 'Cash On Delivery', '11/11/16', '15:11:16', '15/11/16'),
(42, 'varsha', 'Cash On Delivery', '02:12:16', '05:22:46', '07-12-16'),
(44, 'varsha', 'Cash On Delivery', '02:12:16', '05:29:21', '07-12-16'),
(45, 'varsha', 'Online Payment', '02:12:16', '05:31:34', '07-12-16'),
(56, 'suresh', 'Cash On Delivery', '03:12:16', '05:33:13', '08-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `custfeedback`
--

CREATE TABLE `custfeedback` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `feedback` longtext NOT NULL,
  `Response` longtext,
  `rating` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `Responsedate` varchar(20) DEFAULT NULL,
  `Responsetime` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custfeedback`
--

INSERT INTO `custfeedback` (`id`, `username`, `feedback`, `Response`, `rating`, `date`, `time`, `Responsedate`, `Responsetime`) VALUES
(1, 'suresh', 'website design is simple and userfriendly', '', 'Very good', '21:11:16', '02:34:16', '', ''),
(14, 'suresh', 'website design is simple and userfriendly', 'hii suresh', 'Excellent', '22:11:16', '06:42:17', '25:11:16', '05:15:44'),
(15, 'suresh', 'website design is simple and userfriendly', '', 'Good', '23:11:16', '10:47:59', '', ''),
(24, 'varsha', 'website design is so good and user friendly', NULL, 'Very good', '02:12:16', '06:00:15', NULL, NULL),
(18, 'suresh', 'asdhasjdhasjds\r\nsdajdjasbdj', 'hiello', '', '25:11:16', '10:58:45', '25:11:16', '06:00:51'),
(19, 'suresh', '', 'thankyou\r\n', 'Good', '25:11:16', '06:06:48', '25:11:16', '06:07:34'),
(20, 'suresh', 'hii', NULL, 'Good', '25:11:16', '06:08:01', NULL, NULL),
(21, 'suresh', 'design is very nice', NULL, 'Very good', '25:11:16', '06:08:55', NULL, NULL),
(22, 'suresh', 'xzjbxjbzj', 'hii', 'Good', '25:11:16', '09:28:51', '30:11:16', '01:27:42'),
(23, 'suresh', 'website design is great', 'thank you for your lovely feedback', 'Excellent', '30:11:16', '05:29:19', '30:11:16', '01:13:29'),
(25, 'suresh', 'need improvement', NULL, 'Fair', '03:12:16', '02:20:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gas_agency`
--

CREATE TABLE `gas_agency` (
  `CustNo` int(5) NOT NULL,
  `CustFName` varchar(30) NOT NULL,
  `CustLName` varchar(30) NOT NULL,
  `CustADD` varchar(500) NOT NULL,
  `CustMobiNo` varchar(10) NOT NULL,
  `CustAdharNo` varchar(12) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Date` varchar(15) NOT NULL,
  `Time` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gas_agency`
--

INSERT INTO `gas_agency` (`CustNo`, `CustFName`, `CustLName`, `CustADD`, `CustMobiNo`, `CustAdharNo`, `Gender`, `Date`, `Time`) VALUES
(16, 'suresh', 'pawar', 'ganesh society room no-B1 sec-1 kalamboli 410217', '7755856525', '455855245121', 'Male', '20:11:16', '04:41:35'),
(17, 'reshma', 'pawar', 'ganesh society room no-B1 sec-1 kalamboli 410217', '7755856526', '455855245123', 'Male', '03:12:16', '10:21:14'),
(22, 'sandip', 'kengar', 'ganesh societ', '8898856624', '745547444454', 'Male', '03:12:16', '10:36:59'),
(21, 'varsha', 'patil', 'ganesh society sector-3E bilding no-12 412018', '4521454125', '447787454412', 'Male', '03:12:16', '10:21:25'),
(23, 'sandip', 'pawar', 'E-1 panvel building no 12', '8898856625', '745547444488', 'Male', '03:12:16', '10:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `newsupdate`
--

CREATE TABLE `newsupdate` (
  `id` int(5) NOT NULL,
  `news` longtext,
  `announcement` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsupdate`
--

INSERT INTO `newsupdate` (`id`, `news`, `announcement`) VALUES
(1, 'You can order Bharatgas Mini from the comfort of your home, by just dialing the toll free number 1800 22 4344 and get the delivery within two hours at a nominal delivery charge of Rs. 25/- for this value added service. In this case too you will need to provide your proof of identity (POI).\r\n\r\nOrders can be booked on the toll free number 24 X 7. Deliveries for orders will be made from 9 am to 9 pm. Orders booked beyond 9 pm will be delivered the next day after 9 am. The connection / refill cylinder will be delivered to the residence of the customer within 2 hours of the order booked. Dial a Bharatgas Mini can be presently availed in 8 cities viz. Ahmedabad, Bangalore, Delhi, Faridabad, Gurgaon, Hyderabad, Mumbai and Pune.\r\n\r\nIf you are moving out of town or, for any other reason wish to return the cylinder and pressure regulator, you may do so and get a refund as under: ', 'You can order Bharatgas Mini from the comfort of your home, by just dialing the toll free number 1800 22 4344 and get the delivery within two hours at a nominal delivery charge of Rs. 25/- for this value added service. In this case too you will need to provide your proof of identity (POI).\r\n\r\nOrders can be booked on the toll free number 24 X 7. Deliveries for orders will be made from 9 am to 9 pm. Orders booked beyond 9 pm will be delivered the next day after 9 am. The connection / refill cylinder will be delivered to the residence of the customer within 2 hours of the order booked. Dial a Bharatgas Mini can be presently availed in 8 cities viz. Ahmedabad, Bangalore, Delhi, Faridabad, Gurgaon, Hyderabad, Mumbai and Pune.\r\n\r\nIf you are moving out of town or, for any other reason wish to return the cylinder and pressure regulator, you may do so and get a refund as under: ');

-- --------------------------------------------------------

--
-- Table structure for table `newupdate`
--

CREATE TABLE `newupdate` (
  `news` longtext NOT NULL,
  `anouncment` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newupdate`
--

INSERT INTO `newupdate` (`news`, `anouncment`) VALUES
('adjsbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', '');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `CustNo` int(5) NOT NULL,
  `CustFName` varchar(25) NOT NULL,
  `CustLName` varchar(25) NOT NULL,
  `CustAdd` varchar(500) NOT NULL,
  `CustMob` varchar(10) NOT NULL,
  `CustAdhar` varchar(12) NOT NULL,
  `CustEmail` varchar(50) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `UserName` varchar(10) NOT NULL,
  `CustPass` varchar(10) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Time` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`CustNo`, `CustFName`, `CustLName`, `CustAdd`, `CustMob`, `CustAdhar`, `CustEmail`, `Gender`, `UserName`, `CustPass`, `Date`, `Time`) VALUES
(17, 'kamleshkumar', 'prajapati', 'ganesh society room no-a3 sec-1 kalamboli 410217', '8455254856', '848551514858', 'kprajapati@gmail.com', 'Male', 'kamlesh', 'kamlesh', '2016-11-19', '11:09'),
(16, 'suresh', 'pawar', 'ganesh society room no-B1 sec-1 kalamboli 410217', '7755856525', '455855245121', 'sureshp1@gmail.com', 'Male', 'suresh', 'suresh12', '2016-11-16', '04:42:42'),
(15, 'mahesh', 'kambale', 'ganesh society room no-b10 sec-1 kalamboli 410217', '7856254124', '455121154115', 'maheshs@gmail.com', 'Male', 'mahesh', 'mahesh', '2016-11-19', '09:06'),
(44, 'sandip', 'kengar', 'ganesh scoiety', '8898856624', '744544111412', 'sandipkengar0@gmail.com', 'Male', 'sandip', 'sandip', '2016-12-14', '05:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingdata`
--
ALTER TABLE `bookingdata`
  ADD PRIMARY KEY (`TransactionId`);

--
-- Indexes for table `custfeedback`
--
ALTER TABLE `custfeedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gas_agency`
--
ALTER TABLE `gas_agency`
  ADD PRIMARY KEY (`CustNo`);

--
-- Indexes for table `newsupdate`
--
ALTER TABLE `newsupdate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD UNIQUE KEY `CustNo` (`CustNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingdata`
--
ALTER TABLE `bookingdata`
  MODIFY `TransactionId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `custfeedback`
--
ALTER TABLE `custfeedback`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `gas_agency`
--
ALTER TABLE `gas_agency`
  MODIFY `CustNo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `newsupdate`
--
ALTER TABLE `newsupdate`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
