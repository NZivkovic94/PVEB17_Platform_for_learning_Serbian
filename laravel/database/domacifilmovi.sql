-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2017 at 03:05 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmovi`
--

-- --------------------------------------------------------

--
-- Table structure for table `domacifilmovi`
--

CREATE TABLE `domacifilmovi` (
  `id` int(10) UNSIGNED NOT NULL,
  `ime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brNagrada` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `domacifilmovi`
--

INSERT INTO `domacifilmovi` (`id`, `ime`, `brNagrada`, `created_at`, `updated_at`) VALUES
(1, 'Mars na Drinu', 1, '2017-12-16 16:26:55', '2017-12-16 16:26:55'),
(2, 'Uzicka republika', 2, '2017-12-16 16:29:02', '2017-12-16 16:29:02'),
(3, 'Beogradski fantom', 3, '2017-12-16 16:50:15', '2017-12-16 16:50:15'),
(4, 'Hajde da se volimo 3', 4, '2017-12-16 16:50:31', '2017-12-16 19:27:07'),
(5, 'dsda', 2, '2017-12-16 16:51:41', '2017-12-16 16:51:41'),
(6, 'dsda', 2, '2017-12-16 16:52:01', '2017-12-16 16:52:01'),
(7, 'kako je propao vucic', 3, '2017-12-16 16:52:17', '2017-12-16 16:52:17'),
(8, 'Maratonci', 4, '2017-12-16 18:23:40', '2017-12-16 18:23:40'),
(9, 'nestoPonesto', NULL, '2017-12-16 18:44:34', '2017-12-16 18:44:34'),
(10, 'svastakvas', NULL, '2017-12-16 18:46:01', '2017-12-16 18:46:01'),
(11, 'Novi film', 4, '2017-12-16 19:02:49', '2017-12-16 19:02:49'),
(12, 'Novi film', 4, '2017-12-16 19:08:37', '2017-12-16 19:08:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `domacifilmovi`
--
ALTER TABLE `domacifilmovi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `domacifilmovi`
--
ALTER TABLE `domacifilmovi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
