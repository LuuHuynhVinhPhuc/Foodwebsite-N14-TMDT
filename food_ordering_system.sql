-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 05:32 PM
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
  `id` int(11) NOT NULL,
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
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_number` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_manager` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `opening_hours` varchar(255) NOT NULL,
  `closing_hours` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_number`, `branch_name`, `branch_manager`, `address`, `phone_number`, `email_address`, `opening_hours`, `closing_hours`) VALUES
(1, 'Main Branch', 'John Doe', '123 Main Street, Anytown, USA', '123-456-7890', 'main@example.com', '8:00 AM', '6:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Salary` decimal(10,2) DEFAULT NULL,
  `Title` varchar(30) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `Name`, `Email`, `Phone`, `Salary`, `Title`, `Status`) VALUES
(1, 'John Doe', 'john@example.com', '123-456-7890', 50000.00, 'Manager', 'Active'),
(2, 'Jane Smith', 'jane@example.com', '987-654-3210', 60000.00, 'Supervisor', 'Active'),
(3, 'Michael Johnson', 'michael@example.com', '111-222-3333', 55000.00, 'Associate', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `employeetitle`
--

CREATE TABLE `employeetitle` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employeetitle`
--

INSERT INTO `employeetitle` (`ID`, `Title`) VALUES
(1, 'Manager'),
(2, 'Supervisor'),
(3, 'Associate');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_category` varchar(50) NOT NULL,
  `food_description` varchar(500) NOT NULL,
  `food_original_price` varchar(15) NOT NULL,
  `food_discount_price` varchar(15) NOT NULL,
  `food_availability` varchar(50) NOT NULL,
  `food_veg_nonveg` varchar(10) NOT NULL,
  `food_ingredients` varchar(1000) NOT NULL,
  `food_image` varchar(500) NOT NULL,
  `approved` varchar(50) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `food_name`, `food_category`, `food_description`, `food_original_price`, `food_discount_price`, `food_availability`, `food_veg_nonveg`, `food_ingredients`, `food_image`, `approved`) VALUES
(1, '123', 'Sugar', '                                        hello                                    ', '123', '100', 'Yes', 'Veg', 'Chili Sauce,Lao gan Ma,Salt,Soybeans', 'images/25931c7f198ab727176bb012c373547d.png', 'yes'),
(3, 'test', 'Sugar', '                                        test                                    ', '111', '100', 'Yes', 'Non-Veg', 'Chili Sauce', 'images/15199c053fa8f34c7da959a660a41c32.png', 'no'),
(5, '456', 'Wootah', 'test product', '100', '10', 'Yes', 'Veg', 'Chili Sauce,Salt,Soybeans,Wootah,wot', 'images/7994eaf9f0bdced62049a89ac29b427b.png', 'yes'),
(6, '789', 'Sugar', 'test product 2', '123', '50', 'Yes', 'Veg', 'Chili Sauce,Soybeans,Tomato Sauce,Wootah', 'images/8e8992260f0ebe460e2b4d41d8bcc607.png', 'yes'),
(7, 'testy', 'Sugar', 'test product 3', '80', '30', 'Yes', 'Veg', 'Chili Sauce,Lao gan Ma,Soybeans', 'images/a68990e78a6a824e132af220eee0f3db.png', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE `food_categories` (
  `id` int(11) NOT NULL,
  `food_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`id`, `food_category`) VALUES
(1, 'Sugar'),
(6, 'Wootah'),
(7, 'Meat');

-- --------------------------------------------------------

--
-- Table structure for table `food_ingredients`
--

CREATE TABLE `food_ingredients` (
  `id` int(11) NOT NULL,
  `food_ingredient` varchar(50) NOT NULL,
  `approved` varchar(50) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_ingredients`
--

INSERT INTO `food_ingredients` (`id`, `food_ingredient`, `approved`) VALUES
(1, 'wot', 'yes'),
(3, 'Chili Sauce', 'no'),
(4, 'Lao gan Ma', 'yes'),
(5, 'Tomato Sauce', 'yes'),
(6, 'Wootah', 'yes'),
(7, 'Salt', 'yes'),
(8, 'Soybeans', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `voucher_discount` decimal(10,2) NOT NULL,
  `final_price` decimal(10,2) NOT NULL,
  `id_item` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `customer_name`, `date_time`, `total_price`, `voucher_discount`, `final_price`, `id_item`) VALUES
('0LG01739T3241472T', 'Marcus', 'Nov 22, 2023 1:44', 300.00, 100.00, 200.00, '9'),
('1TH192884F2241021', 'Marcus', 'Nov 22, 2023 1:48', 300.00, 100.00, 200.00, '10'),
('3HV67616XY507810C', 'Marcus', 'Nov 26, 2023 23:11', 300.00, 100.00, 200.00, '15'),
('4M472315SE631505U', 'Marcus', 'Nov 22, 2023 1:50', 300.00, 100.00, 200.00, '11'),
('6KP63538F9332000R', 'Marcus', 'Nov 22, 2023 1:53', 300.00, 100.00, 200.00, '12'),
('7XT52708LX189801R', 'Marcus', 'Nov 14, 2023 20:11', 160.00, 0.00, 160.00, '2'),
('9D285194KU822061V', 'Marcus', 'Nov 26, 2023 22:45', 220.00, 100.00, 120.00, '13');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_item`
--

CREATE TABLE `receipt_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `receipt_id` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt_item`
--

INSERT INTO `receipt_item` (`id`, `receipt_id`, `item_name`, `item_price`, `quantity`, `total_price`) VALUES
(8, '7XT52708LX189801R', 'testy', 30.00, 2, 60.00),
(9, '0LG01739T3241472T', '123', 100.00, 3, 300.00),
(10, '1TH192884F2241021', '123', 100.00, 3, 300.00),
(11, '4M472315SE631505U', '123', 100.00, 3, 300.00),
(12, '6KP63538F9332000R', '123', 100.00, 3, 300.00),
(13, '9D285194KU822061V', '789', 50.00, 4, 200.00),
(14, '9D285194KU822061V', '456', 10.00, 2, 20.00),
(15, '3HV67616XY507810C', '123', 100.00, 3, 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_no` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `request_type` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_no`, `name`, `request_type`, `note`) VALUES
(1, 'Chili Sauce', 'ingredient', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
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
(1, 'Phuc', 'Luu', 'Marcus', 'a12356789', 'vinhphucluuhuynh@gmail.com', 'i am marcus');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(10) UNSIGNED NOT NULL,
  `voucher_code` varchar(255) DEFAULT NULL,
  `discount` decimal(10,0) DEFAULT NULL,
  `use_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `voucher_code`, `discount`, `use_count`) VALUES
(1, '30SOFFi', 100, 28);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_number`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employeetitle`
--
ALTER TABLE `employeetitle`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_item`
--
ALTER TABLE `receipt_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipt_id` (`receipt_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voucher_code` (`voucher_code`),
  ADD UNIQUE KEY `voucher_code_2` (`voucher_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employeetitle`
--
ALTER TABLE `employeetitle`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `food_ingredients`
--
ALTER TABLE `food_ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receipt_item`
--
ALTER TABLE `receipt_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `receipt_item`
--
ALTER TABLE `receipt_item`
  ADD CONSTRAINT `receipt_item_ibfk_1` FOREIGN KEY (`receipt_id`) REFERENCES `receipt` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
