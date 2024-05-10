-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table laravel4_1.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel4_1.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(2, '2024_04_29_135331_create_products_table', 1),
	(3, '2024_05_05_225106_create_users_table', 1),
	(4, '2024_05_05_225350_create_user_summarizes_table', 1),
	(5, '2024_05_05_225752_add_clm_user_id_in_products_table', 1);

-- Dumping structure for table laravel4_1.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel4_1.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table laravel4_1.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  `berat` double(8,2) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` enum('Baru','Bekas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_user_id_foreign` (`user_id`),
  CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel4_1.products: ~0 rows (approximately)
INSERT INTO `products` (`id`, `nama`, `harga`, `stok`, `berat`, `gambar`, `kondisi`, `deskripsi`, `created_at`, `updated_at`, `user_id`) VALUES
	(5, 'Gambar Admin 1', 190000, 13, 5000.00, 'dhlVi0ioECLAYW24HTdmjpA3jUTgFisNw0E8f1Pz.png', 'Baru', 'Admin 1', '2024-05-10 07:12:23', '2024-05-10 07:28:20', 1),
	(6, 'Gambar Admin 2', 270000, 36, 3500.00, 'TT9zuNvYNJp1xdFnniz2LU8CF3zT9dgAtWMOx1N5.jpg', 'Bekas', 'Admin 2', '2024-05-10 07:19:03', '2024-05-10 07:28:09', 2);

-- Dumping structure for table laravel4_1.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` int NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel4_1.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `nama`, `email`, `gender`, `umur`, `tgl_lahir`, `alamat`, `created_at`, `updated_at`) VALUES
	(1, 'Sanjaya', 'sann@gmail.com', 'male', 21, '2003-05-10', 'Jl. Cempaka 123', '2024-05-10 13:14:11', '2024-05-10 13:14:11'),
	(2, 'Claudia', 'claudia@gmail.com', 'female', 21, '2003-05-10', 'Jl. Mawar 123', '2024-05-10 13:15:14', '2024-05-10 13:15:14');

-- Dumping structure for table laravel4_1.user_summarizes
CREATE TABLE IF NOT EXISTS `user_summarizes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `nama_toko` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk_terbaik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_summarizes_user_id_foreign` (`user_id`),
  CONSTRAINT `user_summarizes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel4_1.user_summarizes: ~2 rows (approximately)
INSERT INTO `user_summarizes` (`id`, `user_id`, `nama_toko`, `rate`, `produk_terbaik`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Toko Sanjaya', '5', 'Lukisan Bagus', 'Rare Item', '2024-05-10 13:15:43', '2024-05-10 13:15:44'),
	(2, 2, 'Toko Claudia', '4', 'Boneka Lucu', 'Murah Bagus', '2024-05-10 13:16:10', '2024-05-10 13:16:10');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
