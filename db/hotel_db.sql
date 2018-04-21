-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2018 at 11:16 PM
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
  PRIMARY KEY (`num_consommable`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `consommation`
--

DROP TABLE IF EXISTS `consommation`;
CREATE TABLE IF NOT EXISTS `consommation` (
  `num_consommable` varchar(12) NOT NULL,
  `date_consommation` datetime NOT NULL,
  `qte` int(11) NOT NULL,
  `total` double NOT NULL,
  `num_chambre` varchar(10) NOT NULL,
  PRIMARY KEY (`num_consommable`),
  KEY `num_chambre` (`num_chambre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `num_facture` varchar(10) NOT NULL,
  `num_reservation` varchar(10) NOT NULL,
  `cin` varchar(8) NOT NULL,
  `date_facture` datetime NOT NULL,
  PRIMARY KEY (`num_facture`),
  KEY `cin` (`cin`),
  KEY `num_reservation` (`num_reservation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `num_reservation` varchar(10) NOT NULL,
  `num_chambre` varchar(10) NOT NULL,
  `cin` varchar(8) NOT NULL,
  `offre` varchar(20) NOT NULL,
  `option_supp` varchar(15) NOT NULL,
  `date_deb` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  PRIMARY KEY (`num_reservation`),
  KEY `num_chambre` (`num_chambre`),
  KEY `cin` (`cin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`cin`) REFERENCES `client` (`cin`),
  ADD CONSTRAINT `facture_ibfk_2` FOREIGN KEY (`num_reservation`) REFERENCES `reservation` (`num_reservation`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`num_chambre`) REFERENCES `chambre` (`num_chambre`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`cin`) REFERENCES `client` (`cin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
