-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2021 at 06:06 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `pid` int(11) NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `block` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `facing` varchar(5) NOT NULL,
  `premium` varchar(10) DEFAULT NULL,
  `transformer` float(10,2) DEFAULT NULL,
  `electricity` varchar(10) DEFAULT NULL,
  `maintenance` float(10,2) DEFAULT NULL,
  `club_house` float(10,2) DEFAULT NULL,
  `amenities` float(10,2) DEFAULT NULL,
  `rate_plot` float(10,2) DEFAULT NULL,
  `plot_grand_total` float(10,2) DEFAULT NULL,
  `land_premium` float(10,2) DEFAULT NULL,
  `construction_area` varchar(12) DEFAULT NULL,
  `2bhk_duplex` varchar(10) DEFAULT NULL,
  `2bhk_duplex_grand_total` float(10,2) DEFAULT NULL,
  `3bhk_duplex` varchar(10) DEFAULT NULL,
  `3bhk_duplex_grand_total` float(10,2) DEFAULT NULL,
  `bank_rate` float(10,2) DEFAULT NULL,
  `vicinity` varchar(10) DEFAULT NULL,
  `corner` float(10,2) DEFAULT NULL,
  `garden` float(10,2) DEFAULT NULL,
  `hold` tinyint(1) NOT NULL DEFAULT 0,
  `is_booked` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `status` tinyint(1) NOT NULL DEFAULT 1
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
(1, 'admin', 'sadmin@admin.com', '9770866241', 'super', 'admin', '123456', NULL, '2021-07-31 13:59:01', 1, 1, 'super_admin');

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
(1, 1, 1, 1, 1, 1);

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
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_transections`
--
ALTER TABLE `property_transections`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
