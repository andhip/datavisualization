-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 06:32 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datawarehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `lokasi`) VALUES
('C001', 'Jakarta'),
('C002', 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `fakta`
--

CREATE TABLE `fakta` (
  `id_produk` varchar(50) NOT NULL,
  `id_cabang` varchar(50) NOT NULL,
  `id_periode` varchar(50) NOT NULL,
  `qtypenjualan` int(50) NOT NULL,
  `jumlahpenjualan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakta`
--

INSERT INTO `fakta` (`id_produk`, `id_cabang`, `id_periode`, `qtypenjualan`, `jumlahpenjualan`) VALUES
('P002', 'C001', 'Q1', 75, 750000),
('P002', 'C001', 'Q2', 180, 1800000),
('P002', 'C002', 'Q1', 200, 4000000),
('P002', 'C002', 'Q2', 300, 4500000),
('P001', 'C001', 'Q1', 100, 1000000),
('P001', 'C001', 'Q2', 100, 2400000),
('P001', 'C002', 'Q1', 100, 7000000),
('P001', 'C002', 'Q2', 100, 4500000);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_period` varchar(50) NOT NULL,
  `tahun` int(10) NOT NULL,
  `quarter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_period`, `tahun`, `quarter`) VALUES
('Q1', 2019, 'Januari-April'),
('Q2', 2019, 'Mei-Agustus');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(50) NOT NULL,
  `deskripsi_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `deskripsi_produk`) VALUES
('P001', 'Pasta Gigi'),
('P002', 'TV LED');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
