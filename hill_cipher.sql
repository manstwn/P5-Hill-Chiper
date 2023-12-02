-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 07:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hill_cipher`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil_hill_cipher`
--

CREATE TABLE `hasil_hill_cipher` (
  `id` int(11) NOT NULL,
  `input_text` text DEFAULT NULL,
  `key` text DEFAULT NULL,
  `mode` varchar(10) DEFAULT NULL,
  `result` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_hill_cipher`
--

INSERT INTO `hasil_hill_cipher` (`id`, `input_text`, `key`, `mode`, `result`) VALUES
(33, 'DINA', '51 15 53 12', 'encrypt', 'NVNN'),
(34, 'NVNN', '51 15 53 12', 'decrypt', 'DINA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_hill_cipher`
--
ALTER TABLE `hasil_hill_cipher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_hill_cipher`
--
ALTER TABLE `hasil_hill_cipher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
