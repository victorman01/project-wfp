-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 04:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `tgl_lahir` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alamat_pengirimans`
--

CREATE TABLE `alamat_pengirimans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alamat` longtext NOT NULL,
  `nama_penerima` varchar(45) NOT NULL,
  `nomor_handphone` varchar(45) NOT NULL,
  `provinsi` varchar(45) NOT NULL,
  `kota` varchar(45) NOT NULL,
  `kecamatan` varchar(45) NOT NULL,
  `kelurahan_kode_pos` varchar(45) NOT NULL,
  `alamat_utama` tinyint(4) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'TOTO', '2023-11-05 08:15:51', '2023-11-05 08:15:51'),
(2, 'SOSO', '2023-11-05 08:15:51', '2023-11-05 08:15:51'),
(3, 'BOBO', '2023-11-05 08:15:51', '2023-11-05 08:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksis`
--

CREATE TABLE `detail_transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` double NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `nota_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diskon_produks`
--

CREATE TABLE `diskon_produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diskon` int(11) NOT NULL,
  `periode_mulai` timestamp NOT NULL DEFAULT '2023-11-05 08:15:41',
  `periode_berakhir` timestamp NOT NULL DEFAULT '2023-11-06 08:15:41',
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorits`
--

CREATE TABLE `favorits` (
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gambars`
--

CREATE TABLE `gambars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(45) NOT NULL,
  `path` text NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengirimans`
--

CREATE TABLE `jenis_pengirimans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(45) NOT NULL,
  `kurir_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Kamar Mandi', '2023-11-05 08:15:51', '2023-11-05 08:15:51'),
(2, 'Toilet', '2023-11-05 08:15:51', '2023-11-05 08:15:51'),
(3, 'WC', '2023-11-05 08:15:51', '2023-11-05 08:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `kategoris_produks`
--

CREATE TABLE `kategoris_produks` (
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keranjangs`
--

CREATE TABLE `keranjangs` (
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kurirs`
--

CREATE TABLE `kurirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayarans`
--

CREATE TABLE `metode_pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_11_04_130742_create_admins_table', 1),
(5, '2023_11_04_131651_create_kategoris_table', 1),
(6, '2023_11_04_131726_create_brands_table', 1),
(7, '2023_11_04_131740_create_kurirs_table', 1),
(8, '2023_11_04_132651_create_metode_pembayarans_table', 1),
(9, '2023_11_04_132930_create_jenis_pengiriman_table', 1),
(10, '2023_11_04_133100_create_alamat_pengiriman_table', 1),
(11, '2023_11_04_133707_create_produks_table', 1),
(12, '2023_11_04_134747_create_notas_table', 1),
(13, '2023_11_04_135250_create_detail_transaksis_table', 1),
(14, '2023_11_04_135431_crate_keranjangs_table', 1),
(15, '2023_11_04_135542_create_favorits_table', 1),
(16, '2023_11_04_135816_create_kategoris_produks_table', 1),
(17, '2023_11_04_135901_create_gambars_table', 1),
(18, '2023_11_04_140054_create_diskon_produks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notas`
--

CREATE TABLE `notas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_pembayaran` double NOT NULL,
  `status_pengiriman` enum('Menunggu Pembayaran','Diproses','Dikirim','Diterima') NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `metode_pembayaran_id` bigint(20) UNSIGNED NOT NULL,
  `alamat_pengiriman_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_pengiriman_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(45) NOT NULL,
  `spesifikasi` longtext NOT NULL,
  `informasi` longtext NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `nama`, `spesifikasi`, `informasi`, `harga`, `stok`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'Kloset', 'Bahan Bagus', 'Terbuat dari batu', 100000, 100, 2, '2023-11-05 08:15:51', '2023-11-05 08:15:51'),
(2, 'Westafel', 'Bahan Bagus', 'Terbuat dari batu', 100000, 100, 2, '2023-11-05 08:15:51', '2023-11-05 08:15:51'),
(3, 'Bak Mandi', 'Bahan Bagus', 'Terbuat dari batu', 100000, 100, 1, '2023-11-05 08:15:51', '2023-11-05 08:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `nomor_handphone` varchar(45) NOT NULL,
  `tgl_lahir` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `point` int(11) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `provinsi` varchar(45) NOT NULL,
  `kota` varchar(45) NOT NULL,
  `kecamatan` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `alamat_pengirimans`
--
ALTER TABLE `alamat_pengirimans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alamat_pengirimans_user_id_foreign` (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transaksis_produk_id_foreign` (`produk_id`),
  ADD KEY `detail_transaksis_nota_id_foreign` (`nota_id`);

--
-- Indexes for table `diskon_produks`
--
ALTER TABLE `diskon_produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diskon_produks_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorits`
--
ALTER TABLE `favorits`
  ADD KEY `favorits_produk_id_foreign` (`produk_id`),
  ADD KEY `favorits_user_id_foreign` (`user_id`);

--
-- Indexes for table `gambars`
--
ALTER TABLE `gambars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gambars_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `jenis_pengirimans`
--
ALTER TABLE `jenis_pengirimans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_pengirimans_kurir_id_foreign` (`kurir_id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris_produks`
--
ALTER TABLE `kategoris_produks`
  ADD KEY `kategoris_produks_kategori_id_foreign` (`kategori_id`),
  ADD KEY `kategoris_produks_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD KEY `keranjangs_produk_id_foreign` (`produk_id`),
  ADD KEY `keranjangs_user_id_foreign` (`user_id`);

--
-- Indexes for table `kurirs`
--
ALTER TABLE `kurirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metode_pembayarans`
--
ALTER TABLE `metode_pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notas_user_id_foreign` (`user_id`),
  ADD KEY `notas_metode_pembayaran_id_foreign` (`metode_pembayaran_id`),
  ADD KEY `notas_alamat_pengiriman_id_foreign` (`alamat_pengiriman_id`),
  ADD KEY `notas_jenis_pengiriman_id_foreign` (`jenis_pengiriman_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produks_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alamat_pengirimans`
--
ALTER TABLE `alamat_pengirimans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diskon_produks`
--
ALTER TABLE `diskon_produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambars`
--
ALTER TABLE `gambars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_pengirimans`
--
ALTER TABLE `jenis_pengirimans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kurirs`
--
ALTER TABLE `kurirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metode_pembayarans`
--
ALTER TABLE `metode_pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alamat_pengirimans`
--
ALTER TABLE `alamat_pengirimans`
  ADD CONSTRAINT `alamat_pengirimans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  ADD CONSTRAINT `detail_transaksis_nota_id_foreign` FOREIGN KEY (`nota_id`) REFERENCES `notas` (`id`),
  ADD CONSTRAINT `detail_transaksis_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`);

--
-- Constraints for table `diskon_produks`
--
ALTER TABLE `diskon_produks`
  ADD CONSTRAINT `diskon_produks_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`);

--
-- Constraints for table `favorits`
--
ALTER TABLE `favorits`
  ADD CONSTRAINT `favorits_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`),
  ADD CONSTRAINT `favorits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `gambars`
--
ALTER TABLE `gambars`
  ADD CONSTRAINT `gambars_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`);

--
-- Constraints for table `jenis_pengirimans`
--
ALTER TABLE `jenis_pengirimans`
  ADD CONSTRAINT `jenis_pengirimans_kurir_id_foreign` FOREIGN KEY (`kurir_id`) REFERENCES `kurirs` (`id`);

--
-- Constraints for table `kategoris_produks`
--
ALTER TABLE `kategoris_produks`
  ADD CONSTRAINT `kategoris_produks_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`),
  ADD CONSTRAINT `kategoris_produks_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`);

--
-- Constraints for table `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD CONSTRAINT `keranjangs_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`),
  ADD CONSTRAINT `keranjangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_alamat_pengiriman_id_foreign` FOREIGN KEY (`alamat_pengiriman_id`) REFERENCES `alamat_pengirimans` (`id`),
  ADD CONSTRAINT `notas_jenis_pengiriman_id_foreign` FOREIGN KEY (`jenis_pengiriman_id`) REFERENCES `jenis_pengirimans` (`id`),
  ADD CONSTRAINT `notas_metode_pembayaran_id_foreign` FOREIGN KEY (`metode_pembayaran_id`) REFERENCES `metode_pembayarans` (`id`),
  ADD CONSTRAINT `notas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
