-- MariaDB dump 10.19  Distrib 10.4.20-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: uplatnica
-- ------------------------------------------------------
-- Server version	10.4.20-MariaDB

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
-- Table structure for table `sacuvane_uplatnice`
--

DROP TABLE IF EXISTS `sacuvane_uplatnice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sacuvane_uplatnice` (
  `id_uplate` int(11) NOT NULL AUTO_INCREMENT,
  `kod_uplatnice` varchar(255) NOT NULL,
  `su_id_uplatioca` int(11) NOT NULL,
  `su_uplatilac` varchar(255) NOT NULL,
  `su_svrha` varchar(255) NOT NULL,
  `su_primalac` varchar(255) NOT NULL,
  `su_sifra` int(3) NOT NULL,
  `su_valuta` varchar(3) NOT NULL,
  `su_iznos` varchar(12) NOT NULL,
  `su_racun_primaoca` varchar(25) NOT NULL,
  `su_model` varchar(5) NOT NULL,
  `su_poz_na_br` varchar(50) NOT NULL,
  `su_datum` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_uplate`),
  UNIQUE KEY `kod_uplatnice` (`kod_uplatnice`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `uplatilac`
--

DROP TABLE IF EXISTS `uplatilac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uplatilac` (
  `id_uplatioca` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email_uplatioca` varchar(75) NOT NULL,
  `password_uplatioca` varchar(255) NOT NULL,
  `ime_uplatioca` varchar(50) NOT NULL,
  `prezime_uplatioca` varchar(50) NOT NULL,
  `adresa_uplatioca` varchar(255) NOT NULL,
  `postanski_br_uplatioca` int(5) NOT NULL,
  `mesto_uplatioca` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(255) NOT NULL,
  PRIMARY KEY (`id_uplatioca`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-31  3:31:45
