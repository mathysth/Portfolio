-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 24 oct. 2020 à 22:44
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `theolade_zikboutik`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_temporary_token`
--

CREATE TABLE `admin_temporary_token` (
                                         `id` int(11) NOT NULL,
                                         `member_id` int(11) NOT NULL,
                                         `token` char(255) CHARACTER SET utf8 NOT NULL,
                                         `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
                             `id` int(11) NOT NULL,
                             `libelle` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Jazz'),
(2, 'Rock'),
(3, 'Blues'),
(4, 'Enfants');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
                               `id` int(11) NOT NULL,
                               `nom` varchar(45) NOT NULL,
                               `image` varchar(45) NOT NULL,
                               `niveauCompetence` varchar(45) NOT NULL,
                               `competence_categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id`, `nom`, `image`, `niveauCompetence`, `competence_categories_id`) VALUES
(1, 'html', '1.png', '70', 1),
(2, 'php', '2.png', '75', 1),
(3, 'javascript', '3.png', '50', 1),
(4, 'jquery', '4.png', '40', 1),
(5, 'filezilla', '5.png', '50', 2),
(6, 'xampp', '6.png', '70', 2),
(7, 'jetbrains', '7.png', '75', 2),
(8, 'linux', '8.png', '50', 3),
(9, 'windows', '9.png', '80', 3),
(10, 'phpmyadmin', '10.png', '70', 4),
(11, 'sqlserver', '11.png', '50', 4),
(12, 'sql', '12.png', '60', 4),
(13, 'cisco', '13.png', '30', 5),
(14, 'virtualbox', '14.png', '45', 5);

-- --------------------------------------------------------

--
-- Structure de la table `competence_categories`
--

CREATE TABLE `competence_categories` (
                                         `id` int(11) NOT NULL,
                                         `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `competence_categories`
--

INSERT INTO `competence_categories` (`id`, `nom`) VALUES
(1, 'Languages'),
(2, 'Logiciels '),
(3, 'Systèmes d’exploitations \r\n'),
(4, 'Bases de données '),
(5, 'Outils Réseaux ');

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
                          `id` int(11) NOT NULL,
                          `pseudo` varchar(255) NOT NULL,
                          `email` varchar(100) NOT NULL,
                          `pass` varchar(255) NOT NULL,
                          `isAdmin` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`id`, `pseudo`, `email`, `pass`, `isAdmin`) VALUES
(5, 'mathys', 'mathys@gmail.com', '$2y$10$dsMK/vxmgrJzxox5wT7q7O2uT3tIjE5z/goGlbH7U21bDBp9BYuMa', 1);

-- --------------------------------------------------------

--
-- Structure de la table `onglets`
--

CREATE TABLE `onglets` (
                           `id` int(11) NOT NULL,
                           `nom` varchar(100) NOT NULL,
                           `controlerName` varchar(100) NOT NULL,
                           `dropdown` int(11) NOT NULL DEFAULT 0,
                           `options` varchar(255) DEFAULT NULL,
                           `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `onglets`
--

INSERT INTO `onglets` (`id`, `nom`, `controlerName`, `dropdown`, `options`, `date`) VALUES
(1, 'Presentation', 'presentation', 1, 'accueil,competences', '0000-00-00 00:00:00'),
(2, 'Competetences', 'competences', 1, 'cv,lm', '2020-10-21 23:32:19'),
(4, 'Boutique', 'shop', 0, NULL, '2020-10-21 23:35:07'),
(7, 'Connexion', 'connexion', 0, NULL, '2020-10-22 17:50:28'),
(8, 'Inscription', 'inscription', 0, NULL, '2020-10-22 17:50:14');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
                          `id` int(11) NOT NULL,
                          `produit_id` int(11) NOT NULL,
                          `statut` int(11) NOT NULL DEFAULT 0,
                          `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
                           `id` int(11) NOT NULL,
                           `nom` varchar(50) DEFAULT NULL,
                           `description` varchar(100) DEFAULT NULL,
                           `prix` decimal(6,2) DEFAULT NULL,
                           `image` varchar(100) DEFAULT NULL,
                           `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `prix`, `image`, `idCategorie`) VALUES
(1, 'Bireli Lagrene & Friends', 'Live Jazz à Vienne', '22.99', 'lagrene_vienne.jpg', 1),
(2, 'Norah Jones', 'Live In New Orleans', '12.20', 'norah_jones_new_orleans.jpg', 1),
(3, 'Diana Krall', 'Live In Paris', '15.81', 'diana_krall_paris.jpg', 1),
(4, 'Miles Davis', 'Live At Montreux', '83.69', 'miles_davis_montreux.jpg', 1),
(5, 'Bruce Springsteen', 'Live In New York City', '9.99', 'springsteen_newyork.jpg', 2),
(6, 'U2', 'Live in Chicago', '18.00', 'u2_chicago.jpg', 2),
(7, 'Mark Knopfler', 'Real Live Roadrunning', '16.99', 'knopfler_roadrunning.jpg', 2),
(8, 'Pink Floyd', 'Live at Pompei', '9.99', 'pink_floyd_pompei.jpg', 2),
(9, 'Queen ', 'Live at Wembley', '9.40', 'queen_wembley.jpg', 2),
(10, 'AC/DC', 'Live At River Plate', '36.60', 'acdc_river_plate.jpg', 2),
(11, 'B.B. King', 'Live', '19.97', 'bbking_live.jpg', 3),
(12, 'Eric Clapton', 'Crossroads Guitar Festival', '34.96', 'clapton_crossroads.jpg', 3),
(13, 'John Lee Hooker', 'I\'m in the mood for Love', '19.34', 'hooker_love.jpg', 3),
(14, 'Stevie Ray Vaughan & Double Trouble', 'Live at the El Mocambo', '6.99', 'stevie_ray.jpg', 3),
(15, 'Steve Ray Vaughan', 'Live At Montreux', '9.99', 'vaughan_montreux.jpg', 3),
(16, 'René la taupe !', 'Live Héraultais !...', '1000.99', 'rene_taupe.jpg', 4),
(17, 'test', ' fff', '45.00', 'révision.txt', 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin_temporary_token`
--
ALTER TABLE `admin_temporary_token`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_admin_temporary_token_member_idx` (`member_id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_competences_competence_categories_idx` (`competence_categories_id`);

--
-- Index pour la table `competence_categories`
--
ALTER TABLE `competence_categories`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `member`
--
ALTER TABLE `member`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `onglets`
--
ALTER TABLE `onglets`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_panier_produit1_idx` (`produit_id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
    ADD PRIMARY KEY (`id`),
    ADD KEY `idCategorie` (`idCategorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin_temporary_token`
--
ALTER TABLE `admin_temporary_token`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `competence_categories`
--
ALTER TABLE `competence_categories`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `onglets`
--
ALTER TABLE `onglets`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin_temporary_token`
--
ALTER TABLE `admin_temporary_token`
    ADD CONSTRAINT `fk_admin_temporary_token_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `competences`
--
ALTER TABLE `competences`
    ADD CONSTRAINT `fk_competences_competence_categories` FOREIGN KEY (`competence_categories_id`) REFERENCES `competence_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
    ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
