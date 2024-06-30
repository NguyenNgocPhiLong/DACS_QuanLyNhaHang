-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 11:02 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `Ten_danhmuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `Ten_danhmuc`) VALUES
(1, 'Đồ uống lạnh');

-- --------------------------------------------------------

--
-- Table structure for table `dat_ban`
--

CREATE TABLE `dat_ban` (
  `id` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `SDT` varchar(12) NOT NULL,
  `Ngay` date NOT NULL,
  `Gio` time NOT NULL,
  `so_nguoi` int(12) NOT NULL,
  `id_phong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dat_ban`
--

INSERT INTO `dat_ban` (`id`, `HoTen`, `email`, `SDT`, `Ngay`, `Gio`, `so_nguoi`, `id_phong`) VALUES
(1, 'Xuan', 'xuanduy025@gmail.com', '0906544345', '2021-05-03', '13:00:00', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dat_monan`
--

CREATE TABLE `dat_monan` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phuongthucthanhtoan` int(11) NOT NULL,
  `Ten_khach` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `SDT` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) NOT NULL,
  `ghichu` text NOT NULL,
  `Tong_tien` float NOT NULL,
  `Trang_thai` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dat_monan`
--

INSERT INTO `dat_monan` (`id`, `user_id`, `phuongthucthanhtoan`, `Ten_khach`, `email`, `SDT`, `diachi`, `ghichu`, `Tong_tien`, `Trang_thai`, `updated_at`, `created_at`) VALUES
(1, NULL, 1, 'xuan', 'ad@gmail.com', '123456789123', 'xuan', '123', 350000, '1', '2021-12-04 07:23:52', '2021-12-04 07:23:52'),
(2, NULL, 1, 'xuan', 'ad@gmail.com', '123456789123', 'xuan', '123', 350000, '1', '2021-12-04 07:23:52', '2021-12-04 07:23:52'),
(3, NULL, 1, 'XuanDuy', 'admin@admin.com', '123456789123', 'xuan', '123', 350000, '1', '2021-12-04 07:26:59', '2021-12-04 07:26:59'),
(4, NULL, 1, 'XuanDuy', 'admin@admin.com', '123456789123', 'xuan', '123', 350000, '1', '2021-12-04 07:26:59', '2021-12-04 07:26:59'),
(5, NULL, 1, 'xuan', 'xuanduy023@gmail.com', '123456789123', 'xuan123', '123456', 350000, '1', '2021-12-04 07:28:02', '2021-12-04 07:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `dat_monan_detail`
--

CREATE TABLE `dat_monan_detail` (
  `id` int(11) NOT NULL,
  `dat_monan_id` int(11) NOT NULL,
  `monan_id` int(11) NOT NULL,
  `Ten_monan` varchar(255) NOT NULL,
  `Gia` double NOT NULL,
  `soluong` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dat_monan_detail`
--

INSERT INTO `dat_monan_detail` (`id`, `dat_monan_id`, `monan_id`, `Ten_monan`, `Gia`, `soluong`, `created_at`, `updated_at`) VALUES
(3, 2, 3, 'Cà Phê sữa', 250000, 5, '2021-12-04 07:23:52', '2021-12-04 07:23:52'),
(4, 2, 2, 'Nước Cam', 100000, 2, '2021-12-04 07:23:52', '2021-12-04 07:23:52'),
(5, 4, 3, 'Cà Phê sữa', 250000, 5, '2021-12-04 07:26:59', '2021-12-04 07:26:59'),
(6, 4, 2, 'Nước Cam', 100000, 2, '2021-12-04 07:26:59', '2021-12-04 07:26:59'),
(7, 5, 3, 'Cà Phê sữa', 250000, 5, '2021-12-04 07:28:02', '2021-12-04 07:28:02'),
(8, 5, 2, 'Nước Cam', 100000, 2, '2021-12-04 07:28:02', '2021-12-04 07:28:02');

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
-- Table structure for table `lich_lam`
--

CREATE TABLE `lich_lam` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lich_lam`
--

INSERT INTO `lich_lam` (`id`, `title`, `start`, `end`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'a', '2021-11-27', '2021-11-28', '2021-11-27 02:25:28', '2021-11-27 02:25:28', 1),
(2, 'ngay nghi', '2021-11-28', '2021-11-29', '2021-11-27 02:59:13', '2021-11-27 02:59:13', 1),
(3, 'su kien', '2021-11-28', '2021-11-30', '2021-11-27 04:21:31', '2021-11-27 04:21:31', 1),
(5, 'staff', '2021-12-01', '2021-12-02', '2021-12-01 03:51:48', '2021-12-01 03:51:48', 5),
(6, 'lich di lam', '2021-12-01', '2021-12-03', '2021-12-01 03:52:52', '2021-12-01 03:52:52', 1),
(7, 'd', '2021-12-04', '2021-12-04', '2021-12-01 04:10:12', '2021-12-01 04:10:12', 7);

-- --------------------------------------------------------

--
-- Table structure for table `loai_nguoidung`
--

CREATE TABLE `loai_nguoidung` (
  `id` int(11) NOT NULL,
  `MoTa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loai_nguoidung`
--

INSERT INTO `loai_nguoidung` (`id`, `MoTa`) VALUES
(1, 'Guest'),
(2, 'Admin'),
(3, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `loai_phong`
--

CREATE TABLE `loai_phong` (
  `id` int(11) NOT NULL,
  `MoTa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loai_phong`
--

INSERT INTO `loai_phong` (`id`, `MoTa`) VALUES
(1, 'Vip');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `monan`
--

CREATE TABLE `monan` (
  `id` int(11) NOT NULL,
  `Ten_monan` varchar(255) NOT NULL,
  `Mo_ta` text NOT NULL,
  `Hinhanh` text NOT NULL,
  `Gia` decimal(10,0) NOT NULL,
  `idDanhMuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monan`
--

INSERT INTO `monan` (`id`, `Ten_monan`, `Mo_ta`, `Hinhanh`, `Gia`, `idDanhMuc`) VALUES
(2, 'Nước Cam', 'Cam', '2021-09-01-drink-cam.jpg', '50000', 1),
(3, 'Cà Phê sữa', 'Cà phê sữa', 'trasua.jpg', '50000', 1);

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
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `id` int(11) NOT NULL,
  `Ten_phong` varchar(255) NOT NULL,
  `Anh` text NOT NULL,
  `cho_trong` int(5) NOT NULL,
  `id_loaiphong` int(11) NOT NULL,
  `Mo_ta` text NOT NULL,
  `Gia` decimal(10,0) NOT NULL,
  `Trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`id`, `Ten_phong`, `Anh`, `cho_trong`, `id_loaiphong`, `Mo_ta`, `Gia`, `Trang_thai`) VALUES
(1, 'Vip', '', 0, 1, 'Vip', '90000', 1),
(2, 'Vip1', 'Screenshot 2021-10-31 21093761.png', 10, 1, 'Vip1', '150000', 1),
(3, 'Vip2', 'Picture132.png', 20, 1, 'Vip2', '50000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ho` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmnd` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_vao_lam` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `Ho`, `Ten`, `email`, `email_verified_at`, `password`, `SDT`, `dia_chi`, `cmnd`, `ngay_vao_lam`, `remember_token`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'xuan', 'Ta', 'duyx', 'ad@mail.com', NULL, '$2y$10$TKid4KHuKUcDxw734NYq..j85QeVZlVehMfckE3vPgOa1mHqLyTkm', '123456789123', 'Ad', '12345678', '2020-01-01', NULL, '2021-10-14 10:42:41', '2021-10-23 17:54:39', 2),
(3, 'xuandc', 'Ta', 'duy', 'ad@gmail.com', NULL, '$2y$10$uuBuGeHihWE8g.InhRS4Zu4IACsotBA6ygUX.lSJ57vtLsOdwNpbm', '123456789123', 'Ad', '12345678', '2020-01-01', NULL, '2021-10-16 09:02:06', '2021-10-24 19:09:01', 1),
(4, 'xuand', 'Ta', 'duystaff', 'staff@gmail.com', NULL, '$2y$10$il2UxRqp2R3h0YZzSjTCYerCDCHNioOsz9rTDfZUuKw6gAmIx0mKq', '123456789123', 'Ad', '12345678', '2020-01-02', NULL, '2021-10-23 17:52:22', '2021-11-29 23:15:41', 3),
(5, 'xuanstaff', 'Ta', 'Xuan', 'staff@mail.com', NULL, '$2y$10$BAHMY02p30Ps9EKPHHDfGu1/S7qbA.q2o.R7L/jml9saNZW/EOpGa', '123456789123', 'Ad', '12345678', '2020-01-01', NULL, '2021-11-29 23:30:01', '2021-11-29 23:30:01', 3),
(7, 'xuanduy112', 'Ta', 'duy', 'staff1@gmail.com', NULL, '$2y$10$8AGYam23Gdrm.QGkdqLlkeMCbUR9TZTFMvvLMDZ4WY7/rlAgLIUqu', '123456789123', 'Ad', '12345678', '2020-12-01', NULL, '2021-11-30 21:09:30', '2021-11-30 21:09:30', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_ban`
--
ALTER TABLE `dat_ban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dat_ban_fk_id1` (`id_phong`);

--
-- Indexes for table `dat_monan`
--
ALTER TABLE `dat_monan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datmonan_fk_id1` (`user_id`);

--
-- Indexes for table `dat_monan_detail`
--
ALTER TABLE `dat_monan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lich_lam`
--
ALTER TABLE `lich_lam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_nguoidung`
--
ALTER TABLE `loai_nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_phong`
--
ALTER TABLE `loai_phong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monan_fk_id1` (`idDanhMuc`);

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
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_id_loaiphong` (`id_loaiphong`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_user_loaiuser` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dat_ban`
--
ALTER TABLE `dat_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dat_monan`
--
ALTER TABLE `dat_monan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dat_monan_detail`
--
ALTER TABLE `dat_monan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lich_lam`
--
ALTER TABLE `lich_lam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loai_nguoidung`
--
ALTER TABLE `loai_nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loai_phong`
--
ALTER TABLE `loai_phong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `monan`
--
ALTER TABLE `monan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dat_ban`
--
ALTER TABLE `dat_ban`
  ADD CONSTRAINT `dat_ban_fk_id1` FOREIGN KEY (`id_phong`) REFERENCES `phong` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dat_monan`
--
ALTER TABLE `dat_monan`
  ADD CONSTRAINT `datmonan_fk_id1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `monan_fk_id1` FOREIGN KEY (`idDanhMuc`) REFERENCES `danh_muc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `fk_id_id_loaiphong` FOREIGN KEY (`id_loaiphong`) REFERENCES `loai_phong` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_loaiuser` FOREIGN KEY (`user_id`) REFERENCES `loai_nguoidung` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
