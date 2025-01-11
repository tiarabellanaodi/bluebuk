-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2025 pada 17.09
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
-- Database: `bluebuk_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akunpembeli`
--

CREATE TABLE `akunpembeli` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akunpembeli`
--

INSERT INTO `akunpembeli` (`id`, `nama`, `email`, `password`, `alamat`, `nomor_telepon`, `created_at`) VALUES
(8, 'bella', 'rpnaravit@gmail.com', '12345678', 'Kp.Ciparungsari Rt 05/02 Kec. Cibatu Kab. Purwakarta', '088218295189', '2025-01-11 05:21:07'),
(9, 'hanif', 'hanif@gmail.com', '12345678', 'Ds. Cikumpay Rt 02/04 Kec. Campaka Kab. Purwakarta', '0857557590', '2025-01-11 08:11:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjuallogin`
--

CREATE TABLE `penjuallogin` (
  `Id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjuallogin`
--

INSERT INTO `penjuallogin` (`Id`, `username`, `password`, `created_at`, `email`, `nama`) VALUES
(0, 'tiara', '$2y$10$FZV2TS9eJgBmczB1aM0BJulcj3qn3psHI/fi9ySOHrgurMZvpPiYa', '0000-00-00 00:00:00', 'tiarabellanaodi@gmail.com', 'tiara'),
(0, 'hanif', '$2y$10$DHuO806WDJK1jpq6iExajOSfyoxFnTPXGZYAvTb/5.BT0O2bkmkay', '0000-00-00 00:00:00', 'hanifnrm@gmail.com', 'hanif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `penjual_id` int(11) NOT NULL,
  `nama_depot` varchar(100) DEFAULT NULL,
  `nama_pemesan` varchar(100) DEFAULT NULL,
  `jumlah_galon` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `status` enum('Dalam Proses','Selesai','Dibatalkan') DEFAULT 'Dalam Proses',
  `waktu_pesan` datetime DEFAULT current_timestamp(),
  `catatan` text DEFAULT NULL,
  `alamat_pemesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `user_id`, `penjual_id`, `nama_depot`, `nama_pemesan`, `jumlah_galon`, `total_harga`, `status`, `waktu_pesan`, `catatan`, `alamat_pemesan`) VALUES
(19, 8, 0, 'Dian Tirta', 'bella', 4, 20000, 'Selesai', '2025-01-11 21:41:24', 'asfshjeit', 'Kp.Ciparungsari Rt 05/02 Kec. Cibatu Kab. Purwakarta'),
(20, 8, 0, 'Dian Tirta', 'bella', 11, 55000, 'Dibatalkan', '2025-01-11 21:41:39', 'aeittyioo7', 'Kp.Ciparungsari Rt 05/02 Kec. Cibatu Kab. Purwakarta'),
(21, 9, 0, 'Dian Tirta', 'hanif', 2, 10000, 'Selesai', '2025-01-11 21:43:06', '', 'Ds. Cikumpay Rt 02/04 Kec. Campaka Kab. Purwakarta');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akunpembeli`
--
ALTER TABLE `akunpembeli`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akunpembeli`
--
ALTER TABLE `akunpembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
