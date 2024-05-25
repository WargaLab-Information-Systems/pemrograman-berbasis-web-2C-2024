-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2024 pada 17.55
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--
CREATE DATABASE IF NOT EXISTS `akademik` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `akademik`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidangminat`
--

CREATE TABLE `bidangminat` (
  `id_bidangminat` int(11) NOT NULL,
  `bidangminat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `bidangminat`
--

INSERT INTO `bidangminat` (`id_bidangminat`, `bidangminat`) VALUES
(1, 'Rekayasa Perangkat Lunak'),
(2, 'Teknik Komputer Jaringan'),
(3, 'Teknik Industri'),
(4, 'Teknik Informatika'),
(5, 'Sistem Informasi'),
(6, 'Pendidikan Informatika'),
(7, 'Teknik Elektro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(18) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `alamat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `id_kota`, `alamat`) VALUES
('192107132005011002', 'Ir. Allan Restu Jaya, MT. ', 2, 'Jl. Raya Tirtomarto No.67 Ampelgading   Artik'),
('193805082005012003', 'Siti Cholifah S.Kom, M.Kom', 3, 'Jl. Semeru Selatan No.23 Dampit'),
('194911102005011003', 'Husnul Ma\'ad Junaidi, S.Kom, M.Kom', 4, 'Jl. Raya Bantur No.1460 Bantur '),
('195004281979031002', 'Prof. Dr. Ir. Achmad Roesyadi, M.Sc', 5, 'Jl. Bahagia No. 13'),
('195303062005012002', 'Hj. Dwi Remawati, S.Kom, M.Kom', 5, 'Jl. Suropati No. 6 Bululawang'),
('195509211984031002', 'Ir. Ignatius Gunardi, MT', 5, 'Jl. Kamboja No. 4'),
('195907301986032001', 'Dr. Ir. Sri Rachmania Juliastuti, M.Eng', 5, 'Jl. Nugroho No. 43'),
('195907301986032004', 'Dr. Ir. Sri Nafia, M.Eng', 5, 'Jl. Nugroho No. 43'),
('196108021986011001', 'Prof. Dr. Ir Mahfud, DEA', 6, 'Jl. Stadion No. 2'),
('196406081991021001', 'Dr. Ir. Subhan Nanta, M.Eng', 6, 'Jl. Raya Mulyoagung No.200'),
('196406081991021003', 'Dr. Ir. Sumarno, M.Eng', 6, 'Jl. Diponegoro No 76 Gondanglegi'),
('197503062002122001', 'Dr. Lailatul Qadariyah, ST, MT', 7, 'Jl. Baturambat No. 32'),
('197705292003121002', 'Firman Kurniawansyah, ST, M.EngSc. Ph.D', 7, 'Jl. Semeru Selatan No.2 Dampit'),
('197705292003121004', 'Firman Kurniawansyah, ST,', 7, 'Jl. Cokro Atmojo No. 63'),
('198103032006041002', 'Donny Satria Bhuan,S.Kom', 8, 'Jl. Kamboja No. 63'),
('198103032006041003', 'Ainy Mabruhatin, ST.M.Eng', 8, 'Jl. Kamboja No. 63'),
('198107132005011001', 'Dr. Fadlilatul Taufany, ST, Ph.D', 8, 'Jl. Raya Larangan '),
('198110102009122004', 'Hikmatun Ni’mah, ST, M.Sc,', 8, 'Jl. Nugraha No. 6'),
('198311142015042007', 'Prida Novarita T, ST., MT', 8, 'Jl. Raya Bantur No.134 Bantur '),
('198405082009122004', 'Dr. Siti Nurkamidah, ST, MS, Ph.D', 9, 'Jl. Raya Donomulyo No.62 Donomulyo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `kota` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `kota`) VALUES
(1, 'Pamekasan'),
(2, 'Bangkalan'),
(3, 'Lamongan'),
(4, 'Malang'),
(5, 'Sumenep'),
(6, 'Bandung'),
(7, 'Surabaya'),
(8, 'Mojekerto'),
(9, 'Bali'),
(10, 'Sidoarjo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuliah`
--

CREATE TABLE `kuliah` (
  `nim` varchar(15) NOT NULL,
  `id_matakuliah` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `nilai` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kuliah`
--

INSERT INTO `kuliah` (`nim`, `id_matakuliah`, `tahun`, `semester`, `nilai`) VALUES
('190441100001', 305, '2020', '2', 'A'),
('190441100001', 306, '2020', '2', 'B+'),
('190441100001', 307, '2020', '2', 'B'),
('190441100002', 307, '2020', '2', 'B'),
('190441100002', 308, '2020', '2', 'B+'),
('190441100002', 309, '2020', '2', 'A'),
('190441100003', 311, '2020', '2', 'A'),
('190441100003', 312, '2020', '2', 'A'),
('190441100003', 313, '2020', '2', 'B+'),
('190441100004', 317, '2020', '2', 'B+'),
('190441100004', 318, '2020', '2', 'B+'),
('190441100004', 319, '2020', '2', 'B+'),
('190441100005', 310, '2020', '2', 'A'),
('190441100005', 314, '2020', '2', 'B'),
('190441100005', 314, '2020', '2', 'A'),
('190441100006', 311, '2020', '2', 'B'),
('190441100006', 305, '2020', '2', 'B'),
('190441100006', 317, '2020', '2', 'A'),
('190441100007', 306, '2020', '2', 'B+'),
('190441100007', 308, '2020', '2', 'A'),
('190441100007', 306, '2020', '2', 'A'),
('190441100008', 314, '2020', '2', 'B'),
('190441100008', 317, '2020', '2', 'B+'),
('190441100008', 309, '2020', '2', 'C'),
('190441100009', 315, '2020', '2', 'B'),
('190441100009', 314, '2020', '2', 'C+'),
('190441100009', 305, '2020', '2', 'A'),
('190441100010', 313, '2020', '2', 'B+'),
('190441100010', 307, '2020', '2', 'A'),
('190441100010', 319, '2020', '2', 'C'),
('190441100011', 311, '2020', '2', 'C'),
('190441100011', 306, '2020', '2', 'A'),
('190441100011', 307, '2020', '2', 'B+'),
('190441100012', 314, '2020', '2', 'A'),
('190441100012', 305, '2020', '2', 'B'),
('190441100012', 315, '2020', '2', 'C+'),
('190441100013', 316, '2020', '2', 'A'),
('190441100013', 315, '2020', '2', 'B+'),
('190441100013', 318, '2020', '2', 'A'),
('190441100014', 317, '2020', '2', 'C'),
('190441100014', 305, '2020', '2', 'A'),
('190441100014', 306, '2020', '2', 'B'),
('190441100015', 308, '2020', '2', 'B+'),
('190441100015', 310, '2020', '2', 'A'),
('190441100015', 319, '2020', '2', 'B+'),
('190441100016', 309, '2020', '2', 'B'),
('190441100016', 306, '2020', '2', 'A'),
('190441100016', 316, '2020', '2', 'B+'),
('190441100017', 307, '2020', '2', 'A'),
('190441100017', 312, '2020', '2', 'B+'),
('190441100017', 313, '2020', '2', 'A'),
('190441100018', 310, '2020', '2', 'B'),
('190441100018', 309, '2020', '2', 'B+'),
('190441100018', 305, '2020', '2', 'A'),
('190441100019', 317, '2020', '2', 'B'),
('190441100019', 318, '2020', '2', 'C+'),
('190441100019', 306, '2020', '2', 'A'),
('190441100020', 308, '2020', '2', 'B+'),
('190441100020', 316, '2020', '2', 'A'),
('190441100020', 319, '2020', '2', 'B+'),
('190441100021', 305, '2020', '2', 'A'),
('190441100021', 305, '2020', '2', 'B'),
('190441100021', 307, '2020', '2', 'B+'),
('190441100021', 306, '2020', '2', 'A'),
('190441100022', 307, '2020', '2', 'B'),
('190441100022', 309, '2020', '2', 'B+'),
('190441100022', 317, '2020', '2', 'A'),
('190441100023', 318, '2020', '2', 'B+'),
('190441100023', 311, '2020', '2', 'A'),
('190441100023', 306, '2020', '2', 'B+'),
('190441100024', 305, '2020', '2', 'A'),
('190441100024', 309, '2020', '2', 'A'),
('190441100025', 307, '2020', '2', 'A'),
('190441100025', 305, '2020', '2', 'B'),
('190441100025', 316, '2020', '2', 'B+'),
('190441100026', 318, '2020', '2', 'A'),
('190441100026', 316, '2020', '2', 'B'),
('190441100026', 313, '2020', '2', 'B+'),
('190441100027', 310, '2020', '2', 'A'),
('190441100027', 314, '2020', '2', 'B+'),
('190441100027', 311, '2020', '2', 'A'),
('190441100028', 310, '2020', '2', 'B+'),
('190441100028', 305, '2020', '2', 'A'),
('190441100028', 308, '2020', '2', 'B+'),
('190441100029', 317, '2020', '2', 'A'),
('190441100029', 306, '2020', '2', 'A'),
('190441100029', 307, '2020', '2', 'B+'),
('190441100030', 318, '2020', '2', 'A'),
('190441100030', 315, '2020', '2', 'B'),
('190441100030', 316, '2020', '2', 'B+'),
('190441100031', 311, '2020', '2', 'A'),
('190441100031', 309, '2020', '2', 'B+'),
('190441100031', 306, '2020', '2', 'A'),
('190441100032', 308, '2020', '2', 'B+'),
('190441100032', 310, '2020', '2', 'B+'),
('190441100032', 305, '2020', '2', 'B+'),
('190441100033', 313, '2020', '2', 'A'),
('190441100033', 307, '2020', '2', 'A'),
('190441100033', 305, '2020', '2', 'B+'),
('190441100034', 316, '2020', '2', 'A'),
('190441100034', 318, '2020', '2', 'B+'),
('190441100034', 310, '2020', '2', 'B+'),
('190441100035', 311, '2020', '2', 'A'),
('190441100035', 306, '2020', '2', 'B+'),
('190441100035', 318, '2020', '2', 'A'),
('190441100036', 316, '2020', '2', 'B+'),
('190441100036', 314, '2020', '2', 'A'),
('190441100036', 317, '2020', '2', 'B+'),
('190441100037', 307, '2020', '2', 'A'),
('190441100037', 316, '2020', '2', 'B'),
('190441100037', 305, '2020', '2', 'B+'),
('190441100038', 313, '2020', '2', 'A'),
('190441100038', 318, '2020', '2', 'B'),
('190441100038', 312, '2020', '2', 'B+'),
('190441100039', 315, '2020', '2', 'A'),
('190441100039', 305, '2020', '2', 'B+'),
('190441100039', 316, '2020', '2', 'A'),
('190441100040', 314, '2020', '2', 'B+'),
('190441100040', 306, '2020', '2', 'A'),
('190441100040', 319, '2020', '2', 'B+'),
('190441100041', 306, '2020', '2', 'A'),
('190441100041', 305, '2020', '2', 'B'),
('190441100041', 319, '2020', '2', 'B+'),
('190441100042', 314, '2020', '2', 'A'),
('190441100042', 310, '2020', '2', 'B'),
('190441100042', 317, '2020', '2', 'C+'),
('190441100043', 313, '2020', '2', 'A'),
('190441100043', 307, '2020', '2', 'B+'),
('190441100043', 317, '2020', '2', 'A'),
('190441100044', 310, '2020', '2', 'B+'),
('190441100044', 311, '2020', '2', 'B'),
('190441100044', 312, '2020', '2', 'A'),
('190441100045', 305, '2020', '2', 'A'),
('190441100045', 306, '2020', '2', 'B'),
('190441100045', 318, '2020', '2', 'B+'),
('190441100046', 308, '2020', '2', 'A'),
('190441100046', 305, '2020', '2', 'B'),
('190441100046', 319, '2020', '2', 'B+'),
('190441100047', 317, '2020', '2', 'A'),
('190441100047', 308, '2020', '2', 'B+'),
('190441100047', 315, '2020', '2', 'A'),
('190441100048', 313, '2020', '2', 'B+'),
('190441100048', 312, '2020', '2', 'A'),
('190441100048', 314, '2020', '2', 'B+'),
('190441100049', 306, '2020', '2', 'A'),
('190441100049', 308, '2020', '2', 'B'),
('190441100049', 316, '2020', '2', 'A'),
('190441100050', 314, '2020', '2', 'A'),
('190441100050', 315, '2020', '2', 'B+'),
('190441100050', 306, '2020', '2', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_matakuliah` int(11) NOT NULL,
  `matakuliah` varchar(45) NOT NULL,
  `sks` int(11) NOT NULL,
  `nip` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id_matakuliah`, `matakuliah`, `sks`, `nip`) VALUES
(305, 'PTIK', 3, '195509211984031002'),
(306, 'Algoritma Pemrograman', 4, '194911102005011003'),
(307, 'Matematika Diskrit', 3, '195907301986032001'),
(308, 'Keterampilan Interpersonal', 3, '198103032006041003'),
(309, 'Pendidikan Agama Islam', 3, '198311142015042007'),
(310, 'Pengantar Basis Data', 3, '195907301986032004'),
(311, 'Analisa dan Desain SI', 3, '198107132005011001'),
(312, 'Arsitektur Sistem Informasi Perusahaan', 3, '192107132005011002'),
(313, 'Pemrograman Berbasis Objek', 4, '197705292003121002'),
(314, 'Interaksi Manusia dan Komputer', 3, '193805082005012003'),
(315, 'Manajemen dan Organisasi', 3, '196406081991021001'),
(316, 'Bahasa Inggris', 3, '196108021986011001'),
(317, 'Keamanan Informasi', 3, '195303062005012002'),
(318, 'Pemrograman Berbasis Web', 4, '196406081991021003'),
(319, 'E- Bussiness dan E-Commerce', 3, '194911102005011003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs`
--

CREATE TABLE `mhs` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `alamat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `mhs`
--

INSERT INTO `mhs` (`nim`, `nama`, `id_kota`, `alamat`) VALUES
('190441100001', 'Nur Ichsan', 1, 'Jl. Stadion No. 20'),
('190441100002', 'Muhammad Syaifullah', 1, 'Jl. Ahmad Yani'),
('190441100003', 'Muh. Ardhi ', 1, 'Jl. Stasiun Wonokromo '),
('190441100004', 'Michael Junanda', 1, 'Jl. Diponegoro '),
('190441100005', 'Syukran Asyira', 1, 'Jl. Mastrip'),
('190441100006', 'Nasriani Nawir', 1, 'Jl. Nugroho '),
('190441100007', 'Ridho Wirawan', 2, 'Jl. Sultan Abd. Kadirun'),
('190441100008', 'Ahmad Tarikhul Haq', 2, 'Jl. Bates Sebaneh'),
('190441100009', 'Amanda Fajriana', 2, 'Komplek Ponpes darus Salam'),
('190441100010', 'Irfan Wahyudi Mus', 2, 'Jl. Diponegoro '),
('190441100011', 'Rindhy Angraeny', 2, 'Jln. KH. Hasyim Munir'),
('190441100012', 'Nurul Anisa', 2, 'Jl KH. Munif Ds.'),
('190441100013', 'Rizki Ramadhan', 3, 'Jln. Cerme Kec. Deket'),
('190441100014', 'Syahrul Rauf', 3, 'Jl. Delima'),
('190441100015', 'Fiqhi Rizky', 3, 'Jl. Kawisto'),
('190441100016', 'Nining Anggriani', 3, 'Jl. Mutia'),
('190441100017', 'Hendra Eka', 3, 'Jl. Jingga'),
('190441100018', 'Irma Dwiyani', 3, 'Jl. Syamsul Arifin'),
('190441100019', 'Ardhita Nufia', 4, 'Jln. Kenanga'),
('190441100020', 'Budiana Ayuni', 4, 'Jl. Mawar'),
('190441100021', 'Radhitya Erlangga', 4, 'Jl. Trunojoyo'),
('190441100022', 'Juned Hasani', 4, 'Jl. Kasih '),
('190441100023', 'Radya Fajar', 4, 'Jl. Matahari'),
('190441100024', 'Jullyans ', 4, 'Jl. Tulip'),
('190441100025', 'Ismail Anam', 5, 'Jl. Indra giri'),
('190441100026', 'Nur Ainy', 5, 'Jl. Mengganti'),
('190441100027', 'Mega yani', 5, 'Jl. Karah'),
('190441100028', 'Ach maulana', 5, 'Jl. Gayungan'),
('190441100029', 'Moh Iqbal', 5, 'Jl. Gayungan'),
('190441100030', 'Mahfud Amin', 5, 'Jl. Jambangan'),
('190441100031', 'Okta vianus', 6, 'Jl. Karah Agung'),
('190441100032', 'Ignasius Priyono', 6, 'Jl. Dukuh'),
('190441100033', 'Moh Mahdy', 6, 'Jl. Ketintang'),
('190441100034', 'Moh Fahmi', 6, 'Jl. Siwalankerto'),
('190441100035', 'Rizka Amirullah', 6, 'Jl. Jemur sari'),
('190441100036', 'Nurwinda Sari', 6, 'Jl. Ngagel'),
('190441100037', 'Dina Magdalena', 7, 'Jl. Bung Tomo'),
('190441100038', 'Waode Rindang', 7, 'Jl. Margarego'),
('190441100039', 'Nur Arini', 7, 'Jl. Arumy'),
('190441100040', 'Nuer Faria', 7, 'Jl. Asem Manis'),
('190441100041', 'Nana yana', 7, 'Jl. Musani'),
('190441100042', 'Mia sisna', 7, 'Jl. Cantika'),
('190441100043', 'Vera Niode', 7, 'Jl. Kesehatan'),
('190441100044', 'Ayu Lestari', 8, 'Jl. Melati'),
('190441100045', 'Nur Amaliyah', 8, 'Jl. Kemuning'),
('190441100046', 'Atri Ulya', 8, 'Jl. Anggara'),
('190441100047', 'Ansya Atika', 8, 'Jl. Abdul Karim'),
('190441100048', 'Wulan Dari', 8, 'Jl. Amirullah'),
('190441100049', 'Rahma Wati', 8, 'Jl. Aryawani'),
('190441100050', 'Moh Azhar', 8, 'Jl. Melati II');

-- --------------------------------------------------------

--
-- Struktur dari tabel `minatdosen`
--

CREATE TABLE `minatdosen` (
  `nip` varchar(18) NOT NULL,
  `id_bidangminat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `minatdosen`
--

INSERT INTO `minatdosen` (`nip`, `id_bidangminat`) VALUES
('192107132005011002', 1),
('192107132005011002', 2),
('193805082005012003', 3),
('193805082005012003', 4),
('194911102005011003', 1),
('194911102005011003', 5),
('195004281979031002', 4),
('195004281979031002', 3),
('195303062005012002', 4),
('195303062005012002', 2),
('195509211984031002', 4),
('195509211984031002', 5),
('195907301986032001', 5),
('195907301986032001', 1),
('195907301986032004', 3),
('195907301986032004', 2),
('196108021986011001', 1),
('196108021986011001', 3),
('196406081991021001', 3),
('196406081991021001', 4),
('196406081991021003', 3),
('196406081991021003', 1),
('197503062002122001', 4),
('197503062002122001', 1),
('197705292003121002', 5),
('197705292003121002', 3),
('197705292003121004', 5),
('198103032006041002', 1),
('198103032006041003', 2),
('198107132005011001', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bidangminat`
--
ALTER TABLE `bidangminat`
  ADD PRIMARY KEY (`id_bidangminat`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD UNIQUE KEY `id_kota` (`id_kota`);

--
-- Indeks untuk tabel `kuliah`
--
ALTER TABLE `kuliah`
  ADD KEY `nim` (`nim`),
  ADD KEY `id_matakuliah` (`id_matakuliah`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matakuliah`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indeks untuk tabel `minatdosen`
--
ALTER TABLE `minatdosen`
  ADD KEY `id_bidangminat` (`id_bidangminat`),
  ADD KEY `nip` (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bidangminat`
--
ALTER TABLE `bidangminat`
  MODIFY `id_bidangminat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kuliah`
--
ALTER TABLE `kuliah`
  MODIFY `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`);

--
-- Ketidakleluasaan untuk tabel `kuliah`
--
ALTER TABLE `kuliah`
  ADD CONSTRAINT `kuliah_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mhs` (`nim`),
  ADD CONSTRAINT `kuliah_ibfk_2` FOREIGN KEY (`id_matakuliah`) REFERENCES `matakuliah` (`id_matakuliah`);

--
-- Ketidakleluasaan untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD CONSTRAINT `matakuliah_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`);

--
-- Ketidakleluasaan untuk tabel `mhs`
--
ALTER TABLE `mhs`
  ADD CONSTRAINT `mhs_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`);

--
-- Ketidakleluasaan untuk tabel `minatdosen`
--
ALTER TABLE `minatdosen`
  ADD CONSTRAINT `minatdosen_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `minatdosen_ibfk_2` FOREIGN KEY (`id_bidangminat`) REFERENCES `bidangminat` (`id_bidangminat`);
--
-- Database: `db_latihandatabase`
--
CREATE DATABASE IF NOT EXISTS `db_latihandatabase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_latihandatabase`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata`
--

CREATE TABLE `biodata` (
  `id` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `catatan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `biodata`
--

INSERT INTO `biodata` (`id`, `nama`, `email`, `catatan`) VALUES
(1, 'Nandee', 'samnandanade87@gmail.com', '            awokawoakwommmmm'),
(2, 'haha', 'samna@gmail.com', 'hihihihiihi\r\n'),
(3, 'Nandee', 'samna@gmail.com', 'aaa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `mahasiswa`
--
CREATE DATABASE IF NOT EXISTS `mahasiswa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mahasiswa`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata`
--

CREATE TABLE `biodata` (
  `id` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` bigint(50) NOT NULL,
  `umur` int(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `asal_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `biodata`
--

INSERT INTO `biodata` (`id`, `nama`, `nim`, `umur`, `jenis_kelamin`, `prodi`, `jurusan`, `asal_kota`) VALUES
(4, 'Nandeeeeee', 230441100019, 20, 'laki laki', 'sistem informasi', 'teknik informatika', 'sumenep'),
(5, 'Nandee', 230441100019, 20, 'laki-laki', 'sistem informasi', 'teknik informatika', 'sumenep');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data untuk tabel `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"mahasiswa\",\"table\":\"biodata\"},{\"db\":\"db_latihandatabase\",\"table\":\"biodata\"}]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data untuk tabel `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-05-25 15:55:05', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"id\"}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indeks untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indeks untuk tabel `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indeks untuk tabel `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indeks untuk tabel `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indeks untuk tabel `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indeks untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indeks untuk tabel `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indeks untuk tabel `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indeks untuk tabel `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indeks untuk tabel `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
