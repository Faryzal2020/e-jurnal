--
-- Database: `db_kepegawaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id_aktivitas` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_aktivitas` varchar(100) NOT NULL,
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
(7, 2, 'memasukkan data ke softare kepegawaian', 20),
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
(424, 4, 'menyususn agenda surat', 1),
(425, 3, 'menyususn agenda surat ', 15),
(426, 1, ' menyusun analisa beban kerja', 75),
(427, 1, 'menyususn analisa jabatan', 120),
(428, 1, 'menyiapkan laporan pertanggungjawaban bulanan dan melaporkannya ke bidang akuntansi', 60),
(429, 1, 'menyusun evaluasi jabatan/ kelas jabatan', 120),
(430, 1, 'menyusun formasi jabatan/skpd jft', 120),
(431, 1, 'menyusun formasi jabatan fungsional umum (jfu)', 120),
(432, 1, 'menyusun kamus jabatan', 120),
(433, 4, 'menyusun konsep penyiapan objek kerja', 30),
(434, 1, 'menyusun konsep rincian anggaran bagian', 90),
(435, 1, 'menyusun/membuat peta jabatan', 90),
(436, 3, 'menyusun/menyiapkan bahan paparan pimpinan', 60),
(437, 1, 'menyusun perencanaan anggaran (per kegiatan)', 120),
(438, 3, 'menyususn perencanaan kebutuhan pegawai', 60),
(439, 1, 'menyusun usulan rencana kerja', 60);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `id_aktivitas` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  `jenis_output` varchar(50) NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `id_aktivitas`, `nip`, `volume`, `jenis_output`, `waktu_mulai`, `waktu_selesai`) VALUES
(1, 0, 0, 0, '', '2017-08-07 09:00:00', '2017-08-07 16:00:00'),
(2, 0, 0, 0, '', '2017-08-07 09:00:00', '2017-08-07 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'teknis'),
(2, 'operasional'),
(3, 'administrasi'),
(4, 'pelayanan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nip` varchar(12) NOT NULL,
  `nama_pegawai` varchar(80) NOT NULL,
  `email_pegawai` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`);

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
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;
--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
