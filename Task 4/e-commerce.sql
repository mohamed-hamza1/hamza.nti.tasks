-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 03:26 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `street` varchar(100) NOT NULL,
  `building` varchar(100) NOT NULL,
  `floor` tinyint(2) NOT NULL,
  `flat` smallint(4) NOT NULL,
  `notes` varchar(1000) NOT NULL,
  `type` varchar(100) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 => active, 0=> not active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 => active, 0=> not active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 => active, 0=> not active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` tinyint(2) UNSIGNED NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 => available, 0 => not available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` int(10) UNSIGNED NOT NULL,
  `discount` varchar(250) NOT NULL,
  `discount_type` varchar(100) NOT NULL,
  `start_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `mini_order_price` decimal(7,2) NOT NULL,
  `max_discount_value` decimal(7,2) NOT NULL,
  `max_usage_per_user` tinyint(2) NOT NULL,
  `max_usage_per_coupon` smallint(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` varchar(1000) NOT NULL,
  `title_ar` varchar(1000) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `discount_type` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `start_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers_products`
--

CREATE TABLE `offers_products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `offer_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total_price` decimal(7,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 => pending, 1=>shipped, 2 => on the way, 3=> deliverd',
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `deliverd_at` datetime NOT NULL,
  `address_id` int(10) UNSIGNED NOT NULL,
  `coupon_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `quantity` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(256) NOT NULL,
  `name_ar` varchar(256) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `quantity` smallint(3) NOT NULL,
  `desc_en` longtext NOT NULL,
  `desc_ar` longtext NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 => active, 0=> not active',
  `code` mediumint(5) NOT NULL,
  `subcategory_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_specs`
--

CREATE TABLE `products_specs` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `spec_id` int(10) UNSIGNED NOT NULL,
  `value_en` varchar(50) NOT NULL,
  `value_ar` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 => available, 0 => not available',
  `city_id` tinyint(2) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `specs`
--

CREATE TABLE `specs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(500) NOT NULL,
  `name_ar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 => active, 0=> not active',
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `credit_card` int(11) NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=> not verified, 1=> verified, 2=> block',
  `gender` enum('m','f','','') DEFAULT NULL COMMENT 'm => male, f => female',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `users_addresses_fk` (`user_id`),
  ADD KEY `regions_addresses_fk` (`region_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `products_carts_pk` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_products`
--
ALTER TABLE `offers_products`
  ADD PRIMARY KEY (`product_id`,`offer_id`) USING BTREE,
  ADD KEY `offers_products_pk` (`offer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `addresses_orders_fk` (`address_id`),
  ADD KEY `coupons_orders_fk` (`coupon_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `orders_products_pk` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_products_id` (`subcategory_id`),
  ADD KEY `brands_products_id` (`brand_id`);

--
-- Indexes for table `products_specs`
--
ALTER TABLE `products_specs`
  ADD PRIMARY KEY (`spec_id`,`product_id`) USING BTREE,
  ADD KEY `products_specs_pk` (`product_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `cities_regions_fk` (`city_id`);

--
-- Indexes for table `specs`
--
ALTER TABLE `specs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY ` subcategories_ categories_fk` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `products_wishlists_pk` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specs`
--
ALTER TABLE `specs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `regions_addresses_fk` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `users_addresses_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `products_carts_pk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `users_carts_pk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `offers_products`
--
ALTER TABLE `offers_products`
  ADD CONSTRAINT `offers_products_pk` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`),
  ADD CONSTRAINT `products_offers_pk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `addresses_orders_fk` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `coupons_orders_fk` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`);

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_pk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `products_orders_pk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `brands_products_id` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `subcategories_products_id` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `products_specs`
--
ALTER TABLE `products_specs`
  ADD CONSTRAINT `products_specs_pk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `specs_products_pk` FOREIGN KEY (`spec_id`) REFERENCES `specs` (`id`);

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `cities_regions_fk` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT ` subcategories_ categories_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `products_wishlists_pk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `users_wishlists_pk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
