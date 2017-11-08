-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2017 at 09:47 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autocomment`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logs_id` int(11) NOT NULL,
  `logs_idcomment` varchar(250) DEFAULT NULL,
  `logs_idsubcomment` varchar(250) DEFAULT NULL,
  `post_id` varchar(250) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `speech_id` int(11) NOT NULL,
  `logs_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_fbid` varchar(250) DEFAULT NULL,
  `post_idpage` varchar(250) DEFAULT NULL,
  `speech_set` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `post_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `speech`
--

CREATE TABLE `speech` (
  `speech_id` int(11) NOT NULL,
  `speech_ask` varchar(250) DEFAULT NULL,
  `speech_reply` varchar(250) DEFAULT NULL,
  `speech_set` varchar(40) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `speech_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `speech`
--

INSERT INTO `speech` (`speech_id`, `speech_ask`, `speech_reply`, `speech_set`, `user_id`, `speech_datetime`) VALUES
(26, 'คำถาม', '%E0%B8%84%E0%B8%B3%E0%B8%95%E0%B8%AD%E0%B8%9A456', 'ss', 1, '2017-10-04 23:54:48'),
(33, 'กินไรยัง', '%E0%B8%82%E0%B9%89%E0%B8%B2%E0%B8%A7%E0%B8%9B%E0%B9%88%E0%B8%B2%E0%B8%A7', 'aa', 1, '2017-10-05 01:51:31'),
(35, 'ทำไร', '%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%9A%E0%B8%B1%E0%B9%8A%E0%B8%81', 'aa', 1, '2017-10-15 02:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fbid` varchar(100) DEFAULT NULL,
  `user_fbname` varchar(100) DEFAULT NULL,
  `user_createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fbid`, `user_fbname`, `user_createtime`) VALUES
(1, '100001260876254', 'Peerapat Matheang', '2017-10-02 19:31:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logs_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `speech`
--
ALTER TABLE `speech`
  ADD PRIMARY KEY (`speech_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logs_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `speech`
--
ALTER TABLE `speech`
  MODIFY `speech_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
