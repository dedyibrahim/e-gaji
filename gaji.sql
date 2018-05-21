-- MySQL dump 10.13  Distrib 5.7.22, for Linux (i686)
--
-- Host: localhost    Database: E-gaji
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `data_pendapatan`
--

DROP TABLE IF EXISTS `data_pendapatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_pendapatan` (
  `id_data_pendapatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` varchar(100) NOT NULL,
  `id_pendapatan` varchar(100) NOT NULL,
  `keuntungan` varchar(100) NOT NULL,
  `keuntungan_karyawan` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id_data_pendapatan`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_pendapatan`
--

LOCK TABLES `data_pendapatan` WRITE;
/*!40000 ALTER TABLE `data_pendapatan` DISABLE KEYS */;
INSERT INTO `data_pendapatan` VALUES (1,'1','0','15000000','3000000',''),(2,'2','0','15000000','3000000',''),(3,'3','0','15000000','3000000',''),(4,'4','0','15000000','3000000',''),(5,'5','0','15000000','3000000',''),(6,'1','1','37500','7500',''),(7,'2','1','37500','7500',''),(8,'3','1','37500','7500',''),(9,'4','1','37500','7500',''),(10,'5','1','37500','7500',''),(11,'1','2','37500','6250',''),(12,'2','2','37500','6250',''),(13,'3','2','37500','6250',''),(14,'4','2','37500','6250',''),(15,'5','2','37500','6250',''),(16,'6','2','37500','6250',''),(17,'1','3','112500','18750',''),(18,'2','3','112500','18750',''),(19,'3','3','112500','18750',''),(20,'4','3','112500','18750',''),(21,'5','3','112500','18750',''),(22,'6','3','112500','18750','');
/*!40000 ALTER TABLE `data_pendapatan` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `penambahan_saldo` AFTER INSERT ON `data_pendapatan` FOR EACH ROW BEGIN 
   UPDATE karyawan SET saldo=saldo+NEW.keuntungan_karyawan   WHERE id_karyawan = NEW.id_karyawan;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `data_pendapatan_perusahaan`
--

DROP TABLE IF EXISTS `data_pendapatan_perusahaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_pendapatan_perusahaan` (
  `id_data_pendapatan_perusahaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pendapatan` varchar(100) NOT NULL,
  `pendapatan` varchar(100) NOT NULL,
  `keuntungan` varchar(100) NOT NULL,
  `keuntungan_bersih` varchar(100) NOT NULL,
  `keterangan_pendapatan` text NOT NULL,
  PRIMARY KEY (`id_data_pendapatan_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_pendapatan_perusahaan`
--

LOCK TABLES `data_pendapatan_perusahaan` WRITE;
/*!40000 ALTER TABLE `data_pendapatan_perusahaan` DISABLE KEYS */;
INSERT INTO `data_pendapatan_perusahaan` VALUES (1,'0','100000000','15000000','85000000','penjualan ganja'),(2,'1','250000','37500','212500','penjualan narkoba'),(3,'2','250000','37500','212500','penjualan rumah'),(4,'3','750000','112500','637500','penjualan ganja');
/*!40000 ALTER TABLE `data_pendapatan_perusahaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `id_pendapatan`
--

DROP TABLE IF EXISTS `id_pendapatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `id_pendapatan` (
  `id_pendapatan` int(11) NOT NULL AUTO_INCREMENT,
  `pendapatan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pendapatan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `id_pendapatan`
--

LOCK TABLES `id_pendapatan` WRITE;
/*!40000 ALTER TABLE `id_pendapatan` DISABLE KEYS */;
INSERT INTO `id_pendapatan` VALUES (1,'0'),(2,'1'),(3,'2'),(4,'3');
/*!40000 ALTER TABLE `id_pendapatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `karyawan`
--

DROP TABLE IF EXISTS `karyawan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_karyawan` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `saldo` decimal(10,0) NOT NULL,
  `level` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `karyawan`
--

LOCK TABLES `karyawan` WRITE;
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;
INSERT INTO `karyawan` VALUES (1,'Dedi ','Komisaris','dedi@gmail.com','21232f297a57a5a743894a0e4a801fc3',3032500,'Karyawan','Aktif','Koala.jpg','2018-05-20 13:23:20'),(2,'Jumas','Dirut','jumas@gmail.com','21232f297a57a5a743894a0e4a801fc3',3032500,'Karyawan','Aktif','Koala.jpg','2018-05-20 13:23:20'),(3,'Roni','IT Saff','roni@gmail.com','21232f297a57a5a743894a0e4a801fc3',3032500,'Karyawan','Aktif','Koala.jpg','2018-05-20 13:23:20'),(4,'Laras','IT Saff','laras@gmail.com','21232f297a57a5a743894a0e4a801fc3',3032500,'Karyawan','Aktif','Koala.jpg','2018-05-20 13:23:20'),(5,'Sandi','Marketing','sandi@gmail.com','21232f297a57a5a743894a0e4a801fc3',3032500,'Karyawan','Aktif','Koala.jpg','2018-05-20 13:23:20'),(6,'Komar','Staf','komar@gmail.com','21232f297a57a5a743894a0e4a801fc3',25000,'Karyawan','Aktif','Koala.jpg','2018-05-20 13:23:20');
/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `saldo_perusahaan` decimal(65,0) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Dedy ibrahim','dedi_ibrahim@niagara.co.id','21232f297a57a5a743894a0e4a801fc3','aktif','Admin','Koala.jpg','2018-05-16 12:53:00',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-21 11:47:50
