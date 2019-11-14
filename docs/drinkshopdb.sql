-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 14 nov. 2019 à 19:10
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `drinkshopdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

CREATE TABLE `brands` (
  `Id_brand` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `brands`
--

INSERT INTO `brands` (`Id_brand`, `name`) VALUES
(1, 'Feldschlöschen'),
(2, 'Heineken'),
(3, 'BLZ');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `Id_prod` int(11) NOT NULL,
  `name_de` varchar(50) DEFAULT NULL,
  `name_fr` varchar(50) DEFAULT NULL,
  `FK_type_Id` int(11) NOT NULL,
  `FK_brand_Id` int(11) NOT NULL,
  `price` decimal(9,2) DEFAULT NULL,
  `imgSrc` varchar(30) DEFAULT NULL,
  `alcPercent` double DEFAULT NULL,
  `energy` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`Id_prod`, `name_de`, `name_fr`, `FK_type_Id`, `FK_brand_Id`, `price`, `imgSrc`, `alcPercent`, `energy`) VALUES
(1, 'Original', 'Original', 1, 1, '1.20', 'FeldOriginal.png', 5, 41),
(2, 'Hopfenperle', 'Hopfenperle', 2, 1, '2.20', 'hofpenperle.png', 6, 44),
(3, 'Braufrisch', 'Braufrisch', 1, 1, '1.70', 'braufrisch.png', 2, 500),
(4, 'Ice', 'Ice', 1, 1, '2.50', 'ice.png', 6.5, 456),
(5, 'Dunkel', 'Brune', 3, 1, '3.00', 'dunkel.png', 4.6, 48),
(6, 'Pale Ale', 'Pale Ale', 5, 1, '2.60', 'paleale.png', 5.2, 40),
(7, 'Original', 'Original', 1, 2, '2.30', 'heinOriginal.png', 5.2, 39),
(8, 'West Coast Ale', 'West Coast Ale', 5, 3, '4.95', 'blz-west-coast.png', 5.2, 600);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `Id_type` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`Id_type`, `name`) VALUES
(1, 'Lager'),
(2, 'Amber'),
(3, 'Dark Lager'),
(5, 'Pale Ale');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`Id_brand`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id_prod`),
  ADD UNIQUE KEY `Id_prod` (`Id_prod`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`Id_type`),
  ADD UNIQUE KEY `Id_type` (`Id_type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `brands`
--
ALTER TABLE `brands`
  MODIFY `Id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `Id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `Id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
