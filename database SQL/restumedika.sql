-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2020 at 06:01 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restumedika`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id_config` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id_config`, `title`, `content`) VALUES
(1, 'title', 'Klinik Umum Restu Medika Daerah Klaten'),
(2, 'deskripsi', 'Klinik Umum Restu Medika Daerah Klaten'),
(3, 'keyword', 'Klinik Umum Restu Medika Daerah Klaten'),
(4, 'sambutan', '<p>Assalam mu’alaikum wr. wb.</p>Puji syukur rahmad dan karunia Allah SWT sehingga kami dapat menerbitkan website resmi Klinik Umum Restu Medika Daerah Klaten sebagai sarana informasi dan komunikasi up-date. <br /><br />Kami berharap, dengan adanya media layanan informasi situs ini semoga dapat mewujudkan hubungan silaturrahmi yang lebih erat lagi, menambah wawasan, mempermudah dan mempercepat proses dalam mendapatkan info yang dibutuhkan.'),
(5, 'direktur', 'Prof. Dr. Hendra Marudama, M.Si'),
(6, 'alamat', '<p>Jl. Gor Karanganom No.Trono Tempursari\r\nNgawen <br />\r\nKlaten Jawa Tengah 57466 Indonesia<br /> E-mail : humas [at] rszud.com<br /> Telepon: (0651) 755-3205 Fax : (0651) 755-4229 </p>'),
(7, 'footer', '<p>© 2017 Rumah Sakit Umum Daerah Zainoel Abidin - All Rights Reserved</p>'),
(8, 'kontak', '082214688281'),
(9, 'email', 'gibransam@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `t_berobat`
--

CREATE TABLE `t_berobat` (
  `id_berobat` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tgl_berobat` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_berobat`
--

INSERT INTO `t_berobat` (`id_berobat`, `id_pasien`, `id_dokter`, `tgl_berobat`, `status`) VALUES
(2, 44, 4, '2017-04-10', 'Sudah'),
(3, 49, 1, '2017-04-10', 'Sudah'),
(4, 44, 6, '2017-04-11', 'Sudah'),
(5, 44, 1, '2017-04-16', 'Sudah'),
(6, 44, 6, '2017-04-23', 'Sudah'),
(7, 50, 1, '2017-04-19', 'Sudah'),
(8, 49, 5, '2017-04-23', 'Sudah'),
(13, 54, 5, '2020-08-07', 'Belum'),
(14, 51, 4, '2020-08-07', 'Belum'),
(16, 55, 4, '2020-08-07', 'Sudah'),
(17, 57, 1, '2020-08-07', 'Sudah'),
(18, 59, 6, '2020-08-11', 'Sudah'),
(19, 52, 6, '2020-08-11', 'Sudah'),
(20, 50, 6, '2020-08-11', 'Belum'),
(22, 53, 5, '2020-08-24', 'Belum'),
(23, 49, 5, '2020-08-27', 'Sudah'),
(24, 49, 5, '2020-08-27', 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `t_diagnosa`
--

CREATE TABLE `t_diagnosa` (
  `id_diagnosa` int(11) NOT NULL,
  `data_keluhan` text NOT NULL,
  `resep` text NOT NULL,
  `tindakan` text NOT NULL,
  `data_diagnosa` text NOT NULL,
  `tgl_diagnosa` date NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_diagnosa`
--

INSERT INTO `t_diagnosa` (`id_diagnosa`, `data_keluhan`, `resep`, `tindakan`, `data_diagnosa`, `tgl_diagnosa`, `id_dokter`, `id_pasien`) VALUES
(1, 'Telinga mendengung', '', '', 'Terdapat benda asing di telinga pasien', '2017-04-10', 4, 44),
(2, 'Gigi sering ngilu ketika mengkonsumsi makanan / minuman bersuhu ekstrim, selain itu, ketika menggosok gigi, gusi sering berdarah.', '', '', 'Pasien merupakan penderita gigi sensitif, dimana saraf pada gigi akan lebih sensitif terhadap suhu makanan / minuman yang tidak berada dalam suhu ruangan.', '2017-04-11', 6, 44),
(3, 'Kulit gatal-gatal, terdapat bintik-bintik merah di seluruh tubuh.', '', '', 'Pasien alergi terhadap makanan laut, sehingga tubuhnya akan menolak asupan yang berasal dari laut.', '2017-04-10', 1, 49),
(4, 'Kulit sering memerah', '', '', 'Pasien mengalami alergi terhadap sinar matahari', '2017-04-16', 1, 44),
(5, 'Kulit sering muncul bintik-bintik ketika telah selesai beraktivitas cukup lama dengan mengenakan kemeja', '', '', 'Pasien mengalami biang keringat saat suhu tubuh meningkat', '2017-04-19', 1, 50),
(6, 'Gusi berdarah ketika menggosok gigi', '', '', 'Terdapat bakteri yang mengendap di dalam gusi', '2017-04-23', 6, 44),
(7, 'Mudah lelah ketika beraktivitas yang fokus pada fisik.', '', '', 'Terjadi penyempitan pada pembuluh darah.', '2017-04-23', 5, 49),
(8, 'Telinga kemasukan air', '', '', 'Telinga Pasien kemasukan air saat sedang menyelam', '2020-08-07', 4, 55),
(9, 'Kulit Merah bintik-bintik', '', '', 'Terkena Penyakit Alergi', '2020-08-07', 1, 57),
(10, 'Gigi Berlubang', '', '', 'Terlalu banyak makan permen', '2020-08-11', 6, 59),
(11, 'Saat makan gigi geraham sakit dan sulit mengunyah', '', '', 'gigi geraham berlubang', '2020-08-11', 6, 52),
(12, 'sakit paru paru', 'paracetamol', 'dirawat inap', 'bronkitis', '2020-08-27', 5, 49);

-- --------------------------------------------------------

--
-- Table structure for table `t_dokter`
--

CREATE TABLE `t_dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `spesialis_dokter` varchar(50) NOT NULL,
  `tgllahir_dokter` date NOT NULL,
  `alamat_dokter` text NOT NULL,
  `notelp_dokter` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_dokter`
--

INSERT INTO `t_dokter` (`id_dokter`, `nama_dokter`, `spesialis_dokter`, `tgllahir_dokter`, `alamat_dokter`, `notelp_dokter`) VALUES
(1, 'Dr. Hendra Ridwan', 'Kulit', '1980-08-01', 'Komp. Margahayu Raya Jl. Pluto Raya 89 Blok C No. 32 Kel. Margasari Kec. Buah Batu Bandung 40286', '081321395140'),
(4, 'Dr. Agus Firmansyah', 'THT', '1977-03-01', 'Komp. Batu Raden Jl. Batu Jaya VII No. 4 Bandung', '085624761675'),
(5, 'Dr. Adi Wijaya', 'Jantung', '1981-12-12', 'Komp. Buah Batu Regency Blok C No. 45 Bandung', '081321764857'),
(6, 'Drg. Sandi Kurnia', 'Gigi', '1984-10-22', 'Jl. Cijagra No. 84 Bandung', '087798766789');

-- --------------------------------------------------------

--
-- Table structure for table `t_medis`
--

CREATE TABLE `t_medis` (
  `id_item_medis` int(11) NOT NULL,
  `nama_item_medis` varchar(30) NOT NULL,
  `kuantitas_item_medis` int(11) NOT NULL,
  `tanggal_kadaluarsa_item_medis` date NOT NULL,
  `harga_jual_item_medis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_medis`
--

INSERT INTO `t_medis` (`id_item_medis`, `nama_item_medis`, `kuantitas_item_medis`, `tanggal_kadaluarsa_item_medis`, `harga_jual_item_medis`) VALUES
(1, 'Infus 500ml', 112, '2018-03-14', 24000),
(4, 'Tabung Oksigen 35kg', 64, '2018-05-09', 360550),
(5, 'Perban (Roll)', 122, '2020-04-21', 25000),
(8, 'Tabung Oksigen', 200, '2021-08-11', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `t_obat`
--

CREATE TABLE `t_obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jenis_obat` varchar(15) NOT NULL,
  `tglkadaluarsa_obat` date NOT NULL,
  `hargajual_obat` int(11) NOT NULL,
  `stok_obat` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_obat`
--

INSERT INTO `t_obat` (`id_obat`, `nama_obat`, `jenis_obat`, `tglkadaluarsa_obat`, `hargajual_obat`, `stok_obat`, `satuan`) VALUES
(3, 'Paracetamol', 'Tablet', '2020-06-30', 1500, 281, 'Dus'),
(4, 'Eritromisin', 'Sirup', '2018-08-08', 18000, 50, 'Dus'),
(8, 'Sulfasalazine', 'Tablet', '2019-02-26', 2300, 230, 'Botol'),
(10, 'Flumetason', 'Kapsul', '2018-04-30', 5000, 400, 'Strip'),
(11, 'Amphitarine', 'Pil', '2018-03-02', 1950, 160, 'Botol'),
(12, 'Chloritine', 'Kapsul', '2019-11-28', 2350, 210, 'Sachet'),
(13, 'panadol', 'Pil', '2017-04-29', 5000, 13, 'Botol'),
(14, 'tolak angin', 'Sirup', '2020-08-21', 2500, 1000, 'Strip'),
(15, 'Clemastine', 'Pil', '2020-08-11', 20000, 20, 'Dus'),
(16, 'Antihistamin', 'Bubuk', '2020-08-12', 3000, 4, 'Sachet'),
(18, 'Antihistamin', 'Tablet', '2021-08-20', 100000, 200, 'Dus');

-- --------------------------------------------------------

--
-- Table structure for table `t_pasien`
--

CREATE TABLE `t_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(35) NOT NULL,
  `jeniskelamin_pasien` varchar(15) NOT NULL,
  `tmptlahir_pasien` varchar(20) NOT NULL,
  `tgllahir_pasien` date NOT NULL,
  `alamat_pasien` varchar(255) NOT NULL,
  `goldar_pasien` varchar(2) NOT NULL,
  `notelp_pasien` varchar(13) NOT NULL,
  `usia_pasien` int(3) NOT NULL,
  `statuspernikahan_pasien` varchar(15) NOT NULL,
  `pekerjaan_pasien` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pasien`
--

INSERT INTO `t_pasien` (`id_pasien`, `nama_pasien`, `jeniskelamin_pasien`, `tmptlahir_pasien`, `tgllahir_pasien`, `alamat_pasien`, `goldar_pasien`, `notelp_pasien`, `usia_pasien`, `statuspernikahan_pasien`, `pekerjaan_pasien`) VALUES
(44, 'Shafira Elhazima', 'Perempuan', 'Sumedang', '1998-07-30', 'Komp. Buah Batu Regency Blok D3 No. 1', 'B', '087824660356', 22, 'Belum Menikah', 'Pegawai Swasta'),
(49, 'Muhammad Derry Salman Syahid', 'Laki-laki', 'Surabaya', '1997-09-09', 'Jl. Buah Batu No. 217 Bandung', 'A', '081223450444', 25, 'Belum Menikah', 'Pegawai Swasta'),
(50, 'Taufik Hidayat', 'Laki-laki', 'Pangalengan', '1985-10-15', 'Jl. Gatot Subroto No. 135 Jakarta', 'AB', '087767899876', 31, 'Menikah', 'Lain-lain'),
(51, 'Budi Kurniawan', 'Laki-laki', 'Bandung', '1994-06-21', 'Bandung', 'A', '081443657686', 22, 'Belum Menikah', 'PNS'),
(52, 'Aditya Alaska', 'Laki-laki', 'Klaten', '2020-08-04', 'Delanggu Baru, Delanggu, Klaten', 'AB', '0272551433', 0, 'Belum Menikah', 'Wiraswasta'),
(53, 'Gibransam', 'Laki-laki', 'Klaten', '1997-03-07', 'Delanggu Baru, Delanggu, Klaten', 'O', '08242424245', 23, 'Belum Menikah', 'Wiraswasta'),
(54, 'Imam Rifa''i', 'Laki-laki', 'Klaten', '1970-11-10', 'Delanggu Baru, Delanggu, Klaten', 'AB', '08223535342', 49, 'Belum Menikah', 'Lain-lain'),
(55, 'Suryanti', 'Perempuan', 'Klaten', '1970-10-10', 'Delanggu Baru, Delanggu, Klaten', 'AB', '2242453543', 49, 'Menikah', 'Lain-lain'),
(56, 'Samidi', 'Laki-laki', 'Klaten', '2020-08-04', 'Delanggu Baru, Delanggu', 'AB', '08242424245', 0, 'Belum Menikah', 'Pegawai Swasta'),
(57, 'Aditya Alaska', 'Laki-laki', 'Klaten, Jawa Tengah', '2020-08-04', 'Delanggu Baru, Delanggu, Klaten', 'AB', '08242424245', 0, 'Belum Menikah', 'Wiraswasta'),
(58, 'Percobaan', 'Laki-laki', 'Klaten', '2020-03-18', 'coba-coba', 'A', '08242424245', 0, 'Belum Menikah', 'Wiraswasta'),
(59, 'Khalifasya', 'Laki-laki', 'Klaten', '2020-08-11', 'Klaten, Jwa Tengah', 'O', '08242424245', 0, 'Belum Menikah', 'Wiraswasta');

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan`
--

CREATE TABLE `t_penjualan` (
  `id_penjualan` int(10) NOT NULL,
  `id_obat` int(10) NOT NULL,
  `nama_obat` varchar(20) NOT NULL,
  `jumlah_beli` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_penjualan`
--

INSERT INTO `t_penjualan` (`id_penjualan`, `id_obat`, `nama_obat`, `jumlah_beli`) VALUES
(1, 3, 'Paracetamol', 2),
(3, 4, 'Eritromisin', 10),
(4, 16, 'Antihistamin', 6);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `username_user` varchar(20) NOT NULL,
  `password_user` varchar(255) DEFAULT NULL,
  `level_user` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`username_user`, `password_user`, `level_user`) VALUES
('1', 'c4ca4238a0b923820dcc509a6f75849b', 'dokter'),
('4', 'a87ff679a2f3e71d9181a67b7542122c', 'dokter'),
('5', 'e4da3b7fbbce2345d7772b0674a318d5', 'dokter'),
('6', '1679091c5a880faf6fb5e6087eb1b2dc', 'dokter'),
('cheryl', 'abaebd4b81a6f982ccdfc52dda1823dd', 'pendaftaran'),
('foster', '96853c0e2dd18a1ef79b19f485d60290', 'direktur'),
('vanessa', '282bbbfb69da08d03ff4bcf34a94bc53', 'logistik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `t_berobat`
--
ALTER TABLE `t_berobat`
  ADD PRIMARY KEY (`id_berobat`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `t_diagnosa`
--
ALTER TABLE `t_diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `t_dokter`
--
ALTER TABLE `t_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `t_medis`
--
ALTER TABLE `t_medis`
  ADD PRIMARY KEY (`id_item_medis`);

--
-- Indexes for table `t_obat`
--
ALTER TABLE `t_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `t_pasien`
--
ALTER TABLE `t_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`username_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `t_berobat`
--
ALTER TABLE `t_berobat`
  MODIFY `id_berobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `t_diagnosa`
--
ALTER TABLE `t_diagnosa`
  MODIFY `id_diagnosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `t_dokter`
--
ALTER TABLE `t_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_medis`
--
ALTER TABLE `t_medis`
  MODIFY `id_item_medis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_obat`
--
ALTER TABLE `t_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `t_pasien`
--
ALTER TABLE `t_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  MODIFY `id_penjualan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_berobat`
--
ALTER TABLE `t_berobat`
  ADD CONSTRAINT `t_berobat_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `t_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_berobat_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `t_dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_diagnosa`
--
ALTER TABLE `t_diagnosa`
  ADD CONSTRAINT `fk_dokter_diagnosa` FOREIGN KEY (`id_dokter`) REFERENCES `t_dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pasien_diagnosa` FOREIGN KEY (`id_pasien`) REFERENCES `t_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
