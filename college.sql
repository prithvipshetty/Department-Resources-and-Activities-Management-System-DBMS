-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 06:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ROUTINE_1` (IN `ROUTINE_NAME` INT)   select * FROM workshop$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `c_id` varchar(25) NOT NULL,
  `c_name` varchar(25) DEFAULT NULL,
  `c_dept` varchar(25) DEFAULT NULL,
  `c_contact` bigint(10) DEFAULT NULL,
  `dept_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`c_id`, `c_name`, `c_dept`, `c_contact`, `dept_id`) VALUES
('C1', 'Dr. MUSTAFA BATHIKODI', 'CSE', 9844535720, 'D1'),
('C10', 'Mr. MANISHCHANDRA P G', 'CSE', 9663460564, 'D1'),
('C11', 'Ms. PRAFULLA', 'CSE', 6363290331, 'D1'),
('C12', 'Dr. PRIYA KAMATH ', 'CSE', 9008544822, 'D1'),
('C13', 'Ms. RESHMA', 'CSE', 9744274572, 'D1'),
('C14', 'Mr. SHRINIVAS P M', 'CSE', 8548032569, 'D1'),
('C15', 'Mr. SUHAS A BHYRATAE', 'CSE', 7483287834, 'D1'),
('C16', 'Mrs. VIDYA V V', 'CSE', 9964144346, 'D1'),
('C17', 'Mr. RAGHAVENDRA SOODA', 'CSE', 9148520154, 'D1'),
('C2', 'Mr. ADARSH RAG S', 'CSE', 8951172344, 'D1'),
('C3', 'Mrs. SRIVIDYA', 'CSE', 7016804183, 'D1'),
('C4', 'Ms. ASHWINI C S', 'CSE', 9739703337, 'D1'),
('C5', 'ms. ALAKANADA', 'CSE', 9400889012, 'D1'),
('C6', 'Ms. CHAITRA S ANCHAN', 'CSE', 8217632181, 'D1'),
('C7', 'Mr. HARISHA', 'CSE', 8762050055, 'D1'),
('C8', 'Mr. JANARDHANA SWAMY G B', 'CSE', 9844366119, 'D1'),
('C9', 'Mr. KISHORE KUMAR', 'CSE', 7483287834, 'D1');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` varchar(25) NOT NULL,
  `dept_name` varchar(25) DEFAULT NULL,
  `dept_location` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `dept_location`) VALUES
('D1', 'CSE', 'Ground_floor');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `USN` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs_workshop`
--

CREATE TABLE `logs_workshop` (
  `log_id` int(11) NOT NULL,
  `w_id` varchar(25) NOT NULL,
  `action` varchar(25) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs_workshop`
--

INSERT INTO `logs_workshop` (`log_id`, `w_id`, `action`, `time`) VALUES
(1, 'W10', 'INSERTED', '2024-03-18 17:05:17'),
(2, 'W15', 'INSERTED', '2024-03-18 17:06:52'),
(3, 'W10', 'INSERTED', '2024-03-18 19:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `resource_person`
--

CREATE TABLE `resource_person` (
  `person_id` varchar(25) NOT NULL,
  `p_name` varchar(25) DEFAULT NULL,
  `p_contact` bigint(10) DEFAULT NULL,
  `title_of_position` varchar(80) DEFAULT NULL,
  `p_expertise` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resource_person`
--

INSERT INTO `resource_person` (`person_id`, `p_name`, `p_contact`, `title_of_position`, `p_expertise`) VALUES
('P1', 'Sujith D', 6576867564, 'Front End Developer ', 'Front End Developer  Recruiterflow'),
('P10', 'Mohammed Hanif', 7687968788, 'Co Founder & CTO  Novigo Solutions', 'Co Founder & CTO  Novigo Solutions'),
('P11', 'Dr Rohan Salins', 6576869787, 'Advanced Senior Developer ', 'Advanced Senior Developer Honeywell India Pvt.ltd'),
('P12', 'Mr Sudarshan', 7687979887, 'Texial Innovation Pvt.ltd', 'Texial Innovation Pvt.ltd'),
('P13', 'Ravindra Raghavan', 6576868797, 'Consultant-IBM AS400', 'Consultant-IBM AS400 Ranpise Digitech Solutions '),
('P14', 'Samadhan Ranpise', 8798879843, 'Director', 'Director Ranpise Digitech Solutions'),
('P15', 'Prof Manamohana K', 8797867565, 'Dept of CSE, MIT, Manipal', 'Dept of CSE, MIT, Manipal'),
('P16', 'Ms Alakananda K', 6576867564, 'Assistant Professor', 'Latex Documentation'),
('P2', 'Subramanya C', 7686758675, 'Senior System Engineer', 'Senior System Engineer  Sigma-X'),
('P3', 'Satish Shetty', 6576857685, 'CEO &  Founder Codeproof Technologies', 'CEO &  Founder Codeproof Technologies'),
('P4', 'Nidarsh Nityananda', 7685647586, 'Software Engineer', 'Software Engineer Thaniya Technologies'),
('P5', 'S Rashwin Nonda', 7687968776, 'Deputy Manager', 'Deputy Manager- IT, Axis Bank'),
('P6', 'Harish Kumar', 6576879786, 'Founder & CEO Accolade Tech Solutions', 'Founder & CEO Accolade Tech Solutions'),
('P7', 'Abhijith Shetty', 7687978675, 'Vice President & Delivery Head', 'Vice President & Delivery Head Juego Studios Pvt.L'),
('P8', 'Bharath Kumar Madakatte', 6576879787, 'Associate Director', 'Associate Director- Projects Cognizant India Pvt.l'),
('P9', 'Shivaprakash Rao', 6576869909, 'Senior Business Consultant ', 'Senior Business Consultant  Novigo Solutions');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_webiner`
--

CREATE TABLE `seminar_webiner` (
  `ws_id` varchar(25) NOT NULL,
  `mode` varchar(25) DEFAULT NULL,
  `ws_title` varchar(100) DEFAULT NULL,
  `ws_time` time DEFAULT NULL,
  `ws_date` date DEFAULT NULL,
  `ws_location` varchar(25) DEFAULT NULL,
  `dept_id` varchar(25) DEFAULT NULL,
  `person_id` varchar(25) DEFAULT NULL,
  `c_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seminar_webiner`
--

INSERT INTO `seminar_webiner` (`ws_id`, `mode`, `ws_title`, `ws_time`, `ws_date`, `ws_location`, `dept_id`, `person_id`, `c_id`) VALUES
('WS1', 'OFFLINE', 'AI ESSENTIALS', '09:00:00', '2023-03-07', 'G_FLOOR SEMINAR HALL', 'D1', 'P7', 'C17'),
('WS2', 'OFFLINE', 'Tech Unleashed: From readiness to AI future', '11:00:00', '2024-01-05', 'G_FLOOR SEMINAR HALL', 'D1', 'P15', 'C15'),
('WS3', 'OFFLINE', 'Mastering Software Development Life Cycle: Mini Pr', '09:30:00', '2023-03-07', 'G_FLOOR SEMINAR HALL', 'D1', 'P3', 'C16'),
('WS4', 'OFFLINE', 'Process Innovation: Understanding technology readi', '14:00:00', '2024-02-14', 'G_FLOOR SEMINAR HALL', 'D1', 'P1', 'C4'),
('WS5', 'OFFLINE', 'Strategic Synergy of Creativity: Design thinking, ', '14:00:00', '2024-02-02', 'G_FLOOR SEMINAR HALL', 'D1', 'P6', 'C11'),
('WS6', 'OFFLINE', 'Automating Tomorrow: Navigating the landscape of r', '14:00:00', '2024-01-31', 'G_FLOOR SEMINAR HALL', 'D1', 'P11', 'C5'),
('WS7', 'OFFLINE', 'Strategic Tech Fusion: Unlocking the power of prob', '10:30:00', '2024-01-25', 'G_FLOOR SEMINAR HALL', 'D1', 'P5', 'C7');

-- --------------------------------------------------------

--
-- Table structure for table `skill_lab`
--

CREATE TABLE `skill_lab` (
  `skilllab_id` varchar(25) NOT NULL,
  `sl_type` varchar(25) DEFAULT NULL,
  `sl_sem` varchar(5) DEFAULT NULL,
  `sl_topic` varchar(50) DEFAULT NULL,
  `sl_start_date` date DEFAULT NULL,
  `sl_end_date` date DEFAULT NULL,
  `dept_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skill_lab`
--

INSERT INTO `skill_lab` (`skilllab_id`, `sl_type`, `sl_sem`, `sl_topic`, `sl_start_date`, `sl_end_date`, `dept_id`) VALUES
('SL1', 'SOFTWARE', '3', ',Hybrid Course On Full Stack Development (MERN Sta', '2022-11-07', '2022-04-07', 'D1'),
('SL2', 'SOFTWARE', '4', ',Hybrid Course On Full Stack Development (MERN Sta', '2023-05-15', '2023-08-10', 'D1'),
('SL3', 'SOFTWARE', '5', ',Hybrid Course On Backend Development', '2023-12-11', '2024-03-16', 'D1');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `USN` varchar(25) NOT NULL,
  `s_name` varchar(25) DEFAULT NULL,
  `s_sem` int(5) DEFAULT NULL,
  `s_dept` varchar(25) DEFAULT NULL,
  `dept_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`USN`, `s_name`, `s_sem`, `s_dept`, `dept_id`) VALUES
('4SF21CS004', 'ABHIJITH A', 5, 'CSE', 'D1'),
('4SF21CS005', 'ABHIJNA', 5, 'CSE', 'D1'),
('4SF21CS008', 'ADITI S PARULEKAR', 5, 'CSE', 'D1'),
('4SF21CS010', 'ADITYA SUNIL NADIGER', 5, 'CSE', 'D1'),
('4SF21CS014', 'AMAN AKTHAR MOIDEEN GUTHI', 5, 'CSE', 'D1'),
('4SF21CS016', 'ANANYA M BANGERA', 5, 'CSE', 'D1'),
('4SF21CS017', 'ANANYA P K', 5, 'CSE', 'D1'),
('4SF21CS018', 'ANIKETH NAYAK J', 5, 'CSE', 'D1'),
('4SF21CS024', 'ANUSHREE RAI N', 5, 'CSE', 'D1'),
('4SF21CS028', 'BABITH', 5, 'CSE', 'D1'),
('4SF21CS032', 'CHAITHANYA K J', 5, 'CSE', 'D1'),
('4SF21CS035', 'CHIRUMAMILLA MANIDEEP', 5, 'CSE', 'D1'),
('4SF21CS037', 'DEELAN LASRADO', 5, 'CSE', 'D1'),
('4SF21CS041', 'DHRUMIL PRAGNESHBHAI KANS', 5, 'CSE', 'D1'),
('4SF21CS043', 'DIVYA GANAPATI MUROORKAR', 5, 'CSE', 'D1'),
('4SF21CS044', 'DIYA SHETTY', 5, 'CSE', 'D1'),
('4SF21CS050', 'GAURAV Y BEERAKODI', 5, 'CSE', 'D1'),
('4SF21CS052', 'GOWDA SWASTHIK PURUSHOTHA', 5, 'CSE', 'D1'),
('4SF21CS061', 'J S NINAD', 5, 'CSE', 'D1'),
('4SF21CS063', 'JENISHA EVA REBELLO', 5, 'CSE', 'D1'),
('4SF21CS067', 'K S SUHANI', 5, 'CSE', 'D1'),
('4SF21CS069', 'KAUSHIK K U', 5, 'CSE', 'D1'),
('4SF21CS070', 'KEERTHAN S SUVARNA', 5, 'CSE', 'D1'),
('4SF21CS071', 'KRIPESH B S', 5, 'CSE', 'D1'),
('4SF21CS077', 'MAHIMA U', 5, 'CSE', 'D1'),
('4SF21CS079', 'MANISH K SHETTY', 5, 'CSE', 'D1'),
('4SF21CS086', 'MOHAMMAD IHTHISHAM RAAFEE', 5, 'CSE', 'D1'),
('4SF21CS089', 'MOIDEEN AADIL SHAN ASHRAF', 5, 'CSE', 'D1'),
('4SF21CS090', 'MUHAMMED FASIL M P', 5, 'CSE', 'D1'),
('4SF21CS094', 'NAVYA', 5, 'CSE', 'D1'),
('4SF21CS097', 'NIDHI', 5, 'CSE', 'D1'),
('4SF21CS098', 'NIDHISHA DAYANAND NAIK', 5, 'CSE', 'D1'),
('4SF21CS099', 'NIHMAT UL AIN', 5, 'CSE', 'D1'),
('4SF21CS100', 'NINAD G', 5, 'CSE', 'D1'),
('4SF21CS106', 'PARTH S SHETTY', 5, 'CSE', 'D1'),
('4SF21CS108', 'PRAJWAL PRAKASH NAIK', 5, 'CSE', 'D1'),
('4SF21CS115', 'PRITHVI P SHETTY', 5, 'CSE', 'D1'),
('4SF21CS118', 'PUNYA', 5, 'CSE', 'D1'),
('4SF21CS120', 'RAJU GHANASHYAM GAONKAR', 5, 'CSE', 'D1'),
('4SF21CS123', 'RANJEET KEMPANNA BALOBAL', 5, 'CSE', 'D1'),
('4SF21CS125', 'RITHIKA R SHETTY', 5, 'CSE', 'D1'),
('4SF21CS126', 'RIZAAN MOHAMMED M G', 5, 'CSE', 'D1'),
('4SF21CS127', 'ROHAN', 5, 'CSE', 'D1'),
('4SF21CS133', 'SADHANA G', 5, 'CSE', 'D1'),
('4SF21CS134', 'SAHAN SHETTY', 5, 'CSE', 'D1'),
('4SF21CS135', 'SAHIL RAIKAR', 5, 'CSE', 'D1'),
('4SF21CS142', 'SANNIDHI KAJE', 5, 'CSE', 'D1'),
('4SF21CS144', 'SHALINI L', 5, 'CSE', 'D1'),
('4SF21CS146', 'SHETTY DEVEESH CHIDANANDA', 5, 'CSE', 'D1'),
('4SF21CS150', 'SHIYA SHALMALI SHETTY', 5, 'CSE', 'D1'),
('4SF21CS151', 'SHRAVANI H N', 5, 'CSE', 'D1'),
('4SF21CS152', 'SHREENIDHI D K', 5, 'CSE', 'D1'),
('4SF21CS153', 'SHREESHA P  NAIK', 5, 'CSE', 'D1'),
('4SF21CS159', 'SHRUTHA J SHETTY', 5, 'CSE', 'D1'),
('4SF21CS165', 'SOUJANYA RAO', 5, 'CSE', 'D1'),
('4SF21CS170', 'SUPRIYA B', 5, 'CSE', 'D1'),
('4SF21CS176', 'TEJASHREE NAGAPPA PATGAR', 5, 'CSE', 'D1'),
('4SF21CS177', 'THANVI M C', 5, 'CSE', 'D1'),
('4SF21CS178', 'THRISHA R', 5, 'CSE', 'D1'),
('4SF21CS179', 'TOSHAN S MAINDAN', 5, 'CSE', 'D1'),
('4SF21CS185', 'VIDHISHA SHETTY', 5, 'CSE', 'D1'),
('4SF21CS190', 'NIDHI', 5, 'CSE', 'D1'),
('4SF21CS191', 'DEVIKA M J', 5, 'CSE', 'D1'),
('4SF21CS192', 'KHUSHI SHETTY', 5, 'CSE', 'D1'),
('4SF22CS402', 'AYESHTH HAFEEZA', 5, 'CSE', 'D1'),
('4SF22CS413', 'SUJEETH', 5, 'CSE', 'D1'),
('4SF22CS415', 'SUSHMA Y', 5, 'CSE', 'D1'),
('4SF22CS416', 'SWATHI SUDHAKAR DEVADIGA', 5, 'CSE', 'D1'),
('4SF22CS417', 'VEEKSHITHA', 5, 'CSE', 'D1');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `w_id` varchar(25) NOT NULL,
  `w_topic` varchar(75) DEFAULT NULL,
  `w_location` varchar(25) DEFAULT NULL,
  `w_time` time DEFAULT NULL,
  `w_date` date DEFAULT NULL,
  `w_duration` int(5) DEFAULT NULL,
  `dept_id` varchar(25) DEFAULT NULL,
  `person_id` varchar(25) DEFAULT NULL,
  `c_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`w_id`, `w_topic`, `w_location`, `w_time`, `w_date`, `w_duration`, `dept_id`, `person_id`, `c_id`) VALUES
('W1', 'EXPLORING EVENT HANDLING AND MULTITHREADING IN JAVA', 'G_FLOOR SEMINAR HALL', '02:30:00', '2024-02-22', 1, 'D1', 'P11', 'C4'),
('W10', 'COLLEGE', 'G_FLOOR', '11:01:00', '2023-03-24', 1, NULL, 'P2', 'C11'),
('W2', 'DOCUMENT TYPESETTING AND PROCESSING USING LATEX', 'ONLINE', '01:30:00', '2023-03-27', 1, 'D1', 'P16', 'C8'),
('W3', 'TYPESETTING AND DOCUMENT PROCESSING USING LATEX', 'ONLINE', '09:00:00', '2024-03-02', 1, 'D1', 'P16', 'C11'),
('W4', 'NODEJS: SECURE CODING PRACTICES FOR NODEJS WEB APPLICATIONS', 'NETHRAVATHI AUDITORIUM', '09:00:00', '2023-01-14', 1, 'D1', 'P1', 'C2');

--
-- Triggers `workshop`
--
DELIMITER $$
CREATE TRIGGER `TRIGGER_1` AFTER INSERT ON `workshop` FOR EACH ROW INSERT INTO logs_workshop VALUES(NULL,new.w_id,"INSERTED",now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `workshop_enroll`
--

CREATE TABLE `workshop_enroll` (
  `USN` varchar(25) NOT NULL,
  `w_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workshop_enroll`
--

INSERT INTO `workshop_enroll` (`USN`, `w_id`) VALUES
('', 'W1'),
('4SF21CS004', 'W1'),
('4SF21CS004', 'W4'),
('4SF21CS005', 'W1'),
('4SF21CS005', 'W4'),
('4SF21CS008', 'W1'),
('4SF21CS008', 'W4'),
('4SF21CS010', 'W1'),
('4SF21CS010', 'W4'),
('4SF21CS014', 'W1'),
('4SF21CS014', 'W4'),
('4SF21CS016', 'W1'),
('4SF21CS016', 'W4'),
('4SF21CS017', 'W4'),
('4SF21CS018', 'W1'),
('4SF21CS018', 'W4'),
('4SF21CS024', 'W1'),
('4SF21CS024', 'W4'),
('4SF21CS028', 'W1'),
('4SF21CS028', 'W4'),
('4SF21CS032', 'W1'),
('4SF21CS032', 'W10'),
('4SF21CS032', 'W4'),
('4SF21CS035', 'W1'),
('4SF21CS035', 'W4'),
('4SF21CS037', 'W1'),
('4SF21CS037', 'W4'),
('4SF21CS041', 'W1'),
('4SF21CS041', 'W4'),
('4SF21CS043', 'W1'),
('4SF21CS043', 'W4'),
('4SF21CS044', 'W1'),
('4SF21CS044', 'W4'),
('4SF21CS050', 'W1'),
('4SF21CS050', 'W4'),
('4SF21CS052', 'W1'),
('4SF21CS052', 'W4'),
('4SF21CS061', 'W1'),
('4SF21CS061', 'W4'),
('4SF21CS063', 'W1'),
('4SF21CS063', 'W4'),
('4SF21CS067', 'W1'),
('4SF21CS067', 'W4'),
('4SF21CS069', 'W4'),
('4SF21CS071', 'W2'),
('4SF21CS077', 'W2'),
('4SF21CS079', 'W2'),
('4SF21CS086', 'W2'),
('4SF21CS089', 'W2'),
('4SF21CS090', 'W2'),
('4SF21CS094', 'W2'),
('4SF21CS097', 'W2'),
('4SF21CS098', 'W2'),
('4SF21CS099', 'W2'),
('4SF21CS100', 'W2'),
('4SF21CS106', 'W2'),
('4SF21CS108', 'W2'),
('4SF21CS115', 'W10'),
('4SF21CS115', 'W2'),
('4SF21CS118', 'W2'),
('4SF21CS120', 'W2'),
('4SF21CS123', 'W2'),
('4SF21CS125', 'W2'),
('4SF21CS126', 'W2'),
('4SF21CS127', 'W2'),
('4SF21CS133', 'W2'),
('4SF21CS134', 'W2'),
('4SF21CS135', 'W2'),
('4SF21CS142', 'W3'),
('4SF21CS144', 'W3'),
('4SF21CS146', 'W3'),
('4SF21CS150', 'W3'),
('4SF21CS151', 'W3'),
('4SF21CS152', 'W3'),
('4SF21CS153', 'W3'),
('4SF21CS159', 'W3'),
('4SF21CS165', 'W3'),
('4SF21CS170', 'W3'),
('4SF21CS176', 'W3'),
('4SF21CS177', 'W3'),
('4SF21CS178', 'W3'),
('4SF21CS179', 'W3'),
('4SF21CS185', 'W3'),
('4SF21CS190', 'W3'),
('4SF21CS191', 'W3'),
('4SF21CS192', 'W3'),
('4SF22CS417', 'W4');

-- --------------------------------------------------------

--
-- Table structure for table `ws_enroll`
--

CREATE TABLE `ws_enroll` (
  `USN` varchar(25) NOT NULL,
  `ws_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ws_enroll`
--

INSERT INTO `ws_enroll` (`USN`, `ws_id`) VALUES
('4SF21CS004', 'WS3'),
('4SF21CS004', 'WS4'),
('4SF21CS004', 'WS5'),
('4SF21CS004', 'WS6'),
('4SF21CS004', 'WS7'),
('4SF21CS005', 'WS1'),
('4SF21CS005', 'WS2'),
('4SF21CS005', 'WS3'),
('4SF21CS005', 'WS4'),
('4SF21CS005', 'WS5'),
('4SF21CS005', 'WS6'),
('4SF21CS005', 'WS7'),
('4SF21CS008', 'WS1'),
('4SF21CS008', 'WS2'),
('4SF21CS008', 'WS3'),
('4SF21CS008', 'WS5'),
('4SF21CS008', 'WS7'),
('4SF21CS010', 'WS1'),
('4SF21CS010', 'WS2'),
('4SF21CS010', 'WS3'),
('4SF21CS010', 'WS5'),
('4SF21CS010', 'WS6'),
('4SF21CS010', 'WS7'),
('4SF21CS014', 'WS1'),
('4SF21CS014', 'WS2'),
('4SF21CS014', 'WS3'),
('4SF21CS014', 'WS4'),
('4SF21CS014', 'WS5'),
('4SF21CS014', 'WS6'),
('4SF21CS014', 'WS7'),
('4SF21CS016', 'WS1'),
('4SF21CS016', 'WS2'),
('4SF21CS016', 'WS3'),
('4SF21CS016', 'WS4'),
('4SF21CS016', 'WS5'),
('4SF21CS016', 'WS6'),
('4SF21CS016', 'WS7'),
('4SF21CS017', 'WS1'),
('4SF21CS017', 'WS2'),
('4SF21CS017', 'WS3'),
('4SF21CS017', 'WS4'),
('4SF21CS017', 'WS5'),
('4SF21CS017', 'WS6'),
('4SF21CS017', 'WS7'),
('4SF21CS018', 'WS1'),
('4SF21CS018', 'WS2'),
('4SF21CS018', 'WS3'),
('4SF21CS018', 'WS4'),
('4SF21CS018', 'WS5'),
('4SF21CS018', 'WS6'),
('4SF21CS018', 'WS7'),
('4SF21CS024', 'WS1'),
('4SF21CS024', 'WS2'),
('4SF21CS024', 'WS3'),
('4SF21CS024', 'WS4'),
('4SF21CS024', 'WS5'),
('4SF21CS024', 'WS6'),
('4SF21CS024', 'WS7'),
('4SF21CS028', 'WS1'),
('4SF21CS028', 'WS2'),
('4SF21CS028', 'WS3'),
('4SF21CS028', 'WS4'),
('4SF21CS028', 'WS5'),
('4SF21CS028', 'WS6'),
('4SF21CS028', 'WS7'),
('4SF21CS032', 'WS1'),
('4SF21CS032', 'WS2'),
('4SF21CS032', 'WS3'),
('4SF21CS032', 'WS4'),
('4SF21CS032', 'WS5'),
('4SF21CS032', 'WS6'),
('4SF21CS032', 'WS7'),
('4SF21CS035', 'WS1'),
('4SF21CS035', 'WS2'),
('4SF21CS035', 'WS3'),
('4SF21CS035', 'WS4'),
('4SF21CS035', 'WS5'),
('4SF21CS035', 'WS6'),
('4SF21CS035', 'WS7'),
('4SF21CS037', 'WS1'),
('4SF21CS037', 'WS2'),
('4SF21CS037', 'WS3'),
('4SF21CS037', 'WS4'),
('4SF21CS037', 'WS5'),
('4SF21CS037', 'WS6'),
('4SF21CS037', 'WS7'),
('4SF21CS041', 'WS1'),
('4SF21CS041', 'WS2'),
('4SF21CS041', 'WS3'),
('4SF21CS041', 'WS4'),
('4SF21CS041', 'WS5'),
('4SF21CS041', 'WS6'),
('4SF21CS041', 'WS7'),
('4SF21CS043', 'WS1'),
('4SF21CS043', 'WS2'),
('4SF21CS043', 'WS3'),
('4SF21CS043', 'WS4'),
('4SF21CS043', 'WS5'),
('4SF21CS043', 'WS6'),
('4SF21CS043', 'WS7'),
('4SF21CS044', 'WS1'),
('4SF21CS044', 'WS2'),
('4SF21CS044', 'WS4'),
('4SF21CS044', 'WS5'),
('4SF21CS044', 'WS6'),
('4SF21CS044', 'WS7'),
('4SF21CS050', 'WS1'),
('4SF21CS050', 'WS2'),
('4SF21CS050', 'WS4'),
('4SF21CS050', 'WS5'),
('4SF21CS050', 'WS6'),
('4SF21CS050', 'WS7'),
('4SF21CS052', 'WS1'),
('4SF21CS052', 'WS2'),
('4SF21CS052', 'WS4'),
('4SF21CS052', 'WS5'),
('4SF21CS052', 'WS6'),
('4SF21CS052', 'WS7'),
('4SF21CS061', 'WS1'),
('4SF21CS061', 'WS2'),
('4SF21CS061', 'WS4'),
('4SF21CS061', 'WS5'),
('4SF21CS061', 'WS6'),
('4SF21CS061', 'WS7'),
('4SF21CS063', 'WS1'),
('4SF21CS063', 'WS4'),
('4SF21CS063', 'WS5'),
('4SF21CS063', 'WS6'),
('4SF21CS063', 'WS7'),
('4SF21CS115', 'WS3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `FK1` (`dept_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKSS` (`USN`);

--
-- Indexes for table `logs_workshop`
--
ALTER TABLE `logs_workshop`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `resource_person`
--
ALTER TABLE `resource_person`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `seminar_webiner`
--
ALTER TABLE `seminar_webiner`
  ADD PRIMARY KEY (`ws_id`),
  ADD KEY `FK2` (`dept_id`),
  ADD KEY `FK8` (`person_id`),
  ADD KEY `FK9` (`c_id`);

--
-- Indexes for table `skill_lab`
--
ALTER TABLE `skill_lab`
  ADD PRIMARY KEY (`skilllab_id`),
  ADD KEY `FK3` (`dept_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`USN`),
  ADD KEY `FK4` (`dept_id`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`w_id`),
  ADD KEY `FK5` (`dept_id`),
  ADD KEY `FK6` (`person_id`),
  ADD KEY `FK7` (`c_id`);

--
-- Indexes for table `workshop_enroll`
--
ALTER TABLE `workshop_enroll`
  ADD PRIMARY KEY (`USN`,`w_id`),
  ADD KEY `w_id` (`w_id`);

--
-- Indexes for table `ws_enroll`
--
ALTER TABLE `ws_enroll`
  ADD PRIMARY KEY (`USN`,`ws_id`),
  ADD KEY `FK18` (`ws_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `logs_workshop`
--
ALTER TABLE `logs_workshop`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `FKSS` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`);

--
-- Constraints for table `seminar_webiner`
--
ALTER TABLE `seminar_webiner`
  ADD CONSTRAINT `FK2` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `FK8` FOREIGN KEY (`person_id`) REFERENCES `resource_person` (`person_id`),
  ADD CONSTRAINT `FK9` FOREIGN KEY (`c_id`) REFERENCES `coordinator` (`c_id`);

--
-- Constraints for table `skill_lab`
--
ALTER TABLE `skill_lab`
  ADD CONSTRAINT `FK3` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `FK4` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `FK5` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK6` FOREIGN KEY (`person_id`) REFERENCES `resource_person` (`person_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK7` FOREIGN KEY (`c_id`) REFERENCES `coordinator` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ws_enroll`
--
ALTER TABLE `ws_enroll`
  ADD CONSTRAINT `FK17` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`),
  ADD CONSTRAINT `FK18` FOREIGN KEY (`ws_id`) REFERENCES `seminar_webiner` (`ws_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
