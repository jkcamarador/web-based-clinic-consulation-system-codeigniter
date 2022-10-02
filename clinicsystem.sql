-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2022 at 07:44 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinicsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `class` varchar(50) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `date_created` date NOT NULL,
  `date_appoint` date NOT NULL,
  `guardian` varchar(100) NOT NULL,
  `contact_num` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `id` int(11) NOT NULL,
  `class` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Bday` date NOT NULL,
  `guardian` varchar(100) NOT NULL,
  `contact_num` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `med_history` varchar(1000) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `bmi` varchar(50) NOT NULL,
  `temp` varchar(50) NOT NULL,
  `pulse` varchar(50) NOT NULL,
  `respiration` varchar(50) NOT NULL,
  `blood_pressure` varchar(50) NOT NULL,
  `chief_complaint` varchar(1000) NOT NULL,
  `diagnosis` varchar(1000) NOT NULL,
  `treatment` varchar(1000) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `database_backup`
--

CREATE TABLE `database_backup` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `info_facul`
--

CREATE TABLE `info_facul` (
  `LastName` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Bday` date NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `info_stud`
--

CREATE TABLE `info_stud` (
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `College` varchar(50) NOT NULL,
  `Course` varchar(50) NOT NULL,
  `YearLevel` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Bday` date NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `isread` tinyint(1) NOT NULL,
  `reason` varchar(3000) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `database_backup`
--
ALTER TABLE `database_backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_facul`
--
ALTER TABLE `info_facul`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `info_stud`
--
ALTER TABLE `info_stud`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `database_backup`
--
ALTER TABLE `database_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
