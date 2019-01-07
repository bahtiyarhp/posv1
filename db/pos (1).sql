-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 07, 2019 at 11:30 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kodebarang` varchar(20) NOT NULL,
  `namabarang` varchar(45) DEFAULT NULL,
  `satuan` varchar(5) DEFAULT NULL,
  `hargabeli` int(11) DEFAULT NULL,
  `hargajual` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kodebarang`, `namabarang`, `satuan`, `hargabeli`, `hargajual`, `stok`) VALUES
('1', 'Pepsoden 90 Gr', 'pcs', 5000, 5500, 4),
('2', 'Sabun Lux', 'pcs', 6546, 9500, 6),
('3', 'Rinso 800 Gr', 'pcs', 9000, 10000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `qty` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `barang_kodebarang` varchar(20) NOT NULL,
  `transaksi_nonota` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`qty`, `total`, `barang_kodebarang`, `transaksi_nonota`) VALUES
(1, 5500, '1', 'INV000001'),
(1, 9500, '2', 'INV000002'),
(17, 93500, '1', 'INV000002'),
(3, 28500, '2', 'INV000003'),
(3, 16500, '1', 'INV000003'),
(1, 10000, '3', 'INV000004'),
(4, 22000, '1', 'INV000004'),
(3, 16500, '1', 'INV000004'),
(1, 5500, '1', 'INV000005'),
(1, 9500, '2', 'INV000005');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `hak` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `alias`, `hak`) VALUES
('a', 'a', 'a', 'admin'),
('b', 'b', 'b', 'pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_detailtransaksi`
--

CREATE TABLE `tmp_detailtransaksi` (
  `tmp_nonota` varchar(15) NOT NULL,
  `tmp_kodebarang` varchar(15) NOT NULL,
  `tmp_qty` int(11) NOT NULL,
  `tmp_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `nonota` varchar(10) NOT NULL,
  `namapelanggan` varchar(45) DEFAULT NULL,
  `tanggal` varchar(45) DEFAULT NULL,
  `totalpembelian` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`nonota`, `namapelanggan`, `tanggal`, `totalpembelian`, `bayar`, `kembali`) VALUES
('INV000001', NULL, '2018-12-22', 5500, 10000, 4500),
('INV000002', NULL, '2018-12-22', 103000, 110000, 7000),
('INV000003', NULL, '2018-12-22', 45000, 50000, 5000),
('INV000004', NULL, '2018-12-22', 48500, 50000, 1500),
('INV000005', NULL, '2019-01-07', 15000, 50000, 35000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kodebarang`);

--
-- Indexes for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD KEY `fk_detailtransaksi_barang` (`barang_kodebarang`),
  ADD KEY `fk_detailtransaksi_transaksi1` (`transaksi_nonota`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`nonota`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD CONSTRAINT `fk_detailtransaksi_barang` FOREIGN KEY (`barang_kodebarang`) REFERENCES `barang` (`kodebarang`),
  ADD CONSTRAINT `fk_detailtransaksi_transaksi1` FOREIGN KEY (`transaksi_nonota`) REFERENCES `transaksi` (`nonota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
