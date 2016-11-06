-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2016 at 02:45 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `annasviaproduction_bc`
--

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` bigint(13) UNSIGNED NOT NULL,
  `captcha_time` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(16) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `word` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(231, 1478418028, '0.0.0.0', 'C4N5EJ2F'),
(230, 1478417978, '0.0.0.0', 'GZFSB88S');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biayakirim`
--

CREATE TABLE `tbl_biayakirim` (
  `id_biayakirim` bigint(20) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `biayakirim` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_biayakirim`
--

INSERT INTO `tbl_biayakirim` (`id_biayakirim`, `id_pengiriman`, `id_kota`, `biayakirim`) VALUES
(1, 1, 222, 20000),
(2, 1, 141, 17000),
(3, 2, 222, 14000),
(4, 2, 141, 9000),
(5, 1, 199, 21000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hubungi_kami`
--

CREATE TABLE `tbl_hubungi_kami` (
  `id_hubungi_kami` int(11) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `kota` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `negara` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_hubungi_kami`
--

INSERT INTO `tbl_hubungi_kami` (`id_hubungi_kami`, `nama`, `email`, `no_telp`, `alamat`, `kota`, `negara`, `pesan`) VALUES
(1, 'hehehhe', 'heheh@hehehe.com', '', 'jdbvhdfbcidcnidsc', 'ygya', 'Indonesia', 'djshbcdjsbcudesbew'),
(2, 'aasdslkx', 'heheh@hehehe.com', '984379213864', 'dsbjcdsbcjsbc', 'ygya', 'Indonesia', 'egajcbascba');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_katalog`
--

CREATE TABLE `tbl_katalog` (
  `id_katalog` int(3) NOT NULL,
  `judul_file` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nama_file` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_katalog`
--

INSERT INTO `tbl_katalog` (`id_katalog`, `judul_file`, `nama_file`, `tgl_posting`) VALUES
(10, 'Songkok/ Peci Bordir', '427672592.docx', '2014-02-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(3) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `kode_level` int(2) NOT NULL,
  `kode_parent` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `kode_level`, `kode_parent`) VALUES
(1, 'Peci Smok', 0, 0),
(45, 'cobacoba', 1, 3),
(2, 'Peci Rajut', 0, 0),
(3, 'Peci Bordir', 0, 0),
(4, 'Peci Polos', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kota`
--

CREATE TABLE `tbl_kota` (
  `id_kota` int(11) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `id_propinsi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kota`
--

INSERT INTO `tbl_kota` (`id_kota`, `kota`, `id_propinsi`) VALUES
(1, 'ACEH SELATAN', 1),
(2, 'ACEH TENGGARA', 1),
(3, 'ACEH TIMUR', 1),
(4, 'ACEH TENGAH', 1),
(5, 'ACEH BARAT', 1),
(6, 'ACEH BESAR', 1),
(7, 'PIDIE', 1),
(8, 'ACEH UTARA', 1),
(9, 'SIMEULUE', 1),
(10, 'ACEH SINGKIL', 1),
(11, 'BIREUN', 1),
(12, 'ACEH BARAT DAYA', 1),
(13, 'GAYO LUES', 1),
(14, 'ACEH JAYA', 1),
(15, 'NAGAN JAYA', 1),
(16, 'ACEH TAMIANG', 1),
(17, 'BENER MERIAH', 1),
(18, 'BANDA ACEH', 1),
(19, 'SABANG', 1),
(20, 'LHOKSEUMAWE', 1),
(21, 'LANGSA', 1),
(22, 'TAPANULI TENGAH', 2),
(23, 'TAPANULI UTARA', 2),
(24, 'TAPANULI SELATAN', 2),
(25, 'NIAS', 2),
(26, 'LANGKAT', 2),
(27, 'KARO', 2),
(28, 'DELI SERDANG', 2),
(29, 'SIMALUNGUN', 2),
(30, 'ASAHAN', 2),
(31, 'LABUHAN BATU', 2),
(32, 'DAIRI', 2),
(33, 'TOBA SAMOSIR', 2),
(34, 'MANDAILING NATAL', 2),
(35, 'NIAS SELATAN', 2),
(36, 'PAKPAK BARAT', 2),
(37, 'HUMBANG HASUNDUTAN', 2),
(38, 'SAMOSIR', 2),
(39, 'SERDANG BEDAGAI', 2),
(40, 'MEDAN', 2),
(41, 'PEMATANG SIANTAR', 2),
(42, 'SIBOLGA', 2),
(43, 'TANJUNG BALAI', 2),
(44, 'BINJAI', 2),
(45, 'TEBING TINGGI', 2),
(46, 'PADANG SIDEMPUAN', 2),
(47, 'KAB.PESISIR SELATAN', 3),
(48, 'SOLOK', 3),
(49, 'SW.LUNTO', 3),
(50, 'TANAH DATAR', 3),
(51, 'PADANG PARIAMAN', 3),
(52, 'AGAM', 3),
(53, 'LIMA PULUH ', 3),
(54, 'PASAMAN', 3),
(55, 'KEPULAUAN MENTAWAI', 3),
(56, 'DHARMASRAYA', 3),
(57, 'SOLOK SELATAN', 3),
(58, 'PASAMAN BARAT', 3),
(59, 'PADANG', 3),
(60, 'SAWHLUNTO', 3),
(61, 'PADANG PANJANG', 3),
(62, 'BUKITTINGGI', 3),
(63, 'PAYAKUMBUH', 3),
(64, 'PARIAMAN', 3),
(65, 'KAMPAR', 4),
(66, 'INDRAGIRI HULU', 4),
(67, 'BENGKALIS', 4),
(68, 'INDRAGIRI HILIR', 4),
(69, 'PELALAWAN', 4),
(70, 'ROKAN HULU', 4),
(71, 'ROKAN HILIR', 4),
(72, 'SIAK', 4),
(73, 'KUANTAN SINGINGI', 4),
(74, 'PEKAN BARU', 4),
(75, 'DUMAI', 4),
(76, 'KERINCI', 5),
(77, 'MEANGIN', 5),
(78, 'SAROLANGUN', 5),
(79, 'BATANGHARI', 5),
(80, 'MUARO JAMBI', 5),
(81, 'TANJUNG JABUNG BARAT', 5),
(82, 'TANJUNG JABUNG TIMUR', 5),
(83, 'BUNGO', 5),
(84, 'TEBO', 5),
(85, 'JAMBI', 5),
(86, 'OGAN KOMERING ULU', 6),
(87, 'OGAN KOMERING ILIR', 6),
(88, 'MUARA ENIM', 6),
(89, 'LAHAT', 6),
(90, 'MUSI RAWAS', 6),
(91, 'MUSI BANYUASIN', 6),
(92, 'BANYUASIN', 6),
(93, 'OKU TIMUR', 6),
(94, 'OKU SELATAN', 6),
(95, 'OGAN ILIR', 6),
(96, 'PALEMBANG', 6),
(97, 'PAGAR ALAM', 6),
(98, 'LUBUK LINGGAU', 6),
(99, 'PRABUMULIH', 6),
(100, 'BENGKULU SELATAN', 7),
(101, 'REJANG LEBONG', 7),
(102, 'BENGKULU UTARA', 7),
(103, 'KAUR', 7),
(104, 'SELUMA', 7),
(105, 'MUKO MUKO', 7),
(106, 'LEBONG', 7),
(107, 'KEPAHIANG', 7),
(108, 'BENGKULU', 7),
(109, 'LAMPUNG SELATAN', 8),
(110, 'LAMPUNG TENGAH', 8),
(111, 'LAMPUNG UTARA', 8),
(112, 'LAMPUNG BARAT', 8),
(113, 'TULANG BAWANG', 8),
(114, 'TANGGAMUS', 8),
(115, 'LAMPUNG TIMUR', 8),
(116, 'WAY KANAN', 8),
(117, 'BANDAR LAMPUNG', 8),
(118, 'METRO', 8),
(119, 'BANGKA', 9),
(120, 'BELITUNG', 9),
(121, 'BANGKA SELATAN', 9),
(122, 'BANGKA TENGAH', 9),
(123, 'BANGKA BARAT', 9),
(124, 'BANGKA TIMUR', 9),
(125, 'PANGKAL PINANG', 9),
(126, 'KEPULAUAN RIAU', 10),
(127, 'KARIMUN', 10),
(128, 'NATUNA', 10),
(129, 'LINGGA', 10),
(130, 'BATAM', 10),
(131, 'TANJUNG PINANG', 10),
(132, 'SERIBU KEPULAUAN', 11),
(133, 'JAKARTA PUSAT', 11),
(134, 'JAKARTA UTARA', 11),
(135, 'JAKARTA BARAT', 11),
(136, 'JAKARTA SELATAN', 11),
(137, 'JAKARTA TIMUR', 11),
(138, 'BOGOR', 12),
(139, 'SUKABUMI', 12),
(140, 'CIANJUR', 12),
(141, 'BANDUNG', 12),
(142, 'GARUT', 12),
(143, 'TASIKMALAYA', 12),
(144, 'CIAMIS', 12),
(145, 'KUNINGAN', 12),
(146, 'CIREBON', 12),
(147, 'MAJALENGKA', 12),
(148, 'SUMEDANG', 12),
(149, 'INDRAMAYU', 12),
(150, 'SUBANG', 12),
(151, 'PURWAKARTA', 12),
(152, 'KARAWANG', 12),
(153, 'BEKASI', 12),
(154, 'DEPOK', 12),
(155, 'CIMAHI', 12),
(156, 'BANJAR', 12),
(157, 'CILACAP', 13),
(158, 'BANYUMAS', 13),
(159, 'PURBALINGGA', 13),
(160, 'BANJARNEGARA', 13),
(161, 'KEBUMEN', 13),
(162, 'PURWOREJO', 13),
(163, 'WONOSOBO', 13),
(164, 'MAGELANG', 13),
(165, 'BOYOLALI', 13),
(166, 'KLATEN', 13),
(167, 'SUKOHARJO', 13),
(168, 'WONOGIRI', 13),
(169, 'KARANGANYAR', 13),
(170, 'SRAGEN', 13),
(171, 'GROBOGAN', 13),
(172, 'BLORA', 13),
(173, 'REMBANG', 13),
(174, 'PATI', 13),
(175, 'KUDUS', 13),
(176, 'JEPARA', 13),
(177, 'DEMAK', 13),
(178, 'SEMARANG', 13),
(179, 'TEMANGGUNG', 13),
(180, 'KENDAL', 13),
(181, 'BATANG', 13),
(182, 'PEKALONGAN', 13),
(183, 'PEMALANG', 13),
(184, 'TEGAL', 13),
(185, 'BREBES', 13),
(186, 'SURAKARTA', 13),
(187, 'SALATIGA', 13),
(188, 'KULON PROGO', 14),
(189, 'BANTUL', 14),
(190, 'GUNUNG KIDUL', 14),
(191, 'SLEMAN', 14),
(192, 'YOGYAKARTA', 14),
(193, 'PACITAN', 15),
(194, 'PONOROGO', 15),
(195, 'TRENGGALEK', 15),
(196, 'TULUNGAGUNG', 15),
(197, 'BLITAR', 15),
(198, 'KEDIRI', 15),
(199, 'MALANG', 15),
(200, 'LUMAJANG', 15),
(201, 'JEMBER', 15),
(202, 'BANYUWANGI', 15),
(203, 'BONDOWOSO', 15),
(204, 'SITUBONDO', 15),
(205, 'PROBOLINGGO', 15),
(206, 'PASURUAN', 15),
(207, 'SIDOARJO', 15),
(208, 'MOJOKERTO', 15),
(209, 'JOMBANG', 15),
(210, 'NGANJUK', 15),
(211, 'MADIUN', 15),
(212, 'MAGETAN', 15),
(213, 'NGAWI', 15),
(214, 'BOJONEGORO', 15),
(215, 'TUBAN', 15),
(216, 'LAMONGAN', 15),
(217, 'GRESIK', 15),
(218, 'BANGKALAN', 15),
(219, 'SAMPANG', 15),
(220, 'PAMEKASAN', 15),
(221, 'SUMENEP', 15),
(222, 'SURABAYA', 15),
(223, 'BATU', 15),
(224, 'PANDEGLANG', 16),
(225, 'LEBAK', 16),
(226, 'TANGERANG', 16),
(227, 'SERANG', 16),
(228, 'CILEGON', 16),
(229, 'JEMBARANA', 17),
(230, 'TABANAN', 17),
(231, 'BADUNG', 17),
(232, 'GIANYAR', 17),
(233, 'KLUNGKUNG', 17),
(234, 'BANGLI', 17),
(235, 'KARANGASEM', 17),
(236, 'BULELENG', 17),
(237, 'DENPASAR', 17),
(238, 'LOMBOK BARAT', 18),
(239, 'LOMBOK TENGAH', 18),
(240, 'LOMBOK TIMUR', 18),
(241, 'SUMBAWA', 18),
(242, 'DOMPU', 18),
(243, 'BIMA', 18),
(244, 'SUMBAWA BARAT', 18),
(245, 'MATARAM', 18),
(246, 'KUPANG', 19),
(247, 'TIMOR TENGAH SELATAN', 19),
(248, 'TIMOR TENGAH UTARA', 19),
(249, 'BELU', 19),
(250, 'ALOR', 19),
(251, 'FLORES TIMUR', 19),
(252, 'SIKKA', 19),
(253, 'ENDE', 19),
(254, 'NGADA', 19),
(255, 'MANGGARAI', 19),
(256, 'SUMBA TIMUR', 19),
(257, 'SUMBA BARAT', 19),
(258, 'LEMBATA', 19),
(259, 'ROTE NDAO', 19),
(260, 'MANGGARAI BARAT', 19),
(261, 'SAMBAS', 20),
(262, 'PONTIANAK', 20),
(263, 'SANGGAU', 20),
(264, 'KETAPANG', 20),
(265, 'SINTANG', 20),
(266, 'KAPUAS HULU', 20),
(267, 'BENGKAYANG', 20),
(268, 'LANDAK', 20),
(269, 'MELAWI', 20),
(270, 'SEKADAU', 20),
(271, 'SINGKAWANG', 20),
(272, 'KOTAWARINGIN BARAT', 21),
(273, 'KOTAWARINGIN TIMUR', 21),
(274, 'KAPUAS', 21),
(275, 'BARITO SELATAN', 21),
(276, 'BARITO UTARA', 21),
(277, 'KATINGIN', 21),
(278, 'SERUYAN', 21),
(279, 'SUKAMARA', 21),
(280, 'LAMANDAU', 21),
(281, 'GUNUNG MAS', 21),
(282, 'PULANG PISAU', 21),
(283, 'MURUNG RAYA', 21),
(284, 'BARITO TIMUR', 21),
(285, 'PALANGKARAYA', 21),
(286, 'TANAH LAUT', 22),
(287, 'KOTABARU', 22),
(288, 'BARITO KUALA', 22),
(289, 'TAPIN', 22),
(290, 'HULU SUNGAI SELATAN', 22),
(291, 'HULU SUNGAI TENGAH', 22),
(292, 'HULU SUNGAI UTARA', 22),
(293, 'TABALONG', 22),
(294, 'TANAH BAMBU', 22),
(295, 'BALANGAN', 22),
(296, 'BANJARMASIN', 22),
(297, 'BANJARBARU', 22),
(298, 'PASIR', 23),
(299, 'KUTAI KERTANEGARA', 23),
(300, 'BERAU', 23),
(301, 'BULUNGAN', 23),
(302, 'NUNUKAN', 23),
(303, 'MALINAU', 23),
(304, 'KUTAI BARAT', 23),
(305, 'KUTAI TIMUR', 23),
(306, 'PENAJAM PASER UTARA', 23),
(307, 'BALIKPAPAN', 23),
(308, 'SAMARINDA', 23),
(309, 'TARAKAN', 23),
(310, 'BONTANG', 23),
(311, 'BOLAANG MANGONDOW', 24),
(312, 'MINAHASA', 24),
(313, 'KEPULAUAN SANGIHE', 24),
(314, 'KEPULAUAN TALAUD', 24),
(315, 'MINAHASA SELATAN', 24),
(316, 'MINAHASA UTARA', 24),
(317, 'MANADO', 24),
(318, 'BITUNG', 24),
(319, 'TOMOHON', 24),
(320, 'BANGGAI', 25),
(321, 'POSO', 25),
(322, 'DONGGALA', 25),
(323, 'TOLOI TOLI', 25),
(324, 'BUOL', 25),
(325, 'MOROWALI', 25),
(326, 'BANGGAI KEPULAUAN', 25),
(327, 'PARIGI MOUTONG', 25),
(328, 'TOJO UNA UNA', 25),
(329, 'PALU', 25),
(330, 'SELAYAR', 26),
(331, 'BULUKUMBA', 26),
(332, 'BANTAENG', 26),
(333, 'JENEPONTO.', 26),
(334, 'TAKALAR', 26),
(335, 'GOWA', 26),
(336, 'SINJAI', 26),
(337, 'BONE', 26),
(338, 'MAROS', 26),
(339, 'PANGKAJENE KEP.', 26),
(340, 'BARRU', 26),
(341, 'SOPPENG', 26),
(342, 'WAJO', 26),
(343, 'SIDENRENG RAPANG', 26),
(344, 'PINRANG', 26),
(345, 'ENREKANG', 26),
(346, 'LUWU', 26),
(347, 'TANA TORAJA', 26),
(348, 'LUWU UTARA', 26),
(349, 'LUWU TIMUR', 26),
(350, 'MAKASAR', 26),
(351, 'PARE PARE', 26),
(352, 'PALOPO', 26),
(353, 'KOLAKA', 27),
(354, 'KONAWE', 27),
(355, 'MUNA', 27),
(356, 'BUTON', 27),
(357, 'KONAWE SELATAN', 27),
(358, 'BOMBANA', 27),
(359, 'WAKATOBI', 27),
(360, 'KOLAKA UTARA', 27),
(361, 'KENDARI', 27),
(362, 'BAU BAU', 27),
(363, 'GORONTALO', 28),
(364, 'BOALEMO', 28),
(365, 'BONE BOLANGO', 28),
(366, 'PAHUWATO', 28),
(367, 'MAMUJU UTARA', 29),
(368, 'MAMUJU', 29),
(369, 'MAMASA', 29),
(370, 'POLOWALI MAMASA', 29),
(371, 'MAJENE', 29),
(372, 'MALUKU TENGAH', 30),
(373, 'MALUKU TENGGARA', 30),
(374, 'MALUKU TENGGARA BRT', 30),
(375, 'BURU', 30),
(376, 'SERAM BAGIAN TIMUR', 30),
(377, 'SERAM BAGIAN BARAT', 30),
(378, 'KEPULAUAN ARU', 30),
(379, 'AMBON', 30),
(380, 'HALMAHERA BARAT', 31),
(381, 'HALMAHERA TENGAH', 31),
(382, 'HALMAHERA UTARA', 31),
(383, 'HALMAHERA SELATAN', 31),
(384, 'KEPULAUAN SULA', 31),
(385, 'HALMAHERA TIMUR', 31),
(386, 'TERNATE', 31),
(387, 'TIDORE KEPULAUAN', 31),
(388, 'MERAUKE', 32),
(389, 'JAYAWIJAYA', 32),
(390, 'JAYAPURA', 32),
(391, 'NABIRE', 32),
(392, 'YAPEN WAROPEN', 32),
(393, 'BIAK NUMFOR', 32),
(394, 'PUNCAK JAYA', 32),
(395, 'PANIAI', 32),
(396, 'MIMIKA', 32),
(397, 'SARMI', 32),
(398, 'KEEROM', 32),
(399, 'PEGUNUNGAN BINTANG', 32),
(400, 'YAHUKIMO', 32),
(401, 'TOLIKARA', 32),
(402, 'WAROPEN', 32),
(403, 'BOVEN DIGOEL', 32),
(404, 'MAPPI', 32),
(405, 'ASMAT', 32),
(406, 'SUPIORI', 32),
(407, 'SORONG', 33),
(408, 'MANOKWARI', 33),
(409, 'FAK FAK', 33),
(410, 'SORONG SELATAN', 33),
(411, 'RAJA AMPAT', 33),
(412, 'BENTUNI TELUK', 33),
(413, 'WONDAMA TELUK', 33),
(414, 'KAIMA', 33);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_negara`
--

CREATE TABLE `tbl_negara` (
  `id_negara` int(11) NOT NULL,
  `negara` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_negara`
--

INSERT INTO `tbl_negara` (`id_negara`, `negara`) VALUES
(1, 'INDONESIA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengembalian_barang`
--

CREATE TABLE `tbl_pengembalian_barang` (
  `kode_pengembalian_barang` int(11) NOT NULL,
  `tgl_pengembalian_barang` datetime NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `kode_user` int(5) NOT NULL,
  `no_resi` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0=pendding,1=proses kirim ulang'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_pengembalian_barang`
--

INSERT INTO `tbl_pengembalian_barang` (`kode_pengembalian_barang`, `tgl_pengembalian_barang`, `pesan`, `kode_user`, `no_resi`, `status`) VALUES
(1, '2014-05-21 11:47:37', 'sbdfxbgervgergerger', 2, '2323364354', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengiriman`
--

CREATE TABLE `tbl_pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `pengiriman` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengiriman`
--

INSERT INTO `tbl_pengiriman` (`id_pengiriman`, `pengiriman`) VALUES
(1, 'JNE'),
(2, 'TIKI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `kode_produk` varchar(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(5) NOT NULL,
  `dibeli` int(5) NOT NULL,
  `gbr_kecil` varchar(100) NOT NULL,
  `gbr_besar` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tipe_produk` varchar(10) NOT NULL,
  `berat` double NOT NULL COMMENT 'gram'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`kode_produk`, `id_kategori`, `nama_produk`, `harga`, `stok`, `dibeli`, `gbr_kecil`, `gbr_besar`, `deskripsi`, `tipe_produk`, `berat`) VALUES
('SKK100001', 4, 'An-nas ', 20000, 105, 15, 'Foto-0015.jpg', 'Foto-0015.jpg', '<p>Minimal pembelian 5 buah, nomor peci merupakan nomor seri 5-9</p>\r\n\n<p>Jika ingin memesan barang sesuai nomor peci yang Anda inginkan, bisa dengan mengisi di tabel pemesanan. Terima kasih ^_^</p>', '', 120),
('SKK100002', 3, 'Aceh Ac 1', 30000, 10, 10, '309359_acehac1.jpg', '309359_acehac1.jpg', '', '', 130),
('SKK100003', 3, 'raja eksklusif', 35000, 45, 5, 'peci-raja-exclusive-bordir-komputer-detail.jpg', 'peci-raja-exclusive-bordir-komputer-detail.jpg', '', '', 125),
('SKK100004', 2, 'kopiyah halus', 10000, 100, 0, '2261696_b-09155.jpg', '2261696_b-09155.jpg', '', '', 120),
('SKK100006', 3, 'lacer', 40000, 50, 0, '1368355783_507826841_3-songkok-presiden-Surabaya.jpg', '1368355783_507826841_3-songkok-presiden-Surabaya.jpg', '', '', 120),
('SKK100007', 3, 'elegant', 40000, 45, 5, 'images.jpg', 'images.jpg', '', '', 115),
('SKK100008', 2, 'kopiyah chs', 10000, 50, 0, '2180849_t-0277.5.jpg', '2180849_t-0277.5.jpg', '', '', 120);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_propinsi`
--

CREATE TABLE `tbl_propinsi` (
  `id_propinsi` int(11) NOT NULL,
  `propinsi` varchar(50) NOT NULL,
  `id_negara` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_propinsi`
--

INSERT INTO `tbl_propinsi` (`id_propinsi`, `propinsi`, `id_negara`) VALUES
(1, 'NANGGROE ACEH DARUSSALAM', 1),
(2, 'SUMATERA UTARA', 1),
(3, 'SUMATERA BARAT', 1),
(4, 'RIAU', 1),
(5, 'JAMBI', 1),
(6, 'SUMATERA SELATAN', 1),
(7, 'BENGKULU', 1),
(8, 'LAMPUNG', 1),
(9, 'KEP BANGKA BELITUNG', 1),
(10, 'KEP RIAU', 1),
(11, 'DKI JAKARTA', 1),
(12, 'JAWA BARAT', 1),
(13, 'JAWA TENGAH', 1),
(14, 'DI JOGJAKARTA', 1),
(15, 'JAWA TIMUR', 1),
(16, 'BANTEN', 1),
(17, 'BALI', 1),
(18, 'NUSA TENGGARA BARAT', 1),
(19, 'NUSA TENGGARA TIMUR', 1),
(20, 'KALIMANTAN BARAT', 1),
(21, 'KALIMANTAN TENGAH', 1),
(22, 'KALIMANTAN SELATAN', 1),
(23, 'KALIMANTAN TIMUR', 1),
(24, 'SULAWESI UTARA', 1),
(25, 'SULAWESI TENGAH', 1),
(26, 'SULAWESI SELATAN', 1),
(27, 'SULAWESI TENGGARA', 1),
(28, 'GORONTALO', 1),
(29, 'SULAWESI BARAT', 1),
(30, 'MALUKU', 1),
(31, 'MALUKU UTARA', 1),
(32, 'PAPUA', 1),
(33, 'PAPUA BARAT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spr_admn`
--

CREATE TABLE `tbl_spr_admn` (
  `kode_spr_admn` int(2) NOT NULL,
  `username_admn` varchar(50) NOT NULL,
  `pass_admn` varchar(200) NOT NULL,
  `nama_admn` varchar(100) NOT NULL,
  `stts` varchar(20) NOT NULL,
  `lvl` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_spr_admn`
--

INSERT INTO `tbl_spr_admn` (`kode_spr_admn`, `username_admn`, `pass_admn`, `nama_admn`, `stts`, `lvl`, `email`, `alamat`, `tgl_lahir`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Nurma Asih', '1', 'spradmn', 'nurma.asih@gmail.com', 'Yogyakarta', '1990-01-19'),
(10, 'user', '21232f297a57a5a743894a0e4a801fc3', 'user', '1', 'biasa', 'user@user.com', 'user', '1980-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE `tbl_testimonial` (
  `id_testi` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `status` int(1) NOT NULL,
  `waktu` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_testimonial`
--

INSERT INTO `tbl_testimonial` (`id_testi`, `nama`, `email`, `pesan`, `status`, `waktu`) VALUES
(22, 'adin', 'adin@gmail.com', 'produknya murah dan kualitasnya bagus bingiitt.. suka deh ^_^', 0, '01-05-2014 | 07:26:pm'),
(23, 'sisi', 'sisi123@gmail.com', '<p>produknya top markotoooopp</p>', 1, '01-05-2014 | 07:28:pm'),
(24, 'mega wati', 'mega@gmail.com', '<p>baguuuusss baguuusss bingiitt.. harganya juga terjangkau, cocoookk</p>', 1, '07-05-2014 | 12:05:am');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_detail`
--

CREATE TABLE `tbl_transaksi_detail` (
  `kode_transaksi_detail` int(10) NOT NULL,
  `kode_transaksi` bigint(150) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi_detail`
--

INSERT INTO `tbl_transaksi_detail` (`kode_transaksi_detail`, `kode_transaksi`, `kode_produk`, `harga`, `jumlah`) VALUES
(13, 20140501002, 'SKK100001', 20000, 5),
(14, 20140515001, 'SKK100005', 35000, 5),
(15, 20140515001, 'SKK100002', 30000, 5),
(16, 20140520001, 'SKK100007', 40000, 5),
(17, 20140520001, 'SKK100003', 35000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_header`
--

CREATE TABLE `tbl_transaksi_header` (
  `kode_transaksi` bigint(10) NOT NULL,
  `noresi` varchar(50) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `jamtransaksi` time NOT NULL,
  `kode_user` int(20) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `email_penerima` varchar(50) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `propinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `paket_kirim` int(11) NOT NULL,
  `hargaperkilo` double NOT NULL DEFAULT '0',
  `subberat` double NOT NULL DEFAULT '0',
  `subtotal` double NOT NULL DEFAULT '0',
  `bank` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1 = Dipesan, 2 = Proses, 3 = Sudah Dikirim'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi_header`
--

INSERT INTO `tbl_transaksi_header` (`kode_transaksi`, `noresi`, `tgltransaksi`, `jamtransaksi`, `kode_user`, `nama_penerima`, `email_penerima`, `alamat_penerima`, `propinsi`, `kota`, `kodepos`, `telpon`, `metode`, `paket_kirim`, `hargaperkilo`, `subberat`, `subtotal`, `bank`, `pesan`, `status`) VALUES
(20140501002, '', '2014-05-26', '00:00:00', 1, 'sisi', 'sisi123@gmail.com', 'Yogyakarta', 'Yogyakarta', 'Sleman', '54321', '081987876908', 'Setoran Tunai, Transfer Bank', 1, 0, 0, 0, 'Bank Central Asia - No. Rek 1800658299', '-', 2),
(20140515001, '', '2014-05-25', '15:50:53', 2, 'mega wati', 'mega@gmail.com', 'yogyakarta', 'Yogyakarta', 'Yogyakarta', '54321', '081809789777', 'Setoran Tunai, Transfer Bank', 2, 0, 0, 0, 'Bank Central Asia - No. Rek 1800658299', '-', 1),
(20140520001, '4556345h5h74', '2014-05-20', '22:49:34', 1, 'sisi susanti', 'sisi@gmail.com', '<p>yogyakarta</p>', 'Yogyakarta', 'Yogyakarta', '54321', '081809785432', 'Setoran Tunai, Transfer Bank', 1, 10000, 2.34, 100000, 'Bank Central Asia - No. Rek 1800658299', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `kode_user` int(5) NOT NULL,
  `username_user` varchar(20) NOT NULL,
  `pass_user` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `propinsi` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `stts` int(1) NOT NULL,
  `kode_aktivasi` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`kode_user`, `username_user`, `pass_user`, `nama`, `email`, `alamat`, `telpon`, `propinsi`, `kota`, `kode_pos`, `tgl_lahir`, `stts`, `kode_aktivasi`, `tgl_transaksi`) VALUES
(1, 'nini', '8054da645a387dbfb06654d69f0d0201', 'nini nini', 'nini@yahoo.com', '<p>nini</p>', '9435749272397', 'Yogyakarta', 'Sleman', '73284', '0000-00-00', 1, '', '0000-00-00'),
(2, 'mega', '91805ec00ad20b85226bec0bacf843d3', 'mega wati', 'mega@gmail.com', 'yogyakarta', '081809789777', 'Yogyakarta', 'Yogyakarta', '54321', '0000-00-00', 1, '91805ec00ad20b85226bec0bacf843d3', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`),
  ADD KEY `word` (`word`);

--
-- Indexes for table `tbl_biayakirim`
--
ALTER TABLE `tbl_biayakirim`
  ADD PRIMARY KEY (`id_biayakirim`);

--
-- Indexes for table `tbl_hubungi_kami`
--
ALTER TABLE `tbl_hubungi_kami`
  ADD PRIMARY KEY (`id_hubungi_kami`);

--
-- Indexes for table `tbl_katalog`
--
ALTER TABLE `tbl_katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD UNIQUE KEY `kota` (`kota`);

--
-- Indexes for table `tbl_negara`
--
ALTER TABLE `tbl_negara`
  ADD PRIMARY KEY (`id_negara`),
  ADD UNIQUE KEY `country` (`negara`);

--
-- Indexes for table `tbl_pengembalian_barang`
--
ALTER TABLE `tbl_pengembalian_barang`
  ADD PRIMARY KEY (`kode_pengembalian_barang`);

--
-- Indexes for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD UNIQUE KEY `via` (`pengiriman`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `tbl_propinsi`
--
ALTER TABLE `tbl_propinsi`
  ADD PRIMARY KEY (`id_propinsi`),
  ADD UNIQUE KEY `province` (`propinsi`);

--
-- Indexes for table `tbl_spr_admn`
--
ALTER TABLE `tbl_spr_admn`
  ADD PRIMARY KEY (`kode_spr_admn`);

--
-- Indexes for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  ADD PRIMARY KEY (`id_testi`);

--
-- Indexes for table `tbl_transaksi_detail`
--
ALTER TABLE `tbl_transaksi_detail`
  ADD PRIMARY KEY (`kode_transaksi_detail`),
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `tbl_transaksi_header`
--
ALTER TABLE `tbl_transaksi_header`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;
--
-- AUTO_INCREMENT for table `tbl_biayakirim`
--
ALTER TABLE `tbl_biayakirim`
  MODIFY `id_biayakirim` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_hubungi_kami`
--
ALTER TABLE `tbl_hubungi_kami`
  MODIFY `id_hubungi_kami` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_katalog`
--
ALTER TABLE `tbl_katalog`
  MODIFY `id_katalog` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;
--
-- AUTO_INCREMENT for table `tbl_negara`
--
ALTER TABLE `tbl_negara`
  MODIFY `id_negara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pengembalian_barang`
--
ALTER TABLE `tbl_pengembalian_barang`
  MODIFY `kode_pengembalian_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_propinsi`
--
ALTER TABLE `tbl_propinsi`
  MODIFY `id_propinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tbl_spr_admn`
--
ALTER TABLE `tbl_spr_admn`
  MODIFY `kode_spr_admn` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  MODIFY `id_testi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_transaksi_detail`
--
ALTER TABLE `tbl_transaksi_detail`
  MODIFY `kode_transaksi_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `kode_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
