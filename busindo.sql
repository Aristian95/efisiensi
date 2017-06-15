-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2017 at 04:07 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `busindo`
--
CREATE DATABASE IF NOT EXISTS `busindo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `busindo`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_ad` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `pass` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_ad`, `username`, `pass`) VALUES
(1, '12141400', '123456'),
(2, '12141417', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `agen_bus`
--

CREATE TABLE IF NOT EXISTS `agen_bus` (
  `kode_agen` varchar(5) NOT NULL,
  `nama_agen` varchar(30) NOT NULL,
  `alamat_agen` varchar(40) NOT NULL,
  `no_telp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agen_bus`
--

INSERT INTO `agen_bus` (`kode_agen`, `nama_agen`, `alamat_agen`, `no_telp`) VALUES
('A1', 'Sumarno', 'Kentungan, Yogyakarta', 2147483647),
('A2', 'Guntur', 'Cilacap', 2147483647),
('A3', 'Rani', 'Purwokerto', 2147483647),
('A5', 'Aris', 'Kebumen', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
  `kode_bus` varchar(5) NOT NULL,
  `jenis_bus` varchar(20) NOT NULL,
  `plat` varchar(10) NOT NULL,
  PRIMARY KEY (`kode_bus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`kode_bus`, `jenis_bus`, `plat`) VALUES
('E11', 'Jetbus Setra HD', 'AA 3344 HH'),
('E12', 'Jetbus SHD 2+', 'AA 9867 HY'),
('E26', 'Jetbus SHD 2+', 'AA 8945 UT'),
('e32', 'Jetbus SHD 2+', 'AA 1234 BJ'),
('E33', 'Jetliner SHD', 'AA 4445 JJ'),
('E48', 'Jetbus SHD 2+', 'AA 4599 FY'),
('E66', 'Jetbus SHD 2+', 'AA 5544 NN'),
('E99', 'Jetbus SHD 2+', 'AA 3232 GS');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_bus`
--

CREATE TABLE IF NOT EXISTS `jadwal_bus` (
  `kode_jadwal` varchar(3) NOT NULL,
  `asal` varchar(15) NOT NULL,
  `tujuan` varchar(15) NOT NULL,
  `jam_keberangkatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_bus`
--

INSERT INTO `jadwal_bus` (`kode_jadwal`, `asal`, `tujuan`, `jam_keberangkatan`) VALUES
('J1', 'Yogyakarta', 'Cilacap', '06.00'),
('J2', 'Cilacap', 'Yogyakarta', '09.00'),
('J3', 'Purwokerto', 'Yogyakarta', '05.00'),
('J4', 'Yogyakarta', 'Purwokerto', '16.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
