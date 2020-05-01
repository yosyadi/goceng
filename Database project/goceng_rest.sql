-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Bulan Mei 2020 pada 20.09
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goceng_rest`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'goceng123', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(1, 'uri:api/uangmasuk/index:get', 2, 1588352578, 'goceng123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `telpon` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uangkeluar`
--

CREATE TABLE `uangkeluar` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `uangkeluar`
--

INSERT INTO `uangkeluar` (`id`, `tanggal`, `jumlah`, `kategori`, `keterangan`) VALUES
(1, '2020-05-01 02:01:01', 5000, 'Uang Saku', 'Makan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uangmasuk`
--

CREATE TABLE `uangmasuk` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `uangmasuk`
--

INSERT INTO `uangmasuk` (`id`, `tanggal`, `jumlah`, `kategori`, `keterangan`) VALUES
(3, '2020-05-01 01:01:01', 10000, 'Uang Saku', 'kendaraan'),
(4, '2020-05-01 02:01:01', 15000, 'Uang Saku', 'Makan'),
(5, '2020-05-01 02:01:01', 5000, 'Uang Saku', 'Makan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `uangkeluar`
--
ALTER TABLE `uangkeluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `uangmasuk`
--
ALTER TABLE `uangmasuk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `uangkeluar`
--
ALTER TABLE `uangkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `uangmasuk`
--
ALTER TABLE `uangmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
