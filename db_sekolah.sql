-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2021 at 04:23 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'faliz', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(10) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `berita` text,
  `tanggal` date DEFAULT NULL,
  `gambar` varchar(144) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id_buku_tamu` int(4) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `company` varchar(35) DEFAULT NULL,
  `telepon` varchar(12) DEFAULT NULL,
  `subjek` varchar(30) DEFAULT NULL,
  `pesan` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id_buku_tamu`, `nama`, `email`, `company`, `telepon`, `subjek`, `pesan`) VALUES
(1, 'afif', 'afif_123@yahoo.co.id', 'lampung', '085228883437', 'admin', 'test pesan buku tamu');

-- --------------------------------------------------------

--
-- Table structure for table `datasmp`
--

CREATE TABLE `datasmp` (
  `id_smp` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `npsn` int(20) NOT NULL,
  `akreditasi` varchar(10) NOT NULL,
  `kpl_sekolah` varchar(50) NOT NULL,
  `jml_guru` int(20) NOT NULL,
  `jml_murid` int(100) NOT NULL,
  `jml_kelas` int(20) NOT NULL,
  `jml_perpus` int(20) NOT NULL,
  `jml_uks` int(20) NOT NULL,
  `jml_lab` int(20) NOT NULL,
  `tlp` int(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datasmp`
--

INSERT INTO `datasmp` (`id_smp`, `nama`, `alamat`, `npsn`, `akreditasi`, `kpl_sekolah`, `jml_guru`, `jml_murid`, `jml_kelas`, `jml_perpus`, `jml_uks`, `jml_lab`, `tlp`, `email`, `website`, `foto`) VALUES
(1, 'SMP NEGERI 09 SEMARANG', '\"Jl. Sendang Utara No.2, Gemah, Kec. Pedurungan, \r\nKota Semarang, Jawa Tengah 50246\"\r\n', 20328854, 'A', ' Erna Listyati', 41, 831, 26, 1, 0, 5, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` enum('Negeri','Swasta','') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peta_smp`
--

CREATE TABLE `peta_smp` (
  `id_smp` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `lat` double NOT NULL,
  `long` double NOT NULL,
  `alamat` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id` int(11) NOT NULL,
  `lokasi_awal` varchar(255) NOT NULL,
  `lokasi_tujuan` varchar(255) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `km` varchar(100) NOT NULL,
  `id_lokasi_awal` int(4) UNSIGNED NOT NULL,
  `id_lokasi_tujuan` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rute_smp`
--

CREATE TABLE `rute_smp` (
  `id_rute` int(4) NOT NULL,
  `lokasi_awal` varchar(350) DEFAULT NULL,
  `lokasi_tujuan` varchar(350) DEFAULT NULL,
  `lat` text,
  `lng` text,
  `alamat` text,
  `waktu` varchar(100) DEFAULT NULL,
  `km` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `datasmp`
--
ALTER TABLE `datasmp`
  ADD PRIMARY KEY (`id_smp`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lokasi_awal` (`id_lokasi_awal`),
  ADD KEY `id_lokasi_tujuan` (`id_lokasi_tujuan`),
  ADD KEY `id_lokasi_tujuan_2` (`id_lokasi_tujuan`);

--
-- Indexes for table `rute_smp`
--
ALTER TABLE `rute_smp`
  ADD PRIMARY KEY (`id_rute`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `rute_smp`
--
ALTER TABLE `rute_smp`
  MODIFY `id_rute` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
