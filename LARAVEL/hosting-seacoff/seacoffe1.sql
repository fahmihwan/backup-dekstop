-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 17, 2022 at 05:07 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seacoffe1`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kasir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meja_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pemesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pemesanan` enum('order','waiting','finish') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_harga` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `uang_tunai` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_orders`
--

INSERT INTO `detail_orders` (`id`, `kasir`, `email`, `nota`, `meja_id`, `nama`, `id_transaksi`, `id_pemesanan`, `status_pemesanan`, `status_pembayaran`, `tipe_pembayaran`, `kode_pembayaran`, `pdf_url`, `total_harga`, `ppn`, `total_bayar`, `uang_tunai`, `kembalian`, `created_at`, `updated_at`) VALUES
(1, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022000114E', 2, 'fahmi', 'cca62a18-08a5-40f5-8fe3-548b802bbf63', '359971859', 'order', 'pending', 'qris', NULL, NULL, 20000, 2000, 22000, NULL, NULL, '2022-08-14 08:47:27', '2022-08-14 08:47:27'),
(2, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022000214E', 2, 'tes fahmi', '72e19a98-3cd9-4b7d-a268-60d26bec62ba', '1422261051', 'order', 'pending', 'qris', NULL, NULL, 20000, 2000, 22000, NULL, NULL, '2022-08-14 09:01:09', '2022-08-14 09:01:09'),
(4, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022000314E', 2, 'fahmi1', '8043068a-c94e-4135-9e9d-4985cbd64ebe', '1989739174', 'order', 'pending', 'gopay', NULL, NULL, 40000, 4000, 44000, NULL, NULL, '2022-08-14 09:11:03', '2022-08-14 09:11:03'),
(5, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022000414E', 2, 'fahmi2', '61433135-f591-4f6b-bf21-b008754dfe3e', '1183493465', 'order', 'pending', 'gopay', NULL, NULL, 40000, 4000, 44000, NULL, NULL, '2022-08-14 09:12:02', '2022-08-14 09:12:02'),
(6, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022000514E', 2, 'fahmi3', '97ac4026-9122-4f7a-b807-0603ddf5def5', '1368596664', 'finish', 'pending', 'qris', NULL, NULL, 20000, 2000, 22000, NULL, NULL, '2022-08-14 09:13:51', '2022-08-14 09:13:51'),
(7, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022000614E', 3, 'daris', '80efaa14-10a1-4c4f-aa46-8ed2d51e7b4e', '2040558531', 'order', 'pending', 'qris', NULL, NULL, 40000, 4000, 44000, NULL, NULL, '2022-08-14 12:07:02', '2022-08-14 12:40:35'),
(8, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022000714E', 3, 'fahmi', '9de6eb6a-5ec6-4c67-a087-12d217bea88e', '1810741987', 'finish', 'pending', 'bank_transfer', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/5c3c0e94-a0cf-44de-a290-dc32ad90ee88/pdf', 80000, 8000, 88000, NULL, NULL, '2022-08-14 12:54:45', '2022-08-14 12:56:06'),
(9, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022000815E', 3, 'fahmi', 'd66d1728-cbdf-451d-9984-9bb5e4868f05', '2059912083', 'waiting', 'pending', 'qris', NULL, NULL, 40000, 4000, 44000, NULL, NULL, '2022-08-14 18:12:44', '2022-08-14 18:17:13'),
(10, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022000915E', 3, 'daris', 'e6a5688d-8ae1-4c8b-aebc-87cfb6199331', '1771907285', 'finish', 'pending', 'gopay', NULL, NULL, 20000, 2000, 22000, NULL, NULL, '2022-08-14 18:13:11', '2022-08-14 18:17:08'),
(11, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022001015E', 3, 'faishal', '9807bd9e-1c27-4557-b410-b8a93d81bc6e', '1485837738', 'waiting', 'pending', 'gopay', NULL, NULL, 60000, 6000, 66000, NULL, NULL, '2022-08-15 05:28:14', '2022-08-15 05:29:10'),
(12, 'fahmi', NULL, 'SC08-2022001115C', 1, 'fajar', '0', '0', 'order', 'success', 'cash', NULL, NULL, 56000, 5600, 61600, 100000, 38400, '2022-08-15 07:00:05', '2022-08-15 07:00:05'),
(13, 'fahmi', NULL, 'SC08-2022001215C', 1, 'dewa', '0', '0', 'order', 'success', 'cash', NULL, NULL, 56000, 5600, 61600, 100000, 38400, '2022-08-15 07:00:07', '2022-08-15 07:00:07'),
(14, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022001315E', 3, 'brian', '890ec6a0-d80a-4526-b9e2-db829075dc99', '11968651', 'order', 'pending', 'gopay', NULL, NULL, 76000, 7600, 83600, NULL, NULL, '2022-08-15 07:29:09', '2022-08-15 07:29:09'),
(15, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022001415E', 2, 'fahmi', '41299ff6-724d-4d57-aac9-6d414251aecd', '737850776', 'order', 'pending', 'gopay', NULL, NULL, 60000, 6000, 66000, NULL, NULL, '2022-08-15 14:07:10', '2022-08-15 14:07:10'),
(16, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022001515E', 2, 'andre', 'b873459f-e544-4d42-b1e2-0e9b0938fac9', '1668042838', 'order', 'pending', 'gopay', NULL, NULL, 40000, 4000, 44000, NULL, NULL, '2022-08-15 14:17:12', '2022-08-15 14:17:12'),
(17, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022001615E', 4, 'fahmi', '328df9c7-a936-4a5b-a556-b6dc1f959cd6', '44932459', 'order', 'pending', 'gopay', NULL, NULL, 40000, 4000, 44000, NULL, NULL, '2022-08-15 15:25:44', '2022-08-15 15:25:44'),
(18, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022001715E', 4, 'daris', 'e7faae3d-858d-4c19-ac42-51e35bac900b', '445090929', 'order', 'pending', 'bank_transfer', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/0e55aa43-37de-4b88-ac15-2f25f0147524/pdf', 98000, 9800, 107800, NULL, NULL, '2022-08-15 15:26:10', '2022-08-15 15:26:10'),
(19, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022001816E', 4, 'fahmi', '2fdf8226-f2c2-4282-932e-417bea6ccd34', '523177232', 'finish', 'pending', 'gopay', NULL, NULL, 84000, 8400, 92400, NULL, NULL, '2022-08-15 17:21:06', '2022-08-15 17:45:50'),
(20, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022001916E', 4, 'azka', '3ca3049b-8acf-4edc-b3f6-8a23c98bacde', '1069974927', 'finish', 'pending', 'qris', NULL, NULL, 74000, 7400, 81400, NULL, NULL, '2022-08-15 17:41:55', '2022-08-15 17:46:04'),
(21, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022002016E', 5, 'angga', 'ee2f594c-fd00-41e1-ad14-9d1b47d7573e', '1748615517', 'finish', 'pending', 'gopay', NULL, NULL, 80000, 8000, 88000, NULL, NULL, '2022-08-16 00:59:08', '2022-08-16 01:01:54'),
(22, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022002116E', 5, 'zaky', '9942ccc3-fba4-4b36-8c25-54ad94cb4a19', '1130871881', 'finish', 'pending', 'qris', NULL, NULL, 54000, 5400, 59400, NULL, NULL, '2022-08-16 00:59:49', '2022-08-16 01:02:11'),
(23, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022002216E', 5, 'daffa', 'cc1d70cf-797c-4551-bfad-2bf290143e84', '1246803554', 'finish', 'pending', 'bank_transfer', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/7e7a1116-5ffc-4388-b081-413becc3556f/pdf', 28000, 2800, 30800, NULL, NULL, '2022-08-16 01:00:34', '2022-08-16 01:10:28'),
(24, 'fahmi', NULL, 'SC08-2022002316C', 1, 'syabrina', '0', '0', 'order', 'success', 'cash', NULL, NULL, 36000, 3600, 39600, 50000, 10400, '2022-08-16 01:05:49', '2022-08-16 01:05:49'),
(25, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022002416E', 5, 'sakti', '92a6cfe0-acf5-4d13-af45-107469e5e49a', '709437738', 'order', 'pending', 'qris', NULL, NULL, 20000, 2000, 22000, NULL, NULL, '2022-08-16 01:13:46', '2022-08-16 01:13:46'),
(26, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022002516E', 5, 'edwin', 'f0fc86c2-04ce-46c3-8bc8-73554b8700f9', '1835612489', 'order', 'settlement', 'qris', NULL, NULL, 22000, 2200, 24200, NULL, NULL, '2022-08-16 01:15:30', '2022-08-16 01:15:30'),
(27, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022002616E', 5, 'fahmi', '499c91af-6b8e-4df1-be4e-6823d619112d', '1678629311', 'waiting', 'settlement', 'qris', NULL, NULL, 20000, 2000, 22000, NULL, NULL, '2022-08-16 10:18:43', '2022-08-16 10:21:06'),
(28, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022002716E', 3, 'fahmi', 'd50cd606-e9e3-49bc-a116-99e7c0ae5959', '685129728', 'order', 'pending', 'gopay', NULL, NULL, 40000, 4000, 44000, NULL, NULL, '2022-08-16 16:30:12', '2022-08-16 16:30:12'),
(29, 'customer', 'faishaldzakysajid@gmail.com', 'SC08-2022002817E', 5, 'fahmi', '6fa6aa9e-03af-4a6f-82c7-5a2316a5e407', '1312222255', 'waiting', 'pending', 'gopay', NULL, NULL, 20000, 2000, 22000, NULL, NULL, '2022-08-16 19:47:10', '2022-08-16 20:27:26'),
(30, 'customer', 'fahmiiwan86@gmail.com', 'SC08-2022002917E', 5, 'fahmihwan', '1bf92ce1-31a9-4c0e-8f7b-aed3fd48bba8', '12985091', 'order', 'pending', 'gopay', NULL, NULL, 40000, 4000, 44000, NULL, NULL, '2022-08-17 08:10:31', '2022-08-17 08:10:31'),
(31, 'customer', 'fahmiihwan86@gmail.com', 'SC08-2022003017E', 4, 'andre', 'dde9547c-59a7-4335-8b97-164c4acf1baf', '942817495', 'waiting', 'pending', 'gopay', NULL, NULL, 40000, 4000, 44000, NULL, NULL, '2022-08-17 14:38:15', '2022-08-17 14:52:48'),
(32, 'customer', 'fahmiihwan86@gmail.com', 'SC08-2022003117E', 4, 'fahmi', '24c35392-ca92-45eb-a028-c764712f957c', '1946298390', 'finish', 'pending', 'gopay', NULL, NULL, 40000, 4000, 44000, NULL, NULL, '2022-08-17 14:41:37', '2022-08-17 14:42:27'),
(33, 'customer', 'andre23@getnada.com', 'SC08-2022003217E', 4, 'andrenatash', 'ea4f5ce8-c604-4745-aa87-bb03a78089d2', '1248929317', 'waiting', 'pending', 'qris', NULL, NULL, 18000, 1800, 19800, NULL, NULL, '2022-08-17 14:53:33', '2022-08-17 14:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `image`, `date`, `description`, `created_at`, `updated_at`) VALUES
(1, 'vakansea', 'acara-sea/e2hZg5JXVGuxm8wamAiy5JzUWLaNd4v3ucSDj19P.jpg', '2022-08-12', '<div>Terimakasih kepada Tuhan Yang Maha Esa, semua tim yang bertugas dan teman-teman lainnya yang ikut serta dalam kelancaran acara kemarin. Sampai berjumpa di acara selanjutnya 🖤🖤🖤<br><br>- Pemudaberbakti Rock<br>- My Verns<br>- Startgame<br>- Madiun Bumi Pencak<br>- Dandy Kozmic Blues<br>- Rendra Okta<br>- Daniel Rumbekwan<br>- Handarbeni<br>- Peter O<br>- Kukuh Kudamai<br>- DJ KRK<br><br>Visual Art<br>- Bozki Julleo<br>- Semood Sajang<br>- Jebol Beresiko<br>- Maritim Argaria<br>- Dicka Pahat<br><br>Support by :<br><a href=\"https://www.instagram.com/rentalsoundsystemmadiun/\">@rentalsoundsystemmadiun</a><br><a href=\"https://www.instagram.com/jeproduction_ivent_organizer/\">@jeproduction_ivent_organizer</a><br><a href=\"https://www.instagram.com/lajur_outdoor/\">@lajur_outdoor</a><br><a href=\"https://www.instagram.com/rumahkaryaskattakata/\">@rumahkaryaskattakata</a><br>Midist Event Organizer</div>', '2022-08-15 07:02:33', '2022-08-15 07:02:33'),
(2, 'Pemuda berbakti', 'acara-sea/soVrvYLGoVJlUJ3y69bACiruXbOCEbIL3f6IHVyW.jpg', '2022-08-18', '<div>invasi penuh aksi di acara vakansea yang bertepatan ulang tahun <a href=\"https://www.instagram.com/sea_coff/\">@sea_coff</a> yang ke 2 pada 5-6 maret 2022</div>', '2022-08-15 07:18:47', '2022-08-15 07:18:47'),
(3, 'FOLK SEASOUND', 'acara-sea/Hw7XHG7ide7gx2kmYLh755RfDevRyYH7FijZ7Kms.jpg', '2022-08-15', '<div>Sampai bertemu nanti malam! di <a href=\"https://www.instagram.com/sea_coff/\">@sea_coff</a> bareng kawan kawan kece yang sedang menjalankan ibadah tour mereka, TAKIS!.</div>', '2022-08-15 07:19:55', '2022-08-15 07:19:55'),
(4, 'Day Reaming From Your Bedroom', 'acara-sea/0p8EoLZdlT4v3RCTbCotdI1Bprpa5eEynRf8UW5k.jpg', '2022-08-15', '<div>Teman - teman, apa kabar?<br><br>Berbekal sedikit keberanian, aku mengajak teman-teman untuk datang di Intimate Album Tour pertamaku yang berkolaborasi dengan <a href=\"https://www.instagram.com/sea_coff/\">@sea_coff</a> ☁️<br><br>Jadi, hari Selasa ( 8 Juni 2021 ) bertempat di Sea Coffee (Jalan Kartini No.5 Madiun) pukul 7 malam, aku akan membawakan beberapa lagu dari album pertamaku dan sedikit cerita-cerita🥺🤍✨<br><br>Selain itu, aku akan menjual secara perdana edisi digipack album fisikku!✨<br><br>Untuk album tour pertama ini aku ingin memulai di kota kelahiranku, kota yang sangat dekat di hati, datang ya!<br><br>Akan dimeriahkan juga oleh <a href=\"https://www.instagram.com/yafetkiki/\">@yafetkiki</a> dan <a href=\"https://www.instagram.com/hasta_hita/\">@hasta_hita</a> ☁️<br>Sampai bertemu!✨</div>', '2022-08-15 07:22:43', '2022-08-15 07:22:43');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mejas`
--

CREATE TABLE `mejas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qrcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mejas`
--

INSERT INTO `mejas` (`id`, `nama`, `qrcode`, `created_at`, `updated_at`) VALUES
(1, 'belum dapat meja', 'null', '2022-08-14 07:17:54', '2022-08-14 07:17:54'),
(2, 'meja 1', '084fc062-6aae-4278-bf72-74adf6b0dcaf2022-08-14', '2022-08-14 07:17:56', '2022-08-14 07:17:56'),
(3, 'meja 2', '1ad1372d-8155-4408-b091-5aaa5547c6f32022-08-14', '2022-08-14 12:05:58', '2022-08-14 12:05:58'),
(4, 'meja 3', '34d907c1-cd56-46bf-b284-a2f6d183d0842022-08-15', '2022-08-15 15:24:19', '2022-08-15 15:24:19'),
(5, 'meja 4', '07b23e57-bb89-4a41-90a5-02571afc57402022-08-16', '2022-08-16 00:58:01', '2022-08-16 00:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('hot','ice','snack','food') COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('tersedia','habis') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `nama`, `kategori`, `harga`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'americano', 'hot', 20000, 'foto-deluna/JPXC64dqJIIdSLQ9lcUm0zNR9KrQ0zi4JiUugnSz.jpg', 'tersedia', '2022-08-14 07:14:49', '2022-08-14 07:14:49'),
(2, 'latte', 'hot', 20000, 'foto-deluna/BSBaKMjHSsNo05NyWNXZd1xV4JQpdRMXksJsHPHT.jpg', 'tersedia', '2022-08-15 06:48:46', '2022-08-15 06:48:46'),
(3, 'macha', 'ice', 18000, 'foto-deluna/TevNWwJuHeMWJSANl9cYDNsl1tMds3WFhmzIFVrm.jpg', 'tersedia', '2022-08-15 06:48:59', '2022-08-15 06:48:59'),
(4, 'rice bowl', 'food', 18000, 'foto-deluna/gGArbSMU7dEicjnCfArgSoQSGN13K2oQTGqseALq.jpg', 'tersedia', '2022-08-15 06:49:19', '2022-08-15 06:49:19'),
(5, 'rice bowl chicken', 'food', 18000, 'foto-deluna/5Zl06bTORlVCXERKmpW8k11icsbS0d5JN3iEnZNJ.jpg', 'tersedia', '2022-08-15 06:50:14', '2022-08-15 06:50:14'),
(6, 'creamy latte', 'ice', 22000, 'foto-deluna/YlM2GlggglLvE2D125RI3o7B2u7Z2xiwYeTBvHqz.jpg', 'habis', '2022-08-15 06:50:38', '2022-08-15 06:59:15'),
(7, 'Paket 1', 'food', 28000, 'foto-deluna/RFFv3kJgDdQ8M7ubjeHbSszVN3is0OEgT91IaDss.jpg', 'habis', '2022-08-15 06:51:45', '2022-08-15 06:55:22'),
(8, 'Paket 2', 'food', 28000, 'foto-deluna/JES5rCsjdsuPVf3s5auvxnor4ZR7EMSasrt2z8iJ.jpg', 'tersedia', '2022-08-15 06:54:07', '2022-08-15 06:54:07'),
(9, 'Paket 3', 'snack', 18000, 'foto-deluna/Lj2rbEY3HPQ3ppJjvA6ToQ3GvJe5C2ODsi16KqAl.jpg', 'tersedia', '2022-08-15 06:54:50', '2022-08-15 06:54:50');

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
(5, '2022_03_11_083254_create_mejas_table', 1),
(6, '2022_03_11_083407_create_orders_table', 1),
(7, '2022_03_11_083421_create_menus_table', 1),
(8, '2022_03_19_091814_create_detail_orders_table', 1),
(9, '2022_06_02_195959_create_events_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detail_orders_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `meja_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `detail_orders_id`, `menu_id`, `meja_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 1, '2022-08-14 08:47:27', '2022-08-14 08:47:27'),
(2, 2, 1, 2, 1, '2022-08-14 09:01:09', '2022-08-14 09:01:09'),
(4, 4, 1, 2, 2, '2022-08-14 09:11:03', '2022-08-14 09:11:03'),
(5, 5, 1, 2, 2, '2022-08-14 09:12:02', '2022-08-14 09:12:02'),
(6, 6, 1, 2, 1, '2022-08-14 09:13:51', '2022-08-14 09:13:51'),
(7, 7, 1, 3, 2, '2022-08-14 12:07:02', '2022-08-14 12:07:02'),
(8, 8, 1, 3, 4, '2022-08-14 12:54:45', '2022-08-14 12:54:45'),
(9, 9, 1, 3, 2, '2022-08-14 18:12:44', '2022-08-14 18:12:44'),
(10, 10, 1, 3, 1, '2022-08-14 18:13:11', '2022-08-14 18:13:11'),
(11, 11, 1, 3, 3, '2022-08-15 05:28:14', '2022-08-15 05:28:14'),
(12, 12, 3, 1, 1, '2022-08-15 07:00:05', '2022-08-15 07:00:05'),
(13, 12, 2, 1, 1, '2022-08-15 07:00:05', '2022-08-15 07:00:05'),
(14, 12, 4, 1, 1, '2022-08-15 07:00:05', '2022-08-15 07:00:05'),
(15, 13, 3, 1, 1, '2022-08-15 07:00:07', '2022-08-15 07:00:07'),
(16, 13, 2, 1, 1, '2022-08-15 07:00:07', '2022-08-15 07:00:07'),
(17, 13, 4, 1, 1, '2022-08-15 07:00:07', '2022-08-15 07:00:07'),
(18, 14, 1, 3, 2, '2022-08-15 07:29:09', '2022-08-15 07:29:09'),
(19, 14, 9, 3, 1, '2022-08-15 07:29:09', '2022-08-15 07:29:09'),
(20, 14, 4, 3, 1, '2022-08-15 07:29:09', '2022-08-15 07:29:09'),
(21, 15, 1, 2, 2, '2022-08-15 14:07:10', '2022-08-15 14:07:10'),
(22, 15, 2, 2, 1, '2022-08-15 14:07:10', '2022-08-15 14:07:10'),
(23, 16, 1, 2, 1, '2022-08-15 14:17:12', '2022-08-15 14:17:12'),
(24, 16, 2, 2, 1, '2022-08-15 14:17:12', '2022-08-15 14:17:12'),
(25, 17, 1, 4, 2, '2022-08-15 15:25:44', '2022-08-15 15:25:44'),
(26, 18, 1, 4, 3, '2022-08-15 15:26:10', '2022-08-15 15:26:10'),
(27, 18, 2, 4, 1, '2022-08-15 15:26:10', '2022-08-15 15:26:10'),
(28, 18, 3, 4, 1, '2022-08-15 15:26:10', '2022-08-15 15:26:10'),
(29, 19, 2, 4, 2, '2022-08-15 17:21:06', '2022-08-15 17:21:06'),
(30, 19, 6, 4, 2, '2022-08-15 17:21:06', '2022-08-15 17:21:06'),
(31, 20, 1, 4, 1, '2022-08-15 17:41:55', '2022-08-15 17:41:55'),
(32, 20, 9, 4, 3, '2022-08-15 17:41:55', '2022-08-15 17:41:55'),
(33, 21, 1, 5, 3, '2022-08-16 00:59:08', '2022-08-16 00:59:08'),
(34, 21, 2, 5, 1, '2022-08-16 00:59:08', '2022-08-16 00:59:08'),
(35, 22, 4, 5, 2, '2022-08-16 00:59:49', '2022-08-16 00:59:49'),
(36, 22, 5, 5, 1, '2022-08-16 00:59:49', '2022-08-16 00:59:49'),
(37, 23, 7, 5, 1, '2022-08-16 01:00:34', '2022-08-16 01:00:34'),
(38, 24, 9, 1, 2, '2022-08-16 01:05:49', '2022-08-16 01:05:49'),
(39, 25, 1, 5, 1, '2022-08-16 01:13:46', '2022-08-16 01:13:46'),
(40, 26, 6, 5, 1, '2022-08-16 01:15:30', '2022-08-16 01:15:30'),
(41, 27, 1, 5, 1, '2022-08-16 10:18:43', '2022-08-16 10:18:43'),
(42, 28, 1, 3, 2, '2022-08-16 16:30:12', '2022-08-16 16:30:12'),
(43, 29, 1, 5, 1, '2022-08-16 19:47:10', '2022-08-16 19:47:10'),
(44, 30, 1, 5, 2, '2022-08-17 08:10:31', '2022-08-17 08:10:31'),
(45, 31, 1, 4, 2, '2022-08-17 14:38:15', '2022-08-17 14:38:15'),
(46, 32, 3, 4, 1, '2022-08-17 14:41:37', '2022-08-17 14:41:37'),
(47, 32, 6, 4, 1, '2022-08-17 14:41:37', '2022-08-17 14:41:37'),
(48, 33, 3, 4, 1, '2022-08-17 14:53:33', '2022-08-17 14:53:33');

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `hak_akses`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'fahmi', 'fahmihwan', 'admin', '$2y$10$eoxhuRvsyjbRTWr06NoPzu8MqaYHXaf/nFRkIqqUweI5tCUAkyseS', NULL, '2022-08-14 07:13:56', '2022-08-14 07:13:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `detail_orders_nota_unique` (`nota`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `mejas`
--
ALTER TABLE `mejas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mejas_qrcode_unique` (`qrcode`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mejas`
--
ALTER TABLE `mejas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
