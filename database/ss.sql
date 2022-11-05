-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 03:01 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ss`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`) VALUES
(1, 'andiari', '$2y$10$AXk7Zh1jhToUnKp3CBw6uOQ9L.oT18fevuW6iZgGR8yVDbkGkb6m.');

-- --------------------------------------------------------

--
-- Table structure for table `illustartion`
--

CREATE TABLE `illustartion` (
  `id` int(11) NOT NULL,
  `files_img` varchar(225) NOT NULL,
  `title` varchar(50) NOT NULL,
  `artist` varchar(50) NOT NULL,
  `software` varchar(40) NOT NULL,
  `dates` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `illustartion`
--

INSERT INTO `illustartion` (`id`, `files_img`, `title`, `artist`, `software`, `dates`) VALUES
(9, 'simple.png', 'Black Sweather', 'AndiAri', 'Medibang', '26-10-2022 11:01:00pm'),
(10, 'mono.jpg', 'Monochrome', 'AndiAri', 'IbisPaintX', '26-10-2022 11:06:56pm'),
(11, 'butterfly.jpg', 'Butterfly', 'AndiAri', 'IbisPaintX', '26-10-2022 11:08:44pm'),
(12, 'darth-vader-fanart-4k-3h-1366x768.jpg', 'Darth Vader', 'Unknown', 'AI', '26-10-2022 11:10:58pm'),
(13, 'arlecchino.jpg', 'Arlecchino Genshin Impact', 'AndiAri', 'IbisPaintX', '26-10-2022 11:12:50pm'),
(14, 'boring.jpg', 'Boring', 'AndiAri', 'IbisPaintX', '26-10-2022 11:15:35pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `illustartion`
--
ALTER TABLE `illustartion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `illustartion`
--
ALTER TABLE `illustartion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
