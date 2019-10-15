-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 07 2019 г., 21:28
-- Версия сервера: 10.4.8-MariaDB-1:10.4.8+maria~bionic-log
-- Версия PHP: 7.3.9-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `crsdiscount`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authorization`
--

CREATE TABLE `authorization` (
  `id_cashiers` int(11) NOT NULL,
  `fio` varchar(55) NOT NULL,
  `login` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `authorization`
--

INSERT INTO `authorization` (`id_cashiers`, `fio`, `login`, `password`) VALUES
(1, 'Павленко Флорентина Богдановна', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `fio` varchar(55) NOT NULL,
  `bonuses` int(11) NOT NULL,
  `next_writeoff_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id_client`, `fio`, `bonuses`, `next_writeoff_date`) VALUES
(1, 'Иванов Иван Иванович', 10, '2019-11-07'),
(2, 'Попов Александр Дмитриевич', 2599859, '2019-11-07'),
(8, 'Манисов Александр Ильич', 34, '2019-11-07'),
(16, 'Евгений Понасенков', 100, '2019-11-07'),
(20, 'Имя Фамилия Отчество', 20, '2019-11-07'),
(21, 'Имя Фамилия Отчество', 20, '2019-11-07'),
(22, 'Имя Фамилия Отчество', 20, '2019-11-07');

-- --------------------------------------------------------

--
-- Структура таблицы `last_writeoff_date`
--

CREATE TABLE `last_writeoff_date` (
  `last_writeoff_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `last_writeoff_date`
--

INSERT INTO `last_writeoff_date` (`last_writeoff_date`) VALUES
('2019-10-07');

-- --------------------------------------------------------

--
-- Структура таблицы `log`
--

CREATE TABLE `log` (
  `id_cashiers` int(11) NOT NULL,
  `types` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_client` int(11) NOT NULL,
  `bonuses` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `log`
--

INSERT INTO `log` (`id_cashiers`, `types`, `id_client`, `bonuses`, `time`) VALUES
(1, 'начислил(а)', 8, 80, '2019-10-07 21:27:01');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authorization`
--
ALTER TABLE `authorization`
  ADD PRIMARY KEY (`id_cashiers`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Индексы таблицы `log`
--
ALTER TABLE `log`
  ADD KEY `id_cashiers` (`id_cashiers`),
  ADD KEY `id_client` (`id_client`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authorization`
--
ALTER TABLE `authorization`
  MODIFY `id_cashiers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`),
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`id_cashiers`) REFERENCES `authorization` (`id_cashiers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
