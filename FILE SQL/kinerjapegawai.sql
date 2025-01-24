-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2025 pada 07.31
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kinerjapegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataset`
--

CREATE TABLE `dataset` (
  `id` int(11) NOT NULL,
  `namapegawai` varchar(255) NOT NULL,
  `kompetensi_teknis` float NOT NULL,
  `kompetensi_soft_skill` float NOT NULL,
  `kehadiran` float NOT NULL,
  `produktivitas` float NOT NULL,
  `inisiatif_kreativitas` float NOT NULL,
  `mutu` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dataset`
--

INSERT INTO `dataset` (`id`, `namapegawai`, `kompetensi_teknis`, `kompetensi_soft_skill`, `kehadiran`, `produktivitas`, `inisiatif_kreativitas`, `mutu`, `created_at`) VALUES
(1, 'John Does', 8, 9, 10, 7, 9, 'B', '2024-11-30 10:29:27'),
(2, 'Jane Smith', 7, 8, 9, 8, 7, 'B', '2024-11-30 10:29:27'),
(3, 'Michael Johnson', 9, 8, 9, 9, 9, 'B', '2024-11-30 10:29:27'),
(4, 'Emily Davis', 7, 7, 8, 8, 7, 'B', '2024-11-30 10:29:27'),
(5, 'David Wilson', 9, 9, 8, 9, 8, 'B', '2024-11-30 10:29:27'),
(6, 'Sarah Brown', 6, 7, 8, 7, 6, 'C', '2024-11-30 10:29:27'),
(7, 'Chris Taylor', 8, 7, 9, 8, 9, 'B', '2024-11-30 10:29:27'),
(8, 'Jessica Lee', 10, 10, 9, 10, 10, 'A', '2024-11-30 10:29:27'),
(9, 'Daniel Martinez', 7, 7, 8, 7, 7, 'B', '2024-11-30 10:29:27'),
(10, 'Laura White', 8, 7, 7, 8, 8, 'B', '2024-11-30 10:29:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nama_kriteria` varchar(256) NOT NULL,
  `atribut` varchar(256) NOT NULL DEFAULT 'benefit'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kode_kriteria`, `tahun`, `nama_kriteria`, `atribut`) VALUES
('C1', '0000', 'Pendidikan', 'benefit'),
('C2', '0000', 'Skill', 'benefit'),
('C3', '0000', 'Komunikasi', 'benefit'),
('C4', '0000', 'Masa Kerja', 'cost'),
('C5', '0000', 'Pengalaman', 'benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `idpegawai` int(11) NOT NULL,
  `nip` text NOT NULL,
  `nama` text NOT NULL,
  `jabatan` text NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `nohp` text NOT NULL,
  `total` double NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`idpegawai`, `nip`, `nama`, `jabatan`, `alamat`, `email`, `nohp`, `total`, `rank`) VALUES
(1, '12345', 'Sugeng', 'Pegawai 1', 'ASd', 'sugeng@gmail.com', '0812321321', 0, 0),
(2, '12312123', 'Budi', 'Pegawai 2', 'ASD', 'budi@gmail.com', '0129321321', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(11) NOT NULL,
  `namapengguna` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `namapengguna`, `email`, `password`, `level`) VALUES
(4, 'Admin', 'admin@gmail.com', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_kinerja`
--

CREATE TABLE `penilaian_kinerja` (
  `id` int(11) NOT NULL,
  `idpegawai` int(11) NOT NULL,
  `kompetensi_teknis` tinyint(2) NOT NULL,
  `kompetensi_soft_skill` tinyint(2) NOT NULL,
  `kehadiran` tinyint(2) NOT NULL,
  `produktivitas` int(11) NOT NULL,
  `inisiatif_kreativitas` tinyint(2) NOT NULL,
  `mutu` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penilaian_kinerja`
--

INSERT INTO `penilaian_kinerja` (`id`, `idpegawai`, `kompetensi_teknis`, `kompetensi_soft_skill`, `kehadiran`, `produktivitas`, `inisiatif_kreativitas`, `mutu`, `created_at`) VALUES
(1, 1, 7, 8, 8, 6, 5, '', '2024-11-04 10:09:45'),
(2, 2, 8, 9, 7, 9, 7, '', '2024-11-04 10:51:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rel_alternatif`
--

CREATE TABLE `rel_alternatif` (
  `ID` int(11) NOT NULL,
  `kode_alternatif` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `rel_alternatif`
--

INSERT INTO `rel_alternatif` (`ID`, `kode_alternatif`, `kode_kriteria`, `nilai`) VALUES
(1, '12345', 'C1', 7),
(2, '12312123', 'C1', 8),
(3, '12345', 'C2', 7),
(4, '12312123', 'C2', 9),
(5, '12345', 'C3', 9),
(6, '12312123', 'C3', 9),
(7, '12345', 'C4', 7),
(8, '12312123', 'C4', 7),
(9, '12345', 'C5', 7),
(10, '12312123', 'C5', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rel_kriteria`
--

CREATE TABLE `rel_kriteria` (
  `ID` int(11) NOT NULL,
  `ID1` varchar(16) DEFAULT NULL,
  `ID2` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `rel_kriteria`
--

INSERT INTO `rel_kriteria` (`ID`, `ID1`, `ID2`, `nilai`) VALUES
(1, 'C1', 'C1', 1),
(2, 'C2', 'C1', 1),
(3, 'C2', 'C2', 1),
(4, 'C1', 'C2', 1),
(5, 'C3', 'C1', 1),
(6, 'C3', 'C2', 1),
(7, 'C3', 'C3', 1),
(8, 'C1', 'C3', 1),
(9, 'C2', 'C3', 1),
(10, 'C4', 'C1', 1),
(11, 'C4', 'C2', 1),
(12, 'C4', 'C3', 1),
(13, 'C4', 'C4', 1),
(14, 'C1', 'C4', 1),
(15, 'C2', 'C4', 1),
(16, 'C3', 'C4', 1),
(17, 'C5', 'C1', 0.11111111111111),
(18, 'C5', 'C2', 1),
(19, 'C5', 'C3', 1),
(20, 'C5', 'C4', 1),
(21, 'C5', 'C5', 1),
(22, 'C1', 'C5', 9),
(23, 'C2', 'C5', 1),
(24, 'C3', 'C5', 1),
(25, 'C4', 'C5', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kode_kriteria`,`tahun`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idpegawai`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indeks untuk tabel `penilaian_kinerja`
--
ALTER TABLE `penilaian_kinerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rel_alternatif`
--
ALTER TABLE `rel_alternatif`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `rel_kriteria`
--
ALTER TABLE `rel_kriteria`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dataset`
--
ALTER TABLE `dataset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idpegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idpengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penilaian_kinerja`
--
ALTER TABLE `penilaian_kinerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rel_alternatif`
--
ALTER TABLE `rel_alternatif`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `rel_kriteria`
--
ALTER TABLE `rel_kriteria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
