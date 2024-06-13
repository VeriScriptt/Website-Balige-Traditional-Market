-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 07:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balige_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `caraousel`
--

CREATE TABLE `caraousel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_caraousel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `caraousel`
--

INSERT INTO `caraousel` (`id`, `user_id`, `title`, `deskripsi`, `gambar_caraousel`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pasar Balige View', 'View Of Pasar Balige', '1717735438.jpg', '2024-06-06 21:43:58', '2024-06-06 21:43:58'),
(2, 1, 'Sellers', 'Sellers in Action', '1717735495.jpg', '2024-06-06 21:44:55', '2024-06-06 21:44:55'),
(3, 1, 'crowd', 'Crowded', '1717735629.jpeg', '2024-06-06 21:47:09', '2024-06-06 21:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `gambar_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `produk_id`, `nama_produk`, `harga`, `quantity`, `gambar_produk`, `hidden`, `created_at`, `updated_at`) VALUES
(33, 3, 4, 'Cobek Kayu', '36.00', 2, '1717727100.jpeg', 0, '2024-06-11 20:39:14', '2024-06-11 21:06:16'),
(34, 3, 3, 'Cobek Batu', '41000.00', 6, '1717727045.jpeg', 0, '2024-06-11 20:51:49', '2024-06-11 20:51:49'),
(35, 3, 7, 'Teko dan Gelas', '54.00', 1, '1717727377.jpeg', 0, '2024-06-11 22:14:16', '2024-06-11 22:14:16'),
(36, 3, 5, 'Set Pisau Keramik', '12.00', 1, '1717727146.jpeg', 0, '2024-06-12 00:03:01', '2024-06-12 00:03:01'),
(37, 3, 6, 'Teko Plastik', '45.00', 2, '1717727316.jpeg', 0, '2024-06-12 00:03:57', '2024-06-12 00:04:49'),
(38, 25, 67, 'Strawberry', '30.00', 1, '1717732090.jpg', 0, '2024-06-12 00:31:58', '2024-06-12 00:31:58');

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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`, `foto`) VALUES
(1, 'Daging & Ikan', '1717726633.jpg'),
(2, 'Peralatan Dapur', '1717726654.jpg'),
(3, 'Monja', '1717726666.jpg'),
(4, 'Sayur & Buah', '1717726688.jpg'),
(5, 'Pakaian', '1717726703.jpg'),
(6, 'Bumbu Masak', '1717726723.jpg'),
(7, 'Alas Kaki', '1717726747.jpg'),
(8, 'Aksesoris', '1717726778.jpg');

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
(1, '2011_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_24_044307_create_kategori_table', 1),
(6, '2024_04_11_152723_create_produk_table', 1),
(7, '2024_05_25_142420_create_cart_table', 1),
(8, '2024_05_27_183237_create_caraousel_table', 1),
(9, '2024_05_28_024813_create_orders_table', 1),
(10, '2024_05_28_025407_create_order_items_table', 1),
(11, '2024_06_03_184506_create_ulasan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('Pending','Completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `bukti_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_price`, `status`, `bukti_transaksi`, `created_at`, `updated_at`) VALUES
(1, 24, '123.00', 'Completed', '{\"4\":\"1717738198_WhatsApp Image 2024-06-05 at 20.49.56.jpeg\",\"5\":\"1717738220_WhatsApp Image 2024-06-07 at 10.22.43_98b85f97.jpg\"}', '2024-06-06 22:27:28', '2024-06-06 22:30:21'),
(2, 24, '395.00', 'Completed', '{\"7\":\"1717738531_WhatsApp Image 2024-06-07 at 10.20.11_388bb999.jpg\",\"4\":\"1717738542_WhatsApp Image 2024-06-07 at 10.20.11_388bb999.jpg\"}', '2024-06-06 22:34:17', '2024-06-06 22:35:42'),
(3, 24, '147.00', 'Completed', '{\"4\":\"1717740018_WhatsApp Image 2024-06-07 at 10.22.43_98b85f97.jpg\"}', '2024-06-06 22:59:49', '2024-06-06 23:00:18'),
(4, 24, '81.00', 'Completed', '{\"4\":\"1717740075_WhatsApp Image 2024-06-05 at 20.49.56.jpeg\",\"8\":\"1717740112_WhatsApp Image 2024-06-07 at 10.22.43_98b85f97.jpg\"}', '2024-06-06 23:00:48', '2024-06-06 23:01:52'),
(5, 24, '187.00', 'Completed', '{\"4\":\"1717744617_WhatsApp Image 2024-06-05 at 20.49.56.jpeg\",\"8\":\"1717744633_WhatsApp Image 2024-06-07 at 10.22.43_98b85f97.jpg\"}', '2024-06-07 00:16:03', '2024-06-07 00:17:13'),
(6, 24, '239.00', 'Pending', '{\"4\":\"1717745734_WhatsApp Image 2024-06-05 at 20.49.56.jpeg\",\"5\":\"1717745756_WhatsApp Image 2024-06-07 at 10.22.43_98b85f97.jpg\"}', '2024-06-07 00:28:47', '2024-06-07 00:35:56'),
(7, 3, '4704.00', 'Completed', '{\"4\":\"1717746250_WhatsApp Image 2024-06-07 at 10.22.43_98b85f97.jpg\"}', '2024-06-07 00:43:58', '2024-06-07 00:44:10'),
(8, 3, '387.00', 'Completed', '{\"4\":\"1718156140_download.jpeg\",\"14\":\"1718156156_download.jpeg\"}', '2024-06-11 03:21:45', '2024-06-11 18:35:56'),
(9, 3, '174.00', 'Completed', '{\"4\":\"1718156189_keluarga.png\"}', '2024-06-11 18:36:21', '2024-06-11 18:36:30'),
(10, 3, '186.00', 'Completed', '{\"4\":\"1718160408_864741.jpg\",\"22\":\"1718160417_Acer_Wallpaper_02_5000x2813.jpg\"}', '2024-06-11 19:44:32', '2024-06-11 19:46:57'),
(11, 3, '24.00', 'Completed', '{\"4\":\"1718161343_Acer_Wallpaper_02_5000x2813.jpg\"}', '2024-06-11 19:47:22', '2024-06-11 20:02:23'),
(12, 3, '12.00', 'Completed', '{\"4\":\"1718161917_2.jpg\"}', '2024-06-11 20:03:36', '2024-06-11 20:11:57'),
(13, 3, '461.00', 'Completed', '{\"4\":\"1718163619_Screenshot 2024-06-11 125008.png\",\"9\":\"1718165247_2022-09-10.png\",\"5\":\"1718175944_download.jpeg\"}', '2024-06-11 20:34:00', '2024-06-12 00:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `produk_id`, `nama_produk`, `harga`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Sendok Stainless Steel', '24.00', 1, '2024-06-06 22:27:28', '2024-06-06 22:27:28'),
(2, 1, 7, 'Teko dan Gelas', '54.00', 1, '2024-06-06 22:27:28', '2024-06-06 22:27:28'),
(3, 1, 6, 'Teko Plastik', '45.00', 1, '2024-06-06 22:27:28', '2024-06-06 22:27:28'),
(4, 2, 2, 'Set Sendok Silicone', '87.00', 3, '2024-06-06 22:34:17', '2024-06-06 22:34:17'),
(5, 2, 1, 'Sendok Stainless Steel', '24.00', 1, '2024-06-06 22:34:17', '2024-06-06 22:34:17'),
(6, 2, 17, 'Piring Daun', '110.00', 1, '2024-06-06 22:34:17', '2024-06-06 22:34:17'),
(7, 3, 2, 'Set Sendok Silicone', '87.00', 1, '2024-06-06 22:59:49', '2024-06-06 22:59:49'),
(8, 3, 1, 'Sendok Stainless Steel', '24.00', 1, '2024-06-06 22:59:49', '2024-06-06 22:59:49'),
(9, 3, 4, 'Cobek Kayu', '36.00', 1, '2024-06-06 22:59:49', '2024-06-06 22:59:49'),
(10, 4, 3, 'Cobek Batu', '41.00', 1, '2024-06-06 23:00:48', '2024-06-06 23:00:48'),
(11, 4, 21, 'Ulos Sadum', '40.00', 1, '2024-06-06 23:00:48', '2024-06-06 23:00:48'),
(12, 5, 2, 'Set Sendok Silicone', '87.00', 1, '2024-06-07 00:16:03', '2024-06-07 00:16:03'),
(13, 5, 1, 'Sendok Stainless Steeles', '24.00', 1, '2024-06-07 00:16:03', '2024-06-07 00:16:03'),
(14, 5, 4, 'Cobek Kayu', '36.00', 1, '2024-06-07 00:16:03', '2024-06-07 00:16:03'),
(15, 5, 21, 'Ulos Sadum', '40.00', 1, '2024-06-07 00:16:03', '2024-06-07 00:16:03'),
(16, 6, 1, 'Sendok Stainless Steelesssss', '24.00', 1, '2024-06-07 00:28:47', '2024-06-07 00:28:47'),
(17, 6, 6, 'Teko Plastik', '45.00', 1, '2024-06-07 00:28:47', '2024-06-07 00:28:47'),
(18, 6, 11, 'Panci Anti Lengket', '60.00', 1, '2024-06-07 00:28:47', '2024-06-07 00:28:47'),
(19, 6, 17, 'Piring Daun', '110.00', 1, '2024-06-07 00:28:47', '2024-06-07 00:28:47'),
(20, 7, 1, 'Sendok Stainless Steelesssss', '24.00', 196, '2024-06-07 00:43:58', '2024-06-07 00:43:58'),
(21, 8, 2, 'Set Sendok Silicone', '87.00', 1, '2024-06-11 03:21:45', '2024-06-11 03:21:45'),
(22, 8, 53, 'Dress Mini', '300.00', 1, '2024-06-11 03:21:45', '2024-06-11 03:21:45'),
(23, 9, 2, 'Set Sendok Silicone', '87.00', 2, '2024-06-11 18:36:21', '2024-06-11 18:36:21'),
(24, 10, 83, 'Sepatu Sneakers', '150.00', 1, '2024-06-11 19:44:32', '2024-06-11 19:44:32'),
(25, 10, 4, 'Cobek Kayu', '36.00', 1, '2024-06-11 19:44:32', '2024-06-11 19:44:32'),
(26, 11, 1, 'Sendok Stainless Steelesssss', '24.00', 1, '2024-06-11 19:47:22', '2024-06-11 19:47:22'),
(27, 12, 5, 'Set Pisau Keramik', '12.00', 1, '2024-06-11 20:03:36', '2024-06-11 20:03:36'),
(28, 13, 4, 'Cobek Kayu', '36.00', 8, '2024-06-11 20:34:00', '2024-06-11 20:34:00'),
(29, 13, 3, 'Cobek Batu', '41.00', 1, '2024-06-11 20:34:00', '2024-06-11 20:34:00'),
(30, 13, 8, 'Panci', '120.00', 1, '2024-06-11 20:34:00', '2024-06-11 20:34:00'),
(31, 13, 28, 'Gelang Tridatu', '12.00', 1, '2024-06-11 20:34:00', '2024-06-11 20:34:00');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_hidden` tinyint(1) NOT NULL DEFAULT 0,
  `kategori_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `id_user`, `nama_produk`, `harga`, `stok`, `gambar_produk`, `deskripsi`, `created_at`, `updated_at`, `is_hidden`, `kategori_id`) VALUES
(1, 4, 'Sendok Stainless Steelesssss', '24.00', 0, '1717726930.jpeg', 'Berisi 1 Lusin', '2024-06-06 19:22:10', '2024-06-11 19:47:22', 0, 5),
(2, 4, 'Set Sendok Silicone', '87.00', 0, '1717726988.jpeg', 'Berisi 12 Macam Sendok', '2024-06-06 19:23:08', '2024-06-11 18:36:21', 0, 2),
(3, 4, 'Cobek Batu', '41000.00', 121, '1717727045.jpeg', 'Handmade', '2024-06-06 19:24:05', '2024-06-11 20:34:00', 0, 2),
(4, 4, 'Cobek Kayu', '36.00', 220, '1717727100.jpeg', 'Dibuat dari kayu mahoni', '2024-06-06 19:25:00', '2024-06-11 20:34:00', 0, 2),
(5, 4, 'Set Pisau Keramik', '12.00', 68, '1717727146.jpeg', 'Berisi 8 jenis Pisau', '2024-06-06 19:25:46', '2024-06-11 20:03:36', 0, 2),
(6, 5, 'Teko Plastik', '45.00', 11, '1717727316.jpeg', 'Tahan Panas', '2024-06-06 19:28:36', '2024-06-07 00:28:47', 0, 2),
(7, 5, 'Teko dan Gelas', '54.00', 129, '1717727377.jpeg', 'Tahan Panas', '2024-06-06 19:29:37', '2024-06-06 22:27:28', 0, 2),
(8, 5, 'Panci', '120.00', 129, '1717727420.jpeg', 'Anti Lengket', '2024-06-06 19:30:20', '2024-06-11 20:34:00', 0, 2),
(9, 5, 'Wajan Stainless Steel', '56.00', 89, '1717727462.jpeg', 'Anti Lengket', '2024-06-06 19:31:02', '2024-06-06 19:31:02', 0, 2),
(10, 5, 'Pisau Set', '212.00', 13, '1717727536.jpeg', 'Berisi 5 Pisau', '2024-06-06 19:32:16', '2024-06-06 19:32:16', 0, 2),
(11, 6, 'Panci Anti Lengket', '60.00', 200, '1717727907.jpeg', 'Anti Lengket', '2024-06-06 19:38:27', '2024-06-07 00:28:47', 0, 2),
(12, 6, 'Mangkok', '10.00', 130, '1717727952.jpeg', 'Berisi 1 Lusin', '2024-06-06 19:39:12', '2024-06-06 19:39:12', 0, 2),
(13, 6, 'Gelas Royalex', '160.00', 89, '1717728021.jpeg', 'Berisi 1 Lusin', '2024-06-06 19:40:21', '2024-06-06 19:40:21', 0, 2),
(14, 6, 'Gelas Duralex', '170.00', 201, '1717728073.jpeg', '1 Lusin', '2024-06-06 19:41:13', '2024-06-06 19:41:13', 0, 2),
(15, 6, 'Balanga', '54.00', 13, '1717728111.jpeg', 'Anti Lengket', '2024-06-06 19:41:51', '2024-06-06 19:41:51', 0, 2),
(16, 7, 'Piring Keramik', '100.00', 13, '1717728303.jpeg', '1 Lusin', '2024-06-06 19:45:03', '2024-06-06 19:45:03', 0, 2),
(17, 7, 'Piring Daun', '110.00', 30, '1717728347.jpeg', '1 Lusin', '2024-06-06 19:45:47', '2024-06-07 00:28:47', 0, 2),
(18, 7, 'Piring Hitam', '123.00', 13, '1717728386.jpeg', '1 Lusin', '2024-06-06 19:46:26', '2024-06-06 19:46:26', 0, 2),
(19, 7, 'Talenan Stainless Steel', '20.00', 130, '1717728497.jpeg', 'Mudah Dicuci', '2024-06-06 19:48:17', '2024-06-06 19:48:17', 0, 2),
(20, 7, 'Talenen Plastik', '20.00', 69, '1717728538.jpeg', 'Muah dicuci', '2024-06-06 19:48:58', '2024-06-06 19:48:58', 0, 2),
(21, 8, 'Ulos Sadum', '40.00', 894, '1717729008.jpg', 'Budaya Batak', '2024-06-06 19:56:48', '2024-06-07 00:16:03', 0, 8),
(22, 8, 'Kalung Ukir', '20.00', 130, '1717729061.jpg', 'Ukiran Tangan Pengrajin', '2024-06-06 19:57:41', '2024-06-06 19:57:41', 0, 8),
(23, 8, 'Kacamata Hitam', '60.00', 130, '1717729109.jpg', 'Tahan Api', '2024-06-06 19:58:29', '2024-06-06 19:58:29', 0, 8),
(24, 8, 'Kacamata Frame Tebal', '100.00', 124, '1717729145.jpg', 'Trendy', '2024-06-06 19:59:05', '2024-06-06 19:59:05', 0, 8),
(25, 8, 'Kacamata William Palmer', '120.00', 346, '1717729192.jpg', 'Trendy', '2024-06-06 19:59:52', '2024-06-06 19:59:52', 0, 8),
(26, 9, 'Gelang Sortali', '34.00', 231, '1717729373.jpg', 'Handmade', '2024-06-06 20:02:53', '2024-06-06 20:02:53', 0, 8),
(27, 9, 'Ulos Ragi Hotang', '300.00', 62, '1717729458.jpg', 'Tenun Tangan', '2024-06-06 20:04:18', '2024-06-06 20:04:18', 0, 8),
(28, 9, 'Gelang Tridatu', '12.00', 895, '1717729504.jpg', 'Handmade', '2024-06-06 20:05:04', '2024-06-11 20:34:00', 0, 8),
(29, 9, 'Kacamata Anti Radiasi', '70.00', 165, '1717729550.png', 'Anti Radiasi', '2024-06-06 20:05:50', '2024-06-06 20:05:50', 0, 8),
(30, 9, 'Abalone Stand', '140.00', 563, '1717729591.jpg', 'Emas Imitasi', '2024-06-06 20:06:31', '2024-06-06 20:06:31', 0, 8),
(31, 10, 'Diamond Pavillion', '50.00', 130, '1717729753.jpg', 'Imitasi', '2024-06-06 20:09:13', '2024-06-06 23:25:10', 0, 8),
(32, 10, 'Gelang Gaharu', '20.00', 34, '1717729781.jpg', 'Imitasi', '2024-06-06 20:09:41', '2024-06-06 20:09:41', 0, 8),
(33, 10, 'Gelang Rantai', '4.00', 756, '1717729815.jpg', 'Anti Karat', '2024-06-06 20:10:15', '2024-06-06 20:10:15', 0, 8),
(34, 10, 'Kalung adat Batak', '1.40', 69, '1717729878.jpg', '2 gr Emas 24k', '2024-06-06 20:11:18', '2024-06-06 20:11:18', 0, 8),
(35, 10, 'Topi Batak Toba', '60.00', 241, '1717729909.jpg', 'Handmade', '2024-06-06 20:11:49', '2024-06-06 20:11:49', 0, 8),
(36, 11, 'Jam Eiger', '180.00', 14, '1717730038.jpg', 'Anti Air', '2024-06-06 20:13:58', '2024-06-06 20:13:58', 0, 8),
(37, 11, 'Tandok 5 Liter', '60.00', 345, '1717730089.jpg', 'Bayon Ori', '2024-06-06 20:14:49', '2024-06-06 20:14:49', 0, 8),
(38, 11, 'Sortali Rajut', '30.00', 351, '1717730139.jpg', 'Rajut Tangan', '2024-06-06 20:15:39', '2024-06-06 20:15:39', 0, 8),
(39, 11, 'Mi Watch', '300.00', 124, '1717730219.png', 'Anti Air', '2024-06-06 20:16:59', '2024-06-06 20:16:59', 0, 8),
(40, 12, 'Atasan Ulos', '160.00', 34, '1717730466.jpeg', 'S-XL', '2024-06-06 20:21:06', '2024-06-06 20:21:54', 0, 5),
(41, 12, 'Batik Madura', '100.00', 12, '1717730502.jpeg', 'S-XL', '2024-06-06 20:21:42', '2024-06-06 20:21:42', 0, 5),
(42, 12, 'Kemeja Batik', '140.00', 69, '1717730567.jpeg', 'S-XL', '2024-06-06 20:22:47', '2024-06-06 20:22:47', 0, 5),
(43, 12, 'Kemeja Batik Semi Sutra', '200.00', 14, '1717730606.jpeg', 'S-XL', '2024-06-06 20:23:26', '2024-06-06 20:23:26', 0, 5),
(44, 12, 'Gaun Batik Tunic', '220.00', 57, '1717730641.jpeg', 'S-XL', '2024-06-06 20:24:01', '2024-06-06 20:24:01', 0, 5),
(45, 13, 'Boyfriend Jeans', '120.00', 321, '1717730799.jpeg', 'S-XL', '2024-06-06 20:26:39', '2024-06-06 20:26:39', 0, 5),
(46, 13, 'celana lilit corak', '80.00', 13, '1717730823.jpeg', 'celana lilit corak.jpeg', '2024-06-06 20:27:03', '2024-06-06 20:27:03', 0, 5),
(47, 13, 'Celana Pendek Army', '40.00', 135, '1717730847.jpeg', 'celana lilit corak.jpeg', '2024-06-06 20:27:27', '2024-06-06 20:27:27', 0, 5),
(48, 13, 'Celana Pendek Polos', '30.00', 151, '1717730887.jpeg', 'S-XL', '2024-06-06 20:28:07', '2024-06-06 20:28:07', 0, 5),
(49, 14, 'Celana Pendek Wanita', '35.00', 124, '1717731019.jpeg', 'S-XL', '2024-06-06 20:30:19', '2024-06-06 20:30:19', 0, 5),
(50, 14, 'Celana Panjang Cotton Linen', '65.00', 61, '1717731052.jpeg', 'S-XL', '2024-06-06 20:30:52', '2024-06-06 20:30:52', 0, 5),
(51, 14, 'Cult Dress', '59.00', 73, '1717731087.jpeg', 'S-XL', '2024-06-06 20:31:27', '2024-06-06 20:31:27', 0, 5),
(52, 14, 'Denim Pria', '200.00', 51, '1717731114.jpeg', 'S-XL', '2024-06-06 20:31:54', '2024-06-06 20:31:54', 0, 5),
(53, 14, 'Dress Mini', '300.00', 12, '1717731143.jpeg', 'S-XL', '2024-06-06 20:32:23', '2024-06-11 03:21:45', 0, 5),
(54, 15, 'Flowery Dress', '120.00', 122, '1717731273.jpeg', 'S-XL', '2024-06-06 20:34:33', '2024-06-06 20:34:33', 0, 5),
(55, 15, 'Kemeja Tenun', '152.00', 135, '1717731325.jpeg', 'S-XL', '2024-06-06 20:35:25', '2024-06-06 20:35:25', 0, 5),
(56, 15, 'Celana Kulot', '120.00', 15, '1717731352.jpeg', 'S-XL', '2024-06-06 20:35:52', '2024-06-06 20:35:52', 0, 5),
(57, 15, 'One Set', '200.00', 201, '1717731375.jpeg', 'S-XL', '2024-06-06 20:36:15', '2024-06-06 20:36:15', 0, 5),
(58, 16, 'Jumpsuit', '130.00', 130, '1717731524.jpeg', 'S-XL', '2024-06-06 20:38:44', '2024-06-06 20:38:44', 0, 3),
(59, 16, 'Ripped Jeans', '140.00', 201, '1717731550.jpeg', 'S-XL', '2024-06-06 20:39:11', '2024-06-06 20:39:11', 0, 8),
(60, 17, 'Tomat', '8.00', 30, '1717731741.jpg', 'per KG', '2024-06-06 20:42:21', '2024-06-06 20:42:21', 0, 4),
(61, 17, 'Sayur Manis', '3.00', 153, '1717731791.jpg', '/Ikat', '2024-06-06 20:43:11', '2024-06-06 20:43:11', 0, 4),
(62, 17, 'Kangkung', '3.00', 152, '1717731814.jpg', '/ikat', '2024-06-06 20:43:34', '2024-06-06 20:43:34', 0, 4),
(63, 17, 'Sayur Botol', '5.00', 15, '1717731843.webp', 'per KG', '2024-06-06 20:44:03', '2024-06-06 20:44:03', 0, 4),
(64, 17, 'Kangkung', '3.00', 13, '1717731874.webp', 'per Ikat', '2024-06-06 20:44:34', '2024-06-06 20:44:34', 0, 4),
(65, 18, 'Semangka', '20.00', 135, '1717732026.jpg', 'per KG', '2024-06-06 20:47:06', '2024-06-06 20:47:06', 0, 4),
(66, 18, 'Alpukat', '12.00', 241, '1717732061.jpg', 'Pokad Manguda', '2024-06-06 20:47:41', '2024-06-06 20:47:41', 0, 4),
(67, 18, 'Strawberry', '30.00', 201, '1717732090.jpg', 'per KG', '2024-06-06 20:48:10', '2024-06-06 20:48:10', 0, 4),
(68, 18, 'Buah Naga', '30.00', 13, '1717732120.jpeg', 'per KG', '2024-06-06 20:48:40', '2024-06-06 20:48:40', 0, 4),
(69, 18, 'Peer', '20.00', 13, '1717732157.jpeg', 'per KG', '2024-06-06 20:49:17', '2024-06-06 20:49:17', 0, 4),
(70, 19, 'Bawang Putih', '6.00', 14, '1717732447.jpg', 'per KG', '2024-06-06 20:54:07', '2024-06-06 20:54:07', 0, 6),
(71, 19, 'Bawang Merah', '13.00', 13, '1717732474.jpeg', 'per KG', '2024-06-06 20:54:34', '2024-06-06 20:54:34', 0, 4),
(72, 19, 'Bumbu Balado', '5.00', 12, '1717732503.jpg', 'per KG', '2024-06-06 20:55:03', '2024-06-06 20:55:03', 0, 6),
(73, 19, 'Bumbu Soto', '30.00', 13, '1717732535.jpg', 'per KG', '2024-06-06 20:55:35', '2024-06-06 20:55:35', 0, 6),
(74, 19, 'Andaliman', '10.00', 12, '1717732572.jpg', 'per KG', '2024-06-06 20:56:12', '2024-06-06 20:56:12', 0, 6),
(75, 20, 'Kemeja H&M', '90.00', 1, '1717732781.jpeg', 'Fullprint S', '2024-06-06 20:59:41', '2024-06-06 20:59:41', 0, 3),
(76, 20, 'Celana Kantor', '60.00', 1, '1717732814.jpeg', 'Size 36', '2024-06-06 21:00:14', '2024-06-06 21:00:14', 0, 3),
(77, 20, 'Lekbong Pria', '30.00', 1, '1717732849.jpeg', 'M', '2024-06-06 21:00:49', '2024-06-06 21:00:49', 0, 3),
(78, 21, 'Hoodie Punisher', '100.00', 1, '1717733000.jpeg', 'Size M', '2024-06-06 21:03:20', '2024-06-06 21:03:20', 0, 3),
(79, 21, 'Celana Pendek', '40.00', 1, '1717733076.jpeg', 'size 26-30', '2024-06-06 21:04:36', '2024-06-06 21:04:36', 0, 3),
(80, 21, 'Sepatu Wanita Pink', '100.00', 134, '1717733135.jpeg', '38-42', '2024-06-06 21:05:35', '2024-06-06 21:05:35', 0, 7),
(81, 21, 'Converse Putih', '400.00', 13, '1717733164.jpeg', '38-42', '2024-06-06 21:06:04', '2024-06-06 21:06:04', 0, 7),
(82, 21, 'Sepatu Tumit Tahu', '70.00', 14, '1717733194.jpeg', '38-42', '2024-06-06 21:06:34', '2024-06-06 21:06:34', 0, 7),
(83, 22, 'Sepatu Sneakers', '150.00', 144, '1717733471.jpeg', '38-42', '2024-06-06 21:11:11', '2024-06-11 19:44:32', 0, 7),
(84, 22, 'Sneakers Anak', '90.00', 17, '1717733508.jpeg', '38-42', '2024-06-06 21:11:48', '2024-06-06 21:11:48', 0, 7),
(85, 22, 'Sepatu Anak Berlampu', '140.00', 23, '1717733538.jpeg', '38-42', '2024-06-06 21:12:18', '2024-06-06 21:12:18', 0, 7),
(86, 22, 'Sandal Cartago', '70.00', 25, '1717733574.jpeg', '38-42', '2024-06-06 21:12:54', '2024-06-06 21:12:54', 0, 7),
(87, 23, 'Cabe Rawit', '120.00', 15, '1717733765.jpg', 'per KG', '2024-06-06 21:16:05', '2024-06-06 21:16:05', 0, 4),
(88, 23, 'Gambiri', '70.00', 53, '1717733789.jpg', 'per KG', '2024-06-06 21:16:29', '2024-06-06 21:18:25', 0, 6),
(89, 23, 'Bumbu Gule', '40.00', 25, '1717733820.jpg', 'per KG', '2024-06-06 21:17:00', '2024-06-06 21:17:00', 0, 6),
(90, 23, 'Jintan', '200.00', 13, '1717733954.jpg', 'per KG', '2024-06-06 21:19:14', '2024-06-06 21:19:14', 0, 6),
(91, 23, 'Andaliman', '120.00', 14, '1717733982.jpg', 'per KG', '2024-06-06 21:19:42', '2024-06-06 21:19:42', 0, 6),
(92, 14, 'Bacon', '60000.00', 13, '1717741276.jpg', 'Per KG', '2024-06-06 23:21:16', '2024-06-06 23:21:16', 0, 1),
(93, 14, 'Ayam Potong', '40000.00', 51, '1717741309.jpeg', 'Per KG', '2024-06-06 23:21:49', '2024-06-06 23:21:49', 0, 1),
(94, 14, 'Ikan Dencis', '40000.00', 51, '1717741336.jpg', 'Per KG', '2024-06-06 23:22:16', '2024-06-06 23:22:16', 0, 1),
(95, 14, 'Daging Babi', '75000.00', 21, '1717741372.jpeg', 'Per KG', '2024-06-06 23:22:52', '2024-06-06 23:22:52', 0, 1),
(96, 14, 'Cumi', '55000.00', 31, '1717741416.jpg', 'Per KG', '2024-06-06 23:23:36', '2024-06-06 23:23:36', 0, 1),
(97, 14, 'Udang', '60000.00', 11, '1717741459.jpg', 'Per KG', '2024-06-06 23:24:19', '2024-06-06 23:24:19', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `produk_id`, `user_id`, `comment`, `name`, `nama_produk`, `hidden`, `created_at`, `updated_at`) VALUES
(1, 2, 24, 'nice product', 'yerin', 'Set Sendok Silicone', 0, '2024-06-06 22:32:07', '2024-06-07 00:24:44'),
(2, 1, 24, 'test', 'yerin', 'Sendok Stainless Steel', 0, '2024-06-06 22:58:26', '2024-06-06 22:58:26'),
(3, 1, 24, 'test', 'yerin', 'Sendok Stainless Steeles', 0, '2024-06-07 00:14:19', '2024-06-07 00:14:19'),
(4, 34, 3, 'Bagak ate', 'Mas Veri pembeli barang jago', 'Kalung adat Batak', 0, '2024-06-11 19:31:09', '2024-06-11 19:31:09'),
(5, 34, 3, 'Bagus.', 'Anonym', 'Kalung adat Batak', 0, '2024-06-11 19:31:49', '2024-06-11 19:31:49'),
(6, 3, 3, 'asdfbgnhmjk', 'Mas Veri pembeli', 'Cobek Batu', 0, '2024-06-11 19:43:40', '2024-06-11 19:43:40'),
(7, 9, 3, 'vivivv', 'Mas Veri pembeli', 'Wajan Stainless Steel', 0, '2024-06-11 20:02:06', '2024-06-11 20:02:06'),
(8, 4, 3, 'hjkl', 'Mas Veri pembeli', 'Cobek Kayu', 0, '2024-06-11 20:11:39', '2024-06-11 20:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','penjual','pembeli') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pembeli',
  `gambar_toko` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_toko` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nomor_toko` int(11) DEFAULT NULL,
  `lantai_toko` enum('Lantai 1','Lantai 2','Balairung') COLLATE utf8mb4_unicode_ci DEFAULT 'Lantai 1',
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `email_verified_at`, `password`, `role`, `gambar_toko`, `nama_toko`, `nik`, `tanggal_lahir`, `nomor_toko`, `lantai_toko`, `nomor_telepon`, `active`, `verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mas Veri admin', 'admin@gmail.com', NULL, '$2y$12$zknNn4jtdizn0L1RZHVNheVTSnF9wg1dIMrkW/t14FjExtNdfVnyK', 'admin', '', NULL, NULL, NULL, NULL, 'Lantai 1', NULL, 1, 0, NULL, '2024-06-06 19:15:50', '2024-06-06 19:15:50'),
(2, 'Mas Veri penjual', 'penjual@gmail.com', NULL, '$2y$12$pBxXtKYhmf6jl4P30ZGJvODz2D59kMtjIKVA.VHOOKtDu4QfUGK5S', 'penjual', '1716521575.jpeg', 'Mas Veri Penjual', '125712792300', NULL, 324, 'Lantai 1', '621370349867', 1, 1, NULL, '2024-06-06 19:15:50', '2024-06-07 00:23:00'),
(3, 'Mas Veri pembeli', 'pembeli@gmail.com', NULL, '$2y$12$wJ1R2BM5biBGvyn2.oao6uvEjCAxmvB2evPMkCsXnhOXREuTRKg0K', 'pembeli', NULL, NULL, NULL, NULL, NULL, 'Lantai 1', NULL, 1, 0, NULL, '2024-06-06 19:15:50', '2024-06-06 19:15:50'),
(4, 'Salmon Simanjuntak', 'salmon@gmail.com', NULL, '$2y$12$YS9a92axhpZwJNE94tVZ4eH/233NP2b7eFSNg1NReHQZJkfRIcBf.', 'penjual', '1717726848.jpg', 'Salmon Storeyyy', '12345676', '2001-05-07', 1, 'Lantai 1', '6285947505435', 1, 1, NULL, '2024-06-06 19:20:48', '2024-06-07 01:20:39'),
(5, 'Ma Atur', 'aturs@gmail.com', NULL, '$2y$12$nmIKAJM7AwR22KHcM9bBSeTHLPe4W5sASZncCFJOBc3FH047tDTfa', 'penjual', '1717727236.jpg', 'Atur Store', '1234567890', '1995-05-08', 2, 'Lantai 1', '6285947505435', 1, 1, NULL, '2024-06-06 19:27:17', '2024-06-06 19:27:25'),
(6, 'Martin Marpaung', 'martin@gmail.com', NULL, '$2y$12$qYqKe8Tam4tfTcV3JzgISuwRPScQpMuFQTtkWT/rSWJLaL72pJKpm', 'penjual', '1717727777.jpg', 'Martin Store', '2646542423', '1993-05-11', 3, 'Lantai 1', '6285947505435', 1, 1, NULL, '2024-06-06 19:36:17', '2024-06-11 22:16:59'),
(7, 'Tumbur Sihombing', 'tumbur@gmail.com', NULL, '$2y$12$msVuAy7l/fVcSuTbFn1LUO4QR0wyty8WN/oVj8huPlcLnlwDlsfIO', 'penjual', '1717728207.jpg', 'Tumb\'z Store', '1234567890', '2009-05-13', 4, 'Lantai 1', '6285947505435', 1, 1, NULL, '2024-06-06 19:43:28', '2024-06-06 19:43:36'),
(8, 'Rebecca Manurung', 'becca@gmail.com', NULL, '$2y$12$OfpCcpp1rqmPzNDk6OyLku3PAl3HFtQp3ZCqqR3ajyiVpBbHysPRS', 'penjual', '1717728890.jpeg', 'Rebecca Store', '123254657656453', '1985-06-11', 5, 'Lantai 1', '6285947505435', 1, 1, NULL, '2024-06-06 19:54:51', '2024-06-06 19:55:02'),
(9, 'Wiliam Panjaita', 'william@gmail.com', NULL, '$2y$12$FQ56NWWjywGUGddTJ/Vmzu6Qhzmly/J2LvdAGiCOHhRnJiS1e0CPe', 'penjual', '1717729291.jpeg', 'Regen Store', '123254657656453', '1993-05-19', 6, 'Lantai 1', '6285947505435', 1, 1, NULL, '2024-06-06 20:01:31', '2024-06-06 20:01:46'),
(10, 'Marihot Tambunan', 'marihot@gmail.com', NULL, '$2y$12$09i/kSfVr/sQRh60UZ0OZumYWtv9sDmQlL9jtU7V9QETf8CLgeQ/2', 'penjual', '1717729673.jpeg', 'Bento Store', '1234567890', '1989-06-19', 7, 'Lantai 1', '6285947505435', 1, 1, NULL, '2024-06-06 20:07:53', '2024-06-06 20:08:00'),
(11, 'Ma Mita', 'mita@gmail.com', NULL, '$2y$12$x9CorLNvo0heUCRDQmbnAOFSHM0tJYvQ.qouHi7CkBX0nRMDwanIa', 'penjual', '1717729973.jpeg', 'Ma Mita Store', '12345676', '1988-06-21', 8, 'Lantai 1', '6285947505435', 1, 1, NULL, '2024-06-06 20:12:54', '2024-06-06 20:13:00'),
(12, 'Efran Lumbantoruan', 'efran@gmail.com', NULL, '$2y$12$CBmewfX8y4olKh8kewIcz.p2hF8N3GIKRuuQskaL0zQ.9QFo/FKgm', 'penjual', '1717730363.jpeg', 'efran store', '123254657656453', '1981-09-22', 9, 'Lantai 1', '6285947505435', 1, 1, NULL, '2024-06-06 20:19:24', '2024-06-06 20:19:52'),
(13, 'Maladin Siboro', 'maladin@gmail.com', NULL, '$2y$12$P2Bk.Xtseet.xuMBHLv4Su071Mz6s/0f5NEBc2/bixt7Ar97pB4Sy', 'penjual', '1717730720.jpeg', 'Maladin Store', '12345676', '1996-06-12', 10, 'Lantai 1', '6285947505435', 1, 1, NULL, '2024-06-06 20:25:20', '2024-06-06 20:25:47'),
(14, 'Mutiha Marpaung', 'mutiha@gmail.com', NULL, '$2y$12$DJAzXPDjVOEhAn4yulsDKO9WLO4HdPT9yBd44fFrigo6svYD2Kada', 'penjual', '1717730962.jpeg', 'Mutiha Store', '213478034568', '1980-09-24', 1, 'Lantai 2', '6285947505435', 1, 1, NULL, '2024-06-06 20:29:23', '2024-06-06 20:29:30'),
(15, 'Tomri Hutasoit', 'tomri@gmail.com', NULL, '$2y$12$YefPhdmI65LxLBn7sctHIuIlqwz67Wf1CmFcjlzS/e.NY01Q5xTKu', 'penjual', '1717731217.jpeg', 'tomristore', '12345676', '1999-02-04', 2, 'Lantai 2', '6285947505435', 1, 1, NULL, '2024-06-06 20:33:38', '2024-06-06 20:33:49'),
(16, 'Partumpuan LumbanToruan', 'tumpu@gmail.com', NULL, '$2y$12$qKnify/tr.RBxI9Klir4Ke1PUDPnjaUK9tWNFaoBjXgxyB71m/45.', 'penjual', '1717731454.jpeg', 'Tumpu Store', '123254657656453', '1789-02-12', 3, 'Lantai 2', '6285947505435', 1, 1, NULL, '2024-06-06 20:37:35', '2024-06-06 20:37:45'),
(17, 'Ma Dora', 'dora@gmail.com', NULL, '$2y$12$Om9gmHwXs5i6vwG6eM6zgOX1ViDAhzAOJar.r7sHkw2OUshqwqmDm', 'penjual', '1717731650.jpeg', 'Ma d=Dora', '123254657656453', '1978-07-21', 4, 'Lantai 2', '6285947505435', 1, 1, NULL, '2024-06-06 20:40:50', '2024-06-06 20:41:06'),
(18, 'Sarumaha Tampubolon', 'sarum@gmail.com', NULL, '$2y$12$N7IpXcg4JTBH0yJJO.p.eeBuNRZ8UspTlcPglqsk8UgQMEopAN1pa', 'penjual', '1717731941.jpeg', 'Ma Kembar Store', '12345676', '1970-05-12', 5, 'Lantai 2', '6285947505435', 1, 1, NULL, '2024-06-06 20:45:41', '2024-06-06 20:49:24'),
(19, 'Berlin Naibaho', 'berlin@gmail.com', NULL, '$2y$12$IEdRDMHPfwH0g5FGPZ3N7ezJQA.IIAAzVJJ/lkemuahfC0nnT0wm.', 'penjual', '1717732379.jpeg', 'Berlin Store', '12345676', '1987-12-12', 3, 'Balairung', '6285947505435', 1, 1, NULL, '2024-06-06 20:52:59', '2024-06-06 21:07:27'),
(20, 'Deby Manalu', 'deby@gmail.com', NULL, '$2y$12$cA6oVaRO0XFgFQdGjbJXHONtRmZtIPKooBJEiOrjjXgFhdK5EQxX.', 'penjual', '1717732672.jpeg', 'Deby Store', '12345676', '2000-04-12', 1, 'Balairung', '62899234233', 1, 1, NULL, '2024-06-06 20:57:53', '2024-06-06 20:58:14'),
(21, 'Mutiara Panjaitan', 'mutiara@gmail.com', NULL, '$2y$12$DNPd8klv6ZQ1LAwySaYgzOrnOLA7qeTBq7yV3wF3uj6FknDhOZ2TK', 'penjual', '1717732936.jpeg', 'Mutiara Store', '123254657656453', '1999-04-03', 2, 'Balairung', '6285947505435', 1, 1, NULL, '2024-06-06 21:02:16', '2024-06-06 21:02:24'),
(22, 'Steven Siahaan', 'stvnsiahaan@gmail.com', NULL, '$2y$12$FUsXCJGcDf85McF3cGpbvet46qOdUHnU0P2pkIqlYGu15gWCxV.4q', 'penjual', '1717733304.jpeg', 'StiffStore', '12345676', '2004-02-23', 4, 'Balairung', '6285947505435', 1, 1, NULL, '2024-06-06 21:08:24', '2024-06-06 21:08:42'),
(23, 'Ma Donni', 'doni@gmail.com', NULL, '$2y$12$NDYnA/H0LjRQZMkxwmzvRuynr1sZOM7f6IOuMT8LkpelgBmEW2s3C', 'penjual', '1717733681.jpg', 'Ma Donni', '123254657656453', '1978-01-05', 5, 'Balairung', '6285947505435', 1, 1, NULL, '2024-06-06 21:14:41', '2024-06-06 21:15:13'),
(24, 'yerin', 'yenrylin01@gmail.com', NULL, '$2y$12$hOcKDm.4FshqxKwu7iML6.xqzwWedMkwd7PkcLt7nA9AbrTEDggNu', 'pembeli', NULL, NULL, NULL, NULL, NULL, 'Lantai 1', '6285270077710', 1, 0, NULL, '2024-06-06 22:25:12', '2024-06-06 22:25:12'),
(25, 'mangaku', 'stvnssiahaan@gmail.com', NULL, '$2y$12$LgK.Y4mNqnM6gLcAWJCEGe20jqdBKH9mTpk6F4mXj1ZTeY1uB3ZA6', 'pembeli', NULL, NULL, NULL, NULL, NULL, 'Lantai 1', '6285922036', 1, 0, NULL, '2024-06-12 00:07:10', '2024-06-12 00:07:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caraousel`
--
ALTER TABLE `caraousel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caraousel_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_user_id_foreign` (`user_id`),
  ADD KEY `cart_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `produk_kategori_id_foreign` (`kategori_id`),
  ADD KEY `produk_id_user_foreign` (`id_user`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ulasan_user_id_foreign` (`user_id`),
  ADD KEY `ulasan_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caraousel`
--
ALTER TABLE `caraousel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `caraousel`
--
ALTER TABLE `caraousel`
  ADD CONSTRAINT `caraousel_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`),
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`) ON DELETE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produk_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`),
  ADD CONSTRAINT `ulasan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
