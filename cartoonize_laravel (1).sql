-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 05, 2018 at 01:07 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cartoonize_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Individual', NULL, NULL),
(2, 'Couple', NULL, NULL),
(3, 'Family', NULL, NULL),
(4, 'Group', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
CREATE TABLE IF NOT EXISTS `data_rows` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(2, 1, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, '', 2),
(3, 1, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, '', 3),
(4, 1, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '', 4),
(5, 1, 'excerpt', 'text_area', 'excerpt', 1, 0, 1, 1, 1, 1, '', 5),
(6, 1, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, '', 6),
(7, 1, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(8, 1, 'slug', 'text', 'slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true}}', 8),
(9, 1, 'meta_description', 'text_area', 'meta_description', 1, 0, 1, 1, 1, 1, '', 9),
(10, 1, 'meta_keywords', 'text_area', 'meta_keywords', 1, 0, 1, 1, 1, 1, '', 10),
(11, 1, 'status', 'select_dropdown', 'status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(12, 1, 'created_at', 'timestamp', 'created_at', 0, 1, 1, 0, 0, 0, '', 12),
(13, 1, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 13),
(14, 2, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(15, 2, 'author_id', 'text', 'author_id', 1, 0, 0, 0, 0, 0, '', 2),
(16, 2, 'title', 'text', 'title', 1, 1, 1, 1, 1, 1, '', 3),
(17, 2, 'excerpt', 'text_area', 'excerpt', 1, 0, 1, 1, 1, 1, '', 4),
(18, 2, 'body', 'rich_text_box', 'body', 1, 0, 1, 1, 1, 1, '', 5),
(19, 2, 'slug', 'text', 'slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"}}', 6),
(20, 2, 'meta_description', 'text', 'meta_description', 1, 0, 1, 1, 1, 1, '', 7),
(21, 2, 'meta_keywords', 'text', 'meta_keywords', 1, 0, 1, 1, 1, 1, '', 8),
(22, 2, 'status', 'select_dropdown', 'status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(23, 2, 'created_at', 'timestamp', 'created_at', 1, 1, 1, 0, 0, 0, '', 10),
(24, 2, 'updated_at', 'timestamp', 'updated_at', 1, 0, 0, 0, 0, 0, '', 11),
(25, 2, 'image', 'image', 'image', 0, 1, 1, 1, 1, 1, '', 12),
(26, 3, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(27, 3, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 2),
(28, 3, 'email', 'text', 'email', 1, 1, 1, 1, 1, 1, '', 3),
(29, 3, 'password', 'password', 'password', 0, 0, 0, 1, 1, 0, '', 4),
(30, 3, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"roles\",\"pivot\":\"0\"}', 10),
(31, 3, 'remember_token', 'text', 'remember_token', 0, 0, 0, 0, 0, 0, '', 5),
(32, 3, 'created_at', 'timestamp', 'created_at', 0, 1, 1, 0, 0, 0, '', 6),
(33, 3, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 7),
(34, 3, 'avatar', 'image', 'avatar', 0, 1, 1, 1, 1, 1, '', 8),
(35, 5, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(36, 5, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 2),
(37, 5, 'created_at', 'timestamp', 'created_at', 0, 0, 0, 0, 0, 0, '', 3),
(38, 5, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 4),
(39, 4, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(40, 4, 'parent_id', 'select_dropdown', 'parent_id', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(41, 4, 'order', 'text', 'order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(42, 4, 'name', 'text', 'name', 1, 1, 1, 1, 1, 1, '', 4),
(43, 4, 'slug', 'text', 'slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(44, 4, 'created_at', 'timestamp', 'created_at', 0, 0, 1, 0, 0, 0, '', 6),
(45, 4, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 7),
(46, 6, 'id', 'number', 'id', 1, 0, 0, 0, 0, 0, '', 1),
(47, 6, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 2),
(48, 6, 'created_at', 'timestamp', 'created_at', 0, 0, 0, 0, 0, 0, '', 3),
(49, 6, 'updated_at', 'timestamp', 'updated_at', 0, 0, 0, 0, 0, 0, '', 4),
(50, 6, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, '', 5),
(51, 1, 'seo_title', 'text', 'seo_title', 0, 1, 1, 1, 1, 1, '', 14),
(52, 1, 'featured', 'checkbox', 'featured', 1, 1, 1, 1, 1, 1, '', 15),
(53, 3, 'role_id', 'text', 'role_id', 1, 1, 1, 1, 1, 1, '', 9);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
CREATE TABLE IF NOT EXISTS `data_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `created_at`, `updated_at`) VALUES
(1, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, '2018-05-17 05:56:54', '2018-05-17 05:56:54'),
(2, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, '2018-05-17 05:56:54', '2018-05-17 05:56:54'),
(3, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', '', '', 1, 0, '2018-05-17 05:56:54', '2018-05-17 05:56:54'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, '2018-05-17 05:56:54', '2018-05-17 05:56:54'),
(5, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, '2018-05-17 05:56:55', '2018-05-17 05:56:55'),
(6, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, '2018-05-17 05:56:55', '2018-05-17 05:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_types`
--

DROP TABLE IF EXISTS `delivery_types`;
CREATE TABLE IF NOT EXISTS `delivery_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `designs`
--

DROP TABLE IF EXISTS `designs`;
CREATE TABLE IF NOT EXISTS `designs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `min_faces` int(11) NOT NULL,
  `tag` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `best_selling` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `designs`
--

INSERT INTO `designs` (`id`, `name`, `description`, `min_faces`, `tag`, `image_path`, `category_id`, `sub_category_id`, `new`, `best_selling`, `created_at`, `updated_at`) VALUES
(1, 'design1', 'qweqweqwe', 1, 'tag', '/storage/designs/design1.jpg', 1, 1, 0, 0, NULL, NULL),
(3, 'design2', 'qweqweqwe', 2, 'tag', '/storage/designs/design2.jpg', 1, 1, 0, 0, NULL, NULL),
(4, 'design3', 'qweqweqwe', 3, 'tag', '/storage/designs/design3.jpg', 1, 1, 0, 1, NULL, NULL),
(5, 'design4', 'qweqweqwe', 3, 'tag', '/storage/designs/design4.jpg', 1, 2, 0, 0, NULL, NULL),
(6, 'design5', 'qweqweqwe', 1, 'tag', '/storage/designs/design5.jpg', 1, 2, 1, 1, NULL, NULL),
(7, 'design6', 'qweqweqwe', 1, 'tag', '/storage/designs/design6.jpg', 1, 2, 0, 0, NULL, NULL),
(8, 'design7', 'qweqweqwe', 2, 'tag', '/storage/designs/design7.jpg', 1, 2, 1, 1, NULL, NULL),
(9, 'design8', 'qweqweqwe', 2, 'tag', '/storage/designs/design8.jpg', 1, 3, 1, 1, NULL, NULL),
(10, 'design9', 'qweqweqwe', 1, 'tag', '/storage/designs/design8.jpg', 1, 3, 0, 0, NULL, NULL),
(11, 'design10', 'qweqweqwe', 1, 'tag', '/storage/designs/design1.jpg', 1, 3, 1, 0, NULL, NULL),
(12, 'design11', 'qweqweqwe', 3, 'tag', '/storage/designs/design2.jpg', 2, 3, 0, 0, NULL, NULL),
(13, 'design12', 'qweqweqwe', 2, 'tag', '/storage/designs/design3.jpg', 2, 4, 0, 0, NULL, NULL),
(14, 'design13', 'qweqweqwe', 2, 'tag', '/storage/designs/design4.jpg', 2, 4, 1, 0, NULL, NULL),
(15, 'design14', 'qweqweqwe', 3, 'tag', '/storage/designs/design5.jpg\r\n', 2, 4, 0, 1, NULL, NULL),
(16, 'design15', 'qweqweqwe', 3, 'tag', '/storage/designs/design6.jpg\r\n', 2, 4, 0, 0, NULL, NULL),
(17, 'design16', 'qweqweqwe', 1, 'tag', '/storage/designs/design7.jpg\r\n', 2, 5, 0, 0, NULL, NULL),
(26, 'design18', 'qweqweqwe', 2, 'tag', '/storage/designs/design8.jpg\r\n', 0, 0, 0, 0, NULL, NULL),
(27, 'design19', 'qweqweqwe', 2, 'tag', '/storage/designs/design5.jpg', 0, 0, 0, 0, NULL, NULL),
(28, 'design20', 'qweqweqwe', 2, 'tag', '/storage/designs/design1.jpg', 0, 0, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `design_face_prices`
--

DROP TABLE IF EXISTS `design_face_prices`;
CREATE TABLE IF NOT EXISTS `design_face_prices` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `price` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `design_face_prices`
--

INSERT INTO `design_face_prices` (`id`, `price`, `active`, `created_at`, `updated_at`) VALUES
(1, 50, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-05-17 05:56:59', '2018-05-17 05:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2018-05-17 05:56:59', '2018-05-17 05:56:59', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2018-05-17 05:56:59', '2018-05-17 05:56:59', 'voyager.media.index', NULL),
(3, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 6, '2018-05-17 05:56:59', '2018-05-17 05:56:59', 'voyager.posts.index', NULL),
(4, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2018-05-17 05:57:00', '2018-05-17 05:57:00', 'voyager.users.index', NULL),
(5, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 8, '2018-05-17 05:57:00', '2018-05-17 05:57:00', 'voyager.categories.index', NULL),
(6, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 7, '2018-05-17 05:57:00', '2018-05-17 05:57:00', 'voyager.pages.index', NULL),
(7, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2018-05-17 05:57:00', '2018-05-17 05:57:00', 'voyager.roles.index', NULL),
(8, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2018-05-17 05:57:00', '2018-05-17 05:57:00', NULL, NULL),
(9, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 8, 10, '2018-05-17 05:57:00', '2018-05-17 05:57:00', 'voyager.menus.index', NULL),
(10, 1, 'Database', '', '_self', 'voyager-data', NULL, 8, 11, '2018-05-17 05:57:00', '2018-05-17 05:57:00', 'voyager.database.index', NULL),
(11, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 8, 12, '2018-05-17 05:57:00', '2018-05-17 05:57:00', 'voyager.compass.index', NULL),
(12, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2018-05-17 05:57:00', '2018-05-17 05:57:00', 'voyager.settings.index', NULL),
(13, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 8, 13, '2018-05-17 05:57:10', '2018-05-17 05:57:10', 'voyager.hooks', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_01_01_000000_create_pages_table', 1),
(6, '2016_01_01_000000_create_posts_table', 1),
(7, '2016_02_15_204651_create_categories_table', 1),
(8, '2016_05_19_173453_create_menu_table', 1),
(9, '2016_10_21_190000_create_roles_table', 1),
(10, '2016_10_21_190000_create_settings_table', 1),
(11, '2016_11_30_135954_create_permission_table', 1),
(12, '2016_11_30_141208_create_permission_role_table', 1),
(13, '2016_12_26_201236_data_types__add__server_side', 1),
(14, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(15, '2017_01_14_005015_create_translations_table', 1),
(16, '2017_01_15_000000_add_permission_group_id_to_permissions_table', 1),
(17, '2017_01_15_000000_create_permission_groups_table', 1),
(18, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(19, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(20, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(21, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(22, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(23, '2017_08_05_000000_add_group_to_settings_table', 1),
(24, '2018_05_20_111248_create_designs_table', 2),
(25, '2018_05_20_111346_create_products_table', 2),
(26, '2018_05_20_111402_create_orders_table', 2),
(27, '2018_05_20_111434_create_order_items_table', 2),
(28, '2018_05_20_111458_create_urgents_table', 3),
(29, '2018_05_20_111535_create_delivery_types_table', 3),
(30, '2018_05_20_111611_create_stores_table', 3),
(31, '2018_05_20_123928_create_order_user_images_table', 3),
(32, '2018_05_20_123951_create_order_delivery_areas_table', 3),
(33, '2018_05_23_072908_create_order_progresses_table', 3),
(34, '2018_05_28_094716_create_design_faces_table', 4),
(35, '2018_05_31_083303_create_categories_table', 5),
(36, '2018_05_31_083341_create_sub_categories_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `delivery_type_id` int(11) NOT NULL,
  `delivery_address` text COLLATE utf8mb4_unicode_ci,
  `delivery_area_id` int(11) DEFAULT NULL,
  `store_id` text COLLATE utf8mb4_unicode_ci,
  `urgent_id` int(11) NOT NULL,
  `order_progress_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `delivery_type_id`, `delivery_address`, `delivery_area_id`, `store_id`, `urgent_id`, `order_progress_id`, `active`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'qweqweqweqwesdkfsdk', 1, '1', 1, 1, 1, NULL, NULL),
(3, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(4, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(5, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(6, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(7, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(8, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(9, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(10, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(11, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(12, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(13, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(14, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(15, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(16, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(17, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(18, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(19, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(20, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(21, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(22, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(23, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(24, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(25, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(26, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(27, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(28, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(29, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(30, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(31, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(32, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(33, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(34, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(35, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(36, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(37, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(38, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(39, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(40, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(41, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(42, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(43, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(44, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(45, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(46, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(47, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(48, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(49, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(50, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(51, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(52, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(53, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(54, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(55, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(56, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(57, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(58, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(59, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(60, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(61, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(62, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(63, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(64, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(65, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(66, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(67, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(68, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(69, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(70, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(71, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(72, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(73, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(74, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(75, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(76, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(77, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(78, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(79, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(80, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(81, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(82, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(83, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(84, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(85, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(86, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(87, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(88, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(89, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(90, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(91, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(92, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(93, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(94, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(95, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(96, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(97, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(98, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(99, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(100, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(101, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(102, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(103, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(104, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(105, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(106, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(107, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(108, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(109, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(110, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(111, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(112, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL),
(113, 1, 1, 'qqqqqqqqqqqqqqqqk', 1, NULL, 1, 1, 1, NULL, NULL),
(114, 1, 2, NULL, NULL, '1', 1, 1, 1, NULL, NULL),
(115, 1, 1, 'wwwwwwwwwwwwwwwwww', 1, NULL, 2, 2, 1, NULL, NULL),
(116, 3, 1, 'eeeeeeeeeeeeeeeeee', 1, NULL, 3, 4, 1, NULL, NULL),
(117, 1, 1, 'rrrrrrrrrrrrrrrrr', 1, '1', 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_delivery_areas`
--

DROP TABLE IF EXISTS `order_delivery_areas`;
CREATE TABLE IF NOT EXISTS `order_delivery_areas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `design_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `order_progresses`
--

DROP TABLE IF EXISTS `order_progresses`;
CREATE TABLE IF NOT EXISTS `order_progresses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `order_user_images`
--

DROP TABLE IF EXISTS `order_user_images`;
CREATE TABLE IF NOT EXISTS `order_user_images` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2018-05-17 05:57:08', '2018-05-17 05:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_group_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`, `permission_group_id`) VALUES
(1, 'browse_admin', NULL, '2018-05-17 05:57:00', '2018-05-17 05:57:00', NULL),
(2, 'browse_database', NULL, '2018-05-17 05:57:00', '2018-05-17 05:57:00', NULL),
(3, 'browse_media', NULL, '2018-05-17 05:57:00', '2018-05-17 05:57:00', NULL),
(4, 'browse_compass', NULL, '2018-05-17 05:57:01', '2018-05-17 05:57:01', NULL),
(5, 'browse_menus', 'menus', '2018-05-17 05:57:01', '2018-05-17 05:57:01', NULL),
(6, 'read_menus', 'menus', '2018-05-17 05:57:01', '2018-05-17 05:57:01', NULL),
(7, 'edit_menus', 'menus', '2018-05-17 05:57:01', '2018-05-17 05:57:01', NULL),
(8, 'add_menus', 'menus', '2018-05-17 05:57:01', '2018-05-17 05:57:01', NULL),
(9, 'delete_menus', 'menus', '2018-05-17 05:57:01', '2018-05-17 05:57:01', NULL),
(10, 'browse_pages', 'pages', '2018-05-17 05:57:01', '2018-05-17 05:57:01', NULL),
(11, 'read_pages', 'pages', '2018-05-17 05:57:01', '2018-05-17 05:57:01', NULL),
(12, 'edit_pages', 'pages', '2018-05-17 05:57:02', '2018-05-17 05:57:02', NULL),
(13, 'add_pages', 'pages', '2018-05-17 05:57:02', '2018-05-17 05:57:02', NULL),
(14, 'delete_pages', 'pages', '2018-05-17 05:57:02', '2018-05-17 05:57:02', NULL),
(15, 'browse_roles', 'roles', '2018-05-17 05:57:02', '2018-05-17 05:57:02', NULL),
(16, 'read_roles', 'roles', '2018-05-17 05:57:02', '2018-05-17 05:57:02', NULL),
(17, 'edit_roles', 'roles', '2018-05-17 05:57:02', '2018-05-17 05:57:02', NULL),
(18, 'add_roles', 'roles', '2018-05-17 05:57:02', '2018-05-17 05:57:02', NULL),
(19, 'delete_roles', 'roles', '2018-05-17 05:57:02', '2018-05-17 05:57:02', NULL),
(20, 'browse_users', 'users', '2018-05-17 05:57:02', '2018-05-17 05:57:02', NULL),
(21, 'read_users', 'users', '2018-05-17 05:57:02', '2018-05-17 05:57:02', NULL),
(22, 'edit_users', 'users', '2018-05-17 05:57:02', '2018-05-17 05:57:02', NULL),
(23, 'add_users', 'users', '2018-05-17 05:57:02', '2018-05-17 05:57:02', NULL),
(24, 'delete_users', 'users', '2018-05-17 05:57:02', '2018-05-17 05:57:02', NULL),
(25, 'browse_posts', 'posts', '2018-05-17 05:57:02', '2018-05-17 05:57:02', NULL),
(26, 'read_posts', 'posts', '2018-05-17 05:57:02', '2018-05-17 05:57:02', NULL),
(27, 'edit_posts', 'posts', '2018-05-17 05:57:02', '2018-05-17 05:57:02', NULL),
(28, 'add_posts', 'posts', '2018-05-17 05:57:02', '2018-05-17 05:57:02', NULL),
(29, 'delete_posts', 'posts', '2018-05-17 05:57:03', '2018-05-17 05:57:03', NULL),
(30, 'browse_categories', 'categories', '2018-05-17 05:57:03', '2018-05-17 05:57:03', NULL),
(31, 'read_categories', 'categories', '2018-05-17 05:57:03', '2018-05-17 05:57:03', NULL),
(32, 'edit_categories', 'categories', '2018-05-17 05:57:03', '2018-05-17 05:57:03', NULL),
(33, 'add_categories', 'categories', '2018-05-17 05:57:03', '2018-05-17 05:57:03', NULL),
(34, 'delete_categories', 'categories', '2018-05-17 05:57:03', '2018-05-17 05:57:03', NULL),
(35, 'browse_settings', 'settings', '2018-05-17 05:57:03', '2018-05-17 05:57:03', NULL),
(36, 'read_settings', 'settings', '2018-05-17 05:57:03', '2018-05-17 05:57:03', NULL),
(37, 'edit_settings', 'settings', '2018-05-17 05:57:03', '2018-05-17 05:57:03', NULL),
(38, 'add_settings', 'settings', '2018-05-17 05:57:03', '2018-05-17 05:57:03', NULL),
(39, 'delete_settings', 'settings', '2018-05-17 05:57:03', '2018-05-17 05:57:03', NULL),
(40, 'browse_hooks', NULL, '2018-05-17 05:57:11', '2018-05-17 05:57:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

DROP TABLE IF EXISTS `permission_groups`;
CREATE TABLE IF NOT EXISTS `permission_groups` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permission_groups_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2018-05-17 05:57:07', '2018-05-17 05:57:07'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2018-05-17 05:57:08', '2018-05-17 05:57:08'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2018-05-17 05:57:08', '2018-05-17 05:57:08'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2018-05-17 05:57:08', '2018-05-17 05:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dimensions` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `dimensions`, `price`, `created_at`, `updated_at`) VALUES
(1, 'A4 Maqautte', 'ttttttttttttttt', '30x40', 400, NULL, NULL),
(2, 'A3 Maqautte', 'qqqqqqqqqq', '40x40', 600, NULL, NULL),
(3, 'A2 Maqautte', 'ttttttttttttttt', '30x40', 800, NULL, NULL),
(4, 'A0 Maqautte', 'ttttttttttttttt', '30x40', 1000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2018-05-17 05:57:00', '2018-05-17 05:57:00'),
(2, 'user', 'Normal User', '2018-05-17 05:57:00', '2018-05-17 05:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Citystars', 'ttttttttttttttt', NULL, NULL),
(2, 'Rehab Mall 2', 'ttttttttttttttt', NULL, NULL),
(3, 'Citystars', 'ttttttttttttttt', NULL, NULL),
(4, 'Rehab Mall 2', 'ttttttttttttttt', NULL, NULL),
(5, 'Citystars', 'ttttttttttttttt', NULL, NULL),
(6, 'Rehab Mall 2', 'ttttttttttttttt', NULL, NULL),
(7, 'Citystars', 'ttttttttttttttt', NULL, NULL),
(8, 'Rehab Mall 2', 'ttttttttttttttt', NULL, NULL),
(9, 'Citystars', 'ttttttttttttttt', NULL, NULL),
(10, 'Rehab Mall 2', 'ttttttttttttttt', NULL, NULL),
(11, 'Citystars', 'ttttttttttttttt', NULL, NULL),
(12, 'Rehab Mall 2', 'ttttttttttttttt', NULL, NULL),
(13, 'Citystars', 'ttttttttttttttt', NULL, NULL),
(14, 'Rehab Mall 2', 'ttttttttttttttt', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Baseball', 1, NULL, NULL),
(2, 'Basketball', 1, NULL, NULL),
(3, 'Birthday', 1, NULL, NULL),
(4, 'Boss', 1, NULL, NULL),
(5, 'Christmas & New Year', 1, NULL, NULL),
(6, 'Coach', 1, NULL, NULL),
(7, 'Football', 1, NULL, NULL),
(8, 'For Her', 1, NULL, NULL),
(9, 'For Him', 1, NULL, NULL),
(10, 'Anniversary', 2, NULL, NULL),
(11, 'Colleagues', 2, NULL, NULL),
(12, 'Family Relatives', 2, NULL, NULL),
(13, 'Friends', 2, NULL, NULL),
(14, 'Movie Characters', 2, NULL, NULL),
(15, 'Romantic & Love', 2, NULL, NULL),
(16, 'Friends', 2, NULL, NULL),
(17, 'Family 1', 3, NULL, NULL),
(18, 'Family 2', 3, NULL, NULL),
(19, 'Family 3', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
CREATE TABLE IF NOT EXISTS `translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 1, 'pt', 'Post', '2018-05-17 05:57:08', '2018-05-17 05:57:08'),
(2, 'data_types', 'display_name_singular', 2, 'pt', 'Página', '2018-05-17 05:57:08', '2018-05-17 05:57:08'),
(3, 'data_types', 'display_name_singular', 3, 'pt', 'Utilizador', '2018-05-17 05:57:08', '2018-05-17 05:57:08'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2018-05-17 05:57:09', '2018-05-17 05:57:09'),
(5, 'data_types', 'display_name_singular', 5, 'pt', 'Menu', '2018-05-17 05:57:09', '2018-05-17 05:57:09'),
(6, 'data_types', 'display_name_singular', 6, 'pt', 'Função', '2018-05-17 05:57:09', '2018-05-17 05:57:09'),
(7, 'data_types', 'display_name_plural', 1, 'pt', 'Posts', '2018-05-17 05:57:09', '2018-05-17 05:57:09'),
(8, 'data_types', 'display_name_plural', 2, 'pt', 'Páginas', '2018-05-17 05:57:09', '2018-05-17 05:57:09'),
(9, 'data_types', 'display_name_plural', 3, 'pt', 'Utilizadores', '2018-05-17 05:57:09', '2018-05-17 05:57:09'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2018-05-17 05:57:09', '2018-05-17 05:57:09'),
(11, 'data_types', 'display_name_plural', 5, 'pt', 'Menus', '2018-05-17 05:57:09', '2018-05-17 05:57:09'),
(12, 'data_types', 'display_name_plural', 6, 'pt', 'Funções', '2018-05-17 05:57:09', '2018-05-17 05:57:09'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2018-05-17 05:57:09', '2018-05-17 05:57:09'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2018-05-17 05:57:09', '2018-05-17 05:57:09'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2018-05-17 05:57:10', '2018-05-17 05:57:10'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2018-05-17 05:57:10', '2018-05-17 05:57:10'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2018-05-17 05:57:10', '2018-05-17 05:57:10'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2018-05-17 05:57:10', '2018-05-17 05:57:10'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2018-05-17 05:57:10', '2018-05-17 05:57:10'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2018-05-17 05:57:10', '2018-05-17 05:57:10'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2018-05-17 05:57:10', '2018-05-17 05:57:10'),
(22, 'menu_items', 'title', 3, 'pt', 'Publicações', '2018-05-17 05:57:10', '2018-05-17 05:57:10'),
(23, 'menu_items', 'title', 4, 'pt', 'Utilizadores', '2018-05-17 05:57:10', '2018-05-17 05:57:10'),
(24, 'menu_items', 'title', 5, 'pt', 'Categorias', '2018-05-17 05:57:10', '2018-05-17 05:57:10'),
(25, 'menu_items', 'title', 6, 'pt', 'Páginas', '2018-05-17 05:57:10', '2018-05-17 05:57:10'),
(26, 'menu_items', 'title', 7, 'pt', 'Funções', '2018-05-17 05:57:10', '2018-05-17 05:57:10'),
(27, 'menu_items', 'title', 8, 'pt', 'Ferramentas', '2018-05-17 05:57:10', '2018-05-17 05:57:10'),
(28, 'menu_items', 'title', 9, 'pt', 'Menus', '2018-05-17 05:57:10', '2018-05-17 05:57:10'),
(29, 'menu_items', 'title', 10, 'pt', 'Base de dados', '2018-05-17 05:57:10', '2018-05-17 05:57:10'),
(30, 'menu_items', 'title', 12, 'pt', 'Configurações', '2018-05-17 05:57:10', '2018-05-17 05:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `urgents`
--

DROP TABLE IF EXISTS `urgents`;
CREATE TABLE IF NOT EXISTS `urgents` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `urgents`
--

INSERT INTO `urgents` (`id`, `name`, `description`, `days`, `price`, `active`, `created_at`, `updated_at`) VALUES
(1, '4-5 Days', 'This will take up to 5 bussness days', 5, 0, 1, NULL, NULL),
(2, '2-3 Days', 'This will take up to 5 bussness days', 3, 50, 1, NULL, NULL),
(3, '1-2 Days', 'This will take up to 5 bussness days', 2, 100, 1, NULL, NULL),
(4, '4-5 Days', 'This will take up to 5 bussness days', 5, 0, 1, NULL, NULL),
(5, '2-3 Days', 'This will take up to 5 bussness days', 3, 50, 1, NULL, NULL),
(6, '1-2 Days', 'This will take up to 5 bussness days', 2, 100, 1, NULL, NULL),
(7, '4-5 Days', 'This will take up to 5 bussness days', 5, 0, 1, NULL, NULL),
(8, '2-3 Days', 'This will take up to 5 bussness days', 3, 50, 1, NULL, NULL),
(9, '1-2 Days', 'This will take up to 5 bussness days', 2, 100, 1, NULL, NULL),
(10, '4-5 Days', 'This will take up to 5 bussness days', 5, 0, 1, NULL, NULL),
(11, '2-3 Days', 'This will take up to 5 bussness days', 3, 50, 1, NULL, NULL),
(12, '1-2 Days', 'This will take up to 5 bussness days', 2, 100, 1, NULL, NULL),
(13, '4-5 Days', 'This will take up to 5 bussness days', 5, 0, 1, NULL, NULL),
(14, '2-3 Days', 'This will take up to 5 bussness days', 3, 50, 1, NULL, NULL),
(15, '1-2 Days', 'This will take up to 5 bussness days', 2, 100, 1, NULL, NULL),
(16, '4-5 Days', 'This will take up to 5 bussness days', 5, 0, 1, NULL, NULL),
(17, '2-3 Days', 'This will take up to 5 bussness days', 3, 50, 1, NULL, NULL),
(18, '1-2 Days', 'This will take up to 5 bussness days', 2, 100, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', '$2y$10$vFi08EX4rkDxNbTC/URlKumoNuHdT39fudAHcRYECh6saJ2rjzHGq', 'PvRC0DqtFaX5jhkJw6Lu2incHhZKNcxYyeihjXBEpIfZh8LJG2wLYxveSttl', '2018-05-17 05:57:07', '2018-05-17 05:57:07');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
