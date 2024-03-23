-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 23 mars 2024 à 17:24
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `memoires`
--

CREATE TABLE `memoires` (
  `id_memoire` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `fichier` varchar(256) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `theme` varchar(50) DEFAULT NULL,
  `domaine` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `memoires`
--

INSERT INTO `memoires` (`id_memoire`, `titre`, `contenu`, `id_utilisateur`, `fichier`, `date_creation`, `theme`, `domaine`) VALUES
(1, 'systemes reseaux', 'Les réseaux sociaux ont révolutionné la manière dont nous interagissons en ligne, en facilitant la communication et le partage d\'informations entre individus du monde entier. Ils offrent une plateforme pour exprimer des opinions, découvrir de nouveaux contenus et maintenir des liens sociaux. ', 1, '', '2024-03-22 16:48:16', 'les reseaux inforamatiques', 'informatique'),
(2, 'Les charges variables ', 'Les charges variables en comptabilité désignent les dépenses d\'une entreprise qui fluctuent en fonction de son activité. Elles incluent notamment les coûts de matières premières, la main-d\'œuvre temporaire et les frais de transport liés à la production.', 2, 'les charges variables', '0000-00-00 00:00:00', 'Les charges', 'Comptabilité Analytique'),
(3, 'La programmation orientée objet', 'La programmation orientée objet (POO) est un paradigme de programmation qui repose sur la modélisation de concepts du monde réel sous forme d\'objets interagissant les uns avec les autres. En POO, les données et les fonctionnalités sont encapsulées dans des objets, ce qui favorise la réutilisabilité du code, la modularité et la gestion des complexités.\r\n', 6, 'poo', '2024-03-23 15:39:31', 'La POO', 'Php');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(50) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `type_utilisateur` enum('administrateur','étudiant') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom_utilisateur`, `mot_de_passe`, `type_utilisateur`) VALUES
(1, 'Mbenda', '$2y$10$JaGpTEfeXGX4kZ5pqCUSj.zPZ8dDQTmd6g1xgg75qjaTHjf6AHM/2', 'étudiant'),
(2, 'ModouFall', 'passer123', 'administrateur'),
(3, 'Mbayang Diop', 'passer123', 'étudiant'),
(6, 'ibrahima', '$2y$10$6iQigB9ZlJWxvakTDpGIPuXnu1ZR15Lj7qtOE6YHI7mzTVbtOBljK', 'étudiant');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `memoires`
--
ALTER TABLE `memoires`
  ADD PRIMARY KEY (`id_memoire`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `memoires`
--
ALTER TABLE `memoires`
  MODIFY `id_memoire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `memoires`
--
ALTER TABLE `memoires`
  ADD CONSTRAINT `memoires_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
