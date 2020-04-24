-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 Apr 2020 pada 09.36
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kki_tools`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `karyawan_id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `divisi` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`karyawan_id`, `nik`, `nama`, `gender`, `phone`, `alamat`, `divisi`, `status`) VALUES
(1, 'N012', 'Wati', 'P', '0909', 'jakarta', 'mekanik', 'Karyawan'),
(3, 'N02', 'Ayu', 'P', '787879', 'Bekasi', 'Office Support', 'Kontral'),
(4, 'N03', 'Yuda', 'L', '909878', 'Cipayung', 'Adm', 'Kontrak'),
(5, 'N045', 'naura', 'P', '1234578910', 'bungur', 'Adm', 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjaman_id` int(11) NOT NULL,
  `no_trans` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `kd_alat` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_id`, `no_trans`, `nik`, `kd_alat`, `jumlah`, `tgl_pinjam`, `keterangan`) VALUES
(2, 'TR02', 'N01', 'T03', 1, '2019-12-09', 'pinjem'),
(3, 'TR05', 'N03', 'T06', 1, '2019-12-15', 'Pinjem');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `pengembalian_id` int(11) NOT NULL,
  `no_trans` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `kd_alat` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`pengembalian_id`, `no_trans`, `nik`, `kd_alat`, `jumlah`, `tgl_pinjam`, `keterangan`) VALUES
(1, 'TR02', '001', 'T03', 1, '2019-12-09', 'pinjem'),
(2, 'TR03', 'N01', 'T04', 3, '2019-12-08', 'pinjem'),
(3, 'TR04', 'N012', 'T05', 2, '2019-12-02', 'Pinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tools`
--

CREATE TABLE `tools` (
  `alat_id` int(11) NOT NULL,
  `kd_alat` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text,
  `tgl_beli` date NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tools`
--

INSERT INTO `tools` (`alat_id`, `kd_alat`, `nama`, `harga`, `keterangan`, `tgl_beli`, `stok`) VALUES
(1, 'T01', 'Obeng Minus kembang', 12000, 'baru', '2019-12-03', 190),
(2, 'T02', 'Palu Besi', 50000, 'baru', '2019-12-11', 50),
(5, 'T03', 'Mikrotik lamgka', 13000, 'second', '2019-12-05', 27),
(7, 'T04', 'solder 12', 200000, 'second', '2019-12-11', 10),
(8, 'T05', 'obeng minus', 55000, 'Baru', '2019-12-11', 19),
(13, 'T06', 'Baut', 1000, 'Stok lama', '2019-12-02', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `alamat`, `level`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'dimas', 'jakarta', '1'),
(3, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'putra', 'bandung', '2'),
(7, 'kasir1', 'b4444ced6e6a1ee124539716e0435c22', 'wadad', 'Jayapura', '2'),
(8, 'xyz1234', '25044ec3c5ea662d56ebce767ac505ba', 'Wahyudi', 'Purwodadi Utara', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`karyawan_id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `nik_2` (`nik`),
  ADD KEY `nik_3` (`nik`),
  ADD KEY `nik_4` (`nik`),
  ADD KEY `nik_5` (`nik`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjaman_id`),
  ADD UNIQUE KEY `no_trans` (`no_trans`),
  ADD KEY `kd_alat` (`kd_alat`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`pengembalian_id`),
  ADD UNIQUE KEY `no_trans` (`no_trans`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`alat_id`),
  ADD UNIQUE KEY `kd_alat` (`kd_alat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `karyawan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `pengembalian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `alat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
