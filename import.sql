-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 29 2020 г., 15:25
-- Версия сервера: 5.7.31
-- Версия PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `import`
--

-- --------------------------------------------------------

--
-- Структура таблицы `flights`
--

DROP TABLE IF EXISTS `flights`;
CREATE TABLE IF NOT EXISTS `flights` (
  `id_f` int(5) NOT NULL AUTO_INCREMENT,
  `plane` varchar(30) NOT NULL,
  `from_where` varchar(20) NOT NULL,
  `to_where` varchar(20) NOT NULL,
  `departure` date NOT NULL,
  `dt_departure` datetime NOT NULL,
  `arrival` time NOT NULL,
  `flight_time` time NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`id_f`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `flights`
--

INSERT INTO `flights` (`id_f`, `plane`, `from_where`, `to_where`, `departure`, `dt_departure`, `arrival`, `flight_time`, `price`) VALUES
(9, 'Boing-777', 'Самара', 'Перьм', '2020-10-28', '2020-10-28 18:55:22', '23:55:22', '06:55:22', 7900),
(10, 'Boing-666', 'Ростов', 'Самара', '2020-10-28', '2020-10-28 06:46:05', '15:10:05', '07:10:05', 9000),
(11, 'Boing-444', 'Перьм', 'Самара', '2020-10-29', '2020-10-29 04:47:26', '06:47:26', '06:47:26', 4500);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'root');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
