-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2021 pada 13.13
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir_buk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` varchar(25) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` varchar(10) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `nama_admin`, `username`, `password`, `hak_akses`, `img`) VALUES
('AD001', 'admin1', 'admin', 'admin', 'admin', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_det_servis`
--

CREATE TABLE `t_det_servis` (
  `id_servis` char(100) NOT NULL,
  `nama_brg` varchar(30) NOT NULL,
  `kerusakan` varchar(100) NOT NULL,
  `kelengkapan` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_det_servis`
--

INSERT INTO `t_det_servis` (`id_servis`, `nama_brg`, `kerusakan`, `kelengkapan`, `qty`) VALUES
('SV202111018', 'dsds', 'sdsd', 'sdsd', 1),
('SV202111019', 'ff', 'ff', 'ff', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jasa`
--

CREATE TABLE `t_jasa` (
  `id_jasa` varchar(25) NOT NULL,
  `id_kategori` varchar(25) NOT NULL,
  `nama_jasa` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_jasa`
--

INSERT INTO `t_jasa` (`id_jasa`, `id_kategori`, `nama_jasa`, `harga`) VALUES
('IJ002', 'KT001', 'Upgrade RAM', 30000),
('IJ005', 'KT001', 'Instal Aplikasi', 25000),
('IJ006', 'KT001', 'Ganti RAM', 30000),
('IJ007', 'KT001', 'Ganti Power Supply', 30000),
('IJ010', 'KT002', 'Upgrade RAM', 30000),
('IJ014', 'KT002', 'Ganti LCD', 50000),
('IJ015', 'KT003', 'Inpus Printer', 75000),
('IJ016', 'KT003', 'Instal Driver Printer', 35000),
('IJ017', 'KT003', 'Reset Printer', 50000),
('IJ018', 'KT003', 'Refill Toner', 90000),
('IJ019', 'KT001', 'Ganti Hardisk', 30000),
('IJ022', 'KT001', 'Instal Ulang ', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kategori`
--

CREATE TABLE `t_kategori` (
  `id_kategori` varchar(25) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kategori`
--

INSERT INTO `t_kategori` (`id_kategori`, `nama_kategori`) VALUES
('KT001', 'KOMPUTER'),
('KT002', 'LAPTOP'),
('KT003', 'PRINTER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pelanggan`
--

CREATE TABLE `t_pelanggan` (
  `id_pelanggan` varchar(25) NOT NULL,
  `nama_pelanggan` varchar(35) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pelanggan`
--

INSERT INTO `t_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_hp`, `alamat`) VALUES
('PLG20200001', 'Ryan Arya', 2147483647, 'Jl Siliwangi No 145 Bandung'),
('PLG20200002', 'Jaya Ardiyansyah', 2147483647, 'Jl Antapani No 45 Bekasi'),
('PLG20210004', 'Febri Supriatna', 2147483647, 'Jl medan merdeka, jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_servis_head`
--

CREATE TABLE `t_servis_head` (
  `id_servis` varchar(25) NOT NULL,
  `tanggal_servis` date NOT NULL,
  `id_pelanggan` varchar(25) NOT NULL,
  `id_admin` varchar(25) NOT NULL,
  `status` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_servis_head`
--

INSERT INTO `t_servis_head` (`id_servis`, `tanggal_servis`, `id_pelanggan`, `id_admin`, `status`) VALUES
('SV202001003', '2020-01-30', 'PLG20200002 ', 'AD001', 'dibayar'),
('SV202001004', '2020-01-30', 'PLG20200001 ', 'AD001', 'dibayar'),
('SV202001005', '2020-01-30', 'PLG20200001 ', 'AD001', 'dibayar'),
('SV202002006', '2020-02-06', 'PLG20200002 ', 'AD001', 'dibayar'),
('SV202002007', '2020-02-06', 'PLG20200001 ', 'AD001', 'dibayar'),
('SV202110008', '2021-10-31', 'PLG20200001 ', 'AD001', 'dibayar'),
('SV202110009', '2021-10-31', 'PLG20200002 ', 'AD001', 'dibayar'),
('SV202110010', '2021-10-31', 'PLG20200002 ', 'AD001', 'dibayar'),
('SV202110011', '2021-10-31', 'PLG20210004 ', 'AD001', 'dibayar'),
('SV202111012', '2021-11-02', 'PLG20200002 ', 'AD001', 'batal'),
('SV202111013', '2021-11-02', 'PLG20200002 ', 'AD001', 'dibayar'),
('SV202111014', '2021-11-06', 'PLG20200001 ', 'AD001', 'dibayar'),
('SV202111015', '2021-11-06', 'PLG20200001 ', 'AD001', 'dibayar'),
('SV202111016', '2021-11-06', 'PLG20200001 ', 'AD001', 'dibayar'),
('SV202111017', '2021-11-06', 'PLG20200001 ', 'AD001', 'dibayar'),
('SV202111018', '2021-11-10', 'PLG20200001 ', 'AD001', 'dibayar'),
('SV202111019', '2021-11-11', 'PLG20200001 ', 'AD001', 'dibayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sparepart`
--

CREATE TABLE `t_sparepart` (
  `id_sparepart` varchar(25) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_sparepart`
--

INSERT INTO `t_sparepart` (`id_sparepart`, `id_kategori`, `nama`, `harga`) VALUES
('SP011', 'KT002', 'Keyboard HP Pavilion G6', 100000),
('SP012', 'KT002', 'Keyboard Lenovo V470', 250000),
('SP019', 'KT003', 'Catridge Canon 811', 250000),
('SP021', 'KT002', 'Baterai Lenovo Idea Pad', 250000),
('SP022', 'KT001', 'RAM 2GB DDR3', 300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trans_det_jasa`
--

CREATE TABLE `t_trans_det_jasa` (
  `id_transaksi` varchar(25) NOT NULL,
  `id_jasa` varchar(25) NOT NULL,
  `nama_jasa` varchar(15) NOT NULL,
  `id_servis` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trans_det_jasa`
--

INSERT INTO `t_trans_det_jasa` (`id_transaksi`, `id_jasa`, `nama_jasa`, `id_servis`, `harga`, `qty`, `sub_total`) VALUES
('TRSV202111019', 'IJ002', 'Upgrade RAM', 'SV202111019', 30000, 1, 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trans_det_sparepart`
--

CREATE TABLE `t_trans_det_sparepart` (
  `id_transaksi` varchar(25) NOT NULL,
  `id_sparepart` varchar(25) NOT NULL,
  `nama_sparepart` varchar(15) NOT NULL,
  `id_servis` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trans_det_sparepart`
--

INSERT INTO `t_trans_det_sparepart` (`id_transaksi`, `id_sparepart`, `nama_sparepart`, `id_servis`, `harga`, `qty`, `sub_total`) VALUES
('TRSV202111018', 'SP022', 'RAM 2GB DDR3', 'SV202111018', 300000, 1, 300000),
('TRSV202111018', 'SP022', 'RAM 2GB DDR3', 'SV202111018', 300000, 1, 300000),
('TRSV202111019', 'SP022', 'RAM 2GB DDR3', 'SV202111019', 300000, 1, 300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trans_head`
--

CREATE TABLE `t_trans_head` (
  `id_transaksi` varchar(100) NOT NULL,
  `id_servis` varchar(100) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `jumlah_total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `id_admin` varchar(25) NOT NULL,
  `ket` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trans_head`
--

INSERT INTO `t_trans_head` (`id_transaksi`, `id_servis`, `tanggal_bayar`, `nama_pelanggan`, `jumlah_total`, `bayar`, `kembalian`, `id_admin`, `ket`) VALUES
('TRSV202111018', 'SV202111018', '2021-11-11', 'Ryan Arya', 600000, 850000, 250000, 'AD001', 'lunas'),
('TRSV202111019', 'SV202111019', '2021-11-11', 'Ryan Arya', 330000, 450000, 120000, 'AD001', 'lunas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `t_det_servis`
--
ALTER TABLE `t_det_servis`
  ADD KEY `id_servis` (`id_servis`);

--
-- Indeks untuk tabel `t_jasa`
--
ALTER TABLE `t_jasa`
  ADD PRIMARY KEY (`id_jasa`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `t_servis_head`
--
ALTER TABLE `t_servis_head`
  ADD PRIMARY KEY (`id_servis`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `t_servis_head_ibfk_2` (`id_admin`),
  ADD KEY `id_pelanggan_2` (`id_pelanggan`);

--
-- Indeks untuk tabel `t_sparepart`
--
ALTER TABLE `t_sparepart`
  ADD PRIMARY KEY (`id_sparepart`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `t_trans_det_jasa`
--
ALTER TABLE `t_trans_det_jasa`
  ADD KEY `id_jasa` (`id_jasa`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `t_trans_det_sparepart`
--
ALTER TABLE `t_trans_det_sparepart`
  ADD KEY `id_sparepart` (`id_sparepart`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `t_trans_head`
--
ALTER TABLE `t_trans_head`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_servis` (`id_servis`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_jasa`
--
ALTER TABLE `t_jasa`
  ADD CONSTRAINT `t_jasa_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `t_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_servis_head`
--
ALTER TABLE `t_servis_head`
  ADD CONSTRAINT `t_servis_head_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `t_admin` (`id_admin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `t_sparepart`
--
ALTER TABLE `t_sparepart`
  ADD CONSTRAINT `t_sparepart_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `t_kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_trans_det_jasa`
--
ALTER TABLE `t_trans_det_jasa`
  ADD CONSTRAINT `t_trans_det_jasa_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `t_trans_head` (`id_transaksi`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_trans_det_sparepart`
--
ALTER TABLE `t_trans_det_sparepart`
  ADD CONSTRAINT `t_trans_det_sparepart_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `t_trans_head` (`id_transaksi`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_trans_head`
--
ALTER TABLE `t_trans_head`
  ADD CONSTRAINT `t_trans_head_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `t_admin` (`id_admin`) ON UPDATE CASCADE,
  ADD CONSTRAINT `t_trans_head_ibfk_4` FOREIGN KEY (`id_servis`) REFERENCES `t_servis_head` (`id_servis`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
