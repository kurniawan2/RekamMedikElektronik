-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 06:30 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrme01`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` char(7) NOT NULL,
  `nama_dokter` varchar(50) DEFAULT NULL,
  `nohp_dokter` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `nohp_dokter`) VALUES
('001', 'Dr. Adam', '08224299xxx'),
('002', 'Dr. Alfajri', '081256778xxx'),
('003', 'Dr. Nadya', '081348965xxx');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(11) NOT NULL,
  `jenis_obat` varchar(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis_obat`, `stok`, `harga`) VALUES
(1, 'Amoxilin', 'Antibiotik', 8, 20000),
(2, 'Sagestam', 'Cream', 5, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` char(7) NOT NULL,
  `nama_pasien` varchar(50) DEFAULT NULL,
  `alamat_pasien` varchar(50) DEFAULT NULL,
  `no_rm_pasien` char(20) DEFAULT NULL,
  `nohp_pasien` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `alamat_pasien`, `no_rm_pasien`, `nohp_pasien`) VALUES
('1', 'Fajri', 'Tangerang', '1', '0823xxx'),
('2', 'Kalulu', 'Jl Melati', '2', '0878xxx'),
('3', 'Lemina', 'Jl Petamburan', '3', '0214xxx'),
('4', 'Maruko', 'Kembangan', '4', '0877xxx'),
('5', 'Nuya', 'Ks Tubun', '5', '0853xxx'),
('6', 'nada', 'jalan melati', '6', '0127xxx'),
('7', 'Jemi', 'Rangkasiwa', '7', '0254xxx'),
('8', 'Keny', 'Bunguarsih barat', '8', '0314xxx');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id_poli` int(11) NOT NULL,
  `nama_poli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`) VALUES
(1, 'Poli Mata'),
(2, 'Gigi'),
(3, 'Paru-Paru'),
(4, 'Urologi'),
(5, 'Orthopedy');

-- --------------------------------------------------------

--
-- Table structure for table `rawat_inap`
--

CREATE TABLE `rawat_inap` (
  `id_rawatinap` char(7) NOT NULL,
  `id_dokter` char(7) DEFAULT NULL,
  `idpasien` char(7) DEFAULT NULL,
  `id_poli` int(11) NOT NULL,
  `idruangan` char(7) DEFAULT NULL,
  `tglmasuk` date DEFAULT NULL,
  `tglkeluar` date DEFAULT NULL,
  `catatanmedis` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawat_inap`
--

INSERT INTO `rawat_inap` (`id_rawatinap`, `id_dokter`, `idpasien`, `id_poli`, `idruangan`, `tglmasuk`, `tglkeluar`, `catatanmedis`) VALUES
('1', '001', '1', 1, '1', '2021-10-16', '2021-10-17', 'Kelilipan '),
('2', '001', '1', 1, '1', '2021-10-15', '2021-10-16', 'Mata merah'),
('3', '001', '1', 1, '1', '2021-11-17', '2021-11-22', 'Kunang-kunang'),
('4', '003', '4', 4, '1', '2021-11-16', '2021-11-19', 'Ct scan'),
('5', '003', '5', 5, '1', '2021-11-17', '2021-11-19', 'Patah kaki'),
('7', '002', '7', 5, '1', '2021-12-04', '2022-01-03', 'tulang bengkok'),
('8', '001', '8', 1, '1', '2021-12-21', '2021-12-25', 'iritasi ringan');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` char(7) NOT NULL,
  `nama_ruangan` varchar(30) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `harga`, `status`) VALUES
('1', 'Ekonomi', 1000000, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hak_akses` varchar(20) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_created_at`, `hak_akses`, `is_active`) VALUES
(1, 'admin', 'kasar@gmail.com', 'admin', '2021-11-22 18:46:45', 'Admin', 0),
(3, 'Andara', 'Baru@gmail.com', '990741', '2021-10-25 14:56:29', '', 0),
(34, '12345678', 'Adamkurniawan257@gmail.com', '$2y$10$bpVjAcFFjGCzsVR3DCFB3eEfin/q2.NpWg.Ql9pJhBZ8wzdukbeKS', '2021-12-13 16:30:05', 'Admin', 1),
(35, 'yakitori', 'bpandawa918@gmail.com', '$2y$10$iq504j1L8HEv85E4z4W1yezclUrTnOaEf1uoO6ipug5xwT6cCMi2C', '2021-12-13 20:09:27', 'Admin', 0),
(36, 'jrxy', 'alfajrianggi@gmail.com', '$2y$10$//mNDAJMvXUX3H3k/g4DneYYVdtCYrWrYNlDXdQybPbFvggHDEOcO', '2021-12-13 20:12:44', 'Admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(6, '41519010052@student.mercubuana.ac.id', 'vF3SjDxB4j+Yux8m2A+QM04zdJe6bnobDGBy63ajuMU=', 1639342010),
(8, 'Adamkurniawan257@gmail.com', 'KcihIWsD8v67nSFH3V8WMNphJjsdvDqNU69ACbr5j6c=', 1639412958),
(9, 'bpandawa918@gmail.com', 'ER97Ac3ezuvhBaaiB+g2BzuuJgTkX11AkSz6toYmm+M=', 1639426167),
(10, 'alfajrianggi@gmail.com', '4kVZgsNm5VmTIduRLQTTIg1wczJ47q4kLYOU7xQXqWE=', 1639426364);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD PRIMARY KEY (`id_rawatinap`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `idpasien` (`idpasien`),
  ADD KEY `idruangan` (`idruangan`),
  ADD KEY `id_poli` (`id_poli`) USING BTREE;

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD CONSTRAINT `rawat_inap_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rawat_inap_ibfk_2` FOREIGN KEY (`idpasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rawat_inap_ibfk_3` FOREIGN KEY (`idruangan`) REFERENCES `ruangan` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rawat_inap_ibfk_4` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
