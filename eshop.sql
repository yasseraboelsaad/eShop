-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2015 at 07:56 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE IF NOT EXISTS `Orders` (
  `User` varchar(64) NOT NULL,
  `Product` varchar(64) NOT NULL,
  `Amount` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Number` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`User`, `Product`, `Amount`, `id`, `Number`) VALUES
('karim@gmail.com', '3', 3, 1, 1),
('karim@gmail.com', '1', 1, 2, 1),
('mudda@gmail.com', '1', 5, 3, 2),
('karim@gmail.com', '4', 5, 4, 3),
('karim@gmail.com', '1', 1, 11, 4),
('karim@gmail.com', '2', 1, 12, 4),
('karim@gmail.com', '1', 1, 13, 5),
('karim@gmail.com', '2', 1, 14, 5),
('karim@gmail.com', '1', 1, 15, 6),
('karim@gmail.com', '2', 1, 16, 6),
('karim@gmail.com', '1', 1, 17, 7),
('karim@gmail.com', '2', 1, 18, 7),
('karim@gmail.com', '1', 1, 19, 8),
('karim@gmail.com', '2', 1, 20, 8),
('karim@gmail.com', '1', 1, 21, 9),
('karim@gmail.com', '2', 1, 22, 9),
('karim@gmail.com', '1', 1, 23, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE IF NOT EXISTS `Product` (
  `Name` varchar(64) NOT NULL,
  `Price` int(11) NOT NULL,
  `Image` varchar(10000) DEFAULT NULL,
  `Stock` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `id` int(11) NOT NULL,
  `Type` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`Name`, `Price`, `Image`, `Stock`, `Description`, `id`, `Type`) VALUES
('iPhone 6', 7000, 'http://mdroid.my/en/wp-content/uploads/2015/09/apple-iphone-6s-6s-plus-malaysia-320x150.jpg', 7, '32gb silver', 1, 'mobile'),
('Dell n5110', 3000, 'https://www.dealsplus.com/ai/0_0/dealimage/20000/1615000/1615435_1385399238.jpg', 10, 'Laptop core i5 nvidia', 2, 'Laptop'),
('iPad 4', 6000, 'http://www.needineed.com/i/b/ba/89/72dc558a4b9c62a1f8b6e49629a7_320x150.jpg', 15, '64gb retina display gold', 3, 'Tablet'),
('iphone 6s', 10000, 'data:image/jpeg;base64,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', 0, '128gb rose gold', 4, 'mobile');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `Fname` varchar(64) NOT NULL,
  `Lname` varchar(64) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `Avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Fname`, `Lname`, `Email`, `Password`, `Avatar`) VALUES
('hossam', 'hany', '7os@gmail.com', '1234', ''),
('ahmed', 'adel', 'alaa@alaa.com', '1234', ''),
('Ahmed', 'Adel', 'doola@gmail.com', '123456', ''),
('islam', 'taweel', 'islam@gmail.com', '1234', ''),
('karim', 'farid', 'karim@gmail.com', '1234', ''),
('Laila', 'Sabry', 'laila@gmail.com', '1234', ''),
('mohamed', 'ahmed', 'mido@gmail.com', '1234', ''),
('', 'hany', 'mudda@gmail.com', '1234', 'shoppingcart.png'),
('Yasser', 'Abouel-Saad', 'yasser@gmail.com', '123456', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
