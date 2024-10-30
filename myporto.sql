-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2024 pada 17.49
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myporto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `education` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `endroll_education` date NOT NULL,
  `end_year_education` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `education`
--

INSERT INTO `education` (`id`, `education`, `title`, `description`, `endroll_education`, `end_year_education`, `created_at`, `updated_at`) VALUES
(2, 'Universitas Bina Sarana Informatika', 'Computer Science', '                                                      Computer Science is a discipline that explores the theory, development, and application of computer systems and software. Students in this major study topics like algorithms, programming, data structures, artificial intelligence, software engineering, and cybersecurity. Through a combination of theoretical knowledge and practical skills, they learn to solve complex problems and create innovative technology solutions. Graduates are well-prepared for careers in fields like software development, data science, network security, and artificial intelligence, contributing to advancements in technology across industries.                                                                                                                                                              ', '2024-10-22', '2024-10-29', '2024-10-30 04:29:45', '2024-10-30 16:33:36'),
(3, 'SMKN 4 Jakarta', 'Audio Video Engineering', '                                                                 Audio Video Engineering is a field of study that focuses on the technical aspects of audio and video production, including recording, processing, and broadcasting technologies. Students in this major learn about sound engineering, video editing, signal processing, multimedia systems, and the hardware and software used in audio-visual production. They gain practical skills in operating equipment, troubleshooting, and designing systems for professional audio and video environments. Graduates are prepared for careers in media production, broadcasting, live sound engineering, and multimedia technology development.                                                                                                                                                     ', '2019-02-28', '2024-10-30', '2024-10-30 07:05:20', '2024-10-30 16:26:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lisence`
--

CREATE TABLE `lisence` (
  `id` int(11) NOT NULL,
  `name_lisence` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `year` year(4) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `id_user`, `name`, `email`, `created_at`, `updated_at`) VALUES
(2, 3, 'Atio Wahyudi Saputra', 'atio@gmail.com', '2024-10-29 02:14:11', '2024-10-29 02:14:11'),
(3, 20, 'Atio Wahyudi Saputra', 'atio@gmail.com', '2024-10-29 15:50:31', '2024-10-29 15:50:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_fe`
--

CREATE TABLE `project_fe` (
  `id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `technology` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `create_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `project_fe`
--

INSERT INTO `project_fe` (`id`, `project_name`, `technology`, `description`, `create_date`, `finish_date`, `foto`, `created_at`, `updated_at`) VALUES
(5, 'Web Mama Recipe', 'ExpressJs, Redis, ViteJs, Bootstrap', 'Website mama recipe', '2024-10-29', '2024-10-22', 'searchApp.jpg', '2024-10-30 02:35:56', '2024-10-30 05:32:36'),
(6, 'Admin Web', 'phpNative, bootstrap', 'Making a admin website for menage my Portofolio website', '2024-10-23', '2024-10-28', 'admin.png', '2024-10-30 05:38:09', '2024-10-30 05:38:09'),
(7, 'Web Portofolio', 'phpNative, bootstrap', 'Create awesome website for my personal project with PHP', '2024-10-23', '2024-10-29', 'porto.png', '2024-10-30 09:13:06', '2024-10-30 09:13:06'),
(8, 'Ankasa Tiketing Web', 'PrimaJs, Boostrap, NextJs, ExpressJs ', 'Angkasa Tiketing is a website that build for tiket payment', '2024-10-25', '2024-10-28', 'tiket.png', '2024-10-30 15:34:35', '2024-10-30 15:34:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `organization` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `last_name`, `phone`, `organization`, `address`, `description`, `foto`, `created_at`, `updated_at`) VALUES
(26, 'Atio Wahyudi', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'atio@gmail.com', 'Saputra', '85774471157', 'Paskribaka, Music Direction, Pencak Silat, Kerohan', 'Cilincing, Jakarta Utara', 'Hello! My name is Atio Wahyudi Saputra, a Computer Science student at Universitas Bina Sarana Informatika. I began my academic journey in Audio and Video Engineering at SMKN 4 Jakarta, where I developed a strong foundation in technical and creative skills. I am known for being detail-oriented, quick to adapt, and naturally sociable—qualities that have served me well in both my studies and professional growth.\r\n\r\nCurious and driven, I enjoy exploring new concepts and tackling fresh challenges. This passion for learning and agility helps me navigate the dynamic fields of technology with confidence and skill. I look forward to applying my knowledge and continuous growth to make meaningful contributions.', 'IMG_20240217_233818.jpg', '2024-10-30 04:37:23', '2024-10-30 04:37:23'),
(27, 'Atio Wahyudi', '789a2d2ef3ee96067ae09e92f7f72b51a2fb8da7', 'atiowahyudi02@gmail.com', 'Saputra P.', '765478936', 'Karate', 'Jakarta Barat', 'best person in the wolrd', 'foto1.jpg', '2024-10-30 15:43:51', '2024-10-30 16:05:21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lisence`
--
ALTER TABLE `lisence`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `project_fe`
--
ALTER TABLE `project_fe`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lisence`
--
ALTER TABLE `lisence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `project_fe`
--
ALTER TABLE `project_fe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
