-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 25 Août 2015 à 15:32
-- Version du serveur :  5.6.17-log
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bd_corro_zone`
--

-- --------------------------------------------------------

--
-- Structure de la table `ami`
--

CREATE TABLE IF NOT EXISTS `ami` (
  `mail_inviteur` varchar(60) NOT NULL DEFAULT '',
  `mail_invite` varchar(60) NOT NULL DEFAULT '',
  `date_invitation` datetime DEFAULT NULL,
  PRIMARY KEY (`mail_inviteur`,`mail_invite`),
  KEY `mail_invite` (`mail_invite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ami`
--

INSERT INTO `ami` (`mail_inviteur`, `mail_invite`, `date_invitation`) VALUES
('ahoussi.say@telecom-bretagne.eu', 'serge@telecom-bretagne.eu', '2015-07-27 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

CREATE TABLE IF NOT EXISTS `conversation` (
  `conversation_id` int(11) NOT NULL AUTO_INCREMENT,
  `initiateur` varchar(60) NOT NULL,
  `titre` varchar(120) DEFAULT NULL,
  `date_debut` date NOT NULL,
  PRIMARY KEY (`conversation_id`),
  KEY `initiateur` (`initiateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `correction`
--

CREATE TABLE IF NOT EXISTS `correction` (
  `id_correction` bigint(20) unsigned NOT NULL,
  `type` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `uv` varchar(60) NOT NULL,
  `num_uv` int(11) NOT NULL,
  `visibilite` varchar(10) DEFAULT NULL COMMENT 'defini la visibilite de l correction',
  `date_en_ligne` date DEFAULT NULL COMMENT 'date de mise en ligne ',
  `derniere_vue` date DEFAULT NULL COMMENT 'derniere consultation de la correction ',
  `lien` varchar(260) NOT NULL COMMENT 'lien d acces',
  PRIMARY KEY (`id_correction`),
  KEY `id_correction` (`id_correction`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='enregistrement des correction';

-- --------------------------------------------------------

--
-- Structure de la table `corro_auteur`
--

CREATE TABLE IF NOT EXISTS `corro_auteur` (
  `id_corro` bigint(20) unsigned NOT NULL,
  `mail_auteur` varchar(60) NOT NULL,
  PRIMARY KEY (`id_corro`,`mail_auteur`),
  KEY `mail_auteur` (`mail_auteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `texte`
--

CREATE TABLE IF NOT EXISTS `texte` (
  `mail_emeteur` varchar(60) NOT NULL DEFAULT '',
  `convers_id` int(11) NOT NULL,
  `date_emission` date NOT NULL,
  `txt` text,
  PRIMARY KEY (`mail_emeteur`,`convers_id`),
  KEY `convers_id` (`convers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `pseudo` varchar(60) DEFAULT NULL,
  `niveau` int(11) NOT NULL,
  `nb_connexion` int(11) NOT NULL,
  `token` varchar(20) NOT NULL,
  PRIMARY KEY (`mail`),
  UNIQUE KEY `pseudo` (`pseudo`),
  KEY `mail` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`mail`, `pass`, `pseudo`, `niveau`, `nb_connexion`, `token`) VALUES
('ahoussi.say@telecom-bretagne.eu', 'Innocente1992', '', 0, 0, ''),
('serge@telecom-bretagne.eu', '7681e5c339d62a2a607d90454bdc01a4c6412a91', 'Aucun', 0, 0, 'ywKhzIO8uor24uJCKfR3');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ami`
--
ALTER TABLE `ami`
  ADD CONSTRAINT `ami_ibfk_1` FOREIGN KEY (`mail_inviteur`) REFERENCES `utilisateur` (`mail`),
  ADD CONSTRAINT `ami_ibfk_2` FOREIGN KEY (`mail_invite`) REFERENCES `utilisateur` (`mail`);

--
-- Contraintes pour la table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `conversation_ibfk_1` FOREIGN KEY (`initiateur`) REFERENCES `utilisateur` (`mail`);

--
-- Contraintes pour la table `corro_auteur`
--
ALTER TABLE `corro_auteur`
  ADD CONSTRAINT `corro_auteur_ibfk_1` FOREIGN KEY (`id_corro`) REFERENCES `correction` (`id_correction`),
  ADD CONSTRAINT `corro_auteur_ibfk_2` FOREIGN KEY (`mail_auteur`) REFERENCES `utilisateur` (`mail`);

--
-- Contraintes pour la table `texte`
--
ALTER TABLE `texte`
  ADD CONSTRAINT `texte_ibfk_1` FOREIGN KEY (`mail_emeteur`) REFERENCES `utilisateur` (`mail`),
  ADD CONSTRAINT `texte_ibfk_2` FOREIGN KEY (`convers_id`) REFERENCES `conversation` (`conversation_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
