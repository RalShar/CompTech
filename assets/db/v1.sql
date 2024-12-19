-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 18 2024 г., 19:50
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `v1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL,
  `id_status` int NOT NULL,
  `count` int NOT NULL DEFAULT '0',
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `id_user`, `id_product`, `id_status`, `count`, `address`) VALUES
(1, 3, 1, 3, 12, 'Адресс'),
(2, 3, 1, 2, 1, 'Адрес'),
(4, 4, 1, 3, 2, 'fasfas'),
(8, 1, 2, 2, 2, ''),
(9, 1, 2, 2, 2, ''),
(10, 1, 2, 2, 1, ''),
(11, 1, 2, 2, 2, ''),
(12, 1, 2, 2, 0, ''),
(13, 1, 2, 2, 0, ''),
(14, 1, 2, 2, 0, ''),
(15, 1, 2, 3, 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `type`, `manufacturer`, `description`, `price`, `img`) VALUES
(1, 'Intel Core Ultra 9 285K OEM', 'Процессор', 'Intel', 'LGA 1851, 24-ядерный, 3700 МГц, Turbo: 5700 МГц, Arrow Lake-S Кэш L2 - 40 Мб, L3 - 36 Мб, Intel Graphics, 3 нм, 125 Вт', '12170', 'assets/img/1.webp'),
(2, 'MSI B760 GAMING PLUS WIFI', 'Материнская плата', 'MSI', 'ATX, сокет LGA 1700, чипсет Intel B760, 4xDDR5, 2xPCI-E 4.0, 2xM.2, сеть: 2.5 Гбит/с, Wi-Fi, Bluetooth, HDMI, DisplayPort', '16710', 'assets/img/2.webp'),
(3, 'NVIDIA GeForce RTX 4060 MSI 8Gb (RTX 4060 VENTUS 2X BLACK 8G OC)', 'Видеокарта', 'MSI', 'PCI-E 4.0, ядро - 1830 МГц, Boost - 2505 МГц, 8 Гб памяти GDDR6 17000 МГц, 128 бит, HDMI, 3xDisplayPort, длина 199 мм, Retail', '45040', 'assets/img/3.webp'),
(4, '2Tb SATA-III Seagate Barracuda (ST2000DM008)', 'HDD', 'Seagate', 'внутренний HDD, 3.5\", 2000 Гб, SATA-III, 7200 об/мин, кэш - 256 Мб', '8010', 'assets/img/4.webp'),
(5, '1Tb Kingston NV2 (SNV2S/1000G)', 'SSD', 'Kingston', 'внутренний SSD, M.2, 1000 Гб, PCI-E 4.0 x4, NVMe, чтение: 3500 МБ/сек, запись: 2100 МБ/сек, 2280', '6940', 'assets/img/5.webp'),
(6, 'Zalman N4 Rev.1 Black', 'Корпус', 'Zalman', 'корпус Midi-Tower, поддержка плат ATX, mATX, Mini-ITX, без БП, с окном, длина видеокарты до 315 мм, высота кулера до 163 мм, подсветка, 2xUSB 2.0, USB 3.0', '5930', 'assets/img/6.webp');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `code`, `name`) VALUES
(1, 'user', 'Зарегистрированный пользователь'),
(2, 'admin', 'Администратор');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `code`, `name`) VALUES
(1, 'new', 'Новое'),
(2, 'confirmed', 'Подтверждено'),
(3, 'canceled', 'Отменено');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `id_role` int NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `id_role`, `login`, `password`, `full_name`, `phone`) VALUES
(1, 2, 'user@mail.ru', 'user', 'Иванов Иван Иванович', '91111111111'),
(2, 1, 'mail@mail.ru', 'user', 'Иванов Дмитрий Иванович', '7917546185'),
(4, 1, 'user1@mail.ru', '451', 'Жмышенко Валерий Альбертович', '79174568578');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_status` (`id_status`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`id_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
