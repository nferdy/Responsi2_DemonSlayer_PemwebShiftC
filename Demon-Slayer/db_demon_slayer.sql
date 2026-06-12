-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2026 at 07:43 AM
-- Server version: 8.0.30
-- PHP Version: 8.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_demon_slayer`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

CREATE TABLE `forum_posts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `isi_pesan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `forum_posts`
--

INSERT INTO `forum_posts` (`id`, `user_id`, `isi_pesan`, `created_at`) VALUES
(1, 2, 'Guys, ada yang tahu info jadwal rilis kelanjutan Movie Infinity Castle? Gak sabar parah!', '2026-05-30 23:12:42'),
(2, 3, 'AKU AKAN MENGHANCURKAN KERETA ITU SEKARANG JUGA HAHAHA!!', '2026-05-31 00:12:42'),
(3, 1, 'yg bner aje', '2026-05-31 01:13:27'),
(4, 4, 'fer, lu ngerjain sndiri kah..wkwkw gokil', '2026-06-07 13:24:49'),
(5, 5, 'ngetik sendiri, jawab sndiri.. (mitsuri bini gue btw)', '2026-06-07 13:38:28'),
(9, 1, '1', '2026-06-07 15:37:25'),
(10, 1, '2', '2026-06-07 15:37:27'),
(11, 1, '3', '2026-06-07 15:37:27'),
(14, 1, 'lessgo naik pangkat', '2026-06-07 15:43:06'),
(15, 4, '@real-admin , KARBIT BRISIK.. LEBIH CANTIK KANAO LAH', '2026-06-08 05:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `tinggi` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `waktu_upload` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `judul`, `tag`, `tinggi`, `gambar`, `waktu_upload`) VALUES
(1, 'Akaza - Iblis Bulan 3', '#Fanart', '250px', 'img/akaza.jpg', '2026-06-07 14:41:51'),
(2, 'Nezuko Moon Aesthetic', '#Wallpaper', '340px', 'img/nezuko.jpg', '2026-06-07 14:41:46'),
(3, 'Tanjiro As Gwe', '#Vector', '200px', 'img/tanjiro.jpg', '2026-06-07 14:41:41'),
(4, 'Inosuke mode brutal', '#Official', '280px', 'img/inosuke.jpg', '2026-06-07 14:41:34'),
(5, 'Mitsuri My Istri', '#Fanart', '300px', 'img/mitsuri.jpg', '2026-06-07 14:41:21'),
(6, 'Zenitsu Mode On Aktif', '#Wallpaper', '250px', 'img/1780842040_zenitsu.jpg', '2026-06-07 14:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `streaming`
--

CREATE TABLE `streaming` (
  `id` int NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `video_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `streaming`
--

INSERT INTO `streaming` (`id`, `judul`, `deskripsi`, `video_url`) VALUES
(1, 'Tanjiro vs Rui (amv by ferdy)', 'Pertarungan Epic yg di bumbui dengan editan website sekarang, kurang gokil apa coba', 'https://www.youtube.com/embed/ZDDIPEySilc?si=PxuDEWooh0zoG8kC'),
(2, 'tes', 'kaak', 'https://www.youtube.com/embed/ZDDIPEySilc?si=PxuDEWooh0zoG8kC');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pernapasan` varchar(50) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `foto_profil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `username`, `password`, `pernapasan`, `role`, `foto_profil`) VALUES
(1, 'Yogi Ferdiansyah Amta Miluloh', 'ferdy', 'password', 'Api', 'user', NULL),
(2, 'Zenitsu Agatsuma', 'Zenitsu_⚡', 'rahasia', 'Pernapasan Petir', 'user', NULL),
(3, 'Inosuke Hashibira', 'Inosuke_🐗', 'rahasia', 'Pernapasan Binatang', 'user', NULL),
(4, 'Yogi Ferdiansyah Amta Miluloh', 'admin', 'password', 'Pernapasan Petir', 'user', 'img/avatar/1780895808_4.jpg'),
(5, 'Yogi Ferdiansyah A M', 'real admin', 'password', 'Air', 'admin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streaming`
--
ALTER TABLE `streaming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `streaming`
--
ALTER TABLE `streaming`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD CONSTRAINT `forum_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
