-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 06:52 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `prefix` char(30) NOT NULL DEFAULT 'BOK',
  `Cust_Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Current_balance` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `prefix`, `Cust_Name`, `Email`, `Current_balance`) VALUES
(1, 'BOK', 'Aishwarya Godse', 'aishwarya@gmail.com', 23000),
(2, 'BOK', 'Ajay Raut', 'ajayrt@gmail.com', 20010),
(3, 'BOK', 'Vishwajeet Godse', 'vishwajeet@gmail.com', 21060),
(4, 'BOK', 'Varun Jadhav', 'varunjadhav@gmail.com', 19610),
(5, 'BOK', 'Sameer Ingale', 'sameeringale@gmail.com', 19000),
(6, 'BOK', 'Raman Bhalla', 'rmnvh@gmail.com', 29000),
(7, 'BOK', 'Sagar Sawant', 'sagar23@gmail.com', 40000),
(8, 'BOK', 'Ganesh Despande', 'gaun231@gmail.com', 28600),
(9, 'BOK', 'Rajshree Dev', 'rdev12@gmail.com', 20000),
(10, 'BOK', 'Kartik Rao', 'kartikrao@gmail.com', 30000),
(11, 'BOK', 'Sameer Kadam', 'kadamsameer@gmail.com', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `Id` int(11) NOT NULL,
  `Transfer_from` varchar(255) NOT NULL,
  `Transfer_to` varchar(255) NOT NULL,
  `Amount` float NOT NULL,
  `tdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`Id`, `Transfer_from`, `Transfer_to`, `Amount`, `tdate`) VALUES
(1, 'Rajshree Dev', 'Sameer Kadam', 900, '2021-04-10'),
(2, 'Aishwarya Godse', 'Vishwajeet Godse', 80, '2021-04-11'),
(3, 'Kartik Rao', 'Ajay Raut', 2190, '2021-04-11'),
(4, 'Ganesh Despande', 'Varun Jadhav', 310, '2021-04-12'),
(5, 'Rajshree Dev', 'Ajay Raut', 290, '2021-04-12'),
(6, 'Ajay Raut', 'Vishwajeet Godse', 720, '2021-04-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`,`prefix`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
