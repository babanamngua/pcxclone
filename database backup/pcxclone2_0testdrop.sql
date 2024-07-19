-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 19, 2024 at 01:08 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcxclone2.0testdrop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `position` int NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT NULL,
  `brand_name` varchar(255) NOT NULL,
  `url_name` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`brand_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `category_id`, `brand_name`, `url_name`, `created_at`, `updated_at`) VALUES
(36, 24, 'Pulsar', '36-1717153291.webp', '2024-05-30 07:35:36', '2024-06-10 06:47:13'),
(38, 24, 'Lamzu', '30-05-24-15-10.webp', '2024-05-30 08:10:54', '2024-05-30 08:10:54'),
(39, 27, 'Lamzu', '30-05-24-15-14.webp', '2024-05-30 08:14:29', '2024-05-30 08:14:29'),
(40, 29, 'HP', '40-10-06-24-09-04-42.png', '2024-06-08 01:01:59', '2024-06-10 02:04:42'),
(41, 28, 'Razer', '08-06-24-08-04.webp', '2024-06-08 01:04:00', '2024-06-08 01:04:00'),
(42, 24, 'Pwnage', '08-06-24-08-07.webp', '2024-06-08 01:07:13', '2024-06-08 01:07:13'),
(43, 24, 'CHERRY Xtrfy', '08-06-24-08-08.webp', '2024-06-08 01:08:05', '2024-06-08 01:08:05'),
(46, 24, 'Glorious', '09-06-24-12-25-47.webp', '2024-06-09 05:25:47', '2024-06-09 05:25:47'),
(47, NULL, 'Lamzu', '09-06-24-12-47-40.png', '2024-06-09 05:47:40', '2024-06-09 05:47:40'),
(48, NULL, 'Pulsar', '09-06-24-12-50-27.png', '2024-06-09 05:50:27', '2024-06-09 05:50:27'),
(49, NULL, 'Glorious', '09-06-24-12-51-17.png', '2024-06-09 05:51:17', '2024-06-09 05:51:17'),
(50, NULL, 'Filco', '09-06-24-13-53-11.png', '2024-06-09 06:53:11', '2024-06-09 06:53:11'),
(51, NULL, 'Logitech', '09-06-24-13-54-05.png', '2024-06-09 06:54:05', '2024-06-09 06:54:05'),
(52, NULL, 'Razer', '09-06-24-13-54-16.png', '2024-06-09 06:54:16', '2024-06-09 06:54:16'),
(53, NULL, 'Steelseries', '09-06-24-13-54-56.png', '2024-06-09 06:54:56', '2024-06-09 06:54:56'),
(54, NULL, 'Skypad', '09-06-24-13-55-06.png', '2024-06-09 06:55:06', '2024-06-09 06:55:06'),
(55, NULL, 'Datacolor', '09-06-24-13-56-59.png', '2024-06-09 06:56:59', '2024-06-09 06:56:59'),
(56, NULL, 'Yuki Aim', '10-06-24-10-11-18.png', '2024-06-10 03:11:18', '2024-06-10 03:11:18'),
(57, NULL, 'Vancer', '10-06-24-10-11-37.png', '2024-06-10 03:11:37', '2024-06-10 03:11:37'),
(58, NULL, 'Lethal Gaming Gear', '10-06-24-10-12-01.png', '2024-06-10 03:12:01', '2024-06-10 03:12:01'),
(59, NULL, 'Corepad', '10-06-24-10-12-31.png', '2024-06-10 03:12:31', '2024-06-10 03:12:31'),
(60, NULL, 'Finalmouse', '10-06-24-10-12-50.png', '2024-06-10 03:12:50', '2024-06-10 03:12:50'),
(61, NULL, 'Gamesense', '10-06-24-10-13-23.png', '2024-06-10 03:13:23', '2024-06-10 03:13:23'),
(62, NULL, 'Fnatic', '10-06-24-10-15-29.png', '2024-06-10 03:15:29', '2024-06-10 03:15:29'),
(63, NULL, 'CHERRY Xtrfy', '10-06-24-10-15-52.png', '2024-06-10 03:15:52', '2024-06-10 03:15:52'),
(64, NULL, 'Arbiter Studio', '10-06-24-10-16-04.png', '2024-06-10 03:16:04', '2024-06-10 03:16:04'),
(65, NULL, 'DeltaHub', '10-06-24-10-16-33.png', '2024-06-10 03:16:33', '2024-06-10 03:16:33'),
(66, NULL, 'DrunkDeer', '10-06-24-10-17-12.png', '2024-06-10 03:17:12', '2024-06-10 03:17:12'),
(67, NULL, 'Pwnage', '10-06-24-10-17-35.png', '2024-06-10 03:17:35', '2024-06-10 03:17:35'),
(68, NULL, 'Ninjutso', '10-06-24-10-17-52.webp', '2024-06-10 03:17:52', '2024-06-10 03:17:52'),
(70, NULL, 'HP', '70-18-06-24-14-08-45.png', '2024-06-10 08:01:45', '2024-06-18 07:08:45'),
(71, NULL, 'HyperX', '71-20-06-24-11-01-19.png', '2024-06-19 22:13:03', '2024-06-20 04:01:19'),
(72, NULL, 'Kingston', '20-06-24-10-08-27.png', '2024-06-20 03:08:27', '2024-06-20 03:08:27'),
(73, 26, 'Kingston', '20-06-24-10-11-13.webp', '2024-06-20 03:11:13', '2024-06-20 03:11:13'),
(74, 25, 'HyperX', '20-06-24-10-26-43.webp', '2024-06-20 03:26:43', '2024-06-20 03:26:43'),
(76, NULL, 'Samsung', '20-06-24-14-44-30.png', '2024-06-20 07:44:30', '2024-06-20 07:44:30'),
(77, 30, 'Samsung', '20-06-24-14-47-19.webp', '2024-06-20 07:47:19', '2024-06-20 07:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) NOT NULL,
  `value` text NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('supperadmin@gmail.com|127.0.0.1:timer', 'i:1719197979;', 1719197979),
('supperadmin@gmail.com|127.0.0.1', 'i:1;', 1719197979),
('supperamin@gmail.com|127.0.0.1:timer', 'i:1719042736;', 1719042736),
('supperamin@gmail.com|127.0.0.1', 'i:1;', 1719042736),
('2gaGO67FIzs8jffU', 's:7:\"forever\";', 2036422201),
('E0Bu8WqZi935zwbQ', 'a:1:{s:11:\"valid_until\";i:1721062300;}', 1721082454),
('supermin@gmail.com|127.0.0.1:timer', 'i:1719151077;', 1719151077),
('supermin@gmail.com|127.0.0.1', 'i:2;', 1719151077),
('5Mclb3HyflDvBpoz', 'a:1:{s:11:\"valid_until\";i:1721063350;}', 1721083511),
('user2@gmail.com|127.0.0.1:timer', 'i:1721302435;', 1721302435),
('user2@gmail.com|127.0.0.1', 'i:1;', 1721302435);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `component_id` int DEFAULT NULL,
  `category_name` varchar(255) NOT NULL,
  `url_name` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  KEY `component_id` (`component_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `component_id`, `category_name`, `url_name`, `created_at`, `updated_at`) VALUES
(24, NULL, 'Chuột', '24-1717079381.png', '2024-05-30 03:05:58', '2024-05-30 07:29:41'),
(25, 1, 'Ram PC', '30-05-24-14-12.png', '2024-05-30 07:12:15', '2024-05-30 07:12:15'),
(26, 7, 'Ram Laptop', '30-05-24-14-13.png', '2024-05-30 07:13:37', '2024-05-30 07:13:37'),
(27, NULL, 'Bàn phím', '30-05-24-14-28.png', '2024-05-30 07:28:31', '2024-05-30 07:28:31'),
(28, NULL, 'Lót chuột', '08-06-24-07-56.png', '2024-06-08 00:56:37', '2024-06-08 00:56:37'),
(29, NULL, 'Laptop', '08-06-24-08-01.png', '2024-06-08 01:01:27', '2024-06-20 03:06:40'),
(30, NULL, 'SSD', '20-06-24-14-46-31.png', '2024-06-20 07:46:31', '2024-06-20 07:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `color_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `color_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `color_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`color_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `product_id`, `color_name`, `color_code`, `created_at`, `updated_at`) VALUES
(3, NULL, 'xanh lục', '#0000FF', NULL, NULL),
(4, NULL, 'đỏ', '#FF0000', NULL, NULL),
(5, NULL, 'Xanh lá', '#00FF00', NULL, NULL),
(7, NULL, 'Bạc', '#C0C0C0', NULL, NULL),
(9, NULL, 'Xanh da trời', '#00FFFF', NULL, NULL),
(15, 1, 'Đen', '#000000', '2024-06-01 10:51:26', '2024-06-01 10:51:26'),
(23, 1, 'đỏ', '#FF0000', '2024-06-07 23:17:40', '2024-06-07 23:17:40'),
(27, 1, 'Bạc', '#C0C0C0', '2024-06-08 00:40:54', '2024-06-08 00:40:54'),
(28, NULL, 'Đen', '#000000', '2024-06-08 00:47:37', '2024-06-08 00:47:37'),
(29, 11, 'Đen', '#000000', '2024-06-08 00:47:47', '2024-06-08 00:47:47'),
(30, NULL, 'Trắng', '#FFFFFF', '2024-06-08 00:48:10', '2024-06-08 00:48:10'),
(31, 11, 'Trắng', '#FFFFFF', '2024-06-08 00:48:21', '2024-06-08 00:48:21'),
(32, NULL, 'Be, nhạt', '#DBCEC5', '2024-06-08 01:55:05', '2024-06-08 01:55:05'),
(33, 12, 'Be, nhạt', '#DBCEC5', '2024-06-08 01:55:12', '2024-06-08 01:55:12'),
(34, NULL, 'Vàng', '#FFFF00', '2024-06-09 07:52:38', '2024-06-09 07:52:38'),
(35, 15, 'Vàng', '#FFFF00', '2024-06-09 07:52:42', '2024-06-09 07:52:42'),
(36, 16, 'Đen', '#000000', '2024-06-10 10:15:39', '2024-06-10 10:15:39'),
(37, 16, 'Trắng', '#FFFFFF', '2024-06-10 10:15:39', '2024-06-10 10:15:39'),
(38, 25, 'đỏ', '#FF0000', '2024-06-19 21:30:41', '2024-06-19 21:30:41'),
(39, 25, 'xanh lục', '#0000FF', '2024-06-19 21:31:59', '2024-06-19 21:31:59'),
(40, NULL, 'Olive', '#808000', '2024-06-19 21:32:30', '2024-06-19 21:32:30'),
(41, 25, 'Olive', '#808000', '2024-06-19 21:32:33', '2024-06-19 21:32:33'),
(42, NULL, 'Gray', '#808080', '2024-06-19 21:32:50', '2024-06-19 21:32:50'),
(43, 25, 'Gray', '#808080', '2024-06-19 21:32:55', '2024-06-19 21:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comment` int NOT NULL AUTO_INCREMENT,
  `users_id` int NOT NULL,
  `product_id` int NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`comment`),
  KEY `users_id` (`users_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

DROP TABLE IF EXISTS `component`;
CREATE TABLE IF NOT EXISTS `component` (
  `component_id` int NOT NULL AUTO_INCREMENT,
  `component_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`component_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component`
--

INSERT INTO `component` (`component_id`, `component_name`, `created_at`, `updated_at`) VALUES
(1, 'Linh kiện PC', '2024-05-26 05:21:21', '2024-05-26 05:21:21'),
(7, 'Linh kiện Laptop', '2024-05-26 05:50:55', '2024-05-26 05:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `discount_coupons`
--

DROP TABLE IF EXISTS `discount_coupons`;
CREATE TABLE IF NOT EXISTS `discount_coupons` (
  `coupon_id` int NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(50) NOT NULL,
  `discount_percent` decimal(5,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`coupon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

DROP TABLE IF EXISTS `img`;
CREATE TABLE IF NOT EXISTS `img` (
  `img_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `color_id` int DEFAULT NULL,
  `url_img` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`img_id`),
  KEY `product_id` (`product_id`),
  KEY `color_id` (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`img_id`, `product_id`, `color_id`, `url_img`) VALUES
(86, 11, NULL, '11-0-074709.webp'),
(87, 11, NULL, '11-1-074709.webp'),
(88, 12, NULL, '12-0-085119.jpg'),
(89, 12, NULL, '12-1-085119.jpg'),
(90, 12, NULL, '12-2-085119.jpg'),
(91, 12, NULL, '12-3-085119.jpg'),
(92, 12, NULL, '12-4-085119.jpg'),
(93, 12, NULL, '12-5-085119.jpg'),
(94, 12, NULL, '12-6-085119.jpg'),
(95, 12, NULL, '12-7-085119.jpg'),
(96, 12, NULL, '12-8-085119.jpg'),
(97, 12, NULL, '12-9-085119.jpg'),
(98, 12, NULL, '12-10-085119.jpg'),
(99, 12, NULL, '12-11-085119.jpg'),
(100, 12, NULL, '12-12-085119.jpg'),
(101, 13, NULL, '13-0-085821.webp'),
(102, 13, NULL, '13-1-085821.webp'),
(104, 15, NULL, '15-0-145151.webp'),
(105, 15, NULL, '15-1-145151.webp'),
(106, 15, NULL, '15-2-145151.webp'),
(107, 15, NULL, '15-3-145151.webp'),
(108, 15, NULL, '15-4-145151.webp'),
(109, 16, NULL, '16-0-171452.webp'),
(110, 16, NULL, '16-0-171514.webp'),
(111, 16, NULL, '16-1-171514.webp'),
(112, 16, NULL, '16-2-171514.webp'),
(113, 17, NULL, '17-0-171759.webp'),
(114, 17, NULL, '17-0-172001.webp'),
(115, 17, NULL, '17-1-172001.webp'),
(116, 17, NULL, '17-2-172001.webp'),
(128, 1, 15, '1-0-105608.webp'),
(129, 1, 15, '1-1-105608.webp'),
(130, 1, 15, '1-2-105608.webp'),
(131, 1, 15, '1-3-105608.webp'),
(132, 1, 15, '1-4-105608.webp'),
(150, 13, NULL, '13-0-143647.png'),
(151, 25, 38, '25-0-043342.webp'),
(152, 25, 38, '25-1-043342.webp'),
(153, 25, 38, '25-2-043342.webp'),
(154, 25, 38, '25-3-043342.webp'),
(155, 25, 38, '25-4-043342.webp'),
(156, 25, 38, '25-5-043342.webp'),
(157, 25, 41, '25-0-043422.webp'),
(158, 25, 41, '25-1-043422.webp'),
(159, 25, 41, '25-2-043422.webp'),
(160, 25, 41, '25-3-043422.webp'),
(161, 25, 41, '25-4-043422.webp'),
(162, 25, 41, '25-5-043422.webp'),
(163, 25, 39, '25-0-043504.webp'),
(164, 25, 39, '25-1-043504.webp'),
(165, 25, 39, '25-2-043504.webp'),
(166, 25, 39, '25-3-043504.webp'),
(167, 25, 39, '25-4-043504.webp'),
(168, 25, 39, '25-5-043504.webp'),
(169, 25, 43, '25-0-043545.webp'),
(170, 25, 43, '25-1-043545.webp'),
(171, 25, 43, '25-2-043545.webp'),
(172, 25, 43, '25-3-043545.webp'),
(173, 25, 43, '25-4-043545.webp'),
(174, 25, 43, '25-5-043545.webp'),
(175, 25, NULL, '25-0-043628.webp'),
(176, 25, NULL, '25-1-043628.webp'),
(177, 25, NULL, '25-2-043628.webp'),
(178, 25, NULL, '25-3-043628.webp'),
(179, 25, NULL, '25-4-043628.webp'),
(180, 25, NULL, '25-5-043628.webp'),
(181, 26, NULL, '26-0-051919.webp');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_25_091611_create_admin_table', 0),
(5, '2024_05_25_091611_create_brand_table', 0),
(6, '2024_05_25_091611_create_category_table', 0),
(7, '2024_05_25_091611_create_color_table', 0),
(8, '2024_05_25_091611_create_comment_table', 0),
(9, '2024_05_25_091611_create_img_table', 0),
(10, '2024_05_25_091611_create_order_items_table', 0),
(11, '2024_05_25_091611_create_orders_table', 0),
(12, '2024_05_25_091611_create_password_reset_tokens_table', 0),
(13, '2024_05_25_091611_create_product_table', 0),
(14, '2024_05_25_091611_create_roles_table', 0),
(15, '2024_05_25_091611_create_sessions_table', 0),
(16, '2024_05_25_091611_create_shipping_table', 0),
(17, '2024_05_25_091611_create_userroles_table', 0),
(18, '2024_05_25_091611_create_users_table', 0),
(19, '2024_05_25_091614_add_foreign_keys_to_admin_table', 0),
(20, '2024_05_25_091614_add_foreign_keys_to_color_table', 0),
(21, '2024_05_25_091614_add_foreign_keys_to_comment_table', 0),
(22, '2024_05_25_091614_add_foreign_keys_to_img_table', 0),
(23, '2024_05_25_091614_add_foreign_keys_to_orders_table', 0),
(24, '2024_05_25_091614_add_foreign_keys_to_product_table', 0),
(25, '2024_05_25_091614_add_foreign_keys_to_shipping_table', 0),
(26, '2024_05_25_091614_add_foreign_keys_to_userroles_table', 0),
(27, '2024_05_26_114745_create_component_table', 2),
(29, '2024_06_06_145901_create_permission_tables', 3),
(30, '2024_06_15_013210_create_quantity_table', 4),
(31, '2024_07_15_132852_create_personal_access_tokens_table', 5),
(32, '2024_07_15_133817_alter_shipping_methods_table', 6),
(33, '2024_07_15_135619_alter_shipping_table', 6),
(34, '2024_07_16_161042_create_articles_table', 7),
(35, '2024_07_16_162115_create_images_table', 8),
(36, '2024_07_16_162218_create_sections_table', 8),
(37, '2024_07_17_071439_create_transactions_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 15),
(2, 'App\\Models\\User', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `sdt` int DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `total_price` decimal(10,0) DEFAULT NULL,
  `shipping_methods_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','confirmed','delivering','delivered','completed','cancelled','refunded','failed') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `name`, `email`, `sdt`, `address`, `total_price`, `shipping_methods_id`, `created_at`, `updated_at`, `status`) VALUES
(73, NULL, '123', '123@gmail.com', 123, '123', 1150000, 1, '2024-07-08 02:28:25', '2024-07-17 06:20:58', 'confirmed'),
(74, NULL, '123', 'shipping@gmail.com', 123, '123', 1650000, 1, '2024-07-08 02:56:57', '2024-07-08 02:56:57', 'pending'),
(75, NULL, '123', '123@gmail.com', 123, '123', 17190000, 2, '2024-07-08 03:11:27', '2024-07-08 03:11:27', 'pending'),
(76, 10, 'user2', 'user2@gmail.com', 358842700, '314/151 Au Duong Lan p3 q8', 32687000, 1, '2024-07-16 04:49:54', '2024-07-17 06:25:04', 'pending'),
(77, 10, 'user2', 'user2@gmail.com', 358842700, '314/151 Au Duong Lan p3 q8', 2499000, 2, '2024-07-16 05:45:13', '2024-07-16 05:45:13', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `order_item_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `url_img` varchar(225) DEFAULT NULL,
  `product_name` varchar(225) DEFAULT NULL,
  `color_name` varchar(225) DEFAULT NULL,
  `capacity` varchar(225) DEFAULT NULL,
  `color_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_item_id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=276 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `user_id`, `product_id`, `url_img`, `product_name`, `color_name`, `capacity`, `color_id`, `quantity`, `size`, `price`, `created_at`, `updated_at`) VALUES
(258, 76, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 2, NULL, 2000000, '2024-07-04 03:02:10', '2024-07-16 04:49:54'),
(259, 76, 10, 11, NULL, 'Chuột không dây siêu nhẹ Pulsar X2H Wireless (Hỗ trợ 4K Polling Rate)', 'Đen', NULL, 29, 3, NULL, 2499000, '2024-07-04 03:12:08', '2024-07-16 04:49:54'),
(260, 76, 10, 12, NULL, 'Laptop HP Pavilion 14 dv2073TU i5 1235U/16GB/512GB/Win11 (7C0P2PA)', 'Be, nhạt', NULL, 33, 1, NULL, 17190000, '2024-07-04 08:22:14', '2024-07-16 04:49:54'),
(261, 76, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Bạc', NULL, 27, 2, NULL, 2000000, '2024-07-05 10:43:17', '2024-07-16 04:49:54'),
(263, 73, NULL, 29, NULL, 'RAM Laptop Kingston Sodimm 1.2V 16GB 3200MHz CL22', NULL, NULL, NULL, 1, NULL, 1150000, '2024-07-08 02:28:25', '2024-07-08 02:28:25'),
(264, 74, NULL, 16, NULL, 'Chuột không dây siêu nhẹ CHERRY Xtrfy M8 Wireless', 'Đen', NULL, 36, 1, NULL, 1650000, '2024-07-08 02:56:57', '2024-07-08 02:56:57'),
(265, 75, NULL, 12, NULL, 'Laptop HP Pavilion 14 dv2073TU i5 1235U/16GB/512GB/Win11 (7C0P2PA)', 'Be, nhạt', NULL, 33, 1, NULL, 17190000, '2024-07-08 03:11:27', '2024-07-08 03:11:27'),
(266, 77, 10, 11, NULL, 'Chuột không dây siêu nhẹ Pulsar X2H Wireless (Hỗ trợ 4K Polling Rate)', 'Đen', NULL, 29, 1, NULL, 2499000, '2024-07-16 05:45:02', '2024-07-16 05:45:13'),
(274, NULL, 10, 25, NULL, 'Chuột không dây siêu nhẹ Pwnage StormBreaker', 'Olive', NULL, 41, 1, NULL, 3740000, '2024-07-18 03:49:54', '2024-07-18 03:49:54'),
(275, NULL, 10, 15, NULL, 'Chuột không dây siêu nhẹ Glorious Model O PRO Forge Limited Edition', 'Vàng', NULL, 35, 1, NULL, 1999000, '2024-07-18 03:50:03', '2024-07-18 03:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create role', 'web', '2024-06-22 00:37:47', '2024-06-22 00:37:47'),
(2, 'view role', 'web', '2024-06-22 00:38:01', '2024-06-22 00:38:01'),
(3, 'edit role', 'web', '2024-06-22 00:38:06', '2024-06-22 00:38:06'),
(4, 'delete role', 'web', '2024-06-22 00:38:12', '2024-06-22 00:38:12'),
(5, 'create product', 'web', '2024-06-22 00:49:02', '2024-06-22 00:49:02'),
(6, 'view product', 'web', '2024-06-22 00:49:08', '2024-06-22 00:49:08'),
(7, 'edit product', 'web', '2024-06-22 00:49:14', '2024-06-22 00:49:14'),
(8, 'delete product', 'web', '2024-06-22 00:49:19', '2024-06-22 00:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb3_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `category_id` int DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `url_name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category_id`, `brand_id`, `price`, `description`, `url_name`, `created_at`, `updated_at`) VALUES
(1, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 24, 47, 2000000, '<p><strong>Cải tiến tr&ecirc;n phi&ecirc;n bản&nbsp;Mini Pro:</strong></p>\r\n\r\n<ul>\r\n	<li>Hỗ trợ kết nối Wireless 4KHz. Chip MCU Nordic.</li>\r\n	<li>Bản m&agrave;u đen đi k&egrave;m đầu thu 4KHz.</li>\r\n</ul>\r\n\r\n<p>Mua receiver Lamzu Atlantis 4KHz&nbsp;<a href=\"https://www.phongcachxanh.vn/products/receiver-4khz-cho-chuot-lamzu-atlantis-chi-ho-tro-dong-tuong-thich-4khz\">tại đ&acirc;y.</a></p>\r\n\r\n<p>Lamzu l&agrave; một c&ocirc;ng ty được th&agrave;nh lập từ những người đam m&ecirc; c&aacute;c thiết bị ngoại vi m&aacute;y t&iacute;nh, game thủ FPS, designer, kỹ sư kết cấu v&agrave; quản l&yacute; chuỗi cung ứng với nhiều năm kinh nghiệm trong ng&agrave;nh c&ocirc;ng nghiệp gaming.</p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p><strong>Design by Lamzu.</strong></p>\r\n\r\n<p><strong>Bảo h&agrave;nh: 12 th&aacute;ng đổi mới</strong></p>', '13-06-24-16-53-28.webp', '2024-05-31 02:00:29', '2024-06-14 12:34:18'),
(11, 'Chuột không dây siêu nhẹ Pulsar X2H Wireless (Hỗ trợ 4K Polling Rate)', 24, 48, 2499000, '<p><strong>Giảm 10% dongle 4K</strong>&nbsp;khi mua k&egrave;m chuột Pulsar X2V2/X2H/X2A hỗ trợ 4K Polling Rate</p>\r\n\r\n<p>Phi&ecirc;n bản mới nhất của chuột Pulsar X2 cực kỳ th&agrave;nh c&ocirc;ng của Pulsar. X2H l&agrave; phi&ecirc;n bản sử dụng thiết kế mới nhất c&ugrave;ng form chuột thay đổi lưng cao v&agrave; l&ugrave;i s&acirc;u hơn d&agrave;nh cho c&aacute;c bạn th&iacute;ch kiểu cầm chuột claw grip.</p>\r\n\r\n<ul>\r\n	<li>Thiết kế h&ocirc;ng hẹp, lưng l&ugrave;i cao ho&agrave;n to&agrave;n mới.</li>\r\n	<li>Switch quang học. Cuộn chuột Pulsar chống bụi.</li>\r\n	<li>Thay đổi cấu tr&uacute;c b&ecirc;n trong, giảm trọng lượng, tăng độ chắc chắn.</li>\r\n	<li>Hỗ trợ report rate 4000Hz nhờ MCU Nordic (dongle 4000Hz b&aacute;n rời).</li>\r\n	<li>V&agrave; một số thay đổi nhỏ, tăng trải nghiệm sử dụng sản phẩm.</li>\r\n	<li><strong>Designed in Korea</strong></li>\r\n</ul>\r\n\r\n<p><strong>Bảo h&agrave;nh: 24 th&aacute;ng đổi mới</strong></p>', '14-06-24-18-21-16.webp', '2024-06-08 00:46:37', '2024-06-14 12:30:52'),
(12, 'Laptop HP Pavilion 14 dv2073TU i5 1235U/16GB/512GB/Win11 (7C0P2PA)', 29, 70, 17190000, '<h3><a href=\"https://www.thegioididong.com/laptop/hp-pavilion-14-dv2073tu-i5-7c0p2pa\" rel=\"noopener\" target=\"_blank\" title=\"Tham khảo Laptop HP Pavilion 14 dv2073TU i5 1235U (7C0P2PA) tại thegioididong.com\">Laptop HP Pavilion 14 dv2073TU i5 1235U (7C0P2PA)</a>&nbsp;vừa c&oacute; mặt tại Thế Giới Di Động sẽ khiến bạn thực sự ấn tượng với vẻ ngo&agrave;i v&ocirc; c&ugrave;ng trẻ trung, sở hữu th&ocirc;ng số cấu h&igrave;nh mạnh mẽ cho bất cứ nhu cầu sử dụng c&aacute; nh&acirc;n n&agrave;o. Đ&acirc;y ch&iacute;nh x&aacute;c l&agrave; một mẫu&nbsp;<a href=\"https://www.thegioididong.com/laptop?g=hoc-tap-van-phong\" rel=\"noopener\" target=\"_blank\" title=\"Tham khảo các mẫu laptop học tập - văn phòng tại thegioididong.com\">laptop học tập - văn ph&ograve;ng</a>&nbsp;d&agrave;nh cho mọi nh&agrave;.</h3>\r\n\r\n<p>&bull; HP Pavilion 14 sẽ cho người d&ugrave;ng khả năng xử l&yacute; ho&agrave;n hảo mọi t&aacute;c vụ c&ocirc;ng việc từ soạn thảo văn bản, thực hiện thuyết tr&igrave;nh hay thao t&aacute;c trang t&iacute;nh đến việc coding đơn giản, thiết kế đồ hoạ nhẹ v&agrave; video cơ bản nhờ hiệu năng mạnh mẽ từ con chip&nbsp;<strong>Intel Core i5 1235U&nbsp;</strong>v&agrave; card t&iacute;ch hợp&nbsp;<strong>Intel Iris Xe Graphics</strong>.</p>\r\n\r\n<p>&bull; Ngo&agrave;i ra, sau những giờ ph&uacute;t l&agrave;m việc căng thẳng, bạn cũng c&oacute; thể giải tr&iacute; nhẹ nh&agrave;ng với những con game LOL, Valorant hay FO4 với mức cấu h&igrave;nh tinh chỉnh.</p>\r\n\r\n<p>&bull; Bộ nhớ&nbsp;<strong>RAM 16 GB DDR4 2 khe</strong>&nbsp;mở ra khả năng đa nhiệm tuyệt vời cho c&aacute;c y&ecirc;u cầu kh&aacute;c nhau c&ugrave;ng l&uacute;c, vừa chỉnh sửa h&igrave;nh ảnh tr&ecirc;n Photoshop, vừa mở h&agrave;ng loạt c&aacute;c tab Chrome hay thưởng thức một bản nhạc du dương m&agrave; kh&ocirc;ng lo&nbsp;<a href=\"https://www.thegioididong.com/laptop\" rel=\"noopener\" target=\"_blank\" title=\"Tham khảo các mẫu laptop tại thegioididong.com\">laptop</a>&nbsp;bị đơ.</p>\r\n\r\n<p>&bull; Ổ cứng&nbsp;<strong>SSD</strong>&nbsp;cải thiện đ&aacute;ng kể tốc độ khởi động c&aacute;c ứng dụng, dung lượng thoải m&aacute;i&nbsp;<strong>512 GB</strong>&nbsp;c&oacute; thể mở rộng đến&nbsp;<strong>1 TB</strong>&nbsp;phục vụ đa dạng c&aacute;c y&ecirc;u cầu.</p>\r\n\r\n<p>&bull; L&agrave;m việc thuận lợi v&agrave; thoải m&aacute;i hơn với m&agrave;n h&igrave;nh laptop&nbsp;<strong>14 inch</strong>&nbsp;được t&iacute;ch hợp c&ugrave;ng&nbsp;<strong>IPS</strong>&nbsp;cho m&agrave;n h&igrave;nh mỏng, mở rộng g&oacute;c nh&igrave;n h&igrave;nh ảnh kh&ocirc;ng bị thay đổi d&ugrave; bạn đang nh&igrave;n nghi&ecirc;ng. Độ ph&acirc;n giải&nbsp;<strong>Full HD (1920 x 1080)</strong>&nbsp;cho h&igrave;nh ảnh th&ecirc;m r&otilde; n&eacute;t v&agrave; chi tiết trong mọi t&igrave;nh huống sử dụng.</p>\r\n\r\n<p>&bull; Hệ thống loa k&eacute;p được tinh chỉnh bởi<strong>&nbsp;B&amp;O&nbsp;</strong>t&iacute;ch hợp với c&ocirc;ng nghệ<strong>&nbsp;HP Audio Boost</strong>&nbsp;mang đến chất &acirc;m sống động v&agrave; trung thực, cho ph&uacute;t gi&acirc;y giải tr&iacute; của người d&ugrave;ng th&ecirc;m thư gi&atilde;n v&agrave; th&uacute; vị.</p>\r\n\r\n<p>&bull;&nbsp;<a href=\"https://www.thegioididong.com/laptop-hp-compaq-pavilion\" rel=\"noopener\" target=\"_blank\" title=\"Tham khảo các mẫu laptop HP Pavilion tại thegioididong.com\">Laptop HP Pavilion</a>&nbsp;được ho&agrave;n thiện với gam m&agrave;u&nbsp;<strong>v&agrave;ng&nbsp;</strong>&oacute;ng chủ đạo v&agrave; lớp vỏ&nbsp;<strong>nhựa&nbsp;</strong>chắc chắn, kiểu d&aacute;ng tinh tế ph&ugrave; hợp để c&oacute; thể sử dụng ở bất cứ đ&acirc;u. Linh động hơn với khối lượng tổng thể chỉ vỏn vẹn&nbsp;<strong>1.41 kg</strong>, thuận tiện cho bạn mang theo b&ecirc;n m&igrave;nh khi di chuyển.</p>\r\n\r\n<p>&bull; Mẫu&nbsp;<a href=\"https://www.thegioididong.com/laptop-hp-compaq\" rel=\"noopener\" target=\"_blank\" title=\"Tham khảo các mẫu laptop HP tại thegioididong.com\">laptop HP</a>&nbsp;n&agrave;y cũng t&iacute;ch hợp đầy đủ c&aacute;c cổng kết nối th&ocirc;ng dụng cho đa nhu cầu của người d&ugrave;ng như: Jack tai nghe 3.5 mm, USB Type-A, HDMI v&agrave; USB Type-C.</p>', '14-06-24-18-22-00.jpg', '2024-06-08 01:38:50', '2024-06-14 12:34:18'),
(13, 'Tấm lót chuột Razer Firefly V2 Pro', 28, 52, 2999000, '<p><strong>Th&ocirc;ng số kỹ thuật</strong></p>\r\n\r\n<table border=\"1\" cellpadding=\"3\" cellspacing=\"0\" id=\"tblGeneralAttribute\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>H&atilde;ng sản xuất</strong></td>\r\n			<td>Razer</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Model</strong></td>\r\n			<td>Firefly V2 Pro</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chống trượt</strong></td>\r\n			<td>C&oacute;</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>K&iacute;ch thước</strong></td>\r\n			<td>360mm x 278mm x 4.6mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chất liệu</strong></td>\r\n			<td>Micro-textured</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>LED</strong></td>\r\n			<td>Chroma RGB</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>T&iacute;nh năng đặc biệt</strong></td>\r\n			<td>Đ&egrave;n led RGB to&agrave;n bộ bề mặt l&oacute;t chuột<br />\r\n			Chất liệu Micro-texture<br />\r\n			T&iacute;ch hợp cổng USB-A 2.0<br />\r\n			C&aacute;p USB-C rời</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '18-06-24-14-36-06.png', '2024-06-08 01:49:50', '2024-06-18 07:36:06'),
(15, 'Chuột không dây siêu nhẹ Glorious Model O PRO Forge Limited Edition', 24, 49, 1999000, '<p><strong>Th&ocirc;ng tin cơ bản</strong></p>\r\n\r\n<ul>\r\n	<li>Form chuột đối xứng.</li>\r\n	<li>Trọng lượng si&ecirc;u nhẹ&nbsp;<strong>55g.</strong></li>\r\n	<li>Thời lượng pin&nbsp;<strong>hơn 80 giờ.</strong></li>\r\n	<li>Kết cấu vỏ, lớp phủ ho&agrave;n to&agrave;n mới.</li>\r\n</ul>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p><strong>Designed in USA</strong></p>\r\n\r\n<p><strong>Bảo h&agrave;nh: 24 th&aacute;ng đổi mới.</strong></p>', '14-06-24-18-24-49.webp', '2024-06-09 05:28:37', '2024-06-14 12:33:46'),
(16, 'Chuột không dây siêu nhẹ CHERRY Xtrfy M8 Wireless', 24, 63, 1650000, '<p>Cherry Xtrfy l&agrave; thương hiệu gaming mang hai d&ograve;ng m&aacute;u Đức (Cherry) - Thụy Điển (Xtrfy) với c&aacute;c sản phẩm gaming gear mang t&iacute;nh đột ph&aacute; đến với thị trường. Cherry Xtrfy cũng l&agrave; nh&agrave; t&agrave;i trợ cho hai đội game danh tiếng<strong>&nbsp;Team</strong>&nbsp;<strong>Vitality</strong>&nbsp;(v&ocirc; địch BLAST.tv&nbsp;Paris Major&nbsp;2023) v&agrave;&nbsp;<strong>Heroic</strong>&nbsp;(v&ocirc; địch BLAST Premier: Spring Final 2023)</p>\r\n\r\n<p>Chuột gaming Xtrfy M8 l&agrave; mẫu chuột kh&ocirc;ng d&acirc;y h&agrave;ng đầu với hiệu năng vượt trội c&ugrave;ng thiết kế độc nhất. Với phần th&acirc;n trước low-profile, Xtrfy M8 Wireless được thiết kế đặc biệt hướng tới khả năng control v&agrave; độ ch&iacute;nh x&aacute;c.</p>\r\n\r\n<p>Với Xtrfy M8 Wireless, bạn c&oacute; một mẫu chuột tốt cả về c&ocirc;ng năng v&agrave; thiết kế với to&agrave;n bộ th&acirc;n chuột được thiết kế tối ưu trọng lượng nhưng vẫn giữ dung lượng pin 300mA ti&ecirc;u chuẩn đảm bảo thời gian sử dụng tốt nhất.</p>\r\n\r\n<p><strong>C&aacute;c th&ocirc;ng số nổi bật:</strong></p>\r\n\r\n<ul>\r\n	<li>Cảm biến Pixart PAW3395, 26000 DPI, 650 IPS, 50G</li>\r\n	<li>Trọng lượng: 55 gram, kh&ocirc;ng lỗ</li>\r\n	<li>Form: đối xứng, n&uacute;t chuột low profile</li>\r\n	<li>Kết nối: 2.4GHz kh&ocirc;ng d&acirc;y | USB-C (sạc)</li>\r\n</ul>\r\n\r\n<p><strong>Designed in&nbsp;Sweden</strong></p>\r\n\r\n<p><strong>Bảo h&agrave;nh: 12 th&aacute;ng đổi mới</strong></p>', '14-06-24-18-25-18.webp', '2024-06-09 05:30:43', '2024-06-14 12:33:46'),
(17, 'Chuột không dây siêu nhẹ Pulsar X2H eS (Đi kèm dongle 4K Polling Rate)', 24, 48, 3300000, '<p>Phi&ecirc;n bản hiệu năng cao đạt chuẩn thi đấu chuy&ecirc;n nghiệp của chuột Pulsar&nbsp;X2H.</p>\r\n\r\n<ul>\r\n	<li>M&agrave;n h&igrave;nh OLED dưới chuột</li>\r\n	<li><strong>Switch quang học.</strong>&nbsp;Cuộn chuột Pulsar chống bụi.</li>\r\n	<li>Thay đổi cấu tr&uacute;c b&ecirc;n trong, giảm trọng lượng, tăng độ chắc chắn.</li>\r\n	<li>Hỗ trợ report rate 4000Hz (wireless), 8000Hz (cắm d&acirc;y).</li>\r\n	<li>Đi k&egrave;m dongle 4K d&agrave;nh ri&ecirc;ng cho eS series.</li>\r\n	<li>Kh&ocirc;ng cần c&agrave;i driver. To&agrave;n bộ t&iacute;nh năng điều chỉnh được t&iacute;ch hợp tr&ecirc;n chuột.</li>\r\n	<li><strong>Designed in Korea</strong></li>\r\n</ul>\r\n\r\n<p><strong>Bảo h&agrave;nh: 24 th&aacute;ng đổi mới</strong></p>', '14-06-24-18-25-30.webp', '2024-06-10 10:17:42', '2024-06-14 11:25:30'),
(24, 'Bàn phím từ Lamzu Atlantis Pro Keyboard - Hỗ trợ Rapid Trigger', 27, 47, 4630000, '<p>B&agrave;n ph&iacute;m từ cao cấp Lamzu Atlantis Pro Keyboard&nbsp;<strong>hỗ trợ Rapid Trigger</strong>&nbsp;với c&ocirc;ng nghệ switch nam ch&acirc;m Hall Effect cao cấp.</p>\r\n\r\n<p>Ngoại h&igrave;nh Lamzu Atlantis Pro Keyboard được thiết kế với chủ đề đại dương Atlantis s&acirc;u thẳm. Phần tạ th&eacute;p kh&ocirc;ng gỉ được khắc đặc biệt l&agrave; điểm nhấn gi&uacute;p chiếc b&agrave;n ph&iacute;m n&agrave;y kh&aacute;c biệt ho&agrave;n to&agrave;n so với c&aacute;c đối thủ c&ugrave;ng ph&acirc;n kh&uacute;c.</p>\r\n\r\n<p>Lamzu l&agrave; một c&ocirc;ng ty được th&agrave;nh lập từ những người đam m&ecirc; c&aacute;c thiết bị ngoại vi m&aacute;y t&iacute;nh, game thủ FPS, designer, kỹ sư kết cấu v&agrave; quản l&yacute; chuỗi cung ứng với nhiều năm kinh nghiệm trong ng&agrave;nh c&ocirc;ng nghiệp gaming.</p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p><strong>Design by Lamzu.</strong></p>\r\n\r\n<p><strong>Bảo h&agrave;nh: 12 th&aacute;ng đổi mới</strong></p>', '15-06-24-11-11-58.webp', '2024-06-15 04:11:58', '2024-06-15 04:11:58'),
(25, 'Chuột không dây siêu nhẹ Pwnage StormBreaker', 24, 67, 3740000, '<p>Pwnage l&agrave; c&ocirc;ng ty gaming gear c&oacute; trụ sở tại California, Mỹ. Pwnage nổi bật nhất với c&aacute;c sản phẩm c&oacute; khả năng custom mạnh mẽ về ngoại h&igrave;nh v&agrave; l&agrave; h&atilde;ng&nbsp;<strong>đầu ti&ecirc;n giới thiệu c&ocirc;ng nghệ điều chỉnh vị tr&iacute; cảm biến</strong>&nbsp;để tối ưu cảm gi&aacute;c di chuột cho từng người.</p>\r\n\r\n<p>Stormbreaker l&agrave; sản phẩm đột ph&aacute; nhất của Pwnage bằng việc kế thừa c&ocirc;ng nghệ điều chỉnh cảm biến v&agrave; ứng dụng những c&ocirc;ng nghệ, vật liệu mới nhất:</p>\r\n\r\n<ul>\r\n	<li>Nặng chỉ 51g, l&agrave;m từ kim loại&nbsp;<strong>magnesium</strong>: nhẹ hơn nh&ocirc;m 33%, nhẹ hơn titan 50% v&agrave; nhẹ hơn th&eacute;p 75%.</li>\r\n	<li>C&ocirc;ng nghệ điều chỉnh vị tr&iacute; cảm biến: tối đa độ ch&iacute;nh x&aacute;c v&agrave; vị tr&iacute; cảm biến l&yacute; tưởng cho từng cỡ tay.</li>\r\n	<li><strong>Polling rate&nbsp;2000Hz</strong>: c&acirc;n bằng giữa độ trễ của chuột v&agrave; khả năng xử l&yacute; của m&aacute;y t&iacute;nh.</li>\r\n	<li>Cảm biến Pixart PAW3395 mới nhất: 26000 DPI, 650 IPS.</li>\r\n	<li><strong>MCU Nordic nrf52840</strong>&nbsp;tối ưu hiệu năng kết nối v&agrave; thời lượng pin: 120 giờ / 2 giờ sạc.</li>\r\n</ul>\r\n\r\n<p><strong>Design in USA</strong></p>\r\n\r\n<p><strong>Bảo h&agrave;nh 12 th&aacute;ng</strong></p>\r\n\r\n<p><strong>Lưu &yacute;:&nbsp;</strong>trước khi sử dụng h&atilde;y lột bỏ film bảo vệ&nbsp;bề mặt feet mới để c&oacute; trải nghiệm tốt nhất.</p>', '20-06-24-04-29-58.webp', '2024-06-19 21:29:58', '2024-07-18 03:34:12'),
(26, 'Ram Kingston HyperX Fury Black 1x8G 2666', 25, 71, 990000, '<p>Kingston HyperX Fury Black l&agrave; một d&ograve;ng sản phẩm RAM nổi tiếng được thiết kế để tối ưu h&oacute;a hiệu suất m&aacute;y t&iacute;nh. Dưới đ&acirc;y l&agrave; m&ocirc; tả chi tiết về RAM Kingston HyperX Fury Black:</p>\r\n\r\n<h3>Thiết kế</h3>\r\n\r\n<ul>\r\n	<li><strong>M&agrave;u sắc:</strong> Đen tuyền, tạo vẻ ngo&agrave;i sang trọng v&agrave; mạnh mẽ.</li>\r\n	<li><strong>Tản nhiệt:</strong> Được trang bị bộ tản nhiệt bằng nh&ocirc;m gi&uacute;p tản nhiệt hiệu quả, đảm bảo hoạt động ổn định v&agrave; bền bỉ.</li>\r\n	<li><strong>K&iacute;ch thước:</strong> RAM c&oacute; chiều cao thấp, ph&ugrave; hợp với hầu hết c&aacute;c hệ thống m&aacute;y t&iacute;nh, kể cả những hệ thống kh&ocirc;ng gian hạn chế.</li>\r\n</ul>\r\n\r\n<h3>Hiệu suất</h3>\r\n\r\n<ul>\r\n	<li><strong>Dung lượng:</strong> C&oacute; c&aacute;c phi&ecirc;n bản dung lượng kh&aacute;c nhau từ 4GB, 8GB, 16GB đến 32GB, đ&aacute;p ứng nhu cầu sử dụng từ cơ bản đến n&acirc;ng cao.</li>\r\n	<li><strong>Tốc độ:</strong> C&aacute;c phi&ecirc;n bản c&oacute; tốc độ xung nhịp kh&aacute;c nhau, phổ biến l&agrave; 2400MHz, 2666MHz, 2933MHz v&agrave; 3200MHz, mang lại hiệu suất cao v&agrave; tốc độ truy cập nhanh.</li>\r\n	<li><strong>Điện &aacute;p:</strong> Điện &aacute;p hoạt động thấp, khoảng 1.2V, gi&uacute;p tiết kiệm năng lượng v&agrave; giảm nhiệt độ.</li>\r\n</ul>\r\n\r\n<h3>C&ocirc;ng nghệ</h3>\r\n\r\n<ul>\r\n	<li><strong>Plug and Play (PnP):</strong> Dễ d&agrave;ng c&agrave;i đặt m&agrave; kh&ocirc;ng cần cấu h&igrave;nh phức tạp, tự động &eacute;p xung l&ecirc;n tốc độ tối đa được ph&eacute;p.</li>\r\n	<li><strong>Hỗ trợ XMP:</strong> Tương th&iacute;ch với Intel Extreme Memory Profile (XMP), cho ph&eacute;p người d&ugrave;ng dễ d&agrave;ng &eacute;p xung v&agrave; tinh chỉnh hiệu suất th&ocirc;ng qua BIOS.</li>\r\n	<li><strong>Khả năng tương th&iacute;ch:</strong> Tương th&iacute;ch tốt với cả c&aacute;c hệ thống sử dụng vi xử l&yacute; Intel v&agrave; AMD.</li>\r\n</ul>\r\n\r\n<h3>Đặc điểm nổi bật</h3>\r\n\r\n<ul>\r\n	<li><strong>Độ bền cao:</strong> Sản phẩm được kiểm tra kỹ lưỡng về chất lượng, đảm bảo độ tin cậy v&agrave; độ bền cao.</li>\r\n	<li><strong>Bảo h&agrave;nh:</strong> Kingston cung cấp chế độ bảo h&agrave;nh l&acirc;u d&agrave;i, thường l&agrave; bảo h&agrave;nh trọn đời.</li>\r\n</ul>\r\n\r\n<h3>Ứng dụng</h3>\r\n\r\n<ul>\r\n	<li><strong>Gaming:</strong> RAM Kingston HyperX Fury Black l&yacute; tưởng cho c&aacute;c game thủ, đảm bảo tr&ograve; chơi mượt m&agrave; v&agrave; kh&ocirc;ng bị giật lag.</li>\r\n	<li><strong>Đồ họa v&agrave; xử l&yacute; đa nhiệm:</strong> Th&iacute;ch hợp cho c&aacute;c c&ocirc;ng việc đồ họa, chỉnh sửa video v&agrave; c&aacute;c t&aacute;c vụ đa nhiệm nặng.</li>\r\n</ul>\r\n\r\n<p>RAM Kingston HyperX Fury Black kh&ocirc;ng chỉ mang lại hiệu suất cao m&agrave; c&ograve;n c&oacute; thiết kế đẹp mắt v&agrave; khả năng tương th&iacute;ch tốt, l&agrave; lựa chọn h&agrave;ng đầu cho c&aacute;c hệ thống m&aacute;y t&iacute;nh y&ecirc;u cầu hiệu năng cao v&agrave; độ ổn định.</p>', '20-06-24-05-15-02.webp', '2024-06-19 22:15:02', '2024-06-20 03:30:47'),
(29, 'RAM Laptop Kingston Sodimm 1.2V 16GB 3200MHz CL22', 26, 72, 1150000, '<h2><strong>Ram laptop Kingston Sodimm 1.2V 16GB 3200MHz CL22 &ndash; Phụ kiện laptop tiết kiệm năng lượng</strong></h2>\r\n\r\n<p>Nỗi lo của người d&ugrave;ng khi gắn th&ecirc;m&nbsp;<a href=\"https://cellphones.com.vn/linh-kien/ram/ddr4.html\" target=\"_blank\" title=\"ram ddr4\"><strong>Ram DDR4</strong></a>&nbsp;cho thiết bị l&agrave; tốn điện năng ti&ecirc;u thụ, n&oacute;ng m&aacute;y,... Do đ&oacute;, trước khi chọn build m&aacute;y t&iacute;nh bạn phải t&igrave;m hiểu kỹ thanh Ram khắc phục được những nhược điểm n&agrave;y. H&atilde;y thử t&igrave;m hiểu ram laptop Kingston Sodimm 1.2V 16GB 3200MHz CL22 đến từ nh&agrave; sản xuất Kingston Technology.</p>\r\n\r\n<h3><strong>Chuẩn Ram DDR4, dung lượng l&ecirc;n đến 16GB</strong></h3>\r\n\r\n<p>Ram Kingston Sodimm 1.2V 16GB 3200Mhz CL22 l&agrave; thanh Ram chuẩn phổ th&ocirc;ng cho m&aacute;y t&iacute;nh, laptop. Dung lượng Ram l&ecirc;n đến 16GB, qu&aacute; ph&ugrave; hợp với mục đ&iacute;ch tăng bộ nhớ cho m&aacute;y của bạn.</p>\r\n\r\n<p>Sử dụng chuẩn&nbsp;<a href=\"https://cellphones.com.vn/linh-kien/ram/16gb.html\" target=\"_blank\" title=\"Ram 16GB DDR4\"><strong>Ram 16GB DDR4</strong></a>&nbsp;gi&uacute;p m&aacute;y xử l&yacute; đa nhiệm si&ecirc;u nhanh, mượt v&agrave; ổn định. Ngo&agrave;i ra, thanh Ram c&ograve;n dễ được trang bị cho m&aacute;y m&agrave; kh&ocirc;ng cần phải điều chỉnh cấu h&igrave;nh.</p>\r\n\r\n<p><img alt=\"Chuẩn Ram DDR4, dung lượng lên đến 16GB\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/accessories/memory_card/KINGSTON-SODIMM-1-2V-16GB-3200MHz-CL22-1.jpg\" /></p>\r\n\r\n<h3><strong>Bus 3200 Mhz, tiết kiệm năng lượng tối đa</strong></h3>\r\n\r\n<p>Ram Kingston Sodimm 1.2V 16GB 3200Mhz CL22 c&oacute; tốc độ bus cao, gi&uacute;p xử l&yacute; khối lượng dữ liệu lớn v&agrave; nhanh ch&oacute;ng. Tiết kiệm được khối thời gian thay v&igrave; bạn sử dụng những thanh Ram c&oacute; bus nhỏ hơn.</p>\r\n\r\n<p>Thanh&nbsp;<a href=\"https://cellphones.com.vn/linh-kien/ram/kingston.html\" target=\"_blank\" title=\"ram kingston laptop\"><strong>ram Kingston laptop</strong></a>&nbsp;n&agrave;y c&ograve;n d&ugrave;ng hiệu điện thế 1.2 V gi&uacute;p giảm ti&ecirc;u thụ điện năng, &iacute;t sinh nhiệt v&agrave; hạ thấp độ ồn. Tất cả những ưu thế n&agrave;y đều gi&uacute;p tăng độ bền v&agrave; tuổi thọ cho thanh Ram.</p>\r\n\r\n<p><img alt=\"Bus 3200 Mhz, tiết kiệm năng lượng tối đa\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/accessories/memory_card/KINGSTON-SODIMM-1-2V-16GB-3200MHz-CL22-2.jpg\" /></p>\r\n\r\n<h2><strong>Mua ngay Ram laptop Kingston Sodimm 1.2V 16GB 3200MHz CL22 ch&iacute;nh h&atilde;ng tại CellphoneS</strong></h2>\r\n\r\n<p>Ram Kingston Sodimm 1.2V 16GB 3200Mhz CL22 đem lại nhiều điểm lợi khi sử dụng cho người d&ugrave;ng. Để mua Ram về build m&aacute;y, h&atilde;y gọi ngay cho CellphoneS hoặc đến cửa h&agrave;ng gần nhất để rinh ngay một chiếc về.</p>', '20-06-24-10-09-59.webp', '2024-06-20 03:09:59', '2024-06-20 03:09:59'),
(30, 'SSD Samsung 980', 30, 76, 1290000, NULL, '20-06-24-14-49-49.webp', '2024-06-20 07:49:49', '2024-06-20 07:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `quantity`
--

DROP TABLE IF EXISTS `quantity`;
CREATE TABLE IF NOT EXISTS `quantity` (
  `quantity_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `color_id` int DEFAULT NULL,
  `capacity` varchar(225) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `quantity_product` int DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`quantity_id`),
  KEY `product_id` (`product_id`),
  KEY `color_id` (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quantity`
--

INSERT INTO `quantity` (`quantity_id`, `product_id`, `color_id`, `capacity`, `size`, `quantity_product`, `price`) VALUES
(2, 1, 23, NULL, NULL, 100, 2300000),
(3, 1, 27, NULL, NULL, 98, 2000000),
(6, 11, 29, NULL, NULL, 95, 2499000),
(7, 11, 31, NULL, NULL, 100, 2499000),
(8, 13, NULL, NULL, '355mm x 255mm x 3mm', 99, 2999000),
(9, 15, 35, NULL, NULL, 98, 1999000),
(10, 12, 33, NULL, NULL, 98, 17190000),
(12, 16, 36, NULL, NULL, 98, 1650000),
(13, 16, 37, NULL, NULL, 101, 1750000),
(14, 17, NULL, NULL, NULL, 10, 3300000),
(16, 25, 38, NULL, NULL, 100, 3740000),
(17, 25, 39, NULL, NULL, 100, 3740000),
(18, 25, 41, NULL, NULL, 100, 3740000),
(19, 1, 15, NULL, NULL, 93, 2000000),
(22, 24, NULL, NULL, NULL, 103, 4630000),
(23, 26, NULL, NULL, NULL, 101, 990000),
(25, 29, NULL, NULL, NULL, 103, 1150000),
(28, 30, NULL, '250GB', NULL, 100, 1000000),
(29, 30, NULL, '500GB', NULL, 100, 1500000),
(30, 30, NULL, '1TB', NULL, 100, 3000000),
(48, 25, 43, NULL, NULL, 123, 4000000);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2024-06-22 00:38:30', '2024-06-22 00:38:30'),
(2, 'admin', 'web', '2024-06-22 00:49:34', '2024-06-22 00:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(5, 2),
(6, 2),
(7, 2),
(8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int NOT NULL AUTO_INCREMENT,
  `article_id` int NOT NULL,
  `content1` text,
  `content2` text,
  `image_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`),
  KEY `image_id` (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Z3bIQhf0v6ljdScETYgxXijcRbQhtYniWZ7QaxPX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR3VpTEZlckJhZzM3R3BxZ3BldWhieGJFZWVQS2NhckN0RDhmcHpLUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0Ijt9czo0OiJjYXJ0IjthOjE6e3M6NToiMjVfMzkiO2E6OTp7czoyOiJpZCI7aToyNTtzOjQ6Im5hbWUiO3M6NTE6IkNodeG7mXQga2jDtG5nIGTDonkgc2nDqnUgbmjhurkgUHduYWdlIFN0b3JtQnJlYWtlciI7czo4OiJxdWFudGl0eSI7aToxO3M6NToicHJpY2UiO3M6NzoiMzc0MDAwMCI7czo1OiJpbWFnZSI7czoyMjoiMjAtMDYtMjQtMDQtMjktNTgud2VicCI7czo4OiJjb2xvcl9pZCI7aTozOTtzOjEwOiJjb2xvcl9uYW1lIjtzOjEwOiJ4YW5oIGzhu6VjIjtzOjg6ImNhcGFjaXR5IjtOO3M6NDoic2l6ZSI7Tjt9fX0=', 1721312777);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

DROP TABLE IF EXISTS `shipping`;
CREATE TABLE IF NOT EXISTS `shipping` (
  `shipping_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `shipping_method_id` int DEFAULT NULL,
  `shipping_date` datetime DEFAULT NULL,
  `shipped_date` datetime DEFAULT NULL,
  `status` enum('pending','shipped','delivered') DEFAULT NULL,
  PRIMARY KEY (`shipping_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_methods`
--

DROP TABLE IF EXISTS `shipping_methods`;
CREATE TABLE IF NOT EXISTS `shipping_methods` (
  `shipping_methods_id` int NOT NULL AUTO_INCREMENT,
  `method_name` varchar(100) NOT NULL,
  PRIMARY KEY (`shipping_methods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shipping_methods`
--

INSERT INTO `shipping_methods` (`shipping_methods_id`, `method_name`) VALUES
(1, 'Vận chuyển'),
(2, 'Nhận hàng tại cửa hàng');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `currency` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` int DEFAULT NULL,
  `address` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `email_verified_at`, `password`, `sdt`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'saliem', 'musasaliem92@gmail.com', NULL, '$2y$12$69MWcDPRkcu4FgcdDGnCKOquCtPMdoc9/Icqt3ciEp3HlVMxVjONq', NULL, NULL, NULL, '2024-06-13 08:01:20', '2024-06-13 08:01:20'),
(10, 'user2', 'user2@gmail.com', NULL, '$2y$12$hUxqaRMYgEJAQZvq/dLtQ.LzZs5wD3C0bFSCiPlxFwSj2dGEAM5wW', 358842700, '314/151 Au Duong Lan p3 q8', NULL, '2024-06-13 10:56:48', '2024-06-23 09:43:12'),
(11, 'user3', 'user3@gmail.com', NULL, '$2y$12$8DxdkQ.FjDis6efVNKsrs.4fmg2uyCIGGVrkgtFxEf0eHTNINJCKS', NULL, NULL, NULL, '2024-06-14 05:02:01', '2024-06-23 09:23:00'),
(14, 'user4', 'user4@gmail.com', NULL, '$2y$12$MDHfyxrkJHeroewEd6XFsOsGz.c7dS.ysbs1kaiP3IrLOm.ZhOu9e', NULL, NULL, NULL, '2024-06-15 05:05:29', '2024-06-15 05:05:29'),
(15, 'superadmin', 'superadmin@gmail.com', NULL, '$2y$12$iPqyPHNOWPD36DOu7fLWt.V2lAZOSGca20Z.K8C3h7yG4PQZZiHWC', NULL, NULL, NULL, '2024-06-22 00:39:02', '2024-06-22 00:39:02'),
(16, 'admin', 'admin@gmail.com', NULL, '$2y$12$TfPd4/oaAXp8JxczWJ6gQ.1GLm9qHkkpgwvKp3ALdrokUZ28LgGfm', NULL, NULL, NULL, '2024-06-22 00:51:58', '2024-06-22 00:51:58'),
(20, 'user10', 'user10@gmail.com', NULL, '$2y$12$HFWuMCxoqtnXpLYM.PFFq.DNnBxLpw1XNQPvGnS8cQy4OsJ9KdlgW', NULL, NULL, NULL, '2024-07-15 09:32:24', '2024-07-15 09:32:24'),
(21, 'user11', 'user11@gmail.com', NULL, '$2y$12$397CRERzJt7detLqOSk08O5SAq2dq/i5ijUVkm6g2ksu73N78e6bC', NULL, NULL, NULL, '2024-07-15 09:34:07', '2024-07-15 09:34:07'),
(22, 'user14', 'user14@gmail.com', NULL, '$2y$12$.O68HGS0TzCB9/nRT2TDaOQ70IptftSJ2IuAb97..t3z7Q6edGqIy', NULL, NULL, NULL, '2024-07-15 09:44:26', '2024-07-16 08:30:14');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `brand_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_2` FOREIGN KEY (`component_id`) REFERENCES `component` (`component_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `color`
--
ALTER TABLE `color`
  ADD CONSTRAINT `color_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `img_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `img_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `quantity`
--
ALTER TABLE `quantity`
  ADD CONSTRAINT `quantity_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `quantity_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `sections_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
