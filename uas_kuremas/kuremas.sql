-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 09:15 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuremas`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `idbahan` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `komentar` varchar(5000) DEFAULT NULL,
  `user_id_komentar` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `komentar`, `user_id_komentar`) VALUES
(1, 'enak', 'latif'),
(2, 'orang rumah pada suka resep ini, terimakasih ya', 'latif'),
(3, 'enak', 'admin'),
(4, 'joss', 'admin'),
(5, 'mendolnya masss', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `langkah`
--

CREATE TABLE `langkah` (
  `id` int(11) NOT NULL,
  `langkah_masak` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `id` int(11) NOT NULL,
  `like` varchar(45) DEFAULT NULL,
  `id_user` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`id`, `like`, `id_user`) VALUES
(32, NULL, 'admin'),
(33, NULL, 'admin'),
(34, NULL, 'admin'),
(35, NULL, 'admin'),
(36, NULL, 'admin'),
(37, NULL, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `masakan`
--

CREATE TABLE `masakan` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `url_foto` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masakan`
--

INSERT INTO `masakan` (`id`, `nama`, `url_foto`) VALUES
(1, 'Ote-Ote', 'http://mlatifr.ddns.net/emertech/uas_kuremas/images/ote%20ote.jpg'),
(2, 'mendol', 'https://img-global.cpcdn.com/recipes/2450795_04af2d8290c3abcb/400x400cq70/photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `masakan_id` int(11) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `bahan` varchar(5000) DEFAULT NULL,
  `langkah` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`masakan_id`, `user_id`, `bahan`, `langkah`) VALUES
(1, 'guest', '100 gr Wortel parut korek api\r\n100 gr Kubis iris tipis\r\n50 gr Tauge\r\n2 Batang Daun Bawang\r\n3 Batang Seledri\r\n1 Liter Minyak Goreng\r\nBahan Adonan :\r\n250 gr Tepung Terigu\r\n50 gr Tepung Beras\r\n4 Siung Bawang Putih Halus\r\n3/4 sdt Lada Bubuk\r\n1 sdt Kaldu Bubuk\r\nSecukupnya Garam\r\n1 sdm Gula Pasir\r\nSecukupnya Air', 'Siapkan smua bahan sayuran..sisihkan\r\nSiapkan mangkok besar..taruh smua bahan adonan & air secukupnya..aduk rata hingga kental. Masukkan smua sayuran kemudian aduk rata.\r\nSiapkan minyak panas untuk menggoreng..gunakan sendok sayur untuk menyetak adonan..sebelumnya celupkan sendok sayur kedalam minyak panas dahulu kemudian beri adonan.\r\nCelupkan adonan yang sudah dicetak di sendok sayur kedalam minyak..kemudian goyang-goyangkan sendok sayur hingga adonan terlepas. Goreng adonan ote-ote hingga kuning kecoklatan. Angkat tiriskan..sajikan dengan cabe rawit ataupun sambal petis.'),
(2, 'guest', '100 gram Tempe Kedelai (sudah 4-5 hari dikulkas)\r\n1 lembar Daun Jeruk\r\n2 butir Bawang Merah\r\n1 siung Bawang Putih\r\n1 buah Cabe Rawit / sesuai selera\r\n1/2 sdt Ketumbar\r\n2 cm Kencur\r\nsecukupnya Garam\r\nsecukupnya Minyak', 'Haluskan tempe, tapi tidak terlalu halus. Sisihkan.\r\nHaluskan daun jeruk, bawang merah, bawang putih, cabe rawit, ketumbar, dan kencur.\r\nCampurkan bumbu halus dengan tempe. Tambahkan garam dan penyedap jika suka.\r\nBentuk adonan sesuai selera. Goreng dalam minyak panas dengan api sedang hingga kecoklatan.\r\nSajikan sebagai pendamping makanan. Alhamdulillah mudah bukan.');

-- --------------------------------------------------------

--
-- Table structure for table `resep_has_bahan`
--

CREATE TABLE `resep_has_bahan` (
  `resep_masakan_id` int(11) NOT NULL,
  `resep_user_id` varchar(45) NOT NULL,
  `bahan_idbahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resep_has_komentar`
--

CREATE TABLE `resep_has_komentar` (
  `resep_masakan_id` int(11) NOT NULL,
  `komentar_id` int(11) NOT NULL,
  `resep_user_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep_has_komentar`
--

INSERT INTO `resep_has_komentar` (`resep_masakan_id`, `komentar_id`, `resep_user_id`) VALUES
(1, 3, 'admin'),
(1, 4, 'admin'),
(2, 5, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `resep_has_langkah`
--

CREATE TABLE `resep_has_langkah` (
  `resep_masakan_id` int(11) NOT NULL,
  `resep_user_id` varchar(45) NOT NULL,
  `langkah_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resep_has_like`
--

CREATE TABLE `resep_has_like` (
  `resep_masakan_id` int(11) NOT NULL,
  `like_id` int(11) NOT NULL,
  `like_id_user` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep_has_like`
--

INSERT INTO `resep_has_like` (`resep_masakan_id`, `like_id`, `like_id_user`) VALUES
(1, 32, 'admin'),
(1, 35, 'admin'),
(1, 36, 'admin'),
(1, 37, 'admin'),
(2, 33, 'admin'),
(2, 34, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `id` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `password`) VALUES
('admin', 'admin'),
('guest', 'guest'),
('latif', 'latif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`idbahan`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`,`user_id_komentar`);

--
-- Indexes for table `langkah`
--
ALTER TABLE `langkah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`,`id_user`);

--
-- Indexes for table `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`masakan_id`,`user_id`),
  ADD KEY `fk_makanan_has_user_master_user_master1_idx` (`user_id`),
  ADD KEY `fk_makanan_has_user_master_makanan_idx` (`masakan_id`);

--
-- Indexes for table `resep_has_bahan`
--
ALTER TABLE `resep_has_bahan`
  ADD PRIMARY KEY (`resep_masakan_id`,`resep_user_id`,`bahan_idbahan`),
  ADD KEY `fk_resep_has_bahan_bahan1_idx` (`bahan_idbahan`),
  ADD KEY `fk_resep_has_bahan_resep1_idx` (`resep_masakan_id`,`resep_user_id`);

--
-- Indexes for table `resep_has_komentar`
--
ALTER TABLE `resep_has_komentar`
  ADD PRIMARY KEY (`resep_masakan_id`,`komentar_id`,`resep_user_id`),
  ADD KEY `fk_resep_has_komentar_komentar1_idx` (`komentar_id`,`resep_user_id`),
  ADD KEY `fk_resep_has_komentar_resep1_idx` (`resep_masakan_id`);

--
-- Indexes for table `resep_has_langkah`
--
ALTER TABLE `resep_has_langkah`
  ADD PRIMARY KEY (`resep_masakan_id`,`resep_user_id`,`langkah_id`),
  ADD KEY `fk_resep_has_langkah_langkah1_idx` (`langkah_id`),
  ADD KEY `fk_resep_has_langkah_resep1_idx` (`resep_masakan_id`,`resep_user_id`);

--
-- Indexes for table `resep_has_like`
--
ALTER TABLE `resep_has_like`
  ADD PRIMARY KEY (`resep_masakan_id`,`like_id`,`like_id_user`),
  ADD KEY `fk_resep_has_like_like1_idx` (`like_id`,`like_id_user`),
  ADD KEY `fk_resep_has_like_resep1_idx` (`resep_masakan_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `idbahan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `langkah`
--
ALTER TABLE `langkah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `fk_makanan_has_user_master_makanan` FOREIGN KEY (`masakan_id`) REFERENCES `masakan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_makanan_has_user_master_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `resep_has_bahan`
--
ALTER TABLE `resep_has_bahan`
  ADD CONSTRAINT `fk_resep_has_bahan_bahan1` FOREIGN KEY (`bahan_idbahan`) REFERENCES `bahan` (`idbahan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_resep_has_bahan_resep1` FOREIGN KEY (`resep_masakan_id`,`resep_user_id`) REFERENCES `resep` (`masakan_id`, `user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `resep_has_komentar`
--
ALTER TABLE `resep_has_komentar`
  ADD CONSTRAINT `fk_resep_has_komentar_komentar1` FOREIGN KEY (`komentar_id`,`resep_user_id`) REFERENCES `komentar` (`id`, `user_id_komentar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_resep_has_komentar_resep1` FOREIGN KEY (`resep_masakan_id`) REFERENCES `resep` (`masakan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `resep_has_langkah`
--
ALTER TABLE `resep_has_langkah`
  ADD CONSTRAINT `fk_resep_has_langkah_langkah1` FOREIGN KEY (`langkah_id`) REFERENCES `langkah` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_resep_has_langkah_resep1` FOREIGN KEY (`resep_masakan_id`,`resep_user_id`) REFERENCES `resep` (`masakan_id`, `user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `resep_has_like`
--
ALTER TABLE `resep_has_like`
  ADD CONSTRAINT `fk_resep_has_like_like1` FOREIGN KEY (`like_id`,`like_id_user`) REFERENCES `like` (`id`, `id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_resep_has_like_resep1` FOREIGN KEY (`resep_masakan_id`) REFERENCES `resep` (`masakan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
