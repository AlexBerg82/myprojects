-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 15 2016 г., 10:20
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `for_cart`
--

-- --------------------------------------------------------

--
-- Структура таблицы `magazine`
--

CREATE TABLE IF NOT EXISTS `magazine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `dates` date NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `magazine`
--

INSERT INTO `magazine` (`id`, `title`, `img`, `price`, `description`, `category`, `dates`, `phone`, `mail`, `browser`, `ip`, `user_id`) VALUES
(4, 'notebook 1', 'foto-86.jpg', 1000, 'notebook 1', 'electronic', '2016-12-14', '12345678', 'vasya@vasya.vas', 'Chrome', '127.0.0.1', '100'),
(5, 'smotka 1', 'foto-70.jpg', 500, 'smotka 1', 'closer', '2016-12-14', '12345678', 'vasya@vasya.vas', 'Chrome', '127.0.0.1', '100'),
(6, 'notebook 2', 'foto-54.jpg', 1500, 'notebook 2', 'electronic', '2016-12-14', '12345678', 'vasya@vasya.vas', 'Chrome', '127.0.0.1', '100'),
(17, 'smotka 2', 'foto-15.jpg', 700, 'smotka 2', 'closer', '2016-12-14', '12345678', 'vasya@vasya.vas', 'Safari', '127.0.0.1', '100'),
(18, 'notebook 3', '', 1200, 'notebook 3', 'electronic', '2016-12-14', '12345678', 'vasya@vasya.vas', 'Safari', '127.0.0.1', '100');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `pass`, `email`) VALUES
(100, 'vasya', 'vasya', '0000da70c317d67c464fa004aa382da55d520000', 'vasya@vasya.vas'),
(101, 'vasya2', 'vasya2', '0000f91a8376ac810bb9f231d28fcf1f708e0000', 'vasya2@vasya2.vas');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
