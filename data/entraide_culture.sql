-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 09 juin 2018 à 13:15
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

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
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `publication` timestamp NULL DEFAULT NULL,
  `visible` tinyint(3) UNSIGNED DEFAULT NULL,
  `idarticle` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_iduser` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idarticle`),
  KEY `fk_article_user1_idx` (`user_iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article_has_categ`
--

DROP TABLE IF EXISTS `article_has_categ`;
CREATE TABLE IF NOT EXISTS `article_has_categ` (
  `article_idarticle` int(10) UNSIGNED NOT NULL,
  `categ_idcateg` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`article_idarticle`,`categ_idcateg`),
  KEY `fk_article_has_categ_categ1_idx` (`categ_idcateg`),
  KEY `fk_article_has_categ_article_idx` (`article_idarticle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categ`
--

DROP TABLE IF EXISTS `categ`;
CREATE TABLE IF NOT EXISTS `categ` (
  `idcateg` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcateg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `idpermission` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `level` smallint(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`idpermission`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(60) NOT NULL,
  `pwd` varchar(64) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `permission_idpermission` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  KEY `fk_user_permission1_idx` (`permission_idpermission`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `article_has_categ`
--
ALTER TABLE `article_has_categ`
  ADD CONSTRAINT `fk_article_has_categ_article` FOREIGN KEY (`article_idarticle`) REFERENCES `article` (`idarticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_article_has_categ_categ1` FOREIGN KEY (`categ_idcateg`) REFERENCES `categ` (`idcateg`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_permission1` FOREIGN KEY (`permission_idpermission`) REFERENCES `permission` (`idpermission`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
