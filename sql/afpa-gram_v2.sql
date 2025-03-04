-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 04 mars 2025 à 14:59
-- Version du serveur : 8.4.3
-- Version de PHP : 8.3.16

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
CREATE DATABASE IF NOT EXISTS `afpa-gram` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `afpa-gram`;

-- --------------------------------------------------------

--
-- Structure de la table `76_comments`
--

DROP TABLE IF EXISTS `76_comments`;
CREATE TABLE IF NOT EXISTS `76_comments` (
  `com_id` int NOT NULL,
  `com_text` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`com_id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_favorites`
--

DROP TABLE IF EXISTS `76_favorites`;
CREATE TABLE IF NOT EXISTS `76_favorites` (
  `user_id` int NOT NULL,
  `fav_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`fav_id`),
  KEY `fav_id` (`fav_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_pictures`
--

DROP TABLE IF EXISTS `76_pictures`;
CREATE TABLE IF NOT EXISTS `76_pictures` (
  `pic_id` int NOT NULL AUTO_INCREMENT,
  `pic_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`pic_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_posts`
--

DROP TABLE IF EXISTS `76_posts`;
CREATE TABLE IF NOT EXISTS `76_posts` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `post_timestamp` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `post_description` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `post_visibility` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_post_pictures`
--

DROP TABLE IF EXISTS `76_post_pictures`;
CREATE TABLE IF NOT EXISTS `76_post_pictures` (
  `pic_id` int NOT NULL,
  `post_id` int NOT NULL,
  PRIMARY KEY (`pic_id`,`post_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_users`
--

DROP TABLE IF EXISTS `76_users`;
CREATE TABLE IF NOT EXISTS `76_users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_lastname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `user_firstname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `user_pseudo` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `user_birthdate` date NOT NULL,
  `user_mail` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user_activated` int NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_pseudo` (`user_pseudo`),
  UNIQUE KEY `user_mail` (`user_mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `76_comments`
--
ALTER TABLE `76_comments`
  ADD CONSTRAINT `76_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `76_posts` (`post_id`),
  ADD CONSTRAINT `76_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`);

--
-- Contraintes pour la table `76_favorites`
--
ALTER TABLE `76_favorites`
  ADD CONSTRAINT `76_favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`),
  ADD CONSTRAINT `76_favorites_ibfk_2` FOREIGN KEY (`fav_id`) REFERENCES `76_users` (`user_id`);

--
-- Contraintes pour la table `76_pictures`
--
ALTER TABLE `76_pictures`
  ADD CONSTRAINT `76_pictures_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`);

--
-- Contraintes pour la table `76_posts`
--
ALTER TABLE `76_posts`
  ADD CONSTRAINT `76_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`);

--
-- Contraintes pour la table `76_post_pictures`
--
ALTER TABLE `76_post_pictures`
  ADD CONSTRAINT `76_post_pictures_ibfk_1` FOREIGN KEY (`pic_id`) REFERENCES `76_pictures` (`pic_id`),
  ADD CONSTRAINT `76_post_pictures_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `76_posts` (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
