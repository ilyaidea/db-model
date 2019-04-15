-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2019 at 07:00 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `currency`
--

-- --------------------------------------------------------

--
-- Table structure for table `ilya_currency`
--

CREATE TABLE `ilya_currency` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(45) NOT NULL,
  `position` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ilya_currency_category`
--

CREATE TABLE `ilya_currency_category` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `parent_id` smallint(5) UNSIGNED DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ilya_currency_category_map`
--

CREATE TABLE `ilya_currency_category_map` (
  `id` int(10) UNSIGNED NOT NULL,
  `currency_id` smallint(5) UNSIGNED NOT NULL,
  `category_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ilya_currency_price`
--

CREATE TABLE `ilya_currency_price` (
  `id` int(10) UNSIGNED NOT NULL,
  `currency_id` smallint(5) UNSIGNED NOT NULL,
  `price` varchar(45) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ilya_currency`
--
ALTER TABLE `ilya_currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ilya_currency_category`
--
ALTER TABLE `ilya_currency_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `ilya_currency_category_map`
--
ALTER TABLE `ilya_currency_category_map`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currency_id` (`currency_id`),
  ADD KEY `category_id` (`category_id`);

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
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ilya_currency_category`
--
ALTER TABLE `ilya_currency_category`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ilya_currency_category_map`
--
ALTER TABLE `ilya_currency_category_map`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ilya_currency_price`
--
ALTER TABLE `ilya_currency_price`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ilya_currency_category`
--
ALTER TABLE `ilya_currency_category`
  ADD CONSTRAINT `fk_currency_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `ilya_currency_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `ilya_currency_category_map`
--
ALTER TABLE `ilya_currency_category_map`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `ilya_currency_category` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_currency_id` FOREIGN KEY (`currency_id`) REFERENCES `ilya_currency` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ilya_currency_price`
--
ALTER TABLE `ilya_currency_price`
  ADD CONSTRAINT `fk_currency_price_id` FOREIGN KEY (`currency_id`) REFERENCES `ilya_currency` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
