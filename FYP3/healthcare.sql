-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 11:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_h`
--

CREATE TABLE `admin_h` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_h`
--

INSERT INTO `admin_h` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `assistance_h`
--

CREATE TABLE `assistance_h` (
  `id_assist` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `ic_no` varchar(50) NOT NULL,
  `phone_no` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(300) NOT NULL,
  `document` varchar(500) NOT NULL,
  `cost` double(10,2) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `account_holder` varchar(50) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `verified_document` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assistance_h`
--

INSERT INTO `assistance_h` (`id_assist`, `first_name`, `last_name`, `username`, `password`, `ic_no`, `phone_no`, `email`, `address`, `document`, `cost`, `bank_name`, `account_holder`, `account_no`, `status`, `hospital`, `reason`, `verified_document`) VALUES
(1, 'test', 'Panicheliven', 'malini123', '12345', '12345678', '01110804741', 'malinilini15@gmail.com', 'Jalan Puteri 6,PT 5229 Taman Desa Puteri ,Bahau,Negeri Sembilan', '', 0.00, '', '123456', '', 'Approve', '', '', ''),
(2, 'test', 'Ravi Sandiran', 'test', 'ruba', '12345678', '123456789', 'siti@gmail.com', 'rubasrre@gmail.com', '6382f48438f89.', 0.00, '', 'Rubasrre1234', '123456789', 'Pending', 'Assunta Hospital', 'Car accident and it is very urgent', ''),
(3, 'hi', 'balqis', 'siti', '12345', '123456789', '123456789', 'siti@gmail.com', '123, Jalan Medan 30, Taman Medan ', '', 20000.00, '', 'siti balqis', '123456789', '', '', '', ''),
(6, 'malini', 'Sandiran', 'ravi', '12345', '1223456789', ' 01110804741', 'ravisandiran@gmail.com', 'Jalan Puteri 6,PT 5229 Taman Desa Puteri ,Bahau,Negeri Sembilan', '', 12345.00, '', 'ravi', '12586898', 'Approve', '', '', ''),
(7, 'hi', 'Subrayan', 'premala', '123456789', '1223456789', '0123456789', 'premala@gmail.com', 'Jalan Puteri 6,PT 5229 Taman Desa Puteri ,Bahau,Negeri Sembilan', '', 1233.00, 'Standard Chartered', 'premala', '12586898', '', '', '', ''),
(8, 'hi', 'Ranjini', 'siva', 'siva123', '123456789', '12346789', 'siva@gmail.com', '1234,Jalan Bangi Utama', '', 10000.00, 'Public', 'Sivaranjini', '1289759799887', '', '', '', ''),
(10, 'hi', 'Panicheliven', 'prema', '123456', '9780066885', ' 01110804741', 'prema11@gmail.com', 'Jalan Puteri 6,PT 5229 Taman Desa Puteri ,Bahau,Negeri Sembilan', '', 20000.00, '', 'cimb', '7069707506', '', '', '', ''),
(11, 'hi', 'Panicheliven', 'fatin1', '12345678', '1223456789', '01110804741', 'malinilini15@gmail.com', 'Jalan Puteri 6,PT 5229 Taman Desa Puteri ,Bahau,Negeri Sembilan', '', 2000.00, '', 'cimb', '7069707506', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contribute_h`
--

CREATE TABLE `contribute_h` (
  `id_contribute` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `ic_no` varchar(100) NOT NULL,
  `phone_no` varchar(30) NOT NULL,
  `support_doc` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contribute_h`
--

INSERT INTO `contribute_h` (`id_contribute`, `f_name`, `l_name`, `uname`, `password`, `email`, `address`, `ic_no`, `phone_no`, `support_doc`, `status`) VALUES
(2, 'Malini123', 'Panicheliven', 'malini', '12345', 'malinilini15@gmail.com', 'Jalan Puteri 6,PT 5229 Taman Desa Puteri ,Bahau,Negeri Sembilan', '1223456789test', ' 01110804741', '', 'Approve'),
(3, 'vin11', 'vine', 'vinn', '123456', 'vin15@gmail.com', 'No 5 jalan bayu 3/11 taman nusa bayu', '940104055138', '0804741', '6382f0ec4cbb2.', 'Reject'),
(5, 'ravi', 'ravi', 'ravi14', '1234', 'malinilini15@gmail.com', 'No 5 jalan bayu 3/11 taman nusa bayu', '9780066885', '01110804741', '', 'Blacklist');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_h`
--

CREATE TABLE `receipt_h` (
  `id_receipt` varchar(10) NOT NULL,
  `receipt` varchar(100) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `id_assist` int(11) NOT NULL,
  `assist_name` varchar(100) NOT NULL,
  `cost` double(10,2) NOT NULL,
  `id_contribute` int(11) NOT NULL,
  `after_contribute` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt_h`
--

INSERT INTO `receipt_h` (`id_receipt`, `receipt`, `amount`, `id_assist`, `assist_name`, `cost`, `id_contribute`, `after_contribute`) VALUES
('BZ126', '', 253.00, 2, 'test Ravi Sandiran', 0.00, 5, 0.00),
('CG197', '', 50.00, 6, 'malini Sandiran', 12345.00, 3, 12295.00),
('DX167', '', 1000.00, 1, 'test Panicheliven', 0.00, 5, 0.00),
('EJ113', '', 253.00, 2, 'test Ravi Sandiran', 0.00, 5, 0.00),
('FI125', '', 25.00, 2, 'test Ravi Sandiran', 0.00, 5, 0.00),
('NL185', '', 253.00, 6, 'malini Sandiran', 0.00, 5, 0.00),
('PB189', '', 253.00, 7, 'hi Subrayan', 1233.00, 3, 0.00),
('PQ158', '', 253.00, 2, 'test Ravi Sandiran', 0.00, 5, 0.00),
('PR103', '', 43.00, 1, 'test Panicheliven', 0.00, 5, 0.00),
('WM170', '', 524.12, 3, 'hi balqis', 20000.00, 5, 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_h`
--
ALTER TABLE `admin_h`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `assistance_h`
--
ALTER TABLE `assistance_h`
  ADD PRIMARY KEY (`id_assist`);

--
-- Indexes for table `contribute_h`
--
ALTER TABLE `contribute_h`
  ADD PRIMARY KEY (`id_contribute`);

--
-- Indexes for table `receipt_h`
--
ALTER TABLE `receipt_h`
  ADD PRIMARY KEY (`id_receipt`),
  ADD UNIQUE KEY `id_receipt` (`id_receipt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_h`
--
ALTER TABLE `admin_h`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assistance_h`
--
ALTER TABLE `assistance_h`
  MODIFY `id_assist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contribute_h`
--
ALTER TABLE `contribute_h`
  MODIFY `id_contribute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
