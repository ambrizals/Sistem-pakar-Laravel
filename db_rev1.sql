/*
SQLyog Community v13.1.1 (32 bit)
MySQL - 10.1.35-MariaDB : Database - project_ai
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`project_ai` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `project_ai`;

/*Table structure for table `daerahgejala` */

DROP TABLE IF EXISTS `daerahgejala`;

CREATE TABLE `daerahgejala` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `daerah_gejala` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `daerahgejala` */

insert  into `daerahgejala`(`id`,`daerah_gejala`,`created_at`,`updated_at`) values 
(1,'akar','2019-01-25 03:03:22','2019-01-25 03:03:22'),
(2,'batang','2019-01-25 03:03:22','2019-01-25 03:03:22'),
(3,'Daun','2019-01-25 03:03:22','2019-01-25 03:03:22'),
(4,'buah/umbi','2019-01-25 03:03:22','2019-01-25 03:03:22'),
(5,'bunga','2019-01-25 03:03:22','2019-01-25 03:03:22'),
(6,'biji','2019-01-25 03:03:22','2019-01-25 03:03:22');

/*Table structure for table `gejala` */

DROP TABLE IF EXISTS `gejala`;

CREATE TABLE `gejala` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tanaman` int(10) unsigned NOT NULL,
  `daerah_gejala` int(10) unsigned NOT NULL,
  `nama_gejala` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gejala_tanaman_foreign` (`tanaman`),
  KEY `gejala_daerah_gejala_foreign` (`daerah_gejala`),
  CONSTRAINT `gejala_daerah_gejala_foreign` FOREIGN KEY (`daerah_gejala`) REFERENCES `daerahgejala` (`id`),
  CONSTRAINT `gejala_tanaman_foreign` FOREIGN KEY (`tanaman`) REFERENCES `tanaman` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `gejala` */

insert  into `gejala`(`id`,`tanaman`,`daerah_gejala`,`nama_gejala`,`created_at`,`updated_at`) values 
(1,2,2,'Pangkal batang menunjukkan bekas gigitan ulat','2019-01-25 03:03:22','2019-01-25 03:03:22'),
(2,2,2,'Pangkai batang terpotong - potong','2019-01-25 03:03:22','2019-01-25 03:03:22'),
(3,2,2,'Batang Rebah','2019-01-25 03:03:22','2019-01-25 03:03:22'),
(4,2,2,'Batang Rusak dan Berceceran','2019-01-25 03:03:22','2019-01-25 03:03:22'),
(5,2,4,'Umbi Membusuk','2019-01-25 03:09:34','2019-01-25 03:09:34'),
(6,2,4,'jaringan umbi mengering','2019-01-25 03:10:14','2019-01-25 03:10:14'),
(7,2,3,'daun terdapat bercak melekuk','2019-01-25 03:10:50','2019-01-25 03:10:50'),
(8,2,3,'Bercak daun berwarna putih atau kelabu','2019-01-25 03:12:11','2019-01-25 03:12:11'),
(9,2,3,'Bercak daun memebentuk zona berwarna ungu jika sudah parah','2019-01-25 03:13:33','2019-01-25 03:13:33'),
(10,2,3,'Ujung daun kering','2019-01-25 03:13:56','2019-01-25 03:13:56'),
(11,2,2,'Tanaman kerdil','2019-01-25 03:24:20','2019-01-25 03:24:20'),
(12,2,4,'Umbi berkerut','2019-01-25 03:25:00','2019-01-25 03:25:00'),
(13,2,4,'Umbi berwarna kecoklatan','2019-01-25 03:25:20','2019-01-25 03:25:20'),
(14,2,4,'Bagian umbi dalam tampak kering dan pucat','2019-01-25 03:25:43','2019-01-25 03:25:43'),
(15,2,3,'Ujung daun terdapat bercak hijau pucat','2019-01-25 03:26:03','2019-01-25 03:26:03'),
(16,2,3,'Terdapat miselium dan spora pada bercak daun','2019-01-25 03:26:24','2019-01-25 03:26:24'),
(17,2,3,'Bercak daun bulat dan memanjang','2019-01-25 03:27:32','2019-01-25 03:27:32'),
(18,2,3,'Bercak daun berwarna coklat dengan tepi menguning','2019-01-25 03:27:53','2019-01-25 03:27:53'),
(19,2,3,'Jumlah bercak terbanyak pada ujung daun','2019-01-25 03:28:11','2019-01-25 03:28:11'),
(20,2,3,'jaringan pada bercak daun mati','2019-01-25 03:28:30','2019-01-25 03:28:30');

/*Table structure for table `gejala_penyakit` */

DROP TABLE IF EXISTS `gejala_penyakit`;

CREATE TABLE `gejala_penyakit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gejala` int(10) unsigned NOT NULL,
  `penyakit` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gejala_penyakit_gejala_foreign` (`gejala`),
  KEY `gejala_penyakit_penyakit_foreign` (`penyakit`),
  CONSTRAINT `gejala_penyakit_gejala_foreign` FOREIGN KEY (`gejala`) REFERENCES `gejala` (`id`),
  CONSTRAINT `gejala_penyakit_penyakit_foreign` FOREIGN KEY (`penyakit`) REFERENCES `penyakit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `gejala_penyakit` */

insert  into `gejala_penyakit`(`id`,`gejala`,`penyakit`,`created_at`,`updated_at`) values 
(1,5,1,'2019-01-25 03:09:34','2019-01-25 03:09:34'),
(2,6,1,'2019-01-25 03:10:14','2019-01-25 03:10:14'),
(3,7,1,'2019-01-25 03:10:50','2019-01-25 03:10:50'),
(4,8,1,'2019-01-25 03:12:11','2019-01-25 03:12:11'),
(5,9,1,'2019-01-25 03:13:33','2019-01-25 03:13:33'),
(6,10,1,'2019-01-25 03:13:56','2019-01-25 03:13:56'),
(7,11,3,'2019-01-25 03:24:20','2019-01-25 03:24:20'),
(8,5,3,'2019-01-25 03:24:42','2019-01-25 03:24:42'),
(9,12,3,'2019-01-25 03:25:00','2019-01-25 03:25:00'),
(10,13,3,'2019-01-25 03:25:20','2019-01-25 03:25:20'),
(11,14,3,'2019-01-25 03:25:43','2019-01-25 03:25:43'),
(12,15,3,'2019-01-25 03:26:03','2019-01-25 03:26:03'),
(13,16,3,'2019-01-25 03:26:24','2019-01-25 03:26:24'),
(14,17,4,'2019-01-25 03:27:32','2019-01-25 03:27:32'),
(15,18,4,'2019-01-25 03:27:53','2019-01-25 03:27:53'),
(16,19,4,'2019-01-25 03:28:11','2019-01-25 03:28:11'),
(17,20,4,'2019-01-25 03:28:30','2019-01-25 03:28:30');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_01_15_044950_create_tanaman_table',1),
(4,'2019_01_15_045020_create_penyakit_table',1),
(5,'2019_01_15_050444_create_daerah_gejala',1),
(6,'2019_01_15_050557_create_gejala_table',1),
(7,'2019_01_21_112407_create_gejala_penyakit',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `penyakit` */

DROP TABLE IF EXISTS `penyakit`;

CREATE TABLE `penyakit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tanaman` int(10) unsigned NOT NULL,
  `nama_penyakit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kulturteknis` text COLLATE utf8_unicode_ci,
  `fisikmekanis` text COLLATE utf8_unicode_ci,
  `kimiawi` text COLLATE utf8_unicode_ci,
  `hayati` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penyakit_tanaman_foreign` (`tanaman`),
  CONSTRAINT `penyakit_tanaman_foreign` FOREIGN KEY (`tanaman`) REFERENCES `tanaman` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `penyakit` */

insert  into `penyakit`(`id`,`tanaman`,`nama_penyakit`,`kulturteknis`,`fisikmekanis`,`kimiawi`,`hayati`,`created_at`,`updated_at`) values 
(1,2,'Penyakit Trotol, Bercak Ungu (Purple blotch)','','Pencelupan bibit umbi maksimal 3 menit dalam larutan agens hayati \nPseudomonas fluorescens (Pf) dosis 1 ml/l air dengan kepadatan populasi ??? \n109.','Jika ambang pengendalian bercak ungu telah mencapai (AP penyakit \nbercak ungu adalah jika kerusakan daun sebesar 10 % pertanaman contoh) \nlakukan penyemprotan dengan fungisida efektif yang terdaftar dan diizinkan \noleh Menteri Pertanian, seperti : Agrokol 70 WP, Alterna 90 WP, Bazoka \n450 SC, Daconil 500 F, Fitozeb 80 WP, Nustar 400 EC, Oktanil 75 WP, \nPromidon 50 WP, Solid 60 WP, Tonikur 250 EC, Tropicol 82 WP, Ziflo 76 \nWG dan lain-lain. Adapun waktu penyemprotan paling baik sore hari. ','','2019-01-25 03:03:22','2019-01-25 03:03:22'),
(3,2,'Penyakit Embun Buluk/Tepung Palsu (Downy mildew)','a. Mencegah menanam bawang merah di sekitar area serangan atau bekas \r\ntanah/area terserang, penggunaan bibit umbi dari tanaman yang sehat, \r\nmengadakan pergiliran tanaman pada areal serangan selama 3 tahun. \r\nb. Penggunaan pupuk yang berimbang, karena penggunaan pupuk N yang \r\nberlebih dapat mengakibatkan tanaman menjadi sekulen karena \r\nbertambahnya ukuran sel yang tipis, sehingga mudah terserang penyakit. \r\nc. Menghindari kelembaban tinggi dengan perbaikan drainase tanah dan \r\nsanitasi/membakar sisa tanaman sesudah panen.','Perendaman bibit umbi maksimal 3 menit dalam larutan agens hayati \r\nPseudomonas fluorescens (Pf) dosis 1 ml/l air dengan kepadatan populasi ? \r\n109.','Penggunaan agens hayati (semprotkan 10 cc Pf/l air 1-2 kali/minggu \r\ndengan kepadatan populasi ? 109 dan volume semprot 500 l/ha) atau \r\nfungisida yang terdaftar dan diizinkan oleh Menteri Pertanian pada awal \r\nmunculnya gejala, seperti : Daconil 75 WP atau Folirfos 400 AS.',NULL,'2019-01-25 03:23:01','2019-01-25 03:23:01'),
(4,2,'Penyakit Bercak daun Cercospora (Cercospora leaf Spot)','Menggunakan bibit umbi dari tanaman yang sehat, melakukan sanitasi \r\nlapangan secara cermat dan mengurangi suhu pada kelembaban kebun.','Memotong daun yang terserang dan memusnahkannya.','Menggunakan fungisida efektif yang terdaftar dan diizinkan oleh \r\nMenteri Pertanian, seperti : Benhasil 50 WP dan Colanta 70 WP.',NULL,'2019-01-25 03:23:41','2019-01-25 03:23:41');

/*Table structure for table `tanaman` */

DROP TABLE IF EXISTS `tanaman`;

CREATE TABLE `tanaman` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tanaman` */

insert  into `tanaman`(`id`,`nama`,`created_at`,`updated_at`) values 
(1,'Cabai','2019-01-25 03:03:22','2019-01-25 03:03:22'),
(2,'Bawang','2019-01-25 03:03:22','2019-01-25 03:03:22');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'admin','admin@localhost.com',NULL,'$2y$10$4dQ.sNC72poRP6Vvaz1.ZeQxoV2qnncolzND07BUsPUwyVuj2sDo.',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
