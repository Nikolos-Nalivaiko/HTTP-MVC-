-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Жов 30 2023 р., 11:58
-- Версія сервера: 10.4.28-MariaDB
-- Версія PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `http`
--

-- --------------------------------------------------------

--
-- Структура таблиці `bodies`
--

CREATE TABLE `bodies` (
  `id_body` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `bodies`
--

INSERT INTO `bodies` (`id_body`, `name`) VALUES
(1, 'body #1'),
(2, 'body #2');

-- --------------------------------------------------------

--
-- Структура таблиці `brands`
--

CREATE TABLE `brands` (
  `id_brand` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `brands`
--

INSERT INTO `brands` (`id_brand`, `name`) VALUES
(3, 'brand #1');

-- --------------------------------------------------------

--
-- Структура таблиці `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `load_region` int(11) NOT NULL,
  `load_city` int(11) NOT NULL,
  `load_date` date NOT NULL,
  `weight` float NOT NULL,
  `id_body` int(11) NOT NULL,
  `distance` int(11) NOT NULL,
  `unload_region` int(11) NOT NULL,
  `unload_city` int(11) NOT NULL,
  `unload_date` date NOT NULL,
  `price` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `urgent` varchar(20) NOT NULL DEFAULT 'no',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `name`, `description`, `load_region`, `load_city`, `load_date`, `weight`, `id_body`, `distance`, `unload_region`, `unload_city`, `unload_date`, `price`, `payment`, `urgent`, `id_user`) VALUES
(23, 'Brick', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 2, 1, '2023-10-03', 2.2, 1, 250, 3, 2, '2023-10-26', 52300, 1, 'yes', 21);

-- --------------------------------------------------------

--
-- Структура таблиці `cars`
--

CREATE TABLE `cars` (
  `id_car` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `model` int(11) NOT NULL,
  `engine` float NOT NULL,
  `wheel_mode` varchar(255) NOT NULL,
  `gearbox` varchar(255) NOT NULL,
  `power` int(11) NOT NULL,
  `mileage` int(11) NOT NULL,
  `engine_type` varchar(255) NOT NULL,
  `body` int(11) NOT NULL,
  `load_volume` float NOT NULL,
  `region` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `cars`
--

INSERT INTO `cars` (`id_car`, `brand`, `model`, `engine`, `wheel_mode`, `gearbox`, `power`, `mileage`, `engine_type`, `body`, `load_volume`, `region`, `city`, `description`, `price`, `id_user`) VALUES
(107, 3, 5, 4, 'Передній', 'Механіка', 4, 4, 'Бензин', 1, 4, 2, 1, '', 4, 21);

-- --------------------------------------------------------

--
-- Структура таблиці `cities`
--

CREATE TABLE `cities` (
  `id_city` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `cities`
--

INSERT INTO `cities` (`id_city`, `name`, `region`) VALUES
(1, 'city #1', 2),
(2, 'city #2', 3);

-- --------------------------------------------------------

--
-- Структура таблиці `images`
--

CREATE TABLE `images` (
  `id_image` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `preview` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `images`
--

INSERT INTO `images` (`id_image`, `car_id`, `name`, `preview`) VALUES
(56, 107, 'cars#975674.webp', 1),
(57, 107, 'cars#310686.webp', 0),
(58, 107, 'cars#629257.webp', 0),
(59, 107, 'cars#994481.webp', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `models`
--

CREATE TABLE `models` (
  `id_model` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `models`
--

INSERT INTO `models` (`id_model`, `name`, `brand_id`) VALUES
(5, 'model #1', 3),
(6, 'model #2', 3);

-- --------------------------------------------------------

--
-- Структура таблиці `payments`
--

CREATE TABLE `payments` (
  `id_payment` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `payments`
--

INSERT INTO `payments` (`id_payment`, `name`) VALUES
(1, 'Безготівковий розрахунок'),
(2, 'Готівка'),
(3, 'Криптовалюта');

-- --------------------------------------------------------

--
-- Структура таблиці `regions`
--

CREATE TABLE `regions` (
  `id_region` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `regions`
--

INSERT INTO `regions` (`id_region`, `name`) VALUES
(2, 'region #1'),
(3, 'region #2');

-- --------------------------------------------------------

--
-- Структура таблиці `tariffs`
--

CREATE TABLE `tariffs` (
  `id_tariff` int(11) NOT NULL,
  `tariff_name` varchar(255) NOT NULL,
  `tariff_start` date DEFAULT NULL,
  `tariff_end` date DEFAULT NULL,
  `tariff_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `tariffs`
--

INSERT INTO `tariffs` (`id_tariff`, `tariff_name`, `tariff_start`, `tariff_end`, `tariff_price`) VALUES
(3, 'basic', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `region` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tariff` int(11) DEFAULT NULL,
  `cookie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id_user`, `userName`, `middleName`, `lastName`, `companyName`, `login`, `password`, `region`, `city`, `phone`, `image`, `status`, `tariff`, `cookie`) VALUES
(21, 'name', 'middle', 'last', NULL, 'login', '$2y$10$updQmDOJqujRUoVgBRE3tee1/ERvOBpvQXccKdWx1USH3OBsRZVIq', 2, 1, '+38 (555) 555-55-55', 'default.jpg', 'user', 3, NULL);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `bodies`
--
ALTER TABLE `bodies`
  ADD PRIMARY KEY (`id_body`);

--
-- Індекси таблиці `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`);

--
-- Індекси таблиці `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `load_region` (`load_region`),
  ADD KEY `load_city` (`load_city`),
  ADD KEY `unload_region` (`unload_region`),
  ADD KEY `unload_city` (`unload_city`),
  ADD KEY `payment` (`payment`),
  ADD KEY `id_body` (`id_body`);

--
-- Індекси таблиці `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id_car`),
  ADD KEY `region` (`region`),
  ADD KEY `city` (`city`),
  ADD KEY `body` (`body`),
  ADD KEY `model` (`model`),
  ADD KEY `brand` (`brand`),
  ADD KEY `id_user` (`id_user`);

--
-- Індекси таблиці `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id_city`),
  ADD KEY `region` (`region`);

--
-- Індекси таблиці `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `car_id` (`car_id`);

--
-- Індекси таблиці `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id_model`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Індекси таблиці `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id_payment`);

--
-- Індекси таблиці `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id_region`);

--
-- Індекси таблиці `tariffs`
--
ALTER TABLE `tariffs`
  ADD PRIMARY KEY (`id_tariff`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `region` (`region`),
  ADD KEY `city` (`city`),
  ADD KEY `tariff` (`tariff`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `bodies`
--
ALTER TABLE `bodies`
  MODIFY `id_body` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблиці `cars`
--
ALTER TABLE `cars`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT для таблиці `cities`
--
ALTER TABLE `cities`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблиці `models`
--
ALTER TABLE `models`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `payments`
--
ALTER TABLE `payments`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `regions`
--
ALTER TABLE `regions`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `tariffs`
--
ALTER TABLE `tariffs`
  MODIFY `id_tariff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `cargos`
--
ALTER TABLE `cargos`
  ADD CONSTRAINT `cargos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `cargos_ibfk_2` FOREIGN KEY (`load_region`) REFERENCES `regions` (`id_region`),
  ADD CONSTRAINT `cargos_ibfk_3` FOREIGN KEY (`load_city`) REFERENCES `cities` (`id_city`),
  ADD CONSTRAINT `cargos_ibfk_4` FOREIGN KEY (`unload_region`) REFERENCES `regions` (`id_region`),
  ADD CONSTRAINT `cargos_ibfk_5` FOREIGN KEY (`unload_city`) REFERENCES `cities` (`id_city`),
  ADD CONSTRAINT `cargos_ibfk_6` FOREIGN KEY (`payment`) REFERENCES `payments` (`id_payment`),
  ADD CONSTRAINT `cargos_ibfk_7` FOREIGN KEY (`id_body`) REFERENCES `bodies` (`id_body`);

--
-- Обмеження зовнішнього ключа таблиці `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`region`) REFERENCES `regions` (`id_region`),
  ADD CONSTRAINT `cars_ibfk_2` FOREIGN KEY (`city`) REFERENCES `cities` (`id_city`),
  ADD CONSTRAINT `cars_ibfk_3` FOREIGN KEY (`body`) REFERENCES `bodies` (`id_body`),
  ADD CONSTRAINT `cars_ibfk_4` FOREIGN KEY (`brand`) REFERENCES `brands` (`id_brand`),
  ADD CONSTRAINT `cars_ibfk_5` FOREIGN KEY (`model`) REFERENCES `models` (`id_model`),
  ADD CONSTRAINT `cars_ibfk_6` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Обмеження зовнішнього ключа таблиці `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`region`) REFERENCES `regions` (`id_region`);

--
-- Обмеження зовнішнього ключа таблиці `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id_car`);

--
-- Обмеження зовнішнього ключа таблиці `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `models_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id_brand`);

--
-- Обмеження зовнішнього ключа таблиці `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`region`) REFERENCES `regions` (`id_region`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`city`) REFERENCES `cities` (`id_city`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`tariff`) REFERENCES `tariffs` (`id_tariff`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
