-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2020 at 02:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

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
(30, 'Sagar', 'Singh', 'Reporting', 'Reporter', 23, '20-10-1999', 9331312543, 6432373475, 0, 'B', '12-01-2020', '12-03-2020', 'emp_img/1.png', 'qrcodes/emp_23.png', 'Part Street', '', 'something', 1, '2020-10-27 06:43:41'),
(31, 'Pritam', 'Sankhari', 'IT', 'Web Developer', 8, '20-10-1999', 8765432576, 8767786544, 0, 'B', '12-01-2020', '12-03-2020', 'emp_img/nagal-2.jpg', 'qrcodes/emp_8.png', 'Budge Budge', '', '', 1, '2020-10-27 12:24:09'),
(32, 'pritam', 'das', 'JIO COM', 'Super MAnager', 7, '1996-02-29', 7977979797, 123455679, 0, 'o+ve', '2020-10-24', '2020-10-31', '', 'qrcodes/emp_7.png', 'burj khalifa', '', '', 1, '2020-10-21 13:07:56'),
(33, 'Pritam', 'Sankhari', 'IT', 'Web Developer', 201, '1998-04-29', 9898989833, 9898777744, 0, 'B+', '2020-10-27', '2021-10-27', 'emp_img/images (1).jpg', '', '11,Ramlal Bazar Road', '', '', 0, '2020-10-27 10:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `restrictions`
--

CREATE TABLE `restrictions` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `generate_qr_code` int(11) NOT NULL DEFAULT 1,
  `print_id_cards` int(11) NOT NULL,
  `edit_emp_data` int(11) NOT NULL,
  `delete_emp_data` int(11) NOT NULL,
  `add_emp_data` int(11) NOT NULL,
  `read_emp_data` int(11) NOT NULL,
  `search_data` int(11) NOT NULL DEFAULT 0,
  `import_from_excel` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restrictions`
--

INSERT INTO `restrictions` (`id`, `role_name`, `generate_qr_code`, `print_id_cards`, `edit_emp_data`, `delete_emp_data`, `add_emp_data`, `read_emp_data`, `search_data`, `import_from_excel`) VALUES
(1, 'admin', 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'hr', 1, 1, 0, 0, 1, 1, 0, 0),
(3, 'user1', 1, 1, 1, 1, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `name`, `user_name`, `password`, `mobile`) VALUES
(4, 'admin', 'Pritam', 'admin', '21232f297a57a5a743894a0e4a801fc3', 8989898989),
(5, 'hr', 'Sarita', 'sarita', 'e10adc3949ba59abbe56e057f20f883e', 6767676767),
(6, 'user1', 'Rohit', 'rohit', 'e3ceb5881a0a1fdaad01296d7554868d', 2323232323);

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
-- Indexes for table `restrictions`
--
ALTER TABLE `restrictions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`user_name`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeedata`
--
ALTER TABLE `employeedata`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `restrictions`
--
ALTER TABLE `restrictions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
