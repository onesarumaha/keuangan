-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 12:21 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` text NOT NULL,
  `jenis_transaksi` enum('Pendapatan','Pengeluaran') NOT NULL,
  `status` enum('Sudah','Belum') NOT NULL,
  `pendapatan` varchar(20) NOT NULL,
  `pengeluaran` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_transaksi`
--

INSERT INTO `data_transaksi` (`id_transaksi`, `nama`, `tgl`, `keterangan`, `jenis_transaksi`, `status`, `pendapatan`, `pengeluaran`, `kategori`, `gambar`) VALUES
(103, 'Bagian Keuangan', '2020-08-19', 'Pencetakan Banner', 'Pendapatan', 'Sudah', '85000', ' ', 'Pendapatan Usaha', 'Bagian Keuangan'),
(104, 'Bagian Keuangan', '2020-08-20', 'Penjualan Kertas  Kanvas', 'Pendapatan', 'Sudah', '300000', ' ', 'Penjualan Barang', 'Bagian Keuangan'),
(105, 'Bagian Keuangan', '2020-08-21', 'Pembayaran tagihan air POM', 'Pengeluaran', 'Sudah', ' ', '300000', 'Tagihan Air', 'Bagian Keuangan'),
(121, 'intan', '2020-08-21', 'Pencetakan Banner', 'Pendapatan', 'Sudah', '100000', '', 'Pendapatan Usaha', 'IMG-20200525-WA0000.jpg'),
(122, 'intan', '2020-08-21', 'Tagihan Listrik', 'Pengeluaran', 'Sudah', '', '100000', 'Pembayaran Listrik', 'img-09.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `jk`, `tgl_lahir`, `password`, `nama`, `level`) VALUES
(4, 'Bagian Keuangan', 'Wanita', '1998-11-11', '$2y$10$U0/QhaY/YiePjXd.uuQaWOM3G4vujAjSSTW9twjatiTlM2JWTjEsS', 'Sari Putri', 'Bagian Keuangan'),
(5, 'Manejer', 'Pria', '1978-11-07', '$2y$10$a8mStCWNCkJUUjI0J5mVIui7pOfSxgl7GwGrz.OiEZ5G/i.jhSplu', 'Indra', 'Manejer'),
(37, 'angel', 'Wanita', '1996-10-09', '$2y$10$4qQRw1ZBtR1XBMyx1Pf3XO9nJJ2slY1D44LoLQ1/Ee.e3robUit7.', 'Angel Junes', 'Karyawan'),
(38, 'intan', 'Wanita', '1997-10-09', '$2y$10$USaXLYkmNFlvQCDn21dWxOlBZgjKv6JLVaC8UebbmUnPwBUCBGSXi', 'Intan Fitriah', 'Karyawan'),
(39, 'indri', 'Wanita', '1998-10-05', '$2y$10$LVZLuA/hrP3KbQO3U4wm8eiKaFl72aEghlHAbM7faD4hT6Z8sfeW.', 'Indri Saputri', 'Karyawan'),
(40, 'dodi', 'Pria', '1998-10-05', '$2y$10$5M6Awl8NQHWKXpj4IOXaC.gFrBlY14tqGz.qgns/3tclGiDX4yh2O', 'Dody Sarumaha', 'Karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
