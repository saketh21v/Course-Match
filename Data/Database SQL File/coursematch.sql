-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2016 at 08:34 PM
-- Server version: 5.6.25-log
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursematch`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Name` varchar(40) NOT NULL,
  `Department` varchar(40) NOT NULL,
  `Credits` tinyint(1) NOT NULL,
  `Avg_Rating` decimal(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Name`, `Department`, `Credits`, `Avg_Rating`) VALUES
('CA', 'CSE', 3, '1.8');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID` varchar(10) NOT NULL,
  `Student_ID` varchar(10) NOT NULL,
  `Course` varchar(40) NOT NULL,
  `Rating` decimal(2,1) NOT NULL,
  `Year` int(4) NOT NULL,
  `Semester` tinyint(1) NOT NULL,
  `Feedback` varchar(200) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ID`, `Student_ID`, `Course`, `Rating`, `Year`, `Semester`, `Feedback`, `TimeStamp`) VALUES
('123', '12', 'CA', '2.4', 23, 2, 'sdfghjkl', '2016-04-14 18:32:53'),
('20', '12', 'CA', '1.2', 123, 32, 'yuqweoqwri\r\n', '2016-04-14 18:33:17');

--
-- Triggers `feedback`
--
DELIMITER $$
CREATE TRIGGER `CourseRatingUpdater` AFTER INSERT ON `feedback` FOR EACH ROW UPDATE course SET course.Avg_Rating=(SELECT AVG(feedback.Rating) FROM feedback WHERE feedback.course=new.course) WHERE course.Name = new.course
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `First_Name` varchar(30) NOT NULL,
  `Second_Name` varchar(30) NOT NULL,
  `ID` varchar(10) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `About` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `professor`
--
DELIMITER $$
CREATE TRIGGER `CascadeDeleteEMailProf` AFTER DELETE ON `professor` FOR EACH ROW DELETE FROM professor_email WHERE ID=old.ID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `professor_email`
--

CREATE TABLE `professor_email` (
  `ID` varchar(10) NOT NULL,
  `Email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `professor_email`
--
DELIMITER $$
CREATE TRIGGER `CascadeDeletePhoneProf` AFTER DELETE ON `professor_email` FOR EACH ROW DELETE FROM professor_phone_no WHERE ID=old.ID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `professor_phone_no`
--

CREATE TABLE `professor_phone_no` (
  `ID` varchar(10) NOT NULL,
  `Phone_No` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` varchar(10) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Courses` varchar(50) NOT NULL,
  `Stream` varchar(50) NOT NULL,
  `Join_Year` smallint(4) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `Password`, `Courses`, `Stream`, `Join_Year`, `First_Name`, `Last_Name`) VALUES
('12', 'asdf', 'wert', 'wert', 123, 'zxcvas', 'asdfzxcv');

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `CascadeDeleteEmail` AFTER DELETE ON `student` FOR EACH ROW DELETE FROM student_email WHERE ID=old.ID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `FeedbackDeleter` BEFORE DELETE ON `student` FOR EACH ROW DELETE FROM feedback WHERE student_ID=old.ID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_email`
--

CREATE TABLE `student_email` (
  `ID` varchar(10) NOT NULL DEFAULT '',
  `Email` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `student_email`
--
DELIMITER $$
CREATE TRIGGER `CascadeDeletePhone` AFTER DELETE ON `student_email` FOR EACH ROW DELETE FROM student_phone_no WHERE ID=old.ID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_phone_no`
--

CREATE TABLE `student_phone_no` (
  `ID` varchar(10) NOT NULL DEFAULT '',
  `Phone_No` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
