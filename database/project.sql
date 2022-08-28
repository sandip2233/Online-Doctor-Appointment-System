-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 08:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appid` int(255) NOT NULL,
  `auserid` varchar(255) NOT NULL,
  `id` int(20) NOT NULL,
  `symtopms` varchar(255) NOT NULL,
  `comment` varchar(400) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'process'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appid`, `auserid`, `id`, `symtopms`, `comment`, `status`) VALUES
(1, '', 0, 'fever', 'high fever', 'process'),
(2, '', 0, 'fever', 'high fever', 'process'),
(3, 'sandip7890', 9, 'fever', 'high fever', 'process');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `name` varchar(255) NOT NULL,
  `age` int(100) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`name`, `age`, `userId`, `password`, `number`) VALUES
('SANDIP DAS', 21, 'sandip7890', 'sandip@123', '8609744951'),
('mamon sahid', 20, 'mamon', 'mamon@123', '9876543210'),
('sayantan', 55, 'sayan123', 's@123', '8609233007'),
('PRITI MONDAL', 18, 'priti', '123ptriti', '7890929202'),
('GAIRIK SAJJAN', 21, 'GAIRIK123', 'gairik@123', '7892928564'),
('subhojit paik', 21, 'subho', '1234', '7251861495');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Dr.name` varchar(255) NOT NULL,
  `doctorId` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `speciali` varchar(255) NOT NULL,
  `hospital` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Dr.name`, `doctorId`, `password`, `phone`, `email`, `address`, `dob`, `speciali`, `hospital`) VALUES
('AMITAVA DE', 1001, '123@', '123456789', 'doc123@gmail.com', '310 jessore road', '1976-05-02', 'UROLOGIST', 'NIGHTINGALE DIAGNOSTIC & MEDICARE'),
('DR. KASHINATH GHOSH HAZRA', 1002, '123@', '9876543210', 'doc234@gmail.com', '311 jessore road', '1982-09-13', 'CARDIOLOGIST', 'HOSPITAL\r\nR N TAGORE INTERNATIONAL INSTITUTE OF CARDIAC SCIENCES');

-- --------------------------------------------------------

--
-- Table structure for table `shedule`
--

CREATE TABLE `shedule` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `s_day` varchar(255) CHARACTER SET latin1 NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `avail` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shedule`
--

INSERT INTO `shedule` (`id`, `date`, `s_day`, `starttime`, `endtime`, `avail`) VALUES
(7, '2021-10-22', 'Friday', '01:31:00', '03:30:00', 'available'),
(8, '2021-11-22', 'Monday', '06:06:00', '23:55:00', 'notavail'),
(9, '2021-11-23', 'Wednesday', '00:00:00', '23:55:00', 'not available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appid`);

--
-- Indexes for table `shedule`
--
ALTER TABLE `shedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shedule`
--
ALTER TABLE `shedule`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
