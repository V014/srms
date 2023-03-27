-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2021 at 11:21 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(2) NOT NULL,
  `Username` varchar(12) DEFAULT NULL,
  `Password` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Username`, `Password`) VALUES
(1, 'Wanga', 'Wanga2020');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(7) NOT NULL,
  `ForumID` int(7) NOT NULL,
  `Username` varchar(16) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Comment` text NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Likes` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `ForumID`, `Username`, `Email`, `Comment`, `Date`, `Time`, `Likes`) VALUES
(1, 1, 'Troy', 'troygrin@gmail.com', 'It would be nice to have specific selections of food. Like rice, nsima, chips and maybe spaghetti as our main courses and relish is up to the caterers.', '2021-02-14', '12:09:09', 2),
(2, 1, 'Alex', 'alexporter@gmail.com', 'I agree, If we could have drinks and other sorts of food, it would be an excellent deal for us.', '2021-02-15', '10:05:07', 5);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(4) NOT NULL,
  `StudentID` int(4) NOT NULL,
  `Message` text NOT NULL,
  `Date` date DEFAULT NULL,
  `Time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ID`, `StudentID`, `Message`, `Date`, `Time`) VALUES
(2, 1, 'can I track my roommate?', '2021-02-15', '08:32:17'),
(3, 1, 'Where do I post a comment?', '2021-02-15', '08:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `ID` int(7) NOT NULL,
  `Topic` varchar(50) NOT NULL,
  `Leader` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leaving`
--

CREATE TABLE `leaving` (
  `ID` int(4) NOT NULL,
  `StudentID` int(4) NOT NULL,
  `Reason` varchar(30) DEFAULT NULL,
  `Explanation` varchar(100) DEFAULT NULL,
  `RoomID` int(2) NOT NULL,
  `Date` datetime NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `ID` int(7) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Notice` text NOT NULL,
  `Datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`ID`, `Title`, `Notice`, `Datetime`) VALUES
(1, 'Welcome', 'Dear students, we thank you for using our system to manage your stay, we will be having forums on the forum section and would like you to participate, they are in the interest of improving our services towards you, Thank you.', '2021-02-16 12:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `ID` int(7) NOT NULL,
  `FeedbackId` int(7) NOT NULL,
  `Message` text NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`ID`, `FeedbackId`, `Message`, `Date`, `Time`) VALUES
(1, 2, 'We are planning on adding features to the system that will enable you track your roommate. Your UI will be automatically updated as the features are added.', '2021-02-15', '21:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `ID` int(5) NOT NULL,
  `StudentID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `ID` int(2) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `Capacity` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`ID`, `Name`, `Gender`, `Capacity`) VALUES
(1, 'Chester', 'Male', 2),
(2, 'Wellington', 'Male', 3),
(3, 'Xavier', 'Male', 2),
(4, 'Edwin', 'Male', 3),
(5, 'Esther', 'Female', 2),
(6, 'Stacey', 'Female', 3),
(7, 'Jennifer', 'Female', 2),
(8, 'Jenny', 'Female', 3);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(4) NOT NULL,
  `FirstName` varchar(10) NOT NULL,
  `LastName` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `Username` varchar(16) DEFAULT NULL,
  `Password` varchar(12) NOT NULL,
  `Balance` int(7) DEFAULT NULL,
  `Joined` date NOT NULL,
  `LastEntry` datetime NOT NULL,
  `Imagedir` varchar(30) DEFAULT NULL,
  `Bio` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `FirstName`, `LastName`, `Email`, `Gender`, `Username`, `Password`, `Balance`, `Joined`, `LastEntry`, `Imagedir`, `Bio`) VALUES
(1, 'Troy', 'Grin', 'troygrin@gmail.com', 'Male', 'Troy', 'Grin2020', 2000, '2021-01-04', '2021-02-18 12:05:31', '', ''),
(2, 'Alex', 'Porter', 'alexporter@gmail.com', 'Male', 'Alex', 'Porter2020', 0, '2021-01-04', '2021-02-14 01:17:20', '', ''),
(3, 'James', 'Hilton', 'jameshilton@gmail.com', 'Male', 'James', 'Hilton2020', 0, '2021-01-05', '2021-02-14 01:17:20', '', ''),
(4, 'Emily', 'Linch', 'emilylinch@gmail.com', 'Female', 'Emily', 'Linch2020', 0, '2021-01-05', '2021-02-14 01:17:20', '', ''),
(5, 'Ashley', 'Tim', 'ashleytim@gmail.com', 'Female', 'Ashley', 'Tim2020', 0, '2021-01-05', '2021-02-14 01:17:20', '', ''),
(6, 'Vanesa', 'Denim', 'vanesadenim', 'Female', 'Vanesa', 'Vanesa2020', 1000, '2021-01-06', '2021-02-14 01:17:20', '', ''),
(7, 'Paul', 'Diggers', 'pauldig@yahoo.com', 'Male', 'Paul', 'butter', 0, '2021-01-06', '2021-02-14 01:17:20', '', ''),
(8, 'Ashley', 'Weather', 'ashleyweather@gmail.com', 'Female', 'Weather', 'Weather2020', 0, '2021-01-07', '2021-02-14 01:17:20', '', ''),
(9, 'Alexa', 'Tim', 'alexatim@gmail.com', 'Female', 'Alexa', 'Alexa2020', 0, '2021-01-07', '2021-02-14 01:17:20', '', ''),
(10, 'Eddie', 'Mercury', 'eddiemercury@gmail.com', 'Male', 'Eddie', 'Eddie2020', 0, '2021-01-07', '2021-02-14 01:17:20', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_rooms`
--

CREATE TABLE `student_rooms` (
  `StudentID` int(4) NOT NULL,
  `RoomID` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_rooms`
--

INSERT INTO `student_rooms` (`StudentID`, `RoomID`) VALUES
(3, 1),
(2, 1),
(5, 5),
(4, 5),
(6, 6),
(1, 2),
(7, 2),
(9, 6),
(10, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `leaving`
--
ALTER TABLE `leaving`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `student_rooms`
--
ALTER TABLE `student_rooms`
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `RoomID` (`RoomID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `ID` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaving`
--
ALTER TABLE `leaving`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
