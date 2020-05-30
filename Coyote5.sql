-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: baseproductos
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
  `Nombre` varchar(30) NOT NULL,
  `Contrasena` varchar(16) NOT NULL,
  PRIMARY KEY (`IdAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
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
INSERT INTO `alimento` VALUES (1,'Cereal con leche',25,10,'\r'),(2,'Domo de fruta',25,10,'\r'),(3,'Yogurt para beber',12,10,'\r'),(4,'Yougurt  vaso',10,10,'\r'),(5,'Yakult',10,10,'\r'),(6,'Agua sabor vaso',12,10,'\r'),(7,'Agua de sabor/litro',22,10,'\r'),(8,'Agua embotellada 600ml',9,10,'\r'),(9,'Agua embotellada 1Lt',14,10,'\r'),(10,'Jugo de fruta vaso',18,10,'\r'),(11,'Jugo de fruta 1Lt',35,10,'\r'),(12,'Licuado vaso',20,10,'\r'),(13,'Licuado 1Lt',35,10,'\r'),(14,'Te',12,10,'\r'),(15,'Chocolate caliente',20,10,'\r'),(16,'Capuchino moka',20,10,'\r'),(17,'Capuchino vainilla',20,10,'\r'),(18,'Capuchino moka blanco',20,10,'\r'),(19,'Hamburguesa',30,10,'\r'),(20,'Hamburguesa con queso',35,10,'\r'),(21,'Hamburguesa hawaiana',40,10,'\r'),(22,'Molletes',30,10,'\r'),(23,'Sincronizadas',30,10,'\r'),(24,'Torta de jamon',25,10,'\r'),(25,'Torta de jamon con queso oaxac',32,10,'\r'),(26,'Sandwich de jamon con queso oa',30,10,'\r'),(27,'Sandwich de atun',35,10,'\r'),(28,'Baguel Jamon con philadelia',35,10,'\r'),(29,'Baguel de jamon serrano con Ph',45,10,'\r'),(30,'Bagel de salmon con Philadelpi',45,10,'\r'),(31,'Cuernitos de jamon con queso',25,10,'\r'),(32,'Pasta con jamon',30,10,'\r'),(33,'Pasta con pollo',30,10,'\r'),(34,'Pasta con atun',35,10,'\r'),(35,'Chilaquiles solos',25,10,'\r'),(36,'Chilaquiles con pollo',30,10,'\r'),(37,'MegaMan Pelushe',99,2,'https://gameplanet-53f8.kxcdn.com/media/catalog/product/cache/4/image/9df78eab33525d08d6e5fb8d27136e95/p/e/peluche-mega-man_1.jpg');
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
  `Nombre` varchar(30) NOT NULL,
  `Grupo` int(3) NOT NULL,
  `Contrasena` varchar(16) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `Nombre` varchar(30) NOT NULL,
  `Colegio` text DEFAULT NULL,
  `Contrasena` varchar(16) NOT NULL,
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
  `Nombre` varchar(30) NOT NULL,
  `Contrasena` varchar(16) NOT NULL,
  PRIMARY KEY (`IdSupervisor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supervisor`
--

LOCK TABLES `supervisor` WRITE;
/*!40000 ALTER TABLE `supervisor` DISABLE KEYS */;
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
  `Nombre` varchar(30) NOT NULL,
  `Contrasena` varchar(16) NOT NULL,
  PRIMARY KEY (`NoSeguridadSocial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajador`
--

LOCK TABLES `trabajador` WRITE;
/*!40000 ALTER TABLE `trabajador` DISABLE KEYS */;
/*!40000 ALTER TABLE `trabajador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `IdAdmin` int(6) DEFAULT NULL,
  `IdSupervisor` int(6) DEFAULT NULL,
  `IdCliente` int(6) DEFAULT NULL,
  KEY `IdAdmin` (`IdAdmin`),
  KEY `IdSupervisor` (`IdSupervisor`),
  KEY `IdCliente` (`IdCliente`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`IdAdmin`) REFERENCES `administrador` (`IdAdmin`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`IdSupervisor`) REFERENCES `supervisor` (`IdSupervisor`),
  CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-26 20:34:35
