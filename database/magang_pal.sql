-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2021 at 07:02 PM
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
(1234, 'Achmad Satya Pradana', 'satya@gmail.com', 'satyapal', 'TEKNOLOGI', 'Staff', 2),
(12345, 'Aditya Panca Putra', 'adit@gmail.com', 'aditpal', 'HCM', 'Kepala Divisi', 1),
(123456, 'Agik Fendih', 'agik@gmail.com', 'agikpal', 'PERENCANAAN', 'Kepala Divisi', 1),
(12345678, 'Arka Arifiandi Leonanta', 'arka@gmail.com', 'arkapal', 'TEKNOLOGI', 'Kepala Divisi', 1),
(123456789, 'Bambang Dwi Nur Rizal', 'bambang@gmail.com', 'bambangpal', 'HCM', 'Staff', 2),
(1234567890, 'Alif M Sultan', 'alif@gmail.com', 'alifpal', 'PERENCANAAN', 'Kepala Departemen', 2);

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
(11, 1234);

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
(4, 11, '2021-01-26', 'membuat analisa kebutuhan', 1),
(5, 11, '2021-02-01', 'merancang database', 1),
(6, 11, '2021-02-10', 'Membuat UI aplikasi', 1),
(7, 11, '2021-02-20', 'membangun fungsi aplikasi', 0),
(8, 11, '2021-03-01', 'pengujian blackbox dan whitebox', 0),
(9, 11, '2021-03-10', 'maintenance', 0),
(10, 10, '2021-01-26', 'membuat analisa kebutuhan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_realisasi`
--

CREATE TABLE `tabel_realisasi` (
  `id_task` int(11) NOT NULL,
  `date` date NOT NULL,
  `presentase` int(2) NOT NULL,
  `plan` varchar(255) NOT NULL,
  `kendala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_task`
--

INSERT INTO `tabel_task` (`id_task`, `divisi`, `task`, `detail_task`, `start_date`, `end_date`) VALUES
(7, 'TEKNOLOGI', 'membuat aplikasi workload', 'pemebrian tugas melalui sistem', '2021-01-11', '2021-01-31'),
(8, 'PERENCANAAN', 'membuat perencanaan budget proyek kapal perang', 'melakukan analisa kebutuhan dan memberikan dana yang efiien bagi project', '2021-01-12', '2021-01-30'),
(9, 'TEKNOLOGI', 'membuat startup', 'pemberian task melalui web', '2021-01-11', '2021-01-31'),
(10, 'TEKNOLOGI', 'membuat flowchart workload', 'pengawas project', '2021-01-11', '2021-01-31'),
(11, 'TEKNOLOGI', 'Membuat Aplikasi Tabungan Pensiunan Karyawan PT.PAL', 'Aplikasi Ini digunakan untuk melihat besaran tabungan pensiunan dari karyawan PT.PAL, berupa sistem infromasi yang dapat melihat fitur - fitur dari website tersebut', '2021-01-13', '2021-04-13');

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
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tabel_task`
--
ALTER TABLE `tabel_task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
