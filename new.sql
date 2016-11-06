-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 21, 2014 at 12:30 PM
-- Server version: 5.0.33
-- PHP Version: 5.2.1
-- 
-- Database: `annasviaproduction`
-- 
CREATE DATABASE `annasviaproduction_bc` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `annasviaproduction_bc`;

-- --------------------------------------------------------

-- 
-- Table structure for table `captcha`
-- 

CREATE TABLE `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL auto_increment,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) character set latin1 NOT NULL default '0',
  `word` varchar(20) character set latin1 NOT NULL,
  PRIMARY KEY  (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=221 ;

-- 
-- Dumping data for table `captcha`
-- 

INSERT INTO `captcha` VALUES (220, 1400644071, '127.0.0.1', 'WWCX1EYA');
INSERT INTO `captcha` VALUES (219, 1400644044, '127.0.0.1', 'NZM6H6GV');
INSERT INTO `captcha` VALUES (218, 1400643313, '127.0.0.1', 'NDK418SQ');
INSERT INTO `captcha` VALUES (217, 1400643227, '127.0.0.1', 'JI7QF6ZK');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_biayakirim`
-- 

CREATE TABLE `tbl_biayakirim` (
  `id_biayakirim` bigint(20) NOT NULL auto_increment,
  `id_pengiriman` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `biayakirim` double NOT NULL,
  PRIMARY KEY  (`id_biayakirim`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `tbl_biayakirim`
-- 

INSERT INTO `tbl_biayakirim` VALUES (1, 1, 222, 20000);
INSERT INTO `tbl_biayakirim` VALUES (2, 1, 141, 17000);
INSERT INTO `tbl_biayakirim` VALUES (3, 2, 222, 14000);
INSERT INTO `tbl_biayakirim` VALUES (4, 2, 141, 9000);
INSERT INTO `tbl_biayakirim` VALUES (5, 1, 199, 21000);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_hubungi_kami`
-- 

CREATE TABLE `tbl_hubungi_kami` (
  `id_hubungi_kami` int(11) NOT NULL auto_increment,
  `nama` varchar(50) collate latin1_general_ci NOT NULL,
  `email` varchar(100) collate latin1_general_ci NOT NULL,
  `no_telp` varchar(20) collate latin1_general_ci NOT NULL,
  `alamat` text collate latin1_general_ci NOT NULL,
  `kota` varchar(100) collate latin1_general_ci NOT NULL,
  `negara` varchar(100) collate latin1_general_ci NOT NULL,
  `pesan` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_hubungi_kami`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `tbl_hubungi_kami`
-- 

INSERT INTO `tbl_hubungi_kami` VALUES (1, 'hehehhe', 'heheh@hehehe.com', '', 'jdbvhdfbcidcnidsc', 'ygya', 'Indonesia', 'djshbcdjsbcudesbew');
INSERT INTO `tbl_hubungi_kami` VALUES (2, 'aasdslkx', 'heheh@hehehe.com', '984379213864', 'dsbjcdsbcjsbc', 'ygya', 'Indonesia', 'egajcbascba');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_katalog`
-- 

CREATE TABLE `tbl_katalog` (
  `id_katalog` int(3) NOT NULL auto_increment,
  `judul_file` varchar(20) character set latin1 NOT NULL,
  `nama_file` varchar(20) character set latin1 NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY  (`id_katalog`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `tbl_katalog`
-- 

INSERT INTO `tbl_katalog` VALUES (10, 'Songkok/ Peci Bordir', '427672592.docx', '2014-02-06');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_kategori`
-- 

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(3) NOT NULL auto_increment,
  `nama_kategori` varchar(100) NOT NULL,
  `kode_level` int(2) NOT NULL,
  `kode_parent` int(5) NOT NULL,
  PRIMARY KEY  (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

-- 
-- Dumping data for table `tbl_kategori`
-- 

INSERT INTO `tbl_kategori` VALUES (1, 'Peci Smok', 0, 0);
INSERT INTO `tbl_kategori` VALUES (45, 'cobacoba', 1, 3);
INSERT INTO `tbl_kategori` VALUES (2, 'Peci Rajut', 0, 0);
INSERT INTO `tbl_kategori` VALUES (3, 'Peci Bordir', 0, 0);
INSERT INTO `tbl_kategori` VALUES (4, 'Peci Polos', 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_kota`
-- 

CREATE TABLE `tbl_kota` (
  `id_kota` int(11) NOT NULL auto_increment,
  `kota` varchar(50) NOT NULL,
  `id_propinsi` int(11) NOT NULL,
  PRIMARY KEY  (`id_kota`),
  UNIQUE KEY `kota` (`kota`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=415 ;

-- 
-- Dumping data for table `tbl_kota`
-- 

INSERT INTO `tbl_kota` VALUES (1, 'ACEH SELATAN', 1);
INSERT INTO `tbl_kota` VALUES (2, 'ACEH TENGGARA', 1);
INSERT INTO `tbl_kota` VALUES (3, 'ACEH TIMUR', 1);
INSERT INTO `tbl_kota` VALUES (4, 'ACEH TENGAH', 1);
INSERT INTO `tbl_kota` VALUES (5, 'ACEH BARAT', 1);
INSERT INTO `tbl_kota` VALUES (6, 'ACEH BESAR', 1);
INSERT INTO `tbl_kota` VALUES (7, 'PIDIE', 1);
INSERT INTO `tbl_kota` VALUES (8, 'ACEH UTARA', 1);
INSERT INTO `tbl_kota` VALUES (9, 'SIMEULUE', 1);
INSERT INTO `tbl_kota` VALUES (10, 'ACEH SINGKIL', 1);
INSERT INTO `tbl_kota` VALUES (11, 'BIREUN', 1);
INSERT INTO `tbl_kota` VALUES (12, 'ACEH BARAT DAYA', 1);
INSERT INTO `tbl_kota` VALUES (13, 'GAYO LUES', 1);
INSERT INTO `tbl_kota` VALUES (14, 'ACEH JAYA', 1);
INSERT INTO `tbl_kota` VALUES (15, 'NAGAN JAYA', 1);
INSERT INTO `tbl_kota` VALUES (16, 'ACEH TAMIANG', 1);
INSERT INTO `tbl_kota` VALUES (17, 'BENER MERIAH', 1);
INSERT INTO `tbl_kota` VALUES (18, 'BANDA ACEH', 1);
INSERT INTO `tbl_kota` VALUES (19, 'SABANG', 1);
INSERT INTO `tbl_kota` VALUES (20, 'LHOKSEUMAWE', 1);
INSERT INTO `tbl_kota` VALUES (21, 'LANGSA', 1);
INSERT INTO `tbl_kota` VALUES (22, 'TAPANULI TENGAH', 2);
INSERT INTO `tbl_kota` VALUES (23, 'TAPANULI UTARA', 2);
INSERT INTO `tbl_kota` VALUES (24, 'TAPANULI SELATAN', 2);
INSERT INTO `tbl_kota` VALUES (25, 'NIAS', 2);
INSERT INTO `tbl_kota` VALUES (26, 'LANGKAT', 2);
INSERT INTO `tbl_kota` VALUES (27, 'KARO', 2);
INSERT INTO `tbl_kota` VALUES (28, 'DELI SERDANG', 2);
INSERT INTO `tbl_kota` VALUES (29, 'SIMALUNGUN', 2);
INSERT INTO `tbl_kota` VALUES (30, 'ASAHAN', 2);
INSERT INTO `tbl_kota` VALUES (31, 'LABUHAN BATU', 2);
INSERT INTO `tbl_kota` VALUES (32, 'DAIRI', 2);
INSERT INTO `tbl_kota` VALUES (33, 'TOBA SAMOSIR', 2);
INSERT INTO `tbl_kota` VALUES (34, 'MANDAILING NATAL', 2);
INSERT INTO `tbl_kota` VALUES (35, 'NIAS SELATAN', 2);
INSERT INTO `tbl_kota` VALUES (36, 'PAKPAK BARAT', 2);
INSERT INTO `tbl_kota` VALUES (37, 'HUMBANG HASUNDUTAN', 2);
INSERT INTO `tbl_kota` VALUES (38, 'SAMOSIR', 2);
INSERT INTO `tbl_kota` VALUES (39, 'SERDANG BEDAGAI', 2);
INSERT INTO `tbl_kota` VALUES (40, 'MEDAN', 2);
INSERT INTO `tbl_kota` VALUES (41, 'PEMATANG SIANTAR', 2);
INSERT INTO `tbl_kota` VALUES (42, 'SIBOLGA', 2);
INSERT INTO `tbl_kota` VALUES (43, 'TANJUNG BALAI', 2);
INSERT INTO `tbl_kota` VALUES (44, 'BINJAI', 2);
INSERT INTO `tbl_kota` VALUES (45, 'TEBING TINGGI', 2);
INSERT INTO `tbl_kota` VALUES (46, 'PADANG SIDEMPUAN', 2);
INSERT INTO `tbl_kota` VALUES (47, 'KAB.PESISIR SELATAN', 3);
INSERT INTO `tbl_kota` VALUES (48, 'SOLOK', 3);
INSERT INTO `tbl_kota` VALUES (49, 'SW.LUNTO', 3);
INSERT INTO `tbl_kota` VALUES (50, 'TANAH DATAR', 3);
INSERT INTO `tbl_kota` VALUES (51, 'PADANG PARIAMAN', 3);
INSERT INTO `tbl_kota` VALUES (52, 'AGAM', 3);
INSERT INTO `tbl_kota` VALUES (53, 'LIMA PULUH ', 3);
INSERT INTO `tbl_kota` VALUES (54, 'PASAMAN', 3);
INSERT INTO `tbl_kota` VALUES (55, 'KEPULAUAN MENTAWAI', 3);
INSERT INTO `tbl_kota` VALUES (56, 'DHARMASRAYA', 3);
INSERT INTO `tbl_kota` VALUES (57, 'SOLOK SELATAN', 3);
INSERT INTO `tbl_kota` VALUES (58, 'PASAMAN BARAT', 3);
INSERT INTO `tbl_kota` VALUES (59, 'PADANG', 3);
INSERT INTO `tbl_kota` VALUES (60, 'SAWHLUNTO', 3);
INSERT INTO `tbl_kota` VALUES (61, 'PADANG PANJANG', 3);
INSERT INTO `tbl_kota` VALUES (62, 'BUKITTINGGI', 3);
INSERT INTO `tbl_kota` VALUES (63, 'PAYAKUMBUH', 3);
INSERT INTO `tbl_kota` VALUES (64, 'PARIAMAN', 3);
INSERT INTO `tbl_kota` VALUES (65, 'KAMPAR', 4);
INSERT INTO `tbl_kota` VALUES (66, 'INDRAGIRI HULU', 4);
INSERT INTO `tbl_kota` VALUES (67, 'BENGKALIS', 4);
INSERT INTO `tbl_kota` VALUES (68, 'INDRAGIRI HILIR', 4);
INSERT INTO `tbl_kota` VALUES (69, 'PELALAWAN', 4);
INSERT INTO `tbl_kota` VALUES (70, 'ROKAN HULU', 4);
INSERT INTO `tbl_kota` VALUES (71, 'ROKAN HILIR', 4);
INSERT INTO `tbl_kota` VALUES (72, 'SIAK', 4);
INSERT INTO `tbl_kota` VALUES (73, 'KUANTAN SINGINGI', 4);
INSERT INTO `tbl_kota` VALUES (74, 'PEKAN BARU', 4);
INSERT INTO `tbl_kota` VALUES (75, 'DUMAI', 4);
INSERT INTO `tbl_kota` VALUES (76, 'KERINCI', 5);
INSERT INTO `tbl_kota` VALUES (77, 'MEANGIN', 5);
INSERT INTO `tbl_kota` VALUES (78, 'SAROLANGUN', 5);
INSERT INTO `tbl_kota` VALUES (79, 'BATANGHARI', 5);
INSERT INTO `tbl_kota` VALUES (80, 'MUARO JAMBI', 5);
INSERT INTO `tbl_kota` VALUES (81, 'TANJUNG JABUNG BARAT', 5);
INSERT INTO `tbl_kota` VALUES (82, 'TANJUNG JABUNG TIMUR', 5);
INSERT INTO `tbl_kota` VALUES (83, 'BUNGO', 5);
INSERT INTO `tbl_kota` VALUES (84, 'TEBO', 5);
INSERT INTO `tbl_kota` VALUES (85, 'JAMBI', 5);
INSERT INTO `tbl_kota` VALUES (86, 'OGAN KOMERING ULU', 6);
INSERT INTO `tbl_kota` VALUES (87, 'OGAN KOMERING ILIR', 6);
INSERT INTO `tbl_kota` VALUES (88, 'MUARA ENIM', 6);
INSERT INTO `tbl_kota` VALUES (89, 'LAHAT', 6);
INSERT INTO `tbl_kota` VALUES (90, 'MUSI RAWAS', 6);
INSERT INTO `tbl_kota` VALUES (91, 'MUSI BANYUASIN', 6);
INSERT INTO `tbl_kota` VALUES (92, 'BANYUASIN', 6);
INSERT INTO `tbl_kota` VALUES (93, 'OKU TIMUR', 6);
INSERT INTO `tbl_kota` VALUES (94, 'OKU SELATAN', 6);
INSERT INTO `tbl_kota` VALUES (95, 'OGAN ILIR', 6);
INSERT INTO `tbl_kota` VALUES (96, 'PALEMBANG', 6);
INSERT INTO `tbl_kota` VALUES (97, 'PAGAR ALAM', 6);
INSERT INTO `tbl_kota` VALUES (98, 'LUBUK LINGGAU', 6);
INSERT INTO `tbl_kota` VALUES (99, 'PRABUMULIH', 6);
INSERT INTO `tbl_kota` VALUES (100, 'BENGKULU SELATAN', 7);
INSERT INTO `tbl_kota` VALUES (101, 'REJANG LEBONG', 7);
INSERT INTO `tbl_kota` VALUES (102, 'BENGKULU UTARA', 7);
INSERT INTO `tbl_kota` VALUES (103, 'KAUR', 7);
INSERT INTO `tbl_kota` VALUES (104, 'SELUMA', 7);
INSERT INTO `tbl_kota` VALUES (105, 'MUKO MUKO', 7);
INSERT INTO `tbl_kota` VALUES (106, 'LEBONG', 7);
INSERT INTO `tbl_kota` VALUES (107, 'KEPAHIANG', 7);
INSERT INTO `tbl_kota` VALUES (108, 'BENGKULU', 7);
INSERT INTO `tbl_kota` VALUES (109, 'LAMPUNG SELATAN', 8);
INSERT INTO `tbl_kota` VALUES (110, 'LAMPUNG TENGAH', 8);
INSERT INTO `tbl_kota` VALUES (111, 'LAMPUNG UTARA', 8);
INSERT INTO `tbl_kota` VALUES (112, 'LAMPUNG BARAT', 8);
INSERT INTO `tbl_kota` VALUES (113, 'TULANG BAWANG', 8);
INSERT INTO `tbl_kota` VALUES (114, 'TANGGAMUS', 8);
INSERT INTO `tbl_kota` VALUES (115, 'LAMPUNG TIMUR', 8);
INSERT INTO `tbl_kota` VALUES (116, 'WAY KANAN', 8);
INSERT INTO `tbl_kota` VALUES (117, 'BANDAR LAMPUNG', 8);
INSERT INTO `tbl_kota` VALUES (118, 'METRO', 8);
INSERT INTO `tbl_kota` VALUES (119, 'BANGKA', 9);
INSERT INTO `tbl_kota` VALUES (120, 'BELITUNG', 9);
INSERT INTO `tbl_kota` VALUES (121, 'BANGKA SELATAN', 9);
INSERT INTO `tbl_kota` VALUES (122, 'BANGKA TENGAH', 9);
INSERT INTO `tbl_kota` VALUES (123, 'BANGKA BARAT', 9);
INSERT INTO `tbl_kota` VALUES (124, 'BANGKA TIMUR', 9);
INSERT INTO `tbl_kota` VALUES (125, 'PANGKAL PINANG', 9);
INSERT INTO `tbl_kota` VALUES (126, 'KEPULAUAN RIAU', 10);
INSERT INTO `tbl_kota` VALUES (127, 'KARIMUN', 10);
INSERT INTO `tbl_kota` VALUES (128, 'NATUNA', 10);
INSERT INTO `tbl_kota` VALUES (129, 'LINGGA', 10);
INSERT INTO `tbl_kota` VALUES (130, 'BATAM', 10);
INSERT INTO `tbl_kota` VALUES (131, 'TANJUNG PINANG', 10);
INSERT INTO `tbl_kota` VALUES (132, 'SERIBU KEPULAUAN', 11);
INSERT INTO `tbl_kota` VALUES (133, 'JAKARTA PUSAT', 11);
INSERT INTO `tbl_kota` VALUES (134, 'JAKARTA UTARA', 11);
INSERT INTO `tbl_kota` VALUES (135, 'JAKARTA BARAT', 11);
INSERT INTO `tbl_kota` VALUES (136, 'JAKARTA SELATAN', 11);
INSERT INTO `tbl_kota` VALUES (137, 'JAKARTA TIMUR', 11);
INSERT INTO `tbl_kota` VALUES (138, 'BOGOR', 12);
INSERT INTO `tbl_kota` VALUES (139, 'SUKABUMI', 12);
INSERT INTO `tbl_kota` VALUES (140, 'CIANJUR', 12);
INSERT INTO `tbl_kota` VALUES (141, 'BANDUNG', 12);
INSERT INTO `tbl_kota` VALUES (142, 'GARUT', 12);
INSERT INTO `tbl_kota` VALUES (143, 'TASIKMALAYA', 12);
INSERT INTO `tbl_kota` VALUES (144, 'CIAMIS', 12);
INSERT INTO `tbl_kota` VALUES (145, 'KUNINGAN', 12);
INSERT INTO `tbl_kota` VALUES (146, 'CIREBON', 12);
INSERT INTO `tbl_kota` VALUES (147, 'MAJALENGKA', 12);
INSERT INTO `tbl_kota` VALUES (148, 'SUMEDANG', 12);
INSERT INTO `tbl_kota` VALUES (149, 'INDRAMAYU', 12);
INSERT INTO `tbl_kota` VALUES (150, 'SUBANG', 12);
INSERT INTO `tbl_kota` VALUES (151, 'PURWAKARTA', 12);
INSERT INTO `tbl_kota` VALUES (152, 'KARAWANG', 12);
INSERT INTO `tbl_kota` VALUES (153, 'BEKASI', 12);
INSERT INTO `tbl_kota` VALUES (154, 'DEPOK', 12);
INSERT INTO `tbl_kota` VALUES (155, 'CIMAHI', 12);
INSERT INTO `tbl_kota` VALUES (156, 'BANJAR', 12);
INSERT INTO `tbl_kota` VALUES (157, 'CILACAP', 13);
INSERT INTO `tbl_kota` VALUES (158, 'BANYUMAS', 13);
INSERT INTO `tbl_kota` VALUES (159, 'PURBALINGGA', 13);
INSERT INTO `tbl_kota` VALUES (160, 'BANJARNEGARA', 13);
INSERT INTO `tbl_kota` VALUES (161, 'KEBUMEN', 13);
INSERT INTO `tbl_kota` VALUES (162, 'PURWOREJO', 13);
INSERT INTO `tbl_kota` VALUES (163, 'WONOSOBO', 13);
INSERT INTO `tbl_kota` VALUES (164, 'MAGELANG', 13);
INSERT INTO `tbl_kota` VALUES (165, 'BOYOLALI', 13);
INSERT INTO `tbl_kota` VALUES (166, 'KLATEN', 13);
INSERT INTO `tbl_kota` VALUES (167, 'SUKOHARJO', 13);
INSERT INTO `tbl_kota` VALUES (168, 'WONOGIRI', 13);
INSERT INTO `tbl_kota` VALUES (169, 'KARANGANYAR', 13);
INSERT INTO `tbl_kota` VALUES (170, 'SRAGEN', 13);
INSERT INTO `tbl_kota` VALUES (171, 'GROBOGAN', 13);
INSERT INTO `tbl_kota` VALUES (172, 'BLORA', 13);
INSERT INTO `tbl_kota` VALUES (173, 'REMBANG', 13);
INSERT INTO `tbl_kota` VALUES (174, 'PATI', 13);
INSERT INTO `tbl_kota` VALUES (175, 'KUDUS', 13);
INSERT INTO `tbl_kota` VALUES (176, 'JEPARA', 13);
INSERT INTO `tbl_kota` VALUES (177, 'DEMAK', 13);
INSERT INTO `tbl_kota` VALUES (178, 'SEMARANG', 13);
INSERT INTO `tbl_kota` VALUES (179, 'TEMANGGUNG', 13);
INSERT INTO `tbl_kota` VALUES (180, 'KENDAL', 13);
INSERT INTO `tbl_kota` VALUES (181, 'BATANG', 13);
INSERT INTO `tbl_kota` VALUES (182, 'PEKALONGAN', 13);
INSERT INTO `tbl_kota` VALUES (183, 'PEMALANG', 13);
INSERT INTO `tbl_kota` VALUES (184, 'TEGAL', 13);
INSERT INTO `tbl_kota` VALUES (185, 'BREBES', 13);
INSERT INTO `tbl_kota` VALUES (186, 'SURAKARTA', 13);
INSERT INTO `tbl_kota` VALUES (187, 'SALATIGA', 13);
INSERT INTO `tbl_kota` VALUES (188, 'KULON PROGO', 14);
INSERT INTO `tbl_kota` VALUES (189, 'BANTUL', 14);
INSERT INTO `tbl_kota` VALUES (190, 'GUNUNG KIDUL', 14);
INSERT INTO `tbl_kota` VALUES (191, 'SLEMAN', 14);
INSERT INTO `tbl_kota` VALUES (192, 'YOGYAKARTA', 14);
INSERT INTO `tbl_kota` VALUES (193, 'PACITAN', 15);
INSERT INTO `tbl_kota` VALUES (194, 'PONOROGO', 15);
INSERT INTO `tbl_kota` VALUES (195, 'TRENGGALEK', 15);
INSERT INTO `tbl_kota` VALUES (196, 'TULUNGAGUNG', 15);
INSERT INTO `tbl_kota` VALUES (197, 'BLITAR', 15);
INSERT INTO `tbl_kota` VALUES (198, 'KEDIRI', 15);
INSERT INTO `tbl_kota` VALUES (199, 'MALANG', 15);
INSERT INTO `tbl_kota` VALUES (200, 'LUMAJANG', 15);
INSERT INTO `tbl_kota` VALUES (201, 'JEMBER', 15);
INSERT INTO `tbl_kota` VALUES (202, 'BANYUWANGI', 15);
INSERT INTO `tbl_kota` VALUES (203, 'BONDOWOSO', 15);
INSERT INTO `tbl_kota` VALUES (204, 'SITUBONDO', 15);
INSERT INTO `tbl_kota` VALUES (205, 'PROBOLINGGO', 15);
INSERT INTO `tbl_kota` VALUES (206, 'PASURUAN', 15);
INSERT INTO `tbl_kota` VALUES (207, 'SIDOARJO', 15);
INSERT INTO `tbl_kota` VALUES (208, 'MOJOKERTO', 15);
INSERT INTO `tbl_kota` VALUES (209, 'JOMBANG', 15);
INSERT INTO `tbl_kota` VALUES (210, 'NGANJUK', 15);
INSERT INTO `tbl_kota` VALUES (211, 'MADIUN', 15);
INSERT INTO `tbl_kota` VALUES (212, 'MAGETAN', 15);
INSERT INTO `tbl_kota` VALUES (213, 'NGAWI', 15);
INSERT INTO `tbl_kota` VALUES (214, 'BOJONEGORO', 15);
INSERT INTO `tbl_kota` VALUES (215, 'TUBAN', 15);
INSERT INTO `tbl_kota` VALUES (216, 'LAMONGAN', 15);
INSERT INTO `tbl_kota` VALUES (217, 'GRESIK', 15);
INSERT INTO `tbl_kota` VALUES (218, 'BANGKALAN', 15);
INSERT INTO `tbl_kota` VALUES (219, 'SAMPANG', 15);
INSERT INTO `tbl_kota` VALUES (220, 'PAMEKASAN', 15);
INSERT INTO `tbl_kota` VALUES (221, 'SUMENEP', 15);
INSERT INTO `tbl_kota` VALUES (222, 'SURABAYA', 15);
INSERT INTO `tbl_kota` VALUES (223, 'BATU', 15);
INSERT INTO `tbl_kota` VALUES (224, 'PANDEGLANG', 16);
INSERT INTO `tbl_kota` VALUES (225, 'LEBAK', 16);
INSERT INTO `tbl_kota` VALUES (226, 'TANGERANG', 16);
INSERT INTO `tbl_kota` VALUES (227, 'SERANG', 16);
INSERT INTO `tbl_kota` VALUES (228, 'CILEGON', 16);
INSERT INTO `tbl_kota` VALUES (229, 'JEMBARANA', 17);
INSERT INTO `tbl_kota` VALUES (230, 'TABANAN', 17);
INSERT INTO `tbl_kota` VALUES (231, 'BADUNG', 17);
INSERT INTO `tbl_kota` VALUES (232, 'GIANYAR', 17);
INSERT INTO `tbl_kota` VALUES (233, 'KLUNGKUNG', 17);
INSERT INTO `tbl_kota` VALUES (234, 'BANGLI', 17);
INSERT INTO `tbl_kota` VALUES (235, 'KARANGASEM', 17);
INSERT INTO `tbl_kota` VALUES (236, 'BULELENG', 17);
INSERT INTO `tbl_kota` VALUES (237, 'DENPASAR', 17);
INSERT INTO `tbl_kota` VALUES (238, 'LOMBOK BARAT', 18);
INSERT INTO `tbl_kota` VALUES (239, 'LOMBOK TENGAH', 18);
INSERT INTO `tbl_kota` VALUES (240, 'LOMBOK TIMUR', 18);
INSERT INTO `tbl_kota` VALUES (241, 'SUMBAWA', 18);
INSERT INTO `tbl_kota` VALUES (242, 'DOMPU', 18);
INSERT INTO `tbl_kota` VALUES (243, 'BIMA', 18);
INSERT INTO `tbl_kota` VALUES (244, 'SUMBAWA BARAT', 18);
INSERT INTO `tbl_kota` VALUES (245, 'MATARAM', 18);
INSERT INTO `tbl_kota` VALUES (246, 'KUPANG', 19);
INSERT INTO `tbl_kota` VALUES (247, 'TIMOR TENGAH SELATAN', 19);
INSERT INTO `tbl_kota` VALUES (248, 'TIMOR TENGAH UTARA', 19);
INSERT INTO `tbl_kota` VALUES (249, 'BELU', 19);
INSERT INTO `tbl_kota` VALUES (250, 'ALOR', 19);
INSERT INTO `tbl_kota` VALUES (251, 'FLORES TIMUR', 19);
INSERT INTO `tbl_kota` VALUES (252, 'SIKKA', 19);
INSERT INTO `tbl_kota` VALUES (253, 'ENDE', 19);
INSERT INTO `tbl_kota` VALUES (254, 'NGADA', 19);
INSERT INTO `tbl_kota` VALUES (255, 'MANGGARAI', 19);
INSERT INTO `tbl_kota` VALUES (256, 'SUMBA TIMUR', 19);
INSERT INTO `tbl_kota` VALUES (257, 'SUMBA BARAT', 19);
INSERT INTO `tbl_kota` VALUES (258, 'LEMBATA', 19);
INSERT INTO `tbl_kota` VALUES (259, 'ROTE NDAO', 19);
INSERT INTO `tbl_kota` VALUES (260, 'MANGGARAI BARAT', 19);
INSERT INTO `tbl_kota` VALUES (261, 'SAMBAS', 20);
INSERT INTO `tbl_kota` VALUES (262, 'PONTIANAK', 20);
INSERT INTO `tbl_kota` VALUES (263, 'SANGGAU', 20);
INSERT INTO `tbl_kota` VALUES (264, 'KETAPANG', 20);
INSERT INTO `tbl_kota` VALUES (265, 'SINTANG', 20);
INSERT INTO `tbl_kota` VALUES (266, 'KAPUAS HULU', 20);
INSERT INTO `tbl_kota` VALUES (267, 'BENGKAYANG', 20);
INSERT INTO `tbl_kota` VALUES (268, 'LANDAK', 20);
INSERT INTO `tbl_kota` VALUES (269, 'MELAWI', 20);
INSERT INTO `tbl_kota` VALUES (270, 'SEKADAU', 20);
INSERT INTO `tbl_kota` VALUES (271, 'SINGKAWANG', 20);
INSERT INTO `tbl_kota` VALUES (272, 'KOTAWARINGIN BARAT', 21);
INSERT INTO `tbl_kota` VALUES (273, 'KOTAWARINGIN TIMUR', 21);
INSERT INTO `tbl_kota` VALUES (274, 'KAPUAS', 21);
INSERT INTO `tbl_kota` VALUES (275, 'BARITO SELATAN', 21);
INSERT INTO `tbl_kota` VALUES (276, 'BARITO UTARA', 21);
INSERT INTO `tbl_kota` VALUES (277, 'KATINGIN', 21);
INSERT INTO `tbl_kota` VALUES (278, 'SERUYAN', 21);
INSERT INTO `tbl_kota` VALUES (279, 'SUKAMARA', 21);
INSERT INTO `tbl_kota` VALUES (280, 'LAMANDAU', 21);
INSERT INTO `tbl_kota` VALUES (281, 'GUNUNG MAS', 21);
INSERT INTO `tbl_kota` VALUES (282, 'PULANG PISAU', 21);
INSERT INTO `tbl_kota` VALUES (283, 'MURUNG RAYA', 21);
INSERT INTO `tbl_kota` VALUES (284, 'BARITO TIMUR', 21);
INSERT INTO `tbl_kota` VALUES (285, 'PALANGKARAYA', 21);
INSERT INTO `tbl_kota` VALUES (286, 'TANAH LAUT', 22);
INSERT INTO `tbl_kota` VALUES (287, 'KOTABARU', 22);
INSERT INTO `tbl_kota` VALUES (288, 'BARITO KUALA', 22);
INSERT INTO `tbl_kota` VALUES (289, 'TAPIN', 22);
INSERT INTO `tbl_kota` VALUES (290, 'HULU SUNGAI SELATAN', 22);
INSERT INTO `tbl_kota` VALUES (291, 'HULU SUNGAI TENGAH', 22);
INSERT INTO `tbl_kota` VALUES (292, 'HULU SUNGAI UTARA', 22);
INSERT INTO `tbl_kota` VALUES (293, 'TABALONG', 22);
INSERT INTO `tbl_kota` VALUES (294, 'TANAH BAMBU', 22);
INSERT INTO `tbl_kota` VALUES (295, 'BALANGAN', 22);
INSERT INTO `tbl_kota` VALUES (296, 'BANJARMASIN', 22);
INSERT INTO `tbl_kota` VALUES (297, 'BANJARBARU', 22);
INSERT INTO `tbl_kota` VALUES (298, 'PASIR', 23);
INSERT INTO `tbl_kota` VALUES (299, 'KUTAI KERTANEGARA', 23);
INSERT INTO `tbl_kota` VALUES (300, 'BERAU', 23);
INSERT INTO `tbl_kota` VALUES (301, 'BULUNGAN', 23);
INSERT INTO `tbl_kota` VALUES (302, 'NUNUKAN', 23);
INSERT INTO `tbl_kota` VALUES (303, 'MALINAU', 23);
INSERT INTO `tbl_kota` VALUES (304, 'KUTAI BARAT', 23);
INSERT INTO `tbl_kota` VALUES (305, 'KUTAI TIMUR', 23);
INSERT INTO `tbl_kota` VALUES (306, 'PENAJAM PASER UTARA', 23);
INSERT INTO `tbl_kota` VALUES (307, 'BALIKPAPAN', 23);
INSERT INTO `tbl_kota` VALUES (308, 'SAMARINDA', 23);
INSERT INTO `tbl_kota` VALUES (309, 'TARAKAN', 23);
INSERT INTO `tbl_kota` VALUES (310, 'BONTANG', 23);
INSERT INTO `tbl_kota` VALUES (311, 'BOLAANG MANGONDOW', 24);
INSERT INTO `tbl_kota` VALUES (312, 'MINAHASA', 24);
INSERT INTO `tbl_kota` VALUES (313, 'KEPULAUAN SANGIHE', 24);
INSERT INTO `tbl_kota` VALUES (314, 'KEPULAUAN TALAUD', 24);
INSERT INTO `tbl_kota` VALUES (315, 'MINAHASA SELATAN', 24);
INSERT INTO `tbl_kota` VALUES (316, 'MINAHASA UTARA', 24);
INSERT INTO `tbl_kota` VALUES (317, 'MANADO', 24);
INSERT INTO `tbl_kota` VALUES (318, 'BITUNG', 24);
INSERT INTO `tbl_kota` VALUES (319, 'TOMOHON', 24);
INSERT INTO `tbl_kota` VALUES (320, 'BANGGAI', 25);
INSERT INTO `tbl_kota` VALUES (321, 'POSO', 25);
INSERT INTO `tbl_kota` VALUES (322, 'DONGGALA', 25);
INSERT INTO `tbl_kota` VALUES (323, 'TOLOI TOLI', 25);
INSERT INTO `tbl_kota` VALUES (324, 'BUOL', 25);
INSERT INTO `tbl_kota` VALUES (325, 'MOROWALI', 25);
INSERT INTO `tbl_kota` VALUES (326, 'BANGGAI KEPULAUAN', 25);
INSERT INTO `tbl_kota` VALUES (327, 'PARIGI MOUTONG', 25);
INSERT INTO `tbl_kota` VALUES (328, 'TOJO UNA UNA', 25);
INSERT INTO `tbl_kota` VALUES (329, 'PALU', 25);
INSERT INTO `tbl_kota` VALUES (330, 'SELAYAR', 26);
INSERT INTO `tbl_kota` VALUES (331, 'BULUKUMBA', 26);
INSERT INTO `tbl_kota` VALUES (332, 'BANTAENG', 26);
INSERT INTO `tbl_kota` VALUES (333, 'JENEPONTO.', 26);
INSERT INTO `tbl_kota` VALUES (334, 'TAKALAR', 26);
INSERT INTO `tbl_kota` VALUES (335, 'GOWA', 26);
INSERT INTO `tbl_kota` VALUES (336, 'SINJAI', 26);
INSERT INTO `tbl_kota` VALUES (337, 'BONE', 26);
INSERT INTO `tbl_kota` VALUES (338, 'MAROS', 26);
INSERT INTO `tbl_kota` VALUES (339, 'PANGKAJENE KEP.', 26);
INSERT INTO `tbl_kota` VALUES (340, 'BARRU', 26);
INSERT INTO `tbl_kota` VALUES (341, 'SOPPENG', 26);
INSERT INTO `tbl_kota` VALUES (342, 'WAJO', 26);
INSERT INTO `tbl_kota` VALUES (343, 'SIDENRENG RAPANG', 26);
INSERT INTO `tbl_kota` VALUES (344, 'PINRANG', 26);
INSERT INTO `tbl_kota` VALUES (345, 'ENREKANG', 26);
INSERT INTO `tbl_kota` VALUES (346, 'LUWU', 26);
INSERT INTO `tbl_kota` VALUES (347, 'TANA TORAJA', 26);
INSERT INTO `tbl_kota` VALUES (348, 'LUWU UTARA', 26);
INSERT INTO `tbl_kota` VALUES (349, 'LUWU TIMUR', 26);
INSERT INTO `tbl_kota` VALUES (350, 'MAKASAR', 26);
INSERT INTO `tbl_kota` VALUES (351, 'PARE PARE', 26);
INSERT INTO `tbl_kota` VALUES (352, 'PALOPO', 26);
INSERT INTO `tbl_kota` VALUES (353, 'KOLAKA', 27);
INSERT INTO `tbl_kota` VALUES (354, 'KONAWE', 27);
INSERT INTO `tbl_kota` VALUES (355, 'MUNA', 27);
INSERT INTO `tbl_kota` VALUES (356, 'BUTON', 27);
INSERT INTO `tbl_kota` VALUES (357, 'KONAWE SELATAN', 27);
INSERT INTO `tbl_kota` VALUES (358, 'BOMBANA', 27);
INSERT INTO `tbl_kota` VALUES (359, 'WAKATOBI', 27);
INSERT INTO `tbl_kota` VALUES (360, 'KOLAKA UTARA', 27);
INSERT INTO `tbl_kota` VALUES (361, 'KENDARI', 27);
INSERT INTO `tbl_kota` VALUES (362, 'BAU BAU', 27);
INSERT INTO `tbl_kota` VALUES (363, 'GORONTALO', 28);
INSERT INTO `tbl_kota` VALUES (364, 'BOALEMO', 28);
INSERT INTO `tbl_kota` VALUES (365, 'BONE BOLANGO', 28);
INSERT INTO `tbl_kota` VALUES (366, 'PAHUWATO', 28);
INSERT INTO `tbl_kota` VALUES (367, 'MAMUJU UTARA', 29);
INSERT INTO `tbl_kota` VALUES (368, 'MAMUJU', 29);
INSERT INTO `tbl_kota` VALUES (369, 'MAMASA', 29);
INSERT INTO `tbl_kota` VALUES (370, 'POLOWALI MAMASA', 29);
INSERT INTO `tbl_kota` VALUES (371, 'MAJENE', 29);
INSERT INTO `tbl_kota` VALUES (372, 'MALUKU TENGAH', 30);
INSERT INTO `tbl_kota` VALUES (373, 'MALUKU TENGGARA', 30);
INSERT INTO `tbl_kota` VALUES (374, 'MALUKU TENGGARA BRT', 30);
INSERT INTO `tbl_kota` VALUES (375, 'BURU', 30);
INSERT INTO `tbl_kota` VALUES (376, 'SERAM BAGIAN TIMUR', 30);
INSERT INTO `tbl_kota` VALUES (377, 'SERAM BAGIAN BARAT', 30);
INSERT INTO `tbl_kota` VALUES (378, 'KEPULAUAN ARU', 30);
INSERT INTO `tbl_kota` VALUES (379, 'AMBON', 30);
INSERT INTO `tbl_kota` VALUES (380, 'HALMAHERA BARAT', 31);
INSERT INTO `tbl_kota` VALUES (381, 'HALMAHERA TENGAH', 31);
INSERT INTO `tbl_kota` VALUES (382, 'HALMAHERA UTARA', 31);
INSERT INTO `tbl_kota` VALUES (383, 'HALMAHERA SELATAN', 31);
INSERT INTO `tbl_kota` VALUES (384, 'KEPULAUAN SULA', 31);
INSERT INTO `tbl_kota` VALUES (385, 'HALMAHERA TIMUR', 31);
INSERT INTO `tbl_kota` VALUES (386, 'TERNATE', 31);
INSERT INTO `tbl_kota` VALUES (387, 'TIDORE KEPULAUAN', 31);
INSERT INTO `tbl_kota` VALUES (388, 'MERAUKE', 32);
INSERT INTO `tbl_kota` VALUES (389, 'JAYAWIJAYA', 32);
INSERT INTO `tbl_kota` VALUES (390, 'JAYAPURA', 32);
INSERT INTO `tbl_kota` VALUES (391, 'NABIRE', 32);
INSERT INTO `tbl_kota` VALUES (392, 'YAPEN WAROPEN', 32);
INSERT INTO `tbl_kota` VALUES (393, 'BIAK NUMFOR', 32);
INSERT INTO `tbl_kota` VALUES (394, 'PUNCAK JAYA', 32);
INSERT INTO `tbl_kota` VALUES (395, 'PANIAI', 32);
INSERT INTO `tbl_kota` VALUES (396, 'MIMIKA', 32);
INSERT INTO `tbl_kota` VALUES (397, 'SARMI', 32);
INSERT INTO `tbl_kota` VALUES (398, 'KEEROM', 32);
INSERT INTO `tbl_kota` VALUES (399, 'PEGUNUNGAN BINTANG', 32);
INSERT INTO `tbl_kota` VALUES (400, 'YAHUKIMO', 32);
INSERT INTO `tbl_kota` VALUES (401, 'TOLIKARA', 32);
INSERT INTO `tbl_kota` VALUES (402, 'WAROPEN', 32);
INSERT INTO `tbl_kota` VALUES (403, 'BOVEN DIGOEL', 32);
INSERT INTO `tbl_kota` VALUES (404, 'MAPPI', 32);
INSERT INTO `tbl_kota` VALUES (405, 'ASMAT', 32);
INSERT INTO `tbl_kota` VALUES (406, 'SUPIORI', 32);
INSERT INTO `tbl_kota` VALUES (407, 'SORONG', 33);
INSERT INTO `tbl_kota` VALUES (408, 'MANOKWARI', 33);
INSERT INTO `tbl_kota` VALUES (409, 'FAK FAK', 33);
INSERT INTO `tbl_kota` VALUES (410, 'SORONG SELATAN', 33);
INSERT INTO `tbl_kota` VALUES (411, 'RAJA AMPAT', 33);
INSERT INTO `tbl_kota` VALUES (412, 'BENTUNI TELUK', 33);
INSERT INTO `tbl_kota` VALUES (413, 'WONDAMA TELUK', 33);
INSERT INTO `tbl_kota` VALUES (414, 'KAIMA', 33);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_negara`
-- 

CREATE TABLE `tbl_negara` (
  `id_negara` int(11) NOT NULL auto_increment,
  `negara` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_negara`),
  UNIQUE KEY `country` (`negara`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `tbl_negara`
-- 

INSERT INTO `tbl_negara` VALUES (1, 'INDONESIA');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_pengembalian_barang`
-- 

CREATE TABLE `tbl_pengembalian_barang` (
  `kode_pengembalian_barang` int(11) NOT NULL auto_increment,
  `tgl_pengembalian_barang` datetime NOT NULL,
  `pesan` text collate latin1_general_ci NOT NULL,
  `kode_user` int(5) NOT NULL,
  `no_resi` varchar(40) collate latin1_general_ci NOT NULL,
  `status` int(1) NOT NULL default '0' COMMENT '0=pendding,1=proses kirim ulang',
  PRIMARY KEY  (`kode_pengembalian_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `tbl_pengembalian_barang`
-- 

INSERT INTO `tbl_pengembalian_barang` VALUES (1, '2014-05-21 11:47:37', 'sbdfxbgervgergerger', 2, '2323364354', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_pengiriman`
-- 

CREATE TABLE `tbl_pengiriman` (
  `id_pengiriman` int(11) NOT NULL auto_increment,
  `pengiriman` varchar(15) NOT NULL,
  PRIMARY KEY  (`id_pengiriman`),
  UNIQUE KEY `via` (`pengiriman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `tbl_pengiriman`
-- 

INSERT INTO `tbl_pengiriman` VALUES (1, 'JNE');
INSERT INTO `tbl_pengiriman` VALUES (2, 'TIKI');

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
  `berat` double NOT NULL COMMENT 'gram',
  PRIMARY KEY  (`kode_produk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `tbl_produk`
-- 

INSERT INTO `tbl_produk` VALUES ('SKK100001', 4, 'An-nas ', 20000, 105, 15, 'Foto-0015.jpg', 'Foto-0015.jpg', '<p>Minimal pembelian 5 buah, nomor peci merupakan nomor seri 5-9</p>\r\n\n<p>Jika ingin memesan barang sesuai nomor peci yang Anda inginkan, bisa dengan mengisi di tabel pemesanan. Terima kasih ^_^</p>', '', 120);
INSERT INTO `tbl_produk` VALUES ('SKK100002', 3, 'Aceh Ac 1', 30000, 10, 10, '309359_acehac1.jpg', '309359_acehac1.jpg', '', '', 130);
INSERT INTO `tbl_produk` VALUES ('SKK100003', 3, 'raja eksklusif', 35000, 45, 5, 'peci-raja-exclusive-bordir-komputer-detail.jpg', 'peci-raja-exclusive-bordir-komputer-detail.jpg', '', '', 125);
INSERT INTO `tbl_produk` VALUES ('SKK100004', 2, 'kopiyah halus', 10000, 100, 0, '2261696_b-09155.jpg', '2261696_b-09155.jpg', '', '', 120);
INSERT INTO `tbl_produk` VALUES ('SKK100006', 3, 'lacer', 40000, 50, 0, '1368355783_507826841_3-songkok-presiden-Surabaya.jpg', '1368355783_507826841_3-songkok-presiden-Surabaya.jpg', '', '', 120);
INSERT INTO `tbl_produk` VALUES ('SKK100007', 3, 'elegant', 40000, 45, 5, 'images.jpg', 'images.jpg', '', '', 115);
INSERT INTO `tbl_produk` VALUES ('SKK100008', 2, 'kopiyah chs', 10000, 50, 0, '2180849_t-0277.5.jpg', '2180849_t-0277.5.jpg', '', '', 120);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_propinsi`
-- 

CREATE TABLE `tbl_propinsi` (
  `id_propinsi` int(11) NOT NULL auto_increment,
  `propinsi` varchar(50) NOT NULL,
  `id_negara` int(11) NOT NULL,
  PRIMARY KEY  (`id_propinsi`),
  UNIQUE KEY `province` (`propinsi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

-- 
-- Dumping data for table `tbl_propinsi`
-- 

INSERT INTO `tbl_propinsi` VALUES (1, 'NANGGROE ACEH DARUSSALAM', 1);
INSERT INTO `tbl_propinsi` VALUES (2, 'SUMATERA UTARA', 1);
INSERT INTO `tbl_propinsi` VALUES (3, 'SUMATERA BARAT', 1);
INSERT INTO `tbl_propinsi` VALUES (4, 'RIAU', 1);
INSERT INTO `tbl_propinsi` VALUES (5, 'JAMBI', 1);
INSERT INTO `tbl_propinsi` VALUES (6, 'SUMATERA SELATAN', 1);
INSERT INTO `tbl_propinsi` VALUES (7, 'BENGKULU', 1);
INSERT INTO `tbl_propinsi` VALUES (8, 'LAMPUNG', 1);
INSERT INTO `tbl_propinsi` VALUES (9, 'KEP BANGKA BELITUNG', 1);
INSERT INTO `tbl_propinsi` VALUES (10, 'KEP RIAU', 1);
INSERT INTO `tbl_propinsi` VALUES (11, 'DKI JAKARTA', 1);
INSERT INTO `tbl_propinsi` VALUES (12, 'JAWA BARAT', 1);
INSERT INTO `tbl_propinsi` VALUES (13, 'JAWA TENGAH', 1);
INSERT INTO `tbl_propinsi` VALUES (14, 'DI JOGJAKARTA', 1);
INSERT INTO `tbl_propinsi` VALUES (15, 'JAWA TIMUR', 1);
INSERT INTO `tbl_propinsi` VALUES (16, 'BANTEN', 1);
INSERT INTO `tbl_propinsi` VALUES (17, 'BALI', 1);
INSERT INTO `tbl_propinsi` VALUES (18, 'NUSA TENGGARA BARAT', 1);
INSERT INTO `tbl_propinsi` VALUES (19, 'NUSA TENGGARA TIMUR', 1);
INSERT INTO `tbl_propinsi` VALUES (20, 'KALIMANTAN BARAT', 1);
INSERT INTO `tbl_propinsi` VALUES (21, 'KALIMANTAN TENGAH', 1);
INSERT INTO `tbl_propinsi` VALUES (22, 'KALIMANTAN SELATAN', 1);
INSERT INTO `tbl_propinsi` VALUES (23, 'KALIMANTAN TIMUR', 1);
INSERT INTO `tbl_propinsi` VALUES (24, 'SULAWESI UTARA', 1);
INSERT INTO `tbl_propinsi` VALUES (25, 'SULAWESI TENGAH', 1);
INSERT INTO `tbl_propinsi` VALUES (26, 'SULAWESI SELATAN', 1);
INSERT INTO `tbl_propinsi` VALUES (27, 'SULAWESI TENGGARA', 1);
INSERT INTO `tbl_propinsi` VALUES (28, 'GORONTALO', 1);
INSERT INTO `tbl_propinsi` VALUES (29, 'SULAWESI BARAT', 1);
INSERT INTO `tbl_propinsi` VALUES (30, 'MALUKU', 1);
INSERT INTO `tbl_propinsi` VALUES (31, 'MALUKU UTARA', 1);
INSERT INTO `tbl_propinsi` VALUES (32, 'PAPUA', 1);
INSERT INTO `tbl_propinsi` VALUES (33, 'PAPUA BARAT', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_spr_admn`
-- 

CREATE TABLE `tbl_spr_admn` (
  `kode_spr_admn` int(2) NOT NULL auto_increment,
  `username_admn` varchar(50) NOT NULL,
  `pass_admn` varchar(200) NOT NULL,
  `nama_admn` varchar(100) NOT NULL,
  `stts` varchar(20) NOT NULL,
  `lvl` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  PRIMARY KEY  (`kode_spr_admn`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `tbl_spr_admn`
-- 

INSERT INTO `tbl_spr_admn` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Nurma Asih', '1', 'spradmn', 'nurma.asih@gmail.com', 'Yogyakarta', '1990-01-19');
INSERT INTO `tbl_spr_admn` VALUES (10, 'user', '21232f297a57a5a743894a0e4a801fc3', 'user', '1', 'biasa', 'user@user.com', 'user', '1980-06-12');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_testimonial`
-- 

CREATE TABLE `tbl_testimonial` (
  `id_testi` int(10) NOT NULL auto_increment,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `status` int(1) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_testi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- 
-- Dumping data for table `tbl_testimonial`
-- 

INSERT INTO `tbl_testimonial` VALUES (22, 'adin', 'adin@gmail.com', 'produknya murah dan kualitasnya bagus bingiitt.. suka deh ^_^', 0, '01-05-2014 | 07:26:pm');
INSERT INTO `tbl_testimonial` VALUES (23, 'sisi', 'sisi123@gmail.com', '<p>produknya top markotoooopp</p>', 1, '01-05-2014 | 07:28:pm');
INSERT INTO `tbl_testimonial` VALUES (24, 'mega wati', 'mega@gmail.com', '<p>baguuuusss baguuusss bingiitt.. harganya juga terjangkau, cocoookk</p>', 1, '07-05-2014 | 12:05:am');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_transaksi_detail`
-- 

CREATE TABLE `tbl_transaksi_detail` (
  `kode_transaksi_detail` int(10) NOT NULL auto_increment,
  `kode_transaksi` bigint(150) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(10) NOT NULL,
  PRIMARY KEY  (`kode_transaksi_detail`),
  KEY `kode_transaksi` (`kode_transaksi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- 
-- Dumping data for table `tbl_transaksi_detail`
-- 

INSERT INTO `tbl_transaksi_detail` VALUES (13, 20140501002, 'SKK100001', 20000, 5);
INSERT INTO `tbl_transaksi_detail` VALUES (14, 20140515001, 'SKK100005', 35000, 5);
INSERT INTO `tbl_transaksi_detail` VALUES (15, 20140515001, 'SKK100002', 30000, 5);
INSERT INTO `tbl_transaksi_detail` VALUES (16, 20140520001, 'SKK100007', 40000, 5);
INSERT INTO `tbl_transaksi_detail` VALUES (17, 20140520001, 'SKK100003', 35000, 5);

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
  `hargaperkilo` double NOT NULL default '0',
  `subberat` double NOT NULL default '0',
  `subtotal` double NOT NULL default '0',
  `bank` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `status` int(1) NOT NULL default '1' COMMENT '1 = Dipesan, 2 = Proses, 3 = Sudah Dikirim',
  PRIMARY KEY  (`kode_transaksi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `tbl_transaksi_header`
-- 

INSERT INTO `tbl_transaksi_header` VALUES (20140501002, '', '2014-05-26', '00:00:00', 1, 'sisi', 'sisi123@gmail.com', 'Yogyakarta', 'Yogyakarta', 'Sleman', '54321', '081987876908', 'Setoran Tunai, Transfer Bank', 1, 0, 0, 0, 'Bank Central Asia - No. Rek 1800658299', '-', 2);
INSERT INTO `tbl_transaksi_header` VALUES (20140515001, '', '2014-05-25', '15:50:53', 2, 'mega wati', 'mega@gmail.com', 'yogyakarta', 'Yogyakarta', 'Yogyakarta', '54321', '081809789777', 'Setoran Tunai, Transfer Bank', 2, 0, 0, 0, 'Bank Central Asia - No. Rek 1800658299', '-', 1);
INSERT INTO `tbl_transaksi_header` VALUES (20140520001, '', '2014-05-20', '22:49:34', 1, 'sisi susanti', 'sisi@gmail.com', '<p>yogyakarta</p>', 'Yogyakarta', 'Yogyakarta', '54321', '081809785432', 'Setoran Tunai, Transfer Bank', 0, 0, 0, 0, 'Bank Central Asia - No. Rek 1800658299', '-', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_user`
-- 

CREATE TABLE `tbl_user` (
  `kode_user` int(5) NOT NULL auto_increment,
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
  `tgl_transaksi` date NOT NULL,
  PRIMARY KEY  (`kode_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `tbl_user`
-- 

INSERT INTO `tbl_user` VALUES (1, 'nini', '8054da645a387dbfb06654d69f0d0201', 'nini nini', 'nini@yahoo.com', '<p>nini</p>', '9435749272397', 'Yogyakarta', 'Sleman', '73284', '0000-00-00', 1, '', '0000-00-00');
INSERT INTO `tbl_user` VALUES (2, 'mega', '91805ec00ad20b85226bec0bacf843d3', 'mega wati', 'mega@gmail.com', 'yogyakarta', '081809789777', 'Yogyakarta', 'Yogyakarta', '54321', '0000-00-00', 1, '91805ec00ad20b85226bec0bacf843d3', '0000-00-00');
