-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 04:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_donasiyuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `orphanage_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `proof` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `user_id`, `orphanage_id`, `payment_id`, `amount`, `proof`, `created_at`, `updated_at`) VALUES
(1, 7, 5, 1, 50000, 'payment_proofs/ViMZvKegre2kXSqMdmFgOpcesU4fhMDFAA6IdAMt.jpg', '2020-12-25 12:13:32', '2020-12-25 12:13:32'),
(2, 9, 5, 1, 20000, 'payment_proofs/dKYCjeDuf179mDE3HJkY6PsnBujTugN2rn6gzMNI.jpg', '2020-12-25 12:39:27', '2020-12-25 12:39:27'),
(3, 9, 5, 1, 100000, 'payment_proofs/0Mn9lhJU7b26FW1Y2BXVAbycBqaJ1Ig5lDJmD7dA.jpg', '2020-12-25 12:39:40', '2020-12-25 12:39:40'),
(4, 10, 7, 1, 20000, 'payment_proofs/F8DKsvdgUeUoKpNLAVUrq66HT9ndtnUpKwceQb1I.jpg', '2021-01-03 07:26:55', '2021-01-03 07:26:55');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orphanage_id` bigint(20) UNSIGNED NOT NULL,
  `media` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `orphanage_id`, `media`, `created_at`, `updated_at`) VALUES
(1, 5, 'orphanage_galleries/MGFCm1zyBmPXy7hgk8tTcRNkwsqEb3KPsFOlVjcI.jpg', '2020-12-25 10:44:59', '2020-12-25 10:44:59'),
(2, 5, 'orphanage_galleries/sAI53Cpd7DukygdgiKDo8nfHZjutYjTlKGRB6PbD.jpg', '2020-12-25 10:47:01', '2020-12-25 10:47:01'),
(3, 7, 'orphanage_galleries/WpnFf9BTJoUYi8RpamOHBSXBT0yDb05tAdp35fxZ.jpg', '2021-01-03 07:24:46', '2021-01-03 07:24:46'),
(4, 7, 'orphanage_galleries/1I376JwgkWbjH0RKncd5zt6zrrgqltnflmWIO5zp.jpg', '2021-01-03 07:24:56', '2021-01-03 07:24:56');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_22_161146_create_orphanages_table', 1),
(5, '2020_12_22_161205_create_profiles_table', 1),
(6, '2020_12_22_161646_create_transactions_table', 1),
(7, '2020_12_22_161658_create_donations_table', 1),
(8, '2020_12_23_165147_create_payments_table', 1),
(9, '2020_12_25_164849_create_galleries_table', 2),
(10, '2021_01_03_144351_create_students_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orphanages`
--

CREATE TABLE `orphanages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kids` int(11) DEFAULT NULL,
  `needs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `structure_media` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_media` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_media` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orphanages`
--

INSERT INTO `orphanages` (`id`, `user_id`, `payment_id`, `slug`, `name`, `address`, `kids`, `needs`, `structure_media`, `activity_media`, `building_media`, `account_number`, `created_at`, `updated_at`) VALUES
(4, 5, 1, 'panti-kasih-bunda', 'Panti Kasih Bunda', NULL, NULL, NULL, 'structure_media/3d8LCXR08RadRVPr2oOoJPu9JWfqmd48bopZBFk0.pdf', 'activity_media/mbuP6H3rBbDHagxQOb6NlRHFKAHlaYDAApvFljr5.png', 'activity_media/mbuP6H3rBbDHagxQOb6NlRHFKAHlaYDAApvFljr5.png', '1103184149', '2020-12-23 11:19:51', '2020-12-23 11:19:51'),
(5, 7, 1, 'panti-kasih-kasih-p3l6y0XwugBu8ppvJRpH', 'Panti Kasih Kasih', 'Jl. Dago , Bandung', 25, 'Butuh banyak ni', 'structure_media/YtIUtecEbg9lQShH4TfzgOxSADioNHBMCGSN1xZg.pdf', 'activity_media/iEiWRBGeuBRjuIxgWxJWRdlCL8KhZbhspL9CoxA4.jpg', 'building_media/dWfNiAdCiq5vOCKrxaOuYFhcWno34EaWYy10IQdH.png', '121231321', '2020-12-25 07:21:41', '2020-12-25 09:23:45'),
(6, 8, 5, 'panti-saling-kasih-5eHP5sJlU26KrdSx9vFx', 'Panti Saling Kasih', 'Jl Buah Batu Bandung', 300, '12345', 'structure_media/xFxqzIkEvNltSXCNmdDt2hbrqN5CtwWG6Y91COy7.pdf', 'activity_media/31cpH12WYFNJssDSv7lmCFeukn6Bj8NgdGGjPdkf.jpg', 'building_media/VD1Y9guGsLOQgb4Evm9mLAjXlY2uofyMcYq8PQ0q.jpg', '1103184149', '2020-12-25 09:34:16', '2020-12-25 09:34:45'),
(7, 11, 1, 'panti-tes-KxuJUExGylbannpfkJrJ', 'Panti Tes', NULL, NULL, NULL, 'structure_media/JipvbD0f57JXxJrSioEtBzURVvTftFuvwgyNf6Ll.pdf', 'activity_media/vjzN06FiKV2nsRNNyh2TtU3CBdQ8NMKFMEjNNNNS.jpg', 'building_media/9KVxARoixNZlSj8MlFCVXSFC7UIjP5sTbLNdd1Ux.jpg', '08129932193213120', '2021-01-03 07:24:17', '2021-01-03 07:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `method`, `slug`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Bank BNI', 'bank-bni', '/img/payment/bni.png', NULL, NULL),
(2, 'Bank BRI', 'bank-bri', '/img/payment/bri.png', NULL, NULL),
(3, 'Bank Mandiri', 'bank-mandiri', '/img/payment/mandiri.png', NULL, NULL),
(4, 'Bank BCA', 'bank-bca', '/img/payment/bca.png', NULL, NULL),
(5, 'Shopee Pay', 'shopee-pay', 'img/payment/shopee.png', NULL, NULL),
(6, 'GOPAY', 'gopay', '/img/payment/gopay.png', NULL, NULL),
(7, 'DANA', 'dana', '/img/payment/dana.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `phone_number`, `photo`, `created_at`, `updated_at`) VALUES
(1, 6, '081299424101', 'profile_images/UBvztMGDbLhXmwxHxEtSS6NboHo6DwPTEc5nlP2V.jpg', NULL, '2020-12-25 13:32:31'),
(2, 9, NULL, NULL, NULL, NULL),
(3, 10, NULL, NULL, '2021-01-03 07:20:01', '2021-01-03 07:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `orphanage_id` bigint(20) UNSIGNED NOT NULL,
  `payment_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `orphanage_id`, `payment_slug`, `amount`, `created_at`, `updated_at`) VALUES
(1, 7, 5, 'bank-bni', 50000, '2020-12-25 11:46:58', '2020-12-25 11:46:58'),
(2, 9, 5, 'bank-bni', 20000, '2020-12-25 12:39:21', '2020-12-25 12:39:21'),
(3, 9, 5, 'bank-bni', 100000, '2020-12-25 12:39:34', '2020-12-25 12:39:34'),
(4, 10, 7, 'bank-bni', 20000, '2021-01-03 07:26:08', '2021-01-03 07:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Rizqy Eka Putra Rizaldy', 'orphanage', 'rizqyep@student.telkomuniversity.ac.id', NULL, '$2y$10$2kf6ht7KlwzigxJ9ViOfIu4n14NfOssSzkwzaFKkpI47QOMCw5CEi', NULL, '2020-12-23 11:10:07', '2020-12-23 11:10:07'),
(4, 'R E P RIZALDY', 'orphanage', 'rizqyepr@gmail.com', NULL, '$2y$10$y2aEZAFn0qcpszNOEwmfAuvYEdHIYVTHMlZYz/6dImWwWwra9nO.y', NULL, '2020-12-23 11:15:17', '2020-12-23 11:15:17'),
(5, 'Rizqy Eka Putra Rizaldy', 'orphanage', 'rizqyepr@student.telkomuniversity.ac.id', NULL, '$2y$10$qxv/Ozo6NCv7PuW9MfzcGunOZgbwdMOi.nkVMFkS5UtaeW2lxF3gq', NULL, '2020-12-23 11:19:51', '2020-12-23 11:19:51'),
(6, 'Rizqy Eka Putra Rizaldy', 'user', 'rizqyeprtt@student.telkomuniversity.ac.id', NULL, '$2y$10$tZZusA29.jUOVBSbGRL8ZeCUhdmMh2if2EMBgYf81jqWXKfnit3Fm', NULL, '2020-12-25 06:49:02', '2020-12-25 06:49:02'),
(7, 'Rep', 'orphanage', 'rep@rep.com', NULL, '$2y$10$Oxt81oX7C5pLVAm5vpJVXuPBxZ19kQ3OhGVPqvD.MRFHpXk3Xj1IC', NULL, '2020-12-25 07:21:40', '2020-12-25 07:21:40'),
(8, 'Rep', 'orphanage', 'rep2@rep.com', NULL, '$2y$10$H2NTfq/jFeJUFBeoMhwam.Y9MEMuFIarQVtMjo1iRTVmTw0EqRszG', NULL, '2020-12-25 09:34:16', '2020-12-25 09:34:16'),
(9, 'Rizqy Eka Putra Rizaldy', 'user', 'rizqyeppp@student.telkomuniversity.ac.id', NULL, '$2y$10$OeaetDpZE.ziiCNC5YGi2uR4GUcrW88hqkld4fdVwbzXeb/sWSICW', NULL, '2020-12-25 12:39:10', '2020-12-25 12:39:10'),
(10, 'Tes', 'user', 'tes@tes.com', NULL, '$2y$10$qrC5IOaCVFOgVLrPbAOMNerJ14V1VgfszsiiCvG4UqUO93ISijCqa', NULL, '2021-01-03 07:20:01', '2021-01-03 07:20:01'),
(11, 'Tes', 'orphanage', 'tes@tes2.com', NULL, '$2y$10$AMk6oQaB7RN1m6mza0rvoOGwgdzUR8li223J8H0ZHGacj6Y82BWUa', NULL, '2021-01-03 07:24:17', '2021-01-03 07:24:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orphanages`
--
ALTER TABLE `orphanages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orphanages`
--
ALTER TABLE `orphanages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
