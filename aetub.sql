-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: aetub
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `associado`
--

DROP TABLE IF EXISTS `associado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `associado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `rg` int(11) DEFAULT NULL,
  `cpf` int(11) DEFAULT NULL,
  `orgaoExpedidor` varchar(10) DEFAULT NULL,
  `nomePai` varchar(255) DEFAULT NULL,
  `nomeMae` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `telResidencial` int(11) DEFAULT NULL,
  `telCelular` int(11) DEFAULT NULL,
  `telComercial` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profissao` varchar(255) DEFAULT NULL,
  `nomeEmpresa` varchar(55) DEFAULT NULL,
  `funcao` varchar(255) DEFAULT NULL,
  `salario` int(11) DEFAULT NULL,
  `outraRenda` tinyint(1) DEFAULT NULL,
  `rendaExtra` varchar(255) DEFAULT NULL,
  `estadoCivil` varchar(50) DEFAULT NULL,
  `nomeConjuje` varchar(255) DEFAULT NULL,
  `qtdeFilhos` int(11) DEFAULT NULL,
  `idadeFilhos` varchar(50) DEFAULT NULL,
  `pessoasResidencia` int(11) DEFAULT NULL,
  `qtasPessoasTrab` int(11) DEFAULT NULL,
  `rendaFamiliar` int(11) DEFAULT NULL,
  `planoSaude` tinyint(1) DEFAULT NULL,
  `planoEmpresa` varchar(50) DEFAULT NULL,
  `tipoSangue` varchar(50) DEFAULT NULL,
  `problemaSaude` varchar(50) DEFAULT NULL,
  `curso` varchar(255) DEFAULT NULL,
  `universidade` varchar(255) DEFAULT NULL,
  `semestreCursando` varchar(255) DEFAULT NULL,
  `aulaSabado` tinyint(1) DEFAULT NULL,
  `duracaoCurso` int(11) DEFAULT NULL,
  `rgm` varchar(50) DEFAULT NULL,
  `valorMensalidade` varchar(50) DEFAULT NULL,
  `possuiBolsaFinCred` tinyint(1) DEFAULT NULL,
  `porcBolsaFinCred` int(11) DEFAULT NULL,
  `cursoUniversitario` tinyint(1) DEFAULT NULL,
  `cursoNome` varchar(255) DEFAULT NULL,
  `retidoFalta` tinyint(1) DEFAULT NULL,
  `retidoMaisUmAno` tinyint(1) DEFAULT NULL,
  `desistiuCursarAnoLetivo` tinyint(1) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `associado`
--

LOCK TABLES `associado` WRITE;
/*!40000 ALTER TABLE `associado` DISABLE KEYS */;
/*!40000 ALTER TABLE `associado` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-20 13:00:05
