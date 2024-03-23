-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Mar 2024 pada 06.06
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
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `AlbumID` int(11) NOT NULL,
  `NamaAlbum` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL,
  `TanggalDibuat` date NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`AlbumID`, `NamaAlbum`, `Deskripsi`, `TanggalDibuat`, `UserID`) VALUES
(132, 'tio bauk ketek', 'cewek desi', '2024-02-23', 3),
(162, 'gunung', 'hijau', '2024-02-27', 6),
(173, 'hewan', 'binatang lucu ', '2024-03-07', 1),
(174, 'pemandangan', 'pemandangan alam luar', '2024-03-07', 1),
(175, 'novel', 'buku cerita', '2024-03-07', 4),
(176, 'pemandangan', 'pemandangan indah ', '2024-03-15', 9),
(177, 'aesthetic', 'aesthetic photos', '2024-03-17', 16),
(178, 'quotes', 'wise quotes', '2024-03-20', 1),
(179, 'aesthetic', 'bagus', '2024-03-23', 9),
(180, 'foto', 'kumpulan foto', '2024-03-23', 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dislikefoto`
--

CREATE TABLE `dislikefoto` (
  `DislikeID` int(11) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TanggalDislike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dislikefoto`
--

INSERT INTO `dislikefoto` (`DislikeID`, `FotoID`, `UserID`, `TanggalDislike`) VALUES
(3, 50, 1, '2024-03-17'),
(8, 52, 9, '2024-03-18'),
(9, 54, 1, '2024-03-18'),
(11, 49, 1, '2024-03-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `FotoID` int(11) NOT NULL,
  `JudulFoto` varchar(255) NOT NULL,
  `DeskripsiFoto` text NOT NULL,
  `TanggalUnggah` date NOT NULL,
  `LokasiFile` varchar(255) NOT NULL,
  `AlbumID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`FotoID`, `JudulFoto`, `DeskripsiFoto`, `TanggalUnggah`, `LokasiFile`, `AlbumID`, `UserID`) VALUES
(47, 'kucing', 'kucing lucu        ', '2024-03-10', '803237756-kucing.jpg', 173, 1),
(48, 'kucing', 'kucingnya ', '2024-03-08', '1631826927-kucingg.jpg', 173, 1),
(49, 'pantai', 'pantai aceh', '2024-03-06', '384821253-pantai.jpg', 174, 1),
(50, 'gunung ', 'gunung fuji', '2024-03-07', '343429416-gunung fuji.jpg', 174, 1),
(51, 'novel dilan', 'dia dilanku tahun 1990', '2024-03-07', '42634583-buku dilan.jpg', 175, 4),
(52, 'swiss', 'pemandangan indah ', '2024-03-15', '1927621674-2.jpeg', 176, 9),
(53, 'aesthetic', 'walpaper images', '2024-03-17', '1732639191-a.jpg', 177, 16),
(54, 'aesthetic', 'stiker lucu', '2024-03-17', '2011833297-b.jpg', 177, 16),
(55, 'quotes', 'wise quotes', '2024-03-20', '1388999134-WhatsApp Image 2024-03-19 at 06.54.36.jpeg', 178, 1),
(56, 'quotes', 'positive affirmation', '2024-03-20', '132901016-WhatsApp Image 2024-03-19 at 06.54.37.jpeg', 178, 1),
(57, 'aesthetic', 'indah', '2024-03-23', '228578353-b.jpg', 179, 9),
(58, 'foto', 'kumpulan kumpulan foto', '2024-03-23', '1986401892-foto2.jpeg', 180, 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `KomentarID` int(11) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `IsiKomentar` text NOT NULL,
  `TanggalKomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentarfoto`
--

INSERT INTO `komentarfoto` (`KomentarID`, `FotoID`, `UserID`, `IsiKomentar`, `TanggalKomentar`) VALUES
(71, 48, 1, 'haii', '2024-03-10'),
(73, 47, 1, 'gemecc', '2024-03-12'),
(74, 48, 9, 'lucuu', '2024-03-15'),
(75, 50, 9, 'cantikk bangett', '2024-03-15'),
(76, 47, 9, 'JHKH', '2024-03-16'),
(77, 51, 9, 'yang lalu biarlah berlalu', '2024-03-16'),
(78, 49, 10, 'lucuu', '2024-03-17'),
(79, 49, 10, 'haii', '2024-03-17'),
(80, 52, 16, 'cantik yaaaaa', '2024-03-17'),
(81, 48, 1, 'cutee', '2024-03-18'),
(82, 53, 1, 'cocok buat background tugas di mading nii', '2024-03-18'),
(83, 56, 1, 'bagus banget', '2024-03-23'),
(84, 55, 9, 'baik', '2024-03-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `LikeID` int(11) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TanggalLike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`LikeID`, `FotoID`, `UserID`, `TanggalLike`) VALUES
(23, 48, 4, '2024-03-07'),
(24, 50, 4, '2024-03-07'),
(25, 47, 4, '2024-03-07'),
(26, 51, 4, '2024-03-07'),
(27, 51, 1, '2024-03-07'),
(47, 49, 9, '2024-03-15'),
(48, 50, 9, '2024-03-15'),
(50, 51, 9, '2024-03-16'),
(52, 48, 9, '2024-03-16'),
(53, 52, 9, '2024-03-16'),
(54, 47, 9, '2024-03-16'),
(55, 52, 1, '2024-03-16'),
(57, 47, 1, '2024-03-16'),
(58, 50, 1, '2024-03-17'),
(60, 47, 16, '2024-03-17'),
(61, 48, 16, '2024-03-17'),
(62, 49, 16, '2024-03-17'),
(63, 50, 16, '2024-03-17'),
(64, 52, 16, '2024-03-17'),
(65, 51, 16, '2024-03-17'),
(67, 54, 16, '2024-03-17'),
(68, 53, 16, '2024-03-17'),
(69, 54, 1, '2024-03-18'),
(71, 55, 1, '2024-03-20'),
(72, 56, 1, '2024-03-21'),
(74, 53, 1, '2024-03-23'),
(75, 48, 1, '2024-03-23'),
(76, 49, 1, '2024-03-23'),
(77, 56, 9, '2024-03-23'),
(78, 55, 9, '2024-03-23'),
(79, 57, 9, '2024-03-23'),
(80, 58, 17, '2024-03-23'),
(81, 57, 17, '2024-03-23'),
(82, 56, 17, '2024-03-23'),
(83, 55, 17, '2024-03-23'),
(84, 47, 17, '2024-03-23'),
(85, 49, 17, '2024-03-23'),
(86, 48, 17, '2024-03-23'),
(87, 50, 17, '2024-03-23'),
(88, 53, 17, '2024-03-23'),
(89, 52, 17, '2024-03-23'),
(90, 51, 17, '2024-03-23'),
(91, 54, 17, '2024-03-23'),
(92, 57, 1, '2024-03-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`) VALUES
(1, 'admin', 'admin123', 'admin@gmail.com', 'admin', 'jln.admin no.1'),
(3, 'suci', 'suci123', 'suci@gmail.com', '', ''),
(4, 'pingka', 'pingka', 'pingka@gmail.com', '', ''),
(6, 'dika', 'dika123', 'dika@gmail.com', '', ''),
(9, 'aldo ferdinansyah', 'aldo', 'aldoferdinansyah@gmail.com', 'aldo', 'dusun2'),
(10, 'teo', 'harysetio', 'harysetio@gmail.com', '123456', 'klambir'),
(15, 'ahmad', 'ahmad123', 'ahmad@gmail.com', 'Ahmad Khidir', 'perbahingan'),
(16, 'farhan', 'farhan123', 'farhan@gmail.com', 'farhan lesmana', 'rorinata'),
(17, 'User1', 'user123', 'user@gmail.com', 'User', 'udfugf');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`AlbumID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indeks untuk tabel `dislikefoto`
--
ALTER TABLE `dislikefoto`
  ADD PRIMARY KEY (`DislikeID`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`FotoID`),
  ADD KEY `AlbumID` (`AlbumID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indeks untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`KomentarID`),
  ADD KEY `FotoID` (`FotoID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`LikeID`),
  ADD KEY `FotoID` (`FotoID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `AlbumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT untuk tabel `dislikefoto`
--
ALTER TABLE `dislikefoto`
  MODIFY `DislikeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `FotoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `KomentarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `LikeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`AlbumID`) REFERENCES `album` (`AlbumID`),
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Ketidakleluasaan untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`FotoID`) REFERENCES `foto` (`FotoID`);

--
-- Ketidakleluasaan untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`FotoID`) REFERENCES `foto` (`FotoID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
