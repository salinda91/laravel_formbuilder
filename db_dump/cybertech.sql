-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2020 at 12:59 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cybertech`
--

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `user_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 4, 'test', 'tehfsh afu fugsuyfgeufhu bshufsfuywge yegfyewg', '2020-07-09 04:39:54', NULL),
(2, 4, 'ysgfyud uydsg gfydgfydgy', 'dfsd sgysdydfg', '2020-07-09 05:26:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form_structures`
--

CREATE TABLE `form_structures` (
  `id` int(10) UNSIGNED NOT NULL,
  `form_id` int(11) NOT NULL,
  `label` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `css` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'form-control',
  `element_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `element` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_structures`
--

INSERT INTO `form_structures` (`id`, `form_id`, `label`, `type`, `name`, `css`, `element_id`, `element`, `required`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'dsfsd', 'text', 'dfs', 'form-control', 'dfsd', 'input', 0, 1, '2020-07-09 04:39:55', NULL),
(2, 1, 'fdsfd', 'number', 'dsfds', 'form-control', 'dsfsd', 'input', 0, 1, '2020-07-09 04:39:55', NULL),
(3, 1, 'fsdfds', 'select', 'sdfdsf', 'form-control', 'dsfs', 'select', 0, 1, '2020-07-09 04:39:55', NULL),
(4, 2, 'fdsfd', 'select', 'fsdf', 'form-control', 'sdfs', 'select', 0, 1, '2020-07-09 05:26:28', NULL),
(5, 2, 'fsdfds', 'textarea', 'fsdfs', 'form-control', 'sdfsd', 'textarea', 0, 1, '2020-07-09 05:26:28', NULL),
(6, 2, 'submit', 'submit', 'fdsf', 'btn btn-success', 'dsfsd', 'button', 0, 1, '2020-07-09 05:26:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `input_data`
--

CREATE TABLE `input_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `element` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `css` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'form-control',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `input_data`
--

INSERT INTO `input_data` (`id`, `name`, `element`, `type`, `css`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Select', 'select', 'select', 'form-control', 1, '2020-07-07 18:30:00', NULL),
(2, 'Text', 'input', 'text', 'form-control', 1, '2020-07-07 18:30:00', NULL),
(3, 'Date', 'input', 'date', 'form-control', 1, '2020-07-07 18:30:00', NULL),
(4, 'Time', 'input', 'time', 'form-control', 1, '2020-07-07 18:30:00', NULL),
(5, 'Number', 'input', 'number', 'form-control', 1, '2020-07-07 18:30:00', NULL),
(6, 'Textarea', 'textarea', 'textarea', '', 1, '2020-07-08 13:52:42', NULL),
(7, 'File', 'input', 'file', '', 1, '2020-07-08 13:57:40', NULL),
(8, 'Radio Button', 'radio', 'radio', '', 1, '2020-07-08 13:57:40', NULL),
(9, 'Check Box', 'checkbox', 'checkbox', '', 1, '2020-07-08 13:57:41', NULL),
(10, 'Submit Button', 'button', 'submit', '', 1, '2020-07-08 13:57:41', NULL),
(11, 'Reset Button', 'button', 'reset', '', 1, '2020-07-08 13:57:41', NULL),
(12, 'Password', 'input', 'password', '', 1, '2020-07-08 13:57:41', NULL);

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
(3, '2020_07_08_091713_create_form_structures_table', 2),
(4, '2020_07_08_133022_create_forms_table', 2),
(5, '2020_07_08_134218_create_values_table', 2),
(6, '2020_07_08_134238_create_input_data_table', 2);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gussie Auer', 'swift.mercedes@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'jdbyIRFNof', '2020-07-07 23:10:18', '2020-07-07 23:10:18'),
(2, 'Leonel Satterfield', 'patsy.satterfield@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '5cw5KEt8Id', '2020-07-07 23:10:18', '2020-07-07 23:10:18'),
(3, 'Mandy Koepp', 'rodriguez.vinnie@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'tcFTbAqGVK', '2020-07-07 23:10:18', '2020-07-07 23:10:18'),
(4, 'Dhanushka Jayawardana', 'salinda@gmail.com', '$2y$10$5TJY3biUfgtLHjXIWUnpHebjX2Y2kliq8dLU6Qr7gAjqUk5kbzB3y', NULL, '2020-07-08 01:45:50', '2020-07-08 01:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `value_data`
--

CREATE TABLE `value_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `form_id` int(11) NOT NULL,
  `form_structure_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `value_data`
--

INSERT INTO `value_data` (`id`, `form_id`, `form_structure_id`, `name`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'fsdfsdf', 'fsdfsdf', 1, '2020-07-09 04:39:55', NULL),
(2, 1, 3, 'sdfgf', 'sdfgf', 1, '2020-07-09 04:39:55', NULL),
(3, 1, 3, 'fdbf', 'fdbf', 1, '2020-07-09 04:39:55', NULL),
(4, 2, 4, 'dsfs', 'dsfs', 1, '2020-07-09 05:26:28', NULL),
(5, 2, 4, 'fsdfds_', 'fsdfds', 1, '2020-07-09 05:26:28', NULL),
(6, 2, 4, 'dsfsd_', 'dsfsd', 1, '2020-07-09 05:26:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forms_user_id_index` (`user_id`);

--
-- Indexes for table `form_structures`
--
ALTER TABLE `form_structures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_structures_form_id_index` (`form_id`);

--
-- Indexes for table `input_data`
--
ALTER TABLE `input_data`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `value_data`
--
ALTER TABLE `value_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_structure_id` (`form_structure_id`),
  ADD KEY `form_id` (`form_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form_structures`
--
ALTER TABLE `form_structures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `input_data`
--
ALTER TABLE `input_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `value_data`
--
ALTER TABLE `value_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
