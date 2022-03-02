-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3309
-- Généré le : mar. 02 nov. 2021 à 20:16
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

CREATE TABLE `demandes` (
  `id` int(11) NOT NULL,
  `Des` varchar(50) NOT NULL,
  `Number` int(11) NOT NULL,
  `Date` date NOT NULL,
  `fonction` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `demandes`
--

INSERT INTO `demandes` (`id`, `Des`, `Number`, `Date`, `fonction`) VALUES
(23, 'desks ', 2, '2021-06-23', 'stock manager'),
(25, 'mouse ', 4, '2021-06-23', 'stock manager'),
(26, 'printer ', 3, '2021-06-23', 'chef division du support et du finance'),
(29, 'desks ', 9, '2021-06-24', 'chef division du support et du finance'),
(30, 'laptops ', 20, '2021-06-24', 'chef division du support et du finance'),
(31, 'printer ', 20, '2021-06-25', 'chef division du support et du finance'),
(36, 'mouse ', 20, '2021-06-29', 'stock manager');

-- --------------------------------------------------------

--
-- Structure de la table `gestion_stock`
--

CREATE TABLE `gestion_stock` (
  `id` int(11) NOT NULL,
  `des` varchar(50) NOT NULL,
  `bon_de_commande` int(11) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `gestion_stock`
--

INSERT INTO `gestion_stock` (`id`, `des`, `bon_de_commande`, `date`) VALUES
(12, 'desks ', 100, '2020-02-12'),
(14, 'laptops ', 500, '2021-06-01'),
(13, 'mouse ', 200, '2021-06-18'),
(1, 'papers', 20, '2020-06-18'),
(11, 'printer ', 100, '2021-06-10'),
(15, 'test', 100, '2021-06-16');

-- --------------------------------------------------------

--
-- Structure de la table `mails`
--

CREATE TABLE `mails` (
  `ID` int(11) NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `E-mail` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `Body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `stock_statistiques`
--

CREATE TABLE `stock_statistiques` (
  `id` int(11) NOT NULL,
  `des` varchar(50) NOT NULL,
  `Qt_stock` int(11) NOT NULL,
  `Qt_con` int(11) NOT NULL,
  `Annee` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stock_statistiques`
--

INSERT INTO `stock_statistiques` (`id`, `des`, `Qt_stock`, `Qt_con`, `Annee`) VALUES
(1, 'papers', 40, 10, '2021-06-15'),
(2, 'desks ', 50, 50, '2021-06-09'),
(3, 'laptops ', 150, 350, '2021-06-03'),
(4, 'mouse ', 30, 170, '2021-06-21');

-- --------------------------------------------------------

--
-- Structure de la table `users_stock`
--

CREATE TABLE `users_stock` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `states` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users_stock`
--

INSERT INTO `users_stock` (`ID`, `name`, `login`, `fonction`, `states`, `password`) VALUES
(14, 'Mohamed El hamdaui', 'test_controler', 'chef division du support et du finance', 'Controler', '1912'),
(11, 'said el ghazal', 'test_admin', 'stock manager', 'Admin', '1912');

-- --------------------------------------------------------

--
-- Structure de la table `user_cmd`
--

CREATE TABLE `user_cmd` (
  `id` int(11) NOT NULL,
  `fonction` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `CMD` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Des` (`Des`),
  ADD KEY `fonction` (`fonction`);

--
-- Index pour la table `gestion_stock`
--
ALTER TABLE `gestion_stock`
  ADD PRIMARY KEY (`des`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fonction` (`fonction`);

--
-- Index pour la table `stock_statistiques`
--
ALTER TABLE `stock_statistiques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `des` (`des`);

--
-- Index pour la table `users_stock`
--
ALTER TABLE `users_stock`
  ADD PRIMARY KEY (`fonction`) USING BTREE,
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `ID` (`ID`);

--
-- Index pour la table `user_cmd`
--
ALTER TABLE `user_cmd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fonction` (`fonction`),
  ADD KEY `designation` (`designation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `gestion_stock`
--
ALTER TABLE `gestion_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `mails`
--
ALTER TABLE `mails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `stock_statistiques`
--
ALTER TABLE `stock_statistiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users_stock`
--
ALTER TABLE `users_stock`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `user_cmd`
--
ALTER TABLE `user_cmd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD CONSTRAINT `demandes_ibfk_1` FOREIGN KEY (`Des`) REFERENCES `gestion_stock` (`des`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demandes_ibfk_2` FOREIGN KEY (`fonction`) REFERENCES `users_stock` (`fonction`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `mails`
--
ALTER TABLE `mails`
  ADD CONSTRAINT `mails_ibfk_1` FOREIGN KEY (`fonction`) REFERENCES `users_stock` (`fonction`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `stock_statistiques`
--
ALTER TABLE `stock_statistiques`
  ADD CONSTRAINT `stock_statistiques_ibfk_1` FOREIGN KEY (`des`) REFERENCES `gestion_stock` (`des`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_cmd`
--
ALTER TABLE `user_cmd`
  ADD CONSTRAINT `user_cmd_ibfk_1` FOREIGN KEY (`designation`) REFERENCES `gestion_stock` (`des`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_cmd_ibfk_2` FOREIGN KEY (`fonction`) REFERENCES `users_stock` (`fonction`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
