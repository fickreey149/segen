-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2020 at 01:22 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tes`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_14_192441_create_pembelians_table', 1),
(4, '2018_03_22_045623_create_suppliers_table', 1),
(5, '2018_03_27_024310_create_produks_table', 1),
(6, '2018_03_27_024345_create_penjualans_table', 1),
(7, '2018_09_06_023744_create_penjualan_produk_table', 1),
(8, '2018_12_13_032140_create_produk_pembelian_table', 1),
(9, '2018_12_16_034137_create_pembelian_produk_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelians`
--

CREATE TABLE `pembelians` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_beli` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_bayar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pembelians`
--

INSERT INTO `pembelians` (`id`, `kode_beli`, `tanggal_pembelian`, `total_bayar`, `supplier_id`, `created_at`, `updated_at`) VALUES
(1, 'PB001', '2020-03-11', '1,500,000.00', 1, '2020-03-11 04:54:51', '2020-03-11 04:54:51'),
(2, 'PB002', '2020-03-17', '3,500,000.00', 1, '2020-03-17 08:25:31', '2020-03-17 08:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `harga_produk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `pembelian_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id`, `harga_produk`, `jumlah`, `produk_id`, `pembelian_id`, `created_at`, `updated_at`) VALUES
(1, '1500000', '1', 1, 1, NULL, NULL),
(2, '70000', '50', 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penjualans`
--

CREATE TABLE `penjualans` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_jual` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `status` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `nama_konsumen` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `total_bayar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `penjualans`
--

INSERT INTO `penjualans` (`id`, `kode_jual`, `tanggal_penjualan`, `status`, `nama_konsumen`, `total_bayar`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'PJ001', '2020-03-11', '1', 'Romi', '1,800,000.00', 2, '2020-03-11 05:09:51', '2020-03-11 05:11:50'),
(2, 'PJ002', '2020-03-17', '1', 'Romi', '1,200,000.00', 2, '2020-03-17 08:26:48', '2020-03-17 10:04:20'),
(3, 'PJ003', '2020-03-19', '0', 'Sakri', '600,000.00', 3, '2020-03-18 20:17:53', '2020-03-18 20:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_produk`
--

CREATE TABLE `penjualan_produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `jumlah` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `penjualan_id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `penjualan_produk`
--

INSERT INTO `penjualan_produk` (`id`, `jumlah`, `status`, `penjualan_id`, `produk_id`, `created_at`, `updated_at`) VALUES
(1, '1', '0', 1, 1, NULL, NULL),
(2, '2', '0', 2, 2, NULL, NULL),
(3, '1', '0', 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `harga_produk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `satuan_produk` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `stok_produk` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kategori_produk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `nama_produk`, `harga_produk`, `satuan_produk`, `stok_produk`, `kategori_produk`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Photo Wedding Kolase', '1800000', 'Paket', '1', 'wedding', '1 Album Kolase + 1 Album Wedding biasa 2 roll', '20200311111224.jpg', '2020-03-11 04:12:24', '2020-03-17 09:56:11'),
(2, 'Album Sunat Biasa', '600000', 'roll', '1', 'sunatan', 'Album Sunatan Biasa', '20200317152219.jpg', '2020-03-17 08:22:20', '2020-03-17 09:58:04'),
(3, 'Video Cinematic', '2500000', 'keping', '0', 'wedding', 'Durasi sekitar 10 menit', '20200319025344.jpg', '2020-03-18 19:53:44', '2020-03-18 19:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `produk_pembelian`
--

CREATE TABLE `produk_pembelian` (
  `id` int(10) UNSIGNED NOT NULL,
  `harga_produk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `pembelian_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_supplier` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `no_hp` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama_supplier`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'CV Kaya', 'AAA', '089897', '2020-03-11 04:54:13', '2020-03-11 04:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` enum('admin','gudang','kasir','pelanggan') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Fikri', 'fikri@segen.com', '$2y$10$qGxtI7NrKw6WmH5bQDl9POamTbCMVYaJBaQDnFCAnA5IOo1bqwEd.', NULL, 'admin', '2020-03-11 03:51:47', '2020-03-11 03:55:40'),
(2, 'Romi', 'romi@segen.com', '$2y$10$UwoPtYZTKYQRfsCNI09F2ecJeiEcNJ22TMyhG/KqjZ1lu1II6Nf1G', '2HxzAz1ZARad6xAmBeAED14gfBUshDzn2bvg2Wlp5JePsgFYU8vpSMZTqiiH', 'pelanggan', '2020-03-11 04:01:40', '2020-03-17 11:54:11'),
(3, 'Sakri', 'sakri@segen.com', '$2y$10$l2JW3YwVD4Jne0o/jsEq7O2/5.B0y/ezQisxu414bROTPLAzsHFiy', 'MzvsqoqkAS61FMJ0Y9bzINFt61nFAHTbZRYxeIVClkokc0D3Pa07bEShyjq7', 'pelanggan', '2020-03-17 11:54:45', '2020-03-18 20:19:12'),
(4, 'Rocky Gerung', 'rocky@segen.com', '$2y$10$aKbhZo3RLZ.6nCeH..xtyezpBHa9EV1RuWTdsaFeXY0xu8ikAM4du', NULL, 'pelanggan', '2020-03-17 11:57:17', '2020-03-17 11:57:17'),
(5, 'Sony Tulung', 'sony@segen.com', '$2y$10$lPx.W3lRT8ZQLhe5b2yLM.6onO.NQQuuEXi/6Z43CUDL4G8ao3lr2', NULL, 'pelanggan', '2020-03-17 11:58:56', '2020-03-17 11:58:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pembelians_kode_beli_unique` (`kode_beli`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualans`
--
ALTER TABLE `penjualans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penjualans_kode_jual_unique` (`kode_jual`);

--
-- Indexes for table `penjualan_produk`
--
ALTER TABLE `penjualan_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_pembelian`
--
ALTER TABLE `produk_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjualans`
--
ALTER TABLE `penjualans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penjualan_produk`
--
ALTER TABLE `penjualan_produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk_pembelian`
--
ALTER TABLE `produk_pembelian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
