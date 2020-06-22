-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 02 Jun 2020 pada 09.04
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absenguru`
--

CREATE TABLE `tb_absenguru` (
  `id_absen` int(11) NOT NULL,
  `nip` varchar(200) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `tgl_absen` date NOT NULL,
  `sakit` varchar(50) NOT NULL,
  `izin` varchar(50) NOT NULL,
  `alpa` varchar(50) NOT NULL,
  `alasan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absensiswa`
--

CREATE TABLE `tb_absensiswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `sakit` varchar(50) NOT NULL,
  `izin` varchar(50) NOT NULL,
  `alpa` varchar(50) NOT NULL,
  `tgl_absen` date NOT NULL,
  `alasan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` enum('admin','guru') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `nama`, `password`, `email`, `level`) VALUES
(2, 'admin', 'AHMAD RIYADI ARRIDHO', '21232f297a57a5a743894a0e4a801fc3', 'ahmad.ryd6@gmail.com', 'admin'),
(5, 'guru', 'Ryd Ahmad', '77e69c137812518e359196bb2f5e9bb9', 'guru@gmail.com', 'guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alumni`
--

CREATE TABLE `tb_alumni` (
  `id` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `angkatan` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama_guru`, `tempat_lahir`, `tgl_lahir`, `agama`, `jenis_kelamin`, `alamat`, `telp`, `foto`) VALUES
(25, '1234 5678 900 98 7', 'Ahmad Riyadi Arridho', 'Muara Teweh', '2020-05-21', 'Islam', 'Laki-Laki', 'JL.Kuin Selatan Gg.Rahmah,Banjarmasin', '(+62)81-3245-6787', 'user6-128x128.jpg'),
(26, '4567 8987 654 32 3', 'Rahayu Ayu Lestari', 'Kandangan', '2020-05-12', 'Islam', 'Perempuan', 'Jl.Belitung', '(+62)85-6789-8765', 'photo31.jpg'),
(27, '9999 9999 999 99 9', 'Risky Adiwati', 'Kandangan', '2020-05-14', 'Islam', 'Perempuan', 'Jl,Cemara', '(+62)85-4345-6787', 'user4-128x1282.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `tgl_absen` date NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `kode_matpel` varchar(200) NOT NULL,
  `matpel` varchar(50) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `hari`, `tgl_absen`, `jurusan`, `kelas`, `nip`, `nama_guru`, `kode_matpel`, `matpel`, `jam_masuk`, `jam_selesai`) VALUES
(16, 'Senin', '2020-05-15', 'Sistem Informasi', '10', '4567 8987 654 32 3', 'Rahayu Ayu', '', 'Bahasa Indonesia', '10:10:00', '00:12:00'),
(17, 'Rabu', '2020-05-15', 'Sistem Informasi', '10', '4567 8987 654 32 3', 'Rahayu Ayu', '', 'Matematika', '02:01:00', '01:00:00'),
(18, 'Senin', '2020-05-08', 'Sistem Informasi', '12', '1234 5678 900 98 7', 'Ahmad Riyadi Arridho', '', 'Matematika', '03:03:00', '02:00:00'),
(19, 'Senin', '2020-01-01', 'Sistem Informasi', '10', '1234 5678 900 98 7', 'Ahmad Riyadi Arridho', '', 'Matematika', '10:10:00', '10:10:00'),
(20, 'Jum\'at', '2020-05-15', 'Sistem Informasi', '11', '1234 5678 900 98 7', 'Ahmad Riyadi Arridho', '', 'Bahasa Latin', '10:10:00', '00:12:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jrs`
--

CREATE TABLE `tb_jrs` (
  `id_jrs` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(200) NOT NULL,
  `nama_siswa` varchar(200) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `thn_ajaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jrs`
--

INSERT INTO `tb_jrs` (`id_jrs`, `id_siswa`, `nis`, `nama_siswa`, `jurusan`, `kelas`, `semester`, `thn_ajaran`) VALUES
(39, 0, '1234 5678', 'Effan', 'Teknik Komputer Jaringan', '12', 'Genap', '2021/2011');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_matpel`
--

CREATE TABLE `tb_matpel` (
  `id_matpel` int(11) NOT NULL,
  `kode_matpel` varchar(50) NOT NULL,
  `matpel` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_matpel`
--

INSERT INTO `tb_matpel` (`id_matpel`, `kode_matpel`, `matpel`, `jurusan`, `kelas`) VALUES
(46, '4-(MP)0.1.1', 'Farmakologi', 'Analis Kesehatan', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilaisiswa`
--

CREATE TABLE `tb_nilaisiswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nama_matpel` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `thn_ajaran` varchar(50) NOT NULL,
  `nilai1` varchar(50) NOT NULL,
  `nilai2` varchar(50) NOT NULL,
  `nilai3` varchar(50) NOT NULL,
  `uts` varchar(50) NOT NULL,
  `uas` varchar(50) NOT NULL,
  `rata` varchar(50) NOT NULL,
  `predikat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `telp`, `alamat`, `foto`) VALUES
(28, '7173 2615', 'Rizky Alawiyah', 'Martapura', '1998-06-07', 'Perempuan', 'Katolik', '(+62)81-0676-5456', 'Lingkungan Kesehatan', 'user7-128x128.jpg'),
(29, '7656 7654', 'Tina', 'Jambi', '2020-05-27', 'Perempuan', 'Islam', '(+62)86-6543-3456', 'Jl.Sulawesi', 'user4-128x1283.jpg'),
(30, '1234 5678', 'Effan', 'Banjarmasin', '2020-05-19', 'Laki-Laki', 'Islam', '(+62)88-1123-4456', 'Jl.Belitung Darat No.01', 'avatar291.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tambahjurusan`
--

CREATE TABLE `tb_tambahjurusan` (
  `id_tambahjurusan` int(11) NOT NULL,
  `kode_jrs` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tambahjurusan`
--

INSERT INTO `tb_tambahjurusan` (`id_tambahjurusan`, `kode_jrs`, `jurusan`) VALUES
(1, '3-(JRS)0.1', 'Farmasi'),
(2, '3-(JRS)0.2', 'Analis Kesehatan'),
(4, '3-(JRS)0.3', 'Teknik Komputer Jaringan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_absenguru`
--
ALTER TABLE `tb_absenguru`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `tb_jrs`
--
ALTER TABLE `tb_jrs`
  ADD PRIMARY KEY (`id_jrs`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_matpel`
--
ALTER TABLE `tb_matpel`
  ADD PRIMARY KEY (`id_matpel`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tb_tambahjurusan`
--
ALTER TABLE `tb_tambahjurusan`
  ADD PRIMARY KEY (`id_tambahjurusan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_absenguru`
--
ALTER TABLE `tb_absenguru`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_jrs`
--
ALTER TABLE `tb_jrs`
  MODIFY `id_jrs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_matpel`
--
ALTER TABLE `tb_matpel`
  MODIFY `id_matpel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_tambahjurusan`
--
ALTER TABLE `tb_tambahjurusan`
  MODIFY `id_tambahjurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
