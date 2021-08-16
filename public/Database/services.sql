-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 16, 2021 at 11:39 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(10) UNSIGNED DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_employee_id_index` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `Name`, `employee_id`, `Status`, `created_at`, `updated_at`) VALUES
(1, 'اختر الخدمة التي تريدها', NULL, 1, NULL, NULL),
(2, 'كشف عام', NULL, 1, NULL, NULL),
(3, 'تقويم اسنان', NULL, 1, NULL, NULL),
(4, 'ازالة جير', NULL, 1, NULL, NULL),
(5, 'خلع أسنان', NULL, 1, NULL, NULL),
(6, 'خلع ضرس عقل جراحي', NULL, 1, NULL, NULL),
(7, 'علاج جذور الاسنان', NULL, 1, NULL, NULL),
(8, 'تركيب اسنان', NULL, 1, NULL, NULL),
(9, 'علاج اسنان اطفال', NULL, 1, NULL, NULL),
(10, 'ابتسامة هوليود', NULL, 1, NULL, NULL),
(11, 'زراعة اسنان', NULL, 1, NULL, NULL),
(12, 'تبييض اسنان', NULL, 1, NULL, NULL),
(13, 'أخرى', NULL, 1, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
