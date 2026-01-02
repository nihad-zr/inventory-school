-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 02 jan. 2026 à 18:07
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `inventory_school`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@school.com', '$2y$12$eVWSR9m0kgN/AgSasavTqu2e3akJfYfxikxklEaIrACzpb23pif.O', '2025-12-30 10:27:50', '2025-12-30 10:27:50');

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `specialty` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `phone`, `birth_date`, `birth_place`, `position`, `specialty`, `photo`, `cv`, `created_at`, `updated_at`) VALUES
(2, 'nihad', 'zair', 'zair@gmail.com', '0557606136', '2025-12-30', 'sba', 'Administration', NULL, '1767107043_WhatsApp Image 2025-10-15 at 3.02.42 PM (1).jpeg', '1767107043_Cv ATS Zair Nihad.pdf', '2025-12-30 15:04:03', '2025-12-30 15:04:03');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'good',
  `location` varchar(255) NOT NULL DEFAULT 'قسم 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `product_id`, `item_id`, `etat`, `location`, `created_at`, `updated_at`) VALUES
(1, 'SAB-01', 'SAB-01S001', 'broken', 'Section 2', '2025-12-30 14:50:31', '2025-12-30 21:15:24'),
(2, 'SAB-01', 'SAB-01S002', 'broken', 'Section 1', '2025-12-30 14:50:31', '2025-12-30 21:15:24'),
(3, 'SAB-01', 'SAB-01S003', 'broken', 'Stock', '2025-12-30 14:50:31', '2025-12-30 21:15:24'),
(4, 'SAB-01', 'SAB-01S004', 'good', 'Stock', '2025-12-30 14:50:31', '2025-12-30 21:15:24'),
(5, 'SAB-01', 'SAB-01S005', 'good', 'Administration', '2025-12-30 14:50:31', '2025-12-30 21:15:24'),
(6, 'CHA-01', 'CHA-01C001', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(7, 'CHA-01', 'CHA-01C002', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(8, 'CHA-01', 'CHA-01C003', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(9, 'CHA-01', 'CHA-01C004', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(10, 'CHA-01', 'CHA-01C005', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(11, 'CHA-01', 'CHA-01C006', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(12, 'CHA-01', 'CHA-01C007', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(13, 'CHA-01', 'CHA-01C008', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(14, 'CHA-01', 'CHA-01C009', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(15, 'CHA-01', 'CHA-01C010', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(16, 'CHA-01', 'CHA-01C011', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(17, 'CHA-01', 'CHA-01C012', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(18, 'CHA-01', 'CHA-01C013', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(19, 'CHA-01', 'CHA-01C014', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(20, 'CHA-01', 'CHA-01C015', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(21, 'CHA-01', 'CHA-01C016', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(22, 'CHA-01', 'CHA-01C017', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(23, 'CHA-01', 'CHA-01C018', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(24, 'CHA-01', 'CHA-01C019', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28'),
(25, 'CHA-01', 'CHA-01C020', 'good', 'Section 1', '2025-12-31 11:29:31', '2025-12-31 11:30:28');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `login_histories`
--

CREATE TABLE `login_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `login_histories`
--

INSERT INTO `login_histories` (`id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-12-30 10:28:17', '2025-12-30 10:28:17'),
(2, 1, '2025-12-30 14:20:10', '2025-12-30 14:20:10'),
(3, 1, '2025-12-30 14:28:12', '2025-12-30 14:28:12'),
(4, 1, '2025-12-30 14:51:09', '2025-12-30 14:51:09'),
(5, 1, '2025-12-30 15:02:19', '2025-12-30 15:02:19'),
(6, 1, '2025-12-30 15:39:48', '2025-12-30 15:39:48'),
(7, 1, '2025-12-30 20:01:27', '2025-12-30 20:01:27'),
(8, 1, '2025-12-31 11:28:29', '2025-12-31 11:28:29');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_27_175517_create_admins_table', 1),
(5, '2025_12_27_185359_create_login_histories_table', 1),
(6, '2025_12_27_205836_create_products_table', 1),
(7, '2025_12_28_211042_create_items_table', 1),
(8, '2025_12_28_215945_add_id_custom_to_products_table', 1),
(9, '2025_12_30_104514_create_employees_table', 1),
(10, '2025_12_30_114543_add_id_custom_to_items_table', 2),
(11, '2025_12_30_151256_create_items_table', 3),
(12, '2025_12_30_154959_create_items_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_custom` varchar(255) NOT NULL,
  `produit` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `id_custom`, `produit`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'SAB-01', 'sabour', 5, '2025-12-24 10:01:00', '2025-12-24 10:01:00'),
(2, 'CHA-01', 'Chaire', 20, '2025-12-31 10:01:00', '2025-12-31 10:01:00');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0b5QgGukTISKUb65eNWPStPsexDZoRQh0F9zHGHf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieEdRdUhTNVBxeVZ5NmpOQWxlTmw1blh6Z2dzYVdEaUJWQVlFU3pUMiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MzoiaHR0cDovL3NjaG9vbF9pbnZlbnRvcnkudGVzdC9hZG1pbi9wcm9kdWN0cyI7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vc2Nob29sX2ludmVudG9yeS50ZXN0L2FkbWluL3Byb2R1Y3RzIjtzOjU6InJvdXRlIjtzOjE0OiJwcm9kdWN0cy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767104379),
('AVdtOcjSC5pgNe5ELQUN3Zyh5AM3kJqb5WRtlJXI', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU29tN2hBM3YxZklmRHJMbVg4TDVhQ3R6VTBsRllZR2RNZlRycURCdSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9zY2hvb2xfaW52ZW50b3J5LnRlc3QvYWRtaW4vc2NhbiI7czo1OiJyb3V0ZSI7czoxNToiYWRtaW4uc2Nhbi5wYWdlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1767129925),
('DuBCyuJIieqdo6g1Bae8QVkR1trH6hCx2pkPuuUf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidkpQQVEzOVRyVWxNMjFaWk9rVlpSYVp2WmVrYmVsaDdWQUNCeXY3VCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NDoiaHR0cDovL3NjaG9vbF9pbnZlbnRvcnkudGVzdC9hZG1pbi9kYXNoYm9hcmQiO31zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo0NDoiaHR0cDovL3NjaG9vbF9pbnZlbnRvcnkudGVzdC9hZG1pbi9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTU6ImFkbWluLmRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767180459),
('fCCO8m5XRds9dRiwxvUL8rc8EbZO23wiFdaFWRVG', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRENuQ1A3R1JNZzZ1b05ha00yRjloNm1GSkI2YWhPRGhxSzlzdkRCNyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NDoiaHR0cDovL3NjaG9vbF9pbnZlbnRvcnkudGVzdC9hZG1pbi9kYXNoYm9hcmQiO31zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo0MjoiaHR0cDovL3NjaG9vbF9pbnZlbnRvcnkudGVzdC9hZG1pbi9pdGVtcy8xIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1767109329),
('lJMmJMC2ljygxN6dJq8nZMLIqIYY1dHrBBW6ZKov', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRWJ3eVlFcDdQcnREa0gyOUdwSjU2V0JSaHRyOHZhSVh0T0NVeXdnaSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9zY2hvb2xfaW52ZW50b3J5LnRlc3QvYWRtaW4vZGFzaGJvYXJkIjtzOjU6InJvdXRlIjtzOjE1OiJhZG1pbi5kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1767180721),
('W47HCle8oWMJKaKBr021ID6UkOp1oJIwGOk8q4qS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVFhCdnlZcjhMZ2RrN2V2SGozZGdqc0VVUnVreG55STRicnV6SnpaRyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0ODoiaHR0cDovL3NjaG9vbF9pbnZlbnRvcnkudGVzdC9hZG1pbi9pdGVtcy8yL3ByaW50Ijt9czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9zY2hvb2xfaW52ZW50b3J5LnRlc3QvYWRtaW4vbG9naW4iO3M6NToicm91dGUiO3M6NToibG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1767257186),
('YoBgxENpEAvll9WGqQZ27nk3YofoteOBO9hL1ThH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUmhKSGxOVXByd2tvalVWc1FJbGlHb1hHY2h2R0x1QVowUVRyd1hhTSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9zY2hvb2xfaW52ZW50b3J5LnRlc3QiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1767180459);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_item_id_unique` (`item_id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `login_histories`
--
ALTER TABLE `login_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_histories_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_id_custom_unique` (`id_custom`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `login_histories`
--
ALTER TABLE `login_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `login_histories`
--
ALTER TABLE `login_histories`
  ADD CONSTRAINT `login_histories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
