-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 21, 2015 at 09:23 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `destinasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propinsi_id` int(11) NOT NULL,
  `nama_kota` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_kota` (`propinsi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `propinsi_id`, `nama_kota`) VALUES
(1, 1, 'Kodya Yogyakarta'),
(2, 1, 'Sleman'),
(3, 1, 'Bantul'),
(4, 1, 'Kulon Progo'),
(5, 2, 'Klaten'),
(6, 2, 'Magelang'),
(8, 3, 'Bandung'),
(11, 3, 'Cirebon');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propinsi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `propinsi`) VALUES
(1, 'Daerah Istimewa Yogyakarta'),
(2, 'Jawa Tengah'),
(3, 'Jawa Barat'),
(4, 'Jawa Timur'),
(5, 'Banten');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE IF NOT EXISTS `tbl_pegawai` (
  `nip` int(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`nip`, `nama`, `alamat`, `tanggal_lahir`, `agama`) VALUES
(1038921, 'Paijo', 'Bantul', '1998-01-30', 'Islam'),
(1038922, 'Ahmad', 'Sleman', '1993-05-12', 'Islam'),
(1038923, 'Alif Benden Arnado', 'Klaten', '1994-11-13', 'Islam'),
(1038924, 'Akbar Bondan Permana', 'Tangerang', '2000-09-01', 'Islam');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `FK_kota` FOREIGN KEY (`propinsi_id`) REFERENCES `provinsi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
