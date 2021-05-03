-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2020 at 03:11 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idcard`
--

-- --------------------------------------------------------

--
-- Table structure for table `employeedata`
--

CREATE TABLE `employeedata` (
  `user_id` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `Emp_ID` int(11) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `Mobile` bigint(20) NOT NULL,
  `Emergency` bigint(20) NOT NULL,
  `Secondary_no` bigint(11) NOT NULL,
  `Blood_group` varchar(50) NOT NULL,
  `Dateofissue` varchar(20) NOT NULL,
  `Dateofexpiry` varchar(20) NOT NULL,
  `Filename` varchar(500) NOT NULL,
  `qr_file` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `card_validity` varchar(50) NOT NULL,
  `duplicate_card_issue_reason` text NOT NULL,
  `printed` int(11) NOT NULL DEFAULT 0,
  `print_on_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeedata`
--

INSERT INTO `employeedata` (`user_id`, `Firstname`, `Lastname`, `Department`, `Designation`, `Emp_ID`, `DOB`, `Mobile`, `Emergency`, `Secondary_no`, `Blood_group`, `Dateofissue`, `Dateofexpiry`, `Filename`, `qr_file`, `Address`, `card_validity`, `duplicate_card_issue_reason`, `printed`, `print_on_date`) VALUES
(1, 'rohit', 'pugalia', 'it', 'web developer', 137, '1995-02-14', 8981223700, 8240583226, 0, 'o+ve', '2020-10-10', '2021-12-31', 'emp_img/images.jpg', 'qrcodes/emp_137.png', '', '', '', 0, '0000-00-00 00:00:00'),
(29, 'Ashok', 'Singh', 'IT', 'Software Developer', 2, '20-10-1999', 4321312543, 5432333435, 0, 'B', '12-01-2020', '12-03-2020', 'emp_img/1.png', 'qrcodes/emp_2.png', 'Ruby', '', '', 0, '0000-00-00 00:00:00'),
(30, 'Sagar', 'Singh', 'Reporting', 'Reporter', 23, '20-10-1999', 9331312543, 6432373475, 0, 'B', '12-01-2020', '12-03-2020', 'emp_img/1.png', 'qrcodes/emp_23.png', 'Part Street', '', '', 0, '0000-00-00 00:00:00'),
(31, 'Pritam', 'Sankhari', 'IT', 'Web Developer', 8, '20-10-1999', 8765432576, 8767786544, 0, 'B', '12-01-2020', '12-03-2020', 'emp_img/1.png', 'qrcodes/emp_8.png', 'Budge Budge', '', '', 0, '0000-00-00 00:00:00'),
(32, 'pritam', 'das', 'JIO COM', 'Super MAnager', 7, '1996-02-29', 7977979797, 123455679, 0, 'o+ve', '2020-10-24', '2020-10-31', '', 'qrcodes/emp_7.png', 'burj khalifa', '', '', 1, '2020-10-21 13:07:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeedata`
--
ALTER TABLE `employeedata`
  ADD PRIMARY KEY (`user_id`) USING BTREE,
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeedata`
--
ALTER TABLE `employeedata`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
