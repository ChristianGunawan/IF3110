-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 26, 2021 at 08:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webede`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses_token`
--

CREATE TABLE `akses_token` (
  `id_akses_token` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `access_token` text NOT NULL,
  `ip_address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akses_token`
--

INSERT INTO `akses_token` (`id_akses_token`, `id_user`, `access_token`, `ip_address`) VALUES
(1, 1, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyb3dzIjpbeyJpZF91c2VyIjoxLCJ1c2VybmFtZSI6ImFudG9uIiwiZW1haWwiOiJhbnRvbkBnbWFpbC5jb20iLCJwYXNzd29yZCI6Ijc4NDc0MmE2NmEzYTBjMjcxZmVjZWQ1YjE0OWZmOGRiIn1dLCJpYXQiOjE2MzcyNDc2MDAsImV4cCI6MTYzNzI1MTIwMH0.ztjPA5D79QxeSHYx2qx9Hteq6jVwXTWbGjhjcF7Kda8', '192.168.1.5'),
(2, 1, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyb3dzIjpbeyJpZF91c2VyIjoxLCJ1c2VybmFtZSI6ImFudG9uIiwiZW1haWwiOiJhbnRvbkBnbWFpbC5jb20iLCJwYXNzd29yZCI6Ijc4NDc0MmE2NmEzYTBjMjcxZmVjZWQ1YjE0OWZmOGRiIn1dLCJpYXQiOjE2MzcyNDc2MjgsImV4cCI6MTYzNzI1MTIyOH0.nnwK6ITCPJQbJsAOh-6gRlWH4-Mglxls_cDUmAUyaKw', '192.168.1.5'),
(3, 1, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyb3dzIjpbeyJpZF91c2VyIjoxLCJ1c2VybmFtZSI6ImFudG9uIiwiZW1haWwiOiJhbnRvbkBnbWFpbC5jb20iLCJwYXNzd29yZCI6Ijc4NDc0MmE2NmEzYTBjMjcxZmVjZWQ1YjE0OWZmOGRiIn1dLCJpYXQiOjE2MzcyNDc2MzAsImV4cCI6MTYzNzI1MTIzMH0.Phui5bN_xF80-zcLATTI2anN6JBfbJw_j2FhpUwV62I', '192.168.1.5'),
(4, 1, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyb3dzIjpbeyJpZF91c2VyIjoxLCJ1c2VybmFtZSI6ImFudG9uIiwiZW1haWwiOiJhbnRvbkBnbWFpbC5jb20iLCJwYXNzd29yZCI6Ijc4NDc0MmE2NmEzYTBjMjcxZmVjZWQ1YjE0OWZmOGRiIn1dLCJpYXQiOjE2MzcyNTAwNzEsImV4cCI6MTYzNzI1MzY3MX0.GGeBbsf6128qoLBnCdaJxdhQt0eshIWeM8ffVwbehVU', '192.168.1.5'),
(5, 2, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyb3dzIjpbeyJpZF91c2VyIjoyLCJ1c2VybmFtZSI6ImJ1ZGkiLCJlbWFpbCI6ImJ1ZGlAZ21haWwuY29tIiwicGFzc3dvcmQiOiIwMGRmYzUzZWU4NmFmMDJlNzQyNTE1Y2RjZjA3NWVkMyJ9XSwiaWF0IjoxNjM3MjUwNDUxLCJleHAiOjE2MzcyNTQwNTF9.A6XrF2f6NrgMLTX_iVO6Vqwpj7WDw1fwK4xC8cLVJ7w', '192.168.1.5'),
(6, 2, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyb3dzIjpbeyJpZF91c2VyIjoyLCJ1c2VybmFtZSI6ImJ1ZGkiLCJlbWFpbCI6ImJ1ZGlAZ21haWwuY29tIiwicGFzc3dvcmQiOiIwMGRmYzUzZWU4NmFmMDJlNzQyNTE1Y2RjZjA3NWVkMyJ9XSwiaWF0IjoxNjM3MjUwOTgzLCJleHAiOjE2MzcyNTQ1ODN9.6nXnErbIhLXM-vlJDAMYEkotaD-n_dlQLJ5n7FFMElQ', '192.168.1.5'),
(7, 2, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyb3dzIjpbeyJpZF91c2VyIjoyLCJ1c2VybmFtZSI6ImJ1ZGkiLCJlbWFpbCI6ImJ1ZGlAZ21haWwuY29tIiwicGFzc3dvcmQiOiIwMGRmYzUzZWU4NmFmMDJlNzQyNTE1Y2RjZjA3NWVkMyJ9XSwiaWF0IjoxNjM3MzM5MDgzLCJleHAiOjE2MzczNDI2ODN9.kPUr69lqvoQqrVMsiT8TIhVxVGyKoImEfmZeU4UhR2w', '192.168.1.5'),
(8, 2, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyb3dzIjpbeyJpZF91c2VyIjoyLCJ1c2VybmFtZSI6ImJ1ZGkiLCJlbWFpbCI6ImJ1ZGlAZ21haWwuY29tIiwicGFzc3dvcmQiOiIwMGRmYzUzZWU4NmFmMDJlNzQyNTE1Y2RjZjA3NWVkMyJ9XSwiaWF0IjoxNjM3MzQwMDg0LCJleHAiOjE2MzczNDM2ODR9.vLT0LVaSspFhB5L0_kJdp38tL15vix-J_K6vTOhtGq0', '192.168.1.5'),
(9, 7, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyZXN1bHQiOlt7ImlkX3VzZXIiOjcsInVzZXJuYW1lIjoiY2ciLCJlbWFpbCI6ImNnIiwicGFzc3dvcmQiOiIkMmIkMTAkdlNhMmV6SHViTW1yOUhCZ05QVzZLdXpleGoxM3RadFhWRDVJZmZOdWJtMzhyQWVoVXJCRHUifV0sImlhdCI6MTYzNzgxNjAwNiwiZXhwIjoxNjM3ODE5NjA2fQ.1ZTAYG0-I1S-2YhzgD1eq8Qew2wB59cfe1rW_EazftA', '192.168.56.1'),
(10, 7, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyZXN1bHQiOlt7ImlkX3VzZXIiOjcsInVzZXJuYW1lIjoiY2ciLCJlbWFpbCI6ImNnIiwicGFzc3dvcmQiOiIkMmIkMTAkdlNhMmV6SHViTW1yOUhCZ05QVzZLdXpleGoxM3RadFhWRDVJZmZOdWJtMzhyQWVoVXJCRHUifV0sImlhdCI6MTYzNzgxNjI3MCwiZXhwIjoxNjM3ODE5ODcwfQ.9OTfSXJoIs3YzwLqC7jEdjzL7ph0JU0jcCX-EaFhDVk', '192.168.56.1'),
(11, 7, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyZXN1bHQiOlt7ImlkX3VzZXIiOjcsInVzZXJuYW1lIjoiY2ciLCJlbWFpbCI6ImNnIiwicGFzc3dvcmQiOiIkMmIkMTAkdlNhMmV6SHViTW1yOUhCZ05QVzZLdXpleGoxM3RadFhWRDVJZmZOdWJtMzhyQWVoVXJCRHUifV0sImlhdCI6MTYzNzgxNjM2MywiZXhwIjoxNjM3ODE5OTYzfQ.ItW6W5-mDfYz8kLdcK8p5zegiy8q6PG75OBQfBaOuas', '192.168.56.1'),
(12, 7, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyZXN1bHQiOlt7ImlkX3VzZXIiOjcsInVzZXJuYW1lIjoiY2ciLCJlbWFpbCI6ImNnIiwicGFzc3dvcmQiOiIkMmIkMTAkdlNhMmV6SHViTW1yOUhCZ05QVzZLdXpleGoxM3RadFhWRDVJZmZOdWJtMzhyQWVoVXJCRHUifV0sImlhdCI6MTYzNzgxNjU5NCwiZXhwIjoxNjM3ODIwMTk0fQ.QArFO-9bFGbZDRtq1HFHU0xL0J1ZsPvl1-4mTTZghRs', '192.168.56.1'),
(13, 7, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyZXN1bHQiOlt7ImlkX3VzZXIiOjcsInVzZXJuYW1lIjoiY2ciLCJlbWFpbCI6ImNnIiwicGFzc3dvcmQiOiIkMmIkMTAkdlNhMmV6SHViTW1yOUhCZ05QVzZLdXpleGoxM3RadFhWRDVJZmZOdWJtMzhyQWVoVXJCRHUifV0sImlhdCI6MTYzNzgxNzc5MywiZXhwIjoxNjM3ODIxMzkzfQ.zMZhZagU75UZHiZbmjcMHcdvO_UczJP7n4EwaALmhGw', '192.168.56.1'),
(14, 7, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyZXN1bHQiOlt7ImlkX3VzZXIiOjcsInVzZXJuYW1lIjoiY2ciLCJlbWFpbCI6ImNnIiwicGFzc3dvcmQiOiIkMmIkMTAkdlNhMmV6SHViTW1yOUhCZ05QVzZLdXpleGoxM3RadFhWRDVJZmZOdWJtMzhyQWVoVXJCRHUifV0sImlhdCI6MTYzNzgxNzg5NiwiZXhwIjoxNjM3ODIxNDk2fQ.l7zr2sh5FmQrhtCP3b7WjUySOUZK_itAE-LltjM0zQI', '192.168.56.1'),
(15, 7, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyZXN1bHQiOlt7ImlkX3VzZXIiOjcsInVzZXJuYW1lIjoiY2ciLCJlbWFpbCI6ImNnIiwicGFzc3dvcmQiOiIkMmIkMTAkdlNhMmV6SHViTW1yOUhCZ05QVzZLdXpleGoxM3RadFhWRDVJZmZOdWJtMzhyQWVoVXJCRHUifV0sImlhdCI6MTYzNzgxODA2NywiZXhwIjoxNjM3ODIxNjY3fQ.KLtgu52Ie07lNp7a5WM9nmHSLoy1CvgKKq3n21mrijY', '192.168.56.1');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan` int(4) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `stok_bahan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan`, `nama_bahan`, `stok_bahan`) VALUES
(1, 'gula', 5),
(2, 'garam', 10),
(4, 'tepung terigu', 5),
(5, 'tepung maizena', 11),
(6, 'mentega', 5),
(7, 'susu', 15),
(8, 'coklat', 20),
(9, 'keju', 20),
(10, 'pandan', 11),
(11, 'santan', 30),
(12, 'madu', 20);

-- --------------------------------------------------------

--
-- Table structure for table `log_request`
--

CREATE TABLE `log_request` (
  `ip` varchar(20) NOT NULL,
  `endpoint` int(250) NOT NULL,
  `ts_log_request` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id_request` int(11) NOT NULL,
  `id_resep` int(3) NOT NULL,
  `jumlah_dorayaki` int(4) NOT NULL,
  `ts_request` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id_request`, `id_resep`, `jumlah_dorayaki`, `ts_request`) VALUES
(27, 2, 2, '2021-11-26 02:48:47'),
(28, 1, 3, '2021-11-26 03:06:26'),
(29, 2, 2, '2021-11-26 03:06:26'),
(30, 1, 3, '2021-11-26 03:08:34'),
(31, 2, 2, '2021-11-26 03:08:34'),
(32, 1, 3, '2021-11-26 03:10:26'),
(33, 2, 2, '2021-11-26 03:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(3) NOT NULL,
  `nama_resep` varchar(50) NOT NULL,
  `id_bahan_baku1` int(3) DEFAULT NULL,
  `id_bahan_baku2` int(3) DEFAULT NULL,
  `id_bahan_baku3` int(3) DEFAULT NULL,
  `jumlah_bahan1` int(3) DEFAULT NULL,
  `jumlah_bahan2` int(3) DEFAULT NULL,
  `jumlah_bahan3` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_resep`, `nama_resep`, `id_bahan_baku1`, `id_bahan_baku2`, `id_bahan_baku3`, `jumlah_bahan1`, `jumlah_bahan2`, `jumlah_bahan3`) VALUES
(1, 'ayam', 1, 2, 4, 1, 2, 3),
(2, 'ikan', 9, 8, 7, 3, 2, 2),
(3, 'coklat', 1, 5, 8, 5, 4, 3),
(4, 'keju', 1, 2, 9, 5, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`) VALUES
(5, 'z', 'zz', '$2b$10$IdPOms4l904/KRAi8gGveudPNH37iEoAwcASv5NjIiVGqpd8Lq9GW'),
(6, 'fang', 'fang', '$2b$10$oeevvMYP1a8crrES6lhX3uL.T3uc5gYMyZJ0HiP6t5mzz.Jsv6kNO'),
(7, 'cg', 'cg', '$2b$10$vSa2ezHubMmr9HBgNPW6Kuzexj13tZtXVD5IffNubm38rAehUrBDu'),
(8, 'hei', 'hei@gmail.com', '$2b$10$yzB1QSoTp0y1Qqn.nLMVNOjREodpkNNkX/HVzqELBjdANl3ZWdady'),
(9, 'admin', 'admin@gmail.com', '$2b$10$J7IeBzodVWwE.yLR.tJCVu63vgmNzcLpKgIR/i2x7JoC6V0C.rozm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses_token`
--
ALTER TABLE `akses_token`
  ADD PRIMARY KEY (`id_akses_token`);

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `log_request`
--
ALTER TABLE `log_request`
  ADD PRIMARY KEY (`ip`),
  ADD KEY `ts_log_request` (`ts_log_request`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `id_resep` (`id_resep`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_bahan_baku1` (`id_bahan_baku1`),
  ADD KEY `resep_ibfk_2` (`id_bahan_baku2`),
  ADD KEY `id_bahan_baku3` (`id_bahan_baku3`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses_token`
--
ALTER TABLE `akses_token`
  MODIFY `id_akses_token` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_request`
--
ALTER TABLE `log_request`
  ADD CONSTRAINT `log_request_ibfk_1` FOREIGN KEY (`ts_log_request`) REFERENCES `request` (`ts_request`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_bahan_baku1`) REFERENCES `bahan_baku` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resep_ibfk_2` FOREIGN KEY (`id_bahan_baku2`) REFERENCES `bahan_baku` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resep_ibfk_3` FOREIGN KEY (`id_bahan_baku3`) REFERENCES `bahan_baku` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
