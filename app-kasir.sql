-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 11:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app-kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `idKeranjang` int(11) NOT NULL,
  `PenjualanID` int(50) NOT NULL,
  `ProdukID` varchar(255) NOT NULL,
  `JumlahProduk` int(100) NOT NULL,
  `subtotal` int(255) NOT NULL,
  `stok` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`idKeranjang`, `PenjualanID`, `ProdukID`, `JumlahProduk`, `subtotal`, `stok`) VALUES
(3, 659, '002', 10, 60000, 20),
(5, 483, '003', 20, 110000, 25),
(7, 621, '002', 10, 60000, 10),
(8, 819, '002', 20, 120000, 20),
(9, 583, '002', 10, 60000, 10),
(10, 554, '002', 1, 6000, 1),
(11, 635, '002', 10, 60000, 10),
(12, 585, '002', 10, 60000, 10),
(15, 301, '002', 10, 60000, 10),
(17, 620, '001', 10, 60000, 20),
(19, 637, '001', 10, 60000, 10),
(20, 655, '003', 10, 55000, 30),
(21, 485, '003', 20, 110000, 20),
(22, 668, '001', 5, 30000, 15),
(23, 275, '001', 5, 30000, 10),
(24, 234, '001', 5, 30000, 5),
(25, 189, '002', 5, 30000, 30);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `PelangganID` int(11) NOT NULL,
  `NamaPelanggan` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `NomorTelepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`PelangganID`, `NamaPelanggan`, `Alamat`, `NomorTelepon`) VALUES
(1, 'Nelson', 'Jl. Budaya', '08123456');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `PenjualanID` int(11) NOT NULL,
  `TanggalPenjualan` varchar(100) NOT NULL,
  `TotalHarga` int(100) NOT NULL,
  `NamaPelanggan` varchar(11) NOT NULL,
  `PelangganID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`PenjualanID`, `TanggalPenjualan`, `TotalHarga`, `NamaPelanggan`, `PelangganID`) VALUES
(234, '15 Mar 2024, 17:05:56', 30000, 'Nelson', 1),
(275, '15 Mar 2024, 16:56:28', 30000, 'Nelson', 1),
(301, '15 Mar 2024, 15:36:26', 60000, 'Nelson', 1),
(483, '15 Mar 2024, 10:55:09', 110000, 'Nelson', 1),
(485, '15 Mar 2024, 16:49:17', 110000, 'Nelson', 1),
(554, '15 Mar 2024, 13:53:05', 6000, 'Nelson', 1),
(583, '15 Mar 2024, 13:52:33', 60000, 'Nelson', 1),
(585, '15 Mar 2024, 13:57:35', 60000, 'Nelson', 1),
(620, '15 Mar 2024, 16:39:17', 60000, 'Nelson', 1),
(621, '15 Mar 2024, 13:50:50', 60000, 'Nelson', 1),
(635, '15 Mar 2024, 13:53:49', 60000, 'Nelson', 1),
(637, '15 Mar 2024, 16:48:52', 60000, 'Nelson', 1),
(655, '15 Mar 2024, 16:45:45', 55000, 'Nelson', 1),
(659, '15 Mar 2024, 10:41:18', 60000, 'Nelson', 1),
(668, '15 Mar 2024, 16:50:08', 30000, 'Nelson', 1),
(819, '15 Mar 2024, 13:51:41', 120000, 'Nelson', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idProduk` int(11) NOT NULL,
  `ProdukID` varchar(255) NOT NULL,
  `NamaProduk` varchar(255) NOT NULL,
  `Harga` int(100) NOT NULL,
  `Stok` int(11) NOT NULL,
  `gambarProduk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idProduk`, `ProdukID`, `NamaProduk`, `Harga`, `Stok`, `gambarProduk`) VALUES
(1, '001', 'Chitato', 6000, 0, '65f3b41529fb3.jpg'),
(2, '002', 'Lays', 6000, 30, '65f3b625e8c80.png'),
(3, '003', 'Cheetos', 5500, 20, '65f3b636b5b6e.jpg'),
(4, '004', 'Cimory', 4500, 30, '65f3fa616bd22.jpg'),
(5, '005', 'Milo', 5000, 30, '65f3fa7a26d4c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Petugas','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `username`, `email`, `password`, `level`) VALUES
(2, 'Juneven', 'junevenlee@example.com', '$2y$10$zn2QBTD9r7574PoNiPZoMuZddaJ12qC4hK3XLh3V9psoidGcxPJn2', 'Admin'),
(3, 'Budi', 'budi@example.com', '$2y$10$hUiS3l./xo2xY3b05//3wOI9uc9Cg17lI3PLlkDQYic1iLdzvXBLG', 'Petugas'),
(4, 'Tono', 'tono@example.com', '$2y$10$BBWs6AJrhmmH0bzaFombN.Yk3Fg2hoBSJWiOeXJzqTPXbB3jmH3ga', 'Admin'),
(5, 'Test', 'test@example.com', '$2y$10$6y3FyZFeMPmwsbXiIfPnSO7r54AHAeKYv.Ks.jR4xTQXsokJDkTe6', 'Petugas'),
(8, 'Dwi', 'dwi@example.com', '$2y$10$XDIz0ke5XeyTk2E0M.uWuufWQfWQA6jkLYqVtZZnjw34q9ZkFqTP6', 'Petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`idKeranjang`),
  ADD KEY `ProdukID` (`ProdukID`),
  ADD KEY `PenjualanID` (`PenjualanID`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`PelangganID`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`PenjualanID`),
  ADD KEY `PelangganID` (`PelangganID`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idProduk`),
  ADD UNIQUE KEY `ProdukID` (`ProdukID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `idKeranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `PelangganID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`ProdukID`) REFERENCES `produk` (`ProdukID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`PenjualanID`) REFERENCES `keranjang` (`PenjualanID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`PelangganID`) REFERENCES `pelanggan` (`PelangganID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
