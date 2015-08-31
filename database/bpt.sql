-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 31 Août 2015 à 21:28
-- Version du serveur :  5.6.25
-- Version de PHP :  5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bpt`
--

-- --------------------------------------------------------

--
-- Structure de la table `attempts`
--

CREATE TABLE IF NOT EXISTS `attempts` (
  `id` int(11) NOT NULL,
  `ip` varchar(39) NOT NULL,
  `count` int(11) NOT NULL,
  `expiredate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL,
  `setting` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `config`
--

INSERT INTO `config` (`id`, `setting`, `value`) VALUES
(1, 'site_name', 'Burningphoenixteam.fr'),
(2, 'site_url', 'http://www.burningphoenixteam.fr'),
(3, 'site_email', 'noreply@burningphoenixteam.fr'),
(4, 'cookie_name', 'authID'),
(5, 'cookie_path', '/'),
(6, 'cookie_domain', NULL),
(7, 'cookie_secure', '0'),
(8, 'cookie_http', '0'),
(9, 'site_key', 'fghuior.)/!/jdUkd8s2!7HVHG7777ghg'),
(10, 'cookie_remember', '+1 month'),
(11, 'cookie_forget', '+30 minutes'),
(12, 'bcrypt_cost', '10'),
(13, 'table_attempts', 'attempts'),
(14, 'table_requests', 'requests'),
(15, 'table_sessions', 'sessions'),
(16, 'table_users', 'users'),
(17, 'site_timezone', 'Europe/Paris'),
(18, 'site_activation_page', 'activate'),
(19, 'site_password_reset_page', 'reset'),
(20, 'smtp', '0'),
(21, 'smtp_host', 'smtp.ns0.ovh.net'),
(22, 'smtp_auth', '1'),
(23, 'smtp_username', 'noreply@burningphoenixteam.fr'),
(24, 'smtp_password', 'sb364LwBR'),
(25, 'smtp_port', '587'),
(26, 'smtp_security', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `subject` varchar(120) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `subject`, `summary`, `content`, `image`, `created`) VALUES
(1, 'test001', 'coucou', '&lt;p&gt;rarea&lt;/p&gt;\r\n', 'IwfWAphxEe0710MR0030150070402501E01_DXXX.jpg', '2015-08-24'),
(2, 'news 2', 'hello la room', '&lt;p&gt;Pouet&lt;/p&gt;\r\n', 'Npq7WSsUI6image_large2.jpg', '0000-00-00'),
(3, 'Test html', 'html???', '&lt;p&gt;&lt;strong&gt;Salut &amp;agrave; tous&lt;/strong&gt;,&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.apple.com/v/imac-with-retina/a/images/overview/5k_image.jpg&quot; style=&quot;height:135px; width:240px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;test d&amp;#39;image&lt;/p&gt;\r\n\r\n&lt;p&gt;ca donne quoi?&lt;/p&gt;\r\n', 'pAbzDpKYsJimage_large2.jpg', '2015-04-16'),
(4, 'Ceci est un exemple', 'Star Citizen, y a rien de mieeux', '&lt;p&gt;&lt;em&gt;&lt;strong&gt;Bonjour &amp;agrave; tous,&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;http://www.journaldugamer.com/files/2013/10/star-citizen-funding-690x388-600x337.jpg&quot; style=&quot;height:200px; width:356px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;bienvenue &amp;agrave; tous,&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', 'xzNSFN7nuL0710MR0030150070402501E01_DXXX.jpg', '0000-00-00'),
(5, 'test png', 'les png c''est pas mal', '&lt;p&gt;coucou les gars&lt;/p&gt;\r\n\r\n&lt;p&gt;Les PNG, c&amp;#39;est cool&lt;/p&gt;\r\n', 'RuCQh7K45Glezard0.png', '0000-00-00'),
(6, 'png test', 'test d''un png??', '&lt;p&gt;alors quoi? ca marche?&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', 'LlIv86Dx63lezard0.png', '0000-00-00'),
(7, 'test png 003', 'png?', '&lt;p&gt;coucou&lt;/p&gt;\r\n', 'lvU4N1fusalezard0.png', '0000-00-00'),
(8, 'Test date', 'coucou la date', '&lt;p&gt;super, ca marche?&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', '3j6jt0Kmx0lezard0.png', '2015-08-26'),
(9, 'date test firefox', 'test date firefox', '&lt;p&gt;coucou&lt;/p&gt;\r\n', 'elBKlrmLp3lezard0.png', '0000-00-00'),
(10, 'ceci est un test firefox', 'pour la date', '&lt;p&gt;un pour tous&lt;/p&gt;\r\n\r\n&lt;p&gt;tous pour un&lt;/p&gt;\r\n', 'PmhbzfjgHElezard0.png', '0000-00-00'),
(11, 'test date chrome', 'chrome', '&lt;p&gt;salut la date&lt;/p&gt;\r\n', 'dyIXEEEEgylezard0.png', '2015-08-26'),
(12, 'ceci est un test firefox date', 'date ?', '&lt;p&gt;hello la date&lt;/p&gt;\r\n', '6QeUS50PiX0710MR0030150070402501E01_DXXX.jpg', '2015-08-26');

-- --------------------------------------------------------

--
-- Structure de la table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rkey` varchar(20) NOT NULL,
  `expire` datetime NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `requests`
--

INSERT INTO `requests` (`id`, `uid`, `rkey`, `expire`, `type`) VALUES
(1, 1, '68z8L49640d200nk7hKW', '2015-08-30 00:10:30', 'activation');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `user_id` int(11) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`user_id`, `role`) VALUES
(3, 'newsmanager');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sessions`
--

INSERT INTO `sessions` (`id`, `uid`, `hash`, `expiredate`, `ip`, `agent`, `cookie_crc`) VALUES
(11, 3, 'b47816dd17dd1d137ed1f6f1fce2d633cc84d079', '2015-09-29 21:26:29', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.157 Safari/537.36', '5196f609a8eb16c572ca261ef2bd295b8b33ffe1'),
(12, 2, 'acc81996fc96af0adc335d1bec4963ae3d1a8f58', '2015-10-01 21:13:29', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', '4a6b14f608d4a9cc36494866be6b44dbaf40dd40');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `isactive`, `dt`) VALUES
(2, 'yves21.haut@gmail.com', '$2y$10$sI2BDgVRCmu9kgNLniguSebrDJvbQzRFe81y//Bdm3bHzYC60YP1q', 1, '2015-08-28 22:17:52'),
(3, 'soldiertt@gmail.com', '$2y$10$9kqMdzYXLOsXiX3b8XCvkO3EqRbHwj0Wn8yRq57xfo3NFcPR9JWTO', 1, '2015-08-29 19:20:05');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_fk` (`author`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`user_id`,`role`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
