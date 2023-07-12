/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.21-MariaDB : Database - onlinecourse
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`onlinecourse` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `onlinecourse`;

/*Table structure for table `kursus` */

DROP TABLE IF EXISTS `kursus`;

CREATE TABLE `kursus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(1000) DEFAULT NULL,
  `deskripsi` varchar(5000) DEFAULT NULL,
  `durasi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kursus` */

insert  into `kursus`(`id`,`judul`,`deskripsi`,`durasi`) values 
(2,'Belajar Python','Kursus Pemrograman Python adalah kursus yang dirancang untuk mempelajari bahasa pemrograman Python secara menyeluruh. Dalam kursus ini, Anda akan belajar tentang konsep dasar pemrograman, sintaks Python, dan pengembangan program menggunakan Python. Materi kursus mencakup struktur kontrol, tipe data, fungsi, pemrograman berorientasi objek, penanganan pengecualian, dan pemrograman web dengan Python. Setelah menyelesaikan kursus ini, Anda akan memiliki keterampilan untuk mengembangkan aplikasi desktop, web, dan sains data dengan menggunakan Python. Kursus Pemrograman Python membantu Anda memahami dasar-dasar pemrograman dan konsep pemrograman berorientasi objek. Anda akan belajar mengorganisasi dan mengelola kode, serta mengembangkan solusi perangkat lunak efisien dan efektif dengan Python. Kursus ini memberikan pemahaman yang kuat tentang pengembangan aplikasi dengan Python, serta keterampilan untuk memahami dan memodifikasi kode yang ada, menguji program, dan melakukan debugging.','360 menit'),
(3,'Belajar Java Script','Kursus Pemrograman JavaScript adalah kursus yang dirancang untuk mengajarkan Anda tentang bahasa pemrograman JavaScript dan penggunaannya dalam pengembangan web. Dalam kursus ini, Anda akan belajar tentang konsep dasar JavaScript, manipulasi DOM (Document Object Model), pengelolaan asinkron, pemrograman berorientasi objek, dan pemrograman web menggunakan kerangka kerja JavaScript seperti Node.js, React, dan Vue.js. Kursus ini akan memberikan keterampilan yang diperlukan untuk mengembangkan aplikasi web interaktif, mengelola elemen tampilan, mengatur alur program, dan mengintegrasikan logika bisnis dengan JavaScript, sehingga memungkinkan Anda untuk menjadi seorang pengembang web yang kompeten dan dapat membangun pengalaman pengguna yang kaya.','300 menit'),
(4,'Belajar Laravel','Kursus Pemrograman Laravel adalah kursus yang dirancang untuk mengajarkan Anda tentang kerangka kerja PHP Laravel yang populer dalam pengembangan aplikasi web. Dalam kursus ini, Anda akan mempelajari konsep dasar Laravel, seperti routing, pengelolaan database, model-view-controller (MVC), migrasi, dan interaksi dengan Eloquent ORM. Anda juga akan belajar tentang fitur-fitur lanjutan Laravel, termasuk autentikasi pengguna, pembuatan API, manajemen sesi, caching, dan pengujian. Kursus ini akan memberikan keterampilan yang diperlukan untuk membangun dan mengelola aplikasi web yang kuat dan aman dengan menggunakan Laravel, serta memahami praktik terbaik dalam pengembangan aplikasi web berbasis PHP.','200 menit');

/*Table structure for table `materi` */

DROP TABLE IF EXISTS `materi`;

CREATE TABLE `materi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(1000) DEFAULT NULL,
  `deskripsi` varchar(5000) DEFAULT NULL,
  `link` varchar(5000) DEFAULT NULL,
  `id_kursus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materi_ibfk_1` (`id_kursus`),
  CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

/*Data for the table `materi` */

insert  into `materi`(`id`,`judul`,`deskripsi`,`link`,`id_kursus`) values 
(7,'Materi Dasar Python','Materi dasar Python mencakup pengenalan tentang sintaks dasar, aturan penulisan kode, dan konsep dasar dalam bahasa pemrograman Python.','www.com',2),
(18,'Tipe Data dan Variabel','Pada topik tipe data dan variabel, Anda akan mempelajari berbagai jenis tipe data seperti angka, string, list, tuple, dan dictionary, serta bagaimana memanipulasinya.','www.com',2),
(19,'Struktur Kontrol dan Perulangan','Struktur kontrol dan perulangan meliputi penggunaan pernyataan kondisional seperti if-else, pengulangan menggunakan perulangan for dan while, serta pemahaman tentang logika program.','www.com',2),
(20,'Fungsi dan Modul','Fungsi dan modul membahas penggunaan fungsi yang membantu membagi kode menjadi bagian yang terpisah dan dapat digunakan kembali, serta penggunaan modul untuk mengorganisasi kode dan memperluas fungsionalitas dengan modul yang telah ada atau buatan sendiri.','www.com',2),
(22,'Manipulasi DOM','Manipulasi DOM (Document Object Model) melibatkan interaksi dengan elemen-elemen pada halaman web, seperti mengubah isi, atribut, atau gaya elemen.','www.com',3),
(24,'Tipe Data dan Variabel','Tipe data dan variabel mencakup pemahaman tentang berbagai jenis tipe data di JavaScript seperti angka, string, boolean, array, dan objek, serta cara memanipulasinya dan mendeklarasikan variabel.','www.com',3),
(25,'Pengenalan Java Script','Pengenalan JavaScript akan memberikan dasar-dasar bahasa pemrograman tersebut, termasuk sintaks dasar, variabel, operator, dan penggunaan objek.','www.com',3),
(26,'Struktur Kontrol dan Perulangan','Struktur kontrol dan perulangan membahas penggunaan pernyataan kondisional seperti if-else, dan pengulangan menggunakan perulangan for dan while untuk mengendalikan alur program. ','www.com',3),
(28,'Pengenalan Laravel','Mengenal kerangka kerja Laravel dan persiapan lingkungan pengembangan Laravel','www.com',4);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
