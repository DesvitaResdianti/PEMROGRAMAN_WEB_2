-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 30 Des 2023 pada 16.13
-- Versi server: 8.0.30
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_adm` int NOT NULL,
  `nama_adm` varchar(30) NOT NULL,
  `user_adm` varchar(30) NOT NULL,
  `pass_adm` varchar(30) NOT NULL,
  `telp_adm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_adm`, `nama_adm`, `user_adm`, `pass_adm`, `telp_adm`) VALUES
(1, 'JIKIE', 'ADMIN', 'ADMIN', '085267964065');

-- --------------------------------------------------------

--
-- Struktur dari tabel `disc`
--

CREATE TABLE `disc` (
  `id_disc` int NOT NULL,
  `discount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `disc`
--

INSERT INTO `disc` (`id_disc`, `discount`) VALUES
(1, 10),
(2, 20),
(3, 30),
(4, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id_feed` int NOT NULL,
  `id_kon` int NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `request` varchar(255) NOT NULL,
  `reply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id_feed`, `id_kon`, `feedback`, `request`, `reply`) VALUES
(2, 2, 'JELEK FILMNYA', 'FILM HANTU', 'OKE LATER WE PUT FILM HANTU'),
(3, 4, 'JELEK FILMNYA', 'GAUSAH', 'OKE BRO MAKASI FEEDBACKNYA MUACHHHH......П??'),
(4, 2, 'OMGOMG', 'CONJURING 5 DONG BOS', 'STOCK ON THE WAY BRO OKE?'),
(5, 2, 'CEK ', 'DODO', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info`
--

CREATE TABLE `info` (
  `id_info` int NOT NULL,
  `nama_toko` varchar(500) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `info`
--

INSERT INTO `info` (`id_info`, `nama_toko`, `alamat`, `no_telp`) VALUES
(1, 'DEC', 'JL.MAHONI', '085367875987');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int NOT NULL,
  `nama_ksr` varchar(30) NOT NULL,
  `user_kasir` varchar(30) NOT NULL,
  `pass_kasir` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama_ksr`, `user_kasir`, `pass_kasir`, `alamat`, `no_telp`) VALUES
(1, 'Jean', 'Jean', 'JEAN', 'LUBUK TAHU', '085267964065'),
(3, 'JIKIE', 'JIKIE', 'JIKIE', 'JL.RAHAYU BARU', '081370561143'),
(4, 'REZEKI', 'REZEKI', 'REZEKI', 'JL.ITNB\r\n4', '0981293821903');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `id_kon` int NOT NULL,
  `nama_kon` varchar(30) NOT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `alamat` text,
  `user_kon` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`id_kon`, `nama_kon`, `telp`, `alamat`, `user_kon`, `password`) VALUES
(2, 'HARRY', '0893473746', 'JL.MANDOR', 'HARRY', 'HARRY'),
(4, 'DEFANDY', '098807123', 'JTEMVBUNG', 'DEFANDY', 'DEFANDY');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int NOT NULL,
  `tgl_penjualan` varchar(50) DEFAULT NULL,
  `dead_trx` date NOT NULL,
  `uraian` varchar(500) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `harga_modal_barang` varchar(50) DEFAULT NULL,
  `harga_jual_barang` varchar(50) DEFAULT NULL,
  `harga_jasa` varchar(50) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `id_kon` int DEFAULT NULL,
  `id_kasir` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tgl_penjualan`, `dead_trx`, `uraian`, `jenis`, `jumlah`, `harga_modal_barang`, `harga_jual_barang`, `harga_jasa`, `total`, `id_kon`, `id_kasir`) VALUES
(1, '2022-12-09', '2022-12-11', '2 DAY', 'RENTAL', 1, '', '50000', '50000', '50000', 2, 1),
(2, '2022-12-09', '2022-12-11', 'WEDNESDAY', 'BARANG', 0, '50000', '100000', '100000', '0', 2, 1),
(7, '2022-12-16', '2022-12-17', 'WEDNESDAY', 'BARANG', 0, '50000', '100000', '100000', '0', 4, 1),
(8, '2022-12-16', '2022-12-17', '1 DAY', 'RENTAL', 1, '', '35000', '35000', '35000', 4, 1),
(9, '2023-03-26', '0000-00-00', 'WEDNESDAY', 'BARANG', 1, '50000', '100000', '100000', '100000', 2, 1),
(10, '2023-03-26', '0000-00-00', 'WEDNESDAY', 'BARANG', 1, '50000', '100000', '100000', '100000', 2, 1),
(11, '2023-03-26', '2023-03-26', 'WEDNESDAY', 'BARANG', 5, '50000', '100000', '100000', '500000', 4, 1),
(12, '2023-03-26', '2023-03-26', 'WEDNESDAY', 'BARANG', 5, '50000', '100000', '100000', '500000', 2, 1),
(13, '2023-03-26', '2023-03-26', 'WEDNESDAY', 'BARANG', 1, '50000', '100000', '100000', '100000', 4, 1),
(14, '2023-03-26', '2023-03-26', 'WEDNESDAY', 'BARANG', 1, '50000', '100000', '100000', '100000', 4, 1),
(15, '2023-03-26', '2023-03-26', 'WEDNESDAY', 'BARANG', 2, '50000', '100000', '100000', '200000', 4, 1),
(16, '2023-03-26', '2023-03-26', 'WEDNESDAY', 'BARANG', 2, '50000', '100000', '100000', '200000', 4, 1),
(17, '2023-03-26', '2023-03-26', 'WEDNESDAY', 'BARANG', 1, '50000', '100000', '100000', '100000', 2, 1),
(18, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 2, '50000', '100000', '100000', '200000', 2, 1),
(19, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 2, '50000', '100000', '100000', '200000', 2, 1),
(20, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 3, '50000', '100000', '100000', '300000', 0, 1),
(21, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 2, '50000', '100000', '100000', '200000', 0, 1),
(22, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 4, '50000', '100000', '100000', '400000', 0, 1),
(23, '2023-03-27', '2023-03-27', 'WEDNESDAY', 'BARANG', 1, '50000', '100000', '100000', '100000', 2, 1),
(24, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 1, '50000', '100000', '100000', '100000', 2, 1),
(25, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 3, '50000', '100000', '100000', '300000', 2, 1),
(26, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 2, '50000', '100000', '100000', '200000', 2, 1),
(27, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 10, '50000', '100000', '100000', '1000000', 2, 1),
(28, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 1, '50000', '100000', '100000', '100000', 2, 1),
(29, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 2, '50000', '100000', '100000', '200000', 2, 1),
(30, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 1, '50000', '100000', '100000', '100000', 2, 1),
(31, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 2, '50000', '100000', '100000', '200000', 2, 1),
(32, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 1, '50000', '100000', '100000', '100000', 2, 1),
(33, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 2, '50000', '100000', '100000', '200000', 4, 1),
(34, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 1, '50000', '100000', '100000', '100000', 2, 1),
(35, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 2, '50000', '100000', '100000', '200000', 2, 1),
(36, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 3, '50000', '100000', '100000', '300000', 2, 1),
(37, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 1, '50000', '100000', '100000', '100000', 4, 1),
(38, '2023-03-27', '0000-00-00', 'WEDNESDAY', 'BARANG', 1, '50000', '100000', '100000', '100000', 2, 1),
(39, '2023-04-01', '0000-00-00', '1 DAY', 'BARANG', 10, '20000', '35000', '35000', '350000', 2, 1),
(40, '2023-04-01', '0000-00-00', 'WEDNESDAY', 'BARANG', 10, '50000', '100000', '100000', '1000000', 4, 1),
(41, '2023-04-01', '0000-00-00', 'WEDNESDAY', 'BARANG', 4, '50000', '100000', '100000', '400000', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_brg` int NOT NULL,
  `nama` varchar(500) NOT NULL,
  `jenis` varchar(500) NOT NULL,
  `stok` int DEFAULT NULL,
  `harga_modal` varchar(30) DEFAULT NULL,
  `harga_jual` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_brg`, `nama`, `jenis`, `stok`, `harga_modal`, `harga_jual`) VALUES
(1, 'WEDNESDAY', 'BARANG', 13, '50000', '100000'),
(2, '1 DAY', 'BARANG', 10, '20000', '35000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_transaksi`
--

CREATE TABLE `status_transaksi` (
  `id_transaksi` int NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `status_transaksi`
--

INSERT INTO `status_transaksi` (`id_transaksi`, `status`) VALUES
(1, 'Menunggu Konfirmasi admin'),
(2, 'Proses Pengemasan'),
(3, 'Dalam Pengiriman'),
(4, 'Sudah di kurir'),
(5, 'Sudah diterima Customer'),
(7, 'Return Tunggu'),
(8, 'Retrund disetujui'),
(9, 'Retrund ditolak'),
(10, 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `id_sup` int NOT NULL,
  `nama_sup` varchar(500) NOT NULL,
  `jenis` varchar(500) NOT NULL,
  `telp` varchar(500) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`id_sup`, `nama_sup`, `jenis`, `telp`, `alamat`) VALUES
(1, 'PT.JIKIE', 'MOVIE', '081370561143', 'JL.RAHAYU BARU NO 16\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_trx`
--

CREATE TABLE `tmp_trx` (
  `id_tmp` int NOT NULL,
  `id_trx` varchar(30) DEFAULT NULL,
  `id_brg` int DEFAULT NULL,
  `jml` int DEFAULT NULL,
  `id_kasir` int DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tmp_trx`
--

INSERT INTO `tmp_trx` (`id_tmp`, `id_trx`, `id_brg`, `jml`, `id_kasir`, `status`) VALUES
(7, '01042023071243', 1, 4, 1, 'done'),
(8, NULL, 1, 1, 1, 'onprocess');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx`
--

CREATE TABLE `trx` (
  `no_trx` int NOT NULL,
  `id_trx` varchar(50) NOT NULL,
  `id_kon` int NOT NULL,
  `tgl_trx` date NOT NULL,
  `dead_trx` date NOT NULL,
  `total` varchar(30) DEFAULT NULL,
  `total_modal` varchar(30) DEFAULT NULL,
  `id_kasir` int NOT NULL,
  `id_discount` int NOT NULL,
  `status_transaksi` int NOT NULL,
  `bukti_foto` text NOT NULL,
  `catatan_refund` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `trx`
--

INSERT INTO `trx` (`no_trx`, `id_trx`, `id_kon`, `tgl_trx`, `dead_trx`, `total`, `total_modal`, `id_kasir`, `id_discount`, `status_transaksi`, `bukti_foto`, `catatan_refund`) VALUES
(6, '01042023071243', 2, '2023-04-01', '2023-04-01', '400000', '200000', 1, 4, 3, 'img-01.png', 'Rusak \r\n2 barang ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trxbarang`
--

CREATE TABLE `trxbarang` (
  `id_trx` int NOT NULL,
  `tgl_trx` date NOT NULL,
  `id_brg` int NOT NULL,
  `id_sup` int NOT NULL,
  `jml` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indeks untuk tabel `disc`
--
ALTER TABLE `disc`
  ADD PRIMARY KEY (`id_disc`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feed`);

--
-- Indeks untuk tabel `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indeks untuk tabel `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_kon`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `status_transaksi`
--
ALTER TABLE `status_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_sup`);

--
-- Indeks untuk tabel `tmp_trx`
--
ALTER TABLE `tmp_trx`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indeks untuk tabel `trx`
--
ALTER TABLE `trx`
  ADD PRIMARY KEY (`no_trx`);

--
-- Indeks untuk tabel `trxbarang`
--
ALTER TABLE `trxbarang`
  ADD PRIMARY KEY (`id_trx`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `disc`
--
ALTER TABLE `disc`
  MODIFY `id_disc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feed` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_kon` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_brg` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `status_transaksi`
--
ALTER TABLE `status_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_sup` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tmp_trx`
--
ALTER TABLE `tmp_trx`
  MODIFY `id_tmp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `trx`
--
ALTER TABLE `trx`
  MODIFY `no_trx` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `trxbarang`
--
ALTER TABLE `trxbarang`
  MODIFY `id_trx` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
