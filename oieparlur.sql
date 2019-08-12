-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2016 at 12:45 PM
-- Server version: 5.6.25-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oieparlur`
--

-- --------------------------------------------------------

--
-- Table structure for table `additem`
--

CREATE TABLE IF NOT EXISTS `additem` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `itemno` varchar(255) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `additem`
--

INSERT INTO `additem` (`id`, `date`, `itemno`, `itemname`, `price`, `vat`, `status`) VALUES
(1, '2016-06-07', 'sdsd', 'dsddsddsdsd', 'sdsd', 'dsdsdd', '1'),
(2, '2016-06-07', '', '', '', '', '1'),
(3, '2016-06-07', '', '', '', '', '1'),
(4, '2016-06-07', '', '', '', '', '1'),
(5, '2016-06-07', '', '', '', '', '1'),
(6, '2016-06-07', '', '', '', '', '1'),
(7, '2016-06-07', '100', 'book', '25', '10', '1'),
(8, '2016-06-08', '', '', '', '', '1'),
(9, '2016-06-08', '', '', '', '', '1'),
(10, '2016-06-08', '', '', '', '', '1'),
(11, '2016-06-08', '', '', '', '', '1'),
(12, '2016-06-08', '', '', '', '', '1'),
(13, '2016-06-08', '', '', '', '', '1'),
(14, '2016-06-08', '', '', '', '', '1'),
(15, '2016-06-08', '', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `date`, `username`, `password`, `status`) VALUES
(1, '0000-00-00', 'admin', 'admin1234', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additem`
--
ALTER TABLE `additem`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additem`
--
ALTER TABLE `additem`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
