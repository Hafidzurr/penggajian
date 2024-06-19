-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2024 pada 15.55
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaji`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `ID_Gaji` int(11) NOT NULL,
  `Pegawai_NIP` varchar(20) DEFAULT NULL,
  `Gaji_Pokok` decimal(10,2) NOT NULL,
  `Bonus` decimal(10,2) NOT NULL,
  `PPH_5` decimal(10,2) NOT NULL,
  `Total_Gaji` decimal(10,2) NOT NULL,
  `Tanggal_Gajian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`ID_Gaji`, `Pegawai_NIP`, `Gaji_Pokok`, `Bonus`, `PPH_5`, `Total_Gaji`, `Tanggal_Gajian`) VALUES
(14, 'P001', 1500000.00, 750000.00, 112500.00, 2137500.00, '2024-01-01'),
(16, 'P003', 1000000.00, 400000.00, 70000.00, 1330000.00, '2024-07-01'),
(19, 'P001', 1500000.00, 750000.00, 112500.00, 2137500.00, '2024-07-01'),
(20, 'P002', 500000.00, 150000.00, 32500.00, 617500.00, '2024-07-01'),
(21, 'P007', 500000.00, 150000.00, 32500.00, 617500.00, '2024-07-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `ID_Jabatan` int(11) NOT NULL,
  `Nama_Jabatan` varchar(50) NOT NULL,
  `Bidang` varchar(50) NOT NULL,
  `Gaji_Pokok` decimal(10,2) NOT NULL,
  `Persentase_Bonus` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`ID_Jabatan`, `Nama_Jabatan`, `Bidang`, `Gaji_Pokok`, `Persentase_Bonus`) VALUES
(1, 'Manager', 'HRD', 1500000.00, 50.00),
(2, 'Supervisor', 'HRD', 1000000.00, 40.00),
(3, 'Staff', 'HRD', 500000.00, 30.00),
(4, 'Manager', 'Finance', 1500000.00, 50.00),
(5, 'Supervisor', 'Finance', 1000000.00, 40.00),
(6, 'Staff', 'Finance', 500000.00, 30.00),
(7, 'Manager', 'IT', 1500000.00, 50.00),
(8, 'Supervisor', 'IT', 1000000.00, 40.00),
(9, 'Staff', 'IT', 500000.00, 30.00),
(15, 'Manager', 'Operasional', 1500000.00, 50.00),
(16, 'Staff', 'Operasional', 500000.00, 30.00),
(17, 'Supervisor', 'Operasional', 1000000.00, 40.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `NIP` varchar(20) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Tanggal_Masuk` date NOT NULL,
  `Jabatan_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `Nama`, `Alamat`, `Tanggal_Lahir`, `Tanggal_Masuk`, `Jabatan_ID`) VALUES
('P001', 'Budi', 'Jl. Merdeka No. 1', '1985-05-20', '2010-03-15', 1),
('P002', 'Hafidz', 'Jl. Sudirman No14', '2002-12-16', '2024-06-18', 9),
('P003', 'Jessy', 'Jl. Sudirman No13', '2000-07-17', '2024-06-17', 2),
('P007', 'Sukirman', 'Jl. Swadaya 1 Pejaten Timur Jakarta Selatan', '1999-12-14', '2024-06-15', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `ID_Pengguna` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Pegawai_NIP` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`ID_Pengguna`, `Username`, `Password`, `Role`, `Pegawai_NIP`) VALUES
(1, 'budi_admin', '123456', 'admin', 'P001'),
(5, 'sukirman', '12345', 'HRD', 'P007'),
(8, 'Jessy', '123456', 'pegawai', 'P003'),
(10, 'hafidz', '1234567', 'pegawai', 'P002');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`ID_Gaji`),
  ADD KEY `gaji_ibfk_1` (`Pegawai_NIP`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`ID_Jabatan`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `Jabatan_ID` (`Jabatan_ID`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ID_Pengguna`),
  ADD KEY `Pegawai_NIP` (`Pegawai_NIP`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `ID_Gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `ID_Jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `ID_Pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`Pegawai_NIP`) REFERENCES `pegawai` (`NIP`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`Jabatan_ID`) REFERENCES `jabatan` (`ID_Jabatan`);

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`Pegawai_NIP`) REFERENCES `pegawai` (`NIP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
