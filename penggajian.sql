-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 03:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(120) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `tj_transport` varchar(50) NOT NULL,
  `uang_makan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tj_transport`, `uang_makan`) VALUES
(5, 'Tour Consultant', '5000000', '150000', '50000'),
(7, 'Travel IT ', '8000000', '150000', '50000'),
(9, 'Tour Leader', '6000000', '150000', '50000'),
(10, 'Tour Guide', '4000000', '150000', '50000'),
(11, 'Admin', '6000000', '150000', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `data_kehadiran`
--

CREATE TABLE `data_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alpha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kehadiran`
--

INSERT INTO `data_kehadiran` (`id_kehadiran`, `bulan`, `nik`, `nama_pegawai`, `jenis_kelamin`, `nama_jabatan`, `hadir`, `sakit`, `alpha`) VALUES
(25, '122023', '3310092287446576', 'Anna Mandella', 'Perempuan', 'Admin', 23, 2, 1),
(26, '122023', '3224455006987568', 'Annie Lauren', 'Perempuan', 'Tour Consultant', 19, 5, 2),
(27, '122023', '3112212334421123', 'Arji Manda', 'Laki-laki', 'Tour Guide', 24, 1, 1),
(28, '122023', '3512345235746976', 'Bambang Ackerman', 'Laki-laki', 'Travel IT ', 24, 2, 0),
(29, '122023', '3405782093890135', 'Edwardo Davinsi', 'Laki-laki', 'Admin', 23, 3, 0),
(30, '122023', '3323344335546776', 'Excel Pratama', 'Laki-laki', 'Travel IT ', 20, 4, 2),
(31, '122023', '3509988576432345', 'Fahmi Andrian', 'Laki-laki', 'Tour Leader', 26, 0, 0),
(32, '122023', '3609900112234123', 'Grishan Peter', 'Laki-laki', 'Tour Guide', 23, 1, 2),
(33, '122023', '3662261389213786', 'Neira Sasmita', 'Perempuan', 'Tour Leader', 25, 0, 1),
(34, '122023', '3009412211332234', 'Nisa Arbani', 'Perempuan', 'Tour Consultant', 24, 0, 2),
(35, '012024', '3310092287446576', 'Anna Mandella', 'Perempuan', 'Tour Consultant', 17, 6, 3),
(36, '012024', '3224455006987568', 'Annie Lauren', 'Perempuan', 'Tour Consultant', 24, 1, 1),
(37, '012024', '3112212334421123', 'Arji Manda', 'Laki-laki', 'Tour Guide', 20, 5, 1),
(38, '012024', '3512345235746976', 'Bambang Ackerman', 'Laki-laki', 'Travel IT ', 26, 0, 0),
(39, '012024', '3405782093890135', 'Edwardo Davinsi', 'Laki-laki', 'Admin', 24, 1, 1),
(40, '012024', '3323344335546776', 'Excel Pratama Suratmajda', 'Laki-laki', 'Travel IT ', 23, 2, 1),
(41, '012024', '3509988576432345', 'Fahmi Andrian', 'Laki-laki', 'Tour Leader', 20, 4, 2),
(42, '012024', '3609900112234123', 'Grishan Peter', 'Laki-laki', 'Tour Guide', 23, 0, 3),
(43, '012024', '3662261389213786', 'Neira Sasmita', 'Perempuan', 'Tour Leader', 25, 0, 1),
(44, '012024', '3009412211332234', 'Nisa Arbani', 'Perempuan', 'Tour Consultant', 22, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `username`, `password`, `jenis_kelamin`, `jabatan`, `tanggal_masuk`, `status`, `photo`, `hak_akses`) VALUES
(12, '3112212334421123', 'Arji Manda', 'arji', '202cb962ac59075b964b07152d234b70', 'Laki-laki', 'Tour Guide', '2023-11-30', 'Pegawai Tetap', 'male-administrator.png', 2),
(14, '3009412211332234', 'Nisa Arbani', 'nisa', '202cb962ac59075b964b07152d234b70', 'Perempuan', 'Tour Consultant', '2023-11-29', 'Pegawai Tetap', '-female-.png', 2),
(18, '3405782093890135', 'Edwardo Davinsi', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Laki-laki', 'Admin', '2023-11-30', 'Pegawai Tetap', 'male-administrator1.png', 1),
(19, '3323344335546776', 'Excel Pratama Suratmajda', 'excel', '202cb962ac59075b964b07152d234b70', 'Laki-laki', 'Travel IT ', '2023-11-29', 'Pegawai Tetap', 'male-administrator2.png', 2),
(20, '3662261389213786', 'Neira Sasmita', 'neira', '202cb962ac59075b964b07152d234b70', 'Perempuan', 'Tour Leader', '2023-11-30', 'Pegawai Tetap', '-female-1.png', 2),
(21, '3512345235746976', 'Bambang Ackerman', 'bambang', '202cb962ac59075b964b07152d234b70', 'Laki-laki', 'Travel IT ', '2023-11-30', 'Pegawai Tetap', 'male-administrator3.png', 2),
(22, '3509988576432345', 'Fahmi Andrian', 'fahmi', '202cb962ac59075b964b07152d234b70', 'Laki-laki', 'Tour Leader', '2023-11-30', 'Pegawai Tetap', 'male-administrator4.png', 2),
(23, '3310092287446576', 'Anna Mandella', 'anna', '202cb962ac59075b964b07152d234b70', 'Perempuan', 'Tour Consultant', '2023-11-30', 'Pegawai Tetap', '-female-3.png', 2),
(24, '3224455006987568', 'Annie Lauren', 'annie', '202cb962ac59075b964b07152d234b70', 'Perempuan', 'Tour Consultant', '2023-11-30', 'Pegawai Tetap', '-female-4.png', 2),
(25, '3609900112234123', 'Grishan Peter', 'grisha', '202cb962ac59075b964b07152d234b70', 'Laki-laki', 'Tour Guide', '2023-11-30', 'Pegawai Tetap', 'male-administrator5.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `hak_akses`) VALUES
(1, 'admin', 1),
(2, 'pegawai', 2);

-- --------------------------------------------------------

--
-- Table structure for table `potongan_gaji`
--

CREATE TABLE `potongan_gaji` (
  `id` int(11) NOT NULL,
  `potongan` varchar(120) NOT NULL,
  `jml_potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `potongan_gaji`
--

INSERT INTO `potongan_gaji` (`id`, `potongan`, `jml_potongan`) VALUES
(0, 'Alpha', 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
