-- MySQL dump 10.13  Distrib 8.0.35, for Linux (x86_64)
--
-- Host: localhost    Database: Juegalmi
-- ------------------------------------------------------
-- Server version	8.0.35-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Alquiler`
--

DROP TABLE IF EXISTS `Alquiler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Alquiler` (
  `id_alquiler` int NOT NULL AUTO_INCREMENT,
  `fecha_fin` date DEFAULT NULL,
  `devuelto` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_alquiler`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Alquiler`
--

LOCK TABLES `Alquiler` WRITE;
/*!40000 ALTER TABLE `Alquiler` DISABLE KEYS */;
INSERT INTO `Alquiler` VALUES (1,'2023-11-10',0),(2,'2023-11-20',1),(3,'2023-11-15',1);
/*!40000 ALTER TABLE `Alquiler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Consola`
--

DROP TABLE IF EXISTS `Consola`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Consola` (
  `id_consola` int NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_consola`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Consola`
--

LOCK TABLES `Consola` WRITE;
/*!40000 ALTER TABLE `Consola` DISABLE KEYS */;
INSERT INTO `Consola` VALUES (5,'Sony','Play Station 5');
/*!40000 ALTER TABLE `Consola` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Juego`
--

DROP TABLE IF EXISTS `Juego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Juego` (
  `id_juego` int NOT NULL AUTO_INCREMENT,
  `desarrollador` varchar(50) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_juego`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Juego`
--

LOCK TABLES `Juego` WRITE;
/*!40000 ALTER TABLE `Juego` DISABLE KEYS */;
INSERT INTO `Juego` VALUES (4,'CD Projekt Red','genero','The Witcher 3: Wild Hunt'),(5,'Nintendo','genero','Super Mario Odyssey'),(6,'EA Sports','genero','FIFA 22');
/*!40000 ALTER TABLE `Juego` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Marca_movil`
--

DROP TABLE IF EXISTS `Marca_movil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Marca_movil` (
  `id_marca_movil` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_marca_movil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Marca_movil`
--

LOCK TABLES `Marca_movil` WRITE;
/*!40000 ALTER TABLE `Marca_movil` DISABLE KEYS */;
INSERT INTO `Marca_movil` VALUES (4,'Samsung'),(5,'Apple'),(6,'Google');
/*!40000 ALTER TABLE `Marca_movil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Marca_tablets`
--

DROP TABLE IF EXISTS `Marca_tablets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Marca_tablets` (
  `id_marca_tablets` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_marca_tablets`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Marca_tablets`
--

LOCK TABLES `Marca_tablets` WRITE;
/*!40000 ALTER TABLE `Marca_tablets` DISABLE KEYS */;
INSERT INTO `Marca_tablets` VALUES (1,'Samsung'),(2,'Apple'),(3,'Lenovo');
/*!40000 ALTER TABLE `Marca_tablets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Movil`
--

DROP TABLE IF EXISTS `Movil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Movil` (
  `id_movil` int NOT NULL AUTO_INCREMENT,
  `modelo` varchar(50) DEFAULT NULL,
  `id_marca_movil` int DEFAULT NULL,
  PRIMARY KEY (`id_movil`),
  KEY `id_marca_movil` (`id_marca_movil`),
  CONSTRAINT `Movil_ibfk_1` FOREIGN KEY (`id_marca_movil`) REFERENCES `Marca_movil` (`id_marca_movil`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Movil`
--

LOCK TABLES `Movil` WRITE;
/*!40000 ALTER TABLE `Movil` DISABLE KEYS */;
INSERT INTO `Movil` VALUES (11,'iphone 14',5),(12,'pixel 6',6),(13,'iphone 13',5),(14,'S23',4);
/*!40000 ALTER TABLE `Movil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Producto`
--

DROP TABLE IF EXISTS `Producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Producto` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `id_juego` int DEFAULT NULL,
  `id_consola` int DEFAULT NULL,
  `id_tablets` int DEFAULT NULL,
  `id_movil` int DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `foto` varchar(1000) DEFAULT NULL,
  `precio` int DEFAULT NULL,
  `info` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_juego` (`id_juego`),
  KEY `id_consola` (`id_consola`),
  KEY `id_tablets` (`id_tablets`),
  KEY `id_movil` (`id_movil`),
  CONSTRAINT `Producto_ibfk_1` FOREIGN KEY (`id_juego`) REFERENCES `Juego` (`id_juego`),
  CONSTRAINT `Producto_ibfk_2` FOREIGN KEY (`id_consola`) REFERENCES `Consola` (`id_consola`),
  CONSTRAINT `Producto_ibfk_3` FOREIGN KEY (`id_tablets`) REFERENCES `Tablets` (`id_tablets`),
  CONSTRAINT `Producto_ibfk_4` FOREIGN KEY (`id_movil`) REFERENCES `Movil` (`id_movil`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Producto`
--

LOCK TABLES `Producto` WRITE;
/*!40000 ALTER TABLE `Producto` DISABLE KEYS */;
INSERT INTO `Producto` VALUES (4,NULL,NULL,NULL,11,0,'https://m.media-amazon.com/images/I/61bK6PMOC3L._AC_UF894,1000_QL80_.jpg',NULL,NULL),(5,NULL,NULL,NULL,12,80,'https://m.media-amazon.com/images/I/717r0svNBML._AC_UF894,1000_QL80_.jpg',NULL,NULL),(6,NULL,NULL,NULL,13,80,'https://m.media-amazon.com/images/I/71iIaQjJunL._AC_UF894,1000_QL80_.jpg',NULL,NULL),(7,NULL,NULL,NULL,14,80,'https://cdn.grupoelcorteingles.es/SGFM/dctm/MEDIA03/202301/30/00157063605778009_2__640x640.jpg',NULL,NULL),(8,NULL,5,NULL,NULL,50,'https://m.media-amazon.com/images/I/51f6iZlNnvL.jpg',520,NULL),(9,NULL,NULL,4,NULL,150,'https://m.media-amazon.com/images/I/61YY3z1XkaS.jpg',530,NULL),(10,NULL,NULL,5,NULL,180,'https://m.media-amazon.com/images/I/81c+9BOQNWL._AC_UF894,1000_QL80_.jpg',1200,NULL),(11,NULL,NULL,6,NULL,0,'https://m.media-amazon.com/images/I/71w9ei3xPcL._AC_UF894,1000_QL80_.jpg',275,NULL),(12,4,NULL,NULL,NULL,0,'https://image.api.playstation.com/vulcan/ap/rnd/202211/0714/S1jCzktWD7XJSRkz4kNYNVM0.png',30,NULL),(13,5,NULL,NULL,NULL,77,'https://m.media-amazon.com/images/I/71XZsDkAuNL._AC_UF894,1000_QL80_.jpg',50,NULL),(14,6,NULL,NULL,NULL,30,'https://m.media-amazon.com/images/I/81Uw-GLys4L._AC_UF894,1000_QL80_.jpg',60,NULL);
/*!40000 ALTER TABLE `Producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Producto_Servicio`
--

DROP TABLE IF EXISTS `Producto_Servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Producto_Servicio` (
  `id_producto_servicio` int NOT NULL AUTO_INCREMENT,
  `id_producto` int DEFAULT NULL,
  `id_servicio` int DEFAULT NULL,
  `precio_fin` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_producto_servicio`),
  KEY `id_servicio` (`id_servicio`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `Producto_Servicio_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `Servicio` (`id_servicio`),
  CONSTRAINT `Producto_Servicio_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `Producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Producto_Servicio`
--

LOCK TABLES `Producto_Servicio` WRITE;
/*!40000 ALTER TABLE `Producto_Servicio` DISABLE KEYS */;
INSERT INTO `Producto_Servicio` VALUES (4,11,9,30,'2020-02-20');
/*!40000 ALTER TABLE `Producto_Servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Reparacion`
--

DROP TABLE IF EXISTS `Reparacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Reparacion` (
  `id_reparacion` int NOT NULL AUTO_INCREMENT,
  `motivo` varchar(150) DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `id_tipo_reparacion` int DEFAULT NULL,
  PRIMARY KEY (`id_reparacion`),
  KEY `id_tipo_reparacion` (`id_tipo_reparacion`),
  CONSTRAINT `Reparacion_ibfk_1` FOREIGN KEY (`id_tipo_reparacion`) REFERENCES `Tipo_reparacion` (`id_tipo_reparacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reparacion`
--

LOCK TABLES `Reparacion` WRITE;
/*!40000 ALTER TABLE `Reparacion` DISABLE KEYS */;
INSERT INTO `Reparacion` VALUES (1,'Pantalla rota','2023-10-30',1),(2,'Problemas de carga','2023-11-15',2),(3,'Actualización de software','2023-11-05',3);
/*!40000 ALTER TABLE `Reparacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Servicio`
--

DROP TABLE IF EXISTS `Servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Servicio` (
  `id_servicio` int NOT NULL AUTO_INCREMENT,
  `id_alquiler` int DEFAULT NULL,
  `id_venta` int DEFAULT NULL,
  `id_reparacion` int DEFAULT NULL,
  PRIMARY KEY (`id_servicio`),
  KEY `id_alquiler` (`id_alquiler`),
  KEY `id_reparacion` (`id_reparacion`),
  KEY `id_venta` (`id_venta`),
  CONSTRAINT `Servicio_ibfk_1` FOREIGN KEY (`id_alquiler`) REFERENCES `Alquiler` (`id_alquiler`),
  CONSTRAINT `Servicio_ibfk_2` FOREIGN KEY (`id_reparacion`) REFERENCES `Reparacion` (`id_reparacion`),
  CONSTRAINT `Servicio_ibfk_3` FOREIGN KEY (`id_venta`) REFERENCES `Venta` (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Servicio`
--

LOCK TABLES `Servicio` WRITE;
/*!40000 ALTER TABLE `Servicio` DISABLE KEYS */;
INSERT INTO `Servicio` VALUES (1,1,3,2),(2,2,1,1),(3,3,2,3),(4,NULL,5,NULL),(5,NULL,6,NULL),(6,NULL,7,NULL),(7,NULL,8,NULL),(8,NULL,9,NULL),(9,NULL,10,NULL);
/*!40000 ALTER TABLE `Servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Servicio_Usuario`
--

DROP TABLE IF EXISTS `Servicio_Usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Servicio_Usuario` (
  `id_servicio_usuario` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `id_servicio` int DEFAULT NULL,
  PRIMARY KEY (`id_servicio_usuario`),
  KEY `id_servicio` (`id_servicio`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `Servicio_Usuario_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `Servicio` (`id_servicio`),
  CONSTRAINT `Servicio_Usuario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Servicio_Usuario`
--

LOCK TABLES `Servicio_Usuario` WRITE;
/*!40000 ALTER TABLE `Servicio_Usuario` DISABLE KEYS */;
INSERT INTO `Servicio_Usuario` VALUES (4,8,9);
/*!40000 ALTER TABLE `Servicio_Usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tablets`
--

DROP TABLE IF EXISTS `Tablets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Tablets` (
  `id_tablets` int NOT NULL AUTO_INCREMENT,
  `modelo` varchar(50) DEFAULT NULL,
  `id_marca_tablets` int DEFAULT NULL,
  PRIMARY KEY (`id_tablets`),
  KEY `id_marca_tablets` (`id_marca_tablets`),
  CONSTRAINT `Tablets_ibfk_1` FOREIGN KEY (`id_marca_tablets`) REFERENCES `Marca_tablets` (`id_marca_tablets`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tablets`
--

LOCK TABLES `Tablets` WRITE;
/*!40000 ALTER TABLE `Tablets` DISABLE KEYS */;
INSERT INTO `Tablets` VALUES (4,'Galaxy Tab S7',1),(5,'iPad Pro',2),(6,'Tab P11',3);
/*!40000 ALTER TABLE `Tablets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tipo_reparacion`
--

DROP TABLE IF EXISTS `Tipo_reparacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Tipo_reparacion` (
  `id_tipo_reparacion` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_reparacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tipo_reparacion`
--

LOCK TABLES `Tipo_reparacion` WRITE;
/*!40000 ALTER TABLE `Tipo_reparacion` DISABLE KEYS */;
INSERT INTO `Tipo_reparacion` VALUES (1,'Reparación de pantalla'),(2,'Reparación de batería'),(3,'Reparación de software');
/*!40000 ALTER TABLE `Tipo_reparacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(150) DEFAULT NULL,
  `dni` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `foto` blob,
  `localizacion` varchar(150) DEFAULT NULL,
  `roles` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario`
--

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;
INSERT INTO `Usuario` VALUES (7,'asel',NULL,NULL,'$2y$13$FJhZu6dk.ir414x7v36KbO0.TFUEsisNdrBhD/q8M9A7delq6Ou4q',NULL,NULL,'ROLE_ADMIN'),(8,'lucia','1234567A','lucia','$2y$13$IL0BKiQ4DMFFHwFWwnFvxuWGzAwW80nTDTndIvLAkHmg1rLu0B5aK',NULL,NULL,'ROLE_ADMIN'),(9,'usu','123678A','sds','$2y$13$KTliOdwwnw6mZwbnYXVhFuFFZQ7VNXQu9Kos.e/ARuNkm8RHGqdAK',NULL,NULL,'ROLE_ADMIN'),(10,NULL,NULL,NULL,'$2y$13$hJ.TMxGtzCteDG4WO6Rbn.Nzp4KWPIJs7F6AMEAi06rf1XmnJFoQ.',NULL,NULL,NULL),(11,'asel',NULL,'asel','$2y$13$nfwSja1VSTIV.etC3FScoOjn/jZE7V/RAG8/wp0sdzIme/41kCfpi',NULL,NULL,'ROLE_USER'),(12,'ivan','1234567A','ivan','$2y$13$0RZlsyREDKvPjLjkFKAkNOIi7EilVqZEGVEivHI6b7nkfHKlA0C/.',NULL,NULL,'ROLE_USER'),(13,'Hola','1234547A','Hola','$2y$13$YJRs9YWO75jEEtRBiRtrFeKsK4k2whSjvSie9NhF7ZGYUuUsL9t0O',NULL,NULL,'ROLE_USER'),(14,'Paco','1234547A','Hola','$2y$13$4vjEG0hUHlW2EiQZ1av.luc7quaj.DiWXz5iH7LN2RG8A1y1AdG36',NULL,NULL,'ROLE_USER'),(15,'asd','asdfgh1','asd','$2y$13$yB2VTg6YEBe3oThWoYyFuugrwJQqe1OlbrijZvJu48WvIwg.4RFGK',NULL,NULL,'ROLE_USER'),(16,'Aimar756','Aimar','543645','$2y$13$s8d04F0KTS8.cenAnH8Qq.Evv5rBPH6D865MGi6JxzmjrC.o8Jpb.',NULL,NULL,'ROLE_USER'),(17,'Turbosapo','454647E','Ivan','$2y$13$ECoXybJdm6b7GKwziyvHKeens9lKEEunrIi5tU9BS80Ktp7EuSdje',NULL,NULL,'ROLE_USER'),(18,'Paco_Chocolatero','Paco','978978n','$2y$13$7J0IwtRiBpOUh9fAGkTQWOU6X41bg/ohVaZVPAWlCZpvAin0rK/Fa',NULL,NULL,'ROLE_USER'),(19,'Aurelio675','Aurelio','57578','$2y$13$SX0G.WuGFV1Hc6/as5ZTButLX/Z8NoVbGNihvsffT3HNDtkOjC4Iy',NULL,NULL,'ROLE_USER'),(20,'Usuario1','Usu','79977h','$2y$13$nBQurZ.701kWU.M0BhK.1.3avM8wBip2HbisQF08cQKo68MTsjwiO',NULL,NULL,'ROLE_USER'),(21,'Usuario2','y','4565546h','$2y$13$zTzlCEmXKIdk1ZVrhMXtG..FQdiPYPXyuoBo1QCVDqFlyruimHIEu',NULL,NULL,'ROLE_USER'),(22,'Usuario3','usu3','98563456U','$2y$13$oCVzXsBTAPd3eftSsbDGPOEdxtyweMf9hOqZ/XsrTDU/6lPHowj4y',NULL,NULL,'ROLE_USER'),(23,'Usuario4','','','$2y$13$F4rljbKQuxT/UjfiV2SB1.mBSgSF8.ym/wjR9.uGKs6aBZnTq7aJK',NULL,NULL,'ROLE_USER'),(24,'Usuario4','usu4','dd','$2y$13$pofxsmPDjGTFekXVNjqqVuYjcDUFLUIFLWBPb27PxPKOarYEvpLli',NULL,NULL,'ROLE_USER'),(25,'Usuario5','usu5','7657868r','$2y$13$u52dc6544NWsHhC4.mJlk.hERCJphf9o1UMBtSui6cH5lRxHSsjk6',NULL,NULL,'ROLE_USER'),(26,'Usuario5','usu5','5647765h','$2y$13$IjuPt1t6qjlX18nGZlPB6.yxNUcNf4sxkVaCTexLF35wA2yVSjKm.',NULL,NULL,'ROLE_USER'),(27,'Usuario6','usu6','567865U','$2y$13$lUkLuMVgoPbQf5.TW8vkuuP4cafYZAnwRKLM7LpY.PRJCjS4vKs32',NULL,NULL,'ROLE_USER'),(28,'Usuario7','6767789J','usu7','$2y$13$xEg749gxq87dHmsOnBYV9eq32hEzvvQwFA/fu6sbLetGSHd9LXSUu',NULL,NULL,'ROLE_USER'),(29,'usuario8','hrtdhd7','usu8','$2y$13$D0kAdkUpy6zKQT.XkR0H7.Gk60myMZKNgCNX4bh1.J9l7WQxnN3KW',NULL,NULL,'ROLE_USER'),(30,'usu9','gegg6','usu8','$2y$13$46ov1ePkXmNK2AGWEs.mTukl.0FeOsO.NeQDK6MF5NcAsfoMERnS6',NULL,NULL,'ROLE_USER'),(31,'antonio','56766787u','ant','$2y$13$4wjeHIQyDouTsybo36Z3OuER.x08dv59leYyoGEhs2G.qvCKp2aiy',NULL,NULL,'ROLE_USER');
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Venta`
--

DROP TABLE IF EXISTS `Venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Venta` (
  `id_venta` int NOT NULL AUTO_INCREMENT,
  `cantidad` int DEFAULT NULL,
  `localizacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Venta`
--

LOCK TABLES `Venta` WRITE;
/*!40000 ALTER TABLE `Venta` DISABLE KEYS */;
INSERT INTO `Venta` VALUES (1,NULL,NULL),(2,NULL,NULL),(3,NULL,NULL),(4,3,NULL),(5,10,NULL),(6,1,NULL),(7,1,NULL),(8,1,NULL),(9,1,NULL),(10,1,NULL);
/*!40000 ALTER TABLE `Venta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-10 12:21:35
