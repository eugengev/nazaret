-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 23 2018 г., 19:00
-- Версия сервера: 5.6.38
-- Версия PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rybolov_nazaret`
--

-- --------------------------------------------------------

--
-- Структура таблицы `adress_client`
--

CREATE TABLE `adress_client` (
  `id` int(11) NOT NULL,
  `firma_id` int(11) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `oblast` varchar(100) NOT NULL,
  `raion` varchar(100) NOT NULL,
  `t_pynkt` varchar(10) NOT NULL,
  `pynkt` varchar(100) NOT NULL,
  `t_street` varchar(10) NOT NULL,
  `street` varchar(100) NOT NULL,
  `dom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `adress_firm`
--

CREATE TABLE `adress_firm` (
  `id` int(11) NOT NULL,
  `firma_id` int(11) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `oblast` varchar(100) NOT NULL,
  `raion` varchar(100) NOT NULL,
  `t_pynkt` varchar(10) NOT NULL,
  `pynkt` varchar(100) NOT NULL,
  `t_street` varchar(10) NOT NULL,
  `street` varchar(100) NOT NULL,
  `dom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `banki`
--

CREATE TABLE `banki` (
  `id` int(11) NOT NULL,
  `firm_id` int(11) NOT NULL,
  `mfo` varchar(6) NOT NULL,
  `ras` varchar(16) NOT NULL,
  `bank` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `maino`
--

CREATE TABLE `maino` (
  `id` int(11) NOT NULL,
  `reestr_id` int(11) NOT NULL,
  `vid_id` int(11) NOT NULL,
  `opis` varchar(200) NOT NULL,
  `count` int(11) NOT NULL,
  `price` float NOT NULL,
  `vartist` float NOT NULL,
  `vikon` int(11) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `maino`
--

INSERT INTO `maino` (`id`, `reestr_id`, `vid_id`, `opis`, `count`, `price`, `vartist`, `vikon`, `status`) VALUES
(2, 40, 2, 'Авто', 4, 100, 2000, 4, 'n'),
(3, 40, 3, 'квартира', 3, 200, 1200, 3, 'n'),
(4, 40, 9, 'Земля', 10, 100, 3500, 4, 'n'),
(5, 40, 1, 'тратратра', 56, 600, 19600, 3, 'n'),
(6, 40, 3, 'тут', 56, 512, 56, 4, 'n'),
(7, 40, 1, 'Квартира', 2, 50, 1000, 16, 'n'),
(8, 111, 2, '1', 1, 700, 500, 16, 'n'),
(9, 111, 3, '2', 2, 800, 800, 4, 'n');

-- --------------------------------------------------------

--
-- Структура таблицы `maino_file`
--

CREATE TABLE `maino_file` (
  `id` int(11) NOT NULL,
  `reestr_id` int(11) NOT NULL,
  `maino_id` int(11) NOT NULL,
  `file_pach` varchar(500) NOT NULL,
  `type` varchar(1) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `maino_file`
--

INSERT INTO `maino_file` (`id`, `reestr_id`, `maino_id`, `file_pach`, `type`, `name`) VALUES
(23, 40, 2, '/uploads/40/2/Roboto-BlackItalic.ttf', 't', 'Roboto-BlackItalic.ttf'),
(24, 40, 2, '/uploads/40/2/Roboto-Bold.ttf', 't', 'Roboto-Bold.ttf'),
(25, 40, 2, '/uploads/40/2/Roboto-BoldItalic.ttf', 't', 'Roboto-BoldItalic.ttf'),
(26, 40, 2, '/uploads/40/2/Roboto-Italic.ttf', 't', 'Roboto-Italic.ttf'),
(27, 40, 2, '/uploads/40/2/Roboto-Light.ttf', 't', 'Roboto-Light.ttf'),
(28, 40, 2, '/uploads/40/2/Roboto-LightItalic.ttf', 't', 'Roboto-LightItalic.ttf'),
(29, 40, 2, '/uploads/40/2/Roboto-Medium.ttf', 't', 'Roboto-Medium.ttf'),
(30, 40, 2, '/uploads/40/2/Roboto-MediumItalic.ttf', 't', 'Roboto-MediumItalic.ttf'),
(31, 40, 2, '/uploads/40/2/Roboto-Regular.ttf', 't', 'Roboto-Regular.ttf'),
(32, 40, 2, '/uploads/40/2/Roboto-Thin.ttf', 't', 'Roboto-Thin.ttf'),
(33, 40, 2, '/uploads/40/2/Roboto-ThinItalic.ttf', 't', 'Roboto-ThinItalic.ttf'),
(34, 40, 3, '/uploads/40/3/Exo2.0-Black.otf', 't', 'Exo2.0-Black.otf'),
(35, 40, 3, '/uploads/40/3/Exo2.0-BlackItalic.otf', 't', 'Exo2.0-BlackItalic.otf'),
(36, 40, 2, '/uploads/40/2/Exo2.0-MediumItalic.otf', 'b', 'Exo2.0-MediumItalic.otf'),
(37, 40, 2, '/uploads/40/2/Exo2.0-Regular.otf', 'b', 'Exo2.0-Regular.otf'),
(38, 40, 2, '/uploads/40/2/Exo2.0-SemiBold.otf', 'b', 'Exo2.0-SemiBold.otf'),
(39, 40, 2, '/uploads/40/2/Exo2.0-SemiBoldItalic.otf', 'b', 'Exo2.0-SemiBoldItalic.otf'),
(40, 40, 2, '/uploads/40/2/Exo2.0-Thin.otf', 'b', 'Exo2.0-Thin.otf'),
(41, 40, 2, '/uploads/40/2/Exo2.0-ThinItalic.otf', 'b', 'Exo2.0-ThinItalic.otf');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id_from` int(11) NOT NULL,
  `user_id_to` int(11) NOT NULL,
  `message` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `user_id_from`, `user_id_to`, `message`, `parent_id`, `status`, `date`, `time`, `timestamp`) VALUES
(1, 7, 3, 'Тут какойто очень большой текст дя проверки Тут какойто очень большой текст дя проверки Тут какойто очень большой текст дя проверки Тут какойто очень большой текст дя проверки Тут какойто очень большой текст дя проверки Тут какойто очень большой текст дя проверки Тут какойто очень большой текст дя проверки   Тут какойто очень большой текст дя проверки', 0, 1, '2018-02-14', '00:00:00', '2018-02-15 21:13:29'),
(2, 3, 7, 'тест2', 1, 0, '2018-02-14', '00:00:00', '2018-02-15 21:13:29'),
(5, 3, 3, 'fdsfsdff saf asdf asdf', 1, 0, '0000-00-00', '00:00:00', '2018-02-15 21:13:29'),
(6, 3, 5, 'sdfs sdf sdfsdf sdf sdfsdf s', 0, 0, '0000-00-00', '00:00:00', '2018-02-15 21:13:29'),
(7, 3, 7, 'dsfsdff saf asdf asdf', 5, 0, '2018-02-16', '00:00:00', '2018-02-15 21:13:29'),
(8, 3, 16, '', 0, 0, '2018-02-19', '02:59:30', '2018-02-19 11:59:30'),
(9, 3, 16, '', 0, 0, '2018-02-19', '02:59:46', '2018-02-19 11:59:46'),
(10, 3, 3, '', 0, 0, '2018-02-19', '03:00:08', '2018-02-19 12:00:08');

-- --------------------------------------------------------

--
-- Структура таблицы `reestr`
--

CREATE TABLE `reestr` (
  `id` int(11) NOT NULL,
  `nomber` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `adress` varchar(200) NOT NULL,
  `prev_id` int(11) NOT NULL,
  `firma_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `meta_id` int(11) DEFAULT NULL,
  `datework` date DEFAULT NULL,
  `nomer_act` varchar(5) NOT NULL,
  `date_act` date NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reestr`
--

INSERT INTO `reestr` (`id`, `nomber`, `date`, `client_id`, `bank_id`, `city_id`, `adress`, `prev_id`, `firma_id`, `manager_id`, `meta_id`, `datework`, `nomer_act`, `date_act`, `status`) VALUES
(31, 'й1', '2001-01-20', 2, 1, 2, '', 0, 2, 1, 0, '0000-00-00', '', '0000-00-00', 'n'),
(32, 'q1', '2018-01-01', 2, 2, 1, '', 0, 1, 2, 0, '0000-00-00', '', '0000-00-00', 'n'),
(33, 'Евгений Гу', '2018-01-17', 3, 1, 16, '', 0, 1, 1, 3, '0000-00-00', '', '0000-00-00', 'n'),
(34, 'q1', '2018-02-08', 1, 3, 1, '', 0, 1, 1, 3, '2018-02-14', '', '0000-00-00', 'n'),
(35, 'й2', '2018-02-08', 2, 3, 2, '', 0, 1, 2, 3, '2018-02-13', '', '0000-00-00', 'n'),
(36, 'V1', '2018-02-01', 1, 3, 17, '', 0, 16, 4, 4, '2018-02-12', '', '0000-00-00', 'n'),
(37, 'V3', '2018-02-02', 3, 2, 1, '', 0, 16, 4, 3, '2018-02-13', '', '0000-00-00', 'n'),
(38, 'V3', '2018-02-02', 1, 1, 1, '', 0, 16, 1, 4, '2018-02-02', '', '0000-00-00', 'n'),
(39, 'QW', '2018-02-14', 4, 3, 1, '', 0, 2, 1, 3, '2018-02-14', '', '0000-00-00', 'n'),
(40, 'V-4', '2018-02-13', 3, 1, 17, '', 87, 16, 4, 4, '2018-02-14', 'act-1', '2018-02-12', 'n'),
(43, 'Евгений Гу', '2018-01-17', 3, 1, 16, '', 0, 1, 1, 3, '0000-00-00', '', '0000-00-00', 'n'),
(42, 'q1', '2018-01-01', 2, 2, 1, '', 0, 1, 2, 0, '0000-00-00', '', '0000-00-00', 'n'),
(41, 'й1', '2001-01-20', 2, 1, 2, '', 0, 2, 1, 0, '0000-00-00', '', '0000-00-00', 'n'),
(44, 'q1', '2018-02-08', 1, 3, 1, '', 0, 1, 1, 3, '2018-02-14', '', '0000-00-00', 'n'),
(45, 'й2', '2018-02-08', 2, 3, 2, '', 0, 1, 2, 3, '2018-02-13', '', '0000-00-00', 'n'),
(46, 'V1', '2018-02-01', 1, 3, 17, '', 0, 16, 4, 4, '2018-02-12', '', '0000-00-00', 'n'),
(47, 'V3', '2018-02-02', 3, 2, 1, '', 0, 16, 4, 3, '2018-02-13', '', '0000-00-00', 'n'),
(48, 'V3', '2018-02-02', 1, 1, 1, '', 0, 16, 1, 4, '2018-02-02', '', '0000-00-00', 'n'),
(49, 'QW', '2018-02-14', 4, 3, 1, '', 0, 2, 1, 3, '2018-02-14', '', '0000-00-00', 'n'),
(50, 'V4', '2018-02-13', 3, 1, 17, '', 87, 16, 4, 4, '2018-02-14', 'act-1', '2018-02-12', 'n'),
(51, 'й1', '2001-01-20', 2, 1, 2, '', 0, 2, 1, 0, '0000-00-00', '', '0000-00-00', 'n'),
(52, 'q1', '2018-01-01', 2, 2, 1, '', 0, 1, 2, 0, '0000-00-00', '', '0000-00-00', 'n'),
(53, 'Евгений Гу', '2018-01-17', 3, 1, 16, '', 0, 1, 1, 3, '0000-00-00', '', '0000-00-00', 'n'),
(54, 'q1', '2018-02-08', 1, 3, 1, '', 0, 1, 1, 3, '2018-02-14', '', '0000-00-00', 'n'),
(55, 'й2', '2018-02-08', 2, 3, 2, '', 0, 1, 2, 3, '2018-02-13', '', '0000-00-00', 'n'),
(56, 'V1', '2018-02-01', 1, 3, 17, '', 0, 16, 4, 4, '2018-02-12', '', '0000-00-00', 'n'),
(57, 'V3', '2018-02-02', 3, 2, 1, '', 0, 16, 4, 3, '2018-02-13', '', '0000-00-00', 'n'),
(58, 'V3', '2018-02-02', 1, 1, 1, '', 0, 16, 1, 4, '2018-02-02', '', '0000-00-00', 'n'),
(59, 'QW', '2018-02-14', 4, 3, 1, '', 0, 2, 1, 3, '2018-02-14', '', '0000-00-00', 'n'),
(60, 'V4', '2018-02-13', 3, 1, 17, '', 87, 16, 4, 4, '2018-02-14', 'act-1', '2018-02-12', 'n'),
(61, 'й1', '2001-01-20', 2, 1, 2, '', 0, 2, 1, 0, '0000-00-00', '', '0000-00-00', 'n'),
(62, 'q1', '2018-01-01', 2, 2, 1, '', 0, 1, 2, 0, '0000-00-00', '', '0000-00-00', 'n'),
(63, 'Евгений Гу', '2018-01-17', 3, 1, 16, '', 0, 1, 1, 3, '0000-00-00', '', '0000-00-00', 'n'),
(64, 'q1', '2018-02-08', 1, 3, 1, '', 0, 1, 1, 3, '2018-02-14', '', '0000-00-00', 'n'),
(65, 'й2', '2018-02-08', 2, 3, 2, '', 0, 1, 2, 3, '2018-02-13', '', '0000-00-00', 'n'),
(66, 'V1', '2018-02-01', 1, 3, 17, '', 0, 16, 4, 4, '2018-02-12', '', '0000-00-00', 'n'),
(67, 'V3', '2018-02-02', 3, 2, 1, '', 0, 16, 4, 3, '2018-02-13', '', '0000-00-00', 'n'),
(68, 'V3', '2018-02-02', 1, 1, 1, '', 0, 16, 1, 4, '2018-02-02', '', '0000-00-00', 'n'),
(69, 'QW', '2018-02-14', 4, 3, 1, '', 0, 2, 1, 3, '2018-02-14', '', '0000-00-00', 'n'),
(70, 'V4', '2018-02-13', 3, 1, 17, '', 87, 16, 4, 4, '2018-02-14', 'act-1', '2018-02-12', 'n'),
(71, 'й1', '2001-01-20', 2, 1, 2, '', 0, 2, 1, 0, '0000-00-00', '', '0000-00-00', 'n'),
(72, 'q1', '2018-01-01', 2, 2, 1, '', 0, 1, 2, 0, '0000-00-00', '', '0000-00-00', 'n'),
(73, 'Евгений Гу', '2018-01-17', 3, 1, 16, '', 0, 1, 1, 3, '0000-00-00', '', '0000-00-00', 'n'),
(74, 'q1', '2018-02-08', 1, 3, 1, '', 0, 1, 1, 3, '2018-02-14', '', '0000-00-00', 'n'),
(75, 'й2', '2018-02-08', 2, 3, 2, '', 0, 1, 2, 3, '2018-02-13', '', '0000-00-00', 'n'),
(76, 'V1', '2018-02-01', 1, 3, 17, '', 0, 16, 4, 4, '2018-02-12', '', '0000-00-00', 'n'),
(77, 'V3', '2018-02-02', 3, 2, 1, '', 0, 16, 4, 3, '2018-02-13', '', '0000-00-00', 'n'),
(78, 'V3', '2018-02-02', 1, 1, 1, '', 0, 16, 1, 4, '2018-02-02', '', '0000-00-00', 'n'),
(79, 'QW', '2018-02-14', 4, 3, 1, '', 0, 2, 1, 3, '2018-02-14', '', '0000-00-00', 'n'),
(80, 'V4', '2018-02-13', 3, 1, 17, '', 87, 16, 4, 4, '2018-02-14', 'act-1', '2018-02-12', 'n'),
(81, 'й1', '2001-01-20', 2, 1, 2, '', 0, 2, 1, 0, '0000-00-00', '', '0000-00-00', 'n'),
(82, 'q1', '2018-01-01', 2, 2, 1, '', 0, 1, 2, 0, '0000-00-00', '', '0000-00-00', 'n'),
(83, '111 Евг', '2018-01-17', 3, 1, 16, '', 0, 1, 1, 3, '0000-00-00', '', '0000-00-00', 'n'),
(84, 'q1', '2018-02-08', 1, 3, 1, '', 0, 1, 1, 3, '2018-02-14', '', '0000-00-00', 'n'),
(85, 'й2', '2018-02-08', 2, 3, 2, '', 0, 1, 2, 3, '2018-02-13', '', '0000-00-00', 'n'),
(86, 'V1', '2018-02-01', 1, 3, 17, '', 0, 16, 4, 4, '2018-02-12', '', '0000-00-00', 'n'),
(87, 'V3', '2018-02-02', 3, 2, 1, '', 0, 16, 4, 3, '2018-02-13', '', '0000-00-00', 'n'),
(88, 'V3', '2018-02-02', 1, 1, 1, '', 0, 16, 1, 4, '2018-02-02', '', '0000-00-00', 'n'),
(89, 'QW', '2018-02-14', 4, 3, 1, '', 0, 2, 1, 3, '2018-02-14', '', '0000-00-00', 'n'),
(90, 'V4', '2018-02-13', 3, 1, 17, '', 87, 16, 4, 4, '2018-02-14', 'act-1', '2018-02-12', 'n'),
(91, 'й1', '2001-01-20', 2, 1, 2, '', 0, 2, 1, 0, '0000-00-00', '', '0000-00-00', 'n'),
(92, 'q1', '2018-01-01', 2, 2, 1, '', 0, 1, 2, 0, '0000-00-00', '', '0000-00-00', 'n'),
(93, 'Евгений Гу', '2018-01-17', 3, 1, 16, '', 0, 1, 1, 3, '0000-00-00', '', '0000-00-00', 'n'),
(94, 'q1', '2018-02-08', 1, 3, 1, '', 0, 1, 1, 3, '2018-02-14', '', '0000-00-00', 'n'),
(95, 'й2', '2018-02-08', 2, 3, 2, '', 0, 1, 2, 3, '2018-02-13', '', '0000-00-00', 'n'),
(96, 'V1', '2018-02-01', 1, 3, 17, '', 0, 16, 4, 4, '2018-02-12', '', '0000-00-00', 'n'),
(97, 'V3', '2018-02-02', 3, 2, 1, '', 0, 16, 4, 3, '2018-02-13', '', '0000-00-00', 'n'),
(98, 'V3', '2018-02-02', 1, 1, 1, '', 0, 16, 1, 4, '2018-02-02', '', '0000-00-00', 'n'),
(99, 'QW', '2018-02-14', 4, 3, 1, '', 0, 2, 1, 3, '2018-02-14', '', '0000-00-00', 'n'),
(100, 'V4', '2018-02-13', 3, 1, 17, '', 87, 16, 4, 4, '2018-02-14', 'act-1', '2018-02-12', 'n'),
(101, 'й1', '2001-01-20', 2, 1, 2, '', 0, 2, 1, 0, '0000-00-00', '', '0000-00-00', 'n'),
(102, 'q1', '2018-01-01', 2, 2, 1, '', 0, 1, 2, 0, '0000-00-00', '', '0000-00-00', 'n'),
(103, 'Евгений Гу', '2018-01-17', 3, 1, 16, '', 0, 1, 1, 3, '0000-00-00', '', '0000-00-00', 'n'),
(111, 'V5', '2018-02-18', 22, 3, 17, '', 87, 16, 4, 3, '2018-02-19', '', '0000-00-00', 'n'),
(108, 'V3', '2018-02-02', 1, 1, 1, '', 0, 16, 1, 4, '2018-02-02', '', '0000-00-00', 'n'),
(109, 'QW', '2018-02-14', 4, 3, 1, '', 0, 2, 1, 3, '2018-02-14', '', '0000-00-00', 'n'),
(110, 'V4', '2018-02-13', 3, 1, 17, '', 87, 16, 4, 4, '2018-02-14', 'act-1', '2018-02-12', 'n');

-- --------------------------------------------------------

--
-- Структура таблицы `session`
--

CREATE TABLE `session` (
  `id_user` int(5) NOT NULL,
  `code_sess` varchar(15) NOT NULL,
  `user_agent_sess` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `session`
--

INSERT INTO `session` (`id_user`, `code_sess`, `user_agent_sess`) VALUES
(2, 'KfzysMpCEp6qYJb', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.100 Safari/537.36'),
(3, 'N8mqbcLwiQ6K1VD', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.73 Safari/537.36'),
(16, 'hD5aSTdAeGIoHvg', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.51 Safari/537.36');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `name`) VALUES
(1, 'Назарет'),
(2, 'da'),
(3, 'ada');

-- --------------------------------------------------------

--
-- Структура таблицы `s_bank`
--

CREATE TABLE `s_bank` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `s_bank`
--

INSERT INTO `s_bank` (`id`, `name`) VALUES
(1, 'ПриватБанк'),
(2, 'ТаскоБанк'),
(3, 'УкрСибБанк'),
(4, 'Альфа');

-- --------------------------------------------------------

--
-- Структура таблицы `s_city`
--

CREATE TABLE `s_city` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `s_city`
--

INSERT INTO `s_city` (`id`, `name`) VALUES
(1, 'Хмельницкий'),
(2, 'Киев'),
(17, 'Харьков'),
(16, 'Хмельницкий');

-- --------------------------------------------------------

--
-- Структура таблицы `s_client`
--

CREATE TABLE `s_client` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `inn` varchar(10) NOT NULL,
  `pasport` varchar(20) NOT NULL,
  `pravforma` varchar(50) NOT NULL,
  `dir_fio` varchar(200) NOT NULL,
  `buh_fio` varchar(200) NOT NULL,
  `dover` varchar(200) NOT NULL,
  `adres1` varchar(200) NOT NULL,
  `adres2` varchar(200) NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `res` varchar(15) NOT NULL,
  `mfo` varchar(6) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `dir_role` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `s_client`
--

INSERT INTO `s_client` (`id`, `name`, `phone`, `email`, `inn`, `pasport`, `pravforma`, `dir_fio`, `buh_fio`, `dover`, `adres1`, `adres2`, `phone1`, `res`, `mfo`, `bank`, `dir_role`) VALUES
(1, 'Гуцалюк Евгений Владимирович', '0671234567', '', '', '0', '0', '', '', '', '', '', '', '', '', '', ''),
(2, 'Заказчик оди', '0671234567', '', '', '0', '0', '', '', '', '', '', '', '', '', '', ''),
(3, 'Заказчик Три', '0671234567', 'eugen127@mail.ru', '123456789', 'ФФ 123456', '0', '', '', '', '', '', '', '', '', '', ''),
(21, 'Евгений Гуцалюк', 'Евгений Гуцалюк', 'webmaster@lashesmarket.ru', 'Евгений Гу', '', 'ЗАМ', 'Евгений Гуцалюк', 'Евгений Гуцалюк', 'Евгений Гуцалюк', 'ул. Каменецкая 113', 'ул. Каменецкая 113', 'Евгений Гуцалюк', '', 'Евгени', 'Евгений Гуцалюк', ''),
(22, 'Привет', 'тлдропсчая', 'e@e', 'о', '', 'ЗАТ', 'жошрча', 'олрспча', 'ьорс', 'жрло', 'одрлап', 'жолдрмсчп', '', 'ошргпн', 'тоирмпса', '');

-- --------------------------------------------------------

--
-- Структура таблицы `s_firma`
--

CREATE TABLE `s_firma` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `autonomer` int(11) NOT NULL DEFAULT '0',
  `lastnomer` int(11) NOT NULL DEFAULT '0',
  `firstchar` varchar(1) NOT NULL,
  `okpo` varchar(10) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `ras` varchar(20) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `mfo` varchar(6) NOT NULL,
  `adress` varchar(300) NOT NULL,
  `dr_user_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `full_name` varchar(400) NOT NULL,
  `dir_role` varchar(100) NOT NULL,
  `dir_fio` varchar(100) NOT NULL,
  `buh_fio` varchar(100) NOT NULL,
  `adres_yur` varchar(200) NOT NULL,
  `tel1` varchar(20) NOT NULL,
  `svidot_nomer` varchar(50) NOT NULL,
  `svidot_date` date NOT NULL,
  `svidot_organ` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `s_firma`
--

INSERT INTO `s_firma` (`id`, `name`, `autonomer`, `lastnomer`, `firstchar`, `okpo`, `tel`, `ras`, `bank`, `mfo`, `adress`, `dr_user_id`, `email`, `full_name`, `dir_role`, `dir_fio`, `buh_fio`, `adres_yur`, `tel1`, `svidot_nomer`, `svidot_date`, `svidot_organ`) VALUES
(1, 'Фірма виконавець 1', 0, 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '0000-00-00', ''),
(2, 'Фірма виконавець 2', 0, 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '0000-00-00', ''),
(16, 'ТзОВ «НАЗАРЕТ»', 1, 5, 'V', '32889330', '779-069', '26009017020259', 'Філії АТ «ДЕРЖАВНИЙ ЕКСП-ІМП. БАНК\r\nУКРАЇНИ»', '315609', 'Адреса Хмельницька обл., Хмельницький р-н, с.Ружичанка вул. Леніна,\r\n29 ', 7, '', '', '', '', '', '', '', '', '0000-00-00', ''),
(19, 'Евгений Гуцалюк', 0, 0, '', 'Евгений Гу', 'Евгений Гуцалюк', 'Евгений Гуцалюк', 'Евгений Гуцалюк', 'Евгени', '', 0, 'eugengev@mail.ru', 'Евгений Гуцалюк', 'Евгений Гуцалюк', 'Евгений Гуцалюк', 'Евгений Гуцалюк', '', '0000-00-00', 'Евгений Гуцалюк', '0000-00-00', 'Евгений Гуцалюк');

-- --------------------------------------------------------

--
-- Структура таблицы `s_maino`
--

CREATE TABLE `s_maino` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `s_maino`
--

INSERT INTO `s_maino` (`id`, `name`) VALUES
(1, 'Житлова нерухомість'),
(2, 'Земельна ділянка'),
(3, 'КТЗ'),
(4, 'Літальний апарат'),
(5, 'Майнові права'),
(6, 'Машини та обладнання'),
(7, 'Нежитлова нерухомість'),
(8, 'Судноплавний засіб'),
(9, 'Товари в оббігу');

-- --------------------------------------------------------

--
-- Структура таблицы `s_manager`
--

CREATE TABLE `s_manager` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `s_manager`
--

INSERT INTO `s_manager` (`id`, `name`, `city_id`) VALUES
(1, 'Манаджер 1', 1),
(2, 'Манаджер 11', 2),
(4, 'Гуцалюк Е.В.', 17);

-- --------------------------------------------------------

--
-- Структура таблицы `s_meta`
--

CREATE TABLE `s_meta` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `s_meta`
--

INSERT INTO `s_meta` (`id`, `name`) VALUES
(1, '3'),
(2, '2'),
(3, 'Банк'),
(4, 'Нотариус');

-- --------------------------------------------------------

--
-- Структура таблицы `s_pravforma`
--

CREATE TABLE `s_pravforma` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `s_pravforma`
--

INSERT INTO `s_pravforma` (`id`, `name`) VALUES
(1, 'ЗАТ');

-- --------------------------------------------------------

--
-- Структура таблицы `s_price`
--

CREATE TABLE `s_price` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `s_price`
--

INSERT INTO `s_price` (`id`, `name`, `price`) VALUES
(1, 'квартира', 500),
(2, 'будинок', 500),
(3, 'земля', 500),
(4, 'земля (юріки)', 1000),
(5, 'нерухомість до 3000 кв.м (не менше 500грн. за звіт)', 1),
(6, 'нерухомість від 3000 кв.м *', 1),
(7, 'майнові права за договором', 2000),
(8, 'товари в оббігу', 2000),
(9, 'КТЗ та сільгосптехніка 1', 500),
(10, 'КТЗ та сільгосптехніка 2-5', 400),
(11, 'КТЗ та сільгосптехніка 6-10', 350),
(12, 'КТЗ та сільгосптехніка &gt;10', 250),
(13, 'КТЗ та сільгосптехніка великі *', 1),
(14, 'Обладнання 1', 500),
(15, 'Обладнання 2-5', 250),
(16, 'Обладнання 6-10', 200),
(17, 'Обладнання &gt;10 *', 1),
(18, 'рецензия', 600);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `login_user` varchar(60) NOT NULL,
  `passwd_user` varchar(255) NOT NULL,
  `mail_user` varchar(255) NOT NULL,
  `role` varchar(1) NOT NULL,
  `fio` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login_user`, `passwd_user`, `mail_user`, `role`, `fio`) VALUES
(3, '380677284537', '583019cc3cf9b78534d7e2e7b05e466b', 'eugengev@ukr.net', 'a', 'Гуцалюк Евгений Владиирович'),
(4, '380671234567', '', '', 'm', 'Выконавець 1'),
(5, '380671234568', '', '', 'm', 'Выконавець 2'),
(7, '', '', '', '', 'Каплуну Володимиру Володимировичу'),
(16, '380677284538', '583019cc3cf9b78534d7e2e7b05e466b', 'eugen127@mail.ru', 'm', 'Гуцалюк Євгеній');

-- --------------------------------------------------------

--
-- Структура таблицы `vaino_file`
--

CREATE TABLE `vaino_file` (
  `id` int(11) NOT NULL,
  `reestr_id` int(11) NOT NULL,
  `maino_id` int(11) NOT NULL,
  `file_pach` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `adress_client`
--
ALTER TABLE `adress_client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `adress_firm`
--
ALTER TABLE `adress_firm`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `banki`
--
ALTER TABLE `banki`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `maino`
--
ALTER TABLE `maino`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reestr_id` (`reestr_id`);

--
-- Индексы таблицы `maino_file`
--
ALTER TABLE `maino_file`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reestr`
--
ALTER TABLE `reestr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomber` (`nomber`),
  ADD KEY `date` (`date`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `prev_id` (`prev_id`),
  ADD KEY `firma_id` (`firma_id`);

--
-- Индексы таблицы `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `s_bank`
--
ALTER TABLE `s_bank`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `s_city`
--
ALTER TABLE `s_city`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `s_client`
--
ALTER TABLE `s_client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `s_firma`
--
ALTER TABLE `s_firma`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `s_maino`
--
ALTER TABLE `s_maino`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `s_manager`
--
ALTER TABLE `s_manager`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `s_meta`
--
ALTER TABLE `s_meta`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `s_pravforma`
--
ALTER TABLE `s_pravforma`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `s_price`
--
ALTER TABLE `s_price`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `vaino_file`
--
ALTER TABLE `vaino_file`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `adress_client`
--
ALTER TABLE `adress_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `adress_firm`
--
ALTER TABLE `adress_firm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `banki`
--
ALTER TABLE `banki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `maino`
--
ALTER TABLE `maino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `maino_file`
--
ALTER TABLE `maino_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `reestr`
--
ALTER TABLE `reestr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `s_bank`
--
ALTER TABLE `s_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `s_city`
--
ALTER TABLE `s_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `s_client`
--
ALTER TABLE `s_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `s_firma`
--
ALTER TABLE `s_firma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `s_maino`
--
ALTER TABLE `s_maino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `s_manager`
--
ALTER TABLE `s_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `s_meta`
--
ALTER TABLE `s_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `s_pravforma`
--
ALTER TABLE `s_pravforma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `s_price`
--
ALTER TABLE `s_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `vaino_file`
--
ALTER TABLE `vaino_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
