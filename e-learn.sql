--
-- Database: `e-learn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `uname` varchar(35) NOT NULL,
  `passwd` varchar(35) NOT NULL,
  `nama` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `uname`, `passwd`, `nama`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `beranda`
--

CREATE TABLE `beranda` (
  `id_beranda` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beranda`
--

INSERT INTO `beranda` (`id_beranda`, `judul`, `isi`) VALUES
(1, 'Selamat Datang di e-Learning Informatika', '<div><span class="wysiwyg-color-black">Teknologi dan informasi merupakan kesatuan yang berhubungan satu sama lain. Dengan perkembangan teknologi yang meningkat pesat baik perangkat keras atau perangkat lunak karena kebutuhan informasi dan pertukaran data dengan cepat, mudah dan juga bisa dilakukan di mana saja dan kapan saja. E-Learning merupakan suatu jenis belajar mengajar yang memungkinkan tersampaikannya bahan ajar ke siswa dengan menggunakan media Internet, Intranet atau media jaringan komputer lain. E-learning sebagai sebuah alternatif pembelajaran yang berbasis elektronik memberikan banyak manfaat terutama terhadap proses pendidikan yang dilakukan dengan jarak jauh.</span></div><div><br></div><div><span class="wysiwyg-color-green"><span class="wysiwyg-color-black">Dengan adanya aplikasi E-Learning ini, diharapkan menjadi fasilitas untuk memudahkan pengorganisasian antara mahasiswa informatika supaya dapat bertukar informasi secara efektif.<br></span><br>&nbsp;Silahkan lanjutkan untuk mendownload materi modul dan tugas<br><br><div><br></div></span></div>');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `uname` varchar(35) NOT NULL,
  `passwd` varchar(35) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `uname`, `passwd`, `nama`, `nip`, `jk`) VALUES
(1, 'ade', 'ade', 'Ade Rahmat Iskandar, S.Kom.,MT.', '195404241985031011', 'Laki-laki'),
(2, 'hendri', 'hendri', 'Hendri Karma, MT.', '19540424119031000', 'Laki-laki'),
(4, 'edi', 'edi', 'Edi Mulyana, ST.,MT.', '1238828749230921', 'Laki-laki'),
(5, 'cecep', 'cecep', 'Cecep Nurul Alam, ST.,M.T.', '19540424119421992', 'Laki-laki'),
(6, 'diansa', 'diansa', 'Dian Saadilah, S.Kom, MT.', '1029321648213092', 'Perempuan'),
(7, 'manaf', 'manaf', 'Khaerul Manaf, ST., M.Kom.', '1293821029484339', 'Laki-laki'),
(8, 'yana', 'yana', 'Yana Aditia Gerhana, ST.,M.Kom.', '12387273912039238', 'Laki-laki'),
(9, 'ichsan', 'ichsan', 'Ichsan Taufik, ST.,MT.', '1237214931821939', 'Laki-laki'),
(10, 'diannur', 'diannur', 'Dian Nuraiman, M.Si.,M.Sc.', '1238729482982103', 'Laki-laki'),
(11, 'jumadi', 'jumadi', 'Jumadi, ST.,M.Cs.', '123874973923882', 'Laki-laki'),
(12, 'undang', 'undang', 'Undang Syarifudin, SH.,M.Kom.', '1239192872103999', 'Laki-laki'),
(13, 'acep', 'acep', 'Acep Ahman Hidayat, ST.', '1239582130923832', 'Laki-laki'),
(14, 'rifqi', 'rifqi', 'Rifqi Syamsul Fuadi, ST.', '1231928375939412', 'Laki-laki'),
(15, 'lukman', 'lukman', 'Nur Lukman, ST.,M.Kom', '1238848512930232', 'Laki-laki'),
(16, 'esa', 'esa', 'Esa Firmansyah, ST, M.Kom.', '123891958829302', 'Laki-laki'),
(19, 'wisnu', 'wisnu', 'Wisnu Uriawan, ST.,M.Kom.', '1293872184213232', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kd_kelas` varchar(5) NOT NULL,
  `nm_kelas` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kd_kelas`, `nm_kelas`) VALUES
(1, 'IFA', 'A'),
(2, 'IFB', 'B'),
(3, 'IFC', 'C'),
(4, 'IFD', 'D'),
(5, 'IFE', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `uname` varchar(35) NOT NULL,
  `passwd` varchar(35) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `uname`, `passwd`, `nama`, `nis`, `jk`, `alamat`, `telp`, `email`, `id_kelas`) VALUES
(1, 'ridloal', '1234', 'Muhammad Ridlo Alimudin', '1147050095', 'Laki-laki', 'Jalan Padasuka', '089656487199', 'ridlo.alimudin@gmail.com', 3),
(3, 'ivan', 'septa', 'Ivan Septamihardja', '1147050089', 'Laki-laki', 'Jalan Margahayu', '08923782323', 'ivan@gmail.com', 3),
(4, 'ghali', 'ghali', 'Ghali', '1147050065', 'Laki-laki', 'Jalan Cipadung', '08926371262', 'ghali@gmail.com', 2),
(5, 'acil', '4c1l', 'Acil', '1147050030', 'Laki-laki', 'Jalan Ujung Berung', '082381239822', 'acil@gmail.com', 1),
(6, 'siti', 'siti', 'Siti', '1147050140', 'Perempuan', 'Jalan Manisi', '089232173611', 'siti@yahoo.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `kd_mapel` varchar(8) NOT NULL,
  `nm_mapel` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `kd_mapel`, `nm_mapel`, `id_kelas`, `id_dosen`) VALUES
(9, 'IF8401', 'Basis Data', 3, 5),
(10, 'IF8401L', 'Praktikum Basis Data', 3, 13),
(11, 'IF8402', 'Pemrograman Berorientasi Objek', 3, 1),
(12, 'IF8402L', 'Praktikum Pemrograman Berorientasi ', 3, 14),
(13, 'IF8403', 'Organisasi & Arsitektur Komputer', 3, 8),
(14, 'IF8404', 'Rekayasa Perangkat Lunak', 3, 19),
(15, 'IF8404L', 'Praktikum Rekayasa Perangkat Lunak', 3, 15),
(16, 'IF8405', 'Teori Bahasa Dan Otomata', 3, 12),
(17, 'IF8406', 'Strategi Algoritma', 3, 10),
(18, 'IF8407', 'Grafika Komputer', 3, 16),
(19, 'IF8401', 'Basis Data', 1, 11),
(20, 'IF8401', 'Basis Data', 2, 11),
(21, 'IF8401', 'Basis Data', 4, 4),
(22, 'IF8404', 'Rekayasa Perangkat Lunak', 1, 7),
(23, 'IF8405', 'Teori Bahasa Dan Otomata', 1, 4),
(25, 'IF8406', 'Strategi Algoritma', 1, 11),
(26, 'IF8404', 'Rekayasa Perangkat Lunak', 4, 19);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vmapel`
--
CREATE TABLE `vmapel` (
`id_mapel` int(11)
,`kd_mapel` varchar(8)
,`nm_mapel` varchar(35)
,`id_kelas` int(11)
,`id_dosen` int(11)
,`nama` varchar(35)
,`nm_kelas` varchar(35)
);

-- --------------------------------------------------------

--
-- Structure for view `vmapel`
--
DROP TABLE IF EXISTS `vmapel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vmapel`  AS  select `m`.`id_mapel` AS `id_mapel`,`m`.`kd_mapel` AS `kd_mapel`,`m`.`nm_mapel` AS `nm_mapel`,`m`.`id_kelas` AS `id_kelas`,`m`.`id_dosen` AS `id_dosen`,`g`.`nama` AS `nama`,`k`.`nm_kelas` AS `nm_kelas` from ((`mapel` `m` join `dosen` `g`) join `kelas` `k`) where ((`m`.`id_dosen` = `g`.`id_dosen`) and (`m`.`id_kelas` = `k`.`id_kelas`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `beranda`
--
ALTER TABLE `beranda`
  ADD PRIMARY KEY (`id_beranda`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_guru` (`id_dosen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `beranda`
--
ALTER TABLE `beranda`
  MODIFY `id_beranda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mapel_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
