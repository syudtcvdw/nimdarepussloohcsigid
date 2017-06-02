-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2017 at 08:54 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `digischools_super`
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
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `useremail`, `userpass`, `fullname`, `salt`, `date_created`) VALUES
  (10, 'mpdepaule1@gmail.com', '$2y$10$0dAk9Jo4uKBJS7h1vx5CTOSxpaqzRcVbNhXa2lrE7VWDd6P01ZHkS', 'Banjo Mofesola Paul', '', '2017-06-01 19:48:05'),
  (14, 'emmat0616@gmail.com', '$2y$10$0dAk9Jo4uKBJS7h1vx5CTOSxpaqzRcVbNhXa2lrE7VWDd6P01ZHkS', 'Falua Temitope Oyewole', '', '2017-06-02 11:41:20'),
  (18, 'hello@js.ck', '$2y$10$RYMSm0KbV9nk31LKCeo1Oe80jfXIT69E3jmHjSzldZq36//3rYyJe', 'Hello', '', '2017-06-02 14:40:38');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;