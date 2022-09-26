-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 14, 2019 at 06:42 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ljps`
--
CREATE DATABASE IF NOT EXISTS `ljps` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ljps`;

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

DROP TABLE IF EXISTS `Staff`;
CREATE TABLE IF NOT EXISTS `Staff` (
  `Staff_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Staff_FName` varchar(50) NOT NULL,
  `Staff_LName` varchar(50) NOT NULL,
  `Dept` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Role_ID` int(11) NOT NULL,
  PRIMARY KEY (`Staff_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`Staff_ID`, `Staff_FName`, `Staff_LName`, `Dept`, `Email`, `Role_ID`) VALUES
(1, 'Alice', 'Tan', 'Operations', 'alice.tan@aio.com', 2),
(2, 'Bob', 'Tan', 'Sales', 'bob.tan@aio.com', 3),
(3, 'Charlie', 'Wong', 'Sales', 'charlie.wong@aio.com', 2),
(4, 'Charles', 'Lee', 'HR and Admin', 'charles.lee@aio.com', 1),
(5, 'Emma', 'Ong', 'Operations', 'emma.ong@aio.com', 3),
(6, 'Jackson', 'Lim', 'Operations', 'jackson.lim@aio.com', 2),
(7, 'Jane', 'Lim', 'Sales', 'jane.lim@aio.com', 2),
(8, 'Olivia', 'Chan', 'HR and Admin', 'olivia.chan@aio.com', 1),
(9, 'Nicole', 'Lee', 'Finance', 'nicole.lee@aio.com', 2),
(10, 'Sophia', 'Lee', 'Finance', 'sophia.lee@aio.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

DROP TABLE IF EXISTS `Course`;
CREATE TABLE IF NOT EXISTS `Course` (
  `Course_ID` varchar(20) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `Course_Desc` varchar(255) NOT NULL,
  `Course_Status` varchar(15) NOT NULL,
  `Course_Type` varchar(10) NOT NULL,
  `Course_Category` varchar(50) NOT NULL,
  PRIMARY KEY (`Course_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`Course_ID`, `Course_Name`, `Course_Desc`, `Course_Status`, `Course_Type`, `Course_Category`) VALUES
('1', 'Solve Problems & Make Decisions at Supervisory lvl', 'NA', 'Active', 'Internal', 'HR'),
('2', 'Innovative Problem Solving and Decision Making', 'NA', 'Active', 'Internal', 'HR'),
('3', 'Apply Systems Thinking in Problem Solving & Decision Making', 'NA', 'Active', 'Internal', 'HR'),
('4', 'IMPACT: Advanced Problem Solving & Decision Making Workshop', 'NA', 'Retired', 'External', 'HR'),
('5', 'Effective Problem Solving and Decision Making', 'NA', 'Active', 'Internal', 'HR'),
('6', 'WSQ Solve Problems and Make Decisions at Supervisory Level', 'NA', 'Active', 'External', 'HR'),
('7', 'Decision Making & Self Mastery', 'NA', 'Active', 'External', 'HR'),
('8', 'Facilitate Effective Communication and Engagement at the Workplace', 'NA', 'Retired', 'Internal', 'HR'),
('9', 'Develop Self powered by John Maxwell', 'NA', 'Active', 'External', 'HR'),
('10', 'Lead Workplace Communication and Engagement', 'NA', 'Active', 'Internal', 'HR'),
('11', 'The Facilitative Leader of Self-Managed Teams', 'NA', 'Active', 'Internal', 'HR'),
('12', 'Creative Leadership and Self Development Skills', 'NA', 'Active', 'External', 'HR'),
('13', 'Developing Self Effectiveness for Business Performance', 'NA', 'Active', 'External', 'HR'),
('14', 'Apply Emotional Competence to Manage Self & Team', 'NA', 'Active', 'External', 'HR'),
('15', 'Apply Emotional Competence to Manage Self & Others', 'NA', 'Active', 'External', 'HR'),
('16', 'Build Team Relationships', 'NA', 'Active', 'Internal', 'HR'),
('17', 'Cultivate Workplace Relationships', 'NA', 'Active', 'External', 'HR'),
('18', 'Cultivate Workplace Relationships to Optimise Team Performance', 'NA', 'Active', 'External', 'HR'),
('19', 'Mastering Personal Effectiveness & Emotional Competence', 'NA', 'Retired', 'Internal', 'HR'),
('20', 'Building Rapport to Create Selling Opportunities', 'NA', 'Active', 'External', 'HR'),
('21', 'Effective Customer Service Skills', 'NA', 'Active', 'Internal', 'HR'),
('22', 'Establish Relationships for Customer Confidence', 'NA', 'Active', 'Internal', 'HR'),
('23', 'Role Modelling to Establish Customer Relationship', 'NA', 'Active', 'Internal', 'HR'),
('24', 'Support Team powered by John Maxwell', 'NA', 'Retired', 'Internal', 'HR'),
('25', 'Facilitate Effective Work Teams', 'NA', 'Active', 'External', 'HR'),
('26', 'Building a Results-Oriented Team', 'NA', 'Active', 'External', 'HR'),
('27', 'Develop A Work Team', 'NA', 'Active', 'Internal', 'HR'),
('28', 'Synergizing for Success', 'NA', 'Active', 'Internal', 'HR'),
('29', 'People Leadership Program', 'NA', 'Active', 'Internal', 'HR'),
('30', 'Foster Team Adaptability', 'NA', 'Active', 'Internal', 'HR'),
('31', 'Foster Service Innovation', 'NA', 'Active', 'Internal', 'Technical'),
('32', 'WSQ Service Design', 'NA', 'Active', 'External', 'Technical');
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

DROP TABLE IF EXISTS `Role`;
CREATE TABLE IF NOT EXISTS `Role` (
  `Role_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Role_Name` varchar(20) NOT NULL,
  PRIMARY KEY (`Role_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`Role_ID`, `Role_Name`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Manager');
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `Registration`
--

DROP TABLE IF EXISTS `Registration`;
CREATE TABLE IF NOT EXISTS `Registration` (
  `Reg_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Course_ID` varchar(20) NOT NULL,
  `Staff_ID` int(11) NOT NULL,
  `Reg_Status` varchar(20) NOT NULL,
  `Completion_Status` varchar(20) NOT NULL,
  PRIMARY KEY (`Reg_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
