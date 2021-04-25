-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2021 a las 15:08:11
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `todo`
--
CREATE DATABASE IF NOT EXISTS `todo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `todo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_folder_task`
--

CREATE TABLE `a_folder_task` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `a_folder_task`
--

INSERT INTO `a_folder_task` (`id`, `name`) VALUES
(2, 'Holidays'),
(6, 'Work'),
(7, 'Folder');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_menu`
--

CREATE TABLE `a_menu` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `root` int(11) DEFAULT NULL,
  `url` varchar(256) COLLATE utf8_spanish_ci DEFAULT NULL,
  `target` varchar(256) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` int(2) DEFAULT NULL,
  `menu` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `a_menu`
--

INSERT INTO `a_menu` (`id`, `nombre`, `parent`, `root`, `url`, `target`, `orden`, `menu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Home', NULL, NULL, 'Login/home', NULL, NULL, 1, NULL, NULL, NULL),
(2, 'All todo Task', NULL, NULL, 'TaskList/taskList', NULL, NULL, 1, NULL, NULL, NULL),
(3, 'Folders', 2, NULL, 'TaskList/taskFolder', NULL, NULL, 1, NULL, NULL, NULL),
(4, 'Log out', NULL, NULL, 'login/salir', NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_task`
--

CREATE TABLE `a_task` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `check` tinyint(1) NOT NULL,
  `id_folder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `a_task`
--

INSERT INTO `a_task` (`id`, `name`, `check`, `id_folder`) VALUES
(13, '14131', 0, 0),
(21, 'adad', 1, 0),
(22, 'sadasd', 1, 2),
(24, 'sdfs', 1, 0),
(26, 'fewr', 1, 0),
(29, 'adad', 1, 2),
(31, 'hola', 0, 6),
(32, 'nuevo', 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_user`
--

CREATE TABLE `a_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text DEFAULT NULL,
  `deleted_at` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `a_user`
--

INSERT INTO `a_user` (`id`, `username`, `password`, `deleted_at`) VALUES
(1, 'admin', 'admin', 1),
(2, 'david', '123asda', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `a_folder_task`
--
ALTER TABLE `a_folder_task`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `a_menu`
--
ALTER TABLE `a_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indices de la tabla `a_task`
--
ALTER TABLE `a_task`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `a_user`
--
ALTER TABLE `a_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `a_folder_task`
--
ALTER TABLE `a_folder_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `a_menu`
--
ALTER TABLE `a_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `a_task`
--
ALTER TABLE `a_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `a_user`
--
ALTER TABLE `a_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
