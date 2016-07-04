-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2016 at 11:50 AM
-- Server version: 5.5.48-37.8
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aforism_root`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ovidiu Androne', 'androne.ovidiu@gmail.com', '', 'ueQ4DT0KsXhhIXXgQwV7MGjlcebeCDrfSsXyx8T2itpShgIBgRQyz0ldhyT5', '2016-05-16 07:57:30', '2016-06-16 06:38:00'),
(2, 'Daniel Lica', 'licadora@yahoo.it', '', NULL, '2016-05-16 08:09:21', '2016-05-16 08:09:21'),
(3, 'ovidiuAdmin', 'ovidiu@ovidiuandrone.ro', '$2y$10$7yQfKwVNKynM1ziQXqfuWedq.2g2I8rD8qs/FKLbSKIfwDlol4rva', 'uE2pjTQt0uqjiD3FpDbP4cgjTNiabp9Rj98s6xz1I6Ha73aTxn1uSE7JSqS1', '2016-05-16 09:07:41', '2016-06-10 19:18:04'),
(4, 'Cristian Androne', 'cristianandrone78@yahoo.com', '', 'Uxkke6WbovD9ltPdFX4ZmyVKAuPuSUNzT7NYn5cxnG0eQruZg3rnL7I4HyCU', '2016-05-16 23:53:19', '2016-05-16 23:53:44'),
(5, 'Dragos Constantin', 'dragos001@yahoo.com', '', NULL, '2016-05-19 00:43:43', '2016-05-19 00:43:43'),
(6, 'Adrian Dobre', 'mail.adrian.dobre@gmail.com', '', NULL, '2016-05-27 21:48:08', '2016-05-27 21:48:08'),
(7, 'Doru Pip', 'doru_pip@yahoo.com', '', NULL, '2016-06-04 10:20:38', '2016-06-04 10:20:38'),
(8, 'Mobutu Sesese Seko', 'mobutu@gmail.com', '$2y$10$t6zjO5NPxy3nVYPKaSMx.OL2GK0isKnUbLd8NCSrNE.7eYR467vnG', 'PM4Ee8AFL6C7emu566IyLWNASZMM99DmosXqy9vqkHl0HPeehXOx1vYC2iUx', '2016-06-10 21:46:27', '2016-06-10 22:16:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
