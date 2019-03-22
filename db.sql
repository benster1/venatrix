-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 05, 2018 at 01:53 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db`
--

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
(66, '2014_10_12_000000_create_users_table', 1),
(67, '2014_10_12_100000_create_password_resets_table', 1),
(68, '2018_01_25_175919_create_roles_table', 1),
(69, '2018_01_25_175956_create_permissions_table', 1),
(70, '2018_01_25_184649_create_permission_role_table', 1),
(71, '2018_01_25_184735_create_role_user_table', 1),
(72, '2018_01_26_183748_create_project_table', 1),
(73, '2018_01_26_184342_create_tcstatus_table', 1),
(74, '2018_01_26_184456_create_tcrunstatus_table', 1),
(75, '2018_01_26_184613_create_tc_table', 1),
(76, '2018_01_26_185148_create_tcrun_table', 1),
(77, '2018_01_26_185338_create_tcdetails_table', 1),
(78, '2018_01_26_191835_create_tchis_table', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission_name`, `created_at`, `updated_at`) VALUES
(1, 'CreateUser ', NULL, NULL),
(2, 'CreateTestCase ', NULL, NULL),
(3, 'ViewTestCase ', NULL, NULL),
(4, 'EditTestCase ', NULL, NULL),
(5, 'ApproveTestCase', NULL, NULL),
(6, 'ExecuteTestCase', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Project N-Test', 'http://localhost:8000/', '2018-02-05 03:35:43', '2018-02-05 03:35:43'),
(2, 'Project Sprint1', 'http://localhost:8000/', '2018-02-05 03:40:54', '2018-02-05 03:40:54'),
(3, 'Project Sprint1-1', 'sss', '2018-02-05 03:43:04', '2018-02-05 03:43:04'),
(4, 'Project Sprint1-1s', 'sssd', '2018-02-05 03:46:04', '2018-02-05 03:46:04'),
(5, 'Project Sprint1-1s', 'sssd', '2018-02-05 03:49:25', '2018-02-05 03:49:25'),
(6, 'Project N-Testss', 'http://localhost:8000/', '2018-02-05 05:39:13', '2018-02-05 05:39:13'),
(7, 'Project N-Test', 'sss', '2018-02-05 05:42:32', '2018-02-05 05:42:32'),
(8, 'Project N-Test', 'http://localhost:8000/', '2018-02-05 05:44:00', '2018-02-05 05:44:00'),
(9, 'Project N-Test', 'aaa', '2018-02-05 05:52:04', '2018-02-05 05:52:04'),
(10, 'aaa', 'aaaa', '2018-02-05 05:52:14', '2018-02-05 05:52:14'),
(11, 'aaaa', 'aaaaa', '2018-02-05 05:52:30', '2018-02-05 05:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', NULL, NULL),
(2, 'Manager', NULL, NULL),
(3, 'Tester', NULL, NULL),
(4, 'Reviewer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_sts` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_sts`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2018-02-04 19:32:33', '2018-02-04 20:47:12'),
(3, 0, 1, 2, '2018-02-04 19:32:54', NULL),
(7, 0, 2, 1, NULL, '2018-02-05 00:35:20'),
(9, 1, 3, 1, NULL, '2018-02-04 23:01:49'),
(17, 0, 2, 3, '2018-02-04 20:42:28', '2018-02-05 00:35:34'),
(18, 0, 1, 3, '2018-02-04 20:42:36', NULL),
(19, 0, 4, 2, '2018-02-04 20:42:45', NULL),
(21, 0, 1, 4, '2018-02-04 20:47:55', '2018-02-04 20:48:34'),
(23, 1, 4, 1, '2018-02-04 20:51:32', NULL),
(25, 1, 3, 2, '2018-02-04 22:11:48', '2018-02-04 23:02:00'),
(26, 1, 3, 3, '2018-02-04 22:12:01', '2018-02-04 23:02:07'),
(27, 1, 3, 4, '2018-02-04 22:12:11', '2018-02-04 23:02:27'),
(37, 0, 2, 2, '2018-02-05 00:35:27', NULL),
(39, 0, 2, 4, '2018-02-05 00:35:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tcdetails`
--

CREATE TABLE `tcdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `tc_step_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tc_step_sts_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_rslts` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actual_rslts` tinyint(1) NOT NULL,
  `expected_rslts_file` blob NOT NULL,
  `actual_rslts_file` blob NOT NULL,
  `tc_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tc_stp_comments` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tcs_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tchits`
--

CREATE TABLE `tchits` (
  `tc_id` int(10) UNSIGNED NOT NULL,
  `actual_rslt` tinyint(1) NOT NULL,
  `actual_rslt_file` blob NOT NULL,
  `tcdetail_id` int(10) UNSIGNED NOT NULL,
  `tcrun_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tcruns`
--

CREATE TABLE `tcruns` (
  `id` int(10) UNSIGNED NOT NULL,
  `tcrun_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tcs_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tcrunstatuss`
--

CREATE TABLE `tcrunstatuss` (
  `id` int(10) UNSIGNED NOT NULL,
  `tc_run_sts_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tcs`
--

CREATE TABLE `tcs` (
  `id` int(10) UNSIGNED NOT NULL,
  `tc_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tc_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tc_comments` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_date` datetime NOT NULL,
  `exec_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exec_date` datetime NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `tcstatuss_id` int(10) UNSIGNED NOT NULL,
  `tcrunstatus_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tcstatuss`
--

CREATE TABLE `tcstatuss` (
  `id` int(10) UNSIGNED NOT NULL,
  `tc_sts_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_sts` tinyint(1) NOT NULL DEFAULT '1',
  `expired_date` datetime DEFAULT NULL,
  `logged_in` tinyint(1) NOT NULL DEFAULT '1',
  `last_logged_in` datetime DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `user_sts`, `expired_date`, `logged_in`, `last_logged_in`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'TestUser1', 'Atul', 'Kumar', 'atul.kumar@basecampcs.com', 1, NULL, 1, NULL, '$2y$10$hGYJ1A20PmL87iTBtcFdiO3r9/6nC5/Lu1ZFEPAAMrsBDGzowCLJ6', 'pnIPDsonznUPpAGnGy7VzqFZy0bcdlCxVQTQPWLz7LuI0Gsuzvzp0iTXtTZY', '2018-01-30 03:26:48', '2018-01-30 03:26:48'),
(2, 'TestUser2', 'Gery', 'Manigbas', 'gery.manigbas@basecampcs.com', 1, NULL, 1, NULL, '4f35769eea89e066ef76fc1507adb342', 'wd6OaWmuXyhPqHcEOUeFLJs5YmlYEdMbADN0QkNi9Vovf1AUfSKQlMYRECq4', '2018-02-01 03:06:00', '2018-02-01 03:06:00'),
(3, 'TestUser3', 'Othmane', 'Benhammou', 'othmane.benhammou@basecampcs.com', 1, NULL, 1, NULL, '$2y$10$hGYJ1A20PmL87iTBtcFdiO3r9/6nC5/Lu1ZFEPAAMrsBDGzowCLJ6', 'UsVFd0a3pYgzRGcJuxjKaCTsxG8zqlOetwWtoRT9ogZqBK4zDooW1wjxgJSz', '2018-02-01 03:20:11', '2018-02-01 03:20:11'),
(4, 'TestUser4', 'Eric', 'Kreinar', 'eric.kreinar@basecampcs.com', 1, NULL, 1, NULL, '$2y$10$btuLEr.2miY5WUywJZub8ud6lZPOpNHenhbTjmKqwaUmh/jA0W0oa', '8t9ZhRUdz7BWlMSzWpdOnw86MFULvMupdkB7rZNRkCgWbWOCCHdOMwbp0xtb', '2018-02-01 05:18:02', '2018-02-01 05:18:02');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_user_user_id_role_id_unique` (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `tcdetails`
--
ALTER TABLE `tcdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tcdetails_tcs_id_foreign` (`tcs_id`);

--
-- Indexes for table `tchits`
--
ALTER TABLE `tchits`
  ADD PRIMARY KEY (`tc_id`,`tcdetail_id`),
  ADD KEY `tchits_tcrun_id_foreign` (`tcrun_id`),
  ADD KEY `tchits_tc_id_index` (`tc_id`),
  ADD KEY `tchits_tcdetail_id_index` (`tcdetail_id`);

--
-- Indexes for table `tcruns`
--
ALTER TABLE `tcruns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tcruns_tcs_id_foreign` (`tcs_id`);

--
-- Indexes for table `tcrunstatuss`
--
ALTER TABLE `tcrunstatuss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tcs`
--
ALTER TABLE `tcs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tcs_project_id_foreign` (`project_id`),
  ADD KEY `tcs_tcstatuss_id_foreign` (`tcstatuss_id`),
  ADD KEY `tcs_tcrunstatus_id_foreign` (`tcrunstatus_id`);

--
-- Indexes for table `tcstatuss`
--
ALTER TABLE `tcstatuss`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tcdetails`
--
ALTER TABLE `tcdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tcruns`
--
ALTER TABLE `tcruns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tcrunstatuss`
--
ALTER TABLE `tcrunstatuss`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tcs`
--
ALTER TABLE `tcs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tcstatuss`
--
ALTER TABLE `tcstatuss`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tcdetails`
--
ALTER TABLE `tcdetails`
  ADD CONSTRAINT `tcdetails_tcs_id_foreign` FOREIGN KEY (`tcs_id`) REFERENCES `tcs` (`id`);

--
-- Constraints for table `tchits`
--
ALTER TABLE `tchits`
  ADD CONSTRAINT `tchits_tc_id_foreign` FOREIGN KEY (`tc_id`) REFERENCES `tcs` (`id`),
  ADD CONSTRAINT `tchits_tcdetail_id_foreign` FOREIGN KEY (`tcdetail_id`) REFERENCES `tcdetails` (`id`),
  ADD CONSTRAINT `tchits_tcrun_id_foreign` FOREIGN KEY (`tcrun_id`) REFERENCES `tcruns` (`id`);

--
-- Constraints for table `tcruns`
--
ALTER TABLE `tcruns`
  ADD CONSTRAINT `tcruns_tcs_id_foreign` FOREIGN KEY (`tcs_id`) REFERENCES `tcs` (`id`);

--
-- Constraints for table `tcs`
--
ALTER TABLE `tcs`
  ADD CONSTRAINT `tcs_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `tcs_tcrunstatus_id_foreign` FOREIGN KEY (`tcrunstatus_id`) REFERENCES `tcrunstatuss` (`id`),
  ADD CONSTRAINT `tcs_tcstatuss_id_foreign` FOREIGN KEY (`tcstatuss_id`) REFERENCES `tcstatuss` (`id`);
