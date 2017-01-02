-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2017 at 03:31 PM
-- Server version: 5.5.25
-- PHP Version: 5.3.13

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
  `number` int(11) NOT NULL,
  `place` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `symbol` varchar(30) NOT NULL,
  `period` int(2) NOT NULL,
  `date_begin` date NOT NULL,
  `date_end` date NOT NULL,
  `number_factory` varchar(10) NOT NULL,
  `number_serial` varchar(30) NOT NULL,
  `department` text NOT NULL,
  `day_residue` int(4) NOT NULL,
  `note` text NOT NULL,
  `vise` int(1) NOT NULL,
  `zip` text NOT NULL,
  `path_pdf` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `oborudovanie`
--

INSERT INTO `oborudovanie` (`id`, `number`, `place`, `name`, `symbol`, `period`, `date_begin`, `date_end`, `number_factory`, `number_serial`, `department`, `day_residue`, `note`, `vise`, `zip`, `path_pdf`) VALUES
(4, 1, 'Днепропетровск', 'Transformer Calibrator', '11111111', 24, '2016-02-08', '2017-11-22', '---', '1179 (01000427)', 'ЛабораторияТ', 335, '', 1, '', ''),
(5, 2, 'Вышгород', 'TransformerCalibrator', 'RST77787', 12, '0000-00-00', '2016-10-27', '---', '77787', 'Лаб_сч_.э.э', -56, '', 1, '1_1.pdf,1_2.pdf,1_3.pdf', 'resumeen.pdf'),
(6, 3, 'Вышгород', 'Transformer Calibrator', '11111111', 24, '0000-00-00', '2016-04-07', '---', '1179 (01000427)', 'КБ', -259, '', 1, '1_1.pdf', ''),
(7, 4, 'Днепропетровск', 'Барометр-анероїд', 'БАММ 1  ', 12, '0000-00-00', '2016-05-25', '986  ', '1941  ', 'Лаб_сч_.э.э', -211, '', 1, '1_2.pdf', ''),
(8, 5, 'Днепропетровск', 'Transformer Calibrator', '11111111', 24, '0000-00-00', '0000-00-00', '---', '1179 (01000427)', 'ЛабораторияТ', -6232, '', 1, '', ''),
(9, 6, 'Днепропетровск', 'Transformer Calibrator', '11111111', 24, '0000-00-00', '0000-00-00', '---', '1179 (01000427)', 'ЛабораторияТ', -6232, '', 1, '', ''),
(10, 7, 'Днепропетровск', 'Transformer Calibrator', '11111111', 24, '0000-00-00', '0000-00-00', '---', '1179 (01000427)', 'ЛабораторияТ', 44, '', 1, '', ''),
(11, 8, 'Днепропетровск', '22222', 'ANAD0808', 12, '0000-00-00', '0000-00-00', '---', '042860', 'Лаб_сч_.э.э', 1, '', 1, '', ''),
(12, 9, 'Вышгород', '000', 'JFD-2000', 24, '0000-00-00', '0000-00-00', '3721', '20069', 'КБ', -6232, '', 1, '', ''),
(13, 1, 'Вышгород', 'Вимірювач самопишучий  ', 'ИС-201  ', 12, '2010-12-20', '0000-00-00', '2360  ', '40853  ', 'Лаб_сч_.э.э', -6028, '', 1, '', ''),
(14, 2, 'Вышгород', 'Вимірювач самопишучий  ', 'ИС-201  ', 12, '2017-02-02', '2015-12-17', '334  ', '30586  ', 'Лаб_сч_.э.э', -167, '', 1, '', ''),
(15, 3, 'Вышгород', 'Вимірювач самопишучий  ', 'ИС-210.2  ', 12, '2015-12-08', '2016-02-03', '2415  ', '30531  ', 'Лаб_сч_.э.э', -119, '', 1, '', ''),
(16, 10, 'Вышгород', 'Вимірювач-регістратор   ', 'Д-ИТ-4УН08-4СК08-4Э3А-USB-RST-', 12, '2016-10-11', '0000-00-00', '5384  ', '13076  ', 'Лаб_сч_.э.э', -6232, '', 1, '', ''),
(17, 11, 'Днепропетровск', 'Вольтметр  ', 'Э 545  ', 12, '0000-00-00', '0000-00-00', '---', '1210022  ', 'ЛабораторияТ', -6232, '', 1, '', ''),
(18, 12, 'Вышгород', 'Електромагніт   ', 'EM-01  ', 12, '0000-00-00', '0000-00-00', '---', '005  ', 'КБ', -6232, 'Заявки на повірку 2014 від КБ не було, в перелік не внесено\r\n', 1, '', ''),
(19, 13, '', 'Електромагніт   ', 'EM-01  ', 12, '2015-12-09', '2016-10-20', '---', '010  ', '', 0, 'Заявки на повірку 2014 від КБ не було, в перелік не внесено', 2, '', ''),
(20, 14, '', 'Імпульсний калібрувальний генератор часткових розрядів  ', 'JFD-301  ', 12, '0000-00-00', '0000-00-00', '---', '20110610  ', '', 0, 'в состве Вимірювальної системи часткових розрядів\r\n', 2, '', ''),
(21, 15, 'Днепропетровск', 'Імпульсний калібрувальний генератор часткових розрядів  ', 'Partial Discharge Pulse Calibr', 12, '0000-00-00', '0000-00-00', '3721  ', '201245  ', 'ЛабораторияТ', -6232, 'в состве Вимірювальної системи часткових розрядів\r\n', 1, '', ''),
(22, 16, 'Днепропетровск', 'Калібри-кольца  ', 'G3/4"  ', 12, '0000-00-00', '0000-00-00', '---', '---', 'КБ', -6232, '', 1, '', ''),
(23, 17, 'Днепропетровск', 'Камера кліматична  ', 'HSGDS-1500B  ', 12, '0000-00-00', '0000-00-00', '---', 'HSCK 12120  ', 'Лаб_сч_.э.э', -6232, '', 1, '', ''),
(24, 18, 'Днепропетровск', 'Камера кліматична  ', 'HSGDS-250C  ', 12, '0000-00-00', '0000-00-00', '---', 'HSFK1303013  ', 'Лаб_сч_.э.э', -6232, '', 1, '', ''),
(25, 4, '', 'Камера тепла  ', 'КТ.00001  ', 12, '0000-00-00', '2016-01-21', '---', '00001  ', '', 0, '', 0, '', ''),
(26, 5, '', 'Камера тепла  ', 'КТ.00002  ', 12, '2015-12-01', '2016-12-01', '2476  ', '00002  ', '', 0, '', 0, '', ''),
(27, 6, '', 'Камера тепла  ', 'КТ.00003/1  ', 12, '0000-00-00', '0000-00-00', '2478  ', '00003/1  ', '', 0, '', 0, '', ''),
(28, 7, '', 'Камера тепла  ', 'КТ.00003/2  ', 12, '2015-12-03', '0000-00-00', '2477  ', '00003/2  ', '', 0, '', 0, '', ''),
(29, 19, 'Днепропетровск', 'Камера тепла  ', 'КТ.00004Д  ', 12, '0000-00-00', '0000-00-00', '---', '00004Д  ', 'Лаб_сч_.э.э', -6232, '', 1, '', ''),
(30, 20, 'Вышгород', 'Камера тепла  ', 'КТ.00006  ', 12, '0000-00-00', '0000-00-00', '---', '00006  ', 'Лаб_сч_.э.э', -6232, '', 1, '', '');

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
