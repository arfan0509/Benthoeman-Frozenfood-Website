-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jan 2023 pada 17.49
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frozenfood`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idproduk` int(11) DEFAULT NULL,
  `img_produk` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `tgl_pesanan` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `iduser`, `idproduk`, `img_produk`, `nama_produk`, `jumlah`, `harga`, `total_harga`, `status`, `tgl_pesanan`) VALUES
(34, 11, 27, '1.jpeg', 'Lumpia ayam', 6, 20000, 120000, 'proses', '2023-01-02 22:37:18'),
(35, 11, 28, 'gasf.jpeg', 'Risol Mayo', 3, 25000, 75000, 'proses', '2023-01-02 22:37:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `nama_produk` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `detail` text NOT NULL,
  `tgl_ditambah` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `nama_produk`, `harga`, `img`, `detail`, `tgl_ditambah`) VALUES
(27, 'Lumpia ayam', 20000, '1.jpeg', 'Lumpia dengan isian ayam, berisi 10pcs lumpia', '2023-01-02 13:52:20'),
(28, 'Risol Mayo', 25000, 'gasf.jpeg', 'Risol dengan isian mayo. berisi 10pcs', '2023-01-02 13:53:36'),
(29, 'Lumpia ayam rebung', 18000, 'sfdgeqa.jpeg', 'Lumpia dengan isian ayam dan rebung\r\nberisi 10pcs lumpia', '2023-01-02 15:40:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(13) NOT NULL,
  `rule` varchar(100) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `alamat`, `notelp`, `rule`, `time_stamp`) VALUES
(10, 'Akbar kurniawan', 'akbar', 'akbar272e@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'Sidoarjo', '082132244424', 'client', '2022-12-13 03:28:28'),
(11, 'ADM - Dwikyrz', 'admin', 'admin@gmail', '0cc175b9c0f1b6a831c399e269772661', 'sda', '412124', 'admin', '2022-12-13 03:28:58'),
(12, 'bagas setiawan', 'bagas', 'bagas@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'malang', '2222', 'client', '2022-12-23 16:10:48'),
(13, 'Feri aperti sura', 'fersur', 'Fer99@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'Surabaya', '334422', 'client', '2022-12-31 10:27:32'),
(14, 'rz', 'rz', 'a@a', '0cc175b9c0f1b6a831c399e269772661', 'a', '2', 'client', '2023-01-02 11:09:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
