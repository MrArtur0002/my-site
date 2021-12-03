-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 03 2021 г., 15:11
-- Версия сервера: 5.7.33
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mybase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` enum('door','treasure') DEFAULT NULL,
  `value` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cards`
--

INSERT INTO `cards` (`id`, `created_at`, `updated_at`, `title`, `image`, `type`, `value`, `description`, `category_id`) VALUES
(1, '2021-09-06 00:24:29', '2021-09-17 04:21:40', '3872 орка', '1630998481.jpg', 'door', '0', '', 1),
(2, '2021-09-06 00:25:00', '2021-09-06 00:25:00', 'Амазонка', '1630905900.jpg', 'door', '0', '', 1),
(3, '2021-09-06 00:25:16', '2021-09-06 00:25:16', 'Бигфут', '1630905916.jpg', 'door', '0', '', 1),
(4, '2021-09-06 00:25:37', '2021-09-17 04:46:34', 'Башмаки реального быстрого бега', '1630905937.jpg', 'treasure', '0', '', 4),
(5, '2021-09-06 00:25:52', '2021-09-06 00:25:52', 'Бульрог', '1630905952.jpg', 'door', '0', '', 1),
(6, '2021-09-06 00:26:02', '2021-09-17 04:55:50', 'Чит', '1630905962.jpg', 'door', '0', '', 8),
(7, '2021-09-06 00:26:17', '2021-09-17 04:56:11', 'Клирик', '1630905977.jpg', 'door', '0', '', 2),
(8, '2021-09-06 00:26:46', '2021-09-17 04:56:19', 'Клирик 2', '1630906006.jpg', 'door', '0', '', 2),
(9, '2021-09-06 00:26:54', '2021-09-17 04:57:03', 'Клирик 3', '1630906014.jpg', 'door', '0', '', 2),
(10, '2021-09-06 00:27:24', '2021-09-17 04:21:22', 'Курица на башне', '1630906044.jpg', 'door', '0', '', 5),
(11, '2021-09-06 00:27:41', '2021-09-17 04:57:21', 'Смена класса', '1630906061.jpg', 'door', '0', '', 5),
(12, '2021-09-06 00:28:00', '2021-09-17 04:57:30', 'Потеря уровня', '1630906080.jpg', 'door', '0', '', 5),
(13, '2021-09-17 04:13:01', '2021-09-17 04:13:01', 'Утка обреченности', '1631869981.jpg', 'door', '0', '', 5),
(14, '2021-09-17 04:16:42', '2021-09-17 04:16:42', 'Проклятие', '1631870202.jpg', 'door', '0', '', 5),
(15, '2021-09-17 04:17:13', '2021-09-17 04:17:13', 'Большая потеря', '1631870233.jpg', 'door', '0', '', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `card_filters`
--

CREATE TABLE `card_filters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `cart_categories`
--

CREATE TABLE `cart_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart_categories`
--

INSERT INTO `cart_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Монстр', NULL, NULL),
(2, 'Раса', NULL, NULL),
(3, 'Класс', NULL, NULL),
(4, 'Одежда', NULL, NULL),
(5, 'Проклятье', NULL, NULL),
(6, 'Зелье', NULL, NULL),
(7, 'Событие', NULL, NULL),
(8, 'Улучшение', NULL, NULL),
(9, 'Помощники', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `deck`
--

CREATE TABLE `deck` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `deck`
--

INSERT INTO `deck` (`id`, `name`, `image`, `description`) VALUES
(1, 'Стартовая колода 1', 'image', 'Стартовая колода');

-- --------------------------------------------------------

--
-- Структура таблицы `deck_cards`
--

CREATE TABLE `deck_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deck_id` bigint(20) UNSIGNED NOT NULL,
  `card_id` bigint(20) UNSIGNED NOT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `deck_cards`
--

INSERT INTO `deck_cards` (`id`, `created_at`, `updated_at`, `deck_id`, `card_id`, `active`) VALUES
(1, '2021-11-18 09:33:04', '2021-11-18 09:33:04', 1, 1, 1),
(2, '2021-11-11 09:34:29', '2021-11-11 09:34:29', 1, 2, 1),
(3, '2021-11-11 09:35:00', '2021-11-11 09:35:00', 1, 3, 1),
(4, '2021-11-11 09:36:52', '2021-11-11 09:36:52', 1, 4, 1),
(5, '2021-11-11 09:36:52', '2021-11-11 09:36:52', 1, 5, 1),
(6, '2021-11-11 09:37:33', '2021-11-11 09:37:33', 1, 6, 1),
(7, '2021-11-11 09:37:33', '2021-11-11 09:37:33', 1, 7, 1),
(8, '2021-11-11 09:37:56', '2021-11-11 09:37:56', 1, 8, 1),
(9, '2021-11-11 09:37:56', '2021-11-11 09:37:56', 1, 9, 1),
(10, '2021-11-11 09:38:21', '2021-11-11 09:38:21', 1, 10, 1),
(12, '2021-11-11 09:38:47', '2021-11-11 09:38:47', 1, 11, 1),
(13, '2021-11-11 09:38:47', '2021-11-11 09:38:47', 1, 12, 1),
(14, '2021-11-11 09:39:08', '2021-11-11 09:39:08', 1, 13, 1),
(15, '2021-11-11 09:39:08', '2021-11-11 09:39:08', 1, 14, 1),
(16, '2021-11-11 09:39:33', '2021-11-11 09:39:33', 1, 15, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `filters`
--

CREATE TABLE `filters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `card_id` bigint(20) UNSIGNED NOT NULL,
  `filter_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `game_bot`
--

CREATE TABLE `game_bot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `game_bot`
--

INSERT INTO `game_bot` (`id`, `created_at`, `updated_at`, `name`, `room_id`) VALUES
(1, '2021-12-01 04:42:40', '2021-12-01 04:42:40', 'Альберт', 6),
(2, '2021-12-01 04:42:40', '2021-12-01 04:42:40', 'Азамат', 6),
(3, '2021-12-01 04:42:40', '2021-12-01 04:42:40', 'Артур', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `game_bot_cards`
--

CREATE TABLE `game_bot_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL,
  `bot_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `card_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_28_053309_create_test_table', 1),
(5, '2021_07_28_063238_create_roles_table', 1),
(6, '2021_07_28_063246_create_permissions_table', 1),
(7, '2021_07_28_063429_create_users_permissions_table', 1),
(8, '2021_07_28_063456_create_users_roles_table', 1),
(9, '2021_07_28_063522_create_roles_permissions_table', 1),
(10, '2021_08_06_125148_create_pages_table', 1),
(11, '2021_08_06_131007_create_tree_pages_table', 1),
(12, '2021_08_08_083355_create_cards_table', 1),
(13, '2021_09_01_041934_create_deck_table', 1),
(14, '2021_09_01_042113_create_cart_categories_table', 1),
(19, '2021_09_01_042217_create_card_filters_table', 2),
(20, '2021_09_01_042301_create_filters_table', 2),
(21, '2021_09_09_040717_change_type_cards_table', 2),
(22, '2021_11_17_111714_create_room_table', 2),
(23, '2021_11_18_044558_create_users_cards_table', 3),
(24, '2021_11_18_091422_create_deck_cards_table', 4),
(26, '2021_12_01_064333_create_room_properties_table', 5),
(27, '2021_12_01_064851_create_game_bot_table', 6),
(28, '2021_12_01_065242_create_game_bot_cards_table', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `template` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `position` smallint(6) NOT NULL,
  `content` longtext NOT NULL,
  `dop_content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'change admin', 'change admin', '2021-09-17 05:09:39', '2021-09-17 05:09:39'),
(2, 'game', 'game', '2021-09-17 05:09:39', '2021-09-17 05:09:39'),
(3, 'change admin', 'change admin', '2021-11-17 06:46:09', '2021-11-17 06:46:09'),
(4, 'game', 'game', '2021-11-17 06:46:09', '2021-11-17 06:46:09'),
(5, 'change admin', 'change admin', '2021-11-17 06:51:52', '2021-11-17 06:51:52'),
(6, 'game', 'game', '2021-11-17 06:51:52', '2021-11-17 06:51:52');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2021-09-17 05:09:39', '2021-09-17 05:09:39'),
(2, 'user', 'user', '2021-09-17 05:09:39', '2021-09-17 05:09:39'),
(3, 'admin', 'admin', '2021-11-17 06:46:09', '2021-11-17 06:46:09'),
(4, 'user', 'user', '2021-11-17 06:46:09', '2021-11-17 06:46:09'),
(5, 'admin', 'admin', '2021-11-17 06:51:52', '2021-11-17 06:51:52'),
(6, 'user', 'user', '2021-11-17 06:51:52', '2021-11-17 06:51:52');

-- --------------------------------------------------------

--
-- Структура таблицы `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `room`
--

CREATE TABLE `room` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text NOT NULL,
  `deck_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `current_user_id` bigint(20) UNSIGNED NOT NULL,
  `difficulty` text NOT NULL,
  `id_room` bigint(20) UNSIGNED NOT NULL,
  `last_move` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `room`
--

INSERT INTO `room` (`id`, `created_at`, `updated_at`, `description`, `deck_id`, `user_id`, `current_user_id`, `difficulty`, `id_room`, `last_move`) VALUES
(6, '2021-12-01 04:42:40', '2021-12-01 04:42:40', 'Тестовая версия', 1, 2, 2, 'Легкая', 2, '2021-11-30 19:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `room_properties`
--

CREATE TABLE `room_properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `players` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tree_pages`
--

CREATE TABLE `tree_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ancestor` bigint(20) UNSIGNED NOT NULL,
  `descendant` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Artur Davletshin', 'smiteartur01@mail.ru', NULL, '$2y$10$QAt0ruF376HYsvo2KFAIweJcxxcchW6qMJ5aZzfpf/DB4/OXTd7YC', 'RCq9EnpFgRu1epp17onXrtYOgyrmv9kzqtY8dISebwWmgm3jBEW4v4i7dLd5', '2021-09-17 05:09:39', '2021-09-17 05:09:39'),
(2, 'Test User', 'test@mail.ru', NULL, '$2y$10$j0NVtbHGCJX5vHGq6aXr8eVsbUYrnJSP.R8T5XiumEBm6IATY8cgm', 'UUg8lKiFR1cpGECAQD2ZRMd1Ezb0LLIAjlcM0vQaOKhgaNdb3FKbuubeCMp8', '2021-09-17 05:09:39', '2021-09-17 05:09:39');

-- --------------------------------------------------------

--
-- Структура таблицы `users_cards`
--

CREATE TABLE `users_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `card_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users_permissions`
--

CREATE TABLE `users_permissions` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_permissions`
--

INSERT INTO `users_permissions` (`user_id`, `permission_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users_roles`
--

CREATE TABLE `users_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CATEGORY` (`category_id`);

--
-- Индексы таблицы `card_filters`
--
ALTER TABLE `card_filters`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cart_categories`
--
ALTER TABLE `cart_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `deck`
--
ALTER TABLE `deck`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `deck_cards`
--
ALTER TABLE `deck_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deck_cards_card_id_foreign` (`card_id`),
  ADD KEY `deck_cards_deck_id_foreign` (`deck_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filters_card_id_foreign` (`card_id`),
  ADD KEY `filters_filter_id_foreign` (`filter_id`);

--
-- Индексы таблицы `game_bot`
--
ALTER TABLE `game_bot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_bot_room_id_foreign` (`room_id`);

--
-- Индексы таблицы `game_bot_cards`
--
ALTER TABLE `game_bot_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_bot_cards_room_id_foreign` (`room_id`),
  ADD KEY `game_bot_cards_bot_id_foreign` (`bot_id`),
  ADD KEY `game_bot_cards_card_id_foreign` (`card_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `roles_permissions_permission_id_foreign` (`permission_id`);

--
-- Индексы таблицы `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_deck_id_foreign` (`deck_id`),
  ADD KEY `room_user_id_foreign` (`user_id`),
  ADD KEY `room_current_user_id_foreign` (`current_user_id`);

--
-- Индексы таблицы `room_properties`
--
ALTER TABLE `room_properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_properties_room_id_foreign` (`room_id`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tree_pages`
--
ALTER TABLE `tree_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tree_pages_ancestor_foreign` (`ancestor`),
  ADD KEY `tree_pages_descendant_foreign` (`descendant`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `users_cards`
--
ALTER TABLE `users_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_cards_room_id_foreign` (`room_id`),
  ADD KEY `users_cards_user_id_foreign` (`user_id`),
  ADD KEY `users_cards_card_id_foreign` (`card_id`);

--
-- Индексы таблицы `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `users_permissions_permission_id_foreign` (`permission_id`);

--
-- Индексы таблицы `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `users_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `card_filters`
--
ALTER TABLE `card_filters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `cart_categories`
--
ALTER TABLE `cart_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `deck`
--
ALTER TABLE `deck`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `deck_cards`
--
ALTER TABLE `deck_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `filters`
--
ALTER TABLE `filters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `game_bot`
--
ALTER TABLE `game_bot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `game_bot_cards`
--
ALTER TABLE `game_bot_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `room`
--
ALTER TABLE `room`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `room_properties`
--
ALTER TABLE `room_properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tree_pages`
--
ALTER TABLE `tree_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users_cards`
--
ALTER TABLE `users_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `cart_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `deck_cards`
--
ALTER TABLE `deck_cards`
  ADD CONSTRAINT `deck_cards_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deck_cards_deck_id_foreign` FOREIGN KEY (`deck_id`) REFERENCES `deck` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `filters`
--
ALTER TABLE `filters`
  ADD CONSTRAINT `filters_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `filters_filter_id_foreign` FOREIGN KEY (`filter_id`) REFERENCES `card_filters` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `game_bot`
--
ALTER TABLE `game_bot`
  ADD CONSTRAINT `game_bot_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `game_bot_cards`
--
ALTER TABLE `game_bot_cards`
  ADD CONSTRAINT `game_bot_cards_bot_id_foreign` FOREIGN KEY (`bot_id`) REFERENCES `game_bot` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `game_bot_cards_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `game_bot_cards_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD CONSTRAINT `roles_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_current_user_id_foreign` FOREIGN KEY (`current_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_deck_id_foreign` FOREIGN KEY (`deck_id`) REFERENCES `deck` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `room_properties`
--
ALTER TABLE `room_properties`
  ADD CONSTRAINT `room_properties_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tree_pages`
--
ALTER TABLE `tree_pages`
  ADD CONSTRAINT `tree_pages_ancestor_foreign` FOREIGN KEY (`ancestor`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tree_pages_descendant_foreign` FOREIGN KEY (`descendant`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users_cards`
--
ALTER TABLE `users_cards`
  ADD CONSTRAINT `users_cards_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_cards_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_cards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD CONSTRAINT `users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
