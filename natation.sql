-- MySQL dump 10.13  Distrib 8.4.4, for Linux (x86_64)
--
-- Host: localhost    Database: natation
-- ------------------------------------------------------
-- Server version	8.4.4

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin','482f7629a2511d23ef4e958b13a5ba54bdba06f2');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbitres`
--

DROP TABLE IF EXISTS `arbitres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbitres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(20) DEFAULT NULL,
  `nom` varchar(15) DEFAULT NULL,
  `nationalite` varchar(20) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbitres`
--

LOCK TABLES `arbitres` WRITE;
/*!40000 ALTER TABLE `arbitres` DISABLE KEYS */;
INSERT INTO `arbitres` VALUES (1,'Moussa','Diop','Sénégal','H'),(2,'Fatou','Ndoye','Sénégal','F'),(3,'Jean','Dupont','France','H'),(4,'Ahmed','Mahmoud','Égypte','H'),(5,'Awa','Ba','Sénégal','F'),(6,'Ousmane','Gaye','Sénégal','H'),(7,'Ali','Toure','Côte d\'Ivoire','H'),(8,'Sarah','Johnson','USA','F'),(9,'David','Smith','Canada','H'),(10,'Anna','Petrov','Russie','F'),(11,'Carlos','Fernandez','Espagne','H'),(12,'Jin','Zhang','Chine','H'),(13,'Hiroshi','Tanaka','Japon','H'),(14,'Michael','Brown','Australie','H'),(15,'John','Doe','USA','H'),(16,'Elena','Kovalev','Russie','F'),(17,'Nadia','El-Sayed','Égypte','F'),(18,'Oumar','Cissé','Mali','H'),(19,'Sophia','Anderson','Canada','F'),(20,'Paulo','Rodriguez','Brésil','H'),(21,'Abdoulaye','Sow','Sénégal','H'),(22,'Youssef','Hassan','Maroc','H'),(23,'Chen','Wei','Chine','H'),(24,'Takeshi','Sato','Japon','H'),(25,'Alessandro','Rossi','Italie','H'),(26,'Fernando','Silva','Brésil','H'),(27,'Hans','Krause','Allemagne','H'),(28,'Jack','Thompson','Australie','H'),(29,'Samuel','Owusu','Ghana','H'),(30,'Maria','Fernandez','Espagne','F');
/*!40000 ALTER TABLE `arbitres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entraineurs`
--

DROP TABLE IF EXISTS `entraineurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entraineurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(25) DEFAULT NULL,
  `nom` varchar(15) DEFAULT NULL,
  `nationalite` varchar(25) DEFAULT NULL,
  `idNageur` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entraineur_nageur` (`idNageur`),
  CONSTRAINT `fk_entraineur_nageur` FOREIGN KEY (`idNageur`) REFERENCES `nageurs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `id_nageur` FOREIGN KEY (`idNageur`) REFERENCES `nageurs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entraineurs`
--

LOCK TABLES `entraineurs` WRITE;
/*!40000 ALTER TABLE `entraineurs` DISABLE KEYS */;
INSERT INTO `entraineurs` VALUES (1,'Bob','Bowman','USA',1),(2,'Bob','Bowman','USA',2),(3,'Ben','Titley','Canada',3),(4,'Fernando','Vanzella','Brésil',4),(5,'Gustavo','Roldán','Argentine',5),(6,'Romain','Barnier','France',6),(7,'Mel','Marshall','Royaume-Uni',7),(8,'Stefano','Morini','Italie',8),(9,'Dirk','Lange','Allemagne',9),(10,'Carl','Jenkinson','Suède',10),(11,'Andrey','Vorontsov','Russie',11),(12,'Graham','Hill','Afrique du Sud',12),(13,'Sherif','Habib','Égypte',13),(14,'Amadou','Diop','Sénégal',14),(15,'Ali','Jaziri','Tunisie',15),(16,'Tunde','Olufemi','Nigeria',16),(17,'Norimasa','Hiraki','Japon',17),(18,'Zhou','Jin','Chine',18),(19,'Pradeep','Kumar','Inde',19),(20,'Sung','Kim','Corée du Sud',20),(21,'Michael','Bohl','Australie',21),(22,'Gary','Harington','Nouvelle-Zélande',22),(23,'Bob','Bowman','USA',23),(24,'Ben','Titley','Canada',24),(25,'Fernando','Vanzella','Brésil',25),(26,'Romain','Barnier','France',26),(27,'Mel','Marshall','Royaume-Uni',27),(28,'Stefano','Morini','Italie',28),(29,'Carl','Jenkinson','Suède',29),(30,'Graham','Hill','Afrique du Sud',30),(31,'Sherif','Habib','Égypte',31),(32,'Amadou','Diop','Sénégal',32),(33,'Tunde','Olufemi','Nigeria',33),(34,'Norimasa','Hiraki','Japon',34),(35,'Zhou','Jin','Chine',35),(36,'Pradeep','Kumar','Inde',36),(37,'Sung','Kim','Corée du Sud',37),(38,'Michael','Bohl','Australie',38),(39,'Gary','Harington','Nouvelle-Zélande',39);
/*!40000 ALTER TABLE `entraineurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `epreuves`
--

DROP TABLE IF EXISTS `epreuves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `epreuves` (
  `id` int NOT NULL,
  `date` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `style` varchar(50) DEFAULT NULL,
  `phase` varchar(20) DEFAULT NULL,
  `idPiscine` int DEFAULT NULL,
  `distance` int DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_epreuves_piscine` (`idPiscine`),
  CONSTRAINT `fk_epreuves_piscine` FOREIGN KEY (`idPiscine`) REFERENCES `piscines` (`id`) ON DELETE SET NULL,
  CONSTRAINT `idpiscine` FOREIGN KEY (`idPiscine`) REFERENCES `piscines` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `epreuves`
--

LOCK TABLES `epreuves` WRITE;
/*!40000 ALTER TABLE `epreuves` DISABLE KEYS */;
INSERT INTO `epreuves` VALUES (1,'2025-07-24','09:00:00','Nage Libre','Séries',1,50,'Épreuve Masculine'),(2,'2025-07-24','09:30:00','Nage Libre','Séries',1,50,'Épreuve Féminine'),(3,'2025-07-25','10:00:00','Nage Libre','Séries',1,100,'Épreuve Masculine'),(4,'2025-07-25','10:30:00','Nage Libre','Séries',1,100,'Épreuve Féminine'),(5,'2025-07-26','11:00:00','Nage Libre','Séries',1,200,'Épreuve Masculine'),(6,'2025-07-26','11:30:00','Nage Libre','Séries',1,200,'Épreuve Féminine'),(7,'2025-07-27','12:00:00','Nage Libre','Séries',1,400,'Épreuve Masculine'),(8,'2025-07-27','12:30:00','Nage Libre','Séries',1,400,'Épreuve Féminine'),(9,'2025-07-28','14:00:00','Nage Libre','Séries',1,800,'Épreuve Masculine'),(10,'2025-07-28','14:30:00','Nage Libre','Séries',1,800,'Épreuve Féminine'),(11,'2025-07-29','15:00:00','Nage Libre','Séries',1,1500,'Épreuve Masculine'),(12,'2025-07-29','15:30:00','Nage Libre','Séries',1,1500,'Épreuve Féminine'),(13,'2025-07-24','10:00:00','Papillon','Séries',1,100,'Épreuve Masculine'),(14,'2025-07-24','10:30:00','Papillon','Séries',1,100,'Épreuve Féminine'),(15,'2025-07-25','11:00:00','Papillon','Séries',1,200,'Épreuve Masculine'),(16,'2025-07-25','11:30:00','Papillon','Séries',1,200,'Épreuve Féminine'),(17,'2025-07-26','09:00:00','Dos','Séries',1,100,'Épreuve Masculine'),(18,'2025-07-26','09:30:00','Dos','Séries',1,100,'Épreuve Féminine'),(19,'2025-07-27','10:00:00','Dos','Séries',1,200,'Épreuve Masculine'),(20,'2025-07-27','10:30:00','Dos','Séries',1,200,'Épreuve Féminine'),(21,'2025-07-28','11:00:00','Brasse','Séries',1,100,'Épreuve Masculine'),(22,'2025-07-28','11:30:00','Brasse','Séries',1,100,'Épreuve Féminine'),(23,'2025-07-29','12:00:00','Brasse','Séries',1,200,'Épreuve Masculine'),(24,'2025-07-29','12:30:00','Brasse','Séries',1,200,'Épreuve Féminine'),(25,'2025-07-30','13:00:00','4 Nages','Séries',1,200,'Épreuve Masculine'),(26,'2025-07-30','13:30:00','4 Nages','Séries',1,200,'Épreuve Féminine'),(27,'2025-07-31','14:00:00','4 Nages','Séries',1,400,'Épreuve Masculine'),(28,'2025-07-31','14:30:00','4 Nages','Séries',1,400,'Épreuve Féminine'),(29,'2025-08-01','15:00:00','4x100m Nage Libre','Finale',1,4,'Épreuve Masculine'),(30,'2025-08-01','15:30:00','4x100m Nage Libre','Finale',1,4,'Épreuve Féminine'),(31,'2025-08-02','16:00:00','4x200m Nage Libre','Finale',1,4,'Épreuve Masculine'),(32,'2025-08-02','16:30:00','4x200m Nage Libre','Finale',1,4,'Épreuve Féminine'),(33,'2025-08-03','17:00:00','4x100m 4 Nages','Finale',1,4,'Épreuve Masculine'),(34,'2025-08-03','17:30:00','4x100m 4 Nages','Finale',1,4,'Épreuve Féminine'),(35,'2025-08-04','08:00:00','Eau Libre','Finale',1,10000,'Épreuve Masculine'),(36,'2025-08-04','08:30:00','Eau Libre','Finale',1,10000,'Épreuve Féminine'),(37,'2025-08-05','10:00:00','4x100m Nage Libre Mixte','Finale',1,4,'Relais Mixte');
/*!40000 ALTER TABLE `epreuves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juges`
--

DROP TABLE IF EXISTS `juges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `juges` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(20) DEFAULT NULL,
  `nom` varchar(15) DEFAULT NULL,
  `nationalite` varchar(20) DEFAULT NULL,
  `sexe` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juges`
--

LOCK TABLES `juges` WRITE;
/*!40000 ALTER TABLE `juges` DISABLE KEYS */;
INSERT INTO `juges` VALUES (1,'Michael','Johnson','USA','M'),(2,'Sophie','Dubois','France','F'),(3,'Carlos','Gomez','Espagne','M'),(4,'Anna','Kovalenko','Russie','F'),(5,'Kenji','Takahashi','Japon','M'),(6,'Maria','Fernandez','Brésil','F'),(7,'David','Smith','Canada','M'),(8,'Elena','Rossi','Italie','F'),(9,'Ahmed','Hassan','Égypte','M'),(10,'Li','Wei','Chine','M');
/*!40000 ALTER TABLE `juges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medailles`
--

DROP TABLE IF EXISTS `medailles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medailles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idNageur` int NOT NULL,
  `type` varchar(15) NOT NULL,
  `epreuve` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_medailles_nageur` (`idNageur`),
  CONSTRAINT `fk_medailles_nageur` FOREIGN KEY (`idNageur`) REFERENCES `nageurs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medailles`
--

LOCK TABLES `medailles` WRITE;
/*!40000 ALTER TABLE `medailles` DISABLE KEYS */;
INSERT INTO `medailles` VALUES (1,1,'Or','50m nage libre'),(2,2,'Argent','50m nage libre'),(3,3,'Bronze','50m nage libre'),(4,4,'Or','50m dos'),(5,5,'Argent','50m dos'),(6,6,'Bronze','50m dos'),(7,7,'Or','50m brasse'),(8,8,'Argent','50m brasse'),(9,9,'Bronze','50m brasse'),(10,10,'Or','50m papillon'),(11,11,'Argent','50m papillon'),(12,12,'Bronze','50m papillon');
/*!40000 ALTER TABLE `medailles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nageurs`
--

DROP TABLE IF EXISTS `nageurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nageurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(35) DEFAULT NULL,
  `nom` varchar(15) DEFAULT NULL,
  `nationalite` varchar(35) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `poids` float DEFAULT NULL,
  `taille` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nageurs`
--

LOCK TABLES `nageurs` WRITE;
/*!40000 ALTER TABLE `nageurs` DISABLE KEYS */;
INSERT INTO `nageurs` VALUES (1,'Caeleb','Dressel','USA','1996-08-16','M',88,1.91),(2,'Michael','Phelps','USA','1985-06-30','M',88,1.93),(3,'Santo','Condorelli','Canada','1995-01-17','M',80,1.88),(4,'Bruno','Fratus','Brésil','1989-06-30','M',80,1.87),(5,'Federico','Grabich','Argentine','1990-03-26','M',83,1.82),(6,'Florent','Manaudou','France','1990-11-12','M',99,1.99),(7,'Ben','Proud','Royaume-Uni','1994-09-21','M',87,1.85),(8,'Gregorio','Paltrinieri','Italie','1994-09-05','M',72,1.84),(9,'Paul','Biedermann','Allemagne','1986-08-07','M',93,1.94),(10,'Sarah','Sjöström','Suède','1993-08-17','F',68,1.86),(11,'Vladimir','Morozov','Russie','1992-06-16','M',88,1.87),(12,'Chad','Le Clos','Afrique du Sud','1992-04-12','M',80,1.8),(13,'Farida','Osman','Égypte','1995-01-18','F',65,1.75),(14,'Samba','Ndiaye','Sénégal','1998-05-20','M',78,1.82),(15,'Oussama','Mellouli','Tunisie','1984-02-16','M',84,1.83),(16,'Abiola','Adigun','Nigeria','1997-09-30','M',79,1.78),(17,'Kosuke','Hagino','Japon','1994-08-15','M',75,1.77),(18,'Sun','Yang','Chine','1991-12-01','M',89,1.98),(19,'Srihari','Nataraj','Inde','2000-01-16','M',76,1.81),(20,'Park','Tae-hwan','Corée du Sud','1989-09-27','M',78,1.83),(21,'Kyle','Chalmers','Australie','1998-06-25','M',92,1.94),(22,'Lewis','Clareburt','Nouvelle-Zélande','1999-07-04','M',80,1.82),(23,'Katie','Ledecky','USA','1997-03-17','F',70,1.83),(24,'Penny','Oleksiak','Canada','2000-06-13','F',68,1.86),(25,'Etiene','Medeiros','Brésil','1991-05-17','F',64,1.76),(26,'Charlotte','Bonnet','France','1995-02-14','F',68,1.78),(27,'Rebecca','Adlington','Royaume-Uni','1989-02-17','F',70,1.79),(28,'Federica','Pellegrini','Italie','1988-08-05','F',65,1.77),(29,'Therese','Alshammar','Suède','1977-08-26','F',64,1.8),(30,'Tatjana','Schoenmaker','Afrique du Sud','1997-07-09','F',67,1.81),(31,'Rana','El Husseiny','Égypte','1996-11-22','F',62,1.74),(32,'Aissatou','Fall','Sénégal','1999-09-12','F',65,1.76),(33,'Blessing','Okeke','Nigeria','2001-01-20','F',63,1.73),(34,'Rikako','Ikee','Japon','2000-07-04','F',60,1.71),(35,'Liu','Xiang','Chine','1996-07-01','F',64,1.77),(36,'Shivani','Kataria','Inde','1997-05-27','F',62,1.74),(37,'Jung','So-ra','Corée du Sud','1995-08-15','F',65,1.75),(38,'Emma','McKeon','Australie','1994-05-24','F',67,1.78),(39,'Erika','Fairweather','Nouvelle-Zélande','2003-12-31','F',66,1.75);
/*!40000 ALTER TABLE `nageurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `piscines`
--

DROP TABLE IF EXISTS `piscines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `piscines` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `longueur` int DEFAULT NULL,
  `largeur` int DEFAULT NULL,
  `profondeur` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `piscines`
--

LOCK TABLES `piscines` WRITE;
/*!40000 ALTER TABLE `piscines` DISABLE KEYS */;
INSERT INTO `piscines` VALUES (1,'Piscine Olympique de Dakar',50,25,3),(2,'Piscine Nationale de Pikine',50,25,2.8),(3,'Piscine du Stade Léopold Sédar Senghor',50,25,3),(4,'Piscine du Club Olympique de Thiès',50,25,2.9),(5,'Piscine du Centre Sportif de Diamniadio',50,25,3);
/*!40000 ALTER TABLE `piscines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `records`
--

DROP TABLE IF EXISTS `records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `records` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idNageur` int NOT NULL,
  `type` varchar(25) DEFAULT NULL,
  `valeur` float NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_records_nageur` (`idNageur`),
  CONSTRAINT `fk_records_nageur` FOREIGN KEY (`idNageur`) REFERENCES `nageurs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `id_ageur` FOREIGN KEY (`idNageur`) REFERENCES `nageurs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `records`
--

LOCK TABLES `records` WRITE;
/*!40000 ALTER TABLE `records` DISABLE KEYS */;
INSERT INTO `records` VALUES (16,1,'Record National',21.07,'2025-07-24'),(17,6,'Record National',23.2,'2025-07-24'),(18,11,'Record National',52.45,'2025-07-26'),(19,16,'Record National',56.2,'2025-07-28'),(20,21,'Record National',126.06,'2025-07-30'),(21,2,'Record Continental',21.4,'2025-07-24'),(22,7,'Record Continental',23.45,'2025-07-24'),(23,12,'Record Continental',52.8,'2025-07-26'),(24,17,'Record Continental',56.45,'2025-07-28'),(25,22,'Record Continental',127.07,'2025-07-30'),(26,3,'Record Mondial',21.6,'2025-07-24'),(27,8,'Record Mondial',23.75,'2025-07-24'),(28,13,'Record Mondial',53,'2025-07-26'),(29,18,'Record Mondial',56.8,'2025-07-28'),(30,23,'Record Mondial',128.08,'2025-07-30');
/*!40000 ALTER TABLE `records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `score`
--

DROP TABLE IF EXISTS `score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `score` (
  `id` int NOT NULL AUTO_INCREMENT,
  `temps (secondes)` float DEFAULT NULL,
  `classement` int DEFAULT NULL,
  `idNageur` int DEFAULT NULL,
  `idEpreuve` int DEFAULT NULL,
  `qualification` enum('Oui','Non','Finale') NOT NULL DEFAULT 'Non',
  PRIMARY KEY (`id`),
  KEY `fk_score_nageur` (`idNageur`),
  KEY `fk_score_epreuve` (`idEpreuve`),
  CONSTRAINT `fk_score_epreuve` FOREIGN KEY (`idEpreuve`) REFERENCES `epreuves` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_score_nageur` FOREIGN KEY (`idNageur`) REFERENCES `nageurs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `idEpreuve` FOREIGN KEY (`idEpreuve`) REFERENCES `epreuves` (`id`),
  CONSTRAINT `idNageur` FOREIGN KEY (`idNageur`) REFERENCES `nageurs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `score`
--

LOCK TABLES `score` WRITE;
/*!40000 ALTER TABLE `score` DISABLE KEYS */;
INSERT INTO `score` VALUES (1,21.07,1,1,1,'Finale'),(2,21.4,2,2,1,'Finale'),(3,21.6,3,3,1,'Oui'),(4,21.85,4,4,1,'Oui'),(5,22.1,5,5,1,'Non'),(6,23.2,1,6,2,'Finale'),(7,23.45,2,7,2,'Finale'),(8,23.75,3,8,2,'Oui'),(9,24,4,9,2,'Oui'),(10,24.3,5,10,2,'Non'),(11,52.45,1,11,5,'Finale'),(12,52.8,2,12,5,'Finale'),(13,53,3,13,5,'Oui'),(14,53.4,4,14,5,'Oui'),(15,53.9,5,15,5,'Non'),(16,56.2,1,16,14,'Finale'),(17,56.45,2,17,14,'Finale'),(18,56.8,3,18,14,'Oui'),(19,57.1,4,19,14,'Oui'),(20,57.5,5,20,14,'Non'),(21,2.06,1,21,23,'Finale'),(22,2.07,2,22,23,'Finale'),(23,2.08,3,23,23,'Oui'),(24,2.09,4,24,23,'Oui'),(25,2.1,5,25,23,'Non');
/*!40000 ALTER TABLE `score` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-25 12:06:18
