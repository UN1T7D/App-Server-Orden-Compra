-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: den1.mysql6.gear.host    Database: appserveroc
-- ------------------------------------------------------
-- Server version	5.7.26-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `nit` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `ncliente` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `contacto` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idpais` int(11) NOT NULL,
  PRIMARY KEY (`nit`),
  KEY `idpais` (`idpais`),
  CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`idpais`) REFERENCES `pais` (`idpais`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES ('0315-080789-106-8','DALILA ELIZABETH RIVERA GUERRA','JVPM 15978',1),('0501-160320-000-1','REYESCO LTD','RENI YOHALMO REYES',4),('0501-999509-699-2','DROGUERIA KRISAN, S. DE R.L. DE C.V.','Rep. Legal: JOSE SANTOS MORALES SANCHEZ',2),('0502-131119-000-4','DROGUERIA IMPORTADORA SALAZAR SOCIEDAD ANONIMA','REP. L. GUSTAVO SEHIN SALAZAR MONT / Ing. Bertony Salazar',1),('0502-261118-000-1','VIVANT LABORATORIOS SOCIEDAD ANONIMA','JULIO RENE LOPEZ TURCIOS',1),('0502-261118-000-2','LADI SOCIEDAD ANONIMA','PAULA GIRON',1),('0504-290119-000-1','INVERSIONES PORTILLO MOLINA S. DE RL DE C.V.','REP. LEGAL JOSE LUIS PORTILLO MOLINA',2),('0505-140119-000-1','REPRESENTACIONES FARMACEUTICAS DE NICARAGUA, S.A.','REP. L. KARIM ALEJANDRO FARAJ FARACH / CONTAC. MOISES DAVID MARTINEZ',3),('0505-270420-000-2','COMERCIAL E. DETRINIDAD S.A.','Prop. EDGAR LEONARDO DE TRINIDAD CASTRO',3),('0801-900226-829-8','EYL COMERCIAL  S A','Dorys Alejandra Enamorado',2),('0J03-000009-327-0','FARMACOS INTERNACIONALES DE NICARAGUA, .S.A.','',3),('1123-150515-101-5','BENDICION Y PROGRESO, S.A. DE C.V.','',5),('123456','JAIME','23568965',1),('1251-554K--','GLOBAL FARMA, SOCIEDAD ANONIMA','',1),('1324-280255-001-9','PORFIRIO HERNÁNDEZ ROMERO','',5),('230463959','VICTORIANO CHOGUAJ COJTI','',1),('3704-8120--','MAJOSA / LILET, S.A.','',1),('4149-262--','LABORATORIO Y DROGUERIA DONOVAN WERKE A.G., S.A.','',1),('4275-721--','FARMAMEDICA. S.A.','',1),('456987455222','pppppa','hola ',2),('6717-659--','KRAL PHARMACEUTICA INTERNACIONAL S.A.','',1),('7793-2455--','DISPOSITIVOS MEDICOS DESCARTABLES, SOCIEDAD ANONIMA','CARLOS MIGUEL DE LA PAZ',1),('7898-1557--','PHARMACEUTICOS AREVALO, S.A.','LUIS ALBERTO AREVALO MELGAR',1),('8096-9933--','DISTRIBUIDORA JUCARMI, S.A.','',1),('RTN0-801901-575-6028','DISTRIBUIDORA ALFAMEDIC, S DE R.L.','',2),('RUC-CJ0300-000-93270','FARMACOS INTERNACIONALES DE NICARAGUA','(Inactivado 14/10/19) Activo 0J03-000009-327-0',3),('RUC-J03100-000-02185','SUMINISTROS INTERNACIONALES, S.A.','SR. CARLOS LUIS HERNANDEZ',3),('RUC.-J03100-000-4013','IMPORTACIONES FARMACEUTICAS, S.A.','GEOVANNY JOSE JARQUIN GAGO',3);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etapas`
--

DROP TABLE IF EXISTS `etapas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etapas` (
  `idetapa` int(11) NOT NULL AUTO_INCREMENT,
  `netapas` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo` char(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idrol` int(11) NOT NULL,
  PRIMARY KEY (`idetapa`),
  KEY `idrol` (`idrol`),
  CONSTRAINT `etapas_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etapas`
--

LOCK TABLES `etapas` WRITE;
/*!40000 ALTER TABLE `etapas` DISABLE KEYS */;
INSERT INTO `etapas` VALUES (1,'EN ESPERA','',1),(2,'FINALIZADO','',1),(3,'A - OC confirmada por cliente','A',2),(4,'B - Notificación a áreas correspondientes (memorándum)','B',2),(5,'C - Esperando disponibilidad del producto(Se produce y/o se mueve el producto a Exportaciones)','C',3),(6,'D - En Facturación','D',2),(7,'E - Elaborando documentos proforma','E',2),(8,'F - Visando facturas','F',2),(9,'G - Esperando Lista de Empaque','G',3),(10,'H - En tramitación de transporte','H',3),(11,'I - Elaborando documentación (DUCA)','I',2),(12,'J - Esperando confirmación del pago de impuestos','J',2),(13,'K - Despachando la exportación','K',3),(14,'L - Arribando a destino','L',3),(15,'M - En tramite de cobro','M',2),(16,'N - Documento liquidado (cobro realizado en totalidad)','N',2);
/*!40000 ALTER TABLE `etapas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_oc`
--

DROP TABLE IF EXISTS `log_oc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_oc` (
  `idlogoc` int(11) NOT NULL AUTO_INCREMENT,
  `oc` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `ncliente` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `netapas` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `f_inicio` date NOT NULL,
  `usuario` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idlogoc`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_oc`
--

LOCK TABLES `log_oc` WRITE;
/*!40000 ALTER TABLE `log_oc` DISABLE KEYS */;
INSERT INTO `log_oc` VALUES (2,'OC PRUEBA 02','DALILA ELIZABETH RIVERA GUERRA','C - Esperando disponibilidad del producto(Se produce y/o se mueve el producto a Exportaciones)','2020-09-07','administrador'),(3,'EXPORTACION','DALILA ELIZABETH RIVERA GUERRA','A - OC confirmada por cliente','2020-09-07','administrador'),(4,'EXPORTACION','DALILA ELIZABETH RIVERA GUERRA','B - Notificación a áreas correspondientes (memorándum)','2020-09-07','administrador'),(5,'EXPORTACION','DALILA ELIZABETH RIVERA GUERRA','C - Esperando disponibilidad del producto(Se produce y/o se mueve el producto a Exportaciones)','2020-09-07','administrador'),(6,'EXPORTACION','DALILA ELIZABETH RIVERA GUERRA','D - En Facturación','2020-09-07','administrador'),(7,'EXPORTACION','DALILA ELIZABETH RIVERA GUERRA','E - Elaborando documentos proforma','2020-09-07','administrador'),(8,'EXPORTACION','DALILA ELIZABETH RIVERA GUERRA','F - Visando facturas','2020-09-07','administrador'),(9,'EXPORTACION','DALILA ELIZABETH RIVERA GUERRA','G - Esperando Lista de Empaque','2020-09-07','administrador'),(10,'EXPORTACION','DALILA ELIZABETH RIVERA GUERRA','H - En tramitación de transporte','2020-09-07','administrador'),(11,'OC PRUEBA 02','DALILA ELIZABETH RIVERA GUERRA','D - En Facturación','2020-09-07','administrador'),(12,'EXPORTACION','DALILA ELIZABETH RIVERA GUERRA','I - Elaborando documentación (DUCA)','2020-09-07','administrador'),(13,'EXPORTACION','DALILA ELIZABETH RIVERA GUERRA','J - Esperando confirmación del pago de impuestos','2020-09-07','administrador'),(14,'EXPORTACION','DALILA ELIZABETH RIVERA GUERRA','K - Despachando la exportación','2020-09-07','administrador'),(15,'EXPORTACION','DALILA ELIZABETH RIVERA GUERRA','L - Arribando a destino','2020-09-07','administrador'),(16,'EXPORTACION','DALILA ELIZABETH RIVERA GUERRA','M - En tramite de cobro','2020-09-07','administrador'),(17,'EXPORTACION','DALILA ELIZABETH RIVERA GUERRA','N - Documento liquidado (cobro realizado en totalidad)','2020-09-07','administrador'),(18,'NICARAGUA','','','2020-09-08','administrador'),(19,'NICARAGUA','','','2020-09-08','administrador'),(20,'NICARAGUA','','','2020-09-08','administrador'),(21,'OC PRUEBA 02','','','2020-09-08','administrador'),(22,'OC PRUEBA 02','','','2020-09-08','administrador'),(23,'OC PRUEBA 02','','','2020-09-08','administrador'),(24,'OC PRUEBA 02','','','2020-09-08','administrador'),(25,'OC PRUEBA 02','','','2020-09-08','administrador'),(26,'OC PRUEBA 02','','','2020-09-08','administrador'),(27,'OC PRUEBA 02','','','2020-09-08','administrador'),(28,'OC PRUEBA 02','','','2020-09-08','administrador'),(29,'OC PRUEBA 02','','','2020-09-08','administrador'),(30,'OC PRUEBA 02','','','2020-09-08','administrador'),(31,'OC PRUEBA 02','','','2020-09-08','administrador'),(32,'OC PRUEBA 02','','','2020-09-08','administrador'),(33,'OC PRUEBA 02','','','2020-09-08','administrador'),(34,'OC PRUEBA 02','','','2020-09-08','administrador'),(35,'OC PRUEBA 02','','','2020-09-08','administrador'),(36,'OC PRUEBA 02','','','2020-09-08','administrador'),(37,'OC PRUEBA 02','','','2020-09-08','administrador'),(38,'OC PRUEBA 02','','','2020-09-08','administrador'),(39,'OC PRUEBA 02','','','2020-09-08','administrador'),(40,'OC PRUEBA 02','','','2020-09-08','administrador'),(41,'OC PRUEBA 02','','','2020-09-08','administrador'),(42,'OC PRUEBA 02','','','2020-09-08','administrador'),(43,'OC PRUEBA 02','','','2020-09-08','administrador'),(44,'OC PRUEBA 02','','','2020-09-08','administrador');
/*!40000 ALTER TABLE `log_oc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oc`
--

DROP TABLE IF EXISTS `oc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oc` (
  `oc` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nit` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `finicio` date NOT NULL,
  `ffin` date DEFAULT NULL,
  `dxoc` int(3) DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `idpais_etapa` int(11) NOT NULL,
  `visible` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`oc`),
  KEY `nit` (`nit`,`idpais_etapa`),
  KEY `idpais_etapa` (`idpais_etapa`),
  CONSTRAINT `oc_ibfk_1` FOREIGN KEY (`nit`) REFERENCES `clientes` (`nit`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `oc_ibfk_2` FOREIGN KEY (`idpais_etapa`) REFERENCES `pais_etapa` (`idpais_etapa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oc`
--

LOCK TABLES `oc` WRITE;
/*!40000 ALTER TABLE `oc` DISABLE KEYS */;
INSERT INTO `oc` VALUES ('EXPORTACION','0315-080789-106-8','2020-09-06','2020-09-07',0,'FINALIZADO',2,'SI',''),('FHDR','0501-999509-699-2','2020-09-06','2020-09-07',0,'FINALIZADO',18,'SI',''),('LKASNLFESLK','0505-140119-000-1','2020-09-06','2020-09-07',0,'FINALIZADO',30,'SI',''),('NICARAGUA','0505-140119-000-1','2020-09-07',NULL,NULL,'EN PROCESO',34,'SI',NULL),('OC GUATEMALA','0315-080789-106-8','2020-09-06','2020-09-07',0,'FINALIZADO',2,'SI',''),('OC HONDURAS','0501-999509-699-2','2020-09-06','2020-09-06',0,'FINALIZADO',18,'NO',''),('OC NICARAGUA','0505-140119-000-1','2020-09-06','2020-09-06',0,'FINALIZADO',30,'NO',''),('OC PRUEBA 02','0315-080789-106-8','2020-09-06','0000-00-00',0,'EN PROCESO',13,'SI','JAIMICO'),('PRUEBA','0315-080789-106-8','2020-09-06','2020-09-06',0,'FINALIZADO',2,'SI','');
/*!40000 ALTER TABLE `oc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pais` (
  `idpais` int(11) NOT NULL AUTO_INCREMENT,
  `npais` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idpais`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` VALUES (1,'GUATEMALA'),(2,'HONDURAS'),(3,'NICARAGUA'),(4,'BELICE'),(5,'COSTA RICA');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais_etapa`
--

DROP TABLE IF EXISTS `pais_etapa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pais_etapa` (
  `idpais_etapa` int(11) NOT NULL AUTO_INCREMENT,
  `idpais` int(11) NOT NULL,
  `idetapa` int(11) NOT NULL,
  `porcentaje` int(3) DEFAULT NULL,
  PRIMARY KEY (`idpais_etapa`),
  KEY `idpais` (`idpais`,`idetapa`),
  KEY `idetapa` (`idetapa`),
  CONSTRAINT `pais_etapa_ibfk_1` FOREIGN KEY (`idpais`) REFERENCES `pais` (`idpais`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pais_etapa_ibfk_2` FOREIGN KEY (`idetapa`) REFERENCES `etapas` (`idetapa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais_etapa`
--

LOCK TABLES `pais_etapa` WRITE;
/*!40000 ALTER TABLE `pais_etapa` DISABLE KEYS */;
INSERT INTO `pais_etapa` VALUES (1,1,1,0),(2,1,2,100),(3,1,3,7),(4,1,4,14),(5,1,5,21),(6,1,6,29),(7,1,7,36),(8,1,8,43),(9,1,9,50),(10,1,10,57),(11,1,11,64),(12,1,12,71),(13,1,13,79),(14,1,14,86),(15,1,15,93),(16,1,16,96),(17,2,1,0),(18,2,2,100),(19,2,3,10),(20,2,4,20),(21,2,5,30),(22,2,6,40),(23,2,7,50),(24,2,8,60),(25,2,13,69),(26,2,14,79),(27,2,15,89),(28,2,16,96),(29,3,1,0),(30,3,2,100),(31,3,3,8),(32,3,4,17),(33,3,5,25),(34,3,6,33),(35,3,7,42),(36,3,8,50),(37,3,9,58),(38,3,10,67),(39,3,13,75),(40,3,14,83),(41,3,15,91),(42,3,16,96),(43,4,1,0),(44,4,2,100),(45,4,3,10),(46,4,4,20),(47,4,5,30),(48,4,6,40),(49,4,7,50),(50,4,8,60),(51,4,9,69),(52,4,13,79),(53,4,15,89),(54,4,16,96),(56,5,1,10);
/*!40000 ALTER TABLE `pais_etapa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'ADMINISTRADOR'),(2,'EXPORTACIONES'),(3,'LOGISTICA'),(4,'VISITAS');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_user` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `pwd` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `idrol` int(11) NOT NULL,
  PRIMARY KEY (`usuario`),
  KEY `idrol` (`idrol`),
  KEY `idrol_2` (`idrol`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('administrador','administador','827ccb0eea8a706c4c34a16891f84e7b',1),('exportaciones','exportaciones','827ccb0eea8a706c4c34a16891f84e7b',2),('jaina','jaime','12345',1),('KEVIN','KEVIN','827ccb0eea8a706c4c34a16891f84e7b',1),('logistica','logistica','827ccb0eea8a706c4c34a16891f84e7b',3),('perez','jose','12345',2),('visitas','visitas','827ccb0eea8a706c4c34a16891f84e7b',4);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'appserveroc'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-08 14:57:08
