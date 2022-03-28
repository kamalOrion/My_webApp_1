-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 14 mars 2022 à 21:08
-- Version du serveur : 5.7.26
-- Version de PHP : 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `courrier`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `statut` int(11) NOT NULL,
  `date_enreg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modif` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `libelle`, `statut`, `date_enreg`, `date_modif`) VALUES
(1, 'GEP', 1, '2022-03-14 08:48:39', '2022-03-14 08:48:39'),
(2, 'MCA', 1, '2022-03-14 08:48:39', '2022-03-14 08:48:39'),
(3, 'TRA', 1, '2022-03-14 08:48:39', '2022-03-14 08:48:39'),
(4, 'DTRA', 1, '2022-03-14 08:51:17', '2022-03-14 08:51:17'),
(5, 'DGEP', 1, '2022-03-14 09:01:48', '2022-03-14 09:01:48'),
(6, 'GEP	', 1, '2022-03-14 10:12:29', '2022-03-14 10:12:29'),
(7, 'PMC', 1, '2022-03-14 10:53:12', '2022-03-14 10:53:12'),
(8, 'TRA	', 1, '2022-03-14 15:31:53', '2022-03-14 15:31:53'),
(9, 'DT-SBEE', 1, '2022-03-14 15:44:31', '2022-03-14 15:44:31'),
(10, 'CEB', 1, '2022-03-14 15:44:31', '2022-03-14 15:44:31'),
(11, 'SBEE', 1, '2022-03-14 17:20:49', '2022-03-14 17:20:49');

-- --------------------------------------------------------

--
-- Structure de la table `courrier`
--

DROP TABLE IF EXISTS `courrier`;
CREATE TABLE IF NOT EXISTS `courrier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_reception` date NOT NULL,
  `date_emission` date NOT NULL,
  `reference` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `emetteur` text NOT NULL,
  `destinataires` text NOT NULL,
  `se_refere` varchar(255) NOT NULL,
  `echeance_reponse` date DEFAULT NULL,
  `cote` varchar(255) NOT NULL,
  `statut` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `commentaires` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_enreg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modif` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=163 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `courrier`
--

INSERT INTO `courrier` (`id`, `date_reception`, `date_emission`, `reference`, `objet`, `emetteur`, `destinataires`, `se_refere`, `echeance_reponse`, `cote`, `statut`, `titre`, `commentaires`, `user_id`, `date_enreg`, `date_modif`) VALUES
(1, '2020-05-28', '2020-05-28', 'LT-GEP-TRA-0001', 'Demande de paiement premier décompte IPC #1 - PA', 'GEP', 'MCA/TRA', '', NULL, '', 1, '', '', 1, '2022-03-14 08:48:39', '2022-03-14 08:48:39'),
(2, '2020-06-10', '2020-06-10', 'Q9800-DERC-TRA-20-GE-CLT-0001.  Rev.A', 'escriptif technique : Aménagement des postes SBEE existants	', 'DTRA', 'GEP', '', NULL, '', 1, '', '\r\n', 1, '2022-03-14 08:51:17', '2022-03-14 08:51:17'),
(3, '2020-06-15', '2020-06-15', 'Q9800-DERC-TRA-20-GE-CLT-0002.  Rev.', 'Report du Kick off Meeting ', 'TRA', 'GEP', '', NULL, '', 1, '', '', 1, '2022-03-14 08:52:52', '2022-03-14 08:52:52'),
(4, '2020-06-17', '2020-06-17', 'Q9800-DERC-TRA-20-GE-CLT-0003.  Rev.', 'Point des contrats d\'assurance à souscrire par GE Postes', 'TRA', 'GEP', '', NULL, '', 1, '', '', 1, '2022-03-14 08:53:53', '2022-03-14 08:53:53'),
(5, '2020-06-30', '2020-06-30', 'Q9800-DERC-TRA-20-GE-CLT-0004.  Rev.', 'Rappel pour transmission Premier rapport mensuel d’avancement', 'TRA', 'GEP', '', NULL, '', 1, '', '\r\n', 1, '2022-03-14 08:54:49', '2022-03-14 08:54:49'),
(6, '2020-06-09', '2020-06-09', 'Q9800-DERC-TRA-20-GE-CLT-0005.  Rev.A', 'Note Technique Postes de Natitingou et Bohicon', 'TRA', 'MCA', '', NULL, '', 1, '', '', 1, '2022-03-14 08:55:53', '2022-03-14 08:55:53'),
(7, '2020-07-12', '2020-07-12', 'LT-GEP-TRA-002', 'Demande d\'accès Vèdoko Topo', 'GEP', 'MCA/TRA', '', NULL, '', 1, '', '', 1, '2022-03-14 08:57:19', '2022-03-14 08:57:19'),
(8, '2020-07-14', '2020-07-14', 'LT-GEP-TRA / 003', 'Assurance tout risques chantier (clause 18.2)', 'GEP', 'MCA/TRA', '', NULL, '', 1, '', '', 1, '2022-03-14 08:58:00', '2022-03-14 08:58:00'),
(9, '2020-08-02', '2020-08-02', 'LT-GEP-TRA / 006', 'emande de changement de fournisseur – transformateurs de mesure	', 'DGEP', 'MCA/TRA', '', NULL, '', 1, '', '', 1, '2022-03-14 09:01:48', '2022-03-14 09:01:48'),
(10, '2020-08-17', '2020-08-17', 'Q9800-GLPR-TRA-20-GE-CLT-0006.  Rev.	', 'Lettre d\'invitation au KOM de GEP pour le 19 août 2020', 'TRA', 'GEP', '', NULL, '', 1, '', '', 1, '2022-03-14 09:02:35', '2022-03-14 09:51:42'),
(11, '2022-08-24', '2022-08-24', 'Q9800-GLPR-TRA-20-GE-CLT-0007.  Rev.', 'Rappel du respect des obligations contractuelles et notamment des délais de remise du rapport mensuel ', 'TRA', 'GEP', '', NULL, '', 1, '', '', 1, '2022-03-14 09:04:35', '2022-03-14 09:44:31'),
(12, '2022-09-07', '2022-09-07', 'Q9800-DERC-TRA-20-EL-CLT-0008.  Rev.', 'Changement de fournisseurs de transformateurs de mesure GEP', 'TRA', 'GEP', '02-août-20; LT-GEP-TRA / 006; Demande de changement de fournisseur – transformateurs de mesure', NULL, '', 1, '', '', 1, '2022-03-14 09:38:29', '2022-03-14 09:38:29'),
(13, '2022-03-09', '2022-03-09', 'Q9800-GLPR-TRA-20-PM-CLT-0009.  Rev.', 'Rappel à l’Ordre pour la soumission des livrables de GEP', 'TRA', 'GEP', '', NULL, '', 1, '', '', 1, '2022-03-14 09:41:51', '2022-03-14 09:41:51'),
(14, '2022-09-19', '2022-09-19', 'LT-GEP-TRA 007', 'charge de la construction - proposition de profil de remplacement No 2', 'GEP', 'TRA/MCA', '', NULL, '', 1, '', '', 1, '2022-03-14 09:45:50', '2022-03-14 09:45:50'),
(15, '2022-09-25', '2022-09-25', 'Q9800-DERC-TRA-20-GE-CLT-0010.  Rev.', 'Mise en demeure', 'TRA', 'GEP', '09-sept-20; Q9800-GLPR-TRA-20-PM-CLT-0009.  Rev.; Rappel à l’Ordre pour la soumission des livrables de GEP', NULL, '', 1, '', '', 1, '2022-03-14 09:47:47', '2022-03-14 09:47:47'),
(16, '2020-10-02', '2020-10-02', 'Q9800-DERC-TRA-20-GE-CLT-0011.  Rev.', 'Demande d\'informations sur installation chantier', 'TRA', 'GEP', '', NULL, '', 1, '', '', 1, '2022-03-14 09:59:21', '2022-03-14 09:59:21'),
(17, '2020-10-08', '2020-10-08', 'Q9800-DERC-TRA-20-GE-CLT-0012.  Rev.	', 'Notification désignation bureau conciliateur de GEP', 'TRA', 'GEP', '', NULL, '', 1, '', '', 1, '2022-03-14 10:00:38', '2022-03-14 10:00:38'),
(18, '2020-10-22', '2020-10-22', 'Q9800-DERC-TRA-20-GE-CLT-0013.  Rev.', 'Mise en place bureau conciliateur GEP', 'TRA', 'GEP', '', NULL, '', 1, '', '', 1, '2022-03-14 10:02:00', '2022-03-14 10:02:00'),
(19, '2020-10-22', '2020-10-22', 'Q9800-DERC-TRA-20-GE-CLT-0014.  Rev.	', 'Demande de listes de sous-traitans', 'TRA', 'GEP', '09-sept-20; Q9800-GLPR-TRA-20-PM-CLT-0009.  Rev.; Rappel à l’Ordre pour la soumission des livrables de GEP', NULL, '', 1, '', '', 1, '2022-03-14 10:03:31', '2022-03-14 10:04:07'),
(20, '2020-11-05', '2020-11-05', 'LT-GEP-TRA  009 ', 'Mise en place bureau conciliateur', 'GEP', 'TRA/MCA', '22-oct-20; Q9800-DERC-TRA-20-GE-CLT-0013.  Rev.; Mise en place bureau conciliateur GEP', NULL, '', 1, '', '', 1, '2022-03-14 10:08:02', '2022-03-14 10:08:02'),
(21, '2020-11-06', '2020-11-06', 'LT-GEP-TRA 008', 'LT-GEP-TRA 008 Force Majeure COVID', 'GEP	', 'MCA/TRA', '', NULL, '', 1, '', '\r\n', 1, '2022-03-14 10:12:29', '2022-03-14 10:12:29'),
(22, '2020-11-27', '2020-11-27', 'Q9800-DERC-TRA-20-GE-CLT-0015.  Rev.', 'Information sur la séance de clarification avec bureau conciliateur', 'TRA', 'GEP', '', NULL, '', 1, '', '', 1, '2022-03-14 10:13:29', '2022-03-14 10:13:29'),
(23, '2020-12-10', '2020-12-10', 'Q9800-GLPR-TRA-20-GE-CLT-0016.  Rev.', 'Mise en demeure ', 'TRA', 'GEP', '22-oct-20; Q9800-DERC-TRA-20-GE-CLT-0014.  Rev.; Demande de listes de sous-traitans', NULL, '', 1, '', '', 1, '2022-03-14 10:38:40', '2022-03-14 10:38:40'),
(24, '2020-12-11', '2020-12-11', 'LT-GEP-TRA-010	', 'Reponse et clarification MCA', 'GEP	', 'MCA/TRA', '', NULL, '', 1, '', '', 1, '2022-03-14 10:51:51', '2022-03-14 10:51:51'),
(25, '2020-12-15', '2020-12-15', 'LT-GEP-TRA-011 ', 'Réponse lettre MCA du 10_12_2020', 'GEP', 'MCA/TRA/PMC', 'Lettre du MCA du 10/12/2020', NULL, '', 1, '', '', 1, '2022-03-14 10:53:12', '2022-03-14 10:56:52'),
(26, '2020-12-15', '2020-12-15', 'LT-GEP-TRA-011', 'Réponse lettre MCA du 10_12_2020	', 'GEP', 'MCA/TRA/PMC', '10-déc-20; Q9800-GLPR-TRA-20-GE-CLT-0016.  Rev.; Mise en demeure ', NULL, '', 1, '', '', 1, '2022-03-14 11:01:44', '2022-03-14 11:01:44'),
(27, '2020-12-15', '2020-12-15', 'LT-GEP-TRA-012	', 'Demande de réunion Système de protection', 'GEP', 'MCA/TRA', '', NULL, '', 1, '', '', 1, '2022-03-14 11:07:25', '2022-03-14 11:07:25'),
(28, '2020-12-21', '2020-12-21', 'LT-GEP-TRA-013', 'Réponse détaillée à lettre 10/12/2020', 'GEP', 'MCA/TRA/PMC', '10-déc-20; Q9800-GLPR-TRA-20-GE-CLT-0016.; Rev.	Mise en demeure kamal', NULL, 'qsdf', 1, 'qsdf', 'qsd', 1, '2022-03-14 12:20:03', '2022-03-14 12:20:03'),
(29, '2020-12-21', '2020-12-21', 'LT-GEP-TRA-013', 'Réponse détaillée à lettre 10/12/2020', 'GEP', 'MCA/TRA/PMC', '10-déc-20; Q9800-GLPR-TRA-20-GE-CLT-0016.; Rev.	Mise en demeure', '1970-01-01', '', 1, '', '', 1, '2022-03-14 12:43:05', '2022-03-14 12:43:05'),
(30, '2020-12-21', '2020-12-21', 'LT-GEP-TRA-014', 'Lettre officielle COVID', 'GEP', 'MCA/TRA', '', NULL, '', 1, '', '', 1, '2022-03-14 13:43:48', '2022-03-14 13:43:48'),
(31, '2021-01-06', '2021-01-06', 'Q9800-GLPR-TRA-20-GE-CLT-0017. Rev.', 'Retard du payement des travailleurs des sous-traitants de Grid Solutions', 'TRA', 'GEP', '', NULL, '', 1, '', '', 1, '2022-03-14 13:43:48', '2022-03-14 13:43:48'),
(32, '2021-01-14', '2021-01-14', 'LT-GEP-TRA-015', 'Modification contrat Système 48Vcc', 'GEP', 'MCA/TRA', '', NULL, '', 1, '', '', 1, '2022-03-14 13:43:48', '2022-03-14 13:43:48'),
(33, '2021-01-18', '2021-01-18', 'LT-GEP-TRA 16', 'VO N°3 BOH remplacement sectionneur', 'GEP', 'MCA/TRA', '', NULL, '', 1, '', '', 1, '2022-03-14 13:43:48', '2022-03-14 13:43:48'),
(34, '2021-01-16', '2021-01-16', 'LT-GEP-TRA 17', 'VON°2 Batiment BEU 33kV', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 13:44:57', '2022-03-14 13:44:57'),
(35, '2021-02-08', '2021-02-08', 'Q9800-DERC-TRA-20-GE-CLT-0018.  Rev.', 'Point des contrats d\'assurance à souscrire par GE Postes', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 13:44:57', '2022-03-14 13:44:57'),
(36, '2021-02-12', '2021-02-12', 'LT-GEP-TRA 20 ', 'Chiffrage détaillé pour la nouvelle implantation de DJO 161kV', 'TRA', 'MCA/TRA', 'MCAB2_4NT_0706097_000_00_NTE-Rev.GEP', '1970-01-01', '', 1, '', '', 1, '2022-03-14 13:44:57', '2022-03-14 13:44:57'),
(37, '2021-02-19', '2021-02-19', 'Q9800-GLPR-TRA-20-GE-CLT-0019.  Rev.', 'Amélioration des procahins RMA', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 13:44:57', '2022-03-14 13:44:57'),
(38, '2021-02-19', '2021-02-19', 'Q9800-DERG-TRA-20-PM-CLT-0020.  Rev.', 'Information et relance d\'assurances ', 'TRA', 'MCA/GEP', '08-févr-21; Q9800-DERC-TRA-20-GE-CLT-0018.  Rev.; Point des contrats d\'assurance à souscrire par GE Postes', '1970-01-01', '', 1, '', '', 1, '2022-03-14 13:44:57', '2022-03-14 13:44:57'),
(39, '2021-02-24', '2021-02-24', 'LT-GEP-TRA-019', 'Système de monitoring pour transformateur VED et BOH', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 13:44:57', '2022-03-14 13:44:57'),
(40, '2021-03-05', '2021-03-05', 'Q9800-DERG-TRA-20-HS-CLT-0021.  Rev.', 'Soumisssion des plans EHS', 'TRA', 'MCA/GEP', '', NULL, '', 1, '', '', 1, '2022-03-14 14:53:01', '2022-03-14 14:53:01'),
(41, '2021-03-10', '2021-03-10', 'LT-GEP-TRA-021', 'Retour points critiques', 'GEP', 'MCA/TRA', '', NULL, '', 1, '', '', 1, '2022-03-14 14:53:01', '2022-03-14 14:53:01'),
(42, '2021-03-11', '2021-03-11', 'Q9800-DERG-TRA-20-IS-CLT-0022.  Rev.', 'Lettre d\'information', 'TRA', 'MCA/GEP', '', NULL, '', 1, '', '', 1, '2022-03-14 14:53:01', '2022-03-14 14:53:01'),
(43, '2021-02-12', '2021-02-12', 'Q9800-DERG-TRA-20-EL-CLT-0023.  Rev.', 'Transmission du PV de la FAT des disjoncteurs pour approbation', 'TRA', 'GEP/MCA', '', NULL, '', 1, '', '', 1, '2022-03-14 14:53:01', '2022-03-14 14:53:01'),
(44, '2021-03-17', '2021-03-17', 'LT-GEP-TRA-022', 'Chiffrage détaillé pour les nouvelles modifications du scope initial', 'GEP', 'MCA/TRA', '', NULL, '', 1, '', '', 1, '2022-03-14 14:53:01', '2022-03-14 14:53:01'),
(45, '2021-03-26', '2021-03-26', 'LT-GEP-TRA 023', 'SOUMISSION DES PLANS EHS', 'GEP', 'MCA/TRA', '05-mars-21; Q9800-DERG-TRA-20-HS-CLT-0021.  Rev.; Soumisssion des plans EHS', NULL, '', 1, '', '', 1, '2022-03-14 14:53:01', '2022-03-14 14:53:01'),
(46, '2021-03-31', '2021-03-31', 'Q9800-DERG-TRA-20-PM-CLT-0024.  Rev.', 'Chiffrage détaillé pour les Nouvelles modifications du scope initial', 'TRA', 'GEP', '17-mars-21; LT-GEP-TRA-022; Chiffrage détaillé pour les nouvelles modifications du scope initial', NULL, '', 1, '', '', 1, '2022-03-14 14:53:01', '2022-03-14 14:53:01'),
(47, '2021-04-01', '2021-04-01', 'LT-GEP-TRA 024', 'Retard sur la finalisation et l’approbation des plans d’installation extérieure de Vedoko', 'GEP', 'MCA/TRA', '', NULL, '', 1, '', '', 1, '2022-03-14 14:53:01', '2022-03-14 14:53:01'),
(48, '2021-05-05', '2021-05-05', 'Q9800-DERG-TRA-20-PM-CLT-0025.  Rev.', 'Soumission de documents de sous traitant AGETUR/ AEEP', 'TRA', 'GEP/MCA', '', NULL, '', 1, '', '', 1, '2022-03-14 14:53:01', '2022-03-14 14:53:01'),
(49, '2021-05-06', '2021-05-06', 'LT-GEP-TRA 025', 'retour informations sous traitants', 'GEP', 'MCA/TRA', '05-mai-21; Q9800-DERG-TRA-20-PM-CLT-0025.  Rev.; Soumission de documents de sous traitant AGETUR/ AEEP', NULL, '', 1, '', '', 1, '2022-03-14 14:53:01', '2022-03-14 14:53:01'),
(50, '2021-05-11', '2021-05-11', 'LT-GEP-TRA 026', 'Validation du Planning Contractuel de Référence revision F- 11.05.2021', 'GEP', 'MCA/TRA', '', NULL, '', 1, '', '', 1, '2022-03-14 15:23:12', '2022-03-14 15:23:12'),
(51, '2021-05-12', '2021-05-12', 'Q9800-DERG-TRA-20-PN-CLT-0026', 'Rejet Planning Rev. F', 'TRA', 'GEP', '11-mai-21	LT-GEP-TRA 026; LT-GEP-TRA 026 Validation du Planning Contractuel de Référence revision F- 11.05.2021', NULL, '', 1, '', '', 1, '2022-03-14 15:23:12', '2022-03-14 15:23:12'),
(52, '2021-05-20', '2021-05-20', 'Q9800-DERG-TRA-20-GE-CLT-0027.  Rev.', 'Soumission des matrices hebdomadaires', 'TRA', 'GEP/MCA', '', NULL, '', 1, '', '', 1, '2022-03-14 15:23:12', '2022-03-14 15:23:12'),
(53, '2021-05-25', '2021-05-25', 'Q9800-DERG-TRA-20-PM-CLT-0028.  Rev.', 'Organisation GEP/ AEEP', 'TRA', 'GEP/MCA', '', NULL, '', 1, '', '', 1, '2022-03-14 15:23:12', '2022-03-14 15:23:12'),
(54, '2021-05-26', '2021-05-26', 'Q9800-DERG-TRA-20-PM-CLT-0029.  Rev.', 'Organisation GEP/ AEEP revu', 'TRA', 'recp', '25-mai-21; Q9800-DERG-TRA-20-PM-CLT-0028.  Rev.; Organisation GEP/ AEEP', NULL, '', 1, '', '', 1, '2022-03-14 15:23:12', '2022-03-14 15:23:12'),
(55, '2021-05-28', '2021-05-28', 'Q9800-DERG-TRA-20-GE-CLT-0030.  Rev.', 'Requête d\'absence Babou du 25 juin au 19 juillet 2021', 'TRA', 'MCA', '', NULL, '', 1, '', '', 1, '2022-03-14 15:23:12', '2022-03-14 15:23:12'),
(56, '2021-06-10', '2021-06-10', 'Q9800-DERC-TRA-20-GE-CLT-0031.  Rev.', 'Notificatioon pour rectification', 'TRA', 'GEP/MCA', '', NULL, '', 1, '', '', 1, '2022-03-14 15:23:12', '2022-03-14 15:23:12'),
(57, '2021-06-10', '2021-06-10', 'Q9800-DERG-TRA-20-GE-CLT-0032.  Rev.', 'Retard de construction', 'TRA', 'GEP/MCA', '', NULL, '', 1, '', '', 1, '2022-03-14 15:23:12', '2022-03-14 15:23:12'),
(58, '2021-06-10', '2021-06-10', 'Q9800-DERG-TRA-20-GE-CLT-0033.  Rev.', 'Situation de AEEP sous-traitant de votre contrat', 'TRA', 'GEP/MCA', '11-mars-21; Q9800-DERG-TRA-20-IS-CLT-0022.  Rev.; Lettre d\'information', NULL, '', 1, '', '', 1, '2022-03-14 15:23:12', '2022-03-14 15:23:12'),
(59, '2021-06-10', '2021-06-10', 'Q9800-DERG-TRA-20-GE-CLT-0033.  Rev.', 'Situation de AEEP sous-traitant de votre contrat', 'TRA', 'GEP/MCA', '26-mai-21;  Q9800-DERG-TRA-20-PM-CLT-0029.  Rev.; Organisation GEP/ AEEP revu', NULL, '', 1, '', '', 1, '2022-03-14 15:27:48', '2022-03-14 15:27:48'),
(60, '2021-06-14', '2021-06-14', 'Q9800-DERC-TRA-20-GE-CLT-0034.  Rev.', 'Qualification ITB 							', 'TRA	', 'GEP/MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:31:53', '2022-03-14 15:31:53'),
(61, '2021-06-15', '2021-06-15', 'Q9800-DERG-TRA-20-PM-CLT-0035.  Rev.', 'CERTIFICAT DE PAIEMENT PROVISOIRE N° 03_', 'TRA', 'MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:32:31', '2022-03-14 15:32:31'),
(62, '2021-06-15', '2021-06-15', 'Q9800-DERG-TRA-20-PM-CLT-0036.  Rev.', 'CERTIFICAT DE PAIEMENT PROVISOIRE N° 02 ', 'TRA', 'MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:33:03', '2022-03-14 15:33:03'),
(63, '2021-06-15', '2021-06-15', 'Q9800-DERG-TRA-20-PM-CLT-0037.  Rev.', 'Transmission des factures de GE Postes pour approbation (05 véhicules pour l\'ingénieur)', 'TRA', 'PMC', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:33:41', '2022-03-14 15:33:41'),
(64, '2021-06-16', '2021-06-16', 'LT-GEP-TRA-027', 'Retour information AGETUR', 'GEP', 'MCA/TRA', '0-juin-21; Q9800-DERG-TRA-20-GE-CLT-0033.  Rev.; Situation de AEEP sous-traitant de votre contrat ', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:34:50', '2022-03-14 15:34:50'),
(65, '2021-06-16', '2021-06-16', 'LT-GEP-TRA-028', 'DEMANDE BLOCAGE AEEP', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:36:05', '2022-03-14 15:36:05'),
(66, '2021-06-23', '2021-06-23', 'LT-GEP-TRA-028,1', 'Réponse Notification de rectification-23.06.2021', 'GEP	', 'MCA/TRA', '10-juin-21; Q9800-DERC-TRA-20-GE-CLT-0031.  Rev.; Notificatioon pour rectification', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:37:59', '2022-03-14 15:37:59'),
(67, '2021-06-23', '2021-06-23', 'Q9800-DERC-TRA-20-PN-CLT-0038.  Rev.', 'Définition planning de référence et rappel des bonnes pratiques	', 'TRA', 'GEP/MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:38:40', '2022-03-14 15:38:40'),
(68, '2021-06-24', '2021-06-24', 'LT-GEP-TRA-029', 'Réponse Retard Construction-24.06.2021', 'GEP', 'MCA/TRA', '10-juin-21; Q9800-DERG-TRA-20-GE-CLT-0032.  Rev.; Retard de construction ', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:39:42', '2022-03-14 15:39:42'),
(69, '2021-06-25', '2021-06-25', 'LT-GEP-TRA 030', 'Demande de validaiton de fournisseur des Armoires AC-DC - 25.06.2021', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:42:36', '2022-03-14 15:42:36'),
(70, '2021-06-28', '2021-06-28', 'Q9800-DERG-TRA-20-PM-CLT-0039.  Rev.', 'Demande de consignation', 'TRA', 'MCA/DT-SBEE/CEB', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:44:31', '2022-03-14 15:44:31'),
(71, '2021-06-28', '2021-06-28', 'Q9800-DERG-TRA-20-PM-CLT-0040.  Rev.', 'Variation Order n°22', 'TRA', 'GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:45:26', '2022-03-14 15:45:26'),
(72, '2021-06-29', '2021-06-29', 'LT-GEP-TRA 031', 'Offre budgétaire révisée VOs DJO-BEU-BOH', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:47:32', '2022-03-14 15:47:32'),
(73, '2021-06-30', '2021-06-30', 'Q9800-DERG-TRA-20-PM-CLT-0041.  Rev.', 'CERTIFICAT DE PAIEMENT PROVISOIRE N° 02', 'TRA', 'MCA/PMC', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:48:12', '2022-03-14 15:48:12'),
(74, '2021-07-02', '2021-07-02', 'Q9800-DERG-TRA-20-IS-CLT-0042.  Rev.', 'Retard dans la phase de construction', 'TRA', 'GEP/MCA', '24-juin-21; LT-GEP-TRA-029; Réponse Retard Construction-24.06.2021', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:51:26', '2022-03-14 15:51:26'),
(75, '2021-07-02', '2021-07-02', 'Q9800-DERG-TRA-20-IS-CLT-0042.  Rev.', 'Retard dans la phase de construction ', 'TRA', 'GEP/MCA', '10-juin-21; Q9800-DERG-TRA-20-GE-CLT-0032.  Rev.; Retard de construction ', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:52:49', '2022-03-14 15:52:49'),
(76, '2021-07-02', '2021-07-02', 'Q9800-DERG-TRA-20-IS-CLT-0042.  Rev.', 'Retard dans la phase de construction', 'TRA', 'GEP/MCA', '23-juin-21; Q9800-DERC-TRA-20-PN-CLT-0038.  Rev.; Définition planning de référence et rappel des bonnes pratiques', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:54:40', '2022-03-14 15:54:40'),
(77, '2021-07-02', '2021-07-02', 'Q9800-DERG-TRA-20-PM-CLT-0043.  Rev.', 'AS de votre courrier réponse n° LT-GEP-028 en date du 23 juin 2021', 'TRA', 'GEP/MCA', '23-juin-21; LT-GEP-TRA-028,1; Réponse Notification de rectification-23.06.2021', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:56:10', '2022-03-14 15:56:10'),
(78, '2021-07-05', '2021-07-05', 'LT-GEP-TRA 032', 'Variation Order n°22', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:58:04', '2022-03-14 15:58:04'),
(79, '2021-07-05', '2021-07-05', 'Q9800-DERG-TRA-20-PM-CLT-0044.  Rev.', 'Transmission du décompte n°2 de GE Postes', 'TRA', 'MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:59:07', '2022-03-14 15:59:07'),
(80, '2021-07-06', '2021-07-06', 'LT-GEP-TRA-033', 'Retard dans la validation de Plans', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 15:59:40', '2022-03-14 15:59:40'),
(81, '2021-07-07', '2021-07-07', 'LT-GEP-TRA-034', 'Notification de Force Majeur sur le transport maritime et les FATs en présentiel', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:00:19', '2022-03-14 16:00:19'),
(82, '2021-07-12', '2021-07-12', 'LT-GEP-TRA-035', ' Attente Retour FAT Finlande', 'GEP', 'MCA/TRA', '13-juil-21; Q9800-DERG-TRA-20-PM-CLT-0045.  Rev.; FAT des bancs condensateurs', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:04:16', '2022-03-14 16:04:16'),
(83, '2021-07-12', '2021-07-12', 'LT-GEP-TRA-035', 'Attente Retour FAT Finlande', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:06:03', '2022-03-14 16:06:03'),
(84, '2021-07-13', '2021-07-13', 'Q9800-DERG-TRA-20-PM-CLT-0045.  Rev.', 'FAT des bancs condensateurs', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:06:37', '2022-03-14 16:06:37'),
(85, '2021-07-14', '2021-07-14', '	Q9800-DERG-TRA-20-PM-CLT-0046.  Rev.', 'Demande de consignation', 'TRA', 'MCA/DT-SBEE/CEB', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:08:33', '2022-03-14 16:08:33'),
(86, '2021-07-16', '2021-07-16', 'LT-GEP-TRA-036', 'Réunions Mensuelles-16.07.2021', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:09:17', '2022-03-14 16:09:17'),
(87, '2021-07-19', '2021-07-19', 'LT-GEP-TRA-037', 'alidation technique et proposition commerciale VO	', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:09:57', '2022-03-14 16:09:57'),
(88, '2021-07-21', '2021-07-20', 'LT-GEP-TRA-038', 'Demande de validation nouveaux fournisseurs batteries chargeurs & trsa', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:10:44', '2022-03-14 16:10:44'),
(89, '2021-07-22', '2021-07-22', 'Q9800-DERG-TRA-20-PM-CLT-0047.  Rev.', 'Dépôt de charpentes aux secondaires de l\'ancien transformateur T1 et du transformateur T2', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:11:55', '2022-03-14 16:11:55'),
(90, '2021-07-23', '2021-07-23', 'Q9800-DERG-TRA-20-HS-CLT-0048.  Rev.', 'Transmission des plans HSE (31)', 'TRA', 'MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:12:25', '2022-03-14 16:12:25'),
(91, '2021-07-23', '2021-07-23', 'Q9800-DERG-TRA-20-HS-CLT-0049.  Rev.', 'Transmission des plans HSE (31)', 'TRA', 'GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:13:01', '2022-03-14 16:13:01'),
(92, '2021-07-28', '2021-07-28', 'LT-GEP-TRA-039', 'Retard Validation Plan et commentaires', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:13:42', '2022-03-14 16:13:42'),
(93, '2021-08-02', '2021-08-02', 'Q9800-DERG-TRA-20-PM-CLT-0050.  Rev.', 'Rappel préavis de consignation et de réception', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:14:52', '2022-03-14 16:14:52'),
(94, '2021-08-03', '2021-08-03', 'LT-GEP-TRA-040	', 'Statut Variation Order 22', 'GEP', 'MCA/TRA', '28-juin-21; Q9800-DERG-TRA-20-PM-CLT-0040.  Rev.; Variation Order n°22', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:15:47', '2022-03-14 16:15:47'),
(95, '2021-08-03', '2021-08-03', 'LT-GEP-TRA-040', 'Statut Variation Order 22', 'GEP', 'MCA/TRA', '05-juil-21; LT-GEP-TRA 032 ; Variation Order n°22', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:17:12', '2022-03-14 16:17:12'),
(96, '2021-08-04', '2021-08-04', 'Q9800-DERG-TRA-20-PM-CLT-0051.  Rev.', 'CERTIFICAT DE PAIEMENT PROVISOIRE N° 03', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:18:03', '2022-03-14 16:18:03'),
(97, '2021-08-05', '2021-08-05', 'LT-GEP-TRA-041', 'Force Majeure et PLanning FAT', 'GEP', 'MCA/TRA', '07-juil-21; LT-GEP-TRA-034; Notification de Force Majeur sur le transport maritime et les FATs en présentiel', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:18:47', '2022-03-14 16:18:47'),
(98, '2021-08-06', '2021-08-06', 'Q9800-DERG-TRA-20-HS-CLT-0052.  Rev.', 'Transmission du rapport d’évaluation des Curriculum vitae des candidats au poste de Chef de la Performance Environnementale et Social de GE', 'TRA', 'MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:19:17', '2022-03-14 16:19:17'),
(99, '2021-08-18', '2021-08-18', 'Q9800-DERG-TRA-20-PM-CLT-0053.  Rev.', 'Transmission décompte n°3 GEP pour approbation', 'TRA', 'MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:20:04', '2022-03-14 16:20:04'),
(100, '2021-08-18', '2021-08-18', 'Q9800-DERG-TRA-20-HS-CLT-0054.  Rev.', 'Notification de la non-conformité de retard de paiement des salaires échus de juin et juillet 2021 aux chauffeurs de Grid Solution (Hertz)', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:21:00', '2022-03-14 16:21:00'),
(101, '2021-08-24', '2021-08-24', 'Q9800-DERG-TRA-20-PM-CLT-0055.  Rev.', 'Transmission du Goods Receipt du rapport du mois de juin 2021', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:21:48', '2022-03-14 16:21:48'),
(102, '2021-09-01', '2021-09-01', 'Q9800-DERG-TRA-20-HS-CLT-0056.  Rev.', 'Notification du résultat des candidats au poste de Chef de la Performance Environnementale et Sociale (CPES) de la zone sud de GE', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:22:40', '2022-03-14 16:22:40'),
(103, '2021-09-14', '2021-09-14', 'LT-GEP-TRA-042', 'FAT disjoncteurs & sectionneurs 2e lot', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:23:19', '2022-03-14 16:23:19'),
(104, '2021-09-17', '2021-09-17', 'Q9800-DERG-TRA-20-PM-CLT-0057.  Rev.', 'Transmission du dossier « Qualification entreprise MRI »', 'TRA', 'MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:23:49', '2022-03-14 16:23:49'),
(105, '2021-09-19', '2021-09-19', 'LT-GEP-TRA-043', 'Demande de EOT Changements Design', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:24:25', '2022-03-14 16:24:25'),
(106, '2021-09-23', '2021-09-23', 'LT-GEP-TRA-044', 'VALIDATION TECHNIQUE DES CABLES HT MT	', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:25:02', '2022-03-14 16:25:02'),
(107, '2021-09-29', '2021-09-29', 'Q9800-DERG-TRA-20-PM-CLT-0058.  Rev.', 'CERTIFICAT DE PAIEMENT PROVISOIRE N° 04', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:25:40', '2022-03-14 16:25:40'),
(108, '2021-09-30', '2021-09-30', 'Q9800-DERG-TRA-20-PM-CLT-0059.  Rev.', 'Transmission décompte n°4 de GE Postes', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:26:16', '2022-03-14 16:26:16'),
(109, '2021-09-30', '2021-09-30', 'LT-GEP-TRA-045', 'Acces Site Djougou', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:26:53', '2022-03-14 16:26:53'),
(110, '2021-10-07', '2021-10-07', 'Q9800-DERG-TRA-20-PM-CLT-0060.  Rev.', 'Ordre d’exécution n°1', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:27:30', '2022-03-14 16:27:30'),
(111, '2021-10-21', '2021-10-21', 'LT-GEP-TRA-046', 'Offre finale Demande de Variation', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:28:04', '2022-03-14 16:28:04'),
(112, '2021-10-22', '2021-10-22', 'Q9800-DERG-TRA-20-GE-CLT-0061.  Rev.', 'Cut off date - DFP /PERIODE DE PERFORMANCE', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:28:37', '2022-03-14 16:28:37'),
(113, '2021-10-26', '2021-10-26', 'Q9800-DERG-TRA-20-GE-CLT-0062.  Rev.', 'Mode opératoire de consignation ', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:29:03', '2022-03-14 16:29:03'),
(114, '2021-10-28', '2021-10-28', 'LT-GEP-TRA-047', 'Offre Finale VOs avec justificatifs supplémentaires 28.10.2021	', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:29:32', '2022-03-14 16:29:32'),
(115, '2021-10-28', '2021-10-28', 'Q9800-DERG-TRA-20-PM-CLT-0063.  Rev.', 'CERTIFICAT DE PAIEMENT PROVISOIRE N° 05', 'TRA', 'MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:30:00', '2022-03-14 16:30:00'),
(116, '2021-11-02', '2021-11-02', 'Q9800-DERG-TRA-20-PM-CLT-0064.  Rev.', 'Transmission du décompte n°5 de GE Postes', 'TRA', 'MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:30:28', '2022-03-14 16:30:28'),
(117, '2021-11-05', '2021-11-05', 'LT-GEP-TRA-048', 'Obstacle Travaux Excavation VED', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:31:02', '2022-03-14 16:31:02'),
(118, '2021-11-08', '2021-11-08', 'Q9800-DERG-TRA-20-PM-CLT-0065.  Rev.', 'Ordre d’exécution n°2', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:31:37', '2022-03-14 16:31:37'),
(119, '2021-11-12', '2021-11-12', 'Q9800-DERG-TRA-20-PM-CLT-0066.  Rev.', 'Constatation de l’ingénieur	', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:32:47', '2022-03-14 16:32:47'),
(120, '2021-11-15', '2021-11-15', 'Q9800-DERG-TRA-20-GE-CLT-0067.  Rev.', 'Activité de fin d’année ', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:33:39', '2022-03-14 16:33:39'),
(121, '2021-11-22', '2021-11-22', 'Q9800-DERG-TRA-20-PM-CLT-0068.  Rev.', 'Transmission du minutes of meeting_variation orders finalisation', 'TRA', 'MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:34:13', '2022-03-14 16:34:13'),
(122, '2021-11-26', '2021-11-26', 'LT-GEP-TRA-049', 'Continuité Fin activité 2021', 'GEP', 'MCA/TRA', '15-nov-21; Q9800-DERG-TRA-20-GE-CLT-0067.  Rev.; Activité de fin d’année ', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:35:03', '2022-03-14 16:35:03'),
(123, '2021-11-30', '2021-11-30', 'LT-GEP-TRA-050', 'Retour Data Liste', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:35:37', '2022-03-14 16:35:37'),
(124, '2021-12-01', '2021-12-01', 'LT-GEP-TRA-050', 'Retour Data Liste', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:36:56', '2022-03-14 16:36:56'),
(125, '2021-12-01', '2021-12-01', 'LT-GEP-TRA-051', 'Demande de consignation Bohicon', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:37:32', '2022-03-14 16:37:32'),
(126, '2021-12-02', '2021-12-02', 'Q9800-DERG-TRA-20-PM-CLT-0069.  Rev.', 'ERTIFICAT DE PAIEMENT PROVISOIRE N° 05', 'TRA', 'MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:37:55', '2022-03-14 16:37:55'),
(127, '2021-12-02', '2021-12-02', 'LT-GEP-TRA-052', 'Retard potentiel Cellules EFACEC', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:38:27', '2022-03-14 16:38:27'),
(128, '2021-12-06', '2021-12-06', 'LT-GEP-TRA-53', 'Mise-à-jour Coûts supplémentaires due à l\'impact de Covid 06.12.2021', 'GEP', 'MCA/TRA', '07-juil-21; LT-GEP-TRA-034; Notification de Force Majeur sur le transport maritime et les FATs en présentiel', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:39:41', '2022-03-14 16:39:41'),
(129, '2021-12-06', '2021-12-06', 'LT-GEP-TRA-53', 'Mise-à-jour Coûts supplémentaires due à l\'impact de Covid 06.12.2021', 'GEP', 'MCA/TRA', '05-août-21;LT-GEP-TRA-041;Force Majeure et PLanning FAT', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:40:25', '2022-03-14 16:40:25'),
(130, '2021-12-10', '2021-12-10', 'Q9800-DERG-TRA-20-PM-CLT-0070.  Rev.', 'Dossier de consignation GE Poste a titre de régularisation', 'TRA', 'MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:40:53', '2022-03-14 16:40:53'),
(131, '2021-12-14', '2021-12-14', 'LT-GEP-TRA 054', 'CCN Data Liste - 13.12.2021', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:41:35', '2022-03-14 16:41:35'),
(132, '2021-12-23', '2021-12-23', 'Q9800-DERG-TRA-20-PM-CLT-0071.  Rev.', 'CERTIFICAT DE PAIEMENT PROVISOIRE N° 06', 'TRA', 'MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:42:07', '2022-03-14 16:42:07'),
(133, '2021-12-27', '2021-12-27', 'Q9800-DERG-TRA-20-PM-CLT-0072.  Rev.', 'Transmission du décompte n°6 de GE Postes', 'TRA', 'MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:42:45', '2022-03-14 16:42:45'),
(134, '2022-01-14', '2022-01-11', 'Q9800-DERG-TRA-20-PM-CLT-0072.  Rev.', 'ransmission du décompte n°6 de GE Postes', 'TRA', 'MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:43:42', '2022-03-14 16:43:42'),
(135, '2022-01-14', '2022-01-14', '	Q9800-DERG-TRA-20-GE-CLT-0073.  Rev.', 'Constatation de l’ingénieur	', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:44:24', '2022-03-14 16:44:24'),
(136, '2022-01-18', '2022-01-18', 'LT-GEP-TRA 055', 'Mise à jour Bordereau VOs', 'GEP', 'MCA/TRA', '14-janv-22; Q9800-DERG-TRA-20-GE-CLT-0073.  Rev.; Constatation de l’ingénieur', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:47:49', '2022-03-14 16:47:49'),
(137, '2022-01-21', '2022-01-21', 'LT-GEP-TRA-056', 'VOs Accord constatation Ingénieur + Nouveau Bordereau', 'GEP', 'MCA/TRA', '12-nov-21; Q9800-DERG-TRA-20-PM-CLT-0066.  Rev.; Constatation de l’ingénieur', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:48:53', '2022-03-14 16:48:53'),
(138, '2022-01-24', '2022-01-24', 'LT-GEP-TRA-057', 'Retard validation plans', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:49:33', '2022-03-14 16:49:33'),
(139, '2022-01-24', '2022-01-24', 'LT-GEP-TRA-058', 'Attente retour I/O CCN', 'GEP', 'MCA/TRA', '30-nov-21; LT-GEP-TRA-050; Retour Data Liste', '1970-01-01', '', 1, '', '', 1, '2022-03-14 16:50:05', '2022-03-14 16:50:05'),
(140, '2022-01-22', '2022-01-22', 'LT-GEP-TRA-058', 'Attente retour I/O CCN', 'GEP', 'MCA/TRA', '14-déc-2 LT-GEP-TRA 054 ; CCN Data Liste - 13.12.2021', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:07:35', '2022-03-14 17:07:35'),
(141, '2022-01-24', '2022-01-24', 'Q9800-DERG-TRA-20-QC-CLT-0074.  Rev.', 'Notification des non-conformités sur travaux sur le site de Maria-Gléta', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:12:32', '2022-03-14 17:12:32'),
(142, '2022-01-31', '2022-01-31', 'Q9800-DERG-TRA-20-PM-CLT-0075.  Rev.', 'CERTIFICAT DE PAIEMENT PROVISOIRE N° 07', 'TRA', 'MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:13:53', '2022-03-14 17:13:53'),
(143, '2022-02-02', '2022-02-02', 'Q9800-DERG-TRA-20-PM-CLT-0076.  Rev.', 'Plan de formation ', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:14:41', '2022-03-14 17:14:41'),
(144, '2022-02-03', '2022-02-03', 'LT-GEP-TRA 059', 'Statut et commentaires Liste I/O CCN', 'GEP', 'MCA/TRA', '24-janv-22; LT-GEP-TRA-058; Attente retour I/O CCN', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:16:31', '2022-03-14 17:16:31'),
(145, '2022-02-07', '2022-02-07', 'LT-GEP-TRA 060', 'Plan d\'Action-07.02.2022', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:18:55', '2022-03-14 17:18:55'),
(146, '2022-02-07', '2022-02-07', 'Q9800-DERG-TRA-20-PM-CLT-0077.  Rev.', 'Déménagement du poste Bérécingou 33 KV', 'TRA', 'SBEE', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:22:24', '2022-03-14 17:22:24'),
(147, '2022-02-08', '2022-02-08', 'Q9800-DERG-TRA-20-PM-CLT-0078.  Rev.', 'nsuffisance de personnels d’exécution des travaux sur les sites projet', 'TRA', 'GEP/MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:23:28', '2022-03-14 17:23:28'),
(148, '2022-02-10', '2022-02-10', 'LT-GEP-TRA 061', 'CCN remontée existant demandes contradictoires', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:24:23', '2022-03-14 17:24:23'),
(149, '2022-02-10', '2022-02-10', 'LT-GEP-TRA-062', 'Retour ingénieur insuffisance personnel', 'GEP', 'MCA/TRA', '08-févr-22; Q9800-DERG-TRA-20-PM-CLT-0078.  Rev.; Insuffisance de personnels d’exécution des travaux sur les sites projet', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:28:20', '2022-03-14 17:28:20'),
(150, '2022-02-14', '2022-02-14', 'LT-GEP-TRA-063', 'Informations nécessaires pylones', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:29:15', '2022-03-14 17:29:15'),
(151, '2022-02-16', '2022-02-16', 'LT-GEP-TRA-064', 'Obstacle cloture Berecingou', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:30:17', '2022-03-14 17:30:17'),
(152, '2022-02-17', '2022-02-17', 'LT-GEP-TRA 65', 'Retards Logistique - Force Majeur Covid - 17.02.2022', 'GEP', 'MCA/TRA', '07-juil-21; LT-GEP-TRA-034; Notification de Force Majeur sur le transport maritime et les FATs en présentiel', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:31:23', '2022-03-14 17:31:23'),
(153, '2022-02-17', '2022-02-17', 'LT-GEP-TRA 65', 'Retards Logistique - Force Majeur Covid - 17.02.2022', 'GEP', 'MCA/TRA', '05-août-21; LT-GEP-TRA-041; Force Majeure et PLanning FAT', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:32:17', '2022-03-14 17:32:17'),
(154, '2022-02-18', '2022-02-18', 'LT-GEP-TRA 066', 'CCN I-O Liste et FAT MAG  BEU', 'GEP', 'MCA/TRA', '30-nov-21; LT-GEP-TRA-050; Retour Data Liste', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:37:04', '2022-03-14 17:37:04'),
(155, '2022-02-18', '2022-02-18', 'LT-GEP-TRA 066', 'CCN I-O Liste et FAT MAG  BEU', 'GEP', 'MCA/TRA', '24-janv-22; LT-GEP-TRA-058; Attente retour I/O CCN', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:44:50', '2022-03-14 17:44:50'),
(156, '2022-02-18', '2022-02-18', 'Q9800-DERC-TRA-20-QC-CLT-0079.  Rev.', 'Notification des non-conformités sur travaux sur le site de VEDOKO', 'TRA', 'MCA/GEP', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:48:32', '2022-03-14 17:48:32'),
(157, '2022-02-21', '2022-02-21', 'LT-GEP-TRA-067', 'Mise à jour Demande d\'Extension de Temps', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 17:50:12', '2022-03-14 17:50:12'),
(158, '2022-02-21', '2022-02-21', 'LT-GEP-TRA-067', 'Mise à jour Demande d\'Extension de Temps', 'GEP', 'MCA/TRA', '19-sept-2; LT-GEP-TRA-043; Demande de EOT Changements Design', '1970-01-01', '', 1, '', '', 1, '2022-03-14 18:05:14', '2022-03-14 18:05:14'),
(159, '2022-02-21', '2022-02-21', 'Q9800-DERG-TRA-20-PM-CLT-0080.  Rev.', 'Clôtures bloquantes chantier Berecingou 161 kV	', 'TRA', 'MCA/GEP', '16-févr-22; LT-GEP-TRA-064; 	Obstacle cloture Berecingou', '1970-01-01', '', 1, '', '', 1, '2022-03-14 18:10:45', '2022-03-14 18:10:45'),
(160, '2022-03-03', '2022-03-03', 'Q9800-DERG-TRA-20-PM-CLT-0081.  Rev.', 'CERTIFICAT DE PAIEMENT PROVISOIRE N° 08', 'TRA', 'MCA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 18:13:27', '2022-03-14 18:13:27'),
(161, '2022-03-03', '2022-03-03', 'Q9800-DERG-TRA-20-PM-CLT-0082.  Rev.', 'Réponse_CCN Liste Entrées Sorties CCN et FAT MAG & BER', 'TRA', 'MCA/TRA/GEP', '18-févr-22; LT-GEP-TRA 066 ; CCN I-O Liste et FAT MAG  BEU', '1970-01-01', '', 1, '', '', 1, '2022-03-14 18:15:17', '2022-03-14 18:15:17'),
(162, '2022-03-04', '2022-03-03', 'LT-GEP-TRA 68', 'Demande de coupure du transformateur T3 de Vedoko', 'GEP', 'MCA/TRA', '', '1970-01-01', '', 1, '', '', 1, '2022-03-14 18:16:42', '2022-03-14 18:16:42');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenoms` varchar(150) NOT NULL,
  `email` text NOT NULL,
  `pass` varchar(150) NOT NULL,
  `privileges` varchar(20) NOT NULL,
  `statut` varchar(10) NOT NULL,
  `date_enreg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modif` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`(255))
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenoms`, `email`, `pass`, `privileges`, `statut`, `date_enreg`, `date_modif`) VALUES
(1, 'Adminintrateur', 'Suprème', 'admin@inovact.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', '123456789', 'Actif', '2022-03-05 01:34:46', '2022-03-05 01:34:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
