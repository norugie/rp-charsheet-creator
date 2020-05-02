-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 08:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rp_charsheet_creator`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(10) UNSIGNED NOT NULL,
  `apparent_age` int(10) UNSIGNED NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexuality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chardesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `slug`, `char_name`, `age`, `apparent_age`, `gender`, `sexuality`, `chardesc`, `info`, `cover_img`, `author_id`, `published_at`, `created_at`, `updated_at`) VALUES
(4, '1308-isolde-wolfe', 'Isolde Wolfe', 28, 28, 'Female', 'Bisexual', 'Ordinary swordswoman with a holy sword!', 'Ordinary swordswoman with a holy sword!', 'isolde-wolfe-1.png', 2, '2020-04-10 20:50:40', '2020-04-10 20:50:40', NULL),
(5, '2528-aranea-brightnet', 'Aranea Brightnet', 255, 26, 'Female', 'Aromantic Lesbian', 'Owner of the The Brightnet Co., a huge textile company that specializes in the production of military-grade material.', 'Owner of the The Brightnet Co., a huge textile company that specializes in the production of military-grade material.', 'aranea-brightnet-1.jpg', 1, '2020-04-10 20:50:40', '2020-04-10 20:50:40', NULL),
(6, '0926-alex-lau', 'Alexandria Lau', 30, 30, 'Female', 'Aromantic Bisexual', 'Former mercenary and the current head of security for the Brightner Manor.', 'Former mercenary and the current head of security for the Brightner Manor.', 'alex-lau-1.jpg', 1, '2020-04-10 23:28:56', '2020-04-10 23:28:56', NULL),
(7, '4357-erhaes-venn', 'Er\'haes Venn', 24, 24, 'Female', 'Pansexual', 'Whimsical potion merchant who travels around in search of new knowledge while in pursuit of pleasure.', 'Whimsical potion merchant who travels around in search of new knowledge while in pursuit of pleasure.', 'venn-1.jpg', 2, '2020-04-11 08:28:23', '2020-04-11 08:28:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `char_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `char_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `char_filename`, `char_id`, `created_at`, `updated_at`) VALUES
(1, 'isolde-wolfe-1.png', 4, '2020-04-11 07:16:46', NULL),
(2, 'isolde-wolfe-2.png', 4, '2020-04-11 07:16:46', NULL),
(3, 'alex-lau-1.jpg', 6, '2020-04-11 07:16:46', NULL),
(4, 'aranea-brightnet-1.jpg', 5, '2020-04-11 07:16:46', NULL),
(5, 'venn-1.jpg', 7, '2020-04-11 08:31:20', NULL),
(6, 'venn-2.jpg', 7, '2020-04-11 08:31:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_04_06_041013_create_characters_table', 1),
(4, '2020_04_11_011457_create_char_images_table', 2),
(5, '2020_04_11_070935_create_images_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anonymous User', 'anonuser', '24ea80fc556be6b5c94108faafe8068b74329738d65aa6a5473b1e1b507ea42d', NULL, '2020-04-10 20:48:11', NULL),
(2, 'Venn', 'norugie', '24ea80fc556be6b5c94108faafe8068b74329738d65aa6a5473b1e1b507ea42d', NULL, '2020-04-10 20:48:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `characters_slug_unique` (`slug`),
  ADD KEY `characters_author_id_index` (`author_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_char_id_index` (`char_id`);

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
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `characters`
--
ALTER TABLE `characters`
  ADD CONSTRAINT `characters_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_char_id_foreign` FOREIGN KEY (`char_id`) REFERENCES `characters` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
