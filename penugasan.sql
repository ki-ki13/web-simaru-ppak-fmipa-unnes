-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Agu 2021 pada 17.15
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penugasan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `folder`
--

CREATE TABLE `folder` (
  `id` int(3) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `nama_folder` varchar(50) NOT NULL,
  `folder_id` varchar(50) NOT NULL,
  `deskripsi` varchar(2000) NOT NULL,
  `link_cont` varchar(1000) NOT NULL,
  `keterangan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `folder`
--

INSERT INTO `folder` (`id`, `jenis`, `nama_folder`, `folder_id`, `deskripsi`, `link_cont`, `keterangan`) VALUES
(3, 'individu', 'Upload Twibbon (Pra-Acara)', '1_QBqvmcOEQ1aVDgqgQnSmZjBdMRcwpyH', 'Silakan baca keterangan tugas pada kolom keterangan.', 'https://drive.google.com/file/d/1b4_ai7wY6_2D2Mxbhhz-7WSmQxKIyJGQ/preview', ''),
(4, 'individu', 'Mipa Creative Challenge (Pra-Acara)', '1QDRAiAIlXviTO-wxPp9XMSx3-P-Is6iW', 'Penugasan ini berupa video yang dibuat oleh mahasiswa baru dengan menyanyikan sebuah lagu dan bagian rumpang pada jingle PKKMB FMIPA UNNES 2021 lalu diikuti dengan menirukan gerakan selebrasi dan jingle  sesuai dengan video tutorial yang sudah diperagakan oleh panitia. \r\nKemudian video penugasan MCC tersebut di upload di akun sosial media (instagram) masing-masing mahasiswa baru dengan menggunakan template yang sudah disediakan dan sesuai dengan ketentuan yang sudah ditetapkan.\r\n', 'https://drive.google.com/file/d/1csWf1SY6RdDSJ2XkIkOJ1sG2hnbRSRFv/preview', ''),
(5, 'kelompok', 'Tugas Mencari Teman', '1Wy3HLrTySbRAjn4o0u8oQ8bs_05LX8Ss', 'Ini adalah tugas mencari teman', '', ''),
(7, 'individu', 'Post Test Virtual Tour', '1FImuiETVpHQmizHQey7mHwli8mSWkqle', 'Ini adalah tugas post test mengenai virtual tour.', 'https://docs.google.com/forms/d/e/1FAIpQLSffE7XP7Co6nmggaMaFvihz4HuyiKFPcVQiz4A-c4BM9NV4_g/viewform?embedded=true', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `no` int(11) NOT NULL,
  `login_oauth_uid` varchar(100) NOT NULL,
  `kelompok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `parentfolder`
--

CREATE TABLE `parentfolder` (
  `id` int(11) NOT NULL,
  `nama_folder` varchar(20) NOT NULL,
  `folder_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `parentfolder`
--

INSERT INTO `parentfolder` (`id`, `nama_folder`, `folder_id`) VALUES
(1, 'kelompok', '1bfHGALWye_dbWPrVebVdjZxTEmEvzg7A'),
(2, 'individu', '11jsFJ3_ghE-sBvuprgr-ifHRx4fGOQOa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `login_oauth_uid` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `profile_picture` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_login`
--

INSERT INTO `user_login` (`user_id`, `login_oauth_uid`, `first_name`, `last_name`, `email_address`, `profile_picture`, `created_at`, `updated_at`) VALUES
(2, '116119015737919646772', 'PKKMB FMIPA', 'UNNES 2021', 'pkkmbfmipa@mail.unnes.ac.id', 'https://lh3.googleusercontent.com/a/AATXAJzt7rU6oB', '2021-07-23 06:18:31', '2021-08-04 13:25:43'),
(3, '111360405407430135756', 'Deny', 'Lukman Syarif', 'cakdeny49@students.unnes.ac.id', 'https://lh3.googleusercontent.com/a/AATXAJzDoxObZe', '2021-07-23 06:25:42', '2021-07-27 17:47:04'),
(4, '115705964469710459926', 'Rizki', 'Mahjati Prie Husna', 'rizkimahjati845@students.unnes.ac.id', 'https://lh3.googleusercontent.com/a/AATXAJzuGXtCnh', '2021-07-29 15:45:20', '2021-08-06 13:52:38');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `parentfolder`
--
ALTER TABLE `parentfolder`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `folder`
--
ALTER TABLE `folder`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `parentfolder`
--
ALTER TABLE `parentfolder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
