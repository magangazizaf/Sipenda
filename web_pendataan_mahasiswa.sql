-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Sep 2024 pada 10.20
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
-- Database: `web_pendataan_mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `kode_dosen` int(11) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `user_id`, `kelas_id`, `kode_dosen`, `nip`, `name`, `created_at`, `updated_at`) VALUES
(4, 4, 7, 112, '198810142019031007', 'Slamet Handoko', '2024-09-17 01:05:03', '2024-09-21 02:48:17'),
(6, 5, 10, 112, '199109172022031008', 'Sirli Fahriah', '2024-09-17 04:15:13', '2024-09-17 16:28:51'),
(8, 6, NULL, 112, '199109172024051006', 'Amran Yobioktabera', '2024-09-17 15:12:15', '2024-09-20 16:21:27'),
(9, 17, 3, 112, '199109172032031267', 'Suko Tyas Pernanda', '2024-09-20 16:21:11', '2024-09-20 16:21:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kaprodi`
--

CREATE TABLE `kaprodi` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode_dosen` int(11) DEFAULT NULL,
  `nip` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `name`, `jumlah`, `created_at`, `updated_at`) VALUES
(3, 'Kelas IK-3B', 10, '2024-09-14 09:04:56', '2024-09-17 02:31:33'),
(4, 'Kelas IK-3A', 10, '2024-09-14 18:03:46', '2024-09-14 18:03:46'),
(7, 'Kelas IK-3C', 10, '2024-09-14 18:36:10', '2024-09-14 18:36:10'),
(10, 'Kelas IK-3D', 10, '2024-09-16 05:26:06', '2024-09-16 05:26:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `nim` varchar(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `edit` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_id`, `kelas_id`, `nim`, `name`, `tempat_lahir`, `tanggal_lahir`, `edit`, `created_at`, `updated_at`) VALUES
(2, 3, 3, '33422122', 'Wahyu Hariyanto', 'Magelang', '2002-10-22', 0, '2024-09-18 03:50:57', '2024-09-19 04:07:51'),
(3, 7, 3, NULL, 'Nabiha Kailang Wirakrama', NULL, NULL, 0, '2024-09-18 03:55:03', '2024-09-18 03:55:03'),
(4, 8, 7, NULL, 'Ulil Abror', NULL, NULL, 0, '2024-09-18 04:00:56', '2024-09-18 04:00:56'),
(5, 10, 3, NULL, 'Dipha Wiguna', NULL, NULL, 0, '2024-09-18 14:18:08', '2024-09-18 14:18:08'),
(6, 9, 3, NULL, 'Muhammad Rizky Faizullah Sudibyo', NULL, NULL, 0, '2024-09-18 14:27:10', '2024-09-18 14:27:10'),
(7, 12, 3, NULL, 'Hafiz Rahman Hakim', NULL, NULL, 0, '2024-09-18 15:04:35', '2024-09-18 15:04:35'),
(8, 11, 3, NULL, 'Feri Irawan', NULL, NULL, 0, '2024-09-18 15:05:19', '2024-09-18 15:05:19'),
(9, 13, 3, '33422104', 'Aziz Alif Faturochman', 'Cilacap', '2004-06-11', 0, '2024-09-18 15:11:06', '2024-09-21 04:12:21'),
(12, 15, 3, NULL, 'Efrino Eko Wahyu', NULL, NULL, 0, '2024-09-20 03:12:52', '2024-09-20 03:12:52'),
(13, 14, 3, NULL, 'Tri Susanti', NULL, NULL, 0, '2024-09-20 03:13:07', '2024-09-20 03:13:07'),
(14, 16, 3, NULL, 'Nabila Ihza Sivana', NULL, NULL, 0, '2024-09-20 03:13:20', '2024-09-20 03:13:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `id_html` varchar(255) DEFAULT NULL,
  `parent_id` varchar(255) DEFAULT NULL,
  `urutan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `nama_menu`, `url`, `icon`, `id_html`, `parent_id`, `urutan`) VALUES
(1, 'Menu Manajemen', '#', '', NULL, '0', '1'),
(2, 'Dashboard', 'home', 'fas fa-home', NULL, '1', '1'),
(3, 'Manajemen Pengguna', '#', 'fas fa-users-cog', NULL, '1', '2'),
(4, 'Kelola Pengguna', 'manage-user', NULL, NULL, '3', '1'),
(5, 'Kelola Role', 'manage-role', NULL, NULL, '3', '2'),
(6, 'Kelola Menu', 'manage-menu', NULL, NULL, '3', '3'),
(7, 'Backup Server', '#', '', NULL, '0', '2'),
(8, 'Backup Database', 'dbbackup', 'fas fa-database', NULL, '7', '1'),
(10, 'Menu', '#', NULL, NULL, '0', '1'),
(11, 'Data', '#', 'fas fa-table', NULL, '10', '1'),
(12, 'Manage Dosen', 'data-dosen', 'fas fa-file', NULL, '11', '1'),
(13, 'Manage Kelas', 'data-kelas', 'fas fa-user-graduate', NULL, '11', '1'),
(14, 'Manage Kelas', '#', 'fas fa-user-graduate', NULL, '10', '1'),
(15, 'Data Anggota Kelas', '/anggotaKelas', 'fas fa-user-plus', NULL, '14', '1'),
(16, 'Requests', '/dosen/request', 'far fa-bell', NULL, '10', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_01_234158_create_menus_table', 1),
(6, '2024_02_02_053619_create_permission_tables', 1),
(7, '2024_02_03_232722_create_role_has_menus_tables', 1),
(8, '2024_02_03_235312_add_menu_id_on_permission', 1),
(9, '2024_09_13_165312_create_role_redirects_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 16),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES
(1, 'create_user', 'web', '2024-09-12 09:26:28', '2024-09-12 09:26:28', 4),
(2, 'read_user', 'web', '2024-09-12 09:26:28', '2024-09-12 09:26:28', 4),
(3, 'update_user', 'web', '2024-09-12 09:26:28', '2024-09-12 09:26:28', 4),
(4, 'delete_user', 'web', '2024-09-12 09:26:28', '2024-09-12 09:26:28', 4),
(5, 'create_role', 'web', '2024-09-12 09:26:28', '2024-09-12 09:26:28', 5),
(6, 'read_role', 'web', '2024-09-12 09:26:28', '2024-09-12 09:26:28', 5),
(7, 'update_role', 'web', '2024-09-12 09:26:28', '2024-09-12 09:26:28', 5),
(8, 'delete_role', 'web', '2024-09-12 09:26:28', '2024-09-12 09:26:28', 5),
(9, 'create_menu', 'web', '2024-09-12 09:26:28', '2024-09-12 09:26:28', 6),
(10, 'read_menu', 'web', '2024-09-12 09:26:28', '2024-09-12 09:26:28', 6),
(11, 'update_menu', 'web', '2024-09-12 09:26:28', '2024-09-12 09:26:28', 6),
(12, 'delete_menu', 'web', '2024-09-12 09:26:28', '2024-09-12 09:26:28', 6),
(13, 'backup_database', 'web', '2024-09-12 09:26:28', '2024-09-12 09:26:28', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `mahasiswa_id` bigint(20) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2024-09-12 09:26:28', '2024-09-12 09:26:28'),
(2, 'kaprodi', 'web', '2024-09-12 09:38:03', '2024-09-12 09:38:03'),
(3, 'mahasiswa', 'web', '2024-09-13 07:45:04', '2024-09-13 07:45:04'),
(4, 'dosen', 'web', '2024-09-16 16:14:08', '2024-09-16 16:14:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_menus`
--

CREATE TABLE `role_has_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_menus`
--

INSERT INTO `role_has_menus` (`id`, `menu_id`, `role_id`) VALUES
(20, 1, 1),
(21, 3, 1),
(22, 4, 1),
(23, 5, 1),
(24, 6, 1),
(25, 7, 1),
(26, 8, 1),
(34, 10, 2),
(35, 11, 2),
(36, 12, 2),
(37, 13, 2),
(42, 10, 4),
(43, 14, 4),
(44, 15, 4),
(45, 16, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', '2024-09-12 09:26:28', '$2y$10$4N368UTnyVcnmMTSchySiO5xJC2JhZepqNDcLrPYZFqdfWIDys5fm', 'iFv2akaJV2o7SUkyALkElvR5cxpuJa8c7qzg1pLHlQpf4vIEEV95cOrbsFP6', '2024-09-12 09:26:28', '2024-09-12 09:26:28'),
(2, 'Idhawati Hestiningsih', 'kaprodi@gmail.com', '2024-09-12 09:41:33', '$2y$10$CPir3dl4Y/Znwc72LZLh6OEe6e1cKc8rU6hIbkEzip6tb6MO2uWnu', NULL, '2024-09-12 09:41:33', '2024-09-12 09:41:33'),
(3, 'Wahyu Hariyanto', 'wahyumagelang@gmail.com', '2024-09-13 07:45:54', '$2y$10$LFrlZxuoYUUkYptNv9Vode5qfSM1Omq2Ypuq9rRNHuQZFy44rajv2', NULL, '2024-09-13 07:45:54', '2024-09-13 07:45:54'),
(4, 'Slamet Handoko', 'slamet.handoko@gmail.com', '2024-09-16 16:16:21', '$2y$10$zDZTrRIe1yHDrWzZBHMdcuHjCyaBjppb/RocaqShs2sC1XwNqf.AS', NULL, '2024-09-16 16:16:21', '2024-09-16 16:16:21'),
(5, 'Sirli Fahriah', 'sirli.fahriah@gmail.com', '2024-09-17 04:03:29', '$2y$10$KrqYUqF9KHans9Yc3PA9BuduV8S0313cTjIkUCSFMXUxSb5o74GIO', NULL, '2024-09-17 04:03:29', '2024-09-17 04:03:29'),
(6, 'Amran Yobioktabera', 'amaran.yobioktabera@gmail.com', '2024-09-17 06:55:53', '$2y$10$GGoFM2WCfxKh1hiH4kSBV.8N7Mh7/Z7/DUolJN7SYZbBZStBTZSIK', NULL, '2024-09-17 06:55:53', '2024-09-17 06:55:53'),
(7, 'Nabiha Kailang Wirakrama', 'nabihaka@gmail.com', '2024-09-18 03:53:22', '$2y$10$GaUBDzifT/ENRBJ52yhySeke6ANqL3yuNbkcVRW5vtNFd/fS18.pW', NULL, '2024-09-18 03:53:22', '2024-09-18 03:53:22'),
(8, 'Ulil Abror', 'ulil.abror@gmail.com', '2024-09-18 03:54:03', '$2y$10$zEWba0NvF4QYSt.zBdGZa.zJlQz.gKsV6xPwcXsqXLq6Yu8/s..Oy', NULL, '2024-09-18 03:54:03', '2024-09-18 03:54:03'),
(9, 'Muhammad Rizky Faizullah Sudibyo', 'm.rizky.faizullah@gmail.com', '2024-09-18 13:30:10', '$2y$10$EmegewZ5jGMs1kR3QJf9gOnBJ9Ixkj9NFgt6ZH.shBV9ueFTPlh8u', NULL, '2024-09-18 13:29:49', '2024-09-18 13:30:10'),
(10, 'Dipha Wiguna', 'dipha.wiguna@gmail.com', '2024-09-18 13:45:00', '$2y$10$bDnZAi4DPU77LJdWlltZI.aCgyXf5LJ9/2mqWwU0/myFyQqu3xdwq', NULL, '2024-09-18 13:45:00', '2024-09-18 13:45:00'),
(11, 'Feri Irawan', 'feri.irawan@gmail.com', '2024-09-18 13:47:16', '$2y$10$OLUQNQybvxjvP7teMCHZ8O7tJ6b/JuHmmMl.aQLXhejacyJUsj1BW', NULL, '2024-09-18 13:47:16', '2024-09-18 13:47:16'),
(12, 'Hafiz Rahman Hakim', 'hafiz.rahman.h@gmail.com', NULL, '$2y$10$RsBLblLlaEYM1.GZCes56O.WPLLQewWPva9aI6hqfX1Jq63OGe3ie', NULL, '2024-09-18 14:12:06', '2024-09-18 14:12:06'),
(13, 'Aziz Alif Faturochman', 'aziz.alif@gmail.com', '2024-09-18 15:09:36', '$2y$10$SQb9lnWhUpqgWdOzDjg20.QEBLH7M4OPNg0NAKHoYWaJHZShHzBRm', 'sNJCLkLavNc8PHlBydVTMj2lwBh6eqaNH2Xr3RNL1bSrmoFRRT4IjsbB9fC1', '2024-09-18 15:09:36', '2024-09-18 15:09:36'),
(14, 'Tri Susanti', 'tri.susanti@gmail.com', '2024-09-20 03:08:46', '$2y$10$IavhsuF73Kv6oeeQNnZPyenMTuY1B7AUBoUm97TcuXTYpHla/PE2.', NULL, '2024-09-20 03:08:46', '2024-09-20 03:08:46'),
(15, 'Efrino Eko Wahyu', 'efrino.eko@gmail.com', '2024-09-20 03:10:29', '$2y$10$sLvG9kvlIM5KpCVWKOa4O.1rwm4Maqr02E0NlMAIDdrtAsy2lQQb.', NULL, '2024-09-20 03:10:29', '2024-09-20 03:10:29'),
(16, 'Nabila Ihza Sivana', 'nabila.ihza@gmail.com', '2024-09-20 03:11:36', '$2y$10$IoWy925zxxjZHlf5IRipfuyMWiSS1jqAfZWFkM3fRgLLdpwg0AmZC', NULL, '2024-09-20 03:11:36', '2024-09-20 03:11:36'),
(17, 'Suko Tyas Pernanda', 'suko.tyas@gmail.com', '2024-09-20 16:18:18', '$2y$10$B4F4ilAZufEQ/xhk2ak1TeYM87tAkq5hALQ/UOCl.wBPgH27CaRyG', NULL, '2024-09-20 16:18:18', '2024-09-20 16:18:18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `dosen_ibfk_2` (`kelas_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kaprodi`
--
ALTER TABLE `kaprodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_menus`
--
ALTER TABLE `role_has_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_has_menus_menu_id_foreign` (`menu_id`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kaprodi`
--
ALTER TABLE `kaprodi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `role_has_menus`
--
ALTER TABLE `role_has_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kaprodi`
--
ALTER TABLE `kaprodi`
  ADD CONSTRAINT `kaprodi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`);

--
-- Ketidakleluasaan untuk tabel `role_has_menus`
--
ALTER TABLE `role_has_menus`
  ADD CONSTRAINT `role_has_menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
