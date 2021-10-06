-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 11, 2021 at 11:06 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compte`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Nom` text NOT NULL,
  `Prenom` text NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Heures` time NOT NULL,
  `mail` text NOT NULL,
  `produit` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;


--
-- Dumping data for table `reservation`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
