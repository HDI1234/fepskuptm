-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 09:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fepskuptm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(12) NOT NULL,
  `username` varchar(122) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `paper_id` int(12) NOT NULL,
  `title` varchar(225) NOT NULL,
  `course` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  `faculty` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `file_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`paper_id`, `title`, `course`, `year`, `faculty`, `type`, `file_name`) VALUES
(1, 'Data', 'NEt404', 2019, 'FCOM', 'Final', ''),
(2, 'Data Structure', 'NEt404', 2019, 'FCOM', 'Final', 'Basic_LR2.pdf'),
(3, 'Data Structure', 'NEt404', 2019, 'FCOM', 'Final', 'Basic_LR_(1).pdf'),
(4, 'Azf', 'asdsad', 2019, 'FCOM', 'Final', 'WTCMY54132704.pdf'),
(5, 'Azf', 'asdsad', 2019, 'FCOM', 'Final', 'WTCMY541327041.pdf'),
(6, 'asdasd', 'asdasd', 2019, 'FBASS', 'Final', 'WTCMY541327042.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(12) NOT NULL,
  `full_name` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `faculty` varchar(200) NOT NULL,
  `last_login` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `full_name`, `password`, `email`, `course`, `faculty`, `last_login`, `status`) VALUES
('AM0101005016', 'Adam Ibrahim Bin Jamaludin', '4297f44b13955235245b2497399d7a93', 'kl1901005016@student.kuptm.edu.my', 'BE202', 'IGS', '', 'pending'),
('AM0301005016', 'Adam Ibrahim Bin Jamaludin', '4297f44b13955235245b2497399d7a93', 'kl1901005016@student.kuptm.edu.my', 'CC101', 'FEHA', '', 'pending'),
('AM0601005016', 'Adam Ibrahim Bin Jamaludin', '4297f44b13955235245b2497399d7a93', 'KL1901005016@student.kuptm.edu.my', 'ACCA', 'IGS', '', 'pending'),
('AM0701005016', 'Adam Ibrahim Bin Jamaludin', '4297f44b13955235245b2497399d7a93', 'KL1901005016@student.kuptm.edu.my', 'CT205', 'IGS', '', 'pending'),
('AM1001005016', 'Adam Ibrahim Bin Jamaludin', '4297f44b13955235245b2497399d7a93', 'KL1901005016@student.kuptm.edu.my', 'ACCA', 'FCOM', '', 'pending'),
('AM1901005016', 'Adam Ibrahim Bin Jamaludin', '4297f44b13955235245b2497399d7a93', 'KL1901005016@student.kuptm.edu.my', 'ACCA', 'FEHA', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `username` varchar(225) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `username`, `created`) VALUES
(26, 'f3ff0dd9955ab1c28a68da7c9522e1', '1', '0000-00-00'),
(27, '2095f6a681b1ae687b50b76dc0472d', '0', '0000-00-00'),
(28, '3e22f8752d052332b53eecb32a9d2b', 'AM0101005016', '0000-00-00'),
(29, '9f23b86d9d215e383a120f0735387d', 'AM0601005016', '0000-00-00'),
(30, 'c61cd46433600c879507e8f87f2e75', 'AM0701005016', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `paper_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
