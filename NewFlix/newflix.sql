-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 29 nov. 2018 à 05:58
-- Version du serveur :  5.6.38
-- Version de PHP :  7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `Newflix`
--

-- --------------------------------------------------------

--
-- Structure de la table `Movie`
--

CREATE TABLE `Movie` (
  `IdMv` int(11) NOT NULL,
  `Count` int(11) NOT NULL DEFAULT '0',
  `Title` varchar(50) NOT NULL,
  `Synopsis` varchar(500) NOT NULL,
  `Year` int(11) NOT NULL,
  `Duration` int(50) NOT NULL,
  `Link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Movie`
--

INSERT INTO `Movie` (`IdMv`, `Count`, `Title`, `Synopsis`, `Year`, `Duration`, `Link`) VALUES
(1, 10, 'Jumanji: Welcome to the Jungle', 'Four teenagers are sucked into a magical video game, and the only way they can escape is to work together to finish the game.', 2017, 119, 'https://www.imdb.com/videoembed/vi310426393'),
(2, 3, 'Jurassic World: Fallen Kingdom', 'When the island\'s dormant volcano begins roaring to life, Owen and Claire mount a campaign to rescue the remaining dinosaurs from this extinction-level event.', 2018, 128, 'https://www.imdb.com/videoembed/vi2465250073'),
(3, 3, 'The Dark Knight', 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham. The Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 2008, 152, 'https://www.imdb.com/videoembed/vi324468761'),
(4, 0, 'The Lord of the Rings: The Return of the King', 'Gandalf and Aragorn lead the World of Men against Sauron\'s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.', 2003, 201, 'https://www.imdb.com/videoembed/vi402694937'),
(5, 0, 'Avengers: Infinity War', 'The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.', 2018, 149, 'https://www.imdb.com/videoembed/vi528070681');

-- --------------------------------------------------------

--
-- Structure de la table `Serie`
--

CREATE TABLE `Serie` (
  `IdSr` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Synopsis` varchar(500) NOT NULL,
  `Period` varchar(20) NOT NULL,
  `Count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Serie`
--

INSERT INTO `Serie` (`IdSr`, `Title`, `Synopsis`, `Period`, `Count`) VALUES
(1, 'Game of Thrones', 'Nine noble families fight for control over the mythical lands of Westeros, while an ancient enemy returns after being dormant for thousands of years.', '2011-Still', 5),
(2, 'Vikings', 'The world of the Vikings is brought to life through the journey of Ragnar Lothbrok, the first Viking to emerge from Norse legend and onto the pages of history - a man on the edge of myth.', '2013-Still', 3),
(3, 'Breaking Bad', 'A high school chemistry teacher diagnosed with inoperable lung cancer turns to manufacturing and selling methamphetamine in order to secure his family\'s future.', '2008-2013', 81),
(4, 'The Big Bang Theory', 'A woman who moves into an apartment across the hall from two brilliant but socially awkward physicists shows them how little they know about life outside of the laboratory.', '2007-Still', 16),
(5, 'Rick and Morty', 'An animated series that follows the exploits of a super scientist and his not-so-bright grandson.', '2013-Still', 28),
(6, 'La Casa De Papel', 'Eight thieves take hostages and lock themselves in the Royal Mint of Spain as a criminal mastermind manipulates the police to carry out his plan.', '2017-Still', 19),
(7, 'Narcos', 'A chronicled look at the criminal exploits of Colombian drug lord Pablo Escobar, as well as the many other drug kingpins who plagued the country through the years.', '2015-Still', 73),
(8, 'Peaky Blinders', 'A gangster family epic set in 1919 Birmingham, England and centered on a gang who sew razor blades in the peaks of their caps, and their fierce boss Tommy Shelby, who means to move up in the world.', '2013', 7),
(9, '13 Reasons Why', 'Follows teenager Clay Jensen, in his quest to uncover the story behind his classmate and crush, Hannah, and her decision to end her life.', '2017-Still', 6);

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `Id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`Id`, `email`, `pass`, `name`) VALUES
(1, 'admin', 'admin', 'Admin'),
(2, 'me.mouammine@gmail.com', 'mehdi123', 'Mehdi'),
(7, 'mehdi', 'mehdi', 'mehdi'),
(8, 'saad', 'saad', 'saad'),
(9, 'mido@gmail.com', 'enZxYnp2cWI=', 'Mehdi'),
(10, 'adm@ad.com', 'bnF6dmFucXp2YQ==', 'aaa');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Movie`
--
ALTER TABLE `Movie`
  ADD PRIMARY KEY (`IdMv`);

--
-- Index pour la table `Serie`
--
ALTER TABLE `Serie`
  ADD PRIMARY KEY (`IdSr`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Movie`
--
ALTER TABLE `Movie`
  MODIFY `IdMv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Serie`
--
ALTER TABLE `Serie`
  MODIFY `IdSr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
