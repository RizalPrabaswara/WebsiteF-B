-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2021 pada 15.55
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cnc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahanbaku`
--

CREATE TABLE `bahanbaku` (
  `Id_bahan_baku` int(10) UNSIGNED NOT NULL,
  `Nama_bahan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kadaluarsa` date DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bahanbaku`
--

INSERT INTO `bahanbaku` (`Id_bahan_baku`, `Nama_bahan`, `stok`, `satuan`, `kadaluarsa`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Beras', 5, 'Kg', '2021-07-06', 'Aktif', '2021-06-29 08:06:57', '2021-06-29 08:06:57'),
(2, 'Ayam', 4, 'Kg', '2021-07-06', 'Aktif', '2021-06-29 08:07:04', '2021-06-29 08:07:04'),
(3, 'Telur', 7, 'Kg', '2021-07-06', 'Aktif', '2021-06-29 08:07:12', '2021-06-29 08:07:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_bahan_baku`
--

CREATE TABLE `detail_bahan_baku` (
  `Id_detail` bigint(20) UNSIGNED NOT NULL,
  `produk_ID` int(11) NOT NULL,
  `bahan_baku_ID` int(11) NOT NULL,
  `jumlah_pakai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_bahan_baku`
--

INSERT INTO `detail_bahan_baku` (`Id_detail`, `produk_ID`, `bahan_baku_ID`, `jumlah_pakai`) VALUES
(1, 1, 1, 0.25),
(2, 1, 2, 0.1),
(3, 1, 3, 0.0625),
(4, 2, 1, 0.25),
(5, 2, 2, 0.1),
(6, 2, 3, 0.125),
(7, 3, 1, 1),
(8, 4, 2, 1),
(9, 5, 3, 1),
(10, 6, 3, 1),
(11, 7, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_status`
--

CREATE TABLE `detail_status` (
  `Id_status` int(10) UNSIGNED NOT NULL,
  `keterangan_status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_status`
--

INSERT INTO `detail_status` (`Id_status`, `keterangan_status`, `created_at`, `updated_at`) VALUES
(1, 'Order Produk', NULL, NULL),
(2, 'Konfirmasi Pembayaran', NULL, NULL),
(3, 'Produksi Pesanan', NULL, NULL),
(4, 'Pesanan Selesai', NULL, NULL),
(5, 'Pesanan Diterima', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_05_141526_produk', 1),
(7, '2021_06_05_143725_pelanggan', 2),
(9, '2021_06_14_083837_penjualan', 4),
(13, '2021_06_14_084028_detil_status', 4),
(14, '2021_06_14_083945_rincian_penjual', 5),
(16, '2014_10_12_000000_create_users_table', 6),
(17, '2021_06_26_032834_supplier', 7),
(18, '2021_06_05_143234_bahan_baku', 8),
(19, '2021_06_14_084001_pembelian', 8),
(20, '2021_06_14_084011_rincian_pembelian', 8),
(22, '2021_06_05_143313_detail_bahan_baku', 9),
(23, '2021_06_29_081251_produksi', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `Id_pengguna` int(10) UNSIGNED NOT NULL,
  `Nama_pengguna` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`Id_pengguna`, `Nama_pengguna`, `password`, `jenis_kelamin`, `no_telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'mahardika', 'mahardika', 'L', '081238918422', 'Perum TAS 2 Blok Q4 Nomor 61', '2021-06-07 10:28:21', '2021-06-07 10:28:21'),
(2, 'mahar', 'mahardika', 'L', '08123498', 'Perum TAS 2 Blok Q4 Nomor 61, Sidoarjo', '2021-06-15 09:15:29', '2021-06-15 09:15:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `Id_pembelian` int(10) UNSIGNED NOT NULL,
  `id_supplier` int(10) UNSIGNED NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`Id_pembelian`, `id_supplier`, `tanggal_pembelian`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-06-30', '2021-06-29 13:31:46', '2021-06-29 13:31:46'),
(2, 2, '2021-06-30', '2021-06-29 13:32:13', '2021-06-29 13:32:13'),
(3, 3, '2021-06-30', '2021-06-29 13:32:43', '2021-06-29 13:32:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `Id_penjualan` int(10) UNSIGNED NOT NULL,
  `id_pengguna` int(10) UNSIGNED NOT NULL,
  `id_produk` int(10) UNSIGNED NOT NULL,
  `id_status` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `via` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengiriman` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`Id_penjualan`, `id_pengguna`, `id_produk`, `id_status`, `jumlah`, `tanggal_pesanan`, `via`, `pengiriman`, `total_bayar`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 5, 2, '2021-07-12', 'rekening', '', 54000, '2021-07-11 18:19:56', '2021-07-11 23:33:58'),
(2, 2, 1, 5, 10, '2021-07-12', 'rekening', '', 250000, '2021-07-11 23:51:51', '2021-07-11 23:52:53'),
(3, 2, 1, 5, 4, '2021-07-12', 'rekening', '', 100000, '2021-07-11 23:58:48', '2021-07-11 23:59:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `Id_produk` int(10) UNSIGNED NOT NULL,
  `Nama_produk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Harga_jual` int(11) NOT NULL,
  `Deskripsi_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_produk` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`Id_produk`, `Nama_produk`, `Harga_jual`, `Deskripsi_produk`, `foto_produk`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Chicken Salted Egg Ori', 25000, 'Rice + Chicken + Scrambled Egg', 'salted_egg.png', 'Menu', '2021-06-29 10:00:15', '2021-06-29 10:00:15'),
(2, 'Combo CSE Ori', 27000, 'Rice + Chicken + Ceplok Egg', 'salted_egg.png', 'Menu', '2021-06-29 10:33:35', '2021-06-29 10:33:35'),
(3, 'Nasi', 0, '', '', 'Bukan Menu', '2021-07-07 13:00:37', '2021-07-07 13:00:37'),
(4, 'Ayam', 0, '', '', 'Bukan Menu', '2021-07-07 13:09:06', '2021-07-07 13:09:06'),
(5, 'Scrambled Egg', 0, '', '', 'Bukan Menu', '2021-07-11 10:45:57', '2021-07-11 10:45:57'),
(6, 'Ceplok Egg', 0, '', '', 'Bukan Menu', '2021-07-11 10:46:16', '2021-07-11 10:46:16'),
(7, 'OMEGA Egg', 0, '', '', 'Bukan Menu', '2021-07-11 10:46:32', '2021-07-11 10:46:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` int(10) UNSIGNED NOT NULL,
  `id_produk` int(10) UNSIGNED NOT NULL,
  `jumlah_produksi` float NOT NULL,
  `stok_produksi` float NOT NULL,
  `biaya_produksi` int(11) NOT NULL,
  `tgl_produksi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `id_produk`, `jumlah_produksi`, `stok_produksi`, `biaya_produksi`, `tgl_produksi`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 4.2, 8000, '2021-07-12', '2021-07-11 23:56:34', '2021-07-11 23:56:34'),
(2, 4, 4, 3.6, 13000, '2021-07-12', '2021-07-11 23:56:49', '2021-07-11 23:56:49'),
(3, 5, 1, 0.74, 12000, '2021-07-12', '2021-07-11 23:57:06', '2021-07-11 23:57:06'),
(4, 6, 1, 1, 12000, '2021-07-12', '2021-07-11 23:57:18', '2021-07-11 23:57:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_pembelian`
--

CREATE TABLE `rincian_pembelian` (
  `Id_rincian_pembelian` int(10) UNSIGNED NOT NULL,
  `Id_bahan_baku` int(10) UNSIGNED NOT NULL,
  `Id_supplier` int(10) UNSIGNED NOT NULL,
  `Id_pembelian` int(10) UNSIGNED NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `total_pengeluaran` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rincian_pembelian`
--

INSERT INTO `rincian_pembelian` (`Id_rincian_pembelian`, `Id_bahan_baku`, `Id_supplier`, `Id_pembelian`, `jumlah_beli`, `harga_beli`, `total_pengeluaran`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 1, 14, 13000, 182000, '2021-06-29 13:31:47', '2021-06-29 13:31:47'),
(5, 2, 2, 2, 5, 28000, 140000, '2021-06-29 13:32:13', '2021-06-29 13:32:13'),
(6, 3, 3, 3, 4, 13000, 52000, '2021-06-29 13:32:43', '2021-06-29 13:32:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_penjualan`
--

CREATE TABLE `rincian_penjualan` (
  `Id_rincian_penjualan` int(10) UNSIGNED NOT NULL,
  `Id_penjualan` int(10) UNSIGNED NOT NULL,
  `Id_produk` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(10) UNSIGNED NOT NULL,
  `id_bahanbaku` int(11) UNSIGNED NOT NULL,
  `nama_supplier` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `id_bahanbaku`, `nama_supplier`, `tempat`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bu Tiah', 'Pasar Blauran Baru', '2021-06-29 08:08:21', '2021-06-29 08:08:21'),
(2, 2, 'Pak Sugeng', 'Pasar Blauran Baru', '2021-06-29 08:09:23', '2021-06-29 08:09:23'),
(3, 3, 'Pak Sugeng', 'Pasar Blauran Baru', '2021-06-29 08:09:36', '2021-06-29 08:09:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama_pelanggan`, `email`, `password`, `jenis_kelamin`, `no_telp`, `alamat`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Mahardika', 'maharrdiika10@gmail.com', '$2y$10$rBqaQa9gw6aGzxIZQvsTguYywwXooESM9y/RxuTkP3jGVA4mrr3Ou', 'L', '012839581', 'Perum TAS 2 Blok Q4 Nomor 61, Sidoarjo', NULL, '2021-06-15 11:06:44', '2021-06-15 11:06:44'),
(3, 'Dika', '18410100110@dinamika.ac.id', '$2y$10$vb31VfQ.91GFEH18I6kNSO3a/4fpTpBnvWTdLm.PgWgU8quAZLXVe', 'L', '081238492', 'Perum TAS 2 Blok Q4 Nomor 61, Sidoarjo', NULL, '2021-06-15 14:16:36', '2021-06-15 14:16:36'),
(4, 'adhim', 'adhim@gmail.com', '$2y$10$Hl3wXWKDaYSDLS0bHONuROaHYEUwMSDI8XBLHFV2AzDcJXUa49Jxi', 'L', '0812839852', 'Surabaya', NULL, '2021-06-15 14:20:58', '2021-06-15 14:20:58'),
(5, 'Mahar', 'mahar@gmail.com', '$2y$10$FvrNZUAvpAKaqivVgnXdkOoTg/MVZO2/3/sFgjQg6Auph4RhpmZHG', 'L', '089868667', 'Perum TAS 2 Blok Q4 Nomor 61, Sidoarjo', NULL, '2021-06-22 23:24:54', '2021-06-22 23:24:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahanbaku`
--
ALTER TABLE `bahanbaku`
  ADD PRIMARY KEY (`Id_bahan_baku`);

--
-- Indeks untuk tabel `detail_bahan_baku`
--
ALTER TABLE `detail_bahan_baku`
  ADD PRIMARY KEY (`Id_detail`);

--
-- Indeks untuk tabel `detail_status`
--
ALTER TABLE `detail_status`
  ADD PRIMARY KEY (`Id_status`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`Id_pengguna`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`Id_pembelian`),
  ADD KEY `fk_supplier_pembelian` (`id_supplier`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`Id_penjualan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`Id_produk`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indeks untuk tabel `rincian_pembelian`
--
ALTER TABLE `rincian_pembelian`
  ADD PRIMARY KEY (`Id_rincian_pembelian`),
  ADD KEY `fk_supplier_rincian` (`Id_supplier`),
  ADD KEY `fk_bahan_rincian` (`Id_bahan_baku`),
  ADD KEY `fk_pembelian` (`Id_pembelian`);

--
-- Indeks untuk tabel `rincian_penjualan`
--
ALTER TABLE `rincian_penjualan`
  ADD PRIMARY KEY (`Id_rincian_penjualan`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_pelanggan_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahanbaku`
--
ALTER TABLE `bahanbaku`
  MODIFY `Id_bahan_baku` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_bahan_baku`
--
ALTER TABLE `detail_bahan_baku`
  MODIFY `Id_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `detail_status`
--
ALTER TABLE `detail_status`
  MODIFY `Id_status` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `Id_pengguna` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `Id_pembelian` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `Id_penjualan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `Id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rincian_pembelian`
--
ALTER TABLE `rincian_pembelian`
  MODIFY `Id_rincian_pembelian` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `rincian_penjualan`
--
ALTER TABLE `rincian_penjualan`
  MODIFY `Id_rincian_penjualan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_supplier_pembelian` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rincian_pembelian`
--
ALTER TABLE `rincian_pembelian`
  ADD CONSTRAINT `fk_bahan_rincian` FOREIGN KEY (`Id_bahan_baku`) REFERENCES `bahanbaku` (`Id_bahan_baku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pembelian` FOREIGN KEY (`Id_pembelian`) REFERENCES `pembelian` (`Id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_supplier_rincian` FOREIGN KEY (`Id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
