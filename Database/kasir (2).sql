-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Bulan Mei 2025 pada 07.23
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--
-- Kesalahan membaca struktur untuk tabel kasir.admin: #1932 - Table 'kasir.admin' doesn't exist in engine
-- Kesalahan membaca data untuk tabel kasir.admin: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `kasir`.`admin`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `kode_barang` varchar(10) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `kode_barang`, `stok`) VALUES
(18, 'bola', '12', 11),
(20, 'baba', '12345', 1),
(24, 'adad', 'qe', NULL),
(26, 'barangkeren', '123', 0),
(28, 'ada', '123', -124),
(30, '', 'Hitam abu-', 0),
(31, 'bola', '', 0),
(39, 'adadadadada', '1221432', 0),
(40, 'baru', '1221432', 0),
(41, 'Popok bayi', '123', 0),
(42, 'ada', '123', 1),
(43, 'desember', '123', 1),
(44, 'januari', '123', 1),
(46, '44', '123', 124),
(47, '43', '123', 2),
(48, '43', '123', 1),
(49, '43', '1111', 1),
(50, 'desember', '123', 1),
(51, 'desember', '123', 0),
(52, 'desember', '123', 1),
(53, 'desember', '123', 1),
(54, 'desember', '123', 1),
(55, 'desember', '123', 1),
(56, 'desember', '123', 0),
(57, 'desember', '123', 2),
(58, 'desember', '123', 2),
(59, 'desember', '123', 1),
(60, 'desember', '123', 1),
(61, 'desember', '123', 1),
(62, 'desember', '123', 1),
(63, 'januari', '123', 1),
(64, 'ada', '123', 1),
(65, 'januari', '123', 1),
(66, NULL, '123', -122),
(67, 'januari', '123', 1),
(68, 'buahbuahan', '123', 1),
(69, 'buahbuahan', '1', 1),
(70, 'anekaragam', '123', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `id_barang`, `tanggal_keluar`, `jumlah`) VALUES
(1, 2, '2029-12-12', 121321321),
(2, 3, '2024-04-25', 2),
(3, 4, '2024-12-12', 3),
(4, 5, '2024-04-27', 4),
(23, 121, '3000-12-23', 12),
(24, 1321, '3000-12-23', 213123),
(26, 19, '0000-00-00', 1),
(27, 28, '2024-12-10', 1),
(28, 28, '2024-12-10', 1),
(29, 66, '2024-12-25', 123),
(30, 44, '2024-12-19', 123);

--
-- Trigger `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `Tbk` AFTER INSERT ON `barang_keluar` FOR EACH ROW UPDATE barang
SET stok=stok-new.jumlah
WHERE id_barang=new.id_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `dbk` AFTER DELETE ON `barang_keluar` FOR EACH ROW UPDATE barang
SET stok = stok+old.jumlah
WHERE id_barang=old.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal_diterima` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `id_barang`, `jumlah`, `tanggal_diterima`) VALUES
(1, NULL, 89, '2024-04-11'),
(13, 13, 18, '2024-05-11'),
(14, 3, 100, '2024-05-02'),
(15, 122, 1, '2024-04-30'),
(16, 121212, 88, '2024-04-11'),
(17, 11, 88, '2024-04-30'),
(19, 23, 1, '2024-12-12'),
(23, 31, 0, '2024-10-30'),
(25, 46, 123, '2024-12-07'),
(26, 47, 1, '2024-12-12'),
(27, NULL, 1, '2008-12-23'),
(28, NULL, 1, '2024-12-19'),
(29, NULL, 123, '2024-12-10'),
(30, NULL, 1, '2024-12-17'),
(31, NULL, 1, '2024-12-15'),
(32, NULL, 1, '2024-12-17'),
(33, NULL, 1, '2025-01-09'),
(34, NULL, 1, '2024-12-18'),
(35, NULL, 123, '2024-12-26'),
(36, NULL, 123, '2024-12-26'),
(37, NULL, 123, '2024-12-26'),
(38, NULL, 123, '2024-12-26'),
(39, NULL, 123, '2024-12-26'),
(40, NULL, 123, '2024-12-10'),
(41, 43, 1, '2024-12-17'),
(42, 44, 1, '2024-12-23'),
(43, 44, 123, NULL),
(44, 68, 1, '2024-12-10');

--
-- Trigger `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `Tbm` AFTER INSERT ON `barang_masuk` FOR EACH ROW UPDATE barang
SET stok=stok+new.jumlah
WHERE id_barang=new.id_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `dbm` AFTER DELETE ON `barang_masuk` FOR EACH ROW UPDATE barang
SET stok= stok-old.jumlah  
WHERE id_barang=old.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_kry` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `NIK` int(11) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jeniskel` enum('laki-laki','perempuan') DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_kry`, `id_user`, `nama`, `NIK`, `tanggal_lahir`, `jeniskel`, `alamat`, `no_hp`) VALUES
(1, 11111, 'der', 1231231, '2024-10-02', 'laki-laki', 'tiban', 121212),
(2, 12312313, 'adadad', 2147483647, '2024-10-03', 'laki-laki', 'tiban', 1),
(3, 1231232, 'derr', 1232132, '2024-10-16', 'perempuan', 'botania', 8213300),
(4, NULL, 'kucing', 111, '2024-10-03', 'laki-laki', 'tiban', 1212),
(5, NULL, 'ada', 1, '2024-09-30', 'laki-laki', 'tiban', 121212),
(6, NULL, 'deruyyy', 123213, '2024-10-12', 'laki-laki', 'tiban', 9112),
(8, 488, 'paoe', 1231, '2024-11-05', 'laki-laki', 'longkang', 123),
(9, NULL, 'adad', 1232123, '2024-12-12', 'laki-laki', 'tiban', 91212),
(10, 491, 'Kayayya', 123, '2024-11-07', 'laki-laki', 'botqnia', 123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `manajer`
--
-- Kesalahan membaca struktur untuk tabel kasir.manajer: #1932 - Table 'kasir.manajer' doesn't exist in engine
-- Kesalahan membaca data untuk tabel kasir.manajer: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `kasir`.`manajer`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `harga_per` double NOT NULL,
  `harga_total` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nomor_nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nota`
--

INSERT INTO `nota` (`id_nota`, `harga_per`, `harga_total`, `jumlah`, `nomor_nota`) VALUES
(1, 12, 1, 12, 11),
(2, 12, 11, 11, 1231321),
(3, 12, 1, 1, 123),
(5, 12, 1, 7, 123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugaskasir`
--
-- Kesalahan membaca struktur untuk tabel kasir.petugaskasir: #1932 - Table 'kasir.petugaskasir' doesn't exist in engine
-- Kesalahan membaca data untuk tabel kasir.petugaskasir: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `kasir`.`petugaskasir`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL,
  `kode_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_nota`, `kode_transaksi`, `tanggal_transaksi`) VALUES
(1, 0, 0, NULL),
(2, 1, 12, '2024-11-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `foto`) VALUES
(479, 'lg@pa.id', '202cb962ac59075b964b07152d234b70', 2, ''),
(481, 'manajer@lk.id', 'c4ca4238a0b923820dcc509a6f75849b', 3, ''),
(482, 'pbk@ko.id', 'c4ca4238a0b923820dcc509a6f75849b', 4, ''),
(483, 'pbm@loo.id', 'c4ca4238a0b923820dcc509a6f75849b', 5, ''),
(488, 'Derius', '202cb962ac59075b964b07152d234b70', 1, ''),
(491, 'Serrra', '202cb962ac59075b964b07152d234b70', 3, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_kry`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `id_nota` (`id_nota`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_kry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
