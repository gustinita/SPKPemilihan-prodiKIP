-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk saw
DROP DATABASE IF EXISTS `saw`;
CREATE DATABASE IF NOT EXISTS `saw` /*!40100 DEFAULT CHARACTER SET utf8mb4 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `saw`;

-- membuang struktur untuk table saw.biodatamhs
DROP TABLE IF EXISTS `biodatamhs`;
CREATE TABLE IF NOT EXISTS `biodatamhs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_regis` varchar(155) NOT NULL,
  `tahun` varchar(155) NOT NULL,
  `nama` varchar(155) NOT NULL,
  `jenis_kelamin` varchar(155) NOT NULL,
  `agama` varchar(155) NOT NULL,
  `prodi1` varchar(155) NOT NULL,
  `prodi2` varchar(155) NOT NULL,
  `prodi3` varchar(155) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(155) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel saw.biodatamhs: ~1 rows (lebih kurang)
REPLACE INTO `biodatamhs` (`id`, `kode_regis`, `tahun`, `nama`, `jenis_kelamin`, `agama`, `prodi1`, `prodi2`, `prodi3`, `tanggal_lahir`, `email`, `created_at`, `updated_at`) VALUES
	(1, '020301-12022201-827846', '2020-2021', 'fatimah', 'Perempuan', 'Islam', 'Arsitek', 'Perencanaan Wilayah dan Kota', 'Informatika', '2002-08-19', 'fatim@gmail', '2023-06-13 01:57:05', '2023-06-13 01:57:05');

-- membuang struktur untuk table saw.data
DROP TABLE IF EXISTS `data`;
CREATE TABLE IF NOT EXISTS `data` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternatif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `c1` int NOT NULL,
  `c2` int NOT NULL,
  `c3` int NOT NULL,
  `c4` int NOT NULL,
  `c5` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel saw.data: ~4 rows (lebih kurang)
REPLACE INTO `data` (`id`, `kode`, `alternatif`, `c1`, `c2`, `c3`, `c4`, `c5`) VALUES
	(1, 'A1', 'Informatika', 75, 80, 70, 80, 10000000),
	(2, 'A2', 'Arsitek', 70, 85, 75, 80, 12000000),
	(3, 'A3', 'Perencanaan Wilayah dan Kota', 80, 75, 85, 70, 8000000),
	(4, 'A4', 'Sipil', 85, 90, 80, 75, 9000000);

-- membuang struktur untuk table saw.datacrips
DROP TABLE IF EXISTS `datacrips`;
CREATE TABLE IF NOT EXISTS `datacrips` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nilaimtk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipe` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel saw.datacrips: ~10 rows (lebih kurang)
REPLACE INTO `datacrips` (`id`, `nilaimtk`, `kategori`, `nilai`, `created_at`, `updated_at`, `tipe`) VALUES
	(1, '0-50', 'Rendah', 1, '2023-05-06 02:40:47', '2023-05-06 02:40:47', 1),
	(2, '51-65', 'Kurang', 2, '2023-05-07 20:25:13', '2023-05-07 20:25:13', 1),
	(3, '66-75', 'Cukup', 3, '2023-05-07 20:25:40', '2023-05-07 20:25:40', 1),
	(4, '76-85', 'Baik', 4, '2023-05-07 20:25:58', '2023-05-07 20:25:58', 1),
	(5, '86-100', 'Sangat Baik', 5, '2023-05-07 20:26:23', '2023-05-07 20:26:23', 1),
	(6, '< 2.000.000', 'Rendah', 1, NULL, NULL, 2),
	(7, '2.100.000 - 2.500.000', 'Kurang', 2, NULL, NULL, 2),
	(8, '2.600.000 - 3.000.000', 'Cukup', 3, NULL, NULL, 2),
	(9, '3.100.000 - 3.500.000', 'Baik', 4, NULL, NULL, 2),
	(10, '> 3.500.000', 'Sangat Baik', 5, NULL, NULL, 2);

-- membuang struktur untuk table saw.data_kip
DROP TABLE IF EXISTS `data_kip`;
CREATE TABLE IF NOT EXISTS `data_kip` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_registrasi` varchar(55) DEFAULT NULL,
  `tahun` varchar(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(13) DEFAULT NULL,
  `agama` varchar(17) DEFAULT NULL,
  `prodi1` varchar(39) DEFAULT NULL,
  `prodi2` varchar(34) DEFAULT NULL,
  `prodi3` varchar(39) DEFAULT NULL,
  `tanggal_lahir` varchar(13) DEFAULT NULL,
  `email` varchar(34) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb3;

-- Membuang data untuk tabel saw.data_kip: ~91 rows (lebih kurang)
REPLACE INTO `data_kip` (`id`, `kode_registrasi`, `tahun`, `nama`, `jenis_kelamin`, `agama`, `prodi1`, `prodi2`, `prodi3`, `tanggal_lahir`, `email`, `created_at`, `update_at`, `user_id`) VALUES
	(2, '020301-12122201-790138', '2021 - 2022', 'Ananda Rahmad Febryan', 'Laki-Laki', 'Islam', 'S1 Teknik Sipil', 'S1 Teknik Sipil', 'S1 Teknik Sipil', '13-Feb-02', 'anandaduaar@gmail.com', NULL, '2023-05-25 06:07:43', 0),
	(3, '020301-32022201-821874', '2020 - 2021', 'meliya cahya', 'Perempuan', 'Islam', 'S1 Teknik Sipil', '', '', '10-Aug-02', 'meliyac766@gmail.com', NULL, '2023-05-25 06:07:43', 1),
	(4, '020301-12022201-827846', '2020 - 2021', 'Aulia Rahim', 'Laki-Laki', 'Islam', 'S1 Teknik Sipil', 'S1 Informatika', 'S1 Perencanaan Wilayah dan Kota', '20-Nov-20', 'auliarahim123@gmail.com', NULL, '2023-05-25 06:07:43', 4),
	(5, '020301-22022201-869598', '2020 - 2021', 'Muhammad Hadi Saputra', 'Laki-Laki', 'Islam', 'S1 Teknik Sipil', 'S1 Informatika', 'S1 Perencanaan Wilayah dan Kota', '31-Jan-02', 'saputrahadi552@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(6, '020301-32022201-900688', '2020 - 2021', 'M. Shidiq Sanjaya', 'Laki-Laki', 'Islam', 'S1 Teknik Sipil', 'S1 Informatika', 'S1 Arsitektur', '30-Dec-01', 'shidiqsanjaya@gmail.com', NULL, '2023-05-25 06:07:43', 15),
	(7, '030101-12135201-229007', '2021 - 2022', 'ILHAM', 'Laki-Laki', 'Islam', 'S1 Perencanaan Wilayah dan Kota', 'S1 Pendidikan Islam Anak Usia Dini', 'S1 Pendidikan Bahasa Indonesia', '25-Jun-01', 'salmanilham08@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(8, '020301-32022201-318954', '2020 - 2021', 'Muhammad Taufik', 'Laki-Laki', 'Islam', 'S1 Teknik Sipil', 'S1 Informatika', 'S1 Perencanaan Wilayah dan Kota', '20-Jun-01', 'taufik.telda@gmail.com', NULL, '2023-05-25 06:07:43', 12),
	(9, '040201-12122201-993538', '2021 - 2022', 'Aisyah Amini', 'Perempuan', 'Islam', 'S1 Teknik Sipil', 'S1 Perencanaan Wilayah dan Kota', 'S1 Perencanaan Wilayah dan Kota', '26-Dec-02', 'aisyahamini669@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(10, '020301-12122201-979250', '2021 - 2022', 'Arief parastowo', 'Laki-Laki', 'Islam', 'S1 Teknik Sipil', 'S1 Pendidikan Bahasa Inggris', 'S1 Farmasi', '08-Mar-04', 'kadarsihhusin@gmail.com', NULL, '2023-05-25 06:07:43', 13),
	(11, '020301-12122201-763341', '2021 - 2022', 'Fitri Adi Nur', 'Laki-Laki', 'Islam', 'S1 Teknik Sipil', 'S1 Informatika', 'S1 Perencanaan Wilayah dan Kota', '16-Dec-02', 'fitriadinur6@gmail.com', NULL, '2023-05-25 06:07:43', 9),
	(12, '010101-12122201-635027', '2021 - 2022', 'Hidayati Sabrina', 'Perempuan', 'Islam', 'S1 Teknik Sipil', 'S1 Informatika', 'S1 Pendidikan Matematika', '06-Dec-01', 'hidayatisabrina6@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(13, '020401-12155201-889041', '2021 - 2022', 'M.Jordan Ramadhana', 'Laki-Laki', 'Islam', 'S1 Informatika', 'S1 Teknik Sipil', 'S1 Perencanaan Wilayah dan Kota', '07-Sep-02', 'jordan4444rd@gmail.com', NULL, '2023-05-25 06:07:43', 11),
	(14, '020301-12122201-676321', '2021 - 2022', 'Muhammad Rizki Ramadhan', 'Laki-Laki', 'Islam', 'S1 Teknik Sipil', 'S1 Informatika', 'S1 Perencanaan Wilayah dan Kota', '27-Oct-03', 'muhammadrizkiramadhan960@gmail.com', NULL, '2023-05-25 06:07:43', 16),
	(15, '030201-12122201-939696', '2021 - 2022', 'NADIA SAFITRI', 'Perempuan', 'Islam', 'S1 Teknik Sipil', 'S1 Pendidikan Bahasa Indonesia', 'S1 Perbankan Syariah', '14-Jun-03', 'nadiasafitri1502@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(16, '020301-12122201-988596', '2021 - 2022', 'Nazwal Aqli', 'Laki-Laki', 'Islam', 'S1 Teknik Sipil', 'S1 Perencanaan Wilayah dan Kota', 'S1 Arsitektur', '26-Jun-03', 'nazwaaqli.app@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(17, '020301-12122201-668925', '2021 - 2022', 'RIYAN', 'Laki-Laki', 'Islam', 'S1 Teknik Sipil', 'S1 Psikologi', 'D3 Farmasi', '25-Feb-02', 'iyannn538@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(18, '020301-12122201-311361', '2021 - 2022', 'RISYA DEVIANA', 'Perempuan', 'Islam', 'S1 Teknik Sipil', 'S1 Informatika', 'S1 Perencanaan Wilayah dan Kota', '13-Aug-21', 'risyadeviana09@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(19, '030101-12122201-502334', '2021 - 2022', 'Muhammad Surya Dirgantara', 'Laki-Laki', 'Islam', 'S1 Teknik Sipil', 'S1 Perencanaan Wilayah dan Kota', 'S1 Informatika', '06-Jul-03', 'suryadirgantara06@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(20, '020301-12122201-611269', '2021 - 2022', 'Muhammad Khusni', 'Laki-Laki', 'Islam', 'S1 Teknik Sipil', 'S1 Perencanaan Wilayah dan Kota', 'S1 Informatika', '19-Jul-01', 'muhammadkhusni28@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(21, '020401-12155201-807999', '2021 - 2022', 'Adelia Fitriani', 'Perempuan', 'Islam', 'S1 Informatika', 'S1 Teknik Sipil', 'S1 Arsitektur', '01-Dec-02', 'fitrianiadelia430@gmail.com', NULL, '2023-05-25 06:07:43', 7),
	(22, '020101-11948201-991732', '2019 - 2020', 'Annisa Fitria', 'Perempuan', 'Islam', 'S1 Farmasi', 'S1 Keperawatan A', 'Program Profesi Ners', '31-Dec-00', 'ichaspt6172@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(23, '010301-120S1KEPB-710587', '2020 - 2021', 'Raudatul jannah', 'Perempuan', 'Islam', 'S1 Keperawatan Bilingual', 'S1 Farmasi', 'S1 Teknik Sipil', '24-Jun-02', 'nnnnaaaaa234@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(24, '020401-12123201-492684', '2021 - 2022', 'ARDITA AMELIA PUTRI', 'Perempuan', 'Islam', 'S1 Arsitektur', 'S1 Arsitektur', 'S1 Arsitektur', '05-May-02', 'arditaameliaputri05050@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(25, '020501-12123201-571205', '2021 - 2022', 'Athica Yuhana Widyanti', 'Perempuan', 'Islam', 'S1 Arsitektur', 'S1 Teknik Sipil', 'S1 Perencanaan Wilayah dan Kota', '07-Jun-02', 'jubaijubai055@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(26, '020501-12123201-732384', '2021 - 2022', 'Erwin Wahyuni', 'Laki-Laki', 'Islam', 'S1 Arsitektur', 'S1 Arsitektur Reguler B', 'S1 Teknik Sipil', '04-Oct-01', 'erwinwahyuni04@gmail.com', NULL, '2023-05-25 06:07:43', 14),
	(27, '030401-12155201-485888', '2021 - 2022', 'Nada Nawawi', 'Perempuan', 'Islam', 'S1 Informatika', 'S1 Arsitektur', 'S1 Perbankan Syariah', '', 'hjnadanawawi@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(28, '020401-12123201-482722', '2021 - 2022', 'Huais Al Karni', 'Laki-Laki', 'Islam', 'S1 Arsitektur', 'S1 Teknik Sipil', 'S1 Informatika', '24-Sep-01', 'huaisalkarni2409@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(29, '020501-12123201-724502', '2021 - 2022', 'Julia Lestari', 'Perempuan', 'Islam', 'S1 Arsitektur', 'S1 Arsitektur', 'S1 Arsitektur', '20-Jul-23', 'julialst23@gmai.com', NULL, '2023-05-25 06:07:43', NULL),
	(30, '020301-12022201-748992', '2020 - 2021', 'Muhammad alwi irvani', 'Laki-Laki', 'Islam', 'S1 Teknik Sipil', 'S1 Informatika', 'S1 Perencanaan Wilayah dan Kota', '19-Feb-02', 'alwiirvani@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(31, '030501-12123201-806598', '2021 - 2022', 'Normaliah', 'Perempuan', 'Islam', 'S1 Arsitektur', 'S1 Psikologi', 'D3 Farmasi', '11-Jan-03', 'normaliah11103@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(32, '020501-12123201-252667', '2021 - 2022', 'Nur Aulia Rahmi', 'Perempuan', 'Islam', 'S1 Arsitektur', 'S1 Pendidikan Bahasa Inggris', 'S1 Keperawatan A', '07-Jul-02', 'lolipopaulia@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(33, '020301-12122201-593121', '2021 - 2022', 'Nur irpansyah', 'Laki-Laki', 'Islam', 'S1 Teknik Sipil', 'S1 Arsitektur', 'S1 Perencanaan Wilayah & Kota Reguler B', '05-Feb-01', 'nr.irpansyah.2001@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(34, '020401-12155201-894011', '2021 - 2022', 'Siska Elmaya', 'Perempuan', 'Islam', 'S1 Informatika', 'S1 Arsitektur', 'S1 Informatika Reguler B', '24-Oct-03', 'siskae751@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(35, '040201-12135201-443291', '2021 - 2022', 'Asti Wulandari ', 'Perempuan', 'Islam', 'S1 Perencanaan Wilayah dan Kota', 'S1 Teknik Sipil', 'S1 Perbankan Syariah', '25-Jan-04', 'astiwulandari428@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(36, '020501-12123201-761257', '2021 - 2022', 'Eka putri', 'Perempuan', 'Islam', 'S1 Arsitektur', 'S1 Teknik Sipil', 'S1 Perencanaan Wilayah dan Kota', '20-Jul-03', 'uput408@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(37, '010101-12114201-061224', '2021 - 2022', 'Siti Marliana', 'Perempuan', 'Islam', 'S1 Keperawatan A', 'S1 Perencanaan Wilayah dan Kota', 'S1 Teknik Sipil', '26-Sep-02', 'sitimarliana060@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(38, '020401-12155201-503489', '2021 - 2022', 'Nadia Afsari', 'Perempuan', 'Islam', 'S1 Informatika', 'S1 Perencanaan Wilayah dan Kota', 'S1 Perbankan Syariah', '08-Aug-21', 'nadiaafsari07@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(39, '030101-12135201-704327', '2021 - 2022', 'Nasarudin', 'Laki-Laki', 'Islam', 'S1 Perencanaan Wilayah dan Kota', 'S1 Perencanaan Wilayah dan Kota', 'S1 Perencanaan Wilayah dan Kota', '17-Apr-03', 'aidannadia01@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(40, '030101-12135201-759625', '2021 - 2022', 'RISWANTO', 'Laki-Laki', 'Islam', 'S1 Perencanaan Wilayah dan Kota', 'S1 Teknik Sipil', 'S1 Arsitektur', '25-Aug-01', 'usimonye123@gmail.com', NULL, '2023-05-25 06:07:43', 6),
	(41, '020401-121S1pwkB-285388', '2021 - 2022', 'RUDIANSYAH', 'Laki-Laki', 'Islam', 'S1 Perencanaan Wilayah & Kota Reguler B', 'S1 Informatika', 'D3 Farmasi', '20-Oct-02', 'rudi6808@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(42, '030201-12135201-937413', '2021 - 2022', 'SIHABFUDDIN ', 'Laki-Laki', 'Islam', 'S1 Perencanaan Wilayah dan Kota', 'S1 Pendidikan Bahasa Indonesia', 'S1 Arsitektur', '26-Aug-02', 'sihabfuddin616@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(43, '030101-12135201-068319', '2021 - 2022', 'Siti Nur Haliza', 'Perempuan', 'Islam', 'S1 Perencanaan Wilayah dan Kota', 'S1 Informatika', 'S1 Perbankan Syariah', '06-Jun-03', 'snurhaliza504@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(44, '030101-12135201-923094', '2021 - 2022', 'Tasfin Thoriq', 'Laki-Laki', 'Islam', 'S1 Perencanaan Wilayah dan Kota', 'S1 Arsitektur', 'S1 Arsitektur', '17-Apr-04', 'ttasfinthoriq@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(45, '020401-12155201-583904', '2021 - 2022', 'YULIA CITRA', 'Perempuan', 'Islam', 'S1 Informatika', 'S1 Psikologi', 'S1 Perbankan Syariah', '23-Aug-03', 'yc476049@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(46, '030101-12135201-600563', '2021 - 2022', 'Raihanah', 'Perempuan', 'Islam', 'S1 Perencanaan Wilayah dan Kota', 'S1 Teknik Sipil', 'S1 Pendidikan Matematika', '25-Nov-03', 'raihanahraihanah123@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(47, '020301-12135201-583092', '2021 - 2022', 'Nurul Annisa Ramadani', 'Perempuan', 'Islam', 'S1 Perencanaan Wilayah dan Kota', 'S1 Teknik Sipil', 'S1 Arsitektur', '08-Dec-01', 'nurulannisaramadani812@gmail.com', NULL, '2023-05-25 06:07:43', 10),
	(48, '030101-12135201-402168', '2021 - 2022', 'Muhammad hakim akbar', 'Laki-Laki', 'Islam', 'S1 Perencanaan Wilayah dan Kota', '', '', '29-Jul-02', 'mstrhkm@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(49, '030101-12135201-516607', '2021 - 2022', 'Khairul azmir', 'Laki-Laki', 'Islam', 'S1 Perencanaan Wilayah dan Kota', 'S1 Informatika', 'S1 Arsitektur', '30-Apr-03', 'azmir17091@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(50, '030101-12135201-358192', '2021 - 2022', 'Ahmad Ramadhani', 'Laki-Laki', 'Islam', 'S1 Perencanaan Wilayah dan Kota', 'S1 Teknik Sipil', 'S1 Pendidikan Matematika', '15-Dec-03', 'muhammadramadhani043@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(51, '030101-12135201-844176', '2021 - 2022', 'AHMAD GHAZALI ANSHAR', 'Laki-Laki', 'Islam', 'S1 Perencanaan Wilayah dan Kota', 'S1 Teknik Sipil', 'S1 Psikologi', '05-Dec-02', 'ahmadghazalianshar@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(52, '020401-12155201-807999', '2021 - 2022', 'Adelia Fitriani', 'Perempuan', 'Islam', 'S1 Informatika', 'S1 Teknik Sipil', 'S1 Arsitektur', '01-Dec-02', 'fitrianiadelia430@gmail.com', NULL, '2023-05-25 06:07:43', 50),
	(53, '060400-12135201-015276', '2021 - 2022', 'Dicky Dwi Syaputra', 'Laki-Laki', 'Islam', 'S1 Perencanaan Wilayah dan Kota', 'S1 Teknik Sipil', 'S1 Arsitektur', '15-Jun-04', 'dickyyyds15@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(54, '020401-12155201-868546', '2021 - 2022', 'Elisa Fitriana', 'Perempuan', 'Islam', 'S1 Informatika', 'S1 Teknik Sipil', 'S1 Perencanaan Wilayah dan Kota', '29-Dec-02', 'elizafitriana13@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(55, '020401-12155201-110562', '2021 - 2022', 'Erni', 'Perempuan', 'Islam', 'S1 Informatika', 'S1 Pendidikan Bahasa Inggris', 'S1 Pendidikan Bahasa Indonesia', '01-Jan-01', 'erni81237@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(56, '020401-12155201-954692', '2021 - 2022', 'Muhammad Ubaidillah', 'Laki-Laki', 'Islam', 'S1 Informatika', 'S1 Pendidikan Matematika', 'S1 Pendidikan Matematika', '13-Feb-03', 'muhammadubai8@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(57, '020401-12155201-971993', '2021 - 2022', 'Muhammad nur hafilludin', 'Laki-Laki', 'Islam', 'S1 Informatika', 'S1 Informatika', 'S1 Informatika', '12-Oct-02', 'muhammadnurhafilludin@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(58, '020401-12155201-022693', '2021 - 2022', 'MUHAMMAD NOVAL', 'Laki-Laki', 'Islam', 'S1 Informatika', 'S1 Psikologi', 'S1 Teknik Sipil', '31-Jul-01', 'mhmmdnoval021@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(59, '020401-12155201-723105', '2021 - 2022', 'M. Sarif', 'Laki-Laki', 'Islam', 'S1 Informatika', 'S1 Teknik Sipil', 'S1 Perencanaan Wilayah dan Kota', '05-Aug-02', 'muhammadsarif582@gmail.com', NULL, '2023-05-25 06:07:43', 19),
	(60, '020401-12155201-506608', '2021 - 2022', 'Jauhar Latifah', 'Perempuan', 'Islam', 'S1 Informatika', 'S1 Pendidikan Islam Anak Usia Dini', 'S1 Farmasi', '14-Feb-03', 'jauharlatifah2019@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(61, '020401-12155201-179405', '2021 - 2022', 'Ahmad Nawawi', 'Laki-Laki', 'Islam', 'S1 Informatika', 'S1 Informatika', 'S1 Informatika', '08-Jun-02', 'awinawawi873@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(62, '020401-12155201-587007', '2021 - 2022', 'Kayyisu Willyani', 'Laki-Laki', 'Islam', 'S1 Informatika', 'S1 Teknik Sipil', 'S1 Psikologi', '25-Nov-02', 'kayyisu123@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(63, '020501-12223201-093779', '2022 - 2023', 'Muhammad rosad', 'Laki-Laki', 'Islam', 'S1 Arsitektur', 'S1 Pendidikan Islam Anak Usia Dini', 'S1 Psikologi', '12-Mar-03', 'muhammadrosyad012@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(64, '020501-12223201-785519', '2022 - 2023', 'Abdullah', 'Laki-Laki', 'Islam', 'S1 Arsitektur', 'S1 Teknik Sipil', 'S1 Arsitektur', '30-Aug-03', 'aduldoel01@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(65, '020501-12223201-998530', '2022 - 2023', 'Alya Nurpasha', 'Perempuan', 'Islam', 'S1 Arsitektur', 'S1 Teknik Sipil', 'S1 Psikologi', '03-Sep-04', 'alyanurpasha4@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(66, '030201-12288201-467119', '2022 - 2023', 'BUNGA', 'Perempuan', 'Islam', 'S1 Pendidikan Bahasa Indonesia', 'S1 Pendidikan Bahasa Inggris', 'S1 Pendidikan Matematika', '18-Jan-04', 'bungaofficial130@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(67, '040101-12223201-112917', '2022 - 2023', 'Kamaliah', 'Perempuan', 'Islam', 'S1 Arsitektur', 'S1 Pendidikan Matematika', 'S1 Perencanaan Wilayah dan Kota', '16-Jun-04', 'meliaakuu16@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(68, '020501-12223201-188254', '2022 - 2023', 'Muhammad Ramadhani', 'Laki-Laki', 'Islam', 'S1 Arsitektur', 'S1 Teknik Sipil', 'S1 Perencanaan Wilayah dan Kota', '22-Oct-04', 'ramakizdrock@gmail.com', NULL, '2023-05-25 06:07:43', 8),
	(69, '020501-12223201-725966', '2022 - 2023', 'Yaskia Ariani', 'Perempuan', 'Islam', 'S1 Arsitektur', 'S1 Teknik Sipil', 'S1 Informatika', '14-Nov-03', 'yaskiaaa25@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(70, '020501-12223201-019764', '2022 - 2023', 'yulianti sartika dewi', 'Perempuan', 'Islam', 'S1 Arsitektur', 'S1 Arsitektur', 'S1 Arsitektur', '23-Jul-04', 'sartikayulianti908@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(71, '020501-12223201-708985', '2022 - 2023', 'Zaina Rifa Nabila', 'Perempuan', 'Islam', 'S1 Arsitektur', 'D3 Keperawatan', 'S1 Teknik Sipil', '21-Dec-03', 'nzainarifa@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(72, '020201-12255201-159774', '2022 - 2023', 'Reni Emeliya', 'Perempuan', 'Islam', 'S1 Informatika', 'S1 Informatika', 'S1 Informatika', '08-Jun-04', 'reniemeliya79@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(73, '060400-122informB-903367', '2022 - 2023', 'SAADAH', 'Perempuan', 'Islam', 'S1 Informatika Reguler B', 'S1 Teknik Sipil Reguler B', 'S1 Keperawatan B', '19-Aug-03', 'saadahmn42@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(74, '030101-12235201-535766', '2022 - 2023', 'Amisa Hasan', 'Perempuan', 'Islam', 'S1 Perencanaan Wilayah dan Kota', 'S1 Teknik Sipil', 'S1 Arsitektur', '17-Jun-04', 'icha123311@gmail.com', NULL, '2023-05-25 06:07:43', 5),
	(75, '060400-122informB-820246', '2022 - 2023', 'RUSLAN', 'Laki-Laki', 'Islam', 'S1 Informatika Reguler B', 'S1 Perbankan Syariah Reguler B', '', '10-Mar-02', 'protosalmon@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(76, '020301-12235201-222597', '2022 - 2023', 'Annisa Norliani', 'Perempuan', 'Islam', 'S1 Perencanaan Wilayah dan Kota', 'S1 Teknik Sipil', 'S1 Pendidikan Bahasa Indonesia', '29-Aug-04', 'annisanorliani11@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(77, '030101-12235201-880707', '2022 - 2023', 'M. Khairil Ramadhan', 'Laki-Laki', 'Islam', 'S1 Perencanaan Wilayah dan Kota', 'S1 Teknik Sipil', 'S1 Arsitektur', '15-Nov-03', 'khairilramadhan883@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(78, '020301-12222201-992431', '2022 - 2023', 'maya selfia', 'Perempuan', 'Islam', 'S1 Teknik Sipil', 'S1 Teknik Sipil', 'S1 Teknik Sipil', '10-Jan-04', 'mayaselfiamayaselfia@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(79, '040101-122S1PIAUD-280025', '2022 - 2023', 'Nurul jannah', 'Perempuan', 'Islam', 'S1 Pendidikan Islam Anak Usia Dini', 'S1 Psikologi', 'S1 Pendidikan Bahasa Inggris', '20-Oct-04', 'anakhumaidi@gemail.com', NULL, '2023-05-25 06:07:43', NULL),
	(80, '020101-12248201-948303', '2022 - 2023', 'SITI FATIMAH TOZZAHRA', 'Perempuan', 'Islam', 'S1 Farmasi', 'S1 Kebidanan', 'S1 Farmasi', '12-Mar-03', 'sitifatimahtozzahra@icloud.com', NULL, '2023-05-25 06:07:43', NULL),
	(81, '030101-12235201-311308', '2022 - 2023', 'Tamara Hadi Permata', 'Perempuan', 'Islam', 'S1 Perencanaan Wilayah dan Kota', 'S1 Perencanaan Wilayah dan Kota', 'S1 Perencanaan Wilayah dan Kota', '04-Jan-04', 'thadipermata@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(82, '020301-12222201-431349', '2022 - 2023', 'MUHAMMAD AL PARISI', 'Laki-Laki', 'Islam', 'S1 Teknik Sipil', 'S1 Arsitektur', 'S1 Perencanaan Wilayah & Kota Reguler B', '15-Mar-04', 'mhmmdalfarisi1515@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(83, '040201-122S1PS-644011', '2022 - 2023', 'Putri Dara Permata', 'Perempuan', 'Islam', 'S1 Perbankan Syariah', 'S1 Informatika', 'S1 Psikologi', '12-Oct-04', 'putridarapermata@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(84, '020301-12222201-559766', '2022 - 2023', 'Rafli aulia rahman', 'Laki-Laki', 'Islam', 'S1 Teknik Sipil', 'S1 Teknik Sipil', 'S1 Teknik Sipil', '24-Jun-04', 'rafliauliar@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(85, '020301-12222201-317154', '2022 - 2023', 'Daryl David Huwae', 'Laki-Laki', 'Kristen Protestan', 'S1 Teknik Sipil', 'S1 Perencanaan Wilayah dan Kota', 'S1 Psikologi', '17-Oct-02', 'daryl.d701@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(86, '020301-12222201-863729', '2022 - 2023', 'Gustina Nur Hasanah', 'Perempuan', 'Islam', 'S1 Teknik Sipil', 'S1 Arsitektur', 'D3 Keperawatan', '21-Aug-03', 'gustinanurhasanahh@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(87, '020301-12222201-048208', '2022 - 2023', 'Husnul khatimah ', 'Perempuan', 'Islam', 'S1 Teknik Sipil', 'S1 Perencanaan Wilayah dan Kota', 'S1 Perbankan Syariah', '28-Aug-04', 'hk8580091@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(88, '020301-12222201-263038', '2022 - 2023', 'Karmila', 'Perempuan', 'Islam', 'S1 Teknik Sipil', 'S1 Perencanaan Wilayah dan Kota', 'S1 Pendidikan Bahasa Indonesia', '28-Jan-04', 'dewikarmila2018@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(89, '010201-12222201-071168', '2022 - 2023', 'Laila', 'Perempuan', 'Islam', 'S1 Teknik Sipil', 'S1 Pendidikan Matematika', 'D3 Keperawatan', '27-Jul-04', '07la.laila@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(90, '020301-12222201-262168', '2022 - 2023', 'Laisa', 'Perempuan', 'Islam', 'S1 Teknik Sipil', 'S1 Arsitektur', 'D3 Kebidanan', '29-Apr-04', 'laisa.saa294@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(91, '020301-12222201-972662', '2022 - 2023', 'Risfi Tri Armanda ', 'Laki-Laki', 'Islam', 'S1 Teknik Sipil', 'S1 Teknik Sipil', 'S1 Teknik Sipil', '13-Apr-04', 'risfyarmanda@gmail.com', NULL, '2023-05-25 06:07:43', NULL),
	(92, '020301-12222201-260323', '2022 - 2023', 'Tita Audina', 'Perempuan', 'Islam', 'S1 Teknik Sipil', 'S1 Informatika', 'S1 Farmasi', '24-Oct-03', 'titaaudina55@gmail.com', NULL, '2023-05-25 06:07:43', NULL);

-- membuang struktur untuk table saw.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel saw.failed_jobs: ~0 rows (lebih kurang)

-- membuang struktur untuk table saw.hasilrekomendasis
DROP TABLE IF EXISTS `hasilrekomendasis`;
CREATE TABLE IF NOT EXISTS `hasilrekomendasis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel saw.hasilrekomendasis: ~0 rows (lebih kurang)

-- membuang struktur untuk table saw.kriteria
DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE IF NOT EXISTS `kriteria` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `mhs_id` bigint unsigned NOT NULL,
  `kode1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `c1` int NOT NULL,
  `c2` int NOT NULL,
  `c3` int NOT NULL,
  `c4` int NOT NULL,
  `c5` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('MENUNGGU','DISETUJUI','DITOLAK') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'MENUNGGU',
  `status_berkas` enum('MENUNGGU','SUDAH DIVERIFIKASI','BERKAS SALAH') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'MENUNGGU',
  `berkas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_verifikasi` timestamp NULL DEFAULT NULL,
  `hasil1` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil2` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil3` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai1` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai2` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai3` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_tolak` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berkas_akta` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berkas_kk` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berkas_ijazah` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kriteria_mhs_id_foreign` (`mhs_id`),
  CONSTRAINT `kriteria_mhs_id_foreign` FOREIGN KEY (`mhs_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel saw.kriteria: ~4 rows (lebih kurang)
REPLACE INTO `kriteria` (`id`, `mhs_id`, `kode1`, `kode2`, `kode3`, `c1`, `c2`, `c3`, `c4`, `c5`, `created_at`, `updated_at`, `status`, `status_berkas`, `berkas`, `waktu_verifikasi`, `hasil1`, `hasil2`, `hasil3`, `nilai1`, `nilai2`, `nilai3`, `ket_tolak`, `berkas_akta`, `berkas_kk`, `berkas_ijazah`) VALUES
	(8, 4, 'A4', 'A1', 'A2', 90, 85, 98, 80, 3500000, '2023-07-12 22:35:15', '2023-07-12 23:33:03', 'DISETUJUI', 'SUDAH DIVERIFIKASI', '20230713062102-berkas-24238.pdf', '2023-07-12 22:35:48', 'A1', 'A2', 'A1', '11.9', '11.9', '6.5', NULL, NULL, NULL, NULL),
	(11, 5, 'A1', 'A2', 'A4', 90, 90, 90, 90, 5000000, '2023-07-18 06:35:03', '2023-07-18 06:35:04', 'MENUNGGU', 'MENUNGGU', NULL, NULL, 'A4', 'A2', 'A1', '15', '10.2', '6.6', NULL, NULL, NULL, NULL),
	(12, 6, 'A1', 'A2', 'A3', 87, 90, 90, 90, 4000000, '2023-07-18 06:43:33', '2023-07-18 07:01:57', 'MENUNGGU', 'MENUNGGU', NULL, NULL, 'A3', 'A2', 'A1', '10.8', '10.2', '6.6', '', NULL, NULL, NULL),
	(13, 7, 'A1', 'A2', 'A3', 90, 90, 90, 90, 9000000, '2023-07-18 07:02:51', '2023-07-18 07:32:58', 'DISETUJUI', 'SUDAH DIVERIFIKASI', '20230718152107-berkas-72696.jpg', '2023-07-18 07:02:51', 'A3', 'A2', 'A1', '10.8', '10.2', '6.6', 'KUOTA SUDAH PENUH.', '20230718152107-berkas_akta-52668.jpg', '20230718152107-berkas_kk-53434.jpg', '20230718152107-berkas_ijazah-87166.jpg');

-- membuang struktur untuk table saw.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel saw.migrations: ~27 rows (lebih kurang)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(25, '2014_10_12_000000_create_users_table', 1),
	(26, '2014_10_12_100000_create_password_resets_table', 1),
	(27, '2019_08_19_000000_create_failed_jobs_table', 1),
	(28, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(29, '2022_09_19_020332_create_biodatadsns_table', 1),
	(30, '2022_09_24_143654_create_profiladmns_table', 1),
	(31, '2022_09_28_143807_create_penelitians_table', 1),
	(32, '2022_09_28_184834_create_pengabdians_table', 1),
	(33, '2022_09_29_023138_create_penunjangs_table', 1),
	(34, '2022_09_30_053919_create_penggunas_table', 1),
	(35, '2022_09_30_151152_create_pengajarans_table', 1),
	(36, '2022_10_01_091358_create_bimbinganmahasiswas_table', 1),
	(37, '2022_10_01_101810_create_pengujianmhs_table', 1),
	(38, '2022_10_01_105015_create_dataserings_table', 1),
	(39, '2022_10_02_033652_create_bahanajars_table', 1),
	(40, '2022_10_02_040244_create_orasiilmiahs_table', 1),
	(41, '2022_10_02_050730_create_tugastambahans_table', 1),
	(42, '2022_10_02_064934_create_pembimbingdosens_table', 1),
	(43, '2023_05_03_185357_create_biodatacalonmhs_table', 1),
	(44, '2023_05_04_031612_create_datacalonmhs_table', 2),
	(45, '2023_05_04_052240_create_kriterias_table', 3),
	(46, '2023_05_06_085700_create_datacrips_table', 4),
	(47, '2023_05_21_041046_create_hasilrekomendasis_table', 5),
	(49, '2023_05_22_074030_create_kriteria_table', 6),
	(51, '2023_06_25_064855_add_kode_to_saw_table', 7),
	(52, '2023_07_04_131657_create_validasi_table', 8),
	(53, '2023_07_13_010521_create_slotkuotakips_table', 9);

-- membuang struktur untuk table saw.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel saw.password_resets: ~0 rows (lebih kurang)

-- membuang struktur untuk table saw.penggunas
DROP TABLE IF EXISTS `penggunas`;
CREATE TABLE IF NOT EXISTS `penggunas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel saw.penggunas: ~0 rows (lebih kurang)

-- membuang struktur untuk table saw.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel saw.personal_access_tokens: ~0 rows (lebih kurang)

-- membuang struktur untuk table saw.saw
DROP TABLE IF EXISTS `saw`;
CREATE TABLE IF NOT EXISTS `saw` (
  `id` int NOT NULL AUTO_INCREMENT,
  `b_c1` int DEFAULT NULL,
  `b_c2` int DEFAULT NULL,
  `b_c3` int DEFAULT NULL,
  `b_c4` int DEFAULT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_c5` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel saw.saw: ~4 rows (lebih kurang)
REPLACE INTO `saw` (`id`, `b_c1`, `b_c2`, `b_c3`, `b_c4`, `kode`, `b_c5`) VALUES
	(1, 3, 2, 4, 2, 'A1', 3),
	(2, 1, 5, 4, 3, 'A2', 2),
	(3, 5, 3, 2, 4, 'A3', 4),
	(4, 5, 4, 5, 3, 'A4', 4);

-- membuang struktur untuk table saw.slotkuotakips
DROP TABLE IF EXISTS `slotkuotakips`;
CREATE TABLE IF NOT EXISTS `slotkuotakips` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `informatika` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `arsitek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sipil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel saw.slotkuotakips: ~0 rows (lebih kurang)
REPLACE INTO `slotkuotakips` (`id`, `informatika`, `arsitek`, `pwk`, `sipil`, `created_at`, `updated_at`) VALUES
	(1, '1', '1', '1', '1', '2023-07-12 18:40:10', '2023-07-12 18:40:10');

-- membuang struktur untuk table saw.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel saw.users: ~5 rows (lebih kurang)
REPLACE INTO `users` (`id`, `name`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 'Fauziah', 'admin', 'admin@gmail.com', NULL, '$2y$10$TMjFQNBoaQc2/6TaUVDj8eqM/0VVlY2/lKzPNR55.h6wYuI28FYLG', 'MX9HU8ezBvjzZsRu1AsZI7owfazSVjUT9Yqg6jrO2hoHog88W7iQw3x8bJW7', '2023-05-03 19:35:07', '2023-05-03 19:35:07'),
	(4, 'Aulia Rahim', 'user', 'auliarahim123@gmail.com', NULL, '$2y$10$GI6nMHiM7hzpa7ptJTPqT.mnefCrPI/W11htTa9gc8tSaNyBhGK3i', NULL, '2023-07-12 22:33:11', '2023-07-12 22:33:11'),
	(5, 'user1', 'user', 'user1@gmail.com', NULL, '$2y$10$zZTLBYriq13KoiFW01kkHe784YSkP/DvDzf35l2QlpUGlrdWYhMge', NULL, '2023-07-18 06:28:26', '2023-07-18 06:28:26'),
	(6, 'user2@gmail.com', 'user', 'user2@gmail.com', NULL, '$2y$10$AZJyJctgBmEQgrFyOZ/CuuuqklxChWneXS/BqC7IbdLGhul1un4hO', NULL, '2023-07-18 06:43:11', '2023-07-18 06:43:11'),
	(7, 'user4@gmail.com', 'user', 'user4@gmail.com', NULL, '$2y$10$UAfW70oBCgu0KO0CLNiGaerZF/vJVj8Z8z6Zs8y8Y/OK86/ezLAO.', NULL, '2023-07-18 07:02:23', '2023-07-18 07:02:23');

-- membuang struktur untuk table saw.validasi
DROP TABLE IF EXISTS `validasi`;
CREATE TABLE IF NOT EXISTS `validasi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_regis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel saw.validasi: ~0 rows (lebih kurang)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
