-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 06:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_ordering_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'Mac', 'Donalds');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(5) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_category` varchar(50) NOT NULL,
  `food_description` varchar(500) NOT NULL,
  `food_original_price` varchar(15) NOT NULL,
  `food_discount_price` varchar(15) NOT NULL,
  `food_availability` varchar(50) NOT NULL,
  `food_veg_nonveg` varchar(10) NOT NULL,
  `food_ingredients` varchar(1000) NOT NULL,
  `food_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `food_name`, `food_category`, `food_description`, `food_original_price`, `food_discount_price`, `food_availability`, `food_veg_nonveg`, `food_ingredients`, `food_image`) VALUES
(1, '123', 'Sugar', '                                        hello                                    ', '123', '100', 'Yes', 'Veg', 'Chili Sauce,Lao gan Ma,Salt,Soybeans', 'images/25931c7f198ab727176bb012c373547d.png'),
(3, 'test', 'Sugar', '                                        test                                    ', '111', '100', 'Yes', 'Non-Veg', 'Chili Sauce', 'images/15199c053fa8f34c7da959a660a41c32.png'),
(5, '456', 'Wootah', 'test product', '100', '10', 'Yes', 'Veg', 'Chili Sauce,Salt,Soybeans,Wootah,wot', 'images/7994eaf9f0bdced62049a89ac29b427b.png'),
(6, '789', 'Sugar', 'test product 2', '123', '50', 'Yes', 'Veg', 'Chili Sauce,Soybeans,Tomato Sauce,Wootah', 'images/8e8992260f0ebe460e2b4d41d8bcc607.png'),
(7, 'testy', 'Sugar', 'test product 3', '80', '30', 'Yes', 'Veg', 'Chili Sauce,Lao gan Ma,Soybeans', 'images/a68990e78a6a824e132af220eee0f3db.png');

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE `food_categories` (
  `id` int(5) NOT NULL,
  `food_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`id`, `food_category`) VALUES
(1, 'Sugar'),
(6, 'Wootah');

-- --------------------------------------------------------

--
-- Table structure for table `food_ingredients`
--

CREATE TABLE `food_ingredients` (
  `id` int(5) NOT NULL,
  `food_ingredient` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_ingredients`
--

INSERT INTO `food_ingredients` (`id`, `food_ingredient`) VALUES
(1, 'wot'),
(3, 'Chili Sauce'),
(4, 'Lao gan Ma'),
(5, 'Tomato Sauce'),
(6, 'Wootah'),
(7, 'Salt'),
(8, 'Soybeans');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `Fname` text NOT NULL,
  `Lname` text NOT NULL,
  `Uname` text NOT NULL,
  `Password` text NOT NULL,
  `Email` text NOT NULL,
  `Contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Fname`, `Lname`, `Uname`, `Password`, `Email`, `Contact`) VALUES
(1, 'Phuc', 'Luu', 'Marcus', 'a12356789', 'vinhphucluuhuynh@gmail.com', 'i am marcus')

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_categories`
--
ALTER TABLE `food_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_ingredients`
--
ALTER TABLE `food_ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `food_ingredients`
--
ALTER TABLE `food_ingredients`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
