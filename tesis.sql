-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2021 a las 23:31:47
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tesis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordenadas`
--

CREATE TABLE `coordenadas` (
  `id_mensaje` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

CREATE TABLE `dispositivo` (
  `id_mensaje` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `oxigeno` float DEFAULT NULL,
  `temperatura` float DEFAULT NULL,
  `turbidez` float DEFAULT NULL,
  `dioxido_carbono` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dispositivo`
--

INSERT INTO `dispositivo` (`id_mensaje`, `fecha`, `oxigeno`, `temperatura`, `turbidez`, `dioxido_carbono`) VALUES
(95, '2021-04-05 13:57:37', 25, 34, 7, 12),
(96, '2021-04-05 13:59:17', 23, 22.4, 5.2, 40),
(97, '2021-04-05 17:23:12', 35, 40, 2.2, 45),
(99, '2021-04-05 17:43:43', 56, 32, 4.4, 98),
(100, '2021-04-05 17:45:29', 12, 32, 34, 53),
(101, '2021-04-05 17:46:52', 12, 32, 34, 53),
(102, '2021-04-05 17:48:04', 43, 54, 23, 34),
(103, '2021-04-05 17:52:19', 43, 54, 23, 34),
(104, '2021-04-05 17:53:54', 23, 34, 23, 56),
(105, '2021-04-05 17:55:21', 23, 34, 23, 56),
(106, '2021-04-05 18:01:09', 21, 76, 84, 12),
(107, '2021-04-05 18:02:24', 21, 23, 84, 12),
(108, '2021-04-05 18:02:49', 43, 12, 53, 64),
(109, '2021-04-06 12:05:09', 89, 43, 2.2, 90),
(110, '2021-04-06 12:05:39', 23, 34, 12, 50),
(111, '2021-04-14 16:18:31', 12, 30, 9, 10),
(112, '2021-04-14 16:24:40', 12, 20, 1, 3),
(113, '2021-04-14 16:32:04', 12, 13, 4, 7),
(114, '2021-04-14 16:53:15', 1, 1, 1, 1),
(115, '2021-04-14 17:02:10', 2, 20, 2, 2),
(116, '2021-04-14 17:02:25', 4, 26, 22, 24),
(117, '2021-04-20 17:49:32', 8.2, 30, 5.5, 8.8),
(118, '2021-04-20 17:50:05', 6.2, 28, 4.5, 7.8),
(119, '2021-05-29 23:34:11', 12, 43, 42, 12),
(120, '2021-05-29 23:36:34', 56, 23, 12, 43),
(121, '2021-05-29 23:59:07', 8.2, 28, 5.5, 2.4),
(122, '2021-05-29 23:59:36', 9.2, 34, 10.5, 7.4),
(123, '2021-05-30 00:05:36', 2.2, 37, 5.1, 8.7),
(124, '2021-05-30 00:06:28', 6.2, 40, 2.1, 4.7),
(125, '2021-05-30 00:06:47', 1, 25, 12, 8),
(126, '2021-05-30 00:07:30', 11, 32, 16, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password_usuario` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password_usuario`) VALUES
(4, 'admin', '$2y$10$18z1s6/au0xnxebCatge1OTF7g5XvCvZ4UeTCiOfvRbSk2r4tLQl.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coordenadas`
--
ALTER TABLE `coordenadas`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `coordenadas`
--
ALTER TABLE `coordenadas`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
