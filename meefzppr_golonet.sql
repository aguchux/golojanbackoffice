-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2021 at 03:11 PM
-- Server version: 8.0.23
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meefzppr_golonet`
--

-- --------------------------------------------------------

--
-- Table structure for table `golojan_accounts`
--

CREATE TABLE `golojan_accounts` (
  `accid` int NOT NULL,
  `referrer` int DEFAULT NULL,
  `sponsor` int DEFAULT NULL,
  `lleg` int NOT NULL DEFAULT '0',
  `rleg` int NOT NULL DEFAULT '0',
  `email` varchar(200) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `avatar` varchar(300) NOT NULL DEFAULT './_store/avatars/avatar.png',
  `level` int NOT NULL DEFAULT '0',
  `otp_pending` tinyint(1) NOT NULL DEFAULT '0',
  `otp_time` timestamp NULL DEFAULT NULL,
  `otp` varchar(20) DEFAULT NULL,
  `logons` int NOT NULL DEFAULT '0',
  `email_notix` tinyint(1) NOT NULL DEFAULT '1',
  `sms_notix` tinyint(1) NOT NULL DEFAULT '1',
  `device_protection` tinyint(1) NOT NULL DEFAULT '1',
  `enable_otp` tinyint(1) NOT NULL DEFAULT '1',
  `enable_domain` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastseen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastaction` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `golojan_categories`
--

CREATE TABLE `golojan_categories` (
  `id` int NOT NULL,
  `category` text NOT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `golojan_categories`
--

INSERT INTO `golojan_categories` (`id`, `category`, `enabled`, `created`) VALUES
(1, 'Baby, Kids and Toys', 1, '2021-02-01 17:09:41'),
(2, 'Home and Kitchen', 1, '2021-02-01 17:09:41'),
(3, 'Electronics & Appliances', 1, '2021-02-02 11:55:11'),
(4, 'Beverages & Gloceries', 1, '2021-02-02 11:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `golojan_faqs`
--

CREATE TABLE `golojan_faqs` (
  `id` int NOT NULL,
  `faq` text,
  `answer` text,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `golojan_faqs`
--

INSERT INTO `golojan_faqs` (`id`, `faq`, `answer`, `enabled`, `created`) VALUES
(1, 'What is Golojan?', 'Golojan is an online shopping platform with a network :to drive traffic to the shop,and enrich participating folks.', 1, '2021-02-03 09:33:10'),
(2, 'Is Golojan secure?', 'Yes. Golojan is secured with state of the art security to ensure easy and safe transactions on the platform.', 1, '2021-02-03 09:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `golojan_products`
--

CREATE TABLE `golojan_products` (
  `id` int NOT NULL,
  `name` varchar(300) NOT NULL,
  `category` int NOT NULL,
  `selling` decimal(11,2) NOT NULL DEFAULT '0.00',
  `markup` decimal(18,2) NOT NULL DEFAULT '0.00',
  `photo` text,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `golojan_products`
--

INSERT INTO `golojan_products` (`id`, `name`, `category`, `selling`, `markup`, `photo`, `enabled`) VALUES
(1, 'Emporio Armani Men\'s Wrist Watch - Ceramica White & Silver.', 2, 58000.00, 0.00, 'https://www-konga-com-res.cloudinary.com/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/catalog/product/I/M/157887_1567258159.jpg', 1),
(2, 'Sun5 2-in-1 Led/uv Nail Lamp', 1, 4500.00, 0.00, 'https://www-konga-com-res.cloudinary.com/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/catalog/product/M/e/Men-s-Wrist-Watch---Ceramica-White-Silver-8073842_1.jpg', 1),
(34, 'General Fresh Back To School Children\'s Cartoon Character School Bag', 2, 5680.00, 0.00, 'https://www-konga-com-res.cloudinary.com/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/catalog/product/D/F/180309_1608022514.jpg', 1),
(22, 'Infinix Hot 10 X682b - Dual - 64GB ROM - 3GB RAM - 4G LTE - 16MP - 6.78\'\' - 5200mAh - Obsidian Black', 3, 123000.00, 0.00, 'https://www-konga-com-res.cloudinary.com/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/catalog/product/P/R/67343_1601545050.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `golojan_stock_list`
--

CREATE TABLE `golojan_stock_list` (
  `id` int NOT NULL,
  `accid` int DEFAULT NULL,
  `product` int DEFAULT NULL,
  `qty_sold` int DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `golojan_stores`
--

CREATE TABLE `golojan_stores` (
  `id` int NOT NULL,
  `accid` int DEFAULT NULL,
  `name` text,
  `logo` text,
  `description` text,
  `domain` varchar(200) DEFAULT NULL,
  `status` enum('retail','bulk') NOT NULL DEFAULT 'retail',
  `capacity` decimal(18,2) NOT NULL DEFAULT '0.00',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `golojan_stories`
--

CREATE TABLE `golojan_stories` (
  `id` int NOT NULL,
  `slug` varchar(300) DEFAULT NULL,
  `title` text,
  `contents` text NOT NULL,
  `photo` varchar(500) NOT NULL DEFAULT './_store/stories/photo.jpg',
  `views` int NOT NULL DEFAULT '0',
  `targets` varchar(500) NOT NULL DEFAULT '["0","1","2","3","4","5","6","7","8"]',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `golojan_stories`
--

INSERT INTO `golojan_stories` (`id`, `slug`, `title`, `contents`, `photo`, `views`, `targets`, `enabled`, `created`) VALUES
(1, 'How-to-make-4000000-Naira-in-30-Days', 'How to make 40,000,000 Naira in 30 Days', 'How to make 40,000,000 Naira in 30 Days', './_store/stories/photo.jpg', 0, '[\"0\",\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\"]', 1, '2021-02-05 05:39:52'),
(2, 'What-Selling-on-Golojan-means-for-your-business', 'What Selling on Golojan means for your business', 'What Selling on Golojan means for your business', './_store/stories/photo.jpg', 0, '[\"0\",\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\"]', 1, '2021-02-05 05:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `golojan_tutorials`
--

CREATE TABLE `golojan_tutorials` (
  `id` int NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `video` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `type` enum('youtube','vimeo') DEFAULT 'youtube',
  `banner` varchar(300) NOT NULL DEFAULT './_store/imgs/playbtn.png',
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `golojan_tutorials`
--

INSERT INTO `golojan_tutorials` (`id`, `title`, `description`, `video`, `type`, `banner`, `enabled`) VALUES
(1, 'How Golojan Works', 'How Golojan Works', '9QOkdC4ZxHE', 'youtube', './_store/imgs/playbtn.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `golojan_wallets`
--

CREATE TABLE `golojan_wallets` (
  `id` int NOT NULL,
  `accid` int NOT NULL,
  `open_balance` decimal(18,2) NOT NULL DEFAULT '0.00',
  `closed_balance` decimal(18,2) NOT NULL DEFAULT '0.00',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `golojan_accounts`
--
ALTER TABLE `golojan_accounts`
  ADD PRIMARY KEY (`accid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `golojan_categories`
--
ALTER TABLE `golojan_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `golojan_faqs`
--
ALTER TABLE `golojan_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `golojan_products`
--
ALTER TABLE `golojan_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `golojan_stock_list`
--
ALTER TABLE `golojan_stock_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `golojan_stores`
--
ALTER TABLE `golojan_stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accid` (`accid`);

--
-- Indexes for table `golojan_stories`
--
ALTER TABLE `golojan_stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `golojan_tutorials`
--
ALTER TABLE `golojan_tutorials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `golojan_wallets`
--
ALTER TABLE `golojan_wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `golojan_accounts`
--
ALTER TABLE `golojan_accounts`
  MODIFY `accid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `golojan_categories`
--
ALTER TABLE `golojan_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `golojan_faqs`
--
ALTER TABLE `golojan_faqs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `golojan_products`
--
ALTER TABLE `golojan_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `golojan_stock_list`
--
ALTER TABLE `golojan_stock_list`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `golojan_stores`
--
ALTER TABLE `golojan_stores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `golojan_stories`
--
ALTER TABLE `golojan_stories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `golojan_tutorials`
--
ALTER TABLE `golojan_tutorials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `golojan_wallets`
--
ALTER TABLE `golojan_wallets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
