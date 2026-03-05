-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2026 at 04:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tripy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tripy_contact`
--

CREATE TABLE `tripy_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(200) NOT NULL,
  `contact_phone` bigint(20) NOT NULL,
  `contact_message` varchar(300) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tripy_contact`
--

INSERT INTO `tripy_contact` (`contact_id`, `contact_name`, `contact_phone`, `contact_message`, `status`, `created_date`, `updated_date`) VALUES
(1, 'Rishi', 9313206646, 'GET A TEXI...', 1, '2024-09-13 16:34:18', '2024-09-13 16:34:18'),
(2, 'manan', 7861018647, 'GET A TEXI...', 1, '2024-09-13 16:35:08', '2024-09-13 16:35:08'),
(3, 'yash', 9313206646, 'GET A TEXI...', 1, '2024-09-13 16:35:46', '2024-09-13 16:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `tripy_driver`
--

CREATE TABLE `tripy_driver` (
  `driver_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `driver_phone` bigint(10) NOT NULL,
  `driver_licence` varchar(11) NOT NULL,
  `driver_adhar_card` varchar(11) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `approved` int(1) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tripy_driver`
--

INSERT INTO `tripy_driver` (`driver_id`, `login_id`, `driver_phone`, `driver_licence`, `driver_adhar_card`, `vehicle_name`, `vehicle_type`, `approved`, `status`, `created_date`, `updated_date`) VALUES
(1, 3, 9313206646, 'client-1.pn', 'client-2.pn', 'thar', 'four-wheeler', 1, 1, '2024-09-13 11:49:09', '2024-11-26 10:35:54'),
(5, 2, 9313206646, 'contact-img', 'delivery-ma', 'thar', 'four-wheeler', 1, 1, '2024-10-16 11:29:10', '2024-11-26 10:52:44'),
(6, 13, 9313206646, 'contact-img', 'delivery-ma', 'verna', 'four-wheeler', 1, 1, '2024-10-16 11:37:49', '2024-11-26 10:35:53'),
(7, 14, 9313206646, 'delivery-ma', 'client-1.pn', 'BMW', 'four-wheeler', 1, 1, '2024-11-25 11:12:39', '2024-11-26 10:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `tripy_driver_ride`
--

CREATE TABLE `tripy_driver_ride` (
  `driver_ride_id` int(11) NOT NULL,
  `driver_id` varchar(200) NOT NULL,
  `ride_id` varchar(200) NOT NULL,
  `accepted_status` varchar(20) NOT NULL DEFAULT 'pending',
  `closed_status` varchar(20) NOT NULL DEFAULT 'pending',
  `status` int(11) NOT NULL DEFAULT 0,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tripy_driver_ride`
--

INSERT INTO `tripy_driver_ride` (`driver_ride_id`, `driver_id`, `ride_id`, `accepted_status`, `closed_status`, `status`, `updated_date`, `created_date`) VALUES
(1, '1', '1', 'accepted', 'closed', 0, '2024-10-16 11:28:04', '2024-10-16 11:28:04'),
(2, '1', '1', 'accepted', 'closed', 0, '2024-10-16 11:28:07', '2024-10-16 11:28:07'),
(3, '1', '2', 'accepted', 'closed', 0, '2024-10-16 11:28:10', '2024-10-16 11:28:10'),
(4, '1', '1', 'rejected', 'closed', 0, '2024-10-16 11:28:12', '2024-10-16 11:28:12'),
(6, '1', '2', 'accepted', 'closed', 0, '2024-10-16 11:46:39', '2024-10-16 11:46:39'),
(8, '1', '24', 'accepted', 'closed', 0, '2024-10-16 11:58:51', '2024-10-16 11:58:51'),
(9, '1', '23', 'accepted', 'closed', 0, '2024-10-16 11:58:54', '2024-10-16 11:58:54'),
(10, '6', '26', 'pending', 'pending', 0, '2024-10-23 10:51:06', '2024-10-23 10:51:06'),
(11, '5', '25', 'accepted', 'closed', 0, '2024-11-26 10:53:58', '2024-11-26 10:53:58'),
(12, '7', '26', 'pending', 'pending', 0, '2024-11-26 10:36:52', '2024-11-26 10:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `tripy_login`
--

CREATE TABLE `tripy_login` (
  `login_id` int(11) NOT NULL,
  `login_fname` varchar(200) NOT NULL,
  `login_lname` varchar(200) NOT NULL,
  `login_username` varchar(200) NOT NULL,
  `login_email` varchar(200) NOT NULL,
  `login_password` varchar(200) NOT NULL,
  `login_thumb` varchar(200) NOT NULL,
  `role_id` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tripy_login`
--

INSERT INTO `tripy_login` (`login_id`, `login_fname`, `login_lname`, `login_username`, `login_email`, `login_password`, `login_thumb`, `role_id`, `status`, `created_date`, `updated_date`) VALUES
(1, 'Rishi', 'Patel', 'Rishi Patel', 'rishiipatel8488@gmail.com', '0e230b1a582d76526b7ad7fc62ae937d', 'delivery-man.png', '1', 1, '2024-09-25 11:24:45', '2024-09-25 11:24:45'),
(2, 'manan', 'patel', 'Manan Patel', 'mananpatel1950@gmail.com', '814f06ab7f40b2cff77f2c7bdffd3415', 'delivery-man.png', '3', 1, '2026-01-30 05:04:20', '2026-01-30 05:04:20'),
(3, 'yash', 'solanki', 'Yash Sheth', 'yash21200@gmail.com', '50a505acfcdc52e6e704164f1d65b474', 'delivery-man.png', '2', 1, '2024-09-25 10:45:58', '2024-09-25 10:45:58'),
(12, 'JATINKUMAR', 'BHATT', 'driver', 'spare1294@gmail.com', '84438b7aae55a0638073ef798e50b4ef', 'delivery-man.png', '3', 1, '2024-10-16 11:29:10', '2024-10-16 11:29:10'),
(13, 'pratham', 'patel', 'driver', 'mananpatel704@gmail.com', 'e354fd90b2d5c777bfec87a352a18976', 'delivery-man.png', '3', 1, '2024-10-24 11:41:37', '2024-10-24 11:41:37'),
(14, 'om', 'patel', 'om patel', 'om@gmail.com', 'd58da82289939d8c4ec4f40689c2847e', 'delivery-man.png', '3', 1, '2024-11-25 11:12:39', '2024-11-25 11:12:39'),
(15, 'manan', 'patel', 'mananaananan', 'mananpatel704@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '20231124_110741483_iOS - Copy.jpg', '1', 1, '2026-02-22 14:26:13', '2026-02-22 14:26:13'),
(16, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '1', 1, '2026-02-22 14:26:20', '2026-02-22 14:26:20'),
(17, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '1', 1, '2026-02-22 14:26:22', '2026-02-22 14:26:22'),
(18, 'manan', 'patel', 'mp', 'mananpatel1950@gmail.com', '814f06ab7f40b2cff77f2c7bdffd3415', '', '1', 1, '2026-02-23 10:35:01', '2026-02-23 10:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `tripy_notification`
--

CREATE TABLE `tripy_notification` (
  `notification_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `notification_message` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tripy_notification`
--

INSERT INTO `tripy_notification` (`notification_id`, `login_id`, `notification_message`, `status`, `created_date`, `updated_date`) VALUES
(1, 1, 'New Ride is Booked', 0, '2024-11-25 16:31:24', '2024-11-25 16:31:24'),
(2, 1, 'New Ride is Booked', 0, '2024-11-25 16:31:24', '2024-11-25 16:31:24'),
(3, 3, 'New Ride is Booked', 0, '2024-11-25 16:35:16', '2024-11-25 16:35:16'),
(4, 1, 'New Ride is Booked', 0, '2024-11-25 16:35:16', '2024-11-25 16:35:16'),
(5, 1, 'New Driver is Register', 0, '2024-11-25 16:45:50', '2024-11-25 16:45:50'),
(59, 2, 'New Ride Allocated', 0, '2024-11-25 17:19:24', '2024-11-25 17:19:24'),
(60, 2, 'Driver Not Approved', 0, '2024-11-25 17:19:29', '2024-11-25 17:19:29'),
(61, 1, 'New Driver is Register', 0, '2024-11-25 17:20:53', '2024-11-25 17:20:53'),
(62, 12, 'Driver Approved', 0, '2024-11-25 17:26:48', '2024-11-25 17:26:48'),
(63, 14, 'Driver Approved', 0, '2024-11-26 16:05:52', '2024-11-26 16:05:52'),
(64, 13, 'Driver Approved', 0, '2024-11-26 16:05:53', '2024-11-26 16:05:53'),
(65, 3, 'Driver Approved', 0, '2024-11-26 16:05:54', '2024-11-26 16:05:54'),
(66, 3, 'New Ride Allocated', 0, '2024-11-26 16:06:52', '2024-11-26 16:06:52'),
(67, 2, 'New Ride Allocated', 0, '2024-11-26 16:06:52', '2024-11-26 16:06:52'),
(68, 2, 'Driver Not Approved', 0, '2024-11-26 16:07:10', '2024-11-26 16:07:10'),
(69, 2, 'Driver Not Approved', 0, '2024-11-26 16:07:16', '2024-11-26 16:07:16'),
(70, 2, 'Driver Approved Successfully', 0, '2024-11-26 16:09:37', '2024-11-26 16:09:37'),
(71, 2, 'Driver Not Approved', 0, '2024-11-26 16:10:01', '2024-11-26 16:10:01'),
(72, 2, 'Driver Approved Successfully', 0, '2024-11-26 16:10:12', '2024-11-26 16:10:12'),
(73, 1, 'Ride Accepted', 0, '2024-11-26 16:23:44', '2024-11-26 16:23:44'),
(74, 3, 'Ride Accepted', 0, '2024-11-26 16:23:44', '2024-11-26 16:23:44'),
(75, 1, 'Ride Closed', 0, '2024-11-26 16:23:58', '2024-11-26 16:23:58'),
(76, 3, 'Ride Closed', 0, '2024-11-26 16:23:58', '2024-11-26 16:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `tripy_ride`
--

CREATE TABLE `tripy_ride` (
  `ride_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `no_of_person` int(11) NOT NULL,
  `trip_user_name` varchar(200) NOT NULL,
  `trip_user_address` varchar(200) NOT NULL,
  `trip_user_phone` bigint(10) NOT NULL,
  `trip_user_email` varchar(200) NOT NULL,
  `trip_user_idproof` varchar(200) NOT NULL,
  `trip_pickup_place` varchar(200) NOT NULL,
  `trip_pickup_time` time NOT NULL,
  `trip_pickup_date` date NOT NULL,
  `trip_drop_place` varchar(200) NOT NULL,
  `trip_drop_time` time NOT NULL,
  `trip_drop_date` date NOT NULL,
  `trip_type` varchar(200) NOT NULL,
  `trip_payment` float(7,3) NOT NULL,
  `payment_success` int(20) NOT NULL DEFAULT 0,
  `ride_approve` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tripy_ride`
--

INSERT INTO `tripy_ride` (`ride_id`, `type_id`, `login_id`, `no_of_person`, `trip_user_name`, `trip_user_address`, `trip_user_phone`, `trip_user_email`, `trip_user_idproof`, `trip_pickup_place`, `trip_pickup_time`, `trip_pickup_date`, `trip_drop_place`, `trip_drop_time`, `trip_drop_date`, `trip_type`, `trip_payment`, `payment_success`, `ride_approve`, `status`, `created_date`, `updated_date`) VALUES
(1, 1, 2, 5, 'rishi', 'kalol', 9313206646, 'spare1294@gmail.com', 'delivery-man.png', 'kalol', '17:26:00', '2024-10-02', 'gandhinagar', '17:29:00', '2024-09-19', 'AC', 19.311, 0, 1, 1, '2024-09-13 11:57:28', '2024-10-16 11:49:52'),
(2, 1, 3, 10, 'rishi', 'kalol', 9313206646, 'spare1294@gmail.com', 'delivery-man.png', 'kalol', '09:32:00', '2024-09-21', 'gandhinagar', '09:35:00', '2024-09-03', 'NON-AC', 15.449, 0, 1, 0, '2024-09-14 04:03:06', '2024-10-24 11:45:05'),
(21, 1, 3, 10, 'rishi', 'kalol', 9313206664665666, 'abc@gmail.com', 'delivery-man.png', 'kalol', '14:22:00', '2024-10-16', 'gandhinagar', '14:22:00', '2024-10-16', 'AC', 19.311, 0, 1, 0, '2024-10-16 08:52:55', '2024-10-24 11:42:23'),
(22, 1, 2, 20, 'Yash Patel', 'kalol', 9223372036854775807, 'abc@gmail.com', 'delivery-man.png', 'kalol', '17:13:00', '2024-10-24', 'ahmedabad', '17:17:00', '2024-10-16', 'AC', 18.183, 0, 1, 1, '2024-10-16 11:43:37', '2024-10-16 11:44:14'),
(23, 1, 2, 566, 'rishi', 'kalol', 456566, 'abc@gmail.com', 'delivery-man.png', 'kalol', '17:19:00', '2024-10-05', 'gandhinagar', '05:19:00', '2024-10-24', 'AC', 19.311, 0, 1, 1, '2024-10-16 11:49:34', '2024-10-16 11:51:35'),
(24, 1, 2, 69, 'rishi', 'kalol', 9346656, 'abc@gmail.com', 'delivery-man.png', 'kalol', '17:26:00', '2024-10-24', 'gandhinagar', '17:29:00', '2024-10-22', 'NON-AC', 15.449, 0, 1, 1, '2024-10-16 11:56:29', '2024-10-16 11:57:00'),
(25, 1, 3, 78987, 'rishi d patel11', 'kalol', 965645, 'abc@gmail.com', 'delivery-man.png', 'kalol', '17:42:00', '2024-10-14', 'rajkot', '17:45:00', '2024-10-18', 'AC', 49.432, 0, 1, 0, '2024-10-16 12:12:30', '2024-10-24 11:34:19'),
(26, 1, 3, 78987, 'rishi d patel', 'kalol', 965645, 'abc@gmail.com', 'delivery-man.png', 'kalol', '17:42:00', '2024-10-14', 'rajkot', '17:45:00', '2024-10-18', 'AC', 49.432, 0, 0, 0, '2024-10-16 12:13:11', '2024-11-25 11:49:38'),
(27, 1, 3, 50, 'reeth', 'fgfh', 324368, 'abc@gmail.com', 'delivery-man.png', 'kalol', '16:30:00', '2024-11-07', 'mumbai', '18:31:00', '2024-11-13', 'AC', 83.440, 0, 0, 0, '2024-11-19 11:01:11', '2024-11-19 11:05:16'),
(28, 2, 1, 20, 'rishi', '196', 65436545, 'abc@gmail.com', 'delivery-man.png', 'kalol', '16:22:00', '2024-11-27', 'gandhinagar', '21:22:00', '2024-11-29', 'AC', 2.833, 0, 1, 1, '2024-11-25 10:52:46', '2024-11-25 11:41:10'),
(29, 2, 1, 20, 'rishi', '196', 65436545, 'abc@gmail.com', 'delivery-man.png', 'kalol', '16:22:00', '2024-11-27', 'gandhinagar', '21:22:00', '2024-11-29', 'AC', 2.833, 0, 1, 1, '2024-11-25 10:53:22', '2024-11-25 11:40:30'),
(30, 1, 1, 3, 'rishi', '196', 333, 'rishikatharotiya8385@gmail.com', 'contact-bg.png', 'kalol', '16:35:00', '2024-11-20', 'gandhinagar', '16:31:00', '2024-11-20', 'NON-AC', 2.266, 0, 0, 1, '2024-11-25 11:01:24', '2024-11-25 11:01:24'),
(31, 1, 3, 3, 'rishi', '196', 333, 'abc@gmail.com', 'delivery-man.png', 'kalol', '19:34:00', '2024-11-06', 'gandhinagar', '16:37:00', '2024-11-12', 'AC', 2.833, 0, 0, 1, '2024-11-25 11:05:16', '2024-11-25 11:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `tripy_role`
--

CREATE TABLE `tripy_role` (
  `role_id` int(11) NOT NULL,
  `role_title` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tripy_role`
--

INSERT INTO `tripy_role` (`role_id`, `role_title`, `status`, `created_date`, `updated_date`) VALUES
(1, 'admin', 1, '2024-07-30 12:10:40', '2024-09-23 10:43:10'),
(2, 'user', 1, '2024-07-30 14:55:42', '2024-09-14 05:33:03'),
(5, 'driver', 1, '2024-07-30 14:59:29', '2026-02-21 12:35:35'),
(13, 'a', 1, '2026-02-22 14:27:15', '2026-02-22 14:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `tripy_type`
--

CREATE TABLE `tripy_type` (
  `type_id` int(11) NOT NULL,
  `type_title` varchar(200) NOT NULL,
  `type_description` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tripy_type`
--

INSERT INTO `tripy_type` (`type_id`, `type_title`, `type_description`, `status`, `created_date`, `updated_date`) VALUES
(1, 'personal', 'mm', 1, '2024-08-07 09:46:22', '2024-09-03 07:41:52'),
(2, 'group', 'g', 1, '2024-08-12 14:57:55', '2024-09-23 10:52:15'),
(3, 'parents', 'pp', 1, '2024-09-03 07:43:46', '2024-09-13 11:36:40'),
(4, 'school_college', 'sc', 1, '2024-09-03 07:43:46', '2024-09-13 11:36:43'),
(11, 'test', '', 1, '2026-01-28 11:07:50', '2026-01-28 11:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `tripy_user`
--

CREATE TABLE `tripy_user` (
  `user_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `user_phone` bigint(10) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `user_id_proof` varchar(11) NOT NULL,
  `user_adhar_card` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tripy_user`
--

INSERT INTO `tripy_user` (`user_id`, `login_id`, `user_phone`, `user_type_id`, `user_id_proof`, `user_adhar_card`, `status`, `created_date`, `updated_date`) VALUES
(1, 3, 93132066465, 1, 'delivery-ma', 'client-1.png', 1, '2024-09-13 11:52:54', '2024-09-13 11:53:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tripy_contact`
--
ALTER TABLE `tripy_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tripy_driver`
--
ALTER TABLE `tripy_driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `tripy_driver_ride`
--
ALTER TABLE `tripy_driver_ride`
  ADD PRIMARY KEY (`driver_ride_id`);

--
-- Indexes for table `tripy_login`
--
ALTER TABLE `tripy_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `tripy_notification`
--
ALTER TABLE `tripy_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `tripy_ride`
--
ALTER TABLE `tripy_ride`
  ADD PRIMARY KEY (`ride_id`);

--
-- Indexes for table `tripy_role`
--
ALTER TABLE `tripy_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tripy_type`
--
ALTER TABLE `tripy_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tripy_user`
--
ALTER TABLE `tripy_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tripy_contact`
--
ALTER TABLE `tripy_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tripy_driver`
--
ALTER TABLE `tripy_driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tripy_driver_ride`
--
ALTER TABLE `tripy_driver_ride`
  MODIFY `driver_ride_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tripy_login`
--
ALTER TABLE `tripy_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tripy_notification`
--
ALTER TABLE `tripy_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tripy_ride`
--
ALTER TABLE `tripy_ride`
  MODIFY `ride_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tripy_role`
--
ALTER TABLE `tripy_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tripy_type`
--
ALTER TABLE `tripy_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tripy_user`
--
ALTER TABLE `tripy_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
