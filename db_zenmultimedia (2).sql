-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 25, 2024 at 12:38 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_zenmultimedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_sections`
--

CREATE TABLE `about_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `subtitle` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_sections`
--

INSERT INTO `about_sections` (`id`, `subtitle`, `video_path`, `created_at`, `updated_at`) VALUES
(1, 'PT Zen Multimedia Indonesia adalah sebuah perusahaan yang bergerak dibidang IT Consultant (Web & Developer System), Multimedia, and Video Explainer yang berada di Purwakarta Jawa Barat.', 'zmi-profil-video.webm', NULL, '2024-08-21 03:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`id`, `key`, `value`, `expiration`, `created_at`, `updated_at`) VALUES
(57, 'loremipsum@gmail|127.0.0.1:timer', 'i:1724295574;', 1724295574, NULL, NULL),
(58, 'loremipsum@gmail|127.0.0.1', 'i:3;', 1724295574, NULL, NULL),
(59, 'nngs.me@gmail.com|127.0.0.1:timer', 'i:1724374478;', 1724374478, NULL, NULL),
(60, 'nngs.me@gmail.com|127.0.0.1', 'i:1;', 1724374478, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_sections`
--

CREATE TABLE `client_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_sections`
--

INSERT INTO `client_sections` (`id`, `image_path`, `created_at`, `updated_at`) VALUES
(22, 'cD2Z4cOocdn6mh28P0A14dsrNqiLBKrAcWrxHK8v.jpg', '2024-07-15 21:30:56', '2024-07-15 21:30:56'),
(23, 'sjPRuCaooSNzI8nbhsBZGRaDDsSaGBWl4EMQVEhz.jpg', '2024-07-15 21:31:02', '2024-07-15 21:31:02'),
(24, 'i5VQoOSG6Nyql0PPJsGPeMAa7upRWRtTRcksy1sb.jpg', '2024-07-15 21:31:09', '2024-07-15 21:31:09'),
(25, 'sYvy5B5PlD6ipjGnoKkiEjnlja2EW9Yp5VXIPFit.jpg', '2024-07-15 21:31:15', '2024-07-15 21:31:15'),
(26, 'GAE8qRh9PrEeQIButaFryT7KDy8hxXjccNRyAgCj.jpg', '2024-07-15 21:31:23', '2024-07-15 21:31:23'),
(27, 'tiFRp1lqgmoP7JsIsxWAYKruGBeQiMjdeUJTfgRb.jpg', '2024-07-15 21:31:36', '2024-07-15 21:31:36'),
(28, 'WQGN929TF82d8pYRmq2RjHNhQIXLciyjpfMtv6QO.jpg', '2024-07-15 21:31:42', '2024-07-15 21:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_sections`
--

CREATE TABLE `footer_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sosmed_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sosmed_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sosmed_3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sosmed_4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_sections`
--

INSERT INTO `footer_sections` (`id`, `alamat`, `no_telp`, `email`, `sosmed_1`, `sosmed_2`, `sosmed_3`, `sosmed_4`, `created_at`, `updated_at`) VALUES
(1, 'Jl. Taman Pahlawan No.166, Purwamekar, Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat 41119', '6282116474094', 'cs@zenmultimediacorp.com', 'https://www.facebook.com/profile.php?id=100072448096686&mibextid=ZbWKwL', 'https://www.instagram.com/zenmultimediaindonesia?igsh=MXdiOHBndzFpZnhqZQ==', 'https://youtube.com/@zenmultimediaindonesia7712', 'v', NULL, '2024-08-17 16:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `galery_sections`
--

CREATE TABLE `galery_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galery_sections`
--

INSERT INTO `galery_sections` (`id`, `title`, `subtitle`, `image_path`, `created_at`, `updated_at`) VALUES
(3, 'Judul kegiatan', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam maiores est dignissimos accusantium, in sunt nemo aut. Vitae, corporis.', '8CcSZfQy0ZFvQDQ6bCBeKIE9ldhWeVXQfmRDjpAz.png', '2024-07-08 01:58:45', '2024-07-14 19:53:23'),
(4, 'Judul Kegiatan', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam maiores est dignissimos accusantium, in sunt nemo aut. Vitae, corporis.dd', 'xHzjMVXVIOWIFTFmuKMtGMn8OQ4G3MoYS8DayhOc.png', '2024-07-08 02:01:57', '2024-07-08 02:02:57'),
(8, 'Judul Kegiatan', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam maiores est dignissimos accusantium, in sunt nemo aut. Vitae, corporis.dd', 'xryGQ3O2ZMgVUfSOERhA6RKvVbm3ii60gcY7eBdM.png', '2024-07-15 00:49:27', '2024-07-15 02:01:14'),
(9, 'Judul Kegiatan', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam maiores est dignissimos accusantium, in sunt nemo aut. Vitae, corporis.dd', 'cgbea3D8Qra6BODX7t0xCRNsODW4Elx9hHMxTvIy.jpg', '2024-07-23 07:40:13', '2024-07-23 08:17:08'),
(10, 'Judul Kegiatan', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam maiores est dignissimos accusantium, in sunt nemo aut. Vitae, corporis.dd', 'dPcnQPLvO93jU5uUXziK4euEvqUQJBYoQIZKbzzU.png', '2024-07-23 07:43:32', '2024-07-23 08:23:31'),
(11, 'Judul Kegiatan', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam maiores est dignissimos accusantium, in sunt nemo aut. Vitae, corporis.dd', 'Gxp31Arwj5hp02NVgPPdKFZSJbJiyXAY6HSnZOLd.jpg', '2024-07-23 08:24:54', '2024-07-23 08:24:54'),
(12, 'Judul Kegiatan', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam maiores est dignissimos accusantium, in sunt nemo aut. Vitae, corporis.dd', 'PiLfQWypHbCfsooOxYHDwRQzQTC0AvH0fNyjjr5b.jpg', '2024-07-23 08:25:11', '2024-07-23 08:25:11'),
(13, 'Judul Kegiatan', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam maiores est dignissimos accusantium, in sunt nemo aut. Vitae, corporis.dd', 'bNTVlmj0Pi35r7lxIq4L7abUr2u0khyMS9wyLXbC.jpg', '2024-07-23 08:25:22', '2024-07-23 08:25:22'),
(14, 'Judul Kegiatan', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam maiores est dignissimos accusantium, in sunt nemo aut. Vitae, corporis.dd', 'F2D60gxHy8HHfbpTYbEJ5GABGD7P5pGqYTy0mkoq.jpg', '2024-07-23 08:25:44', '2024-07-23 08:25:44'),
(15, 'Judul Kegiatan', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam maiores est dignissimos accusantium, in sunt nemo aut. Vitae, corporis.dd', 'W2Lmh3LAO77FV7qaEHK7XEDRC7IJ5j1SuhAWoqZM.jpg', '2024-07-23 08:26:01', '2024-07-23 08:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `hero_sections`
--

CREATE TABLE `hero_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_sections`
--

INSERT INTO `hero_sections` (`id`, `title`, `subtitle`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Partner Digital Untuk layanan Bisnis Dan Pemerintahan', 'Kami melayani jasa pembuatan website, aplikasi, dan multimedia.', '3xImMmrOyAjg2y9RP3gnQ3GO70H9ACWhDLnxUHZf.png', NULL, '2024-07-20 07:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `latest_projects`
--

CREATE TABLE `latest_projects` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `latest_projects`
--

INSERT INTO `latest_projects` (`id`, `title`, `subtitle`, `button_link`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'tempatjualan.com', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam maiores est dignissimos accusantium, in sunt nemo aut. Vitae, corporis.', 'https://tempatjualan.com/', 'AdobeStock_296836811_Preview.jpeg', NULL, '2024-08-21 03:28:21'),
(2, 'lorem.test', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam maiores est dignissimos accusantium, in sunt nemo aut. Vitae, corporis.', '#', 'JLMK6swEWvXRBGRTZIMVcxTStu6M7XX1rBh3jrqu.jpg', '2024-07-08 01:54:34', '2024-07-30 14:45:39'),
(3, 'lorem', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam maiores est dignissimos accusantium, in sunt nemo aut. Vitae, corporis.', '#', 'uDhUmA17Im08M1yEImJc5SkLLO8KsSs9W4BAAoAH.jpg', '2024-07-08 01:54:50', '2024-07-30 14:45:53'),
(4, 'lorem', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam maiores est dignissimos accusantium, in sunt nemo aut. Vitae, corporis.', '#', '4wr340vEZj7ttisQyaQEvrmQv7GmsFH7G7uaZWOs.jpg', '2024-07-08 01:55:06', '2024-07-30 14:46:04'),
(8, 'Landing Pages', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam maiores est dignissimos accusantium, in sunt nemo aut. Vitae, corporis.', '#', 'zmi-services (1).png', '2024-08-15 04:11:57', '2024-08-15 04:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2024_06_24_095708_create_hero_sections_table', 1),
(4, '2024_06_28_021709_create_cache_table', 1),
(5, '2024_06_28_153307_create_about_sections_table', 1),
(6, '2024_06_29_071146_increase_subtitle_length_in_table_name', 1),
(7, '2024_06_29_085349_latest_project', 1),
(8, '2024_06_30_095428_service_section', 1),
(9, '2024_06_30_103912_galery_section', 1),
(10, '2024_06_30_110511_client_section', 1),
(11, '2024_06_30_113710_footer_section', 1),
(12, '2024_07_08_014013_promo', 1),
(13, '2024_07_12_145716_contact', 2),
(14, '2024_07_16_073119_recruitment', 3),
(15, '2024_07_31_091906_add_failed_stage_to_recruitments_table', 4),
(16, '2024_08_21_134051_add_columns_to_recruitment_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('loremipsum@gmail', '$2y$12$JZDSOiDu70GAeLdHbrSG.eQjqG8JX2z2LRiDk1lMxZh8Jt8ZI15RW', '2024-08-22 02:58:58'),
('zenweb.verifikasi@gmail.com', '$2y$12$ZYA3IDtvCWhjmb1LgAxQo.Mnfjn6.eHD1DS/BchcWEo7Tn/IUL6UC', '2024-08-16 07:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`id`, `image_path`, `created_at`, `updated_at`) VALUES
(2, 'ClipDown.App_333522629_3458515531057210_8835970163805495417_n (1).jpg', NULL, '2024-08-23 03:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `recruitments`
--

CREATE TABLE `recruitments` (
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `study` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `onsite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `test` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agree` date DEFAULT NULL,
  `portfolio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stage1` tinyint(1) DEFAULT '0',
  `stage2` tinyint(1) DEFAULT '0',
  `stage3` tinyint(1) DEFAULT '0',
  `stage4` tinyint(1) DEFAULT '0',
  `failed_stage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recruitments`
--

INSERT INTO `recruitments` (`uuid`, `email`, `name`, `nik`, `address`, `phone_number`, `study`, `position`, `salary`, `onsite`, `test`, `agree`, `portfolio`, `file_path`, `stage1`, `stage2`, `stage3`, `stage4`, `failed_stage`, `created_at`, `updated_at`) VALUES
('01598e56-8f2c-42db-a992-0daf8a5b9948', 'andreaskristianto008@gmail.com', 'Andreas Kristianto', NULL, 'cirebon', '081213633858', 'Strata 1 (S1)', 'UI/UX Developer', '0', '', '', NULL, NULL, 'CV Andreas Kristianto.pdf', 0, 0, 0, 0, NULL, '2024-08-08 06:45:03', '2024-08-08 06:45:03'),
('0185c8b8-d6fd-47da-8dac-cabdb68d3625', 'gregaldi1498@gmail.com', 'GREGORIUS ALDI BAGASKORO', NULL, 'bekasi', '08111441498', 'Strata 1 (S1)', 'Mobile Developer', '0', '', '', NULL, NULL, 'CV GREGORIUS.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:38:17', '2024-08-08 04:38:17'),
('0378d2e1-04e3-4959-ba67-475549009924', 'syahidalbaddry@gmail.com', 'Syahid Al Baddry', NULL, 'Kayu jati jabon,28294 Pekanbaru,Riau', '085763506179', 'Sekolah Menengah Kejuruan (SMK)', 'Mobile Developer', '0', '', '', NULL, NULL, 'Syahid Albadry.pdf', 0, 0, 0, 0, NULL, '2024-08-08 06:18:34', '2024-08-08 06:18:34'),
('0514379d-327d-4ad6-9718-fe873f7f9bb3', 'abdahesa@gmail.com', 'Hesa Abda Arrasyid', NULL, 'Bandung', '085729194007', 'Strata 1 (S1)', 'UI/UX Developer', '0', '', '', NULL, NULL, 'CV dan Portofolio 2024- Hesa kecil.pdf', 0, 0, 0, 0, NULL, '2024-08-08 06:23:10', '2024-08-08 06:23:10'),
('05425c83-7f22-43ee-8705-780fc8207dea', 'ilhamhamfikri@gmail.com', 'Ilham Fikri A Fatah', NULL, 'Gresik, East Java', '085607423717', 'Opsi Lainnya', 'UI/UX Developer', '0', '', '', NULL, NULL, 'CV_Ilham Fikri A Fatah.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:42:42', '2024-08-08 04:42:42'),
('1ec18223-0af1-4c0d-a26d-78af179d8215', 'andriana.rafly@gmail.com', 'RAFLY ANDRIANA P', NULL, 'Cimahi Tengah, Kota Cimahi, 4052', '6282315262714', 'Strata 1 (S1)', 'Accounting Staff / Tax Staff', '0', '', '', NULL, NULL, 'cv_rafly01.pdf', 0, 0, 0, 0, NULL, '2024-08-08 06:41:28', '2024-08-08 06:41:28'),
('1fd87236-13d6-406f-949d-0f711244c85f', 'sheenazien08@gmail.com', 'SHEENA M ALI ZIEN', NULL, 'Jl.Raden Kusuma Abdul Jalil Kriyan Kalinyamatan Jepara', '089638706830', 'Sekolah Menengah Kejuruan (SMK)', 'Fullstack Developer', '0', '', '', NULL, NULL, '5_6215255879940313154.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:23:01', '2024-08-08 04:23:01'),
('25ed8cbd-f515-4f8c-a4e3-c6af84ec2888', 'raflirazak50@gmail.com', 'RAFLI RAZAK', NULL, 'Bintaro, Tangerang Selatan', '6285263610472', 'Diploma 3 (D3)', 'Project Manager', '0', '', '', NULL, NULL, 'Rafli Razak.pdf', 0, 0, 0, 0, NULL, '2024-08-08 06:49:32', '2024-08-08 06:49:32'),
('2743f379-1938-496d-8313-5521da1b54bd', 'halimpamungkas9@gmail.com', 'Haliim Pamungkas', NULL, '-', '6282322008771', 'Strata 1 (S1)', 'Mobile Developer', '0', '', '', NULL, NULL, 'Haliim Pamungkas Harjo Suyono_CV _eng.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:58:44', '2024-08-08 04:58:44'),
('282525f1-36b3-4639-b5ea-fedcc0e180cb', 'ss3936715@gmail.com', 'Sandy saputra', NULL, 'gedawang permai 1, Semarang, Jawa tengah', '08112895591', 'Strata 1 (S1)', 'Fullstack Developer', '0', '', '', NULL, NULL, 'cv sandysaputra update.pdf', 0, 0, 0, 0, NULL, '2024-08-08 06:19:56', '2024-08-08 06:19:56'),
('324254dc-6d14-4fe6-b503-36afbc04f0ac', 'bagas.m.afrizal@gmail.com', 'M Bagas Afrizal', NULL, '-', '6282333697076', 'Strata 1 (S1)', 'UI/UX Developer', '0', '', '', NULL, NULL, 'CV & Portofolio M Bagasa Affrizal.pdf', 0, 0, 0, 0, NULL, '2024-08-08 06:10:51', '2024-08-08 06:10:51'),
('47689e1d-ea48-4ab5-974c-56e0a9d81ad1', 'khansanaila1405@gmail.com', 'Khansanaila', NULL, 'Bogor, Indonesia', '0', 'Sekolah Menengah Kejuruan (SMK)', 'UI/UX Developer', '0', '', '', NULL, NULL, 'CV Khansanaila .pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:21:28', '2024-08-08 04:21:28'),
('49d9ffcd-698d-4027-93c9-f46b97c766b4', 'mzainulmuttaqin@outlook.com', 'Moh. Zainul Muttaqin', NULL, 'Jombang, Indonesia', '0', 'Sekolah Menengah Kejuruan (SMK)', 'Mobile Developer', '0', '', '', NULL, NULL, 'CV Moh. Zainul Muttaqin-19-09-2023-.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:44:01', '2024-08-08 04:44:01'),
('51e2644c-d1ea-4cde-a6cb-b8885987e461', 'yustofalinggar2016@gmail.com', 'Yustofa Linggar', NULL, 'Bandung, Jawabarat', '085171125990', 'Strata 1 (S1)', 'Backend Developer', '0', '', '', NULL, NULL, 'CV LINGGAR.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:36:39', '2024-08-08 04:36:39'),
('56d817d4-477b-49db-a774-69f5ef8df19f', 'qlixess@gmail.com', 'Antony Afandy', NULL, '-', '08175065350', 'Strata 1 (S1)', 'Fullstack Developer', '0', '', '', NULL, NULL, 'AntonyAfandy_Fullstack.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:30:10', '2024-08-08 04:30:10'),
('57b463d4-6158-4378-9faa-07e77e567488', 'adrifd.kaufmann@gmail.com', 'ADRI FIRDIANSYAH KAUFMANN', NULL, 'Kp. Krajan RT 001/001 Kel. Wancimekar Kec. Kotabaru Kab Karawang, 41374', '085718870936', 'Strata 1 (S1)', 'Fullstack Developer', '0', '', '', NULL, NULL, 'Adri Firdiansyah Kaufmann CV.pdf', 0, 0, 0, 0, NULL, '2024-08-08 05:01:12', '2024-08-08 05:01:12'),
('631d77db-cbb6-4dae-816e-d248842f6e91', 'bimoputraxz@icloud.com', 'Bimo Putra', NULL, 'Jalan Inspeksi Barat, Medan, Indonesia', '082268382515', 'Strata 1 (S1)', 'UI/UX Developer', '0', '', '', NULL, NULL, 'Putra, CV.pdf', 0, 0, 0, 0, NULL, '2024-08-08 07:55:45', '2024-08-08 07:55:45'),
('6477b446-ce66-423e-8593-a3fd3a5edf24', 'bpanjinur63@gmail.com', 'Bonang Panji Nur', NULL, 'Cimahi, Jawa Barat', '083804213387', 'Sekolah Menengah Kejuruan (SMK)', 'UI/UX Developer', '0', '', '', NULL, NULL, 'Bonang CV.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:27:07', '2024-08-08 04:27:07'),
('68204c54-df5e-4ef4-ae11-9cb334b5828d', 'kevinreihan17@gmail.com', 'Kevin Reuhan Ghazali Adam', NULL, 'Bekasi', '082112958088', 'Opsi Lainnya', 'UI/UX Developer', '0', '', '', NULL, NULL, 'CV ATS_Kevin Reihan Ghazali Adam.pdf', 0, 0, 0, 0, NULL, '2024-08-08 05:17:54', '2024-08-08 05:17:54'),
('6ac81b1e-6e3d-4c4c-a1df-f6572617fc56', 'lorem@examples.com', 'lorem ipsum dollor', '1234567890', 'Jalan Veteran, Purwakarta.', '08123456789', 'Sekolah Menengah Kejuruan (SMK)', 'Frontend Developer', '00', '', '', NULL, NULL, 'rancangan website 2.pdf', 1, 1, 1, 0, 'Offering', '2024-08-21 04:55:43', '2024-08-23 00:54:45'),
('70c6e75d-7d52-44ab-9dbc-4d527565eb42', 'kevynryandana@gmail.com', 'Kevin Riandana', NULL, '-', '085748336197', 'Opsi Lainnya', 'UI/UX Developer', '0', '', '', NULL, NULL, 'Kevin Riandana (cv).pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:59:39', '2024-08-08 04:59:39'),
('8699c928-d7b0-4921-97df-abc4d7a16ba0', 'havisiqbalsyah@gmail.com', 'HAFIZ IQBAL SYAHRUNIZAR', NULL, 'Tulungagung, Indonesia', '087708466279', 'Strata 1 (S1)', 'Backend Developer', '0', '', '', NULL, NULL, 'Software_Engineer_Hafiz_Iqbal_Sahrunizar.pdf', 0, 0, 0, 0, NULL, '2024-08-08 06:58:51', '2024-08-08 06:58:51'),
('8c6a84ff-f922-457e-8e87-44a3c84ae69e', 'fajar.s.fratama@gmail.com', 'Fajar Sujai Pratama', NULL, 'Bekasi, Indonesia', '081213989965', 'Opsi Lainnya', 'DevOps Developer', '0', '', '', NULL, NULL, 'Kandidat Fajar Sajai.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:55:48', '2024-08-08 04:55:48'),
('95ee7032-fa81-4a25-ab0c-41c2ffdec852', 'sumgmng@gmail.com', 'SATRIA RAHMAT MUSYARIFIN', NULL, 'South Jakarta, Indonesia', '6281251389915', 'Sekolah Menengah Kejuruan (SMK)', 'Backend Developer', '0', '', '', NULL, NULL, 'CV_-_BACKEND_-_DEVELOPER_-_SATRIA_RAHMAT_MUSYARIFIN.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:23:50', '2024-08-08 04:23:50'),
('992e91b9-e706-4d27-bd40-94fee9140b5b', 'sidiknurizki@gmail.com', 'Muhammad Sidik Nur Rizki', NULL, 'Cimahi Selatan', '08977335289', 'Opsi Lainnya', 'UI/UX Developer', '0', '', '', NULL, NULL, 'Muhamad Sidik Nur Rizki-resume.pdf', 0, 0, 0, 0, NULL, '2024-08-08 05:06:04', '2024-08-08 05:06:04'),
('a996c8f9-700c-495d-97a2-febfc21bb894', 'imammlydi892@gmail.com', 'Imam Mulyadi', NULL, '-', '6281297137109', 'Strata 1 (S1)', 'Backend Developer', '0', '', '', NULL, NULL, 'CV-Imam Mulyadi--.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:47:59', '2024-08-08 04:47:59'),
('ae2c3912-234b-41da-972f-e78371655cec', 'frakadifa@gmail.com', 'MUHAMMAD FIKRAN RAKADIFA RAMADHAN', NULL, '-', '081389622187', 'Strata 1 (S1)', 'UI/UX Developer', '0', '', '', NULL, NULL, 'MUHAMMAD FIKRAN RAKADIFA RAMADHAN CV-2.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:57:32', '2024-08-08 04:57:32'),
('b81ecd59-9f3e-4af9-8d41-5c24e655ffcc', 'yogaagungprasetio24@gmail.com', 'Yoga Agung Prasetio', NULL, 'Surabaya', '0881080002564', 'Opsi Lainnya', 'Backend Developer', '0', '', '', NULL, NULL, 'CV Yoga Agung Prasetio.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:51:11', '2024-08-08 04:51:11'),
('b98f75cc-76ef-4b4b-9260-4263c0fc588a', 'danialabrorr@gmail.com', 'Danial Abror', NULL, '-', '6283897020615', 'Sekolah Menengah Kejuruan (SMK)', 'Backend Developer', '0', '', '', NULL, NULL, 'DANIAL ABROR.pdf', 0, 0, 0, 0, NULL, '2024-08-07 08:08:52', '2024-08-07 08:08:52'),
('bfa66f9d-d2ec-478e-83bc-30327f248f4d', 'mahendrafathan@gmail.com', 'Mahendra Fakhrul Fathan', NULL, 'Tegalmulyo, Gergungung, Klaten Utara, Klaten', '6281386387645', 'Strata 1 (S1)', 'Backend Developer', '0', '', '', NULL, NULL, 'CV - Mahendra Fakhrul Fathan (2)-4.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:15:50', '2024-08-08 04:15:50'),
('c7208f14-5635-4d3e-abbb-1af3adcae028', 'aldiirsanmajid@gmail.com', 'Aldi Irsan Majid A.Md.Kom', NULL, 'Pertanian III Street, No.16-17\r\nRT.14/RW.5, Ps. Minggu, Kec. Ps.\r\nMinggu, Jakarta Selatan City,\r\nDaerah Khusus Ibukota Jakarta\r\n12520', '6282235539449', 'Diploma 3 (D3)', 'Frontend Developer', '0', '', '', NULL, NULL, 'CV Aldi Irsan Majid English 2024.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:21:55', '2024-08-08 04:21:55'),
('dd2be287-aebc-413c-9c82-9146d3191daf', 'sienkhumaen@gmail.com', 'Sien Khumaen D.', NULL, '-', '085856209361', 'Sekolah Menengah Kejuruan (SMK)', 'Frontend Developer', '0', '', '', NULL, NULL, 'Damarwendha.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:53:06', '2024-08-08 04:53:06'),
('de456e97-f830-4c8e-85b4-64beacdb96c3', 'deborapuspitasarisih@gmail.com', 'Debora Puspita Sarisih', NULL, 'jalan Stasiun KA 10, purwosari komal , Kab. pemalang', '085879021994', 'Strata 1 (S1)', 'UI/UX Developer', '0', '', '', NULL, NULL, 'CV Debora Puspita Sarisih.pdf', 0, 0, 0, 0, NULL, '2024-08-08 06:35:30', '2024-08-08 06:35:30'),
('e0e8100a-76c7-463c-9df3-2f4a2ebfaec2', 'firlydanisyifanaputra@gmail.com', 'FIRLYDANI SYIFANA PUTRA', NULL, 'Brebes', '6282325607247', 'Strata 1 (S1)', 'Backend Developer', '0', '', '', NULL, NULL, 'RESUME FIRLYDANI SYIFANA PUTRA.pdf', 0, 0, 0, 0, NULL, '2024-08-08 06:56:16', '2024-08-08 06:56:16'),
('e26ea966-a8ea-4a17-8228-6c3a5b9b7fcd', 'jumrainijamaluddin@gmail.com', 'Jumraini J Jamaluddin', NULL, 'Makassar', '081524370802', 'Opsi Lainnya', 'UI/UX Developer', '0', '', '', NULL, NULL, 'CV_Jumraini J Jamaluddin UIUX.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:50:46', '2024-08-08 04:50:46'),
('e4cb00d5-99af-4d6d-a9c7-19dbf446aaf8', 'getukg12@gmail.com', 'SUPRIYANTO', NULL, 'Purwokerto', '08979355291', 'Diploma 3 (D3)', 'Fullstack Developer', '0', '', '', NULL, NULL, 'CV - SUPRIYANTO.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:05:44', '2024-08-08 04:05:44'),
('e746dff8-8166-4a34-a2a5-c9e357058b2e', 'bocahangon64@gmail.com', 'AMIR  MUNADIR', NULL, '-', '082323907426', 'Sekolah Menengah Kejuruan (SMK)', 'Mobile Developer', '0', '', '', NULL, NULL, 'Amir.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:17:40', '2024-08-08 04:17:40'),
('e7f54733-c994-4ee0-be49-d8c5dfae1329', 'Farchanakbar80@gmail.com', 'Farchan Akbar', NULL, 'Desa Paseban, Kab.Tebo, Jambi', '6282186491240', 'Strata 1 (S1)', 'Mobile Developer', '0', '', '', NULL, NULL, 'CV Farchan Akbar.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:29:56', '2024-08-08 04:29:56'),
('eb56d500-ad7c-459f-a8da-8b7ea76c3402', 'Istifah121@gmail.com', 'ISTIFAH', NULL, 'Jln. Sukasenang Raya no.3. Cibeunying Kidul. Kota Bandung Jawa Barat', '082284548212', 'Strata 1 (S1)', 'UI/UX Developer', '0', '', '', NULL, NULL, 'CV-Istifah.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:44:30', '2024-08-08 04:44:30'),
('efc13d84-5d54-4fcf-8e1e-a7a2cc66b30a', 'farhan.yudhi1199@gmail.com', 'FARHAN YUDHI FATAH', NULL, 'Panorama Jatinangor, Sumedang Regency, West Java Province, Indonesia', '082145676379', 'Strata 1 (S1)', 'Fullstack Developer', '0', '', '', NULL, NULL, 'Farhan Yudhi Fatah-resume.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:42:05', '2024-08-08 04:42:05'),
('f4149523-6ba8-44a5-a17f-e9745199e288', 'jaka.sahroni@gmail.com', 'Jaka Sahroni', NULL, '-', '6285863397825', 'Strata 1 (S1)', 'UI/UX Developer', '0', '', '', NULL, NULL, 'CV_Jaka Sahroni.pdf', 0, 0, 0, 0, NULL, '2024-08-08 06:29:29', '2024-08-08 06:29:29'),
('f6a95a3c-c7e2-4979-92d0-55bcd22634d1', 'devs.randi@gmail.com', 'Randi Maulana Akba', NULL, '-', '081934644920', 'Strata 1 (S1)', 'Mobile Developer', '0', '', '', NULL, NULL, 'Randi.pdf', 0, 0, 0, 0, NULL, '2024-08-08 05:00:21', '2024-08-08 05:00:21'),
('fc89cede-b75b-4c48-82ab-597479031954', 'Adhasetiawanwiyana@gmail.com', 'Adha Setiawan Wiyana', NULL, 'Kakap 09, Sungai Dama, Samarinda Ilir Samarinda, Kalimantan Timur 75115', '085190042893', 'Strata 1 (S1)', 'Mobile Developer', '0', '', '', NULL, NULL, 'Adha Wiyana - CV.pdf', 0, 0, 0, 0, NULL, '2024-08-08 04:27:43', '2024-08-08 04:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `service_sections`
--

CREATE TABLE `service_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_sections`
--

INSERT INTO `service_sections` (`id`, `title`, `subtitle`, `image_path`, `created_at`, `updated_at`) VALUES
(2, 'IT Solutions', 'Kami menawarkan solusi teknologi informasi yang inovatif dan terintegrasi, mulai dari pengembangan sistem web hingga aplikasi khusus yang disesuaikan dengan kebutuhan bisnis Anda.', 'zmi-services (1).png', NULL, '2024-08-07 10:10:41'),
(3, 'Multimedia', 'Tim kami terampil dalam menciptakan konten multimedia yang menarik dan profesional, termasuk desain grafis, animasi, dan pengembangan konten visual yang memukau.', 'zmi-services (2).png', '2024-07-08 01:48:21', '2024-08-07 10:11:34'),
(4, 'Animasi Explainer', 'Kami menghadirkan animasi explainer yang kreatif dan informatif, membantu Anda menyampaikan pesan kompleks secara visual untuk menarik bagi audiens Anda.', 'zmi-services (3).png', '2024-07-08 01:48:40', '2024-08-07 10:11:43'),
(5, 'BlockChain System & Exchanger', 'Kami meningkatkan visibilitas dan branding perusahaan Anda melalui teknologi blockchain yang aman. Sistem kami mendukung pertukaran aset digital cepat dan efisien.', 'zmi-services (5).png', '2024-07-08 01:49:10', '2024-08-07 10:12:06'),
(10, 'Advertising', 'Kami membantu meningkatkan visibilitas dan branding perusahaan Anda melalui kampanye iklan digital yang efektif dan strategis. Dengan pemasaran konten yang relevan dan menarik.', 'zmi-services (4).png', '2024-07-26 07:02:47', '2024-08-07 10:12:21'),
(11, 'Trainer', 'Kami membuka layanan pelatihan dalam multimedia, broadcasting, IT, dan lainnya. Program kami dirancang untuk meningkatkan keterampilan dan pengetahuan Anda dengan pendekatan praktis dan instruktur berpengalaman.', 'zmi-services (6).png', '2024-07-26 08:41:35', '2024-08-07 10:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AbKSuAEjdFVeJ8uwCyXiYHjT4RU8MEm0ewUr1vCS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM212TDBEOXJBR0ZHazNTQTliOVgxemVIYjdiOVg2em5INzFoaEI1RSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly96ZW4tbXVsdGltZWRpYS50ZXN0L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1724589423),
('IDAozFTn0JIBPSFX7FdzQzzMvu8XHfzYD2tjcN24', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSGlKSklyZGNxRmpFdzNldVNxTFE2elo3QWM4aENNQlJHWnF3OGszZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly96ZW4tbXVsdGltZWRpYS50ZXN0Ijt9fQ==', 1724408352);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nanang Supriatna', 'zenweb.verifikasi@gmail.com', '2024-08-01 10:14:16', '$2y$12$ObRz1kLYYWvu8Zyc6/CAoOe7AKL543zAioVoP/3DUN40th8o7WSDq', 'admin', '5jbhk6FWzsgx51rNWL4ynEasWnKElR8KQkRaOBxjJXvKA193CXeougsGwZg5', '2024-07-08 01:17:46', '2024-08-16 07:39:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_sections`
--
ALTER TABLE `about_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cache_key_unique` (`key`);

--
-- Indexes for table `client_sections`
--
ALTER TABLE `client_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_email_unique` (`email`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `email_2` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footer_sections`
--
ALTER TABLE `footer_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galery_sections`
--
ALTER TABLE `galery_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_sections`
--
ALTER TABLE `hero_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latest_projects`
--
ALTER TABLE `latest_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruitments`
--
ALTER TABLE `recruitments`
  ADD PRIMARY KEY (`uuid`),
  ADD UNIQUE KEY `recruitments_email_unique` (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `service_sections`
--
ALTER TABLE `service_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `about_sections`
--
ALTER TABLE `about_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cache`
--
ALTER TABLE `cache`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `client_sections`
--
ALTER TABLE `client_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_sections`
--
ALTER TABLE `footer_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galery_sections`
--
ALTER TABLE `galery_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hero_sections`
--
ALTER TABLE `hero_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `latest_projects`
--
ALTER TABLE `latest_projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_sections`
--
ALTER TABLE `service_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
