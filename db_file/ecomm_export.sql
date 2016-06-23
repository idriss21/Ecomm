-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 23 Juin 2016 à 05:59
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `e_comm_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `Sub_Cat` varchar(45) DEFAULT NULL,
  `Description` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`categoryID`, `name`, `Sub_Cat`, `Description`) VALUES
(1, 'cat1', 'sub_cat1', NULL),
(2, 'cat2', 'sub_cat2', NULL),
(3, 'cat3', 'sub_cat3', NULL),
(4, 'cat4', 'sub_cat4', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

CREATE TABLE `city` (
  `cityID` int(11) NOT NULL,
  `name` varchar(105) DEFAULT NULL,
  `apt` int(11) DEFAULT NULL,
  `country` varchar(105) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `city`
--

INSERT INTO `city` (`cityID`, `name`, `apt`, `country`) VALUES
(1, 'casablanca', 2020, 'Maroc');

-- --------------------------------------------------------

--
-- Structure de la table `costumer`
--

CREATE TABLE `costumer` (
  `costumerID` int(11) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `type_auth` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `costumer`
--

INSERT INTO `costumer` (`costumerID`, `phone`, `date_created`, `type_auth`, `status`, `id_user`, `id_city`) VALUES
(1, NULL, '2016-06-11 18:48:20', 1, 1, 1, 1),
(2, NULL, '2016-06-19 18:39:06', 1, 1, 9, 1),
(3, NULL, '2016-06-19 18:42:29', 1, 1, 10, 1),
(4, NULL, '2016-06-19 18:43:47', 1, 1, 11, 1),
(6, NULL, '2016-06-19 19:11:54', 1, 1, 13, 1),
(7, NULL, '2016-06-22 02:02:58', 1, 1, 14, 1);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `imageID` int(11) NOT NULL,
  `url_image` varchar(100) DEFAULT NULL,
  `ext` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `IMAGEcol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`imageID`, `url_image`, `ext`, `type`, `IMAGEcol`) VALUES
(1, 'uploads/rech.jpg', 'jpg', 'type1', 'xxxxxx'),
(3, 'uploads/ScreenShot_20160618140050.png', 'png', 'type1', NULL),
(4, 'uploads/ScreenShot_20160619190343.png', 'png', 'type1', NULL),
(5, 'uploads/sce.jpg', 'jpg', 'type1', NULL),
(12, 'uploads/Blue_Tshirt.jpg', 'jpg', 'type1', NULL),
(13, 'uploads/images.jpg', 'jpg', 'type1', NULL),
(14, 'uploads/mens-black_2.png', 'png', 'type1', NULL),
(15, 'uploads/images.jpg', 'jpg', 'type1', NULL),
(16, 'uploads/mens-black_2.png', 'png', 'type1', NULL),
(17, 'uploads/images.jpg', 'jpg', 'type1', NULL),
(18, 'uploads/mens-black_2.png', 'png', 'type1', NULL),
(19, 'uploads/Blue_Tshirt.jpg', 'jpg', 'type1', NULL),
(20, 'uploads/images.jpg', 'jpg', 'type1', NULL),
(21, 'uploads/Blue_Tshirt.jpg', 'jpg', 'type1', NULL),
(22, 'uploads/mens-black_2.png', 'png', 'type1', NULL),
(23, 'uploads/images.jpg', 'jpg', 'type1', NULL),
(24, 'uploads/Blue_Tshirt.jpg', 'jpg', 'type1', NULL),
(25, 'uploads/mens-black_3.png', 'png', 'type1', NULL),
(26, 'uploads/mens-black_3.png', 'png', 'type1', NULL),
(27, 'uploads/Blue_Tshirt.jpg', 'jpg', 'type1', NULL),
(28, 'uploads/mens-black_3.png', 'png', 'type1', NULL),
(29, 'uploads/Dames-HM-Super-Skinny-Low-Ripped-Jeans.jpg', 'jpg', 'type1', NULL),
(30, 'uploads/Dames-HM-Super-Skinny-Low-Ripped-Jeans.jpg', 'jpg', 'type1', NULL),
(31, 'uploads/Dames-HM.jpg', 'jpg', 'type1', NULL),
(32, 'uploads/Dames-HM_2.jpg', 'jpg', 'type1', NULL),
(33, 'uploads/ScreenShot_20160618173833.png', 'png', 'type1', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `DateCloture` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `orderQte` int(11) DEFAULT NULL,
  `id_costumer` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `position`
--

CREATE TABLE `position` (
  `positionID` int(11) NOT NULL,
  `lat` double DEFAULT NULL,
  `lang` double DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `position`
--

INSERT INTO `position` (`positionID`, `lat`, `lang`, `address`) VALUES
(1, 33.57311, -7.589843, 'casablanca , Rue 108 numero 23 ');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` mediumtext,
  `date_created` date DEFAULT NULL,
  `price` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `id_category` int(11) NOT NULL,
  `id_image` int(11) NOT NULL,
  `id_store` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `store`
--

CREATE TABLE `store` (
  `storeID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `Store_url` varchar(150) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `STOREcol` varchar(45) DEFAULT NULL,
  `id_position` int(11) NOT NULL,
  `id_costumer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `store`
--

INSERT INTO `store` (`storeID`, `name`, `Store_url`, `Status`, `STOREcol`, `id_position`, `id_costumer`) VALUES
(2, 'Adidas Store', 'http://www.adidas.fr/', 1, NULL, 1, 6),
(4, 'st1', 'https://www.facebook.com/mohamed.zouhair.7121?fref=jewel', 1, NULL, 1, 1),
(5, 'Mgo_Store', 'http://avito.ma/', 1, NULL, 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(105) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`userID`, `first_name`, `last_name`, `email`, `address`, `login`, `password`) VALUES
(1, 'idriss', 'zouhair', 'idrisszouhair@gmail.com', '', 'user', '1234'),
(2, 'kamal', 'zahir', 'kemalZa@gmail.com', 'inconnu', 'user01', '1234'),
(3, 'Saad', 'ZAlim', 'Saadoun@gmail.com', 'inconnu', 'user02', '1234'),
(4, 'name1', 'lname2', 'lemil@gmail.com', 'inconnu', 'abc', 'abc'),
(5, 'vvddvdvk', 'VDKVDO', 'VFVFV@VFVM.COM', 'inconnu', 'AAA', 'AAAA'),
(6, 'user', 'user', 'usrer@gmail.com', 'inconnu', 'user', '12345'),
(7, 'user005', 'user006', 'user005@gmail.com', 'inconnu', 'abcde', 'abcde'),
(8, 'user005', 'user006', 'user005@gmail.com', 'inconnu', '0000', '0000'),
(9, 'idrss2', 'zouhir', 'idrisszouhair@gmail.com', 'inconnu', 'aqw', 'aqw'),
(10, 'pppp', 'pppp', 'ppppp@gmail.com', 'inconnu', 'ppppp', 'pppp'),
(11, 'Marouane', 'El Amrani', 'AmraniMarouance@gmail.com', 'inconnu', 'admin2', 'admin2'),
(13, 'kamal', 'zahir', 'zahirKamal@gmail.com', 'inconnu', 'kamal', 'kamal'),
(14, 'Amine', 'Mgo', 'Mgo_1999@gmail.com', 'inconnu', 'user07', 'user07');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Index pour la table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityID`);

--
-- Index pour la table `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`costumerID`,`id_user`,`id_city`),
  ADD KEY `fk_COSTUMER_USER1_idx` (`id_user`),
  ADD KEY `fk_COSTUMER_CITY1_idx` (`id_city`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`imageID`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`,`id_costumer`,`id_product`),
  ADD KEY `fk_ORDER_COSTUMER1_idx` (`id_costumer`),
  ADD KEY `fk_ORDER_PRODUCT1_idx` (`id_product`);

--
-- Index pour la table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`positionID`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`,`id_category`,`id_image`,`id_store`),
  ADD KEY `fk_PRODUCT_CATEGORY_idx` (`id_category`),
  ADD KEY `fk_PRODUCT_IMAGE1_idx` (`id_image`),
  ADD KEY `fk_PRODUCT_STORE1_idx` (`id_store`);

--
-- Index pour la table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`storeID`,`id_position`),
  ADD KEY `fk_STORE_POSITION1_idx` (`id_position`),
  ADD KEY `fk_STORE_COSTUMER1_idx` (`id_costumer`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `city`
--
ALTER TABLE `city`
  MODIFY `cityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `costumerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `position`
--
ALTER TABLE `position`
  MODIFY `positionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `store`
--
ALTER TABLE `store`
  MODIFY `storeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `costumer`
--
ALTER TABLE `costumer`
  ADD CONSTRAINT `fk_COSTUMER_CITY1` FOREIGN KEY (`id_city`) REFERENCES `city` (`cityID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_COSTUMER_USER1` FOREIGN KEY (`id_user`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_ORDER_COSTUMER1` FOREIGN KEY (`id_costumer`) REFERENCES `costumer` (`costumerID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ORDER_PRODUCT1` FOREIGN KEY (`id_product`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_PRODUCT_SOTRE` FOREIGN KEY (`id_store`) REFERENCES `store` (`storeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_PRODUCT_CATEGORY` FOREIGN KEY (`id_category`) REFERENCES `category` (`categoryID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PRODUCT_IMAGE1` FOREIGN KEY (`id_image`) REFERENCES `image` (`imageID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `fk_STORE_COSTUMER1` FOREIGN KEY (`id_costumer`) REFERENCES `costumer` (`costumerID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_STORE_POSITION1` FOREIGN KEY (`id_position`) REFERENCES `position` (`positionID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
