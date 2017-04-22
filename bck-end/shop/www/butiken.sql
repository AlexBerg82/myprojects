-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2016 at 09:25 PM
-- Server version: 5.5.25
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `butiken`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id_cart` int(11) NOT NULL AUTO_INCREMENT,
  `id_pr_cart` int(11) NOT NULL,
  `price_cart` int(11) NOT NULL,
  `count_cart` int(11) NOT NULL,
  `datetime_cart` datetime NOT NULL,
  `ip_cart` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cart`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `brand` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `type`, `brand`) VALUES
(1, 'mobile', 'ACER'),
(2, 'mobile', 'Apple'),
(3, 'mobile', 'ASUS'),
(4, 'mobile', 'HTC'),
(5, 'mobile', 'Lenovo'),
(6, 'mobile', 'Microsoft'),
(7, 'mobile', 'Motorola'),
(8, 'mobile', 'Nokia'),
(9, 'mobile', 'SAMSUNG'),
(10, 'mobile', 'SONY'),
(11, 'notebook', 'ACER'),
(12, 'notebook', 'Apple'),
(13, 'notebook', 'ASUS'),
(14, 'notebook', 'HP'),
(15, 'notebook', 'Lenovo'),
(16, 'notebook', 'SAMSUNG'),
(17, 'notebook', 'SONY');

-- --------------------------------------------------------

--
-- Table structure for table `imag`
--

CREATE TABLE IF NOT EXISTS `imag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produc` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `imag`
--

INSERT INTO `imag` (`id`, `id_produc`, `images`) VALUES
(1, 1, '1_2.jpg'),
(2, 1, '1_21.jpg'),
(3, 1, '1_22.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `mini_desc` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `mini_feat` text NOT NULL,
  `feat` text NOT NULL,
  `datetime` datetime NOT NULL,
  `count` int(11) NOT NULL,
  `vis` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_prod`, `title`, `price`, `brand`, `mini_desc`, `img`, `desc`, `mini_feat`, `feat`, `datetime`, `count`, `vis`, `type`, `id_brand`, `likes`) VALUES
(1, '1Ноутбук Acer Aspire ES1-411-C1XZ (NX.MRUEU.003)', 6300, 'Acer', 'Удовольствие от ежедневной работы на компьютере\nНоутбук Aspire ES1 предлагает проверенные временем технологии, которые обеспечивают высокую производительность, развлечения и коммуникации. Aspire ES1 обладает тонким и легким корпусом и в то же время оснащен новейшим процессором, который позволяет справиться со всеми повседневными задачами.', '1_2.jpg', 'Удовольствие от ежедневной работы на компьютере\nНоутбук Aspire ES1 предлагает проверенные временем технологии, которые обеспечивают высокую производительность, развлечения и коммуникации. Aspire ES1 обладает тонким и легким корпусом и в то же время оснащен новейшим процессором, который позволяет справиться со всеми повседневными задачами.\n\nПревосходная функциональность\nБыстро и безопасно открывайте веб-страницы, общайтесь и смотрите видео на ходу на ноутбуке Aspire ES1 с процессором Intel и скоростной памятью. Наслаждайтесь работой на превосходном экране формата HD, а вместительный жесткий диск предоставит больше места для ваших мультимедийных файлов.\n\nУдивительно тонкий\nНоутбук Aspire ES1 предлагает надежную, портативную и доступную платформу для работы, а благодаря тонкому корпусу легко помещается в рюкзаке или портфеле и не занимает много места на рабочем столе.\n\nПоразительные развлечения\nФильмы и видео отличаются великолепным качеством изображения на светодиодном дисплее формата HD ноутбука Aspire ES1, и просмотр превращается в настоящее кинематографическое событие. Вы можете еще больше усилить это впечатление, используя порт HDMI для подключения телевизора высокой четкости.\n\nНадежное хранение\nВы можете быть владельцем малого или среднего бизнеса, родителем, фотографом или кем угодно, но вам гарантировано душевное спокойствие от осознания того, что ваши личные данные и ценные воспоминания находятся в абсолютной безопасности.', 'Экран 14'''' (1366x768) HD LED, глянцевый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Windows 8.1 with Bing / 1.9 кг / черный', '<h2>Технические характеристики<br>Dell Inspiron 3551 (I35C25NIW-22) Black</h2><br>\n<table border="0">\n<tr><td width="350">Экран</td><td>15.6" (1366x768) WXGA HD</td></tr>\n<tr><td>Процессор</td><td>Двухъядерный Intel Celeron N2830 (2.16 ГГц)</td></tr>\n<tr><td>Объем оперативной памяти</td><td>2 ГБ </td></tr>\n<tr><td>Количество слотов для оперативной памяти</td><td>1</td></tr>\n<tr><td>Тип оперативной памяти</td><td>DDR3 1600 МГц</td></tr>\n<tr><td>Графический адаптер</td><td>Интегрированный, Intel HD Graphics</td></tr>\n<tr><td>Объём накопителя</td><td>500 ГБ</td></tr>\n<tr valign="top"><td>Сетевые адаптер</td><td> Wi-Fi<br>\n								Bluetooth 4.0</td></tr>\n<tr><td>Оптический привод</td><td> Отсутствует</td></tr>\n<tr valign="top"><td>Дополнительные возможности </td><td> Веб-камера HD 1 Мп<br>\n											Встроенный цифровой микрофон<br>\n											Стереодинамики с технологией обработки<br>\n											звука Waves MaxxAudio<br>\n											Мультисенсорная панель с поддержкой<br>\n											жестов и встроенной прокруткой</td></tr>\n<tr valign="top"><td>Разъемы и порты ввода-вывода </td><td>1 порт USB 3.0 / 2 порта USB 2.0 / HDMI /<br>\n											комбинированный аудиоразъем / кардридер</td></tr>\n<tr><td>Операционная система </td><td> Windows 8.1</td></tr>\n<tr><td>Подсветка клавиатуры </td><td> Нет</td></tr>\n<tr valign="top"><td>Батарея </td><td> Cъемная<br>\n							4-ячеечная, 40 Вт*ч</td></tr>\n<tr><td>Габариты (Ш х Г х В) </td><td> 380 x 260 x 21.7 мм</td></tr>\n<tr><td>Вес </td><td> 2.14 кг</td></tr>\n<tr valign="top"><td>Комплект поставки </td><td> Ноутбук<br> \n									Батарея<br>\n									Адаптер питания<br> \n									Документация</td></tr>\n<tr><td>Цвет </td><td> Black</td></tr>\n<tr><td>Гарантия </td><td> 12 месяцев</td></tr>\n</table>', '2016-01-12 00:00:00', 19, 1, 'notebook', 11, 2),
(2, '2Ноутбук Acer Aspire ES1-411-C1XZ (NX.MRUEU.003)', 6300, 'Acer', 'Удовольствие от ежедневной работы на компьютере\nНоутбук Aspire ES1 предлагает проверенные временем технологии, которые обеспечивают высокую производительность, развлечения и коммуникации. Aspire ES1 обладает тонким и легким корпусом и в то же время оснащен новейшим процессором, который позволяет справиться со всеми повседневными задачами.', '', 'Удовольствие от ежедневной работы на компьютере\nНоутбук Aspire ES1 предлагает проверенные временем технологии, которые обеспечивают высокую производительность, развлечения и коммуникации. Aspire ES1 обладает тонким и легким корпусом и в то же время оснащен новейшим процессором, который позволяет справиться со всеми повседневными задачами.\n\nПревосходная функциональность\nБыстро и безопасно открывайте веб-страницы, общайтесь и смотрите видео на ходу на ноутбуке Aspire ES1 с процессором Intel и скоростной памятью. Наслаждайтесь работой на превосходном экране формата HD, а вместительный жесткий диск предоставит больше места для ваших мультимедийных файлов.\n\nУдивительно тонкий\nНоутбук Aspire ES1 предлагает надежную, портативную и доступную платформу для работы, а благодаря тонкому корпусу легко помещается в рюкзаке или портфеле и не занимает много места на рабочем столе.\n\nПоразительные развлечения\nФильмы и видео отличаются великолепным качеством изображения на светодиодном дисплее формата HD ноутбука Aspire ES1, и просмотр превращается в настоящее кинематографическое событие. Вы можете еще больше усилить это впечатление, используя порт HDMI для подключения телевизора высокой четкости.\n\nНадежное хранение\nВы можете быть владельцем малого или среднего бизнеса, родителем, фотографом или кем угодно, но вам гарантировано душевное спокойствие от осознания того, что ваши личные данные и ценные воспоминания находятся в абсолютной безопасности.', 'Экран 14'''' (1366x768) HD LED, глянцевый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Windows 8.1 with Bing / 1.9 кг / черный', 'Краткие характеристики \nЭкран 14'''' (1366x768) HD LED, глянцевый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Windows 8.1 with Bing / 1.9 кг / черный \nЭкран \n14" (1366x768) WXGA HD \nПроцессор \nДвухъядерный Intel Celeron N2840 (2.16 ГГц) \nОбъем оперативной памяти \n2 ГБ \nТип оперативной памяти \nDDR3L \nГрафический адаптер \nИнтегрированный, Intel HD Graphics \nОбъём накопителя \n500 ГБ \nСетевые адаптеры \nGigabit Ethernet\n Wi-Fi 802.11b/g/n\n Bluetooth \nОптический привод \nОтсутствует \nДополнительные возможности \nВеб-камера 0.3 Мп\n Встроенный микрофон\n Стереодинамики \nРазъемы и порты ввода-вывода \n1 х USB 2.0 / 1 х USB 3.0 / HDMI / LAN (RJ-45) / комбинированный аудиоразъем / кардридер SD \nОперационная система \nWindows 8.1 with Bing \nПреимущества лицензионной ОС Windows 8 \n1. Удобный персонализованный Стартовый экран для избранных программ и контактов;\n 2. Самая большая экосистема игровых и прикладных программ, включая более 150 000 приложений в Магазине Windows;\n 3. Непревзойденная совместимость: компьютер с Windows 8.1 работает c вашей камерой, принтером, накопителем и другим оборудованием;\n 4. Отличная адаптация для работы с сенсорными мониторами;\n 5. Безопасность: встроенный антивирус Defender обеспечивает надежную защиту от вредоносных программ;\n 6. Скорость работы: старт и завершение работы происходит за считанные секунды;\n 7. Windows 8.1 позволяет:\n · Легкое переключение с помощью кнопки «Пуск» между Стартовым экраном, программами и рабочим столом;\n · Одновременную работу на одном экране настольных приложений и приложений написанных специально для Windows 8.1;\n · Встроенную синхронизацию настроек и файлов через облачную службу SkyDrive;\n · Усовершенствованную встроенную поисковую систему;\n · Более экономный режим потребления батареи ноутбука. \nПодсветка клавиатуры \nНет \nУкраинская раскладка клавиатуры \nНет \nБатарея \nЛитий-ионная, 4-элементная, 2500 мА*ч \nГабариты (Ш х Г х В) \n346 х 248 х 25.3 мм \nВес \n1.9 кг \nКомплект поставки \nНоутбук\n Батарея\n Адаптер питания\n Руководство пользователя \nЦвет \nBlack \nГарантия \n12 месяцев', '2016-01-14 00:00:00', 46, 1, 'notebook', 11, 3),
(3, '3Ноутбук ASUS ES1-411-C1XZ (NX.MRUEU.003)', 8800, 'ASUS', 'Удовольствие от ежедневной работы на компьютере\r\nНоутбук Aspire ES1 предлагает проверенные временем технологии, которые обеспечивают высокую производительность, развлечения и коммуникации. Aspire ES1 обладает тонким и легким корпусом и в то же время оснащен новейшим процессором, который позволяет справиться со всеми повседневными задачами.', '1_2.jpg', 'Удовольствие от ежедневной работы на компьютере\nНоутбук Aspire ES1 предлагает проверенные временем технологии, которые обеспечивают высокую производительность, развлечения и коммуникации. Aspire ES1 обладает тонким и легким корпусом и в то же время оснащен новейшим процессором, который позволяет справиться со всеми повседневными задачами.\n\nПревосходная функциональность\nБыстро и безопасно открывайте веб-страницы, общайтесь и смотрите видео на ходу на ноутбуке Aspire ES1 с процессором Intel и скоростной памятью. Наслаждайтесь работой на превосходном экране формата HD, а вместительный жесткий диск предоставит больше места для ваших мультимедийных файлов.\n\nУдивительно тонкий\nНоутбук Aspire ES1 предлагает надежную, портативную и доступную платформу для работы, а благодаря тонкому корпусу легко помещается в рюкзаке или портфеле и не занимает много места на рабочем столе.\n\nПоразительные развлечения\nФильмы и видео отличаются великолепным качеством изображения на светодиодном дисплее формата HD ноутбука Aspire ES1, и просмотр превращается в настоящее кинематографическое событие. Вы можете еще больше усилить это впечатление, используя порт HDMI для подключения телевизора высокой четкости.\n\nНадежное хранение\nВы можете быть владельцем малого или среднего бизнеса, родителем, фотографом или кем угодно, но вам гарантировано душевное спокойствие от осознания того, что ваши личные данные и ценные воспоминания находятся в абсолютной безопасности.', 'Экран 14'''' (1366x768) HD LED, глянцевый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Windows 8.1 with Bing / 1.9 кг / черный', 'Краткие характеристики \nЭкран 14'''' (1366x768) HD LED, глянцевый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Windows 8.1 with Bing / 1.9 кг / черный \nЭкран \n14" (1366x768) WXGA HD \nПроцессор \nДвухъядерный Intel Celeron N2840 (2.16 ГГц) \nОбъем оперативной памяти \n2 ГБ \nТип оперативной памяти \nDDR3L \nГрафический адаптер \nИнтегрированный, Intel HD Graphics \nОбъём накопителя \n500 ГБ \nСетевые адаптеры \nGigabit Ethernet\n Wi-Fi 802.11b/g/n\n Bluetooth \nОптический привод \nОтсутствует \nДополнительные возможности \nВеб-камера 0.3 Мп\n Встроенный микрофон\n Стереодинамики \nРазъемы и порты ввода-вывода \n1 х USB 2.0 / 1 х USB 3.0 / HDMI / LAN (RJ-45) / комбинированный аудиоразъем / кардридер SD \nОперационная система \nWindows 8.1 with Bing \nПреимущества лицензионной ОС Windows 8 \n1. Удобный персонализованный Стартовый экран для избранных программ и контактов;\n 2. Самая большая экосистема игровых и прикладных программ, включая более 150 000 приложений в Магазине Windows;\n 3. Непревзойденная совместимость: компьютер с Windows 8.1 работает c вашей камерой, принтером, накопителем и другим оборудованием;\n 4. Отличная адаптация для работы с сенсорными мониторами;\n 5. Безопасность: встроенный антивирус Defender обеспечивает надежную защиту от вредоносных программ;\n 6. Скорость работы: старт и завершение работы происходит за считанные секунды;\n 7. Windows 8.1 позволяет:\n · Легкое переключение с помощью кнопки «Пуск» между Стартовым экраном, программами и рабочим столом;\n · Одновременную работу на одном экране настольных приложений и приложений написанных специально для Windows 8.1;\n · Встроенную синхронизацию настроек и файлов через облачную службу SkyDrive;\n · Усовершенствованную встроенную поисковую систему;\n · Более экономный режим потребления батареи ноутбука. \nПодсветка клавиатуры \nНет \nУкраинская раскладка клавиатуры \nНет \nБатарея \nЛитий-ионная, 4-элементная, 2500 мА*ч \nГабариты (Ш х Г х В) \n346 х 248 х 25.3 мм \nВес \n1.9 кг \nКомплект поставки \nНоутбук\n Батарея\n Адаптер питания\n Руководство пользователя \nЦвет \nBlack \nГарантия \n12 месяцев', '2016-01-18 00:00:00', 9, 1, 'notebook', 13, 0),
(4, '4Ноутбук Acer Aspire ES1-411-C1XZ (NX.MRUEU.003)', 6600, 'Acer', 'Удовольствие от ежедневной работы на компьютере\r\nНоутбук Aspire ES1 предлагает проверенные временем технологии, которые обеспечивают высокую производительность, развлечения и коммуникации. Aspire ES1 обладает тонким и легким корпусом и в то же время оснащен новейшим процессором, который позволяет справиться со всеми повседневными задачами.', '1_2.jpg', 'Удовольствие от ежедневной работы на компьютере\r\nНоутбук Aspire ES1 предлагает проверенные временем технологии, которые обеспечивают высокую производительность, развлечения и коммуникации. Aspire ES1 обладает тонким и легким корпусом и в то же время оснащен новейшим процессором, который позволяет справиться со всеми повседневными задачами.\r\n\r\nПревосходная функциональность\r\nБыстро и безопасно открывайте веб-страницы, общайтесь и смотрите видео на ходу на ноутбуке Aspire ES1 с процессором Intel и скоростной памятью. Наслаждайтесь работой на превосходном экране формата HD, а вместительный жесткий диск предоставит больше места для ваших мультимедийных файлов.\r\n\r\nУдивительно тонкий\r\nНоутбук Aspire ES1 предлагает надежную, портативную и доступную платформу для работы, а благодаря тонкому корпусу легко помещается в рюкзаке или портфеле и не занимает много места на рабочем столе.\r\n\r\nПоразительные развлечения\r\nФильмы и видео отличаются великолепным качеством изображения на светодиодном дисплее формата HD ноутбука Aspire ES1, и просмотр превращается в настоящее кинематографическое событие. Вы можете еще больше усилить это впечатление, используя порт HDMI для подключения телевизора высокой четкости.\r\n\r\nНадежное хранение\r\nВы можете быть владельцем малого или среднего бизнеса, родителем, фотографом или кем угодно, но вам гарантировано душевное спокойствие от осознания того, что ваши личные данные и ценные воспоминания находятся в абсолютной безопасности.', 'Экран 14'''' (1366x768) HD LED, глянцевый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Windows 8.1 with Bing / 1.9 кг / черный', 'Краткие характеристики \r\nЭкран 14'''' (1366x768) HD LED, глянцевый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Windows 8.1 with Bing / 1.9 кг / черный \r\nЭкран \r\n14" (1366x768) WXGA HD \r\nПроцессор \r\nДвухъядерный Intel Celeron N2840 (2.16 ГГц) \r\nОбъем оперативной памяти \r\n2 ГБ \r\nТип оперативной памяти \r\nDDR3L \r\nГрафический адаптер \r\nИнтегрированный, Intel HD Graphics \r\nОбъём накопителя \r\n500 ГБ \r\nСетевые адаптеры \r\nGigabit Ethernet\r\n Wi-Fi 802.11b/g/n\r\n Bluetooth \r\nОптический привод \r\nОтсутствует \r\nДополнительные возможности \r\nВеб-камера 0.3 Мп\r\n Встроенный микрофон\r\n Стереодинамики \r\nРазъемы и порты ввода-вывода \r\n1 х USB 2.0 / 1 х USB 3.0 / HDMI / LAN (RJ-45) / комбинированный аудиоразъем / кардридер SD \r\nОперационная система \r\nWindows 8.1 with Bing \r\nПреимущества лицензионной ОС Windows 8 \r\n1. Удобный персонализованный Стартовый экран для избранных программ и контактов;\r\n 2. Самая большая экосистема игровых и прикладных программ, включая более 150 000 приложений в Магазине Windows;\r\n 3. Непревзойденная совместимость: компьютер с Windows 8.1 работает c вашей камерой, принтером, накопителем и другим оборудованием;\r\n 4. Отличная адаптация для работы с сенсорными мониторами;\r\n 5. Безопасность: встроенный антивирус Defender обеспечивает надежную защиту от вредоносных программ;\r\n 6. Скорость работы: старт и завершение работы происходит за считанные секунды;\r\n 7. Windows 8.1 позволяет:\r\n · Легкое переключение с помощью кнопки «Пуск» между Стартовым экраном, программами и рабочим столом;\r\n · Одновременную работу на одном экране настольных приложений и приложений написанных специально для Windows 8.1;\r\n · Встроенную синхронизацию настроек и файлов через облачную службу SkyDrive;\r\n · Усовершенствованную встроенную поисковую систему;\r\n · Более экономный режим потребления батареи ноутбука. \r\nПодсветка клавиатуры \r\nНет \r\nУкраинская раскладка клавиатуры \r\nНет \r\nБатарея \r\nЛитий-ионная, 4-элементная, 2500 мА*ч \r\nГабариты (Ш х Г х В) \r\n346 х 248 х 25.3 мм \r\nВес \r\n1.9 кг \r\nКомплект поставки \r\nНоутбук\r\n Батарея\r\n Адаптер питания\r\n Руководство пользователя \r\nЦвет \r\nBlack \r\nГарантия \r\n12 месяцев', '2016-01-19 00:00:00', 49, 1, 'notebook', 11, 3),
(5, 'Mobile ASUS ES1-411-C1XZ (NX.MRUEU.003)', 4300, 'ASUS', 'Удовольствие от ежедневной работы на компьютере\r\nНоутбук Aspire ES1 предлагает проверенные временем технологии, которые обеспечивают высокую производительность, развлечения и коммуникации. Aspire ES1 обладает тонким и легким корпусом и в то же время оснащен новейшим процессором, который позволяет справиться со всеми повседневными задачами.', '1_1.jpg', 'Удовольствие от ежедневной работы на компьютере\r\nНоутбук Aspire ES1 предлагает проверенные временем технологии, которые обеспечивают высокую производительность, развлечения и коммуникации. Aspire ES1 обладает тонким и легким корпусом и в то же время оснащен новейшим процессором, который позволяет справиться со всеми повседневными задачами.\r\n\r\nПревосходная функциональность\r\nБыстро и безопасно открывайте веб-страницы, общайтесь и смотрите видео на ходу на ноутбуке Aspire ES1 с процессором Intel и скоростной памятью. Наслаждайтесь работой на превосходном экране формата HD, а вместительный жесткий диск предоставит больше места для ваших мультимедийных файлов.\r\n\r\nУдивительно тонкий\r\nНоутбук Aspire ES1 предлагает надежную, портативную и доступную платформу для работы, а благодаря тонкому корпусу легко помещается в рюкзаке или портфеле и не занимает много места на рабочем столе.\r\n\r\nПоразительные развлечения\r\nФильмы и видео отличаются великолепным качеством изображения на светодиодном дисплее формата HD ноутбука Aspire ES1, и просмотр превращается в настоящее кинематографическое событие. Вы можете еще больше усилить это впечатление, используя порт HDMI для подключения телевизора высокой четкости.\r\n\r\nНадежное хранение\r\nВы можете быть владельцем малого или среднего бизнеса, родителем, фотографом или кем угодно, но вам гарантировано душевное спокойствие от осознания того, что ваши личные данные и ценные воспоминания находятся в абсолютной безопасности.', 'Экран 14'''' (1366x768) HD LED, глянцевый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Windows 8.1 with Bing / 1.9 кг / черный', 'Краткие характеристики \r\nЭкран 14'''' (1366x768) HD LED, глянцевый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Windows 8.1 with Bing / 1.9 кг / черный \r\nЭкран \r\n14" (1366x768) WXGA HD \r\nПроцессор \r\nДвухъядерный Intel Celeron N2840 (2.16 ГГц) \r\nОбъем оперативной памяти \r\n2 ГБ \r\nТип оперативной памяти \r\nDDR3L \r\nГрафический адаптер \r\nИнтегрированный, Intel HD Graphics \r\nОбъём накопителя \r\n500 ГБ \r\nСетевые адаптеры \r\nGigabit Ethernet\r\n Wi-Fi 802.11b/g/n\r\n Bluetooth \r\nОптический привод \r\nОтсутствует \r\nДополнительные возможности \r\nВеб-камера 0.3 Мп\r\n Встроенный микрофон\r\n Стереодинамики \r\nРазъемы и порты ввода-вывода \r\n1 х USB 2.0 / 1 х USB 3.0 / HDMI / LAN (RJ-45) / комбинированный аудиоразъем / кардридер SD \r\nОперационная система \r\nWindows 8.1 with Bing \r\nПреимущества лицензионной ОС Windows 8 \r\n1. Удобный персонализованный Стартовый экран для избранных программ и контактов;\r\n 2. Самая большая экосистема игровых и прикладных программ, включая более 150 000 приложений в Магазине Windows;\r\n 3. Непревзойденная совместимость: компьютер с Windows 8.1 работает c вашей камерой, принтером, накопителем и другим оборудованием;\r\n 4. Отличная адаптация для работы с сенсорными мониторами;\r\n 5. Безопасность: встроенный антивирус Defender обеспечивает надежную защиту от вредоносных программ;\r\n 6. Скорость работы: старт и завершение работы происходит за считанные секунды;\r\n 7. Windows 8.1 позволяет:\r\n · Легкое переключение с помощью кнопки «Пуск» между Стартовым экраном, программами и рабочим столом;\r\n · Одновременную работу на одном экране настольных приложений и приложений написанных специально для Windows 8.1;\r\n · Встроенную синхронизацию настроек и файлов через облачную службу SkyDrive;\r\n · Усовершенствованную встроенную поисковую систему;\r\n · Более экономный режим потребления батареи ноутбука. \r\nПодсветка клавиатуры \r\nНет \r\nУкраинская раскладка клавиатуры \r\nНет \r\nБатарея \r\nЛитий-ионная, 4-элементная, 2500 мА*ч \r\nГабариты (Ш х Г х В) \r\n346 х 248 х 25.3 мм \r\nВес \r\n1.9 кг \r\nКомплект поставки \r\nНоутбук\r\n Батарея\r\n Адаптер питания\r\n Руководство пользователя \r\nЦвет \r\nBlack \r\nГарантия \r\n12 месяцев', '2016-01-19 00:00:00', 2, 1, 'mobile', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE IF NOT EXISTS `tbl_review` (
  `rev_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `god_rev` varchar(100) NOT NULL,
  `bad_rev` varchar(100) NOT NULL,
  `com` text NOT NULL,
  `date` datetime NOT NULL,
  `moder` int(11) NOT NULL,
  PRIMARY KEY (`rev_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`rev_id`, `prod_id`, `name`, `god_rev`, `bad_rev`, `com`, `date`, `moder`) VALUES
(1, 1, 'Вася', '', 'Гамно ноут', 'Ноут полная параша! Не берите ето амно или пожалеете вскоре.', '2016-03-04 00:00:00', 1),
(2, 1, 'поп', 'нет их', 'все', 'выавыапва\nыаываы\nаываываыв', '2016-03-15 14:07:30', 1),
(3, 0, 'впива', 'вапвап', 'вапвап', 'вапвапва', '2016-03-15 14:19:36', 1),
(4, 1, 'ыфв', 'вфыв', 'ываыва', 'ываыва', '2016-03-15 16:06:08', 1),
(5, 5, 'sd', 'asd', 'asd', 'asd', '2016-04-19 15:48:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `datetime` datetime NOT NULL,
  `ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `surname`, `name`, `email`, `phone`, `address`, `datetime`, `ip`) VALUES
(2, 'vasya', '000015225244de506d5e510728064688dbb11111', 'vasya', 'vasya', 'vasya@vasya.va', '11111111', 'vasya 1', '2016-01-25 16:12:57', '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;