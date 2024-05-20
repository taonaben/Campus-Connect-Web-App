-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 10:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `house_id` int(11) NOT NULL,
  `admin_id` int(255) NOT NULL,
  `address` varchar(80) NOT NULL,
  `location` varchar(80) NOT NULL,
  `price` int(20) NOT NULL,
  `distance` int(5) NOT NULL,
  `add_info` varchar(500) NOT NULL,
  `img1` mediumblob NOT NULL,
  `img2` mediumblob NOT NULL,
  `img3` mediumblob NOT NULL,
  `img4` mediumblob NOT NULL,
  `img5` mediumblob NOT NULL,
  `img6` mediumblob NOT NULL,
  `img7` mediumblob NOT NULL,
  `water_tank` tinyint(1) NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `solar_backup` tinyint(1) NOT NULL,
  `security` tinyint(1) NOT NULL,
  `caretaker` tinyint(1) NOT NULL,
  `single` tinyint(1) NOT NULL,
  `double_room` tinyint(1) NOT NULL,
  `3_sharing` tinyint(1) NOT NULL,
  `other` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `phone_number`, `password`, `user_type`) VALUES
(1, 'Taona Munikwa', 'taonbenjamin180903@gmail.com', 781830006, '$2y$10$f360q6/iLpOQpBkiPECM3ONNd1/RLOm2E2.b1GECJ0vfguc0GrBTK', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`house_id`),
  ADD KEY `fk_admin_id` (`admin_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `house_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `fk_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `user_form` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
