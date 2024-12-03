-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Nov 2024 pada 04.28
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
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `idpegawai` int(11) NOT NULL,
  `nip` text NOT NULL,
  `nama` text NOT NULL,
  `jabatan` text NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `nohp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`idpegawai`, `nip`, `nama`, `jabatan`, `alamat`, `email`, `nohp`) VALUES
(1, '12345', 'Sugeng', 'Pegawai 1', 'ASd', 'sugeng@gmail.com', '0812321321'),
(2, '12312123', 'Budi', 'Pegawai 2', 'ASD', 'budi@gmail.com', '0129321321');

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
  `tingkat_mutu_karyawan` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penilaian_kinerja`
--

INSERT INTO `penilaian_kinerja` (`id`, `idpegawai`, `kompetensi_teknis`, `kompetensi_soft_skill`, `kehadiran`, `produktivitas`, `inisiatif_kreativitas`, `tingkat_mutu_karyawan`, `created_at`) VALUES
(1, 1, 7, 8, 8, 6, 5, NULL, '2024-11-04 10:09:45'),
(2, 2, 8, 9, 7, 9, 7, NULL, '2024-11-04 10:51:08');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
