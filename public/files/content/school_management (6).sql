-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 04:39 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `age_groups`
--

CREATE TABLE `age_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `age_groups`
--

INSERT INTO `age_groups` (`id`, `age`, `creator_id`, `creator`, `created_at`, `updated_at`) VALUES
(1, 'my age', 1, NULL, '2022-06-09 12:15:32', '2022-06-09 12:15:32'),
(2, NULL, 1, NULL, '2022-06-09 12:17:16', '2022-06-09 12:17:16'),
(3, 'uu', 1, NULL, '2022-06-09 12:18:21', '2022-06-09 12:18:21'),
(4, 'yy', 1, NULL, '2022-06-09 12:21:07', '2022-06-09 12:21:07'),
(5, 'fgjhkhk', 1, NULL, '2022-06-09 12:22:11', '2022-06-09 12:22:11'),
(6, 'fgfdg', 1, 'Super Admin', '2022-06-09 12:33:43', '2022-06-09 12:33:43'),
(7, 'cvcvz', 1, 'Super Admin', '2022-06-09 12:34:08', '2022-06-09 12:34:08'),
(8, 'bjfhn', 1, 'Super Admin', '2022-06-09 12:35:07', '2022-06-09 12:35:07'),
(9, 't', 1, 'Super Admin', '2022-06-09 12:36:35', '2022-06-09 12:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `commentable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `moderated_by` int(10) UNSIGNED DEFAULT NULL,
  `moderated_at` datetime DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ageGroup_id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `worksheet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `description`, `ageGroup_id`, `stream_id`, `video`, `worksheet`, `created_at`, `updated_at`) VALUES
(1, 'wdfdg', 'sfgfdg', 1, 1, 'C:\\xampp\\htdocs\\school_management\\public\\/video/content\\Video_2022-05-19_171341.wmv', 'C:\\xampp\\htdocs\\school_management\\public\\/files/content\\binance.txt', '2022-06-09 13:23:11', '2022-06-09 13:23:11'),
(2, 'new title', 'dbf rtiyh9tyu8rto yjryu', 5, 4, 'C:\\xampp\\htdocs\\school_management\\public\\/video/content\\Video_2022-05-19_171341.wmv', 'C:\\xampp\\htdocs\\school_management\\public\\/files/content\\282-2824227_stripe-logo-png-stripe-clipart.png', '2022-06-09 14:02:55', '2022-06-09 14:02:55'),
(3, 'My content', 'My contentMy contentMy contentMy contentMy contentMy contentMy content', 8, 4, 'C:\\xampp\\htdocs\\school_management\\public\\/video/content\\Video_2022-05-30_115511.wmv', 'C:\\xampp\\htdocs\\school_management\\public\\/files/content\\New Text Document (6).txt', '2022-06-09 14:05:35', '2022-06-09 14:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `email_info`
--

CREATE TABLE `email_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` int(11) DEFAULT NULL COMMENT 'Admin=1,School=2,Trainer=3,Student=4\r\n',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_info`
--

INSERT INTO `email_info` (`id`, `name`, `mail_description`, `group`, `created_at`, `updated_at`) VALUES
(1, 'National iideal  neww', '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\n <p>To get started, please <a href=\"{{route(\'login\')}}\">click here</a> and complete registration process using below login info</p>\n<p>\nEmail: nazmul@sahajjo.com<br>\nPassword: oqz7iz\n</p>\n<p>\nThanks & Regards,<br>\nTeam Kidspreneurship\n</p>\n                                          ', 2, '2022-06-09 13:45:55', '2022-06-09 13:45:55'),
(2, 'National iideal  neww', '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National iideal  neww</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-06-09 13:47:58', '2022-06-09 13:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `email_notifications`
--

CREATE TABLE `email_notifications` (
  `id` int(11) NOT NULL,
  `mail_sub` text DEFAULT NULL,
  `mail_body` text DEFAULT NULL,
  `mail_tags` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_notifications`
--

INSERT INTO `email_notifications` (`id`, `mail_sub`, `mail_body`, `mail_tags`) VALUES
(1, 'New School create ', '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'login\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: {email}<br>\r\nPassword: {pass}\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 'action_by,app_name,app_logo,receiver_name,invitation_url'),
(2, 'Password reset link provided by {app_name}', '                               \r\n          <p>Hi {receiver_name}</p>\r\n\r\n          <p>Your request for reset password has been approved from {app_name}. Press the button below to reset the password.</p>\r\n          <p><a href=\"{link}\" class=\"btn btn-primary btn-sm\">Reset Password</a></p>\r\n          <p>We are highly expecting you as soon as possible. Hope you\'ll join us.</p>\r\n          <p>Thanks for being with us.</p>\r\n\r\n          <p>Thanks &amp; Regards,</p>\r\n\r\n          <p>{app_name}</p>                                   ', 'app_name,app_logo,receiver_name,reset_password_url'),
(3, 'You have been invited to join {app_name} by {action_by}', '                                    <p><img src=\"http://property_final2.com/uploads/empty_image.jpg\" alt=\"app_logo\" height=\"50px\" style=\"border:1px solid black;\"><br></p>                                       <p class=\"text_add\"><br></p>      \r\n          <p>Hello {receiver_name}</p>\r\n\r\n          <p>Your Login credentials are given,\r\n          Email : {email}\r\n          Password : {password}\r\n          To set up your account, please use these credentials and go to the following link.</p>\r\n\r\n          <p><button class=\"btn btn-primary btn-sm\">Go to your account</button></p>\r\n          <p>You can change your password from your account password settings.</p>\r\n          <p>Hope you will find useful!</p>\r\n          <p>Thanks for being with us.</p>\r\n          <p>Regards,</p>  \r\n          <p>Thanks &amp; Regards,</p>\r\n\r\n          <p>{app_name}</p>                                    ', 'action_by,app_name,app_logo,receiver_name,invitation_url,email,password'),
(4, 'Invoice {invoice_number} for due {date}', '                                            <p class=\"text_add\"><img src=\"#\" alt=\"app_logo\" height=\"50px\" style=\"border:1px solid black;\">{invoice_number}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n          <p>Hello {receiver_name}</p>\r\n\r\n          <p>I hope you’re well!\r\n          Please see attached invoice {invoice_number}.\r\n          Don’t hesitate to contact us if you have any questions.</p>\r\n\r\n          <p>Thanks for being with us.</p>\r\n\r\n          <p>Regards,</p>  \r\n\r\n          <p>{app_name}</p>                           ', 'app_name,app_logo,receiver_name,invoice_number,date'),
(5, 'Payment reminder for invoice {invoice_number}', '                                      <p class=\"text_add\">{app_name}{date}{receiver_name}<img src=\"#\" alt=\"app_logo\" height=\"50px\" style=\"border:1px solid black;\">{date}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n          <p>Hello {receiver_name}</p>\r\n\r\n          <p>We hope that you’re enjoying our service\r\n          We did want to quickly mention that we haven’t received payment from you yet.</p>\r\n          <p>If you have any questions don’t hesitate to reply to this email.</p>\r\n          <p>Thanks for being with us.</p>\r\n\r\n          <p>Regards,</p>  \r\n\r\n          <p>{app_name}</p>                        ', 'app_name,app_logo,receiver_name,invoice_number,date'),
(6, 'Registration Confirmed', '<p><img src=\"http://property_final.com/uploads/avater.png\" alt=\"app_logo\" height=\"50px\" style=\"border:1px solid black;\"></p><p>Hi {receiver_name}</p>\r\n\r\n          <p>Welcome to our {app_name}.</p>\r\n\r\n          <p>Thanks &amp; Regards,</p>\r\n\r\n          <p>{app_name}</p><p></p> ', 'name,action_by,app_name,app_logo,receiver_name,resource_url'),
(7, 'A new roles has been created in {app_name}', '                    <p>{name}{name}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n            <p>Hi {receiver_name}</p>\r\n\r\n            <p>It\'s a piece of good news that a new roles named {name} has been created in our application by {action_by}. Please have a look at that.</p>\r\n\r\n            <p><button class=\"btn btn-primary btn-sm\">View Roles</button></p>\r\n            <p>Thanks for being with us.</p>\r\n\r\n            <p>Regards,</p>  \r\n\r\n            <p>{app_name}</p>                   ', 'name,action_by,app_name,app_logo,receiver_name,resource_url'),
(8, 'A roles has been updated in {app_name}', '                    <p>{name}{name}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n            <p>Hi {receiver_name}</p>\r\n\r\n            <p>It\'s a piece of good news that a new roles named {name} has been created in our application by {action_by}. Please have a look at that.</p>\r\n\r\n            <p><button class=\"btn btn-primary btn-sm\">View Roles</button></p>\r\n            <p>Thanks for being with us.</p>         ', 'name,action_by,app_name,app_logo,receiver_name,resource_url'),
(9, 'A roles has been deleted in {app_name}', '          <p class=\"text_add\">{name}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n            <p>Hi {receiver_name}</p>\r\n\r\n            <p>We are going to inform you that a roles named has been deleted from our application by {action_by}.</p>\r\n\r\n            <p>Thanks for being with us.</p>\r\n\r\n            <p>Regards,</p>  \r\n\r\n            <p>{app_name}</p>         ', 'name,action_by,app_name,app_logo,receiver_name'),
(10, 'New School Edited ', '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi {receiver_name}</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by {action_by}. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\n{app_name} \r\n</p>                                          ', 'action_by,app_name,app_logo,receiver_name,invitation_url'),
(11, 'New Trainer Edited ', '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi {receiver_name}</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited Trainerto our application by {action_by}. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\n{app_name} \r\n</p>                                          ', 'action_by,app_name,app_logo,receiver_name,invitation_url'),
(12, 'New Trainer create ', '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear Trainer\r\nAdministrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'login\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: {email}<br>\r\nPassword: {pass}\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 'action_by,app_name,app_logo,receiver_name,invitation_url');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_image` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_last_date` date DEFAULT NULL,
  `event_address` varchar(255) DEFAULT NULL,
  `event_fee` varchar(255) DEFAULT NULL,
  `event_poster` text DEFAULT NULL,
  `event_description` text DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_image`, `event_date`, `event_last_date`, `event_address`, `event_fee`, `event_poster`, `event_description`, `created_at`, `updated_at`) VALUES
(10, 'Computer Programming c++', 'image/event/eventimage_tvhe48qTGg.jpg', '2022-06-09', '2022-06-20', 'Ghulsan', '200', 'image/event/poster/poster_YA1V7BWCd1.pdf', '<p>This is very important event</p>', '2022-06-09 18:51:55', '2022-06-09 18:51:55'),
(11, 'Computer Programming c#', 'image/event/eventimage_HSF3b921Gq.jpg', '2022-06-09', '2022-06-30', 'Ghulsan', '200', 'image/event/poster/poster_ydoj4sdDTC.pdf', '<p>Check it</p>', '2022-06-09 18:52:46', '2022-06-09 18:52:46');

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
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade`, `created_at`, `updated_at`) VALUES
(1, 'Grade 1', NULL, NULL),
(2, 'Grade 2', NULL, NULL),
(3, 'Grade 3', NULL, NULL),
(4, 'Grade 4', NULL, NULL),
(5, 'Grade 5', NULL, NULL),
(6, 'Grade 6', NULL, NULL),
(7, 'Grade 7', NULL, NULL),
(8, 'Grade 8', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_11_062135_create_posts_table', 1),
(4, '2018_03_12_062135_create_categories_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_02_19_152418_create_permission_tables', 1),
(7, '2020_02_19_173115_create_activity_log_table', 1),
(8, '2020_02_19_173641_create_settings_table', 1),
(9, '2020_02_19_173700_create_userprofiles_table', 1),
(10, '2020_02_19_173711_create_notifications_table', 1),
(11, '2020_02_22_115918_create_user_providers_table', 1),
(12, '2020_05_01_163442_create_tags_table', 1),
(13, '2020_05_01_163833_create_polymorphic_taggables_table', 1),
(14, '2020_05_04_151517_create_comments_table', 1),
(15, '2020_10_27_155557_create_media_table', 1),
(17, '2022_06_05_132819_create_student_grades_table', 2),
(19, '2022_06_05_162030_create_grades_table', 4),
(22, '2022_06_05_132628_create_schools_table', 6),
(27, '2014_10_12_000000_create_users_table', 8),
(31, '2022_06_05_152719_create_trainers_table', 9),
(33, '2022_06_08_193404_create_streams_table', 10),
(34, '2022_06_08_194038_create_contents_table', 10),
(35, '2022_06_08_193252_create_age_groups_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_backend', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(2, 'edit_settings', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(3, 'view_logs', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(4, 'view_users', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(5, 'add_users', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(6, 'edit_users', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(7, 'delete_users', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(8, 'restore_users', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(9, 'block_users', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(10, 'view_roles', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(11, 'add_roles', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(12, 'edit_roles', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(13, 'delete_roles', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(14, 'restore_roles', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(15, 'view_backups', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(16, 'add_backups', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(17, 'create_backups', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(18, 'download_backups', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(19, 'delete_backups', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(20, 'view_posts', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(21, 'add_posts', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(22, 'edit_posts', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(23, 'delete_posts', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(24, 'restore_posts', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(25, 'view_categories', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(26, 'add_categories', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(27, 'edit_categories', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(28, 'delete_categories', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(29, 'restore_categories', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(30, 'view_tags', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(31, 'add_tags', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(32, 'edit_tags', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(33, 'delete_tags', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(34, 'restore_tags', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(35, 'view_comments', 'web', '2022-06-04 07:31:05', '2022-06-04 07:31:05'),
(36, 'add_comments', 'web', '2022-06-04 07:31:05', '2022-06-04 07:31:05'),
(37, 'edit_comments', 'web', '2022-06-04 07:31:05', '2022-06-04 07:31:05'),
(38, 'delete_comments', 'web', '2022-06-04 07:31:05', '2022-06-04 07:31:05'),
(39, 'restore_comments', 'web', '2022-06-04 07:31:05', '2022-06-04 07:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_og_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_og_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hits` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `order` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `moderated_by` int(10) UNSIGNED DEFAULT NULL,
  `moderated_at` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(2, 'administrator', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(3, 'manager', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(4, 'executive', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(5, 'user', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(6, 'school', 'web', '2022-06-04 07:54:48', '2022-06-04 07:54:48'),
(7, 'student', 'web', '2022-06-04 07:56:43', '2022-06-04 07:56:43'),
(8, 'trainer', 'web', '2022-06-04 08:01:28', '2022-06-04 08:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 7),
(1, 8),
(2, 2),
(2, 8),
(3, 2),
(3, 7),
(3, 8),
(4, 2),
(4, 7),
(4, 8),
(5, 2),
(5, 6),
(5, 8),
(6, 2),
(6, 6),
(6, 8),
(7, 2),
(7, 6),
(7, 8),
(8, 2),
(8, 8),
(9, 2),
(10, 2),
(10, 7),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(15, 7),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(20, 7),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(25, 7),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `school_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `principle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `official_email_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_student` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_plan` int(11) DEFAULT NULL,
  `school_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_establish` int(11) DEFAULT NULL,
  `incharge_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incharge_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kidspreneurship_representative` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weekly _class_for_grade` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `user_id`, `school_name`, `principle_name`, `official_email_id`, `contact_number`, `number_of_student`, `country`, `membership_plan`, `school_address`, `year_establish`, `incharge_name`, `incharge_email`, `kidspreneurship_representative`, `course_start_date`, `school_logo`, `school_cover_image`, `weekly _class_for_grade`, `status`, `created_at`, `updated_at`) VALUES
(18, 18, 'National ideal', 'Nazmul', 'nazmul@sahajjo.com', '01718445644', '{\"1\":\"10\",\"2\":\"20\",\"3\":\"30\",\"4\":\"40\",\"5\":\"50\",\"6\":null,\"7\":null,\"8\":null}', 'Bangladesh', 3, 'bonosri', 2005, 'Mahbub', 'nazmul@sahajjo.com', 'Keya khan', '2022-06-08', 'image/school/school_wqEbjhIaXQ.jpg', 'image/school/cover_image/cover_OlZCSQwoEx.jpg', NULL, 0, NULL, '2022-06-08 06:50:59'),
(19, 21, 'Bonosri ideal', 'Shukriti', 'nazmul12@sahajjo.com', '017834934332', '{\"1\":\"10\",\"2\":\"20\",\"3\":\"30\",\"4\":\"40\",\"5\":null,\"6\":null,\"7\":null,\"8\":null}', 'Bangladesh', 3, 'dhaka', 2001, 'Mahbub adnan', 'nazmul@email.com', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-06-08 12:54:01'),
(20, 22, 'Rupgonj Ideal', 'Rafi', 'rafi@sahajjo.com', '01548565494', '{\"1\":\"10\",\"2\":\"20\",\"3\":\"30\",\"4\":null,\"5\":null,\"6\":null,\"7\":null,\"8\":null}', 'Bangladesh', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` char(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'string',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `title`, `creator_id`, `creator`, `created_at`, `updated_at`) VALUES
(1, 'stream one', 1, 'admin', NULL, NULL),
(2, 'stream two', 2, 'Trainer', NULL, NULL),
(3, 'stream three', 3, 'User', NULL, NULL),
(4, 'stream four', 4, 'school', NULL, NULL),
(7, 'st new', 1, 'st new', '2022-06-09 10:57:39', '2022-06-09 10:57:39'),
(8, 'my new', 1, 'my new', '2022-06-09 11:00:04', '2022-06-09 11:00:04'),
(9, 'gggg', 1, 'gggg', '2022-06-09 11:00:30', '2022-06-09 11:00:30'),
(10, 'yyy', 1, 'yyy', '2022-06-09 11:07:02', '2022-06-09 11:07:02'),
(11, 'goo one', 1, 'goo one', '2022-06-09 11:11:06', '2022-06-09 11:11:06'),
(12, 'rafi', 1, 'rafi', '2022-06-09 11:12:14', '2022-06-09 11:12:14'),
(13, 'st newuygu', 1, 'st newuygu', '2022-06-09 12:22:49', '2022-06-09 12:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `trainer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hour` int(11) NOT NULL,
  `trainer_fee` double(10,2) NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `no_of_hour_per_week` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `user_id`, `trainer_name`, `email`, `hour`, `trainer_fee`, `contact_no`, `address`, `city`, `join_date`, `date_of_birth`, `image`, `mode`, `type`, `status`, `no_of_hour_per_week`, `created_at`, `updated_at`) VALUES
(1, 19, 'Jeanette Bailey', 'myzes@mailinator.com', 47, 80.00, 'Illiana Harper', 'In fuga Et ut Nam p', 'Corrupti eaque mole', '2001-03-01', '2022-06-10', 'C:\\xampp\\htdocs\\school_management\\public\\/image/trainer/thumbnail/1654685888.jpg', 2, 3, 1, 55, '2022-06-08 09:38:13', '2022-06-08 10:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `userprofiles`
--

CREATE TABLE `userprofiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_metadata` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_count` int(11) NOT NULL DEFAULT 0,
  `last_login` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userprofiles`
--

INSERT INTO `userprofiles` (`id`, `user_id`, `name`, `first_name`, `last_name`, `username`, `email`, `mobile`, `gender`, `url_website`, `url_facebook`, `url_twitter`, `url_instagram`, `url_linkedin`, `date_of_birth`, `address`, `bio`, `avatar`, `user_metadata`, `last_ip`, `login_count`, `last_login`, `email_verified_at`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Rssoft Admin', 'Rssoft', 'Admin', '100001', 'super@admin.com', '+1.404.774.8127', 'Other', NULL, NULL, NULL, NULL, NULL, '1979-12-21', NULL, NULL, 'img/default-avatar.jpg', NULL, '127.0.0.1', 31, '2022-06-09 12:30:52', NULL, 1, NULL, 1, NULL, '2022-06-04 07:31:04', '2022-06-09 12:30:52', NULL),
(2, 2, 'Admin Istrator', 'Admin', 'Istrator', '100002', 'admin@admin.com', '1-828-570-5628', 'Female', NULL, NULL, NULL, NULL, NULL, '1990-08-10', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, 1, NULL, '2022-06-04 07:31:04', '2022-06-04 07:45:13', '2022-06-04 07:45:13'),
(3, 3, 'Manager', 'Manager', 'User User', '100003', 'manager@manager.com', '+1-765-595-8222', 'Male', NULL, NULL, NULL, NULL, NULL, '1989-08-26', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, 1, NULL, '2022-06-04 07:31:04', '2022-06-04 07:45:20', '2022-06-04 07:45:20'),
(4, 4, 'Executive User', 'Executive', 'User', '100004', 'executive@executive.com', '+1-539-536-4893', 'Female', NULL, NULL, NULL, NULL, NULL, '1978-07-01', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, 1, NULL, '2022-06-04 07:31:04', '2022-06-04 07:45:30', '2022-06-04 07:45:30'),
(5, 5, 'General User', 'General', 'User', '100005', 'user@user.com', '+1-813-615-1877', 'Other', NULL, NULL, NULL, NULL, NULL, '1978-03-05', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, 1, NULL, '2022-06-04 07:31:04', '2022-06-04 07:45:35', '2022-06-04 07:45:35'),
(6, 1, 'Super Admin', 'Super', 'Admin', '100001', 'super@admin.com', '+1.341.751.0719', 'Other', NULL, NULL, NULL, NULL, NULL, '2005-12-21', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '2022-06-07 09:21:53', '2022-06-07 09:21:53', NULL),
(7, 2, 'Admin Istrator', 'Admin', 'Istrator', '100002', 'admin@admin.com', '1-205-583-8709', 'Female', NULL, NULL, NULL, NULL, NULL, '2013-01-19', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '2022-06-07 09:21:54', '2022-06-07 09:21:54', NULL),
(8, 3, 'Manager', 'Manager', 'User User', '100003', 'manager@manager.com', '425-749-9282', 'Other', NULL, NULL, NULL, NULL, NULL, '2009-02-21', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '2022-06-07 09:21:54', '2022-06-07 09:21:54', NULL),
(9, 4, 'Executive User', 'Executive', 'User', '100004', 'executive@executive.com', '+1-380-515-9797', 'Male', NULL, NULL, NULL, NULL, NULL, '1972-04-23', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '2022-06-07 09:21:54', '2022-06-07 09:21:54', NULL),
(10, 5, 'General User', 'General', 'User', '100005', 'user@user.com', '650-862-8078', 'Other', NULL, NULL, NULL, NULL, NULL, '2005-02-15', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '2022-06-07 09:21:54', '2022-06-07 09:21:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'img/default-avatar.jpg',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `group` int(11) NOT NULL DEFAULT 1 COMMENT 'Admin=1,School=2,Trainer=3,Student=4',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `username`, `email`, `mobile`, `gender`, `date_of_birth`, `email_verified_at`, `password`, `avatar`, `status`, `group`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'Super', 'Admin', '100001', 'super@admin.com', '+1.341.751.0719', 'Other', '2005-12-21', '2022-06-07 09:21:52', '$2y$10$13MkD/pk0DRXy5LeSJ8DdOhFYXos.WT7wcfCZp6ZmKTcs8UVjjgDe', 'img/default-avatar.jpg', 1, 1, NULL, '2022-06-07 09:21:52', '2022-06-07 09:21:52', NULL),
(2, 'Admin Istrator', 'Admin', 'Istrator', '100002', 'admin@admin.com', '1-205-583-8709', 'Female', '2013-01-19', '2022-06-07 09:21:52', '$2y$10$WVIlN8iW98M8o37G0e9gTO9IdXpzoxoEMRssQFC.v8ja2ES6KiAP6', 'img/default-avatar.jpg', 1, 1, NULL, '2022-06-07 09:21:52', '2022-06-07 09:21:52', NULL),
(3, 'Manager', 'Manager', 'User User', '100003', 'manager@manager.com', '425-749-9282', 'Other', '2009-02-21', '2022-06-07 09:21:52', '$2y$10$ZORUn8TVwUpdQi5IICGyOeRCQTB.7Hg94oKqVF4kVsFP/wJTFZf7u', 'img/default-avatar.jpg', 1, 1, NULL, '2022-06-07 09:21:52', '2022-06-07 09:21:52', NULL),
(4, 'Executive User', 'Executive', 'User', '100004', 'executive@executive.com', '+1-380-515-9797', 'Male', '1972-04-23', '2022-06-07 09:21:52', '$2y$10$rrD8l6yGTkk/KcfNaJzusOxtlkM0cTjlSB3DqFbULLmIV0PXKulPO', 'img/default-avatar.jpg', 1, 1, NULL, '2022-06-07 09:21:52', '2022-06-07 09:21:52', NULL),
(5, 'General User', 'General', 'User', '100005', 'user@user.com', '650-862-8078', 'Other', '2005-02-15', '2022-06-07 09:21:52', '$2y$10$7PfmstgEP6WZS4veAedUA.f7tVTEVRu7WOOnTUAp4BHI9UMvl7EFa', 'img/default-avatar.jpg', 1, 1, NULL, '2022-06-07 09:21:52', '2022-06-07 09:21:52', NULL),
(6, 'Ann Richmond', NULL, NULL, NULL, 'qibenow@mailinator.com', NULL, NULL, NULL, NULL, '$2y$10$lQOcN6r8HrRzsBEzIM9Vu.dbJMqY0qp76iFR0erJRNiuGCteANIpO', 'img/default-avatar.jpg', 1, 3, NULL, '2022-06-07 09:59:36', '2022-06-07 09:59:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_providers`
--

CREATE TABLE `user_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`),
  ADD KEY `subject` (`subject_id`,`subject_type`),
  ADD KEY `causer` (`causer_id`,`causer_type`);

--
-- Indexes for table `age_groups`
--
ALTER TABLE `age_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_info`
--
ALTER TABLE `email_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_notifications`
--
ALTER TABLE `email_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taggables`
--
ALTER TABLE `taggables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userprofiles`
--
ALTER TABLE `userprofiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_providers`
--
ALTER TABLE `user_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_providers_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `age_groups`
--
ALTER TABLE `age_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email_info`
--
ALTER TABLE `email_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_notifications`
--
ALTER TABLE `email_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `taggables`
--
ALTER TABLE `taggables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userprofiles`
--
ALTER TABLE `userprofiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_providers`
--
ALTER TABLE `user_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_providers`
--
ALTER TABLE `user_providers`
  ADD CONSTRAINT `user_providers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
