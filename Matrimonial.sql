-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2020 at 04:35 PM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Matrimonial`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`hardik`@`localhost` PROCEDURE `addcomplain` (IN `email` VARCHAR(30), IN `complain` VARCHAR(200), IN `isactive` INT(1))  NO SQL
INSERT INTO complain (Email,Complain,isactive)VALUES(email,complain,isactive)$$

CREATE DEFINER=`hardik`@`localhost` PROCEDURE `addfeedback` (IN `email` VARCHAR(30), IN `feedback` VARCHAR(200), IN `isactive` INT(1))  NO SQL
INSERT INTO feedback (Email,Feedback,isactive)VALUES(email,feedback,isactive)$$

CREATE DEFINER=`hardik`@`localhost` PROCEDURE `reg` (IN `fname` VARCHAR(20), IN `lname` VARCHAR(20), IN `email` VARCHAR(30), IN `phone` VARCHAR(10), IN `gender` VARCHAR(6), IN `image` VARCHAR(30), IN `password` VARCHAR(20), IN `dob` VARCHAR(20), IN `state` INT(1), IN `city` INT(1), IN `address` VARCHAR(100), IN `postal` VARCHAR(10), IN `religion` INT(2), IN `cast` VARCHAR(30), IN `education` INT(2), IN `occupation` INT(2), IN `squestion` INT(2), IN `answer` VARCHAR(20), IN `isactive` INT(1))  NO SQL
INSERT INTO user (First_Name,Last_Name,Email,Phone,Gender,Image,Password,DOB,State,City,Address,Postal_code,Religion,Cast,Education,Occupation,Securityque,Securityans,isactive) VALUES(fname,lname,email,phone,gender,image,password,dob,state,city,address,postal,religion,cast,education,occupation,squestion,answer,isactive)$$

CREATE DEFINER=`hardik`@`localhost` PROCEDURE `selectsecurity` (IN `isactive` INT(1))  NO SQL
SELECT * FROM security_que WHERE isactive$$

CREATE DEFINER=`hardik`@`localhost` PROCEDURE `selectstate` (IN `isactive` INT(1))  NO SQL
SELECT * FROM state where isactive$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `Cityid` int(11) NOT NULL,
  `Stid` int(2) NOT NULL,
  `Cityname` varchar(20) NOT NULL,
  `isactive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`Cityid`, `Stid`, `Cityname`, `isactive`) VALUES
(1, 1, 'Ahemdabad', 1),
(2, 1, 'Baroda', 1),
(3, 2, 'Amritsar', 1),
(4, 2, 'Jalindar', 1),
(5, 3, 'Mumbai', 1),
(6, 3, 'Pune', 1),
(16, 1, 'Surat', 1),
(17, 14, 'Indor', 1),
(18, 1, 'Diu', 1),
(20, 1, 'Daman', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `Cid` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Complain` varchar(200) NOT NULL,
  `isactive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`Cid`, `Email`, `Complain`, `isactive`) VALUES
(1, 'hello@gmail.com', 'hello', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_inq`
--

CREATE TABLE `contact_inq` (
  `Inq_id` int(11) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Message` varchar(200) NOT NULL,
  `isactive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_inq`
--

INSERT INTO `contact_inq` (`Inq_id`, `First_Name`, `Last_Name`, `Email`, `Subject`, `Message`, `isactive`) VALUES
(1, 'hardik', 'rana', 'hardik@gmail.com', 'regarding subscription', 'how mant packages are available', 1),
(4, 'hardik', 'rana', 'hardik1010@gmail.com', 'Regarding Subscription', 'I would like to ask about how many plans are available.', 1),
(9, 'parth', 'patel', 'parth@gmail.com', 'regarding packages', 'how many packages are available?', 1),
(10, 'Pooja', 'Shah', 'pooja@gmail.com', 'hello', 'hello', 1);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `Eid` int(11) NOT NULL,
  `Ename` varchar(30) NOT NULL,
  `isactive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`Eid`, `Ename`, `isactive`) VALUES
(1, '10th', 1),
(2, '12th', 1),
(3, 'Graduate', 1),
(4, 'Post Graduate', 1),
(5, 'Other', 1),
(8, 'Msc.It', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Fid` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Feedback` varchar(200) NOT NULL,
  `isactive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Fid`, `Email`, `Feedback`, `isactive`) VALUES
(2, 'hardik@gmail.com', 'best plateform to find life partner', 1);

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `Fid` int(11) NOT NULL,
  `User` int(3) NOT NULL,
  `Friend` int(3) NOT NULL,
  `isactive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`Fid`, `User`, `Friend`, `isactive`) VALUES
(13, 1, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Message`
--

CREATE TABLE `Message` (
  `Mid` int(11) NOT NULL,
  `Sid` int(5) NOT NULL,
  `Rid` int(5) NOT NULL,
  `Message` varchar(100) NOT NULL,
  `isactive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Message`
--

INSERT INTO `Message` (`Mid`, `Sid`, `Rid`, `Message`, `isactive`) VALUES
(2, 7, 1, 'hardik', 1),
(4, 1, 7, 'hello how are you', 1),
(5, 1, 7, 'Hello How are you?', 1),
(6, 1, 7, 'Where are you?', 1),
(7, 1, 7, 'Are you fine?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_later`
--

CREATE TABLE `news_later` (
  `Nid` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `isactive` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_later`
--

INSERT INTO `news_later` (`Nid`, `Email`, `isactive`) VALUES
(1, 'hardik@gmail.com', 1),
(4, 'hardik1010@gmail.com', 1),
(5, 'jainamkothari1999@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE `occupation` (
  `Oid` int(11) NOT NULL,
  `Oname` varchar(30) NOT NULL,
  `isactive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`Oid`, `Oname`, `isactive`) VALUES
(1, 'Student', 1),
(2, 'Jober ', 1),
(3, 'Business Man', 1),
(4, 'Government Officer', 1),
(10, 'other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `Rid` int(11) NOT NULL,
  `Rname` varchar(30) NOT NULL,
  `isactive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`Rid`, `Rname`, `isactive`) VALUES
(1, 'Hindu', 1),
(2, 'Muslim', 1),
(3, 'Sikh', 1),
(4, 'Buddhist', 1),
(5, 'Other', 1),
(6, 'Parsi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Rid` int(11) NOT NULL,
  `Sender` int(2) NOT NULL,
  `Reciever` varchar(30) NOT NULL,
  `isactive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`Rid`, `Sender`, `Reciever`, `isactive`) VALUES
(35, 5, 'pooja@gmail.com', 1),
(38, 7, 'jainam@gmail.com', 1),
(39, 7, 'q@gmail.com', 1),
(40, 7, 'tonny@gmail.com', 1),
(41, 7, 'parth@gmail.com', 1),
(42, 7, 'hardikrana@gmail.com', 1),
(43, 7, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `security_que`
--

CREATE TABLE `security_que` (
  `Sqid` int(11) NOT NULL,
  `Sqname` varchar(50) NOT NULL,
  `isactive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security_que`
--

INSERT INTO `security_que` (`Sqid`, `Sqname`, `isactive`) VALUES
(1, 'What is your favourite color ?', 1),
(2, 'What is your favourite food ?', 1),
(3, 'What is your favourite Movie ?', 1),
(4, 'what is your favourite place ?', 1),
(5, 'What is your School Name ?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `Stid` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `isactive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`Stid`, `Name`, `isactive`) VALUES
(1, 'Gujarat', 1),
(2, 'Punjab', 1),
(3, 'Maharstra', 1),
(4, 'Delhi', 1),
(13, 'Rajasthan', 1),
(14, 'UP', 1),
(15, 'MP', 1),
(16, 'Kasmir', 1),
(17, 'Hariyana', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Uid` int(11) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `State` int(2) NOT NULL,
  `City` int(2) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Postal_code` varchar(6) NOT NULL,
  `Religion` int(2) NOT NULL,
  `Cast` varchar(20) NOT NULL,
  `Education` int(2) NOT NULL,
  `Occupation` int(2) NOT NULL,
  `Securityque` int(2) NOT NULL,
  `Securityans` varchar(50) NOT NULL,
  `isactive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Uid`, `First_Name`, `Last_Name`, `Email`, `Phone`, `Gender`, `Image`, `Password`, `DOB`, `State`, `City`, `Address`, `Postal_code`, `Religion`, `Cast`, `Education`, `Occupation`, `Securityque`, `Securityans`, `isactive`) VALUES
(1, 'hardik', 'Rana', 'hardik@gmail.com', '8511034838', 'Male', 'upload/avtar.png', 'hardik', '1992-01-05', 2, 3, 'abcd', '382225', 3, 'Rajput', 3, 3, 1, 'black', 1),
(2, 'Hardik', 'Rana', 'hardikrana@gmail.com', '8511034838', 'Male', 'upload/avtar.png', 'hello123', '1980-06-06', 2, 3, 'abcdef', '123456', 1, 'Brahmin', 4, 2, 1, 'red', 1),
(3, 'hardik', 'rama', 'q@gmail.com', '2323232323', 'Male', 'upload/avtar.png', 'hardik', '1994-03-19', 1, 2, 'abcd', '212345', 1, 'ssswws', 3, 2, 1, 'yellow', 1),
(4, 'Tonny', 'Khanna', 'tonny@gmail.com', '9876545679', 'Male', 'upload/avtar.png', '1234', '1995-04-21', 1, 1, 'Paldi', '380007', 1, 'Brahmin', 1, 1, 1, 'blue', 1),
(5, 'Tony', 'Khanna', 'tony@gmail.com', '1234567890', 'Male', 'upload/avtar.png', '1212', '1982-12-29', 1, 1, 'Paldi', '380007', 1, 'Brahmin', 1, 1, 2, 'pizza', 1),
(6, 'Jainam', 'Shah', 'jainam@gmail.com', '9876098765', 'Male', 'upload/avtar.png', '1234', '1987-06-23', 1, 1, 'Paldi', '380006', 1, 'Jain', 1, 1, 2, 'burger', 1),
(7, 'Pooja', 'Shah', 'pooja@gmail.com', '9876345653', 'Female', 'upload/avtar.png', '7890', '1989-11-14', 3, 6, 'Borivali', '868969', 3, 'Jain', 3, 2, 2, 'sandwitch', 1),
(8, 'Parth', 'Patel', 'parth@gmail.com', '7990674542', 'Male', 'upload/avtar.png', 'parth@6299#', '1999-01-21', 1, 1, 'Naroda', '399076', 1, 'Patel', 1, 1, 1, 'black', 1),
(9, 'Meet', 'Punekar', 'meet@gmail.com', '7359513700', 'Male', 'upload/avtar.png', 'meet@123', '1999-09-18', 1, 2, 'Nr shayaji rao Garden', '399076', 1, 'Brahmin', 4, 2, 2, 'Burger', 1),
(10, 'Hardik', 'Rana', 'hardik123@gmail.com', '8511034838', 'Male', 'upload/avtar.png', 'hardik..123', '2000-12-01', 2, 3, 'Nr golden tample', '382225', 4, 'Budhha', 5, 3, 4, 'golden tample', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`Cityid`),
  ADD KEY `Stid` (`Stid`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `contact_inq`
--
ALTER TABLE `contact_inq`
  ADD PRIMARY KEY (`Inq_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`Eid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Fid`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`Fid`);

--
-- Indexes for table `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`Mid`);

--
-- Indexes for table `news_later`
--
ALTER TABLE `news_later`
  ADD PRIMARY KEY (`Nid`);

--
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`Oid`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`Rid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Rid`);

--
-- Indexes for table `security_que`
--
ALTER TABLE `security_que`
  ADD PRIMARY KEY (`Sqid`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`Stid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Uid`),
  ADD KEY `State` (`State`),
  ADD KEY `City` (`City`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `Cityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `Cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact_inq`
--
ALTER TABLE `contact_inq`
  MODIFY `Inq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `Eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `Fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `Message`
--
ALTER TABLE `Message`
  MODIFY `Mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `news_later`
--
ALTER TABLE `news_later`
  MODIFY `Nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `Oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `Rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `Rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `security_que`
--
ALTER TABLE `security_que`
  MODIFY `Sqid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `Stid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`Stid`) REFERENCES `state` (`Stid`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`State`) REFERENCES `state` (`Stid`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`City`) REFERENCES `city` (`Cityid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
