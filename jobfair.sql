-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2017 at 01:37 PM
-- Server version: 5.7.16-0ubuntu0.16.10.1
-- PHP Version: 7.0.8-3ubuntu3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobfair`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(255) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`) VALUES
(1, 'TCS one '),
(2, 'wipro two'),
(3, 'cts three');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `date` date NOT NULL,
  `useroption` int(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `platform` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `uid`, `date`, `useroption`, `time`, `ip`, `browser`, `platform`) VALUES
(1, 1, '2017-01-14', 3, '23:30:12', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(2, 4, '2017-01-14', 3, '23:37:52', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(3, 6, '2017-01-14', 3, '23:39:23', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(4, 6, '2017-01-14', 2, '23:39:23', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(5, 6, '2017-01-14', 1, '23:39:23', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(6, 7, '2017-01-14', 3, '23:40:33', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(7, 7, '2017-01-14', 2, '23:40:33', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(8, 7, '2017-01-14', 1, '23:40:33', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(9, 9, '2017-01-14', 2, '23:42:01', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(10, 9, '2017-01-14', 1, '23:42:01', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(11, 9, '2017-01-14', 3, '23:42:01', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(12, 10, '2017-01-14', 2, '23:45:49', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(13, 10, '2017-01-14', 1, '23:45:49', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(14, 11, '2017-01-14', 2, '23:52:29', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(15, 11, '2017-01-14', 1, '23:52:29', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(16, 11, '2017-01-14', 3, '23:52:29', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(17, 12, '2017-01-14', 2, '23:53:05', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(18, 12, '2017-01-14', 1, '23:53:05', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(19, 12, '2017-01-14', 3, '23:53:05', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(20, 12, '2017-01-14', 2, '23:53:05', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(21, 13, '2017-01-15', 2, '00:13:13', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(22, 17, '2017-01-15', 2, '00:51:06', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(23, 17, '2017-01-15', 3, '00:51:06', '::1', 'Chrome 55.0.2883.87', 'Linux'),
(24, 17, '2017-01-15', 1, '00:56:51', '::1', 'Chrome 55.0.2883.87', 'Linux');

-- --------------------------------------------------------

--
-- Table structure for table `personalinfo`
--

CREATE TABLE `personalinfo` (
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id` int(225) NOT NULL,
  `salt` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personalinfo`
--

INSERT INTO `personalinfo` (`fname`, `lname`, `dob`, `email`, `password`, `id`, `salt`) VALUES
('jk', '', '0000-00-00', '', '', 4, 'a7SrjVJD3FTM'),
('jk2', '', '0000-00-00', 'qweqwe@gma.com', '', 6, 'Y7UKFceSl03W'),
('jk2', '', '0000-00-00', 'qweqwe@gma.comt', '', 7, 'rn6tx8NURisJ'),
('jk2', '', '0000-00-00', 'qweqwe@gma.comts', '', 9, 'zLNniGUm3abl'),
('pp', '', '0000-00-00', 'sdfsdfsdf@gma.ccc', 'as', 10, 'ZUQX1lEtnsyz'),
('JAYAKRISHNAN', 'C.N', '0000-00-00', 'jayakrishnancn@gmail.comi', '', 12, 'EReLqTi9OV1D'),
('JAYAKRISHNAN', 'C.N', '0000-00-00', 'jayakrishnancn@gmail.com22', '', 13, 'ICsfo4mNWGAc'),
('a', 'a', '0000-00-00', 'a', 'a', 14, 'QbWTDicj3OhX'),
('sad', 'C.N', '0000-00-00', 'jayakrishnancn@gmail.com', 'c0221af802afff0d5b08e343b04c7ff323d7c94c', 16, 'mIy7PALdiRz2'),
('', '', '0000-00-00', 'jayakrishnancn@gmail.com2', '72ff569701b14b5478bafbbe9e7b76719a0d15e7', 17, 'p2UceiWKS8mD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personalinfo`
--
ALTER TABLE `personalinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `personalinfo`
--
ALTER TABLE `personalinfo`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
