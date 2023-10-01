-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2021 pada 18.10
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webperpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jns_kel` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `jns_kel`, `tgl_lahir`, `kontak`, `alamat`) VALUES
(1, 'Bagas Arya Pradipta', 'Laki-Laki', '0001-01-01', '0812', 'Depok'),
(2, 'Rizky Maulana', 'Laki-Laki', '0001-01-01', '0812', 'Jakarta'),
(3, 'Okitora Winneto', 'Laki-Laki', '0001-01-01', '0812', 'Depok'),
(4, 'Faizal Ramadhan', 'Laki-Laki', '0001-01-01', '0812', 'Jakarta'),
(5, 'Irsyad Fadhal', 'Laki-Laki', '0001-01-01', '0812', 'Jakarta'),
(42, 'Rakha Ibadurahman', 'Laki-Laki', '0001-01-01', '0812', 'Jakarta'),
(61, 'Maulana Juliansyah', 'Laki-Laki', '0001-01-01', '0812', 'Jakarta'),
(76, 'Muhammad Raihan', 'Laki-Laki', '0001-01-01', '0812', 'Kalimantan'),
(77, 'Fikri Anwar', 'Laki-Laki', '0001-01-01', '0812', 'Depok'),
(78, 'Fathur Rohman', 'Laki-Laki', '0001-01-01', '0812', 'Jakarta'),
(84, 'a', 'a', '2021-01-01', 'a', 'a'),
(85, 'aa', 'a', '0001-01-11', '1', '1'),
(86, 'a', 'a', '0001-01-01', 'a', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(4) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun_terbit` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penulis`, `penerbit`, `tahun_terbit`) VALUES
(2, 'Belajar Dasar PHP', 'Bagas', 'Moza Book', 2021),
(12, 'Belajar Web Lanjut', 'Bagas', 'Moza Book', 2021),
(16, 'Belajar HTML CSS JS', 'Bagas', 'Moza Book', 2021),
(21, 'UI / UX Design', 'Bagas', 'Moza Book', 2021),
(24, 'Membuat Web Responsive', 'Bagas', 'Moza Book', 2021),
(25, 'Mendesaign Yang Web Responsive', 'Bagas', 'Moza Book', 2021),
(26, 'Cara Menggunakan Aplikasi Netbean', 'Bagas', 'Moza Book', 2021),
(27, 'Pewarnaan Pada Web', 'Bagas', 'Moza Book', 2021),
(28, 'Pemrograman Dasar', 'Bagas', 'Moza Book', 2021),
(29, 'Pemrograman Dasar #2', 'Bagas', 'Moza Book', 2021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjam` int(4) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjam`, `nama_peminjam`, `judul`, `tgl_pinjam`, `tgl_kembali`) VALUES
(2, 'Irsyad Fadhal', 'Belajar HTML CSS JS', '2021-05-05', '2021-05-10'),
(5, 'Faizal Ramadhan', 'Belajar HTML CSS JS', '2021-05-05', '2021-05-10'),
(6, 'Bagas Arya Pradipta', 'Belajar Dasar PHP', '2021-05-05', '2021-05-10'),
(7, 'Okitora Winneto', 'Belajar HTML CSS JS', '2021-05-05', '2021-05-10'),
(10, 'Rizky Maulana', 'Belajar Dasar PHP', '2021-05-05', '2021-05-10'),
(12, 'Rakha Ibaddurahman', 'Belajar Dasar PHP', '2021-05-05', '2021-05-10'),
(13, 'Maulana Juliansyah', 'UI / UX Design', '2021-05-05', '2021-05-10'),
(14, 'Fikri Anwar', 'Belajar', '2021-05-05', '2021-05-10'),
(15, 'Fathur Rohman', 'Pemrograman Dasar #2', '2021-05-05', '2021-05-10'),
(16, 'Muhammad Raihan', 'Pemrograman Dasar', '2021-05-05', '2021-05-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(15, 'bagas', '$2y$10$BiG6eqo9Qop19OZwBmpneeUtpPVpeGydnYAug.FiQWg0E.JmmOQx2'),
(16, 'bagasarya', '$2y$10$jL9fkZXBi1NCyIo20Ia1Y..ixp8QdXFLqvh26WA.vK5Bpmh8DsO16'),
(17, 'bagasap', '$2y$10$kbqL/a6J3XgihUx3ckNQoOivfhxZFj7Blzc4RopaXAcG6IkUhmxcm'),
(18, 'admin', '$2y$10$PYiS/4BPG6GwhIcW16gPYurXK96hevw7C7hBo06MInIHwC2Ruzd26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjam` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
