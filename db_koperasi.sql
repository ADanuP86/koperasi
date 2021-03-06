-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 05:56 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `role` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Danu', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(3) NOT NULL,
  `nama_anggota` varchar(25) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `pekerjaan` varchar(15) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status` enum('Aktif','Non-aktif') NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `no_telpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `nik`, `tgl_lahir`, `tempat_lahir`, `pekerjaan`, `tgl_masuk`, `status`, `jenis_kelamin`, `no_telpon`) VALUES
(40, 'Samsul Mualim', '1802142108870004', '1996-08-21', 'Wates', 'Linmas', '2022-01-01', 'Aktif', 'Laki-laki', '08'),
(41, 'Wahid', '1802141507700003', '1970-07-15', 'Wates', 'RT', '2022-01-01', 'Aktif', 'Laki-laki', '0'),
(42, 'Dadang Setiawan', '1802141509760001', '1976-09-15', 'Poncowarno', 'BPK', '2022-01-01', 'Aktif', 'Laki-laki', '085'),
(43, 'Arifin', '1802345678901234', '2001-02-05', 'Metro', 'RT', '2022-04-09', 'Non-aktif', 'Laki-laki', '0852');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` int(3) NOT NULL,
  `tgl_angsur` date NOT NULL,
  `id_pinjaman` int(3) NOT NULL,
  `angsuran_ke` int(3) NOT NULL,
  `besar_angsuran` varchar(11) NOT NULL,
  `idAnggota` int(3) NOT NULL,
  `idAdmin` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_pinjaman`
-- (See below for the actual view)
--
CREATE TABLE `detail_pinjaman` (
`id_pinjaman` int(3)
,`besar_pinjaman` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_simpanan`
-- (See below for the actual view)
--
CREATE TABLE `detail_simpanan` (
`id_simpanan` int(3)
,`besar_simpanan` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pinjaman`
--

CREATE TABLE `jenis_pinjaman` (
  `id_jepin` int(3) NOT NULL,
  `nama_pinjaman` varchar(10) NOT NULL,
  `tgl_input` date NOT NULL,
  `besar_pinjaman` varchar(11) NOT NULL,
  `jasa` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_simpanan`
--

CREATE TABLE `jenis_simpanan` (
  `id_jesim` int(3) NOT NULL,
  `nama_simpanan` varchar(15) NOT NULL,
  `tgl_input` date NOT NULL,
  `besar_simpanan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_simpanan`
--

INSERT INTO `jenis_simpanan` (`id_jesim`, `nama_simpanan`, `tgl_input`, `besar_simpanan`) VALUES
(22, 'Wajib Linmas', '2022-04-09', '50000'),
(23, 'Wajib RT', '2022-04-09', '100000'),
(24, 'Wajib BPK', '2022-04-09', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` int(3) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_jepin` int(3) NOT NULL,
  `tgl_tempo` date NOT NULL,
  `status_pinjaman` enum('Lunas','Belum Lunas') NOT NULL,
  `idanggota` int(3) NOT NULL,
  `idadmin` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id_simpanan` int(3) NOT NULL,
  `tgl_simpan` date NOT NULL,
  `id_jesim` int(3) NOT NULL,
  `id_anggota` int(3) NOT NULL,
  `id_admin` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `tgl_simpan`, `id_jesim`, `id_anggota`, `id_admin`) VALUES
(16, '2022-04-09', 22, 40, 1),
(17, '2022-04-09', 23, 41, 1),
(18, '2022-04-09', 24, 42, 1),
(20, '2022-04-09', 22, 40, 1);

-- --------------------------------------------------------

--
-- Structure for view `detail_pinjaman`
--
DROP TABLE IF EXISTS `detail_pinjaman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_pinjaman`  AS SELECT `a`.`id_pinjaman` AS `id_pinjaman`, `b`.`besar_pinjaman` AS `besar_pinjaman` FROM (`pinjaman` `a` join `jenis_pinjaman` `b`) WHERE `a`.`id_jepin` = `b`.`id_jepin` ;

-- --------------------------------------------------------

--
-- Structure for view `detail_simpanan`
--
DROP TABLE IF EXISTS `detail_simpanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_simpanan`  AS SELECT `a`.`id_simpanan` AS `id_simpanan`, `b`.`besar_simpanan` AS `besar_simpanan` FROM (`simpanan` `a` join `jenis_simpanan` `b`) WHERE `a`.`id_jesim` = `b`.`id_jesim` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`),
  ADD KEY `id_pinjaman` (`id_pinjaman`),
  ADD KEY `idAnggota` (`idAnggota`),
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Indexes for table `jenis_pinjaman`
--
ALTER TABLE `jenis_pinjaman`
  ADD PRIMARY KEY (`id_jepin`);

--
-- Indexes for table `jenis_simpanan`
--
ALTER TABLE `jenis_simpanan`
  ADD PRIMARY KEY (`id_jesim`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `id_jepin` (`id_jepin`),
  ADD KEY `idanggota` (`idanggota`),
  ADD KEY `idadmin` (`idadmin`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id_simpanan`),
  ADD KEY `id_jesim` (`id_jesim`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id_angsuran` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_pinjaman`
--
ALTER TABLE `jenis_pinjaman`
  MODIFY `id_jepin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jenis_simpanan`
--
ALTER TABLE `jenis_simpanan`
  MODIFY `id_jesim` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id_simpanan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `angsuran_ibfk_1` FOREIGN KEY (`idAnggota`) REFERENCES `anggota` (`id_anggota`),
  ADD CONSTRAINT `angsuran_ibfk_2` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `id_pinjaman` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`);

--
-- Constraints for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `id_jepin` FOREIGN KEY (`id_jepin`) REFERENCES `jenis_pinjaman` (`id_jepin`),
  ADD CONSTRAINT `idadmin` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `idanggota` FOREIGN KEY (`idanggota`) REFERENCES `anggota` (`id_anggota`);

--
-- Constraints for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD CONSTRAINT `id_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `id_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`),
  ADD CONSTRAINT `id_jesim` FOREIGN KEY (`id_jesim`) REFERENCES `jenis_simpanan` (`id_jesim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
