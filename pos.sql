-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Mar 2024 pada 04.50
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_suplier`
--

CREATE TABLE `barang_suplier` (
  `id_barang_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(32) NOT NULL,
  `nama_barang` varchar(129) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `harga` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_suplier`
--

INSERT INTO `barang_suplier` (`id_barang_suplier`, `nama_suplier`, `nama_barang`, `kategori`, `harga`) VALUES
(5, 'Ginanjar', 'Chocolatos', 'Makanan Ringan', 1000),
(6, 'nala', 'Terigu', 'Minuman', 6500),
(8, 'nala', 'Beras', 'Sembako', 17000),
(10, 'Ginanjar', 'Snack Zet', 'Makanan Ringan', 2000),
(12, 'Rui', 'Teh Gelas', 'Minuman', 1000),
(13, 'Rui', 'Teh Kotak', 'Minuman', 3500),
(14, 'Rui', 'Milku', 'Minuman', 3000),
(15, 'Ginanjar', 'Snack Garuda Rosta', 'Makanan Ringan', 2000),
(16, 'Ginanjar', 'Snack Keripkik Talas', 'Makanan Ringan', 2000),
(17, 'Ginanjar', 'Keripik Kaca', 'Makanan Ringan', 1000),
(18, 'nala', 'Garam', 'Sembako', 1500),
(19, 'nala', 'Kecap', 'Sembako', 1500),
(20, 'nala', 'Saos Bantal', 'Sembako', 4500),
(21, 'Rui', 'Isoplus', 'Minuman', 2500),
(22, 'Rui', 'Teh Pucuk', 'Minuman', 2500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_beli_detail` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_penjualan_detail` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_suplier`
--

CREATE TABLE `detail_suplier` (
  `id_supplier` int(11) NOT NULL,
  `kategori` text NOT NULL,
  `nama_barang` text NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_suplier`
--

INSERT INTO `detail_suplier` (`id_supplier`, `kategori`, `nama_barang`, `harga`) VALUES
(0, '2', 'saos abc botol', 8000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_toko`, `nama_pelanggan`, `alamat`, `no_hp`, `created_at`) VALUES
(1, 1, 'nala', 'banjar', '09876', '2024-02-06 17:00:00'),
(2, 2, 'ginanjar', 'Bandung', '09876', '2024-02-08 17:00:00'),
(3, 3, 'gina', 'Bandung', '086533775', '2024-02-18 21:41:01'),
(4, 0, 'Barda', 'Garut', '085384864', '2024-03-04 07:46:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `kategori` text NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_produk` text NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `nama_suplier` text NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_bayar` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `kategori`, `id_toko`, `nama_produk`, `id_produk`, `qty`, `tanggal_pembelian`, `nama_suplier`, `harga_beli`, `bayar`, `sisa`, `created_at`, `total_bayar`) VALUES
(48, '', 0, 'Snack Zet', '', 50, '2024-03-04', 'Ginanjar', 100000, 200000, 100000, '2024-03-04 14:50:29', 0),
(49, '', 0, 'Milku', '', 50, '2024-03-04', 'Rui', 150000, 160000, 10000, '2024-03-04 14:51:45', 0),
(50, '', 0, 'Terigu', '', 36, '2024-03-04', 'nala', 234000, 90000, -144000, '2024-03-04 15:26:43', 926000),
(51, '', 0, 'Beras', '', 50, '2024-03-04', 'nala', 850000, 90000, -760000, '2024-03-04 15:26:43', 926000),
(53, '', 0, 'Keripik Kaca', '', 3, '2024-03-04', 'Ginanjar', 3000, 10000, -1000, '2024-03-04 15:28:50', 9000),
(54, '', 0, 'Garam', '', 4, '2024-03-04', 'nala', 6000, 10000, -1000, '2024-03-04 15:28:50', 9000),
(56, '', 0, 'Snack Keripkik Talas', '', 8, '2024-03-04', 'Ginanjar', 16000, 200000, 65000, '2024-03-04 15:29:46', 135000),
(57, '', 0, 'Kecap', '', 50, '2024-03-05', 'nala', 75000, 100000, 25000, '2024-03-05 01:59:59', 75000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `kasir` text NOT NULL,
  `nama_barang` text NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `kasir`, `nama_barang`, `id_toko`, `id_user`, `qty`, `total`, `bayar`, `sisa`, `created_at`) VALUES
(57, '', 'Snack Zet', 0, 0, 2, 5000, 5000, 0, '2024-03-05 01:55:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_toko`, `nama_produk`, `id_kategori`, `satuan`, `harga_beli`, `harga_jual`, `created_at`, `stok`) VALUES
(67, 0, 'Snack Zet', 0, 'pcs', 2000, 2500, '2024-03-05 01:54:37', 39),
(68, 0, 'Milku', 0, 'pcs', 3000, 3500, '2024-03-05 01:49:21', 48),
(69, 0, 'Terigu', 0, 'kilo', 6500, 7000, '2024-03-04 18:40:32', 36),
(70, 0, 'Beras', 0, 'kilo', 17000, 18000, '2024-03-04 18:55:38', 50),
(72, 0, 'Keripik Kaca', 0, 'pcs', 1000, 1500, '2024-03-04 18:56:16', 3),
(73, 0, 'Garam', 0, 'pcs', 1500, 2000, '2024-03-04 18:57:11', 4),
(75, 0, 'Snack Keripkik Talas', 0, 'pcs', 2000, 2500, '2024-03-04 18:58:00', 8),
(76, 0, 'Kecap', 0, '', 1500, 0, '2024-03-04 17:00:00', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_kasir`
--

CREATE TABLE `produk_kasir` (
  `id_penjualan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kategori` text NOT NULL,
  `nama_barang` text NOT NULL,
  `harga` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_kategori`
--

CREATE TABLE `produk_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_kategori`
--

INSERT INTO `produk_kategori` (`id_kategori`, `nama_kategori`, `created_at`) VALUES
(1, 'sabun', '2024-02-09 07:59:09'),
(2, 'kerupuk', '2024-02-09 07:59:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `kategori` text NOT NULL,
  `categori` text NOT NULL,
  `harga` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `tlp_hp` varchar(50) NOT NULL,
  `alamat_supplier` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`id_supplier`, `nama_barang`, `kategori`, `categori`, `harga`, `id_toko`, `nama_supplier`, `tlp_hp`, `alamat_supplier`, `created_at`) VALUES
(3, 'Snack Chitato', 'Makanan Ringan', 'Makanan Ringan', 5000, 0, 'Ginanjar', '087652575', '', '2024-03-01 01:38:16'),
(5, 'Gula Pasir', 'Sembako', 'Sembako', 6000, 0, 'nala', '089872637789', '', '2024-03-01 01:38:30'),
(19, '', '', 'Minuman', 0, 0, 'Rui', '065757356', '', '2024-03-03 14:44:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tambah_pembelian`
--

CREATE TABLE `tambah_pembelian` (
  `id_tambah_pembelian` int(11) NOT NULL,
  `nama_suplier` varchar(255) NOT NULL,
  `nama_produk` text NOT NULL,
  `kategori` text NOT NULL,
  `qty` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `harga` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tlp_hp` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat`, `tlp_hp`, `created_at`) VALUES
(3, 'Toko Jaya Abadi', 'Banjar', '0897633748', '2024-02-19 04:47:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `access_level` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_toko`, `username`, `password`, `email`, `nama_lengkap`, `access_level`, `created_at`) VALUES
(1, 3, 'kasir', '$2y$10$3uE1gQkJAbYCdgcqA6RyE.rNNFaffmnW7d2u4nt9FIkv2SglJpqXC', 'dilanur2@gmail.com', 'dila nurhidayah', 'kasir', '2024-02-20 03:15:53'),
(3, 3, 'admin', '$2y$10$LOhLlpm.5.Y452YmX2BWQ.WHuskuhWzJFm.JC8/dPVFQNt7jo9AJ.', 'ginaal3@gmail.com', 'Gina Aulia', 'admin', '2024-02-21 00:47:29'),
(11, 3, 'admin1', '$2y$10$LOhLlpm.5.Y452YmX2BWQ.WHuskuhWzJFm.JC8/dPVFQNt7jo9AJ.', 'jirah@gmail.com', 'jirah nur', 'admin', '2024-02-21 00:45:47'),
(12, 0, 'admin3', '111', 'ananda3@gmail.com', 'ananda', 'kasir', '2024-02-27 06:53:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_suplier`
--
ALTER TABLE `barang_suplier`
  ADD PRIMARY KEY (`id_barang_suplier`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_penjualan_detail`);

--
-- Indeks untuk tabel `detail_suplier`
--
ALTER TABLE `detail_suplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produk_kasir`
--
ALTER TABLE `produk_kasir`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tambah_pembelian`
--
ALTER TABLE `tambah_pembelian`
  ADD PRIMARY KEY (`id_tambah_pembelian`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_suplier`
--
ALTER TABLE `barang_suplier`
  MODIFY `id_barang_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_penjualan_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `produk_kasir`
--
ALTER TABLE `produk_kasir`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tambah_pembelian`
--
ALTER TABLE `tambah_pembelian`
  MODIFY `id_tambah_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
