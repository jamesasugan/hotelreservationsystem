-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2023 at 03:58 PM
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
-- Database: `db_booking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_accounts`
--

CREATE TABLE `tbl_admin_accounts` (
  `admin_account_id` int(11) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin_accounts`
--

INSERT INTO `tbl_admin_accounts` (`admin_account_id`, `admin_email`, `admin_password`) VALUES
(1, 'myadmin@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_approve_books`
--

CREATE TABLE `tbl_approve_books` (
  `approve_id` int(11) NOT NULL,
  `admin_account_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_approve_books`
--

INSERT INTO `tbl_approve_books` (`approve_id`, `admin_account_id`, `book_id`) VALUES
(7, 1, 7),
(8, 1, 6),
(9, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `book_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `booker_name` varchar(200) NOT NULL,
  `booker_phone_number` varchar(200) NOT NULL,
  `booker_email` varchar(200) NOT NULL,
  `date_check_in` date NOT NULL,
  `time_check_in` varchar(200) NOT NULL,
  `date_check_out` date NOT NULL,
  `time_check_out` varchar(200) NOT NULL,
  `book_status` varchar(200) NOT NULL DEFAULT 'Pending',
  `reference_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`book_id`, `cust_id`, `room_id`, `booker_name`, `booker_phone_number`, `booker_email`, `date_check_in`, `time_check_in`, `date_check_out`, `time_check_out`, `book_status`, `reference_id`) VALUES
(6, 1, 1003, 'Rio Delacruz', '91231321', 'rio@gmail.com', '2023-07-07', '21:09', '2023-07-06', '21:08', 'Booked', 'Ref:1649c2fb6ef0d0'),
(7, 1, 1004, 'Rio Delacruz', '91231321', 'rio@gmail.com', '2023-07-03', '21:49', '2023-07-27', '21:49', 'Booked', 'Ref:1649c38fcb60ba'),
(8, 1, 1004, 'Edward', '09123456789', 'Edward@gmail.com', '2023-07-07', '21:49', '2023-07-18', '21:50', 'Pending', 'Ref:1649c3923dd505'),
(9, 1, 1004, 'James Asugan', '09123456', 'james@gmail.com', '2023-07-06', '21:56', '2023-07-01', '21:56', 'Booked', 'Ref:1649c3ac2ac8dd'),
(10, 1, 1001, 'Jimmy Mcgill', '45647891', 'saulgooman@gmail.com', '2023-07-07', '21:57', '2023-06-29', '21:56', 'Pending', 'Ref:1649c3ae82ff82'),
(11, 2, 1005, 'Rio delacruz', '09123456789', 'sample_email@gmail.com', '2023-07-08', '15:56', '2023-07-05', '18:56', 'Pending', 'Ref:2649c3c0eb71f3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `cust_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `contact_number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`cust_id`, `first_name`, `last_name`, `contact_number`) VALUES
(1, 'Rio', 'Delacruz', '91231321'),
(2, 'James', 'Asugan', '09123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cust_accounts`
--

CREATE TABLE `tbl_cust_accounts` (
  `cust_acc_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `cust_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cust_accounts`
--

INSERT INTO `tbl_cust_accounts` (`cust_acc_id`, `cust_id`, `user_email`, `cust_password`) VALUES
(1, 1, 'rio@gmail.com', '123456789'),
(2, 2, 'james@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `room_id` int(11) NOT NULL,
  `room_type` varchar(200) NOT NULL,
  `bed_description` varchar(200) NOT NULL,
  `room_size` int(11) NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `room_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`room_id`, `room_type`, `bed_description`, `room_size`, `room_capacity`, `room_price`) VALUES
(1001, 'Suite', 'Queen-sized Bed', 80, 2, 8500),
(1002, 'Executive Suite', 'King-sized Bed', 100, 3, 13000),
(1003, 'Family Room', 'One Queen-sized bed, one Twin-sized Bed', 120, 5, 11000),
(1004, 'Deluxe Room', 'Queen-sized Bed', 95, 3, 10000),
(1005, 'Premium Deluxe Room', 'California King-sized Bed', 150, 3, 18000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin_accounts`
--
ALTER TABLE `tbl_admin_accounts`
  ADD PRIMARY KEY (`admin_account_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `tbl_approve_books`
--
ALTER TABLE `tbl_approve_books`
  ADD PRIMARY KEY (`approve_id`),
  ADD KEY `fk_admin_account_id` (`admin_account_id`),
  ADD KEY `fk_book_id` (`book_id`);

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `fk_booking_cust_id` (`cust_id`),
  ADD KEY `fk_room_id` (`room_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `tbl_cust_accounts`
--
ALTER TABLE `tbl_cust_accounts`
  ADD PRIMARY KEY (`cust_acc_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `fk_cust_id` (`cust_id`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `room_type` (`room_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin_accounts`
--
ALTER TABLE `tbl_admin_accounts`
  MODIFY `admin_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_approve_books`
--
ALTER TABLE `tbl_approve_books`
  MODIFY `approve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cust_accounts`
--
ALTER TABLE `tbl_cust_accounts`
  MODIFY `cust_acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_approve_books`
--
ALTER TABLE `tbl_approve_books`
  ADD CONSTRAINT `fk_admin_account_id` FOREIGN KEY (`admin_account_id`) REFERENCES `tbl_admin_accounts` (`admin_account_id`),
  ADD CONSTRAINT `fk_book_id` FOREIGN KEY (`book_id`) REFERENCES `tbl_bookings` (`book_id`);

--
-- Constraints for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD CONSTRAINT `fk_booking_cust_id` FOREIGN KEY (`cust_id`) REFERENCES `tbl_customers` (`cust_id`),
  ADD CONSTRAINT `fk_room_id` FOREIGN KEY (`room_id`) REFERENCES `tbl_rooms` (`room_id`);

--
-- Constraints for table `tbl_cust_accounts`
--
ALTER TABLE `tbl_cust_accounts`
  ADD CONSTRAINT `fk_cust_id` FOREIGN KEY (`cust_id`) REFERENCES `tbl_customers` (`cust_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
