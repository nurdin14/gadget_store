-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Sep 2021 pada 02.53
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan_hp`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `laporan_penjualan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `laporan_penjualan` (
`id_barang` int(11)
,`nama_barang` varchar(220)
,`kategori` varchar(220)
,`tahun` varchar(13)
,`harga` double
,`tanggal` datetime
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(220) NOT NULL,
  `kategori` varchar(220) NOT NULL,
  `tahun` varchar(13) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` double NOT NULL,
  `gambar` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `kategori`, `tahun`, `jumlah`, `harga`, `gambar`) VALUES
(17, 'Oppo A5', 'Oppo', '2019', 98, 1500000, '518-A45.jpg'),
(18, 'Oppo A52', 'Oppo', '2019', 200, 1800000, '769-A52.jpg'),
(19, 'Samsung IP 11', 'Samsung', '2020', 47, 2900000, '800-IP 11.jpg'),
(20, 'Samsung M62', 'Samsung', '2019', 100, 1500000, '135-M62.jpg'),
(21, 'Vivo N10', 'Vivo', '2020', 100, 2300000, '240-N10.jpg'),
(22, 'Vivo R4F', 'Vivo', '2019', 23, 2000000, '951-R4F.jpg'),
(23, 'Xiaomin R5F', 'Xiaomi', '2020', 100, 1200000, '893-R5F.jpg'),
(24, 'Xiaomin XR9C', 'Xiaomi', '2016', 23, 1200000, '758-XR9C.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(220) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kode` varchar(6) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_barang`, `nama_barang`, `harga`, `jumlah`, `kode`, `tanggal`) VALUES
(17, 19, 'Samsung IP 11', 2900000, 7, 'JGca6X', '2021-09-04 07:36:52'),
(18, 17, 'Oppo A5', 1500000, 2, '2grPlk', '2021-09-06 06:32:29');

--
-- Trigger `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pengurangan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET jumlah=jumlah-NEW.jumlah WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_pesanan`, `harga`, `jumlah`, `tanggal`) VALUES
(20, 18, 1500000, 2, '2021-09-06 06:35:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(220) NOT NULL,
  `password` varchar(6) NOT NULL,
  `jk` enum('l','p') NOT NULL,
  `role` enum('Admin','Pegawai','Pelanggan') NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `password`, `jk`, `role`, `no_telp`, `alamat`) VALUES
(1, 'Dede Didin', '123456', 'l', 'Pelanggan', '085722394826', 'Apuy'),
(2, 'Deni Priyadi', 'denipr', 'l', 'Pelanggan', '87878777', 'Maja'),
(3, 'Mita Karmila', 'mita12', 'p', 'Admin', '085722394826', 'Talaga'),
(4, 'Kemal', 'kemal2', 'l', 'Pegawai', '085722394826', 'Talaga'),
(5, 'Deni Priyadi', 'deni23', 'l', 'Pegawai', '0877665', 'Maja'),
(9, 'Adelia', 'adelia', 'p', 'Pelanggan', '098765', 'Maja'),
(11, 'Putri salsa', 'putri1', 'p', 'Pelanggan', '085320942476', 'Cigasong');

-- --------------------------------------------------------

--
-- Struktur untuk view `laporan_penjualan`
--
DROP TABLE IF EXISTS `laporan_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_penjualan`  AS  select `tb_barang`.`id_barang` AS `id_barang`,`tb_pesanan`.`nama_barang` AS `nama_barang`,`tb_barang`.`kategori` AS `kategori`,`tb_barang`.`tahun` AS `tahun`,`tb_pesanan`.`harga` AS `harga`,`tb_pesanan`.`tanggal` AS `tanggal` from (`tb_barang` join `tb_pesanan`) where `tb_pesanan`.`id_barang` = `tb_barang`.`id_barang` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD CONSTRAINT `tb_pesanan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `tb_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
