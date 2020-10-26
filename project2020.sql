-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2020 at 07:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `citizens`
--

CREATE TABLE `citizens` (
  `uid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `picname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citizens`
--

INSERT INTO `citizens` (`uid`, `name`, `contact`, `address`, `city`, `state`, `email`, `pincode`, `picname`) VALUES
('Harsh', 'Kheman', '8729022552', 'Ajit Road Bathinda, Punjab', 'Bathinda', 'Punjab', 'Khemanjain@gmail.com', '151001', 'kheman.JPG'),
('Harsh123', 'Kheman', '8729022552', 'Ajit Road Bathinda, Punjab', 'Bathinda', 'Punjab', 'Khemanjain@gmail.com', '151001', 'kheman.JPG'),
('Kheman', 'Kheman', '7667867678', 'Ajit Road Bathinda, Punjab sjaxshbxhasbh', 'Bathinda', 'Punjab', 'Khemanjain@gmail.com', '151001', 'IMG_6758.JPG'),
('Rajat', 'Kheman', '8729022552', 'Ajit Road Bathinda, Punjab', 'Bathinda', 'Punjab', 'Khemanjain@gmail.com', '151001', 'kheman.JPG'),
('Rashul', 'Kheman Jain', '8729022552', 'Ajit Road Bathinda, Punjab Bathinda', 'Bathinda', 'Punjab', 'Khemanjain@gmail.com', '151001', 'IMG_6759.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rid` int(11) NOT NULL,
  `citizenid` varchar(100) DEFAULT NULL,
  `workerid` varchar(100) DEFAULT NULL,
  `ratings` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rid`, `citizenid`, `workerid`, `ratings`) VALUES
(4, 'Rashul', 'manan', NULL),
(5, 'Rashul', 'manan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `rid` int(11) NOT NULL,
  `cust_uid` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `problem` varchar(200) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `dop` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`rid`, `cust_uid`, `category`, `problem`, `location`, `city`, `dop`) VALUES
(1, 'Harsh', 'Car Repair', 'Car Repair Worker Needed Urgently', 'Barnala', 'Barnala', '2020-07-07'),
(3, 'Raju', 'Bricks Man', 'Bricksman Needed', 'Chandigarh', 'Chandigarh', '2020-06-23'),
(5, '', '', '', '', '', '2020-07-11'),
(6, 'Rashul', 'Appliance Repair', 'Need Repair Man', 'Ajit Road Bathinda', 'Bathinda', '2020-07-13'),
(7, 'Rashul', 'Electrician', 'Need Elecrician', 'Ajit Road Bathinda', 'Bathinda', '2020-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` varchar(50) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `dos` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `pwd`, `mob`, `category`, `dos`, `status`) VALUES
('admin', 'admin', '', 'Admin', '2020-06-17', 1),
('Aman', 'Aman123', '3452462254', 'Worker', '2020-06-17', 1),
('Kheman', 'jainK@121213', '5646545645', 'Worker', '2020-06-17', 1),
('Kheman1', 'Kheman@1604', '8955973290', 'Citizen', '2020-08-30', 1),
('Rashul', 'Rahul', '1111111111', 'Citizen', '2020-06-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `uid` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `workername` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `firmshop` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `states` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `specialization` varchar(200) NOT NULL,
  `experience` int(10) NOT NULL,
  `aadharpic` varchar(200) NOT NULL,
  `profilepic` varchar(200) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `otherinfo` varchar(300) NOT NULL,
  `rating` int(11) NOT NULL,
  `ratecount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`uid`, `email`, `workername`, `contact`, `firmshop`, `city`, `address`, `states`, `category`, `specialization`, `experience`, `aadharpic`, `profilepic`, `pincode`, `otherinfo`, `rating`, `ratecount`) VALUES
('Aman68687', 'Raju@gmail.comnjak', 'Aman', '73141441', 'Ajit Road Raju shop . punjab BAthindadsqhkcbdbcqhj', 'Bathinda', 'Bathinda Ajit Roadnwchqkbhcqk', 'Punjab', 'Wooden Flooring', 'Wooden Work', 5, 'IMG_9492 edited.jpg', 'Photoshoped.jpg', '151001', ' Wooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden Work', 0, 1),
('chaman234567', 'Raju@gmail.com', 'Raju', '7867867861', 'Ajit Road Raju shop . punjab BAthinda', 'Bathinda', 'Bathinda Ajit Road', 'Punjab', 'Wooden Flooring', 'Wooden Work', 5, 'IMG_9492 edited.jpg', 'Photoshoped.jpg', '151001', ' Wooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden Work', 0, 1),
('manan', 'Raju@gmail.com', 'Raju', '7867867861', 'Ajit Road Raju shop . punjab BAthinda', 'Bathinda', 'Bathinda Ajit Road', 'Punjab', 'Wooden Flooring', 'Wooden Work', 5, 'IMG_9492 edited.jpg', 'Photoshoped.jpg', '151001', ' Wooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden Work', 9, 3),
('Raju', 'Raju@gmail.com', 'Raju', '7867867861', 'Ajit Road Raju shop . punjab BAthinda', 'Bathinda', 'Bathinda Ajit Road', 'Punjab', 'Wooden Flooring', 'Wooden Work', 5, 'IMG_9492 edited.jpg', 'Photoshoped.jpg', '151001', ' Wooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden Work', 12, 4),
('Ram1234456789', 'Raju@gmail.com', 'Raju', '7867867861', 'Ajit Road Raju shop . punjab BAthinda', 'Bathinda', 'Bathinda Ajit Road', 'Punjab', 'Wooden Flooring', 'Wooden Work', 5, 'IMG_9492 edited.jpg', 'Photoshoped.jpg', '151001', ' Wooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden WorkWooden Work', 0, 1),
('Rashul', 'Rajudscds@gmail.com', 'Raju', 'y278366181', 'Ajit Road Raju shop . punjab BAthinda', 'bhdjsbhca', 'Bathinda Ajit Road', 'Nagaland', 'Tiling Services', 'Wooden Work', 7, 'IMG_9940.JPG', 'IMG_6771.JPG', '151001', 'The cat was playing in the garden.The cat was playing in the garden.The cat was playing in the garden.The cat was playing in the garden.The cat was playing in the garden.The cat was playing in the garden.The cat was playing in the garden.', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citizens`
--
ALTER TABLE `citizens`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
