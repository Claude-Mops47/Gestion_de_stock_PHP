-- MySQL dump 10.13  Distrib 8.0.20, for macos10.15 (x86_64)
--
-- Host: localhost    Database: gestion_de_stock
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commande` (
  `id_comm` int NOT NULL AUTO_INCREMENT,
  `nom_comm` varchar(45) NOT NULL,
  `qte_comm` int NOT NULL,
  `type_comm` varchar(45) NOT NULL,
  `date_comm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comm`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande`
--

LOCK TABLES `commande` WRITE;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
INSERT INTO `commande` VALUES (1,'Macbook',34,'vol','2023-01-13 17:50:16'),(2,'Iphone 14 Pro ',23,'Cli','2023-01-14 11:41:33'),(3,'mom',77,'you','2023-01-15 13:30:06'),(4,'Max',79,'zel','2023-01-15 13:31:10'),(5,'Carte SIM',89,'zsh','2023-01-16 16:59:21'),(6,'Max ed',100,'echo','2023-01-19 19:16:02');
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrepot`
--

DROP TABLE IF EXISTS `entrepot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entrepot` (
  `id_entrepot` int NOT NULL AUTO_INCREMENT,
  `num_entrepot` varchar(11) NOT NULL,
  `nom_entrepot` varchar(60) NOT NULL,
  PRIMARY KEY (`id_entrepot`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrepot`
--

LOCK TABLES `entrepot` WRITE;
/*!40000 ALTER TABLE `entrepot` DISABLE KEYS */;
INSERT INTO `entrepot` VALUES (3,'vx-3','Casa_1'),(4,'VTT-8','Casa_12'),(6,'vtx-77','Rabat_2'),(7,'92-78','Fes'),(8,'mt8','Casablanca'),(9,'X-336','Marjan Californie'),(10,'vtx-77','Fes'),(11,'99','Marjan Californie');
/*!40000 ALTER TABLE `entrepot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fournisseur` (
  `id_fournisseur` int NOT NULL AUTO_INCREMENT,
  `nom_fournisseur` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `tel` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `adresse` varchar(80) NOT NULL,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fournisseur`
--

LOCK TABLES `fournisseur` WRITE;
/*!40000 ALTER TABLE `fournisseur` DISABLE KEYS */;
INSERT INTO `fournisseur` VALUES (2,'Claude','Emmanuel','95995959','mop@gmail.com','Moustakbal'),(5,'MorningSatr','Claude','0711474432','mopenoclaude@gmail.com','Maroc, moustakbal');
/*!40000 ALTER TABLE `fournisseur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gerant`
--

DROP TABLE IF EXISTS `gerant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gerant` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nom_admin` varchar(45) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `adresse` varchar(90) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerant`
--

LOCK TABLES `gerant` WRITE;
/*!40000 ALTER TABLE `gerant` DISABLE KEYS */;
INSERT INTO `gerant` VALUES (3,'Loic','0645456','mop@gmail.com','moustakbal','mop'),(5,'Claude','07337733','mopeno@gmail.com','Maroc','mops'),(6,'Lolo','99898','mops@gmall','France','moo'),(7,'Winds','67688','jjhjhjhjh#@ghhg','oioi','$SDgXCauZvNw$J@(MV');
/*!40000 ALTER TABLE `gerant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produit` (
  `id_prod` int NOT NULL AUTO_INCREMENT,
  `nom_prod` varchar(80) NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` VALUES (10,'Carte SIM'),(16,'Telephone'),(19,'Iphone 14'),(20,'Macbook'),(21,'Samsung'),(23,'Iphone 14 Pro'),(25,'Morning'),(26,'Iphone 14 Pro Max'),(27,'Iphone 13 Pro Max'),(28,'mops'),(29,'Carte memoire'),(30,'Carte'),(31,'Iphone 14 Pro Max'),(32,'Iphone 16'),(33,'Iphone 1488'),(34,'Telephone gg'),(35,'Telephone gg');
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsable_de_stock`
--

DROP TABLE IF EXISTS `responsable_de_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `responsable_de_stock` (
  `id_resp` int NOT NULL AUTO_INCREMENT,
  `nom_resp` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `tel` varchar(45) NOT NULL,
  `adresse` varchar(80) NOT NULL,
  PRIMARY KEY (`id_resp`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsable_de_stock`
--

LOCK TABLES `responsable_de_stock` WRITE;
/*!40000 ALTER TABLE `responsable_de_stock` DISABLE KEYS */;
INSERT INTO `responsable_de_stock` VALUES (1,'Lombilo','William','989786','maroc');
/*!40000 ALTER TABLE `responsable_de_stock` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-05 16:46:01
