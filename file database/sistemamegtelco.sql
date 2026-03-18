-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2025 at 08:32 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemamegtelco`
--

-- --------------------------------------------------------

--
-- Table structure for table `depositus`
--

CREATE TABLE `depositus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_depositu` date NOT NULL,
  `montante` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipu_depositu_husi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tipu_depositu_ba_id` bigint(20) UNSIGNED DEFAULT NULL,
  `levantamento` tinyint(1) NOT NULL DEFAULT 0,
  `deskrisaun` text DEFAULT NULL,
  `referencia` varchar(255) DEFAULT NULL,
  `bank_charge` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `depositus`
--

INSERT INTO `depositus` (`id`, `data_depositu`, `montante`, `created_at`, `updated_at`, `tipu_depositu_husi_id`, `tipu_depositu_ba_id`, `levantamento`, `deskrisaun`, `referencia`, `bank_charge`) VALUES
(2, '2025-06-17', '40.00', '2025-07-04 19:48:13', '2025-07-04 19:48:13', 5, 3, 0, 'Transfer husi kliente Joseph Francis, servisu internet fulan Junu', NULL, 0),
(3, '2025-06-30', '40.00', '2025-07-04 19:49:24', '2025-08-14 04:54:00', 5, 3, 0, 'Transfer husi Kliente Jose Reali, servisu internet fulan Junu', NULL, 0),
(4, '2025-07-03', '40.00', '2025-07-04 19:50:04', '2025-07-04 19:50:04', 5, 3, 0, 'Transfer husi Kliente Marlin Ribeiro, servisu internet fulan Junu', NULL, 0),
(5, '2025-07-04', '40.00', '2025-07-04 19:50:41', '2025-07-04 19:50:41', 5, 3, 0, 'Transfer husi Kliente Marlin Ribeiro, servisu internet fulan Jullu', NULL, 0),
(6, '2025-06-09', '80.00', '2025-07-06 04:29:05', '2025-07-06 04:29:05', 2, 1, 0, NULL, NULL, 0),
(8, '2025-06-11', '303.00', '2025-07-06 05:13:55', '2025-07-06 05:13:55', 2, 1, 0, NULL, NULL, 0),
(9, '2025-06-12', '150.25', '2025-07-06 05:15:12', '2025-07-06 05:15:12', 1, 2, 1, 'Selu Taxa', NULL, 0),
(10, '2025-06-13', '145.00', '2025-07-06 05:16:44', '2025-07-06 05:16:44', 2, 1, 0, NULL, NULL, 0),
(11, '2025-06-18', '160.00', '2025-07-06 05:20:08', '2025-07-06 05:20:08', 2, 1, 0, NULL, NULL, 0),
(12, '2025-06-26', '565.00', '2025-07-06 05:23:00', '2025-07-06 05:23:00', 2, 1, 0, NULL, NULL, 0),
(13, '2025-06-30', '1000.00', '2025-07-07 23:55:38', '2025-07-07 23:55:38', 1, 2, 1, 'Salario Staff', NULL, 0),
(14, '2025-07-01', '100.00', '2025-07-08 00:08:20', '2025-07-08 00:16:47', 2, 1, 0, NULL, NULL, 0),
(15, '2025-07-02', '185.00', '2025-07-08 00:10:04', '2025-07-08 00:10:04', 2, 1, 0, NULL, NULL, 0),
(16, '2025-07-03', '105.00', '2025-07-08 00:11:56', '2025-07-08 00:11:56', 1, 2, 1, 'Selu internet Gardamor', NULL, 0),
(17, '2025-07-04', '100.00', '2025-07-08 00:20:27', '2025-07-08 00:23:26', 2, 1, 0, NULL, NULL, 0),
(18, '2025-07-08', '95.00', '2025-07-08 00:24:36', '2025-07-08 00:24:36', 2, 1, 0, NULL, NULL, 0),
(19, '2025-07-09', '170.00', '2025-07-14 21:57:33', '2025-07-14 21:57:33', 1, 2, 1, 'Selu taxa fulan Junu', NULL, 0),
(20, '2025-07-09', '40.00', '2025-07-14 22:00:33', '2025-07-14 22:00:33', 2, 1, 0, NULL, NULL, 0),
(21, '2025-07-10', '550.00', '2025-07-14 22:13:22', '2025-07-14 22:13:22', 2, 1, 0, NULL, NULL, 0),
(22, '2025-07-15', '300.00', '2025-07-14 22:18:47', '2025-07-14 22:18:47', 2, 1, 0, NULL, NULL, 0),
(23, '2025-07-22', '100.00', '2025-07-28 02:52:35', '2025-07-28 02:52:35', 2, 1, 0, NULL, NULL, 0),
(24, '2025-07-24', '360.00', '2025-07-28 02:59:01', '2025-07-28 02:59:01', 1, 2, 1, 'Selu Internet ba Gardamor', NULL, 0),
(25, '2025-07-24', '200.00', '2025-07-28 03:03:45', '2025-07-28 03:03:45', 2, 1, 0, NULL, NULL, 0),
(26, '2025-08-07', '150.00', '2025-08-06 18:18:25', '2025-08-06 18:18:25', 2, 1, 0, NULL, NULL, 0),
(27, '2025-06-11', '40.00', '2025-08-14 04:39:33', '2025-08-14 04:39:33', 5, 3, 0, 'Transfer husi Kliente Nyoto Irawan, servisu internet fulan junu', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `despezas`
--

CREATE TABLE `despezas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `tiputransaksaun_id` bigint(20) UNSIGNED NOT NULL,
  `montante` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `despezas`
--

INSERT INTO `despezas` (`id`, `data`, `tiputransaksaun_id`, `montante`, `created_at`, `updated_at`) VALUES
(1, '2025-06-02', 3, '20.00', '2025-07-06 04:31:41', '2025-07-06 04:31:41'),
(2, '2025-06-05', 7, '10.00', '2025-07-06 05:05:53', '2025-07-06 05:05:53'),
(3, '2025-06-07', 7, '15.00', '2025-07-06 05:10:53', '2025-07-06 05:10:53'),
(4, '2025-06-11', 8, '39.50', '2025-07-06 05:13:16', '2025-07-06 05:13:16'),
(5, '2025-06-12', 10, '150.25', '2025-07-06 05:15:32', '2025-07-06 05:15:32'),
(6, '2025-06-13', 7, '15.00', '2025-07-06 05:16:11', '2025-07-06 05:16:11'),
(7, '2025-06-16', 7, '10.00', '2025-07-06 05:17:44', '2025-07-06 05:17:44'),
(8, '2025-06-17', 8, '20.00', '2025-07-06 05:17:58', '2025-07-06 05:17:58'),
(9, '2025-06-18', 7, '10.00', '2025-07-06 05:18:23', '2025-07-06 05:18:23'),
(10, '2025-06-23', 9, '20.00', '2025-07-06 05:21:16', '2025-07-06 05:21:16'),
(11, '2025-06-26', 7, '10.00', '2025-07-06 05:22:29', '2025-07-06 05:22:29'),
(12, '2025-06-30', 1, '1000.00', '2025-07-08 00:04:58', '2025-07-08 00:04:58'),
(13, '2025-07-01', 3, '20.00', '2025-07-08 00:07:22', '2025-07-08 00:07:22'),
(14, '2025-07-02', 9, '20.00', '2025-07-08 00:09:21', '2025-07-08 00:09:21'),
(15, '2025-07-03', 6, '105.00', '2025-07-08 00:12:17', '2025-07-08 00:12:17'),
(16, '2025-07-03', 7, '5.00', '2025-07-08 00:14:11', '2025-07-08 00:14:11'),
(17, '2025-07-07', 7, '10.00', '2025-07-08 00:21:07', '2025-07-08 00:21:07'),
(18, '2025-07-08', 9, '20.00', '2025-07-08 00:23:54', '2025-07-08 00:23:54'),
(19, '2025-07-09', 10, '167.25', '2025-07-14 21:58:42', '2025-07-14 21:58:42'),
(20, '2025-07-10', 7, '10.00', '2025-07-14 22:13:58', '2025-07-14 22:13:58'),
(21, '2025-07-14', 7, '5.00', '2025-07-14 22:15:06', '2025-07-14 22:15:06'),
(22, '2025-07-15', 9, '20.00', '2025-07-14 22:19:07', '2025-07-14 22:19:07'),
(23, '2025-07-17', 7, '10.00', '2025-07-28 02:48:59', '2025-07-28 02:48:59'),
(24, '2025-07-22', 9, '20.00', '2025-07-28 02:51:35', '2025-07-28 02:51:35'),
(25, '2025-07-23', 9, '20.00', '2025-07-28 02:53:05', '2025-07-28 02:53:05'),
(26, '2025-07-24', 6, '912.00', '2025-07-28 03:00:11', '2025-07-28 03:00:11'),
(27, '2025-07-28', 9, '20.00', '2025-07-28 03:05:59', '2025-07-28 03:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nu_ref` varchar(255) NOT NULL,
  `period_month` smallint(6) NOT NULL,
  `period_year` smallint(6) NOT NULL,
  `kliente_pakotes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `data_faktura` date NOT NULL,
  `data_limite_pagamentu` date NOT NULL,
  `naran` varchar(255) NOT NULL,
  `residensia` varchar(255) NOT NULL,
  `nu_telfone` varchar(255) NOT NULL,
  `deskrisaun` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`deskrisaun`)),
  `subtotal` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `maintenance` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `is_printed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `nu_ref`, `period_month`, `period_year`, `kliente_pakotes_id`, `data_faktura`, `data_limite_pagamentu`, `naran`, `residensia`, `nu_telfone`, `deskrisaun`, `subtotal`, `tax`, `maintenance`, `total`, `is_printed`, `created_at`, `updated_at`) VALUES
(31, '0001/I/2022', 6, 2025, 1, '2025-06-09', '2025-06-29', 'Odete Soares S. da Costa', 'Manleuana', '77346053', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 05 June too 04 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 17:53:38', '2025-06-08 17:53:38'),
(32, '0002/V/2021', 6, 2025, 2, '2025-06-09', '2025-06-29', 'Mateus da Costa', 'Manleuana', '77305971', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 05 June too 04 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:22:43', '2025-06-08 20:22:43'),
(33, '0003/V/2021', 6, 2025, 3, '2025-06-09', '2025-06-29', 'Jose Menezes da Costa', 'Manleuana', '77244579', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 05 June too 04 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:23:02', '2025-06-08 20:23:02'),
(34, '0005/V/2021', 6, 2025, 5, '2025-06-09', '2025-06-29', 'Pe. Jose Dwight, SDB', 'Pos Noviciado Dom Bosco, Comoro', '77013565', '[{\"text\":\"Fornesimentu servisu Internet, Bronze A, \\n            fulan June, hosi dia 05 June too 04 July 2025\",\"montante\":\"16.67\"}]', '16.67', '0.83', '10.00', '27.50', 1, '2025-06-08 20:23:19', '2025-06-08 20:23:19'),
(35, '0006/V/2021', 6, 2025, 6, '2025-06-09', '2025-06-29', 'Fundasaun Neo Metin / UNPAZ', 'Osindo I, Manleuana', '78520620', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan June, hosi dia 05 June too 04 July 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-06-08 20:23:48', '2025-06-08 20:23:48'),
(36, '0010/V/2021', 6, 2025, 10, '2025-06-09', '2025-06-29', 'Joao Fernandes Soares', 'Manleuana', '77133734', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 22 June too 21 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:24:07', '2025-06-08 20:24:07'),
(37, '0015/VI/2021', 6, 2025, 15, '2025-06-09', '2025-06-29', 'Lenor de Roxas Castulo', 'Delta 1', '77293210', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 05 June too 04 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:24:25', '2025-06-08 20:24:25'),
(38, '0016/VI/2021', 6, 2025, 16, '2025-06-09', '2025-06-29', 'Marlon Golveo Reyes', 'Kolmera', '76230754', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 05 June too 04 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:26:33', '2025-06-08 20:26:33'),
(39, '0036/IX/2021', 6, 2025, 34, '2025-06-09', '2025-06-29', 'Rudy', 'Aimutin', '77949496', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 02 June too 01 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:26:50', '2025-06-08 20:26:50'),
(40, '0048/I/2022', 6, 2025, 42, '2025-06-09', '2025-06-29', 'Khoirul Umam', 'Beto Barat', '77244753', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 10 June too 09 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:27:09', '2025-06-08 20:27:09'),
(41, '0051/II/2022', 6, 2025, 45, '2025-06-09', '2025-06-29', 'Agatha Indah Kurnia da Costa', 'Fatuhada', '77299799', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 09 June too 08 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:27:26', '2025-06-08 20:27:26'),
(42, '0017/VI/2021', 6, 2025, 17, '2025-06-09', '2025-06-29', 'Edgar Lawrence Uedo', 'Delta 2', '73661300', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 08 June too 07 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:32:56', '2025-06-08 20:32:56'),
(43, '0052/II/2022', 6, 2025, 46, '2025-06-09', '2025-06-29', 'Ir.Adriano de Jejus', 'Dom Bosco Comoro', '77361826', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan June, hosi dia 15 June too 14 July 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-06-08 20:34:52', '2025-06-08 20:34:52'),
(44, '0060/III/2022', 6, 2025, 53, '2025-06-09', '2025-06-29', 'Leonel Hornai da Cruz', 'Delta III, Block K-II, Comoro', '77193315', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 23 June too 22 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:35:10', '2025-06-08 20:35:10'),
(45, '0062/IV/2022', 6, 2025, 55, '2025-06-09', '2025-06-29', 'Feliciano J.G. Aleixo', 'Hudi laran', '77665033', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 26 June too 25 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:35:30', '2025-06-08 20:35:30'),
(46, '0063/V/2022', 6, 2025, 56, '2025-06-09', '2025-06-29', 'Instant Shop', 'Fomento 1', '0', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan June, hosi dia 04 June too 03 July 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-06-08 20:35:57', '2025-06-08 20:35:57'),
(47, '0074/IX/2022', 6, 2025, 66, '2025-06-09', '2025-06-29', 'Rony Wirawan', 'Pantai Kelapa', '77015533', '[{\"text\":\"Fornesimentu servisu Internet, Silver, \\n            fulan June, hosi dia 23 June too 22 July 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-06-08 20:36:18', '2025-06-08 20:36:18'),
(48, '0080/X/2022', 6, 2025, 71, '2025-06-09', '2025-06-29', 'Zezinho Gusmao', 'Bairro Pite, Hudi Laran', '77048888', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan June, hosi dia 28 June too 27 July 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-06-08 20:38:03', '2025-06-08 20:38:03'),
(49, '0083/XII/2022', 6, 2025, 74, '2025-06-09', '2025-06-29', 'Rony Wirawan', 'Delta I', '77015533', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan June, hosi dia 01 June too 30 June 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-06-08 20:38:26', '2025-06-08 20:38:26'),
(50, '0086/I/2023', 6, 2025, 77, '2025-06-09', '2025-06-29', 'Hermawan', 'Aimutin', '78006331', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 10 June too 09 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:38:47', '2025-06-08 20:38:47'),
(51, '0097/II/2023', 6, 2025, 88, '2025-06-09', '2025-06-29', 'Jose Reali', 'Pantai Kelapa', '77226939', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 20 June too 19 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:39:09', '2025-06-08 20:39:09'),
(52, '0104/III/2023', 6, 2025, 95, '2025-06-09', '2025-06-29', 'C.N. Haricharan', 'Green Diamond Residence', '0', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 24 June too 23 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:39:31', '2025-06-08 20:39:31'),
(53, '0107/IV/2023', 6, 2025, 98, '2025-06-09', '2025-06-29', 'MD Kazi Iqbal Hossain', 'kampung Baru, Comoro', '78482506', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan June, hosi dia 04 June too 03 July 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-06-08 20:39:56', '2025-06-08 20:39:56'),
(54, '0109/IV/2023', 6, 2025, 100, '2025-06-09', '2025-06-29', 'Romeu da Conceicao Costa', 'Aimutin', '77997483', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 14 June too 13 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:40:21', '2025-06-08 20:40:21'),
(55, '0113/V/2023', 6, 2025, 104, '2025-06-09', '2025-06-29', 'Jose T. Mousaco', 'Timor Resort', '77066142', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 03 June too 02 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:40:46', '2025-06-08 20:40:46'),
(56, '0123/VI/2023', 6, 2025, 114, '2025-06-09', '2025-06-29', 'Yudiy Kurniawan', 'Beto Barat', '77963572', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 14 June too 13 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:41:18', '2025-06-08 20:41:18'),
(57, '0125/VII/2023', 6, 2025, 116, '2025-06-09', '2025-06-29', 'Joseph Francis - JJJ Associates Timor Lda', 'Orchard Apartment, Bemori', '73729717', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 03 June too 02 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:41:41', '2025-06-08 20:41:41'),
(58, '0127/VII/2023', 6, 2025, 117, '2025-06-09', '2025-06-29', 'Francisco Tilman Cepede', 'Taibessi', '77771130', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 12 June too 11 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:42:10', '2025-06-08 20:42:10'),
(59, '0128/VII/2023', 6, 2025, 118, '2025-06-09', '2025-06-29', 'Detile Consultant', 'Farol', '78608888', '[{\"text\":\"Fornesimentu servisu Internet, Gold, \\n            fulan June, hosi dia 28 June too 27 July 2025\",\"montante\":\"123.81\"}]', '123.81', '6.19', '20.00', '150.00', 1, '2025-06-08 20:42:51', '2025-06-08 20:42:51'),
(60, '0134/IX/2023', 6, 2025, 124, '2025-06-09', '2025-06-29', 'Narabey Totobola - Rony Wirawan', 'Delta II', '77954217', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan June, hosi dia 01 June too 30 June 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-06-08 20:43:13', '2025-06-08 20:43:13'),
(61, '0136/IX/2023', 6, 2025, 126, '2025-06-09', '2025-06-29', 'Nuno Filipe T. Ribeiro', 'Villa Formosa', '77436897', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 06 June too 05 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:43:35', '2025-06-08 20:43:35'),
(62, '0141/X/2023', 6, 2025, 131, '2025-06-09', '2025-06-29', 'Kasma Latif', 'Kampung Baru', '74227161', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 12 June too 11 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:44:36', '2025-06-08 20:44:36'),
(63, '0144/X/2023', 6, 2025, 134, '2025-06-09', '2025-06-29', 'Robin Joy Pereira Araujo', 'Taibessi', '77393551', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan June, hosi dia 25 June too 24 July 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-06-08 20:45:00', '2025-06-08 20:45:00'),
(64, '0146/XI/2023', 6, 2025, 136, '2025-06-09', '2025-06-29', 'Drs. Rachel', 'Manleuana', '73312345', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 06 June too 05 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:45:21', '2025-06-08 20:45:21'),
(65, '0147/XI/2023', 6, 2025, 137, '2025-06-09', '2025-06-29', 'Mariabelle Lagrisola', 'Orchard Apartment', '78248647', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 08 June too 07 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:45:42', '2025-06-08 20:45:42'),
(66, '0149/XII/2023', 6, 2025, 139, '2025-06-09', '2025-06-29', 'Cirilo O.F.D. Xavier', 'Delta 2', '77086831', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 29 June too 28 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:46:07', '2025-06-08 20:46:07'),
(67, '0151/I/2024', 6, 2025, 141, '2025-06-09', '2025-06-29', 'Apolinario Magno', 'Delta 3', '77346834', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 09 June too 08 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:46:30', '2025-06-08 20:46:30'),
(68, '0152/I/2024', 6, 2025, 142, '2025-06-09', '2025-06-29', 'Planet Unipessoal - Marthin Hutajaru', 'Audian', '77006677', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan June, hosi dia 25 June too 24 July 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-06-08 20:46:51', '2025-06-08 20:46:51'),
(69, '0154/III/2024', 6, 2025, 144, '2025-06-09', '2025-06-29', 'Paul Herbert Mas', 'Fomento II', '73147506', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 09 June too 08 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:47:23', '2025-06-08 20:47:23'),
(70, '0155/III/2024', 6, 2025, 145, '2025-06-09', '2025-06-29', 'Pe. Gui do Carmo da Silva', 'Dom Bosco, Comoro', '77239133', '[{\"text\":\"Fornesimentu servisu Internet, Platinum, \\n            fulan June, hosi dia 09 June too 08 July 2025\",\"montante\":\"219.05\"}]', '219.05', '10.95', '25.00', '255.00', 1, '2025-06-08 20:47:52', '2025-06-08 20:47:52'),
(71, '0157/IV/2024', 6, 2025, 147, '2025-06-09', '2025-06-29', 'Jenifer Octavia Tjung Miady', 'Fatuhada', '73854783', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 22 June too 21 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:48:39', '2025-06-08 20:48:39'),
(72, '0158/V/2024', 6, 2025, 148, '2025-06-09', '2025-06-29', 'Zezinha Natalina Filomeno Ferreira Gusmao', 'Villa verde', '77048458', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 02 June too 01 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:48:59', '2025-06-08 20:48:59'),
(73, '0159/V/2024', 6, 2025, 149, '2025-06-09', '2025-06-29', 'Teotonio J. Fraga', 'Fomento III', '73252989', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 07 June too 06 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:49:19', '2025-06-08 20:49:19'),
(74, '0160/V/2024', 6, 2025, 150, '2025-06-09', '2025-06-29', 'Nyoto Irawan', 'Audian, Dili', '77428765', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 28 June too 27 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:49:40', '2025-06-08 20:49:40'),
(75, '0161/VII/2024', 6, 2025, 151, '2025-06-09', '2025-06-29', 'Venancio Pinto', 'Bairro dos Grilhos', '73222137', '[{\"text\":\"Fornesimentu servisu Internet, Silver B, \\n            fulan June, hosi dia 06 June too 05 July 2025\",\"montante\":\"123.81\"}]', '123.81', '6.19', '25.00', '155.00', 1, '2025-06-08 20:50:08', '2025-06-08 20:50:08'),
(76, '0163/VII/2024', 6, 2025, 153, '2025-06-09', '2025-06-29', 'Osorio Babo', 'Paroquia Maria Auxiliadora, Comoro', '77264940', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan June, hosi dia 13 June too 12 July 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-06-08 20:50:31', '2025-06-08 20:50:31'),
(77, '0164/VII/2024', 6, 2025, 154, '2025-06-09', '2025-06-29', 'Joaozito Viana', 'Au-hun, Becora', '77304489', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 18 June too 17 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:51:15', '2025-06-08 20:51:15'),
(78, '0165/VII/2024', 6, 2025, 155, '2025-06-09', '2025-06-29', 'Kiki Chairani', 'Orchard Apartment, Bemori', '74749092', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 23 June too 22 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:51:38', '2025-06-08 20:51:38'),
(79, '0170/IX/2024', 6, 2025, 160, '2025-06-09', '2025-06-29', 'Woo Su Jeong', 'Vila Mataruak (Vila 5)', '77859103', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 02 June too 01 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:52:00', '2025-06-08 20:52:00'),
(80, '0171/IX/2024', 6, 2025, 161, '2025-06-09', '2025-06-29', 'Nabil Ali', 'Timor Resort, House #36', '78316126', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 05 June too 04 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:52:20', '2025-06-08 20:52:20'),
(81, '0172/IX/2024', 6, 2025, 162, '2025-06-09', '2025-06-29', 'Shannon Bruncat', 'Timor Resort, House #55', '78609005', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 05 June too 04 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:52:41', '2025-06-08 20:52:41'),
(82, '0173/IX/2024', 6, 2025, 163, '2025-06-09', '2025-06-29', 'Fakri Karim', 'Timor Resort, House #52', '73672333', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 16 June too 15 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:53:32', '2025-06-08 20:53:32'),
(83, '0176/XI/2024', 6, 2025, 166, '2025-06-09', '2025-06-29', 'Arry Prastyo', 'Hudi Laran', '77445123', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan June, hosi dia 05 June too 04 July 2025\",\"montante\":\"60.95\"}]', '60.95', '3.09', '16.00', '80.00', 1, '2025-06-08 20:54:09', '2025-06-08 20:54:09'),
(84, '0179/XI/2024', 6, 2025, 169, '2025-06-09', '2025-06-29', 'Dwi Prasetio', 'Taibessi', '73312345', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 19 June too 18 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:54:24', '2025-06-08 20:54:24'),
(85, '0180/I/2025', 6, 2025, 170, '2025-06-09', '2025-06-29', 'Hallie Sohyun Jeon', 'Menoa Apartment 7B, Bemori', '+32493923611', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 20 June too 19 July 2025\",\"montante\":\"28.57\"}]', '23.81', '1.43', '10.00', '35.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, '0181/II/2025', 6, 2025, 171, '2025-06-09', '2025-06-29', 'Marcelino Oliveira Neves', 'Bebonuk Tuty 20 de Setembro', '77838882', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 04 June too 03 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:54:54', '2025-06-08 20:54:54'),
(87, '0182/II/2025', 6, 2025, 172, '2025-06-09', '2025-06-29', 'Juliao A.X. Carlos', 'Sao Miguel, Aimutin', '74048280', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 06 June too 05 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:58:42', '2025-06-08 20:58:42'),
(88, '0183/II/2025', 6, 2025, 173, '2025-06-09', '2025-06-29', 'Helder Eduardo Brites', 'Aimutin Centro', '77940099', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 06 June too 05 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:59:05', '2025-06-08 20:59:05'),
(89, '0184/III/2025', 6, 2025, 174, '2025-06-09', '2025-06-29', 'Juvinal de A. de Jejus', 'Delta III', '76616458', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 05 June too 04 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:59:23', '2025-06-08 20:59:23'),
(90, '0185/III/2025', 6, 2025, 175, '2025-06-09', '2025-06-29', 'Antonio Sarmento', 'Pantai kelapa', '76473875', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 07 June too 06 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:59:41', '2025-06-08 20:59:41'),
(91, '0186/III/2025', 6, 2025, 176, '2025-06-09', '2025-06-29', 'Aloisius Tilman', 'Delta I', '74550879', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 10 June too 09 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 20:59:54', '2025-06-08 20:59:54'),
(92, '0188/III/2025', 6, 2025, 178, '2025-06-09', '2025-06-29', 'Reinaldo Ximenes', 'Manleuana', '77281211', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 15 June too 14 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 21:00:09', '2025-06-08 21:00:09'),
(93, '0189/III/2025', 6, 2025, 179, '2025-06-09', '2025-06-29', 'Marlin Ribeiro', 'Kolmera', '77502881', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 19 June too 18 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 21:00:23', '2025-06-08 21:00:23'),
(94, '0190/IV/2025', 6, 2025, 180, '2025-06-09', '2025-06-29', 'Cristiano da Costa', 'Manleuana', '77243453', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 02 June too 01 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 21:00:37', '2025-06-08 21:00:37'),
(95, '0191/V/2025', 6, 2025, 181, '2025-06-09', '2025-06-29', 'Geza D. Espiritu', 'No.8 Avenida Bispo de Madeiros, Dili, Timor-Leste', '78326885', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan June, hosi dia 10 June too 09 July 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-06-08 21:00:50', '2025-06-08 21:00:50'),
(96, '0192/IV/2025', 6, 2025, 184, '2025-06-27', '2025-07-17', 'Partido CNRT', 'Bairro dos Grillos', '73222137', '[{\"text\":\"Fornesimentu servisu Internet, Public IP Address, \\n            fulan June, hosi dia 14 June too 13 July 2025\",\"montante\":\"23.81\"}]', '23.81', '1.19', '0.00', '25.00', 1, '2025-06-26 17:00:02', '2025-06-26 17:00:02'),
(97, '0194/VI/2025', 6, 2025, 185, '2025-06-27', '2025-07-17', 'Francisca Moniz da C. de Jejus', 'Ai-mutin', '78094328', '[{\"text\":\"Fornesimentu servisu Internet, Bronze D, \\n            fulan June, hosi dia 23 June too 22 July 2025\",\"montante\":\"38.095\"}]', '38.10', '1.90', '10.00', '50.00', 1, '2025-06-26 18:01:04', '2025-06-26 18:01:04'),
(98, '0193/V/2025', 7, 2025, 186, '2025-07-02', '2025-07-22', 'Pe. Gui do Carmo da Silva', 'Dom Bosco, Comoro', '77239133', '[{\"text\":\"Fornesimentu servisu Internet, Starlink, \\n            fulan July, hosi dia 14 July too 13 August 2025\",\"montante\":\"157.14\"}]', '157.14', '7.86', '0.00', '165.00', 1, '2025-07-01 22:53:22', '2025-07-01 22:53:22'),
(99, '0195/VII/2025', 7, 2025, 187, '2025-07-04', '2025-07-24', 'Remigio D. Boavida Freitas', 'Ai-tarak laran', '75554742', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 03 July too 02 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:20:52', '2025-07-03 22:20:52'),
(100, '0001/I/2022', 7, 2025, 1, '2025-07-04', '2025-07-24', 'Odete Soares S. da Costa', 'Manleuana', '77346053', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 05 July too 04 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:26:34', '2025-07-03 22:26:34'),
(101, '0002/V/2021', 7, 2025, 2, '2025-07-04', '2025-07-24', 'Mateus da Costa', 'Manleuana', '77305971', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 05 July too 04 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:26:46', '2025-07-03 22:26:46'),
(102, '0003/V/2021', 7, 2025, 3, '2025-07-04', '2025-07-24', 'Jose Menezes da Costa', 'Manleuana', '77244579', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 05 July too 04 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:26:59', '2025-07-03 22:26:59'),
(103, '0005/V/2021', 7, 2025, 5, '2025-07-04', '2025-07-24', 'Pe. Jose Dwight, SDB', 'Pos Noviciado Dom Bosco, Comoro', '77013565', '[{\"text\":\"Fornesimentu servisu Internet, Bronze A, \\n            fulan July, hosi dia 05 July too 04 August 2025\",\"montante\":\"16.67\"}]', '16.67', '0.83', '10.00', '27.50', 1, '2025-07-03 22:27:12', '2025-07-03 22:27:12'),
(104, '0006/V/2021', 7, 2025, 6, '2025-07-04', '2025-07-24', 'Fundasaun Neo Metin / UNPAZ', 'Osindo I, Manleuana', '78520620', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan July, hosi dia 05 July too 04 August 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-07-03 22:35:40', '2025-07-03 22:35:40'),
(105, '0010/V/2021', 7, 2025, 10, '2025-07-04', '2025-07-24', 'Joao Fernandes Soares', 'Manleuana', '77133734', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 22 July too 21 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:35:58', '2025-07-03 22:35:58'),
(106, '0015/VI/2021', 7, 2025, 15, '2025-07-04', '2025-07-24', 'Lenor de Roxas Castulo', 'Delta 1', '77293210', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 05 July too 04 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:36:10', '2025-07-03 22:36:10'),
(107, '0016/VI/2021', 7, 2025, 16, '2025-07-04', '2025-07-24', 'Marlon Golveo Reyes', 'Kolmera', '76230754', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 05 July too 04 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:36:22', '2025-07-03 22:36:22'),
(108, '0017/VI/2021', 7, 2025, 17, '2025-07-04', '2025-07-24', 'Edgar Lawrence Uedo', 'Delta 2', '73661300', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 08 July too 07 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:36:37', '2025-07-03 22:36:37'),
(109, '0036/IX/2021', 7, 2025, 34, '2025-07-04', '2025-07-24', 'Rudy', 'Aimutin', '77949496', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 02 July too 01 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:37:22', '2025-07-03 22:37:22'),
(110, '0048/I/2022', 7, 2025, 42, '2025-07-04', '2025-07-24', 'Khoirul Umam', 'Beto Barat', '77244753', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 10 July too 09 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:37:34', '2025-07-03 22:37:34'),
(111, '0051/II/2022', 7, 2025, 45, '2025-07-04', '2025-07-24', 'Agatha Indah Kurnia da Costa', 'Fatuhada', '77299799', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 09 July too 08 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:37:49', '2025-07-03 22:37:49'),
(112, '0052/II/2022', 7, 2025, 46, '2025-07-04', '2025-07-24', 'Ir.Adriano de Jejus', 'Dom Bosco Comoro', '77361826', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan July, hosi dia 15 July too 14 August 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-07-03 22:38:04', '2025-07-03 22:38:04'),
(113, '0060/III/2022', 7, 2025, 53, '2025-07-04', '2025-07-24', 'Leonel Hornai da Cruz', 'Delta III, Block K-II, Comoro', '77193315', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 23 July too 22 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:38:18', '2025-07-03 22:38:18'),
(114, '0062/IV/2022', 7, 2025, 55, '2025-07-04', '2025-07-24', 'Feliciano J.G. Aleixo', 'Hudi laran', '77665033', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 26 July too 25 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:38:31', '2025-07-03 22:38:31'),
(115, '0063/V/2022', 7, 2025, 56, '2025-07-04', '2025-07-24', 'Instant Shop', 'Fomento 1', '0', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan July, hosi dia 04 July too 03 August 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-07-03 22:38:49', '2025-07-03 22:38:49'),
(116, '0074/IX/2022', 7, 2025, 66, '2025-07-04', '2025-07-24', 'Rony Wirawan', 'Pantai Kelapa', '77015533', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan July, hosi dia 23 July too 22 August 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-07-03 22:39:16', '2025-07-03 22:39:16'),
(117, '0080/X/2022', 7, 2025, 71, '2025-07-04', '2025-07-24', 'Zezinho Gusmao', 'Bairro Pite, Hudi Laran', '77048888', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan July, hosi dia 28 July too 27 August 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-07-03 22:39:37', '2025-07-03 22:39:37'),
(118, '0083/XII/2022', 7, 2025, 74, '2025-07-04', '2025-07-24', 'Rony Wirawan', 'Delta I', '77015533', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan July, hosi dia 01 July too 31 July 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-07-03 22:39:58', '2025-07-03 22:39:58'),
(119, '0086/I/2023', 7, 2025, 77, '2025-07-04', '2025-07-24', 'Hermawan', 'Aimutin', '78006331', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 10 July too 09 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:40:49', '2025-07-03 22:40:49'),
(120, '0097/II/2023', 7, 2025, 88, '2025-07-04', '2025-07-24', 'Jose Reali', 'Pantai Kelapa', '77226939', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 20 July too 19 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:41:06', '2025-07-03 22:41:06'),
(121, '0107/IV/2023', 7, 2025, 98, '2025-07-04', '2025-07-24', 'MD Kazi Iqbal Hossain', 'kampung Baru, Comoro', '78482506', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan July, hosi dia 04 July too 03 August 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-07-03 22:41:31', '2025-07-03 22:41:31'),
(122, '0109/IV/2023', 7, 2025, 100, '2025-07-04', '2025-07-24', 'Romeu da Conceicao Costa', 'Aimutin', '77997483', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 14 July too 13 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:42:01', '2025-07-03 22:42:01'),
(123, '0123/VI/2023', 7, 2025, 114, '2025-07-04', '2025-07-24', 'Yudiy Kurniawan', 'Beto Barat', '77963572', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 14 July too 13 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:42:19', '2025-07-03 22:42:19'),
(124, '0125/VII/2023', 7, 2025, 116, '2025-07-04', '2025-07-24', 'Joseph Francis - JJJ Associates Timor Lda', 'Orchard Apartment, Bemori', '73729717', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 03 July too 02 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:42:40', '2025-07-03 22:42:40'),
(125, '0127/VII/2023', 7, 2025, 117, '2025-07-04', '2025-07-24', 'Francisco Tilman Cepede', 'Taibessi', '77771130', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 12 July too 11 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:42:55', '2025-07-03 22:42:55'),
(126, '0128/VII/2023', 7, 2025, 118, '2025-07-04', '2025-07-24', 'Detile Consultant', 'Farol', '78608888', '[{\"text\":\"Fornesimentu servisu Internet, Gold, \\n            fulan July, hosi dia 28 July too 27 August 2025\",\"montante\":\"123.81\"}]', '123.81', '6.19', '20.00', '150.00', 1, '2025-07-03 22:43:07', '2025-07-03 22:43:07'),
(127, '0134/IX/2023', 7, 2025, 124, '2025-07-04', '2025-07-24', 'Narabey Totobola - Rony Wirawan', 'Delta II', '77954217', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan July, hosi dia 01 July too 31 July 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-07-03 22:43:20', '2025-07-03 22:43:20'),
(128, '0136/IX/2023', 7, 2025, 126, '2025-07-04', '2025-07-24', 'Nuno Filipe T. Ribeiro', 'Villa Formosa', '77436897', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 06 July too 05 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:43:36', '2025-07-03 22:43:36'),
(129, '0141/X/2023', 7, 2025, 131, '2025-07-04', '2025-07-24', 'Kasma Latif', 'Kampung Baru', '74227161', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 12 July too 11 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:43:48', '2025-07-03 22:43:48'),
(130, '0144/X/2023', 7, 2025, 134, '2025-07-04', '2025-07-24', 'Robin Joy Pereira Araujo', 'Taibessi', '77393551', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan July, hosi dia 25 July too 24 August 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-07-03 22:44:02', '2025-07-03 22:44:02'),
(131, '0146/XI/2023', 7, 2025, 136, '2025-07-04', '2025-07-24', 'Drs. Rachel', 'Manleuana', '73312345', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 06 July too 05 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:44:19', '2025-07-03 22:44:19'),
(132, '0147/XI/2023', 7, 2025, 137, '2025-07-04', '2025-07-24', 'Mariabelle Lagrisola', 'Orchard Apartment', '78248647', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 08 July too 07 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:44:32', '2025-07-03 22:44:32'),
(133, '0149/XII/2023', 7, 2025, 139, '2025-07-04', '2025-07-24', 'Cirilo O.F.D. Xavier', 'Delta 2', '77086831', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 29 July too 28 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:44:45', '2025-07-03 22:44:45'),
(134, '0151/I/2024', 7, 2025, 141, '2025-07-04', '2025-07-24', 'Apolinario Magno', 'Delta 3', '77346834', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 09 July too 08 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:44:58', '2025-07-03 22:44:58'),
(135, '0152/I/2024', 7, 2025, 142, '2025-07-04', '2025-07-24', 'Planet Unipessoal - Marthin Hutajaru', 'Audian', '77006677', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan July, hosi dia 25 July too 24 August 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-07-03 22:45:10', '2025-07-03 22:45:10'),
(136, '0154/III/2024', 7, 2025, 144, '2025-07-04', '2025-07-24', 'Paul Herbert Mas', 'Fomento II', '73147506', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 09 July too 08 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:45:23', '2025-07-03 22:45:23'),
(137, '0157/IV/2024', 7, 2025, 147, '2025-07-04', '2025-07-24', 'Jenifer Octavia Tjung Miady', 'Fatuhada', '73854783', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 22 July too 21 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:45:40', '2025-07-03 22:45:40'),
(138, '0158/V/2024', 7, 2025, 148, '2025-07-04', '2025-07-24', 'Zezinha Natalina Filomeno Ferreira Gusmao', 'Villa verde', '77048458', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 02 July too 01 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:45:56', '2025-07-03 22:45:56'),
(144, '0159/V/2024', 7, 2025, 149, '2025-07-04', '2025-07-24', 'Teotonio J. Fraga', 'Fomento III', '73252989', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 07 July too 06 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:50:10', '2025-07-03 22:50:10'),
(145, '0160/V/2024', 7, 2025, 150, '2025-07-04', '2025-07-24', 'Nyoto Irawan', 'Audian, Dili', '77428765', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 28 July too 27 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:50:23', '2025-07-03 22:50:23'),
(146, '0161/VII/2024', 7, 2025, 151, '2025-07-04', '2025-07-24', 'Partido CNRT', 'Bairro dos Grilhos', '73222137', '[{\"text\":\"Fornesimentu servisu Internet, Silver B, \\n            fulan July, hosi dia 06 July too 05 August 2025\",\"montante\":\"123.81\"}]', '123.81', '6.19', '25.00', '155.00', 1, '2025-07-03 22:50:37', '2025-07-03 22:50:37'),
(147, '0163/VII/2024', 7, 2025, 153, '2025-07-04', '2025-07-24', 'Osorio Babo', 'Paroquia Maria Auxiliadora, Comoro', '77264940', '[{\"text\":\"Fornesimentu servisu Internet, Silver A, \\n            fulan July, hosi dia 13 July too 12 August 2025\",\"montante\":\"60.95\"}]', '60.95', '3.05', '16.00', '80.00', 1, '2025-07-03 22:50:51', '2025-07-03 22:50:51'),
(148, '0164/VII/2024', 7, 2025, 154, '2025-07-04', '2025-07-24', 'Joaozito Viana', 'Au-hun, Becora', '77304489', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 18 July too 17 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:51:05', '2025-07-03 22:51:05'),
(149, '0165/VII/2024', 7, 2025, 155, '2025-07-04', '2025-07-24', 'Kiki Chairani', 'Orchard Apartment, Bemori', '74749092', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 23 July too 22 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:51:18', '2025-07-03 22:51:18'),
(150, '0170/IX/2024', 7, 2025, 160, '2025-07-04', '2025-07-24', 'Woo Su Jeong', 'Vila Mataruak (Vila 5)', '77859103', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 02 July too 01 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:51:30', '2025-07-03 22:51:30'),
(151, '0172/IX/2024', 7, 2025, 162, '2025-07-04', '2025-07-24', 'Shannon Bruncat', 'Timor Resort, House #55', '78609005', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 05 July too 04 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:51:44', '2025-07-03 22:51:44'),
(152, '0173/IX/2024', 7, 2025, 163, '2025-07-04', '2025-07-24', 'Fakri Karim', 'Timor Resort, House #52', '73672333', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 16 July too 15 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:52:01', '2025-07-03 22:52:01'),
(153, '0176/XI/2024', 7, 2025, 166, '2025-07-04', '2025-07-24', 'Arry Prastyo', 'Hudi Laran', '77445123', '[{\"text\":\"Fornesimentu servisu Internet, Gold, \\n            fulan July, hosi dia 05 July too 04 August 2025\",\"montante\":\"123.81\"}]', '123.81', '6.19', '20.00', '150.00', 1, '2025-07-03 22:52:13', '2025-07-03 22:52:13'),
(154, '0179/XI/2024', 7, 2025, 169, '2025-07-04', '2025-07-24', 'Dwi Prasetio', 'Taibessi', '73312345', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 19 July too 18 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:52:25', '2025-07-03 22:52:25'),
(155, '0185/III/2025', 7, 2025, 175, '2025-07-04', '2025-07-24', 'Antonio Sarmento', 'Pantai kelapa', '76473875', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 07 July too 06 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:52:41', '2025-07-03 22:52:41'),
(156, '0186/III/2025', 7, 2025, 176, '2025-07-04', '2025-07-24', 'Aloisius Tilman', 'Delta I', '74550879', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 10 July too 09 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:52:53', '2025-07-03 22:52:53'),
(157, '0188/III/2025', 7, 2025, 178, '2025-07-04', '2025-07-24', 'Reinaldo Ximenes', 'Manleuana', '77281211', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 15 July too 14 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:53:03', '2025-07-03 22:53:03'),
(158, '0189/III/2025', 7, 2025, 179, '2025-07-04', '2025-07-24', 'Marlin Ribeiro', 'Kolmera', '77502881', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 19 July too 18 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:53:17', '2025-07-03 22:53:17'),
(159, '0190/IV/2025', 7, 2025, 180, '2025-07-04', '2025-07-24', 'Cristiano da Costa', 'Manleuana', '77243453', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 02 July too 01 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:53:31', '2025-07-03 22:53:31'),
(160, '0191/V/2025', 7, 2025, 181, '2025-07-04', '2025-07-24', 'Geza D. Espiritu', 'No.8 Avenida Bispo de Madeiros, Dili, Timor-Leste', '78326885', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 10 July too 09 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:53:50', '2025-07-03 22:53:50'),
(161, '0192/IV/2025', 7, 2025, 184, '2025-07-04', '2025-07-24', 'Partido CNRT', 'Bairro dos Grillos', '73222137', '[{\"text\":\"Fornesimentu servisu Internet, Public IP Address, \\n            fulan July, hosi dia 14 July too 13 August 2025\",\"montante\":\"23.81\"}]', '23.81', '1.19', '0.00', '25.00', 1, '2025-07-03 22:54:09', '2025-07-03 22:54:09'),
(162, '0194/VI/2025', 7, 2025, 185, '2025-07-04', '2025-07-24', 'Francisca Moniz da C. de Jejus', 'Ai-mutin', '78094328', '[{\"text\":\"Fornesimentu servisu Internet, Bronze D, \\n            fulan July, hosi dia 23 July too 22 August 2025\",\"montante\":\"38.10\"}]', '38.10', '1.91', '10.00', '50.01', 1, '2025-07-03 22:54:28', '2025-07-03 22:54:28'),
(163, '0196/VII/2025', 7, 2025, 188, '2025-07-04', '2025-07-24', 'Marcelino Oliveira Neves', 'Bebonuk Tuty 20 de Setembro', '77838882', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 03 July too 02 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:54:48', '2025-07-03 22:54:48'),
(164, '0197/VII/2025', 7, 2025, 189, '2025-07-04', '2025-07-24', 'Helder Eduardo Brites', 'Aimutin Centro', '77940099', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 03 July too 02 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-03 22:55:08', '2025-07-03 22:55:08'),
(165, '0198/VII/2025', 7, 2025, 190, '2025-07-08', '2025-07-28', 'Alvin Sonbay', 'Bemori', '77743463', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 08 July too 07 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-07 21:54:15', '2025-07-07 21:54:15'),
(166, '0199/VII/2025', 7, 2025, 192, '2025-07-14', '2025-08-03', 'Juliao A.X. Carlos', 'Sao Miguel, Aimutin', '74048280', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 10 July too 09 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-14 05:55:49', '2025-07-14 05:55:49'),
(167, '0200/VII/2025', 7, 2025, 193, '2025-07-18', '2025-08-07', 'Augusty Ferdinand', 'Apartment Manleuana', '+6281290923455', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 15 July too 14 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-17 18:10:30', '2025-07-17 18:10:30'),
(168, '0201/VII/2025', 7, 2025, 194, '2025-07-22', '2025-08-11', 'Jakob Oberg', 'Bemori Menoa Apart 7B', '+46734072135', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 14 July too 13 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-21 20:12:10', '2025-07-21 20:12:10'),
(169, '0202/VII/2025', 7, 2025, 195, '2025-07-28', '2025-08-17', 'Oji Syahroji', 'Fomento I', '75346640', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 22 July too 21 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-28 02:45:14', '2025-07-28 02:45:14'),
(170, '0203/VII/2025', 7, 2025, 196, '2025-07-28', '2025-08-17', 'Joaozito Viana (Reprezentante Partidu CNRT)', 'Farol', '77666647', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 23 July too 22 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-28 02:45:31', '2025-07-28 02:45:31'),
(171, '0204/VII/2025', 7, 2025, 197, '2025-07-28', '2025-08-17', 'Jessiebhel Alolor', 'Aimutin', '74774949', '[{\"text\":\"Fornesimentu servisu Internet, Bronze C, \\n            fulan July, hosi dia 28 July too 27 August 2025\",\"montante\":\"28.57\"}]', '28.57', '1.43', '10.00', '40.00', 1, '2025-07-28 02:45:47', '2025-07-28 02:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_installs`
--

CREATE TABLE `invoice_installs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nu_ref` varchar(255) NOT NULL,
  `data_faktura` date NOT NULL,
  `data_limite_pagamentu` date NOT NULL,
  `naran` varchar(255) NOT NULL,
  `residensia` varchar(255) NOT NULL,
  `nu_telfone` varchar(255) NOT NULL,
  `deskrisaun` varchar(255) NOT NULL,
  `kliente_pakotes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `maintenance` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `is_printed` tinyint(1) NOT NULL DEFAULT 0,
  `period_month` int(11) DEFAULT NULL,
  `period_year` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_installs`
--

INSERT INTO `invoice_installs` (`id`, `nu_ref`, `data_faktura`, `data_limite_pagamentu`, `naran`, `residensia`, `nu_telfone`, `deskrisaun`, `kliente_pakotes_id`, `subtotal`, `tax`, `maintenance`, `total`, `is_printed`, `period_month`, `period_year`, `created_at`, `updated_at`) VALUES
(16, '0194/VI/2025', '2025-06-27', '2025-07-17', 'Francisca Moniz da C. de Jejus', 'Ai-mutin', '78094328', '[]', 185, '75.00', '0.00', '0.00', '75.00', 1, 6, 2025, '2025-06-26 18:01:30', '2025-06-26 18:01:30'),
(17, '0195/VII/2025', '2025-07-04', '2025-07-24', 'Remigio D. Boavida Freitas', 'Ai-tarak laran', '75554742', '[]', 187, '75.00', '0.00', '0.00', '75.00', 1, 7, 2025, '2025-07-03 22:21:03', '2025-07-03 22:21:03'),
(18, '0198/VII/2025', '2025-07-08', '2025-07-28', 'Alvin Sonbay', 'Bemori', '77743463', '[]', 190, '75.00', '0.00', '0.00', '75.00', 1, 7, 2025, '2025-07-07 21:54:44', '2025-07-07 21:54:44'),
(19, '0200/VII/2025', '2025-07-18', '2025-08-07', 'Augusty Ferdinand', 'Apartment Manleuana', '+6281290923455', '[]', 193, '75.00', '0.00', '0.00', '75.00', 1, 7, 2025, '2025-07-17 18:11:18', '2025-07-17 18:11:18'),
(20, '0202/VII/2025', '2025-07-28', '2025-08-17', 'Oji Syahroji', 'Fomento I', '75346640', '[]', 195, '75.00', '0.00', '0.00', '75.00', 1, 7, 2025, '2025-07-28 02:44:07', '2025-07-28 02:44:07'),
(21, '0203/VII/2025', '2025-07-28', '2025-08-17', 'Joaozito Viana (Reprezentante Partidu CNRT)', 'Farol', '77666647', '[]', 196, '75.00', '0.00', '0.00', '75.00', 1, 7, 2025, '2025-07-28 02:44:28', '2025-07-28 02:44:28'),
(22, '0204/VII/2025', '2025-07-28', '2025-08-17', 'Jessiebhel Alolor', 'Aimutin', '74774949', '[]', 197, '75.00', '0.00', '0.00', '75.00', 1, 7, 2025, '2025-07-28 02:44:51', '2025-07-28 02:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `klientes`
--

CREATE TABLE `klientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nu_ref` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `naran` varchar(255) NOT NULL,
  `idcard_passport` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `residensia` varchar(255) NOT NULL,
  `nu_telfone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profisaun` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kategoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `klientes`
--

INSERT INTO `klientes` (`id`, `nu_ref`, `data`, `naran`, `idcard_passport`, `nationality`, `residensia`, `nu_telfone`, `email`, `profisaun`, `created_at`, `updated_at`, `kategoria`) VALUES
(1, '0001/I/2021', '2021-05-05', 'Odete Soares S. da Costa', '0', 'Timorense', 'Manleuana', '77346053', NULL, 'Residensial', NULL, NULL, 'privadu'),
(2, '0002/V/2021', '2021-05-05', 'Mateus da Costa', '06030120118100960', 'Timorense', 'Manleuana', '77305971', NULL, 'Residensial', NULL, NULL, 'privadu'),
(3, '0003/V/2021', '2021-05-05', 'Jose Menezes da Costa', '000560683', 'Timorense', 'Manleuana', '77244579', NULL, 'Residensial', NULL, NULL, 'privadu'),
(4, '0004/V/2021', '2021-06-01', 'Pe.Manuel Pinto, SDB', '0', 'Timorense', 'Dom Bosco, Comoro', '77353892', NULL, 'Instituto Filosofia Dom Bosco', NULL, NULL, 'privadu'),
(5, '0005/V/2021', '2021-05-05', 'Pe. Jose Dwight, SDB', '0', 'Estrangeiro', 'Pos Noviciado Dom Bosco, Comoro', '77013565', NULL, 'Residensial', NULL, NULL, 'privadu'),
(6, '0006/V/2021', '2021-05-05', 'Fundasaun Neo Metin / UNPAZ', '0', 'Timorense', 'Osindo I, Manleuana', '78520620', NULL, 'Fundasaun Neo Metin (UNPAZ)', NULL, NULL, 'privadu'),
(7, '0007/V/2021', '2021-05-05', 'Francisco Abel Amaral', '000591077', 'Timorense', 'Fatuhada', '77365577', NULL, 'Residensial', NULL, NULL, 'privadu'),
(8, '0008/V/2021', '2021-05-21', 'Ivo Jorge Valente', '06030217106994896', 'Timorense', 'Delta 1', '77045019', 'valentexy@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(9, '0009/V/2021', '2021-05-21', 'Joseph Francis', '15FV10196', 'Estrangeiro', 'Manleuana', '73729717', 'jg.francis@yahoo.com', 'Residensial', NULL, NULL, 'privadu'),
(10, '0010/V/2021', '2021-05-22', 'Joao Fernandes Soares', '06030120068592676', 'Timorense', 'Manleuana', '77133734', NULL, 'Residensial', NULL, NULL, 'privadu'),
(11, '0011/V/2021', '2021-05-24', 'Ginalyn Dalia Espiritu', 'P4990124A', 'Estrangeiro', 'Orchard Apartment Room #26', '77395841', 'gespiritu@peacecorps.gov', 'Residensial', NULL, NULL, 'privadu'),
(12, '0012/V/2021', '2021-05-24', 'Pedro M. F. B. Ximenes', '0', 'Timorense', 'Malinamok', '77359449', 'ximenesbarreto@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(13, '0013/V/2021', '2021-11-30', 'Aznitrade Unipessoal Lda', '0', 'Timorense', 'Aldeia 4 de Setembro, Comoro', '0', NULL, 'Aznitrade Unipessoal Lda', NULL, NULL, 'privadu'),
(14, '0014/VI/2021', '2021-06-02', 'Alcino Passos', '000716398', 'Timorense', 'Villa verde', '75657185', NULL, 'Safety Management Consultant (SMC) Lda', NULL, NULL, 'privadu'),
(15, '0015/VI/2021', '2021-06-05', 'Lenor de Roxas Castulo', 'P3737203A', 'Estrangeiro', 'Delta 1', '77293210', 'lenordrcastulo@yahoo.com', 'Residensial', NULL, NULL, 'privadu'),
(16, '0016/VI/2021', '2021-06-05', 'Marlon Golveo Reyes', 'P643271B', 'Estrangeiro', 'Kolmera', '76230754', 'mlag.reyes@yahoo.com', 'Residensial', NULL, NULL, 'privadu'),
(17, '0017/VI/2021', '2021-06-08', 'Edgar Lawrence Uedo', 'P5337450B', 'Estrangeiro', 'Delta 2', '73661300', NULL, 'Residensial', NULL, NULL, 'privadu'),
(18, '0018/VI/2021', '2021-06-09', 'Jeorgina Ximenes dos Santos', '2021007', 'Timorense', 'Fomento III', '3310400', 'mgielminingitat57@gmail.com', 'Mgiel EIPE Unip Lda', NULL, NULL, 'privadu'),
(19, '0019/VI/2021', '2021-06-14', 'Florentino Soares Ferreira', '0', 'Timorense', 'Bairro Pite', '74231777', 'florentinoferreira@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(20, '0020/VI/2021', '2021-06-19', 'Pedro M. F. B. Ximenes', '0', 'Timorense', 'Fomento', '77389449', 'ximenesbarreto@gmail.com', 'Institute of Business (IOB)', NULL, NULL, 'privadu'),
(21, '0021/VI/2021', '2021-06-28', 'Vana Ramila de F. F. Lobato', '000957792', 'Timorense', 'Fomento 2', '78587777', 'chirma.lobato@gmail.com', 'Mira Mar Bloco', NULL, NULL, 'privadu'),
(22, '0023/VII/2021', '2021-07-05', 'Hong Jeaseouk', 'M27488613', 'Estrangeiro', 'Fomento 1', '73252525', 'hongjeaseouk@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(23, '0022/VI/2021', '2021-06-29', 'Pedro M. F. B. Ximenes', '0', 'Timorense', 'Praia dos Coqueiros', '77389449', 'ximenesbarreto@gmail.com', 'Institute of Business (IOB)', NULL, NULL, 'privadu'),
(24, '0024/VII/2021', '2021-07-06', 'Isabel Maria B. F. Ximenes', '06030311118001111', 'Timorense', 'Aldeia 30 de Agosto, Comoro', '78048348', 'ximeneslitaisabel80@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(25, '0025/VII/2021', '2021-07-17', 'Litizia Tam M. Ballo', '0', 'Timorense', 'Delta 1', '74516067', 'litiziatam@gmailc.om', 'Residensial', NULL, NULL, 'privadu'),
(26, '0026/VII/2021', '2021-07-21', 'Domingos Lopes Antunes', '0579042', 'Timorense', 'Terra Santa', '77357163', 'domingos.timorleste@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(27, '0028/VIII/20212', '2021-08-05', 'Lin Shenghua', 'EA5017602', 'Estrangeiro', 'Hudi Laran', '77111777', NULL, 'Weilai Trading', NULL, NULL, 'privadu'),
(28, '0029/VIII/2021', '2021-08-25', 'Edmundo F. Lopes', '0', 'Timorense', 'Manleuana', '77618880', NULL, 'Residensial', NULL, NULL, 'privadu'),
(29, '0030/VIII/2021', '2021-08-24', 'Jose Rocha', '0', 'Estrangeiro', 'Hotel Arbiru,', '77263642', NULL, 'Hotel Arbiru', NULL, NULL, 'privadu'),
(30, '0031/VIII/2021', '2021-08-26', 'Kang Chi Il', '0', 'Estrangeiro', 'Markoni', '78476019', 'tunatimor1@gmail.com', 'Naris', NULL, NULL, 'privadu'),
(31, '0032/VIII/2021', '2021-08-26', 'Luis Betancur', 'PE03760393', 'Estrangeiro', 'Hotel Palm Beach', '77143678', 'luis.betancur1004@gmail.com', 'Alinea Whitelum', NULL, NULL, 'privadu'),
(32, '0033/VIII/2021', '2021-08-26', 'Huang Rongrui', '0', 'Estrangeiro', 'Bairro Pite', '78140278', NULL, 'Residensial', NULL, NULL, 'privadu'),
(33, '0034/IX/2021', '2021-09-02', 'Zelinda Fernandes', '0', 'Timorense', 'Cacaulidun', '77818404', 'zeefernandes@gmailcom', 'Residensial', NULL, NULL, 'privadu'),
(34, '0035/IX/2021', '2021-09-02', 'Rudy', '0', 'Estrangeiro', 'Aimutin', '77949496', 'rudyyanti1301@gmail.com', 'Loja Li Shi', NULL, NULL, 'privadu'),
(35, '0036/IX/2021', '2021-09-02', 'Rudy', '0', 'Estrangeiro', 'Aimutin', '77949496', 'rudyyanti1301@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(36, '0038/IX/2021', '2021-09-02', 'Gualdino do Carmo', '0', 'Timorense', 'Osindo 1', '0', NULL, 'Residensial', NULL, NULL, 'privadu'),
(37, '0040/IX/2021', '2021-09-09', 'Mercy C. Yang', 'PH7612980A', 'Estrangeiro', 'Fomento 2', '78241464', 'mcllongdley@hotmail.com', 'Residensial', NULL, NULL, 'privadu'),
(38, '0041/IX/2021', '2021-09-14', 'Joao Miguel da Silva Soares', '001061765', 'Timorense', 'Mandarin', '77048254', 'jacintaaraujo@yahoo.com', 'Loja Vem Salud', NULL, NULL, 'privadu'),
(39, '0042/IX/2021', '2021-09-14', 'Efigenia de Jesus da Silva', '07304149', 'Timorense', 'Villa verde', '77611000', 'efigeniadejejus_dasilva@yahoo.com', 'Island Dream Money Lda', NULL, NULL, 'privadu'),
(40, '0043/IX/2021', '2021-09-09', 'Mary Jane Albina Ramos', 'P5409182A', 'Estrangeiro', '30 de Agostu, Kampung baru, Comoro', '77336648', 'jane_albina@yahoo.com', 'Residence Connection', NULL, NULL, 'privadu'),
(41, '0044/X/2021', '2021-10-08', 'Rudy', '0', 'Estrangeiro', 'Aimutin', '77949496', 'rudyyanti1301@gmail.com', 'Hotel Virnie', NULL, NULL, 'privadu'),
(42, '0045/X/2021', '2021-10-22', 'Muhamad Qadri', 'B6545548', 'Estrangeiro', 'Comoro', '77451177', 'pedrojepara@gmail.com', 'Pedro Jepara Unip lda', NULL, NULL, 'privadu'),
(43, '0046/X/2021', '2021-10-29', 'James D. Porto', '0', 'Estrangeiro', 'Delta 1', '77479940', NULL, 'Residensial', NULL, NULL, 'privadu'),
(44, '0047/XI/2021', '2021-11-04', 'Joaquim Martins', '0', 'Timorense', 'Rua Fomento', '77138966', NULL, 'Kinos Unipessoal Lda', NULL, NULL, 'privadu'),
(45, '0048/I/2022', '2022-01-10', 'Khoirul Umam', 'C535377', 'Estrangeiro', 'Beto Barat', '77244753', 'umam99079@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(46, '0049/I/2022', '2022-02-21', 'Vicente Soares Faria', '000566403', 'Timorense', 'Manleuana', '77812575', 'vicentefaria@ua.pt', 'Residensial', NULL, NULL, 'privadu'),
(47, '0050/II/2022', '2022-02-04', 'Hanafi Kamyon', 'A52159013', 'Estrangeiro', 'House 50, Timor Resort', '73077772', 'hanafikamyon@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(48, '0051/II/2022', '2022-02-09', 'Agatha Indah Kurnia da Costa', 'C4663206', 'Timorense', 'Fatuhada', '77299799', NULL, 'Koperativa', NULL, NULL, 'privadu'),
(49, '0052/II/2022', '2022-02-15', 'Ir.Adriano de Jejus', '000579738', 'Timorense', 'Dom Bosco Comoro', '77361826', NULL, 'Centro Formacao Profesional Don Bosco', NULL, NULL, 'privadu'),
(50, '0053/II/2022', '2022-02-15', 'Ir.Adriano de Jejus', '000579738', 'Timorense', 'Dom Bosco', '77361826', NULL, 'Timor Roofing Office Dili', NULL, NULL, 'privadu'),
(51, '0054/II/2022', '2022-02-22', 'Tome Yap', 'CE0529837', 'Estrangeiro', 'Rua Belarmino Lobo Bidau Acadiruhun', '77240399', NULL, 'Residensial', NULL, NULL, 'privadu'),
(52, '0055/II/2022', '2022-02-24', 'Rev.vMgr.vMarco Sprizzi', '0', 'Estrangeiro', 'Rua Motael, Dili', '0', NULL, 'Embaixada da Santa SE', NULL, NULL, 'privadu'),
(53, '0056/III/2022', '2022-03-04', 'Casimiro Moniz de Jejus', '000734794', 'Timorense', 'Delta 1', '77777009', 'casimiromoniz77@gmail.com', 'Loja Mojeca Sprei', NULL, NULL, 'privadu'),
(54, '0057/III/2022', '2022-03-09', 'Reinato Aparicio Soares', '005011469', 'Timorense', 'Aimutin', '76127409', NULL, 'Mgiel EIPE Unip Lda', NULL, NULL, 'privadu'),
(55, '0058/III/2022', '2022-03-18', 'Joaquim Martins', '0', 'Timorense', 'Comoro', '77138966', NULL, 'Residensial', NULL, NULL, 'privadu'),
(56, '0059/III/2022', '2022-03-23', 'James A. Smith', '551941853', 'Estrangeiro', 'Delta 3', '78371948', 'jascay@gmail.com', 'Privadu', NULL, NULL, 'privadu'),
(57, '0060/III/2022', '2022-03-23', 'Leonel Hornai da Cruz', '0', 'Timorense', 'Delta III, Block K-II, Comoro', '77193315', 'leonel.cruz@binus.ac.id', 'Residensial', NULL, NULL, 'privadu'),
(58, '0061/IV/2022', '2022-04-22', 'Monica G. Guterres', '00559843', 'Timorense', 'Bangkoko Luxury Hotel, Hudi Laran', '77276043', 'niniguterres@cdos.tl', 'CC Business Solutions MG Lda', NULL, NULL, 'privadu'),
(59, '0062/IV/2022', '2022-04-26', 'Feliciano J.G. Aleixo', '000567875', 'Timorense', 'Hudi laran', '77665033', 'info_feliciano@yahoo.com', 'Residensial', NULL, NULL, 'privadu'),
(60, '0063/V/2022', '2022-05-04', 'Instant Shop', '0', 'Timorense', 'Fomento 1', '0', NULL, 'Instant Shop', NULL, NULL, 'privadu'),
(61, '0064/VI/2022', '2022-06-10', 'Tan Yoppy Hendrata', 'X-948235', 'Estrangeiro', 'Fomento 1', '77259100', 'yoppyh888@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(62, '0065/VI/2022', '2022-06-15', 'Jeong Hoon Kim', 'M09899408', 'Estrangeiro', 'Fomento 2, Comoro, Dom Aleixo', '77885441', 'moonsehyuk@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(63, '0066/VI/2022', '2022-06-22', 'Fu Ho Jong', '0', 'Estrangeiro', 'Akadiruhun', '0', NULL, 'Residensial', NULL, NULL, 'privadu'),
(64, '0067/VI/2022', '2022-06-23', 'Kim Young Sil', 'M68258293', 'Estrangeiro', 'Fomento 1, Comoro, Dom Aleixo, Dili', '78423969', NULL, 'Residensial', NULL, NULL, 'privadu'),
(65, '0068/VII/2022', '2022-07-01', 'Daya Marketing', '06050109107792785', 'Timorense', 'Akadiruhun No.161', '73202510', 'office@dayamarketing.com', 'Loja Daya Marketing', NULL, NULL, 'privadu'),
(66, '0069/VIII/2022', '2022-08-04', 'Marian Angel Tecson', 'P5944320A', 'Estrangeiro', 'Bidau Lecidere, Dili, Timor-Leste', '73553206', 'lecidere@dilimarttimor.com', 'Loja Dili mart', NULL, NULL, 'privadu'),
(67, '0070/VIII/2022', '2022-08-18', 'MD Kazi Iqbal Hossain Razo', 'BT0237098', 'Estrangeiro', 'Kampung Baru', '78482506', 'razo_cse@yahoo.com', 'Residensial', NULL, NULL, 'privadu'),
(68, '0071/IX/2022', '2022-09-01', 'ANL Timor Unipessoal Lda', '0', 'Timorense', 'Timor Resource', '77345337', NULL, 'ANL Timor Unipessoal Lda', NULL, NULL, 'privadu'),
(69, '0072/IX/2022', '2022-09-14', 'ANL', '0', 'Timorense', 'Moris foun', '77345337', NULL, 'ANL TL Institution', NULL, NULL, 'privadu'),
(70, '0074/IX/2022', '2022-09-23', 'Rony Wirawan', '1161714', 'Estrangeiro', 'Pantai Kelapa', '77015533', 'ronywirawan@gmail.com', 'Kantor', NULL, NULL, 'privadu'),
(71, '0075/IX/2022', '2022-09-24', 'Mariana Barreto Amaral', '06030215037895070', 'Timorense', 'Rua Travessa hare kulit, fomento leten, Fomento 1, Comoro', '77234851', 'merianabarreto@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(72, '0076/IX/2022', '2022-09-29', 'Abel da Costa Freitas Ximenes', '000451773', 'Timorense', 'Aldeia Zero Tres Lorumata Fatuhada', '77045025', NULL, 'Fikli Unipessoal lda', NULL, NULL, 'privadu'),
(73, '0077/IX/2022', '2022-09-29', 'Abel da Costa Freitas Ximenes', '000451773', 'Timorense', 'Beto Barat', '77045025', NULL, 'Residensial', NULL, NULL, 'privadu'),
(74, '0078/X/2022', '2022-10-12', 'Abel da Costa Freitas Ximenes', '000451773', 'Timorense', 'Bairro pite', '77045025', NULL, 'Residensial', NULL, NULL, 'privadu'),
(75, '0079/X/2022', '2022-10-19', 'Ade Irawan', '0', 'Estrangeiro', 'Fatuhada', '77258924', NULL, 'Residensial', NULL, NULL, 'privadu'),
(76, '0080/X/2022', '2022-10-28', 'Zezinho Gusmao', '0', 'Timorense', 'Bairro Pite, Hudi Laran', '77048888', NULL, 'Residensial', NULL, NULL, 'privadu'),
(77, '0081/XI/2022', '2022-11-10', 'Oscar Casamian Marco', '0', 'Estrangeiro', 'Pantai kelapa', '77048888', NULL, 'Residensial', NULL, NULL, 'privadu'),
(78, '0082/XI/2022', '2022-11-11', 'Agapito de Rosario', '000747084', 'Timorense', 'Delta III', '77719557', NULL, 'Residensial', NULL, NULL, 'privadu'),
(79, '0083/XII/2022', '2022-12-01', 'Rony Wirawan', '0', 'Estrangeiro', 'Delta I', '77015533', NULL, 'Residensial', NULL, NULL, 'privadu'),
(80, '0084/XII/2022', '2022-12-15', 'Moon Sehyuk', 'M467101112', 'Estrangeiro', 'Fatuhada', '77556633', 'moonsehyuk@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(81, '0085/I/2023', '2023-04-10', 'MD Belayet Hossain', 'EH0124605', 'Estrangeiro', 'Mandarin, Dili', '77355629', NULL, 'Queen Tanduru Restaurant', NULL, NULL, 'privadu'),
(82, '0086/I/2023', '2023-01-10', 'Hermawan', 'C7431016', 'Estrangeiro', 'Aimutin', '78006331', 'kwanhermawan@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(83, '0087/I/2023', '2023-01-19', 'Narpov Ateita Unip, Lda', '1294240', 'Timorense', 'Fatuhada Rua Zero II, Lantai 3, Odamatan B3', '77142443', NULL, 'Residensial', NULL, NULL, 'privadu'),
(84, '0088/I/2023', '2023-01-23', 'Massum Hossain', '0', 'Estrangeiro', 'Aimutin', '77270865', 'globalaircon07.dili@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(85, '0089/I/2023', '2023-01-23', 'Amdadul Hague', '0', 'Estrangeiro', 'Aimutin', '76202020', 'globalelectronics.tl@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(86, '0090/I/2023', '2023-01-25', 'Manuel Soares dos R. Pacheco', '0608234', 'Timorense', 'Fatuhada', '77882868', 'manuelsoares1983@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(87, '0091/I/2023', '2023-01-26', 'Agapito Fernandes', '0', 'Timorense', 'Fatuhada, Dom Aleixo, Dili', '0', NULL, 'Linier Unip Lda', NULL, NULL, 'privadu'),
(88, '0092/II/2023', '2023-02-06', 'Cosme Correia Freitas', '0', 'Timorense', 'Villa verde', '0', NULL, 'Cafe', NULL, NULL, 'privadu'),
(89, '0093/II/2023', '2023-02-14', 'Valdemir Pereira', 'YC349385', 'Estrangeiro', 'Timor Resort', '74558166', NULL, 'Residensial', NULL, NULL, 'privadu'),
(90, '0094/II/2023', '2023-02-15', 'Guilherme Alves Cardoso Penha', '0', 'Estrangeiro', 'Beco Uma Boot, Uma SS, Bebonuk', '77654904', NULL, 'Residensial', NULL, NULL, 'privadu'),
(91, '0095/II/2023', '2023-02-16', 'Paula Juliana A.', '0', 'Timorense', 'Timor Resort', '76963165', NULL, 'Residensial', NULL, NULL, 'privadu'),
(92, '0096/II/2023', '2023-02-19', 'Massum Hossain II', '0', 'Estrangeiro', 'Aimutin', '77270865', NULL, 'Residensial', NULL, NULL, 'privadu'),
(93, '0097/II/2023', '2023-02-20', 'Jose Reali', 'YA5254390', 'Estrangeiro', 'Pantai Kelapa', '77226939', NULL, 'Residensial', NULL, NULL, 'privadu'),
(94, '0098/II/2023', '2023-02-21', 'Amdadul Hague II', 'A03796202', 'Estrangeiro', 'Kolmera', '76202020', NULL, 'Global Electronic', NULL, NULL, 'privadu'),
(95, '0099/II/2023', '2023-02-25', 'Rattet Kazi', 'BQ0252530', 'Estrangeiro', 'Kolmera', '78260361', NULL, 'Residensial', NULL, NULL, 'privadu'),
(96, '0100/III/2023', '2023-03-20', 'Tobishima Corporation', '0', 'Timorense', 'Orchard Apartment', '77737264', NULL, 'Residensial', NULL, NULL, 'privadu'),
(97, '0101/III/2023', '2023-03-03', 'Pe. Inocencio Diomantino da Silva, SDB', '0', 'Timorense', 'Dom Bosco, Comoro', '77737264', NULL, 'Provincial House', NULL, NULL, 'privadu'),
(98, '0102/III/2023', '2023-03-06', 'Theodorus Caet', '0', 'Estrangeiro', 'Hotel Sakura, Audian', '77379099', NULL, 'Hotel sakura', NULL, NULL, 'privadu'),
(99, '0103/III/2023', '2023-03-18', 'MD Faysal Miah', '0', 'Estrangeiro', 'Kolmera', '77146120', NULL, 'Residensial', NULL, NULL, 'privadu'),
(100, '0104/III/2023', '2023-03-24', 'C.N. Haricharan', '0', 'Estrangeiro', 'Green Diamond Residence', '0', NULL, 'Residensial', NULL, NULL, 'privadu'),
(101, '0105/IV/2023', '2023-04-01', 'Sesmaro Timor, Lda', '0', 'Timorense', 'Moris Foun, Comoro', '77463333', 'marcelinoneves269@gmail.com', 'Faan Ticket', NULL, NULL, 'privadu'),
(102, '0106/IV/2023', '2023-04-10', 'Abu Kawsar', '0', 'Estrangeiro', 'Comoro', '78339966', NULL, 'Residensial', NULL, NULL, 'privadu'),
(103, '0107/IV/2023', '2023-04-04', 'MD Kazi Iqbal Hossain', 'EA0116684', 'Estrangeiro', 'kampung Baru, Comoro', '78482506', NULL, 'Residensial', NULL, NULL, 'privadu'),
(104, '0108/IV/2023', '2023-04-11', 'Alin Lim', '0', 'Estrangeiro', 'Kampu Alor', '77231056', NULL, 'Residensial', NULL, NULL, 'privadu'),
(105, '0109/IV/2023', '2023-04-14', 'Romeu da Conceicao Costa', '06030212037964980', 'Timorense', 'Aimutin', '77997483', 'romeu.costa@itamarty.gov.br', 'Residensial', NULL, NULL, 'privadu'),
(106, '0110/IV/2023', '2023-04-18', 'Clement Low', 'C2821698', 'Estrangeiro', 'Pacha Apartment Bidau', '77894472', 'clementlow2005@gamil.com', 'Residensial', NULL, NULL, 'privadu'),
(107, '0111/IV/2023', '2023-04-26', 'Terlinda da Conceicao Barros', '00040806', 'Timorense', 'Bidau, Toko baru', '77735151', 'drlindabarros@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(108, '0112/IV/2023', '2023-04-29', 'Su Jeong Woo', 'G153X7230', 'Estrangeiro', 'Timor Resort', '77859103', 'woosj142@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(109, '0113/V/2023', '2023-05-03', 'Jose T. Mousaco', '0', 'Estrangeiro', 'Timor Resort', '77066142', 'mousaco25@yahoo.com', 'Residensial', NULL, NULL, 'privadu'),
(110, '0114/V/2023', '2023-05-03', 'Sucesso Hamutuk Lda I', '0', 'Timorense', 'Bairro Pite', '77129439', 'dasilvanelson284@gmail.com', 'Sucesso Hamutuk Lda (Totobola)', NULL, NULL, 'privadu'),
(111, '0115/V/2023', '2023-05-02', 'Fernando Cesar Costa e Almeida', 'DC 003070', 'Estrangeiro', 'Timor Resort', '75349413', 'fccdealmeida@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(112, '0116/V/2023', '2023-05-10', 'Taq Ec Lin', 'K32868501', 'Estrangeiro', 'Kolmera', '75980777', 'Mynamelin91@gmail.com', 'Office', NULL, NULL, 'privadu'),
(113, '0117/V/2023', '2023-05-15', 'MD Mosfiqur Rahman', 'EK0665227', 'Estrangeiro', 'Delta III', '76481121', 'mdmosfiqurrahman19@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(114, '0118/V/2023', '2023-05-18', 'Global Air Condition', '0', 'Timorense', 'Kolmera', '77146120', NULL, 'Loja Global Air Con', NULL, NULL, 'privadu'),
(115, '0119/V/2023', '2023-05-31', 'Sucesso Hamutuk Lda II', '0', 'Timorense', 'Kuluhun', '77035252', NULL, 'Sucesso Hamutuk Lda (Totobola)', NULL, NULL, 'privadu'),
(116, '0120/VI/2023', '2023-06-05', 'Hung Ah Hing', 'AG 4126606', 'Estrangeiro', 'Kolmera', '77265225', 'daikyodili@gmail.com', 'Lucky Cake house', NULL, NULL, 'privadu'),
(117, '0121/VI/2023', '2023-05-06', 'Chuah Siaw Ching', 'A53191304', 'Estrangeiro', 'Fomento', '77265225', 'daikyodili@gmail.com', 'Daikyo Industrial gas & Equipment unip lda', NULL, NULL, 'privadu'),
(118, '0122/VI/2023', '2023-06-10', 'Emb. Mauricio Madeiros de Assis', 'CD 1401', 'Estrangeiro', 'Residencia Embaixada Brazil, Praia dos Coqueiros', '77940000', NULL, 'Residensial', NULL, NULL, 'privadu'),
(119, '0123/VI/2023', '2023-06-14', 'Yudiy Kurniawan', 'X1274064', 'Estrangeiro', 'Beto Barat', '77963572', NULL, 'SMC (Sinar Media Corp. Lda)', NULL, NULL, 'privadu'),
(120, '0124/VI/2023', '2023-06-18', 'Ismael Jose dos Reis', '000001275', 'Timorense', 'Bairro dos Grilhos', '77583111', 'anoismael2830@gmail.com', 'Tirodo Grilhos Lda', NULL, NULL, 'privadu'),
(121, '0125/VII/2023', '2023-06-03', 'Joseph Francis - JJJ Associates Timor Lda', '16FV04341', 'Estrangeiro', 'Orchard Apartment, Bemori', '73729717', 'jg_francis@yahoo.com', 'Residensial', NULL, NULL, 'privadu'),
(122, '0127/VII/2023', '2023-07-12', 'Francisco Tilman Cepede', '0', 'Timorense', 'Taibessi', '77771130', 'ftcepeda@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(123, '0128/VII/2023', '2023-07-28', 'Detile Consultant', '0', 'Estrangeiro', 'Farol', '78608888', 'detile.consultant@yahoo.com', 'Office', NULL, NULL, 'privadu'),
(124, '0129/VII/2023', '2023-07-29', 'Domingos Lequisiga Maria', '0', 'Timorense', 'Manleuana', '77147078', 'domingos.timorleste@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(125, '0130/VII/2023', '2023-07-31', 'Sucesso Hamutuk Lda IV - Sergiano da Silva', '0', 'Timorense', 'Land Mark Fatuhada', '77720098', NULL, 'Sucesso Hamutuk Lda (Totobola)', NULL, NULL, 'privadu'),
(126, '0131/VIII/2023', '2023-08-01', 'Carlos Pereira da Silva', '0', 'Timorense', 'Comoro', '77109346', NULL, 'Residensial', NULL, NULL, 'privadu'),
(127, '0132/VIII/2023', '2023-08-05', 'Ricardo Jorge Alves Delgado', 'CA522967', 'Estrangeiro', 'Pantai kelapa', '78413318', 'ricardoalvesdelgado@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(128, '0133/VIII/2023', '2023-08-22', 'Domingas Pereira', '001332992', 'Timorense', 'Metiaut', '77439305', 'Mekhapereira25@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(129, '0134/IX/2023', '2023-09-01', 'Narabey Totobola - Rony Wirawan', '0', 'Estrangeiro', 'Delta II', '77954217', NULL, 'Sucesso Hamutuk Lda (Totobola)', NULL, NULL, 'privadu'),
(130, '0135/IX/2023', '2023-09-06', 'Paulo Jorge de Sousa Castelas Guimarao', '0', 'Timorense', 'Villa Formosa', '77724542', NULL, 'Residensial', NULL, NULL, 'privadu'),
(131, '0136/IX/2023', '2023-09-06', 'Nuno Filipe T. Ribeiro', '0', 'Timorense', 'Villa Formosa', '77436897', NULL, 'Residensial', NULL, NULL, 'privadu'),
(132, '0137/IX/2023', '2023-09-27', 'Stefan Hlavac', '00620/AR/2022', 'Estrangeiro', 'Ai-Talik hun, Matir II, Bebonuk', '78844448', 'stefan.hlvac@gmx.at', 'Residensial', NULL, NULL, 'privadu'),
(133, '0138/X/2023', '2023-10-04', 'Cancio Oliveira', '0606071305589587', 'Timorense', 'Travessa de Villa verde', '77999588', NULL, 'Residensial', NULL, NULL, 'privadu'),
(134, '0139/X/2023', '2023-10-05', 'Ir. Adriano de Jejus', '0', 'Timorense', 'Dom Bosco, Comor', '77361826', NULL, 'Residensial', NULL, NULL, 'privadu'),
(135, '0140/X/2023', '2023-10-12', 'Stefan Hlavac - Agiomondo FSP', '0', 'Estrangeiro', 'Motael, Dili', '78844448', 'coordination.cpstimorleste@opiemondo.ok', 'Residensial', NULL, NULL, 'privadu'),
(136, '0141/X/2023', '2023-10-12', 'Kasma Latif', 'C7431244', 'Estrangeiro', 'Kampung Baru', '74227161', NULL, 'Loja Ariska', NULL, NULL, 'privadu'),
(137, '0142/X/2023', '2023-10-13', 'Faysal', '0', 'Estrangeiro', 'Kolmera', '77146120', NULL, 'Global Aircon', NULL, NULL, 'privadu'),
(138, '0143/X/2023', '2023-10-25', 'Diego da Silva Filho', 'YA7176563', 'Estrangeiro', 'Bemori', '77522448', 'diego_falbo01@hotmail.com', 'Residensial', NULL, NULL, 'privadu'),
(139, '0144/X/2023', '2023-10-25', 'Robin Joy Pereira Araujo', '000166734', 'Timorense', 'Taibessi', '77393551', 'robin_araujo@hotmail.com', 'Residensial', NULL, NULL, 'privadu'),
(140, '0145/X/2023', '2023-10-27', 'Faysal', '0', 'Estrangeiro', 'Kolmera', '77146120', NULL, 'Global Aircon II', NULL, NULL, 'privadu'),
(141, '0146/XI/2023', '2023-11-06', 'Drs. Rachel', '0', 'Estrangeiro', 'Manleuana', '73312345', NULL, 'Pet care clinic', NULL, NULL, 'privadu'),
(142, '0147/XI/2023', '2023-11-08', 'Mariabelle Lagrisola', '0', 'Estrangeiro', 'Orchard Apartment', '78248647', NULL, 'Residensial', NULL, NULL, 'privadu'),
(143, '0148/XII/2023', '2023-12-27', 'Cristino da Cruz', '0', 'Timorense', 'Cacaulidun', '0', NULL, 'Residensial', NULL, NULL, 'privadu'),
(144, '0149/XII/2023', '2023-12-29', 'Cirilo O.F.D. Xavier', '0', 'Timorense', 'Delta 2', '77086831', NULL, 'Residensial', NULL, NULL, 'privadu'),
(145, '0150/I/2024', '2024-01-06', 'Ruben A. Freitas', '0', 'Timorense', 'Surikmas', '77297531', NULL, 'Residensial', NULL, NULL, 'privadu'),
(146, '0151/I/2024', '2024-01-09', 'Apolinario Magno', '0', 'Timorense', 'Delta 3', '77346834', NULL, 'Residensial', NULL, NULL, 'privadu'),
(147, '0152/I/2024', '2024-01-25', 'Planet Unipessoal - Marthin Hutajaru', 'C741247', 'Estrangeiro', 'Audian', '77006677', NULL, 'Planet Unipessoal Lda', NULL, NULL, 'privadu'),
(148, '0153/II/2024', '2024-02-16', 'Ankur Anggarwal', 'V4414132', 'Estrangeiro', 'House 9, Timor Resort', '77894925', NULL, 'Residensial', NULL, NULL, 'privadu'),
(149, '0154/III/2024', '2024-03-09', 'Paul Herbert Mas', 'P5749508B', 'Estrangeiro', 'Fomento II', '73147506', NULL, 'Residensial', NULL, NULL, 'privadu'),
(150, '0155/III/2024', '2024-03-09', 'Pe. Gui do Carmo da Silva', 'CE 0610547', 'Timorense', 'Dom Bosco, Comoro', '77239133', 'gbysilva@yahoo.co.uk', 'Salesian Media Center', NULL, NULL, 'privadu'),
(151, '0156/IV/2024', '2024-04-16', 'Zac Jones', '0', 'Estrangeiro', 'Timor Resort', '+61410660508', 'xveir7@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(152, '0157/IV/2024', '2024-04-22', 'Jenifer Octavia Tjung Miady', '0104651C', 'Timorense', 'Fatuhada', '73854783', NULL, 'Loja Diliana', NULL, NULL, 'privadu'),
(153, '0158/V/2024', '2024-05-02', 'Zezinha Natalina Filomeno Ferreira Gusmao', '0606020202090001', 'Timorense', 'Villa verde', '77048458', NULL, 'Residensial', NULL, NULL, 'privadu'),
(154, '0159/V/2024', '2024-05-07', 'Teotonio J. Fraga', '0', 'Timorense', 'Fomento III', '73252989', 'laorai85@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(155, '0160/V/2024', '2024-05-28', 'Nyoto Irawan', 'C5013741', 'Estrangeiro', 'Audian, Dili', '77428765', 'nyotoirawambaou@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(156, '0161/VII/2024', '2024-07-06', 'Partido CNRT', '0', 'Timorense', 'Bairro dos Grilhos', '73222137', NULL, 'Sede Partido CNRT', NULL, NULL, 'privadu'),
(157, '0162/VII/2024', '2024-07-11', 'Teotonio J. Fraga Gautulu 2', '0', 'Timorense', 'Fomento III', '73252989', 'laorai85@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(158, '0163/VII/2024', '2024-07-13', 'Osorio Babo', '0', 'Timorense', 'Paroquia Maria Auxiliadora, Comoro', '77264940', NULL, 'Paroquia Maria Auxiliadora', NULL, NULL, 'privadu'),
(159, '0164/VII/2024', '2024-07-18', 'Joaozito Viana', '6020229017500083', 'Estrangeiro', 'Au-hun, Becora', '77304489', 'joaozito.timorleste@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(160, '0165/VII/2024', '2024-07-23', 'Kiki Chairani', '0', 'Estrangeiro', 'Orchard Apartment, Bemori', '74749092', NULL, 'Residensial', NULL, NULL, 'privadu'),
(161, '0166/VIII/2024', '2024-08-08', 'Anna Perrin', 'PU903850', 'Estrangeiro', 'Timor Resort, House #54', '75318105', 'nyuta.vasilink@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(162, '0167/VIII/2024', '2024-08-13', 'Ali Ahmad Khan', '0', 'Estrangeiro', 'Timor Resort, House #53', '+923224708848', 'aliahmad.Khan@wfp.org', 'Residensial', NULL, NULL, 'privadu'),
(163, '0168/VIII/2024', '2024-08-23', 'James Wicken', 'PE0408216', 'Estrangeiro', 'Timor Resort, House #3', '78322862', 'jameswicken@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(164, '0169/IX/2024', '2024-09-01', 'M. Suhail Sahan', 'AJ5429724', 'Estrangeiro', 'JL. Villa', '77266619', 'suhailpk@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(165, '0170/IX/2024', '2024-09-02', 'Woo Su Jeong', 'M490G3194', 'Estrangeiro', 'Vila Mataruak (Vila 5)', '77859103', NULL, 'Residensial', NULL, NULL, 'privadu'),
(166, '0171/IX/2024', '2024-09-05', 'Nabil Ali', 'A-400-622-621-303 D/L', 'Estrangeiro', 'Timor Resort, House #36', '78316126', 'nabil.n.ali@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(167, '0172/IX/2024', '2024-09-05', 'Shannon Bruncat', '0', 'Estrangeiro', 'Timor Resort, House #55', '78609005', NULL, 'Residensial', NULL, NULL, 'privadu'),
(168, '0173/IX/2024', '2024-09-16', 'Fakri Karim', 'X1150609', 'Estrangeiro', 'Timor Resort, House #52', '73672333', 'fakrik@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(169, '0174/IX/2024', '2024-09-27', 'Cleofas Vidal Maria de Aurajo', '137318', 'Timorense', 'Kolmera', '78277388', NULL, 'Residensial', NULL, NULL, 'privadu'),
(170, '0175/X/2024', '2024-10-07', 'Ir. Adriano de Jejus', '0132749C', 'Timorense', 'Dom Bosco, Comoro', '77361826', NULL, 'Instituisaun CFPDB Comoro', NULL, NULL, 'privadu'),
(171, '0176/XI/2024', '2024-11-05', 'Arry Prastyo', 'C6185767', 'Estrangeiro', 'Hudi Laran', '77445123', 'kapstaadarl@gmail.com', 'ARL Kapstaad lda', NULL, NULL, 'privadu'),
(172, '0177/XI/2024', '2024-11-07', 'Thanachai Wachiraworakam', '0', 'Estrangeiro', 'Timor Resort, House #4', '76191779', 'thanachaiw@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(173, '0178/XI/2024', '2024-11-07', 'Chandan Razak', '0', 'Estrangeiro', 'Kolmera', '77996786', NULL, 'Vdeocon Eletronics', NULL, NULL, 'privadu'),
(174, '0179/XI/2024', '2024-11-19', 'Dwi Prasetio', '0', 'Estrangeiro', 'Taibessi', '73312345', NULL, 'Residensial', NULL, NULL, 'privadu'),
(175, '0180/I/2025', '2025-01-20', 'Hallie Sohyun Jeon', 'M317U3238', 'Estrangeiro', 'Menoa Apartment 7B, Bemori', '+32493923611', 'hallie.jeon@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(176, '0181/II/2025', '2025-02-04', 'Marcelino Oliveira Neves', '000559444', 'Timorense', 'Bebonuk Tuty 20 de Setembro', '77838882', 'marcelinoneves269@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(177, '0182/II/2025', '2025-02-06', 'Juliao A.X. Carlos', '0799475C', 'Timorense', 'Sao Miguel, Aimutin', '74048280', 'jxaviercarlos@yahoo.com', 'Residensial', NULL, NULL, 'privadu'),
(178, '0183/II/2025', '2025-02-06', 'Helder Eduardo Brites', '113053', 'Timorense', 'Aimutin Centro', '77940099', 'dededegrg@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(179, '0184/III/2025', '2025-03-05', 'Juvinal de A. de Jejus', '06030219059665242', 'Timorense', 'Delta III', '76616458', NULL, 'Residensial', NULL, NULL, 'privadu'),
(180, '0185/III/2025', '2025-03-07', 'Antonio Sarmento', '0', 'Timorense', 'Pantai kelapa', '76473875', NULL, 'Residensial', NULL, NULL, 'privadu'),
(181, '0186/III/2025', '2025-03-10', 'Aloisius Tilman', '0', 'Timorense', 'Delta I', '74550879', NULL, 'Residensial', NULL, NULL, 'privadu'),
(182, '0187/III/2025', '2025-03-19', 'Herry Jaya', '0', 'Estrangeiro', 'Bairro dos Grilhos', '78266999', NULL, 'Tirodo Grilhos Lda', NULL, NULL, 'privadu'),
(183, '0188/III/2025', '2025-03-15', 'Reinaldo Ximenes', '0', 'Timorense', 'Manleuana', '77281211', NULL, 'Residensial', NULL, NULL, 'privadu'),
(184, '0189/III/2025', '2025-03-19', 'Marlin Ribeiro', '0', 'Timorense', 'Kolmera', '77502881', NULL, 'Residensial', NULL, NULL, 'privadu'),
(185, '0190/IV/2025', '2025-04-02', 'Cristiano da Costa', '000139999', 'Timorense', 'Manleuana', '77243453', 'dacosta.cristiano@yahoo.com', 'Residensial', NULL, NULL, 'privadu'),
(186, '0191/V/2025', '2025-04-10', 'Geza D. Espiritu', 'P8733864A', 'Timorense', 'No.8 Avenida Bispo de Madeiros, Dili, Timor-Leste', '78326885', 'gezaspiritz20@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(187, '0192/IV/2025', '2025-04-14', 'Partido CNRT', '0', 'Timorense', 'Bairro dos Grillos', '73222137', NULL, 'Sede Partido CNRT', NULL, NULL, 'privadu'),
(188, '0193/V/2025', '2025-05-14', 'Pe. Gui do Carmo da Silva', 'CE 0610547', 'Timorense', 'Dom Bosco, Comoro', '77239133', 'gbysilva@yahoo.co.uk', 'Salesian Media Center', NULL, NULL, 'privadu'),
(189, '0194/VI/2025', '2025-06-23', 'Francisca Moniz da C. de Jejus', 'CE 000686776', 'Timorense', 'Ai-mutin', '78094328', 'ika.moniz22@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(190, '0195/VII/2025', '2025-07-03', 'Remigio D. Boavida Freitas', '0', 'Timorense', 'Ai-tarak laran', '75554742', NULL, 'Residensial', NULL, NULL, 'privadu'),
(191, '0196/VII/2025', '2025-07-03', 'Marcelino Oliveira Neves', '000559444', 'Timorense', 'Bebonuk Tuty 20 de Setembro', '77838882', 'marcelinoneves269@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(192, '0197/VII/2025', '2025-07-03', 'Helder Eduardo Brites', '113053', 'Timorense', 'Aimutin Centro', '77940099', 'dededegrg@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(193, '0198/VII/2025', '2025-07-08', 'Alvin Sonbay', 'X4122365', 'Estrangeiro', 'Bemori', '77743463', 'alvinsonbay2002@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(194, '0199/VII/2025', '2025-07-10', 'Juliao A.X. Carlos', '0799475C', 'Timorense', 'Sao Miguel, Aimutin', '74048280', 'jxaviercarlos@yahoo.com', 'Residensial', NULL, NULL, 'privadu'),
(195, '0200/VII/2025', '2025-07-15', 'Augusty Ferdinand', '3374062304550001', 'Estrangeiro', 'Apartment Manleuana', '+6281290923455', 'augusty55@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(196, '0201/VII/2025', '2025-07-14', 'Jakob Oberg', '0', 'Estrangeiro', 'Bemori Menoa Apart 7B', '+46734072135', NULL, 'Residensial', NULL, NULL, 'privadu'),
(197, '0202/VII/2025', '2025-07-22', 'Oji Syahroji', 'E2969829', 'Estrangeiro', 'Fomento I', '75346640', NULL, 'Residensial', NULL, NULL, 'privadu'),
(198, '0203/VII/2025', '2025-07-23', 'Joaozito Viana (Reprezentante Partidu CNRT)', '000611675', 'Timorense', 'Farol', '77666647', 'joaozito.timorleste@gmail.com', 'Partidu CNRT', NULL, NULL, 'privadu'),
(199, '0204/VII/2025', '2025-07-28', 'Jessiebhel Alolor', 'PU701328C', 'Timorense', 'Aimutin', '74774949', 'jessiebhel2000@gmail.com', 'Residensial', NULL, NULL, 'privadu'),
(200, '0205/VIII/2024', '2025-08-01', 'Pe. Gui do Carmo da Silva', '08030311107597022', 'Timorense', 'Dom Bosco Comoro', '77239133', 'gbysilva@yahoo.com', 'Instituto Filosofia São Francisco de Sales', NULL, NULL, 'privadu');

-- --------------------------------------------------------

--
-- Table structure for table `kliente_pakotes`
--

CREATE TABLE `kliente_pakotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kliente_id` bigint(20) UNSIGNED NOT NULL,
  `pakote_id` bigint(20) UNSIGNED NOT NULL,
  `nu_ref` varchar(255) NOT NULL,
  `naran` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `nu_telfone` varchar(255) DEFAULT NULL,
  `residensia` varchar(255) DEFAULT NULL,
  `kapasidade` varchar(255) NOT NULL,
  `presu_pakote` decimal(10,2) NOT NULL,
  `presu_instalasaun` decimal(10,2) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deactivated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kliente_pakotes`
--

INSERT INTO `kliente_pakotes` (`id`, `kliente_id`, `pakote_id`, `nu_ref`, `naran`, `data`, `nu_telfone`, `residensia`, `kapasidade`, `presu_pakote`, `presu_instalasaun`, `status`, `created_at`, `updated_at`, `deactivated_at`) VALUES
(1, 1, 3, '0001/I/2022', 'Odete Soares S. da Costa', '2021-05-05', '77346053', 'Manleuana', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 02:18:04', '2025-06-26 17:54:54', NULL),
(2, 2, 3, '0002/V/2021', 'Mateus da Costa', '2021-05-05', '77305971', 'Manleuana', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 02:18:26', '2025-06-06 02:18:26', NULL),
(3, 3, 3, '0003/V/2021', 'Jose Menezes da Costa', '2021-05-05', '77244579', 'Manleuana', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 02:18:52', '2025-06-06 02:18:52', NULL),
(4, 4, 7, '0004/V/2021', 'Pe.Manuel Pinto, SDB', '2021-06-01', '77353892', 'Dom Bosco, Comoro', 'up to 10', '219.05', '0.00', 'inactive', '2025-06-06 02:19:16', '2025-06-06 02:19:29', '2025-06-06 11:19:29'),
(5, 5, 1, '0005/V/2021', 'Pe. Jose Dwight, SDB', '2021-05-05', '77013565', 'Pos Noviciado Dom Bosco, Comoro', 'up to 4', '16.67', '0.00', 'active', '2025-06-06 02:19:54', '2025-06-06 02:19:54', NULL),
(6, 6, 4, '0006/V/2021', 'Fundasaun Neo Metin / UNPAZ', '2021-05-05', '78520620', 'Osindo I, Manleuana', 'up to 6', '60.95', '0.00', 'active', '2025-06-06 02:20:20', '2025-06-06 02:20:20', NULL),
(7, 7, 3, '0007/V/2021', 'Francisco Abel Amaral', '2021-05-05', '77365577', 'Fatuhada', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 02:24:09', '2025-06-06 04:47:23', '2025-06-06 13:47:23'),
(8, 8, 3, '0008/V/2021', 'Ivo Jorge Valente', '2021-05-21', '77045019', 'Delta 1', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 02:24:28', '2025-06-07 04:53:16', '2025-06-07 13:53:16'),
(9, 9, 3, '0009/V/2021', 'Joseph Francis', '2021-05-21', '73729717', 'Manleuana', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 02:24:53', '2025-06-07 04:55:07', '2025-06-07 13:55:07'),
(10, 10, 3, '0010/V/2021', 'Joao Fernandes Soares', '2021-05-22', '77133734', 'Manleuana', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 02:25:42', '2025-06-06 02:25:42', NULL),
(11, 11, 3, '0011/V/2021', 'Ginalyn Dalia Espiritu', '2021-05-24', '77395841', 'Orchard Apartment Room #26', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 02:25:58', '2025-06-07 04:55:21', '2025-06-07 13:55:21'),
(12, 12, 4, '0012/V/2021', 'Pedro M. F. B. Ximenes', '2021-05-24', '77359449', 'Malinamok', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 02:26:17', '2025-06-07 04:55:40', '2025-06-07 13:55:40'),
(13, 13, 3, '0013/V/2021', 'Aznitrade Unipessoal Lda', '2021-11-30', '0', 'Aldeia 4 de Setembro, Comoro', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 02:26:56', '2025-06-07 04:55:53', '2025-06-07 13:55:53'),
(14, 14, 3, '0014/VI/2021', 'Alcino Passos', '2021-06-02', '75657185', 'Villa verde', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 03:50:33', '2025-06-07 04:56:01', '2025-06-07 13:56:01'),
(15, 15, 3, '0015/VI/2021', 'Lenor de Roxas Castulo', '2021-06-05', '77293210', 'Delta 1', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 03:50:51', '2025-06-06 03:50:51', NULL),
(16, 16, 3, '0016/VI/2021', 'Marlon Golveo Reyes', '2021-06-05', '76230754', 'Kolmera', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 03:51:12', '2025-06-06 03:51:12', NULL),
(17, 17, 3, '0017/VI/2021', 'Edgar Lawrence Uedo', '2021-06-08', '73661300', 'Delta 2', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 03:51:30', '2025-06-06 03:51:30', NULL),
(18, 18, 6, '0018/VI/2021', 'Jeorgina Ximenes dos Santos', '2021-06-09', '3310400', 'Fomento III', 'up to 8', '123.81', '0.00', 'inactive', '2025-06-06 03:52:00', '2025-06-07 04:56:39', '2025-06-07 13:56:39'),
(19, 19, 3, '0019/VI/2021', 'Florentino Soares Ferreira', '2021-06-14', '74231777', 'Bairro Pite', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 03:52:20', '2025-06-07 04:56:46', '2025-06-07 13:56:46'),
(20, 20, 7, '0020/VI/2021', 'Pedro M. F. B. Ximenes', '2021-06-19', '77389449', 'Fomento', 'up to 10', '219.05', '0.00', 'inactive', '2025-06-06 03:52:37', '2025-06-07 04:56:58', '2025-06-07 13:56:58'),
(21, 21, 7, '0021/VI/2021', 'Vana Ramila de F. F. Lobato', '2021-06-28', '78587777', 'Fomento 2', 'up to 10', '219.05', '0.00', 'inactive', '2025-06-06 03:52:57', '2025-06-07 04:57:11', '2025-06-07 13:57:11'),
(22, 23, 7, '0022/VI/2021', 'Pedro M. F. B. Ximenes', '2021-06-29', '77389449', 'Praia dos Coqueiros', 'up to 10', '219.05', '0.00', 'inactive', '2025-06-06 03:53:39', '2025-06-07 04:57:22', '2025-06-07 13:57:22'),
(23, 22, 3, '0023/VII/2021', 'Hong Jeaseouk', '2021-07-05', '73252525', 'Fomento 1', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 03:54:13', '2025-06-07 04:57:31', '2025-06-07 13:57:31'),
(24, 24, 4, '0024/VII/2021', 'Isabel Maria B. F. Ximenes', '2021-07-06', '78048348', 'Aldeia 30 de Agosto, Comoro', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 03:54:36', '2025-06-07 04:58:03', '2025-06-07 13:58:03'),
(25, 25, 3, '0025/VII/2021', 'Litizia Tam M. Ballo', '2021-07-17', '74516067', 'Delta 1', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 03:54:52', '2025-06-07 04:58:23', '2025-06-07 13:58:23'),
(26, 26, 3, '0026/VII/2021', 'Domingos Lopes Antunes', '2021-07-21', '77357163', 'Terra Santa', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 03:55:16', '2025-06-07 04:58:41', '2025-06-07 13:58:41'),
(27, 27, 3, '0028/VIII/20212', 'Lin Shenghua', '2021-08-05', '77111777', 'Hudi Laran', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 03:55:42', '2025-06-07 04:58:50', '2025-06-07 13:58:50'),
(28, 28, 3, '0029/VIII/2021', 'Edmundo F. Lopes', '2021-08-25', '77618880', 'Manleuana', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 03:55:58', '2025-06-07 04:59:17', '2025-06-07 13:59:17'),
(29, 30, 3, '0031/VIII/2021', 'Kang Chi Il', '2021-08-26', '78476019', 'Markoni', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 03:56:21', '2025-06-07 04:59:28', '2025-06-07 13:59:28'),
(30, 31, 6, '0032/VIII/2021', 'Luis Betancur', '2021-08-26', '77143678', 'Hotel Palm Beach', 'up to 8', '123.81', '0.00', 'inactive', '2025-06-06 03:56:34', '2025-06-07 04:59:41', '2025-06-07 13:59:41'),
(31, 32, 3, '0033/VIII/2021', 'Huang Rongrui', '2021-08-26', '78140278', 'Bairro Pite', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 03:57:04', '2025-06-07 04:59:50', '2025-06-07 13:59:50'),
(32, 33, 3, '0034/IX/2021', 'Zelinda Fernandes', '2021-09-02', '77818404', 'Cacaulidun', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 03:57:23', '2025-06-07 05:00:02', '2025-06-07 14:00:02'),
(33, 34, 4, '0035/IX/2021', 'Rudy', '2021-09-02', '77949496', 'Aimutin', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 03:57:45', '2025-06-07 05:00:12', '2025-06-07 14:00:12'),
(34, 35, 3, '0036/IX/2021', 'Rudy', '2021-09-02', '77949496', 'Aimutin', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 03:58:01', '2025-06-06 03:58:01', NULL),
(35, 37, 3, '0040/IX/2021', 'Mercy C. Yang', '2021-09-09', '78241464', 'Fomento 2', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 03:58:26', '2025-06-07 05:00:30', '2025-06-07 14:00:30'),
(36, 38, 3, '0041/IX/2021', 'Joao Miguel da Silva Soares', '2021-09-14', '77048254', 'Mandarin', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 03:58:47', '2025-06-07 05:00:38', '2025-06-07 14:00:38'),
(37, 39, 3, '0042/IX/2021', 'Efigenia de Jesus da Silva', '2021-09-14', '77611000', 'Villa verde', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 03:59:02', '2025-06-07 05:00:47', '2025-06-07 14:00:47'),
(38, 40, 3, '0043/IX/2021', 'Mary Jane Albina Ramos', '2021-09-09', '77336648', '30 de Agostu, Kampung baru, Comoro', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 03:59:18', '2025-06-07 05:00:59', '2025-06-07 14:00:59'),
(39, 42, 3, '0045/X/2021', 'Muhamad Qadri', '2021-10-22', '77451177', 'Comoro', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 03:59:54', '2025-06-07 05:01:07', '2025-06-07 14:01:07'),
(40, 43, 3, '0046/X/2021', 'James D. Porto', '2021-10-29', '77479940', 'Delta 1', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:00:09', '2025-06-07 05:01:16', '2025-06-07 14:01:16'),
(41, 44, 6, '0047/XI/2021', 'Joaquim Martins', '2021-11-04', '77138966', 'Rua Fomento', 'up to 8', '123.81', '0.00', 'inactive', '2025-06-06 04:00:32', '2025-06-07 05:01:29', '2025-06-07 14:01:29'),
(42, 45, 3, '0048/I/2022', 'Khoirul Umam', '2022-01-10', '77244753', 'Beto Barat', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:00:49', '2025-06-06 04:00:49', NULL),
(43, 46, 3, '0049/I/2022', 'Vicente Soares Faria', '2022-02-21', '77812575', 'Manleuana', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:01:02', '2025-06-07 05:01:46', '2025-06-07 14:01:46'),
(44, 47, 3, '0050/II/2022', 'Hanafi Kamyon', '2022-02-04', '73077772', 'House 50, Timor Resort', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:01:19', '2025-06-07 05:02:11', '2025-06-07 14:02:11'),
(45, 48, 3, '0051/II/2022', 'Agatha Indah Kurnia da Costa', '2022-02-09', '77299799', 'Fatuhada', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:01:34', '2025-06-06 04:01:34', NULL),
(46, 49, 4, '0052/II/2022', 'Ir.Adriano de Jejus', '2022-02-15', '77361826', 'Dom Bosco Comoro', 'up to 6', '60.95', '0.00', 'active', '2025-06-06 04:01:53', '2025-06-06 04:01:53', NULL),
(47, 50, 3, '0053/II/2022', 'Ir.Adriano de Jejus', '2022-02-15', '77361826', 'Dom Bosco', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:02:14', '2025-06-07 05:02:25', '2025-06-07 14:02:25'),
(48, 51, 3, '0054/II/2022', 'Tome Yap', '2022-02-22', '77240399', 'Rua Belarmino Lobo Bidau Acadiruhun', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:02:29', '2025-06-07 05:02:35', '2025-06-07 14:02:35'),
(49, 53, 3, '0056/III/2022', 'Casimiro Moniz de Jejus', '2022-03-04', '77777009', 'Delta 1', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:02:46', '2025-06-07 05:02:44', '2025-06-07 14:02:44'),
(50, 54, 4, '0057/III/2022', 'Reinato Aparicio Soares', '2022-03-09', '76127409', 'Aimutin', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:03:01', '2025-06-07 05:02:58', '2025-06-07 14:02:58'),
(51, 55, 3, '0058/III/2022', 'Joaquim Martins', '2022-03-18', '77138966', 'Comoro', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:03:20', '2025-06-07 05:03:13', '2025-06-07 14:03:13'),
(52, 56, 6, '0059/III/2022', 'James A. Smith', '2022-03-23', '78371948', 'Delta 3', 'up to 8', '123.81', '0.00', 'inactive', '2025-06-06 04:03:35', '2025-06-07 05:03:22', '2025-06-07 14:03:22'),
(53, 57, 3, '0060/III/2022', 'Leonel Hornai da Cruz', '2022-03-23', '77193315', 'Delta III, Block K-II, Comoro', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:04:01', '2025-06-06 04:04:40', NULL),
(54, 58, 6, '0061/IV/2022', 'Monica G. Guterres', '2022-04-22', '77276043', 'Bangkoko Luxury Hotel, Hudi Laran', 'up to 8', '123.81', '0.00', 'inactive', '2025-06-06 04:04:26', '2025-06-07 05:03:38', '2025-06-07 14:03:38'),
(55, 59, 3, '0062/IV/2022', 'Feliciano J.G. Aleixo', '2022-04-26', '77665033', 'Hudi laran', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:04:55', '2025-06-06 04:04:55', NULL),
(56, 60, 4, '0063/V/2022', 'Instant Shop', '2022-05-04', '0', 'Fomento 1', 'up to 6', '60.95', '0.00', 'active', '2025-06-06 04:05:09', '2025-06-06 04:05:09', NULL),
(57, 61, 3, '0064/VI/2022', 'Tan Yoppy Hendrata', '2022-06-10', '77259100', 'Fomento 1', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:05:27', '2025-06-07 05:03:53', '2025-06-07 14:03:53'),
(58, 62, 3, '0065/VI/2022', 'Jeong Hoon Kim', '2022-06-15', '77885441', 'Fomento 2, Comoro, Dom Aleixo', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:05:42', '2025-06-07 05:04:09', '2025-06-07 14:04:09'),
(59, 63, 3, '0066/VI/2022', 'Fu Ho Jong', '2022-06-22', '0', 'Akadiruhun', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:06:04', '2025-06-07 05:04:18', '2025-06-07 14:04:18'),
(60, 64, 3, '0067/VI/2022', 'Kim Young Sil', '2022-06-23', '78423969', 'Fomento 1, Comoro, Dom Aleixo, Dili', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:06:19', '2025-06-07 05:04:32', '2025-06-07 14:04:32'),
(61, 65, 4, '0068/VII/2022', 'Daya Marketing', '2022-07-01', '73202510', 'Akadiruhun No.161', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:06:40', '2025-06-07 05:04:44', '2025-06-07 14:04:44'),
(62, 66, 3, '0069/VIII/2022', 'Marian Angel Tecson', '2022-08-04', '73553206', 'Bidau Lecidere, Dili, Timor-Leste', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:06:56', '2025-06-07 05:04:54', '2025-06-07 14:04:54'),
(63, 67, 4, '0070/VIII/2022', 'MD Kazi Iqbal Hossain Razo', '2022-08-18', '78482506', 'Kampung Baru', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:07:10', '2025-06-07 05:05:06', '2025-06-07 14:05:06'),
(64, 68, 3, '0071/IX/2022', 'ANL Timor Unipessoal Lda', '2022-09-01', '77345337', 'Timor Resource', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:07:28', '2025-06-07 05:05:16', '2025-06-07 14:05:16'),
(65, 69, 3, '0072/IX/2022', 'ANL', '2022-09-14', '77345337', 'Moris foun', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:07:47', '2025-06-07 05:05:29', '2025-06-07 14:05:29'),
(66, 70, 4, '0074/IX/2022', 'Rony Wirawan', '2022-09-23', '77015533', 'Pantai Kelapa', 'up to 6', '60.95', '0.00', 'active', '2025-06-06 04:08:07', '2025-06-06 04:08:07', NULL),
(67, 71, 3, '0075/IX/2022', 'Mariana Barreto Amaral', '2022-09-24', '77234851', 'Rua Travessa hare kulit, fomento leten, Fomento 1, Comoro', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:08:24', '2025-06-07 05:05:42', '2025-06-07 14:05:42'),
(68, 72, 3, '0076/IX/2022', 'Abel da Costa Freitas Ximenes', '2022-09-29', '77045025', 'Aldeia Zero Tres Lorumata Fatuhada', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:08:37', '2025-06-07 05:06:09', '2025-06-07 14:06:09'),
(69, 74, 3, '0078/X/2022', 'Abel da Costa Freitas Ximenes', '2022-10-12', '77045025', 'Bairro pite', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:08:58', '2025-06-07 05:06:00', '2025-06-07 14:06:00'),
(70, 75, 3, '0079/X/2022', 'Ade Irawan', '2022-10-19', '77258924', 'Fatuhada', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:09:15', '2025-06-07 05:05:52', '2025-06-07 14:05:52'),
(71, 76, 4, '0080/X/2022', 'Zezinho Gusmao', '2022-10-28', '77048888', 'Bairro Pite, Hudi Laran', 'up to 6', '60.95', '0.00', 'active', '2025-06-06 04:09:31', '2025-06-06 04:09:31', NULL),
(72, 77, 4, '0081/XI/2022', 'Oscar Casamian Marco', '2022-11-10', '77048888', 'Pantai kelapa', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:09:44', '2025-06-07 05:06:28', '2025-06-07 14:06:28'),
(73, 78, 3, '0082/XI/2022', 'Agapito de Rosario', '2022-11-11', '77719557', 'Delta III', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:09:59', '2025-06-07 05:06:19', '2025-06-07 14:06:19'),
(74, 79, 4, '0083/XII/2022', 'Rony Wirawan', '2022-12-01', '77015533', 'Delta I', 'up to 6', '60.95', '0.00', 'active', '2025-06-06 04:10:16', '2025-06-06 04:10:16', NULL),
(75, 80, 3, '0084/XII/2022', 'Moon Sehyuk', '2022-12-15', '77556633', 'Fatuhada', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:10:29', '2025-06-07 05:06:42', '2025-06-07 14:06:42'),
(76, 81, 3, '0085/I/2023', 'MD Belayet Hossain', '2023-04-10', '77355629', 'Mandarin, Dili', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:11:48', '2025-06-07 05:06:55', '2025-06-07 14:06:55'),
(77, 82, 3, '0086/I/2023', 'Hermawan', '2023-01-10', '78006331', 'Aimutin', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:12:05', '2025-06-06 04:12:05', NULL),
(78, 83, 4, '0087/I/2023', 'Narpov Ateita Unip, Lda', '2023-01-19', '77142443', 'Fatuhada Rua Zero II, Lantai 3, Odamatan B3', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:12:21', '2025-06-07 05:07:08', '2025-06-07 14:07:08'),
(79, 84, 3, '0088/I/2023', 'Massum Hossain', '2023-01-23', '77270865', 'Aimutin', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:12:36', '2025-06-07 05:07:56', '2025-06-07 14:07:56'),
(80, 85, 3, '0089/I/2023', 'Amdadul Hague', '2023-01-23', '76202020', 'Aimutin', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:13:04', '2025-06-07 05:08:05', '2025-06-07 14:08:05'),
(81, 86, 3, '0090/I/2023', 'Manuel Soares dos R. Pacheco', '2023-01-25', '77882868', 'Fatuhada', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:13:17', '2025-06-07 05:08:13', '2025-06-07 14:08:13'),
(82, 87, 3, '0091/I/2023', 'Agapito Fernandes', '2023-01-26', '0', 'Fatuhada, Dom Aleixo, Dili', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:13:35', '2025-06-07 05:08:23', '2025-06-07 14:08:23'),
(83, 88, 4, '0092/II/2023', 'Cosme Correia Freitas', '2023-02-06', '0', 'Villa verde', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:13:52', '2025-06-07 05:08:38', '2025-06-07 14:08:38'),
(84, 89, 3, '0093/II/2023', 'Valdemir Pereira', '2023-02-14', '74558166', 'Timor Resort', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:14:06', '2025-06-07 05:08:50', '2025-06-07 14:08:50'),
(85, 90, 3, '0094/II/2023', 'Guilherme Alves Cardoso Penha', '2023-02-15', '77654904', 'Beco Uma Boot, Uma SS, Bebonuk', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:14:55', '2025-06-07 05:09:04', '2025-06-07 14:09:04'),
(86, 91, 3, '0095/II/2023', 'Paula Juliana A.', '2023-02-16', '76963165', 'Timor Resort', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:15:07', '2025-06-07 05:07:43', '2025-06-07 14:07:43'),
(87, 92, 3, '0096/II/2023', 'Massum Hossain II', '2023-02-19', '77270865', 'Aimutin', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:15:30', '2025-06-07 05:07:20', '2025-06-07 14:07:20'),
(88, 93, 3, '0097/II/2023', 'Jose Reali', '2023-02-20', '77226939', 'Pantai Kelapa', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:15:43', '2025-06-06 04:15:43', NULL),
(89, 94, 3, '0098/II/2023', 'Amdadul Hague II', '2023-02-21', '76202020', 'Kolmera', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:15:59', '2025-06-07 05:09:27', '2025-06-07 14:09:27'),
(90, 95, 3, '0099/II/2023', 'Rattet Kazi', '2023-02-25', '78260361', 'Kolmera', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:16:13', '2025-06-07 05:09:39', '2025-06-07 14:09:39'),
(91, 96, 7, '0100/III/2023', 'Tobishima Corporation', '2023-03-20', '77737264', 'Orchard Apartment', 'up to 10', '219.05', '0.00', 'inactive', '2025-06-06 04:16:30', '2025-06-07 05:09:52', '2025-06-07 14:09:52'),
(92, 97, 7, '0101/III/2023', 'Pe. Inocencio Diomantino da Silva, SDB', '2023-03-03', '77737264', 'Dom Bosco, Comoro', 'up to 10', '219.05', '0.00', 'inactive', '2025-06-06 04:16:57', '2025-06-07 05:10:03', '2025-06-07 14:10:03'),
(93, 98, 6, '0102/III/2023', 'Theodorus Caet', '2023-03-06', '77379099', 'Hotel Sakura, Audian', 'up to 8', '123.81', '0.00', 'inactive', '2025-06-06 04:17:15', '2025-06-07 05:10:13', '2025-06-07 14:10:13'),
(94, 99, 3, '0103/III/2023', 'MD Faysal Miah', '2023-03-18', '77146120', 'Kolmera', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:17:28', '2025-06-07 05:10:24', '2025-06-07 14:10:24'),
(95, 100, 3, '0104/III/2023', 'C.N. Haricharan', '2023-03-24', '0', 'Green Diamond Residence', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:17:41', '2025-07-03 22:41:50', '2025-07-04 07:41:50'),
(96, 101, 4, '0105/IV/2023', 'Sesmaro Timor, Lda', '2023-04-01', '77463333', 'Moris Foun, Comoro', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:18:02', '2025-06-07 05:10:34', '2025-06-07 14:10:34'),
(97, 102, 3, '0106/IV/2023', 'Abu Kawsar', '2023-04-10', '78339966', 'Comoro', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:18:18', '2025-06-07 05:10:42', '2025-06-07 14:10:42'),
(98, 103, 4, '0107/IV/2023', 'MD Kazi Iqbal Hossain', '2023-04-04', '78482506', 'kampung Baru, Comoro', 'up to 6', '60.95', '0.00', 'active', '2025-06-06 04:18:30', '2025-06-06 04:18:30', NULL),
(99, 104, 3, '0108/IV/2023', 'Alin Lim', '2023-04-11', '77231056', 'Kampu Alor', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:18:43', '2025-06-07 05:10:52', '2025-06-07 14:10:52'),
(100, 105, 3, '0109/IV/2023', 'Romeu da Conceicao Costa', '2023-04-14', '77997483', 'Aimutin', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:19:02', '2025-06-06 04:19:02', NULL),
(101, 106, 7, '0110/IV/2023', 'Clement Low', '2023-04-18', '77894472', 'Pacha Apartment Bidau', 'up to 10', '219.05', '0.00', 'inactive', '2025-06-06 04:19:23', '2025-06-07 05:11:00', '2025-06-07 14:11:00'),
(102, 107, 3, '0111/IV/2023', 'Terlinda da Conceicao Barros', '2023-04-26', '77735151', 'Bidau, Toko baru', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:19:38', '2025-06-07 05:11:12', '2025-06-07 14:11:12'),
(103, 108, 3, '0112/IV/2023', 'Su Jeong Woo', '2023-04-29', '77859103', 'Timor Resort', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:20:19', '2025-06-07 05:11:22', '2025-06-07 14:11:22'),
(104, 109, 3, '0113/V/2023', 'Jose T. Mousaco', '2023-05-03', '77066142', 'Timor Resort', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:20:35', '2025-06-06 04:20:35', NULL),
(105, 110, 4, '0114/V/2023', 'Sucesso Hamutuk Lda I', '2023-05-03', '77129439', 'Bairro Pite', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:20:51', '2025-06-07 05:11:31', '2025-06-07 14:11:31'),
(106, 111, 4, '0115/V/2023', 'Fernando Cesar Costa e Almeida', '2023-05-02', '75349413', 'Timor Resort', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:21:07', '2025-06-07 05:13:09', '2025-06-07 14:13:09'),
(107, 112, 3, '0116/V/2023', 'Taq Ec Lin', '2023-05-10', '75980777', 'Kolmera', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:21:29', '2025-06-07 05:13:18', '2025-06-07 14:13:18'),
(108, 113, 3, '0117/V/2023', 'MD Mosfiqur Rahman', '2023-05-15', '76481121', 'Delta III', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:21:45', '2025-06-07 05:13:30', '2025-06-07 14:13:30'),
(109, 114, 3, '0118/V/2023', 'Global Air Condition', '2023-05-18', '77146120', 'Kolmera', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:21:58', '2025-06-07 05:13:44', '2025-06-07 14:13:44'),
(110, 115, 4, '0119/V/2023', 'Sucesso Hamutuk Lda II', '2023-05-31', '77035252', 'Kuluhun', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:22:16', '2025-06-07 05:13:52', '2025-06-07 14:13:52'),
(111, 116, 3, '0120/VI/2023', 'Hung Ah Hing', '2023-06-05', '77265225', 'Kolmera', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:22:31', '2025-06-07 05:14:00', '2025-06-07 14:14:00'),
(112, 117, 3, '0121/VI/2023', 'Chuah Siaw Ching', '2023-05-06', '77265225', 'Fomento', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:22:45', '2025-06-07 05:11:57', '2025-06-07 14:11:57'),
(113, 118, 4, '0122/VI/2023', 'Emb. Mauricio Madeiros de Assis', '2023-06-10', '77940000', 'Residencia Embaixada Brazil, Praia dos Coqueiros', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:23:07', '2025-06-07 05:11:44', '2025-06-07 14:11:44'),
(114, 119, 3, '0123/VI/2023', 'Yudiy Kurniawan', '2023-06-14', '77963572', 'Beto Barat', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:23:23', '2025-06-06 04:23:23', NULL),
(115, 120, 3, '0124/VI/2023', 'Ismael Jose dos Reis', '2023-06-18', '77583111', 'Bairro dos Grilhos', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:23:37', '2025-06-07 05:12:10', '2025-06-07 14:12:10'),
(116, 121, 3, '0125/VII/2023', 'Joseph Francis - JJJ Associates Timor Lda', '2023-06-03', '73729717', 'Orchard Apartment, Bemori', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:23:56', '2025-06-06 04:23:56', NULL),
(117, 122, 3, '0127/VII/2023', 'Francisco Tilman Cepede', '2023-07-12', '77771130', 'Taibessi', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:24:34', '2025-06-06 04:24:34', NULL),
(118, 123, 6, '0128/VII/2023', 'Detile Consultant', '2023-07-28', '78608888', 'Farol', 'up to 8', '123.81', '0.00', 'active', '2025-06-06 04:24:51', '2025-06-06 04:24:51', NULL),
(119, 124, 3, '0129/VII/2023', 'Domingos Lequisiga Maria', '2023-07-29', '77147078', 'Manleuana', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:25:07', '2025-06-07 05:15:17', '2025-06-07 14:15:17'),
(120, 125, 4, '0130/VII/2023', 'Sucesso Hamutuk Lda IV - Sergiano da Silva', '2023-07-31', '77720098', 'Land Mark Fatuhada', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:25:22', '2025-06-07 05:15:39', '2025-06-07 14:15:39'),
(121, 126, 3, '0131/VIII/2023', 'Carlos Pereira da Silva', '2023-08-01', '77109346', 'Comoro', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:25:37', '2025-06-07 05:15:50', '2025-06-07 14:15:50'),
(122, 127, 4, '0132/VIII/2023', 'Ricardo Jorge Alves Delgado', '2023-08-05', '78413318', 'Pantai kelapa', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:25:56', '2025-06-07 05:16:06', '2025-06-07 14:16:06'),
(123, 128, 3, '0133/VIII/2023', 'Domingas Pereira', '2023-08-22', '77439305', 'Metiaut', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:26:09', '2025-06-07 05:16:28', '2025-06-07 14:16:28'),
(124, 129, 4, '0134/IX/2023', 'Narabey Totobola - Rony Wirawan', '2023-09-01', '77954217', 'Delta II', 'up to 6', '60.95', '0.00', 'active', '2025-06-06 04:26:26', '2025-06-06 04:26:26', NULL),
(125, 130, 4, '0135/IX/2023', 'Paulo Jorge de Sousa Castelas Guimarao', '2023-09-06', '77724542', 'Villa Formosa', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:26:41', '2025-06-07 05:16:43', '2025-06-07 14:16:43'),
(126, 131, 3, '0136/IX/2023', 'Nuno Filipe T. Ribeiro', '2023-09-06', '77436897', 'Villa Formosa', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:26:57', '2025-06-06 04:26:57', NULL),
(127, 132, 3, '0137/IX/2023', 'Stefan Hlavac', '2023-09-27', '78844448', 'Ai-Talik hun, Matir II, Bebonuk', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:27:15', '2025-06-07 05:17:13', '2025-06-07 14:17:13'),
(128, 133, 3, '0138/X/2023', 'Cancio Oliveira', '2023-10-04', '77999588', 'Travessa de Villa verde', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:27:29', '2025-06-07 05:17:22', '2025-06-07 14:17:22'),
(129, 134, 7, '0139/X/2023', 'Ir. Adriano de Jejus', '2023-10-05', '77361826', 'Dom Bosco, Comor', 'up to 10', '219.05', '0.00', 'inactive', '2025-06-06 04:27:48', '2025-06-07 05:17:32', '2025-06-07 14:17:32'),
(130, 135, 3, '0140/X/2023', 'Stefan Hlavac - Agiomondo FSP', '2023-10-12', '78844448', 'Motael, Dili', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:28:06', '2025-06-07 05:17:47', '2025-06-07 14:17:47'),
(131, 136, 3, '0141/X/2023', 'Kasma Latif', '2023-10-12', '74227161', 'Kampung Baru', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:28:21', '2025-06-06 04:28:21', NULL),
(132, 137, 3, '0142/X/2023', 'Faysal', '2023-10-13', '77146120', 'Kolmera', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:28:39', '2025-06-07 05:18:07', '2025-06-07 14:18:07'),
(133, 138, 4, '0143/X/2023', 'Diego da Silva Filho', '2023-10-25', '77522448', 'Bemori', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:29:06', '2025-06-07 05:18:18', '2025-06-07 14:18:18'),
(134, 139, 4, '0144/X/2023', 'Robin Joy Pereira Araujo', '2023-10-25', '77393551', 'Taibessi', 'up to 6', '60.95', '0.00', 'active', '2025-06-06 04:29:22', '2025-06-06 04:29:22', NULL),
(135, 140, 3, '0145/X/2023', 'Faysal', '2023-10-27', '77146120', 'Kolmera', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:29:35', '2025-06-07 05:18:33', '2025-06-07 14:18:33'),
(136, 141, 3, '0146/XI/2023', 'Drs. Rachel', '2023-11-06', '73312345', 'Manleuana', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:29:51', '2025-06-06 04:29:51', NULL),
(137, 142, 3, '0147/XI/2023', 'Mariabelle Lagrisola', '2023-11-08', '78248647', 'Orchard Apartment', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:30:20', '2025-06-06 04:30:20', NULL),
(138, 143, 4, '0148/XII/2023', 'Cristino da Cruz', '2023-12-27', '0', 'Cacaulidun', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:30:37', '2025-06-07 05:18:53', '2025-06-07 14:18:53'),
(139, 144, 3, '0149/XII/2023', 'Cirilo O.F.D. Xavier', '2023-12-29', '77086831', 'Delta 2', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:30:53', '2025-06-06 04:30:53', NULL),
(140, 145, 3, '0150/I/2024', 'Ruben A. Freitas', '2024-01-06', '77297531', 'Surikmas', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:31:46', '2025-06-07 05:19:10', '2025-06-07 14:19:10'),
(141, 146, 3, '0151/I/2024', 'Apolinario Magno', '2024-01-09', '77346834', 'Delta 3', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:32:07', '2025-06-06 04:32:07', NULL),
(142, 147, 4, '0152/I/2024', 'Planet Unipessoal - Marthin Hutajaru', '2024-01-25', '77006677', 'Audian', 'up to 6', '60.95', '0.00', 'active', '2025-06-06 04:32:23', '2025-06-06 04:32:23', NULL),
(143, 148, 4, '0153/II/2024', 'Ankur Anggarwal', '2024-02-16', '77894925', 'House 9, Timor Resort', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:32:52', '2025-06-07 05:19:31', '2025-06-07 14:19:31'),
(144, 149, 3, '0154/III/2024', 'Paul Herbert Mas', '2024-03-09', '73147506', 'Fomento II', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:33:08', '2025-06-06 04:33:08', NULL),
(145, 150, 7, '0155/III/2024', 'Pe. Gui do Carmo da Silva', '2024-03-09', '77239133', 'Dom Bosco, Comoro', 'up to 10', '219.05', '0.00', 'active', '2025-06-06 04:33:22', '2025-06-07 05:20:13', NULL),
(146, 151, 3, '0156/IV/2024', 'Zac Jones', '2024-04-16', '+61410660508', 'Timor Resort', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:33:37', '2025-06-07 05:20:33', '2025-06-07 14:20:33'),
(147, 152, 3, '0157/IV/2024', 'Jenifer Octavia Tjung Miady', '2024-04-22', '73854783', 'Fatuhada', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:33:57', '2025-06-06 04:33:57', NULL),
(148, 153, 3, '0158/V/2024', 'Zezinha Natalina Filomeno Ferreira Gusmao', '2024-05-02', '77048458', 'Villa verde', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:34:16', '2025-06-06 04:34:16', NULL),
(149, 154, 3, '0159/V/2024', 'Teotonio J. Fraga', '2024-05-07', '73252989', 'Fomento III', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:34:35', '2025-06-06 04:34:35', NULL),
(150, 155, 3, '0160/V/2024', 'Nyoto Irawan', '2024-05-28', '77428765', 'Audian, Dili', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:34:51', '2025-06-06 04:34:51', NULL),
(151, 156, 5, '0161/VII/2024', 'Partido CNRT', '2024-07-06', '73222137', 'Bairro dos Grilhos', 'up to 6', '123.81', '0.00', 'active', '2025-06-06 04:35:10', '2025-06-26 16:54:28', NULL),
(152, 157, 3, '0162/VII/2024', 'Teotonio J. Fraga Gautulu 2', '2024-07-11', '73252989', 'Fomento III', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:35:28', '2025-06-07 05:20:54', '2025-06-07 14:20:54'),
(153, 158, 4, '0163/VII/2024', 'Osorio Babo', '2024-07-13', '77264940', 'Paroquia Maria Auxiliadora, Comoro', 'up to 6', '60.95', '0.00', 'active', '2025-06-06 04:35:49', '2025-06-06 04:35:49', NULL),
(154, 159, 3, '0164/VII/2024', 'Joaozito Viana', '2024-07-18', '77304489', 'Au-hun, Becora', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:36:18', '2025-06-06 04:36:18', NULL),
(155, 160, 3, '0165/VII/2024', 'Kiki Chairani', '2024-07-23', '74749092', 'Orchard Apartment, Bemori', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:36:31', '2025-06-06 04:36:31', NULL),
(156, 161, 3, '0166/VIII/2024', 'Anna Perrin', '2024-08-08', '75318105', 'Timor Resort, House #54', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:36:47', '2025-06-07 05:21:12', '2025-06-07 14:21:12'),
(157, 162, 3, '0167/VIII/2024', 'Ali Ahmad Khan', '2024-08-13', '+923224708848', 'Timor Resort, House #53', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:37:08', '2025-06-07 05:21:23', '2025-06-07 14:21:23'),
(158, 163, 3, '0168/VIII/2024', 'James Wicken', '2024-08-23', '78322862', 'Timor Resort, House #3', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:37:20', '2025-06-07 05:21:51', '2025-06-07 14:21:51'),
(159, 164, 4, '0169/IX/2024', 'M. Suhail Sahan', '2024-09-01', '77266619', 'JL. Villa', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:37:39', '2025-06-07 05:22:04', '2025-06-07 14:22:04'),
(160, 165, 3, '0170/IX/2024', 'Woo Su Jeong', '2024-09-02', '77859103', 'Vila Mataruak (Vila 5)', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:38:02', '2025-06-06 04:38:02', NULL),
(161, 166, 3, '0171/IX/2024', 'Nabil Ali', '2024-09-05', '78316126', 'Timor Resort, House #36', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:38:23', '2025-06-06 04:38:23', NULL),
(162, 167, 3, '0172/IX/2024', 'Shannon Bruncat', '2024-09-05', '78609005', 'Timor Resort, House #55', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:38:40', '2025-06-06 04:38:40', NULL),
(163, 168, 3, '0173/IX/2024', 'Fakri Karim', '2024-09-16', '73672333', 'Timor Resort, House #52', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:39:01', '2025-06-06 04:39:01', NULL),
(164, 169, 4, '0174/IX/2024', 'Cleofas Vidal Maria de Aurajo', '2024-09-27', '78277388', 'Kolmera', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:39:16', '2025-06-07 05:22:29', '2025-06-07 14:22:29'),
(165, 170, 6, '0175/X/2024', 'Ir. Adriano de Jejus', '2024-10-07', '77361826', 'Dom Bosco, Comoro', 'up to 8', '123.81', '0.00', 'inactive', '2025-06-06 04:39:55', '2025-06-07 05:22:41', '2025-06-07 14:22:41'),
(166, 171, 4, '0176/XI/2024', 'Arry Prastyo', '2024-11-05', '77445123', 'Hudi Laran', 'up to 6', '60.95', '0.00', 'active', '2025-06-06 04:40:10', '2025-07-04 04:46:55', NULL),
(167, 172, 3, '0177/XI/2024', 'Thanachai Wachiraworakam', '2024-11-07', '76191779', 'Timor Resort, House #4', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:40:29', '2025-06-07 05:23:12', '2025-06-07 14:23:12'),
(168, 173, 3, '0178/XI/2024', 'Chandan Razak', '2024-11-07', '77996786', 'Kolmera', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:40:44', '2025-06-07 05:23:22', '2025-06-07 14:23:22'),
(169, 174, 3, '0179/XI/2024', 'Dwi Prasetio', '2024-11-19', '73312345', 'Taibessi', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:43:18', '2025-06-06 04:43:18', NULL),
(170, 175, 2, '0180/I/2025', 'Hallie Sohyun Jeon', '2025-01-20', '+32493923611', 'Menoa Apartment 7B, Bemori', 'up to 4', '23.81', '0.00', 'active', '2025-06-06 04:43:45', '2025-06-08 20:55:46', NULL),
(171, 176, 3, '0181/II/2025', 'Marcelino Oliveira Neves', '2025-02-04', '77838882', 'Bebonuk Tuty 20 de Setembro', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:44:02', '2025-07-03 22:31:17', '2025-07-04 07:31:17'),
(172, 177, 3, '0182/II/2025', 'Juliao A.X. Carlos', '2025-02-06', '74048280', 'Sao Miguel, Aimutin', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:44:13', '2025-07-03 22:31:31', '2025-07-04 07:31:31'),
(173, 178, 3, '0183/II/2025', 'Helder Eduardo Brites', '2025-02-06', '77940099', 'Aimutin Centro', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:44:28', '2025-07-03 22:31:45', '2025-07-04 07:31:45'),
(174, 179, 3, '0184/III/2025', 'Juvinal de A. de Jejus', '2025-03-05', '76616458', 'Delta III', 'up to 4', '28.57', '0.00', 'inactive', '2025-06-06 04:44:42', '2025-07-03 22:31:59', '2025-07-04 07:31:59'),
(175, 180, 3, '0185/III/2025', 'Antonio Sarmento', '2025-03-07', '76473875', 'Pantai kelapa', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:44:57', '2025-06-06 04:44:57', NULL),
(176, 181, 3, '0186/III/2025', 'Aloisius Tilman', '2025-03-10', '74550879', 'Delta I', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:45:09', '2025-06-06 04:45:09', NULL),
(177, 182, 4, '0187/III/2025', 'Herry Jaya', '2025-03-19', '78266999', 'Bairro dos Grilhos', 'up to 6', '60.95', '0.00', 'inactive', '2025-06-06 04:45:26', '2025-06-07 05:23:46', '2025-06-07 14:23:46'),
(178, 183, 3, '0188/III/2025', 'Reinaldo Ximenes', '2025-03-15', '77281211', 'Manleuana', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:45:42', '2025-06-06 04:45:42', NULL),
(179, 184, 3, '0189/III/2025', 'Marlin Ribeiro', '2025-03-19', '77502881', 'Kolmera', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:45:56', '2025-06-06 04:45:56', NULL),
(180, 185, 3, '0190/IV/2025', 'Cristiano da Costa', '2025-04-02', '77243453', 'Manleuana', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:46:07', '2025-06-06 04:46:07', NULL),
(181, 186, 3, '0191/V/2025', 'Geza D. Espiritu', '2025-04-10', '78326885', 'No.8 Avenida Bispo de Madeiros, Dili, Timor-Leste', 'up to 4', '28.57', '0.00', 'active', '2025-06-06 04:46:19', '2025-06-06 04:46:19', NULL),
(184, 187, 9, '0192/IV/2025', 'Partido CNRT', '2025-04-14', '73222137', 'Bairro dos Grillos', '0', '23.81', '0.00', 'active', '2025-06-26 16:59:32', '2025-06-26 16:59:32', NULL),
(185, 189, 10, '0194/VI/2025', 'Francisca Moniz da C. de Jejus', '2025-06-23', '78094328', 'Ai-mutin', 'up to 5', '38.10', '75.00', 'active', '2025-06-26 17:09:16', '2025-06-26 18:00:05', NULL),
(186, 188, 8, '0193/V/2025', 'Pe. Gui do Carmo da Silva', '2025-05-14', '77239133', 'Dom Bosco, Comoro', 'Business Priority Data 500.000', '157.14', '0.00', 'active', '2025-07-01 22:52:02', '2025-07-01 22:52:02', NULL),
(187, 190, 3, '0195/VII/2025', 'Remigio D. Boavida Freitas', '2025-07-03', '75554742', 'Ai-tarak laran', 'up to 4', '28.57', '75.00', 'active', '2025-07-03 22:20:05', '2025-07-03 22:20:05', NULL),
(188, 191, 3, '0196/VII/2025', 'Marcelino Oliveira Neves', '2025-07-03', '77838882', 'Bebonuk Tuty 20 de Setembro', 'up to 4', '28.57', '0.00', 'active', '2025-07-03 22:34:13', '2025-07-03 22:34:13', NULL),
(189, 192, 3, '0197/VII/2025', 'Helder Eduardo Brites', '2025-07-03', '77940099', 'Aimutin Centro', 'up to 4', '28.57', '0.00', 'active', '2025-07-03 22:34:28', '2025-07-03 22:34:28', NULL),
(190, 193, 3, '0198/VII/2025', 'Alvin Sonbay', '2025-07-08', '77743463', 'Bemori', 'up to 4', '28.57', '75.00', 'active', '2025-07-07 21:52:56', '2025-07-07 21:52:56', NULL),
(192, 194, 3, '0199/VII/2025', 'Juliao A.X. Carlos', '2025-07-10', '74048280', 'Sao Miguel, Aimutin', 'up to 4', '28.57', '0.00', 'active', '2025-07-14 05:38:39', '2025-07-14 05:38:39', NULL),
(193, 195, 3, '0200/VII/2025', 'Augusty Ferdinand', '2025-07-15', '+6281290923455', 'Apartment Manleuana', 'up to 4', '28.57', '75.00', 'active', '2025-07-17 18:08:29', '2025-07-17 18:08:29', NULL),
(194, 196, 3, '0201/VII/2025', 'Jakob Oberg', '2025-07-14', '+46734072135', 'Bemori Menoa Apart 7B', 'up to 4', '28.57', '0.00', 'active', '2025-07-21 20:11:35', '2025-07-21 20:11:35', NULL),
(195, 197, 3, '0202/VII/2025', 'Oji Syahroji', '2025-07-22', '75346640', 'Fomento I', 'up to 4', '28.57', '75.00', 'active', '2025-07-28 02:42:45', '2025-07-28 02:42:45', NULL),
(196, 198, 3, '0203/VII/2025', 'Joaozito Viana (Reprezentante Partidu CNRT)', '2025-07-23', '77666647', 'Farol', 'up to 4', '28.57', '75.00', 'active', '2025-07-28 02:43:08', '2025-07-28 02:43:08', NULL),
(197, 199, 3, '0204/VII/2025', 'Jessiebhel Alolor', '2025-07-28', '74774949', 'Aimutin', 'up to 4', '28.57', '75.00', 'active', '2025-07-28 02:43:28', '2025-07-28 02:43:28', NULL),
(198, 200, 8, '0205/VIII/2024', 'Pe. Gui do Carmo da Silva', '2025-08-01', '77239133', 'Dom Bosco Comoro', 'Business Priority Data 500.000', '157.14', '200.00', 'active', '2025-08-14 04:44:34', '2025-08-14 04:44:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likidasauns`
--

CREATE TABLE `likidasauns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `naran` varchar(255) NOT NULL,
  `deskrisaun` varchar(255) NOT NULL,
  `metodu_pagamentu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `montante` decimal(10,2) NOT NULL,
  `selu` decimal(10,2) NOT NULL DEFAULT 0.00,
  `data_likidasaun` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likidasauns`
--

INSERT INTO `likidasauns` (`id`, `naran`, `deskrisaun`, `metodu_pagamentu_id`, `invoice_id`, `montante`, `selu`, `data_likidasaun`, `created_at`, `updated_at`) VALUES
(1, 'Francisco Tilman Cepede', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 58, '40.00', '40.00', '2025-06-02', '2025-06-20 03:31:59', '2025-07-26 04:37:03'),
(2, 'Odete Soares S. da Costa', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 31, '40.00', '40.00', '2025-06-09', '2025-06-20 03:32:34', '2025-06-20 03:32:34'),
(3, 'Pe. Jose Dwight, SDB', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 34, '27.50', '27.50', '2025-06-11', '2025-06-20 03:33:49', '2025-06-20 03:33:49'),
(4, 'Rudy', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 39, '40.00', '40.00', '2025-06-11', '2025-06-20 03:34:25', '2025-06-20 03:34:25'),
(5, 'Khoirul Umam', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 40, '40.00', '40.00', '2025-06-11', '2025-06-20 03:35:00', '2025-06-20 03:35:00'),
(6, 'Hermawan', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 50, '40.00', '40.00', '2025-06-11', '2025-06-20 03:35:26', '2025-06-20 03:35:26'),
(7, 'Jenifer Octavia Tjung Miady', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 71, '40.00', '40.00', '2025-06-11', '2025-06-20 03:35:54', '2025-06-20 03:35:54'),
(8, 'Teotonio J. Fraga', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 73, '40.00', '40.00', '2025-06-11', '2025-06-20 03:37:14', '2025-06-20 03:37:14'),
(9, 'Nyoto Irawan', 'Fornesimentu Servisu Internet fulan June tinan 2025', 2, 74, '40.00', '40.00', '2025-06-11', '2025-06-20 03:37:49', '2025-06-20 03:37:49'),
(10, 'Cristiano da Costa', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 94, '40.00', '40.00', '2025-06-11', '2025-06-20 03:38:12', '2025-06-20 03:38:12'),
(11, 'Cirilo O.F.D. Xavier', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 66, '40.00', '40.00', '2025-06-13', '2025-06-20 03:38:53', '2025-06-20 03:38:53'),
(12, 'Nabil Ali', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 80, '40.00', '40.00', '2025-06-13', '2025-06-20 03:39:18', '2025-06-20 03:39:18'),
(13, 'Shannon Bruncat', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 81, '40.00', '40.00', '2025-06-13', '2025-06-20 03:39:44', '2025-06-20 03:39:44'),
(14, 'Geza D. Espiritu', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 95, '40.00', '40.00', '2025-06-13', '2025-06-20 03:40:02', '2025-06-20 03:40:02'),
(15, 'Planet Unipessoal - Marthin Hutajaru', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 68, '80.00', '80.00', '2025-06-16', '2025-06-20 03:41:38', '2025-06-20 03:41:38'),
(16, 'Joseph Francis - JJJ Associates Timor Lda', 'Fornesimentu Servisu Internet fulan June tinan 2025', 2, 57, '40.00', '40.00', '2025-06-17', '2025-06-20 03:52:42', '2025-06-20 03:52:42'),
(17, 'Joaozito Viana', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 77, '40.00', '40.00', '2025-06-17', '2025-06-20 03:53:10', '2025-06-20 03:53:10'),
(18, 'Fakri Karim', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 82, '40.00', '40.00', '2025-06-18', '2025-06-20 03:53:39', '2025-06-20 03:53:39'),
(19, 'C.N. Haricharan', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 52, '40.00', '31.00', '2025-06-20', '2025-06-20 04:00:06', '2025-06-20 04:00:06'),
(20, 'Jose Menezes da Costa', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 33, '40.00', '40.00', '2025-06-25', '2025-06-26 16:39:02', '2025-06-26 16:39:02'),
(21, 'Agatha Indah Kurnia da Costa', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 41, '40.00', '40.00', '2025-06-25', '2025-06-26 16:39:27', '2025-06-26 16:39:27'),
(22, 'Rony Wirawan', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 47, '80.00', '80.00', '2025-06-25', '2025-06-26 16:48:39', '2025-06-26 16:48:39'),
(23, 'Rony Wirawan', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 49, '80.00', '80.00', '2025-06-25', '2025-06-26 16:49:08', '2025-06-26 16:49:08'),
(24, 'Narabey Totobola - Rony Wirawan', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 60, '80.00', '80.00', '2025-06-25', '2025-06-26 16:49:39', '2025-06-26 16:49:39'),
(25, 'Arry Prastyo', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 83, '80.00', '80.00', '2025-06-25', '2025-06-26 16:50:24', '2025-06-26 16:50:24'),
(26, 'Venancio Pinto', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 75, '155.00', '155.00', '2025-06-26', '2025-06-26 16:55:40', '2025-06-26 16:55:40'),
(27, 'Partido CNRT', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 96, '25.00', '25.00', '2025-06-27', '2025-06-26 17:00:49', '2025-06-26 17:00:49'),
(28, 'Francisca Moniz da C. de Jejus', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 97, '50.00', '50.00', '2025-06-27', '2025-06-26 18:03:04', '2025-06-26 18:03:04'),
(29, 'Reinaldo Ximenes', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 92, '40.00', '40.00', '2025-07-02', '2025-07-01 22:50:56', '2025-07-01 22:50:56'),
(30, 'Pe. Gui do Carmo da Silva', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 98, '165.00', '165.00', '2025-07-02', '2025-07-01 22:54:34', '2025-07-01 22:54:34'),
(31, 'Osorio Babo', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 76, '80.00', '80.00', '2025-07-04', '2025-07-03 22:23:50', '2025-07-03 22:23:50'),
(33, 'Marlin Ribeiro', 'Fornesimentu Servisu Internet fulan June tinan 2025', 2, 93, '40.00', '40.00', '2025-07-03', '2025-07-03 23:02:15', '2025-07-03 23:02:15'),
(34, 'Marlin Ribeiro', 'Fornesimentu Servisu Internet fulan July tinan 2025', 2, 158, '40.00', '40.00', '2025-07-04', '2025-07-03 23:02:32', '2025-07-03 23:02:32'),
(35, 'Leonel Hornai da Cruz', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 44, '40.00', '40.00', '2025-06-30', '2025-07-03 23:05:24', '2025-07-03 23:05:24'),
(36, 'Jose Reali', 'Fornesimentu Servisu Internet fulan June tinan 2025', 2, 51, '40.00', '40.00', '2025-06-30', '2025-07-03 23:05:47', '2025-07-03 23:05:47'),
(37, 'Juvinal de A. de Jejus', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 89, '40.00', '40.00', '2025-07-07', '2025-07-07 18:56:16', '2025-07-07 18:56:16'),
(38, 'Francisco Tilman Cepede', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 125, '40.00', '40.00', '2025-07-07', '2025-07-07 18:56:52', '2025-07-07 18:56:52'),
(39, 'Alvin Sonbay', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 165, '40.00', '40.00', '2025-07-08', '2025-07-07 21:58:36', '2025-07-07 21:58:36'),
(40, 'Apolinario Magno', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 67, '40.00', '40.00', '2025-07-09', '2025-07-14 21:59:55', '2025-07-14 21:59:55'),
(41, 'Romeu da Conceicao Costa', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 54, '40.00', '40.00', '2025-07-09', '2025-07-14 22:01:12', '2025-07-14 22:01:12'),
(42, 'Detile Consultant', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 59, '150.00', '150.00', '2025-07-09', '2025-07-14 22:03:46', '2025-07-14 22:03:46'),
(43, 'Yudiy Kurniawan', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 56, '40.00', '40.00', '2025-07-10', '2025-07-14 22:04:27', '2025-07-14 22:04:27'),
(44, 'Jenifer Octavia Tjung Miady', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 137, '40.00', '40.00', '2025-07-10', '2025-07-14 22:05:03', '2025-07-14 22:05:03'),
(45, 'Ir.Adriano de Jejus', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 43, '80.00', '80.00', '2025-07-10', '2025-07-14 22:05:28', '2025-07-14 22:05:28'),
(46, 'Hermawan', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 119, '40.00', '40.00', '2025-07-10', '2025-07-14 22:05:55', '2025-07-14 22:05:55'),
(47, 'Rudy', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 109, '40.00', '40.00', '2025-07-10', '2025-07-14 22:06:21', '2025-07-14 22:06:21'),
(48, 'Feliciano J.G. Aleixo', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 45, '40.00', '40.00', '2025-07-10', '2025-07-14 22:07:06', '2025-07-14 22:07:06'),
(49, 'Khoirul Umam', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 110, '40.00', '40.00', '2025-07-10', '2025-07-14 22:07:45', '2025-07-14 22:07:45'),
(50, 'Hallie Sohyun Jeon', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 85, '35.00', '35.00', '2025-07-10', '2025-07-14 22:11:02', '2025-07-14 22:11:02'),
(51, 'Odete Soares S. da Costa', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 100, '40.00', '40.00', '2025-07-10', '2025-07-14 22:11:59', '2025-07-14 22:11:59'),
(52, 'Geza D. Espiritu', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 160, '40.00', '40.00', '2025-07-14', '2025-07-14 22:14:22', '2025-07-14 22:14:22'),
(53, 'Zezinho Gusmao', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 48, '80.00', '80.00', '2025-07-14', '2025-07-14 22:14:48', '2025-07-14 22:14:48'),
(54, 'Aloisius Tilman', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 91, '40.00', '40.00', '2025-07-15', '2025-07-14 22:16:32', '2025-07-14 22:16:32'),
(55, 'Edgar Lawrence Uedo', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 42, '40.00', '40.00', '2025-07-15', '2025-07-14 22:16:54', '2025-07-14 22:16:54'),
(56, 'Paul Herbert Mas', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 69, '40.00', '40.00', '2025-07-15', '2025-07-14 22:17:19', '2025-07-14 22:17:19'),
(57, 'Edgar Lawrence Uedo', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 108, '40.00', '40.00', '2025-07-15', '2025-07-14 22:17:47', '2025-07-14 22:17:47'),
(58, 'Paul Herbert Mas', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 136, '40.00', '40.00', '2025-07-15', '2025-07-14 22:18:16', '2025-07-14 22:18:16'),
(59, 'Joaozito Viana', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 148, '40.00', '40.00', '2025-07-21', '2025-07-28 02:49:49', '2025-07-28 02:49:49'),
(60, 'Augusty Ferdinand', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 167, '40.00', '40.00', '2025-07-21', '2025-07-28 02:50:33', '2025-07-28 02:50:33'),
(61, 'Teotonio J. Fraga', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 144, '40.00', '40.00', '2025-07-21', '2025-07-28 02:51:02', '2025-07-28 02:51:02'),
(62, 'Helder Eduardo Brites', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 88, '40.00', '40.00', '2025-07-23', '2025-07-28 02:53:32', '2025-07-28 02:53:32'),
(63, 'Juliao A.X. Carlos', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 87, '40.00', '40.00', '2025-07-23', '2025-07-28 02:53:51', '2025-07-28 02:53:51'),
(64, 'Marcelino Oliveira Neves', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 86, '40.00', '40.00', '2025-07-23', '2025-07-28 02:54:24', '2025-07-28 02:54:24'),
(65, 'Rony Wirawan', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 118, '80.00', '80.00', '2025-07-23', '2025-07-28 02:55:09', '2025-07-28 02:55:09'),
(66, 'Narabey Totobola - Rony Wirawan', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 127, '80.00', '80.00', '2025-07-23', '2025-07-28 02:55:37', '2025-07-28 02:55:37'),
(67, 'Arry Prastyo', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 153, '150.00', '80.00', '2025-07-23', '2025-07-28 02:56:02', '2025-07-28 02:56:02'),
(68, 'Fundasaun Neo Metin / UNPAZ', 'Fornesimentu Servisu Internet fulan June tinan 2025', 1, 35, '80.00', '80.00', '2025-07-23', '2025-07-28 02:56:22', '2025-07-28 02:56:22'),
(69, 'Fundasaun Neo Metin / UNPAZ', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 104, '80.00', '80.00', '2025-07-23', '2025-07-28 02:56:57', '2025-07-28 02:56:57'),
(70, 'Rony Wirawan', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 116, '80.00', '80.00', '2025-07-23', '2025-07-28 02:57:26', '2025-07-28 02:57:26'),
(71, 'Oji Syahroji', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 169, '40.00', '40.00', '2025-07-24', '2025-07-28 03:00:46', '2025-07-28 03:00:46'),
(72, 'Cristiano da Costa', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 159, '40.00', '40.00', '2025-07-28', '2025-07-28 03:04:12', '2025-07-28 03:04:12'),
(73, 'Cirilo O.F.D. Xavier', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 133, '40.00', '40.00', '2025-07-28', '2025-07-28 03:04:40', '2025-07-28 03:04:40'),
(74, 'Agatha Indah Kurnia da Costa', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 111, '40.00', '40.00', '2025-07-28', '2025-07-28 03:05:17', '2025-07-28 03:05:17'),
(75, 'Jose Menezes da Costa', 'Fornesimentu Servisu Internet fulan July tinan 2025', 1, 102, '40.00', '40.00', '2025-07-28', '2025-07-28 03:05:42', '2025-07-28 03:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `likidasauns_install`
--

CREATE TABLE `likidasauns_install` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `naran` varchar(255) NOT NULL,
  `deskrisaun` varchar(255) NOT NULL,
  `montante` decimal(10,2) NOT NULL,
  `metodu_pagamentu_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_installs_id` bigint(20) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likidasauns_install`
--

INSERT INTO `likidasauns_install` (`id`, `naran`, `deskrisaun`, `montante`, `metodu_pagamentu_id`, `invoice_installs_id`, `data`, `created_at`, `updated_at`) VALUES
(1, 'Francisca Moniz da C. de Jejus', 'Pagamentu ba Instalasaun Internet', '75.00', 1, 16, '2025-06-27', '2025-06-26 18:03:32', '2025-06-26 18:03:32'),
(2, 'Remigio D. Boavida Freitas', 'Pagamentu ba Instalasaun Internet', '75.00', 1, 17, '2025-07-03', '2025-07-03 22:23:08', '2025-07-03 22:23:08'),
(3, 'Alvin Sonbay', 'Pagamentu ba Instalasaun Internet', '75.00', 1, 18, '2025-07-08', '2025-07-07 21:59:01', '2025-07-07 21:59:01'),
(4, 'Augusty Ferdinand', 'Pagamentu ba Instalasaun Internet', '75.00', 1, 19, '2025-07-21', '2025-07-28 03:02:12', '2025-07-28 03:02:12'),
(5, 'Oji Syahroji', 'Pagamentu ba Instalasaun Internet', '75.00', 1, 20, '2025-07-21', '2025-07-28 03:02:46', '2025-07-28 03:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `metodu_pagamentus`
--

CREATE TABLE `metodu_pagamentus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `metodu_selu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metodu_pagamentus`
--

INSERT INTO `metodu_pagamentus` (`id`, `metodu_selu`, `created_at`, `updated_at`) VALUES
(1, 'Cash', '2025-03-27 17:18:39', '2025-03-27 17:18:39'),
(2, 'Transfer husi bank', '2025-03-27 17:19:30', '2025-03-27 17:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2025_01_26_124622_create_pakote_internet_table', 1),
(20, '2025_01_27_053124_update_pakote_internet_table', 1),
(21, '2025_02_04_020828_create_klientes_table', 1),
(22, '2025_02_05_143538_add_nu_telfone_to_klientes_table', 2),
(25, '2025_02_05_144025_add_email_to_klientes_table', 3),
(28, '2025_02_07_151105_rename_pakote_column_in_klientes_table', 4),
(30, '2025_03_11_012504_add_new_columns_to_klientes_table', 5),
(31, '2025_03_12_060359_add_pakote_id_to_klientes_table', 6),
(40, '2025_03_24_025055_create_likidasauns_table', 10),
(48, '2025_03_17_053910_add_kustu_manutensaun_to_pakote_internet_table', 11),
(49, '2025_02_28_024304_create_invoices_table', 12),
(50, '2025_03_20_152238_update_invoices_table_check_kliente_id', 13),
(51, '2025_03_20_155212_change_deskrisaun_column_in_invoices_table', 13),
(52, '2025_03_22_130614_remove_kliente_id_from_invoices', 13),
(80, '2025_03_22_130722_recreate_invoices_table', 14),
(81, '2025_03_22_134252_add_kliente_id_to_invoices_table', 14),
(82, '2025_03_24_005700_create_despezas_table', 15),
(83, '2025_03_24_033124_create_likidasauns_table', 15),
(84, '2025_03_24_034138_drop_likidasauns_table', 15),
(85, '2025_03_24_034750_kria_likidasauns_table', 16),
(86, '2025_03_25_015127_add_tipu_transaksaun_to_likidasauns_table', 16),
(87, '2025_03_27_013303_create_tiputransaksauns_table', 16),
(88, '2025_03_27_030202_add_tiputransaksaun_id_to_despezas_table', 17),
(89, '2025_03_27_030528_remove_tipu_transasaun_from_despezas_table', 18),
(90, '2025_03_28_012936_create_likidasauns_install', 19),
(91, '2025_03_28_014026_create_metodu_pagamentus_table', 20),
(92, '2025_03_28_024842_update_likidasauns_table', 21),
(93, '2025_03_29_011724_remove_columns_from_klientes', 22),
(94, '2025_03_29_012725_remove_pakote_id_from_klientes', 23),
(95, '2025_03_29_021333_create_klientepakotes_table', 24),
(96, '2025_03_29_121203_add_columns_to_kliente_pakotes_table', 25),
(97, '2025_04_01_013855_add_nu_telfone_and_residensia_to_kliente_pakotes_table', 26),
(98, '2025_04_02_142922_add_kliente_pakotes_id_to_invoices_table', 27),
(99, '2025_04_04_034438_create_jobs_table', 28),
(100, '2025_04_04_051952_remove_kapasidade_from_invoices_table', 29),
(101, '2025_04_04_125453_remove_kliente_id_from_invoices_table', 30),
(102, '2025_04_04_132037_add_period_fields_to_invoices_table', 31),
(103, '2025_04_04_143133_add_is_printed_to_invoices_table', 32),
(104, '2025_04_04_153315_add_status_to_kliente_pakotes_table', 33),
(105, '2025_04_05_055839_update_likidasauns_install_table', 34),
(106, '2025_04_05_060120_add_foreign_key_to_likidasauns_install_table', 35),
(107, '2025_04_05_065431_remove_tiputransaksaun_from_likidasauns_install_table', 36),
(108, '2025_04_05_091935_create_invoice_installs_table', 37),
(109, '2025_04_05_100649_add_is_printed_to_invoice_installs_table', 38),
(110, '2025_04_07_025835_update_invoice_installs_table_column_name', 39),
(111, '2025_04_07_033702_rename_kliente_pakote_id_to_kliente_pakotes_id_in_invoice_installs_table', 40),
(112, '2025_04_07_042044_add_period_fields_to_invoice_installs_table', 41),
(113, '2025_04_08_033554_add_timestamps_to_kliente_pakotes_table', 42),
(114, '2025_04_08_033737_add_deactivated_at_to_kliente_pakotes', 43),
(115, '2025_04_08_041738_change_foreign_key_in_likidasauns_table', 44),
(116, '2025_04_08_042327_add_selu_column_to_likidasauns_table', 45),
(117, '2025_04_08_074854_add_naran_to_likidasauns_table', 46),
(118, '2025_04_08_112951_change_foreign_key_in_likidasauns_install_table', 47),
(119, '2025_04_08_114756_add_naran_to_likidasauns_install_table', 48),
(120, '2025_04_09_030336_create_tipu__depositus_table', 49),
(121, '2025_04_09_090319_create_depositus_table', 50),
(122, '2025_04_10_000343_create_status_pagamentus_table', 51),
(123, '2025_04_11_050231_add_instalasaun_columns_to_status_pagamentus', 52),
(124, '2025_04_11_063408_add_month_and_year_to_status_pagamentus_table', 53),
(125, '2025_04_15_121844_make_email_nullable_in_klientes_table', 54),
(126, '2025_04_15_121948_make_nu_telfone_nullable_in_klientes_table', 55),
(127, '2025_04_24_121730_add_foreign_key_to_invoice_installs_id_in_likidasauns_install_table', 56),
(128, '2025_04_24_122442_add_foreign_key_to_tipu_depositu_id_in_depositus_table', 57),
(129, '2025_04_25_023649_create_permission_tables', 58),
(130, '2025_04_26_033028_add_plain_password_to_users_table', 59),
(131, '2025_04_29_032559_add_kategoria_to_klientes_table', 60),
(132, '2025_05_02_082114_add_depositu_husi_ba_to_depositus_table', 61),
(133, '2025_05_03_045021_add_levantamento_to_depositus_table', 62),
(134, '2025_05_04_153233_add_superadmin_to_users_role_enum', 63),
(135, '2025_05_28_155842_add_bank_charge_to_depositus_table', 64),
(136, '2025_06_27_025143_update_presu_precision_in_pakote_internet', 65);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pakote_internet`
--

CREATE TABLE `pakote_internet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pakote` varchar(255) NOT NULL,
  `presu` decimal(10,3) NOT NULL,
  `kapasidade` varchar(255) DEFAULT NULL,
  `kustu_manutensaun` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pakote_internet`
--

INSERT INTO `pakote_internet` (`id`, `pakote`, `presu`, `kapasidade`, `kustu_manutensaun`) VALUES
(1, 'Bronze A', '16.670', 'up to 4', '10.00'),
(2, 'Bronze B', '23.810', 'up to 4', '10.00'),
(3, 'Bronze C', '28.570', 'up to 4', '10.00'),
(4, 'Silver A', '60.950', 'up to 6', '16.00'),
(5, 'Silver B', '123.810', 'up to 6', '25.00'),
(6, 'Gold', '123.810', 'up to 8', '20.00'),
(7, 'Platinum', '219.050', 'up to 10', '25.00'),
(8, 'Starlink', '157.140', 'Business Priority Data 500.000', '0.00'),
(9, 'Public IP Address', '23.810', '0', '0.00'),
(10, 'Bronze D', '38.095', 'up to 5', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'pakote.view', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(2, 'pakote.create', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(3, 'kliente.view', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(4, 'kliente.create', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(5, 'kliente-pakote.view', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(6, 'kliente-pakote.create', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(7, 'invoice.view', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(8, 'invoice.print', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(9, 'transaksaun.view', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(10, 'transaksaun.create', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(11, 'metodu-pagamentu.view', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(12, 'metodu-pagamentu.create', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(13, 'depositu.view', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(14, 'depositu.create', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(15, 'despeza.view', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(16, 'despeza.create', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(17, 'likidasaun.view', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(18, 'likidasaun.create', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(19, 'status-pagamentu.view', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(20, 'relatoriu.view', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(21, 'user.view', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(22, 'user.create', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(2, 'finance', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15'),
(3, 'director', 'web', '2025-04-24 17:40:15', '2025-04-24 17:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(3, 1),
(3, 3),
(4, 1),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(15, 3),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(17, 3),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(20, 2),
(20, 3),
(21, 1),
(21, 3),
(22, 1),
(22, 3);

-- --------------------------------------------------------

--
-- Table structure for table `statuspagamentus`
--

CREATE TABLE `statuspagamentus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nu_ref` varchar(255) NOT NULL,
  `naran` varchar(255) NOT NULL,
  `pakote` varchar(255) NOT NULL,
  `new_installation` decimal(10,2) NOT NULL DEFAULT 0.00,
  `outstanding_payment` decimal(10,2) NOT NULL DEFAULT 0.00,
  `invoice_fulan` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_faktura` decimal(10,2) NOT NULL DEFAULT 0.00,
  `selu_ona` decimal(10,2) NOT NULL DEFAULT 0.00,
  `data_selu` date DEFAULT NULL,
  `selu_instalasaun` decimal(10,2) NOT NULL DEFAULT 0.00,
  `data_selu_instalasaun` date DEFAULT NULL,
  `iha_devida` decimal(10,2) NOT NULL DEFAULT 0.00,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `kliente_pakotes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_installs_id` bigint(20) UNSIGNED DEFAULT NULL,
  `likidasauns_id` bigint(20) UNSIGNED DEFAULT NULL,
  `likidasauns_install_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tiputransaksauns`
--

CREATE TABLE `tiputransaksauns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipu_transaksaun` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tiputransaksauns`
--

INSERT INTO `tiputransaksauns` (`id`, `tipu_transaksaun`, `created_at`, `updated_at`) VALUES
(1, 'Salario', '2025-03-26 18:53:33', '2025-03-26 18:53:33'),
(3, 'Pulsa Listrik', '2025-03-26 18:54:04', '2025-03-26 18:54:04'),
(4, 'Ekipamentu', '2025-03-26 18:54:14', '2025-03-26 18:54:14'),
(5, 'Pulsa Telfone', '2025-03-27 16:03:45', '2025-03-27 16:03:45'),
(6, 'Selu internet ba Gardamor', '2025-03-30 06:30:04', '2025-03-30 06:30:04'),
(7, 'Manutensaun', '2025-04-08 23:55:56', '2025-04-08 23:55:56'),
(8, 'Materiais eskritoriu', '2025-04-10 03:06:16', '2025-04-10 03:06:16'),
(9, 'Instalasaun', '2025-04-18 05:41:58', '2025-04-18 05:41:58'),
(10, 'Selu taxa', '2025-06-20 04:19:32', '2025-06-20 04:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `tipu__depositus`
--

CREATE TABLE `tipu__depositus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipu_depositu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipu__depositus`
--

INSERT INTO `tipu__depositus` (`id`, `tipu_depositu`, `created_at`, `updated_at`) VALUES
(1, 'Brangkas\r\n', '2025-05-01 21:07:46', '2025-05-01 21:07:46'),
(2, 'Cashier\r\n', '2025-05-01 21:08:02', '2025-05-01 21:08:02'),
(3, 'Bank (BNU)', '2025-05-01 21:08:18', '2025-05-01 21:08:18'),
(4, 'Koperasi (HTM)', '2025-05-01 21:08:33', '2025-05-01 21:08:33'),
(5, 'Transfer husi kliente', NULL, NULL),
(6, 'Bank Charge', '2025-05-28 06:35:27', '2025-05-28 06:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `plain_password` varchar(255) DEFAULT NULL,
  `role` enum('superadmin','admin','finansas','diretor') DEFAULT 'admin',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `plain_password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Jacinta', 'jcinta@gmail.com', NULL, '$2y$12$cdmum/s9GDy4xdXf33DECe3eJtdA6hv.kXbEHQZPLZ8F0aL/5Ic5G', NULL, 'finansas', NULL, '2025-04-25 18:52:34', '2025-04-25 18:52:34'),
(7, 'Gloria', 'glriadomenica@gmail.com', NULL, '$2y$12$qulnXYtNgPNt13ScylbX0e0aXFeZVCJ6mD005g0bW6to4qcaFX6/O', NULL, 'admin', NULL, '2025-04-25 18:53:06', '2025-04-25 18:53:06'),
(8, 'Gregorio', 'gfdasilva@gmail.com', NULL, '$2y$12$zZ76.8XR0y153uTzIbdPreb/mxtpVdkONiAlp0.wq/.7NIuPnR7Hu', NULL, 'diretor', NULL, '2025-04-25 18:58:52', '2025-04-25 18:58:52'),
(9, 'Maria', 'admin@gmail.com', NULL, '$2y$12$Fvrt1vbaBkZYwv0B4skT6.rD2ohqZvHHCWJbQj2/XyK6eroYXkfX.', NULL, 'superadmin', NULL, '2025-05-04 06:35:14', '2025-05-04 06:35:14'),
(10, 'clelia', 'frosario@gmail.com', NULL, '$2y$12$hr9.oJ7BrsTKuqnXf8jzWOnz8yCF2Swdp17jeOc17Gn5M6cmImfw6', NULL, 'admin', NULL, '2025-08-24 17:53:36', '2025-08-24 17:53:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `depositus`
--
ALTER TABLE `depositus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `depositus_tipu_depositu_husi_id_foreign` (`tipu_depositu_husi_id`),
  ADD KEY `depositus_tipu_depositu_ba_id_foreign` (`tipu_depositu_ba_id`);

--
-- Indexes for table `despezas`
--
ALTER TABLE `despezas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `despezas_tiputransaksaun_id_foreign` (`tiputransaksaun_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_kliente_pakotes_id_foreign` (`kliente_pakotes_id`);

--
-- Indexes for table `invoice_installs`
--
ALTER TABLE `invoice_installs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_installs_nu_ref_unique` (`nu_ref`),
  ADD KEY `invoice_installs_kliente_pakotes_id_foreign` (`kliente_pakotes_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `klientes`
--
ALTER TABLE `klientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `klientes_nu_ref_unique` (`nu_ref`);

--
-- Indexes for table `kliente_pakotes`
--
ALTER TABLE `kliente_pakotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kliente_pakotes_kliente_id_foreign` (`kliente_id`),
  ADD KEY `kliente_pakotes_pakote_id_foreign` (`pakote_id`);

--
-- Indexes for table `likidasauns`
--
ALTER TABLE `likidasauns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likidasauns_metodu_pagamentu_id_foreign` (`metodu_pagamentu_id`),
  ADD KEY `likidasauns_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `likidasauns_install`
--
ALTER TABLE `likidasauns_install`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likidasauns_install_metodu_pagamentu_id_foreign` (`metodu_pagamentu_id`),
  ADD KEY `likidasauns_install_invoice_installs_id_foreign` (`invoice_installs_id`);

--
-- Indexes for table `metodu_pagamentus`
--
ALTER TABLE `metodu_pagamentus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `metodu_pagamentus_metodu_selu_unique` (`metodu_selu`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `pakote_internet`
--
ALTER TABLE `pakote_internet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `statuspagamentus`
--
ALTER TABLE `statuspagamentus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statuspagamentus_kliente_pakotes_id_foreign` (`kliente_pakotes_id`),
  ADD KEY `statuspagamentus_invoice_id_foreign` (`invoice_id`),
  ADD KEY `statuspagamentus_invoice_installs_id_foreign` (`invoice_installs_id`),
  ADD KEY `statuspagamentus_likidasauns_id_foreign` (`likidasauns_id`),
  ADD KEY `statuspagamentus_likidasauns_install_id_foreign` (`likidasauns_install_id`);

--
-- Indexes for table `tiputransaksauns`
--
ALTER TABLE `tiputransaksauns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tiputransaksauns_tipu_transaksaun_unique` (`tipu_transaksaun`);

--
-- Indexes for table `tipu__depositus`
--
ALTER TABLE `tipu__depositus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipu__depositus_tipu_depositu_unique` (`tipu_depositu`);

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
-- AUTO_INCREMENT for table `depositus`
--
ALTER TABLE `depositus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `despezas`
--
ALTER TABLE `despezas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `invoice_installs`
--
ALTER TABLE `invoice_installs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klientes`
--
ALTER TABLE `klientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `kliente_pakotes`
--
ALTER TABLE `kliente_pakotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `likidasauns`
--
ALTER TABLE `likidasauns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `likidasauns_install`
--
ALTER TABLE `likidasauns_install`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `metodu_pagamentus`
--
ALTER TABLE `metodu_pagamentus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `pakote_internet`
--
ALTER TABLE `pakote_internet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statuspagamentus`
--
ALTER TABLE `statuspagamentus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiputransaksauns`
--
ALTER TABLE `tiputransaksauns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tipu__depositus`
--
ALTER TABLE `tipu__depositus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `depositus`
--
ALTER TABLE `depositus`
  ADD CONSTRAINT `depositus_tipu_depositu_ba_id_foreign` FOREIGN KEY (`tipu_depositu_ba_id`) REFERENCES `tipu__depositus` (`id`),
  ADD CONSTRAINT `depositus_tipu_depositu_husi_id_foreign` FOREIGN KEY (`tipu_depositu_husi_id`) REFERENCES `tipu__depositus` (`id`);

--
-- Constraints for table `despezas`
--
ALTER TABLE `despezas`
  ADD CONSTRAINT `despezas_tiputransaksaun_id_foreign` FOREIGN KEY (`tiputransaksaun_id`) REFERENCES `tiputransaksauns` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_kliente_pakotes_id_foreign` FOREIGN KEY (`kliente_pakotes_id`) REFERENCES `kliente_pakotes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_installs`
--
ALTER TABLE `invoice_installs`
  ADD CONSTRAINT `invoice_installs_kliente_pakotes_id_foreign` FOREIGN KEY (`kliente_pakotes_id`) REFERENCES `kliente_pakotes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kliente_pakotes`
--
ALTER TABLE `kliente_pakotes`
  ADD CONSTRAINT `kliente_pakotes_kliente_id_foreign` FOREIGN KEY (`kliente_id`) REFERENCES `klientes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kliente_pakotes_pakote_id_foreign` FOREIGN KEY (`pakote_id`) REFERENCES `pakote_internet` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likidasauns`
--
ALTER TABLE `likidasauns`
  ADD CONSTRAINT `likidasauns_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likidasauns_metodu_pagamentu_id_foreign` FOREIGN KEY (`metodu_pagamentu_id`) REFERENCES `metodu_pagamentus` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `likidasauns_install`
--
ALTER TABLE `likidasauns_install`
  ADD CONSTRAINT `likidasauns_install_invoice_installs_id_foreign` FOREIGN KEY (`invoice_installs_id`) REFERENCES `invoice_installs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likidasauns_install_metodu_pagamentu_id_foreign` FOREIGN KEY (`metodu_pagamentu_id`) REFERENCES `metodu_pagamentus` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `statuspagamentus`
--
ALTER TABLE `statuspagamentus`
  ADD CONSTRAINT `statuspagamentus_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `statuspagamentus_invoice_installs_id_foreign` FOREIGN KEY (`invoice_installs_id`) REFERENCES `invoice_installs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `statuspagamentus_kliente_pakotes_id_foreign` FOREIGN KEY (`kliente_pakotes_id`) REFERENCES `kliente_pakotes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `statuspagamentus_likidasauns_id_foreign` FOREIGN KEY (`likidasauns_id`) REFERENCES `likidasauns` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `statuspagamentus_likidasauns_install_id_foreign` FOREIGN KEY (`likidasauns_install_id`) REFERENCES `likidasauns_install` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
