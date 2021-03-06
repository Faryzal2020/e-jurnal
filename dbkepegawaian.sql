--
-- Database: `dbkepegawaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajuan_aktivitas`
--

CREATE TABLE `ajuan_aktivitas` (
  `id_ajuan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_aktivitas` varchar(2000) NOT NULL,
  `durasi` int(11) NOT NULL,
  `nip_pengaju` varchar(12) NOT NULL,
  `tanggal_ajuan` date NOT NULL,
  `status_ajuan` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id_aktivitas` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_aktivitas` varchar(2000) NOT NULL,
  `durasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`id_aktivitas`, `id_kategori`, `nama_aktivitas`, `durasi`) VALUES
(1, 2, 'melaksanakan monitoring kegiatan', 120),
(2, 2, 'melaksanakan survey', 120),
(3, 2, 'melaksanakan tugas fasilitator', 180),
(4, 2, 'melakukan koordinasi dengan pusat', 30),
(5, 2, 'melakukan koordinasi melalui media elektronik', 15),
(6, 2, 'melakukan pendampingan sidak', 120),
(7, 2, 'memasukkan data ke software kepegawaian', 20),
(8, 2, 'membawakan acara(per kegiatan)', 60),
(9, 2, 'memberi penjelasan terkait permasalahan (konseling) per permasalahan', 120),
(10, 2, 'membuat administrasi kepegawaian', 30),
(11, 2, 'membuat berita acara', 60),
(12, 2, 'membuat jadwal kegiatan', 60),
(13, 2, 'membuat konsep keputusan kasetwapres', 20),
(14, 2, 'membuat konsep surat dinas/nota dinas', 180),
(15, 2, 'membuat konsep surat edaran karo', 180),
(16, 2, 'membuat konsep keputusan/penetapan', 15),
(17, 2, 'membuat konsep surat perintah', 15),
(18, 2, 'membuat konsep surat tugas', 240),
(19, 2, 'membuat konsep surat undangan', 90),
(20, 2, 'membuat konsep telaahan staf', 180),
(21, 2, 'membuat sambutan/pidato pejabat', 20),
(22, 2, 'membuat sop', 60),
(23, 2, 'membuat surat teguran', 240),
(24, 2, 'memimpin rapat teknis', 5),
(25, 2, 'mengawasi ujian (per kegiatan)', 120),
(26, 2, 'mengemudi kendaraan operasional dalam kota (per tujuan)', 90),
(27, 2, 'menghadiri acara ceremonial', 30),
(28, 2, 'mengidentifikasi dan memferivikasi data', 45),
(29, 2, 'mengikuti pendidikan dan pelatihan (per jam pelajaran)', 180),
(30, 2, 'mengikuti rapat teknis', 30),
(31, 2, 'mengirim surat/dokumen', 30),
(32, 2, 'mengumpulkan dta-data kepegawaian terkait dengan kenaikan pangkat(per pegawai)', 90),
(33, 2, 'menjadi moderator(1x acara/event)', 30),
(34, 2, 'menyiapkan rapat/diklat (per 1 kegiatan)', 15),
(35, 2, 'verifikasi surat/dokumen/data dan kelengkapannya (per 1 berkas)', 15),
(36, 2, 'mencatat perkembangan kegiatan dan permasalahan data yang terjadi', 25),
(37, 2, 'menerima dan meneliti kebenaran data berdasarkan bahan yang masuk', 25),
(38, 3, 'mengumpulkan data-data kepegawaian terkait dengan kenaikan pangkat( per pegawai)', 30),
(39, 3, 'verifikasi surat/dokumen/data dan kelengkapannya per 1 berkas)', 15),
(40, 3, 'mengikuti pendidikan dan pelatihan (per jam pelajaran)', 45),
(41, 3, 'melakukan koordinasi dengan kemensetneg', 120),
(42, 3, 'melakukan koordinasi dengan unit kerja dan satuan organisasi', 30),
(43, 3, 'memasukkan data ke software kepegawaian (per 10 nama peagwai)', 20),
(44, 3, 'memberi penjelasan terkait permasalahan (konseling) per permasalahan', 120),
(45, 3, 'membuat administrasi kepegawian', 30),
(46, 3, 'mengikuti rapat teknis', 120),
(47, 3, 'membuat jadwal kegiatan', 60),
(48, 3, 'membuat keputusan kasetwapres', 30),
(49, 3, 'membuat administrasi kepegawaian', 30),
(50, 3, 'membuat jadwal kegiatan', 60),
(51, 3, 'membuat berita acara', 60),
(52, 4, 'menerima tamu dan mencatat keperluannya ', 5),
(53, 4, 'melakukan kegiatan surat menyurat ', 15),
(54, 4, 'melakukan pengelolaan peralatan suatu objek kerja ', 25),
(55, 4, 'mencatat jadwal kegiatan pimpinan ', 10),
(56, 1, 'melaksanakan audit internal (per sop)', 120),
(57, 1, 'melaksanakan monitoring kegiatan ', 120),
(58, 1, 'melaksanakan tugas sebagai fasilitator (1x acara)', 180),
(59, 1, 'melakukan evaluasi hasil pelaksanaan kegiatan ', 360),
(60, 1, 'melakukan koordinasi dengan skpd ', 30),
(61, 1, 'melakukan koordinasi melalui media elektronik ', 15),
(62, 1, 'melakukan pendampingan sidak (per lokasi sidak)', 120),
(63, 1, 'melakukan verifikasi konsep keputusan ', 30),
(64, 1, 'memberi paparan ', 120),
(65, 1, 'memberi penjelasan terkait permasalahan (konseling) per permasalahan ', 120),
(66, 1, 'membuat konsep kronologis kasus ', 180),
(67, 1, 'membuat konsep lakip kota (asumsi bahan lengkap)', 2100),
(68, 1, 'membuat konsep lakip skpd (asumsi bahan lengkap)', 1260),
(69, 1, 'membuat konsep rab/oe ', 120),
(70, 1, 'membuat konsep rencana kerja (renja)', 1260),
(71, 1, 'membuat konsep rencana strategik (renstra)', 1260),
(72, 1, 'membuat konsep surat dinas/nota dinas ', 30),
(73, 1, 'membuat konsep surat edaran sekda ', 180),
(74, 1, 'membuat konsep surat keputusan/penetapan ', 60),
(75, 1, 'membuat konsep telaahan staf ', 240),
(76, 1, 'membuat konsep terkait permasalahan hukum ', 240),
(77, 1, 'membuat konsep tor atau kak ', 360),
(78, 1, 'membuat sambutan/pidato pejabat ', 90),
(79, 1, 'membuat silabi (per kegiatan/event)', 120),
(80, 1, 'membuat sop ', 180),
(81, 1, 'membuat surat teguran ', 20),
(82, 1, 'membuat/menyiapkan bahan paparan', 120),
(83, 1, 'menerima kunjungan kerja (1x kunjungan)', 60),
(84, 1, 'menghadiri acara ceremonial ', 120),
(85, 1, 'menghadiri/mendampingi persidangan ', 120),
(86, 1, 'mengikuti pendidikan dan pelatihan  (per jam pelajaran)', 45),
(87, 1, 'mengikuti rapat koordinasi ', 60),
(88, 1, 'mengikuti rapat teknis ', 180),
(89, 1, 'menjadi moderator (1x acara/event)', 90),
(90, 1, 'menjadi saksi (per 1x panggilan)', 120),
(91, 1, 'menyelenggarakan even kegiatan ', 60),
(92, 1, 'menyiapkan rapat/diklat (per 1 kegiatan)', 30),
(93, 1, 'menyusun perencanaan anggaran (per kegiatan)', 120),
(94, 3, 'menyusun rka dan dpa ', 120),
(95, 3, 'menyusun perencanaan kebutuhan pegawai ', 60),
(96, 2, 'upacara bendera ', 45),
(97, 1, 'mengikuti kegiatan rapat kerja nasional/rembug nasional ', 360),
(98, 1, 'melaksanakan pemeriksaan kasus (berita acara pemeriksaan atas kasus tertentu)', 150),
(99, 1, 'mengikuti kegiatan sosialisasi tingkat nasional/provinsi/kota', 360),
(100, 1, 'melakukan kunjungan kerja ', 240),
(101, 1, 'melakukan pemeriksaan kasus disiplin pegawai ', 60),
(102, 3, 'mengelola administrasi kepegawaian ', 30),
(103, 3, 'mengkoordinir penyusunan standard prosedur pelayanan kesehatan olahraga dan kebugaran pegawai dan ru', 120),
(104, 1, 'memimpin rapat teknis ', 180),
(105, 3, 'mengetik surat ', 5),
(106, 1, 'merevisi rencana kerja dan anggaran per kegiatan ', 120),
(107, 1, 'melakukan usulan komponen per kode rekening kegiatan', 20),
(108, 3, 'menerima berkas / surat / dokumen administrasi', 15),
(109, 3, 'menandatangani surat / dokumen/ berkas', 5),
(110, 1, 'melakukan tugas kedinasanlain sesuai perintah pimpinan baik lisan maupun tertulis', 120),
(111, 3, 'menyusun sasaran kerja pegawai (skp) skpd/ukpd', 60),
(112, 1, 'melaporkan hasil temuan pemeriksaan pertanggung jawaban kepada atasan untuk memperoleh tindak lanjut', 15),
(113, 3, 'melakukan kegiatan pelayanan (menerima, memverifikasi, dan mencatat berkas/surat/dokumen dan atau me', 15),
(114, 1, 'melaksanakan pengawasan absensi peserta pelatihan', 120),
(115, 1, 'melaksanakan pengawasan ujian peserta pelatihan', 60),
(116, 1, 'mengkoordinir pendataan peserta pelatihan perwilayah', 120),
(117, 1, 'pemberian sertifikat peserta pelatihan', 15),
(118, 1, 'mengkoordinir kegiatan pelatihan', 120),
(119, 4, 'mempelajari objek kerja sesuai dengan prosedur dan ketentuan', 30),
(120, 4, 'menerima/memeriksa objek kerja sesuai prosedur dan ketentuan', 30),
(121, 1, 'membuat laporan realisasi keuangan', 125),
(122, 3, 'pengarsipan surat pertanggungjawaban', 5),
(123, 3, 'mengkonsultasikan dan mengevaluasi proses penataan objek kerja sesuai dengan prosedur dan ketentuan ', 30),
(124, 4, 'melaporkan pelaksanaan kegiatan kepada atasan langsung dan hasil bahan evaluasi pertanggungjawaban', 15),
(125, 1, 'melaksanakan tugas kedinasan lain yang diperintahkan oleh pimpinan baik tertulis maupun lisan', 90),
(126, 3, 'membuat kegiatan administrasi', 125),
(127, 1, 'merevisi usulan rencana kerja dan anggaran sesuai hasil koordinasi', 90),
(128, 3, 'menerima surat masuk, meminta tanda tangan ka. upt memberi lembar disposisi 3 surat', 20),
(129, 1, 'mengikuti rapim gubernur', 240),
(130, 2, 'menjadi petugas upacara/apel', 60),
(131, 3, 'menerima telepon masuk dan telepon keluar', 5),
(132, 3, 'membuat daftar urut kepangkatan', 60),
(133, 2, 'penggandaan berkas/dokumen', 10),
(134, 1, 'melaksanakan supervisi managerial', 100),
(135, 1, 'input keterangan absensi pegawai melalui media elektronik', 60),
(136, 1, 'membuat rekapitulasi absensi pegawai per hari', 30),
(137, 1, 'membuat rekapitulasi absensi per bulan', 30),
(138, 1, 'membuat rancangan keputusan gubernur', 300),
(139, 1, 'melaksanakan kegiatan monitoring', 150),
(140, 3, 'melaporkan dan mempertanggungjawabkan pelaksanaan tugas', 30),
(141, 1, 'melaksanakan kegiatan evaluasi', 240),
(142, 3, 'mendokumentasikan dokumen penting', 10),
(143, 1, 'menyusun usulan rencana kerja', 60),
(144, 1, 'mempelajari peraturan', 60),
(145, 1, 'menyusun analisa jabatan', 120),
(146, 1, 'mengumpulkan bahan kerja', 30),
(147, 1, 'menyusun analisa beban kerja', 75),
(148, 1, 'menyusun evaluasi jabatan/kelas jabatan', 120),
(149, 1, 'menyusun formasi jabatan/skpd jft', 120),
(150, 1, 'menyusun formasi jabatan fungsional umum (jfu)', 120),
(151, 1, 'menyusundata jabatan skpd/ukpd', 90),
(152, 1, 'menyusun/membuat peta jabatan', 90),
(153, 1, 'melakukan validasi/verifikasi nama jabatan skpd/ukpd', 90),
(154, 1, 'melakukan validasi/verifikasi analis jabatan/analisa beban kerja/evaluasi jabatan skpd/ukpd', 90),
(155, 1, 'melakukan validasi/verifikasi formasi jabatan skpd/ukpd', 120),
(156, 1, 'melakukan validasi/verifikasi formasi jabatan fungsional tertentu skpd/ukpd', 120),
(157, 3, 'melakukan validasi/verifikasi  peta jabatan skpd/ukpd', 30),
(158, 3, 'menyusun/menyiapkan bahan paparan pimpinan', 60),
(159, 1, 'meneliti dan memeriksa objek kerja', 30),
(160, 1, 'melakukan pendampingan penyusunan analisa jabatan/ analisa beban kerja dan evaluasi jabatan', 120),
(161, 3, 'membuat laporan kegiatan', 120),
(162, 3, 'membuat pointer rapat', 20),
(163, 1, 'melaporkan hasil kegiatan', 10),
(164, 3, 'mengolah data jabatan', 90),
(165, 1, 'melakukan inventarisasi data nama jabatan/analisa jabatan/analisa beban kerja/evaluasi jabatan', 60),
(166, 3, 'melakukan inventarisasi data nama jabatan/analisa jabatan/analisa beban kerja/evaluasi jabatan', 60),
(167, 3, 'melakukan inventarisasi data formasi jabatan', 60),
(168, 1, 'menyusun kamus jabatan', 120),
(169, 3, 'mengumpulkan bahan penyusunan kamus jabatan', 60),
(170, 1, 'menyusun konsep rincian anggaran bagian', 90),
(171, 1, 'melakukan pembinaan/penilaian pegawai', 15),
(172, 1, 'membagi tugas kepada bawahan', 60),
(173, 1, 'memberi arahan', 30),
(174, 1, 'memeriksa/meneliti hasil kegiatan/kerja', 45),
(175, 1, 'melaksanakan evaluasi hasil kegiatan', 120),
(176, 1, 'verifikasi/validasi kegiatan', 30),
(177, 1, 'menyiapkan rapat/daftar hadir/snack', 30),
(178, 4, 'menggandakan bahan kerja', 60),
(179, 3, 'memproses pengurusan hak, kesejahteraan, penghargaan dan cuti pegawai sekretariat kota', 30),
(180, 3, 'membuat jadwal pelatihan', 15),
(181, 3, 'penomoran naskah dinas', 5),
(182, 3, 'menginput arsip penggandaan', 5),
(183, 3, 'menggandakan dan memberikan cap stempel naskah dinas', 5),
(184, 1, 'melaksanakan bimbingan teknis', 120),
(185, 1, 'mengikuti bimbingan teknis', 300),
(186, 4, 'melakukan pelayanan pimpinan', 60),
(187, 2, 'mempersiapkan acara seremonial', 60),
(188, 1, 'menerima konsultasi terkait peraturan', 60),
(189, 1, 'pengarahan/penugasan pimpinan', 60),
(190, 1, 'mempelajari laporan masyarakat', 30),
(191, 2, 'membuat konsep surat edaran gubernur', 60),
(192, 2, 'membuat konsep surat edaran gubernur', 60),
(193, 3, 'mengikuti rapat teknis', 120),
(194, 3, 'mengikuti rapat teknis', 120),
(195, 1, 'mengikuti rapim gubernur', 240),
(196, 1, 'mengikuti seminar/lokakarya', 75),
(197, 1, 'melakukan koordinasi internal dengan unit/bidang/sub bagian', 30),
(198, 1, 'rapat koordinasi', 180),
(199, 3, 'menerima kunjungan kerja', 120),
(200, 1, 'melakukan validasi/verifikasi kelas jabatan', 120),
(201, 1, 'melakukan validasi/verifikasi formasi/nama jabatan', 120),
(202, 2, 'melaksanakan kegiatan apel', 30),
(203, 1, 'analisis pasar barang/jasa', 270),
(204, 1, 'peran serta dalam seminar/lokakarya/konferensi di bidang pengadaan barang/jasa (menjadi peserta)', 360),
(205, 1, 'melaksanakan monitoring, supervisi dan evaluasi teknis pelaksanaan kegiatan', 60),
(206, 3, 'menyusun laporan realisasi anggaran', 30),
(207, 3, 'penyelesaian dokumen pertanggungjawaban belanja (spj)', 60),
(208, 3, 'setor sisa uang kegiatan', 60),
(209, 3, 'mengambil dokumen/surat', 120),
(210, 3, 'mengantar dokumen/surat', 120),
(211, 3, 'setor uang sisa kegiatan', 60),
(212, 3, 'menyusun laporan realisasi anggaran', 30),
(213, 1, 'berkoordinasi dan menyelesaikan tl lhp bpk', 360),
(214, 1, 'evaluasi dokumen penawaran pengadaan jasa lainnya', 120),
(215, 1, 'input keterangan absensi pegawai melalui media elektronik', 60),
(216, 1, 'melaksanakan bimbingan teknis', 120),
(217, 1, 'melaksanakan evaluasi hasil kegiatan', 120),
(218, 1, 'melaksanakan kegiatan evaluasi', 240),
(219, 1, 'melaksanakan kegiatan monitoring', 150),
(220, 1, 'melaksanakan konsultasi individu', 60),
(221, 1, 'melaksanakan lomba-lomba tingkat kementerian, tingkat unit kerja', 120),
(222, 2, 'melaksanakan monitoring kegiatan', 120),
(223, 1, 'melaksanakan monitoring, supervisi, dan evaluasi teknis pelaksanaan kegiatan', 60),
(224, 1, 'melaksanakan pelatihan per kegiatan', 45),
(225, 1, 'melaksanakan pemeliharaan peralatan teknis dan peralatan kantor', 60),
(226, 1, 'melaksanakan pemeriksaan kasus (berita acara pemeriksaan atas kasus tertentu)', 150),
(227, 2, 'melaksanakan pemusnahan dokumen/barang (per dokumen/barang)', 60),
(228, 1, 'melaksanakan pemusnahan dokumen/barang (per dokumen/barang)', 60),
(229, 1, 'melaksanakan pengawasan absensi peserta pelatihan', 120),
(230, 1, 'melaksanakan penilaian kinerja guru', 360),
(231, 1, 'melaksanakan penyidikan (per hari per kasus)', 120),
(232, 1, 'melaksakan reviu', 360),
(233, 1, 'melaksanakan sosialisasi aplikasi (per lokasi)', 60),
(234, 2, 'melaksanakan sosialisasi aplikasi (per lokasi)', 60),
(235, 4, 'melaksanakan survey (per lokasi)', 60),
(236, 2, 'melaksanakan survey (per lokasi)', 120),
(237, 1, 'melaksanakan tugas kedinasan lain yang diperintahkan oleh pimpinan baik tertulis maupun lisan', 90),
(238, 1, 'melaksanakan tugas sebagai fasilitator (1xacara)', 180),
(239, 1, 'melakukan evaluasi hasil pelaksanaan kegiatan', 360),
(240, 3, 'melakukan inventarisasi data formasi jabatan', 60),
(241, 3, 'melakukan inventarisasi data nama jabatan/analisa jabatan/analisa beban kerja/evaluasi jabatan', 60),
(242, 1, 'melakukan inventarisasi data nama jabatan/analisa jabatan/analisa beban kerja/evaluasi jabatan', 60),
(243, 4, 'melakukan kegiatan 3 (menerima surat, fax, telepon, dan mengirim surat dan fax)', 15),
(244, 4, 'melakukan kegiatan pelayanan (menerima, memverifikasi, dan mencatat berkas/surat/dokumen dan atau me', 15),
(245, 4, 'melakukan kegiatan surat menyurat', 15),
(246, 1, 'melakukan koordinasi dengan pihak ketiga dalam rangka pemeliharaan/perawatan sarana/prasarana', 15),
(247, 2, 'melakukan koordinasi dengan pihak ketiga dalam rangka pemeliharaan/perawatan sarana/prasarana', 15),
(248, 3, 'melakukan koordinasi dengan pusat/provinsi', 120),
(249, 2, 'melakukan koordinasi dengan pusat/provinsi', 120),
(250, 4, 'melakukan koordinasi dengan skpd', 30),
(251, 2, 'melakukan koordinasi dengan skpd', 30),
(252, 3, 'melakukan koordinasi dengan skpd', 30),
(253, 1, 'melakukan koordinasi dengan skpd', 30),
(254, 1, 'melakukan koordinasi internal dengan unit/bidang/sub bagian', 30),
(255, 3, 'melakukan koordinasi melalui media elektronik', 15),
(256, 1, 'melakukan kunjungan kerja', 240),
(257, 4, 'melakukan pelayanan pimpinan', 60),
(258, 1, 'melakukan pembinaan/penilaian pegawai', 15),
(259, 1, 'melakukan pemeriksaan kasus disiplin pegawai', 60),
(260, 1, 'melakukan perampingan penyusunan analisa jabatan, analisa beban kerja, dan evaluasi jabatan', 120),
(261, 2, 'melakukan pendampingan sidak (per lokasi sidak)', 120),
(262, 1, 'melakukan pendampingan sidak (per lokasi sidak)', 120),
(263, 3, 'melakukan penjilidan dan pendistribusian laporan keuangan', 0),
(264, 1, 'melakukan tugas kedinasan lain sesuai perintah pimpinan baik lisan maupun tertulis ', 120),
(265, 1, 'melakukan validasi/verifikasi formasi jabatan fungsional tertentu unit kerja', 120),
(266, 1, 'melakukan validasi/verifikasi formasi jabatan unit kerja', 120),
(267, 1, 'melakukan validasi/verifikasi formasi/nama jabatan', 120),
(268, 1, 'melakukan validasi/verifikasi kelas jabatan', 120),
(269, 1, 'melakukan validasi/verifikasi nama jabatan unit kerja', 90),
(270, 1, 'melakukan validasi/verifikasi peta jabatan', 30),
(271, 3, 'melaporkan dan mempertanggungjawabkan pelaksanaan tugas', 30),
(272, 1, 'melakukan verifikasi konsep keputusan ', 30),
(273, 1, 'melaporkan hasil kegiatan', 10),
(274, 4, 'melaporkan pelaksanaan kegiatan kepada atasan langsung dan hasil sebagai bahan evaluasi pertanggungj', 15),
(275, 3, 'memasukkan data ke software data lainnya (per jenis data)', 2),
(276, 3, 'memasukkan hasil data ujian peserta pelatihan', 180),
(277, 2, 'memasukkan data ke software kepegawaian (per nama 10 pegawai)', 20),
(278, 1, 'membagi tugas kepada bawahan', 60),
(279, 2, 'membawakan acara (per kegiatan)', 60),
(280, 1, 'memberi arahan', 30),
(281, 1, 'memberikan pengarahan teknis', 30),
(282, 3, 'memberi lembar pengantar pada surat', 5),
(283, 1, 'memberi paparan', 120),
(284, 3, 'memberi penjelasan terkait permasalahan (konseling) per permasalahan', 120),
(285, 2, 'memberi penjelasan terkait permasalahan (konseling) per permasalahan', 120),
(286, 1, 'memberi penjelasan terkait permasalahan (konseling) per permasalahan', 120),
(287, 3, 'membuat 3 kepegawaian', 30),
(288, 3, 'membuat 3 peralatan kantor', 30),
(289, 3, 'membuat daftar urut kepangkatan', 60),
(290, 1, 'membuat dan melaporkan spt setiap bulan kepada kantor pelayanan pajak', 60),
(291, 3, 'membuat jadwal kegiatan', 60),
(292, 3, 'membuat jadwal pelatihan', 15),
(293, 3, 'membuat kegiatan 3', 125),
(294, 3, 'membuat konsep dokumen kontrak/spk', 180),
(295, 3, 'membuat konsep keputusan gubernur kenaikan gaji berkala/pangkat/pensiun/pns/cpns/mutasi', 20),
(296, 2, 'membuat konsep keputusan gubernur kenaikan gaji berkala/pangkat/pensiun/pns/cpns/mutasi', 20),
(297, 1, 'membuat konsep lakip unit kerja (asumsi bahan lengkap)', 2100),
(298, 1, 'membuat konsep lakip unit kerja (asumsi bahan lengkap)', 1260),
(299, 1, 'membuat konsep rab/oe', 120),
(300, 1, 'membuat konsep rencana kerja (renja)', 1260),
(301, 1, 'membuat konsep rencana strategik', 1260),
(302, 4, 'membuat konsep surat dinas/nota dinas', 30),
(303, 2, 'membuat konsep surat dinas/nota dinas', 180),
(304, 2, 'membuat konsep surat edaran ', 60),
(305, 1, 'membuat konsep surat keputusan/penetapan', 60),
(306, 2, 'membuat konsep surat keputusan/penetapan', 15),
(307, 3, 'membuat konsep surat perintah', 15),
(308, 3, 'membuat konsep surat tugas', 15),
(309, 3, 'membuat konsep surat undangan', 180),
(310, 2, 'membuat konsep surat undangan', 90),
(311, 2, 'membuat konsep telaahan staf', 180),
(312, 1, 'membuat konsep telaahan staf', 240),
(313, 1, 'membuat konsep terkait permasalahan hukum', 240),
(314, 1, 'membuat konsep tor atau kak', 360),
(315, 1, 'membuat laporan dalam rangka pemeriksaan', 120),
(316, 3, 'membuat laporan kegiatan', 120),
(317, 1, 'membuat laporan realisasi keuangan', 125),
(318, 1, 'membuat/menyiapkan bahan paparan', 120),
(319, 3, 'membuat notulen rapat', 30),
(320, 3, 'membuat pointer rapat', 120),
(321, 1, 'membuat rekapitulasi absensi pegawai per bulan', 30),
(322, 1, 'membuat rekapitulasi absensi pegawai per hari', 30),
(323, 3, 'membuat rekapitulasi penyerapan kegiatan', 15),
(324, 1, 'membuat sambutan/pidato pejabat', 15),
(325, 2, 'membuat sambutan/pidato pejabat', 20),
(326, 3, 'membuat sop', 20),
(327, 1, 'membuat sop', 180),
(328, 3, 'membuat surat perintah pencairan (spp)', 30),
(329, 2, 'membuat surat teguran', 240),
(330, 3, 'membuat transkrip nilai peserta pelatihan per kegiatan', 240),
(331, 4, 'memelihara arsip/dokumen kuno (per 1 dus dokumen arsip)', 5),
(332, 3, 'memelihara arsip/dokumen kuno (per 1 dus dokumen arsip)', 60),
(333, 1, 'memeriksa/meneliti hasil kegiatan/kerja', 45),
(334, 2, 'memimpin rapat teknis', 5),
(335, 1, 'memimpin rapat teknis', 180),
(336, 1, 'memonitor dan menyiapkan bahan evaluasi pelaksanaan anggaran', 360),
(337, 1, 'mempelajari peraturan', 60),
(338, 1, 'mempelajari peraturan', 60),
(339, 2, 'mempersiapkan acara seremonial', 60),
(340, 3, 'memproses pengurusan hak, kesejahteraan, penghargaan dan cuti pegawai sekretariat wakil presiden', 30),
(341, 1, 'memverivikasi penetapan angka kredit jabatan fungsional tertentu', 15),
(342, 4, 'menandatangani surat/dokumen/berkas', 5),
(343, 4, 'mencatat jadwal kegiatan pimpinan', 10),
(344, 3, 'mendesain sertifikat, spanduk dan piagam', 60),
(345, 3, 'mendokumentasikan dokumen penting', 10),
(346, 3, 'mendokumentasikan surat', 5),
(347, 1, 'meneliti bast', 60),
(348, 3, 'menerima berkas/surat/dokumen 3', 15),
(349, 2, 'menerima dan meneliti kebenaran data berdasarkan bahan yang masuk', 25),
(350, 1, 'menerima konsultasi terkait peraturan', 60),
(351, 3, 'menerima kunjungan kerja', 120),
(352, 4, 'menerima tamu dan mencatat keperluannya', 5),
(353, 3, 'menerima surat masuk, meminta tanda tangan ka. upt memberi lembar disposisi 3 surat', 20),
(354, 3, 'menerima telephone masuk dan telephone keluar', 5),
(355, 3, 'mengambil dokumen/surat', 120),
(356, 3, 'mengantar dokumen/surat', 120),
(357, 1, 'mengawasi ujian (per kegiatan)', 240),
(358, 2, 'mengawasi ujian (per kegiatan)', 120),
(359, 3, 'mengelola 3 kepegawaian', 30),
(360, 3, 'mengelola surat (per 10 surat)', 30),
(361, 3, 'mengelola surat (per 10 surat)', 120),
(362, 2, 'mengelompokkan surat atau dokumen menurut jenis dan sifatnya', 10),
(363, 3, 'mengelompokkan surat atau dokumen menurut jenis dan sifatnya', 10),
(364, 3, 'mengetik surat', 5),
(365, 4, 'menggandakan bahan kerja', 60),
(366, 3, 'menggandakan dan memberikan cap stempel naskah dinas', 5),
(367, 4, 'menghadiri acara ceremonial', 120),
(368, 1, 'menghadiri acara ceremonial', 120),
(369, 1, 'menghadirkan saksi-saksi dan bukti-bukti untuk persidangan di pengadilan', 300),
(370, 2, 'mengidentifikasi dan memverifikasi data', 45),
(371, 3, 'mengidentifikasi dan memverifikasi data', 90),
(372, 3, 'mengidentifikasi dan memverifikasi data', 30),
(373, 1, 'mengikuti bimbingan teknis', 300),
(374, 1, 'mengikuti bimbingan teknis penatausahaan keuangan', 360),
(375, 1, 'mengikuti kegiatan rapat kerja nasional/rembug nasional', 360),
(376, 1, 'mengikuti kegiatan sosialisasi tingkat nasional/provinsi/kota', 360),
(377, 2, 'mengikuti pendidikan dan pelatihan (per jam pelajaran)', 180),
(378, 4, 'mengikuti pendidikan dan pelatihan (per jam pelajaran)', 45),
(379, 4, 'mengikuti pendidikan dan pelatihan (per jam pelajaran)', 45),
(380, 1, 'mengikuti pendidikan dan pelatihan (per jam pelajaran)', 45),
(381, 3, 'mengikuti pendidikan dan pelatihan (per jam pelajaran)', 45),
(382, 3, 'mengikuti pendidikan dan pelatihan (per jam pelajaran)', 60),
(383, 2, 'mengikuti pendidikan dan pelatihan (per jam pelajaran)', 45),
(384, 3, 'mengikuti rapat koordinasi', 180),
(385, 1, 'mengikuti rapat koordinasi', 60),
(386, 4, 'mengikuti rapat koordinasi', 60),
(387, 3, 'mengikuti rapat teknis', 120),
(388, 3, 'mengikuti rapat teknis', 120),
(389, 1, 'mengikuti rapat teknis', 180),
(390, 3, 'mengikuti rapat teknis', 120),
(391, 3, 'mengikuti rapat teknis', 120),
(392, 2, 'mengikuti rapat teknis', 30),
(393, 1, 'mengikuti rapim deputi', 240),
(394, 1, 'mengikuti rapim deputi', 240),
(395, 3, 'menginput arsip penggandaan', 5),
(396, 2, 'mengirim surat/dokumen', 30),
(397, 3, 'mengirim surat/dokumen', 30),
(398, 4, 'mengirim surat/dokumen', 15),
(399, 4, 'mengkaji dan menelaah bahan dan data obyek kerja', 15),
(400, 3, 'mengkonsultasikan dan mengevaluasi proses penataan obyek kerja sesuai dengan prosedur dan ketentuan ', 30),
(401, 4, 'mengkonsultasikan kendala proses penataan obyek kerja', 10),
(402, 1, 'mengkoordinir kegiatan pelatihan', 120),
(403, 3, 'mengkoordinir penyusunan standard prosedur pelayanan kesehatan olagraga dan kebugaran pegawai dan ru', 120),
(404, 3, 'mengkoordinir pendataan peserta pelatihan per wilayah', 120),
(405, 2, 'mengolah dan menyajikan data', 120),
(406, 3, 'mengolah data jabatan', 90),
(407, 1, 'mengumpulkan bahan kerja', 30),
(408, 3, 'mengumpulkan bahan penyusunan kamus jabatan', 60),
(409, 3, 'mengumpulkan data-data kepegawaian terkait kenaikan pangkat (per pegawai)', 30),
(410, 3, 'mengumpulkan data-data kepegawaian terkait kenaikan pangkat (per pegawai)', 30),
(411, 2, 'mengumpulkan data-data kepegawaian terkait kenaikan pangkat (per pegawai)', 90),
(412, 2, 'menjadi moderator (1x acara/event)', 30),
(413, 1, 'menjadi moderator (1x acara/event)', 90),
(414, 2, 'menjadi petugas upacara/ apel', 60),
(415, 1, 'menjadi saksi (per 1x panggilan)', 120),
(416, 1, 'menyelenggarakan even kegiatan', 60),
(417, 4, 'menyiapkan alat dan sarana kelengkapan yang diperlukan', 10),
(418, 3, 'menyiapkan bahan untuk kegiatan monitoring keuangan bulanan', 25),
(419, 1, 'menyiapkan rapat/daftar hadir/snack', 30),
(420, 2, 'menyiapkan rapat/diklat (per 1 kegiatan)', 15),
(421, 1, 'menyiapkan rapat/diklat (per 1 kegiatan)', 30),
(422, 4, 'menyiapkan rapat/diklat (per 1 kegiatan)', 15),
(423, 4, 'menyiapkan rapat/diklat (per 1 kegiatan)', 30),
(425, 3, 'menyususn agenda surat ', 15),
(426, 1, ' menyusun analisa beban kerja', 75),
(427, 1, 'menyususn analisa jabatan', 120),
(428, 1, 'menyiapkan laporan pertanggungjawaban bulanan dan melaporkannya ke bidang akuntansi', 60),
(429, 1, 'menyusun evaluasi jabatan/ kelas jabatan', 120),
(430, 1, 'menyusun formasi jabatan/skpd jft', 120),
(431, 1, 'menyusun formasi jabatan fungsional umum (jfu)', 120),
(432, 1, 'menyusun kamus jabatan', 120),
(434, 1, 'menyusun konsep rincian anggaran bagian', 90),
(435, 1, 'menyusun/membuat peta jabatan', 90),
(436, 3, 'menyusun/menyiapkan bahan paparan pimpinan', 60),
(437, 1, 'menyusun perencanaan anggaran (per kegiatan)', 120),
(438, 3, 'menyususn perencanaan kebutuhan pegawai', 60),
(439, 1, 'menyusun usulan rencana kerja', 60),
(440, 5, 'cuti besar', 0),
(441, 5, 'cuti bersalin (anak ke-4 dst)', 0),
(442, 5, 'cuti bersalin', 0),
(443, 5, 'cuti luar tang. Neg.', 0),
(444, 5, 'cuti keguguran kandungan', 0),
(445, 5, 'cuti alasan penting', 0),
(446, 5, 'cuti penting khusus', 0),
(447, 5, 'cuti sakit', 0),
(448, 5, 'cuti sakit pasca rawat inap', 0),
(449, 5, 'cuti tahunan', 0),
(451, 2, 'lepas piket', 60),
(452, 5, 'masa peralihan jabatan', 0),
(453, 5, 'masa persiapan pensiun', 0),
(454, 5, 'perjalanan dinas', 0),
(455, 5, 'sakit dirawat', 0),
(456, 5, 'tugas belajar DN', 0),
(457, 5, 'tugas belajar LN', 0),
(458, 5, 'test', 0),
(459, 2, 'Mengelola Sumber Daya Manusia', 100);

-- --------------------------------------------------------

--
-- Table structure for table `hari_libur`
--

CREATE TABLE `hari_libur` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history_jabatan`
--

CREATE TABLE `history_jabatan` (
  `id_history` int(11) NOT NULL,
  `nip` varchar(12) NOT NULL,
  `jabatan_lama` varchar(200) NOT NULL,
  `tanggal_pindah` date NOT NULL,
  `jabatan_baru` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(1000) NOT NULL,
  `eselon` int(11) NOT NULL,
  `atasan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `eselon`, `atasan`) VALUES
(1, 'Kepala Biro Protokol', 2, 9001),
(2, 'Kepala Biro Perencanaan dan Keuangan', 2, 9001),
(3, 'Kepala Biro Tata Usaha, Teknologi Informasi dan Kepegawaian', 2, 9001),
(4, 'Kepala Biro Umum', 2, 9001),
(5, 'Kepala Bagian Acara dan Persidangan', 3, 1),
(6, 'Kepala Bagian Notulen dan Penerbitan', 3, 1),
(7, 'Kepala Bagian Perjalanan', 3, 1),
(8, 'Kepala Bagian Rumah Tangga', 3, 1),
(9, 'Kepala Subbagian Acara', 4, 5),
(10, 'Kepala Subbagian Pelayanan Protokol', 4, 5),
(11, 'Kepala Subbagian Persidangan', 4, 5),
(12, 'Kepala Subbagian Notulen', 4, 6),
(13, 'Kepala Subbagian Penerbitan Media Massa', 4, 6),
(14, 'Kepala Subbagian Perjalanan Dinas', 4, 7),
(15, 'Kepala Subbagian Sarana dan Prasarana Perjalanan', 4, 7),
(16, 'Kepala Subbagian Administrasi Perjalanan', 4, 7),
(17, 'Kepala Subbagian Istana Wakil Presiden', 4, 8),
(18, 'Kepala Subbagian Kediaman Wakil Presiden', 4, 8),
(19, 'Kepala Subbagian Jamuan dan Pelayanan Rapat', 4, 8),
(20, 'Pranata Acara Kepresidenan', 5, 9),
(21, 'Petugas Protokol Kepresidenan', 5, 9),
(22, 'Petugas Protokol', 5, 9),
(23, 'Pranata Acara Kepresidenan', 5, 10),
(24, 'Petugas Protokol Kepresidenan', 5, 10),
(25, 'Petugas Protokol', 5, 10),
(26, 'Pengelola Naskah', 5, 11),
(27, 'Analis Rencana Program dan Kegiatan', 5, 11),
(28, 'Sekretaris', 5, 11),
(29, 'Pengadministrasi Umum', 5, 11),
(30, 'Pengelola Naskah', 5, 12),
(31, 'Pengelola Data', 5, 12),
(32, 'Pengelola Naskah', 5, 13),
(33, 'Pengelola Data', 5, 13),
(34, 'Analis Rencana Program dan Kegiatan', 5, 14),
(35, 'Pengolah Data', 5, 14),
(36, 'Pengadministrasi Umum', 5, 14),
(37, 'Analis Pengelola BMN', 5, 15),
(38, 'Analis Rencana Program dan Kegiatan', 5, 15),
(39, 'Pengolah Data', 5, 15),
(40, 'Pengadministrasi Umum', 5, 15),
(41, 'Analis Rencana Program dan Kegiatan', 5, 16),
(42, 'Pengolah Data', 5, 16),
(43, 'Pengadministrasi Umum', 5, 16),
(44, 'Analis Rencana Program dan Kegiatan', 5, 17),
(45, 'Pranata Dekorasi', 5, 17),
(46, 'Pengadministrasi Umum', 5, 17),
(47, 'Pramusaji Kepresidenan', 5, 17),
(48, 'Analis Rencana Program dan Kegiatan', 5, 18),
(49, 'Pranata Jamuan', 5, 18),
(50, 'Pengadministrasi Umum', 5, 18),
(51, 'Pramusaji Kepresidenan', 5, 18),
(52, 'Analis Rencana Program dan Kegiatan', 5, 19),
(53, 'Pranata Jamuan', 5, 19),
(54, 'Pengadministrasi Umum', 5, 19),
(55, 'Pemeliharaan Peralatan', 5, 19),
(56, 'Jabatan Fungsional Tertentu Penerjemah', 3, 1),
(57, 'Kepala Bagian Perencanaan dan Evaluasi', 3, 2),
(58, 'Kepala Bagian Perbendaharaan', 3, 2),
(59, 'Kepala Bagian Akutansi', 3, 2),
(60, 'Kepala Bagian Manajemen Kinerja', 3, 2),
(61, 'Kepala Subbagian Perencanaan', 4, 57),
(62, 'Kepala Subbagian Pemantauan dan Evaluasi', 4, 57),
(63, 'Kepala Subbagian Verifikasi', 4, 58),
(64, 'Kepala Subbagian Kas dan Pembayaran', 4, 58),
(65, 'Kepala Subbagian Pengelolaan Dana Operasional dan Bantuan Wakil Presiden', 4, 58),
(66, 'Kepala Subbagian Akutansi Keuangan', 4, 59),
(67, 'Kepala Subbagian Barang Milik Negara', 4, 59),
(68, 'Kepala Subbagian Perencanaan dan Perjanjian Kinerja', 4, 60),
(69, 'Kepala Subbagian Evaluasi dan Pelaporan Kinerja', 4, 60),
(70, 'Analis Program / Perencanaan', 5, 61),
(71, 'Pengolah Data', 5, 61),
(72, 'Pengadministrasi Umum', 5, 61),
(73, 'Analis Program/Perencanaan', 5, 62),
(74, 'Pengolah Data', 5, 62),
(75, 'Pengadministrasi Umum', 5, 62),
(76, 'Analis Keuangan', 5, 63),
(77, 'Verifikator Keuangan', 5, 63),
(78, 'Sekretaris', 5, 63),
(79, 'Analis Data dan Informasi', 5, 64),
(80, 'Analis Keuangan', 5, 64),
(81, 'Pengolah Data', 5, 64),
(82, 'Pengadministrasi Umum', 5, 64),
(83, 'Analis Keuangan', 5, 65),
(84, 'Pengolah Data', 5, 65),
(85, 'Pengadministrasi Umum', 5, 65),
(86, 'Analis Pelaporan', 5, 66),
(87, 'Analis Rencana Program dan Kegiatan', 5, 66),
(88, 'Pengolah Data', 5, 66),
(89, 'Pengadministrasi Umum', 5, 66),
(90, 'Analis Pengelola BMN', 5, 67),
(91, 'Pengolah Data', 5, 67),
(92, 'Pengadministrasi Umum', 5, 67),
(93, 'Analis Kinerja', 5, 68),
(94, 'Pengolah Data', 5, 68),
(95, 'Pengadministrasi Umum', 5, 68),
(96, 'Analis Kinerja', 5, 69),
(97, 'Pengolah Data', 5, 69),
(98, 'Pengadministrasi Umum', 5, 69),
(99, 'Bendahara', 3, 2),
(100, 'Kepala Bagian Tata Usaha', 3, 3),
(101, 'Kepala Bagian Kepegawaian', 3, 3),
(102, 'Kepala Bagian Teknologi Informasi', 3, 3),
(103, 'Kepala Bagian Kesehatan', 3, 3),
(104, 'Kepala Subbagian Administrasi Persuratan', 4, 100),
(105, 'Kepala Subbagian Arsip dan Reproduksi', 4, 100),
(106, 'Kepala Subbagian TU Kepala Sekretariat Wakil Presiden', 4, 100),
(107, 'Kepala Subbagian TU Deputi Bidang Dukjak Ekonomi Infrastruktur dan Kemaritiman', 4, 100),
(108, 'Kepala Subbagian TU Deputi Bidang Dukjak Pembangunan Manusia dan Pemerataan Pembangunan', 4, 100),
(109, 'Kepala Subbagian TU Deputi Bidang Dukjak Pemerintahan', 4, 100),
(110, 'Kepala Subbagian TU Deputi Bidang Administrasi', 4, 100),
(111, 'Kepala Subbagian Tata Usaha Kepegawaian', 4, 101),
(112, 'Kepala Subbagian Pengembangan Kompetensi Pegawai', 4, 101),
(113, 'Kepala Subbagian Pembinaan dan Kesejahteraan Pegawai', 4, 101),
(114, 'Kepala Subbagian Infrastruktur Teknologi Informasi', 4, 102),
(115, 'Kepala Subbagian Sistem Informasi', 4, 102),
(116, 'Kepala Subbagian Tata Usaha Pelayanan Kesehatan', 4, 103),
(117, 'Pengelola Naskah', 5, 104),
(118, 'Pengolah Data', 5, 104),
(119, 'Pengadministrasi Umum', 5, 104),
(120, 'Pengadministrasi Persuratan', 5, 104),
(121, 'Pengelola Naskah', 5, 105),
(122, 'Pengolah Data', 5, 105),
(123, 'Pengadministrasi Umum', 5, 105),
(124, 'Pengelola Naskah', 5, 106),
(125, 'Sekretaris', 5, 106),
(126, 'Pengadministrasi Umum', 5, 106),
(127, 'Pengelola Naskah', 5, 107),
(128, 'Sekretaris', 5, 107),
(129, 'Pengadministrasi Umum', 5, 107),
(130, 'Pengelola Naskah', 5, 108),
(131, 'Sekretaris', 5, 108),
(132, 'Pengadministrasi Umum', 5, 108),
(133, 'Pengelola Naskah', 5, 109),
(134, 'Sekretaris', 5, 109),
(135, 'Pengadministrasi Umum', 5, 109),
(136, 'Pengelola Naskah', 5, 110),
(137, 'Sekretaris', 5, 110),
(138, 'Pengadministrasi Umum', 5, 110),
(139, 'Analis SDM Aparatur', 5, 111),
(140, 'Analis Kinerja', 5, 111),
(141, 'Pengelola Naskah', 5, 111),
(142, 'Sekretaris', 5, 111),
(143, 'Pengadministrasi Umum', 5, 111),
(144, 'Pengadministrasi Persuratan', 5, 111),
(145, 'Analis SDM Aparatur', 5, 112),
(146, 'Analis Jabatan', 5, 112),
(147, 'Pengolah Data', 5, 112),
(148, 'Analis SDM Aparatur', 5, 113),
(149, 'Pengolah Data', 5, 113),
(150, 'Pengadministrasi Umum', 5, 113),
(151, 'Analis Sistem Jaringan', 5, 114),
(152, 'Pengolah Data', 5, 114),
(153, 'Pengadministrasi Umum', 5, 114),
(154, 'Analis Sistem Informasi', 5, 115),
(155, 'Pengolah Data', 5, 115),
(156, 'Analis Rencana Program dan Kegiatan', 5, 116),
(157, 'Pengolah Data', 5, 116),
(158, 'Pengadministrasi Persuratan', 5, 116),
(159, 'Jabatan Fungsional Tertentu Arsiparis Penyelia', 3, 3),
(160, 'Pranata Komputer', 3, 3),
(161, 'Pranata Komputer Pertama', 3, 3),
(162, 'Analis Kepegawaian', 3, 3),
(163, 'Dokter Gigi', 3, 3),
(164, 'Dokter Umum', 3, 3),
(165, 'Perawat Pelaksana', 3, 3),
(166, 'Perawat Gigi Penyelia', 3, 3),
(167, 'Kepala Bagian Perlengkapan', 3, 4),
(168, 'Kepala Bagian Bangunan', 3, 4),
(169, 'Kepala Bagian Kendaraan dan Ketertiban Keamanan Dalam', 3, 4),
(170, 'Kepala Bagian Pengelolaan Perpustakaan', 3, 4),
(171, 'Kepala Subbagian Perencanaan dan Pengadaan Perlengkapan', 4, 167),
(172, 'Kepala Subbagian Perawatan dan Pemeliharaan Perlengkapan', 4, 167),
(173, 'Kepala Subbagian Penataan dan Pemeliharaan Lingkungan', 4, 167),
(174, 'Kepala Subbagian Perencanaan Bangunan', 4, 168),
(175, 'Kepala Subbagian Perawatan, Pemeliharaan Bangunan, dan Penataan Lingkungan', 4, 168),
(176, 'Kepala Subbagian Administrasi Kendaraan', 4, 169),
(177, 'Kepala Subbagian Operasional Kendaraan', 4, 169),
(178, 'Kepala Subbagian Ketertiban Keamanan Dalam', 4, 169),
(179, 'Kepala Subbagian Administrasi dan Pengembangan Perpustakaan', 4, 170),
(180, 'Kepala Subbagian Penyajian Bahan Pustaka', 4, 170),
(181, 'Analis Rencana Program dan Kegiatan', 5, 171),
(182, 'Pengolah Data', 5, 171),
(183, 'Sekretaris', 5, 171),
(184, 'Analis Barang dan Jasa', 5, 172),
(185, 'Pengolah Data', 5, 172),
(186, 'Pengadministrasi Umum', 5, 172),
(187, 'Analis Rencana Program dan Kegiatan', 5, 173),
(188, 'Pengolah Data', 5, 173),
(189, 'Pengadministrasi Umum', 5, 173),
(190, 'Analis Pengelola BMN', 5, 174),
(191, 'Pengolah Data', 5, 174),
(192, 'Pemeriksa Bangunan', 5, 174),
(193, 'Pengadministrasi Umum', 5, 174),
(194, 'Analis Bangunan Gedung', 5, 175),
(195, 'Pengawas Bangunan', 5, 175),
(196, 'Pemeriksa Bangunan', 5, 175),
(197, 'Teknisi Bangunan', 5, 175),
(198, 'Pengadministrasi Umum', 5, 175),
(199, 'Analis Barang dan Jasa', 5, 176),
(200, 'Teknisi Kendaraan', 5, 176),
(201, 'Pengadministrasi Umum', 5, 176),
(202, 'Analis Rencana Program dan Kegiatan', 5, 177),
(203, 'Pengadministrasi Umum', 5, 177),
(204, 'Pengemudi Kendaraan', 5, 177),
(205, 'Pengemudi VIP', 5, 177),
(206, 'Analis Rencana Program dan Kegiatan', 5, 178),
(207, 'Pengadministrasi Umum', 5, 178),
(208, 'Petugas Keamanan', 5, 178),
(209, 'Analis Data dan Informasi', 5, 179),
(210, 'Pengolah Bahan Pustaka', 5, 179),
(211, 'Pengadministrasi Umum', 5, 179),
(212, 'Analis Data dan Informasi', 5, 180),
(213, 'Pengolah Bahan Pustaka', 5, 180),
(214, 'Jabatan Fungsional Tertentu Pustakawan', 3, 4),
(9000, 'Admin', 0, 0),
(9001, 'Deputi Bidang Administrasi', 1, 9000),
(9002, 'Deputi Bidang Dukungan Kebijakan Pemerintahan', 1, 9000),
(9003, 'Deputi Bidang Dukungan Kebijakan Pembangunan Manusia dan Pemerataan Pembangunan', 1, 9000),
(9004, 'Deputi Bidang Dukungan Kebijakan Ekonomi, Infrastruktur, dan Kemaritiman', 1, 9000),
(9005, 'test', 2, 9002);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `id_aktivitas` int(11) NOT NULL,
  `nip` varchar(12) NOT NULL,
  `volume` int(11) NOT NULL,
  `jenis_output` varchar(500) NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `tanggal_simpan` date NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `status_jurnal` varchar(15) NOT NULL,
  `jenis_aktivitas` varchar(10) NOT NULL,
  `keterangan` varchar(2000) NOT NULL,
  `validasi` varchar(200) NOT NULL DEFAULT '1',
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `id_aktivitas`, `nip`, `volume`, `jenis_output`, `waktu_mulai`, `waktu_selesai`, `tanggal_simpan`, `tanggal_kirim`, `status_jurnal`, `jenis_aktivitas`, `keterangan`, `validasi`, `rating`) VALUES
(1, 1, '180003512', 1, 'Kegiatan', '2017-06-18 13:00:00', '2017-06-18 15:15:00', '2017-06-18', '2017-12-03', 'terkirim', 'SKP', '', '1', 0),
(2, 118, '180004373', 3, 'laporan per 1x survey', '2017-07-24 11:00:00', '2017-07-24 16:00:00', '2017-07-24', '2017-12-03', 'terkirim', 'SKP', '', '1', 0),
(3, 335, '180005067', 5, 'laporan', '2016-08-08 10:00:00', '2016-08-08 13:47:00', '2016-08-08', '2017-12-03', 'terkirim', 'Umum', '', '1', 0),
(4, 320, '180002527', 10, 'lembar', '2017-08-08 09:00:00', '2017-08-08 16:00:00', '2017-08-08', '2017-12-03', 'terkirim', 'Umum', '', '1', 0),
(6, 319, '180002527', 8, 'Lembar', '2017-08-08 09:00:00', '2017-08-08 16:00:00', '2017-08-08', '2017-12-03', 'terkirim', 'Umum', '', '1', 0),
(7, 126, '180002527', 1, 'Kegiatan', '2017-08-01 08:20:00', '2017-08-01 12:00:00', '2017-08-01', '2017-12-03', 'terkirim', 'SKP', '', '1', 0),
(8, 402, '180002997', 1, 'Kegiatan', '2017-08-07 07:30:00', '2017-08-07 09:45:00', '2017-08-07', '2017-12-03', 'terkirim', 'SKP', '', '1', 2),
(9, 211, '180004854', 3, 'Laporan', '2017-08-07 07:50:00', '2017-08-07 15:00:00', '2017-08-01', '2017-12-03', 'terkirim', 'SKP', '', '1', 0),
(10, 358, '180004854', 1, 'Kegiatan', '2017-08-03 08:00:00', '2017-08-03 10:30:00', '2017-08-03', '2017-12-03', 'terkirim', 'Umum', '', '1', 0),
(11, 353, '180003445', 3, 'Surat', '2017-07-26 10:00:00', '2017-07-26 10:37:00', '2017-07-26', '2017-12-03', 'terkirim', 'Umum', '', '1', 0),
(12, 83, '180004895', 1, 'Kegiatan', '2017-08-04 10:01:00', '2017-08-04 12:00:00', '2017-08-04', '2017-12-03', 'terkirim', 'SKP', '', '1', 0),
(13, 149, '180004895', 1, 'Kegiatan', '2017-08-09 11:00:00', '2017-08-09 13:00:00', '2017-08-09', '2017-12-03', 'terkirim', 'SKP', '', '1', 0),
(14, 264, '180002527', 1, 'Kegiatan', '2017-08-04 07:00:00', '2017-08-04 15:00:00', '2017-08-04', '2017-12-03', 'terkirim', 'Umum', '', '1', 0),
(15, 36, '180004854', 1, 'Laporan', '2017-08-10 09:30:00', '2017-08-10 11:00:00', '2017-09-11', '2017-12-03', 'terkirim', 'Umum', '', '1', 0),
(16, 1, '180004854', 1, 'Laporan', '2017-08-15 07:30:00', '2017-08-15 11:30:00', '2017-08-15', '2017-12-03', 'terkirim', 'SKP', '', '1', 0),
(17, 121, '180003512', 2, 'Laporan', '2017-08-18 08:30:00', '2017-08-18 10:00:00', '2017-08-18', '2017-12-03', 'terkirim', 'SKP', '', '1', 0),
(18, 56, '180003512', 1, 'Kegiatan', '2017-08-21 09:00:00', '2017-08-21 11:00:00', '2017-08-21', '2017-12-03', 'terkirim', 'SKP', '', '1', 0),
(19, 161, '180003512', 3, 'Laporan', '2017-08-18 10:00:00', '2017-08-18 12:00:00', '2017-08-21', '2017-12-03', 'terkirim', 'Umum', '', '1', 0),
(20, 206, '180002997', 1, 'Laporan', '2017-08-22 10:00:00', '2017-08-22 10:30:00', '2017-08-22', '2017-12-03', 'terkirim', 'SKP', '', '1', 4),
(21, 302, '180005067', 2, 'Laporan', '2017-08-04 08:30:00', '2017-08-04 12:30:00', '2017-08-04', '2017-12-03', 'terkirim', 'Umum', '', '1', 0),
(22, 140, '180004854', 1, 'Laporan', '2017-08-22 09:00:00', '2017-08-22 09:30:00', '2017-08-22', '2017-12-03', 'terkirim', 'SKP', '', '1', 0),
(23, 56, '180004854', 1, 'sop', '2017-08-22 07:30:00', '2017-08-22 09:30:00', '2017-08-22', '2017-12-03', 'terkirim', 'Tambahan', 'test', '1', 0),
(24, 447, '180004854', 1, '-', '2017-09-04 00:00:00', '2017-09-05 23:59:00', '2017-09-04', '2017-12-03', 'terkirim', 'Umum', 'demam', '1', 0),
(25, 445, '180003512', 1, '-', '2017-09-06 00:00:00', '2017-09-06 23:59:00', '2017-09-06', '2017-12-03', 'terkirim', 'Umum', 'test', '1', 0),
(27, 1, '180003512', 1, 'Kegiatan', '2017-09-06 06:00:00', '2017-09-06 08:00:00', '2017-09-06', '2017-12-03', 'terkirim', 'SKP', 'test', '1', 0),
(28, 1, '180003512', 1, 'Kegiatan', '2017-09-06 07:30:00', '2017-09-06 13:30:00', '2017-09-06', '2017-12-03', 'terkirim', 'SKP', 'test', '1', 0),
(29, 38, '180004854', 1, 'Laporan', '2017-09-06 10:00:00', '2017-09-06 11:00:00', '2017-09-06', '2017-12-03', 'terkirim', 'Umum', 'test', '1', 0),
(31, 24, '180004854', 1, 'kegiatan', '2017-09-20 08:00:00', '2017-09-20 08:05:00', '2017-09-20', '2017-12-03', 'terkirim', 'Umum', 'rapat', '1', 3),
(32, 1, '180004854', 1, 'kegiatan', '2016-02-12 08:00:00', '2016-02-12 08:30:00', '2017-09-20', '2017-12-03', 'terkirim', 'Umum', 'monitor', '1', 0),
(33, 57, '180004373', 1, 'kegiatan', '2017-10-06 00:00:00', '2017-10-06 23:59:00', '2017-10-06', '2017-12-03', 'terkirim', 'umum', 'asaskjdhasd asdlkjs lakjsdas dlaksdjsk jasdk jasdkasjdks jksj skajdlaskd jasld kasjdaskdjasdlkasjdalsk asjdlask djasdas asaskjdhasd asdlkjs lakjsdas dlaksdjsk jasdk jasdkasjdks jksj skajdlaskd jasld kasjdaskdjasdlkasjdalsk asjdlask djasdas', '1', 0),
(34, 357, '180003512', 1, 'kegiatan', '2017-11-06 08:34:00', '2017-11-06 09:30:00', '2017-11-08', '0000-00-00', 'draft', 'Tambahan', 'mengawasi ujian', '1', 0),
(35, 8, '180003512', 1, 'kegiatan', '2017-11-28 09:30:00', '2017-11-28 11:00:00', '2017-11-28', '0000-00-00', 'draft', 'SKP', 'acara ', '1', 0),
(36, 24, '180003512', 1, 'kegiatan', '2017-11-28 09:00:00', '2017-11-28 10:30:00', '2017-11-28', '0000-00-00', 'draft', 'Umum', 'rapat teknis', '1', 0),
(38, 440, '180003512', 1, '-', '2017-11-30 00:00:00', '2017-12-01 23:59:00', '2017-12-01', '0000-00-00', 'draft', 'Umum', 'izin', '1', 0),
(39, 440, '180003512', 1, '-', '2017-12-03 00:00:00', '2017-12-03 23:59:00', '2017-12-03', '0000-00-00', 'draft', 'Umum', 'izin', '1', 0),
(40, 1, '180004373', 1, 'kegiatan', '2017-12-03 08:00:00', '2017-12-03 09:00:00', '2017-12-03', '0000-00-00', 'draft', 'umum', 'monitor', '1', 0),
(41, 440, '180004373', 1, '-', '2017-12-04 00:00:00', '2017-12-05 23:59:00', '2017-12-03', '0000-00-00', 'draft', 'Umum', 'izin', '1', 0),
(42, 440, '180004854', 1, '-', '2017-12-03 00:00:00', '2017-12-03 23:59:00', '2017-12-03', '0000-00-00', 'draft', 'Umum', 'ok', '1', 0),
(43, 56, '180004854', 1, '1', '2017-12-01 09:30:00', '2017-12-01 10:00:00', '2017-12-03', '0000-00-00', 'draft', 'Umum', '1', '1', 0),
(44, 56, '180004854', 1, 'u', '2017-12-02 09:30:00', '2017-12-02 11:59:00', '2017-12-03', '0000-00-00', 'draft', 'umum', '', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'teknis'),
(2, 'operasional'),
(3, 'administrasi'),
(4, 'pelayanan'),
(5, 'izin harian');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nip` varchar(12) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `nama_pegawai` varchar(150) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `id_pegawai`, `nama_pegawai`, `id_jabatan`, `password`, `level`, `foto`) VALUES
('12323123', '12312323231', 'sdasdasdawd', 159, '12323123', '1', ''),
('180002527', '196206271981031001', 'Suprapto', 144, '180002527', '1', '180002527.jpg'),
('180002997', '196008211982121001', 'Ridhwan Stalin, S.H.', 113, '180002997', '1', '180002997.jpg'),
('180003229', '19500714193431022', 'Abdul Rahman', 105, 'password', '1', ''),
('180003445', '196306271986031003', 'Purwanto', 112, '180003445', '1', '180003445.JPG'),
('180003512', '19570917 198603 1001', 'Drs. M. Nizar Mahyudin', 3, '180003512', '1', '180003512.jpg'),
('180003782', '19700205 199303 1004', 'Hasim Mukti', 143, '180003782', '1', '180003782.jpg'),
('180004373', '19701111 199703 2001', 'Susi Susanti, S.H.', 101, '180004373', '1', '180004373.JPG'),
('180004854', '198401192005012001', 'Amelia Irna Mayarni Sitohang, S.E.', 148, '180004854', '1', '180004854.jpg'),
('180004895', '197903292005011001', 'Firman Setiana, S.AP.', 146, '180004895', '1', '180004895.JPG'),
('180005067', '197110192006042001', 'Catherine Tulus Olivia, S.E., M.E.', 111, '180005067', '1', '180005067.jpg'),
('180005163', '196509282007012026', 'Endah Takariyanti', 150, '180005163', '1', '180005163.jpg'),
('180005172', '197407052007011006', 'Ade Wahyudin', 149, '180005172', '1', '180005172.jpg'),
('180005548', '198410062010121002', 'Oktaviano Yohannes Pantow, S.E.', 139, '180005548', '1', '180005548.jpg'),
('180005605', '198904032014022001', 'Irene Astika Dewi, S.I.Kom.', 141, '180005605', '1', '180005605.jpg'),
('180005606', '199010272014022001', 'Rahmelya Oktari, S.I.A.', 140, '180005606', '1', '180005606.jpg'),
('180005736', '199209302015032001', 'Temy Pratiwi, S.H.', 145, '180005736', '1', '180005736.jpg'),
('180005781', '198906282015032001', 'Shelly Amelia, A.Md.', 142, '180005781', '1', '180005781.jpg'),
('232323232', '233423423', 'sadsdasdasd', 9002, '232323232', '1', ''),
('admin', '999', 'admin', 9000, 'admin', '99', 'admin.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ajuan_aktivitas`
--
ALTER TABLE `ajuan_aktivitas`
  ADD PRIMARY KEY (`id_ajuan`);

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indexes for table `hari_libur`
--
ALTER TABLE `hari_libur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_jabatan`
--
ALTER TABLE `history_jabatan`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ajuan_aktivitas`
--
ALTER TABLE `ajuan_aktivitas`
  MODIFY `id_ajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=460;
--
-- AUTO_INCREMENT for table `hari_libur`
--
ALTER TABLE `hari_libur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `history_jabatan`
--
ALTER TABLE `history_jabatan`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9006;
--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
