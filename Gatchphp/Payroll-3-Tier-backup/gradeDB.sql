-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 06:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gradedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `recID` int(11) NOT NULL,
  `studNo` varchar(10) NOT NULL,
  `subjCode` varchar(10) NOT NULL,
  `gradeCS` float NOT NULL,
  `gradeExam` float NOT NULL,
  `gradeFinal` float NOT NULL,
  `Remark` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `RecID` int(11) NOT NULL,
  `StudNo` varchar(12) NOT NULL,
  `Last` varchar(15) NOT NULL,
  `First` varchar(15) NOT NULL,
  `MI` varchar(3) NOT NULL,
  `Course` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`RecID`, `StudNo`, `Last`, `First`, `MI`, `Course`) VALUES
(11, 'S-001', 'Jordan', 'Michael', 'J.', 'BSCS'),
(12, 'S-002', 'Duncan', 'Tim', 'A.', 'BSCS'),
(10, 'S-003', 'Santos', 'Albert', 'A.', 'BSIT'),
(9, 'S-004', 'Paras', 'Benjie', 'Z.', 'BSIT'),
(7, 'S-005', 'Vallespin', 'JuanA', 'A.', 'BSCS');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `recID` int(11) NOT NULL,
  `subjCode` varchar(15) NOT NULL,
  `subjDesc` varchar(50) NOT NULL,
  `units` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`recID`, `subjCode`, `subjDesc`, `units`) VALUES
(1, 'CSIT 1101', 'Computer Programming 1 Lec', 2),
(2, 'GEE 1000', 'Living in the I.T. Era Lec', 2),
(3, 'CSIT 1101L', 'Computer Programming 1 Lab', 1),
(4, 'GEE 1000L', 'Living in the I.T. Era Lab', 1),
(5, 'CSIT 1102', 'Computer Programming 2 Lec', 2),
(6, 'CSIT 1102L', 'Computer Programming 2 Lab', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `recID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`recID`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'na'),
(2, 'u123456', 'u123456', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`studNo`),
  ADD UNIQUE KEY `recID` (`recID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudNo`),
  ADD UNIQUE KEY `RecID` (`RecID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`recID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `recID` (`recID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `recID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `RecID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `recID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
