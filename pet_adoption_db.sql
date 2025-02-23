-- phpMyAdmin SQL Dump
-- version 5.2.2-1.fc41
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2025 at 05:27 PM
-- Server version: 8.0.40
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet_adoption_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adopters`
--

CREATE TABLE `adopters` (
  `id` bigint UNSIGNED NOT NULL,
  `animal_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adoption_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adopters`
--

INSERT INTO `adopters` (`id`, `animal_id`, `name`, `phone`, `email`, `street`, `city`, `state`, `adoption_date`, `created_at`, `updated_at`) VALUES
(8, 59, 'camila', '2414124', 'rudnikleandro@gmail.com', 'Rua Chrysogno Maia', 'Mafra', 'SC', '2025-01-17', '2025-01-18 02:55:24', '2025-01-18 02:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` double DEFAULT NULL,
  `veterinary_info` text COLLATE utf8mb4_unicode_ci,
  `shelter_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `age`, `gender`, `breed`, `size`, `weight`, `veterinary_info`, `shelter_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(33, 'Mel', 2, 'female', 'SDR', 'medium', NULL, '{\"rabies_vaccine\":\"on\"}', 1, NULL, '2025-01-02 19:30:11', '2025-01-17 04:31:57'),
(34, 'Jack', 4, 'male', 'SDR', 'medium', NULL, NULL, 1, NULL, '2025-01-02 19:30:31', '2025-01-02 19:30:31'),
(35, 'Max', 5, 'male', 'SDR', 'small', NULL, 'Vermifugado', 1, NULL, '2025-01-02 19:30:53', '2025-01-02 19:30:53'),
(36, 'Bob', 4, 'male', 'SDR', 'large', NULL, 'Castrado, Vermifugado', 1, NULL, '2025-01-02 19:31:19', '2025-01-02 19:31:19'),
(37, 'Kika', 1, 'female', 'SDR', 'small', NULL, 'Castrada', 1, NULL, '2025-01-02 19:31:38', '2025-01-02 19:31:38'),
(38, 'Princesa', 7, 'female', 'SDR', 'large', NULL, 'Castrada', 1, NULL, '2025-01-02 19:31:57', '2025-01-02 19:31:57'),
(39, 'Zeca', 2, 'male', 'SDR', 'small', NULL, NULL, 1, NULL, '2025-01-02 19:32:34', '2025-01-02 19:32:34'),
(40, 'Simba', 8, 'male', 'SDR', 'medium', NULL, 'Vermifugado', 1, NULL, '2025-01-02 19:32:50', '2025-01-02 19:32:50'),
(41, 'Luna', 10, 'female', 'SDR', 'medium', NULL, NULL, 1, NULL, '2025-01-02 19:33:14', '2025-01-02 19:33:14'),
(42, 'Belinha', 3, 'female', 'SDR', 'medium', NULL, NULL, 1, NULL, '2025-01-02 19:33:45', '2025-01-02 19:33:45'),
(43, 'Pereba', 3, 'male', 'SDR', 'small', NULL, NULL, 1, NULL, '2025-01-02 19:34:07', '2025-01-02 19:34:07'),
(44, 'Juarez', 2, 'male', 'SDR', 'small', NULL, 'Nenhuma', 2, NULL, '2025-01-13 21:48:39', '2025-01-13 21:48:39'),
(45, 'Meg', 3, 'female', 'SDR', 'small', NULL, 'bla\'blá blá', 2, NULL, '2025-01-14 00:59:29', '2025-01-14 00:59:29'),
(59, 'abcdfe', 2, 'male', '3', 'small', 2, NULL, 1, NULL, '2025-01-18 02:55:02', '2025-01-18 02:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `animal_photos`
--

CREATE TABLE `animal_photos` (
  `id` bigint UNSIGNED NOT NULL,
  `animal_id` bigint UNSIGNED NOT NULL,
  `photo_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animal_photos`
--

INSERT INTO `animal_photos` (`id`, `animal_id`, `photo_path`, `created_at`, `updated_at`) VALUES
(40, 33, 'animal_photos/034B1JYmAwnzXSjzJAqlKJWoiQIF6an0lBbZe0Cf.jpg', '2025-01-02 19:30:11', '2025-01-02 19:30:11'),
(41, 34, 'animal_photos/JiGAtG6TEvP6cDcgSaZYeRe5G5oh0RoSf9OB4pwZ.png', '2025-01-02 19:30:31', '2025-01-02 19:30:31'),
(42, 35, 'animal_photos/wItg1vOe8fj9EzJsjSt1Mmv1eGc4uHqKHWdZ9gtT.jpg', '2025-01-02 19:30:53', '2025-01-02 19:30:53'),
(43, 36, 'animal_photos/b9JJ2qB90qdUqYxtJXmGMf82tikefx16u0DgiytA.jpg', '2025-01-02 19:31:19', '2025-01-02 19:31:19'),
(44, 37, 'animal_photos/ibfYGYQkuuYW4XPuXumMPpVg7hJ0nv3VGZGCBQqb.jpg', '2025-01-02 19:31:38', '2025-01-02 19:31:38'),
(45, 38, 'animal_photos/QaCtVICOVE5nNgIy1rUdP58SrxrlbAeZe6p6rWpF.png', '2025-01-02 19:31:57', '2025-01-02 19:31:57'),
(46, 39, 'animal_photos/oIoyfr4STnAjjBr0UDIITagh0UpyfqfRWWjb4gKq.jpg', '2025-01-02 19:32:34', '2025-01-02 19:32:34'),
(47, 40, 'animal_photos/0rv28Huj76x1AaFn7WbgFmCEnwzXRVh3643MxEMo.jpg', '2025-01-02 19:32:50', '2025-01-02 19:32:50'),
(48, 41, 'animal_photos/0JqMdFsMukrqtPeqGNmzWzAFZJNpS5flTHZO7e6y.jpg', '2025-01-02 19:33:14', '2025-01-02 19:33:14'),
(49, 42, 'animal_photos/9JXLc7JzlKja1LQfvaQ8GHZOucEGgpQiW24e0aXk.jpg', '2025-01-02 19:33:45', '2025-01-02 19:33:45'),
(50, 43, 'animal_photos/XW706cCpuGKSGKN8fDHZ5K659WOh8KpNvltvYlFT.jpg', '2025-01-02 19:34:07', '2025-01-02 19:34:07'),
(51, 44, 'animal_photos/Pm7yVbKFnpSxDnuLoTWaPYOSRRwQIaEtN6e1V4yk.jpg', '2025-01-13 22:11:11', '2025-01-13 22:11:11'),
(53, 45, 'animal_photos/iwG3d6ziCs3RgaOZiioINSEHTZ2nYieFY60rSPS8.jpg', '2025-01-14 00:59:29', '2025-01-14 00:59:29'),
(55, 33, 'animal_photos/daHAVRBywkSYaK4gkWq0ofukqEsJ7iIN9RKEUOe9.png', '2025-01-17 05:44:36', '2025-01-17 05:44:36'),
(58, 59, 'animal_photos/SPP1R86sjrWSIxrv8uuf5FUPiw3QTNpc21FUey5g.png', '2025-01-18 02:55:02', '2025-01-18 02:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `animal_relationships`
--

CREATE TABLE `animal_relationships` (
  `id` bigint UNSIGNED NOT NULL,
  `animal_id` bigint UNSIGNED NOT NULL,
  `good_with_others` tinyint(1) NOT NULL DEFAULT '0',
  `dominant_with_others` tinyint(1) NOT NULL DEFAULT '0',
  `better_alone` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animal_relationships`
--

INSERT INTO `animal_relationships` (`id`, `animal_id`, `good_with_others`, `dominant_with_others`, `better_alone`, `created_at`, `updated_at`) VALUES
(1, 33, 0, 1, 0, '2025-01-17 04:31:16', '2025-01-17 04:31:16'),
(2, 34, 0, 0, 0, '2025-01-17 04:32:02', '2025-01-17 04:32:02'),
(4, 45, 0, 0, 0, '2025-01-17 05:01:04', '2025-01-17 05:01:04'),
(5, 36, 1, 1, 1, '2025-01-17 05:03:35', '2025-01-17 05:03:35'),
(11, 59, 1, 1, 0, '2025-01-18 02:55:02', '2025-01-18 02:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `energy_levels`
--

CREATE TABLE `energy_levels` (
  `id` bigint UNSIGNED NOT NULL,
  `animal_id` bigint UNSIGNED NOT NULL,
  `high_energy` tinyint(1) NOT NULL DEFAULT '0',
  `moderate_energy` tinyint(1) NOT NULL DEFAULT '0',
  `low_energy` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `energy_levels`
--

INSERT INTO `energy_levels` (`id`, `animal_id`, `high_energy`, `moderate_energy`, `low_energy`, `created_at`, `updated_at`) VALUES
(1, 33, 0, 1, 0, '2025-01-17 04:31:16', '2025-01-18 03:25:22'),
(2, 34, 0, 1, 0, '2025-01-17 04:32:02', '2025-01-17 04:32:09'),
(4, 45, 0, 0, 0, '2025-01-17 05:01:04', '2025-01-17 05:01:04'),
(5, 36, 1, 1, 1, '2025-01-17 05:03:35', '2025-01-17 05:11:18'),
(11, 59, 1, 1, 0, '2025-01-18 02:55:02', '2025-01-18 02:55:02');

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
(14, '0001_01_01_000000_create_users_table', 1),
(15, '0001_01_01_000001_create_cache_table', 1),
(16, '0001_01_01_000002_create_jobs_table', 1),
(17, '2024_12_16_120450_create_shelters_table', 1),
(18, '2024_12_16_130242_create_animals_table', 1),
(19, '2024_12_16_131707_create_adopters_table', 1),
(20, '2024_12_16_195612_create_animal_photos_table', 1),
(21, '2025_01_17_010422_update_animals_add_tables', 2);

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
('rudnikleandro@gmail.com', '$2y$12$oV0ZoQsfgCYXfdKJrHvXYuKb7NMvkWqdbKQx9NqiXjH/a62dh/N52', '2025-01-02 16:24:09');

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
('0OAY4Zxfdbcd3F0ICwuVnaQAYkgi7V3JZrI4zrSf', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiblFJRlFZaTVOMUZkOEtyZEN5MjdEeXF4aTFhTVVSMG14djVyMWdlQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTczNzE0NDM2NTt9fQ==', 1737149181),
('8mTg9WRVob8cyqcbiQCRQu29ouHaMgc5KH4vD7Wn', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiR2M2ZG9LdFh3ZnhYRmx1ZEkxU3hadUhINXZhMHRTdU5MZGxMQmo5OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTczNzE1NzI1OTt9fQ==', 1737161566),
('vBB6l6e3wvTvnPgXhoQhIgIfZjkd6e98zo2Rp1ek', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicDljQXFjYWI3QVdIeHE0dklFdGM4cHgwVWhoQmpwYU9vTnZPck9YSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1737322608);

-- --------------------------------------------------------

--
-- Table structure for table `shelters`
--

CREATE TABLE `shelters` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsible_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shelters`
--

INSERT INTO `shelters` (`id`, `name`, `cnpj`, `street`, `city`, `state`, `phone`, `responsible_name`, `created_at`, `updated_at`) VALUES
(1, 'Abrigo Teste', '00111222000110', 'Rua Teste', 'Cidade Teste', 'Estado Teste', '4899990011', 'Responsavel Teste', '2024-12-16 23:21:58', '2024-12-17 03:22:52'),
(2, 'Abrigo Teste 2', NULL, 'Abc', 'Rio Negro', 'PR', '47918238129', 'João', '2025-01-13 21:48:22', '2025-01-13 21:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `temperaments`
--

CREATE TABLE `temperaments` (
  `id` bigint UNSIGNED NOT NULL,
  `animal_id` bigint UNSIGNED NOT NULL,
  `calm` tinyint(1) NOT NULL DEFAULT '0',
  `playful` tinyint(1) NOT NULL DEFAULT '0',
  `protective` tinyint(1) NOT NULL DEFAULT '0',
  `agressive` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temperaments`
--

INSERT INTO `temperaments` (`id`, `animal_id`, `calm`, `playful`, `protective`, `agressive`, `created_at`, `updated_at`) VALUES
(1, 33, 0, 1, 0, 0, '2025-01-17 04:31:16', '2025-01-17 04:31:16'),
(2, 34, 0, 0, 0, 0, '2025-01-17 04:32:02', '2025-01-17 04:32:02'),
(4, 45, 0, 0, 0, 0, '2025-01-17 05:01:04', '2025-01-17 05:01:04'),
(5, 36, 1, 1, 1, 1, '2025-01-17 05:03:35', '2025-01-17 05:05:32'),
(11, 59, 0, 0, 1, 1, '2025-01-18 02:55:02', '2025-01-18 02:55:02');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Leandro Rudnik', 'rudnikleandro@gmail.com', NULL, '$2y$12$PKCJ51/lWl5EVfICneH2Qe.zFE7uA.S4Vg6nDHBdl/UrQIixPtiyG', 'yBpYbTtyHWyCNK3ZbJSTE2aLE5H1VZ8WBTlcdolOVE5bd1uKXhMtkLC0R6vg', '2024-12-16 23:21:25', '2024-12-16 23:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `veterinary_infos`
--

CREATE TABLE `veterinary_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `animal_id` bigint UNSIGNED NOT NULL,
  `rabies_vaccine` tinyint(1) NOT NULL DEFAULT '0',
  `polyvalent_vaccine` tinyint(1) NOT NULL DEFAULT '0',
  `giardia_vaccine` tinyint(1) NOT NULL DEFAULT '0',
  `flu_vaccine` tinyint(1) NOT NULL DEFAULT '0',
  `antiparasitic` tinyint(1) NOT NULL DEFAULT '0',
  `neutered` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `veterinary_infos`
--

INSERT INTO `veterinary_infos` (`id`, `animal_id`, `rabies_vaccine`, `polyvalent_vaccine`, `giardia_vaccine`, `flu_vaccine`, `antiparasitic`, `neutered`, `created_at`, `updated_at`) VALUES
(1, 33, 1, 0, 0, 0, 0, 0, '2025-01-17 04:31:16', '2025-01-17 04:31:16'),
(2, 34, 0, 0, 0, 0, 0, 0, '2025-01-17 04:32:02', '2025-01-17 04:32:02'),
(3, 53, 1, 0, 0, 0, 0, 0, '2025-01-17 04:58:44', '2025-01-17 04:58:44'),
(4, 45, 0, 1, 1, 1, 0, 0, '2025-01-17 05:01:04', '2025-01-17 05:01:15'),
(5, 36, 1, 1, 1, 1, 1, 1, '2025-01-17 05:03:35', '2025-01-17 05:03:35'),
(6, 54, 1, 0, 0, 1, 0, 1, '2025-01-17 05:18:16', '2025-01-17 05:18:16'),
(7, 55, 0, 0, 0, 0, 1, 0, '2025-01-17 05:39:47', '2025-01-17 05:39:47'),
(8, 56, 0, 0, 0, 0, 1, 0, '2025-01-17 05:40:59', '2025-01-17 05:40:59'),
(9, 57, 1, 0, 0, 0, 0, 0, '2025-01-17 05:45:09', '2025-01-17 05:45:09'),
(10, 58, 0, 1, 0, 0, 0, 0, '2025-01-17 23:06:40', '2025-01-17 23:06:40'),
(11, 59, 0, 0, 1, 0, 1, 1, '2025-01-18 02:55:02', '2025-01-18 02:55:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopters`
--
ALTER TABLE `adopters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adopters_animal_id_foreign` (`animal_id`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animals_shelter_id_foreign` (`shelter_id`);

--
-- Indexes for table `animal_photos`
--
ALTER TABLE `animal_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_photos_animal_id_foreign` (`animal_id`);

--
-- Indexes for table `animal_relationships`
--
ALTER TABLE `animal_relationships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_relationships_animal_id_foreign` (`animal_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `energy_levels`
--
ALTER TABLE `energy_levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `energy_levels_animal_id_foreign` (`animal_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shelters`
--
ALTER TABLE `shelters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temperaments`
--
ALTER TABLE `temperaments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `temperaments_animal_id_foreign` (`animal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `veterinary_infos`
--
ALTER TABLE `veterinary_infos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopters`
--
ALTER TABLE `adopters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `animal_photos`
--
ALTER TABLE `animal_photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `animal_relationships`
--
ALTER TABLE `animal_relationships`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `energy_levels`
--
ALTER TABLE `energy_levels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `shelters`
--
ALTER TABLE `shelters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temperaments`
--
ALTER TABLE `temperaments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `veterinary_infos`
--
ALTER TABLE `veterinary_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adopters`
--
ALTER TABLE `adopters`
  ADD CONSTRAINT `adopters_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_shelter_id_foreign` FOREIGN KEY (`shelter_id`) REFERENCES `shelters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `animal_photos`
--
ALTER TABLE `animal_photos`
  ADD CONSTRAINT `animal_photos_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `animal_relationships`
--
ALTER TABLE `animal_relationships`
  ADD CONSTRAINT `animal_relationships_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `energy_levels`
--
ALTER TABLE `energy_levels`
  ADD CONSTRAINT `energy_levels_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `temperaments`
--
ALTER TABLE `temperaments`
  ADD CONSTRAINT `temperaments_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
