-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2019 at 07:14 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id6233455_themark`
--

-- --------------------------------------------------------

--
-- Table structure for table `Attandance`
--

CREATE TABLE `Attandance` (
  `uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hospital` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attandance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mark_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roll` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Attandance`
--

INSERT INTO `Attandance` (`uid`, `name`, `hospital`, `date`, `attandance`, `section`, `mark`, `mark_by`, `time`, `roll`) VALUES
('1160177', 'Rishu kumar', 'uni-hospital', '2019-07-20', 'absent', 'k1617', '0', 'not_marked', '9:00-10:00 Am', '1'),
('1160177', 'Rishu kumar', 'uni-hospital', '2019-07-20', 'absent', 'k1617', '0', 'not_marked', '10:00-11:00 Am', '1'),
('1160177', 'Rishu kumar', 'uni-hospital', '2019-07-20', 'absent', 'k1617', '0', 'not_marked', '11:00-12:00 Pm', '1'),
('1160177', 'Rishu kumar', 'uni-hospital', '2019-07-20', 'absent', 'k1617', '0', 'not_marked', '12:00-1:00 Pm', '1'),
('1160177', 'Rishu kumar', 'uni-hospital', '2019-07-22', 'absent', 'k1617', '0', 'not_marked', '9:00-10:00 Am', '1'),
('1160177', 'Rishu kumar', 'uni-hospital', '2019-07-22', 'absent', 'k1617', '0', 'not_marked', '10:00-11:00 Am', '1'),
('1160177', 'Rishu kumar', 'uni-hospital', '2019-07-22', 'absent', 'k1617', '0', 'not_marked', '11:00-12:00 Pm', '1'),
('1160177', 'Rishu kumar', 'uni-hospital', '2019-07-22', 'absent', 'k1617', '0', 'not_marked', '12:00-1:00 Pm', '1'),
('1160177', 'Rishu kumar', 'uni-hospital', '2019-07-18', 'present', 'k1617', '1', '11601778', '9:00-10:00 Am', '1'),
('1160177', 'Rishu kumar', 'uni-hospital', '2019-07-18', 'absent', 'k1617', '0', 'not_marked', '10:00-11:00 Am', '1'),
('1160177', 'Rishu kumar', 'uni-hospital', '2019-07-18', 'absent', 'k1617', '0', 'not_marked', '11:00-12:00 Pm', '1'),
('1160177', 'Rishu kumar', 'uni-hospital', '2019-07-18', 'absent', 'k1617', '0', 'not_marked', '12:00-1:00 Pm', '1'),
('1160177', 'Rishu kumar', 'ZOHAL', '2019-07-19', 'absent', 'k1617', '0', 'not_marked', '9:00-10:00 Am', '1'),
('1160177', 'Rishu kumar', 'ZOHAL', '2019-07-19', 'absent', 'k1617', '0', 'not_marked', '10:00-11:00 Am', '1'),
('1160177', 'Rishu kumar', 'ZOHAL', '2019-07-19', 'absent', 'k1617', '0', 'not_marked', '11:00-12:00 Pm', '1'),
('1160177', 'Rishu kumar', 'ZOHAL', '2019-07-19', 'absent', 'k1617', '0', 'not_marked', '12:00-1:00 Pm', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`name`) VALUES
('uni-hospital'),
('ZOHAL');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section`, `status`) VALUES
('k1617', '1'),
('K1624', '1'),
('Z123', '1');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hospital` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `termid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roll` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `s_group` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`uid`, `name`, `section`, `email`, `mobile`, `hospital`, `status`, `termid`, `course_code`, `roll`, `s_group`) VALUES
('1160177', 'Rishu kumar', 'k1617', 'rishukr06@gmail.com', '8210602775', 'ZOHAL', '1', '12345', 'cse101', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time`) VALUES
('9:00-10:00 Am'),
('10:00-11:00 Am'),
('11:00-12:00 Pm'),
('12:00-1:00 Pm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `password`, `user_type`) VALUES
('11601778', 'Rishu kumar', 'rdx', 'super_user'),
('11601774', 'lpu', 'rdx', 'client'),
('11601779', 'AWANISH', 'rdx', 'client'),
('11605997', 'Rohit', 'rdx', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
