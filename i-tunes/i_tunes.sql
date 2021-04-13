-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 13 апр 2021 в 14:47
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
-- База данни: `i_tunes`
--

-- --------------------------------------------------------

--
-- Структура на таблица `audio_files`
--

CREATE TABLE `audio_files` (
  `audio_file_id` int(11) NOT NULL,
  `song_name` varchar(150) NOT NULL,
  `performer` varchar(150) NOT NULL,
  `audio_file` varchar(200) DEFAULT NULL,
  `downloads` int(11) NOT NULL,
  `rating` tinyint(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_deleted` date DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `audio_files`
--

INSERT INTO `audio_files` (`audio_file_id`, `song_name`, `performer`, `audio_file`, `downloads`, `rating`, `date_created`, `date_deleted`, `category_id`, `user_id`) VALUES
(1, 'You keep on moving', 'Deep Purple', NULL, 50, 5, '2021-03-28 21:49:13', NULL, 1, 1),
(2, 'You don\'t fool me', 'Queen', NULL, 23, 4, '2021-03-29 21:49:23', NULL, 1, 1),
(3, 'Sometimes I feel like screaming', 'Deep Purple', NULL, 70, 5, '2021-03-24 21:49:30', NULL, 1, 1),
(4, 'Superman', 'Eminem', NULL, 100, 4, '0000-00-00 00:00:00', NULL, 2, 1),
(5, 'Yeah', 'Usher', NULL, 65, 3, '0000-00-00 00:00:00', NULL, 2, 1),
(16, '$song_name', '$performer', NULL, 0, 0, '0000-00-00 00:00:00', NULL, 4, 1),
(18, 'November rain', 'Guns and Roses', NULL, 125, 5, '0000-00-00 00:00:00', NULL, 1, 1),
(22, 'Dirty Diana', 'Michael Jackson', NULL, 200, 5, '2021-03-31 21:42:31', NULL, 3, 1),
(29, 'No sunshine', 'DMX', NULL, 0, 0, '2021-04-06 19:47:15', NULL, 2, 0),
(31, 'Perfect Strangers', 'Deep Purple', NULL, 0, 0, '2021-04-06 19:55:46', NULL, 1, 0),
(32, 'November rain', 'Guns and Roses', NULL, 0, 0, '2021-04-08 14:37:28', NULL, 1, 0),
(34, 'Sometimes I feel like screaming', 'Deep Purple', NULL, 0, 0, '2021-04-08 14:55:08', NULL, 1, 0),
(35, 'Yeah', 'Usher', 'uploads/Usher - Yeah! (Official Video) ft. Lil Jon, Ludacris.mp3', 0, 0, '2021-04-08 15:00:57', NULL, 2, 0),
(36, 'Superman', 'Eminem', 'uploads/Eminem - Superman (Clean Version).mp3', 0, 0, '2021-04-08 20:53:23', NULL, 2, 0),
(38, 'Respect the wind', 'Eddie Van Halen', 'uploads/Eddie_van_halen_Respect_the_Wind.mp3', 0, 0, '2021-04-08 21:07:28', NULL, 1, 0),
(39, 'Dance of the knights', 'Prokofiev', 'uploads/Prokofiev - Dance of the Knights.mp3', 0, 0, '2021-04-08 21:14:38', NULL, 10, 0),
(40, 'test', 'test', 'uploads/Guns N\' Roses1 - November Rain.mp3', 0, 0, '2021-04-10 11:09:13', NULL, 3, 22),
(41, 'test2', 'test2', 'uploads/Guns N\' Roses1 - November Rain.mp3', 0, 0, '2021-04-10 11:17:57', NULL, 3, 22);

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
(4, 'Soul', NULL),
(10, 'Classic music', NULL),
(12, 'Dubstep', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `audio_file_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`) VALUES
(0, 'helen', '$2y$10$lhTPqX6p8N0R1wlzjZgxiufMRMCmdtQi47UVSdM7PUVoRnoqanZZS'),
(1, 'test', 'test'),
(20, 'harry', '$2y$10$qpqdG2P2YQ3i9I/QiT8gEeuYf2j/rUSvdQ9yZ7bw5y8JxpKYZpCfG'),
(21, 'Karolina', '$2y$10$e8IlD8P53xfDxGkkyxRN4Orj4mQ1g3qs4mqpQIk.JwbXgKphfHpce'),
(22, 'pipi', '$2y$10$86lpd5WwEfHHxhrbOoOAj.auI18V64hHE6bt9djHOUCG04Pu13vJm'),
(23, 'tomi', '$2y$10$3AEvp8h8TADJD1KwHWays.TN5iUC1JfJqhXCazP6MiSAquNBTcUGq'),
(24, 'alex', '$2y$10$i7IxYgNIlBE2addZYHJcjeFDTgvO/CHDByBoOImc0/vVzgw6kb4gy');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `audio_files`
--
ALTER TABLE `audio_files`
  ADD PRIMARY KEY (`audio_file_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индекси за таблица `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индекси за таблица `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD UNIQUE KEY `audio_file_id` (`audio_file_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

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
  MODIFY `audio_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `audio_files`
--
ALTER TABLE `audio_files`
  ADD CONSTRAINT `audio_files_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `audio_files_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Ограничения за таблица `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`audio_file_id`) REFERENCES `audio_files` (`audio_file_id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
