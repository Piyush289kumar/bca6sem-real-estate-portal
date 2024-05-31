-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 07:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `housing_web_portal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `aid` int(11) NOT NULL,
  `atitle` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `sqft` varchar(255) NOT NULL,
  `bed` varchar(255) NOT NULL,
  `atype` varchar(255) NOT NULL,
  `aimg` varchar(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `active_record` varchar(255) NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`aid`, `atitle`, `address`, `price`, `sqft`, `bed`, `atype`, `aimg`, `userId`, `active_record`) VALUES
(542, 'Golden Urban House For Sell', 'Panagar, Jabalpur', '4599', '1000', '3', '62', '31_May_2024_07_28_14pm_property-1.jpg', 'admin', 'Yes'),
(543, 'title 5', 'address 5', '5', 'sqft 5', '5', '68', '31_May_2024_07_08_12pm_p6.jpg', 'admin', 'no'),
(544, 'Luxury Apartment for Sale', 'Patan, Jabalpur', '6500', '1200', '5', '61', '31_May_2024_07_28_03pm_property-2.jpg.webp', 'admin', 'Yes'),
(545, 'Modern City Loft Available Now', 'Yadav Colony, Jabalpur', '7500', '850', '2', '64', '31_May_2024_07_29_31pm_property-3.jpg.webp', 'admin', 'Yes'),
(546, 'Chic Metropolitan Condo for Sale', 'SBI Chowk, Jabalpur', '3540', '3500', '4', '61', '31_May_2024_07_30_11pm_property-4.jpg.webp', 'admin', 'Yes'),
(547, 'Stylish Residence for Sale', 'Civic Center', '6500', '1300', '4', '64', '31_May_2024_07_31_18pm_property-5.jpg.webp', 'admin', 'Yes'),
(548, 'Contemporary City Home for Sale', 'Ranital, Jabalpur', '7800', '3500', '5', '66', '31_May_2024_07_32_32pm_property-6.jpg.webp', 'admin', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(68, 'Garage', 0),
(67, 'Shop', 0),
(66, 'Townhouse', 0),
(65, 'Building', 0),
(64, 'Office', 0),
(63, 'Home', 0),
(62, 'Villa', 0),
(61, 'Apartment', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `img` text NOT NULL,
  `otp` varchar(255) NOT NULL,
  `active_record` varchar(255) NOT NULL DEFAULT 'Yes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`, `img`, `otp`, `active_record`) VALUES
(186, 'admin', 'admin', 'admin', 'd9b1d7db4cd6e70935368a1efb10e377', 1, '31_May_2024_06_17_57pm_default_user_profile.png', '', 'Yes'),
(187, 'tmp', 'tmp', 'tmp', 'd9b1d7db4cd6e70935368a1efb10e377', 0, '20_Mar_2024_12_41_07pm_play-default.png.webp', '', 'no'),
(188, 'Tmpe', 'temp', 'abc', '202cb962ac59075b964b07152d234b70', 0, '20_Mar_2024_04_29_34pm_youtube-2.jpg.webp', '', 'no'),
(189, 'local', 'user', 'local', '202cb962ac59075b964b07152d234b70', 0, '31_May_2024_06_17_43pm_default_user_profile.png', '', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=549;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
