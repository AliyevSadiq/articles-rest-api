-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3305
-- Generation Time: Nov 09, 2020 at 03:23 PM
-- Server version: 10.3.22-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `articles-api`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'https://picsum.photos/seed/picsum/150/150',
  `big_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'https://picsum.photos/seed/picsum/400/600',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_seo_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_seo_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `image`, `big_image`, `description`, `article_seo_description`, `article_seo_keywords`, `category_id`, `user_id`, `article_status`) VALUES
(1, 'Article Item1', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description1', 'Article Item article_seo_description1', 'Article Item article_seo_keywords1', 1, 5, 1),
(2, 'Article Item2', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description2', 'Article Item article_seo_description2', 'Article Item article_seo_keywords2', 2, 5, 1),
(3, 'Article Item3', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description3', 'Article Item article_seo_description3', 'Article Item article_seo_keywords3', 3, 5, 1),
(5, 'Article Item5', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description5', 'Article Item article_seo_description5', 'Article Item article_seo_keywords5', 5, 6, 1),
(6, 'Article Item6', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description6', 'Article Item article_seo_description6', 'Article Item article_seo_keywords6', 1, 6, 1),
(7, 'Article Item7', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description7', 'Article Item article_seo_description7', 'Article Item article_seo_keywords7', 2, 1, 1),
(8, 'Article Item8', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description8', 'Article Item article_seo_description8', 'Article Item article_seo_keywords8', 3, 1, 1),
(9, 'Article Item9', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description9', 'Article Item article_seo_description9', 'Article Item article_seo_keywords9', 4, 1, 1),
(10, 'Article Item10', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description10', 'Article Item article_seo_description10', 'Article Item article_seo_keywords10', 5, 1, 1),
(11, 'Article Item11', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description11', 'Article Item article_seo_description11', 'Article Item article_seo_keywords11', 1, 1, 1),
(12, 'Article Item12', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description12', 'Article Item article_seo_description12', 'Article Item article_seo_keywords12', 2, 1, 1),
(13, 'Article Item13', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description13', 'Article Item article_seo_description13', 'Article Item article_seo_keywords13', 3, 1, 1),
(14, 'Article Item14', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description14', 'Article Item article_seo_description14', 'Article Item article_seo_keywords14', 4, 1, 1),
(15, 'Article Item15', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description15', 'Article Item article_seo_description15', 'Article Item article_seo_keywords15', 5, 1, 1),
(16, 'Article Item16', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description16', 'Article Item article_seo_description16', 'Article Item article_seo_keywords16', 1, 1, 1),
(17, 'Article Item17', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description17', 'Article Item article_seo_description17', 'Article Item article_seo_keywords17', 2, 1, 1),
(18, 'Article Item18', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description18', 'Article Item article_seo_description18', 'Article Item article_seo_keywords18', 3, 1, 1),
(19, 'Article Item19', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description19', 'Article Item article_seo_description19', 'Article Item article_seo_keywords19', 4, 1, 1),
(20, 'Article Item20', 'https://picsum.photos/seed/picsum/150/150', 'https://picsum.photos/seed/picsum/400/600', 'Article Item description20', 'Article Item article_seo_description20', 'Article Item article_seo_keywords20', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_keywords` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `seo_description`, `seo_keywords`, `user_id`, `status`) VALUES
(1, 'Cateogry Item1', 'Cateogry Item seo_description1', 'Cateogry Item seo_keywords1', 5, 1),
(2, 'Cateogry Item2', 'Cateogry Item seo_description2', 'Cateogry Item seo_keywords2', 5, 1),
(4, 'Cateogry Item4', 'Cateogry Item seo_description4', 'Cateogry Item seo_keywords4', 6, NULL),
(5, 'Cateogry Item5', 'Cateogry Item seo_description5', 'Cateogry Item seo_keywords5', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1604740556),
('m201107_091658_category', 1604755269),
('m201107_091720_article', 1604755270),
('m201107_111927_user', 1604748318);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `surname`, `password`, `email`, `username`, `access_token`) VALUES
(5, 'admin1111', 'admin1111', '$2y$13$tKb/Rfe.xGYQYN4/1yBreuH9KJ9oyWbAfatRwRjLDIojtQEq.cVuS', 'admin@bk.ru', 'admin1111', 'sHmqMKCMuSHb7QP5uytt'),
(6, 'admin1', 'admin1', '$2y$13$RaVi5vSpNAZEdjA6zksmIeevpK4dzJ3JQhusowsMWpRwiLUqxHouK', 'admin1@bk.ru', 'admin1', NULL),
(7, 'admin2', 'admin2', '$2y$13$zw7q/LRXvBFKjVggBjw/xunYcrtlHhoP7Gn2ZDDYaDnhKOwMIliNq', 'admin2@bk.ru', 'admin2', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `article_seo_description` (`article_seo_description`),
  ADD UNIQUE KEY `article_seo_keywords` (`article_seo_keywords`),
  ADD KEY `idx-article_title` (`title`),
  ADD KEY `idx-article-category_id` (`category_id`),
  ADD KEY `idx-article-user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `seo_description` (`seo_description`),
  ADD UNIQUE KEY `seo_keywords` (`seo_keywords`),
  ADD KEY `idx-category_name` (`name`),
  ADD KEY `idx-user_id` (`user_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
