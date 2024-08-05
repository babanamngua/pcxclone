-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 31, 2024 at 05:44 PM
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
  `title` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `url_img` varchar(225) DEFAULT NULL,
  `content` text,
  `author` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title`, `url_img`, `content`, `author`, `created_at`, `updated_at`) VALUES
(15, 15, 'Hướng dẫn làm quen khi chuyển sang sử dụng lót chuột kính', '22-07-24-10-50-02.webp', 'Đặc điểm chung của lót chuột kính là nhanh, rất nhanh kể cả khi so sánh với các lót chuột vải dòng speed. Nhưng với các ưu điểm về độ bền và tính thẩm mỹ cao của lót chuột kính, bạn nên biết một số lưu ý nhỏ dưới đây để quá trình làm quen, sử dụng được diễn ra thoải mái nhất.', 'superadmin', '2024-07-22 03:50:02', '2024-07-22 03:50:02'),
(16, 15, 'Hướng dẫn chọn feet chuột phù hợp cho lót chuột kính cường lực', '22-07-24-10-50-49.webp', 'Khi chọn feet chuột trên lót chuột kính cường lực, chúng không tạo sự khác biệt dễ dàng nhận ra như lót chuột vải nhưng bạn có biết mỗi setup feet chuột, mỗi loại feet chuột khác nhau sẽ cho ra cảm giác di chuyển chuột khác nhau? Cùng nhà Xanh xem qua những kiến thức cơ bản bạn cần biết trước khi chọn feet chuột cho lót chuột kính cũng như những trải nghiệm của nhà xanh về một số dòng feet sử dụng trên lót chuột kính nha.', 'superadmin', '2024-07-22 03:50:49', '2024-07-22 03:50:49'),
(17, 15, 'Hướng dẫn cách bảo quản lót chuột kính luôn như mới', '22-07-24-10-51-12.webp', 'Khác với lót chuột vải bị bẩn và xuống cấp dần qua thời gian, lót chuột kính được làm từ kính cường lực có khả năng chống chịu mài mòn gần như tuyệt đối so với lót chuột vải. Dù độ bền cao như vậy bạn có biết lót chuột kính cũng cần được chăm sóc nhằm đảm bảo trải nghiệm tốt nhất mỗi khi bạn chơi game không? Cùng Phong Cách Xanh xem qua những điều nên làm và không nên làm giúp lót chuột kính bền và dùng đã hơn nha.', 'superadmin', '2024-07-22 03:51:12', '2024-07-22 03:51:12'),
(26, 15, 'Tại sao chơi game nên sử dụng chuột với polling rate cao như 8000Hz hoặc 4000Hz?', '22-07-24-11-48-37.webp', 'Khi nói đến việc nâng cao trải nghiệm chơi game, chúng ta thường nghĩ đến cấu hình máy tính, màn hình độ phân giải cao, và tai nghe âm thanh chân thực. Tuy nhiên, một yếu tố không kém phần quan trọng nhưng thường bị bỏ qua chính là chuột chơi game. Đặc biệt, chuột với polling rate cao như 8000Hz hoặc 4000Hz có thể mang lại sự khác biệt lớn cho các game thủ. Trong bài viết này, chúng ta sẽ tìm hiểu vì sao chuột có polling rate cao lại quan trọng và nó ảnh hưởng như thế nào đến hiệu suất chơi game.', 'superadmin', '2024-07-22 04:47:03', '2024-07-22 04:48:37'),
(27, 15, 'Hướng dẫn sử dụng phần mềm Lamzu Driver (dành cho chuột MCU Nordic)', '22-07-24-12-51-57.webp', 'Trong thế giới của game thủ chuyên nghiệp, việc sở hữu thiết bị tốt nhất có thể tạo nên sự khác biệt giữa chiến thắng và thất bại. Đặc biệt trong các tựa game FPS (First-Person Shooter), nơi mỗi mili giây đều có giá trị, việc chọn đúng bàn phím có thể ảnh hưởng lớn đến hiệu suất của người chơi. Trong bài viết này, chúng ta sẽ khám phá công nghệ Rapid Trigger trên bàn phím HE và tại sao nó được coi là tương lai của các game thủ FPS chuyên nghiệp.', 'superadmin', '2024-07-22 05:47:32', '2024-07-22 05:51:57');

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
('5Mclb3HyflDvBpoz', 'a:1:{s:11:\"valid_until\";i:1721063350;}', 1721083511);

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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(43, 25, 'Gray', '#808080', '2024-06-19 21:32:55', '2024-06-19 21:32:55'),
(52, 35, 'Đen', '#000000', '2024-07-26 00:18:01', '2024-07-26 00:18:01'),
(53, 35, 'Trắng', '#FFFFFF', '2024-07-26 00:18:01', '2024-07-26 00:18:01');

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
-- Table structure for table `comment_images`
--

DROP TABLE IF EXISTS `comment_images`;
CREATE TABLE IF NOT EXISTS `comment_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment_id` bigint UNSIGNED NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `comment_images`
--

INSERT INTO `comment_images` (`id`, `comment_id`, `image_url`) VALUES
(27, 25, '-0-184946.webp'),
(28, 26, '-0-185037.jpg'),
(29, 27, '-0-185944.webp'),
(30, 28, '-0-023357.webp'),
(31, 29, '-0-130940.jpg'),
(32, 29, '-1-130940.jpg'),
(33, 29, '-2-130940.jpg'),
(34, 29, '-3-130940.jpg'),
(35, 29, '-4-130940.jpg'),
(36, 29, '-5-130940.jpg'),
(37, 29, '-6-130940.jpg'),
(38, 29, '-7-130940.jpg'),
(39, 29, '-8-130940.jpg');

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
-- Table structure for table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
CREATE TABLE IF NOT EXISTS `coupon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `discount_id` int DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `remaining_quantity` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `discount_id` (`discount_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

DROP TABLE IF EXISTS `discount`;
CREATE TABLE IF NOT EXISTS `discount` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `value` decimal(10,0) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `description`, `value`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(8, NULL, 10, NULL, NULL, '2024-07-27 18:00:45', '2024-07-27 18:00:45');

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
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`img_id`, `product_id`, `color_id`, `url_img`) VALUES
(86, 11, 29, '11-0-074709.webp'),
(87, 11, 29, '11-1-074709.webp'),
(88, 12, 33, '12-0-085119.jpg'),
(89, 12, 33, '12-1-085119.jpg'),
(90, 12, 33, '12-2-085119.jpg'),
(91, 12, 33, '12-3-085119.jpg'),
(92, 12, 33, '12-4-085119.jpg'),
(93, 12, 33, '12-5-085119.jpg'),
(94, 12, 33, '12-6-085119.jpg'),
(95, 12, 33, '12-7-085119.jpg'),
(96, 12, 33, '12-8-085119.jpg'),
(97, 12, 33, '12-9-085119.jpg'),
(98, 12, 33, '12-10-085119.jpg'),
(99, 12, 33, '12-11-085119.jpg'),
(100, 12, 33, '12-12-085119.jpg'),
(101, 13, NULL, '13-0-085821.webp'),
(102, 13, NULL, '13-1-085821.webp'),
(104, 15, 35, '15-0-145151.webp'),
(105, 15, 35, '15-1-145151.webp'),
(106, 15, 35, '15-2-145151.webp'),
(107, 15, 35, '15-3-145151.webp'),
(108, 15, 35, '15-4-145151.webp'),
(109, 16, 36, '16-0-171452.webp'),
(110, 16, 36, '16-0-171514.webp'),
(111, 16, 36, '16-1-171514.webp'),
(112, 16, 36, '16-2-171514.webp'),
(113, 17, NULL, '17-0-171759.webp'),
(114, 17, NULL, '17-0-172001.webp'),
(115, 17, NULL, '17-1-172001.webp'),
(116, 17, NULL, '17-2-172001.webp'),
(128, 1, NULL, '1-0-105608.webp'),
(129, 1, NULL, '1-1-105608.webp'),
(130, 1, 15, '1-2-105608.webp'),
(131, 1, NULL, '1-3-105608.webp'),
(132, 1, NULL, '1-4-105608.webp'),
(150, 13, NULL, '13-0-143647.png'),
(151, 25, NULL, '25-0-043342.webp'),
(152, 25, NULL, '25-1-043342.webp'),
(153, 25, NULL, '25-2-043342.webp'),
(154, 25, NULL, '25-3-043342.webp'),
(155, 25, NULL, '25-4-043342.webp'),
(156, 25, 38, '25-5-043342.webp'),
(157, 25, NULL, '25-0-043422.webp'),
(158, 25, NULL, '25-1-043422.webp'),
(159, 25, NULL, '25-2-043422.webp'),
(160, 25, NULL, '25-3-043422.webp'),
(161, 25, NULL, '25-4-043422.webp'),
(162, 25, 41, '25-5-043422.webp'),
(163, 25, NULL, '25-0-043504.webp'),
(164, 25, NULL, '25-1-043504.webp'),
(165, 25, NULL, '25-2-043504.webp'),
(166, 25, NULL, '25-3-043504.webp'),
(167, 25, NULL, '25-4-043504.webp'),
(168, 25, 39, '25-5-043504.webp'),
(169, 25, NULL, '25-0-043545.webp'),
(170, 25, NULL, '25-1-043545.webp'),
(171, 25, NULL, '25-2-043545.webp'),
(172, 25, NULL, '25-3-043545.webp'),
(173, 25, NULL, '25-4-043545.webp'),
(174, 25, 43, '25-5-043545.webp'),
(175, 25, NULL, '25-0-043628.webp'),
(176, 25, NULL, '25-1-043628.webp'),
(177, 25, NULL, '25-2-043628.webp'),
(178, 25, NULL, '25-3-043628.webp'),
(179, 25, NULL, '25-4-043628.webp'),
(180, 25, NULL, '25-5-043628.webp'),
(181, 26, NULL, '26-0-051919.webp'),
(183, 35, NULL, '35-0-071823.webp'),
(184, 35, NULL, '35-1-071823.webp'),
(185, 35, NULL, '35-2-071823.webp'),
(186, 35, 52, '35-3-071823.webp'),
(187, 35, NULL, '35-4-071823.webp'),
(188, 35, NULL, '35-5-071823.webp'),
(189, 35, NULL, '35-6-071823.webp'),
(190, 35, NULL, '35-7-071823.webp'),
(191, 35, 52, '35-0-071831.webp'),
(192, 35, NULL, '35-1-071831.webp'),
(193, 35, NULL, '35-2-071831.webp'),
(194, 35, 53, '35-3-071831.webp'),
(195, 35, NULL, '35-4-071831.webp'),
(196, 35, NULL, '35-5-071831.webp'),
(197, 35, NULL, '35-6-071831.webp');

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(37, '2024_07_17_071439_create_transactions_table', 9),
(38, '2024_07_23_120610_create_review_table', 10),
(39, '2024_07_24_124042_create_comment_images_table', 11),
(40, '2024_07_27_130046_create_discount_table', 12),
(41, '2024_07_27_130338_create_coupon_table', 12),
(42, '2024_07_27_130718_create_usercoupon_table', 12),
(43, '2024_07_29_093043_create_pay_methods_table', 13),
(44, '2024_07_31_120805_create_address_company_table', 14);

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
(2, 'App\\Models\\User', 16),
(2, 'App\\Models\\User', 30);

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
  `pay_methods_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','confirmed','delivering','delivered','completed','cancelled','refunded','failed') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `name`, `email`, `sdt`, `address`, `total_price`, `shipping_methods_id`, `pay_methods_id`, `created_at`, `updated_at`, `status`) VALUES
(134, 10, 'user2', 'user2@gmail.com', 358842700, '314/151 Au Duong Lan p3 q8', 19015000, 1, 3, '2024-07-31 10:06:49', '2024-07-31 10:06:49', 'pending'),
(135, 10, 'user2', 'user2@gmail.com', 358842700, '314/151 Au Duong Lan p3 q8', 18990000, 2, 3, '2024-07-31 10:08:38', '2024-07-31 10:08:38', 'pending'),
(136, 10, 'user2', 'user2@gmail.com', 358842700, '314/151 Au Duong Lan p3 q8', 19035000, 1, 1, '2024-07-31 10:10:10', '2024-07-31 10:10:16', 'pending');

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
) ENGINE=InnoDB AUTO_INCREMENT=349 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `user_id`, `product_id`, `url_img`, `product_name`, `color_name`, `capacity`, `color_id`, `quantity`, `size`, `price`, `created_at`, `updated_at`) VALUES
(288, NULL, 20, 11, NULL, 'Chuột không dây siêu nhẹ Pulsar X2H Wireless (Hỗ trợ 4K Polling Rate)', 'Đen', NULL, 29, 1, NULL, 2499000, '2024-07-25 20:16:41', '2024-07-25 20:16:41'),
(289, NULL, 20, 13, NULL, 'Tấm lót chuột Razer Firefly V2 Pro', NULL, NULL, NULL, 2, '355mm x 255mm x 3mm', 2999000, '2024-07-25 21:11:43', '2024-07-25 21:11:48'),
(302, 99, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 2, NULL, 1800000, '2024-07-29 04:43:46', '2024-07-29 04:44:01'),
(303, 99, 10, 11, NULL, 'Chuột không dây siêu nhẹ Pulsar X2H Wireless (Hỗ trợ 4K Polling Rate)', 'Đen', NULL, 29, 1, NULL, 2499000, '2024-07-29 04:43:53', '2024-07-29 04:44:01'),
(304, 100, NULL, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-29 07:11:37', '2024-07-29 07:11:37'),
(305, 101, NULL, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 2, NULL, 1800000, '2024-07-29 08:32:40', '2024-07-29 08:32:40'),
(306, 102, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-29 08:41:55', '2024-07-29 08:45:56'),
(307, 103, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-29 08:47:04', '2024-07-29 09:27:23'),
(308, 104, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-29 09:33:06', '2024-07-29 09:46:01'),
(309, 105, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-29 09:46:24', '2024-07-29 10:03:16'),
(310, 106, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-29 10:03:34', '2024-07-29 10:03:49'),
(311, 107, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-29 10:03:56', '2024-07-29 10:04:19'),
(312, 108, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-29 10:08:29', '2024-07-29 10:08:45'),
(313, 109, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-29 10:23:35', '2024-07-29 10:37:18'),
(314, 110, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-30 19:55:26', '2024-07-30 20:22:43'),
(315, 111, 10, 11, NULL, 'Chuột không dây siêu nhẹ Pulsar X2H Wireless (Hỗ trợ 4K Polling Rate)', 'Đen', NULL, 29, 1, NULL, 2499000, '2024-07-30 20:23:51', '2024-07-30 20:24:06'),
(316, 112, 10, 11, NULL, 'Chuột không dây siêu nhẹ Pulsar X2H Wireless (Hỗ trợ 4K Polling Rate)', 'Đen', NULL, 29, 1, NULL, 2499000, '2024-07-30 20:25:49', '2024-07-30 20:26:37'),
(317, 113, 10, 11, NULL, 'Chuột không dây siêu nhẹ Pulsar X2H Wireless (Hỗ trợ 4K Polling Rate)', 'Đen', NULL, 29, 1, NULL, 2499000, '2024-07-30 20:52:12', '2024-07-30 22:02:19'),
(319, 117, 10, 13, NULL, 'Tấm lót chuột Razer Firefly V2 Pro', NULL, NULL, NULL, 1, '355mm x 255mm x 3mm', 2999000, '2024-07-30 22:08:42', '2024-07-30 22:09:01'),
(320, 119, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-31 05:22:50', '2024-07-31 08:24:02'),
(321, 119, 10, 12, NULL, 'Laptop HP Pavilion 14 dv2073TU i5 1235U/16GB/512GB/Win11 (7C0P2PA)', 'Be, nhạt', NULL, 33, 2, NULL, 17190000, '2024-07-31 05:22:52', '2024-07-31 08:24:02'),
(322, 120, 10, 12, NULL, 'Laptop HP Pavilion 14 dv2073TU i5 1235U/16GB/512GB/Win11 (7C0P2PA)', 'Be, nhạt', NULL, 33, 1, NULL, 17190000, '2024-07-31 08:26:01', '2024-07-31 08:26:40'),
(323, 120, 10, 30, NULL, 'SSD Samsung 980', NULL, '250GB', NULL, 1, NULL, 1000000, '2024-07-31 08:26:05', '2024-07-31 08:26:40'),
(324, 121, 10, 12, NULL, 'Laptop HP Pavilion 14 dv2073TU i5 1235U/16GB/512GB/Win11 (7C0P2PA)', 'Be, nhạt', NULL, 33, 1, NULL, 17190000, '2024-07-31 09:18:17', '2024-07-31 09:18:57'),
(325, 121, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-31 09:18:19', '2024-07-31 09:18:57'),
(326, 122, 10, 12, NULL, 'Laptop HP Pavilion 14 dv2073TU i5 1235U/16GB/512GB/Win11 (7C0P2PA)', 'Be, nhạt', NULL, 33, 1, NULL, 17190000, '2024-07-31 09:19:56', '2024-07-31 09:20:42'),
(327, 122, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-31 09:19:57', '2024-07-31 09:20:42'),
(328, 123, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-31 09:22:12', '2024-07-31 09:22:53'),
(329, 123, 10, 13, NULL, 'Tấm lót chuột Razer Firefly V2 Pro', NULL, NULL, NULL, 1, '355mm x 255mm x 3mm', 2999000, '2024-07-31 09:22:13', '2024-07-31 09:22:53'),
(330, 124, 10, 12, NULL, 'Laptop HP Pavilion 14 dv2073TU i5 1235U/16GB/512GB/Win11 (7C0P2PA)', 'Be, nhạt', NULL, 33, 1, NULL, 17190000, '2024-07-31 09:28:13', '2024-07-31 09:28:32'),
(331, 124, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-31 09:28:14', '2024-07-31 09:28:32'),
(332, 125, 10, 12, NULL, 'Laptop HP Pavilion 14 dv2073TU i5 1235U/16GB/512GB/Win11 (7C0P2PA)', 'Be, nhạt', NULL, 33, 1, NULL, 17190000, '2024-07-31 09:29:59', '2024-07-31 09:31:41'),
(333, 125, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-31 09:30:00', '2024-07-31 09:31:41'),
(334, 127, 10, 12, NULL, 'Laptop HP Pavilion 14 dv2073TU i5 1235U/16GB/512GB/Win11 (7C0P2PA)', 'Be, nhạt', NULL, 33, 1, NULL, 17190000, '2024-07-31 09:32:43', '2024-07-31 09:33:04'),
(335, 127, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-31 09:32:44', '2024-07-31 09:33:04'),
(336, 130, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-31 09:41:03', '2024-07-31 09:41:27'),
(337, 131, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 2, NULL, 1800000, '2024-07-31 09:45:06', '2024-07-31 09:45:28'),
(338, 131, 10, 12, NULL, 'Laptop HP Pavilion 14 dv2073TU i5 1235U/16GB/512GB/Win11 (7C0P2PA)', 'Be, nhạt', NULL, 33, 1, NULL, 17190000, '2024-07-31 09:45:08', '2024-07-31 09:45:28'),
(339, 132, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-31 09:51:03', '2024-07-31 09:52:28'),
(340, 132, 10, 12, NULL, 'Laptop HP Pavilion 14 dv2073TU i5 1235U/16GB/512GB/Win11 (7C0P2PA)', 'Be, nhạt', NULL, 33, 1, NULL, 17190000, '2024-07-31 09:51:38', '2024-07-31 09:52:28'),
(341, 133, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-31 09:54:42', '2024-07-31 10:03:34'),
(342, 133, 10, 12, NULL, 'Laptop HP Pavilion 14 dv2073TU i5 1235U/16GB/512GB/Win11 (7C0P2PA)', 'Be, nhạt', NULL, 33, 1, NULL, 17190000, '2024-07-31 09:54:44', '2024-07-31 10:03:34'),
(343, 134, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-31 10:04:44', '2024-07-31 10:06:49'),
(344, 134, 10, 12, NULL, 'Laptop HP Pavilion 14 dv2073TU i5 1235U/16GB/512GB/Win11 (7C0P2PA)', 'Be, nhạt', NULL, 33, 1, NULL, 17190000, '2024-07-31 10:04:45', '2024-07-31 10:06:49'),
(345, 135, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-31 10:07:58', '2024-07-31 10:08:38'),
(346, 135, 10, 12, NULL, 'Laptop HP Pavilion 14 dv2073TU i5 1235U/16GB/512GB/Win11 (7C0P2PA)', 'Be, nhạt', NULL, 33, 1, NULL, 17190000, '2024-07-31 10:08:00', '2024-07-31 10:08:38'),
(347, 136, 10, 1, NULL, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 'Đen', NULL, 15, 1, NULL, 1800000, '2024-07-31 10:09:39', '2024-07-31 10:10:16'),
(348, 136, 10, 12, NULL, 'Laptop HP Pavilion 14 dv2073TU i5 1235U/16GB/512GB/Win11 (7C0P2PA)', 'Be, nhạt', NULL, 33, 1, NULL, 17190000, '2024-07-31 10:09:41', '2024-07-31 10:10:16');

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
-- Table structure for table `pay_methods`
--

DROP TABLE IF EXISTS `pay_methods`;
CREATE TABLE IF NOT EXISTS `pay_methods` (
  `pay_methods_id` int NOT NULL AUTO_INCREMENT,
  `method_name` varchar(100) NOT NULL,
  PRIMARY KEY (`pay_methods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pay_methods`
--

INSERT INTO `pay_methods` (`pay_methods_id`, `method_name`) VALUES
(1, 'Credit/debit card'),
(2, 'VNPAY'),
(3, 'Thanh toán khi nhận hàng (COD)');

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
  `price` decimal(10,0) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `product_specifications` text,
  `weight` decimal(10,3) DEFAULT NULL,
  `url_name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category_id`, `brand_id`, `price`, `description`, `product_specifications`, `weight`, `url_name`, `created_at`, `updated_at`) VALUES
(1, 'Chuột không dây siêu nhẹ Lamzu Atlantis Mini Pro - Hỗ trợ 4KHz', 24, 47, 2000000, '<p><strong>Cải tiến tr&ecirc;n phi&ecirc;n bản&nbsp;Mini Pro:</strong></p>\r\n\r\n<ul>\r\n	<li>Hỗ trợ kết nối Wireless 4KHz. Chip MCU Nordic.</li>\r\n	<li>Bản m&agrave;u đen đi k&egrave;m&nbsp;đầu thu 4KHz.</li>\r\n</ul>\r\n\r\n<p>Mua receiver Lamzu Atlantis 4KHz&nbsp;<a href=\"https://www.phongcachxanh.vn/products/receiver-4khz-cho-chuot-lamzu-atlantis-chi-ho-tro-dong-tuong-thich-4khz\">tại đ&acirc;y.</a></p>\r\n\r\n<p>Lamzu l&agrave; một c&ocirc;ng ty được th&agrave;nh lập từ những người đam m&ecirc; c&aacute;c thiết bị ngoại vi m&aacute;y t&iacute;nh, game thủ FPS, designer, kỹ sư kết cấu v&agrave; quản l&yacute; chuỗi cung ứng với nhiều năm kinh nghiệm trong ng&agrave;nh c&ocirc;ng nghiệp gaming.</p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p><strong>Design by Lamzu.</strong></p>\r\n\r\n<p><strong>Bảo h&agrave;nh: 12 th&aacute;ng đổi mới</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>', NULL, 0.054, '13-06-24-16-53-28.webp', '2024-05-31 02:00:29', '2024-07-31 04:48:28'),
(11, 'Chuột không dây siêu nhẹ Pulsar X2H Wireless (Hỗ trợ 4K Polling Rate)', 24, 48, 2499000, '<p><strong>Giảm 10% dongle 4K</strong>&nbsp;khi mua k&egrave;m chuột Pulsar X2V2/X2H/X2A hỗ trợ 4K Polling Rate</p>\r\n\r\n<p>Phi&ecirc;n bản mới nhất của chuột Pulsar X2 cực kỳ th&agrave;nh c&ocirc;ng của Pulsar. X2H l&agrave; phi&ecirc;n bản sử dụng thiết kế mới nhất c&ugrave;ng form chuột thay đổi lưng cao v&agrave; l&ugrave;i s&acirc;u hơn d&agrave;nh cho c&aacute;c bạn th&iacute;ch kiểu cầm chuột claw grip.</p>\r\n\r\n<ul>\r\n	<li>Thiết kế h&ocirc;ng hẹp, lưng l&ugrave;i cao ho&agrave;n to&agrave;n mới.</li>\r\n	<li>Switch quang học. Cuộn chuột Pulsar chống bụi.</li>\r\n	<li>Thay đổi cấu tr&uacute;c b&ecirc;n trong, giảm trọng lượng, tăng độ chắc chắn.</li>\r\n	<li>Hỗ trợ report rate 4000Hz nhờ MCU Nordic (dongle 4000Hz b&aacute;n rời).</li>\r\n	<li>V&agrave; một số thay đổi nhỏ, tăng trải nghiệm sử dụng sản phẩm.</li>\r\n	<li><strong>Designed in Korea</strong></li>\r\n</ul>\r\n\r\n<p><strong>Bảo h&agrave;nh: 24 th&aacute;ng đổi mới</strong></p>', NULL, 0.000, '14-06-24-18-21-16.webp', '2024-06-08 00:46:37', '2024-06-14 12:30:52'),
(12, 'Laptop HP Pavilion 14 dv2073TU i5 1235U/16GB/512GB/Win11 (7C0P2PA)', 29, 70, 17190000, '<h3><a href=\"https://www.thegioididong.com/laptop/hp-pavilion-14-dv2073tu-i5-7c0p2pa\" rel=\"noopener\" target=\"_blank\" title=\"Tham khảo Laptop HP Pavilion 14 dv2073TU i5 1235U (7C0P2PA) tại thegioididong.com\">Laptop HP Pavilion 14 dv2073TU i5 1235U (7C0P2PA)</a>&nbsp;vừa c&oacute; mặt tại Thế Giới Di Động sẽ khiến bạn thực sự ấn tượng với vẻ ngo&agrave;i v&ocirc; c&ugrave;ng trẻ trung, sở hữu th&ocirc;ng số cấu h&igrave;nh mạnh mẽ cho bất cứ nhu cầu sử dụng c&aacute; nh&acirc;n n&agrave;o. Đ&acirc;y ch&iacute;nh x&aacute;c l&agrave; một mẫu&nbsp;<a href=\"https://www.thegioididong.com/laptop?g=hoc-tap-van-phong\" rel=\"noopener\" target=\"_blank\" title=\"Tham khảo các mẫu laptop học tập - văn phòng tại thegioididong.com\">laptop học tập - văn ph&ograve;ng</a>&nbsp;d&agrave;nh cho mọi nh&agrave;.</h3>\r\n\r\n<p>&bull; HP Pavilion 14 sẽ cho người d&ugrave;ng khả năng xử l&yacute; ho&agrave;n hảo mọi t&aacute;c vụ c&ocirc;ng việc từ soạn thảo văn bản, thực hiện thuyết tr&igrave;nh hay thao t&aacute;c trang t&iacute;nh đến việc coding đơn giản, thiết kế đồ hoạ nhẹ v&agrave; video cơ bản nhờ hiệu năng mạnh mẽ từ con chip&nbsp;<strong>Intel Core i5 1235U&nbsp;</strong>v&agrave; card t&iacute;ch hợp&nbsp;<strong>Intel Iris Xe Graphics</strong>.</p>\r\n\r\n<p>&bull; Ngo&agrave;i ra, sau những giờ ph&uacute;t l&agrave;m việc căng thẳng, bạn cũng c&oacute; thể giải tr&iacute; nhẹ nh&agrave;ng với những con game LOL, Valorant hay FO4 với mức cấu h&igrave;nh tinh chỉnh.</p>\r\n\r\n<p>&bull; Bộ nhớ&nbsp;<strong>RAM 16 GB DDR4 2 khe</strong>&nbsp;mở ra khả năng đa nhiệm tuyệt vời cho c&aacute;c y&ecirc;u cầu kh&aacute;c nhau c&ugrave;ng l&uacute;c, vừa chỉnh sửa h&igrave;nh ảnh tr&ecirc;n Photoshop, vừa mở h&agrave;ng loạt c&aacute;c tab Chrome hay thưởng thức một bản nhạc du dương m&agrave; kh&ocirc;ng lo&nbsp;<a href=\"https://www.thegioididong.com/laptop\" rel=\"noopener\" target=\"_blank\" title=\"Tham khảo các mẫu laptop tại thegioididong.com\">laptop</a>&nbsp;bị đơ.</p>\r\n\r\n<p>&bull; Ổ cứng&nbsp;<strong>SSD</strong>&nbsp;cải thiện đ&aacute;ng kể tốc độ khởi động c&aacute;c ứng dụng, dung lượng thoải m&aacute;i&nbsp;<strong>512 GB</strong>&nbsp;c&oacute; thể mở rộng đến&nbsp;<strong>1 TB</strong>&nbsp;phục vụ đa dạng c&aacute;c y&ecirc;u cầu.</p>\r\n\r\n<p>&bull; L&agrave;m việc thuận lợi v&agrave; thoải m&aacute;i hơn với m&agrave;n h&igrave;nh laptop&nbsp;<strong>14 inch</strong>&nbsp;được t&iacute;ch hợp c&ugrave;ng&nbsp;<strong>IPS</strong>&nbsp;cho m&agrave;n h&igrave;nh mỏng, mở rộng g&oacute;c nh&igrave;n h&igrave;nh ảnh kh&ocirc;ng bị thay đổi d&ugrave; bạn đang nh&igrave;n nghi&ecirc;ng. Độ ph&acirc;n giải&nbsp;<strong>Full HD (1920 x 1080)</strong>&nbsp;cho h&igrave;nh ảnh th&ecirc;m r&otilde; n&eacute;t v&agrave; chi tiết trong mọi t&igrave;nh huống sử dụng.</p>\r\n\r\n<p>&bull; Hệ thống loa k&eacute;p được tinh chỉnh bởi<strong>&nbsp;B&amp;O&nbsp;</strong>t&iacute;ch hợp với c&ocirc;ng nghệ<strong>&nbsp;HP Audio Boost</strong>&nbsp;mang đến chất &acirc;m sống động v&agrave; trung thực, cho ph&uacute;t gi&acirc;y giải tr&iacute; của người d&ugrave;ng th&ecirc;m thư gi&atilde;n v&agrave; th&uacute; vị.</p>\r\n\r\n<p>&bull;&nbsp;<a href=\"https://www.thegioididong.com/laptop-hp-compaq-pavilion\" rel=\"noopener\" target=\"_blank\" title=\"Tham khảo các mẫu laptop HP Pavilion tại thegioididong.com\">Laptop HP Pavilion</a>&nbsp;được ho&agrave;n thiện với gam m&agrave;u&nbsp;<strong>v&agrave;ng&nbsp;</strong>&oacute;ng chủ đạo v&agrave; lớp vỏ&nbsp;<strong>nhựa&nbsp;</strong>chắc chắn, kiểu d&aacute;ng tinh tế ph&ugrave; hợp để c&oacute; thể sử dụng ở bất cứ đ&acirc;u. Linh động hơn với khối lượng tổng thể chỉ vỏn vẹn&nbsp;<strong>1.41 kg</strong>, thuận tiện cho bạn mang theo b&ecirc;n m&igrave;nh khi di chuyển.</p>\r\n\r\n<p>&bull; Mẫu&nbsp;<a href=\"https://www.thegioididong.com/laptop-hp-compaq\" rel=\"noopener\" target=\"_blank\" title=\"Tham khảo các mẫu laptop HP tại thegioididong.com\">laptop HP</a>&nbsp;n&agrave;y cũng t&iacute;ch hợp đầy đủ c&aacute;c cổng kết nối th&ocirc;ng dụng cho đa nhu cầu của người d&ugrave;ng như: Jack tai nghe 3.5 mm, USB Type-A, HDMI v&agrave; USB Type-C.</p>', NULL, 5.000, '14-06-24-18-22-00.jpg', '2024-06-08 01:38:50', '2024-07-31 05:21:52'),
(13, 'Tấm lót chuột Razer Firefly V2 Pro', 28, 52, 2999000, '<p><strong>Th&ocirc;ng số kỹ thuật</strong></p>\r\n\r\n<table border=\"1\" cellpadding=\"3\" cellspacing=\"0\" id=\"tblGeneralAttribute\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>H&atilde;ng sản xuất</strong></td>\r\n			<td>Razer</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Model</strong></td>\r\n			<td>Firefly V2 Pro</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chống trượt</strong></td>\r\n			<td>C&oacute;</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>K&iacute;ch thước</strong></td>\r\n			<td>360mm x 278mm x 4.6mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chất liệu</strong></td>\r\n			<td>Micro-textured</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>LED</strong></td>\r\n			<td>Chroma RGB</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>T&iacute;nh năng đặc biệt</strong></td>\r\n			<td>Đ&egrave;n led RGB to&agrave;n bộ bề mặt l&oacute;t chuột<br />\r\n			Chất liệu Micro-texture<br />\r\n			T&iacute;ch hợp cổng USB-A 2.0<br />\r\n			C&aacute;p USB-C rời</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, 0.000, '18-06-24-14-36-06.png', '2024-06-08 01:49:50', '2024-06-18 07:36:06'),
(15, 'Chuột không dây siêu nhẹ Glorious Model O PRO Forge Limited Edition', 24, 49, 1999000, '<p><strong>Th&ocirc;ng tin cơ bản</strong></p>\r\n\r\n<ul>\r\n	<li>Form chuột đối xứng.</li>\r\n	<li>Trọng lượng si&ecirc;u nhẹ&nbsp;<strong>55g.</strong></li>\r\n	<li>Thời lượng pin&nbsp;<strong>hơn 80 giờ.</strong></li>\r\n	<li>Kết cấu vỏ, lớp phủ ho&agrave;n to&agrave;n mới.</li>\r\n</ul>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p><strong>Designed in USA</strong></p>\r\n\r\n<p><strong>Bảo h&agrave;nh: 24 th&aacute;ng đổi mới.</strong></p>', NULL, 0.000, '14-06-24-18-24-49.webp', '2024-06-09 05:28:37', '2024-06-14 12:33:46'),
(16, 'Chuột không dây siêu nhẹ CHERRY Xtrfy M8 Wireless', 24, 63, 1650000, '<p>Cherry Xtrfy l&agrave; thương hiệu gaming mang hai d&ograve;ng m&aacute;u Đức (Cherry) - Thụy Điển (Xtrfy) với c&aacute;c sản phẩm gaming gear mang t&iacute;nh đột ph&aacute; đến với thị trường. Cherry Xtrfy cũng l&agrave; nh&agrave; t&agrave;i trợ cho hai đội game danh tiếng<strong>&nbsp;Team</strong>&nbsp;<strong>Vitality</strong>&nbsp;(v&ocirc; địch BLAST.tv&nbsp;Paris Major&nbsp;2023) v&agrave;&nbsp;<strong>Heroic</strong>&nbsp;(v&ocirc; địch BLAST Premier: Spring Final 2023)</p>\r\n\r\n<p>Chuột gaming Xtrfy M8 l&agrave; mẫu chuột kh&ocirc;ng d&acirc;y h&agrave;ng đầu với hiệu năng vượt trội c&ugrave;ng thiết kế độc nhất. Với phần th&acirc;n trước low-profile, Xtrfy M8 Wireless được thiết kế đặc biệt hướng tới khả năng control v&agrave; độ ch&iacute;nh x&aacute;c.</p>\r\n\r\n<p>Với Xtrfy M8 Wireless, bạn c&oacute; một mẫu chuột tốt cả về c&ocirc;ng năng v&agrave; thiết kế với to&agrave;n bộ th&acirc;n chuột được thiết kế tối ưu trọng lượng nhưng vẫn giữ dung lượng pin 300mA ti&ecirc;u chuẩn đảm bảo thời gian sử dụng tốt nhất.</p>\r\n\r\n<p><strong>C&aacute;c th&ocirc;ng số nổi bật:</strong></p>\r\n\r\n<ul>\r\n	<li>Cảm biến Pixart PAW3395, 26000 DPI, 650 IPS, 50G</li>\r\n	<li>Trọng lượng: 55 gram, kh&ocirc;ng lỗ</li>\r\n	<li>Form: đối xứng, n&uacute;t chuột low profile</li>\r\n	<li>Kết nối: 2.4GHz kh&ocirc;ng d&acirc;y | USB-C (sạc)</li>\r\n</ul>\r\n\r\n<p><strong>Designed in&nbsp;Sweden</strong></p>\r\n\r\n<p><strong>Bảo h&agrave;nh: 12 th&aacute;ng đổi mới</strong></p>', NULL, 0.000, '14-06-24-18-25-18.webp', '2024-06-09 05:30:43', '2024-06-14 12:33:46'),
(17, 'Chuột không dây siêu nhẹ Pulsar X2H eS (Đi kèm dongle 4K Polling Rate)', 24, 48, 3300000, '<p>Phi&ecirc;n bản hiệu năng cao đạt chuẩn thi đấu chuy&ecirc;n nghiệp của chuột Pulsar&nbsp;X2H.</p>\r\n\r\n<ul>\r\n	<li>M&agrave;n h&igrave;nh OLED dưới chuột</li>\r\n	<li><strong>Switch quang học.</strong>&nbsp;Cuộn chuột Pulsar chống bụi.</li>\r\n	<li>Thay đổi cấu tr&uacute;c b&ecirc;n trong, giảm trọng lượng, tăng độ chắc chắn.</li>\r\n	<li>Hỗ trợ report rate 4000Hz (wireless), 8000Hz (cắm d&acirc;y).</li>\r\n	<li>Đi k&egrave;m dongle 4K d&agrave;nh ri&ecirc;ng cho eS series.</li>\r\n	<li>Kh&ocirc;ng cần c&agrave;i driver. To&agrave;n bộ t&iacute;nh năng điều chỉnh được t&iacute;ch hợp tr&ecirc;n chuột.</li>\r\n	<li><strong>Designed in Korea</strong></li>\r\n</ul>\r\n\r\n<p><strong>Bảo h&agrave;nh: 24 th&aacute;ng đổi mới</strong></p>', NULL, 0.000, '14-06-24-18-25-30.webp', '2024-06-10 10:17:42', '2024-06-14 11:25:30'),
(25, 'Chuột không dây siêu nhẹ Pwnage StormBreaker', 24, 67, 3740000, '<p>Pwnage l&agrave; c&ocirc;ng ty gaming gear c&oacute; trụ sở tại California, Mỹ. Pwnage nổi bật nhất với c&aacute;c sản phẩm c&oacute; khả năng custom mạnh mẽ về ngoại h&igrave;nh v&agrave; l&agrave; h&atilde;ng&nbsp;<strong>đầu ti&ecirc;n giới thiệu c&ocirc;ng nghệ điều chỉnh vị tr&iacute; cảm biến</strong>&nbsp;để tối ưu cảm gi&aacute;c di chuột cho từng người.</p>\r\n\r\n<p>Stormbreaker l&agrave; sản phẩm đột ph&aacute; nhất của Pwnage bằng việc kế thừa c&ocirc;ng nghệ điều chỉnh cảm biến v&agrave; ứng dụng những c&ocirc;ng nghệ, vật liệu mới nhất:</p>\r\n\r\n<ul>\r\n	<li>Nặng chỉ 51g, l&agrave;m từ kim loại&nbsp;<strong>magnesium</strong>: nhẹ hơn nh&ocirc;m 33%, nhẹ hơn titan 50% v&agrave; nhẹ hơn th&eacute;p 75%.</li>\r\n	<li>C&ocirc;ng nghệ điều chỉnh vị tr&iacute; cảm biến: tối đa độ ch&iacute;nh x&aacute;c v&agrave; vị tr&iacute; cảm biến l&yacute; tưởng cho từng cỡ tay.</li>\r\n	<li><strong>Polling rate&nbsp;2000Hz</strong>: c&acirc;n bằng giữa độ trễ của chuột v&agrave; khả năng xử l&yacute; của m&aacute;y t&iacute;nh.</li>\r\n	<li>Cảm biến Pixart PAW3395 mới nhất: 26000 DPI, 650 IPS.</li>\r\n	<li><strong>MCU Nordic nrf52840</strong>&nbsp;tối ưu hiệu năng kết nối v&agrave; thời lượng pin: 120 giờ / 2 giờ sạc.</li>\r\n</ul>\r\n\r\n<p><strong>Design in USA</strong></p>\r\n\r\n<p><strong>Bảo h&agrave;nh 12 th&aacute;ng</strong></p>\r\n\r\n<p><strong>Lưu &yacute;:&nbsp;</strong>trước khi sử dụng h&atilde;y lột bỏ film bảo vệ&nbsp;bề mặt feet mới để c&oacute; trải nghiệm tốt nhất.</p>', NULL, 0.000, '20-06-24-04-29-58.webp', '2024-06-19 21:29:58', '2024-07-18 03:34:12'),
(26, 'Ram Kingston HyperX Fury Black 1x8G 2666', 25, 71, 990000, '<p>Kingston HyperX Fury Black l&agrave; một d&ograve;ng sản phẩm RAM nổi tiếng được thiết kế để tối ưu h&oacute;a hiệu suất m&aacute;y t&iacute;nh. Dưới đ&acirc;y l&agrave; m&ocirc; tả chi tiết về RAM Kingston HyperX Fury Black:</p>\r\n\r\n<h3>Thiết kế</h3>\r\n\r\n<ul>\r\n	<li><strong>M&agrave;u sắc:</strong> Đen tuyền, tạo vẻ ngo&agrave;i sang trọng v&agrave; mạnh mẽ.</li>\r\n	<li><strong>Tản nhiệt:</strong> Được trang bị bộ tản nhiệt bằng nh&ocirc;m gi&uacute;p tản nhiệt hiệu quả, đảm bảo hoạt động ổn định v&agrave; bền bỉ.</li>\r\n	<li><strong>K&iacute;ch thước:</strong> RAM c&oacute; chiều cao thấp, ph&ugrave; hợp với hầu hết c&aacute;c hệ thống m&aacute;y t&iacute;nh, kể cả những hệ thống kh&ocirc;ng gian hạn chế.</li>\r\n</ul>\r\n\r\n<h3>Hiệu suất</h3>\r\n\r\n<ul>\r\n	<li><strong>Dung lượng:</strong> C&oacute; c&aacute;c phi&ecirc;n bản dung lượng kh&aacute;c nhau từ 4GB, 8GB, 16GB đến 32GB, đ&aacute;p ứng nhu cầu sử dụng từ cơ bản đến n&acirc;ng cao.</li>\r\n	<li><strong>Tốc độ:</strong> C&aacute;c phi&ecirc;n bản c&oacute; tốc độ xung nhịp kh&aacute;c nhau, phổ biến l&agrave; 2400MHz, 2666MHz, 2933MHz v&agrave; 3200MHz, mang lại hiệu suất cao v&agrave; tốc độ truy cập nhanh.</li>\r\n	<li><strong>Điện &aacute;p:</strong> Điện &aacute;p hoạt động thấp, khoảng 1.2V, gi&uacute;p tiết kiệm năng lượng v&agrave; giảm nhiệt độ.</li>\r\n</ul>\r\n\r\n<h3>C&ocirc;ng nghệ</h3>\r\n\r\n<ul>\r\n	<li><strong>Plug and Play (PnP):</strong> Dễ d&agrave;ng c&agrave;i đặt m&agrave; kh&ocirc;ng cần cấu h&igrave;nh phức tạp, tự động &eacute;p xung l&ecirc;n tốc độ tối đa được ph&eacute;p.</li>\r\n	<li><strong>Hỗ trợ XMP:</strong> Tương th&iacute;ch với Intel Extreme Memory Profile (XMP), cho ph&eacute;p người d&ugrave;ng dễ d&agrave;ng &eacute;p xung v&agrave; tinh chỉnh hiệu suất th&ocirc;ng qua BIOS.</li>\r\n	<li><strong>Khả năng tương th&iacute;ch:</strong> Tương th&iacute;ch tốt với cả c&aacute;c hệ thống sử dụng vi xử l&yacute; Intel v&agrave; AMD.</li>\r\n</ul>\r\n\r\n<h3>Đặc điểm nổi bật</h3>\r\n\r\n<ul>\r\n	<li><strong>Độ bền cao:</strong> Sản phẩm được kiểm tra kỹ lưỡng về chất lượng, đảm bảo độ tin cậy v&agrave; độ bền cao.</li>\r\n	<li><strong>Bảo h&agrave;nh:</strong> Kingston cung cấp chế độ bảo h&agrave;nh l&acirc;u d&agrave;i, thường l&agrave; bảo h&agrave;nh trọn đời.</li>\r\n</ul>\r\n\r\n<h3>Ứng dụng</h3>\r\n\r\n<ul>\r\n	<li><strong>Gaming:</strong> RAM Kingston HyperX Fury Black l&yacute; tưởng cho c&aacute;c game thủ, đảm bảo tr&ograve; chơi mượt m&agrave; v&agrave; kh&ocirc;ng bị giật lag.</li>\r\n	<li><strong>Đồ họa v&agrave; xử l&yacute; đa nhiệm:</strong> Th&iacute;ch hợp cho c&aacute;c c&ocirc;ng việc đồ họa, chỉnh sửa video v&agrave; c&aacute;c t&aacute;c vụ đa nhiệm nặng.</li>\r\n</ul>\r\n\r\n<p>RAM Kingston HyperX Fury Black kh&ocirc;ng chỉ mang lại hiệu suất cao m&agrave; c&ograve;n c&oacute; thiết kế đẹp mắt v&agrave; khả năng tương th&iacute;ch tốt, l&agrave; lựa chọn h&agrave;ng đầu cho c&aacute;c hệ thống m&aacute;y t&iacute;nh y&ecirc;u cầu hiệu năng cao v&agrave; độ ổn định.</p>', NULL, 3.000, '20-06-24-05-15-02.webp', '2024-06-19 22:15:02', '2024-07-31 05:22:13'),
(29, 'RAM Laptop Kingston Sodimm 1.2V 16GB 3200MHz CL22', 26, 72, 1150000, '<h2><strong>Ram laptop Kingston Sodimm 1.2V 16GB 3200MHz CL22 &ndash; Phụ kiện laptop tiết kiệm năng lượng</strong></h2>\r\n\r\n<p>Nỗi lo của người d&ugrave;ng khi gắn th&ecirc;m&nbsp;<a href=\"https://cellphones.com.vn/linh-kien/ram/ddr4.html\" target=\"_blank\" title=\"ram ddr4\"><strong>Ram DDR4</strong></a>&nbsp;cho thiết bị l&agrave; tốn điện năng ti&ecirc;u thụ, n&oacute;ng m&aacute;y,... Do đ&oacute;, trước khi chọn build m&aacute;y t&iacute;nh bạn phải t&igrave;m hiểu kỹ thanh Ram khắc phục được những nhược điểm n&agrave;y. H&atilde;y thử t&igrave;m hiểu ram laptop Kingston Sodimm 1.2V 16GB 3200MHz CL22 đến từ nh&agrave; sản xuất Kingston Technology.</p>\r\n\r\n<h3><strong>Chuẩn Ram DDR4, dung lượng l&ecirc;n đến 16GB</strong></h3>\r\n\r\n<p>Ram Kingston Sodimm 1.2V 16GB 3200Mhz CL22 l&agrave; thanh Ram chuẩn phổ th&ocirc;ng cho m&aacute;y t&iacute;nh, laptop. Dung lượng Ram l&ecirc;n đến 16GB, qu&aacute; ph&ugrave; hợp với mục đ&iacute;ch tăng bộ nhớ cho m&aacute;y của bạn.</p>\r\n\r\n<p>Sử dụng chuẩn&nbsp;<a href=\"https://cellphones.com.vn/linh-kien/ram/16gb.html\" target=\"_blank\" title=\"Ram 16GB DDR4\"><strong>Ram 16GB DDR4</strong></a>&nbsp;gi&uacute;p m&aacute;y xử l&yacute; đa nhiệm si&ecirc;u nhanh, mượt v&agrave; ổn định. Ngo&agrave;i ra, thanh Ram c&ograve;n dễ được trang bị cho m&aacute;y m&agrave; kh&ocirc;ng cần phải điều chỉnh cấu h&igrave;nh.</p>\r\n\r\n<p><img alt=\"Chuẩn Ram DDR4, dung lượng lên đến 16GB\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/accessories/memory_card/KINGSTON-SODIMM-1-2V-16GB-3200MHz-CL22-1.jpg\" /></p>\r\n\r\n<h3><strong>Bus 3200 Mhz, tiết kiệm năng lượng tối đa</strong></h3>\r\n\r\n<p>Ram Kingston Sodimm 1.2V 16GB 3200Mhz CL22 c&oacute; tốc độ bus cao, gi&uacute;p xử l&yacute; khối lượng dữ liệu lớn v&agrave; nhanh ch&oacute;ng. Tiết kiệm được khối thời gian thay v&igrave; bạn sử dụng những thanh Ram c&oacute; bus nhỏ hơn.</p>\r\n\r\n<p>Thanh&nbsp;<a href=\"https://cellphones.com.vn/linh-kien/ram/kingston.html\" target=\"_blank\" title=\"ram kingston laptop\"><strong>ram Kingston laptop</strong></a>&nbsp;n&agrave;y c&ograve;n d&ugrave;ng hiệu điện thế 1.2 V gi&uacute;p giảm ti&ecirc;u thụ điện năng, &iacute;t sinh nhiệt v&agrave; hạ thấp độ ồn. Tất cả những ưu thế n&agrave;y đều gi&uacute;p tăng độ bền v&agrave; tuổi thọ cho thanh Ram.</p>\r\n\r\n<p><img alt=\"Bus 3200 Mhz, tiết kiệm năng lượng tối đa\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/accessories/memory_card/KINGSTON-SODIMM-1-2V-16GB-3200MHz-CL22-2.jpg\" /></p>\r\n\r\n<h2><strong>Mua ngay Ram laptop Kingston Sodimm 1.2V 16GB 3200MHz CL22 ch&iacute;nh h&atilde;ng tại CellphoneS</strong></h2>\r\n\r\n<p>Ram Kingston Sodimm 1.2V 16GB 3200Mhz CL22 đem lại nhiều điểm lợi khi sử dụng cho người d&ugrave;ng. Để mua Ram về build m&aacute;y, h&atilde;y gọi ngay cho CellphoneS hoặc đến cửa h&agrave;ng gần nhất để rinh ngay một chiếc về.</p>', NULL, 3.000, '20-06-24-10-09-59.webp', '2024-06-20 03:09:59', '2024-07-31 05:22:07'),
(30, 'SSD Samsung 980', 30, 76, 1290000, NULL, NULL, 0.000, '20-06-24-14-49-49.webp', '2024-06-20 07:49:49', '2024-06-20 07:49:49'),
(35, 'Chuột không dây siêu nhẹ Pulsar Xlite V3 (Hỗ trợ 4K Polling Rate)', 24, 48, 1999000, '<p><strong>Giảm 10% dongle 4K</strong>&nbsp;khi mua k&egrave;m chuột Pulsar Xlite V3/X2V2/X2H/X2A hỗ trợ 4K Polling Rate</p>\r\n\r\n<p>Phi&ecirc;n bản mới của chuột Pulsar&nbsp;Xlite cực kỳ th&agrave;nh c&ocirc;ng. Ở&nbsp;Xlite V3 c&oacute; c&aacute;c thay đổi:</p>\r\n\r\n<ul>\r\n	<li><strong>Switch quang học.</strong>&nbsp;Cuộn chuột Pulsar chống bụi.</li>\r\n	<li>Thay đổi cấu tr&uacute;c b&ecirc;n trong, giảm trọng lượng, tăng độ chắc chắn.</li>\r\n	<li>Hỗ trợ report rate 4000Hz nhờ MCU Nordic (<a href=\"https://www.phongcachxanh.vn/products/receiver-4khz-cho-chuot-pulsar-4k-chi-ho-tro-dong-tuong-thich-4khz\">dongle 4000Hz b&aacute;n rời</a>).</li>\r\n	<li>V&agrave; một số thay đổi nhỏ, tăng trải nghiệm sử dụng sản phẩm.</li>\r\n	<li><strong>Designed in Korea</strong></li>\r\n</ul>\r\n\r\n<p><strong>Bảo h&agrave;nh: 24 th&aacute;ng đổi mới</strong></p>', NULL, 0.000, '26-07-24-07-16-08.webp', '2024-07-26 00:16:08', '2024-07-26 00:16:08');

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
  `discount_id` int DEFAULT NULL,
  PRIMARY KEY (`quantity_id`),
  KEY `product_id` (`product_id`),
  KEY `color_id` (`color_id`),
  KEY `discount_id` (`discount_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quantity`
--

INSERT INTO `quantity` (`quantity_id`, `product_id`, `color_id`, `capacity`, `size`, `quantity_product`, `price`, `discount_id`) VALUES
(6, 11, 29, NULL, NULL, 95, 2499000, NULL),
(7, 11, 31, NULL, NULL, 100, 2499000, NULL),
(8, 13, NULL, NULL, '355mm x 255mm x 3mm', 97, 2999000, NULL),
(9, 15, 35, NULL, NULL, 98, 1999000, NULL),
(10, 12, 33, NULL, NULL, 86, 17190000, NULL),
(12, 16, 36, NULL, NULL, 99, 1650000, NULL),
(13, 16, 37, NULL, NULL, 101, 1750000, NULL),
(14, 17, NULL, NULL, NULL, 10, 3300000, NULL),
(16, 25, 38, NULL, NULL, 100, 3740000, NULL),
(17, 25, 39, NULL, NULL, 100, 3740000, NULL),
(18, 25, 41, NULL, NULL, 100, 3740000, NULL),
(19, 1, 15, NULL, NULL, 66, 2000000, 8),
(23, 26, NULL, NULL, NULL, 101, 990000, NULL),
(25, 29, NULL, NULL, NULL, 104, 1150000, NULL),
(28, 30, NULL, '250GB', NULL, 99, 1000000, NULL),
(29, 30, NULL, '500GB', NULL, 100, 1500000, NULL),
(30, 30, NULL, '1TB', NULL, 100, 3000000, NULL),
(48, 25, 43, NULL, NULL, 123, 4000000, NULL),
(49, 35, 52, NULL, 'Large', 100, 1999000, NULL),
(50, 35, 52, NULL, 'Medium', 100, 1999000, NULL),
(51, 35, 52, NULL, 'Mini', 100, 1999000, NULL),
(52, 35, 53, NULL, 'Large', 100, 1999000, NULL),
(53, 35, 53, NULL, 'Medium', 100, 1999000, NULL),
(54, 35, 53, NULL, 'Mini', 100, 1999000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `product_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(24, 20, 1, 2, 'ko hợp mới tôi lắm', '2024-07-25 11:49:22', '2024-07-25 11:49:22'),
(25, 20, 1, 4, 'quá tuyệt nhưng do qua lấy thời tiết xấu nên 4 sao thôi', '2024-07-25 11:49:46', '2024-07-25 11:49:46'),
(26, 20, 1, 5, 'dù mọi người đều biết qua thông tin , báo đài là thuốc lá gây nhiều bất lợi không tốt cho sức khỏe ảnh hơởng trực tiếp tới phổi , gây ra nhiều nguy cơ có thể dẫn tới ung thư , lao phổi và thanh quản . nhưng vì tác hại của nó ..ngấm ngầm , đến từ từ , nên nhiều thanh niêm vẫn cho rằng ..tôi hút mấy chục năm đâu có sao.Thật ra nếu cơ khỏe người hút ăn uống đầy đủ chất , có thời gian làm việc đều độ. tập thể dục thường xuyên , thì cơ thể còn đề kháng .sẽ chống chọi được sự tấn công sớm của bệnh tật do hút thuốc gây ra. tuy nhiên sớm muộn gì cũng để lại hậu quả khó lường . lại tốn không nhỏ 1 số tiền vào việc vô bổ , cả nhựa thuốc cũng làm cho miệng người hút có mùi không hay , răng lại ố đen , rất phản cảm Mà cái quan', '2024-07-25 11:50:37', '2024-07-25 11:50:37'),
(27, 20, 25, 5, 'đẹp nha', '2024-07-25 11:59:44', '2024-07-25 11:59:44'),
(28, 10, 1, 5, 'dep qua 10/10', '2024-07-25 19:33:57', '2024-07-25 19:33:57'),
(29, 10, 1, 5, 'oke nha cung dep', '2024-07-28 06:09:40', '2024-07-28 06:09:40');

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
  `url_img` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`),
  KEY `image_id` (`url_img`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `article_id`, `content1`, `content2`, `url_img`) VALUES
(10, 15, '<h2><span style=\"font-family:Arial,Helvetica,sans-serif\">Giai đoạn 1: chuẩn bị</span></h2>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Trước ti&ecirc;n, cần x&aacute;c định tư tưởng: l&oacute;t chuột k&iacute;nh nhanh lắm, nhanh hơn cả l&oacute;t chuột vải thuộc h&agrave;ng nhanh hiện tại. V&iacute; dụ như Lethal Gaming Neptune Pro, Pulsar ParaSpeed,...</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Bắt đầu sử dụng một l&oacute;t chuột mới cũng như l&agrave;m mới cảm gi&aacute;c của bạn, thay một bộ feet chuột mới lu&ocirc;n l&agrave; điều đầu ti&ecirc;n bạn cần l&agrave;m để l&agrave;m mới cảm gi&aacute;c di chuột v&agrave; break-in l&oacute;t chuột mới gi&uacute;p ch&uacute;ng ổn định hơn. Với l&oacute;t chuột k&iacute;nh, thứ cần break-in l&agrave; ch&iacute;nh bộ feet chuột, do đ&oacute; n&ecirc;n thay bộ feet mới để lướt &ecirc;m v&agrave; &iacute;t ồn nh&eacute;.</span></p>', '<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Tiếp theo l&agrave; arm sleeve. Đ&acirc;y l&agrave; phụ kiện kh&ocirc;ng bắt buộc phải c&oacute; khi sử dụng l&oacute;t chuột k&iacute;nh nhưng với những bạn ra nhiều mồ h&ocirc;i tay, sử dụng th&ecirc;m arm sleeve kh&ocirc;ng phải l&agrave; &yacute; kiến tồi. Sử dụng arm sleeve ngo&agrave;i ngăn mồ h&ocirc;i l&agrave;m r&iacute;t khi tiếp x&uacute;c tay với l&oacute;t chuột m&agrave; c&ograve;n giảm hiện tượng t&iacute;ch nhiệt l&ecirc;n mặt k&iacute;nh. Tất nhi&ecirc;n arm sleeve l&agrave; phụ kiện t&ugrave;y chọn, bạn c&oacute; thể chọn sử dụng hoặc kh&ocirc;ng t&ugrave;y theo sở th&iacute;ch của m&igrave;nh.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><em><strong>Xem c&aacute;c mẫu&nbsp;<a href=\"https://www.phongcachxanh.vn/collections/arm-sleeve-pulsar\" target=\"_blank\">Arm Sleeve</a>&nbsp;hiện c&oacute; tại Phong C&aacute;ch Xanh.</strong></em></span></p>', '28-07-24-16-30-12.webp'),
(11, 15, '<h2>Giai đoạn 2: l&agrave;m quen</h2>\r\n\r\n<p style=\"text-align: justify;\">Để l&agrave;m quen với l&oacute;t chuột k&iacute;nh, bạn cần thực hiện một số b&agrave;i tập aim cơ bản với c&aacute;c phần mềm aim trainer như KovaaK&rsquo;s, Aimlab,... để cơ bắp bạn l&agrave;m quen với l&oacute;t chuột k&iacute;nh. Nếu bạn c&oacute; những b&agrave;i tập aim trong c&aacute;c tựa game như Counter Strike 2, Valorant,... cũng c&oacute; hiệu quả tương đương. Bắt đầu với tốc độ chậm v&agrave; b&igrave;nh tĩnh, bạn cần tập luyện độ ch&iacute;nh x&aacute;c trước để cơ bắp quen với tốc độ rồi h&atilde;y n&acirc;ng tốc độ dần l&ecirc;n.</p>', '<p style=\"text-align: justify;\">Đặc trưng của l&oacute;t chuột k&iacute;nh c&oacute; ma s&aacute;t tĩnh rất thấp n&ecirc;n chuột nhanh ch&oacute;ng tr&ocirc;i khi bạn t&aacute;c dụng lực l&ecirc;n chuột. V&igrave; vậy việc tập luyện sẽ gi&uacute;p chuột tr&ocirc;i c&oacute; kiểm so&aacute;t, thả lỏng tay v&agrave; kh&ocirc;ng qu&aacute; gh&igrave;m chuột gi&uacute;p giảm mệt mỏi khi chơi game trong thời gian d&agrave;i. Ma s&aacute;t động sẽ phụ thuộc v&agrave;o setup feet chuột của bạn, setup c&aacute;c loại feet chuột c&oacute; hiệu quả như thế n&agrave;o mời bạn tham khảo qua b&agrave;i viết&nbsp;<a href=\"https://www.phongcachxanh.vn/blogs/tin-tuc/huong-dan-chon-feet-chuot-phu-hop-cho-lot-chuot-kinh-cuong-luc\" target=\"_blank\"><strong>Hướng dẫn chọn feet chuột cho l&oacute;t chuột k&iacute;nh</strong></a>.</p>\r\n\r\n<p style=\"text-align: justify;\"><em><strong>Xem c&aacute;c mẫu&nbsp;<a href=\"https://www.phongcachxanh.vn/collections/feet-chuot-ptfe-nguyen-chat-corepad\" target=\"_blank\">feet chuột PTFE</a>&nbsp;hiện c&oacute; tại Phong C&aacute;ch Xanh.</strong></em></p>', '28-07-24-17-01-55.webp'),
(12, 15, '<h2>Giai đoạn 3: sử dụng</h2>\r\n\r\n<p style=\"text-align: justify;\">Trong giai đoạn n&agrave;y ch&uacute;ng ta chia ra l&agrave;m c&aacute;c phần gồm bảo quản v&agrave; một số lưu &yacute; khi sử dụng.</p>\r\n\r\n<h3 style=\"text-align: justify;\">Bảo quản l&oacute;t chuột k&iacute;nh</h3>\r\n\r\n<p style=\"text-align: justify;\">L&oacute;t chuột k&iacute;nh dễ bảo quản hơn l&oacute;t chuột vải rất, rất, rất nhiều. C&aacute;i g&igrave; quan trọng phải n&oacute;i 3 lần. Đừng tưởng l&oacute;t chuột k&iacute;nh nặng hơn v&agrave; l&agrave;m bằng k&iacute;nh l&agrave;m bạn tưởng ch&uacute;ng kh&oacute; bảo quản nh&eacute; v&igrave; việc vệ sinh l&oacute;t chuột k&iacute;nh dễ v&agrave; nhanh hơn l&oacute;t chuột vải rất nhiều lần.</p>', '<p style=\"text-align: justify;\">Qu&aacute; tr&igrave;nh bảo quản l&oacute;t chuột k&iacute;nh bạn chỉ cần nhớ 2 điều cơ bản sau:</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">D&ugrave;ng khăn lau sạch bụi v&agrave; mồ h&ocirc;i trước khi bắt đầu buổi chơi game.</li>\r\n	<li style=\"text-align: justify;\">Mỗi tuần d&ugrave;ng nước lau k&iacute;nh lau sạch một lần.</li>\r\n</ul>\r\n\r\n<p style=\"text-align: justify;\">Với 2 điều cơ bản tr&ecirc;n l&oacute;t chuột của bạn lu&ocirc;n sạch sẽ như mới v&agrave; gi&uacute;p trải nghiệm với l&oacute;t chuột k&iacute;nh mỗi lần chơi game đều như mới.</p>\r\n\r\n<h3 style=\"text-align: justify;\">Một số lưu &yacute; khi sử dụng:</h3>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">Kh&ocirc;ng đ&egrave; vật cứng/sắc nhọn l&ecirc;n mặt k&iacute;nh. Điều n&agrave;y c&oacute; thể l&agrave;m mẻ g&oacute;c v&agrave; tạo n&ecirc;n hoa văn &ldquo;vỡ vụn&rdquo; độc quyền cho l&oacute;t chuột của bạn.</li>\r\n	<li style=\"text-align: justify;\">Kh&ocirc;ng n&eacute;m đồ vật l&ecirc;n l&oacute;t chuột k&iacute;nh. Nếu v&ocirc; t&igrave;nh c&oacute; c&aacute;c vật cứng hoặc sắc nhọn cũng như trường hợp tr&ecirc;n, bạn sẽ c&oacute; một l&oacute;t chuột với c&aacute;c hoa văn độc quyền.</li>\r\n</ul>\r\n\r\n<p style=\"text-align: justify;\">L&agrave;m quen v&agrave; sử dụng l&oacute;t chuột k&iacute;nh kh&ocirc;ng kh&oacute;, c&oacute; điều ban đầu cảm gi&aacute;c của bạn l&agrave; kh&ocirc;ng th&acirc;n thuộc với cảm gi&aacute;c n&agrave;y do đ&atilde; quen với c&aacute;ch di chuyển chậm, gi&agrave;u kiểm so&aacute;t đến từ mặt l&oacute;t chuột vải. Với l&oacute;t chuột k&iacute;nh, việc kiểm so&aacute;t chuột ho&agrave;n to&agrave;n đến từ muscle memory n&ecirc;n việc l&agrave;m quen dần gi&uacute;p thả lỏng tay v&agrave; gi&uacute;p bạn dễ d&agrave;ng kiểm so&aacute;t chuột tr&ecirc;n l&oacute;t chuột k&iacute;nh.</p>\r\n\r\n<p style=\"text-align: justify;\"><em><strong>Xem c&aacute;c mẫu&nbsp;<a href=\"https://www.phongcachxanh.vn/collections/lot-chuot-kinh-cuong-luc\" target=\"_blank\">l&oacute;t chuột k&iacute;nh</a>&nbsp;hiện c&oacute; tại Phong C&aacute;ch Xanh.</strong></em></p>', '28-07-24-17-03-05.webp'),
(13, 16, '<h2>Lưu &yacute; khi sử dụng l&oacute;t chuột k&iacute;nh</h2>\r\n\r\n<p><strong>Kh&ocirc;ng sử dụng feet k&iacute;nh cường lực hoặc c&aacute;c vật liệu cứng.</strong></p>', '<p>Feet k&iacute;nh c&oacute; độ cứng tương tự l&oacute;t chuột k&iacute;nh n&ecirc;n khi cọ x&aacute;t ch&uacute;ng sẽ l&agrave;m m&ograve;n v&agrave; xước tạo n&ecirc;n c&aacute;c hư tổn vĩnh viễn tr&ecirc;n cả hai bề mặt. Nếu feet chuột bạn c&oacute; thể thay thế với chi ph&iacute; thấp hơn th&igrave; tấm l&oacute;t chuột k&iacute;nh của bạn sau khi hư hại sẽ kh&ocirc;ng sử dụng tốt như ban đầu. Với những hư hại, việc trải nghiệm tấm l&oacute;t chuột k&iacute;nh của bạn bị giảm đi rất nhiều. Feet chuột sapphire cũng tương tự như feet chuột k&iacute;nh, tuy kh&ocirc;ng phổ biến bằng nhưng nh&agrave; Xanh cũng khuyến c&aacute;o kh&ocirc;ng n&ecirc;n sử dụng feet sapphire tr&ecirc;n l&oacute;t chuột k&iacute;nh do ch&uacute;ng c&ograve;n cứng hơn cả k&iacute;nh cường lực nữa.</p>', '28-07-24-18-07-50.webp'),
(14, 16, NULL, '<p>Với trường hợp c&aacute;c vật liệu cứng hơn bằng kim loại như th&eacute;p, đồng,... c&aacute;c vật liệu n&agrave;y hiện tại kh&ocirc;ng c&ograve;n phổ biến để l&agrave;m l&oacute;t chuột nhưng ch&uacute;ng kh&ocirc;ng khuyến kh&iacute;ch sử dụng tr&ecirc;n l&oacute;t chuột k&iacute;nh. Bạn c&ograve;n nhớ ở b&agrave;i viết&nbsp;<strong>hướng dẫn bảo quản l&oacute;t chuột k&iacute;nh</strong>nh&agrave; Xanh c&oacute; nhắc đến v&iacute; dụ b&uacute;a ph&aacute; k&iacute;nh kh&ocirc;ng? Ngo&agrave;i việc kim loại cứng sẽ l&agrave;m xước l&oacute;t chuột k&iacute;nh, phần kim loại n&agrave;y thường được bo tr&ograve;n nhẹ để giảm ma s&aacute;t v&ocirc; t&igrave;nh tạo n&ecirc;n h&igrave;nh d&aacute;ng gần giống mũi b&uacute;a ph&aacute; k&iacute;nh. V&igrave; thế khi sử dụng feet chuột kim loại sẽ c&oacute; x&aacute;c suất bạn v&ocirc; t&igrave;nh l&agrave;m vỡ k&iacute;nh bởi cơ chế khi nhấc chuột l&ecirc;n xuống cộng với h&igrave;nh dạng của feet kim loại v&ocirc; t&igrave;nh giống với c&aacute;c b&uacute;a ph&aacute; k&iacute;nh hoạt động.</p>\r\n\r\n<p><strong>N&ecirc;n với l&oacute;t chuột k&iacute;nh cường lực, bạn n&ecirc;n sử dụng feet chuột PTFE</strong>để đảm bảo trải nghiệm tốt nhất.</p>', '28-07-24-18-08-19.webp'),
(15, 16, '<h2>Những yếu tố của feet chuột ảnh hưởng đến trải nghiệm lướt chuột</h2>\r\n\r\n<p>C&aacute;ch bố tr&iacute; của feet stock tr&ecirc;n hầu hết c&aacute;c mẫu chuột tr&ecirc;n thị trường đều tối ưu cho sử dụng tr&ecirc;n l&oacute;t chuột vải nhưng tr&ecirc;n l&oacute;t chuột k&iacute;nh, bạn c&oacute; thể tinh chỉnh một ch&uacute;t với feet chuột nhằm tạo n&ecirc;n trải nghiệm sử dụng tốt nhất.</p>\r\n\r\n<h3>Diện t&iacute;ch feet chuột</h3>\r\n\r\n<p>Diện t&iacute;ch feet chuột c&agrave;ng lớn, ma s&aacute;t giữa chuột v&agrave; l&oacute;t chuột c&agrave;ng nhiều dẫn đến tốc độ di chuột chậm hơn. Trong b&agrave;i viết n&agrave;y để hiểu r&otilde; hơn nh&agrave; Xanh sẽ v&iacute; dụ với loại dot skates để bạn hiểu r&otilde; hơn v&igrave; loại feet b&agrave;i bạn c&oacute; thể custom tốc độ di chuột t&ugrave;y theo số lượng feet bạn d&aacute;n l&ecirc;n.</p>\r\n\r\n<ul>\r\n	<li>Số lượng feet chấm được d&aacute;n c&agrave;ng nhiều tức l&agrave; diện t&iacute;ch feet c&agrave;ng lớn, feet chuột c&agrave;ng ma s&aacute;t với l&oacute;t chuột nhiều v&agrave; tạo n&ecirc;n sự kiểm so&aacute;t tốt hơn do cải thiện cảm gi&aacute;c tiếp x&uacute;c với mặt l&oacute;t chuột, b&ugrave; lại bạn phải hi sinh về tốc độ.</li>\r\n	<li>Số lượng feet chấm c&agrave;ng &iacute;t, tốc độ lướt chuột c&agrave;ng nhanh v&agrave; c&agrave;ng bay. B&ugrave; lại việc kiểm so&aacute;t sẽ kh&oacute; khăn hơn do c&oacute; &iacute;t ma s&aacute;t v&agrave; bạn cần l&agrave;m quen dần.</li>\r\n</ul>\r\n\r\n<p>Để trải nghiệm r&otilde; nhất sự th&uacute; vị của l&oacute;t chuột k&iacute;nh, nh&agrave; Xanh khuyến kh&iacute;ch bạn n&ecirc;n sử dụng feet chuột nhỏ nhằm cho tốc độ lướt chuột nhanh nhất. Nếu bạn vừa chuyển từ l&oacute;t chuột vải qua v&agrave; chưa quen, lộ tr&igrave;nh l&agrave;m quen l&agrave; giảm dần số lượng dot skates tr&ecirc;n được d&aacute;n. Nhờ đ&oacute; bạn sẽ th&iacute;ch ứng dần v&agrave; kh&ocirc;ng c&ograve;n bị sốc bởi tốc độ của l&oacute;t chuột k&iacute;nh.</p>\r\n\r\n<h3>Độ cứng của feet chuột</h3>\r\n\r\n<p>Với một số nh&agrave; sản xuất feet chuột cho l&oacute;t chuột vải, feet cứng sẽ ảnh hưởng đến độ mượt khi di chuột n&ecirc;n họ thường l&agrave;m với độ mềm vừa phải nhằm đảm bảo đặc t&iacute;nh tự b&ocirc;i trơn của vật liệu PTFE. Tr&ecirc;n l&oacute;t chuột k&iacute;nh, độ cứng của feet sẽ ảnh hưởng phần n&agrave;o về độ gh&igrave; khi di chuyển chuột.</p>\r\n\r\n<p>Nếu vật liệu l&agrave;m feet qu&aacute; mềm, feet chuột rất nhanh bị ch&aacute;y v&agrave; tạo th&agrave;nh những v&ugrave; chai phẳng tr&ecirc;n bề mặt khiến tốc độ di chuyển chuột kh&ocirc;ng đồng nhất khi lướt qua c&aacute;c khu vực c&oacute; hơi ẩm, mồ h&ocirc;i hoặc bị bẩn. V&igrave; vậy ngược với l&oacute;t chuột vải, nhựa d&ugrave;ng l&agrave;m feet chuột để chơi tr&ecirc;n l&oacute;t k&iacute;nh n&ecirc;n hơi cứng một ch&uacute;t để tăng tuổi thọ, tăng sự ổn định v&agrave; sự kiểm so&aacute;t.</p>\r\n\r\n<h2>Một v&agrave;i trải nghiệm của nh&agrave; Xanh tr&ecirc;n một số loại feet chuột tr&ecirc;n l&oacute;t chuột k&iacute;nh</h2>\r\n\r\n<h3>Dot skates</h3>', '<p>Với dot skates đa số feet đều được bo tr&ograve;n từ mảnh feet n&ecirc;n diện t&iacute;ch tiếp x&uacute;c được tốt ưu tối đa.</p>\r\n\r\n<ul>\r\n	<li>Setup ti&ecirc;u chuẩn 4-6 miếng feet cho ra tốc độ di chuột nhanh nhất với độ ổn định cao.</li>\r\n	<li>Nếu cần th&ecirc;m sự ổn định, bạn c&oacute; thể gấp đ&ocirc;i số lượng feet l&ecirc;n từ 8-12 feet để tối ưu diện t&iacute;ch tiếp x&uacute;c giữa feet v&agrave; mặt l&oacute;t chuột.</li>\r\n</ul>\r\n\r\n<p><strong>Lưu &yacute; với dot skates:</strong></p>\r\n\r\n<ul>\r\n	<li>Với chuột đối xứng, bạn n&ecirc;n d&aacute;n đối xứng đều hai b&ecirc;n.</li>\r\n	<li>Với chuột c&ocirc;ng th&aacute;i học, c&oacute; thể ưu ti&ecirc;n d&aacute;n lệnh về b&ecirc;n h&ocirc;ng phải một ch&uacute;t do tay c&oacute; xu hướng t&igrave; về b&ecirc;n phải nhiều hơn.</li>\r\n</ul>\r\n\r\n<p>Kết luận: dot skates l&agrave; giải ph&aacute;p &iacute;t thẩm mỹ nhưng t&iacute;nh custom cao nhất, ph&ugrave; hợp khi cần thay đổi l&oacute;t chuột thường xuy&ecirc;n hoặc th&iacute;ch custom t&ugrave;y theo sở th&iacute;ch c&aacute; nh&acirc;n.</p>', '28-07-24-18-08-57.webp'),
(16, 16, '<h3>Corepad AIR</h3>', '<p>Thiết kế của Corepad AIR giống với concept của dot skates khi c&oacute; rất nhiều chấm nhỏ gi&uacute;p giảm diện t&iacute;ch tiếp x&uacute;c của feet với mặt l&oacute;t chuột. Ngo&agrave;i ra chất liệu PTFE của Corepad AIR cũng được xử l&yacute; cứng hơn để ph&ugrave; hợp sử dụng tr&ecirc;n l&oacute;t chuột k&iacute;nh.</p>\r\n\r\n<p>Trải nghiệm của Corepad AIR tr&ecirc;n l&oacute;t chuột k&iacute;nh rất giống với dot skates d&aacute;n khoảng 12 chấm nhưng thẩm mỹ hơn do to&agrave;n bộ khu vực d&aacute;n feet được che phủ bởi feet chuột. Feet Corepad AIR c&oacute; tốc độ chậm dần qua thời gian bởi độ m&ograve;n của c&aacute;c chấm tr&ecirc;n mặt feet chuột. Khi m&ograve;n hết, Corepad AIR sẽ cho tốc độ tương tự Corepad CTRL nhưng thời gian để m&ograve;n hết c&aacute;c chấm rất l&acirc;u.</p>\r\n\r\n<p><strong>Kết luận:</strong>&nbsp;Corepad AIR d&agrave;nh cho những bạn th&iacute;ch tốc độ di chuột nhanh nhưng muốn đ&aacute;y chuột phải thẩm mỹ hơn phương &aacute;n dot skates.</p>', '28-07-24-18-09-22.webp'),
(17, 16, '<h3>Corepad CTRL</h3>', '<p>Đ&acirc;y l&agrave; phi&ecirc;n bản mặt phẳng của Corepad AIR với chất liệu PTFE cũng được xử l&yacute; nhiệt gi&uacute;p tăng độ cứng của feet. Bản Corepad CTRL phần xử l&yacute; nhiệt cũng gi&uacute;p bề mặt l&aacute;ng hơn, tăng tối đa diện t&iacute;ch tiếp x&uacute;c của feet chuột nhằm tạo sự kiểm so&aacute;t cao.</p>\r\n\r\n<p>Trải nghiệm của nh&agrave; Xanh với Corepad CTRL tr&ecirc;n l&oacute;t chuột k&iacute;nh l&agrave; rất th&acirc;n thiện, dễ l&agrave;m quen v&agrave; đặc biệt khuy&ecirc;n d&ugrave;ng với những bạn mới sử dụng l&oacute;t chuột k&iacute;nh lần đầu. V&igrave; được thiết kế dạng nguy&ecirc;n tấm tương tự feet chuột stock n&ecirc;n độ thẩm mỹ vẫn cao như feet stock, n&ecirc;n đ&acirc;y l&agrave; phương &aacute;n vừa d&agrave;nh cho những bạn th&iacute;ch thẩm mỹ, vừa muốn feet chuột dễ chơi khi l&agrave;m quen với l&oacute;t chuột k&iacute;nh.</p>\r\n\r\n<p>Corepad CTRL d&ugrave;ng tr&ecirc;n l&oacute;t chuột vải cũng rất tốt nữa, n&oacute; tạo độ l&igrave; tương đối cao với c&aacute;c l&oacute;t chuột vải tốc độ trung b&igrave;nh v&agrave; l&igrave; theo cấp số nh&acirc;n với c&aacute;c l&oacute;t chuột slow, muddy.</p>\r\n\r\n<p><strong>Kết luận:</strong>&nbsp;Corepad CTRL d&agrave;nh cho những bạn muốn bộ feet dễ sử dụng nhất tr&ecirc;n l&oacute;t chuột k&iacute;nh.</p>', '28-07-24-18-09-48.webp'),
(18, 16, '<h3>Corepad PRO</h3>\r\n\r\n<p>Đ&acirc;y l&agrave; giải ph&aacute;p t&igrave;nh thế nếu bạn kh&ocirc;ng t&igrave;m được feet k&iacute;ch cỡ tương tự stock d&ograve;ng CTRL hoặc AIR. Corepad PRO ban đầu được thiết kế d&agrave;nh cho l&oacute;t chuột vải n&ecirc;n feet c&oacute; độ mềm vừa phải để kh&ocirc;ng bị vướng qu&aacute; nhiều tr&ecirc;n bề mặt l&oacute;t chuột mềm. Tuy nhi&ecirc;n tr&ecirc;n l&oacute;t chuột k&iacute;nh, feet Corepad PRO cần một thời gian để m&ograve;n dần v&agrave; h&igrave;nh th&agrave;nh c&aacute;c vết chai để feet chuột cứng, phẳng hơn. Với hầu hết trường hợp, Corepad PRO cho cảm gi&aacute;c sử dụng trung t&iacute;nh v&agrave; ổn định. L&uacute;c chưa break-in cho vết chai h&igrave;nh th&agrave;nh cảm gi&aacute;c di chuyển sẽ hơi sạn do feet PTFE li&ecirc;n tục bị b&agrave;o m&ograve;n l&agrave;m phẳng mặt feet. Kết th&uacute;c qu&aacute; tr&igrave;nh break-in tầm v&agrave;i ng&agrave;y, feet sẽ di chuyển ổn định, &ecirc;m hơn nhưng tốc độ sẽ nhanh hơn một ch&uacute;t so với Corepad CTRL.</p>', '<p>Dot skates của Corepad cũng thuộc d&ograve;ng PRO nhưng với mỗi feet được l&agrave;m dạng chấm tr&ograve;n v&agrave; bo tr&ograve;n 360 độ n&ecirc;n bạn kh&ocirc;ng phải lo lắng về thời gian break-in cũng như độ ồn khi di chuyển chuột.</p>\r\n\r\n<p><strong>Kết luận:</strong>&nbsp;trong hầu hết trường hợp Corepad PRO vẫn sử dụng được nhưng cần thời gian break-in v&agrave;i ng&agrave;y.</p>', '28-07-24-18-10-13.webp'),
(19, 16, '<h2>Chọn feet chuột cho l&oacute;t chuột k&iacute;nh rất dễ. Đ&acirc;y l&agrave; phi&ecirc;n bản si&ecirc;u t&oacute;m tắt:</h2>\r\n\r\n<ul>\r\n	<li>N&ecirc;n chọn feet được thiết kế ri&ecirc;ng cho l&oacute;t k&iacute;nh để kh&ocirc;ng phải chờ thời gian break-in. Nếu kh&ocirc;ng t&igrave;m được cũng kh&ocirc;ng sao.</li>\r\n	<li>Kh&ocirc;ng ngại phần thẩm mỹ n&ecirc;n chọn dot skate, ch&uacute;ng dễ custom tốc độ di chuột theo sở th&iacute;ch v&agrave; tiết kiệm hơn.</li>\r\n	<li>Feet c&agrave;ng lớn, diện t&iacute;ch tiếp x&uacute;c c&agrave;ng nhiều, tốc độ di chuột c&agrave;ng chậm v&agrave; c&agrave;ng dễ kiểm so&aacute;t.</li>\r\n</ul>\r\n\r\n<p><em><strong>Xem to&agrave;n bộ feet&nbsp;<a href=\"https://www.phongcachxanh.vn/collections/feet-chuot-ptfe-nguyen-chat-corepad\" target=\"_blank\">chuột PTFE Corepad</a>&nbsp;đang c&oacute; ở Phong C&aacute;ch Xanh.</strong></em></p>', NULL, NULL),
(23, 17, '<h2><strong>Một:</strong>&nbsp;lau sạch mỗi ng&agrave;y sử dụng</h2>', '<p>Vệ sinh l&oacute;t chuột vảo kh&oacute; khăn v&agrave; tốn nhiều thời gian n&ecirc;n mọi người thường bỏ qua việc vệ sinh để l&oacute;t chuột lu&ocirc;n ở trạng th&aacute;i tốt nhất trước khi sử dụng. Tr&ecirc;n l&oacute;t chuột k&iacute;nh bạn kh&ocirc;ng cần lo lắng về điều đ&oacute; v&igrave; loại l&oacute;t chuột n&agrave;y cực kỳ dễ vệ sinh, vậy tại sao kh&ocirc;ng vệ sinh trước khi d&ugrave;ng để cho trải nghiệm tốt nhất.</p>\r\n\r\n<p>Để lau sạch l&oacute;t chuột k&iacute;nh bạn chỉ cần một thứ duy nhất: khăn microfiber/khăn da cừu loại d&ugrave;ng lau mắt k&iacute;nh hoặc m&aacute;y ảnh nếu kĩ t&iacute;nh. Vệ sinh l&oacute;t chuột k&iacute;nh bạn chỉ cần l&agrave;m như sau:</p>\r\n\r\n<ul>\r\n	<li>D&ugrave;ng khăn lau dọc l&oacute;t chuột từ tr&ecirc;n xuống dưới đến khi hết chiều ngang l&oacute;t chuột.</li>\r\n	<li>Lặp lại theo hướng từ tr&aacute;i sang phải đến khi hết chiều dọc l&oacute;t chuột.</li>\r\n</ul>\r\n\r\n<p>Với trường hợp ra mồ h&ocirc;i tay nhiều hoặc v&agrave;i tuần chưa lau, bạn c&oacute; thể sử dụng nước lau k&iacute;nh hoặc nước vệ sinh mắt k&iacute;nh để lau mặt l&oacute;t chuột k&iacute;nh.</p>', '28-07-24-18-22-24.jpg'),
(24, 17, '<h2><strong>Hai:</strong>&nbsp;sử dụng đ&uacute;ng loại feet chuột</h2>', '<p>Feet chuột tốt nhất với l&oacute;t chuột k&iacute;nh n&ecirc;n l&agrave;m từ vật liệu mềm hơn k&iacute;nh, cụ thể l&agrave; nhựa PTFE.</p>\r\n\r\n<p>Với đặc t&iacute;nh tự b&ocirc;i trơn v&agrave; độ cứng thấp để chịu m&agrave;i m&ograve;n thay cho mặt k&iacute;nh, feet chuột PTFE l&agrave; lựa chọn h&agrave;ng đầu khi bạn sử dụng l&oacute;t chuột k&iacute;nh. Bạn c&oacute; thể tối ưu tốc độ lướt chuột tr&ecirc;n mặt k&iacute;nh bằng c&aacute;ch tinh chỉnh feet chuột của m&igrave;nh gồm diện t&iacute;ch tiếp x&uacute;c v&agrave; độ cứng của feet. Chi tiết nh&agrave; Xanh sẽ đề cập trong một b&agrave;i viết chi tiết hơn.</p>\r\n\r\n<p><strong>Lưu &yacute;:</strong>kh&ocirc;ng sử dụng feet k&iacute;nh với l&oacute;t chuột k&iacute;nh.</p>\r\n\r\n<p>Độ cứng của feet chuột k&iacute;nh sẽ cứng hơn hoặc tương đồng về độ cứng với loại k&iacute;nh của l&oacute;t chuột, do đ&oacute; feet k&iacute;nh sẽ c&agrave;o xước mặt l&oacute;t chuột, ảnh hưởng đến độ bền cũng như cho trải nghiệm kh&ocirc;ng tốt. Đặc trưng khi sử dụng feet k&iacute;nh tr&ecirc;n l&oacute;t chuột k&iacute;nh l&agrave; độ ma s&aacute;t rất lớn cũng như &acirc;m thanh sởn gai ốc mỗi khi bạn di chuột, &acirc;m thanh đ&oacute; tương tự khi bạn d&ugrave;ng m&oacute;ng tay c&agrave;o l&ecirc;n bảng phấn. N&oacute;i chung, trải nghiệm sử dụng feet k&iacute;nh tr&ecirc;n l&oacute;t chuột k&iacute;nh kh&ocirc;ng tốt cho t&uacute;i tiền của&nbsp;bạn lẫn độ bền của l&oacute;t chuột.</p>', '28-07-24-18-42-30.webp'),
(25, 17, '<h2><strong>Ba:</strong>&nbsp;kh&ocirc;ng&nbsp;quăng c&aacute;c vật cứng/sắc nhọn l&ecirc;n mặt k&iacute;nh</h2>', '<p>Bạn c&oacute; biết chiếc b&uacute;a ph&aacute; cửa k&iacute;nh khẩn cấp thường trang bị tr&ecirc;n c&aacute;c xe &ocirc; t&ocirc; kh&ocirc;ng? Đ&oacute; l&agrave; chiếc b&uacute;a chuy&ecirc;n dụng được thiết kế đặc biệt nhằm ph&aacute; cửa k&iacute;nh nhanh nhất với lực &iacute;t nhất, nhờ đ&oacute; việc cứu hộ cứu nạn được thực hiện một c&aacute;ch dễ d&agrave;ng v&agrave; nhanh ch&oacute;ng. Vậy&nbsp;n&eacute;m&nbsp;vật cứng, nhọn l&ecirc;n l&oacute;t chuột c&oacute; tương tự kh&ocirc;ng? C&acirc;u trả lời l&agrave; c&oacute;.</p>\r\n\r\n<p>H&atilde;y nh&igrave;n kĩ cấu tạo của b&uacute;a ph&aacute; k&iacute;nh bao gồm một đầu th&eacute;p được v&oacute;t nhọn tại mũi tiếp x&uacute;c với k&iacute;nh, vật nhọn khi&nbsp;n&eacute;m l&ecirc;n k&iacute;nh cũng vậy. Thường những vật nhọn n&agrave;y c&oacute; thể l&agrave; tai nghe IEM, g&oacute;c cạnh của b&agrave;n ph&iacute;m vỏ nh&ocirc;m hoặc ch&acirc;n m&agrave;n h&igrave;nh v&agrave; ch&uacute;ng c&oacute; thể ảnh hưởng đến độ bền của l&oacute;t chuột k&iacute;nh.</p>\r\n\r\n<p>Để bảo vệ l&oacute;t chuột k&iacute;nh tốt nhất, bạn n&ecirc;n để c&aacute;c vật sắc nhọn xa khỏi phần m&eacute;p của l&oacute;t chuột k&iacute;nh, trường hợp n&agrave;y thường l&agrave; ch&acirc;n m&agrave;n h&igrave;nh l&agrave;m bằng kim loại v&agrave; c&oacute; dạng x&ograve;e ra chiếm nhiều kh&ocirc;ng gian setup. Nếu bạn đang sử dụng một tay đỡ thay cho ch&acirc;n m&agrave;n h&igrave;nh th&igrave; kh&ocirc;ng cần quan t&acirc;m đến vấn đề n&agrave;y.</p>', '28-07-24-18-42-56.webp'),
(26, 17, NULL, '<p>Hiện tại k&iacute;nh cường lực đ&atilde; bền hơn rất nhiều với chất liệu ch&iacute;nh thường l&agrave; Aluminosilicate c&oacute; độ cứng khoảng 5.5/10 tr&ecirc;n thang độ cứng Mohs v&agrave; cứng hơn k&iacute;nh thường. Nhờ đ&oacute; bạn c&oacute; thể y&ecirc;n t&acirc;m hơn trong qu&aacute; tr&igrave;nh sử dụng nếu kh&ocirc;ng may xảy ra sự cố ngo&agrave;i &yacute; muốn, b&ugrave; lại bạn c&oacute; một chiếc l&oacute;t chuột bền hơn, đẹp hơn so với c&aacute;c lựa chọn l&oacute;t chuột bằng vải.</p>\r\n\r\n<p>Việc bảo quản l&oacute;t chuột k&iacute;nh cường lực kh&ocirc;ng kh&oacute;, n&oacute;i thẳng thắn l&agrave; dễ hơn rất nhiều so với l&oacute;t chuột vải. Chỉ với một v&agrave;i lưu &yacute; ở tr&ecirc;n, một chiếc l&oacute;t chuột k&iacute;nh c&oacute; thể tồn tại v&agrave; đồng h&agrave;nh b&ecirc;n bạn trong suốt nhiều năm chơi game v&agrave; sử dụng m&aacute;y t&iacute;nh m&agrave; kh&ocirc;ng cần thay thế, nhờ đ&oacute; bạn tiết kiệm tiền thay thế l&oacute;t chuột nhiều hơn so với việc sử dụng l&oacute;t chuột bằng vải.</p>\r\n\r\n<p><em><strong>Xem th&ecirc;m tất cả&nbsp;<a href=\"https://www.phongcachxanh.vn/collections/lot-chuot-kinh-cuong-luc\" target=\"_blank\">c&aacute;c mẫu l&oacute;t chuột k&iacute;nh cường lực</a>&nbsp;đang c&oacute; tại Phong C&aacute;ch</strong>&nbsp;<strong>Xanh.</strong></em></p>', '28-07-24-18-43-12.webp');

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
('nmdUUVVneWtyPOk8O00eSIeo3MnaHqsDSN4BRb1F', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZXBSY3Jjc0NNTzhsOHFlN1BZOGlLdXpQcUZBeldzREtlZ1ZnMU9rNSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMDtzOjc6ImNsaWVudHMiO2E6MDp7fX0=', 1722445816),
('Apmv3hsFBPpecWnpog8KCjP1aueBmMFYAL4FaAr4', 15, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiR2FkTnk2TENibTNyZFpKYzE2R0Q5VEttVkpTNXdOTUJUWjlpZFM3eiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvb3JkZXJpdGVtLzEzNSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE1O30=', 1722446227);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

DROP TABLE IF EXISTS `shipping`;
CREATE TABLE IF NOT EXISTS `shipping` (
  `shipping_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `shipping_method_id` int DEFAULT NULL,
  `address_start` varchar(225) DEFAULT NULL,
  `address_end` varchar(225) DEFAULT NULL,
  `km` decimal(10,1) DEFAULT NULL,
  `kg` decimal(10,3) DEFAULT NULL,
  `shipping_price` decimal(10,0) DEFAULT NULL,
  `total_price` decimal(10,0) DEFAULT NULL,
  `shipping_date` datetime DEFAULT NULL,
  `shipped_date` datetime DEFAULT NULL,
  `status` enum('pending','delivering','delivered','cancelled','refunded','failed') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`shipping_id`),
  KEY `order_id` (`order_id`),
  KEY `shipping_method_id` (`shipping_method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `order_id`, `shipping_method_id`, `address_start`, `address_end`, `km`, `kg`, `shipping_price`, `total_price`, `shipping_date`, `shipped_date`, `status`) VALUES
(16, 134, 1, '89 Hồ Văn Huê, P.9, Q.Phú Nhuận, Hồ Chí Minh', '314/151 Au Duong Lan p3 q8', 10.0, 5.054, 25000, 19015000, NULL, NULL, 'pending'),
(17, 136, 1, '89 Hồ Văn Huê, P.9, Q.Phú Nhuận, Hồ Chí Minh', '314/151 Au Duong Lan p3 q8', 13.3, 5.054, 45000, 19035000, NULL, NULL, 'pending');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `transaction_id`, `amount`, `currency`, `status`, `created_at`, `updated_at`) VALUES
(25, NULL, 136, 'ch_3Pig2SRsG8g38Rd21UozPQ16', 1000, 'usd', 'succeeded', '2024-07-31 10:10:16', '2024-07-31 10:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `usercoupon`
--

DROP TABLE IF EXISTS `usercoupon`;
CREATE TABLE IF NOT EXISTS `usercoupon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `coupon_id` int DEFAULT NULL,
  `used` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `coupon_id` (`coupon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(22, 'user14', 'user14@gmail.com', NULL, '$2y$12$.O68HGS0TzCB9/nRT2TDaOQ70IptftSJ2IuAb97..t3z7Q6edGqIy', NULL, NULL, NULL, '2024-07-15 09:44:26', '2024-07-16 08:30:14'),
(30, 'quanlytn', 'quanlytn@gmail.com', NULL, '$2y$12$BqYMHn78nZdxpciSQxoH1uwxoXNR2BSbFolw.GF.Ze0pI9N8L8bvC', NULL, NULL, NULL, '2024-07-25 20:35:04', '2024-07-25 20:35:04');

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
-- Constraints for table `comment_images`
--
ALTER TABLE `comment_images`
  ADD CONSTRAINT `comment_images_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `review` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
  ADD CONSTRAINT `quantity_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `quantity_ibfk_3` FOREIGN KEY (`discount_id`) REFERENCES `discount` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `shipping_ibfk_2` FOREIGN KEY (`shipping_method_id`) REFERENCES `shipping_methods` (`shipping_methods_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
