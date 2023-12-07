-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 05:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branchID` int(10) NOT NULL,
  `branchname` varchar(255) NOT NULL,
  `soldcars` int(11) NOT NULL DEFAULT 0,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchID`, `branchname`, `soldcars`, `address`) VALUES
(2, 'Palo', 0, 'Can abid'),
(18, 'San Miguel', 0, 'Libtong'),
(19, 'Carigara', 0, 'oo'),
(20, 'Barugo', 0, 'hindi'),
(21, 'Ormoc', 0, 'Ormoc City'),
(22, 'Sta. Fe', 0, 'Sta. Fe'),
(23, 'Calingcaguing', 0, 'Calingcaguing'),
(24, 'Alang Alang', 0, 'adfdsf'),
(25, 'Branch A', 0, '123 Main Street, Palo Alto, CA'),
(26, 'Branch B', 0, '456 Elm Street, Mountain View, CA'),
(27, 'Branch C', 0, '789 Oak Avenue, Sunnyvale, CA'),
(28, 'Branch D', 0, '101 Pine Road, Palo Alto, CA'),
(29, 'Branch E', 0, '222 Cedar Lane, Mountain View, CA'),
(30, 'Branch F', 0, '333 Birch Boulevard, Sunnyvale, CA'),
(31, 'Branch G', 0, '444 Spruce Drive, Palo Alto, CA'),
(32, 'Branch H', 0, '555 Redwood Road, Mountain View, CA'),
(33, 'Branch I', 0, '666 Maple Street, Sunnyvale, CA'),
(34, 'Branch J', 0, '777 Willow Avenue, Palo Alto, CA'),
(35, 'Pitogo', 0, 'brgy. pitogo'),
(36, 'Cuta', 0, 'cuatda');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `carID` int(10) NOT NULL,
  `carname` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT 0,
  `price` int(10) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`carID`, `carname`, `branch`, `description`, `sold`, `price`, `date`) VALUES
(7, 'Kawasaki', 'San Miguel', 'This is high level motor.', 0, 5000000, '2023-11-09'),
(8, 'Honda', 'San Miguel', 'This is practice', 0, 45674, '2023-11-06'),
(9, 'Ferrari', 'Palo', 'Maahla', 0, 121231, '2023-11-09'),
(10, 'Monster', 'Palo', 'Bobo nipzman', 0, 12312313, '2023-11-14'),
(11, 'adfadf', 'Palo', 'dfasdfad', 0, 3434345, '2023-09-09'),
(12, 'asdfadsf', 'Palo', 'adf', 0, 3423, '2023-03-23'),
(13, 'Car 1', 'Palo', 'Description 1', 0, 25000, NULL),
(14, 'Car 2', 'Palo', 'Description 2', 0, 28000, NULL),
(15, 'Car 3', 'Palo', 'Description 3', 0, 22000, NULL),
(16, 'Car 4', 'Palo', 'Description 4', 0, 30000, NULL),
(17, 'Car 5', 'Palo', 'Description 5', 0, 26000, NULL),
(18, 'Car 6', 'Palo', 'Description 6', 0, 29000, NULL),
(19, 'Car 7', 'Palo', 'Description 7', 0, 27000, NULL),
(20, 'Car 8', 'Palo', 'Description 8', 0, 31000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `buyedcar` varchar(255) NOT NULL,
  `datepurchased` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `name`, `contact`, `address`, `branch`, `buyedcar`, `datepurchased`) VALUES
(2, 'Matt', '09128939234', 'Libtong, San Miguel', 'San Miguel', 'Kawasaki', '2023-11-08 22:54:06'),
(5, 'Annyeong', '3435645', 'Barugo', 'Palo', 'Ferrari', '2023-11-08 23:12:29'),
(6, 'Andrew Permejo', '0938762381', 'Brgy. Cabatianohan', 'Palo', 'Ferrari', '2023-11-09 13:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` int(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `contact`, `email`, `password`) VALUES
(5, 'admin', '', 0, 'admin@gmail.com', '$2y$10$TX9qpQcHfl6g2mStTSByRedDP2HmLYI08/JMYEoBazgRX8M.iAbSi'),
(6, 'ramel', '', 2147483647, 'ramelopanisjr.06@gmail.com', '$2y$10$LKZ4ug3me391F/CMZdq0W.iV8kQodWgvpCYXw2.2hAXLQow9bWv8.'),
(7, 'pogi', 'pogi ak ', 2147483647, 'ramelopanisjr@gmail.com', '$2y$10$5YmOA0LAUE35vQpX6NHsoeW/cUzic97rhqexYi3Geo5.JItQlbwqG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branchID`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`carID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branchID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `carID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
