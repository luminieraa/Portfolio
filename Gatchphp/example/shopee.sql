-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2022 at 07:55 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopee`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cart_id` int NOT NULL,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`) VALUES
(7, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order1`
--

DROP TABLE IF EXISTS `order1`;
CREATE TABLE `order1` (
  `order_id` int NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_email` varchar(255) NOT NULL,
  `order_contact` varchar(255) NOT NULL,
  `order_productorders` varchar(255) NOT NULL,
  `order_producttotal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order1`
--

INSERT INTO `order1` (`order_id`, `order_name`, `order_address`, `order_email`, `order_contact`, `order_productorders`, `order_producttotal`) VALUES
(10, 'Sheldon Cooper', '818 Chapel View Rd Green Bay, Wisconsin(WI),', 'shelly_cooper@adwdw.coamd', '41242545', 'Redmi Note', '122.00'),
(20, 'Sheldon Cooper', '818 Chapel View Rd Green Bay, Wisconsin(WI),', 'shelly_cooper@adwdw.coamd', '41242545', 'Apple iPhone 6', '152.00'),
(21, 'Cotton Bol', '140 Central Ave Aurora, Illinois(IL), 60506', 'cotton@yc.vom', '+446303017853', 'Redmi Note', '122.00'),
(22, 'Cotton Bol', '140 Central Ave Aurora, Illinois(IL), 60506', 'cotton@yc.vom', '+446303017853', 'Apple iPhone 7', '152.00'),
(23, 'Cotton Bol', '140 Central Ave Aurora, Illinois(IL), 60506', 'cotton@yc.vom', '+446303017853', 'Apple iPhone 7', '152.00'),
(24, 'Cotton Bol', '140 Central Ave Aurora, Illinois(IL), 60506', 'cotton@yc.vom', '+446303017853', 'Apple iPhone 7', '152.00'),
(25, 'Jake Peralta', '206 Armada Ct Joppa, Maryland(MD)', 'jakey.com', '4439229151', 'Apple iPhone 7', '152.00'),
(34, 'Sheldon Cooper', '818 Chapel View Rd Green Bay, Wisconsin(WI),', 'shelly_cooper@adwdw.coamd', '41242545', 'Redmi Note 6', '122.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `item_id` int NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
(1, 'Samsung', 'Samsung Galaxy 10', 152.00, '1.png', '2020-03-28 11:08:57'),
(2, 'Redmi', 'Redmi Note 7', 122.00, '2.png', '2020-03-28 11:08:57'),
(3, 'Redmi', 'Redmi Note 6', 122.00, '3.png', '2020-03-28 11:08:57'),
(4, 'Redmi', 'Redmi Note 5', 122.00, '4.png', '2020-03-28 11:08:57'),
(5, 'Redmi', 'Redmi Note 4', 122.00, '5.png', '2020-03-28 11:08:57'),
(6, 'Redmi', 'Redmi Note 8', 122.00, '6.png', '2020-03-28 11:08:57'),
(7, 'Redmi', 'Redmi Note 9', 122.00, '8.png', '2020-03-28 11:08:57'),
(8, 'Redmi', 'Redmi Note', 122.00, '10.png', '2020-03-28 11:08:57'),
(9, 'Samsung', 'Samsung Galaxy S6', 152.00, '11.png', '2020-03-28 11:08:57'),
(10, 'Samsung', 'Samsung Galaxy S7', 152.00, '12.png', '2020-03-28 11:08:57'),
(11, 'Apple', 'Apple iPhone 5', 152.00, '13.png', '2020-03-28 11:08:57'),
(12, 'Apple', 'Apple iPhone 6', 152.00, '14.png', '2020-03-28 11:08:57'),
(13, 'Apple', 'Apple iPhone 7', 152.00, '15.png', '2020-03-28 11:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `id` int NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  `contactnumber` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fullname`, `address1`, `emailaddress`, `contactnumber`, `username`, `password1`) VALUES
(2, 'Cotton Bol', '140 Central Ave Aurora, Illinois(IL), 60506', 'cotton@yc.vom', '+446303017853', 'Cotton', 'Cotton'),
(5, 'Jake Peralta', '206 Armada Ct Joppa, Maryland(MD)', 'jakey.com', '4439229151', 'Jake', 'Jake'),
(6, 'Sheldon Cooper', '818 Chapel View Rd Green Bay, Wisconsin(WI),', 'shelly_cooper@adwdw.coamd', '41242545', 'sheldon', 'sheldon');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `roles_id` int NOT NULL,
  `roles_name` varchar(255) NOT NULL,
  `roles_pass` varchar(255) NOT NULL,
  `roles_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roles_id`, `roles_name`, `roles_pass`, `roles_role`) VALUES
(1, 'Admin', 'Admin', 'Admin'),
(3, 'Amy', 'Amy', 'Editor'),
(6, 'Jakey', 'Jakey', 'Editor'),
(7, 'Cotton', 'Cotton', 'Admin'),
(8, 'Umaru', 'Umaru', 'Admin'),
(9, 'Umaru', 'Umaru', 'Admin'),
(10, 'Kichi', 'Kichi', 'Editor'),
(11, 'Hotelier', 'Hotelier', 'Editor'),
(12, 'shelly1', 'shelly1', 'Admin'),
(13, 'haduca', 'haduca', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `register_date`) VALUES
(1, 'Daily', 'Tuition', '2020-03-28 13:07:17'),
(2, 'Akshay', 'Kashyap', '2020-03-28 13:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `cart_id` int NOT NULL,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `order1`
--
ALTER TABLE `order1`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roles_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order1`
--
ALTER TABLE `order1`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roles_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
