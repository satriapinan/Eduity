-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 06:40 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eduity`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `jumlah_materi` int(11) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL DEFAULT 0,
  `rating` float NOT NULL DEFAULT 0,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama`, `kategori`, `jumlah_materi`, `jumlah_siswa`, `rating`, `deskripsi`, `gambar`) VALUES
(1, 'Belajar Pengembangan Aplikasi Android Intermediate', 'Programming', 30, 237, 5, 'Setelah menyelesaikan kelas \"Belajar Pengembangan Aplikasi Android Beginner\", Siswa akan belajar untuk mengembangkan aplikasi android ditahap lanjutan (intermediate).', 'course1.jpeg'),
(2, 'Belajar Membuat Masker dan Sarung Tangan ala Desainer', 'Handycraft', 20, 216, 4.5, 'Siswa akan belajar mengenai cara membuat masker dan sarung tangan modis yang tentu akan berguna di masa pandemi ini.', 'course2.jpg'),
(3, 'Belajar Inovasi Makanan Barat dengan Rempah-Rempah', 'Cooking', 15, 380, 5, 'Siswa akan belajar cara untuk membuat inovasi makanan barat dengan bahan khas timur, yaitu rempah-rempah.', 'course3.jpg'),
(4, 'Belajar Komposisi Warna dalam Lukisan Abstrak', 'Painting', 13, 116, 4.5, 'Siswa akan belajar bagaimana mengkombinasikan warna yang sesuai dalam lukisan abstrak.', 'course4.jpg'),
(5, 'Belajar Prinsip-Prinsip Dasar dalam Menggambar', 'Drawing', 10, 157, 4, 'Siswa akan belajar mengenai prinsip-prinsip dasar dalam menggambar serta mengaplikasikannya.', 'course5.jpg'),
(6, 'Belajar Dasar Musik dari Lagu Pop Indonesia Era 2000-an', 'Music', 15, 345, 5, 'Siswa akan belajar mengenai dasar-dasar dalam bermusik melalui lagu pop Indonesia era 2000-an.', 'course6.jpg'),
(12, 'Testing', 'Programming', 30, 0, 0, 'testing', 'course7_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_pilihan`
--

CREATE TABLE `kelas_pilihan` (
  `id_kelas_pilihan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `langganan`
--

CREATE TABLE `langganan` (
  `id_langganan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `total_hari` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `langganan`
--

INSERT INTO `langganan` (`id_langganan`, `nama`, `total_hari`, `harga`) VALUES
(1, 'One month', 30, 500000),
(2, 'Six month', 180, 3000000),
(3, 'Three month', 90, 1500000),
(4, 'One Year', 365, 4500000),
(11, 'langganan_testing', 30, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_langganan` int(11) NOT NULL,
  `id_promo` int(11) DEFAULT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id_promo` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `persen_promo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `nama`, `persen_promo`) VALUES
(1, 'PROMOUAS', 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'user.png',
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `password`, `gambar`, `role`) VALUES
(3, 'John Doe', 'sijohn', 'johnd@gmail.com', '$2y$10$.IEa7BId4mUZV62Aer6dhOtRHJ.BasC2PuY4fA0dddUfBVHG/KOzi', 'user.png', 0),
(7, 'Satria Pinandita Abyatarsyah', 'satriapinan', 'satriapinan@gmail.com', '$2y$10$8g.JVZa27RFVe7/buNors.Zs6wTn7oaDEEp1zz844fK8oyYb98/MG', 'user.png', 0),
(11, 'Tiana Budianto', 'tiana', 'tianab@gmail.com', '$2y$10$oTp2/OWEERQHr7hIod2u2uJEmvRMq.XhQglv0pfKhhXHVi2Cd5GNa', 'user.png', 0),
(12, 'Rakha', 'rakha', 'rakha@gmail.com', '$2y$10$zIki050x2heHLXR1FZVuVOdEoVisZYVTcqKdeGUSzghtrsvjv/iwm', 'user.png', 0),
(13, 'admin', 'admin', 'admin@gmail.com', '$2y$10$2cKvyMmQEr6x9YvlvwFzTuhjXYEgkjILS9bscNJtYfqiHlayqMLmq', 'user.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_pilihan`
--
ALTER TABLE `kelas_pilihan`
  ADD PRIMARY KEY (`id_kelas_pilihan`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `langganan`
--
ALTER TABLE `langganan`
  ADD PRIMARY KEY (`id_langganan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_langganan` (`id_langganan`),
  ADD KEY `id_promo` (`id_promo`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kelas_pilihan`
--
ALTER TABLE `kelas_pilihan`
  MODIFY `id_kelas_pilihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `langganan`
--
ALTER TABLE `langganan`
  MODIFY `id_langganan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas_pilihan`
--
ALTER TABLE `kelas_pilihan`
  ADD CONSTRAINT `kelas_pilihan_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_pilihan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_langganan`) REFERENCES `langganan` (`id_langganan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_promo`) REFERENCES `promo` (`id_promo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
