-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 27 oct. 2020 à 14:26
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `user_type`, `password`) VALUES
(10, 'Loukeba Dominique', 'loukebadominique@hotmail.com', 'admin', 'd16d1696fbc8f83744410a5b392cd45f');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `user_name` varchar(155) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(100) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Menu classique'),
(2, 'Entrées'),
(3, 'Nos plats Congolais'),
(4, 'Boissons');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_address` text NOT NULL,
  `user_mobile` varchar(170) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_price` float NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `product_keywords` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `product_cat`, `product_name`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 1, 'Courpions de Dinde', 20, 'Courpions de dinde, oigons, huile de friture', 'dinde-600x600.jpg', 'dinde, viande'),
(2, 1, 'Chèvre', 20, 'Chèvre, oignons, épices', 'goat-600x600.jpg', 'chèvre, viande'),
(3, 1, 'Banane à la viande', 15, 'Banane, steak de boeuf, persil, tomate', 'st1-600x600.jpg', 'banane, steak, boeuf, viande'),
(4, 1, 'Poisson tilapia', 20, 'Poisson tilapia, banane, oigons, poivron, tomates', 'st3-600x600.jpg', 'poisson tilapia, banane, possons'),
(5, 1, 'Sauté de porc aux pommes de Terre', 20, 'Porc, oignon, persil, pomme de terre, épices', 'pig-600x600.jpg', 'porc, pomme de terre, viande'),
(6, 1, 'Riz au poulet', 15, 'Riz frit, feuille d\'oigon, petit poids, poulet', 'riz-600x600.jpg', 'Poulet, riz, viande'),
(7, 2, 'Plateau de fruit', 40, 'Fromage, fruit, salade', 'fruit-600x600.jpg', 'salade, fruit'),
(8, 2, 'Baklava', 5, 'Pâte phylo, sirop de sucre, noix', 'baklava-600x600.jpg', 'baklava, entrée'),
(10, 3, 'Sauté poisson salé', 10, 'Poisson salé, oigons, huile de friture, épices', 'fish-saled-600x600.jpg', 'poissons salé'),
(11, 3, 'Pondu Congolais', 20, 'Feuille de pondu, arricot, huille rouge', 'pondu-600x600.jpg', 'pondu, sauce'),
(12, 3, 'Dégé rognon', 20, 'Rognon de boeuf, banane plantain, oignon, tomate', 'rognon-600x600.jpg', 'rognon, banane, viande'),
(13, 3, 'Poisson mosseka', 20, 'Poisson thomson, pincé de sel, épices', 'smoked-fish-600x600.jpg', 'poisson thomson'),
(14, 3, 'Sauce d\'arachide au poisson salé', 25, 'Feuille de fumbuwa, sauce arachide, poisson salé', 'soupe-600x600.jpg', 'fumbuwa, poisson salé'),
(15, 4, 'Jus de bissap', 5, 'Feuille de bissap', 'juice-600x600.jpg', 'jus, breuvage'),
(20, 3, 'Plat Congolais', 20, 'Arricot, bâton de manioc, tripe', 'pc-600x600.jpg', 'plat congolais, baton de manioc');

-- --------------------------------------------------------

--
-- Structure de la table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL,
  `postal_code` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `user_type`, `mobile`, `address`, `postal_code`) VALUES
(5, 'Ange Valere', 'Zamble', 'angevalerez@gmail.com', 'b429222d71f4e7372260e0b188c54120', '', '5818497894', '107-1567 rue Édith', 'G2L2G1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `product_id` (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_cat` (`product_cat`);

--
-- Index pour la table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
