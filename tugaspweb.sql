-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2020 pada 06.55
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
-- Database: `tugaspweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bandara`
--

CREATE TABLE `bandara` (
  `id_bandara` int(3) NOT NULL,
  `nama_bandara` varchar(50) NOT NULL,
  `kd_bandara` varchar(3) NOT NULL,
  `id_wilayah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bandara`
--

INSERT INTO `bandara` (`id_bandara`, `nama_bandara`, `kd_bandara`, `id_wilayah`) VALUES
(1, 'Bandar Udara Internasional Soekarno-Hatta', 'CKG', 7),
(2, 'Bandar Udara Internasional Halim Perdanakusuma', 'HLP', 7),
(3, 'Bandar Udara Cibeureum - Tasikmalaya', 'TSY', 1),
(4, 'Bandar Udara Cirebon - Cirebon', 'CBN', 1),
(5, 'Bandar Udara Husein Sastranegara - Bandung', 'BDO', 1),
(6, 'Bandar Udara Adisucipto - DIY', 'JOG', 3),
(7, 'Bandar Udara Achmad Yani - Semarang', 'SRG', 2),
(8, 'Bandar Udara Adisumarmo  - Surakarta', 'SOC', 2),
(9, 'Bandar Udara Internasional Juanda - Surabaya', 'SUB', 4),
(10, 'Bandar Udara Abdul Rachman Saleh - Malang', 'MLG', 4),
(11, 'Bandar Udara Internasional Ngurah Rai - Denpasar', 'DPS', 6),
(12, 'Bandar Udara Trunojoyo - Sumenep', 'SUP', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_psn` int(5) NOT NULL,
  `no_iden` int(20) NOT NULL,
  `jns_iden` varchar(10) NOT NULL,
  `nama_psnfirst` varchar(20) NOT NULL,
  `nama_psnlast` varchar(20) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_tel` int(12) NOT NULL,
  `tgl` date NOT NULL,
  `berangkat` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `pswt` varchar(20) NOT NULL,
  `tarifpsn` int(20) NOT NULL,
  `id_pswt` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_psn`, `no_iden`, `jns_iden`, `nama_psnfirst`, `nama_psnlast`, `jk`, `email`, `no_tel`, `tgl`, `berangkat`, `tujuan`, `pswt`, `tarifpsn`, `id_pswt`) VALUES
(3, 123, '0', '', 'qwd', '1', 'iasgh@awd.awd', 123, '2020-01-15', '6', '8', 'CITILINK', 550000, 8),
(4, 13123, 'Paspor', 'awd', 'qwe', 'Perempuan', 'awd@ad.ca', 14141, '2020-01-28', '3', '2', 'CITILINK', 850000, 2),
(5, 155, 'Paspor', 'qwe', 'qqw', 'Laki-laki', 'awda@aw.adw', 1234, '2020-01-20', '5', '8', 'CITILINK', 550000, 8),
(8, 175, 'Paspor', 'qwe', 'qqw', 'Laki-laki', 'awda@aw.adw', 1234, '2020-01-20', '', '2', 'CITILINK', 850000, 2),
(9, 1514, 'Paspor', 'qwe', 'qqw', 'Laki-laki', 'awda@aw.adw', 1234, '2020-01-20', '', '10', 'CITILINK', 650000, 10),
(14, 1444, 'KTP', 'qd', 'awd', 'Laki-laki', 'qwd@awd.com', 1444414, '2020-01-28', '3', '4', 'CITILINK', 750000, 4),
(15, 14423, 'KTP', 'qd', 'awd', 'Laki-laki', 'qwd@awd.com', 1444414, '2020-01-28', '6', '', 'CITILINK', 750000, 4),
(20, 15555, 'KTP', 'awd', 'qwe', 'Laki-laki', 'awdawd@awda.com', 131315, '2020-01-08', '11', 'CBN', 'CITILINK', 750000, 4),
(21, 1551555, 'KTP', 'awd', 'qwe', 'Laki-laki', 'awdawd@awda.com', 131315, '2020-01-08', 'SRG', 'TSY', 'GARUDA INDONESIA', 900000, 3),
(24, 182718, 'KTP', 'awd', 'qwe', 'Laki-laki', 'awdawd@awda.com', 131315, '2020-01-08', 'SRG', 'CKG', 'GARUDA INDONESIA', 1000000, 1),
(25, 1404511, 'KTP', 'awd', 'qwe', 'Laki-laki', 'awdawd@awda.com', 131315, '2020-01-08', 'BDO', 'HLP', 'CITILINK', 850000, 2),
(26, 13313, 'SIM', 'awd', 'qeqeqe', 'Laki-laki', 'awdad@awda.com', 2147483647, '2020-01-11', 'DPS', 'CKG', 'GARUDA INDONESIA', 1000000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesawat`
--

CREATE TABLE `pesawat` (
  `id_pswt` int(3) NOT NULL,
  `nama_pswt` varchar(50) NOT NULL,
  `id_bandara` int(3) NOT NULL,
  `tarif` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesawat`
--

INSERT INTO `pesawat` (`id_pswt`, `nama_pswt`, `id_bandara`, `tarif`) VALUES
(1, 'GARUDA INDONESIA', 1, 1000000),
(2, 'CITILINK', 1, 850000),
(3, 'GARUDA INDONESIA', 2, 900000),
(4, 'CITILINK', 2, 750000),
(5, 'GARUDA INDONESIA', 3, 600000),
(6, 'CITILINK', 3, 550000),
(7, 'GARUDA INDONESIA', 4, 600000),
(8, 'CITILINK', 4, 550000),
(9, 'GARUDA INDONESIA', 5, 900000),
(10, 'CITILINK', 5, 650000),
(11, 'GARUDA INDONESIA', 6, 950000),
(12, 'CITILINK', 6, 700000),
(13, 'GARUDA INDONESIA', 7, 925000),
(14, 'CITILINK', 7, 700000),
(15, 'GARUDA INDONESIA', 8, 750000),
(16, 'CITILINK', 8, 600000),
(17, 'GARUDA INDONESIA', 9, 1000000),
(18, 'CITILINK', 9, 850000),
(19, 'GARUDA INDONESIA', 10, 925000),
(20, 'CITILINK', 10, 800000),
(21, 'GARUDA INDONESIA', 11, 1125000),
(22, 'CITILINK', 11, 890000),
(23, 'GARUDA INDONESIA', 12, 750000),
(24, 'CITILINK', 12, 600000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(3) NOT NULL,
  `nama_wilayah` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `nama_wilayah`) VALUES
(1, 'Jawa Barat'),
(2, 'Jawa Tengah'),
(3, 'Yogyakarta'),
(4, 'Jawa Timur'),
(5, 'Madura'),
(6, 'Bali'),
(7, 'Jakarta');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bandara`
--
ALTER TABLE `bandara`
  ADD PRIMARY KEY (`id_bandara`),
  ADD UNIQUE KEY `kd_bandara` (`kd_bandara`),
  ADD KEY `id_wilayah` (`id_wilayah`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_psn`),
  ADD UNIQUE KEY `no_iden` (`no_iden`),
  ADD KEY `id_pswt` (`id_pswt`),
  ADD KEY `berangkat` (`berangkat`),
  ADD KEY `tujuan` (`tujuan`);

--
-- Indeks untuk tabel `pesawat`
--
ALTER TABLE `pesawat`
  ADD PRIMARY KEY (`id_pswt`),
  ADD KEY `id_wilayah` (`id_bandara`);

--
-- Indeks untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_psn` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bandara`
--
ALTER TABLE `bandara`
  ADD CONSTRAINT `bandara_ibfk_1` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pswt`) REFERENCES `pesawat` (`id_pswt`);

--
-- Ketidakleluasaan untuk tabel `pesawat`
--
ALTER TABLE `pesawat`
  ADD CONSTRAINT `pesawat_ibfk_1` FOREIGN KEY (`id_bandara`) REFERENCES `bandara` (`id_bandara`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
