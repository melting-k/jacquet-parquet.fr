-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 16 mai 2025 à 22:08
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hippodrome`
--

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(150) NOT NULL,
  `date_event` varchar(25) NOT NULL,
  `hour_event` varchar(25) DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `description` text,
  `cover` varchar(255) NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id_event`, `slug`, `date_event`, `hour_event`, `title`, `description`, `cover`) VALUES
(1, 'tous-au-paquodrome', '21-04-2025', '14h30', 'Tous au Pâquodrome !', '<p>Venez passer un moment en famille à l\'occasion de l\'ouverture de l\'Hippodrome Beaumont de Lomagne, le lundi 21 avril 2025 !<br><br>Chasse aux oeufs de Pâques, énigmes pour les enfants, bus suiveur et visite guidée sont au programme de cette journée placée sous le signe de la bonne humeur et de la convivialité !<br><br><strong>Entrée : 6.00€</strong><br><strong>Gratuit pour les moins de 18 ans !</strong></p>', 'uploads/images/682344442c762_paquodrome-2024-732x1024.jpg'),
(2, 'celebrons-150-ans-dhistoire-et-de-courses', '24-05-2025', '17h30', 'Célébrons 150 ans d\'histoire et de courses', '<p>Save the date ! <br><br>Le samedi 24 mai 2025, célébrons ensemble 150 ans d\'histoire et de courses à l\'Hippodrome Borde-Vieille, à Beaumont de Lomagne.<br><br>Venez célébrer avec nous les 150 ans de l\'Hippodrome avec un programme varié pour toute la famille !<br><br><strong>De nombreuses animations festives pour tous : </strong>retransmission de la Champions Cup de Rugby dans notre fanzone, mapping historique anniversaire, réunion trot \"Speed Cup Tour\", repas géré par la maison Micouleau...<br><br><strong>Et pour clôturer la journée de courses, nous avons le plaisir d\'accueillir le Collectif Métissé en concert !</strong><br><br>Une journée à ne pas râter... <strong>A vos agendas !</strong></p>', 'uploads/images/682345c4a86cc_SAVE-THE-DATE-_Page_1.jpg'),
(3, 'prix-raceandcare', '24-08-2025', '11h00', 'Prix #raceandcare', '<p>L\'hippodrome Beaumont de Lomagne a le plaisir de vous convier au <strong>prix #raceandcare </strong>le dimanche 24 août, à partir de 11h du matin !<br><br>Venez profiter d\'une journée de courses et observer nos chevaux et nos athlètes !<br><br>Événement organisé en partenariat avec la Fédération Nationale des Courses Hippiques.</p>', 'uploads/images/682346667cdea_RACEANDCARE-1024x858.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id_images` int(11) NOT NULL AUTO_INCREMENT,
  `icons` longtext,
  `open_graph` varchar(150) DEFAULT NULL,
  `favicon` varchar(150) DEFAULT NULL,
  `logo_main` varchar(150) DEFAULT NULL,
  `logo_alt` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_images`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id_images`, `icons`, `open_graph`, `favicon`, `logo_main`, `logo_alt`) VALUES
(1, 'a:3:{i:0;s:37:\"uploads/icons/680bb27bd6537_arrow.svg\";i:1;s:44:\"uploads/icons/680bb27bd6aca_bibliotheque.svg\";i:2;s:49:\"uploads/icons/680bb27bd6dd4_buanderie_cellier.svg\";}', 'uploads/images/680bb27bbd7fa_img-share.jpg', 'uploads/images/680bb27bbc1bf_icone.png', 'uploads/icons/680baea276123_logo-jennifer-organise.svg', 'uploads/icons/680bb27bbbd99_logo-full.svg');

-- --------------------------------------------------------

--
-- Structure de la table `infos`
--

DROP TABLE IF EXISTS `infos`;
CREATE TABLE IF NOT EXISTS `infos` (
  `id_infos` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(50) NOT NULL,
  `site_domain` varchar(50) NOT NULL,
  `site_url` varchar(100) NOT NULL COMMENT 'url',
  `site_email` varchar(100) NOT NULL COMMENT 'email',
  `social_links` longtext,
  `adresses` longtext,
  `opening_hours` longtext,
  `phone_number` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_infos`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `infos`
--

INSERT INTO `infos` (`id_infos`, `client_name`, `site_domain`, `site_url`, `site_email`, `social_links`, `adresses`, `opening_hours`, `phone_number`) VALUES
(1, 'Hippodrome BordeVieille', 'hippodrome-beaumont.fr', 'https://www.hippodrome-beaumont.fr/', 'hippodromebordevieille@wanadoo.fr', 'a:8:{s:8:\"facebook\";s:0:\"\";s:9:\"instagram\";s:0:\"\";s:7:\"twitter\";s:0:\"\";s:8:\"linkedin\";s:0:\"\";s:6:\"tiktok\";s:0:\"\";s:7:\"youtube\";s:0:\"\";s:8:\"calendly\";s:0:\"\";s:8:\"doctolib\";s:0:\"\";}', 'a:4:{s:6:\"street\";s:22:\"284 route de Montauban\";s:10:\"complement\";s:22:\"Lieu-dit Borde-Vieille\";s:7:\"zipcode\";s:5:\"82500\";s:4:\"city\";s:19:\"Beaumont-de-Lomagne\";}', 'a:1:{i:0;a:2:{s:4:\"days\";s:0:\"\";s:5:\"hours\";s:0:\"\";}}', '05 63 26 12 50');

-- --------------------------------------------------------

--
-- Structure de la table `legals`
--

DROP TABLE IF EXISTS `legals`;
CREATE TABLE IF NOT EXISTS `legals` (
  `id_legals` int(11) NOT NULL AUTO_INCREMENT,
  `denomination` varchar(50) NOT NULL,
  `publication_manager` varchar(50) NOT NULL,
  `ceo` varchar(50) NOT NULL,
  `ceo_role` varchar(50) NOT NULL,
  `company_type` varchar(50) NOT NULL,
  `rcs` varchar(50) NOT NULL,
  `siret` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `email_manager` varchar(100) NOT NULL COMMENT 'email',
  `phone_manager` varchar(20) NOT NULL,
  PRIMARY KEY (`id_legals`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `legals`
--

INSERT INTO `legals` (`id_legals`, `denomination`, `publication_manager`, `ceo`, `ceo_role`, `company_type`, `rcs`, `siret`, `address`, `zipcode`, `city`, `email_manager`, `phone_manager`) VALUES
(1, 'Association des Courses de Beaumont-de-Lomagne', 'Nadine Fleury', 'Nadine Fleury', 'Responsable de Publication', 'Association déclarée', 'Montauban', '77727020800039', 'Lieu-dit Bordevieille - 284 Route de Montauban', '82500', 'Beaumont-de-Lomagne', 'hippodromebordevieille@wanadoo.fr', '05 63 26 12 50');

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

DROP TABLE IF EXISTS `race`;
CREATE TABLE IF NOT EXISTS `race` (
  `id_race` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  `race_date` varchar(20) NOT NULL,
  `race_hour` varchar(20) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `program` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_race`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `race`
--

INSERT INTO `race` (`id_race`, `category`, `race_date`, `race_hour`, `title`, `program`) VALUES
(2, 'race', '30-03-2025', '14h30', NULL, NULL),
(3, 'race', '20-04-2025', '14h30', 'Pâques', NULL),
(4, 'race', '21-04-2025', '14h30', 'Lundi de Pâques', NULL),
(5, 'race', '28-04-2025', '12h30', NULL, NULL),
(6, 'race', '18-05-2025', '11h30', NULL, NULL),
(7, 'race', '24-05-2025', '17h30', NULL, NULL),
(8, 'race', '23-06-2025', '14h30', NULL, NULL),
(9, 'race', '14-07-2025', '16h00', 'Fête Nationale', NULL),
(10, 'race', '24-08-2025', '11h30', NULL, NULL),
(11, 'race', '02-09-2025', '12h00', NULL, NULL),
(12, 'race', '04-10-2025', '14h00', NULL, NULL),
(13, 'race', '22-10-2025', '11h30', 'Grand Prix du Sud-Ouest', NULL),
(14, 'race', '01-11-2025', '13h00', NULL, NULL),
(15, 'race', '30-11-2025', '11h30', NULL, NULL),
(16, 'race', '19-12-2025', '11h30', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(20) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL COMMENT 'email',
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `user_type`, `lastname`, `firstname`, `email`, `password`) VALUES
(9, 'superadmin', 'Tronchet', 'Benjamin', 'benjamintronchet@gmail.com', '$2y$10$ZIhtQ3WudjO6OQriiXSJY.S4XrVbpE3Nbv1mxMuGok28a8mRqRUUy'),
(10, 'contributor', 'Borde-Vieille', 'Hippodrome', 'hippodromebordevieille@wanadoo.fr', '$2y$10$la52MWEWFgwEKShXIAQ5.OkXZ.m4RH3/2xvjmUrMOWzDxUgBtSSZW');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
