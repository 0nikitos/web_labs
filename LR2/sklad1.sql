-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 21 2022 г., 08:11
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sklad1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `img_path` text DEFAULT NULL,
  `id` int(45) NOT NULL,
  `id_provider` int(45) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`img_path`, `id`, `id_provider`, `name`, `description`, `cost`) VALUES
('1.png', 1, 1, 'Трансформатор ОСМ-1-220', '', 7799),
('2.png', 2, 3, 'Трансформатор напряжения Phaseo Optimum ABL6', 'Включаемые в сеть переменного тока частотой 50Гц', 1537),
('3.png', 3, 4, 'Трансформатор понижающий NDK-50VA', 'Трансформатор понижающий', 1489),
('4.png', 4, 1, 'Трансформатор ТМГ11-100-6', 'Трехфазные масляные трансформаторы ТМГ', 1780),
('5.png', 5, 4, 'Трансформатор ТСДЗЛФ11-100-10,5', '', 4628),
('6.png', 6, 2, 'Трансформатор ТМГ-25-6', 'Трансформатор повышающий', 2255),
('7.png', 7, 3, 'Трансформатор ТСЗЛ 1000-6', '', 4467),
('8.png', 8, 4, 'Трансформатор ТМГПН-400-6', '', 2368),
('9.png', 9, 1, 'Трансформатор ТС-6,3-0,4', '', 6379);

-- --------------------------------------------------------

--
-- Структура таблицы `providers`
--

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `providers`
--

INSERT INTO `providers` (`id`, `name`) VALUES
(1, 'ЭЛЕКТРОЩИТ'),
(2, 'ОНЛАЙНСКЛАД'),
(3, 'РЕМОНТЭНЕРГОСЕРВИС'),
(4, 'ЭЛЕКТРООПТИМА');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provider` (`id_provider`);

--
-- Индексы таблицы `providers`
--
ALTER TABLE `providers`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`id_provider`) REFERENCES `providers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
