-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 11:23 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berkalanew`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'admin', 'Hendra', 1),
(2, 'admin2', 'admin2', 'Joe', 2),
(4, 'ddd', 'aaa', 'fea', 2),
(5, 'gerger', 'grerg', 'gregr', 2);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `isi_feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `isi_feedback`) VALUES
(1, 'tes'),
(2, 'jklkjl');

-- --------------------------------------------------------

--
-- Table structure for table `tkerja`
--

CREATE TABLE `tkerja` (
  `id_tkerja` int(10) NOT NULL,
  `id_kpj` varchar(11) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `password` varchar(20) NOT NULL,
  `perusahaan` varchar(55) NOT NULL,
  `no_penetapan` varchar(55) NOT NULL,
  `waris` varchar(55) NOT NULL,
  `hubungan` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tkerja`
--

INSERT INTO `tkerja` (`id_tkerja`, `id_kpj`, `nama`, `password`, `perusahaan`, `no_penetapan`, `waris`, `hubungan`, `nik`, `tgl_lahir`, `telepon`) VALUES
(1, '08008265087', 'ABDUL RASIB DOLOT', 'user', 'JJ0P5748 - BANYU ENERGI UTAMA', 'JPT00042018KL18041302734942', 'RINI RAUPA', 'ISTRI', '7174047004700001', '1970-04-30', '082393581831'),
(191, 'abbb', 'a', '', 'a', 'a', 'a', '', '', '0000-00-00', ''),
(192, 'e', '', '', '', '', '', '', '', '0000-00-00', ''),
(193, 'xsa', 's', '', 'ko', 'ko', 'ko', 'ko', 'kok', '2019-11-06', '0878');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(12) NOT NULL,
  `id_tkerja` int(5) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jumlah` int(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_tkerja`, `jenis`, `bulan`, `tahun`, `tgl_bayar`, `jumlah`, `keterangan`) VALUES
('201911180001', 1, 'JKM', 1, 2019, '2019-11-12', 20000, 'Sudah'),
('201911180002', 1, 'JHT', 12, 2019, '0000-00-00', 20000, ''),
('201911180003', 1, 'JKK', 12, 2019, '2019-11-18', 20000, 'Sudah'),
('201911180004', 1, 'JHT', 12, 2019, '2019-11-27', 10000, 'sss'),
('201911180005', 1, 'JHT', 2, 2, '2019-11-19', 2, '2'),
('201911180006', 1, 'JKK', 9, 2019, '2019-11-21', 90000, 'wer'),
('201911180007', 1, 'JP', 1, 2019, '2019-11-13', 80000, 'qqq'),
('201911180008', 1, 'JP', 3, 2019, '2019-11-17', 15000, 'rr'),
('201911190001', 1, 'JKM', 3, 2019, '2019-11-19', 10000, 'aaa'),
('201911200001', 1, 'JKK', 3, 2019, '2019-11-05', 100000, 'Transfer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `tkerja`
--
ALTER TABLE `tkerja`
  ADD PRIMARY KEY (`id_tkerja`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tkerja`
--
ALTER TABLE `tkerja`
  MODIFY `id_tkerja` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
