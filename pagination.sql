-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2021 at 06:58 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pagination`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_phone`) VALUES
(1, 'Lisa Beth', 'lisa@gmail.com', '+880 1911 123 123'),
(2, 'Miley Lauren', 'miley@yahoo.com', '+880 1525 321 321'),
(3, 'Nelson Bighetti', 'nelson@outlook.com', '+880 1656 444 555'),
(4, 'Erlich Bachman', 'aviato@gmail.com', '+880 1848 696 696'),
(5, 'Monica Hall', 'monica@gmail.com', '+880 1711 213 243'),
(6, 'David Peterson', 'david@outlook.com', '+880 1525 361 521'),
(7, 'Mel Gibson', 'gibson@outlook.com', '+880 1926 344 575'),
(8, 'Peter Thiel', 'pete@gmail.com', '+880 1328 496 166'),
(9, 'Pinno Oranse', 'prnse@outlook.com', '+880 1321 454 696'),
(10, 'Bleck Fergussion', 'bleck@outlook.com', '+880 1825 231 371'),
(11, 'Neenee Davidson', 'neenee@rocket.com', '+880 1356 424 575'),
(12, 'Malik Aslam', 'aslam@gmail.com', '+880 1825 696 333'),
(13, 'Rick Liamson', 'rick@gmail.com', '+880 1324 898 999'),
(14, 'Leo Orlando', 'leo@polandmail.com', '+880 1525 361 521'),
(15, 'Yama Loren', 'yama@outlook.com', '+880 1826 254 115'),
(16, 'Bertram Gilfoyle', 'luci4@ddgo.com', '+880 1511 666 666');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
