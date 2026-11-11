-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 28, 2026 at 03:43 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `tanggal`, `slug`, `isi`, `gambar`, `status`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Best skors', '2026-08-10', 'best-skors', 'Siswa berprestasi peraih best skors', 'berita/99SNqSOwY0TjJsYmEAQFDRIN1XOcYvxrKjSLHLUj.jpg', 'published', NULL, '2026-09-20 08:02:37', '2026-09-20 08:02:37'),
(3, 'Peringkat dua se-Provinsi Jawa Barat', '2026-08-15', 'peringkat-dua-se-provinsi-jawa-barat', 'Penghargaan teerhadap siswa siswi berprestasi', 'berita/YGDxXdtnXbCfweN7pXYvilDccF9ckCqYlpFudzTt.jpg', 'published', NULL, '2026-09-21 08:01:04', '2026-09-21 08:01:04'),
(4, 'Juara 3 solo vocal', '2026-05-10', 'juara-3-solo-vocal', 'Peringkat tiga solo vocal putri tingkat kabupaten Tasikmalaya', 'berita/O9hDnih5ykFcYyz9NECtEULiPT1GeOrIgx0sFfm3.jpg', 'published', NULL, '2026-09-22 02:13:10', '2026-09-22 02:16:36'),
(5, 'Apel Pembukaan MPLS', '2026-07-15', 'apel-pembukaan-mpls', 'Apel pembukaan masa pengenalan lingkungan sekolah', 'berita/aUxCkHxv9uQomLYznivVkeO2Tm3OEyMLvMGuQ51C.jpg', 'published', NULL, '2026-09-24 18:56:27', '2026-09-27 19:03:54'),
(6, 'Pembiasaan pagi', '2026-08-24', 'pembiasaan-pagi', 'Pembiasaan duha pagi siswa siswi', 'berita/w6WTGE9GybS25SQFyiPzIC8Y9CUueOybclUrjDpw.jpg', 'published', NULL, '2026-09-24 18:57:32', '2026-09-27 19:05:23'),
(7, 'Penghargaan pemenang volly putri', '2026-02-05', 'penghargaan-pemenang-volly-putri', 'Juara dua turnamen volly putri tingkat kabupaten', 'berita/lxodasREpprbEBm3Nca3GQt4voqdUaMFl4wrXMYj.jpg', 'published', NULL, '2026-09-24 19:00:32', '2026-09-24 19:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakurikulers`
--

CREATE TABLE `ekstrakurikulers` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ekstrakurikulers`
--

INSERT INTO `ekstrakurikulers` (`id`, `nama`, `kategori`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'Futsal', 'Olahraga', 'Mengembangkan bakat siswa dalam bidang olahraga futsal.', 'ekstrakurikuler/futsal.jpeg', '2026-09-27 20:19:46', '2026-09-27 20:19:46'),
(3, 'IPNU/IPPNU', 'Keagamaan', 'Meningkatkan keimanan siswa siswi SMK Al-Falah.', 'ekstrakurikuler/ipnu.jpeg', '2026-09-27 20:19:46', '2026-09-27 20:19:46'),
(4, 'Pencak Silat', 'Bela Diri', 'Melatih pertahanan diri siswa siswi.', 'ekstrakurikuler/silat.jpeg', '2026-09-27 20:19:46', '2026-09-27 20:19:46'),
(5, 'Paskibra', 'PBB', 'Mengembangkan kemampuan siswa dalam baris-berbaris.', 'ekstrakurikuler/paskib.jpeg', '2026-09-27 20:19:46', '2026-09-27 20:19:46'),
(6, 'PMR', 'Kesehatan', 'Mengasah kemampuan siswa dalam menangani siswa yang sakit.', 'ekstrakurikuler/pmr.jpeg', '2026-09-27 20:19:46', '2026-09-27 20:19:46'),
(7, 'Sanggar Seni', 'Pengembangan Diri', 'Melatih kemampuan vokal siswa siswi.', 'ekstrakurikuler/senii.png', '2026-09-27 20:19:46', '2026-09-27 20:19:46'),
(8, 'PKS', 'Tata Tertib Lalu-lintas', 'Mengembangkan kemampuan dan pengetahuan siswa tentang aturan di jalan raya.', 'ekstrakurikuler/pks.jpeg', '2026-09-27 20:19:46', '2026-09-27 20:19:46'),
(9, 'Pramuka', 'Organisasi', 'Membentuk karakter, kedisiplinan, dan jiwa kepemimpinan.', 'ekstrakurikuler/pramuka.jpeg', '2026-09-27 20:19:46', '2026-09-27 20:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `judul`, `deskripsi`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Upacara hari senin', 'Upacara pengibaran benderea hari senin', 'galeri/HW6tY8iOGj5zTxTuxEFqPeLuJSOUZHzs2Dmm27WK.jpg', 1, '2026-09-18 05:30:53', '2026-09-18 05:30:53'),
(3, 'Pemotretan', 'Pemotretan siswa siswi kelas XII RPL', 'galeri/YldKLCXJROsUNk5gANfxzTfaeZGRFOh9uXy8QPtA.jpg', 1, '2026-09-18 05:32:28', '2026-09-18 05:32:28'),
(4, 'Pembiasaan pagi', 'Pembiasaan duha pagi bersama siswa siswi SMK Al-Falah Tanjungjaya', 'galeri/DUHCdsvnbKAhHEOCi6TnzvgTGhkYj2oa7nQihgbu.jpg', 1, '2026-09-20 06:10:11', '2026-09-20 06:10:11'),
(5, 'Atlit Volly Putri', 'Turnamen volly putri antar sekolah', 'galeri/jTSeGahEjFr8yVo2mMzEWLNcyVGzzaYelIy6OaSQ.jpg', 1, '2026-09-20 06:11:34', '2026-09-20 06:11:34'),
(6, 'Pasukan Khusus Paskibra', 'Event pasukan khusus sanghiyang', 'galeri/5ZfBpGFxBiAinVf2OpFY8i4EY0ijEuIpq90Y6QLN.jpg', 1, '2026-09-20 06:29:39', '2026-09-20 06:29:39'),
(7, 'Tes Kerja', 'Tes kerja bersama mitra kerja SMK Al-Falah', 'galeri/jfEnZnuuAM0AuffXea366ke116tk9EdBlJbDrD0p.jpg', 1, '2026-09-20 07:36:44', '2026-09-20 07:36:44'),
(8, 'Upacara Hari Senin', 'Upacara hari senin mengenang jasa para pahlawan', 'galeri/A1L0QCIfnbq5Gx7kkmTefX2urWwENeMcgkYFmfpN.jpg', 1, '2026-09-20 07:38:55', '2026-09-20 07:38:55'),
(9, 'Panitia Porak', 'Kepanitiaan pekan olahraga antar kelas', 'galeri/lDXm1S0ToeWtjxUtaxykx0eB70SzBugiircOS0Ll.jpg', 1, '2026-09-20 07:41:46', '2026-09-20 07:41:46'),
(10, 'Apel Pembukaan MPLS', 'Apel pembukaan masa pengenalan lingkungan sekolah', 'galeri/2azAZLUtZqAHLn0zv8iGpadOWwGn5tyn0yGxCx62.jpg', 1, '2026-09-22 02:11:32', '2026-09-22 02:11:32'),
(11, 'Foto angkatan', 'Pemotretan angkatan 2026', 'galeri/V1QRa8D2skrZTaXO3UgIZaJIVTnDFhbLsgIkZZl3.jpg', 1, '2026-09-23 18:52:31', '2026-09-23 18:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'jurusan',
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_09_09_062221_create_beritas_table', 1),
(5, '2026_09_09_062529_create_galeris_table', 1),
(6, '2026_09_18_121347_add_tanggal_to_berita_table', 2),
(7, '2026_09_22_150119_create_ekstrakurikulers_table', 3),
(8, '2026_09_24_035041_add_username_to_users_table', 4),
(9, '2026_09_25_000001_create_pendaftarans_table', 5),
(10, '2026_09_28_025255_create_profils_table', 6),
(11, '2026_09_28_033215_create_jurusans_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftarans`
--

CREATE TABLE `pendaftarans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_orang_tua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_keahlian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Baru Masuk','Diverifikasi','Diterima','Ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Baru Masuk',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftarans`
--

INSERT INTO `pendaftarans` (`id`, `nama_lengkap`, `nisn`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_hp`, `nama_orang_tua`, `asal_sekolah`, `program_keahlian`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Agniya Roisyatul Muzqiyah', '0061640500001', 'Tasikmalaya', '2008-01-08', 'Perempuan', 'Tasikmalaya', '009988776665', 'Ridho', 'SMP Nurul Huda', 'PPLG', 'Baru Masuk', '2026-09-24 19:46:27', '2026-09-24 19:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `profils`
--

CREATE TABLE `profils` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npsn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenjang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `akreditasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kepala_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_guru` int UNSIGNED NOT NULL DEFAULT '0',
  `jumlah_siswa` int UNSIGNED NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tentang` text COLLATE utf8mb4_unicode_ci,
  `visi_judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci,
  `misi_judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profils`
--

INSERT INTO `profils` (`id`, `nama_sekolah`, `npsn`, `status_sekolah`, `jenjang`, `alamat`, `akreditasi`, `kepala_sekolah`, `jumlah_guru`, `jumlah_siswa`, `email`, `telepon`, `tentang`, `visi_judul`, `visi`, `misi_judul`, `misi`, `created_at`, `updated_at`) VALUES
(1, 'SMKS Al-Falah Tanjungjaya', '20201234', 'Swasta', 'SMK', 'Jl. KH. Ahmad Faqih KP. Kebonkalapa, Desa Cibalanarik, Kec. Tanjungjaya, Kab. Tasikmalaya, Jawa Barat 46184', 'A', 'Asep Iman Ruyani S.Ag', 99, 1221, 'alfalahtanjungjayasmk@gmail.com', '0812-3456-7890', 'SMK Al Falah Tanjungjaya merupakan sekolah yang memadukan keunggulan pendidikan pesantren serta pengembangan keterampilan berbagai keahlian sebagai kontribusi dalam mensejahterakan masyarakat. Kami menyelenggarakan pendidikan berkualitas dengan penekanan pada pengembangan karakter, kompetensi dan social skill siswa untuk menghadapi dunia industri yang kompetitif.\r\n\r\nSekolah mengembangkan kemampuan akademik, keterampilan, kreativitas, karakter, serta kemampuan siswa agar siap melanjutkan pendidikan maupun memasuki dunia kerja.', 'Menjadi Sekolah Unggul', 'Menjadi sekolah kejuruan yang unggul dalam prestasi, teknologi, keterampilan, dan karakter.', 'Membangun Generasi Berkualitas', 'Menyelenggarakan pendidikan yang berkualitas, inovatif, dan berkarakter.', '2026-09-27 20:02:56', '2026-09-27 20:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('VDDW2pTLjpKD89qzS8MXW3LtrT7E9oDJPirFc6l1', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJsWjY0VDlIUkQzRUJyTjB2RkltdG41aXhBQ2xkb1Fhd3YzTGFUSk9nIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2Vrc3RyYWt1cmlrdWxlciIsInJvdXRlIjoiZWtzdHJha3VyaWt1bGVyIn0sInVybCI6W10sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==', 1790566142);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'admin@smkalfalah.sch.id', NULL, '$2y$12$JIPqjlECV6dt4kRpsUYgQOfeB0UH3BtK6dipJc90IpcKKXSuerFZu', NULL, '2026-09-23 21:02:10', '2026-09-23 21:02:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `berita_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `ekstrakurikulers`
--
ALTER TABLE `ekstrakurikulers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ekstrakurikulers`
--
ALTER TABLE `ekstrakurikulers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profils`
--
ALTER TABLE `profils`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
