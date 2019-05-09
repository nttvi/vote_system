-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 04:47 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hp_vote_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voter_quality` int(11) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `election_type_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `title`, `slug`, `voter_quality`, `content`, `start_date`, `end_date`, `election_type_id`, `member_id`, `deleted_at`, `created_at`, `updated_at`, `start_time`, `end_time`) VALUES
(1, 'Cuộc bầu chọn địa điểm đẹp nhất Cần Thơ', 'cuoc-bau-chon-dia-diem-dep-nhat-can-tho', 4, '<p>Ahihi đồ t&oacute;</p>', '2019-04-15', '2019-04-15', 2, 3, NULL, '2019-04-15 02:13:00', '2019-05-02 18:35:55', '16:00:00', '18:00:00'),
(2, 'Bầu chọn nhân vật truyện tranh hay nhất', 'bau-chon-nhan-vat-truyen-tranh-hay-nhat', 3, '<p>Nội dung</p>', '2019-04-22', '2019-04-22', 1, 1, NULL, '2019-04-21 18:44:07', '2019-04-21 19:29:22', '07:00:00', '19:00:00'),
(4, 'Bầu chọn xe đẹp nhất', 'bau-chon-xe-dep-nhat', 3, '<p>Ahihi</p>', '2019-11-11', '2019-12-22', 3, 5, NULL, '2019-05-08 00:38:30', '2019-05-08 00:38:30', '11:11:00', '23:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `election_types`
--

CREATE TABLE `election_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `election_types`
--

INSERT INTO `election_types` (`id`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bầu chọn nhân vật', 'Bầu chọn cho thể loại', '2019-04-15 00:41:25', '2019-04-15 00:44:45', NULL),
(2, 'Bầu chọn địa điểm', NULL, '2019-04-15 00:45:25', '2019-04-15 00:45:25', NULL),
(3, 'Bầu chọn phương tiện', NULL, '2019-04-15 00:45:42', '2019-04-15 00:45:42', NULL),
(4, 'Bầu chọn bài hát', NULL, '2019-04-21 19:28:38', '2019-04-21 19:28:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `phone`, `address`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Trần Văn A', '0123456789', 'Cần Thơ', 'tva@pmail.hp', '$2y$10$XyeY6O5xBbAoTrGXFhuZEeX1H/v7zbJcG2/ZbyXSWwRktevNTK.KC', NULL, '2019-05-02 18:26:14', '2019-05-02 18:26:14', NULL),
(2, 'Nguyễn Văn B', '012123123123', 'Sóc Trăng', 'nvb@pmail.hp', '$2y$10$s3MTkVmjgi14tRNK2rEZbuC1U2CxEl.h0.yvcXAYVfcsAHzWBK/Fq', NULL, '2019-05-02 18:27:27', '2019-05-02 18:27:27', NULL),
(3, 'Lục Văn Tiên', '0123456789', 'Bến Ninh Kiều', 'lucvantien@pmail.hp', '$2y$10$L8ytJ5KC3k1C1VVVgIJ6/OaPlB6bXIqV9bAYfa5bDCMcF8WYIv2OC', NULL, '2019-04-15 00:38:29', '2019-05-02 18:30:33', NULL),
(4, 'Lê Văn C', '0123456789', 'ở nhà', 'lvc@pmail.hp', '$2y$10$jSEFwKcOum.Ma/177cn9oOQiMbETUxmIyFV84/VyomCQ0JwpuvHGy', NULL, '2019-04-21 18:50:25', '2019-04-21 18:50:25', NULL),
(5, 'Sói Trắng', '0123455223', NULL, 'wolf.alone613@gmail.com', '$2y$10$kW6hF6XnVyUl3exlqmuDD.tViREEujOkDm4mL5Y7tdvU0dLm.76pe', 'BccQuFlp0Lqq1llVEBC2Ec9uTtwJUzvU6mShoucPvfUK9hVXQ9owtyK6h63A', '2019-05-06 19:41:45', '2019-05-08 01:07:11', NULL);

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
(5, '2019_04_10_073526_create_roles_table', 1),
(6, '2019_04_10_073828_create_members_table', 2),
(9, '2019_04_10_081642_create_elections_types_table', 3),
(10, '2019_04_10_083537_create_election_types_table', 4),
(11, '2019_04_10_083637_create_elections_table', 4),
(12, '2019_04_10_083919_create_voters_table', 5),
(13, '2019_04_10_085803_create_objects_table', 6),
(14, '2019_04_10_090247_create_votes_table', 6),
(15, '2019_04_10_091048_create_tags_table', 7),
(16, '2019_04_10_091613_create_tag_elections_table', 8),
(17, '2019_04_10_092748_create_users_table', 9),
(18, '2019_04_15_084530_add_column_to_elections_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `objects`
--

CREATE TABLE `objects` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `election_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `objects`
--

INSERT INTO `objects` (`id`, `title`, `image`, `description`, `election_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Cầu Cần Thơ', 'upload/image/object/hammer_sickle.jpg', 'Cau-can-tho', 1, NULL, '2019-04-16 22:41:51', '2019-05-02 19:00:54'),
(2, 'Đại học Cần Thơ', 'upload/image/object/images.jpg', '222', 1, NULL, '2019-04-16 22:43:16', '2019-04-17 18:33:22'),
(3, 'Công viên Nam sông Hậu', 'upload/image/object/13178783_1310696925667860_5914227228769034257_n.jpg', '3', 1, NULL, '2019-04-17 18:09:54', '2019-04-17 18:34:06'),
(4, 'Công viên Lưu Hữu Phước', 'upload/image/object/tam-su-dau-kho.jpg', '1', 1, NULL, '2019-04-17 18:13:40', '2019-04-17 18:34:37'),
(5, 'Đô rê mon', 'upload/image/object/13133108_1310696955667857_8638613321834009882_n.jpg', NULL, 2, NULL, '2019-04-21 18:44:53', '2019-04-21 18:44:53'),
(6, 'Conan', 'upload/image/object/images.jpg', NULL, 2, NULL, '2019-04-21 18:45:14', '2019-04-21 18:45:14'),
(7, 'Cao đẳng Cần Thơ', NULL, NULL, 1, NULL, '2019-05-02 18:56:29', '2019-05-02 18:56:29'),
(8, 'Cồn Khương', 'upload/image/object/1191_793561f2111b6fedc6e0446eb8a770aa.jpg', NULL, 1, NULL, '2019-05-02 18:57:24', '2019-05-02 18:57:24'),
(9, 'Lamborghini', NULL, NULL, 4, NULL, '2019-05-08 00:38:30', '2019-05-08 00:38:30'),
(10, 'Ferrari', NULL, NULL, 4, NULL, '2019-05-08 00:38:30', '2019-05-08 00:38:30'),
(11, 'Bugatti', NULL, NULL, 4, NULL, '2019-05-08 00:38:30', '2019-05-08 00:38:30'),
(12, 'Rolls-Royce', NULL, NULL, 4, NULL, '2019-05-08 00:38:30', '2019-05-08 00:38:30'),
(13, 'Mercedes', 'upload/image/object/322_33.jpg', NULL, 4, NULL, '2019-05-08 02:06:19', '2019-05-08 02:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag_elections`
--

CREATE TABLE `tag_elections` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `election_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `address`, `email`, `password`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '123456', NULL, 'admin@pmail.hp', '$2y$10$mtEF0Pa37oSulWuvPy.75eOWMjpxv9LU/0lMOL6fo/6ReckTi8VDa', NULL, '2019-04-14 20:50:01', '2019-04-14 20:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `election_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `member_id`, `election_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 1, 1, NULL, '2019-05-02 18:48:50', '2019-05-02 18:48:50'),
(9, 2, 1, NULL, '2019-05-02 18:48:56', '2019-05-02 18:48:56'),
(10, 3, 1, NULL, '2019-05-02 18:49:05', '2019-05-02 18:49:05'),
(11, 4, 1, NULL, '2019-05-02 18:49:10', '2019-05-02 18:49:10'),
(12, 1, 2, NULL, '2019-05-02 19:56:16', '2019-05-02 19:56:16'),
(13, 2, 2, NULL, '2019-05-02 19:56:23', '2019-05-02 19:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(10) UNSIGNED NOT NULL,
  `object_id` int(10) UNSIGNED NOT NULL,
  `voter_id` int(10) UNSIGNED NOT NULL,
  `election_id` int(11) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `object_id`, `voter_id`, `election_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(25, 1, 8, 1, NULL, '2019-05-02 19:09:13', '2019-05-02 19:09:13'),
(26, 2, 8, 1, NULL, '2019-05-02 19:09:13', '2019-05-02 19:09:13'),
(27, 4, 8, 1, NULL, '2019-05-02 19:09:13', '2019-05-02 19:09:13'),
(28, 7, 8, 1, NULL, '2019-05-02 19:09:13', '2019-05-02 19:09:13'),
(29, 2, 10, 1, NULL, '2019-05-02 19:09:22', '2019-05-02 19:09:22'),
(30, 3, 10, 1, NULL, '2019-05-02 19:09:22', '2019-05-02 19:09:22'),
(31, 4, 10, 1, NULL, '2019-05-02 19:09:22', '2019-05-02 19:09:22'),
(32, 1, 9, 1, NULL, '2019-05-02 19:09:31', '2019-05-02 19:09:31'),
(33, 8, 9, 1, NULL, '2019-05-02 19:09:31', '2019-05-02 19:09:31'),
(34, 3, 11, 1, NULL, '2019-05-02 19:09:42', '2019-05-02 19:09:42'),
(35, 4, 11, 1, NULL, '2019-05-02 19:09:42', '2019-05-02 19:09:42'),
(36, 5, 12, 2, NULL, '2019-05-02 20:02:30', '2019-05-02 20:02:30'),
(37, 6, 12, 2, NULL, '2019-05-02 20:02:30', '2019-05-02 20:02:30'),
(38, 5, 13, 2, NULL, '2019-05-02 20:02:39', '2019-05-02 20:02:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elections_election_type_id_foreign` (`election_type_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `election_types`
--
ALTER TABLE `election_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `election_id` (`election_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_elections`
--
ALTER TABLE `tag_elections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_elections_tag_id_foreign` (`tag_id`),
  ADD KEY `tag_elections_election_id_foreign` (`election_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voters_member_id_foreign` (`member_id`),
  ADD KEY `voters_election_id_foreign` (`election_id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votes_object_id_foreign` (`object_id`),
  ADD KEY `votes_voter_id_foreign` (`voter_id`),
  ADD KEY `election_id` (`election_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `election_types`
--
ALTER TABLE `election_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `objects`
--
ALTER TABLE `objects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag_elections`
--
ALTER TABLE `tag_elections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `elections`
--
ALTER TABLE `elections`
  ADD CONSTRAINT `elections_election_type_id_foreign` FOREIGN KEY (`election_type_id`) REFERENCES `election_types` (`id`),
  ADD CONSTRAINT `elections_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `objects`
--
ALTER TABLE `objects`
  ADD CONSTRAINT `objects_ibfk_1` FOREIGN KEY (`election_id`) REFERENCES `elections` (`id`);

--
-- Constraints for table `tag_elections`
--
ALTER TABLE `tag_elections`
  ADD CONSTRAINT `tag_elections_election_id_foreign` FOREIGN KEY (`election_id`) REFERENCES `elections` (`id`),
  ADD CONSTRAINT `tag_elections_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `voters`
--
ALTER TABLE `voters`
  ADD CONSTRAINT `voters_election_id_foreign` FOREIGN KEY (`election_id`) REFERENCES `elections` (`id`),
  ADD CONSTRAINT `voters_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`election_id`) REFERENCES `elections` (`id`),
  ADD CONSTRAINT `votes_object_id_foreign` FOREIGN KEY (`object_id`) REFERENCES `objects` (`id`),
  ADD CONSTRAINT `votes_voter_id_foreign` FOREIGN KEY (`voter_id`) REFERENCES `voters` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
