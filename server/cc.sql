-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2018 at 03:03 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `cellNo` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `name`, `surname`, `cellNo`) VALUES
(1, 'muzi', '12345', 'Vusumuzi', 'Mngadi', 711986626),
(2, 'melB', '12345', 'Melusi', 'Maphumulo', 605966231);

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE `allocation` (
  `id` int(11) NOT NULL,
  `cellDonator` varchar(13) NOT NULL,
  `cellReciever` varchar(13) NOT NULL,
  `status` int(11) NOT NULL,
  `allocated_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocation`
--

INSERT INTO `allocation` (`id`, `cellDonator`, `cellReciever`, `status`, `allocated_time`) VALUES
(34, '0623503096', '0711983349', 1, '2018-03-06 12:16:31.450923'),
(35, '0623503096', '12345', 1, '2018-03-06 12:17:47.625548');

-- --------------------------------------------------------

--
-- Table structure for table `bankss`
--

CREATE TABLE `bankss` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `universal_code` varchar(11) NOT NULL,
  `key` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `states` int(2) NOT NULL,
  `remaining_claim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`id`, `cellClaim`, `amount`, `donDate`, `expDate`, `states`, `remaining_claim`) VALUES
(15, '12345', 1500, '0000-00-00 00:00:00', '2018-03-05 11:38:13', 4, 0),
(18, '0711983349', 5500, '0000-00-00 00:00:00', '2018-03-16 04:47:00', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `cellDonator` varchar(13) NOT NULL COMMENT 'cell number of donator',
  `amount` int(65) NOT NULL,
  `donDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(2) DEFAULT NULL,
  `remaining_don` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `cellDonator`, `amount`, `donDate`, `expDate`, `status`, `remaining_don`) VALUES
(79, '0623503096', 10000, '2018-03-06 12:17:47', '2018-03-07 09:58:11', 0, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `referals`
--

CREATE TABLE `referals` (
  `id` int(11) NOT NULL,
  `refere` varchar(13) NOT NULL,
  `redered` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referals`
--

INSERT INTO `referals` (`id`, `refere`, `redered`) VALUES
(5, '12345', '0623503096'),
(6, '12345', '0711983349'),
(17, '0711983349', '0658707196');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `p_number` varchar(13) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactionhistory`
--

CREATE TABLE `transactionhistory` (
  `id` int(11) NOT NULL,
  `cellDonator` varchar(13) NOT NULL,
  `cellReciever` varchar(13) NOT NULL,
  `amount` decimal(65,0) NOT NULL,
  `donationDate` date NOT NULL,
  `claimeDate` date NOT NULL,
  `status` varchar(255) NOT NULL COMMENT 'complete or incomplete'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `p_number` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ref_code` varchar(11) NOT NULL,
  `status` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `universal_code` int(11) NOT NULL,
  `bank_branch` int(11) NOT NULL,
  `account_holder` varchar(100) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `comm_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `p_number`, `password`, `ref_code`, `status`, `bank_name`, `universal_code`, `bank_branch`, `account_holder`, `account_number`, `profile_pic`, `comm_amount`) VALUES
(1, 'khaye', 'kunene', '12345', '12345', 'admin', 1, 'CAPITEC BANK', 470010, 0, 'Khayelihle', '1425364738', 'assets/images/Screenshot (7).png', 0),
(12, 'Melusi', 'Maphumulo', '0623503096', '1234', '12345', 1, 'CAPITEC BANK', 470010, 147010, 'MR MB MAPHUMULO', '14765159', 'assets/avatar.png', 1000),
(13, 'Nhlanhla', 'Dube', '0711983349', '12345', '12345', 1, 'NEDBANK', 198765, 145236, 'MR SNF DUBE', '1059536524', 'assets/images/Screenshot (7).png', 50),
(20, 'Fortune', 'Dube', '0658707196', 'Sph@1994', '0711983349', 1, 'NEDBANK', 198765, 145066, 'MR F DUBE', '10567894564', 'assets/avatar.png', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocation`
--
ALTER TABLE `allocation`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `referals`
--
ALTER TABLE `referals`
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
-- AUTO_INCREMENT for table `allocation`
--
ALTER TABLE `allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `bankss`
--
ALTER TABLE `bankss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `referals`
--
ALTER TABLE `referals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
