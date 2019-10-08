-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2019 at 06:55 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukti_pembayaran`
--

CREATE TABLE `bukti_pembayaran` (
  `id_bukti` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `nama_pengirim` varchar(255) NOT NULL,
  `norek_pengirim` varchar(255) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti_pembayaran`
--

INSERT INTO `bukti_pembayaran` (`id_bukti`, `kode_transaksi`, `nama_pengirim`, `norek_pengirim`, `nama_bank`, `bukti_pembayaran`) VALUES
(3, '17092019NR1INPRA', 'Muhammad Hidayat Ferdiyanto', '6319-0100-1561-606', 'BNI', 'bukti_pembayaran.jpg'),
(4, '17092019W2RXRHD1', 'Arman Maulana Saputra', '6319-0100-1562-505', 'BRI', 'Struk-bukti-transfer-pembayaran.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_menu`
--

CREATE TABLE `daftar_menu` (
  `id_menu` int(11) NOT NULL,
  `kategori_menu` varchar(180) NOT NULL,
  `nama_menu` varchar(180) NOT NULL,
  `harga_menu` varchar(180) NOT NULL,
  `image_menu` varchar(180) NOT NULL,
  `deskripsi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_menu`
--

INSERT INTO `daftar_menu` (`id_menu`, `kategori_menu`, `nama_menu`, `harga_menu`, `image_menu`, `deskripsi`) VALUES
(3, 'Minuman', 'Milkshake', '8000', 'milkshake2.jpg', 'susu + krim'),
(4, 'Makanan', 'Rujak Cingur', '12000', 'rujak_cingur.jpg', 'sayur + bumbu kacang'),
(5, 'Makanan', 'Seblak', '8000', 'seblak-poll-pedas-1.jpg', 'kerupuk basah + kuah ayam pedas');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `metode_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_transaksi` varchar(250) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_user`, `kode_transaksi`, `id_menu`, `qty`, `sub_total`) VALUES
(15, 8, '17092019ONBYEWZX', 3, 1, 8000),
(16, 8, '17092019NR1INPRA', 4, 1, 12000),
(17, 8, '17092019W2RXRHD1', 5, 1, 8000),
(18, 8, '23092019VGV1JMMG', 5, 1, 8000),
(25, 8, '28092019B4F863OX', 3, 1, 8000),
(26, 8, '01102019TO3BSMNA', 3, 1, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE `level_user` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'member'),
(3, 'chef'),
(4, 'driver');

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id_metode` int(11) NOT NULL,
  `nama_metode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id_metode`, `nama_metode`) VALUES
(1, 'Tunai'),
(2, 'Rekening'),
(3, 'menunggu pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pemesan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `total_bayar` varchar(250) NOT NULL,
  `nama_penerima` varchar(250) NOT NULL,
  `email_penerima` varchar(250) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `alamat_penerima` varchar(180) NOT NULL,
  `status_pemesanan` int(11) NOT NULL,
  `metode_pembayaran` int(11) NOT NULL,
  `tanggal_pemesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pemesan`, `kode_transaksi`, `total_bayar`, `nama_penerima`, `email_penerima`, `no_hp`, `alamat_penerima`, `status_pemesanan`, `metode_pembayaran`, `tanggal_pemesanan`) VALUES
(7, 8, '17092019ONBYEWZX', '8,000.00', 'Muhammad Hidayat Ferdiyanto', 'hidayatferdi135@gmail.com', '081234987650', 'Lumajang', 6, 1, '2019-09-17 07:59:35'),
(8, 8, '17092019NR1INPRA', '12,000.00', 'Muhammad Hidayat Ferdiyanto', 'hidayatferdi135@gmail.com', '081234987650', 'Lumajang', 8, 2, '2019-09-17 08:57:53'),
(9, 8, '17092019W2RXRHD1', '8,000.00', 'Muhammad Hidayat Ferdiyanto', 'hidayatferdi135@gmail.com', '081234987650', 'Lumajang', 1, 2, '2019-09-17 15:03:00'),
(10, 8, '23092019VGV1JMMG', '8,000.00', 'Muhammad Hidayat Ferdiyanto', 'hidayatferdi135@gmail.com', '081234987650', 'Lumajang', 1, 2, '2019-09-23 12:23:52'),
(17, 8, '28092019B4F863OX', '8,000.00', 'Muhammad Hidayat Ferdiyanto', 'hidayatferdi135@gmail.com', '081234987650', 'Lumajang', 2, 3, '2019-09-28 17:28:22'),
(18, 8, '01102019TO3BSMNA', '8,000.00', 'Muhammad Hidayat Ferdiyanto', 'hidayatferdi135@gmail.com', '081234987650', 'Lumajang', 2, 3, '2019-10-01 11:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `status_pemesanan`
--

CREATE TABLE `status_pemesanan` (
  `id_status` int(11) NOT NULL,
  `status` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pemesanan`
--

INSERT INTO `status_pemesanan` (`id_status`, `status`) VALUES
(1, 'diproses'),
(2, 'belum dibayar'),
(3, 'sudah dibayar'),
(4, 'dibuat'),
(5, 'diantar'),
(6, 'selesai'),
(7, 'menunggu konfirmasi'),
(8, 'Terkonfirmasi'),
(9, 'selesai dibuat');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(180) NOT NULL,
  `email` varchar(180) NOT NULL,
  `password` varchar(180) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `alamat` varchar(180) NOT NULL,
  `image` varchar(225) NOT NULL,
  `level_user` int(11) NOT NULL,
  `tanggal_pendaftaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `no_hp`, `alamat`, `image`, `level_user`, `tanggal_pendaftaran`) VALUES
(2, 'Arman Maulana Saputra', 'armanmaulanasaputra15@gmail.com', '202cb962ac59075b964b07152d234b70', '089636415060', 'lumajang', 'fruits.jpg', 1, '2019-07-22 02:25:28'),
(3, 'fido', 'kinyonggaming@gmail.com', '04c2b95e39766111fd3d78d97f213e44', '081234567890', 'karangsari, lumajang', 'fido.jpg', 3, '2019-07-22 02:25:28'),
(4, 'aziz', 'aziz@gmail.com', '77f96d74d75182a5a4fa205443bbc7e0', '089876543210', 'gadingsari, lumajang', 'aziz.jpg', 4, '2019-07-22 02:25:28'),
(8, 'Muhammad Hidayat Ferdiyanto', 'hidayatferdi135@gmail.com', '1855c11f044cc8944e8cdac9cae5def8', '081234987650', 'Lumajang', 'Koala.jpg', 2, '2019-07-29 04:38:38'),
(9, 'Ocvian Aditya Purnomo', 'ocvian@gmail.com', '719b055a2b7941b0323db92e0391bd68', '089636415066', 'Lumajang', 'Penguins.jpg', 1, '2019-07-29 04:55:44'),
(10, 'Abdur Rohim', 'abdurrohim@gmail.com', '5e992d335a44732e71ba5ac0659ff372', '089636415061', 'Wonorejo', 'Jellyfish.jpg', 2, '2019-09-20 06:50:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD PRIMARY KEY (`id_bukti`),
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_detail_pemesanan` (`id_pemesanan`),
  ADD KEY `fk_metode_pembayaran` (`metode_pembayaran`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fk_menu` (`id_menu`),
  ADD KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `fk_status` (`status_pemesanan`),
  ADD KEY `fk_pemesan` (`id_pemesan`),
  ADD KEY `fk_kode_transaksi` (`kode_transaksi`),
  ADD KEY `metode_pembayaran` (`metode_pembayaran`);

--
-- Indexes for table `status_pemesanan`
--
ALTER TABLE `status_pemesanan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_level_user` (`level_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `level_user`
--
ALTER TABLE `level_user`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `status_pemesanan`
--
ALTER TABLE `status_pemesanan`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `fk_detail_pemesanan` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_metode_pembayaran` FOREIGN KEY (`metode_pembayaran`) REFERENCES `metode_pembayaran` (`id_metode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_menu` FOREIGN KEY (`id_menu`) REFERENCES `daftar_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_kode_transaksi` FOREIGN KEY (`kode_transaksi`) REFERENCES `keranjang` (`kode_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pemesan` FOREIGN KEY (`id_pemesan`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`status_pemesanan`) REFERENCES `status_pemesanan` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_level_user` FOREIGN KEY (`level_user`) REFERENCES `level_user` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
