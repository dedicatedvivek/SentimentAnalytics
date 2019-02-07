-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2019 at 02:44 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `analyticsproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `keywords_master`
--

CREATE TABLE `keywords_master` (
  `keyword_id` int(11) NOT NULL,
  `keyword_name` varchar(200) NOT NULL,
  `language` varchar(50) NOT NULL,
  `fo_lang_id` int(11) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keywords_master`
--

INSERT INTO `keywords_master` (`keyword_id`, `keyword_name`, `language`, `fo_lang_id`, `active_status`) VALUES
(1, 'sdasd', 'German', 0, 0),
(2, 'sdasd', 'Russian', 2, 0),
(3, 'sdasd', 'Spanish', 3, 0),
(4, 'Pimplescare', 'German', 0, 0),
(5, 'Pimplescare', 'Russian', 2, 0),
(6, 'Pimplescare', 'Spanish', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `languages_master`
--

CREATE TABLE `languages_master` (
  `lang_id` int(11) NOT NULL,
  `lang_code` varchar(200) NOT NULL,
  `lang_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages_master`
--

INSERT INTO `languages_master` (`lang_id`, `lang_code`, `lang_name`) VALUES
(0, 'de', 'German'),
(2, 'ru', 'Russian'),
(3, 'es', 'Spanish'),
(4, 'fr', 'French'),
(5, 'en', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vivek Iyer', 'vivekiyer98@gmail.com', NULL, '$2y$10$uRveV8ZZB/nxmhd3fdYADOIfj4ayHm3ru5N52c6oA5so7JhMfrBYq', 'JEp4ePZpaAWZ4iiObWusNbmPUGY5DU95JM7E0nbmCUK1e5vKNFF7BbcovP8J', '2019-02-05 06:04:27', '2019-02-05 06:04:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keywords_master`
--
ALTER TABLE `keywords_master`
  ADD PRIMARY KEY (`keyword_id`),
  ADD KEY `fo_lang_id` (`fo_lang_id`);

--
-- Indexes for table `languages_master`
--
ALTER TABLE `languages_master`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT for table `keywords_master`
--
ALTER TABLE `keywords_master`
  MODIFY `keyword_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `languages_master`
--
ALTER TABLE `languages_master`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keywords_master`
--
ALTER TABLE `keywords_master`
  ADD CONSTRAINT `keywords_master_ibfk_1` FOREIGN KEY (`fo_lang_id`) REFERENCES `languages_master` (`lang_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
