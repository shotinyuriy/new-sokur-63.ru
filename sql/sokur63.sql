-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 22 2016 г., 16:20
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
('podarki', 'Подарки', NULL, 1, 0, NULL),
('torty', 'Торты', NULL, 16, 1, 'torty.jpg'),
('pirozhnye', 'Пирожные', NULL, 17, 1, 'pirozhnye.jpg'),
('makaroni', 'Макарони', 'pirozhnye', 18, 1, 'makaroni.jpg'),
('vypechnye-izdeliya', 'Выпечные изделия', NULL, 19, 1, 'vypechnye-izdeliya.jpg'),
('tvorozhnoe-kol-co', 'Творожное кольцо', 'vypechnye-izdeliya', 20, 1, 'tvorozhnoe-kol-co.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(63) NOT NULL,
  `fullname` varchar(63) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`),
  KEY `good_category_fk` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `category_id`, `description`, `sort_index`, `menu_visible`, `image_url`, `kcal_per_100g`, `shelf_life_unpack`, `shelf_life_pack`, `standard`) VALUES
('podarki_diskontnaya-karta-10', 'Дисконтная карта 10%', 'podarki', 'Дисконтная карта со скидкой 10%', 1, 0, 'podarki_diskontnaya-karta-10.png', 0, NULL, NULL, NULL),
('podarki_teyshoku', 'Эклеры', 'podarki', 'Тесто, шоколад, крем', 1, 0, 'podarki_teyshoku.jpg', 98, NULL, NULL, NULL),
('asdasfsa_fsdfsf', 'fsdfsf', 'asdasfsa', 'sfsdfa', 146, 1, NULL, 123, NULL, NULL, NULL),
('podarki_sok-1l', 'Сок 1л', 'podarki', 'любой сок на выбор', 1, 0, 'podarki_sok-1l.jpg', 0, NULL, NULL, NULL),
('podarki_shampanskoe', 'Шампанское', 'podarki', '', 1, 0, 'podarki_shampanskoe.jpg', 1, NULL, NULL, NULL),
('torty_tryufel', 'Трюфель', 'torty', 'Шоколадно - сливочный торт с конфетами &quot;Трюфель&quot;.', 132, 1, 'torty_tryufel.jpg', 235, NULL, NULL, NULL),
('torty_chiz-keyk-quot-mango-marakuyya-quot', 'Чиз-кейк &quot;Манго-маракуйя&quot;', 'torty', 'Сырно-творожная масса в сочетании  с пюре манго и пюре маракуйя на тонкой песочной основе с добавлением мёда. Торт покрыт гелем &quot;Маракуйя&quot; с косточками', 133, 1, 'torty_chiz-keyk-quot-mango-marakuyya-quot.jpg', 325, NULL, NULL, NULL),
('torty_ksav-er', 'Ксавьер', 'torty', 'Песочная корзиночка с орехами и карамелью.', 134, 1, 'torty_ksav-er.jpg', 300, NULL, NULL, NULL),
('pirozhnye_assorti', 'Ассорти', 'pirozhnye', 'Ассорти из муссовых пирожных.', 135, 1, 'pirozhnye_assorti.jpg', 160, NULL, NULL, NULL),
('pirozhnye_estrelli', 'Эстрелли', 'pirozhnye', 'Ореховое безе и ореховый заварной крем - ничего лишнего.', 136, 1, 'pirozhnye_estrelli.jpg', 234, NULL, NULL, NULL),
('pirozhnye_opera', 'Опера', 'pirozhnye', 'Миндальный бисквит, кофейный крем и шоколад.', 137, 1, 'pirozhnye_opera.jpg', 345, NULL, NULL, NULL),
('pirozhnye_keksy', 'Кексы', 'pirozhnye', 'Миндальный бисквит, кофейный крем и шоколад.', 138, 1, 'pirozhnye_keksy.png', 236, NULL, NULL, NULL),
('pirozhnye_profitroli-shokoladnye', 'Профитроли шоколадные', 'pirozhnye', 'Профитроли с шоколадным вкусом.', 139, 1, 'pirozhnye_profitroli-shokoladnye.jpg', 179, NULL, NULL, NULL),
('makaroni_makaroni-shokoladnye', 'Макарони шоколадные', 'makaroni', 'Миндально-шоколадное безе с воздушным кремом.', 140, 1, 'makaroni_makaroni-shokoladnye.jpg', 179, NULL, NULL, NULL),
('makaroni_quot-makaroni-assorti-quot-mini', '&quot;Макарони ассорти&quot; мини', 'makaroni', 'Пять ярких и необычных сочетаний макарони в одном наборе.', 141, 1, 'makaroni_quot-makaroni-assorti-quot-mini.jpg', 456, NULL, NULL, NULL),
('vypechnye-izdeliya_maffin-s-izyumom', 'Маффин с изюмом', 'vypechnye-izdeliya', 'Воздушный маффин с добавлением изюма.', 142, 1, 'vypechnye-izdeliya_maffin-s-izyumom.jpg', 234, NULL, NULL, NULL),
('vypechnye-izdeliya_shtrudel', 'Штрудель', 'vypechnye-izdeliya', 'Тонкое пресное тесто с начинкой из миндальной муки, яблок, изюма и корицы. Штрудель покрыт сахарной пудрой.', 143, 1, 'vypechnye-izdeliya_shtrudel.jpg', 124, NULL, NULL, NULL),
('tvorozhnoe-kol-co_tvorozhno-malinovoe-kol-co', 'Творожно-малиновое кольцо', 'tvorozhnoe-kol-co', 'Заварное тесто с творогом и малиной.', 144, 1, 'tvorozhnoe-kol-co_tvorozhno-malinovoe-kol-co.jpg', 234, NULL, NULL, NULL),
('tvorozhnoe-kol-co_tvorozhno-abrikosovoe-kol-co', 'Творожно-абрикосовое кольцо', 'tvorozhnoe-kol-co', 'Сочетание абрикоса, творога и заварного теста.', 145, 1, 'tvorozhnoe-kol-co_tvorozhno-abrikosovoe-kol-co.jpg', 134, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `image_url` varchar(256) DEFAULT NULL,
  `menu_visible` tinyint(4) DEFAULT NULL,
  `expires_on` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image_url`, `menu_visible`, `expires_on`) VALUES
(0, 'Новость 13423', 'sdfgsdgds gds gds gds sd gds dsfsfdfsdfsdggfdhh fh fd hretr wedsrers', '0.jpg', 1, '0000-00-00'),
(1, 'Новость 2', 'Описание новости №2', '1.jpg', 1, '0000-00-00'),
(2, '421412', 'gsdgsdgsdg 3 233fwef2', '2.jpg', 1, NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

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
(14, '2016-05-13 11:29:11', '9876543212', 'Юрий', 'Московская, д. 23', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `portion_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '1',
  `cost` decimal(18,6) NOT NULL DEFAULT '0.000000',
  PRIMARY KEY (`id`),
  KEY `order_detail_order_fk` (`order_id`),
  KEY `order_detail_portion_fk` (`portion_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Дамп данных таблицы `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `portion_id`, `amount`, `cost`) VALUES
(1, 1, 2, 1, '119.000000'),
(2, 1, 1, 1, '147.000000'),
(3, 2, 6, 3, '1221.000000'),
(4, 2, 4, 5, '855.000000'),
(5, 2, 2, 1, '119.000000'),
(6, 2, 3, 2, '386.000000'),
(7, 3, 2, 4, '476.000000'),
(8, 3, 1, 3, '441.000000'),
(9, 3, 4, 3, '513.000000'),
(10, 3, 3, 1, '193.000000'),
(11, 4, 4, 1, '171.000000'),
(12, 4, 3, 1, '193.000000'),
(13, 5, 2, 1, '119.000000'),
(14, 5, 1, 1, '147.000000'),
(15, 5, 4, 1, '171.000000'),
(16, 6, 32, 10, '1700.000000'),
(17, 7, 33, 10, '1800.000000'),
(18, 0, 3, 8, '1080.000000'),
(19, 0, 30, 2, '640.000000'),
(20, 0, 31, 2, '600.000000'),
(21, 0, 30, 2, '640.000000'),
(22, 0, 31, 2, '600.000000'),
(23, 0, 30, 2, '640.000000'),
(24, 0, 31, 2, '600.000000'),
(25, 0, 30, 2, '640.000000'),
(26, 0, 31, 2, '600.000000'),
(27, 0, 30, 2, '640.000000'),
(28, 0, 31, 2, '600.000000'),
(29, 8, 30, 2, '640.000000'),
(30, 8, 31, 2, '600.000000'),
(31, 9, 30, 2, '640.000000'),
(32, 9, 31, 2, '600.000000'),
(33, 10, 4, 11, '1980.000000'),
(34, 11, 6, 12, '540.000000'),
(35, 11, 30, 7, '2240.000000'),
(36, 0, 2, 2, '238.000000'),
(37, 0, 6, 9, '405.000000'),
(38, 12, 146, 6, '2622.000000'),
(39, 13, 146, 9, '3933.000000'),
(40, 13, 147, 7, '2555.000000'),
(41, 13, 148, 7, '1939.000000'),
(42, 13, 151, 7, '2625.000000'),
(43, 14, 156, 14, '2030.000000');

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
-- Структура таблицы `portions`
--

CREATE TABLE IF NOT EXISTS `portions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `good_id` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `gramms` int(11) NOT NULL DEFAULT '0',
  `milliliters` int(11) NOT NULL DEFAULT '0',
  `price` decimal(18,6) NOT NULL DEFAULT '0.000000',
  `menu_visible` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `good_id` (`good_id`,`amount`,`gramms`,`milliliters`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=165 ;

--
-- Дамп данных таблицы `portions`
--

INSERT INTO `portions` (`id`, `good_id`, `amount`, `gramms`, `milliliters`, `price`, `menu_visible`) VALUES
(1, 'duykan-kani', 1, 100, 0, '147.000000', 1),
(2, 'duykan-kuro', 1, 100, 0, '119.000000', 1),
(3, 'roll-syake', 6, 105, 0, '135.000000', 1),
(4, 'roll-unagi', 6, 110, 0, '180.000000', 1),
(5, 'susi-ebi', 1, 35, 0, '60.000000', 1),
(6, 'susi-syake', 1, 35, 0, '45.000000', 1),
(7, 'susi_unagi', 1, 35, 0, '60.000000', 1),
(9, 'podarki_teyshoku', 5, 210, 0, '0.000000', 1),
(10, 'podarki_sok-1l', 1, 0, 1000, '0.000000', 1),
(11, 'podarki_diskontnaya-karta-10', 1, 0, 0, '0.000000', 1),
(12, 'podarki_shampanskoe', 1, 0, 0, '0.000000', 1),
(13, 'duykans_ikura', 1, 30, 0, '65.000000', 1),
(14, 'duykans_susi-filadel-fiya', 1, 30, 0, '65.000000', 1),
(15, 'salaty_kayso-sarado', 1, 150, 0, '150.000000', 1),
(16, 'salaty_kadi-cha', 1, 150, 0, '95.000000', 1),
(17, 'salaty_glamur', 1, 150, 0, '160.000000', 1),
(18, 'zakuski_myasnoe-assorti', 1, 150, 0, '180.000000', 1),
(19, 'zakuski_kol-ca-kal-marov', 7, 100, 0, '120.000000', 1),
(20, 'zakuski_krevetki-k-pivu', 1, 160, 0, '190.000000', 1),
(21, 'pervye-blyuda_solyanka-myasnaya', 1, 400, 0, '150.000000', 1),
(22, 'pervye-blyuda_domashnyaya-lapsha', 1, 400, 0, '110.000000', 1),
(23, 'pervye-blyuda_bangkok', 1, 400, 0, '135.000000', 1),
(24, 'goryachie-blyuda_yaki-soba', 1, 200, 0, '140.000000', 1),
(25, 'goryachie-blyuda_esenabi', 1, 200, 0, '140.000000', 1),
(26, 'goryachie-blyuda_karbonaro', 1, 200, 0, '170.000000', 1),
(27, 'uzbekskaya-kuznya_lagman', 1, 300, 0, '120.000000', 1),
(28, 'uzbekskaya-kuznya_shurpa-uzbekskaya', 1, 300, 0, '150.000000', 1),
(29, 'uzbekskaya-kuznya_plov', 1, 300, 0, '120.000000', 1),
(30, 'picca_s-govyadinoy-ostraya', 1, 600, 0, '320.000000', 1),
(31, 'picca_s-moreproduktami', 1, 600, 0, '300.000000', 1),
(32, 'zharenye-rolly_boston-roll', 8, 170, 0, '170.000000', 1),
(33, 'zharenye-rolly_goryachiy-roll', 8, 215, 0, '180.000000', 1),
(34, 'mangal_vyrezka-govyazh-ya', 1, 0, 0, '180.000000', 1),
(35, 'susi_hotate', 1, 35, 0, '80.000000', 1),
(36, 'susi_tay', 1, 30, 0, '40.000000', 1),
(37, 'duykans_chuka', 1, 30, 0, '55.000000', 1),
(38, 'duykans_spaysi-kani', 1, 30, 0, '75.000000', 1),
(39, 'duykans_spaysi-unagi', 1, 30, 0, '75.000000', 1),
(40, 'duykans_spaysi-syake', 1, 30, 0, '70.000000', 1),
(41, 'duykans_spaysi-maguro', 1, 30, 0, '75.000000', 1),
(42, 'duykans_tobiko', 1, 1, 0, '55.000000', 1),
(43, 'duykans_vasabiko', 1, 30, 0, '55.000000', 1),
(44, 'rolls_yasay-roll', 8, 125, 0, '150.000000', 1),
(45, 'rolls_kappa-maki', 6, 105, 0, '90.000000', 1),
(46, 'rolls_tekka-roll', 6, 105, 0, '160.000000', 1),
(47, 'rolls_ebi-roll', 6, 105, 0, '160.000000', 1),
(48, 'rolls_teyshoku', 6, 120, 0, '165.000000', 1),
(49, 'rolls_piramida-roll', 6, 190, 0, '160.000000', 1),
(50, 'rolls_ika-ebi-maki', 8, 175, 0, '195.000000', 1),
(51, 'rolls_vulkan', 8, 255, 0, '190.000000', 1),
(52, 'rolls_tori-spays', 8, 220, 0, '145.000000', 1),
(53, 'rolls_lava-maki', 8, 230, 0, '190.000000', 1),
(54, 'rolls_futo-maki', 8, 165, 0, '155.000000', 1),
(55, 'rolls_evraziya-roll', 10, 240, 0, '500.000000', 1),
(56, 'rolls_tokado', 8, 195, 0, '185.000000', 1),
(57, 'rolls_yodzhi', 8, 250, 0, '295.000000', 1),
(58, 'rolls_acuy-maki', 8, 160, 0, '165.000000', 1),
(59, 'rolls_bimi-roll', 6, 210, 0, '205.000000', 1),
(60, 'rolls_segun-maki', 8, 220, 0, '295.000000', 1),
(61, 'rolls_okinava-maki', 8, 240, 0, '255.000000', 1),
(62, 'rolls_kurimu-unagi', 8, 160, 0, '145.000000', 1),
(63, 'rolls_hokkaydo-maki', 8, 220, 0, '245.000000', 1),
(64, 'rolls_kaliforniya-maki', 8, 200, 0, '275.000000', 1),
(65, 'rolls_tay-spaysi', 6, 170, 0, '140.000000', 1),
(66, 'rolls_syake-spaysi', 6, 170, 0, '160.000000', 1),
(67, 'rolls_maguro-spaysi', 6, 170, 0, '180.000000', 1),
(68, 'rolls_drakon-maki', 8, 200, 0, '195.000000', 1),
(69, 'rolls_royal-filadel-fiya', 8, 250, 0, '285.000000', 1),
(70, 'rolls_kado-maki', 6, 200, 0, '185.000000', 1),
(71, 'rolls_aysberg', 8, 200, 0, '280.000000', 1),
(72, 'rolls_himavari-maki', 6, 260, 0, '305.000000', 1),
(73, 'rolls_kaydzhi-maki', 8, 220, 0, '170.000000', 1),
(74, 'rolls_akay-maki', 1, 310, 0, '395.000000', 1),
(75, 'rolls_fusion', 1, 370, 0, '500.000000', 1),
(76, 'rolls_iskushenie', 8, 195, 0, '140.000000', 1),
(77, 'rolls_nezhnyy', 8, 130, 0, '175.000000', 1),
(78, 'rolls_veneciya', 8, 0, 0, '195.000000', 1),
(79, 'rolls_hitoshi', 6, 175, 0, '175.000000', 1),
(80, 'rolls_totigi', 6, 195, 0, '145.000000', 1),
(81, 'rolls_ikura-maki', 6, 215, 0, '170.000000', 1),
(82, 'rolls_grin-roll', 6, 210, 0, '140.000000', 1),
(83, 'rolls_domashniy', 6, 205, 0, '240.000000', 1),
(84, 'rolls_tokio-maki', 8, 200, 0, '165.000000', 1),
(85, 'zharenye-rolly_roll-evropa', 8, 160, 0, '170.000000', 1),
(86, 'zharenye-rolly_unagi-tempura', 10, 300, 0, '170.000000', 1),
(87, 'zharenye-rolly_higari-roru', 6, 260, 0, '170.000000', 1),
(88, 'zharenye-rolly_makedoniya', 10, 270, 0, '170.000000', 1),
(89, 'zharenye-rolly_ital-yanskiy', 8, 195, 0, '170.000000', 1),
(90, 'zharenye-rolly_francuzskiy', 8, 270, 0, '170.000000', 1),
(91, 'zharenye-rolly_umino-roll', 8, 220, 0, '190.000000', 1),
(92, 'zharenye-rolly_sakura', 8, 162, 0, '170.000000', 1),
(93, 'zharenye-rolly_geysha', 10, 10, 0, '170.000000', 1),
(94, 'zharenye-rolly_inari', 10, 255, 0, '170.000000', 1),
(95, 'mangal_shashlyk-iz-baraniny', 1, 0, 0, '120.000000', 1),
(96, 'mangal_shashlyk-iz-svininy', 1, 0, 0, '80.000000', 1),
(97, 'mangal_semga', 1, 0, 0, '150.000000', 1),
(98, 'mangal_kefal-chernomorskaya', 1, 0, 0, '90.000000', 1),
(99, 'mangal_cyplenok', 1, 0, 0, '60.000000', 1),
(100, 'mangal_kryl-ya-kurinye', 1, 0, 0, '50.000000', 1),
(101, 'mangal_rebryshki-baran-i', 1, 0, 0, '120.000000', 1),
(102, 'mangal_rebryshki-svinnye', 1, 0, 0, '70.000000', 1),
(103, 'mangal_pomidor', 1, 0, 0, '50.000000', 1),
(104, 'mangal_baklazhan', 1, 0, 0, '50.000000', 1),
(105, 'mangal_perec-bolgarskiy', 1, 0, 0, '50.000000', 1),
(106, 'mangal_shampin-ony', 1, 0, 0, '50.000000', 1),
(107, 'mangal_kartofel', 1, 0, 0, '40.000000', 1),
(108, 'picca_cezar', 1, 600, 0, '270.000000', 1),
(109, 'picca_s-vetchinoy-i-gribami', 1, 600, 0, '270.000000', 1),
(110, 'picca_s-kurichec-i-baklazhanami', 1, 600, 0, '270.000000', 1),
(111, 'picca_s-salyami-i-gribami', 1, 600, 0, '270.000000', 1),
(112, 'picca_assorti-myasnaya', 1, 600, 0, '270.000000', 1),
(113, 'picca_4-sezona', 1, 600, 0, '270.000000', 1),
(114, 'picca_4-syra', 1, 600, 0, '270.000000', 1),
(115, 'picca_margarita', 1, 600, 0, '270.000000', 1),
(116, 'ris-lapsha_lapsha-ruchnoy-raboty', 1, 0, 0, '120.000000', 1),
(117, 'ris-lapsha_lapsha-grechnevaya', 1, 0, 0, '120.000000', 1),
(118, 'ris-lapsha_yaichnaya', 1, 0, 0, '120.000000', 1),
(119, 'ris-lapsha_lapsha-steklyannaya', 1, 0, 0, '120.000000', 1),
(120, 'ris-lapsha_lapsha-pshenichnaya', 1, 0, 0, '120.000000', 1),
(121, 'ris-lapsha_ris', 1, 300, 0, '120.000000', 1),
(122, 'sousy_kislo-sladkiy', 1, 0, 0, '20.000000', 1),
(123, 'sousy_slivochnyy', 1, 0, 0, '20.000000', 1),
(124, 'sousy_ustrichnyy', 1, 0, 0, '20.000000', 1),
(125, 'sousy_teriyaki', 1, 0, 0, '20.000000', 1),
(126, 'sousy_kimchi', 1, 0, 0, '20.000000', 1),
(127, 'dopolnitel-no_govyadina', 1, 0, 0, '85.000000', 1),
(128, 'dopolnitel-no_svinina', 1, 0, 0, '65.000000', 1),
(129, 'dopolnitel-no_kurica', 1, 0, 0, '45.000000', 1),
(130, 'dopolnitel-no_bekon', 1, 0, 0, '70.000000', 1),
(131, 'dopolnitel-no_semga', 1, 0, 0, '80.000000', 1),
(132, 'dopolnitel-no_kal-mar', 1, 0, 0, '55.000000', 1),
(133, 'dopolnitel-no_krevetki', 1, 0, 0, '85.000000', 1),
(134, 'dopolnitel-no_midii', 1, 0, 0, '70.000000', 1),
(135, 'dopolnitel-no_moreprodukty', 1, 0, 0, '85.000000', 1),
(136, 'dopolnitel-no_ugor', 1, 0, 0, '90.000000', 1),
(137, 'zapechennye_banzay', 6, 170, 0, '170.000000', 1),
(138, 'zapechennye_s-bekonom', 6, 180, 0, '200.000000', 1),
(139, 'zapechennye_kanzas', 6, 240, 0, '250.000000', 1),
(140, 'zapechennye_s-semgoy', 6, 250, 0, '240.000000', 1),
(141, 'zapechennye_mayami', 6, 235, 0, '220.000000', 1),
(142, 'zapechennye_siciliya', 8, 290, 0, '280.000000', 1),
(143, 'torty_tryufel', 1, 420, 0, '250.000000', 1),
(144, 'torty_chiz-keyk-quot-mango-marakuyya-quot', 1, 310, 0, '399.000000', 1),
(145, 'torty_ksav-er', 1, 450, 0, '560.000000', 1),
(146, 'pirozhnye_assorti', 4, 367, 0, '437.000000', 1),
(147, 'pirozhnye_estrelli', 1, 345, 0, '365.000000', 1),
(148, 'pirozhnye_opera', 1, 386, 0, '277.000000', 1),
(149, 'pirozhnye_keksy', 10, 500, 0, '3000.000000', 1),
(150, 'pirozhnye_profitroli-shokoladnye', 1, 100, 0, '56.000000', 1),
(151, 'pirozhnye_keksy', 1, 100, 0, '375.000000', 1),
(152, 'makaroni_makaroni-shokoladnye', 5, 358, 0, '245.000000', 1),
(153, 'makaroni_quot-makaroni-assorti-quot-mini', 12, 890, 0, '1450.000000', 1),
(154, 'vypechnye-izdeliya_maffin-s-izyumom', 5, 456, 0, '560.000000', 1),
(155, 'vypechnye-izdeliya_shtrudel', 1, 345, 0, '150.000000', 1),
(156, 'tvorozhnoe-kol-co_tvorozhno-malinovoe-kol-co', 1, 134, 0, '145.000000', 1),
(157, 'tvorozhnoe-kol-co_tvorozhno-abrikosovoe-kol-co', 1, 310, 0, '155.000000', 1),
(158, 'eklery_elite', 1, 135, 0, '160.000000', 1),
(159, 'eklery_eklery', 5, 456, 0, '345.000000', 1),
(160, 'novaya-podkategoriya_novyy-tovar', 2, 400, 0, '200.000000', 1),
(162, 'asdasfsa_fsdfsf', 1, 234, 0, '123.000000', 1);

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
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `login` varchar(64) NOT NULL,
  `email` varchar(63) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role` varchar(63) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `role`) VALUES
(1, 'admin', '', NULL, 'admin'),
(2, 'operator', '', NULL, 'operator'),
(4, 'oper1', '', NULL, 'operator'),
(5, 'oper2', '', NULL, 'operator'),
(6, 'oper3', '', NULL, 'operator'),
(8, 'super', '', 'f59cdcfe137ffc74da8768124ecd5c98c8cac28ff8e38e5bc543aa2294dd331d', 'admin'),
(9, 'super2', '', 'f59cdcfe137ffc74da8768124ecd5c98c8cac28ff8e38e5bc543aa2294dd331d', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
