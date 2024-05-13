-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 12:12 PM
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
-- Database: `trip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tripp`
--

CREATE TABLE `tripp` (
  `name` text NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(22) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `other` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tripp`
--

INSERT INTO `tripp` (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES
('Avinash Shelar', 45, 'male', 'avinashshelar1111@gmai', '4575965845', 'kkkkkkkkkkk', '2024-05-13 14:33:39'),
('Avinash Shelar', 45, 'female', 'avinashshelar1@l.com', '4758693214', 'kkkkkkkkk', '2024-05-13 14:37:34'),
('Avinash Shelar', 18, 'male', 'avinash1@gmail.com', '5452369871', 'kkkkkkkkkkkkkkkkkkkkkkk', '2024-05-13 14:44:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tripp`
--
ALTER TABLE `tripp`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
