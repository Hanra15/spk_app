-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2022 at 02:10 AM
-- Server version: 8.0.30
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int NOT NULL,
  `nama_alternatif` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
(2, 'Jalan A'),
(3, 'Jalan B'),
(4, 'Jalan C'),
(5, 'Jalan D'),
(6, 'Jalan E'),
(7, 'Jalan F'),
(8, 'Jalan G');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_saw`
--

CREATE TABLE `bobot_saw` (
  `C1` int DEFAULT NULL,
  `C2` int DEFAULT NULL,
  `C3` int DEFAULT NULL,
  `C4` int DEFAULT NULL,
  `C5` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `bobot_saw`
--

INSERT INTO `bobot_saw` (`C1`, `C2`, `C3`, `C4`, `C5`) VALUES
(5, 4, 4, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` float NOT NULL,
  `ram` float NOT NULL,
  `memori` float NOT NULL,
  `processor` float NOT NULL,
  `kamera` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `nama`, `harga`, `ram`, `memori`, `processor`, `kamera`) VALUES
(2, 'Jalan A', 5, 1750, 300000, 4, 1),
(3, 'Jalan B', 4, 2253, 250000, 5, 2),
(4, 'Jalan C', 3, 2876, 200000, 4, 3),
(5, 'Jalan D', 2, 2987, 225000, 2, 4),
(6, 'Jalan E', 1, 3230, 175000, 5, 4),
(7, 'Jalan F', 3, 2548, 250000, 3, 2),
(8, 'Jalan G', 4, 2564, 275000, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int NOT NULL,
  `id_alternatif` int NOT NULL,
  `nilai` double(11,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `nilai`) VALUES
(2, 2, 0.1685),
(3, 3, 0.1565),
(4, 4, 0.1426),
(5, 5, 0.1079),
(6, 6, 0.1112),
(7, 7, 0.1383),
(8, 8, 0.1750);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_saw`
--

CREATE TABLE `hasil_saw` (
  `id` int DEFAULT NULL,
  `nilai` float(35,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `hasil_saw`
--

INSERT INTO `hasil_saw` (`id`, `nilai`) VALUES
(2, 0.79503),
(3, 0.72950),
(4, 0.68975),
(5, 0.55051),
(6, 0.65000),
(7, 0.63777),
(8, 0.80603);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int NOT NULL,
  `kode_kriteria` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_kriteria` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bobot` int NOT NULL,
  `tipe` enum('cost','benefit') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `bobot`, `tipe`) VALUES
(7, 'Lokasi', 'Lokasi', 5, 'benefit'),
(8, 'Luas Tanah (m2)', 'Luas Tanah (m2)', 4, 'benefit'),
(9, 'Harga Tanah (Ribu/m2)', 'Harga Tanah (Ribu/m2)', 4, 'cost'),
(10, 'Bentuk Lahan', 'Bentuk Lahan', 3, 'benefit'),
(11, 'Resiko Keamanan', 'Resiko Keamanan', 4, 'cost');

-- --------------------------------------------------------

--
-- Table structure for table `opt_alternatif`
--

CREATE TABLE `opt_alternatif` (
  `id` int NOT NULL,
  `id_alternatif` int NOT NULL,
  `id_kriteria` int NOT NULL,
  `id_subkriteria` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel ini digunakan agar kriteria nya bisa dinamis' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `opt_alternatif`
--

INSERT INTO `opt_alternatif` (`id`, `id_alternatif`, `id_kriteria`, `id_subkriteria`) VALUES
(7, 2, 7, 39),
(8, 2, 8, 48),
(9, 2, 9, 56),
(10, 2, 10, 66),
(11, 2, 11, 73),
(12, 3, 7, 40),
(13, 3, 8, 49),
(14, 3, 9, 58),
(15, 3, 10, 67),
(16, 3, 11, 74),
(17, 4, 7, 41),
(18, 4, 8, 50),
(19, 4, 9, 59),
(20, 4, 10, 68),
(21, 4, 11, 75),
(22, 5, 7, 42),
(23, 5, 8, 52),
(24, 5, 9, 60),
(25, 5, 10, 69),
(26, 5, 11, 76),
(27, 6, 7, 43),
(28, 6, 8, 53),
(29, 6, 9, 61),
(30, 6, 10, 70),
(31, 6, 11, 77),
(32, 7, 7, 46),
(33, 7, 8, 54),
(34, 7, 9, 62),
(35, 7, 10, 71),
(36, 7, 11, 78),
(37, 8, 7, 47),
(38, 8, 8, 55),
(39, 8, 9, 65),
(40, 8, 10, 72),
(41, 8, 11, 79);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int NOT NULL,
  `id_kriteria` int NOT NULL,
  `nama_subkriteria` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bobot` int NOT NULL,
  `nilai_sub` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `bobot`, `nilai_sub`) VALUES
(39, 7, '5', 5, '5'),
(40, 7, '4', 4, '4'),
(41, 7, '3', 3, '3'),
(42, 7, '2', 2, '2'),
(43, 7, '1', 1, '1'),
(46, 7, '3', 3, '3'),
(47, 7, '4', 4, '4'),
(48, 8, '1750', 1750, '1750'),
(49, 8, '2253', 2253, '2253'),
(50, 8, '2876', 2876, '2876'),
(52, 8, '2987', 2987, '2987'),
(53, 8, '3230', 3230, '3230'),
(54, 8, '2548', 2548, '2548'),
(55, 8, '2564', 2564, '2564'),
(56, 9, '300000', 300000, '300000'),
(58, 9, '250000', 250000, '250000'),
(59, 9, '200000', 200000, '200000'),
(60, 9, '225000', 225000, '225000'),
(61, 9, '175000', 175000, '175000'),
(62, 9, '250000', 250000, '250000'),
(65, 9, '275000', 275000, '275000'),
(66, 10, '4', 4, '4'),
(67, 10, '5', 5, '5'),
(68, 10, '4', 4, '4'),
(69, 10, '2', 2, '2'),
(70, 10, '5', 5, '5'),
(71, 10, '3', 3, '3'),
(72, 10, '4', 4, '4'),
(73, 11, '1', 1, '1'),
(74, 11, '2', 2, '2'),
(75, 11, '3', 3, '3'),
(76, 11, '4', 4, '4'),
(77, 11, '4', 4, '4'),
(78, 11, '2', 2, '2'),
(79, 11, '1', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `topsis_alternatives`
--

CREATE TABLE `topsis_alternatives` (
  `id_alternative` smallint UNSIGNED NOT NULL,
  `name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `topsis_alternatives`
--

INSERT INTO `topsis_alternatives` (`id_alternative`, `name`) VALUES
(1, 'Jalan A'),
(2, 'Jalan B'),
(3, 'Jalan C'),
(4, 'Jalan D'),
(5, 'Jalan E'),
(6, 'Jalan F'),
(7, 'Jalan G'),
(0, '');

-- --------------------------------------------------------

--
-- Table structure for table `topsis_criterias`
--

CREATE TABLE `topsis_criterias` (
  `id_criteria` tinyint UNSIGNED NOT NULL,
  `criteria` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `weight` float NOT NULL,
  `attribute` set('benefit','cost') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `topsis_criterias`
--

INSERT INTO `topsis_criterias` (`id_criteria`, `criteria`, `weight`, `attribute`) VALUES
(1, 'Lokasi\r\n', 0.25, 'benefit'),
(2, 'Luas Tanah (m2)\r\n', 0.2, 'benefit'),
(3, 'Harga (Ribu/m2)\r\n', 0.2, 'cost'),
(4, 'Bentuk Lahan\r\n', 0.15, 'benefit'),
(5, 'Resiko Keamanan\r\n', 0.2, 'cost');

-- --------------------------------------------------------

--
-- Table structure for table `topsis_evaluations`
--

CREATE TABLE `topsis_evaluations` (
  `id_alternative` smallint UNSIGNED NOT NULL,
  `id_criteria` tinyint UNSIGNED NOT NULL,
  `value` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Dumping data for table `topsis_evaluations`
--

INSERT INTO `topsis_evaluations` (`id_alternative`, `id_criteria`, `value`) VALUES
(1, 1, 5),
(2, 1, 4),
(3, 1, 3),
(4, 1, 2),
(5, 1, 1),
(6, 1, 3),
(7, 1, 4),
(1, 2, 1750),
(2, 2, 2253),
(3, 2, 2876),
(4, 2, 2987),
(5, 2, 3230),
(6, 2, 2548),
(7, 2, 2564),
(1, 3, 300000),
(2, 3, 250000),
(3, 3, 200000),
(4, 3, 225000),
(5, 3, 175000),
(6, 3, 250000),
(7, 3, 275000),
(1, 0, 0),
(2, 0, 0),
(3, 0, 0),
(4, 0, 0),
(5, 0, 0),
(6, 0, 0),
(7, 0, 0),
(1, 4, 4),
(2, 4, 5),
(3, 4, 4),
(4, 4, 2),
(5, 4, 5),
(6, 4, 3),
(7, 4, 4),
(1, 5, 1),
(2, 5, 2),
(3, 5, 3),
(4, 5, 4),
(5, 5, 4),
(6, 5, 2),
(7, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'user', 'ee11cbb19052e40b07aac0ca060c23ee'),
(2, 'Pimpinan', '90973652b88fe07d05a4304f0a945de8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`) USING BTREE;

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`) USING BTREE;

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`) USING BTREE,
  ADD KEY `id_alternatif` (`id_alternatif`) USING BTREE;

--
-- Indexes for table `hasil_saw`
--
ALTER TABLE `hasil_saw`
  ADD KEY `nilai` (`nilai`) USING BTREE;

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`) USING BTREE;

--
-- Indexes for table `opt_alternatif`
--
ALTER TABLE `opt_alternatif`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_alternatif` (`id_alternatif`) USING BTREE,
  ADD KEY `id_kriteria` (`id_kriteria`) USING BTREE,
  ADD KEY `id_subkriteria` (`id_subkriteria`) USING BTREE;

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`) USING BTREE,
  ADD KEY `id_kriteria` (`id_kriteria`) USING BTREE;

--
-- Indexes for table `topsis_alternatives`
--
ALTER TABLE `topsis_alternatives`
  ADD PRIMARY KEY (`id_alternative`) USING BTREE;

--
-- Indexes for table `topsis_criterias`
--
ALTER TABLE `topsis_criterias`
  ADD PRIMARY KEY (`id_criteria`) USING BTREE;

--
-- Indexes for table `topsis_evaluations`
--
ALTER TABLE `topsis_evaluations`
  ADD PRIMARY KEY (`id_alternative`,`id_criteria`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `opt_alternatif`
--
ALTER TABLE `opt_alternatif`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `topsis_alternatives`
--
ALTER TABLE `topsis_alternatives`
  MODIFY `id_alternative` smallint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `opt_alternatif`
--
ALTER TABLE `opt_alternatif`
  ADD CONSTRAINT `opt_alternatif_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE,
  ADD CONSTRAINT `opt_alternatif_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE,
  ADD CONSTRAINT `opt_alternatif_ibfk_3` FOREIGN KEY (`id_subkriteria`) REFERENCES `subkriteria` (`id_subkriteria`) ON DELETE SET NULL;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
