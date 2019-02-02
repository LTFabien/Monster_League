-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 02 fév. 2019 à 22:21
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `monster`
--

-- --------------------------------------------------------

--
-- Structure de la table `monsters`
--

DROP TABLE IF EXISTS `monsters`;
CREATE TABLE IF NOT EXISTS `monsters` (
  `Name` varchar(25) NOT NULL,
  `Strength` int(50) NOT NULL,
  `Life` int(50) NOT NULL,
  `Type` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `monsters`
--

INSERT INTO `monsters` (`Name`, `Strength`, `Life`, `Type`) VALUES
('Roucoups', 10, 10, 'Normal/Vol'),
('Sirrush', 250, 1500, 'Fire'),
('Bulbizarre', 150, 400, 'Plante/Poison'),
('Michel', 4800, 1400, 'Vol'),
('Tortank', 1000, 4050, 'Eau'),
('Alakazam', 6000, 1300, 'Psy'),
('Ectoplasma', 4000, 7000, 'Spectre/Poison'),
('Latias', 2000, 4600, 'Dragon/Psy'),
('Latios', 1500, 5000, 'Dragon/Psy');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
