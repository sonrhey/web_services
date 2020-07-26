-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 12:20 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geofencing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

CREATE TABLE `tbl_contacts` (
  `contact_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_mobile_number` varchar(255) NOT NULL,
  `contact_relationship` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_geofence_settings`
--

CREATE TABLE `tbl_geofence_settings` (
  `geofence_settings_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `geofence_latitude` varchar(255) NOT NULL,
  `geofence_longitude` varchar(255) NOT NULL,
  `geofence_radius` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` bigint(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `mobile_number` varchar(25) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `userid_constraint` (`user_id`);

--
-- Indexes for table `tbl_geofence_settings`
--
ALTER TABLE `tbl_geofence_settings`
  ADD PRIMARY KEY (`geofence_settings_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  MODIFY `contact_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_geofence_settings`
--
ALTER TABLE `tbl_geofence_settings`
  MODIFY `geofence_settings_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` bigint(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
