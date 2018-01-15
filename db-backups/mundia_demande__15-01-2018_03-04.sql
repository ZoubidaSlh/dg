# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.18)
# Database: mundia_demande
# Generation Time: 2018-01-15 03:04:18 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table action_demande
# ------------------------------------------------------------

DROP TABLE IF EXISTS `action_demande`;

CREATE TABLE `action_demande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_demande` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date_action` datetime NOT NULL,
  `id_etat` int(11) NOT NULL,
  `action` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `action_demande` WRITE;
/*!40000 ALTER TABLE `action_demande` DISABLE KEYS */;

INSERT INTO `action_demande` (`id`, `id_demande`, `id_utilisateur`, `email`, `date_action`, `id_etat`, `action`)
VALUES
	(5,4,10,'bouchra.dihaji2017@gmail.com','2018-01-13 00:00:00',7,'En cours'),
	(6,4,3,'hatim.setti@gmail.com','2018-01-13 03:24:20',8,'Validee'),
	(7,4,3,'h.setti@mundiapolis.ma','2018-01-13 03:26:08',8,'Refusee');

/*!40000 ALTER TABLE `action_demande` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table article
# ------------------------------------------------------------

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prix` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table classe
# ------------------------------------------------------------

DROP TABLE IF EXISTS `classe`;

CREATE TABLE `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annee` int(11) NOT NULL,
  `semestre` varchar(50) NOT NULL,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table demande
# ------------------------------------------------------------

DROP TABLE IF EXISTS `demande`;

CREATE TABLE `demande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_demandeur` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `date_creation` date NOT NULL,
  `id_departement` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_etat` int(11) NOT NULL,
  `id_intervenant` int(11) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `commentaire` text,
  `devis1` varchar(255) DEFAULT NULL,
  `devis2` varchar(255) DEFAULT NULL,
  `devis3` varchar(255) DEFAULT NULL,
  `note_presentation` text,
  `fournisseur` varchar(60) DEFAULT NULL,
  `periode` int(11) DEFAULT NULL,
  `type_conge` varchar(60) DEFAULT NULL,
  `raison_conge` varchar(255) DEFAULT '',
  `interim` varchar(255) DEFAULT '',
  `local_reservation` varchar(50) DEFAULT '',
  `materiel_reservation` varchar(50) DEFAULT '',
  `date_evenement` date DEFAULT NULL,
  `debut_evenement` datetime DEFAULT NULL,
  `fin_evenement` datetime DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `motif` varchar(255) DEFAULT NULL,
  `montant_total` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `demande` WRITE;
/*!40000 ALTER TABLE `demande` DISABLE KEYS */;

INSERT INTO `demande` (`id`, `id_demandeur`, `email`, `date_creation`, `id_departement`, `id_type`, `id_etat`, `id_intervenant`, `titre`, `commentaire`, `devis1`, `devis2`, `devis3`, `note_presentation`, `fournisseur`, `periode`, `type_conge`, `raison_conge`, `interim`, `local_reservation`, `materiel_reservation`, `date_evenement`, `debut_evenement`, `fin_evenement`, `type`, `description`, `file_url`, `motif`, `montant_total`)
VALUES
	(4,11,'z.aitsaleh@mundiapolis.ma','2018-01-13',3,3,8,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,'pay','maladie','hatim.setti@gmail.com','','','0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,'hotmail.com',NULL,'pas de solde',NULL),
	(5,1,'z.aitsaleh@mundiapolis.ma','2018-01-14',2,4,5,11,'',NULL,'','','','','',NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(6,1,'z.aitsaleh@mundiapolis.ma','2018-01-14',2,4,5,11,'',NULL,'','','','','',NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(7,1,'z.aitsaleh@mundiapolis.ma','2018-01-14',2,4,5,11,'',NULL,'','','','','',NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(8,11,'z.aitsaleh@mundiapolis.ma','2018-01-15',1,4,5,11,'Demande Materiel IOT',NULL,'','','','','ELECTRO',NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(9,11,'z.aitsaleh@mundiapolis.ma','2018-01-15',1,4,5,11,'Achat 18002',NULL,'','','','','Bureau Maroc',NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `demande` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table demande_achat
# ------------------------------------------------------------

DROP TABLE IF EXISTS `demande_achat`;

CREATE TABLE `demande_achat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_demandeur` int(11) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_Creation` date NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_etat` int(11) NOT NULL,
  `id_intervenant` int(11) NOT NULL,
  `devis1` varchar(200) NOT NULL,
  `devis2` varchar(200) NOT NULL,
  `devis3` varchar(200) NOT NULL,
  `note_presentation` varchar(200) NOT NULL,
  `fournisseur` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `demande_achat` WRITE;
/*!40000 ALTER TABLE `demande_achat` DISABLE KEYS */;

INSERT INTO `demande_achat` (`id`, `id_demandeur`, `id_departement`, `email`, `date_Creation`, `id_type`, `id_etat`, `id_intervenant`, `devis1`, `devis2`, `devis3`, `note_presentation`, `fournisseur`)
VALUES
	(1,1,1,'h.setti@mundiapolis.ma','2017-12-24',2,1,2,'','','','','');

/*!40000 ALTER TABLE `demande_achat` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table demande_conges
# ------------------------------------------------------------

DROP TABLE IF EXISTS `demande_conges`;

CREATE TABLE `demande_conges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_demandeur` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_etat` int(11) NOT NULL,
  `id_intervenant` int(11) NOT NULL,
  `type_conges` varchar(50) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `raison` varchar(50) NOT NULL,
  `interim` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ID_Demandeur` (`id_demandeur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table demande_it
# ------------------------------------------------------------

DROP TABLE IF EXISTS `demande_it`;

CREATE TABLE `demande_it` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_demandeur` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_etat` int(11) NOT NULL,
  `id_intervenant` int(11) NOT NULL,
  `date_reservation` date NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `equipement` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ID_Demandeur` (`id_departement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table demande_reservation
# ------------------------------------------------------------

DROP TABLE IF EXISTS `demande_reservation`;

CREATE TABLE `demande_reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_departement` int(11) NOT NULL,
  `id_demandeur` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `date_creation` date NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_etat` int(11) NOT NULL,
  `id_intervenant` int(11) NOT NULL,
  `date_reservation` date NOT NULL,
  `lieu` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ID_Demandeur` (`id_demandeur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table demande_scolarite
# ------------------------------------------------------------

DROP TABLE IF EXISTS `demande_scolarite`;

CREATE TABLE `demande_scolarite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_demandeur` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date_creation` date NOT NULL,
  `id_departement` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_etat` int(11) NOT NULL,
  `id_intervenant` int(11) NOT NULL,
  `titre` varchar(60) NOT NULL,
  `commentaire` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `demande_scolarite` WRITE;
/*!40000 ALTER TABLE `demande_scolarite` DISABLE KEYS */;

INSERT INTO `demande_scolarite` (`id`, `id_demandeur`, `email`, `date_creation`, `id_departement`, `id_type`, `id_etat`, `id_intervenant`, `titre`, `commentaire`)
VALUES
	(13,1,'','2017-12-11',2,1,3,1,'Attestation de scolarité','n;'),
	(14,1,'','2017-12-11',2,1,3,1,'Attestation de scolarité',''),
	(16,2,'h.setti@mundiapolis.ma','2017-12-24',2,1,3,3,'Attestation de scolarité','hgkh'),
	(17,2,'h.setti@mundiapolis.ma','2017-12-24',2,1,3,3,'Attestation de scolarité','hikj');

/*!40000 ALTER TABLE `demande_scolarite` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table departement
# ------------------------------------------------------------

DROP TABLE IF EXISTS `departement`;

CREATE TABLE `departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `departement` WRITE;
/*!40000 ALTER TABLE `departement` DISABLE KEYS */;

INSERT INTO `departement` (`id`, `nom`)
VALUES
	(1,'Ecole d\'ingénierie'),
	(2,'Business school'),
	(3,'Faculté des sciences de la santé'),
	(4,'Faculté des sciences politiques');

/*!40000 ALTER TABLE `departement` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table equipement
# ------------------------------------------------------------

DROP TABLE IF EXISTS `equipement`;

CREATE TABLE `equipement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table etat
# ------------------------------------------------------------

DROP TABLE IF EXISTS `etat`;

CREATE TABLE `etat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type` int(11) NOT NULL,
  `etape` varchar(50) NOT NULL,
  `profile` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `etat` WRITE;
/*!40000 ALTER TABLE `etat` DISABLE KEYS */;

INSERT INTO `etat` (`id`, `id_type`, `etape`, `profile`)
VALUES
	(3,1,'1','service recouvrement'),
	(4,1,'2','service scolarit'),
	(5,4,'1','service it'),
	(6,5,'1','service reservation'),
	(7,3,'1','superieur'),
	(8,3,'2','Directeur RH');

/*!40000 ALTER TABLE `etat` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table etudiant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `etudiant`;

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cne` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `classe` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `etudiant` WRITE;
/*!40000 ALTER TABLE `etudiant` DISABLE KEYS */;

INSERT INTO `etudiant` (`id`, `cne`, `id_filiere`, `nom`, `prenom`, `email`, `classe`)
VALUES
	(2,23767678,1,'HATIM','SETTI','h.setti2@mundiapolis.ma',1),
	(3,2365,1,'CHIBANI','MOHAMED','m.chibani2@mundiapolis.ma',1),
	(4,142536,1,'AIT SALEH','Zoubida','z.aitsaleh@mundiapolis.ma_',1);

/*!40000 ALTER TABLE `etudiant` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table filiere
# ------------------------------------------------------------

DROP TABLE IF EXISTS `filiere`;

CREATE TABLE `filiere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `chef_filiere` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_departement` (`id_departement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table ligne_demande
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ligne_demande`;

CREATE TABLE `ligne_demande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_demande` int(11) NOT NULL,
  `description_article` varchar(50) NOT NULL DEFAULT '',
  `prix_article` decimal(10,0) NOT NULL,
  `quantite` int(11) NOT NULL,
  `observation` varchar(200) NOT NULL,
  `montant` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_demande` (`id_demande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ligne_demande` WRITE;
/*!40000 ALTER TABLE `ligne_demande` DISABLE KEYS */;

INSERT INTO `ligne_demande` (`id`, `id_demande`, `description_article`, `prix_article`, `quantite`, `observation`, `montant`)
VALUES
	(4,7,'desc1',30,10,'observation1',300),
	(5,7,'desc2',40,20,'',800),
	(6,8,'Arduino UNO',300,2,'not observation',600),
	(7,8,'Rasberry Pi 3 B+',550,3,'pour projets IOT',1650),
	(8,8,'Capteur de proximité',50,2,'no observ',100),
	(9,9,'Chaisses',1500,30,'Pour les génie',45000);

/*!40000 ALTER TABLE `ligne_demande` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ligne_equipement
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ligne_equipement`;

CREATE TABLE `ligne_equipement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipement` int(11) NOT NULL,
  `id_demande` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table profile
# ------------------------------------------------------------

DROP TABLE IF EXISTS `profile`;

CREATE TABLE `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;

INSERT INTO `profile` (`id`, `nom`)
VALUES
	(1,'service recouvrement'),
	(2,'service scolarit'),
	(3,'service it'),
	(4,'service reservation'),
	(5,'service conge'),
	(6,'Professeur'),
	(7,'Directeur RH'),
	(8,'achat et logistic');

/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table staff
# ------------------------------------------------------------

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `solde_conges` int(11) DEFAULT NULL,
  `id_superieur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;

INSERT INTO `staff` (`id`, `nom`, `prenom`, `email`, `id_profile`, `solde_conges`, `id_superieur`)
VALUES
	(3,'HATIM','SETTI','h.setti@mundiapolis.ma',7,0,0),
	(4,'CHIBANI','MOHAMED','m.chibani@mundiapolis.ma',0,0,0),
	(5,'MOUCHAWRAB','SAMAR','s.mouchawrab@mundiapolis.ma',5,0,0),
	(6,'ANAS','IT','serviceitmundia@gmail.com',3,0,0),
	(7,'HAJIBA','DOUNIA','servicescolaritemundia@gmail.com',2,0,0),
	(8,'DOUNIA','RECOUVREMENT','servicerecourement@gmail.com',1,0,0),
	(9,'DIHAJI','HAMZA','hatim.setti@gmail.com',6,20,8),
	(10,'DIHAJI','BOUCHRA','bouchra.dihaji2017@gmail.com',6,15,9),
	(11,'AITSALEH','ZOUBIDA','z.aitsaleh@mundiapolis.ma',8,0,9);

/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table type_demande
# ------------------------------------------------------------

DROP TABLE IF EXISTS `type_demande`;

CREATE TABLE `type_demande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `type_demande` WRITE;
/*!40000 ALTER TABLE `type_demande` DISABLE KEYS */;

INSERT INTO `type_demande` (`id`, `nom`)
VALUES
	(1,'demande_scolarite'),
	(2,'demande_achat'),
	(3,'demande_conge'),
	(4,'demande_it'),
	(5,'demande_reservation');

/*!40000 ALTER TABLE `type_demande` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table utilisateur
# ------------------------------------------------------------

DROP TABLE IF EXISTS `utilisateur`;

CREATE TABLE `utilisateur` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
