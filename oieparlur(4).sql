-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2016 at 05:20 PM
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
-- Table structure for table `addcustomer`
--

CREATE TABLE IF NOT EXISTS `addcustomer` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `customerid` varchar(255) NOT NULL,
  `cusname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `anniversaryday` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addcustomer`
--

INSERT INTO `addcustomer` (`id`, `date`, `customerid`, `cusname`, `dob`, `mobileno`, `email`, `location`, `address`, `anniversaryday`, `status`) VALUES
(2, '2016-06-20', 'C00002', 'idream', '2016-06-27', '8760496541', 'ramesh@gmail.com', 'covai', 'address', '2016-06-20', '1'),
(3, '2016-06-20', 'C00003', 'demo', '2016-06-07', '', '', '', 'addres', '2016-06-20', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `additem`
--

INSERT INTO `additem` (`id`, `date`, `itemno`, `itemname`, `price`, `vat`, `status`) VALUES
(6, '2016-06-13', '001', 'book', '10', '14', '1'),
(7, '2016-06-13', 'fd', 'ffdf', 'fdf', 'fdf', '1'),
(8, '2016-06-13', '', 'sdsd', 'dsdsds', '', '1'),
(9, '2016-06-13', 'sdsdsdddsd', 'dsdsd', 'dsdsd', 'sdsdds', '1');

-- --------------------------------------------------------

--
-- Table structure for table `appoinment_detail`
--

CREATE TABLE IF NOT EXISTS `appoinment_detail` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `appoinmentno` varchar(255) NOT NULL,
  `startdate` date NOT NULL,
  `satarttime` time NOT NULL,
  `customername` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `enddate` date NOT NULL,
  `endtime` time NOT NULL,
  `served` varchar(255) NOT NULL,
  `staffname` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appoinment_detail`
--

INSERT INTO `appoinment_detail` (`id`, `date`, `appoinmentno`, `startdate`, `satarttime`, `customername`, `mobileno`, `enddate`, `endtime`, `served`, `staffname`, `notes`, `status`) VALUES
(1, '0000-00-00', '001', '0000-00-00', '00:00:00', '', '', '0000-00-00', '03:30:00', '', 'Select', '', '1'),
(2, '0000-00-00', '001', '0000-00-00', '05:30:00', 'ram', '876045984', '0000-00-00', '06:00:00', 'demo', 'Name2', 'not', '1'),
(3, '2016-06-21', '', '0000-00-00', '00:00:00', '', '', '0000-00-00', '00:00:00', '', 'Select', '', '1'),
(4, '2016-06-21', '', '2016-06-22', '00:00:00', '', '', '0000-00-00', '00:20:16', '', 'Select', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `date`, `username`, `password`, `name`, `mobileno`, `email`, `status`) VALUES
(1, '0000-00-00', 'admin', 'admin1234', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `updateqty` varchar(255) NOT NULL,
  `balanceqty` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `date`, `itemname`, `qty`, `updateqty`, `balanceqty`, `status`) VALUES
(24, '2016-06-20', 'book', '15', '', '23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `vat_detail`
--

CREATE TABLE IF NOT EXISTS `vat_detail` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `vatname` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `percentage` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vat_detail`
--

INSERT INTO `vat_detail` (`id`, `date`, `vatname`, `vat`, `percentage`, `status`) VALUES
(2, '0000-00-00', 'vat', '25', 'vat25', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcustomer`
--
ALTER TABLE `addcustomer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `additem`
--
ALTER TABLE `additem`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appoinment_detail`
--
ALTER TABLE `appoinment_detail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vat_detail`
--
ALTER TABLE `vat_detail`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcustomer`
--
ALTER TABLE `addcustomer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `additem`
--
ALTER TABLE `additem`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `appoinment_detail`
--
ALTER TABLE `appoinment_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `vat_detail`
--
ALTER TABLE `vat_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
