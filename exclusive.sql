-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 09:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exclusive`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `is_approved` tinyint(1) DEFAULT 0,
  `otp` varchar(10) DEFAULT NULL,
  `otp_expiry` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`, `email`, `is_verified`, `is_approved`, `otp`, `otp_expiry`) VALUES
(1, 'Saalim Sadman', '$2y$10$pUp6OxbIZNzTc/gkSoru..2urNxRsOUHVoqeS/5dNeMwyRzow0V4i', '2025-01-10 08:04:14', '', 0, 0, NULL, NULL),
(2, 'Juman', '$2y$10$8cHx6EDUU1hRi2wPvdqQW.pr0EBRui4LOF5h96uq7pTGqXxFual76', '2025-01-10 08:10:25', 'juman@gmail.com', 0, 0, '912804', '2025-01-10 03:15:25'),
(4, 'Sadman', '$2y$10$3OCNdBIDog5i.KmdvIUiH.IQvx8KU6n8zcCij3FtKdRFa3vjEP2pa', '2025-01-10 08:25:04', 'sadmanmd225@gmail.com', 0, 0, '375736', '2025-01-10 03:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `created_at`) VALUES
(17, 'Woman’s Fashion', 'woman’s-fashion', NULL, '2025-01-09 15:08:09'),
(18, 'Azim bhai', 'azim-bhai', 17, '2025-01-09 15:08:20'),
(19, 'Men’s Fashion', 'men’s-fashion', NULL, '2025-01-09 15:08:28'),
(21, 'Electronics', 'electronics', NULL, '2025-01-10 07:03:22'),
(22, 'Home & Lifestyle', 'home-&-lifestyle', NULL, '2025-01-10 07:03:29'),
(23, 'Medicine', 'medicine', NULL, '2025-01-10 07:03:37'),
(24, 'Sports & Outdoor', 'sports-&-outdoor', NULL, '2025-01-10 07:03:44'),
(25, 'Baby’s & Toys', 'baby’s-&-toys', NULL, '2025-01-10 07:03:50'),
(26, 'Groceries & Pets', 'groceries-&-pets', NULL, '2025-01-10 07:03:57'),
(27, 'Health & Beauty', 'health-&-beauty', NULL, '2025-01-10 07:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `editable_text`
--

CREATE TABLE `editable_text` (
  `id` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `editable_text`
--

INSERT INTO `editable_text` (`id`, `section`, `content`) VALUES
(1, 'topBar', 'Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%! <a href=\"github.com/sadmansalim\">ShopNow</a>');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`) VALUES
(1, 'Laptop', 'A powerful laptop for work and gaming'),
(2, 'Smartphone', 'A high-end smartphone with great camera'),
(3, 'Tablet', 'A portable tablet for reading and browsing'),
(4, 'Smartwatch', 'A smartwatch with health tracking features');

-- --------------------------------------------------------

--
-- Table structure for table `verification_tokens`
--

CREATE TABLE `verification_tokens` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `editable_text`
--
ALTER TABLE `editable_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification_tokens`
--
ALTER TABLE `verification_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `editable_text`
--
ALTER TABLE `editable_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `verification_tokens`
--
ALTER TABLE `verification_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `verification_tokens`
--
ALTER TABLE `verification_tokens`
  ADD CONSTRAINT `verification_tokens_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
