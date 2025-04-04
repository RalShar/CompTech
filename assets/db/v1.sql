-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 24 2025 г., 07:24
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
-- Структура таблицы `fav`
--

CREATE TABLE `fav` (
  `id` int NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `Id_product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `fav`
--

INSERT INTO `fav` (`id`, `id_user`, `Id_product`) VALUES
(9, '2', '7'),
(10, '2', '2');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `name`, `message`, `created_at`) VALUES
(4, 'user@mail.ru', 'das', 'dasd', '2024-12-18 22:43:18'),
(5, 'user@mail.ru', 'das', 'dass', '2024-12-18 22:45:09');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL,
  `count` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `id_user`, `id_product`, `count`) VALUES
(16, 1, 1, 7);

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
  `price` int NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `type`, `manufacturer`, `description`, `price`, `img`) VALUES
(1, 'Intel Core Ultra 9 285K OEM', 'Процессор', 'Intel', 'LGA 1851, 24-ядерный, 3700 МГц, Turbo: 5700 МГц, Arrow Lake-S Кэш L2 - 40 Мб, L3 - 36 Мб, Intel Graphics, 3 нм, 125 Вт', 12170, 'assets/img/1.webp'),
(2, 'MSI B760 GAMING PLUS WIFI', 'Материнская плата', 'MSI', 'ATX, сокет LGA 1700, чипсет Intel B760, 4xDDR5, 2xPCI-E 4.0, 2xM.2, сеть: 2.5 Гбит/с, Wi-Fi, Bluetooth, HDMI, DisplayPort', 16710, 'assets/img/2.webp'),
(3, 'NVIDIA GeForce RTX 4060 MSI 8Gb (RTX 4060 VENTUS 2X BLACK 8G OC)', 'Видеокарта', 'MSI', 'PCI-E 4.0, ядро - 1830 МГц, Boost - 2505 МГц, 8 Гб памяти GDDR6 17000 МГц, 128 бит, HDMI, 3xDisplayPort, длина 199 мм, Retail', 45040, 'assets/img/3.webp'),
(4, '2Tb SATA-III Seagate Barracuda (ST2000DM008)', 'HDD', 'Seagate', 'внутренний HDD, 3.5\", 2000 Гб, SATA-III, 7200 об/мин, кэш - 256 Мб', 8010, 'assets/img/4.webp'),
(5, '1Tb Kingston NV2 (SNV2S/1000G)', 'SSD', 'Kingston', 'внутренний SSD, M.2, 1000 Гб, PCI-E 4.0 x4, NVMe, чтение: 3500 МБ/сек, запись: 2100 МБ/сек, 2280', 6940, 'assets/img/5.webp'),
(6, 'Zalman N4 Rev.1 Black', 'Корпус', 'Zalman', 'корпус Midi-Tower, поддержка плат ATX, mATX, Mini-ITX, без БП, с окном, длина видеокарты до 315 мм, высота кулера до 163 мм, подсветка, 2xUSB 2.0, USB 3.0', 5930, 'assets/img/6.webp'),
(7, '32Gb DDR4 3200MHz Kingston Fury Beast Black (KF432C16BB1K2/32)', 'Оперативная память', 'Kingston', '32 Гб, 2 модуля DDR4, 25600 Мб/с, CL16, 1.35 В, XMP профиль, радиатор', 8420, 'assets/img/8.webp');

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

-- --------------------------------------------------------

--
-- Структура таблицы `zakaz`
--

CREATE TABLE `zakaz` (
  `id` int NOT NULL,
  `city` varchar(255) NOT NULL,
  `delivery_option` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `tel2` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `total_price1` double NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `zakaz`
--

INSERT INTO `zakaz` (`id`, `city`, `delivery_option`, `adress`, `section`, `floor`, `room`, `payment_method`, `full_name`, `email`, `tel`, `tel2`, `comment`, `total_price1`, `user_id`) VALUES
(1, 'Москва', 'delivery', 'dsad', '1', '2', '1', 'online', 'dsadadd', 'user@mail.ru', '57578578', '57585858', '  Комментарий к заказу\r\n  ', 19110, '2'),
(2, 'Москва', 'delivery', 'вфыв', '1', '1', '1', 'online', 'вфыв', 'user@mail.ru', '789454987', '84987484', '  Комментарий к заказу\r\n  ', 19110, '2');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `fav`
--
ALTER TABLE `fav`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

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
-- Индексы таблицы `zakaz`
--
ALTER TABLE `zakaz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `fav`
--
ALTER TABLE `fav`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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

--
-- AUTO_INCREMENT для таблицы `zakaz`
--
ALTER TABLE `zakaz`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
