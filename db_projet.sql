-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 juin 2023 à 19:37
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `nom_admin` varchar(255) NOT NULL,
  `prenom_admin` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `mdp_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id_admin`, `nom_admin`, `prenom_admin`, `email_admin`, `mdp_admin`) VALUES
(1, 'Administration', 'Admin', 'appept@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `lib_classe` varchar(255) NOT NULL,
  `effectif` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `lib_classe`, `effectif`, `id_filiere`) VALUES
(1, 'ING1 STIC', 25, 1),
(2, 'TS2 STIC', 62, 1),
(3, 'ING2 STGI', 69, 2),
(4, 'ING1 STGP', 56, 3),
(5, 'TS1 STGI', 45, 2),
(6, 'ING3 ECS', 48, 4);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `lib_cours` varchar(255) NOT NULL,
  `coef` int(11) NOT NULL,
  `id_enseignant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `lib_cours`, `coef`, `id_enseignant`) VALUES
(1, 'Langage C', 2, 3),
(2, 'Mécanique', 3, 4),
(3, 'Chimie1', 2, 2),
(4, 'Chimie2', 1, 2),
(5, 'Programmation Web', 2, 3),
(6, 'Java SE', 2, 3),
(7, 'Mécanique2', 3, 4),
(8, 'Chimie3', 2, 2),
(9, 'Mécanique3', 1, 4),
(10, 'Analyse complexe', 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Sexe` char(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id`, `Nom`, `Prenom`, `Contact`, `Sexe`, `email`, `mdp`, `photo`) VALUES
(1, 'Diarrassouba', 'Ibrahim', '05 45 88 55 12', 'M', 'ibrahdiarra40@gmail.com', '4588', '1686755054ib.jpg'),
(2, 'Uzumaki', 'Naruto', '05 45 88 55 14', 'M', 'narutouzu@gmail.com', '1234', '1686755074UzNarGe.jpg'),
(3, 'Uchiha', 'Itachi', '07 07 28 29 45', 'M', 'itachi@gmail.com', '12345', '1687120027itachi1.jpg'),
(4, 'Haruno', 'Sakura', '01 43 25 25 25', 'F', 'sakura@gmail.com', '4588', '1686755129HuSakCh.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `Matricule` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `Sexe` char(1) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `Date_naissance` date NOT NULL,
  `Photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `Matricule`, `Nom`, `Prenom`, `mdp`, `Sexe`, `id_filiere`, `id_classe`, `Date_naissance`, `Photo`) VALUES
(1, '22INP00100', 'Uzumaki', 'Boruto', '00100', 'M', 1, 1, '2000-01-01', '1686988614boruto.jpg'),
(2, '22INP00101', 'Orochi', 'Mitsuki', '00101', 'M', 1, 2, '2002-02-02', '1687010674Mitsuki.jpg'),
(3, '22INP00102', 'Uchiha', 'Sarada', '00102', 'F', 2, 3, '2005-08-02', '1686989091sarada.jpg'),
(4, '22INP00103', 'Nara', 'Shikadai', '00103', 'M', 3, 4, '2005-12-12', '1686989904Shikadai.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id` int(11) NOT NULL,
  `lib_filiere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id`, `lib_filiere`) VALUES
(1, 'STIC'),
(2, 'STGI'),
(3, 'STGP'),
(4, 'ECS'),
(5, 'ESCA'),
(6, 'HEA');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `id_cours` int(11) NOT NULL,
  `Matricule_et` varchar(255) NOT NULL,
  `note` float NOT NULL,
  `date_eval` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id`, `id_cours`, `Matricule_et`, `note`, `date_eval`) VALUES
(1, 2, '22INP00100', 16, '2023-01-01'),
(2, 10, '22INP00100', 18, '2023-05-05'),
(3, 6, '22INP00100', 17, '2023-05-12'),
(4, 1, '22INP00101', 14, '2023-01-01'),
(5, 5, '22INP00101', 15, '2023-05-05'),
(6, 6, '22INP00101', 18, '2023-05-12'),
(7, 2, '22INP00102', 13, '2023-01-03'),
(8, 7, '22INP00102', 16, '2023-04-06'),
(9, 9, '22INP00102', 18, '2023-05-12'),
(10, 3, '22INP00103', 17, '2023-06-14'),
(11, 4, '22INP00103', 12, '2023-03-11'),
(12, 8, '22INP00103', 17, '2023-04-15'),
(13, 10, '22INP00101', 16, '2023-05-11');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`Matricule`),
  ADD KEY `idet` (`id`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
