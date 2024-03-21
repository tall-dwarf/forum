-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 21 2024 г., 05:34
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `forum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `record_id`, `text`, `date`) VALUES
(1, 23, 4, 'Комментарий 1', '2024-03-20 00:00:00'),
(2, 23, 4, 'Коммент 2', '2024-03-20 00:00:00'),
(3, 32, 4, 'afawf', '2024-03-20 00:00:00'),
(4, 32, 4, 'wadwad', '2024-03-20 00:00:00'),
(5, 32, 4, 'awdwd', '2024-03-20 00:00:00'),
(6, 23, 4, 'trhtrhrthrt', '2024-03-20 14:21:49'),
(7, 32, 4, 'awdwad', '2024-03-20 14:41:44'),
(8, 32, 33, 'Мой коммент 1', '2024-03-20 19:46:49');

-- --------------------------------------------------------

--
-- Структура таблицы `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `record`
--

INSERT INTO `record` (`id`, `name`, `date`, `text`, `user_id`) VALUES
(4, 'Привет 1мир', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(5, 'Привет 2мир', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(6, 'Привет мир3', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(7, 'Привет мир4', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(8, 'Привет мир5', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(9, 'Привет мир6', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(10, 'Привет мир7', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(11, 'Привет мир8', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(12, 'Привет мир9', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(13, 'Привет мир10', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(14, 'Привет мир11', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(15, 'Привет мир12', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(16, 'Привет мир13', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(17, 'Привет мир14', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(18, 'Привет мир15', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(19, 'Привет мир16', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(20, 'Привет мир17', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(21, 'Привет мир18', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(22, 'Привет мир19', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(23, 'Привет мир20', '2024-03-13', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque doloremque eaque eum id laboriosam laudantium maxime nam, obcaecati, perferendis quas, rem unde veniam. Debitis ea impedit minima nostrum possimus.', 23),
(33, 'ergergrgeerg', '2024-03-20', 'wawadertert', 32),
(34, 'Новая запись', '2024-03-20', 'Текст новой записи', 32),
(35, 'thrthrth', '2024-03-20', 'fesesfrth', 32);

-- --------------------------------------------------------

--
-- Структура таблицы `record_on_tag`
--

CREATE TABLE `record_on_tag` (
  `record_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `record_on_tag`
--

INSERT INTO `record_on_tag` (`record_id`, `tag_id`) VALUES
(4, 1),
(4, 2),
(33, 1),
(33, 2),
(34, 1),
(35, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `record_raiting`
--

CREATE TABLE `record_raiting` (
  `record_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `raiting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `record_raiting`
--

INSERT INTO `record_raiting` (`record_id`, `user_id`, `raiting`) VALUES
(4, 23, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
(1, 'Новости'),
(2, 'Видеоигры');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `token`, `created_at`, `email`, `photo`) VALUES
(23, 'efegrth', '$2y$10$k9kowFjRimbi41luu7fyHumuipKYgUW7FHKumdUBApLDll5W.JhJW', 'e04f2e186d13aa30a8e2a227eef62f509b3e9f9da4d95b39cf341cd79dbb6f31f167b114160724ca', '2024-03-13', 'ilhalaktyushin@yandex.ru', 'upload/users/23bf28de129dde6d5e1415b725d784b1de4c35e9f3.jpg'),
(32, 'Zrhenjq12', '$2y$10$IMDX6HbMwgKuXsXTvQODhetUngvVAOLKgOJFOBifF.QFnR11o4Jxa', '5ee429a5177b358b8ffddcba6709812e4e469cc4e78cfc77d6d464aea16f6e028d0ee3a9d93ea0a0', '2024-03-20', 'ila.lakk@mail.ru', 'upload/users/32f35a40b22f5ab660691fbc692a8e4a32eb808dba.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `record_id` (`record_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);
ALTER TABLE `record` ADD FULLTEXT KEY `text123` (`text`,`name`);

--
-- Индексы таблицы `record_on_tag`
--
ALTER TABLE `record_on_tag`
  ADD PRIMARY KEY (`record_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Индексы таблицы `record_raiting`
--
ALTER TABLE `record_raiting`
  ADD PRIMARY KEY (`record_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`record_id`) REFERENCES `record` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `record_on_tag`
--
ALTER TABLE `record_on_tag`
  ADD CONSTRAINT `record_on_tag_ibfk_1` FOREIGN KEY (`record_id`) REFERENCES `record` (`id`),
  ADD CONSTRAINT `record_on_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`);

--
-- Ограничения внешнего ключа таблицы `record_raiting`
--
ALTER TABLE `record_raiting`
  ADD CONSTRAINT `record_raiting_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `record_raiting_ibfk_2` FOREIGN KEY (`record_id`) REFERENCES `record` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
