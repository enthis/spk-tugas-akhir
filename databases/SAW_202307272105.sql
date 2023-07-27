﻿--
-- Script was generated by Devart dbForge Studio 2022 for MySQL, Version 9.1.21.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 27/07/2023 21:05:20
-- Server version: 10.3.39
-- Client version: 4.1
--

-- 
-- Disable foreign keys
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Set SQL mode
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

--
-- Set default database
--
USE enthisph_spk;

--
-- Drop table `user`
--
DROP TABLE IF EXISTS user;

--
-- Drop table `bobot_kriteria`
--
DROP TABLE IF EXISTS bobot_kriteria;

--
-- Drop table `hasil`
--
DROP TABLE IF EXISTS hasil;

--
-- Drop table `nilai_supplier`
--
DROP TABLE IF EXISTS nilai_supplier;

--
-- Drop table `jenis_barang`
--
DROP TABLE IF EXISTS jenis_barang;

--
-- Drop table `supplier`
--
DROP TABLE IF EXISTS supplier;

--
-- Drop table `nilai_kriteria`
--
DROP TABLE IF EXISTS nilai_kriteria;

--
-- Drop table `kriteria`
--
DROP TABLE IF EXISTS kriteria;

--
-- Set default database
--
USE enthisph_spk;

--
-- Create table `kriteria`
--
CREATE TABLE kriteria (
  id_kriteria int(3) NOT NULL AUTO_INCREMENT,
  namaKriteria varchar(30) NOT NULL,
  sifat enum ('Benefit', 'Cost') NOT NULL,
  PRIMARY KEY (id_kriteria)
)
ENGINE = INNODB,
AUTO_INCREMENT = 9,
AVG_ROW_LENGTH = 2730,
CHARACTER SET latin1,
COLLATE latin1_swedish_ci;

--
-- Create table `nilai_kriteria`
--
CREATE TABLE nilai_kriteria (
  id_nilaikriteria int(3) NOT NULL AUTO_INCREMENT,
  id_kriteria int(3) NOT NULL,
  nilai float NOT NULL,
  keterangan varchar(50) NOT NULL,
  PRIMARY KEY (id_nilaikriteria)
)
ENGINE = INNODB,
AUTO_INCREMENT = 33,
AVG_ROW_LENGTH = 712,
CHARACTER SET latin1,
COLLATE latin1_swedish_ci;

--
-- Create foreign key
--
ALTER TABLE nilai_kriteria
ADD CONSTRAINT nilai_kriteria_ibfk_1 FOREIGN KEY (id_kriteria)
REFERENCES kriteria (id_kriteria) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Create table `supplier`
--
CREATE TABLE supplier (
  id_supplier int(3) NOT NULL AUTO_INCREMENT,
  namaSupplier varchar(30) NOT NULL,
  PRIMARY KEY (id_supplier)
)
ENGINE = INNODB,
AUTO_INCREMENT = 9,
AVG_ROW_LENGTH = 5461,
CHARACTER SET latin1,
COLLATE latin1_swedish_ci;

--
-- Create table `jenis_barang`
--
CREATE TABLE jenis_barang (
  id_jenisbarang int(3) NOT NULL AUTO_INCREMENT,
  namaBarang varchar(30) NOT NULL,
  PRIMARY KEY (id_jenisbarang)
)
ENGINE = INNODB,
AUTO_INCREMENT = 3,
AVG_ROW_LENGTH = 16384,
CHARACTER SET latin1,
COLLATE latin1_swedish_ci;

--
-- Create table `nilai_supplier`
--
CREATE TABLE nilai_supplier (
  id_nilaisupplier int(3) NOT NULL AUTO_INCREMENT,
  id_supplier int(3) NOT NULL,
  id_jenisbarang int(3) NOT NULL,
  id_kriteria int(3) NOT NULL,
  id_nilaikriteria int(3) NOT NULL,
  PRIMARY KEY (id_nilaisupplier)
)
ENGINE = INNODB,
AUTO_INCREMENT = 45,
AVG_ROW_LENGTH = 910,
CHARACTER SET latin1,
COLLATE latin1_swedish_ci;

--
-- Create foreign key
--
ALTER TABLE nilai_supplier
ADD CONSTRAINT nilai_supplier_ibfk_1 FOREIGN KEY (id_jenisbarang)
REFERENCES jenis_barang (id_jenisbarang) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Create foreign key
--
ALTER TABLE nilai_supplier
ADD CONSTRAINT nilai_supplier_ibfk_2 FOREIGN KEY (id_kriteria)
REFERENCES kriteria (id_kriteria) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Create foreign key
--
ALTER TABLE nilai_supplier
ADD CONSTRAINT nilai_supplier_ibfk_3 FOREIGN KEY (id_supplier)
REFERENCES supplier (id_supplier) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Create foreign key
--
ALTER TABLE nilai_supplier
ADD CONSTRAINT nilai_supplier_ibfk_4 FOREIGN KEY (id_nilaikriteria)
REFERENCES nilai_kriteria (id_nilaikriteria) ON DELETE CASCADE;

--
-- Create table `hasil`
--
CREATE TABLE hasil (
  id_hasil int(3) NOT NULL AUTO_INCREMENT,
  id_jenisbarang int(3) NOT NULL,
  id_supplier int(3) NOT NULL,
  hasil float NOT NULL,
  PRIMARY KEY (id_hasil)
)
ENGINE = INNODB,
AUTO_INCREMENT = 3,
AVG_ROW_LENGTH = 4096,
CHARACTER SET latin1,
COLLATE latin1_swedish_ci;

--
-- Create foreign key
--
ALTER TABLE hasil
ADD CONSTRAINT hasil_ibfk_1 FOREIGN KEY (id_jenisbarang)
REFERENCES jenis_barang (id_jenisbarang) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Create foreign key
--
ALTER TABLE hasil
ADD CONSTRAINT hasil_ibfk_2 FOREIGN KEY (id_supplier)
REFERENCES supplier (id_supplier) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Create table `bobot_kriteria`
--
CREATE TABLE bobot_kriteria (
  id_bobotkriteria int(3) NOT NULL AUTO_INCREMENT,
  id_jenisbarang int(3) NOT NULL,
  id_kriteria int(3) NOT NULL,
  bobot float NOT NULL,
  PRIMARY KEY (id_bobotkriteria)
)
ENGINE = INNODB,
AUTO_INCREMENT = 20,
AVG_ROW_LENGTH = 1365,
CHARACTER SET latin1,
COLLATE latin1_swedish_ci;

--
-- Create foreign key
--
ALTER TABLE bobot_kriteria
ADD CONSTRAINT bobot_kriteria_ibfk_1 FOREIGN KEY (id_jenisbarang)
REFERENCES jenis_barang (id_jenisbarang) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Create foreign key
--
ALTER TABLE bobot_kriteria
ADD CONSTRAINT bobot_kriteria_ibfk_2 FOREIGN KEY (id_kriteria)
REFERENCES kriteria (id_kriteria) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Create table `user`
--
CREATE TABLE user (
  Id_admin int(3) NOT NULL AUTO_INCREMENT,
  username varchar(30) NOT NULL,
  password varchar(200) NOT NULL,
  PRIMARY KEY (Id_admin)
)
ENGINE = INNODB,
AUTO_INCREMENT = 3,
CHARACTER SET latin1,
COLLATE latin1_swedish_ci;

-- 
-- Dumping data for table kriteria
--
INSERT INTO kriteria VALUES
(1, 'Kecepatan Pengiriman', 'Benefit'),
(2, 'Tingkat Diskon', 'Benefit'),
(3, 'Pelayanan', 'Benefit'),
(4, 'Garansi', 'Benefit'),
(5, 'Keaslian Barang', 'Benefit'),
(6, 'Tempo Pembayaran', 'Benefit'),
(7, 'Harga', 'Cost'),
(8, 'Jarak', 'Benefit');

-- 
-- Dumping data for table nilai_kriteria
--
INSERT INTO nilai_kriteria VALUES
(5, 2, 0.25, '0 % (Tidak ada)'),
(6, 2, 0.5, '1% - 10%'),
(7, 2, 0.75, '11% - 20%'),
(8, 2, 1, '20 % lebih'),
(10, 3, 0, 'sangat buruk'),
(11, 3, 0.25, 'buruk'),
(12, 3, 0.5, 'cukup'),
(13, 3, 0.75, 'puas'),
(14, 4, 0.25, 'tidak ada'),
(15, 4, 0.5, 'kurang dari 1 tahun'),
(16, 4, 0.75, '1 tahun - 2 tahun'),
(17, 5, 0.5, 'KW'),
(18, 5, 1, 'Original / Asli'),
(19, 6, 0.25, 'Kurang dari 1 Minggu'),
(20, 6, 0.5, '1 minggu s/d 2 minggu'),
(21, 6, 0.75, '3 minggu s/d 4 minggu'),
(22, 1, 0.25, '1 Hari'),
(23, 1, 0.5, '2 hari - 7 hari'),
(24, 1, 0.75, '7 hari - 1 bulan'),
(25, 1, 1, '1 bulan lebih'),
(26, 3, 1, 'sangat memuaskan'),
(27, 4, 1, '2 tahun lebih'),
(28, 6, 1, '1 bulan lebih'),
(29, 7, 1, 'mahal'),
(30, 7, 0.75, 'sedang'),
(31, 8, 0.25, 'dekat'),
(32, 8, 0.25, 'lumayan dekat');

-- 
-- Dumping data for table supplier
--
INSERT INTO supplier VALUES
(6, 'CV. A'),
(7, 'CV. B'),
(8, 'CV. C');

-- 
-- Dumping data for table jenis_barang
--
INSERT INTO jenis_barang VALUES
(1, 'Pompa j'),
(2, 'kompas');

-- 
-- Dumping data for table user
--
INSERT INTO user VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'enthis', 'e10adc3949ba59abbe56e057f20f883e');

-- 
-- Dumping data for table nilai_supplier
--
INSERT INTO nilai_supplier VALUES
(19, 6, 1, 1, 23),
(20, 6, 1, 2, 6),
(21, 6, 1, 3, 13),
(22, 6, 1, 4, 16),
(23, 6, 1, 5, 18),
(24, 6, 1, 6, 20),
(25, 7, 1, 1, 23),
(26, 7, 1, 2, 7),
(27, 7, 1, 3, 13),
(28, 7, 1, 4, 15),
(29, 7, 1, 5, 18),
(30, 7, 1, 6, 21),
(37, 8, 2, 1, 22),
(38, 8, 2, 2, 5),
(39, 8, 2, 3, 10),
(40, 8, 2, 4, 14),
(41, 8, 2, 5, 17),
(42, 8, 2, 6, 28),
(43, 6, 1, 7, 29),
(44, 6, 1, 2, 6);

-- 
-- Dumping data for table hasil
--
INSERT INTO hasil VALUES
(1, 1, 6, 4.9175),
(2, 1, 7, 4.417);

-- 
-- Dumping data for table bobot_kriteria
--
INSERT INTO bobot_kriteria VALUES
(7, 1, 1, 0.5),
(8, 1, 2, 1),
(9, 1, 3, 0.75),
(10, 1, 4, 1),
(11, 1, 5, 1),
(12, 1, 6, 0.5),
(13, 2, 1, 1),
(14, 2, 2, 0.25),
(15, 2, 3, 0.75),
(16, 2, 4, 0),
(17, 2, 5, 0.5),
(18, 2, 6, 0.5),
(19, 2, 1, 0.5);

-- 
-- Restore previous SQL mode
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Enable foreign keys
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;