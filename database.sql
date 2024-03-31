-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2022 at 04:29 AM
-- Server version: 10.3.32-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemilwai_vote`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_dpkm`
--

CREATE TABLE `data_dpkm` (
  `id` int(11) NOT NULL,
  `nim_ketua` varchar(50) NOT NULL,
  `nm_paslon_ketua` varchar(50) NOT NULL,
  `gambar1` varchar(100) NOT NULL,
  `no_urut2` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_ekm`
--

CREATE TABLE `data_ekm` (
  `id` int(11) NOT NULL,
  `nim_ketua` varchar(50) NOT NULL,
  `nm_paslon_ketua` varchar(50) NOT NULL,
  `gambar1` varchar(100) NOT NULL,
  `nim_wakil` varchar(50) NOT NULL,
  `nm_paslon_wakil` varchar(50) NOT NULL,
  `gambar2` varchar(100) NOT NULL,
  `gambar3` varchar(100) NOT NULL,
  `no_urut` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_fapet`
--

CREATE TABLE `data_fapet` (
  `id` int(11) NOT NULL,
  `nim_ketua` varchar(50) NOT NULL,
  `nm_paslon_ketua` varchar(50) NOT NULL,
  `gambar1` varchar(100) NOT NULL,
  `nim_wakil` varchar(50) NOT NULL,
  `nm_paslon_wakil` varchar(50) NOT NULL,
  `gambar2` varchar(100) NOT NULL,
  `gambar3` varchar(100) NOT NULL,
  `no_urut` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

----------------------------------

--
-- Table structure for table `data_fp`
--

CREATE TABLE `data_fp` (
  `id` int(11) NOT NULL,
  `nim_ketua` varchar(50) NOT NULL,
  `nm_paslon_ketua` varchar(50) NOT NULL,
  `gambar1` varchar(100) NOT NULL,
  `nim_wakil` varchar(50) NOT NULL,
  `nm_paslon_wakil` varchar(50) NOT NULL,
  `gambar2` varchar(100) NOT NULL,
  `gambar3` varchar(100) NOT NULL,
  `no_urut` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_fp`
--
-- --------------------------------------------------------

--
-- Table structure for table `data_fpik`
--

CREATE TABLE `data_fpik` (
  `id` int(11) NOT NULL,
  `nim_ketua` varchar(50) NOT NULL,
  `nm_paslon_ketua` varchar(50) NOT NULL,
  `gambar1` varchar(100) NOT NULL,
  `nim_wakil` varchar(50) NOT NULL,
  `nm_paslon_wakil` varchar(50) NOT NULL,
  `gambar2` varchar(100) NOT NULL,
  `gambar3` varchar(100) NOT NULL,
  `no_urut` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_fpik`
--


-- --------------------------------------------------------

--
-- Table structure for table `selesai`
--

CREATE TABLE `selesai` (
  `selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selesai`
--

INSERT INTO `selesai` (`selesai`) VALUES
('2022-02-02 08:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `selesai_fapet`
--

CREATE TABLE `selesai_fapet` (
  `selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selesai_fapet`
--

INSERT INTO `selesai_fapet` (`selesai`) VALUES
('2022-02-10 09:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `tanggal`
--

CREATE TABLE `tanggal` (
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggal`
--

INSERT INTO `tanggal` (`tanggal`) VALUES
('2022-02-01 08:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `tanggal_fapet`
--

CREATE TABLE `tanggal_fapet` (
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggal_fapet`
--

INSERT INTO `tanggal_fapet` (`tanggal`) VALUES
('2022-02-03 09:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_abstain_dpkm`
--

CREATE TABLE `tbl_abstain_dpkm` (
  `nim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_abstain_ekm`
--

CREATE TABLE `tbl_abstain_ekm` (
  `nim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_abstain_fapet`
--

CREATE TABLE `tbl_abstain_fapet` (
  `nim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_abstain_fapet`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_abstain_fp`
--

CREATE TABLE `tbl_abstain_fp` (
  `nim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_abstain_fp`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_abstain_fpik`
--

CREATE TABLE `tbl_abstain_fpik` (
  `nim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_abstain_fpik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `nim` varchar(50) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `status2` varchar(100) NOT NULL,
  `waktu` varchar(15) NOT NULL,
  `waktu2` varchar(15) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akses`
--

CREATE TABLE `tbl_akses` (
  `nim` varchar(50) NOT NULL,
  `kode_akses` varchar(50) DEFAULT NULL,
  `level` varchar(5) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `tbl_akses_admin`
--

CREATE TABLE `tbl_akses_admin` (
  `nim` varchar(50) NOT NULL,
  `kode_akses` varchar(50) DEFAULT NULL,
  `level` varchar(5) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_akses_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dpkm`
--

CREATE TABLE `tbl_dpkm` (
  `nim` varchar(50) NOT NULL,
  `nomor_paslon2` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dpt`
--

CREATE TABLE `tbl_dpt` (
  `nim` varchar(50) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `status2` varchar(100) NOT NULL,
  `waktu` varchar(15) NOT NULL,
  `waktu2` varchar(15) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ekm`
--

CREATE TABLE `tbl_ekm` (
  `nim` varchar(50) NOT NULL,
  `nomor_paslon` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fapet`
--

CREATE TABLE `tbl_fapet` (
  `nim` varchar(50) NOT NULL,
  `nomor_paslon` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fapet`
--

CREATE TABLE `tbl_fp` (
  `nim` varchar(50) NOT NULL,
  `nomor_paslon` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fp`
--


CREATE TABLE `tbl_fpik` (
  `nim` varchar(50) NOT NULL,
  `nomor_paslon` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fpik`


CREATE TABLE `tbl_login` (
  `nim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_dpkm`
--
ALTER TABLE `data_dpkm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_ekm`
--
ALTER TABLE `data_ekm`
  ADD PRIMARY KEY (`id`,`nim_ketua`);

--
-- Indexes for table `data_fapet`
--
ALTER TABLE `data_fapet`
  ADD PRIMARY KEY (`id`,`nim_ketua`);

--
-- Indexes for table `data_fp`
--
ALTER TABLE `data_fp`
  ADD PRIMARY KEY (`id`,`nim_ketua`);

--
-- Indexes for table `data_fpik`
--
ALTER TABLE `data_fpik`
  ADD PRIMARY KEY (`id`,`nim_ketua`);

--
-- Indexes for table `selesai`
--
ALTER TABLE `selesai`
  ADD PRIMARY KEY (`selesai`);

--
-- Indexes for table `selesai_fapet`
--
ALTER TABLE `selesai_fapet`
  ADD PRIMARY KEY (`selesai`);

--
-- Indexes for table `tanggal`
--
ALTER TABLE `tanggal`
  ADD PRIMARY KEY (`tanggal`);

--
-- Indexes for table `tanggal_fapet`
--
ALTER TABLE `tanggal_fapet`
  ADD PRIMARY KEY (`tanggal`);

--
-- Indexes for table `tbl_abstain_dpkm`
--
ALTER TABLE `tbl_abstain_dpkm`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_abstain_ekm`
--
ALTER TABLE `tbl_abstain_ekm`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_abstain_fapet`
--
ALTER TABLE `tbl_abstain_fapet`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_abstain_fp`
--
ALTER TABLE `tbl_abstain_fp`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_abstain_fpik`
--
ALTER TABLE `tbl_abstain_fpik`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_akses`
--
ALTER TABLE `tbl_akses`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_akses_admin`
--
ALTER TABLE `tbl_akses_admin`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_dpkm`
--
ALTER TABLE `tbl_dpkm`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_dpt`
--
ALTER TABLE `tbl_dpt`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_ekm`
--
ALTER TABLE `tbl_ekm`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_fapet`
--
ALTER TABLE `tbl_fapet`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_fp`
--
ALTER TABLE `tbl_fp`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_fpik`
--
ALTER TABLE `tbl_fpik`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_dpkm`
--
ALTER TABLE `data_dpkm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_ekm`
--
ALTER TABLE `data_ekm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `data_fapet`
--
ALTER TABLE `data_fapet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_fp`
--
ALTER TABLE `data_fp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_fpik`
--
ALTER TABLE `data_fpik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
