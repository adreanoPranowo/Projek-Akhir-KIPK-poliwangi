-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2022 pada 12.20
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saw_wp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(50) DEFAULT NULL,
  `admin_foto` varchar(255) DEFAULT NULL,
  `admin_username` varchar(50) DEFAULT NULL,
  `admin_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_foto`, `admin_username`, `admin_password`) VALUES
(1, 'Hartanto', '19844_icons8-user-male-400.png', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot_kriteria`
--

CREATE TABLE `bobot_kriteria` (
  `bobot_id` int(11) NOT NULL,
  `bobot_kriteria` int(11) DEFAULT NULL,
  `bobot_keterangan` varchar(50) DEFAULT NULL,
  `bobot_nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bobot_kriteria`
--

INSERT INTO `bobot_kriteria` (`bobot_id`, `bobot_kriteria`, `bobot_keterangan`, `bobot_nilai`) VALUES
(1, 1, '3.65 S/D 4.00', 5),
(2, 1, '3.35 S/D 3.65', 4),
(3, 1, '3.15 S/D 3.35', 3),
(4, 1, '2.95 S/D 3/15', 2),
(5, 1, '2.75 S/D 2.95', 1),
(6, 2, 'SEMESTER 6', 5),
(7, 2, 'SEMESTER 5', 4),
(8, 2, 'SEMESTER 4', 3),
(9, 2, 'SEMESTER 3', 2),
(10, 2, 'SEMESTER 2', 1),
(11, 3, '< 1.500.000', 5),
(12, 3, '1.500.000 S/D 2.500.000', 4),
(13, 3, '1.500.000 S/D 2.500.000', 3),
(14, 3, '3.500.000 S/D 5.000.000', 2),
(15, 3, '> 5.000.000', 1),
(16, 4, '5 ORANG ANAK', 5),
(17, 4, '4 ORANG ANAK', 4),
(18, 4, '3 ORANG ANAK', 3),
(19, 4, '2 ORANG ANAK', 2),
(20, 4, '1 ORANG ANAK', 1),
(21, 5, 'TINGKAT UNIVERSITAS', 5),
(22, 5, 'TINGKAT FAKULTAS', 4),
(23, 5, 'TINGKAT JURUSAN', 3),
(24, 5, 'LUAR KAMPUS', 2),
(25, 5, 'TIDAK ADA', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `kriteria_inisial` varchar(30) DEFAULT NULL,
  `kriteria_keterangan` varchar(30) DEFAULT NULL,
  `kriteria_bobot` int(11) DEFAULT NULL,
  `kriteria_sifat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `kriteria_inisial`, `kriteria_keterangan`, `kriteria_bobot`, `kriteria_sifat`) VALUES
(1, 'C1', 'INDEK PRESTASI AKADEMIK', 30, 'Benefit'),
(2, 'C2', 'SEMESTER', 20, 'Benefit'),
(3, 'C3', 'PENGHASILAN ORANG TUA', 15, 'Cost'),
(4, 'C4', 'TANGGUNGAN ORANG TUA', 15, 'Benefit'),
(5, 'C5', 'KEIKUTSERTAAN ORGANISASI', 20, 'Benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_id` int(11) NOT NULL,
  `mahasiswa_nim` int(11) NOT NULL,
  `mahasiswa_nama` varchar(255) DEFAULT NULL,
  `mahasiswa_alamat` varchar(255) DEFAULT NULL,
  `mahasiswa_kelamin` varchar(255) DEFAULT NULL,
  `mahasiswa_kontak` varchar(255) DEFAULT NULL,
  `mahasiswa_foto` varchar(255) DEFAULT NULL,
  `mahasiswa_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswa_id`, `mahasiswa_nim`, `mahasiswa_nama`, `mahasiswa_alamat`, `mahasiswa_kelamin`, `mahasiswa_kontak`, `mahasiswa_foto`, `mahasiswa_password`) VALUES
(8, 12345, 'Halimah', 'Jakarta Timur', 'Perempuan', '082272242022', '13100_perempuan.png', '5787be38ee03a9ae5360f54d9026465f'),
(9, 12346, 'Susanti', 'Jakarta Timur, Lorong pakan, no.5', 'Perempuan', '0876612321212', '24406_perempuan.png', '5787be38ee03a9ae5360f54d9026465f'),
(10, 12347, 'Jamaluddin', 'Jakarta Utara', 'Laki-Laki', '087298761231', NULL, '5787be38ee03a9ae5360f54d9026465f'),
(11, 12348, 'Iswanto', 'Jalan merdeka barat, jakarta selatan', 'Laki-Laki', '0817211231', '19712_laki-laki.png', '5787be38ee03a9ae5360f54d9026465f'),
(12, 12349, 'Julianto', NULL, NULL, '08957712172712', NULL, '5787be38ee03a9ae5360f54d9026465f'),
(13, 123456, 'Kamarullah', 'Jakarta Selatan', 'Laki-Laki', '082272242922', NULL, '5787be38ee03a9ae5360f54d9026465f'),
(14, 123457, 'Munawar', 'Jakarta Selatan,', 'Laki-Laki', '089560028763', NULL, '5787be38ee03a9ae5360f54d9026465f'),
(15, 123458, 'Surya', NULL, NULL, '088772446412', NULL, '5787be38ee03a9ae5360f54d9026465f');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `nilai_id` int(11) NOT NULL,
  `nilai_periode` int(11) DEFAULT NULL,
  `nilai_mahasiswa` int(11) NOT NULL,
  `nilai_kriteria` int(11) NOT NULL,
  `nilai_bobot` int(11) NOT NULL,
  `nilai_bukti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`nilai_id`, `nilai_periode`, `nilai_mahasiswa`, `nilai_kriteria`, `nilai_bobot`, `nilai_bukti`) VALUES
(1, 2, 8, 1, 1, '1265323319_CONTOH KHS.pdf'),
(2, 2, 8, 2, 6, '1915434081_CONTOH KRS.pdf'),
(3, 2, 8, 3, 11, '1218535419_GAJI ORANG TUA.pdf'),
(4, 2, 8, 4, 16, '1537960677_TANGGUNGAN ORANG TUA.pdf'),
(5, 2, 8, 5, 21, '342792283_KEIKUTSERTAAN ORGANISASI.pdf'),
(6, 2, 9, 1, 1, '721749564_CONTOH KHS.pdf'),
(7, 2, 9, 2, 7, '1686580216_CONTOH KRS.pdf'),
(8, 2, 9, 3, 13, '604191248_GAJI ORANG TUA.pdf'),
(9, 2, 9, 4, 19, '1473082328_TANGGUNGAN ORANG TUA.pdf'),
(10, 2, 9, 5, 25, '941659210_KEIKUTSERTAAN ORGANISASI.pdf'),
(11, 2, 10, 1, 2, '1679010985_CONTOH KHS.pdf'),
(12, 2, 10, 2, 7, '505476564_CONTOH KRS.pdf'),
(13, 2, 10, 3, 12, '507180868_GAJI ORANG TUA.pdf'),
(14, 2, 10, 4, 17, '795564060_TANGGUNGAN ORANG TUA.pdf'),
(15, 2, 10, 5, 22, '108672891_KEIKUTSERTAAN ORGANISASI.pdf'),
(16, 3, 13, 1, 2, '1494432550_CONTOH KHS.pdf'),
(17, 3, 13, 2, 7, '22682266_CONTOH KRS.pdf'),
(18, 3, 13, 3, 13, '165630201_GAJI ORANG TUA.pdf'),
(19, 3, 13, 4, 18, '1596219481_TANGGUNGAN ORANG TUA.pdf'),
(20, 3, 13, 5, 23, '1492625723_KEIKUTSERTAAN ORGANISASI.pdf'),
(21, 3, 14, 1, 2, '160926572_CONTOH KHS.pdf'),
(22, 3, 14, 2, 6, '1921877411_CONTOH KRS.pdf'),
(23, 3, 14, 3, 12, '447496858_GAJI ORANG TUA.pdf'),
(24, 3, 14, 4, 18, '1785462167_TANGGUNGAN ORANG TUA.pdf'),
(25, 3, 14, 5, 21, '901372561_KEIKUTSERTAAN ORGANISASI.pdf'),
(26, 3, 15, 1, 2, '1848489766_CONTOH KHS.pdf'),
(27, 3, 15, 2, 7, '1218932277_CONTOH KRS.pdf'),
(28, 3, 15, 3, 14, '700106199_GAJI ORANG TUA.pdf'),
(29, 3, 15, 4, 18, '1937064883_TANGGUNGAN ORANG TUA.pdf'),
(30, 3, 15, 5, 23, '305490103_KEIKUTSERTAAN ORGANISASI.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `periode_id` int(11) NOT NULL,
  `periode_tanggal_buka` date DEFAULT NULL,
  `periode_tanggal_tutup` date DEFAULT NULL,
  `periode_status` varchar(20) DEFAULT NULL,
  `periode_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`periode_id`, `periode_tanggal_buka`, `periode_tanggal_tutup`, `periode_status`, `periode_file`) VALUES
(1, '2020-03-23', '2020-03-30', 'Tutup', '897416994_128-B047.pdf'),
(2, '2020-03-31', '2020-04-06', 'Tutup', NULL),
(3, '2020-04-06', '2020-04-13', 'Aktif', '1994123258_PENGUMUMAN PENDAFTARAN BEASISWA PPA.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode_mahasiswa`
--

CREATE TABLE `periode_mahasiswa` (
  `pm_id` int(11) NOT NULL,
  `pm_periode` int(11) DEFAULT NULL,
  `pm_mahasiswa` int(11) DEFAULT NULL,
  `pm_tanggal_daftar` date DEFAULT NULL,
  `pm_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `periode_mahasiswa`
--

INSERT INTO `periode_mahasiswa` (`pm_id`, `pm_periode`, `pm_mahasiswa`, `pm_tanggal_daftar`, `pm_status`) VALUES
(1, 2, 8, '2020-04-02', 'Diterima'),
(2, 2, 9, '2020-04-02', 'Diterima'),
(3, 2, 10, '2020-04-02', 'Diterima'),
(4, 3, 13, '2020-04-02', 'Ditolak'),
(5, 3, 14, '2020-04-02', 'Diterima'),
(6, 3, 15, '2020-04-02', 'Diterima');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  ADD PRIMARY KEY (`bobot_id`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_id`),
  ADD UNIQUE KEY `mahasiswa_nim` (`mahasiswa_nim`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nilai_id`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`periode_id`);

--
-- Indeks untuk tabel `periode_mahasiswa`
--
ALTER TABLE `periode_mahasiswa`
  ADD PRIMARY KEY (`pm_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  MODIFY `bobot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `periode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `periode_mahasiswa`
--
ALTER TABLE `periode_mahasiswa`
  MODIFY `pm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
