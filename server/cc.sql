-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
<<<<<<< HEAD
-- Generation Time: Feb 28, 2018 at 06:29 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8
=======
-- Generation Time: Feb 27, 2018 at 06:14 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4
>>>>>>> 8f940d4ad0d4a12093ea3e6f6206cb9c38bb42c2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cc`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

<<<<<<< HEAD
CREATE TABLE `allocation` (
  `id` int(11) NOT NULL,
  `cellDonator` varchar(13) NOT NULL,
  `cellReciever` varchar(13) NOT NULL,
  `don_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bankss`
--

CREATE TABLE `bankss` (
  `id` int(11) NOT NULL,
=======
CREATE TABLE IF NOT EXISTS `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
>>>>>>> 8f940d4ad0d4a12093ea3e6f6206cb9c38bb42c2
  `bank_name` varchar(100) NOT NULL,
  `universal_code` varchar(11) NOT NULL,
  `key` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `bankss`
--

INSERT INTO `bankss` (`id`, `bank_name`, `universal_code`, `key`) VALUES
(1, 'ABSA BANK', '632005', 'ABS'),
(2, 'BANK OF ATHENS', '410506', 'BOA'),
(3, 'ABSA BANK', '632005', 'ABS'),
(4, 'BANK OF ATHENS', '410506', 'BOA'),
(5, 'BIDVEST BANK', '462005', 'BID'),
(6, 'CAPITEC BANK', '470010', 'CAP'),
(7, 'FIRST NATIONAL BANK', '250655', 'FNB'),
(8, 'INVESTEC', '580105', 'INV'),
(9, 'NEDBANK', '198765', 'NED'),
(10, 'SA POST BANK (POST OFFICE)', '460005', 'SAP'),
(11, 'STANDARD BANK', '051001', 'STA');

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `id` int(11) NOT NULL,
  `cellClaim` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `donDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `states` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE IF NOT EXISTS `donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cellDonator` varchar(13) NOT NULL COMMENT 'cell number of donator',
  `amount` decimal(65,0) NOT NULL,
  `donDate` date NOT NULL,
  `expDate` date NOT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `donation`
--

<<<<<<< HEAD
INSERT INTO `donation` (`id`, `cellDonator`, `amount`, `donDate`, `expDate`, `status`) VALUES
(10, '12345', 1050, '2018-02-27 16:48:31', '2018-02-28 04:02:31', 0);
=======
>>>>>>> 8f940d4ad0d4a12093ea3e6f6206cb9c38bb42c2

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE IF NOT EXISTS `support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_number` varchar(13) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `support`
--


-- --------------------------------------------------------

--
-- Table structure for table `transactionhistory`
--

CREATE TABLE IF NOT EXISTS `transactionhistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cellDonator` varchar(13) NOT NULL,
  `cellReciever` varchar(13) NOT NULL,
  `amount` decimal(65,0) NOT NULL,
  `donationDate` date NOT NULL,
  `claimeDate` date NOT NULL,
  `status` varchar(255) NOT NULL COMMENT 'complete or incomplete',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transactionhistory`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `p_number` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ref_code` varchar(11) NOT NULL,
  `vCode` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `universal_code` int(11) NOT NULL,
  `bank_branch` int(11) NOT NULL,
  `account_holder` varchar(100) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

<<<<<<< HEAD
INSERT INTO `users` (`id`, `fname`, `lname`, `p_number`, `password`, `ref_code`, `vCode`, `status`, `bank_name`, `universal_code`, `bank_branch`, `account_holder`, `account_number`) VALUES
(1, 'khaye', 'kunene', '12345', 'admin', 'admin', '234567', 1, 'CAPITEC BANK', 470010, 0, 'Khayelihle', '1425364738');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bankss`
--
ALTER TABLE `bankss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `transactionhistory`
--
ALTER TABLE `transactionhistory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bankss`
--
ALTER TABLE `bankss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactionhistory`
--
ALTER TABLE `transactionhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
=======
INSERT INTO `users` (`id`, `fname`, `lname`, `p_number`, `password`, `ref_code`, `vCode`, `status`, `bank_name`, `universal_code`, `account_holder`, `account_number`) VALUES
(1, 'khaye', 'kunene', '12345', '12345', '12345', '234567', 1, 'CAPITEC BANK', 470010, 'Khayelihle', '1425364738'),
(4, 'a', 'a', 'a', 'c', 'a', '190506', 0, '', 0, '', '');
>>>>>>> 8f940d4ad0d4a12093ea3e6f6206cb9c38bb42c2
