-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 09:31 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dream_house`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `rented_user_id` int(11) NOT NULL,
  `tenant_user_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `detials` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'false',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `replay` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `rented_user_id`, `tenant_user_id`, `house_id`, `detials`, `status`, `create_at`, `replay`) VALUES
(1, 7, 10, 14, 'اريد اعلان 1', 'pending', '2024-11-06 17:51:05', ''),
(2, 7, 9, 14, 'اريد اعلان 1', 'pending', '2024-11-06 17:52:03', ''),
(3, 7, 10, 14, 'اريد اعلان 1', 'pending', '2024-11-06 17:52:32', ''),
(4, 7, 10, 14, 'اريد اعلان 1', 'pending', '2024-11-06 18:02:33', '');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `distance` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `link_google_map` varchar(255) NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `title`, `price`, `distance`, `description`, `location`, `link_google_map`, `create_at`, `user_id`, `status`) VALUES
(14, 'عنوان 1', '90 الف', '300 متر مربع', 'الوصف', 'الرياض', 'https://maps.app.goo.gl/9XJvJAJS8uYaHmxp8', '2024-11-06 08:37:35', 7, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `house_images`
--

CREATE TABLE `house_images` (
  `id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house_images`
--

INSERT INTO `house_images` (`id`, `house_id`, `image`) VALUES
(16, 14, 'Screenshot (2).png'),
(17, 14, 'Screenshot (10).png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `phone`, `email`, `password`, `user_type`) VALUES
(7, 'علي', 'حسن', '0587678987', 'h3d@gmail.com', '$2y$10$lysDJQXiv.d/DZ/P2M/7x.CRTncMj2SZHJq44fqNjzsgWC46bm3Oi', 'rented_user'),
(8, 'المؤجر محمد', 'علي', '0587678966', 'r@gmail.com', '$2y$10$KRfhtC4bFuM9RFzfZpuA4uXsnLVsRZKxLyate09Kogq5CVd95M0Ge', 'rented_user'),
(9, 'المستاجر سعود', 'صالح', '0587678955', 't@gmail.com', '$2y$10$mXMcViMh1EDh2XB8tojKI.lglD64UG1bCkpdrFPm89vYV9.KXAYIq', 'rented_user'),
(10, 'مستاجر يوسف', 'احمد', '0587678950', 'y@gmail.com', '$2y$10$MlVinX0YGQUws.hGJNGnEegtXDZ4f5tM0yFh1.LMvxc24JUWOEOOa', 'tenant_user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rented_user_id` (`rented_user_id`),
  ADD KEY `tenant_user_id` (`tenant_user_id`),
  ADD KEY `house_id` (`house_id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `house_images`
--
ALTER TABLE `house_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_id` (`house_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `house_images`
--
ALTER TABLE `house_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`rented_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`tenant_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `houses`
--
ALTER TABLE `houses`
  ADD CONSTRAINT `houses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `house_images`
--
ALTER TABLE `house_images`
  ADD CONSTRAINT `house_images_ibfk_1` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
