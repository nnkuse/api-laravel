-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2018 at 09:59 AM
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
  `net_income` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `list_items`
--

INSERT INTO `list_items` (`id`, `list_name`, `start_date`, `end_date`, `agency`, `net_income`, `created_at`, `updated_at`) VALUES
(5, 'ทดสอบ5', '2018-09-30', '2018-09-30', 'หน่วยงาน5', '0.00', '2018-09-30 06:54:05', '2018-09-30 06:54:05'),
(6, 'ทดสอบ6', '2018-09-30', '2018-09-30', 'หน่วยงานทดสอบ', '0.00', '2018-09-30 07:05:25', '2018-09-30 07:05:25'),
(7, 'ทดสอบ7', '2018-09-30', '2018-09-30', 'หน่วยงาน7', '0.00', '2018-09-30 07:18:42', '2018-09-30 07:18:42'),
(8, 'ทดสอบ8', '2018-09-30', '2018-09-30', 'หน่วยงาน8', '0.00', '2018-09-30 07:20:15', '2018-09-30 07:20:15'),
(9, 'ทดสอบ8', '2018-09-30', '2018-09-30', 'หน่วยงาน8', '0.00', '2018-09-30 07:21:47', '2018-09-30 07:21:47'),
(10, 'ทดสอบ9', '2018-09-30', '2018-09-30', 'หน่วยงาน9', '0.00', '2018-09-30 07:22:30', '2018-09-30 07:22:30'),
(11, 'ทดสอบ10', '2018-09-30', '2018-09-30', 'หน่วยงาน10', '0.00', '2018-09-30 07:25:22', '2018-09-30 07:25:22'),
(12, 'ทดสอบ11', '2018-09-30', '2018-09-30', 'หน่วยงาน11', '0.00', '2018-09-30 07:54:09', '2018-09-30 07:54:09'),
(13, 'ทดสอบ12', '2018-09-30', '2018-09-30', 'หน่วยงาน12', '0.00', '2018-09-30 07:59:17', '2018-09-30 07:59:17'),
(14, 'ทดสอบ14', '2018-09-30', '2018-09-30', 'หน่วยงาน14', '0.00', '2018-09-30 08:04:07', '2018-09-30 08:04:07'),
(15, 'ทดสอบ15', '2018-09-30', '2018-09-30', 'ทดสอบ15', '0.00', '2018-09-30 08:15:45', '2018-09-30 08:15:45'),
(16, 'ทดสอบ16', '2018-09-30', '2018-09-30', 'ทดสอบ16', '0.00', '2018-09-30 08:19:02', '2018-09-30 08:19:02'),
(17, 'ทดสอบ17', '2018-09-30', '2018-09-30', 'ทดสอบ17', '0.00', '2018-09-30 08:19:23', '2018-09-30 08:19:23'),
(18, 'ทดสอบ18', '2018-09-30', '2018-09-30', 'ทดสอบ18', '0.00', '2018-09-30 08:20:11', '2018-09-30 08:20:11'),
(19, 'ทดสอบ19', '2018-09-30', '2018-09-30', 'ทดสอบ19', '0.00', '2018-09-30 08:26:06', '2018-09-30 08:26:06'),
(20, 'ทดสอบ20', '2018-09-30', '2018-09-30', 'ทดสอบ20', '0.00', '2018-09-30 15:31:15', '2018-09-30 15:31:15'),
(21, 'ทดสอบ21', '2018-09-30', '2018-09-30', 'ทดสอบ21', '0.00', '2018-09-30 15:36:30', '2018-09-30 15:36:30'),
(22, 'ทดสอบ22', '2018-09-30', '2018-09-30', 'ทดสอบ22', '0.00', '2018-09-30 15:38:32', '2018-09-30 15:38:32');

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
(10, 22, '2018-10-02', '2018-10-01 02:25:08', '2018-10-01 05:48:38'),
(11, 21, '2018-10-01', '2018-10-01 03:07:07', '2018-10-01 03:07:07'),
(12, 22, '2018-10-01', '2018-10-01 03:12:59', '2018-10-01 03:12:59'),
(13, 22, '2018-10-01', '2018-10-01 03:13:49', '2018-10-01 03:13:49'),
(14, 22, '2018-10-01', '2018-10-01 03:14:51', '2018-10-01 03:14:51'),
(16, 22, '2018-10-01', '2018-10-01 03:14:57', '2018-10-01 03:14:57'),
(22, 16, '2018-10-01', '2018-10-01 06:29:29', '2018-10-01 06:29:29'),
(23, 22, '2018-10-02', '2018-10-02 11:03:43', '2018-10-02 11:03:43'),
(24, 22, '2018-10-07', '2018-10-07 07:31:24', '2018-10-07 07:31:24');

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
(4, '2018_09_12_082156_create_list_details_table', 1),
(5, '2018_09_17_110045_create_users_table', 2),
(6, '2018_09_17_110652_create_subjects_table', 2),
(7, '2018_09_17_110046_create_users_table', 3),
(8, '2018_09_17_110233_create_subjects_table', 3),
(9, '2018_09_17_111346_create_subject_check_ins_table', 3),
(10, '2018_09_17_111356_create_students_table', 3),
(11, '2018_09_17_113939_create_check_ins_table', 3);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `list_items`
--
ALTER TABLE `list_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `list_of_dates`
--
ALTER TABLE `list_of_dates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
