-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 12:44 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `productentry`
--

CREATE TABLE `productentry` (
  `id` int(200) NOT NULL,
  `productPhoto` varchar(50) NOT NULL,
  `productType` varchar(5) NOT NULL,
  `description` varchar(200) NOT NULL,
  `originalPrice` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productentry`
--

INSERT INTO `productentry` (`id`, `productPhoto`, `productType`, `description`, `originalPrice`, `price`, `rating`) VALUES
(68, 'nike.png', 'nike', '43cm', 2233, 23232, 5),
(69, 'nike.png', 'nike', '43cm', 4999, 4000, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productentry`
--
ALTER TABLE `productentry`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productentry`
--
ALTER TABLE `productentry`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
