-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 03:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `workshop_enroll`
--

CREATE TABLE `workshop_enroll` (
  `USN` varchar(25) NOT NULL,
  `w_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workshop_enroll`
--

INSERT INTO `workshop_enroll` (`USN`, `w_id`) VALUES
('4SF21CS004', 'W1'),
('4SF21CS016', 'W2'),
('4SF21CS018', 'W3'),
('4SF21CS032', 'W2'),
('4SF21CS037', 'W1'),
('4SF21CS044', 'W1'),
('4SF21CS069', 'W3'),
('4SF21CS079', 'W2'),
('4SF21CS191', 'W1'),
('4SF22CS416', 'W3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `workshop_enroll`
--
ALTER TABLE `workshop_enroll`
  ADD PRIMARY KEY (`USN`,`w_id`),
  ADD KEY `idx_USN` (`USN`),
  ADD KEY `idx_w_id` (`w_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
