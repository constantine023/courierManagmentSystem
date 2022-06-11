-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2022 at 05:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `parcels`
--

CREATE TABLE `parcels` (
  `id` int(150) NOT NULL,
  `consignment` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `sender name` varchar(30) NOT NULL,
  `sender phone` int(10) NOT NULL,
  `sender email` varchar(100) NOT NULL,
  `sender city` varchar(30) NOT NULL,
  `sender zip code` varchar(30) NOT NULL,
  `sender street` varchar(50) NOT NULL,
  `sender state` varchar(100) NOT NULL,
  `reciever name` varchar(25) NOT NULL,
  `reciever phone` int(12) NOT NULL,
  `reciever email` varchar(100) NOT NULL,
  `receiver city` varchar(50) NOT NULL,
  `receiver zip code` varchar(50) NOT NULL,
  `receiver street` varchar(50) NOT NULL,
  `receiver state` varchar(100) NOT NULL,
  `courier type` varchar(30) NOT NULL,
  `courier weight` varchar(1000) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `Status` varchar(25) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`id`, `consignment`, `username`, `sender name`, `sender phone`, `sender email`, `sender city`, `sender zip code`, `sender street`, `sender state`, `reciever name`, `reciever phone`, `reciever email`, `receiver city`, `receiver zip code`, `receiver street`, `receiver state`, `courier type`, `courier weight`, `comment`, `Status`, `date`) VALUES
(128, '4lmocetjau', 'Dev ', 'Dev Palwar', 2147483647, 'dev@gmail.com', 'Bharatpur', '321205', 'Mori mohalla Nagar', 'RAJASTHAN', 'Roronoa zoro', 2147483647, 'zoro@gmail.com', 'ALWAR', '321205', 'Mori Nagar', 'RAJASTHAN', 'Documents', '10kg', 'This is a courier', 'to be approved', '2022-06-10'),
(131, '4mpkld9h6j', 'tatsuya', 'Dev Palwar', 2147483647, 'manishkumarchetiwal1998@gmail.com', 'Bharatpur', '321205', 'Mori mohalla Nagar', 'RAJASTHAN', 'Dev Palwar', 2147483647, 'manishkumarchetiwal1998@gmail.com', 'Bharatpur', '321205', 'Mori mohalla Nagar', 'RAJASTHAN', 'Documents', '20kg', 'ok?', 'Delivered', '2022-06-10'),
(132, 'zwa7bxqny0', '', 'Vinsmoke sanji ', 2147483647, 'sanji@me.com', 'Water 7', '321205', 'Germa mohalla', 'RAJASTHAN', 'Luffy', 2147483647, 'luffy@gmail.com', 'Grand line', '90907', 'East blue', 'Center ', 'Material', '20kg', 'MEakkkkk', 'Approved', '2022-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(19, 'tatsuya', 'lolxd', 'hm@me.com'),
(27, 'sanji', 'mr.prince', 'sanji@me.com'),
(28, 'Dev ', 'mee', 'dev@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parcels`
--
ALTER TABLE `parcels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
