-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2022 at 04:15 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vistahgt_gvmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_address` bigint(20) NOT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `alias`, `address_1`, `address_2`, `zip`, `state_code`, `city`, `province_id`, `country_id`, `customer_id`, `status`, `phone`, `deleted_at`, `created_at`, `updated_at`, `delivery_address`, `landmark`) VALUES
(1, 'Home', 'assdress', '', '112233', 'djfk', 'sdfh', NULL, 99, 27, 0, '9876543120', NULL, '2020-09-09 02:35:27', '2020-09-09 02:35:27', 0, 'sdjfdfgdfg'),
(2, 'Home', 'uytyu', '', '558899', 'uyiyui', 'tyutyu', NULL, 99, 27, 0, '9871234567', NULL, '2020-09-09 02:35:27', '2020-09-09 02:35:27', 0, 'iouyio'),
(3, 'Home', 'assdress', '', '112233', 'djfk', 'sdfh', NULL, 99, 27, 0, '9876543120', NULL, '2020-09-09 02:57:04', '2020-09-09 02:57:04', 0, 'sdjf'),
(4, 'Home', 'dkfjsdkl', '', '110000', 'lgvdkfgl', 'hyopoytrp', NULL, 99, 27, 0, '9812345678', NULL, '2020-09-09 02:57:04', '2020-09-09 02:57:04', 0, 'yrtyrty'),
(5, 'Home', 'assdress', '', '112233', 'djfk', 'sdfh', NULL, 99, 27, 0, '9876543120', NULL, '2020-09-09 03:18:24', '2020-09-09 03:18:24', 0, 'sdjf'),
(6, 'Home', 'assdress', '', '112233', 'djfk', 'sdfh', NULL, 99, 27, 0, '9876543120', NULL, '2020-09-09 03:20:05', '2020-09-09 03:20:05', 0, 'sdjf'),
(7, 'Home', 'dfgdfg', '', '110099', 'ertert', 'dfgdfg', NULL, 99, 31, 0, '9056560143', NULL, '2020-09-25 15:01:18', '2020-09-25 15:01:18', 0, 'fgfdg'),
(8, 'Home', 'Keshav Puram', '', '110099', 'New Delhi', 'New Delhi', NULL, 99, 31, 0, '9056560413', NULL, '2020-09-25 15:18:26', '2020-09-25 15:18:26', 0, 'New Delhi'),
(9, 'Home', 'C-3,Keshav Puram', '', '201016', 'New Delhi', 'New Delhi', NULL, 99, 31, 0, '9056560413', NULL, '2020-10-15 16:10:31', '2020-10-15 16:10:31', 0, 'Lawrence Road'),
(10, 'Home', 'Keshav Puram', '', '201016', 'New Delhi', 'New Delhi', NULL, 99, 31, 0, '9056560413', NULL, '2020-10-15 16:15:21', '2020-10-15 16:15:21', 0, 'Lawrence Road'),
(11, 'Home', 'Keshav Puram', '', '201016', 'New Delhi', 'New Delhi', NULL, 99, 31, 0, '9056560413', NULL, '2020-10-15 16:16:23', '2020-10-15 16:16:23', 0, 'Lawrence Road'),
(12, 'Home', 'A21704', '', '201016', 'UP', 'Ghaziabad', NULL, 99, 32, 0, '9810772541', NULL, '2020-10-16 02:54:40', '2020-10-16 02:54:40', 0, 'More store'),
(13, 'Home', 'A21704', '', '201016', 'UP', 'Ghaziabad', NULL, 99, 32, 0, '9810772541', NULL, '2020-10-16 02:54:49', '2020-10-16 02:54:49', 0, 'More store'),
(14, 'Home', 'A21704', '', '201016', 'UP', 'Ghaziabad', NULL, 99, 32, 0, '9810772541', NULL, '2020-10-16 02:55:07', '2020-10-16 02:55:07', 0, 'More store'),
(15, 'Home', 'keshav puram', '', '110099', 'New Delhi', 'New Delhi', NULL, 99, 31, 0, '9056560413', NULL, '2020-10-16 16:36:11', '2020-10-16 16:36:11', 0, 'Lawrence road'),
(16, 'Home', 'Keshav Puram', '', '110099', 'New Delhi', 'New Delhi', NULL, 99, 31, 0, '9056560413', NULL, '2020-10-16 18:48:00', '2020-10-16 18:48:00', 0, 'Lawrence Road'),
(17, 'Home', 'A2-1704', '', '201016', 'UP', 'Ghaziabad', NULL, 99, 32, 0, '9810772541', NULL, '2020-10-17 04:40:18', '2020-10-17 04:40:18', 0, 'More store'),
(18, 'Home', 'keshav puram', '', '201016', 'New Delhi', 'New Delhi', NULL, 99, 31, 0, '9056560413', NULL, '2020-10-17 04:48:48', '2020-10-17 04:48:48', 0, 'Lawrence road'),
(19, 'Home', 'keshav puram', '', '201016', 'New Delhi', 'New Delhi', NULL, 99, 31, 0, '9056560413', NULL, '2020-10-17 04:49:37', '2020-10-17 04:49:37', 0, 'Lawrence road'),
(20, 'Home', 'kesahv puram', '', '201016', 'new delhi', 'new delhi', NULL, 99, 31, 0, '9056560413', NULL, '2020-10-17 04:50:59', '2020-10-17 04:50:59', 0, 'new delhi'),
(21, 'Home', 'A6, 2108, Saviour Greenisle apartment', 'crossing republic, ghaziabad', '201016', 'UP', 'Ghaziabad', NULL, 99, 39, 0, '9990050100', NULL, '2020-10-17 08:32:55', '2020-10-17 08:32:55', 0, '00'),
(22, 'Home', 'C-128, Sector 15', '', '201301', 'UP', 'Noida', NULL, 99, 41, 0, '9999602639', NULL, '2020-10-17 12:02:19', '2020-10-17 12:02:19', 0, 'Near Community Center'),
(23, 'Home', 'C-128, Sec-15', '', '201301', 'UP', 'Noida', NULL, 99, 41, 0, '9999602639', NULL, '2020-10-18 01:55:14', '2020-10-18 01:55:14', 0, 'Near Community Center'),
(24, 'Home', 'A2-1704, Saviour green Isle, crossings Republic', '', '201016', 'Uttar Pradesh', 'Ghaziabad', NULL, 99, 32, 0, '9810772541', NULL, '2020-10-18 11:07:36', '2020-10-18 11:07:36', 0, 'Near more retail store'),
(25, 'Home', 'test', '', '', 'test', 'test', NULL, 99, 34, 0, '9911209567', NULL, '2020-10-20 10:13:25', '2020-10-20 10:13:25', 0, 'test'),
(26, 'Home', 'test', '', '9911209567', 'test', 'test', NULL, 99, 34, 0, '9911209567', NULL, '2020-10-20 10:16:51', '2020-10-20 10:16:51', 0, 'test'),
(27, 'Home', 'kesahv puram', '', '201016', 'new delhi', 'new delhi', NULL, 99, 31, 0, '9056560413', NULL, '2020-10-21 01:22:54', '2020-10-21 01:22:54', 0, 'new delhi'),
(28, 'Home', 'kesahv puram', '', '9056560413', 'new delhi', 'new delhi', NULL, 99, 31, 0, '9056560413', NULL, '2020-10-21 01:40:52', '2020-10-21 01:40:52', 0, 'new delhi'),
(29, 'Home', 'kesahv puram', '', '9056560413', 'new delhi', 'new delhi', NULL, 99, 31, 0, '9056560413', NULL, '2020-10-21 01:41:05', '2020-10-21 01:41:05', 0, 'new delhi'),
(30, 'Home', 'Delhi', '', '110022', 'Delhi', 'New Delhi', NULL, 99, 51, 0, '9876543221', NULL, '2020-10-27 16:07:55', '2020-10-27 16:07:55', 0, 'keshav puram'),
(31, 'Home', 'delhi', '', '110098', 'delhi', 'delhi', NULL, 99, 53, 0, '9812345678', NULL, '2020-10-28 17:09:31', '2020-10-28 17:09:31', 0, 'delhi'),
(32, 'Home', 'A2-1704, Saviour green Isle, crossings Republic', '', '201016', 'Uttar Pradesh', 'Ghaziabad', NULL, 99, 32, 0, '9810772541', NULL, '2020-10-28 17:28:21', '2020-10-28 17:28:21', 0, 'Near more retail store'),
(33, 'Home', 'A2-1704, Saviour green Isle, crossings Republic', '', '201016', 'Uttar Pradesh', 'Ghaziabad', NULL, 99, 32, 0, '9810772541', NULL, '2020-10-28 17:28:48', '2020-10-28 17:28:48', 0, 'Near more retail store'),
(34, 'Home', 'A2-1704, Saviour green Isle, crossings Republic', '', '201016', 'Uttar Pradesh', 'Ghaziabad', NULL, 99, 32, 0, '9810772541', NULL, '2020-10-28 17:31:05', '2020-10-28 17:31:05', 0, 'Near more retail store'),
(35, 'Home', 'A2-1704, Saviour green Isle, crossings Republic', '', '201016', 'Uttar Pradesh', 'Ghaziabad', NULL, 99, 32, 0, '9810772541', NULL, '2020-10-29 03:14:28', '2020-10-29 03:14:28', 0, 'Near more retail store'),
(36, 'Home', 'A2-1704, Saviour green Isle, crossings Republic', '', '201016', 'Uttar Pradesh', 'Ghaziabad', NULL, 99, 32, 0, '9810772541', NULL, '2020-10-29 04:15:21', '2020-10-29 04:15:21', 0, 'Near more retail store'),
(37, 'Home', 'A2-1704, Saviour green Isle, crossings Republic', '', '201016', 'Uttar Pradesh', 'Ghaziabad', NULL, 99, 32, 0, '9810772541', NULL, '2020-10-29 04:20:32', '2020-10-29 04:20:32', 0, 'Near more retail store'),
(38, 'Home', 'A2-1704, Saviour green Isle, crossings Republic', '', '201016', 'Uttar Pradesh', 'Ghaziabad', NULL, 99, 32, 0, '9810772541', NULL, '2020-10-29 05:32:00', '2020-10-29 05:32:00', 0, 'Near more retail store'),
(39, 'Home', 'Keshav Puram', '', '201016', 'New Delhi', 'New Delhi', NULL, 99, 56, 0, '9876543210', NULL, '2020-11-02 20:55:50', '2020-11-02 20:55:50', 0, 'Lawrence Road'),
(40, 'Home', 'Keshav Puram', '', '201016', 'New Delhi', 'New Delhi', NULL, 99, 51, 0, '9056560413', NULL, '2020-11-02 21:03:32', '2020-11-02 21:03:32', 0, 'Lawrence Road'),
(41, 'Home', 'a2-1704', '', '2764', 'up', 'ghaziabad', NULL, 99, 32, 0, '9810772541', NULL, '2020-11-03 22:14:50', '2020-11-03 22:14:50', 0, 'hjgkgkg'),
(42, 'Home', 'FLAT #  A-6/2108', 'cROSSINGS rEPUBLIK', '201016', 'Uttar Pradesh', 'Ghaziabad', NULL, 99, 38, 0, '9891000274', NULL, '2020-12-03 16:48:44', '2020-12-03 16:48:44', 0, 'near MORE Departmental Store'),
(43, 'Home', 'A2-1704,Saviour greenisle,crossing republik', 'Ghaziabad', '201016', 'uttar pradesh', 'ghaziabad', NULL, 99, 57, 0, '9871322404', NULL, '2020-12-14 16:50:13', '2020-12-14 16:50:13', 0, 'near more retail store'),
(44, 'Home', 'Address', '', '110034', 'State', 'City', NULL, 99, 2, 0, '9056560513', NULL, '2020-12-19 14:20:10', '2020-12-19 14:20:10', 0, 'Landmark'),
(45, 'Home', 'Address', '', '110034', 'State', 'City', NULL, 99, 2, 0, '9056560513', NULL, '2020-12-19 14:29:47', '2020-12-19 14:29:47', 0, 'Landmark'),
(46, 'Home', 'Address', '', '110034', 'State', 'City', NULL, 99, 2, 0, '9056560513', NULL, '2020-12-19 14:39:15', '2020-12-19 14:39:15', 0, 'Landmark'),
(47, 'Home', 'Address', '', '110034', 'State', 'City', NULL, 99, 2, 0, '9056560513', NULL, '2020-12-19 14:46:32', '2020-12-19 14:46:32', 0, 'Landmark'),
(48, 'Home', 'Address', '', '110034', 'State', 'City', NULL, 99, 2, 0, '9056560513', NULL, '2020-12-19 14:48:00', '2020-12-19 14:48:00', 0, 'Landmark'),
(49, 'Home', 'Address', '', '110034', 'State', 'City', NULL, 99, 2, 0, '9056560513', NULL, '2020-12-19 14:50:25', '2020-12-19 14:50:25', 0, 'Landmark'),
(50, 'Home', 'Address', '', '110034', 'State', 'City', NULL, 99, 2, 0, '9056560513', NULL, '2020-12-19 15:13:49', '2020-12-19 15:13:49', 0, 'Landmark'),
(51, 'Home', 'Address', '', '110034', 'State', 'City', NULL, 99, 2, 0, '9056560513', NULL, '2020-12-19 15:14:51', '2020-12-19 15:14:51', 0, 'Landmark'),
(52, 'Home', 'Address', '', '110034', 'State', 'City', NULL, 99, 2, 0, '9056560513', NULL, '2020-12-19 15:16:04', '2020-12-19 15:16:04', 0, 'Landmark'),
(53, 'Home', 'Address', '', '110034', 'State', 'City', NULL, 99, 2, 0, '9056560513', NULL, '2020-12-19 15:16:19', '2020-12-19 15:16:19', 0, 'Landmark'),
(54, 'Home', 'Address', '', '110034', 'State', 'City', NULL, 99, 2, 0, '9056560513', NULL, '2020-12-19 15:22:18', '2020-12-19 15:22:18', 0, 'Landmark'),
(55, 'Home', 'Address', '', '110034', 'State', 'City', NULL, 99, 2, 0, '9056560513', NULL, '2020-12-19 15:22:28', '2020-12-19 15:22:28', 0, 'Landmark'),
(56, 'Home', 'Address', '', '110034', 'State', 'City', NULL, 99, 2, 0, '9056560513', NULL, '2020-12-19 15:23:15', '2020-12-19 15:23:15', 0, 'Landmark'),
(57, 'Home', 'A2-1704, Saviour green Isle, crossings Republic', '', '201016', 'Uttar Pradesh', 'Ghaziabad', NULL, 99, 32, 0, '9810772541', NULL, '2020-12-19 18:46:27', '2020-12-19 18:46:27', 0, 'Near more retail store'),
(58, 'Home', 'test', '', '110034', 'test', 'state', NULL, 99, 58, 0, '9056560513', NULL, '2020-12-21 12:18:01', '2020-12-21 12:18:01', 0, 'Landmark'),
(59, 'Home', 'KJSALKDS;LEA;', 'SAFA', '', 'ada', 'ADFA', NULL, 99, 59, 0, '6376219113', NULL, '2020-12-26 13:05:45', '2020-12-26 13:05:45', 0, 'ada'),
(60, 'Home', 'Address', '', '201016', 'State', 'City', NULL, 99, 2, 0, '9056560513', NULL, '2022-02-17 13:55:56', '2022-02-17 13:55:56', 0, 'Landmark');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value_product_attribute`
--

CREATE TABLE `attribute_value_product_attribute` (
  `attribute_value_id` int(10) UNSIGNED NOT NULL,
  `product_attribute_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '999',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `category_id`, `category_slug`, `banner_title`, `cover`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Fruits', 'banners/1645110164b22.jpg', '1', '1', '2020-09-13 13:22:21', '2022-02-17 15:02:44'),
(2, '1', NULL, 'Main', 'banners/1645109354b2.jpg', '2', '1', '2020-10-16 09:30:01', '2022-02-17 14:49:14'),
(3, NULL, NULL, 'sdffd', 'banners/1645109398b4.jpg', '4', '1', '2022-02-17 14:49:58', '2022-02-17 14:50:51'),
(4, NULL, NULL, 'trtyrty', 'banners/1645109471b1.jpg', '3', '1', '2022-02-17 14:51:11', '2022-02-17 14:51:11'),
(5, '1', 'Fashion', 'drtert', 'banners/1645111462b3.jpg', '6', '1', '2022-02-17 15:24:22', '2022-02-17 15:26:07'),
(6, '1', 'Fashion', 'fghfgh', 'banners/1645111676b7.jpg', '5', '1', '2022-02-17 15:26:29', '2022-02-17 15:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `description`, `cover`, `status`, `created_at`, `updated_at`, `author`, `tags`, `user_id`) VALUES
(1, 'Blog 1', 'Blog-1', '<p>sdjfhshdf</p>', 'blogs/1599401420blog 1.jpg', 0, '2020-09-06 08:40:20', '2020-09-06 09:31:37', 'Blog Author', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `blog_reviews`
--

CREATE TABLE `blog_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_id` bigint(20) NOT NULL,
  `blog_review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_id` bigint(20) NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_contact` bigint(20) NOT NULL,
  `customer_house_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_mohalla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_near_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_pincode` bigint(20) DEFAULT NULL,
  `customer_service_query` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT 1,
  `priority` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`, `user_id`, `cover`, `status`, `priority`) VALUES
(1, 'Myntra', '2022-02-17 14:35:18', '2022-02-17 14:35:18', 2, 'brands/1645108518fashion.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `unit_price` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` bigint(20) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `_lft` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `_rgt` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `is_top` int(11) DEFAULT 0,
  `is_featured` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `cover`, `status`, `created_at`, `updated_at`, `_lft`, `_rgt`, `parent_id`, `user_id`, `is_top`, `is_featured`) VALUES
(1, 'Fashion', 'Fashion', '<p>Fashion for Men, Women and Kids</p>', 'categories/1645094418fashion.jpg', 1, '2022-02-17 10:40:18', '2022-02-17 11:18:59', 0, 0, NULL, 2, 1, 1),
(2, 'Women', 'Women', '<p>Mens fashion</p>', NULL, 1, '2022-02-17 10:41:42', '2022-02-17 11:19:54', 0, 0, 1, 2, 0, 0),
(3, 'Electronics', 'Electronics', NULL, 'categories/1645094547t1.jpg', 1, '2022-02-17 10:42:03', '2022-02-17 10:42:27', 0, 0, NULL, 2, 1, 1),
(4, 'Smart Phones', 'Smart-Phones', '<p>Smart phones - latest 5G</p>', 'categories/1645094742m1.jpg', 1, '2022-02-17 10:45:42', '2022-02-17 10:45:42', 0, 0, NULL, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`) VALUES
(3, 2, 1),
(4, 2, 4),
(5, 2, 3),
(6, 2, 2),
(8, 2, 5),
(9, 2, 6),
(11, 3, 7),
(12, 3, 8),
(13, 4, 9),
(14, 4, 11),
(16, 4, 10),
(19, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`name`, `state_code`, `province_id`) VALUES
('Bangued', NULL, 1),
('Boliney', NULL, 1),
('Bucay', NULL, 1),
('Bucloc', NULL, 1),
('Daguioman', NULL, 1),
('Danglas', NULL, 1),
('Dolores', NULL, 1),
('La Paz', NULL, 1),
('Lacub', NULL, 1),
('Lagangilang', NULL, 1),
('Lagayan', NULL, 1),
('Langiden', NULL, 1),
('Licuan-Baay', NULL, 1),
('Luba', NULL, 1),
('Malibcong', NULL, 1),
('Manabo', NULL, 1),
('Peñarrubia', NULL, 1),
('Pidigan', NULL, 1),
('Pilar', NULL, 1),
('Sallapadan', NULL, 1),
('San Isidro', NULL, 1),
('San Juan', NULL, 1),
('San Quintin', NULL, 1),
('Tayum', NULL, 1),
('Tineg', NULL, 1),
('Tubo', NULL, 1),
('Villaviciosa', NULL, 1),
('Butuan City', NULL, 2),
('Buenavista', NULL, 2),
('Cabadbaran', NULL, 2),
('Carmen', NULL, 2),
('Jabonga', NULL, 2),
('Kitcharao', NULL, 2),
('Las Nieves', NULL, 2),
('Magallanes', NULL, 2),
('Nasipit', NULL, 2),
('Remedios T. Romualdez', NULL, 2),
('Santiago', NULL, 2),
('Tubay', NULL, 2),
('Bayugan', NULL, 3),
('Bunawan', NULL, 3),
('Esperanza', NULL, 3),
('La Paz', NULL, 3),
('Loreto', NULL, 3),
('Prosperidad', NULL, 3),
('Rosario', NULL, 3),
('San Francisco', NULL, 3),
('San Luis', NULL, 3),
('Santa Josefa', NULL, 3),
('Sibagat', NULL, 3),
('Talacogon', NULL, 3),
('Trento', NULL, 3),
('Veruela', NULL, 3),
('Altavas', NULL, 4),
('Balete', NULL, 4),
('Banga', NULL, 4),
('Batan', NULL, 4),
('Buruanga', NULL, 4),
('Ibajay', NULL, 4),
('Kalibo', NULL, 4),
('Lezo', NULL, 4),
('Libacao', NULL, 4),
('Madalag', NULL, 4),
('Makato', NULL, 4),
('Malay', NULL, 4),
('Malinao', NULL, 4),
('Nabas', NULL, 4),
('New Washington', NULL, 4),
('Numancia', NULL, 4),
('Tangalan', NULL, 4),
('Legazpi City', NULL, 5),
('Ligao City', NULL, 5),
('Tabaco City', NULL, 5),
('Bacacay', NULL, 5),
('Camalig', NULL, 5),
('Daraga', NULL, 5),
('Guinobatan', NULL, 5),
('Jovellar', NULL, 5),
('Libon', NULL, 5),
('Malilipot', NULL, 5),
('Malinao', NULL, 5),
('Manito', NULL, 5),
('Oas', NULL, 5),
('Pio Duran', NULL, 5),
('Polangui', NULL, 5),
('Rapu-Rapu', NULL, 5),
('Santo Domingo', NULL, 5),
('Tiwi', NULL, 5),
('Anini-y', NULL, 6),
('Barbaza', NULL, 6),
('Belison', NULL, 6),
('Bugasong', NULL, 6),
('Caluya', NULL, 6),
('Culasi', NULL, 6),
('Hamtic', NULL, 6),
('Laua-an', NULL, 6),
('Libertad', NULL, 6),
('Pandan', NULL, 6),
('Patnongon', NULL, 6),
('San Jose', NULL, 6),
('San Remigio', NULL, 6),
('Sebaste', NULL, 6),
('Sibalom', NULL, 6),
('Tibiao', NULL, 6),
('Tobias Fornier', NULL, 6),
('Valderrama', NULL, 6),
('Calanasan', NULL, 7),
('Conner', NULL, 7),
('Flora', NULL, 7),
('Kabugao', NULL, 7),
('Luna', NULL, 7),
('Pudtol', NULL, 7),
('Santa Marcela', NULL, 7),
('Baler', NULL, 8),
('Casiguran', NULL, 8),
('Dilasag', NULL, 8),
('Dinalungan', NULL, 8),
('Dingalan', NULL, 8),
('Dipaculao', NULL, 8),
('Maria Aurora', NULL, 8),
('San Luis', NULL, 8),
('Isabela City', NULL, 9),
('Akbar', NULL, 9),
('Al-Barka', NULL, 9),
('Hadji Mohammad Ajul', NULL, 9),
('Hadji Muhtamad', NULL, 9),
('Lamitan', NULL, 9),
('Lantawan', NULL, 9),
('Maluso', NULL, 9),
('Sumisip', NULL, 9),
('Tabuan-Lasa', NULL, 9),
('Tipo-Tipo', NULL, 9),
('Tuburan', NULL, 9),
('Ungkaya Pukan', NULL, 9),
('Balanga City', NULL, 10),
('Abucay', NULL, 10),
('Bagac', NULL, 10),
('Dinalupihan', NULL, 10),
('Hermosa', NULL, 10),
('Limay', NULL, 10),
('Mariveles', NULL, 10),
('Morong', NULL, 10),
('Orani', NULL, 10),
('Orion', NULL, 10),
('Pilar', NULL, 10),
('Samal', NULL, 10),
('Basco', NULL, 11),
('Itbayat', NULL, 11),
('Ivana', NULL, 11),
('Mahatao', NULL, 11),
('Sabtang', NULL, 11),
('Uyugan', NULL, 11),
('Batangas City', NULL, 12),
('Lipa City', NULL, 12),
('Tanauan City', NULL, 12),
('Agoncillo', NULL, 12),
('Alitagtag', NULL, 12),
('Balayan', NULL, 12),
('Balete', NULL, 12),
('Bauan', NULL, 12),
('Calaca', NULL, 12),
('Calatagan', NULL, 12),
('Cuenca', NULL, 12),
('Ibaan', NULL, 12),
('Laurel', NULL, 12),
('Lemery', NULL, 12),
('Lian', NULL, 12),
('Lobo', NULL, 12),
('Mabini', NULL, 12),
('Malvar', NULL, 12),
('Mataas na Kahoy', NULL, 12),
('Nasugbu', NULL, 12),
('Padre Garcia', NULL, 12),
('Rosario', NULL, 12),
('San Jose', NULL, 12),
('San Juan', NULL, 12),
('San Luis', NULL, 12),
('San Nicolas', NULL, 12),
('San Pascual', NULL, 12),
('Santa Teresita', NULL, 12),
('Santo Tomas', NULL, 12),
('Taal', NULL, 12),
('Talisay', NULL, 12),
('Taysan', NULL, 12),
('Tingloy', NULL, 12),
('Tuy', NULL, 12),
('Baguio City', NULL, 13),
('Atok', NULL, 13),
('Bakun', NULL, 13),
('Bokod', NULL, 13),
('Buguias', NULL, 13),
('Itogon', NULL, 13),
('Kabayan', NULL, 13),
('Kapangan', NULL, 13),
('Kibungan', NULL, 13),
('La Trinidad', NULL, 13),
('Mankayan', NULL, 13),
('Sablan', NULL, 13),
('Tuba', NULL, 13),
('Tublay', NULL, 13),
('Almeria', NULL, 14),
('Biliran', NULL, 14),
('Cabucgayan', NULL, 14),
('Caibiran', NULL, 14),
('Culaba', NULL, 14),
('Kawayan', NULL, 14),
('Maripipi', NULL, 14),
('Naval', NULL, 14),
('Tagbilaran City', NULL, 15),
('Alburquerque', NULL, 15),
('Alicia', NULL, 15),
('Anda', NULL, 15),
('Antequera', NULL, 15),
('Baclayon', NULL, 15),
('Balilihan', NULL, 15),
('Batuan', NULL, 15),
('Bien Unido', NULL, 15),
('Bilar', NULL, 15),
('Buenavista', NULL, 15),
('Calape', NULL, 15),
('Candijay', NULL, 15),
('Carmen', NULL, 15),
('Catigbian', NULL, 15),
('Clarin', NULL, 15),
('Corella', NULL, 15),
('Cortes', NULL, 15),
('Dagohoy', NULL, 15),
('Danao', NULL, 15),
('Dauis', NULL, 15),
('Dimiao', NULL, 15),
('Duero', NULL, 15),
('Garcia Hernandez', NULL, 15),
('Getafe', NULL, 15),
('Guindulman', NULL, 15),
('Inabanga', NULL, 15),
('Jagna', NULL, 15),
('Lila', NULL, 15),
('Loay', NULL, 15),
('Loboc', NULL, 15),
('Loon', NULL, 15),
('Mabini', NULL, 15),
('Maribojoc', NULL, 15),
('Panglao', NULL, 15),
('Pilar', NULL, 15),
('President Carlos P. Garcia', NULL, 15),
('Sagbayan', NULL, 15),
('San Isidro', NULL, 15),
('San Miguel', NULL, 15),
('Sevilla', NULL, 15),
('Sierra Bullones', NULL, 15),
('Sikatuna', NULL, 15),
('Talibon', NULL, 15),
('Trinidad', NULL, 15),
('Tubigon', NULL, 15),
('Ubay', NULL, 15),
('Valencia', NULL, 15),
('Malaybalay City', NULL, 16),
('Valencia City', NULL, 16),
('Baungon', NULL, 16),
('Cabanglasan', NULL, 16),
('Damulog', NULL, 16),
('Dangcagan', NULL, 16),
('Don Carlos', NULL, 16),
('Impasug-ong', NULL, 16),
('Kadingilan', NULL, 16),
('Kalilangan', NULL, 16),
('Kibawe', NULL, 16),
('Kitaotao', NULL, 16),
('Lantapan', NULL, 16),
('Libona', NULL, 16),
('Malitbog', NULL, 16),
('Manolo Fortich', NULL, 16),
('Maramag', NULL, 16),
('Pangantucan', NULL, 16),
('Quezon', NULL, 16),
('San Fernando', NULL, 16),
('Sumilao', NULL, 16),
('Talakag', NULL, 16),
('Malolos City', NULL, 17),
('Meycauayan City', NULL, 17),
('San Jose del Monte City', NULL, 17),
('Angat', NULL, 17),
('Balagtas', NULL, 17),
('Baliuag', NULL, 17),
('Bocaue', NULL, 17),
('Bulacan', NULL, 17),
('Bustos', NULL, 17),
('Calumpit', NULL, 17),
('Doña Remedios Trinidad', NULL, 17),
('Guiguinto', NULL, 17),
('Hagonoy', NULL, 17),
('Marilao', NULL, 17),
('Norzagaray', NULL, 17),
('Obando', NULL, 17),
('Pandi', NULL, 17),
('Paombong', NULL, 17),
('Plaridel', NULL, 17),
('Pulilan', NULL, 17),
('San Ildefonso', NULL, 17),
('San Miguel', NULL, 17),
('San Rafael', NULL, 17),
('Santa Maria', NULL, 17),
('Tuguegarao City', NULL, 18),
('Abulug', NULL, 18),
('Alcala', NULL, 18),
('Allacapan', NULL, 18),
('Amulung', NULL, 18),
('Aparri', NULL, 18),
('Baggao', NULL, 18),
('Ballesteros', NULL, 18),
('Buguey', NULL, 18),
('Calayan', NULL, 18),
('Camalaniugan', NULL, 18),
('Claveria', NULL, 18),
('Enrile', NULL, 18),
('Gattaran', NULL, 18),
('Gonzaga', NULL, 18),
('Iguig', NULL, 18),
('Lal-lo', NULL, 18),
('Lasam', NULL, 18),
('Pamplona', NULL, 18),
('Peñablanca', NULL, 18),
('Piat', NULL, 18),
('Rizal', NULL, 18),
('Sanchez-Mira', NULL, 18),
('Santa Ana', NULL, 18),
('Santa Praxedes', NULL, 18),
('Santa Teresita', NULL, 18),
('Santo Niño', NULL, 18),
('Solana', NULL, 18),
('Tuao', NULL, 18),
('Basud', NULL, 19),
('Capalonga', NULL, 19),
('Daet', NULL, 19),
('Jose Panganiban', NULL, 19),
('Labo', NULL, 19),
('Mercedes', NULL, 19),
('Paracale', NULL, 19),
('San Lorenzo Ruiz', NULL, 19),
('San Vicente', NULL, 19),
('Santa Elena', NULL, 19),
('Talisay', NULL, 19),
('Vinzons', NULL, 19),
('Iriga City', NULL, 20),
('Naga City', NULL, 20),
('Baao', NULL, 20),
('Balatan', NULL, 20),
('Bato', NULL, 20),
('Bombon', NULL, 20),
('Buhi', NULL, 20),
('Bula', NULL, 20),
('Cabusao', NULL, 20),
('Calabanga', NULL, 20),
('Camaligan', NULL, 20),
('Canaman', NULL, 20),
('Caramoan', NULL, 20),
('Del Gallego', NULL, 20),
('Gainza', NULL, 20),
('Garchitorena', NULL, 20),
('Goa', NULL, 20),
('Lagonoy', NULL, 20),
('Libmanan', NULL, 20),
('Lupi', NULL, 20),
('Magarao', NULL, 20),
('Milaor', NULL, 20),
('Minalabac', NULL, 20),
('Nabua', NULL, 20),
('Ocampo', NULL, 20),
('Pamplona', NULL, 20),
('Pasacao', NULL, 20),
('Pili', NULL, 20),
('Presentacion', NULL, 20),
('Ragay', NULL, 20),
('Sagñay', NULL, 20),
('San Fernando', NULL, 20),
('San Jose', NULL, 20),
('Sipocot', NULL, 20),
('Siruma', NULL, 20),
('Tigaon', NULL, 20),
('Tinambac', NULL, 20),
('Catarman', NULL, 21),
('Guinsiliban', NULL, 21),
('Mahinog', NULL, 21),
('Mambajao', NULL, 21),
('Sagay', NULL, 21),
('Roxas City', NULL, 22),
('Cuartero', NULL, 22),
('Dao', NULL, 22),
('Dumalag', NULL, 22),
('Dumarao', NULL, 22),
('Ivisan', NULL, 22),
('Jamindan', NULL, 22),
('Ma-ayon', NULL, 22),
('Mambusao', NULL, 22),
('Panay', NULL, 22),
('Panitan', NULL, 22),
('Pilar', NULL, 22),
('Pontevedra', NULL, 22),
('President Roxas', NULL, 22),
('Sapi-an', NULL, 22),
('Sigma', NULL, 22),
('Tapaz', NULL, 22),
('Bagamanoc', NULL, 23),
('Baras', NULL, 23),
('Bato', NULL, 23),
('Caramoran', NULL, 23),
('Gigmoto', NULL, 23),
('Pandan', NULL, 23),
('Panganiban', NULL, 23),
('San Andres', NULL, 23),
('San Miguel', NULL, 23),
('Viga', NULL, 23),
('Virac', NULL, 23),
('Cavite City', NULL, 24),
('Dasmariñas City', NULL, 24),
('Tagaytay City', NULL, 24),
('Trece Martires City', NULL, 24),
('Alfonso', NULL, 24),
('Amadeo', NULL, 24),
('Bacoor', NULL, 24),
('Carmona', NULL, 24),
('General Mariano Alvarez', NULL, 24),
('General Emilio Aguinaldo', NULL, 24),
('General Trias', NULL, 24),
('Imus', NULL, 24),
('Indang', NULL, 24),
('Kawit', NULL, 24),
('Magallanes', NULL, 24),
('Maragondon', NULL, 24),
('Mendez', NULL, 24),
('Naic', NULL, 24),
('Noveleta', NULL, 24),
('Rosario', NULL, 24),
('Silang', NULL, 24),
('Tanza', NULL, 24),
('Ternate', NULL, 24),
('Bogo City', NULL, 25),
('Cebu City', NULL, 25),
('Carcar City', NULL, 25),
('Danao City', NULL, 25),
('Lapu-Lapu City', NULL, 25),
('Mandaue City', NULL, 25),
('Naga City', NULL, 25),
('Talisay City', NULL, 25),
('Toledo City', NULL, 25),
('Alcantara', NULL, 25),
('Alcoy', NULL, 25),
('Alegria', NULL, 25),
('Aloguinsan', NULL, 25),
('Argao', NULL, 25),
('Asturias', NULL, 25),
('Badian', NULL, 25),
('Balamban', NULL, 25),
('Bantayan', NULL, 25),
('Barili', NULL, 25),
('Boljoon', NULL, 25),
('Borbon', NULL, 25),
('Carmen', NULL, 25),
('Catmon', NULL, 25),
('Compostela', NULL, 25),
('Consolacion', NULL, 25),
('Cordoba', NULL, 25),
('Daanbantayan', NULL, 25),
('Dalaguete', NULL, 25),
('Dumanjug', NULL, 25),
('Ginatilan', NULL, 25),
('Liloan', NULL, 25),
('Madridejos', NULL, 25),
('Malabuyoc', NULL, 25),
('Medellin', NULL, 25),
('Minglanilla', NULL, 25),
('Moalboal', NULL, 25),
('Oslob', NULL, 25),
('Pilar', NULL, 25),
('Pinamungahan', NULL, 25),
('Poro', NULL, 25),
('Ronda', NULL, 25),
('Samboan', NULL, 25),
('San Fernando', NULL, 25),
('San Francisco', NULL, 25),
('San Remigio', NULL, 25),
('Santa Fe', NULL, 25),
('Santander', NULL, 25),
('Sibonga', NULL, 25),
('Sogod', NULL, 25),
('Tabogon', NULL, 25),
('Tabuelan', NULL, 25),
('Tuburan', NULL, 25),
('Tudela', NULL, 25),
('Compostela', NULL, 26),
('Laak', NULL, 26),
('Mabini', NULL, 26),
('Maco', NULL, 26),
('Maragusan', NULL, 26),
('Mawab', NULL, 26),
('Monkayo', NULL, 26),
('Montevista', NULL, 26),
('Nabunturan', NULL, 26),
('New Bataan', NULL, 26),
('Pantukan', NULL, 26),
('Kidapawan City', NULL, 27),
('Alamada', NULL, 27),
('Aleosan', NULL, 27),
('Antipas', NULL, 27),
('Arakan', NULL, 27),
('Banisilan', NULL, 27),
('Carmen', NULL, 27),
('Kabacan', NULL, 27),
('Libungan', NULL, 27),
('M\'lang', NULL, 27),
('Magpet', NULL, 27),
('Makilala', NULL, 27),
('Matalam', NULL, 27),
('Midsayap', NULL, 27),
('Pigkawayan', NULL, 27),
('Pikit', NULL, 27),
('President Roxas', NULL, 27),
('Tulunan', NULL, 27),
('Panabo City', NULL, 28),
('Island Garden City of Samal', NULL, 28),
('Tagum City', NULL, 28),
('Asuncion', NULL, 28),
('Braulio E. Dujali', NULL, 28),
('Carmen', NULL, 28),
('Kapalong', NULL, 28),
('New Corella', NULL, 28),
('San Isidro', NULL, 28),
('Santo Tomas', NULL, 28),
('Talaingod', NULL, 28),
('Davao City', NULL, 29),
('Digos City', NULL, 29),
('Bansalan', NULL, 29),
('Don Marcelino', NULL, 29),
('Hagonoy', NULL, 29),
('Jose Abad Santos', NULL, 29),
('Kiblawan', NULL, 29),
('Magsaysay', NULL, 29),
('Malalag', NULL, 29),
('Malita', NULL, 29),
('Matanao', NULL, 29),
('Padada', NULL, 29),
('Santa Cruz', NULL, 29),
('Santa Maria', NULL, 29),
('Sarangani', NULL, 29),
('Sulop', NULL, 29),
('Mati City', NULL, 30),
('Baganga', NULL, 30),
('Banaybanay', NULL, 30),
('Boston', NULL, 30),
('Caraga', NULL, 30),
('Cateel', NULL, 30),
('Governor Generoso', NULL, 30),
('Lupon', NULL, 30),
('Manay', NULL, 30),
('San Isidro', NULL, 30),
('Tarragona', NULL, 30),
('Arteche', NULL, 31),
('Balangiga', NULL, 31),
('Balangkayan', NULL, 31),
('Borongan', NULL, 31),
('Can-avid', NULL, 31),
('Dolores', NULL, 31),
('General MacArthur', NULL, 31),
('Giporlos', NULL, 31),
('Guiuan', NULL, 31),
('Hernani', NULL, 31),
('Jipapad', NULL, 31),
('Lawaan', NULL, 31),
('Llorente', NULL, 31),
('Maslog', NULL, 31),
('Maydolong', NULL, 31),
('Mercedes', NULL, 31),
('Oras', NULL, 31),
('Quinapondan', NULL, 31),
('Salcedo', NULL, 31),
('San Julian', NULL, 31),
('San Policarpo', NULL, 31),
('Sulat', NULL, 31),
('Taft', NULL, 31),
('Buenavista', NULL, 32),
('Jordan', NULL, 32),
('Nueva Valencia', NULL, 32),
('San Lorenzo', NULL, 32),
('Sibunag', NULL, 32),
('Aguinaldo', NULL, 33),
('Alfonso Lista', NULL, 33),
('Asipulo', NULL, 33),
('Banaue', NULL, 33),
('Hingyon', NULL, 33),
('Hungduan', NULL, 33),
('Kiangan', NULL, 33),
('Lagawe', NULL, 33),
('Lamut', NULL, 33),
('Mayoyao', NULL, 33),
('Tinoc', NULL, 33),
('Batac City', NULL, 34),
('Laoag City', NULL, 34),
('Adams', NULL, 34),
('Bacarra', NULL, 34),
('Badoc', NULL, 34),
('Bangui', NULL, 34),
('Banna', NULL, 34),
('Burgos', NULL, 34),
('Carasi', NULL, 34),
('Currimao', NULL, 34),
('Dingras', NULL, 34),
('Dumalneg', NULL, 34),
('Marcos', NULL, 34),
('Nueva Era', NULL, 34),
('Pagudpud', NULL, 34),
('Paoay', NULL, 34),
('Pasuquin', NULL, 34),
('Piddig', NULL, 34),
('Pinili', NULL, 34),
('San Nicolas', NULL, 34),
('Sarrat', NULL, 34),
('Solsona', NULL, 34),
('Vintar', NULL, 34),
('Candon City', NULL, 35),
('Vigan City', NULL, 35),
('Alilem', NULL, 35),
('Banayoyo', NULL, 35),
('Bantay', NULL, 35),
('Burgos', NULL, 35),
('Cabugao', NULL, 35),
('Caoayan', NULL, 35),
('Cervantes', NULL, 35),
('Galimuyod', NULL, 35),
('Gregorio Del Pilar', NULL, 35),
('Lidlidda', NULL, 35),
('Magsingal', NULL, 35),
('Nagbukel', NULL, 35),
('Narvacan', NULL, 35),
('Quirino', NULL, 35),
('Salcedo', NULL, 35),
('San Emilio', NULL, 35),
('San Esteban', NULL, 35),
('San Ildefonso', NULL, 35),
('San Juan', NULL, 35),
('San Vicente', NULL, 35),
('Santa', NULL, 35),
('Santa Catalina', NULL, 35),
('Santa Cruz', NULL, 35),
('Santa Lucia', NULL, 35),
('Santa Maria', NULL, 35),
('Santiago', NULL, 35),
('Santo Domingo', NULL, 35),
('Sigay', NULL, 35),
('Sinait', NULL, 35),
('Sugpon', NULL, 35),
('Suyo', NULL, 35),
('Tagudin', NULL, 35),
('Iloilo City', NULL, 36),
('Passi City', NULL, 36),
('Ajuy', NULL, 36),
('Alimodian', NULL, 36),
('Anilao', NULL, 36),
('Badiangan', NULL, 36),
('Balasan', NULL, 36),
('Banate', NULL, 36),
('Barotac Nuevo', NULL, 36),
('Barotac Viejo', NULL, 36),
('Batad', NULL, 36),
('Bingawan', NULL, 36),
('Cabatuan', NULL, 36),
('Calinog', NULL, 36),
('Carles', NULL, 36),
('Concepcion', NULL, 36),
('Dingle', NULL, 36),
('Dueñas', NULL, 36),
('Dumangas', NULL, 36),
('Estancia', NULL, 36),
('Guimbal', NULL, 36),
('Igbaras', NULL, 36),
('Janiuay', NULL, 36),
('Lambunao', NULL, 36),
('Leganes', NULL, 36),
('Lemery', NULL, 36),
('Leon', NULL, 36),
('Maasin', NULL, 36),
('Miagao', NULL, 36),
('Mina', NULL, 36),
('New Lucena', NULL, 36),
('Oton', NULL, 36),
('Pavia', NULL, 36),
('Pototan', NULL, 36),
('San Dionisio', NULL, 36),
('San Enrique', NULL, 36),
('San Joaquin', NULL, 36),
('San Miguel', NULL, 36),
('San Rafael', NULL, 36),
('Santa Barbara', NULL, 36),
('Sara', NULL, 36),
('Tigbauan', NULL, 36),
('Tubungan', NULL, 36),
('Zarraga', NULL, 36),
('Cauayan City', NULL, 37),
('Santiago City', NULL, 37),
('Alicia', NULL, 37),
('Angadanan', NULL, 37),
('Aurora', NULL, 37),
('Benito Soliven', NULL, 37),
('Burgos', NULL, 37),
('Cabagan', NULL, 37),
('Cabatuan', NULL, 37),
('Cordon', NULL, 37),
('Delfin Albano', NULL, 37),
('Dinapigue', NULL, 37),
('Divilacan', NULL, 37),
('Echague', NULL, 37),
('Gamu', NULL, 37),
('Ilagan', NULL, 37),
('Jones', NULL, 37),
('Luna', NULL, 37),
('Maconacon', NULL, 37),
('Mallig', NULL, 37),
('Naguilian', NULL, 37),
('Palanan', NULL, 37),
('Quezon', NULL, 37),
('Quirino', NULL, 37),
('Ramon', NULL, 37),
('Reina Mercedes', NULL, 37),
('Roxas', NULL, 37),
('San Agustin', NULL, 37),
('San Guillermo', NULL, 37),
('San Isidro', NULL, 37),
('San Manuel', NULL, 37),
('San Mariano', NULL, 37),
('San Mateo', NULL, 37),
('San Pablo', NULL, 37),
('Santa Maria', NULL, 37),
('Santo Tomas', NULL, 37),
('Tumauini', NULL, 37),
('Tabuk', NULL, 38),
('Balbalan', NULL, 38),
('Lubuagan', NULL, 38),
('Pasil', NULL, 38),
('Pinukpuk', NULL, 38),
('Rizal', NULL, 38),
('Tanudan', NULL, 38),
('Tinglayan', NULL, 38),
('San Fernando City', NULL, 39),
('Agoo', NULL, 39),
('Aringay', NULL, 39),
('Bacnotan', NULL, 39),
('Bagulin', NULL, 39),
('Balaoan', NULL, 39),
('Bangar', NULL, 39),
('Bauang', NULL, 39),
('Burgos', NULL, 39),
('Caba', NULL, 39),
('Luna', NULL, 39),
('Naguilian', NULL, 39),
('Pugo', NULL, 39),
('Rosario', NULL, 39),
('San Gabriel', NULL, 39),
('San Juan', NULL, 39),
('Santo Tomas', NULL, 39),
('Santol', NULL, 39),
('Sudipen', NULL, 39),
('Tubao', NULL, 39),
('Biñan City', NULL, 40),
('Calamba City', NULL, 40),
('San Pablo City', NULL, 40),
('Santa Rosa City', NULL, 40),
('Alaminos', NULL, 40),
('Bay', NULL, 40),
('Cabuyao', NULL, 40),
('Calauan', NULL, 40),
('Cavinti', NULL, 40),
('Famy', NULL, 40),
('Kalayaan', NULL, 40),
('Liliw', NULL, 40),
('Los Baños', NULL, 40),
('Luisiana', NULL, 40),
('Lumban', NULL, 40),
('Mabitac', NULL, 40),
('Magdalena', NULL, 40),
('Majayjay', NULL, 40),
('Nagcarlan', NULL, 40),
('Paete', NULL, 40),
('Pagsanjan', NULL, 40),
('Pakil', NULL, 40),
('Pangil', NULL, 40),
('Pila', NULL, 40),
('Rizal', NULL, 40),
('San Pedro', NULL, 40),
('Santa Cruz', NULL, 40),
('Santa Maria', NULL, 40),
('Siniloan', NULL, 40),
('Victoria', NULL, 40),
('Iligan City', NULL, 41),
('Bacolod', NULL, 41),
('Baloi', NULL, 41),
('Baroy', NULL, 41),
('Kapatagan', NULL, 41),
('Kauswagan', NULL, 41),
('Kolambugan', NULL, 41),
('Lala', NULL, 41),
('Linamon', NULL, 41),
('Magsaysay', NULL, 41),
('Maigo', NULL, 41),
('Matungao', NULL, 41),
('Munai', NULL, 41),
('Nunungan', NULL, 41),
('Pantao Ragat', NULL, 41),
('Pantar', NULL, 41),
('Poona Piagapo', NULL, 41),
('Salvador', NULL, 41),
('Sapad', NULL, 41),
('Sultan Naga Dimaporo', NULL, 41),
('Tagoloan', NULL, 41),
('Tangcal', NULL, 41),
('Tubod', NULL, 41),
('Marawi City', NULL, 42),
('Bacolod-Kalawi', NULL, 42),
('Balabagan', NULL, 42),
('Balindong', NULL, 42),
('Bayang', NULL, 42),
('Binidayan', NULL, 42),
('Buadiposo-Buntong', NULL, 42),
('Bubong', NULL, 42),
('Bumbaran', NULL, 42),
('Butig', NULL, 42),
('Calanogas', NULL, 42),
('Ditsaan-Ramain', NULL, 42),
('Ganassi', NULL, 42),
('Kapai', NULL, 42),
('Kapatagan', NULL, 42),
('Lumba-Bayabao', NULL, 42),
('Lumbaca-Unayan', NULL, 42),
('Lumbatan', NULL, 42),
('Lumbayanague', NULL, 42),
('Madalum', NULL, 42),
('Madamba', NULL, 42),
('Maguing', NULL, 42),
('Malabang', NULL, 42),
('Marantao', NULL, 42),
('Marogong', NULL, 42),
('Masiu', NULL, 42),
('Mulondo', NULL, 42),
('Pagayawan', NULL, 42),
('Piagapo', NULL, 42),
('Poona Bayabao', NULL, 42),
('Pualas', NULL, 42),
('Saguiaran', NULL, 42),
('Sultan Dumalondong', NULL, 42),
('Picong', NULL, 42),
('Tagoloan II', NULL, 42),
('Tamparan', NULL, 42),
('Taraka', NULL, 42),
('Tubaran', NULL, 42),
('Tugaya', NULL, 42),
('Wao', NULL, 42),
('Ormoc City', NULL, 43),
('Tacloban City', NULL, 43),
('Abuyog', NULL, 43),
('Alangalang', NULL, 43),
('Albuera', NULL, 43),
('Babatngon', NULL, 43),
('Barugo', NULL, 43),
('Bato', NULL, 43),
('Baybay', NULL, 43),
('Burauen', NULL, 43),
('Calubian', NULL, 43),
('Capoocan', NULL, 43),
('Carigara', NULL, 43),
('Dagami', NULL, 43),
('Dulag', NULL, 43),
('Hilongos', NULL, 43),
('Hindang', NULL, 43),
('Inopacan', NULL, 43),
('Isabel', NULL, 43),
('Jaro', NULL, 43),
('Javier', NULL, 43),
('Julita', NULL, 43),
('Kananga', NULL, 43),
('La Paz', NULL, 43),
('Leyte', NULL, 43),
('Liloan', NULL, 43),
('MacArthur', NULL, 43),
('Mahaplag', NULL, 43),
('Matag-ob', NULL, 43),
('Matalom', NULL, 43),
('Mayorga', NULL, 43),
('Merida', NULL, 43),
('Palo', NULL, 43),
('Palompon', NULL, 43),
('Pastrana', NULL, 43),
('San Isidro', NULL, 43),
('San Miguel', NULL, 43),
('Santa Fe', NULL, 43),
('Sogod', NULL, 43),
('Tabango', NULL, 43),
('Tabontabon', NULL, 43),
('Tanauan', NULL, 43),
('Tolosa', NULL, 43),
('Tunga', NULL, 43),
('Villaba', NULL, 43),
('Cotabato City', NULL, 44),
('Ampatuan', NULL, 44),
('Barira', NULL, 44),
('Buldon', NULL, 44),
('Buluan', NULL, 44),
('Datu Abdullah Sangki', NULL, 44),
('Datu Anggal Midtimbang', NULL, 44),
('Datu Blah T. Sinsuat', NULL, 44),
('Datu Hoffer Ampatuan', NULL, 44),
('Datu Montawal', NULL, 44),
('Datu Odin Sinsuat', NULL, 44),
('Datu Paglas', NULL, 44),
('Datu Piang', NULL, 44),
('Datu Salibo', NULL, 44),
('Datu Saudi-Ampatuan', NULL, 44),
('Datu Unsay', NULL, 44),
('General Salipada K. Pendatun', NULL, 44),
('Guindulungan', NULL, 44),
('Kabuntalan', NULL, 44),
('Mamasapano', NULL, 44),
('Mangudadatu', NULL, 44),
('Matanog', NULL, 44),
('Northern Kabuntalan', NULL, 44),
('Pagalungan', NULL, 44),
('Paglat', NULL, 44),
('Pandag', NULL, 44),
('Parang', NULL, 44),
('Rajah Buayan', NULL, 44),
('Shariff Aguak', NULL, 44),
('Shariff Saydona Mustapha', NULL, 44),
('South Upi', NULL, 44),
('Sultan Kudarat', NULL, 44),
('Sultan Mastura', NULL, 44),
('Sultan sa Barongis', NULL, 44),
('Talayan', NULL, 44),
('Talitay', NULL, 44),
('Upi', NULL, 44),
('Boac', NULL, 45),
('Buenavista', NULL, 45),
('Gasan', NULL, 45),
('Mogpog', NULL, 45),
('Santa Cruz', NULL, 45),
('Torrijos', NULL, 45),
('Masbate City', NULL, 46),
('Aroroy', NULL, 46),
('Baleno', NULL, 46),
('Balud', NULL, 46),
('Batuan', NULL, 46),
('Cataingan', NULL, 46),
('Cawayan', NULL, 46),
('Claveria', NULL, 46),
('Dimasalang', NULL, 46),
('Esperanza', NULL, 46),
('Mandaon', NULL, 46),
('Milagros', NULL, 46),
('Mobo', NULL, 46),
('Monreal', NULL, 46),
('Palanas', NULL, 46),
('Pio V. Corpuz', NULL, 46),
('Placer', NULL, 46),
('San Fernando', NULL, 46),
('San Jacinto', NULL, 46),
('San Pascual', NULL, 46),
('Uson', NULL, 46),
('Caloocan City', NULL, 47),
('Las Piñas City', NULL, 47),
('Makati City', NULL, 47),
('Malabon City', NULL, 47),
('Mandaluyong City', NULL, 47),
('Manila', NULL, 47),
('Marikina City', NULL, 47),
('Muntinlupa City', NULL, 47),
('Navotas City', NULL, 47),
('Parañaque City', NULL, 47),
('Pasay City', NULL, 47),
('Pasig City', NULL, 47),
('Quezon City', NULL, 47),
('San Juan City', NULL, 47),
('Taguig City', NULL, 47),
('Valenzuela City', NULL, 47),
('Pateros', NULL, 47),
('Oroquieta City', NULL, 48),
('Ozamiz City', NULL, 48),
('Tangub City', NULL, 48),
('Aloran', NULL, 48),
('Baliangao', NULL, 48),
('Bonifacio', NULL, 48),
('Calamba', NULL, 48),
('Clarin', NULL, 48),
('Concepcion', NULL, 48),
('Don Victoriano Chiongbian', NULL, 48),
('Jimenez', NULL, 48),
('Lopez Jaena', NULL, 48),
('Panaon', NULL, 48),
('Plaridel', NULL, 48),
('Sapang Dalaga', NULL, 48),
('Sinacaban', NULL, 48),
('Tudela', NULL, 48),
('Cagayan de Oro', NULL, 49),
('Gingoog City', NULL, 49),
('Alubijid', NULL, 49),
('Balingasag', NULL, 49),
('Balingoan', NULL, 49),
('Binuangan', NULL, 49),
('Claveria', NULL, 49),
('El Salvador', NULL, 49),
('Gitagum', NULL, 49),
('Initao', NULL, 49),
('Jasaan', NULL, 49),
('Kinoguitan', NULL, 49),
('Lagonglong', NULL, 49),
('Laguindingan', NULL, 49),
('Libertad', NULL, 49),
('Lugait', NULL, 49),
('Magsaysay', NULL, 49),
('Manticao', NULL, 49),
('Medina', NULL, 49),
('Naawan', NULL, 49),
('Opol', NULL, 49),
('Salay', NULL, 49),
('Sugbongcogon', NULL, 49),
('Tagoloan', NULL, 49),
('Talisayan', NULL, 49),
('Villanueva', NULL, 49),
('Barlig', NULL, 50),
('Bauko', NULL, 50),
('Besao', NULL, 50),
('Bontoc', NULL, 50),
('Natonin', NULL, 50),
('Paracelis', NULL, 50),
('Sabangan', NULL, 50),
('Sadanga', NULL, 50),
('Sagada', NULL, 50),
('Tadian', NULL, 50),
('Bacolod City', NULL, 51),
('Bago City', NULL, 51),
('Cadiz City', NULL, 51),
('Escalante City', NULL, 51),
('Himamaylan City', NULL, 51),
('Kabankalan City', NULL, 51),
('La Carlota City', NULL, 51),
('Sagay City', NULL, 51),
('San Carlos City', NULL, 51),
('Silay City', NULL, 51),
('Sipalay City', NULL, 51),
('Talisay City', NULL, 51),
('Victorias City', NULL, 51),
('Binalbagan', NULL, 51),
('Calatrava', NULL, 51),
('Candoni', NULL, 51),
('Cauayan', NULL, 51),
('Enrique B. Magalona', NULL, 51),
('Hinigaran', NULL, 51),
('Hinoba-an', NULL, 51),
('Ilog', NULL, 51),
('Isabela', NULL, 51),
('La Castellana', NULL, 51),
('Manapla', NULL, 51),
('Moises Padilla', NULL, 51),
('Murcia', NULL, 51),
('Pontevedra', NULL, 51),
('Pulupandan', NULL, 51),
('Salvador Benedicto', NULL, 51),
('San Enrique', NULL, 51),
('Toboso', NULL, 51),
('Valladolid', NULL, 51),
('Bais City', NULL, 52),
('Bayawan City', NULL, 52),
('Canlaon City', NULL, 52),
('Guihulngan City', NULL, 52),
('Dumaguete City', NULL, 52),
('Tanjay City', NULL, 52),
('Amlan', NULL, 52),
('Ayungon', NULL, 52),
('Bacong', NULL, 52),
('Basay', NULL, 52),
('Bindoy', NULL, 52),
('Dauin', NULL, 52),
('Jimalalud', NULL, 52),
('La Libertad', NULL, 52),
('Mabinay', NULL, 52),
('Manjuyod', NULL, 52),
('Pamplona', NULL, 52),
('San Jose', NULL, 52),
('Santa Catalina', NULL, 52),
('Siaton', NULL, 52),
('Sibulan', NULL, 52),
('Tayasan', NULL, 52),
('Valencia', NULL, 52),
('Vallehermoso', NULL, 52),
('Zamboanguita', NULL, 52),
('Allen', NULL, 53),
('Biri', NULL, 53),
('Bobon', NULL, 53),
('Capul', NULL, 53),
('Catarman', NULL, 53),
('Catubig', NULL, 53),
('Gamay', NULL, 53),
('Laoang', NULL, 53),
('Lapinig', NULL, 53),
('Las Navas', NULL, 53),
('Lavezares', NULL, 53),
('Lope de Vega', NULL, 53),
('Mapanas', NULL, 53),
('Mondragon', NULL, 53),
('Palapag', NULL, 53),
('Pambujan', NULL, 53),
('Rosario', NULL, 53),
('San Antonio', NULL, 53),
('San Isidro', NULL, 53),
('San Jose', NULL, 53),
('San Roque', NULL, 53),
('San Vicente', NULL, 53),
('Silvino Lobos', NULL, 53),
('Victoria', NULL, 53),
('Cabanatuan City', NULL, 54),
('Gapan City', NULL, 54),
('Science City of Muñoz', NULL, 54),
('Palayan City', NULL, 54),
('San Jose City', NULL, 54),
('Aliaga', NULL, 54),
('Bongabon', NULL, 54),
('Cabiao', NULL, 54),
('Carranglan', NULL, 54),
('Cuyapo', NULL, 54),
('Gabaldon', NULL, 54),
('General Mamerto Natividad', NULL, 54),
('General Tinio', NULL, 54),
('Guimba', NULL, 54),
('Jaen', NULL, 54),
('Laur', NULL, 54),
('Licab', NULL, 54),
('Llanera', NULL, 54),
('Lupao', NULL, 54),
('Nampicuan', NULL, 54),
('Pantabangan', NULL, 54),
('Peñaranda', NULL, 54),
('Quezon', NULL, 54),
('Rizal', NULL, 54),
('San Antonio', NULL, 54),
('San Isidro', NULL, 54),
('San Leonardo', NULL, 54),
('Santa Rosa', NULL, 54),
('Santo Domingo', NULL, 54),
('Talavera', NULL, 54),
('Talugtug', NULL, 54),
('Zaragoza', NULL, 54),
('Alfonso Castaneda', NULL, 55),
('Ambaguio', NULL, 55),
('Aritao', NULL, 55),
('Bagabag', NULL, 55),
('Bambang', NULL, 55),
('Bayombong', NULL, 55),
('Diadi', NULL, 55),
('Dupax del Norte', NULL, 55),
('Dupax del Sur', NULL, 55),
('Kasibu', NULL, 55),
('Kayapa', NULL, 55),
('Quezon', NULL, 55),
('Santa Fe', NULL, 55),
('Solano', NULL, 55),
('Villaverde', NULL, 55),
('Abra de Ilog', NULL, 56),
('Calintaan', NULL, 56),
('Looc', NULL, 56),
('Lubang', NULL, 56),
('Magsaysay', NULL, 56),
('Mamburao', NULL, 56),
('Paluan', NULL, 56),
('Rizal', NULL, 56),
('Sablayan', NULL, 56),
('San Jose', NULL, 56),
('Santa Cruz', NULL, 56),
('Calapan City', NULL, 57),
('Baco', NULL, 57),
('Bansud', NULL, 57),
('Bongabong', NULL, 57),
('Bulalacao', NULL, 57),
('Gloria', NULL, 57),
('Mansalay', NULL, 57),
('Naujan', NULL, 57),
('Pinamalayan', NULL, 57),
('Pola', NULL, 57),
('Puerto Galera', NULL, 57),
('Roxas', NULL, 57),
('San Teodoro', NULL, 57),
('Socorro', NULL, 57),
('Victoria', NULL, 57),
('Puerto Princesa City', NULL, 58),
('Aborlan', NULL, 58),
('Agutaya', NULL, 58),
('Araceli', NULL, 58),
('Balabac', NULL, 58),
('Bataraza', NULL, 58),
('Brooke\'s Point', NULL, 58),
('Busuanga', NULL, 58),
('Cagayancillo', NULL, 58),
('Coron', NULL, 58),
('Culion', NULL, 58),
('Cuyo', NULL, 58),
('Dumaran', NULL, 58),
('El Nido', NULL, 58),
('Kalayaan', NULL, 58),
('Linapacan', NULL, 58),
('Magsaysay', NULL, 58),
('Narra', NULL, 58),
('Quezon', NULL, 58),
('Rizal', NULL, 58),
('Roxas', NULL, 58),
('San Vicente', NULL, 58),
('Sofronio Española', NULL, 58),
('Taytay', NULL, 58),
('Angeles City', NULL, 59),
('City of San Fernando', NULL, 59),
('Apalit', NULL, 59),
('Arayat', NULL, 59),
('Bacolor', NULL, 59),
('Candaba', NULL, 59),
('Floridablanca', NULL, 59),
('Guagua', NULL, 59),
('Lubao', NULL, 59),
('Mabalacat', NULL, 59),
('Macabebe', NULL, 59),
('Magalang', NULL, 59),
('Masantol', NULL, 59),
('Mexico', NULL, 59),
('Minalin', NULL, 59),
('Porac', NULL, 59),
('San Luis', NULL, 59),
('San Simon', NULL, 59),
('Santa Ana', NULL, 59),
('Santa Rita', NULL, 59),
('Santo Tomas', NULL, 59),
('Sasmuan', NULL, 59),
('Alaminos City', NULL, 60),
('Dagupan City', NULL, 60),
('San Carlos City', NULL, 60),
('Urdaneta City', NULL, 60),
('Agno', NULL, 60),
('Aguilar', NULL, 60),
('Alcala', NULL, 60),
('Anda', NULL, 60),
('Asingan', NULL, 60),
('Balungao', NULL, 60),
('Bani', NULL, 60),
('Basista', NULL, 60),
('Bautista', NULL, 60),
('Bayambang', NULL, 60),
('Binalonan', NULL, 60),
('Binmaley', NULL, 60),
('Bolinao', NULL, 60),
('Bugallon', NULL, 60),
('Burgos', NULL, 60),
('Calasiao', NULL, 60),
('Dasol', NULL, 60),
('Infanta', NULL, 60),
('Labrador', NULL, 60),
('Laoac', NULL, 60),
('Lingayen', NULL, 60),
('Mabini', NULL, 60),
('Malasiqui', NULL, 60),
('Manaoag', NULL, 60),
('Mangaldan', NULL, 60),
('Mangatarem', NULL, 60),
('Mapandan', NULL, 60),
('Natividad', NULL, 60),
('Pozzorubio', NULL, 60),
('Rosales', NULL, 60),
('San Fabian', NULL, 60),
('San Jacinto', NULL, 60),
('San Manuel', NULL, 60),
('San Nicolas', NULL, 60),
('San Quintin', NULL, 60),
('Santa Barbara', NULL, 60),
('Santa Maria', NULL, 60),
('Santo Tomas', NULL, 60),
('Sison', NULL, 60),
('Sual', NULL, 60),
('Tayug', NULL, 60),
('Umingan', NULL, 60),
('Urbiztondo', NULL, 60),
('Villasis', NULL, 60),
('Lucena City', NULL, 61),
('Tayabas City', NULL, 61),
('Agdangan', NULL, 61),
('Alabat', NULL, 61),
('Atimonan', NULL, 61),
('Buenavista', NULL, 61),
('Burdeos', NULL, 61),
('Calauag', NULL, 61),
('Candelaria', NULL, 61),
('Catanauan', NULL, 61),
('Dolores', NULL, 61),
('General Luna', NULL, 61),
('General Nakar', NULL, 61),
('Guinayangan', NULL, 61),
('Gumaca', NULL, 61),
('Infanta', NULL, 61),
('Jomalig', NULL, 61),
('Lopez', NULL, 61),
('Lucban', NULL, 61),
('Macalelon', NULL, 61),
('Mauban', NULL, 61),
('Mulanay', NULL, 61),
('Padre Burgos', NULL, 61),
('Pagbilao', NULL, 61),
('Panukulan', NULL, 61),
('Patnanungan', NULL, 61),
('Perez', NULL, 61),
('Pitogo', NULL, 61),
('Plaridel', NULL, 61),
('Polillo', NULL, 61),
('Quezon', NULL, 61),
('Real', NULL, 61),
('Sampaloc', NULL, 61),
('San Andres', NULL, 61),
('San Antonio', NULL, 61),
('San Francisco', NULL, 61),
('San Narciso', NULL, 61),
('Sariaya', NULL, 61),
('Tagkawayan', NULL, 61),
('Tiaong', NULL, 61),
('Unisan', NULL, 61),
('Aglipay', NULL, 62),
('Cabarroguis', NULL, 62),
('Diffun', NULL, 62),
('Maddela', NULL, 62),
('Nagtipunan', NULL, 62),
('Saguday', NULL, 62),
('Antipolo City', NULL, 63),
('Angono', NULL, 63),
('Baras', NULL, 63),
('Binangonan', NULL, 63),
('Cainta', NULL, 63),
('Cardona', NULL, 63),
('Jalajala', NULL, 63),
('Morong', NULL, 63),
('Pililla', NULL, 63),
('Rodriguez', NULL, 63),
('San Mateo', NULL, 63),
('Tanay', NULL, 63),
('Taytay', NULL, 63),
('Teresa', NULL, 63),
('Alcantara', NULL, 64),
('Banton', NULL, 64),
('Cajidiocan', NULL, 64),
('Calatrava', NULL, 64),
('Concepcion', NULL, 64),
('Corcuera', NULL, 64),
('Ferrol', NULL, 64),
('Looc', NULL, 64),
('Magdiwang', NULL, 64),
('Odiongan', NULL, 64),
('Romblon', NULL, 64),
('San Agustin', NULL, 64),
('San Andres', NULL, 64),
('San Fernando', NULL, 64),
('San Jose', NULL, 64),
('Santa Fe', NULL, 64),
('Santa Maria', NULL, 64),
('Calbayog City', NULL, 65),
('Catbalogan City', NULL, 65),
('Almagro', NULL, 65),
('Basey', NULL, 65),
('Calbiga', NULL, 65),
('Daram', NULL, 65),
('Gandara', NULL, 65),
('Hinabangan', NULL, 65),
('Jiabong', NULL, 65),
('Marabut', NULL, 65),
('Matuguinao', NULL, 65),
('Motiong', NULL, 65),
('Pagsanghan', NULL, 65),
('Paranas', NULL, 65),
('Pinabacdao', NULL, 65),
('San Jorge', NULL, 65),
('San Jose De Buan', NULL, 65),
('San Sebastian', NULL, 65),
('Santa Margarita', NULL, 65),
('Santa Rita', NULL, 65),
('Santo Niño', NULL, 65),
('Tagapul-an', NULL, 65),
('Talalora', NULL, 65),
('Tarangnan', NULL, 65),
('Villareal', NULL, 65),
('Zumarraga', NULL, 65),
('Alabel', NULL, 66),
('Glan', NULL, 66),
('Kiamba', NULL, 66),
('Maasim', NULL, 66),
('Maitum', NULL, 66),
('Malapatan', NULL, 66),
('Malungon', NULL, 66),
('Enrique Villanueva', NULL, 67),
('Larena', NULL, 67),
('Lazi', NULL, 67),
('Maria', NULL, 67),
('San Juan', NULL, 67),
('Siquijor', NULL, 67),
('Sorsogon City', NULL, 68),
('Barcelona', NULL, 68),
('Bulan', NULL, 68),
('Bulusan', NULL, 68),
('Casiguran', NULL, 68),
('Castilla', NULL, 68),
('Donsol', NULL, 68),
('Gubat', NULL, 68),
('Irosin', NULL, 68),
('Juban', NULL, 68),
('Magallanes', NULL, 68),
('Matnog', NULL, 68),
('Pilar', NULL, 68),
('Prieto Diaz', NULL, 68),
('Santa Magdalena', NULL, 68),
('General Santos City', NULL, 69),
('Koronadal City', NULL, 69),
('Banga', NULL, 69),
('Lake Sebu', NULL, 69),
('Norala', NULL, 69),
('Polomolok', NULL, 69),
('Santo Niño', NULL, 69),
('Surallah', NULL, 69),
('T\'boli', NULL, 69),
('Tampakan', NULL, 69),
('Tantangan', NULL, 69),
('Tupi', NULL, 69),
('Maasin City', NULL, 70),
('Anahawan', NULL, 70),
('Bontoc', NULL, 70),
('Hinunangan', NULL, 70),
('Hinundayan', NULL, 70),
('Libagon', NULL, 70),
('Liloan', NULL, 70),
('Limasawa', NULL, 70),
('Macrohon', NULL, 70),
('Malitbog', NULL, 70),
('Padre Burgos', NULL, 70),
('Pintuyan', NULL, 70),
('Saint Bernard', NULL, 70),
('San Francisco', NULL, 70),
('San Juan', NULL, 70),
('San Ricardo', NULL, 70),
('Silago', NULL, 70),
('Sogod', NULL, 70),
('Tomas Oppus', NULL, 70),
('Tacurong City', NULL, 71),
('Bagumbayan', NULL, 71),
('Columbio', NULL, 71),
('Esperanza', NULL, 71),
('Isulan', NULL, 71),
('Kalamansig', NULL, 71),
('Lambayong', NULL, 71),
('Lebak', NULL, 71),
('Lutayan', NULL, 71),
('Palimbang', NULL, 71),
('President Quirino', NULL, 71),
('Senator Ninoy Aquino', NULL, 71),
('Banguingui', NULL, 72),
('Hadji Panglima Tahil', NULL, 72),
('Indanan', NULL, 72),
('Jolo', NULL, 72),
('Kalingalan Caluang', NULL, 72),
('Lugus', NULL, 72),
('Luuk', NULL, 72),
('Maimbung', NULL, 72),
('Old Panamao', NULL, 72),
('Omar', NULL, 72),
('Pandami', NULL, 72),
('Panglima Estino', NULL, 72),
('Pangutaran', NULL, 72),
('Parang', NULL, 72),
('Pata', NULL, 72),
('Patikul', NULL, 72),
('Siasi', NULL, 72),
('Talipao', NULL, 72),
('Tapul', NULL, 72),
('Surigao City', NULL, 73),
('Alegria', NULL, 73),
('Bacuag', NULL, 73),
('Basilisa', NULL, 73),
('Burgos', NULL, 73),
('Cagdianao', NULL, 73),
('Claver', NULL, 73),
('Dapa', NULL, 73),
('Del Carmen', NULL, 73),
('Dinagat', NULL, 73),
('General Luna', NULL, 73),
('Gigaquit', NULL, 73),
('Libjo', NULL, 73),
('Loreto', NULL, 73),
('Mainit', NULL, 73),
('Malimono', NULL, 73),
('Pilar', NULL, 73),
('Placer', NULL, 73),
('San Benito', NULL, 73),
('San Francisco', NULL, 73),
('San Isidro', NULL, 73),
('San Jose', NULL, 73),
('Santa Monica', NULL, 73),
('Sison', NULL, 73),
('Socorro', NULL, 73),
('Tagana-an', NULL, 73),
('Tubajon', NULL, 73),
('Tubod', NULL, 73),
('Bislig City', NULL, 74),
('Tandag City', NULL, 74),
('Barobo', NULL, 74),
('Bayabas', NULL, 74),
('Cagwait', NULL, 74),
('Cantilan', NULL, 74),
('Carmen', NULL, 74),
('Carrascal', NULL, 74),
('Cortes', NULL, 74),
('Hinatuan', NULL, 74),
('Lanuza', NULL, 74),
('Lianga', NULL, 74),
('Lingig', NULL, 74),
('Madrid', NULL, 74),
('Marihatag', NULL, 74),
('San Agustin', NULL, 74),
('San Miguel', NULL, 74),
('Tagbina', NULL, 74),
('Tago', NULL, 74),
('Tarlac City', NULL, 75),
('Anao', NULL, 75),
('Bamban', NULL, 75),
('Camiling', NULL, 75),
('Capas', NULL, 75),
('Concepcion', NULL, 75),
('Gerona', NULL, 75),
('La Paz', NULL, 75),
('Mayantoc', NULL, 75),
('Moncada', NULL, 75),
('Paniqui', NULL, 75),
('Pura', NULL, 75),
('Ramos', NULL, 75),
('San Clemente', NULL, 75),
('San Jose', NULL, 75),
('San Manuel', NULL, 75),
('Santa Ignacia', NULL, 75),
('Victoria', NULL, 75),
('Bongao', NULL, 76),
('Languyan', NULL, 76),
('Mapun', NULL, 76),
('Panglima Sugala', NULL, 76),
('Sapa-Sapa', NULL, 76),
('Sibutu', NULL, 76),
('Simunul', NULL, 76),
('Sitangkai', NULL, 76),
('South Ubian', NULL, 76),
('Tandubas', NULL, 76),
('Turtle Islands', NULL, 76),
('Olongapo City', NULL, 77),
('Botolan', NULL, 77),
('Cabangan', NULL, 77),
('Candelaria', NULL, 77),
('Castillejos', NULL, 77),
('Iba', NULL, 77),
('Masinloc', NULL, 77),
('Palauig', NULL, 77),
('San Antonio', NULL, 77),
('San Felipe', NULL, 77),
('San Marcelino', NULL, 77),
('San Narciso', NULL, 77),
('Santa Cruz', NULL, 77),
('Subic', NULL, 77),
('Dapitan City', NULL, 78),
('Dipolog City', NULL, 78),
('Bacungan', NULL, 78),
('Baliguian', NULL, 78),
('Godod', NULL, 78),
('Gutalac', NULL, 78),
('Jose Dalman', NULL, 78),
('Kalawit', NULL, 78),
('Katipunan', NULL, 78),
('La Libertad', NULL, 78),
('Labason', NULL, 78),
('Liloy', NULL, 78),
('Manukan', NULL, 78),
('Mutia', NULL, 78),
('Piñan', NULL, 78),
('Polanco', NULL, 78),
('President Manuel A. Roxas', NULL, 78),
('Rizal', NULL, 78),
('Salug', NULL, 78),
('Sergio Osmeña Sr.', NULL, 78),
('Siayan', NULL, 78),
('Sibuco', NULL, 78),
('Sibutad', NULL, 78),
('Sindangan', NULL, 78),
('Siocon', NULL, 78),
('Sirawai', NULL, 78),
('Tampilisan', NULL, 78),
('Pagadian City', NULL, 79),
('Zamboanga City', NULL, 79),
('Aurora', NULL, 79),
('Bayog', NULL, 79),
('Dimataling', NULL, 79),
('Dinas', NULL, 79),
('Dumalinao', NULL, 79),
('Dumingag', NULL, 79),
('Guipos', NULL, 79),
('Josefina', NULL, 79),
('Kumalarang', NULL, 79),
('Labangan', NULL, 79),
('Lakewood', NULL, 79),
('Lapuyan', NULL, 79),
('Mahayag', NULL, 79),
('Margosatubig', NULL, 79),
('Midsalip', NULL, 79),
('Molave', NULL, 79),
('Pitogo', NULL, 79),
('Ramon Magsaysay', NULL, 79),
('San Miguel', NULL, 79),
('San Pablo', NULL, 79),
('Sominot', NULL, 79),
('Tabina', NULL, 79),
('Tambulig', NULL, 79),
('Tigbao', NULL, 79),
('Tukuran', NULL, 79),
('Vincenzo A. Sagun', NULL, 79),
('Alicia', NULL, 80),
('Buug', NULL, 80),
('Diplahan', NULL, 80),
('Imelda', NULL, 80),
('Ipil', NULL, 80),
('Kabasalan', NULL, 80),
('Mabuhay', NULL, 80),
('Malangas', NULL, 80),
('Naga', NULL, 80),
('Olutanga', NULL, 80),
('Payao', NULL, 80),
('Roseller Lim', NULL, 80),
('Siay', NULL, 80),
('Talusan', NULL, 80),
('Titay', NULL, 80),
('Tungawan', NULL, 80);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(10) UNSIGNED NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `search_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `page`, `title`, `description`, `created_at`, `updated_at`, `user_id`, `meta_title`, `meta_description`, `search_keywords`) VALUES
(1, 'Terms', 'Terms and Conditions', '<p><strong>Terms and Conditions</strong></p>\r\n\r\n<p>Personal Information</p>\r\n\r\n<p>GV SOLUTIONS is the licensed owner of the brand GV Mart and the website GV Mart (&rdquo;The Site&rdquo;). GV SOLUTIONS respects your privacy. This Privacy Policy provides succinctly the manner your data is collected and used by GV SOLUTIONS on the Site. As a visitor to the Site/ Customer you are advised to please read the Privacy Policy carefully. By accessing the services provided by the Site you agree to the collection and use of your data by GV SOLUTIONS in the manner provided in this Privacy Policy.</p>\r\n\r\n<p>Services overview</p>\r\n\r\n<p>As part of the registration process on the Site, GV SOLUTIONS may collect the following personally identifiable information about you: Name including first and last name, alternate email address, mobile phone number and contact details, Postal code, Demographic profile (like your age, gender, occupation, education, address etc.) and information about the pages on the site you visit/access, the links you click on the site, the number of times you access the page and any such browsing information.</p>\r\n\r\n<p>Eligibility</p>\r\n\r\n<p>Services of the Site would be available to only select geographies in India. Persons who are &quot;incompetent to contract&quot; within the meaning of the Indian Contract Act, 1872 including un-discharged insolvents etc. are not eligible to use the Site. If you are a minor i.e. under the age of 18 years but at least 13 years of age you may use the Site only under the supervision of a parent or legal guardian who agrees to be bound by these Terms of Use. If your age is below 18 years your parents or legal guardians can transact on behalf of you if they are registered users. You are prohibited from purchasing any material which is for adult consumption and the sale of which to minors is prohibited</p>\r\n\r\n<p>Account &amp; Registration Obligations</p>\r\n\r\n<p>All shoppers have to register and login for placing orders on the Site. You have to keep your account and registration details current and correct for communications related to your purchases from the site. By agreeing to the terms and conditions, the shopper agrees to receive promotional communication and newsletters upon registration. The customer can opt out by contacting the customer service.&nbsp;</p>\r\n\r\n<p>Pricing</p>\r\n\r\n<p>All the products listed on the Site will be sold at MRP unless otherwise specified. The prices mentioned at the time of ordering will be the prices charged on the date of the delivery. Although prices of most of the products do not fluctuate on a daily basis but some of the commodities and fresh food prices do change on a daily basis. In case the prices are higher or lower on the date of delivery not additional charges will be collected or refunded as the case may be at the time of the delivery of the order.</p>\r\n\r\n<p>Cancellation by Site / Customer</p>\r\n\r\n<p>You as a customer can cancel your order anytime up to the cut-off time of the slot for which you have placed an order by calling our customer service. In such a case we will refund any payments already made by you for the order. If we suspect any fraudulent transaction by any customer or any transaction which defies the terms &amp; conditions of using the website, we at our sole discretion could cancel such orders. We will maintain a negative list of all fraudulent transactions and customers and would deny access to them or cancel any orders placed by them.</p>\r\n\r\n<p>Return &amp; Refunds</p>\r\n\r\n<p>We have a &quot;no questions asked return and refund policy&quot; which entitles all our members to return the product at the time of delivery if due to some reason they are not satisfied with the quality or freshness of the product. We will take the returned product back with us and issue a credit note for the value of the return products which will be credited to your account on the Site. This can be used to pay your subsequent shopping bills.</p>\r\n\r\n<p>You Agree and Confirm</p>\r\n\r\n<ol>\r\n	<li>That in the event that a non-delivery occurs on account of a mistake by you (i.e. wrong name or address or any other wrong information) any extra cost incurred by GV SOLUTIONS for redelivery shall be claimed from you.</li>\r\n	<li>That you will use the services provided by the Site, its affiliates, consultants and contracted companies, for lawful purposes only and comply with all applicable laws and regulations while using and transacting on the Site.</li>\r\n	<li>You will provide authentic and true information in all instances where such information is requested of you. GV SOLUTIONS reserves the right to confirm and validate the information and other details provided by you at any point of time. If upon confirmation your details are found not to be true (wholly or partly), it has the right in its sole discretion to reject the registration and debar you from using the Services and / or other affiliated websites without prior intimation whatsoever.</li>\r\n	<li>You authorise GV SOLUTIONS to contact you for any transactional purposes related to your order/account.</li>\r\n	<li>That you are accessing the services available on this Site and transacting at your sole risk and are using your best and prudent judgment before entering into any transaction through this Site.</li>\r\n	<li>That the address at which delivery of the product ordered by you is to be made will be correct and proper in all respects.</li>\r\n	<li>That before placing an order you will check the product description carefully. By placing an order for a product you agree to be bound by the conditions of sale included in the item&#39;s description.</li>\r\n</ol>\r\n\r\n<p>You may not use the Site for any of the following purposes:</p>\r\n\r\n<ol>\r\n	<li>Disseminating any unlawful, harassing, libellous, abusive, threatening, harmful, vulgar, obscene, or otherwise objectionable material.</li>\r\n	<li>Transmitting material that encourages conduct that constitutes a criminal offence or results in civil liability or otherwise breaches any relevant laws, regulations or code of practice.</li>\r\n	<li>Gaining unauthorized access to other computer systems.</li>\r\n	<li>Interfering with any other person&#39;s use or enjoyment of the Site.</li>\r\n	<li>Breaching any applicable laws;</li>\r\n	<li>Interfering or disrupting networks or web sites connected to the Site.</li>\r\n	<li>Making, transmitting or storing electronic copies of materials protected by copyright without the permission of the owner.</li>\r\n</ol>\r\n\r\n<p>We have made every effort to display the colours of our products that appear on the Website as accurately as possible. However, as the actual colours you see will depend on your monitor, we cannot guarantee that your monitor&#39;s display of any colour will be accurate.</p>\r\n\r\n<p>Modification of Terms &amp; Conditions of Service</p>\r\n\r\n<p>GV SOLUTIONS may at any time modify the Terms &amp; Conditions of Use of the Website without any prior notification to you. You can access the latest version of these Terms &amp; Conditions at any given time on the Site. You should regularly review the Terms &amp; Conditions on the Site. In the event the modified Terms &amp; Conditions is not acceptable to you, you should discontinue using the Service. However, if you continue to use the Service you shall be deemed to have agreed to accept and abide by the modified Terms &amp; Conditions of Use of this Site.</p>\r\n\r\n<p>Governing Law and Jurisdiction</p>\r\n\r\n<p>This User Agreement shall be construed in accordance with the applicable laws of India. The Courts at Ghaziabad, Uttar Pradesh shall have exclusive jurisdiction in any proceedings arising out of this agreement. Any dispute or difference either in interpretation or otherwise, of any terms of this User Agreement between the parties hereto, the same shall be referred to an independent arbitrator who will be appointed by GV SOLUTIONS and his decision shall be final and binding on the parties hereto. The above arbitration shall be in accordance with the Arbitration and Conciliation Act, 1996 as amended from time to time. The arbitration shall be held in Ghaziabad, Uttar Pradesh.</p>\r\n\r\n<p>Indemnity</p>\r\n\r\n<p>You agree to defend, indemnify and hold harmless GV SOLUTIONS, its employees, directors, officers, agents and their successors and assigns from and against any and all claims, liabilities, damages, losses, costs and expenses, including attorney&#39;s fees, caused by or arising out of claims based upon your actions or inactions, which may result in any loss or liability to GV SOLUTIONS or any third party including but not limited to breach of any warranties, representations or undertakings or in relation to the non-fulfilment of any of your obligations under this User Agreement or arising out of the your violation of any applicable laws, regulations including but not limited to Intellectual Property Rights, payment of statutory dues and taxes, claim of libel, defamation, violation of rights of privacy or publicity, loss of service by other subscribers and infringement of intellectual property or other rights. This clause shall survive the expiry or termination of this User Agreement.</p>\r\n\r\n<p>Termination</p>\r\n\r\n<p>This User Agreement is effective unless and until terminated by either you or GV SOLUTIONS. You may terminate this User Agreement at any time, provided that you discontinue any further use of this Site. GV SOLUTIONS may terminate this User Agreement at any time and may do so immediately without notice, and accordingly deny you access to the Site, Such termination will be without any liability to GV SOLUTIONS. Upon any termination of the User Agreement by either you or GV SOLUTIONS, you must promptly destroy all materials downloaded or otherwise obtained from this Site, as well as all copies of such materials, whether made under the User Agreement or otherwise. GV SOLUTIONS&#39;s right to any Comments shall survive any termination of this User Agreement. Any such termination of the User Agreement shall not cancel your obligation to pay for the product already ordered from the Website or affect any liability that may have arisen under the User Agreement.</p>', '2020-06-08 00:39:46', '2020-10-16 08:03:22', 1, 'tnc', NULL, NULL),
(2, 'Privacy', 'Privacy Policy', '<p><strong>Terms and Conditions</strong></p>\r\n\r\n<p>Personal Information</p>\r\n\r\n<p>GV SOLUTIONS is the licensed owner of the brand GV Mart and the website GV Mart (&rdquo;The Site&rdquo;). GV SOLUTIONS respects your privacy. This Privacy Policy provides succinctly the manner your data is collected and used by GV SOLUTIONS on the Site. As a visitor to the Site/ Customer you are advised to please read the Privacy Policy carefully. By accessing the services provided by the Site you agree to the collection and use of your data by GV SOLUTIONS in the manner provided in this Privacy Policy.</p>\r\n\r\n<p>Services overview</p>\r\n\r\n<p>As part of the registration process on the Site, GV SOLUTIONS may collect the following personally identifiable information about you: Name including first and last name, alternate email address, mobile phone number and contact details, Postal code, Demographic profile (like your age, gender, occupation, education, address etc.) and information about the pages on the site you visit/access, the links you click on the site, the number of times you access the page and any such browsing information.</p>\r\n\r\n<p>Eligibility</p>\r\n\r\n<p>Services of the Site would be available to only select geographies in India. Persons who are &quot;incompetent to contract&quot; within the meaning of the Indian Contract Act, 1872 including un-discharged insolvents etc. are not eligible to use the Site. If you are a minor i.e. under the age of 18 years but at least 13 years of age you may use the Site only under the supervision of a parent or legal guardian who agrees to be bound by these Terms of Use. If your age is below 18 years your parents or legal guardians can transact on behalf of you if they are registered users. You are prohibited from purchasing any material which is for adult consumption and the sale of which to minors is prohibited</p>\r\n\r\n<p>Account &amp; Registration Obligations</p>\r\n\r\n<p>All shoppers have to register and login for placing orders on the Site. You have to keep your account and registration details current and correct for communications related to your purchases from the site. By agreeing to the terms and conditions, the shopper agrees to receive promotional communication and newsletters upon registration. The customer can opt out by contacting the customer service.&nbsp;</p>\r\n\r\n<p>Pricing</p>\r\n\r\n<p>All the products listed on the Site will be sold at MRP unless otherwise specified. The prices mentioned at the time of ordering will be the prices charged on the date of the delivery. Although prices of most of the products do not fluctuate on a daily basis but some of the commodities and fresh food prices do change on a daily basis. In case the prices are higher or lower on the date of delivery not additional charges will be collected or refunded as the case may be at the time of the delivery of the order.</p>\r\n\r\n<p>Cancellation by Site / Customer</p>\r\n\r\n<p>You as a customer can cancel your order anytime up to the cut-off time of the slot for which you have placed an order by calling our customer service. In such a case we will refund any payments already made by you for the order. If we suspect any fraudulent transaction by any customer or any transaction which defies the terms &amp; conditions of using the website, we at our sole discretion could cancel such orders. We will maintain a negative list of all fraudulent transactions and customers and would deny access to them or cancel any orders placed by them.</p>\r\n\r\n<p>Return &amp; Refunds</p>\r\n\r\n<p>We have a &quot;no questions asked return and refund policy&quot; which entitles all our members to return the product at the time of delivery if due to some reason they are not satisfied with the quality or freshness of the product. We will take the returned product back with us and issue a credit note for the value of the return products which will be credited to your account on the Site. This can be used to pay your subsequent shopping bills.</p>\r\n\r\n<p>You Agree and Confirm</p>\r\n\r\n<ol>\r\n	<li>That in the event that a non-delivery occurs on account of a mistake by you (i.e. wrong name or address or any other wrong information) any extra cost incurred by GV SOLUTIONS for redelivery shall be claimed from you.</li>\r\n	<li>That you will use the services provided by the Site, its affiliates, consultants and contracted companies, for lawful purposes only and comply with all applicable laws and regulations while using and transacting on the Site.</li>\r\n	<li>You will provide authentic and true information in all instances where such information is requested of you. GV SOLUTIONS reserves the right to confirm and validate the information and other details provided by you at any point of time. If upon confirmation your details are found not to be true (wholly or partly), it has the right in its sole discretion to reject the registration and debar you from using the Services and / or other affiliated websites without prior intimation whatsoever.</li>\r\n	<li>You authorise GV SOLUTIONS to contact you for any transactional purposes related to your order/account.</li>\r\n	<li>That you are accessing the services available on this Site and transacting at your sole risk and are using your best and prudent judgment before entering into any transaction through this Site.</li>\r\n	<li>That the address at which delivery of the product ordered by you is to be made will be correct and proper in all respects.</li>\r\n	<li>That before placing an order you will check the product description carefully. By placing an order for a product you agree to be bound by the conditions of sale included in the item&#39;s description.</li>\r\n</ol>\r\n\r\n<p>You may not use the Site for any of the following purposes:</p>\r\n\r\n<ol>\r\n	<li>Disseminating any unlawful, harassing, libellous, abusive, threatening, harmful, vulgar, obscene, or otherwise objectionable material.</li>\r\n	<li>Transmitting material that encourages conduct that constitutes a criminal offence or results in civil liability or otherwise breaches any relevant laws, regulations or code of practice.</li>\r\n	<li>Gaining unauthorized access to other computer systems.</li>\r\n	<li>Interfering with any other person&#39;s use or enjoyment of the Site.</li>\r\n	<li>Breaching any applicable laws;</li>\r\n	<li>Interfering or disrupting networks or web sites connected to the Site.</li>\r\n	<li>Making, transmitting or storing electronic copies of materials protected by copyright without the permission of the owner.</li>\r\n</ol>\r\n\r\n<p>We have made every effort to display the colours of our products that appear on the Website as accurately as possible. However, as the actual colours you see will depend on your monitor, we cannot guarantee that your monitor&#39;s display of any colour will be accurate.</p>\r\n\r\n<p>Modification of Terms &amp; Conditions of Service</p>\r\n\r\n<p>GV SOLUTIONS may at any time modify the Terms &amp; Conditions of Use of the Website without any prior notification to you. You can access the latest version of these Terms &amp; Conditions at any given time on the Site. You should regularly review the Terms &amp; Conditions on the Site. In the event the modified Terms &amp; Conditions is not acceptable to you, you should discontinue using the Service. However, if you continue to use the Service you shall be deemed to have agreed to accept and abide by the modified Terms &amp; Conditions of Use of this Site.</p>\r\n\r\n<p>Governing Law and Jurisdiction</p>\r\n\r\n<p>This User Agreement shall be construed in accordance with the applicable laws of India. The Courts at Ghaziabad, Uttar Pradesh shall have exclusive jurisdiction in any proceedings arising out of this agreement. Any dispute or difference either in interpretation or otherwise, of any terms of this User Agreement between the parties hereto, the same shall be referred to an independent arbitrator who will be appointed by GV SOLUTIONS and his decision shall be final and binding on the parties hereto. The above arbitration shall be in accordance with the Arbitration and Conciliation Act, 1996 as amended from time to time. The arbitration shall be held in Ghaziabad, Uttar Pradesh.</p>\r\n\r\n<p>Indemnity</p>\r\n\r\n<p>You agree to defend, indemnify and hold harmless GV SOLUTIONS, its employees, directors, officers, agents and their successors and assigns from and against any and all claims, liabilities, damages, losses, costs and expenses, including attorney&#39;s fees, caused by or arising out of claims based upon your actions or inactions, which may result in any loss or liability to GV SOLUTIONS or any third party including but not limited to breach of any warranties, representations or undertakings or in relation to the non-fulfilment of any of your obligations under this User Agreement or arising out of the your violation of any applicable laws, regulations including but not limited to Intellectual Property Rights, payment of statutory dues and taxes, claim of libel, defamation, violation of rights of privacy or publicity, loss of service by other subscribers and infringement of intellectual property or other rights. This clause shall survive the expiry or termination of this User Agreement.</p>\r\n\r\n<p>Termination</p>\r\n\r\n<p>This User Agreement is effective unless and until terminated by either you or GV SOLUTIONS. You may terminate this User Agreement at any time, provided that you discontinue any further use of this Site. GV SOLUTIONS may terminate this User Agreement at any time and may do so immediately without notice, and accordingly deny you access to the Site, Such termination will be without any liability to GV SOLUTIONS. Upon any termination of the User Agreement by either you or GV SOLUTIONS, you must promptly destroy all materials downloaded or otherwise obtained from this Site, as well as all copies of such materials, whether made under the User Agreement or otherwise. GV SOLUTIONS&#39;s right to any Comments shall survive any termination of this User Agreement. Any such termination of the User Agreement shall not cancel your obligation to pay for the product already ordered from the Website or affect any liability that may have arisen under the User Agreement.</p>\r\n\r\n<p>&nbsp;</p>', '2020-06-08 00:41:46', '2020-10-16 08:16:16', 1, NULL, NULL, NULL),
(3, 'Return', 'Return Policy', '<p><strong>Terms and Conditions</strong></p>\r\n\r\n<p>Personal Information</p>\r\n\r\n<p>GV SOLUTIONS is the licensed owner of the brand GV Mart and the website GV Mart (&rdquo;The Site&rdquo;). GV SOLUTIONS respects your privacy. This Privacy Policy provides succinctly the manner your data is collected and used by GV SOLUTIONS on the Site. As a visitor to the Site/ Customer you are advised to please read the Privacy Policy carefully. By accessing the services provided by the Site you agree to the collection and use of your data by GV SOLUTIONS in the manner provided in this Privacy Policy.</p>\r\n\r\n<p>Services overview</p>\r\n\r\n<p>As part of the registration process on the Site, GV SOLUTIONS may collect the following personally identifiable information about you: Name including first and last name, alternate email address, mobile phone number and contact details, Postal code, Demographic profile (like your age, gender, occupation, education, address etc.) and information about the pages on the site you visit/access, the links you click on the site, the number of times you access the page and any such browsing information.</p>\r\n\r\n<p>Eligibility</p>\r\n\r\n<p>Services of the Site would be available to only select geographies in India. Persons who are &quot;incompetent to contract&quot; within the meaning of the Indian Contract Act, 1872 including un-discharged insolvents etc. are not eligible to use the Site. If you are a minor i.e. under the age of 18 years but at least 13 years of age you may use the Site only under the supervision of a parent or legal guardian who agrees to be bound by these Terms of Use. If your age is below 18 years your parents or legal guardians can transact on behalf of you if they are registered users. You are prohibited from purchasing any material which is for adult consumption and the sale of which to minors is prohibited</p>\r\n\r\n<p>Account &amp; Registration Obligations</p>\r\n\r\n<p>All shoppers have to register and login for placing orders on the Site. You have to keep your account and registration details current and correct for communications related to your purchases from the site. By agreeing to the terms and conditions, the shopper agrees to receive promotional communication and newsletters upon registration. The customer can opt out by contacting the customer service.&nbsp;</p>\r\n\r\n<p>Pricing</p>\r\n\r\n<p>All the products listed on the Site will be sold at MRP unless otherwise specified. The prices mentioned at the time of ordering will be the prices charged on the date of the delivery. Although prices of most of the products do not fluctuate on a daily basis but some of the commodities and fresh food prices do change on a daily basis. In case the prices are higher or lower on the date of delivery not additional charges will be collected or refunded as the case may be at the time of the delivery of the order.</p>\r\n\r\n<p>Cancellation by Site / Customer</p>\r\n\r\n<p>You as a customer can cancel your order anytime up to the cut-off time of the slot for which you have placed an order by calling our customer service. In such a case we will refund any payments already made by you for the order. If we suspect any fraudulent transaction by any customer or any transaction which defies the terms &amp; conditions of using the website, we at our sole discretion could cancel such orders. We will maintain a negative list of all fraudulent transactions and customers and would deny access to them or cancel any orders placed by them.</p>\r\n\r\n<p>Return &amp; Refunds</p>\r\n\r\n<p>We have a &quot;no questions asked return and refund policy&quot; which entitles all our members to return the product at the time of delivery if due to some reason they are not satisfied with the quality or freshness of the product. We will take the returned product back with us and issue a credit note for the value of the return products which will be credited to your account on the Site. This can be used to pay your subsequent shopping bills.</p>\r\n\r\n<p>You Agree and Confirm</p>\r\n\r\n<ol>\r\n	<li>That in the event that a non-delivery occurs on account of a mistake by you (i.e. wrong name or address or any other wrong information) any extra cost incurred by GV SOLUTIONS for redelivery shall be claimed from you.</li>\r\n	<li>That you will use the services provided by the Site, its affiliates, consultants and contracted companies, for lawful purposes only and comply with all applicable laws and regulations while using and transacting on the Site.</li>\r\n	<li>You will provide authentic and true information in all instances where such information is requested of you. GV SOLUTIONS reserves the right to confirm and validate the information and other details provided by you at any point of time. If upon confirmation your details are found not to be true (wholly or partly), it has the right in its sole discretion to reject the registration and debar you from using the Services and / or other affiliated websites without prior intimation whatsoever.</li>\r\n	<li>You authorise GV SOLUTIONS to contact you for any transactional purposes related to your order/account.</li>\r\n	<li>That you are accessing the services available on this Site and transacting at your sole risk and are using your best and prudent judgment before entering into any transaction through this Site.</li>\r\n	<li>That the address at which delivery of the product ordered by you is to be made will be correct and proper in all respects.</li>\r\n	<li>That before placing an order you will check the product description carefully. By placing an order for a product you agree to be bound by the conditions of sale included in the item&#39;s description.</li>\r\n</ol>\r\n\r\n<p>You may not use the Site for any of the following purposes:</p>\r\n\r\n<ol>\r\n	<li>Disseminating any unlawful, harassing, libellous, abusive, threatening, harmful, vulgar, obscene, or otherwise objectionable material.</li>\r\n	<li>Transmitting material that encourages conduct that constitutes a criminal offence or results in civil liability or otherwise breaches any relevant laws, regulations or code of practice.</li>\r\n	<li>Gaining unauthorized access to other computer systems.</li>\r\n	<li>Interfering with any other person&#39;s use or enjoyment of the Site.</li>\r\n	<li>Breaching any applicable laws;</li>\r\n	<li>Interfering or disrupting networks or web sites connected to the Site.</li>\r\n	<li>Making, transmitting or storing electronic copies of materials protected by copyright without the permission of the owner.</li>\r\n</ol>\r\n\r\n<p>We have made every effort to display the colours of our products that appear on the Website as accurately as possible. However, as the actual colours you see will depend on your monitor, we cannot guarantee that your monitor&#39;s display of any colour will be accurate.</p>\r\n\r\n<p>Modification of Terms &amp; Conditions of Service</p>\r\n\r\n<p>GV SOLUTIONS may at any time modify the Terms &amp; Conditions of Use of the Website without any prior notification to you. You can access the latest version of these Terms &amp; Conditions at any given time on the Site. You should regularly review the Terms &amp; Conditions on the Site. In the event the modified Terms &amp; Conditions is not acceptable to you, you should discontinue using the Service. However, if you continue to use the Service you shall be deemed to have agreed to accept and abide by the modified Terms &amp; Conditions of Use of this Site.</p>\r\n\r\n<p>Governing Law and Jurisdiction</p>\r\n\r\n<p>This User Agreement shall be construed in accordance with the applicable laws of India. The Courts at Ghaziabad, Uttar Pradesh shall have exclusive jurisdiction in any proceedings arising out of this agreement. Any dispute or difference either in interpretation or otherwise, of any terms of this User Agreement between the parties hereto, the same shall be referred to an independent arbitrator who will be appointed by GV SOLUTIONS and his decision shall be final and binding on the parties hereto. The above arbitration shall be in accordance with the Arbitration and Conciliation Act, 1996 as amended from time to time. The arbitration shall be held in Ghaziabad, Uttar Pradesh.</p>\r\n\r\n<p>Indemnity</p>\r\n\r\n<p>You agree to defend, indemnify and hold harmless GV SOLUTIONS, its employees, directors, officers, agents and their successors and assigns from and against any and all claims, liabilities, damages, losses, costs and expenses, including attorney&#39;s fees, caused by or arising out of claims based upon your actions or inactions, which may result in any loss or liability to GV SOLUTIONS or any third party including but not limited to breach of any warranties, representations or undertakings or in relation to the non-fulfilment of any of your obligations under this User Agreement or arising out of the your violation of any applicable laws, regulations including but not limited to Intellectual Property Rights, payment of statutory dues and taxes, claim of libel, defamation, violation of rights of privacy or publicity, loss of service by other subscribers and infringement of intellectual property or other rights. This clause shall survive the expiry or termination of this User Agreement.</p>\r\n\r\n<p>Termination</p>\r\n\r\n<p>This User Agreement is effective unless and until terminated by either you or GV SOLUTIONS. You may terminate this User Agreement at any time, provided that you discontinue any further use of this Site. GV SOLUTIONS may terminate this User Agreement at any time and may do so immediately without notice, and accordingly deny you access to the Site, Such termination will be without any liability to GV SOLUTIONS. Upon any termination of the User Agreement by either you or GV SOLUTIONS, you must promptly destroy all materials downloaded or otherwise obtained from this Site, as well as all copies of such materials, whether made under the User Agreement or otherwise. GV SOLUTIONS&#39;s right to any Comments shall survive any termination of this User Agreement. Any such termination of the User Agreement shall not cancel your obligation to pay for the product already ordered from the Website or affect any liability that may have arisen under the User Agreement.</p>\r\n\r\n<p>&nbsp;</p>', '2020-06-08 00:42:12', '2020-10-16 08:14:56', 1, NULL, NULL, NULL),
(4, 'About', 'About Us', '<p><strong>Terms and Conditions</strong></p>\r\n\r\n<p>Personal Information</p>\r\n\r\n<p>GV SOLUTIONS is the licensed owner of the brand GV Mart and the website GV Mart (&rdquo;The Site&rdquo;). GV SOLUTIONS respects your privacy. This Privacy Policy provides succinctly the manner your data is collected and used by GV SOLUTIONS on the Site. As a visitor to the Site/ Customer you are advised to please read the Privacy Policy carefully. By accessing the services provided by the Site you agree to the collection and use of your data by GV SOLUTIONS in the manner provided in this Privacy Policy.</p>\r\n\r\n<p>Services overview</p>\r\n\r\n<p>As part of the registration process on the Site, GV SOLUTIONS may collect the following personally identifiable information about you: Name including first and last name, alternate email address, mobile phone number and contact details, Postal code, Demographic profile (like your age, gender, occupation, education, address etc.) and information about the pages on the site you visit/access, the links you click on the site, the number of times you access the page and any such browsing information.</p>\r\n\r\n<p>Eligibility</p>\r\n\r\n<p>Services of the Site would be available to only select geographies in India. Persons who are &quot;incompetent to contract&quot; within the meaning of the Indian Contract Act, 1872 including un-discharged insolvents etc. are not eligible to use the Site. If you are a minor i.e. under the age of 18 years but at least 13 years of age you may use the Site only under the supervision of a parent or legal guardian who agrees to be bound by these Terms of Use. If your age is below 18 years your parents or legal guardians can transact on behalf of you if they are registered users. You are prohibited from purchasing any material which is for adult consumption and the sale of which to minors is prohibited</p>\r\n\r\n<p>Account &amp; Registration Obligations</p>\r\n\r\n<p>All shoppers have to register and login for placing orders on the Site. You have to keep your account and registration details current and correct for communications related to your purchases from the site. By agreeing to the terms and conditions, the shopper agrees to receive promotional communication and newsletters upon registration. The customer can opt out by contacting the customer service.&nbsp;</p>\r\n\r\n<p>Pricing</p>\r\n\r\n<p>All the products listed on the Site will be sold at MRP unless otherwise specified. The prices mentioned at the time of ordering will be the prices charged on the date of the delivery. Although prices of most of the products do not fluctuate on a daily basis but some of the commodities and fresh food prices do change on a daily basis. In case the prices are higher or lower on the date of delivery not additional charges will be collected or refunded as the case may be at the time of the delivery of the order.</p>\r\n\r\n<p>Cancellation by Site / Customer</p>\r\n\r\n<p>You as a customer can cancel your order anytime up to the cut-off time of the slot for which you have placed an order by calling our customer service. In such a case we will refund any payments already made by you for the order. If we suspect any fraudulent transaction by any customer or any transaction which defies the terms &amp; conditions of using the website, we at our sole discretion could cancel such orders. We will maintain a negative list of all fraudulent transactions and customers and would deny access to them or cancel any orders placed by them.</p>\r\n\r\n<p>Return &amp; Refunds</p>\r\n\r\n<p>We have a &quot;no questions asked return and refund policy&quot; which entitles all our members to return the product at the time of delivery if due to some reason they are not satisfied with the quality or freshness of the product. We will take the returned product back with us and issue a credit note for the value of the return products which will be credited to your account on the Site. This can be used to pay your subsequent shopping bills.</p>\r\n\r\n<p>You Agree and Confirm</p>\r\n\r\n<ol>\r\n	<li>That in the event that a non-delivery occurs on account of a mistake by you (i.e. wrong name or address or any other wrong information) any extra cost incurred by GV SOLUTIONS for redelivery shall be claimed from you.</li>\r\n	<li>That you will use the services provided by the Site, its affiliates, consultants and contracted companies, for lawful purposes only and comply with all applicable laws and regulations while using and transacting on the Site.</li>\r\n	<li>You will provide authentic and true information in all instances where such information is requested of you. GV SOLUTIONS reserves the right to confirm and validate the information and other details provided by you at any point of time. If upon confirmation your details are found not to be true (wholly or partly), it has the right in its sole discretion to reject the registration and debar you from using the Services and / or other affiliated websites without prior intimation whatsoever.</li>\r\n	<li>You authorise GV SOLUTIONS to contact you for any transactional purposes related to your order/account.</li>\r\n	<li>That you are accessing the services available on this Site and transacting at your sole risk and are using your best and prudent judgment before entering into any transaction through this Site.</li>\r\n	<li>That the address at which delivery of the product ordered by you is to be made will be correct and proper in all respects.</li>\r\n	<li>That before placing an order you will check the product description carefully. By placing an order for a product you agree to be bound by the conditions of sale included in the item&#39;s description.</li>\r\n</ol>\r\n\r\n<p>You may not use the Site for any of the following purposes:</p>\r\n\r\n<ol>\r\n	<li>Disseminating any unlawful, harassing, libellous, abusive, threatening, harmful, vulgar, obscene, or otherwise objectionable material.</li>\r\n	<li>Transmitting material that encourages conduct that constitutes a criminal offence or results in civil liability or otherwise breaches any relevant laws, regulations or code of practice.</li>\r\n	<li>Gaining unauthorized access to other computer systems.</li>\r\n	<li>Interfering with any other person&#39;s use or enjoyment of the Site.</li>\r\n	<li>Breaching any applicable laws;</li>\r\n	<li>Interfering or disrupting networks or web sites connected to the Site.</li>\r\n	<li>Making, transmitting or storing electronic copies of materials protected by copyright without the permission of the owner.</li>\r\n</ol>\r\n\r\n<p>We have made every effort to display the colours of our products that appear on the Website as accurately as possible. However, as the actual colours you see will depend on your monitor, we cannot guarantee that your monitor&#39;s display of any colour will be accurate.</p>\r\n\r\n<p>Modification of Terms &amp; Conditions of Service</p>\r\n\r\n<p>GV SOLUTIONS may at any time modify the Terms &amp; Conditions of Use of the Website without any prior notification to you. You can access the latest version of these Terms &amp; Conditions at any given time on the Site. You should regularly review the Terms &amp; Conditions on the Site. In the event the modified Terms &amp; Conditions is not acceptable to you, you should discontinue using the Service. However, if you continue to use the Service you shall be deemed to have agreed to accept and abide by the modified Terms &amp; Conditions of Use of this Site.</p>\r\n\r\n<p>Governing Law and Jurisdiction</p>\r\n\r\n<p>This User Agreement shall be construed in accordance with the applicable laws of India. The Courts at Ghaziabad, Uttar Pradesh shall have exclusive jurisdiction in any proceedings arising out of this agreement. Any dispute or difference either in interpretation or otherwise, of any terms of this User Agreement between the parties hereto, the same shall be referred to an independent arbitrator who will be appointed by GV SOLUTIONS and his decision shall be final and binding on the parties hereto. The above arbitration shall be in accordance with the Arbitration and Conciliation Act, 1996 as amended from time to time. The arbitration shall be held in Ghaziabad, Uttar Pradesh.</p>\r\n\r\n<p>Indemnity</p>\r\n\r\n<p>You agree to defend, indemnify and hold harmless GV SOLUTIONS, its employees, directors, officers, agents and their successors and assigns from and against any and all claims, liabilities, damages, losses, costs and expenses, including attorney&#39;s fees, caused by or arising out of claims based upon your actions or inactions, which may result in any loss or liability to GV SOLUTIONS or any third party including but not limited to breach of any warranties, representations or undertakings or in relation to the non-fulfilment of any of your obligations under this User Agreement or arising out of the your violation of any applicable laws, regulations including but not limited to Intellectual Property Rights, payment of statutory dues and taxes, claim of libel, defamation, violation of rights of privacy or publicity, loss of service by other subscribers and infringement of intellectual property or other rights. This clause shall survive the expiry or termination of this User Agreement.</p>\r\n\r\n<p>Termination</p>\r\n\r\n<p>This User Agreement is effective unless and until terminated by either you or GV SOLUTIONS. You may terminate this User Agreement at any time, provided that you discontinue any further use of this Site. GV SOLUTIONS may terminate this User Agreement at any time and may do so immediately without notice, and accordingly deny you access to the Site, Such termination will be without any liability to GV SOLUTIONS. Upon any termination of the User Agreement by either you or GV SOLUTIONS, you must promptly destroy all materials downloaded or otherwise obtained from this Site, as well as all copies of such materials, whether made under the User Agreement or otherwise. GV SOLUTIONS&#39;s right to any Comments shall survive any termination of this User Agreement. Any such termination of the User Agreement shall not cancel your obligation to pay for the product already ordered from the Website or affect any liability that may have arisen under the User Agreement.</p>', NULL, '2020-10-16 08:14:12', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_secret_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_secret_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linked_in_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `company_name`, `address`, `city`, `state`, `pincode`, `country`, `contact`, `contact_email`, `facebook_client_id`, `facebook_secret_key`, `google_client_id`, `google_secret_key`, `google_url`, `twitter_url`, `linked_in_url`, `pinterest_url`, `youtube_url`, `instagram_url`, `created_at`, `updated_at`, `logo`, `user_id`, `company_logo`) VALUES
(1, 'GV Mart', 'Crossings Republik', 'Ghaziabad', 'UP', '201016', 'India', '7827708863', 'support@gvmart.co.in', NULL, NULL, NULL, NULL, 'https://www.facebook.com/GV-Mart-100369751811223', 'tryrty', 'rtyry', 'jghjgjh', 'https://www.youtube.com', 'ghfgh', '2020-06-08 03:03:57', '2020-10-14 16:48:12', NULL, 0, 'logos/1602694092GVLogo.png');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT 0,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaint` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `admin_reply` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numcode` int(11) DEFAULT NULL,
  `phonecode` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso`, `iso3`, `numcode`, `phonecode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AFGHANISTAN', 'AF', 'AFG', 4, 93, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(2, 'ALBANIA', 'AL', 'ALB', 8, 355, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(3, 'ALGERIA', 'DZ', 'DZA', 12, 213, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(4, 'AMERICAN SAMOA', 'AS', 'ASM', 16, 1684, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(5, 'ANDORRA', 'AD', 'AND', 20, 376, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(6, 'ANGOLA', 'AO', 'AGO', 24, 244, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(7, 'ANGUILLA', 'AI', 'AIA', 660, 1264, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(8, 'ANTARCTICA', 'AQ', NULL, NULL, 0, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(9, 'ANTIGUA AND BARBUDA', 'AG', 'ATG', 28, 1268, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(10, 'ARGENTINA', 'AR', 'ARG', 32, 54, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(11, 'ARMENIA', 'AM', 'ARM', 51, 374, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(12, 'ARUBA', 'AW', 'ABW', 533, 297, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(13, 'AUSTRALIA', 'AU', 'AUS', 36, 61, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(14, 'AUSTRIA', 'AT', 'AUT', 40, 43, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(15, 'AZERBAIJAN', 'AZ', 'AZE', 31, 994, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(16, 'BAHAMAS', 'BS', 'BHS', 44, 1242, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(17, 'BAHRAIN', 'BH', 'BHR', 48, 973, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(18, 'BANGLADESH', 'BD', 'BGD', 50, 880, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(19, 'BARBADOS', 'BB', 'BRB', 52, 1246, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(20, 'BELARUS', 'BY', 'BLR', 112, 375, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(21, 'BELGIUM', 'BE', 'BEL', 56, 32, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(22, 'BELIZE', 'BZ', 'BLZ', 84, 501, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(23, 'BENIN', 'BJ', 'BEN', 204, 229, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(24, 'BERMUDA', 'BM', 'BMU', 60, 1441, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(25, 'BHUTAN', 'BT', 'BTN', 64, 975, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(26, 'BOLIVIA', 'BO', 'BOL', 68, 591, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(27, 'BOSNIA AND HERZEGOVINA', 'BA', 'BIH', 70, 387, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(28, 'BOTSWANA', 'BW', 'BWA', 72, 267, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(29, 'BOUVET ISLAND', 'BV', NULL, NULL, 0, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(30, 'BRAZIL', 'BR', 'BRA', 76, 55, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(31, 'BRITISH INDIAN OCEAN TERRITORY', 'IO', NULL, NULL, 246, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(32, 'BRUNEI DARUSSALAM', 'BN', 'BRN', 96, 673, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(33, 'BULGARIA', 'BG', 'BGR', 100, 359, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(34, 'BURKINA FASO', 'BF', 'BFA', 854, 226, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(35, 'BURUNDI', 'BI', 'BDI', 108, 257, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(36, 'CAMBODIA', 'KH', 'KHM', 116, 855, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(37, 'CAMEROON', 'CM', 'CMR', 120, 237, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(38, 'CANADA', 'CA', 'CAN', 124, 1, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(39, 'CAPE VERDE', 'CV', 'CPV', 132, 238, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(40, 'CAYMAN ISLANDS', 'KY', 'CYM', 136, 1345, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(41, 'CENTRAL AFRICAN REPUBLIC', 'CF', 'CAF', 140, 236, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(42, 'CHAD', 'TD', 'TCD', 148, 235, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(43, 'CHILE', 'CL', 'CHL', 152, 56, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(44, 'CHINA', 'CN', 'CHN', 156, 86, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(45, 'CHRISTMAS ISLAND', 'CX', NULL, NULL, 61, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(46, 'COCOS (KEELING) ISLANDS', 'CC', NULL, NULL, 672, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(47, 'COLOMBIA', 'CO', 'COL', 170, 57, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(48, 'COMOROS', 'KM', 'COM', 174, 269, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(49, 'CONGO', 'CG', 'COG', 178, 242, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(50, 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'CD', 'COD', 180, 242, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(51, 'COOK ISLANDS', 'CK', 'COK', 184, 682, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(52, 'COSTA RICA', 'CR', 'CRI', 188, 506, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(53, 'COTE D\'IVOIRE', 'CI', 'CIV', 384, 225, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(54, 'CROATIA', 'HR', 'HRV', 191, 385, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(55, 'CUBA', 'CU', 'CUB', 192, 53, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(56, 'CYPRUS', 'CY', 'CYP', 196, 357, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(57, 'CZECH REPUBLIC', 'CZ', 'CZE', 203, 420, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(58, 'DENMARK', 'DK', 'DNK', 208, 45, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(59, 'DJIBOUTI', 'DJ', 'DJI', 262, 253, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(60, 'DOMINICA', 'DM', 'DMA', 212, 1767, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(61, 'DOMINICAN REPUBLIC', 'DO', 'DOM', 214, 1809, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(62, 'ECUADOR', 'EC', 'ECU', 218, 593, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(63, 'EGYPT', 'EG', 'EGY', 818, 20, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(64, 'EL SALVADOR', 'SV', 'SLV', 222, 503, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(65, 'EQUATORIAL GUINEA', 'GQ', 'GNQ', 226, 240, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(66, 'ERITREA', 'ER', 'ERI', 232, 291, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(67, 'ESTONIA', 'EE', 'EST', 233, 372, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(68, 'ETHIOPIA', 'ET', 'ETH', 231, 251, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(69, 'FALKLAND ISLANDS (MALVINAS)', 'FK', 'FLK', 238, 500, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(70, 'FAROE ISLANDS', 'FO', 'FRO', 234, 298, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(71, 'FIJI', 'FJ', 'FJI', 242, 679, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(72, 'FINLAND', 'FI', 'FIN', 246, 358, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(73, 'FRANCE', 'FR', 'FRA', 250, 33, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(74, 'FRENCH GUIANA', 'GF', 'GUF', 254, 594, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(75, 'FRENCH POLYNESIA', 'PF', 'PYF', 258, 689, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(76, 'FRENCH SOUTHERN TERRITORIES', 'TF', NULL, NULL, 0, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(77, 'GABON', 'GA', 'GAB', 266, 241, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(78, 'GAMBIA', 'GM', 'GMB', 270, 220, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(79, 'GEORGIA', 'GE', 'GEO', 268, 995, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(80, 'GERMANY', 'DE', 'DEU', 276, 49, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(81, 'GHANA', 'GH', 'GHA', 288, 233, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(82, 'GIBRALTAR', 'GI', 'GIB', 292, 350, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(83, 'GREECE', 'GR', 'GRC', 300, 30, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(84, 'GREENLAND', 'GL', 'GRL', 304, 299, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(85, 'GRENADA', 'GD', 'GRD', 308, 1473, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(86, 'GUADELOUPE', 'GP', 'GLP', 312, 590, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(87, 'GUAM', 'GU', 'GUM', 316, 1671, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(88, 'GUATEMALA', 'GT', 'GTM', 320, 502, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(89, 'GUINEA', 'GN', 'GIN', 324, 224, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(90, 'GUINEA-BISSAU', 'GW', 'GNB', 624, 245, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(91, 'GUYANA', 'GY', 'GUY', 328, 592, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(92, 'HAITI', 'HT', 'HTI', 332, 509, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(93, 'HEARD ISLAND AND MCDONALD ISLANDS', 'HM', NULL, NULL, 0, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(94, 'HOLY SEE (VATICAN CITY STATE)', 'VA', 'VAT', 336, 39, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(95, 'HONDURAS', 'HN', 'HND', 340, 504, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(96, 'HONG KONG', 'HK', 'HKG', 344, 852, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(97, 'HUNGARY', 'HU', 'HUN', 348, 36, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(98, 'ICELAND', 'IS', 'ISL', 352, 354, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(99, 'INDIA', 'IN', 'IND', 356, 91, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(100, 'INDONESIA', 'ID', 'IDN', 360, 62, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(101, 'IRAN, ISLAMIC REPUBLIC OF', 'IR', 'IRN', 364, 98, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(102, 'IRAQ', 'IQ', 'IRQ', 368, 964, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(103, 'IRELAND', 'IE', 'IRL', 372, 353, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(104, 'ISRAEL', 'IL', 'ISR', 376, 972, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(105, 'ITALY', 'IT', 'ITA', 380, 39, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(106, 'JAMAICA', 'JM', 'JAM', 388, 1876, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(107, 'JAPAN', 'JP', 'JPN', 392, 81, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(108, 'JORDAN', 'JO', 'JOR', 400, 962, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(109, 'KAZAKHSTAN', 'KZ', 'KAZ', 398, 7, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(110, 'KENYA', 'KE', 'KEN', 404, 254, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(111, 'KIRIBATI', 'KI', 'KIR', 296, 686, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(112, 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'KP', 'PRK', 408, 850, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(113, 'KOREA, REPUBLIC OF', 'KR', 'KOR', 410, 82, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(114, 'KUWAIT', 'KW', 'KWT', 414, 965, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(115, 'KYRGYZSTAN', 'KG', 'KGZ', 417, 996, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(116, 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'LA', 'LAO', 418, 856, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(117, 'LATVIA', 'LV', 'LVA', 428, 371, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(118, 'LEBANON', 'LB', 'LBN', 422, 961, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(119, 'LESOTHO', 'LS', 'LSO', 426, 266, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(120, 'LIBERIA', 'LR', 'LBR', 430, 231, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(121, 'LIBYAN ARAB JAMAHIRIYA', 'LY', 'LBY', 434, 218, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(122, 'LIECHTENSTEIN', 'LI', 'LIE', 438, 423, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(123, 'LITHUANIA', 'LT', 'LTU', 440, 370, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(124, 'LUXEMBOURG', 'LU', 'LUX', 442, 352, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(125, 'MACAO', 'MO', 'MAC', 446, 853, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(126, 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'MK', 'MKD', 807, 389, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(127, 'MADAGASCAR', 'MG', 'MDG', 450, 261, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(128, 'MALAWI', 'MW', 'MWI', 454, 265, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(129, 'MALAYSIA', 'MY', 'MYS', 458, 60, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(130, 'MALDIVES', 'MV', 'MDV', 462, 960, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(131, 'MALI', 'ML', 'MLI', 466, 223, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(132, 'MALTA', 'MT', 'MLT', 470, 356, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(133, 'MARSHALL ISLANDS', 'MH', 'MHL', 584, 692, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(134, 'MARTINIQUE', 'MQ', 'MTQ', 474, 596, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(135, 'MAURITANIA', 'MR', 'MRT', 478, 222, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(136, 'MAURITIUS', 'MU', 'MUS', 480, 230, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(137, 'MAYOTTE', 'YT', NULL, NULL, 269, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(138, 'MEXICO', 'MX', 'MEX', 484, 52, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(139, 'MICRONESIA, FEDERATED STATES OF', 'FM', 'FSM', 583, 691, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(140, 'MOLDOVA, REPUBLIC OF', 'MD', 'MDA', 498, 373, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(141, 'MONACO', 'MC', 'MCO', 492, 377, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(142, 'MONGOLIA', 'MN', 'MNG', 496, 976, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(143, 'MONTSERRAT', 'MS', 'MSR', 500, 1664, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(144, 'MOROCCO', 'MA', 'MAR', 504, 212, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(145, 'MOZAMBIQUE', 'MZ', 'MOZ', 508, 258, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(146, 'MYANMAR', 'MM', 'MMR', 104, 95, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(147, 'NAMIBIA', 'NA', 'NAM', 516, 264, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(148, 'NAURU', 'NR', 'NRU', 520, 674, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(149, 'NEPAL', 'NP', 'NPL', 524, 977, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(150, 'NETHERLANDS', 'NL', 'NLD', 528, 31, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(151, 'NETHERLANDS ANTILLES', 'AN', 'ANT', 530, 599, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(152, 'NEW CALEDONIA', 'NC', 'NCL', 540, 687, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(153, 'NEW ZEALAND', 'NZ', 'NZL', 554, 64, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(154, 'NICARAGUA', 'NI', 'NIC', 558, 505, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(155, 'NIGER', 'NE', 'NER', 562, 227, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(156, 'NIGERIA', 'NG', 'NGA', 566, 234, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(157, 'NIUE', 'NU', 'NIU', 570, 683, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(158, 'NORFOLK ISLAND', 'NF', 'NFK', 574, 672, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(159, 'NORTHERN MARIANA ISLANDS', 'MP', 'MNP', 580, 1670, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(160, 'NORWAY', 'NO', 'NOR', 578, 47, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(161, 'OMAN', 'OM', 'OMN', 512, 968, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(162, 'PAKISTAN', 'PK', 'PAK', 586, 92, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(163, 'PALAU', 'PW', 'PLW', 585, 680, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(164, 'PALESTINIAN TERRITORY, OCCUPIED', 'PS', NULL, NULL, 970, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(165, 'PANAMA', 'PA', 'PAN', 591, 507, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(166, 'PAPUA NEW GUINEA', 'PG', 'PNG', 598, 675, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(167, 'PARAGUAY', 'PY', 'PRY', 600, 595, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(168, 'PERU', 'PE', 'PER', 604, 51, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(169, 'PHILIPPINES', 'PH', 'PHL', 608, 63, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(170, 'PITCAIRN', 'PN', 'PCN', 612, 0, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(171, 'POLAND', 'PL', 'POL', 616, 48, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(172, 'PORTUGAL', 'PT', 'PRT', 620, 351, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(173, 'PUERTO RICO', 'PR', 'PRI', 630, 1787, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(174, 'QATAR', 'QA', 'QAT', 634, 974, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(175, 'REUNION', 'RE', 'REU', 638, 262, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(176, 'ROMANIA', 'RO', 'ROM', 642, 40, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(177, 'RUSSIAN FEDERATION', 'RU', 'RUS', 643, 70, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(178, 'RWANDA', 'RW', 'RWA', 646, 250, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(179, 'SAINT HELENA', 'SH', 'SHN', 654, 290, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(180, 'SAINT KITTS AND NEVIS', 'KN', 'KNA', 659, 1869, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(181, 'SAINT LUCIA', 'LC', 'LCA', 662, 1758, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(182, 'SAINT PIERRE AND MIQUELON', 'PM', 'SPM', 666, 508, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(183, 'SAINT VINCENT AND THE GRENADINES', 'VC', 'VCT', 670, 1784, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(184, 'SAMOA', 'WS', 'WSM', 882, 684, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(185, 'SAN MARINO', 'SM', 'SMR', 674, 378, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(186, 'SAO TOME AND PRINCIPE', 'ST', 'STP', 678, 239, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(187, 'SAUDI ARABIA', 'SA', 'SAU', 682, 966, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(188, 'SENEGAL', 'SN', 'SEN', 686, 221, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(189, 'SERBIA AND MONTENEGRO', 'CS', NULL, NULL, 381, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(190, 'SEYCHELLES', 'SC', 'SYC', 690, 248, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(191, 'SIERRA LEONE', 'SL', 'SLE', 694, 232, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(192, 'SINGAPORE', 'SG', 'SGP', 702, 65, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(193, 'SLOVAKIA', 'SK', 'SVK', 703, 421, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(194, 'SLOVENIA', 'SI', 'SVN', 705, 386, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(195, 'SOLOMON ISLANDS', 'SB', 'SLB', 90, 677, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(196, 'SOMALIA', 'SO', 'SOM', 706, 252, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(197, 'SOUTH AFRICA', 'ZA', 'ZAF', 710, 27, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(198, 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'GS', NULL, NULL, 0, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(199, 'SPAIN', 'ES', 'ESP', 724, 34, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(200, 'SRI LANKA', 'LK', 'LKA', 144, 94, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(201, 'SUDAN', 'SD', 'SDN', 736, 249, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(202, 'SURINAME', 'SR', 'SUR', 740, 597, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(203, 'SVALBARD AND JAN MAYEN', 'SJ', 'SJM', 744, 47, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(204, 'SWAZILAND', 'SZ', 'SWZ', 748, 268, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(205, 'SWEDEN', 'SE', 'SWE', 752, 46, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(206, 'SWITZERLAND', 'CH', 'CHE', 756, 41, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(207, 'SYRIAN ARAB REPUBLIC', 'SY', 'SYR', 760, 963, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(208, 'TAIWAN, PROVINCE OF CHINA', 'TW', 'TWN', 158, 886, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(209, 'TAJIKISTAN', 'TJ', 'TJK', 762, 992, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(210, 'TANZANIA, UNITED REPUBLIC OF', 'TZ', 'TZA', 834, 255, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(211, 'THAILAND', 'TH', 'THA', 764, 66, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(212, 'TIMOR-LESTE', 'TL', NULL, NULL, 670, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(213, 'TOGO', 'TG', 'TGO', 768, 228, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(214, 'TOKELAU', 'TK', 'TKL', 772, 690, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(215, 'TONGA', 'TO', 'TON', 776, 676, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(216, 'TRINIDAD AND TOBAGO', 'TT', 'TTO', 780, 1868, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(217, 'TUNISIA', 'TN', 'TUN', 788, 216, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(218, 'TURKEY', 'TR', 'TUR', 792, 90, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(219, 'TURKMENISTAN', 'TM', 'TKM', 795, 7370, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(220, 'TURKS AND CAICOS ISLANDS', 'TC', 'TCA', 796, 1649, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(221, 'TUVALU', 'TV', 'TUV', 798, 688, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(222, 'UGANDA', 'UG', 'UGA', 800, 256, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(223, 'UKRAINE', 'UA', 'UKR', 804, 380, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(224, 'UNITED ARAB EMIRATES', 'AE', 'ARE', 784, 971, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(225, 'UNITED KINGDOM', 'GB', 'GBR', 826, 44, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(226, 'UNITED STATES OF AMERICA', 'US', 'USA', 840, 1, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(227, 'UNITED STATES MINOR OUTLYING ISLANDS', 'UM', NULL, NULL, 1, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(228, 'URUGUAY', 'UY', 'URY', 858, 598, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(229, 'UZBEKISTAN', 'UZ', 'UZB', 860, 998, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(230, 'VANUATU', 'VU', 'VUT', 548, 678, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(231, 'VENEZUELA', 'VE', 'VEN', 862, 58, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(232, 'VIET NAM', 'VN', 'VNM', 704, 84, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(233, 'VIRGIN ISLANDS, BRITISH', 'VG', 'VGB', 92, 1284, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(234, 'VIRGIN ISLANDS, U.S.', 'VI', 'VIR', 850, 1340, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(235, 'WALLIS AND FUTUNA', 'WF', 'WLF', 876, 681, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(236, 'WESTERN SAHARA', 'EH', 'ESH', 732, 212, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(237, 'YEMEN', 'YE', 'YEM', 887, 967, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(238, 'ZAMBIA', 'ZM', 'ZMB', 894, 260, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03'),
(239, 'ZIMBABWE', 'ZW', 'ZWE', 716, 263, 1, '2020-05-27 14:04:03', '2020-05-27 14:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_free` int(11) NOT NULL,
  `cost` decimal(8,2) DEFAULT 0.00,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile_no` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_verifications`
--

CREATE TABLE `email_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_verifications`
--

INSERT INTO `email_verifications` (`id`, `email`, `otp`, `verified`, `created_at`, `updated_at`) VALUES
(1, 'jyotikasethi3007@gmail.com', '701606', '1', '2020-09-09 02:14:12', '2020-09-09 02:14:49'),
(2, 'riddhi.lic@gmail.com', '128698', '1', '2020-09-09 03:55:51', '2020-09-09 03:56:35'),
(4, 'gauravgarg_mca@yahoo.com', '135245', '1', '2020-10-12 12:15:48', '2020-10-12 12:16:31'),
(5, 'navin.kumar@timbletech.com', '571494', '0', '2020-10-13 12:15:44', '2020-10-13 12:15:44'),
(6, 'nky9497@gmail.com', '668195', '1', '2020-10-13 12:22:04', '2020-10-13 12:22:29'),
(7, 'nky9497@gmail.com', '400094', '0', '2020-10-13 12:23:11', '2020-10-13 12:23:11'),
(8, 'nitika.gairola@gmail.com', '916180', '1', '2020-10-15 06:07:29', '2020-10-15 06:08:06'),
(9, 'gauravgarg_mca@yahoo.com', '559513', '1', '2020-10-16 02:44:55', '2020-10-16 02:47:46'),
(10, 'eshnachhillar27@gmail.com', '763521', '1', '2020-10-17 07:47:47', '2020-10-17 07:48:06'),
(11, 'victor0274@gmail.com', '211268', '1', '2020-10-17 07:49:23', '2020-10-17 07:50:01'),
(12, 'eshnachhillar27@gmail.com', '402617', '1', '2020-10-17 08:11:43', '2020-10-17 08:12:03'),
(18, 'jyotikasethi3007@gmail.com', '897573', '1', '2020-10-17 08:52:04', '2020-10-17 08:52:27'),
(19, 'er_saurabhgarg@yahoo.com', '513618', '0', '2020-10-17 08:58:29', '2020-10-17 08:58:29'),
(20, 'er_saurabhgarg@yahoo.com', '927158', '1', '2020-10-17 08:59:57', '2020-10-17 09:00:36'),
(21, 'paryboy@rediffmail.com', '307949', '0', '2020-10-17 10:34:12', '2020-10-17 10:34:12'),
(22, 'er_saurabhgarg@yahoo.com', '920566', '1', '2020-10-17 10:43:58', '2020-10-17 10:44:34'),
(23, 'toravisaini@gmail.com', '595821', '1', '2020-10-17 10:54:20', '2020-10-17 10:54:54'),
(24, 'er_saourabhgarg@yahoo.com', '965847', '0', '2020-10-17 11:01:12', '2020-10-17 11:01:12'),
(25, 'er_saurabhgarg@yahoo.com', '896782', '1', '2020-10-17 11:03:13', '2020-10-17 11:03:46'),
(26, 'er.gargsaurabh@yahoo.com', '482268', '0', '2020-10-17 11:06:24', '2020-10-17 11:06:24'),
(27, 'er.gargsaurabh@gmail.com', '463753', '1', '2020-10-17 11:09:43', '2020-10-17 11:10:19'),
(28, 'ravinderjee@gmail.com', '109097', '0', '2020-10-18 11:03:20', '2020-10-18 11:03:20'),
(29, 'vikasitian@gmail.com', '265279', '1', '2020-10-20 09:27:13', '2020-10-20 09:28:50'),
(30, 'vikasitian@gmail.com', '543456', '0', '2020-10-20 09:28:09', '2020-10-20 09:28:09'),
(31, 'vikasitian@gmail.com', '240678', '0', '2020-10-20 09:28:28', '2020-10-20 09:28:28'),
(32, 'vikasitian@gmail.com', '312631', '1', '2020-10-20 09:29:59', '2020-10-20 09:31:13'),
(33, 'fgdfg', '205493', '0', '2020-10-21 02:06:59', '2020-10-21 02:06:59'),
(34, 'fgdfg', '194671', '0', '2020-10-21 02:07:09', '2020-10-21 02:07:09'),
(35, 'jyotikasethi3007@gmail.com', '832607', '1', '2020-10-27 15:35:42', '2020-10-27 15:37:15'),
(36, 'ryas@gmail.com', '319186', '1', '2020-10-27 15:49:27', '2020-10-27 15:49:56'),
(37, 'ryas@gmail.com', '735382', '1', '2020-10-27 15:58:23', '2020-10-27 15:58:41'),
(38, 'hjsakjfdkjfds@dsdskjfdslkjfd;lfd', '540053', '0', '2020-10-28 17:12:35', '2020-10-28 17:12:35'),
(39, 'hjsakjfdkjfds@dsdskjfdslkjfd;lfd', '767194', '0', '2020-10-28 17:14:17', '2020-10-28 17:14:17'),
(40, 'hjsakjfdkjfds@dsdskjfdslkjfd;lfd@erwrw.com', '890452', '0', '2020-10-28 17:14:30', '2020-10-28 17:14:30'),
(41, 'hjsakjfdkjfds@dsdskjfdslkjfd;lfd@erwrw.com', '735564', '0', '2020-10-28 17:15:02', '2020-10-28 17:15:02'),
(42, 'hjsakjfdkjfds@dsdskjfdslkjfd;lfd@erwrw.com', '612903', '0', '2020-10-28 17:15:07', '2020-10-28 17:15:07'),
(43, 'gaghsh@ggggg.com', '764284', '0', '2020-10-28 17:15:24', '2020-10-28 17:15:24'),
(44, 'test1@gmail.com', '896104', '1', '2020-10-28 17:20:19', '2020-10-28 17:21:51'),
(45, 'gauravgarg_mca@yahoo.com', '646601', '1', '2020-10-28 17:20:31', '2020-10-28 17:21:01'),
(46, 'dc@ec', '526063', '0', '2020-10-29 17:38:35', '2020-10-29 17:38:35'),
(47, 'shribhagarg@yahoo.co.in', '605467', '1', '2020-10-30 13:51:25', '2020-11-23 19:07:04'),
(48, 'shribhagarg@yahoo.co.in', '270374', '0', '2020-10-31 16:06:36', '2020-10-31 16:06:36'),
(49, 'shribhagarg@yahoo.co.in', '846990', '0', '2020-10-31 16:09:13', '2020-10-31 16:09:13'),
(50, 'shribhagarg@yahoo.co.in', '931706', '0', '2020-10-31 16:11:06', '2020-10-31 16:11:06'),
(51, 'shribhagarg@yahoo.co.in', '737175', '0', '2020-10-31 16:12:44', '2020-10-31 16:12:44'),
(52, 'shribhagarg@yahoo.co.in', '330952', '0', '2020-10-31 16:14:17', '2020-10-31 16:14:17'),
(53, 'shribhagarg@yahoo.co.in', '847980', '0', '2020-10-31 16:16:28', '2020-10-31 16:16:28'),
(54, 'shribhagarg@yahoo.co.in', '373931', '0', '2020-10-31 16:19:11', '2020-10-31 16:19:11'),
(55, 'shribhagarg@yahoo.co.in', '194658', '0', '2020-10-31 16:22:01', '2020-10-31 16:22:01'),
(56, 'shribhagarg@yahoo.co.in', '785771', '0', '2020-10-31 16:24:19', '2020-10-31 16:24:19'),
(57, 'shribhagarg@yahoo.co.in', '184219', '1', '2020-10-31 16:43:03', '2020-10-31 16:43:49'),
(58, 'hellow@gmail.com', '938763', '1', '2020-11-02 06:02:39', '2020-11-02 06:12:08'),
(59, 'jyotikasethi3007@gmail.com12', '376893', '1', '2020-11-02 20:50:36', '2020-11-02 20:51:28'),
(60, 'GAURAVGARG_MCA@@GMAIL.COM', '835448', '0', '2020-11-03 22:18:56', '2020-11-03 22:18:56'),
(61, '@@@@@gmail.com', '273292', '0', '2020-11-03 22:28:53', '2020-11-03 22:28:53'),
(62, 'admin@hmail.con', '449502', '0', '2020-11-03 22:55:10', '2020-11-03 22:55:10'),
(63, 'shribhaangel@gmail.com', '330106', '0', '2020-11-23 18:24:34', '2020-11-23 18:24:34'),
(64, 'netsparker@example.com', '530337', '0', '2021-02-15 22:39:58', '2021-02-15 22:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'employee',
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'India',
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driving_licence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adhaar_front` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adhaar_back` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voter_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_size_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_salary` int(11) DEFAULT 0,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_ifsc_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_holder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_no` bigint(20) NOT NULL,
  `billing_date` date NOT NULL,
  `billing_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_products`
--

CREATE TABLE `inventory_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inventory_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_customers_table', 1),
(2, '2014_10_12_000010_create_employees_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2016_05_26_020731_create_country_table', 1),
(5, '2016_05_26_035202_create_provinces_table', 1),
(6, '2016_05_26_051502_create_cities_table', 1),
(7, '2017_06_10_225235_create_products_table', 1),
(8, '2017_06_11_015526_create_categories_table', 1),
(9, '2017_06_11_033553_create_category_product_table', 1),
(10, '2017_06_11_073305_create_address_table', 1),
(11, '2017_06_12_225546_create_order_status_table', 1),
(12, '2017_06_13_044714_create_couriers_table', 1),
(13, '2017_06_13_053346_create_orders_table', 1),
(14, '2017_06_13_091740_create_order_products_table', 1),
(15, '2017_06_17_011245_create_shoppingcart_table', 1),
(16, '2018_01_18_163143_create_product_images_table', 1),
(17, '2018_02_19_151228_create_cost_column', 1),
(18, '2018_03_10_024148_laratrust_setup_tables', 1),
(19, '2018_03_10_110530_create_attributes_table', 1),
(20, '2018_03_10_150920_create_attribute_values_table', 1),
(21, '2018_03_11_014046_create_product_attributes_table', 1),
(22, '2018_03_11_090249_create_attribute_value_product_attribute_table', 1),
(23, '2018_03_15_232344_create_customer_subscription_table', 1),
(24, '2018_06_16_000410_add_fields_on_order_product_table', 1),
(25, '2018_06_16_102641_create_brands_table', 1),
(26, '2018_06_17_175657_add_brand_id_in_products_table', 1),
(27, '2018_06_18_135142_add_columns_in_product_attributes_table', 1),
(28, '2018_06_30_041523_add_product_attributes', 1),
(29, '2018_07_03_023925_create_states_table', 1),
(30, '2018_07_16_184224_add_phone_number_in_address_table', 1),
(31, '2018_07_16_190024_add_tracking_number_and_label_url_to_orders_table', 1),
(32, '2018_07_17_184437_add_sale_price_in_products_table', 1),
(33, '2018_11_06_031246_add_product_attribute_id_column_in_order_product_table', 1),
(34, '2018_11_06_123452_add_total_shipping_in_orders_table', 1),
(35, '2020_05_18_112519_create_sliders_table', 1),
(36, '2020_05_18_112633_create_blogs_table', 1),
(37, '2020_05_19_164308_create_blog_reviews_table', 1),
(38, '2020_05_19_164523_create_product_reviews_table', 1),
(39, '2020_05_19_170739_add_author_to_blogs', 1),
(40, '2020_05_19_172152_create_testimonials_table', 1),
(41, '2020_05_28_112049_add_product_size_to_products', 2),
(42, '2020_05_28_112456_inventories', 3),
(43, '2020_06_03_151744_add_tags_to_blogs', 4),
(44, '2020_06_03_170310_create_wishlists_table', 5),
(45, '2020_06_04_103154_add_delivery_address_to_addresses', 6),
(46, '2020_06_04_103352_add_delivery_address_to_orders', 7),
(47, '2020_06_04_172636_add_booking_date_to_orders', 8),
(48, '2020_06_05_063825_create_cms_table', 9),
(49, '2020_06_06_053655_create_newsletters_table', 9),
(50, '2020_06_06_081138_create_contacts_table', 10),
(51, '2020_06_06_082227_create_company_details_table', 11),
(52, '2020_06_08_095853_add_company_logo_to_company_details', 12),
(53, '2020_07_23_041249_create_registered_shops_table', 13),
(54, '2020_07_24_043233_add_cover_to_registered_shops', 14),
(55, '2020_07_24_080952_add_user_id_to_registered_shops', 15),
(56, '2020_07_24_135623_add_user_id_to_company_details', 16),
(57, '2020_07_24_154812_create_shop_categories_table', 17),
(58, '2020_07_27_141529_add_user_role_to_users', 18),
(59, '2020_07_27_153324_add_user_id_to_categories', 19),
(60, '2020_07_28_050628_add_shop_cat_id_to_registered_shops', 20),
(61, '2020_07_29_154816_add_availability_to_registered_shops', 21),
(62, '2020_07_29_170139_create_search_histories_table', 22),
(63, '2020_07_31_203355_create_product_weights_table', 23),
(64, '2020_07_31_204817_add_product_price_to_product_weights', 24),
(65, '2020_08_01_041858_create_bookings_table', 25),
(66, '2020_08_01_160410_add_mobile_no_to_customers', 25),
(67, '2020_08_03_150140_create_carts_table', 26),
(68, '2020_08_05_083347_add_icons_to_shop_categories', 27),
(69, '2020_08_06_165309_add_cover_to_brands', 28),
(70, '2020_08_06_204634_add_active_status_registered_shops', 29);

-- --------------------------------------------------------

--
-- Table structure for table `newletter_posts`
--

CREATE TABLE `newletter_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_sent` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courier_id` int(10) UNSIGNED DEFAULT NULL,
  `courier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `address_id` int(10) UNSIGNED NOT NULL,
  `order_status_id` int(10) UNSIGNED NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discounts` decimal(8,2) NOT NULL DEFAULT 0.00,
  `total_products` decimal(8,2) NOT NULL,
  `total_shipping` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(8,2) NOT NULL DEFAULT 0.00,
  `total` decimal(8,2) NOT NULL,
  `total_paid` decimal(8,2) NOT NULL DEFAULT 0.00,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_address` bigint(20) NOT NULL,
  `booking_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `admin_click` int(11) NOT NULL DEFAULT 0,
  `vendor_click` int(11) NOT NULL DEFAULT 0,
  `payumoney_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` int(11) DEFAULT NULL,
  `cc_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_expire` date DEFAULT NULL,
  `error_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_from_device` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'desktop',
  `return_order` int(11) NOT NULL DEFAULT 0,
  `cancel_order` int(11) NOT NULL DEFAULT 0,
  `delivery_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `reference`, `courier_id`, `courier`, `customer_id`, `address_id`, `order_status_id`, `payment`, `discounts`, `total_products`, `total_shipping`, `tax`, `total`, `total_paid`, `invoice`, `label_url`, `tracking_number`, `created_at`, `updated_at`, `delivery_address`, `booking_date`, `user_id`, `admin_click`, `vendor_click`, `payumoney_status`, `transaction_id`, `coupon_code`, `coupon_amount`, `cc_type`, `cc_owner`, `cc_number`, `cc_expire`, `error_detail`, `order_from_device`, `return_order`, `cancel_order`, `delivery_date`, `payment_status`) VALUES
(1, ' ', 0, NULL, 2, 60, 1, 'online', '0.00', '2.00', '0.00', '0.00', '2090.00', '2090.00', NULL, NULL, NULL, '2022-02-17 14:26:02', '2022-02-17 14:04:36', 60, 'Feb 17, 2022 / 07:25 PM', 0, 1, 0, NULL, NULL, '', 0, NULL, NULL, NULL, NULL, NULL, 'website', 0, 0, 'Feb 19, 2022', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_attribute_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` decimal(8,2) DEFAULT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `product_attribute_id`, `quantity`, `product_name`, `product_sku`, `product_description`, `product_price`, `product_size`) VALUES
(1, 1, 2, NULL, 1, 'Women Trouser with black shade', '13', '<p>Women Trouser with black shade</p>', '1140.00', ''),
(2, 1, 3, NULL, 1, 'Women Trouser with black shade', '25', '<p>Women Trouser with black shade</p>', '950.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Booked', 'orange', '2020-06-04 01:22:24', '2020-06-04 01:22:24'),
(2, 'Approved', 'Pink', '2020-08-06 10:39:32', '2020-08-06 10:39:32'),
(3, 'Processing', 'blue', '2020-06-04 01:22:54', '2020-06-04 01:22:54'),
(4, 'Shipped', 'brown', '2020-06-04 01:23:14', '2020-06-04 01:23:14'),
(5, 'Delivered', 'Green', '2020-06-04 01:23:36', '2020-06-04 01:23:36'),
(6, 'Cancel', 'red', '2020-06-04 01:23:54', '2020-06-04 01:23:54'),
(7, 'Return', '#ff0000', '2020-06-04 01:24:11', '2020-06-04 01:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('jyotikasethi3007@gmail.com', '$2y$10$r7bNB3NHg8fzksgbQlb4KunQM6l8ahzm64ApWEVbaemrboudAGcKG', NULL),
('jyotikasethi3007@gmail.com', '$2y$10$Wp.XXR70GS7B56OcKTm3/ebg5wu0OlxsyrtDFtrrO0FNCZQwQ0Sum', NULL),
('jyotikasethi3007@gmail.com', '$2y$10$wYmpc2ACKlDXYNgfb526Yu6B0aYcw2qYvEMNKpKjI2pL4TqKTnkvC', NULL),
('jyotikasethi3007@gmail.com', '$2y$10$jQFLFrgAC4HILT2AVClhduO3IK0CG8I2GsexhOTJUbewWKyOTOyaS', NULL),
('jyotikasethi3007@gmail.com', '$2y$10$ZGrQXrAZXht7KR8Uc8VY/Ob9axnFjNqFDcXn/h9ZMpUZX8WoynSKi', NULL),
('jyotikasethi3007@gmail.com', '$2y$10$nzt4839LNkQ8f95nCkY/nupbtlAFU8clDvUCD2fNRB1wpU6az89vm', NULL),
('jyotikasethi3007@gmail.com', '$2y$10$FzG9x2NmKiUOmR4JZf9wGuuo4RTPdh30XUax06RNLCswiv0QsoS/2', NULL),
('jyotikasethi3007@gmail.com', '$2y$10$mNYs7fkLwgg9JnX.wNth/.cm51X8ITki5Ric/Rom.Cv0RD8fSGNMW', NULL),
('jyotikasethi3007@gmail.com', '$2y$10$38n2DUV1rorCpMu7tmGt9.nIeUXJn1a5lSKUu2p/tCj67G87D87.i', NULL),
('jyotikasethi3007@gmail.com', '$2y$10$R7BzxNg67e.jQTTz3RQLg.l2p.IWa8nWZDDntYineDbyqteJ0T/ca', NULL),
('shribhagarg@yahoo.co.in', '$2y$10$vOhJWut4JGpiEXe14vZpLO/LzN0N0FGVo/BjX6Do0TqSwIY.q8.le', NULL),
('shribhagarg@yahoo.co.in', '$2y$10$YBS1ABdtJx.jQs3SRvGCEuBoGauaXj3YSbPgB1HP9O5/LdflEf3hK', NULL),
('shribhagarg@yahoo.co.in', '$2y$10$VoFpuDStewBiBvrUYUgkCOBTQ.OsmXD9lv2VDODC/7pXM9Apw7jfK', NULL),
('shribhagarg@yahoo.co.in', '$2y$10$Gp7YClMnnU6Oe4FiVCgVtu2sVCxlZXl8JQiRidoYRcm01Z4JdiOaa', NULL),
('netsparker@example.com', '$2y$10$01i//2VGpbbmNTXI0jUcr.dE3ILAXgArSJpIgY2/96eiR0kc9lVkK', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-product', 'Create product', '', '2020-05-27 14:04:00', '2020-05-27 14:04:00'),
(2, 'view-product', 'View product', '', '2020-05-27 14:04:00', '2020-05-27 14:04:00'),
(3, 'update-product', 'Update product', '', '2020-05-27 14:04:00', '2020-05-27 14:04:00'),
(4, 'delete-product', 'Delete product', '', '2020-05-27 14:04:01', '2020-05-27 14:04:01'),
(5, 'update-order', 'Update order', '', '2020-05-27 14:04:01', '2020-05-27 14:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(5, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pincodes`
--

CREATE TABLE `pincodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pincodes`
--

INSERT INTO `pincodes` (`id`, `pincode`, `status`, `created_at`, `updated_at`) VALUES
(1, 110099, '0', '2020-09-13 12:55:42', '2020-10-27 13:53:46'),
(2, 201016, '1', '2020-10-02 11:54:04', '2020-10-02 11:54:04'),
(3, 201009, '1', '2020-10-02 11:54:45', '2020-10-02 11:54:45'),
(4, 201318, '1', '2020-10-17 04:20:22', '2020-10-17 04:20:22'),
(5, 201306, '1', '2020-10-17 04:37:32', '2020-10-17 04:37:32'),
(6, 7484099, '1', '2020-10-27 11:16:32', '2020-10-27 11:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `length` decimal(8,2) DEFAULT NULL,
  `width` decimal(8,2) DEFAULT NULL,
  `height` decimal(8,2) DEFAULT NULL,
  `distance_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` decimal(8,2) DEFAULT 0.00,
  `mass_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `click_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `key_features` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `search_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_amount` float DEFAULT NULL,
  `return_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preffered_payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `is_trending` int(11) DEFAULT 0,
  `is_best_seller` int(11) NOT NULL DEFAULT 0,
  `is_top_rated` int(11) NOT NULL DEFAULT 0,
  `stock_quantity` bigint(20) DEFAULT 50,
  `purchase_quantity` bigint(20) DEFAULT 0,
  `return_order` int(11) DEFAULT 0,
  `cancel_order` int(11) DEFAULT 0,
  `discount` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `sku`, `name`, `slug`, `description`, `cover`, `quantity`, `price`, `sale_price`, `status`, `length`, `width`, `height`, `distance_unit`, `weight`, `mass_unit`, `created_at`, `updated_at`, `material`, `product_type`, `size`, `color`, `user_id`, `click_count`, `key_features`, `meta_title`, `meta_description`, `search_keywords`, `gst`, `shipping_amount`, `return_period`, `preffered_payment_method`, `is_featured`, `is_trending`, `is_best_seller`, `is_top_rated`, `stock_quantity`, `purchase_quantity`, `return_order`, `cancel_order`, `discount`) VALUES
(1, NULL, '38', 'Women Trouser with black shade', 'Women-Trouser-with-black-shade', '<p>Women Trouser with black shade</p>', 'products/16450972751.jpg', 1, '1000.00', '1000.00', 1, NULL, NULL, NULL, NULL, '0.00', NULL, '2022-02-17 11:27:55', '2022-02-17 14:07:40', NULL, NULL, '', 'Black,Orange,Blue,Red,Gray', 2, '8', NULL, 'Women Trouser with black shade', 'Women Trouser with black shade', 'Women Trouser with black shade', '0', NULL, 'At a time of delivery', 'Both', 1, 0, 1, 0, 10, 0, 0, 0, NULL),
(2, NULL, '13', 'Women Trouser with black shade', 'Women-Trouser-with-black-shade', '<p>Women Trouser with black shade</p>', 'products/16451057562.jpg', 1, '1200.00', '1140.00', 1, NULL, NULL, NULL, NULL, '0.00', NULL, '2022-02-17 13:49:16', '2022-02-17 14:07:40', NULL, NULL, '', NULL, 2, '8', NULL, 'Women Trouser with black shade', 'Women Trouser with black shade', 'Women Trouser with black shade', '0', NULL, 'At a time of delivery', 'Both', 0, 1, 0, 0, 10, 1, 0, 0, NULL),
(3, NULL, '25', 'Women Trouser with black shade', 'Women-Trouser-with-black-shade', '<p>Women Trouser with black shade</p>', 'products/16451058923.jpg', 1, '1000.00', '950.00', 1, NULL, NULL, NULL, NULL, '0.00', NULL, '2022-02-17 13:51:32', '2022-02-17 14:07:40', NULL, NULL, '', NULL, 2, '8', NULL, 'Women Trouser with black shade', 'Women Trouser with black shade', 'Women Trouser with black shade', '0', NULL, 'At a time of delivery', 'Both', 1, 0, 1, 0, 9, 1, 0, 0, NULL),
(4, NULL, '27', 'Women Trouser with black shade', 'Women-Trouser-with-black-shade', '<p>Women Trouser with black shade</p>', 'products/16451059794.jpg', 1, '799.00', '719.10', 1, NULL, NULL, NULL, NULL, '0.00', NULL, '2022-02-17 13:52:59', '2022-02-17 14:07:40', NULL, NULL, 'XL,XXL,XXXL', NULL, 2, '8', NULL, 'Women Trouser with black shade', 'Women Trouser with black shade', 'Women Trouser with black shade', '0', NULL, 'At a time of delivery', 'both', 0, 0, 0, 1, 10, 0, 0, 0, 10),
(5, NULL, '13', 'Women Trouser with black shade', 'Women-Trouser-with-black-shade', '<p>Women Trouser with black shade</p>', 'products/16451066605.jpg', 1, '999.00', '899.10', 1, NULL, NULL, NULL, NULL, '0.00', NULL, '2022-02-17 14:04:00', '2022-02-17 14:17:16', NULL, NULL, '', NULL, 2, '8', NULL, 'Women Trouser with black shade', 'Women Trouser with black shade', 'Women Trouser with black shade', '0', NULL, 'At a time of delivery', 'Both', 0, 0, 1, 0, 10, 0, 0, 0, NULL),
(6, NULL, '13', 'Women Trouser with black shade', 'Women-Trouser-with-black-shade', '<p>Women Trouser with black shade</p>', 'products/16451068276.jpg', 1, '799.00', '759.05', 1, NULL, NULL, NULL, NULL, '0.00', NULL, '2022-02-17 14:07:07', '2022-02-17 14:17:37', NULL, NULL, '', NULL, 2, '8', '<p>Women Trouser with black shade</p>', 'Women Trouser with black shade', 'Women Trouser with black shade', 'Women Trouser with black shade', '0', NULL, 'At a time of delivery', 'Both', 0, 1, 0, 0, 10, 0, 0, 0, NULL),
(7, NULL, '25', 'SAMSUNG 65-Inch Class Crystal UHD AU8000 Series - 4K UHD HDR Smart TV with Alexa Built-in (UN65AU8000FXZA, 2021 Model), Black', 'SAMSUNG-65-Inch-Class-Crystal-UHD-AU8000-Series---4K-UHD-HDR-Smart-TV-with-Alexa-Built-in-(UN65AU8000FXZA,-2021-Model),-Black', '<p>Take your Smart TV viewing to amazing new heights in Crystal UHD with the super slim, minimalistic Samsung 65-inch Class AU8000 Crystal UHD 4K HDR Smart TV with 3 HDMI Ports. Elevated, lifelike clarity offers you a picture that has to be seen to be believed, thanks to the dynamic Crystal Processor 4K that delivers vibrant, picture-perfect viewing. Add in Smart features that make watching even easier&sup1;. Ask more from your TV with multiple built-in voice assistants. Choose from Alexa&sup2;, Google Assistant&sup3;, and Bixby Voice⁴ to help you search for movies, change the channel, adjust the volume and more. Dive into shows and films, and watch in striking detail with this Samsung Smart TV powered by HDR10+, while experiencing smooth performance with the Motion Xcelerator. Adaptive sound ensures that you get the perfect audio experience, automatically adjusting the sound to enhance dialogue, music and sports so that you can hear every detail. A boundless screen with nearly no frame means that you are left with beautiful images to enjoy. Samsung&rsquo;s TV range offers the ultimate in latest viewing technology, from inspiring Samsung Neo QLED 8K to bright and colorful 4K and crisp HD screens. Samsung combines elegant design with the latest smart and innovative technology, built not just for the way you watch, but for the way you live. &sup1;Viewing experience may vary according to types of content and format. &sup2;Amazon, Alexa, and all related logos are trademarks of Amazon.com, Inc. or its affiliate. &sup3;The Google Assistant service may not yet be available at the time of purchase of this product, please continue to check for app updates. Google is a trademark of Google LLC. ⁴Bixby voice commands recognize English (US/UK), French, Spanish, German, Italian, Chinese and Korean. Not all accents, dialects and expressions recognized. The list of features that can be controlled by voice commands via Bixby will continue to expand. Mobile functionality compatible with Samsung Galaxy 8 series or higher with Bixby function. Samsung account log-in and data network (Wi-Fi or internet connection) required to fully operate Bixby features.</p>', 'products/1645107197t1.jpg', 1, '45000.00', '40500.00', 1, NULL, NULL, NULL, NULL, '0.00', NULL, '2022-02-17 14:13:17', '2022-02-17 14:20:29', NULL, NULL, '', NULL, 2, '2', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Brand Name</th>\r\n			<td>&lrm;SAMSUNG</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item Weight</th>\r\n			<td>&lrm;46.1 pounds</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Product Dimensions</th>\r\n			<td>&lrm;11.1 x 57.1 x 34.4 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Country of Origin</th>\r\n			<td>&lrm;Mexico</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item model number</th>\r\n			<td>&lrm;UN65AU8000FXZA</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Batteries</th>\r\n			<td>&lrm;3 AAA batteries required. (included)</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Color Name</th>\r\n			<td>&lrm;Black</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Special Features</th>\r\n			<td>&lrm;Dynamic Crystal Color; Crystal Processor 4K; Smart TV with Multiple Voice Assistants; HDR</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Speaker Type</th>\r\n			<td>&lrm;Built-In</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'SAMSUNG 65-Inch Class Crystal UHD AU8000 Series - 4K UHD HDR Smart TV with Alexa Built-in (UN65AU8000FXZA, 2021 Model), Black', 'SAMSUNG 65-Inch Class Crystal UHD AU8000 Series - 4K UHD HDR Smart TV with Alexa Built-in (UN65AU8000FXZA, 2021 Model), Black', 'SAMSUNG 65-Inch Class Crystal UHD AU8000 Series - 4K UHD HDR Smart TV with Alexa Built-in (UN65AU8000FXZA, 2021 Model), Black', '0', NULL, 'At a time of delivery', 'Both', 1, 0, 0, 0, 10, 0, 0, 0, NULL),
(8, NULL, '17', 'SAMSUNG 65-Inch Class Crystal UHD AU8000 Series - 4K UHD HDR Smart TV with Alexa Built-in (UN65AU8000FXZA, 2021 Model), Black', 'SAMSUNG-65-Inch-Class-Crystal-UHD-AU8000-Series---4K-UHD-HDR-Smart-TV-with-Alexa-Built-in-(UN65AU8000FXZA,-2021-Model),-Black', '<p>Take your Smart TV viewing to amazing new heights in Crystal UHD with the super slim, minimalistic Samsung 65-inch Class AU8000 Crystal UHD 4K HDR Smart TV with 3 HDMI Ports. Elevated, lifelike clarity offers you a picture that has to be seen to be believed, thanks to the dynamic Crystal Processor 4K that delivers vibrant, picture-perfect viewing. Add in Smart features that make watching even easier&sup1;. Ask more from your TV with multiple built-in voice assistants. Choose from Alexa&sup2;, Google Assistant&sup3;, and Bixby Voice⁴ to help you search for movies, change the channel, adjust the volume and more. Dive into shows and films, and watch in striking detail with this Samsung Smart TV powered by HDR10+, while experiencing smooth performance with the Motion Xcelerator. Adaptive sound ensures that you get the perfect audio experience, automatically adjusting the sound to enhance dialogue, music and sports so that you can hear every detail. A boundless screen with nearly no frame means that you are left with beautiful images to enjoy. Samsung&rsquo;s TV range offers the ultimate in latest viewing technology, from inspiring Samsung Neo QLED 8K to bright and colorful 4K and crisp HD screens. Samsung combines elegant design with the latest smart and innovative technology, built not just for the way you watch, but for the way you live. &sup1;Viewing experience may vary according to types of content and format. &sup2;Amazon, Alexa, and all related logos are trademarks of Amazon.com, Inc. or its affiliate. &sup3;The Google Assistant service may not yet be available at the time of purchase of this product, please continue to check for app updates. Google is a trademark of Google LLC. ⁴Bixby voice commands recognize English (US/UK), French, Spanish, German, Italian, Chinese and Korean. Not all accents, dialects and expressions recognized. The list of features that can be controlled by voice commands via Bixby will continue to expand. Mobile functionality compatible with Samsung Galaxy 8 series or higher with Bixby function. Samsung account log-in and data network (Wi-Fi or internet connection) required to fully operate Bixby features.</p>', 'products/1645107299t2.jpg', 1, '32000.00', '30400.00', 1, NULL, NULL, NULL, NULL, '0.00', NULL, '2022-02-17 14:14:59', '2022-02-17 14:28:47', NULL, NULL, '', NULL, 2, '2', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Brand Name</th>\r\n			<td>&lrm;SAMSUNG</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item Weight</th>\r\n			<td>&lrm;46.1 pounds</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Product Dimensions</th>\r\n			<td>&lrm;11.1 x 57.1 x 34.4 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Country of Origin</th>\r\n			<td>&lrm;Mexico</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item model number</th>\r\n			<td>&lrm;UN65AU8000FXZA</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Batteries</th>\r\n			<td>&lrm;3 AAA batteries required. (included)</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Color Name</th>\r\n			<td>&lrm;Black</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Special Features</th>\r\n			<td>&lrm;Dynamic Crystal Color; Crystal Processor 4K; Smart TV with Multiple Voice Assistants; HDR</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Speaker Type</th>\r\n			<td>&lrm;Built-In</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'SAMSUNG 65-Inch Class Crystal UHD AU8000 Series - 4K UHD HDR Smart TV with Alexa Built-in (UN65AU8000FXZA, 2021 Model), Black', 'SAMSUNG 65-Inch Class Crystal UHD AU8000 Series - 4K UHD HDR Smart TV with Alexa Built-in (UN65AU8000FXZA, 2021 Model), Black', 'SAMSUNG 65-Inch Class Crystal UHD AU8000 Series - 4K UHD HDR Smart TV with Alexa Built-in (UN65AU8000FXZA, 2021 Model), Black', '0', NULL, 'At a time of delivery', 'Both', 1, 1, 1, 1, 10, 0, 0, 0, NULL),
(9, NULL, '3', 'OnePlus Nord N100 Midnight Frost Unlocked Smartphone​, 4GB+64GB, US Version, Model BE2011', 'OnePlus-Nord-N100-Midnight-Frost-Unlocked-Smartphone​,-4GB+64GB,-US-Version,-Model-BE2011', '<p>OnePlus Nord N100 comes with a big display, big battery, and big storage at an affordable price. It sports a 6.52” immersive display with the power of dual stereo speakers. For long battery life, OnePlus Nord 100 is powered by a 5000mAh battery and supports 18W fast charge. It also comes with 4GB of RAM with 64 GB of storage.</p>', 'products/1645108400m4.jpg', 1, '35000.00', '33250.00', 1, NULL, NULL, NULL, NULL, '0.00', NULL, '2022-02-17 14:33:20', '2022-02-17 14:33:30', NULL, NULL, '', NULL, 2, '0', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Product Dimensions</th>\r\n			<td>6.5 x 2.95 x 0.38 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item Weight</th>\r\n			<td>15.8 ounces</td>\r\n		</tr>\r\n		<tr>\r\n			<th>ASIN</th>\r\n			<td>B07XM8GDWC</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item model number</th>\r\n			<td>BE2011</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Batteries</th>\r\n			<td>1 Lithium ion batteries required. (included)</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Customer Reviews</th>\r\n			<td>\r\n			<p><a href=\"javascript:void(0)\"><em>4.2 out of 5 stars</em>&nbsp;</a>&nbsp;&nbsp;&nbsp;<a href=\"https://www.amazon.com/OnePlus-Midnight-Unlocked-Smartphone-BE2011/dp/B07XM8GDWC/ref=sr_1_13?crid=NCWJ5VFV4ZL&amp;keywords=smartphone&amp;qid=1645108180&amp;s=electronics&amp;sprefix=sm%2Celectronics%2C2433&amp;sr=1-13#customerReviews\">569 ratings</a></p>\r\n			<br />\r\n			4.2 out of 5 stars</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Best Sellers Rank</th>\r\n			<td>#7,547 in Cell Phones &amp; Accessories (<a href=\"https://www.amazon.com/gp/bestsellers/wireless/ref=pd_zg_ts_wireless\">See Top 100 in Cell Phones &amp; Accessories</a>)<br />\r\n			#174 in&nbsp;<a href=\"https://www.amazon.com/gp/bestsellers/wireless/7073960011/ref=pd_zg_hrsr_wireless\">Cell Phone Portable Power Banks</a><br />\r\n			#186 in&nbsp;<a href=\"https://www.amazon.com/gp/bestsellers/wireless/7073959011/ref=pd_zg_hrsr_wireless\">Cell Phone Replacement Batteries</a></td>\r\n		</tr>\r\n		<tr>\r\n			<th>OS</th>\r\n			<td>Android 10.0</td>\r\n		</tr>\r\n		<tr>\r\n			<th>RAM</th>\r\n			<td>4 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Connectivity technologies</th>\r\n			<td>Bluetooth, Wi-Fi, USB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>GPS</th>\r\n			<td>True</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Special Features</th>\r\n			<td>4/6G GB memory, Fast Charging Support, Dual speakers, 5000mAh large battery, 90 Hz display</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Other display features</th>\r\n			<td>Wireless</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Device interface - primary</th>\r\n			<td>Touchscreen, Microphone</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Other camera features</th>\r\n			<td>Rear, Triple Camera, 13+2+2 MP, Front, 8MP</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Audio Jack</th>\r\n			<td>3.5 mm</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Form Factor</th>\r\n			<td>Bar</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Colour</th>\r\n			<td>Midnight Frost​</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Battery Power Rating</th>\r\n			<td>5000</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Phone Talk Time</th>\r\n			<td>29 Hours</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Phone Standy Time (with data)</th>\r\n			<td>9.4 days</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Included Components</th>\r\n			<td>Phone, power adapter, cable, SIM card ejector, manual</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Manufacturer</th>\r\n			<td>ONEPLUS</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Country of Origin</th>\r\n			<td>China</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Date First Available</th>\r\n			<td>January 8, 2021</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'OnePlus Nord N100 Midnight Frost Unlocked Smartphone​, 4GB+64GB, US Version, Model BE2011', 'OnePlus Nord N100 Midnight Frost Unlocked Smartphone​, 4GB+64GB, US Version, Model BE2011', 'OnePlus Nord N100 Midnight Frost Unlocked Smartphone​, 4GB+64GB, US Version, Model BE2011', '0', NULL, 'At a time of delivery', 'Both', 0, 0, 0, 1, 50, 0, 0, 0, NULL),
(10, NULL, '49', 'OnePlus Nord N100 Midnight Frost Unlocked Smartphone​, 4GB+64GB, US Version, Model BE2011', 'OnePlus-Nord-N100-Midnight-Frost-Unlocked-Smartphone​,-4GB+64GB,-US-Version,-Model-BE2011', '<ul>\r\n	<li>Long-Lasting Power &ndash; Defeat battery anxiety with Nord N100&rsquo;s massive 5000mAh battery, which keeps you powered all day long</li>\r\n	<li>Large Storage, Large Performance &ndash; Packed with 4GB of RAM and 64GB of built-in storage, Nord N100 has all the performance and storage needed to keep you entertained. Need more storage? Expand it up to 512GB</li>\r\n	<li>Massive Screen for Massive Entertainment &ndash; Immerse yourself into your favorite movies, TV shows, and video games with Nord N100&rsquo;s massive 6.52&rdquo; screen</li>\r\n	<li>Triple Camera System &ndash; Equipped with a 13MP main camera, a macro lens, and a specialized camera for portrait photos, Nord N100 makes it easy to capture every moment</li>\r\n	<li>Dual Stereo Speakers &ndash; Experience clear and immersive sound with stereo audio coming from both sides of Nord N100</li>\r\n</ul>', 'products/1645108646m3.jpg', 1, '25000.00', '22500.00', 1, NULL, NULL, NULL, NULL, '0.00', NULL, '2022-02-17 14:37:26', '2022-02-17 14:41:34', NULL, NULL, '', NULL, 2, '0', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Product Dimensions</th>\r\n			<td>6.5 x 2.95 x 0.38 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item Weight</th>\r\n			<td>15.8 ounces</td>\r\n		</tr>\r\n		<tr>\r\n			<th>ASIN</th>\r\n			<td>B07XM8GDWC</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item model number</th>\r\n			<td>BE2011</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Batteries</th>\r\n			<td>1 Lithium ion batteries required. (included)</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Customer Reviews</th>\r\n			<td>\r\n			<p><a href=\"javascript:void(0)\"><em>4.2 out of 5 stars</em>&nbsp;</a>&nbsp;&nbsp;&nbsp;<a href=\"https://www.amazon.com/OnePlus-Midnight-Unlocked-Smartphone-BE2011/dp/B07XM8GDWC/ref=sr_1_13?crid=NCWJ5VFV4ZL&amp;keywords=smartphone&amp;qid=1645108180&amp;s=electronics&amp;sprefix=sm%2Celectronics%2C2433&amp;sr=1-13#customerReviews\">569 ratings</a></p>\r\n			<br />\r\n			4.2 out of 5 stars</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Best Sellers Rank</th>\r\n			<td>#7,547 in Cell Phones &amp; Accessories (<a href=\"https://www.amazon.com/gp/bestsellers/wireless/ref=pd_zg_ts_wireless\">See Top 100 in Cell Phones &amp; Accessories</a>)<br />\r\n			#174 in&nbsp;<a href=\"https://www.amazon.com/gp/bestsellers/wireless/7073960011/ref=pd_zg_hrsr_wireless\">Cell Phone Portable Power Banks</a><br />\r\n			#186 in&nbsp;<a href=\"https://www.amazon.com/gp/bestsellers/wireless/7073959011/ref=pd_zg_hrsr_wireless\">Cell Phone Replacement Batteries</a></td>\r\n		</tr>\r\n		<tr>\r\n			<th>OS</th>\r\n			<td>Android 10.0</td>\r\n		</tr>\r\n		<tr>\r\n			<th>RAM</th>\r\n			<td>4 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Connectivity technologies</th>\r\n			<td>Bluetooth, Wi-Fi, USB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>GPS</th>\r\n			<td>True</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Special Features</th>\r\n			<td>4/6G GB memory, Fast Charging Support, Dual speakers, 5000mAh large battery, 90 Hz display</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Other display features</th>\r\n			<td>Wireless</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Device interface - primary</th>\r\n			<td>Touchscreen, Microphone</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Other camera features</th>\r\n			<td>Rear, Triple Camera, 13+2+2 MP, Front, 8MP</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Audio Jack</th>\r\n			<td>3.5 mm</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Form Factor</th>\r\n			<td>Bar</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Colour</th>\r\n			<td>Midnight Frost​</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Battery Power Rating</th>\r\n			<td>5000</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Phone Talk Time</th>\r\n			<td>29 Hours</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Phone Standy Time (with data)</th>\r\n			<td>9.4 days</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Included Components</th>\r\n			<td>Phone, power adapter, cable, SIM card ejector, manual</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Manufacturer</th>\r\n			<td>ONEPLUS</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Country of Origin</th>\r\n			<td>China</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Date First Available</th>\r\n			<td>January 8, 2021</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'OnePlus Nord N100 Midnight Frost Unlocked Smartphone​, 4GB+64GB, US Version, Model BE2011', 'OnePlus Nord N100 Midnight Frost Unlocked Smartphone​, 4GB+64GB, US Version, Model BE2011', 'OnePlus Nord N100 Midnight Frost Unlocked Smartphone​, 4GB+64GB, US Version, Model BE2011', '0', NULL, 'At a time of delivery', 'Both', 1, 0, 0, 0, 10, 0, 0, 0, NULL),
(11, NULL, '5', 'OnePlus Nord N100 Midnight Frost Unlocked Smartphone​, 4GB+64GB, US Version, Model BE2011', 'OnePlus-Nord-N100-Midnight-Frost-Unlocked-Smartphone​,-4GB+64GB,-US-Version,-Model-BE2011', '<ul>\r\n	<li>Long-Lasting Power &ndash; Defeat battery anxiety with Nord N100&rsquo;s massive 5000mAh battery, which keeps you powered all day long</li>\r\n	<li>Large Storage, Large Performance &ndash; Packed with 4GB of RAM and 64GB of built-in storage, Nord N100 has all the performance and storage needed to keep you entertained. Need more storage? Expand it up to 512GB</li>\r\n	<li>Massive Screen for Massive Entertainment &ndash; Immerse yourself into your favorite movies, TV shows, and video games with Nord N100&rsquo;s massive 6.52&rdquo; screen</li>\r\n	<li>Triple Camera System &ndash; Equipped with a 13MP main camera, a macro lens, and a specialized camera for portrait photos, Nord N100 makes it easy to capture every moment</li>\r\n	<li>Dual Stereo Speakers &ndash; Experience clear and immersive sound with stereo audio coming from both sides of Nord N100</li>\r\n</ul>', 'products/1645108745m2.jpg', 1, '45000.00', '42750.00', 1, NULL, NULL, NULL, NULL, '0.00', NULL, '2022-02-17 14:39:05', '2022-02-17 14:39:05', NULL, NULL, '', NULL, 2, '0', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>OnePlus Nord N100</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Wireless Carrier</td>\r\n			<td>Unlocked</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>OnePlus</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Form Factor</td>\r\n			<td>Bar</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Memory Storage Capacity</td>\r\n			<td>64 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Operating System</td>\r\n			<td>Android 10.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Color</td>\r\n			<td>Midnight Frost​</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cellular Technology</td>\r\n			<td>4G</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Year</td>\r\n			<td>2021</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Included Components</td>\r\n			<td>Phone, power adapter, cable, SIM card ejector, manual</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'OnePlus Nord N100 Midnight Frost Unlocked Smartphone​, 4GB+64GB, US Version, Model BE2011', 'OnePlus Nord N100 Midnight Frost Unlocked Smartphone​, 4GB+64GB, US Version, Model BE2011', 'OnePlus Nord N100 Midnight Frost Unlocked Smartphone​, 4GB+64GB, US Version, Model BE2011', '0', NULL, 'At a time of delivery', 'both', 0, 1, 0, 0, 10, 0, 0, 0, 5),
(12, NULL, '12', 'OnePlus Nord N100 Midnight Frost Unlocked Smartphone​, 4GB+64GB, US Version, Model BE2011', 'OnePlus-Nord-N100-Midnight-Frost-Unlocked-Smartphone​,-4GB+64GB,-US-Version,-Model-BE2011', '<ul>\r\n	<li>Long-Lasting Power &ndash; Defeat battery anxiety with Nord N100&rsquo;s massive 5000mAh battery, which keeps you powered all day long</li>\r\n	<li>Large Storage, Large Performance &ndash; Packed with 4GB of RAM and 64GB of built-in storage, Nord N100 has all the performance and storage needed to keep you entertained. Need more storage? Expand it up to 512GB</li>\r\n	<li>Massive Screen for Massive Entertainment &ndash; Immerse yourself into your favorite movies, TV shows, and video games with Nord N100&rsquo;s massive 6.52&rdquo; screen</li>\r\n	<li>Triple Camera System &ndash; Equipped with a 13MP main camera, a macro lens, and a specialized camera for portrait photos, Nord N100 makes it easy to capture every moment</li>\r\n	<li>Dual Stereo Speakers &ndash; Experience clear and immersive sound with stereo audio coming from both sides of Nord N100</li>\r\n</ul>', 'products/1645108876m1.jpg', 1, '36000.00', '34200.00', 1, NULL, NULL, NULL, NULL, '0.00', NULL, '2022-02-17 14:41:16', '2022-02-17 15:16:26', NULL, NULL, '', NULL, 2, '0', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Model Name</td>\r\n			<td>OnePlus Nord N100</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Wireless Carrier</td>\r\n			<td>Unlocked</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>OnePlus</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Form Factor</td>\r\n			<td>Bar</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Memory Storage Capacity</td>\r\n			<td>64 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Operating System</td>\r\n			<td>Android 10.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Color</td>\r\n			<td>Midnight Frost​</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cellular Technology</td>\r\n			<td>4G</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Year</td>\r\n			<td>2021</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Included Components</td>\r\n			<td>Phone, power adapter, cable, SIM card ejector, manual</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'OnePlus Nord N100 Midnight Frost Unlocked Smartphone​, 4GB+64GB, US Version, Model BE2011', 'OnePlus Nord N100 Midnight Frost Unlocked Smartphone​, 4GB+64GB, US Version, Model BE2011', 'OnePlus Nord N100 Midnight Frost Unlocked Smartphone​, 4GB+64GB, US Version, Model BE2011', '0', NULL, 'At a time of delivery', 'Both', 0, 0, 1, 0, 10, 0, 0, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `sale_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default` tinyint(4) NOT NULL DEFAULT 0,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `src`, `priority`) VALUES
(1, 7, 'products/1645107596t1.jpg', 1),
(2, 7, 'products/1645107596t2.jpg', 1),
(3, 7, 'products/1645107596t3.jpg', 1),
(4, 7, 'products/1645107596t4.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_rating` float NOT NULL DEFAULT 1,
  `product_review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `product_size`, `product_price`, `product_discount`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'S', '1000', '0', '1', '2022-02-17 11:27:56', '2022-02-17 11:27:56'),
(2, '1', 'M', '1100', '0', '1', '2022-02-17 11:27:56', '2022-02-17 11:27:56'),
(3, '1', 'L', '1250', '0', '1', '2022-02-17 11:27:56', '2022-02-17 11:27:56'),
(4, '1', 'XL', '1500', '0', '1', '2022-02-17 11:27:56', '2022-02-17 11:27:56'),
(5, '2', 'S', '1200', '0', '1', '2022-02-17 13:49:16', '2022-02-17 13:49:16'),
(6, '2', 'M', '1500', '0', '1', '2022-02-17 13:49:16', '2022-02-17 13:49:16'),
(7, '2', 'L', '1650', '0', '1', '2022-02-17 13:49:16', '2022-02-17 13:49:16'),
(8, '2', 'XL', '1800', '0', '1', '2022-02-17 13:49:16', '2022-02-17 13:49:16'),
(9, '2', 'XXL', '2000', '0', '1', '2022-02-17 13:49:16', '2022-02-17 13:49:16'),
(10, '3', 'S', '1000', '0', '1', '2022-02-17 13:51:32', '2022-02-17 13:51:32'),
(11, '3', 'M', '1200', '0', '1', '2022-02-17 13:51:32', '2022-02-17 13:51:32'),
(12, '3', 'L', '1250', '0', '1', '2022-02-17 13:51:32', '2022-02-17 13:51:32'),
(13, '3', 'XL', '1500', '0', '1', '2022-02-17 13:51:32', '2022-02-17 13:51:32'),
(14, '3', 'XXL', '1600', '0', '1', '2022-02-17 13:51:33', '2022-02-17 13:51:33'),
(15, '3', 'XXXL', '1799', '0', '1', '2022-02-17 13:51:33', '2022-02-17 13:51:33'),
(16, '4', 'XL', '799', '0', '1', '2022-02-17 13:52:59', '2022-02-17 13:52:59'),
(17, '4', 'XXL', '899', '0', '1', '2022-02-17 13:52:59', '2022-02-17 13:52:59'),
(18, '4', 'XXXL', '999', '0', '1', '2022-02-17 13:52:59', '2022-02-17 13:52:59'),
(19, '5', 'M', '999', '0', '1', '2022-02-17 14:04:00', '2022-02-17 14:04:00'),
(20, '5', 'L', '1099', '0', '1', '2022-02-17 14:04:00', '2022-02-17 14:04:00'),
(21, '5', 'XL', '1199', '0', '1', '2022-02-17 14:04:00', '2022-02-17 14:04:00'),
(22, '5', 'XXL', '1299', '0', '1', '2022-02-17 14:04:00', '2022-02-17 14:04:00'),
(23, '6', 'XL', '799', '0', '1', '2022-02-17 14:07:07', '2022-02-17 14:07:07'),
(24, '6', 'XXL', '899', '0', '1', '2022-02-17 14:07:07', '2022-02-17 14:07:07'),
(25, '6', '3XL', '999', '0', '1', '2022-02-17 14:07:07', '2022-02-17 14:07:07'),
(26, '6', '4XL', '1099', '0', '1', '2022-02-17 14:07:07', '2022-02-17 14:07:07'),
(27, '7', '65-inch', '45000', '0', '1', '2022-02-17 14:13:17', '2022-02-17 14:13:17'),
(28, '8', '32-inch', '32000', '0', '1', '2022-02-17 14:14:59', '2022-02-17 14:14:59'),
(29, '10', NULL, NULL, '0', '1', '2022-02-17 14:37:26', '2022-02-17 14:37:26'),
(30, '10', NULL, NULL, '0', '1', '2022-02-17 14:37:26', '2022-02-17 14:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_weights`
--

CREATE TABLE `product_weights` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `promocode_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promocode_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promocode_percent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promocode_start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promocode_expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promocode_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `min_order_amount` int(11) DEFAULT NULL,
  `max_order_amount` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promocodes`
--

INSERT INTO `promocodes` (`id`, `promocode_name`, `promocode_amount`, `promocode_percent`, `promocode_start_date`, `promocode_expiry_date`, `promocode_status`, `created_at`, `min_order_amount`, `max_order_amount`, `updated_at`) VALUES
(1, 'PROMO12345', '150', '5', '2020-09-01', '2020-09-30', '1', '2020-09-13 12:21:32', NULL, NULL, '2020-09-13 12:21:32'),
(2, 'PROMO987', '1000', '100', '2020-09-15', '2020-10-31', '1', '2020-09-13 13:18:02', 10, 120, '2020-11-02 05:59:02'),
(3, 'test123', '500', '10', '2020-10-14', '2020-10-31', '0', '2020-10-13 17:45:06', 1000, 10000, '2020-10-17 08:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Abra', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(2, 'Agusan del Norte', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(3, 'Agusan del Sur', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(4, 'Aklan', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(5, 'Albay', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(6, 'Antique', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(7, 'Apayao', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(8, 'Aurora', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(9, 'Basilan', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(10, 'Bataan', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(11, 'Batanes', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(12, 'Batangas', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(13, 'Benguet', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(14, 'Biliran', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(15, 'Bohol', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(16, 'Bukidnon', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(17, 'Bulacan', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(18, 'Cagayan', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(19, 'Camarines Norte', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(20, 'Camarines Sur', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(21, 'Camiguin', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(22, 'Capiz', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(23, 'Catanduanes', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(24, 'Cavite', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(25, 'Cebu', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(26, 'Compostela Valley', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(27, 'Cotabato', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(28, 'Davao del Norte', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(29, 'Davao del Sur', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(30, 'Davao Oriental', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(31, 'Eastern Samar', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(32, 'Guimaras', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(33, 'Ifugao', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(34, 'Ilocos Norte', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(35, 'Ilocos Sur', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(36, 'Iloilo', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(37, 'Isabela', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(38, 'Kalinga', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(39, 'La Union', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(40, 'Laguna', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(41, 'Lanao del Norte', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(42, 'Lanao del Sur', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(43, 'Leyte', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(44, 'Maguindanao', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(45, 'Marinduque', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(46, 'Masbate', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(47, 'Metro Manila', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(48, 'Misamis Occidental', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(49, 'Misamis Oriental', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(50, 'Mountain Province', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(51, 'Negros Occidental', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(52, 'Negros Oriental', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(53, 'Northern Samar', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(54, 'Nueva Ecija', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(55, 'Nueva Vizcaya', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(56, 'Occidental Mindoro', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(57, 'Oriental Mindoro', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(58, 'Palawan', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(59, 'Pampanga', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(60, 'Pangasinan', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(61, 'Quezon', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(62, 'Quirino', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(63, 'Rizal', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(64, 'Romblon', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(65, 'Samar', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(66, 'Sarangani', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(67, 'Siquijor', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(68, 'Sorsogon', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(69, 'South Cotabato', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(70, 'Southern Leyte', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(71, 'Sultan Kudarat', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(72, 'Sulu', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(73, 'Surigao del Norte', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(74, 'Surigao del Sur', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(75, 'Tarlac', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(76, 'Tawi-Tawi', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(77, 'Zambales', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(78, 'Zamboanga del Norte', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(79, 'Zamboanga del Sur', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04'),
(80, 'Zamboanga Sibugay', 169, 1, '2020-05-27 14:04:04', '2020-05-27 14:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `registered_shops`
--

CREATE TABLE `registered_shops` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternate_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `category_ids` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availability` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `click_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `registered_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `admin_click` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registered_shops`
--

INSERT INTO `registered_shops` (`id`, `owner_name`, `shop_name`, `category`, `address`, `city`, `state`, `country`, `pincode`, `email`, `contact`, `alternate_contact`, `shop_code`, `registration_date`, `activation_date`, `created_at`, `updated_at`, `cover`, `slug`, `user_id`, `category_ids`, `availability`, `click_count`, `registered_by`, `admin_click`) VALUES
(1, 'XYZ', 'Shop1', 'Product Based', 'xyz', 'city', 'state', 'India', 110099, 'shop1@gmail.com', '9632587410', NULL, 'BA/S-56852', '13-09-2020', '13-09-2020', '2020-09-13 12:51:53', '2022-02-17 14:34:28', 'registered_shops/1600001512contact-icon2.png', 'Shop1-city-29', 29, '1', '1', '0', 'admin', 1),
(2, 'Hemant', 'Sanskriti', 'Product Based', 'Sanskriti', 'New Delhi', 'New Delhi', 'India', 110001, 'garggaurav.mca@gmail.com', '9810779462', NULL, 'BA/S-72554', '15-10-2020', '15-10-2020', '2020-10-15 01:50:47', '2021-01-01 19:31:00', 'registered_shops/1602726647Macaroni 450 Gm.jpg', 'Sanskriti-New-Delhi-33', 33, '9', '1', '0', 'admin', 1),
(5, 'NK', 'NK SHOP EDIT', 'Product Based', '1213', 'sdfhgh', 'New Delhi', 'India', 45657, 'navin.kumar@timbletech.com', '1234567890', '4567654567654', 'BA/NS-33455', '27-10-2020', '27-10-2020', '2020-10-27 11:01:34', '2020-11-02 21:55:34', 'registered_shops/1603796494Screenshot (4).png', 'NK-SHOP-sdfhgh-44', 44, '10', '1', '0', 'admin', 1),
(6, 'Rashmi', 'Madhav Consortium', 'Product Based', 'Orbit Plaza', 'Ghaziabad', 'Uttar Pradesh', 'India', 201016, 'madhavconsortium@gmail.com', '9873461243', NULL, 'BA/MC-6049', '01-01-2021', '01-01-2021', '2021-01-01 19:46:06', '2021-01-04 21:37:16', 'registered_shops/1609510565NASWIZ_65876130_2519821671381594_7573673238740336640_n.jpg', 'Madhav-Consortium-Ghaziabad-60', 60, '1,2,3,4,5,6,8,9', '1', '0', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Courier Service', 'Courier Service', NULL, '2020-09-17 16:48:55', '2020-09-17 16:48:55'),
(2, 'navin', 'navin', '<p>nd</p>', '2020-10-27 13:38:16', '2020-10-27 13:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(3, 3, 'App\\Shop\\Employees\\Employee'),
(3, 5, 'App\\Shop\\Employees\\Employee'),
(3, 11, 'App\\Shop\\Employees\\Employee'),
(3, 12, 'App\\Shop\\Employees\\Employee'),
(3, 13, 'App\\Shop\\Employees\\Employee'),
(3, 14, 'App\\Shop\\Employees\\Employee'),
(3, 19, 'App\\Shop\\Employees\\Employee'),
(3, 21, 'App\\Shop\\Employees\\Employee'),
(3, 22, 'App\\Shop\\Employees\\Employee'),
(3, 23, 'App\\Shop\\Employees\\Employee'),
(3, 25, 'App\\Shop\\Employees\\Employee'),
(3, 26, 'App\\Shop\\Employees\\Employee'),
(3, 29, 'App\\Shop\\Employees\\Employee'),
(3, 33, 'App\\Shop\\Employees\\Employee'),
(3, 35, 'App\\Shop\\Employees\\Employee'),
(3, 37, 'App\\Shop\\Employees\\Employee'),
(3, 44, 'App\\Shop\\Employees\\Employee'),
(3, 60, 'App\\Shop\\Employees\\Employee');

-- --------------------------------------------------------

--
-- Table structure for table `search_histories`
--

CREATE TABLE `search_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) NOT NULL,
  `max_click` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `search_histories`
--

INSERT INTO `search_histories` (`id`, `user_id`, `product_id`, `max_click`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 8, '2022-02-17 11:51:18', '2022-02-17 14:07:40'),
(2, 2, 7, 2, '2022-02-17 14:15:29', '2022-02-17 14:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_categories`
--

CREATE TABLE `shop_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icons` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 999,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `slug`, `cover`, `type`, `status`, `created_at`, `updated_at`, `user_id`, `priority`, `start_date`, `end_date`) VALUES
(3, 'Organic Food', '', 'sliders/1599332685slider1.jpg', 'slider', 1, '2020-09-05 12:41:37', '2022-02-17 11:50:44', 2, 999, '2020-09-01', '2022-03-28'),
(4, 'vegetables', '', 'sliders/15993733072.jpg', 'slider', 0, '2020-09-06 00:51:47', '2020-10-10 17:47:25', 2, 3, '2020-09-07', '2021-09-30'),
(5, NULL, '', 'sliders/1601196806Kidys2.jpg', 'slider', 1, '2020-09-27 08:04:06', '2020-10-16 09:34:03', 2, 3, '2020-09-27', '2022-09-12'),
(6, NULL, '', 'sliders/1601220920Sliders2.jpg', 'slider', 1, '2020-09-27 15:35:20', '2020-10-10 17:48:31', 2, 2, '2020-09-27', '2021-09-26'),
(7, 'Banner', '', 'sliders/1602840744lyu4eat9_grocery-oil-banner.jpg', 'slider', 1, '2020-10-16 09:32:24', '2020-10-16 09:32:24', 2, 1, '2020-10-16', '2020-11-30'),
(8, 'B2', '', 'sliders/1602845513rsz_7-2.jpg', 'slider', 1, '2020-10-16 09:44:11', '2020-10-16 10:51:53', 2, 4, '2020-10-16', '2022-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `profession`, `description`, `cover`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'XYZ', 'Developer', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</p>', 'testimonials/1602406019default.png', '1', '2020-09-22 18:21:53', '2020-10-11 08:46:59', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `account_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vendor',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `account_status`, `user_role`, `remember_token`, `created_at`, `updated_at`, `provider`, `provider_id`, `mobile`) VALUES
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$5cnjdM929kWNx1/Ofr/mN.YCNDxFb0yOYPX7gyMvl3/5/RssI0B0G', '1', 'Active', 'admin', NULL, '2020-08-09 18:01:48', '2020-09-24 17:30:46', NULL, NULL, NULL),
(28, 'Gaurav', 'riddhi.lic@hhhkhkk;;;jj\'\'j\'\'j\'', NULL, '$2y$10$Mob7G1WBORg7gklHAMeyw.DIg9X8HWOAwc5rulGOvY3ks28NoeMPi', '0', 'Active', 'customer', NULL, '2020-09-09 03:56:36', '2020-10-28 17:08:53', NULL, NULL, 9283983982139021),
(29, 'Shop1', 'shop1@gmail.com', NULL, '$2y$10$uR2m1oSuN8ohStI3NrrsSeHeuX7gqhyRE0fRbWkZIg3frZ4YNGt5u', '1', 'Active', 'vendor', NULL, '2020-09-13 12:51:53', '2020-09-13 12:51:53', NULL, NULL, NULL),
(30, 'subadmin', 'subadmin@gmail.com', NULL, '$2y$10$oQmaGgkug/J4HLM5QJmkp.Zb4fMZz/TVYd4UJTa8VehAkyYIyYztC', '1', 'Active', 'subadmin', NULL, '2020-09-13 13:29:10', '2020-09-13 13:29:10', NULL, NULL, NULL),
(31, 'jyotika sethi', 'jyotikasethi@gmail.com', NULL, '$2y$10$QgBNvx2Z0YH2UUFSekpdGuoDGRl.TybUpyerSOw6PMn2NEdcaR1eq', '1', 'Active', 'customer', NULL, '2020-09-13 13:42:06', '2020-09-25 06:33:45', NULL, NULL, NULL),
(32, 'gaurav', 'gauravgarg_mca@yahoo.com', NULL, '$2y$10$0baLXdmjlUSoyB5mwyORC.V.t0qY8ewhtU2BKlGR5NIvCeEmNd/GC', '1', 'Active', 'customer', NULL, '2020-10-12 12:16:32', '2020-11-03 22:36:58', NULL, NULL, 9810772541),
(33, 'Sanskriti', 'garggaurav.mca@gmail.com', NULL, '$2y$10$M4tMNnREc64dlT/LjIR1ReS/wTfjKhWxDZNLrbu2HBxycQKdyYsNC', '1', 'Active', 'vendor', NULL, '2020-10-15 01:50:47', '2021-01-01 19:31:00', NULL, NULL, NULL),
(34, 'Nitika Gairola', 'nitika.gairola@gmail.com', NULL, '$2y$10$1KvAp7Siya0g74DFkcPXnugkh60siNx6VxEpur7raRgoAILS5vBmW', '1', 'Active', 'customer', NULL, '2020-10-15 06:08:07', '2020-10-20 09:54:21', NULL, NULL, 9810882626),
(38, 'Vijender Singh Balhara', 'victor0274@gmail.com', NULL, '$2y$10$gaqfqOy5ULcZEaDmQZvELuHXjRH7GbMsoJO5KUtOapit0kb2sy3r.', '1', 'Active', 'customer', NULL, '2020-10-17 07:50:05', '2020-10-17 07:50:05', NULL, NULL, NULL),
(39, 'Eshna Chhillar', 'eshnachhillar27@gmail.com', NULL, '$2y$10$C9J2ZlQIYT6ftci4wfNOEu64AmujhGAJjgK/zP9xlUgjk7IcylbWK', '1', 'Active', 'customer', NULL, '2020-10-17 08:12:04', '2020-10-17 08:12:04', NULL, NULL, NULL),
(40, 'jyotika', 'jyotikasethi30070@gmail.com', NULL, '$2y$10$xCQOEOWxr0/xkURy4VCImemSNcv8Bwkqgx.azwCXJAAqzbIbIhLu2', '1', 'Active', 'customer', NULL, '2020-10-17 08:52:28', '2020-10-17 08:52:28', NULL, NULL, NULL),
(41, 'Ravi', 'toravisaini@gmail.com', NULL, '$2y$10$V/QuznsB.3jlQ8zzy1Z2UOvCYs0id/eDhf7tkvMIZAy5ay6xVUzZO', '1', 'Active', 'customer', NULL, '2020-10-17 10:54:55', '2020-10-17 11:42:13', NULL, NULL, NULL),
(42, 'saurabh', 'er_saurabhgarg@yahoo.com', NULL, '$2y$10$klRV7WwYTmWF/U4FMuqSL.l89d0bfXLTt9ftmL6smz6VZ.dZYmCiK', '1', 'Active', 'customer', NULL, '2020-10-17 11:03:47', '2020-10-18 08:03:29', NULL, NULL, NULL),
(43, 'Saurabh Garg', 'er.gargsaurabh@gmail.com', NULL, '$2y$10$EXBnZootQKUM8n8aHmR5VumP6dS./uil5xHoOsTSdoud6VM4aUxjW', '1', 'Active', 'customer', NULL, '2020-10-17 11:10:21', '2020-10-17 11:10:21', NULL, NULL, NULL),
(44, 'NK SHOP', 'navin.kumar@timbletech.com', NULL, '$2y$10$3mtOAwlFy4.Zh32hSnxXpOF9lXGClQ6u/dVG94NI3eTgjFGlq92eu', '1', 'Ban', 'vendor', NULL, '2020-10-27 11:01:34', '2021-01-01 19:28:07', NULL, NULL, NULL),
(46, 'navin edit3', 'navinedit.kumar@timbletech.com', NULL, '$2y$10$Z23hSz2XUAiGWVJV8OyTH.6CC7XE.TWHmKj/a9aveoXGmL4hSvtci', '1', 'Active', 'customer', NULL, '2020-10-27 13:21:31', '2020-10-27 13:22:01', NULL, NULL, 8287597088),
(49, 'navin23', 'navinedit.kumar33@timbletech.com', NULL, '$2y$10$CyIxQQQ.SIKVyHaLA.Pppe40Ny2HIH3iKBlwbG5xebmujOdgKe.9a', '1', 'Active', 'subadmin', NULL, '2020-10-27 13:35:47', '2020-10-27 13:36:05', NULL, NULL, NULL),
(51, 'riya', 'jyotikasethi3007@gmail.com', NULL, '$2y$10$k5Z6M0lZSyYYi56hBKMMu.lF9Hg0MQI9C4PcR1NzyyUU1k/v90Cq6', '1', 'Active', 'customer', NULL, '2020-10-27 15:37:16', '2022-02-17 10:37:41', NULL, NULL, 9056560413),
(52, 'ryas', 'ryas@gmail.com', NULL, '$2y$10$zB/VyjlrQWq0Ji8TEvwaHecnW1Thljibrx9a0Og3ZKR3U6xYmYYsm', '1', 'Active', 'customer', NULL, '2020-10-27 15:58:42', '2020-10-27 15:58:42', NULL, NULL, NULL),
(53, 'test', 'test1@gmail.com', NULL, '$2y$10$BJDm.K9S29w8.4aivJhsyerBzHMmtnK4RrV/VwUdMy985I0L6PwuW', '0', 'Active', 'guest', NULL, '2020-10-28 17:09:31', '2020-10-28 17:09:31', NULL, NULL, NULL),
(54, 'sjksakjsdlkd', 'jhsajihsa@gnnann.com', NULL, '$2y$10$Mb97mcAu7mkbTlp5KmQGy.vmcMkfAsbRfvzlVZrjuNpwjALCtcQjW', '1', 'Active', 'customer', NULL, '2020-10-31 16:43:50', '2020-11-09 17:29:05', NULL, NULL, 9810672368),
(55, 'hellow', 'hellow@gmail.com', NULL, '$2y$10$V2C7fzaSoaX5EozR8EUtn.ry023.ErpKUGZORaRl8JlUWSCKA6w2m', '1', 'Active', 'customer', NULL, '2020-11-02 06:12:10', '2020-11-02 06:12:10', NULL, NULL, NULL),
(56, 'lopoop', 'jyotikasethi3007@gmail.com12', NULL, '$2y$10$I.FPArvzwMZCzNbGmX9gi.MHcnouFxmNBblJ/cL2QieG6Yrv/j0oq', '1', 'Active', 'customer', NULL, '2020-11-02 20:51:29', '2020-11-02 20:51:29', NULL, NULL, NULL),
(57, 'shribha garg', 'shribhagarg@yahoo.co.in', NULL, '$2y$10$dty8exoGRj8cb91EqRah1Oy3Qjb2LNGRzI4A4XHWScsfLdeHhgdRy', '1', 'Active', 'customer', NULL, '2020-11-23 19:07:05', '2020-11-23 19:07:05', NULL, NULL, NULL),
(58, 'images', 'test@gmail.com', NULL, '$2y$10$5hU8mjKpQguVGuOC2FIQF.Yk1hXa.qJrm4Uva00fyF2V6RD7vm.dO', '0', 'Active', 'guest', NULL, '2020-12-21 12:18:01', '2020-12-21 12:18:01', NULL, NULL, NULL),
(59, 'SAFAA', 'SASHJ@GAJASKJ.COM', NULL, '$2y$10$NvOEkWhcQQPQKkF5rLY4g.J65hIrbG7Gn2wItSFycFUYjHN91PNnK', '0', 'Active', 'guest', NULL, '2020-12-26 13:05:45', '2020-12-26 13:05:45', NULL, NULL, NULL),
(60, 'Madhav Consortium', 'madhavconsortium@gmail.com', NULL, '$2y$10$u1iawUy306R3U/pRqTvjleNic3XRYh.7JLTNcvWRrziLPGGyxRCjO', '1', 'Active', 'vendor', NULL, '2021-01-01 19:46:06', '2021-01-01 19:46:06', NULL, NULL, NULL),
(61, 'Smith', 'netsparker@example.com', NULL, '$2y$10$Oov74Gj1sb1Cw8.GL1BvBege3zrjaiAv4VjJYV1NUB.WMfVnExNbm', '1', 'Active', 'customer', NULL, '2021-02-15 22:40:33', '2021-02-15 22:40:33', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_shop_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_country_id_index` (`country_id`),
  ADD KEY `addresses_customer_id_index` (`customer_id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_value_product_attribute`
--
ALTER TABLE `attribute_value_product_attribute`
  ADD KEY `attribute_value_product_attribute_attribute_value_id_foreign` (`attribute_value_id`),
  ADD KEY `attribute_value_product_attribute_product_attribute_id_foreign` (`product_attribute_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_reviews`
--
ALTER TABLE `blog_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_category_id_index` (`category_id`),
  ADD KEY `category_product_product_id_index` (`product_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD KEY `cities_province_id_foreign` (`province_id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_verifications`
--
ALTER TABLE `email_verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_products`
--
ALTER TABLE `inventory_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newletter_posts`
--
ALTER TABLE `newletter_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pincodes`
--
ALTER TABLE `pincodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_index` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_weights`
--
ALTER TABLE `product_weights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinces_country_id_index` (`country_id`);

--
-- Indexes for table `registered_shops`
--
ALTER TABLE `registered_shops`
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
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `search_histories`
--
ALTER TABLE `search_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_reviews`
--
ALTER TABLE `blog_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_verifications`
--
ALTER TABLE `email_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_products`
--
ALTER TABLE `inventory_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `newletter_posts`
--
ALTER TABLE `newletter_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pincodes`
--
ALTER TABLE `pincodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product_weights`
--
ALTER TABLE `product_weights`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `registered_shops`
--
ALTER TABLE `registered_shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `search_histories`
--
ALTER TABLE `search_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop_categories`
--
ALTER TABLE `shop_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
