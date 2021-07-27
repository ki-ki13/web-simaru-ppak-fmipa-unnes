-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2021 at 06:18 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `folder`
--

CREATE TABLE `folder` (
  `id` int(3) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `nama_folder` varchar(30) NOT NULL,
  `folder_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`id`, `jenis`, `nama_folder`, `folder_id`) VALUES
(3, 'individu', 'Upload Twibbon', '1_QBqvmcOEQ1aVDgqgQnSmZjBdMRcwpyH'),
(4, 'kelompok', 'Tugas Perkenalan Diri', '1ULEpbXJm0ncSGPo7-10__-3A8kT-hJ16'),
(5, 'kelompok', 'Tugas Mencari Teman', '1Wy3HLrTySbRAjn4o0u8oQ8bs_05LX8Ss'),
(6, 'individu', 'Upload VIdeo IG', '1QDRAiAIlXviTO-wxPp9XMSx3-P-Is6iW');

-- --------------------------------------------------------

--
-- Table structure for table `parentFolder`
--

CREATE TABLE `parentFolder` (
  `id` int(11) NOT NULL,
  `nama_folder` varchar(20) NOT NULL,
  `folder_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parentFolder`
--

INSERT INTO `parentFolder` (`id`, `nama_folder`, `folder_id`) VALUES
(1, 'kelompok', '1bfHGALWye_dbWPrVebVdjZxTEmEvzg7A'),
(2, 'individu', '11jsFJ3_ghE-sBvuprgr-ifHRx4fGOQOa');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
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
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `login_oauth_uid`, `first_name`, `last_name`, `email_address`, `profile_picture`, `created_at`, `updated_at`) VALUES
(2, '116119015737919646772', 'PKKMB FMIPA', 'UNNES 2021', 'pkkmbfmipa@mail.unnes.ac.id', 'https://lh3.googleusercontent.com/a/AATXAJzt7rU6oB', '2021-07-23 06:18:31', '2021-07-27 17:02:10'),
(3, '111360405407430135756', 'Deny', 'Lukman Syarif', 'cakdeny49@students.unnes.ac.id', 'https://lh3.googleusercontent.com/a/AATXAJzDoxObZe', '2021-07-23 06:25:42', '2021-07-27 17:47:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parentFolder`
--
ALTER TABLE `parentFolder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `folder`
--
ALTER TABLE `folder`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parentFolder`
--
ALTER TABLE `parentFolder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
