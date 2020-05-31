-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: coyoteriabase
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `IdAdmin` int(6) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(75) DEFAULT NULL,
  `Contrasena` varchar(77) DEFAULT NULL,
  PRIMARY KEY (`IdAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (2,'Supremo Todopoderoso','$2y$10$yGeT5iCzI.EdI5J3c9pP9uLC57iderMHZKUXGIL5mFckCcVBuKrni');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alimento`
--

DROP TABLE IF EXISTS `alimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alimento` (
  `NoSerie` int(12) NOT NULL,
  `Producto` varchar(30) DEFAULT NULL,
  `Precio` int(2) DEFAULT NULL,
  `Disponibilidad` int(2) DEFAULT NULL,
  `Imagen` text DEFAULT NULL,
  PRIMARY KEY (`NoSerie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alimento`
--

LOCK TABLES `alimento` WRITE;
/*!40000 ALTER TABLE `alimento` DISABLE KEYS */;
/*!40000 ALTER TABLE `alimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `NoCuenta` int(9) NOT NULL,
  `Nombre` varchar(75) DEFAULT NULL,
  `Grupo` int(3) NOT NULL,
  `contrasena` varchar(77) DEFAULT NULL,
  PRIMARY KEY (`NoCuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `IdCliente` int(6) NOT NULL AUTO_INCREMENT,
  `NoSeguridadSocial` int(11) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `NoCuenta` int(9) DEFAULT NULL,
  PRIMARY KEY (`IdCliente`),
  KEY `NoSeguridadSocial` (`NoSeguridadSocial`),
  KEY `RFC` (`RFC`),
  KEY `NoCuenta` (`NoCuenta`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`NoSeguridadSocial`) REFERENCES `trabajador` (`NoSeguridadSocial`),
  CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`RFC`) REFERENCES `profesor_funcionario` (`RFC`),
  CONSTRAINT `cliente_ibfk_3` FOREIGN KEY (`NoCuenta`) REFERENCES `alumno` (`NoCuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `NoPedido` int(6) NOT NULL AUTO_INCREMENT,
  `NoSerie` int(12) DEFAULT NULL,
  `Lugar` varchar(30) DEFAULT NULL,
  `Precio` int(2) DEFAULT NULL,
  `Sancion` varchar(50) DEFAULT NULL,
  `IdCliente` int(6) DEFAULT NULL,
  PRIMARY KEY (`NoPedido`),
  KEY `NoSerie` (`NoSerie`),
  KEY `IdCliente` (`IdCliente`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`NoSerie`) REFERENCES `alimento` (`NoSerie`),
  CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor_funcionario`
--

DROP TABLE IF EXISTS `profesor_funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesor_funcionario` (
  `RFC` varchar(13) NOT NULL,
  `Nombre` varchar(75) DEFAULT NULL,
  `Colegio` text DEFAULT NULL,
  `contrasena` varchar(77) DEFAULT NULL,
  PRIMARY KEY (`RFC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor_funcionario`
--

LOCK TABLES `profesor_funcionario` WRITE;
/*!40000 ALTER TABLE `profesor_funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `profesor_funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supervisor`
--

DROP TABLE IF EXISTS `supervisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supervisor` (
  `IdSupervisor` int(6) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(75) DEFAULT NULL,
  `Contrasena` varchar(77) DEFAULT NULL,
  PRIMARY KEY (`IdSupervisor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supervisor`
--

LOCK TABLES `supervisor` WRITE;
/*!40000 ALTER TABLE `supervisor` DISABLE KEYS */;
INSERT INTO `supervisor` VALUES (1,'Poderoso','$2y$10$SDNYf3QiVUcl1otIfs0zp..ZcTWhaFdoGTwfT4Lk1a5IjHOIf9CvS');
/*!40000 ALTER TABLE `supervisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajador`
--

DROP TABLE IF EXISTS `trabajador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajador` (
  `NoSeguridadSocial` int(11) NOT NULL,
  `Nombre` varchar(75) DEFAULT NULL,
  `contrasena` varchar(77) DEFAULT NULL,
  PRIMARY KEY (`NoSeguridadSocial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajador`
--

LOCK TABLES `trabajador` WRITE;
/*!40000 ALTER TABLE `trabajador` DISABLE KEYS */;
INSERT INTO `trabajador` VALUES (111111,'j5J6jgwsrpguzg4ALEuyyC1c2Bp9Djl7HzwVl1v/BKTKPpCaM20ZpWU+mG9fmTCn','$2y$10$UD11IjctijAATJiFdxhRNOJwaSqDTi3kEfsctWflgchvHntv3oLye'),(222222,'bmjEDjPOtYeozVIWUY3r/I0kq5aCDihzXhn/Ru7obJw=','$2y$10$4jhHxu9aKRJuzXZdmDSQOu0fTkB2StSMui3Mp9Cd3xek4nq1Uotr.'),(454545,'KbeBfZ354dpYn/ZEKeHyAN2NvoDEmF4OW42uzYxjYYc=','$2y$10$sxw6gfNjdczxyDXFbq1zj.0KJ3W4warL6ETHBQTuK6BCexAMlNhy6'),(777777,'d3CQx2dyCol/Ga/2CcTMShXPQkXNOrEbTngm+jU/oNoJLoe7TqVfdZFo3nw1QF8g','$2y$10$9LrHSuGrYKqf1Z7Eo/aRm.q8SqMtDBXupDbT/rnPPgKM8VvOjbQZq'),(999999,'GLKgo98Hbp4wAy6swXG/HRAEopiIBCiu+DHjqvl30Aw=','$2y$10$Jvkoeaxn5yjVOB5uoimt8.Jr00R/rlYsMFKzCBS5YvZT7qNNI3X1G');
/*!40000 ALTER TABLE `trabajador` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-30 20:20:05
