-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 08:01 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-model`
--

-- --------------------------------------------------------

--
-- Table structure for table `ilya_currency`
--

CREATE TABLE `ilya_currency` (
  `id` mediumint(5) UNSIGNED NOT NULL,
  `category_id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `position` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `created` int(10) UNSIGNED DEFAULT NULL,
  `modified` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ilya_currency`
--

INSERT INTO `ilya_currency` (`id`, `category_id`, `title`, `description`, `position`, `created`, `modified`) VALUES
(1, 6, 'دلار کانادا', NULL, 1, 1555392939, NULL),
(2, 7, 'طلای 18 عیار', NULL, 1, 1555392949, NULL),
(5, 6, 'یورو', NULL, 1, 1555392959, NULL),
(6, 6, 'لیر', NULL, 1, 1555392969, NULL),
(7, 6, 'ین چین', NULL, 1, 1555392979, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ilya_currency_category`
--

CREATE TABLE `ilya_currency_category` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `parent_id` smallint(5) UNSIGNED DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `position` smallint(5) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ilya_currency_category`
--

INSERT INTO `ilya_currency_category` (`id`, `parent_id`, `title`, `description`, `position`) VALUES
(6, NULL, 'ارز', NULL, 1),
(7, NULL, 'طلا', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ilya_currency_price`
--

CREATE TABLE `ilya_currency_price` (
  `id` int(10) UNSIGNED NOT NULL,
  `currency_id` mediumint(5) UNSIGNED NOT NULL,
  `price` decimal(10,0) UNSIGNED NOT NULL,
  `created` int(10) UNSIGNED NOT NULL,
  `modified` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ilya_currency_price`
--

INSERT INTO `ilya_currency_price` (`id`, `currency_id`, `price`, `created`, `modified`) VALUES
(1, 1, '14000', 1555129800, 9),
(2, 2, '44000', 1555398725, NULL),
(3, 5, '15000', 1555398800, NULL),
(4, 6, '2000', 1555394825, NULL),
(5, 1, '15000', 1555133400, 10),
(6, 2, '55000', 1555398625, NULL),
(7, 2, '33000', 1555398525, NULL),
(8, 1, '16000', 1555136700, 1055),
(9, 1, '17000', 1555172700, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ilya_currency`
--
ALTER TABLE `ilya_currency`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `ilya_currency_category`
--
ALTER TABLE `ilya_currency_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `ilya_currency_price`
--
ALTER TABLE `ilya_currency_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currency_id` (`currency_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ilya_currency`
--
ALTER TABLE `ilya_currency`
  MODIFY `id` mediumint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ilya_currency_category`
--
ALTER TABLE `ilya_currency_category`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ilya_currency_price`
--
ALTER TABLE `ilya_currency_price`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ilya_currency`
--
ALTER TABLE `ilya_currency`
  ADD CONSTRAINT `fk1_ilya_currency` FOREIGN KEY (`category_id`) REFERENCES `ilya_currency_category` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ilya_currency_category`
--
ALTER TABLE `ilya_currency_category`
  ADD CONSTRAINT `fk1_ilya_currency_category` FOREIGN KEY (`parent_id`) REFERENCES `ilya_currency_category` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ilya_currency_price`
--
ALTER TABLE `ilya_currency_price`
  ADD CONSTRAINT `fk1_ilya_currency_price` FOREIGN KEY (`currency_id`) REFERENCES `ilya_currency` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
