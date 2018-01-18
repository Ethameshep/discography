-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2018 at 08:13 PM
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
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `album_id` tinyint(2) UNSIGNED NOT NULL,
  `album_title` varchar(50) NOT NULL,
  `album_cover` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`album_id`, `album_title`, `album_cover`) VALUES
(1, 'Foo Fighters', 'album1.jpg'),
(2, 'The Colour and the Shape', 'album2.jpg'),
(3, 'There is Nothing Left to Lose', 'album3.jpg'),
(4, 'One by One', 'album4.jpg'),
(5, 'In Your Honor', 'album5.jpg'),
(6, 'Echoes, Silence, Patience & Grace', 'album6.jpg'),
(7, 'Wasting Light', 'album7.jpg'),
(8, 'Sonic Highways', 'album8.jpg'),
(9, 'Concrete and Gold', 'album9.jpg');

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

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_name` varchar(50) NOT NULL,
  `member_role` varchar(50) NOT NULL,
  `member_picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_name`, `member_role`, `member_picture`) VALUES
('Chris Shiflett', 'Lead Guitar, Backing Vocals', 'shiflett.jpg'),
('Dave Grohl', 'Lead Vocalist, Rhythm Guitar', 'grohl.jpg'),
('Nate Mendel', 'Bass', 'mendel.jpg'),
('Pat Smear', 'Rhythm and Lead Guitar', 'smear.jpg'),
('Rami Jaffee', 'Keyboards, Organ', 'jaffee.jpg'),
('Taylor Hawkins', 'Drums, Percussion, Backing Vocals', 'hawkins.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `album_id` tinyint(2) UNSIGNED NOT NULL,
  `track_num` tinyint(2) UNSIGNED NOT NULL,
  `track_title` varchar(50) NOT NULL,
  `track_length` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`album_id`, `track_num`, `track_title`, `track_length`) VALUES
(1, 1, 'This is a Call', '3:53'),
(1, 2, 'I\'ll Stick Around', '3:52'),
(1, 3, 'Big Me', '2:12'),
(1, 4, 'Alone + Easy Target', '4:05'),
(1, 5, 'Good Grief ', '4:01'),
(1, 6, 'Floaty', '4:30'),
(1, 7, 'Weenie Beenie', '2:46'),
(1, 8, 'Oh, George', '3:00'),
(1, 9, 'For All the Cows', '3:00'),
(1, 10, 'X-Static', '4:13'),
(1, 11, 'Wattershed', '2:16'),
(1, 12, 'Exhausted', '5:45'),
(2, 1, 'Doll', '1:23'),
(2, 2, 'Monkey Wrench', '3:51'),
(2, 3, 'Hey, Johnny Park!', '4:08'),
(2, 4, 'My Poor Brain', '3:33'),
(2, 5, 'Wind Up', '2:32'),
(2, 6, 'Up in Arms', '2:15'),
(2, 7, 'My Hero', '4:20'),
(2, 8, 'See You', '2:26'),
(2, 9, 'Enough Space', '2:37'),
(2, 10, 'February Stars', '4:49'),
(2, 11, 'Everlong', '4:10'),
(2, 12, 'Walking After You', '5:03'),
(2, 13, 'New Way Home', '5:40'),
(3, 1, 'Stacked Actors', '4:17'),
(3, 2, 'Breakout', '3:21'),
(3, 3, 'Learn to Fly', '3:58'),
(3, 4, 'Gimme Stitches', '3:42'),
(3, 5, 'Generator', '3:48'),
(3, 6, 'Aurora', '5:49'),
(3, 7, 'Live-In Skin', '3:52'),
(3, 8, 'Next Year', '4:37'),
(3, 9, 'Headwires', '4:37'),
(3, 10, 'Ain\'t It the Life', '4:15'),
(3, 11, 'M.I.A.', '4:03'),
(4, 1, 'All My Life', '4:23'),
(4, 2, 'Low', '4:28'),
(4, 3, 'Have It All', '4:58'),
(4, 4, 'Times Like These', '4:26'),
(4, 5, 'Disenchanted Lullaby', '4:33'),
(4, 6, 'Tired of You', '5:12'),
(4, 7, 'Halo', '5:06'),
(4, 8, 'Lonely as You', '4:37'),
(4, 9, 'Overdrive', '4:30'),
(4, 10, 'Burn Away', '4:59'),
(4, 11, 'Come Back', '7:49'),
(5, 1, 'In Your Honor', '3:50'),
(5, 2, 'No Way Back', '3:17'),
(5, 3, 'Best of You', '4:16'),
(5, 4, 'DOA', '4:12'),
(5, 5, 'Hell', '1:57'),
(5, 6, 'The Last Song', '3:19'),
(5, 7, 'Free Me', '4:39'),
(5, 8, 'Resolve', '4:49'),
(5, 9, 'The Deepest Blues Are Black', '3:58'),
(5, 10, 'End Over End', '5:52'),
(5, 11, 'Still', '5:15'),
(5, 12, 'What If I Do?', '5:02'),
(5, 13, 'Miracle', '3:29'),
(5, 14, 'Another Round', '4:25'),
(5, 15, 'Friend of a Friend', '3:13'),
(5, 16, 'Over and Out', '5:16'),
(5, 17, 'On the Mend', '4:31'),
(5, 18, 'Virginia Moon', '3:49'),
(5, 19, 'Cold Day in the Sun', '3:20'),
(5, 20, 'Razor', '4:53'),
(6, 1, 'The Pretender', '4:29'),
(6, 2, 'Let It Die', '4:05'),
(6, 3, 'Erase/Replace', '4:13'),
(6, 4, 'Long Road to Ruin', '3:44'),
(6, 5, 'Come Alive', '5:10'),
(6, 6, 'Stranger Things Have Happened', '5:21'),
(6, 7, 'Cheer Up, Boys (Your Make Up is Running)', '3:41'),
(6, 8, 'Summer\'s End', '4:37'),
(6, 9, 'Ballad of the Beaconsfield Miners', '2:32'),
(6, 10, 'Statues', '3:47'),
(6, 11, 'But, Honestly', '4:35'),
(6, 12, 'Home ', '4:52'),
(7, 1, 'Bridge Burning', '4:46'),
(7, 2, 'Rope', '4:19'),
(7, 3, 'Dear Rosemary', '4:26'),
(7, 4, 'White Limo', '3:22'),
(7, 5, 'Arlandria', '4:28'),
(7, 6, 'These Days', '4:58'),
(7, 7, 'Back & Forth', '3:52'),
(7, 8, 'A Matter of Time', '4:36'),
(7, 9, 'Miss the Misery', '4:33'),
(7, 10, 'I Should Have Known', '4:15'),
(7, 11, 'Walk', '4:16'),
(8, 1, 'Something from Nothing', '4:49'),
(8, 2, 'The Feast and the Famine', '3:50'),
(8, 3, 'Congregation', '5:12'),
(8, 4, 'What Did I Do?/God as My Witness', '5:44'),
(8, 5, 'Outside', '5:15'),
(8, 6, 'In the Clear', '4:04'),
(8, 7, 'Subterranean', '6:08'),
(8, 8, 'I Am a River', '7:09'),
(9, 1, 'T-Shirt', '1:22'),
(9, 2, 'Run', '5:23'),
(9, 3, 'Make It Right', '4:39'),
(9, 4, 'The Sky Is a Neighborhood', '4:04'),
(9, 5, 'La Dee Da', '4:02'),
(9, 6, 'Dirty Water', '5:20'),
(9, 7, 'Arrows', '4:26'),
(9, 8, 'Happy Ever After (Zero Hour)', '3:41'),
(9, 9, 'Sunday Rain', '6:11'),
(9, 10, 'The Line', '3:38'),
(9, 11, 'Concrete and Gold', '5:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `email_list`
--
ALTER TABLE `email_list`
  ADD PRIMARY KEY (`Email_ID`,`Email_address`),
  ADD UNIQUE KEY `Emails` (`Email_address`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_name`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`album_id`,`track_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `album_id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `email_list`
--
ALTER TABLE `email_list`
  MODIFY `Email_ID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `tracks_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `albums` (`album_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
