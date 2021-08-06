-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 02:06 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abhinav_city`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `eid` int(11) NOT NULL,
  `client_name` varchar(200) DEFAULT NULL,
  `property_id` int(11) NOT NULL,
  `client_number` varchar(20) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`eid`, `client_name`, `property_id`, `client_number`, `discount`, `remark`, `created_at`, `created_by`, `status`) VALUES
(1, 'rahul', 1, '9770866241', NULL, 'test', '2021-08-03 11:36:32', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `pid` int(11) NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `block` varchar(20) NOT NULL,
  `area` varchar(20) DEFAULT NULL,
  `facing` varchar(5) NOT NULL,
  `transformer_kw` float(10,2) DEFAULT NULL,
  `transformer_rate` float(10,2) DEFAULT NULL,
  `maintenance` float(10,2) DEFAULT NULL,
  `club_house` float(10,2) DEFAULT NULL,
  `rate_plot` float(10,2) DEFAULT NULL,
  `property_type` varchar(20) DEFAULT NULL,
  `corner` tinyint(1) DEFAULT 0,
  `garden` tinyint(1) DEFAULT 0,
  `hold` tinyint(1) NOT NULL DEFAULT 0,
  `is_booked` tinyint(1) NOT NULL DEFAULT 0,
  `premium_per` tinyint(1) DEFAULT NULL,
  `premium_amount` float(10,2) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`pid`, `category`, `block`, `area`, `facing`, `transformer_kw`, `transformer_rate`, `maintenance`, `club_house`, `rate_plot`, `property_type`, `corner`, `garden`, `hold`, `is_booked`, `premium_per`, `premium_amount`, `created_at`, `created_by`, `status`) VALUES
(15, 'plot', 'P1', '1476', 'E', 10.00, 200.00, 75000.00, 100000.00, 2100.00, NULL, 1, 0, 0, 0, 1, 5.00, '2021-08-05 14:22:19', 1, 0),
(16, 'plot', 'P1', '1476', 'E', 75.00, 1000.00, 75000.00, 100000.00, 2100.00, NULL, 1, 0, 0, 0, 1, 5.00, '2021-08-06 02:34:41', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_transections`
--

CREATE TABLE `property_transections` (
  `t_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `wife_name` varchar(200) DEFAULT NULL,
  `wife_contact` varchar(20) DEFAULT NULL,
  `family_member` int(11) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `pan` varchar(100) NOT NULL,
  `adhaar` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `discount` int(11) DEFAULT NULL,
  `construction_area` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `active` tinyint(1) DEFAULT 0,
  `user_type` enum('super_admin','admin','broker') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `email`, `contact_no`, `fname`, `lname`, `password`, `created_by`, `created_at`, `status`, `active`, `user_type`) VALUES
(1, 'admin', 'sadmin@admin.com', '9770866241', 'super', 'admin', '123456', NULL, '2021-07-31 13:59:01', 1, 1, 'super_admin'),
(2, 'abhinav_98', 'abhinavadmin@gmail.com', '', 'abhinav', 'admin', '123', 1, '2021-08-02 12:37:16', 1, 1, 'admin'),
(3, 'abhinav_84', 'abhinavbroker@gmail.com', '', 'abhinav1', 'broker', '1234567', 1, '2021-08-02 12:38:37', 1, 1, 'broker');

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `booking` tinyint(1) NOT NULL DEFAULT 0,
  `plot_entry` tinyint(1) NOT NULL DEFAULT 0,
  `user_entry` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`id`, `user_Id`, `booking`, `plot_entry`, `user_entry`, `status`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 1, 1),
(3, 3, 1, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `property_transections`
--
ALTER TABLE `property_transections`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `property_transections`
--
ALTER TABLE `property_transections`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
