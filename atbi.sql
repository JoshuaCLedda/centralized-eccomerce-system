-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2025 at 09:45 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atbi`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `canceled_orders`
--

CREATE TABLE `canceled_orders` (
  `canceled_order_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_method` enum('Gcash','Credit Card','PayPal') NOT NULL,
  `cancel_date` datetime DEFAULT NULL,
  `reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mes`
--

CREATE TABLE `mes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` enum('approved','declined') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mes`
--

INSERT INTO `mes` (`id`, `user_id`, `message`, `status`, `created_at`, `product_name`, `product_price`, `product_description`, `product_image`, `product_quantity`) VALUES
(1, 4, '', '', '2025-01-06 03:27:51', 'Dante', '34.00', '0', '../phinry/uploads/acount_bg.jpg', 5),
(2, 4, '', '', '2025-01-06 03:36:48', 'Roses', '231.00', '0', '../phinry/uploads/atbi_building.jpg', 20),
(3, 4, '', '', '2025-01-06 03:42:23', 'Rosessss', '231.00', '0', '../phinry/uploads/atbi_building.jpg', 20),
(4, 4, '', '', '2025-01-06 03:46:00', 'Rosessss', '231.00', 'Beautiful Rose', '../phinry/uploads/baner-1.png', 20),
(5, 4, '', 'approved', '2025-01-06 03:54:40', 'Rosesssssss', '231.00', 'Beautiful Rose', '../phinry/uploads/baner-1.png', 20),
(8, 4, 'approved request', 'approved', '2025-01-06 04:06:19', 'Rosesssssssssssssss', '231.00', 'Beautiful Rose', '../phinry/uploads/baner-1.png', 20),
(9, 4, 'approved request', 'approved', '2025-01-06 04:06:25', 'Rosesssssssssssssss', '231.00', 'Beautiful Rose', '../phinry/uploads/baner-1.png', 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders1`
--

CREATE TABLE `orders1` (
  `order_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `barangay` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `product_name` varchar(11) NOT NULL,
  `payment_method` enum('Gcash') DEFAULT NULL,
  `proof_of_payment` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `order_status` enum('Pending','Completed','Cancelled') DEFAULT NULL,
  `cancel_reason` text DEFAULT NULL,
  `order_date` date NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders1`
--

INSERT INTO `orders1` (`order_id`, `name`, `contact_number`, `street_address`, `barangay`, `city`, `state`, `postal_code`, `total_price`, `product_name`, `payment_method`, `proof_of_payment`, `created_at`, `order_status`, `cancel_reason`, `order_date`, `user_id`, `product_id`) VALUES
(1, 'Rose Lictao Ramos', '09668160595', '', 'Casiaman', 'Santol', 'La Union', '0515', '231.00', '', 'Gcash', 'uploads/27a6c28e-015c-4f3c-8f83-d5a8d0b0ec56.jpg', '2025-01-06 02:07:55', 'Pending', NULL, '2025-01-06', 9, 0),
(2, 'Rose Lictao Ramos', '09668160595', 'First Gate', 'Casiaman', 'Santol', 'La Union', '0515', '231.00', '', 'Gcash', 'uploads/27a6c28e-015c-4f3c-8f83-d5a8d0b0ec56.jpg', '2025-01-06 02:14:38', 'Pending', NULL, '2025-01-06', 9, 0),
(3, 'Rose Lictao Ramos', '09668160595', 'First Gate', 'Casiaman', 'Santol', 'La Union', '0515', '231.00', '', 'Gcash', 'uploads/atbi-logo-removebg-preview.png', '2025-01-06 02:19:17', 'Pending', NULL, '2025-01-06', 9, 0),
(4, 'Rose Lictao Ramos', '09668160595', 'First Gate', 'Casiaman', 'Santol', 'La Union', '0515', '231.00', '', 'Gcash', 'uploads/27a6c28e-015c-4f3c-8f83-d5a8d0b0ec56.jpg', '2025-01-06 02:19:47', 'Pending', NULL, '2025-01-06', 9, 0),
(5, 'Rose Lictao Ramos', '09668160595', 'First Gate', 'Casiaman', 'Santol', 'La Union', '0515', '231.00', '', 'Gcash', 'uploads/atbi-logo-removebg-preview.png', '2025-01-06 02:24:21', 'Pending', NULL, '2025-01-06', 9, 0),
(6, 'Rose Lictao Ramos', '09668160595', 'First Gate', 'Casiaman', 'Santol', 'La Union', '0515', '231.00', '', 'Gcash', 'uploads/atbi-logo-removebg-preview.png', '2025-01-06 02:37:51', 'Pending', NULL, '2025-01-06', 9, 0),
(7, 'Rose Lictao Ramos', '09668160595', 'First Gate', 'Casiaman', 'Santol', 'La Union', '0515', '231.00', '', 'Gcash', 'uploads/27a6c28e-015c-4f3c-8f83-d5a8d0b0ec56.jpg', '2025-01-06 07:39:28', 'Pending', NULL, '2025-01-06', 8, 0),
(8, 'Rose Lictao Ramos', '09668160595', 'First Gate', 'Casiaman', 'Santol', 'La Union', '0515', '231.00', '', 'Gcash', 'uploads/27a6c28e-015c-4f3c-8f83-d5a8d0b0ec56.jpg', '2025-01-06 07:40:19', 'Pending', NULL, '2025-01-06', 8, 0),
(9, 'Rose Lictao Ramos', '09668160595', 'First Gate', 'Casiaman', 'Santol', 'La Union', '0515', '231.00', 'Rose Lictao', 'Gcash', 'uploads/bd2fe0ed-b7dc-4fe1-befd-f48bf8602256.jpg', '2025-01-06 07:46:18', 'Pending', NULL, '2025-01-06', 9, 0),
(10, 'Rose Lictao Ramos', '09668160595', 'First Gate', 'Casiaman', 'Santol', 'La Union', '0515', '231.00', 'Array', 'Gcash', 'uploads/bd2fe0ed-b7dc-4fe1-befd-f48bf8602256.jpg', '2025-01-06 07:47:04', 'Pending', NULL, '2025-01-06', 9, 0),
(11, 'Rose Lictao Ramos', '09668160595', 'First Gate', 'Casiaman', 'Santol', 'La Union', '0515', '231.00', '', 'Gcash', '677bf90068ebb.jpg', '2025-01-06 10:38:40', 'Pending', NULL, '2025-01-06', NULL, 0),
(12, 'Rose Lictao Ramos', '09668160595', 'First Gate', 'Casiaman', 'Santol', 'La Union', '0515', '231.00', '', 'Gcash', '677bf9204caf6.jpg', '2025-01-06 10:39:12', 'Pending', NULL, '2025-01-06', NULL, 0),
(13, 'Rose Lictao Ramos', '09668160595', 'First Gate', 'Casiaman', 'Santol', 'La Union', '0515', '34.00', '', 'Gcash', '677bfcded81e5.png', '2025-01-06 10:55:10', 'Pending', NULL, '2025-01-06', NULL, 0),
(14, 'Rose Lictao Ramos', '09668160595', 'First Gate', 'Casiaman', 'Santol', 'La Union', '0515', '34.00', '', 'Gcash', '677c02a04fa2e.jpg', '2025-09-09 11:19:44', 'Pending', NULL, '2025-01-06', NULL, 0),
(15, 'Rose Lictao Ramos', '09668160595', 'First Gate', 'Casiaman', 'Santol', 'La Union', '0515', '34.00', '', 'Gcash', '677c04ac71abe.jpg', '2025-01-06 11:28:28', 'Pending', NULL, '2025-01-06', NULL, 0),
(16, 'Rose Lictao Ramos', '09668160595', 'First Gate', 'Casiaman', 'Bacnotan', 'La Union', '2515', '34.00', '', 'Gcash', '677c0e9c8ca53.jpg', '2025-01-06 12:10:52', 'Pending', NULL, '2025-01-06', NULL, 0),
(17, 'Rose Lictao Ramos', '09668160595', 'First Gate', 'Casiaman', 'Santol', 'La Union', '0515', '231.00', '', 'Gcash', '677c0f074efe4.jpg', '2025-01-06 12:12:39', 'Pending', NULL, '2025-01-06', NULL, 0),
(18, 'Rose Lictao Ramos', '09668160595', 'First Gate', 'Casiaman', 'Santol', 'La Union', '0515', '231.00', '', 'Gcash', '677c0fae7e1ca.jpg', '2025-01-06 12:15:26', 'Pending', NULL, '2025-01-06', NULL, 0),
(2147483647, 'Charde Ball', '+1 (534) 182-99', 'Dolore illum assume', 'Voluptatem Sapiente', 'Non quae quo nisi li', 'Ullam irure similiqu', 'Et animi explicabo', '265.00', '', 'Gcash', 'payment_17362734064354.jpg', '2025-01-07 13:10:06', NULL, NULL, '0000-00-00', 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 3, 9, 1, '231.00'),
(2, 4, 9, 1, '231.00'),
(3, 5, 9, 1, '231.00'),
(4, 6, 9, 1, '231.00'),
(5, 7, 8, 1, '231.00'),
(6, 8, 8, 1, '231.00'),
(7, 9, 9, 1, '231.00'),
(8, 10, 9, 1, '231.00');

-- --------------------------------------------------------

--
-- Table structure for table `productreq`
--

CREATE TABLE `productreq` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Approved','Declined') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productreq`
--

INSERT INTO `productreq` (`id`, `product_name`, `product_price`, `product_description`, `product_image`, `is_approved`, `created_at`, `status`, `user_id`, `product_quantity`) VALUES
(1, 'Dante', '34.00', 'hello world', '../phinry/uploads/acount_bg.jpg', 1, '2025-01-06 02:41:26', 'Approved', 4, 5),
(2, 'Roses', '231.00', 'Beautiful Rose', '../phinry/uploads/atbi_building.jpg', 1, '2025-01-06 03:36:35', 'Approved', 4, 0),
(3, 'Rosessss', '231.00', 'Beautiful Rose', '../phinry/uploads/atbi_building.jpg', 1, '2025-01-06 03:41:04', 'Approved', 4, 18),
(4, 'Rosessss', '231.00', 'Beautiful Rose', '../phinry/uploads/baner-1.png', 1, '2025-01-06 03:45:47', 'Approved', 4, 19),
(5, 'Rosesssssss', '231.00', 'Beautiful Rose', '../phinry/uploads/baner-1.png', 1, '2025-01-06 03:54:32', 'Approved', 4, 19),
(6, 'Rosesssssssssssssss', '231.00', 'Beautiful Rose', '../phinry/uploads/baner-1.png', 1, '2025-01-06 04:04:35', 'Approved', 4, 19),
(7, 'Rosesssssssssssssss', '231.00', 'Beautiful Rose', '../phinry/uploads/baner-1.png', 1, '2025-01-06 04:06:15', 'Approved', 4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_description` varchar(255) DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL COMMENT '0 active, 1 inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `product_description`, `user_id`, `product_quantity`, `status`) VALUES
(10, 'Samuel Nixon', '766.00', '../uploads/IMG_9304.JPG', 'Proident aut cillum', NULL, 406, 0),
(11, 'Gareth Sexton', '297.00', '../uploads/IMG_9307.JPG', 'Dolor nisi anim volu', NULL, 373, 0),
(12, 'Wade Ellis', '565.00', '../uploads/IMG_9310.JPG', 'Qui eu aliquid est ', NULL, 126, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `email`, `password`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 0, 'akira', 'neryxuxaly@mailinator.com', '$2y$10$BzeNHfkGz3.7an.Lc3NJbufcVhGrwgKIPrYeSiISSNvRdS.3jnivy', 'Hyatt', 'Cox', '2025-01-23 13:36:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canceled_orders`
--
ALTER TABLE `canceled_orders`
  ADD PRIMARY KEY (`canceled_order_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `mes`
--
ALTER TABLE `mes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders1`
--
ALTER TABLE `orders1`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `productreq`
--
ALTER TABLE `productreq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `canceled_orders`
--
ALTER TABLE `canceled_orders`
  MODIFY `canceled_order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mes`
--
ALTER TABLE `mes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders1`
--
ALTER TABLE `orders1`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `productreq`
--
ALTER TABLE `productreq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
