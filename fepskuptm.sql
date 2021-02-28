-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 08:10 AM
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
(2, 'Data Structure', 'NEt404', 2019, 'FCOM', 'Final', 'Basic_LR2.pdf'),
(3, 'Data Structure', 'NEt404', 2019, 'FCOM', 'Final', 'Basic_LR_(1).pdf'),
(4, 'Azf', 'asdsad', 2019, 'FCOM', 'Final', 'WTCMY54132704.pdf'),
(5, 'Azf', 'asdsad', 2019, 'FCOM', 'Final', 'WTCMY541327041.pdf'),
(6, 'asdasd', 'asdasd', 2019, 'FBASS', 'Final', 'WTCMY541327042.pdf'),
(7, 'Final Year Project', 'FYP101', 2019, 'FCOM', 'Midterm', 'FYP123.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(12) NOT NULL,
  `student_id` varchar(12) NOT NULL,
  `full_name` varchar(225) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `faculty` varchar(200) NOT NULL,
  `last_login` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_id`, `full_name`, `password`, `email`, `course`, `faculty`, `last_login`, `status`) VALUES
(17, 'AM1901005016', 'Adam Ibrahim Bin Jamaludin', 'sha256:1000:3NcHKC2ad5TBLOLw2+/C6u8Cby+de43u:4QT10OXZEtYz8tonjmrOh2Y1n9y9FVQo', 'kl1901005016@student.kuptm.edu.my', 'ACCA', 'FEHA', '2021-02-26 07:36:02 PM', 'approved'),
(18, 'AM1901005042', 'Mohamad Azim Bin Abd Kadir', 'sha256:1000:04AqnFTu0D6ePkaWe+PeuNRECgbWa4FS:h1fmVqI5ZSJxJ0m3o+g54sGAKZEPf8EL', 'kl1901005042@student.kuptm.edu.my', 'CT205', 'FCOM', '2021-02-28 07:35:21 AM', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `created`) VALUES
(73, '815af2f309f327b145207ed0f5a815', 16, '2021-02-26'),
(74, '4c0c1837fb4badb53c070eed425bdf', 17, '2021-02-26'),
(75, '0acb8290b3a4cb4904060de6b2c4c1', 17, '2021-02-26'),
(76, 'a0578a772fde4a0692ba95a9c600f6', 18, '2021-02-28');

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
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

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
  MODIFY `paper_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
