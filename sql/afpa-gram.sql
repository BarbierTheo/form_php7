-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 05 mars 2025 à 15:59
-- Version du serveur : 8.4.3
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `afpa-gram`
--

-- --------------------------------------------------------

--
-- Structure de la table `76_comments`
--

CREATE TABLE `76_comments` (
  `com_id` int NOT NULL,
  `com_text` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_favorites`
--

CREATE TABLE `76_favorites` (
  `user_id` int NOT NULL,
  `fav_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_likes`
--

CREATE TABLE `76_likes` (
  `like_id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_pictures`
--

CREATE TABLE `76_pictures` (
  `pic_id` int NOT NULL,
  `pic_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_posts`
--

CREATE TABLE `76_posts` (
  `post_id` int NOT NULL,
  `post_timestamp` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_private` tinyint NOT NULL DEFAULT '0',
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_users`
--

CREATE TABLE `76_users` (
  `user_id` int NOT NULL,
  `user_gender` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_lastname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_firstname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_pseudo` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_birthdate` date NOT NULL,
  `user_mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_activated` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `76_users`
--

INSERT INTO `76_users` (`user_id`, `user_gender`, `user_lastname`, `user_firstname`, `user_pseudo`, `user_birthdate`, `user_mail`, `user_password`, `user_activated`) VALUES
(8, 'NaN', 'Azerty', 'Azerto', 'Azertz', '1995-12-14', 'azertio@gmail.com', '$2y$10$7K.8N4nvgv6loPY6J7ilZ.k9Y7Cp5Ap2c2lxIn.muhbiPRPiEsnBy', 1),
(11, 'homme', 'Admin', 'Admin', 'Admin', '2007-01-01', 'admin@admin.admin', '$2y$10$Mmm1MyiG8JV1JGzxd0mqd.TzEkERouUZVFOsKPPu/pzyibGCi7pnS', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `76_comments`
--
ALTER TABLE `76_comments`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `76_comments_ibfk_1` (`post_id`),
  ADD KEY `76_comments_ibfk_2` (`user_id`);

--
-- Index pour la table `76_favorites`
--
ALTER TABLE `76_favorites`
  ADD PRIMARY KEY (`user_id`,`fav_id`),
  ADD KEY `fav_id` (`fav_id`);

--
-- Index pour la table `76_likes`
--
ALTER TABLE `76_likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `76_likes_ibfk_1` (`user_id`),
  ADD KEY `76_likes_ibfk_2` (`post_id`);

--
-- Index pour la table `76_pictures`
--
ALTER TABLE `76_pictures`
  ADD PRIMARY KEY (`pic_id`),
  ADD KEY `76_pictures_ibfk_1` (`post_id`);

--
-- Index pour la table `76_posts`
--
ALTER TABLE `76_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `76_users`
--
ALTER TABLE `76_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_pseudo` (`user_pseudo`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `76_likes`
--
ALTER TABLE `76_likes`
  MODIFY `like_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `76_pictures`
--
ALTER TABLE `76_pictures`
  MODIFY `pic_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `76_posts`
--
ALTER TABLE `76_posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `76_users`
--
ALTER TABLE `76_users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `76_comments`
--
ALTER TABLE `76_comments`
  ADD CONSTRAINT `76_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `76_posts` (`post_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `76_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `76_favorites`
--
ALTER TABLE `76_favorites`
  ADD CONSTRAINT `76_favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`),
  ADD CONSTRAINT `76_favorites_ibfk_2` FOREIGN KEY (`fav_id`) REFERENCES `76_users` (`user_id`);

--
-- Contraintes pour la table `76_likes`
--
ALTER TABLE `76_likes`
  ADD CONSTRAINT `76_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `76_likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `76_posts` (`post_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `76_pictures`
--
ALTER TABLE `76_pictures`
  ADD CONSTRAINT `76_pictures_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `76_posts` (`post_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `76_posts`
--
ALTER TABLE `76_posts`
  ADD CONSTRAINT `76_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
