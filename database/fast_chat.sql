-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 28, 2018 at 05:34 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fast_chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `auths`
--

DROP TABLE IF EXISTS `auths`;
CREATE TABLE IF NOT EXISTS `auths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `token` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE IF NOT EXISTS `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sender` int(11) NOT NULL,
  `id_receiver` int(11) NOT NULL,
  `topic` varchar(225) DEFAULT NULL,
  `message` text,
  `category` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `id_sender`, `id_receiver`, `topic`, `message`, `category`) VALUES
(7, 2, 1, 'Are you selling?', 'Tomatoes?', ''),
(6, 1, 1, 'Good Morning!', 'Again, Please answer', ''),
(5, 2, 2, 'Good Morning!', 'Are you okay?', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) DEFAULT NULL,
  `full_name` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `password` varchar(225) NOT NULL,
  `agreement` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `full_name`, `email`, `password`, `agreement`) VALUES
(1, 'Nibro', 'Nicholas Bruno', 'sbnibro256@gmail.com', 'dollar', 1),
(2, 'basing', 'Namara Bessing', 'bnamara@gmail.com', 'dollar', 1),
(3, 'tare', 'Taremwa', 'taremwa@gmail.com', 'dollar', 1),
(4, 'Buno', 'Nicholas SBN', 'bruno.nicholas@gmail.com', 'dollar', 1),
(5, 'Naguwa', 'Naguwa Hist', 'naghi@gmail.com', 'bcrypt(dollar)', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
