-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 13 avr. 2022 à 00:36
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `edumaster`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

CREATE TABLE `abonnement` (
                              `id_abonnement` int(11) NOT NULL,
                              `login_user` varchar(20) NOT NULL,
                              `Type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `abonnement`
--

INSERT INTO `abonnement` (`id_abonnement`, `login_user`, `Type`) VALUES
                                                                     (2, 'killer', 'eleve'),
                                                                     (3, 'abdou', 'prof'),
                                                                     (4, 'loulou', 'Eleve'),
                                                                     (5, 'bibo', 'Eleve'),
                                                                     (6, 'Mr Khaled', 'Professeur'),
                                                                     (7, 'kiki', 'Eleve');

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE `activites` (
                             `id_activites` int(11) NOT NULL,
                             `date_activite` varchar(255) NOT NULL,
                             `prix_activite` float NOT NULL,
                             `type_activite` varchar(30) NOT NULL,
                             `titre` varchar(255) NOT NULL,
                             `description` text NOT NULL,
                             `image` varchar(255) NOT NULL,
                             `lieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
                         `id_admin` int(11) NOT NULL,
                         `id_abonnement` int(11) DEFAULT NULL,
                         `login` varchar(10) NOT NULL,
                         `mdp` varchar(50) NOT NULL,
                         `nom` text DEFAULT NULL,
                         `prenom` text DEFAULT NULL,
                         `niveau` text DEFAULT NULL,
                         `mail` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_abonnement`, `login`, `mdp`, `nom`, `prenom`, `niveau`, `mail`) VALUES
                                                                                                         (11, NULL, 'root', 'FL1+XC17BTAwi2ZlIyY9hVcNftQ=', NULL, NULL, NULL, ''),
                                                                                                         (13, NULL, 'root', '3Hbp8MAAbo+RngxRXGbbujmC94U=', 'null', 'null', '0', 'root@');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
                            `id_articles` int(11) NOT NULL,
                            `date_article` varchar(255) NOT NULL,
                            `nombre_like` int(11) NOT NULL,
                            `nombre_commentaire` int(11) NOT NULL,
                            `titre` varchar(256) NOT NULL,
                            `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
                          `id` int(11) NOT NULL,
                          `code` varchar(50) NOT NULL,
                          `libelle` varchar(50) NOT NULL,
                          `responsable` varchar(50) NOT NULL,
                          `adresse` varchar(50) NOT NULL,
                          `ville` varchar(50) NOT NULL,
                          `tel` varchar(50) NOT NULL,
                          `portable` varchar(50) NOT NULL,
                          `email` varchar(50) NOT NULL,
                          `matfisc` varchar(50) NOT NULL,
                          `cin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
                            `id` int(11) NOT NULL,
                            `Numc` varchar(50) NOT NULL,
                            `client` varchar(50) NOT NULL,
                            `datecomm` date NOT NULL,
                            `observation` varchar(50) NOT NULL,
                            `totht` varchar(50) NOT NULL,
                            `tottva` varchar(50) NOT NULL,
                            `totttc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `compteur`
--

CREATE TABLE `compteur` (
                            `id` int(11) NOT NULL,
                            `numcom` int(11) NOT NULL,
                            `numl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
                         `id_cours` int(11) NOT NULL,
                         `nom_cours` varchar(30) NOT NULL,
                         `contenu_cours` varchar(150) CHARACTER SET latin1 NOT NULL,
                         `nb_pages` int(11) NOT NULL,
                         `nb_chapitres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `nom_cours`, `contenu_cours`, `nb_pages`, `nb_chapitres`) VALUES
                                                                                               (5454, 'addition', 'soustraction.jpg', 1, 2),
                                                                                               (5455, 'Addition', 'additionjpg.jpg', 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `exercices`
--

CREATE TABLE `exercices` (
    `id_exercices` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
                           `id` int(11) NOT NULL,
                           `client` varchar(50) NOT NULL,
                           `base0` varchar(50) NOT NULL,
                           `base1` varchar(50) NOT NULL,
                           `tva1` varchar(50) NOT NULL,
                           `base2` varchar(50) NOT NULL,
                           `tva2` varchar(50) NOT NULL,
                           `base3` varchar(50) NOT NULL,
                           `tva3` varchar(50) NOT NULL,
                           `totht` varchar(50) NOT NULL,
                           `totrem` varchar(50) NOT NULL,
                           `tottva` varchar(50) NOT NULL,
                           `timbre` varchar(50) NOT NULL,
                           `tottc` varchar(50) NOT NULL,
                           `rs` varchar(50) NOT NULL,
                           `montrs` varchar(50) NOT NULL,
                           `net` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE `famille` (
                           `id` int(11) NOT NULL,
                           `libelle` varchar(50) NOT NULL,
                           `Produits` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fornisseur`
--

CREATE TABLE `fornisseur` (
    `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
                               `id` int(11) NOT NULL,
                               `code` varchar(50) NOT NULL,
                               `libelle` varchar(50) NOT NULL,
                               `responsable` varchar(50) NOT NULL,
                               `adresse` varchar(50) NOT NULL,
                               `ville` varchar(50) NOT NULL,
                               `tel` varchar(50) NOT NULL,
                               `portable` varchar(50) NOT NULL,
                               `email` varchar(50) NOT NULL,
                               `matfisc` varchar(50) NOT NULL,
                               `cin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `histoire`
--

CREATE TABLE `histoire` (
                            `id_histoire` int(11) NOT NULL,
                            `age` int(100) NOT NULL,
                            `langue` varchar(255) NOT NULL,
                            `nom_histoire` varchar(255) NOT NULL,
                            `contenu_histoire` varchar(255) NOT NULL,
                            `couverture_histoire` varchar(255) NOT NULL,
                            `catégorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `histoire`
--

INSERT INTO `histoire` (`id_histoire`, `age`, `langue`, `nom_histoire`, `contenu_histoire`, `couverture_histoire`, `catégorie`) VALUES
    (4, 11, 'français', 'abeille', 'abeille.pdf', 'abeille.jpg', 'aventure');

-- --------------------------------------------------------

--
-- Structure de la table `lcommande`
--

CREATE TABLE `lcommande` (
                             `id` int(11) NOT NULL,
                             `Numc` varchar(50) NOT NULL,
                             `produit` varchar(50) NOT NULL,
                             `pv` varchar(50) NOT NULL,
                             `qte` varchar(50) NOT NULL,
                             `tva` varchar(50) NOT NULL,
                             `lig` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
                             `id` int(11) NOT NULL,
                             `client` varchar(50) NOT NULL,
                             `numl` varchar(50) NOT NULL,
                             `observation` varchar(50) NOT NULL,
                             `totht` varchar(50) NOT NULL,
                             `tottva` varchar(50) NOT NULL,
                             `totttc` varchar(50) NOT NULL,
                             `dateliv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `llivraison`
--

CREATE TABLE `llivraison` (
                              `id` int(11) NOT NULL,
                              `numl` varchar(50) NOT NULL,
                              `produit` varchar(50) NOT NULL,
                              `pv` varchar(50) NOT NULL,
                              `qte` varchar(50) NOT NULL,
                              `tva` varchar(50) NOT NULL,
                              `lig` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `mail`
--

CREATE TABLE `mail` (
                        `id` int(11) NOT NULL,
                        `subject` varchar(50) NOT NULL,
                        `mail` varchar(50) NOT NULL,
                        `object` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
                           `id` int(11) NOT NULL,
                           `libelle` varchar(50) NOT NULL,
                           `pa` float NOT NULL,
                           `pv` float NOT NULL,
                           `tva` int(11) NOT NULL,
                           `stock` int(11) NOT NULL,
                           `image` longblob NOT NULL,
                           `famille` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
                            `id_question` int(11) NOT NULL,
                            `question` varchar(30) NOT NULL,
                            `matiere` varchar(30) NOT NULL,
                            `R1` varchar(30) NOT NULL,
                            `R2` varchar(30) NOT NULL,
                            `R3` varchar(30) NOT NULL,
                            `solution` varchar(30) NOT NULL,
                            `difficulte` varchar(30) NOT NULL,
                            `id_quizs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `question`, `matiere`, `R1`, `R2`, `R3`, `solution`, `difficulte`, `id_quizs`) VALUES
                                                                                                                          (79, 'capitale france', 'geo', 'tunis', 'paris', 'lisbonne', 'paris', 'moyen', 6),
                                                                                                                          (80, 'capitale portugal', 'geo', 'tunis', 'paris', 'lisbonne', 'lisbonne', 'difficile', 6),
                                                                                                                          (81, 'capitale algerie', 'geo', 'alger', 'rabat', 'kiev', 'alger', 'moyen', 6),
                                                                                                                          (82, 'capitale maroc', 'geo', 'alger', 'rabat', 'kiev', 'rabat', 'moyen', 6),
                                                                                                                          (83, 'capitale ukraine', 'geo', 'alger', 'rabat', 'kiev', 'kiev', 'difficile', 6),
                                                                                                                          (84, 'capitale espagne', 'geo', 'madrid', 'rio', 'washington', 'madrid', 'moyen', 6),
                                                                                                                          (85, 'capitale bresil', 'geo', 'madrid', 'rio', 'washington', 'rio', 'moyen', 6),
                                                                                                                          (86, 'capitale etats unis', 'geo', 'madrid', 'rio', 'washington', 'washington', 'difficile', 6),
                                                                                                                          (87, '2*2', 'maths', '4', '8', '6', '4', 'facile', 5),
                                                                                                                          (88, '2*4', 'maths', '4', '8', '6', '8', 'facile', 5),
                                                                                                                          (89, '2*3', 'maths', '4', '8', '6', '6', 'facile', 5),
                                                                                                                          (90, '5*4', 'maths', '20', '40', '25', '20', 'moyen', 5),
                                                                                                                          (91, '10*4', 'maths', '20', '40', '25', '40', 'moyen', 5),
                                                                                                                          (92, '5*5', 'maths', '20', '40', '25', '25', 'moyen', 5),
                                                                                                                          (93, '6*7', 'maths', '42', '36', '66', '42', 'difficile', 5),
                                                                                                                          (94, '6*6', 'maths', '42', '36', '66', '36', 'difficile', 5),
                                                                                                                          (95, '9*9', 'maths', '42', '54', '81', '81', 'difficile', 5),
                                                                                                                          (96, '100*2', 'maths', '42', '54', '200', '200', 'difficile', 5),
                                                                                                                          (97, 'capitale italie', 'geo', 'rome', 'nabeul', 'bruxelle', 'rome', 'facile', 6),
                                                                                                                          (98, 'capitale grece', 'geo', 'mykonos', 'athenes', 'sousse', 'athenes', 'facile', 6);

-- --------------------------------------------------------

--
-- Structure de la table `quizs`
--

CREATE TABLE `quizs` (
                         `id_quizs` int(11) NOT NULL,
                         `image` varchar(250) NOT NULL,
                         `matiere` varchar(30) NOT NULL,
                         `difficulte` varchar(30) NOT NULL,
                         `resultat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `quizs`
--

INSERT INTO `quizs` (`id_quizs`, `image`, `matiere`, `difficulte`, `resultat`) VALUES
                                                                                   (5, '7e676e9e663beb40fd133f5ee24487c2.png', 'maths', 'facile', 0),
                                                                                   (6, 'ecc174e3e02c82f34c14fe860bf47ef2.png', 'geo', 'moyen', 0);

-- --------------------------------------------------------

--
-- Structure de la table `reglement`
--

CREATE TABLE `reglement` (
                             `id` int(11) NOT NULL,
                             `client` varchar(50) NOT NULL,
                             `facture` varchar(50) NOT NULL,
                             `modereg` varchar(50) NOT NULL,
                             `montant` varchar(50) NOT NULL,
                             `numpiece` varchar(50) NOT NULL,
                             `echeance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `resultat_test_histoire`
--

CREATE TABLE `resultat_test_histoire` (
                                          `id_resultat` int(11) NOT NULL,
                                          `id_test` int(11) NOT NULL,
                                          `id_user` int(11) NOT NULL,
                                          `score` int(11) NOT NULL,
                                          `date` date NOT NULL,
                                          `ligne_histoire` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `test_histoire`
--

CREATE TABLE `test_histoire` (
                                 `id_test` int(11) NOT NULL,
                                 `id_histoire` int(11) NOT NULL,
                                 `question1` varchar(255) NOT NULL,
                                 `R11` varchar(255) NOT NULL,
                                 `R12` varchar(255) NOT NULL,
                                 `R13` varchar(255) NOT NULL,
                                 `correctionQ1` varchar(255) NOT NULL,
                                 `question2` varchar(255) NOT NULL,
                                 `R21` varchar(255) NOT NULL,
                                 `R22` varchar(255) NOT NULL,
                                 `R23` varchar(255) NOT NULL,
                                 `correctionQ2` varchar(255) NOT NULL,
                                 `question3` varchar(255) NOT NULL,
                                 `R31` varchar(255) NOT NULL,
                                 `R32` varchar(255) NOT NULL,
                                 `R33` varchar(255) NOT NULL,
                                 `correctionQ3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `type_abo`
--

CREATE TABLE `type_abo` (
    `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
                        `id_user` int(11) NOT NULL,
                        `id_abonnement` int(11) DEFAULT NULL,
                        `login` varchar(50) NOT NULL,
                        `mdp` varchar(50) NOT NULL,
                        `nom` varchar(15) NOT NULL,
                        `prenom` varchar(15) NOT NULL,
                        `niveau` int(11) NOT NULL,
                        `mail` varchar(50) NOT NULL,
                        `code` text CHARACTER SET latin1 DEFAULT NULL,
                        `etat` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `id_abonnement`, `login`, `mdp`, `nom`, `prenom`, `niveau`, `mail`, `code`, `etat`) VALUES
                                                                                                                       (20, NULL, 'killer', 'FL1+XC17BTAwi2ZlIyY9hVcNftQ=', 'Badritcho', 'Dhaker', 2, 'dhaker.badri@esprit.tn', '001101', 'deconnecté'),
                                                                                                                       (22, NULL, 'loulou', '/Wb9AkDwSnXR0QPYDTB8eZUb5k0=', 'Ben Younes', 'Louay', 3, 'louay.benyounes@gmail.com', NULL, NULL),
                                                                                                                       (23, NULL, 'bibo', 'DQX19PAuB15vZCY2Oy2p+shPYV0=', 'Touati', 'Habib', 3, 'habib.touati@esprit.tn', NULL, NULL),
                                                                                                                       (24, NULL, 'Mr Khaled', 'YtLnIP4dt13urWxfp0kvjleapoo=', 'Guedria', 'Khaled', 5, 'khaled.guedria@esprit.tn', NULL, NULL),
                                                                                                                       (25, NULL, 'kiki', 'Od+lUoMxjTGv5aP/Sg4yU+IEXkM=', 'Badri', 'Dhaker', 2, 'dhaker.badri@esprit.tn', '007488', 'connecté');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
                         `id_video` int(11) NOT NULL,
                         `nom_video` varchar(30) NOT NULL,
                         `date` varchar(30) DEFAULT NULL,
                         `description` varchar(100) NOT NULL,
                         `duree_video` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`id_video`, `nom_video`, `date`, `description`, `duree_video`) VALUES
                                                                                        (19, 'maram', '05-03-2022', 'cette video decrit le cours de francais', '2:00:05'),
                                                                                        (21, 'maram', '07-03-2022', 'maram123', '2:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnement`
--
ALTER TABLE `abonnement`
    ADD PRIMARY KEY (`id_abonnement`);

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
    ADD PRIMARY KEY (`id_activites`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
    ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
    ADD PRIMARY KEY (`id_articles`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compteur`
--
ALTER TABLE `compteur`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
    ADD PRIMARY KEY (`id_cours`);

--
-- Index pour la table `exercices`
--
ALTER TABLE `exercices`
    ADD PRIMARY KEY (`id_exercices`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `famille`
--
ALTER TABLE `famille`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fornisseur`
--
ALTER TABLE `fornisseur`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `histoire`
--
ALTER TABLE `histoire`
    ADD PRIMARY KEY (`id_histoire`);

--
-- Index pour la table `lcommande`
--
ALTER TABLE `lcommande`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
    ADD PRIMARY KEY (`id`),
  ADD KEY `client` (`client`);

--
-- Index pour la table `llivraison`
--
ALTER TABLE `llivraison`
    ADD PRIMARY KEY (`id`),
  ADD KEY `produit` (`produit`);

--
-- Index pour la table `mail`
--
ALTER TABLE `mail`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
    ADD PRIMARY KEY (`id`),
  ADD KEY `famille` (`famille`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
    ADD PRIMARY KEY (`id_question`),
  ADD KEY `id_quizs` (`id_quizs`);

--
-- Index pour la table `quizs`
--
ALTER TABLE `quizs`
    ADD PRIMARY KEY (`id_quizs`);

--
-- Index pour la table `reglement`
--
ALTER TABLE `reglement`
    ADD PRIMARY KEY (`id`),
  ADD KEY `client` (`client`);

--
-- Index pour la table `resultat_test_histoire`
--
ALTER TABLE `resultat_test_histoire`
    ADD PRIMARY KEY (`id_resultat`),
  ADD KEY `fk_idtest` (`id_test`);

--
-- Index pour la table `test_histoire`
--
ALTER TABLE `test_histoire`
    ADD PRIMARY KEY (`id_test`),
  ADD KEY `fk_idhistoire` (`id_histoire`);

--
-- Index pour la table `type_abo`
--
ALTER TABLE `type_abo`
    ADD PRIMARY KEY (`type`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
    ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnement`
--
ALTER TABLE `abonnement`
    MODIFY `id_abonnement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `activites`
--
ALTER TABLE `activites`
    MODIFY `id_activites` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
    MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
    MODIFY `id_articles` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compteur`
--
ALTER TABLE `compteur`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
    MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5456;

--
-- AUTO_INCREMENT pour la table `exercices`
--
ALTER TABLE `exercices`
    MODIFY `id_exercices` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `famille`
--
ALTER TABLE `famille`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fornisseur`
--
ALTER TABLE `fornisseur`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lcommande`
--
ALTER TABLE `lcommande`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `llivraison`
--
ALTER TABLE `llivraison`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mail`
--
ALTER TABLE `mail`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
    MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT pour la table `quizs`
--
ALTER TABLE `quizs`
    MODIFY `id_quizs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reglement`
--
ALTER TABLE `reglement`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `resultat_test_histoire`
--
ALTER TABLE `resultat_test_histoire`
    MODIFY `id_resultat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `test_histoire`
--
ALTER TABLE `test_histoire`
    MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
    MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
    MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
    ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`id_quizs`) REFERENCES `quizs` (`id_quizs`);

--
-- Contraintes pour la table `resultat_test_histoire`
--
ALTER TABLE `resultat_test_histoire`
    ADD CONSTRAINT `fk_idtest` FOREIGN KEY (`id_test`) REFERENCES `test_histoire` (`id_test`);

--
-- Contraintes pour la table `test_histoire`
--
ALTER TABLE `test_histoire`
    ADD CONSTRAINT `fk_idhistoire` FOREIGN KEY (`id_histoire`) REFERENCES `histoire` (`id_histoire`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
