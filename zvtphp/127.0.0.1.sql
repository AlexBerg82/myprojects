-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2017 at 10:49 PM
-- Server version: 5.5.25
-- PHP Version: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spisok`
--
CREATE DATABASE `spisok` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `spisok`;

-- --------------------------------------------------------

--
-- Table structure for table `oborudovanie`
--

CREATE TABLE IF NOT EXISTS `oborudovanie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `symbol` varchar(30) NOT NULL,
  `period` int(2) NOT NULL,
  `date_begin` date NOT NULL,
  `date_end` date NOT NULL,
  `number_factory` varchar(10) NOT NULL,
  `number_serial` varchar(30) NOT NULL,
  `department` text NOT NULL,
  `day_residue` int(11) NOT NULL,
  `note` text NOT NULL,
  `vise` int(1) NOT NULL,
  `zip` text NOT NULL,
  `path_pdf` varchar(100) NOT NULL,
  `path_full` text NOT NULL,
  `extra` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=267 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'vasya', 'A1111a'),
(2, 'vasya', 'A1111a');

-- --------------------------------------------------------

--
-- Table structure for table `zipper`
--

CREATE TABLE IF NOT EXISTS `zipper` (
  `id_zip` int(11) NOT NULL AUTO_INCREMENT,
  `id_oborud` int(11) NOT NULL,
  `path_pdf` varchar(100) NOT NULL,
  PRIMARY KEY (`id_zip`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `zipper`
--

INSERT INTO `zipper` (`id_zip`, `id_oborud`, `path_pdf`) VALUES
(2, 5, '1_1.pdf,1_2.pdf,1_3.pdf'),
(3, 6, '1_2.pdf'),
(4, 7, '1_3.pdf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
