-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 05 déc. 2024 à 15:57
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `photoshare_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created`) VALUES
(18, 3, 10, '2024-12-04 14:53:09'),
(20, 3, 12, '2024-12-04 15:08:15'),
(23, 3, 9, '2024-12-04 16:42:06'),
(24, 1, 9, '2024-12-05 16:54:17');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `legende` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `image`, `legende`, `user_id`, `created`) VALUES
(7, 'photo1.webp', 'Une vue à couper le souffle d’un coucher de soleil sur une plage paisible. La nature dans toute sa splendeur.', 1, '2024-12-04 11:07:12'),
(8, 'photo2.webp', 'Découvrez l\'art de la gastronomie avec ce plat somptueusement dressé. Une expérience culinaire à ne pas manquer ! ', 1, '2024-12-04 11:07:12'),
(9, 'photo3.webp', 'Les détails captivants d\'une fleur en pleine floraison. Une beauté naturelle qui enchante le regard.', 2, '2024-12-04 11:07:12'),
(10, 'photo4.webp', 'Inspiration déco : un salon minimaliste et chaleureux où modernité rime avec confort.', 2, '2024-12-04 11:07:12'),
(11, 'photo5.webp', 'L\'énergie vibrante d\'une rue urbaine illuminée par des néons. Une soirée en ville pleine de vie et de couleurs', 3, '2024-12-04 11:07:12'),
(12, 'photo6.webp', 'Évasion garantie avec cette vue imprenable sur une montagne majestueuse. Un véritable paradis pour les amoureux de la nature. ', 4, '2024-12-04 11:07:12'),
(13, 'me.webp', 'Une journée ensoleillée au parc. Rien de mieux qu\'un moment de détente et un selfie pour capturer l\'instant ! #Nature #SelfieTime #GoodVibes', 3, '2024-12-05 11:11:51');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom_prenom` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `bio` text,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `nom_prenom`, `tel`, `bio`, `picture`) VALUES
(1, 'john_doe', 'john.doe@example.com', '$2y$10$xs4dnikDigPYIpWP1gWvj.ZFo6yrBbmHzlOyV3ouXjisRf9HfShXy', NULL, NULL, NULL, NULL),
(2, 'jane_doe', 'jane.doe@example.com', '$2y$10$xs4dnikDigPYIpWP1gWvj.ZFo6yrBbmHzlOyV3ouXjisRf9HfShXy', NULL, NULL, NULL, NULL),
(3, 'alice', 'alice@example.fr', '$2y$10$xs4dnikDigPYIpWP1gWvj.ZFo6yrBbmHzlOyV3ouXjisRf9HfShXy', 'Alice Galtie', '0654535251', 'Passionnée de photographie et de voyages.\n\"Chaque instant mérite d\'être capturé et partagé.\"\nNouvelle sur Photoshare, je suis là pour partager mes moments préférés avec vous. Suivez-moi pour découvrir des paysages époustouflants, des portraits sincères et des éclats de vie au quotidien. Toujours ouverte aux échanges, n\'hésitez pas à laisser un commentaire ou à me donner votre avis.', 'alice.webp'),
(4, 'bob', 'bob@example.com', '$2y$10$xs4dnikDigPYIpWP1gWvj.ZFo6yrBbmHzlOyV3ouXjisRf9HfShXy', NULL, NULL, NULL, NULL),
(5, 'gerard', 'gerard@gmail.com', '$2y$10$xs4dnikDigPYIpWP1gWvj.ZFo6yrBbmHzlOyV3ouXjisRf9HfShXy', NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_1` (`user_id`),
  ADD KEY `fk_post_id_1` (`post_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_post_id_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
