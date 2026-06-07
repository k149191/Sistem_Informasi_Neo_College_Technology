-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2026 at 10:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nct`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` bigint NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text,
  `head_user_id` bigint DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `name`, `slug`, `description`, `head_user_id`, `status`, `created_at`) VALUES
(2, 'NCT 127', 'nct-127', 'Jurusan Teknologi Urban dan Kreatif', 3, 'active', '2026-05-20 04:43:51'),
(3, 'NCT Dream', 'nct-dream', 'Jurusan Pengembangan Generasi Digital', 10, 'active', '2026-05-20 04:43:51'),
(4, 'WayV', 'wayv', 'Jurusan Global dan Komunikasi Internasional', 14, 'active', '2026-05-20 04:43:51'),
(5, 'NCT DoJaeJung', 'nct-dojaejung', 'Jurusan Seni dan Media Modern', 5, 'active', '2026-05-20 04:43:51'),
(6, 'NCT Wish', 'nct-wish', 'Jurusan Inovasi dan Future Technology', 20, 'active', '2026-05-20 04:43:51'),
(7, 'NCT JNJM', 'nct-jnjm', 'Jurusan Strategi dan Kepemimpinan', 7, 'active', '2026-05-20 04:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` bigint NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `author_id` bigint NOT NULL,
  `published_at` date NOT NULL,
  `is_carousel` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tagar` enum('nct','nct-127','nct-dream','wayv','nct-dojaejung','nct-wish','nct-jnjm') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `slug`, `image`, `content`, `author_name`, `author_id`, `published_at`, `is_carousel`, `created_at`, `updated_at`, `tagar`) VALUES
(1, 'Penyambutan Mahasiswa Baru Tahun Ajaran 2026/2027 Berjalan Lancar', 'penyambutan-mahasiswa-baru-2026', 'img/news/maba_2026.jpg', 'Suasana penuh semangat menyelimuti kampus Universitas NCT hari ini, saat ribuan mahasiswa baru dari berbagai departemen resmi memulai perjalanan akademik mereka. Kegiatan Pengenalan Kehidupan Kampus bagi Mahasiswa Baru (PKKMB) tahun ajaran 2026/2027 resmi dibuka, menandai babak baru bagi para cendekiawan muda ini.\n\nUpacara pembukaan yang berlangsung khidmat namun meriah ini dipimpin langsung oleh Rektor Universitas NCT, Taeyong. Dalam pidato sambutannya, Rektor Taeyong memberikan apresiasi tinggi kepada para mahasiswa baru yang telah berhasil melewati seleksi ketat untuk bergabung dengan universitas.\n\nPesan Rektor: Kolaborasi dan Pengembangan Diri\nDalam arahannya, Rektor Taeyong menekankan bahwa masa perkuliahan bukan sekadar ajang untuk mengejar nilai akademis semata. Ia mendorong mahasiswa untuk lebih proaktif dalam menggali potensi diri di luar ruang kelas.\n\n\"Universitas adalah laboratorium kehidupan. Saya berpesan kepada seluruh mahasiswa baru agar tidak ragu untuk mengembangkan minat dan bakat kalian secara maksimal. Baik itu di bidang organisasi, riset, olahraga, maupun seni, manfaatkanlah setiap fasilitas dan peluang yang ada di kampus ini untuk tumbuh menjadi pribadi yang kompeten dan berkarakter,\" tegas Rektor Taeyong.', NULL, 1, '2026-06-05', 0, '2026-06-07 05:43:45', '2026-06-07 08:53:36', 'nct'),
(2, 'Pameran Inovasi Smart City Sukses Digelar oleh Mahasiswa Tingkat Akhir', 'pameran-inovasi-smart-city-127', 'img/news/smart_city.jpg', 'Mahasiswa dari Jurusan Teknologi Urban dan Kreatif memamerkan puluhan prototipe tata kota berbasis Artificial Intelligence (AI) dalam acara pameran tahunan. Salah satu inovasi yang paling disorot adalah sistem pengelolaan limbah otomatis yang diharapkan dapat diterapkan di lingkungan kampus.', NULL, 1, '2026-06-02', 0, '2026-06-07 05:43:45', '2026-06-07 05:43:45', 'nct-127'),
(3, 'Seminar Literasi Digital: Membangun Etika Bermedia Sosial yang Baik', 'seminar-literasi-digital-dream', 'img/news/literasi_digital.png', 'Dalam rangka meningkatkan kesadaran generasi muda akan pentingnya menjaga jejak digital, departemen menyelenggarakan seminar interaktif. Acara ini dihadiri oleh berbagai pakar komunikasi digital dan perwakilan mahasiswa tingkat satu.', NULL, 1, '2026-05-28', 0, '2026-06-07 05:43:45', '2026-06-07 07:56:45', 'nct-dream'),
(4, 'Pembukaan Program Student Exchange Semester Genap ke Asia Timur', 'program-pertukaran-pelajar-wayv', 'img/news/exchange_wayv.jpg', 'Jurusan Global dan Komunikasi Internasional secara resmi membuka pendaftaran untuk program pertukaran mahasiswa (student exchange) ke beberapa universitas mitra terkemuka di Tiongkok dan Thailand. Pendaftaran akan ditutup pada akhir bulan ini.', NULL, 1, '2026-05-25', 0, '2026-06-07 05:43:45', '2026-06-07 08:10:48', 'wayv'),
(5, 'Instalasi Seni Modern Berpadu Elemen Penciuman Pukau Pengunjung Galeri', 'instalasi-seni-modern-dojaejung', 'img/news/seni_parfum.png', 'Kolaborasi mahasiswa jurusan Seni dan Media Modern menghasilkan karya instalasi audio-visual epik yang menggabungkan elemen indera penciuman melalui parfum khusus dan proyeksi mapping 3D interaktif. Pameran ini dibuka untuk umum hingga akhir pekan.', NULL, 1, '2026-06-01', 0, '2026-06-07 05:43:45', '2026-06-07 07:57:05', 'nct-dojaejung'),
(6, 'Tim Robotika Kampus Sabet Juara Pertama di Kompetisi Nasional', 'kompetisi-robotika-wish', 'img/news/robotika_wish.jpg', 'Inovasi tiada henti! Tim mahasiswa dari jurusan Inovasi dan Future Technology berhasil mengalahkan puluhan kampus lain dalam merancang robot Search and Rescue (SAR) otonom di ajang kejuaraan nasional tingkat universitas.', NULL, 1, '2026-06-04', 0, '2026-06-07 05:43:45', '2026-06-07 05:43:45', 'nct-wish'),
(7, 'Pelatihan Kepemimpinan Eksekutif untuk Organisasi Mahasiswa', 'pelatihan-kepemimpinan-jnjm', 'img/news/kepemimpinan_jnjm.jpg', 'Sebanyak 50 ketua BEM dan himpunan mahasiswa terpilih mengikuti boot-camp pelatihan leadership intensif selama 3 hari. Program ini dirancang oleh Jurusan Strategi dan Kepemimpinan guna mencetak calon-calon pemimpin yang taktis dan adaptif.', NULL, 1, '2026-05-20', 0, '2026-06-07 05:43:45', '2026-06-07 05:43:45', 'nct-jnjm'),
(8, 'Kemeriahan Dies Natalis ke-10 Universitas NCT: Mengusung Tema Sinergi Tanpa Batas', 'dies-natalis-ke-10-universitas-nct', 'img/news/dies_natalis_10.jpg', 'Universitas NCT kembali merayakan hari jadinya yang ke-10 dengan serangkaian acara spektakuler selama satu minggu penuh. Mengusung tema \"Sinergi Tanpa Batas\", perayaan tahun ini melibatkan partisipasi aktif dari seluruh civitas akademika, mulai dari mahasiswa, dosen, hingga staf tenaga kependidikan. Puncak acara diselenggarakan di lapangan utama kampus yang disulap menjadi area festival megah.\r\n \r\n Rektor Universitas NCT, Taeyong, dalam pidato pembukaannya menyampaikan apresiasi setinggi-tingginya atas dedikasi seluruh pihak yang telah membawa kampus ini meraih berbagai penghargaan bergengsi. \"Satu dekade adalah tonggak sejarah yang krusial. Kita tidak hanya merayakan apa yang telah dicapai, tetapi juga mempersiapkan lompatan besar untuk masa depan pendidikan yang lebih inklusif dan inovatif,\" ujarnya di hadapan ribuan audiens.\r\n \r\n Rangkaian acara Dies Natalis ini mencakup simposium nasional, bazar kewirausahaan UMKM mahasiswa, donor darah massal, dan ditutup dengan malam puncak konser musik yang memukau. Diharapkan momentum ini semakin mempererat rasa kekeluargaan antar departemen.', NULL, 1, '2026-06-07', 0, '2026-06-07 08:55:38', '2026-06-07 08:55:38', 'nct'),
(9, 'Konferensi Internasional Tata Ruang Kota: Mencari Solusi untuk Kemacetan Urban', 'konferensi-tata-ruang-kota-127', 'img/news/konferensi_tata_ruang.jpg', 'Jurusan Teknologi Urban dan Kreatif (NCT 127) sukses menjadi tuan rumah dalam Konferensi Internasional Tata Ruang Kota 2026. Acara yang berlangsung selama dua hari di Auditorium Utama ini dihadiri oleh para pakar tata kota, perwakilan kementerian, serta delegasi mahasiswa dari lima negara tetangga. Fokus utama pembahasan tahun ini adalah integrasi transportasi publik dan pengurangan emisi karbon di kota-kota metropolitan.\r\n \r\n Johnny, selaku Kepala Departemen, menekankan pentingnya peran akademisi dalam memberikan solusi nyata bagi masalah masyarakat. \"Kota yang cerdas (smart city) bukan hanya tentang teknologi canggih, tetapi tentang bagaimana teknologi tersebut memanusiakan warganya dan menyelesaikan masalah sehari-hari seperti kemacetan dan polusi,\" tegasnya saat menjadi pembicara kunci.\r\n \r\n Luaran dari konferensi ini adalah sebuah draf rekomendasi kebijakan yang akan diserahkan kepada pemerintah daerah sebagai bahan pertimbangan dalam pembangunan tata kota lima tahun ke depan.', NULL, 1, '2026-06-06', 0, '2026-06-07 08:55:38', '2026-06-07 08:55:38', 'nct-127'),
(10, 'Peresmian Inkubator Startup Mahasiswa: Mendorong Lahirnya Technopreneur Muda', 'peresmian-inkubator-startup-dream', 'img/news/inkubator_startup.jpg', 'Sebagai langkah nyata dalam mendukung ekonomi digital, Jurusan Pengembangan Generasi Digital (NCT Dream) secara resmi meluncurkan fasilitas \"Dreamers Startup Incubator\". Fasilitas ini berlokasi di Gedung Inovasi Lantai 3 dan dilengkapi dengan area co-working space, ruang rapat berteknologi tinggi, serta studio rekaman podcast.\r\n \r\n Jeno, Kepala Departemen, melakukan prosesi potong pita didampingi oleh para dosen pembimbing dan perwakilan perusahaan modal ventura. Dalam sambutannya, ia menyatakan bahwa mahasiswa kini dituntut untuk tidak hanya mencari pekerjaan setelah lulus, tetapi juga menciptakan lapangan kerja. \"Inkubator ini akan memberikan pendampingan intensif (mentoring), akses ke investor, dan bantuan legalitas bagi tim mahasiswa yang memiliki ide bisnis aplikasi atau platform digital yang menjanjikan,\" ungkap Jeno.\r\n \r\n Pada hari peresmian tersebut, langsung terpilih lima tim startup mahasiswa angkatan pertama yang akan menjalani program inkubasi selama enam bulan ke depan dengan pendanaan awal dari universitas.', NULL, 1, '2026-06-05', 0, '2026-06-07 08:55:38', '2026-06-07 08:55:38', 'nct-dream'),
(11, 'Gebyar Budaya Internasional: Menyatukan Keberagaman di Halaman Kampus', 'gebyar-budaya-internasional-wayv', 'img/news/gebyar_budaya.jpg', 'Suasana kampus terasa berbeda akhir pekan ini. Puluhan stan berhiaskan bendera dan ornamen dari berbagai negara memenuhi area plaza universitas dalam acara Gebyar Budaya Internasional yang diprakarsai oleh Jurusan Global dan Komunikasi Internasional (WayV). Acara tahunan ini bertujuan untuk merayakan keragaman budaya (cultural diversity) para mahasiswa asing yang menempuh pendidikan di Universitas NCT.\r\n \r\n Pengunjung disuguhkan dengan berbagai atraksi menarik, mulai dari tarian tradisional, pertunjukan musik, hingga festival kuliner yang menyajikan makanan khas dari Tiongkok, Thailand, Jepang, Eropa, hingga Amerika Latin. Mahasiswa lokal pun tampak antusias berinteraksi menggunakan bahasa asing dengan para peserta.\r\n \r\n \"Melalui pertukaran budaya secara langsung seperti ini, mahasiswa belajar tentang empati, toleransi, dan pemahaman global yang tidak bisa hanya didapatkan di dalam ruang kelas,\" kata Kun, Kepala Departemen WayV, saat berkeliling mencicipi hidangan di salah satu stan mahasiswa.', NULL, 1, '2026-06-04', 0, '2026-06-07 08:55:38', '2026-06-07 08:55:38', 'wayv'),
(12, 'Pemutaran Perdana Film Dokumenter Karya Mahasiswa Raih Standing Ovation', 'pemutaran-perdana-film-dokumenter-dojaejung', 'img/news/film_dokumenter.jpg', 'Malam puncak Festival Sinema Mahasiswa yang digelar oleh Jurusan Seni dan Media Modern (NCT DoJaeJung) ditutup dengan momen mengharukan. Sebuah film dokumenter berdurasi 45 menit karya mahasiswa semester akhir berhasil mendapatkan standing ovation dari ratusan penonton yang memadati teater kampus.\r\n \r\n Film yang mengangkat isu sosial tentang kehidupan pekerja seni jalanan di era modernisasi kota tersebut digarap selama hampir satu tahun. Doyoung, Jaehyun, dan Jungwoo selaku dosen pembimbing turut hadir dan memberikan apresiasi langsung kepada tim produksi. \"Kalian berhasil menangkap realitas dengan sudut pandang kamera yang sangat jujur dan emosional,\" puji Doyoung saat sesi tanya jawab.\r\n \r\n Film ini rencananya akan diikutsertakan dalam kompetisi film independen tingkat nasional bulan depan, membawa nama baik institusi di kancah perfilman tanah air.', NULL, 1, '2026-06-03', 0, '2026-06-07 08:55:38', '2026-06-07 08:55:38', 'nct-dojaejung'),
(13, 'Sukses Uji Coba Kendaraan Listrik Otonom di Lingkungan Kampus', 'uji-coba-kendaraan-listrik-wish', 'img/news/mobil_otonom.jpg', 'Satu lagi pencapaian luar biasa ditorehkan oleh mahasiswa. Tim peneliti dari Jurusan Inovasi dan Future Technology (NCT Wish) berhasil melakukan uji coba purwarupa kendaraan listrik otonom (self-driving car) yang dirancang khusus untuk mobilitas di dalam area kampus. Kendaraan bertenaga surya ini berkeliling melewati beberapa halte tanpa pengemudi manusia.\r\n \r\n Kepala Departemen, Sion, memantau langsung jalannya uji coba dari ruang kendali utama. \"Sistem navigasi berbasis sensor LIDAR dan kamera AI yang diprogram oleh mahasiswa kita terbukti mampu merespons halangan, pejalan kaki, dan rambu berhenti dengan sangat akurat,\" jelasnya dengan bangga.\r\n \r\n Jika tahap penyempurnaan berjalan lancar, kendaraan ini ditargetkan dapat beroperasi secara penuh tahun depan sebagai shuttle bus gratis bagi mahasiswa, sekaligus mendukung kampanye kampus hijau bebas emisi.', NULL, 1, '2026-06-02', 0, '2026-06-07 08:55:38', '2026-06-07 08:55:38', 'nct-wish');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `role` enum('admin','mahasiswa','dosen','rektor') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `profil_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `created_at`, `role`, `profil_img`) VALUES
(1, 'Admin NCT', 'admin@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-06 03:27:11', 'admin', ''),
(2, 'Taeyong', 'taeyong@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'rektor', 'img/taeyong_rektor_nct127.jpg'),
(3, 'Johnny', 'johnny@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/johnny_nct127.jpg'),
(4, 'Yuta', 'yuta@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/yuta_nct127.jpg'),
(5, 'Doyoung', 'doyoung@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/doyoung_nct127_nctdojaejung.jpg'),
(6, 'Jaehyun', 'jaehyun@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/jaehyun_nct127_nctdojaejung.jpg'),
(7, 'Jungwoo', 'jungwoo@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/jungwoo_nct127_nctdojaejung.jpg'),
(8, 'Haechan', 'haechan@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/haechan_nct127_nctdream.jpg'),
(9, 'Renjun', 'renjun@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/renjun_nctdream.jpg'),
(10, 'Jeno', 'jeno@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/jeno_nctdream_nctjnjm.jpg'),
(11, 'Jaemin', 'jaemin@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/jaemin_nctdream_nctjnjm.jpg'),
(12, 'Chenle', 'chenle@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/chenle_nctdream.jpg'),
(13, 'Jisung', 'jisung@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/jisung_nctdream.jpg'),
(14, 'Kun', 'kun@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/kun_wayv.jpg'),
(15, 'Ten', 'ten@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/ten_wayv.jpg'),
(16, 'Winwin', 'winwin@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/winwin_wayv.jpg'),
(17, 'Xiaojun', 'xiaojun@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/xiaojun_wayv.jpg'),
(18, 'Hendery', 'hendery@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/hendery_wayv.jpg'),
(19, 'Yangyang', 'yangyang@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/yangyang_wayv.jpg'),
(20, 'Sion', 'sion@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/sion_nctwish.jpg'),
(21, 'Riku', 'riku@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/riku_nctwish.jpg'),
(22, 'Yushi', 'yushi@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/yushi_nctwish.jpg'),
(23, 'Jaehee', 'jaehee@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/jaehee_nctwish.jpg'),
(24, 'Ryo', 'ryo@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/ryo_nctwish.jpg'),
(25, 'Sakuya', 'sakuya@nct.ac.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-07 05:35:06', 'dosen', 'img/sakuya_wayv.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_departments`
--

CREATE TABLE `user_departments` (
  `user_id` bigint NOT NULL,
  `dept_id` bigint NOT NULL,
  `joined_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_departments`
--

INSERT INTO `user_departments` (`user_id`, `dept_id`, `joined_at`) VALUES
(2, 2, '2026-06-07 05:35:20'),
(3, 2, '2026-06-07 05:35:20'),
(4, 2, '2026-06-07 05:35:20'),
(5, 2, '2026-06-07 05:35:20'),
(5, 5, '2026-06-07 05:35:20'),
(6, 2, '2026-06-07 05:35:20'),
(6, 5, '2026-06-07 05:35:20'),
(7, 2, '2026-06-07 05:35:20'),
(7, 5, '2026-06-07 05:35:20'),
(8, 2, '2026-06-07 05:35:20'),
(8, 3, '2026-06-07 05:35:20'),
(9, 3, '2026-06-07 05:35:20'),
(10, 3, '2026-06-07 05:35:20'),
(10, 7, '2026-06-07 05:35:20'),
(11, 3, '2026-06-07 05:35:20'),
(11, 7, '2026-06-07 05:35:20'),
(12, 3, '2026-06-07 05:35:20'),
(13, 3, '2026-06-07 05:35:20'),
(14, 4, '2026-06-07 05:35:20'),
(15, 4, '2026-06-07 05:35:20'),
(16, 4, '2026-06-07 05:35:20'),
(17, 4, '2026-06-07 05:35:20'),
(18, 4, '2026-06-07 05:35:20'),
(19, 4, '2026-06-07 05:35:20'),
(20, 6, '2026-06-07 05:35:20'),
(21, 6, '2026-06-07 05:35:20'),
(22, 6, '2026-06-07 05:35:20'),
(23, 6, '2026-06-07 05:35:20'),
(24, 6, '2026-06-07 05:35:20'),
(25, 6, '2026-06-07 05:35:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `fk_dept_head` (`head_user_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `fk_news_author` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_departments`
--
ALTER TABLE `user_departments`
  ADD PRIMARY KEY (`user_id`,`dept_id`),
  ADD KEY `fk_pivot_dept` (`dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `fk_dept_head` FOREIGN KEY (`head_user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_departments`
--
ALTER TABLE `user_departments`
  ADD CONSTRAINT `fk_pivot_dept` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pivot_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
