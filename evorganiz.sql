-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 03 Juin 2018 à 06:30
-- Version du serveur :  5.7.22-0ubuntu0.16.04.1
-- Version de PHP :  7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `evorganiz`
--

-- --------------------------------------------------------

--
-- Structure de la table `Buffet`
--

CREATE TABLE `Buffet` (
  `idEvent` int(11) NOT NULL,
  `idMeal` int(11) NOT NULL,
  `pricePerPersonn` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Contact`
--

CREATE TABLE `Contact` (
  `idContact` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `firstnameContact` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lastnameContact` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `streetContact` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `townContact` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `zipCodeContact` int(11) DEFAULT NULL,
  `telContact` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Event`
--

CREATE TABLE `Event` (
  `idEvent` int(11) NOT NULL,
  `personConcerned` varchar(20) CHARACTER SET utf8 DEFAULT ' ',
  `idOccasion` int(11) DEFAULT '0',
  `themeEvent` varchar(20) CHARACTER SET utf8 DEFAULT ' ',
  `dateEvent` date DEFAULT NULL,
  `venueEvent` varchar(20) CHARACTER SET utf8 DEFAULT ' ',
  `budgetMaxEvent` int(11) DEFAULT '0',
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Guest`
--

CREATE TABLE `Guest` (
  `idContact` int(11) NOT NULL,
  `idEvent` int(11) NOT NULL,
  `acceptInvitation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Meal`
--

CREATE TABLE `Meal` (
  `idMeal` int(11) NOT NULL,
  `nameMeal` varchar(50) CHARACTER SET utf8 NOT NULL,
  `typeMeal` varchar(50) CHARACTER SET utf8 NOT NULL,
  `descriptionMeal` varchar(200) DEFAULT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `OccasionEvent`
--

CREATE TABLE `OccasionEvent` (
  `idOccasion` int(11) NOT NULL,
  `nameOccasion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `firstnameUser` varchar(50) DEFAULT NULL,
  `lastnameUser` varchar(50) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `idUser` int(11) NOT NULL,
  `sexUser` varchar(10) NOT NULL DEFAULT 'NotDefined',
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Buffet`
--
ALTER TABLE `Buffet`
  ADD PRIMARY KEY (`idEvent`,`idMeal`),
  ADD KEY `c_buffet2` (`idMeal`);

--
-- Index pour la table `Contact`
--
ALTER TABLE `Contact`
  ADD PRIMARY KEY (`idContact`);

--
-- Index pour la table `Event`
--
ALTER TABLE `Event`
  ADD PRIMARY KEY (`idEvent`);

--
-- Index pour la table `Guest`
--
ALTER TABLE `Guest`
  ADD PRIMARY KEY (`idContact`,`idEvent`),
  ADD KEY `c_guest1` (`idEvent`);

--
-- Index pour la table `Meal`
--
ALTER TABLE `Meal`
  ADD PRIMARY KEY (`idMeal`);

--
-- Index pour la table `OccasionEvent`
--
ALTER TABLE `OccasionEvent`
  ADD PRIMARY KEY (`idOccasion`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Contact`
--
ALTER TABLE `Contact`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `Event`
--
ALTER TABLE `Event`
  MODIFY `idEvent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT pour la table `Meal`
--
ALTER TABLE `Meal`
  MODIFY `idMeal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `OccasionEvent`
--
ALTER TABLE `OccasionEvent`
  MODIFY `idOccasion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Buffet`
--
ALTER TABLE `Buffet`
  ADD CONSTRAINT `c_buffet1` FOREIGN KEY (`idEvent`) REFERENCES `Event` (`idEvent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c_buffet2` FOREIGN KEY (`idMeal`) REFERENCES `Meal` (`idMeal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Guest`
--
ALTER TABLE `Guest`
  ADD CONSTRAINT `c_guest1` FOREIGN KEY (`idEvent`) REFERENCES `Event` (`idEvent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c_guest2` FOREIGN KEY (`idContact`) REFERENCES `Contact` (`idContact`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
