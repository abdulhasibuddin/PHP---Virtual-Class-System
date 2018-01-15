-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2017 at 11:19 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `membership_no` int(11) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_no` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `membership_email` int(11) NOT NULL,
  `answer_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `area` varchar(150) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `area`, `create_date`) VALUES
(1, 'test', '2017-10-15 22:40:22'),
(2, 'test2', '2017-10-16 14:35:08'),
(3, 'sth', '2017-10-16 15:32:58'),
(4, 'area1', '2017-10-16 17:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `membership_no` int(11) NOT NULL,
  `tutorial_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content_audio`
--

CREATE TABLE `content_audio` (
  `page_no` int(11) NOT NULL,
  `tutorial_id` int(11) NOT NULL,
  `navbarItem` varchar(150) DEFAULT NULL,
  `link` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content_general`
--

CREATE TABLE `content_general` (
  `page_no` int(11) NOT NULL,
  `tutorial_id` int(11) NOT NULL,
  `navbarItem` varchar(150) DEFAULT NULL,
  `content` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_general`
--

INSERT INTO `content_general` (`page_no`, `tutorial_id`, `navbarItem`, `content`, `create_date`) VALUES
(4, 1, 'item1', 'content 1', '2017-10-16 20:06:59'),
(5, 1, 'item2', NULL, '2017-10-16 20:02:00'),
(6, 1, 'item3', NULL, '2017-10-16 20:02:07'),
(7, 1, 'item4', NULL, '2017-10-16 20:02:14'),
(8, 1, 'item5', NULL, '2017-10-16 20:02:20'),
(9, 1, 'item6', NULL, '2017-10-16 20:02:26'),
(10, 1, 'item7', NULL, '2017-10-16 20:02:31'),
(11, 1, 'item8', 'kahbfkerk fuaibrf khaeb rfbkaefb ekrhfb<br>uiygaeuirteiourhwoiurthioweuht owei tuwieuh toiwuetoi ueri urg', '2017-10-16 20:07:47'),
(12, 1, 'item9', NULL, '2017-10-16 20:02:42'),
(13, 1, 'item10', NULL, '2017-10-16 20:02:48'),
(14, 1, 'item11', NULL, '2017-10-16 20:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `content_video`
--

CREATE TABLE `content_video` (
  `page_no` int(11) NOT NULL,
  `tutorial_id` int(11) NOT NULL,
  `navbarItem` varchar(150) DEFAULT NULL,
  `link` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `question_no` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `membership_no` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `firstName` varchar(150) NOT NULL,
  `lastName` varchar(150) NOT NULL,
  `password` varchar(256) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`membership_no`, `email`, `firstName`, `lastName`, `password`, `profession`, `gender`, `reg_date`) VALUES
(1, 'aaa@aaa.com', 'aaa', 'aaa', '$2y$10$x4m7Ul8nzTucC9Zgtvmbn.9z0Q0DjR8QvJns9pIDLijyjNjj2J2.m', 'teacher', 'male', '2017-10-10 20:00:55'),
(2, 'bbb@bbb.com', 'bbb', 'bbb', '$2y$10$1Rdhk2l8Nm6TrXMwKh2gHuk.GdZJV/Urgfuwa0PUfbate.CIyLFJe', 'developer', 'male', '2017-10-10 20:10:23'),
(9, 'ccc@ccc.com', 'ccc', 'ccc', '$2y$10$4wxvfZorsMO.ueTbssVhJ.3IOLynleHMn9mvHtnCKdXKAzuE/R/WO', 'teacher', 'male', '2017-10-10 20:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_no` int(11) NOT NULL,
  `subarea_id` int(11) NOT NULL,
  `questioner_email` varchar(150) DEFAULT NULL,
  `question_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `question` text,
  `question_score` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_no`, `subarea_id`, `questioner_email`, `question_date`, `question`, `question_score`) VALUES
(2, 4, 'someone2@gmail.com', '2017-10-17 02:57:50', 'some question2 ?', 0),
(3, 4, 'someone@gmail.com', '2017-10-17 02:58:20', 'some question2 ?', 0),
(4, 10, 'someone@gmail.com', '2017-10-17 02:58:57', 'some question ?', -3),
(5, 10, 'someone@yahoo.com', '2017-10-17 03:03:55', 'question ?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions_subarea1`
--

CREATE TABLE `questions_subarea1` (
  `question_no` int(11) NOT NULL,
  `questioner_email` varchar(150) DEFAULT NULL,
  `question_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `question` text,
  `question_score` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions_subarea1`
--

INSERT INTO `questions_subarea1` (`question_no`, `questioner_email`, `question_date`, `question`, `question_score`) VALUES
(1, 'someone@gmail.com', '2017-10-17 02:40:43', 'some question', 0);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `requester_email` varchar(256) NOT NULL,
  `request_date` datetime NOT NULL,
  `request` text NOT NULL,
  `response` text NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_area`
--

CREATE TABLE `sub_area` (
  `id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `sub_area` varchar(150) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_area`
--

INSERT INTO `sub_area` (`id`, `area_id`, `sub_area`, `create_date`) VALUES
(4, 1, 'test', '2017-10-16 15:40:46'),
(5, 2, 'test2', '2017-10-16 15:40:50'),
(7, 3, 'sth', '2017-10-16 15:40:56'),
(9, 1, 'test_test', '2017-10-16 15:42:58'),
(10, 4, 'subarea1', '2017-10-16 17:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `id` int(11) NOT NULL,
  `subarea_id` int(11) NOT NULL,
  `tutorial_name` varchar(150) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `membership_no` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`id`, `subarea_id`, `tutorial_name`, `type`, `membership_no`, `create_date`) VALUES
(1, 10, 'subarea1_tutorial1', 'general', 9, '2017-10-16 19:35:18'),
(3, 10, 'subarea1_tutorial2', 'video', 9, '2017-10-16 19:36:09'),
(4, 10, 'subarea1_tutorial3', 'audio', 9, '2017-10-16 19:36:31'),
(5, 4, 'test_tutorial1', 'general', 9, '2017-10-16 19:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `useful_resource`
--

CREATE TABLE `useful_resource` (
  `resource_id` int(11) NOT NULL,
  `sub_area` varchar(50) NOT NULL,
  `resource` varchar(256) NOT NULL,
  `tutorial_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `membership_no` (`membership_no`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_no`),
  ADD UNIQUE KEY `membership_no` (`membership_email`),
  ADD UNIQUE KEY `question_no` (`question_no`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `area` (`area`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`),
  ADD UNIQUE KEY `membership_no` (`membership_no`);

--
-- Indexes for table `content_audio`
--
ALTER TABLE `content_audio`
  ADD PRIMARY KEY (`page_no`),
  ADD UNIQUE KEY `navbarItem` (`navbarItem`),
  ADD KEY `tutorial_id` (`tutorial_id`) USING BTREE;

--
-- Indexes for table `content_general`
--
ALTER TABLE `content_general`
  ADD PRIMARY KEY (`page_no`),
  ADD UNIQUE KEY `navbarItem` (`navbarItem`),
  ADD KEY `tutorial_id` (`tutorial_id`) USING BTREE;

--
-- Indexes for table `content_video`
--
ALTER TABLE `content_video`
  ADD PRIMARY KEY (`page_no`),
  ADD UNIQUE KEY `navbarItem` (`navbarItem`),
  ADD KEY `tutorial_id` (`tutorial_id`) USING BTREE;

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`question_no`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`membership_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_no`),
  ADD KEY `subarea_id` (`subarea_id`);

--
-- Indexes for table `questions_subarea1`
--
ALTER TABLE `questions_subarea1`
  ADD PRIMARY KEY (`question_no`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `sub_area`
--
ALTER TABLE `sub_area`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_area` (`sub_area`),
  ADD KEY `area_id` (`area_id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tutorial_name` (`tutorial_name`) USING BTREE,
  ADD KEY `subarea_id` (`subarea_id`),
  ADD KEY `membership_no` (`membership_no`);

--
-- Indexes for table `useful_resource`
--
ALTER TABLE `useful_resource`
  ADD PRIMARY KEY (`resource_id`),
  ADD UNIQUE KEY `tutorial_id` (`tutorial_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content_audio`
--
ALTER TABLE `content_audio`
  MODIFY `page_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content_general`
--
ALTER TABLE `content_general`
  MODIFY `page_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `content_video`
--
ALTER TABLE `content_video`
  MODIFY `page_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `membership_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `questions_subarea1`
--
ALTER TABLE `questions_subarea1`
  MODIFY `question_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_area`
--
ALTER TABLE `sub_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `useful_resource`
--
ALTER TABLE `useful_resource`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`membership_email`) REFERENCES `registrationdb`.`member` (`membership_no`) ON UPDATE CASCADE;

--
-- Constraints for table `sub_area`
--
ALTER TABLE `sub_area`
  ADD CONSTRAINT `sub_area_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD CONSTRAINT `tutorial_ibfk_1` FOREIGN KEY (`subarea_id`) REFERENCES `sub_area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tutorial_ibfk_2` FOREIGN KEY (`membership_no`) REFERENCES `member` (`membership_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
