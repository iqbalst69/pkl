-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2018 at 04:57 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `status` varchar(5) DEFAULT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `tgl_aktif` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`, `status`, `nama`, `tgl_aktif`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Muhammad Iqbal', '2018-08-21'),
(9, 'iqbal', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Muhammad Iqbal', '2018-08-23'),
(10, 'user', 'eefdfbdaeca7001cc19bf7119dd1d444', 'user', 'user', '2018-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `dtlpembelian`
--

CREATE TABLE `dtlpembelian` (
  `id_dtl` int(11) NOT NULL,
  `id_belanja` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtlpembelian`
--

INSERT INTO `dtlpembelian` (`id_dtl`, `id_belanja`, `id_barang`, `harga`, `jumlah`, `total`) VALUES
(5, 1, 6, 12000, 3, 36000),
(6, 1, 2, 25000, 3, 75000);

-- --------------------------------------------------------

--
-- Table structure for table `tblbarang`
--

CREATE TABLE `tblbarang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(40) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbarang`
--

INSERT INTO `tblbarang` (`id_barang`, `nama_barang`, `satuan`) VALUES
(2, 'Buku Kiky ', 'Lusin'),
(3, 'Kertas HVS A4', 'Rim'),
(4, 'Cartridge Printer - Black', 'Unit'),
(5, 'Map', 'Unit'),
(6, 'Ballpoint Pilot Hitam', 'Kotak'),
(7, 'Pensil Greebel', 'Kotak'),
(8, 'Spanduk', 'Meter'),
(9, 'Aqua', 'Kotak'),
(10, 'Nasi Kotak', 'Kotak'),
(11, 'Baliho', 'Meter');

-- --------------------------------------------------------

--
-- Table structure for table `tblbelanja`
--

CREATE TABLE `tblbelanja` (
  `id_belanja` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `id_rekan` int(11) DEFAULT NULL,
  `id_kegiatan` varchar(20) NOT NULL,
  `ket_belanja` varchar(40) NOT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `tgl_belanja` date DEFAULT NULL,
  `tgl_faktur` date DEFAULT NULL,
  `no_faktur` varchar(20) DEFAULT NULL,
  `tgl_beritaacara` date DEFAULT NULL,
  `tgl_penerimaan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbelanja`
--

INSERT INTO `tblbelanja` (`id_belanja`, `id`, `id_rekan`, `id_kegiatan`, `ket_belanja`, `subtotal`, `tgl_belanja`, `tgl_faktur`, `no_faktur`, `tgl_beritaacara`, `tgl_penerimaan`) VALUES
(1, 1, 2, '0177/RS/2018', 'Belanja Alat Tulis Kantor', 111000, '2018-08-27', '2018-08-28', '198/11/100/PO', '2018-08-28', '2018-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `tbljabatan`
--

CREATE TABLE `tbljabatan` (
  `nip` varchar(20) NOT NULL,
  `nama_penjabat` varchar(40) DEFAULT NULL,
  `status_penjabat` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbljabatan`
--

INSERT INTO `tbljabatan` (`nip`, `nama_penjabat`, `status_penjabat`) VALUES
('196308241987031004', 'Bustami, SH', 'Kepala'),
('197105192008012002', 'Dahliana', 'Pengurus Barang'),
('197504092010011001', 'Saifan Muliansyah Putra', 'Bendahara Pengeluaran');

-- --------------------------------------------------------

--
-- Table structure for table `tblkegiatan`
--

CREATE TABLE `tblkegiatan` (
  `id_kegiatan` varchar(20) NOT NULL,
  `nama_kegiatan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkegiatan`
--

INSERT INTO `tblkegiatan` (`id_kegiatan`, `nama_kegiatan`) VALUES
('0177/RS/2018', 'Kegiatan Sosialisasi Teknologi Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `tblpanitia`
--

CREATE TABLE `tblpanitia` (
  `nip` varchar(20) NOT NULL,
  `nama_panitia` varchar(40) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpanitia`
--

INSERT INTO `tblpanitia` (`nip`, `nama_panitia`, `jabatan`) VALUES
('19641061988032002', 'Jumiati, A.W', 'Sekretaris'),
('196509291986031005', 'Izzan, S. Sos', 'Ketua'),
('994573121313', 'Suryadi Bakri', 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `tblrekan`
--

CREATE TABLE `tblrekan` (
  `id_rekan` int(11) NOT NULL,
  `nama_rekan` varchar(40) DEFAULT NULL,
  `alamat_rekan` varchar(40) DEFAULT NULL,
  `kota_rekan` varchar(20) DEFAULT NULL,
  `pemimpin` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblrekan`
--

INSERT INTO `tblrekan` (`id_rekan`, `nama_rekan`, `alamat_rekan`, `kota_rekan`, `pemimpin`) VALUES
(2, 'CV. Rajawali Sakti', 'Jln. T. Nyak Arief  - B. Aceh', 'Banda Aceh', 'Darwana');

-- --------------------------------------------------------

--
-- Table structure for table `tblsementara`
--

CREATE TABLE `tblsementara` (
  `id_sementara` int(11) NOT NULL,
  `id_belanja` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtlpembelian`
--
ALTER TABLE `dtlpembelian`
  ADD PRIMARY KEY (`id_dtl`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_belanja` (`id_belanja`);

--
-- Indexes for table `tblbarang`
--
ALTER TABLE `tblbarang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tblbelanja`
--
ALTER TABLE `tblbelanja`
  ADD PRIMARY KEY (`id_belanja`),
  ADD KEY `id` (`id`),
  ADD KEY `id_rekan` (`id_rekan`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `tbljabatan`
--
ALTER TABLE `tbljabatan`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tblkegiatan`
--
ALTER TABLE `tblkegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tblpanitia`
--
ALTER TABLE `tblpanitia`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tblrekan`
--
ALTER TABLE `tblrekan`
  ADD PRIMARY KEY (`id_rekan`);

--
-- Indexes for table `tblsementara`
--
ALTER TABLE `tblsementara`
  ADD PRIMARY KEY (`id_sementara`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tblbarang`
--
ALTER TABLE `tblbarang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tblrekan`
--
ALTER TABLE `tblrekan`
  MODIFY `id_rekan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblsementara`
--
ALTER TABLE `tblsementara`
  MODIFY `id_sementara` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dtlpembelian`
--
ALTER TABLE `dtlpembelian`
  ADD CONSTRAINT `dtlpembelian_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tblbarang` (`id_barang`),
  ADD CONSTRAINT `dtlpembelian_ibfk_2` FOREIGN KEY (`id_belanja`) REFERENCES `tblbelanja` (`id_belanja`);

--
-- Constraints for table `tblbelanja`
--
ALTER TABLE `tblbelanja`
  ADD CONSTRAINT `tblbelanja_ibfk_1` FOREIGN KEY (`id`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tblbelanja_ibfk_2` FOREIGN KEY (`id_rekan`) REFERENCES `tblrekan` (`id_rekan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tblbelanja_ibfk_3` FOREIGN KEY (`id_kegiatan`) REFERENCES `tblkegiatan` (`id_kegiatan`) ON UPDATE CASCADE;

--
-- Constraints for table `tblsementara`
--
ALTER TABLE `tblsementara`
  ADD CONSTRAINT `tblsementara_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tblbarang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
