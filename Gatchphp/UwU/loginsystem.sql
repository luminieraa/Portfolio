-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2022 at 01:18 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `graduates`
--

CREATE TABLE `graduates` (
  `recID` int(15) NOT NULL,
  `gradID` int(25) NOT NULL,
  `gradName` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `graduates`
--

INSERT INTO `graduates` (`recID`, `gradID`, `gradName`, `course`, `date`) VALUES
(3, 123457897, 'Kenneth Anniag', 'BSIT', '2022-11-14 00:00:00'),
(1, 184209763, 'Gatchalian Manuel Luis', 'BSIT', '2022-11-14 00:00:00'),
(2, 186785577, 'Sergio Osmenia', 'BSIT', '2021-11-14 00:00:00'),
(4, 190987778, 'Miggy Arevalo', 'BSCS', '2023-11-14 00:00:00'),
(5, 198745697, 'Reynaldo Buesing', 'BSCS', '2024-11-14 00:00:00'),
(6, 205876894, 'Plastina JR', 'BSCS', '2023-11-14 00:00:00'),
(7, 237565385, 'Semacio JR', 'BSCS', '2022-11-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `recID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`recID`, `username`, `password`, `email`) VALUES
(1, 'Registrar', '1234', 'registrar@gmail.com'),
(2, 'test123', 'test123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `graduates`
--
ALTER TABLE `graduates`
  ADD PRIMARY KEY (`gradID`),
  ADD UNIQUE KEY `recID` (`recID`);

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
-- AUTO_INCREMENT for table `graduates`
--
ALTER TABLE `graduates`
  MODIFY `recID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `recID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
