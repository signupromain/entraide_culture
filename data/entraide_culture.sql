-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 juin 2018 à 13:22
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `entraide_culture`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `idarticle` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thetitle` varchar(200) NOT NULL,
  `thetext` text NOT NULL,
  `thedate` datetime DEFAULT CURRENT_TIMESTAMP,
  `utilIdutil` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idarticle`),
  KEY `fk_article_util_idx` (`utilIdutil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idarticle`, `thetitle`, `thetext`, `thedate`, `utilIdutil`) VALUES
(1, 'df', 'dffsfsffdsfsfsfsfsffgggdgdg', '2018-06-25 13:07:32', 1);

-- --------------------------------------------------------

--
-- Structure de la table `util`
--

DROP TABLE IF EXISTS `util`;
CREATE TABLE IF NOT EXISTS `util` (
  `idutil` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thelogin` varchar(80) NOT NULL,
  `thename` varchar(150) NOT NULL,
  `thepwd` char(64) NOT NULL,
  `themail` varchar(200) NOT NULL,
  PRIMARY KEY (`idutil`),
  UNIQUE KEY `thelogin_UNIQUE` (`thelogin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `util`
--

INSERT INTO `util` (`idutil`, `thelogin`, `thename`, `thepwd`, `themail`) VALUES
(1, 'admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_util` FOREIGN KEY (`utilIdutil`) REFERENCES `util` (`idutil`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
