-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for itedu
CREATE DATABASE IF NOT EXISTS `itedu` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `itedu`;

-- Dumping structure for table itedu.artikel
CREATE TABLE IF NOT EXISTS `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_approved` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table itedu.artikel: ~3 rows (approximately)
DELETE FROM `artikel`;
INSERT INTO `artikel` (`id`, `author_id`, `title`, `content`, `created_at`, `updated_at`, `is_approved`) VALUES
	(1, 2, '5 Teknik Manajemen Waktu untuk Pelajar dan Mahasiswa', 'Merasa kewalahan dengan tugas dan deadline? Manajemen waktu adalah kunci. Gunakan teknik seperti Pomodoro, To-Do List harian, atau Eisenhower Matrix. Dengan menerapkan manajemen waktu yang baik, kamu akan lebih produktif dan tidak merasa stres dalam menghadapi jadwal yang padat.\r\n\r\n', '2025-07-27 20:45:17', '2025-07-29 09:43:48', 1),
	(8, 3, '1 Teknik Manajemen Waktu untuk Pelajar dan Mahasiswa', 'Merasa kewalahan dengan tugas dan deadline? Manajemen waktu adalah kunci. Gunakan teknik seperti Pomodoro, To-Do List harian, atau Eisenhower Matrix. Dengan menerapkan manajemen waktu yang baik, kamu akan lebih produktif dan tidak merasa stres dalam menghadapi jadwal yang padat.\r\n\r\n', '2025-07-27 20:45:17', '2025-07-29 09:38:51', 1),
	(11, 1, 'cekkkkk 1', 'asdasdasdasdas', '2025-07-29 09:30:33', '2025-07-29 10:13:21', 1);

-- Dumping structure for table itedu.files
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artikel_id` int(11) NOT NULL,
  `nama_file_ori` varchar(255) NOT NULL,
  `nama_file_simpan` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `artikel_id` (`artikel_id`),
  CONSTRAINT `files_ibfk_1` FOREIGN KEY (`artikel_id`) REFERENCES `artikel` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table itedu.files: ~3 rows (approximately)
DELETE FROM `files`;
INSERT INTO `files` (`id`, `artikel_id`, `nama_file_ori`, `nama_file_simpan`, `created_at`, `updated_at`) VALUES
	(1, 1, 'IF404_NAMA_NIM.pdf', '1753773673_ae7c1351a33e2a21ecf9.pdf', '2025-07-29 07:21:13', '2025-07-29 07:21:13'),
	(2, 1, 'Soal UAS - Kewirausahaan - Semester Genap 2024-2025 .pdf', '1753773824_d24f5bd200d2e0218568.pdf', '2025-07-29 07:23:44', '2025-07-29 07:23:44'),
	(3, 11, 'IF404_NAMA_NIM.pdf', '1753781433_e954b81f76af909092b5.pdf', '2025-07-29 09:30:33', '2025-07-29 09:30:33');

-- Dumping structure for table itedu.komen
CREATE TABLE IF NOT EXISTS `komen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artikel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parrent_komen_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `artikel_id` (`artikel_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `komen_ibfk_1` FOREIGN KEY (`artikel_id`) REFERENCES `artikel` (`id`) ON DELETE CASCADE,
  CONSTRAINT `komen_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table itedu.komen: ~2 rows (approximately)
DELETE FROM `komen`;
INSERT INTO `komen` (`id`, `artikel_id`, `user_id`, `parrent_komen_id`, `comment_text`, `created_at`, `updated_at`) VALUES
	(7, 1, 1, 0, 'baru 1', '2025-07-29 04:11:21', '2025-07-29 04:11:21'),
	(8, 1, 1, 7, 'baru 1 balas', '2025-07-29 04:11:28', '2025-07-29 04:11:28');

-- Dumping structure for table itedu.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(500) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table itedu.role: ~2 rows (approximately)
DELETE FROM `role`;
INSERT INTO `role` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2025-07-27 19:03:28', '2025-07-27 19:03:28'),
	(2, 'user', '2025-07-27 19:03:35', '2025-07-27 19:25:26');

-- Dumping structure for table itedu.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table itedu.users: ~3 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `email`, `password`, `full_name`, `created_at`, `updated_at`, `id_role`) VALUES
	(1, '123@gmail.com', '$2y$10$09hldYqc.fWzn2czNKIB4OpFollCNvWcFmNba0T6bYMHBUIiLgqEW', 'admin1', '2025-07-27 18:52:23', '2025-07-28 17:45:13', 1),
	(2, '456@gmail.com', '$2y$10$IaQSysFms6aRD8G2XjQLWO0txcKkGyF0qFR1XTBJF8nDeLLTe6sh6', 'Jonathan', '2025-07-27 19:24:09', '2025-07-29 17:11:32', 2),
	(3, '234@gmail.com', '$2y$10$J4g3.yNe9rO3JU35KKcV2uwfYmaW8EvmhNHzzL5XGaKwpqvmnznCy', 'Mark', '2025-07-27 19:24:09', '2025-07-28 17:45:30', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
