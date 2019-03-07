-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2017 at 10:27 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama_barang` varchar(45) NOT NULL,
  `harga` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `kategori_id`, `nama_barang`, `harga`) VALUES
(1, 1, 'mie sedap kari ayam', '2000'),
(4, 1, 'mie sedap goreng', '1500'),
(5, 1, 'mie soto ayam', '2300'),
(6, 2, 'minuman ringan', '3000'),
(7, 1, 'mie g enak', '4000'),
(8, 6, 'nokia x400', '1300'),
(9, 9, 'tas kulit', '400000'),
(10, 9, 'tas kertas', '300000'),
(12, 13, 'Kecap Manis', '2000'),
(13, 1, 'mie rendang', '8000'),
(24, 1, 'mie rendang', '20000'),
(25, 1, 'mie bibi', '2000'),
(26, 1, 'mie bibi', '2000'),
(27, 1, 'mie dobol', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`kategori_id`, `nama_kategori`) VALUES
(1, 'mie instan'),
(2, 'minyak'),
(6, 'handphone'),
(8, 'sepatu'),
(9, 'Misc'),
(13, 'Campuran');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `nama_lengkap` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `last_login` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `nama_lengkap`, `username`, `password`, `last_login`) VALUES
(4, 'Ali Akbar', 'akbar', '4f033a0a2bf2fe0b68800a3079545cd1', '2016-05-23'),
(5, 'Siti Komariyah', 'sitikom', '202cb962ac59075b964b07152d234b70', '2016-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_barang`
--

CREATE TABLE `pegawai_barang` (
  `id_pegawai` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai_barang`
--

INSERT INTO `pegawai_barang` (`id_pegawai`, `id_barang`) VALUES
(4, 7),
(4, 12),
(4, 27),
(5, 7),
(5, 8),
(5, 10),
(5, 24);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `promo_id` int(11) NOT NULL,
  `nama_promo` varchar(225) NOT NULL,
  `date_promo` date NOT NULL,
  `besar_diskon` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`promo_id`, `nama_promo`, `date_promo`, `besar_diskon`) VALUES
(1, 'diskon natal', '2017-12-31', 25.00),
(2, 'diskon tahun  baru', '2018-01-07', 35.00),
(3, 'Promo Diskon', '2017-12-08', 0.00),
(4, 'Lebaran Yuk', '2017-12-30', 0.00),
(5, 'Hari Nyepi', '2017-12-29', 1.00),
(6, 'promo hari waisak', '2017-12-27', 0.00),
(7, 'promo idul adha', '2017-12-25', 0.40);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `pegawai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `tanggal_transaksi`, `pegawai_id`) VALUES
(5, '2014-07-17', 2),
(6, '2014-07-17', 2),
(7, '2014-07-18', 1),
(8, '2016-05-23', 5);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `t_detail_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `promo` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '1 = sudah diproses, 0 = belum diproses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`t_detail_id`, `barang_id`, `qty`, `transaksi_id`, `promo`, `harga`, `status`) VALUES
(8, 1, 4, 5, 1, 2000, '1'),
(9, 6, 3, 5, 2, 3000, '1'),
(38, 7, 4, 0, 7, 4000, '0'),
(39, 13, 5, 0, 7, 8000, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD UNIQUE KEY `id_barang_UNIQUE` (`barang_id`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`kategori_id`),
  ADD UNIQUE KEY `kategori_id_UNIQUE` (`kategori_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`),
  ADD UNIQUE KEY `id_pegawai_UNIQUE` (`pegawai_id`),
  ADD UNIQUE KEY `password_UNIQUE` (`password`);

--
-- Indexes for table `pegawai_barang`
--
ALTER TABLE `pegawai_barang`
  ADD PRIMARY KEY (`id_pegawai`,`id_barang`),
  ADD KEY `pegawai_barang_ibfk_2` (`id_barang`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`t_detail_id`),
  ADD UNIQUE KEY `t_detail_id_UNIQUE` (`t_detail_id`),
  ADD KEY `promo` (`promo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `t_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai_barang`
--
ALTER TABLE `pegawai_barang`
  ADD CONSTRAINT `pegawai_barang_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`pegawai_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_barang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `fk_promo` FOREIGN KEY (`promo`) REFERENCES `promo` (`promo_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
