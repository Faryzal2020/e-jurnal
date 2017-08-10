-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2017 at 05:48 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkepegawaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `id_aktivitas` int(11) NOT NULL,
  `nip` varchar(12) NOT NULL,
  `volume` int(11) NOT NULL,
  `jenis_output` varchar(50) NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `tanggal_jurnal` date NOT NULL,
  `jenis_aktivitas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `id_aktivitas`, `nip`, `volume`, `jenis_output`, `waktu_mulai`, `waktu_selesai`, `tanggal_jurnal`, `jenis_aktivitas`) VALUES
(1, 5, '012f', 4, 'naskah', '2017-08-02 09:00:00', '2017-08-02 16:15:00', '2017-08-02', 'Umum'),
(2, 100, '010r', 7, 'laporan per 1x survey', '2017-08-01 09:00:00', '2017-08-01 16:00:00', '2017-08-01', 'Umum'),
(3, 321, '012f', 1, 'laporan', '2017-08-08 08:00:00', '2017-08-08 09:00:00', '2017-08-08', 'SKP'),
(4, 1, '010r', 1, 'lembar', '2017-08-08 09:00:00', '2017-08-08 16:00:00', '2017-08-08', 'SKP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
