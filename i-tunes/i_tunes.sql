-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 30 март 2021 в 13:57
-- Версия на сървъра: 10.4.16-MariaDB
-- Версия на PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `i-tunes`
--

-- --------------------------------------------------------

--
-- Структура на таблица `audio_files`
--

CREATE TABLE `audio_files` (
  `audio_file_id` int(11) NOT NULL,
  `song_name` varchar(150) NOT NULL,
  `performer` varchar(150) NOT NULL,
  `downloads` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_deleted` date DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `audio_files`
--

INSERT INTO `audio_files` (`audio_file_id`, `song_name`, `performer`, `downloads`, `rating`, `date_created`, `date_deleted`, `category_id`, `user_id`) VALUES
(1, 'You keep on moving', 'Deep Purple', 50, 5, '2021-03-30', NULL, 1, 2),
(2, 'You don\'t fool me', 'Queen', 23, 4, '2021-03-30', NULL, 1, 1),
(3, 'Child in time', 'Deep Purple', 70, 5, '2021-03-30', NULL, 1, 3),
(4, 'Superman', 'Eminem', 100, 4, '2021-03-30', NULL, 2, 1),
(5, 'Yeah', 'Usher', 65, 3, '2021-03-18', NULL, 2, 4);

-- --------------------------------------------------------

--
-- Структура на таблица `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `date_deleted`) VALUES
(1, 'Rock', NULL),
(2, 'Rap', NULL),
(3, 'Pop ', NULL),
(4, 'Soul', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`) VALUES
(1, 'test1', 'test'),
(2, 'test2', 'test2'),
(3, 'test3', 'test3'),
(4, 'test4', 'test4');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `audio_files`
--
ALTER TABLE `audio_files`
  ADD PRIMARY KEY (`audio_file_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индекси за таблица `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индекси за таблица `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audio_files`
--
ALTER TABLE `audio_files`
  MODIFY `audio_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `audio_files`
--
ALTER TABLE `audio_files`
  ADD CONSTRAINT `audio_files_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `audio_files_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
