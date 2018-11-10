-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2018 at 12:43 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transactions`
--

CREATE TABLE `detail_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_product`
--

CREATE TABLE `image_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_05_144541_create_blogs_table', 1),
(4, '2018_10_21_053052_create_products', 1),
(5, '2018_10_21_055355_create_image_product', 1),
(6, '2018_10_21_055730_create_transactions', 1),
(7, '2018_10_21_055750_create_detail_transactions', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `products` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `total` decimal(15,2) UNSIGNED NOT NULL,
  `date_transaction` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_payment` enum('waiting','success','cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting',
  `prof_of_payment` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `api_token`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'refixz86@lazday.com', NULL, '$2y$10$Y.KAhPsVKFrOsV7DqX7VE.O9IxsUBNomvl9VoQLtVrbrXdOZEzqqm', 'JaRl04OYHFlaC3H20u', 1, 'HFXIgig439', NULL, NULL),
(2, 'Banawi Garan Hutasoit', 'utami.balangga@example.net', NULL, '$2y$10$yCaL5LOk5N7n.68Cs3fLuOA7P42HVHet7q./QzBRBc.bVVwSSuE46', '9Zo6ehhOyRvx0Zor4G', 0, 'Ex5W5kbXwG', '2018-11-09 07:36:16', '2018-11-09 07:36:16'),
(3, 'Shakila Zulaikha Usada S.Pd', 'rahmi24@example.org', NULL, '$2y$10$88Z7x6xZumH8CNE1SUbgK.W3X7bHLL7.o0OT36bxLTrK4vN8TKmFu', 'ybPQCrb4vL1NCtNABr', 0, 'JtxJ8Nhv2v', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(4, 'Dinda Laksita', 'padmi60@example.com', NULL, '$2y$10$QWqMMp0JRIvZ5ujAAblJNuy2iqsNomLIfnmpEG349SFOcxT.5JQ1q', 'Lvn3OJop4vExKtfupr', 0, '7xN1LCL1KP', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(5, 'Rahmi Zelda Pratiwi S.Farm', 'nurdiyanti.shania@example.org', NULL, '$2y$10$q6ZgjBQQKkyDAn.z2LxUhe.GkmFaULuTvvhqvRZZdEiNobGC5jDB.', 'nQLDjAKhwiVpIjWli5', 0, '3sCHhR0PTl', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(6, 'Violet Febi Mayasari', 'safina.usamah@example.org', NULL, '$2y$10$UeofESX8V3TTVTnsGZvbYuzu37uCP4stbTtq8WdAqaoP0uEL2100K', 'GsMvZySbj8pBd7xAEi', 0, 'cwZWHVdKm0', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(7, 'Aurora Yuniar S.Pt', 'farida.mitra@example.net', NULL, '$2y$10$WTkL3.Itlt.6WGghVVvU5.Obm2of72Xbnm8kYIv9gxM4VRCIdNkEm', 'L1OjzTT9svsrxhi6Ao', 0, '3yWsFsZZIQ', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(8, 'Ida Fujiati', 'kasiyah.permata@example.net', NULL, '$2y$10$r9pr2dl4xUfFDi2KQHh4R.bpVsBw2797aUYAY2roQYiHmsgZFbC/O', 'jRJ2hycasGFELNLG8h', 0, 'nnJSTNGNBk', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(9, 'Kala Prasetya', 'gamanto36@example.net', NULL, '$2y$10$.2xr7sTyu6sAppEgecF.EutVR8DEWsjm7gQubkY9wDlRhPoh5lMLi', 'Ic48AlrRXkVGAYNkTW', 0, 'LtYASPQ3VQ', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(10, 'Safina Handayani', 'heryanto71@example.org', NULL, '$2y$10$4L9IpAOqJNfLAMHNv4nJp.1j2C7hXIrmINkQYhmT6HbBQN0kENqcq', 'bzVjJzsBqUw59fYk2w', 0, '3t2ZCgHWn8', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(11, 'Tira Pudjiastuti', 'jgunawan@example.net', NULL, '$2y$10$dNzScbVYhwjBZp.SSN5xVu1O5gFp8Vvo.qYMEVujTyoXYxQiL.vgO', 'AWuyTMkJHCEldSCGXy', 0, 'tJKScWwbs3', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(12, 'Nilam Susanti', 'adriansyah.vivi@example.net', NULL, '$2y$10$ocAsRm5nYO9dCC3RSs3dCunVAEV98ctjUvQatZ3BQsF8i2cDqstau', 'BmVxBXAGJ9dGHrPd50', 0, 'WY3hXVGMRO', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(13, 'Mahfud Sihombing', 'ghardiansyah@example.org', NULL, '$2y$10$GqaR/6.5wKi444IFxpdhA.Pjwgxb2A5uRAJFAlU2i1CjVL/Q2uePW', 'K3NXucMefqmItsfiBB', 0, 'xdLFmGQZ2K', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(14, 'Lanjar Najib Wibowo M.Ak', 'prasasta.sidiq@example.org', NULL, '$2y$10$ogei0L83zfd2lfJ5WiyeN.CXp7y0LDDWsnZRctHodpDuxNa8ZW4k6', 'njMPl4plAYSvi7CdhP', 0, 'glzvAZaXRg', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(15, 'Karsana Simbolon', 'samiah19@example.net', NULL, '$2y$10$UQpRAoW5hKBpfrgqtMEhdOLAOihgy7o2kA8v7crml9a.5/2ik62ka', 'N31A8PxScKu4W15mm6', 0, 'eyl2X6aM15', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(16, 'Bella Fujiati M.Farm', 'epratiwi@example.net', NULL, '$2y$10$ZLwMWe/x/FAdpv5zIfKKPeUmGYKSoTmT.BiCxY.XZsMLLhE3POmKa', 'EnFsT6GLicQ1ocz8yx', 0, 'RrrHfObf54', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(17, 'Zulfa Kiandra Handayani S.Pd', 'kasiyah.natsir@example.net', NULL, '$2y$10$zSQjYcMnrlGzWqylW9LmseJ18kktyHVDJQ9pRNcK9U6vvL4qzX3Oe', 'PIiBS5X7XoGYNsGgtu', 0, '1htEg9Lqi0', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(18, 'Talia Aryani S.Psi', 'dewi.wasita@example.net', NULL, '$2y$10$Qa3El7iwiLoxgbT5v1zvreKb9ebDcRWCub/8jliziRj09b8rMyuSq', 'oOT2b3UW8Dk011ybwq', 0, 'AM7QdRNFhV', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(19, 'Puput Usamah S.I.Kom', 'upalastri@example.org', NULL, '$2y$10$nQY8fLXknOMo0K57CCkrMuerqSGjRy/RKXWUw.fG6mVcrgUswD83W', 'ncPX1hT12jPoPdAxqI', 0, 'gWNd80Lf2h', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(20, 'Padmi Puspita', 'ifa34@example.org', NULL, '$2y$10$oyjbSiz6m.IUCB2ZlIfMae2QLU1X/gmgdJXqlU9wQVtTw.LFKQqtK', '3ZCoraI9JHBx7ZzvPi', 0, '93NrwIZmK4', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(21, 'Ganep Saptono S.Sos', 'suci.rahayu@example.org', NULL, '$2y$10$pteCFYQd5rdhSMmjYOOUpOt8oi1s5l.EyM7uq9CEnvlsk0GjKpQ2S', '6Q0BlTaJF8yPJB2byM', 0, 'SJFVb6p5dU', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(22, 'Bakti Firmansyah', 'lmayasari@example.net', NULL, '$2y$10$05lmGntCgaIKG8LLma.Koebcq0EVHklOzQ1eXX6Z62Lu8NqfyNpki', 'BpstpB7OTdBqumGAfb', 0, 'C0bpYYkmmF', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(23, 'Malika Citra Palastri', 'mustofa.mandala@example.net', NULL, '$2y$10$BkQZlighIXvdtgz0JHKWzunT91.5D9xp23uKnj8rU1bgg0TCDcKwm', 'jdoZQD2dcvhx1roP31', 0, 'Po4w9f0sJD', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(24, 'Damu Habibi', 'putra.ratna@example.org', NULL, '$2y$10$kNvSl7FlqNBGkOLZkhldz.zmMbG3BNnFxq7ARhH/hyT6m0eoY/SB2', 'Gjf4TL0E8BsSW5bYxz', 0, 'TEaSrKzMbM', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(25, 'Talia Yulianti', 'dina.maryadi@example.com', NULL, '$2y$10$IHDSzibtdNB8hVL1XpIl/.E89CCqsFLo2xqiq6wejkfhaH5eNY6Q2', 'EookPlVHKBwqEyEoNM', 0, 'CNYReiVdGv', '2018-11-09 07:36:17', '2018-11-09 07:36:17'),
(26, 'Wulan Ade Anggraini S.I.Kom', 'kmarpaung@example.net', NULL, '$2y$10$Imtqa/uzeAuAXCQ6bZKRI.i3LRWwmbGghx/18w57lb4F2MXGRuRh2', 'ZsdZI0vZfpnbWyq90V', 0, 'wFIB9aBwgb', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(27, 'Estiono Bajragin Widodo', 'prajata@example.org', NULL, '$2y$10$Rpk6835hw.j0He86B8xlMeBwVEzFMH0YXMY8QFQh72AKrJDMvj6sq', 'mvqDt61DGbbA2FewTh', 0, 'wWaeuOghPP', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(28, 'Eka Hassanah', 'kani50@example.com', NULL, '$2y$10$s7fyIPBmYKcTgt4dzEyA4.vUsW3S5C4qz/H4vo661AKosfdozxdCS', 'GjpsQ5t5leSuGWbKdB', 0, 'hG0ZZMIAmx', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(29, 'Gandi Simbolon S.Psi', 'marbun.jabal@example.com', NULL, '$2y$10$pgem5ERw8XbQyw9K6IlVvO7QMhfNSXxs1zSMvDeBjpEUXVhHNFPc2', 'wdPMQcsBoB6IizkEuG', 0, 's7xWMvSmqb', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(30, 'Safina Susanti', 'artawan26@example.net', NULL, '$2y$10$4soguEr219DzJMxPb9Kw3.kJRSALo3K2vSAFLxFjDppe6KGQCh4qu', 'YEfjItavt0bJq4cjfh', 0, 'oC52N5TNJX', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(31, 'Ulva Handayani S.I.Kom', 'kusmawati.nasab@example.com', NULL, '$2y$10$9nPq2nx8Tb8G3ysdbsi3X.vRgYZ5okIkVug3D9woSi4r4D4j3QSCe', 'Y3xVnqsZikOdjkri4f', 0, 'jTkzHlW3os', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(32, 'Bagya Firmansyah', 'vinsen47@example.net', NULL, '$2y$10$fu78yATH3cNnz5FZvUezi.mEDZJsmQfBqci9R7CsjEPeIgltfuR8a', '5EFN0mkNBQOWYVBNfH', 0, 'ojnujbezIn', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(33, 'Galur Kurniawan', 'bagus42@example.com', NULL, '$2y$10$6ztFFjAbA.8iIKL/DZcxveQkOhFO0YWLK.IpifHNkwWCFCOrntkCG', '3nTtUWl69mmS3NYsGA', 0, 'OytzoQSfBB', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(34, 'Muni Tampubolon', 'fyuliarti@example.net', NULL, '$2y$10$o2X0PBUYab/V1UVtJst54e3rTlZMzu/BQSSAGmCSdB2NDPwCVzy4O', 'k7IAvUh3z2Rwr1Uett', 0, 'b5ydSDsj8S', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(35, 'Tami Mandasari S.Psi', 'tania25@example.com', NULL, '$2y$10$XK9ul9TWV5qRQclhyOL68.lKe6io2d0O/OmY.sVUc132xQcY6PMBK', 'tyeZSjx1OBWGvEyQHn', 0, 'z2OGrkAswh', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(36, 'Cakrajiya Suryono', 'paryani@example.org', NULL, '$2y$10$nxIUVIge7J3OJzunfmn6leCA8BRhcIXcImRFNglQf9/OK4dIF7Puq', 'ImWhLb5OmdpoyJqxw3', 0, 'HAEQZPy5pN', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(37, 'Emong Sihombing', 'hariyah.eva@example.net', NULL, '$2y$10$p3gZCGsVXa1a0nN04IgkpuM.kmUCk0mNpxTzBgJPiLZW3jjd7Icyq', 'Yk7Z4XvswZ1G7Jn3tN', 0, 'FN85F9QQLh', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(38, 'Betania Namaga', 'winda.anggraini@example.com', NULL, '$2y$10$6/n9It5c0a0PKxgIW34pIOOsiN1WPX7tNJZ/avJ3D1W30wPKChIJ2', 'u0ZEQTe2rlWcQ0ru7C', 0, '6e9oHtCj2X', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(39, 'Naradi Cakrabirawa Lazuardi', 'rachel52@example.org', NULL, '$2y$10$aaME4rQijfNsCorqxs4tu.UAg0AYmkwnhe9lyze6Q4A0DM.ctxXta', 'Ow0RSVXRtKLQd1UUsm', 0, 'KsHEeLyLSJ', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(40, 'Usman Samosir', 'yolanda.yessi@example.com', NULL, '$2y$10$x5lVj7XQECPgtE3ExxrameApMqksr.ZmjJVEOJNicNzvLjwy40F1u', 'oLyQVg4oQYSCa7h6O6', 0, 'F9MJOZzOcO', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(41, 'Hesti Astuti', 'raisa80@example.org', NULL, '$2y$10$oamfTwdUy5f83/6P8sm1uugy5lEwd3kIjgmdIl/oTxFLHrg11FMQa', 'zgpUayOHW3Bui1j9iL', 0, 'pztWu2NACw', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(42, 'Bahuraksa Winarno', 'dina67@example.com', NULL, '$2y$10$SjpA46jRuThHQsxWIRPMtOqZu.ft89V8j4k74mb7ryu9Smr6mufJq', 'EPaYRHvKwggKbTC9oX', 0, 'HQTXYz6hZ6', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(43, 'Genta Suryatmi M.Kom.', 'oliva.widiastuti@example.com', NULL, '$2y$10$.84m1ta2yekfd7P0dTx4fuEqVgkbrycXaBN7LPag3ypPw6iCkmMVK', '7kcFURunqzKAZAk4fr', 0, 'Xl0XBrlYZ3', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(44, 'Puji Padmi Susanti M.M.', 'luwar.puspasari@example.org', NULL, '$2y$10$l.eSTgIzo8ID42f51.rSmekhc5DYLabsg2TO9RtAl6diBJbeYqxKC', 'D7ktTyM3SNBOYzMg0z', 0, '7mbmKg3xH0', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(45, 'Jais Daru Hutasoit', 'bsimanjuntak@example.net', NULL, '$2y$10$ZEfosWt28RdyR5BcCk2Sqe7eOcw5BlZCHZruwgkivsYbck/ZyU61e', '0jbGdkWVjEmHXDZtu5', 0, 'kFtG0L8ffs', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(46, 'Kunthara Sitorus', 'saka.utama@example.org', NULL, '$2y$10$dXUc7Q/WtZOFPmsjXzaEluntbNEM2qwz52085GgHyICctJbOl/YDm', '9eugeZxRbFA0qbnCu8', 0, 'bZD7Vzg54k', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(47, 'Muhammad Manullang', 'fujiati.michelle@example.org', NULL, '$2y$10$qbd0cfIuCxAPTe1kaXhpRu0vvrFMxs.x7XejG6GOyeXVliMXXJfYi', '67ei9oO1OhTaS4cZMA', 0, 'Md5whgTAi5', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(48, 'Luluh Kawaya Gunarto S.Gz', 'ellis.sihombing@example.com', NULL, '$2y$10$KVXxnhatrxnTE0frYlZwouZScbszyf7.YoltaLGYYro/s3xEuMmA2', 'SQ2zxTrBJgkzn8VE50', 0, 'wXs9AuOMlT', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(49, 'Empluk Siregar S.Ked', 'nasyiah.putri@example.com', NULL, '$2y$10$GRSxVWfxlXH5nNqchgM.VuZZKLFXxnIxbJXB.9RQQPXMLuiVDMNkO', 'uujn2cRIoSeSZjciuf', 0, 'npxXUj6zff', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(50, 'Mujur Hendra Dabukke', 'wakiman.waskita@example.org', NULL, '$2y$10$4nAm2UO4qzkPzk7RK2px6u3cc0mhAVy52V45xmCrtfvihFt/w7j7y', 'CbOqTFhLC6neGSNrhC', 0, 'hUn1yO5fWT', '2018-11-09 07:36:18', '2018-11-09 07:36:18'),
(51, 'Shania Maryati S.T.', 'kayla.sudiati@example.net', NULL, '$2y$10$ugKPcEwaZlq5bPaGcR0hFep2VCDEq1BATdvkaUWvluzKyXwy.tKRe', 'Fc3Xhe04TQOdMY1H3x', 0, 'oEbG9S14IG', '2018-11-09 07:36:19', '2018-11-09 07:36:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transactions_transaction_id_foreign` (`transaction_id`),
  ADD KEY `detail_transactions_product_id_foreign` (`product_id`);

--
-- Indexes for table `image_product`
--
ALTER TABLE `image_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_product`
--
ALTER TABLE `image_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transactions`
--
ALTER TABLE `detail_transactions`
  ADD CONSTRAINT `detail_transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `detail_transactions_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `image_product`
--
ALTER TABLE `image_product`
  ADD CONSTRAINT `image_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
