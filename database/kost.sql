-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Apr 2024 pada 11.32
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kost`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(5) NOT NULL,
  `id_kosan` int(5) NOT NULL,
  `nama_kosan` varchar(100) NOT NULL,
  `nama_kamar` varchar(100) NOT NULL,
  `tarif_perbulan` varchar(50) NOT NULL,
  `tarif_pertahun` varchar(50) NOT NULL,
  `foto_option1` text DEFAULT NULL,
  `foto_option2` text DEFAULT NULL,
  `foto_option3` text DEFAULT NULL,
  `foto_option4` text DEFAULT NULL,
  `foto_option5` text DEFAULT NULL,
  `fasilitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_kosan`, `nama_kosan`, `nama_kamar`, `tarif_perbulan`, `tarif_pertahun`, `foto_option1`, `foto_option2`, `foto_option3`, `foto_option4`, `foto_option5`, `fasilitas`) VALUES
(12, 19, 'Kosan Puncak Sejahtera', 'Y02', ' 800000', ' 9000000', 'image-JttQFN80U-transformed.png', 'image-F106i-W0b-transformed.png', 'image-VIONfLlLt-transformed.png', '', '', 'Kamar Mandi Dalam,Listrik Token,AC,Kamar Mandi Dalam,Lemari Pakaian,Dapur Umum,Air 24 Jam'),
(13, 18, 'Kosan Bahagia Abadi', 'B01', ' 600000', ' 7000000', 'kost-murah-di-pusat-tengah-kota-bandar-318392830.jpg', 'kost-murah-di-pusat-tengah-kota-bandar-3183928301.jpg', '', '', '', 'Kamar Mandi Luar,Listrik Token,Free Wifi 24 jam,Air 24 Jam,Tempat Tidur Spring Bed'),
(14, 19, 'Kosan Puncak Sejahtera', 'Y01', ' 1000000', ' 10000000', 'image-W4TbXFjyp-transformed.png', 'image-YAb9jcoQR-transformed.png', 'image-4s22deln6-transformed.png', '', '', 'Free Wifi 24 jam,Kamar Mandi Dalam,Lemari Pakaian,Dapur Umum,Air 24 Jam,Tempat Tidur Spring Bed'),
(15, 18, 'Kosan Bahagia Abadi', 'B02', ' 500000', ' 6000000', 'kost-putra-putri-dan-kontrakan-rumah-27258214.jpg', 'XYfNsxhG_-240x3201.jpg', '', '', '', 'Free Wifi 24 jam,Listrik Token,Dapur Umum,Air 24 Jam'),
(16, 15, 'MUNGGARAN KOST', 'T01', ' 1000000', ' 11000000', 'images-1-11.jpg', '', '', '', '', 'Free Wifi 24 jam,Kamar Mandi Dalam,Listrik Token,Lemari Pakaian,Meja Belajar,Tempat Tidur Spring Bed'),
(17, 15, 'MUNGGARAN KOST', 'T02', ' 900000', ' 10500000', 'hipwee-54446509_344272106258262_4677517404827874741_n-750x4221.jpg', '', '', '', '', 'Free Wifi 24 jam,Kamar Mandi Dalam,Lemari Pakaian,Dapur Umum,Air 24 Jam,Tempat Tidur Spring Bed');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kosan`
--

CREATE TABLE `kosan` (
  `id_kosan` int(10) NOT NULL,
  `nama_kosan` varchar(100) NOT NULL,
  `wilayah` varchar(100) NOT NULL,
  `layanan` varchar(20) NOT NULL,
  `foto_utama` text DEFAULT NULL,
  `foto_kamar` text DEFAULT NULL,
  `foto_toilet` text DEFAULT NULL,
  `tlp` varchar(20) NOT NULL,
  `map` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kosan`
--

INSERT INTO `kosan` (`id_kosan`, `nama_kosan`, `wilayah`, `layanan`, `foto_utama`, `foto_kamar`, `foto_toilet`, `tlp`, `map`, `alamat`, `deskripsi`) VALUES
(15, 'MUNGGARAN KOST', 'KOTA TASIKMALAYA', 'Pria & Wanita', '2075445279p.jpg', 'images_(1).jpeg', 'images.jpeg', '089474837438', 'LatLng(-7.352861, 108.314477)', 'KP.CISALAM RT 06 RW 02 DESA PASIRPANJANG KEC.MANONJAYA KAB.TASIKMALAYA', '<div>1. **Jam Malam dan Kepamanan:**<br>&nbsp; &nbsp;- Setiap penghuni diharapkan untuk memasuki kosan sebelum jam tertentu pada malam hari. Ini untuk menjaga ketenangan dan keamanan bersama.<br>&nbsp; &nbsp;- Penghuni yang pulang larut malam diharapkan untuk melakukannya dengan tenang agar tidak mengganggu penghuni lainnya.<br><br>2. **Kebersihan:**<br>&nbsp; &nbsp;- Setiap penghuni diwajibkan untuk menjaga kebersihan di dalam dan sekitar kamar masing-masing.<br>&nbsp; &nbsp;- Sampah harus dibuang ke tempat sampah yang telah disediakan.<br><br>3. **Pemeliharaan Fasilitas:**<br>&nbsp; &nbsp;- Penghuni diharapkan untuk menggunakan fasilitas dengan baik dan merawatnya dengan baik pula.<br>&nbsp; &nbsp;- Laporan kerusakan atau masalah lain segera dilaporkan kepada pengelola.<br><br>4. **Kunjungan Tamu:**<br>&nbsp; &nbsp;- Tamu diizinkan, tetapi penghuni bertanggung jawab sepenuhnya atas perilaku tamunya.<br>&nbsp; &nbsp;- Tamu dilarang untuk menginap lebih dari waktu yang wajar tanpa persetujuan pengelola.<br><br>5. **Ketertiban:**<br>&nbsp; &nbsp;- Tidak diperkenankan membuat kebisingan yang dapat mengganggu penghuni lainnya.<br>&nbsp; &nbsp;- Tidak diperkenankan melakukan kegiatan yang melanggar hukum atau kebijakan kosan.<br><br>6. **Pembayaran Sewa:**<br>&nbsp; &nbsp;- Pembayaran sewa harus dilakukan sesuai dengan ketentuan yang telah ditetapkan.<br>&nbsp; &nbsp;- Keterlambatan pembayaran sewa dapat dikenai denda atau sanksi lainnya.<br><br>7. **Asuransi:**<br>&nbsp; &nbsp;- Disarankan untuk memiliki asuransi penyewa untuk melindungi harta benda pribadi di dalam kamar.<br><br>8. **Pengubahan Fasilitas:**<br>&nbsp; &nbsp;- Penghuni dilarang untuk melakukan perubahan pada struktur atau fasilitas tanpa izin pengelola kosan.<br><br>9. **Penghuni Baru:**<br>&nbsp; &nbsp;- Penghuni yang ingin pindah keluar diharapkan memberikan pemberitahuan sebelum waktu yang telah ditentukan.<br><br>10. **Pemadaman Listrik dan Air:**<br>&nbsp; &nbsp; - Penghuni diharapkan untuk menggunakan listrik dan air dengan bijak.<br>&nbsp; &nbsp; - Pemadaman listrik dan air dapat terjadi dalam keadaan darurat, dan penghuni diharapkan untuk bersabar dan mengikuti petunjuk yang diberikan.<br><br>11. **Keadaan Darurat:**<br>&nbsp; &nbsp; - Penghuni diharapkan mengetahui dan mengikuti prosedur keamanan dan evakuasi yang telah ditetapkan.</div>'),
(18, 'Kosan Bahagia Abadi', 'KOTA BANDUNG', 'Khusus Wanita', 'kos1.jpg', 'kos.jpg', 'kos-kosan-1.png', '893729391', 'LatLng(-6.928082, 107.613026)', 'Jl. Lengkong Besar No.62, Cikawao, Kec. Lengkong, Kota Bandung, Jawa Barat 40261', '<div>1. **Jam Malam dan Kepamanan:**<br>&nbsp; &nbsp;- Setiap penghuni diharapkan untuk memasuki kosan sebelum jam tertentu pada malam hari. Ini untuk menjaga ketenangan dan keamanan bersama<br>&nbsp; &nbsp;- Penghuni yang pulang larut malam diharapkan untuk melakukannya dengan tenang agar tidak mengganggu penghuni lainnya.<br><br>2. **Kebersihan:**<br>&nbsp; &nbsp;- Setiap penghuni diwajibkan untuk menjaga kebersihan di dalam dan sekitar kamar masing-masing.<br>&nbsp; &nbsp;- Sampah harus dibuang ke tempat sampah yang telah disediakan.<br><br>3. **Pemeliharaan Fasilitas:**<br>&nbsp; &nbsp;- Penghuni diharapkan untuk menggunakan fasilitas dengan baik dan merawatnya dengan baik pula.<br>&nbsp; &nbsp;- Laporan kerusakan atau masalah lain segera dilaporkan kepada pengelola.<br><br>4. **Kunjungan Tamu:**<br>&nbsp; &nbsp;- Tamu diizinkan, tetapi penghuni bertanggung jawab sepenuhnya atas perilaku tamunya.<br>&nbsp; &nbsp;- Tamu dilarang untuk menginap lebih dari waktu yang wajar tanpa persetujuan pengelola.<br><br>5. **Ketertiban:**<br>&nbsp; &nbsp;- Tidak diperkenankan membuat kebisingan yang dapat mengganggu penghuni lainnya.<br>&nbsp; &nbsp;- Tidak diperkenankan melakukan kegiatan yang melanggar hukum atau kebijakan kosan.<br><br>6. **Pembayaran Sewa:**<br>&nbsp; &nbsp;- Pembayaran sewa harus dilakukan sesuai dengan ketentuan yang telah ditetapkan.<br>&nbsp; &nbsp;- Keterlambatan pembayaran sewa dapat dikenai denda atau sanksi lainnya.<br><br>7. **Asuransi:**<br>&nbsp; &nbsp;- Disarankan untuk memiliki asuransi penyewa untuk melindungi harta benda pribadi di dalam kamar.<br><br>8. **Pengubahan Fasilitas:**<br>&nbsp; &nbsp;- Penghuni dilarang untuk melakukan perubahan pada struktur atau fasilitas tanpa izin pengelola kosan.<br><br>9. **Penghuni Baru:**<br>&nbsp; &nbsp;- Penghuni yang ingin pindah keluar diharapkan memberikan pemberitahuan sebelum waktu yang telah ditentukan.<br><br>10. **Pemadaman Listrik dan Air:**<br>&nbsp; &nbsp; - Penghuni diharapkan untuk menggunakan listrik dan air dengan bijak.<br>&nbsp; &nbsp; - Pemadaman listrik dan air dapat terjadi dalam keadaan darurat, dan penghuni diharapkan untuk bersabar dan mengikuti petunjuk yang diberikan.<br><br>11. **Keadaan Darurat:**<br>&nbsp; &nbsp; - Penghuni diharapkan mengetahui dan mengikuti prosedur keamanan dan evakuasi yang telah ditetapkan.</div>'),
(19, 'Kosan Puncak Sejahtera', 'YOGYAKARTA', 'Pria & Wanita', 'image3.jpg', 'kos1-799x510.jpg', 'sepenggal-cerita-dari-redupnya-kamar-indekos.jpeg', '089373299', 'LatLng(-7.790599, 110.36693)', 'Jl. Malioboro No.60, Suryatmajan, Kec. Danurejan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55213', '<div>1. **Jam Malam dan Kepamanan:**<br>&nbsp; &nbsp;- Setiap penghuni diharapkan untuk memasuki kosan sebelum jam tertentu pada malam hari. Ini untuk menjaga ketenangan dan keamanan bersama.<br>&nbsp; &nbsp;- Penghuni yang pulang larut malam diharapkan untuk melakukannya dengan tenang agar tidak mengganggu penghuni lainnya.<br><br>2. **Kebersihan:**<br>&nbsp; &nbsp;- Setiap penghuni diwajibkan untuk menjaga kebersihan di dalam dan sekitar kamar masing-masing.<br>&nbsp; &nbsp;- Sampah harus dibuang ke tempat sampah yang telah disediakan.<br><br>3. **Pemeliharaan Fasilitas:**<br>&nbsp; &nbsp;- Penghuni diharapkan untuk menggunakan fasilitas dengan baik dan merawatnya dengan baik pula.<br>&nbsp; &nbsp;- Laporan kerusakan atau masalah lain segera dilaporkan kepada pengelola.<br><br>4. **Kunjungan Tamu:**<br>&nbsp; &nbsp;- Tamu diizinkan, tetapi penghuni bertanggung jawab sepenuhnya atas perilaku tamunya.<br>&nbsp; &nbsp;- Tamu dilarang untuk menginap lebih dari waktu yang wajar tanpa persetujuan pengelola.<br><br>5. **Ketertiban:**<br>&nbsp; &nbsp;- Tidak diperkenankan membuat kebisingan yang dapat mengganggu penghuni lainnya.<br>&nbsp; &nbsp;- Tidak diperkenankan melakukan kegiatan yang melanggar hukum atau kebijakan kosan.<br><br>6. **Pembayaran Sewa:**<br>&nbsp; &nbsp;- Pembayaran sewa harus dilakukan sesuai dengan ketentuan yang telah ditetapkan.<br>&nbsp; &nbsp;- Keterlambatan pembayaran sewa dapat dikenai denda atau sanksi lainnya.<br><br>7. **Asuransi:**<br>&nbsp; &nbsp;- Disarankan untuk memiliki asuransi penyewa untuk melindungi harta benda pribadi di dalam kamar.<br><br>8. **Pengubahan Fasilitas:**<br>&nbsp; &nbsp;- Penghuni dilarang untuk melakukan perubahan pada struktur atau fasilitas tanpa izin pengelola kosan.<br><br>9. **Penghuni Baru:**<br>&nbsp; &nbsp;- Penghuni yang ingin pindah keluar diharapkan memberikan pemberitahuan sebelum waktu yang telah ditentukan.<br><br>10. **Pemadaman Listrik dan Air:**<br>&nbsp; &nbsp; - Penghuni diharapkan untuk menggunakan listrik dan air dengan bijak.<br>&nbsp; &nbsp; - Pemadaman listrik dan air dapat terjadi dalam keadaan darurat, dan penghuni diharapkan untuk bersabar dan mengikuti petunjuk yang diberikan.<br><br>11. **Keadaan Darurat:**<br>&nbsp; &nbsp; - Penghuni diharapkan mengetahui dan mengikuti prosedur keamanan dan evakuasi yang telah ditetapkan.</div>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `otp` int(11) NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `otp`
--

INSERT INTO `otp` (`id`, `nomor`, `otp`, `waktu`) VALUES
(30, '6285382970367', 901743, 1713240515),
(32, '6285382970366', 943937, 1713424132),
(45, '85382970367', 144216, 1713585447);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghuni`
--

CREATE TABLE `penghuni` (
  `id_penghuni` int(5) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `ktp` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tlp` varchar(30) NOT NULL,
  `kosan` text NOT NULL,
  `nomor_kosan` varchar(20) NOT NULL,
  `bayaran` enum('bulan','tahun') NOT NULL,
  `tarif_perbulan` decimal(10,0) NOT NULL,
  `tarif_pertahun` decimal(10,0) NOT NULL,
  `status` enum('tidak','ya') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penghuni`
--

INSERT INTO `penghuni` (`id_penghuni`, `id_user`, `id_kamar`, `nik`, `ktp`, `nama`, `jk`, `tlp`, `kosan`, `nomor_kosan`, `bayaran`, `tarif_perbulan`, `tarif_pertahun`, `status`) VALUES
(33, 19, 13, '3206220205020002', 'download18.jpg', 'himawari', 'Perempuan', '85382970390', 'Kosan Bahagia Abadi', 'B01', 'tahun', '300000', '5000000', 'ya'),
(41, 20, 0, '7837823', 'download11.jpg', 'Riksa Munggaran', 'Laki - Laki', '85382970367', 'MUNGGARAN KOST', 'T02', 'bulan', '900000', '10500000', 'tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `social_media`
--

CREATE TABLE `social_media` (
  `id_sosmed` int(1) NOT NULL,
  `link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `social_media`
--

INSERT INTO `social_media` (`id_sosmed`, `link`) VALUES
(1, 'https://www.instagram.com/rmunggaran252/'),
(2, 'https://www.facebook.com/riksamunggaran.munggaran'),
(3, '088747156024'),
(4, 'retaniakost@munggaran.grup..id');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `id_penghuni` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `tanggal_check_in` date NOT NULL,
  `tanggal_check_out` date NOT NULL,
  `total_biaya` decimal(10,0) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL,
  `status_konfirmasi` varchar(20) NOT NULL,
  `anu` int(1) NOT NULL,
  `tanggal_konfirmasi` date DEFAULT NULL,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp(),
  `diperbarui_pada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_penghuni`, `id_kamar`, `tanggal_check_in`, `tanggal_check_out`, `total_biaya`, `metode_pembayaran`, `status_pembayaran`, `status_konfirmasi`, `anu`, `tanggal_konfirmasi`, `dibuat_pada`, `diperbarui_pada`) VALUES
('OR66208a93', 33, 13, '2024-04-18', '2024-05-18', '5000000', 'Qris', 'Lunas', 'konfirmasi', 1, '2024-04-18', '2024-04-17 17:00:00', '2024-04-18 02:51:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `tipe`, `nama`, `nomor`, `email`) VALUES
(5, 'admin', '$2y$10$40wQcqrRxg5Ir2a9QAGhUeE89K7hb794/.Q.pTCiiFyy4jEX9dHDC', 'admin', 'admin', 'admin', ''),
(19, 'wati', '$2y$10$0q7REschiuJu0O2c8.Y6oeUV7CsACKUAiDm.v9lyEWT4IGab5bBRm', 'user', 'himawari', '85382970365', 'rhimawari8@gmail.com'),
(20, 'riksa', '$2y$10$jNYeqTFqZIXbPcAQ5hXEzuQAezNPhbKPBeBzNOugjs46.JwKK510W', 'user', 'Riksa Munggaran', '85382970367', 'riksamunggaran252@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `kosan`
--
ALTER TABLE `kosan`
  ADD PRIMARY KEY (`id_kosan`);

--
-- Indeks untuk tabel `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penghuni`
--
ALTER TABLE `penghuni`
  ADD PRIMARY KEY (`id_penghuni`);

--
-- Indeks untuk tabel `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id_sosmed`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_penghuni` (`id_penghuni`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `kosan`
--
ALTER TABLE `kosan`
  MODIFY `id_kosan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `penghuni`
--
ALTER TABLE `penghuni`
  MODIFY `id_penghuni` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id_sosmed` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
