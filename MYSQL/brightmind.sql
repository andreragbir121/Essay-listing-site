-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 04, 2025 at 05:53 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brightminds`
--

-- --------------------------------------------------------

--
-- Table structure for table `essay`
--

DROP TABLE IF EXISTS `essay`;
CREATE TABLE IF NOT EXISTS `essay` (
  `EssayID` int NOT NULL,
  `title` text NOT NULL,
  `content` longtext NOT NULL,
  `essay_date` date NOT NULL,
  `grade` char(1) NOT NULL,
  `studentName` text NOT NULL,
  `SchoolName` text NOT NULL,
  PRIMARY KEY (`EssayID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `instructorID` int NOT NULL,
  `fullName` text NOT NULL,
  `schoolName` enum('Penal_Secondary_School''','Shiva_Boys_Hindu_College','Iere_High_School','Debe_High_School') NOT NULL,
  `rating` int NOT NULL,
  `feedbackDate` int NOT NULL,
  PRIMARY KEY (`instructorID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
CREATE TABLE IF NOT EXISTS `school` (
  `schoolName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactNum` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`schoolName`, `address`, `contactNum`, `Email`) VALUES
('Penal_Secondary_School', 'Oliverie Drive Penal', '8682949285', 'penalsecondaryschool@gmail.com'),
('Shiva_Boys_Hindu_College', 'Clarke Road Penal', '8682548412', 'shivaboyshinducollege@gmail.com'),
('Iere_High_School', 'De Gannes Village Siparia ', '8682475512', 'ierehighschool@gmail.com'),
('Debe High School', 'M2 Ring Road Debe', '8682515812', 'debehighschool@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `pfp` varchar(255) DEFAULT NULL,
  `userType` enum('student','instructor') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `instructorID` varchar(5) DEFAULT NULL,
  `fullName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `birthDate` date NOT NULL,
  `parentName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `parentEmail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `schoolName` enum('Penal_Secondary_School','Shiva_Boys_Hindu_College','Iere_High_School','Debe_High_School') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `classLevel` enum('instructor','form1','form2','form3','form4','form5') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='only instructors are allowed an instructor id';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`pfp`, `userType`, `instructorID`, `fullName`, `email`, `username`, `birthDate`, `parentName`, `parentEmail`, `password`, `schoolName`, `classLevel`) VALUES
('1', 'student', '', 'Bruce charles', 'brucecharles@gmail.com', 'brucecharles', '2007-01-28', 'Nicole Charles', 'nicolecharles@gmail.com', 'password', 'Shiva_Boys_Hindu_College', 'form5'),
('1', 'student', '', 'Baron Joice', 'baron@gmail.com', 'BaronJoice', '2007-08-01', 'Irine Joice', 'Irine@gmail.com', 'password', 'Debe_High_School', 'form4'),
('1', 'student', '', 'Jenny Ally', 'JAlly@gmail.com', 'JennyAlly', '2009-05-18', 'karin Ally', 'AllyK@gmail.com', 'password', 'Iere_High_School', 'form3'),
('1', 'student', '', 'Christian teal', 'chris@gmail.com', 'chrisTeal', '2009-06-20', 'Leah Teal', 'leah@gmail.com', 'passsword', 'Penal_Secondary_School', 'form4'),
('1', 'student', '', 'Davon Key', 'Davon@gmail.com', 'DavonKey', '2007-05-01', 'Olive Key', 'olive@gmail.com', 'password', 'Penal_Secondary_School', 'form5'),
('1', 'student', '', 'Freddy Paul', 'Freddy@gmail.com', 'FredPaul', '2009-12-20', 'Harry Paul', 'HarryPaul@gmail.com', 'password', 'Debe_High_School', 'form2'),
('1', 'student', '', 'Jake Don', 'Jake@gmail.com', 'JakeDon', '2014-12-01', 'Kristine Don', 'Kristine@gmail.com', 'password', 'Iere_High_School', 'form1'),
('1', 'student', '', 'Kyle John', 'KyleJ@gmail.com', 'KyleJ', '2012-07-07', 'Donna John', 'Donna@gmail.com', 'password', 'Shiva_Boys_Hindu_College', 'form3'),
('1', 'student', '', 'Daliyah Nal', 'Daliyah@gmail.com', 'DaliyahNal', '2012-06-08', 'Jenna Nal', 'JennaNal@gmail.com', 'password', 'Iere_High_School', 'form1'),
('1', 'instructor', '001', 'Johnny Abraham', 'Johnny@gmail.com', 'Jabraham', '1990-04-01', '', '', 'password', 'Shiva_Boys_Hindu_College', 'instructor'),
('1', 'instructor', '002', 'Jared Li', 'jaredLi@gmail.com', 'JaredLi', '1990-09-29', '', '', 'password', 'Iere_High_School', 'instructor'),
('1', 'instructor', '003', 'Shiva Singh', 'shivasingh@gmail.com', 'shivasingh', '1985-09-20', '', '', 'password', 'Penal_Secondary_School', 'instructor'),
('1', 'instructor', '004', 'Mary Jane', 'maryjane@gmail.com', 'MaryJane', '1995-09-04', '', '', 'password', 'Debe_High_School', 'instructor'),
('1', 'instructor', '005', 'Rena Paul', 'renapaul@gmail.com', 'RenaPaul', '1988-06-05', '', '', 'password', 'Penal_Secondary_School', 'instructor'),
('1', 'instructor', '006', 'Jenny Ali', 'jennyali@gmail.com', 'JennyAli', '2000-04-29', '', '', 'password', 'Debe_High_School', 'instructor'),
('1', 'instructor', '007', 'Leanne Thomas', 'leannethomas@gmail.com', 'LeanneThomas', '1996-02-09', '', '', 'password', 'Iere_High_School', 'instructor');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
