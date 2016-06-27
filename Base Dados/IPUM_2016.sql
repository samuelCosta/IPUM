-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.7.10-log
create database mydb;
use mydb;
SET PASSWORD FOR 'root'@'localhost' = PASSWORD('ipum2016');
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
-- Table structure for table `apoios`
--

DROP TABLE IF EXISTS `apoios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apoios` (
  `idApoios` int(11) NOT NULL AUTO_INCREMENT,
  `tranche` varchar(45) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `fundos` double DEFAULT NULL,
  PRIMARY KEY (`idApoios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apoios`
--

LOCK TABLES `apoios` WRITE;
/*!40000 ALTER TABLE `apoios` DISABLE KEYS */;
/*!40000 ALTER TABLE `apoios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apoiosatividades`
--

DROP TABLE IF EXISTS `apoiosatividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apoiosatividades` (
  `idapoiosAtividades` int(11) NOT NULL AUTO_INCREMENT,
  `atividades_idAtividades` int(11) NOT NULL,
  `apoios_idApoios` int(11) NOT NULL,
  PRIMARY KEY (`idapoiosAtividades`,`atividades_idAtividades`,`apoios_idApoios`),
  KEY `fk_apoiosAtividades_atividades1_idx` (`atividades_idAtividades`),
  KEY `fk_apoiosAtividades_apoios1_idx` (`apoios_idApoios`),
  CONSTRAINT `fk_apoiosAtividades_apoios1` FOREIGN KEY (`apoios_idApoios`) REFERENCES `apoios` (`idApoios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_apoiosAtividades_atividades1` FOREIGN KEY (`atividades_idAtividades`) REFERENCES `atividades` (`idAtividades`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apoiosatividades`
--

LOCK TABLES `apoiosatividades` WRITE;
/*!40000 ALTER TABLE `apoiosatividades` DISABLE KEYS */;
/*!40000 ALTER TABLE `apoiosatividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apoioseventos`
--

DROP TABLE IF EXISTS `apoioseventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apoioseventos` (
  `idapoiosEventos` int(11) NOT NULL AUTO_INCREMENT,
  `eventos_idEventos` int(11) NOT NULL,
  `apoios_idApoios` int(11) NOT NULL,
  PRIMARY KEY (`idapoiosEventos`,`eventos_idEventos`,`apoios_idApoios`),
  KEY `fk_apoiosEventos_eventos1_idx` (`eventos_idEventos`),
  KEY `fk_apoiosEventos_apoios1_idx` (`apoios_idApoios`),
  CONSTRAINT `fk_apoiosEventos_apoios1` FOREIGN KEY (`apoios_idApoios`) REFERENCES `apoios` (`idApoios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_apoiosEventos_eventos1` FOREIGN KEY (`eventos_idEventos`) REFERENCES `eventos` (`idEventos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apoioseventos`
--

LOCK TABLES `apoioseventos` WRITE;
/*!40000 ALTER TABLE `apoioseventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `apoioseventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atividades`
--

DROP TABLE IF EXISTS `atividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividades` (
  `idAtividades` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAtividade` varchar(45) DEFAULT NULL,
  `localizacao` varchar(45) DEFAULT NULL,
  `participantes` int(11) DEFAULT NULL,
  `totalGastos` double DEFAULT NULL,
  `notas` varchar(1000) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `dataInicio` date DEFAULT NULL,
  `duracao` float DEFAULT NULL,
  `orcamento` double DEFAULT NULL,
  PRIMARY KEY (`idAtividades`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividades`
--

LOCK TABLES `atividades` WRITE;
/*!40000 ALTER TABLE `atividades` DISABLE KEYS */;
/*!40000 ALTER TABLE `atividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `idEventos` int(11) NOT NULL AUTO_INCREMENT,
  `dataEvento` date DEFAULT NULL,
  `designacao` varchar(45) DEFAULT NULL,
  `orcamento` double DEFAULT NULL,
  `responsavel` varchar(45) DEFAULT NULL,
  `despesa` double DEFAULT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `localizacao` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `totalpresencas` int(11) DEFAULT NULL,
  `notas` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idEventos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instrumento`
--

DROP TABLE IF EXISTS `instrumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instrumento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(45) DEFAULT NULL,
  `tamanho` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `localizacao` varchar(45) DEFAULT NULL,
  `tipo_selecao_id` int(11) NOT NULL,
  `elemento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_instrumento_tipo_selecao1_idx` (`tipo_selecao_id`),
  CONSTRAINT `fk_instrumento_tipo_selecao1` FOREIGN KEY (`tipo_selecao_id`) REFERENCES `tipo_selecao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instrumento`
--

LOCK TABLES `instrumento` WRITE;
/*!40000 ALTER TABLE `instrumento` DISABLE KEYS */;
/*!40000 ALTER TABLE `instrumento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instrumento_manutencao`
--

DROP TABLE IF EXISTS `instrumento_manutencao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instrumento_manutencao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `elemento` varchar(45) DEFAULT NULL,
  `data_manutencao` date DEFAULT NULL,
  `custo_total` decimal(10,2) DEFAULT NULL,
  `instrumento_id` int(11) NOT NULL,
  `sp_material_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_instrumento_manutencao_instrumento1_idx` (`instrumento_id`),
  KEY `fk_instrumento_manutencao_stock_produto_idx` (`sp_material_id`),
  CONSTRAINT `fk_instrumento_manutencao_instrumento1` FOREIGN KEY (`instrumento_id`) REFERENCES `instrumento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_instrumento_manutencao_stock_produto` FOREIGN KEY (`sp_material_id`) REFERENCES `stock_produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instrumento_manutencao`
--

LOCK TABLES `instrumento_manutencao` WRITE;
/*!40000 ALTER TABLE `instrumento_manutencao` DISABLE KEYS */;
/*!40000 ALTER TABLE `instrumento_manutencao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `merchandising`
--

DROP TABLE IF EXISTS `merchandising`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `merchandising` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) DEFAULT NULL,
  `custo` decimal(10,2) DEFAULT NULL,
  `descricao` varchar(400) CHARACTER SET big5 DEFAULT NULL,
  `ts_motivo_id` int(11) NOT NULL,
  `sm_id` int(11) NOT NULL,
  `elemento` varchar(45) DEFAULT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_merchandising_tipo_selecao1_idx` (`ts_motivo_id`),
  KEY `fk_merchandising_stock_merchandising1_idx` (`sm_id`),
  CONSTRAINT `fk_merchandising_stock_merchandising1` FOREIGN KEY (`sm_id`) REFERENCES `stock_merchandising` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_merchandising_tipo_selecao1` FOREIGN KEY (`ts_motivo_id`) REFERENCES `tipo_selecao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `merchandising`
--

LOCK TABLES `merchandising` WRITE;
/*!40000 ALTER TABLE `merchandising` DISABLE KEYS */;
/*!40000 ALTER TABLE `merchandising` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musica`
--

DROP TABLE IF EXISTS `musica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `musica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `link` varchar(400) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musica`
--

LOCK TABLES `musica` WRITE;
/*!40000 ALTER TABLE `musica` DISABLE KEYS */;
/*!40000 ALTER TABLE `musica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orgaossociais`
--

DROP TABLE IF EXISTS `orgaossociais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orgaossociais` (
  `idorgaosSociais` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `dataInicio` date DEFAULT NULL,
  `dataFim` date DEFAULT NULL,
  `utilizador_idUtilizador` int(11) NOT NULL,
  PRIMARY KEY (`idorgaosSociais`,`utilizador_idUtilizador`),
  KEY `fk_orgaosSociais_utilizador1_idx` (`utilizador_idUtilizador`),
  CONSTRAINT `fk_orgaosSociais_utilizador1` FOREIGN KEY (`utilizador_idUtilizador`) REFERENCES `utilizador` (`idUtilizador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orgaossociais`
--

LOCK TABLES `orgaossociais` WRITE;
/*!40000 ALTER TABLE `orgaossociais` DISABLE KEYS */;
/*!40000 ALTER TABLE `orgaossociais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presencaseventos`
--

DROP TABLE IF EXISTS `presencaseventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presencaseventos` (
  `idpresencasEventos` int(11) NOT NULL AUTO_INCREMENT,
  `utilizador_idUtilizador` int(11) NOT NULL,
  `eventos_idEventos` int(11) NOT NULL,
  PRIMARY KEY (`idpresencasEventos`,`utilizador_idUtilizador`,`eventos_idEventos`),
  KEY `fk_presencasEventos_utilizador1_idx` (`utilizador_idUtilizador`),
  KEY `fk_presencasEventos_eventos1_idx` (`eventos_idEventos`),
  CONSTRAINT `fk_presencasEventos_eventos1` FOREIGN KEY (`eventos_idEventos`) REFERENCES `eventos` (`idEventos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_presencasEventos_utilizador1` FOREIGN KEY (`utilizador_idUtilizador`) REFERENCES `utilizador` (`idUtilizador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presencaseventos`
--

LOCK TABLES `presencaseventos` WRITE;
/*!40000 ALTER TABLE `presencaseventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `presencaseventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quota`
--

DROP TABLE IF EXISTS `quota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quota` (
  `idQuota` int(11) NOT NULL AUTO_INCREMENT,
  `dataAviso` date DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `dataPagamento` date DEFAULT NULL,
  `utilizador_idUtilizador` int(11) NOT NULL,
  PRIMARY KEY (`idQuota`,`utilizador_idUtilizador`),
  KEY `fk_quota_utilizador1_idx` (`utilizador_idUtilizador`),
  CONSTRAINT `fk_quota_utilizador1` FOREIGN KEY (`utilizador_idUtilizador`) REFERENCES `utilizador` (`idUtilizador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quota`
--

LOCK TABLES `quota` WRITE;
/*!40000 ALTER TABLE `quota` DISABLE KEYS */;
/*!40000 ALTER TABLE `quota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_merchandising`
--

DROP TABLE IF EXISTS `stock_merchandising`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_merchandising` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) DEFAULT NULL,
  `localizacao` varchar(45) DEFAULT NULL,
  `custo_uni` decimal(10,2) DEFAULT NULL,
  `data_compra` date DEFAULT NULL,
  `ts_tipo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_stock_merchandising_tipo_selecao1_idx` (`ts_tipo_id`),
  CONSTRAINT `fk_stock_merchandising_tipo_selecao1` FOREIGN KEY (`ts_tipo_id`) REFERENCES `tipo_selecao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_merchandising`
--

LOCK TABLES `stock_merchandising` WRITE;
/*!40000 ALTER TABLE `stock_merchandising` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_merchandising` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_produto`
--

DROP TABLE IF EXISTS `stock_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `localizacao` varchar(45) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `custo_uni` decimal(10,2) DEFAULT NULL,
  `data_compra` date DEFAULT NULL,
  `ts_tipo_material_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_stock_produto_tipo_selecao1_idx` (`ts_tipo_material_id`),
  CONSTRAINT `fk_stock_produto_tipo_selecao1` FOREIGN KEY (`ts_tipo_material_id`) REFERENCES `tipo_selecao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_produto`
--

LOCK TABLES `stock_produto` WRITE;
/*!40000 ALTER TABLE `stock_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_traje`
--

DROP TABLE IF EXISTS `stock_traje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_traje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) DEFAULT NULL,
  `localizacao` varchar(255) DEFAULT NULL,
  `custo_uni` decimal(10,2) DEFAULT NULL,
  `data_compra` date DEFAULT NULL,
  `ts_tipo_id` int(11) NOT NULL,
  `ts_genero_id` int(11) NOT NULL,
  `ts_tamanho_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_peca_traje_tipo_selecao1_idx` (`ts_tipo_id`),
  KEY `fk_peca_traje_tipo_selecao2_idx` (`ts_genero_id`),
  KEY `fk_peca_traje_tipo_selecao3_idx` (`ts_tamanho_id`),
  CONSTRAINT `fk_peca_traje_tipo_selecao1` FOREIGN KEY (`ts_tipo_id`) REFERENCES `tipo_selecao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_peca_traje_tipo_selecao2` FOREIGN KEY (`ts_genero_id`) REFERENCES `tipo_selecao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_peca_traje_tipo_selecao3` FOREIGN KEY (`ts_tamanho_id`) REFERENCES `tipo_selecao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_traje`
--

LOCK TABLES `stock_traje` WRITE;
/*!40000 ALTER TABLE `stock_traje` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_traje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_selecao`
--

DROP TABLE IF EXISTS `tipo_selecao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_selecao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_tipo` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_selecao`
--

LOCK TABLES `tipo_selecao` WRITE;
/*!40000 ALTER TABLE `tipo_selecao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_selecao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `traje`
--

DROP TABLE IF EXISTS `traje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `traje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `custo` decimal(10,2) DEFAULT NULL,
  `descricao` varchar(400) DEFAULT NULL,
  `ts_motivo_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `elemento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_traje_tipo_selecao1_idx` (`ts_motivo_id`),
  KEY `fk_traje_stock_traje1_idx` (`st_id`),
  CONSTRAINT `fk_traje_stock_traje1` FOREIGN KEY (`st_id`) REFERENCES `stock_traje` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_traje_tipo_selecao1` FOREIGN KEY (`ts_motivo_id`) REFERENCES `tipo_selecao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traje`
--

LOCK TABLES `traje` WRITE;
/*!40000 ALTER TABLE `traje` DISABLE KEYS */;
/*!40000 ALTER TABLE `traje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilizador`
--

DROP TABLE IF EXISTS `utilizador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilizador` (
  `idUtilizador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `alcunha` varchar(45) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nif` int(11) DEFAULT NULL,
  `bi` varchar(12) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `dataEntrada` date DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `socio` tinyint(1) DEFAULT NULL,
  `dataSocio` date DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `foto` varchar(1000) DEFAULT NULL,
  `privilegio` varchar(45) DEFAULT NULL,
  `nAluno` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`idUtilizador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilizador`
--

LOCK TABLES `utilizador` WRITE;
/*!40000 ALTER TABLE `utilizador` DISABLE KEYS */;
INSERT INTO `utilizador` VALUES (1,'Nuno Silva','IPUM','a5d65fb87c9990188787b912a6e7b9b8',0,'00000000','2010-06-01','2016-06-15','ipum@hotmail.com',0,NULL,1,'index.jpg','Administrador','0000');
/*!40000 ALTER TABLE `utilizador` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-15 13:29:35
