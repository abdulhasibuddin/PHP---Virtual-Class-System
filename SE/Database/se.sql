-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2017 at 01:35 PM
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
-- Database: `se`
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
  `membership_no` int(11) NOT NULL,
  `answer_date` datetime NOT NULL,
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
(54, 'Physics', '2017-10-11 17:40:36'),
(57, 'Mathematics', '2017-10-11 17:47:12'),
(73, 'Biology', '2017-10-11 18:52:58'),
(80, 'Chemistry', '2017-10-12 11:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `audio_content`
--

CREATE TABLE `audio_content` (
  `audio_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `audio_location` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `biology`
--

CREATE TABLE `biology` (
  `id` int(11) NOT NULL,
  `sub_area` varchar(150) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chemistry`
--

CREATE TABLE `chemistry` (
  `id` int(11) NOT NULL,
  `sub_area` varchar(150) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chemistry`
--

INSERT INTO `chemistry` (`id`, `sub_area`, `create_date`) VALUES
(1, 'Organic_Chemistry', '2017-10-12 11:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `english`
--

CREATE TABLE `english` (
  `id` int(11) NOT NULL,
  `sub_area` varchar(150) DEFAULT NULL,
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
-- Table structure for table `mathematics`
--

CREATE TABLE `mathematics` (
  `id` int(11) NOT NULL,
  `sub_area` varchar(150) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mathematics`
--

INSERT INTO `mathematics` (`id`, `sub_area`, `create_date`) VALUES
(1, 'Conics', '2017-10-12 08:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `mechanics`
--

CREATE TABLE `mechanics` (
  `id` int(11) NOT NULL,
  `tutorial` varchar(150) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
-- Table structure for table `organic_chemistry`
--

CREATE TABLE `organic_chemistry` (
  `id` int(11) NOT NULL,
  `tutorial` varchar(150) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pdf_content`
--

CREATE TABLE `pdf_content` (
  `pdf_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `pdf_location` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physics`
--

CREATE TABLE `physics` (
  `id` int(11) NOT NULL,
  `sub_area` varchar(150) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `physics`
--

INSERT INTO `physics` (`id`, `sub_area`, `create_date`) VALUES
(4, 'Mechanics', '2017-10-12 11:14:05'),
(5, 'Organic_Chemistry', '2017-10-12 11:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `psychology`
--

CREATE TABLE `psychology` (
  `id` int(11) NOT NULL,
  `sub_area` varchar(150) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_no` int(11) NOT NULL,
  `questioner_email` varchar(256) NOT NULL,
  `sub_area` varchar(150) NOT NULL,
  `question_date` datetime NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `sociology`
--

CREATE TABLE `sociology` (
  `id` int(11) NOT NULL,
  `sub_area` varchar(150) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sth`
--

CREATE TABLE `sth` (
  `id` int(11) NOT NULL,
  `sub_area` varchar(150) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_area`
--

CREATE TABLE `sub_area` (
  `id` int(11) NOT NULL,
  `area` varchar(150) NOT NULL,
  `sub_area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_area`
--

INSERT INTO `sub_area` (`id`, `area`, `sub_area`) VALUES
(4, 'Mathematics', 'Conics'),
(5, 'CSE', 'Software Engineering'),
(6, 'Chemistry', 'Organic Chemistry'),
(7, 'Biology', 'Micro-biology');

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `tutorial_id` int(11) NOT NULL,
  `area` varchar(50) NOT NULL,
  `tutorial_type` varchar(50) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `video_content`
--

CREATE TABLE `video_content` (
  `video_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `video_location` varchar(256) NOT NULL
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
  ADD UNIQUE KEY `membership_no` (`membership_no`),
  ADD UNIQUE KEY `question_no` (`question_no`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `area` (`area`);

--
-- Indexes for table `audio_content`
--
ALTER TABLE `audio_content`
  ADD PRIMARY KEY (`audio_id`),
  ADD UNIQUE KEY `author_id` (`author_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`),
  ADD UNIQUE KEY `membership_no` (`membership_no`);

--
-- Indexes for table `biology`
--
ALTER TABLE `biology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chemistry`
--
ALTER TABLE `chemistry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `english`
--
ALTER TABLE `english`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`question_no`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `mathematics`
--
ALTER TABLE `mathematics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mechanics`
--
ALTER TABLE `mechanics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`membership_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `organic_chemistry`
--
ALTER TABLE `organic_chemistry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf_content`
--
ALTER TABLE `pdf_content`
  ADD PRIMARY KEY (`pdf_id`),
  ADD UNIQUE KEY `author_id` (`author_id`);

--
-- Indexes for table `physics`
--
ALTER TABLE `physics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psychology`
--
ALTER TABLE `psychology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_no`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `sociology`
--
ALTER TABLE `sociology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sth`
--
ALTER TABLE `sth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_area`
--
ALTER TABLE `sub_area`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `area` (`area`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`tutorial_id`),
  ADD UNIQUE KEY `author_id` (`author_id`);

--
-- Indexes for table `useful_resource`
--
ALTER TABLE `useful_resource`
  ADD PRIMARY KEY (`resource_id`),
  ADD UNIQUE KEY `tutorial_id` (`tutorial_id`);

--
-- Indexes for table `video_content`
--
ALTER TABLE `video_content`
  ADD PRIMARY KEY (`video_id`),
  ADD UNIQUE KEY `author_id` (`author_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `audio_content`
--
ALTER TABLE `audio_content`
  MODIFY `audio_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `biology`
--
ALTER TABLE `biology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chemistry`
--
ALTER TABLE `chemistry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `english`
--
ALTER TABLE `english`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mathematics`
--
ALTER TABLE `mathematics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mechanics`
--
ALTER TABLE `mechanics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `membership_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `organic_chemistry`
--
ALTER TABLE `organic_chemistry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pdf_content`
--
ALTER TABLE `pdf_content`
  MODIFY `pdf_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `physics`
--
ALTER TABLE `physics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `psychology`
--
ALTER TABLE `psychology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sociology`
--
ALTER TABLE `sociology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sth`
--
ALTER TABLE `sth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_area`
--
ALTER TABLE `sub_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `tutorial_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `useful_resource`
--
ALTER TABLE `useful_resource`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `video_content`
--
ALTER TABLE `video_content`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `request` (`admin_id`) ON UPDATE CASCADE;

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_no`) REFERENCES `question` (`question_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`membership_no`) REFERENCES `registrationdb`.`member` (`membership_no`) ON UPDATE CASCADE;

--
-- Constraints for table `audio_content`
--
ALTER TABLE `audio_content`
  ADD CONSTRAINT `audio_content_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`) ON UPDATE CASCADE;

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `pdf_content` (`author_id`) ON UPDATE CASCADE;

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD CONSTRAINT `tutorial_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`) ON UPDATE CASCADE;

--
-- Constraints for table `useful_resource`
--
ALTER TABLE `useful_resource`
  ADD CONSTRAINT `useful_resource_ibfk_1` FOREIGN KEY (`tutorial_id`) REFERENCES `tutorial` (`tutorial_id`) ON UPDATE CASCADE;

--
-- Constraints for table `video_content`
--
ALTER TABLE `video_content`
  ADD CONSTRAINT `video_content_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
