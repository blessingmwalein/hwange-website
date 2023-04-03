-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 07:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `facebook` text NOT NULL,
  `linkedin` text NOT NULL,
  `whatsapp` text NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `name`, `mission`, `vision`, `facebook`, `linkedin`, `whatsapp`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Electronic Resource Center', 'Electronic Resource Center Mission', 'Electronic Resource Center Vision', 'https://www.facebook.com/blessing.mwale.359', 'https://www.linkedin.com/in/blessing-mwale-961a741a8/', 'https://wa.me/263772440088', '14 Arundel Road Harare', NULL, '2023-03-15 10:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `attachmentable`
--

CREATE TABLE `attachmentable` (
  `id` int(10) UNSIGNED NOT NULL,
  `attachmentable_type` varchar(255) NOT NULL,
  `attachmentable_id` int(10) UNSIGNED NOT NULL,
  `attachment_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `original_name` text NOT NULL,
  `mime` varchar(255) NOT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `size` bigint(20) NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  `path` text NOT NULL,
  `description` text DEFAULT NULL,
  `alt` text DEFAULT NULL,
  `hash` text DEFAULT NULL,
  `disk` varchar(255) NOT NULL DEFAULT 'public',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `name`, `original_name`, `mime`, `extension`, `size`, `sort`, `path`, `description`, `alt`, `hash`, `disk`, `user_id`, `group`, `created_at`, `updated_at`) VALUES
(1, '5a28288f5b8ef50390e6b7a7a917149afbf9acc2', 'iPhone-Symbol.png', 'image/png', 'png', 11318, 0, '2023/03/13/', NULL, NULL, '8f8ace86b71c228678272496514759f86ca77558', 'local', 1, NULL, '2023-03-13 14:24:21', '2023-03-13 14:24:21'),
(2, '1ed204920913f45b804f357ded73686ad758ecfb', '882747.png', 'image/png', 'png', 18386, 0, '2023/03/13/', NULL, NULL, 'ebba25bf3ac42a14b1a97df11a20bb6a78edf28e', 'local', 1, NULL, '2023-03-13 14:24:25', '2023-03-13 14:24:25'),
(3, '5a28288f5b8ef50390e6b7a7a917149afbf9acc2', 'iPhone-Symbol.png', 'image/png', 'png', 11318, 0, '2023/03/13/', NULL, NULL, '8f8ace86b71c228678272496514759f86ca77558', 'local', 1, NULL, '2023-03-13 14:26:04', '2023-03-13 14:26:04'),
(4, '1ed204920913f45b804f357ded73686ad758ecfb', '882747.png', 'image/png', 'png', 18386, 0, '2023/03/13/', NULL, NULL, 'ebba25bf3ac42a14b1a97df11a20bb6a78edf28e', 'local', 1, NULL, '2023-03-13 14:26:09', '2023-03-13 14:26:09'),
(5, '5a28288f5b8ef50390e6b7a7a917149afbf9acc2', 'iPhone-Symbol.png', 'image/png', 'png', 11318, 0, '2023/03/13/', NULL, NULL, '8f8ace86b71c228678272496514759f86ca77558', 'local', 1, NULL, '2023-03-13 14:27:56', '2023-03-13 14:27:56'),
(6, '1ed204920913f45b804f357ded73686ad758ecfb', '882747.png', 'image/png', 'png', 18386, 0, '2023/03/13/', NULL, NULL, 'ebba25bf3ac42a14b1a97df11a20bb6a78edf28e', 'local', 1, NULL, '2023-03-13 14:28:00', '2023-03-13 14:28:00'),
(7, '5a28288f5b8ef50390e6b7a7a917149afbf9acc2', 'iPhone-Symbol.png', 'image/png', 'png', 11318, 0, '2023/03/13/', NULL, NULL, '8f8ace86b71c228678272496514759f86ca77558', 'local', 1, NULL, '2023-03-13 14:30:25', '2023-03-13 14:30:25'),
(8, '1ed204920913f45b804f357ded73686ad758ecfb', '882747.png', 'image/png', 'png', 18386, 0, '2023/03/13/', NULL, NULL, 'ebba25bf3ac42a14b1a97df11a20bb6a78edf28e', 'local', 1, NULL, '2023-03-13 14:30:29', '2023-03-13 14:30:29'),
(9, '92ac70bb65cf08a2c1d24820227f5c373b505a90', 'Screenshot (2).png', 'image/png', 'png', 259026, 0, '2023/03/13/', NULL, NULL, 'd470186ca73bcc6fab15252f45352bcfe9cf85cc', 'local', 1, NULL, '2023-03-13 16:04:26', '2023-03-13 16:04:26'),
(10, 'a058c73308ad8ae21aa0f04698d01b7f9e35c31f', 'Screenshot (7).png', 'image/png', 'png', 552756, 0, '2023/03/13/', NULL, NULL, 'a92f4f323ed8d6d1fd67422aebf9ac9840382169', 'local', 1, NULL, '2023-03-13 16:04:30', '2023-03-13 16:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'brands/WlCUBVHid3B8iM1KN7a8azbsi1VcLu4BtbHedYcF.png', '2023-03-13 14:42:13', '2023-03-13 14:42:13'),
(2, 'Iphone', 'brands/kaqyr4tN9oitTkwfxwN8NkIn7bAcmZXFqckGrYHC.png', '2023-03-13 14:42:24', '2023-03-13 14:42:24'),
(3, 'Dell', 'brands/QI1U4jWqpK0aJvosKbWMxtKUI4fXtwc4MZx8mWM4.png', '2023-03-15 09:23:06', '2023-03-15 09:23:06');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-03-15 11:33:32', '2023-03-15 11:33:32'),
(2, 2, '2023-03-15 15:38:30', '2023-03-15 15:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `quantity`, `color`, `created_at`, `updated_at`) VALUES
(25, 2, 2, 1, 'none', '2023-03-16 08:29:59', '2023-03-16 08:29:59'),
(26, 1, 11, 1, 'none', '2023-03-16 08:33:08', '2023-03-16 08:33:08'),
(27, 1, 9, 1, 'none', '2023-03-16 08:33:11', '2023-03-16 08:33:11'),
(28, 1, 8, 6, 'White', '2023-03-16 08:33:45', '2023-03-16 08:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(2, 'Ink catridges', 'categories/cddgNIzHVHJJRCO06yU988sfN2MLUaU2YMDkRyCC.png', '2023-03-14 23:53:03', '2023-03-14 23:53:03'),
(3, 'Printers', 'categories/EW0q9aVki1yi3qlES3IukQ6NNDZsAQIu3opuAaIf.webp', '2023-03-14 23:56:21', '2023-03-14 23:56:21'),
(4, 'Laptops', 'categories/gtvmH5kpLfUQHgcVnl4Jo9esAadKKhBmOnTDyfGZ.webp', '2023-03-14 23:57:11', '2023-03-14 23:57:11'),
(5, 'Computers', 'categories/O5Fxnr6zZBcEfiL0FE4VX9SXnXAwSv0b5kaEuDVQ.webp', '2023-03-14 23:57:31', '2023-03-14 23:57:31'),
(6, 'Computers Accessories', 'categories/q3qs2X9ZUYdYCxfUYnMHDTNWVXX8MMB77L6cTzbq.jpg', '2023-03-14 23:57:58', '2023-03-14 23:57:58'),
(7, 'Paper', 'categories/BhBuBUePJO1wCA8qwrnmC9Q59637NNFDjlyTFiUs.png', '2023-03-14 23:58:15', '2023-03-14 23:58:15'),
(8, 'Toner Cart', 'categories/EuHERpfm9TmfZdUH8OpX3RGYbQJmDV8yonfb5eAB.jpg', '2023-03-14 23:58:33', '2023-03-14 23:58:33'),
(9, 'Mobile Phones', 'categories/nqMZLHLzYvNxY6AT8NvPmkS63HRFsx1QcY6zlSEO.png', '2023-03-14 23:58:49', '2023-03-14 23:58:49'),
(10, 'Cables', 'categories/QGT5HwCubg08MP92UdflYmtidM7wHrTfj1zWP3Km.png', '2023-03-14 23:59:03', '2023-03-14 23:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Red', '2023-03-13 13:10:39', '2023-03-13 13:10:39'),
(2, 'Blue', '2023-03-13 13:10:47', '2023-03-13 13:10:47'),
(3, 'White', '2023-03-13 13:10:56', '2023-03-13 13:10:56');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Sales', 'sales@electronic.co.zw', '0772440099', '2023-03-15 10:27:29', '2023-03-15 10:32:19'),
(3, 'Customer Care', 'customer@electronic.co.zw', '0717929351', '2023-03-15 10:34:03', '2023-03-15 10:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_messages`
--

CREATE TABLE `contact_us_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'US Dollar', 'USD', '$', '2023-03-13 13:11:21', '2023-03-13 13:11:21'),
(2, 'ZWL Dollar', 'RTGS', '$', '2023-03-13 13:11:44', '2023-03-13 13:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `user_id`, `phone_number`, `company`, `address`, `city`, `lat`, `lon`, `created_at`, `updated_at`) VALUES
(1, 1, '+263772440088', 'Axis Solutions Africa', '7 wingate road rhodesvilled harare', 'Harare', NULL, NULL, '2023-03-15 13:41:53', '2023-03-16 04:50:31'),
(2, 2, '0772440088', 'Axis', '987 ROSE LN', 'Harare', NULL, NULL, '2023-03-15 15:39:14', '2023-03-15 15:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(5, '2015_04_12_000000_create_orchid_users_table', 1),
(6, '2015_10_19_214424_create_orchid_roles_table', 1),
(7, '2015_10_19_214425_create_orchid_role_users_table', 1),
(8, '2016_08_07_125128_create_orchid_attachmentstable_table', 1),
(9, '2017_09_17_125801_create_notifications_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2023_02_17_083051_create_sessions_table', 1),
(13, '2023_03_09_120406_create_customer_details_table', 1),
(14, '2023_03_09_120949_create_brands_table', 1),
(15, '2023_03_09_121349_create_categories_table', 1),
(16, '2023_03_09_121850_create_products_table', 1),
(17, '2023_03_09_122643_create_product_images_table', 1),
(18, '2023_03_09_122837_create_specifications_table', 1),
(19, '2023_03_09_122953_create_colors_table', 1),
(20, '2023_03_09_123042_create_product_specifications_table', 1),
(21, '2023_03_09_123116_create_product_colors_table', 1),
(22, '2023_03_09_123404_create_currencies_table', 1),
(23, '2023_03_09_123420_create_product_prices_table', 1),
(24, '2023_03_09_124704_create_contacts_table', 1),
(25, '2023_03_09_124914_create_contact_us_messages_table', 1),
(26, '2023_03_09_125139_create_carts_table', 1),
(27, '2023_03_09_125152_create_cart_items_table', 1),
(28, '2023_03_09_125810_create_orders_table', 1),
(29, '2023_03_09_130144_create_order_items_table', 1),
(30, '2023_03_09_130412_create_payment_methods_table', 1),
(31, '2023_03_14_015753_add_total_to_orders_table', 2),
(32, '2023_03_15_112959_create_abouts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_notes` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `total` decimal(8,2) NOT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_notes`, `status`, `total`, `currency_id`, `created_at`, `updated_at`, `payment_method_id`) VALUES
(2, 1, 'Pending iphone', 'pending', '400.00', 1, '2023-03-14 00:40:01', '2023-03-14 01:05:51', 1),
(3, 1, 'Pay on delivery', 'pending', '1156.00', 1, '2023-03-15 13:41:53', '2023-03-15 13:41:53', 1),
(4, 1, NULL, 'pending', '468.00', 1, '2023-03-15 13:52:20', '2023-03-15 13:52:20', 1),
(5, 2, NULL, 'pending', '14.00', 1, '2023-03-15 15:40:33', '2023-03-15 15:40:33', 1),
(6, 1, NULL, 'pending', '4792.00', 1, '2023-03-16 03:46:49', '2023-03-16 03:46:49', 1),
(7, 1, NULL, 'paid', '1600.00', 1, '2023-03-16 04:50:31', '2023-03-16 18:44:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `color`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 1, 'Red', '2023-03-14 00:40:01', '2023-03-14 00:40:01'),
(3, 3, 7, 2, 'Blue', '2023-03-15 13:41:53', '2023-03-15 13:41:53'),
(4, 3, 9, 2, 'none', '2023-03-15 13:41:53', '2023-03-15 13:41:53'),
(5, 3, 6, 3, 'none', '2023-03-15 13:41:53', '2023-03-15 13:41:53'),
(6, 3, 5, 1, 'none', '2023-03-15 13:41:53', '2023-03-15 13:41:53'),
(7, 4, 7, 4, 'none', '2023-03-15 13:52:20', '2023-03-15 13:52:20'),
(8, 4, 8, 3, 'none', '2023-03-15 13:52:20', '2023-03-15 13:52:20'),
(9, 4, 1, 1, 'none', '2023-03-15 13:52:20', '2023-03-15 13:52:20'),
(10, 4, 6, 1, 'none', '2023-03-15 13:52:20', '2023-03-15 13:52:20'),
(11, 5, 1, 1, 'none', '2023-03-15 15:40:33', '2023-03-15 15:40:33'),
(12, 5, 8, 1, 'none', '2023-03-15 15:40:33', '2023-03-15 15:40:33'),
(13, 6, 3, 4, 'Blue', '2023-03-16 03:46:49', '2023-03-16 03:46:49'),
(14, 7, 5, 2, 'White', '2023-03-16 04:50:31', '2023-03-16 04:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `icon`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Cash', 'payments/ACn9GvmHsfuSgP0Avx68r1LUMnTUNl9KTux9URc2.png', NULL, '2023-03-15 13:22:14', '2023-03-15 13:22:14'),
(2, 'Ecocash', 'payments/znNbI40U1jX4cyICV3R7kGrO8IP5FcgEUxMi4SfD.png', NULL, '2023-03-15 13:22:26', '2023-03-15 13:22:26'),
(3, 'Zipit', 'payments/WyMxBb17ULtyv0GnPcIHQHVYDIhIijjyMElZ4fZv.png', NULL, '2023-03-15 13:22:38', '2023-03-15 13:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isOnPromotion` tinyint(1) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `banner_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `slug`, `isOnPromotion`, `category_id`, `description`, `banner_text`, `created_at`, `updated_at`, `brand_id`) VALUES
(1, 'Ink Catridges', '400', 'ink-catridges', 1, 2, 'Supplier of market leading I.T equipment, printers, cartridges, computers and laptops.', 'Ink Catridge', '2023-03-15 06:12:37', '2023-03-15 08:36:18', NULL),
(2, 'Iphone 13 Red', '12', 'iphone-13-red', 1, 9, 'Copyright ownership gives the owner the exclusive right to use the work, with some exceptions. When a person creates an original work, fixed in a tangible medium', 'iphone 13', '2023-03-15 06:23:24', '2023-03-15 08:35:34', NULL),
(3, 'Macbook Pro M1 2022', '50', 'macbook-pro-m1-2022', NULL, 4, '16-core Neural Engine\r\n14-inch Liquid Retina XDR display²\r\nThree Thunderbolt 4 ports, HDMI port, SDXC card slot, headphone jack, MagSafe 3 port', 'cheap m1', '2023-03-15 07:56:48', '2023-03-15 08:06:12', NULL),
(4, 'Macbook pro 2020', '20', 'macbook-pro-2020', 1, 4, '16-core Neural Engine\r\n14-inch Liquid Retina XDR display²\r\nThree Thunderbolt 4 ports, HDMI port, SDXC card slot, headphone jack, MagSafe 3 port', 'Pro 2020', '2023-03-15 08:23:57', '2023-03-15 08:36:03', NULL),
(5, 'Dell oplex All in one', '50', 'dell-oplex-all-in-one', 1, 5, '12th Gen Intel® Core™ i5-12500 (18 MB cache, 6 cores, 12 threads, 3.00 GHz to 4.60 GHz Turbo, 65 W)', 'Oplex All', '2023-03-15 08:26:06', '2023-03-15 08:33:58', NULL),
(6, 'Mechanical keyboard', '100', 'mechanical-keyboard', 0, 6, 'Mechanical keyboard', 'Mechanical keyboard', '2023-03-15 08:47:59', '2023-03-15 08:47:59', NULL),
(7, 'Apple Magic Keyboard', '50', 'apple-magic-keyboard', 0, 6, 'Magic keyboard from apple', 'Magic keyboard', '2023-03-15 08:48:51', '2023-03-15 08:48:51', NULL),
(8, 'LAN Cables', '1000', 'lan-cables', 1, 10, 'Lan cables 3 metres long', 'Lan cables', '2023-03-15 08:49:49', '2023-03-15 08:49:49', NULL),
(9, 'Lighling cable', '2000', 'lighling-cable', 1, 10, 'Lightnig cable', 'Lightnig cable', '2023-03-15 08:50:41', '2023-03-15 16:11:21', 2),
(10, 'Type C Cable', '500', 'type-c-cable', 1, 10, 'Type C Cable', 'Type C Cable', '2023-03-15 08:51:30', '2023-03-15 08:51:30', NULL),
(11, 'Typex Bond Papers', '1000', 'typex-bond-papers', 0, 7, 'Typex bond papers', 'Typex bond papers', '2023-03-15 08:52:24', '2023-03-15 08:52:24', NULL),
(12, 'New', '600', 'new', 1, 5, 'Tesst', 'test', '2023-03-16 04:54:47', '2023-03-16 04:54:47', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(11, 6, 3, '2023-03-15 08:47:59', '2023-03-15 08:47:59'),
(12, 7, 3, '2023-03-15 08:48:51', '2023-03-15 08:48:51'),
(13, 7, 2, '2023-03-15 08:48:51', '2023-03-15 08:48:51'),
(14, 8, 3, '2023-03-15 08:49:49', '2023-03-15 08:49:49'),
(16, 10, 3, '2023-03-15 08:51:30', '2023-03-15 08:51:30'),
(17, 11, 3, '2023-03-15 08:52:24', '2023-03-15 08:52:24'),
(18, 5, 1, '2023-03-15 11:09:49', '2023-03-15 11:09:49'),
(19, 5, 2, '2023-03-15 11:09:49', '2023-03-15 11:09:49'),
(20, 5, 3, '2023-03-15 11:09:49', '2023-03-15 11:09:49'),
(21, 3, 1, '2023-03-15 11:14:16', '2023-03-15 11:14:16'),
(22, 3, 2, '2023-03-15 11:14:16', '2023-03-15 11:14:16'),
(23, 3, 3, '2023-03-15 11:14:16', '2023-03-15 11:14:16'),
(24, 12, 1, '2023-03-16 04:54:47', '2023-03-16 04:54:47'),
(25, 12, 2, '2023-03-16 04:54:47', '2023-03-16 04:54:47'),
(26, 12, 3, '2023-03-16 04:54:47', '2023-03-16 04:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_main` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `is_main`, `created_at`, `updated_at`) VALUES
(1, 1, 'products/gyLUMtOP8tegkp6KkXFNxM99a8XWmGI6gDQuZkRQ.jpg', 0, '2023-03-15 06:12:38', '2023-03-15 06:12:38'),
(2, 1, 'products/mHK8v4HT17p769eDO7pleuerfNvXjfn5zppcGLX1.jpg', 0, '2023-03-15 06:12:38', '2023-03-15 06:12:38'),
(3, 1, 'products/uJLxUnJHNweykurmZjAqjXlYyDCS3whaatSGd8Jp.jpg', 0, '2023-03-15 06:12:38', '2023-03-15 06:12:38'),
(4, 2, 'products/06A8ISlpzOmo7CqpXVnOrxPUZ3O0CKqrSd2tTejV.png', 0, '2023-03-15 06:23:24', '2023-03-15 06:23:24'),
(5, 2, 'products/eHb0bFICUTchLajKq6cJbeZOW6nAUuRctYivOkES.webp', 0, '2023-03-15 06:23:25', '2023-03-15 06:23:25'),
(6, 3, 'products/b2qWt6CjmjPT5YP6ZVR8JCNma7tLkcoPjXRySIhq.jpg', 0, '2023-03-15 07:56:48', '2023-03-15 07:56:48'),
(7, 3, 'products/74uYrs68g7OrUy2T2gDMpW85RaWVQSX7K2u9zb5R.jpg', 0, '2023-03-15 07:56:48', '2023-03-15 07:56:48'),
(8, 4, 'products/7FOjDjfcM78zbmY65xgphZiCUUcsynzEVyZMGYwL.jpg', 0, '2023-03-15 08:23:57', '2023-03-15 08:23:57'),
(9, 4, 'products/MkQjMG99qN8QXdAyFXfv9cik7FJevjGwoiQE3K1k.jpg', 0, '2023-03-15 08:23:57', '2023-03-15 08:23:57'),
(10, 5, 'products/NipkUXDxtQBpMtvL632G2mq12esW1MC3PzjhhqSk.avif', 0, '2023-03-15 08:26:06', '2023-03-15 08:26:06'),
(11, 5, 'products/sSB7QMAs1uLhfeM8CD62Dk6jRGLw6FfeL9DAUk4e.avif', 0, '2023-03-15 08:26:06', '2023-03-15 08:26:06'),
(12, 6, 'products/igY9LvnpIkMbAhgU7tXS9Z3YOvNWneTV5DMheksb.jpg', 0, '2023-03-15 08:47:59', '2023-03-15 08:47:59'),
(13, 6, 'products/75w1xPCGMXIpsJEpcqKrQ8U2fUe0aenFnHkSwEXj.jpg', 0, '2023-03-15 08:47:59', '2023-03-15 08:47:59'),
(14, 7, 'products/zeAyVyXNkgpTmtvTBkkXieNgW8pe3OBDtL56V8tl.jpg', 0, '2023-03-15 08:48:51', '2023-03-15 08:48:51'),
(15, 7, 'products/Xjr1UP2IiTBlSBbmffenQ5KJOVUQ5fq310CyelaL.jpg', 0, '2023-03-15 08:48:51', '2023-03-15 08:48:51'),
(16, 8, 'products/MgsXtiCM8twapvMB0RKBRhPSX6Uj25jy1nZoTrXa.jpg', 0, '2023-03-15 08:49:49', '2023-03-15 08:49:49'),
(17, 8, 'products/YpNmTcmRoFoAHpMaSWBpa2w5yX4aQHTYnXj7KmQr.jpg', 0, '2023-03-15 08:49:49', '2023-03-15 08:49:49'),
(18, 9, 'products/d7VYSHbAKRf9UNye0vbgcqKLaU0abXoBGGWXeViU.jpg', 0, '2023-03-15 08:50:41', '2023-03-15 08:50:41'),
(19, 9, 'products/s8Xn8NF6ZZqf5TkwhpFDR3svdITCMs5zgyopkelI.jpg', 0, '2023-03-15 08:50:41', '2023-03-15 08:50:41'),
(20, 10, 'products/xcQ95LXBUcadN3Y1dbgchxnOxaMvnUv29s6VfZ0k.jpg', 0, '2023-03-15 08:51:30', '2023-03-15 08:51:30'),
(21, 10, 'products/FGES8emcXSGVUrBOeWjZNAS5ZNcKsVtcxh6qhMen.png', 0, '2023-03-15 08:51:30', '2023-03-15 08:51:30'),
(22, 11, 'products/P9RUZUaNUDWPaB1cM04w5ULVnHRxxSqsRmmKXSFQ.jpg', 0, '2023-03-15 08:52:24', '2023-03-15 08:52:24'),
(23, 11, 'products/0a5s6BMMRu2b5k6a6WCKq6tskySLrNxSZBrAgwgz.jpg', 0, '2023-03-15 08:52:24', '2023-03-15 08:52:24'),
(24, 11, 'products/jpfTWDRRmg9txKYyRaf771scqHfkG7O3fU0GspE7.jpg', 0, '2023-03-15 08:52:24', '2023-03-15 08:52:24'),
(25, 12, 'products/igbractC9MX7nTlQ486bWLbvhsDBIXM7uOWpaH8Q.jpg', 0, '2023-03-16 04:54:48', '2023-03-16 04:54:48'),
(26, 12, 'products/LQddDUQ4Yzb9YAMCjTA1W7vz38XsvJiAoHJRQDe3.jpg', 0, '2023-03-16 04:54:48', '2023-03-16 04:54:48'),
(27, 12, 'products/N6E3rsYRsNFKm23VdRYP5xbk9PupkgNFVveBEeYI.png', 0, '2023-03-16 04:54:48', '2023-03-16 04:54:48'),
(28, 12, 'products/BjCCmrfuy1dwra4mlELmNHm7SvVwMO6ARlIcfIMh.jpg', 0, '2023-03-16 04:56:42', '2023-03-16 04:56:42'),
(29, 12, 'products/02H46rwDDiISLTzYoY0uKW1jKyQPnBkrYDNeR0rv.jpg', 0, '2023-03-16 04:56:42', '2023-03-16 04:56:42'),
(30, 12, 'products/sp6gNciza4fOjlDCS46TDyHMHCPVwtNZrBmfvg0F.jpg', 0, '2023-03-16 04:56:42', '2023-03-16 04:56:42'),
(31, 12, 'products/YZtCabBrhmYIyUDeZ8vbF53MT7XXIK7i5zXoJfHo.jpg', 0, '2023-03-16 04:56:42', '2023-03-16 04:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_prices`
--

CREATE TABLE `product_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_prices`
--

INSERT INTO `product_prices` (`id`, `product_id`, `currency_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '10.00', '2023-03-15 06:12:38', '2023-03-15 06:20:20'),
(2, 1, 2, '10000.00', '2023-03-15 06:12:38', '2023-03-15 06:12:38'),
(3, 2, 2, '900000.00', '2023-03-15 06:23:24', '2023-03-15 06:24:47'),
(4, 2, 1, '800.00', '2023-03-15 06:24:10', '2023-03-15 06:24:10'),
(5, 3, 1, '1198.00', '2023-03-15 07:56:48', '2023-03-15 07:56:48'),
(6, 4, 1, '1999.00', '2023-03-15 08:23:57', '2023-03-15 08:23:57'),
(7, 5, 1, '800.00', '2023-03-15 08:26:06', '2023-03-15 08:26:06'),
(8, 6, 1, '50.00', '2023-03-15 08:47:59', '2023-03-15 08:47:59'),
(9, 7, 1, '99.00', '2023-03-15 08:48:51', '2023-03-15 08:48:51'),
(10, 8, 1, '4.00', '2023-03-15 08:49:49', '2023-03-15 08:49:49'),
(11, 9, 1, '4.00', '2023-03-15 08:50:41', '2023-03-15 08:50:41'),
(12, 10, 1, '2.00', '2023-03-15 08:51:30', '2023-03-15 08:51:30'),
(13, 11, 1, '10.00', '2023-03-15 08:52:24', '2023-03-15 08:52:24'),
(14, 12, 1, '5000.00', '2023-03-16 04:54:47', '2023-03-16 04:55:42'),
(16, 12, 2, '500000.00', '2023-03-16 04:55:51', '2023-03-16 04:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `product_specifications`
--

CREATE TABLE `product_specifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `specification_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_specifications`
--

INSERT INTO `product_specifications` (`id`, `product_id`, `specification_id`, `created_at`, `updated_at`) VALUES
(15, 6, 1, '2023-03-15 08:47:59', '2023-03-15 08:47:59'),
(16, 7, 1, '2023-03-15 08:48:51', '2023-03-15 08:48:51'),
(17, 8, 3, '2023-03-15 08:49:49', '2023-03-15 08:49:49'),
(19, 10, 3, '2023-03-15 08:51:30', '2023-03-15 08:51:30'),
(20, 11, 3, '2023-03-15 08:52:24', '2023-03-15 08:52:24'),
(21, 4, 1, '2023-03-15 11:09:22', '2023-03-15 11:09:22'),
(22, 4, 2, '2023-03-15 11:09:22', '2023-03-15 11:09:22'),
(23, 4, 3, '2023-03-15 11:09:22', '2023-03-15 11:09:22'),
(24, 5, 1, '2023-03-15 11:09:41', '2023-03-15 11:09:41'),
(25, 5, 2, '2023-03-15 11:09:41', '2023-03-15 11:09:41'),
(26, 5, 3, '2023-03-15 11:09:41', '2023-03-15 11:09:41'),
(27, 3, 1, '2023-03-15 11:14:10', '2023-03-15 11:14:10'),
(28, 3, 2, '2023-03-15 11:14:10', '2023-03-15 11:14:10'),
(29, 3, 3, '2023-03-15 11:14:10', '2023-03-15 11:14:10'),
(30, 1, 1, '2023-03-15 17:35:34', '2023-03-15 17:35:34'),
(31, 1, 2, '2023-03-15 17:35:34', '2023-03-15 17:35:34'),
(32, 1, 3, '2023-03-15 17:35:34', '2023-03-15 17:35:34'),
(33, 12, 1, '2023-03-16 04:54:47', '2023-03-16 04:54:47'),
(34, 12, 2, '2023-03-16 04:54:47', '2023-03-16 04:54:47'),
(35, 12, 3, '2023-03-16 04:54:47', '2023-03-16 04:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permissions`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6PC6uP5vIKXm5bXs8xei2lDaXjbAOyJWAWNZFeKO', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRWhseXJVcTZqdWVvNjJVcGtveW93em5Id3BXanFibDlwYTBzSkdaTyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2NoZWNrb3V0Ijt9fQ==', 1679317071),
('ectSjvVZBx3mhBLBuHjdTlzv0bch24zngwMbevhN', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMzByTjJBa21XUU5VeXRKZjZjQTRzMDhWa0ltS1lXMzgxdjB5VGYyUyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL21haW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1680256004),
('MieKF19CJ11DjDW79rxKpWfhyueoR5nAgjW3t39m', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVXhHa2pvUTNGUnZjWFpucE9UMFN5amUxQTdNcU5OQzBCWTEwR0JpdiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1679311648),
('nxezdAvl5NP0pHfhagCbEGhoJFWeoHiDorPKBCjs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVHYyZmJOZDMxVENGWllFZGs3em1lSk42MEd2WEdIYTVuVFkxa3MzcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90ZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1679587912),
('RNgH8uiQil3Wl9r2Ge8xLfNz3UbYQqeBk50hI3g3', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOGJkNDJReG5Zd1UwejNLVnlaTk9QVG50cEczSHVmSFFuZHlJa1NxViI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluIjt9fQ==', 1679656422),
('VQ4fhCmSBUcedjTckOZhGz9VdjJFszLn6G9Ne5tt', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzNXaFc1RnAwaDdpdVl4N1BUeHV3ZWdodUZoVjFoR2luQnJmNERiaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90ZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1679587934),
('yDbAJ7OXdcuDzaJFy0M3uUn4ZQmAiiZwYi9eBJvg', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ3drVDVONWRZRWtMcTVYeDJuQUpmWEduUlRCZEhUbFVBWml2aHNhZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaGVja291dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1679320708);

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1.4 GHz Quad Core™ Processor', '2023-03-13 13:13:16', '2023-03-13 13:13:16'),
(2, '20MP Front Camera', '2023-03-13 13:13:42', '2023-03-13 13:13:42'),
(3, '4Gig RAM', '2023-03-13 13:13:57', '2023-03-13 13:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permissions`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `permissions`) VALUES
(1, 'Admin Admin', 'admin@admin.com', NULL, '$2y$10$wMeYDKE3f7eghKEYv8lYWO2e3rEJZ6Ka0LIIWnqhRp/3H.5/iki2.', NULL, NULL, NULL, '6hX8CYPfFD7PhU8pNNLPuirWG5mlzwwGVCfySdJeONrCvTWM4T2nSqGbLEdA', NULL, NULL, '2023-03-13 12:30:51', '2023-03-15 15:09:23', '{\"platform.systems.roles\":true,\"platform.systems.users\":true,\"platform.systems.attachment\":true,\"platform.index\":true}'),
(2, 'TRACY TAXLIEN', 'blessingmwalein@gmail.com', NULL, '$2y$10$kyBFbIlxBUHZ7tKZEmsfQe9W07od.zE0XYHiwpAZ5NbNrTlEp/zwe', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-14 23:06:39', '2023-03-15 15:39:14', NULL),
(3, 'New User', 'new@gmail.com', NULL, '$2y$10$ITNxWV9NFr8XzuWWwC9rt.3/yUvSPtj1eaUfxZfpv/bRS.SRNVES6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-14 23:12:28', '2023-03-14 23:12:28', NULL),
(4, 'ANother User', 'anoother@gmail.com', NULL, '$2y$10$f/DUuK3HU9gcuE.J667x/.oAf1DKqzPyrVuj8SpwU5KbiI3N6uB/6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-14 23:13:46', '2023-03-14 23:13:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachmentable`
--
ALTER TABLE `attachmentable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachmentable_attachmentable_type_attachmentable_id_index` (`attachmentable_type`,`attachmentable_id`),
  ADD KEY `attachmentable_attachment_id_foreign` (`attachment_id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_messages`
--
ALTER TABLE `contact_us_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_currency_id_foreign` (`currency_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_prices`
--
ALTER TABLE `product_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_prices_product_id_foreign` (`product_id`),
  ADD KEY `product_prices_currency_id_foreign` (`currency_id`);

--
-- Indexes for table `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_specifications_product_id_foreign` (`product_id`),
  ADD KEY `product_specifications_specification_id_foreign` (`specification_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_users_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attachmentable`
--
ALTER TABLE `attachmentable`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us_messages`
--
ALTER TABLE `contact_us_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product_prices`
--
ALTER TABLE `product_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_specifications`
--
ALTER TABLE `product_specifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachmentable`
--
ALTER TABLE `attachmentable`
  ADD CONSTRAINT `attachmentable_attachment_id_foreign` FOREIGN KEY (`attachment_id`) REFERENCES `attachments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD CONSTRAINT `customer_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_prices`
--
ALTER TABLE `product_prices`
  ADD CONSTRAINT `product_prices_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `product_prices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD CONSTRAINT `product_specifications_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_specifications_specification_id_foreign` FOREIGN KEY (`specification_id`) REFERENCES `specifications` (`id`);

--
-- Constraints for table `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
