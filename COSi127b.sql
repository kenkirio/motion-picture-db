-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2024 at 01:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `COSi127b`
--

-- --------------------------------------------------------

--
-- Table structure for table `Award`
--

CREATE TABLE `Award` (
  `mpid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `award_name` char(20) NOT NULL,
  `award_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Award`
--

INSERT INTO `Award` (`mpid`, `pid`, `award_name`, `award_year`) VALUES
(3, 5, 'Supporting Actor', 2023),
(3, 6, 'Supporting Actor', 2024),
(4, 7, 'Rising Star', 2021),
(4, 8, 'Best Actor, Series', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `Genre`
--

CREATE TABLE `Genre` (
  `mpid` int(11) NOT NULL,
  `genre_name` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Genre`
--

INSERT INTO `Genre` (`mpid`, `genre_name`) VALUES
(1, 'Comedy'),
(2, 'History'),
(3, 'Dramedy'),
(4, 'Drama');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(12) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `first_name`, `last_name`, `age`) VALUES
(444, 'Gregory', 'Smith', 32),
(555, 'Hannah', 'Birch', 17),
(666, 'Bob', 'Dylan', 58);

-- --------------------------------------------------------

--
-- Table structure for table `Likes`
--

CREATE TABLE `Likes` (
  `uemail` char(30) NOT NULL,
  `mpid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Likes`
--

INSERT INTO `Likes` (`uemail`, `mpid`) VALUES
('alex@gmail.com', 1),
('alex@gmail.com', 2),
('alex@gmail.com', 3),
('bob@yahoo.com', 4),
('ken@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Location`
--

CREATE TABLE `Location` (
  `mpid` int(11) NOT NULL,
  `zip` int(11) NOT NULL,
  `city` char(20) DEFAULT NULL,
  `country` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Location`
--

INSERT INTO `Location` (`mpid`, `zip`, `city`, `country`) VALUES
(1, 90291, 'Los Angeles', 'USA'),
(2, 87545, 'Los Alamos', 'USA'),
(3, 96753, 'Wailea', 'USA'),
(4, 11131, 'Stockholm', 'Sweden');

-- --------------------------------------------------------

--
-- Table structure for table `Member`
--

CREATE TABLE `Member` (
  `uemail` char(30) NOT NULL,
  `NAME` char(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Member`
--

INSERT INTO `Member` (`uemail`, `NAME`, `age`) VALUES
('alex@gmail.com', 'Alex', 21),
('bob@yahoo.com', 'Bob', 68),
('ken@gmail.com', 'Ken', 22);

-- --------------------------------------------------------

--
-- Table structure for table `MotionPicture`
--

CREATE TABLE `MotionPicture` (
  `mpid` int(11) NOT NULL,
  `NAME` char(30) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `production` char(20) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `MotionPicture`
--

INSERT INTO `MotionPicture` (`mpid`, `NAME`, `rating`, `production`, `budget`) VALUES
(1, 'Barbie', 6.9, 'Warner Bros.', 100000000),
(2, 'Oppenheimer', 8.4, 'Universal', 100000000),
(3, 'The White Lotus', 8, 'Rip Cord', 80000000),
(4, 'Young Royals', 8.3, 'Nexiko AB', 82000000);

-- --------------------------------------------------------

--
-- Table structure for table `Movie`
--

CREATE TABLE `Movie` (
  `mpid` int(11) NOT NULL,
  `boxoffice_collection` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Movie`
--

INSERT INTO `Movie` (`mpid`, `boxoffice_collection`) VALUES
(1, 162022044),
(2, 82455420);

-- --------------------------------------------------------

--
-- Table structure for table `People`
--

CREATE TABLE `People` (
  `pid` int(11) NOT NULL,
  `NAME` char(20) DEFAULT NULL,
  `nationality` char(30) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `People`
--

INSERT INTO `People` (`pid`, `NAME`, `nationality`, `dob`, `gender`) VALUES
(1, 'Margot Robbie', 'Australia', '1990-07-02', 'Female'),
(2, 'Ryan Gosling', 'Canada', '1980-11-12', 'Male'),
(3, 'Cillian Murphy', 'Ireland', '1976-05-25', 'Male'),
(4, 'Emily Blunt', 'England', '1983-02-23', 'Female'),
(5, 'Jennifer Coolidge', 'USA', '1961-08-28', 'Female'),
(6, 'Jon Gries', 'USA', '1957-06-17', 'Male'),
(7, 'Edvyn Ryding', 'Sweden', '2003-02-04', 'Male'),
(8, 'Omar Rudeberg', 'Venezuela', '1998-11-12', 'Male'),
(9, 'Rojda Sekersöz', 'Sweden', '1989-12-25', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `mpid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `role_name` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`mpid`, `pid`, `role_name`) VALUES
(1, 1, 'Actor'),
(1, 2, 'Actor'),
(2, 3, 'Actor'),
(2, 4, 'Actor'),
(3, 5, 'Actor'),
(3, 6, 'Actor'),
(4, 7, 'Actor'),
(4, 8, 'Actor'),
(4, 9, 'Director');

-- --------------------------------------------------------

--
-- Table structure for table `Series`
--

CREATE TABLE `Series` (
  `mpid` int(11) NOT NULL,
  `season_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Series`
--

INSERT INTO `Series` (`mpid`, `season_count`) VALUES
(3, 2),
(4, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Award`
--
ALTER TABLE `Award`
  ADD PRIMARY KEY (`mpid`,`pid`,`award_name`,`award_year`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `Genre`
--
ALTER TABLE `Genre`
  ADD PRIMARY KEY (`mpid`,`genre_name`);

--
-- Indexes for table `Likes`
--
ALTER TABLE `Likes`
  ADD PRIMARY KEY (`uemail`,`mpid`),
  ADD KEY `mpid` (`mpid`);

--
-- Indexes for table `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`mpid`,`zip`);

--
-- Indexes for table `Member`
--
ALTER TABLE `Member`
  ADD PRIMARY KEY (`uemail`);

--
-- Indexes for table `MotionPicture`
--
ALTER TABLE `MotionPicture`
  ADD PRIMARY KEY (`mpid`);

--
-- Indexes for table `Movie`
--
ALTER TABLE `Movie`
  ADD PRIMARY KEY (`mpid`);

--
-- Indexes for table `People`
--
ALTER TABLE `People`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`mpid`,`pid`,`role_name`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `Series`
--
ALTER TABLE `Series`
  ADD PRIMARY KEY (`mpid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Award`
--
ALTER TABLE `Award`
  ADD CONSTRAINT `award_ibfk_1` FOREIGN KEY (`mpid`) REFERENCES `MotionPicture` (`mpid`),
  ADD CONSTRAINT `award_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `People` (`pid`);

--
-- Constraints for table `Genre`
--
ALTER TABLE `Genre`
  ADD CONSTRAINT `genre_ibfk_1` FOREIGN KEY (`mpid`) REFERENCES `MotionPicture` (`mpid`);

--
-- Constraints for table `Likes`
--
ALTER TABLE `Likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`uemail`) REFERENCES `Member` (`uemail`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`mpid`) REFERENCES `MotionPicture` (`mpid`);

--
-- Constraints for table `Location`
--
ALTER TABLE `Location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`mpid`) REFERENCES `MotionPicture` (`mpid`);

--
-- Constraints for table `Movie`
--
ALTER TABLE `Movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`mpid`) REFERENCES `MotionPicture` (`mpid`);

--
-- Constraints for table `Role`
--
ALTER TABLE `Role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`mpid`) REFERENCES `MotionPicture` (`mpid`),
  ADD CONSTRAINT `role_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `People` (`pid`);

--
-- Constraints for table `Series`
--
ALTER TABLE `Series`
  ADD CONSTRAINT `series_ibfk_1` FOREIGN KEY (`mpid`) REFERENCES `MotionPicture` (`mpid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
