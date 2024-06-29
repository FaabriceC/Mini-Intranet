-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 29 juin 2024 à 20:39
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `intranet`
--

-- --------------------------------------------------------


CREATE DATABASE IF NOT EXISTS `intranet` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;



--
-- Structure de la table `pieces`
--

DROP TABLE IF EXISTS `pieces`;
CREATE TABLE IF NOT EXISTS `pieces` (
  `numeroPiece` int(11) NOT NULL AUTO_INCREMENT,
  `nomPiece` varchar(50) NOT NULL,
  PRIMARY KEY (`numeroPiece`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pieces`
--

INSERT INTO `pieces` (`numeroPiece`, `nomPiece`) VALUES
(1, 'Cale de shape'),
(2, 'Support detecteur securite PR'),
(3, 'Module d\'équilibrage'),
(4, 'Piston hydraulique'),
(5, 'Engrenage de précision'),
(6, 'Garniture de frein'),
(7, 'Plaque de support'),
(8, 'Bobine magnétique'),
(9, 'Vis sans fin'),
(10, 'Roulement à billes'),
(11, 'Cylindre pneumatique'),
(12, 'Joint torique'),
(13, 'Pignon denté'),
(14, 'Ressort de compression'),
(15, 'Câble de traction'),
(16, 'Roue dentée'),
(17, 'Vérin hydraulique'),
(18, 'Palier à roulement'),
(19, 'Platine électronique'),
(20, 'Courroie de transmission'),
(21, 'Capteur de pression'),
(22, 'Entretoise support');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `username`, `password`) VALUES
(2, 'root', '$2y$10$b3PJNk5ShS2XKRhNSFVCUeC1SRLnG9Xk9GI/usSsOX5Z3M2Ofbvoa'),
(3, 'fcannan', '$2y$10$8L75Zqj.DS/K8tmwSMgv3.5Cf/zCOLg6xB04e/2Oay4iA0rXUFT/K');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
