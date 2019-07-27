-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2019 at 06:31 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `employeetable`
--

CREATE TABLE `employeetable` (
  `empID` int(11) NOT NULL,
  `empName` varchar(30) NOT NULL,
  `iqamaNo` varchar(30) NOT NULL,
  `passportNo` varchar(30) NOT NULL,
  `jobID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeetable`
--

INSERT INTO `employeetable` (`empID`, `empName`, `iqamaNo`, `passportNo`, `jobID`) VALUES
(2, 'Akram Syed', '76B2C', '8CC83', 1),
(3, 'Naveed Shehzad', '76B2C', '8CC83', 2),
(5, 'Ghat Khan', '76B2C', '8CC83', 4),
(6, 'M Qasim', '76B2C', 'FG763A', 5);

-- --------------------------------------------------------

--
-- Table structure for table `typetable`
--

CREATE TABLE `typetable` (
  `jobID` int(11) NOT NULL,
  `JobDesc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typetable`
--

INSERT INTO `typetable` (`jobID`, `JobDesc`) VALUES
(1, 'CEO'),
(2, 'Foreman'),
(3, 'Driver'),
(4, 'Manager'),
(5, 'Civil Engineer'),
(6, 'Labour');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeetable`
--
ALTER TABLE `employeetable`
  ADD PRIMARY KEY (`empID`),
  ADD KEY `typeID` (`jobID`);

--
-- Indexes for table `typetable`
--
ALTER TABLE `typetable`
  ADD PRIMARY KEY (`jobID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeetable`
--
ALTER TABLE `employeetable`
  MODIFY `empID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `typetable`
--
ALTER TABLE `typetable`
  MODIFY `jobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employeetable`
--
ALTER TABLE `employeetable`
  ADD CONSTRAINT `employeetable_ibfk_1` FOREIGN KEY (`jobID`) REFERENCES `typetable` (`jobID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
