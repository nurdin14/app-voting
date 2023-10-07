-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Sep 2022 pada 01.06
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-voting`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `hasil_vote`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `hasil_vote` (
`nama` char(100)
,`foto` varchar(100)
,`jumlah` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kandidat`
--

CREATE TABLE `tb_kandidat` (
  `id_kandidat` int(11) NOT NULL,
  `nama` char(100) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kandidat`
--

INSERT INTO `tb_kandidat` (`id_kandidat`, `nama`, `visi`, `misi`, `foto`) VALUES
(1, 'Aa Herdi Prayoga', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem at modi dicta aliquam quo vero magni eveniet alias, accusantium cupiditate ad quae perferendis nisi a.', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem at modi dicta aliquam quo vero magni eveniet alias, accusantium cupiditate ad quae perferendis nisi a.', 'avatar.jpg'),
(2, 'Taofik', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem at modi dicta aliquam quo vero magni eveniet alias, accusantium cupiditate ad quae perferendis nisi a.', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem at modi dicta aliquam quo vero magni eveniet alias, accusantium cupiditate ad quae perferendis nisi a.', 'avatar.jpg'),
(3, 'Dendi', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem at modi dicta aliquam quo vero magni eveniet alias, accusantium cupiditate ad quae perferendis nisi a.', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem at modi dicta aliquam quo vero magni eveniet alias, accusantium cupiditate ad quae perferendis nisi a.', 'avatar.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemilih`
--

CREATE TABLE `tb_pemilih` (
  `id_pemilih` int(11) NOT NULL,
  `npm` varchar(12) NOT NULL,
  `nama` char(100) NOT NULL,
  `status` char(12) NOT NULL DEFAULT 'Belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pemilih`
--

INSERT INTO `tb_pemilih` (`id_pemilih`, `npm`, `nama`, `status`) VALUES
(1, '19.14.1.0030', 'Asep Nugraha', 'Sudah'),
(2, '19.14.1.0031', 'Didin Sahidin', 'Belum'),
(3, '19.14.1.0032', 'Aldi', 'Belum'),
(4, '19.14.1.0033', 'Geraldy', 'Belum'),
(5, '19.14.1.0034', 'Aditya N', 'Belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_vote`
--

CREATE TABLE `tb_vote` (
  `id_vote` int(11) NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_vote`
--

INSERT INTO `tb_vote` (`id_vote`, `id_kandidat`, `jumlah`) VALUES
(1, 1, 1),
(2, 3, 3),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Struktur untuk view `hasil_vote`
--
DROP TABLE IF EXISTS `hasil_vote`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hasil_vote`  AS SELECT `tb_kandidat`.`nama` AS `nama`, `tb_kandidat`.`foto` AS `foto`, `tb_vote`.`jumlah` AS `jumlah` FROM (`tb_vote` join `tb_kandidat`) WHERE `tb_vote`.`id_kandidat` = `tb_kandidat`.`id_kandidat``id_kandidat`  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kandidat`
--
ALTER TABLE `tb_kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- Indeks untuk tabel `tb_pemilih`
--
ALTER TABLE `tb_pemilih`
  ADD PRIMARY KEY (`id_pemilih`);

--
-- Indeks untuk tabel `tb_vote`
--
ALTER TABLE `tb_vote`
  ADD PRIMARY KEY (`id_vote`),
  ADD KEY `id_kandidat` (`id_kandidat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kandidat`
--
ALTER TABLE `tb_kandidat`
  MODIFY `id_kandidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pemilih`
--
ALTER TABLE `tb_pemilih`
  MODIFY `id_pemilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_vote`
--
ALTER TABLE `tb_vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_vote`
--
ALTER TABLE `tb_vote`
  ADD CONSTRAINT `tb_vote_ibfk_1` FOREIGN KEY (`id_kandidat`) REFERENCES `tb_kandidat` (`id_kandidat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
