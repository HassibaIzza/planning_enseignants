-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 12:48 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_emplois_de_temp`
--
CREATE DATABASE IF NOT EXISTS `gestion_emplois_de_temp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gestion_emplois_de_temp`;

-- --------------------------------------------------------

--
-- Table structure for table `ge_annees`
--

CREATE TABLE `ge_annees` (
  `annee_id` int(11) UNSIGNED NOT NULL,
  `annee_nom` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ge_annees`
--

INSERT INTO `ge_annees` (`annee_id`, `annee_nom`) VALUES
(1, '2021-2022'),
(2, '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `ge_cycles`
--

CREATE TABLE `ge_cycles` (
  `cycle_id` int(11) UNSIGNED NOT NULL,
  `cycle_nom` varchar(300) NOT NULL,
  `cycle_nbr_semstre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ge_cycles`
--

INSERT INTO `ge_cycles` (`cycle_id`, `cycle_nom`, `cycle_nbr_semstre`) VALUES
(1, 'Licence', 6),
(2, 'Master', 4),
(3, 'Dcotorat', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ge_departements`
--

CREATE TABLE `ge_departements` (
  `departement_id` int(11) UNSIGNED NOT NULL,
  `departement_nom` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ge_departements`
--

INSERT INTO `ge_departements` (`departement_id`, `departement_nom`) VALUES
(1, 'MI'),
(2, 'ST'),
(3, 'SM'),
(4, 'SNV');

-- --------------------------------------------------------

--
-- Table structure for table `ge_emplois`
--

CREATE TABLE `ge_emplois` (
  `emploi_id` int(11) NOT NULL,
  `enseignant_id` int(11) UNSIGNED NOT NULL,
  `module_id` int(11) UNSIGNED NOT NULL,
  `emploi_jour` enum('Samdi','Dimanch','Lundi','Mardi','Mercredi','Jeudi') NOT NULL,
  `emploi_temp` varchar(50) NOT NULL,
  `groupe_id` int(11) UNSIGNED NOT NULL,
  `salle_id` int(11) UNSIGNED NOT NULL,
  `emploi_date` varchar(10) NOT NULL,
  `emploi_date_debut` varchar(10) NOT NULL,
  `emploi_date_fin` varchar(10) NOT NULL,
  `emploi_type` enum('cour','td','tp') NOT NULL,
  `emploi_annee_univ` varchar(50) NOT NULL,
  `emploi_semestre` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ge_emplois`
--

INSERT INTO `ge_emplois` (`emploi_id`, `enseignant_id`, `module_id`, `emploi_jour`, `emploi_temp`, `groupe_id`, `salle_id`, `emploi_date`, `emploi_date_debut`, `emploi_date_fin`, `emploi_type`, `emploi_annee_univ`, `emploi_semestre`) VALUES
(1, 2, 2, 'Dimanch', '09:30-10:30', 3, 3, '', '2022-06-27', '2022-06-08', 'cour', '2021-2022', 2),
(2, 1, 1, 'Dimanch', '09:30-10:30', 4, 2, '', '', '0', 'cour', '2021-2022', 1),
(4, 1, 1, 'Samdi', '08:30-09:30', 1, 1, '', '', '2022-06-07', 'cour', '2021-2022', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ge_enseignants`
--

CREATE TABLE `ge_enseignants` (
  `enseignant_id` int(11) UNSIGNED NOT NULL,
  `departement_id` int(11) UNSIGNED NOT NULL,
  `enseignant_prenom` varchar(50) DEFAULT '',
  `enseignant_nom` varchar(50) DEFAULT '',
  `enseignant_birthday` varchar(10) DEFAULT '0000-00-00',
  `enseignant_email` varchar(50) DEFAULT '',
  `enseignant_phone` varchar(50) DEFAULT '',
  `enseignant_civilite` varchar(300) NOT NULL,
  `enseignant_grade` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ge_enseignants`
--

INSERT INTO `ge_enseignants` (`enseignant_id`, `departement_id`, `enseignant_prenom`, `enseignant_nom`, `enseignant_birthday`, `enseignant_email`, `enseignant_phone`, `enseignant_civilite`, `enseignant_grade`) VALUES
(1, 1, 'Khelifa', 'Nour-Edin', '1-1-1994', 'Khelifanour-edin@univ-mosta.dz', '04577777', 'Mr', ''),
(2, 1, 'mohammed', 'mohammed', '1-1-1988', 'email@gmail.com', '+213550505050', '', ''),
(3, 3, 'Aissa', 'Belouatek', '1-1-1994', 'aissa.belouatek@univ-mosta.dz', '0550', 'Mr', 'Profe'),
(4, 3, 'Abdelkader', 'KADI', '1-1-1994', 'abdelkader.kadi@univ-mosta.dz', '+21350000000', 'Mr', ''),
(5, 3, 'Ahmed', 'BELHAKEM', '1-1-1994', 'ahmed.belhakem@univ-mosta.dz', '+21350000000', 'Mr', ''),
(6, 3, 'Amine', 'BENMALTI', '1-1-1994', 'amine.benmalti@univ-mosta.dz', '+21350000000', 'Mr', ''),
(7, 3, 'Amine', 'Harrane', '1-1-1994', 'amine.harrane@univ-mosta.dz', '+21350000000', 'Mr', ''),
(8, 3, 'Fatiha', 'ABDEDDAIM', '1-1-1994', 'fatiha.abdeddaim@univ-mosta.dz', '+21350000000', 'Mr', ''),
(9, 3, 'Mohamed', 'BOURAADA', '1-1-1994', 'mohamed.bouraada@univ-mosta.dz', '+21350000000', 'Mr', '');

-- --------------------------------------------------------

--
-- Table structure for table `ge_filieres`
--

CREATE TABLE `ge_filieres` (
  `filiere_id` int(11) UNSIGNED NOT NULL,
  `departement_id` int(11) UNSIGNED NOT NULL,
  `filiere_nom` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ge_filieres`
--

INSERT INTO `ge_filieres` (`filiere_id`, `departement_id`, `filiere_nom`) VALUES
(1, 1, 'Info generale'),
(2, 1, 'math generale');

-- --------------------------------------------------------

--
-- Table structure for table `ge_groupes`
--

CREATE TABLE `ge_groupes` (
  `groupe_id` int(11) UNSIGNED NOT NULL,
  `specialite_id` int(11) UNSIGNED NOT NULL,
  `groupe_nom` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ge_groupes`
--

INSERT INTO `ge_groupes` (`groupe_id`, `specialite_id`, `groupe_nom`) VALUES
(1, 1, 'groupe 1'),
(3, 1, 'groupe 2'),
(4, 3, 'groupe 01');

-- --------------------------------------------------------

--
-- Table structure for table `ge_modules`
--

CREATE TABLE `ge_modules` (
  `module_id` int(11) UNSIGNED NOT NULL,
  `specialite_id` int(11) UNSIGNED NOT NULL,
  `module_nom` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ge_modules`
--

INSERT INTO `ge_modules` (`module_id`, `specialite_id`, `module_nom`) VALUES
(1, 3, 'ASD'),
(2, 1, 'programmation oriente object'),
(3, 1, 'bereautique');

-- --------------------------------------------------------

--
-- Table structure for table `ge_salles`
--

CREATE TABLE `ge_salles` (
  `salle_id` int(11) UNSIGNED NOT NULL,
  `salle_nom` varchar(300) NOT NULL,
  `salle_capacite` int(5) NOT NULL,
  `salle_type` enum('cour','td','tp') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ge_salles`
--

INSERT INTO `ge_salles` (`salle_id`, `salle_nom`, `salle_capacite`, `salle_type`) VALUES
(1, 'Ampphi 1', 200, 'td'),
(2, 'Salle 1', 40, 'td'),
(3, 'salle tp 1', 10, 'tp');

-- --------------------------------------------------------

--
-- Table structure for table `ge_specialites`
--

CREATE TABLE `ge_specialites` (
  `specialite_id` int(11) UNSIGNED NOT NULL,
  `filiere_id` int(11) UNSIGNED NOT NULL,
  `specialite_nom` varchar(300) NOT NULL,
  `cycle_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ge_specialites`
--

INSERT INTO `ge_specialites` (`specialite_id`, `filiere_id`, `specialite_nom`, `cycle_id`) VALUES
(1, 1, 'Math et Informatique L1', 1),
(3, 1, 'Informatique L3', 1),
(5, 2, 'Chimie L2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ge_users`
--

CREATE TABLE `ge_users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_login` varchar(50) DEFAULT '',
  `user_prenom` varchar(50) DEFAULT '',
  `user_nom` varchar(50) DEFAULT '',
  `user_birthday` varchar(10) DEFAULT '0000-00-00',
  `user_email` varchar(50) DEFAULT '',
  `user_phone` varchar(50) DEFAULT '',
  `user_pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ge_users`
--

INSERT INTO `ge_users` (`user_id`, `user_login`, `user_prenom`, `user_nom`, `user_birthday`, `user_email`, `user_phone`, `user_pass`) VALUES
(1, 'admin', 'admin', 'admin', '1997-01-04', 'admin@gmail.com', '+213550505050', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ge_annees`
--
ALTER TABLE `ge_annees`
  ADD PRIMARY KEY (`annee_id`);

--
-- Indexes for table `ge_cycles`
--
ALTER TABLE `ge_cycles`
  ADD PRIMARY KEY (`cycle_id`);

--
-- Indexes for table `ge_departements`
--
ALTER TABLE `ge_departements`
  ADD PRIMARY KEY (`departement_id`);

--
-- Indexes for table `ge_emplois`
--
ALTER TABLE `ge_emplois`
  ADD PRIMARY KEY (`emploi_id`),
  ADD UNIQUE KEY `my_condition` (`emploi_jour`,`emploi_temp`,`groupe_id`,`salle_id`) USING BTREE,
  ADD KEY `enseignant_id` (`enseignant_id`),
  ADD KEY `groupe_id` (`groupe_id`),
  ADD KEY `module_id` (`module_id`),
  ADD KEY `salle_id` (`salle_id`);

--
-- Indexes for table `ge_enseignants`
--
ALTER TABLE `ge_enseignants`
  ADD PRIMARY KEY (`enseignant_id`),
  ADD KEY `departement_id` (`departement_id`);

--
-- Indexes for table `ge_filieres`
--
ALTER TABLE `ge_filieres`
  ADD PRIMARY KEY (`filiere_id`),
  ADD KEY `departement_id` (`departement_id`);

--
-- Indexes for table `ge_groupes`
--
ALTER TABLE `ge_groupes`
  ADD PRIMARY KEY (`groupe_id`),
  ADD KEY `specialite_id` (`specialite_id`);

--
-- Indexes for table `ge_modules`
--
ALTER TABLE `ge_modules`
  ADD PRIMARY KEY (`module_id`),
  ADD KEY `specialite_id` (`specialite_id`);

--
-- Indexes for table `ge_salles`
--
ALTER TABLE `ge_salles`
  ADD PRIMARY KEY (`salle_id`);

--
-- Indexes for table `ge_specialites`
--
ALTER TABLE `ge_specialites`
  ADD PRIMARY KEY (`specialite_id`),
  ADD KEY `cycle_id` (`cycle_id`),
  ADD KEY `filiere_id` (`filiere_id`);

--
-- Indexes for table `ge_users`
--
ALTER TABLE `ge_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ge_annees`
--
ALTER TABLE `ge_annees`
  MODIFY `annee_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ge_cycles`
--
ALTER TABLE `ge_cycles`
  MODIFY `cycle_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ge_departements`
--
ALTER TABLE `ge_departements`
  MODIFY `departement_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ge_emplois`
--
ALTER TABLE `ge_emplois`
  MODIFY `emploi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ge_enseignants`
--
ALTER TABLE `ge_enseignants`
  MODIFY `enseignant_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `ge_filieres`
--
ALTER TABLE `ge_filieres`
  MODIFY `filiere_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ge_groupes`
--
ALTER TABLE `ge_groupes`
  MODIFY `groupe_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ge_modules`
--
ALTER TABLE `ge_modules`
  MODIFY `module_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ge_salles`
--
ALTER TABLE `ge_salles`
  MODIFY `salle_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ge_specialites`
--
ALTER TABLE `ge_specialites`
  MODIFY `specialite_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ge_users`
--
ALTER TABLE `ge_users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ge_emplois`
--
ALTER TABLE `ge_emplois`
  ADD CONSTRAINT `ge_emplois_ibfk_1` FOREIGN KEY (`enseignant_id`) REFERENCES `ge_enseignants` (`enseignant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ge_emplois_ibfk_2` FOREIGN KEY (`groupe_id`) REFERENCES `ge_groupes` (`groupe_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ge_emplois_ibfk_3` FOREIGN KEY (`module_id`) REFERENCES `ge_modules` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ge_emplois_ibfk_4` FOREIGN KEY (`salle_id`) REFERENCES `ge_salles` (`salle_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ge_enseignants`
--
ALTER TABLE `ge_enseignants`
  ADD CONSTRAINT `ge_enseignants_ibfk_1` FOREIGN KEY (`departement_id`) REFERENCES `ge_departements` (`departement_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ge_filieres`
--
ALTER TABLE `ge_filieres`
  ADD CONSTRAINT `ge_filieres_ibfk_1` FOREIGN KEY (`departement_id`) REFERENCES `ge_departements` (`departement_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ge_groupes`
--
ALTER TABLE `ge_groupes`
  ADD CONSTRAINT `ge_groupes_ibfk_1` FOREIGN KEY (`specialite_id`) REFERENCES `ge_specialites` (`specialite_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ge_modules`
--
ALTER TABLE `ge_modules`
  ADD CONSTRAINT `ge_modules_ibfk_1` FOREIGN KEY (`specialite_id`) REFERENCES `ge_specialites` (`specialite_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ge_specialites`
--
ALTER TABLE `ge_specialites`
  ADD CONSTRAINT `ge_specialites_ibfk_2` FOREIGN KEY (`cycle_id`) REFERENCES `ge_cycles` (`cycle_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ge_specialites_ibfk_3` FOREIGN KEY (`filiere_id`) REFERENCES `ge_filieres` (`filiere_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
