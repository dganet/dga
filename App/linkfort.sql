-- MySQL dump 10.13  Distrib 5.7.15, for Linux (x86_64)
--
-- Host: localhost    Database: linkfort
-- ------------------------------------------------------
-- Server version	5.7.15-1

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
-- Table structure for table `bairro`
--

DROP TABLE IF EXISTS `bairro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bairro` (
  `idBairro` int(11) NOT NULL AUTO_INCREMENT,
  `nomeBairro` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idBairro`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bairro`
--

LOCK TABLES `bairro` WRITE;
/*!40000 ALTER TABLE `bairro` DISABLE KEYS */;
INSERT INTO `bairro` VALUES (1,'Mangue Seco');
/*!40000 ALTER TABLE `bairro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordem`
--

DROP TABLE IF EXISTS `ordem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordem` (
  `idOs` int(11) NOT NULL AUTO_INCREMENT,
  `protocolo` int(11) DEFAULT NULL,
  `codAssinante` int(11) DEFAULT NULL,
  `nomeAssinante` varchar(100) DEFAULT NULL,
  `fkServico` int(11) DEFAULT NULL,
  `fkBairro` int(11) DEFAULT NULL,
  `setor` int(11) DEFAULT NULL,
  `fkProblema` int(11) DEFAULT NULL,
  `tipoInternet` varchar(25) DEFAULT NULL,
  `fkTecnico` int(11) DEFAULT NULL,
  `descProblema` varchar(1024) DEFAULT NULL,
  `statusOrdem` varchar(50) DEFAULT NULL,
  `dataRecebimento` datetime DEFAULT NULL,
  `dataAbertura` datetime DEFAULT NULL,
  `dataRealizacao` datetime DEFAULT NULL,
  PRIMARY KEY (`idOs`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordem`
--

LOCK TABLES `ordem` WRITE;
/*!40000 ALTER TABLE `ordem` DISABLE KEYS */;
INSERT INTO `ordem` VALUES (1,111,222,'Guilherme',2,1,3,6,'Rádio',5,'asdfasdf','PENDENTE','1969-12-31 21:33:37','1969-12-31 21:33:37','1969-12-31 21:00:00'),(2,12341234,12341234,'TEste',1,1,3,6,'Rádio',5,'asdfasdf','PENDENTE','1969-12-31 21:33:37','1969-12-31 21:33:37','1969-12-31 21:00:00'),(3,1234,11111,'Lygia Victoria de Almeida Rodrigues',2,1,4,1,'Rádio',3,'Teste de O.S','PENDENTE','1969-12-31 21:33:37','1969-12-31 21:33:37','1969-12-31 21:00:00'),(4,1234,1234,'1234',1,1,1,0,'Fibra',0,'','PENDENTE','1969-12-31 21:33:37','1969-12-31 21:33:37','1969-12-31 21:00:00'),(5,1234,1234,'asdfasdf',1,1,2,0,'Fibra',0,'','PENDENTE','1969-12-31 21:33:37','1969-12-31 21:33:37','1969-12-31 21:00:00'),(6,1234,1234,'asdfasdf',1,1,2,0,'Fibra',0,'','PENDENTE','1969-12-31 21:33:37','1969-12-31 21:33:37','1969-12-31 21:00:00'),(7,1234,1234,'asdfasdf',2,1,2,0,'Rádio',0,'','PENDENTE','1969-12-31 21:33:37','1969-12-31 21:33:37','1969-12-31 21:00:00'),(8,1234,1234,'asdfasd',1,1,1,0,'Fibra',0,'','PENDENTE','1969-12-31 21:33:37','1969-12-31 21:33:37','1969-12-31 21:00:00'),(9,1234,1234,'asdfasd',1,1,1,0,'Fibra',0,'','PENDENTE','1969-12-31 21:33:37','1969-12-31 21:33:37','1969-12-31 21:00:00'),(10,123,123,'123123',1,1,2,0,'Fibra',0,'','PENDENTE','1969-12-31 21:33:37','1969-12-31 21:33:37','1969-12-31 21:00:00'),(11,123,123,'123123',1,1,2,0,'Fibra',0,'','PENDENTE','1969-12-31 21:33:37','1969-12-31 21:33:37','1969-12-31 21:00:00'),(12,1234,123,'123',2,1,3,0,'Rádio',0,'','PENDENTE','1969-12-31 21:33:37','1969-12-31 21:33:37','1969-12-31 21:00:00'),(13,123,123,'asdfasd',2,1,3,0,'Rádio',0,'','PENDENTE','1969-12-31 21:33:37','1969-12-31 21:33:37','1969-12-31 21:00:00'),(14,123,123,'asdfasdf',1,1,2,0,'Fibra',0,'','PENDENTE','1969-12-31 21:33:37','1969-12-31 21:33:37','1969-12-31 21:00:00'),(15,11111,1111,'asdfas',1,1,1,0,'Rádio',0,'','PENDENTE','1969-12-31 21:33:37','1969-12-31 21:33:37','1969-12-31 21:00:00'),(16,123123,123,'asdfasdf',2,1,3,0,'Rádio',0,'','PENDENTE','1969-12-31 21:33:37','1969-12-31 21:33:37','1969-12-31 21:00:00');
/*!40000 ALTER TABLE `ordem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problema`
--

DROP TABLE IF EXISTS `problema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problema` (
  `idProblema` int(11) NOT NULL AUTO_INCREMENT,
  `nomeProblema` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`idProblema`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problema`
--

LOCK TABLES `problema` WRITE;
/*!40000 ALTER TABLE `problema` DISABLE KEYS */;
INSERT INTO `problema` VALUES (1,'Troca de Roteador'),(6,'Troca de rádio');
/*!40000 ALTER TABLE `problema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servico`
--

DROP TABLE IF EXISTS `servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servico` (
  `idServico` int(11) NOT NULL AUTO_INCREMENT,
  `nomeServico` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idServico`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servico`
--

LOCK TABLES `servico` WRITE;
/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
INSERT INTO `servico` VALUES (1,'Manutencao'),(2,'Instalação'),(3,'teste');
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tecnico`
--

DROP TABLE IF EXISTS `tecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tecnico` (
  `idTecnico` int(11) NOT NULL AUTO_INCREMENT,
  `nomeTecnico` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idTecnico`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tecnico`
--

LOCK TABLES `tecnico` WRITE;
/*!40000 ALTER TABLE `tecnico` DISABLE KEYS */;
INSERT INTO `tecnico` VALUES (1,'Anderson'),(2,'Dirley'),(3,'Alexandre'),(4,'Guilherme'),(5,'Victoria');
/*!40000 ALTER TABLE `tecnico` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-29 17:40:49
