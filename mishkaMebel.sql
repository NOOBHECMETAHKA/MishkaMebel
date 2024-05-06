-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 06 2024 г., 10:38
-- Версия сервера: 5.7.39-log
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mishkaMebel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `City` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `House` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Entrance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Apartment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `addresses_user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `addresses`
--

INSERT INTO `addresses` (`id`, `City`, `Street`, `House`, `Entrance`, `Apartment`, `created_at`, `updated_at`, `is_deleted`, `addresses_user_id`) VALUES
(3, 'Москва', 'Липовая', '28', '2', '1', NULL, NULL, 0, 2),
(4, 'Санкт-Петербург', 'Обручево', '19к2', '1', '28', NULL, NULL, 0, 31),
(11, 'Липовый', 'Липовая', '28', '3', '28', NULL, NULL, 0, 1),
(12, 'Липовый', 'Липовая', '28', '3', '28', NULL, NULL, 0, 1),
(13, 'Краснодар', 'Краснодарская', '28', '29', '3', NULL, NULL, 0, 2),
(15, 'Москва', 'Ленинский', '28', '2', '33', NULL, NULL, 0, 10),
(17, 'Липовая', 'Московская', '28', '3', '3', NULL, NULL, 0, 6),
(18, 'Липовая', 'простая', '21', '2', '28', NULL, NULL, 0, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `baskets`
--

CREATE TABLE `baskets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `count_product` int(10) UNSIGNED NOT NULL,
  `user_basket_id` bigint(20) UNSIGNED NOT NULL,
  `product_basket_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `beds`
--

CREATE TABLE `beds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `have_boxes` tinyint(1) NOT NULL DEFAULT '0',
  `beds_bases_id` bigint(20) UNSIGNED NOT NULL,
  `beds_materials_id` bigint(20) UNSIGNED NOT NULL,
  `bed_furniture_sizes_id` bigint(20) UNSIGNED NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `beds`
--

INSERT INTO `beds` (`id`, `type`, `have_boxes`, `beds_bases_id`, `beds_materials_id`, `bed_furniture_sizes_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Двуспальная', 0, 3, 7, 7, 0, NULL, NULL),
(2, 'Односпальная', 1, 3, 7, 6, 0, NULL, NULL),
(3, 'Двуспальная', 0, 3, 7, 7, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `bed_bases`
--

CREATE TABLE `bed_bases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bed_bases`
--

INSERT INTO `bed_bases` (`id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Раскладные основания', 0, NULL, NULL),
(2, 'Пружинные основания', 0, NULL, NULL),
(3, 'Ламельные основания', 0, NULL, NULL),
(4, 'Подъемные основания', 0, NULL, NULL),
(5, 'Фиксированные основания', 0, NULL, NULL),
(6, 'Красное дерево', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `percent` int(10) UNSIGNED NOT NULL,
  `expiration_discount` timestamp NOT NULL,
  `discounts_product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `discounts`
--

INSERT INTO `discounts` (`id`, `percent`, `expiration_discount`, `discounts_product_id`, `created_at`, `updated_at`) VALUES
(1, 33, '2024-04-25 21:00:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `furniture_dimensions`
--

CREATE TABLE `furniture_dimensions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `length` decimal(10,2) NOT NULL,
  `width` decimal(10,2) NOT NULL,
  `height` decimal(10,2) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `furniture_dimensions`
--

INSERT INTO `furniture_dimensions` (`id`, `length`, `width`, `height`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '40.00', '60.00', '180.00', 0, NULL, NULL),
(2, '50.00', '70.00', '190.00', 0, NULL, NULL),
(3, '55.00', '75.00', '195.00', 0, NULL, NULL),
(4, '40.00', '65.00', '200.00', 0, NULL, NULL),
(5, '50.00', '100.00', '200.00', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `furniture_sizes`
--

CREATE TABLE `furniture_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `length` decimal(10,2) NOT NULL,
  `width` decimal(10,2) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `furniture_sizes`
--

INSERT INTO `furniture_sizes` (`id`, `length`, `width`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '180.00', '80.00', 0, NULL, NULL),
(6, '200.00', '220.00', 0, NULL, NULL),
(7, '300.00', '250.00', 0, NULL, NULL),
(8, '400.00', '200.00', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `furniture_storages`
--

CREATE TABLE `furniture_storages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `furniture_storages_furniture_dimensions_id` bigint(20) UNSIGNED NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `furniture_storages`
--

INSERT INTO `furniture_storages` (`id`, `type`, `furniture_storages_furniture_dimensions_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Комод', 4, 0, NULL, NULL),
(2, 'Полка', 2, 0, NULL, NULL),
(3, 'Тумбочка', 3, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `materials`
--

INSERT INTO `materials` (`id`, `name`, `appointment`, `created_at`, `updated_at`) VALUES
(1, 'Пенополиуретан', 'Набивка', NULL, NULL),
(2, 'Натуральный латекс', 'Набивка', NULL, NULL),
(3, 'Кокосовое волокно', 'Набивка', NULL, NULL),
(4, 'Пружинные блоки', 'Набивка', NULL, NULL),
(5, 'Сосна', 'Материал', NULL, NULL),
(6, 'Бук', 'Материал', NULL, NULL),
(7, 'Дуб', 'Материал', NULL, NULL),
(8, 'Красное дерево', 'Материал', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `mattresses`
--

CREATE TABLE `mattresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hardness` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mattresses_materials_id` bigint(20) UNSIGNED NOT NULL,
  `mattresses_furniture_sizes_id` bigint(20) UNSIGNED NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `mattresses`
--

INSERT INTO `mattresses` (`id`, `type`, `age_category`, `hardness`, `mattresses_materials_id`, `mattresses_furniture_sizes_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Детские матрасы', 'Взрослый', 'Средней жётскости', 2, 7, 0, NULL, NULL),
(2, 'Кокосовые', 'Взрослый', 'Средней жётскости', 3, 1, 0, NULL, NULL),
(3, 'Кокосовые', 'Взрослый', 'Средней жётскости', 3, 8, 0, NULL, NULL),
(4, 'Латексные', 'Детский', 'Мягкие', 2, 6, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `mattress_covers`
--

CREATE TABLE `mattress_covers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `function` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mattress_covers_furniture_sizes_id` bigint(20) UNSIGNED NOT NULL,
  `mattress_fastenings_id` bigint(20) UNSIGNED NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `mattress_covers`
--

INSERT INTO `mattress_covers` (`id`, `function`, `mattress_covers_furniture_sizes_id`, `mattress_fastenings_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Защита от запаха', 1, 1, 0, NULL, NULL),
(2, 'Защита от акны', 1, 2, 0, NULL, NULL),
(3, 'Защита от тепла', 1, 2, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `mattress_fastenings`
--

CREATE TABLE `mattress_fastenings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `mattress_fastenings`
--

INSERT INTO `mattress_fastenings` (`id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Молния', 0, NULL, NULL),
(2, 'Резинка', 0, NULL, NULL),
(3, 'Застежки-липучки', 0, NULL, NULL),
(4, 'Резиновые ремни', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_27_200001_create_personal_information_table', 1),
(7, '2023_09_27_200002_create_products_table', 1),
(8, '2023_09_27_200003_create_statuses_table', 1),
(9, '2023_09_27_200005_create_addresses_table', 1),
(10, '2023_09_27_200006_create_orders_table', 1),
(11, '2023_09_27_200007_create_order_lists_table', 1),
(12, '2023_09_27_200010_create_discounts_table', 1),
(13, '2023_09_28_200008_create_photos_table', 1),
(14, '2023_10_30_200009_create_baskets_table', 1),
(15, '2024_01_23_300001_create_type_tables_table', 1),
(16, '2024_01_23_300002_create_furniture_dimensions_table', 1),
(17, '2024_01_23_300003_create_materials_table', 1),
(18, '2024_01_23_300004_create_bed_bases_table', 1),
(19, '2024_01_23_300005_create_furniture_sizes_table', 1),
(20, '2024_01_23_300006_create_mattress_fastenings_table', 1),
(21, '2024_01_23_300007_create_mattress_covers_table', 1),
(22, '2024_01_23_300008_create_mattresses_table', 1),
(23, '2024_01_23_300009_create_beds_table', 1),
(24, '2024_01_23_300010_create_tables_table', 1),
(25, '2024_01_23_300011_create_furniture_storages_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ordered_in` timestamp NOT NULL,
  `total_cost` decimal(10,2) UNSIGNED NOT NULL,
  `order_status_id` bigint(20) UNSIGNED NOT NULL,
  `order_address_id` bigint(20) UNSIGNED NOT NULL,
  `enabling_deliveries` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `ordered_in`, `total_cost`, `order_status_id`, `order_address_id`, `enabling_deliveries`, `is_deleted`, `create_at`) VALUES
(6, '2024-04-25 11:20:43', '50000.00', 1, 3, 0, 0, '2024-04-25 11:20:43'),
(7, '2024-04-25 11:33:57', '50000.00', 1, 3, 0, 0, '2024-04-25 11:33:57'),
(8, '2024-04-25 11:51:27', '50000.00', 5, 3, 1, 0, '2024-04-25 11:51:27'),
(9, '2024-04-25 11:55:53', '50000.00', 1, 3, 0, 0, '2024-04-25 11:55:53'),
(10, '2024-04-25 11:58:26', '50000.00', 13, 13, 1, 0, '2024-04-25 11:58:26'),
(11, '2024-04-25 14:39:07', '10000.00', 1, 15, 0, 0, '2024-04-25 14:39:07'),
(13, '2024-04-25 16:52:54', '180629.00', 1, 17, 0, 0, '2024-04-25 16:52:54'),
(14, '2024-04-25 17:04:57', '144000.00', 1, 17, 0, 0, '2024-04-25 17:04:57');

-- --------------------------------------------------------

--
-- Структура таблицы `order_lists`
--

CREATE TABLE `order_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price_sum_product` decimal(10,2) UNSIGNED NOT NULL,
  `count_product` bigint(20) UNSIGNED NOT NULL,
  `product_order_list_id` bigint(20) UNSIGNED NOT NULL,
  `order_order_list_id` bigint(20) UNSIGNED NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_lists`
--

INSERT INTO `order_lists` (`id`, `price_sum_product`, `count_product`, `product_order_list_id`, `order_order_list_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(9, '40000.00', 4, 2, 6, 0, NULL, NULL),
(10, '10000.00', 1, 4, 6, 0, NULL, NULL),
(11, '40000.00', 4, 2, 7, 0, NULL, NULL),
(12, '10000.00', 1, 4, 7, 0, NULL, NULL),
(13, '40000.00', 4, 2, 8, 0, NULL, NULL),
(14, '10000.00', 1, 4, 8, 0, NULL, NULL),
(15, '40000.00', 4, 2, 9, 0, NULL, NULL),
(16, '10000.00', 1, 4, 9, 0, NULL, NULL),
(17, '40000.00', 4, 2, 10, 0, NULL, NULL),
(18, '10000.00', 1, 4, 10, 0, NULL, NULL),
(19, '10000.00', 1, 2, 11, 0, NULL, NULL),
(22, '134000.00', 1, 1, 13, 0, NULL, NULL),
(23, '10000.00', 1, 2, 13, 0, NULL, NULL),
(24, '36629.00', 1, 3, 13, 0, NULL, NULL),
(25, '134000.00', 1, 1, 14, 0, NULL, NULL),
(26, '10000.00', 1, 2, 14, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_information`
--

CREATE TABLE `personal_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_information_user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `personal_information`
--

INSERT INTO `personal_information` (`id`, `name`, `phone_number`, `personal_information_user_id`, `created_at`, `updated_at`) VALUES
(2, 'Завьялов Михаил', '+7(611) 211-3111', 2, NULL, NULL),
(3, 'Александр', '+7(999) 885-7953', 31, NULL, NULL),
(4, 'Михаил', '+7(958) 635-5222', 1, NULL, NULL),
(5, 'Василий', '+7(958) 636-6312', 10, NULL, NULL),
(6, 'Анна', '+7(222) 222-2222', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_photo_id` bigint(20) UNSIGNED NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id`, `link`, `product_photo_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'images/OMtVHSHqw4RyLBf8r3eWlnqIE1OfwKAwCMXdm12e.jpg', 1, 0, NULL, NULL),
(2, 'images/NUNyFMP4khEiCFekDAybRUdqsqTYHaEPhhyVVWhv.jpg', 1, 0, NULL, NULL),
(3, 'images/XyqMbXUwds51t4IBz7zvrvilrW1rJcCIdDLoZEtZ.png', 2, 0, NULL, NULL),
(4, 'images/LZPeHwAvQvl4hQLBaa0nFPBsc5rFKJPmzCuw52yv.jpg', 3, 0, NULL, NULL),
(5, 'images/2q0rNalTjvmey79ssOhFQzxlJYbSsYRCdGy5gef8.jpg', 3, 0, NULL, NULL),
(6, 'images/a4rWNpIaCj6hBhAlB1a9DW7fW8fPHUUPtFOVI9Tj.jpg', 4, 0, NULL, NULL),
(7, 'images/jGzQEOlBlDV0QBz6o0IWPLnVhAm1b9LoICuREsFT.jpg', 4, 0, NULL, NULL),
(8, 'images/R7TrmwiXrGLjLy4JSgALN0xeNqLFHeL0kpQ27JE3.jpg', 4, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_product_id` bigint(20) UNSIGNED NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `url_name`, `name`, `description`, `guarantee`, `price`, `category`, `products_product_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'dorogaya_krovat', 'Дорогая кровать', 'Для супер пользователей', 'Нету гарантии', '200000.00', 'beds', 2, 0, NULL, NULL),
(2, 'nedorogaya_krovat', 'Недорогая кровать', 'Скидка не действут', '3 месяца', '10000.00', 'beds', 1, 0, NULL, NULL),
(3, 'krovatka_megaudobnaya', 'Кроватка мегаудобная', 'Для премиум людей', '1 год', '36629.00', 'beds', 3, 0, NULL, NULL),
(4, 'shkaf_udobnyy', 'Шкаф удобный', 'Для складирования одежды', 'Нету гарантии', '10000.00', 'furniture-storage', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `description`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'В рассмотрении', 'Заказ оформлен и в скором времени мы с вами свяжемся', 0, NULL, NULL),
(2, 'Отменён', 'Заказ отменён. Если возникли вопросы обратитесь к администрации!', 0, NULL, NULL),
(3, 'Передан в доставку', 'Заказ передан в доставку и в скором времени прибудет в место назначения!', 0, NULL, NULL),
(4, 'На складе', 'Заказ хранится на складе организации', 0, NULL, NULL),
(5, 'Утерян', 'Ваш заказ утерян! Мы разбираемся в чём причина!', 0, NULL, NULL),
(6, 'Уничтожен', 'Ваш заказ уничтожен!', 0, NULL, NULL),
(7, 'В обработке', 'Заказ находится в процессе обработки сотрудниками компании', 0, NULL, NULL),
(8, 'Ожидает оплаты', 'Заказ готов к выполнению, но требует оплаты со стороны клиента', 0, NULL, NULL),
(9, 'Готовится к отправке', 'Товары для заказа готовятся к упаковке и отправке клиенту', 0, NULL, NULL),
(10, 'Отправлен', 'Заказ отправлен клиенту и находится в процессе доставки', 0, NULL, NULL),
(11, 'Доставлен', 'Заказ успешно доставлен клиенту и получен им', 0, NULL, NULL),
(12, 'Возврат', 'Клиент вернул товары из заказа и запрашивает возврат средств', 0, NULL, NULL),
(13, 'Рассмотрение возврата', 'Запрос на возврат товаров находится на рассмотрении администрации', 0, NULL, NULL),
(14, 'Завершен', 'Заказ успешно выполнен, оплачен и получен клиентом, завершенный статус', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_table_id` bigint(20) UNSIGNED NOT NULL,
  `tables_materials_id` bigint(20) UNSIGNED NOT NULL,
  `tables_furniture_dimensions_id` bigint(20) UNSIGNED NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tables`
--

INSERT INTO `tables` (`id`, `type_table_id`, `tables_materials_id`, `tables_furniture_dimensions_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 4, 8, 3, 0, NULL, NULL),
(2, 3, 7, 3, 0, NULL, NULL),
(3, 4, 5, 4, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `type_tables`
--

CREATE TABLE `type_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `type_tables`
--

INSERT INTO `type_tables` (`id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Прямые письменные столы', 0, NULL, NULL),
(2, 'Угловые письменные столы', 0, NULL, NULL),
(3, 'Письменные столы под окном', 0, NULL, NULL),
(4, 'Столы подоконники', 0, NULL, NULL),
(5, 'Письменные столы для детей', 0, NULL, NULL),
(6, 'Письменные столы для подростков', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `is_banned` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `is_banned`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dock.zemlak@example.com', '$2y$12$n/.lsckU/S7PdzMX6ePZq.H5yapqD/YzH5UXscFc5GcaR3JWlMTcm', 'admin', 0, 'DStm0bYNB4sPQUxs70NzvWUhlBurOJNOMCv1EKoyfvzgMm1aTMlsOYVNwTum', '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(2, 'keshaun.pacocha@example.org', '$2y$12$DJRjzgc2UyRLnOrTcp4kVerIEPsXuuo9KVxQhioTN4f2QPdtORTvC', 'user', 0, 'v2mCtDy4yH8iE84qFegNYKMo3tN4Pb6gniA0V6S5epix4cVeycUz0DjFgvIz', '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(3, 'dillan30@example.net', '$2y$12$j8a6PhulmAuW0HyrNS1lge/CeRIjMI92LcExU4hfRmwoAp8jsNFRC', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(4, 'sibyl.rempel@example.com', '$2y$12$5ujTqZdcoopE9vg94e6Xxun3CvlAo6bnBoDLbN2vYg4o/sS29zQCi', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(5, 'ismael99@example.org', '$2y$12$5RQL0/PxOOcEmFqF3JBDZOYvJtwkskYOM6BsAfU5/2PwP/UgtP.f6', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(6, 'alakin@example.net', '$2y$12$inpTegXCiob47A3PIhlkWO2o7.as/PntRY3q1dNiVBJYUAXHNxFtG', 'admin', 0, 'g4RTb0oKt77sHVlaAhzi1wOdfypk2B8P3FPwfIS0mLWu8m0GzwFIlVsXXBgd', '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(7, 'maegan.padberg@example.com', '$2y$12$pxYgs.yFlxe18O3Ey6/JOOkMMvIuIrNeaGEwkAQJiLW8LmCmo7.Qe', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(8, 'amparo57@example.com', '$2y$12$/m.I7SsmITwrwbOYIzI43.NA761n1SWaiOq1NLiC6wp2umEIS8JTG', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(9, 'ubrown@example.com', '$2y$12$UUgeQk0Gj/LjumQcuUsG6OWuzlpxS2wIIsGhbLdWUJbuJuujDEnmG', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(10, 'shawna08@example.org', '$2y$12$L0N.3UOJeoQLuzqMXlKC/eFGMYn1aF8LgeinF84YcnETT22yQiRsm', 'user', 0, 'v3QI5bX851KjtuqRmlzxaIc8M6oCQqppKxNWktCPCr2bY0YqlB5b0pb2V1ep', '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(11, 'ocie.bashirian@example.com', '$2y$12$jN1INLUxzKhql/Y3I4iyceGBzTJZO7bRwAosvDTrGHcjHmUSzPyHG', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(12, 'irma28@example.org', '$2y$12$76YKLl06Uvd9V7f41IAq1.BI28pwjI4vIC08R64zpoq.7lOSr9obG', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(13, 'aliyah23@example.org', '$2y$12$rViJUFbIo.TW8rGAB.qUBOHkoGpvUxqJRM8OGkotaonWnxkpcSQKC', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(14, 'dante11@example.org', '$2y$12$vIYAn7GqA0GgxUJWYGFaGu.tTMqLxD.rNg7ep4adiF4fMqFIgBbtm', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(15, 'cquitzon@example.org', '$2y$12$tcy7KmZW0BhR0rhtiHmvI.XPJYiOR3V/9YHGF3vK.FTuTBhgB9yI6', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(16, 'ankunding.guiseppe@example.org', '$2y$12$ZhIMe.PQndVm6zJDa4ZfFubUNzz5cx9walXjuu3AsahIWJUiyAM4m', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(17, 'okuvalis@example.net', '$2y$12$5pK/LHeprIJFTYaYaCAAeeRKK7D4EYSeH27eEmxOMRYp.jApIzC76', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(18, 'carleton.walsh@example.com', '$2y$12$KU5PIH8/nx78rKPudjsGBuSPgbgRljtyaxCIW1PreEIK1vaGIFMU2', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(19, 'felix77@example.com', '$2y$12$wsoHN.6ocpboSrLIcjAfgekTxgApdL4OlWMJJ15Vjql8joDrKf/xG', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(20, 'bschumm@example.com', '$2y$12$HZEF.EdiLMHC2c5Z1f6NQuiD8g2a/r.BydNDBpytQRTwHWo0PHoia', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(21, 'ward.gino@example.com', '$2y$12$JCc2hKAmtwmnZRRz2dyDauTIDHUhlbptOuccH8zAhhcFCPxVgE/Ka', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(22, 'ypfeffer@example.org', '$2y$12$u/UWrxTJiNwKyLGX.2ztG.np0GZGRt..J0yn8BdbG1hXRVUigb5eW', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(23, 'iwehner@example.org', '$2y$12$k53iw5N.ntMNpibZtJRRcOQptNmHmxqBgdJ4bZbt1YbxcWoGqYC.S', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(24, 'narciso48@example.net', '$2y$12$sTrdWbWzX9QGBUYPJpDIged9wWFGHBogc2lmL/g7a6oHMEucdDrNS', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(25, 'rlowe@example.com', '$2y$12$oDsbpFj35L5jBGr9v4sYbuxl0sI1O9DiUX7SDY6gHvj6Bo1HX1U36', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(26, 'joshua06@example.net', '$2y$12$K2LMEsYp2F0epot4/xFlIewpDZY2/R0TW3Rm5RxhRuFnIrOY/oqiO', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(27, 'hwill@example.net', '$2y$12$NmsoPObhGztT5LQBtgdcxOUJusOOajPdpIfurV8/4oXBBder1Pfva', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(28, 'koss.adrien@example.org', '$2y$12$BZ51HwpCgi0c8enyLC3FMePqiX8TZiwBRr76umudusK9b4BxGPRIC', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(29, 'wcarroll@example.net', '$2y$12$p23fXK7R3DrhLDOLWDjm8.CEM6niY5HOQQFnUFQIB.XCKlE8E3osK', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(30, 'joan.bergnaum@example.org', '$2y$12$EXSTky8qD89IsA/oBc3eiu6F6ugpO41eamhbtsWi.8ruut7mQlnNi', 'user', 0, NULL, '2024-04-23 17:22:54', '2024-04-23 17:22:54'),
(31, 'lilalexk4@gmail.com', '$2y$12$EgaQb7rMPwbmTtI5Ir6Pu.g5Xsw1YWq14lMrtTmbuYU6NMz82oofe', 'user', 0, 'F1AIbwflN88UJ1iInQgVltoEAVyJxCTQX0VPQCCbw2Z01mMq7rdjGUa4alqh', '2024-04-24 11:18:44', '2024-04-24 11:18:44');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_fk` (`addresses_user_id`);

--
-- Индексы таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_basket_fk` (`user_basket_id`),
  ADD KEY `product_basket_fk` (`product_basket_id`);

--
-- Индексы таблицы `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beds_bases_fk` (`beds_bases_id`),
  ADD KEY `beds_materials_fk` (`beds_materials_id`),
  ADD KEY `bed_furniture_sizes_fk` (`bed_furniture_sizes_id`);

--
-- Индексы таблицы `bed_bases`
--
ALTER TABLE `bed_bases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bed_bases_name_unique` (`name`);

--
-- Индексы таблицы `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discounts_product_fk` (`discounts_product_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `furniture_dimensions`
--
ALTER TABLE `furniture_dimensions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `furniture_sizes`
--
ALTER TABLE `furniture_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `furniture_storages`
--
ALTER TABLE `furniture_storages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `furniture_storages_furniture_dimensions_fk` (`furniture_storages_furniture_dimensions_id`);

--
-- Индексы таблицы `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `materials_name_unique` (`name`);

--
-- Индексы таблицы `mattresses`
--
ALTER TABLE `mattresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mattresses_materials_fk` (`mattresses_materials_id`),
  ADD KEY `mattresses_furniture_sizes_fk` (`mattresses_furniture_sizes_id`);

--
-- Индексы таблицы `mattress_covers`
--
ALTER TABLE `mattress_covers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mattress_covers_furniture_sizes_fk` (`mattress_covers_furniture_sizes_id`),
  ADD KEY `mattress_fastenings_id` (`mattress_fastenings_id`);

--
-- Индексы таблицы `mattress_fastenings`
--
ALTER TABLE `mattress_fastenings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mattress_fastenings_name_unique` (`name`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_status_fk` (`order_status_id`),
  ADD KEY `order_address_fk` (`order_address_id`);

--
-- Индексы таблицы `order_lists`
--
ALTER TABLE `order_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_order_list_fk` (`product_order_list_id`),
  ADD KEY `order_order_list_fk` (`order_order_list_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_information_phone_number_unique` (`phone_number`),
  ADD KEY `personal_information_user_fk` (`personal_information_user_id`);

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_photo_fk` (`product_photo_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `statuses_name_unique` (`name`);

--
-- Индексы таблицы `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_table_fk` (`type_table_id`),
  ADD KEY `tables_materials_fk` (`tables_materials_id`),
  ADD KEY `tables_furniture_dimensions_fk` (`tables_furniture_dimensions_id`);

--
-- Индексы таблицы `type_tables`
--
ALTER TABLE `type_tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_tables_name_unique` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `beds`
--
ALTER TABLE `beds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `bed_bases`
--
ALTER TABLE `bed_bases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `furniture_dimensions`
--
ALTER TABLE `furniture_dimensions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `furniture_sizes`
--
ALTER TABLE `furniture_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `furniture_storages`
--
ALTER TABLE `furniture_storages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `mattresses`
--
ALTER TABLE `mattresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `mattress_covers`
--
ALTER TABLE `mattress_covers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `mattress_fastenings`
--
ALTER TABLE `mattress_fastenings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `order_lists`
--
ALTER TABLE `order_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `type_tables`
--
ALTER TABLE `type_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_fk` FOREIGN KEY (`addresses_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD CONSTRAINT `product_basket_fk` FOREIGN KEY (`product_basket_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_basket_fk` FOREIGN KEY (`user_basket_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `beds`
--
ALTER TABLE `beds`
  ADD CONSTRAINT `bed_furniture_sizes_fk` FOREIGN KEY (`bed_furniture_sizes_id`) REFERENCES `furniture_sizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `beds_bases_fk` FOREIGN KEY (`beds_bases_id`) REFERENCES `bed_bases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `beds_materials_fk` FOREIGN KEY (`beds_materials_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `discounts_product_fk` FOREIGN KEY (`discounts_product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `furniture_storages`
--
ALTER TABLE `furniture_storages`
  ADD CONSTRAINT `furniture_storages_furniture_dimensions_fk` FOREIGN KEY (`furniture_storages_furniture_dimensions_id`) REFERENCES `furniture_dimensions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `mattresses`
--
ALTER TABLE `mattresses`
  ADD CONSTRAINT `mattresses_furniture_sizes_fk` FOREIGN KEY (`mattresses_furniture_sizes_id`) REFERENCES `furniture_sizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mattresses_materials_fk` FOREIGN KEY (`mattresses_materials_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `mattress_covers`
--
ALTER TABLE `mattress_covers`
  ADD CONSTRAINT `mattress_covers_furniture_sizes_fk` FOREIGN KEY (`mattress_covers_furniture_sizes_id`) REFERENCES `furniture_sizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mattress_fastenings_id` FOREIGN KEY (`mattress_fastenings_id`) REFERENCES `mattress_fastenings` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_address_fk` FOREIGN KEY (`order_address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_status_fk` FOREIGN KEY (`order_status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_lists`
--
ALTER TABLE `order_lists`
  ADD CONSTRAINT `order_order_list_fk` FOREIGN KEY (`order_order_list_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_order_list_fk` FOREIGN KEY (`product_order_list_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `personal_information`
--
ALTER TABLE `personal_information`
  ADD CONSTRAINT `personal_information_user_fk` FOREIGN KEY (`personal_information_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `product_photo_fk` FOREIGN KEY (`product_photo_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_furniture_dimensions_fk` FOREIGN KEY (`tables_furniture_dimensions_id`) REFERENCES `furniture_dimensions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tables_materials_fk` FOREIGN KEY (`tables_materials_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `type_table_fk` FOREIGN KEY (`type_table_id`) REFERENCES `type_tables` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
