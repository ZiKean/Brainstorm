-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 14, 2024 at 11:58 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brainstorm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `AdminEmail` varchar(127) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`AdminEmail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminEmail`, `Password`) VALUES
('Sheik@sheik', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `QuizCode` int NOT NULL AUTO_INCREMENT,
  `QuizName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `TCemail` varchar(255) NOT NULL,
  PRIMARY KEY (`QuizCode`),
  KEY `TCemail` (`TCemail`(250))
) ENGINE=MyISAM AUTO_INCREMENT=996241 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`QuizCode`, `QuizName`, `TCemail`) VALUES
(444663, 'asdsada', 'MJ@NBA');

-- --------------------------------------------------------

--
-- Table structure for table `quizquestion`
--

DROP TABLE IF EXISTS `quizquestion`;
CREATE TABLE IF NOT EXISTS `quizquestion` (
  `QuestionID` int NOT NULL AUTO_INCREMENT,
  `QuizCode` int NOT NULL,
  `Question` varchar(500) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `option3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `option4` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `answer` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`QuestionID`),
  KEY `QuizCode` (`QuizCode`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quizquestion`
--

INSERT INTO `quizquestion` (`QuestionID`, `QuizCode`, `Question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(6, 444663, 'q', '1', '2', '3', '4', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `quizresults`
--

DROP TABLE IF EXISTS `quizresults`;
CREATE TABLE IF NOT EXISTS `quizresults` (
  `Result_id` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `QuizCode` varchar(255) DEFAULT NULL,
  `Score` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `TotalQuestions` varchar(255) NOT NULL,
  PRIMARY KEY (`Result_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quizresults`
--

INSERT INTO `quizresults` (`Result_id`, `Username`, `QuizCode`, `Score`, `TotalQuestions`) VALUES
(30, 'snaible', '444663', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `Username` varchar(32) NOT NULL,
  `FirstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Username`, `FirstName`, `Surname`, `Email`, `Gender`, `DOB`, `Password`) VALUES
('snaible', 'Lebron', 'James', 'bong@bongo', 'Male', '2005-05-05', '4rings');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `FirstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `TCemail` varchar(127) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`TCemail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`FirstName`, `Surname`, `TCemail`, `Gender`, `DOB`, `Password`) VALUES
('Michael', 'Jor', 'MJ@NBA', 'Male', '1964-12-31', '6ringslmao');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
