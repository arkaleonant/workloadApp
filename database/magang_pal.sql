-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 10:41 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang_pal`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `hak_akses` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `email`, `password`, `divisi`, `jabatan`, `hak_akses`) VALUES
(1111, 'Dony Rahardian', 'dony@gmail.com', 'donipal', 'TEKNOLOGI', 'Staff', 2),
(2222, 'Achmad Satya Pradana', 'satya@gmail.com', 'satyapal', 'TEKNOLOGI', 'Staff', 2),
(3333, 'Arka Arifiandi Leonanta', 'arka@gmail.com', 'arkapal', 'TEKNOLOGI', 'Kepala Divisi', 1),
(4444, 'Bambang Dwi Nur Rizal', 'bambang@gmail.com', 'bambangpal', 'TEKNOLOGI', 'Staff', 2),
(5555, 'Ajrina Yumna', 'ajrina@gmail.com', 'ajrinapal', 'TEKNOLOGI', 'Kepala Departemen', 2),
(9999, 'admin', 'admin@gmail.com', 'admin', 'admin', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pj`
--

CREATE TABLE `tabel_pj` (
  `id_task` int(11) NOT NULL,
  `nip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pj`
--

INSERT INTO `tabel_pj` (`id_task`, `nip`) VALUES
(1, 1111),
(1, 2222),
(2, 1111),
(3, 1111),
(3, 4444),
(3, 2222);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_plan`
--

CREATE TABLE `tabel_plan` (
  `id_plan` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `date` date NOT NULL,
  `plan` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_plan`
--

INSERT INTO `tabel_plan` (`id_plan`, `id_task`, `date`, `plan`, `status`) VALUES
(1, 1, '2021-02-03', 'Analisa Kebutuhan', 1),
(2, 1, '2021-02-06', 'Rancangan Database', 1),
(3, 1, '2021-02-17', 'Pembuatan UI Website', 1),
(4, 1, '2021-02-23', 'pengujian aplikasi dengan blackbox', 1),
(5, 3, '2021-02-03', 'Pengujian Aplikasi dengan whitebox', 0),
(6, 3, '2021-02-04', 'pengujian aplikasi menggunakan blackbox', 1),
(7, 3, '2021-02-05', 'implementasi aplikasi pada karyawan', 0),
(8, 3, '2021-02-06', 'pembuatan manual book', 0),
(9, 3, '2021-02-09', 'maintenance', 0),
(10, 3, '2021-02-17', 'maintenance 2', 0),
(11, 3, '2021-02-28', 'maintenance 4', 1),
(12, 2, '2021-02-03', 'deesign database', 1),
(13, 3, '2021-03-03', 'manual book', 1),
(14, 3, '2021-03-06', 'video penggunaan aplikasi', 1),
(15, 3, '2021-03-08', 'pengurusan HAKI', 0),
(16, 3, '2021-03-10', 'maintenance 7', 0),
(17, 3, '2021-03-14', 'maintenance 8', 0),
(18, 3, '2021-02-21', 'maintenance 9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_realisasi`
--

CREATE TABLE `tabel_realisasi` (
  `id_plan` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `date` date NOT NULL,
  `plan` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `kendala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_realisasi`
--

INSERT INTO `tabel_realisasi` (`id_plan`, `id_task`, `date`, `plan`, `status`, `bukti`, `kendala`) VALUES
(1, 1, '2021-02-03', 'Analisa Kebutuhan', 1, '', 'membuat design sedikit sulit karena fitur banyak'),
(2, 1, '2021-02-06', 'Rancangan Database', 1, '', 'rancangan atabse sudah terkoneksi semua'),
(3, 1, '2021-02-17', 'Pembuatan UI Website', 1, '', 'pekerjaan selesai'),
(4, 1, '2021-02-23', 'pengujian aplikasi dengan blackbox', 1, '', 'pengerjaan molor karena terhambat aplikasi'),
(6, 3, '2021-02-04', 'pengujian aplikasi menggunakan blackbox', 1, '', 'alur ada yg salah'),
(11, 3, '2021-02-28', 'maintenance 4', 1, '', ''),
(13, 3, '2021-03-03', 'manual book', 1, '', 'membuat design sedikit sulit karena fitur banyak'),
(14, 3, '2021-03-06', 'video penggunaan aplikasi', 1, '', ''),
(12, 2, '2021-02-03', 'deesign database', 1, '', 'membuat design sedikit sulit karena fitur banyak');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_task`
--

CREATE TABLE `tabel_task` (
  `id_task` int(11) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `task` varchar(255) NOT NULL,
  `detail_task` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_task`
--

INSERT INTO `tabel_task` (`id_task`, `divisi`, `task`, `detail_task`, `start_date`, `end_date`, `status`) VALUES
(1, 'TEKNOLOGI', 'Membuat Aplikasi Tabungan Pensiunan Karyawan PT.PAL', 'Aplikasi Ini berupa website tabungan pensiunan karyawan PT.PAL', '2021-02-03', '2021-03-03', 1),
(2, 'TEKNOLOGI', 'Membuat Aplikasi Tabungan Pensiunan Karyawan PT.PELNI', 'asdf', '2021-12-12', '2022-12-12', 0),
(3, 'TEKNOLOGI', 'Membuat Aplikasi Tabungan Pensiunan Karyawan PT.PELINDO', '                asdf', '2021-03-12', '2021-12-12', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tabel_pj`
--
ALTER TABLE `tabel_pj`
  ADD KEY `id_task` (`id_task`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tabel_plan`
--
ALTER TABLE `tabel_plan`
  ADD PRIMARY KEY (`id_plan`),
  ADD KEY `id_task` (`id_task`),
  ADD KEY `id_task_2` (`id_task`);

--
-- Indexes for table `tabel_realisasi`
--
ALTER TABLE `tabel_realisasi`
  ADD KEY `id_plan` (`id_plan`,`id_task`),
  ADD KEY `id_task` (`id_task`);

--
-- Indexes for table `tabel_task`
--
ALTER TABLE `tabel_task`
  ADD PRIMARY KEY (`id_task`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_plan`
--
ALTER TABLE `tabel_plan`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tabel_task`
--
ALTER TABLE `tabel_task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_pj`
--
ALTER TABLE `tabel_pj`
  ADD CONSTRAINT `tabel_pj_ibfk_2` FOREIGN KEY (`id_task`) REFERENCES `tabel_task` (`id_task`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_pj_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_plan`
--
ALTER TABLE `tabel_plan`
  ADD CONSTRAINT `tabel_plan_ibfk_1` FOREIGN KEY (`id_task`) REFERENCES `tabel_task` (`id_task`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_realisasi`
--
ALTER TABLE `tabel_realisasi`
  ADD CONSTRAINT `tabel_realisasi_ibfk_1` FOREIGN KEY (`id_plan`) REFERENCES `tabel_plan` (`id_plan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_realisasi_ibfk_2` FOREIGN KEY (`id_task`) REFERENCES `tabel_task` (`id_task`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
