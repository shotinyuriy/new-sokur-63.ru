-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 28 2016 г., 07:32
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `sokur63`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `sort_index` int(11) NOT NULL DEFAULT '1',
  `menu_visible` int(11) NOT NULL DEFAULT '1',
  `image_url` varchar(511) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_parent_category_fk` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `category_id`, `sort_index`, `menu_visible`, `image_url`) VALUES
('podarki', 'Подарки', NULL, 1, 0, 'podarki.jpg'),
('pirozhnye', 'Пирожные', NULL, 17, 1, 'pirozhnye.jpg'),
('makaroni', 'Макарони', 'pirozhnye', 18, 1, 'makaroni.jpg'),
('vypechnye-izdeliya', 'Выпечные изделия', NULL, 19, 1, 'vypechnye-izdeliya.jpg'),
('tvorozhnoe-kol-co', 'Творожное кольцо', 'vypechnye-izdeliya', 20, 1, 'tvorozhnoe-kol-co.jpg'),
('12321', '12321', NULL, 1, 1, '12321.jpg'),
('dfetet', 'dfetet', 'ffsafas2323', 1, 1, 'dfetet.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(63) NOT NULL,
  `fullname` varchar(63) NOT NULL,
  `phone` varchar(63) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id`, `post`, `fullname`, `phone`) VALUES
(1, 'Приемная', '', '62-47-93'),
(2, 'Генеральный директор', 'Цытко Вячеслав Викторович', '62-47-93'),
(3, 'Главный инженер', 'Мадиберг Геннадий Эльмарович', '62-27-55'),
(4, 'Бухгалтерия', '', '62-34-69');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `description` varchar(511) DEFAULT NULL,
  `sort_index` int(11) NOT NULL DEFAULT '1',
  `menu_visible` int(11) NOT NULL DEFAULT '1',
  `image_url` varchar(511) DEFAULT NULL,
  `kcal_per_100g` float DEFAULT NULL,
  `shelf_life_unpack` int(11) DEFAULT NULL,
  `shelf_life_pack` int(11) DEFAULT NULL,
  `standard` varchar(20) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `gramms` int(11) NOT NULL DEFAULT '0',
  `milliliters` int(11) NOT NULL DEFAULT '0',
  `price` decimal(18,6) NOT NULL DEFAULT '0.000000',
  PRIMARY KEY (`id`),
  KEY `good_category_fk` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `category_id`, `description`, `sort_index`, `menu_visible`, `image_url`, `kcal_per_100g`, `shelf_life_unpack`, `shelf_life_pack`, `standard`, `amount`, `gramms`, `milliliters`, `price`) VALUES
('podarki_diskontnaya-karta-10', 'Дисконтная карта 10%', 'podarki', 'Дисконтная карта со скидкой 10%', 1, 0, 'podarki_diskontnaya-karta-10.png', 0, NULL, NULL, NULL, 0, 0, 0, '0.000000'),
('podarki_teyshoku', 'Эклеры', 'podarki', 'Тесто, шоколад, крем', 1, 0, 'podarki_teyshoku.jpg', 98, NULL, NULL, NULL, 0, 0, 0, '0.000000'),
('asdasfsa_fsdfsf', 'fsdfsf', 'asdasfsa', 'sfsdfa', 146, 1, NULL, 123, NULL, NULL, NULL, 0, 0, 0, '0.000000'),
('podarki_sok-1l', 'Сок 1л', 'podarki', 'любой сок на выбор', 1, 0, 'podarki_sok-1l.jpg', 0, NULL, NULL, NULL, 0, 0, 0, '0.000000'),
('podarki_shampanskoe', 'Шампанское', 'podarki', '', 1, 0, 'podarki_shampanskoe.jpg', 1, NULL, NULL, NULL, 0, 0, 0, '0.000000'),
('torty_tryufel', 'Трюфель', 'torty', 'Шоколадно - сливочный торт с конфетами &quot;Трюфель&quot;.', 132, 1, 'torty_tryufel.jpg', 235, NULL, NULL, NULL, 0, 0, 0, '0.000000'),
('torty_chiz-keyk-quot-mango-marakuyya-quot', 'Чиз-кейк &quot;Манго-маракуйя&quot;', 'torty', 'Сырно-творожная масса в сочетании  с пюре манго и пюре маракуйя на тонкой песочной основе с добавлением мёда. Торт покрыт гелем &quot;Маракуйя&quot; с косточками', 133, 1, 'torty_chiz-keyk-quot-mango-marakuyya-quot.jpg', 325, NULL, NULL, NULL, 0, 0, 0, '0.000000'),
('torty_ksav-er', 'Ксавьер', 'torty', 'Песочная корзиночка с орехами и карамелью.', 134, 1, 'torty_ksav-er.jpg', 300, NULL, NULL, NULL, 0, 0, 0, '0.000000'),
('assorti', 'Ассорти', 'pirozhnye', 'Ассорти из муссовых пирожных.', 135, 1, 'pirozhnye_assorti.jpg', 160, 18, 72, 'ГОСТ-123-123', 4, 220, 0, '125.000000'),
('estrelli', 'Эстрелли', 'pirozhnye', 'Ореховое безе и ореховый заварной крем - ничего лишнего.', 136, 1, 'pirozhnye_estrelli.jpg', 234, 18, 168, 'РСТ-098-45-2000', 4, 400, 0, '230.000000'),
('pirozhnye_opera', 'Опера', 'pirozhnye', 'Миндальный бисквит, кофейный крем и шоколад.', 137, 1, 'pirozhnye_opera.jpg', 345, NULL, NULL, NULL, 0, 0, 0, '0.000000'),
('pirozhnye_keksy', 'Кексы', 'pirozhnye', 'Миндальный бисквит, кофейный крем и шоколад.', 138, 1, 'pirozhnye_keksy.png', 236, NULL, NULL, NULL, 0, 0, 0, '0.000000'),
('pirozhnye_profitroli-shokoladnye', 'Профитроли шоколадные', 'pirozhnye', 'Профитроли с шоколадным вкусом.', 139, 1, 'pirozhnye_profitroli-shokoladnye.jpg', 179, NULL, NULL, NULL, 0, 0, 0, '0.000000'),
('makaroni-shokoladnye', 'Макарони шоколадные', 'makaroni', 'Миндально-шоколадное безе с воздушным кремом.', 140, 1, 'makaroni-shokoladnye.jpg', 179, 12, 12, '12', 23, 23, 0, '156.000000'),
('makaroni-assorti-mini', '"Макарони ассорти" мини', 'makaroni', 'Пять ярких и необычных сочетаний макарони в одном наборе.', 141, 1, 'makaroni-assorti-mini.jpg', 456, 21, 23, '1234-ffs-3435', 0, 0, 0, '0.000000'),
('maffin-s-izyumom', 'Маффин с изюмом', 'vypechnye-izdeliya', 'Воздушный маффин с добавлением изюма.', 142, 1, 'vypechnye-izdeliya_maffin-s-izyumom.jpg', 234, 24, 72, 'РОС 123-0214-21', 0, 0, 0, '123.000000'),
('shtrudel', 'Штрудель', 'vypechnye-izdeliya', 'Тонкое пресное тесто с начинкой из миндальной муки, яблок, изюма и корицы. Штрудель покрыт сахарной пудрой.', 143, 1, 'vypechnye-izdeliya_shtrudel.jpg', 124, 24, 72, '', 1, 125, 0, '356.000000'),
('tvorozhnoe-kol-co_tvorozhno-malinovoe-kol-co', 'Творожно-малиновое кольцо', 'tvorozhnoe-kol-co', 'Заварное тесто с творогом и малиной.', 144, 1, 'tvorozhnoe-kol-co_tvorozhno-malinovoe-kol-co.jpg', 234, NULL, NULL, NULL, 0, 0, 0, '0.000000'),
('tvorozhnoe-kol-co_tvorozhno-abrikosovoe-kol-co', 'Творожно-абрикосовое кольцо', 'tvorozhnoe-kol-co', 'Сочетание абрикоса, творога и заварного теста.', 145, 1, 'tvorozhnoe-kol-co_tvorozhno-abrikosovoe-kol-co.jpg', 134, NULL, NULL, NULL, 0, 0, 0, '0.000000'),
('23214', '23214', 'tvorozhnoe-kol-co', '2421412', 1, 1, '23214.jpg', 12, NULL, NULL, NULL, 0, 0, 0, '0.000000'),
('sdff', 'sdff', 'tvorozhnoe-kol-co', 'sdfsdf', 1, 1, 'sdff.jpg', 12, NULL, NULL, '', 0, 0, 0, '0.000000'),
('dsgsg', 'dsgsg', 'tvorozhnoe-kol-co', 'sgsdg', 1, 1, 'dsgsg.jpg', 1, NULL, NULL, '', 0, 0, 0, '145.000000'),
('12321', '12321', NULL, '213123', 1, 1, NULL, 12, 12, 12, '12', 0, 12, 0, '0.000000'),
('asdasda', 'asdasda', 'sfasfasf', 'sdsaffsafsafdsf dsf', 1, 1, 'asdasda.jpg', 123, 134, 12, '12', 112, 12, 0, '112.000000'),
('sfsdf', 'sfsdf', 'dfetet', 'sdfsaf', 1, 1, 'sfsdf.jpg', 1, 1, 1, '1', 1, 1, 0, '1.000000'),
('kerti', 'Керти', 'pirozhnye', 'аепкпк', 1, 1, 'kerti.jpg', 123, 12, 288, '13-ыавфыа', 143, 1123, 0, '134.000000');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `image_url` varchar(256) DEFAULT NULL,
  `created_on` date NOT NULL,
  `expires_on` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image_url`, `created_on`, `expires_on`) VALUES
(1, 'Новость 2', 'Описание новости №2', '1.jpg', '2016-05-01', '2036-01-01'),
(2, '421412', 'gsdgsdgsdg 3 233fwef2', '2.jpg', '2016-05-02', '2016-05-25'),
(3, 'ggsd', 'agasgasf', '3.jpg', '2016-05-03', '2016-05-26'),
(4, 'jjyjy', 'yjy', '4.jpg', '2016-05-27', '2016-05-25'),
(5, 'День конституции', 'Мы приняли конституцию - ураа', '5.jpg', '2016-05-27', '2016-06-11');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `self_take` tinyint(4) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `is_birthday` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `date_time`, `phone_number`, `customer_name`, `address`, `self_take`, `status`, `is_birthday`) VALUES
(1, '2013-12-29 09:57:40', '77756756', 'ппвпв', 'аврварв', 1, 0, 0),
(2, '2013-12-29 10:04:15', '9898090444', 'Станислав', 'ул. Линейная 19 кв.16', 0, 3, 0),
(3, '2014-01-07 11:46:14', '89878016666', 'Покупатель', 'Саратов. Долгопрудная 15 а', 0, 3, 0),
(4, '2014-01-07 18:06:17', '9999996666', 'папа', 'Комсомольская д.15 кв 1', 0, 3, 0),
(5, '2014-01-07 18:14:17', '879788765', 'тест', 'ул.Акопова, д.18, кв.10', 0, 1, 0),
(8, '2014-01-25 21:42:11', '0000000000', 'TEST', '', 1, 0, 1),
(9, '2014-01-25 21:48:44', '0000000000', 'TEST2', '', 1, 0, 1),
(10, '2016-05-05 00:47:28', '9878558662', 'Пегол', '410512 Саратов ул. 45я', 0, 0, 0),
(11, '2016-05-05 01:16:41', '8528585655', 'авов', 'впвыпвпывпыв ыпывпвыпыв', 0, 0, 0),
(12, '2016-05-13 07:04:07', '9061567814', 'Дмитрий', 'Саратов, Октябрьский р-н, ул.Жуковского, 53, кв.82', 0, 2, 1),
(13, '2016-05-13 07:05:56', '9061767816', 'Александр', 'Саратов, Заводской р-н, ул.Пушкина, 34, кв.84', 0, 0, 1),
(14, '2016-05-13 11:29:11', '9876543212', 'Юрий', 'Московская, д. 23', 0, 0, 0),
(18, '0000-00-00 00:00:00', '2312412412', '234324234234', 'fsafsafasf', 0, 0, 0),
(19, '0000-00-00 00:00:00', '4234324234', 'fafsafasfasf', 'fasfafsafas', 0, 0, 0),
(20, '0000-00-00 00:00:00', '4214124124', 'fgasgasgsa', 'asgasgsagsagsag', 0, 0, 0),
(21, '2016-05-25 09:49:29', '2342141241', '214124124124', 'safsafasfasfas', 0, 0, 0),
(22, '2016-05-25 09:52:16', '4242342342', '3421412412', 'rfasgsagasgas', 0, 0, 0),
(23, '2016-05-25 09:56:17', '2214124124', 'fasfasfasfasf', 'sfsafasfafasfwrfw', 0, 0, 0),
(24, '2016-05-25 09:58:27', '9872131231', 'fvsafsafasfasfasf', 'sfasfasfasfasfafasf sdasd', 0, 0, 0),
(25, '2016-05-25 10:11:25', '9878013234', 'safafsafasf', 'asfasfasfasfafsafa', 0, 0, 0),
(26, '2016-05-25 10:12:00', '9273241241', 'safasfasfasfas', 'asfsafasfasfasf', 0, 0, 0),
(27, '2016-05-25 11:16:19', '3242343243', 'fsafsafasfasf', 'fasfasfasf', 0, 0, 0),
(28, '2016-05-25 15:10:18', '5253523523', 'ы', '', 0, 0, 0),
(29, '2016-05-26 07:18:42', '4124241242', 'апфыафыаф', 'афыафыафыаф', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `good_id` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '1',
  `cost` decimal(18,6) NOT NULL DEFAULT '0.000000',
  PRIMARY KEY (`id`),
  KEY `order_detail_order_fk` (`order_id`),
  KEY `order_detail_portion_fk` (`good_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Дамп данных таблицы `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `good_id`, `amount`, `cost`) VALUES
(1, 1, '2', 1, '119.000000'),
(2, 1, '1', 1, '147.000000'),
(3, 2, '6', 3, '1221.000000'),
(4, 2, '4', 5, '855.000000'),
(5, 2, '2', 1, '119.000000'),
(6, 2, '3', 2, '386.000000'),
(7, 3, '2', 4, '476.000000'),
(8, 3, '1', 3, '441.000000'),
(9, 3, '4', 3, '513.000000'),
(10, 3, '3', 1, '193.000000'),
(11, 4, '4', 1, '171.000000'),
(12, 4, '3', 1, '193.000000'),
(13, 5, '2', 1, '119.000000'),
(14, 5, '1', 1, '147.000000'),
(15, 5, '4', 1, '171.000000'),
(16, 6, '32', 10, '1700.000000'),
(17, 7, '33', 10, '1800.000000'),
(18, 0, '3', 8, '1080.000000'),
(19, 0, '30', 2, '640.000000'),
(20, 0, '31', 2, '600.000000'),
(21, 0, '30', 2, '640.000000'),
(22, 0, '31', 2, '600.000000'),
(23, 0, '30', 2, '640.000000'),
(24, 0, '31', 2, '600.000000'),
(25, 0, '30', 2, '640.000000'),
(26, 0, '31', 2, '600.000000'),
(27, 0, '30', 2, '640.000000'),
(28, 0, '31', 2, '600.000000'),
(29, 8, '30', 2, '640.000000'),
(30, 8, '31', 2, '600.000000'),
(31, 9, '30', 2, '640.000000'),
(32, 9, '31', 2, '600.000000'),
(33, 10, '4', 11, '1980.000000'),
(34, 11, '6', 12, '540.000000'),
(35, 11, '30', 7, '2240.000000'),
(36, 0, '2', 2, '238.000000'),
(37, 0, '6', 9, '405.000000'),
(38, 12, '146', 6, '2622.000000'),
(39, 13, '146', 9, '3933.000000'),
(40, 13, '147', 7, '2555.000000'),
(41, 13, '148', 7, '1939.000000'),
(42, 13, '151', 7, '2625.000000'),
(43, 14, '156', 14, '2030.000000'),
(48, 18, 'pirozhnye_estrelli', 5, '0.000000'),
(47, 18, '', 3, '0.000000'),
(49, 19, 'pirozhnye_assorti', 3, '0.000000'),
(50, 20, 'maffin-s-izyumom', 1, '123.000000'),
(51, 20, 'shtrudel', 1, '356.000000'),
(52, 21, 'maffin-s-izyumom', 1, '123.000000'),
(53, 21, 'shtrudel', 1, '356.000000'),
(54, 22, 'maffin-s-izyumom', 1, '123.000000'),
(55, 22, 'shtrudel', 1, '356.000000'),
(56, 23, 'pirozhnye_assorti', 1, '0.000000'),
(57, 23, 'pirozhnye_estrelli', 1, '0.000000'),
(58, 24, 'pirozhnye_assorti', 1, '0.000000'),
(59, 24, 'pirozhnye_estrelli', 1, '0.000000'),
(60, 25, 'maffin-s-izyumom', 3, '369.000000'),
(61, 26, 'maffin-s-izyumom', 3, '369.000000'),
(62, 27, 'pirozhnye_assorti', 1, '0.000000'),
(63, 27, 'pirozhnye_estrelli', 1, '0.000000'),
(64, 28, 'shtrudel', 5, '1780.000000'),
(65, 29, 'pirozhnye_assorti', 2, '0.000000'),
(66, 29, 'pirozhnye_estrelli', 2, '0.000000'),
(67, 29, 'pirozhnye_opera', 2, '0.000000');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `title` varchar(64) NOT NULL,
  `code` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `session_start` datetime NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `buy_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- Дамп данных таблицы `stats`
--

INSERT INTO `stats` (`id`, `session_start`, `login`, `role`, `session_id`, `buy_count`) VALUES
(3, '2014-01-25 13:41:00', 'admin', 'admin', '252dc540a45ce4417391d29524d6bd87', NULL),
(4, '2014-01-25 13:43:11', '', '', '629c1a01af815b07a8c0f6eb7018157f', NULL),
(5, '2014-01-25 20:03:05', '', '', '7ce7ec17b46587c12dc0b716168e8a61', NULL),
(6, '2014-01-25 20:35:18', '', '', '8f355bdf7ad32dd9428c654aa11d0128', NULL),
(7, '2014-01-25 20:35:25', '', '', '72a5aec06164a748901953cf7778eedf', NULL),
(8, '2014-01-26 12:17:11', '', '', 'd3c0726e3e33f3c5d3d1cc6eb9c4cefe', NULL),
(9, '2014-01-26 12:30:49', '', '', '04d69e6788189ad096c1c194165b6520', NULL),
(10, '2014-01-26 12:54:46', '', '', '629c1a01af815b07a8c0f6eb7018157f', NULL),
(11, '2016-04-28 12:16:46', '', '', 'vkahtc89ukujn71f5neium5ig3', NULL),
(12, '2016-04-28 12:17:23', '', '', 'fbrb5na963b1mfkn2vh1tjf8d1', NULL),
(13, '2016-04-28 23:57:08', '', '', '5nfsmovcj46u1018andbnfph77', NULL),
(14, '2016-04-29 00:00:23', '', '', 'pratjmqavj7p6ps3p0hmm3vfv0', NULL),
(15, '2016-04-29 00:37:53', '', '', '8rfkvn2rdqbsbli6rutjv73ub6', NULL),
(16, '2016-04-29 00:38:51', '', '', 'l19gk5d6ae50vh0m69siuk2nc2', NULL),
(17, '2016-04-29 00:54:14', '', '', 'gaokk169laqvnh5ppdg4ho6uq6', NULL),
(18, '2016-04-29 00:54:38', '', '', 'ekl3fpgakuvgejk6iq6m796m90', NULL),
(19, '2016-04-29 00:57:48', '', '', 'qitjagligufio11lhp4qrtpji7', NULL),
(20, '2016-04-29 01:06:32', '', '', 'rj0jv38vubnca3qfv85dvcj0m5', NULL),
(21, '2016-04-29 01:06:46', '', '', 'hf4p2llibn39jt96pveh8uhlj3', NULL),
(22, '2016-04-29 01:34:51', '', '', 'osmb5f5didfsmeg4bqg7mr0em1', NULL),
(23, '2016-04-29 01:34:55', '', '', 'q8v7ad44v9bjegu22v7vviajs0', NULL),
(24, '2016-04-29 01:36:18', '', '', 'fipt6baklerdro0ipgn9cnj5v2', NULL),
(25, '2016-04-29 11:34:26', '', '', '0lnd0uie5uotifsc7q42us1ft0', NULL),
(26, '2016-04-29 11:38:30', '', '', 'agkc3rp60jsa49rgigektpc5q0', NULL),
(27, '2016-04-29 21:41:40', '', '', '65lp6igihgm29jje8h6aabbv02', NULL),
(28, '2016-04-29 21:41:43', '', '', '8159r306rfo1ih7j6ahdd2qan2', NULL),
(29, '2016-05-03 09:54:18', '', '', 'mr8hpg73l90uaqtnrua3kfa611', NULL),
(30, '2016-05-03 09:54:22', '', '', '1r11qtlacv4v5o1cvndgff6ue3', NULL),
(31, '2016-05-04 13:31:03', '', '', '55psdh7hsmjat6uhvih24e4j16', NULL),
(32, '2016-05-04 23:19:05', '', '', '6av5g3a0arachuh9oj33gbvp26', NULL),
(33, '2016-05-05 00:04:30', '', '', 'vmmqhdp5tj56rrefmmvelpi6o4', NULL),
(34, '2016-05-05 00:04:35', '', '', '278j5h81q9t4s8o2kqn5569h05', NULL),
(35, '2016-05-05 01:12:30', '', '', '4shh5qecop6c1e5evv9ikoic35', NULL),
(36, '2016-05-05 12:00:17', '', '', '10tvmvgqqb1e0vr3hgmoj0rtt7', NULL),
(37, '2016-05-05 12:00:19', '', '', 'ki213dqv0363sjonsl7dej6316', NULL),
(38, '2016-05-05 23:50:25', '', '', 'hd02uqmie38eljnl1fp1um1t14', NULL),
(39, '2016-05-05 23:50:39', 'admin', 'admin', '3eh1fj0bv6f4qhenm8g4rmka44', NULL),
(40, '2016-05-06 12:17:04', '', '', 'qd0c7dpbs541uinunvrtuns8t5', NULL),
(41, '2016-05-06 12:17:10', '', '', 'c17rbvsjf6k0bsouqc9lcvth62', NULL),
(42, '2016-05-12 13:06:41', '', '', 'hdin1s3ccort6fu3kli2m8it62', NULL),
(43, '2016-05-12 13:47:56', '', '', 'nfpmu1uti7mv825tb5t0uauet7', NULL),
(44, '2016-05-12 13:48:06', 'admin', 'admin', 'ce0u2vap6jeb8c1k8rrog3iqm7', NULL),
(45, '2016-05-12 15:22:01', '', '', 'naii3ubsuhhicko3v49jp13r00', NULL),
(46, '2016-05-12 15:28:41', '', '', 'i6vbpu8047578spqbbgrhnlba4', NULL),
(47, '2016-05-12 15:28:46', '', '', '6akfqrafvnsgege74hupkp09b6', NULL),
(48, '2016-05-12 15:28:52', '', '', '77vphsm1bb4irlsgurhvf9n8d5', NULL),
(49, '2016-05-12 15:28:54', '', '', 'rlv4lrbareqppuu8ttdpmbj2n4', NULL),
(50, '2016-05-12 15:29:15', '', '', 'hbg8tl4kv4ccn9u797vbhih766', NULL),
(51, '2016-05-12 15:31:41', '', '', 'r0krk9fgrthvbegfugji2as766', NULL),
(52, '2016-05-12 15:31:43', '', '', 'kc4kf9r4pmratvf3agu6e6drd7', NULL),
(53, '2016-05-12 15:32:04', '', '', 'c2ajio25m3jdv3egojns1hoo14', NULL),
(54, '2016-05-12 15:43:33', '', '', '7ga76joc7d29ij68tkvmg9m6a0', NULL),
(55, '2016-05-12 16:02:08', '', '', 'ao3tudku4btvmlm4nk4lphgbg4', NULL),
(56, '2016-05-12 23:28:36', 'admin', 'admin', '5i8m1v77t4i1hitnsjq6e7n8k7', NULL),
(57, '2016-05-12 23:29:12', '', '', 's6uk3r2r6a4tltpisqnni8h900', NULL),
(58, '2016-05-12 23:29:27', '', '', '06uh3kmjpkmhn3o1dfdtf8ic11', NULL),
(59, '2016-05-13 01:14:55', 'admin', 'admin', '5i8m1v77t4i1hitnsjq6e7n8k7', NULL),
(60, '2016-05-13 01:15:12', '', '', '9o6gi2m4hpcgdul6v756811gr4', NULL),
(61, '2016-05-13 01:18:36', 'admin', 'admin', '5i8m1v77t4i1hitnsjq6e7n8k7', NULL),
(62, '2016-05-13 01:18:54', 'admin', 'admin', '5i8m1v77t4i1hitnsjq6e7n8k7', NULL),
(63, '2016-05-13 01:18:58', '', '', '0bltselpbirop5vj06qs2lo234', NULL),
(64, '2016-05-13 02:55:19', 'oper1', 'operator', '5i8m1v77t4i1hitnsjq6e7n8k7', NULL),
(65, '2016-05-13 03:00:09', 'admin', 'admin', '5i8m1v77t4i1hitnsjq6e7n8k7', NULL),
(66, '2016-05-13 03:00:35', 'admin', 'admin', '5i8m1v77t4i1hitnsjq6e7n8k7', NULL),
(67, '2016-05-13 07:23:15', 'admin', 'admin', '5i8m1v77t4i1hitnsjq6e7n8k7', NULL),
(68, '2016-05-13 10:15:54', '', '', 'vg7noljsepma9stquj9hd5jpf5', NULL),
(69, '2016-05-13 10:15:57', '', '', 't0uq4t7n5nd62uim595sfm3gn4', NULL),
(70, '2016-05-13 11:30:14', 'admin', 'admin', 't0uq4t7n5nd62uim595sfm3gn4', NULL),
(71, '2016-05-14 03:16:51', 'admin', 'admin', 'bva0aif6hbl0f71c2pioc7pop2', NULL),
(72, '2016-05-15 02:20:40', 'admin', 'admin', 'aj8784f0k60evnquv58nsjt6c4', NULL),
(73, '2016-05-18 14:47:41', 'admin', 'admin', '7c0gasadvojo1d10ral1k9ng54', NULL),
(74, '2016-05-19 11:09:53', '', '', 'fqbu842s9jgariddon05ln4m06', NULL),
(75, '2016-05-19 11:09:55', '', '', 'ljfntk67nv1rto02gpog2v3pd0', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL,
  `address` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `stores`
--

INSERT INTO `stores` (`id`, `name`, `address`, `fullname`, `phone`) VALUES
(1, 'МАГАЗИН 2', 'ул. Буровая д.25 рынок "На Буровой"', '444', '8-909-337-09-05'),
(2, 'МАГАЗИН 1', 'ул. Буровая д.25 рынок "На Буровой"', '123', '8-909-337-09-05'),
(3, 'МАГАЗИН 2', 'проспект Строителей, 14', 'Петрова Галина Анатольевна', '38-05-82');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `email` varchar(63) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role` varchar(63) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', '', '8c3a76f947d5f745b6cb57baab3765a48ab2f0a5c26e77aceacceb5ff138ddf7', 'admin'),
(2, 'operator', '', '98b0dbcb1648c34538ab711a0a34b2d169748a2986b440cf8c4338550b802364', 'operator'),
(4, 'oper1', '', NULL, 'operator'),
(5, 'oper2', '', NULL, 'operator'),
(6, 'oper3', '', NULL, 'operator'),
(13, 'der', '', '95162ebbed2fcff50f017d8750d445490dae9a34ef30f703b52e88e65405556f', 'operator'),
(14, 'ser', '', '01749ab9c7ddc5e783307ccf381f0cfabdf2a33bea2102fcc3e53fe77034e3ae', 'operator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
