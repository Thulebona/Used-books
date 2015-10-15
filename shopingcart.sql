-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2015 at 07:36 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookgeneral`
--

CREATE TABLE IF NOT EXISTS `bookgeneral` (
  `isbn` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookgeneral`
--

INSERT INTO `bookgeneral` (`isbn`, `title`, `description`, `category`) VALUES
('1234567ABAB', 'Linux for beginners', 'Linux for beginners because its so hard it needs a book.', 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `bookspecific`
--

CREATE TABLE IF NOT EXISTS `bookspecific` (
  `id` int(11) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `bookCondition` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `ownerUsername` varchar(30) NOT NULL,
  `imageName` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookspecific`
--

INSERT INTO `bookspecific` (`id`, `isbn`, `price`, `bookCondition`, `status`, `ownerUsername`, `imageName`) VALUES
(1, '1234567ABAB', 200, 'quite old', 'availible', 'rossb', 'image1.png'),
(2, '1234567ABAB', 400, 'almost new', 'availible', 'rossb', 'linux.png');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`username`, `password`, `name`, `lastName`, `email`, `phone`, `address`) VALUES
('rossb', '', 'ross', 'borchers', 'email@email.email', '0909009090990', 'FINLANDS');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `clientUsername` varchar(30) NOT NULL,
  `bookid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookgeneral`
--
ALTER TABLE `bookgeneral`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `bookspecific`
--
ALTER TABLE `bookspecific`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`clientUsername`,`bookid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookspecific`
--
ALTER TABLE `bookspecific`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
