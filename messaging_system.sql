-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 09:20 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messaging system`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `M_T` varchar(100) NOT NULL,
  `M_Subject` varchar(100) NOT NULL,
  `Message` varchar(10000) NOT NULL,
  `M_From` varchar(100) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`M_T`, `M_Subject`, `Message`, `M_From`, `UserID`, `ID`, `timeStamp`) VALUES
('test1@test.com', 'test', 'test', 'test@test.com', 2, 1, '2019-04-05 17:29:58'),
('test1@test.com', 'test', 'test', 'test@test.com', 2, 2, '2019-04-05 17:29:58'),
('test1@test.com', 'test', 'test', 'test@test.com', 2, 3, '2019-04-05 17:29:58'),
('test1@test.com', 'test', 'test', 'test@test.com', 2, 4, '2019-04-05 17:29:58'),
('test1@test.com', 'test', 'qwe', 'test@test.com', 2, 5, '2019-04-05 17:29:58'),
('test1@test.com', 'test', 'test', 'test@test.com', 2, 6, '2019-04-05 17:29:58'),
('test1@test.com', 'test', 'test', 'test@test.com', 2, 7, '2019-04-05 17:29:58'),
('test@test.com', 'test', 'test', 'test1@test.com', 1, 8, '2019-04-05 17:29:58'),
('test@test.com', 'test', 'test', 'test1@test.com', 1, 9, '2019-04-05 17:29:58'),
('test@test.com', 'test', 'test test test test', 'test1@test.com', 1, 10, '2019-04-05 17:29:58'),
('test@test.com', 'abc', 'abc', 'test1@test.com', 1, 11, '2019-04-05 17:30:29'),
('test@test.com', 'hi', 'hi my name is ragheb', 'test1@test.com', 1, 12, '2019-04-05 19:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Email` varchar(150) NOT NULL,
  `password` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `password`, `phone`, `ID`) VALUES
('test@test.com', 123, 1121388128, 1),
('test1@test.com', 123, 1012043667, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
