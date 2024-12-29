-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2024 at 06:01 AM
-- Server version: 10.4.28-MariaDB-log
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bluebuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `penjuallogin`
--

CREATE TABLE `penjuallogin` (
  `Id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjuallogin`
--

INSERT INTO `penjuallogin` (`Id`, `username`, `password`, `created_at`, `email`, `nama`) VALUES
(1, 'ronisntr', '1234', '2024-12-25 04:48:11', '', ''),
(9, 'aw', '$2y$10$awQu7YdUn.XZuEUZH4oZsuxioGsB.QEPGq5FiyGPm8k', '0000-00-00 00:00:00', 'aw@aw.com', 'aa'),
(10, 'root', '$2y$10$LQwCirYjQjNfE2GHEIbN5ukBEN3izn2uD1r6yLn4/Ml', '0000-00-00 00:00:00', 'mmuadzalchairi@gmail.com', 'ilham god'),
(11, 'muadz', '1234', '2024-12-29 05:09:22', 'muadz@gmail.com', 'muadzzz'),
(12, 'tes', '$2y$10$z2dFqzxTA/njpWvSs9v8XO0GEi1yeQD6niZhoBDPq1e8Y1pqkayjy', '0000-00-00 00:00:00', 'test@gmail.com', 'tes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penjuallogin`
--
ALTER TABLE `penjuallogin`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penjuallogin`
--
ALTER TABLE `penjuallogin`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
