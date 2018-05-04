-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 03, 2018 at 05:07 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `num_chambre` varchar(10) NOT NULL,
  `vue` varchar(20) NOT NULL,
  `prix_nuit` double NOT NULL,
  `nb_lits` int(1) NOT NULL,
  PRIMARY KEY (`num_chambre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chambre`
--

INSERT INTO `chambre` (`num_chambre`, `vue`, `prix_nuit`, `nb_lits`) VALUES
('25', 'Vue sur mer', 80, 2),
('45', 'Vue sur piscine', 90, 2);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `cin` varchar(8) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `metier` varchar(30) NOT NULL,
  `etat_civil` varchar(10) NOT NULL,
  PRIMARY KEY (`cin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`cin`, `nom`, `metier`, `etat_civil`) VALUES
('04287876', 'Karem Jouini', 'Ingénieur', 'Célibatair'),
('08867888', 'Wassim Mohsni', 'Ingénieur', 'Marié');

-- --------------------------------------------------------

--
-- Table structure for table `consommable`
--

DROP TABLE IF EXISTS `consommable`;
CREATE TABLE IF NOT EXISTS `consommable` (
  `num_consommable` varchar(12) NOT NULL,
  `libelle` varchar(20) NOT NULL,
  `decription` varchar(20) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`num_consommable`),
  UNIQUE KEY `libelle` (`libelle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consommable`
--

INSERT INTO `consommable` (`num_consommable`, `libelle`, `decription`, `prix`) VALUES
('0698787910', 'Eau', 'Prestine 1.5L', 2),
('0786971213', 'Coca-Cola', 'Boisson 75ML', 3);

-- --------------------------------------------------------

--
-- Table structure for table `consommation`
--

DROP TABLE IF EXISTS `consommation`;
CREATE TABLE IF NOT EXISTS `consommation` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `num_consommable` varchar(12) NOT NULL,
  `date_consommation` varchar(10) NOT NULL,
  `qte` int(11) NOT NULL,
  `total` double NOT NULL,
  `num_chambre` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `num_chambre` (`num_chambre`),
  KEY `consommation_ibfk_1` (`num_consommable`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consommation`
--

INSERT INTO `consommation` (`id`, `num_consommable`, `date_consommation`, `qte`, `total`, `num_chambre`) VALUES
(1, '0698787910', '21-04-2017', 2, 4, '45'),
(2, '0786971213', '21-05-2017', 3, 9, '25'),
(6, '0786971213', '21-04-2018', 3, 9, '45'),
(8, '0786971213', '21-04-2018', 2, 6, '25');

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `num_facture` varchar(10) NOT NULL,
  `num_reservation` varchar(10) NOT NULL,
  `cin_receptionniste` int(8) NOT NULL,
  `cin` varchar(8) NOT NULL,
  `date_facture` varchar(10) NOT NULL,
  `etat` enum('Payé','Non Payé') NOT NULL,
  PRIMARY KEY (`num_facture`),
  KEY `cin` (`cin`),
  KEY `num_reservation` (`num_reservation`),
  KEY `cin_receptionniste` (`cin_receptionniste`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`num_facture`, `num_reservation`, `cin_receptionniste`, `cin`, `date_facture`, `etat`) VALUES
('0789109', '85', 7886789, '08867888', '24-04-2017', 'Payé');

-- --------------------------------------------------------

--
-- Table structure for table `receptionniste`
--

DROP TABLE IF EXISTS `receptionniste`;
CREATE TABLE IF NOT EXISTS `receptionniste` (
  `cin` int(8) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  PRIMARY KEY (`login`,`cin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionniste`
--

INSERT INTO `receptionniste` (`cin`, `photo`, `nom`, `prenom`, `age`, `login`, `pwd`) VALUES
(7886789, '', 'Hadouaj', 'Sami', 20, 'Sami87', 'Sami8710');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `num_reservation` varchar(10) NOT NULL,
  `num_chambre` varchar(10) NOT NULL,
  `etat` enum('Active','Finie') NOT NULL,
  `cin` varchar(8) NOT NULL,
  `offre` varchar(20) NOT NULL,
  `option_supp` varchar(15) NOT NULL,
  `date_deb` varchar(10) NOT NULL,
  `date_fin` varchar(10) NOT NULL,
  PRIMARY KEY (`num_reservation`),
  KEY `num_chambre` (`num_chambre`),
  KEY `cin` (`cin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`num_reservation`, `num_chambre`, `etat`, `cin`, `offre`, `option_supp`, `date_deb`, `date_fin`) VALUES
('67', '45', 'Finie', '08867888', 'Demi-pension', 'Aucune', '20-04-2017', '24-04-2017'),
('85', '25', 'Active', '04287876', 'Pension Complète', 'Cabine ', '20-05-2017', '31-05-2017');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consommation`
--
ALTER TABLE `consommation`
  ADD CONSTRAINT `consommation_ibfk_1` FOREIGN KEY (`num_consommable`) REFERENCES `consommable` (`num_consommable`),
  ADD CONSTRAINT `consommation_ibfk_2` FOREIGN KEY (`num_chambre`) REFERENCES `chambre` (`num_chambre`);

--
-- Constraints for table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`num_reservation`) REFERENCES `reservation` (`num_reservation`),
  ADD CONSTRAINT `facture_ibfk_2` FOREIGN KEY (`cin`) REFERENCES `client` (`cin`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`cin`) REFERENCES `client` (`cin`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`num_chambre`) REFERENCES `chambre` (`num_chambre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
