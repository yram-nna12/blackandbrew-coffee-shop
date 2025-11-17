-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2025 at 01:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blackandbrew_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `description`, `price`, `image`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Espresso', 'Strong and bold espresso shot.', 100.00, 'espresso.png', 'coffee-beverages', NULL, NULL),
(2, 'Americano', 'Smooth espresso with hot water.', 120.00, 'americano.png', 'coffee-beverages', NULL, NULL),
(3, 'Latte', 'Creamy espresso with steamed milk.', 150.00, 'Latte.png', 'coffee-beverages', NULL, NULL),
(4, 'Cappuccino', 'Espresso topped with frothy milk foam.', 160.00, 'Cappuccino.png', 'coffee-beverages', NULL, NULL),
(5, 'Cold Brew', 'Slow-brewed coffee served over ice.', 170.00, 'ColdBrew.png', 'coffee-beverages', NULL, NULL),
(6, 'Hot chocolate', 'Rich, comforting chocolate drink.', 130.00, 'HotChocolate2.png', 'coffee-beverages', NULL, '2025-11-05 09:55:53'),
(7, 'Pink Venom', 'Swirling with pink foam art or Raspberry Drizzle', 230.00, 'PinkVenom.png', 'coffee-beverages', NULL, NULL),
(8, 'Moonlight Latte', 'Latte topped with Whipped Milk Foam dusted in edible Silver Shimmer', 245.00, 'MoonlightLatte.png', 'coffee-beverages', NULL, NULL),
(9, 'Croissant', 'Flaky, buttery French pastry.', 80.00, 'croissant.png', 'pastries-bread', NULL, NULL),
(10, 'Banana Bread', 'Moist bread with ripe banana flavor.', 90.00, 'bananabread.png', 'pastries-bread', NULL, NULL),
(11, 'Cinnamon Roll', 'Soft roll topped with cinnamon glaze.', 100.00, 'cinnamonroll.png', 'pastries-bread', NULL, NULL),
(12, 'Club Sandwich', 'Triple-decker with chicken and veggies with fries (optional)', 180.00, 'clubsandwich.png', 'light-bites', NULL, NULL),
(13, 'Veggie Sandwich', 'Fresh vegetables on toasted bread with fries (optional)', 150.00, 'veggiesandwich.png', 'light-bites', NULL, NULL),
(15, 'Mocha', 'A chocolate-flavoured variant of caffè latte', 115.00, 'menu_691a15169afc4.webp', 'coffee-beverages', '2025-11-16 18:16:56', '2025-11-16 18:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '20251104031800', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1762320201, 1),
(2, '20251104031900', 'App\\Database\\Migrations\\CreateMenuItemsTable', 'default', 'App', 1762320202, 1),
(3, '2025-11-04-180808', 'App\\Database\\Migrations\\AddCategoryToMenuItems', 'default', 'App', 1762320202, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(2, 'Black', 'Brew', 'admin@coffee.email', '$2y$10$Mff62hqykZqqL.CP5LN9LeBbDcs67QwHAu7vjNO1PsUkNCs5Arts6', 'admin', '2025-11-05 14:08:41', '2025-11-05 14:08:41'),
(4, 'Lisa', 'Manoban', 'lisamanoban9719@gmail.com', '$2y$10$VLejgx5zBYKJjUMbbRjoKeJ4L1DGHC.Bb79w3LcdrcKB0WDP4VNVK', 'customer', '2025-11-05 08:17:52', '2025-11-05 12:03:22'),
(5, 'Jennie', 'Kim', 'jenniekim@gmail.com', '$2y$10$2WUEWCSUdJZdweKQpY8x0uT.HhEXPpsnAmP.59YEUsO9bRn8/AEoK', 'customer', '2025-11-05 08:57:46', '2025-11-05 08:57:46'),
(7, 'Rose ', 'Park', 'rosepark@gmail.com', '$2y$10$I01tYBe2EL9mjvxNcCw7AenOe2pxSvrDSdMC85w9oRAtyBfCbH4M.', 'customer', '2025-11-05 11:47:09', '2025-11-05 11:47:09'),
(8, 'Jisoo', 'Kim', 'jisookim@gmail.com', '$2y$10$tbRr.hOW0e/mbxHM2ltk3.08jTCND84E5H2zoVjChPLvt6cpps1am', 'customer', '2025-11-05 11:48:34', '2025-11-05 11:48:34'),
(10, 'Marielle', 'Torres', 'marielleT@gmail.com', '$2y$10$Ah45WT7phfONasK4SFvwZuRB2Yh/juC4G464SYcq6oW9jtJMafeji', 'customer', '2025-11-05 11:50:21', '2025-11-05 11:50:21'),
(11, 'Mikha', 'Lim', 'mikhalim@gmail.com', '$2y$10$qvN9DEGojJ/LhNZtc9oQPu2ERa/FrN.u2hGRcJY.Jt2zVnvVnfLNS', 'customer', '2025-11-05 11:50:50', '2025-11-05 11:50:50'),
(12, 'Faye', 'Macahilig', 'macahiligfaye@gmail.com', '$2y$10$IcX.UC.kXeOLbeGqFPxX8eo.jIHX9O8LozWszvWbGrJL8RotgbcBS', 'customer', '2025-11-10 14:50:29', '2025-11-10 14:50:29'),
(13, 'Rona', 'Serrano', 'ronamae03@gmail.com', '$2y$10$pdt.9OwXSLYtPVvrKAg4ker0Rt6jl2SXYJ0vO7K2jswS4k6t.7WSm', 'customer', '2025-11-12 09:52:48', '2025-11-12 09:54:10'),
(14, 'Nicolle France', 'Choy', 'Nicollefchoy@gmail.com', '$2y$10$6HPWFzT4QPiEJD4.FiDFXOdEhRfDH2BdtiBl1DIvCXCjOy1qvgybO', 'customer', '2025-11-12 09:55:56', '2025-11-12 09:55:56'),
(15, 'Miley Bobby', 'Brown', 'mileybobby@gmail.com', '$2y$10$BKjw45hthTQNpggrFkzvz.p6j7bObmN2.zJyM37y7WNqjIWKi23nW', 'customer', '2025-11-12 09:56:33', '2025-11-12 09:56:33'),
(16, 'Joe', 'Keery', 'joekeery@gmail.com', '$2y$10$xd.I8/NA./zGeq43LF30UereHyZk/B0AVnlu8UJ5K/gmhngR6vN0m', 'customer', '2025-11-12 09:57:37', '2025-11-12 09:57:37'),
(17, 'Mary Ann', 'Camacho', 'maryanncamacho512@gmail.com', '$2y$10$GEuysKiQIuaB02LhuTj3GemNfCT/2vvThAHdHCWcX46QWd9sBKEta', 'customer', '2025-11-16 12:51:52', '2025-11-16 12:51:52'),
(18, 'Marielle', 'Tolentino', 'marielle121305@gmail.com', '$2y$10$hLWtVoJZGiEcHcasIJlIa.8HJVA5RGVluutfgbH2apd1MEllg8Qwa', 'customer', '2025-11-16 19:18:29', '2025-11-16 19:18:29'),
(19, 'Mardy', 'Camacho', 'mardyalerC@gmail.com', '$2y$10$YMACL7CrR2vtO0OXErvP8OSrvcNvG7VSFowSHp3YFkCXNczxtyKHe', 'customer', '2025-11-16 20:01:11', '2025-11-16 20:01:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
