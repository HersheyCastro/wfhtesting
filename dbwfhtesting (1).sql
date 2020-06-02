-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 04:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwfhtesting`
--

-- --------------------------------------------------------

--
-- Table structure for table `division55`
--

CREATE TABLE `division55` (
  `id` int(10) UNSIGNED NOT NULL,
  `division_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `division55`
--

INSERT INTO `division55` (`id`, `division_name`, `color`, `created_by`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PCMD', NULL, 1, 1, '2020-03-27 00:26:46', '2020-03-27 00:26:46', NULL),
(2, 'FAD', NULL, 1, 1, '2020-03-27 00:27:04', '2020-03-27 00:27:04', NULL),
(3, 'ETDD', NULL, 1, 1, '2020-03-27 00:27:24', '2020-03-27 00:27:24', NULL),
(4, 'EUSTDD', NULL, 1, 1, '2020-03-27 00:27:41', '2020-03-27 00:27:41', NULL),
(5, 'ITDD', NULL, 1, 1, '2020-03-28 19:36:22', '2020-03-28 19:36:22', NULL),
(6, 'RITTD', NULL, 1, 1, '2020-03-28 19:36:55', '2020-03-28 19:36:55', NULL),
(7, 'HRIDD', NULL, 1, 1, '2020-03-28 19:37:06', '2020-03-28 19:37:06', NULL),
(8, 'IG', NULL, 1, 1, '2020-03-28 19:37:34', '2020-03-28 19:37:34', NULL),
(9, 'OED/ODED', NULL, 1, 1, '2020-03-28 19:37:58', '2020-03-28 19:37:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisionindicators55`
--

CREATE TABLE `divisionindicators55` (
  `id` int(10) UNSIGNED NOT NULL,
  `successindicators55_id` int(11) NOT NULL,
  `division55_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisionindicators55`
--

INSERT INTO `divisionindicators55` (`id`, `successindicators55_id`, `division55_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2020-03-27 00:28:06', '2020-03-27 00:28:06', NULL),
(2, 2, 1, '2020-03-27 00:28:22', '2020-03-27 00:28:22', NULL),
(3, 3, 1, '2020-03-27 00:28:36', '2020-03-27 00:28:36', NULL),
(4, 5, 1, '2020-03-28 20:38:26', '2020-03-28 20:38:26', NULL),
(5, 4, 2, '2020-03-28 20:39:02', '2020-03-28 20:39:02', NULL),
(6, 1, 3, '2020-03-28 20:41:11', '2020-03-28 20:41:11', NULL),
(7, 2, 3, '2020-03-28 20:41:22', '2020-03-28 20:41:22', NULL),
(8, 3, 3, '2020-03-28 20:41:35', '2020-03-28 20:41:35', NULL),
(9, 51, 1, '2020-04-01 05:03:27', '2020-04-01 05:03:27', NULL),
(10, 52, 1, '2020-04-01 05:04:24', '2020-04-01 05:04:24', NULL),
(11, 48, 1, '2020-04-01 05:05:02', '2020-04-01 05:05:02', NULL),
(12, 50, 1, '2020-04-01 05:05:23', '2020-04-01 05:05:23', NULL),
(13, 22, 2, '2020-04-03 00:08:53', '2020-04-03 00:08:53', NULL),
(14, 23, 2, '2020-04-03 00:09:32', '2020-04-03 00:09:32', NULL),
(15, 24, 2, '2020-04-03 00:09:51', '2020-04-03 00:09:51', NULL),
(16, 25, 2, '2020-04-03 00:10:17', '2020-04-03 00:10:17', NULL),
(17, 4, 9, '2020-04-03 00:45:03', '2020-04-03 00:45:03', NULL),
(18, 3, 9, '2020-04-03 00:45:56', '2020-04-03 00:45:56', NULL),
(19, 1, 9, '2020-04-03 00:46:34', '2020-04-03 00:46:34', NULL),
(20, 57, 1, '2020-04-20 02:49:58', '2020-04-20 02:49:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `files55`
--

CREATE TABLE `files55` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tasks55_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files55`
--

INSERT INTO `files55` (`id`, `filename`, `description`, `link`, `file`, `tasks55_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Cover_Sheet_Download (1)', NULL, 'Cover_Sheet_Download (1)_1585732297.pdf', NULL, 46, '2020-04-01 09:11:37', '2020-04-01 09:11:37', NULL),
(7, 'posting 13 - FAD SRAnalyst -', NULL, 'posting 13 - FAD SRAnalyst -_1586143346.pdf', NULL, 91, '2020-04-06 03:22:26', '2020-04-06 03:22:26', NULL),
(8, 'Cover_Sheet_Download (1)', NULL, 'Cover_Sheet_Download (1)_1586154903.pdf', NULL, 91, '2020-04-06 06:35:03', '2020-04-06 06:35:03', NULL),
(9, 'SRSI - RITTD', NULL, 'SRSI - RITTD_1586155068.pdf', NULL, 52, '2020-04-06 06:37:48', '2020-04-06 06:37:48', NULL),
(10, 'Food Safety Brief (FIL)', NULL, 'Food Safety Brief (FIL)_1586155203.pdf', NULL, 54, '2020-04-06 06:40:03', '2020-04-06 06:40:03', NULL),
(11, 'BYLAWS_RELIGIOUS', NULL, 'BYLAWS_RELIGIOUS_1586155891.pdf', NULL, 51, '2020-04-06 06:51:31', '2020-04-06 06:51:31', NULL),
(12, 'Food Safety Brief (FIL)', NULL, 'Food Safety Brief (FIL)_1586203372.pdf', NULL, 101, '2020-04-06 20:02:52', '2020-04-06 20:02:52', NULL),
(13, 'SRSII  - PCMD (JO)', NULL, 'SRSII  - PCMD (JO)_1586245582.pdf', NULL, 28, '2020-04-07 07:46:22', '2020-04-07 07:46:22', NULL),
(14, 'PSI - FAD', NULL, 'PSI - FAD_1586245835.pdf', NULL, 135, '2020-04-07 07:50:35', '2020-04-07 07:50:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ipcr55`
--

CREATE TABLE `ipcr55` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipcr_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `status55_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `active` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `origid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ipcr55`
--

INSERT INTO `ipcr55` (`id`, `ipcr_name`, `semester`, `year`, `status55_id`, `created_by`, `active`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `origid`) VALUES
(87, 'Castro-2020-1stsem', 1, 2020, 2, NULL, '1', '2020-04-14 18:07:53', '2020-04-15 07:47:32', NULL, 1, NULL),
(92, 'Castro-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-15 07:49:44', '2020-04-15 08:02:38', '2020-04-15 08:02:38', 1, '87'),
(93, 'Castro-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-15 08:21:30', '2020-04-15 08:23:39', '2020-04-15 08:23:39', 1, '87'),
(94, 'PCMD-Targets', 2, 2020, 5, NULL, '1', '2020-04-15 08:51:06', '2020-04-28 00:10:09', '2020-04-28 00:10:09', 4, NULL),
(95, 'IPCR_2019', 2, 2020, 1, NULL, '1', '2020-04-16 07:55:08', '2020-04-16 08:23:20', '2020-04-16 08:23:20', 17, NULL),
(96, 'Lobo_IPCR', 1, 2020, 4, NULL, '1', '2020-04-16 08:26:43', '2020-04-16 08:51:54', '2020-04-16 08:51:54', 17, NULL),
(97, 'IPCR_2020', 1, 2020, 5, NULL, '1', '2020-04-16 08:39:42', '2020-04-16 09:09:12', '2020-04-16 09:09:12', 17, NULL),
(98, 'DELA_CRUZ_IPCR', 1, 2020, 2, NULL, '1', '2020-04-16 09:35:58', '2020-04-20 01:14:13', '2020-04-20 01:14:13', 17, NULL),
(99, 'DELA_CRUZ_IPCR', 2, 2019, 5, NULL, '1', '2020-04-16 09:39:01', '2020-04-20 01:14:16', '2020-04-20 01:14:16', 17, NULL),
(100, 'DELA_CRUZ_IPCR', 1, 2019, 5, NULL, '1', '2020-04-16 09:42:09', '2020-04-16 11:26:20', '2020-04-16 11:26:20', 17, NULL),
(101, 'DELA_CRUZ', 2, 2020, 5, NULL, NULL, '2020-04-16 09:46:47', '2020-04-16 11:31:34', '2020-04-16 11:31:34', 17, NULL),
(102, 'Lobo-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-17 02:41:27', '2020-04-20 01:14:22', '2020-04-20 01:14:22', 17, '98'),
(103, 'LOBO', 1, 2020, 2, NULL, '1', '2020-04-17 02:50:16', '2020-04-20 01:14:26', '2020-04-20 01:14:26', 17, NULL),
(104, 'LOBO_2020_1stSem', 1, 2020, 2, NULL, '1', '2020-04-17 06:43:21', '2020-04-20 01:14:30', '2020-04-20 01:14:30', 17, NULL),
(105, 'Lobo-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-19 23:39:29', '2020-04-19 23:49:01', '2020-04-19 23:49:01', 17, '104'),
(106, 'Lobo-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-20 00:11:23', '2020-04-20 01:13:21', '2020-04-20 01:13:21', 17, '104'),
(107, 'Lobo-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-20 00:12:07', '2020-04-20 01:13:30', '2020-04-20 01:13:30', 17, '104'),
(108, 'Lobo-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-20 00:14:54', '2020-04-20 01:13:36', '2020-04-20 01:13:36', 17, '104'),
(109, 'Lobo-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-20 00:17:57', '2020-04-20 01:14:03', '2020-04-20 01:14:03', 17, '104'),
(110, 'Lobo-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-20 00:24:34', '2020-04-20 01:14:08', '2020-04-20 01:14:08', 17, '104'),
(111, 'PCMD', 1, 2020, 5, NULL, '1', '2020-04-20 00:30:38', '2020-04-20 09:13:34', '2020-04-20 09:13:34', 4, NULL),
(112, 'BATHAN', 1, 2020, 5, NULL, '1', '2020-04-20 01:09:07', '2020-04-20 01:09:07', NULL, 5, NULL),
(113, 'LOBO', 1, 2020, 2, NULL, '1', '2020-04-20 01:15:56', '2020-04-20 02:32:14', NULL, 17, NULL),
(114, 'CastroM', 1, 2020, 4, NULL, '1', '2020-04-20 02:35:45', '2020-04-20 02:36:56', NULL, 1, NULL),
(115, 'Lobo-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-20 03:20:51', '2020-04-20 04:33:31', '2020-04-20 04:33:31', 17, '113'),
(116, 'Lobo-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-20 03:47:02', '2020-04-20 04:33:37', '2020-04-20 04:33:37', 17, '113'),
(117, 'Lobo-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-20 03:53:35', '2020-04-20 04:35:00', '2020-04-20 04:35:00', 17, '113'),
(118, 'Lobo-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-20 03:57:51', '2020-04-20 04:35:06', '2020-04-20 04:35:06', 17, '113'),
(119, 'Lobo-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-20 05:01:38', '2020-04-20 05:02:08', '2020-04-20 05:02:08', 17, '113'),
(120, 'Lobo-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-20 05:07:07', '2020-04-20 05:07:07', NULL, 17, '113'),
(121, 'ALMAZAR', 1, 2020, 2, NULL, '1', '2020-04-20 06:22:11', '2020-04-20 08:40:06', NULL, 19, NULL),
(122, 'Almazar-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-20 08:43:13', '2020-04-20 08:49:19', '2020-04-20 08:49:19', 19, '121'),
(123, 'Lobo-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-20 08:59:39', '2020-04-20 08:59:39', NULL, 17, '113'),
(124, 'HAGAD', 1, 2020, 2, NULL, '1', '2020-04-20 09:09:34', '2020-04-20 09:21:39', NULL, 32, NULL),
(125, 'PCMD', 1, 2020, 6, NULL, '1', '2020-04-20 09:13:48', '2020-04-20 09:14:08', NULL, 4, NULL),
(126, 'Hagad-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-20 09:23:30', '2020-04-20 09:29:10', '2020-04-20 09:29:10', 32, '124'),
(127, 'Hagad-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-20 09:30:51', '2020-04-20 09:39:26', '2020-04-20 09:39:26', 32, '124'),
(128, 'Hagad-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-20 09:36:34', '2020-04-20 09:39:31', '2020-04-20 09:39:31', 32, '124'),
(129, 'Hagad-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-20 09:45:59', '2020-04-20 09:45:59', NULL, 32, '124'),
(130, 'Almazar-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-23 08:21:31', '2020-04-23 09:26:35', '2020-04-23 09:26:35', 19, '121'),
(131, 'Almazar-additionalAccomplishment', NULL, NULL, 4, NULL, '1', '2020-04-23 09:05:13', '2020-04-23 09:31:17', '2020-04-23 09:31:17', 19, '121'),
(132, 'Almazar-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-23 09:56:36', '2020-04-23 10:49:26', '2020-04-23 10:49:26', 19, '121'),
(133, 'Almazar-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-23 10:39:43', '2020-04-23 10:49:30', '2020-04-23 10:49:30', 19, '121'),
(134, 'Almazar-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-23 10:52:31', '2020-04-23 11:48:02', '2020-04-23 11:48:02', 19, '121'),
(135, 'Almazar-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-23 11:57:55', '2020-04-24 01:02:42', '2020-04-24 01:02:42', 19, '121'),
(136, 'Almazar-additionalAccomplishment', NULL, NULL, 2, NULL, '1', '2020-04-24 01:10:12', '2020-04-24 01:19:05', '2020-04-24 01:19:05', 19, '121'),
(137, 'IPCR_PCMD', 1, 2020, 6, NULL, '1', '2020-04-28 00:09:21', '2020-04-28 00:10:01', NULL, 4, NULL),
(138, 'PCMD_IPCR1', 1, 2020, 5, NULL, '1', '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ipcr_users`
--

CREATE TABLE `ipcr_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ipcr_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_10_10_000000_create_roles_table', 1),
(4, '2015_10_10_000000_update_users_table', 1),
(5, '2018_09_03_143426_create_permissions55_table', 1),
(6, '2018_09_03_144142_create_modules55_table', 1),
(7, '2018_09_03_144142_update_modules55_table', 1),
(8, '2018_09_03_144644_create_roles55_table', 1),
(9, '2018_09_03_144644_update_roles55_table', 1),
(10, '2020_03_27_034700_create_users55_table', 1),
(11, '2020_03_27_035357_create_division55_table', 1),
(12, '2020_03_27_040244_create_status55_table', 1),
(13, '2020_03_27_051754_create_strategicobjectives55_table', 1),
(14, '2020_03_27_054858_create_successindicators55_table', 1),
(15, '2020_03_27_055446_create_divisionindicators55_table', 1),
(16, '2020_03_27_064621_create_ipcr55_table', 1),
(17, '2020_03_27_071656_create_targets55_table', 1),
(18, '2020_03_27_073014_create_tasks55_table', 1),
(19, '2020_03_27_073248_create_tasksusers55_table', 1),
(20, '2020_03_27_084218_create_files55_table', 1),
(21, '2020_03_31_185026_create_table_ipcr_users', 2),
(22, '2020_03_31_192409_add_user_id_to_ipcr55', 3),
(23, '2020_04_05_191253_add_actualdate_s_to_tasks55', 4),
(24, '2020_04_05_191931_add_actualdate_e_to_tasks55', 4),
(25, '2020_04_05_191949_add_actual_verification_to_tasks55', 4),
(26, '2020_04_07_005917_add_status_id_to_tasks55', 5),
(27, '2020_04_07_042011_add_evaluationofdivisionhead_to_tasks55', 6),
(28, '2020_04_07_222657_add_senior_accomplishmentremarks_to_tasks55', 7),
(29, '2020_04_08_032050_add_origid_to_ipcr55', 8),
(30, '2020_04_14_135518_add_origid_to_targets55', 9),
(31, '2020_05_31_224357_add_efficiency_to_targets55', 10);

-- --------------------------------------------------------

--
-- Table structure for table `modules55`
--

CREATE TABLE `modules55` (
  `id` int(10) UNSIGNED NOT NULL,
  `sModuleName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sModuleCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sTable` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules55`
--

INSERT INTO `modules55` (`id`, `sModuleName`, `sModuleCode`, `sTable`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Modules', 'modules55', 'modules55', '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(2, 'Permissions', 'permissions55', 'permissions55', '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(3, 'Roles', 'roles55', 'roles55', '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(4, 'Users', 'users55', 'users55', '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(5, 'Settings Menu', 'settings255', 'settings255', '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(6, 'Dashboard', 'dashboard55', 'dashboard55', '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(7, 'Division', 'division55', 'division55', '2020-03-26 19:53:57', '2020-03-26 19:53:57', NULL),
(8, 'Status', 'status55', 'status55', '2020-03-26 20:02:44', '2020-03-26 20:02:44', NULL),
(9, 'strategic_objectives', 'strategicobjectives55', 'strategicobjectives55', '2020-03-26 21:12:20', '2020-03-26 21:12:20', NULL),
(10, 'Strategic Objectives', 'strategicobjectives155', 'strategicobjectives155', '2020-03-26 21:14:17', '2020-03-26 21:14:17', NULL),
(11, 'Strategic Objectives', 'strategicobjectives55', 'strategicobjectives55', '2020-03-26 21:17:54', '2020-03-26 21:17:54', NULL),
(12, 'Success Indicators', 'successindicators55', 'successindicators55', '2020-03-26 21:42:39', '2020-03-26 21:42:39', NULL),
(13, 'Success Indicators', 'successindicators55', 'successindicators55', '2020-03-26 21:48:58', '2020-03-26 21:48:58', NULL),
(14, 'Division Indicators', 'divisionindicators55', 'divisionindicators55', '2020-03-26 21:54:46', '2020-03-26 21:54:46', NULL),
(15, 'IPCR', 'ipcr55', 'ipcr55', '2020-03-26 22:46:21', '2020-03-26 22:46:21', NULL),
(16, 'Targets', 'targets55', 'targets55', '2020-03-26 23:03:05', '2020-03-26 23:03:05', NULL),
(17, 'target1', 'target155', 'target155', '2020-03-26 23:13:41', '2020-03-26 23:13:41', NULL),
(18, 'Targets', 'targets55', 'targets55', '2020-03-26 23:16:56', '2020-03-26 23:16:56', NULL),
(19, 'Tasks', 'tasks55', 'tasks55', '2020-03-26 23:30:14', '2020-03-26 23:30:14', NULL),
(20, 'Tasks Users', 'tasksusers55', 'tasksusers55', '2020-03-26 23:32:48', '2020-03-26 23:32:48', NULL),
(21, 'Files', 'files55', 'files55', '2020-03-27 00:10:50', '2020-03-27 00:10:50', NULL),
(22, 'files1', 'files155', 'files155', '2020-03-27 00:38:11', '2020-03-27 00:38:11', NULL),
(23, 'Files', 'files55', 'files55', '2020-03-27 00:42:18', '2020-03-27 00:42:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `modules55_permissions55`
--

CREATE TABLE `modules55_permissions55` (
  `modules55_id` int(10) UNSIGNED NOT NULL,
  `permissions55_id` int(10) UNSIGNED NOT NULL,
  `iBitIndex` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules55_permissions55`
--

INSERT INTO `modules55_permissions55` (`modules55_id`, `permissions55_id`, `iBitIndex`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(1, 2, 1, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(1, 3, 2, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(1, 4, 3, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(1, 5, 4, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(1, 6, 5, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(1, 7, 6, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(2, 1, 0, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(2, 2, 1, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(2, 3, 2, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(2, 4, 3, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(2, 5, 4, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(2, 6, 5, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(2, 7, 6, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(3, 1, 0, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(3, 2, 1, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(3, 3, 2, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(3, 4, 3, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(3, 5, 4, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(3, 6, 5, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(3, 7, 6, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(4, 1, 0, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(4, 2, 1, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(4, 3, 2, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(4, 4, 3, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(4, 5, 4, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(4, 6, 5, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(4, 7, 6, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(5, 1, 0, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(6, 1, 0, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(6, 2, 1, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(6, 3, 2, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(6, 4, 3, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(6, 5, 4, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(6, 6, 5, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(6, 7, 6, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(7, 1, 0, '2020-03-26 19:53:57', '2020-03-26 19:53:57', NULL),
(7, 2, 1, '2020-03-26 19:53:57', '2020-03-26 19:53:57', NULL),
(7, 3, 2, '2020-03-26 19:53:57', '2020-03-26 19:53:57', NULL),
(7, 4, 3, '2020-03-26 19:53:57', '2020-03-26 19:53:57', NULL),
(7, 5, 4, '2020-03-26 19:53:57', '2020-03-26 19:53:57', NULL),
(7, 6, 5, '2020-03-26 19:53:57', '2020-03-26 19:53:57', NULL),
(7, 7, 6, '2020-03-26 19:53:57', '2020-03-26 19:53:57', NULL),
(8, 1, 0, '2020-03-26 20:02:44', '2020-03-26 20:02:44', NULL),
(8, 2, 1, '2020-03-26 20:02:44', '2020-03-26 20:02:44', NULL),
(8, 3, 2, '2020-03-26 20:02:44', '2020-03-26 20:02:44', NULL),
(8, 4, 3, '2020-03-26 20:02:44', '2020-03-26 20:02:44', NULL),
(8, 5, 4, '2020-03-26 20:02:44', '2020-03-26 20:02:44', NULL),
(8, 6, 5, '2020-03-26 20:02:44', '2020-03-26 20:02:44', NULL),
(8, 7, 6, '2020-03-26 20:02:44', '2020-03-26 20:02:44', NULL),
(9, 1, 0, '2020-03-26 21:12:20', '2020-03-26 21:12:20', NULL),
(9, 2, 1, '2020-03-26 21:12:20', '2020-03-26 21:12:20', NULL),
(9, 3, 2, '2020-03-26 21:12:20', '2020-03-26 21:12:20', NULL),
(9, 4, 3, '2020-03-26 21:12:20', '2020-03-26 21:12:20', NULL),
(9, 5, 4, '2020-03-26 21:12:20', '2020-03-26 21:12:20', NULL),
(9, 6, 5, '2020-03-26 21:12:20', '2020-03-26 21:12:20', NULL),
(9, 7, 6, '2020-03-26 21:12:20', '2020-03-26 21:12:20', NULL),
(10, 1, 0, '2020-03-26 21:14:17', '2020-03-26 21:14:17', NULL),
(10, 2, 1, '2020-03-26 21:14:17', '2020-03-26 21:14:17', NULL),
(10, 3, 2, '2020-03-26 21:14:17', '2020-03-26 21:14:17', NULL),
(10, 4, 3, '2020-03-26 21:14:17', '2020-03-26 21:14:17', NULL),
(10, 5, 4, '2020-03-26 21:14:17', '2020-03-26 21:14:17', NULL),
(10, 6, 5, '2020-03-26 21:14:17', '2020-03-26 21:14:17', NULL),
(10, 7, 6, '2020-03-26 21:14:17', '2020-03-26 21:14:17', NULL),
(11, 1, 0, '2020-03-26 21:17:54', '2020-03-26 21:17:54', NULL),
(11, 2, 1, '2020-03-26 21:17:54', '2020-03-26 21:17:54', NULL),
(11, 3, 2, '2020-03-26 21:17:54', '2020-03-26 21:17:54', NULL),
(11, 4, 3, '2020-03-26 21:17:54', '2020-03-26 21:17:54', NULL),
(11, 5, 4, '2020-03-26 21:17:54', '2020-03-26 21:17:54', NULL),
(11, 6, 5, '2020-03-26 21:17:54', '2020-03-26 21:17:54', NULL),
(11, 7, 6, '2020-03-26 21:17:54', '2020-03-26 21:17:54', NULL),
(12, 1, 0, '2020-03-26 21:42:39', '2020-03-26 21:42:39', NULL),
(12, 2, 1, '2020-03-26 21:42:39', '2020-03-26 21:42:39', NULL),
(12, 3, 2, '2020-03-26 21:42:39', '2020-03-26 21:42:39', NULL),
(12, 4, 3, '2020-03-26 21:42:39', '2020-03-26 21:42:39', NULL),
(12, 5, 4, '2020-03-26 21:42:39', '2020-03-26 21:42:39', NULL),
(12, 6, 5, '2020-03-26 21:42:39', '2020-03-26 21:42:39', NULL),
(12, 7, 6, '2020-03-26 21:42:39', '2020-03-26 21:42:39', NULL),
(13, 1, 0, '2020-03-26 21:48:58', '2020-03-26 21:48:58', NULL),
(13, 2, 1, '2020-03-26 21:48:58', '2020-03-26 21:48:58', NULL),
(13, 3, 2, '2020-03-26 21:48:58', '2020-03-26 21:48:58', NULL),
(13, 4, 3, '2020-03-26 21:48:58', '2020-03-26 21:48:58', NULL),
(13, 5, 4, '2020-03-26 21:48:58', '2020-03-26 21:48:58', NULL),
(13, 6, 5, '2020-03-26 21:48:58', '2020-03-26 21:48:58', NULL),
(13, 7, 6, '2020-03-26 21:48:58', '2020-03-26 21:48:58', NULL),
(14, 1, 0, '2020-03-26 21:54:46', '2020-03-26 21:54:46', NULL),
(14, 2, 1, '2020-03-26 21:54:46', '2020-03-26 21:54:46', NULL),
(14, 3, 2, '2020-03-26 21:54:46', '2020-03-26 21:54:46', NULL),
(14, 4, 3, '2020-03-26 21:54:46', '2020-03-26 21:54:46', NULL),
(14, 5, 4, '2020-03-26 21:54:46', '2020-03-26 21:54:46', NULL),
(14, 6, 5, '2020-03-26 21:54:46', '2020-03-26 21:54:46', NULL),
(14, 7, 6, '2020-03-26 21:54:46', '2020-03-26 21:54:46', NULL),
(15, 1, 0, '2020-03-26 22:46:21', '2020-03-26 22:46:21', NULL),
(15, 2, 1, '2020-03-26 22:46:21', '2020-03-26 22:46:21', NULL),
(15, 3, 2, '2020-03-26 22:46:21', '2020-03-26 22:46:21', NULL),
(15, 4, 3, '2020-03-26 22:46:21', '2020-03-26 22:46:21', NULL),
(15, 5, 4, '2020-03-26 22:46:21', '2020-03-26 22:46:21', NULL),
(15, 6, 5, '2020-03-26 22:46:21', '2020-03-26 22:46:21', NULL),
(15, 7, 6, '2020-03-26 22:46:21', '2020-03-26 22:46:21', NULL),
(16, 1, 0, '2020-03-26 23:03:05', '2020-03-26 23:03:05', NULL),
(16, 2, 1, '2020-03-26 23:03:05', '2020-03-26 23:03:05', NULL),
(16, 3, 2, '2020-03-26 23:03:05', '2020-03-26 23:03:05', NULL),
(16, 4, 3, '2020-03-26 23:03:05', '2020-03-26 23:03:05', NULL),
(16, 5, 4, '2020-03-26 23:03:05', '2020-03-26 23:03:05', NULL),
(16, 6, 5, '2020-03-26 23:03:05', '2020-03-26 23:03:05', NULL),
(16, 7, 6, '2020-03-26 23:03:05', '2020-03-26 23:03:05', NULL),
(17, 1, 0, '2020-03-26 23:13:41', '2020-03-26 23:13:41', NULL),
(17, 2, 1, '2020-03-26 23:13:41', '2020-03-26 23:13:41', NULL),
(17, 3, 2, '2020-03-26 23:13:41', '2020-03-26 23:13:41', NULL),
(17, 4, 3, '2020-03-26 23:13:41', '2020-03-26 23:13:41', NULL),
(17, 5, 4, '2020-03-26 23:13:41', '2020-03-26 23:13:41', NULL),
(17, 6, 5, '2020-03-26 23:13:41', '2020-03-26 23:13:41', NULL),
(17, 7, 6, '2020-03-26 23:13:41', '2020-03-26 23:13:41', NULL),
(18, 1, 0, '2020-03-26 23:16:56', '2020-03-26 23:16:56', NULL),
(18, 2, 1, '2020-03-26 23:16:56', '2020-03-26 23:16:56', NULL),
(18, 3, 2, '2020-03-26 23:16:56', '2020-03-26 23:16:56', NULL),
(18, 4, 3, '2020-03-26 23:16:56', '2020-03-26 23:16:56', NULL),
(18, 5, 4, '2020-03-26 23:16:56', '2020-03-26 23:16:56', NULL),
(18, 6, 5, '2020-03-26 23:16:56', '2020-03-26 23:16:56', NULL),
(18, 7, 6, '2020-03-26 23:16:56', '2020-03-26 23:16:56', NULL),
(19, 1, 0, '2020-03-26 23:30:14', '2020-03-26 23:30:14', NULL),
(19, 2, 1, '2020-03-26 23:30:14', '2020-03-26 23:30:14', NULL),
(19, 3, 2, '2020-03-26 23:30:14', '2020-03-26 23:30:14', NULL),
(19, 4, 3, '2020-03-26 23:30:14', '2020-03-26 23:30:14', NULL),
(19, 5, 4, '2020-03-26 23:30:14', '2020-03-26 23:30:14', NULL),
(19, 6, 5, '2020-03-26 23:30:14', '2020-03-26 23:30:14', NULL),
(19, 7, 6, '2020-03-26 23:30:14', '2020-03-26 23:30:14', NULL),
(20, 1, 0, '2020-03-26 23:32:48', '2020-03-26 23:32:48', NULL),
(20, 2, 1, '2020-03-26 23:32:48', '2020-03-26 23:32:48', NULL),
(20, 3, 2, '2020-03-26 23:32:48', '2020-03-26 23:32:48', NULL),
(20, 4, 3, '2020-03-26 23:32:48', '2020-03-26 23:32:48', NULL),
(20, 5, 4, '2020-03-26 23:32:48', '2020-03-26 23:32:48', NULL),
(20, 6, 5, '2020-03-26 23:32:48', '2020-03-26 23:32:48', NULL),
(20, 7, 6, '2020-03-26 23:32:48', '2020-03-26 23:32:48', NULL),
(21, 1, 0, '2020-03-27 00:10:50', '2020-03-27 00:10:50', NULL),
(21, 2, 1, '2020-03-27 00:10:50', '2020-03-27 00:10:50', NULL),
(21, 3, 2, '2020-03-27 00:10:50', '2020-03-27 00:10:50', NULL),
(21, 4, 3, '2020-03-27 00:10:50', '2020-03-27 00:10:50', NULL),
(21, 5, 4, '2020-03-27 00:10:50', '2020-03-27 00:10:50', NULL),
(21, 6, 5, '2020-03-27 00:10:50', '2020-03-27 00:10:50', NULL),
(21, 7, 6, '2020-03-27 00:10:50', '2020-03-27 00:10:50', NULL),
(22, 1, 0, '2020-03-27 00:38:11', '2020-03-27 00:38:11', NULL),
(22, 2, 1, '2020-03-27 00:38:11', '2020-03-27 00:38:11', NULL),
(22, 3, 2, '2020-03-27 00:38:11', '2020-03-27 00:38:11', NULL),
(22, 4, 3, '2020-03-27 00:38:11', '2020-03-27 00:38:11', NULL),
(22, 5, 4, '2020-03-27 00:38:11', '2020-03-27 00:38:11', NULL),
(22, 6, 5, '2020-03-27 00:38:11', '2020-03-27 00:38:11', NULL),
(22, 7, 6, '2020-03-27 00:38:11', '2020-03-27 00:38:11', NULL),
(23, 1, 0, '2020-03-27 00:42:18', '2020-03-27 00:42:18', NULL),
(23, 2, 1, '2020-03-27 00:42:18', '2020-03-27 00:42:18', NULL),
(23, 3, 2, '2020-03-27 00:42:18', '2020-03-27 00:42:18', NULL),
(23, 4, 3, '2020-03-27 00:42:18', '2020-03-27 00:42:18', NULL),
(23, 5, 4, '2020-03-27 00:42:18', '2020-03-27 00:42:18', NULL),
(23, 6, 5, '2020-03-27 00:42:18', '2020-03-27 00:42:18', NULL),
(23, 7, 6, '2020-03-27 00:42:18', '2020-03-27 00:42:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions55`
--

CREATE TABLE `permissions55` (
  `id` int(10) UNSIGNED NOT NULL,
  `sPermissionName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sPermissionCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions55`
--

INSERT INTO `permissions55` (`id`, `sPermissionName`, `sPermissionCode`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Access', 'access', '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(2, 'Create', 'create', '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(3, 'Edit', 'edit', '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(4, 'View', 'view', '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(5, 'Delete', 'delete', '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(6, 'Purge', 'purge', '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(7, 'Revive', 'revive', '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles55`
--

CREATE TABLE `roles55` (
  `id` int(10) UNSIGNED NOT NULL,
  `bActive` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sRoleName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles55`
--

INSERT INTO `roles55` (`id`, `bActive`, `sRoleName`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Admin', '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(2, '1', 'Ordinary User', '2020-03-26 19:47:00', '2020-04-01 04:24:03', NULL),
(3, '1', 'Standard User', '2020-03-30 20:07:48', '2020-03-30 20:07:48', NULL),
(4, '1', 'Division Chief', '2020-04-01 04:02:18', '2020-04-01 04:02:18', NULL),
(5, '1', 'Division Supervisor', '2020-04-01 04:04:55', '2020-04-01 04:04:55', NULL),
(6, '1', 'Director', '2020-04-01 04:07:43', '2020-04-01 04:07:43', NULL),
(7, '1', 'Senior Head', '2020-04-05 07:25:02', '2020-04-05 07:25:02', NULL),
(8, '1', 'Deputy', '2020-04-14 10:32:51', '2020-04-14 10:32:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles55_modules55`
--

CREATE TABLE `roles55_modules55` (
  `roles55_id` int(10) UNSIGNED NOT NULL,
  `modules55_id` int(10) UNSIGNED NOT NULL,
  `iPermission` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles55_modules55`
--

INSERT INTO `roles55_modules55` (`roles55_id`, `modules55_id`, `iPermission`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 127, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(1, 2, 127, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(1, 3, 127, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(1, 4, 127, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(2, 15, 127, '2020-03-26 19:47:00', '2020-04-01 04:24:03', NULL),
(1, 5, 1, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(1, 6, 127, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(1, 7, 127, '2020-03-26 19:53:57', '2020-03-26 19:53:57', NULL),
(1, 8, 127, '2020-03-26 20:02:44', '2020-03-26 20:02:44', NULL),
(1, 9, 127, '2020-03-26 21:12:20', '2020-03-26 21:12:20', NULL),
(1, 10, 127, '2020-03-26 21:14:17', '2020-03-26 21:14:17', NULL),
(1, 11, 127, '2020-03-26 21:17:54', '2020-03-26 21:17:54', NULL),
(1, 12, 127, '2020-03-26 21:42:39', '2020-03-26 21:42:39', NULL),
(1, 13, 127, '2020-03-26 21:48:58', '2020-03-26 21:48:58', NULL),
(1, 14, 127, '2020-03-26 21:54:46', '2020-03-26 21:54:46', NULL),
(1, 15, 127, '2020-03-26 22:46:21', '2020-03-26 22:46:21', NULL),
(1, 16, 127, '2020-03-26 23:03:05', '2020-03-26 23:03:05', NULL),
(1, 17, 127, '2020-03-26 23:13:41', '2020-03-26 23:13:41', NULL),
(1, 18, 127, '2020-03-26 23:16:56', '2020-03-26 23:16:56', NULL),
(1, 19, 127, '2020-03-26 23:30:14', '2020-03-26 23:30:14', NULL),
(1, 20, 127, '2020-03-26 23:32:48', '2020-03-26 23:32:48', NULL),
(1, 21, 127, '2020-03-27 00:10:50', '2020-03-27 00:10:50', NULL),
(1, 22, 127, '2020-03-27 00:38:11', '2020-03-27 00:38:11', NULL),
(1, 23, 127, '2020-03-27 00:42:18', '2020-03-27 00:42:18', NULL),
(2, 16, 127, '2020-03-30 19:28:27', '2020-04-01 04:24:03', NULL),
(3, 15, 127, '2020-03-30 20:07:48', '2020-04-03 00:53:46', NULL),
(4, 15, 127, '2020-04-01 04:02:19', '2020-04-03 00:53:57', NULL),
(5, 15, 127, '2020-04-01 04:04:55', '2020-04-01 04:05:23', NULL),
(5, 16, 127, '2020-04-01 04:04:55', '2020-04-01 04:05:23', NULL),
(5, 19, 127, '2020-04-01 04:04:55', '2020-04-01 04:05:23', NULL),
(5, 21, 127, '2020-04-01 04:04:55', '2020-04-01 04:05:23', NULL),
(5, 23, 127, '2020-04-01 04:04:55', '2020-04-01 04:05:23', NULL),
(5, 7, 127, '2020-04-01 04:04:55', '2020-04-01 04:05:23', NULL),
(5, 10, 127, '2020-04-01 04:04:55', '2020-04-01 04:05:23', NULL),
(5, 18, 127, '2020-04-01 04:04:55', '2020-04-01 04:05:23', NULL),
(5, 4, 127, '2020-04-01 04:04:55', '2020-04-01 04:05:23', NULL),
(5, 13, 127, '2020-04-01 04:05:23', '2020-04-01 04:05:23', NULL),
(5, 12, 127, '2020-04-01 04:05:23', '2020-04-01 04:05:23', NULL),
(5, 11, 127, '2020-04-01 04:05:23', '2020-04-01 04:05:23', NULL),
(6, 6, 127, '2020-04-01 04:07:43', '2020-04-03 00:54:12', NULL),
(6, 15, 127, '2020-04-01 04:07:43', '2020-04-03 00:54:12', NULL),
(3, 6, 127, '2020-04-02 22:17:47', '2020-04-03 00:53:46', NULL),
(4, 6, 127, '2020-04-02 22:18:08', '2020-04-03 00:53:57', NULL),
(4, 16, 127, '2020-04-02 22:22:00', '2020-04-03 00:53:57', NULL),
(3, 16, 127, '2020-04-02 22:22:18', '2020-04-03 00:53:46', NULL),
(6, 16, 127, '2020-04-02 22:22:35', '2020-04-03 00:54:12', NULL),
(3, 21, 127, '2020-04-03 00:14:32', '2020-04-03 00:53:46', NULL),
(6, 21, 127, '2020-04-03 00:14:51', '2020-04-03 00:54:12', NULL),
(4, 21, 127, '2020-04-03 00:15:11', '2020-04-03 00:53:57', NULL),
(3, 19, 127, '2020-04-03 00:53:47', '2020-04-03 00:53:47', NULL),
(4, 19, 127, '2020-04-03 00:53:57', '2020-04-03 00:53:57', NULL),
(6, 19, 127, '2020-04-03 00:54:12', '2020-04-03 00:54:12', NULL),
(7, 21, 127, '2020-04-05 07:25:02', '2020-04-05 07:25:02', NULL),
(7, 19, 127, '2020-04-05 07:25:02', '2020-04-05 07:25:02', NULL),
(7, 16, 127, '2020-04-05 07:25:02', '2020-04-05 07:25:02', NULL),
(7, 15, 127, '2020-04-05 07:25:02', '2020-04-05 07:25:02', NULL),
(7, 6, 127, '2020-04-05 07:25:02', '2020-04-05 07:25:02', NULL),
(8, 15, 127, '2020-04-14 10:32:51', '2020-04-14 10:32:51', NULL),
(8, 19, 127, '2020-04-14 10:32:51', '2020-04-14 10:32:51', NULL),
(8, 16, 127, '2020-04-14 10:32:51', '2020-04-14 10:32:51', NULL),
(8, 6, 127, '2020-04-14 10:32:51', '2020-04-14 10:32:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status55`
--

CREATE TABLE `status55` (
  `id` int(10) UNSIGNED NOT NULL,
  `status_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status55`
--

INSERT INTO `status55` (`id`, `status_name`, `description`, `color`, `created_by`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'For Approval', NULL, NULL, NULL, NULL, '2020-03-27 00:30:47', '2020-03-27 00:30:47', NULL),
(2, 'Approved', NULL, NULL, NULL, NULL, '2020-03-27 00:31:04', '2020-04-05 08:45:46', NULL),
(3, 'For Revision', NULL, NULL, NULL, NULL, '2020-03-27 00:31:18', '2020-04-05 08:45:07', NULL),
(4, 'For Verification', NULL, NULL, NULL, NULL, '2020-04-05 08:45:26', '2020-04-05 08:45:26', NULL),
(5, 'Draft', NULL, NULL, NULL, NULL, '2020-04-05 08:45:55', '2020-04-05 08:45:55', NULL),
(6, 'For Submission', 'for submission', NULL, NULL, 1, '2020-04-07 01:26:04', '2020-04-07 01:26:04', NULL),
(7, 'Completed', NULL, NULL, NULL, NULL, '2020-04-12 22:39:42', '2020-04-12 22:39:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `strategicobjectives55`
--

CREATE TABLE `strategicobjectives55` (
  `id` int(10) UNSIGNED NOT NULL,
  `strategic_objective_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `active` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `strategicobjectives55`
--

INSERT INTO `strategicobjectives55` (`id`, `strategic_objective_name`, `created_by`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Effective and Efficient Information Technology Resources (ITR) Management: Plans and Programs', NULL, '1', '2020-03-26 21:44:28', '2020-04-01 00:48:13', '2020-04-01 00:48:13'),
(2, 'Effective and Efficient Information Technology Resources (ITR) Management: Procurement and Deployment of ICT Resources', NULL, '1', '2020-03-27 00:22:05', '2020-04-01 00:55:46', '2020-04-01 00:55:46'),
(3, 'Effective and Efficient Information Technology Resources (ITR) Management: IT Projects implementation and Monitoring', NULL, '1', '2020-03-27 00:22:25', '2020-04-01 00:57:23', '2020-04-01 00:57:23'),
(4, 'Effective and Efficient Information Technology Resources (ITR) Management: Network Systems and Hardware Management', NULL, '1', '2020-03-27 00:22:58', '2020-04-01 00:58:06', NULL),
(5, 'To formulate responsive S&T Policies', NULL, '1', '2020-04-01 00:30:12', '2020-04-01 00:36:23', NULL),
(6, 'To expand linkage and collaboration with stakeholders', NULL, '1', '2020-04-01 00:32:47', '2020-04-01 00:34:28', NULL),
(7, 'To enhance M&E processes and tools', NULL, '1', '2020-04-01 00:33:14', '2020-04-01 00:35:24', NULL),
(8, 'To increase the number of utilized project outputs (6Ps)', NULL, '1', '2020-04-01 00:39:11', '2020-04-01 00:39:11', NULL),
(9, 'To increase the assisted universities and research institutions', NULL, '1', '2020-04-01 00:43:47', '2020-04-01 00:43:47', NULL),
(10, 'To increase the number of PCIEERD researchers', NULL, '1', '2020-04-01 00:44:47', '2020-04-01 00:44:47', NULL),
(11, 'To enhance the communication of PCIEERD branding', NULL, '1', '2020-04-01 00:45:46', '2020-04-01 00:45:46', NULL),
(12, 'To enhance brand awareness', NULL, '1', '2020-04-01 00:48:59', '2020-04-01 00:48:59', NULL),
(13, 'To conduct outcome and impact assessment of project outputs', NULL, '1', '2020-04-01 00:53:10', '2020-04-01 00:53:10', NULL),
(14, 'To fulfill competency requirements and capacity of PCIEERD workforce', NULL, '1', '2020-04-01 01:02:35', '2020-04-01 01:02:35', NULL),
(15, 'To harmonize, rationalize, and synergize division functions', NULL, '1', '2020-04-01 01:03:25', '2020-04-01 01:03:25', NULL),
(16, 'To formulate and deploy guidelines for policy formulation and fund generation', NULL, '1', '2020-04-01 01:04:59', '2020-04-01 01:04:59', NULL),
(17, 'To formulate and deploy guidelines for policy formulation and fund generation', NULL, '1', '2020-04-01 01:09:18', '2020-04-01 01:11:57', '2020-04-01 01:11:57'),
(18, 'To obtain PQA Level 2 certification by 2021', NULL, '1', '2020-04-01 01:10:35', '2020-04-01 01:10:35', NULL),
(19, 'To provide a safe and conducive working environment', NULL, '1', '2020-04-01 01:13:50', '2020-04-01 01:13:50', NULL),
(20, 'To provide effective and efficient utilization of PCIEERD funds', NULL, '1', '2020-04-01 01:21:46', '2020-04-01 02:04:39', NULL),
(21, 'To obtain HR - PRIME Level 3 certification by 2021', NULL, '1', '2020-04-01 02:40:36', '2020-04-01 02:40:36', NULL),
(22, 'Effective and Efficient Information Technology Resources (ITR) Management: Plans and Programs', NULL, '1', '2020-04-20 01:10:23', '2020-04-20 01:10:36', NULL),
(23, 'Effective and Efficient Information Technology Resources (ITR) Management: Plans and Programs', NULL, NULL, '2020-04-20 01:10:24', '2020-04-20 01:10:43', '2020-04-20 01:10:43'),
(24, 'Effective and Efficient Information Technology Resources (ITR) Management: Software Development and Data Management', NULL, '1', '2020-04-20 01:10:59', '2020-04-20 01:10:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `successindicators55`
--

CREATE TABLE `successindicators55` (
  `id` int(10) UNSIGNED NOT NULL,
  `success_indicator_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strategicobjectives55_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `active` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `successindicators55`
--

INSERT INTO `successindicators55` (`id`, `success_indicator_name`, `strategicobjectives55_id`, `created_by`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'No. of commented draft policies such as Legislative Bills, Executive Orders, DOST Guidelines referred to the Council', 5, NULL, '1', '2020-03-26 21:49:30', '2020-04-01 01:37:32', NULL),
(2, 'No. of developed/ updated sector/ technology/ program roadmaps which are aligned to HNRDA', 5, NULL, '1', '2020-03-27 00:23:40', '2020-04-01 01:38:09', NULL),
(3, 'No. of new partnerships with public and private stakeholders and international organizations', 6, NULL, '1', '2020-03-27 00:24:11', '2020-04-01 03:32:56', NULL),
(4, 'No. of active partnerships with public and private stakeholders and international organizations maintained', 6, NULL, '1', '2020-03-27 00:24:37', '2020-04-01 01:42:18', NULL),
(5, '% of IT service requests rendered within the prescribed time', 4, NULL, '1', '2020-03-27 00:25:13', '2020-04-01 01:32:45', NULL),
(6, 'Technology transfer events organized or co-organized', 8, NULL, '1', '2020-04-01 01:43:48', '2020-04-01 01:43:48', NULL),
(7, 'No. of proposals evaluated within 40 working days', 7, NULL, '1', '2020-04-01 01:45:23', '2020-04-01 01:45:23', NULL),
(8, 'No. of projects monitored with report posted in the PMIS within 15WDs after the actual conduct of monitoring', 7, NULL, '1', '2020-04-01 01:46:44', '2020-04-01 01:46:44', NULL),
(9, 'No. of ongoing projects with annual assessment report posted in the PMIS within 15WDs after the previous year', 7, NULL, '1', '2020-04-01 01:47:48', '2020-04-01 01:47:48', NULL),
(10, 'No. of completed projects with appraisal report posted in the PMIS within 10 WDs after oral presentation', 7, NULL, '1', '2020-04-01 01:50:51', '2020-04-01 01:50:51', NULL),
(11, 'No. of completed projects with technology profile posted in the PMIS within 5 working days after Oral Presentation', 7, NULL, '1', '2020-04-01 01:51:52', '2020-04-01 01:51:52', NULL),
(12, 'No. of technologies assessed', 8, NULL, '1', '2020-04-01 01:53:17', '2020-04-01 01:53:17', NULL),
(13, 'Pre-commercialization services rendered', 8, NULL, '1', '2020-04-01 01:56:20', '2020-04-01 01:56:20', NULL),
(14, 'No. of seminars, fora, symposia, and conference supported', 9, NULL, '1', '2020-04-01 01:58:21', '2020-04-01 01:58:21', NULL),
(15, 'No. of grantees evaluated within the prescribed timeframe', 10, NULL, '1', '2020-04-01 01:59:54', '2020-04-01 01:59:54', NULL),
(16, 'No. of processed LDDAP within seven (7) working days', 20, NULL, '1', '2020-04-01 02:02:28', '2020-04-01 02:02:28', NULL),
(17, '% FRs received, analyzed, and recorded within the prescribed period with minor adjustments', 20, NULL, '1', '2020-04-01 02:07:13', '2020-04-01 02:07:13', NULL),
(18, '% of COA AOM issued replied fifteen  (15) days after receipt', 20, NULL, '1', '2020-04-01 02:08:41', '2020-04-01 02:08:41', NULL),
(19, '% full implementation of  COA recommendations within the semester', 20, NULL, '1', '2020-04-01 02:10:02', '2020-04-01 02:10:02', NULL),
(20, '% of Prior Years COA recommendations fully implemented', 20, NULL, '1', '2020-04-01 02:11:28', '2020-04-01 02:11:28', NULL),
(21, 'No. of budgetary reports submitted on time with minor error', 20, NULL, '1', '2020-04-01 02:13:06', '2020-04-01 02:13:06', NULL),
(22, '% of Accounting  Reports submitted on time with minor error', 20, NULL, '1', '2020-04-01 02:14:48', '2020-04-01 02:14:48', NULL),
(23, 'No. of vacant positions filled within the prescribed timeframe', 14, NULL, '1', '2020-04-01 02:32:50', '2020-04-01 02:32:50', NULL),
(24, '% of Learning and development Implemented', 14, NULL, '1', '2020-04-01 02:34:18', '2020-04-01 02:34:18', NULL),
(25, 'No. of performance review summary prepared within fifteen (15) days after the set deadline of IPCR/DPCR submission', 14, NULL, '1', '2020-04-01 02:37:35', '2020-04-01 02:37:35', NULL),
(26, 'No. of awards/incentives given to PCIEERD personnel', 14, NULL, '1', '2020-04-01 02:43:27', '2020-04-01 02:43:27', NULL),
(27, 'No. of records disposed in compliance to RA 9470 (An Act to Strengthen the System of Management and Administration of Archival Records)', 19, NULL, '1', '2020-04-01 02:45:47', '2020-04-01 02:45:47', NULL),
(28, 'No. of public records inventoried within the prescribed timeframe', 19, NULL, '1', '2020-04-01 02:47:33', '2020-04-01 02:47:33', NULL),
(29, '% of goods and services procured as per request within the prescribed period', 19, NULL, '1', '2020-04-01 02:49:15', '2020-04-01 02:49:15', NULL),
(30, 'No. of  APCPI status reports prepared within fifteen (15) days after the end of each Quarter with one revision', 19, NULL, '1', '2020-04-01 02:51:27', '2020-04-01 02:51:27', NULL),
(31, 'No. of PCIEERD equipment inventoried within the First semester of the year and prepared Report fifteen (15) days after Inventory', 19, NULL, '1', '2020-04-01 02:54:20', '2020-04-01 02:54:20', NULL),
(32, '% of PCIEERD equipment identified for disposal with waste material report prepared within fifteen (15) days', 19, NULL, '1', '2020-04-01 02:57:04', '2020-04-01 02:57:04', NULL),
(33, '% Physical Inventory of project Equipment conducted within one week as scheduled after receipt of complete purchase docs thru PMIS', 7, NULL, '1', '2020-04-01 02:59:45', '2020-04-01 02:59:45', NULL),
(34, '% reliability and availability of PCIEERD office equipment and facilities', 19, NULL, '1', '2020-04-01 03:01:57', '2020-04-01 03:01:57', NULL),
(35, '% reliability and availability of PCIEERD vehicles', 19, NULL, '1', '2020-04-01 03:03:35', '2020-04-01 03:03:35', NULL),
(36, 'No. of PMT/GC resolutions finalized and disseminated with approved projects for funding', 7, NULL, '1', '2020-04-01 03:29:59', '2020-04-01 03:29:59', NULL),
(37, '% of project proposals encoded timely in the PMIS without error', 7, NULL, '1', '2020-04-01 03:31:27', '2020-04-01 03:31:27', NULL),
(38, '% of project proposals disseminated timely to Divisions', 7, NULL, '1', '2020-04-01 03:34:22', '2020-04-01 03:34:22', NULL),
(39, 'No. of monthly status reports of proposals and projects presented to PMT', 7, NULL, '1', '2020-04-01 03:35:34', '2020-04-01 03:35:34', NULL),
(40, 'No. of performance monitoring reports packaged and submitted to requesting agency', 7, NULL, '1', '2020-04-01 03:36:53', '2020-04-01 03:36:53', NULL),
(41, 'No. of planning outputs packaged', 18, NULL, '1', '2020-04-01 03:38:53', '2020-04-01 03:38:53', NULL),
(42, 'No. of management systems certified/maintained/re-certified', 18, NULL, '1', '2020-04-01 03:40:14', '2020-04-01 03:40:14', NULL),
(43, 'No. of new/drafted business process or internal policy prepared, approved, and implemented', 18, NULL, '1', '2020-04-01 03:42:20', '2020-04-01 03:42:20', NULL),
(44, 'No. of current business process or internal policy reviewed, approved, and implemented', 18, NULL, '1', '2020-04-01 04:00:48', '2020-04-01 04:00:48', NULL),
(45, 'No. of audits conducted/coordinated', 18, NULL, '1', '2020-04-01 04:02:30', '2020-04-01 04:02:30', NULL),
(46, 'No. of management systems related training coordinated', 14, NULL, '1', '2020-04-01 04:03:59', '2020-04-01 04:03:59', NULL),
(47, 'No. of reports on business processes performance', 18, NULL, '1', '2020-04-01 04:05:23', '2020-04-01 04:05:23', NULL),
(48, 'No. of Information Systems Strategic Plan (ISSP) endorsed', 20, NULL, '1', '2020-04-01 04:07:26', '2020-04-01 04:07:26', NULL),
(49, '% configured and deployed IT equipment within the prescribed timeframe', 19, NULL, '1', '2020-04-01 04:08:34', '2020-04-01 04:08:34', NULL),
(50, '% of new and ongoing IT projects implemented/monitored in accordance with the approved deadline', 19, NULL, '1', '2020-04-01 04:51:31', '2020-04-01 04:51:31', NULL),
(51, 'No. of completed and deployed IT projects within the approved deadline', 19, NULL, '1', '2020-04-01 04:53:01', '2020-04-01 04:53:01', NULL),
(52, '% of ICT equipment subjected to preventive maintenance as per schedule', 19, NULL, '1', '2020-04-01 04:54:29', '2020-04-01 04:54:29', NULL),
(53, 'No. of policy papers (relating to or as an output of supported/monitored projects) developed and/or published', 5, NULL, '1', '2020-04-01 04:56:13', '2020-04-01 04:56:13', NULL),
(54, '% of project/impact assessment report packaged/assisted', 13, NULL, '1', '2020-04-01 04:57:51', '2020-04-01 04:57:51', NULL),
(55, 'No. of Documentation created and approved within the prescribed timeframe', 22, NULL, '1', '2020-04-20 01:11:46', '2020-04-20 01:11:46', NULL),
(56, 'No. of Documentation created and approved within the prescribed timeframe', 24, NULL, '1', '2020-04-20 01:12:05', '2020-04-20 01:12:42', NULL),
(57, '% of Test cases executed within the prescribed timeframe', 24, NULL, '1', '2020-04-20 01:12:26', '2020-04-20 01:12:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `targets55`
--

CREATE TABLE `targets55` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users55_id` int(11) NOT NULL,
  `duration_s` datetime DEFAULT NULL,
  `duration_e` datetime DEFAULT NULL,
  `percent` decimal(15,0) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `active` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `successindicators55_id` int(11) NOT NULL,
  `ipcr55_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `efficiency` decimal(5,2) DEFAULT NULL,
  `quality` decimal(5,2) DEFAULT NULL,
  `timeliness` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `targets55`
--

INSERT INTO `targets55` (`id`, `name`, `description`, `users55_id`, `duration_s`, `duration_e`, `percent`, `created_by`, `active`, `successindicators55_id`, `ipcr55_id`, `created_at`, `updated_at`, `deleted_at`, `origid`, `efficiency`, `quality`, `timeliness`) VALUES
(118, '<p>Work From Home System</p>', NULL, 1, NULL, NULL, '0', NULL, NULL, 50, 87, NULL, '2020-04-15 08:02:38', '2020-04-15 08:02:38', NULL, '0.00', '0.00', '0.00'),
(119, '<p>Work From Home System</p>', NULL, 1, NULL, NULL, '75', NULL, NULL, 50, 87, '2020-04-15 07:49:44', '2020-05-31 17:39:52', NULL, '118', '5.00', '5.00', '5.00'),
(120, '<p>Mobile App</p>', NULL, 1, NULL, NULL, '100', NULL, NULL, 1, 87, '2020-04-15 08:21:30', '2020-05-31 17:39:27', NULL, NULL, '5.00', '4.00', '5.00'),
(121, '<p>Work From Home System</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 50, 94, '2020-04-15 08:51:06', '2020-04-15 08:51:06', NULL, NULL, '0.00', '0.00', '0.00'),
(122, '<p>Mobile App</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 1, 94, '2020-04-15 08:51:06', '2020-04-15 08:51:06', NULL, NULL, '0.00', '0.00', '0.00'),
(123, '<p>100</p>', NULL, 19016, NULL, NULL, NULL, NULL, '1', 5, 95, '2020-04-16 08:17:53', '2020-04-16 08:17:53', NULL, NULL, '0.00', '0.00', '0.00'),
(124, '<p>100</p>', NULL, 19016, NULL, NULL, NULL, NULL, '1', 2, 96, '2020-04-16 08:30:19', '2020-04-16 08:30:19', NULL, NULL, '0.00', '0.00', '0.00'),
(125, '<p>100</p>', NULL, 19016, NULL, NULL, NULL, NULL, '1', 5, 96, '2020-04-16 08:31:01', '2020-04-16 08:31:01', NULL, NULL, '0.00', '0.00', '0.00'),
(126, '<p>&nbsp;s</p>', NULL, 19016, NULL, NULL, NULL, NULL, '1', 1, 98, '2020-04-16 10:27:30', '2020-04-16 13:15:20', '2020-04-16 13:15:20', NULL, '0.00', '0.00', '0.00'),
(127, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp;</p>', NULL, 19016, NULL, NULL, '0', NULL, '1', 5, 98, '2020-04-16 11:59:32', '2020-04-17 02:41:27', NULL, NULL, '0.00', '0.00', '0.00'),
(128, '<p><strong></strong><strong>1. PMIS v4.0 Test Plan and Test Cases Phase 1</strong></p>\r\n<p><strong>- Project Manager Account</strong></p>\r\n<p><strong>- Project Leader Account</strong></p>\r\n<p><strong>- FAD Account</strong></p>\r\n<p><strong>- Admin Account</strong></p>\r\n<p><strong>- Super Admin Account</strong></p>\r\n<p>&nbsp;</p>', NULL, 19016, NULL, NULL, NULL, NULL, '1', 51, 98, '2020-04-16 12:13:30', '2020-04-16 12:13:30', NULL, NULL, '0.00', '0.00', '0.00'),
(129, '<p>s</p>', NULL, 19016, NULL, NULL, NULL, NULL, '1', 1, 98, '2020-04-16 12:41:50', '2020-04-16 13:07:35', '2020-04-16 13:07:35', NULL, '0.00', '0.00', '0.00'),
(130, '<p>Sample Only for Dates</p>', NULL, 19016, NULL, NULL, NULL, NULL, '1', 1, 98, '2020-04-16 12:46:19', '2020-04-16 12:46:28', '2020-04-16 12:46:28', NULL, '0.00', '0.00', '0.00'),
(131, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp;</p>', NULL, 17, NULL, NULL, NULL, NULL, NULL, 5, 102, '2020-04-17 02:41:27', '2020-04-17 02:41:27', NULL, '127', '0.00', '0.00', '0.00'),
(132, '<p>1. PMIS v4.0 Test Plan and Test Cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>', NULL, 19016, NULL, NULL, NULL, NULL, '1', 2, 103, '2020-04-17 02:52:09', '2020-04-17 02:52:09', NULL, NULL, '0.00', '0.00', '0.00'),
(133, '<p>2. HRMIS v10 Test Plan and Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account&nbsp;</p>\r\n<p>- Executive Account</p>', NULL, 19016, NULL, NULL, NULL, NULL, '1', 2, 103, '2020-04-17 02:53:07', '2020-04-17 02:53:07', NULL, NULL, '0.00', '0.00', '0.00'),
(134, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp; &nbsp; &nbsp;</p>\r\n<p>Note:</p>\r\n<p>Functional Requirement is already under Software Requirements Specification&nbsp;</p>', NULL, 19016, NULL, NULL, NULL, NULL, '1', 1, 103, '2020-04-17 02:54:07', '2020-04-17 02:54:18', '2020-04-17 02:54:18', NULL, '0.00', '0.00', '0.00'),
(135, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account</p>\r\n<p>- Executive Officer</p>\r\n<p>&nbsp;</p>\r\n<p>3. PMISv4.0 re-test and regression testing - Phase 1</p>', NULL, 19016, NULL, NULL, NULL, NULL, '1', 1, 103, '2020-04-17 02:55:10', '2020-04-17 02:55:10', NULL, NULL, '0.00', '0.00', '0.00'),
(136, '<p>Sample</p>', NULL, 19016, NULL, NULL, NULL, NULL, '1', 1, 103, '2020-04-17 03:01:11', '2020-04-17 03:01:11', NULL, NULL, '0.00', '0.00', '0.00'),
(137, '<p>1. PMIS v4.0 Test Plan and Test Cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>', NULL, 19016, NULL, NULL, '0', NULL, '1', 51, 104, '2020-04-17 06:47:27', '2020-04-20 00:11:23', NULL, NULL, '0.00', '0.00', '0.00'),
(138, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp; &nbsp; &nbsp;</p>\r\n<p>Note:</p>\r\n<p>Functional Requirement is already under Software Requirements Specification&nbsp;</p>', NULL, 19016, NULL, NULL, '0', NULL, '1', 51, 104, '2020-04-17 06:48:36', '2020-04-20 00:17:57', NULL, NULL, '0.00', '0.00', '0.00'),
(139, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>', NULL, 19016, NULL, NULL, '0', NULL, '1', 5, 104, '2020-04-17 06:52:09', '2020-04-19 23:49:01', '2020-04-19 23:49:01', NULL, '0.00', '0.00', '0.00'),
(140, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>', NULL, 17, NULL, NULL, '0', NULL, NULL, 5, 104, '2020-04-19 23:39:29', '2020-04-20 00:14:54', NULL, '139', '0.00', '0.00', '0.00'),
(141, '<p>1. PMIS v4.0 Test Plan and Test Cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>', NULL, 17, NULL, NULL, NULL, NULL, NULL, 51, 106, '2020-04-20 00:11:24', '2020-04-20 00:11:24', NULL, '137', '0.00', '0.00', '0.00'),
(142, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp; &nbsp; &nbsp;</p>\r\n<p>Note:</p>\r\n<p>Functional Requirement is already under Software Requirements Specification&nbsp;</p>', NULL, 17, NULL, NULL, NULL, NULL, NULL, 51, 107, '2020-04-20 00:12:07', '2020-04-20 00:12:07', NULL, '138', '0.00', '0.00', '0.00'),
(143, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>', NULL, 17, NULL, NULL, NULL, NULL, NULL, 5, 108, '2020-04-20 00:14:54', '2020-04-20 00:14:54', NULL, '140', '0.00', '0.00', '0.00'),
(144, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp; &nbsp; &nbsp;</p>\r\n<p>Note:</p>\r\n<p>Functional Requirement is already under Software Requirements Specification&nbsp;</p>', NULL, 17, NULL, NULL, NULL, NULL, NULL, 51, 109, '2020-04-20 00:17:57', '2020-04-20 00:17:57', NULL, '138', '0.00', '0.00', '0.00'),
(145, '<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Source Sans Pro\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px; background-color: #f5f5f5;\">Test Cases for:</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Source Sans Pro\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px; background-color: #f5f5f5;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Source Sans Pro\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px; background-color: #f5f5f5;\">1. PMIS v4.0 Test cases Phase 1</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Source Sans Pro\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px; background-color: #f5f5f5;\">- Project Manager Account</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Source Sans Pro\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px; background-color: #f5f5f5;\">- Project Leader Account</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Source Sans Pro\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px; background-color: #f5f5f5;\">- FAD Account</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Source Sans Pro\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px; background-color: #f5f5f5;\">- Admin Account</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-family: \'Source Sans Pro\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px; background-color: #f5f5f5;\">- Super Admin Account</p>', NULL, 17, NULL, NULL, NULL, NULL, NULL, 5, 110, '2020-04-20 00:24:34', '2020-04-20 00:24:34', NULL, NULL, '0.00', '0.00', '0.00'),
(146, '<p>Work From Home System</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 50, 111, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, '0.00', '0.00', '0.00'),
(147, '<p>Mobile App</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 1, 111, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, '0.00', '0.00', '0.00'),
(148, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 5, 111, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, '0.00', '0.00', '0.00'),
(149, '<p><strong></strong><strong>1. PMIS v4.0 Test Plan and Test Cases Phase 1</strong></p>\r\n<p><strong>- Project Manager Account</strong></p>\r\n<p><strong>- Project Leader Account</strong></p>\r\n<p><strong>- FAD Account</strong></p>\r\n<p><strong>- Admin Account</strong></p>\r\n<p><strong>- Super Admin Account</strong></p>\r\n<p>&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 111, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, '0.00', '0.00', '0.00'),
(150, '<p>1. PMIS v4.0 Test Plan and Test Cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 2, 111, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, '0.00', '0.00', '0.00'),
(151, '<p>2. HRMIS v10 Test Plan and Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account&nbsp;</p>\r\n<p>- Executive Account</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 2, 111, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, '0.00', '0.00', '0.00'),
(152, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account</p>\r\n<p>- Executive Officer</p>\r\n<p>&nbsp;</p>\r\n<p>3. PMISv4.0 re-test and regression testing - Phase 1</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 1, 111, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, '0.00', '0.00', '0.00'),
(153, '<p>Sample</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 1, 111, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, '0.00', '0.00', '0.00'),
(154, '<p>1. PMIS v4.0 Test Plan and Test Cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 111, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, '0.00', '0.00', '0.00'),
(155, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp; &nbsp; &nbsp;</p>\r\n<p>Note:</p>\r\n<p>Functional Requirement is already under Software Requirements Specification&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 111, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, '0.00', '0.00', '0.00'),
(156, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 5, 111, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, '0.00', '0.00', '0.00'),
(157, '<p>1. PMIS v4.0 Test Plan and Test Cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Plan and Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account&nbsp;</p>\r\n<p>- Executive Account</p>', NULL, 19016, NULL, NULL, '0', NULL, '1', 51, 113, '2020-04-20 01:22:18', '2020-04-20 09:02:26', NULL, NULL, '0.00', '0.00', '0.00'),
(158, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp; &nbsp; &nbsp;</p>\r\n<p>Note:</p>\r\n<p>Functional Requirement is already under Software Requirements Specification&nbsp;</p>', NULL, 19016, NULL, NULL, NULL, NULL, '1', 51, 113, '2020-04-20 01:23:30', '2020-04-20 01:23:52', NULL, NULL, '0.00', '0.00', '0.00'),
(159, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account</p>\r\n<p>- Executive Officer</p>\r\n<p>&nbsp;</p>\r\n<p>3. PMISv4.0 re-test and regression testing - Phase 1</p>', NULL, 19016, NULL, NULL, NULL, NULL, '1', 5, 113, '2020-04-20 01:24:29', '2020-04-20 03:18:18', '2020-04-20 03:18:18', NULL, '0.00', '0.00', '0.00'),
(160, '<p>Sample</p>', NULL, 17017, NULL, NULL, NULL, NULL, '1', 1, 114, '2020-04-20 02:36:19', '2020-04-20 02:36:19', NULL, NULL, '0.00', '0.00', '0.00'),
(161, '<p>Sample</p>', NULL, 17017, NULL, NULL, NULL, NULL, '1', 1, 114, '2020-04-20 02:36:52', '2020-04-20 02:36:52', NULL, NULL, '0.00', '0.00', '0.00'),
(162, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account</p>\r\n<p>- Executive Officer</p>\r\n<p>&nbsp;</p>\r\n<p>3. PMISv4.0 re-test and regression testing - Phase 1</p>', NULL, 17, NULL, NULL, '0', NULL, NULL, 57, 113, '2020-04-20 03:20:51', '2020-04-20 05:07:07', NULL, NULL, '0.00', '0.00', '0.00'),
(163, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account</p>\r\n<p>- Executive Officer</p>\r\n<p>&nbsp;</p>\r\n<p>3. PMISv4.0 re-test and regression testing - Phase 1</p>', NULL, 17, NULL, NULL, NULL, NULL, NULL, 57, 113, '2020-04-20 03:47:02', '2020-04-20 04:33:37', NULL, NULL, '0.00', '0.00', '0.00'),
(164, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account</p>\r\n<p>- Executive Officer</p>\r\n<p>&nbsp;</p>\r\n<p>3. PMISv4.0 re-test and regression testing - Phase 1</p>', NULL, 17, NULL, NULL, NULL, NULL, NULL, 57, 119, '2020-04-20 05:01:38', '2020-04-20 05:01:38', NULL, '162', '0.00', '0.00', '0.00'),
(165, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account</p>\r\n<p>- Executive Officer</p>\r\n<p>&nbsp;</p>\r\n<p>3. PMISv4.0 re-test and regression testing - Phase 1</p>', NULL, 17, NULL, NULL, '0', NULL, NULL, 57, 120, '2020-04-20 05:07:07', '2020-04-20 06:01:43', NULL, '162', '0.00', '0.00', '0.00'),
(166, '<p>Sample Only</p>', NULL, 10101, NULL, NULL, '0', NULL, '1', 25, 121, '2020-04-20 06:22:38', '2020-04-23 10:49:26', '2020-04-23 10:49:26', NULL, '0.00', '0.00', '0.00'),
(167, '<p>100</p>', NULL, 10101, NULL, NULL, '0', NULL, '1', 22, 121, '2020-04-20 06:22:58', '2020-04-23 09:31:17', '2020-04-23 09:31:17', NULL, '0.00', '0.00', '0.00'),
(168, '<p>100</p>', NULL, 19, NULL, NULL, '0', NULL, NULL, 22, 122, '2020-04-20 08:43:13', '2020-04-20 08:43:58', NULL, '167', '0.00', '0.00', '0.00'),
(169, '<p>1. PMIS v4.0 Test Plan and Test Cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Plan and Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account&nbsp;</p>\r\n<p>- Executive Account</p>', NULL, 17, NULL, NULL, NULL, NULL, NULL, 51, 123, '2020-04-20 08:59:39', '2020-04-20 08:59:39', NULL, '157', '0.00', '0.00', '0.00'),
(170, '<p>Work From Home System</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 50, 125, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, '0.00', '0.00', '0.00'),
(171, '<p>Mobile App</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 1, 125, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, '0.00', '0.00', '0.00'),
(172, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 5, 125, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, '0.00', '0.00', '0.00'),
(173, '<p><strong></strong><strong>1. PMIS v4.0 Test Plan and Test Cases Phase 1</strong></p>\r\n<p><strong>- Project Manager Account</strong></p>\r\n<p><strong>- Project Leader Account</strong></p>\r\n<p><strong>- FAD Account</strong></p>\r\n<p><strong>- Admin Account</strong></p>\r\n<p><strong>- Super Admin Account</strong></p>\r\n<p>&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 125, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, '0.00', '0.00', '0.00'),
(174, '<p>1. PMIS v4.0 Test Plan and Test Cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 2, 125, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, '0.00', '0.00', '0.00'),
(175, '<p>2. HRMIS v10 Test Plan and Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account&nbsp;</p>\r\n<p>- Executive Account</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 2, 125, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, '0.00', '0.00', '0.00'),
(176, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account</p>\r\n<p>- Executive Officer</p>\r\n<p>&nbsp;</p>\r\n<p>3. PMISv4.0 re-test and regression testing - Phase 1</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 1, 125, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, '0.00', '0.00', '0.00'),
(177, '<p>Sample</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 1, 125, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, '0.00', '0.00', '0.00'),
(178, '<p>1. PMIS v4.0 Test Plan and Test Cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 125, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, '0.00', '0.00', '0.00'),
(179, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp; &nbsp; &nbsp;</p>\r\n<p>Note:</p>\r\n<p>Functional Requirement is already under Software Requirements Specification&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 125, '2020-04-20 09:13:49', '2020-04-20 09:13:49', NULL, NULL, '0.00', '0.00', '0.00'),
(180, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 5, 125, '2020-04-20 09:13:49', '2020-04-20 09:13:49', NULL, NULL, '0.00', '0.00', '0.00'),
(181, '<p>1. PMIS v4.0 Test Plan and Test Cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Plan and Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account&nbsp;</p>\r\n<p>- Executive Account</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 125, '2020-04-20 09:13:49', '2020-04-20 09:13:49', NULL, NULL, '0.00', '0.00', '0.00'),
(182, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp; &nbsp; &nbsp;</p>\r\n<p>Note:</p>\r\n<p>Functional Requirement is already under Software Requirements Specification&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 125, '2020-04-20 09:13:49', '2020-04-20 09:13:49', NULL, NULL, '0.00', '0.00', '0.00'),
(183, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account</p>\r\n<p>- Executive Officer</p>\r\n<p>&nbsp;</p>\r\n<p>3. PMISv4.0 re-test and regression testing - Phase 1</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 57, 125, '2020-04-20 09:13:49', '2020-04-20 09:13:49', NULL, NULL, '0.00', '0.00', '0.00'),
(184, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account</p>\r\n<p>- Executive Officer</p>\r\n<p>&nbsp;</p>\r\n<p>3. PMISv4.0 re-test and regression testing - Phase 1</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 57, 125, '2020-04-20 09:13:49', '2020-04-20 09:13:49', NULL, NULL, '0.00', '0.00', '0.00'),
(185, '<p><span style=\"font-family: Calibri, \'Segoe UI\', Calibri, Thonburi, Arial, Verdana, sans-serif, \'Mongolian Baiti\', \'Microsoft Yi Baiti\', \'Javanese Text\'; font-size: 14.6667px; text-align: center; white-space: pre-wrap;\">- Action taken, as assigned - Updating of PCMD Calendar - Coordination of activites among concerned clients/division</span></p>', NULL, 19015, NULL, NULL, '0', NULL, '1', 3, 124, '2020-04-20 09:17:44', '2020-04-20 09:29:10', '2020-04-20 09:29:10', NULL, '0.00', '0.00', '0.00'),
(186, '<p><span style=\"font-family: Calibri, \'Segoe UI\', Calibri, Thonburi, Arial, Verdana, sans-serif, \'Mongolian Baiti\', \'Microsoft Yi Baiti\', \'Javanese Text\'; font-size: 14.6667px; text-align: center; white-space: pre-wrap;\">- Action taken, as assigned - Updating of PCMD Calendar - Coordination of activites among concerned clients/division</span></p>', NULL, 32, NULL, NULL, '0', NULL, NULL, 3, 124, '2020-04-20 09:23:30', '2020-04-20 09:39:26', '2020-04-20 09:39:26', '185', '0.00', '0.00', '0.00'),
(187, '<p><span style=\"font-family: Calibri, \'Segoe UI\', Calibri, Thonburi, Arial, Verdana, sans-serif, \'Mongolian Baiti\', \'Microsoft Yi Baiti\', \'Javanese Text\'; font-size: 14.6667px; text-align: center; white-space: pre-wrap;\">- Action taken, as assigned - Updating of PCMD Calendar - Coordination of activites among concerned clients/division</span></p>', NULL, 32, NULL, NULL, '0', NULL, NULL, 3, 124, '2020-04-20 09:30:51', '2020-04-20 09:45:59', NULL, '186', '0.00', '0.00', '0.00'),
(188, '<p><span style=\"font-family: Calibri, \'Segoe UI\', Calibri, Thonburi, Arial, Verdana, sans-serif, \'Mongolian Baiti\', \'Microsoft Yi Baiti\', \'Javanese Text\'; font-size: 14.6667px; white-space: pre-wrap;\">Oversee and/or prepare 90% of simple documents (internal and/or external) within 30 minutes with 1 minor revision</span></p>', NULL, 32, NULL, NULL, NULL, NULL, NULL, 2, 124, '2020-04-20 09:36:34', '2020-04-20 09:39:31', NULL, NULL, '0.00', '0.00', '0.00'),
(189, '<p><span style=\"font-family: Calibri, \'Segoe UI\', Calibri, Thonburi, Arial, Verdana, sans-serif, \'Mongolian Baiti\', \'Microsoft Yi Baiti\', \'Javanese Text\'; font-size: 14.6667px; text-align: center; white-space: pre-wrap;\">- Action taken, as assigned - Updating of PCMD Calendar - Coordination of activites among concerned clients/division</span></p>', NULL, 32, NULL, NULL, NULL, NULL, NULL, 3, 129, '2020-04-20 09:45:59', '2020-04-20 09:45:59', NULL, '187', '0.00', '0.00', '0.00'),
(190, '<p>100</p>', NULL, 19, NULL, NULL, '0', NULL, NULL, 22, 121, '2020-04-23 08:21:31', '2020-04-23 09:26:35', NULL, NULL, '0.00', '0.00', '0.00'),
(191, '<p>100</p>', NULL, 19, NULL, NULL, '0', NULL, NULL, 22, 121, '2020-04-23 09:05:13', '2020-04-24 03:13:32', NULL, '167', '0.00', '0.00', '0.00'),
(192, '<p>Sample Only</p>', NULL, 19, NULL, NULL, '0', NULL, NULL, 25, 121, '2020-04-23 09:56:36', '2020-04-23 10:49:26', NULL, '166', '0.00', '0.00', '0.00'),
(193, '<p>Sample Only</p>', NULL, 19, NULL, NULL, NULL, NULL, NULL, 25, 121, '2020-04-23 10:39:43', '2020-04-23 10:49:30', NULL, '166', '0.00', '0.00', '0.00'),
(194, '<p>100 percent</p>', NULL, 19, NULL, NULL, '0', NULL, NULL, 24, 121, '2020-04-23 10:52:31', '2020-04-23 11:48:02', NULL, NULL, '0.00', '0.00', '0.00'),
(195, '<p>5 new positions</p>', NULL, 19, NULL, NULL, '0', NULL, NULL, 23, 121, '2020-04-23 11:57:55', '2020-04-24 01:19:05', '2020-04-24 01:19:05', NULL, '0.00', '0.00', '0.00'),
(196, '<p>5 new positions</p>', NULL, 19, NULL, NULL, NULL, NULL, NULL, 23, 121, '2020-04-24 01:10:12', '2020-04-24 01:19:05', NULL, '195', '0.00', '0.00', '0.00'),
(197, '<p>Work From Home System</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 50, 137, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, '0.00', '0.00', '0.00'),
(198, '<p>Mobile App</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 1, 137, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, '0.00', '0.00', '0.00'),
(199, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 5, 137, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, '0.00', '0.00', '0.00'),
(200, '<p><strong></strong><strong>1. PMIS v4.0 Test Plan and Test Cases Phase 1</strong></p>\r\n<p><strong>- Project Manager Account</strong></p>\r\n<p><strong>- Project Leader Account</strong></p>\r\n<p><strong>- FAD Account</strong></p>\r\n<p><strong>- Admin Account</strong></p>\r\n<p><strong>- Super Admin Account</strong></p>\r\n<p>&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 137, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, '0.00', '0.00', '0.00'),
(201, '<p>1. PMIS v4.0 Test Plan and Test Cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 2, 137, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, '0.00', '0.00', '0.00'),
(202, '<p>2. HRMIS v10 Test Plan and Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account&nbsp;</p>\r\n<p>- Executive Account</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 2, 137, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, '0.00', '0.00', '0.00'),
(203, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account</p>\r\n<p>- Executive Officer</p>\r\n<p>&nbsp;</p>\r\n<p>3. PMISv4.0 re-test and regression testing - Phase 1</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 1, 137, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, '0.00', '0.00', '0.00'),
(204, '<p>Sample</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 1, 137, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, '0.00', '0.00', '0.00'),
(205, '<p>1. PMIS v4.0 Test Plan and Test Cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 137, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, '0.00', '0.00', '0.00'),
(206, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp; &nbsp; &nbsp;</p>\r\n<p>Note:</p>\r\n<p>Functional Requirement is already under Software Requirements Specification&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 137, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, '0.00', '0.00', '0.00'),
(207, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 5, 137, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, '0.00', '0.00', '0.00'),
(208, '<p>1. PMIS v4.0 Test Plan and Test Cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Plan and Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account&nbsp;</p>\r\n<p>- Executive Account</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 137, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, '0.00', '0.00', '0.00'),
(209, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp; &nbsp; &nbsp;</p>\r\n<p>Note:</p>\r\n<p>Functional Requirement is already under Software Requirements Specification&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 137, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, '0.00', '0.00', '0.00'),
(210, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account</p>\r\n<p>- Executive Officer</p>\r\n<p>&nbsp;</p>\r\n<p>3. PMISv4.0 re-test and regression testing - Phase 1</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 57, 137, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, '0.00', '0.00', '0.00'),
(211, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account</p>\r\n<p>- Executive Officer</p>\r\n<p>&nbsp;</p>\r\n<p>3. PMISv4.0 re-test and regression testing - Phase 1</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 57, 137, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, '0.00', '0.00', '0.00'),
(212, '<p><span style=\"font-family: Calibri, \'Segoe UI\', Calibri, Thonburi, Arial, Verdana, sans-serif, \'Mongolian Baiti\', \'Microsoft Yi Baiti\', \'Javanese Text\'; font-size: 14.6667px; text-align: center; white-space: pre-wrap;\">- Action taken, as assigned - Updating of PCMD Calendar - Coordination of activites among concerned clients/division</span></p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 3, 137, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, '0.00', '0.00', '0.00'),
(213, '<p><span style=\"font-family: Calibri, \'Segoe UI\', Calibri, Thonburi, Arial, Verdana, sans-serif, \'Mongolian Baiti\', \'Microsoft Yi Baiti\', \'Javanese Text\'; font-size: 14.6667px; white-space: pre-wrap;\">Oversee and/or prepare 90% of simple documents (internal and/or external) within 30 minutes with 1 minor revision</span></p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 2, 137, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, '0.00', '0.00', '0.00'),
(214, '<p>Work From Home System</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 50, 138, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, '0.00', '0.00', '0.00'),
(215, '<p>Mobile App</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 1, 138, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, '0.00', '0.00', '0.00'),
(216, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 5, 138, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, '0.00', '0.00', '0.00'),
(217, '<p><strong></strong><strong>1. PMIS v4.0 Test Plan and Test Cases Phase 1</strong></p>\r\n<p><strong>- Project Manager Account</strong></p>\r\n<p><strong>- Project Leader Account</strong></p>\r\n<p><strong>- FAD Account</strong></p>\r\n<p><strong>- Admin Account</strong></p>\r\n<p><strong>- Super Admin Account</strong></p>\r\n<p>&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 138, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, '0.00', '0.00', '0.00'),
(218, '<p>1. PMIS v4.0 Test Plan and Test Cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 2, 138, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, '0.00', '0.00', '0.00'),
(219, '<p>2. HRMIS v10 Test Plan and Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account&nbsp;</p>\r\n<p>- Executive Account</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 2, 138, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, '0.00', '0.00', '0.00'),
(220, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account</p>\r\n<p>- Executive Officer</p>\r\n<p>&nbsp;</p>\r\n<p>3. PMISv4.0 re-test and regression testing - Phase 1</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 1, 138, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, '0.00', '0.00', '0.00'),
(221, '<p>Sample</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 1, 138, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, '0.00', '0.00', '0.00'),
(222, '<p>1. PMIS v4.0 Test Plan and Test Cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 138, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, '0.00', '0.00', '0.00'),
(223, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp; &nbsp; &nbsp;</p>\r\n<p>Note:</p>\r\n<p>Functional Requirement is already under Software Requirements Specification&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 138, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, '0.00', '0.00', '0.00'),
(224, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 5, 138, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, '0.00', '0.00', '0.00'),
(225, '<p>1. PMIS v4.0 Test Plan and Test Cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Plan and Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account&nbsp;</p>\r\n<p>- Executive Account</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 138, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, '0.00', '0.00', '0.00'),
(226, '<p>HRMIS v10 (whole)</p>\r\n<p>* System Design Specifications&nbsp;</p>\r\n<p>* Software Requirements Specifications</p>\r\n<p>* User Manuals</p>\r\n<p>* Other related manuals or documentations</p>\r\n<p>&nbsp; &nbsp; &nbsp;</p>\r\n<p>Note:</p>\r\n<p>Functional Requirement is already under Software Requirements Specification&nbsp;</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 51, 138, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, '0.00', '0.00', '0.00'),
(227, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account</p>\r\n<p>- Executive Officer</p>\r\n<p>&nbsp;</p>\r\n<p>3. PMISv4.0 re-test and regression testing - Phase 1</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 57, 138, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, '0.00', '0.00', '0.00'),
(228, '<p>Test Cases for:</p>\r\n<p>&nbsp;</p>\r\n<p>1. PMIS v4.0 Test cases Phase 1</p>\r\n<p>- Project Manager Account</p>\r\n<p>- Project Leader Account</p>\r\n<p>- FAD Account</p>\r\n<p>- Admin Account</p>\r\n<p>- Super Admin Account</p>\r\n<p>&nbsp;</p>\r\n<p>2. HRMIS v10 Test Cases</p>\r\n<p>- Employee Account</p>\r\n<p>- Finance Account</p>\r\n<p>- Officer Account</p>\r\n<p>- Executive Officer</p>\r\n<p>&nbsp;</p>\r\n<p>3. PMISv4.0 re-test and regression testing - Phase 1</p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 57, 138, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, '0.00', '0.00', '0.00'),
(229, '<p><span style=\"font-family: Calibri, \'Segoe UI\', Calibri, Thonburi, Arial, Verdana, sans-serif, \'Mongolian Baiti\', \'Microsoft Yi Baiti\', \'Javanese Text\'; font-size: 14.6667px; text-align: center; white-space: pre-wrap;\">- Action taken, as assigned - Updating of PCMD Calendar - Coordination of activites among concerned clients/division</span></p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 3, 138, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, '0.00', '0.00', '0.00'),
(230, '<p><span style=\"font-family: Calibri, \'Segoe UI\', Calibri, Thonburi, Arial, Verdana, sans-serif, \'Mongolian Baiti\', \'Microsoft Yi Baiti\', \'Javanese Text\'; font-size: 14.6667px; white-space: pre-wrap;\">Oversee and/or prepare 90% of simple documents (internal and/or external) within 30 minutes with 1 minor revision</span></p>', NULL, 10012, NULL, NULL, NULL, NULL, NULL, 2, 138, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tasks55`
--

CREATE TABLE `tasks55` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `targets55_id` int(11) NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration_s` datetime NOT NULL,
  `duration_e` datetime NOT NULL,
  `percent` decimal(15,0) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `percent_completed` decimal(15,0) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `active` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` decimal(15,0) DEFAULT NULL,
  `means_verification` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `evaluation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `actualdate_s` datetime DEFAULT NULL,
  `actualdate_e` datetime DEFAULT NULL,
  `actual_verification` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `evaluation_divhead` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senior_accomplishmentremarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chief_accomplishmentremarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks55`
--

INSERT INTO `tasks55` (`id`, `name`, `description`, `targets55_id`, `color`, `duration_s`, `duration_e`, `percent`, `order`, `parent_id`, `percent_completed`, `created_by`, `active`, `weight`, `means_verification`, `evaluation`, `created_at`, `updated_at`, `deleted_at`, `actualdate_s`, `actualdate_e`, `actual_verification`, `status_id`, `evaluation_divhead`, `senior_accomplishmentremarks`, `chief_accomplishmentremarks`) VALUES
(190, 'Create ERD', NULL, 118, NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', '0', NULL, NULL, '100', NULL, NULL, '25', 'Excel form of created ERD', NULL, NULL, '2020-04-15 07:49:44', NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', '<p>Click this link</p>', NULL, NULL, NULL, NULL),
(191, 'Framework User Interface Design', NULL, 118, NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', '0', NULL, NULL, '100', NULL, NULL, '75', 'Onedrive link for the screenshot of UI', NULL, '2020-04-15 06:32:03', '2020-04-15 07:49:44', NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', '<p>Click this link</p>', NULL, NULL, NULL, NULL),
(192, 'Create ERD', NULL, 119, NULL, '2020-06-04 00:00:00', '2020-10-04 00:00:00', '25', NULL, NULL, '100', NULL, NULL, '25', NULL, NULL, '2020-04-15 07:49:44', '2020-05-31 17:39:52', NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', '<p>Click this link</p>', '2', NULL, NULL, NULL),
(193, 'Framework User Interface Design', NULL, 119, NULL, '2020-06-04 00:00:00', '2020-10-04 00:00:00', '25', NULL, NULL, '100', NULL, NULL, '25', NULL, NULL, '2020-04-15 07:49:44', '2020-05-31 17:39:52', NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', '<p>Click this link</p>', '2', NULL, NULL, NULL),
(194, 'Coding', NULL, 119, NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', '25', NULL, NULL, '50', NULL, NULL, '50', NULL, NULL, '2020-04-15 07:49:44', '2020-05-31 17:39:52', NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', '<p>link</p>', '2', NULL, NULL, NULL),
(195, 'Code and Debug', NULL, 120, NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', '100', NULL, NULL, '100', NULL, NULL, '100', NULL, NULL, '2020-04-15 08:21:30', '2020-05-31 17:39:27', NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', '<p>sample link</p>', '2', NULL, NULL, NULL),
(196, 'Create ERD', NULL, 121, NULL, '2020-06-04 00:00:00', '2020-10-04 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, '25', NULL, NULL, '2020-04-15 08:51:06', '2020-04-15 08:51:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, 'Framework User Interface Design', NULL, 121, NULL, '2020-06-04 00:00:00', '2020-10-04 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, '25', NULL, NULL, '2020-04-15 08:51:06', '2020-04-15 08:51:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, 'Coding', NULL, 121, NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', NULL, NULL, NULL, '50', NULL, NULL, '50', NULL, NULL, '2020-04-15 08:51:06', '2020-04-15 08:51:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(199, 'Code and Debug', NULL, 122, NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, '100', NULL, NULL, '2020-04-15 08:51:06', '2020-04-15 08:51:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, 'Sample Task', NULL, 123, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sample Verification document', NULL, '2020-04-16 08:17:53', '2020-04-16 08:17:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, 'Sample Task under developed st', NULL, 124, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test Cases Approved', NULL, '2020-04-16 08:30:19', '2020-04-16 08:35:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, 'Sample IT Service rendered', NULL, 125, NULL, '2020-03-02 00:00:00', '2020-03-31 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Please elaborate your task', '2020-04-16 08:31:01', '2020-04-16 08:32:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, 'Sample only for BLANK \'Targets (per sem)\' field', NULL, 126, NULL, '2020-04-01 00:00:00', '2020-04-10 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-16 10:27:30', '2020-04-16 12:41:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, '1. Created and sent Bug report to developer', NULL, 127, NULL, '2020-04-13 00:00:00', '2020-04-17 00:00:00', '0', NULL, NULL, NULL, NULL, NULL, NULL, 'LIB_BUG_REPORT#1_08042020.docx', NULL, '2020-04-16 11:59:32', '2020-04-17 02:41:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, '1. Created Additional Test Cases for Super Admin Account - LIB:\r\n\r\n- Maintenance and Other Operating Expenses (MOOE)Direct and Indirect Cost\r\n\r\n- Capital Outlays (CO) - Direct and Indirect Cost', NULL, 128, NULL, '2020-04-13 00:00:00', '2020-04-17 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test Cases Attached', NULL, '2020-04-16 12:13:30', '2020-04-16 12:13:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, 's', NULL, 129, NULL, '0045-01-01 00:00:00', '0055-04-04 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 's', NULL, '2020-04-16 12:41:50', '2020-04-16 12:41:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, 'Does the system validate date?', NULL, 130, NULL, '0004-04-03 00:00:00', '0007-05-04 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-16 12:46:19', '2020-04-16 12:46:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, '1. Created and sent Bug report to developer', NULL, 131, NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-17 02:41:27', '2020-04-20 00:37:35', NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '1', NULL, NULL, NULL),
(209, 'Sample Only', NULL, 131, NULL, '2020-04-01 00:00:00', '2020-04-03 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-17 02:41:27', '2020-04-20 00:37:35', NULL, '2020-04-01 00:00:00', '2020-04-03 00:00:00', 'Sample Only', '1', NULL, NULL, NULL),
(210, '1. Created PMIS v4.0 Test cases - Phase 1 for the following accounts:\r\n- Project Manager\r\n- Project Leader\r\n- Super Admin\r\n- Admin Account', NULL, 132, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test Cases Attachments:\r\n\r\nProject Manager Account -  27 Test cases\r\n\r\nProject Leader Account -  26 test cases\r\n\r\nSuper Admin Account - 28 Test cases\r\n\r\nAdmin Account - 27 Test Cases\r\n\r\nProject_Leader_restrictions.docx', NULL, '2020-04-17 02:52:09', '2020-04-17 02:52:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, '2. Studied the restrictions and capabilities of Project Leader and FAD account in PMIS v4.0', NULL, 133, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Project_Leader_restrictions.docx', NULL, '2020-04-17 02:53:07', '2020-04-17 02:53:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, 'No  task  assigned', NULL, 134, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No task assigned this week', NULL, '2020-04-17 02:54:07', '2020-04-17 02:54:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(213, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 135, NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TC_PMIS_SA_1.0,\r\nTC_PMIS_SA_1.1,\r\nTC_PMIS_SA_1.2,\r\nTC_PMIS_SA_1.10,', NULL, '2020-04-17 02:55:10', '2020-04-17 02:55:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, 'Sample', NULL, 136, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sample', NULL, '2020-04-17 03:01:11', '2020-04-17 03:01:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(215, '1. Created PMIS v4.0 Test cases - Phase 1 for the following accounts:\r\n- Project Manager\r\n- Project Leader\r\n- Super Admin\r\n- Admin Account', NULL, 137, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', '0', NULL, NULL, NULL, NULL, NULL, '25', 'Test Cases Attachments:\r\n\r\nProject Manager Account -  27 Test cases\r\n\r\nProject Leader Account -  26 test cases\r\n\r\nSuper Admin Account - 28 Test cases\r\n\r\nAdmin Account - 27 Test Cases', NULL, '2020-04-17 06:47:27', '2020-04-20 00:11:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(216, '2. HRMIS v10 Test Plan and Test Cases\r\n- Employee Account\r\n- Finance Account\r\n- Officer Account \r\n- Executive Account', NULL, 137, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', '0', NULL, NULL, NULL, NULL, NULL, '25', 'Project_Leader_restrictions.docx', NULL, '2020-04-17 06:47:27', '2020-04-20 00:11:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, 'No task assigned for this week', NULL, 138, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', '0', NULL, NULL, NULL, NULL, NULL, '50', 'No task assigned for this week', NULL, '2020-04-17 06:48:36', '2020-04-20 00:17:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(218, 'No assigned Task for this week', NULL, 139, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', '0', NULL, NULL, NULL, NULL, NULL, '50', 'No assigned task for this week', NULL, '2020-04-17 06:52:09', '2020-04-19 23:39:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(219, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 139, NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TC_PMIS_SA_1.0,\r\nTC_PMIS_SA_1.1,\r\nTC_PMIS_SA_1.2,\r\nTC_PMIS_SA_1.10,', NULL, '2020-04-17 07:06:45', '2020-04-17 07:08:16', '2020-04-17 07:08:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(220, 'No assigned Task for this week', NULL, 140, NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-19 23:39:29', '2020-04-20 00:14:54', NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '2', NULL, NULL, NULL),
(221, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 140, NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', '0', NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-19 23:39:29', '2020-04-20 00:14:54', NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', '<p>Test Cases Executed: TC_PMIS_SA_1.0, TC_PMIS_SA_1.1, TC_PMIS_SA_1.2, TC_PMIS_SA_1.10,</p>', '2', NULL, NULL, NULL),
(222, '1. Created PMIS v4.0 Test cases - Phase 1 for the following accounts:- Project Manager- Project Leader- Super Admin- Admin Account', NULL, 141, NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 00:11:24', '2020-04-20 00:11:24', NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '4', NULL, NULL, NULL),
(223, '2. HRMIS v10 Test Plan and Test Cases- Employee Account- Finance Account- Officer Account - Executive Account', NULL, 141, NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 00:11:24', '2020-04-20 00:11:24', NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '4', NULL, NULL, NULL),
(224, '1. Created Additional Test Cases for Super Admin Account', NULL, 141, NULL, '2020-03-30 00:00:00', '2020-04-03 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 00:11:24', '2020-04-20 00:11:24', NULL, '2020-03-30 00:00:00', '2020-04-03 00:00:00', 'TC_PMIS_SA_1.6,\r\nTC_PMIS_SA_1.7,\r\nTC_PMIS_SA_1.8,\r\nTC_PMIS_SA_1.9,\r\nTC_PMIS_SA_1.11,\r\nTC_PMIS_SA_1.12,\r\nTC_PMIS_SA_1.13,\r\n\r\nTC_PMIS_SA_2.0.2.10.1,\r\nTC_PMIS_SA_2.0.2.10.2,\r\nTC_PMIS_SA_2.0.2.10.3,\r\nTC_PMIS_SA_2.0.2.10.4,\r\nTC_PMIS_SA_2.0.2.10.5,\r\nTC_PMIS_SA_2.0.2.10.6,\r\nTC_PMIS_SA_2.0.2.10.7', '4', NULL, NULL, NULL),
(225, 'No task assigned for this week', NULL, 142, NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 00:12:07', '2020-04-20 00:12:07', NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '4', NULL, NULL, NULL),
(226, '1. Updated the PMIS database for Position Salary (2020)\r\n\r\n2. Inputted actual data in PMIS v4.0 for LIB', NULL, 142, NULL, '2020-03-30 00:00:00', '2020-04-03 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 00:12:07', '2020-04-20 00:12:07', NULL, '2020-03-30 00:00:00', '2020-04-03 00:00:00', '(Screenshots)\r\nAttachments_02042020.docx', '4', NULL, NULL, NULL),
(227, 'No assigned Task for this week', NULL, 143, NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 00:14:54', '2020-04-20 00:14:54', NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '4', NULL, NULL, NULL),
(228, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 143, NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 00:14:54', '2020-04-20 00:14:54', NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', '<p>Test Cases Executed: TC_PMIS_SA_1.0, TC_PMIS_SA_1.1, TC_PMIS_SA_1.2, TC_PMIS_SA_1.10,</p>', '4', NULL, NULL, NULL),
(229, 'Test Case Execution for Super Admin use - view functionality:\r\n\r\n- All Projects\r\n- Dashboard\r\n- Project Details\r\n- Task Tab\r\n- Evaluations tab\r\n- Financials tab\r\n- Technical Tab\r\n- Research Database\r\n- Updates\r\n- Files', NULL, 143, NULL, '2020-03-30 00:00:00', '2020-04-03 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 00:14:54', '2020-04-20 00:14:54', NULL, '2020-03-30 00:00:00', '2020-04-03 00:00:00', 'Test Cases Executed:\r\n\r\nTC_PMIS_SA_2.0\r\nTC_PMIS_SA_2.0.1\r\nTC_PMIS_SA_2.0.2\r\nTC_PMIS_SA_2.0.2.1\r\nTC_PMIS_SA_2.0.2.2\r\nTC_PMIS_SA_2.0.2.3\r\nTC_PMIS_SA_2.0.2.4\r\nTC_PMIS_SA_2.0.2.5\r\nTC_PMIS_SA_2.0.2.6\r\nTC_PMIS_SA_2.0.2.7\r\nTC_PMIS_SA_2.0.2.8\r\nTC_PMIS_SA_2.0.2.9\r\nTC_PMIS_SA_2.0.2.10\r\nTC_PMIS_SA_2.0.2.10.1\r\nTC_PMIS_SA_2.0.2.10.2\r\nTC_PMIS_SA_2.0.2.10.3\r\nTC_PMIS_SA_2.0.2.10.4\r\nTC_PMIS_SA_2.0.2.10.5\r\nTC_PMIS_SA_2.0.2.10.6\r\nTC_PMIS_SA_2.0.2.10.7\r\nTC_PMIS_SA_2.0.3\r\nTC_PMIS_SA_2.0.4\r\nTC_PMIS_SA_2.0.5\r\nTC_PMIS_SA_2.0.5.1\r\nTC_PMIS_SA_2.0.5.2\r\nTC_PMIS_SA_2.0.5.3\r\nTC_PMIS_SA_2.0.5.4\r\nTC_PMIS_SA_2.0.6\r\nTC_PMIS_SA_2.0.7\r\nTC_PMIS_SA_2.0.8\r\nTC_PMIS_SA_2.0.9\r\nTC_PMIS_SA_2.1', '4', NULL, NULL, NULL),
(230, 'No task assigned for this week', NULL, 144, NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 00:17:57', '2020-04-20 00:17:57', NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '4', NULL, NULL, NULL),
(231, 'Sample Only', NULL, 144, NULL, '2020-03-30 00:00:00', '2020-04-03 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 00:17:57', '2020-04-20 00:17:57', NULL, '2020-03-30 00:00:00', '2020-04-03 00:00:00', 'Smple Only', '4', NULL, NULL, NULL),
(232, 'Test Case Execution for Super Admin use - view functionality:  - All Projects - Dashboard - Project Details - Task Tab - Evaluations tab - Financials tab - Technical Tab - Research Database - Updates - Files', NULL, 145, NULL, '2020-03-30 00:00:00', '2020-04-03 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 00:24:34', '2020-04-20 00:24:34', NULL, '2020-03-30 00:00:00', '2020-04-03 00:00:00', 'TC_PMIS_SA_2.0\r\nTC_PMIS_SA_2.0.1\r\nTC_PMIS_SA_2.0.2\r\nTC_PMIS_SA_2.0.2.1\r\nTC_PMIS_SA_2.0.2.2\r\nTC_PMIS_SA_2.0.2.3\r\nTC_PMIS_SA_2.0.2.4\r\nTC_PMIS_SA_2.0.2.5\r\nTC_PMIS_SA_2.0.2.6\r\nTC_PMIS_SA_2.0.2.7\r\nTC_PMIS_SA_2.0.2.8\r\nTC_PMIS_SA_2.0.2.9\r\nTC_PMIS_SA_2.0.2.10\r\nTC_PMIS_SA_2.0.2.10.1\r\nTC_PMIS_SA_2.0.2.10.2\r\nTC_PMIS_SA_2.0.2.10.3\r\nTC_PMIS_SA_2.0.2.10.4\r\nTC_PMIS_SA_2.0.2.10.5\r\nTC_PMIS_SA_2.0.2.10.6\r\nTC_PMIS_SA_2.0.2.10.7\r\nTC_PMIS_SA_2.0.3\r\nTC_PMIS_SA_2.0.4\r\nTC_PMIS_SA_2.0.5\r\nTC_PMIS_SA_2.0.5.1\r\nTC_PMIS_SA_2.0.5.2\r\nTC_PMIS_SA_2.0.5.3\r\nTC_PMIS_SA_2.0.5.4\r\nTC_PMIS_SA_2.0.6\r\nTC_PMIS_SA_2.0.7\r\nTC_PMIS_SA_2.0.8\r\nTC_PMIS_SA_2.0.9\r\nTC_PMIS_SA_2.1', '4', NULL, NULL, NULL),
(233, 'Create ERD', NULL, 146, NULL, '2020-06-04 00:00:00', '2020-10-04 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, '25', NULL, NULL, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(234, 'Framework User Interface Design', NULL, 146, NULL, '2020-06-04 00:00:00', '2020-10-04 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, '25', NULL, NULL, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(235, 'Coding', NULL, 146, NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', NULL, NULL, NULL, '50', NULL, NULL, '50', NULL, NULL, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(236, 'Code and Debug', NULL, 147, NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, '100', NULL, NULL, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(237, '1. Created and sent Bug report to developer', NULL, 148, NULL, '2020-04-13 00:00:00', '2020-04-17 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LIB_BUG_REPORT#1_08042020.docx', NULL, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(238, '1. Created Additional Test Cases for Super Admin Account - LIB:\r\n\r\n- Maintenance and Other Operating Expenses (MOOE)Direct and Indirect Cost\r\n\r\n- Capital Outlays (CO) - Direct and Indirect Cost', NULL, 149, NULL, '2020-04-13 00:00:00', '2020-04-17 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test Cases Attached', NULL, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(239, '1. Created PMIS v4.0 Test cases - Phase 1 for the following accounts:\r\n- Project Manager\r\n- Project Leader\r\n- Super Admin\r\n- Admin Account', NULL, 150, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test Cases Attachments:\r\n\r\nProject Manager Account -  27 Test cases\r\n\r\nProject Leader Account -  26 test cases\r\n\r\nSuper Admin Account - 28 Test cases\r\n\r\nAdmin Account - 27 Test Cases\r\n\r\nProject_Leader_restrictions.docx', NULL, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(240, '2. Studied the restrictions and capabilities of Project Leader and FAD account in PMIS v4.0', NULL, 151, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Project_Leader_restrictions.docx', NULL, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(241, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 152, NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TC_PMIS_SA_1.0,\r\nTC_PMIS_SA_1.1,\r\nTC_PMIS_SA_1.2,\r\nTC_PMIS_SA_1.10,', NULL, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(242, 'Sample', NULL, 153, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sample', NULL, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(243, '1. Created PMIS v4.0 Test cases - Phase 1 for the following accounts:\r\n- Project Manager\r\n- Project Leader\r\n- Super Admin\r\n- Admin Account', NULL, 154, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '25', 'Test Cases Attachments:\r\n\r\nProject Manager Account -  27 Test cases\r\n\r\nProject Leader Account -  26 test cases\r\n\r\nSuper Admin Account - 28 Test cases\r\n\r\nAdmin Account - 27 Test Cases', NULL, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(244, '2. HRMIS v10 Test Plan and Test Cases\r\n- Employee Account\r\n- Finance Account\r\n- Officer Account \r\n- Executive Account', NULL, 154, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '25', 'Project_Leader_restrictions.docx', NULL, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(245, 'No task assigned for this week', NULL, 155, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '50', 'No task assigned for this week', NULL, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(246, 'No assigned Task for this week', NULL, 156, NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(247, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 156, NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 00:30:38', '2020-04-20 00:30:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(248, '1. Created PMIS v4.0 Test cases - Phase 1 for the following accounts:\r\n- Project Manager\r\n- Project Leader\r\n- Super Admin\r\n- Admin Account', NULL, 157, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', '0', NULL, NULL, NULL, NULL, NULL, NULL, 'Test Cases Attachments:\r\n\r\nProject Manager Account -  27 Test cases\r\n\r\nProject Leader Account -  26 test cases\r\n\r\nSuper Admin Account - 28 Test cases\r\n\r\nAdmin Account - 27 Test Cases', NULL, '2020-04-20 01:22:18', '2020-04-20 09:02:26', NULL, NULL, NULL, '<p>sample</p>', NULL, NULL, NULL, NULL),
(249, '2. Studied the restrictions and capabilities of Project Leader and FAD account in PMIS v4.0', NULL, 157, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', '0', NULL, NULL, NULL, NULL, NULL, NULL, 'Project_Leader_restrictions.docx', NULL, '2020-04-20 01:22:48', '2020-04-20 09:02:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(250, 'No task assigned for this week', NULL, 158, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No task assigned for this week', NULL, '2020-04-20 01:23:30', '2020-04-20 01:23:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(251, 'No task assigned for this week', NULL, 159, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No task assigned for this week', 'Sample Only', '2020-04-20 01:24:29', '2020-04-20 01:50:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(252, '1. Create Test Cases for \r\nFAD - Phase 1\r\n\r\n2. Created HRMISv10 \r\nEmployee Account Test Plan\r\n-	Purpose\r\n-	Project Overview\r\n-	Audience\r\n-	Scopes and Levels of Testing\r\n-	Test Effort Estimate\r\n-	Defect Tracking and Reporting', NULL, 157, NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', '0', NULL, NULL, NULL, NULL, NULL, NULL, '* Test Cases ID:\r\nTC_PMIS_FAD_1.0 to TC_PMIS_FAD_1.5, \r\n\r\nTC_PMIS_FAD_2.0.1 to TC_PMIS_FAD_2.0.9, \r\n\r\nTC_PMIS_FAD_2.0.2.1 to TC_PMIS_FAD_2.0.2.10\r\n\r\n*Test_Plan_v1_HRMIS - Employee_Account.docx', NULL, '2020-04-20 01:26:06', '2020-04-20 09:02:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(253, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 159, NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test Cases Executed:\r\n\r\nTC_PMIS_SA_1.0,\r\nTC_PMIS_SA_1.1,\r\nTC_PMIS_SA_1.2,\r\nTC_PMIS_SA_1.10,', NULL, '2020-04-20 01:26:47', '2020-04-20 01:50:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(254, 'Sample', NULL, 160, NULL, '2020-03-02 00:00:00', '2020-04-21 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sample Only', NULL, '2020-04-20 02:36:19', '2020-04-20 02:36:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(255, 'Sample', NULL, 161, NULL, '2020-03-02 00:00:00', '2020-04-21 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sample Only', NULL, '2020-04-20 02:36:52', '2020-04-20 02:36:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(256, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 162, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', '0', NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 03:20:51', '2020-04-20 05:07:07', NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', '<p>Test Cases Executed: TC_PMIS_SA_1.0, TC_PMIS_SA_1.1, TC_PMIS_SA_1.2, TC_PMIS_SA_1.10,</p>', '2', NULL, NULL, NULL),
(257, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 163, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 03:47:02', '2020-04-20 04:33:37', NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', 'Test Cases Executed:\r\n\r\nTC_PMIS_SA_1.0,\r\nTC_PMIS_SA_1.1,\r\nTC_PMIS_SA_1.2,\r\nTC_PMIS_SA_1.10,', '2', NULL, NULL, NULL),
(258, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 164, NULL, '2020-01-04 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 05:01:38', '2020-04-20 05:01:38', NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', '<p>Test Cases Executed: TC_PMIS_SA_1.0, TC_PMIS_SA_1.1, TC_PMIS_SA_1.2, TC_PMIS_SA_1.10,</p>', '4', NULL, NULL, NULL),
(259, 'Test Case Execution for Super Admin use - view functionality:\r\n\r\n- All Projects\r\n- Dashboard\r\n- Project Details\r\n- Task Tab\r\n- Evaluations tab\r\n- Financials tab\r\n- Technical Tab\r\n- Research Database\r\n- Updates\r\n- Files', NULL, 164, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 05:01:38', '2020-04-20 05:01:38', NULL, '2020-03-30 00:00:00', '2020-04-03 00:00:00', 'Test Cases Executed:\r\n\r\nTC_PMIS_SA_2.0\r\nTC_PMIS_SA_2.0.1\r\nTC_PMIS_SA_2.0.2\r\nTC_PMIS_SA_2.0.2.1\r\nTC_PMIS_SA_2.0.2.2\r\nTC_PMIS_SA_2.0.2.3\r\nTC_PMIS_SA_2.0.2.4\r\nTC_PMIS_SA_2.0.2.5\r\nTC_PMIS_SA_2.0.2.6\r\nTC_PMIS_SA_2.0.2.7\r\nTC_PMIS_SA_2.0.2.8\r\nTC_PMIS_SA_2.0.2.9\r\nTC_PMIS_SA_2.0.2.10\r\nTC_PMIS_SA_2.0.2.10.1\r\nTC_PMIS_SA_2.0.2.10.2\r\nTC_PMIS_SA_2.0.2.10.3\r\nTC_PMIS_SA_2.0.2.10.4\r\nTC_PMIS_SA_2.0.2.10.5\r\nTC_PMIS_SA_2.0.2.10.6\r\nTC_PMIS_SA_2.0.2.10.7\r\nTC_PMIS_SA_2.0.3\r\nTC_PMIS_SA_2.0.4\r\nTC_PMIS_SA_2.0.5\r\nTC_PMIS_SA_2.0.5.1\r\nTC_PMIS_SA_2.0.5.2\r\nTC_PMIS_SA_2.0.5.3\r\nTC_PMIS_SA_2.0.5.4\r\nTC_PMIS_SA_2.0.6\r\nTC_PMIS_SA_2.0.7\r\nTC_PMIS_SA_2.0.8\r\nTC_PMIS_SA_2.0.9\r\nTC_PMIS_SA_2.1', '4', NULL, NULL, NULL),
(260, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 165, NULL, '2020-01-04 00:00:00', '1970-01-01 00:00:00', '0', NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 05:07:07', '2020-04-20 06:01:43', NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', '<p>Test Cases Executed: TC_PMIS_SA_1.0, TC_PMIS_SA_1.1, TC_PMIS_SA_1.2, TC_PMIS_SA_1.10,</p>', '4', NULL, NULL, NULL),
(261, 'Test Case Execution for Super Admin use - view functionality:\r\n\r\n- All Projects\r\n- Dashboard\r\n- Project Details\r\n- Task Tab\r\n- Evaluations tab\r\n- Financials tab\r\n- Technical Tab\r\n- Research Database\r\n- Updates\r\n- Files', NULL, 165, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', '0', NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 05:07:07', '2020-04-20 06:01:43', NULL, '2020-03-30 00:00:00', '2020-04-03 00:00:00', '<p>Test Cases Executed: TC_PMIS_SA_2.0 TC_PMIS_SA_2.0.1 TC_PMIS_SA_2.0.2 TC_PMIS_SA_2.0.2.1 TC_PMIS_SA_2.0.2.2 TC_PMIS_SA_2.0.2.3 TC_PMIS_SA_2.0.2.4 TC_PMIS_SA_2.0.2.5 TC_PMIS_SA_2.0.2.6 TC_PMIS_SA_2.0.2.7 TC_PMIS_SA_2.0.2.8 TC_PMIS_SA_2.0.2.9 TC_PMIS_SA_2.0.2.10 TC_PMIS_SA_2.0.2.10.1 TC_PMIS_SA_2.0.2.10.2 TC_PMIS_SA_2.0.2.10.3 TC_PMIS_SA_2.0.2.10.4 TC_PMIS_SA_2.0.2.10.5 TC_PMIS_SA_2.0.2.10.6 TC_PMIS_SA_2.0.2.10.7 TC_PMIS_SA_2.0.3 TC_PMIS_SA_2.0.4 TC_PMIS_SA_2.0.5 TC_PMIS_SA_2.0.5.1 TC_PMIS_SA_2.0.5.2 TC_PMIS_SA_2.0.5.3 TC_PMIS_SA_2.0.5.4 TC_PMIS_SA_2.0.6 TC_PMIS_SA_2.0.7 TC_PMIS_SA_2.0.8 TC_PMIS_SA_2.0.9 TC_PMIS_SA_2.1</p>', '4', NULL, NULL, NULL),
(262, 'Sample Only', NULL, 166, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', '0', NULL, NULL, '50', NULL, NULL, NULL, 'Sample Only', NULL, '2020-04-20 06:22:38', '2020-04-23 10:39:43', NULL, '2020-04-20 00:00:00', '2020-04-24 00:00:00', '<p>This is an already APPROVED accomplishment but user can still EDIT the \'ACTUAL PERIOD\' which might cause issue</p>', '2', NULL, 'What are the changes?', NULL),
(263, 'Sample Only', NULL, 167, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', '0', NULL, NULL, '100', NULL, NULL, NULL, 'Sample Only', NULL, '2020-04-20 06:22:58', '2020-04-23 09:05:13', NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', '<p>This is a sample Verification</p>', '4', NULL, NULL, NULL),
(264, 'Sample Only', NULL, 168, NULL, '2020-01-04 00:00:00', '1970-01-01 00:00:00', '0', NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 08:43:13', '2020-04-20 08:43:58', NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', '<p>This is a sample Verification</p>', '4', NULL, NULL, NULL),
(265, 'Sample Only Number 2', NULL, 168, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', '0', NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 08:43:13', '2020-04-20 08:43:58', NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', '<p>Sample 2</p>', '4', NULL, NULL, NULL),
(266, '1. Created PMIS v4.0 Test cases - Phase 1 for the following accounts:- Project Manager- Project Leader- Super Admin- Admin Account', NULL, 169, NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 08:59:39', '2020-04-20 08:59:39', NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '<p>sample</p>', '4', NULL, NULL, NULL),
(267, '2. Studied the restrictions and capabilities of Project Leader and FAD account in PMIS v4.0', NULL, 169, NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 08:59:39', '2020-04-20 08:59:39', NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '4', NULL, NULL, NULL),
(268, '1. Create Test Cases for FAD - Phase 12. Created HRMISv10 Employee Account Test Plan-	Purpose-	Project Overview-	Audience-	Scopes and Levels of Testing-	Test Effort Estimate-	Defect Tracking and Reporting', NULL, 169, NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 08:59:39', '2020-04-20 08:59:39', NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '4', NULL, NULL, NULL),
(269, '1. Created Additional Test Cases for Super Admin Account - LIB:\r\n\r\n- Progress report\r\n- MOA Files\r\n- Framework Files \r\n- Personal Service (PS) direct and in-direct LIB items', NULL, 169, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 08:59:39', '2020-04-20 08:59:39', NULL, '2020-04-06 00:00:00', '2020-04-08 00:00:00', 'TEST CASE ID:\r\n- TC_PMIS_SA_2.0.6.1\r\n- TC_PMIS_SA_2.0.6.2\r\n- TC_PMIS_SA_2.0.6.3\r\n- TC_PMIS_SA_2.0.5.1.0\r\n- TC_PMIS_SA_2.0.5.1.0.1\r\n- TC_PMIS_SA_2.0.5.1.0.2\r\n- TC_PMIS_SA_2.0.5.1.0.3\r\n- TC_PMIS_SA_2.0.5.1.1\r\n- TC_PMIS_SA_2.0.5.1.1.1\r\n- TC_PMIS_SA_2.0.5.1.1.2\r\n- TC_PMIS_SA_2.0.5.1.1.3', '4', NULL, NULL, NULL),
(270, 'Create ERD', NULL, 170, NULL, '2020-06-04 00:00:00', '2020-10-04 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, '25', NULL, NULL, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(271, 'Framework User Interface Design', NULL, 170, NULL, '2020-06-04 00:00:00', '2020-10-04 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, '25', NULL, NULL, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(272, 'Coding', NULL, 170, NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', NULL, NULL, NULL, '50', NULL, NULL, '50', NULL, NULL, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(273, 'Code and Debug', NULL, 171, NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, '100', NULL, NULL, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(274, '1. Created and sent Bug report to developer', NULL, 172, NULL, '2020-04-13 00:00:00', '2020-04-17 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LIB_BUG_REPORT#1_08042020.docx', NULL, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(275, '1. Created Additional Test Cases for Super Admin Account - LIB:\r\n\r\n- Maintenance and Other Operating Expenses (MOOE)Direct and Indirect Cost\r\n\r\n- Capital Outlays (CO) - Direct and Indirect Cost', NULL, 173, NULL, '2020-04-13 00:00:00', '2020-04-17 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test Cases Attached', NULL, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(276, '1. Created PMIS v4.0 Test cases - Phase 1 for the following accounts:\r\n- Project Manager\r\n- Project Leader\r\n- Super Admin\r\n- Admin Account', NULL, 174, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test Cases Attachments:\r\n\r\nProject Manager Account -  27 Test cases\r\n\r\nProject Leader Account -  26 test cases\r\n\r\nSuper Admin Account - 28 Test cases\r\n\r\nAdmin Account - 27 Test Cases\r\n\r\nProject_Leader_restrictions.docx', NULL, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(277, '2. Studied the restrictions and capabilities of Project Leader and FAD account in PMIS v4.0', NULL, 175, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Project_Leader_restrictions.docx', NULL, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(278, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 176, NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TC_PMIS_SA_1.0,\r\nTC_PMIS_SA_1.1,\r\nTC_PMIS_SA_1.2,\r\nTC_PMIS_SA_1.10,', NULL, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(279, 'Sample', NULL, 177, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sample', NULL, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(280, '1. Created PMIS v4.0 Test cases - Phase 1 for the following accounts:\r\n- Project Manager\r\n- Project Leader\r\n- Super Admin\r\n- Admin Account', NULL, 178, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '25', 'Test Cases Attachments:\r\n\r\nProject Manager Account -  27 Test cases\r\n\r\nProject Leader Account -  26 test cases\r\n\r\nSuper Admin Account - 28 Test cases\r\n\r\nAdmin Account - 27 Test Cases', NULL, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(281, '2. HRMIS v10 Test Plan and Test Cases\r\n- Employee Account\r\n- Finance Account\r\n- Officer Account \r\n- Executive Account', NULL, 178, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '25', 'Project_Leader_restrictions.docx', NULL, '2020-04-20 09:13:48', '2020-04-20 09:13:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(282, 'No task assigned for this week', NULL, 179, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '50', 'No task assigned for this week', NULL, '2020-04-20 09:13:49', '2020-04-20 09:13:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(283, 'No assigned Task for this week', NULL, 180, NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 09:13:49', '2020-04-20 09:13:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(284, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 180, NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 09:13:49', '2020-04-20 09:13:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(285, '1. Created PMIS v4.0 Test cases - Phase 1 for the following accounts:\r\n- Project Manager\r\n- Project Leader\r\n- Super Admin\r\n- Admin Account', NULL, 181, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test Cases Attachments:\r\n\r\nProject Manager Account -  27 Test cases\r\n\r\nProject Leader Account -  26 test cases\r\n\r\nSuper Admin Account - 28 Test cases\r\n\r\nAdmin Account - 27 Test Cases', NULL, '2020-04-20 09:13:49', '2020-04-20 09:13:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(286, '2. Studied the restrictions and capabilities of Project Leader and FAD account in PMIS v4.0', NULL, 181, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Project_Leader_restrictions.docx', NULL, '2020-04-20 09:13:49', '2020-04-20 09:13:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(287, '1. Create Test Cases for \r\nFAD - Phase 1\r\n\r\n2. Created HRMISv10 \r\nEmployee Account Test Plan\r\n-	Purpose\r\n-	Project Overview\r\n-	Audience\r\n-	Scopes and Levels of Testing\r\n-	Test Effort Estimate\r\n-	Defect Tracking and Reporting', NULL, 181, NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '* Test Cases ID:\r\nTC_PMIS_FAD_1.0 to TC_PMIS_FAD_1.5, \r\n\r\nTC_PMIS_FAD_2.0.1 to TC_PMIS_FAD_2.0.9, \r\n\r\nTC_PMIS_FAD_2.0.2.1 to TC_PMIS_FAD_2.0.2.10\r\n\r\n*Test_Plan_v1_HRMIS - Employee_Account.docx', NULL, '2020-04-20 09:13:49', '2020-04-20 09:13:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(288, 'No task assigned for this week', NULL, 182, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No task assigned for this week', NULL, '2020-04-20 09:13:49', '2020-04-20 09:13:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(289, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 183, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 09:13:49', '2020-04-20 09:13:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(290, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 184, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 09:13:49', '2020-04-20 09:13:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(291, '1.) Updated the Calendar of Ms. Grace', NULL, 185, NULL, '2020-01-01 00:00:00', '2020-06-30 00:00:00', '0', NULL, NULL, NULL, NULL, NULL, '100', 'Outlook Calendar', NULL, '2020-04-20 09:17:44', '2020-04-20 09:23:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(292, '1.) Updated the Calendar of Ms. Grace', NULL, 186, NULL, '2020-01-01 00:00:00', '1970-01-01 00:00:00', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 09:23:30', '2020-04-20 09:30:51', NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL),
(293, 'Meeting of Ms. Grace regarding WFH Accomplishments System', NULL, 186, NULL, '2020-01-01 00:00:00', '2020-06-30 00:00:00', '0', NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 09:23:30', '2020-04-20 09:30:51', NULL, '2020-04-06 00:00:00', '2020-04-08 00:00:00', '<p>Outlook Email and Teams</p>', '2', NULL, NULL, NULL),
(294, '1.) Updated the Calendar of Ms. Grace', NULL, 187, NULL, '2020-01-01 00:00:00', '1970-01-01 00:00:00', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 09:30:51', '2020-04-20 09:45:57', NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '2', NULL, NULL, NULL),
(295, 'Meeting of Ms. Grace regarding WFH Accomplishments System', NULL, 187, NULL, '2020-01-01 00:00:00', '1970-01-01 00:00:00', '0', NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 09:30:51', '2020-04-20 09:45:59', NULL, '2020-04-06 00:00:00', '2020-04-08 00:00:00', '<p>Outlook Email and Teams</p>', '2', NULL, NULL, NULL),
(296, 'Policy Meeting with Division Chief', NULL, 187, NULL, '2020-01-01 00:00:00', '2020-06-30 00:00:00', '0', NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 09:30:51', '2020-04-20 09:45:59', NULL, '2020-04-13 00:00:00', '2020-04-17 00:00:00', '<p>Facebook Messenger</p>', '2', NULL, NULL, NULL),
(297, '- Action taken, as assigned -Monitoring of record sheet and daily acitvities - Monitoring of documents to be routed thru email/actual', NULL, 188, NULL, '2020-01-01 00:00:00', '2020-06-30 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 09:36:34', '2020-04-20 09:39:31', NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', 'Verified', '2', NULL, NULL, NULL),
(298, '1.) Updated the Calendar of Ms. Grace', NULL, 189, NULL, '2020-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 09:45:59', '2020-04-20 09:45:59', NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '4', NULL, NULL, NULL),
(299, 'Meeting of Ms. Grace regarding WFH Accomplishments System', NULL, 189, NULL, '2020-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 09:45:59', '2020-04-20 09:45:59', NULL, '2020-04-06 00:00:00', '2020-04-08 00:00:00', '<p>Outlook Email and Teams</p>', '4', NULL, NULL, NULL),
(300, 'Policy Meeting with Division Chief', NULL, 189, NULL, '2020-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 09:45:59', '2020-04-20 09:45:59', NULL, '2020-04-13 00:00:00', '2020-04-17 00:00:00', '<p>Facebook Messenger</p>', '4', NULL, NULL, NULL),
(301, 'Updated the Calendar of Ms. Grace', NULL, 189, NULL, '2020-01-01 00:00:00', '2020-06-30 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-20 09:45:59', '2020-04-20 09:45:59', NULL, '2020-03-30 00:00:00', '2020-04-03 00:00:00', 'Outlook Calendar', '4', NULL, NULL, NULL),
(302, 'This is a sample percentage tasgs', NULL, 190, NULL, '2020-01-01 00:00:00', '2020-06-30 00:00:00', '0', NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-23 08:21:31', '2020-04-23 09:27:04', NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', 'Sample verification only', '2', NULL, NULL, NULL),
(303, 'Sample Only', NULL, 191, NULL, '2020-01-04 00:00:00', '1970-01-01 00:00:00', '0', NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-23 09:05:13', '2020-04-24 03:13:32', NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', '<p>This is a sample Verification</p>', '2', NULL, 'Sample', NULL),
(304, 'Another exxample for % Accounting Reports submitted on time with minor error.. Another exxample for % Accounting Reports submitted on time with minor error..Another exxample for % Accounting Reports submitted on time with minor error..Another exxample for % Accounting Reports submitted on time with minor error..Another exxample for % Accounting Reports submitted on time with minor error..Another exxample for % Accounting Reports submitted on time with minor error..Another exxample for % Accounting Reports submitted on time with minor error..Another exxample for % Accounting Reports submitted on time with minor error..', NULL, 191, NULL, '2020-01-01 00:00:00', '2020-06-30 00:00:00', '0', NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-23 09:05:13', '2020-04-24 03:13:32', NULL, '2020-04-13 00:00:00', '2020-04-17 00:00:00', 'Another exxample for % Accounting Reports submitted on time with minor error..', '4', NULL, 'SAmple', NULL),
(305, 'Sample Only', NULL, 192, NULL, '2020-01-04 00:00:00', '1970-01-01 00:00:00', '0', NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-23 09:56:36', '2020-04-24 02:03:40', NULL, '2020-04-13 00:00:00', '2020-04-17 00:00:00', '<p>This is a sample ONLY.&nbsp;</p>', '4', NULL, NULL, NULL),
(306, 'Another example task for this target', NULL, 192, NULL, '2020-01-01 00:00:00', '2020-06-30 00:00:00', '0', NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-23 09:56:36', '2020-04-24 01:44:46', NULL, '2020-04-20 00:00:00', '2020-04-24 00:00:00', '<p>Tried to OPEN the new Accomplishment (not yet submitted&nbsp; for verification) in EDIT MODE..</p>', '2', NULL, NULL, NULL),
(307, 'Sample Only', NULL, 193, NULL, '2020-01-04 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, '50', NULL, NULL, NULL, NULL, NULL, '2020-04-23 10:39:43', '2020-04-24 01:44:46', NULL, '2020-04-20 00:00:00', '2020-04-24 00:00:00', '<p>This is an already APPROVED accomplishment but user can still EDIT the \'ACTUAL PERIOD\' which might cause issue</p>', '2', NULL, NULL, NULL),
(308, '3rd Sample for No. of performance review summary prepared within fifteen (15) days after the set deadline of IPCR/DPCR submission', NULL, 193, NULL, '2020-01-01 00:00:00', '2020-06-30 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-23 10:39:43', '2020-04-24 01:44:46', NULL, '2020-04-20 00:00:00', '2020-04-24 00:00:00', 'Another sample', '2', NULL, NULL, NULL),
(309, 'This is a sample task for Learning development implemented, should be 100 percent', NULL, 194, NULL, '2020-01-01 00:00:00', '2020-06-30 00:00:00', '0', NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-23 10:52:31', '2020-04-24 01:44:46', NULL, '2020-04-20 00:00:00', '2020-04-24 00:00:00', '<p>This is already VERIFIED by the Sr. SRS and is for APPROVAL, however, I\'ve made changes on this section and should submit again for VERIFICATION, thus, this should NOT be reflected to APPROVAL data yet as this is still subject for VERIFICATION.</p>', '2', NULL, 'This should NOT BE EDIT when Submitted for APPROVAL', 'How will the STANDARD USER see the comments from SR. SRS and Division Chief??'),
(310, '4 positions filled', NULL, 195, NULL, '2020-01-01 00:00:00', '2020-06-30 00:00:00', '0', NULL, NULL, '100', NULL, NULL, '50', NULL, NULL, '2020-04-23 11:57:55', '2020-04-24 01:10:12', NULL, '2020-01-06 00:00:00', '2020-04-17 00:00:00', '<p>Contract signed</p>', '2', NULL, 'Please attached the resume of these personnel', NULL),
(311, '4 positions filled', NULL, 196, NULL, '2020-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-24 01:10:12', '2020-04-24 02:22:34', NULL, '2020-01-06 00:00:00', '2020-04-17 00:00:00', '<p>Contract signed</p>', '2', NULL, NULL, NULL),
(312, '1 position filled', NULL, 196, NULL, '2020-01-01 00:00:00', '2020-06-30 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-24 01:10:12', '2020-04-24 02:22:34', NULL, '2020-04-13 00:00:00', '2020-04-17 00:00:00', 'New accomplishment', '4', NULL, NULL, NULL),
(313, 'Create ERD', NULL, 197, NULL, '2020-06-04 00:00:00', '2020-10-04 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, '25', NULL, NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(314, 'Framework User Interface Design', NULL, 197, NULL, '2020-06-04 00:00:00', '2020-10-04 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, '25', NULL, NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(315, 'Coding', NULL, 197, NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', NULL, NULL, NULL, '50', NULL, NULL, '50', NULL, NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(316, 'Code and Debug', NULL, 198, NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, '100', NULL, NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(317, '1. Created and sent Bug report to developer', NULL, 199, NULL, '2020-04-13 00:00:00', '2020-04-17 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LIB_BUG_REPORT#1_08042020.docx', NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(318, '1. Created Additional Test Cases for Super Admin Account - LIB:\r\n\r\n- Maintenance and Other Operating Expenses (MOOE)Direct and Indirect Cost\r\n\r\n- Capital Outlays (CO) - Direct and Indirect Cost', NULL, 200, NULL, '2020-04-13 00:00:00', '2020-04-17 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test Cases Attached', NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(319, '1. Created PMIS v4.0 Test cases - Phase 1 for the following accounts:\r\n- Project Manager\r\n- Project Leader\r\n- Super Admin\r\n- Admin Account', NULL, 201, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test Cases Attachments:\r\n\r\nProject Manager Account -  27 Test cases\r\n\r\nProject Leader Account -  26 test cases\r\n\r\nSuper Admin Account - 28 Test cases\r\n\r\nAdmin Account - 27 Test Cases\r\n\r\nProject_Leader_restrictions.docx', NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(320, '2. Studied the restrictions and capabilities of Project Leader and FAD account in PMIS v4.0', NULL, 202, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Project_Leader_restrictions.docx', NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(321, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 203, NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TC_PMIS_SA_1.0,\r\nTC_PMIS_SA_1.1,\r\nTC_PMIS_SA_1.2,\r\nTC_PMIS_SA_1.10,', NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(322, 'Sample', NULL, 204, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sample', NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tasks55` (`id`, `name`, `description`, `targets55_id`, `color`, `duration_s`, `duration_e`, `percent`, `order`, `parent_id`, `percent_completed`, `created_by`, `active`, `weight`, `means_verification`, `evaluation`, `created_at`, `updated_at`, `deleted_at`, `actualdate_s`, `actualdate_e`, `actual_verification`, `status_id`, `evaluation_divhead`, `senior_accomplishmentremarks`, `chief_accomplishmentremarks`) VALUES
(323, '1. Created PMIS v4.0 Test cases - Phase 1 for the following accounts:\r\n- Project Manager\r\n- Project Leader\r\n- Super Admin\r\n- Admin Account', NULL, 205, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '25', 'Test Cases Attachments:\r\n\r\nProject Manager Account -  27 Test cases\r\n\r\nProject Leader Account -  26 test cases\r\n\r\nSuper Admin Account - 28 Test cases\r\n\r\nAdmin Account - 27 Test Cases', NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(324, '2. HRMIS v10 Test Plan and Test Cases\r\n- Employee Account\r\n- Finance Account\r\n- Officer Account \r\n- Executive Account', NULL, 205, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '25', 'Project_Leader_restrictions.docx', NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(325, 'No task assigned for this week', NULL, 206, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '50', 'No task assigned for this week', NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(326, 'No assigned Task for this week', NULL, 207, NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(327, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 207, NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(328, '1. Created PMIS v4.0 Test cases - Phase 1 for the following accounts:\r\n- Project Manager\r\n- Project Leader\r\n- Super Admin\r\n- Admin Account', NULL, 208, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test Cases Attachments:\r\n\r\nProject Manager Account -  27 Test cases\r\n\r\nProject Leader Account -  26 test cases\r\n\r\nSuper Admin Account - 28 Test cases\r\n\r\nAdmin Account - 27 Test Cases', NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(329, '2. Studied the restrictions and capabilities of Project Leader and FAD account in PMIS v4.0', NULL, 208, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Project_Leader_restrictions.docx', NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(330, '1. Create Test Cases for \r\nFAD - Phase 1\r\n\r\n2. Created HRMISv10 \r\nEmployee Account Test Plan\r\n-	Purpose\r\n-	Project Overview\r\n-	Audience\r\n-	Scopes and Levels of Testing\r\n-	Test Effort Estimate\r\n-	Defect Tracking and Reporting', NULL, 208, NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '* Test Cases ID:\r\nTC_PMIS_FAD_1.0 to TC_PMIS_FAD_1.5, \r\n\r\nTC_PMIS_FAD_2.0.1 to TC_PMIS_FAD_2.0.9, \r\n\r\nTC_PMIS_FAD_2.0.2.1 to TC_PMIS_FAD_2.0.2.10\r\n\r\n*Test_Plan_v1_HRMIS - Employee_Account.docx', NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(331, 'No task assigned for this week', NULL, 209, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No task assigned for this week', NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(332, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 210, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(333, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 211, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(334, '1.) Updated the Calendar of Ms. Grace', NULL, 212, NULL, '2020-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(335, 'Meeting of Ms. Grace regarding WFH Accomplishments System', NULL, 212, NULL, '2020-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(336, 'Policy Meeting with Division Chief', NULL, 212, NULL, '2020-01-01 00:00:00', '2020-06-30 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(337, '- Action taken, as assigned -Monitoring of record sheet and daily acitvities - Monitoring of documents to be routed thru email/actual', NULL, 213, NULL, '2020-01-01 00:00:00', '2020-06-30 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-28 00:09:21', '2020-04-28 00:09:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(338, 'Create ERD', NULL, 214, NULL, '2020-06-04 00:00:00', '2020-10-04 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, '25', NULL, NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(339, 'Framework User Interface Design', NULL, 214, NULL, '2020-06-04 00:00:00', '2020-10-04 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, '25', NULL, NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(340, 'Coding', NULL, 214, NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', NULL, NULL, NULL, '50', NULL, NULL, '50', NULL, NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(341, 'Code and Debug', NULL, 215, NULL, '2020-04-06 00:00:00', '2020-04-10 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, '100', NULL, NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(342, '1. Created and sent Bug report to developer', NULL, 216, NULL, '2020-04-13 00:00:00', '2020-04-17 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LIB_BUG_REPORT#1_08042020.docx', NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(343, '1. Created Additional Test Cases for Super Admin Account - LIB:\r\n\r\n- Maintenance and Other Operating Expenses (MOOE)Direct and Indirect Cost\r\n\r\n- Capital Outlays (CO) - Direct and Indirect Cost', NULL, 217, NULL, '2020-04-13 00:00:00', '2020-04-17 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test Cases Attached', NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(344, '1. Created PMIS v4.0 Test cases - Phase 1 for the following accounts:\r\n- Project Manager\r\n- Project Leader\r\n- Super Admin\r\n- Admin Account', NULL, 218, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test Cases Attachments:\r\n\r\nProject Manager Account -  27 Test cases\r\n\r\nProject Leader Account -  26 test cases\r\n\r\nSuper Admin Account - 28 Test cases\r\n\r\nAdmin Account - 27 Test Cases\r\n\r\nProject_Leader_restrictions.docx', NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(345, '2. Studied the restrictions and capabilities of Project Leader and FAD account in PMIS v4.0', NULL, 219, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Project_Leader_restrictions.docx', NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(346, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 220, NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TC_PMIS_SA_1.0,\r\nTC_PMIS_SA_1.1,\r\nTC_PMIS_SA_1.2,\r\nTC_PMIS_SA_1.10,', NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(347, 'Sample', NULL, 221, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sample', NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(348, '1. Created PMIS v4.0 Test cases - Phase 1 for the following accounts:\r\n- Project Manager\r\n- Project Leader\r\n- Super Admin\r\n- Admin Account', NULL, 222, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '25', 'Test Cases Attachments:\r\n\r\nProject Manager Account -  27 Test cases\r\n\r\nProject Leader Account -  26 test cases\r\n\r\nSuper Admin Account - 28 Test cases\r\n\r\nAdmin Account - 27 Test Cases', NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(349, '2. HRMIS v10 Test Plan and Test Cases\r\n- Employee Account\r\n- Finance Account\r\n- Officer Account \r\n- Executive Account', NULL, 222, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '25', 'Project_Leader_restrictions.docx', NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(350, 'No task assigned for this week', NULL, 223, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '50', 'No task assigned for this week', NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(351, 'No assigned Task for this week', NULL, 224, NULL, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(352, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 224, NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(353, '1. Created PMIS v4.0 Test cases - Phase 1 for the following accounts:\r\n- Project Manager\r\n- Project Leader\r\n- Super Admin\r\n- Admin Account', NULL, 225, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test Cases Attachments:\r\n\r\nProject Manager Account -  27 Test cases\r\n\r\nProject Leader Account -  26 test cases\r\n\r\nSuper Admin Account - 28 Test cases\r\n\r\nAdmin Account - 27 Test Cases', NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(354, '2. Studied the restrictions and capabilities of Project Leader and FAD account in PMIS v4.0', NULL, 225, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Project_Leader_restrictions.docx', NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(355, '1. Create Test Cases for \r\nFAD - Phase 1\r\n\r\n2. Created HRMISv10 \r\nEmployee Account Test Plan\r\n-	Purpose\r\n-	Project Overview\r\n-	Audience\r\n-	Scopes and Levels of Testing\r\n-	Test Effort Estimate\r\n-	Defect Tracking and Reporting', NULL, 225, NULL, '2020-03-23 00:00:00', '2020-03-27 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '* Test Cases ID:\r\nTC_PMIS_FAD_1.0 to TC_PMIS_FAD_1.5, \r\n\r\nTC_PMIS_FAD_2.0.1 to TC_PMIS_FAD_2.0.9, \r\n\r\nTC_PMIS_FAD_2.0.2.1 to TC_PMIS_FAD_2.0.2.10\r\n\r\n*Test_Plan_v1_HRMIS - Employee_Account.docx', NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(356, 'No task assigned for this week', NULL, 226, NULL, '2020-03-16 00:00:00', '2020-03-20 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No task assigned for this week', NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(357, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 227, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(358, 'Test Case Execution for Super Admin user - Login Functionality Phase 1', NULL, 228, NULL, '2020-04-01 00:00:00', '2020-04-30 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(359, '1.) Updated the Calendar of Ms. Grace', NULL, 229, NULL, '2020-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(360, 'Meeting of Ms. Grace regarding WFH Accomplishments System', NULL, 229, NULL, '2020-01-01 00:00:00', '1970-01-01 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(361, 'Policy Meeting with Division Chief', NULL, 229, NULL, '2020-01-01 00:00:00', '2020-06-30 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(362, '- Action taken, as assigned -Monitoring of record sheet and daily acitvities - Monitoring of documents to be routed thru email/actual', NULL, 230, NULL, '2020-01-01 00:00:00', '2020-06-30 00:00:00', NULL, NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, '2020-04-28 00:10:24', '2020-04-28 00:10:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasksusers55`
--

CREATE TABLE `tasksusers55` (
  `id` int(10) UNSIGNED NOT NULL,
  `tasks55_id` int(11) NOT NULL,
  `users55_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users55`
--

CREATE TABLE `users55` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles55_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users55`
--

INSERT INTO `users55` (`id`, `firstname`, `middlename`, `lastname`, `username`, `email`, `password`, `roles55_id`, `division_id`, `employee_id`, `position`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Maria Hershey', NULL, 'Castro', NULL, 'superadmin@gmail.com', '$2y$10$CNySOL0eRRZ.GTgw3qmr9uMWjbtQvQZ3S7URo1xLMzoLxAyCYmtPu', 3, 1, 17017, NULL, 'WBGMYYpbQsZlArJ6aFfylmim87uvMEVeDA3vLQqRCZZteUYchtxlgAszpQLT', '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(2, 'Client', NULL, NULL, NULL, 'client@email.com', '$2y$10$oAEwimCwoLn9YRh6ZoGDSe11uU50qZCYrQqBKJGbMMrf3.x1rwQIu', 2, 3, NULL, NULL, NULL, '2020-03-26 19:47:00', '2020-03-26 19:47:00', NULL),
(3, 'John Keishner', NULL, 'Romero', 'romeroj', 'keishner.romero@gmail.com', '$2y$10$BTiEsTQYcVUsbJFghO3C4.cSNHZpEKU.Ca5CM7OeXDq83oBVrN1o.', 1, 1, 15013, NULL, 'c2amzsPF97JfjmtkCLwquXY15V8THzOwHjBJ7flHUBFCOBGcM35MCrj0MKdt', '2020-03-30 19:14:30', '2020-04-01 04:33:19', NULL),
(4, 'Grace', NULL, 'Estillore', 'estilloreg', 'gfestillore@gmail.com', '$2y$10$7vDpre243r6CpAQfZcMnCOzN8PaNDfJKnEMZbG69jMGltI.ncNuCe', 4, 1, 10012, NULL, '1Svrxlv7AYD7155iEm9b2Ev9L9Hma2KL4yBQrKOyb0yrpXvvSkndwIc0rTro', '2020-03-30 20:59:07', '2020-03-30 20:59:07', NULL),
(5, 'Mark Anthony', NULL, 'Bathan', 'bathanm', 'markbathan27@gmail.com', '$2y$10$UJbZBzh4IRktGibG9j5LSOxbd64QreBP/0KDzM7FwaX54wXSqIfgS', 1, 1, 15021, NULL, 'dHAoON1p4ME360zw0bIz2DczIt1flhkn5ww1zKMj7it3uIWZdbVk4nOTmOlQ', '2020-03-30 21:16:44', '2020-03-30 21:16:44', NULL),
(6, 'Laarni', NULL, 'Piloton', 'pilotonl', 'laarni.piloton@gmail.com', '$2y$10$xcSjS2X24GTq2uXsIJl9IeYBOJLiF/Z29DpplOFo7M6fqGx.mJ4M.', 1, 5, 10137, NULL, 'v0Vc4asvi532SJgrDoKYsQBrypuG0O3vjJVhlx2Wm7Q2kPMjs41mpoHA3Q8f', '2020-03-30 21:17:42', '2020-03-30 21:17:42', NULL),
(7, 'Carlota', NULL, 'Sancho', 'sanchoc', 'lotasancho@yahoo.com ', '$2y$10$8MoG0d3WTtBiU9cac43uouyqBrnzmfry1sPCZW.xUIw6EeT9.ShEq', 1, 1, 89022, NULL, 'kY8BkX0ZIGU0ipF4h3Xmx4qmsqE44k11tLLf2Nn1LjLLiKw9S4Nn7zjKR4uk', '2020-03-30 21:19:21', '2020-03-30 21:19:21', NULL),
(8, 'Russell', NULL, 'Pili', 'pilirussell', 'russellpili@gmail.com', '$2y$10$6bA8xez0F67JT8aJS1bK8ucUt214dvCRoD2IYPEL8I3bAPX8leyiq', 4, 6, 10020, NULL, 'mRlNqXRyRMwLDo4IAfiYC50bUl3TL2pgbQjte68LuTjQXiOsctoQzn361AHJ', '2020-03-30 21:22:48', '2020-03-30 21:22:48', NULL),
(9, 'Irish Kate', NULL, 'Cerdon', 'cerdoni', '', '$2y$10$pSniHajuRFDDaR9TOAHbPOCfV7L.oVIme2xZixwopZCpcN2.Fk0CK', 3, 2, 18019, NULL, '5zUzeC3Nk1iJ94tY8Esk3HovujU1PXlN2mEOxmNjf7iYRSGdM7P97FHCmEXL', '2020-03-31 10:18:39', '2020-03-31 10:18:39', NULL),
(10, 'Tony Rose ', NULL, 'Tumaneng', 'consignadot', 'tonyrosetumaneng@gmail.com', '$2y$10$W5j3xlChBbMufJh8PkyuEecNvYf2bwVP45xPMXW1VrTy68hteij3q', 1, 1, 13179, NULL, '3v1tst0jmtMdQBYvpsXPz8sI6Y2yqs9DARWs8WPp5hx19uXDIVO3nN3vb6XY', '2020-04-01 00:09:29', '2020-04-01 00:09:29', NULL),
(11, 'Jhon Zylvin', NULL, 'Ramos', 'ramosj', 'ramosjhonzylvin@gmail.com', '$2y$10$XED8eP0J3OPiQXzoumIWBeQYzCHLZ4uuLa29T8.9jfl5xBgN9b4i2', 1, 1, 17020, NULL, 'VftcZxF5USrWUtwOqWu4yWekRyAdimKOqCW6bd6pbKmXlL9Zy7BsqxJf08x2', '2020-04-01 03:06:33', '2020-04-01 04:13:27', NULL),
(12, 'John Ernie', NULL, 'Evalle', 'evallej', 'jeevalle@gmail.com', '$2y$10$ynTUcVi0miDeen3IrYN9DeI5J1aFKL/6bhpUZJB8IcElU5IIHOXD.', 3, 1, 14212, NULL, 'D7VxneNCWLUBZY6dwzq1DaGJR5azf2YWlRl3AXZkiO1jfeoyMLfXmDNbopaU', '2020-04-01 04:30:21', '2020-04-01 04:30:21', NULL),
(13, 'Enrico', NULL, 'Paringit', 'paringite', '', '$2y$10$yc4O3MG9.1v1cM/BpEVI4..HwliFUyWgY.U09xuOrmvOY5lpdHJKO', 6, 9, 19000, NULL, 'JVWJRpuYZfx4wxyAedLVQ5ckFTVfqB0Fgoxy0XcYXaD6T3NeZ8GJ0tSvEcwI', '2020-04-02 22:10:48', '2020-04-02 22:10:48', NULL),
(14, 'Sonia', NULL, 'Cabangon', 'cabangons', 'spc_1914@yahoo.com.ph', '$2y$10$hJQIqoTy/6gOafcp0GjGyulLgOGwS1kweXPPFCfDgiUuyx6vWbJBu', 4, 2, 10003, NULL, '2dVsyCTn5mB2kAwCEtKd5VkIGwSr0t3mt2GnlZKQS7nGhwqDoYWZGaZWpsCv', '2020-04-03 00:25:58', '2020-04-03 00:25:58', NULL),
(15, 'George', NULL, 'Monroyo', 'mongi', 'mongimons@yahoo.com', '$2y$10$LLgym0n3q5NBmkk.AZKIO.WAwrrb93w1BtT4Wpb7rv7i/4BgxDXGO', 7, 1, 13067, NULL, 'k4ucn3rejifoKoCVmxfuSXTWl04rTuRGJAYw4DTlxy1OlbbpsapJzU4HbdC5', '2020-04-03 05:21:45', '2020-04-03 05:21:45', NULL),
(16, 'Raul', NULL, 'Sabularse', 'sabularser', 'raulsabularse@gmail.com', '$2y$10$E4liv/yA6h1dc/Qjj1GkoePQm.fdj01kVIvGHabJlMLaXfWjWCQw.', 6, 9, 10025, NULL, NULL, '2020-04-14 19:33:28', '2020-04-14 19:33:28', NULL),
(17, 'Rodelyn ', NULL, 'Lobo', 'lobor', 'rodelyngalolobo@gmail.com', '$2y$10$a4mNmPOZJh2Vct8d4pi1yeaQwnNc2xizl0iTnKsyN0EuoNBQS8mQ2', 1, 1, 19016, NULL, 'nIEfBVNFKNcgQRwr7DPlRRh5eTvWcDWSyzp7V9WozTLp4iQu78gaFpj82oOL', '2020-04-16 07:05:19', '2020-04-16 07:05:19', NULL),
(19, 'Divina', NULL, 'Almazar', 'dbalmazar', 'vhine05@yahoo.com', '$2y$10$nkdxi6Lw4rz8GmCjJwcdwu4NEmcUsYK49yPQDk515sG25jJbjLzMy', 3, 2, 10101, NULL, 'aOSN7fn7qXQhQLwGuUxxC7BtSQpINHVRar7twINM4KTULuESgOb3BdlnvC3m', '2020-04-20 06:21:37', '2020-04-20 06:21:37', NULL),
(27, 'Ena', NULL, 'Conde', 'condee', 'reiv917@gmail.com', '$2y$10$t43R/Qn9CSdYXw5FmqyDDuRyLfLkwXXGM7cBBiW0sImN9WmNjvJbe', 7, 2, 10006, NULL, 'pa5aHcKiI0M7IDvB2gTRnkknMCEWZmirtD2bvzKcGCSy36j8Pu6M01MswDN7', '2020-04-20 07:45:10', '2020-04-20 07:45:10', NULL),
(28, 'Glenda Dorcas ', NULL, 'Sacbibit', 'sacbibitg', 'gsacbibit@gmail.com', '$2y$10$nzytD2sOmxkunbZ.bJaXK.1wildjuFFS/v9D2YWpeMpukk8JW.Oq6', 7, 7, 13080, NULL, 'W07WQ5TJlYHVLOApBtSuELAMyvTacxsNHO6MxcZE2ek4pxvqanTa9B1zvnSn', '2020-04-20 07:55:09', '2020-04-20 07:55:09', NULL),
(29, 'Marie Christie', NULL, 'Santos', 'santosm', 'mbs8ph@gmail.com', '$2y$10$cQUJsdQ.iMw1VUI2z.aT2eC.TDeIKo7s.51ozccyE9abi4OxDeLJe', 7, 7, 92043, NULL, 'z2XOXxdeHRTKivXuypZkZEI5Y7sbdxm6Y5v9LZ1anqKI0bJBuJvfXb6l8cwK', '2020-04-20 07:56:06', '2020-04-20 07:56:06', NULL),
(30, 'Aileen', NULL, 'Ventura', 'venturaa', 'aylene_15@yahoo.com', '$2y$10$CUx4jGm20iE4KZ5vj24BneGxt74jwGLYkiiZRvBN9bGkaMyayzNri', 7, 2, 6190, NULL, '0s6IrjJp22xBdJRcCGPwhYMKD4Zilspw49kCMpa9rFA60lHftHbfBrcDrYZV', '2020-04-20 08:00:40', '2020-04-20 08:00:40', NULL),
(31, 'Isidro', NULL, 'Querubin', 'querubini', 'cidquerubin@gmail.com', '$2y$10$fi32QTbZwTF0fn4dHh1Zx.85eI.Q3I5lhNHpH5/qAz3dCgDeQgRUK', 7, 2, 10124, NULL, 'E6EYle9MLmXkvopar5FInhP4JhJXt58OwQmD4qwkyqeRwZXmjYc8ClU2Jdjh', '2020-04-20 08:38:36', '2020-04-20 08:38:36', NULL),
(32, 'Joshua Emmanuel', NULL, 'Hagad', 'hagadj', 'JEHagad11@gmail.com', '$2y$10$TGRN0fBAvLd47vfy07F0RORyXMqlI7EX8Q94qJpr1L5uSmJ/Q3AN2', 3, 1, 19015, NULL, 'qfj6NT7UenWbVRX9WgfbX3yNOkYqY0625T9uBvSI7EH93cKa2QLKGtFrurQa', '2020-04-20 09:08:31', '2020-04-20 09:08:31', NULL),
(33, 'May-Rose', NULL, NULL, 'parinasm', 'yammie23@gmail.com', '$2y$10$3BGYy4G2rXDWNg89pet6M.xChlZZs8MntfjZTpGPtApqzjQgqQ03S', 7, 3, 4180, NULL, 'THibA5owVFn74uEKSDnjHIPHsjQshWT0AmwhRjA1nfOdBSxAn6bJ9yAkoN7g', '2020-04-23 08:18:31', '2020-04-23 08:18:31', NULL),
(34, 'Marissa', NULL, 'Dalay', 'dalaym', 'marissadalaymaria@yahoo.com', '$2y$10$fPX0LS7V5qtquCKqD6mbI.3a2K36vw2W/4KCZP8l2kG5x44q7Pmdu', 7, 2, 12154, NULL, 'W4576WLBXG5d3VUup2Ze4pRFH7PRIU9euKAz8WS6KU1f0MS45BbJL6UW5vRE', '2020-04-23 09:29:04', '2020-04-23 09:29:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `division55`
--
ALTER TABLE `division55`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisionindicators55`
--
ALTER TABLE `divisionindicators55`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files55`
--
ALTER TABLE `files55`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipcr55`
--
ALTER TABLE `ipcr55`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipcr_users`
--
ALTER TABLE `ipcr_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ipcr_users_user_id_foreign` (`user_id`),
  ADD KEY `ipcr_users_ipcr_id_foreign` (`ipcr_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules55`
--
ALTER TABLE `modules55`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules55_permissions55`
--
ALTER TABLE `modules55_permissions55`
  ADD KEY `modules55_permissions55_modules55_id_index` (`modules55_id`),
  ADD KEY `modules55_permissions55_permissions55_id_index` (`permissions55_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions55`
--
ALTER TABLE `permissions55`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles55`
--
ALTER TABLE `roles55`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles55_modules55`
--
ALTER TABLE `roles55_modules55`
  ADD KEY `roles55_modules55_roles55_id_index` (`roles55_id`),
  ADD KEY `roles55_modules55_modules55_id_index` (`modules55_id`);

--
-- Indexes for table `status55`
--
ALTER TABLE `status55`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strategicobjectives55`
--
ALTER TABLE `strategicobjectives55`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `successindicators55`
--
ALTER TABLE `successindicators55`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `targets55`
--
ALTER TABLE `targets55`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks55`
--
ALTER TABLE `tasks55`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasksusers55`
--
ALTER TABLE `tasksusers55`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users55`
--
ALTER TABLE `users55`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `division55`
--
ALTER TABLE `division55`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `divisionindicators55`
--
ALTER TABLE `divisionindicators55`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `files55`
--
ALTER TABLE `files55`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ipcr55`
--
ALTER TABLE `ipcr55`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `ipcr_users`
--
ALTER TABLE `ipcr_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `modules55`
--
ALTER TABLE `modules55`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `permissions55`
--
ALTER TABLE `permissions55`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles55`
--
ALTER TABLE `roles55`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status55`
--
ALTER TABLE `status55`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `strategicobjectives55`
--
ALTER TABLE `strategicobjectives55`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `successindicators55`
--
ALTER TABLE `successindicators55`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `targets55`
--
ALTER TABLE `targets55`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `tasks55`
--
ALTER TABLE `tasks55`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;

--
-- AUTO_INCREMENT for table `tasksusers55`
--
ALTER TABLE `tasksusers55`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users55`
--
ALTER TABLE `users55`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ipcr_users`
--
ALTER TABLE `ipcr_users`
  ADD CONSTRAINT `ipcr_users_ipcr_id_foreign` FOREIGN KEY (`ipcr_id`) REFERENCES `ipcr55` (`id`),
  ADD CONSTRAINT `ipcr_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users55` (`id`);

--
-- Constraints for table `modules55_permissions55`
--
ALTER TABLE `modules55_permissions55`
  ADD CONSTRAINT `modules55_permissions55_modules55_id_foreign` FOREIGN KEY (`modules55_id`) REFERENCES `modules55` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `modules55_permissions55_permissions55_id_foreign` FOREIGN KEY (`permissions55_id`) REFERENCES `permissions55` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roles55_modules55`
--
ALTER TABLE `roles55_modules55`
  ADD CONSTRAINT `roles55_modules55_modules55_id_foreign` FOREIGN KEY (`modules55_id`) REFERENCES `modules55` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles55_modules55_roles55_id_foreign` FOREIGN KEY (`roles55_id`) REFERENCES `roles55` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
