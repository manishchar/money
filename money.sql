-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2018 at 11:42 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `money`
--

-- --------------------------------------------------------

--
-- Table structure for table `gold`
--

CREATE TABLE `gold` (
  `id` int(11) NOT NULL,
  `gold_type` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `amount` decimal(25,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gold`
--

INSERT INTO `gold` (`id`, `gold_type`, `name`, `amount`, `qty`, `active`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'A', '30000.00', 10, 1, 1, '2018-10-01 20:36:37', '2018-10-01 20:44:31'),
(2, 1, 'sad', '2.00', 2, 1, 1, '2018-10-01 20:48:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mst_fd`
--

CREATE TABLE `mst_fd` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '1',
  `amount` decimal(25,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `interest` decimal(25,2) NOT NULL,
  `panelty` decimal(25,2) DEFAULT NULL,
  `principle` decimal(25,2) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_rd`
--

CREATE TABLE `mst_rd` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '1',
  `amount` decimal(25,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `interest` decimal(25,2) NOT NULL,
  `panelty` decimal(25,2) DEFAULT NULL,
  `principal` decimal(25,2) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_rd`
--

INSERT INTO `mst_rd` (`id`, `name`, `amount`, `duration`, `interest`, `panelty`, `principal`, `active`, `status`, `created_at`, `updated_at`) VALUES
(1, 'one', '24000.00', 24, '12.00', NULL, '1000.00', 1, 1, '2018-10-01 21:16:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `role_type` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`, `active`, `role_type`, `updated_at`, `created_at`) VALUES
(1, 'Administrator', 1, 1, '0000-00-00 00:00:00', '2018-09-23 09:32:05'),
(2, 'Field manager', 1, 2, '0000-00-00 00:00:00', '2018-09-23 09:33:35'),
(3, 'Agents', 1, 3, '0000-00-00 00:00:00', '2018-09-23 09:33:35'),
(4, 'Collectors', 1, 4, '0000-00-00 00:00:00', '2018-09-23 09:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `fname`, `lname`, `mobile`, `email`, `password`, `active`, `status`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, '1', 'admin', 'admin', '9856985685', 'admin@gmail.com', 'D033E22AE348AEB5660FC2140AEC35850C4DA997', 1, 1, '0000-00-00 00:00:00', '2018-09-23 09:40:57', NULL),
(2, '2', 'manish', 'chakravarti', '9856985674', 'manish@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '0000-00-00 00:00:00', '2018-09-23 10:10:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gold`
--
ALTER TABLE `gold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_fd`
--
ALTER TABLE `mst_fd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_rd`
--
ALTER TABLE `mst_rd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gold`
--
ALTER TABLE `gold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mst_fd`
--
ALTER TABLE `mst_fd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_rd`
--
ALTER TABLE `mst_rd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
