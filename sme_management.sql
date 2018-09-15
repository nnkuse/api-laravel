-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2018 at 10:33 AM
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
-- Database: `sme_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_details`
--

CREATE TABLE `list_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `list_of_date_id` int(10) UNSIGNED NOT NULL,
  `list_detail_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `in_come` decimal(8,2) NOT NULL,
  `expense` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `list_details`
--

INSERT INTO `list_details` (`id`, `list_of_date_id`, `list_detail_name`, `in_come`, `expense`, `created_at`, `updated_at`) VALUES
(1, 1, 'รายการ1', '1000.00', '300.00', '2018-09-12 12:31:28', '2018-09-12 12:31:28'),
(2, 1, 'รายการ2', '500.00', '0.00', '2018-09-12 12:32:08', '2018-09-12 12:32:08'),
(3, 2, 'รายการ1', '2000.00', '300.00', '2018-09-12 12:32:23', '2018-09-12 12:32:23'),
(4, 2, 'รายการ2', '5000.00', '0.00', '2018-09-12 12:32:41', '2018-09-12 12:32:41'),
(5, 3, 'รายการ1', '6000.00', '500.00', '2018-09-13 11:07:07', '2018-09-13 11:07:07'),
(6, 3, 'รายการ2', '300.00', '0.00', '2018-09-13 11:07:07', '2018-09-13 11:07:07'),
(7, 4, 'รายการ1', '1500.00', '0.00', '2018-09-13 17:00:00', '2018-09-13 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `list_items`
--

CREATE TABLE `list_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `list_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `agency` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `net_income` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `list_items`
--

INSERT INTO `list_items` (`id`, `list_name`, `start_date`, `end_date`, `agency`, `net_income`, `created_at`, `updated_at`) VALUES
(1, 'ทดสอบ1', '2018-09-12', '2018-09-12', 'คณะวิทยาศาสตร์และวิศวกรรมศาสตร์', '0.00', '2018-09-12 12:29:09', '2018-09-12 12:29:09'),
(2, 'ทดสอบ2', '2018-09-13', '2018-09-14', 'คณะวิทยาศาสตร์และวิศวกรรมศาสตร์', '0.00', '2018-09-13 11:05:19', '2018-09-13 11:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `list_of_dates`
--

CREATE TABLE `list_of_dates` (
  `id` int(10) UNSIGNED NOT NULL,
  `list_item_id` int(10) UNSIGNED NOT NULL,
  `in_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `list_of_dates`
--

INSERT INTO `list_of_dates` (`id`, `list_item_id`, `in_date`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-09-12', '2018-09-12 12:29:53', '2018-09-12 12:29:53'),
(2, 1, '2018-09-12', '2018-09-12 12:30:49', '2018-09-12 12:30:49'),
(3, 2, '2018-09-13', '2018-09-13 11:04:43', '2018-09-13 11:04:43'),
(4, 2, '2018-09-14', '2018-09-13 17:00:00', '2018-09-13 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2018_09_12_064258_create_list_items_table', 1),
(3, '2018_09_12_065522_create_list_of_dates_table', 1),
(4, '2018_09_12_082156_create_list_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Amin Admin', 'admin@admin.com', '$2y$10$UqUhggK1pf9Z6XZvYo3DxOpK1o3nyP.6QZu0b0LOevoigpA6IZZMO', '2018-09-12 06:06:20', '2018-09-12 06:06:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_details`
--
ALTER TABLE `list_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list_details_list_of_date_id_index` (`list_of_date_id`) USING BTREE;

--
-- Indexes for table `list_items`
--
ALTER TABLE `list_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_of_dates`
--
ALTER TABLE `list_of_dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list_of_dates_list_item_id_index` (`list_item_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_details`
--
ALTER TABLE `list_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `list_items`
--
ALTER TABLE `list_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `list_of_dates`
--
ALTER TABLE `list_of_dates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list_details`
--
ALTER TABLE `list_details`
  ADD CONSTRAINT `list_details_list_of_dat_id_foreign` FOREIGN KEY (`list_of_date_id`) REFERENCES `list_of_dates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `list_of_dates`
--
ALTER TABLE `list_of_dates`
  ADD CONSTRAINT `list_of_dates_list_item_id_foreign` FOREIGN KEY (`list_item_id`) REFERENCES `list_items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
