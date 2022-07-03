-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2022 at 12:09 PM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1796893_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `prod_id` bigint(20) UNSIGNED NOT NULL,
  `prod_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`, `updated_at`, `size`, `color`) VALUES
(24, 2, 3, '1', '2022-07-02 11:54:10', '2022-07-02 11:54:10', NULL, NULL),
(26, 4, 1, '1', '2022-07-02 21:28:28', '2022-07-02 21:28:28', 'L', 'Red');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_descrip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_descrip`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Kaos', 'kaos', 'kaos', 1, 1, '1656703361.jpg', 'kaos', 'kaos', 'kaos', '2022-07-01 11:47:05', '2022-07-01 21:33:28'),
(2, 'Tas', 'tas', 'tas', 1, 1, '1656745804.jpg', 'Tas', 'tas', 'tas', '2022-07-02 00:10:04', '2022-07-02 00:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `province_id`, `type`, `city_name`, `postal_code`, `created_at`, `updated_at`) VALUES
(1, 21, 'Kabupaten', 'Aceh Barat', '23681', NULL, NULL),
(2, 21, 'Kabupaten', 'Aceh Barat Daya', '23764', NULL, NULL),
(3, 21, 'Kabupaten', 'Aceh Besar', '23951', NULL, NULL),
(4, 21, 'Kabupaten', 'Aceh Jaya', '23654', NULL, NULL),
(5, 21, 'Kabupaten', 'Aceh Selatan', '23719', NULL, NULL),
(6, 21, 'Kabupaten', 'Aceh Singkil', '24785', NULL, NULL),
(7, 21, 'Kabupaten', 'Aceh Tamiang', '24476', NULL, NULL),
(8, 21, 'Kabupaten', 'Aceh Tengah', '24511', NULL, NULL),
(9, 21, 'Kabupaten', 'Aceh Tenggara', '24611', NULL, NULL),
(10, 21, 'Kabupaten', 'Aceh Timur', '24454', NULL, NULL),
(11, 21, 'Kabupaten', 'Aceh Utara', '24382', NULL, NULL),
(12, 32, 'Kabupaten', 'Agam', '26411', NULL, NULL),
(13, 23, 'Kabupaten', 'Alor', '85811', NULL, NULL),
(14, 19, 'Kota', 'Ambon', '97222', NULL, NULL),
(15, 34, 'Kabupaten', 'Asahan', '21214', NULL, NULL),
(16, 24, 'Kabupaten', 'Asmat', '99777', NULL, NULL),
(17, 1, 'Kabupaten', 'Badung', '80351', NULL, NULL),
(18, 13, 'Kabupaten', 'Balangan', '71611', NULL, NULL),
(19, 15, 'Kota', 'Balikpapan', '76111', NULL, NULL),
(20, 21, 'Kota', 'Banda Aceh', '23238', NULL, NULL),
(21, 18, 'Kota', 'Bandar Lampung', '35139', NULL, NULL),
(22, 9, 'Kabupaten', 'Bandung', '40311', NULL, NULL),
(23, 9, 'Kota', 'Bandung', '40111', NULL, NULL),
(24, 9, 'Kabupaten', 'Bandung Barat', '40721', NULL, NULL),
(25, 29, 'Kabupaten', 'Banggai', '94711', NULL, NULL),
(26, 29, 'Kabupaten', 'Banggai Kepulauan', '94881', NULL, NULL),
(27, 2, 'Kabupaten', 'Bangka', '33212', NULL, NULL),
(28, 2, 'Kabupaten', 'Bangka Barat', '33315', NULL, NULL),
(29, 2, 'Kabupaten', 'Bangka Selatan', '33719', NULL, NULL),
(30, 2, 'Kabupaten', 'Bangka Tengah', '33613', NULL, NULL),
(31, 11, 'Kabupaten', 'Bangkalan', '69118', NULL, NULL),
(32, 1, 'Kabupaten', 'Bangli', '80619', NULL, NULL),
(33, 13, 'Kabupaten', 'Banjar', '70619', NULL, NULL),
(34, 9, 'Kota', 'Banjar', '46311', NULL, NULL),
(35, 13, 'Kota', 'Banjarbaru', '70712', NULL, NULL),
(36, 13, 'Kota', 'Banjarmasin', '70117', NULL, NULL),
(37, 10, 'Kabupaten', 'Banjarnegara', '53419', NULL, NULL),
(38, 28, 'Kabupaten', 'Bantaeng', '92411', NULL, NULL),
(39, 5, 'Kabupaten', 'Bantul', '55715', NULL, NULL),
(40, 33, 'Kabupaten', 'Banyuasin', '30911', NULL, NULL),
(41, 10, 'Kabupaten', 'Banyumas', '53114', NULL, NULL),
(42, 11, 'Kabupaten', 'Banyuwangi', '68416', NULL, NULL),
(43, 13, 'Kabupaten', 'Barito Kuala', '70511', NULL, NULL),
(44, 14, 'Kabupaten', 'Barito Selatan', '73711', NULL, NULL),
(45, 14, 'Kabupaten', 'Barito Timur', '73671', NULL, NULL),
(46, 14, 'Kabupaten', 'Barito Utara', '73881', NULL, NULL),
(47, 28, 'Kabupaten', 'Barru', '90719', NULL, NULL),
(48, 17, 'Kota', 'Batam', '29413', NULL, NULL),
(49, 10, 'Kabupaten', 'Batang', '51211', NULL, NULL),
(50, 8, 'Kabupaten', 'Batang Hari', '36613', NULL, NULL),
(51, 11, 'Kota', 'Batu', '65311', NULL, NULL),
(52, 34, 'Kabupaten', 'Batu Bara', '21655', NULL, NULL),
(53, 30, 'Kota', 'Bau-Bau', '93719', NULL, NULL),
(54, 9, 'Kabupaten', 'Bekasi', '17837', NULL, NULL),
(55, 9, 'Kota', 'Bekasi', '17121', NULL, NULL),
(56, 2, 'Kabupaten', 'Belitung', '33419', NULL, NULL),
(57, 2, 'Kabupaten', 'Belitung Timur', '33519', NULL, NULL),
(58, 23, 'Kabupaten', 'Belu', '85711', NULL, NULL),
(59, 21, 'Kabupaten', 'Bener Meriah', '24581', NULL, NULL),
(60, 26, 'Kabupaten', 'Bengkalis', '28719', NULL, NULL),
(61, 12, 'Kabupaten', 'Bengkayang', '79213', NULL, NULL),
(62, 4, 'Kota', 'Bengkulu', '38229', NULL, NULL),
(63, 4, 'Kabupaten', 'Bengkulu Selatan', '38519', NULL, NULL),
(64, 4, 'Kabupaten', 'Bengkulu Tengah', '38319', NULL, NULL),
(65, 4, 'Kabupaten', 'Bengkulu Utara', '38619', NULL, NULL),
(66, 15, 'Kabupaten', 'Berau', '77311', NULL, NULL),
(67, 24, 'Kabupaten', 'Biak Numfor', '98119', NULL, NULL),
(68, 22, 'Kabupaten', 'Bima', '84171', NULL, NULL),
(69, 22, 'Kota', 'Bima', '84139', NULL, NULL),
(70, 34, 'Kota', 'Binjai', '20712', NULL, NULL),
(71, 17, 'Kabupaten', 'Bintan', '29135', NULL, NULL),
(72, 21, 'Kabupaten', 'Bireuen', '24219', NULL, NULL),
(73, 31, 'Kota', 'Bitung', '95512', NULL, NULL),
(74, 11, 'Kabupaten', 'Blitar', '66171', NULL, NULL),
(75, 11, 'Kota', 'Blitar', '66124', NULL, NULL),
(76, 10, 'Kabupaten', 'Blora', '58219', NULL, NULL),
(77, 7, 'Kabupaten', 'Boalemo', '96319', NULL, NULL),
(78, 9, 'Kabupaten', 'Bogor', '16911', NULL, NULL),
(79, 9, 'Kota', 'Bogor', '16119', NULL, NULL),
(80, 11, 'Kabupaten', 'Bojonegoro', '62119', NULL, NULL),
(81, 31, 'Kabupaten', 'Bolaang Mongondow (Bolmong)', '95755', NULL, NULL),
(82, 31, 'Kabupaten', 'Bolaang Mongondow Selatan', '95774', NULL, NULL),
(83, 31, 'Kabupaten', 'Bolaang Mongondow Timur', '95783', NULL, NULL),
(84, 31, 'Kabupaten', 'Bolaang Mongondow Utara', '95765', NULL, NULL),
(85, 30, 'Kabupaten', 'Bombana', '93771', NULL, NULL),
(86, 11, 'Kabupaten', 'Bondowoso', '68219', NULL, NULL),
(87, 28, 'Kabupaten', 'Bone', '92713', NULL, NULL),
(88, 7, 'Kabupaten', 'Bone Bolango', '96511', NULL, NULL),
(89, 15, 'Kota', 'Bontang', '75313', NULL, NULL),
(90, 24, 'Kabupaten', 'Boven Digoel', '99662', NULL, NULL),
(91, 10, 'Kabupaten', 'Boyolali', '57312', NULL, NULL),
(92, 10, 'Kabupaten', 'Brebes', '52212', NULL, NULL),
(93, 32, 'Kota', 'Bukittinggi', '26115', NULL, NULL),
(94, 1, 'Kabupaten', 'Buleleng', '81111', NULL, NULL),
(95, 28, 'Kabupaten', 'Bulukumba', '92511', NULL, NULL),
(96, 16, 'Kabupaten', 'Bulungan (Bulongan)', '77211', NULL, NULL),
(97, 8, 'Kabupaten', 'Bungo', '37216', NULL, NULL),
(98, 29, 'Kabupaten', 'Buol', '94564', NULL, NULL),
(99, 19, 'Kabupaten', 'Buru', '97371', NULL, NULL),
(100, 19, 'Kabupaten', 'Buru Selatan', '97351', NULL, NULL),
(101, 30, 'Kabupaten', 'Buton', '93754', NULL, NULL),
(102, 30, 'Kabupaten', 'Buton Utara', '93745', NULL, NULL),
(103, 9, 'Kabupaten', 'Ciamis', '46211', NULL, NULL),
(104, 9, 'Kabupaten', 'Cianjur', '43217', NULL, NULL),
(105, 10, 'Kabupaten', 'Cilacap', '53211', NULL, NULL),
(106, 3, 'Kota', 'Cilegon', '42417', NULL, NULL),
(107, 9, 'Kota', 'Cimahi', '40512', NULL, NULL),
(108, 9, 'Kabupaten', 'Cirebon', '45611', NULL, NULL),
(109, 9, 'Kota', 'Cirebon', '45116', NULL, NULL),
(110, 34, 'Kabupaten', 'Dairi', '22211', NULL, NULL),
(111, 24, 'Kabupaten', 'Deiyai (Deliyai)', '98784', NULL, NULL),
(112, 34, 'Kabupaten', 'Deli Serdang', '20511', NULL, NULL),
(113, 10, 'Kabupaten', 'Demak', '59519', NULL, NULL),
(114, 1, 'Kota', 'Denpasar', '80227', NULL, NULL),
(115, 9, 'Kota', 'Depok', '16416', NULL, NULL),
(116, 32, 'Kabupaten', 'Dharmasraya', '27612', NULL, NULL),
(117, 24, 'Kabupaten', 'Dogiyai', '98866', NULL, NULL),
(118, 22, 'Kabupaten', 'Dompu', '84217', NULL, NULL),
(119, 29, 'Kabupaten', 'Donggala', '94341', NULL, NULL),
(120, 26, 'Kota', 'Dumai', '28811', NULL, NULL),
(121, 33, 'Kabupaten', 'Empat Lawang', '31811', NULL, NULL),
(122, 23, 'Kabupaten', 'Ende', '86351', NULL, NULL),
(123, 28, 'Kabupaten', 'Enrekang', '91719', NULL, NULL),
(124, 25, 'Kabupaten', 'Fakfak', '98651', NULL, NULL),
(125, 23, 'Kabupaten', 'Flores Timur', '86213', NULL, NULL),
(126, 9, 'Kabupaten', 'Garut', '44126', NULL, NULL),
(127, 21, 'Kabupaten', 'Gayo Lues', '24653', NULL, NULL),
(128, 1, 'Kabupaten', 'Gianyar', '80519', NULL, NULL),
(129, 7, 'Kabupaten', 'Gorontalo', '96218', NULL, NULL),
(130, 7, 'Kota', 'Gorontalo', '96115', NULL, NULL),
(131, 7, 'Kabupaten', 'Gorontalo Utara', '96611', NULL, NULL),
(132, 28, 'Kabupaten', 'Gowa', '92111', NULL, NULL),
(133, 11, 'Kabupaten', 'Gresik', '61115', NULL, NULL),
(134, 10, 'Kabupaten', 'Grobogan', '58111', NULL, NULL),
(135, 5, 'Kabupaten', 'Gunung Kidul', '55812', NULL, NULL),
(136, 14, 'Kabupaten', 'Gunung Mas', '74511', NULL, NULL),
(137, 34, 'Kota', 'Gunungsitoli', '22813', NULL, NULL),
(138, 20, 'Kabupaten', 'Halmahera Barat', '97757', NULL, NULL),
(139, 20, 'Kabupaten', 'Halmahera Selatan', '97911', NULL, NULL),
(140, 20, 'Kabupaten', 'Halmahera Tengah', '97853', NULL, NULL),
(141, 20, 'Kabupaten', 'Halmahera Timur', '97862', NULL, NULL),
(142, 20, 'Kabupaten', 'Halmahera Utara', '97762', NULL, NULL),
(143, 13, 'Kabupaten', 'Hulu Sungai Selatan', '71212', NULL, NULL),
(144, 13, 'Kabupaten', 'Hulu Sungai Tengah', '71313', NULL, NULL),
(145, 13, 'Kabupaten', 'Hulu Sungai Utara', '71419', NULL, NULL),
(146, 34, 'Kabupaten', 'Humbang Hasundutan', '22457', NULL, NULL),
(147, 26, 'Kabupaten', 'Indragiri Hilir', '29212', NULL, NULL),
(148, 26, 'Kabupaten', 'Indragiri Hulu', '29319', NULL, NULL),
(149, 9, 'Kabupaten', 'Indramayu', '45214', NULL, NULL),
(150, 24, 'Kabupaten', 'Intan Jaya', '98771', NULL, NULL),
(151, 6, 'Kota', 'Jakarta Barat', '11220', NULL, NULL),
(152, 6, 'Kota', 'Jakarta Pusat', '10540', NULL, NULL),
(153, 6, 'Kota', 'Jakarta Selatan', '12230', NULL, NULL),
(154, 6, 'Kota', 'Jakarta Timur', '13330', NULL, NULL),
(155, 6, 'Kota', 'Jakarta Utara', '14140', NULL, NULL),
(156, 8, 'Kota', 'Jambi', '36111', NULL, NULL),
(157, 24, 'Kabupaten', 'Jayapura', '99352', NULL, NULL),
(158, 24, 'Kota', 'Jayapura', '99114', NULL, NULL),
(159, 24, 'Kabupaten', 'Jayawijaya', '99511', NULL, NULL),
(160, 11, 'Kabupaten', 'Jember', '68113', NULL, NULL),
(161, 1, 'Kabupaten', 'Jembrana', '82251', NULL, NULL),
(162, 28, 'Kabupaten', 'Jeneponto', '92319', NULL, NULL),
(163, 10, 'Kabupaten', 'Jepara', '59419', NULL, NULL),
(164, 11, 'Kabupaten', 'Jombang', '61415', NULL, NULL),
(165, 25, 'Kabupaten', 'Kaimana', '98671', NULL, NULL),
(166, 26, 'Kabupaten', 'Kampar', '28411', NULL, NULL),
(167, 14, 'Kabupaten', 'Kapuas', '73583', NULL, NULL),
(168, 12, 'Kabupaten', 'Kapuas Hulu', '78719', NULL, NULL),
(169, 10, 'Kabupaten', 'Karanganyar', '57718', NULL, NULL),
(170, 1, 'Kabupaten', 'Karangasem', '80819', NULL, NULL),
(171, 9, 'Kabupaten', 'Karawang', '41311', NULL, NULL),
(172, 17, 'Kabupaten', 'Karimun', '29611', NULL, NULL),
(173, 34, 'Kabupaten', 'Karo', '22119', NULL, NULL),
(174, 14, 'Kabupaten', 'Katingan', '74411', NULL, NULL),
(175, 4, 'Kabupaten', 'Kaur', '38911', NULL, NULL),
(176, 12, 'Kabupaten', 'Kayong Utara', '78852', NULL, NULL),
(177, 10, 'Kabupaten', 'Kebumen', '54319', NULL, NULL),
(178, 11, 'Kabupaten', 'Kediri', '64184', NULL, NULL),
(179, 11, 'Kota', 'Kediri', '64125', NULL, NULL),
(180, 24, 'Kabupaten', 'Keerom', '99461', NULL, NULL),
(181, 10, 'Kabupaten', 'Kendal', '51314', NULL, NULL),
(182, 30, 'Kota', 'Kendari', '93126', NULL, NULL),
(183, 4, 'Kabupaten', 'Kepahiang', '39319', NULL, NULL),
(184, 17, 'Kabupaten', 'Kepulauan Anambas', '29991', NULL, NULL),
(185, 19, 'Kabupaten', 'Kepulauan Aru', '97681', NULL, NULL),
(186, 32, 'Kabupaten', 'Kepulauan Mentawai', '25771', NULL, NULL),
(187, 26, 'Kabupaten', 'Kepulauan Meranti', '28791', NULL, NULL),
(188, 31, 'Kabupaten', 'Kepulauan Sangihe', '95819', NULL, NULL),
(189, 6, 'Kabupaten', 'Kepulauan Seribu', '14550', NULL, NULL),
(190, 31, 'Kabupaten', 'Kepulauan Siau Tagulandang Biaro (Sitaro)', '95862', NULL, NULL),
(191, 20, 'Kabupaten', 'Kepulauan Sula', '97995', NULL, NULL),
(192, 31, 'Kabupaten', 'Kepulauan Talaud', '95885', NULL, NULL),
(193, 24, 'Kabupaten', 'Kepulauan Yapen (Yapen Waropen)', '98211', NULL, NULL),
(194, 8, 'Kabupaten', 'Kerinci', '37167', NULL, NULL),
(195, 12, 'Kabupaten', 'Ketapang', '78874', NULL, NULL),
(196, 10, 'Kabupaten', 'Klaten', '57411', NULL, NULL),
(197, 1, 'Kabupaten', 'Klungkung', '80719', NULL, NULL),
(198, 30, 'Kabupaten', 'Kolaka', '93511', NULL, NULL),
(199, 30, 'Kabupaten', 'Kolaka Utara', '93911', NULL, NULL),
(200, 30, 'Kabupaten', 'Konawe', '93411', NULL, NULL),
(201, 30, 'Kabupaten', 'Konawe Selatan', '93811', NULL, NULL),
(202, 30, 'Kabupaten', 'Konawe Utara', '93311', NULL, NULL),
(203, 13, 'Kabupaten', 'Kotabaru', '72119', NULL, NULL),
(204, 31, 'Kota', 'Kotamobagu', '95711', NULL, NULL),
(205, 14, 'Kabupaten', 'Kotawaringin Barat', '74119', NULL, NULL),
(206, 14, 'Kabupaten', 'Kotawaringin Timur', '74364', NULL, NULL),
(207, 26, 'Kabupaten', 'Kuantan Singingi', '29519', NULL, NULL),
(208, 12, 'Kabupaten', 'Kubu Raya', '78311', NULL, NULL),
(209, 10, 'Kabupaten', 'Kudus', '59311', NULL, NULL),
(210, 5, 'Kabupaten', 'Kulon Progo', '55611', NULL, NULL),
(211, 9, 'Kabupaten', 'Kuningan', '45511', NULL, NULL),
(212, 23, 'Kabupaten', 'Kupang', '85362', NULL, NULL),
(213, 23, 'Kota', 'Kupang', '85119', NULL, NULL),
(214, 15, 'Kabupaten', 'Kutai Barat', '75711', NULL, NULL),
(215, 15, 'Kabupaten', 'Kutai Kartanegara', '75511', NULL, NULL),
(216, 15, 'Kabupaten', 'Kutai Timur', '75611', NULL, NULL),
(217, 34, 'Kabupaten', 'Labuhan Batu', '21412', NULL, NULL),
(218, 34, 'Kabupaten', 'Labuhan Batu Selatan', '21511', NULL, NULL),
(219, 34, 'Kabupaten', 'Labuhan Batu Utara', '21711', NULL, NULL),
(220, 33, 'Kabupaten', 'Lahat', '31419', NULL, NULL),
(221, 14, 'Kabupaten', 'Lamandau', '74611', NULL, NULL),
(222, 11, 'Kabupaten', 'Lamongan', '64125', NULL, NULL),
(223, 18, 'Kabupaten', 'Lampung Barat', '34814', NULL, NULL),
(224, 18, 'Kabupaten', 'Lampung Selatan', '35511', NULL, NULL),
(225, 18, 'Kabupaten', 'Lampung Tengah', '34212', NULL, NULL),
(226, 18, 'Kabupaten', 'Lampung Timur', '34319', NULL, NULL),
(227, 18, 'Kabupaten', 'Lampung Utara', '34516', NULL, NULL),
(228, 12, 'Kabupaten', 'Landak', '78319', NULL, NULL),
(229, 34, 'Kabupaten', 'Langkat', '20811', NULL, NULL),
(230, 21, 'Kota', 'Langsa', '24412', NULL, NULL),
(231, 24, 'Kabupaten', 'Lanny Jaya', '99531', NULL, NULL),
(232, 3, 'Kabupaten', 'Lebak', '42319', NULL, NULL),
(233, 4, 'Kabupaten', 'Lebong', '39264', NULL, NULL),
(234, 23, 'Kabupaten', 'Lembata', '86611', NULL, NULL),
(235, 21, 'Kota', 'Lhokseumawe', '24352', NULL, NULL),
(236, 32, 'Kabupaten', 'Lima Puluh Koto/Kota', '26671', NULL, NULL),
(237, 17, 'Kabupaten', 'Lingga', '29811', NULL, NULL),
(238, 22, 'Kabupaten', 'Lombok Barat', '83311', NULL, NULL),
(239, 22, 'Kabupaten', 'Lombok Tengah', '83511', NULL, NULL),
(240, 22, 'Kabupaten', 'Lombok Timur', '83612', NULL, NULL),
(241, 22, 'Kabupaten', 'Lombok Utara', '83711', NULL, NULL),
(242, 33, 'Kota', 'Lubuk Linggau', '31614', NULL, NULL),
(243, 11, 'Kabupaten', 'Lumajang', '67319', NULL, NULL),
(244, 28, 'Kabupaten', 'Luwu', '91994', NULL, NULL),
(245, 28, 'Kabupaten', 'Luwu Timur', '92981', NULL, NULL),
(246, 28, 'Kabupaten', 'Luwu Utara', '92911', NULL, NULL),
(247, 11, 'Kabupaten', 'Madiun', '63153', NULL, NULL),
(248, 11, 'Kota', 'Madiun', '63122', NULL, NULL),
(249, 10, 'Kabupaten', 'Magelang', '56519', NULL, NULL),
(250, 10, 'Kota', 'Magelang', '56133', NULL, NULL),
(251, 11, 'Kabupaten', 'Magetan', '63314', NULL, NULL),
(252, 9, 'Kabupaten', 'Majalengka', '45412', NULL, NULL),
(253, 27, 'Kabupaten', 'Majene', '91411', NULL, NULL),
(254, 28, 'Kota', 'Makassar', '90111', NULL, NULL),
(255, 11, 'Kabupaten', 'Malang', '65163', NULL, NULL),
(256, 11, 'Kota', 'Malang', '65112', NULL, NULL),
(257, 16, 'Kabupaten', 'Malinau', '77511', NULL, NULL),
(258, 19, 'Kabupaten', 'Maluku Barat Daya', '97451', NULL, NULL),
(259, 19, 'Kabupaten', 'Maluku Tengah', '97513', NULL, NULL),
(260, 19, 'Kabupaten', 'Maluku Tenggara', '97651', NULL, NULL),
(261, 19, 'Kabupaten', 'Maluku Tenggara Barat', '97465', NULL, NULL),
(262, 27, 'Kabupaten', 'Mamasa', '91362', NULL, NULL),
(263, 24, 'Kabupaten', 'Mamberamo Raya', '99381', NULL, NULL),
(264, 24, 'Kabupaten', 'Mamberamo Tengah', '99553', NULL, NULL),
(265, 27, 'Kabupaten', 'Mamuju', '91519', NULL, NULL),
(266, 27, 'Kabupaten', 'Mamuju Utara', '91571', NULL, NULL),
(267, 31, 'Kota', 'Manado', '95247', NULL, NULL),
(268, 34, 'Kabupaten', 'Mandailing Natal', '22916', NULL, NULL),
(269, 23, 'Kabupaten', 'Manggarai', '86551', NULL, NULL),
(270, 23, 'Kabupaten', 'Manggarai Barat', '86711', NULL, NULL),
(271, 23, 'Kabupaten', 'Manggarai Timur', '86811', NULL, NULL),
(272, 25, 'Kabupaten', 'Manokwari', '98311', NULL, NULL),
(273, 25, 'Kabupaten', 'Manokwari Selatan', '98355', NULL, NULL),
(274, 24, 'Kabupaten', 'Mappi', '99853', NULL, NULL),
(275, 28, 'Kabupaten', 'Maros', '90511', NULL, NULL),
(276, 22, 'Kota', 'Mataram', '83131', NULL, NULL),
(277, 25, 'Kabupaten', 'Maybrat', '98051', NULL, NULL),
(278, 34, 'Kota', 'Medan', '20228', NULL, NULL),
(279, 12, 'Kabupaten', 'Melawi', '78619', NULL, NULL),
(280, 8, 'Kabupaten', 'Merangin', '37319', NULL, NULL),
(281, 24, 'Kabupaten', 'Merauke', '99613', NULL, NULL),
(282, 18, 'Kabupaten', 'Mesuji', '34911', NULL, NULL),
(283, 18, 'Kota', 'Metro', '34111', NULL, NULL),
(284, 24, 'Kabupaten', 'Mimika', '99962', NULL, NULL),
(285, 31, 'Kabupaten', 'Minahasa', '95614', NULL, NULL),
(286, 31, 'Kabupaten', 'Minahasa Selatan', '95914', NULL, NULL),
(287, 31, 'Kabupaten', 'Minahasa Tenggara', '95995', NULL, NULL),
(288, 31, 'Kabupaten', 'Minahasa Utara', '95316', NULL, NULL),
(289, 11, 'Kabupaten', 'Mojokerto', '61382', NULL, NULL),
(290, 11, 'Kota', 'Mojokerto', '61316', NULL, NULL),
(291, 29, 'Kabupaten', 'Morowali', '94911', NULL, NULL),
(292, 33, 'Kabupaten', 'Muara Enim', '31315', NULL, NULL),
(293, 8, 'Kabupaten', 'Muaro Jambi', '36311', NULL, NULL),
(294, 4, 'Kabupaten', 'Muko Muko', '38715', NULL, NULL),
(295, 30, 'Kabupaten', 'Muna', '93611', NULL, NULL),
(296, 14, 'Kabupaten', 'Murung Raya', '73911', NULL, NULL),
(297, 33, 'Kabupaten', 'Musi Banyuasin', '30719', NULL, NULL),
(298, 33, 'Kabupaten', 'Musi Rawas', '31661', NULL, NULL),
(299, 24, 'Kabupaten', 'Nabire', '98816', NULL, NULL),
(300, 21, 'Kabupaten', 'Nagan Raya', '23674', NULL, NULL),
(301, 23, 'Kabupaten', 'Nagekeo', '86911', NULL, NULL),
(302, 17, 'Kabupaten', 'Natuna', '29711', NULL, NULL),
(303, 24, 'Kabupaten', 'Nduga', '99541', NULL, NULL),
(304, 23, 'Kabupaten', 'Ngada', '86413', NULL, NULL),
(305, 11, 'Kabupaten', 'Nganjuk', '64414', NULL, NULL),
(306, 11, 'Kabupaten', 'Ngawi', '63219', NULL, NULL),
(307, 34, 'Kabupaten', 'Nias', '22876', NULL, NULL),
(308, 34, 'Kabupaten', 'Nias Barat', '22895', NULL, NULL),
(309, 34, 'Kabupaten', 'Nias Selatan', '22865', NULL, NULL),
(310, 34, 'Kabupaten', 'Nias Utara', '22856', NULL, NULL),
(311, 16, 'Kabupaten', 'Nunukan', '77421', NULL, NULL),
(312, 33, 'Kabupaten', 'Ogan Ilir', '30811', NULL, NULL),
(313, 33, 'Kabupaten', 'Ogan Komering Ilir', '30618', NULL, NULL),
(314, 33, 'Kabupaten', 'Ogan Komering Ulu', '32112', NULL, NULL),
(315, 33, 'Kabupaten', 'Ogan Komering Ulu Selatan', '32211', NULL, NULL),
(316, 33, 'Kabupaten', 'Ogan Komering Ulu Timur', '32312', NULL, NULL),
(317, 11, 'Kabupaten', 'Pacitan', '63512', NULL, NULL),
(318, 32, 'Kota', 'Padang', '25112', NULL, NULL),
(319, 34, 'Kabupaten', 'Padang Lawas', '22763', NULL, NULL),
(320, 34, 'Kabupaten', 'Padang Lawas Utara', '22753', NULL, NULL),
(321, 32, 'Kota', 'Padang Panjang', '27122', NULL, NULL),
(322, 32, 'Kabupaten', 'Padang Pariaman', '25583', NULL, NULL),
(323, 34, 'Kota', 'Padang Sidempuan', '22727', NULL, NULL),
(324, 33, 'Kota', 'Pagar Alam', '31512', NULL, NULL),
(325, 34, 'Kabupaten', 'Pakpak Bharat', '22272', NULL, NULL),
(326, 14, 'Kota', 'Palangka Raya', '73112', NULL, NULL),
(327, 33, 'Kota', 'Palembang', '30111', NULL, NULL),
(328, 28, 'Kota', 'Palopo', '91911', NULL, NULL),
(329, 29, 'Kota', 'Palu', '94111', NULL, NULL),
(330, 11, 'Kabupaten', 'Pamekasan', '69319', NULL, NULL),
(331, 3, 'Kabupaten', 'Pandeglang', '42212', NULL, NULL),
(332, 9, 'Kabupaten', 'Pangandaran', '46511', NULL, NULL),
(333, 28, 'Kabupaten', 'Pangkajene Kepulauan', '90611', NULL, NULL),
(334, 2, 'Kota', 'Pangkal Pinang', '33115', NULL, NULL),
(335, 24, 'Kabupaten', 'Paniai', '98765', NULL, NULL),
(336, 28, 'Kota', 'Parepare', '91123', NULL, NULL),
(337, 32, 'Kota', 'Pariaman', '25511', NULL, NULL),
(338, 29, 'Kabupaten', 'Parigi Moutong', '94411', NULL, NULL),
(339, 32, 'Kabupaten', 'Pasaman', '26318', NULL, NULL),
(340, 32, 'Kabupaten', 'Pasaman Barat', '26511', NULL, NULL),
(341, 15, 'Kabupaten', 'Paser', '76211', NULL, NULL),
(342, 11, 'Kabupaten', 'Pasuruan', '67153', NULL, NULL),
(343, 11, 'Kota', 'Pasuruan', '67118', NULL, NULL),
(344, 10, 'Kabupaten', 'Pati', '59114', NULL, NULL),
(345, 32, 'Kota', 'Payakumbuh', '26213', NULL, NULL),
(346, 25, 'Kabupaten', 'Pegunungan Arfak', '98354', NULL, NULL),
(347, 24, 'Kabupaten', 'Pegunungan Bintang', '99573', NULL, NULL),
(348, 10, 'Kabupaten', 'Pekalongan', '51161', NULL, NULL),
(349, 10, 'Kota', 'Pekalongan', '51122', NULL, NULL),
(350, 26, 'Kota', 'Pekanbaru', '28112', NULL, NULL),
(351, 26, 'Kabupaten', 'Pelalawan', '28311', NULL, NULL),
(352, 10, 'Kabupaten', 'Pemalang', '52319', NULL, NULL),
(353, 34, 'Kota', 'Pematang Siantar', '21126', NULL, NULL),
(354, 15, 'Kabupaten', 'Penajam Paser Utara', '76311', NULL, NULL),
(355, 18, 'Kabupaten', 'Pesawaran', '35312', NULL, NULL),
(356, 18, 'Kabupaten', 'Pesisir Barat', '35974', NULL, NULL),
(357, 32, 'Kabupaten', 'Pesisir Selatan', '25611', NULL, NULL),
(358, 21, 'Kabupaten', 'Pidie', '24116', NULL, NULL),
(359, 21, 'Kabupaten', 'Pidie Jaya', '24186', NULL, NULL),
(360, 28, 'Kabupaten', 'Pinrang', '91251', NULL, NULL),
(361, 7, 'Kabupaten', 'Pohuwato', '96419', NULL, NULL),
(362, 27, 'Kabupaten', 'Polewali Mandar', '91311', NULL, NULL),
(363, 11, 'Kabupaten', 'Ponorogo', '63411', NULL, NULL),
(364, 12, 'Kabupaten', 'Pontianak', '78971', NULL, NULL),
(365, 12, 'Kota', 'Pontianak', '78112', NULL, NULL),
(366, 29, 'Kabupaten', 'Poso', '94615', NULL, NULL),
(367, 33, 'Kota', 'Prabumulih', '31121', NULL, NULL),
(368, 18, 'Kabupaten', 'Pringsewu', '35719', NULL, NULL),
(369, 11, 'Kabupaten', 'Probolinggo', '67282', NULL, NULL),
(370, 11, 'Kota', 'Probolinggo', '67215', NULL, NULL),
(371, 14, 'Kabupaten', 'Pulang Pisau', '74811', NULL, NULL),
(372, 20, 'Kabupaten', 'Pulau Morotai', '97771', NULL, NULL),
(373, 24, 'Kabupaten', 'Puncak', '98981', NULL, NULL),
(374, 24, 'Kabupaten', 'Puncak Jaya', '98979', NULL, NULL),
(375, 10, 'Kabupaten', 'Purbalingga', '53312', NULL, NULL),
(376, 9, 'Kabupaten', 'Purwakarta', '41119', NULL, NULL),
(377, 10, 'Kabupaten', 'Purworejo', '54111', NULL, NULL),
(378, 25, 'Kabupaten', 'Raja Ampat', '98489', NULL, NULL),
(379, 4, 'Kabupaten', 'Rejang Lebong', '39112', NULL, NULL),
(380, 10, 'Kabupaten', 'Rembang', '59219', NULL, NULL),
(381, 26, 'Kabupaten', 'Rokan Hilir', '28992', NULL, NULL),
(382, 26, 'Kabupaten', 'Rokan Hulu', '28511', NULL, NULL),
(383, 23, 'Kabupaten', 'Rote Ndao', '85982', NULL, NULL),
(384, 21, 'Kota', 'Sabang', '23512', NULL, NULL),
(385, 23, 'Kabupaten', 'Sabu Raijua', '85391', NULL, NULL),
(386, 10, 'Kota', 'Salatiga', '50711', NULL, NULL),
(387, 15, 'Kota', 'Samarinda', '75133', NULL, NULL),
(388, 12, 'Kabupaten', 'Sambas', '79453', NULL, NULL),
(389, 34, 'Kabupaten', 'Samosir', '22392', NULL, NULL),
(390, 11, 'Kabupaten', 'Sampang', '69219', NULL, NULL),
(391, 12, 'Kabupaten', 'Sanggau', '78557', NULL, NULL),
(392, 24, 'Kabupaten', 'Sarmi', '99373', NULL, NULL),
(393, 8, 'Kabupaten', 'Sarolangun', '37419', NULL, NULL),
(394, 32, 'Kota', 'Sawah Lunto', '27416', NULL, NULL),
(395, 12, 'Kabupaten', 'Sekadau', '79583', NULL, NULL),
(396, 28, 'Kabupaten', 'Selayar (Kepulauan Selayar)', '92812', NULL, NULL),
(397, 4, 'Kabupaten', 'Seluma', '38811', NULL, NULL),
(398, 10, 'Kabupaten', 'Semarang', '50511', NULL, NULL),
(399, 10, 'Kota', 'Semarang', '50135', NULL, NULL),
(400, 19, 'Kabupaten', 'Seram Bagian Barat', '97561', NULL, NULL),
(401, 19, 'Kabupaten', 'Seram Bagian Timur', '97581', NULL, NULL),
(402, 3, 'Kabupaten', 'Serang', '42182', NULL, NULL),
(403, 3, 'Kota', 'Serang', '42111', NULL, NULL),
(404, 34, 'Kabupaten', 'Serdang Bedagai', '20915', NULL, NULL),
(405, 14, 'Kabupaten', 'Seruyan', '74211', NULL, NULL),
(406, 26, 'Kabupaten', 'Siak', '28623', NULL, NULL),
(407, 34, 'Kota', 'Sibolga', '22522', NULL, NULL),
(408, 28, 'Kabupaten', 'Sidenreng Rappang/Rapang', '91613', NULL, NULL),
(409, 11, 'Kabupaten', 'Sidoarjo', '61219', NULL, NULL),
(410, 29, 'Kabupaten', 'Sigi', '94364', NULL, NULL),
(411, 32, 'Kabupaten', 'Sijunjung (Sawah Lunto Sijunjung)', '27511', NULL, NULL),
(412, 23, 'Kabupaten', 'Sikka', '86121', NULL, NULL),
(413, 34, 'Kabupaten', 'Simalungun', '21162', NULL, NULL),
(414, 21, 'Kabupaten', 'Simeulue', '23891', NULL, NULL),
(415, 12, 'Kota', 'Singkawang', '79117', NULL, NULL),
(416, 28, 'Kabupaten', 'Sinjai', '92615', NULL, NULL),
(417, 12, 'Kabupaten', 'Sintang', '78619', NULL, NULL),
(418, 11, 'Kabupaten', 'Situbondo', '68316', NULL, NULL),
(419, 5, 'Kabupaten', 'Sleman', '55513', NULL, NULL),
(420, 32, 'Kabupaten', 'Solok', '27365', NULL, NULL),
(421, 32, 'Kota', 'Solok', '27315', NULL, NULL),
(422, 32, 'Kabupaten', 'Solok Selatan', '27779', NULL, NULL),
(423, 28, 'Kabupaten', 'Soppeng', '90812', NULL, NULL),
(424, 25, 'Kabupaten', 'Sorong', '98431', NULL, NULL),
(425, 25, 'Kota', 'Sorong', '98411', NULL, NULL),
(426, 25, 'Kabupaten', 'Sorong Selatan', '98454', NULL, NULL),
(427, 10, 'Kabupaten', 'Sragen', '57211', NULL, NULL),
(428, 9, 'Kabupaten', 'Subang', '41215', NULL, NULL),
(429, 21, 'Kota', 'Subulussalam', '24882', NULL, NULL),
(430, 9, 'Kabupaten', 'Sukabumi', '43311', NULL, NULL),
(431, 9, 'Kota', 'Sukabumi', '43114', NULL, NULL),
(432, 14, 'Kabupaten', 'Sukamara', '74712', NULL, NULL),
(433, 10, 'Kabupaten', 'Sukoharjo', '57514', NULL, NULL),
(434, 23, 'Kabupaten', 'Sumba Barat', '87219', NULL, NULL),
(435, 23, 'Kabupaten', 'Sumba Barat Daya', '87453', NULL, NULL),
(436, 23, 'Kabupaten', 'Sumba Tengah', '87358', NULL, NULL),
(437, 23, 'Kabupaten', 'Sumba Timur', '87112', NULL, NULL),
(438, 22, 'Kabupaten', 'Sumbawa', '84315', NULL, NULL),
(439, 22, 'Kabupaten', 'Sumbawa Barat', '84419', NULL, NULL),
(440, 9, 'Kabupaten', 'Sumedang', '45326', NULL, NULL),
(441, 11, 'Kabupaten', 'Sumenep', '69413', NULL, NULL),
(442, 8, 'Kota', 'Sungaipenuh', '37113', NULL, NULL),
(443, 24, 'Kabupaten', 'Supiori', '98164', NULL, NULL),
(444, 11, 'Kota', 'Surabaya', '60119', NULL, NULL),
(445, 10, 'Kota', 'Surakarta (Solo)', '57113', NULL, NULL),
(446, 13, 'Kabupaten', 'Tabalong', '71513', NULL, NULL),
(447, 1, 'Kabupaten', 'Tabanan', '82119', NULL, NULL),
(448, 28, 'Kabupaten', 'Takalar', '92212', NULL, NULL),
(449, 25, 'Kabupaten', 'Tambrauw', '98475', NULL, NULL),
(450, 16, 'Kabupaten', 'Tana Tidung', '77611', NULL, NULL),
(451, 28, 'Kabupaten', 'Tana Toraja', '91819', NULL, NULL),
(452, 13, 'Kabupaten', 'Tanah Bumbu', '72211', NULL, NULL),
(453, 32, 'Kabupaten', 'Tanah Datar', '27211', NULL, NULL),
(454, 13, 'Kabupaten', 'Tanah Laut', '70811', NULL, NULL),
(455, 3, 'Kabupaten', 'Tangerang', '15914', NULL, NULL),
(456, 3, 'Kota', 'Tangerang', '15111', NULL, NULL),
(457, 3, 'Kota', 'Tangerang Selatan', '15435', NULL, NULL),
(458, 18, 'Kabupaten', 'Tanggamus', '35619', NULL, NULL),
(459, 34, 'Kota', 'Tanjung Balai', '21321', NULL, NULL),
(460, 8, 'Kabupaten', 'Tanjung Jabung Barat', '36513', NULL, NULL),
(461, 8, 'Kabupaten', 'Tanjung Jabung Timur', '36719', NULL, NULL),
(462, 17, 'Kota', 'Tanjung Pinang', '29111', NULL, NULL),
(463, 34, 'Kabupaten', 'Tapanuli Selatan', '22742', NULL, NULL),
(464, 34, 'Kabupaten', 'Tapanuli Tengah', '22611', NULL, NULL),
(465, 34, 'Kabupaten', 'Tapanuli Utara', '22414', NULL, NULL),
(466, 13, 'Kabupaten', 'Tapin', '71119', NULL, NULL),
(467, 16, 'Kota', 'Tarakan', '77114', NULL, NULL),
(468, 9, 'Kabupaten', 'Tasikmalaya', '46411', NULL, NULL),
(469, 9, 'Kota', 'Tasikmalaya', '46116', NULL, NULL),
(470, 34, 'Kota', 'Tebing Tinggi', '20632', NULL, NULL),
(471, 8, 'Kabupaten', 'Tebo', '37519', NULL, NULL),
(472, 10, 'Kabupaten', 'Tegal', '52419', NULL, NULL),
(473, 10, 'Kota', 'Tegal', '52114', NULL, NULL),
(474, 25, 'Kabupaten', 'Teluk Bintuni', '98551', NULL, NULL),
(475, 25, 'Kabupaten', 'Teluk Wondama', '98591', NULL, NULL),
(476, 10, 'Kabupaten', 'Temanggung', '56212', NULL, NULL),
(477, 20, 'Kota', 'Ternate', '97714', NULL, NULL),
(478, 20, 'Kota', 'Tidore Kepulauan', '97815', NULL, NULL),
(479, 23, 'Kabupaten', 'Timor Tengah Selatan', '85562', NULL, NULL),
(480, 23, 'Kabupaten', 'Timor Tengah Utara', '85612', NULL, NULL),
(481, 34, 'Kabupaten', 'Toba Samosir', '22316', NULL, NULL),
(482, 29, 'Kabupaten', 'Tojo Una-Una', '94683', NULL, NULL),
(483, 29, 'Kabupaten', 'Toli-Toli', '94542', NULL, NULL),
(484, 24, 'Kabupaten', 'Tolikara', '99411', NULL, NULL),
(485, 31, 'Kota', 'Tomohon', '95416', NULL, NULL),
(486, 28, 'Kabupaten', 'Toraja Utara', '91831', NULL, NULL),
(487, 11, 'Kabupaten', 'Trenggalek', '66312', NULL, NULL),
(488, 19, 'Kota', 'Tual', '97612', NULL, NULL),
(489, 11, 'Kabupaten', 'Tuban', '62319', NULL, NULL),
(490, 18, 'Kabupaten', 'Tulang Bawang', '34613', NULL, NULL),
(491, 18, 'Kabupaten', 'Tulang Bawang Barat', '34419', NULL, NULL),
(492, 11, 'Kabupaten', 'Tulungagung', '66212', NULL, NULL),
(493, 28, 'Kabupaten', 'Wajo', '90911', NULL, NULL),
(494, 30, 'Kabupaten', 'Wakatobi', '93791', NULL, NULL),
(495, 24, 'Kabupaten', 'Waropen', '98269', NULL, NULL),
(496, 18, 'Kabupaten', 'Way Kanan', '34711', NULL, NULL),
(497, 10, 'Kabupaten', 'Wonogiri', '57619', NULL, NULL),
(498, 10, 'Kabupaten', 'Wonosobo', '56311', NULL, NULL),
(499, 24, 'Kabupaten', 'Yahukimo', '99041', NULL, NULL),
(500, 24, 'Kabupaten', 'Yalimo', '99481', NULL, NULL),
(501, 5, 'Kota', 'Yogyakarta', '55111', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Blue', '2022-07-01 11:42:41', '2022-07-01 11:42:41'),
(3, 'Red', '2022-07-01 11:45:31', '2022-07-01 21:55:27'),
(4, 'Black', '2022-07-01 21:55:35', '2022-07-01 21:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_29_134728_create_categories_table', 1),
(6, '2022_04_03_162035_create_products_table', 1),
(7, '2022_04_07_170113_create_carts_table', 1),
(8, '2022_04_09_210912_create_orders_table', 1),
(9, '2022_04_09_211715_create_order_items_table', 1),
(10, '2022_04_11_041912_create_wishlists_table', 1),
(11, '2022_06_26_113216_create_table_provinces', 1),
(12, '2022_06_26_113225_create_table_cities', 1),
(13, '2022_07_01_143150_create_sizes_table', 1),
(14, '2022_07_01_143203_create_colors_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ongkir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mid` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fname`, `lname`, `email`, `phone`, `address1`, `address2`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `kode_pos`, `ongkir`, `total_price`, `status`, `payment_status`, `message`, `tracking_no`, `created_at`, `updated_at`, `mid`) VALUES
(9, 2, 'fa', 'ffa', 'fa@fa.com', '085640431181', 'a', 'a', '16', '257', 'A', 'A', 'a', '73000', '133000', 0, NULL, NULL, 'dsrv6941', '2022-07-02 05:48:30', '2022-07-02 05:48:30', '301207022022'),
(10, 3, 'tes', 'tes', 'e@g.com', '081354307748', 'Jalan MH Thamrin, Watampone', 'Gang depan Bakso Mantap', '1', '17', 'Tanete Riattang', 'Ta', '92712', '26000', '326000', 0, '3', NULL, 'dsrv9730', '2022-07-02 05:53:22', '2022-07-02 05:54:01', '221207022022'),
(11, 4, 'Fahriel', 'PB', 'fahrielpb@gmail.com', '081354307748', 'Jalan MH Thamrin, Watampone', 'Gang depan Bakso Mantap', '28', '38', 'Tanete Riattang', 'Ta', '92712', '46000', '166000', 0, '3', NULL, 'dsrv5910', '2022-07-02 21:25:09', '2022-07-02 21:25:55', '090407032022');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `prod_id` bigint(20) UNSIGNED NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`, `updated_at`, `color`, `size`) VALUES
(1, 9, 2, '1', '60000', '2022-07-02 05:48:30', '2022-07-02 05:48:30', 'Black', 'L'),
(2, 10, 1, '3', '60000', '2022-07-02 05:53:22', '2022-07-02 05:53:22', 'Blue', 'XL'),
(3, 10, 2, '2', '60000', '2022-07-02 05:53:22', '2022-07-02 05:53:22', 'Black', 'XL'),
(4, 11, 1, '2', '60000', '2022-07-02 21:25:09', '2022-07-02 21:25:09', 'Red', 'L');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cate_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `tax`, `size`, `color`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Polos', 'Polos', 'Polos', 'Polos', '50000', '60000', '[\"1656767718-2.jpg\"]', '85', '0', '[\"L\"]', '[\"Red\"]', 1, 1, 'polos', 'Polos', 'Polos', '2022-07-01 23:12:23', '2022-07-02 21:25:09'),
(2, 2, 'Slempang', 'Slempang', 'Slempang', 'Slempang', '50000', '60000', '[\"1656793923-2.jpg\",\"1656793923-3.jpg\",\"1656793923-4.jpg\",\"1656793923-5.jpg\"]', '84', '0', 'null', 'null', 1, 1, 'Slempang', 'Slempang', 'Slempang', '2022-07-02 00:11:06', '2022-07-02 13:32:03'),
(3, 1, 'Diserv T-Shirt Green Logo', 'Diserv T-Shirt Green Logo', 'Diserv T-Shirt Green Logo', 'Diserv T-Shirt Green Logo', '3000', '2000', '[\"1656767172-2.jpg\",\"1656767172-3.jpg\",\"1656767172-4.jpg\"]', '12', '5', 'null', 'null', 0, 0, 'Diserv T-Shirt Green Logo', 'baju', 'Diserv T-Shirt Green Logo', '2022-07-02 06:00:04', '2022-07-02 06:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province`, `created_at`, `updated_at`) VALUES
(1, 'Bali', NULL, NULL),
(2, 'Bangka Belitung', NULL, NULL),
(3, 'Banten', NULL, NULL),
(4, 'Bengkulu', NULL, NULL),
(5, 'DI Yogyakarta', NULL, NULL),
(6, 'DKI Jakarta', NULL, NULL),
(7, 'Gorontalo', NULL, NULL),
(8, 'Jambi', NULL, NULL),
(9, 'Jawa Barat', NULL, NULL),
(10, 'Jawa Tengah', NULL, NULL),
(11, 'Jawa Timur', NULL, NULL),
(12, 'Kalimantan Barat', NULL, NULL),
(13, 'Kalimantan Selatan', NULL, NULL),
(14, 'Kalimantan Tengah', NULL, NULL),
(15, 'Kalimantan Timur', NULL, NULL),
(16, 'Kalimantan Utara', NULL, NULL),
(17, 'Kepulauan Riau', NULL, NULL),
(18, 'Lampung', NULL, NULL),
(19, 'Maluku', NULL, NULL),
(20, 'Maluku Utara', NULL, NULL),
(21, 'Nanggroe Aceh Darussalam (NAD)', NULL, NULL),
(22, 'Nusa Tenggara Barat (NTB)', NULL, NULL),
(23, 'Nusa Tenggara Timur (NTT)', NULL, NULL),
(24, 'Papua', NULL, NULL),
(25, 'Papua Barat', NULL, NULL),
(26, 'Riau', NULL, NULL),
(27, 'Sulawesi Barat', NULL, NULL),
(28, 'Sulawesi Selatan', NULL, NULL),
(29, 'Sulawesi Tengah', NULL, NULL),
(30, 'Sulawesi Tenggara', NULL, NULL),
(31, 'Sulawesi Utara', NULL, NULL),
(32, 'Sumatera Barat', NULL, NULL),
(33, 'Sumatera Selatan', NULL, NULL),
(34, 'Sumatera Utara', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'L', '2022-07-01 11:08:21', '2022-07-01 11:08:21'),
(3, 'XL', '2022-07-01 11:09:14', '2022-07-01 11:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `email`, `email_verified_at`, `password`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'root', NULL, 'root@example.org', '2022-07-01 10:45:26', '$2y$10$2VGE.RAS3uTC3ScFtsn8Q.FGHNecRnJNQ4YncSsoZsKI0HxIOZDIa', 1, 'KjsHojuq7vVw1iSRgIvnWcjQodjQ7bcRtAha5qu25DVdoTvFp0jrZMaRAjem', '2022-07-01 10:45:26', '2022-07-01 10:45:26'),
(2, 'fa', 'ffa', 'fa@fa.com', NULL, '$2y$10$1826mTU3cek1KPoatJPpBOqUexJwxPd4nLiMSqB5/w5k6utauT2Xq', 0, NULL, '2022-07-01 23:21:03', '2022-07-01 23:21:03'),
(3, 'tes', 'tes', 'e@g.com', NULL, '$2y$10$p2uQjjTICsQaryNgRFAqk.7BddyWZd5OrxWyAFYBgXeOVqjU4KH32', 0, NULL, '2022-07-02 05:52:02', '2022-07-02 05:52:02'),
(4, 'Fahriel', 'PB', 'fahrielpb@gmail.com', NULL, '$2y$10$edM0oaOu162DsM4/wS991O75GszNyTrKPYJE3yWcwRUi9rC7qTu3m', 0, NULL, '2022-07-02 06:16:07', '2022-07-02 06:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `prod_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `prod_id`, `created_at`, `updated_at`) VALUES
(2, 2, 1, '2022-07-02 11:54:28', '2022-07-02 11:54:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_prod_id_foreign` (`prod_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_prod_id_foreign` (`prod_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_prod_id_foreign` (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
