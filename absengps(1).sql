-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2022 at 09:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absengps`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` int(255) NOT NULL,
  `pangkat` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `nama`, `nip`, `pangkat`, `longitude`, `latitude`, `jam`, `tanggal`) VALUES
(2, 'hasan zain', 243242, 'asdasds', '111.7973506', '-8.1172776', '02:54:34', '2022-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `location_range`
--

CREATE TABLE `location_range` (
  `id` int(11) NOT NULL,
  `longitudeMin` varchar(255) NOT NULL,
  `latitudeMin` varchar(255) NOT NULL,
  `longitudeMax` varchar(255) NOT NULL,
  `latitudeMax` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location_range`
--

INSERT INTO `location_range` (`id`, `longitudeMin`, `latitudeMin`, `longitudeMax`, `latitudeMax`) VALUES
(2, '111.7972506', '-8.1171776', '111.7974506', '-8.1173776');

-- --------------------------------------------------------

--
-- Table structure for table `realtime`
--

CREATE TABLE `realtime` (
  `id` int(11) NOT NULL,
  `nip` int(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `realtime`
--

INSERT INTO `realtime` (`id`, `nip`, `longitude`, `latitude`, `jam`, `tanggal`) VALUES
(2, 12345, '111.7973506', '-8.1172776', '02:54:34', '2022-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pangkat` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nip`, `password`, `pangkat`, `alamat`, `email`) VALUES
(1, 'hasan', '12345', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_range`
--
ALTER TABLE `location_range`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realtime`
--
ALTER TABLE `realtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location_range`
--
ALTER TABLE `location_range`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `realtime`
--
ALTER TABLE `realtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
