-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table kms.artikels
CREATE TABLE IF NOT EXISTS `artikels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` bigint(20) unsigned NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kms.artikels: ~0 rows (approximately)
DELETE FROM `artikels`;
/*!40000 ALTER TABLE `artikels` DISABLE KEYS */;
/*!40000 ALTER TABLE `artikels` ENABLE KEYS */;

-- Dumping structure for table kms.danas
CREATE TABLE IF NOT EXISTS `danas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_ormawa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kegiatan` bigint(20) unsigned NOT NULL,
  `dana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berkas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Ditinjau','Disetujui','Ditolak','Ditunda') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kms.danas: ~0 rows (approximately)
DELETE FROM `danas`;
/*!40000 ALTER TABLE `danas` DISABLE KEYS */;
/*!40000 ALTER TABLE `danas` ENABLE KEYS */;

-- Dumping structure for table kms.galeris
CREATE TABLE IF NOT EXISTS `galeris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` bigint(20) unsigned NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kms.galeris: ~0 rows (approximately)
DELETE FROM `galeris`;
/*!40000 ALTER TABLE `galeris` DISABLE KEYS */;
/*!40000 ALTER TABLE `galeris` ENABLE KEYS */;

-- Dumping structure for table kms.kategoris
CREATE TABLE IF NOT EXISTS `kategoris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kms.kategoris: ~0 rows (approximately)
DELETE FROM `kategoris`;
/*!40000 ALTER TABLE `kategoris` DISABLE KEYS */;
/*!40000 ALTER TABLE `kategoris` ENABLE KEYS */;

-- Dumping structure for table kms.kegiatans
CREATE TABLE IF NOT EXISTS `kegiatans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_ormawa` bigint(20) unsigned NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berkas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kms.kegiatans: ~0 rows (approximately)
DELETE FROM `kegiatans`;
/*!40000 ALTER TABLE `kegiatans` DISABLE KEYS */;
INSERT INTO `kegiatans` (`id`, `id_ormawa`, `tanggal`, `nama`, `anggaran`, `berkas`, `status`, `id_status`, `created_at`, `updated_at`) VALUES
	(1, 1, '23 Mei, 11:00 malam - 25 Mei, 07:00 pagi', 'Kegiatan 1', 'Rp 120.000', 'kegiatan/Corel VideoStudio.txt', 'Ditinjau', '1', '2024-05-23 15:05:10', '2024-05-23 15:05:10');
/*!40000 ALTER TABLE `kegiatans` ENABLE KEYS */;

-- Dumping structure for table kms.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kms.migrations: ~8 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(65, '2014_10_12_000000_create_users_table', 1),
	(66, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(67, '2024_03_18_032716_create_kategoris_table', 1),
	(68, '2024_03_20_051140_create_artikels_table', 1),
	(69, '2024_03_20_053929_create_galeris_table', 1),
	(70, '2024_03_25_061553_create_ormawas_table', 1),
	(71, '2024_03_26_014104_create_kegiatans_table', 1),
	(72, '2024_03_26_053627_create_danas_table', 1),
	(73, '2024_05_20_063318_create_strukturs_table', 2),
	(74, '2024_05_20_200623_create_transaksi_kegiatans_table', 3),
	(75, '2024_05_22_030257_create_periodes_table', 4),
	(76, '2024_05_22_160047_create_prokers_table', 5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table kms.ormawas
CREATE TABLE IF NOT EXISTS `ormawas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggaran` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_periode` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kms.ormawas: ~0 rows (approximately)
DELETE FROM `ormawas`;
/*!40000 ALTER TABLE `ormawas` DISABLE KEYS */;
INSERT INTO `ormawas` (`id`, `nama`, `logo`, `keterangan`, `anggaran`, `id_periode`, `created_at`, `updated_at`) VALUES
	(1, 'BEM', 'ormawa/bem-150x150.png', 'Badan Eksekutif Mahasiswa (BEM) UNIVERSITAS Borneo Lestari', 'Rp 5.000.000', 2, '2024-05-22 09:37:06', '2024-05-22 09:37:06');
/*!40000 ALTER TABLE `ormawas` ENABLE KEYS */;

-- Dumping structure for table kms.periodes
CREATE TABLE IF NOT EXISTS `periodes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kms.periodes: ~2 rows (approximately)
DELETE FROM `periodes`;
/*!40000 ALTER TABLE `periodes` DISABLE KEYS */;
INSERT INTO `periodes` (`id`, `periode`, `created_at`, `updated_at`) VALUES
	(1, '2023 - 2024 Ganjil', '2024-05-22 03:29:55', '2024-05-22 06:17:55'),
	(2, '2023 - 2024 Genap', '2024-05-22 06:18:05', '2024-05-22 06:18:05');
/*!40000 ALTER TABLE `periodes` ENABLE KEYS */;

-- Dumping structure for table kms.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
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

-- Dumping data for table kms.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table kms.prokers
CREATE TABLE IF NOT EXISTS `prokers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_ormawa` bigint(20) unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kms.prokers: ~0 rows (approximately)
DELETE FROM `prokers`;
/*!40000 ALTER TABLE `prokers` DISABLE KEYS */;
INSERT INTO `prokers` (`id`, `id_ormawa`, `nama`, `tanggal`, `anggaran`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Alat press minuman', '23 Mei, 01:00 pagi - 24 Mei, 09:00 pagi', 'Rp 5.000.000', NULL, '2024-05-22 17:16:24', '2024-05-22 17:20:00');
/*!40000 ALTER TABLE `prokers` ENABLE KEYS */;

-- Dumping structure for table kms.strukturs
CREATE TABLE IF NOT EXISTS `strukturs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_ormawa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kms.strukturs: ~0 rows (approximately)
DELETE FROM `strukturs`;
/*!40000 ALTER TABLE `strukturs` DISABLE KEYS */;
INSERT INTO `strukturs` (`id`, `id_ormawa`, `mahasiswa`, `jabatan`, `prodi`, `profil`, `created_at`, `updated_at`) VALUES
	(1, '1', 'Arif Siji', 'Ketua', 'S1 ARS', 'profil/maxresdefault.jpg', '2024-05-22 00:56:48', '2024-05-23 05:54:48');
/*!40000 ALTER TABLE `strukturs` ENABLE KEYS */;

-- Dumping structure for table kms.transaksi_kegiatans
CREATE TABLE IF NOT EXISTS `transaksi_kegiatans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_kegiatan` bigint(20) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kms.transaksi_kegiatans: ~0 rows (approximately)
DELETE FROM `transaksi_kegiatans`;
/*!40000 ALTER TABLE `transaksi_kegiatans` DISABLE KEYS */;
INSERT INTO `transaksi_kegiatans` (`id`, `id_kegiatan`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Ditinjau', 'disposisi ke rektor', '2024-05-23 15:05:10', '2024-05-23 15:06:07');
/*!40000 ALTER TABLE `transaksi_kegiatans` ENABLE KEYS */;

-- Dumping structure for table kms.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kms.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(0, 'admin', 'admin', '$2y$10$P5/r.KGtmPGTdRwvvPJeCuqhxVqyNNW6NFz8ABPM5oksHoTWfM5EO', NULL, NULL, NULL),
	(1, 'bem', 'ormawa', '$2y$12$axpjgeztTOWJgixxz4DHGOd0gvvFwiyGL7qOGEk8.3ZVfS6yxF57q', NULL, '2024-05-20 15:23:25', '2024-05-20 15:23:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
