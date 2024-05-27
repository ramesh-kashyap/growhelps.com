-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2024 at 12:13 PM
-- Server version: 10.6.18-MariaDB
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `growhelps_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_task_limits`
--

CREATE TABLE `add_task_limits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `limit` varchar(255) NOT NULL,
  `tdate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_task_limits`
--

INSERT INTO `add_task_limits` (`id`, `limit`, `tdate`, `created_at`, `updated_at`) VALUES
(2, '10', '2021-09-21', '2021-09-21 11:11:29', '2021-09-21 11:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `add_task_urls`
--

CREATE TABLE `add_task_urls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` text NOT NULL,
  `tdate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `user`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'AD10001', '$2y$10$wtkE0cY0JaGwSK.gtswNqeiBc9ytPAesPCZaUi.9pkuPB.FXtusMO', NULL, '2021-07-27 10:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `account_holder` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `pancard` varchar(200) DEFAULT NULL,
  `adhaarcard` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `user_id`, `account_holder`, `bank_name`, `branch_name`, `account_no`, `ifsc_code`, `pancard`, `adhaarcard`, `created_at`, `updated_at`) VALUES
(1, 5, 'Rameshk', 'Yes Bank', 'Panipat', '1234567890', 'YRD876544', NULL, NULL, '2023-11-07 23:27:28', '2023-11-07 23:27:28'),
(2, 6, 'Rameshk', 'Yes Bank', 'Panipat', '1234567890', 'YRD876544', NULL, NULL, '2023-11-07 23:29:00', '2023-11-07 23:29:00'),
(3, 7, 'Rameshk', 'Yes Bank', 'Panipat', '1234567890', 'YRD876544', NULL, NULL, '2023-11-07 23:29:27', '2023-11-07 23:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `buy_funds`
--

CREATE TABLE `buy_funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_id_fk` varchar(255) DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `txn_no` varchar(255) NOT NULL,
  `bdate` date NOT NULL,
  `status` enum('Approved','Pending','Failed') NOT NULL DEFAULT 'Pending',
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `club_as`
--

CREATE TABLE `club_as` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ParentId` varchar(200) NOT NULL,
  `level` bigint(20) NOT NULL,
  `position` varchar(255) NOT NULL,
  `status` enum('Active','Completed') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `club_bs`
--

CREATE TABLE `club_bs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ParentId` bigint(20) NOT NULL,
  `level` bigint(20) NOT NULL,
  `position` varchar(255) NOT NULL,
  `round` bigint(20) NOT NULL,
  `added_by` enum('Admin','User') NOT NULL DEFAULT 'User',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `club_cs`
--

CREATE TABLE `club_cs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ParentId` bigint(20) NOT NULL,
  `level` bigint(20) NOT NULL,
  `position` varchar(255) NOT NULL,
  `round` bigint(20) NOT NULL,
  `added_by` enum('Admin','User') NOT NULL DEFAULT 'User',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `club_ds`
--

CREATE TABLE `club_ds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ParentId` bigint(20) NOT NULL,
  `level` bigint(20) NOT NULL,
  `position` varchar(255) NOT NULL,
  `round` bigint(20) NOT NULL,
  `added_by` enum('Admin','User') NOT NULL DEFAULT 'User',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `club_es`
--

CREATE TABLE `club_es` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ParentId` bigint(20) NOT NULL,
  `level` bigint(20) NOT NULL,
  `position` varchar(255) NOT NULL,
  `round` bigint(20) NOT NULL,
  `added_by` enum('Admin','User') NOT NULL DEFAULT 'User',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `club_fs`
--

CREATE TABLE `club_fs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ParentId` bigint(20) NOT NULL,
  `level` bigint(20) NOT NULL,
  `position` varchar(255) NOT NULL,
  `round` bigint(20) NOT NULL,
  `added_by` enum('Admin','User') NOT NULL DEFAULT 'User',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extras_matrix`
--

CREATE TABLE `extras_matrix` (
  `id` int(10) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_id_fk` varchar(20) NOT NULL,
  `paid_left` int(10) NOT NULL DEFAULT 0,
  `paid_right` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=>active&1=>completed',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generate_pins`
--

CREATE TABLE `generate_pins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_id_fk` varchar(255) DEFAULT NULL,
  `pin` varchar(255) NOT NULL,
  `allocated_date` date NOT NULL,
  `remarks` double(8,2) NOT NULL,
  `type` double(8,2) NOT NULL,
  `wallet` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_id_fk` varchar(255) DEFAULT NULL,
  `amt` float NOT NULL,
  `amount` float NOT NULL,
  `comm` float NOT NULL,
  `admin_charge` float(8,2) NOT NULL,
  `tds` float(8,2) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `ttime` date NOT NULL,
  `level` int(20) NOT NULL,
  `tleft` double(8,2) DEFAULT NULL,
  `tright` double(8,2) DEFAULT NULL,
  `rname` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `curry` varchar(200) NOT NULL DEFAULT '0',
  `pair200` float NOT NULL DEFAULT 0,
  `pair400` float NOT NULL DEFAULT 0,
  `pair1000` float NOT NULL DEFAULT 0,
  `invest_id` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan` varchar(255) DEFAULT NULL,
  `user_id_fk` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `amt` decimal(8,2) NOT NULL DEFAULT 0.00,
  `sdate` date NOT NULL,
  `status` enum('Active','Pending') NOT NULL DEFAULT 'Pending',
  `transaction_id` varchar(255) DEFAULT NULL,
  `slip` text DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `active_from` varchar(255) DEFAULT NULL,
  `roiCandition` int(11) NOT NULL DEFAULT 0 COMMENT '0=>ON & 1=> Off',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_23_061430_create_investments_table', 1),
(5, '2021_07_23_061517_create_incomes_table', 1),
(6, '2021_07_23_061548_create_banks_table', 1),
(7, '2021_07_23_061928_create_admins_table', 1),
(8, '2021_07_23_140049_create_withdraws_table', 1),
(12, '2021_08_07_140624_create_buy_funds_table', 4),
(15, '2021_08_07_133713_create_generate_pins_table', 5),
(16, '2021_08_07_134333_create_wallet_pins_table', 6),
(17, '2021_08_07_201100_create_used_pins_table', 7),
(19, '2021_09_14_110019_create_tasks_table', 8),
(20, '2021_09_21_161736_create_add_task_urls_table', 9),
(21, '2021_09_21_163851_create_add_task_limits_table', 10),
(22, '2021_09_21_165857_create_task_user_urls_table', 11),
(24, '2021_10_21_162904_create_rewards_table', 12),
(25, '2021_11_29_113759_create_pintransfers_table', 13),
(27, '2021_11_29_134210_create_payouts_table', 14),
(34, '2021_11_29_160911_create_club_as_table', 21),
(35, '2021_11_29_162556_create_club_bs_table', 22),
(36, '2021_11_29_162638_create_club_cs_table', 23),
(37, '2021_11_29_162646_create_club_ds_table', 24),
(38, '2021_11_29_162701_create_club_es_table', 25),
(39, '2021_11_29_162710_create_club_fs_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payouts`
--

CREATE TABLE `payouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_id_fk` varchar(255) NOT NULL,
  `growth_bonus` double(8,2) NOT NULL,
  `club_royalty` double(8,2) NOT NULL,
  `level_bonus` double(8,2) NOT NULL,
  `distributor_bonus` double(8,2) NOT NULL,
  `power_growth_bonus` double(8,2) NOT NULL,
  `ta_bonus` double(8,2) NOT NULL DEFAULT 0.00,
  `reward_bonus` float(18,2) NOT NULL DEFAULT 0.00,
  `total` double(8,2) NOT NULL,
  `deduction` double(8,2) NOT NULL,
  `club_deduction` double(8,2) NOT NULL,
  `withdraw_amt` double(8,2) NOT NULL,
  `payable_amt` double(8,2) NOT NULL,
  `ttime` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pintransfers`
--

CREATE TABLE `pintransfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `to` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `tdate` date NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `pin_type` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pintransfers`
--

INSERT INTO `pintransfers` (`id`, `user_id`, `to`, `from`, `pin`, `tdate`, `remarks`, `pin_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'gh10001', 'Admin', 'GL5050365251', '2023-11-07', 'Transferd to GH10001  by Admin', 500.00, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(2, 1, 'gh10001', 'Admin', 'GL3316134069', '2023-11-07', 'Transferd to GH10001  by Admin', 500.00, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(3, 1, 'gh10001', 'Admin', 'GL3796368216', '2023-11-07', 'Transferd to GH10001  by Admin', 500.00, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(4, 1, 'gh10001', 'Admin', 'GL8685391182', '2023-11-07', 'Transferd to GH10001  by Admin', 500.00, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(5, 1, 'gh10001', 'Admin', 'GL9413974667', '2023-11-07', 'Transferd to GH10001  by Admin', 500.00, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(6, 1, 'gh10001', 'Admin', 'GL2226843357', '2023-11-07', 'Transferd to GH10001  by Admin', 500.00, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(7, 1, 'gh10001', 'Admin', 'GL8386934800', '2023-11-07', 'Transferd to GH10001  by Admin', 500.00, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(8, 1, 'gh10001', 'Admin', 'GL5453778833', '2023-11-07', 'Transferd to GH10001  by Admin', 500.00, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(9, 1, 'gh10001', 'Admin', 'GL2606540303', '2023-11-07', 'Transferd to GH10001  by Admin', 500.00, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(10, 1, 'gh10001', 'Admin', 'GL1273716702', '2023-11-07', 'Transferd to GH10001  by Admin', 500.00, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(11, 1, 'GH10001', 'Admin', 'GL2053995796', '2023-11-07', 'Transferd to GH10001  by Admin', 750.00, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(12, 1, 'GH10001', 'Admin', 'GL8157966898', '2023-11-07', 'Transferd to GH10001  by Admin', 750.00, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(13, 1, 'GH10001', 'Admin', 'GL3482696393', '2023-11-07', 'Transferd to GH10001  by Admin', 750.00, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(14, 1, 'GH10001', 'Admin', 'GL3168902604', '2023-11-07', 'Transferd to GH10001  by Admin', 750.00, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(15, 1, 'GH10001', 'Admin', 'GL8210079752', '2023-11-07', 'Transferd to GH10001  by Admin', 750.00, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(16, 1, 'GH10001', 'Admin', 'GL8443879628', '2023-11-07', 'Transferd to GH10001  by Admin', 750.00, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(17, 1, 'GH10001', 'Admin', 'GL7738997086', '2023-11-07', 'Transferd to GH10001  by Admin', 750.00, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(18, 1, 'GH10001', 'Admin', 'GL5666149947', '2023-11-07', 'Transferd to GH10001  by Admin', 750.00, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(19, 1, 'GH10001', 'Admin', 'GL5338539488', '2023-11-07', 'Transferd to GH10001  by Admin', 750.00, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(20, 1, 'GH10001', 'Admin', 'GL3748320795', '2023-11-07', 'Transferd to GH10001  by Admin', 750.00, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(21, 1, 'Gh10001', 'Admin', 'GL8013752835', '2023-11-07', 'Transferd to GH10001  by Admin', 1000.00, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(22, 1, 'Gh10001', 'Admin', 'GL1873609674', '2023-11-07', 'Transferd to GH10001  by Admin', 1000.00, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(23, 1, 'Gh10001', 'Admin', 'GL4992790277', '2023-11-07', 'Transferd to GH10001  by Admin', 1000.00, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(24, 1, 'Gh10001', 'Admin', 'GL2447749093', '2023-11-07', 'Transferd to GH10001  by Admin', 1000.00, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(25, 1, 'Gh10001', 'Admin', 'GL1201522677', '2023-11-07', 'Transferd to GH10001  by Admin', 1000.00, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(26, 1, 'Gh10001', 'Admin', 'GL3952607562', '2023-11-07', 'Transferd to GH10001  by Admin', 1000.00, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(27, 1, 'Gh10001', 'Admin', 'GL9873898873', '2023-11-07', 'Transferd to GH10001  by Admin', 1000.00, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(28, 1, 'Gh10001', 'Admin', 'GL3646182100', '2023-11-07', 'Transferd to GH10001  by Admin', 1000.00, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(29, 1, 'Gh10001', 'Admin', 'GL7718172648', '2023-11-07', 'Transferd to GH10001  by Admin', 1000.00, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(30, 1, 'Gh10001', 'Admin', 'GL4217014889', '2023-11-07', 'Transferd to GH10001  by Admin', 1000.00, '2023-11-07 22:57:19', '2023-11-07 22:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_id_fk` varchar(255) DEFAULT NULL,
  `total_business` double(8,2) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `tdate` date NOT NULL,
  `level` int(11) NOT NULL,
  `status` enum('Approved','Pending','Failed') NOT NULL DEFAULT 'Pending',
  `remarks` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `singlelegs`
--

CREATE TABLE `singlelegs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `ParentId` bigint(20) NOT NULL,
  `level` bigint(20) NOT NULL,
  `status` bigint(11) NOT NULL DEFAULT 0 COMMENT '1=>used&0=>unused',
  `isCompleted` bigint(11) NOT NULL DEFAULT 0 COMMENT '1=>complted\r\n',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_id_fk` varchar(255) DEFAULT NULL,
  `url` text NOT NULL,
  `tdate` date NOT NULL,
  `approved_date` date DEFAULT NULL,
  `status` enum('Approved','Pending','Reject') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_user_urls`
--

CREATE TABLE `task_user_urls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `url` text NOT NULL,
  `tdate` date NOT NULL,
  `status` enum('Approved','Pending') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_id_fk` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `msg` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `gen_date` date NOT NULL,
  `closing_date` date DEFAULT NULL,
  `ticket_no` varchar(200) NOT NULL,
  `reply_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `used_pins`
--

CREATE TABLE `used_pins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pin` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `pdate` date NOT NULL,
  `owner` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sponsor` bigint(20) NOT NULL,
  `ParentId` bigint(20) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `package` double(8,2) DEFAULT NULL,
  `pamount` float DEFAULT NULL,
  `active_status` enum('Active','Pending','Inactive','Block') NOT NULL DEFAULT 'Pending',
  `jdate` date NOT NULL,
  `level` int(11) NOT NULL,
  `tpassword` varchar(255) NOT NULL,
  `adate` timestamp NULL DEFAULT NULL,
  `rank` int(11) NOT NULL DEFAULT 0 COMMENT '0=>normal 1=> pool 1 & 2=> pool 2 & 3=> pool 3',
  `trx_addres` varchar(255) DEFAULT NULL,
  `PSR` varchar(200) DEFAULT NULL,
  `TPSR` varchar(200) DEFAULT NULL,
  `upgrade_walet` float NOT NULL DEFAULT 0,
  `club_deduction` float NOT NULL DEFAULT 0,
  `capping` int(11) NOT NULL DEFAULT 0 COMMENT '1=>left Side & 2 Right SIde',
  `cap_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `isBooster` bigint(11) NOT NULL DEFAULT 0 COMMENT '1=>booster&0=>non booster',
  `country` varchar(200) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `sponsor`, `ParentId`, `phone`, `position`, `package`, `pamount`, `active_status`, `jdate`, `level`, `tpassword`, `adate`, `rank`, `trx_addres`, `PSR`, `TPSR`, `upgrade_walet`, `club_deduction`, `capping`, `cap_amount`, `isBooster`, `country`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Grow helps', 'growhelp@gmail.com', 'GH10001', '$2y$10$wtkE0cY0JaGwSK.gtswNqeiBc9ytPAesPCZaUi.9pkuPB.FXtusMO', 0, 0, '8053461772', 'Left', 2500.00, 2500, 'Active', '2023-03-30', 0, '$2y$10$DMAmZJXNTO.s4ycZDPpxwueMEv819axNQS2MrbR5GYOHRReRGWT7S', '2023-05-30 14:08:11', 0, NULL, '12345', '1234', 0, 0, 0, 2500.00, 1, NULL, NULL, NULL, '2023-03-30 07:02:49', '2023-11-06 15:30:20'),
(3, 'Rk', 'rkkkk@gmail.com', 'GH906690', '$2y$10$N9UfdcNp/duR1PYZ9A.1rucmyndKvpy6q/rDQQyvbJM5HJF2xgnUq', 1, 1, '1234567890', NULL, NULL, NULL, 'Pending', '2023-11-08', 1, '$2y$10$.c/dVCcvzng8.ySfDJ.W5uImWWb956XVgAsEfiFx3vMrmlBKirU/q', NULL, 0, NULL, '12345', '66220', 0, 0, 0, 0.00, 0, NULL, NULL, NULL, '2023-11-07 23:24:26', '2023-11-07 23:24:26'),
(4, 'Rk', 'rkkkk@gmail.com', 'GH081147', '$2y$10$PqBKl05hA5UmV1U4UYWQLuLJJZD0sySksu6rYhIiNmQINluRQMTYy', 1, 3, '1234567890', NULL, NULL, NULL, 'Pending', '2023-11-08', 1, '$2y$10$wbKLvWMVqydTpLIOwVNy/euathEFtfOkenN1vr//yUyL3OAuVYRYS', NULL, 0, NULL, '12345', '11863', 0, 0, 0, 0.00, 0, NULL, NULL, NULL, '2023-11-07 23:26:51', '2023-11-07 23:26:51'),
(5, 'Rk', 'rkkkk@gmail.com', 'GH364807', '$2y$10$MhUsbO93Foj1L1VvciB1iuPcuUD.cTsYJa/8qxGCzlEUzTNHOxj5O', 1, 4, '1234567890', NULL, NULL, NULL, 'Pending', '2023-11-08', 1, '$2y$10$..6B3QFXzgcnyxOhl2MehOYKL5CYop1qA/8CMuwvF3ENhTKX/TJya', NULL, 0, NULL, '12345', '48039', 0, 0, 0, 0.00, 0, NULL, NULL, NULL, '2023-11-07 23:27:28', '2023-11-07 23:27:28'),
(6, 'Rk', 'rkkkk@gmail.com', 'GH104032', '$2y$10$bjtfx4hGH3t2fZxkqrmjt.16fYxT.B3CucuU/msbrLrwilKj4LN2m', 1, 5, '1234567890', NULL, NULL, NULL, 'Pending', '2023-11-08', 1, '$2y$10$H7C0YWEdduwbGYKP77vQZuROPg1n7WX4/QEZ0fYjaAx4x1VfuMCxC', NULL, 0, NULL, '12345', '40358', 0, 0, 0, 0.00, 0, NULL, NULL, NULL, '2023-11-07 23:29:00', '2023-11-07 23:29:00'),
(7, 'Rk', 'rkkkk@gmail.com', 'GH646773', '$2y$10$vvY9Nt08RVzYtqhsUgo4pedR8NEwm4mX4wOSQfZBIHYMYMceiIHHe', 1, 6, '1234567890', NULL, NULL, NULL, 'Pending', '2023-11-08', 1, '$2y$10$Ol9uTvUd.00BZQzWSG3cIevnHegSBdFe0nd8jJ7JUx6amikSjbrNG', NULL, 0, NULL, '12345', '67466', 0, 0, 0, 0.00, 0, NULL, NULL, NULL, '2023-11-07 23:29:27', '2023-11-07 23:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_extras`
--

CREATE TABLE `user_extras` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `sponsorID1` bigint(18) DEFAULT NULL,
  `sponsorID2` bigint(18) DEFAULT NULL,
  `totalGet` tinyint(20) NOT NULL DEFAULT 0,
  `next_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_pins`
--

CREATE TABLE `wallet_pins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_id_fk` varchar(255) DEFAULT NULL,
  `pin` varchar(255) NOT NULL,
  `allocated_date` date NOT NULL,
  `remarks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallet_pins`
--

INSERT INTO `wallet_pins` (`id`, `user_id`, `user_id_fk`, `pin`, `allocated_date`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, 'gh10001', 'GL5050365251', '2023-11-07', 500, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(2, 1, 'gh10001', 'GL3316134069', '2023-11-07', 500, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(3, 1, 'gh10001', 'GL3796368216', '2023-11-07', 500, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(4, 1, 'gh10001', 'GL8685391182', '2023-11-07', 500, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(5, 1, 'gh10001', 'GL9413974667', '2023-11-07', 500, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(6, 1, 'gh10001', 'GL2226843357', '2023-11-07', 500, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(7, 1, 'gh10001', 'GL8386934800', '2023-11-07', 500, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(8, 1, 'gh10001', 'GL5453778833', '2023-11-07', 500, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(9, 1, 'gh10001', 'GL2606540303', '2023-11-07', 500, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(10, 1, 'gh10001', 'GL1273716702', '2023-11-07', 500, '2023-11-07 22:56:53', '2023-11-07 22:56:53'),
(11, 1, 'GH10001', 'GL2053995796', '2023-11-07', 750, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(12, 1, 'GH10001', 'GL8157966898', '2023-11-07', 750, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(13, 1, 'GH10001', 'GL3482696393', '2023-11-07', 750, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(14, 1, 'GH10001', 'GL3168902604', '2023-11-07', 750, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(15, 1, 'GH10001', 'GL8210079752', '2023-11-07', 750, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(16, 1, 'GH10001', 'GL8443879628', '2023-11-07', 750, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(17, 1, 'GH10001', 'GL7738997086', '2023-11-07', 750, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(18, 1, 'GH10001', 'GL5666149947', '2023-11-07', 750, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(19, 1, 'GH10001', 'GL5338539488', '2023-11-07', 750, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(20, 1, 'GH10001', 'GL3748320795', '2023-11-07', 750, '2023-11-07 22:57:07', '2023-11-07 22:57:07'),
(21, 1, 'Gh10001', 'GL8013752835', '2023-11-07', 1000, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(22, 1, 'Gh10001', 'GL1873609674', '2023-11-07', 1000, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(23, 1, 'Gh10001', 'GL4992790277', '2023-11-07', 1000, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(24, 1, 'Gh10001', 'GL2447749093', '2023-11-07', 1000, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(25, 1, 'Gh10001', 'GL1201522677', '2023-11-07', 1000, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(26, 1, 'Gh10001', 'GL3952607562', '2023-11-07', 1000, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(27, 1, 'Gh10001', 'GL9873898873', '2023-11-07', 1000, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(28, 1, 'Gh10001', 'GL3646182100', '2023-11-07', 1000, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(29, 1, 'Gh10001', 'GL7718172648', '2023-11-07', 1000, '2023-11-07 22:57:19', '2023-11-07 22:57:19'),
(30, 1, 'Gh10001', 'GL4217014889', '2023-11-07', 1000, '2023-11-07 22:57:19', '2023-11-07 22:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_id_fk` varchar(255) DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `status` enum('Approved','Pending','Failed') NOT NULL DEFAULT 'Pending',
  `wdate` date NOT NULL,
  `txn_id` varchar(255) DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `account` text DEFAULT NULL,
  `paid_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_task_limits`
--
ALTER TABLE `add_task_limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_task_urls`
--
ALTER TABLE `add_task_urls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banks_user_id_foreign` (`user_id`);

--
-- Indexes for table `buy_funds`
--
ALTER TABLE `buy_funds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buy_funds_user_id_foreign` (`user_id`);

--
-- Indexes for table `club_as`
--
ALTER TABLE `club_as`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_as_user_id_foreign` (`user_id`),
  ADD KEY `club_as_parentid_index` (`ParentId`);

--
-- Indexes for table `club_bs`
--
ALTER TABLE `club_bs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_bs_user_id_foreign` (`user_id`),
  ADD KEY `club_bs_parentid_index` (`ParentId`);

--
-- Indexes for table `club_cs`
--
ALTER TABLE `club_cs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_cs_user_id_foreign` (`user_id`),
  ADD KEY `club_cs_parentid_index` (`ParentId`);

--
-- Indexes for table `club_ds`
--
ALTER TABLE `club_ds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_ds_user_id_foreign` (`user_id`),
  ADD KEY `club_ds_parentid_index` (`ParentId`);

--
-- Indexes for table `club_es`
--
ALTER TABLE `club_es`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_es_user_id_foreign` (`user_id`),
  ADD KEY `club_es_parentid_index` (`ParentId`);

--
-- Indexes for table `club_fs`
--
ALTER TABLE `club_fs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_fs_user_id_foreign` (`user_id`),
  ADD KEY `club_fs_parentid_index` (`ParentId`);

--
-- Indexes for table `extras_matrix`
--
ALTER TABLE `extras_matrix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generate_pins`
--
ALTER TABLE `generate_pins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `generate_pins_user_id_foreign` (`user_id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incomes_user_id_foreign` (`user_id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investments_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payouts`
--
ALTER TABLE `payouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payouts_user_id_foreign` (`user_id`);

--
-- Indexes for table `pintransfers`
--
ALTER TABLE `pintransfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pintransfers_user_id_foreign` (`user_id`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rewards_user_id_foreign` (`user_id`);

--
-- Indexes for table `singlelegs`
--
ALTER TABLE `singlelegs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_as_user_id_foreign` (`user_id`),
  ADD KEY `club_as_parentid_index` (`ParentId`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`);

--
-- Indexes for table `task_user_urls`
--
ALTER TABLE `task_user_urls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_user_urls_user_id_foreign` (`user_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `used_pins`
--
ALTER TABLE `used_pins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `used_pins_owner_foreign` (`owner`),
  ADD KEY `used_pins_user_foreign` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_sponsor_index` (`sponsor`),
  ADD KEY `users_parentid_index` (`ParentId`);

--
-- Indexes for table `user_extras`
--
ALTER TABLE `user_extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_pins`
--
ALTER TABLE `wallet_pins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_pins_user_id_foreign` (`user_id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdraws_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_task_limits`
--
ALTER TABLE `add_task_limits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `add_task_urls`
--
ALTER TABLE `add_task_urls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buy_funds`
--
ALTER TABLE `buy_funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `club_as`
--
ALTER TABLE `club_as`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `club_bs`
--
ALTER TABLE `club_bs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `club_cs`
--
ALTER TABLE `club_cs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `club_ds`
--
ALTER TABLE `club_ds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `club_es`
--
ALTER TABLE `club_es`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `club_fs`
--
ALTER TABLE `club_fs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extras_matrix`
--
ALTER TABLE `extras_matrix`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generate_pins`
--
ALTER TABLE `generate_pins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `payouts`
--
ALTER TABLE `payouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pintransfers`
--
ALTER TABLE `pintransfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `singlelegs`
--
ALTER TABLE `singlelegs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_user_urls`
--
ALTER TABLE `task_user_urls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `used_pins`
--
ALTER TABLE `used_pins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_extras`
--
ALTER TABLE `user_extras`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_pins`
--
ALTER TABLE `wallet_pins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buy_funds`
--
ALTER TABLE `buy_funds`
  ADD CONSTRAINT `buy_funds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `club_as`
--
ALTER TABLE `club_as`
  ADD CONSTRAINT `club_as_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `club_bs`
--
ALTER TABLE `club_bs`
  ADD CONSTRAINT `club_bs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `club_cs`
--
ALTER TABLE `club_cs`
  ADD CONSTRAINT `club_cs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `club_ds`
--
ALTER TABLE `club_ds`
  ADD CONSTRAINT `club_ds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `club_es`
--
ALTER TABLE `club_es`
  ADD CONSTRAINT `club_es_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `club_fs`
--
ALTER TABLE `club_fs`
  ADD CONSTRAINT `club_fs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payouts`
--
ALTER TABLE `payouts`
  ADD CONSTRAINT `payouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pintransfers`
--
ALTER TABLE `pintransfers`
  ADD CONSTRAINT `pintransfers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
