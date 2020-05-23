-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 09:46 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

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
-- Table structure for table `karyawan`
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
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`karyawan_id`, `nik`, `nama`, `gender`, `phone`, `alamat`, `divisi`, `status`) VALUES
(1, '00001', 'dimas', 'L', '02100001', 'jakarta', 'admin', 'karyawan'),
(2, '00002', 'ayu', 'P', '02100002', 'jakarta', 'admin', 'karyawan'),
(3, '00003', 'jaka', 'L', '02100003', 'jakarta', 'mekanik', 'kontrak'),
(4, '00004', 'naufal', 'L', '02100004', 'jakarta', 'mekanik', 'kontrak'),
(5, '00005', 'asep', 'L', '02100005', 'jakarta', 'mekanik', 'kontrak');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `alat_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text,
  `tgl_beli` date NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`alat_id`, `nama`, `harga`, `keterangan`, `tgl_beli`, `stok`) VALUES
(1, 'alat1', 10000, 'alat1', '2020-01-01', 87),
(2, 'alat2', 10000, 'alat2', '2020-01-01', 97),
(3, 'alat3', 10000, 'alat3', '2020-01-01', 100),
(4, 'alat4', 10000, 'alat4', '2020-01-01', 98),
(5, 'alat5', 10000, 'alat5', '2020-01-01', 100),
(6, 'alat6', 10000, 'alat6', '2020-01-01', 100),
(7, 'alat7', 10000, 'alat7', '2020-01-01', 97),
(8, 'alat8', 10000, 'alat8', '2020-01-01', 100),
(9, 'alat9', 10000, 'alat9', '2020-01-01', 100),
(10, 'alat10', 10000, 'alat10', '2020-01-01', 100);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail_peminjaman`
--

CREATE TABLE `transaksi_detail_peminjaman` (
  `no_trans` varchar(30) NOT NULL,
  `alat_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `transaksi_detail_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `pinjam` AFTER INSERT ON `transaksi_detail_peminjaman` FOR EACH ROW UPDATE tools SET tools.stok = tools.stok - new.qty
WHERE alat_id = new.alat_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail_pengembalian`
--

CREATE TABLE `transaksi_detail_pengembalian` (
  `no_trans` varchar(30) NOT NULL,
  `alat_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `transaksi_detail_pengembalian`
--
DELIMITER $$
CREATE TRIGGER `kembali` AFTER INSERT ON `transaksi_detail_pengembalian` FOR EACH ROW UPDATE tools SET tools.stok = tools.stok + new.qty
WHERE alat_id = new.alat_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_header`
--

CREATE TABLE `transaksi_header` (
  `no_trans` varchar(30) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `foto_pinjam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_history`
--

CREATE TABLE `transaksi_history` (
  `no_trans` varchar(30) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `alat_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `foto_pinjam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `alamat`, `level`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'dimas', 'jakarta', '1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi_kembali`
-- (See below for the actual view)
--
CREATE TABLE `v_transaksi_kembali` (
`no_trans` varchar(30)
,`karyawan_id` int(11)
,`nama_karyawan` varchar(100)
,`tanggal_pinjam` date
,`tanggal_kembali` date
,`alat_id` int(11)
,`nama_tools` varchar(100)
,`qty` int(11)
,`keterangan` varchar(255)
,`foto_pinjam` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi_pinjam`
-- (See below for the actual view)
--
CREATE TABLE `v_transaksi_pinjam` (
`no_trans` varchar(30)
,`karyawan_id` int(11)
,`nama_karyawan` varchar(100)
,`tanggal_pinjam` date
,`alat_id` int(11)
,`nama_tools` varchar(100)
,`qty` int(11)
,`keterangan` varchar(255)
,`foto_pinjam` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi_process`
-- (See below for the actual view)
--
CREATE TABLE `v_transaksi_process` (
`no_trans` varchar(30)
,`karyawan_id` int(11)
,`nama_karyawan` varchar(100)
,`tanggal_pinjam` date
,`alat_id` int(11)
,`nama_tools` varchar(100)
,`qty` int(11)
,`keterangan` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi_kembali`
--
DROP TABLE IF EXISTS `v_transaksi_kembali`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi_kembali`  AS  select `transaksi_history`.`no_trans` AS `no_trans`,`transaksi_history`.`karyawan_id` AS `karyawan_id`,`karyawan`.`nama` AS `nama_karyawan`,`transaksi_history`.`tanggal_pinjam` AS `tanggal_pinjam`,`transaksi_history`.`tanggal_kembali` AS `tanggal_kembali`,`transaksi_history`.`alat_id` AS `alat_id`,`tools`.`nama` AS `nama_tools`,`transaksi_history`.`qty` AS `qty`,`transaksi_history`.`keterangan` AS `keterangan`,`transaksi_history`.`foto_pinjam` AS `foto_pinjam` from ((`transaksi_history` join `karyawan` on((`transaksi_history`.`karyawan_id` = `karyawan`.`karyawan_id`))) join `tools` on((`transaksi_history`.`alat_id` = `tools`.`alat_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi_pinjam`
--
DROP TABLE IF EXISTS `v_transaksi_pinjam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi_pinjam`  AS  select `transaksi_header`.`no_trans` AS `no_trans`,`transaksi_header`.`karyawan_id` AS `karyawan_id`,`karyawan`.`nama` AS `nama_karyawan`,`transaksi_header`.`tanggal_pinjam` AS `tanggal_pinjam`,`transaksi_detail_peminjaman`.`alat_id` AS `alat_id`,`tools`.`nama` AS `nama_tools`,`transaksi_detail_peminjaman`.`qty` AS `qty`,`transaksi_detail_peminjaman`.`keterangan` AS `keterangan`,`transaksi_header`.`foto_pinjam` AS `foto_pinjam` from (((`transaksi_header` join `transaksi_detail_peminjaman` on((`transaksi_header`.`no_trans` = `transaksi_detail_peminjaman`.`no_trans`))) join `karyawan` on((`transaksi_header`.`karyawan_id` = `karyawan`.`karyawan_id`))) join `tools` on((`transaksi_detail_peminjaman`.`alat_id` = `tools`.`alat_id`))) where (not(`transaksi_header`.`no_trans` in (select `transaksi_history`.`no_trans` from `transaksi_history`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi_process`
--
DROP TABLE IF EXISTS `v_transaksi_process`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi_process`  AS  select `v_transaksi_pinjam`.`no_trans` AS `no_trans`,`v_transaksi_pinjam`.`karyawan_id` AS `karyawan_id`,`v_transaksi_pinjam`.`nama_karyawan` AS `nama_karyawan`,`v_transaksi_pinjam`.`tanggal_pinjam` AS `tanggal_pinjam`,`v_transaksi_pinjam`.`alat_id` AS `alat_id`,`v_transaksi_pinjam`.`nama_tools` AS `nama_tools`,`v_transaksi_pinjam`.`qty` AS `qty`,`v_transaksi_pinjam`.`keterangan` AS `keterangan` from `v_transaksi_pinjam` where (not(`v_transaksi_pinjam`.`no_trans` in (select `v_transaksi_kembali`.`no_trans` from `v_transaksi_kembali`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`karyawan_id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`alat_id`);

--
-- Indexes for table `transaksi_detail_peminjaman`
--
ALTER TABLE `transaksi_detail_peminjaman`
  ADD KEY `fk_trans_pinjam` (`no_trans`),
  ADD KEY `fk_tools_pinjam` (`alat_id`);

--
-- Indexes for table `transaksi_detail_pengembalian`
--
ALTER TABLE `transaksi_detail_pengembalian`
  ADD KEY `fk_trans_kembali` (`no_trans`),
  ADD KEY `fk_tools_kembali` (`alat_id`);

--
-- Indexes for table `transaksi_header`
--
ALTER TABLE `transaksi_header`
  ADD PRIMARY KEY (`no_trans`),
  ADD KEY `FK_karyawan` (`karyawan_id`);

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
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `alat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi_detail_peminjaman`
--
ALTER TABLE `transaksi_detail_peminjaman`
  ADD CONSTRAINT `fk_tools_pinjam` FOREIGN KEY (`alat_id`) REFERENCES `tools` (`alat_id`),
  ADD CONSTRAINT `fk_trans_pinjam` FOREIGN KEY (`no_trans`) REFERENCES `transaksi_header` (`no_trans`);

--
-- Constraints for table `transaksi_detail_pengembalian`
--
ALTER TABLE `transaksi_detail_pengembalian`
  ADD CONSTRAINT `fk_tools_kembali` FOREIGN KEY (`alat_id`) REFERENCES `tools` (`alat_id`),
  ADD CONSTRAINT `fk_trans_kembali` FOREIGN KEY (`no_trans`) REFERENCES `transaksi_header` (`no_trans`);

--
-- Constraints for table `transaksi_header`
--
ALTER TABLE `transaksi_header`
  ADD CONSTRAINT `FK_karyawan` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`karyawan_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
