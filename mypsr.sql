-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2020 at 12:33 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypsr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `nama`, `alamat`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Abdul Mukti Nurrohman', 'Tuban'),
(2, 'icang', '827ccb0eea8a706c4c34a16891f84e7b', 'faizal', 'Sampang'),
(3, 'Raytandia', '827ccb0eea8a706c4c34a16891f84e7b', 'Ray', '');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_harian`
--

CREATE TABLE `laporan_harian` (
  `id_laporan` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `nama_komoditas` varchar(100) NOT NULL,
  `harga_pangan` varchar(100) NOT NULL,
  `tanggal_laporan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_harian`
--

INSERT INTO `laporan_harian` (`id_laporan`, `id_satuan`, `nama_komoditas`, `harga_pangan`, `tanggal_laporan`) VALUES
(5, 1, 'Beras', '11500', '2020-07-09 19:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `pedagang`
--

CREATE TABLE `pedagang` (
  `id_pedagang` int(11) NOT NULL,
  `id_stan` int(11) NOT NULL,
  `noip` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_handphone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pedagang`
--

INSERT INTO `pedagang` (`id_pedagang`, `id_stan`, `noip`, `nik`, `nama`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_handphone`) VALUES
(2, 1, '1234', '2345', 'Saiful', 'Jalan Raya Telang', 'Laki - Laki', 'Tuban', '1997-10-17', '088226239953');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `NIP` varchar(100) NOT NULL,
  `NIK` varchar(100) NOT NULL,
  `NPWP` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `NIP`, `NIK`, `NPWP`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_telepone`) VALUES
(0, '123', '1245', '123455', 'Abdul Mukti', 'Tuban', '1998-04-14', 'Laki - Laki', 'Sadang', '088217902768');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `satuan`) VALUES
(1, 'Kilogram (Kg)'),
(2, 'Liter (l)');

-- --------------------------------------------------------

--
-- Table structure for table `stan_pasar`
--

CREATE TABLE `stan_pasar` (
  `id_stan` int(11) NOT NULL,
  `nomor_stan` varchar(100) NOT NULL,
  `lokasi_stan` varchar(100) NOT NULL,
  `biaya_stan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stan_pasar`
--

INSERT INTO `stan_pasar` (`id_stan`, `nomor_stan`, `lokasi_stan`, `biaya_stan`) VALUES
(1, 'A.001', 'BLOK A', '2000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `laporan_harian`
--
ALTER TABLE `laporan_harian`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `Satuan` (`id_satuan`);

--
-- Indexes for table `pedagang`
--
ALTER TABLE `pedagang`
  ADD PRIMARY KEY (`id_pedagang`),
  ADD KEY `nomor_stan` (`id_stan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `stan_pasar`
--
ALTER TABLE `stan_pasar`
  ADD PRIMARY KEY (`id_stan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laporan_harian`
--
ALTER TABLE `laporan_harian`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pedagang`
--
ALTER TABLE `pedagang`
  MODIFY `id_pedagang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stan_pasar`
--
ALTER TABLE `stan_pasar`
  MODIFY `id_stan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan_harian`
--
ALTER TABLE `laporan_harian`
  ADD CONSTRAINT `Satuan` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pedagang`
--
ALTER TABLE `pedagang`
  ADD CONSTRAINT `nomor_stan` FOREIGN KEY (`id_stan`) REFERENCES `stan_pasar` (`id_stan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
