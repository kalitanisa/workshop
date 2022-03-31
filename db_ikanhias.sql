-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 10:03 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ikanhias`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(7) NOT NULL,
  `usename` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `usename`, `password`) VALUES
(1, 'admin', 'admin45');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(256) NOT NULL,
  `isi_artikel` text NOT NULL,
  `id_cat_artikel` int(7) NOT NULL,
  `user_artikel` int(7) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `isi_artikel`, `id_cat_artikel`, `user_artikel`, `timestamp`) VALUES
(1, 'Ikan Cupang petarung siam', 'Ikan Cupang (Betta sp.) adalah ikan air tawar yang habitat asalnya adalah beberapa negara di Asia Tenggara, antara lain Indonesia, Thailand, Malaysia, dan Vietnam. Ikan ini mempunyai bentuk dan karakter yang unik dan cenderung agresif dalam mempertahankan wilayahnya. Di kalangan penggemar, ikan cupang umumnya terbagi atas tiga golongan, yaitu cupang hias, cupang aduan, dan cupang liar. Di Indonesia terdapat cupang asli,salah satunya adalah Betta channoides yang ditemukan di Pampang, Kalimantan Timur.', 1, 0, '2022-01-19 11:00:27'),
(2, 'Ikan glofish', 'Glofish adalah hasil transformasi genetik pada Ikan zebra (Danio rerio) yang awalnya memiliki garis emas dan biru gelap. ... Dengan masukknya gen green fluorescent protein, ikan zebra akan berpendar hijau jika ada polutan air.', 1, 0, '2022-01-19 11:00:27'),
(3, 'ikan mas koki', 'Ikan mas koki adalah salah satu jenis ikan air tawar populer di Indonesia. Ikan cantik ini awal mulanya dibudidayakan oleh masyarakat Tiongkok sekitar tahun 960 hingga 1729. Bentuk ikan mas koki nyaris serupa dengan ikan mas karena kedua jenis ikan ini berasal dari satu keluarga yang sama.', 1, 0, '2022-01-29 13:23:40'),
(4, 'ikan lou han', 'ikan Lou han merupakan salah satu ikan hias termahal di dunia yang dipelihara di dalam akuarium karena warna sisik mereka yang hidup serta benjolan kepala mereka yang berbentuk khas berjuluk \"benjol kelam\". Aslinya mereka hanya berhabitat di Indonesia dan Malaysia.', 1, 0, '2022-01-29 13:30:36'),
(5, 'ikan Gupi', 'Gupi, ikan seribu, ikan cere, atau suwadakar, adalah salah satu spesies ikan hias air tawar yang paling populer di dunia. Karena mudahnya menyesuaikan diri dan beranak-pinak, di banyak tempat di Indonesia ikan ini telah menjadi ikan liar yang memenuhi parit-parit dan selokan.', 1, 0, '2022-01-29 13:36:51'),
(6, 'ikan Discus', 'Symphysodon, bahasa sehari-hari dikenal sebagai discus, adalah genus cichlids asli lembah sungai Amazon di Amerika Selatan. Karena bentuk, perilaku, dan warna serta polanya yang khas, discus populer sebagai ikan akuarium air tawar, dan budidayanya di beberapa negara di Asia merupakan industri besar.', 1, 0, '2022-01-29 13:36:51'),
(7, 'ikan neon tetra', 'Neon tetra adalah ikan air tawar dari keluarga characin ordo Characiformes. Jenis spesies dari genusnya, berasal dari aliran air hitam dan air jernih di lembah Amazon Amerika Selatan.', 0, 0, '2022-01-29 13:39:22'),
(8, 'ikan Kuhlia loach', 'Ikan air tawar yang satu ini cukup popular di kalangan pecinta aquascape. Ia memiliki banyak sekali julukan mulai dari Coolie Loach, Prickley Eye, botia, hingga belut macan tutul. Ikan ini cenderung berada di bottom tank, dan suka sekali bersembunyi di sela sela batu,kayu, dan tanaman.', 1, 0, '2022-01-29 13:39:22'),
(9, 'ikan koi jepang', 'ikan koi dinamakan Nishikigoi, kurang lebih bermakna ikan berwarna-warni. Di negeri sakura itu, ikan koi menjadi semacam simbol cinta dan persahabatan. Konon, ikan ini berasal dari Persia, lalu dibawa ke Jepang lewat Cina dan Korea. Mengalami perkembangan dengan pesat kurang lebih sekitar 160 tahun lalu.', 1, 0, '2022-01-29 13:54:27'),
(10, 'ikan Platinum arowana ', 'Arwana platinum adalah ikan arwana tercantik, dan bahkan menjadi ikan dengan harga termahal di dunia yang pernah ada. Harganya bisa mencapai 5,7 M. Platinum arowana memiliki warna tubuh yang begitu memukau dan terlihat mengilap seperti platinum, sesuai dengan namanya', 1, 0, '2022-01-29 13:54:27'),
(11, 'ikan Badut', 'Ikan giru atau lebih dikenal dengan sebutan ikan badut adalah ikan dari anak suku Amphiprioninae dalam suku Pomacentridae. Ada dua puluh delapan spesies yang biasa dikenali, salah satunya adalah genus Premnas, sementara sisanya termasuk dalam genus Amphiprion.', 1, 0, '2022-01-29 14:02:36'),
(12, 'ikan Achilles tang', 'Acanthurus achilles adalah ikan laut tropis dengan nama umum Achilles tang dan Achilles surgeonfish. Mereka adalah surgeonfish menengah mencapai maksimum 25 cm di masa dewasa. Acanthurus Achilles berwarna hitam dengan mencolok oranye dan lapisan putih sepanjang sirip ikan dan ekor. Ketika ikan menjadi matang, bentuk penurunan orange menonjol berkembang pada daerah ekor, mengakhiri menjadi duri yang tajam.', 1, 0, '2022-01-29 14:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(8) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `isi_komentar` text NOT NULL,
  `id_artikel` int(8) NOT NULL,
  `komentar_oleh` int(8) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `nama`, `isi_komentar`, `id_artikel`, `komentar_oleh`, `timestamp`) VALUES
(11, 'Miftah ', 'Ikannya lucu kek saya     ', 1, 0, '2022-01-29 02:01:53'),
(12, 'Karung', 'jelek     ', 1, 0, '2022-01-29 02:07:30'),
(13, 'Miftah', 'ikannya jelek kek lu     ', 2, 0, '2022-01-29 02:18:54'),
(14, 'cahyani', '     zawfffffffffffffff', 1, 0, '2022-01-29 05:43:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
