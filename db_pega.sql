-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 04:22 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pega`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absenkaryawan`
--

CREATE TABLE `tb_absenkaryawan` (
  `id` int(11) NOT NULL,
  `id_absen` varchar(50) NOT NULL,
  `id_karyawan` varchar(50) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `jam` varchar(150) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_absenkaryawan`
--

INSERT INTO `tb_absenkaryawan` (`id`, `id_absen`, `id_karyawan`, `nama_karyawan`, `posisi`, `tgl`, `jam`, `keterangan`) VALUES
(1, '001', '001', 'Iqbal', 'Kasir', '2021-01-29', '18:00', 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `tb_absenlembur`
--

CREATE TABLE `tb_absenlembur` (
  `id` int(11) NOT NULL,
  `id_absen` varchar(50) NOT NULL,
  `id_karyawan` varchar(50) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `jam` varchar(150) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_absenlembur`
--

INSERT INTO `tb_absenlembur` (`id`, `id_absen`, `id_karyawan`, `nama_karyawan`, `posisi`, `tgl`, `jam`, `keterangan`) VALUES
(1, '001', '001', 'Iqbal', 'Kasir', '2021-01-29', '18:00 - 19:10', 'Lembur 1 jam 10 menit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_absenpimpinan`
--

CREATE TABLE `tb_absenpimpinan` (
  `id` int(11) NOT NULL,
  `id_absen` varchar(50) NOT NULL,
  `id_pimpinan` varchar(50) NOT NULL,
  `nama_pimpinan` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `jam` varchar(150) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_absenpimpinan`
--

INSERT INTO `tb_absenpimpinan` (`id`, `id_absen`, `id_pimpinan`, `nama_pimpinan`, `posisi`, `tgl`, `jam`, `keterangan`) VALUES
(1, '001', '001', 'andre', 'Kasir', '2021-01-29', '18:00', 'Keluar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cuti`
--

CREATE TABLE `tb_cuti` (
  `id` int(11) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `id_karyawan` varchar(150) NOT NULL,
  `nama_karyawan` varchar(150) NOT NULL,
  `posisi` varchar(150) NOT NULL,
  `jenis_cuti` varchar(150) NOT NULL,
  `tgl_cuti` date NOT NULL,
  `tgl_masuk` date NOT NULL,
  `verifikasi` enum('tidak','iya') DEFAULT NULL,
  `ket` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cuti`
--

INSERT INTO `tb_cuti` (`id`, `tanggal_pengajuan`, `id_karyawan`, `nama_karyawan`, `posisi`, `jenis_cuti`, `tgl_cuti`, `tgl_masuk`, `verifikasi`, `ket`) VALUES
(1, '2022-07-09', '0010', 'Iqbaleee', 'Kasir', 'dewa', '2022-07-15', '2022-07-22', 'iya', ''),
(2, '2022-07-10', '0020', 'iram', 'kasir2', 'wew', '2022-07-12', '2022-07-13', 'iya', ''),
(3, '2022-07-09', '0010', 'Iqbaleee', 'Kasir', 'wow', '2022-07-13', '2022-07-14', 'iya', 'Disetujui'),
(4, '2022-07-12', '0010', 'Iqbaleee', 'Kasir', 'dewa', '2022-07-21', '2022-07-22', '', ''),
(5, '2022-07-11', '056', 'kobet', 'Aiii3', 'dewa', '2022-07-14', '2022-07-23', 'tidak', ''),
(6, '2022-07-30', '0010', 'Iqbaleee', 'Kasir', 'dewa', '2022-07-02', '2022-08-05', 'tidak', NULL),
(7, '2022-07-23', '0010', 'Iqbaleee', 'Kasir', 'dewa', '2022-07-30', '2022-07-30', 'tidak', NULL),
(8, '2022-07-15', '0010', 'Iqbaleee', 'Kasir', 'dewa', '2022-07-02', '2022-07-30', 'tidak', NULL),
(9, '2022-08-06', '056', 'kobet', 'Aiii3', 'dewa', '2022-07-29', '2022-07-30', 'tidak', NULL),
(10, '2022-08-03', '056', 'kobet', 'Aiii3', 'dewa', '2022-07-27', '2022-08-06', 'tidak', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cutimelahirkan`
--

CREATE TABLE `tb_cutimelahirkan` (
  `id` int(11) NOT NULL,
  `id_karyawan` varchar(150) NOT NULL,
  `nama_karyawan` varchar(150) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cutipenting`
--

CREATE TABLE `tb_cutipenting` (
  `id` int(11) NOT NULL,
  `id_karyawan` varchar(150) NOT NULL,
  `nama_karyawan` varchar(150) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cutisakit`
--

CREATE TABLE `tb_cutisakit` (
  `id` int(11) NOT NULL,
  `id_karyawan` varchar(150) NOT NULL,
  `nama_karyawan` varchar(150) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `file` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cutitahunan`
--

CREATE TABLE `tb_cutitahunan` (
  `id` int(11) NOT NULL,
  `id_karyawan` varchar(150) NOT NULL,
  `nama_karyawan` varchar(150) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cutitahunan`
--

INSERT INTO `tb_cutitahunan` (`id`, `id_karyawan`, `nama_karyawan`, `tgl_surat`, `tgl_mulai`, `tgl_akhir`) VALUES
(1, '001', 'Iqbal', '2022-05-09', '2022-05-12', '2022-05-31'),
(2, '056', 'kobet', '2022-05-09', '2022-05-10', '2022-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id_divisi` varchar(100) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_divisi`
--

INSERT INTO `tb_divisi` (`id_divisi`, `nama_divisi`) VALUES
('2fd2d6af40e55facf947cb0e7dbd2ea3', 'Administration'),
('816c6edb76f8835214463582e858d003', 'Supply Chain Management'),
('a58ff55000123f16c1be5e28e091f323', 'Operation & Maintenance'),
('e128b5c7090920f1826878bcc2c76f2b', 'Electric');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id_gaji` varchar(100) NOT NULL,
  `id_pegawai` varchar(100) DEFAULT NULL,
  `tgl_dibayar` date DEFAULT NULL,
  `gaji_dibayar` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`id_gaji`, `id_pegawai`, `tgl_dibayar`, `gaji_dibayar`) VALUES
('1009e4305f1b9167894edcb36522def8', '7e0c836324b7ceccfb3fe6e527221400', '2023-07-27', 8100000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gajihan`
--

CREATE TABLE `tb_gajihan` (
  `id` int(11) NOT NULL,
  `id_gaji` int(11) NOT NULL,
  `id_karyawan` varchar(150) NOT NULL,
  `nama_karyawan` varchar(150) NOT NULL,
  `posisi` varchar(150) NOT NULL,
  `tgl` date NOT NULL,
  `gaji` varchar(150) NOT NULL,
  `ket` varchar(150) NOT NULL,
  `tunjangan` varchar(150) NOT NULL,
  `gajil` varchar(150) NOT NULL,
  `utang` varchar(150) NOT NULL,
  `total` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gajilembur`
--

CREATE TABLE `tb_gajilembur` (
  `id` int(11) NOT NULL,
  `id_gaji` varchar(50) NOT NULL,
  `id_karyawan` varchar(50) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `jam` varchar(150) NOT NULL,
  `gajil` varchar(200) NOT NULL,
  `total` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gajilembur`
--

INSERT INTO `tb_gajilembur` (`id`, `id_gaji`, `id_karyawan`, `nama_karyawan`, `posisi`, `tgl`, `jam`, `gajil`, `total`) VALUES
(2, '0019', '001', 'Iqbal', 'Kasir', '2021-01-29', 'Lembur 1 jam 10 menit', '80000', ''),
(3, '00089', '001', 'Iqbal', 'Kasir', '2021-01-29', 'Lembur 1 jam 10 menit', '90000', ''),
(4, '66', '001', 'Iqbal', 'Kasir', '2021-01-29', '18:00 - 19:10', '8000', '144000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_golongan`
--

CREATE TABLE `tb_golongan` (
  `id` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `golongan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hutang`
--

CREATE TABLE `tb_hutang` (
  `id_hutang` varchar(100) NOT NULL,
  `id_pegawai` varchar(100) DEFAULT NULL,
  `jml_hutang` int(10) UNSIGNED DEFAULT NULL,
  `tgl_hutang` date DEFAULT NULL,
  `hutang_dibayar` tinyint(1) DEFAULT 0,
  `remarks_hutang` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` varchar(100) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL,
  `gaji_jabatan` int(10) UNSIGNED NOT NULL,
  `id_usertype` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_jabatan`, `id_usertype`) VALUES
('715f2b09fb3a0b5c97b1ff8e4ca97612', 'HR Officer', 5000000, 2),
('821343bcd74d79ffcf88c7190cddd91d', 'Staff', 3000000, 3),
('ac06045da4b9fbbaf5b3608e34f10a58', 'IT Programmer', 9000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id` int(11) NOT NULL,
  `id_karyawan` varchar(50) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `golongan` varchar(150) NOT NULL,
  `masa_kerja` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id`, `id_karyawan`, `nama_karyawan`, `jk`, `posisi`, `alamat`, `golongan`, `masa_kerja`, `status`) VALUES
(2, '0010', 'Iqbaleee', 'Laki-Laki', 'Kasir', 'Jln Kuin', '', '', ''),
(3, '056', 'kobet', 'Laki-Laki', 'Aiii3', 'jln aura', '', '', ''),
(4, '009', 'ku', 'Laki-Laki', 'Aiii3', 'jln aura', 'A37', '5 bulan', 'Honor');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mutasi`
--

CREATE TABLE `tb_mutasi` (
  `id_mutasi` varchar(100) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `id_jabatan_lama` varchar(100) NOT NULL,
  `id_jabatan_baru` varchar(100) NOT NULL,
  `id_divisi_lama` varchar(100) NOT NULL,
  `id_divisi_baru` varchar(100) NOT NULL,
  `tgl_efektif_mutasi` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_notif`
--

CREATE TABLE `tb_notif` (
  `id` int(11) NOT NULL,
  `id_cuti` int(11) NOT NULL,
  `viewed` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_notif`
--

INSERT INTO `tb_notif` (`id`, `id_cuti`, `viewed`) VALUES
(1, 9, 'y'),
(2, 7, 'y'),
(3, 2, 'y'),
(4, 0, 'y'),
(5, 0, 'y'),
(6, 0, 'y'),
(7, 0, 'y'),
(8, 0, 'y'),
(9, 0, 'y'),
(10, 0, 'y'),
(11, 0, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` varchar(100) NOT NULL,
  `nik_pegawai` varchar(10) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `tgl_lahir_pegawai` date DEFAULT NULL,
  `tempat_lahir_pegawai` varchar(100) DEFAULT NULL,
  `alamat_pegawai` text DEFAULT NULL,
  `id_jabatan` varchar(100) NOT NULL,
  `id_divisi` varchar(100) DEFAULT NULL,
  `jml_tanggungan_pegawai` int(11) DEFAULT 0,
  `status_kawin_pegawai` enum('kawin','belum kawin','janda','duda') DEFAULT NULL,
  `status_aktif_pegawai` tinyint(1) DEFAULT 1,
  `photo_pegawai` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nik_pegawai`, `nama_pegawai`, `tgl_lahir_pegawai`, `tempat_lahir_pegawai`, `alamat_pegawai`, `id_jabatan`, `id_divisi`, `jml_tanggungan_pegawai`, `status_kawin_pegawai`, `status_aktif_pegawai`, `photo_pegawai`) VALUES
('7e0c836324b7ceccfb3fe6e527221400', 'IT-123456', 'Muhammad Akbar', '1998-02-26', 'Kotabaru', 'Jl. Biduri no 52 desa dirgahayu kab. Kotabaru', 'ac06045da4b9fbbaf5b3608e34f10a58', '2fd2d6af40e55facf947cb0e7dbd2ea3', 1, 'belum kawin', 1, NULL),
('a67ef6c62359f3bc2322cfb2256e3d3f', 'HR-123456', 'Chintya Dwi Husein', '2023-07-08', 'Kotabaru', 'Jl. Biduri no 52 desa dirgahayu kab. Kotabaru', '715f2b09fb3a0b5c97b1ff8e4ca97612', '2fd2d6af40e55facf947cb0e7dbd2ea3', 1, 'belum kawin', 1, '0b5f6866403c025ce785670541d6cee2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id` int(11) NOT NULL,
  `id_karyawan` varchar(150) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `nama_pimpinan` varchar(150) NOT NULL,
  `orientasi` varchar(150) NOT NULL,
  `disiplin` varchar(50) NOT NULL,
  `kerjasama` varchar(50) NOT NULL,
  `komitmen` varchar(50) NOT NULL,
  `nilai` varchar(50) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id`, `id_karyawan`, `nama_karyawan`, `nama_pimpinan`, `orientasi`, `disiplin`, `kerjasama`, `komitmen`, `nilai`, `keterangan`) VALUES
(1, '', 'Iqbal', '', '90', '45', '45', '20', '50', 'Kurang Baik'),
(2, '', 'Iqbaleee', '', '', '900', '90', '90', '360', 'Sangat Baik'),
(3, '0010', 'Iqbaleee', '', '', '80', '90', '90', '86.66666666666667', 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pimpinan`
--

CREATE TABLE `tb_pimpinan` (
  `id` int(11) NOT NULL,
  `id_pimpinan` varchar(50) NOT NULL,
  `nama_pimpinan` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pimpinan`
--

INSERT INTO `tb_pimpinan` (`id`, `id_pimpinan`, `nama_pimpinan`, `jk`, `posisi`, `alamat`) VALUES
(3, '001', 'andre', 'Laki-Laki', 'Kasir', 'Jln Belitung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_promosi`
--

CREATE TABLE `tb_promosi` (
  `id` int(11) NOT NULL,
  `id_promosi` varchar(50) NOT NULL,
  `id_karyawan` varchar(50) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `posisi1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_promosi`
--

INSERT INTO `tb_promosi` (`id`, `id_promosi`, `id_karyawan`, `nama_karyawan`, `posisi`, `posisi1`) VALUES
(1, '001', '001', 'Iqbal', 'Kasir', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usertype`
--

CREATE TABLE `tb_usertype` (
  `id_usertype` varchar(100) NOT NULL,
  `usertype_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_usertype`
--

INSERT INTO `tb_usertype` (`id_usertype`, `usertype_name`) VALUES
('1', 'admin'),
('2', 'hrd'),
('3', 'pegawai'),
('4', 'koperasi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_pegawai` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_pegawai`) VALUES
('6676d9b1fa40f58b8ea777a4d2f799b6', 'Chintya.Dwi.Husein', 'e10adc3949ba59abbe56e057f20f883e', 'a67ef6c62359f3bc2322cfb2256e3d3f'),
('iniiduserygsayabuatlangsungdidatabase', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absenkaryawan`
--
ALTER TABLE `tb_absenkaryawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_absenlembur`
--
ALTER TABLE `tb_absenlembur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_absenpimpinan`
--
ALTER TABLE `tb_absenpimpinan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cutimelahirkan`
--
ALTER TABLE `tb_cutimelahirkan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cutipenting`
--
ALTER TABLE `tb_cutipenting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cutisakit`
--
ALTER TABLE `tb_cutisakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cutitahunan`
--
ALTER TABLE `tb_cutitahunan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `tb_gajihan`
--
ALTER TABLE `tb_gajihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gajilembur`
--
ALTER TABLE `tb_gajilembur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_hutang`
--
ALTER TABLE `tb_hutang`
  ADD PRIMARY KEY (`id_hutang`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mutasi`
--
ALTER TABLE `tb_mutasi`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indexes for table `tb_notif`
--
ALTER TABLE `tb_notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pimpinan`
--
ALTER TABLE `tb_pimpinan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_promosi`
--
ALTER TABLE `tb_promosi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_usertype`
--
ALTER TABLE `tb_usertype`
  ADD PRIMARY KEY (`id_usertype`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absenkaryawan`
--
ALTER TABLE `tb_absenkaryawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_absenlembur`
--
ALTER TABLE `tb_absenlembur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_absenpimpinan`
--
ALTER TABLE `tb_absenpimpinan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_cutimelahirkan`
--
ALTER TABLE `tb_cutimelahirkan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cutipenting`
--
ALTER TABLE `tb_cutipenting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cutisakit`
--
ALTER TABLE `tb_cutisakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cutitahunan`
--
ALTER TABLE `tb_cutitahunan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_gajihan`
--
ALTER TABLE `tb_gajihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_gajilembur`
--
ALTER TABLE `tb_gajilembur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_notif`
--
ALTER TABLE `tb_notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pimpinan`
--
ALTER TABLE `tb_pimpinan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_promosi`
--
ALTER TABLE `tb_promosi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
