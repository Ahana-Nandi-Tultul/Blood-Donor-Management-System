-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 03:58 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blooddonor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_no` int(7) NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_email` varchar(50) NOT NULL,
  `a_address` varchar(80) NOT NULL,
  `a_phn_no` varchar(11) NOT NULL,
  `a_blood_group` varchar(10) NOT NULL,
  `a_city` varchar(80) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `account_creating_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_no`, `a_name`, `a_email`, `a_address`, `a_phn_no`, `a_blood_group`, `a_city`, `a_password`, `account_creating_time`) VALUES
(1, 'Ahana Nandi Tultul', 'nandi@gmail.com', 'Uttara Sector-10', '01310555073', 'O+', 'Dhaka', 'n', '2022-04-03 17:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `bloodrequest`
--

CREATE TABLE `bloodrequest` (
  `r_no` int(255) NOT NULL,
  `p_no` int(255) NOT NULL,
  `d_no` int(255) NOT NULL,
  `r_status` varchar(11) NOT NULL,
  `donateLocation` varchar(80) NOT NULL,
  `r_reason` varchar(255) NOT NULL,
  `neededDate` datetime DEFAULT NULL,
  `requesting_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloodrequest`
--

INSERT INTO `bloodrequest` (`r_no`, `p_no`, `d_no`, `r_status`, `donateLocation`, `r_reason`, `neededDate`, `requesting_time`) VALUES
(11, 4, 1, 'Complete', 'Mirpur Hospital', 'Open Heart Surgery.', '2022-04-12 00:00:00', '2022-04-07 13:28:52'),
(12, 4, 0, 'Pending', 'Mirpur Hospital', 'Operation', '2022-04-23 00:00:00', '2022-04-07 13:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `cno` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phn` varchar(11) NOT NULL,
  `smgs` varchar(255) NOT NULL,
  `submittingTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`cno`, `name`, `email`, `phn`, `smgs`, `submittingTime`) VALUES
(1, 'Tarin Islam', 'tarin@gmail.com', '01797757422', 'I want to contact you for a free donation camp.', '2022-04-07 19:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `d_no` int(255) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `d_email` varchar(50) NOT NULL,
  `d_address` varchar(80) NOT NULL,
  `d_phn_no` varchar(12) NOT NULL,
  `d_blood_group` varchar(10) NOT NULL,
  `d_city` varchar(80) NOT NULL,
  `d_password` varchar(255) NOT NULL,
  `account_creating_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`d_no`, `d_name`, `d_email`, `d_address`, `d_phn_no`, `d_blood_group`, `d_city`, `d_password`, `account_creating_time`) VALUES
(1, 'Ahana Nandi', 'ahana@gmail.com', 'Uttara Sector 10 Ranavola Rd', '01310555073', 'B+', 'Dhaka', 'a', '2022-04-07 13:38:06'),
(4, 'Touhida Khanam', 'touhida@gmail.com', 'Mirpur 10', '01610', 'A+', 'Dhaka', 'tk', '2022-04-07 12:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_no` int(255) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_email` varchar(50) NOT NULL,
  `p_address` varchar(80) NOT NULL,
  `p_phn_no` varchar(12) NOT NULL,
  `p_blood_group` varchar(10) NOT NULL,
  `p_city` varchar(80) NOT NULL,
  `p_password` varchar(255) NOT NULL,
  `account_creating_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_no`, `p_name`, `p_email`, `p_address`, `p_phn_no`, `p_blood_group`, `p_city`, `p_password`, `account_creating_time`) VALUES
(1, 'Moon', 'moon@gmail.com', 'Uttara Sector 10', '01310', 'O+', 'Dhaka', 'm', '2022-04-03 10:36:52'),
(2, 'Nadia', 'nadia@gmail.com', 'Hamdah, ', '1910923787', 'AB+', 'Jhenaidah', 'n', '2022-04-06 11:54:02'),
(3, 'Israt', 'Israt@gmail.com', 'Uttara Sector-13', '01410', 'B+', 'Dhaka', 'i', '2022-03-28 12:27:51'),
(4, 'Faria Islam', 'faria@gmail.com', 'Mirpur 14', '017710', 'A+', 'Dhaka', 'fi', '2022-04-07 12:54:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_no`);

--
-- Indexes for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`cno`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`d_no`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_no` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  MODIFY `r_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `cno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `d_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `p_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
