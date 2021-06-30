-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 06:50 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fun`
--

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `User_Id` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `Chat` text,
  `Date_Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`User_Id`, `category`, `Chat`, `Date_Time`) VALUES
('sac@gmail.com', 'anime', 'Hello', '2021-06-29 18:02:01'),
('shubham@gmail.com', 'anime', 'Hi Sachin', '2021-06-29 18:03:40'),
('shubham@gmail.com', 'anime', 'Kaise ho', '2021-06-29 18:03:49'),
('sac@gmail.com', 'anime', 'Hello Shubham', '2021-06-29 18:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `list_content`
--

CREATE TABLE `list_content` (
  `User_Id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `sub_category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_content`
--

INSERT INTO `list_content` (`User_Id`, `title`, `category`, `sub_category`) VALUES
('sac@gmail.com  ', 'One piece', 'anime', 'WL'),
('sac@gmail.com   ', 'Naruto', 'anime', 'AW'),
('sac@gmail.com   ', 'Hunter x Hunter', 'anime', 'WL'),
('shubham@gmail.com ', 'Naruto', 'anime', 'WL'),
('shubham@gmail.com  ', 'One piece', 'anime', 'WL'),
('sac@gmail.com', 'anime', '', '2021-06-29 18:00:29'),
('sac@gmail.com', 'anime', 'Hello\r\n', '2021-06-29 18:01:05'),
('sac@gmail.com', 'anime', 'Hello', '2021-06-29 18:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` varchar(50) NOT NULL,
  `UPwd` varchar(255) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `UPwd`, `FName`, `LName`) VALUES
('sac@gmail.com', 'b5241b4630506e90ecf9d060c28b92c3', 'Sachin', 'Pandey'),
('sac1@gmail.com', 'b5241b4630506e90ecf9d060c28b92c3', 'Sachin', 'Pandey'),
('soni12@gmail.com', 'b5241b4630506e90ecf9d060c28b92c3', 'Soni', 'Pandey'),
('sachinpandey9918784075@gmail.com', 'b5241b4630506e90ecf9d060c28b92c3', 'sa', 'sad'),
('sc@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'S', 'P'),
('s@gmail.com', '03c7c0ace395d80182db07ae2c30f034', 'S', 'P'),
('shubham@gmail.com', '3b6beb51e76816e632a40d440eab0097', 'Shubham', 'Pandey');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
