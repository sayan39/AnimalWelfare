-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 09:49 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animal_welfare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `name`, `password`, `contact`) VALUES
('a@gmail.com', 'Debangana', '123', '6295989015');

-- --------------------------------------------------------

--
-- Table structure for table `adoption`
--

CREATE TABLE `adoption` (
  `adoptionid` int(11) NOT NULL,
  `animal_type` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `postdate` varchar(20) NOT NULL,
  `adoptedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donationid` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `transactionid` varchar(100) NOT NULL,
  `transaction_date` varchar(50) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackid` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `feedback_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberid` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rescue`
--

CREATE TABLE `rescue` (
  `rescueid` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `latitute` varchar(50) NOT NULL,
  `longitute` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL,
  `rescue_date` varchar(20) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `welfare`
--

CREATE TABLE `welfare` (
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `welfare`
--

INSERT INTO `welfare` (`email`, `address`, `contact`) VALUES
('animalwelfare@gmail.com', 'Saltlake, Kolkata', '+91 6295989015');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`adoptionid`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donationid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `rescue`
--
ALTER TABLE `rescue`
  ADD PRIMARY KEY (`rescueid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `welfare`
--
ALTER TABLE `welfare`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption`
--
ALTER TABLE `adoption`
  MODIFY `adoptionid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donationid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rescue`
--
ALTER TABLE `rescue`
  MODIFY `rescueid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
