-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 04:32 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pessdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dispatch`
--

CREATE TABLE `dispatch` (
  `incident_id` int(11) NOT NULL,
  `patrolcar_id` varchar(10) NOT NULL,
  `time_dispatched` datetime NOT NULL,
  `time_arrived` datetime DEFAULT NULL,
  `time_completed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dispatch`
--

INSERT INTO `dispatch` (`incident_id`, `patrolcar_id`, `time_dispatched`, `time_arrived`, `time_completed`) VALUES
(1, 'QX1123V', '2021-02-12 22:44:41', '2021-02-13 17:18:07', '2021-02-13 17:35:50'),
(12, 'QX222B', '2021-02-12 22:49:06', '2021-02-13 17:14:41', '2021-02-13 17:40:18'),
(13, 'QX233A', '2021-02-12 22:51:43', NULL, '2021-02-27 20:53:09'),
(14, 'QX3334E', '2021-02-12 22:53:35', NULL, '2021-02-27 20:53:16'),
(24, 'QX999E', '2021-02-24 13:55:05', NULL, NULL),
(29, 'QX1123V', '2021-02-24 14:38:34', NULL, '2021-02-27 20:53:00'),
(31, 'QX222B', '2021-02-24 14:52:59', NULL, '2021-03-01 10:23:01'),
(32, 'QX5521W', '2021-02-25 13:56:46', NULL, '2021-02-27 20:53:27'),
(33, 'QX555T', '2021-02-25 14:37:48', NULL, '2021-02-27 20:53:34'),
(34, 'QX7774', '2021-02-25 20:22:36', NULL, NULL),
(56, 'QX222B', '2021-02-27 20:56:42', NULL, '2021-03-01 10:23:01'),
(57, 'QX233A', '2021-02-27 21:05:38', NULL, '2021-03-01 10:23:37'),
(59, 'QX5521W', '2021-02-27 21:53:06', NULL, '2021-03-02 10:38:35'),
(60, 'QX555T', '2021-03-01 10:17:34', NULL, NULL),
(61, 'QX1111A', '2021-03-01 10:35:38', NULL, '2021-03-01 10:36:25'),
(62, 'QX1111A', '2021-03-02 10:36:47', NULL, '2021-03-02 10:38:29'),
(63, 'QX3334E', '2021-03-02 10:37:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE `incident` (
  `incident_id` int(11) NOT NULL,
  `caller_name` varchar(30) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `incident_type_id` varchar(3) NOT NULL,
  `incident_location` varchar(50) NOT NULL,
  `incident_desc` varchar(100) NOT NULL,
  `incident_status_id` varchar(1) NOT NULL,
  `time_called` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incident`
--

INSERT INTO `incident` (`incident_id`, `caller_name`, `phone_number`, `incident_type_id`, `incident_location`, `incident_desc`, `incident_status_id`, `time_called`) VALUES
(1, 'David', '81234567', '060', 'Outside ITE CW', 'Car clashed with van', '3', '2021-02-08 21:31:28'),
(2, 'Desmond', '97864324', '050', 'Outside West Mall', 'Lady got punched', '1', '2021-02-10 13:03:23'),
(3, 'Kumaran', '94733483', '060', 'Outside Swiss Cottage Secondary School', 'Mitsubishi Lancer going 100mph hitting a Swiss Cottage student', '2', '2021-02-10 13:09:37'),
(4, 'Remos', '98873123', '010', 'CMB', 'Fire at CMB', '1', '2021-02-12 22:07:35'),
(5, 'David', '91234334', '010', 'Jurong', 'Fire at Jurong', '1', '2021-02-12 22:19:03'),
(6, 'Lebron', '932137', '010', 'KFC', 'Fire at KFC', '1', '2021-02-12 22:25:14'),
(9, 'Rahman', '8664358', '070', 'Toilet', 'Loan shark in toilet', '1', '2021-02-12 22:27:51'),
(10, 'Dashie', '85747386', '010', 'Hougang', 'Fire at Polyclinic', '2', '2021-02-12 22:34:17'),
(11, 'Glenn', '91234321', '050', 'McDonald', 'Fallen tree at McDonald', '2', '2021-02-12 22:41:03'),
(12, 'Thomas', '91123213', '030', 'Tampines', 'Thief at Tampines', '3', '2021-02-12 22:49:06'),
(13, 'Hairy', '93825643', '020', 'Burger King', 'Riot outside Burger King', '3', '2021-02-12 22:51:43'),
(14, 'Damien', '87463723', '080', 'Wendy', 'Flood in Wendy', '3', '2021-02-12 22:53:35'),
(22, 'Jamie', '93424237', '040', 'Bukit Panjang Plaza', 'Boy touch girl', '1', '2021-02-24 13:49:47'),
(24, 'Ariq', '93272317', '020', 'Jollibee', 'Riot outside Jollibee', '2', '2021-02-24 13:55:05'),
(29, 'David', '91234334', '010', 'CCK', 'Fire fire', '3', '2021-02-24 14:38:34'),
(31, 'Kumaran', '92183137', '060', 'Serangoon', 'Accident outside Serangoon', '3', '2021-02-24 14:52:59'),
(32, 'Yappy', '93218372', '010', 'Toilet', 'Fire in toilet', '3', '2021-02-25 13:56:46'),
(33, 'Praveen', '92138478', '010', 'Toilet', 'Fire in toilet', '3', '2021-02-25 14:37:48'),
(34, 'Aaron', '93213423', '030', 'Sophia', 'He died', '2', '2021-02-25 20:22:36'),
(44, 'Andy', '87568374', '050', 'CCK', 'CCK got problem', '1', '2021-02-27 20:42:13'),
(56, 'Wayne', '34323423', '040', 'Toilet', 'Violcnece', '2', '2021-02-27 20:56:42'),
(57, 'Yosham', '75832934', '050', 'Bukit Biru', 'Tree fallen in bukit biru', '3', '2021-02-27 21:05:38'),
(59, 'Josh', '74383733', '030', 'Desk', 'Riot at Desk', '3', '2021-02-27 21:53:06'),
(60, 'Desmond', '78347238', '060', 'Clementi', 'Traffic accident occured outside Clementi mall', '2', '2021-03-01 10:17:34'),
(61, 'Test', '87482594', '030', 'Toilet', 'Theft in toilet', '3', '2021-03-01 10:35:38'),
(62, 'Yap', '43543342', '010', 'Living room', 'Fire in living room', '3', '2021-03-02 10:36:47'),
(63, 'Brotherhood', '21323242', '020', 'Downstairs', 'Riot downstairs', '2', '2021-03-02 10:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `incident_status`
--

CREATE TABLE `incident_status` (
  `incident_status_id` varchar(1) NOT NULL,
  `incident_status_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incident_status`
--

INSERT INTO `incident_status` (`incident_status_id`, `incident_status_desc`) VALUES
('1', 'Pending'),
('2', 'Dispatched'),
('3', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `incident_type`
--

CREATE TABLE `incident_type` (
  `incident_type_id` varchar(3) NOT NULL,
  `incident_type_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incident_type`
--

INSERT INTO `incident_type` (`incident_type_id`, `incident_type_desc`) VALUES
('010', 'Fire'),
('020', 'Riot'),
('030', 'Burglary'),
('040', 'Domestic Violent'),
('050', 'Fallen Tree'),
('060', 'Traffic Accident'),
('070', 'Loan Shark'),
('080', 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` varchar(10) NOT NULL,
  `password_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `password_id`) VALUES
('David', 'pass1'),
('Dora', 'pass2'),
('Yap', 'pass3');

-- --------------------------------------------------------

--
-- Table structure for table `patrolcar`
--

CREATE TABLE `patrolcar` (
  `patrolcar_id` varchar(10) NOT NULL,
  `patrolcar_status_id` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patrolcar`
--

INSERT INTO `patrolcar` (`patrolcar_id`, `patrolcar_status_id`) VALUES
('QX3334E', '1'),
('QX555T', '1'),
('QX7774', '1'),
('QX8885', '1'),
('QX999E', '1'),
('QX1111A', '3'),
('QX1123V', '3'),
('QX222B', '3'),
('QX233A', '3'),
('QX5521W', '3');

-- --------------------------------------------------------

--
-- Table structure for table `patrolcar_status`
--

CREATE TABLE `patrolcar_status` (
  `patrolcar_status_id` varchar(1) NOT NULL,
  `patrolcar_status_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patrolcar_status`
--

INSERT INTO `patrolcar_status` (`patrolcar_status_id`, `patrolcar_status_desc`) VALUES
('4', 'Arrived'),
('1', 'Dispatched'),
('3', 'Free'),
('2', 'Patrol');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispatch`
--
ALTER TABLE `dispatch`
  ADD PRIMARY KEY (`incident_id`,`patrolcar_id`),
  ADD KEY `patrolcar_id` (`patrolcar_id`);

--
-- Indexes for table `incident`
--
ALTER TABLE `incident`
  ADD PRIMARY KEY (`incident_id`),
  ADD KEY `incident_type_id` (`incident_type_id`,`incident_status_id`),
  ADD KEY `incident_status_id` (`incident_status_id`);

--
-- Indexes for table `incident_status`
--
ALTER TABLE `incident_status`
  ADD PRIMARY KEY (`incident_status_id`);

--
-- Indexes for table `incident_type`
--
ALTER TABLE `incident_type`
  ADD PRIMARY KEY (`incident_type_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `patrolcar`
--
ALTER TABLE `patrolcar`
  ADD PRIMARY KEY (`patrolcar_id`),
  ADD KEY `patrolcar_status_id` (`patrolcar_status_id`);

--
-- Indexes for table `patrolcar_status`
--
ALTER TABLE `patrolcar_status`
  ADD PRIMARY KEY (`patrolcar_status_id`),
  ADD KEY `patrolcar_status_desc` (`patrolcar_status_desc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incident`
--
ALTER TABLE `incident`
  MODIFY `incident_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dispatch`
--
ALTER TABLE `dispatch`
  ADD CONSTRAINT `dispatch_ibfk_1` FOREIGN KEY (`patrolcar_id`) REFERENCES `patrolcar` (`patrolcar_id`),
  ADD CONSTRAINT `dispatch_ibfk_2` FOREIGN KEY (`incident_id`) REFERENCES `incident` (`incident_id`);

--
-- Constraints for table `incident`
--
ALTER TABLE `incident`
  ADD CONSTRAINT `incident_ibfk_1` FOREIGN KEY (`incident_type_id`) REFERENCES `incident_type` (`incident_type_id`),
  ADD CONSTRAINT `incident_ibfk_2` FOREIGN KEY (`incident_status_id`) REFERENCES `incident_status` (`incident_status_id`);

--
-- Constraints for table `patrolcar`
--
ALTER TABLE `patrolcar`
  ADD CONSTRAINT `patrolcar_ibfk_1` FOREIGN KEY (`patrolcar_status_id`) REFERENCES `patrolcar_status` (`patrolcar_status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
