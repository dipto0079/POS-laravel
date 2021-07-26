-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2021 at 12:51 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upwork_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2020_08_11_104245_create_super_admins_table', 1),
(29, '2020_08_11_152853_create_countries_table', 1),
(30, '2020_08_11_153952_create_states_table', 1),
(31, '2020_08_11_154013_create_cities_table', 1),
(32, '2020_08_12_183238_create_cuisines_table', 1),
(33, '2020_08_12_184312_create_privacy_policies_table', 1),
(34, '2020_08_14_154829_create_restaurants_table', 1),
(35, '2020_08_18_173126_create_restaurant_users_table', 1),
(36, '2020_08_18_175147_create_restaurant_ingredient_units_table', 1),
(37, '2020_08_18_181138_create_restaurant_ingredient_categories_table', 1),
(38, '2020_08_18_182041_create_restaurant_ingredients_table', 1),
(39, '2020_08_18_182233_create_restaurant_suppliers_table', 1),
(40, '2020_08_20_162929_create_restaurant_purchases_table', 2),
(41, '2020_08_20_162956_create_restaurant_purchase_ingredients_table', 2),
(42, '2020_08_21_145512_create_restaurant_customers_table', 3),
(44, '2020_08_21_162524_create_restaurant_food_menu_categories_table', 4),
(47, '2020_08_21_162454_create_restaurant_food_menu_shifts_table', 5),
(48, '2020_08_22_073301_create_restaurant_kitchen_panels_table', 6),
(50, '2020_08_31_142507_create_restaurant_food_menu_modifiers_table', 7),
(51, '2020_08_31_142649_create_restaurant_food_menu_modifier_ingredients_table', 8),
(52, '2020_09_01_163108_create_restaurant_settings_taxes_table', 9),
(53, '2020_09_01_163213_create_restaurant_settings_tax_fields_table', 9),
(54, '2020_09_01_163225_create_restaurant_settings_logos_table', 9),
(58, '2020_09_04_171558_create_restaurant_food_menus_table', 11),
(59, '2020_09_04_171638_create_restaurant_food_menu_ingredients_table', 12),
(60, '2020_09_04_171937_create_restaurant_modifier_for_food_menus_table', 13),
(61, '2020_10_01_151651_create_restaurant_floor_table', 14),
(62, '2020_10_03_133930_create_restaurant_floor_tables_table', 15),
(72, '2020_10_07_175031_create_restaurant_sales_table', 16),
(73, '2020_10_12_215854_create_restaurant_sales_details_table', 16),
(74, '2020_10_12_222105_create_restaurant_sales_details_modifiers_table', 16),
(75, '2020_10_12_222929_create_restaurant_sales_consumptions_table', 16),
(76, '2020_10_12_223237_create_restaurant_sales_consumptions_of_menus_table', 16),
(77, '2020_10_12_223743_create_restaurant_sales_consumptions_of_modifiers_of_menus_table', 16),
(78, '2020_10_12_224426_create_restaurant_orders_tables_table', 16),
(79, '2020_10_17_111536_add_youtube_link_to_tbl_restaurant_settings_social_links_table', 17),
(80, '2020_10_17_135936_create_restaurant_shift_for_food_menus_table', 18),
(81, '2020_10_17_192654_add_rate_tbl_restaurant_settings_tax_fields_table', 19),
(82, '2020_10_18_212039_add_current_stock_tbl_restaurant_ingredients', 20),
(83, '2020_10_22_123245_create_restaurant_sales_holds_table', 21),
(84, '2020_10_22_123625_create_restaurant_sales_holds_details_table', 21),
(85, '2020_10_22_123707_create_restaurant_sales_holds_details_modifiers_table', 22),
(86, '2020_11_12_005245_create_notifications_table', 23),
(87, '2020_11_12_023101_create_kitchen_notifications_table', 24),
(89, '2020_11_20_182540_create_restaurant_expense_items_table', 25),
(90, '2020_11_20_182926_create_restaurant_expenses_table', 26),
(91, '2020_11_21_190314_create_restaurant_wastes_table', 27),
(92, '2020_11_21_190521_create_restaurant_waste_ingredients_table', 27),
(93, '2020_11_24_213854_create_restaurant_attendances_table', 28),
(94, '2020_12_05_103506_create_restaurant_stock_adjustments_table', 29),
(95, '2020_12_05_104941_create_restaurant_stock_adjustment_ingredients_table', 30),
(96, '2020_12_10_112133_add_country_state_city_to_tbl_restaurant_suppliers_table', 31),
(97, '2020_12_15_105747_create_social_media_table', 32),
(98, '2020_09_01_175425_create_restaurant_settings_social_links_table', 33),
(99, '2020_12_15_203611_create_third_party_vendors_table', 34),
(100, '2020_12_16_205507_create_restaurant_settings_third_party_vendors_table', 35),
(101, '2020_12_17_122104_create_restaurant_settings_charges_table', 36),
(103, '2020_12_17_191349_create_charges_table', 37),
(104, '2020_12_26_191024_create_restaurant_gift_cards_table', 38),
(105, '2020_12_27_212134_create_restaurant_gift_card_sells_table', 39),
(106, '2020_12_28_144108_create_restaurant_sales_payment_by_gift_cards_table', 40),
(107, '2020_12_29_151707_create_restaurant_category_for_suppliers_table', 41),
(108, '2021_01_07_014412_create_restaurant_settings_cuisines_table', 42),
(109, '2021_01_10_225735_create_customers_table', 43),
(110, '2021_01_11_192101_create_customer_addresses_table', 44),
(111, '2021_01_14_172115_create_customer_online_orders_table', 45),
(112, '2021_01_14_172150_create_customer_online_order_details_table', 45),
(113, '2021_01_14_172237_create_customer_online_order_details_modifiers_table', 46),
(114, '2021_01_15_014142_create_customer_online_order_delivery_addresses_table', 47),
(117, '2021_01_23_213805_create_restaurant_customer_groups_table', 48),
(118, '2021_01_28_221827_create_customer_restaurant_subscriptions_table', 49),
(119, '2021_01_31_215529_create_customer_reservations_table', 50);

-- --------------------------------------------------------

--
-- Table structure for table `table_sub_category`
--

DROP TABLE IF EXISTS `table_sub_category`;
CREATE TABLE IF NOT EXISTS `table_sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `delay_time` text,
  `description` varchar(250) DEFAULT NULL,
  `added_by` text,
  `creat_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `restaurant_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_sub_category`
--

INSERT INTO `table_sub_category` (`id`, `name`, `delay_time`, `description`, `added_by`, `creat_at`, `restaurant_id`) VALUES
(19, 'Dipto', '10', 'asdf', '13', '2021-03-15 05:57:20', '8'),
(17, 'Meet', '2', 'sdadasd', '21', '2021-03-14 08:35:14', '8'),
(18, 'Vagitable', '2', '332', '21', '2021-03-14 08:35:34', '8'),
(15, 'vasitable', '3', 'good vasitable', '10', '2021-03-01 05:37:35', '8'),
(14, 'food', '2', 'good food', '10', '2021-03-01 05:37:14', '8'),
(20, 'All You Can Eat', '0', '54', '10', '2021-03-15 17:07:27', '8'),
(21, 'asdf', '20', 'asd', '10', '2021-03-27 07:07:21', '8'),
(22, 'Less', '20', 'Boss', '10', '2021-04-07 10:32:44', '8');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_charges`
--

DROP TABLE IF EXISTS `tbl_charges`;
CREATE TABLE IF NOT EXISTS `tbl_charges` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_charges`
--

INSERT INTO `tbl_charges` (`id`, `name`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'POS Charges', 'Live', '2020-12-17 13:43:11', '2020-12-17 13:43:11'),
(2, 'POS Server', 'Live', '2020-12-17 13:43:20', '2020-12-17 13:43:20'),
(3, 'POS Ordering Pads', 'Live', '2020-12-17 13:43:29', '2020-12-17 13:43:29'),
(4, 'Kitchen Printers', 'Live', '2020-12-17 13:43:39', '2020-12-17 13:43:39'),
(5, 'Social Marketing', 'Live', '2020-12-17 13:43:48', '2020-12-17 13:43:48'),
(6, 'Reservation System', 'Live', '2020-12-17 13:43:57', '2020-12-17 13:43:57'),
(7, 'Online Ordering', 'Live', '2020-12-17 13:44:05', '2020-12-17 13:44:05'),
(8, 'Website', 'Live', '2020-12-17 13:44:12', '2020-12-17 13:44:12'),
(9, 'Training', 'Live', '2020-12-17 13:44:20', '2020-12-17 13:44:20'),
(10, 'Bookkeeping', 'Live', '2020-12-17 13:44:26', '2020-12-17 13:44:26'),
(11, 'Payroll', 'Live', '2020-12-17 13:44:34', '2020-12-17 13:44:34'),
(12, 'Support', 'Live', '2020-12-17 13:44:41', '2020-12-17 13:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cities`
--

DROP TABLE IF EXISTS `tbl_cities`;
CREATE TABLE IF NOT EXISTS `tbl_cities` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_cities_country_id_foreign` (`country_id`),
  KEY `tbl_cities_state_id_foreign` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_cities`
--

INSERT INTO `tbl_cities` (`id`, `name`, `country`, `state`, `country_id`, `state_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'Bangladesh', 'Nikunja', 1, 1, 'Deleted', '2020-08-19 08:46:56', '2020-10-06 08:03:43'),
(2, 'New York City', 'USA', 'New York', 1, 1, 'Live', '2020-10-06 08:03:19', '2021-01-13 04:47:20'),
(3, 'Los Angeles', 'USA', 'California', 1, 5, 'Live', '2020-10-06 08:05:14', '2021-01-13 04:47:06'),
(4, 'Ashburn', 'USA', 'Virginia', 1, 7, 'Live', '2021-01-19 18:15:49', '2021-01-19 18:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

DROP TABLE IF EXISTS `tbl_countries`;
CREATE TABLE IF NOT EXISTS `tbl_countries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`id`, `name`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'USA', 'Live', '2020-08-19 08:46:39', '2021-01-13 04:45:57'),
(2, 'nepal', 'Deleted', '2020-10-06 07:41:16', '2020-10-06 07:42:05'),
(3, 'India', 'Deleted', '2020-10-06 07:42:55', '2021-01-13 04:45:45'),
(4, 'UK', 'Live', '2021-03-08 07:46:23', '2021-03-08 07:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuisines`
--

DROP TABLE IF EXISTS `tbl_cuisines`;
CREATE TABLE IF NOT EXISTS `tbl_cuisines` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_cuisines`
--

INSERT INTO `tbl_cuisines` (`id`, `name`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Chinese', 'Live', '2020-10-06 08:07:41', '2020-10-06 08:07:41'),
(2, 'French', 'Deleted', '2020-10-06 08:07:55', '2020-10-06 08:08:05'),
(3, 'Italian', 'Live', '2020-10-06 08:09:05', '2020-10-06 08:09:40'),
(4, 'Indian', 'Live', '2020-10-06 08:09:53', '2020-10-06 08:09:53'),
(5, 'Russian', 'Live', '2020-10-06 08:10:05', '2020-10-06 08:10:05'),
(6, 'Deli', 'Live', '2021-01-06 19:12:14', '2021-01-06 19:12:14'),
(7, 'Mediterranean', 'Live', '2021-01-06 19:12:54', '2021-01-06 19:12:54'),
(8, 'Middle Eastern', 'Live', '2021-01-06 19:13:04', '2021-01-06 19:13:04'),
(9, 'Barbeque', 'Live', '2021-01-06 19:13:11', '2021-01-06 19:13:11'),
(10, 'Sandwiches', 'Live', '2021-01-06 19:13:19', '2021-01-06 19:13:19'),
(11, 'Japanese', 'Live', '2021-01-06 19:13:25', '2021-01-06 19:13:25'),
(12, 'Diner', 'Live', '2021-01-06 19:13:31', '2021-01-06 19:13:31'),
(13, 'Mexican', 'Live', '2021-01-06 19:13:49', '2021-01-06 19:13:49'),
(14, 'Sushi', 'Live', '2021-01-06 19:13:57', '2021-01-06 19:13:57'),
(15, 'Burgers', 'Live', '2021-01-06 19:14:04', '2021-01-06 19:14:04'),
(16, 'Greek', 'Live', '2021-01-06 19:14:11', '2021-01-06 19:14:11'),
(17, 'Vegetarian', 'Live', '2021-01-06 19:14:19', '2021-01-06 19:14:19'),
(18, 'Thai', 'Live', '2021-01-06 19:14:27', '2021-01-06 19:14:27'),
(19, 'cscs', 'Live', '2021-01-06 19:14:34', '2021-01-06 19:14:34'),
(20, 'Healthy', 'Live', '2021-01-06 19:14:47', '2021-01-06 19:14:47'),
(21, 'Korean', 'Live', '2021-01-06 19:15:14', '2021-01-06 19:15:14'),
(22, 'Pizza', 'Live', '2021-01-06 19:15:22', '2021-01-06 19:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

DROP TABLE IF EXISTS `tbl_customers`;
CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forgot_password` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `email_verification_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`id`, `name`, `phone`, `email`, `password`, `forgot_password`, `email_verified_at`, `email_verified`, `email_verification_token`, `address_id`, `profile_picture`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'mehedi hasan shuvo1', '+8801521493732', 'hasanshuvom884@gmail.com', '$2y$10$MT2tXg..22llK/A6ucaYsuxY/5ALlkdsdmQurCBKM1O6AkrY2WuWe', '0', NULL, 1, 'e6SeYj98xgbIEBVaGEc0jDdld58dQVkZ', NULL, '1610352291_48404763_1947315848718239_2462186707915636736_o.jpg', 'Live', '2021-01-10 17:37:18', '2021-01-11 09:37:54'),
(2, 'shuvo', '01759622441', 'shuvo.rpm@gmail.com', '$2y$10$MT2tXg..22llK/A6ucaYsuxY/5ALlkdsdmQurCBKM1O6AkrY2WuWe', '0', '2021-01-11 19:18:17', 1, 'bXfLdjuklZyX5ddDPUONNKMMFKAoKcwT', NULL, NULL, 'Live', '2021-01-11 19:16:19', '2021-01-11 19:18:17'),
(4, 'Customer', '+11234567894', 'Customer@gmail.com', '$2y$10$g7edGkdl9qubPBDB0xXVZejsrsbzzGACgOK5NA8bAlTNwWOHC.EFK', '3dbc1883-f255-4b1f-a887-34b5da563c4d', '2021-04-09 07:46:30', 1, 'gMSXwyShV6c12fxk27Psyfq62xcJn8Af', NULL, '1618056280_user1.png', 'Live', '2021-04-09 07:46:18', '2021-04-10 12:04:40'),
(5, 'Towhid Hasan', '+11243453453', 'towhidhasang1@gmail.com', '$2y$10$pOCUu5hHxblQYjx7ero.cO2MBq4fbtfdjDMi0TxRx0ncsYzJtmm4.', '0', NULL, 0, 'kew1fvsWwjUpDg45ZX14PbDdNmSklz7i', NULL, NULL, 'Live', '2021-04-12 04:51:36', '2021-04-12 04:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_addresses`
--

DROP TABLE IF EXISTS `tbl_customer_addresses`;
CREATE TABLE IF NOT EXISTS `tbl_customer_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `default_address` tinyint(1) NOT NULL DEFAULT '0',
  `customer_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_customer_addresses_city_id_foreign` (`city_id`),
  KEY `tbl_customer_addresses_state_id_foreign` (`state_id`),
  KEY `tbl_customer_addresses_country_id_foreign` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer_addresses`
--

INSERT INTO `tbl_customer_addresses` (`id`, `address`, `apt`, `zip`, `city_id`, `state_id`, `country_id`, `note`, `default_address`, `customer_id`, `del_status`, `created_at`, `updated_at`) VALUES
(2, '2/2, Ali and noor real estate', '4th floor', '1207', 3, 5, 1, NULL, 0, '1', 'Live', '2021-01-11 14:59:21', '2021-01-18 15:13:26'),
(3, 'Jangalia', '5c', '2010', 2, 5, 1, '', 0, '1', 'Deleted', '2021-01-11 15:19:19', '2021-01-18 15:13:26'),
(4, 'Nikunja 2', '4th floor', '1230', 2, 1, 1, NULL, 0, '1', 'Live', '2021-01-11 15:20:19', '2021-01-18 15:13:26'),
(5, 'm/13, noorjahan road, mohammodpur, dhaka', '4th floor', '1207', 2, 5, 1, '', 1, '2', 'Live', '2021-01-11 19:31:34', '2021-01-11 19:31:34'),
(6, 'jhgjg', 'jljl', '545454', 3, 5, 1, 'gjgjgjg', 0, '4', 'Live', '2021-04-09 08:54:49', '2021-04-09 11:39:26'),
(7, 'khulna\r\nkhulna', 'wew', '9000', 2, 1, 1, 'asasas', 1, '4', 'Live', '2021-04-09 11:39:26', '2021-04-09 11:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_online_orders`
--

DROP TABLE IF EXISTS `tbl_customer_online_orders`;
CREATE TABLE IF NOT EXISTS `tbl_customer_online_orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online_order_no` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '000000',
  `total_items` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_total` double(10,2) DEFAULT NULL,
  `paid_amount` double(10,2) DEFAULT NULL,
  `due_amount` double(10,2) DEFAULT NULL,
  `due_payment_date` date DEFAULT NULL,
  `disc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disc_actual` double(10,2) DEFAULT NULL,
  `vat` double(10,2) DEFAULT NULL,
  `total_payable` double(10,2) DEFAULT NULL,
  `payment_method_id` bigint(20) UNSIGNED DEFAULT NULL,
  `table_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_item_discount_amount` double(10,2) DEFAULT NULL,
  `sub_total_with_discount` double(10,2) DEFAULT NULL,
  `sub_total_discount_amount` double(10,2) DEFAULT NULL,
  `total_discount_amount` double(10,2) DEFAULT NULL,
  `delivery_charge` double(10,2) DEFAULT NULL,
  `sub_total_discount_value` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total_discount_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_time` time NOT NULL,
  `delivery_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_time` time DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` tinyint(4) NOT NULL COMMENT '1=new order, 2=accepted order, 3=rejected order',
  `order_type` tinyint(4) NOT NULL COMMENT '4= take-away, 2= dine in, 3= Delivery',
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `sale_vat_objects` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_customer_online_orders_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer_online_orders`
--

INSERT INTO `tbl_customer_online_orders` (`id`, `customer_id`, `online_order_no`, `total_items`, `sub_total`, `paid_amount`, `due_amount`, `due_payment_date`, `disc`, `disc_actual`, `vat`, `total_payable`, `payment_method_id`, `table_id`, `total_item_discount_amount`, `sub_total_with_discount`, `sub_total_discount_amount`, `total_discount_amount`, `delivery_charge`, `sub_total_discount_value`, `sub_total_discount_type`, `token_no`, `sale_date`, `sale_time`, `delivery_date`, `delivery_time`, `restaurant_id`, `order_status`, `order_type`, `del_status`, `sale_vat_objects`, `created_at`, `updated_at`) VALUES
(2, '1', '000001', 1, 340.00, NULL, NULL, NULL, NULL, NULL, NULL, 340.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-14', '23:58:22', '01/14/2021', '23:58:15', 3, 3, 3, 'Live', NULL, '2021-01-14 17:58:22', '2021-01-15 19:28:33'),
(3, '1', '000002', 1, 210.00, NULL, NULL, NULL, NULL, NULL, NULL, 210.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-15', '00:00:26', '01/15/2021', '00:00:21', 3, 3, 3, 'Live', NULL, '2021-01-14 18:00:26', '2021-01-14 18:00:26'),
(4, '2', '000003', 1, 220.00, NULL, NULL, NULL, NULL, NULL, NULL, 220.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-15', '00:07:09', '01/15/2021', '00:07:04', 3, 3, 3, 'Live', NULL, '2021-01-14 18:07:09', '2021-01-14 18:07:09'),
(5, '1', '000005', 1, 110.00, NULL, NULL, NULL, NULL, NULL, NULL, 110.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-15', '01:57:37', '01/15/2021', '01:57:29', 3, 2, 3, 'Live', NULL, '2021-01-14 19:57:37', '2021-01-15 21:12:52'),
(6, '1', '000006', 1, 180.00, NULL, NULL, NULL, NULL, NULL, NULL, 180.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-15', '02:04:16', '01/15/2021', '02:03:44', 3, 1, 3, 'Live', NULL, '2021-01-14 20:04:16', '2021-01-14 20:04:17'),
(7, '1', '000007', 1, 170.00, NULL, NULL, NULL, NULL, NULL, NULL, 170.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-15', '02:08:30', '01/15/2021', '02:08:26', 3, 1, 3, 'Live', NULL, '2021-01-14 20:08:30', '2021-01-14 20:08:30'),
(8, '1', '000008', 1, 110.00, NULL, NULL, NULL, NULL, NULL, NULL, 110.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-15', '02:13:13', '01/15/2021', '02:13:09', 3, 1, 3, 'Live', NULL, '2021-01-14 20:13:13', '2021-01-14 20:13:13'),
(9, '1', '000009', 1, 110.00, NULL, NULL, NULL, NULL, NULL, NULL, 110.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-15', '02:15:46', '01/15/2021', '02:15:41', 3, 2, 3, 'Live', NULL, '2021-01-14 20:15:46', '2021-01-26 19:13:57'),
(10, '1', '000010', 3, 762.00, NULL, NULL, NULL, NULL, NULL, NULL, 762.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-15', '02:36:43', '01/15/2021', '02:35:45', 3, 2, 3, 'Live', NULL, '2021-01-14 20:36:43', '2021-01-26 19:11:41'),
(11, '1', '000011', 1, 170.00, NULL, NULL, NULL, NULL, NULL, NULL, 170.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-15', '02:38:59', '01/15/2021', '02:38:55', 3, 2, 3, 'Live', NULL, '2021-01-14 20:38:59', '2021-01-15 19:40:14'),
(12, '1', '000012', 1, 110.00, NULL, NULL, NULL, NULL, NULL, NULL, 110.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-15', '03:19:35', '01/15/2021', '03:19:26', 3, 2, 3, 'Live', NULL, '2021-01-14 21:19:35', '2021-01-15 19:38:37'),
(13, '1', '000013', 1, 100.00, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-17', '00:23:33', '01/17/2021', '00:19:44', 3, 2, 2, 'Live', NULL, '2021-01-16 18:23:33', '2021-01-26 19:16:30'),
(14, '1', '000014', 1, 110.00, NULL, NULL, NULL, NULL, NULL, NULL, 110.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-29', '00:01:10', '01/28/2021', '22:08:37', 3, 1, 3, 'Live', NULL, '2021-01-28 18:01:10', '2021-01-28 18:01:10'),
(15, '1', '000015', 1, 110.00, NULL, NULL, NULL, NULL, NULL, NULL, 110.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-29', '00:07:49', '01/29/2021', '00:07:24', 3, 1, 3, 'Live', NULL, '2021-01-28 18:07:49', '2021-01-28 18:07:49'),
(16, '1', '000016', 1, 110.00, NULL, NULL, NULL, NULL, NULL, NULL, 110.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-29', '00:43:12', '01/29/2021', '00:21:45', 3, 1, 3, 'Live', NULL, '2021-01-28 18:43:12', '2021-01-28 18:43:12'),
(19, '4', '000019', 1, 30.00, NULL, NULL, NULL, NULL, NULL, NULL, 30.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-09', '15:28:39', '2021-04-09', '15:28:00', 8, 1, 3, 'Live', NULL, '2021-04-09 09:28:39', '2021-04-09 09:28:39'),
(20, '4', '000020', 1, 39.00, NULL, NULL, NULL, NULL, NULL, NULL, 39.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-09', '15:29:24', '2021-04-09', '15:29:00', 8, 1, 2, 'Live', NULL, '2021-04-09 09:29:24', '2021-04-09 09:29:24'),
(22, '4', '000022', 1, 42.00, NULL, NULL, NULL, NULL, NULL, NULL, 42.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-09', '15:30:52', '2021-04-09', '15:30:00', 8, 1, 2, 'Live', NULL, '2021-04-09 09:30:52', '2021-04-09 09:30:52'),
(23, '4', '000023', 3, 90.00, NULL, NULL, NULL, NULL, NULL, NULL, 90.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-09', '15:55:41', '2021-04-09', '15:55:00', 8, 1, 2, 'Live', NULL, '2021-04-09 09:55:41', '2021-04-09 09:55:41'),
(24, '4', '000024', 2, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-09', '16:12:16', '2021-04-09', '15:57:00', 8, 1, 2, 'Live', NULL, '2021-04-09 10:12:16', '2021-04-09 10:12:16'),
(25, '4', '000025', 1, 15.00, NULL, NULL, NULL, NULL, NULL, NULL, 15.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-09', '16:15:52', '2021-04-09', '16:15:00', 8, 1, 3, 'Live', NULL, '2021-04-09 10:15:52', '2021-04-09 10:15:52'),
(26, '4', '000026', 1, 15.00, NULL, NULL, NULL, NULL, NULL, NULL, 15.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-09', '16:19:19', '2021-04-09', '16:19:00', 8, 1, 4, 'Live', NULL, '2021-04-09 10:19:19', '2021-04-09 10:19:19'),
(27, '4', '000027', 1, 30.00, NULL, NULL, NULL, NULL, NULL, NULL, 30.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-09', '16:22:14', '2021-04-09', '16:22:00', 8, 1, 4, 'Live', NULL, '2021-04-09 10:22:14', '2021-04-09 10:22:14'),
(28, '4', '000028', 3, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-12', '17:32:34', '2021-04-12', '17:32:00', 8, 1, 3, 'Live', NULL, '2021-04-12 11:32:34', '2021-04-12 11:32:34'),
(29, '4', '000029', 3, 75.00, NULL, NULL, NULL, NULL, NULL, NULL, 75.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-12', '17:50:56', '2021-04-12', '17:50:00', 8, 1, 3, 'Live', NULL, '2021-04-12 11:50:56', '2021-04-12 11:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_online_order_delivery_addresses`
--

DROP TABLE IF EXISTS `tbl_customer_online_order_delivery_addresses`;
CREATE TABLE IF NOT EXISTS `tbl_customer_online_order_delivery_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online_order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer_online_order_delivery_addresses`
--

INSERT INTO `tbl_customer_online_order_delivery_addresses` (`id`, `customer_id`, `customer_address_id`, `online_order_id`, `created_at`, `updated_at`) VALUES
(1, '1', '2', 5, '2021-01-14 19:57:37', '2021-01-14 19:57:37'),
(2, '1', '4', 6, '2021-01-14 20:04:17', '2021-01-14 20:04:17'),
(3, '1', '2', 7, '2021-01-14 20:08:30', '2021-01-14 20:08:30'),
(4, '1', '2', 8, '2021-01-14 20:13:13', '2021-01-14 20:13:13'),
(5, '1', '2', 9, '2021-01-14 20:15:46', '2021-01-14 20:15:46'),
(6, '1', '2', 10, '2021-01-14 20:36:44', '2021-01-14 20:36:44'),
(7, '1', '2', 11, '2021-01-14 20:38:59', '2021-01-14 20:38:59'),
(8, '1', '4', 12, '2021-01-14 21:19:36', '2021-01-14 21:19:36'),
(9, '1', '2', 13, '2021-01-26 18:31:48', '2021-01-26 18:31:48'),
(10, '1', NULL, 14, '2021-01-28 18:01:10', '2021-01-28 18:01:10'),
(11, '1', '4', 15, '2021-01-28 18:07:49', '2021-01-28 18:07:49'),
(12, '1', '2', 16, '2021-01-28 18:43:12', '2021-01-28 18:43:12'),
(13, '4', '6', 19, '2021-04-09 09:28:39', '2021-04-09 09:28:39'),
(14, '4', '6', 25, '2021-04-09 10:15:53', '2021-04-09 10:15:53'),
(15, '4', '7', 28, '2021-04-12 11:32:34', '2021-04-12 11:32:34'),
(16, '4', '7', 29, '2021-04-12 11:50:57', '2021-04-12 11:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_online_order_details`
--

DROP TABLE IF EXISTS `tbl_customer_online_order_details`;
CREATE TABLE IF NOT EXISTS `tbl_customer_online_order_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `food_menu_id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` bigint(20) UNSIGNED NOT NULL,
  `menu_price_without_discount` double(10,2) NOT NULL,
  `menu_price_with_discount` double(10,2) NOT NULL,
  `menu_unit_price` double(10,2) NOT NULL,
  `menu_vat_percentage` double(10,2) DEFAULT NULL,
  `menu_taxes` text COLLATE utf8mb4_unicode_ci,
  `menu_discount_value` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_note` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` double(10,2) DEFAULT NULL,
  `online_order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_customer_online_order_details_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer_online_order_details`
--

INSERT INTO `tbl_customer_online_order_details` (`id`, `food_menu_id`, `menu_name`, `qty`, `menu_price_without_discount`, `menu_price_with_discount`, `menu_unit_price`, `menu_vat_percentage`, `menu_taxes`, `menu_discount_value`, `discount_type`, `menu_note`, `discount_amount`, `online_order_id`, `customer_id`, `restaurant_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 3, 'food menu 3', 2, 220.00, 220.00, 110.00, NULL, NULL, '0', NULL, NULL, NULL, 2, '1', 3, 'Live', '2021-01-14 17:58:22', '2021-01-14 17:58:22'),
(2, 4, 'lorem', 1, 110.00, 110.00, 110.00, NULL, NULL, '0', NULL, NULL, NULL, 3, '1', 3, 'Live', '2021-01-14 18:00:26', '2021-01-14 18:00:26'),
(3, 5, 'menu 2', 2, 220.00, 220.00, 110.00, NULL, NULL, '0', NULL, NULL, NULL, 4, '2', 3, 'Live', '2021-01-14 18:07:09', '2021-01-14 18:07:09'),
(4, 3, 'food menu 3', 1, 110.00, 110.00, 110.00, NULL, NULL, '0', NULL, NULL, NULL, 5, '1', 3, 'Live', '2021-01-14 19:57:37', '2021-01-14 19:57:37'),
(5, 6, 'food menu 2 _(bev remove)', 2, 180.00, 180.00, 90.00, NULL, NULL, '0', NULL, NULL, NULL, 6, '1', 3, 'Live', '2021-01-14 20:04:16', '2021-01-14 20:04:16'),
(6, 4, 'lorem', 1, 110.00, 110.00, 110.00, NULL, NULL, '0', NULL, NULL, NULL, 7, '1', 3, 'Live', '2021-01-14 20:08:30', '2021-01-14 20:08:30'),
(7, 5, 'menu 2', 1, 110.00, 110.00, 110.00, NULL, NULL, '0', NULL, NULL, NULL, 8, '1', 3, 'Live', '2021-01-14 20:13:13', '2021-01-14 20:13:13'),
(8, 4, 'lorem', 1, 110.00, 110.00, 110.00, NULL, NULL, '0', NULL, NULL, NULL, 9, '1', 3, 'Live', '2021-01-14 20:15:46', '2021-01-14 20:15:46'),
(9, 6, 'food menu 2 _(bev remove)', 2, 180.00, 180.00, 90.00, NULL, NULL, '0', NULL, NULL, NULL, 10, '1', 3, 'Live', '2021-01-14 20:36:44', '2021-01-14 20:36:44'),
(10, 8, 'food menu 2 _(multiple shift)', 1, 200.00, 200.00, 200.00, NULL, NULL, '0', NULL, NULL, NULL, 10, '1', 3, 'Live', '2021-01-14 20:36:44', '2021-01-14 20:36:44'),
(11, 4, 'lorem', 1, 110.00, 110.00, 110.00, NULL, NULL, '0', NULL, NULL, NULL, 10, '1', 3, 'Live', '2021-01-14 20:36:44', '2021-01-14 20:36:44'),
(12, 3, 'food menu 3', 1, 110.00, 110.00, 110.00, NULL, NULL, '0', NULL, NULL, NULL, 11, '1', 3, 'Live', '2021-01-14 20:38:59', '2021-01-14 20:38:59'),
(13, 5, 'menu 2', 1, 110.00, 110.00, 110.00, NULL, NULL, '0', NULL, NULL, NULL, 12, '1', 3, 'Live', '2021-01-14 21:19:35', '2021-01-14 21:19:35'),
(14, 3, 'food menu 3', 1, 100.00, 100.00, 100.00, NULL, NULL, '0', NULL, NULL, NULL, 13, '1', 3, 'Live', '2021-01-16 18:23:33', '2021-01-16 18:23:33'),
(15, 3, 'food menu 3', 1, 110.00, 110.00, 110.00, NULL, NULL, '0', NULL, NULL, NULL, 14, '1', 3, 'Live', '2021-01-28 18:01:10', '2021-01-28 18:01:10'),
(16, 4, 'lorem', 1, 110.00, 110.00, 110.00, NULL, NULL, '0', NULL, NULL, NULL, 15, '1', 3, 'Live', '2021-01-28 18:07:49', '2021-01-28 18:07:49'),
(17, 4, 'lorem', 1, 110.00, 110.00, 110.00, NULL, NULL, '0', NULL, NULL, NULL, 16, '1', 3, 'Live', '2021-01-28 18:43:12', '2021-01-28 18:43:12'),
(18, 162, 'Sichuan Spicy Adult', 1, 30.00, 30.00, 30.00, NULL, NULL, '0', NULL, NULL, NULL, 17, '4', 8, 'Live', '2021-04-09 09:06:00', '2021-04-09 09:06:00'),
(19, 162, 'Sichuan Spicy Adult', 1, 30.00, 30.00, 30.00, NULL, NULL, '0', NULL, NULL, NULL, 18, '4', 8, 'Live', '2021-04-09 09:06:50', '2021-04-09 09:06:50'),
(20, 163, 'Sichuan Spicy Children', 1, 15.00, 15.00, 15.00, NULL, NULL, '0', NULL, NULL, NULL, 18, '4', 8, 'Live', '2021-04-09 09:06:50', '2021-04-09 09:06:50'),
(21, 165, 'Pork Bone Children', 1, 15.00, 15.00, 15.00, NULL, NULL, '0', NULL, NULL, NULL, 18, '4', 8, 'Live', '2021-04-09 09:06:50', '2021-04-09 09:06:50'),
(22, 162, 'Sichuan Spicy Adult', 1, 30.00, 30.00, 30.00, NULL, NULL, '0', NULL, NULL, NULL, 19, '4', 8, 'Live', '2021-04-09 09:28:39', '2021-04-09 09:28:39'),
(23, 163, 'Sichuan Spicy Children', 1, 15.00, 15.00, 15.00, NULL, NULL, '0', NULL, NULL, NULL, 20, '4', 8, 'Live', '2021-04-09 09:29:24', '2021-04-09 09:29:24'),
(24, 165, 'Pork Bone Children', 1, 15.00, 15.00, 15.00, NULL, NULL, '0', NULL, NULL, NULL, 21, '4', 8, 'Live', '2021-04-09 09:29:59', '2021-04-09 09:29:59'),
(25, 162, 'Sichuan Spicy Adult', 1, 30.00, 30.00, 30.00, NULL, NULL, '0', NULL, NULL, NULL, 22, '4', 8, 'Live', '2021-04-09 09:30:52', '2021-04-09 09:30:52'),
(26, 162, 'Sichuan Spicy Adult', 1, 30.00, 30.00, 30.00, NULL, NULL, '0', NULL, NULL, NULL, 23, '4', 8, 'Live', '2021-04-09 09:55:41', '2021-04-09 09:55:41'),
(27, 164, 'Pork Bone Adult', 1, 30.00, 30.00, 30.00, NULL, NULL, '0', NULL, NULL, NULL, 23, '4', 8, 'Live', '2021-04-09 09:55:41', '2021-04-09 09:55:41'),
(28, 164, 'Pork Bone Adult', 1, 30.00, 30.00, 30.00, NULL, NULL, '0', NULL, NULL, NULL, 23, '4', 8, 'Live', '2021-04-09 09:55:41', '2021-04-09 09:55:41'),
(29, 162, 'Sichuan Spicy Adult', 1, 30.00, 30.00, 30.00, NULL, NULL, '0', NULL, NULL, NULL, 24, '4', 8, 'Live', '2021-04-09 10:12:16', '2021-04-09 10:12:16'),
(30, 162, 'Sichuan Spicy Adult', 1, 30.00, 30.00, 30.00, NULL, NULL, '0', NULL, NULL, NULL, 24, '4', 8, 'Live', '2021-04-09 10:12:16', '2021-04-09 10:12:16'),
(31, 163, 'Sichuan Spicy Children', 1, 15.00, 15.00, 15.00, NULL, NULL, '0', NULL, NULL, NULL, 25, '4', 8, 'Live', '2021-04-09 10:15:52', '2021-04-09 10:15:52'),
(32, 163, 'Sichuan Spicy Children', 1, 15.00, 15.00, 15.00, NULL, NULL, '0', NULL, NULL, NULL, 26, '4', 8, 'Live', '2021-04-09 10:19:19', '2021-04-09 10:19:19'),
(33, 162, 'Sichuan Spicy Adult', 1, 30.00, 30.00, 30.00, NULL, NULL, '0', NULL, NULL, NULL, 27, '4', 8, 'Live', '2021-04-09 10:22:14', '2021-04-09 10:22:14'),
(34, 162, 'Sichuan Spicy Adult', 1, 30.00, 30.00, 30.00, NULL, NULL, '0', NULL, NULL, NULL, 28, '4', 8, 'Live', '2021-04-12 11:32:34', '2021-04-12 11:32:34'),
(35, 163, 'Sichuan Spicy Children', 1, 15.00, 15.00, 15.00, NULL, NULL, '0', NULL, NULL, NULL, 28, '4', 8, 'Live', '2021-04-12 11:32:34', '2021-04-12 11:32:34'),
(36, 165, 'Pork Bone Children', 1, 15.00, 15.00, 15.00, NULL, NULL, '0', NULL, NULL, NULL, 28, '4', 8, 'Live', '2021-04-12 11:32:34', '2021-04-12 11:32:34'),
(37, 168, 'Herbal Adult', 1, 30.00, 30.00, 30.00, NULL, NULL, '0', NULL, NULL, NULL, 29, '4', 8, 'Live', '2021-04-12 11:50:56', '2021-04-12 11:50:56'),
(38, 166, 'Kimchi Adult', 1, 30.00, 30.00, 30.00, NULL, NULL, '0', NULL, NULL, NULL, 29, '4', 8, 'Live', '2021-04-12 11:50:56', '2021-04-12 11:50:56'),
(39, 169, 'Herbal Children', 1, 15.00, 15.00, 15.00, NULL, NULL, '0', NULL, NULL, NULL, 29, '4', 8, 'Live', '2021-04-12 11:50:56', '2021-04-12 11:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_online_order_details_modifiers`
--

DROP TABLE IF EXISTS `tbl_customer_online_order_details_modifiers`;
CREATE TABLE IF NOT EXISTS `tbl_customer_online_order_details_modifiers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `modifier_id` bigint(20) UNSIGNED NOT NULL,
  `modifier_price` double(10,2) NOT NULL,
  `food_menu_id` bigint(20) UNSIGNED NOT NULL,
  `online_order_id` bigint(20) UNSIGNED NOT NULL,
  `online_order_details_id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `restn_id` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer_online_order_details_modifiers`
--

INSERT INTO `tbl_customer_online_order_details_modifiers` (`id`, `modifier_id`, `modifier_price`, `food_menu_id`, `online_order_id`, `online_order_details_id`, `restaurant_id`, `customer_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 15, 60.00, 3, 2, 1, 3, '1', 'Live', '2021-01-14 17:58:22', '2021-01-14 17:58:22'),
(2, 13, 100.00, 4, 3, 2, 3, '1', 'Live', '2021-01-14 18:00:26', '2021-01-14 18:00:26'),
(3, 15, 60.00, 4, 7, 6, 3, '1', 'Live', '2021-01-14 20:08:30', '2021-01-14 20:08:30'),
(4, 17, 0.00, 4, 9, 8, 3, '1', 'Live', '2021-01-14 20:15:46', '2021-01-14 20:15:46'),
(5, 15, 60.00, 8, 10, 10, 3, '1', 'Live', '2021-01-14 20:36:44', '2021-01-14 20:36:44'),
(6, 19, 0.00, 4, 10, 11, 3, '1', 'Live', '2021-01-14 20:36:44', '2021-01-14 20:36:44'),
(7, 18, 0.00, 4, 10, 11, 3, '1', 'Live', '2021-01-14 20:36:44', '2021-01-14 20:36:44'),
(8, 17, 0.00, 4, 10, 11, 3, '1', 'Live', '2021-01-14 20:36:44', '2021-01-14 20:36:44'),
(9, 16, 0.00, 4, 10, 11, 3, '1', 'Live', '2021-01-14 20:36:44', '2021-01-14 20:36:44'),
(10, 15, 60.00, 4, 10, 11, 3, '1', 'Live', '2021-01-14 20:36:44', '2021-01-14 20:36:44'),
(11, 14, 52.00, 4, 10, 11, 3, '1', 'Live', '2021-01-14 20:36:44', '2021-01-14 20:36:44'),
(12, 13, 100.00, 4, 10, 11, 3, '1', 'Live', '2021-01-14 20:36:44', '2021-01-14 20:36:44'),
(13, 15, 60.00, 3, 11, 12, 3, '1', 'Live', '2021-01-14 20:38:59', '2021-01-14 20:38:59'),
(14, 16, 0.00, 4, 15, 16, 3, '1', 'Live', '2021-01-28 18:07:49', '2021-01-28 18:07:49'),
(15, 28, 6.00, 163, 20, 23, 8, '4', 'Live', '2021-04-09 09:29:24', '2021-04-09 09:29:24'),
(16, 27, 6.00, 163, 20, 23, 8, '4', 'Live', '2021-04-09 09:29:24', '2021-04-09 09:29:24'),
(17, 26, 6.00, 163, 20, 23, 8, '4', 'Live', '2021-04-09 09:29:24', '2021-04-09 09:29:24'),
(18, 25, 6.00, 163, 20, 23, 8, '4', 'Live', '2021-04-09 09:29:24', '2021-04-09 09:29:24'),
(19, 28, 6.00, 165, 21, 24, 8, '4', 'Live', '2021-04-09 09:29:59', '2021-04-09 09:29:59'),
(20, 27, 6.00, 165, 21, 24, 8, '4', 'Live', '2021-04-09 09:29:59', '2021-04-09 09:29:59'),
(21, 26, 6.00, 165, 21, 24, 8, '4', 'Live', '2021-04-09 09:29:59', '2021-04-09 09:29:59'),
(22, 25, 6.00, 165, 21, 24, 8, '4', 'Live', '2021-04-09 09:29:59', '2021-04-09 09:29:59'),
(23, 28, 6.00, 162, 22, 25, 8, '4', 'Live', '2021-04-09 09:30:52', '2021-04-09 09:30:52'),
(24, 27, 6.00, 162, 22, 25, 8, '4', 'Live', '2021-04-09 09:30:52', '2021-04-09 09:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_reservations`
--

DROP TABLE IF EXISTS `tbl_customer_reservations`;
CREATE TABLE IF NOT EXISTS `tbl_customer_reservations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `table_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_people` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_date` date NOT NULL,
  `end_booking_date` date DEFAULT NULL,
  `booking_time` time NOT NULL,
  `end_booking_time` time NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_customer_reservations_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer_reservations`
--

INSERT INTO `tbl_customer_reservations` (`id`, `table_id`, `number_of_people`, `booking_date`, `end_booking_date`, `booking_time`, `end_booking_time`, `comment`, `customer_id`, `restaurant_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, '15,1', '6', '2021-03-31', '2021-04-01', '20:00:00', '17:28:00', NULL, '1', 8, 'Live', '2021-01-31 16:57:00', '2021-01-31 16:57:00'),
(2, '1', '4', '2021-03-31', '2021-04-01', '08:00:00', '18:42:00', 'test', '2', 8, 'Live', '2021-02-01 14:45:18', '2021-02-01 14:45:18'),
(3, '16', '3', '2021-03-30', '2021-04-01', '09:00:00', '17:37:00', 'test', '2', 3, 'Live', '2021-02-01 14:46:21', '2021-02-01 14:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_restaurant_subscriptions`
--

DROP TABLE IF EXISTS `tbl_customer_restaurant_subscriptions`;
CREATE TABLE IF NOT EXISTS `tbl_customer_restaurant_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subscribe` tinyint(1) NOT NULL DEFAULT '0',
  `customer_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer_restaurant_subscriptions`
--

INSERT INTO `tbl_customer_restaurant_subscriptions` (`id`, `subscribe`, `customer_id`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(2, 1, '1', 3, '2021-01-28 18:43:04', '2021-01-28 18:43:04'),
(3, 1, '2', 3, '2021-02-01 14:45:18', '2021-02-01 14:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kitchen_notifications`
--

DROP TABLE IF EXISTS `tbl_kitchen_notifications`;
CREATE TABLE IF NOT EXISTS `tbl_kitchen_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `notification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kitchen_panel_id` bigint(20) UNSIGNED NOT NULL,
  `sales_id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_kitchen_notifications_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_kitchen_notifications`
--

INSERT INTO `tbl_kitchen_notifications` (`id`, `notification`, `kitchen_panel_id`, `sales_id`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(6, 'Order:T 000043 has been modified', 2, 43, 3, '2021-01-02 18:41:32', '2021-01-02 18:41:32'),
(21, 'Order:D 000054 has been modified', 2, 54, 3, '2021-01-04 05:37:56', '2021-01-04 05:37:56'),
(23, 'Order:D 000037 has been modified', 2, 37, 3, '2021-01-04 06:55:09', '2021-01-04 06:55:09'),
(24, 'Order:D 000037 has been modified', 2, 37, 3, '2021-01-04 06:56:00', '2021-01-04 06:56:00'),
(25, 'Order:D 000037 has been modified', 2, 37, 3, '2021-01-04 06:56:03', '2021-01-04 06:56:03'),
(26, 'Order:D 000037 has been modified', 2, 37, 3, '2021-01-04 07:01:08', '2021-01-04 07:01:08'),
(27, 'Order:D 000037 has been modified', 2, 37, 3, '2021-01-04 07:01:10', '2021-01-04 07:01:10'),
(28, 'Order:D 000037 has been modified', 2, 37, 3, '2021-01-04 07:01:46', '2021-01-04 07:01:46'),
(29, 'Order:D 000037 has been modified', 2, 37, 3, '2021-01-04 07:02:23', '2021-01-04 07:02:23'),
(30, 'Order:D 000037 has been modified', 2, 37, 3, '2021-01-04 07:02:36', '2021-01-04 07:02:36'),
(31, 'Order:D 000037 has been modified', 2, 37, 3, '2021-01-04 07:03:07', '2021-01-04 07:03:07'),
(32, 'Order:D 000037 has been modified', 2, 37, 3, '2021-01-04 07:03:50', '2021-01-04 07:03:50'),
(33, 'Order:D 000055 has been modified', 2, 55, 3, '2021-01-04 07:06:05', '2021-01-04 07:06:05'),
(34, 'Order:D 000055 has been modified', 2, 55, 3, '2021-01-04 07:06:17', '2021-01-04 07:06:17'),
(35, 'Order:D 000055 has been modified', 2, 55, 3, '2021-01-04 07:06:19', '2021-01-04 07:06:19'),
(36, 'Order:D 000055 has been modified', 2, 55, 3, '2021-01-04 07:06:19', '2021-01-04 07:06:19'),
(37, 'Order:D 000055 has been modified', 2, 55, 3, '2021-01-04 07:06:19', '2021-01-04 07:06:19'),
(38, 'Order:D 000055 has been modified', 2, 55, 3, '2021-01-04 07:06:19', '2021-01-04 07:06:19'),
(39, 'Order:D 000055 has been modified', 2, 55, 3, '2021-01-04 07:06:19', '2021-01-04 07:06:19'),
(40, 'Order:D 000055 has been modified', 2, 55, 3, '2021-01-04 10:51:21', '2021-01-04 10:51:21'),
(41, 'Order:D 000042 has been modified', 2, 42, 3, '2021-01-04 10:55:19', '2021-01-04 10:55:19'),
(42, 'Order:D 000042 has been modified', 2, 42, 3, '2021-01-04 10:57:04', '2021-01-04 10:57:04'),
(43, 'Order:D 000037 has been modified', 2, 37, 3, '2021-01-04 11:01:24', '2021-01-04 11:01:24'),
(55, 'Order:T 000027 has been modified', 2, 27, 3, '2021-01-21 17:47:51', '2021-01-21 17:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

DROP TABLE IF EXISTS `tbl_notifications`;
CREATE TABLE IF NOT EXISTS `tbl_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `notification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_notifications_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_gateway`
--

DROP TABLE IF EXISTS `tbl_payment_gateway`;
CREATE TABLE IF NOT EXISTS `tbl_payment_gateway` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usb` varchar(255) DEFAULT NULL,
  `usb_status` bit(1) DEFAULT NULL,
  `paypal_username` varchar(255) DEFAULT NULL,
  `paypal_password` varchar(255) DEFAULT NULL,
  `paypal_sinature` varchar(255) DEFAULT NULL,
  `paypal_email` varchar(255) DEFAULT NULL,
  `paypal_status` bit(1) DEFAULT NULL,
  `stripe_secret` varchar(255) DEFAULT NULL,
  `stripe_status` bit(1) DEFAULT NULL,
  `payumoney_key` varchar(255) DEFAULT NULL,
  `payumoney_salt` varchar(255) DEFAULT NULL,
  `payumoney_status` bit(1) DEFAULT NULL,
  `paystack_secret_key` varchar(255) DEFAULT NULL,
  `paystack_status` bit(1) DEFAULT NULL,
  `rezorpay_key_id` varchar(255) DEFAULT NULL,
  `rezorpay_key_secret` varchar(255) DEFAULT NULL,
  `rezorpay_status` bit(1) DEFAULT NULL,
  `restaurant_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment_gateway`
--

INSERT INTO `tbl_payment_gateway` (`id`, `usb`, `usb_status`, `paypal_username`, `paypal_password`, `paypal_sinature`, `paypal_email`, `paypal_status`, `stripe_secret`, `stripe_status`, `payumoney_key`, `payumoney_salt`, `payumoney_status`, `paystack_secret_key`, `paystack_status`, `rezorpay_key_id`, `rezorpay_key_secret`, `rezorpay_status`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(13, 'sfdhakasdh', b'0', 'jgasfd', '123456', 'jgjh', 'g', b'1', 'jhg', b'0', 'hghjg', 'jgjhg', b'0', 'jhgjg', b'0', 'jhgg', 'jgjhg', b'0', '8', '2021-03-17 10:58:14', '2021-03-17 16:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privacy_policies`
--

DROP TABLE IF EXISTS `tbl_privacy_policies`;
CREATE TABLE IF NOT EXISTS `tbl_privacy_policies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `privacy_policies` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_privacy_policies`
--

INSERT INTO `tbl_privacy_policies` (`id`, `privacy_policies`, `created_at`, `updated_at`) VALUES
(1, 'We at Wasai LLC respect the privacy of your personal information and, as such, make every effort to ensure your information is protected and remains private. As the owner and operator of loremipsum.io (the &quot;Website&quot;) hereafter referred to in this Privacy Policy as &quot;Lorem Ipsum&quot;, &quot;us&quot;, &quot;our&quot; or &quot;we&quot;, we have provided this Privacy Policy to explain how we collect, use, share and protect information about the users of our Website (hereafter referred to as &ldquo;user&rdquo;, &ldquo;you&rdquo; or &quot;your&quot;). For the purposes of this Agreement, any use of the terms &quot;Lorem Ipsum&quot;, &quot;us&quot;, &quot;our&quot; or &quot;we&quot; includes Wasai LLC, without limitation. We will not use or share your personal information with anyone except as described in this Privacy Policy. This Privacy Policy will inform you about the types of personal data we collect, the purposes for which we use the data, the ways in which the data is handled and your rights with regard to your personal data. Furthermore, this Privacy Policy is intended to satisfy the obligation of transparency under the EU General Data Protection Regulation 2016/679 (&quot;GDPR&quot;) and the laws implementing GDPR. For the purpose of this Privacy Policy the Data Controller of personal data is Wasai LLC and our contact details are set out in the Contact section at the end of this Privacy Policy. Data Controller means the natural or legal person who (either alone or jointly or in common with other persons) determines the purposes for which and the manner in which any personal information are, or are to be, processed. For purposes of this Privacy Policy, &quot;Your Information&quot; or &quot;Personal Data&quot; means information about you, which may be of a confidential or sensitive nature and may include personally identifiable information (&quot;PII&quot;) and/or financial information. PII means individually identifiable information that would allow us to determine the actual identity of a specific living person, while sensitive data may include information, comments, content and other information that you voluntarily provide. Lorem Ipsum collects information about you when you use our Website to access our services, and other online products and services (collectively, the &ldquo;Services&rdquo;) and through other interactions and communications you have with us. The term Services includes, collectively, various applications, websites, widgets, email notifications and other mediums, or portions of such mediums, through which you have accessed this Privacy Policy. We may change this Privacy Policy from time to time. If we decide to change this Privacy Policy, we will inform you by posting the revised Privacy Policy on the Site. Those changes will go into effect on the &quot;Last updated&quot; date shown at the end of this Privacy Policy. By continuing to use the Site or Services, you consent to the revised Privacy Policy. We encourage you to periodically review the Privacy Policy for the latest information on our privacy practices. BY ACCESSING OR USING OUR SERVICES, YOU CONSENT TO THE COLLECTION, TRANSFER, MANIPULATION, STORAGE, DISCLOSURE AND OTHER USES OF YOUR INFORMATION (COLLECTIVELY, &quot;USE OF YOUR INFORMATION&quot;) AS DESCRIBED IN THIS PRIVACY POLICY. IF YOU DO NOT AGREE WITH OR CONSENT TO THIS PRIVACY POLICY YOU MAY NOT ACCESS OR USE OUR SERVICES.\r\n\r\nprivacy defult', '2020-08-19 08:46:12', '2020-10-06 08:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurants`
--

DROP TABLE IF EXISTS `tbl_restaurants`;
CREATE TABLE IF NOT EXISTS `tbl_restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `restaurant_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval_status` enum('Approve','Disapprove') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Disapprove',
  `featured_status` enum('Featured','Non Featured') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Non Featured',
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_gateway` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_restaurants_restaurant_id_unique` (`restaurant_id`),
  KEY `tbl_restaurants_country_id_foreign` (`country_id`),
  KEY `tbl_restaurants_state_id_foreign` (`state_id`),
  KEY `tbl_restaurants_city_id_foreign` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurants`
--

INSERT INTO `tbl_restaurants` (`id`, `restaurant_id`, `name`, `phone`, `email`, `country_id`, `state_id`, `city_id`, `address`, `approval_status`, `featured_status`, `del_status`, `slug`, `payment_gateway`, `created_at`, `updated_at`) VALUES
(2, '58vn0b', 'Zachery Young', '+1 (945) 212-9735', 'porad@mailinator.com', 1, 1, 3, 'Mollitia quaerat del', 'Approve', 'Non Featured', 'Live', 'zachery-young', '{\"usb_status\":1,\"paypal_status\":0,\"stripe_status\":0,\"payumoney_status\":0,\"paystack_status\":0,\"rezorpay_status\":0}', '2020-08-19 08:47:56', '2021-01-07 17:52:23'),
(3, '0001', 'Barrett Ramsey', '+1 (608) 504-9769', 'diny@mailinator.com', 1, 1, 3, 'Quisquam amet fugia', 'Approve', 'Featured', 'Live', 'barrett-ramsey', NULL, '2020-08-19 08:49:33', '2021-01-09 13:49:28'),
(5, '0002', 'Home restaurant', '01521493732', 'home_restaurant@gmail.com', 1, 5, 2, 'm/13, noorjahan road, mohammodpur, dhaka', 'Approve', 'Non Featured', 'Live', 'home-restaurant', NULL, '2020-10-06 08:24:56', '2021-01-07 17:52:31'),
(6, '613592', 'Restaurant 1', '01521493732', 'restaurant1@gmail.com', 1, 5, 2, 'm/13, noorjahan road, mohammodpur, dhaka', 'Approve', 'Featured', 'Live', 'restaurant-1', '{\"usb_status\":1,\"paypal_status\":0,\"stripe_status\":0,\"payumoney_status\":0,\"paystack_status\":0,\"rezorpay_status\":0}', '2021-01-07 06:57:35', '2021-01-09 13:40:50'),
(7, '756830', 'Restaurant 2', '01521493732', 'restaurant.2@gmail.com', 1, 5, 2, 'm/13, noorjahan road, mohammodpur, dhaka', 'Approve', 'Non Featured', 'Live', 'restaurant-2', NULL, '2021-01-07 06:58:36', '2021-01-07 17:52:35'),
(8, '839705', 'HOT POT LEGEND', '7034687688', 'hotpotlegend@gmail.com', 1, 7, 4, '20462 Exchange St, Ashburn, VA 20147', 'Approve', 'Featured', 'Live', 'hot-pot-legend', '{\"usb_status\":1,\"paypal_status\":1,\"stripe_status\":0,\"payumoney_status\":1,\"paystack_status\":0,\"rezorpay_status\":0}', '2021-01-19 18:17:29', '2021-01-19 18:24:10'),
(19, '568394', 'Towhid Hasan', '01982525844', 'towhidhasang1@gmail.com', 1, 5, 3, '46/1 B.K. Main Road, Khulna', 'Disapprove', 'Non Featured', 'Live', 'towhid-hasan', NULL, '2021-03-24 10:21:25', '2021-03-24 10:21:25'),
(25, '526838', 'Test', '13132132132', 'abc1@test.com', 1, 5, 3, 'asdf', 'Approve', 'Non Featured', 'Live', 'test', NULL, '2021-03-25 10:32:22', '2021-03-25 10:32:22'),
(26, '321535', 'dip', '01625049939', 'dip@gmail.com', 1, 1, 2, 'asdf', 'Approve', 'Non Featured', 'Live', 'dip', NULL, '2021-03-26 07:31:29', '2021-03-26 07:31:29'),
(27, '811685', 'ssss', '01625049939', 'sssss@gmail.com', 1, 1, 2, 'aaaaaaaaaaaaaaaaaa', 'Approve', 'Non Featured', 'Live', 'ssss', NULL, '2021-03-31 09:54:56', '2021-03-31 09:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_attendances`
--

DROP TABLE IF EXISTS `tbl_restaurant_attendances`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_attendances_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_attendances`
--

INSERT INTO `tbl_restaurant_attendances` (`id`, `reference_no`, `employee_id`, `date`, `in_time`, `out_time`, `note`, `user_id`, `restaurant_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, '000001', '2', '2020-11-25', '16:39:47', '23:00:00', 'note5', '2', 3, 'Live', '2020-11-25 07:13:51', '2020-11-25 10:41:11'),
(2, '000002', '3', '2020-11-25', '13:53:50', '23:15:00', '', '2', 3, 'Live', '2020-11-25 07:54:04', '2020-11-25 07:57:33'),
(3, '000003', '6', '2020-11-23', '09:00:00', '19:00:00', '', '2', 3, 'Live', '2020-11-25 13:31:01', '2020-11-25 13:31:01'),
(4, '000004', '10', '2021-04-07', '11:11:44', '01:30:00', 'asfd', '10', 8, 'Live', '2021-04-07 05:12:00', '2021-04-07 05:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_category_for_suppliers`
--

DROP TABLE IF EXISTS `tbl_restaurant_category_for_suppliers`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_category_for_suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_category_for_suppliers_category_id_foreign` (`category_id`),
  KEY `tbl_restaurant_category_for_suppliers_supplier_id_foreign` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_category_for_suppliers`
--

INSERT INTO `tbl_restaurant_category_for_suppliers` (`id`, `category_id`, `supplier_id`, `del_status`, `created_at`, `updated_at`) VALUES
(4, 5, 19, 'Live', '2020-12-29 10:01:20', '2020-12-29 10:05:45'),
(5, 6, 19, 'Live', '2020-12-29 10:01:20', '2020-12-29 10:05:45'),
(6, 5, 16, 'Live', '2020-12-29 10:16:42', '2020-12-29 10:16:42'),
(7, 5, 18, 'Live', '2020-12-29 10:17:10', '2020-12-29 10:17:10'),
(8, 5, 15, 'Live', '2020-12-29 10:17:38', '2020-12-29 10:17:38'),
(18, 10, 21, 'Live', '2021-03-16 06:31:33', '2021-03-16 06:31:33'),
(20, 10, 22, 'Deleted', '2021-03-16 06:34:28', '2021-04-13 04:53:21'),
(21, 10, 23, 'Live', '2021-04-13 04:54:35', '2021-04-13 04:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_customers`
--

DROP TABLE IF EXISTS `tbl_restaurant_customers`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_customers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `customer_group_id` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_customers_city_id_foreign` (`city_id`),
  KEY `tbl_restaurant_customers_state_id_foreign` (`state_id`),
  KEY `tbl_restaurant_customers_country_id_foreign` (`country_id`),
  KEY `tbl_restaurant_customers_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_customers`
--

INSERT INTO `tbl_restaurant_customers` (`id`, `name`, `phone`, `email`, `address`, `apt`, `city_id`, `state_id`, `zip`, `code`, `country_id`, `note`, `customer_group_id`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Walk-in Customer', '', '', '', NULL, NULL, NULL, '1207', 'Est est eum laborum', NULL, 'Et itaque laborum do', NULL, 8, '2', 'Live', '2020-08-21 09:39:05', '2020-08-21 09:58:28'),
(2, 'Jolene Finch', '+1 (367) 406-7914', 'wiwalypyp@mailinator.com', 'Est sapiente est nec', 'Consectetur quam in', 1, 1, '80775', 'Officia enim volupta', 1, 'Cum nobis perferendi', NULL, 8, '2', 'Live', '2020-08-21 09:58:42', '2020-08-21 09:58:42'),
(3, 'customer 2', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '', 1, 1, '1207', 'AAXqggp', 1, '', NULL, 3, '2', 'Live', '2020-09-27 12:17:22', '2020-10-12 06:45:03'),
(4, 'mehedi hasan shuvo', '01759622441', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', '', 1, '', NULL, 8, '2', 'Deleted', '2020-10-06 12:38:40', '2020-10-06 12:39:20'),
(5, 'customer 1', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqggp', 1, 'f', NULL, 3, '2', 'Live', '2020-10-12 06:40:58', '2020-10-12 06:44:49'),
(6, 'customer 3', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqG8b', 1, 'ff', NULL, 3, '2', 'Live', '2020-10-12 06:45:30', '2020-10-12 06:45:30'),
(7, 'customer 4', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqggp', 1, 'd', NULL, 3, '2', 'Live', '2020-10-12 06:48:03', '2020-10-12 06:48:03'),
(8, 'customer 5', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqG8b', 1, 'fd', NULL, 3, '2', 'Live', '2020-10-12 06:49:48', '2020-10-12 06:49:48'),
(9, 'customer 5', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqG8b', 1, 'fd', NULL, 3, '2', 'Live', '2020-10-12 06:51:13', '2020-10-12 06:51:13'),
(10, 'customer 6', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqggp', 1, 'd', NULL, 3, '2', 'Live', '2020-10-12 06:52:20', '2020-10-12 06:52:20'),
(11, 'customer 7', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqG8b', 1, 'e', NULL, 3, '2', 'Live', '2020-10-12 06:53:13', '2020-10-12 06:53:13'),
(12, 'customer 8', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqggp', 1, 'ed', NULL, 3, '2', 'Live', '2020-10-12 06:54:20', '2020-10-12 06:54:20'),
(13, 'mehedi hasan shuvo', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqggp', 1, 'a', NULL, 3, '2', 'Live', '2020-10-12 07:08:03', '2020-10-12 07:08:03'),
(14, 'customer 9', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '', 2, 5, '1207', 'AAXqG8b', 1, 'fcfg', NULL, 3, '2', 'Live', '2020-10-12 07:11:48', '2020-10-12 07:11:48'),
(15, 'mehedi hasan shuvo', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '', 2, 5, '1207', 'AAXqggp', 1, 'dg', NULL, 3, '2', 'Live', '2020-10-12 07:12:50', '2020-10-12 07:12:50'),
(16, 'mehedi hasan shuvo', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqggp', 1, 'fsd', NULL, 3, '2', 'Live', '2020-10-12 07:14:01', '2020-10-12 07:14:01'),
(17, 'customer 10', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqggp', 1, 'new customer', NULL, 3, '2', 'Live', '2020-10-12 07:15:26', '2020-10-12 07:15:26'),
(18, 'customer 10', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqggp', 1, 'new customer', NULL, 3, '2', 'Deleted', '2020-10-12 07:15:38', '2020-10-12 08:01:26'),
(19, 'customer 10', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqggp', 1, 'new customer', NULL, 3, '2', 'Deleted', '2020-10-12 07:15:38', '2020-10-12 08:01:20'),
(20, 'customer 10', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqggp', 1, 'new customer', NULL, 3, '2', 'Deleted', '2020-10-12 07:15:38', '2020-10-12 08:01:32'),
(21, 'customer 10', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqggp', 1, 'new customer', NULL, 3, '2', 'Deleted', '2020-10-12 07:15:39', '2020-10-12 08:01:08'),
(22, 'customer 10', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqggp', 1, 'new customer', NULL, 3, '2', 'Deleted', '2020-10-12 07:15:39', '2020-10-12 08:01:14'),
(23, 'customer 10', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqggp', 1, 'new customer', NULL, 3, '2', 'Deleted', '2020-10-12 07:16:05', '2020-10-12 08:01:02'),
(24, 'customer 10', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqG8b', 1, 'd', NULL, 3, '2', 'Deleted', '2020-10-12 07:16:26', '2020-10-12 08:00:55'),
(25, 'mehedi hasan shuvo', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqggp', 1, 'drt', NULL, 3, '2', 'Live', '2020-10-12 07:19:30', '2020-10-12 07:19:30'),
(26, 'mehedi hasan shuvo', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqggp', 1, 'drt', NULL, 3, '2', 'Live', '2020-10-12 07:59:24', '2020-10-12 07:59:24'),
(27, 'customer 12', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqG8b', 1, 'd', NULL, 3, '2', 'Live', '2020-10-12 07:59:45', '2020-10-12 07:59:45'),
(28, 'customer 12', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqG8b', 1, 'd', NULL, 3, '2', 'Live', '2020-10-12 08:00:03', '2020-10-12 08:00:03'),
(29, 'customer 13', '01521493732', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqG8b', 1, 'd', NULL, 3, '2', 'Live', '2020-10-12 08:00:24', '2020-10-12 08:00:24'),
(30, 'customer test', '+18801521493', 'customer.test@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqggp', 1, 'hello', '1', 3, '2', 'Live', '2020-10-16 13:45:38', '2021-01-23 17:04:00'),
(31, 'customer 12', '01759622441', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqG8b', 1, 'd', NULL, 3, '2', 'Live', '2021-01-01 18:48:02', '2021-01-01 18:48:02'),
(32, 'customer 12', '01759622441', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 2, 5, '1207', 'AAXqG8b', 1, 'd', NULL, 3, '2', 'Live', '2021-01-01 19:30:16', '2021-01-01 19:30:16'),
(33, 'mehedi hasan shuvo1', '01521493732', 'hasanshuvom884@gmail.com', '2/2, Ali and noor real estate', '4th floor', 2, 5, '1207', NULL, 1, 'note', NULL, 3, '2', 'Live', '2021-01-15 21:12:52', '2021-01-15 21:12:52'),
(34, 'customer 12', '01759622400', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 3, 5, '1207', 'AAXqG8b', 1, 'd', NULL, 3, '2', 'Live', '2021-01-15 21:16:33', '2021-01-15 21:16:33'),
(35, 'customer 12', '+18801759622', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 3, 5, '1207', 'AAXqG8b', 1, 'd', '2', 3, '2', 'Live', '2021-01-15 21:17:00', '2021-01-23 17:35:22'),
(36, 'customer 240', '+10175962240', 'hasanshuvom884@gmail.com', 'm/13, noorjahan road, mohammodpur, dhaka', '5th floor', 3, 5, '1207', 'AAXqG8b', 1, 'd', '1', 3, '2', 'Live', '2021-01-23 18:08:41', '2021-01-23 19:07:38'),
(37, 'Walk-in Customer', '+10000000000', '', '', '', 4, 7, '20147', '', 1, '', '', 8, '10', 'Live', '2021-01-25 17:12:45', '2021-01-25 17:12:45'),
(38, 'mehedi hasan shuvo1', '01521493732', 'hasanshuvom884@gmail.com', '2/2, Ali and noor real estate', '4th floor', 3, 5, '1207', NULL, 1, NULL, NULL, 3, '2', 'Live', '2021-01-26 18:32:58', '2021-01-26 18:32:58'),
(39, 'mehedi hasan shuvo1', '01521493732', 'hasanshuvom884@gmail.com', '2/2, Ali and noor real estate', '4th floor', 3, 5, '1207', NULL, 1, NULL, NULL, 3, '2', 'Live', '2021-01-26 19:03:05', '2021-01-26 19:03:05'),
(40, 'mehedi hasan shuvo1', '01521493732', 'hasanshuvom884@gmail.com', '2/2, Ali and noor real estate', '4th floor', 3, 5, '1207', NULL, 1, NULL, NULL, 3, '2', 'Live', '2021-01-26 19:03:24', '2021-01-26 19:03:24'),
(41, 'mehedi hasan shuvo1', '01521493732', 'hasanshuvom884@gmail.com', '2/2, Ali and noor real estate', '4th floor', 3, 5, '1207', NULL, 1, NULL, NULL, 3, '2', 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(42, 'mehedi hasan shuvo1', '01521493732', 'hasanshuvom884@gmail.com', '2/2, Ali and noor real estate', '4th floor', 3, 5, '1207', NULL, 1, NULL, NULL, 3, '2', 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(43, 'mehedi hasan shuvo1', '01521493732', 'hasanshuvom884@gmail.com', '2/2, Ali and noor real estate', '4th floor', 3, 5, '1207', NULL, 1, NULL, NULL, 3, '2', 'Live', '2021-01-26 19:13:57', '2021-01-26 19:13:57'),
(44, 'mehedi hasan shuvo1', '01521493732', 'hasanshuvom884@gmail.com', '2/2, Ali and noor real estate', '4th floor', 3, 5, '1207', NULL, 1, NULL, NULL, 3, '2', 'Live', '2021-01-26 19:16:30', '2021-01-26 19:16:30'),
(45, 'Dipto', '+11213121323', 'abc@gmail.com', 'hkh', 'asf', 2, 1, '52210', '2012', 1, 'khk', '4', 8, '13', 'Live', '2021-03-14 10:17:59', '2021-03-14 10:17:59'),
(46, 'Test', '+13132132132', 'abc1@test.com', 'asdf', 'asd', 4, 7, '54545', '454', 1, 'asdf', '4', 8, '10', 'Live', '2021-03-24 04:36:24', '2021-03-24 04:36:24'),
(47, 'Customer', '+11234567894', 'Customer@gmail.com', 'khulna\r\nkhulna', 'wew', 2, 1, '9000', NULL, 1, 'asasas', NULL, 8, '10', 'Live', '2021-04-12 11:35:59', '2021-04-12 11:35:59'),
(48, 'Customer', '+11234567894', 'Customer@gmail.com', 'khulna\r\nkhulna', 'wew', 2, 1, '9000', NULL, 1, 'asasas', NULL, 8, '10', 'Live', '2021-04-12 11:36:13', '2021-04-12 11:36:13'),
(49, 'Customer', '+11234567894', 'Customer@gmail.com', 'khulna\r\nkhulna', 'wew', 2, 1, '9000', NULL, 1, 'asasas', NULL, 8, '10', 'Live', '2021-04-12 11:36:26', '2021-04-12 11:36:26'),
(50, 'Customer', '+11234567894', 'Customer@gmail.com', 'khulna\r\nkhulna', 'wew', 2, 1, '9000', NULL, 1, 'asasas', NULL, 8, '10', 'Live', '2021-04-12 11:36:44', '2021-04-12 11:36:44'),
(51, 'Customer', '+11234567894', 'Customer@gmail.com', 'khulna\r\nkhulna', 'wew', 2, 1, '9000', NULL, 1, 'asasas', NULL, 8, '10', 'Live', '2021-04-12 11:37:22', '2021-04-12 11:37:22'),
(52, 'Customer', '+11234567894', 'Customer@gmail.com', 'khulna\r\nkhulna', 'wew', 2, 1, '9000', NULL, 1, 'asasas', NULL, 8, '10', 'Live', '2021-04-12 11:42:53', '2021-04-12 11:42:53'),
(53, 'Customer', '+11234567894', 'Customer@gmail.com', 'khulna\r\nkhulna', 'wew', 2, 1, '9000', NULL, 1, 'asasas', NULL, 8, '10', 'Live', '2021-04-12 11:51:21', '2021-04-12 11:51:21'),
(54, 'Customer', '+11234567894', 'Customer@gmail.com', 'khulna\r\nkhulna', 'wew', 2, 1, '9000', NULL, 1, 'asasas', NULL, 8, '10', 'Live', '2021-04-12 12:13:22', '2021-04-12 12:13:22'),
(55, 'Customer', '+11234567894', 'Customer@gmail.com', 'khulna\r\nkhulna', 'wew', 2, 1, '9000', NULL, 1, 'asasas', NULL, 8, '10', 'Live', '2021-04-12 12:18:58', '2021-04-12 12:18:58'),
(56, 'Customer', '+11234567894', 'Customer@gmail.com', 'khulna\r\nkhulna', 'wew', 2, 1, '9000', NULL, 1, 'asasas', NULL, 8, '10', 'Live', '2021-04-12 12:29:17', '2021-04-12 12:29:17'),
(57, 'Customer', '+11234567894', 'Customer@gmail.com', 'jhgjg', 'jljl', 3, 5, '545454', NULL, 1, 'gjgjgjg', NULL, 8, '10', 'Live', '2021-04-12 12:42:26', '2021-04-12 12:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_customer_groups`
--

DROP TABLE IF EXISTS `tbl_restaurant_customer_groups`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_customer_groups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_percentage` double(10,2) NOT NULL DEFAULT '0.00',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_customer_groups_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_customer_groups`
--

INSERT INTO `tbl_restaurant_customer_groups` (`id`, `name`, `discount_percentage`, `description`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'VIP 1', 5.00, 'description', 3, '2', 'Live', '2021-01-23 15:57:56', '2021-01-23 16:12:02'),
(2, 'VIP 2', 10.00, '', 3, '2', 'Live', '2021-01-23 16:12:14', '2021-01-23 16:12:14'),
(3, 'VIP 3', 15.00, '', 3, '2', 'Live', '2021-01-23 16:12:26', '2021-01-23 16:12:26'),
(4, 'VIP 1', 5.00, '', 8, '10', 'Live', '2021-01-25 14:59:04', '2021-01-25 14:59:04'),
(5, 'VIP 2', 10.00, '', 8, '10', 'Live', '2021-01-25 14:59:18', '2021-01-25 14:59:18'),
(6, 'VIP 3', 15.00, '', 8, '10', 'Live', '2021-01-25 14:59:35', '2021-01-25 14:59:35'),
(7, 'ApplicationLog', 20.00, '', 8, '13', 'Deleted', '2021-03-15 15:59:44', '2021-03-15 15:59:50'),
(8, '100% Off', 50.00, 'Fin_test', 8, '10', 'Live', '2021-03-24 04:37:06', '2021-03-24 04:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_expenses`
--

DROP TABLE IF EXISTS `tbl_restaurant_expenses`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` double(10,2) NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_expenses_cat_id_foreign` (`cat_id`),
  KEY `tbl_restaurant_expenses_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_expenses`
--

INSERT INTO `tbl_restaurant_expenses` (`id`, `date`, `amount`, `cat_id`, `employee_id`, `note`, `user_id`, `restaurant_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, '2020-11-20', 1000.00, 2, '2', 'note', '2', 3, 'Deleted', '2020-11-20 15:15:20', '2020-11-20 15:31:23'),
(2, '2020-11-20', 1000.00, 2, '3', '', '2', 3, 'Live', '2020-11-20 15:25:06', '2020-11-20 15:29:14'),
(4, '2021-03-01', 11.00, 26, '10', 'FSDF', '10', 8, 'Live', '2021-03-01 12:47:10', '2021-03-01 12:47:10'),
(5, '2021-03-11', 4545.00, 29, '28', '', '21', 8, 'Live', '2021-03-11 09:16:33', '2021-03-11 09:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_expense_items`
--

DROP TABLE IF EXISTS `tbl_restaurant_expense_items`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_expense_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_expense_items_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_expense_items`
--

INSERT INTO `tbl_restaurant_expense_items` (`id`, `name`, `description`, `user_id`, `restaurant_id`, `del_status`, `created_at`, `updated_at`) VALUES
(2, 'Electric Bill', '', '2', 3, 'Live', '2020-11-20 12:28:52', '2020-11-20 12:28:52'),
(23, 'New Test rajib', 'dfasdfs', '10', 8, 'Live', '2021-03-01 12:10:26', '2021-03-01 12:10:26'),
(26, 'New Test 0', 'New Test 0', '10', 8, 'Live', '2021-03-01 12:28:02', '2021-03-01 12:28:02'),
(28, 'New Test', 'dfsfs', '10', 8, 'Live', '2021-03-04 11:03:46', '2021-03-04 11:03:46'),
(29, 'Electric Bill', 'as', '10', 8, 'Live', '2021-03-08 08:42:56', '2021-03-08 08:42:56'),
(30, 'Food', 'as', '10', 8, 'Live', '2021-03-08 08:43:11', '2021-03-08 08:43:11'),
(31, 'Fin_test', 'Fin_test', '10', 8, 'Live', '2021-03-24 06:03:04', '2021-03-24 06:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_floors`
--

DROP TABLE IF EXISTS `tbl_restaurant_floors`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_floors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `position_array` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_floors_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_floors`
--

INSERT INTO `tbl_restaurant_floors` (`id`, `name`, `description`, `position_array`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'first floor', 'description for first floor', '[{\"x\":49.75,\"y\":31},{\"x\":44.75,\"y\":250},{\"x\":508.75,\"y\":236},{\"x\":440.75,\"y\":38},{\"x\":221.75,\"y\":88},{\"x\":46.75,\"y\":31}]', 3, '2', 'Deleted', '2020-10-01 09:52:50', '2020-10-05 09:42:39'),
(2, 'second floor', 'description second floor', '[{\"x\":87.75,\"y\":101},{\"x\":112.75,\"y\":230},{\"x\":289.75,\"y\":218},{\"x\":362.75,\"y\":168},{\"x\":352.75,\"y\":82},{\"x\":254.75,\"y\":25},{\"x\":124.75,\"y\":28},{\"x\":87.75,\"y\":100}]', 3, '2', 'Live', '2020-10-01 11:25:15', '2020-10-01 11:47:42'),
(3, 'frist floor', 'description frist floor', '[{\"x\":106.75,\"y\":227},{\"x\":73.75,\"y\":132},{\"x\":228.75,\"y\":56},{\"x\":411.75,\"y\":108},{\"x\":390.75,\"y\":192},{\"x\":258.75,\"y\":231},{\"x\":99.75,\"y\":218}]', 2, '1', 'Live', '2020-10-01 11:34:20', '2020-10-01 11:34:20'),
(4, 'floor third', 'description  floor third', '[{\"x\":38.75,\"y\":55},{\"x\":34.75,\"y\":252},{\"x\":510.75,\"y\":239},{\"x\":525.75,\"y\":32},{\"x\":216.75,\"y\":10},{\"x\":37.75,\"y\":58}]', 3, '2', 'Live', '2020-10-02 15:23:48', '2020-10-02 15:23:48'),
(5, 'shuvo', 'bla bla', '[]', 3, '2', 'Deleted', '2020-10-04 11:10:14', '2020-10-04 11:48:42'),
(6, 'third floor', 'description', '[{\"x\":96.75,\"y\":81},{\"x\":86.75,\"y\":221},{\"x\":354.75,\"y\":229},{\"x\":450.75,\"y\":111},{\"x\":266.75,\"y\":44},{\"x\":96.75,\"y\":80}]', 3, '2', 'Live', '2020-10-04 13:37:36', '2020-10-04 13:37:36'),
(7, 't', 'description', '[{\"x\":14.34375,\"y\":16},{\"x\":12.34375,\"y\":374},{\"x\":759.34375,\"y\":368},{\"x\":757.34375,\"y\":11},{\"x\":19.34375,\"y\":11},{\"x\":247.34375,\"y\":179},{\"x\":15.34375,\"y\":358}]', 3, '2', 'Live', '2021-01-21 17:35:23', '2021-01-21 17:35:23'),
(8, 'demo table', 'description', '[{\"x\":4.34375,\"y\":4},{\"x\":5.34375,\"y\":381},{\"x\":767.34375,\"y\":377},{\"x\":765.34375,\"y\":6},{\"x\":6.34375,\"y\":4}]', 3, '2', 'Live', '2021-01-25 15:48:17', '2021-01-25 15:48:17'),
(9, 'First Floor', 'First Floor', '[{\"x\":0.34375,\"y\":1},{\"x\":0.34375,\"y\":382},{\"x\":767.34375,\"y\":382},{\"x\":768.34375,\"y\":0},{\"x\":2.34375,\"y\":1}]', 8, '10', 'Live', '2021-01-25 17:47:14', '2021-01-25 17:47:14'),
(10, 'Fin_test', 'Fin_test', '[{\"x\":34,\"y\":25},{\"x\":38,\"y\":313},{\"x\":507,\"y\":281},{\"x\":486,\"y\":34},{\"x\":31,\"y\":22}]', 8, '10', 'Live', '2021-03-24 05:21:02', '2021-03-24 05:21:02'),
(11, 'Test', 'Test', '[{\"x\":181,\"y\":257},{\"x\":171,\"y\":69},{\"x\":370,\"y\":56},{\"x\":371,\"y\":93},{\"x\":265,\"y\":128},{\"x\":230,\"y\":159},{\"x\":239,\"y\":230},{\"x\":184,\"y\":257}]', 8, '10', 'Live', '2021-03-24 12:26:46', '2021-03-24 12:26:46'),
(12, 'Towhid', 'friday created', '[{\"x\":26.34375,\"y\":11},{\"x\":746.34375,\"y\":17},{\"x\":699.34375,\"y\":347},{\"x\":31.34375,\"y\":361},{\"x\":27.34375,\"y\":14}]', 8, '10', 'Live', '2021-04-09 06:44:36', '2021-04-09 06:44:36'),
(13, 'ola', 'for test', '[{\"x\":82.34375,\"y\":108},{\"x\":599.34375,\"y\":108},{\"x\":599.34375,\"y\":338},{\"x\":308.34375,\"y\":316},{\"x\":177.34375,\"y\":277},{\"x\":129.34375,\"y\":200},{\"x\":129.34375,\"y\":152},{\"x\":223.34375,\"y\":170},{\"x\":212.34375,\"y\":178},{\"x\":207.34375,\"y\":177},{\"x\":215.34375,\"y\":190},{\"x\":291.34375,\"y\":194},{\"x\":342.34375,\"y\":180},{\"x\":412.34375,\"y\":175},{\"x\":394.34375,\"y\":218},{\"x\":431.34375,\"y\":203},{\"x\":463.34375,\"y\":165},{\"x\":480.34375,\"y\":165},{\"x\":533.34375,\"y\":168}]', 8, '10', 'Live', '2021-04-12 11:12:50', '2021-04-12 11:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_floor_tables`
--

DROP TABLE IF EXISTS `tbl_restaurant_floor_tables`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_floor_tables` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest_count` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` double(10,2) NOT NULL,
  `height` double(10,2) NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waiter_id` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_floor_tables_floor_id_foreign` (`floor_id`),
  KEY `tbl_restaurant_floor_tables_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_floor_tables`
--

INSERT INTO `tbl_restaurant_floor_tables` (`id`, `name`, `guest_count`, `width`, `height`, `position`, `table_type`, `waiter_id`, `floor_id`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'table1', '4', 60.00, 54.00, '{\"x\":98,\"y\":192}', 'rectangular', '3', 4, 3, '2', 'Live', '2020-10-03 08:46:59', '2020-10-04 13:32:06'),
(2, 'table2', '5', 70.00, 80.00, '{\"x\":459,\"y\":183}', 'round', '3', 4, 3, '2', 'Live', '2020-10-03 09:33:34', '2020-10-05 11:33:39'),
(3, 'shuvo', '10', 70.50, 100.00, '{\"x\":282,\"y\":114}', 'rectangular', '3', 4, 3, '2', 'Live', '2020-10-03 14:06:02', '2020-10-05 11:33:40'),
(4, 'table1', '5', 56.00, 54.00, '{\"x\":370,\"y\":138}', 'round', '3', 6, 3, '2', 'Live', '2020-10-04 13:38:24', '2020-11-04 13:41:02'),
(5, 'table2', '4', 80.00, 60.00, '{\"x\":246,\"y\":106}', 'rectangular', '3', 6, 3, '2', 'Live', '2020-10-04 13:41:14', '2020-11-04 13:41:33'),
(6, 'table3', '6', 80.00, 60.00, '{\"x\":152.67442321777344,\"y\":170.00003051757812}', 'rectangular', '3', 6, 3, '2', 'Live', '2020-10-04 13:43:07', '2020-12-18 05:08:37'),
(7, 'tyty_t', '1', 20.00, 20.00, '{\"x\":300,\"y\":194}', 'rectangular', '3', 6, 3, '2', 'Deleted', '2020-10-04 13:49:59', '2020-10-05 11:02:34'),
(8, 'mahmud-al-adan', '4', 56.00, 54.00, NULL, 'rectangular', '3', 1, 3, '2', 'Live', '2020-10-05 08:12:59', '2020-10-05 08:12:59'),
(9, 'mahmud-al-adan', '3', 80.00, 90.00, '{\"x\":204,\"y\":120}', 'round', '3', 2, 3, '2', 'Deleted', '2020-10-05 08:14:59', '2020-10-05 10:00:15'),
(10, 'shuvo', '5', 56.00, 54.00, '{\"x\":183,\"y\":149}', 'rectangular', '3', 2, 3, '2', 'Deleted', '2020-10-05 10:02:32', '2020-10-05 10:55:57'),
(11, 'shuvo', '55', 56.00, 54.00, NULL, 'round', '3', 2, 3, '2', 'Deleted', '2020-10-05 12:58:43', '2020-10-05 12:59:00'),
(12, 'shuvo', '5', 100.00, 100.00, '{\"x\":517,\"y\":198}', 'rectangular', '3', 6, 3, '2', 'Deleted', '2020-10-16 20:04:13', '2020-10-16 20:04:51'),
(13, 'table-4', '3', 56.00, 54.00, '{\"x\":277,\"y\":193}', 'rectangular', NULL, 6, 3, '2', 'Deleted', '2020-10-17 11:19:07', '2020-10-17 11:21:08'),
(14, 'shuvo', '4', 56.00, 54.00, '{\"x\":300,\"y\":177}', 'round', NULL, 6, 3, '2', 'Live', '2020-10-17 11:29:47', '2020-11-04 13:46:07'),
(15, '21', '2', 56.00, 54.00, '{\"x\":203,\"y\":106}', 'rectangular', NULL, 2, 3, '2', 'Live', '2020-10-17 17:49:49', '2020-10-31 15:39:50'),
(16, '501', '4', 56.00, 54.00, '{\"x\":488,\"y\":165}', 'round', NULL, 7, 3, '2', 'Live', '2021-01-21 17:35:59', '2021-01-21 17:40:37'),
(17, '502', '4', 20.00, 20.00, '{\"x\":47,\"y\":183}', 'round', NULL, 7, 3, '2', 'Live', '2021-01-21 17:36:28', '2021-01-21 17:36:31'),
(18, '503', '4', 30.00, 30.00, '{\"x\":614,\"y\":330}', 'rectangular', NULL, 7, 3, '2', 'Live', '2021-01-21 17:37:00', '2021-01-21 17:39:13'),
(19, '504', '4', 35.00, 35.00, '{\"x\":213,\"y\":92}', 'round', NULL, 7, 3, '2', 'Live', '2021-01-21 17:37:46', '2021-01-21 17:37:56'),
(20, '505', '4', 40.00, 40.00, '{\"x\":679,\"y\":258}', 'rectangular', NULL, 7, 3, '2', 'Live', '2021-01-21 17:38:51', '2021-01-21 17:41:35'),
(21, '506', '4', 40.00, 40.00, '{\"x\":509,\"y\":246}', 'rectangular', NULL, 7, 3, '2', 'Live', '2021-01-21 17:39:54', '2021-01-21 17:41:14'),
(22, '101', '4', 40.00, 40.00, '{\"x\":94,\"y\":90}', 'round', NULL, 8, 3, '2', 'Deleted', '2021-01-25 15:49:08', '2021-01-25 17:37:00'),
(23, '102', '4', 40.00, 40.00, '{\"x\":166,\"y\":43}', 'round', NULL, 8, 3, '2', 'Live', '2021-01-25 15:49:14', '2021-01-25 15:50:14'),
(24, '103', '4', 40.00, 40.00, '{\"x\":57,\"y\":147}', 'round', NULL, 8, 3, '2', 'Live', '2021-01-25 15:49:21', '2021-01-25 15:50:00'),
(25, '104', '4', 40.00, 40.00, '{\"x\":43,\"y\":199}', 'round', NULL, 8, 3, '2', 'Live', '2021-01-25 15:49:26', '2021-01-25 15:50:30'),
(26, '105', '4', 40.00, 40.00, '{\"x\":45,\"y\":282}', 'round', NULL, 8, 3, '2', 'Live', '2021-01-25 15:49:35', '2021-01-25 15:49:48'),
(27, '301', '4', 38.00, 42.00, '{\"x\":93,\"y\":343}', 'rectangular', NULL, 8, 3, '2', 'Deleted', '2021-01-25 15:51:14', '2021-01-25 17:37:58'),
(28, '302', '4', 44.00, 40.00, '{\"x\":164,\"y\":344}', 'rectangular', NULL, 8, 3, '2', 'Deleted', '2021-01-25 15:52:21', '2021-01-25 17:38:59'),
(29, '303', '4', 44.00, 40.00, '{\"x\":475,\"y\":293}', 'rectangular', NULL, 8, 3, '2', 'Live', '2021-01-25 15:52:47', '2021-01-25 17:39:41'),
(30, '304', '4', 44.00, 40.00, '{\"x\":296,\"y\":341}', 'rectangular', NULL, 8, 3, '2', 'Live', '2021-01-25 15:52:50', '2021-01-25 15:53:34'),
(31, '305', '4', 44.00, 40.00, '{\"x\":460,\"y\":351}', 'rectangular', NULL, 8, 3, '2', 'Live', '2021-01-25 15:52:55', '2021-01-25 17:39:43'),
(32, '101', '8', 50.00, 50.00, '{\"x\":331,\"y\":111}', 'round', NULL, 8, 3, '2', 'Live', '2021-01-25 17:37:15', '2021-01-25 17:37:41'),
(33, '301', '2', 30.00, 40.00, '{\"x\":84,\"y\":348}', 'rectangular', NULL, 8, 3, '2', 'Live', '2021-01-25 17:38:22', '2021-01-25 17:38:35'),
(34, '302', '4', 40.00, 40.00, '{\"x\":159,\"y\":346}', 'rectangular', NULL, 8, 3, '2', 'Live', '2021-01-25 17:39:14', '2021-01-25 17:39:33'),
(35, '501', '1', 30.00, 30.00, NULL, 'round', NULL, 8, 3, '2', 'Live', '2021-01-25 17:40:45', '2021-01-25 17:40:45'),
(36, '502', '1', 25.00, 25.00, '{\"x\":219,\"y\":198}', 'round', NULL, 8, 3, '2', 'Live', '2021-01-25 17:41:06', '2021-01-25 17:41:10'),
(37, '101', '8', 50.00, 50.00, '{\"x\":41,\"y\":287}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 17:48:01', '2021-01-25 17:49:24'),
(38, '102', '8', 50.00, 50.00, '{\"x\":48,\"y\":209}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 17:48:06', '2021-01-25 18:08:38'),
(39, '103', '8', 50.00, 50.00, '{\"x\":71,\"y\":131}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 17:48:15', '2021-01-25 18:08:39'),
(40, '104', '8', 50.00, 50.00, '{\"x\":103,\"y\":69}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 17:48:20', '2021-01-25 18:08:29'),
(41, '105', '8', 50.00, 50.00, '{\"x\":169,\"y\":44}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 17:48:43', '2021-01-25 17:49:56'),
(42, '301', '2', 30.00, 40.00, '{\"x\":67,\"y\":353}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 17:51:29', '2021-01-25 17:51:38'),
(43, '302', '4', 40.00, 40.00, '{\"x\":141,\"y\":349}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 17:52:53', '2021-01-25 17:53:01'),
(44, '303', '4', 40.00, 40.00, '{\"x\":199,\"y\":350}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 17:53:07', '2021-01-25 17:53:12'),
(45, '304', '4', 40.00, 40.00, '{\"x\":284,\"y\":349}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 17:53:18', '2021-01-25 17:53:50'),
(46, '305', '4', 40.00, 40.00, '{\"x\":343,\"y\":350}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 17:53:31', '2021-01-25 17:53:46'),
(47, '201', '4', 40.00, 40.00, '{\"x\":120,\"y\":273}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 17:55:18', '2021-01-25 18:19:11'),
(48, '202', '4', 40.00, 40.00, '{\"x\":181,\"y\":273}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 17:55:27', '2021-01-25 18:19:46'),
(49, '203', '4', 40.00, 40.00, '{\"x\":248,\"y\":271}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 17:55:44', '2021-01-25 18:19:52'),
(50, '204', '4', 40.00, 40.00, '{\"x\":311,\"y\":273}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 17:56:00', '2021-01-25 18:21:22'),
(51, '205', '4', 40.00, 40.00, '{\"x\":115,\"y\":208}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 17:56:16', '2021-01-25 18:21:58'),
(52, '206', '4', 40.00, 40.00, '{\"x\":186,\"y\":209}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 17:56:29', '2021-01-25 18:21:36'),
(53, '207', '4', 40.00, 40.00, '{\"x\":259,\"y\":209}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 17:56:38', '2021-01-25 18:21:14'),
(54, '208', '4', 40.00, 40.00, '{\"x\":169,\"y\":145}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 17:56:53', '2021-01-25 18:19:03'),
(55, '209', '4', 40.00, 40.00, '{\"x\":244,\"y\":145}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 17:57:02', '2021-01-25 18:19:34'),
(56, '601', '2', 40.00, 30.00, '{\"x\":732,\"y\":195}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 18:03:26', '2021-01-25 18:03:33'),
(57, '602', '2', 40.00, 30.00, '{\"x\":730,\"y\":238}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 18:03:38', '2021-01-25 18:08:04'),
(58, '603', '2', 40.00, 30.00, '{\"x\":731,\"y\":276}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 18:03:51', '2021-01-25 18:06:40'),
(59, '604', '2', 40.00, 30.00, '{\"x\":732,\"y\":319}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 18:04:00', '2021-01-25 18:06:34'),
(60, '605', '2', 40.00, 30.00, '{\"x\":733,\"y\":354}', 'rectangular', NULL, 9, 8, '10', 'Live', '2021-01-25 18:04:16', '2021-01-25 18:07:31'),
(61, '501', '1', 30.00, 30.00, '{\"x\":340,\"y\":155}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:09:43', '2021-01-25 18:12:23'),
(62, '502', '1', 30.00, 30.00, '{\"x\":380,\"y\":155}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:09:58', '2021-01-25 18:12:25'),
(63, '503', '1', 30.00, 30.00, '{\"x\":420,\"y\":156}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:10:07', '2021-01-25 18:12:29'),
(64, '504', '1', 30.00, 30.00, '{\"x\":480,\"y\":155}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:10:18', '2021-01-25 18:12:32'),
(65, '505', '1', 30.00, 30.00, '{\"x\":520,\"y\":155}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:10:26', '2021-01-25 18:12:35'),
(66, '506', '1', 30.00, 30.00, '{\"x\":560,\"y\":155}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:10:33', '2021-01-25 18:12:38'),
(67, '507', '1', 30.00, 30.00, '{\"x\":600,\"y\":155}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:10:43', '2021-01-25 18:14:51'),
(68, '508', '1', 30.00, 30.00, '{\"x\":640,\"y\":155}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:10:52', '2021-01-25 18:12:43'),
(69, '509', '1', 30.00, 30.00, '{\"x\":680,\"y\":155}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:10:59', '2021-01-25 18:12:49'),
(70, '510', '1', 30.00, 30.00, '{\"x\":720,\"y\":155}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:12:14', '2021-01-25 18:12:53'),
(71, '511', '1', 30.00, 30.00, '{\"x\":675,\"y\":199}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:16:06', '2021-01-25 18:16:31'),
(72, '512', '1', 30.00, 30.00, '{\"x\":634,\"y\":197}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:16:36', '2021-01-25 18:18:10'),
(73, '513', '1', 30.00, 30.00, '{\"x\":594,\"y\":198}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:16:46', '2021-01-25 18:16:54'),
(74, '514', '1', 30.00, 30.00, '{\"x\":556,\"y\":195}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:16:57', '2021-01-25 18:17:03'),
(75, '515', '1', 30.00, 30.00, '{\"x\":519,\"y\":195}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:17:07', '2021-01-25 18:17:59'),
(76, '516', '1', 30.00, 30.00, '{\"x\":479,\"y\":195}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:17:14', '2021-01-25 18:18:01'),
(77, '517', '1', 30.00, 30.00, '{\"x\":438,\"y\":197}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:17:22', '2021-01-25 18:18:04'),
(78, '518', '1', 30.00, 30.00, '{\"x\":399,\"y\":192}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:17:30', '2021-01-25 18:18:05'),
(79, '519', '1', 30.00, 30.00, '{\"x\":356,\"y\":194}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:17:40', '2021-01-25 18:17:44'),
(80, '520', '1', 30.00, 30.00, '{\"x\":315,\"y\":195}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:17:48', '2021-01-25 18:17:52'),
(81, '801', '1', 30.00, 30.00, '{\"x\":409,\"y\":36}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:27:15', '2021-01-25 18:28:23'),
(82, '802', '1', 30.00, 30.00, '{\"x\":457,\"y\":33}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:27:26', '2021-01-25 18:29:02'),
(83, '803', '1', 30.00, 30.00, '{\"x\":502,\"y\":32}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:27:32', '2021-01-25 18:29:05'),
(84, '804', '1', 30.00, 30.00, '{\"x\":548,\"y\":32}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:27:39', '2021-01-25 18:29:07'),
(85, '805', '1', 30.00, 30.00, '{\"x\":596,\"y\":32}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:27:47', '2021-01-25 18:29:11'),
(86, '806', '1', 30.00, 30.00, '{\"x\":642,\"y\":35}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:27:56', '2021-01-25 18:29:16'),
(87, '807', '1', 30.00, 30.00, '{\"x\":690,\"y\":35}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:28:03', '2021-01-25 18:29:22'),
(88, '808', '1', 30.00, 30.00, '{\"x\":737,\"y\":36}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:28:11', '2021-01-25 18:29:20'),
(89, '809', '1', 30.00, 30.00, '{\"x\":742,\"y\":79}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:29:42', '2021-01-25 18:29:46'),
(90, '810', '1', 30.00, 30.00, '{\"x\":693,\"y\":79}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:29:52', '2021-01-25 18:30:21'),
(91, '811', '1', 30.00, 30.00, '{\"x\":642,\"y\":79}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:30:00', '2021-01-25 18:30:17'),
(92, '812', '1', 30.00, 30.00, '{\"x\":594,\"y\":77}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:30:09', '2021-01-25 18:30:14'),
(93, '813', '1', 30.00, 30.00, '{\"x\":544,\"y\":77}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:30:25', '2021-01-25 18:30:33'),
(94, '814', '1', 30.00, 30.00, '{\"x\":496,\"y\":77}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:30:36', '2021-01-25 18:30:40'),
(95, '815', '1', 30.00, 30.00, '{\"x\":452,\"y\":77}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:30:44', '2021-01-25 18:30:49'),
(96, '816', '1', 30.00, 30.00, '{\"x\":407,\"y\":78}', 'round', NULL, 9, 8, '10', 'Live', '2021-01-25 18:30:52', '2021-01-25 18:30:57'),
(97, 'test', '5', 200.00, 100.00, '{\"x\":263,\"y\":129}', 'round', NULL, 11, 8, '10', 'Live', '2021-03-24 12:27:56', '2021-03-24 12:28:07'),
(98, 'test', '5', 200.00, 100.00, '{\"x\":270,\"y\":277}', 'round', NULL, 11, 8, '10', 'Live', '2021-03-24 12:28:17', '2021-03-24 12:28:19'),
(99, 'test', '5', 200.00, 100.00, '{\"x\":476,\"y\":267}', 'round', NULL, 11, 8, '10', 'Live', '2021-03-24 12:28:20', '2021-03-24 12:28:24'),
(100, 'test', '5', 200.00, 100.00, '{\"x\":473,\"y\":129}', 'round', NULL, 11, 8, '10', 'Live', '2021-03-24 12:28:24', '2021-03-24 12:28:27'),
(101, 'test', '5', 200.00, 100.00, '{\"x\":122,\"y\":204}', 'round', NULL, 11, 8, '10', 'Live', '2021-03-24 12:28:27', '2021-03-24 12:28:29'),
(102, 'test', '5', 200.00, 100.00, '{\"x\":634,\"y\":197}', 'round', NULL, 11, 8, '10', 'Live', '2021-03-24 12:28:30', '2021-03-24 12:28:34'),
(103, 'test', '5', 200.00, 100.00, '{\"x\":362,\"y\":197}', 'round', NULL, 11, 8, '10', 'Live', '2021-03-24 12:28:35', '2021-03-24 12:28:36'),
(104, 'test', '5', 200.00, 100.00, '{\"x\":396,\"y\":331}', 'round', NULL, 11, 8, '10', 'Live', '2021-03-24 12:28:37', '2021-03-24 12:28:39'),
(105, 'test', '5', 200.00, 100.00, '{\"x\":618,\"y\":266}', 'round', NULL, 11, 8, '10', 'Live', '2021-03-24 12:28:40', '2021-03-24 12:28:42'),
(106, 'test', '5', 200.00, 100.00, '{\"x\":143,\"y\":136}', 'round', NULL, 11, 8, '10', 'Live', '2021-03-24 12:28:42', '2021-03-24 12:28:44'),
(107, 'test', '5', 200.00, 100.00, '{\"x\":380,\"y\":72}', 'round', NULL, 11, 8, '10', 'Live', '2021-03-24 12:28:45', '2021-03-24 12:28:47'),
(108, 'test', '5', 200.00, 100.00, '{\"x\":131,\"y\":285}', 'round', NULL, 11, 8, '10', 'Live', '2021-03-24 12:28:48', '2021-03-24 12:28:50'),
(109, 'test', '5', 200.00, 100.00, '{\"x\":609,\"y\":132}', 'round', NULL, 11, 8, '10', 'Live', '2021-03-24 12:28:51', '2021-03-24 12:28:53'),
(110, '01', '04', 300.00, 300.00, '{\"x\":250,\"y\":185}', 'rectangular', NULL, 12, 8, '10', 'Deleted', '2021-04-09 06:45:25', '2021-04-09 06:46:20'),
(111, '01', '04', 30.00, 30.00, '{\"x\":396,\"y\":188}', 'rectangular', NULL, 12, 8, '10', 'Deleted', '2021-04-09 06:46:41', '2021-04-09 06:49:18'),
(112, '02', '04', 80.00, 80.00, '{\"x\":162,\"y\":106}', 'round', NULL, 12, 8, '10', 'Live', '2021-04-09 06:46:56', '2021-04-09 06:47:14'),
(113, '03', '05', 80.00, 80.00, '{\"x\":223,\"y\":138}', 'round', NULL, 12, 8, '10', 'Live', '2021-04-09 06:47:06', '2021-04-12 07:30:40'),
(114, '04', '05', 80.00, 80.00, '{\"x\":156,\"y\":171}', 'round', NULL, 12, 8, '10', 'Live', '2021-04-09 06:48:37', '2021-04-12 07:30:33'),
(115, '01', '06', 90.00, 90.00, '{\"x\":612,\"y\":187}', 'rectangular', NULL, 12, 8, '10', 'Live', '2021-04-09 06:50:25', '2021-04-12 08:55:07'),
(116, 'olas', '5', 70.00, 70.00, '{\"x\":530,\"y\":269}', 'rectangular', NULL, 13, 8, '10', 'Live', '2021-04-12 11:13:29', '2021-04-12 11:13:32'),
(117, 'olas', '5', 70.00, 70.00, '{\"x\":435,\"y\":270}', 'rectangular', NULL, 13, 8, '10', 'Live', '2021-04-12 11:13:36', '2021-04-12 11:13:43'),
(118, 'olas', '5', 70.00, 70.00, '{\"x\":332,\"y\":266}', 'rectangular', NULL, 13, 8, '10', 'Live', '2021-04-12 11:13:44', '2021-04-12 11:13:51'),
(119, 'olas', '5', 70.00, 70.00, '{\"x\":226,\"y\":240}', 'rectangular', NULL, 13, 8, '10', 'Live', '2021-04-12 11:13:53', '2021-04-12 11:13:58'),
(120, 'olas', '5', 70.00, 70.00, '{\"x\":530,\"y\":186}', 'rectangular', NULL, 13, 8, '10', 'Live', '2021-04-12 11:14:09', '2021-04-12 11:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_food_menus`
--

DROP TABLE IF EXISTS `tbl_restaurant_food_menus`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_food_menus` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `dine_in_price` double(10,2) NOT NULL,
  `take_away_price` double(10,2) NOT NULL,
  `delivery_order_price` double(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `veg_item` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `beverage` enum('Yes','No') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panel_id` bigint(20) UNSIGNED NOT NULL,
  `tax_info` longtext COLLATE utf8mb4_unicode_ci,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  KEY `tbl_restaurant_food_menus_panel_id_foreign` (`panel_id`),
  KEY `tbl_restaurant_food_menus_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_food_menus`
--

INSERT INTO `tbl_restaurant_food_menus` (`id`, `name`, `code`, `cat_id`, `dine_in_price`, `take_away_price`, `delivery_order_price`, `description`, `photo`, `veg_item`, `beverage`, `panel_id`, `tax_info`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Nelle Hewitt', '01', 5, 150.00, 633.00, 757.00, 'Quas deserunt tempor', NULL, 'Yes', 'No', 2, '[{\"tax_field_id\":\"7\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"0\"}]', 3, '2', 'Deleted', '2020-09-05 05:18:35', '2020-09-05 07:20:45'),
(2, 'Joan Hogan', '02', 4, 930.00, 612.00, 958.00, 'Sapiente quis soluta', '1599311557_beautiful-clouds-landscape.jpg', 'No', 'Yes', 2, NULL, 3, '2', 'Deleted', '2020-09-05 05:27:39', '2020-09-29 09:22:08'),
(3, 'food menu 3', '02', 1, 120.00, 100.00, 110.00, 'no description', '1602668447_02f34847d0dec974a58a1da02ce7600c.jpg', 'Yes', 'Yes', 3, '[{\"tax_field_id\":51,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7}]', 3, '2', 'Live', '2020-09-29 09:04:42', '2021-01-22 18:56:51'),
(4, 'lorem', '03', 3, 120.00, 100.00, 110.00, 'Description', NULL, 'Yes', 'No', 3, '[{\"tax_field_id\":51,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7}]', 3, '2', 'Live', '2020-09-29 09:23:10', '2021-01-22 18:56:39'),
(5, 'menu 2', '04', 5, 120.00, 100.00, 110.00, 'description second floor', '1602668473_6fdac92df7221c396a53ce783cc51269.jpg', 'Yes', 'Yes', 2, '[{\"tax_field_id\":51,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7}]', 3, '2', 'Live', '2020-10-02 15:23:05', '2021-01-22 18:52:57'),
(6, 'food menu 2 _(bev remove)', '05', 9, 120.00, 90.00, 90.00, 'description', NULL, 'Yes', NULL, 2, '[{\"tax_field_id\":51,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7}]', 3, '2', 'Live', '2020-10-17 06:22:40', '2021-01-22 18:52:25'),
(8, 'food menu 2 _(multiple shift)', '06', 8, 220.00, 200.00, 200.00, 'description  floor third', NULL, 'No', NULL, 2, '[{\"tax_field_id\":51,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7}]', 3, '2', 'Live', '2020-10-17 09:41:37', '2021-01-22 18:43:29'),
(9, 'food menu 2 _(vat/tax)', '07', 8, 120.00, 90.00, 90.00, 'description', NULL, 'Yes', NULL, 2, '[{\"tax_field_id\":51,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7}]', 3, '2', 'Live', '2020-10-17 14:30:03', '2021-01-22 18:56:28'),
(10, 'BEEF POT Lunch', '03', 11, 17.00, 17.00, 17.00, 'DescriptServed with fatty brisket, eye-round steak, beef meatballs, spam, sliced sausage, napa cabbage, bok choy, potato, corn, broccoli, pumpkinion', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:32:49', '2021-01-23 20:32:49'),
(11, 'BEEF POT Dinner', '04', 11, 22.00, 22.00, 22.00, 'DescripServed with fatty brisket, eye-round steak, beef meatballs, spam, sliced sausage, napa cabbage, bok choy, potato, corn, broccoli, pumpkintion', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:33:49', '2021-01-23 20:33:49'),
(12, 'LAMB POT Lunch', '05', 11, 17.00, 17.00, 17.00, 'DescriServed with lamb, fatty brisket, beef meatball, spam, sliced sausage, napa cabbage, bok choy, potato, corn, broccoli, pumpkinption', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:34:51', '2021-01-23 20:34:51'),
(13, 'LAMB POT Dinner', '06', 11, 22.00, 22.00, 22.00, 'DescriptionServed with lamb, fatty brisket, beef meatball, spam, sliced sausage, napa cabbage, bok choy, potato, corn, broccoli, pumpkin', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:35:24', '2021-01-23 20:35:24'),
(14, 'CHICKEN POT Lunch', '07', 11, 17.00, 17.00, 17.00, 'Served with chicken, fatty brisket, beef meatball, spam, mini sausage, napa cabbage, bok choy, potato, corn, broccoli, pumpkin', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:36:38', '2021-01-23 20:36:38'),
(15, 'CHICKEN POT Dinner', '08', 11, 22.00, 22.00, 22.00, 'Served with chicken, fatty brisket, beef meatball, spam, mini sausage, napa cabbage, bok choy, potato, corn, broccoli, pumpkin', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:37:13', '2021-01-23 20:37:13'),
(16, 'PORK POT Lunch', '09', 11, 17.00, 17.00, 17.00, 'Served with pork belly, eye-round steak, pork meatballs, spam, mini sausage, napa cabbage, bok choy, potato, corn, broccoli, pumpkin', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:38:03', '2021-01-23 20:38:03'),
(17, 'PORK POT Dinner', '010', 11, 22.00, 22.00, 22.00, 'Served with pork belly, eye-round steak, pork meatballs, spam, mini sausage, napa cabbage, bok choy, potato, corn, broccoli, pumpkin', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:38:50', '2021-01-23 20:38:50'),
(18, 'SEAFOOD POT Lunch', '011', 12, 19.00, 19.00, 19.00, 'Served with shrimp (shell on/off, fish, mussels, squid, fish ball, napa cabbage, bok choy, potato, corn, broccoli, pumpkin', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:39:50', '2021-01-23 20:39:50'),
(19, 'SEAFOOD POT Dinner', '012', 12, 23.00, 23.00, 23.00, 'Served with shrimp (shell on/off, fish, mussels, squid, fish ball, napa cabbage, bok choy, potato, corn, broccoli, pumpkin', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:40:38', '2021-01-23 20:40:38'),
(20, 'VEGGIE POT Lunch', '013', 14, 15.00, 15.00, 15.00, 'Served with, tofu, frozen tofu, napa cabbage, bok choy, potato, corn, broccoli, king mushroom, enoki mushroom, spinach', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:41:29', '2021-01-23 20:42:37'),
(21, 'VEGGIE POT Dinner', '014', 14, 18.00, 18.00, 18.00, 'Served with, tofu, frozen tofu, napa cabbage, bok choy, potato, corn, broccoli, king mushroom, enoki mushroom, spinach', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:42:11', '2021-01-23 20:42:25'),
(22, 'CUSTOM POT Lunch', '014', 16, 19.00, 19.00, 19.00, 'Pick any 3 meat or seafood items, and any 5 items from the \"vegetable\",', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:44:27', '2021-01-23 20:44:27'),
(23, 'CUSTOM POT Dinner', '015', 16, 23.00, 23.00, 23.00, 'Pick any 3 meat or seafood items, and any 5 items from the \"vegetable\",', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:44:59', '2021-01-23 20:44:59'),
(24, 'White Rice Adult', '016', 13, 30.00, 30.00, 30.00, '', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:54:15', '2021-01-23 20:54:15'),
(25, 'White Rice Children', '017', 13, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:54:59', '2021-01-23 20:54:59'),
(26, 'Ramen Noodle Adult', '018', 13, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:55:31', '2021-01-23 20:55:31'),
(27, 'Ramen Noodle Children', '019', 13, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:56:36', '2021-01-23 20:56:36'),
(28, 'Fried Rice +2 Adult', '020', 13, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:57:27', '2021-01-23 20:57:27'),
(29, 'Fried Rice +2 Children', '021', 13, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:57:49', '2021-01-23 20:57:49'),
(30, 'Udon Noodle Adult', '022', 13, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:58:26', '2021-01-23 20:58:26'),
(31, 'Udon Noodle Children', '023', 13, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:58:47', '2021-01-23 20:58:47'),
(32, 'Clear Noodle Adult', '024', 13, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:59:14', '2021-01-23 20:59:14'),
(33, 'Clear Noodle Children', '025', 13, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 20:59:34', '2021-01-23 20:59:34'),
(34, 'Wonton +2 Adult', '026', 13, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:00:01', '2021-01-23 21:00:01'),
(35, 'Wonton +2 Children', '027', 13, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:00:29', '2021-01-23 21:00:29'),
(36, 'Shrimp (Shell-On) Adult', '028', 12, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:01:39', '2021-01-23 21:01:39'),
(37, 'Shrimp (Shell-On) Children', '029', 12, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:01:58', '2021-01-23 21:01:58'),
(38, 'Shrimp (Shell-Off) Adult', '030', 12, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:02:36', '2021-01-23 21:02:36'),
(39, 'Shrimp (Shell-Off) Children', '031', 12, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:03:08', '2021-01-23 21:03:08'),
(40, 'Fish Filet Adult', '032', 12, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:03:32', '2021-01-23 21:03:32'),
(41, 'Fish Filet Children', '033', 12, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:03:58', '2021-01-23 21:03:58'),
(42, 'Crawfish Adult', '034', 12, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:04:38', '2021-01-23 21:04:38'),
(43, 'Crawfish Children', '035', 12, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:05:00', '2021-01-23 21:05:00'),
(44, 'Fish Ball Adult', '036', 12, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:05:30', '2021-01-23 21:05:30'),
(45, 'Fish Ball Children', '037', 12, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:06:07', '2021-01-23 21:06:07'),
(46, 'Shrimp Ball Adult', '038', 12, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:06:32', '2021-01-23 21:06:32'),
(47, 'Shrimp Ball Children', '039', 12, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:06:52', '2021-01-23 21:06:52'),
(48, 'Mussels Adult', '040', 12, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:07:15', '2021-01-23 21:07:15'),
(49, 'Mussels Children', '041', 12, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:07:42', '2021-01-23 21:07:42'),
(50, 'Clams Adult', '042', 12, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:08:28', '2021-01-23 21:08:28'),
(51, 'Clams Children', '043', 12, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:08:46', '2021-01-23 21:08:46'),
(52, 'Squid Adult', '044', 12, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:09:19', '2021-01-23 21:09:19'),
(53, 'Squid Children', '045', 12, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:09:42', '2021-01-23 21:09:42'),
(54, 'Lobster Ball Adult', '046', 12, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:10:09', '2021-01-23 21:10:09'),
(55, 'Lobster Ball Children', '047', 12, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:10:38', '2021-01-23 21:10:38'),
(56, 'Cuttlefish Ball Adult', '048', 12, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:11:06', '2021-01-23 21:11:06'),
(57, 'Cuttlefish Ball Children', '049', 12, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:11:32', '2021-01-23 21:11:32'),
(58, 'Imitation Crab Stick Adult', '050', 12, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:12:07', '2021-01-23 21:12:07'),
(59, 'Imitation Crab Stick Children', '051', 12, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:12:25', '2021-01-23 21:12:25'),
(60, 'Mini Dumplings Adult', '052', 16, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:14:03', '2021-01-23 21:14:03'),
(61, 'Mini Dumplings Children', '053', 16, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:14:25', '2021-01-23 21:14:25'),
(62, 'Mini Sausage Adult', '054', 16, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:14:59', '2021-01-23 21:14:59'),
(63, 'Mini Sausage Children', '055', 16, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:15:16', '2021-01-23 21:15:16'),
(64, 'Sliced Sausage Adult', '056', 16, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:15:51', '2021-01-23 21:15:51'),
(65, 'Sliced Sausage Children', '057', 16, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:16:09', '2021-01-23 21:16:09'),
(66, 'Pork Rinds Adult', '058', 16, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:16:50', '2021-01-23 21:16:50'),
(67, 'Pork Rinds Children', '059', 16, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:17:11', '2021-01-23 21:17:11'),
(68, 'Spam Adult', '060', 16, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:17:44', '2021-01-23 21:17:44'),
(69, 'Spam Children', '061', 16, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:18:02', '2021-01-23 21:18:02'),
(70, 'Quail Eggs Adult', '062', 16, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:18:25', '2021-01-23 21:18:25'),
(71, 'Quail Eggs Children', '063', 16, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:18:45', '2021-01-23 21:18:45'),
(72, 'Egg Adult', '064', 16, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:19:29', '2021-01-23 21:19:29'),
(73, 'Egg Children', '065', 16, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:19:56', '2021-01-23 21:19:56'),
(74, 'Twist Cruller Adult', '066', 16, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:20:24', '2021-01-23 21:20:24'),
(75, 'Twist Cruller Children', '067', 16, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:20:53', '2021-01-23 21:20:53'),
(76, 'Enoki Mushroom Adult', '068', 15, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:22:54', '2021-01-23 21:22:54'),
(77, 'Enoki Mushroom Children', '069', 15, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:23:19', '2021-01-23 21:23:19'),
(78, 'Shiitake Mushroom Adult', '070', 15, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:23:53', '2021-01-23 21:23:53'),
(79, 'Shiitake Mushroom Children', '071', 15, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:24:14', '2021-01-23 21:24:14'),
(80, 'King Mushroom Adult', '072', 15, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:26:08', '2021-01-23 21:26:08'),
(81, 'King Mushroom Children', '073', 15, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:26:26', '2021-01-23 21:26:26'),
(82, 'Wood Mushroom Adult', '074', 15, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:26:56', '2021-01-23 21:26:56'),
(83, 'Wood Mushroom Children', '075', 15, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:27:17', '2021-01-23 21:27:17'),
(84, 'Tofu Adult', '076', 15, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:27:45', '2021-01-23 21:27:45'),
(85, 'Tofu Children', '077', 15, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:28:06', '2021-01-23 21:28:06'),
(86, 'Frozen Tofu Adult', '078', 15, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:28:29', '2021-01-23 21:28:29'),
(87, 'Frozen Tofu Children', '079', 15, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:28:45', '2021-01-23 21:28:45'),
(88, 'Tofu Skin Adult', '080', 15, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:29:05', '2021-01-23 21:29:05'),
(89, 'Tofu Skin Children', '081', 15, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:29:23', '2021-01-23 21:29:23'),
(90, 'Fried Tofu Adult', '082', 15, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:29:54', '2021-01-23 21:29:54'),
(91, 'Fried Tofu Children', '083', 15, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:30:23', '2021-01-23 21:30:23'),
(92, 'Fish Tofu Adult', '084', 15, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:30:47', '2021-01-23 21:30:47'),
(93, 'Fish Tofu Children', '085', 15, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-23 21:31:06', '2021-01-23 21:31:06'),
(94, 'Napa Cabbage Adult', '086', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 16:26:27', '2021-01-24 16:27:35'),
(95, 'Napa Cabbage Children', '087', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 16:27:02', '2021-01-24 16:27:47'),
(96, 'Spinach Adult', '088', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 16:28:37', '2021-01-24 16:28:37'),
(97, 'Spinach Children', '089', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 16:29:09', '2021-01-24 16:29:09'),
(98, 'Bok Choy Adult', '090', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 16:29:52', '2021-01-24 16:29:52'),
(99, 'Bok Choy Children', '091', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 16:30:17', '2021-01-24 16:30:17'),
(100, 'Rice Cake Adult', '092', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 16:30:52', '2021-01-24 16:31:20'),
(101, 'Rice Cake Children', '093', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 16:31:36', '2021-01-24 16:31:36'),
(102, 'Winter Melon Adult', '094', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 16:32:09', '2021-01-24 16:32:09'),
(103, 'Winter Melon Children', '095', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 16:32:28', '2021-01-24 16:32:28'),
(104, 'Corn Adult', '096', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 16:33:11', '2021-01-24 16:33:11'),
(105, 'Corn Children', '097', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 16:33:47', '2021-01-24 16:33:47'),
(106, 'Baby Corn Adult', '098', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 16:34:32', '2021-01-24 16:34:32'),
(107, 'Baby Corn Children', '099', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 16:48:42', '2021-01-24 16:48:42'),
(108, 'Seaweed Knots Adult', '0100', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:47:36', '2021-01-24 17:47:36'),
(109, 'Seaweed Knots Children', '0101', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:48:03', '2021-01-24 17:48:03'),
(110, 'Lotus Root Adult', '0102', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:48:31', '2021-01-24 17:48:31'),
(111, 'Lotus Root Children', '0103', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:48:51', '2021-01-24 17:48:51'),
(112, 'Broccoli Adult', '0104', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:49:15', '2021-01-24 17:49:15'),
(113, 'Broccoli Children', '0105', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:49:46', '2021-01-24 17:49:46'),
(114, 'Crown Daisy Adult', '0106', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:50:27', '2021-01-24 17:50:27'),
(115, 'Crown Daisy Children', '0107', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:50:47', '2021-01-24 17:50:47'),
(116, 'Pumpkin Adult', '0108', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:51:21', '2021-01-24 17:51:21'),
(117, 'Pumpkin Children', '0109', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:51:45', '2021-01-24 17:51:45'),
(118, 'Taro Adult', '0110', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:52:19', '2021-01-24 17:52:19'),
(119, 'Taro Children', '0111', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:52:42', '2021-01-24 17:52:42'),
(120, 'Potato Adult', '0112', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:53:12', '2021-01-24 17:53:12'),
(121, 'Potato Children', '0113', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:53:33', '2021-01-24 17:53:33'),
(122, 'Tomato Adult', '0114', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:54:12', '2021-01-24 17:54:12'),
(123, 'Tomato Children', '0115', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:54:39', '2021-01-24 17:54:39'),
(124, 'Bean Sprouts Adult', '0116', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:55:07', '2021-01-24 17:55:07'),
(125, 'Bean Sprouts Children', '0117', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:55:44', '2021-01-24 17:55:44'),
(126, 'White Radish Adult', '0118', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:56:14', '2021-01-24 17:56:14'),
(127, 'White Radish Children', '0119', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:56:42', '2021-01-24 17:56:42'),
(128, 'Sweet Potato Adult', '0120', 14, 30.00, 30.00, 30.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:57:44', '2021-01-24 17:57:44'),
(129, 'Sweet Potato Children', '0121', 14, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 17:58:11', '2021-01-24 17:58:11'),
(130, 'Fatty Brisket Adult', '0122', 11, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:00:13', '2021-01-24 18:00:13'),
(131, 'Fatty Brisket Children', '0123', 11, 15.00, 15.00, 15.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:00:34', '2021-01-24 18:00:34'),
(132, 'Eye Round Steak Adult', '0124', 11, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:01:40', '2021-01-24 18:01:40'),
(133, 'Eye Round Steak Children', '0125', 11, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:02:01', '2021-01-24 18:02:01'),
(134, 'Marinated Beef Adult', '0126', 11, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:02:35', '2021-01-24 18:02:35'),
(135, 'Marinated Beef Children', '0127', 11, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:02:58', '2021-01-24 18:02:58'),
(136, 'Spicy Beef Adult', '0128', 11, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:03:37', '2021-01-24 18:03:37'),
(137, 'Spicy Beef Children', '0129', 11, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:03:59', '2021-01-24 18:03:59'),
(138, 'Lamb Adult', '0130', 11, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:04:26', '2021-01-24 18:04:26'),
(139, 'Lamb Children', '0131', 11, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:04:49', '2021-01-24 18:04:49'),
(140, 'Pork Belly Adult', '0132', 11, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:05:25', '2021-01-24 18:05:25'),
(141, 'Pork Belly Children', '0133', 11, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:05:45', '2021-01-24 18:05:45'),
(142, 'Chicken Adult', '0134', 11, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:06:18', '2021-01-24 18:06:18'),
(143, 'Chicken Children', '0135', 11, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:20:35', '2021-01-24 18:20:35'),
(144, 'Marinated Beef Tripe Adult', '0136', 11, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:21:13', '2021-01-24 18:21:13'),
(145, 'Marinated Beef Tripe Children', '0137', 11, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:21:37', '2021-01-24 18:21:37'),
(146, 'Pork Liver Adult', '0138', 11, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:22:10', '2021-01-24 18:22:10'),
(147, 'Pork Liver Children', '0139', 11, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:22:30', '2021-01-24 18:22:30'),
(148, 'Pork Kidney Adult', '0140', 11, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:22:57', '2021-01-24 18:22:57'),
(149, 'Pork Kidney Children', '0141', 11, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:23:23', '2021-01-24 18:23:23'),
(150, 'Pork Intestines Adult', '0142', 11, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:24:02', '2021-01-24 18:24:02'),
(151, 'Pork Intestines Children', '0143', 11, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:24:23', '2021-01-24 18:24:23'),
(152, 'Chicken Gizzard Adult', '0144', 11, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:30:17', '2021-01-24 18:30:17'),
(153, 'Chicken Gizzard Children', '0145', 11, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:30:46', '2021-01-24 18:30:46'),
(154, 'Beef Meatball Adult', '0146', 11, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:31:18', '2021-01-24 18:31:18'),
(155, 'Beef Meatball Children', '0147', 11, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:31:41', '2021-01-24 18:31:41'),
(156, 'Pork Meatball Adult', '0148', 11, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:32:37', '2021-01-24 18:32:37'),
(157, 'Pork Meatball Children', '0149', 11, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:33:37', '2021-01-24 18:33:37'),
(158, 'FuZhou Meatbal Adult', '0150', 11, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:34:09', '2021-01-24 18:34:09'),
(159, 'FuZhou Meatbal Children', '0151', 11, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:34:43', '2021-01-24 18:34:43'),
(160, 'Beef Tripe Adult', '0152', 11, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:35:56', '2021-01-24 18:35:56'),
(161, 'Beef Tripe Children', '0153', 11, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:36:39', '2021-01-24 18:36:39'),
(162, 'Sichuan Spicy Adult', '0154', 10, 30.00, 30.00, 30.00, 'Choice of spice level', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:42:40', '2021-01-24 18:44:12'),
(163, 'Sichuan Spicy Children', '0155', 10, 15.00, 15.00, 15.00, 'Choice of spice level', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:43:51', '2021-01-24 18:43:51'),
(164, 'Pork Bone Adult', '0156', 10, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:44:47', '2021-01-24 18:44:47'),
(165, 'Pork Bone Children', '0157', 10, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:45:19', '2021-01-24 18:45:19'),
(166, 'Kimchi Adult', '0158', 10, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:45:47', '2021-01-24 18:45:47'),
(167, 'Kimchi Children', '0159', 10, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:46:27', '2021-01-24 18:46:27'),
(168, 'Herbal Adult', '0160', 10, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:46:52', '2021-01-24 18:46:52'),
(169, 'Herbal Children', '0161', 10, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:47:12', '2021-01-24 18:47:12'),
(170, 'Pickled Cabbage Adult', '0162', 10, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:47:35', '2021-01-24 18:47:35'),
(171, 'Pickled Cabbage Children', '0163', 10, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:48:01', '2021-01-24 18:48:01'),
(172, 'Tomato Adult', '0164', 10, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:48:28', '2021-01-24 18:48:28'),
(173, 'Tomato Children', '0165', 10, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:49:00', '2021-01-24 18:49:00'),
(174, 'Mushroom Adult', '0166', 10, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:49:22', '2021-01-24 18:49:22'),
(175, 'Mushroom Children', '0167', 10, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:49:42', '2021-01-24 18:49:42'),
(176, 'Chicken Adult', '0168', 10, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:50:21', '2021-01-24 18:50:21'),
(177, 'Chicken Children', '0169', 10, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:50:43', '2021-01-24 18:50:43'),
(178, 'Vegetable Adult', '0170', 10, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:51:15', '2021-01-24 18:51:15'),
(179, 'Vegetable Children', '0171', 10, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:51:34', '2021-01-24 18:51:34'),
(180, 'Beef Adult', '0172', 10, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:52:07', '2021-01-24 18:52:33'),
(181, 'Beef Children', '0173', 10, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:52:50', '2021-01-24 18:52:50'),
(182, 'Spicy Beef Tallow Adult', '0174', 10, 30.00, 30.00, 30.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:53:28', '2021-01-24 18:53:28'),
(183, 'Spicy Beef Tallow Children', '0175', 10, 15.00, 15.00, 15.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-01-24 18:53:53', '2021-01-24 18:53:53'),
(184, 'Beef', '0176', 11, 50.00, 75.00, 55.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-03-15 17:13:26', '2021-03-15 17:13:26'),
(185, 'Chiken BBQ Wine', '0177', 17, 20.00, 30.00, 35.00, 'Descriptionmnmnmnmnmn', '1618057435_1970615.jpg', 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-04-10 12:23:55', '2021-04-10 12:23:55'),
(186, 'KCQ91Wfv8h', '0178', 17, 40.00, 40.00, 40.00, 'Descriptijfgjfgjfgjfjon', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-04-10 13:44:45', '2021-04-10 13:44:45'),
(187, 'KCQ91Wfv8h', '0179', 17, 40.00, 40.00, 40.00, 'Descriptionfghdfh', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-04-10 13:45:28', '2021-04-10 13:45:28'),
(188, 'Hf2aiItsrY', '0180', 18, 40.00, 40.00, 40.00, 'Descriptionfghdfh', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-04-10 13:46:01', '2021-04-10 13:46:01'),
(189, 'Hf2aiItsrY', '0181', 17, 40.00, 40.00, 40.00, 'Descriptionfghdfh', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-04-10 13:47:04', '2021-04-10 13:47:04'),
(190, 'KCQ91Wfv8h', '0182', 18, 40.00, 40.00, 40.00, 'Descriptionfghdfh', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-04-10 13:52:34', '2021-04-10 13:52:34'),
(191, 'Towhid Hasan', '0183', 18, 40.00, 40.00, 40.00, 'Descriptionghg', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-04-12 05:26:25', '2021-04-12 05:26:25'),
(192, 'Towhid Hasan', '0184', 18, 40.00, 40.00, 40.00, 'Descriptionghg', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-04-12 05:27:27', '2021-04-12 05:27:27'),
(193, 'Towhid Hasan', '0185', 18, 40.00, 40.00, 40.00, 'Descriptionghg', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-04-12 05:31:46', '2021-04-12 05:31:46'),
(195, 'Towhid Hasan', '0186', 18, 40.00, 40.00, 40.00, 'Description', NULL, 'Yes', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-04-12 05:36:03', '2021-04-12 05:36:03'),
(196, 'Towhid Hasan', '0187', 18, 40.00, 40.00, 40.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Deleted', '2021-04-12 05:41:05', '2021-04-12 05:49:11'),
(197, 'new', '0188', 18, 40.00, 40.00, 40.00, 'Description', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-04-12 05:50:50', '2021-04-12 05:50:50'),
(198, 'Towhid Hasan', '0189', 17, 40.00, 40.00, 40.00, 'Descriptionghg', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-04-12 05:54:47', '2021-04-12 05:54:47'),
(199, 'Sudipto', '0190', 18, 40.00, 40.00, 40.00, 'Descriptionghg', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-04-12 05:57:13', '2021-04-12 05:57:13'),
(200, 'Talha', '0191', 18, 40.00, 40.00, 40.00, 'Descriptionghg', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-04-12 05:58:37', '2021-04-12 05:58:37'),
(201, 'Towhid Hasan', '0192', 18, 40.00, 40.00, 40.00, 'Descriptionghg', NULL, 'No', NULL, 4, '[{\"tax_field_id\":50,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7.5}]', 8, '10', 'Live', '2021-04-12 07:06:00', '2021-04-12 07:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_food_menu_categories`
--

DROP TABLE IF EXISTS `tbl_restaurant_food_menu_categories`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_food_menu_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delay_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_food_menu_categories_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_food_menu_categories`
--

INSERT INTO `tbl_restaurant_food_menu_categories` (`id`, `name`, `delay_time`, `description`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Noodles', '20', 'Bla bla bla', 3, '2', 'Live', '2020-08-21 13:31:25', '2020-08-21 13:34:12'),
(2, 'Lamar Sweet', '100', 'Sit omnis ea unde of', 3, '2', 'Deleted', '2020-08-21 13:34:20', '2020-08-21 13:35:02'),
(3, 'pizza', '40', 'Pizza It was popularised in the 1960s with the release ofpsum passages', 3, '2', 'Live', '2020-09-29 09:01:15', '2020-09-29 09:01:15'),
(4, 'food menu _larson', '10', 'description', 3, '2', 'Live', '2020-09-29 09:49:55', '2020-09-29 09:49:55'),
(5, 'food menu 2 _larson', '20', 'descriptionygi', 3, '2', 'Live', '2020-09-29 09:50:46', '2020-10-06 12:49:31'),
(6, 'cat 1', '20', 'description', 3, '2', 'Live', '2020-10-08 11:49:35', '2020-10-08 11:49:35'),
(7, 'cat 2', '20', 'description', 3, '2', 'Live', '2020-10-08 11:49:51', '2020-10-08 11:49:51'),
(8, 'cat 3', '4', 'description', 3, '2', 'Live', '2020-10-08 11:50:01', '2020-10-08 11:50:01'),
(9, 'cat 4', '3', 'description', 3, '2', 'Live', '2020-10-08 11:50:13', '2020-10-08 11:50:13'),
(10, 'BROTH BASE', '10', '', 8, '10', 'Live', '2021-01-19 19:07:17', '2021-01-19 19:07:17'),
(11, 'MEATS', '10', '', 8, '10', 'Live', '2021-01-19 19:07:34', '2021-01-19 19:07:34'),
(12, 'SEAFOOD', '10', '', 8, '10', 'Live', '2021-01-19 19:07:49', '2021-01-19 19:07:49'),
(13, 'NOODLES/RICE', '10', '', 8, '10', 'Live', '2021-01-19 19:08:03', '2021-01-19 19:08:03'),
(14, 'VEGETABLES', '10', '', 8, '10', 'Live', '2021-01-19 19:08:22', '2021-01-19 19:08:22'),
(15, 'TOFU/MUSHROOMS', '10', '', 8, '10', 'Live', '2021-01-19 19:08:38', '2021-01-19 19:08:38'),
(16, 'OTHER', '10', '', 8, '10', 'Live', '2021-01-19 19:08:49', '2021-01-19 19:08:49'),
(17, 'Test', '30', 'for test', 8, '10', 'Live', '2021-02-27 10:02:07', '2021-02-27 10:02:07'),
(18, 'New Test', '2.00', 'asd', 8, '10', 'Live', '2021-02-28 11:15:52', '2021-02-28 11:15:52'),
(19, 'Dipto', '10', 'asdf', 8, '13', 'Deleted', '2021-03-15 05:59:14', '2021-03-15 06:05:35'),
(20, 'Dipto', '10', 'asdf', 8, '13', 'Deleted', '2021-03-15 06:04:30', '2021-03-15 06:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_food_menu_ingredients`
--

DROP TABLE IF EXISTS `tbl_restaurant_food_menu_ingredients`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_food_menu_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ing_id` bigint(20) UNSIGNED NOT NULL,
  `consumption` double(10,2) NOT NULL,
  `food_menu_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ing_id` (`ing_id`),
  KEY `food_menu_id` (`food_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_food_menu_ingredients`
--

INSERT INTO `tbl_restaurant_food_menu_ingredients` (`id`, `ing_id`, `consumption`, `food_menu_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 2, 123.00, 2, 'Deleted', '2020-09-05 05:27:39', '2020-09-29 09:22:08'),
(2, 1, 1230.00, 2, 'Deleted', '2020-09-05 05:27:39', '2020-09-29 09:22:08'),
(3, 2, 123.00, 2, 'Deleted', '2020-09-05 07:09:28', '2020-09-29 09:22:08'),
(4, 1, 1230.00, 2, 'Deleted', '2020-09-05 07:09:28', '2020-09-29 09:22:08'),
(5, 2, 123.00, 2, 'Deleted', '2020-09-05 07:11:13', '2020-09-29 09:22:08'),
(6, 2, 123.00, 2, 'Deleted', '2020-09-05 07:11:30', '2020-09-29 09:22:08'),
(7, 2, 123.00, 2, 'Deleted', '2020-09-05 07:12:28', '2020-09-29 09:22:08'),
(8, 2, 123.00, 2, 'Deleted', '2020-09-05 07:12:37', '2020-09-29 09:22:08'),
(9, 2, 123.00, 2, 'Deleted', '2020-09-05 07:12:53', '2020-09-29 09:22:08'),
(10, 1, 1.00, 3, 'Deleted', '2020-09-29 09:04:42', '2021-01-22 18:56:51'),
(11, 1, 11.00, 3, 'Deleted', '2020-09-29 09:05:04', '2021-01-22 18:56:51'),
(12, 2, 123.00, 2, 'Deleted', '2020-09-29 09:21:25', '2020-09-29 09:22:08'),
(13, 1, 11.00, 3, 'Deleted', '2020-09-29 09:21:47', '2021-01-22 18:56:51'),
(14, 1, 1.00, 4, 'Deleted', '2020-09-29 09:23:10', '2021-01-22 18:56:39'),
(15, 1, 1.00, 4, 'Deleted', '2020-09-29 09:23:36', '2021-01-22 18:56:39'),
(16, 1, 1.00, 4, 'Deleted', '2020-09-29 10:01:11', '2021-01-22 18:56:39'),
(17, 1, 1.00, 4, 'Deleted', '2020-09-29 10:08:29', '2021-01-22 18:56:39'),
(18, 1, 1.00, 4, 'Deleted', '2020-09-29 10:09:26', '2021-01-22 18:56:39'),
(19, 1, 11.00, 5, 'Deleted', '2020-10-02 15:23:05', '2021-01-22 18:52:57'),
(20, 1, 11.00, 3, 'Deleted', '2020-10-08 21:49:53', '2021-01-22 18:56:51'),
(21, 1, 11.00, 5, 'Deleted', '2020-10-11 21:05:45', '2021-01-22 18:52:57'),
(22, 1, 11.00, 3, 'Deleted', '2020-10-12 11:25:08', '2021-01-22 18:56:51'),
(23, 1, 11.00, 3, 'Deleted', '2020-10-14 09:40:47', '2021-01-22 18:56:51'),
(24, 1, 11.00, 5, 'Deleted', '2020-10-14 09:41:13', '2021-01-22 18:52:57'),
(25, 1, 11.00, 3, 'Deleted', '2020-10-14 09:41:30', '2021-01-22 18:56:51'),
(26, 1, 11.00, 5, 'Deleted', '2020-10-15 18:12:17', '2021-01-22 18:52:57'),
(27, 3, 1.00, 6, 'Deleted', '2020-10-17 06:22:40', '2021-01-22 18:52:25'),
(28, 1, 1.00, 6, 'Deleted', '2020-10-17 06:22:40', '2021-01-22 18:52:25'),
(31, 3, 1.00, 8, 'Deleted', '2020-10-17 09:41:37', '2021-01-22 18:43:29'),
(32, 1, 2.00, 8, 'Deleted', '2020-10-17 09:41:37', '2021-01-22 18:43:29'),
(33, 3, 1.00, 8, 'Deleted', '2020-10-17 10:09:40', '2021-01-22 18:43:29'),
(34, 1, 2.00, 8, 'Deleted', '2020-10-17 10:09:40', '2021-01-22 18:43:29'),
(35, 3, 1.00, 8, 'Deleted', '2020-10-17 10:10:34', '2021-01-22 18:43:29'),
(36, 1, 2.00, 8, 'Deleted', '2020-10-17 10:10:34', '2021-01-22 18:43:29'),
(37, 3, 1.00, 8, 'Deleted', '2020-10-17 10:11:53', '2021-01-22 18:43:29'),
(38, 1, 2.00, 8, 'Deleted', '2020-10-17 10:11:53', '2021-01-22 18:43:29'),
(39, 3, 1.00, 8, 'Deleted', '2020-10-17 10:12:22', '2021-01-22 18:43:29'),
(40, 1, 2.00, 8, 'Deleted', '2020-10-17 10:12:22', '2021-01-22 18:43:29'),
(41, 3, 1.00, 8, 'Deleted', '2020-10-17 10:12:48', '2021-01-22 18:43:29'),
(42, 1, 2.00, 8, 'Deleted', '2020-10-17 10:12:48', '2021-01-22 18:43:29'),
(43, 2, 5.00, 9, 'Deleted', '2020-10-17 14:30:03', '2021-01-22 18:56:28'),
(44, 2, 5.00, 9, 'Deleted', '2020-10-17 14:31:35', '2021-01-22 18:56:28'),
(45, 2, 5.00, 9, 'Deleted', '2020-10-17 14:53:05', '2021-01-22 18:56:28'),
(46, 2, 5.00, 9, 'Deleted', '2020-10-19 13:44:38', '2021-01-22 18:56:28'),
(47, 3, 1.00, 6, 'Deleted', '2020-10-21 11:10:12', '2021-01-22 18:52:25'),
(48, 1, 1.00, 6, 'Deleted', '2020-10-21 11:10:12', '2021-01-22 18:52:25'),
(49, 1, 11.00, 5, 'Deleted', '2020-10-21 11:10:28', '2021-01-22 18:52:57'),
(50, 1, 11.00, 3, 'Deleted', '2020-10-21 11:10:46', '2021-01-22 18:56:51'),
(51, 1, 1.00, 4, 'Deleted', '2020-10-21 11:10:58', '2021-01-22 18:56:39'),
(52, 1, 11.00, 5, 'Deleted', '2020-10-21 11:16:26', '2021-01-22 18:52:57'),
(53, 1, 11.00, 3, 'Deleted', '2020-11-09 20:49:15', '2021-01-22 18:56:51'),
(54, 1, 1.00, 4, 'Deleted', '2020-11-09 20:49:29', '2021-01-22 18:56:39'),
(55, 1, 1.00, 4, 'Deleted', '2020-11-17 19:33:47', '2021-01-22 18:56:39'),
(56, 1, 1.00, 4, 'Deleted', '2021-01-22 18:34:04', '2021-01-22 18:56:39'),
(57, 1, 11.00, 3, 'Deleted', '2021-01-22 18:34:26', '2021-01-22 18:56:51'),
(58, 1, 11.00, 5, 'Deleted', '2021-01-22 18:35:11', '2021-01-22 18:52:57'),
(59, 3, 1.00, 6, 'Deleted', '2021-01-22 18:38:48', '2021-01-22 18:52:25'),
(60, 1, 1.00, 6, 'Deleted', '2021-01-22 18:38:48', '2021-01-22 18:52:25'),
(61, 3, 1.00, 8, 'Deleted', '2021-01-22 18:39:20', '2021-01-22 18:43:29'),
(62, 1, 2.00, 8, 'Deleted', '2021-01-22 18:39:20', '2021-01-22 18:43:29'),
(63, 3, 1.00, 8, 'Deleted', '2021-01-22 18:41:32', '2021-01-22 18:43:29'),
(64, 1, 2.00, 8, 'Deleted', '2021-01-22 18:41:32', '2021-01-22 18:43:29'),
(65, 3, 1.00, 8, 'Deleted', '2021-01-22 18:42:20', '2021-01-22 18:43:29'),
(66, 1, 2.00, 8, 'Deleted', '2021-01-22 18:42:20', '2021-01-22 18:43:29'),
(67, 3, 1.00, 8, 'Live', '2021-01-22 18:43:29', '2021-01-22 18:43:29'),
(68, 1, 2.00, 8, 'Live', '2021-01-22 18:43:29', '2021-01-22 18:43:29'),
(69, 3, 1.00, 6, 'Live', '2021-01-22 18:52:25', '2021-01-22 18:52:25'),
(70, 1, 1.00, 6, 'Live', '2021-01-22 18:52:25', '2021-01-22 18:52:25'),
(71, 1, 11.00, 5, 'Live', '2021-01-22 18:52:57', '2021-01-22 18:52:57'),
(72, 2, 5.00, 9, 'Live', '2021-01-22 18:56:28', '2021-01-22 18:56:28'),
(73, 1, 1.00, 4, 'Live', '2021-01-22 18:56:39', '2021-01-22 18:56:39'),
(74, 1, 11.00, 3, 'Live', '2021-01-22 18:56:51', '2021-01-22 18:56:51'),
(75, 10, 56.00, 184, 'Live', '2021-03-15 17:13:26', '2021-03-15 17:13:26'),
(76, 10, 34.00, 185, 'Live', '2021-04-10 12:23:55', '2021-04-10 12:23:55'),
(77, 10, 20.00, 186, 'Live', '2021-04-10 13:44:45', '2021-04-10 13:44:45'),
(78, 10, 50.00, 187, 'Live', '2021-04-10 13:45:28', '2021-04-10 13:45:28'),
(79, 10, 45.00, 190, 'Live', '2021-04-10 13:52:34', '2021-04-10 13:52:34'),
(80, 9, 20.00, 191, 'Live', '2021-04-12 05:26:25', '2021-04-12 05:26:25'),
(81, 10, 20.00, 192, 'Live', '2021-04-12 05:27:27', '2021-04-12 05:27:27'),
(82, 10, 20.00, 193, 'Live', '2021-04-12 05:31:46', '2021-04-12 05:31:46'),
(83, 10, 20.00, 195, 'Live', '2021-04-12 05:36:03', '2021-04-12 05:36:03'),
(84, 10, 20.00, 196, 'Deleted', '2021-04-12 05:41:05', '2021-04-12 05:49:11'),
(85, 10, 20.00, 197, 'Live', '2021-04-12 05:50:50', '2021-04-12 05:50:50'),
(86, 10, 20.00, 198, 'Live', '2021-04-12 05:54:47', '2021-04-12 05:54:47'),
(87, 10, 20.00, 199, 'Live', '2021-04-12 05:57:13', '2021-04-12 05:57:13'),
(88, 10, 20.00, 200, 'Live', '2021-04-12 05:58:37', '2021-04-12 05:58:37'),
(89, 10, 30.00, 201, 'Live', '2021-04-12 07:06:00', '2021-04-12 07:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_food_menu_modifiers`
--

DROP TABLE IF EXISTS `tbl_restaurant_food_menu_modifiers`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_food_menu_modifiers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_food_menu_modifiers_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_food_menu_modifiers`
--

INSERT INTO `tbl_restaurant_food_menu_modifiers` (`id`, `name`, `price`, `description`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(8, 'Test', 100.00, '', 3, '2', 'Deleted', '2020-08-31 12:05:51', '2020-09-05 07:20:38'),
(9, 'Cora Barker', 560.00, 'Dolorem iste itaque', 3, '2', 'Deleted', '2020-08-31 12:10:11', '2020-10-05 10:03:34'),
(10, 'Cheyenne Jordan', 526.00, 'Ut laboris ullam lab', 3, '2', 'Deleted', '2020-09-05 10:38:58', '2020-10-06 13:02:17'),
(11, 'shuvo', 52.00, '', 3, '2', 'Deleted', '2020-10-06 13:01:53', '2020-10-07 08:34:52'),
(12, 'shuvo', 52.00, '', 3, '2', 'Deleted', '2020-10-07 08:04:09', '2020-10-07 08:06:06'),
(13, 'modifier', 100.00, 'modifier description', 3, '2', 'Live', '2020-10-07 08:35:45', '2020-10-07 08:35:45'),
(14, 'Food Menu modifier  1', 52.00, 'note', 3, '2', 'Live', '2020-10-12 11:23:55', '2020-10-12 11:23:55'),
(15, 'Food Menu modifier  2', 60.00, 'note', 3, '2', 'Live', '2020-10-12 11:24:26', '2020-10-12 11:24:26'),
(16, 'Mild Spicy', 0.00, '', 3, '2', 'Live', '2021-01-03 16:16:56', '2021-01-03 16:16:56'),
(17, 'Midden spicy', 0.00, '', 3, '2', 'Live', '2021-01-03 16:17:22', '2021-01-03 16:17:22'),
(18, 'Very spicy', 0.00, '', 3, '2', 'Live', '2021-01-03 16:17:40', '2021-01-03 16:17:40'),
(19, 'No salt', 0.00, '', 3, '2', 'Live', '2021-01-03 16:17:54', '2021-01-03 16:17:54'),
(20, 'Less sugar', 0.00, '', 3, '2', 'Live', '2021-01-03 16:20:43', '2021-01-03 16:20:43'),
(21, 'No MSG', 0.00, '', 3, '2', 'Live', '2021-01-03 16:20:58', '2021-01-03 16:20:58'),
(22, 'No peanut', 0.00, '', 3, '2', 'Live', '2021-01-03 16:21:19', '2021-01-03 16:21:19'),
(23, 'Personal', 5.00, '', 8, '10', 'Live', '2021-01-24 18:55:40', '2021-01-24 18:55:40'),
(24, 'Duo/Trio', 10.00, '', 8, '10', 'Live', '2021-01-24 18:56:06', '2021-01-24 18:56:06'),
(25, 'Pork Meatball', 6.00, '', 8, '10', 'Live', '2021-01-24 18:58:12', '2021-01-24 18:58:12'),
(26, 'Fish Paste', 6.00, '', 8, '10', 'Live', '2021-01-24 18:58:31', '2021-01-24 18:58:31'),
(27, 'Shrimp Paste', 6.00, '', 8, '10', 'Live', '2021-01-24 18:58:50', '2021-01-24 18:58:50'),
(28, 'Duck Blood', 6.00, '', 8, '10', 'Live', '2021-01-24 18:59:06', '2021-01-24 18:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_food_menu_modifier_ingredients`
--

DROP TABLE IF EXISTS `tbl_restaurant_food_menu_modifier_ingredients`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_food_menu_modifier_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ig_id` bigint(20) UNSIGNED NOT NULL,
  `consumption` double(10,2) NOT NULL,
  `mod_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ig_id` (`ig_id`),
  KEY `mod_id` (`mod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_food_menu_modifier_ingredients`
--

INSERT INTO `tbl_restaurant_food_menu_modifier_ingredients` (`id`, `ig_id`, `consumption`, `mod_id`, `del_status`, `created_at`, `updated_at`) VALUES
(4, 1, 123.00, 8, 'Deleted', '2020-08-31 12:05:51', '2020-09-05 07:20:38'),
(5, 1, 123.00, 9, 'Deleted', '2020-08-31 12:10:11', '2020-10-05 10:03:34'),
(6, 2, 2458.00, 9, 'Deleted', '2020-08-31 12:13:03', '2020-10-05 10:03:34'),
(7, 1, 1230.00, 9, 'Deleted', '2020-08-31 12:16:50', '2020-10-05 10:03:34'),
(8, 1, 1230.00, 10, 'Deleted', '2020-09-05 10:38:58', '2020-10-06 13:02:17'),
(9, 3, 5.00, 11, 'Deleted', '2020-10-06 13:01:53', '2020-10-07 08:34:52'),
(10, 3, 4.00, 12, 'Deleted', '2020-10-07 08:04:09', '2020-10-07 08:06:06'),
(11, 3, 1.00, 13, 'Deleted', '2020-10-07 08:35:45', '2020-10-07 13:40:44'),
(12, 3, 1.00, 13, 'Deleted', '2020-10-07 09:09:26', '2020-10-07 13:40:44'),
(13, 1, 2.00, 13, 'Deleted', '2020-10-07 09:09:26', '2020-10-07 13:40:44'),
(14, 3, 1.00, 13, 'Deleted', '2020-10-07 13:39:11', '2020-10-07 13:40:44'),
(15, 1, 2.00, 13, 'Deleted', '2020-10-07 13:39:11', '2020-10-07 13:40:44'),
(16, 2, 2.00, 13, 'Deleted', '2020-10-07 13:39:11', '2020-10-07 13:40:44'),
(17, 3, 1.00, 13, 'Live', '2020-10-07 13:40:44', '2020-10-07 13:40:44'),
(18, 1, 2.00, 13, 'Live', '2020-10-07 13:40:44', '2020-10-07 13:40:44'),
(19, 1, 1.00, 14, 'Live', '2020-10-12 11:23:55', '2020-10-12 11:23:55'),
(20, 2, 2.00, 15, 'Live', '2020-10-12 11:24:26', '2020-10-12 11:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_food_menu_shifts`
--

DROP TABLE IF EXISTS `tbl_restaurant_food_menu_shifts`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_food_menu_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_time` time NOT NULL,
  `ending_time` time NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_food_menu_shifts_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_food_menu_shifts`
--

INSERT INTO `tbl_restaurant_food_menu_shifts` (`id`, `name`, `starting_time`, `ending_time`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(9, 'Breakfast', '00:00:00', '11:59:00', 3, '2', 'Live', '2020-08-22 00:44:24', '2020-08-22 00:44:24'),
(10, 'Lunch', '12:00:00', '19:40:00', 3, '2', 'Live', '2020-08-22 00:44:54', '2020-08-22 00:44:54'),
(11, 'Wallace Becker', '11:29:00', '11:50:00', 3, '2', 'Deleted', '2020-08-22 01:19:15', '2020-08-22 01:19:21'),
(12, 'Mahmud Al Adan', '02:00:00', '16:44:00', 3, '2', 'Deleted', '2020-09-27 12:15:09', '2020-09-27 12:15:51'),
(13, 'Dinner', '14:40:00', '22:30:00', 3, '2', 'Deleted', '2020-10-06 12:41:04', '2020-10-06 12:45:50'),
(14, 'Dinner', '15:00:00', '22:59:00', 3, '2', 'Deleted', '2020-10-06 12:47:50', '2020-10-07 06:16:43'),
(15, 'Dinner', '14:17:00', '21:17:00', 3, '2', 'Deleted', '2020-10-07 06:17:23', '2020-10-07 07:25:44'),
(16, 'shuvo', '15:26:00', '22:26:00', 3, '2', 'Deleted', '2020-10-07 07:29:10', '2020-10-07 07:31:30'),
(17, 'dinner', '19:40:25', '23:59:48', 3, '2', 'Live', '2020-10-09 07:42:32', '2020-10-09 07:42:32'),
(18, 'Lunch', '19:10:00', '15:00:00', 8, '10', 'Live', '2021-01-23 20:23:45', '2021-01-23 20:23:45'),
(19, 'Dinner', '15:00:00', '23:59:00', 8, '10', 'Live', '2021-01-23 20:24:45', '2021-01-23 20:24:45'),
(20, 'Happy Hour', '17:11:00', '05:14:00', 8, '13', 'Deleted', '2021-02-27 08:12:52', '2021-03-15 06:11:38'),
(21, 'Dipto', '18:31:00', '19:30:00', 8, '13', 'Deleted', '2021-03-14 11:30:57', '2021-03-14 11:31:05'),
(22, 'Dipto', '19:32:00', '17:37:00', 8, '13', 'Deleted', '2021-03-14 11:32:16', '2021-03-14 11:53:56'),
(23, 'Afternoon', '17:59:00', '19:59:00', 8, '10', 'Deleted', '2021-03-15 17:04:41', '2021-03-15 17:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_gift_cards`
--

DROP TABLE IF EXISTS `tbl_restaurant_gift_cards`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_gift_cards` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `card_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double(10,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_restaurant_gift_cards_card_no_unique` (`card_no`),
  KEY `tbl_restaurant_gift_cards_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_gift_cards`
--

INSERT INTO `tbl_restaurant_gift_cards` (`id`, `card_no`, `value`, `expiry_date`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, '5970-3532-3662', 1000.00, '2021-02-26', 3, '2', 'Live', '2020-12-26 17:25:09', '2020-12-26 17:40:06'),
(2, '7866-3326-4691', 1000.00, '2021-03-01', 3, '2', 'Live', '2020-12-27 18:57:33', '2020-12-27 18:57:33'),
(3, '9898-1836-3924', 1000.00, '2021-02-28', 3, '2', 'Live', '2020-12-29 02:30:55', '2020-12-29 02:30:55'),
(4, '1604-7056-4391', 5000.00, '2021-01-29', 3, '2', 'Live', '2020-12-29 04:59:34', '2020-12-29 04:59:34'),
(5, '7240-6294-9161', 1000.00, '2021-01-29', 3, '2', 'Live', '2020-12-29 05:14:01', '2020-12-29 05:14:01'),
(6, '7536-7071-5717', 100.00, '2021-03-16', 8, '13', 'Deleted', '2021-03-14 13:40:36', '2021-03-14 13:47:45'),
(7, '3999-8336-2464', 100.00, '2021-03-25', 8, '13', 'Live', '2021-03-14 13:48:06', '2021-03-14 13:48:06'),
(8, '6336-5989-4517', 1000.00, '2021-03-20', 8, '13', 'Live', '2021-03-14 13:48:19', '2021-03-14 13:48:19'),
(9, '8967-3652-2343', 500.00, '2021-03-22', 8, '10', 'Live', '2021-03-15 17:25:18', '2021-03-15 17:25:18'),
(10, '7101-0645-9092', 50.00, '2021-03-26', 8, '10', 'Live', '2021-03-15 17:28:59', '2021-03-15 17:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_gift_card_sells`
--

DROP TABLE IF EXISTS `tbl_restaurant_gift_card_sells`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_gift_card_sells` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gift_card_price` double(10,2) NOT NULL,
  `gift_card_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_gift_card_sells_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_gift_card_sells`
--

INSERT INTO `tbl_restaurant_gift_card_sells` (`id`, `gift_card_price`, `gift_card_id`, `customer_id`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 990.00, '1', '30', 3, '2', 'Live', '2020-12-27 18:29:00', '2020-12-27 18:29:00'),
(2, 900.00, '2', '26', 3, '2', 'Live', '2020-12-27 18:59:33', '2020-12-27 18:59:33'),
(3, 980.00, '3', '29', 3, '2', 'Live', '2020-12-29 02:31:47', '2020-12-29 02:31:47'),
(4, 900.00, '4', '30', 3, '2', 'Live', '2020-12-29 05:00:01', '2020-12-29 05:00:01'),
(5, 50.00, '6', '37', 8, '13', 'Live', '2021-03-14 13:47:11', '2021-03-14 13:47:11'),
(6, 90.00, '8', '45', 8, '13', 'Live', '2021-03-14 13:48:34', '2021-03-14 13:48:34'),
(7, 50.00, '7', '45', 8, '10', 'Live', '2021-03-15 17:30:28', '2021-03-15 17:30:28'),
(8, 222.00, '10', '37', 8, '10', 'Live', '2021-03-15 17:34:37', '2021-03-15 17:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_ingredients`
--

DROP TABLE IF EXISTS `tbl_restaurant_ingredients`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `purchase_price` double(10,2) NOT NULL,
  `alert_quantity` double(10,2) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_stock` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_ingredients_category_id_foreign` (`category_id`),
  KEY `tbl_restaurant_ingredients_unit_id_foreign` (`unit_id`),
  KEY `tbl_restaurant_ingredients_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_ingredients`
--

INSERT INTO `tbl_restaurant_ingredients` (`id`, `name`, `category_id`, `unit_id`, `purchase_price`, `alert_quantity`, `code`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`, `current_stock`) VALUES
(1, 'Apple', 5, 9, 99.00, 10.00, '123', 3, '2', 'Live', '2020-10-06 12:02:46', '2020-11-30 12:26:47', 11.00),
(2, 'Banana', 5, 9, 60.00, 4.00, '321', 3, '2', 'Live', '2020-10-06 12:02:46', '2020-11-30 16:07:19', 67.00),
(3, 'mustard oil', 2, 2, 150.00, 5.00, '122', 3, '2', 'Live', '2020-10-06 12:06:22', '2020-11-30 12:26:47', 6.00),
(6, 'Apple', NULL, 12, 10.00, 5.00, '111', 8, '10', 'Live', '2021-01-19 18:49:54', '2021-01-19 18:49:54', 0.00),
(7, 'Banana', NULL, 12, 10.00, 5.00, '222', 8, '10', 'Live', '2021-01-19 18:50:25', '2021-01-19 18:50:25', 0.00),
(8, 'Olive oil', NULL, 14, 50.00, 5.00, '333', 8, '10', 'Live', '2021-01-19 18:51:07', '2021-01-19 18:51:07', 0.00),
(9, 'mustard oil', NULL, 14, 50.00, 5.00, '444', 8, '10', 'Live', '2021-01-19 18:51:41', '2021-01-19 18:51:41', 0.00),
(10, 'Meet', 10, 13, 5.50, 5.00, '5265', 8, '10', 'Live', '2021-03-15 16:39:37', '2021-03-15 16:39:37', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_ingredient_categories`
--

DROP TABLE IF EXISTS `tbl_restaurant_ingredient_categories`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_ingredient_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_ingredient_categories_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_ingredient_categories`
--

INSERT INTO `tbl_restaurant_ingredient_categories` (`id`, `name`, `description`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(2, 'Oil', 'Bla bla bla', 3, '2', 'Live', '2020-08-19 11:00:55', '2020-08-19 11:00:55'),
(5, 'Fruit', 'description', 3, '2', 'Live', '2020-08-20 02:31:35', '2020-10-06 10:44:00'),
(6, 'salt', 'description', 3, '2', 'Live', '2020-10-06 10:43:52', '2020-10-06 10:43:52'),
(10, 'New Test', 'asd', 8, '21', 'Live', '2021-02-28 11:17:13', '2021-03-11 09:00:36'),
(11, 'all', 'asdf', 8, '10', 'Live', '2021-03-21 04:40:20', '2021-03-21 04:40:20'),
(12, 'Fin_test', 'Fin_test', 8, '10', 'Live', '2021-03-24 04:38:27', '2021-03-24 04:38:27'),
(13, 'Fin', 'Fin_test', 8, '10', 'Live', '2021-03-24 04:39:50', '2021-03-24 04:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_ingredient_units`
--

DROP TABLE IF EXISTS `tbl_restaurant_ingredient_units`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_ingredient_units` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_ingredient_units_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_ingredient_units`
--

INSERT INTO `tbl_restaurant_ingredient_units` (`id`, `name`, `description`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Kg', 'Bla bla bla', 3, '2', 'Deleted', '2020-08-19 11:07:43', '2020-08-19 11:08:38'),
(2, 'Kg', 'Bla bla bla', 3, '2', 'Live', '2020-08-19 11:08:48', '2020-08-19 11:08:48'),
(9, 'Pcs', 'bla bla', 3, '2', 'Live', '2020-08-20 02:31:35', '2020-09-27 12:19:44'),
(11, 'Inch', 'description', 3, '2', 'Live', '2020-10-06 10:47:40', '2020-10-06 10:47:40'),
(12, 'Pcs', '', 8, '10', 'Live', '2021-01-19 18:35:02', '2021-01-19 18:35:02'),
(13, 'Kg', '', 8, '10', 'Live', '2021-01-19 18:35:12', '2021-01-19 18:35:12'),
(14, 'litter', '', 8, '10', 'Live', '2021-01-19 18:35:22', '2021-01-19 18:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_kitchen_panels`
--

DROP TABLE IF EXISTS `tbl_restaurant_kitchen_panels`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_kitchen_panels` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_kitchen_panels_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_kitchen_panels`
--

INSERT INTO `tbl_restaurant_kitchen_panels` (`id`, `name`, `description`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Fatima Boyle', 'Incididunt dolore et', 3, '2', 'Deleted', '2020-08-22 01:48:57', '2020-08-22 01:50:02'),
(2, 'Thai', 'Nostrud deserunt nis', 3, '2', 'Live', '2020-08-22 01:50:08', '2020-11-09 18:18:27'),
(3, 'Chinese', 'description', 3, '2', 'Live', '2020-10-06 13:02:57', '2020-11-09 18:18:04'),
(4, 'Panel 1', '', 8, '10', 'Live', '2021-01-23 20:31:33', '2021-01-23 20:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_modifier_for_food_menus`
--

DROP TABLE IF EXISTS `tbl_restaurant_modifier_for_food_menus`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_modifier_for_food_menus` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mdf_id` bigint(20) UNSIGNED NOT NULL,
  `fd_menu_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mdf_id` (`mdf_id`),
  KEY `fd_menu_id` (`fd_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=694 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_modifier_for_food_menus`
--

INSERT INTO `tbl_restaurant_modifier_for_food_menus` (`id`, `mdf_id`, `fd_menu_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 9, 2, 'Deleted', '2020-09-05 08:00:29', '2020-09-29 09:20:18'),
(2, 9, 2, 'Deleted', '2020-09-05 10:30:39', '2020-09-29 09:20:18'),
(3, 9, 2, 'Deleted', '2020-09-05 10:34:09', '2020-09-29 09:20:18'),
(4, 9, 2, 'Deleted', '2020-09-05 10:37:59', '2020-09-29 09:20:18'),
(5, 10, 2, 'Deleted', '2020-09-05 10:39:21', '2020-09-29 09:20:18'),
(6, 10, 2, 'Deleted', '2020-09-05 10:39:28', '2020-09-29 09:20:18'),
(7, 9, 2, 'Deleted', '2020-09-05 10:39:28', '2020-09-29 09:20:18'),
(8, 9, 2, 'Deleted', '2020-09-05 10:39:37', '2020-09-29 09:20:18'),
(9, 10, 2, 'Live', '2020-09-29 09:20:18', '2020-09-29 09:20:18'),
(10, 9, 2, 'Live', '2020-09-29 09:20:18', '2020-09-29 09:20:18'),
(11, 9, 3, 'Deleted', '2020-09-29 10:19:49', '2020-10-12 11:25:20'),
(12, 9, 4, 'Deleted', '2020-09-29 10:27:51', '2021-01-03 16:18:48'),
(13, 10, 4, 'Deleted', '2020-09-29 10:28:02', '2021-01-03 16:18:48'),
(14, 11, 5, 'Deleted', '2020-10-06 13:04:00', '2020-10-11 21:04:07'),
(15, 13, 5, 'Live', '2020-10-11 21:04:07', '2020-10-11 21:04:07'),
(16, 15, 3, 'Live', '2020-10-12 11:25:20', '2020-10-12 11:25:20'),
(17, 14, 3, 'Live', '2020-10-12 11:25:20', '2020-10-12 11:25:20'),
(18, 13, 3, 'Live', '2020-10-12 11:25:20', '2020-10-12 11:25:20'),
(19, 15, 8, 'Live', '2020-10-20 13:51:19', '2020-10-20 13:51:19'),
(20, 15, 9, 'Live', '2020-10-25 06:18:43', '2020-10-25 06:18:43'),
(21, 14, 9, 'Live', '2020-10-25 06:18:43', '2020-10-25 06:18:43'),
(22, 13, 9, 'Live', '2020-10-25 06:18:43', '2020-10-25 06:18:43'),
(23, 19, 4, 'Live', '2021-01-03 16:18:48', '2021-01-03 16:18:48'),
(24, 18, 4, 'Live', '2021-01-03 16:18:48', '2021-01-03 16:18:48'),
(25, 17, 4, 'Live', '2021-01-03 16:18:48', '2021-01-03 16:18:48'),
(26, 16, 4, 'Live', '2021-01-03 16:18:48', '2021-01-03 16:18:48'),
(27, 15, 4, 'Live', '2021-01-03 16:18:48', '2021-01-03 16:18:48'),
(28, 14, 4, 'Live', '2021-01-03 16:18:48', '2021-01-03 16:18:48'),
(29, 13, 4, 'Live', '2021-01-03 16:18:48', '2021-01-03 16:18:48'),
(34, 28, 24, 'Live', '2021-01-24 19:10:56', '2021-01-24 19:10:56'),
(35, 27, 24, 'Live', '2021-01-24 19:10:56', '2021-01-24 19:10:56'),
(36, 26, 24, 'Live', '2021-01-24 19:10:56', '2021-01-24 19:10:56'),
(37, 25, 24, 'Live', '2021-01-24 19:10:56', '2021-01-24 19:10:56'),
(38, 28, 25, 'Live', '2021-01-24 19:11:15', '2021-01-24 19:11:15'),
(39, 27, 25, 'Live', '2021-01-24 19:11:15', '2021-01-24 19:11:15'),
(40, 26, 25, 'Live', '2021-01-24 19:11:15', '2021-01-24 19:11:15'),
(41, 25, 25, 'Live', '2021-01-24 19:11:15', '2021-01-24 19:11:15'),
(42, 28, 26, 'Live', '2021-01-24 19:11:33', '2021-01-24 19:11:33'),
(43, 27, 26, 'Live', '2021-01-24 19:11:33', '2021-01-24 19:11:33'),
(44, 26, 26, 'Live', '2021-01-24 19:11:33', '2021-01-24 19:11:33'),
(45, 25, 26, 'Live', '2021-01-24 19:11:33', '2021-01-24 19:11:33'),
(46, 28, 27, 'Live', '2021-01-24 19:11:50', '2021-01-24 19:11:50'),
(47, 27, 27, 'Live', '2021-01-24 19:11:50', '2021-01-24 19:11:50'),
(48, 26, 27, 'Live', '2021-01-24 19:11:50', '2021-01-24 19:11:50'),
(49, 25, 27, 'Live', '2021-01-24 19:11:50', '2021-01-24 19:11:50'),
(50, 28, 28, 'Live', '2021-01-24 19:13:01', '2021-01-24 19:13:01'),
(51, 27, 28, 'Live', '2021-01-24 19:13:01', '2021-01-24 19:13:01'),
(52, 26, 28, 'Live', '2021-01-24 19:13:01', '2021-01-24 19:13:01'),
(53, 25, 28, 'Live', '2021-01-24 19:13:01', '2021-01-24 19:13:01'),
(54, 28, 29, 'Live', '2021-01-24 19:13:11', '2021-01-24 19:13:11'),
(55, 27, 29, 'Live', '2021-01-24 19:13:11', '2021-01-24 19:13:11'),
(56, 26, 29, 'Live', '2021-01-24 19:13:11', '2021-01-24 19:13:11'),
(57, 25, 29, 'Live', '2021-01-24 19:13:11', '2021-01-24 19:13:11'),
(58, 28, 30, 'Live', '2021-01-24 19:13:22', '2021-01-24 19:13:22'),
(59, 27, 30, 'Live', '2021-01-24 19:13:22', '2021-01-24 19:13:22'),
(60, 26, 30, 'Live', '2021-01-24 19:13:22', '2021-01-24 19:13:22'),
(61, 25, 30, 'Live', '2021-01-24 19:13:22', '2021-01-24 19:13:22'),
(62, 28, 31, 'Live', '2021-01-24 19:13:30', '2021-01-24 19:13:30'),
(63, 27, 31, 'Live', '2021-01-24 19:13:30', '2021-01-24 19:13:30'),
(64, 26, 31, 'Live', '2021-01-24 19:13:30', '2021-01-24 19:13:30'),
(65, 25, 31, 'Live', '2021-01-24 19:13:30', '2021-01-24 19:13:30'),
(66, 28, 32, 'Live', '2021-01-24 19:13:37', '2021-01-24 19:13:37'),
(67, 27, 32, 'Live', '2021-01-24 19:13:37', '2021-01-24 19:13:37'),
(68, 26, 32, 'Live', '2021-01-24 19:13:37', '2021-01-24 19:13:37'),
(69, 25, 32, 'Live', '2021-01-24 19:13:37', '2021-01-24 19:13:37'),
(70, 28, 33, 'Live', '2021-01-24 19:13:45', '2021-01-24 19:13:45'),
(71, 27, 33, 'Live', '2021-01-24 19:13:45', '2021-01-24 19:13:45'),
(72, 26, 33, 'Live', '2021-01-24 19:13:45', '2021-01-24 19:13:45'),
(73, 25, 33, 'Live', '2021-01-24 19:13:45', '2021-01-24 19:13:45'),
(74, 28, 34, 'Live', '2021-01-24 19:14:52', '2021-01-24 19:14:52'),
(75, 27, 34, 'Live', '2021-01-24 19:14:52', '2021-01-24 19:14:52'),
(76, 26, 34, 'Live', '2021-01-24 19:14:52', '2021-01-24 19:14:52'),
(77, 25, 34, 'Live', '2021-01-24 19:14:52', '2021-01-24 19:14:52'),
(78, 28, 35, 'Live', '2021-01-24 19:15:02', '2021-01-24 19:15:02'),
(79, 27, 35, 'Live', '2021-01-24 19:15:02', '2021-01-24 19:15:02'),
(80, 26, 35, 'Live', '2021-01-24 19:15:02', '2021-01-24 19:15:02'),
(81, 25, 35, 'Live', '2021-01-24 19:15:02', '2021-01-24 19:15:02'),
(82, 28, 36, 'Live', '2021-01-24 19:15:13', '2021-01-24 19:15:13'),
(83, 27, 36, 'Live', '2021-01-24 19:15:13', '2021-01-24 19:15:13'),
(84, 26, 36, 'Live', '2021-01-24 19:15:13', '2021-01-24 19:15:13'),
(85, 25, 36, 'Live', '2021-01-24 19:15:13', '2021-01-24 19:15:13'),
(86, 28, 37, 'Live', '2021-01-24 19:15:20', '2021-01-24 19:15:20'),
(87, 27, 37, 'Live', '2021-01-24 19:15:20', '2021-01-24 19:15:20'),
(88, 26, 37, 'Live', '2021-01-24 19:15:20', '2021-01-24 19:15:20'),
(89, 25, 37, 'Live', '2021-01-24 19:15:20', '2021-01-24 19:15:20'),
(90, 28, 38, 'Live', '2021-01-24 19:15:28', '2021-01-24 19:15:28'),
(91, 27, 38, 'Live', '2021-01-24 19:15:28', '2021-01-24 19:15:28'),
(92, 26, 38, 'Live', '2021-01-24 19:15:28', '2021-01-24 19:15:28'),
(93, 25, 38, 'Live', '2021-01-24 19:15:28', '2021-01-24 19:15:28'),
(94, 28, 39, 'Live', '2021-01-24 19:15:36', '2021-01-24 19:15:36'),
(95, 27, 39, 'Live', '2021-01-24 19:15:36', '2021-01-24 19:15:36'),
(96, 26, 39, 'Live', '2021-01-24 19:15:36', '2021-01-24 19:15:36'),
(97, 25, 39, 'Live', '2021-01-24 19:15:36', '2021-01-24 19:15:36'),
(98, 28, 40, 'Live', '2021-01-24 19:15:44', '2021-01-24 19:15:44'),
(99, 27, 40, 'Live', '2021-01-24 19:15:44', '2021-01-24 19:15:44'),
(100, 26, 40, 'Live', '2021-01-24 19:15:44', '2021-01-24 19:15:44'),
(101, 25, 40, 'Live', '2021-01-24 19:15:44', '2021-01-24 19:15:44'),
(102, 28, 41, 'Live', '2021-01-24 19:15:55', '2021-01-24 19:15:55'),
(103, 27, 41, 'Live', '2021-01-24 19:15:55', '2021-01-24 19:15:55'),
(104, 26, 41, 'Live', '2021-01-24 19:15:55', '2021-01-24 19:15:55'),
(105, 25, 41, 'Live', '2021-01-24 19:15:55', '2021-01-24 19:15:55'),
(106, 28, 42, 'Live', '2021-01-24 19:16:03', '2021-01-24 19:16:03'),
(107, 27, 42, 'Live', '2021-01-24 19:16:03', '2021-01-24 19:16:03'),
(108, 26, 42, 'Live', '2021-01-24 19:16:03', '2021-01-24 19:16:03'),
(109, 25, 42, 'Live', '2021-01-24 19:16:03', '2021-01-24 19:16:03'),
(110, 28, 43, 'Live', '2021-01-24 19:16:11', '2021-01-24 19:16:11'),
(111, 27, 43, 'Live', '2021-01-24 19:16:11', '2021-01-24 19:16:11'),
(112, 26, 43, 'Live', '2021-01-24 19:16:11', '2021-01-24 19:16:11'),
(113, 25, 43, 'Live', '2021-01-24 19:16:11', '2021-01-24 19:16:11'),
(114, 28, 53, 'Live', '2021-01-24 19:17:03', '2021-01-24 19:17:03'),
(115, 27, 53, 'Live', '2021-01-24 19:17:03', '2021-01-24 19:17:03'),
(116, 26, 53, 'Live', '2021-01-24 19:17:03', '2021-01-24 19:17:03'),
(117, 25, 53, 'Live', '2021-01-24 19:17:03', '2021-01-24 19:17:03'),
(118, 28, 52, 'Live', '2021-01-24 19:17:14', '2021-01-24 19:17:14'),
(119, 27, 52, 'Live', '2021-01-24 19:17:14', '2021-01-24 19:17:14'),
(120, 26, 52, 'Live', '2021-01-24 19:17:14', '2021-01-24 19:17:14'),
(121, 25, 52, 'Live', '2021-01-24 19:17:14', '2021-01-24 19:17:14'),
(122, 28, 51, 'Live', '2021-01-24 19:17:22', '2021-01-24 19:17:22'),
(123, 27, 51, 'Live', '2021-01-24 19:17:22', '2021-01-24 19:17:22'),
(124, 26, 51, 'Live', '2021-01-24 19:17:22', '2021-01-24 19:17:22'),
(125, 25, 51, 'Live', '2021-01-24 19:17:22', '2021-01-24 19:17:22'),
(126, 28, 50, 'Live', '2021-01-24 19:17:31', '2021-01-24 19:17:31'),
(127, 27, 50, 'Live', '2021-01-24 19:17:31', '2021-01-24 19:17:31'),
(128, 26, 50, 'Live', '2021-01-24 19:17:31', '2021-01-24 19:17:31'),
(129, 25, 50, 'Live', '2021-01-24 19:17:31', '2021-01-24 19:17:31'),
(130, 28, 49, 'Live', '2021-01-24 19:17:39', '2021-01-24 19:17:39'),
(131, 27, 49, 'Live', '2021-01-24 19:17:39', '2021-01-24 19:17:39'),
(132, 26, 49, 'Live', '2021-01-24 19:17:39', '2021-01-24 19:17:39'),
(133, 25, 49, 'Live', '2021-01-24 19:17:39', '2021-01-24 19:17:39'),
(134, 28, 48, 'Live', '2021-01-24 19:17:46', '2021-01-24 19:17:46'),
(135, 27, 48, 'Live', '2021-01-24 19:17:46', '2021-01-24 19:17:46'),
(136, 26, 48, 'Live', '2021-01-24 19:17:46', '2021-01-24 19:17:46'),
(137, 25, 48, 'Live', '2021-01-24 19:17:46', '2021-01-24 19:17:46'),
(138, 28, 47, 'Live', '2021-01-24 19:17:53', '2021-01-24 19:17:53'),
(139, 27, 47, 'Live', '2021-01-24 19:17:53', '2021-01-24 19:17:53'),
(140, 26, 47, 'Live', '2021-01-24 19:17:53', '2021-01-24 19:17:53'),
(141, 25, 47, 'Live', '2021-01-24 19:17:53', '2021-01-24 19:17:53'),
(142, 28, 46, 'Live', '2021-01-24 19:18:01', '2021-01-24 19:18:01'),
(143, 27, 46, 'Live', '2021-01-24 19:18:01', '2021-01-24 19:18:01'),
(144, 26, 46, 'Live', '2021-01-24 19:18:01', '2021-01-24 19:18:01'),
(145, 25, 46, 'Live', '2021-01-24 19:18:01', '2021-01-24 19:18:01'),
(146, 28, 45, 'Live', '2021-01-24 19:18:15', '2021-01-24 19:18:15'),
(147, 27, 45, 'Live', '2021-01-24 19:18:15', '2021-01-24 19:18:15'),
(148, 26, 45, 'Live', '2021-01-24 19:18:15', '2021-01-24 19:18:15'),
(149, 25, 45, 'Live', '2021-01-24 19:18:15', '2021-01-24 19:18:15'),
(150, 28, 44, 'Live', '2021-01-24 19:18:22', '2021-01-24 19:18:22'),
(151, 27, 44, 'Live', '2021-01-24 19:18:22', '2021-01-24 19:18:22'),
(152, 26, 44, 'Live', '2021-01-24 19:18:22', '2021-01-24 19:18:22'),
(153, 25, 44, 'Live', '2021-01-24 19:18:22', '2021-01-24 19:18:22'),
(154, 28, 54, 'Live', '2021-01-24 19:19:51', '2021-01-24 19:19:51'),
(155, 27, 54, 'Live', '2021-01-24 19:19:51', '2021-01-24 19:19:51'),
(156, 26, 54, 'Live', '2021-01-24 19:19:51', '2021-01-24 19:19:51'),
(157, 25, 54, 'Live', '2021-01-24 19:19:51', '2021-01-24 19:19:51'),
(158, 28, 55, 'Live', '2021-01-24 19:19:59', '2021-01-24 19:19:59'),
(159, 27, 55, 'Live', '2021-01-24 19:19:59', '2021-01-24 19:19:59'),
(160, 26, 55, 'Live', '2021-01-24 19:19:59', '2021-01-24 19:19:59'),
(161, 25, 55, 'Live', '2021-01-24 19:19:59', '2021-01-24 19:19:59'),
(162, 28, 63, 'Live', '2021-01-24 19:20:07', '2021-01-24 19:20:07'),
(163, 27, 63, 'Live', '2021-01-24 19:20:07', '2021-01-24 19:20:07'),
(164, 26, 63, 'Live', '2021-01-24 19:20:07', '2021-01-24 19:20:07'),
(165, 25, 63, 'Live', '2021-01-24 19:20:07', '2021-01-24 19:20:07'),
(166, 28, 62, 'Live', '2021-01-24 19:20:14', '2021-01-24 19:20:14'),
(167, 27, 62, 'Live', '2021-01-24 19:20:14', '2021-01-24 19:20:14'),
(168, 26, 62, 'Live', '2021-01-24 19:20:14', '2021-01-24 19:20:14'),
(169, 25, 62, 'Live', '2021-01-24 19:20:14', '2021-01-24 19:20:14'),
(170, 28, 61, 'Live', '2021-01-24 19:20:21', '2021-01-24 19:20:21'),
(171, 27, 61, 'Live', '2021-01-24 19:20:21', '2021-01-24 19:20:21'),
(172, 26, 61, 'Live', '2021-01-24 19:20:21', '2021-01-24 19:20:21'),
(173, 25, 61, 'Live', '2021-01-24 19:20:21', '2021-01-24 19:20:21'),
(174, 28, 60, 'Live', '2021-01-24 19:20:30', '2021-01-24 19:20:30'),
(175, 27, 60, 'Live', '2021-01-24 19:20:30', '2021-01-24 19:20:30'),
(176, 26, 60, 'Live', '2021-01-24 19:20:30', '2021-01-24 19:20:30'),
(177, 25, 60, 'Live', '2021-01-24 19:20:30', '2021-01-24 19:20:30'),
(178, 28, 59, 'Live', '2021-01-24 19:20:37', '2021-01-24 19:20:37'),
(179, 27, 59, 'Live', '2021-01-24 19:20:37', '2021-01-24 19:20:37'),
(180, 26, 59, 'Live', '2021-01-24 19:20:37', '2021-01-24 19:20:37'),
(181, 25, 59, 'Live', '2021-01-24 19:20:37', '2021-01-24 19:20:37'),
(182, 28, 58, 'Live', '2021-01-24 19:20:45', '2021-01-24 19:20:45'),
(183, 27, 58, 'Live', '2021-01-24 19:20:45', '2021-01-24 19:20:45'),
(184, 26, 58, 'Live', '2021-01-24 19:20:45', '2021-01-24 19:20:45'),
(185, 25, 58, 'Live', '2021-01-24 19:20:45', '2021-01-24 19:20:45'),
(186, 28, 57, 'Live', '2021-01-24 19:20:54', '2021-01-24 19:20:54'),
(187, 27, 57, 'Live', '2021-01-24 19:20:54', '2021-01-24 19:20:54'),
(188, 26, 57, 'Live', '2021-01-24 19:20:54', '2021-01-24 19:20:54'),
(189, 25, 57, 'Live', '2021-01-24 19:20:54', '2021-01-24 19:20:54'),
(190, 28, 56, 'Live', '2021-01-24 19:21:02', '2021-01-24 19:21:02'),
(191, 27, 56, 'Live', '2021-01-24 19:21:02', '2021-01-24 19:21:02'),
(192, 26, 56, 'Live', '2021-01-24 19:21:02', '2021-01-24 19:21:02'),
(193, 25, 56, 'Live', '2021-01-24 19:21:02', '2021-01-24 19:21:02'),
(194, 28, 73, 'Live', '2021-01-24 19:21:56', '2021-01-24 19:21:56'),
(195, 27, 73, 'Live', '2021-01-24 19:21:56', '2021-01-24 19:21:56'),
(196, 26, 73, 'Live', '2021-01-24 19:21:56', '2021-01-24 19:21:56'),
(197, 25, 73, 'Live', '2021-01-24 19:21:56', '2021-01-24 19:21:56'),
(198, 28, 72, 'Live', '2021-01-24 19:22:04', '2021-01-24 19:22:04'),
(199, 27, 72, 'Live', '2021-01-24 19:22:04', '2021-01-24 19:22:04'),
(200, 26, 72, 'Live', '2021-01-24 19:22:04', '2021-01-24 19:22:04'),
(201, 25, 72, 'Live', '2021-01-24 19:22:04', '2021-01-24 19:22:04'),
(202, 28, 71, 'Live', '2021-01-24 19:22:12', '2021-01-24 19:22:12'),
(203, 27, 71, 'Live', '2021-01-24 19:22:12', '2021-01-24 19:22:12'),
(204, 26, 71, 'Live', '2021-01-24 19:22:12', '2021-01-24 19:22:12'),
(205, 25, 71, 'Live', '2021-01-24 19:22:12', '2021-01-24 19:22:12'),
(206, 28, 70, 'Live', '2021-01-24 19:22:19', '2021-01-24 19:22:19'),
(207, 27, 70, 'Live', '2021-01-24 19:22:19', '2021-01-24 19:22:19'),
(208, 26, 70, 'Live', '2021-01-24 19:22:19', '2021-01-24 19:22:19'),
(209, 25, 70, 'Live', '2021-01-24 19:22:19', '2021-01-24 19:22:19'),
(210, 28, 69, 'Live', '2021-01-24 19:22:28', '2021-01-24 19:22:28'),
(211, 27, 69, 'Live', '2021-01-24 19:22:28', '2021-01-24 19:22:28'),
(212, 26, 69, 'Live', '2021-01-24 19:22:28', '2021-01-24 19:22:28'),
(213, 25, 69, 'Live', '2021-01-24 19:22:28', '2021-01-24 19:22:28'),
(214, 28, 68, 'Live', '2021-01-24 19:22:35', '2021-01-24 19:22:35'),
(215, 27, 68, 'Live', '2021-01-24 19:22:35', '2021-01-24 19:22:35'),
(216, 26, 68, 'Live', '2021-01-24 19:22:35', '2021-01-24 19:22:35'),
(217, 25, 68, 'Live', '2021-01-24 19:22:35', '2021-01-24 19:22:35'),
(218, 28, 67, 'Live', '2021-01-24 19:22:42', '2021-01-24 19:22:42'),
(219, 27, 67, 'Live', '2021-01-24 19:22:42', '2021-01-24 19:22:42'),
(220, 26, 67, 'Live', '2021-01-24 19:22:42', '2021-01-24 19:22:42'),
(221, 25, 67, 'Live', '2021-01-24 19:22:42', '2021-01-24 19:22:42'),
(222, 28, 66, 'Live', '2021-01-24 19:22:50', '2021-01-24 19:22:50'),
(223, 27, 66, 'Live', '2021-01-24 19:22:50', '2021-01-24 19:22:50'),
(224, 26, 66, 'Live', '2021-01-24 19:22:50', '2021-01-24 19:22:50'),
(225, 25, 66, 'Live', '2021-01-24 19:22:50', '2021-01-24 19:22:50'),
(226, 28, 65, 'Live', '2021-01-24 19:22:57', '2021-01-24 19:22:57'),
(227, 27, 65, 'Live', '2021-01-24 19:22:57', '2021-01-24 19:22:57'),
(228, 26, 65, 'Live', '2021-01-24 19:22:57', '2021-01-24 19:22:57'),
(229, 25, 65, 'Live', '2021-01-24 19:22:57', '2021-01-24 19:22:57'),
(230, 28, 64, 'Live', '2021-01-24 19:23:07', '2021-01-24 19:23:07'),
(231, 27, 64, 'Live', '2021-01-24 19:23:07', '2021-01-24 19:23:07'),
(232, 26, 64, 'Live', '2021-01-24 19:23:07', '2021-01-24 19:23:07'),
(233, 25, 64, 'Live', '2021-01-24 19:23:07', '2021-01-24 19:23:07'),
(234, 28, 83, 'Live', '2021-01-24 19:24:48', '2021-01-24 19:24:48'),
(235, 27, 83, 'Live', '2021-01-24 19:24:48', '2021-01-24 19:24:48'),
(236, 26, 83, 'Live', '2021-01-24 19:24:48', '2021-01-24 19:24:48'),
(237, 25, 83, 'Live', '2021-01-24 19:24:48', '2021-01-24 19:24:48'),
(238, 28, 82, 'Live', '2021-01-24 19:24:58', '2021-01-24 19:24:58'),
(239, 27, 82, 'Live', '2021-01-24 19:24:58', '2021-01-24 19:24:58'),
(240, 26, 82, 'Live', '2021-01-24 19:24:58', '2021-01-24 19:24:58'),
(241, 25, 82, 'Live', '2021-01-24 19:24:58', '2021-01-24 19:24:58'),
(242, 28, 81, 'Live', '2021-01-24 19:25:09', '2021-01-24 19:25:09'),
(243, 27, 81, 'Live', '2021-01-24 19:25:09', '2021-01-24 19:25:09'),
(244, 26, 81, 'Live', '2021-01-24 19:25:09', '2021-01-24 19:25:09'),
(245, 25, 81, 'Live', '2021-01-24 19:25:09', '2021-01-24 19:25:09'),
(246, 28, 80, 'Live', '2021-01-24 19:25:17', '2021-01-24 19:25:17'),
(247, 27, 80, 'Live', '2021-01-24 19:25:17', '2021-01-24 19:25:17'),
(248, 26, 80, 'Live', '2021-01-24 19:25:17', '2021-01-24 19:25:17'),
(249, 25, 80, 'Live', '2021-01-24 19:25:17', '2021-01-24 19:25:17'),
(250, 28, 79, 'Live', '2021-01-24 19:25:24', '2021-01-24 19:25:24'),
(251, 27, 79, 'Live', '2021-01-24 19:25:24', '2021-01-24 19:25:24'),
(252, 26, 79, 'Live', '2021-01-24 19:25:24', '2021-01-24 19:25:24'),
(253, 25, 79, 'Live', '2021-01-24 19:25:24', '2021-01-24 19:25:24'),
(254, 28, 78, 'Live', '2021-01-24 19:25:32', '2021-01-24 19:25:32'),
(255, 27, 78, 'Live', '2021-01-24 19:25:32', '2021-01-24 19:25:32'),
(256, 26, 78, 'Live', '2021-01-24 19:25:32', '2021-01-24 19:25:32'),
(257, 25, 78, 'Live', '2021-01-24 19:25:32', '2021-01-24 19:25:32'),
(258, 28, 77, 'Live', '2021-01-24 19:25:39', '2021-01-24 19:25:39'),
(259, 27, 77, 'Live', '2021-01-24 19:25:39', '2021-01-24 19:25:39'),
(260, 26, 77, 'Live', '2021-01-24 19:25:39', '2021-01-24 19:25:39'),
(261, 25, 77, 'Live', '2021-01-24 19:25:39', '2021-01-24 19:25:39'),
(262, 28, 76, 'Live', '2021-01-24 19:25:47', '2021-01-24 19:25:47'),
(263, 27, 76, 'Live', '2021-01-24 19:25:47', '2021-01-24 19:25:47'),
(264, 26, 76, 'Live', '2021-01-24 19:25:47', '2021-01-24 19:25:47'),
(265, 25, 76, 'Live', '2021-01-24 19:25:47', '2021-01-24 19:25:47'),
(266, 28, 75, 'Live', '2021-01-24 19:25:54', '2021-01-24 19:25:54'),
(267, 27, 75, 'Live', '2021-01-24 19:25:54', '2021-01-24 19:25:54'),
(268, 26, 75, 'Live', '2021-01-24 19:25:54', '2021-01-24 19:25:54'),
(269, 25, 75, 'Live', '2021-01-24 19:25:54', '2021-01-24 19:25:54'),
(270, 28, 74, 'Live', '2021-01-24 19:26:02', '2021-01-24 19:26:02'),
(271, 27, 74, 'Live', '2021-01-24 19:26:02', '2021-01-24 19:26:02'),
(272, 26, 74, 'Live', '2021-01-24 19:26:02', '2021-01-24 19:26:02'),
(273, 25, 74, 'Live', '2021-01-24 19:26:02', '2021-01-24 19:26:02'),
(274, 28, 93, 'Live', '2021-01-24 19:26:43', '2021-01-24 19:26:43'),
(275, 27, 93, 'Live', '2021-01-24 19:26:43', '2021-01-24 19:26:43'),
(276, 26, 93, 'Live', '2021-01-24 19:26:43', '2021-01-24 19:26:43'),
(277, 25, 93, 'Live', '2021-01-24 19:26:43', '2021-01-24 19:26:43'),
(278, 28, 92, 'Live', '2021-01-24 19:26:55', '2021-01-24 19:26:55'),
(279, 27, 92, 'Live', '2021-01-24 19:26:55', '2021-01-24 19:26:55'),
(280, 26, 92, 'Live', '2021-01-24 19:26:56', '2021-01-24 19:26:56'),
(281, 25, 92, 'Live', '2021-01-24 19:26:56', '2021-01-24 19:26:56'),
(282, 28, 91, 'Live', '2021-01-24 19:27:03', '2021-01-24 19:27:03'),
(283, 27, 91, 'Live', '2021-01-24 19:27:03', '2021-01-24 19:27:03'),
(284, 26, 91, 'Live', '2021-01-24 19:27:03', '2021-01-24 19:27:03'),
(285, 25, 91, 'Live', '2021-01-24 19:27:03', '2021-01-24 19:27:03'),
(286, 28, 90, 'Live', '2021-01-24 19:27:11', '2021-01-24 19:27:11'),
(287, 27, 90, 'Live', '2021-01-24 19:27:11', '2021-01-24 19:27:11'),
(288, 26, 90, 'Live', '2021-01-24 19:27:11', '2021-01-24 19:27:11'),
(289, 25, 90, 'Live', '2021-01-24 19:27:11', '2021-01-24 19:27:11'),
(290, 28, 89, 'Live', '2021-01-24 19:27:18', '2021-01-24 19:27:18'),
(291, 27, 89, 'Live', '2021-01-24 19:27:18', '2021-01-24 19:27:18'),
(292, 26, 89, 'Live', '2021-01-24 19:27:19', '2021-01-24 19:27:19'),
(293, 25, 89, 'Live', '2021-01-24 19:27:19', '2021-01-24 19:27:19'),
(294, 28, 88, 'Live', '2021-01-24 19:27:26', '2021-01-24 19:27:26'),
(295, 27, 88, 'Live', '2021-01-24 19:27:26', '2021-01-24 19:27:26'),
(296, 26, 88, 'Live', '2021-01-24 19:27:26', '2021-01-24 19:27:26'),
(297, 25, 88, 'Live', '2021-01-24 19:27:26', '2021-01-24 19:27:26'),
(298, 28, 87, 'Live', '2021-01-24 19:27:34', '2021-01-24 19:27:34'),
(299, 27, 87, 'Live', '2021-01-24 19:27:34', '2021-01-24 19:27:34'),
(300, 26, 87, 'Live', '2021-01-24 19:27:34', '2021-01-24 19:27:34'),
(301, 25, 87, 'Live', '2021-01-24 19:27:34', '2021-01-24 19:27:34'),
(302, 28, 86, 'Live', '2021-01-24 19:27:41', '2021-01-24 19:27:41'),
(303, 27, 86, 'Live', '2021-01-24 19:27:41', '2021-01-24 19:27:41'),
(304, 26, 86, 'Live', '2021-01-24 19:27:41', '2021-01-24 19:27:41'),
(305, 25, 86, 'Live', '2021-01-24 19:27:41', '2021-01-24 19:27:41'),
(306, 28, 85, 'Live', '2021-01-24 19:27:49', '2021-01-24 19:27:49'),
(307, 27, 85, 'Live', '2021-01-24 19:27:49', '2021-01-24 19:27:49'),
(308, 26, 85, 'Live', '2021-01-24 19:27:49', '2021-01-24 19:27:49'),
(309, 25, 85, 'Live', '2021-01-24 19:27:49', '2021-01-24 19:27:49'),
(310, 28, 84, 'Live', '2021-01-24 19:27:56', '2021-01-24 19:27:56'),
(311, 27, 84, 'Live', '2021-01-24 19:27:56', '2021-01-24 19:27:56'),
(312, 26, 84, 'Live', '2021-01-24 19:27:56', '2021-01-24 19:27:56'),
(313, 25, 84, 'Live', '2021-01-24 19:27:56', '2021-01-24 19:27:56'),
(314, 28, 103, 'Live', '2021-01-24 19:28:51', '2021-01-24 19:28:51'),
(315, 27, 103, 'Live', '2021-01-24 19:28:51', '2021-01-24 19:28:51'),
(316, 26, 103, 'Live', '2021-01-24 19:28:51', '2021-01-24 19:28:51'),
(317, 25, 103, 'Live', '2021-01-24 19:28:51', '2021-01-24 19:28:51'),
(318, 28, 102, 'Live', '2021-01-24 19:29:04', '2021-01-24 19:29:04'),
(319, 27, 102, 'Live', '2021-01-24 19:29:04', '2021-01-24 19:29:04'),
(320, 26, 102, 'Live', '2021-01-24 19:29:04', '2021-01-24 19:29:04'),
(321, 25, 102, 'Live', '2021-01-24 19:29:04', '2021-01-24 19:29:04'),
(322, 28, 101, 'Live', '2021-01-24 19:29:12', '2021-01-24 19:29:12'),
(323, 27, 101, 'Live', '2021-01-24 19:29:12', '2021-01-24 19:29:12'),
(324, 26, 101, 'Live', '2021-01-24 19:29:12', '2021-01-24 19:29:12'),
(325, 25, 101, 'Live', '2021-01-24 19:29:12', '2021-01-24 19:29:12'),
(326, 28, 100, 'Live', '2021-01-24 19:29:19', '2021-01-24 19:29:19'),
(327, 27, 100, 'Live', '2021-01-24 19:29:19', '2021-01-24 19:29:19'),
(328, 26, 100, 'Live', '2021-01-24 19:29:19', '2021-01-24 19:29:19'),
(329, 25, 100, 'Live', '2021-01-24 19:29:19', '2021-01-24 19:29:19'),
(330, 28, 99, 'Live', '2021-01-24 19:29:27', '2021-01-24 19:29:27'),
(331, 27, 99, 'Live', '2021-01-24 19:29:27', '2021-01-24 19:29:27'),
(332, 26, 99, 'Live', '2021-01-24 19:29:27', '2021-01-24 19:29:27'),
(333, 25, 99, 'Live', '2021-01-24 19:29:27', '2021-01-24 19:29:27'),
(334, 28, 98, 'Live', '2021-01-24 19:29:35', '2021-01-24 19:29:35'),
(335, 27, 98, 'Live', '2021-01-24 19:29:35', '2021-01-24 19:29:35'),
(336, 26, 98, 'Live', '2021-01-24 19:29:35', '2021-01-24 19:29:35'),
(337, 25, 98, 'Live', '2021-01-24 19:29:35', '2021-01-24 19:29:35'),
(338, 28, 97, 'Live', '2021-01-24 19:29:43', '2021-01-24 19:29:43'),
(339, 27, 97, 'Live', '2021-01-24 19:29:43', '2021-01-24 19:29:43'),
(340, 26, 97, 'Live', '2021-01-24 19:29:43', '2021-01-24 19:29:43'),
(341, 25, 97, 'Live', '2021-01-24 19:29:43', '2021-01-24 19:29:43'),
(342, 28, 96, 'Live', '2021-01-24 19:29:50', '2021-01-24 19:29:50'),
(343, 27, 96, 'Live', '2021-01-24 19:29:50', '2021-01-24 19:29:50'),
(344, 26, 96, 'Live', '2021-01-24 19:29:50', '2021-01-24 19:29:50'),
(345, 25, 96, 'Live', '2021-01-24 19:29:50', '2021-01-24 19:29:50'),
(346, 28, 95, 'Live', '2021-01-24 19:29:58', '2021-01-24 19:29:58'),
(347, 27, 95, 'Live', '2021-01-24 19:29:58', '2021-01-24 19:29:58'),
(348, 26, 95, 'Live', '2021-01-24 19:29:58', '2021-01-24 19:29:58'),
(349, 25, 95, 'Live', '2021-01-24 19:29:58', '2021-01-24 19:29:58'),
(350, 28, 94, 'Live', '2021-01-24 19:30:06', '2021-01-24 19:30:06'),
(351, 27, 94, 'Live', '2021-01-24 19:30:06', '2021-01-24 19:30:06'),
(352, 26, 94, 'Live', '2021-01-24 19:30:06', '2021-01-24 19:30:06'),
(353, 25, 94, 'Live', '2021-01-24 19:30:06', '2021-01-24 19:30:06'),
(354, 28, 113, 'Live', '2021-01-24 19:30:56', '2021-01-24 19:30:56'),
(355, 27, 113, 'Live', '2021-01-24 19:30:56', '2021-01-24 19:30:56'),
(356, 26, 113, 'Live', '2021-01-24 19:30:56', '2021-01-24 19:30:56'),
(357, 25, 113, 'Live', '2021-01-24 19:30:56', '2021-01-24 19:30:56'),
(358, 28, 112, 'Live', '2021-01-24 19:31:08', '2021-01-24 19:31:08'),
(359, 27, 112, 'Live', '2021-01-24 19:31:08', '2021-01-24 19:31:08'),
(360, 26, 112, 'Live', '2021-01-24 19:31:08', '2021-01-24 19:31:08'),
(361, 25, 112, 'Live', '2021-01-24 19:31:08', '2021-01-24 19:31:08'),
(362, 28, 111, 'Live', '2021-01-24 19:31:16', '2021-01-24 19:31:16'),
(363, 27, 111, 'Live', '2021-01-24 19:31:16', '2021-01-24 19:31:16'),
(364, 26, 111, 'Live', '2021-01-24 19:31:16', '2021-01-24 19:31:16'),
(365, 25, 111, 'Live', '2021-01-24 19:31:16', '2021-01-24 19:31:16'),
(366, 28, 110, 'Live', '2021-01-24 19:31:24', '2021-01-24 19:31:24'),
(367, 27, 110, 'Live', '2021-01-24 19:31:24', '2021-01-24 19:31:24'),
(368, 26, 110, 'Live', '2021-01-24 19:31:24', '2021-01-24 19:31:24'),
(369, 25, 110, 'Live', '2021-01-24 19:31:24', '2021-01-24 19:31:24'),
(370, 28, 109, 'Live', '2021-01-24 19:31:31', '2021-01-24 19:31:31'),
(371, 27, 109, 'Live', '2021-01-24 19:31:31', '2021-01-24 19:31:31'),
(372, 26, 109, 'Live', '2021-01-24 19:31:31', '2021-01-24 19:31:31'),
(373, 25, 109, 'Live', '2021-01-24 19:31:31', '2021-01-24 19:31:31'),
(374, 28, 108, 'Live', '2021-01-24 19:31:40', '2021-01-24 19:31:40'),
(375, 27, 108, 'Live', '2021-01-24 19:31:40', '2021-01-24 19:31:40'),
(376, 26, 108, 'Live', '2021-01-24 19:31:40', '2021-01-24 19:31:40'),
(377, 25, 108, 'Live', '2021-01-24 19:31:40', '2021-01-24 19:31:40'),
(378, 28, 107, 'Live', '2021-01-24 19:31:48', '2021-01-24 19:31:48'),
(379, 27, 107, 'Live', '2021-01-24 19:31:48', '2021-01-24 19:31:48'),
(380, 26, 107, 'Live', '2021-01-24 19:31:48', '2021-01-24 19:31:48'),
(381, 25, 107, 'Live', '2021-01-24 19:31:48', '2021-01-24 19:31:48'),
(382, 28, 106, 'Live', '2021-01-24 19:31:55', '2021-01-24 19:31:55'),
(383, 27, 106, 'Live', '2021-01-24 19:31:55', '2021-01-24 19:31:55'),
(384, 26, 106, 'Live', '2021-01-24 19:31:55', '2021-01-24 19:31:55'),
(385, 25, 106, 'Live', '2021-01-24 19:31:55', '2021-01-24 19:31:55'),
(386, 28, 105, 'Live', '2021-01-24 19:32:03', '2021-01-24 19:32:03'),
(387, 27, 105, 'Live', '2021-01-24 19:32:03', '2021-01-24 19:32:03'),
(388, 26, 105, 'Live', '2021-01-24 19:32:03', '2021-01-24 19:32:03'),
(389, 25, 105, 'Live', '2021-01-24 19:32:03', '2021-01-24 19:32:03'),
(390, 28, 104, 'Live', '2021-01-24 19:32:10', '2021-01-24 19:32:10'),
(391, 27, 104, 'Live', '2021-01-24 19:32:10', '2021-01-24 19:32:10'),
(392, 26, 104, 'Live', '2021-01-24 19:32:10', '2021-01-24 19:32:10'),
(393, 25, 104, 'Live', '2021-01-24 19:32:10', '2021-01-24 19:32:10'),
(394, 28, 123, 'Live', '2021-01-24 19:32:54', '2021-01-24 19:32:54'),
(395, 27, 123, 'Live', '2021-01-24 19:32:54', '2021-01-24 19:32:54'),
(396, 26, 123, 'Live', '2021-01-24 19:32:54', '2021-01-24 19:32:54'),
(397, 25, 123, 'Live', '2021-01-24 19:32:54', '2021-01-24 19:32:54'),
(398, 28, 122, 'Live', '2021-01-24 19:33:07', '2021-01-24 19:33:07'),
(399, 27, 122, 'Live', '2021-01-24 19:33:07', '2021-01-24 19:33:07'),
(400, 26, 122, 'Live', '2021-01-24 19:33:07', '2021-01-24 19:33:07'),
(401, 25, 122, 'Live', '2021-01-24 19:33:07', '2021-01-24 19:33:07'),
(402, 28, 121, 'Live', '2021-01-24 19:33:15', '2021-01-24 19:33:15'),
(403, 27, 121, 'Live', '2021-01-24 19:33:15', '2021-01-24 19:33:15'),
(404, 26, 121, 'Live', '2021-01-24 19:33:15', '2021-01-24 19:33:15'),
(405, 25, 121, 'Live', '2021-01-24 19:33:15', '2021-01-24 19:33:15'),
(406, 28, 120, 'Live', '2021-01-24 19:33:22', '2021-01-24 19:33:22'),
(407, 27, 120, 'Live', '2021-01-24 19:33:22', '2021-01-24 19:33:22'),
(408, 26, 120, 'Live', '2021-01-24 19:33:22', '2021-01-24 19:33:22'),
(409, 25, 120, 'Live', '2021-01-24 19:33:22', '2021-01-24 19:33:22'),
(410, 28, 119, 'Live', '2021-01-24 19:33:30', '2021-01-24 19:33:30'),
(411, 27, 119, 'Live', '2021-01-24 19:33:30', '2021-01-24 19:33:30'),
(412, 26, 119, 'Live', '2021-01-24 19:33:30', '2021-01-24 19:33:30'),
(413, 25, 119, 'Live', '2021-01-24 19:33:30', '2021-01-24 19:33:30'),
(414, 28, 118, 'Live', '2021-01-24 19:33:37', '2021-01-24 19:33:37'),
(415, 27, 118, 'Live', '2021-01-24 19:33:37', '2021-01-24 19:33:37'),
(416, 26, 118, 'Live', '2021-01-24 19:33:37', '2021-01-24 19:33:37'),
(417, 25, 118, 'Live', '2021-01-24 19:33:37', '2021-01-24 19:33:37'),
(418, 28, 117, 'Live', '2021-01-24 19:33:44', '2021-01-24 19:33:44'),
(419, 27, 117, 'Live', '2021-01-24 19:33:44', '2021-01-24 19:33:44'),
(420, 26, 117, 'Live', '2021-01-24 19:33:44', '2021-01-24 19:33:44'),
(421, 25, 117, 'Live', '2021-01-24 19:33:44', '2021-01-24 19:33:44'),
(422, 28, 116, 'Live', '2021-01-24 19:33:53', '2021-01-24 19:33:53'),
(423, 27, 116, 'Live', '2021-01-24 19:33:53', '2021-01-24 19:33:53'),
(424, 26, 116, 'Live', '2021-01-24 19:33:53', '2021-01-24 19:33:53'),
(425, 25, 116, 'Live', '2021-01-24 19:33:53', '2021-01-24 19:33:53'),
(426, 28, 115, 'Live', '2021-01-24 19:34:02', '2021-01-24 19:34:02'),
(427, 27, 115, 'Live', '2021-01-24 19:34:02', '2021-01-24 19:34:02'),
(428, 26, 115, 'Live', '2021-01-24 19:34:02', '2021-01-24 19:34:02'),
(429, 25, 115, 'Live', '2021-01-24 19:34:02', '2021-01-24 19:34:02'),
(430, 28, 114, 'Live', '2021-01-24 19:34:09', '2021-01-24 19:34:09'),
(431, 27, 114, 'Live', '2021-01-24 19:34:09', '2021-01-24 19:34:09'),
(432, 26, 114, 'Live', '2021-01-24 19:34:09', '2021-01-24 19:34:09'),
(433, 25, 114, 'Live', '2021-01-24 19:34:09', '2021-01-24 19:34:09'),
(434, 28, 133, 'Live', '2021-01-24 19:34:53', '2021-01-24 19:34:53'),
(435, 27, 133, 'Live', '2021-01-24 19:34:53', '2021-01-24 19:34:53'),
(436, 26, 133, 'Live', '2021-01-24 19:34:53', '2021-01-24 19:34:53'),
(437, 25, 133, 'Live', '2021-01-24 19:34:53', '2021-01-24 19:34:53'),
(438, 28, 132, 'Live', '2021-01-24 19:35:03', '2021-01-24 19:35:03'),
(439, 27, 132, 'Live', '2021-01-24 19:35:03', '2021-01-24 19:35:03'),
(440, 26, 132, 'Live', '2021-01-24 19:35:03', '2021-01-24 19:35:03'),
(441, 25, 132, 'Live', '2021-01-24 19:35:03', '2021-01-24 19:35:03'),
(442, 28, 131, 'Live', '2021-01-24 19:35:14', '2021-01-24 19:35:14'),
(443, 27, 131, 'Live', '2021-01-24 19:35:14', '2021-01-24 19:35:14'),
(444, 26, 131, 'Live', '2021-01-24 19:35:14', '2021-01-24 19:35:14'),
(445, 25, 131, 'Live', '2021-01-24 19:35:14', '2021-01-24 19:35:14'),
(446, 28, 130, 'Live', '2021-01-24 19:35:22', '2021-01-24 19:35:22'),
(447, 27, 130, 'Live', '2021-01-24 19:35:22', '2021-01-24 19:35:22'),
(448, 26, 130, 'Live', '2021-01-24 19:35:22', '2021-01-24 19:35:22'),
(449, 25, 130, 'Live', '2021-01-24 19:35:22', '2021-01-24 19:35:22'),
(450, 28, 129, 'Live', '2021-01-24 19:35:30', '2021-01-24 19:35:30'),
(451, 27, 129, 'Live', '2021-01-24 19:35:30', '2021-01-24 19:35:30'),
(452, 26, 129, 'Live', '2021-01-24 19:35:30', '2021-01-24 19:35:30'),
(453, 25, 129, 'Live', '2021-01-24 19:35:30', '2021-01-24 19:35:30'),
(454, 28, 128, 'Live', '2021-01-24 19:35:38', '2021-01-24 19:35:38'),
(455, 27, 128, 'Live', '2021-01-24 19:35:38', '2021-01-24 19:35:38'),
(456, 26, 128, 'Live', '2021-01-24 19:35:38', '2021-01-24 19:35:38'),
(457, 25, 128, 'Live', '2021-01-24 19:35:38', '2021-01-24 19:35:38'),
(458, 28, 127, 'Live', '2021-01-24 19:35:46', '2021-01-24 19:35:46'),
(459, 27, 127, 'Live', '2021-01-24 19:35:46', '2021-01-24 19:35:46'),
(460, 26, 127, 'Live', '2021-01-24 19:35:46', '2021-01-24 19:35:46'),
(461, 25, 127, 'Live', '2021-01-24 19:35:46', '2021-01-24 19:35:46'),
(462, 28, 126, 'Live', '2021-01-24 19:35:55', '2021-01-24 19:35:55'),
(463, 27, 126, 'Live', '2021-01-24 19:35:55', '2021-01-24 19:35:55'),
(464, 26, 126, 'Live', '2021-01-24 19:35:55', '2021-01-24 19:35:55'),
(465, 25, 126, 'Live', '2021-01-24 19:35:55', '2021-01-24 19:35:55'),
(466, 28, 125, 'Live', '2021-01-24 19:36:03', '2021-01-24 19:36:03'),
(467, 27, 125, 'Live', '2021-01-24 19:36:03', '2021-01-24 19:36:03'),
(468, 26, 125, 'Live', '2021-01-24 19:36:03', '2021-01-24 19:36:03'),
(469, 25, 125, 'Live', '2021-01-24 19:36:03', '2021-01-24 19:36:03'),
(470, 28, 124, 'Live', '2021-01-24 19:36:11', '2021-01-24 19:36:11'),
(471, 27, 124, 'Live', '2021-01-24 19:36:11', '2021-01-24 19:36:11'),
(472, 26, 124, 'Live', '2021-01-24 19:36:11', '2021-01-24 19:36:11'),
(473, 25, 124, 'Live', '2021-01-24 19:36:11', '2021-01-24 19:36:11'),
(474, 28, 143, 'Live', '2021-01-24 19:36:59', '2021-01-24 19:36:59'),
(475, 27, 143, 'Live', '2021-01-24 19:36:59', '2021-01-24 19:36:59'),
(476, 26, 143, 'Live', '2021-01-24 19:36:59', '2021-01-24 19:36:59'),
(477, 25, 143, 'Live', '2021-01-24 19:36:59', '2021-01-24 19:36:59'),
(478, 28, 142, 'Live', '2021-01-24 19:37:11', '2021-01-24 19:37:11'),
(479, 27, 142, 'Live', '2021-01-24 19:37:11', '2021-01-24 19:37:11'),
(480, 26, 142, 'Live', '2021-01-24 19:37:11', '2021-01-24 19:37:11'),
(481, 25, 142, 'Live', '2021-01-24 19:37:11', '2021-01-24 19:37:11'),
(482, 28, 141, 'Live', '2021-01-24 19:37:21', '2021-01-24 19:37:21'),
(483, 27, 141, 'Live', '2021-01-24 19:37:21', '2021-01-24 19:37:21'),
(484, 26, 141, 'Live', '2021-01-24 19:37:21', '2021-01-24 19:37:21'),
(485, 25, 141, 'Live', '2021-01-24 19:37:21', '2021-01-24 19:37:21'),
(486, 28, 140, 'Live', '2021-01-24 19:37:29', '2021-01-24 19:37:29'),
(487, 27, 140, 'Live', '2021-01-24 19:37:29', '2021-01-24 19:37:29'),
(488, 26, 140, 'Live', '2021-01-24 19:37:29', '2021-01-24 19:37:29'),
(489, 25, 140, 'Live', '2021-01-24 19:37:29', '2021-01-24 19:37:29'),
(490, 28, 139, 'Live', '2021-01-24 19:37:37', '2021-01-24 19:37:37'),
(491, 27, 139, 'Live', '2021-01-24 19:37:37', '2021-01-24 19:37:37'),
(492, 26, 139, 'Live', '2021-01-24 19:37:37', '2021-01-24 19:37:37'),
(493, 25, 139, 'Live', '2021-01-24 19:37:37', '2021-01-24 19:37:37'),
(494, 28, 138, 'Live', '2021-01-24 19:37:45', '2021-01-24 19:37:45'),
(495, 27, 138, 'Live', '2021-01-24 19:37:45', '2021-01-24 19:37:45'),
(496, 26, 138, 'Live', '2021-01-24 19:37:45', '2021-01-24 19:37:45'),
(497, 25, 138, 'Live', '2021-01-24 19:37:45', '2021-01-24 19:37:45'),
(498, 28, 137, 'Live', '2021-01-24 19:37:53', '2021-01-24 19:37:53'),
(499, 27, 137, 'Live', '2021-01-24 19:37:53', '2021-01-24 19:37:53'),
(500, 26, 137, 'Live', '2021-01-24 19:37:53', '2021-01-24 19:37:53'),
(501, 25, 137, 'Live', '2021-01-24 19:37:53', '2021-01-24 19:37:53'),
(502, 28, 136, 'Live', '2021-01-24 19:38:01', '2021-01-24 19:38:01'),
(503, 27, 136, 'Live', '2021-01-24 19:38:01', '2021-01-24 19:38:01'),
(504, 26, 136, 'Live', '2021-01-24 19:38:01', '2021-01-24 19:38:01'),
(505, 25, 136, 'Live', '2021-01-24 19:38:01', '2021-01-24 19:38:01'),
(506, 28, 135, 'Live', '2021-01-24 19:38:08', '2021-01-24 19:38:08'),
(507, 27, 135, 'Live', '2021-01-24 19:38:08', '2021-01-24 19:38:08'),
(508, 26, 135, 'Live', '2021-01-24 19:38:08', '2021-01-24 19:38:08'),
(509, 25, 135, 'Live', '2021-01-24 19:38:08', '2021-01-24 19:38:08'),
(510, 28, 134, 'Live', '2021-01-24 19:38:16', '2021-01-24 19:38:16'),
(511, 27, 134, 'Live', '2021-01-24 19:38:16', '2021-01-24 19:38:16'),
(512, 26, 134, 'Live', '2021-01-24 19:38:16', '2021-01-24 19:38:16'),
(513, 25, 134, 'Live', '2021-01-24 19:38:16', '2021-01-24 19:38:16'),
(514, 28, 153, 'Live', '2021-01-24 19:39:00', '2021-01-24 19:39:00'),
(515, 27, 153, 'Live', '2021-01-24 19:39:00', '2021-01-24 19:39:00'),
(516, 26, 153, 'Live', '2021-01-24 19:39:00', '2021-01-24 19:39:00'),
(517, 25, 153, 'Live', '2021-01-24 19:39:00', '2021-01-24 19:39:00'),
(518, 28, 152, 'Live', '2021-01-24 19:39:18', '2021-01-24 19:39:18'),
(519, 27, 152, 'Live', '2021-01-24 19:39:18', '2021-01-24 19:39:18'),
(520, 26, 152, 'Live', '2021-01-24 19:39:18', '2021-01-24 19:39:18'),
(521, 25, 152, 'Live', '2021-01-24 19:39:18', '2021-01-24 19:39:18'),
(522, 28, 151, 'Live', '2021-01-24 19:39:26', '2021-01-24 19:39:26'),
(523, 27, 151, 'Live', '2021-01-24 19:39:26', '2021-01-24 19:39:26'),
(524, 26, 151, 'Live', '2021-01-24 19:39:26', '2021-01-24 19:39:26'),
(525, 25, 151, 'Live', '2021-01-24 19:39:26', '2021-01-24 19:39:26'),
(526, 28, 150, 'Live', '2021-01-24 19:39:35', '2021-01-24 19:39:35'),
(527, 27, 150, 'Live', '2021-01-24 19:39:35', '2021-01-24 19:39:35'),
(528, 26, 150, 'Live', '2021-01-24 19:39:35', '2021-01-24 19:39:35'),
(529, 25, 150, 'Live', '2021-01-24 19:39:35', '2021-01-24 19:39:35'),
(530, 28, 149, 'Live', '2021-01-24 19:39:43', '2021-01-24 19:39:43'),
(531, 27, 149, 'Live', '2021-01-24 19:39:43', '2021-01-24 19:39:43'),
(532, 26, 149, 'Live', '2021-01-24 19:39:43', '2021-01-24 19:39:43'),
(533, 25, 149, 'Live', '2021-01-24 19:39:43', '2021-01-24 19:39:43'),
(534, 28, 148, 'Live', '2021-01-24 19:39:51', '2021-01-24 19:39:51'),
(535, 27, 148, 'Live', '2021-01-24 19:39:51', '2021-01-24 19:39:51'),
(536, 26, 148, 'Live', '2021-01-24 19:39:51', '2021-01-24 19:39:51'),
(537, 25, 148, 'Live', '2021-01-24 19:39:51', '2021-01-24 19:39:51'),
(538, 28, 147, 'Live', '2021-01-24 19:39:58', '2021-01-24 19:39:58'),
(539, 27, 147, 'Live', '2021-01-24 19:39:58', '2021-01-24 19:39:58'),
(540, 26, 147, 'Live', '2021-01-24 19:39:58', '2021-01-24 19:39:58'),
(541, 25, 147, 'Live', '2021-01-24 19:39:58', '2021-01-24 19:39:58'),
(542, 28, 146, 'Live', '2021-01-24 19:40:06', '2021-01-24 19:40:06'),
(543, 27, 146, 'Live', '2021-01-24 19:40:06', '2021-01-24 19:40:06'),
(544, 26, 146, 'Live', '2021-01-24 19:40:06', '2021-01-24 19:40:06'),
(545, 25, 146, 'Live', '2021-01-24 19:40:06', '2021-01-24 19:40:06'),
(546, 28, 145, 'Live', '2021-01-24 19:40:13', '2021-01-24 19:40:13'),
(547, 27, 145, 'Live', '2021-01-24 19:40:13', '2021-01-24 19:40:13'),
(548, 26, 145, 'Live', '2021-01-24 19:40:13', '2021-01-24 19:40:13'),
(549, 25, 145, 'Live', '2021-01-24 19:40:13', '2021-01-24 19:40:13'),
(550, 28, 144, 'Live', '2021-01-24 19:40:21', '2021-01-24 19:40:21'),
(551, 27, 144, 'Live', '2021-01-24 19:40:21', '2021-01-24 19:40:21'),
(552, 26, 144, 'Live', '2021-01-24 19:40:21', '2021-01-24 19:40:21'),
(553, 25, 144, 'Live', '2021-01-24 19:40:21', '2021-01-24 19:40:21'),
(554, 28, 162, 'Live', '2021-01-24 19:41:05', '2021-01-24 19:41:05'),
(555, 27, 162, 'Live', '2021-01-24 19:41:05', '2021-01-24 19:41:05'),
(556, 26, 162, 'Live', '2021-01-24 19:41:05', '2021-01-24 19:41:05'),
(557, 25, 162, 'Live', '2021-01-24 19:41:05', '2021-01-24 19:41:05'),
(558, 28, 163, 'Live', '2021-01-24 19:41:20', '2021-01-24 19:41:20'),
(559, 27, 163, 'Live', '2021-01-24 19:41:20', '2021-01-24 19:41:20'),
(560, 26, 163, 'Live', '2021-01-24 19:41:20', '2021-01-24 19:41:20'),
(561, 25, 163, 'Live', '2021-01-24 19:41:20', '2021-01-24 19:41:20'),
(562, 28, 161, 'Live', '2021-01-24 19:41:29', '2021-01-24 19:41:29'),
(563, 27, 161, 'Live', '2021-01-24 19:41:29', '2021-01-24 19:41:29'),
(564, 26, 161, 'Live', '2021-01-24 19:41:29', '2021-01-24 19:41:29'),
(565, 25, 161, 'Live', '2021-01-24 19:41:29', '2021-01-24 19:41:29'),
(566, 28, 160, 'Live', '2021-01-24 19:41:37', '2021-01-24 19:41:37'),
(567, 27, 160, 'Live', '2021-01-24 19:41:37', '2021-01-24 19:41:37'),
(568, 26, 160, 'Live', '2021-01-24 19:41:37', '2021-01-24 19:41:37'),
(569, 25, 160, 'Live', '2021-01-24 19:41:37', '2021-01-24 19:41:37'),
(570, 28, 159, 'Live', '2021-01-24 19:41:44', '2021-01-24 19:41:44'),
(571, 27, 159, 'Live', '2021-01-24 19:41:44', '2021-01-24 19:41:44'),
(572, 26, 159, 'Live', '2021-01-24 19:41:44', '2021-01-24 19:41:44'),
(573, 25, 159, 'Live', '2021-01-24 19:41:44', '2021-01-24 19:41:44'),
(574, 28, 158, 'Live', '2021-01-24 19:41:51', '2021-01-24 19:41:51'),
(575, 27, 158, 'Live', '2021-01-24 19:41:51', '2021-01-24 19:41:51'),
(576, 26, 158, 'Live', '2021-01-24 19:41:51', '2021-01-24 19:41:51'),
(577, 25, 158, 'Live', '2021-01-24 19:41:51', '2021-01-24 19:41:51'),
(578, 28, 157, 'Live', '2021-01-24 19:41:59', '2021-01-24 19:41:59'),
(579, 27, 157, 'Live', '2021-01-24 19:41:59', '2021-01-24 19:41:59'),
(580, 26, 157, 'Live', '2021-01-24 19:41:59', '2021-01-24 19:41:59'),
(581, 25, 157, 'Live', '2021-01-24 19:41:59', '2021-01-24 19:41:59'),
(582, 28, 156, 'Live', '2021-01-24 19:42:07', '2021-01-24 19:42:07'),
(583, 27, 156, 'Live', '2021-01-24 19:42:07', '2021-01-24 19:42:07'),
(584, 26, 156, 'Live', '2021-01-24 19:42:07', '2021-01-24 19:42:07'),
(585, 25, 156, 'Live', '2021-01-24 19:42:07', '2021-01-24 19:42:07'),
(586, 28, 155, 'Live', '2021-01-24 19:42:14', '2021-01-24 19:42:14'),
(587, 27, 155, 'Live', '2021-01-24 19:42:14', '2021-01-24 19:42:14'),
(588, 26, 155, 'Live', '2021-01-24 19:42:14', '2021-01-24 19:42:14'),
(589, 25, 155, 'Live', '2021-01-24 19:42:14', '2021-01-24 19:42:14'),
(590, 28, 154, 'Live', '2021-01-24 19:42:21', '2021-01-24 19:42:21'),
(591, 27, 154, 'Live', '2021-01-24 19:42:21', '2021-01-24 19:42:21'),
(592, 26, 154, 'Live', '2021-01-24 19:42:21', '2021-01-24 19:42:21'),
(593, 25, 154, 'Live', '2021-01-24 19:42:21', '2021-01-24 19:42:21'),
(594, 28, 173, 'Live', '2021-01-24 19:43:02', '2021-01-24 19:43:02'),
(595, 27, 173, 'Live', '2021-01-24 19:43:02', '2021-01-24 19:43:02'),
(596, 26, 173, 'Live', '2021-01-24 19:43:02', '2021-01-24 19:43:02'),
(597, 25, 173, 'Live', '2021-01-24 19:43:02', '2021-01-24 19:43:02'),
(598, 28, 172, 'Live', '2021-01-24 19:43:19', '2021-01-24 19:43:19'),
(599, 27, 172, 'Live', '2021-01-24 19:43:19', '2021-01-24 19:43:19'),
(600, 26, 172, 'Live', '2021-01-24 19:43:19', '2021-01-24 19:43:19'),
(601, 25, 172, 'Live', '2021-01-24 19:43:19', '2021-01-24 19:43:19'),
(602, 28, 171, 'Live', '2021-01-24 19:43:29', '2021-01-24 19:43:29'),
(603, 27, 171, 'Live', '2021-01-24 19:43:29', '2021-01-24 19:43:29'),
(604, 26, 171, 'Live', '2021-01-24 19:43:29', '2021-01-24 19:43:29'),
(605, 25, 171, 'Live', '2021-01-24 19:43:29', '2021-01-24 19:43:29'),
(606, 28, 170, 'Live', '2021-01-24 19:43:38', '2021-01-24 19:43:38'),
(607, 27, 170, 'Live', '2021-01-24 19:43:38', '2021-01-24 19:43:38'),
(608, 26, 170, 'Live', '2021-01-24 19:43:38', '2021-01-24 19:43:38'),
(609, 25, 170, 'Live', '2021-01-24 19:43:38', '2021-01-24 19:43:38'),
(610, 28, 169, 'Live', '2021-01-24 19:43:47', '2021-01-24 19:43:47'),
(611, 27, 169, 'Live', '2021-01-24 19:43:47', '2021-01-24 19:43:47'),
(612, 26, 169, 'Live', '2021-01-24 19:43:47', '2021-01-24 19:43:47'),
(613, 25, 169, 'Live', '2021-01-24 19:43:47', '2021-01-24 19:43:47'),
(614, 28, 168, 'Live', '2021-01-24 19:43:55', '2021-01-24 19:43:55'),
(615, 27, 168, 'Live', '2021-01-24 19:43:55', '2021-01-24 19:43:55'),
(616, 26, 168, 'Live', '2021-01-24 19:43:55', '2021-01-24 19:43:55'),
(617, 25, 168, 'Live', '2021-01-24 19:43:55', '2021-01-24 19:43:55'),
(618, 28, 167, 'Live', '2021-01-24 19:44:05', '2021-01-24 19:44:05'),
(619, 27, 167, 'Live', '2021-01-24 19:44:05', '2021-01-24 19:44:05'),
(620, 26, 167, 'Live', '2021-01-24 19:44:05', '2021-01-24 19:44:05'),
(621, 25, 167, 'Live', '2021-01-24 19:44:05', '2021-01-24 19:44:05'),
(622, 28, 166, 'Live', '2021-01-24 19:44:12', '2021-01-24 19:44:12'),
(623, 27, 166, 'Live', '2021-01-24 19:44:12', '2021-01-24 19:44:12'),
(624, 26, 166, 'Live', '2021-01-24 19:44:12', '2021-01-24 19:44:12'),
(625, 25, 166, 'Live', '2021-01-24 19:44:12', '2021-01-24 19:44:12'),
(626, 28, 165, 'Live', '2021-01-24 19:44:19', '2021-01-24 19:44:19'),
(627, 27, 165, 'Live', '2021-01-24 19:44:19', '2021-01-24 19:44:19'),
(628, 26, 165, 'Live', '2021-01-24 19:44:19', '2021-01-24 19:44:19'),
(629, 25, 165, 'Live', '2021-01-24 19:44:19', '2021-01-24 19:44:19'),
(630, 28, 164, 'Live', '2021-01-24 19:44:28', '2021-01-24 19:44:28'),
(631, 27, 164, 'Live', '2021-01-24 19:44:28', '2021-01-24 19:44:28'),
(632, 26, 164, 'Live', '2021-01-24 19:44:28', '2021-01-24 19:44:28'),
(633, 25, 164, 'Live', '2021-01-24 19:44:28', '2021-01-24 19:44:28'),
(646, 28, 181, 'Live', '2021-01-24 19:45:52', '2021-01-24 19:45:52'),
(647, 27, 181, 'Live', '2021-01-24 19:45:52', '2021-01-24 19:45:52'),
(648, 26, 181, 'Live', '2021-01-24 19:45:52', '2021-01-24 19:45:52'),
(649, 25, 181, 'Live', '2021-01-24 19:45:52', '2021-01-24 19:45:52'),
(650, 28, 180, 'Live', '2021-01-24 19:46:01', '2021-01-24 19:46:01'),
(651, 27, 180, 'Live', '2021-01-24 19:46:01', '2021-01-24 19:46:01'),
(652, 26, 180, 'Live', '2021-01-24 19:46:01', '2021-01-24 19:46:01'),
(653, 25, 180, 'Live', '2021-01-24 19:46:01', '2021-01-24 19:46:01'),
(654, 28, 179, 'Live', '2021-01-24 19:46:08', '2021-01-24 19:46:08'),
(655, 27, 179, 'Live', '2021-01-24 19:46:08', '2021-01-24 19:46:08'),
(656, 26, 179, 'Live', '2021-01-24 19:46:08', '2021-01-24 19:46:08'),
(657, 25, 179, 'Live', '2021-01-24 19:46:08', '2021-01-24 19:46:08'),
(658, 28, 178, 'Live', '2021-01-24 19:46:16', '2021-01-24 19:46:16'),
(659, 27, 178, 'Live', '2021-01-24 19:46:16', '2021-01-24 19:46:16'),
(660, 26, 178, 'Live', '2021-01-24 19:46:16', '2021-01-24 19:46:16'),
(661, 25, 178, 'Live', '2021-01-24 19:46:16', '2021-01-24 19:46:16'),
(662, 28, 177, 'Live', '2021-01-24 19:46:24', '2021-01-24 19:46:24'),
(663, 27, 177, 'Live', '2021-01-24 19:46:24', '2021-01-24 19:46:24'),
(664, 26, 177, 'Live', '2021-01-24 19:46:24', '2021-01-24 19:46:24'),
(665, 25, 177, 'Live', '2021-01-24 19:46:24', '2021-01-24 19:46:24'),
(666, 28, 176, 'Live', '2021-01-24 19:46:32', '2021-01-24 19:46:32'),
(667, 27, 176, 'Live', '2021-01-24 19:46:32', '2021-01-24 19:46:32'),
(668, 26, 176, 'Live', '2021-01-24 19:46:32', '2021-01-24 19:46:32'),
(669, 25, 176, 'Live', '2021-01-24 19:46:32', '2021-01-24 19:46:32'),
(670, 28, 175, 'Live', '2021-01-24 19:46:40', '2021-01-24 19:46:40'),
(671, 27, 175, 'Live', '2021-01-24 19:46:40', '2021-01-24 19:46:40'),
(672, 26, 175, 'Live', '2021-01-24 19:46:40', '2021-01-24 19:46:40'),
(673, 25, 175, 'Live', '2021-01-24 19:46:40', '2021-01-24 19:46:40'),
(674, 28, 174, 'Live', '2021-01-24 19:46:47', '2021-01-24 19:46:47'),
(675, 27, 174, 'Live', '2021-01-24 19:46:47', '2021-01-24 19:46:47'),
(676, 26, 174, 'Live', '2021-01-24 19:46:48', '2021-01-24 19:46:48'),
(677, 25, 174, 'Live', '2021-01-24 19:46:48', '2021-01-24 19:46:48'),
(682, 28, 183, 'Live', '2021-01-25 17:27:57', '2021-01-25 17:27:57'),
(683, 27, 183, 'Live', '2021-01-25 17:27:57', '2021-01-25 17:27:57'),
(684, 26, 183, 'Live', '2021-01-25 17:27:57', '2021-01-25 17:27:57'),
(685, 25, 183, 'Live', '2021-01-25 17:27:57', '2021-01-25 17:27:57'),
(686, 24, 183, 'Live', '2021-01-25 17:27:57', '2021-01-25 17:27:57'),
(687, 23, 183, 'Live', '2021-01-25 17:27:57', '2021-01-25 17:27:57'),
(688, 28, 182, 'Live', '2021-01-25 17:28:06', '2021-01-25 17:28:06'),
(689, 27, 182, 'Live', '2021-01-25 17:28:06', '2021-01-25 17:28:06'),
(690, 26, 182, 'Live', '2021-01-25 17:28:06', '2021-01-25 17:28:06'),
(691, 25, 182, 'Live', '2021-01-25 17:28:06', '2021-01-25 17:28:06'),
(692, 24, 182, 'Live', '2021-01-25 17:28:06', '2021-01-25 17:28:06'),
(693, 23, 182, 'Live', '2021-01-25 17:28:06', '2021-01-25 17:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_orders_table`
--

DROP TABLE IF EXISTS `tbl_restaurant_orders_table`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_orders_table` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `persons` bigint(20) UNSIGNED NOT NULL,
  `booking_time` datetime NOT NULL,
  `sales_id` bigint(20) UNSIGNED NOT NULL,
  `sale_no` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `table_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_orders_table_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_orders_table`
--

INSERT INTO `tbl_restaurant_orders_table` (`id`, `persons`, `booking_time`, `sales_id`, `sale_no`, `restaurant_id`, `table_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-10-15 20:58:44', 4, '000009', 3, 4, 'Live', '2020-10-15 14:58:44', '2020-10-15 14:58:44'),
(4, 6, '2020-10-16 01:11:09', 14, '000014', 3, 6, 'Live', '2020-10-15 19:11:09', '2020-10-15 19:11:09'),
(5, 1, '2020-10-16 19:55:40', 15, '000015', 3, 4, 'Live', '2020-10-16 13:55:40', '2020-10-16 13:55:40'),
(6, 4, '2020-10-16 19:57:20', 16, '000016', 3, 5, 'Live', '2020-10-16 13:57:20', '2020-10-16 13:57:20'),
(7, 1, '2020-11-01 10:37:00', 14, '000014', 3, 15, 'Live', '2020-11-01 04:37:00', '2020-11-01 04:37:00'),
(8, 1, '2020-11-01 10:37:32', 14, '000014', 3, 2, 'Live', '2020-11-01 04:37:32', '2020-11-01 04:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_payment_method`
--

DROP TABLE IF EXISTS `tbl_restaurant_payment_method`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_payment_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Methord` varchar(100) DEFAULT NULL,
  `Discription` varchar(255) DEFAULT NULL,
  `restaurant_id` varchar(100) DEFAULT NULL,
  `added_by` varchar(100) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_restaurant_payment_method`
--

INSERT INTO `tbl_restaurant_payment_method` (`id`, `Methord`, `Discription`, `restaurant_id`, `added_by`, `date`) VALUES
(1, 'Cash', 'as', '8', '8', '2021-03-13 10:03:17'),
(2, 'Paypal', 'asdf', '8', '8', '2021-03-13 10:20:46'),
(6, 'Payoneer', 'asasd', '8', '8', '2021-03-13 10:46:44'),
(9, 'Strip', 'as', '8', '8', '2021-03-14 05:32:53'),
(10, 'WAVE', 'ok', '8', '8', '2021-03-15 16:14:38'),
(11, 'Mobile pay', '2568798798', '8', '8', '2021-03-15 16:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_purchases`
--

DROP TABLE IF EXISTS `tbl_restaurant_purchases`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` double(10,2) NOT NULL,
  `grand_total` double(10,2) NOT NULL,
  `paid` double(10,2) NOT NULL,
  `due` double(10,2) NOT NULL,
  `purchase_type` enum('Direct Purchase','Purchase Request') COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_purchases_supplier_id_foreign` (`supplier_id`),
  KEY `tbl_restaurant_purchases_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_purchases`
--

INSERT INTO `tbl_restaurant_purchases` (`id`, `reference_no`, `invoice_no`, `supplier_id`, `date`, `subtotal`, `grand_total`, `paid`, `due`, `purchase_type`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, '000001', '', 2, '2020-08-20', 1089.00, 1089.00, 1000.00, 89.00, 'Direct Purchase', 3, '2', 'Deleted', '2020-08-20 12:30:57', '2020-08-20 13:07:52'),
(2, '000001', '', 2, '2020-08-20', 110889.00, 110889.00, 1000.00, 109889.00, 'Direct Purchase', 3, '2', 'Live', '2020-08-20 13:08:27', '2020-08-21 04:13:51'),
(3, '000002', '', 2, '2020-08-21', 1791249.00, 1791249.00, 10000.00, 1781249.00, 'Direct Purchase', 3, '2', 'Live', '2020-08-21 05:04:02', '2020-08-21 05:12:44'),
(4, '000003', '', 14, '2020-09-27', 948.00, 948.00, 99.00, 849.00, 'Purchase Request', 3, '2', 'Live', '2020-09-27 12:25:36', '2020-10-18 17:52:13'),
(5, '000004', '', 16, '2020-10-07', 300.00, 300.00, 100.00, 200.00, 'Purchase Request', 3, '2', 'Deleted', '2020-10-06 12:19:07', '2020-10-06 12:37:06'),
(6, '000005', '', 16, '2020-10-18', 549.00, 549.00, 100.00, 449.00, 'Purchase Request', 3, '2', 'Live', '2020-10-18 15:09:43', '2020-10-18 17:48:34'),
(7, '000006', '', 16, '2020-10-18', 300.00, 300.00, 150.00, 150.00, 'Purchase Request', 3, '2', 'Live', '2020-10-18 15:31:23', '2020-10-18 17:46:49'),
(8, '000007', '', 16, '2020-10-18', 1284.00, 1284.00, 1300.00, -16.00, 'Direct Purchase', 3, '2', 'Live', '2020-10-18 17:54:28', '2020-10-18 17:54:28'),
(9, '000008', '', 14, '2020-10-18', 420.00, 420.00, 430.00, -10.00, 'Direct Purchase', 3, '2', 'Live', '2020-10-18 17:58:41', '2020-10-18 17:58:41'),
(10, '000009', '', 16, '2020-11-30', 750.00, 750.00, 750.00, 0.00, 'Direct Purchase', 3, '2', 'Live', '2020-11-30 12:26:47', '2020-12-06 15:19:31'),
(11, '000010', '', 15, '2020-11-30', 3300.00, 3300.00, 3000.00, 300.00, 'Direct Purchase', 3, '2', 'Live', '2020-11-30 16:07:19', '2020-11-30 16:07:19'),
(12, '000011', '', 20, '2021-01-20', 7000.00, 7000.00, 7000.00, 0.00, 'Direct Purchase', 8, '10', 'Deleted', '2021-01-19 18:56:21', '2021-03-18 08:08:56'),
(16, '000015', '', 20, '2021-03-03', 2000.00, 2000.00, 1500.00, 500.00, 'Direct Purchase', 8, '10', 'Deleted', '2021-03-03 06:16:41', '2021-03-04 08:05:17'),
(17, '000016', '', 20, '2021-03-03', 500.00, 500.00, 100.00, 400.00, 'Direct Purchase', 8, '10', 'Deleted', '2021-03-03 06:22:44', '2021-03-04 06:57:49'),
(18, '000017', '', 20, '2021-03-03', 500.00, 500.00, 300.00, 200.00, 'Direct Purchase', 8, '10', 'Deleted', '2021-03-03 12:40:51', '2021-03-04 05:12:01'),
(19, '000018', '', 20, '2021-03-04', 2700.00, 2700.00, 1700.00, 1000.00, 'Direct Purchase', 8, '10', 'Deleted', '2021-03-04 07:34:11', '2021-03-04 11:59:13'),
(22, '000021', '', 21, '2021-03-15', 2000.00, 2000.00, 700.00, 0.00, 'Purchase Request', 8, '13', 'Live', '2021-03-15 06:22:31', '2021-03-15 06:22:31'),
(32, '000031', '100011', 21, '2021-03-18', 1000.00, 1000.00, 400.00, 600.00, 'Purchase Request', 8, '10', 'Deleted', '2021-03-18 09:11:08', '2021-03-18 09:24:49'),
(33, '000132', '100011', 20, '2021-03-18', 50.00, 50.00, 20.00, 30.00, 'Direct Purchase', 8, '10', 'Deleted', '2021-03-18 09:16:01', '2021-03-18 09:24:41'),
(35, '000134', '2544400', 21, '2021-03-18', 1000.00, 1000.00, 400.00, 600.00, 'Purchase Request', 8, '10', 'Deleted', '2021-03-18 09:25:45', '2021-03-18 09:45:43'),
(38, '000135', '2544401', 23, '2021-04-13', 2500.00, 2500.00, 4.00, 1330.00, 'Direct Purchase', 8, '10', 'Live', '2021-04-13 07:02:22', '2021-04-13 07:02:22'),
(39, '000136', '2544402', 23, '2021-04-13', 100.00, 100.00, 90.00, 10.00, 'Direct Purchase', 8, '10', 'Live', '2021-04-13 07:28:46', '2021-04-13 07:28:46'),
(40, '000137', '2544403', 23, '2021-04-13', 200.00, 200.00, 150.00, 50.00, 'Direct Purchase', 8, '10', 'Live', '2021-04-13 07:34:09', '2021-04-13 07:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_purchase_ingredients`
--

DROP TABLE IF EXISTS `tbl_restaurant_purchase_ingredients`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_purchase_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ingredient_id` bigint(20) UNSIGNED NOT NULL,
  `unit_price` double(10,2) NOT NULL,
  `quantity_amount` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_purchase_ingredients_ingredient_id_foreign` (`ingredient_id`),
  KEY `tbl_restaurant_purchase_ingredients_purchase_id_foreign` (`purchase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_purchase_ingredients`
--

INSERT INTO `tbl_restaurant_purchase_ingredients` (`id`, `ingredient_id`, `unit_price`, `quantity_amount`, `total`, `purchase_id`, `invoice_no`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 1, 99.00, 123.00, 12177.00, 1, '', 'Live', '2020-08-20 12:30:57', '2020-08-21 05:09:58'),
(2, 1, 99.00, 11.00, 1089.00, 2, '', 'Live', '2020-08-20 13:08:27', '2020-08-20 13:08:27'),
(3, 1, 150.00, 5.00, 750.00, 3, '', 'Live', '2020-08-21 05:04:02', '2020-10-18 17:52:13'),
(4, 1, 99.00, 2.00, 198.00, 4, '', 'Live', '2020-09-27 12:25:36', '2020-10-18 17:50:39'),
(5, 3, 150.00, 2.00, 300.00, 5, '', 'Live', '2020-10-06 12:19:07', '2020-10-06 12:19:24'),
(6, 1, 99.00, 1.00, 99.00, 6, '', 'Live', '2020-10-18 15:09:43', '2020-10-18 17:48:06'),
(7, 3, 150.00, 2.00, 300.00, 7, '', 'Live', '2020-10-18 15:31:23', '2020-10-18 17:46:49'),
(8, 1, 99.00, 6.00, 594.00, 8, '', 'Live', '2020-10-18 17:54:28', '2020-10-18 17:54:28'),
(9, 3, 150.00, 3.00, 450.00, 8, '', 'Live', '2020-10-18 17:54:28', '2020-10-18 17:54:28'),
(10, 2, 60.00, 4.00, 240.00, 8, '', 'Live', '2020-10-18 17:54:28', '2020-10-18 17:54:28'),
(11, 2, 60.00, 7.00, 420.00, 9, '', 'Live', '2020-10-18 17:58:41', '2020-10-18 17:58:41'),
(15, 2, 60.00, 55.00, 3300.00, 11, '', 'Live', '2020-11-30 16:07:19', '2020-11-30 16:07:19'),
(22, 2, 50.00, 10.00, 500.00, 10, '', 'Live', '2020-12-06 15:19:31', '2020-12-06 15:19:31'),
(23, 1, 100.00, 1.00, 100.00, 10, '', 'Live', '2020-12-06 15:19:31', '2020-12-06 15:19:31'),
(24, 3, 150.00, 1.00, 150.00, 10, '', 'Live', '2020-12-06 15:19:31', '2020-12-06 15:19:31'),
(25, 9, 50.00, 50.00, 2500.00, 12, '', 'Live', '2021-01-19 18:56:21', '2021-01-19 18:56:21'),
(26, 8, 50.00, 50.00, 2500.00, 12, '', 'Live', '2021-01-19 18:56:21', '2021-01-19 18:56:21'),
(27, 7, 10.00, 100.00, 1000.00, 12, '', 'Live', '2021-01-19 18:56:21', '2021-01-19 18:56:21'),
(28, 6, 10.00, 100.00, 1000.00, 12, '', 'Live', '2021-01-19 18:56:21', '2021-01-19 18:56:21'),
(35, 8, 50.00, 10.00, 500.00, 17, '', 'Deleted', '2021-03-03 06:22:44', '2021-03-04 06:21:07'),
(36, 7, 10.00, 10.00, 100.00, 18, '', 'Live', '2021-03-03 12:40:51', '2021-03-03 12:40:51'),
(37, 9, 50.00, 5.00, 250.00, 18, '', 'Live', '2021-03-03 12:40:52', '2021-03-03 12:40:52'),
(38, 6, 10.00, 15.00, 150.00, 18, '', 'Live', '2021-03-03 12:40:52', '2021-03-03 12:40:52'),
(39, 8, 50.00, 10.00, 500.00, 19, '', 'Deleted', '2021-03-04 07:34:11', '2021-03-04 09:52:22'),
(40, 9, 50.00, 40.00, 2000.00, 19, '', 'Live', '2021-03-04 07:34:11', '2021-03-04 07:34:11'),
(41, 7, 10.00, 10.00, 100.00, 19, '', 'Live', '2021-03-04 07:34:11', '2021-03-04 07:34:11'),
(42, 6, 10.00, 10.00, 100.00, 19, '', 'Deleted', '2021-03-04 07:34:11', '2021-03-04 07:47:48'),
(47, 6, 10.00, 50.00, 500.00, 22, '', 'Live', '2021-03-15 06:22:31', '2021-03-15 06:22:31'),
(48, 8, 50.00, 20.00, 1000.00, 22, '', 'Live', '2021-03-15 06:22:31', '2021-03-15 06:22:31'),
(49, 7, 10.00, 50.00, 500.00, 22, '', 'Live', '2021-03-15 06:22:31', '2021-03-15 06:22:31'),
(57, 9, 50.00, 20.00, 1000.00, 32, '1', 'Live', '2021-03-18 09:11:08', '2021-03-18 09:11:08'),
(58, 7, 10.00, 5.00, 50.00, 33, '1', 'Live', '2021-03-18 09:16:01', '2021-03-18 09:16:01'),
(65, 9, 50.00, 50.00, 2500.00, 38, '2', 'Live', '2021-04-13 07:02:22', '2021-04-13 07:02:22'),
(66, 6, 10.00, 10.00, 100.00, 39, '2', 'Live', '2021-04-13 07:28:46', '2021-04-13 07:28:46'),
(67, 7, 10.00, 20.00, 200.00, 40, '2', 'Live', '2021-04-13 07:34:09', '2021-04-13 07:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_sales`
--

DROP TABLE IF EXISTS `tbl_restaurant_sales`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_sales` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_no` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '000000',
  `total_items` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_total` double(10,2) DEFAULT NULL,
  `paid_amount` double(10,2) DEFAULT NULL,
  `due_total` double(10,2) DEFAULT NULL,
  `disc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disc_actual` double(10,2) DEFAULT NULL,
  `vat` double(10,2) DEFAULT NULL,
  `total_payable` double(10,2) DEFAULT NULL,
  `payment_method_id` bigint(20) UNSIGNED DEFAULT NULL,
  `close_time` time DEFAULT NULL,
  `table_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_item_discount_amount` double(10,2) NOT NULL,
  `sub_total_with_discount` double(10,2) NOT NULL,
  `sub_total_discount_amount` double(10,2) NOT NULL,
  `total_others_discount` double(10,2) NOT NULL DEFAULT '0.00',
  `total_discount_amount` double(10,2) NOT NULL,
  `delivery_charge` double(10,2) NOT NULL,
  `sub_total_discount_value` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total_discount_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_time` time NOT NULL,
  `processing_date_time` datetime NOT NULL,
  `cooking_start_time` datetime DEFAULT NULL,
  `cooking_done_time` datetime DEFAULT NULL,
  `modified` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waiter_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` tinyint(4) NOT NULL COMMENT '1=new order, 2=invoiced order, 3=closed order',
  `order_type` tinyint(4) NOT NULL COMMENT '1= dine in, \r\n2= take-away, \r\n3 = Delivery',
  `order_from` tinyint(4) DEFAULT NULL COMMENT '1= self order, \r\n2= online order, \r\n3 = 3rd party''s order ',
  `delivery_method_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `sale_vat_objects` text COLLATE utf8mb4_unicode_ci,
  `tips` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_sales_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_sales`
--

INSERT INTO `tbl_restaurant_sales` (`id`, `customer_id`, `sale_no`, `total_items`, `sub_total`, `paid_amount`, `due_total`, `disc`, `disc_actual`, `vat`, `total_payable`, `payment_method_id`, `close_time`, `table_id`, `total_item_discount_amount`, `sub_total_with_discount`, `sub_total_discount_amount`, `total_others_discount`, `total_discount_amount`, `delivery_charge`, `sub_total_discount_value`, `sub_total_discount_type`, `sale_date`, `order_time`, `processing_date_time`, `cooking_start_time`, `cooking_done_time`, `modified`, `user_id`, `waiter_id`, `restaurant_id`, `order_status`, `order_type`, `order_from`, `delivery_method_id`, `del_status`, `sale_vat_objects`, `tips`, `created_at`, `updated_at`) VALUES
(4, '29', '000004', 1, 310.00, 300.00, 10.00, '0', 0.00, 0.00, 310.00, 2, '23:10:55', 4, 10.00, 255.00, 55.00, 0.00, 65.00, 30.00, '55', 'plain', '2020-10-20', '01:12:49', '2020-10-15 16:10:00', '2020-11-12 01:53:16', '2020-11-12 02:01:26', 'Yes', '2', '3', 3, 3, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"8\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"14.25\"}]', NULL, '2020-10-14 10:10:57', '2020-11-11 20:01:26'),
(9, '29', '000009', 1, 120.00, NULL, NULL, NULL, NULL, NULL, 132.00, 2, NULL, NULL, 0.00, 120.00, 0.00, 0.00, 0.00, 12.00, '', 'plain', '2020-10-15', '20:58:44', '2020-10-17 20:58:00', '2020-11-12 02:08:12', '2020-11-12 02:08:35', 'Yes', '2', '3', 3, 3, 1, NULL, NULL, 'Live', '[]', NULL, '2020-10-15 14:58:44', '2020-11-11 20:08:35'),
(12, '13', '000012', 1, 100.00, 100.00, 0.00, NULL, NULL, NULL, 100.00, 1, '20:36:31', NULL, 0.00, 100.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-10-15', '21:22:57', '2020-10-30 21:22:00', NULL, NULL, 'Yes', '2', '3', 3, 3, 2, NULL, NULL, 'Live', '[]', NULL, '2020-10-15 15:22:57', '2020-12-19 14:36:31'),
(13, '2', '000013', 1, 100.00, 100.00, 0.00, NULL, NULL, NULL, 100.00, 1, '20:36:58', NULL, 0.00, 100.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-10-15', '21:28:18', '2020-10-15 21:28:00', NULL, NULL, 'Yes', '2', '3', 3, 3, 2, NULL, NULL, 'Live', '[]', NULL, '2020-10-15 15:28:18', '2020-12-19 14:36:58'),
(14, '28', '000014', 1, 220.00, 250.40, 0.00, NULL, NULL, NULL, 250.40, 3, '10:21:54', 6, 0.00, 220.00, 0.00, 0.00, 0.00, 22.00, '', 'plain', '2020-11-01', '10:37:32', '2020-10-30 01:10:00', '2020-11-10 22:31:50', '2020-11-11 16:37:32', 'Yes', '2', '3', 3, 3, 1, NULL, NULL, 'Live', '[{\"tax_field_id\":\"8\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"8.40\"}]', NULL, '2020-10-15 19:11:09', '2020-12-28 04:21:54'),
(15, '30', '000015', 1, 120.00, 129.00, 0.00, NULL, NULL, NULL, 129.00, 3, '21:14:43', 4, 0.00, 120.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-10-16', '19:55:40', '2020-10-17 19:55:00', '2020-11-11 13:07:22', '2020-11-11 16:38:23', 'Yes', '2', '3', 3, 3, 1, NULL, NULL, 'Live', '[{\"tax_field_id\":\"8\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"9.00\"}]', NULL, '2020-10-16 13:55:40', '2020-12-28 15:14:43'),
(16, '30', '000016', 1, 120.00, 129.00, 0.00, NULL, NULL, NULL, 129.00, 2, '20:37:15', 5, 0.00, 120.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-10-16', '19:57:20', '2020-10-16 19:57:00', '2020-11-11 13:19:29', '2020-11-12 01:55:05', 'Yes', '2', '3', 3, 3, 1, NULL, NULL, 'Live', '[{\"tax_field_id\":\"8\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"9.00\"}]', NULL, '2020-10-16 13:57:20', '2020-12-19 14:37:15'),
(17, '30', '000017', 1, 100.00, 107.50, 0.00, NULL, NULL, NULL, 107.50, 3, '21:30:16', NULL, 0.00, 100.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-10-16', '19:58:41', '2020-10-16 19:58:00', '2020-11-12 01:58:22', '2020-11-12 02:07:50', 'Yes', '2', '3', 3, 3, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"8\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"7.50\"}]', NULL, '2020-10-16 13:58:41', '2020-12-28 15:30:16'),
(18, '29', '000018', 1, 150.00, 131.75, 0.00, NULL, NULL, NULL, 131.75, 2, '21:58:37', NULL, 10.00, 95.00, 55.00, 0.00, 65.00, 30.00, '55', 'plain', '2020-10-20', '01:20:51', '2020-10-19 21:50:00', NULL, NULL, 'Yes', '2', '3', 3, 3, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"8\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"6.75\"}]', NULL, '2020-10-19 15:50:48', '2020-12-28 15:58:37'),
(21, '29', '000021', 2, 302.00, NULL, NULL, NULL, NULL, NULL, 291.25, NULL, NULL, NULL, 10.00, 247.00, 55.00, 0.00, 65.00, 30.00, '55', 'plain', '2020-10-20', '19:30:59', '2020-10-15 16:10:00', NULL, NULL, 'Yes', '2', '3', 3, 1, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"8\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"14.25\"}]', NULL, '2020-10-19 17:52:03', '2020-10-20 13:30:59'),
(22, '29', '000022', 1, 150.00, 131.75, 0.00, NULL, NULL, NULL, 131.75, 3, '16:32:35', NULL, 10.00, 95.00, 55.00, 0.00, 65.00, 30.00, '55', 'plain', '2020-10-20', '01:21:33', '2020-10-15 16:10:00', NULL, NULL, 'Yes', '2', '3', 3, 3, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"8\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"6.75\"}]', NULL, '2020-10-19 17:53:39', '2020-12-28 10:32:35'),
(23, '29', '000023', 1, 310.00, NULL, NULL, NULL, NULL, NULL, 299.25, NULL, NULL, NULL, 10.00, 255.00, 55.00, 0.00, 65.00, 30.00, '55', 'plain', '2020-12-27', '15:58:26', '2020-10-15 16:10:00', NULL, NULL, 'Yes', '2', '3', 3, 1, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"8\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"14.25\"}]', NULL, '2020-10-19 17:55:50', '2020-12-27 09:58:26'),
(24, '29', '000024', 1, 150.00, NULL, NULL, NULL, NULL, NULL, 131.75, NULL, NULL, NULL, 10.00, 95.00, 55.00, 0.00, 65.00, 30.00, '55', 'plain', '2021-01-04', '17:13:42', '2020-10-15 16:10:00', NULL, NULL, 'Yes', '2', '3', 3, 1, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"8\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"6.75\"}]', NULL, '2020-10-19 17:57:53', '2021-01-04 11:13:42'),
(25, '30', '000025', 2, 190.00, 197.00, 0.00, NULL, NULL, NULL, 197.00, 3, '11:07:48', NULL, 0.00, 190.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-10-23', '01:34:09', '2020-10-20 01:26:00', NULL, '2020-11-16 00:10:23', 'Yes', '2', '3', 3, 3, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"8\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"7.00\"}]', 3.00, '2020-10-19 19:26:42', '2020-12-29 05:07:49'),
(26, '26', '000026', 1, 110.00, 117.70, 0.00, NULL, NULL, NULL, 117.70, NULL, '10:50:38', NULL, 0.00, 110.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-10-20', '01:29:41', '2020-10-21 01:29:00', '2020-11-11 12:26:22', '2020-11-11 16:36:53', 'Yes', '2', '3', 3, 1, 3, NULL, NULL, 'Live', '[{\"tax_field_id\":\"8\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"7.70\"}]', NULL, '2020-10-19 19:29:13', '2020-12-29 04:50:38'),
(27, '25', '000027', 1, 260.00, NULL, NULL, NULL, NULL, NULL, 270.00, NULL, NULL, NULL, 0.00, 260.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2021-01-21', '23:47:51', '2020-10-24 20:00:00', NULL, NULL, 'Yes', '2', '3', 3, 1, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', NULL, '2020-10-20 14:00:09', '2021-01-21 17:47:51'),
(28, '30', '000028', 3, 490.00, 510.00, 0.00, NULL, NULL, NULL, 510.00, 1, '04:19:49', NULL, 0.00, 490.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-10-23', '01:43:24', '2020-10-23 01:43:00', NULL, NULL, 'No', '2', '3', 3, 3, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"20.00\"}]', NULL, '2020-10-22 19:43:24', '2020-12-18 22:19:49'),
(29, '30', '000029', 3, 490.00, 510.00, 0.00, NULL, NULL, NULL, 510.00, 3, '11:00:39', NULL, 0.00, 490.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-10-23', '01:44:01', '2020-10-23 01:43:00', NULL, NULL, 'No', '2', '3', 3, 3, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"20.00\"}]', NULL, '2020-10-22 19:44:01', '2020-12-29 05:00:39'),
(30, '30', '000030', 1, 200.00, NULL, NULL, NULL, NULL, NULL, 210.00, NULL, NULL, NULL, 0.00, 200.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-10-26', '00:53:05', '2020-10-26 00:51:47', NULL, NULL, 'Yes', '2', '3', 8, 1, 3, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', NULL, '2021-04-01 14:12:54', '2020-10-25 18:53:05'),
(32, '30', '000032', 2, 310.00, NULL, NULL, NULL, NULL, NULL, 310.00, NULL, NULL, NULL, 0.00, 310.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-11-12', '04:15:22', '2020-10-26 05:00:00', NULL, NULL, 'Yes', '2', '3', 8, 1, 3, NULL, NULL, 'Live', '[]', NULL, '2020-10-25 18:54:13', '2020-11-11 22:15:22'),
(33, '30', '000033', 2, 290.00, NULL, NULL, NULL, NULL, NULL, 300.00, NULL, NULL, NULL, 0.00, 290.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-11-01', '19:36:51', '2020-11-01 16:24:00', NULL, NULL, 'Yes', '2', '3', 8, 1, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', NULL, '2020-11-01 10:24:55', '2020-11-01 13:36:51'),
(34, '30', '000034', 1, 250.00, NULL, NULL, NULL, NULL, NULL, 259.50, NULL, NULL, NULL, 10.00, 250.00, 0.00, 0.00, 10.00, 0.00, '', 'plain', '2021-01-04', '17:15:21', '2020-11-01 15:34:00', NULL, NULL, 'Yes', '2', '3', 8, 2, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"9.50\"}]', NULL, '2020-11-01 10:35:09', '2021-01-04 11:15:21'),
(35, '30', '000035', 2, 190.00, 190.00, 0.00, NULL, NULL, NULL, 190.00, 3, '21:43:17', NULL, 0.00, 190.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-11-01', '19:55:52', '2020-11-01 20:00:00', NULL, NULL, 'No', '2', '3', 8, 3, 2, NULL, NULL, 'Live', '[]', NULL, '2021-04-01 13:55:52', '2020-12-28 15:43:17'),
(36, '30', '000036', 1, 260.00, 270.00, 0.00, NULL, NULL, NULL, 270.00, 3, '22:12:52', NULL, 0.00, 260.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-11-03', '20:42:10', '2020-11-03 20:42:00', NULL, NULL, 'No', '2', '3', 8, 3, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', NULL, '2021-04-03 14:42:10', '2020-12-28 16:12:52'),
(37, '29', '000037', 1, 120.00, NULL, NULL, NULL, NULL, NULL, 132.00, NULL, NULL, 5, 0.00, 120.00, 0.00, 0.00, 0.00, 12.00, '', 'plain', '2021-01-04', '17:01:43', '2020-11-04 16:48:00', '2020-11-11 21:37:11', '2020-11-11 21:45:14', 'Yes', '2', '3', 8, 1, 1, NULL, NULL, 'Live', '[]', NULL, '2021-04-03 10:42:50', '2021-01-04 11:01:43'),
(38, '28', '000038', 1, 220.00, 231.00, 0.00, NULL, NULL, NULL, 231.00, 1, '16:02:26', 3, 0.00, 220.00, 0.00, 0.00, 0.00, 22.00, '', 'plain', '2020-11-04', '19:06:02', '2020-11-04 19:11:00', '2020-11-11 16:59:43', '2020-11-11 17:01:24', 'No', '2', '3', 3, 3, 1, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"11.00\"}]', NULL, '2020-11-04 13:06:02', '2020-12-27 10:02:26'),
(39, '30', '000039', 1, 90.00, NULL, NULL, NULL, NULL, NULL, 90.00, NULL, NULL, NULL, 0.00, 90.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-11-04', '19:35:58', '2020-11-04 19:35:00', NULL, NULL, 'No', '2', '3', 3, 1, 2, NULL, NULL, 'Live', '[]', NULL, '2020-11-04 13:35:58', '2020-11-04 13:35:58'),
(40, '30', '000040', 1, 280.00, 291.00, 0.00, NULL, NULL, NULL, 291.00, 3, '16:37:13', 5, 0.00, 280.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-11-10', '15:59:39', '2020-11-10 15:59:00', '2020-11-11 17:55:31', '2020-11-11 19:30:10', 'No', '2', '3', 3, 3, 1, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"11.00\"}]', NULL, '2020-11-10 09:59:39', '2020-12-28 10:37:13'),
(41, '30', '000041', 1, 400.00, NULL, NULL, NULL, NULL, NULL, 420.00, NULL, NULL, NULL, 0.00, 400.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-11-12', '03:46:21', '2020-11-12 02:34:00', NULL, NULL, 'Yes', '2', '3', 3, 1, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"20.00\"}]', NULL, '2020-11-11 21:34:57', '2020-11-11 21:46:21'),
(42, '30', '000042', 1, 220.00, NULL, NULL, NULL, NULL, NULL, 253.00, NULL, NULL, 15, 0.00, 220.00, 0.00, 0.00, 0.00, 22.00, '', 'plain', '2021-01-04', '17:17:07', '2020-11-15 18:21:00', NULL, NULL, 'Yes', '2', '6', 3, 1, 1, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"11.00\"}]', NULL, '2020-11-15 12:22:00', '2021-01-04 11:17:07'),
(43, '27', '000043', 2, 600.00, NULL, NULL, NULL, NULL, NULL, 630.00, NULL, NULL, NULL, 0.00, 600.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2021-01-03', '00:41:32', '2020-11-26 04:56:05', NULL, NULL, 'Yes', '2', '6', 3, 1, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"30.00\"}]', NULL, '2020-11-15 15:51:43', '2021-01-02 18:41:32'),
(44, '28', '000044', 1, 260.00, NULL, NULL, NULL, NULL, NULL, 270.00, NULL, NULL, NULL, 0.00, 260.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-11-15', '22:15:08', '2020-11-15 21:53:23', NULL, NULL, 'Yes', '2', '6', 3, 1, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', NULL, '2020-11-15 16:14:50', '2020-11-15 16:15:08'),
(45, '30', '000045', 3, 390.00, NULL, NULL, NULL, NULL, NULL, 400.00, NULL, NULL, NULL, 0.00, 390.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-11-16', '01:54:31', '2020-11-17 20:06:03', '2020-12-27 15:55:21', '2020-12-27 15:57:37', 'No', '2', '3', 3, 1, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', NULL, '2020-11-15 19:54:31', '2020-12-27 09:57:37'),
(46, '30', '000046', 1, 200.00, 210.00, 0.00, NULL, NULL, NULL, 210.00, 3, '22:10:16', NULL, 0.00, 200.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-12-18', '22:49:23', '2020-12-18 22:49:16', NULL, NULL, 'No', '2', '3', 3, 3, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', NULL, '2020-12-18 16:49:23', '2020-12-28 16:10:16'),
(47, '30', '000047', 1, 200.00, NULL, NULL, NULL, NULL, NULL, 210.00, NULL, NULL, NULL, 0.00, 200.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-12-18', '22:51:54', '2020-12-18 22:51:50', NULL, NULL, 'No', '2', '3', 3, 1, 3, NULL, '2', 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', NULL, '2020-12-18 16:51:54', '2020-12-18 16:51:54'),
(48, '30', '000048', 1, 200.00, NULL, NULL, NULL, NULL, NULL, 210.00, NULL, NULL, NULL, 0.00, 200.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-12-19', '00:34:26', '2020-12-19 00:34:21', NULL, NULL, 'No', '2', '3', 3, 1, 3, NULL, '1', 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', NULL, '2020-12-18 18:34:26', '2020-12-18 18:34:26'),
(49, '30', '000049', 1, 200.00, NULL, NULL, NULL, NULL, NULL, 210.00, NULL, NULL, NULL, 0.00, 200.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-12-19', '00:40:49', '2020-12-19 00:40:42', NULL, NULL, 'No', '2', '3', 3, 1, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', NULL, '2020-12-18 18:40:49', '2020-12-18 18:40:49'),
(50, '28', '000050', 1, 90.00, 90.00, 0.00, NULL, NULL, NULL, 90.00, 1, '10:36:57', NULL, 0.00, 90.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-12-19', '00:43:15', '2020-12-19 00:43:10', NULL, NULL, 'No', '2', '6', 3, 3, 2, NULL, NULL, 'Live', '[]', 10.00, '2020-12-18 18:43:15', '2020-12-29 04:36:57'),
(51, '29', '000051', 2, 290.00, NULL, NULL, NULL, NULL, NULL, 300.00, NULL, NULL, NULL, 0.00, 290.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2020-12-31', '12:18:36', '2020-12-31 12:18:22', NULL, NULL, 'No', '3', '7', 3, 1, 3, NULL, '2', 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', NULL, '2020-12-31 06:18:36', '2020-12-31 06:18:36'),
(52, '1', '000052', 1, 120.00, NULL, NULL, NULL, NULL, NULL, 120.00, NULL, NULL, 6, 0.00, 120.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2021-01-01', '23:34:54', '2021-01-01 23:34:42', NULL, NULL, 'No', '2', '7', 3, 1, 1, NULL, NULL, 'Live', '[]', NULL, '2021-01-01 17:34:54', '2021-01-01 17:34:54'),
(53, '32', '000053', 3, 402.00, NULL, NULL, NULL, NULL, NULL, 402.00, NULL, NULL, 5, 10.00, 402.00, 0.00, 0.00, 10.00, 40.20, '', 'plain', '2021-01-03', '23:24:07', '2021-01-03 22:31:37', NULL, NULL, 'Yes', '2', '3', 3, 1, 1, NULL, NULL, 'Live', '[]', NULL, '2021-01-03 16:31:42', '2021-01-03 17:24:07'),
(54, '1', '000054', 2, 240.00, NULL, NULL, NULL, NULL, NULL, 248.40, NULL, NULL, 3, 0.00, 240.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2021-01-04', '11:37:56', '2021-01-04 11:34:09', NULL, NULL, 'Yes', '2', '7', 3, 1, 1, NULL, NULL, 'Live', '[{\"tax_field_id\":\"33\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"8.40\"}]', NULL, '2021-01-04 05:34:26', '2021-01-04 05:37:56'),
(55, '1', '000055', 1, 120.00, NULL, NULL, NULL, NULL, NULL, 132.00, NULL, NULL, 3, 0.00, 120.00, 0.00, 0.00, 0.00, 12.00, '', 'plain', '2021-01-04', '17:21:56', '2021-01-04 13:05:06', NULL, NULL, 'Yes', '2', '7', 3, 1, 1, NULL, NULL, 'Live', '[]', NULL, '2021-01-04 07:05:10', '2021-01-04 11:21:56'),
(56, '1', '000056', 1, 340.00, NULL, NULL, NULL, NULL, NULL, 340.00, NULL, NULL, NULL, 0.00, 340.00, 0.00, 0.00, 0.00, 0.00, '0', 'plain', '2021-01-16', '01:28:32', '2021-01-14 23:58:15', NULL, NULL, 'No', '2', '7', 3, 1, 3, 2, NULL, 'Live', NULL, NULL, '2021-01-15 19:28:32', '2021-01-15 19:28:32'),
(57, '1', '000057', 1, 110.00, NULL, NULL, NULL, NULL, NULL, 110.00, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0', 'plain', '2021-01-16', '01:38:36', '2021-01-15 03:19:26', NULL, NULL, 'No', '2', '7', 3, 1, 3, 2, NULL, 'Live', NULL, NULL, '2021-01-15 19:38:36', '2021-01-15 19:38:36'),
(58, '32', '000058', 1, 170.00, NULL, NULL, NULL, NULL, NULL, 170.00, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0', 'plain', '2021-01-16', '01:40:14', '2021-01-15 02:38:55', NULL, NULL, 'No', '2', '7', 3, 1, 3, 2, NULL, 'Live', '[]', NULL, '2021-01-15 19:40:14', '2021-01-15 19:40:14'),
(59, '33', '000059', 1, 110.00, NULL, NULL, NULL, NULL, NULL, 110.00, NULL, NULL, NULL, 0.00, 110.00, 0.00, 0.00, 0.00, 0.00, '0', 'plain', '2021-01-16', '03:14:31', '2021-01-15 01:57:29', NULL, NULL, 'Yes', '2', '7', 3, 1, 3, 2, '0', 'Live', '[]', NULL, '2021-01-15 21:12:52', '2021-01-15 21:14:31'),
(60, '1', '000060', 1, 100.00, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, NULL, NULL, 0.00, 100.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2021-01-21', '21:28:45', '2021-01-21 21:28:32', NULL, NULL, 'No', '2', '7', 3, 1, 2, NULL, NULL, 'Live', '[]', NULL, '2021-01-21 15:28:45', '2021-01-21 15:28:45'),
(61, '1', '000061', 1, 120.00, NULL, NULL, NULL, NULL, NULL, 120.00, NULL, NULL, 6, 0.00, 120.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2021-01-21', '21:29:09', '2021-01-21 21:28:32', NULL, NULL, 'No', '2', '7', 3, 1, 1, NULL, NULL, 'Live', '[]', NULL, '2021-01-21 15:29:09', '2021-01-21 15:29:09'),
(62, '30', '000062', 2, 200.00, NULL, NULL, NULL, NULL, NULL, 200.00, NULL, NULL, NULL, 0.00, 200.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2021-01-21', '21:30:24', '2021-01-21 21:35:04', NULL, NULL, 'No', '2', '7', 3, 1, 3, NULL, '0', 'Live', '[]', NULL, '2021-01-21 15:30:24', '2021-01-21 15:30:24'),
(63, '1', '000063', 1, 220.00, NULL, NULL, NULL, NULL, NULL, 231.00, NULL, NULL, 15, 0.00, 220.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2021-01-21', '21:40:32', '2021-01-21 21:40:32', NULL, NULL, 'No', '2', '7', 3, 1, 1, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"11.00\"}]', NULL, '2021-01-21 15:40:32', '2021-01-21 15:40:32'),
(64, '1', '000064', 2, 290.00, NULL, NULL, NULL, NULL, NULL, 300.00, NULL, NULL, NULL, 0.00, 290.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2021-01-21', '21:40:51', '2021-01-21 21:42:45', NULL, NULL, 'No', '2', '7', 3, 1, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', NULL, '2021-01-21 15:40:51', '2021-01-21 15:40:51'),
(65, '1', '000065', 1, 120.00, NULL, NULL, NULL, NULL, NULL, 120.00, NULL, NULL, 3, 0.00, 120.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2021-01-21', '23:50:40', '2021-01-21 23:50:40', NULL, NULL, 'No', '2', '7', 3, 1, 1, NULL, NULL, 'Live', '[]', NULL, '2021-01-21 17:50:40', '2021-01-21 17:50:40'),
(66, '1', '000066', 4, 490.00, NULL, NULL, NULL, NULL, NULL, 524.30, NULL, NULL, NULL, 0.00, 490.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2021-01-23', '01:09:13', '2021-01-23 01:09:07', NULL, NULL, 'No', '2', '7', 3, 1, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"51\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"34.30\"}]', NULL, '2021-01-22 19:09:13', '2021-01-22 19:09:13'),
(67, '35', '000067', 1, 100.00, NULL, NULL, NULL, NULL, NULL, 97.00, NULL, NULL, NULL, 0.00, 90.00, 0.00, 10.00, 10.00, 0.00, '', 'plain', '2021-01-24', '21:41:25', '2021-01-24 21:41:22', NULL, NULL, 'No', '2', '7', 3, 1, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"51\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"7.00\"}]', NULL, '2021-01-24 15:41:25', '2021-01-24 15:41:25'),
(68, '1', '000068', 2, 402.00, NULL, NULL, NULL, NULL, NULL, 415.30, NULL, NULL, NULL, 0.00, 402.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2021-01-25', '00:18:07', '2021-01-25 00:18:04', NULL, NULL, 'No', '2', '7', 3, 1, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"51\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"13.30\"}]', NULL, '2021-01-24 18:18:07', '2021-01-24 18:18:07'),
(69, '38', '000069', 1, 100.00, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, NULL, NULL, 0.00, 100.00, 0.00, 0.00, 0.00, 0.00, '0', 'plain', '2021-01-27', '00:32:58', '2021-01-17 00:19:44', NULL, NULL, 'No', '2', '7', 3, 1, 2, 2, NULL, 'Live', NULL, NULL, '2021-01-26 18:32:58', '2021-01-26 18:32:58'),
(70, '41', '000070', 3, 762.00, NULL, NULL, NULL, NULL, NULL, 762.00, NULL, NULL, NULL, 0.00, 762.00, 0.00, 0.00, 0.00, 0.00, '0', 'plain', '2021-01-27', '01:05:42', '2021-01-15 02:35:45', NULL, NULL, 'No', '2', '7', 3, 1, 3, 2, NULL, 'Live', '[]', NULL, '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(71, '42', '000071', 3, 762.00, NULL, NULL, NULL, NULL, NULL, 762.00, NULL, NULL, NULL, 0.00, 762.00, 0.00, 0.00, 0.00, 0.00, '0', 'plain', '2021-01-27', '01:11:41', '2021-01-15 02:35:45', NULL, NULL, 'No', '2', '7', 3, 1, 3, 2, NULL, 'Live', NULL, NULL, '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(72, '43', '000072', 1, 110.00, NULL, NULL, NULL, NULL, NULL, 110.00, NULL, NULL, NULL, 0.00, 110.00, 0.00, 0.00, 0.00, 0.00, '0', 'plain', '2021-01-27', '01:13:57', '2021-01-15 02:15:41', NULL, NULL, 'No', '2', '7', 3, 1, 3, 2, NULL, 'Live', NULL, NULL, '2021-01-26 19:13:57', '2021-01-26 19:13:57'),
(73, '44', '000073', 1, 100.00, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, NULL, NULL, 0.00, 100.00, 0.00, 0.00, 0.00, 0.00, '0', 'plain', '2021-01-27', '01:16:30', '2021-01-17 00:19:44', NULL, NULL, 'No', '2', '7', 3, 1, 2, 2, NULL, 'Live', NULL, NULL, '2021-01-26 19:16:30', '2021-01-26 19:16:30'),
(74, '38', '000074', 1, 100.00, NULL, NULL, NULL, NULL, NULL, 107.00, NULL, NULL, NULL, 0.00, 100.00, 0.00, 0.00, 0.00, 0.00, '', 'plain', '2021-01-27', '01:18:13', '2021-01-27 01:18:05', NULL, NULL, 'No', '2', '7', 3, 1, 2, NULL, NULL, 'Live', '[{\"tax_field_id\":\"51\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"7.00\"}]', NULL, '2021-01-26 19:18:13', '2021-01-26 19:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_sales_consumptions`
--

DROP TABLE IF EXISTS `tbl_restaurant_sales_consumptions`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_sales_consumptions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sales_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_status` tinyint(4) NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_sales_consumptions_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_sales_consumptions`
--

INSERT INTO `tbl_restaurant_sales_consumptions` (`id`, `sales_id`, `order_status`, `user_id`, `restaurant_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2', 3, 'Live', '2020-10-14 09:57:27', '2020-10-14 09:57:27'),
(2, 2, 1, '2', 3, 'Live', '2020-10-14 09:59:52', '2020-10-14 09:59:52'),
(3, 3, 1, '2', 3, 'Live', '2020-10-14 10:01:48', '2020-10-14 10:01:48'),
(9, 9, 1, '2', 3, 'Live', '2020-10-15 14:58:44', '2020-10-15 14:58:44'),
(12, 13, 1, '2', 3, 'Live', '2020-10-15 15:28:18', '2020-10-15 15:28:18'),
(14, 15, 1, '2', 3, 'Live', '2020-10-16 13:55:40', '2020-10-16 13:55:40'),
(15, 16, 1, '2', 3, 'Live', '2020-10-16 13:57:20', '2020-10-16 13:57:20'),
(16, 17, 1, '2', 3, 'Live', '2020-10-16 13:58:41', '2020-10-16 13:58:41'),
(18, 19, 1, '2', 3, 'Live', '2020-10-19 17:16:50', '2020-10-19 17:16:50'),
(19, 20, 1, '2', 3, 'Live', '2020-10-19 17:17:03', '2020-10-19 17:17:03'),
(24, 4, 1, '2', 3, 'Live', '2020-10-19 19:12:49', '2020-10-19 19:12:49'),
(29, 18, 1, '2', 3, 'Live', '2020-10-19 19:20:51', '2020-10-19 19:20:51'),
(30, 22, 1, '2', 3, 'Live', '2020-10-19 19:21:33', '2020-10-19 19:21:33'),
(34, 26, 1, '2', 3, 'Live', '2020-10-19 19:29:41', '2020-10-19 19:29:41'),
(38, 21, 1, '2', 3, 'Live', '2020-10-20 13:30:59', '2020-10-20 13:30:59'),
(45, 25, 1, '2', 3, 'Live', '2020-10-22 19:34:09', '2020-10-22 19:34:09'),
(46, 28, 1, '2', 3, 'Live', '2020-10-22 19:43:24', '2020-10-22 19:43:24'),
(47, 29, 1, '2', 3, 'Live', '2020-10-22 19:44:01', '2020-10-22 19:44:01'),
(51, 30, 1, '2', 3, 'Live', '2020-10-25 18:53:05', '2020-10-25 18:53:05'),
(54, 14, 1, '2', 3, 'Live', '2020-11-01 04:37:32', '2020-11-01 04:37:32'),
(58, 33, 1, '2', 3, 'Live', '2020-11-01 13:36:51', '2020-11-01 13:36:51'),
(59, 35, 1, '2', 3, 'Live', '2020-11-01 13:55:52', '2020-11-01 13:55:52'),
(60, 36, 1, '2', 3, 'Live', '2020-11-03 14:42:10', '2020-11-03 14:42:10'),
(62, 38, 1, '2', 3, 'Live', '2020-11-04 13:06:02', '2020-11-04 13:06:02'),
(63, 39, 1, '2', 3, 'Live', '2020-11-04 13:35:58', '2020-11-04 13:35:58'),
(64, 40, 1, '2', 3, 'Live', '2020-11-10 09:59:39', '2020-11-10 09:59:39'),
(70, 41, 1, '2', 3, 'Live', '2020-11-11 21:46:21', '2020-11-11 21:46:21'),
(71, 32, 1, '2', 3, 'Live', '2020-11-11 22:15:22', '2020-11-11 22:15:22'),
(75, 44, 1, '2', 3, 'Live', '2020-11-15 16:15:08', '2020-11-15 16:15:08'),
(76, 45, 1, '2', 3, 'Live', '2020-11-15 19:54:31', '2020-11-15 19:54:31'),
(77, 46, 1, '2', 3, 'Live', '2020-12-18 16:49:23', '2020-12-18 16:49:23'),
(78, 47, 1, '2', 3, 'Live', '2020-12-18 16:51:54', '2020-12-18 16:51:54'),
(79, 48, 1, '2', 3, 'Live', '2020-12-18 18:34:26', '2020-12-18 18:34:26'),
(80, 49, 1, '2', 3, 'Live', '2020-12-18 18:40:49', '2020-12-18 18:40:49'),
(81, 50, 1, '2', 3, 'Live', '2020-12-18 18:43:15', '2020-12-18 18:43:15'),
(82, 23, 1, '2', 3, 'Live', '2020-12-27 09:58:26', '2020-12-27 09:58:26'),
(83, 51, 1, '3', 3, 'Live', '2020-12-31 06:18:36', '2020-12-31 06:18:36'),
(84, 52, 1, '2', 3, 'Live', '2021-01-01 17:34:54', '2021-01-01 17:34:54'),
(85, 43, 1, '2', 3, 'Live', '2021-01-02 18:41:32', '2021-01-02 18:41:32'),
(100, 53, 1, '2', 3, 'Live', '2021-01-03 17:24:07', '2021-01-03 17:24:07'),
(102, 54, 1, '2', 3, 'Live', '2021-01-04 05:37:56', '2021-01-04 05:37:56'),
(125, 37, 1, '2', 3, 'Live', '2021-01-04 11:01:43', '2021-01-04 11:01:43'),
(128, 24, 1, '2', 3, 'Live', '2021-01-04 11:13:42', '2021-01-04 11:13:42'),
(129, 34, 1, '2', 3, 'Live', '2021-01-04 11:15:21', '2021-01-04 11:15:21'),
(132, 42, 1, '2', 3, 'Live', '2021-01-04 11:17:07', '2021-01-04 11:17:07'),
(133, 55, 1, '2', 3, 'Live', '2021-01-04 11:21:56', '2021-01-04 11:21:56'),
(134, 56, 1, '2', 3, 'Live', '2021-01-15 19:28:32', '2021-01-15 19:28:32'),
(135, 57, 1, '2', 3, 'Live', '2021-01-15 19:38:36', '2021-01-15 19:38:36'),
(136, 58, 1, '2', 3, 'Live', '2021-01-15 19:40:14', '2021-01-15 19:40:14'),
(139, 59, 1, '2', 3, 'Live', '2021-01-15 21:14:31', '2021-01-15 21:14:31'),
(140, 60, 1, '2', 3, 'Live', '2021-01-21 15:28:45', '2021-01-21 15:28:45'),
(141, 61, 1, '2', 3, 'Live', '2021-01-21 15:29:09', '2021-01-21 15:29:09'),
(142, 62, 1, '2', 3, 'Live', '2021-01-21 15:30:24', '2021-01-21 15:30:24'),
(143, 63, 1, '2', 3, 'Live', '2021-01-21 15:40:32', '2021-01-21 15:40:32'),
(144, 64, 1, '2', 3, 'Live', '2021-01-21 15:40:51', '2021-01-21 15:40:51'),
(145, 27, 1, '2', 3, 'Live', '2021-01-21 17:47:51', '2021-01-21 17:47:51'),
(146, 65, 1, '2', 3, 'Live', '2021-01-21 17:50:40', '2021-01-21 17:50:40'),
(147, 66, 1, '2', 3, 'Live', '2021-01-22 19:09:13', '2021-01-22 19:09:13'),
(148, 67, 1, '2', 3, 'Live', '2021-01-24 15:41:25', '2021-01-24 15:41:25'),
(149, 68, 1, '2', 3, 'Live', '2021-01-24 18:18:07', '2021-01-24 18:18:07'),
(150, 69, 1, '2', 3, 'Live', '2021-01-26 18:32:58', '2021-01-26 18:32:58'),
(151, 70, 1, '2', 3, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(152, 71, 1, '2', 3, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(153, 72, 1, '2', 3, 'Live', '2021-01-26 19:13:57', '2021-01-26 19:13:57'),
(154, 73, 1, '2', 3, 'Live', '2021-01-26 19:16:30', '2021-01-26 19:16:30'),
(155, 74, 1, '2', 3, 'Live', '2021-01-26 19:18:13', '2021-01-26 19:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_sales_consumptions_of_menus`
--

DROP TABLE IF EXISTS `tbl_restaurant_sales_consumptions_of_menus`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_sales_consumptions_of_menus` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ingredient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `consumption` double(10,2) DEFAULT NULL,
  `sale_consumption_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sales_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  `food_menu_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_sales_consumptions_of_menus_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=232 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_sales_consumptions_of_menus`
--

INSERT INTO `tbl_restaurant_sales_consumptions_of_menus` (`id`, `ingredient_id`, `consumption`, `sale_consumption_id`, `sales_id`, `order_status`, `food_menu_id`, `user_id`, `restaurant_id`, `del_status`, `created_at`, `updated_at`) VALUES
(9, 1, 1.00, 12, 13, 1, 4, '2', 3, 'Live', '2020-10-15 15:28:18', '2020-10-15 15:28:18'),
(11, 1, 1.00, 14, 15, 1, 4, '2', 3, 'Live', '2020-10-16 13:55:40', '2020-10-16 13:55:40'),
(12, 1, 1.00, 15, 16, 1, 4, '2', 3, 'Live', '2020-10-16 13:57:20', '2020-10-16 13:57:20'),
(13, 1, 1.00, 16, 17, 1, 4, '2', 3, 'Live', '2020-10-16 13:58:41', '2020-10-16 13:58:41'),
(15, 2, 5.00, 18, 19, 1, 9, '2', 3, 'Live', '2020-10-19 17:16:50', '2020-10-19 17:16:50'),
(16, 2, 5.00, 19, 20, 1, 9, '2', 3, 'Live', '2020-10-19 17:17:03', '2020-10-19 17:17:03'),
(21, 1, 22.00, 24, 4, 1, 3, '2', 3, 'Live', '2020-10-19 19:12:49', '2020-10-19 19:12:49'),
(26, 1, 11.00, 29, 18, 1, 3, '2', 3, 'Live', '2020-10-19 19:20:51', '2020-10-19 19:20:51'),
(27, 1, 11.00, 30, 22, 1, 3, '2', 3, 'Live', '2020-10-19 19:21:33', '2020-10-19 19:21:33'),
(31, 1, 11.00, 34, 26, 1, 5, '2', 3, 'Live', '2020-10-19 19:29:41', '2020-10-19 19:29:41'),
(37, 1, 11.00, 38, 21, 1, 3, '2', 3, 'Live', '2020-10-20 13:30:59', '2020-10-20 13:30:59'),
(38, 1, 11.00, 38, 21, 1, 3, '2', 3, 'Live', '2020-10-20 13:30:59', '2020-10-20 13:30:59'),
(46, 1, 11.00, 45, 25, 1, 5, '2', 3, 'Live', '2020-10-22 19:34:09', '2020-10-22 19:34:09'),
(47, 3, 1.00, 45, 25, 1, 6, '2', 3, 'Live', '2020-10-22 19:34:09', '2020-10-22 19:34:09'),
(48, 1, 1.00, 45, 25, 1, 6, '2', 3, 'Live', '2020-10-22 19:34:09', '2020-10-22 19:34:09'),
(53, 3, 1.00, 51, 30, 1, 8, '2', 3, 'Live', '2020-10-25 18:53:05', '2020-10-25 18:53:05'),
(54, 1, 2.00, 51, 30, 1, 8, '2', 3, 'Live', '2020-10-25 18:53:05', '2020-10-25 18:53:05'),
(59, 1, 11.00, 54, 14, 1, 5, '2', 3, 'Live', '2020-11-01 04:37:32', '2020-11-01 04:37:32'),
(66, 3, 1.00, 58, 33, 1, 8, '2', 3, 'Live', '2020-11-01 13:36:51', '2020-11-01 13:36:51'),
(67, 1, 2.00, 58, 33, 1, 8, '2', 3, 'Live', '2020-11-01 13:36:51', '2020-11-01 13:36:51'),
(68, 2, 5.00, 58, 33, 1, 9, '2', 3, 'Live', '2020-11-01 13:36:51', '2020-11-01 13:36:51'),
(69, 1, 11.00, 59, 35, 1, 3, '2', 3, 'Live', '2020-11-01 13:55:52', '2020-11-01 13:55:52'),
(70, 2, 5.00, 59, 35, 1, 9, '2', 3, 'Live', '2020-11-01 13:55:52', '2020-11-01 13:55:52'),
(71, 3, 1.00, 60, 36, 1, 8, '2', 3, 'Live', '2020-11-03 14:42:10', '2020-11-03 14:42:10'),
(72, 1, 2.00, 60, 36, 1, 8, '2', 3, 'Live', '2020-11-03 14:42:10', '2020-11-03 14:42:10'),
(74, 3, 1.00, 62, 38, 1, 8, '2', 3, 'Live', '2020-11-04 13:06:02', '2020-11-04 13:06:02'),
(75, 1, 2.00, 62, 38, 1, 8, '2', 3, 'Live', '2020-11-04 13:06:02', '2020-11-04 13:06:02'),
(76, 2, 5.00, 63, 39, 1, 9, '2', 3, 'Live', '2020-11-04 13:35:58', '2020-11-04 13:35:58'),
(77, 3, 1.00, 64, 40, 1, 8, '2', 3, 'Live', '2020-11-10 09:59:39', '2020-11-10 09:59:39'),
(78, 1, 2.00, 64, 40, 1, 8, '2', 3, 'Live', '2020-11-10 09:59:39', '2020-11-10 09:59:39'),
(89, 3, 2.00, 70, 41, 1, 8, '2', 3, 'Live', '2020-11-11 21:46:21', '2020-11-11 21:46:21'),
(90, 1, 4.00, 70, 41, 1, 8, '2', 3, 'Live', '2020-11-11 21:46:21', '2020-11-11 21:46:21'),
(91, 1, 22.00, 71, 32, 1, 3, '2', 3, 'Live', '2020-11-11 22:15:22', '2020-11-11 22:15:22'),
(92, 3, 1.00, 71, 32, 1, 6, '2', 3, 'Live', '2020-11-11 22:15:22', '2020-11-11 22:15:22'),
(93, 1, 1.00, 71, 32, 1, 6, '2', 3, 'Live', '2020-11-11 22:15:22', '2020-11-11 22:15:22'),
(102, 3, 1.00, 75, 44, 1, 8, '2', 3, 'Live', '2020-11-15 16:15:08', '2020-11-15 16:15:08'),
(103, 1, 2.00, 75, 44, 1, 8, '2', 3, 'Live', '2020-11-15 16:15:08', '2020-11-15 16:15:08'),
(104, 3, 1.00, 76, 45, 1, 8, '2', 3, 'Live', '2020-11-15 19:54:31', '2020-11-15 19:54:31'),
(105, 1, 2.00, 76, 45, 1, 8, '2', 3, 'Live', '2020-11-15 19:54:31', '2020-11-15 19:54:31'),
(106, 1, 11.00, 76, 45, 1, 3, '2', 3, 'Live', '2020-11-15 19:54:31', '2020-11-15 19:54:31'),
(107, 3, 1.00, 76, 45, 1, 6, '2', 3, 'Live', '2020-11-15 19:54:31', '2020-11-15 19:54:31'),
(108, 1, 1.00, 76, 45, 1, 6, '2', 3, 'Live', '2020-11-15 19:54:31', '2020-11-15 19:54:31'),
(109, 3, 1.00, 77, 46, 1, 8, '2', 3, 'Live', '2020-12-18 16:49:23', '2020-12-18 16:49:23'),
(110, 1, 2.00, 77, 46, 1, 8, '2', 3, 'Live', '2020-12-18 16:49:23', '2020-12-18 16:49:23'),
(111, 3, 1.00, 78, 47, 1, 8, '2', 3, 'Live', '2020-12-18 16:51:54', '2020-12-18 16:51:54'),
(112, 1, 2.00, 78, 47, 1, 8, '2', 3, 'Live', '2020-12-18 16:51:54', '2020-12-18 16:51:54'),
(113, 3, 1.00, 79, 48, 1, 8, '2', 3, 'Live', '2020-12-18 18:34:26', '2020-12-18 18:34:26'),
(114, 1, 2.00, 79, 48, 1, 8, '2', 3, 'Live', '2020-12-18 18:34:26', '2020-12-18 18:34:26'),
(115, 3, 1.00, 80, 49, 1, 8, '2', 3, 'Live', '2020-12-18 18:40:49', '2020-12-18 18:40:49'),
(116, 1, 2.00, 80, 49, 1, 8, '2', 3, 'Live', '2020-12-18 18:40:49', '2020-12-18 18:40:49'),
(117, 3, 1.00, 81, 50, 1, 6, '2', 3, 'Live', '2020-12-18 18:43:15', '2020-12-18 18:43:15'),
(118, 1, 1.00, 81, 50, 1, 6, '2', 3, 'Live', '2020-12-18 18:43:15', '2020-12-18 18:43:15'),
(119, 1, 22.00, 82, 23, 1, 3, '2', 3, 'Live', '2020-12-27 09:58:26', '2020-12-27 09:58:26'),
(120, 2, 5.00, 83, 51, 1, 9, '3', 3, 'Live', '2020-12-31 06:18:36', '2020-12-31 06:18:36'),
(121, 3, 1.00, 83, 51, 1, 8, '3', 3, 'Live', '2020-12-31 06:18:36', '2020-12-31 06:18:36'),
(122, 1, 2.00, 83, 51, 1, 8, '3', 3, 'Live', '2020-12-31 06:18:36', '2020-12-31 06:18:36'),
(123, 1, 1.00, 84, 52, 1, 4, '2', 3, 'Live', '2021-01-01 17:34:54', '2021-01-01 17:34:54'),
(124, 3, 2.00, 85, 43, 1, 8, '2', 3, 'Live', '2021-01-02 18:41:32', '2021-01-02 18:41:32'),
(125, 1, 4.00, 85, 43, 1, 8, '2', 3, 'Live', '2021-01-02 18:41:32', '2021-01-02 18:41:32'),
(126, 3, 1.00, 85, 43, 1, 8, '2', 3, 'Live', '2021-01-02 18:41:32', '2021-01-02 18:41:32'),
(127, 1, 2.00, 85, 43, 1, 8, '2', 3, 'Live', '2021-01-02 18:41:32', '2021-01-02 18:41:32'),
(157, 1, 1.00, 100, 53, 1, 4, '2', 3, 'Live', '2021-01-03 17:24:07', '2021-01-03 17:24:07'),
(158, 1, 11.00, 100, 53, 1, 3, '2', 3, 'Live', '2021-01-03 17:24:07', '2021-01-03 17:24:07'),
(159, 1, 1.00, 100, 53, 1, 4, '2', 3, 'Live', '2021-01-03 17:24:07', '2021-01-03 17:24:07'),
(161, 1, 11.00, 102, 54, 1, 5, '2', 3, 'Live', '2021-01-04 05:37:56', '2021-01-04 05:37:56'),
(162, 1, 11.00, 102, 54, 1, 3, '2', 3, 'Live', '2021-01-04 05:37:56', '2021-01-04 05:37:56'),
(187, 2, 5.00, 125, 37, 1, 9, '2', 3, 'Live', '2021-01-04 11:01:43', '2021-01-04 11:01:43'),
(192, 1, 11.00, 128, 24, 1, 3, '2', 3, 'Live', '2021-01-04 11:13:42', '2021-01-04 11:13:42'),
(193, 3, 1.00, 129, 34, 1, 8, '2', 3, 'Live', '2021-01-04 11:15:21', '2021-01-04 11:15:21'),
(194, 1, 2.00, 129, 34, 1, 8, '2', 3, 'Live', '2021-01-04 11:15:21', '2021-01-04 11:15:21'),
(199, 3, 1.00, 132, 42, 1, 8, '2', 3, 'Live', '2021-01-04 11:17:07', '2021-01-04 11:17:07'),
(200, 1, 2.00, 132, 42, 1, 8, '2', 3, 'Live', '2021-01-04 11:17:07', '2021-01-04 11:17:07'),
(201, 2, 5.00, 133, 55, 1, 9, '2', 3, 'Live', '2021-01-04 11:21:56', '2021-01-04 11:21:56'),
(204, 1, 11.00, 139, 59, 1, 3, '2', 3, 'Live', '2021-01-15 21:14:31', '2021-01-15 21:14:31'),
(205, 1, 1.00, 140, 60, 1, 4, '2', 3, 'Live', '2021-01-21 15:28:45', '2021-01-21 15:28:45'),
(206, 1, 11.00, 141, 61, 1, 3, '2', 3, 'Live', '2021-01-21 15:29:09', '2021-01-21 15:29:09'),
(207, 1, 11.00, 142, 62, 1, 3, '2', 3, 'Live', '2021-01-21 15:30:24', '2021-01-21 15:30:24'),
(208, 2, 5.00, 142, 62, 1, 9, '2', 3, 'Live', '2021-01-21 15:30:24', '2021-01-21 15:30:24'),
(209, 3, 1.00, 143, 63, 1, 8, '2', 3, 'Live', '2021-01-21 15:40:32', '2021-01-21 15:40:32'),
(210, 1, 2.00, 143, 63, 1, 8, '2', 3, 'Live', '2021-01-21 15:40:32', '2021-01-21 15:40:32'),
(211, 3, 1.00, 144, 64, 1, 8, '2', 3, 'Live', '2021-01-21 15:40:51', '2021-01-21 15:40:51'),
(212, 1, 2.00, 144, 64, 1, 8, '2', 3, 'Live', '2021-01-21 15:40:51', '2021-01-21 15:40:51'),
(213, 2, 5.00, 144, 64, 1, 9, '2', 3, 'Live', '2021-01-21 15:40:51', '2021-01-21 15:40:51'),
(214, 3, 1.00, 145, 27, 1, 8, '2', 3, 'Live', '2021-01-21 17:47:51', '2021-01-21 17:47:51'),
(215, 1, 2.00, 145, 27, 1, 8, '2', 3, 'Live', '2021-01-21 17:47:51', '2021-01-21 17:47:51'),
(216, 1, 1.00, 146, 65, 1, 4, '2', 3, 'Live', '2021-01-21 17:50:40', '2021-01-21 17:50:40'),
(217, 1, 11.00, 147, 66, 1, 3, '2', 3, 'Live', '2021-01-22 19:09:13', '2021-01-22 19:09:13'),
(218, 1, 11.00, 147, 66, 1, 5, '2', 3, 'Live', '2021-01-22 19:09:13', '2021-01-22 19:09:13'),
(219, 3, 1.00, 147, 66, 1, 6, '2', 3, 'Live', '2021-01-22 19:09:13', '2021-01-22 19:09:13'),
(220, 1, 1.00, 147, 66, 1, 6, '2', 3, 'Live', '2021-01-22 19:09:13', '2021-01-22 19:09:13'),
(221, 3, 1.00, 147, 66, 1, 8, '2', 3, 'Live', '2021-01-22 19:09:13', '2021-01-22 19:09:13'),
(222, 1, 2.00, 147, 66, 1, 8, '2', 3, 'Live', '2021-01-22 19:09:13', '2021-01-22 19:09:13'),
(223, 1, 11.00, 148, 67, 1, 3, '2', 3, 'Live', '2021-01-24 15:41:25', '2021-01-24 15:41:25'),
(224, 1, 11.00, 149, 68, 1, 3, '2', 3, 'Live', '2021-01-24 18:18:07', '2021-01-24 18:18:07'),
(225, 3, 1.00, 149, 68, 1, 6, '2', 3, 'Live', '2021-01-24 18:18:08', '2021-01-24 18:18:08'),
(226, 1, 1.00, 149, 68, 1, 6, '2', 3, 'Live', '2021-01-24 18:18:08', '2021-01-24 18:18:08'),
(227, 2, 10.00, 151, 70, 1, 6, '2', 3, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(228, 2, 10.00, 152, 71, 1, 6, '2', 3, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(229, 3, 1.00, 153, 72, 1, 4, '2', 3, 'Live', '2021-01-26 19:13:57', '2021-01-26 19:13:57'),
(230, 1, 2.00, 153, 72, 1, 4, '2', 3, 'Live', '2021-01-26 19:13:57', '2021-01-26 19:13:57'),
(231, 1, 11.00, 155, 74, 1, 3, '2', 3, 'Live', '2021-01-26 19:18:13', '2021-01-26 19:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_sales_cons_of_mod_of_menus`
--

DROP TABLE IF EXISTS `tbl_restaurant_sales_cons_of_mod_of_menus`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_sales_cons_of_mod_of_menus` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ingredient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `consumption` double(10,2) DEFAULT NULL,
  `sale_consumption_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sales_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  `food_menu_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_sales_cons_of_mod_of_menus_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_sales_cons_of_mod_of_menus`
--

INSERT INTO `tbl_restaurant_sales_cons_of_mod_of_menus` (`id`, `ingredient_id`, `consumption`, `sale_consumption_id`, `sales_id`, `order_status`, `food_menu_id`, `user_id`, `restaurant_id`, `del_status`, `created_at`, `updated_at`) VALUES
(7, 2, 4.00, 24, 4, 1, 3, '2', 3, 'Live', '2020-10-19 19:12:49', '2020-10-19 19:12:49'),
(10, 2, 2.00, 29, 18, 1, 3, '2', 3, 'Live', '2020-10-19 19:20:51', '2020-10-19 19:20:51'),
(11, 2, 2.00, 30, 22, 1, 3, '2', 3, 'Live', '2020-10-19 19:21:33', '2020-10-19 19:21:33'),
(17, 2, 2.00, 38, 21, 1, 3, '2', 3, 'Live', '2020-10-20 13:30:59', '2020-10-20 13:30:59'),
(18, 1, 1.00, 38, 21, 1, 3, '2', 3, 'Live', '2020-10-20 13:30:59', '2020-10-20 13:30:59'),
(24, 3, 1.00, 54, 14, 1, 5, '2', 3, 'Live', '2020-11-01 04:37:32', '2020-11-01 04:37:32'),
(25, 1, 2.00, 54, 14, 1, 5, '2', 3, 'Live', '2020-11-01 04:37:32', '2020-11-01 04:37:32'),
(27, 2, 2.00, 60, 36, 1, 8, '2', 3, 'Live', '2020-11-03 14:42:10', '2020-11-03 14:42:10'),
(28, 2, 2.00, 64, 40, 1, 8, '2', 3, 'Live', '2020-11-10 09:59:39', '2020-11-10 09:59:39'),
(30, 2, 2.00, 75, 44, 1, 8, '2', 3, 'Live', '2020-11-15 16:15:08', '2020-11-15 16:15:08'),
(31, 2, 4.00, 82, 23, 1, 3, '2', 3, 'Live', '2020-12-27 09:58:26', '2020-12-27 09:58:26'),
(46, 1, 1.00, 100, 53, 1, 4, '2', 3, 'Live', '2021-01-03 17:24:07', '2021-01-03 17:24:07'),
(47, 2, 2.00, 128, 24, 1, 3, '2', 3, 'Live', '2021-01-04 11:13:42', '2021-01-04 11:13:42'),
(48, 2, 2.00, 129, 34, 1, 8, '2', 3, 'Live', '2021-01-04 11:15:21', '2021-01-04 11:15:21'),
(49, 2, 4.00, 134, 56, 1, 3, '2', 3, 'Live', '2021-01-15 19:28:33', '2021-01-15 19:28:33'),
(50, 2, 2.00, 136, 58, 1, 3, '2', 3, 'Live', '2021-01-15 19:40:14', '2021-01-15 19:40:14'),
(51, 2, 2.00, 145, 27, 1, 8, '2', 3, 'Live', '2021-01-21 17:47:51', '2021-01-21 17:47:51'),
(52, 2, 2.00, 149, 68, 1, 3, '2', 3, 'Live', '2021-01-24 18:18:08', '2021-01-24 18:18:08'),
(53, 1, 1.00, 149, 68, 1, 3, '2', 3, 'Live', '2021-01-24 18:18:08', '2021-01-24 18:18:08'),
(54, 3, 1.00, 149, 68, 1, 3, '2', 3, 'Live', '2021-01-24 18:18:08', '2021-01-24 18:18:08'),
(55, 1, 2.00, 149, 68, 1, 3, '2', 3, 'Live', '2021-01-24 18:18:08', '2021-01-24 18:18:08'),
(56, 2, 2.00, 151, 70, 1, 8, '2', 3, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(57, 2, 2.00, 151, 70, 1, 4, '2', 3, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(58, 1, 1.00, 151, 70, 1, 4, '2', 3, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(59, 3, 1.00, 151, 70, 1, 4, '2', 3, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(60, 1, 2.00, 151, 70, 1, 4, '2', 3, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(61, 2, 2.00, 152, 71, 1, 8, '2', 3, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(62, 2, 2.00, 152, 71, 1, 4, '2', 3, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(63, 1, 1.00, 152, 71, 1, 4, '2', 3, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(64, 3, 1.00, 152, 71, 1, 4, '2', 3, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(65, 1, 2.00, 152, 71, 1, 4, '2', 3, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_sales_details`
--

DROP TABLE IF EXISTS `tbl_restaurant_sales_details`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_sales_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `food_menu_id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` bigint(20) UNSIGNED NOT NULL,
  `tmp_qty` bigint(20) UNSIGNED NOT NULL,
  `menu_price_without_discount` double(10,2) NOT NULL,
  `menu_price_with_discount` double(10,2) NOT NULL,
  `menu_unit_price` double(10,2) NOT NULL,
  `menu_vat_percentage` double(10,2) DEFAULT NULL,
  `menu_taxes` text COLLATE utf8mb4_unicode_ci,
  `menu_discount_value` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_note` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` double(10,2) DEFAULT NULL,
  `item_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delay_time` time DEFAULT NULL,
  `cooking_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cooking_start_time` datetime NOT NULL,
  `cooking_done_time` datetime NOT NULL,
  `previous_id` bigint(20) UNSIGNED NOT NULL,
  `sales_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_sales_details_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_sales_details`
--

INSERT INTO `tbl_restaurant_sales_details` (`id`, `food_menu_id`, `menu_name`, `qty`, `tmp_qty`, `menu_price_without_discount`, `menu_price_with_discount`, `menu_unit_price`, `menu_vat_percentage`, `menu_taxes`, `menu_discount_value`, `discount_type`, `menu_note`, `discount_amount`, `item_type`, `delay_time`, `cooking_status`, `cooking_start_time`, `cooking_done_time`, `previous_id`, `sales_id`, `order_status`, `user_id`, `restaurant_id`, `del_status`, `created_at`, `updated_at`) VALUES
(6, 4, 'lorem (03)', 1, 1, 120.00, 120.00, 120.00, NULL, '[{\"tax_field_id\":\"8\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"7.5\",\"item_vat_amount_for_unit_item\":\"9.00\",\"item_vat_amount_for_all_quantity\":\"9.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, 'Done', '2020-11-12 02:08:12', '2020-11-12 02:08:35', 6, 9, 1, '2', 8, 'Live', '2020-10-15 14:58:44', '2020-11-11 20:08:35'),
(9, 4, 'lorem (03)', 1, 1, 100.00, 100.00, 100.00, NULL, '[{\"tax_field_id\":\"8\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"7.5\",\"item_vat_amount_for_unit_item\":\"7.50\",\"item_vat_amount_for_all_quantity\":\"7.50\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 9, 13, 1, '2', 8, 'Live', '2020-10-15 15:28:18', '2020-10-15 15:28:18'),
(11, 4, 'lorem (03)', 1, 1, 120.00, 120.00, 120.00, NULL, '[{\"tax_field_id\":\"8\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"7.5\",\"item_vat_amount_for_unit_item\":\"9.00\",\"item_vat_amount_for_all_quantity\":\"9.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, 'Done', '2020-11-11 13:07:22', '2020-11-11 16:38:23', 11, 15, 1, '2', 8, 'Live', '2020-10-16 13:55:40', '2020-11-11 10:38:23'),
(12, 4, 'lorem (03)', 1, 1, 120.00, 120.00, 120.00, NULL, '[{\"tax_field_id\":\"8\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"7.5\",\"item_vat_amount_for_unit_item\":\"9.00\",\"item_vat_amount_for_all_quantity\":\"9.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, 'Done', '2020-11-11 13:19:29', '2020-11-12 01:55:05', 12, 16, 1, '2', 3, 'Live', '2020-10-16 13:57:20', '2020-11-11 19:55:05'),
(13, 4, 'lorem (03)', 1, 1, 100.00, 100.00, 100.00, NULL, '[{\"tax_field_id\":\"8\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"7.5\",\"item_vat_amount_for_unit_item\":\"7.50\",\"item_vat_amount_for_all_quantity\":\"7.50\"}]', '0', 'plain', '', 0.00, NULL, NULL, 'Done', '2020-11-12 01:58:22', '2020-11-12 02:07:50', 13, 17, 1, '2', 3, 'Live', '2020-10-16 13:58:41', '2020-11-11 20:07:50'),
(15, 9, 'food menu 2 _(vat/tax) (07)', 1, 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 15, 19, 1, '2', 3, 'Live', '2020-10-19 17:16:50', '2020-10-19 17:16:50'),
(16, 9, 'food menu 2 _(vat/tax) (07)', 1, 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 16, 20, 1, '2', 3, 'Live', '2020-10-19 17:17:03', '2020-10-19 17:17:03'),
(21, 3, 'food menu 3 (02)', 2, 1, 200.00, 190.00, 100.00, NULL, '[{\"tax_field_id\":\"8\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"7.5\",\"item_vat_amount_for_unit_item\":\"7.50\",\"item_vat_amount_for_all_quantity\":\"7.50\"}]', '10', 'plain', 'note', 10.00, NULL, NULL, 'Done', '2020-11-12 02:00:11', '2020-11-12 02:01:26', 1, 4, 1, '2', 8, 'Live', '2020-10-19 19:12:49', '2020-11-11 20:01:26'),
(26, 3, 'food menu 3 (02)', 1, 0, 100.00, 90.00, 100.00, NULL, '[{\"tax_field_id\":\"8\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"7.5\",\"item_vat_amount_for_unit_item\":\"7.50\",\"item_vat_amount_for_all_quantity\":\"7.50\"}]', '10', 'plain', 'note', 10.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 1, 18, 1, '2', 3, 'Live', '2020-10-19 19:20:51', '2020-10-19 19:20:51'),
(27, 3, 'food menu 3 (02)', 1, 0, 100.00, 90.00, 100.00, NULL, '[{\"tax_field_id\":\"8\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"7.5\",\"item_vat_amount_for_unit_item\":\"7.50\",\"item_vat_amount_for_all_quantity\":\"7.50\"}]', '10', 'plain', 'note', 10.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 1, 22, 1, '2', 3, 'Live', '2020-10-19 19:21:33', '2020-10-19 19:21:33'),
(31, 5, 'menu 2 (04)', 1, 0, 110.00, 110.00, 110.00, NULL, '[{\"tax_field_id\":\"8\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"7\",\"item_vat_amount_for_unit_item\":\"7.70\",\"item_vat_amount_for_all_quantity\":\"7.70\"}]', '0', 'plain', '', 0.00, NULL, NULL, 'Done', '2020-11-11 12:26:22', '2020-11-11 16:36:53', 30, 26, 1, '2', 3, 'Live', '2020-10-19 19:29:41', '2020-11-11 10:36:53'),
(37, 3, 'food menu 3 (02)', 1, 0, 100.00, 90.00, 100.00, NULL, '[{\"tax_field_id\":\"8\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"7.5\",\"item_vat_amount_for_unit_item\":\"7.50\",\"item_vat_amount_for_all_quantity\":\"7.50\"}]', '10', 'plain', 'note', 10.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 32, 21, 1, '2', 3, 'Live', '2020-10-20 13:30:59', '2020-10-20 13:30:59'),
(38, 3, 'food menu 3 (02)', 1, 0, 100.00, 100.00, 100.00, NULL, '[{\"tax_field_id\":\"8\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"7.5\",\"item_vat_amount_for_unit_item\":\"7.50\",\"item_vat_amount_for_all_quantity\":\"7.50\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 38, 21, 1, '2', 3, 'Live', '2020-10-20 13:30:59', '2020-10-20 13:30:59'),
(43, 5, 'menu 2 (04)', 1, 0, 100.00, 100.00, 100.00, NULL, '[{\"tax_field_id\":\"8\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"7\",\"item_vat_amount_for_unit_item\":\"7.00\",\"item_vat_amount_for_all_quantity\":\"7.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, 'Done', '1900-01-01 00:00:00', '2020-11-16 00:10:23', 29, 25, 1, '2', 3, 'Live', '2020-10-22 19:34:09', '2020-11-15 18:10:23'),
(44, 6, 'food menu 2 _(bev remove) (05)', 1, 1, 90.00, 90.00, 90.00, NULL, '\"\"', '0', 'plain', '', 0.00, NULL, NULL, 'Done', '1900-01-01 00:00:00', '2020-11-16 00:10:23', 44, 25, 1, '2', 3, 'Live', '2020-10-22 19:34:09', '2020-11-15 18:10:23'),
(47, 8, 'food menu 2 _(multiple shift) (06)', 1, 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 47, 30, 1, '2', 3, 'Live', '2020-10-25 18:53:05', '2020-10-25 18:53:05'),
(55, 8, 'food menu 2 _(multiple shift) (06)', 1, 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 55, 33, 1, '2', 8, 'Live', '2020-11-01 13:36:51', '2020-11-01 13:36:51'),
(56, 9, 'food menu 2 _(vat/tax) (07)', 1, 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 56, 33, 1, '2', 3, 'Live', '2020-11-01 13:36:51', '2020-11-01 13:36:51'),
(57, 3, 'food menu 3 (02)', 1, 1, 100.00, 100.00, 100.00, NULL, '\"\"', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 57, 35, 1, '2', 3, 'Live', '2020-11-01 13:55:52', '2020-11-01 13:55:52'),
(58, 9, 'food menu 2 _(vat/tax) (07)', 1, 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 58, 35, 1, '2', 3, 'Live', '2020-11-01 13:55:52', '2020-11-01 13:55:52'),
(59, 8, 'food menu 2 _(multiple shift) (06)', 1, 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 59, 36, 1, '2', 3, 'Live', '2020-11-03 14:42:10', '2020-11-03 14:42:10'),
(61, 8, 'food menu 2 _(multiple shift) (06)', 1, 1, 220.00, 220.00, 220.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"11.00\",\"item_vat_amount_for_all_quantity\":\"11.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, 'Done', '2020-11-11 17:01:13', '2020-11-11 17:01:24', 61, 38, 1, '2', 3, 'Live', '2020-11-04 13:06:02', '2020-11-11 11:01:24'),
(62, 9, 'food menu 2 _(vat/tax) (07)', 1, 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 62, 39, 1, '2', 3, 'Live', '2020-11-04 13:35:58', '2020-11-04 13:35:58'),
(63, 8, 'food menu 2 _(multiple shift) (06)', 1, 1, 220.00, 220.00, 220.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"11.00\",\"item_vat_amount_for_all_quantity\":\"11.00\"}]', '0', 'plain', 'kitchen panels note mod', 0.00, NULL, NULL, 'Done', '2020-11-11 17:55:31', '2020-11-11 19:30:10', 63, 40, 1, '2', 3, 'Live', '2020-11-10 09:59:39', '2020-11-11 13:30:10'),
(69, 8, 'food menu 2 _(multiple shift) (06)', 2, 1, 400.00, 400.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 66, 41, 1, '2', 3, 'Live', '2020-11-11 21:46:21', '2020-11-11 21:46:21'),
(70, 3, 'food menu 3 (02)', 2, 1, 220.00, 220.00, 110.00, NULL, '\"\"', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 48, 32, 1, '2', 3, 'Live', '2020-11-11 22:15:22', '2020-11-11 22:15:22'),
(71, 6, 'food menu 2 _(bev remove) (05)', 1, 0, 90.00, 90.00, 90.00, NULL, '\"\"', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 49, 32, 1, '2', 3, 'Live', '2020-11-11 22:15:22', '2020-11-11 22:15:22'),
(76, 8, 'food menu 2 _(multiple shift) (06)', 1, 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 76, 44, 1, '2', 3, 'Live', '2020-11-15 16:15:08', '2020-11-15 16:15:08'),
(77, 8, 'food menu 2 _(multiple shift) (06)', 1, 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, 'Done', '2020-12-27 15:57:32', '2020-12-27 15:57:37', 77, 45, 1, '2', 3, 'Live', '2020-11-15 19:54:31', '2020-12-27 09:57:37'),
(78, 3, 'food menu 3 (02)', 1, 1, 100.00, 100.00, 100.00, NULL, '\"\"', '0', 'plain', '', 0.00, NULL, NULL, 'Done', '2020-12-27 15:55:21', '2020-12-27 15:55:42', 78, 45, 1, '2', 3, 'Live', '2020-11-15 19:54:31', '2020-12-27 09:55:42'),
(79, 6, 'food menu 2 _(bev remove) (05)', 1, 1, 90.00, 90.00, 90.00, NULL, '\"\"', '0', 'plain', '', 0.00, NULL, NULL, 'Done', '2020-12-27 15:57:32', '2020-12-27 15:57:37', 79, 45, 1, '2', 3, 'Live', '2020-11-15 19:54:31', '2020-12-27 09:57:37'),
(80, 8, 'food menu 2 _(multiple shift) (06)', 1, 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 80, 46, 1, '2', 3, 'Live', '2020-12-18 16:49:23', '2020-12-18 16:49:23'),
(81, 8, 'food menu 2 _(multiple shift) (06)', 1, 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 81, 47, 1, '2', 3, 'Live', '2020-12-18 16:51:54', '2020-12-18 16:51:54'),
(82, 8, 'food menu 2 _(multiple shift) (06)', 1, 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 82, 48, 1, '2', 3, 'Live', '2020-12-18 18:34:26', '2020-12-18 18:34:26'),
(83, 8, 'food menu 2 _(multiple shift) (06)', 1, 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 83, 49, 1, '2', 3, 'Live', '2020-12-18 18:40:49', '2020-12-18 18:40:49'),
(84, 6, 'food menu 2 _(bev remove) (05)', 1, 1, 90.00, 90.00, 90.00, NULL, '\"\"', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 84, 50, 1, '2', 3, 'Live', '2020-12-18 18:43:15', '2020-12-18 18:43:15'),
(85, 3, 'food menu 3 (02)', 2, 1, 200.00, 190.00, 100.00, NULL, '[{\"tax_field_id\":\"8\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"7.5\",\"item_vat_amount_for_unit_item\":\"7.50\",\"item_vat_amount_for_all_quantity\":\"7.50\"}]', '10', 'plain', 'note', 10.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 1, 23, 1, '2', 3, 'Live', '2020-12-27 09:58:26', '2020-12-27 09:58:26'),
(86, 9, 'food menu 2 _(vat/tax) (07)', 1, 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 86, 51, 1, '3', 3, 'Live', '2020-12-31 06:18:36', '2020-12-31 06:18:36'),
(87, 8, 'food menu 2 _(multiple shift) (06)', 1, 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 87, 51, 1, '3', 3, 'Live', '2020-12-31 06:18:36', '2020-12-31 06:18:36'),
(88, 4, 'lorem (03)', 1, 1, 120.00, 120.00, 120.00, NULL, '\"\"', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 88, 52, 1, '2', 3, 'Live', '2021-01-01 17:34:54', '2021-01-01 17:34:54'),
(89, 8, 'food menu 2 _(multiple shift) (06)', 2, 1, 400.00, 400.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 89, 43, 1, '2', 3, 'Live', '2021-01-02 18:41:32', '2021-01-02 18:41:32'),
(90, 8, 'food menu 2 _(multiple shift) (06)', 1, 0, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 74, 43, 1, '2', 3, 'Live', '2021-01-02 18:41:32', '2021-01-02 18:41:32'),
(120, 4, 'lorem (03)', 1, 0, 120.00, 110.00, 120.00, NULL, '\"\"', '10', 'plain', '', 10.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 91, 53, 1, '2', 3, 'Live', '2021-01-03 17:24:07', '2021-01-03 17:24:07'),
(121, 3, 'food menu 3 (02)', 1, 0, 120.00, 120.00, 120.00, NULL, '\"\"', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 92, 53, 1, '2', 3, 'Live', '2021-01-03 17:24:07', '2021-01-03 17:24:07'),
(122, 4, 'lorem (03)', 1, 0, 120.00, 120.00, 120.00, NULL, '\"\"', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 119, 53, 1, '2', 3, 'Live', '2021-01-03 17:24:07', '2021-01-03 17:24:07'),
(124, 5, 'menu 2 (04)', 1, 0, 120.00, 120.00, 120.00, NULL, '[{\"tax_field_id\":33,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7,\"item_vat_amount_for_unit_item\":\"8.40\",\"item_vat_amount_for_all_quantity\":\"8.40\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 123, 54, 1, '2', 3, 'Live', '2021-01-04 05:37:56', '2021-01-04 05:37:56'),
(125, 3, 'food menu 3 (02)', 1, 1, 120.00, 120.00, 120.00, NULL, '\"\"', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 125, 54, 1, '2', 3, 'Live', '2021-01-04 05:37:56', '2021-01-04 05:37:56'),
(148, 9, 'food menu 2 _(vat/tax) (07)', 1, 0, 120.00, 120.00, 120.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"1.20\",\"item_vat_amount_for_all_quantity\":\"1.20\"}]', '0', 'plain', '', 0.00, NULL, NULL, 'Done', '2020-11-11 21:37:11', '2020-11-11 21:45:14', 60, 37, 1, '2', 3, 'Live', '2021-01-04 11:01:43', '2021-01-04 11:01:43'),
(151, 3, 'food menu 3 (02)', 1, 0, 100.00, 90.00, 100.00, NULL, '[{\"tax_field_id\":\"8\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"7.5\",\"item_vat_amount_for_unit_item\":\"7.50\",\"item_vat_amount_for_all_quantity\":\"7.50\"}]', '10', 'plain', 'note', 10.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 1, 24, 1, '2', 3, 'Live', '2021-01-04 11:13:42', '2021-01-04 11:13:42'),
(152, 8, 'food menu 2 _(multiple shift) (06)', 1, 0, 200.00, 190.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '10', 'plain', 'note', 10.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 54, 34, 1, '2', 3, 'Live', '2021-01-04 11:15:21', '2021-01-04 11:15:21'),
(155, 8, 'food menu 2 _(multiple shift) (06)', 1, 0, 220.00, 220.00, 220.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"11.00\",\"item_vat_amount_for_all_quantity\":\"11.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 72, 42, 1, '2', 3, 'Live', '2021-01-04 11:17:07', '2021-01-04 11:17:07'),
(156, 9, 'food menu 2 _(vat/tax) (07)', 1, 0, 120.00, 120.00, 120.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"1.20\",\"item_vat_amount_for_all_quantity\":\"1.20\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 136, 55, 1, '2', 3, 'Live', '2021-01-04 11:21:56', '2021-01-04 11:21:56'),
(157, 3, 'food menu 3', 2, 2, 220.00, 220.00, 110.00, NULL, NULL, '0', 'plain', 'plain', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 157, 56, 1, '2', 3, 'Live', '2021-01-15 19:28:32', '2021-01-15 19:28:32'),
(158, 5, 'menu 2', 1, 1, 110.00, 110.00, 110.00, NULL, NULL, '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 158, 57, 1, '2', 3, 'Live', '2021-01-15 19:38:37', '2021-01-15 19:38:37'),
(159, 3, 'food menu 3', 1, 1, 110.00, 110.00, 110.00, NULL, '[]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 159, 58, 1, '2', 3, 'Live', '2021-01-15 19:40:14', '2021-01-15 19:40:14'),
(162, 3, 'food menu 3', 1, 0, 110.00, 110.00, 110.00, NULL, 'null', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 160, 59, 1, '2', 3, 'Live', '2021-01-15 21:14:31', '2021-01-15 21:14:31'),
(163, 4, 'lorem (03)', 1, 1, 100.00, 100.00, 100.00, NULL, '\"\"', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 163, 60, 1, '2', 3, 'Live', '2021-01-21 15:28:45', '2021-01-21 15:28:45'),
(164, 3, 'food menu 3 (02)', 1, 1, 120.00, 120.00, 120.00, NULL, '\"\"', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 164, 61, 1, '2', 3, 'Live', '2021-01-21 15:29:09', '2021-01-21 15:29:09'),
(165, 3, 'food menu 3 (02)', 1, 1, 110.00, 110.00, 110.00, NULL, '\"\"', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 165, 62, 1, '2', 3, 'Live', '2021-01-21 15:30:24', '2021-01-21 15:30:24'),
(166, 9, 'food menu 2 _(vat/tax) (07)', 1, 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 166, 62, 1, '2', 3, 'Live', '2021-01-21 15:30:24', '2021-01-21 15:30:24'),
(167, 8, 'food menu 2 _(multiple shift) (06)', 1, 1, 220.00, 220.00, 220.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"11.00\",\"item_vat_amount_for_all_quantity\":\"11.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 167, 63, 1, '2', 3, 'Live', '2021-01-21 15:40:32', '2021-01-21 15:40:32'),
(168, 8, 'food menu 2 _(multiple shift) (06)', 1, 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 168, 64, 1, '2', 3, 'Live', '2021-01-21 15:40:51', '2021-01-21 15:40:51'),
(169, 9, 'food menu 2 _(vat/tax) (07)', 1, 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 169, 64, 1, '2', 3, 'Live', '2021-01-21 15:40:51', '2021-01-21 15:40:51'),
(170, 8, 'food menu 2 _(multiple shift) (06)', 1, 0, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"},{\"tax_field_id\":\"12\",\"tax_field_name\":\"IGST\",\"tax_field_percentage\":\"0\",\"item_vat_amount_for_unit_item\":\"0.00\",\"item_vat_amount_for_all_quantity\":\"0.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 40, 27, 1, '2', 3, 'Live', '2021-01-21 17:47:51', '2021-01-21 17:47:51'),
(171, 4, 'lorem (03)', 1, 1, 120.00, 120.00, 120.00, NULL, '\"\"', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 171, 65, 1, '2', 3, 'Live', '2021-01-21 17:50:40', '2021-01-21 17:50:40'),
(172, 3, 'food menu 3 (02)', 1, 1, 100.00, 100.00, 100.00, NULL, '[{\"tax_field_id\":51,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7,\"item_vat_amount_for_unit_item\":\"7.00\",\"item_vat_amount_for_all_quantity\":\"7.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 172, 66, 1, '2', 3, 'Live', '2021-01-22 19:09:13', '2021-01-22 19:09:13'),
(173, 5, 'menu 2 (04)', 1, 1, 100.00, 100.00, 100.00, NULL, '[{\"tax_field_id\":51,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7,\"item_vat_amount_for_unit_item\":\"7.00\",\"item_vat_amount_for_all_quantity\":\"7.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 173, 66, 1, '2', 3, 'Live', '2021-01-22 19:09:13', '2021-01-22 19:09:13'),
(174, 6, 'food menu 2 _(bev remove) (05)', 1, 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":51,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7,\"item_vat_amount_for_unit_item\":\"6.30\",\"item_vat_amount_for_all_quantity\":\"6.30\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 174, 66, 1, '2', 3, 'Live', '2021-01-22 19:09:13', '2021-01-22 19:09:13'),
(175, 8, 'food menu 2 _(multiple shift) (06)', 1, 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":51,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7,\"item_vat_amount_for_unit_item\":\"14.00\",\"item_vat_amount_for_all_quantity\":\"14.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 175, 66, 1, '2', 3, 'Live', '2021-01-22 19:09:13', '2021-01-22 19:09:13'),
(176, 3, 'food menu 3 (02)', 1, 1, 100.00, 100.00, 100.00, NULL, '[{\"tax_field_id\":51,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7,\"item_vat_amount_for_unit_item\":\"7.00\",\"item_vat_amount_for_all_quantity\":\"7.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 176, 67, 1, '2', 3, 'Live', '2021-01-24 15:41:25', '2021-01-24 15:41:25'),
(177, 3, 'food menu 3 (02)', 1, 1, 100.00, 100.00, 100.00, NULL, '[{\"tax_field_id\":51,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7,\"item_vat_amount_for_unit_item\":\"7.00\",\"item_vat_amount_for_all_quantity\":\"7.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 177, 68, 1, '2', 3, 'Live', '2021-01-24 18:18:07', '2021-01-24 18:18:07'),
(178, 6, 'food menu 2 _(bev remove) (05)', 1, 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":51,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7,\"item_vat_amount_for_unit_item\":\"6.30\",\"item_vat_amount_for_all_quantity\":\"6.30\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 178, 68, 1, '2', 3, 'Live', '2021-01-24 18:18:08', '2021-01-24 18:18:08'),
(179, 3, 'food menu 3', 1, 1, 100.00, 100.00, 100.00, NULL, '[]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 179, 69, 1, '2', 3, 'Live', '2021-01-26 18:32:58', '2021-01-26 18:32:58'),
(180, 6, 'food menu 2 _(bev remove)', 2, 2, 180.00, 180.00, 90.00, NULL, '[]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 180, 70, 1, '2', 3, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(181, 8, 'food menu 2 _(multiple shift)', 1, 1, 200.00, 200.00, 200.00, NULL, '[]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 181, 70, 1, '2', 3, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(182, 4, 'lorem', 1, 1, 110.00, 110.00, 110.00, NULL, '[]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 182, 70, 1, '2', 3, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(183, 6, 'food menu 2 _(bev remove)', 2, 2, 180.00, 180.00, 90.00, NULL, NULL, '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 183, 71, 1, '2', 3, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(184, 8, 'food menu 2 _(multiple shift)', 1, 1, 200.00, 200.00, 200.00, NULL, NULL, '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 184, 71, 1, '2', 3, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(185, 4, 'lorem', 1, 1, 110.00, 110.00, 110.00, NULL, NULL, '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 185, 71, 1, '2', 3, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(186, 4, 'lorem', 1, 1, 110.00, 110.00, 110.00, NULL, NULL, '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 186, 72, 1, '2', 3, 'Live', '2021-01-26 19:13:57', '2021-01-26 19:13:57'),
(187, 3, 'food menu 3', 1, 1, 100.00, 100.00, 100.00, NULL, NULL, '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 187, 73, 1, '2', 3, 'Live', '2021-01-26 19:16:30', '2021-01-26 19:16:30'),
(188, 3, 'food menu 3 (02)', 1, 1, 100.00, 100.00, 100.00, NULL, '[{\"tax_field_id\":51,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7,\"item_vat_amount_for_unit_item\":\"7.00\",\"item_vat_amount_for_all_quantity\":\"7.00\"}]', '0', 'plain', '', 0.00, NULL, NULL, NULL, '1900-01-01 00:00:00', '1900-01-01 00:00:00', 188, 74, 1, '2', 3, 'Live', '2021-01-26 19:18:13', '2021-01-26 19:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_sales_details_modifiers`
--

DROP TABLE IF EXISTS `tbl_restaurant_sales_details_modifiers`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_sales_details_modifiers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `modifier_id` bigint(20) UNSIGNED NOT NULL,
  `modifier_price` double(10,2) NOT NULL,
  `food_menu_id` bigint(20) UNSIGNED NOT NULL,
  `sales_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  `sales_details_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_sales_details_modifiers_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_sales_details_modifiers`
--

INSERT INTO `tbl_restaurant_sales_details_modifiers` (`id`, `modifier_id`, `modifier_price`, `food_menu_id`, `sales_id`, `order_status`, `sales_details_id`, `user_id`, `restaurant_id`, `customer_id`, `del_status`, `created_at`, `updated_at`) VALUES
(7, 15, 60.00, 3, 4, 1, 21, '2', 8, 29, 'Live', '2020-10-19 19:12:49', '2020-10-19 19:12:49'),
(10, 15, 60.00, 3, 18, 1, 26, '2', 8, 29, 'Live', '2020-10-19 19:20:51', '2020-10-19 19:20:51'),
(11, 15, 60.00, 3, 22, 1, 27, '2', 3, 29, 'Live', '2020-10-19 19:21:33', '2020-10-19 19:21:33'),
(16, 15, 60.00, 3, 21, 1, 38, '2', 3, 29, 'Live', '2020-10-20 13:30:59', '2020-10-20 13:30:59'),
(17, 14, 52.00, 3, 21, 1, 38, '2', 3, 29, 'Live', '2020-10-20 13:30:59', '2020-10-20 13:30:59'),
(22, 13, 100.00, 5, 14, 1, 51, '2', 3, 28, 'Live', '2020-11-01 04:37:32', '2020-11-01 04:37:32'),
(24, 15, 60.00, 8, 36, 1, 59, '2', 3, 30, 'Live', '2020-11-03 14:42:10', '2020-11-03 14:42:10'),
(25, 15, 60.00, 8, 40, 1, 63, '2', 3, 30, 'Live', '2020-11-10 09:59:39', '2020-11-10 09:59:39'),
(27, 15, 60.00, 8, 44, 1, 76, '2', 3, 28, 'Live', '2020-11-15 16:15:08', '2020-11-15 16:15:08'),
(28, 15, 60.00, 3, 23, 1, 85, '2', 3, 29, 'Live', '2020-12-27 09:58:26', '2020-12-27 09:58:26'),
(71, 19, 0.00, 4, 53, 1, 120, '2', 3, 32, 'Live', '2021-01-03 17:24:07', '2021-01-03 17:24:07'),
(72, 18, 0.00, 4, 53, 1, 120, '2', 3, 32, 'Live', '2021-01-03 17:24:07', '2021-01-03 17:24:07'),
(73, 14, 52.00, 4, 53, 1, 120, '2', 3, 32, 'Live', '2021-01-03 17:24:07', '2021-01-03 17:24:07'),
(74, 15, 60.00, 3, 24, 1, 151, '2', 3, 29, 'Live', '2021-01-04 11:13:42', '2021-01-04 11:13:42'),
(75, 15, 60.00, 8, 34, 1, 152, '2', 3, 30, 'Live', '2021-01-04 11:15:21', '2021-01-04 11:15:21'),
(76, 15, 60.00, 3, 56, 1, 157, '2', 3, 1, 'Live', '2021-01-15 19:28:33', '2021-01-15 19:28:33'),
(77, 15, 60.00, 3, 58, 1, 159, '2', 3, 1, 'Live', '2021-01-15 19:40:14', '2021-01-15 19:40:14'),
(78, 15, 60.00, 8, 27, 1, 170, '2', 3, 25, 'Live', '2021-01-21 17:47:51', '2021-01-21 17:47:51'),
(79, 15, 60.00, 3, 68, 1, 177, '2', 3, 1, 'Live', '2021-01-24 18:18:07', '2021-01-24 18:18:07'),
(80, 14, 52.00, 3, 68, 1, 177, '2', 3, 1, 'Live', '2021-01-24 18:18:08', '2021-01-24 18:18:08'),
(81, 13, 100.00, 3, 68, 1, 177, '2', 3, 1, 'Live', '2021-01-24 18:18:08', '2021-01-24 18:18:08'),
(82, 15, 60.00, 8, 70, 1, 181, '2', 3, 41, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(83, 19, 0.00, 4, 70, 1, 182, '2', 3, 41, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(84, 18, 0.00, 4, 70, 1, 182, '2', 3, 41, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(85, 17, 0.00, 4, 70, 1, 182, '2', 3, 41, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(86, 16, 0.00, 4, 70, 1, 182, '2', 3, 41, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(87, 15, 60.00, 4, 70, 1, 182, '2', 3, 41, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(88, 14, 52.00, 4, 70, 1, 182, '2', 3, 41, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(89, 13, 100.00, 4, 70, 1, 182, '2', 3, 41, 'Live', '2021-01-26 19:05:42', '2021-01-26 19:05:42'),
(90, 15, 60.00, 8, 71, 1, 184, '2', 3, 42, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(91, 19, 0.00, 4, 71, 1, 185, '2', 3, 42, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(92, 18, 0.00, 4, 71, 1, 185, '2', 3, 42, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(93, 17, 0.00, 4, 71, 1, 185, '2', 3, 42, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(94, 16, 0.00, 4, 71, 1, 185, '2', 3, 42, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(95, 15, 60.00, 4, 71, 1, 185, '2', 3, 42, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(96, 14, 52.00, 4, 71, 1, 185, '2', 3, 42, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(97, 13, 100.00, 4, 71, 1, 185, '2', 3, 42, 'Live', '2021-01-26 19:11:41', '2021-01-26 19:11:41'),
(98, 17, 0.00, 4, 72, 1, 186, '2', 3, 43, 'Live', '2021-01-26 19:13:57', '2021-01-26 19:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_sales_holds`
--

DROP TABLE IF EXISTS `tbl_restaurant_sales_holds`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_sales_holds` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hold_no` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '000000',
  `total_items` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_total` double(10,2) DEFAULT NULL,
  `paid_amount` double(10,2) DEFAULT NULL,
  `due_amount` double(10,2) DEFAULT NULL,
  `due_payment_date` date DEFAULT NULL,
  `disc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disc_actual` double(10,2) DEFAULT NULL,
  `vat` double(10,2) DEFAULT NULL,
  `total_payable` double(10,2) DEFAULT NULL,
  `payment_method_id` bigint(20) UNSIGNED DEFAULT NULL,
  `table_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_item_discount_amount` double(10,2) NOT NULL,
  `sub_total_with_discount` double(10,2) NOT NULL,
  `sub_total_discount_amount` double(10,2) NOT NULL,
  `total_discount_amount` double(10,2) NOT NULL,
  `delivery_charge` double(10,2) NOT NULL,
  `sub_total_discount_value` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total_discount_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_time` time NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waiter_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  `order_type` tinyint(4) NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `sale_vat_objects` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_sales_holds_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_sales_holds`
--

INSERT INTO `tbl_restaurant_sales_holds` (`id`, `customer_id`, `hold_no`, `total_items`, `sub_total`, `paid_amount`, `due_amount`, `due_payment_date`, `disc`, `disc_actual`, `vat`, `total_payable`, `payment_method_id`, `table_id`, `total_item_discount_amount`, `sub_total_with_discount`, `sub_total_discount_amount`, `total_discount_amount`, `delivery_charge`, `sub_total_discount_value`, `sub_total_discount_type`, `token_no`, `sale_date`, `sale_time`, `user_id`, `waiter_id`, `restaurant_id`, `order_status`, `order_type`, `del_status`, `sale_vat_objects`, `created_at`, `updated_at`) VALUES
(2, '', '000002', 1, 200.00, NULL, NULL, NULL, NULL, NULL, NULL, 210.00, NULL, NULL, 0.00, 200.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-22', '16:37:18', '2', '', 3, 1, 3, 'Deleted', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', '2020-10-22 10:06:10', '2020-10-22 21:06:49'),
(4, '', '000004', 1, 200.00, NULL, NULL, NULL, NULL, NULL, NULL, 210.00, NULL, NULL, 0.00, 200.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-22', '16:40:41', '2', '', 3, 1, 2, 'Deleted', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', '2020-10-22 10:40:41', '2020-10-22 21:21:50'),
(5, '', '000005', 1, 200.00, NULL, NULL, NULL, NULL, NULL, NULL, 210.00, NULL, NULL, 0.00, 200.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-22', '16:41:42', '2', '', 3, 1, 3, 'Deleted', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', '2020-10-22 10:41:42', '2020-10-22 21:21:50'),
(6, '', '000006', 1, 90.00, NULL, NULL, NULL, NULL, NULL, NULL, 90.00, NULL, NULL, 0.00, 90.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-22', '16:43:10', '2', '', 3, 1, 3, 'Deleted', '[]', '2020-10-22 10:43:10', '2020-10-22 21:21:50'),
(7, '', '000008', 1, 80.00, NULL, NULL, NULL, NULL, NULL, NULL, 80.00, NULL, NULL, 10.00, 80.00, 0.00, 10.00, 0.00, '', 'plain', NULL, '2020-10-22', '16:43:54', '2', '', 3, 1, 3, 'Deleted', '[]', '2020-10-22 10:43:54', '2020-10-22 21:21:50'),
(8, '', '000007', 1, 90.00, NULL, NULL, NULL, NULL, NULL, NULL, 90.00, NULL, NULL, 0.00, 90.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-22', '16:45:07', '2', '', 3, 1, 3, 'Deleted', '[]', '2020-10-22 10:45:07', '2020-10-22 21:21:50'),
(9, '30', '000008', 1, 200.00, NULL, NULL, NULL, NULL, NULL, NULL, 210.00, NULL, NULL, 0.00, 200.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-22', '17:19:35', '2', '3', 3, 1, 2, 'Deleted', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', '2020-10-22 11:19:35', '2020-10-22 21:21:50'),
(10, '', '000009', 1, 220.00, NULL, NULL, NULL, NULL, NULL, NULL, 231.00, NULL, NULL, 0.00, 220.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-22', '19:16:01', '2', '3', 3, 1, 1, 'Deleted', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"11.00\"}]', '2020-10-22 13:16:01', '2020-10-22 21:21:50'),
(11, '', '000010', 1, 200.00, NULL, NULL, NULL, NULL, NULL, NULL, 210.00, NULL, NULL, 0.00, 200.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-22', '19:44:30', '2', '', 3, 1, 2, 'Deleted', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', '2020-10-22 13:44:30', '2020-10-22 21:21:50'),
(12, '30', '000012', 3, 490.00, NULL, NULL, NULL, NULL, NULL, NULL, 510.00, NULL, NULL, 0.00, 490.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-22', '21:17:42', '2', '3', 3, 1, 2, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"20.00\"}]', '2020-10-22 15:17:42', '2020-10-22 21:21:50'),
(13, '', '000002', 1, 250.00, NULL, NULL, NULL, NULL, NULL, NULL, 259.50, NULL, NULL, 10.00, 250.00, 0.00, 10.00, 0.00, '', 'plain', NULL, '2020-10-23', '19:37:20', '2', '', 3, 1, 2, 'Deleted', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"9.50\"}]', '2020-10-23 13:37:20', '2020-10-23 13:39:07'),
(14, '30', '000002', 1, 250.00, NULL, NULL, NULL, NULL, NULL, NULL, 259.50, NULL, NULL, 10.00, 250.00, 0.00, 10.00, 0.00, '', 'plain', NULL, '2020-10-23', '19:39:51', '2', '3', 3, 1, 3, 'Deleted', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"9.50\"}]', '2020-10-23 13:39:51', '2020-10-23 13:57:36'),
(15, '', '000003', 1, 322.00, NULL, NULL, NULL, NULL, NULL, NULL, 322.00, NULL, NULL, 0.00, 322.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-23', '19:56:27', '2', '', 3, 1, 3, 'Deleted', '[]', '2020-10-23 13:56:27', '2020-10-23 13:57:29'),
(16, '', '000002', 1, 322.00, NULL, NULL, NULL, NULL, NULL, NULL, 322.00, NULL, NULL, 0.00, 322.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-23', '19:58:01', '2', '', 3, 1, 3, 'Deleted', '[]', '2020-10-23 13:58:01', '2020-10-23 14:00:07'),
(17, '', '000002', 1, 222.00, NULL, NULL, NULL, NULL, NULL, NULL, 222.00, NULL, NULL, 0.00, 222.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-23', '20:00:40', '2', '', 3, 1, 3, 'Deleted', '[]', '2020-10-23 14:00:40', '2020-10-23 14:02:03'),
(18, '', '000002', 1, 170.00, NULL, NULL, NULL, NULL, NULL, NULL, 170.00, NULL, NULL, 0.00, 170.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-23', '20:02:27', '2', '', 3, 1, 3, 'Deleted', '[]', '2020-10-23 14:02:27', '2020-10-23 14:04:44'),
(19, '', '000002', 1, 222.00, NULL, NULL, NULL, NULL, NULL, NULL, 222.00, NULL, NULL, 0.00, 222.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-23', '20:05:06', '2', '', 3, 1, 3, 'Deleted', '[]', '2020-10-23 14:05:06', '2020-10-23 14:13:36'),
(20, '', '000003', 1, 222.00, NULL, NULL, NULL, NULL, NULL, NULL, 222.00, NULL, NULL, 0.00, 222.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-23', '20:10:22', '2', '3', 3, 1, 3, 'Deleted', '[]', '2020-10-23 14:10:22', '2020-10-23 14:13:33'),
(21, '', '000002', 1, 222.00, NULL, NULL, NULL, NULL, NULL, NULL, 222.00, NULL, NULL, 0.00, 222.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-23', '20:13:53', '2', '', 3, 1, 3, 'Deleted', '[]', '2020-10-23 14:13:53', '2020-10-25 05:33:16'),
(22, '', '000003', 1, 250.00, NULL, NULL, NULL, NULL, NULL, NULL, 259.50, NULL, NULL, 10.00, 250.00, 0.00, 10.00, 0.00, '', 'plain', NULL, '2020-10-23', '20:16:08', '2', '', 3, 1, 3, 'Deleted', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"9.50\"}]', '2020-10-23 14:16:08', '2020-10-25 06:02:46'),
(23, '', '000003', 1, 312.00, NULL, NULL, NULL, NULL, NULL, NULL, 312.00, NULL, NULL, 10.00, 312.00, 0.00, 10.00, 0.00, '', 'plain', NULL, '2020-10-25', '11:56:14', '2', '', 3, 1, 3, 'Deleted', '[]', '2020-10-25 05:56:14', '2020-10-25 05:57:31'),
(24, '', '000003', 1, 322.00, NULL, NULL, NULL, NULL, NULL, NULL, 322.00, NULL, NULL, 0.00, 322.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-25', '11:58:55', '2', '', 3, 1, 3, 'Deleted', '[]', '2020-10-25 05:58:55', '2020-10-25 06:02:42'),
(25, '30', '000002', 2, 350.00, NULL, NULL, NULL, NULL, NULL, NULL, 360.00, NULL, NULL, 0.00, 350.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-25', '12:03:14', '2', '3', 3, 1, 2, 'Deleted', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', '2020-10-25 06:03:14', '2020-10-25 06:37:31'),
(26, '', '000003', 1, 90.00, NULL, NULL, NULL, NULL, NULL, NULL, 90.00, NULL, NULL, 0.00, 90.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-25', '12:03:35', '2', '', 3, 1, 3, 'Live', '[]', '2020-10-25 06:03:35', '2020-10-25 06:03:35'),
(27, '29', '000004', 1, 302.00, NULL, NULL, NULL, NULL, NULL, NULL, 302.00, NULL, NULL, 0.00, 302.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-25', '12:19:41', '2', '3', 3, 1, 3, 'Deleted', '[]', '2020-10-25 06:19:41', '2020-10-25 06:22:20'),
(28, '', '000004', 1, 200.00, NULL, NULL, NULL, NULL, NULL, NULL, 210.00, NULL, NULL, 0.00, 200.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-25', '12:23:54', '2', '', 3, 1, 2, 'Deleted', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', '2020-10-25 06:23:54', '2020-10-25 06:24:20'),
(29, '30', '000004', 1, 302.00, NULL, NULL, NULL, NULL, NULL, NULL, 302.00, NULL, NULL, 0.00, 302.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-25', '12:32:56', '2', '3', 3, 1, 3, 'Deleted', '[]', '2020-10-25 06:32:56', '2020-10-25 06:37:20'),
(30, '30', '000003', 1, 302.00, NULL, NULL, NULL, NULL, NULL, NULL, 302.00, NULL, NULL, 0.00, 302.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-25', '12:37:52', '2', '3', 3, 1, 3, 'Live', '[]', '2020-10-25 06:37:52', '2020-10-25 06:37:52'),
(31, '30', '000004', 1, 302.00, NULL, NULL, NULL, NULL, NULL, NULL, 302.00, NULL, NULL, 0.00, 302.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-25', '12:56:04', '2', '3', 3, 1, 3, 'Live', '[]', '2020-10-25 06:56:04', '2020-10-25 06:56:04'),
(32, '30', '000005', 2, 562.00, NULL, NULL, NULL, NULL, NULL, NULL, 572.00, NULL, NULL, 0.00, 562.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2020-10-25', '13:06:32', '2', '3', 3, 1, 3, 'Live', '[{\"tax_field_id\":\"11\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"10.00\"}]', '2020-10-25 07:06:32', '2020-10-25 07:06:32'),
(33, '1', '000006', 1, 320.00, NULL, NULL, NULL, NULL, NULL, NULL, 320.00, NULL, NULL, 0.00, 320.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2021-01-15', '21:18:20', '2', '7', 3, 1, 2, 'Live', '[]', '2021-01-15 15:18:20', '2021-01-15 15:18:20'),
(34, '1', '000007', 1, 120.00, NULL, NULL, NULL, NULL, NULL, NULL, 120.00, NULL, NULL, 0.00, 120.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2021-01-22', '01:13:11', '2', '7', 3, 1, 1, 'Live', '[]', '2021-01-21 19:13:11', '2021-01-21 19:13:11'),
(35, '1', '000008', 3, 300.00, NULL, NULL, NULL, NULL, NULL, NULL, 321.00, NULL, NULL, 0.00, 300.00, 0.00, 0.00, 0.00, '', 'plain', NULL, '2021-01-23', '00:32:36', '2', '7', 3, 1, 2, 'Live', '[{\"tax_field_id\":\"33\",\"tax_field_type\":\"VAT\",\"tax_field_amount\":\"21.00\"}]', '2021-01-22 18:32:36', '2021-01-22 18:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_sales_holds_details`
--

DROP TABLE IF EXISTS `tbl_restaurant_sales_holds_details`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_sales_holds_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `food_menu_id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` bigint(20) UNSIGNED NOT NULL,
  `menu_price_without_discount` double(10,2) NOT NULL,
  `menu_price_with_discount` double(10,2) NOT NULL,
  `menu_unit_price` double(10,2) NOT NULL,
  `menu_vat_percentage` double(10,2) DEFAULT NULL,
  `menu_taxes` text COLLATE utf8mb4_unicode_ci,
  `menu_discount_value` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_note` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` double(10,2) DEFAULT NULL,
  `holds_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_sales_holds_details_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_sales_holds_details`
--

INSERT INTO `tbl_restaurant_sales_holds_details` (`id`, `food_menu_id`, `menu_name`, `qty`, `menu_price_without_discount`, `menu_price_with_discount`, `menu_unit_price`, `menu_vat_percentage`, `menu_taxes`, `menu_discount_value`, `discount_type`, `menu_note`, `discount_amount`, `holds_id`, `user_id`, `restaurant_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 8, 'food menu 2 _(multiple shift) (06)', 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, 2, '2', 3, 'Deleted', '2020-10-22 10:06:10', '2020-10-22 21:06:49'),
(5, 8, 'food menu 2 _(multiple shift) (06)', 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, 3, '2', 3, 'Live', '2020-10-22 10:38:41', '2020-10-22 10:38:41'),
(6, 8, 'food menu 2 _(multiple shift) (06)', 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, 4, '2', 3, 'Deleted', '2020-10-22 10:40:41', '2020-10-22 21:21:50'),
(7, 8, 'food menu 2 _(multiple shift) (06)', 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, 5, '2', 3, 'Deleted', '2020-10-22 10:41:42', '2020-10-22 21:21:50'),
(8, 9, 'food menu 2 _(vat/tax) (07)', 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '0', 'plain', '', 0.00, 6, '2', 3, 'Deleted', '2020-10-22 10:43:10', '2020-10-22 21:21:50'),
(9, 9, 'food menu 2 _(vat/tax) (07)', 1, 90.00, 80.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '10', 'plain', '', 10.00, 7, '2', 3, 'Deleted', '2020-10-22 10:43:54', '2020-10-22 21:21:50'),
(10, 9, 'food menu 2 _(vat/tax) (07)', 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '0', 'plain', '', 0.00, 8, '2', 3, 'Deleted', '2020-10-22 10:45:07', '2020-10-22 21:21:50'),
(11, 8, 'food menu 2 _(multiple shift) (06)', 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, 9, '2', 3, 'Deleted', '2020-10-22 11:19:35', '2020-10-22 21:21:50'),
(12, 8, 'food menu 2 _(multiple shift) (06)', 1, 220.00, 220.00, 220.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"11.00\",\"item_vat_amount_for_all_quantity\":\"11.00\"}]', '0', 'plain', '', 0.00, 10, '2', 3, 'Deleted', '2020-10-22 13:16:01', '2020-10-22 21:21:50'),
(13, 8, 'food menu 2 _(multiple shift) (06)', 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, 11, '2', 3, 'Deleted', '2020-10-22 13:44:30', '2020-10-22 21:21:50'),
(14, 8, 'food menu 2 _(multiple shift) (06)', 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, 12, '2', 3, 'Live', '2020-10-22 15:17:42', '2020-10-22 21:21:50'),
(15, 9, 'food menu 2 _(vat/tax) (07)', 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '0', 'plain', '', 0.00, 12, '2', 3, 'Live', '2020-10-22 15:17:42', '2020-10-22 21:21:50'),
(16, 8, 'food menu 2 _(multiple shift) (06)', 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, 12, '2', 3, 'Live', '2020-10-22 15:17:42', '2020-10-22 21:21:50'),
(17, 8, 'food menu 2 _(multiple shift) (06)', 1, 200.00, 190.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '10', 'plain', 'note check in open hold sale', 10.00, 13, '2', 3, 'Deleted', '2020-10-23 13:37:20', '2020-10-23 13:39:07'),
(18, 8, 'food menu 2 _(multiple shift) (06)', 1, 200.00, 190.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '10', 'plain', 'note check for open hold sale', 10.00, 14, '2', 3, 'Deleted', '2020-10-23 13:39:51', '2020-10-23 13:57:36'),
(19, 3, 'food menu 3 (02)', 1, 110.00, 110.00, 110.00, NULL, '\"\"', '0', 'plain', '', 0.00, 15, '2', 3, 'Deleted', '2020-10-23 13:56:27', '2020-10-23 13:57:29'),
(20, 3, 'food menu 3 (02)', 1, 110.00, 110.00, 110.00, NULL, '\"\"', '0', 'plain', '', 0.00, 16, '2', 3, 'Deleted', '2020-10-23 13:58:02', '2020-10-23 14:00:07'),
(21, 3, 'food menu 3 (02)', 1, 110.00, 110.00, 110.00, NULL, '\"\"', '0', 'plain', '', 0.00, 17, '2', 3, 'Deleted', '2020-10-23 14:00:40', '2020-10-23 14:02:03'),
(22, 3, 'food menu 3 (02)', 1, 110.00, 110.00, 110.00, NULL, '\"\"', '0', 'plain', '', 0.00, 18, '2', 3, 'Deleted', '2020-10-23 14:02:27', '2020-10-23 14:04:44'),
(23, 3, 'food menu 3 (02)', 1, 110.00, 110.00, 110.00, NULL, '\"\"', '0', 'plain', '', 0.00, 19, '2', 3, 'Deleted', '2020-10-23 14:05:06', '2020-10-23 14:13:36'),
(24, 3, 'food menu 3 (02)', 1, 110.00, 110.00, 110.00, NULL, '\"\"', '0', 'plain', '', 0.00, 20, '2', 3, 'Deleted', '2020-10-23 14:10:22', '2020-10-23 14:13:33'),
(25, 3, 'food menu 3 (02)', 1, 110.00, 110.00, 110.00, NULL, '\"\"', '0', 'plain', '', 0.00, 21, '2', 3, 'Deleted', '2020-10-23 14:13:53', '2020-10-25 05:33:16'),
(26, 8, 'food menu 2 _(multiple shift) (06)', 1, 200.00, 190.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '10', 'plain', 'note', 10.00, 22, '2', 3, 'Deleted', '2020-10-23 14:16:08', '2020-10-25 06:02:46'),
(27, 3, 'food menu 3 (02)', 1, 110.00, 100.00, 110.00, NULL, '\"\"', '10', 'plain', 'note', 10.00, 23, '2', 3, 'Deleted', '2020-10-25 05:56:14', '2020-10-25 05:57:31'),
(28, 3, 'food menu 3 (02)', 1, 110.00, 110.00, 110.00, NULL, '\"\"', '0', 'plain', '', 0.00, 24, '2', 3, 'Deleted', '2020-10-25 05:58:55', '2020-10-25 06:02:42'),
(29, 8, 'food menu 2 _(multiple shift) (06)', 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, 25, '2', 3, 'Deleted', '2020-10-25 06:03:14', '2020-10-25 06:37:31'),
(30, 9, 'food menu 2 _(vat/tax) (07)', 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '0', 'plain', '', 0.00, 26, '2', 3, 'Live', '2020-10-25 06:03:35', '2020-10-25 06:03:35'),
(31, 9, 'food menu 2 _(vat/tax) (07)', 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '0', 'plain', '', 0.00, 27, '2', 3, 'Deleted', '2020-10-25 06:19:41', '2020-10-25 06:22:20'),
(32, 8, 'food menu 2 _(multiple shift) (06)', 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, 28, '2', 3, 'Deleted', '2020-10-25 06:23:54', '2020-10-25 06:24:20'),
(33, 9, 'food menu 2 _(vat/tax) (07)', 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '0', 'plain', 'note', 0.00, 29, '2', 3, 'Deleted', '2020-10-25 06:32:56', '2020-10-25 06:37:20'),
(34, 9, 'food menu 2 _(vat/tax) (07)', 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '0', 'plain', '', 0.00, 30, '2', 3, 'Live', '2020-10-25 06:37:52', '2020-10-25 06:37:52'),
(35, 9, 'food menu 2 _(vat/tax) (07)', 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '0', 'plain', '', 0.00, 31, '2', 3, 'Live', '2020-10-25 06:56:04', '2020-10-25 06:56:04'),
(36, 9, 'food menu 2 _(vat/tax) (07)', 1, 90.00, 90.00, 90.00, NULL, '[{\"tax_field_id\":34,\"tax_field_name\":\"IGST\",\"tax_field_percentage\":1,\"item_vat_amount_for_unit_item\":\"0.90\",\"item_vat_amount_for_all_quantity\":\"0.90\"}]', '0', 'plain', '', 0.00, 32, '2', 3, 'Live', '2020-10-25 07:06:32', '2020-10-25 07:06:32'),
(37, 8, 'food menu 2 _(multiple shift) (06)', 1, 200.00, 200.00, 200.00, NULL, '[{\"tax_field_id\":\"11\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"5\",\"item_vat_amount_for_unit_item\":\"10.00\",\"item_vat_amount_for_all_quantity\":\"10.00\"}]', '0', 'plain', '', 0.00, 32, '2', 3, 'Live', '2020-10-25 07:06:32', '2020-10-25 07:06:32'),
(38, 3, 'food menu 3 (02)', 2, 200.00, 200.00, 100.00, NULL, '\"\"', '0', 'plain', '', 0.00, 33, '2', 3, 'Live', '2021-01-15 15:18:20', '2021-01-15 15:18:20'),
(39, 3, 'food menu 3 (02)', 1, 120.00, 120.00, 120.00, NULL, '\"\"', '0', 'plain', '', 0.00, 34, '2', 3, 'Live', '2021-01-21 19:13:11', '2021-01-21 19:13:11'),
(40, 5, 'menu 2 (04)', 1, 100.00, 100.00, 100.00, NULL, '[{\"tax_field_id\":33,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7,\"item_vat_amount_for_unit_item\":\"7.00\",\"item_vat_amount_for_all_quantity\":\"7.00\"}]', '0', 'plain', '', 0.00, 35, '2', 3, 'Live', '2021-01-22 18:32:36', '2021-01-22 18:32:36'),
(41, 5, 'menu 2 (04)', 1, 100.00, 100.00, 100.00, NULL, '[{\"tax_field_id\":33,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7,\"item_vat_amount_for_unit_item\":\"7.00\",\"item_vat_amount_for_all_quantity\":\"7.00\"}]', '0', 'plain', '', 0.00, 35, '2', 3, 'Live', '2021-01-22 18:32:36', '2021-01-22 18:32:36'),
(42, 5, 'menu 2 (04)', 1, 100.00, 100.00, 100.00, NULL, '[{\"tax_field_id\":33,\"tax_field_name\":\"VAT\",\"tax_field_percentage\":7,\"item_vat_amount_for_unit_item\":\"7.00\",\"item_vat_amount_for_all_quantity\":\"7.00\"}]', '0', 'plain', '', 0.00, 35, '2', 3, 'Live', '2021-01-22 18:32:36', '2021-01-22 18:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_sales_holds_details_modifiers`
--

DROP TABLE IF EXISTS `tbl_restaurant_sales_holds_details_modifiers`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_sales_holds_details_modifiers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `modifier_id` bigint(20) UNSIGNED NOT NULL,
  `modifier_price` double(10,2) NOT NULL,
  `food_menu_id` bigint(20) UNSIGNED NOT NULL,
  `holds_id` bigint(20) UNSIGNED NOT NULL,
  `holds_details_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurant_id` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_sales_holds_details_modifiers`
--

INSERT INTO `tbl_restaurant_sales_holds_details_modifiers` (`id`, `modifier_id`, `modifier_price`, `food_menu_id`, `holds_id`, `holds_details_id`, `user_id`, `restaurant_id`, `customer_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 15, 60.00, 3, 21, 25, '2', 3, '', 'Deleted', '2020-10-23 14:13:53', '2020-10-25 05:33:16'),
(2, 15, 60.00, 8, 22, 26, '2', 3, '', 'Deleted', '2020-10-23 14:16:08', '2020-10-25 06:02:46'),
(3, 15, 60.00, 3, 23, 27, '2', 3, '', 'Deleted', '2020-10-25 05:56:14', '2020-10-25 05:57:31'),
(4, 15, 60.00, 3, 24, 28, '2', 3, '', 'Deleted', '2020-10-25 05:58:55', '2020-10-25 06:02:42'),
(5, 15, 60.00, 8, 25, 29, '2', 3, '30', 'Deleted', '2020-10-25 06:03:14', '2020-10-25 06:37:31'),
(6, 15, 60.00, 9, 27, 31, '2', 3, '29', 'Deleted', '2020-10-25 06:19:41', '2020-10-25 06:22:20'),
(7, 15, 60.00, 9, 29, 33, '2', 3, '30', 'Deleted', '2020-10-25 06:32:56', '2020-10-25 06:37:20'),
(8, 15, 60.00, 9, 30, 34, '2', 3, '30', 'Live', '2020-10-25 06:37:52', '2020-10-25 06:37:52'),
(9, 14, 52.00, 9, 30, 34, '2', 3, '30', 'Live', '2020-10-25 06:37:52', '2020-10-25 06:37:52'),
(10, 13, 100.00, 9, 30, 34, '2', 3, '30', 'Live', '2020-10-25 06:37:52', '2020-10-25 06:37:52'),
(11, 15, 60.00, 9, 31, 35, '2', 3, '30', 'Live', '2020-10-25 06:56:04', '2020-10-25 06:56:04'),
(12, 14, 52.00, 9, 31, 35, '2', 3, '30', 'Live', '2020-10-25 06:56:04', '2020-10-25 06:56:04'),
(13, 13, 100.00, 9, 31, 35, '2', 3, '30', 'Live', '2020-10-25 06:56:04', '2020-10-25 06:56:04'),
(14, 15, 60.00, 9, 32, 36, '2', 3, '30', 'Live', '2020-10-25 07:06:32', '2020-10-25 07:06:32'),
(15, 14, 52.00, 9, 32, 36, '2', 3, '30', 'Live', '2020-10-25 07:06:32', '2020-10-25 07:06:32'),
(16, 13, 100.00, 9, 32, 36, '2', 3, '30', 'Live', '2020-10-25 07:06:32', '2020-10-25 07:06:32'),
(17, 15, 60.00, 8, 32, 37, '2', 3, '30', 'Live', '2020-10-25 07:06:32', '2020-10-25 07:06:32'),
(18, 15, 60.00, 3, 33, 38, '2', 3, '1', 'Live', '2021-01-15 15:18:20', '2021-01-15 15:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_sales_payment_by_gift_cards`
--

DROP TABLE IF EXISTS `tbl_restaurant_sales_payment_by_gift_cards`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_sales_payment_by_gift_cards` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `paid_amount` double(10,2) NOT NULL,
  `sales_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gift_card_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_sales_payment_by_gift_cards_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_sales_payment_by_gift_cards`
--

INSERT INTO `tbl_restaurant_sales_payment_by_gift_cards` (`id`, `paid_amount`, `sales_id`, `gift_card_id`, `user_id`, `restaurant_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 291.00, '40', '1', '2', 3, 'Live', '2020-12-28 10:37:13', '2020-12-28 10:37:13'),
(2, 129.00, '15', '1', '2', 3, 'Live', '2020-12-28 15:14:43', '2020-12-28 15:14:43'),
(3, 107.50, '17', '1', '2', 3, 'Live', '2020-12-28 15:30:16', '2020-12-28 15:30:16'),
(4, 190.00, '35', '1', '2', 3, 'Live', '2020-12-28 15:43:17', '2020-12-28 15:43:17'),
(5, 210.00, '46', '2', '2', 3, 'Live', '2020-12-28 16:10:16', '2020-12-28 16:10:16'),
(6, 270.00, '36', '1', '2', 3, 'Live', '2020-12-28 16:12:52', '2020-12-28 16:12:52'),
(8, 510.00, '29', '4', '2', 3, 'Live', '2020-12-29 05:00:39', '2020-12-29 05:00:39'),
(9, 200.00, '25', '4', '2', 3, 'Live', '2020-12-29 05:07:48', '2020-12-29 05:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_settings_charges`
--

DROP TABLE IF EXISTS `tbl_restaurant_settings_charges`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_settings_charges` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `unit` bigint(20) UNSIGNED NOT NULL,
  `one_time_charge` double(10,2) DEFAULT NULL,
  `monthly_charge` double(10,2) DEFAULT NULL,
  `annual_charge` double(10,2) DEFAULT NULL,
  `charge_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_settings_charges_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_settings_charges`
--

INSERT INTO `tbl_restaurant_settings_charges` (`id`, `unit`, `one_time_charge`, `monthly_charge`, `annual_charge`, `charge_id`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(1, 100, 1000.00, 1500.00, 12000.00, '1', 5, '2020-12-17 07:25:31', '2020-12-17 07:25:31'),
(2, 5, 500.00, 900.00, 10800.00, '2', 5, '2020-12-17 07:47:04', '2020-12-17 07:47:04'),
(3, 55, 666.00, 5555.00, 66666.00, '1', 3, '2020-12-17 09:30:48', '2020-12-17 14:56:16'),
(4, 10, 2000.00, 20000.00, 200000.00, '2', 3, '2020-12-17 14:49:58', '2020-12-17 14:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_settings_cuisines`
--

DROP TABLE IF EXISTS `tbl_restaurant_settings_cuisines`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_settings_cuisines` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cuisine_id` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_settings_cuisines`
--

INSERT INTO `tbl_restaurant_settings_cuisines` (`id`, `cuisine_id`, `restaurant_id`, `user_id`, `created_at`, `updated_at`) VALUES
(25, '22', 5, '5', '2021-01-06 20:30:15', '2021-01-06 20:30:15'),
(26, '20', 5, '5', '2021-01-06 20:30:15', '2021-01-06 20:30:15'),
(27, '1', 5, '5', '2021-01-06 20:30:15', '2021-01-06 20:30:15'),
(28, '22', 3, '2', '2021-01-12 19:35:03', '2021-01-12 19:35:03'),
(29, '21', 3, '2', '2021-01-12 19:35:03', '2021-01-12 19:35:03'),
(30, '20', 3, '2', '2021-01-12 19:35:03', '2021-01-12 19:35:03'),
(31, '19', 3, '2', '2021-01-12 19:35:03', '2021-01-12 19:35:03'),
(32, '18', 3, '2', '2021-01-12 19:35:03', '2021-01-12 19:35:03'),
(33, '17', 3, '2', '2021-01-12 19:35:03', '2021-01-12 19:35:03'),
(34, '16', 3, '2', '2021-01-12 19:35:03', '2021-01-12 19:35:03'),
(35, '15', 3, '2', '2021-01-12 19:35:03', '2021-01-12 19:35:03'),
(36, '10', 3, '2', '2021-01-12 19:35:03', '2021-01-12 19:35:03'),
(37, '1', 3, '2', '2021-01-12 19:35:03', '2021-01-12 19:35:03'),
(38, '22', 8, '10', '2021-01-19 18:22:13', '2021-01-19 18:22:13'),
(39, '21', 8, '10', '2021-01-19 18:22:13', '2021-01-19 18:22:13'),
(40, '20', 8, '10', '2021-01-19 18:22:13', '2021-01-19 18:22:13'),
(41, '18', 8, '10', '2021-01-19 18:22:13', '2021-01-19 18:22:13'),
(42, '17', 8, '10', '2021-01-19 18:22:13', '2021-01-19 18:22:13'),
(43, '11', 8, '10', '2021-01-19 18:22:13', '2021-01-19 18:22:13'),
(44, '1', 8, '10', '2021-01-19 18:22:13', '2021-01-19 18:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_settings_logos`
--

DROP TABLE IF EXISTS `tbl_restaurant_settings_logos`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_settings_logos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_settings_logos_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_settings_logos`
--

INSERT INTO `tbl_restaurant_settings_logos` (`id`, `logo`, `restaurant_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1599040581_Iq5UY9.jpg', 3, '2', '2020-09-02 03:51:20', '2020-09-02 03:56:21'),
(2, '1609965227_default-image-merchant.png', 5, '5', '2021-01-06 20:33:47', '2021-01-06 20:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_settings_social_links`
--

DROP TABLE IF EXISTS `tbl_restaurant_settings_social_links`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_settings_social_links` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_id` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_settings_social_links_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_settings_social_links`
--

INSERT INTO `tbl_restaurant_settings_social_links` (`id`, `username`, `password`, `social_media_id`, `restaurant_id`, `user_id`, `created_at`, `updated_at`) VALUES
(14, 'hotpotlegend', '123456', '1', 8, '10', '2021-01-20 17:29:18', '2021-01-20 17:29:18'),
(15, 'rpm.shuvo', 'snprobbx', '1', 3, '2', '2021-01-22 18:43:06', '2021-01-22 18:43:06'),
(16, 'rpm_shuvo', 'gjvggre', '4', 3, '2', '2021-01-22 18:43:06', '2021-01-22 18:43:06'),
(17, 'diny@mailinator.com', 'unatbhg', '3', 3, '2', '2021-01-22 18:43:06', '2021-01-22 18:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_settings_taxes`
--

DROP TABLE IF EXISTS `tbl_restaurant_settings_taxes`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_settings_taxes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `collect_tax` enum('Yes','No') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_settings_taxes_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_settings_taxes`
--

INSERT INTO `tbl_restaurant_settings_taxes` (`id`, `collect_tax`, `reg_no`, `restaurant_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Yes', '0123456789', 3, '2', '2020-09-02 03:51:20', '2020-09-02 04:20:15'),
(2, 'Yes', '0101123', 5, '5', '2021-01-06 20:29:25', '2021-01-06 20:29:25'),
(3, 'Yes', '0101123', 8, '10', '2021-01-19 18:22:54', '2021-01-19 18:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_settings_tax_fields`
--

DROP TABLE IF EXISTS `tbl_restaurant_settings_tax_fields`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_settings_tax_fields` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tax_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rate` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_settings_tax_fields_tax_id_foreign` (`tax_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_settings_tax_fields`
--

INSERT INTO `tbl_restaurant_settings_tax_fields` (`id`, `tax_id`, `name`, `created_at`, `updated_at`, `rate`) VALUES
(47, 2, 'IGST', '2021-01-06 20:29:38', '2021-01-06 20:29:38', 7.50),
(50, 3, 'VAT', '2021-01-20 17:29:18', '2021-01-20 17:29:18', 7.50),
(51, 1, 'VAT', '2021-01-22 18:43:06', '2021-01-22 18:43:06', 7.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_settings_third_party_vendors`
--

DROP TABLE IF EXISTS `tbl_restaurant_settings_third_party_vendors`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_settings_third_party_vendors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `availability` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `third_party_vendors_id` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_settings_third_party_vendors`
--

INSERT INTO `tbl_restaurant_settings_third_party_vendors` (`id`, `availability`, `third_party_vendors_id`, `restaurant_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Yes', '1', 3, '2', '2020-12-16 15:19:31', '2020-12-17 10:59:20'),
(3, 'No', '2', 3, '2', '2020-12-16 15:47:18', '2021-01-04 16:29:13'),
(4, 'Yes', '1', 5, '5', '2021-01-06 20:29:52', '2021-01-06 20:30:01'),
(5, 'Yes', '2', 5, '5', '2021-01-06 20:29:52', '2021-01-06 20:30:04'),
(6, 'Yes', '1', 8, '10', '2021-01-19 18:22:24', '2021-01-19 18:22:35'),
(7, 'No', '2', 8, '10', '2021-01-19 18:22:24', '2021-01-19 18:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_shift_for_food_menus`
--

DROP TABLE IF EXISTS `tbl_restaurant_shift_for_food_menus`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_shift_for_food_menus` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shift_id` bigint(20) UNSIGNED NOT NULL,
  `fd_menu_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_shift_for_food_menus_shift_id_foreign` (`shift_id`),
  KEY `tbl_restaurant_shift_for_food_menus_fd_menu_id_foreign` (`fd_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=415 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_shift_for_food_menus`
--

INSERT INTO `tbl_restaurant_shift_for_food_menus` (`id`, `shift_id`, `fd_menu_id`, `del_status`, `created_at`, `updated_at`) VALUES
(42, 17, 8, 'Live', '2021-01-22 18:43:29', '2021-01-22 18:43:29'),
(43, 10, 8, 'Live', '2021-01-22 18:43:29', '2021-01-22 18:43:29'),
(44, 9, 8, 'Live', '2021-01-22 18:43:29', '2021-01-22 18:43:29'),
(45, 9, 6, 'Live', '2021-01-22 18:52:25', '2021-01-22 18:52:25'),
(46, 9, 5, 'Live', '2021-01-22 18:52:57', '2021-01-22 18:52:57'),
(47, 17, 9, 'Live', '2021-01-22 18:56:28', '2021-01-22 18:56:28'),
(48, 10, 9, 'Live', '2021-01-22 18:56:28', '2021-01-22 18:56:28'),
(49, 17, 4, 'Live', '2021-01-22 18:56:39', '2021-01-22 18:56:39'),
(50, 17, 3, 'Live', '2021-01-22 18:56:51', '2021-01-22 18:56:51'),
(51, 9, 3, 'Live', '2021-01-22 18:56:51', '2021-01-22 18:56:51'),
(52, 18, 10, 'Live', '2021-01-23 20:32:49', '2021-01-23 20:32:49'),
(53, 19, 11, 'Live', '2021-01-23 20:33:49', '2021-01-23 20:33:49'),
(54, 18, 12, 'Live', '2021-01-23 20:34:51', '2021-01-23 20:34:51'),
(55, 19, 13, 'Live', '2021-01-23 20:35:24', '2021-01-23 20:35:24'),
(56, 18, 14, 'Live', '2021-01-23 20:36:38', '2021-01-23 20:36:38'),
(57, 19, 15, 'Live', '2021-01-23 20:37:13', '2021-01-23 20:37:13'),
(58, 18, 16, 'Live', '2021-01-23 20:38:03', '2021-01-23 20:38:03'),
(59, 19, 17, 'Live', '2021-01-23 20:38:50', '2021-01-23 20:38:50'),
(60, 18, 18, 'Live', '2021-01-23 20:39:50', '2021-01-23 20:39:50'),
(61, 19, 19, 'Live', '2021-01-23 20:40:38', '2021-01-23 20:40:38'),
(64, 19, 21, 'Live', '2021-01-23 20:42:25', '2021-01-23 20:42:25'),
(65, 18, 20, 'Live', '2021-01-23 20:42:37', '2021-01-23 20:42:37'),
(66, 18, 22, 'Live', '2021-01-23 20:44:27', '2021-01-23 20:44:27'),
(67, 19, 23, 'Live', '2021-01-23 20:44:59', '2021-01-23 20:44:59'),
(68, 19, 24, 'Live', '2021-01-23 20:54:15', '2021-01-23 20:54:15'),
(69, 18, 24, 'Live', '2021-01-23 20:54:15', '2021-01-23 20:54:15'),
(70, 19, 25, 'Live', '2021-01-23 20:54:59', '2021-01-23 20:54:59'),
(71, 18, 25, 'Live', '2021-01-23 20:54:59', '2021-01-23 20:54:59'),
(72, 19, 26, 'Live', '2021-01-23 20:55:31', '2021-01-23 20:55:31'),
(73, 18, 26, 'Live', '2021-01-23 20:55:31', '2021-01-23 20:55:31'),
(74, 19, 27, 'Live', '2021-01-23 20:56:36', '2021-01-23 20:56:36'),
(75, 18, 27, 'Live', '2021-01-23 20:56:36', '2021-01-23 20:56:36'),
(76, 19, 28, 'Live', '2021-01-23 20:57:27', '2021-01-23 20:57:27'),
(77, 18, 28, 'Live', '2021-01-23 20:57:27', '2021-01-23 20:57:27'),
(78, 19, 29, 'Live', '2021-01-23 20:57:49', '2021-01-23 20:57:49'),
(79, 18, 29, 'Live', '2021-01-23 20:57:49', '2021-01-23 20:57:49'),
(80, 19, 30, 'Live', '2021-01-23 20:58:26', '2021-01-23 20:58:26'),
(81, 18, 30, 'Live', '2021-01-23 20:58:26', '2021-01-23 20:58:26'),
(82, 19, 31, 'Live', '2021-01-23 20:58:47', '2021-01-23 20:58:47'),
(83, 18, 31, 'Live', '2021-01-23 20:58:47', '2021-01-23 20:58:47'),
(84, 19, 32, 'Live', '2021-01-23 20:59:14', '2021-01-23 20:59:14'),
(85, 18, 32, 'Live', '2021-01-23 20:59:14', '2021-01-23 20:59:14'),
(86, 19, 33, 'Live', '2021-01-23 20:59:34', '2021-01-23 20:59:34'),
(87, 18, 33, 'Live', '2021-01-23 20:59:34', '2021-01-23 20:59:34'),
(88, 19, 34, 'Live', '2021-01-23 21:00:01', '2021-01-23 21:00:01'),
(89, 18, 34, 'Live', '2021-01-23 21:00:01', '2021-01-23 21:00:01'),
(90, 19, 35, 'Live', '2021-01-23 21:00:29', '2021-01-23 21:00:29'),
(91, 18, 35, 'Live', '2021-01-23 21:00:29', '2021-01-23 21:00:29'),
(92, 19, 36, 'Live', '2021-01-23 21:01:39', '2021-01-23 21:01:39'),
(93, 18, 36, 'Live', '2021-01-23 21:01:39', '2021-01-23 21:01:39'),
(94, 19, 37, 'Live', '2021-01-23 21:01:58', '2021-01-23 21:01:58'),
(95, 18, 37, 'Live', '2021-01-23 21:01:58', '2021-01-23 21:01:58'),
(96, 19, 38, 'Live', '2021-01-23 21:02:36', '2021-01-23 21:02:36'),
(97, 18, 38, 'Live', '2021-01-23 21:02:36', '2021-01-23 21:02:36'),
(98, 19, 39, 'Live', '2021-01-23 21:03:08', '2021-01-23 21:03:08'),
(99, 18, 39, 'Live', '2021-01-23 21:03:08', '2021-01-23 21:03:08'),
(100, 19, 40, 'Live', '2021-01-23 21:03:32', '2021-01-23 21:03:32'),
(101, 18, 40, 'Live', '2021-01-23 21:03:32', '2021-01-23 21:03:32'),
(102, 19, 41, 'Live', '2021-01-23 21:03:58', '2021-01-23 21:03:58'),
(103, 18, 41, 'Live', '2021-01-23 21:03:58', '2021-01-23 21:03:58'),
(104, 19, 42, 'Live', '2021-01-23 21:04:38', '2021-01-23 21:04:38'),
(105, 18, 42, 'Live', '2021-01-23 21:04:38', '2021-01-23 21:04:38'),
(106, 19, 43, 'Live', '2021-01-23 21:05:00', '2021-01-23 21:05:00'),
(107, 18, 43, 'Live', '2021-01-23 21:05:00', '2021-01-23 21:05:00'),
(108, 19, 44, 'Live', '2021-01-23 21:05:30', '2021-01-23 21:05:30'),
(109, 18, 44, 'Live', '2021-01-23 21:05:30', '2021-01-23 21:05:30'),
(110, 19, 45, 'Live', '2021-01-23 21:06:07', '2021-01-23 21:06:07'),
(111, 18, 45, 'Live', '2021-01-23 21:06:07', '2021-01-23 21:06:07'),
(112, 19, 46, 'Live', '2021-01-23 21:06:32', '2021-01-23 21:06:32'),
(113, 18, 46, 'Live', '2021-01-23 21:06:32', '2021-01-23 21:06:32'),
(114, 19, 47, 'Live', '2021-01-23 21:06:52', '2021-01-23 21:06:52'),
(115, 18, 47, 'Live', '2021-01-23 21:06:52', '2021-01-23 21:06:52'),
(116, 19, 48, 'Live', '2021-01-23 21:07:15', '2021-01-23 21:07:15'),
(117, 18, 48, 'Live', '2021-01-23 21:07:15', '2021-01-23 21:07:15'),
(118, 19, 49, 'Live', '2021-01-23 21:07:42', '2021-01-23 21:07:42'),
(119, 18, 49, 'Live', '2021-01-23 21:07:42', '2021-01-23 21:07:42'),
(120, 19, 50, 'Live', '2021-01-23 21:08:28', '2021-01-23 21:08:28'),
(121, 18, 50, 'Live', '2021-01-23 21:08:28', '2021-01-23 21:08:28'),
(122, 19, 51, 'Live', '2021-01-23 21:08:46', '2021-01-23 21:08:46'),
(123, 18, 51, 'Live', '2021-01-23 21:08:46', '2021-01-23 21:08:46'),
(124, 19, 52, 'Live', '2021-01-23 21:09:19', '2021-01-23 21:09:19'),
(125, 18, 52, 'Live', '2021-01-23 21:09:19', '2021-01-23 21:09:19'),
(126, 19, 53, 'Live', '2021-01-23 21:09:42', '2021-01-23 21:09:42'),
(127, 18, 53, 'Live', '2021-01-23 21:09:42', '2021-01-23 21:09:42'),
(128, 19, 54, 'Live', '2021-01-23 21:10:09', '2021-01-23 21:10:09'),
(129, 18, 54, 'Live', '2021-01-23 21:10:09', '2021-01-23 21:10:09'),
(130, 19, 55, 'Live', '2021-01-23 21:10:38', '2021-01-23 21:10:38'),
(131, 18, 55, 'Live', '2021-01-23 21:10:38', '2021-01-23 21:10:38'),
(132, 19, 56, 'Live', '2021-01-23 21:11:06', '2021-01-23 21:11:06'),
(133, 18, 56, 'Live', '2021-01-23 21:11:06', '2021-01-23 21:11:06'),
(134, 19, 57, 'Live', '2021-01-23 21:11:32', '2021-01-23 21:11:32'),
(135, 18, 57, 'Live', '2021-01-23 21:11:32', '2021-01-23 21:11:32'),
(136, 19, 58, 'Live', '2021-01-23 21:12:07', '2021-01-23 21:12:07'),
(137, 18, 58, 'Live', '2021-01-23 21:12:07', '2021-01-23 21:12:07'),
(138, 19, 59, 'Live', '2021-01-23 21:12:25', '2021-01-23 21:12:25'),
(139, 18, 59, 'Live', '2021-01-23 21:12:25', '2021-01-23 21:12:25'),
(140, 19, 60, 'Live', '2021-01-23 21:14:03', '2021-01-23 21:14:03'),
(141, 18, 60, 'Live', '2021-01-23 21:14:03', '2021-01-23 21:14:03'),
(142, 19, 61, 'Live', '2021-01-23 21:14:25', '2021-01-23 21:14:25'),
(143, 18, 61, 'Live', '2021-01-23 21:14:25', '2021-01-23 21:14:25'),
(144, 19, 62, 'Live', '2021-01-23 21:14:59', '2021-01-23 21:14:59'),
(145, 18, 62, 'Live', '2021-01-23 21:14:59', '2021-01-23 21:14:59'),
(146, 19, 63, 'Live', '2021-01-23 21:15:16', '2021-01-23 21:15:16'),
(147, 18, 63, 'Live', '2021-01-23 21:15:16', '2021-01-23 21:15:16'),
(148, 19, 64, 'Live', '2021-01-23 21:15:51', '2021-01-23 21:15:51'),
(149, 18, 64, 'Live', '2021-01-23 21:15:51', '2021-01-23 21:15:51'),
(150, 19, 65, 'Live', '2021-01-23 21:16:09', '2021-01-23 21:16:09'),
(151, 18, 65, 'Live', '2021-01-23 21:16:09', '2021-01-23 21:16:09'),
(152, 19, 66, 'Live', '2021-01-23 21:16:50', '2021-01-23 21:16:50'),
(153, 18, 66, 'Live', '2021-01-23 21:16:50', '2021-01-23 21:16:50'),
(154, 19, 67, 'Live', '2021-01-23 21:17:11', '2021-01-23 21:17:11'),
(155, 18, 67, 'Live', '2021-01-23 21:17:11', '2021-01-23 21:17:11'),
(156, 19, 68, 'Live', '2021-01-23 21:17:44', '2021-01-23 21:17:44'),
(157, 18, 68, 'Live', '2021-01-23 21:17:44', '2021-01-23 21:17:44'),
(158, 19, 69, 'Live', '2021-01-23 21:18:02', '2021-01-23 21:18:02'),
(159, 18, 69, 'Live', '2021-01-23 21:18:02', '2021-01-23 21:18:02'),
(160, 19, 70, 'Live', '2021-01-23 21:18:25', '2021-01-23 21:18:25'),
(161, 18, 70, 'Live', '2021-01-23 21:18:25', '2021-01-23 21:18:25'),
(162, 19, 71, 'Live', '2021-01-23 21:18:45', '2021-01-23 21:18:45'),
(163, 18, 71, 'Live', '2021-01-23 21:18:45', '2021-01-23 21:18:45'),
(164, 19, 72, 'Live', '2021-01-23 21:19:29', '2021-01-23 21:19:29'),
(165, 18, 72, 'Live', '2021-01-23 21:19:29', '2021-01-23 21:19:29'),
(166, 19, 73, 'Live', '2021-01-23 21:19:56', '2021-01-23 21:19:56'),
(167, 18, 73, 'Live', '2021-01-23 21:19:56', '2021-01-23 21:19:56'),
(168, 19, 74, 'Live', '2021-01-23 21:20:24', '2021-01-23 21:20:24'),
(169, 18, 74, 'Live', '2021-01-23 21:20:24', '2021-01-23 21:20:24'),
(170, 19, 75, 'Live', '2021-01-23 21:20:53', '2021-01-23 21:20:53'),
(171, 18, 75, 'Live', '2021-01-23 21:20:53', '2021-01-23 21:20:53'),
(172, 19, 76, 'Live', '2021-01-23 21:22:54', '2021-01-23 21:22:54'),
(173, 18, 76, 'Live', '2021-01-23 21:22:54', '2021-01-23 21:22:54'),
(174, 19, 77, 'Live', '2021-01-23 21:23:19', '2021-01-23 21:23:19'),
(175, 18, 77, 'Live', '2021-01-23 21:23:19', '2021-01-23 21:23:19'),
(176, 19, 78, 'Live', '2021-01-23 21:23:53', '2021-01-23 21:23:53'),
(177, 18, 78, 'Live', '2021-01-23 21:23:53', '2021-01-23 21:23:53'),
(178, 19, 79, 'Live', '2021-01-23 21:24:14', '2021-01-23 21:24:14'),
(179, 18, 79, 'Live', '2021-01-23 21:24:14', '2021-01-23 21:24:14'),
(180, 19, 80, 'Live', '2021-01-23 21:26:08', '2021-01-23 21:26:08'),
(181, 18, 80, 'Live', '2021-01-23 21:26:08', '2021-01-23 21:26:08'),
(182, 19, 81, 'Live', '2021-01-23 21:26:26', '2021-01-23 21:26:26'),
(183, 18, 81, 'Live', '2021-01-23 21:26:26', '2021-01-23 21:26:26'),
(184, 19, 82, 'Live', '2021-01-23 21:26:56', '2021-01-23 21:26:56'),
(185, 18, 82, 'Live', '2021-01-23 21:26:56', '2021-01-23 21:26:56'),
(186, 19, 83, 'Live', '2021-01-23 21:27:17', '2021-01-23 21:27:17'),
(187, 18, 83, 'Live', '2021-01-23 21:27:17', '2021-01-23 21:27:17'),
(188, 19, 84, 'Live', '2021-01-23 21:27:45', '2021-01-23 21:27:45'),
(189, 18, 84, 'Live', '2021-01-23 21:27:45', '2021-01-23 21:27:45'),
(190, 19, 85, 'Live', '2021-01-23 21:28:06', '2021-01-23 21:28:06'),
(191, 18, 85, 'Live', '2021-01-23 21:28:06', '2021-01-23 21:28:06'),
(192, 19, 86, 'Live', '2021-01-23 21:28:29', '2021-01-23 21:28:29'),
(193, 18, 86, 'Live', '2021-01-23 21:28:29', '2021-01-23 21:28:29'),
(194, 19, 87, 'Live', '2021-01-23 21:28:45', '2021-01-23 21:28:45'),
(195, 18, 87, 'Live', '2021-01-23 21:28:45', '2021-01-23 21:28:45'),
(196, 19, 88, 'Live', '2021-01-23 21:29:05', '2021-01-23 21:29:05'),
(197, 18, 88, 'Live', '2021-01-23 21:29:05', '2021-01-23 21:29:05'),
(198, 19, 89, 'Live', '2021-01-23 21:29:23', '2021-01-23 21:29:23'),
(199, 18, 89, 'Live', '2021-01-23 21:29:23', '2021-01-23 21:29:23'),
(200, 19, 90, 'Live', '2021-01-23 21:29:54', '2021-01-23 21:29:54'),
(201, 18, 90, 'Live', '2021-01-23 21:29:54', '2021-01-23 21:29:54'),
(202, 19, 91, 'Live', '2021-01-23 21:30:23', '2021-01-23 21:30:23'),
(203, 18, 91, 'Live', '2021-01-23 21:30:23', '2021-01-23 21:30:23'),
(204, 19, 92, 'Live', '2021-01-23 21:30:47', '2021-01-23 21:30:47'),
(205, 18, 92, 'Live', '2021-01-23 21:30:47', '2021-01-23 21:30:47'),
(206, 19, 93, 'Live', '2021-01-23 21:31:06', '2021-01-23 21:31:06'),
(207, 18, 93, 'Live', '2021-01-23 21:31:06', '2021-01-23 21:31:06'),
(212, 19, 94, 'Live', '2021-01-24 16:27:35', '2021-01-24 16:27:35'),
(213, 18, 94, 'Live', '2021-01-24 16:27:35', '2021-01-24 16:27:35'),
(214, 19, 95, 'Live', '2021-01-24 16:27:47', '2021-01-24 16:27:47'),
(215, 18, 95, 'Live', '2021-01-24 16:27:47', '2021-01-24 16:27:47'),
(216, 19, 96, 'Live', '2021-01-24 16:28:37', '2021-01-24 16:28:37'),
(217, 18, 96, 'Live', '2021-01-24 16:28:37', '2021-01-24 16:28:37'),
(218, 19, 97, 'Live', '2021-01-24 16:29:09', '2021-01-24 16:29:09'),
(219, 18, 97, 'Live', '2021-01-24 16:29:09', '2021-01-24 16:29:09'),
(220, 19, 98, 'Live', '2021-01-24 16:29:52', '2021-01-24 16:29:52'),
(221, 18, 98, 'Live', '2021-01-24 16:29:52', '2021-01-24 16:29:52'),
(222, 19, 99, 'Live', '2021-01-24 16:30:17', '2021-01-24 16:30:17'),
(223, 18, 99, 'Live', '2021-01-24 16:30:17', '2021-01-24 16:30:17'),
(226, 19, 100, 'Live', '2021-01-24 16:31:20', '2021-01-24 16:31:20'),
(227, 18, 100, 'Live', '2021-01-24 16:31:20', '2021-01-24 16:31:20'),
(228, 19, 101, 'Live', '2021-01-24 16:31:36', '2021-01-24 16:31:36'),
(229, 18, 101, 'Live', '2021-01-24 16:31:36', '2021-01-24 16:31:36'),
(230, 19, 102, 'Live', '2021-01-24 16:32:09', '2021-01-24 16:32:09'),
(231, 18, 102, 'Live', '2021-01-24 16:32:09', '2021-01-24 16:32:09'),
(232, 19, 103, 'Live', '2021-01-24 16:32:28', '2021-01-24 16:32:28'),
(233, 18, 103, 'Live', '2021-01-24 16:32:28', '2021-01-24 16:32:28'),
(234, 19, 104, 'Live', '2021-01-24 16:33:11', '2021-01-24 16:33:11'),
(235, 18, 104, 'Live', '2021-01-24 16:33:11', '2021-01-24 16:33:11'),
(236, 19, 105, 'Live', '2021-01-24 16:33:47', '2021-01-24 16:33:47'),
(237, 18, 105, 'Live', '2021-01-24 16:33:47', '2021-01-24 16:33:47'),
(238, 19, 106, 'Live', '2021-01-24 16:34:32', '2021-01-24 16:34:32'),
(239, 18, 106, 'Live', '2021-01-24 16:34:32', '2021-01-24 16:34:32'),
(240, 19, 107, 'Live', '2021-01-24 16:48:42', '2021-01-24 16:48:42'),
(241, 18, 107, 'Live', '2021-01-24 16:48:42', '2021-01-24 16:48:42'),
(242, 19, 108, 'Live', '2021-01-24 17:47:36', '2021-01-24 17:47:36'),
(243, 18, 108, 'Live', '2021-01-24 17:47:36', '2021-01-24 17:47:36'),
(244, 19, 109, 'Live', '2021-01-24 17:48:03', '2021-01-24 17:48:03'),
(245, 18, 109, 'Live', '2021-01-24 17:48:03', '2021-01-24 17:48:03'),
(246, 19, 110, 'Live', '2021-01-24 17:48:31', '2021-01-24 17:48:31'),
(247, 18, 110, 'Live', '2021-01-24 17:48:31', '2021-01-24 17:48:31'),
(248, 19, 111, 'Live', '2021-01-24 17:48:51', '2021-01-24 17:48:51'),
(249, 18, 111, 'Live', '2021-01-24 17:48:51', '2021-01-24 17:48:51'),
(250, 19, 112, 'Live', '2021-01-24 17:49:15', '2021-01-24 17:49:15'),
(251, 18, 112, 'Live', '2021-01-24 17:49:15', '2021-01-24 17:49:15'),
(252, 19, 113, 'Live', '2021-01-24 17:49:46', '2021-01-24 17:49:46'),
(253, 18, 113, 'Live', '2021-01-24 17:49:46', '2021-01-24 17:49:46'),
(254, 19, 114, 'Live', '2021-01-24 17:50:27', '2021-01-24 17:50:27'),
(255, 18, 114, 'Live', '2021-01-24 17:50:27', '2021-01-24 17:50:27'),
(256, 19, 115, 'Live', '2021-01-24 17:50:47', '2021-01-24 17:50:47'),
(257, 18, 115, 'Live', '2021-01-24 17:50:47', '2021-01-24 17:50:47'),
(258, 19, 116, 'Live', '2021-01-24 17:51:21', '2021-01-24 17:51:21'),
(259, 18, 116, 'Live', '2021-01-24 17:51:21', '2021-01-24 17:51:21'),
(260, 19, 117, 'Live', '2021-01-24 17:51:45', '2021-01-24 17:51:45'),
(261, 18, 117, 'Live', '2021-01-24 17:51:45', '2021-01-24 17:51:45'),
(262, 19, 118, 'Live', '2021-01-24 17:52:19', '2021-01-24 17:52:19'),
(263, 18, 118, 'Live', '2021-01-24 17:52:19', '2021-01-24 17:52:19'),
(264, 19, 119, 'Live', '2021-01-24 17:52:42', '2021-01-24 17:52:42'),
(265, 18, 119, 'Live', '2021-01-24 17:52:42', '2021-01-24 17:52:42'),
(266, 19, 120, 'Live', '2021-01-24 17:53:12', '2021-01-24 17:53:12'),
(267, 18, 120, 'Live', '2021-01-24 17:53:12', '2021-01-24 17:53:12'),
(268, 19, 121, 'Live', '2021-01-24 17:53:33', '2021-01-24 17:53:33'),
(269, 18, 121, 'Live', '2021-01-24 17:53:33', '2021-01-24 17:53:33'),
(270, 19, 122, 'Live', '2021-01-24 17:54:12', '2021-01-24 17:54:12'),
(271, 18, 122, 'Live', '2021-01-24 17:54:12', '2021-01-24 17:54:12'),
(272, 19, 123, 'Live', '2021-01-24 17:54:39', '2021-01-24 17:54:39'),
(273, 18, 123, 'Live', '2021-01-24 17:54:39', '2021-01-24 17:54:39'),
(274, 19, 124, 'Live', '2021-01-24 17:55:07', '2021-01-24 17:55:07'),
(275, 18, 124, 'Live', '2021-01-24 17:55:07', '2021-01-24 17:55:07'),
(276, 19, 125, 'Live', '2021-01-24 17:55:44', '2021-01-24 17:55:44'),
(277, 18, 125, 'Live', '2021-01-24 17:55:44', '2021-01-24 17:55:44'),
(278, 19, 126, 'Live', '2021-01-24 17:56:14', '2021-01-24 17:56:14'),
(279, 18, 126, 'Live', '2021-01-24 17:56:14', '2021-01-24 17:56:14'),
(280, 19, 127, 'Live', '2021-01-24 17:56:42', '2021-01-24 17:56:42'),
(281, 18, 127, 'Live', '2021-01-24 17:56:42', '2021-01-24 17:56:42'),
(282, 19, 128, 'Live', '2021-01-24 17:57:44', '2021-01-24 17:57:44'),
(283, 18, 128, 'Live', '2021-01-24 17:57:44', '2021-01-24 17:57:44'),
(284, 19, 129, 'Live', '2021-01-24 17:58:11', '2021-01-24 17:58:11'),
(285, 18, 129, 'Live', '2021-01-24 17:58:11', '2021-01-24 17:58:11'),
(286, 19, 130, 'Live', '2021-01-24 18:00:13', '2021-01-24 18:00:13'),
(287, 18, 130, 'Live', '2021-01-24 18:00:13', '2021-01-24 18:00:13'),
(288, 19, 131, 'Live', '2021-01-24 18:00:34', '2021-01-24 18:00:34'),
(289, 18, 131, 'Live', '2021-01-24 18:00:34', '2021-01-24 18:00:34'),
(290, 19, 132, 'Live', '2021-01-24 18:01:40', '2021-01-24 18:01:40'),
(291, 18, 132, 'Live', '2021-01-24 18:01:40', '2021-01-24 18:01:40'),
(292, 19, 133, 'Live', '2021-01-24 18:02:01', '2021-01-24 18:02:01'),
(293, 18, 133, 'Live', '2021-01-24 18:02:01', '2021-01-24 18:02:01'),
(294, 19, 134, 'Live', '2021-01-24 18:02:35', '2021-01-24 18:02:35'),
(295, 18, 134, 'Live', '2021-01-24 18:02:35', '2021-01-24 18:02:35'),
(296, 19, 135, 'Live', '2021-01-24 18:02:58', '2021-01-24 18:02:58'),
(297, 18, 135, 'Live', '2021-01-24 18:02:58', '2021-01-24 18:02:58'),
(298, 19, 136, 'Live', '2021-01-24 18:03:37', '2021-01-24 18:03:37'),
(299, 18, 136, 'Live', '2021-01-24 18:03:37', '2021-01-24 18:03:37'),
(300, 19, 137, 'Live', '2021-01-24 18:03:59', '2021-01-24 18:03:59'),
(301, 18, 137, 'Live', '2021-01-24 18:03:59', '2021-01-24 18:03:59'),
(302, 19, 138, 'Live', '2021-01-24 18:04:26', '2021-01-24 18:04:26'),
(303, 18, 138, 'Live', '2021-01-24 18:04:26', '2021-01-24 18:04:26'),
(304, 19, 139, 'Live', '2021-01-24 18:04:49', '2021-01-24 18:04:49'),
(305, 18, 139, 'Live', '2021-01-24 18:04:49', '2021-01-24 18:04:49'),
(306, 19, 140, 'Live', '2021-01-24 18:05:25', '2021-01-24 18:05:25'),
(307, 18, 140, 'Live', '2021-01-24 18:05:25', '2021-01-24 18:05:25'),
(308, 19, 141, 'Live', '2021-01-24 18:05:45', '2021-01-24 18:05:45'),
(309, 18, 141, 'Live', '2021-01-24 18:05:45', '2021-01-24 18:05:45'),
(310, 19, 142, 'Live', '2021-01-24 18:06:18', '2021-01-24 18:06:18'),
(311, 18, 142, 'Live', '2021-01-24 18:06:18', '2021-01-24 18:06:18'),
(312, 19, 143, 'Live', '2021-01-24 18:20:35', '2021-01-24 18:20:35'),
(313, 18, 143, 'Live', '2021-01-24 18:20:35', '2021-01-24 18:20:35'),
(314, 19, 144, 'Live', '2021-01-24 18:21:13', '2021-01-24 18:21:13'),
(315, 18, 144, 'Live', '2021-01-24 18:21:13', '2021-01-24 18:21:13'),
(316, 19, 145, 'Live', '2021-01-24 18:21:37', '2021-01-24 18:21:37'),
(317, 18, 145, 'Live', '2021-01-24 18:21:37', '2021-01-24 18:21:37'),
(318, 19, 146, 'Live', '2021-01-24 18:22:10', '2021-01-24 18:22:10'),
(319, 18, 146, 'Live', '2021-01-24 18:22:10', '2021-01-24 18:22:10'),
(320, 19, 147, 'Live', '2021-01-24 18:22:30', '2021-01-24 18:22:30'),
(321, 18, 147, 'Live', '2021-01-24 18:22:30', '2021-01-24 18:22:30'),
(322, 19, 148, 'Live', '2021-01-24 18:22:57', '2021-01-24 18:22:57'),
(323, 18, 148, 'Live', '2021-01-24 18:22:57', '2021-01-24 18:22:57'),
(324, 19, 149, 'Live', '2021-01-24 18:23:23', '2021-01-24 18:23:23'),
(325, 18, 149, 'Live', '2021-01-24 18:23:23', '2021-01-24 18:23:23'),
(326, 19, 150, 'Live', '2021-01-24 18:24:02', '2021-01-24 18:24:02'),
(327, 18, 150, 'Live', '2021-01-24 18:24:02', '2021-01-24 18:24:02'),
(328, 19, 151, 'Live', '2021-01-24 18:24:23', '2021-01-24 18:24:23'),
(329, 18, 151, 'Live', '2021-01-24 18:24:23', '2021-01-24 18:24:23'),
(330, 19, 152, 'Live', '2021-01-24 18:30:17', '2021-01-24 18:30:17'),
(331, 18, 152, 'Live', '2021-01-24 18:30:17', '2021-01-24 18:30:17'),
(332, 19, 153, 'Live', '2021-01-24 18:30:46', '2021-01-24 18:30:46'),
(333, 18, 153, 'Live', '2021-01-24 18:30:46', '2021-01-24 18:30:46'),
(334, 19, 154, 'Live', '2021-01-24 18:31:18', '2021-01-24 18:31:18'),
(335, 18, 154, 'Live', '2021-01-24 18:31:18', '2021-01-24 18:31:18'),
(336, 19, 155, 'Live', '2021-01-24 18:31:41', '2021-01-24 18:31:41'),
(337, 18, 155, 'Live', '2021-01-24 18:31:41', '2021-01-24 18:31:41'),
(338, 19, 156, 'Live', '2021-01-24 18:32:37', '2021-01-24 18:32:37'),
(339, 18, 156, 'Live', '2021-01-24 18:32:37', '2021-01-24 18:32:37'),
(340, 19, 157, 'Live', '2021-01-24 18:33:37', '2021-01-24 18:33:37'),
(341, 18, 157, 'Live', '2021-01-24 18:33:37', '2021-01-24 18:33:37'),
(342, 19, 158, 'Live', '2021-01-24 18:34:09', '2021-01-24 18:34:09'),
(343, 18, 158, 'Live', '2021-01-24 18:34:09', '2021-01-24 18:34:09'),
(344, 19, 159, 'Live', '2021-01-24 18:34:43', '2021-01-24 18:34:43'),
(345, 18, 159, 'Live', '2021-01-24 18:34:43', '2021-01-24 18:34:43'),
(346, 19, 160, 'Live', '2021-01-24 18:35:56', '2021-01-24 18:35:56'),
(347, 18, 160, 'Live', '2021-01-24 18:35:56', '2021-01-24 18:35:56'),
(348, 19, 161, 'Live', '2021-01-24 18:36:39', '2021-01-24 18:36:39'),
(349, 18, 161, 'Live', '2021-01-24 18:36:39', '2021-01-24 18:36:39'),
(352, 19, 163, 'Live', '2021-01-24 18:43:51', '2021-01-24 18:43:51'),
(353, 18, 163, 'Live', '2021-01-24 18:43:51', '2021-01-24 18:43:51'),
(354, 19, 162, 'Live', '2021-01-24 18:44:12', '2021-01-24 18:44:12'),
(355, 18, 162, 'Live', '2021-01-24 18:44:12', '2021-01-24 18:44:12'),
(356, 19, 164, 'Live', '2021-01-24 18:44:47', '2021-01-24 18:44:47'),
(357, 18, 164, 'Live', '2021-01-24 18:44:47', '2021-01-24 18:44:47'),
(358, 19, 165, 'Live', '2021-01-24 18:45:19', '2021-01-24 18:45:19'),
(359, 18, 165, 'Live', '2021-01-24 18:45:19', '2021-01-24 18:45:19'),
(360, 19, 166, 'Live', '2021-01-24 18:45:47', '2021-01-24 18:45:47'),
(361, 18, 166, 'Live', '2021-01-24 18:45:47', '2021-01-24 18:45:47'),
(362, 19, 167, 'Live', '2021-01-24 18:46:27', '2021-01-24 18:46:27'),
(363, 18, 167, 'Live', '2021-01-24 18:46:27', '2021-01-24 18:46:27'),
(364, 19, 168, 'Live', '2021-01-24 18:46:52', '2021-01-24 18:46:52'),
(365, 18, 168, 'Live', '2021-01-24 18:46:52', '2021-01-24 18:46:52'),
(366, 19, 169, 'Live', '2021-01-24 18:47:12', '2021-01-24 18:47:12'),
(367, 18, 169, 'Live', '2021-01-24 18:47:12', '2021-01-24 18:47:12'),
(368, 19, 170, 'Live', '2021-01-24 18:47:35', '2021-01-24 18:47:35'),
(369, 18, 170, 'Live', '2021-01-24 18:47:35', '2021-01-24 18:47:35'),
(370, 19, 171, 'Live', '2021-01-24 18:48:01', '2021-01-24 18:48:01'),
(371, 18, 171, 'Live', '2021-01-24 18:48:01', '2021-01-24 18:48:01'),
(372, 19, 172, 'Live', '2021-01-24 18:48:28', '2021-01-24 18:48:28'),
(373, 18, 172, 'Live', '2021-01-24 18:48:28', '2021-01-24 18:48:28'),
(374, 19, 173, 'Live', '2021-01-24 18:49:00', '2021-01-24 18:49:00'),
(375, 18, 173, 'Live', '2021-01-24 18:49:00', '2021-01-24 18:49:00'),
(376, 19, 174, 'Live', '2021-01-24 18:49:22', '2021-01-24 18:49:22'),
(377, 18, 174, 'Live', '2021-01-24 18:49:22', '2021-01-24 18:49:22'),
(378, 19, 175, 'Live', '2021-01-24 18:49:42', '2021-01-24 18:49:42'),
(379, 18, 175, 'Live', '2021-01-24 18:49:42', '2021-01-24 18:49:42'),
(380, 19, 176, 'Live', '2021-01-24 18:50:21', '2021-01-24 18:50:21'),
(381, 18, 176, 'Live', '2021-01-24 18:50:21', '2021-01-24 18:50:21'),
(382, 19, 177, 'Live', '2021-01-24 18:50:43', '2021-01-24 18:50:43'),
(383, 18, 177, 'Live', '2021-01-24 18:50:43', '2021-01-24 18:50:43'),
(384, 19, 178, 'Live', '2021-01-24 18:51:15', '2021-01-24 18:51:15'),
(385, 18, 178, 'Live', '2021-01-24 18:51:15', '2021-01-24 18:51:15'),
(386, 19, 179, 'Live', '2021-01-24 18:51:34', '2021-01-24 18:51:34'),
(387, 18, 179, 'Live', '2021-01-24 18:51:34', '2021-01-24 18:51:34'),
(390, 19, 180, 'Live', '2021-01-24 18:52:33', '2021-01-24 18:52:33'),
(391, 18, 180, 'Live', '2021-01-24 18:52:33', '2021-01-24 18:52:33'),
(392, 19, 181, 'Live', '2021-01-24 18:52:50', '2021-01-24 18:52:50'),
(393, 18, 181, 'Live', '2021-01-24 18:52:50', '2021-01-24 18:52:50'),
(394, 19, 182, 'Live', '2021-01-24 18:53:28', '2021-01-24 18:53:28'),
(395, 18, 182, 'Live', '2021-01-24 18:53:28', '2021-01-24 18:53:28'),
(396, 19, 183, 'Live', '2021-01-24 18:53:53', '2021-01-24 18:53:53'),
(397, 18, 183, 'Live', '2021-01-24 18:53:53', '2021-01-24 18:53:53'),
(398, 19, 184, 'Live', '2021-03-15 17:13:26', '2021-03-15 17:13:26'),
(399, 18, 185, 'Live', '2021-04-10 12:23:55', '2021-04-10 12:23:55'),
(400, 18, 186, 'Live', '2021-04-10 13:44:45', '2021-04-10 13:44:45'),
(401, 18, 187, 'Live', '2021-04-10 13:45:28', '2021-04-10 13:45:28'),
(402, 18, 188, 'Live', '2021-04-10 13:46:01', '2021-04-10 13:46:01'),
(403, 18, 189, 'Live', '2021-04-10 13:47:04', '2021-04-10 13:47:04'),
(404, 18, 190, 'Live', '2021-04-10 13:52:34', '2021-04-10 13:52:34'),
(405, 18, 191, 'Live', '2021-04-12 05:26:25', '2021-04-12 05:26:25'),
(406, 18, 192, 'Live', '2021-04-12 05:27:27', '2021-04-12 05:27:27'),
(407, 18, 193, 'Live', '2021-04-12 05:31:46', '2021-04-12 05:31:46'),
(408, 18, 195, 'Live', '2021-04-12 05:36:03', '2021-04-12 05:36:03'),
(409, 18, 196, 'Live', '2021-04-12 05:41:05', '2021-04-12 05:41:05'),
(410, 18, 197, 'Live', '2021-04-12 05:50:51', '2021-04-12 05:50:51'),
(411, 18, 198, 'Live', '2021-04-12 05:54:47', '2021-04-12 05:54:47'),
(412, 18, 199, 'Live', '2021-04-12 05:57:13', '2021-04-12 05:57:13'),
(413, 18, 200, 'Live', '2021-04-12 05:58:37', '2021-04-12 05:58:37'),
(414, 18, 201, 'Live', '2021-04-12 07:06:00', '2021-04-12 07:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_stock_adjustments`
--

DROP TABLE IF EXISTS `tbl_restaurant_stock_adjustments`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_stock_adjustments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `employee_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_stock_adjustments_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_stock_adjustments`
--

INSERT INTO `tbl_restaurant_stock_adjustments` (`id`, `reference_no`, `date`, `note`, `employee_id`, `user_id`, `restaurant_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, '000001', '2020-12-05', '', '2', '2', 3, 'Live', '2020-12-05 08:06:15', '2020-12-05 08:06:15'),
(2, '000002', '2020-12-05', 'some thing about adjustment', '2', '2', 3, 'Deleted', '2020-12-05 13:13:42', '2020-12-05 16:09:53'),
(3, '000003', '2020-12-05', '', '2', '2', 3, 'Live', '2020-12-05 16:01:08', '2020-12-05 16:01:08'),
(4, '000004', '2020-12-06', '', '2', '2', 3, 'Live', '2020-12-06 06:43:31', '2020-12-06 06:43:31'),
(5, '000005', '2021-03-24', '', '31', '10', 8, 'Live', '2021-03-23 05:28:59', '2021-03-23 05:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_stock_adjustment_ingredients`
--

DROP TABLE IF EXISTS `tbl_restaurant_stock_adjustment_ingredients`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_stock_adjustment_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ingredient_id` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consumption_amount` double(10,2) NOT NULL,
  `stock_adjustment_id` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consumption_status` enum('Plus','Minus') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `restr_id` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_stock_adjustment_ingredients`
--

INSERT INTO `tbl_restaurant_stock_adjustment_ingredients` (`id`, `ingredient_id`, `consumption_amount`, `stock_adjustment_id`, `consumption_status`, `restaurant_id`, `del_status`, `created_at`, `updated_at`) VALUES
(3, '2', 1.00, '3', 'Plus', 3, 'Live', '2020-12-05 16:01:08', '2020-12-05 16:01:08'),
(4, '1', 1.00, '3', 'Plus', 3, 'Live', '2020-12-05 16:01:08', '2020-12-05 16:01:08'),
(5, '1', 60.00, '1', 'Plus', 3, 'Live', '2020-12-05 16:23:15', '2020-12-05 16:23:15'),
(6, '2', 6.00, '1', 'Minus', 3, 'Live', '2020-12-05 16:23:15', '2020-12-05 16:23:15'),
(7, '3', 11.00, '1', 'Plus', 3, 'Live', '2020-12-05 16:23:15', '2020-12-05 16:23:15'),
(11, '1', 29.00, '4', 'Plus', 3, 'Live', '2020-12-06 06:59:51', '2020-12-06 06:59:51'),
(12, '10', 5.00, '5', 'Plus', 8, 'Live', '2021-03-23 05:28:59', '2021-03-23 05:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_suppliers`
--

DROP TABLE IF EXISTS `tbl_restaurant_suppliers`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `routing_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `order_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_suppliers_restaurant_id_foreign` (`restaurant_id`),
  KEY `tbl_restaurant_suppliers_country_id_foreign` (`country_id`),
  KEY `tbl_restaurant_suppliers_state_id_foreign` (`state_id`),
  KEY `tbl_restaurant_suppliers_city_id_foreign` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_suppliers`
--

INSERT INTO `tbl_restaurant_suppliers` (`id`, `name`, `contact_person`, `phone`, `email`, `fax`, `bank_name`, `account_number`, `routing_number`, `due_date`, `address`, `zip`, `description`, `order_method`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`, `country_id`, `state_id`, `city_id`) VALUES
(1, 'Josephine Hewitt', 'Eos accusantium a d', '+1 (231) 656-9683', 'gokujutoci@mailinator.com', '+1 (867) 883-3471', 'Oscar Boyd', '338', '100', 0, 'Ad ea in est quas n', NULL, 'Possimus sed tempor', '[\"Email\",\"Fax\"]', 3, '2', 'Deleted', '2020-08-19 11:02:06', '2020-08-19 11:03:47', NULL, NULL, NULL),
(2, 'Madison Gutierrez', 'Ut qui vero maiores', '+1 (495) 263-9022', 'jugoce@mailinator.com', '+1 (178) 995-8407', 'Kai Davidson', '253', '519', 0, 'Optio dolor non atq', NULL, 'Et labore aliquid te', '[\"Email\"]', 3, '2', 'Live', '2020-08-19 11:03:52', '2020-08-19 11:03:52', NULL, NULL, NULL),
(3, 'Amethyst Sherman', 'Accusamus vitae aute', '+1 (632) 958-9212', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Accusamus sit et qui', NULL, 3, '2', 'Live', '2020-08-21 05:46:11', '2020-08-21 05:46:11', NULL, NULL, NULL),
(4, 'Kathleen Ruiz', 'Voluptas cum reicien', '+1 (729) 876-1892', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Eos dolores Nam qua', NULL, 3, '2', 'Live', '2020-08-21 05:47:52', '2020-08-21 05:47:52', NULL, NULL, NULL),
(5, 'Alana Charles', 'Officiis ipsam sunt', '+1 (675) 537-4952', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Ullam consectetur fu', NULL, 3, '2', 'Live', '2020-08-21 05:48:20', '2020-08-21 05:48:20', NULL, NULL, NULL),
(6, 'Xantha Craft', 'Sit iure officia exp', '+1 (381) 717-5402', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Quia molestiae est a', NULL, 3, '2', 'Live', '2020-08-21 05:52:17', '2020-08-21 05:52:17', NULL, NULL, NULL),
(7, 'Callie Guerrero', 'Ut natus consectetur', '+1 (728) 847-7359', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Pariatur Asperiores', NULL, 3, '2', 'Live', '2020-08-21 05:53:20', '2020-08-21 05:53:20', NULL, NULL, NULL),
(8, 'Callie Guerrero', 'Ut natus consectetur', '+1 (728) 847-7359', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Pariatur Asperiores', NULL, 3, '2', 'Live', '2020-08-21 05:53:21', '2020-08-21 05:53:21', NULL, NULL, NULL),
(9, 'Talon Howell', 'Explicabo Soluta qu', '+1 (441) 566-8247', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Maiores dolor simili', NULL, 3, '2', 'Live', '2020-08-21 05:53:50', '2020-08-21 05:53:50', NULL, NULL, NULL),
(10, 'Orli Merrill', 'Optio commodi paria', '+1 (124) 842-4928', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Natus nisi molestiae', NULL, 3, '2', 'Live', '2020-08-21 05:54:22', '2020-08-21 05:54:22', NULL, NULL, NULL),
(11, 'Sopoline Walters', 'Incidunt hic delect', '+1 (767) 237-1739', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Velit aliquip exerc', NULL, 3, '2', 'Live', '2020-08-21 05:54:52', '2020-08-21 05:54:52', NULL, NULL, NULL),
(12, 'Halee Fox', 'Consectetur dolore o', '+1 (226) 227-1972', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Non blanditiis asper', NULL, 3, '2', 'Live', '2020-08-21 05:56:01', '2020-08-21 05:56:01', NULL, NULL, NULL),
(13, 'Minerva Schroeder', 'Enim sed praesentium', '+1 (546) 811-5915', '', '', '', '', '', 0, '', NULL, 'Architecto esse ex d', '[\"Email\",\"SMS Message\",\"Fax\"]', 3, '2', 'Deleted', '2020-08-21 05:56:22', '2020-10-06 10:42:54', NULL, NULL, NULL),
(14, 'Sylvia Jacobson', 'Eos et sed velit p', '+1 (155) 767-5659', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Corporis officia vol', NULL, 3, '2', 'Live', '2020-08-21 06:02:05', '2020-08-21 06:02:05', NULL, NULL, NULL),
(15, 'supplier 1', 'shuvo', '01521493732', 'supplier1@gmail.com', '5854', 'city bank', '000000000012', '7878', 0, 'm/13, noorjahan road, mohammodpur, dhaka', '', 'description', '[\"Email\"]', 3, '2', 'Live', '2020-10-06 09:40:03', '2020-12-29 10:17:38', 1, 5, 2),
(16, 'supplier 2', 'supplier 2', '01521493732', '', '', '', '', '', 0, '', '1207', 'description', '[\"Email\"]', 3, '2', 'Live', '2020-10-06 12:17:58', '2020-12-18 19:39:58', 1, 5, 2),
(17, 'mehedi hasan shuvo', 'shuvo', '01521493732', 'hasanshuvom884@gmail.com', '', '', '', '', 0, 'm/13, noorjahan road, mohammodpur, dhaka', NULL, '', NULL, 3, '2', 'Deleted', '2020-12-10 05:33:35', '2020-12-10 05:34:18', 1, 5, 3),
(18, 'mehedi hasan shuvo', 'shuvo', '01521493732', 'hasanshuvom884@gmail.com', '', '', '', '', 0, 'm/13, noorjahan road, mohammodpur, dhaka', '', '', '[\"Email\",\"SMS Message\"]', 3, '2', 'Live', '2020-12-10 05:35:24', '2020-12-29 10:17:10', 1, 5, 2),
(19, 'supplier multi cat', 'shuvo', '01521493732', 'hasanshuvom884@gmail.com', '5854', 'city bank', '000000000012', '7878', 0, 'm/13, noorjahan road, mohammodpur, dhaka', '1207', '', '[\"Email\",\"SMS Message\"]', 3, '2', 'Live', '2020-12-29 09:47:18', '2020-12-29 10:05:45', 1, 5, 2),
(20, 'supplier ltd', 'supplier c', '+13318626220', '', '', '', '', '', 0, '', '', '', '[\"Email\",\"SMS Message\"]', 8, '10', 'Live', '2021-01-19 18:55:05', '2021-01-22 19:32:49', 1, 5, 3),
(21, 'Dipto', 'Dipto', '+11213121323', 'abc@gmail.com', '32132165', 'uk', '0000000007', '12311113231', 14, '', '52210', 'tyuikjgfjfdhxhgfvhg', '[\"Email\"]', 8, '10', 'Live', '2021-03-15 06:19:50', '2021-03-16 06:31:33', 1, 1, 2),
(22, 'Test', 'Test', '+11213121323', 'abc@gmail.com', '32132165', 'uk', '0000000007', '12311113231', 2, 'hkh', '52210', 'dsf', '[\"Email\"]', 8, '10', 'Deleted', '2021-03-16 06:15:43', '2021-04-13 04:53:20', 1, 5, 3),
(23, 'Towhid Hasan', 'gdfgd', '+11243453453', 'askprocessor@gmail.com', '46346', 'usa', '56457', '5464567', 5464567, 'gfhfgjh', '12546', 'gfjfgj', '[\"Email\"]', 8, '10', 'Live', '2021-04-13 04:54:35', '2021-04-13 04:54:35', 1, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_suppliers_final_payment`
--

DROP TABLE IF EXISTS `tbl_restaurant_suppliers_final_payment`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_suppliers_final_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `methord_id` bigint(20) NOT NULL,
  `payment_amount` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `suppliers_id` bigint(20) NOT NULL,
  `note` varchar(15000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_restaurant_suppliers_final_payment`
--

INSERT INTO `tbl_restaurant_suppliers_final_payment` (`id`, `methord_id`, `payment_amount`, `date`, `suppliers_id`, `note`, `created_at`) VALUES
(1, 1, '54', '2021-04-13', 23, 'asdf', '2021-04-13 09:26:45'),
(2, 6, '42', '2021-04-14', 23, 'dsfg', '2021-04-13 09:27:02'),
(3, 6, '400', '2021-04-13', 23, 'jhgj', '2021-04-13 10:24:23'),
(4, 10, '100', '2021-04-12', 23, 'fff', '2021-04-13 10:25:09'),
(5, 1, '500', '2021-04-11', 23, 'mnmn', '2021-04-13 10:29:47'),
(6, 11, '10', '2021-04-13', 23, 'asdas', '2021-04-13 10:52:01'),
(7, 11, '50', '2021-04-14', 23, '', '2021-04-13 11:00:52'),
(8, 6, '10', '2021-04-14', 23, '', '2021-04-13 11:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_users`
--

DROP TABLE IF EXISTS `tbl_restaurant_users`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `manager_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `email_verified` tinyint(1) DEFAULT '1',
  `email_verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Manager',
  `role_id` int(11) DEFAULT '0',
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `pin_no` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_users_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_users`
--

INSERT INTO `tbl_restaurant_users` (`id`, `manager_name`, `manager_phone`, `manager_email`, `password`, `image`, `email_verified_at`, `email_verified`, `email_verification_token`, `role`, `role_id`, `del_status`, `restaurant_id`, `pin_no`, `salary`, `created_at`, `updated_at`) VALUES
(1, 'Grace Gilliam', '+1 (962) 627-9779', 'qanejoqyv@mailinator.com', '$2y$10$uogZ/2ivC2Fn2EvDr.1dDevcngdq4tIiYlCLFfZWfR8nNri1Pr1n6', NULL, '2020-10-01 17:33:30', 1, 's10E8QZXebt2bsnTsPBErhEILI4Kcwm3', 'Manager', 0, 'Live', 2, '', '', '2020-08-19 08:47:56', '2020-08-19 08:47:56'),
(2, 'Sydnee Larson', '+1 (141) 187-4196', 'nyzaw@mailinator.com', '$2y$10$TEAR75Qy73msQthdb0bkmuMwAJw3whjc/6fEbDTWWz7PqmjjdBTum', NULL, '2020-08-19 09:19:47', 1, 'CJE11byzfNwrTgXy4GkWo31q5UQaSclb', 'Manager', 0, 'Live', 3, '', '', '2020-08-19 08:49:33', '2020-08-19 09:19:47'),
(5, 'mehedi hasan shuvo', '01521493732', 'home_restaurant_m@gmail.com', '$2y$10$9zGPsxpTReQfO0r2MTZ/k.DOlb/plXuzd0t6Nfflyn/GdW6Y0vXOa', NULL, '2020-10-06 08:26:08', 1, 'p2Su9OalKXMLWb9kavcID07pU7dIo7dC', 'Manager', 0, 'Live', 5, '', '', '2020-10-06 08:24:56', '2020-10-06 08:26:08'),
(6, 'waiter 2', '01521493732', 'waiter2@restaurant.com', '$2y$10$uogZ/2ivC2Fn2EvDr.1dDevcngdq4tIiYlCLFfZWfR8nNri1Pr1n6', NULL, NULL, 1, '', 'Waiter', 0, 'Live', 3, '', '', NULL, NULL),
(7, 'Default Waiter', '01521493732', 'Default_Waiter@restaurant.com', '123456', NULL, NULL, 1, '', 'Waiter', 0, 'Live', 3, '', '', NULL, NULL),
(9, 'restaurant 2', '01521493732', 'restaurant2.m@gmail.com', '$2y$10$G5RDEWIoD6RtnjVm4Tqu8.5spZs0/c6w.izgD3DDiRegMDx5PC55u', NULL, '2021-01-12 09:56:36', 1, '7dbTRs0ECBGJvtjfD32H7OLyqliWg5rf', 'Manager', 0, 'Live', 7, '', '', '2021-01-07 06:58:36', '2021-01-12 09:56:36'),
(10, 'AskProcessor', '12345678910', 'askprocessor@gmail.com', '$2y$10$/i25PhkNg/X4eUmVCmQPyOU1GrUoLQ9e5GjAYy6o9qi0/EclpTHoW', 'public/upload/1695013340728997.png', '2021-01-12 09:56:36', 1, ' ', 'Manager', 0, 'Live', 8, '354035', '', '2021-03-04 10:26:40', '2021-03-04 10:26:40'),
(19, 'Dorothy', '01625049999', 'Less1@gmail.com', '$2y$10$F8k.R2oKPHQ.zEhrHdJigeX2YX1P4vaTd.zH9RYT0xRg3mxtfD50G', NULL, '2021-04-06 09:45:59', 1, NULL, 'Manager', 59, 'Live', 8, '353842', '400', '2021-04-06 09:45:59', '2021-04-06 09:45:59'),
(20, 'Smell', '01625049999', 'Less1@gmail.com', '$2y$10$HbL41tv.B2V8Te4TVURbcudEL91Rt3LrHdj1wx7bZ0z5Glj2WIC5y', NULL, '2021-04-06 10:03:56', 1, NULL, 'Manager', 63, 'Live', 8, '397460', '500', '2021-04-06 10:03:56', '2021-04-06 10:03:56'),
(21, 'asf', '01625049999', 'Less1@gmail.com', '$2y$10$ljTBPihcyjPiyvqkDDVOaualOda/ulsrtnuOOFnKkp4M9KYQC7Ty2', NULL, '2021-04-08 09:13:11', 1, NULL, 'Manager', 63, 'Live', 8, '148818', '500', '2021-04-08 09:13:11', '2021-04-08 09:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_wastes`
--

DROP TABLE IF EXISTS `tbl_restaurant_wastes`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_wastes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `total_loss` double(10,2) DEFAULT NULL,
  `employee_id` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_menu_waste_qty` bigint(20) UNSIGNED DEFAULT NULL,
  `food_menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_wastes_food_menu_id_foreign` (`food_menu_id`),
  KEY `tbl_restaurant_wastes_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_wastes`
--

INSERT INTO `tbl_restaurant_wastes` (`id`, `reference_no`, `date`, `total_loss`, `employee_id`, `note`, `user_id`, `food_menu_waste_qty`, `food_menu_id`, `restaurant_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, '000001', '2020-11-23', 1089.00, '3', 'note', '2', 1, 3, 3, 'Live', '2020-11-23 19:14:34', '2020-11-24 12:55:21'),
(2, '000002', '2020-11-24', 159.00, '2', 'note', '2', NULL, NULL, 3, 'Live', '2020-11-23 19:23:36', '2020-11-24 12:48:54'),
(3, '000003', '2020-11-24', 159.00, '3', '', '2', NULL, NULL, 3, 'Live', '2020-11-24 13:48:05', '2020-11-24 14:05:46'),
(4, '000004', '2020-11-25', 1089.00, '3', '', '2', 1, 5, 3, 'Live', '2020-11-25 06:37:53', '2020-11-25 06:37:53'),
(5, '000005', '2020-11-30', 300.00, '2', '', '2', NULL, NULL, 3, 'Live', '2020-11-30 12:27:36', '2020-11-30 12:27:36'),
(15, '000006', '2021-03-31', 2200.00, '10', '', '10', NULL, NULL, 8, 'Live', '2021-04-03 07:59:52', '2021-04-03 07:59:52'),
(16, '000007', '2021-03-28', 275.00, '59', '', '10', NULL, NULL, 8, 'Live', '2021-04-03 08:04:21', '2021-04-03 08:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_waste_ingredients`
--

DROP TABLE IF EXISTS `tbl_restaurant_waste_ingredients`;
CREATE TABLE IF NOT EXISTS `tbl_restaurant_waste_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ingredient_id` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waste_amount` double(10,2) DEFAULT NULL,
  `last_purchase_price` double(10,2) DEFAULT NULL,
  `loss_amount` double(10,2) DEFAULT NULL,
  `waste_id` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_restaurant_waste_ingredients_restaurant_id_foreign` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_waste_ingredients`
--

INSERT INTO `tbl_restaurant_waste_ingredients` (`id`, `ingredient_id`, `waste_amount`, `last_purchase_price`, `loss_amount`, `waste_id`, `restaurant_id`, `del_status`, `created_at`, `updated_at`) VALUES
(24, '1', 1.00, 99.00, 99.00, '2', 3, 'Live', '2020-11-24 12:54:34', '2020-11-24 12:54:34'),
(25, '2', 1.00, 60.00, 60.00, '2', 3, 'Live', '2020-11-24 12:54:34', '2020-11-24 12:54:34'),
(26, '1', 11.00, 1.00, 1089.00, '1', 3, 'Live', '2020-11-24 12:55:21', '2020-11-24 12:55:21'),
(28, '1', 1.00, 99.00, 99.00, '3', 3, 'Live', '2020-11-24 14:05:46', '2020-11-24 14:05:46'),
(29, '2', 1.00, 60.00, 60.00, '3', 3, 'Live', '2020-11-24 14:05:46', '2020-11-24 14:05:46'),
(30, '1', 11.00, 1.00, 1089.00, '4', 3, 'Live', '2020-11-25 06:37:53', '2020-11-25 06:37:53'),
(31, '1', 1.00, 100.00, 100.00, '5', 3, 'Live', '2020-11-30 12:27:36', '2020-11-30 12:27:36'),
(32, '2', 1.00, 50.00, 50.00, '5', 3, 'Live', '2020-11-30 12:27:36', '2020-11-30 12:27:36'),
(33, '3', 1.00, 150.00, 150.00, '5', 3, 'Live', '2020-11-30 12:27:36', '2020-11-30 12:27:36'),
(34, '6', 1.00, 10.00, 10.00, '6', 8, 'Live', '2021-03-01 12:53:41', '2021-03-01 12:53:41'),
(35, '7', 2.00, 10.00, 20.00, '6', 8, 'Live', '2021-03-01 12:53:41', '2021-03-01 12:53:41'),
(37, '6', 12.00, 10.00, 120.00, '8', 8, 'Live', '2021-03-14 12:50:55', '2021-03-14 12:50:55'),
(41, '6', 10.00, 10.00, 100.00, '11', 8, 'Deleted', '2021-03-15 14:12:44', '2021-03-15 14:14:05'),
(42, '6', 10.00, 10.00, 100.00, '7', 8, 'Live', '2021-03-15 14:12:56', '2021-03-15 14:12:56'),
(43, '9', 1.00, 50.00, 50.00, '12', 8, 'Live', '2021-03-15 14:14:31', '2021-03-15 14:14:31'),
(45, '10', 5.00, 5.50, 27.50, '13', 8, 'Live', '2021-03-15 17:23:20', '2021-03-15 17:23:20'),
(46, '8', 10.00, 50.00, 500.00, '13', 8, 'Live', '2021-03-15 17:23:20', '2021-03-15 17:23:20'),
(47, '6', 5.00, 10.00, 50.00, '14', 8, 'Live', '2021-04-03 07:29:48', '2021-04-03 07:29:48'),
(48, '10', 5.00, 5.50, 27.50, '14', 8, 'Live', '2021-04-03 07:29:48', '2021-04-03 07:29:48'),
(49, '6', 50.00, 10.00, 500.00, '15', 8, 'Live', '2021-04-03 07:59:52', '2021-04-03 07:59:52'),
(50, '7', 20.00, 10.00, 200.00, '15', 8, 'Live', '2021-04-03 07:59:52', '2021-04-03 07:59:52'),
(51, '9', 20.00, 50.00, 1000.00, '15', 8, 'Live', '2021-04-03 07:59:52', '2021-04-03 07:59:52'),
(52, '8', 10.00, 50.00, 500.00, '15', 8, 'Live', '2021-04-03 07:59:52', '2021-04-03 07:59:52'),
(53, '10', 50.00, 5.50, 275.00, '16', 8, 'Live', '2021-04-03 08:04:21', '2021-04-03 08:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social_media`
--

DROP TABLE IF EXISTS `tbl_social_media`;
CREATE TABLE IF NOT EXISTS `tbl_social_media` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_social_media`
--

INSERT INTO `tbl_social_media` (`id`, `name`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'Live', '2020-12-15 05:15:24', '2020-12-15 05:20:42'),
(2, 'Google plus', 'Live', '2020-12-15 05:20:57', '2020-12-15 05:23:54'),
(3, 'Google Hangout', 'Live', '2020-12-15 05:24:42', '2020-12-15 05:24:42'),
(4, 'Twitter', 'Live', '2020-12-15 05:25:43', '2020-12-15 05:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_attendance`
--

DROP TABLE IF EXISTS `tbl_staff_attendance`;
CREATE TABLE IF NOT EXISTS `tbl_staff_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` varchar(20) DEFAULT NULL,
  `pin_no` varchar(20) DEFAULT NULL,
  `in_date` date DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `out_date` date DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `update_time` time DEFAULT NULL,
  `count_total` varchar(255) DEFAULT NULL,
  `note` varchar(1200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_staff_attendance`
--

INSERT INTO `tbl_staff_attendance` (`id`, `staff_id`, `pin_no`, `in_date`, `in_time`, `out_date`, `out_time`, `update_time`, `count_total`, `note`) VALUES
(41, '10', '354035', '2021-04-07', '18:41:44', '2021-04-08', '18:44:31', '18:44:31', '00:02', ''),
(42, '10', '354035', '2021-04-08', '18:44:24', '2021-04-08', '18:44:31', '18:44:31', '00:02', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_states`
--

DROP TABLE IF EXISTS `tbl_states`;
CREATE TABLE IF NOT EXISTS `tbl_states` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_states_country_id_foreign` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_states`
--

INSERT INTO `tbl_states` (`id`, `name`, `country`, `country_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'New York', 'USA', 1, 'Live', '2020-08-19 08:46:46', '2021-01-13 04:46:31'),
(2, 'Mumbai', 'India', 3, 'Deleted', '2020-10-06 07:49:16', '2021-01-13 04:46:13'),
(3, 'kolkatav', 'India', 3, 'Deleted', '2020-10-06 07:49:55', '2020-10-06 07:50:33'),
(4, 'kolkata', 'India', 3, 'Deleted', '2020-10-06 07:50:47', '2021-01-13 04:46:09'),
(5, 'California', 'USA', 1, 'Live', '2020-10-06 07:53:32', '2021-01-13 04:46:42'),
(6, 'Washington', 'USA', 1, 'Live', '2021-01-19 18:13:02', '2021-01-19 18:13:02'),
(7, 'Virginia', 'USA', 1, 'Live', '2021-01-19 18:15:13', '2021-01-19 18:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_superadmin_payment_gateway`
--

DROP TABLE IF EXISTS `tbl_superadmin_payment_gateway`;
CREATE TABLE IF NOT EXISTS `tbl_superadmin_payment_gateway` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usb` varchar(255) DEFAULT NULL,
  `usb_status` bit(1) DEFAULT NULL,
  `paypal_username` varchar(255) DEFAULT NULL,
  `paypal_password` varchar(255) DEFAULT NULL,
  `paypal_sinature` varchar(255) NOT NULL,
  `paypal_email` varchar(255) DEFAULT NULL,
  `paypal_status` bit(1) DEFAULT NULL,
  `stripe_secret` varchar(255) DEFAULT NULL,
  `stripe_status` bit(1) DEFAULT NULL,
  `payumoney_key` varchar(255) DEFAULT NULL,
  `payumoney_salt` varchar(255) DEFAULT NULL,
  `payumoney_status` bit(1) DEFAULT NULL,
  `paystack_secret_key` varchar(255) DEFAULT NULL,
  `paystack_status` bit(1) DEFAULT NULL,
  `rezorpay_key_id` varchar(255) DEFAULT NULL,
  `rezorpay_key_secret` varchar(255) DEFAULT NULL,
  `rezorpay_status` bit(1) DEFAULT NULL,
  `res_id` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_superadmin_payment_gateway`
--

INSERT INTO `tbl_superadmin_payment_gateway` (`id`, `usb`, `usb_status`, `paypal_username`, `paypal_password`, `paypal_sinature`, `paypal_email`, `paypal_status`, `stripe_secret`, `stripe_status`, `payumoney_key`, `payumoney_salt`, `payumoney_status`, `paystack_secret_key`, `paystack_status`, `rezorpay_key_id`, `rezorpay_key_secret`, `rezorpay_status`, `res_id`, `created_at`, `updated_at`) VALUES
(1, 'fsadf', b'1', 'sdfasdf', 'asdfasd', 'asdfsda', 'asdfdsa', b'1', 'asdfasd', b'1', 'asdfasdf', 'sadfasdf', b'1', 'fasdfdsa', b'1', 'fasdfsad', 'asdfsadf', b'1', b'1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_super_admins`
--

DROP TABLE IF EXISTS `tbl_super_admins`;
CREATE TABLE IF NOT EXISTS `tbl_super_admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_super_admins_user_name_unique` (`user_name`),
  UNIQUE KEY `tbl_super_admins_email_unique` (`email`),
  UNIQUE KEY `tbl_super_admins_phone_number_unique` (`phone_number`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_super_admins`
--

INSERT INTO `tbl_super_admins` (`id`, `user_name`, `email`, `phone_number`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@doorsoft.co', '01812391633', '$2y$10$/i25PhkNg/X4eUmVCmQPyOU1GrUoLQ9e5GjAYy6o9qi0/EclpTHoW', '2020-08-19 08:46:12', '2020-08-19 08:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_super_admins_role`
--

DROP TABLE IF EXISTS `tbl_super_admins_role`;
CREATE TABLE IF NOT EXISTS `tbl_super_admins_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `permissions` varchar(3000) DEFAULT '[]',
  `user_name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `del_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_super_admins_role`
--

INSERT INTO `tbl_super_admins_role` (`id`, `restaurant_id`, `permissions`, `user_name`, `description`, `del_status`) VALUES
(59, 8, '{\"dine_in\":1,\"to_go\":1,\"pickup\":1,\"delivery\":1,\"open_food\":1,\"note\":1,\"moble_order\":1,\"multi_order\":1,\"open_table\":1,\"modify_in_kitcjen_item_option\":1,\"ressend_in_kitchen_item\":1,\"edit_oder\":1,\"create_group_role\":1,\"create_role\":1,\"add_staff\":1,\"staff_list\":1,\"suppliers_group\":1,\"suppliers_list\":1,\"customer_group\":1,\"customer_list\":1,\"add_ingredient_category\":1,\"list_ingredient_category\":1,\"list_ingredient_unit\":1,\"add_ingredient_unit\":1,\"add_ingredient\":1,\"upload_ingredient_by_file\":1,\"list_ingredient\":1,\"add_purchases_group\":1,\"list_purchases\":1,\"add_floor\":1,\"list_floor\":1,\"pos\":1,\"list_sale\":1,\"add_category\":1,\"list_category\":1,\"add_sub_category\":1,\"list_sub_category\":1,\"add_shifts\":1,\"list_shifts\":1,\"add_modifiers\":1,\"list_modifiers\":1,\"add_food_menu\":1,\"list_food_menu\":1,\"payment_getaway\":1,\"payment_method\":1,\"kitchen_panels\":1,\"waiter_panels\":1,\"attendance\":1,\"stock\":1,\"stock_adjustment\":1,\"reservation\":1,\"add_adjustments\":1,\"list_inventory_adjustments\":1,\"expanse_category\":1,\"expanse\":1,\"expanse_items\":1,\"add_waste\":1,\"list_waste\":1,\"gift_card_list\":1,\"sell_gift_card\":1,\"add_gift_card\":1,\"restaurant_settings\":1,\"add_email_template\":1,\"profile_update\":1,\"add_supplier_payment\":1,\"list_supplier_payment\":1,\"add_customer_payment\":1,\"list_customer_payment\":1,\"register_report\":1,\"daily_summaery_report\":1,\"food_sale_report\":1,\"daily_sale_report\":1,\"detailed_sale_report\":1,\"consumption_report\":1,\"inventory_report\":1,\"low_inventory_report\":1,\"profit_loss_report\":1,\"kitchen_performance_report\":1,\"attendance_report\":1,\"supplier_ledher\":1,\"supplier_due_report\":1,\"customer_due_report\":1,\"customer_ledger\":1,\"prchase_report\":1,\"expense_report\":1,\"waste_report\":1,\"restaurant_id\":8}', 'Manager', 'Manager', 'Live'),
(63, 8, '{\"dine_in\":1,\"to_go\":0,\"pickup\":1,\"delivery\":0,\"open_food\":1,\"note\":0,\"moble_order\":0,\"multi_order\":0,\"open_table\":0,\"modify_in_kitcjen_item_option\":0,\"ressend_in_kitchen_item\":0,\"edit_oder\":1,\"create_group_role\":1,\"create_role\":1,\"add_staff\":1,\"staff_list\":1,\"suppliers_group\":1,\"suppliers_list\":1,\"customer_group\":1,\"customer_list\":1,\"add_ingredient_category\":0,\"list_ingredient_category\":1,\"list_ingredient_unit\":1,\"add_ingredient_unit\":0,\"add_ingredient\":0,\"upload_ingredient_by_file\":0,\"list_ingredient\":1,\"add_purchases_group\":0,\"list_purchases\":1,\"add_floor\":0,\"list_floor\":1,\"pos\":1,\"list_sale\":1,\"add_category\":0,\"list_category\":1,\"add_sub_category\":0,\"list_sub_category\":1,\"add_shifts\":0,\"list_shifts\":1,\"add_modifiers\":0,\"list_modifiers\":0,\"add_food_menu\":0,\"list_food_menu\":1,\"payment_getaway\":1,\"payment_method\":0,\"kitchen_panels\":1,\"waiter_panels\":1,\"attendance\":0,\"stock\":1,\"stock_adjustment\":1,\"reservation\":1,\"add_adjustments\":0,\"list_inventory_adjustments\":0,\"expanse_category\":0,\"expanse\":0,\"expanse_items\":0,\"add_waste\":1,\"list_waste\":1,\"gift_card_list\":1,\"sell_gift_card\":1,\"add_gift_card\":1,\"restaurant_settings\":1,\"add_email_template\":1,\"profile_update\":1,\"add_supplier_payment\":0,\"list_supplier_payment\":1,\"add_customer_payment\":0,\"list_customer_payment\":1,\"register_report\":0,\"daily_summaery_report\":0,\"food_sale_report\":0,\"daily_sale_report\":0,\"detailed_sale_report\":0,\"consumption_report\":0,\"inventory_report\":0,\"low_inventory_report\":0,\"profit_loss_report\":0,\"kitchen_performance_report\":0,\"attendance_report\":0,\"supplier_ledher\":0,\"supplier_due_report\":0,\"customer_due_report\":0,\"customer_ledger\":0,\"prchase_report\":0,\"expense_report\":0,\"waste_report\":0,\"restaurant_id\":8}', 'Boss', 'Boss', 'Live'),
(64, 8, '[]', 'Server', 'Server', 'Live'),
(66, 8, '{\"dine_in\":1,\"to_go\":1,\"pickup\":0,\"delivery\":1,\"open_food\":1,\"note\":1,\"moble_order\":0,\"multi_order\":0,\"open_table\":0,\"modify_in_kitcjen_item_option\":0,\"ressend_in_kitchen_item\":0,\"edit_oder\":0,\"create_group_role\":0,\"create_role\":0,\"add_staff\":0,\"staff_list\":0,\"suppliers_group\":0,\"suppliers_list\":0,\"customer_group\":0,\"customer_list\":0,\"add_ingredient_category\":0,\"list_ingredient_category\":0,\"list_ingredient_unit\":0,\"add_ingredient_unit\":0,\"add_ingredient\":0,\"upload_ingredient_by_file\":0,\"list_ingredient\":0,\"add_purchases_group\":0,\"list_purchases\":0,\"add_floor\":0,\"list_floor\":0,\"pos\":0,\"list_sale\":0,\"add_category\":0,\"list_category\":0,\"add_sub_category\":0,\"list_sub_category\":0,\"add_shifts\":0,\"list_shifts\":0,\"add_modifiers\":0,\"list_modifiers\":0,\"add_food_menu\":0,\"list_food_menu\":0,\"payment_getaway\":0,\"payment_method\":0,\"kitchen_panels\":0,\"waiter_panels\":0,\"attendance\":0,\"stock\":0,\"stock_adjustment\":0,\"reservation\":0,\"add_adjustments\":0,\"list_inventory_adjustments\":0,\"expanse_category\":0,\"expanse\":0,\"expanse_items\":0,\"add_waste\":0,\"list_waste\":0,\"gift_card_list\":0,\"sell_gift_card\":0,\"add_gift_card\":0,\"restaurant_settings\":0,\"add_email_template\":0,\"profile_update\":0,\"add_supplier_payment\":0,\"list_supplier_payment\":0,\"add_customer_payment\":0,\"list_customer_payment\":0,\"register_report\":0,\"daily_summaery_report\":0,\"food_sale_report\":0,\"daily_sale_report\":0,\"detailed_sale_report\":0,\"consumption_report\":0,\"inventory_report\":0,\"low_inventory_report\":0,\"profit_loss_report\":0,\"kitchen_performance_report\":0,\"attendance_report\":0,\"supplier_ledher\":0,\"supplier_due_report\":0,\"customer_due_report\":0,\"customer_ledger\":0,\"prchase_report\":0,\"expense_report\":0,\"waste_report\":0,\"restaurant_id\":8}', 'Driver', 'Driver', 'Live'),
(67, 8, '[]', 'Assistant Manager', 'Assistant Manager', 'Live'),
(69, 8, '[]', 'Training', 'Training', 'Live'),
(72, 8, '{\"dine_in\":1,\"to_go\":0,\"pickup\":1,\"delivery\":0,\"open_food\":1,\"note\":0,\"moble_order\":0,\"multi_order\":0,\"open_table\":0,\"modify_in_kitcjen_item_option\":0,\"ressend_in_kitchen_item\":0,\"edit_oder\":1,\"create_group_role\":0,\"create_role\":0,\"add_staff\":0,\"staff_list\":0,\"suppliers_group\":0,\"suppliers_list\":1,\"customer_group\":1,\"customer_list\":1,\"add_ingredient_category\":1,\"list_ingredient_category\":1,\"list_ingredient_unit\":1,\"add_ingredient_unit\":1,\"add_ingredient\":1,\"upload_ingredient_by_file\":1,\"list_ingredient\":1,\"add_purchases_group\":1,\"list_purchases\":1,\"add_floor\":1,\"list_floor\":1,\"pos\":1,\"list_sale\":1,\"add_category\":1,\"list_category\":1,\"add_sub_category\":1,\"list_sub_category\":1,\"add_shifts\":1,\"list_shifts\":1,\"add_modifiers\":1,\"list_modifiers\":1,\"add_food_menu\":1,\"list_food_menu\":1,\"payment_getaway\":1,\"payment_method\":1,\"kitchen_panels\":1,\"waiter_panels\":1,\"attendance\":1,\"stock\":1,\"stock_adjustment\":1,\"reservation\":1,\"add_adjustments\":1,\"list_inventory_adjustments\":1,\"expanse_category\":1,\"expanse\":1,\"expanse_items\":1,\"add_waste\":1,\"list_waste\":1,\"gift_card_list\":1,\"sell_gift_card\":1,\"add_gift_card\":1,\"restaurant_settings\":1,\"add_email_template\":1,\"profile_update\":1,\"add_supplier_payment\":1,\"list_supplier_payment\":1,\"add_customer_payment\":1,\"list_customer_payment\":1,\"register_report\":0,\"daily_summaery_report\":0,\"food_sale_report\":0,\"daily_sale_report\":0,\"detailed_sale_report\":0,\"consumption_report\":0,\"inventory_report\":0,\"low_inventory_report\":0,\"profit_loss_report\":0,\"kitchen_performance_report\":0,\"attendance_report\":0,\"supplier_ledher\":0,\"supplier_due_report\":0,\"customer_due_report\":0,\"customer_ledger\":0,\"prchase_report\":0,\"expense_report\":0,\"waste_report\":0,\"restaurant_id\":8}', 'Test', 'Test', 'Live'),
(71, 8, '{\"dine_in\":1,\"to_go\":0,\"pickup\":1,\"delivery\":0,\"open_food\":0,\"note\":0,\"moble_order\":0,\"multi_order\":0,\"open_table\":0,\"modify_in_kitcjen_item_option\":0,\"ressend_in_kitchen_item\":0,\"edit_oder\":0,\"create_group_role\":0,\"create_role\":0,\"add_staff\":0,\"staff_list\":0,\"suppliers_group\":1,\"suppliers_list\":1,\"customer_group\":1,\"customer_list\":1,\"add_ingredient_category\":0,\"list_ingredient_category\":0,\"list_ingredient_unit\":0,\"add_ingredient_unit\":0,\"add_ingredient\":0,\"upload_ingredient_by_file\":0,\"list_ingredient\":0,\"add_purchases_group\":1,\"list_purchases\":1,\"add_floor\":1,\"list_floor\":1,\"pos\":0,\"list_sale\":0,\"add_category\":0,\"list_category\":0,\"add_sub_category\":0,\"list_sub_category\":0,\"add_shifts\":0,\"list_shifts\":0,\"add_modifiers\":0,\"list_modifiers\":0,\"add_food_menu\":0,\"list_food_menu\":0,\"payment_getaway\":0,\"payment_method\":0,\"kitchen_panels\":1,\"waiter_panels\":0,\"attendance\":1,\"stock\":0,\"stock_adjustment\":1,\"reservation\":0,\"add_adjustments\":0,\"list_inventory_adjustments\":0,\"expanse_category\":0,\"expanse\":0,\"expanse_items\":0,\"add_waste\":0,\"list_waste\":0,\"gift_card_list\":0,\"sell_gift_card\":0,\"add_gift_card\":0,\"restaurant_settings\":1,\"add_email_template\":1,\"profile_update\":1,\"add_supplier_payment\":0,\"list_supplier_payment\":0,\"add_customer_payment\":0,\"list_customer_payment\":0,\"register_report\":1,\"daily_summaery_report\":0,\"food_sale_report\":1,\"daily_sale_report\":0,\"detailed_sale_report\":0,\"consumption_report\":0,\"inventory_report\":0,\"low_inventory_report\":0,\"profit_loss_report\":0,\"kitchen_performance_report\":0,\"attendance_report\":0,\"supplier_ledher\":0,\"supplier_due_report\":0,\"customer_due_report\":0,\"customer_ledger\":0,\"prchase_report\":0,\"expense_report\":0,\"waste_report\":0,\"restaurant_id\":8}', 'kitchen Staff', 'All kitchen staff', 'Live'),
(73, 8, '{\"dine_in\":0,\"to_go\":0,\"pickup\":0,\"delivery\":0,\"open_food\":0,\"note\":0,\"moble_order\":0,\"multi_order\":0,\"open_table\":0,\"modify_in_kitcjen_item_option\":0,\"ressend_in_kitchen_item\":0,\"edit_oder\":0,\"create_group_role\":0,\"create_role\":0,\"add_staff\":0,\"staff_list\":0,\"suppliers_group\":0,\"suppliers_list\":0,\"customer_group\":0,\"customer_list\":0,\"add_ingredient_category\":0,\"list_ingredient_category\":1,\"list_ingredient_unit\":1,\"add_ingredient_unit\":1,\"add_ingredient\":1,\"upload_ingredient_by_file\":1,\"list_ingredient\":1,\"add_purchases_group\":0,\"list_purchases\":0,\"add_floor\":1,\"list_floor\":1,\"pos\":0,\"list_sale\":0,\"add_category\":1,\"list_category\":1,\"add_sub_category\":1,\"list_sub_category\":1,\"add_shifts\":1,\"list_shifts\":1,\"add_modifiers\":1,\"list_modifiers\":1,\"add_food_menu\":1,\"list_food_menu\":1,\"payment_getaway\":0,\"payment_method\":0,\"kitchen_panels\":1,\"waiter_panels\":1,\"attendance\":1,\"stock\":1,\"stock_adjustment\":1,\"reservation\":1,\"add_adjustments\":0,\"list_inventory_adjustments\":0,\"expanse_category\":0,\"expanse\":0,\"expanse_items\":0,\"add_waste\":0,\"list_waste\":0,\"gift_card_list\":0,\"sell_gift_card\":0,\"add_gift_card\":0,\"restaurant_settings\":0,\"add_email_template\":0,\"profile_update\":0,\"add_supplier_payment\":0,\"list_supplier_payment\":0,\"add_customer_payment\":0,\"list_customer_payment\":0,\"register_report\":0,\"daily_summaery_report\":0,\"food_sale_report\":0,\"daily_sale_report\":0,\"detailed_sale_report\":0,\"consumption_report\":0,\"inventory_report\":0,\"low_inventory_report\":0,\"profit_loss_report\":0,\"kitchen_performance_report\":0,\"attendance_report\":0,\"supplier_ledher\":0,\"supplier_due_report\":0,\"customer_due_report\":0,\"customer_ledger\":0,\"prchase_report\":0,\"expense_report\":0,\"waste_report\":0,\"restaurant_id\":8}', 'Fin_test', 'Fin_test', 'Live'),
(74, 8, '{\"dine_in\":0,\"to_go\":0,\"pickup\":0,\"delivery\":0,\"open_food\":0,\"note\":0,\"moble_order\":0,\"multi_order\":0,\"open_table\":0,\"modify_in_kitcjen_item_option\":0,\"ressend_in_kitchen_item\":0,\"edit_oder\":0,\"create_group_role\":0,\"create_role\":0,\"add_staff\":0,\"staff_list\":0,\"suppliers_group\":0,\"suppliers_list\":0,\"customer_group\":0,\"customer_list\":0,\"add_ingredient_category\":0,\"list_ingredient_category\":0,\"list_ingredient_unit\":0,\"add_ingredient_unit\":0,\"add_ingredient\":0,\"upload_ingredient_by_file\":0,\"list_ingredient\":0,\"add_purchases_group\":0,\"list_purchases\":0,\"add_floor\":0,\"list_floor\":0,\"pos\":0,\"list_sale\":0,\"add_category\":0,\"list_category\":0,\"add_sub_category\":0,\"list_sub_category\":0,\"add_shifts\":0,\"list_shifts\":0,\"add_modifiers\":0,\"list_modifiers\":0,\"add_food_menu\":0,\"list_food_menu\":0,\"payment_getaway\":0,\"payment_method\":0,\"kitchen_panels\":1,\"waiter_panels\":0,\"attendance\":0,\"stock\":0,\"stock_adjustment\":0,\"reservation\":0,\"add_adjustments\":0,\"list_inventory_adjustments\":0,\"expanse_category\":0,\"expanse\":0,\"expanse_items\":0,\"add_waste\":0,\"list_waste\":0,\"gift_card_list\":0,\"sell_gift_card\":0,\"add_gift_card\":0,\"restaurant_settings\":0,\"add_email_template\":0,\"profile_update\":0,\"add_supplier_payment\":0,\"list_supplier_payment\":0,\"add_customer_payment\":0,\"list_customer_payment\":0,\"register_report\":1,\"daily_summaery_report\":1,\"food_sale_report\":1,\"daily_sale_report\":1,\"detailed_sale_report\":1,\"consumption_report\":1,\"inventory_report\":1,\"low_inventory_report\":1,\"profit_loss_report\":1,\"kitchen_performance_report\":1,\"attendance_report\":1,\"supplier_ledher\":1,\"supplier_due_report\":1,\"customer_due_report\":1,\"customer_ledger\":1,\"prchase_report\":1,\"expense_report\":1,\"waste_report\":1,\"restaurant_id\":8}', 'Staff', 'sada', 'Live'),
(77, 8, '{\"dine_in\":0,\"to_go\":0,\"pickup\":1,\"delivery\":0,\"open_food\":0,\"note\":0,\"moble_order\":1,\"multi_order\":0,\"open_table\":0,\"modify_in_kitcjen_item_option\":0,\"ressend_in_kitchen_item\":1,\"edit_oder\":1,\"create_group_role\":0,\"create_role\":0,\"add_staff\":0,\"staff_list\":0,\"suppliers_group\":0,\"suppliers_list\":0,\"customer_group\":0,\"customer_list\":0,\"add_ingredient_category\":0,\"list_ingredient_category\":0,\"list_ingredient_unit\":0,\"add_ingredient_unit\":0,\"add_ingredient\":0,\"upload_ingredient_by_file\":0,\"list_ingredient\":0,\"add_purchases_group\":0,\"list_purchases\":0,\"add_floor\":0,\"list_floor\":0,\"pos\":0,\"list_sale\":0,\"add_category\":0,\"list_category\":0,\"add_sub_category\":0,\"list_sub_category\":0,\"add_shifts\":0,\"list_shifts\":0,\"add_modifiers\":0,\"list_modifiers\":0,\"add_food_menu\":0,\"list_food_menu\":0,\"payment_getaway\":0,\"payment_method\":0,\"kitchen_panels\":0,\"waiter_panels\":0,\"attendance\":0,\"stock\":0,\"stock_adjustment\":0,\"reservation\":0,\"add_adjustments\":0,\"list_inventory_adjustments\":0,\"expanse_category\":0,\"expanse\":0,\"expanse_items\":0,\"add_waste\":0,\"list_waste\":0,\"gift_card_list\":0,\"sell_gift_card\":0,\"add_gift_card\":0,\"restaurant_settings\":0,\"add_email_template\":0,\"profile_update\":0,\"add_supplier_payment\":0,\"list_supplier_payment\":0,\"add_customer_payment\":0,\"list_customer_payment\":0,\"register_report\":0,\"daily_summaery_report\":1,\"food_sale_report\":1,\"daily_sale_report\":1,\"detailed_sale_report\":0,\"consumption_report\":0,\"inventory_report\":0,\"low_inventory_report\":1,\"profit_loss_report\":0,\"kitchen_performance_report\":0,\"attendance_report\":1,\"supplier_ledher\":0,\"supplier_due_report\":0,\"customer_due_report\":0,\"customer_ledger\":1,\"prchase_report\":0,\"expense_report\":0,\"waste_report\":0,\"restaurant_id\":8}', 'Clenner', '', 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_add_email_template`
--

DROP TABLE IF EXISTS `tbl_supplier_add_email_template`;
CREATE TABLE IF NOT EXISTS `tbl_supplier_add_email_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(255) NOT NULL,
  `template_body` text NOT NULL,
  `restaurant_id` bigint(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_supplier_add_email_template`
--

INSERT INTO `tbl_supplier_add_email_template` (`id`, `template_name`, `template_body`, `restaurant_id`, `date`) VALUES
(1, 'Test', 'fasds', 8, '2021-03-16 15:40:00'),
(2, 'Test 2', 'asfdasdf', 8, '2021-03-16 15:45:00'),
(3, 'Test 2 a', 'asfdasdf', 8, '2021-03-18 17:31:00'),
(4, 'Test 3', 'sdaf', 8, '2021-03-16 15:46:00'),
(7, 'Dip27457', 'asfdasd asfdk;askdf; asdfj ;asdjkf asdkfj;saldf sadfjl;sdakjf', 8, '2021-03-17 17:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier_due_payments`
--

DROP TABLE IF EXISTS `tbl_supplier_due_payments`;
CREATE TABLE IF NOT EXISTS `tbl_supplier_due_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_id` bigint(20) DEFAULT NULL,
  `Pay_name` varchar(200) DEFAULT NULL,
  `total_due` double DEFAULT NULL,
  `Payment_amount` double DEFAULT NULL,
  `Final_due` double DEFAULT NULL,
  `supplier_id` bigint(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_supplier_due_payments`
--

INSERT INTO `tbl_supplier_due_payments` (`id`, `restaurant_id`, `Pay_name`, `total_due`, `Payment_amount`, `Final_due`, `supplier_id`, `date`, `note`) VALUES
(12, 8, '9', 3480, 500, 2980, 20, '2021-03-15', 'note'),
(10, 8, 'test', 3830, 50, 3780, 20, '2021-03-15', '231321'),
(9, 8, 'Paypal', 3830, 300, 3530, 20, '2021-03-14', 'test'),
(11, 8, 'Paypal', 1450, 500, 950, 21, '2021-03-15', 'ad'),
(13, 8, NULL, NULL, NULL, NULL, NULL, '2021-03-16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_table_resurved`
--

DROP TABLE IF EXISTS `tbl_table_resurved`;
CREATE TABLE IF NOT EXISTS `tbl_table_resurved` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `table_id` int(25) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `ebd_time` time(6) DEFAULT NULL,
  `guest_count` int(25) DEFAULT NULL,
  `flore` text,
  `table_name` varchar(250) DEFAULT NULL,
  `del_status` enum('Live','Deleted') NOT NULL DEFAULT 'Live',
  `creat_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_table_resurved`
--

INSERT INTO `tbl_table_resurved` (`id`, `restaurant_id`, `table_id`, `name`, `date_start`, `start_time`, `date_end`, `ebd_time`, `guest_count`, `flore`, `table_name`, `del_status`, `creat_at`, `status`) VALUES
(45, 8, 40, '45', '2021-04-05', '19:53:00', '2021-04-05', '19:55:00.000000', 5, 'First Floor', '104', 'Live', '2021-04-05 13:53:48', 'Offline'),
(44, 8, 41, '1', '2021-04-05', '15:47:00', '2021-04-05', '20:48:00.000000', 4, 'First Floor', '105', 'Live', '2021-04-05 09:48:14', 'Offline'),
(42, 8, 37, 'DocumentTemplate', '2021-03-30', '15:09:00', '2021-03-30', '15:11:00.000000', 5, 'First Floor', '101', 'Live', '2021-03-30 09:09:53', 'Offline'),
(41, 8, 40, 'Less', '2021-03-30', '14:50:00', '2021-03-30', '14:52:00.000000', 2, 'First Floor', '104', 'Live', '2021-03-30 08:50:49', 'Offline'),
(40, 8, 37, 'asssssssss', '2021-03-30', '14:49:00', '2021-03-30', '14:55:00.000000', 2, 'First Floor', '101', 'Live', '2021-03-30 08:49:15', 'offline'),
(39, 8, 37, 'git', '2021-03-30', '13:47:00', '2021-03-30', '13:48:00.000000', 2, 'First Floor', '101', 'Live', '2021-03-30 07:47:44', NULL),
(38, 8, 37, 'joy', '2021-03-30', '13:47:00', '2021-03-30', '13:49:00.000000', 2, 'First Floor', '101', 'Live', '2021-03-30 07:47:15', NULL),
(37, 8, 37, 'Less', '2021-03-30', '12:58:00', '2021-03-30', '13:00:00.000000', 2, 'First Floor', '101', 'Live', '2021-03-30 06:58:45', NULL),
(36, 8, 38, 'joy', '2021-03-30', '12:40:00', '2021-03-30', '12:42:00.000000', 2, 'First Floor', '102', 'Live', '2021-03-30 06:40:45', NULL),
(35, 8, 40, 'joy', '2021-03-30', '12:35:00', '2021-03-30', '12:40:00.000000', 5, 'First Floor', '104', 'Live', '2021-03-30 06:36:19', NULL),
(34, 8, 39, 'Less', '2021-03-30', '12:32:00', '2021-04-01', '13:43:00.000000', 5, 'First Floor', '103', 'Live', '2021-03-30 06:32:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_third_party_vendors`
--

DROP TABLE IF EXISTS `tbl_third_party_vendors`;
CREATE TABLE IF NOT EXISTS `tbl_third_party_vendors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage_charge` double(10,2) DEFAULT NULL,
  `collect_tax` enum('Yes','No') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_third_party_vendors_country_id_foreign` (`country_id`),
  KEY `tbl_third_party_vendors_state_id_foreign` (`state_id`),
  KEY `tbl_third_party_vendors_city_id_foreign` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_third_party_vendors`
--

INSERT INTO `tbl_third_party_vendors` (`id`, `name`, `phone`, `email`, `percentage_charge`, `collect_tax`, `address`, `country_id`, `state_id`, `city_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'DoorDash', '01521493732', 'DoorDash@gmail.com', 10.00, 'No', 'm/13, noorjahan road, mohammodpur, dhaka', 1, 5, 2, 'Live', '2020-12-15 17:58:22', '2020-12-15 18:31:21'),
(2, 'Uber eat', '01521493732', 'Ubereat@gmail.com', 15.00, 'Yes', 'm/13, noorjahan road, mohammodpur, dhaka', 1, 5, 3, 'Live', '2020-12-15 18:34:47', '2020-12-15 18:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_under_sub_catagory`
--

DROP TABLE IF EXISTS `tbl_under_sub_catagory`;
CREATE TABLE IF NOT EXISTS `tbl_under_sub_catagory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catagory_id` int(11) DEFAULT NULL,
  `catagory_name` varchar(255) DEFAULT NULL,
  `sub_catagory_id` int(11) DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `creat_this` int(11) DEFAULT NULL,
  `creat_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_under_sub_catagory`
--

INSERT INTO `tbl_under_sub_catagory` (`id`, `catagory_id`, `catagory_name`, `sub_catagory_id`, `restaurant_id`, `creat_this`, `creat_at`) VALUES
(32, 17, 'Meet', 11, 8, 13, '2021-03-14 17:24:12'),
(28, 14, 'food', 11, 8, 10, '2021-03-01 05:45:49'),
(27, 14, 'food', 16, 8, 10, '2021-03-01 05:45:41'),
(26, 15, 'vasitable', 15, 8, 10, '2021-03-01 05:38:29'),
(25, 15, 'vasitable', 12, 8, 10, '2021-03-01 05:38:13'),
(24, 15, 'vasitable', 14, 8, 10, '2021-03-01 05:38:07'),
(31, 16, 'contact_edit.blade', 14, 8, 13, '2021-03-14 17:23:54'),
(30, 16, 'contact_edit.blade', 16, 8, 13, '2021-03-14 17:23:51'),
(33, 17, 'Meet', 18, 8, 13, '2021-03-14 17:25:58'),
(36, 20, 'All You Can Eat', 13, 8, 10, '2021-03-15 17:07:50'),
(37, 20, 'All You Can Eat', 12, 8, 10, '2021-03-15 17:07:57'),
(38, 20, 'All You Can Eat', 11, 8, 10, '2021-03-15 17:09:05'),
(39, 19, 'Dipto', 13, 8, 10, '2021-04-06 10:45:08'),
(49, 19, 'Dipto', 14, 8, 10, '2021-04-07 10:48:25'),
(47, 19, 'Dipto', 12, 8, 10, '2021-04-07 10:44:02'),
(48, 19, 'Dipto', 11, 8, 10, '2021-04-07 10:47:02'),
(50, 17, 'Meet', 17, 8, 10, '2021-04-10 12:31:27'),
(55, 19, 'gghgh', 18, 8, 10, '2021-04-12 05:50:51'),
(59, 19, NULL, 18, 8, 10, '2021-04-12 07:06:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  ADD CONSTRAINT `tbl_cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `tbl_countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `tbl_states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_customer_addresses`
--
ALTER TABLE `tbl_customer_addresses`
  ADD CONSTRAINT `tbl_customer_addresses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_customer_addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `tbl_countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_customer_addresses_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `tbl_states` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tbl_customer_online_orders`
--
ALTER TABLE `tbl_customer_online_orders`
  ADD CONSTRAINT `tbl_customer_online_orders_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_customer_online_order_details`
--
ALTER TABLE `tbl_customer_online_order_details`
  ADD CONSTRAINT `tbl_customer_online_order_details_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_customer_online_order_details_modifiers`
--
ALTER TABLE `tbl_customer_online_order_details_modifiers`
  ADD CONSTRAINT `restn_id` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_customer_reservations`
--
ALTER TABLE `tbl_customer_reservations`
  ADD CONSTRAINT `tbl_customer_reservations_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_kitchen_notifications`
--
ALTER TABLE `tbl_kitchen_notifications`
  ADD CONSTRAINT `tbl_kitchen_notifications_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD CONSTRAINT `tbl_notifications_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurants`
--
ALTER TABLE `tbl_restaurants`
  ADD CONSTRAINT `tbl_restaurants_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_restaurants_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `tbl_countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_restaurants_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `tbl_states` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tbl_restaurant_attendances`
--
ALTER TABLE `tbl_restaurant_attendances`
  ADD CONSTRAINT `tbl_restaurant_attendances_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_category_for_suppliers`
--
ALTER TABLE `tbl_restaurant_category_for_suppliers`
  ADD CONSTRAINT `tbl_restaurant_category_for_suppliers_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tbl_restaurant_ingredient_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_category_for_suppliers_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `tbl_restaurant_suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_customers`
--
ALTER TABLE `tbl_restaurant_customers`
  ADD CONSTRAINT `tbl_restaurant_customers_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_restaurant_customers_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `tbl_countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_restaurant_customers_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_customers_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `tbl_states` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tbl_restaurant_customer_groups`
--
ALTER TABLE `tbl_restaurant_customer_groups`
  ADD CONSTRAINT `tbl_restaurant_customer_groups_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_expenses`
--
ALTER TABLE `tbl_restaurant_expenses`
  ADD CONSTRAINT `tbl_restaurant_expenses_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `tbl_restaurant_expense_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_expenses_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_expense_items`
--
ALTER TABLE `tbl_restaurant_expense_items`
  ADD CONSTRAINT `tbl_restaurant_expense_items_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_floors`
--
ALTER TABLE `tbl_restaurant_floors`
  ADD CONSTRAINT `tbl_restaurant_floors_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_floor_tables`
--
ALTER TABLE `tbl_restaurant_floor_tables`
  ADD CONSTRAINT `tbl_restaurant_floor_tables_floor_id_foreign` FOREIGN KEY (`floor_id`) REFERENCES `tbl_restaurant_floors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_floor_tables_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_food_menus`
--
ALTER TABLE `tbl_restaurant_food_menus`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `tbl_restaurant_food_menu_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_food_menus_panel_id_foreign` FOREIGN KEY (`panel_id`) REFERENCES `tbl_restaurant_kitchen_panels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_food_menus_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_food_menu_categories`
--
ALTER TABLE `tbl_restaurant_food_menu_categories`
  ADD CONSTRAINT `tbl_restaurant_food_menu_categories_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_food_menu_ingredients`
--
ALTER TABLE `tbl_restaurant_food_menu_ingredients`
  ADD CONSTRAINT `food_menu_id` FOREIGN KEY (`food_menu_id`) REFERENCES `tbl_restaurant_food_menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ing_id` FOREIGN KEY (`ing_id`) REFERENCES `tbl_restaurant_ingredients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_food_menu_modifiers`
--
ALTER TABLE `tbl_restaurant_food_menu_modifiers`
  ADD CONSTRAINT `tbl_restaurant_food_menu_modifiers_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_food_menu_modifier_ingredients`
--
ALTER TABLE `tbl_restaurant_food_menu_modifier_ingredients`
  ADD CONSTRAINT `ig_id` FOREIGN KEY (`ig_id`) REFERENCES `tbl_restaurant_ingredients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mod_id` FOREIGN KEY (`mod_id`) REFERENCES `tbl_restaurant_food_menu_modifiers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_food_menu_shifts`
--
ALTER TABLE `tbl_restaurant_food_menu_shifts`
  ADD CONSTRAINT `tbl_restaurant_food_menu_shifts_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_gift_cards`
--
ALTER TABLE `tbl_restaurant_gift_cards`
  ADD CONSTRAINT `tbl_restaurant_gift_cards_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_gift_card_sells`
--
ALTER TABLE `tbl_restaurant_gift_card_sells`
  ADD CONSTRAINT `tbl_restaurant_gift_card_sells_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_ingredients`
--
ALTER TABLE `tbl_restaurant_ingredients`
  ADD CONSTRAINT `tbl_restaurant_ingredients_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tbl_restaurant_ingredient_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_restaurant_ingredients_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_ingredients_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `tbl_restaurant_ingredient_units` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tbl_restaurant_ingredient_categories`
--
ALTER TABLE `tbl_restaurant_ingredient_categories`
  ADD CONSTRAINT `tbl_restaurant_ingredient_categories_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_ingredient_units`
--
ALTER TABLE `tbl_restaurant_ingredient_units`
  ADD CONSTRAINT `tbl_restaurant_ingredient_units_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_kitchen_panels`
--
ALTER TABLE `tbl_restaurant_kitchen_panels`
  ADD CONSTRAINT `tbl_restaurant_kitchen_panels_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_modifier_for_food_menus`
--
ALTER TABLE `tbl_restaurant_modifier_for_food_menus`
  ADD CONSTRAINT `fd_menu_id` FOREIGN KEY (`fd_menu_id`) REFERENCES `tbl_restaurant_food_menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mdf_id` FOREIGN KEY (`mdf_id`) REFERENCES `tbl_restaurant_food_menu_modifiers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_orders_table`
--
ALTER TABLE `tbl_restaurant_orders_table`
  ADD CONSTRAINT `tbl_restaurant_orders_table_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_purchases`
--
ALTER TABLE `tbl_restaurant_purchases`
  ADD CONSTRAINT `tbl_restaurant_purchases_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `tbl_restaurant_suppliers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tbl_restaurant_purchase_ingredients`
--
ALTER TABLE `tbl_restaurant_purchase_ingredients`
  ADD CONSTRAINT `tbl_restaurant_purchase_ingredients_ingredient_id_foreign` FOREIGN KEY (`ingredient_id`) REFERENCES `tbl_restaurant_ingredients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_purchase_ingredients_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `tbl_restaurant_purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_sales`
--
ALTER TABLE `tbl_restaurant_sales`
  ADD CONSTRAINT `tbl_restaurant_sales_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_sales_consumptions`
--
ALTER TABLE `tbl_restaurant_sales_consumptions`
  ADD CONSTRAINT `tbl_restaurant_sales_consumptions_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_sales_consumptions_of_menus`
--
ALTER TABLE `tbl_restaurant_sales_consumptions_of_menus`
  ADD CONSTRAINT `tbl_restaurant_sales_consumptions_of_menus_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_sales_cons_of_mod_of_menus`
--
ALTER TABLE `tbl_restaurant_sales_cons_of_mod_of_menus`
  ADD CONSTRAINT `tbl_restaurant_sales_cons_of_mod_of_menus_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_sales_details`
--
ALTER TABLE `tbl_restaurant_sales_details`
  ADD CONSTRAINT `tbl_restaurant_sales_details_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_sales_details_modifiers`
--
ALTER TABLE `tbl_restaurant_sales_details_modifiers`
  ADD CONSTRAINT `tbl_restaurant_sales_details_modifiers_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_sales_holds`
--
ALTER TABLE `tbl_restaurant_sales_holds`
  ADD CONSTRAINT `tbl_restaurant_sales_holds_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_sales_holds_details`
--
ALTER TABLE `tbl_restaurant_sales_holds_details`
  ADD CONSTRAINT `tbl_restaurant_sales_holds_details_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_sales_holds_details_modifiers`
--
ALTER TABLE `tbl_restaurant_sales_holds_details_modifiers`
  ADD CONSTRAINT `restaurant_id` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_sales_payment_by_gift_cards`
--
ALTER TABLE `tbl_restaurant_sales_payment_by_gift_cards`
  ADD CONSTRAINT `tbl_restaurant_sales_payment_by_gift_cards_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_settings_charges`
--
ALTER TABLE `tbl_restaurant_settings_charges`
  ADD CONSTRAINT `tbl_restaurant_settings_charges_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_settings_logos`
--
ALTER TABLE `tbl_restaurant_settings_logos`
  ADD CONSTRAINT `tbl_restaurant_settings_logos_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_settings_social_links`
--
ALTER TABLE `tbl_restaurant_settings_social_links`
  ADD CONSTRAINT `tbl_restaurant_settings_social_links_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_settings_taxes`
--
ALTER TABLE `tbl_restaurant_settings_taxes`
  ADD CONSTRAINT `tbl_restaurant_settings_taxes_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_settings_tax_fields`
--
ALTER TABLE `tbl_restaurant_settings_tax_fields`
  ADD CONSTRAINT `tbl_restaurant_settings_tax_fields_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `tbl_restaurant_settings_taxes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_shift_for_food_menus`
--
ALTER TABLE `tbl_restaurant_shift_for_food_menus`
  ADD CONSTRAINT `tbl_restaurant_shift_for_food_menus_fd_menu_id_foreign` FOREIGN KEY (`fd_menu_id`) REFERENCES `tbl_restaurant_food_menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_shift_for_food_menus_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `tbl_restaurant_food_menu_shifts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_stock_adjustments`
--
ALTER TABLE `tbl_restaurant_stock_adjustments`
  ADD CONSTRAINT `tbl_restaurant_stock_adjustments_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_stock_adjustment_ingredients`
--
ALTER TABLE `tbl_restaurant_stock_adjustment_ingredients`
  ADD CONSTRAINT `restr_id` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_suppliers`
--
ALTER TABLE `tbl_restaurant_suppliers`
  ADD CONSTRAINT `tbl_restaurant_suppliers_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_restaurant_suppliers_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `tbl_countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_restaurant_suppliers_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_suppliers_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `tbl_states` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tbl_restaurant_users`
--
ALTER TABLE `tbl_restaurant_users`
  ADD CONSTRAINT `tbl_restaurant_users_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_wastes`
--
ALTER TABLE `tbl_restaurant_wastes`
  ADD CONSTRAINT `tbl_restaurant_wastes_food_menu_id_foreign` FOREIGN KEY (`food_menu_id`) REFERENCES `tbl_restaurant_food_menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_wastes_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_waste_ingredients`
--
ALTER TABLE `tbl_restaurant_waste_ingredients`
  ADD CONSTRAINT `tbl_restaurant_waste_ingredients_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_states`
--
ALTER TABLE `tbl_states`
  ADD CONSTRAINT `tbl_states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `tbl_countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_third_party_vendors`
--
ALTER TABLE `tbl_third_party_vendors`
  ADD CONSTRAINT `tbl_third_party_vendors_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_third_party_vendors_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `tbl_countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_third_party_vendors_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `tbl_states` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
