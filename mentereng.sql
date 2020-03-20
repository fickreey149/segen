-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2019 pada 19.16
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentereng`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelians`
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
-- Dumping data untuk tabel `pembelians`
--

INSERT INTO `pembelians` (`id`, `kode_beli`, `tanggal_pembelian`, `total_bayar`, `supplier_id`, `created_at`, `updated_at`) VALUES
(1, 'PB001', '2019-10-01', '1,500,000.00', 2, '2019-10-29 02:05:18', '2019-10-29 02:05:18'),
(2, 'PB002', '2019-10-08', '20,050,000.00', 2, '2019-10-30 05:13:16', '2019-10-30 05:13:16'),
(3, 'PB003', '2019-11-25', '7,800,000.00', 2, '2019-11-25 06:50:28', '2019-11-25 06:50:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
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
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id`, `harga_produk`, `jumlah`, `produk_id`, `pembelian_id`, `created_at`, `updated_at`) VALUES
(1, '100000', '15', 2, 1, NULL, NULL),
(2, '250000', '13', 6, 2, NULL, NULL),
(3, '300000', '56', 3, 2, NULL, NULL),
(4, '130000', '60', 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualans`
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
-- Dumping data untuk tabel `penjualans`
--

INSERT INTO `penjualans` (`id`, `kode_jual`, `tanggal_penjualan`, `status`, `nama_konsumen`, `total_bayar`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'PJ001', '2019-10-15', '1', 'pelanggan', '12,000,000.00', 4, '2019-10-29 02:05:56', '2019-10-29 02:05:56'),
(2, 'PJ002', '2019-11-25', '1', 'pelanggan', '150,000.00', 4, '2019-11-25 06:53:31', '2019-12-22 08:33:25'),
(3, 'PJ003', '2019-11-25', '1', 'pelanggan', '450,000.00', 4, '2019-11-25 06:54:35', '2019-12-22 08:33:29'),
(4, 'PJ004', '2019-11-25', '1', 'pelanggan', '48,000,000.00', 4, '2019-11-25 06:55:19', '2019-12-22 08:33:31'),
(5, 'PJ005', '2019-11-28', '1', 'kasir', '24,000,000.00', 3, '2019-11-25 07:38:27', '2019-12-22 08:33:33'),
(7, 'PJ006', '2019-12-22', '1', 'pelanggan', '12,150,000.00', 4, '2019-12-22 09:38:19', '2019-12-22 09:42:36'),
(9, 'PJ007', '2019-12-23', '1', 'pelanggan', '12,150,000.00', 4, '2019-12-22 10:53:01', '2019-12-22 11:04:23'),
(10, 'PJ008', '2019-12-23', '1', 'pelanggan', '150,000.00', 4, '2019-12-22 11:06:10', '2019-12-22 11:06:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_produk`
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
-- Dumping data untuk tabel `penjualan_produk`
--

INSERT INTO `penjualan_produk` (`id`, `jumlah`, `status`, `penjualan_id`, `produk_id`, `created_at`, `updated_at`) VALUES
(1, '1', '0', 1, 2, NULL, NULL),
(2, '1', '0', 2, 3, NULL, NULL),
(3, '3', '0', 3, 3, NULL, NULL),
(4, '4', '0', 4, 2, NULL, NULL),
(5, '2', '0', 5, 2, NULL, NULL),
(8, '1', '0', 7, 3, NULL, NULL),
(9, '1', '0', 7, 2, NULL, NULL),
(12, '1', '0', 9, 3, NULL, NULL),
(13, '1', '0', 9, 2, NULL, NULL),
(14, '1', '0', 10, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `harga_produk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `satuan_produk` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `stok_produk` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kategori_produk` enum('spare part','printer','pc','laptop') COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `nama_produk`, `harga_produk`, `satuan_produk`, `stok_produk`, `kategori_produk`, `foto`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 'PC ASUS', '12000000', 'Unit', '6', 'pc', '20191006114447.jpg', 'ram 6gb\r\nprocesor 2ghz\r\n', '2019-10-06 04:44:47', '2019-12-22 09:38:19'),
(3, 'keyboard', '150000', 'unit', '108', '', '20191030102039.jpg', 'merk votre cocok untuk anda yang kantong kering', '2019-10-30 03:20:40', '2019-12-22 11:11:17'),
(4, 'mouse', '250000', 'unit', '0', '', '20191030104024.png', 'titik koma jangan lupa', '2019-10-30 03:40:24', '2019-10-30 03:40:24'),
(5, 'pc acer', '20000000', 'unit', '0', 'spare part', '20191030114925.jpg', 'buat game', '2019-10-30 04:49:25', '2019-10-30 04:49:25'),
(6, 'Monitor', '1500000', 'pcs', '12', 'spare part', '20191030115144.jpg', 'Monitor 21 in bagus untuk gaming', '2019-10-30 04:51:44', '2019-12-22 09:40:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_pembelian`
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
-- Struktur dari tabel `suppliers`
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
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama_supplier`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(2, 'Inara', 'Brebes', '0879xxxx', '2019-10-06 04:39:25', '2019-10-06 04:39:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `level`, `created_at`, `updated_at`) VALUES
(1, 'iam', 'iam31@gmail.com', '$2y$10$7RHce/b3j1rUk.fT2x6LjOWNbAxweRfw73gvf.2VmYKJL9qDdyvWm', 'mOeOgOoIijbhu75PEbk7fx9azKlr9ipZ6NjUxq5alW5DJLyv7ABxzJ6e3Xyn', 'admin', '2019-10-04 17:51:31', '2019-10-05 02:47:30'),
(2, 'ijuol', 'ijuol21@gmail.com', '$2y$10$sXzUYwmJvcqU03iY.1icnus4BWw9eS4cRFNZxDvdUrsjqZhcLpKxq', NULL, 'gudang', '2019-10-05 02:52:31', '2019-10-05 02:52:31'),
(3, 'kasir', 'kasir@gmail.com', '$2y$10$aAcJ1/VmqmhRUrF.ltMPIO2z/3Ltl2fLFZPAhXUuKrB3cxTZG/pae', NULL, 'kasir', '2019-10-29 01:52:42', '2019-10-29 01:52:42'),
(4, 'pelanggan', 'pelanggan@gmail.com', '$2y$10$zqs3AdBDenGcmSTnheo52uN.mY/QN0DL.g.lYGnq.eKiz5a927cHi', 'rmWTwNsvMleB3e5l9C8i3xOevVwiPR7drrc9HPGExdSXUyVpV9Lig0RUBV47', 'pelanggan', '2019-10-29 02:02:34', '2019-11-25 07:35:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indeks untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pembelians_kode_beli_unique` (`kode_beli`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualans`
--
ALTER TABLE `penjualans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penjualans_kode_jual_unique` (`kode_jual`);

--
-- Indeks untuk tabel `penjualan_produk`
--
ALTER TABLE `penjualan_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk_pembelian`
--
ALTER TABLE `produk_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penjualans`
--
ALTER TABLE `penjualans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penjualan_produk`
--
ALTER TABLE `penjualan_produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `produk_pembelian`
--
ALTER TABLE `produk_pembelian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
