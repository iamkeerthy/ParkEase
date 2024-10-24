-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 07:41 AM
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
-- Database: `parkease`
--

-- --------------------------------------------------------

--
-- Table structure for table `parking_spaces`
--

CREATE TABLE `parking_spaces` (
  `id` int(11) NOT NULL,
  `space_number` varchar(10) NOT NULL,
  `is_available` tinyint(1) DEFAULT 1,
  `price_per_hour` decimal(5,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parking_spaces`
--

INSERT INTO `parking_spaces` (`id`, `space_number`, `is_available`, `price_per_hour`, `created_at`, `updated_at`) VALUES
(1, 'A1', 1, 2.50, '2024-07-28 04:18:07', '2024-07-28 04:18:07'),
(2, 'A2', 1, 2.50, '2024-07-28 04:18:07', '2024-07-28 04:18:07'),
(3, 'A3', 0, 2.50, '2024-07-28 04:18:07', '2024-07-28 04:18:07'),
(4, 'B1', 1, 3.00, '2024-07-28 04:18:07', '2024-07-28 04:18:07'),
(5, 'B2', 0, 3.00, '2024-07-28 04:18:07', '2024-07-28 04:18:07'),
(6, 'B3', 1, 3.00, '2024-07-28 04:18:07', '2024-07-28 04:18:07'),
(7, 'C1', 1, 3.50, '2024-07-28 04:18:07', '2024-07-28 04:18:07'),
(8, 'C2', 1, 3.50, '2024-07-28 04:18:07', '2024-07-28 04:18:07'),
(9, 'C3', 0, 3.50, '2024-07-28 04:18:07', '2024-07-28 04:18:07'),
(11, 'D1', 0, 4.00, '2024-07-28 04:33:10', '2024-07-28 04:33:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parking_spaces`
--
ALTER TABLE `parking_spaces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parking_spaces`
--
ALTER TABLE `parking_spaces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
