-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 05:24 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ayodya`
--

-- --------------------------------------------------------

--
-- Table structure for table `absens`
--

CREATE TABLE `absens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `absen` enum('hadir','izin','alpa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'alpa',
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `backgrounds`
--

CREATE TABLE `backgrounds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `backgrounds`
--

INSERT INTO `backgrounds` (`id`, `image`, `kelas`, `created_at`, `updated_at`) VALUES
(1, 'background/tari.png', 'Tari Daerah', '2022-04-14 14:58:54', '2022-04-14 14:58:54'),
(2, 'background/Vokal.png', 'Vokal', '2022-04-16 10:49:31', '2022-04-16 10:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layouts`
--

CREATE TABLE `layouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layouts`
--

INSERT INTO `layouts` (`id`, `tanggal`, `tempat`, `created_at`, `updated_at`) VALUES
(1, '14 April 2022', 'Ayodya Pala', '2022-04-14 12:09:46', '2022-04-14 12:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_16_084222_create_siswas_table', 1),
(6, '2021_11_17_072611_create_nilais_table', 1),
(7, '2021_11_17_120649_create_nilaivokals_table', 1),
(8, '2021_11_25_040641_create_absens_table', 1),
(9, '2021_12_06_151111_create_undians_table', 1),
(10, '2021_12_23_044708_create_tarians_table', 1),
(11, '2022_01_23_104641_create_sinopses_table', 1),
(12, '2022_03_10_133315_create_backgrounds_table', 1),
(13, '2022_03_10_135019_create_layouts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_induk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_juri` bigint(20) UNSIGNED NOT NULL,
  `tari_id` bigint(20) UNSIGNED NOT NULL,
  `semester` int(11) NOT NULL,
  `wirama` decimal(8,2) NOT NULL,
  `wiraga` decimal(8,2) NOT NULL,
  `wirasa` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilaivokals`
--

CREATE TABLE `nilaivokals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_induk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_juri` bigint(20) UNSIGNED NOT NULL,
  `lagu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` int(11) NOT NULL,
  `penampilan` decimal(8,2) NOT NULL,
  `teknik` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sinopses`
--

CREATE TABLE `sinopses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_induk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_juri` bigint(20) UNSIGNED NOT NULL,
  `semester` int(11) NOT NULL,
  `nilai` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_induk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` int(11) NOT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orang_tua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cabang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nama_siswa`, `no_induk`, `kelas`, `foto`, `semester`, `tanggal_lahir`, `orang_tua`, `alamat`, `cabang`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Chika Dewi Salindri', 'AP-01.029', 1, 'image/default.png', 20, 'Jakarta, 11 Juli 1999', 'Satriyo Utomo', 'depok', 'BR', '$2y$10$w7SUj4YHecXBAKo0XjxS8.kNO8ZXcn/0v1MGa3hEngHtizD1RBnS2', NULL, '2022-04-14 15:20:07', '2022-04-14 15:20:07'),
(2, 'Cahyani Mutiara', 'AP-01.031', 1, 'image/default.png', 19, 'Sumedang, 18 Juni 2002', 'Lala Yuliana', 'depok', 'BR', '$2y$10$5.vo5CpSu.QBM9My7xlw0e51vtWwbzKQcFGJfSsd.LT7TmeOuIaXC', NULL, '2022-04-14 15:20:09', '2022-04-14 15:20:09'),
(3, 'Nayla Khairunnisa Alvitri', 'AP-01.032', 1, 'image/default.png', 17, 'Depok, 10 Maret 2006', 'Alfian Azhar', 'depok', 'BR', '$2y$10$13SzU73Bk.cmTBLCTgJCw.Qvn6SyEyHS7FRXRMy4keQGOhCXvK.oK', NULL, '2022-04-14 15:20:09', '2022-04-14 15:20:09'),
(4, 'Asriati Sekar Dewi', 'AP-01.033', 1, 'image/default.png', 17, 'Jakarta, 02 Mei 2001', 'Bagus Wibowo', 'depok', 'BR', '$2y$10$/FI/dO53NzxnI2KMeRQ7d.6jhhx0lGkcchOC0vWMNvV28Oxxn5wR.', NULL, '2022-04-14 15:20:09', '2022-04-14 15:20:09'),
(5, 'Alfida Dewi Rainisa', 'AP-01.036', 1, 'image/default.png', 18, 'Depok, 31 Juli 2003', 'Asep Rahmat', 'depok', 'BR', '$2y$10$aLFlKpCTUUCO9h1UYmR30ejVbmk/7azXMPpoE8B4mDT9ZaYrCN5Yq', NULL, '2022-04-14 15:20:09', '2022-04-14 15:20:09'),
(6, 'Adinda Titisanti', 'AP-01.098', 1, 'image/default.png', 19, 'Depok, 30 Oktober 1999', 'Agoes Poernomo', 'depok', 'BR', '$2y$10$jHETTulUWGqA5yCzo3oZ/.hxZmDvVkBLvjQeywljLOqAkfUitFIZa', NULL, '2022-04-14 15:20:09', '2022-04-14 15:20:09'),
(7, 'Yuspita Sherly Wijayanti', 'AP-01.037', 1, 'image/default.png', 16, 'Depok, 27 Mei 2003', 'Yuwantha Kusumandhani', 'depok', 'BR', '$2y$10$MkInoxGZNxeu0OShq6iqhukvaUl6ziK1dqDDmbE2EeH2CUFX2rSRq', NULL, '2022-04-14 15:20:09', '2022-04-14 15:20:09'),
(8, 'Khushi Dzakiyah Az-Zahra', 'AP-01.039', 1, 'image/default.png', 16, 'Depok, 17 Agustus 2006', 'Sarif Efendi', 'depok', 'BR', '$2y$10$8ylXUEHFy6K5MSa4MUi/nOUCRdy74asYgvgm.FEWJapctQJdhqGVC', NULL, '2022-04-14 15:20:09', '2022-04-14 15:20:09'),
(9, 'Trista Gema Sayidina', 'AP-01.040', 1, 'image/default.png', 15, 'Jakarta, 5 Februari 2005', 'Edy Purnama', 'depok', 'BR', '$2y$10$vy7OtRG5tUO/vDzoWkONZe23Cri7zO62mfOgm1GeXVJRwlP/1.2S.', NULL, '2022-04-14 15:20:09', '2022-04-14 15:20:09'),
(10, 'Ari Novianti Riyadi', 'AP-01.041', 1, 'image/default.png', 15, 'Depok, 11 November 2005', 'Ardi Riyadi', 'depok', 'BR', '$2y$10$vBuxmnREsDrU6eou.aAZi.OsY3arFsiy1fWM03EH3Wsn7la9ud1X.', NULL, '2022-04-14 15:20:10', '2022-04-14 15:20:10'),
(11, 'Diah Hasna Larashati', 'AP-01.042', 1, 'image/default.png', 15, 'Depok, 15 Agustus 2004', 'Heriyanto', 'depok', 'BR', '$2y$10$7c1ywMOe7VlmH.X.ydBs5u5eUk3gCSi/9Y.t3i2r/OYSmjyrNLy/C', NULL, '2022-04-14 15:20:10', '2022-04-14 15:20:10'),
(12, 'Avillya Wahidah Sakha', 'AP-01.044', 1, 'image/default.png', 15, 'Depok, 11 April 2007', 'Marulloh', 'depok', 'BR', '$2y$10$WFn6spYztzHv/f1yucmWg.Q56l.zY5hFSryOLri7xGlMtKOY55Tc6', NULL, '2022-04-14 15:20:10', '2022-04-14 15:20:10'),
(13, 'Shafira Deviana Utari', 'AP-01.045', 1, 'image/default.png', 15, 'Depok, 18 Maret 2006', 'Hermawan, SB', 'depok', 'BR', '$2y$10$dgf9XidevYtOSAIsDaSkbuekm288hwBo6PFNX9qvkWK1sc0Ynqrby', NULL, '2022-04-14 15:20:10', '2022-04-14 15:20:10'),
(14, 'Zahra Sofie Rahmadhanty.P', 'AP-01.046', 1, 'image/default.png', 15, 'Jakarta, 11 Oktober 2005', 'Suparno, S.Pd', 'depok', 'BR', '$2y$10$KsroT7REjVw9pv9Tkb1oC..gFsu5j.YQZdUlQzmRzd64AY3uAhA/C', NULL, '2022-04-14 15:20:10', '2022-04-14 15:20:10'),
(15, 'Amelia Septriyanti Pramadani', 'AP-01.047', 1, 'image/default.png', 15, 'Depok, 10 September 2007', 'Muhammad Hermanto SE', 'depok', 'BR', '$2y$10$w87MwERsH2ySQQS1EdjHvu62Cur6hjuuOq.EElBRgzU/tNBRvb/ty', NULL, '2022-04-14 15:20:10', '2022-04-14 15:20:10'),
(16, 'Marissa Dewi Rengganis', 'AP-01.097', 1, 'image/default.png', 15, 'Depok, 15 April 2006', 'Satriyo Utomo', 'depok', 'BR', '$2y$10$hb4MMUmJ6SyNGGto7u4l9em1tN.HNNp7lfdo2ITd3ln56thz/cgqy', NULL, '2022-04-14 15:20:10', '2022-04-14 15:20:10'),
(17, 'Chelsea Kirana Ramadina', 'AP-01.051', 1, 'image/default.png', 14, 'Pekan Baru, 3 Juni 2007', 'Iwan Rukmantoro Rachmadi', 'depok', 'BR', '$2y$10$Sg/iDkg4g14/5R5dS/pM2uCFknwTJhmadpP20B9jBOOIwMuAkSfPa', NULL, '2022-04-14 15:20:10', '2022-04-14 15:20:10'),
(18, 'Lyla Adinjari Yeoh', 'AP-01.052', 1, 'image/default.png', 13, 'Urbana, 1 Agust 2006', 'Kim Ee Yeoh', 'depok', 'BR', '$2y$10$JqC3sufqF6JPYaEoEIqfT.N3APClFVMDPEtwhnobF.v1zR77eCiy2', NULL, '2022-04-14 15:20:10', '2022-04-14 15:20:10'),
(19, 'Mutiara Hati Putri Indrayana', 'AP-01.053', 1, 'image/default.png', 13, 'Jakarta.12 nop 2005', 'M.Indra Jaya', 'depok', 'BR', '$2y$10$1Pzd7XQGQ5OruPRKzHYo8uhKnq3LWUqM/vcoMCqvxp52DJ5xm98oa', NULL, '2022-04-14 15:20:11', '2022-04-14 15:20:11'),
(20, 'Nesya Ayundha Frilanita', 'AP-01.054', 1, 'image/default.png', 12, 'Depok, 03 April 2007', 'Sunarno', 'depok', 'BR', '$2y$10$hOXOccYCu1f2yGjW4rDAt.pzWjeHmYWSLd/JhWOwjuEtDjrCpUQmS', NULL, '2022-04-14 15:20:11', '2022-04-14 15:20:11'),
(21, 'Ramadhini Ismarini Wibisono', 'AP-01.055', 1, 'image/default.png', 13, 'Jakarta, 16 Oktober 2005', 'Gunawan Wibisono', 'depok', 'BR', '$2y$10$lB5kMuN9m50W/Fp2HlcZEO599pIAEFjXdlhmOHjLXu9kBDdfALvXq', NULL, '2022-04-14 15:20:11', '2022-04-14 15:20:11'),
(22, 'Arumi Firja Windraya', 'AP-01.056', 1, 'image/default.png', 12, 'Semarang, 5 Maret 2006', 'Wisnu Aji Tri Punto', 'depok', 'BR', '$2y$10$LH02LAGKi4iLKgAmq2/Nv.DayI9Yfue6MBeckauBevtNl0jWTVTeK', NULL, '2022-04-14 15:20:11', '2022-04-14 15:20:11'),
(23, 'Hana Kamiliya Khalidah', 'AP-01.059', 1, 'image/default.png', 12, 'Cirebon, 28 Maret 2003', 'Noverdi', 'depok', 'BR', '$2y$10$WikKxr4K1y5JlBtcxK74s.aLIQyWkNQ0x5IuxeXLihzsJ2gakqj/W', NULL, '2022-04-14 15:20:11', '2022-04-14 15:20:11'),
(24, 'Srigita Nur A.M', 'AP-01.083', 1, 'image/default.png', 13, 'Depok, 11 April 2007', 'Anandi Rosijana', 'depok', 'BR', '$2y$10$lrAyFq//ChuF2yUE4FZ.8.bcBTCMlh/EFe201EDHoQVCS3mCErEre', NULL, '2022-04-14 15:20:11', '2022-04-14 15:20:11'),
(25, 'Salimah Renata Ghassani', 'AP-01.062', 1, 'image/default.png', 10, 'Jakarta, 20 September 2005', 'Firman Saftari', 'depok', 'BR', '$2y$10$iLEJl3kMNWrV50qj/hiwyuJS3S9mJBNYiMITUdNjJ0ptZNsI5A0yy', NULL, '2022-04-14 15:20:11', '2022-04-14 15:20:11'),
(26, 'Ghinati Humaira Sholeh', 'AP-01.063', 1, 'image/default.png', 10, 'Jakarta, 25 September 2004', 'Ade Endah', 'depok', 'BR', '$2y$10$5dSxjK.2QBYtNwtvobFOpum4dEHrvjhqr9FDu7u.daw.8uBJfrNx6', NULL, '2022-04-14 15:20:11', '2022-04-14 15:20:11'),
(27, 'Naura Rameyza AG', 'AP-01.082', 1, 'image/default.png', 10, 'Depok, 12 Juli 2006', 'Deny Gunawan', 'depok', 'BR', '$2y$10$187d3qkIhKC2jNMYwzC25eYOhU2rzbk8.8Z09UDYobimb/NHg9VRS', NULL, '2022-04-14 15:20:12', '2022-04-14 15:20:12'),
(28, 'Jasmine Lathifah Rahman ', 'AP-01.048', 1, 'image/default.png', 15, 'Depok, 27 Juli 2003', 'Ihwan Destya rahman', 'depok', 'BR', '$2y$10$dG6KycLyQ8u1GN9hWYjfMOJebldxeEeJlt5Weo1sZxiLUaa.J4E0m', NULL, '2022-04-14 15:20:12', '2022-04-14 15:20:12'),
(29, 'Bian Hafiza Salsabila', 'AP-01.065', 1, 'image/default.png', 8, 'Depok, 11 November 2006', 'Siti Halimah', 'depok', 'BR', '$2y$10$lUmn1EIZUiD8y66HRlZK1eUIKMM2ZhtpVQsg1CtXNfVDboYEktxBW', NULL, '2022-04-14 15:20:12', '2022-04-14 15:20:12'),
(30, 'Hafizah Azzahra ', 'AP-01.067', 1, 'image/default.png', 8, 'Depok, 10 Desember 2010', 'Yudi Nurhidayat', 'depok', 'BR', '$2y$10$P1xWhf4Pc68qCjbcrCACK.W.IXTLYYnBcIHeA8a6Xwl5uCq4yrP2y', NULL, '2022-04-14 15:20:13', '2022-04-14 15:20:13'),
(31, 'Ruuha P Nearan Yeoh', 'AP-01.068', 1, 'image/default.png', 8, 'Jakarta, 4 Januari 2010', 'Kim Ee Yeoh', 'depok', 'BR', '$2y$10$ysKL7Etgpty2hZZQK5ORr.iqADZtRtjgWfxIk3ppM8mE6YTQ6CHcW', NULL, '2022-04-14 15:20:13', '2022-04-14 15:20:13'),
(32, 'Khalisha Mirzhania Murely', 'AP-01.070', 1, 'image/default.png', 8, 'Depok, 2 November 2010', 'Muryo Novianto', 'depok', 'BR', '$2y$10$mTI.h0IE9G9LtcPKJgPo/OhsbkXCnBiDlsBRWZLrbUYW5Kl/SW.Lq', NULL, '2022-04-14 15:20:13', '2022-04-14 15:20:13'),
(33, 'Jihan Khansa Zalika', 'AP-01.071', 1, 'image/default.png', 8, 'Depok, 28 Mei 2010', 'Untung Setio', 'depok', 'BR', '$2y$10$KLZ20VRSdn88tplLzMPjCON9WxeMndw70rx4dJW40kpYKw3HJxSWC', NULL, '2022-04-14 15:20:13', '2022-04-14 15:20:13'),
(34, 'Anandhisya Tsamara Ramadhanti', 'AP-01.080', 1, 'image/default.png', 7, 'Depok, 15 Agustus 2011', 'Yudhi Syahwaludi', 'depok', 'BR', '$2y$10$1piAoj5/gwLfcDDYQ.vNCuHM/VWCNmKtkpx3Ro6E6Lu2eTwEnPP22', NULL, '2022-04-14 15:20:13', '2022-04-14 15:20:13'),
(35, 'Adelia Ghina Hanna Narutama', 'AP-01.073', 1, 'image/default.png', 7, 'Depok, 14 November 2011', 'Agung Narutama', 'depok', 'BR', '$2y$10$uxQvIgc8u6KTfRmMosPhB.y78rs7X4lMLTsWSgA.U1fyBpdCJMr.y', NULL, '2022-04-14 15:20:13', '2022-04-14 15:20:13'),
(36, 'Myra Kanahaya Mulia', 'AP-01.074', 1, 'image/default.png', 7, 'Depok, 19 Desember 2007', 'Budi Prasetiyo', 'depok', 'BR', '$2y$10$URZaPfVhr0Id/k0WP.Xd9uFbRDq.CVHKk6dxFocfMUt89AP7VwA6m', NULL, '2022-04-14 15:20:13', '2022-04-14 15:20:13'),
(37, 'Sofia Andara Zakti', 'AP-01.075', 1, 'image/default.png', 7, 'Depok, 17 November 2008', 'Rof\'an', 'depok', 'BR', '$2y$10$YFKxZZoI1JvLxbxwyH5blOD.AYv3bv.oxb45WLZjX.3vy4OMVh7fK', NULL, '2022-04-14 15:20:14', '2022-04-14 15:20:14'),
(38, 'Aisyah Ramadanty', 'AP-01.079', 1, 'image/default.png', 6, 'Depok, 29 September 2006', 'Saidah', 'depok', 'BR', '$2y$10$.zngTNgBSVqT0OWyt0AL3e9p3VEIpEqYHsAq2R3Jx7oV4.CJ/OyNK', NULL, '2022-04-14 15:20:14', '2022-04-14 15:20:14'),
(39, 'Vania Ananda Kirani', 'AP-01.086', 1, 'image/default.png', 6, 'Sleman, 7 Mei 2011', 'Jani Trias Mursanti', 'depok', 'BR', '$2y$10$ymDjJvAdXco78oHkSc6VGu69jGOAWC5OJ9VCCdh/4Cdf3XT.8lQpy', NULL, '2022-04-14 15:20:14', '2022-04-14 15:20:14'),
(40, 'Annisa Nur Oktaviani', 'AP-01.090', 1, 'image/default.png', 5, 'Depok, 6 Oktober 2008', 'Setiadi', 'depok', 'BR', '$2y$10$EiUqvOftbgjXEv1xnmyC7e42.RN3v3TuGjunUzYzDIuvti43n0.K6', NULL, '2022-04-14 15:20:14', '2022-04-14 15:20:14'),
(41, 'Indonesiana Ayuningtyas W', 'AP-01.093', 1, 'image/default.png', 6, 'Jakarta, 07 Juni 2011', 'Gunawan Wicaksono', 'depok', 'BR', '$2y$10$zQIkJpMbK0Boj804n2tiUOgP1qkTedw0kolOe7c8eG0NpdMO2g8Fe', NULL, '2022-04-14 15:20:14', '2022-04-14 15:20:14'),
(42, 'Mahrayni Mutia Khairunnisa ', 'AP-01.095', 1, 'image/default.png', 5, 'Depok, 27 Mei 2012', 'Mufthia Ridwan', 'depok', 'BR', '$2y$10$tQz4HmW27af436X6efE2ueTkalPmkbI5hXK9mtBwPB1aseqnpG0CO', NULL, '2022-04-14 15:20:15', '2022-04-14 15:20:15'),
(43, 'Putri Bilqis', 'AP-01.096', 1, 'image/default.png', 5, 'Jakarta, 04 Mei 2012', 'Aries Kusmanto', 'depok', 'BR', '$2y$10$L1guK1.MXsuH0K4SA03JwulsI.gWh5pCazGp5uNeybK7h9z.oTCJ2', NULL, '2022-04-14 15:20:15', '2022-04-14 15:20:15'),
(44, 'Dian Nunky Dwi Astuti', 'AP-01.101', 1, 'image/default.png', 4, 'Depok, 17 Mei 2010', 'Kadwi Susanto', 'depok', 'BR', '$2y$10$t2Fg/vduLnkoOJOSTrVki.8z1i7KgL6nqUoV76XcZ5qwW9ja/R6/K', NULL, '2022-04-14 15:20:15', '2022-04-14 15:20:15'),
(45, 'Deanisa Dwi Mutaharatun', 'AP-01.102', 1, 'image/default.png', 4, 'Depok, 13 Desember 2005', 'Amirudin', 'depok', 'BR', '$2y$10$03XUU2QKXw2KYTLanziFLOys2PnwEbKLmeGbUbof/9Ex0SNwxE802', NULL, '2022-04-14 15:20:15', '2022-04-14 15:20:15'),
(46, 'Ervina Nur Yunitasari', 'AP-01.103', 1, 'image/default.png', 4, 'Depok, 26 Juni 2012', 'Teguh Untoro', 'depok', 'BR', '$2y$10$nsGC.jzhZChcMHBK5vl4FeH3L2GKKW6UoAkWjQDFD3qikZmZ3fVmS', NULL, '2022-04-14 15:20:15', '2022-04-14 15:20:15'),
(47, 'Aurilia Jihan Al Qisthi', 'AP-01.104', 1, 'image/default.png', 4, 'Cianjur, 22 April 2011', 'M. Rizki Ariesto', 'depok', 'BR', '$2y$10$VKMrRdy.JweI5Z14A.MnMOlbdwgx0T6m99APoMfViHOShrK/x5Z0q', NULL, '2022-04-14 15:20:15', '2022-04-14 15:20:15'),
(48, 'Finishya Cinta Kanaya Putri', 'AP-01.106', 1, 'image/default.png', 3, 'Depok, 17 Januari 2011', 'Yogi Litasari', 'depok', 'BR', '$2y$10$dT3sSxZzrRDWgo97gg8VWO4la.Qq0ECS3mAGTzrBYfTGE/gjy7D8q', NULL, '2022-04-14 15:20:15', '2022-04-14 15:20:15'),
(49, 'Auliya Zahwarani', 'AP-01.099', 1, 'image/default.png', 16, 'Jakarta, 12 april 2003', 'Toni Setiawan ', 'depok', 'BR', '$2y$10$S2M0VpA8FVAYutHtEyhAOuTipIjx0d4zKh31vBH0pbQXQphf0UbSi', NULL, '2022-04-14 15:20:15', '2022-04-14 15:20:15'),
(50, 'Haifa Ilmi', 'AP-01.115', 1, 'image/default.png', 8, 'Jakarta, 14 Desember 1998', 'Sunting Demiasih', 'depok', 'BR', '$2y$10$4N4n322I4dyd.umAnh.Ep.NUzYJ75rdlSiFaKzNB33DCgJEAociKW', NULL, '2022-04-14 15:20:15', '2022-04-14 15:20:15'),
(51, 'Kyla Humaira ', 'AP-01.108', 1, 'image/default.png', 2, 'Depok, 18 April 2013', 'Yusuf Juli', 'depok', 'BR', '$2y$10$VvsZA1FN7bcCkFNOBtxokeZj5yfyDHqksS5/wd4iWFN5UBcdgvC9.', NULL, '2022-04-14 15:20:16', '2022-04-14 15:20:16'),
(52, 'Nayla Robhiatul Adawiyah', 'AP-01.109', 1, 'image/default.png', 2, 'Jakarta, 06 September 2009', 'Muhammad Syahrizal', 'depok', 'BR', '$2y$10$CHhhtdtlBc6dyiYlMwy4bOVqD49nFO8izR6F0cNI710xuOmczq0Fm', NULL, '2022-04-14 15:20:17', '2022-04-14 15:20:17'),
(53, 'Tazkia Risky Musayyadah', 'AP-01.110', 1, 'image/default.png', 2, 'Jakarta, 28 Januari 2008', 'Ahmad Yasir', 'depok', 'BR', '$2y$10$NoisstU/kcEvUBIf31717eT3anvIFjnOaXIbmT1boDUvHtbxMYs3a', NULL, '2022-04-14 15:20:18', '2022-04-14 15:20:18'),
(54, 'Aliifah Nabiilah Putri ', 'AP-01.112', 1, 'image/default.png', 2, 'Depok, 16 April 2011', 'Aji Pambudi', 'depok', 'BR', '$2y$10$QFGovQK7.mqu5W/3B47o7e3EcSl0uBMVLSU3ud6Z4cmxO3LxOg15O', NULL, '2022-04-14 15:20:18', '2022-04-14 15:20:18'),
(55, 'Chiara Syauqi', 'AP-01.114', 1, 'image/default.png', 2, 'Depok, 27 Oktober 2011', 'A.Irfan Kamuluddin', 'depok', 'BR', '$2y$10$ToZGJ2sIgePNeyQwFxZv1eL9N9KJP4u6xbqXQ5QUXrhFibE8SSeH2', NULL, '2022-04-14 15:20:18', '2022-04-14 15:20:18'),
(56, 'Amirah Artadya Mazaya', 'AP-02.267', 1, 'image/default.png', 6, 'Jakarta, 9 Oktober 2011', 'Feri Adisumarta', 'depok', 'BR', '$2y$10$jRSgoHnX0rIBlrWdWX08P.qA89zPqLA2FrKtOvSStSWAcBc7Hj3/e', NULL, '2022-04-14 15:20:18', '2022-04-14 15:20:18'),
(57, 'Fikri Putri Arjuna', 'AP-10.002', 1, 'image/default.png', 19, 'Bogor, 10 Agustus 1998', 'Junaedi', 'depok', 'BR', '$2y$10$4d2GgJtTW5OSA/Ic/0SI9ONQfXULCkXwaHljWCJzGgi0fGdX2Uh/.', NULL, '2022-04-14 15:20:18', '2022-04-14 15:20:18'),
(58, 'Queen Charlotta Anggraini', 'AP-06.053', 1, 'image/default.png', 9, 'Jakarta, 20 Juni 2010', 'Hendri Hartono', 'depok', 'BR', '$2y$10$989llZW1vT9qxWo/ZZZnTuvQbuseB2zFK9duTQeM3bx4Yx3xfhGhu', NULL, '2022-04-14 15:20:18', '2022-04-14 15:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `tarians`
--

CREATE TABLE `tarians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daerah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `undians`
--

CREATE TABLE `undians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daerah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `singkatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `singkatan`, `name`, `foto`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'image/default.png', 'admin', 'admin@gmail.com', NULL, '$2y$10$xWe43w1o0u/9JHnWpWp5F.A3k3a41h/JoJ8lPQhwcBOKsisPMHskK', NULL, '2022-04-14 12:09:46', '2022-04-14 12:09:46'),
(2, 'BR', 'Balai Rakyat', 'image/default.png', 'cabang', 'balairakyat@gmail.com', NULL, '$2y$10$vpDE3J1vbYWN053djsAynu8mVXD5KbuMocBg9aGqaoF1OxYIMT4.S', NULL, '2022-04-14 15:13:33', '2022-04-14 15:13:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `layouts`
--
ALTER TABLE `layouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilaivokals`
--
ALTER TABLE `nilaivokals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sinopses`
--
ALTER TABLE `sinopses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswas_no_induk_unique` (`no_induk`);

--
-- Indexes for table `tarians`
--
ALTER TABLE `tarians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `undians`
--
ALTER TABLE `undians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_singkatan_unique` (`singkatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absens`
--
ALTER TABLE `absens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `backgrounds`
--
ALTER TABLE `backgrounds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layouts`
--
ALTER TABLE `layouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilaivokals`
--
ALTER TABLE `nilaivokals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sinopses`
--
ALTER TABLE `sinopses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tarians`
--
ALTER TABLE `tarians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `undians`
--
ALTER TABLE `undians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
