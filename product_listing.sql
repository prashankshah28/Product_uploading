-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2019 at 05:01 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.1.30-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_listing`
--

CREATE TABLE `product_listing` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_batchdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_listing`
--

INSERT INTO `product_listing` (`id`, `p_name`, `p_quantity`, `p_price`, `p_batchdate`) VALUES
(43, 'Lux', 10, 1000, '2019-07-23'),
(44, 'lifeboy', 20, 2100, '2019-07-31'),
(45, 'patanjali', 28, 303, '2019-07-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_listing`
--
ALTER TABLE `product_listing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_listing`
--
ALTER TABLE `product_listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
