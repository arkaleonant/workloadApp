-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 02:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(5555, 'Alif M Sultan', 'alif@gmail.com', 'alifpal', 'TEKNOLOGI', 'Kepala Departemen', 2);

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
(26, 1111),
(26, 2222);

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
(13, 26, '2021-01-29', 'asdwdwa', 0),
(14, 26, '2021-01-29', 'wwwwwwwww', 0);

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
  `end_date` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_task`
--

INSERT INTO `tabel_task` (`id_task`, `divisi`, `task`, `detail_task`, `start_date`, `end_date`, `status`) VALUES
(26, 'TEKNOLOGI', 'membuat aplikasi workload', '                asdasd', '2021-01-30', '2021-01-31', 0);

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
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tabel_task`
--
ALTER TABLE `tabel_task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
