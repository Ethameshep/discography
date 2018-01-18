-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2018 at 08:20 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discography`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_list`
--

CREATE TABLE `email_list` (
  `Email_ID` mediumint(8) UNSIGNED NOT NULL,
  `Email_address` varchar(255) NOT NULL,
  `First_name` text NOT NULL,
  `Last_name` text,
  `Birth_month` tinyint(2) UNSIGNED DEFAULT '0',
  `Birth_day` tinyint(2) UNSIGNED DEFAULT '0',
  `Birth_year` smallint(4) UNSIGNED DEFAULT '0',
  `Address` text,
  `City` text,
  `State` varchar(2) DEFAULT NULL,
  `ZIP` smallint(10) UNSIGNED DEFAULT NULL,
  `Format` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_list`
--

INSERT INTO `email_list` (`Email_ID`, `Email_address`, `First_name`, `Last_name`, `Birth_month`, `Birth_day`, `Birth_year`, `Address`, `City`, `State`, `ZIP`, `Format`) VALUES
(2, 'email@email.com', 'Bob', 'Robert', 1, 1, 2017, '123 Main St.', 'Mayberry', 'AL', 12345, 'HTML');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_list`
--
ALTER TABLE `email_list`
  ADD PRIMARY KEY (`Email_ID`,`Email_address`),
  ADD UNIQUE KEY `Emails` (`Email_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_list`
--
ALTER TABLE `email_list`
  MODIFY `Email_ID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
