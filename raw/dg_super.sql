-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2017 at 07:13 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `digischools_superadmin`
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
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `useremail`, `userpass`, `fullname`, `salt`, `date_created`) VALUES
  (1, 'victor@vic.com', '$2y$10$chEeMmamVV2565QJzPfSrutYqfu.DdZ.5YMnXwjdfqJniE5bnoRmi', 'Victor I. Afolabi', '$2y$10$RDs2L6L0h.LwyNOUQB5UUOU.CLr2jYe7EzQ1bc/qRjf99MzVNl6d.', '2017-06-05 10:44:23'),
  (2, 'mpdepaule1@gmail.com', '$2y$10$pDGmwFdJP4R/C/NrAeOxT.Fo8ZHEZJgzYKiZ6V6SZeN.s86fZN3Wa', 'Banjo Mofesola Paul', '$2y$10$6kwQZsJBeLYszbSO4LiigudyHaAUa.mybR.F9FzJFEkZe35szNIx2', '2017-06-05 15:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `status` enum('fresh','treated','closed') NOT NULL DEFAULT 'fresh',
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `body`, `status`, `school_id`) VALUES
  (1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, veritatis Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa neque explicabo suscipit eaque, magni placeat et commodi cum iure nemo..', 'fresh', 2),
  (2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, veritatis Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa neque explicabo suscipit eaque, magni placeat et commodi cum iure nemo..', 'treated', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `uid`, `slug`, `name`, `location`, `status`, `admin_uname`, `admin_password`, `s_population`, `date_created`) VALUES
  (1, 'avRbP5', 'royal-bird-int-l-school', 'Royal Bird Int''l School', 'Akure', 1, 'emmat0616@gmail.com', '$2y$10$k9waDvG6psDDLf1YNIXNUunVxYw/9utJ/kCIh5Jf8G4mTQuQ7X7w2', 1200, '2017-06-02 12:34:55'),
  (2, 'Nwjtsr', 'royal-bird-int-l-school-693', 'Royal Bird Int''l School', 'Akure', 0, 'emmat0616@gmail.com', '$2y$10$GNwiD1N9CP5PgvQNrgAPBOO6vu/3TIMHPJKXnk0Nbj3ULjzrka0Ka', 1200, '2017-06-02 12:35:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;