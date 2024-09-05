-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2024 at 09:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `energy_drink_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `product_id`, `quantity`, `added_at`) VALUES
(3, 3, NULL, 1, '2024-09-03 22:33:01'),
(4, 3, NULL, 1, '2024-09-03 22:33:17'),
(5, 3, NULL, 1, '2024-09-03 22:34:16'),
(6, 3, NULL, 1, '2024-09-03 22:36:50'),
(8, 2, 5, 1, '2024-09-04 10:44:47'),
(9, 2, 5, 1, '2024-09-04 10:44:52'),
(10, 2, 5, 1, '2024-09-04 10:44:56'),
(11, 2, 5, 1, '2024-09-04 10:55:54'),
(12, 2, NULL, 1, '2024-09-04 13:02:12'),
(13, 2, 8, 1, '2024-09-04 13:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','processing','shipped','delivered','canceled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `status`, `created_at`) VALUES
(1, 4, 650.00, 'pending', '2024-09-04 16:27:14'),
(2, 4, 2600.00, 'pending', '2024-09-04 16:59:01'),
(3, 4, 1950.00, 'pending', '2024-09-04 16:59:32'),
(4, 4, 650.00, 'pending', '2024-09-04 17:06:15'),
(5, 5, 1300.00, 'pending', '2024-09-04 18:03:29'),
(6, 5, 650.00, 'pending', '2024-09-04 18:08:25'),
(7, 5, 1300.00, 'pending', '2024-09-04 18:22:32'),
(8, 5, 1300.00, 'pending', '2024-09-04 18:59:21'),
(9, 5, 3900.00, 'pending', '2024-09-04 19:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 5, 1, 650.00),
(2, 2, 6, 1, 650.00),
(3, 2, 5, 1, 650.00),
(4, 2, 6, 1, 650.00),
(5, 2, 7, 1, 650.00),
(9, 3, 6, 1, 650.00),
(10, 3, 8, 1, 650.00),
(11, 3, 10, 1, 650.00),
(12, 4, 6, 1, 650.00),
(13, 5, 5, 1, 650.00),
(14, 5, 5, 1, 650.00),
(16, 6, 5, 1, 650.00),
(17, 7, 5, 1, 650.00),
(18, 7, 5, 1, 650.00),
(20, 8, 7, 1, 650.00),
(21, 8, 5, 1, 650.00),
(23, 9, 5, 1, 650.00),
(24, 9, 6, 1, 650.00),
(25, 9, 7, 1, 650.00),
(26, 9, 8, 1, 650.00),
(27, 9, 9, 1, 650.00),
(28, 9, 10, 1, 650.00);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT 'card',
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT 'pending',
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock_quantity`, `image_url`, `created_at`) VALUES
(5, 'Electric Surge', 'A jolt of tangy blue raspberry blended with refreshing lemonade. This vibrant, electrifying drink powers you up for the day.', 650.00, 20, '/project/adminpannel/Prod/blue.png', '2024-09-04 01:38:55'),
(6, 'Citrus Shock', 'A zesty explosion of lemon and lime with a cooling hint of mint. Citrus Shock delivers an invigorating and crisp experience.', 650.00, 20, '/project/adminpannel/Prod/green.png', '2024-09-04 01:41:02'),
(7, 'Blaze Burst', 'A fiery fusion of tropical mango with a spicy kick. Blaze Burst is the perfect balance of sweet and heat to ignite your senses.', 650.00, 20, '/project/adminpannel/Prod/orange.png', '2024-09-04 01:42:20'),
(8, 'Berry Blitz', 'A bold and vibrant blend of rich berries and exotic acai, Berry Blitz energizes with a burst of fruity, tangy, and antioxidant-rich flavor.', 650.00, 20, '/project/adminpannel/Prod/purple.png', '2024-09-04 01:44:02'),
(9, 'Cherry Charge', 'A deep, rich black cherry flavor infused with smooth vanilla undertones. Cherry Charge is a sweet and bold energy boost.', 650.00, 20, '/project/adminpannel/Prod/red.png', '2024-09-04 01:45:19'),
(10, 'Tropical Thunder', 'An exotic mix of juicy pineapple and creamy coconut, Tropical Thunder transports you to a sun-soaked paradise with every sip.', 650.00, 20, '/project/adminpannel/Prod/yellow.png', '2024-09-04 01:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('customer','admin') DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'root', 'tiran@gmail.com', '$2y$10$ThjQLspj4rK2SjE7w0byS.UI3iLGHUjXdSXiPPSVzHzSmL2FDN8b.', 'customer', '2024-09-03 12:03:39'),
(2, 'chami', 'chami@gmail.com', '$2y$10$cVGbC3R0KuCB2nw2PA6jA.9fQkMzPR7SY2jM.Bz1Q/YyhwxHDjUTG', 'admin', '2024-09-03 12:06:27'),
(3, 'dilshan', 'dilshan@gmail.com', '$2y$10$.99.KvqKCrCYlFjwaMOhKOpkYywxFDFf7eaCueYRCnGHT/aI6M2Pe', 'customer', '2024-09-03 21:29:52'),
(4, 'randika', 'randika@gmail.com', '$2y$10$Yq4sZRPMBxVZido6zbf5xOTb.1PeI9PpCxaZDQCnWS2Cctj8jVoH.', 'customer', '2024-09-04 03:02:15'),
(5, 'sachi', 'sachi@gmail.com', '$2y$10$TVR2ZbnPNDNEW.Z4ZglLweh4QayXP1y31mcQCIsesp6Bicw5mWb36', 'admin', '2024-09-04 09:52:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
