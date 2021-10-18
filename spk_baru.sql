-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2021 at 04:51 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `user_admin` varchar(30) NOT NULL,
  `password_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `user_admin`, `password_admin`) VALUES
(1, 'Admin', 'admin', 'admin'),
(2, 'Kepala Sekolah', 'kepsek', 'kepsek');

-- --------------------------------------------------------

--
-- Table structure for table `guru_peserta`
--

CREATE TABLE `guru_peserta` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `c1` double NOT NULL DEFAULT '1',
  `c2` double NOT NULL DEFAULT '1',
  `c3` double NOT NULL DEFAULT '1',
  `c4` double NOT NULL DEFAULT '1',
  `vektor_s` double NOT NULL,
  `vektor_v` double NOT NULL,
  `tanggal` varchar(250) NOT NULL,
  `total` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru_peserta`
--

INSERT INTO `guru_peserta` (`id_guru`, `nip`, `nama`, `alamat`, `pendidikan`, `jabatan`, `c1`, `c2`, `c3`, `c4`, `vektor_s`, `vektor_v`, `tanggal`, `total`) VALUES
(2, '  197608022001002', 'Koslov Vasili Ivanovich', 'Russian', 'S1', 'Guru', 22, 22, 22, 22, 22, 0.039812566937986, '2020', 'Kurang'),
(3, ' 196901271992003', 'Alex V. \"Ajax\" Johnson', 'American', 'S1', 'Guru', 80, 80, 68.5, 79.5, 74.027022093287, 0.13396389874131, '2020', 'Kurang'),
(4, '   197306151999004', 'Bagramyan Konstantin', 'Russian', 'S1', 'Guru', 0, 0, 0, 0, 0, 0, '2020', 'Sangat Kurang'),
(5, ' 196003131983001', 'Jizzy B.', 'San Fierro', 'S2', 'Guru', 0, 0, 0, 0, 0, 0, '2020', 'Sangat Kurang'),
(6, ' 197910182002005', 'Jimmy Hernandez', 'Los Santos Police Department', 'S1', 'Guru', 55, 55, 88, 88, 69.570108523704, 0.12589839102195, '2020', 'Kurang'),
(7, ' 196705122003006 ', 'Michael Toreno', 'San Fierro', 'S3', 'Konselor Sekolah', 0, 0, 0, 0, 0, 0, '2021', 'Sangat Kurang'),
(8, ' 198006302002007', 'Lance Wilson', 'Grove Street', 'S2', 'Guru', 0, 0, 0, 0, 0, 0, '2021', 'Sangat Kurang'),
(9, ' 197011092003008', 'Sean Johnson', 'Grove Street', 'S1', 'Guru', 0, 0, 0, 0, 0, 0, '2021', 'Sangat Kurang'),
(10, ' 196808012005009', 'Melvin Harris', 'Grove Street', 'S1', 'Guru', 170, 150, 120, 100, 136.99220717347, 0.24790960991255, '2022', 'Cukup'),
(11, ' 198010242005010', 'Salvatore Leone', 'Liberty City', 'S1', 'Guru', 0, 0, 0, 0, 0, 0, '2022', 'Sangat Kurang'),
(12, ' 198205192005011', 'Mark Wayne \"D\"', 'Los Santos', 'S1', 'Pustakawan', 0, 0, 0, 0, 0, 0, '2022', 'Sangat Kurang'),
(13, ' 198112252005012', 'Old Reece', 'Los Santos', 'S3', 'Guru', 0, 0, 0, 0, 0, 0, '2022', 'Sangat Kurang'),
(14, '197812162004013', 'Big Poppa', 'Los Santos', 'S2', 'Tata Usaha', 0, 0, 0, 0, 0, 0, '2023', 'Sangat Kurang'),
(15, ' 197602222008014', 'Brian Johnson', ' Grove Street', 'S1', 'Guru', 250, 250, 250, 250, 250, 0.4524155333862, '2023', 'Sangat Baik'),
(16, '   198877824874287', 'Ralph Pendelbury', 'Las Venturas Police Department', 'S3', 'Tata Usaha', 0, 0, 0, 0, 0, 0, '2023', 'Sangat Kurang'),
(17, '      198877850509090', 'Jimmy Silverman', ' Blastin Fools', 'S2', 'Kepala Sekolah', 0, 0, 0, 0, 0, 0, '', 'Sangat Kurang');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `q1` double NOT NULL,
  `q2` double NOT NULL,
  `q3` double NOT NULL,
  `q4` double NOT NULL,
  `avg` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id_siswa`, `nis`, `id_guru`, `q1`, `q2`, `q3`, `q4`, `avg`) VALUES
(1, 'supra', 6, 55, 55, 88, 88, 71.5),
(2, 'supra', 10, 170, 150, 120, 100, 135),
(3, 'supra', 2, 22, 22, 22, 22, 22),
(4, 'supra', 15, 250, 250, 250, 250, 250);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(10) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `kelas` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`, `alamat`, `kelas`) VALUES
(3, '1', 'Supreme', 'Supreme Street', '8');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hmp_kriteria`
--

CREATE TABLE `tb_hmp_kriteria` (
  `id_hmp` int(11) NOT NULL,
  `himpunan` varchar(70) NOT NULL,
  `keterangan` varchar(40) NOT NULL,
  `nilai` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hmp_kriteria`
--

INSERT INTO `tb_hmp_kriteria` (`id_hmp`, `himpunan`, `keterangan`, `nilai`, `nama_kriteria`) VALUES
(1, '55-65', 'kurang', 1, 'pedagogik'),
(3, '76-85', 'baik', 3, 'pedagogik'),
(4, '86-100', 'sangat baik', 4, 'pedagogik'),
(5, '55-65', 'kurang', 1, 'kepribadian'),
(7, '76-85', 'baik', 3, 'kepribadian'),
(8, '86-100', 'sangat baik', 4, 'kepribadian'),
(9, '55-65', 'kurang', 1, 'sosial'),
(11, '76-85', 'baik', 3, 'sosial'),
(12, '86-100', 'sangat baik', 4, 'sosial');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`) VALUES
(1, 'Pedagogik', 1),
(2, 'Kepribadian', 2),
(3, 'Sosial', 3),
(10, 'Profesional', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaturan`
--

CREATE TABLE `tb_pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `pengaturan` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengaturan`
--

INSERT INTO `tb_pengaturan` (`id_pengaturan`, `pengaturan`, `status`) VALUES
(1, 'pendaftaran', 1),
(2, 'penilaian', 1),
(3, 'pengumuman', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `q1` varchar(250) NOT NULL,
  `q2` varchar(250) NOT NULL,
  `q3` varchar(250) NOT NULL,
  `q4` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_soal`
--

INSERT INTO `tb_soal` (`id_soal`, `q1`, `q2`, `q3`, `q4`, `status`) VALUES
(29, 'ASEAN didirikan di Bangkok, Thailand, pada tanggal 8 Agustus 1967 atas prakarsa 5 (lima) orang Menteri Luar Negeri dari 5 8 negara. Siapakah Menteri Luar Negeri Indonesia yang menjadi pemrakarsa berdirinya ASEAN?d', 'Novel berjudul Di Bawah Lindungan Kaâ€™bah merupakan karya sastra yang mendapat perhatian luas dan menjadi buku teks sastra di Malaysia dan juga Singapura. Novel tersebut ditulis oleh HAMKA, seorang ulama besar, sastrawan ternama Indonesia sekaligus ', 'Kontingen Indonesia mendapatkan medali pertama, yaitu medali perak, pada Olimpiaede ke-24 tahun 1988 yang dilangsungkan di Seoul, Korea Selatan. Medali tersebut didapatkan oleh atlit-atlit beregu Indonesia dari cabang olah raga', 'Albert Einstein Medal (Medali Albert Einstein) adalah adalah medali yang dianugerahkan oleh Yayasan Albert Einstein (Albert Einstein Society) kepada para ahli yang telah memberikan kontribusi istimewa berkaitan dengan bidang ', '0'),
(30, 'Menguasai teori belajar dan prinsip-prinsip pembelajaran yang mendidik\r\n', 'Menyelenggarakan pembelajaraan yang mendidik\r\n', 'Memanfaatkan teknologi informasi dan komunikasi untuk kepentingan pembelajaraan\r\n', 'Berkomunikasi secara efektif, empatik, dan santun dengan peserta didik\r\n', '0'),
(31, ' A Brief History of Time adalah judul novel ringan yang menjadi bestseller di Sunday Times, London, selama 237 minggu berturut-turut. Penulisnya adalah ahli fisika teoritis ternama dunia yang dilahirkan di Oxford, Inggris, pada tanggal 8 Januari 1942', 'Pada pasal berapakah dari Undang- Undang Dasar 1945 yang menyatakan: Presiden memegang kekuasaan yang tertinggi atas Angkatan Darat, Angkatan Laut dan Angkatan Udara?\r\n', 'Salah satu negara yang menjadi anggota organisasi G8 (Group of Eight â€“ Kelompok Delapan) adalah â€¦.\r\n', 'Benda langit yang terdiri dari atom-atom besar debu dan gas beku dan bergerak mengelilingi matahari dengan orbit berbentuk sangat eksentris disebut â€¦.\r\n', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `jenis`, `username`, `password`, `nama`) VALUES
(1, 'siswa', 'suryo', '001456', 'suryo'),
(3, 'siswa', 'julio', '001447', 'julio'),
(4, 'siswa', 'kiki', '001278', 'kiki'),
(5, 'siswa', 'yusuf', '003456', 'yusuf'),
(6, 'siswa', 'ilham', '002317', 'ilham'),
(7, 'siswa', 'rizka', '006783', 'rizka'),
(8, 'siswa', 'bagus', '002310', 'bagus'),
(9, 'siswa', 'rizal', '008782', 'rizal'),
(10, 'siswa', 'rudi', '006598', 'rudi'),
(28, 'siswa', 'supri', '005151', 'supri'),
(29, 'guru', 'guru10', 'guru10', 'guru10'),
(30, 'guru', 'jarjit', 'jarjit', 'jarjit'),
(31, 'siswa', 'supra', '123', 'supryr'),
(32, 'siswa', 'test', '123', 'teste'),
(33, '', 'teste', '111', '123'),
(36, 'siswa', 'supra', '111', 'supray');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru_peserta`
--
ALTER TABLE `guru_peserta`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_hmp_kriteria`
--
ALTER TABLE `tb_hmp_kriteria`
  ADD PRIMARY KEY (`id_hmp`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guru_peserta`
--
ALTER TABLE `guru_peserta`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_hmp_kriteria`
--
ALTER TABLE `tb_hmp_kriteria`
  MODIFY `id_hmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
