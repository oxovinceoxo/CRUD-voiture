-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 28 jan. 2021 à 11:02
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `id_voiture` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(128) NOT NULL,
  `marque` text NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_voiture`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id_voiture`, `logo`, `marque`, `prix`) VALUES
(1, 'img/bmw.jpg', 'bmw', '30000'),
(2, 'img/audi.jpg', 'audi', '40000'),
(3, 'img/ford.jpg', 'ford', '15000'),
(4, 'img/renault.jpg', 'renault', '8000'),
(5, 'img/peugeot.jpg', 'peugeot', '9000'),
(6, 'img/Volkswagen.jpg', 'Volkswagen', '12000');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
