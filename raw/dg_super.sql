-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2017 at 10:26 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dg_super`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `useremail` varchar(200) NOT NULL,
  `userpass` varchar(300) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `salt` varchar(250) NOT NULL,
  `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `useremail`, `userpass`, `fullname`, `salt`, `date_created`) VALUES
(10, 'mpdepaule1@gmail.com', '$2y$10$We6inOUsX1aHPPDaNDODD.MZcfqjRJbh/7pBHOxL6qRNVyvGp3WbW', 'Banjo Mofesola Paul', '', '2017-06-01 19:48:05'),
(14, 'emmat0616@gmail.com', '$2y$10$exVgi5uh50fgAQ/IUJHcrO3LKoKHm2CQpABn0YDjxZ183ZZN3GE.m', 'Falua Temitope Oyewole', '', '2017-06-02 11:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `uid` varchar(12) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `location` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `admin_uname` varchar(150) NOT NULL,
  `admin_password` varchar(250) NOT NULL,
  `s_population` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `uid`, `slug`, `name`, `location`, `status`, `admin_uname`, `admin_password`, `s_population`, `date_created`) VALUES
(1, 'avRbP5', 'royal-bird-int-l-school', 'Royal Bird Int\'l School', 'Akure', 1, 'emmat0616@gmail.com', '$2y$10$k9waDvG6psDDLf1YNIXNUunVxYw/9utJ/kCIh5Jf8G4mTQuQ7X7w2', 1200, '2017-06-02 12:34:55'),
(2, 'Nwjtsr', 'royal-bird-int-l-school-693', 'Royal Bird Int\'l School', 'Akure', 0, 'emmat0616@gmail.com', '$2y$10$GNwiD1N9CP5PgvQNrgAPBOO6vu/3TIMHPJKXnk0Nbj3ULjzrka0Ka', 1200, '2017-06-02 12:35:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
